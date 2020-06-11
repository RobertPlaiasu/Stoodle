<?php

class Database 
{

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $databaseName = "stoodle";


    protected function connection()
    {

        $databaseConection = 'mysql:host=' . $this->host . ';dbname=' . $this->databaseName;
        $pdo = new PDO( $databaseConection, $user, $password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;

    }
    
}