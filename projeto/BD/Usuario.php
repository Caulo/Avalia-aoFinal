<?php


class Usuario {
    
    private $id;
    
    
    private  $email, $password;
    private $tabela;
    
    public function __construct($data=null){
       $this->tabela="usuario";
       
       if ( ! empty($data)  ) {
            $this->hydration($data);
       }
        
    }
    
    public function hydration($data) {
        
        if (isset($data["id"])) {
            $this->id = $data["id"];
        }
        if (isset($data["email"])) {
            $this->email = $data["email"];
        }
        if (isset($data["password"])) {
            $this->password = $data["password"];
        }
        
    }

    
    
    function getInsert() {
        $sql = "insert into ".$this->tabela." (email,password) 
        values ('".$this->email."','".$this->password."')";
        
        return $sql;
    }
    function getUpdate() {
        return "update ".$this->tabela.
                " set email='".$this->email."', password='".$this->password.
                "' where id = ".$this->id;
    }
    function getDelete() {
        return "delete  from ".$this->tabela.
                " where id = ".$this->id;
    }
    
    function getSelect() {
        $sql = "select * from ".$this->tabela;
    }
    
    function getSelectById($id) {
        return "select * from ".$this->tabela." where id = $id ";
    }
}


?>