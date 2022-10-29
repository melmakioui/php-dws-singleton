<?php

class Validation
{

    private const MAX_FILE_SIZE = 512000;
    private const FILE_VALID_EXTENSIONS = array("jpg","png","jpeg");

    public function __construct()
    {
    }

    public function isValidInput($inputs)
    {
        foreach ($inputs as $value)
            if (!isset($value) || empty($value))
                return false;
        return true;
    }

    public function isValidFile($file) :bool
    {    
        $fileName = $file['file']['name'];
        $fileSize = $file['file']['size'];
        $fileFeatures = pathinfo($fileName);
        $fileExtension = $fileFeatures['extension'];

        if(!in_array($fileExtension,self::FILE_VALID_EXTENSIONS))
            return false;
        
        if($fileSize > self::MAX_FILE_SIZE)
            return false;

       return true;     
    }

    public function parseUserInputs($inputs)
    {
        foreach($inputs as $key => $value)
            $inputs[$key] = htmlspecialchars(stripslashes($value));
        
       return $inputs;     
    }

    public function isNumber($num){
        return is_numeric($num);
    }
    
}