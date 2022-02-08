<?php
include('backend/Database/DB.php');

class Inscription
{

    protected $dateDeNaissance;
    protected $pseudo;
    protected $email;
    protected $motDePass;
    protected $connection;
    protected $bdd;

    public function __construct($newDN, $newMail, $newMDP, $newPseudo)
    {
        $this->pseudo = $newPseudo;
        $this->dateDeNaissance = $newDN;
        $this->email = $newMail;
        $this->motDePass = $newMDP;
        $this->connection = new DB();
        $this->bdd = $this->connection->insert();
    }

    public function insert()
    {
        $query = $this->bdd->prepare('INSERT INTO users (email,pseudo,password) VALUES (?,?,?)');
        $query->execute(
            array(
                $this->email,
                $this->pseudo,
                hash_hmac('ripemd160', $this->motDePass, 'tweet_academy')
            )
        );

        $queryid = $this->bdd->query('SELECT id FROM `users` order by id desc limit 1 ');
        $result = $queryid->fetch();

        $query2 = $this->bdd->prepare('insert into users (id, birthdate) VALUES (?,?)');
        $query2->execute(
            array(
                $result['id'],
                $this->dateDeNaissance,
            )
        );
    }

    public function checkEmail($email)
    {
        $check = $this->bdd->prepare('select email from users where email=?');
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
        if($queryPseudo->rowCount() >= 1){
            return false;
        }else{
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
