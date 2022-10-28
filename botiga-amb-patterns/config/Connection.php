<?php

class Connection {

    public static $connection;

    private function __construct()
    {

    }

    public static function getInstance () {
        return self::$connection === null ?
        self::$connection = new Connection() :
        self::$connection;
    }
}