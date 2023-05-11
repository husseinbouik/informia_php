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

    // check if the learner exists and the password is correct
    if ($learner && password_verify($_POST['password'], $learner['password'])) {

        session_name('user');
        // the password is correct, so set the session variables and redirect to the appropriate interface
        session_start();
        $_SESSION['learner_id'] = $learner['learner_id'];
        $_SESSION['first_name'] = $learner['first_name'];
        $_SESSION['last_name'] = $learner['last_name'];
        $_SESSION['email'] = $learner['email'];
        header("Location:homepage.php");
        
    } else {
        // the learner does not exist or the password is incorrect, so display an error message
        echo 'Invalid Email or Password';
    }

} else {
    // either the Email or Password field is empty, so display an error message
    echo 'Please enter your Email and Password';
}
// Redirect to the collection home page
// header("Location:check_email.php");
?>