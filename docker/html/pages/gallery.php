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
	<link rel="stylesheet" href="../css/gallery.css">
</head>

<body>
	<nav class="navbar">
		<div class="navbar-logo">
			<img src="../images/logo.png" alt="Logo">
		</div>
		<div class="navbar-icons">
			<a href="/pages/home.php">Home</a>
			<a href="/pages/gallery.php" class="nav-active">Gallery</a>
			<a href="/pages/login.php">Photo Booth</a>
			<a href="/pages/login.php">Profile</a>
			<i class="fa-solid fa-gear"></i>
		</div>
	</nav>

	<section class="gallery-container">
		<div class="header">
			<div class="header-left">
				Gallery
			</div>
			<div class="header-right">
				TRI
			</div>
		</div>
		<div class="images-container">
			<div class="grid-container">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
				<img src="../images/picture_01.png" alt="img01">
			</div>
		</div>
	</section>

</body>

</html>