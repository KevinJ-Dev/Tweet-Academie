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
        $login->insert("INSERT INTO users(pseudo,email,password,birthdate,userpp,banner,description,theme,user_date) VALUES('dsfsdfsdf','sqldka@gmail.com','asdqsdq','2018-09-24','dfssdf','erzzz','sdjklkj','8','2018-09-24')");
    }
}



    $loger = new loginController();

    $loger->login();



?>