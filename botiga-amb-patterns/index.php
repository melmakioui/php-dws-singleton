<?
require_once './validation/RegisterProduct.php';


    if( !isset($_POST['name']) && 
        !isset($_POST['description']) && 
        !isset($_POST['price']) &&
        !isset($_FILES['file']))
           header("Location: ./views/List.php?err=true");



  
$register = new RegisterProduct();

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];


$register->insertProduct($_POST);
$register->uploadFile($_FILES);

require_once './views/List.php';



