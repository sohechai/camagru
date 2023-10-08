<?php

require_once '/var/www/html/php/config/database.php';

class DB {
    private static $conn;

    public static function getConnection() {
        if (!isset(self::$conn)) {
            $dsn = 'pgsql:host=' . $_ENV['POSTGRES_HOST'] . ';dbname=' . $_ENV['POSTGRES_DB'];
            self::$conn = new PDO($dsn, $_ENV['POSTGRES_USER'], $_ENV['POSTGRES_PASSWORD']);
        }
        return self::$conn;
    }

    public static function createUser($username, $email, $password) {
		$conn = self::getConnection();
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		$rowCount = $stmt->rowCount();
	
		if ($rowCount > 0) {
			return false;
		} else {
			$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $hashedPassword);
			$stmt->execute();
			return true;
		}
	}
	

    public static function authenticateUser($username, $password) {
        $conn = self::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}
