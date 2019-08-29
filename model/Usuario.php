<?php
require_once ('../model/Pessoa.php');
class Usuario  extends Pessoa{

    private $id ; 
    private $senha; 
    
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;

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