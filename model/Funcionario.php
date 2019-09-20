<?php
require_once('Pessoa.php');
class Funcionario extends Pessoa{

        private $telefone;
        private $turno;
	
    public function setTelefone($telefone){
        $this->id = $telefone;
        return $this;
    }

    public function getTelefone(){
        return $this->telefone;

    }

    public function setTurno($turno){
        $this->id = $turno;
        return $this;
    }

    public function getTurno(){
        return $this->turno;

    }
}

?>