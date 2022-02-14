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
include __DIR__ . '/../Database/loginController.php';

session_start();
session_destroy();
session_unset();

if (isset($_POST['submit-connect']) && $_POST['submit-connect'] == "Se connecter") {

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

$loginController = new loginController("sqldka@gmail.com", "dkljfgklj" );
echo $loginController->getInfo("sqldka@gmail.com");
print_r($loginController);