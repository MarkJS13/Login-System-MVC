<?php

class Dbh {
    private $server = 'localhost';
    private $usern = 'root';
    private $pass = 'password';
    private $db = 'login-system';


    protected function connect() {
        try {
            $pdo = new PDO("mysql:host=$this->server;dbname=$this->db", $this->usern, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
            
            return $pdo;

        } catch(PDOException $e) {
           echo 'Error: ' . $e->getMessage();
           die();
        }
    }

}

