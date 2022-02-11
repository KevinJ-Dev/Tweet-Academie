<?php
include __DIR__ . '/../Database/DB.php';
include __DIR__ . '/../utilitaire/hash.php';


// A REVOIR LES NOM EXACTE

class Inscription
{

    protected $dateDeNaissance;
    protected $pseudo;
    protected $mail;
    protected $motDePass;
    protected $connexion;
    protected $bdd;

    public function __construct($newDN, $newMail, $newMDP, $newPseudo)
    {
        $this->pseudo = $newPseudo;
        $this->dateDeNaissance = $newDN;
        $this->mail = $newMail;
        $this->motDePass = $newMDP;
        $this->connexion = new DB();
        $this->bdd = $this->connexion->getDB();
    }

    public function insert()
    {
        $query = $this->bdd->prepare('INSERT INTO users (mail,pseudo,password) VALUES (?,?,?)');
        $query->execute(
            array(
                $this->mail,
                $this->pseudo,
                hash_hmac('ripemd160', $this->motDePass, 'vive le projet tweet_academy')
            )
        );

        $query2 = $this->bdd->prepare('insert into users (birthday) VALUES (?)');
        $query2->execute(
            array(
                $result['id'],
                $this->dateDeNaissance,
            )
        );

        //INNERJOIN ID USER ET ID FOLLOWER

        $addFollow = $this->bdd->prepare('insert into follow(id,follower_id) values (?, " ")');
        $addFollow->execute(array($result['id']));
    }

    public function checkEmail($email)
    {
        $check = $this->bdd->prepare('select mail from users where mail=?');
        $check->execute(array($email));

        if ($check->rowCount() >= 1) {
            return false;
        } else {
            return true;
        }
        
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

$register_controller = new register_controller();
$register_controller->hash();
$register_controller->insert();

print_r($register_controller);