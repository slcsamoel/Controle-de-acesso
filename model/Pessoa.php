<?php

class Pessoa
{
    private $id;
    private $nome;
    private $cpf;
    private $dt_nascimento;
    private $sexo;
    private $rg;
    private $id_status;

    public function getDt_nascimento()
    {
        return $this->dt_nascimento;
    }

    public function setDt_nascimento($dt_nascimento)
    {
        $this->dt_nascimento = $dt_nascimento;

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

    public function getRg()
    {
        return $this->rg;
    }

    public function setRg($rg)
    {
        $this->rg = $rg;

        return $this;
    }

    public function getId_status()
    {
        return $this->id_status;
    }

    public function setId_status($id_status)
    {
        $this->id_status = $id_status;

        return $this;
    }
}
