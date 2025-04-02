<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: /login.php");
    exit();
}

include "/var/www/html/profile.html";
?>
