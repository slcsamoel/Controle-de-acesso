<?php
require_once('Pessoa.php');
class Visitante extends Pessoa
{
    private $telefone;
    private $observacao;
    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

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

    function cadastra_visitante($link, $nome, $cpf, $dt_nascimento, $sexo, $rg, $telefone, $observacao, $id_usuario, $id_tipo_visita)
    {
        $sql = "INSERT INTO tb_visitante(nome,cpf,rg,dt_nascimento,telefone,sexo,observacao,id_usuario,id_status,id_tipo_visita)
        VAlUES('$nome','$cpf','$rg','$dt_nascimento','$telefone','$sexo','$observacao',$id_usuario,1,$id_tipo_visita)";
        $resul_insert = mysqli_query($link, $sql);
        $cadastrado = false;
        if ($resul_insert) {
            $cadastrado = true;
        } else {
            echo  "<script>alert('Erro ao executa Cadastro');</script>";
            // echo "<script>window.location = '../view/cadastra_visitante_view.php';</script>";
        }
        return $cadastrado;
    }

    function buscar_visitante($link, $cpf, $nome)
    {
        $cadastro = "";
       if (isset($cpf) && $cpf != '') {
            $sql = "SELECT * fROM tb_visitante  WHERE cpf = '$cpf'";
            $result_select = mysqli_query($link, $sql);
            $cadastro = mysqli_fetch_array($result_select);
        } elseif (isset($nome) && $nome != '') {
            $sql = "SELECT * fROM tb_visitante  WHERE nome  LIKE '%$nome%'";
            $result_select = mysqli_query($link, $sql);
            $cadastro = mysqli_fetch_array($result_select);
        } else {
            //echo  "<script>alert('Erro na Consulta');</script>";
        }
        if (isset($cadastro['nome'])) {
            return $cadastro;
        } else {

            //echo "<script>alert('Cadastro não existe');</script>";
            //echo "<script language='javascript'>history.back()</script>";
        }
    }

    function entrada_visita($link,$id_morador, $id_visitante, $id_usuario)
    {
        $sql = "INSERT INTO tb_visita_morador(id_morador,id_visitante,id_usuario,id_tp_movimentacao)
         VALUES ($id_morador,$id_visitante, $id_usuario,1)";
        $resul_insert = mysqli_query($link, $sql);
        if($resul_insert){
            echo "<script>alert('Entrada Registrada');</script>";
            }     
    }

    function saida_visita($link,$id_morador, $id_visitante, $id_usuario)
    {
        $sql = "INSERT INTO tb_visita_morador(id_morador,id_visitante,id_usuario,id_tp_movimentacao)
         VALUES ($id_morador,$id_visitante, $id_usuario,2)";
        $resul_insert = mysqli_query($link, $sql);
        if($resul_insert){
            echo "<script>alert('Saida Registrada');</script>";
            header("Location: ../principal.php");
            }     
    }

    function alterar_visita($link, $nome, $cpf, $dt_nascimento, $sexo, $rg, $telefone, $observacao, $id_usuario, $id_tipo_visita ,$id_visitante ){
        $sql =" UPDATE `tb_visitante` SET `nome` ='$nome',`cpf`='$cpf',`rg`= '$rg',`dt_nascimento`='$dt_nascimento',`telefone` ='$telefone',`sexo`='$sexo', `observacao`='$observacao', `id_usuario`='$id_usuario' ,`id_tipo_visita`='$id_tipo_visita'  WHERE `id_visitante` ='$id_visitante'";
        $result_update = mysqli_query($link,$sql);
        $alterado = false;
        if($result_update){

            $alterado = true;
          }else{
            echo  "<script>alert('Erro na execução da query');</script>"; 
            echo "<script>window.location = '../view/buscar_Funcionario_view.php';</script>";
          }
         return  $alterado;
        }
    
}
