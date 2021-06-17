<?php

class Banco {
    
    private $pdo;
    
    function __construct(){
        
        $user = 'root';
        $pass = '';

        $this->pdo = new PDO('mysql:host=localhost;dbname=site', $user, $pass);
    }
    
    
    function query($sql){
        return $this->pdo->query($sql);
    }
    
    
     
    function exec($sql){
        return $this->pdo->exec($sql);
    }
    
}



?>