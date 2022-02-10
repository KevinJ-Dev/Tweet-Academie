<?php
include __DIR__ . '/../Database/DB.php';
include __DIR__ . '/../utilitaire/hash.php';
class loginController
{
    protected $connection;
    protected $bdd;
    private $mail;
    private $motDePass;

    public function __construct($newMail, $newMDP)
    {
        $this->mail = $newMail;
        $this->motDePass = hash_hmac('ripemd160', $newMDP, 'secret');
        $this->connection = new DB();
        $this->bdd = $this->connection->getDB();
    }

    public function checkAccount()
    {
        $query = $this->bdd->prepare('select password from users where mail = ?');
        $query->execute(array($this->mail));
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