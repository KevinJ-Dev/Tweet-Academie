<?php
include __DIR__ . '/../Database/DB.php';


// A REVOIR LES NOM EXACTE

class Inscription
{
    
    protected $dateDeNaissance;
    protected $pseudo;
    protected $mail;
    protected $motDePass;
    protected $birthdate;
    protected $userpp;
    protected $banner;
    protected $description;
    protected $theme;
    protected $user_date;
    protected $connexion;
    protected $bdd;
    
    public function __construct($newDN, $newMail, $newMDP, $newPseudo,$userpp,$banner,$description,$theme)
    {
        $this->pseudo = $newPseudo;
        $this->dateDeNaissance = $newDN;
        $this->mail = $newMail;
        $this->motDePass = $newMDP;
        $this->userpp = $userpp;
        $this->banner = $banner;
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
                $this->mail,
                $this->pseudo,
                hash_hmac('ripemd160', $this->motDePass, 'secret'),
                $this->dateDeNaissance,
                $this->userpp,
                $this->banner,
                $this->description,
                $this->theme
                )
            );
            //INNERJOIN ID USER ET ID FOLLOWER
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
        
        // $register_controller = new Inscription("2018-09-24", "dkljfgklj", "dkslfj","kjhkjhkjh","jhkjhkjh","ldskfmlksd","dkslfj",8);

if(!empty($_POST["pseudo"]) && !empty($_POST["email"])) {


        $register_controller = new Inscription($_POST["birthday"], $_POST["email"], "description", $_POST["pseudo"],"userpp","banner",$_POST["password"],8);

        $result2 = $register_controller->checkEmail($_POST["email"]);   
        $result3 = $register_controller->checkPseudo($_POST["pseudo"]);
           
      
        if($result2 == false && $result3 == false) {
            echo "c'est good";
            
             $register_controller->insert_user();
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
