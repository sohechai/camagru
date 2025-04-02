<?php

require_once "/var/www/php/config/database.php";

class User
{
    private $id;
    private $username;
    private $email;
    private $password;

    public function __construct($id, $username, $email, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function verifyPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function setPassword($newPassword)
    {
        $this->password = password_hash($newPassword, PASSWORD_DEFAULT);
    }

    public static function createUser($username, $email, $password)
    {
        try {
            $conn = self::getConnection();
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare(
                "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)"
            );
            $stmt->execute([
                ":username" => $username,
                ":email" => $email,
                ":password" => $hashedPassword,
            ]);
            return true;
        } catch (PDOException $e) {
            if ($e->getCode() == "23505") {
                $message = $e->getMessage();
                if (strpos($message, "username") !== false) {
                    return "Un utilisateur avec ce nom d'utilisateur existe déjà.";
                } elseif (strpos($message, "email") !== false) {
                    return "Un compte existe déjà avec cet e-mail.";
                } else {
                    return "Erreur lors de la création du compte.";
                }
            } else {
                throw $e;
            }
        }
    }

    public static function authenticateUser($username, $password)
    {
        $conn = self::getConnection();
        $stmt = $conn->prepare(
            "SELECT * FROM users WHERE username = :username"
        );
        $stmt->execute([":username" => $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user["password"])) {
            return new User(
                $user["id"],
                $user["username"],
                $user["email"],
                $user["password"]
            );
        } else {
            return null;
        }
    }

    public static function getUserById($id)
    {
        $conn = self::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([":id" => $id]);
        $user = $stmt->fetch();

        if ($user) {
            return new User(
                $user["id"],
                $user["username"],
                $user["email"],
                $user["password"]
            );
        } else {
            return null;
        }
    }

    public function updateUsername($newUsername)
    {
        $conn = self::getConnection();
        $stmt = $conn->prepare(
            "UPDATE users SET username = :username WHERE id = :id"
        );
        $stmt->execute([":username" => $newUsername, ":id" => $this->id]);
        return $stmt->rowCount() > 0;
    }

    public function updateEmail($newEmail)
    {
        $conn = self::getConnection();
        $stmt = $conn->prepare(
            "UPDATE users SET email = :email WHERE id = :id"
        );
        $stmt->execute([":email" => $newEmail, ":id" => $this->id]);
        return $stmt->rowCount() > 0;
    }

    public function deleteUser()
    {
        $conn = self::getConnection();
        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute([":id" => $this->id]);
        return $stmt->rowCount() > 0;
    }

    private static function getConnection()
    {
        $dsn =
            "pgsql:host=" .
            $_ENV["POSTGRES_HOST"] .
            ";dbname=" .
            $_ENV["POSTGRES_DB"];
        $conn = new PDO(
            $dsn,
            $_ENV["POSTGRES_USER"],
            $_ENV["POSTGRES_PASSWORD"]
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}
