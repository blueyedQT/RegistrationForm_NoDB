<?php 
session_start();

if(empty($_SESSION['e'])) {
	$_SESSION['e'] = '><';
}
if(empty($_SESSION['fn'])) {
	$_SESSION['fn'] = '><';
}
if(empty($_SESSION['ln'])) {
	$_SESSION['ln'] = '><';
}
if(empty($_SESSION['p'])) {
	$_SESSION['p'] = '><';
}
if(empty($_SESSION['b'])) {
	$_SESSION['b'] = '><';
}
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
	if(!empty($_SESSION['message'])) {
		echo '<h2 class="green">' . $_SESSION['message'] . '</h2>';
		session_destroy();
	}
	?>
	<form action="process.php" method="post" enctype="multipart/form-data">
		<h1>Registration Form</h1>
		<h3>All fields with the * are manditory</h3>
		<p>* Email: <input type="text" name="email" <?php echo $_SESSION['e'] ?>/p>
		<p>* First Name: <input type="text" name="first_name" <?php echo $_SESSION['fn'] ?>/p>
		<p>* Last Name: <input type="text" name="last_name" <?php echo $_SESSION['ln'] ?>/p>
		<p>* Password: <input type="text" name="password" <?php echo $_SESSION['p'] ?>/p>
		<p>* Confirm Password: <input type="text" name="password2" <?php echo $_SESSION['p'] ?>/p>
		<p>Date of Birth: <input type="text" name="birthdate" <?php echo $_SESSION['b'] ?>/p>
		<p>Upload a Profile Picture: <input type="file" name="picture"></p>
		<input type="submit" name="submit" value="Register!">
	</form>
</body>
</html>
<?php 
	unset($_SESSION['e']); 
	unset($_SESSION['fn']);
	unset($_SESSION['ln']);
	unset($_SESSION['p']);
	unset($_SESSION['b']);

?>