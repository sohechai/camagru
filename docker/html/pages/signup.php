<?php
require_once '/var/www/html/php/models/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		$userExists = DB::createUser($username, $email, $password);
		echo "<p>$userExists</p>";
		if ($userExists === false) {
			echo "<p>Identifiants invalides. Veuillez réessayer.</p>";
		} else {
			echo "<p>Bienvenue, ". " !</p>";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/signup.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<section class='container'>
	<div class="signUpContainer">
		<div class='header'>
			<img src="../images/logo.png" alt="logo" />
			<p>Sign up to see photos and videos from your friends.</p>
		</div>
		<div class='signUpForm'>
			<form method="post">
				<input type="text" id="email" name="email" placeholder="email" />
				<input type="text" id="username" name="username" placeholder="username" />
				<input type="text" id="password" name="password" placeholder="password" />
				<button class='su'>Sign up</button>
				<div class='signInContainer'>
					<p>
						Have an account?&nbsp;
						<a href="/pages/login.php" class='si'>Log in</span>
					</p>
				</div>
			</form>
		</div>
	</div>
</section>

</html>