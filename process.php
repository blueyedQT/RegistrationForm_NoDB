<?php
session_start();
var_dump($_POST);
var_dump($_SESSION);
var_dump($_FILES);

$_SESSION['errors'] = array();

if(!empty($_POST)) {
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
		$error = "You did not enter in a valid email address!";
		$_SESSION['errors'][] = $error;
	}
	if(strlen($_POST['first_name']) < 2 || is_numeric($_POST['first_name'])) {
		$error = "You did not enter in a valid first name!";
		$_SESSION['errors'][] = $error;
	}
	if(strlen($_POST['last_name']) < 2 || is_numeric($_POST['last_name'])) {
		$error = "You did not enter in a valid last name!";
		$_SESSION['errors'][] = $error;
	}
	if (strlen($_POST['password']) < 6) {
		$error = "You did not enter in a valid password!";
		$_SESSION['errors'][] = $error;
	}
	if ($_POST['password'] !== $_POST['password2']) {
		$error = "Your password entries do not match";
		$_SESSION['errors'][] = $error;
	}
	// if (!empty($_POST['birthdate'])) {
	// 	$date = explode('-', $_POST['birthdate'], 2);
	// 	var_dump($date);
	// 	$dates = implode(',', $date);
	// 	var_dump($dates);

	// 	// var_dump(checkdate(foreach($date as $dates) {
	// 	// 	$date;
	// 	// });
	// 	// if(checkdate($date2) != true) {
	// 	// $error = "Your birthday was not a vaild entry";
	// 	// $_SESSION['errors'][] = $error;
	// 	// }
	// }
	if(!empty($_FILES['picture'])) {
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES['picture']['name']);
		if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_file)) {
			$error = 'The file has been uploaded!';
		} else {
			$error = 'Error!';
		}
		$_SESSION['errors'][] = $error;
	}
 	header('location: registration.php');
} 
?>