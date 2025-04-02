<?php
require_once "/var/www/php/models/db.php";

header("Location: /login.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $user = DB::authenticateUser($username, $password);

        if ($user) {
            session_start();
            $_SESSION["loggedin"] = true;
            header("Location: /html/home.php");
            exit();
        } else {
            echo "<p>Identifiants invalides. Veuillez réessayer.</p>";
        }
    }
}

include "/var/www/html/index.html";

?>
