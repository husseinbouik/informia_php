<?php
// start a session and set session variables for the learner's data
session_name('learner');
session_start();
require('connect.php');
require('class.php');

$email =$_POST['email'];
$password = $_POST['password'];

$learner = new Learner();
$learner->set_email($email);
$learner->set_password($password);
$learner->login();
?>
