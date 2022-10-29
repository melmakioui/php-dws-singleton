<?php

class RegisterProduct {

    private $validation;
    private $conn;
    private const INSERT = "INSERT INTO tshirts (name,description,price) VALUES (:name,:description,:price)";

    public function __construct()
    {
        require_once './validation/Validation.php';
        require_once './config/Connection.php';
        $this->validation = new Validation();
        $this->conn = Connection::getInstance()->getConnection();
    }

    public function insertProduct($inputs){

        if(!$this->validation->isValidInput($inputs))
            header("Location: ./views/form-alta-producte.php?err=true");

        $parsedInputs = $this->validation->parseUserInputs($inputs);

        $name = $parsedInputs["name"];
        $description = $parsedInputs["description"];
        $price = $parsedInputs["price"];

        $statement = $this->conn->prepare(self::INSERT);
        $statement->bindParam('name',$name);
        $statement->bindParam('description',$description);
        $statement->bindParam('price',$price);

        $result = $statement->execute();

        if($result)
            echo "Succes";
    }
}


$reg = new RegisterProduct();

$reg->insertProduct(array("name"=>"test","description"=>"abcdefg","price"=>"13.42"));
