<?php
include __DIR__ . '/../Database/DB.php';
include __DIR__ . '/../routes/index.php';

class fil_actu_controller
{
    
    
    public function __construct()
    {
        // $this->email = $_SESSION["email"];
        $this->connexion = new DB();
        $this->bdd = $this->connexion->getDB();
    }
    
    public function get_post()  {
        
        $post = $this->bdd->query("SELECT * from tweet order by date_post ASC");
       $rows = $post->fetch(PDO::FETCH_ASSOC);
        return $rows;
    } 
}


$actu = new fil_actu_controller();   
$result = $actu->get_post();

$json = json_encode($result);

print_r($json);


if(!empty($_SESSION["email"])) {
    
    
    
    
    
}

