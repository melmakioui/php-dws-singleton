<?php

class RegisterProduct {

    private $validation;
    private $conn;
    private const INSERT = "INSERT INTO tshirts (name,description,price) VALUES (:name,:description,:price)";
    private const SELECT = "SELECT * FROM tshirts";

    public function __construct()
    {
        require_once './validation/Validation.php';
        require_once './config/Connection.php';
        $this->validation = new Validation();
        $this->conn = Connection::getInstance()->getConnection();
    }

    public function insertProduct($inputs){

        $parsedInputs = $this->validateInputs($inputs);

        $values = array(
            ":name"=>$parsedInputs["name"],
            ":description"=>$parsedInputs["description"],
            ":price"=>$parsedInputs["price"]
        );

        $statement = $this->conn->prepare(self::INSERT);
        $result = $statement->execute($values);

        if(!$result) header("Location: ./views/form-alta-producte.php?dberr");
        else header("Location: index.php"); 
            
    }

    public function getList(){

        $statement = $this->conn->prepare(self::SELECT);
        $result = $statement->execute();
        $data = [];

        if($result) 
           while($row = $statement->fetch(PDO::FETCH_ASSOC))
                array_push($data,$row);
           
        return $data;
    }

    public function uploadFile($file){
        
        if(!$this->validation->isValidFile($file))
            header("Location: /views/form-alta-producte.php?errfile=true");
         
            $lastId = $this->conn->lastInsertId();
            $tempDir = $_FILES['file']['tmp_name'];
            $upload = "./views/images";
            $newName = $lastId . ".jpg";  

            return rename($tempDir,$upload . $newName);    
    }
    
    private function validateInputs($inputs){
        if(!$this->validation->isValidInput($inputs))
            header("Location: ./views/form-alta-producte.php?err=true");

        $parsedInputs = $this->validation->parseUserInputs($inputs);

        if(!$this->validation->isNumber($parsedInputs["price"]))
            header("Location: ./views/form-alta-producte.php?err=true");
          
        return $parsedInputs;    
    }


}
?>
