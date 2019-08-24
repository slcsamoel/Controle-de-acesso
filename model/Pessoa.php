<?php

class Pessoa
{
    private $id;
    private $nome;
    private $cpf;
    private $dataNascimento;
    private $sexo;
    
    
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }
    
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }
   
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

   
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

   

    
}