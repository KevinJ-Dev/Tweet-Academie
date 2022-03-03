    <?php
    include __DIR__ . '/../Database/DB.php';

    class Follow
    {
    private $bdd;
    private $connexion;
    protected $user;
    protected $pseudo;


    public function __construct(){
    $this->connexion = new DB();
    $this->bdd =$this->connexion->getDB();
    $this->user;
    $this->pseudo;
    }
    public function addFollow()
    {
    $getFollow = $bdd->prepare('select pseudo from users');
    $getFollow->execute(array($_POST_['pseudo']));
    $profilFollow = $getFollow->fetch();

    }
    public function addFollowing()
    {
    $getFollowing = $bdd->prepare('select pseudo from users');
    $getFollowing->execute(array($_POST_['pseudo']));
    $profilFollowing = $getFollowing->fetch();
    }
    public function postFollow(){

    }
    }