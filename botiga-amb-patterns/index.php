<?php
require_once './validation/RegisterProduct.php';


function isValidInput(){
return
    isset($_POST["name"]) &&
    isset($_POST["description"]) &&
    isset($_POST["price"]) &&
    isset($_FILES["file"]);
}

if(!isValidInput())
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
  



