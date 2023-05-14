<?php
// start a session and set session variables for the learner's data
session_name('learner');
session_start();
require('connect.php');
require('class.php');
// Create a new instance of the Learner class
$learner = new Learner();

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    // Save the learner data if the current password is correct
    $learner_saved = $learner->update(
        $email,
        $first_name,
        $last_name,
        $new_password,
        $current_password
    );

    // Check if the learner was saved successfully
    if ($learner_saved) {
        // Redirect to the profile page
        header('Location: profile.php');
        exit;
    } else {
        // Display an error message
        echo 'Error: Unable to save learner data';
    }
}
