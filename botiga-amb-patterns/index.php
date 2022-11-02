<?php
require_once './validation/RegisterProduct.php'; 


if(!isValidInput() || !isUploadedFile()){
    header("Location: /views/List.php");
}else {
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
  


function isValidInput(){
    foreach($_POST as $data)
        if(!isset($data) || empty($data))
            return false;
    return true;
}

function isUploadedFile(){
    if(!isset($_FILES) || empty($_FILES))
        return false;
    $fileDirectory = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];

    return file_exists($fileDirectory) ||
           is_uploaded_file($fileName);
}