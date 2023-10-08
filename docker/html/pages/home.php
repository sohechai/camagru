<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
	header("Location: /pages/login.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="../css/home.css">
	<link rel="stylesheet" href="../css/style.css">
</head>

<body>
	<nav class="navbar">
		<div class="navbar-logo">
			<img src="../images/logo.png" alt="Logo">
		</div>
		<div class="navbar-icons">
			<a href="/pages/home.php" class="nav-active">Home</a>
			<a href="/pages/gallery.php">Gallery</a>
			<a href="/pages/login.php">Photo Booth</a>
			<a href="/pages/login.php">Profile</a>
			<i class="fa-solid fa-gear"></i>
		</div>
	</nav>


	<section class="home-container">
		<div class="title-container">
			<div class="diagonal-title">
				<p>
					Unlock Your Creativity
					<i class="fa-solid fa-shapes"></i>
				</p>
			</div>
			<div class="diagonal-title">
				<p>with Camagru !</p>
			</div>
			<div class="diagonal-title">
				<p>
					Where Images Come to Life
					<i class="fa-solid fa-heart"></i>
				</p>
			</div>
			<div class="button-container">
				<p>
					Start Now
					
				</p>
				<i class="fa-solid fa-arrow-right"></i>
			</div>
		</div>

	</section>

</body>

</html>