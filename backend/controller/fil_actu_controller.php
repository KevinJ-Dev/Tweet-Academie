<?php
include __DIR__ . '/../Database/DB.php';
include __DIR__ . '/../routes/index.php';

class fil_actu_controller
{
    private $tab;  
    
    public function __construct()
    {
        // $this->email = $_SESSION["email"];
        $this->connexion = new DB();
        $this->bdd = $this->connexion->getDB();
    }
    
    public function get_post()  {
        
        $this->tab = [];
        $post = $this->bdd->query("SELECT * from tweet order by date_post ASC");
        while($rows = $post->fetch(PDO::FETCH_ASSOC)) {
            
            array_push($this->tab,$rows);
        }
        return $this->tab;
    } 
    
    
    
}


$actu = new fil_actu_controller();   
$result = $actu->get_post();


$data = json_encode($result);
print_r($data);


if(!empty($_SESSION["email"])) {
    
    
    
    
    
}
