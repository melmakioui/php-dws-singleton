<?php
require_once "config.php";
var_dump($db);

class Connection {

    public static $connection;
    private $conn;
    private $host = $db["host"];
    private $username = $db["user"];
    private $password = $db["password"];


    private function __construct()
    {
        $this->conn = new PDO($this->host,$this->username,$this->password);
    }

    public static function getInstance () {
        return self::$connection === null ?
        self::$connection = new Connection() :
        self::$connection;
    }
}