<?php
require('connect.php');
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
?>