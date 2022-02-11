<?php

class DB
{
    private $hostName = 'localhost';
    private $dbName = 'commondatabase';
    private $userName = 'mooli';
    private $password = '';
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

    public function getDB()
    {
        return $this->bdd;
        // var_dump($this->bdd);
    }
}
