<?php
require('connect.php');

// class Sessions {
//   public function __construct() {
//     session_name('learner');
//     session_start();
//   }

//   public function set($key, $value) {
//     $_SESSION[$key] = $value;
//   }

//   public function get($key) {
//     return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
//   }
// }
// Define Training class
class Training {
    private $training_id;
    private $subject;
    private $description;
    private $category;
    private $total_hours;
    private $sessions = array();

    public function __construct($training_id, $subject, $description, $category, $total_hours) {
        $this->training_id = $training_id;
        $this->subject = $subject;
        $this->description = $description;
        $this->category = $category;
        $this->total_hours = $total_hours;
    }

    public function getTrainingId() {
        return $this->training_id;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getTotalHours() {
        return $this->total_hours;
    }

    public function getSessions() {
        return $this->sessions;
    }
    public static function searchTrainings($searchTerm) {
        $trainings = self::getTrainings();
        $filteredTrainings = [];
    
        foreach ($trainings as $training) {
            // Search for match in subject or description
            if (stripos($training->getSubject(), $searchTerm) !== false ||
                stripos($training->getDescription(), $searchTerm) !== false) {
                $filteredTrainings[] = $training;
            }
        }
    
        return $filteredTrainings;
    }
    
    public static function getTrainings() {
        require('connect.php');
        $trainings = array();
    
        $result = $db->query("SELECT * FROM Training");
    
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $training_id = $row["training_id"];
            $subject = $row["subject"];
            $description = $row["description"];
            $category = $row["category"];
            $total_hours = $row["total_hours"];
    
            $trainings[$training_id] = new Training($training_id, $subject, $description, $category, $total_hours);
        }
    
        return $trainings;
    }
}

// Define Session class
class Session {
    private $session_id;
    private $start_date;
    private $end_date;
    private $max_places;
    private $status;
    private $training_id;
    private $trainer_id;

    public function __construct($session_id, $start_date, $end_date, $max_places, $status, $training_id, $trainer_id) {
        $this->session_id = $session_id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->max_places = $max_places;
        $this->status = $status;
        $this->training_id = $training_id;
        $this->trainer_id = $trainer_id;
    }

    public function getSessionId() {
        return $this->session_id;
    }

    public function getStartDate() {
        return $this->start_date;
    }

    public function getEndDate() {
        return $this->end_date;
    }

    public function getMaxPlaces() {
        return $this->max_places;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getTrainingId() {
        return $this->training_id;
    }

    public function getTrainerId() {
        return $this->trainer_id;
    }
}

class Learner {
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $db;

    public function get_first_name() {
        return $this->first_name;
    }

    public function set_first_name($first_name) {
        $this->first_name = $first_name;
    }

    public function get_last_name() {
        return $this->last_name;
    }

    public function set_last_name($last_name) {
        $this->last_name = $last_name;
    }

    public function get_email() {
        return $this->email;
    }

    public function set_email($email) {
        $this->email = $email;
    }

    public function get_password() {
        return $this->password;
    }

    public function set_password($password) {
        $this->password = $password;
    }

    public function connectDB() {
        $this->db = new PDO('mysql:host=localhost;dbname=trainingcenter', 'root', '');
    }

    public function login() {
        $this->connectDB();

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
             
            // Prepare the SQL query to insert data into the Learner table
        $sql = 'SELECT * FROM Learner WHERE email = :email';
        
            // prepare the SQL query to select the learner with the given email
            $stmt =  $this->db->prepare($sql);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->execute();
            // fetch the learner's data from the database
            $learner = $stmt->fetch(PDO::FETCH_ASSOC);
        
            // check if the learner exists and the password is correct
            if ($learner && password_verify($_POST['password'], $learner['password'])) {
        
                $_SESSION['learner_id'] = $learner['learner_id'];
                $_SESSION['first_name'] = $learner['first_name'];
                $_SESSION['last_name'] = $learner['last_name'];
                $_SESSION['email'] = $learner['email'];
                header("Location: Trainings.php");
            } else {
                // the learner does not exist or the password is incorrect, so display an error message
                $error_message = 'Invalid email or password';
                $_SESSION['error_message'] = $error_message; 
                header("Location: signin.php"); 
            }
        } 
        // close the database connection
        $db = null;
    }

    public function save() {
        $this->connectDB();

        // Hash the password
        $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);

        // Prepare the SQL query to insert data into the Learner table
        $sql = 'INSERT INTO learner (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)';

        // Bind the form data to the prepared statement
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':first_name', $this->first_name);
        $stmt->bindParam(':last_name', $this->last_name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $hashed_password);

        // Execute the prepared statement
        $stmt->execute();

        // Return true if the learner was saved successfully, false otherwise
        return $stmt->rowCount() > 0;
    }
    public function update($email,
    $first_name,
    $last_name,
    $new_password,
    $current_password) {
        $this->connectDB();
    
        // Check if the current password is correct
        $sql = 'SELECT password FROM learner WHERE email = :email';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $password_match = password_verify($current_password, $result['password']);
        if (!$password_match) {
        $false_current_password = 'The current password is incorrect';
        $_SESSION['false_current_password'] = $false_current_password; 
        header("Location: profile.php"); 

        }else{
            
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
            // Prepare the SQL query to update data in the Learner table
            $sql = 'UPDATE learner SET first_name = :first_name, last_name = :last_name, password = :password WHERE email = :email';
        
            // Bind the form data to the prepared statement
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
        
            // Execute the prepared statement
            $stmt->execute();

            $success_update ='Your profile information has been updated successfully.';
            $_SESSION['success_update'] = $success_update; 
            // Return true if the learner was saved successfully, false otherwise
            return $stmt->rowCount() > 0;
            
        }
    
        // Hash the new password

    }
    public function get_learner_by_id($learner_id) {
        // Connect to the database
        $this->db = new PDO('mysql:host=localhost;dbname=trainingcenter', 'root', '');
    
        // Prepare the SQL query to select the learner with the given ID
        $sql = 'SELECT * FROM learner WHERE learner_id = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$learner_id]);
    
        // Fetch the learner's data from the database
        $learner_data = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Set the learner object's properties based on the retrieved data
        $this->set_first_name($learner_data['first_name']);
        $this->set_last_name($learner_data['last_name']);
        $this->set_email($learner_data['email']);
        $this->set_password($learner_data['password']);
    
        // Store the learner object in the session
        $_SESSION['learner'] = $this;
    }
}
?>