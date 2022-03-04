<?php
include __DIR__ . '/../Database/DB.php';
include __DIR__ . '/../routes/index.php';

class fil_actu_controller
{
    private $tab;  
    private $tab_user;
    private $id_user;
    public function __construct()
    {
        // $this->email = $_SESSION["email"];
        $this->connexion = new DB();
        $this->bdd = $this->connexion->getDB();
    }
    
    public function get_post()  {
        $this->tab_user = [];
        $this->tab = [];
        $post = $this->bdd->query("SELECT * from tweet order by date_post ASC INNER JOIN");

        
        // while($rows = $post->fetch(PDO::FETCH_ASSOC)) {
        //     $user = $rows["id_user"];
            
        //     $post_user = $this->bdd->query("SELECT * from users where id like '$user'");
        //     array_push($this->tab,$rows);

            
        //     while ($rows_user=$post_user->fetch(PDO::FETCH_ASSOC)) {
        //         array_push($this->tab_user, $rows_user["pseudo"] , $rows_user["id"]);
        //     }
        // }




        return $this->tab;
        
    } 
    
    
    
}


$actu = new fil_actu_controller();   
$result = $actu->get_post();


$data = json_encode($result);
print_r($data);


if(!empty($_SESSION["email"])) {
    
    
    
    
    
}






