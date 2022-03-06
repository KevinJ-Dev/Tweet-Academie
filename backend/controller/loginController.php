<?php
include __DIR__ . '/../utilitaire/session.php';
include __DIR__ . '/../Database/DB.php';
include __DIR__ . '/../routes/index.php';

class LoginController{
    protected $connexion;
    protected $bdd;
    private $email;
    private $password;

    public function __construct($email, $PASSWORD){
        $this->email = $email;
        $this->password = hash_hmac('ripemd160', $PASSWORD, 'secret');
        $this->connexion = new DB();
        $this->bdd = $this->connexion->getDB();
    }

    public function checkAccount(){
        $query = $this->bdd->prepare('select password from users where email = ?');
        $query->execute(array($this->email));
        while ($result = $query->fetch()) {
            if ($result['password'] == $this->password) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function getInfo($mail){
        $info = $this->bdd->prepare('select email from users where email = ? ');
        $info->execute(array($mail));
        return $info->fetch();
    }

    public function basicQuery($newQuery){
        return $this->bdd->query($newQuery);
    }

    public function error($msg){
        echo '<div class="alert alert-danger alert-dismissible fade show">
        <strong>Error!</strong>' . $msg . '</div>';
    }

    public function valide($confirm){
        echo '<div class="alert alert-success" role="alert">
        <strong>Félicitation</strong> ' . $confirm . '.
      </div>';
    }
}

if(!empty($_POST["email"]) && !empty($_POST["password"])) {

    $log = new loginController($_POST['email'], $_POST['password']);
    if ($log->checkAccount()) {
        echo "success";
        $info = $log->getInfo($_POST['email']);
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['connect'] ="yes";

    } else {
        echo "mot de passe et email ne corespondent pas";
    }
}