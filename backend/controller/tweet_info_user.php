<?php

use postController as GlobalPostController;

include __DIR__ . '/../Database/DB.php';
include __DIR__ . '/../routes/index.php';

class tweet_info_controller
{

   private $user_id;

   public function __construct()
   {
      // $this->email = $_SESSION["email"];
      $this->connexion = new DB();
      $this->bdd = $this->connexion->getDB();
      $this->user_id = $_POST["user_id"];
   }
   public function get_user() {
      $user = $this->bdd->query("SELECT * from users where id like '$this->user_id'");
      $rows = $user->fetch(PDO::FETCH_ASSOC);
      
     echo $rows["pseudo"];
      
      
   }
   


}


$info_user = new tweet_info_controller();

$info = $info_user->get_user();

if(!empty($info)) {
    echo "success";
    echo $info;
}
