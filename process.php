<?php
session_start();
var_dump($_POST);
var_dump($_SESSION);

$_SESSION['errors'] = array();

if(!empty($_POST['email'])) {
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
		$error = "You did not enter in a valid email address!";
		$_SESSION['error'] = $error;
	}
} else {
	$error = 'Enter your email please!';
	$_SESSION['errors'][] = $error;
	// header('location: registration.php');
} if(!empty($_POST['first_name'])) {
	echo $_POST['email'];
} else {
	$error = 'Enter your first name please!';
	$_SESSION['errors'][] = $error;
	// header('location: registration.php');
} 
?>