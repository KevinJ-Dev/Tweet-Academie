<?php 

include "../Database/DB.php";

class loginController {
    
    
    private $email;
    private $password;
    
    
    
    
    public function __construct()
    {
        
        $this->email = $_POST["email"];
        $this->password = $_POST["password"];
        
    }
    
    
    
    public function login() {
        $login = new DB();
        
        $login->get("SELECT * where email like '$this->email'");

        
        
    }
}





?>