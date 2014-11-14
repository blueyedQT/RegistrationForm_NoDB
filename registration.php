<?php 
session_start();
var_dump($_SESSION);
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Registration Without DB</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
	if(isset($_SESSION['errors'])) {
		foreach ($_SESSION['errors'] as $error) {
			echo "<p class='error'>" . $error . '</p>';
		}
		// unset($_SESSION['errors']);
	}
	?>
	<form action="process.php" method="post" enctype="multipart/form-data">
		<h1>Registration Form</h1>
		<h3>All fields with the * are manditory</h3>
		<p>* Email: <input type="text" name="email"></p>
		<p>* First Name: <input type="text" name="first_name"></p>
		<p>* Last Name: <input type="text" name="last_name"></p>
		<p>* Password: <input type="text" name="password"></p>
		<p>* Confirm Password: <input type="text" name="password2"></p>
		<p>Date of Birth: <input type="text" name="birthdate"></p>
		<p>Upload a Profile Picture: <input type="file" name="picture"></p>
		<input type="submit" name="submit" value="Register!">
	</form>
</body>
</html>