<<<<<<< HEAD
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
	
=======
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

    
>>>>>>> criando_classes
    public function getSenha()
    {
        return $this->senha;
    }
<<<<<<< HEAD
 
=======

     
>>>>>>> criando_classes
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
}

<<<<<<< HEAD
?>
=======


?>
>>>>>>> criando_classes
