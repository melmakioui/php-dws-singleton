<?php

class Connexio
{

  public static function connect()
  {

    $conn = new mysqli('mysql', 'root', 'root', 'myDB');

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
  }
}
