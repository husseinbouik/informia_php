<?php
<?php

class DatabaseConnection {
    private $host;
    private $dbname;
    private $username;
    private $password;

    public function __construct($host, $dbname, $username, $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function getDb() {
        $db = new PDO($this->getDsn());
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    private function getDsn() {
        return "mysql:host=$this->host;dbname=$this->dbname";
    }
}


class Trainer {
    private $trainer_id;
    private $first_name;
    private $last_name;
    private $email;
    private $skills;
    private $password;

    public function __construct($trainer_id, $first_name, $last_name, $email, $skills, $password) {
        $this->trainer_id = $trainer_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->skills = $skills;
        $this->password = $password;
    }

    public function getTrainerId() {
        return $this->trainer_id;
    }

    public function setTrainerId($trainer_id) {
        $this->trainer_id = $trainer_id;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSkills() {
        return $this->skills;
    }

    public function setSkills($skills) {
        $this->skills = $skills;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function save() {
        $db = DatabaseConnection::getDb();

        $stmt = $db->prepare("INSERT INTO Trainer (trainer_id, first_name, last_name, email, skills, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$this->trainer_id, $this->first_name, $this->last_name, $this->email, $this->skills, $this->password]);
    }
}

class Training {
    private $training_id;
    private $subject;
    private $description;
    private $category;
    private $total_hours;

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

    public function setTrainingId($training_id) {
        $this->training_id = $training_id;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getTotalHours() {
        return $this->total_hours;
    }

    public function setTotalHours($total_hours) {
        $this->total_hours = $total_hours;
    }

    public function save() {
        $db = DatabaseConnection::getDb();

        $stmt = $db->prepare("INSERT INTO Training (training_id, subject, description, category, total_hours) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$this->training_id, $this->subject, $this->description, $this->category, $this->total_hours]);
    }
}

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

    public function setSessionId($session_id) {
        $this->session_id = $session_id;
    }

    public function getStartDate() {
        return $this->start_date;
    }

    public function setStartDate($start_date) {
        $this->start_date = $start_date;
    }

    public function getEndDate() {
        return $this->end_date;
    }

    public function setEndDate($end_date) {
        $this->end_date = $end_date;
    }

    public function getMaxPlaces() {
        return $this->max_places;
    }

    public function setMaxPlaces($max_places) {
        $this->max_places = $max_places;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getTrainingId() {
        return $this->training_id;
    }

    public function setTrainingId($training_id) {
        $this->training_id = $training_id;
    }

    public function getTrainerId() {
        return $this->trainer_id;
    }

    public function setTrainerId($trainer_id) {
        $this->trainer_id = $trainer_id;
    }

    public function save() {
        $db = DatabaseConnection::getDb();

        $stmt = $db->prepare("INSERT INTO Session (session_id, start_date, end_date, max_places, status, training_id, trainer_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$this->session_id, $this->start_date, $this->end_date, $this->max_places, $this->status, $this->training_id, $this->trainer_id]);
    }
}

class Learner {
    private $learner_id;
    private $first_name;
    private $last_name;
    private $email;
    private $password;

    public function __construct($learner_id, $first_name, $last_name, $email, $password) {
        $this->learner_id = $learner_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getLearnerId() {
        return $this->learner_id;
    }

    public function setLearnerId($learner_id) {
        $this->learner_id = $learner_id;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function save() {
        $db = DatabaseConnection::getDb();

        $stmt = $db->prepare("INSERT INTO Learner (learner_id, first_name, last_name, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$this->learner_id, $this->first_name, $this->last_name, $this->email, $this->password]);
    }
}



class Registration {
    private $session_id;
    private $learner_id;
    private $evaluation;

    public function __construct($session_id, $learner_id, $evaluation) {
        $this->session_id = $session_id;
        $this->learner_id = $learner_id;
        $this->evaluation = $evaluation;
    }

    public function getSessionId() {
        return $this->session_id;
    }

    public function setSessionId($session_id) {
        $this->session_id = $session_id;
    }

    public function getLearnerId() {
        return $this->learner_id;
    }

    public function setLearnerId($learner_id) {
        $this->learner_id = $learner_id;
    }

    public function getEvaluation() {
        return $this->evaluation;
    }

    public function setEvaluation($evaluation) {
        $this->evaluation = $evaluation;
    }

    public function save() {
        $db = DatabaseConnection::getDb();

        $sql = "INSERT INTO registration (session_id, learner_id, evaluation) VALUES (:session_id, :learner_id, :evaluation)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':session_id', $this->session_id);
        $stmt->bindParam(':learner_id', $this->learner_id);
        $stmt->bindParam(':evaluation', $this->evaluation);
        $stmt->execute();
    }
}



class Admin {
    private $admin_id;
    private $admin_name;
    private $password;
    public function __construct($admin_id, $admin_name, $password) {
        $this->admin_id = $admin_id;
        $this->admin_name = $admin_name;
        $this->password = $password;
    }
    
    public function getAdminId() {
        return $this->admin_id;
    }
    
    public function setAdminId($admin_id) {
        $this->admin_id = $admin_id;
    }
    
    public function getAdminName() {
        return $this->admin_name;
    }
    
    public function setAdminName($admin_name) {
        $this->admin_name = $admin_name;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function save() {
        $db = DatabaseConnection::getDb();
    
        $stmt = $db->prepare("INSERT INTO Admin (admin_id, admin_name, password) VALUES (?, ?, ?)");
        $stmt->execute([$this->admin_id, $this->admin_name, $this->password]);
    }

}