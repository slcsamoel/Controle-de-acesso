<?php
require_once('../controller/conexao_banco.php');

class Apartamento{

    private $nr_apartamento;
    private $bloco;

    public function getNr_apartamento()
    {
        return $this->nr_apartamento;
    }

    public function setNr_apartamento($nr_apartamento)
    {
        $this->nr_apartamento = $nr_apartamento;

        return $this;
    }
 
    public function getBloco()
    {
        return $this->bloco;
    }
 
    public function setBloco($bloco)
    {
        $this->bloco = $bloco;

        return $this;
    }

        public function buscarApartamento($link,$nr_apartamento , $bloco){

            $sql = "SELECT * fROM tb_apartamento  WHERE nr_apartamento = $nr_apartamento AND bloco = $bloco";
            $result_select = mysqli_query($link, $sql);
        if($result_select){
             $apartameto = mysqli_fetch_array($result_select);
             $id_apartamento = $apartameto['id_apartamento'];

        }else{
            echo  "<script>alert('Não foi possivel localizar o apartamento Verificar dados informados');</script>"; 
            
        } 

        return $apartameto;

        }    


}