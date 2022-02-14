<?php
include __DIR__ . '/../Database/DB.php';
class loginController
{
    protected $connexion;
    protected $bdd;
    private $email;
    private $motDePass;

    public function __construct($newMail, $newMDP)
    {
        $this->email = $newMail;
        $this->motDePass = hash_hmac('ripemd160', $newMDP, 'secret');
        $this->connexion = new DB();
        $this->bdd = $this->connexion->getDB();
    }

    public function checkAccount()
    {
        $query = $this->bdd->prepare('select password from users where email = ?');
        $query->execute(array($this->email));
        while ($result = $query->fetch()) {
            if ($result['password'] == $this->motDePass) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function getInfo($mail)
    {
        $info = $this->bdd->prepare('select email from users ');
        $info->execute(array($mail));
        return $info->fetch();
    }

    public function basicQuery($newQuery)
    {
        return $this->bdd->query($newQuery);
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

if(!empty($_POST["email"]) && !empty($_POST["password"])) {

    $log = new loginController($_POST['email'], $_POST['password']);
    if ($log->checkAccount()) {
        session_start();
        $info = $log->getInfo($_POST['email']);
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        header('location:login.php');
    } else {
        $log->error('Adresse mail ou mot de passe incorrecte');
    }
}

