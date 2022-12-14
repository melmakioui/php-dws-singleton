<?php

class RegisterProduct {

    private $validation;
    private $conn;
    private const INSERT = "INSERT INTO tshirts (name,description,price) VALUES (:name,:description,:price)";
    private const SELECT = "SELECT * FROM tshirts";
    private const SELECT_PRODUCT = "SELECT * FROM tshirts WHERE id = :id";


    public function __construct()
    {
        require_once 'Validation.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/config/Connection.php';
        $this->validation = new Validation();
        $this->conn = Connection::getInstance()->getConnection();
    }

    public function insertProduct($inputs) :void {

        $parsedInputs = $this->validateInputs($inputs);

        $values = array(
            ":name"=>$parsedInputs["name"],
            ":description"=>$parsedInputs["description"],
            ":price"=>$parsedInputs["price"]
        );

        $statement = $this->conn->prepare(self::INSERT);
        $result = $statement->execute($values);

        if(!$result) header("Location: /views/FormRegisterProduct.php?err=true");
        else header("Location: /views/List.php"); 
            
    }

    public function getList() :array {

        $statement = $this->conn->prepare(self::SELECT);
        $result = $statement->execute();
        $products = [];

        if($result) 
           while($row = $statement->fetch(PDO::FETCH_ASSOC))
                array_push($products,$row);
           
        return $products;
    }

    public function getProduct($id) :array{
        
        $statement = $this->conn->prepare(self::SELECT_PRODUCT);
        $statement->bindParam('id',$id);
        $result = $statement->execute();
        $product = [];

        if($result) 
           while($row = $statement->fetch(PDO::FETCH_ASSOC))
                array_push($product,$row);

        return $product;        
    }


    public function uploadFile($file) :void{
        
        if(!$this->validation->isValidFile($file))
            header("Location: /views/FormRegisterProduct.php?errfile=true");
         
            $lastId = $this->conn->lastInsertId();
            $tempDir = $_FILES['file']['tmp_name'];
            $upload = "./views/images/";
            $newName = $lastId . ".jpg";  

            rename($tempDir,$upload . $newName);    
    }
    
    private function validateInputs($inputs) :array{
        if(!$this->validation->isValidInput($inputs))
            header("Location: ./views/FormRegisterProduct.php?err=true");

        $parsedInputs = $this->validation->parseUserInputs($inputs);

        if(!$this->validation->isNumber($parsedInputs["price"]))
            header("Location: ./views/FormRegisterProduct.php?err=true");
          
        return $parsedInputs;    
    }
}

?>
