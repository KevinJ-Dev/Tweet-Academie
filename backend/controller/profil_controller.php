<?php
include __DIR__ . '/../Database/DB.php';

// A AJOUTER LE GET DES TWEETS

class profil
{
    protected $user;
    protected $id;
    protected $dateDeNaissance;
    protected $pseudo;
    protected $mail;
    protected $motDePass;
    protected $userpp;
    protected $banner;
    protected $description;
    protected $theme;
    protected $connexion;
    protected $bdd;

    public function __construct($newUser,$newDN,$newPseudo, $newMail, $newMDP,$userpp,$banner,$description,$theme)
    {
        $this->user = $newUser;
        $this->setId();
        $this->dateDeNaissance = $newDN;
        $this->pseudo = $newPseudo;
        $this->mail = $newMail;
        $this->motDePass = $newMDP;
        $this->userpp = $userpp;
        $this->banner = $banner;
        $this->description = $description;
        $this->theme = $theme;
        $this->connexion = new DB();
        $this->bdd = $this->connexion->getDB();
    }

    public function setId()
    {
        $getId = $this->bdd->prepare('select id from users where pseudo=?');
        $getId->execute(array($this->user));
        $userid = $getId->fetch();
        $this->id = $userid['id'];
    }

    public function checkUserExist()
    {
        $check = $this->bdd->prepare('select pseudo from users where pseudo =?');
        $check->execute(array($this->user));
        if ($check->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getFollower($id)
    {
        $queryfollower = $this->bdd->query('select count(follower_id) from follow');
        $resultat = $queryfollower->fetch();
        echo $resultat['count(follower_id)'];
    }
    public function getFollowing($id)
    {
        $queryFollowing = $this->bdd->query('select count(following_id) from follow');
        $resultat = $queryFollowing->fetch();
        echo $resultat['count(following_id)'];
    }












    public function basicQuery($newQuery)
    {
        return $this->bdd->query($newQuery);
    }
}
