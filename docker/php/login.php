<?php
require_once "/var/www/php/models/db.php";
require_once "/var/www/php/models/User.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $user = User::authenticateUser($username, $password);

        if ($user) {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["user_id"] = $user->getId();
            header("Location: /home.php");
            exit();
        } else {
            $errors[] = "Invalid username or password. Please try again.";
        }
    } else {
        if (!isset($_POST["username"])) {
            $errors[] = "Username is required.";
        }
        if (!isset($_POST["password"])) {
            $errors[] = "Password is required.";
        }
    }
}

include "/var/www/html/login.html";
?>
