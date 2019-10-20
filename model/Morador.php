<?php
require_once('Pessoa.php');
class Morador extends Pessoa
{
    //private $id_morador;
    private $nome_mae;
    private $nome_pai;
    private $telefone;
    private $placa;
    private $tipo_morador;

   /*     
    public function getId_morador()
    {
        return $this->id_morador;
    }
    
    public function setId_morador($id_morador)
    {
        $this->id_morador = $id_morador;

        return $this;
    }
    */


    public function getTipo_morador()
    {
        return $this->tipo_morador;
    }


    public function setTipo_morador($tipo_morador)
    {
        $this->tipo_morador = $tipo_morador;

        return $this;
    }


     public function getNome_mae()
    {
        return $this->nome_mae;
    }


    public function setNome_mae($nome_mae)
    {
        $this->nome_mae = $nome_mae;

        return $this;
    }


    public function getNome_pai()
    {
        return $this->nome_pai;
    }


    public function setNome_pai($nome_pai)
    {
        $this->nome_pai = $nome_pai;

        return $this;
    }


    public function getTelefone()
    {
        return $this->telefone;
    }


    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getPlaca()
    {
        return $this->placa;
    }


    public function setPlaca($placa)
    {
        $this->placa = $placa;

        return $this;
    }


    public function getData_cadastro()
    {
        return $this->data_cadastro;
    }


    public function setData_cadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;

        return $this;
    }



    function buscar_cadastro($link, $cpf)
    {
        $sql = "SELECT * fROM tb_morador  WHERE cpf ='$cpf'";
        $result_select = mysqli_query($link, $sql);
        if ($result_select) {
            $cadastro = mysqli_fetch_array($result_select);
        } else {
            echo  "<script>alert('Erro na Consulta');</script>";
        }
        return $cadastro; 
    }


    function cadastra_morador($link, $nome, $cpf, $dt_nascimento, $sexo, $rg, $telefone, $nome_mae, $nome_pai, $tipo_morador, $id_usuario, $id_apartamento)
    {
        $sql = "INSERT INTO tb_morador(cpf,nome,nome_mae,nome_pai,rg,dt_nascimento,sexo,tipo_morador,id_usuario,telefone,id_apartamento,id_status) 
        VAlUES('$cpf','$nome', '$nome_mae','$nome_pai',$rg,'$dt_nascimento','$sexo','$tipo_morador',$id_usuario,'$telefone',$id_apartamento, 1)";
        $result_insert = mysqli_query($link, $sql);
        $cadastrado = false;
        if ($result_insert) {
            $cadastrado = true;
        } else {
            echo  "<script>alert('Erro na query de cadastro');</script>";
            //echo "<script>window.location = '../view/cadastra_morador_view.php';</script>";
        }
        return $cadastrado;
    }
    function buscar_morador($link, $id_morador,$cpf,$nome)
    {   
        $cadastro = "";
        if(isset($id_morador) && $id_morador!=''){
        $sql = "SELECT * fROM tb_morador  WHERE id_morador = '$id_morador'";
        $result_select = mysqli_query($link, $sql);
        $cadastro = mysqli_fetch_array($result_select);
        } 
        elseif(isset($cpf) && $cpf !=''){          
        $sql = "SELECT * fROM tb_morador  WHERE cpf = '$cpf'";
        $result_select = mysqli_query($link, $sql);
        $cadastro = mysqli_fetch_array($result_select);              
        }
        elseif(isset($nome) && $nome !=''){          
            $sql = "SELECT * fROM tb_morador  WHERE nome  LIKE '%$nome%'";
            $result_select = mysqli_query($link, $sql);
            $cadastro = mysqli_fetch_array($result_select);            
        }else{
            echo  "<script>alert('Erro na Consulta');</script>";
        }
         
        if(isset ($cadastro['nome'])){
            return $cadastro;
        }else{
        
            echo "<script>alert('Cadastro não existe');</script>";
            echo "<script language='javascript'>history.back()</script>";
        } 
    }




}
