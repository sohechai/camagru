<?php
session_start();

$is_logged_in = isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true;

require_once "/var/www/php/models/Image.php";
require_once "/var/www/php/models/User.php";

$userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
$user = User::getUserById($userId);
$username = $user ? $user->getUsername() : "Utilisateur non trouvé";
$recentImages = Image::getAllImages();

include "/var/www/html/gallery.html";
?>
