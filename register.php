<?php
session_name('learner');
session_start();

require('connect.php');

// define variables to hold error and success messages
$message = "";
$email_error = "";

// check if the first name field is not empty
if (!empty($_POST['first_name'])) {
  // check if the email already exists in the database
  $stmt = $db->prepare("SELECT COUNT(*) FROM Learner WHERE email = :email");
  $stmt->bindParam(':email', $_POST['Email']);
  $stmt->execute();
  $result = $stmt->fetchColumn();

  if ($result > 0) {

      // email already exists, display an error message
      $email_error = 'This email is already registered. Please use a different email.';
      $_SESSION['email_error'] = $email_error;
      header("Location: signup.php");
  } else {
      // email does not exist, proceed with registration

      // hash the password
      $hashed_password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

      // prepare the SQL query to insert data into the Learner table
      $stmt = $db->prepare("INSERT INTO Learner (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)");

      // bind the form data to the prepared statement
      $stmt->bindParam(':first_name', $_POST['first_name']);
      $stmt->bindParam(':last_name', $_POST['last_name']);
      $stmt->bindParam(':email', $_POST['Email']);
      $stmt->bindParam(':password', $hashed_password);

      // execute the prepared statement
      $stmt->execute();

      // registration successful, display a success message
      $successmessage = 'Registration successful!';
      $_SESSION['message'] = $successmessage;

      // Redirect to the sign in page
      header("Location: signin.php");
  }
}


// close the database connection
$db = null;
?>