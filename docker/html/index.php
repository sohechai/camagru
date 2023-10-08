<?php
require_once '/var/www/html/php/models/db.php';

header("Location: /pages/login.php");

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
	<title>Camagru</title>
	<link rel="stylesheet" href="./css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Quicksand:wght@300&display=swap"
		rel="stylesheet">
</head>

<body>
	<section class="container">
		<login>
			<?php include "./pages/login.php"; ?>
		</login>
	</section>
</body>

</html>