<?php
include __DIR__ . '/../Database/DB.php';
include __DIR__ . '/../routes/index.php';

class postController
{
   private $email;
   protected $connexion;
   protected $bdd;
   private $user_id;
   private $user_email;
   private $user_pseudo;
   private $text_post;
   
   public function __construct()
   {
      // $this->email = $_SESSION["email"];
      $this->connexion = new DB();
      $this->bdd = $this->connexion->getDB();
      $this->text_post = $_POST["comment"];
   }
   public function set_user() {
      $user = $this->bdd->query("SELECT * from users where email like 'klsdfj@gmail.com'");
      $rows = $user->fetch(PDO::FETCH_ASSOC);
      
      $this->user_email = $rows["email"];
      $this->user_id = $rows["id"];
      $this->user_pseudo= $rows["pseudo"];
      
      
   }
   
   public function get_user_id() {
      return $this->user_id;
   }
   
   public function addTweet() {
      
      $this->bdd->query("INSERT INTO tweet (id_user, text_post, link_post,img_post,video_post)
      VALUES ('$this->user_id', '$this->text_post', 'dklsfj', 'dsklfjsdkfj','sdkfljsdklfj')");
      
      
   }
   

}




if(!empty($_SESSION["email"]) && !empty($_POST["comment"])) {
   
   
   $tweet = new postController();   
$tweet->set_user();
echo $tweet->get_user_id();

$tweet->addTweet();
   
   
}

