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
    
    public function __construct($newDN, $newMail, $newMDP, $newPseudo,$userpp,$banner,$description,$theme )
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
            $check = $this->bdd->prepare('SELECT * from users where email=?');
            $check->execute(array($this->mail));
            $result = $check->fetch();

            print_r($result);
            // if ($result->rowCount() >= 1) {
            //     // return false; 
            //     echo "fabien";
            // } else {
            //     // return true;
            // echo "makele";
            // }
            
        }
        
        public function checkPseudo($pseudo)
        {
            $queryPseudo = $this->bdd->prepare('select pseudo from users where pseudo=?');
            $queryPseudo->execute(array($pseudo));
            if ($queryPseudo->rowCount() >= 1) {
                return false;
            } else {
                return true;
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
    
    
    // $query = $this->bdd->prepare('INSERT INTO users (email,pseudo,password,birthdate,userpp,banner,description,theme,user_date) VALUES (?,?,?,?,?,?,?,?,?)');
    
    $register_controller = new Inscription("2018-09-24", "dkljfgklj", "dkslfj","kjhkjhkjh","jhkjhkjh","ldskfmlksd","dkslfj",8);
    echo $register_controller->checkEmail("sqldka@gmail.com");
    print_r($register_controller);
    
    
    