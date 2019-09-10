<?php
class DataBase {
    public static $connection;

    public static function connect()
    {
        try{
            $dsn = "mysql:host=".DB_HOSTNAME.";port=".DB_PORT.";dbname=".DB_DATABASE.";charset=utf8";
            self::$connection = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die;
        }
    }
}
