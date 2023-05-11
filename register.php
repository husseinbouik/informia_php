<?php
require('connect.php');

// check if the first name field is not empty
if (!empty($_POST['first_name'])) {
    // hash the password
    $hashed_password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    // prepare the SQL query to insert data into the Learner table
    $stmt = $db->prepare("INSERT INTO Learner ( first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)");

    // bind the form data to the prepared statement
    $stmt->bindParam(':first_name', $_POST['first_name']);
    $stmt->bindParam(':last_name', $_POST['last_name']);
    $stmt->bindParam(':email', $_POST['Email']);
    $stmt->bindParam(':password', $hashed_password);

    // execute the prepared statement
    $stmt->execute();
} else {
    echo 'Please enter your first name';
}

// close the database connection
$db = null;

// Redirect to the sign in page
// header("Location: signin.php");
?>