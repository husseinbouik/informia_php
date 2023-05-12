<?php
require('connect.php');
// check if the email and password fields are not empty
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    // prepare the SQL query to select the learner with the given email
    $stmt = $db->prepare("SELECT * FROM Learner WHERE email = :email");
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->execute();
    // fetch the learner's data from the database
    $learner = $stmt->fetch(PDO::FETCH_ASSOC);
    // echo "<pre>";
    // var_dump($learner);
    // echo "</pre>";
    // check if the learner exists and the password is correct
    if ($learner && password_verify($_POST['password'], $learner['password'])) {
        // start a session and set session variables for the learner's data
        session_name('learner');
        session_start();
        $_SESSION['learner_id'] = $learner['learner_id'];
        $_SESSION['first_name'] = $learner['first_name'];
        $_SESSION['last_name'] = $learner['last_name'];
        $_SESSION['email'] = $learner['email'];
        header("Location: Trainings.php");
    } else {
        // the learner does not exist or the password is incorrect, so display an error message
        $error_message = 'Invalid email or password';
        echo  $error_message ;
    }
} else {
    // either the email or password field is empty, so display an error message
    $error_message = 'Please enter your email and password';
    echo  $error_message ;
}
// close the database connection
$db = null;
