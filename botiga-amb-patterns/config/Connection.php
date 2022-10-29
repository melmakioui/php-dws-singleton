<?php

class Connection {

    public static $connection;
    private $conn;
    private $host;
    private $username;
    private $password;

    private function __construct()
    {
        require_once 'config.php';
        $this->host = $db["host"];
        $this->username = $db["user"];
        $this->password = $db["password"];
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