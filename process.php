<?php
session_start();

$okay = array();

if(!empty($_POST)) {
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
		$error = "You did not enter in a valid email address!";
		$_SESSION['e'] = 'class="red"> <small>' . $error . '</small><';
	} else {
		$_SESSION['e'] = 'value="' . $_POST['email'] . '"><';
		$okay['e'] = true;
	}

	if(strlen($_POST['first_name']) < 2 || is_numeric($_POST['first_name'])) {
		$error = "You did not enter in a valid first name!";
		$_SESSION['fn'] = 'class="red"> <small>' . $error . '</small><';
	} else {
		$_SESSION['fn'] = 'value="' . $_POST['first_name'] . '"><';
		$okay['fn'] = true;
	}

	if(strlen($_POST['last_name']) < 2 || is_numeric($_POST['last_name'])) {
		$error = "You did not enter in a valid last name!";
		$_SESSION['ln'] = 'class="red"> <small>' . $error . '</small><';
	} else {
		$_SESSION['ln'] = 'value="' . $_POST['last_name'] . '"><';
		$okay['ln'] = true;
	}

	if (strlen($_POST['password']) < 6 || ($_POST['password'] !== $_POST['password2'])) {
		$error = "You did not enter in a valid password!";
		$_SESSION['p'] = 'class="red"> <small>' . $error . '</small><';
	} else {
		$okay['p'] = true;
	}

	if (!empty($_POST['birthdate'])) {
		$date = explode('-', $_POST['birthdate'], 3);
		if(!empty($date[2])) {
			if(checkdate($date[0], $date[1], $date[2])) {
				$_SESSION['b'] = 'value="'. $_POST['birthdate'] . '"><';
				$okay['b'] = true;
			} 
		} else {
			$error = "Your birthday was not a vaild entry";
			$_SESSION['b'] = 'class="red">' . $error . '<';
			$okay['b'] = false;
		}
	} else {
		$okay['b'] = true;
	}

	if(!empty($_FILES['picture'])) {
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES['picture']['name']);
		if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_file)) {
			$okay['pic'] = true;
		} else {
			$okay['pic'] = false;
		}
	} else {
		$okay['pic'] = true;
	}

	if(($okay['e'] && $okay['fn'] && $okay['ln'] && $okay['p']) && ($okay['d'] !== false || $okay['i'] !== false)) {
		$_SESSION['message'] = 'You have registered!';
	}
 	header('location: registration.php');
} 
?>