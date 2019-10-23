<?php
require_once('../controller/conexao_banco.php');

class Veiculo{

    private $placa;
    private $descricao_veiculo;

    
    public function getPlaca()
    {
        return $this->placa;
    }

    public function setPlaca($placa)
    {
        $this->placa = $placa;

        return $this;
    }

     
    public function getDescricao_veiculo(){
        return $this->descricao_veiculo;
    }

    public function setDescricao_veiculo($descricao_veiculo)
    {
        $this->descricao_veiculo = $descricao_veiculo;

        return $this;
    }      

    public function cadastraveiculo($link,$id_morador,$placa,$descricao_veiculo){

        $sql = "INSERT INTO tb_veiculo(id_morador,placa,descricao_veiculo) VALUES ($id_morador,'$placa',
        '$descricao_veiculo')";
        mysqli_query($link, $sql);
    }

    public function buscarveiculo($link,$id_morador , $placa){

        $sql = "SELECT * fROM tb_veiculo  WHERE id_morador = $id_morador AND placa = $placa
         ";
        $result_select = mysqli_query($link, $sql);
    if($result_select){
         $veiculo = mysqli_fetch_array($result_select);

    }else{
        echo  "<script>alert('Não ha veiculo cadastrado');</script>"; 
        
    } 

    return $veiculo;

    }




}