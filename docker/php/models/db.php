<?php

require_once "/var/www/php/config/database.php";

class DB
{
    private static $conn;

    public static function getConnection()
    {
        if (!isset(self::$conn)) {
            $dsn =
                "pgsql:host=" .
                $_ENV["POSTGRES_HOST"] .
                ";dbname=" .
                $_ENV["POSTGRES_DB"];
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            self::$conn = new PDO(
                $dsn,
                $_ENV["POSTGRES_USER"],
                $_ENV["POSTGRES_PASSWORD"],
                $options
            );
        }
        return self::$conn;
    }
}
