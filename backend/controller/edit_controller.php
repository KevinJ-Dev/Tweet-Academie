<?php
include __DIR__ . '/../Database/DB.php';

class Edit
{
    private $email;
    private $pseudo;
    private $password;
    protected $connexion;
    protected $bdd;

    public function __construct()
    {
        $this->connexion = new DB();
        $this->bdd = $this->connexion->getDB();
    }

    public function changePseudo()
    {
        if (isset($_POST['Pseudo'])) {
            $newPseudo = $_POST['changePseudo'];
            $email = $_SESSION['login'];
            if (($newPseudo != '')) {
                $sql = "UPDATE users SET pseudo = '$newPseudo' WHERE email = '$email'";
                $stmt = $this->bdd->prepare($sql);
                $stmt->execute();
                $_SESSION['pseudo'] = $newPseudo;
                echo 'Votre pseudo a bien été modifié !';
            }
        }
    }

    public function changepassword(){
        if(isset($_POST['subpassword'])) {
            $this->password = $_POST['currentpassword'];
            $newpassword = $_POST['newpassword'];
            $verifpassword = $_POST['changepassword'];
            $email = $_SESSION['login'];
            $newpassword = hash_hmac('ripemd160', $newpassword, 'secret');
            if (($this->password != '') && ($newpassword != '') && ($verifpassword != '')) {
                if ($newpassword == $verifpassword) {
                    $sql = "UPDATE users SET password ='$newpassword' WHERE email = '$email'";
                    $stmt = $this->bdd->prepare($sql);
                    $stmt->execute();
                    $_SESSION['password'] = $newpassword;
                    echo 'Votre mot de passe a bien été modifié !';
                }
            }
        }
    }
    public function changeemail()
    {
        if (isset($_POST['subemail'])) {
            $newemail = $_POST['changeemail'];
            $email = $_SESSION['login'];
            if (($newemail != '')) {
                $sql = "UPDATE users SET email ='$newemail' WHERE email = '$email'";
                $stmt = $this->bdd->prepare($sql);
                $stmt->execute();
                $_SESSION['login'] = $newemail;
                echo 'Votre adresse-email a bien été modifiée !';
            }
        }
    }
}
