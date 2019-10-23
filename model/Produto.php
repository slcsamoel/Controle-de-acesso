<?php
require_once('../controller/conexao_banco.php');

class Produto{

    private $descricao ;
    private $quantidade ;
    private $observacao ;
    private $dt_cadastro;
     
    public function getDescricao()
    {
        return $this->descricao;
    }
 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }


    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    
    public function getObservacao()
    {
        return $this->observacao;
    }

    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }


       public function getDt_cadastro()
    {
        return $this->dt_cadastro;
    }

      public function setDt_cadastro($dt_cadastro)
    {
        $this->dt_cadastro = $dt_cadastro;

        return $this;
    }


    function cadastra_produto($link,$descricao,$quantidade,$observacao,$dt_cadastro,$id_tp_entrada_produto,$id_tipo_produto ,$id_usuario){

    }


}