<?php
require_once "Config.php";

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

    public function getConnection(){
        return $this->conn;
    }
}