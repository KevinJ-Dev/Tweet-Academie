<?php
class DB{
    protected $bdd;

    public function __construct(){
        try {
            $this->bdd = new PDO('mysql:dbname=common-database.sql;host=localhost', 'root', 'root');
        } catch (Exception $e) {
            die('Connexion échoué :' . $e->getMessage());
        }
    }
    
    public function getDB(){
        return $this->bdd;
        // var_dump($this->bdd);
    }
    
    public function insert($req){
        $this->bdd->query($req);
        // var_dump($this->bdd);
    }
}