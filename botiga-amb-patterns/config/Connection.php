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
        $db = DbParameters::getParameters();
        $this->host = $db["host"];
        $this->username = $db["user"];
        $this->password = $db["password"];
        try{
            $this->conn = new PDO($this->host,$this->username,$this->password);
        }catch(PDOException $error){
            print "Error " . $error;
        }
    }

    public static function getInstance () :object {
        return self::$connection === null ?
        self::$connection = new Connection() :
        self::$connection;
    }

    public function getConnection() :object{
        return $this->conn;
    }
}