<?php
include __DIR__ . '/../Database/DB.php';
include __DIR__ . '/../utilitaire/hash.php';
include "../Tweet-Academie/backend/utilitaire/hash.php";
class register_controller
{
    protected $pseudo;
    protected $email;
    protected $password;
    protected $dateDeNaissance;
    protected $motDePass;
    protected $connection_valid;
    protected $password_hash;
    
    
    
    public function __construct()
    { 
        $this->pseudo = $_POST["peudo"];
        $this->email = $_POST["email"];
        $this->motDePass = $_POST["password"]; 
        $this->dateDeNaissance = $_POST["birthdate"];
        
        $this->connection = $_POST["connection"];   
    }   
    
    
    public function hash() {
        
        $hash = new hash();
        $this->password_hash = $hash->hash($this->motDePass);
        
    }
    
    public function insert() {
        $register = new DB();
        // check email
        $check = $register->get_email("SELECT * from users WHERE email like 'sqldka@gmail.com'");
        
        $test = $register->get_all("SELECT * from users WHERE email like 'sqldka@gmail.com'");
        foreach ($test as $val) {
            echo $val['password'];

          
        }
            
            if (empty($check)) {
                echo "all-good";
                $register->insert("INSERT INTO users(pseudo,email,password,birthdate,userpp,banner,description,theme,user_date) VALUES('dsfsdfsdf','sqldka@gmail.com','asdqsdq','2018-09-24','dfssdf','erzzz','sdjklkj','8','2018-09-24')");
                
            } else {
                echo "Votre mail est déjà utilisé";
                
                
            }
        }
        
    }
    
    
    $register_controller = new register_controller();
    $register_controller->hash();
    $register_controller->insert();
    
    print_r($register_controller);