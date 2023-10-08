<?php
require_once '/var/www/html/php/models/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$user = DB::authenticateUser($username, $password);

		if ($user) {
			session_start();
			$_SESSION['loggedin'] = true;
			header("Location: /pages/home.php");
			exit;
		} else {
			echo "<p>Identifiants invalides. Veuillez réessayer.</p>";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/login.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<section class='container'>
	<div class='loginContainer'>
		<div class='header'>
			<img src="../images/logo.png" alt="logo" />
		</div>
		<div class='signInForm'>
			<form method="post">
				<input type="text" id="username" name="username" placeholder="username" required>
				<input type="password" id="password" name="password" placeholder="password" required>
				<button type="submit" class='log'>Log in</button>
				<div class='signUpContainer'>
					<p>
						Don't have an account?&nbsp;
						<a href="/pages/signup.php" class='su'>Sign up</a>
					</p>
					<span class='su'>Forgot password?</span>
				</div>
			</form>
		</div>
</section>
</html>