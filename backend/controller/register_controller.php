<?php
include __DIR__ . '/../Database/DB.php';
class Register
{
    
    protected $birthdate;
    protected $name;
    protected $email;
    protected $password;
    protected $userPicture;
    protected $userBanner;
    protected $description;
    protected $theme;
    protected $connexion;
    protected $bdd;
    
    public function __construct($birthdate, $email, $password, $name, $userPicture, $userBanner, $description, $theme)
    {
        $this->name = $name;
        $this->birthdate = $birthdate;
        $this->email = $email;
        $this->password = $password;
        $this->userPicture = $userPicture;
        $this->userBanner = $userBanner;
        $this->description = $description;
        $this->theme = $theme;
        $this->connexion = new DB();
        $this->bdd = $this->connexion->getDB();
    }
    
    public function insert_user()
    {
        $query = $this->bdd->prepare('INSERT INTO users (email,pseudo,password,birthdate,userpp,banner,description,theme) VALUES (?,?,?,?,?,?,?,?)');
        $query->execute(
            array(
                $this->email,
                $this->name,
                hash_hmac('ripemd160', $this->password, 'secret'),
                $this->birthdate,
                $this->userPicture,
                $this->userBanner,
                $this->description,
                $this->theme
                )
            );

        }
        
        public function checkEmail($email)
        {
            $message = "email déjà utilisé";
            $check = $this->bdd->prepare('SELECT * from users where email=?');
            $check->execute(array($email));
            $result = $check->fetch();
            if (!empty($result)) {
                return $message;
            }
            else {
                return false;
            
            }
                
            }
            
            public function checkPseudo($pseudo)
            {
                $message = "pseudo déjà utilisé";
                $check_1 = $this->bdd->prepare('SELECT * from users where pseudo=?');
                $check_1->execute(array($pseudo));
                $result_1 = $check_1->fetch();
                if (!empty($result_1)) {
                    return $message;
                }
                else {
                    return false;
                }
            }
            
            public function error($msg)
            {
                echo '<div class="alert alert-danger alert-dismissible fade show">
                <strong>Error!</strong>' . $msg . '</div>';
            }
            
            public function valide($confirm)
            {
                echo '<div class="alert alert-success" role="alert">
                <strong>Félicitation</strong> ' . $confirm . '.
                </div>';
            }
        }
        


if(!empty($_POST["pseudo"]) && !empty($_POST["email"])) {


        $register_controller = new Register($_POST["birthday"], $_POST["email"], $_POST["password"], $_POST["pseudo"], "userpp","banner","description",8);

        $result2 = $register_controller->checkEmail($_POST["email"]);
        $result3 = $register_controller->checkPseudo($_POST["pseudo"]);
           
      
        if($result2 == false && $result3 == false) {
            echo "good";
            $_SESSION["connect"] = "yes";
             $register_controller->insert_user();
$_SESSION["email"] = $_POST["email"];

        }
        
        elseif($result2 != false ) {
            echo "mail déjà utilisé";
        }
        elseif($result3 != false ) {
            echo "pseudo déjà utilisé";
        }

    }

    else {
        echo "champs manquant * ";
    }
