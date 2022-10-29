<?php
require_once './validation/RegisterProduct.php';

function isValidInput(){
    foreach($_POST as $data)
        if(!isset($data) || empty($data))
            return false;
    return true;
}

if(!isValidInput())
    header("Location: /views/FormRegisterProduct.php?inerr=true");
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
  



