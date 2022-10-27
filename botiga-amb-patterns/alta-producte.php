<?php
require_once './connexio.php';

//Validation Inputs

if (isInvalidInput())
    header("Location: ./alta-producte.html");


function isInvalidInput()
{
    foreach ($_POST as $key => $value)
        if (isValidInput($value))
            return true;

    if (empty($_FILES['arxiu']["name"]))
        return true;

    return false;
}

function isValidInput($value)
{
    return !isset($value) || empty($value);
}

//Validation Files

if (isInvalidFile()) {
    header("Location: ./form-alta-producte.php");
    die("BadFile");
}

function isInvalidFile()
{
    $maxSize = 512000;
    $validExtensions = array("jpg", "png", "jpeg");

    $fileName = $_FILES['arxiu']['name'];
    $fileSize = $_FILES['arxiu']['size'];
    $fileFeatures = pathinfo($fileName);
    $fileExtension = $fileFeatures['extension'];

    if (!in_array($fileExtension, $validExtensions))
        return true;

    if ($fileSize > $maxSize)
        return true;

    return false;
}


//Insert

$productName = htmlspecialchars($_POST['producte']);
$productDescription = htmlspecialchars($_POST['descripcio']);
$productPrice = htmlspecialchars($_POST['preu']);

echo $productName;
echo $productDescription;
echo $productPrice;

if (!is_numeric($productPrice))
    header("Location: ./alta-producte.html");

insertProduct($productName, $productDescription, $productPrice);


function insertProduct($productName, $productDescription, $productPrice)
{
    $conn = Connexio::connect();
    $sql = sprintf("INSERT INTO camisetes (nom,descripcio,preu) VALUES(\"%s\",\"%s\",\"$productPrice\")", 
    $conn->real_escape_string($productName),$conn->real_escape_string($productDescription));

    if ($conn->query($sql)) {
        $last_id = $conn->insert_id;
        uploadFile($last_id);
        echo "<h3>La imatge s'afegit correctament<h3>";
        echo "<a href='./llista.php'>Torna a la pagina inicial.</a>";
    } else "ERROR";

    $conn->close();
}

function uploadFile($last_id)
{

    $tempDir = $_FILES['arxiu']['tmp_name'];
    $upload = "images/";
    $newName = $last_id . ".jpg";

    rename($tempDir, $upload . $newName);
}
