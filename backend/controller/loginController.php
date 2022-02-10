<?php 


include __DIR__ . '/../Database/DB.php';





class loginController {
    
    
    private $email;
    private $password;
    
    
    public function __construct()
    {
        // $this->email = $_POST["email"];
        // $this->password = $_POST["password"];
    }
    
    public function login() {
        $login = new DB();       
    }
}



    $loger = new loginController();

    $loger->login();



?>