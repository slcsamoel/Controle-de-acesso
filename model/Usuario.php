<?php 
require_once('Pessoa.php');

class Usuario extends Pessoa {

    private $id;
    private $senha;


    

    
    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    
    public function getSenha()
    {
        return $this->senha;
    }

     
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
}



?>
