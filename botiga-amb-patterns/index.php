<?php
require_once './validation/RegisterProduct.php'; 


if(!isset($_POST) || !isset($_FILES))
    header("Location: /views/List.php");
else {
    $register = new RegisterProduct();

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
        
    $register->insertProduct($_POST);
    $register->uploadFile($_FILES);
    unset($_POST);
    unset($_FILES);
        
    header("Location: /views/List.php");   
}           
  


