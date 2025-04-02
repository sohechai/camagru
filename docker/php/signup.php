<?php
require_once "/var/www/php/models/db.php";
require_once "/var/www/php/models/User.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $passwordErrors = validatePassword($password);
    $emailErrors = validateEmail($email);
    $errors = array_merge($errors, $passwordErrors, $emailErrors);

    if (empty($errors)) {
        $creationResult = User::createUser($username, $email, $password);
        if ($creationResult === true) {
            echo "<p>Utilisateur créé avec succès.</p>";
        } else {
            $errors[] = $creationResult;
        }
    }
}

include "/var/www/html/signup.html";

function validatePassword($password)
{
    $errors = [];

    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    }
    if (
        !preg_match("/[A-Z]/", $password) ||
        !preg_match("/[a-z]/", $password) ||
        !preg_match("/\d/", $password) ||
        !preg_match("/[!@#\$%^&*()\-_=+{};:,<.>]/", $password)
    ) {
        $errors[] =
            "Password must contain at least one uppercase letter, one lowercase letter, and one number.";
    }

    return $errors;
}

function validateEmail($email)
{
    $errors = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email already in use.";
    }

    return $errors;
}
?>
