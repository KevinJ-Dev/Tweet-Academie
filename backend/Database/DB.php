<?php

class DB
{
    private $hostName = 'localhost';
    private $dbName = 'commonDatabase';
    private $userName = 'root';
    private $password = 'root';
    private  $rows= [];
    private $connection;
    private $email;

    
    public function __construct()
    {
        $this->connection = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
        /* Vérification de la connexion */
        if ($this->connection->connect_errno) {
            printf("Échec de la connexion : %s\n", $this->connection->connect_error);
            exit();
        }
    }
    
    function get_email($request){
        $this->rows = [];
        if ($result = $this->connection->query($request)) {
            if ($result->num_rows!= 0){
                while($obj = $result->fetch_assoc()){
                   $this->rows = $obj["email"];

                }
            }
        }
        return $this->rows;
    }

  
   public function get_user() {
        return $this->rows;
    }

    function insert($request){
        $this->connection->query($request);
    }


function get_all($requetas)
{
    $this->rows = [];
    if ($result = $this->connection->query($requetas)) {
        if ($result->num_rows!= 0) {
            while ($obj = $result->fetch_assoc()) {
                $this->rows [] = $obj;
                
            }
        }
    }

    return $this->rows;
}




    // app controller


}


?>