<?php

class DB
{
    private $hostName = 'localhost';
    private $dbName = 'commonDatabase';
    private $userName = 'root';
    private $password = 'root';
    private  $rows= [];
    private $connection;
    
    public function __construct()
    {
        $this->connection = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
        /* Vérification de la connexion */
        if ($this->connection->connect_errno) {
            printf("Échec de la connexion : %s\n", $this->connection->connect_error);
            exit();
        }
    }
    
    function get($request){
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
   public function exist($email){

        if ($result = $this->connection->query("SELECT * from user WHERE email like '$email'")) {

            if ($result->num_rows >= 0){
                while($obj = $result->fetch_assoc()){

                  $this->rows[] = $obj;
                }
            }
        }
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

    function get_sports($request){
        $this->rows = [];
        if ($result = $this->connection->query($request)) {
            if ($result->num_rows!= 0){
                while($obj = $result->fetch_assoc()){
                  array_push( $this->rows,$obj);

                }
            }
        }
        return $this->rows;
    }

}


?>