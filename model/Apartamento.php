<?php
require_once('../controller/conexao_banco.php');

class Apartamento{

    private $nr_apartamento;
    private $id_bloco;

    public function getNr_apartamento()
    {
        return $this->nr_apartamento;
    }

 
    public function setNr_apartamento($nr_apartamento)
    {
        $this->nr_apartamento = $nr_apartamento;

        return $this;
    }

 
    public function getId_bloco()
    {
        return $this->id_bloco;
    }

    public function setId_bloco($id_bloco)
    {
        $this->id_bloco = $id_bloco;

        return $this;
    }

    public function buscarApartamento($link,$nr_apartamento , $id_bloco){

        $sql = "SELECT * fROM tb_apartamento  WHERE nr_apartamento = $nr_apartamento AND id_bloco = $id_bloco
         ";
        $result_select = mysqli_query($link, $sql);
    if($result_select){
         $apartameto = mysqli_fetch_array($result_select);

    }else{
        echo  "<script>alert('Não foi possivel localizar o apartamento Verificar dados informados');</script>"; 
        
    } 

    return $apartameto;

    }    


}