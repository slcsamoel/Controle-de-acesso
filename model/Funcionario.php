<?php
require_once('Pessoa.php');
class Funcionario extends Pessoa{

        private $telefone;
        private $turno;
        private $id_funcao;
	
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

        
        public function getId_funcao(){
                      return $this->id_funcao;
        }

        public function setId_funcao($id_funcao){
                $this->id_funcao = $id_funcao;
                return $this;
        }




        //funções

        function cadastra_funcionario($link, $nome, $cpf, $dt_nascimento, $sexo, $rg, $telefone, $turno, $id_funcao){
            $sql = " INSERT INTO tb_funcionario(cpf,nome,rg,turno,sexo,telefone,id_status,dt_nascimento,id_funcao) VAlUES('$cpf','$nome', $rg,'$turno','$sexo','$telefone' ,1,'$dt_nascimento',$id_funcao)";
    
            $resul_insert = mysqli_query($link, $sql);
                $cadastrado = false;
            if ($resul_insert){    
                $cadastrado = true;
            } else {
                echo  "<script>alert('Erro na Consulta');</script>";
                echo "<script>window.location = '../view/cadastra_funcionario_view.php';</script>";
            }
            return $cadastrado;
        }


        function buscar_funcionario($link, $cpf){
            $sql = "SELECT * fROM tb_funcionario  WHERE cpf ='$cpf' AND id_status= 1 ";
            $result_select = mysqli_query($link, $sql);
            
            if($result_select) {
              $funcionario = mysqli_fetch_array($result_select);
            } else {
            echo  "<script>alert('Erro na Consulta');</script>"; 
            }
            return $funcionario;
          }


          function alterar_funcionario($link,$id_funcionario, $nome, $cpf, $dt_nascimento, $sexo, $rg, $telefone, $turno, $id_funcao){
            $sql =" UPDATE `tb_funcionario` SET `cpf` ='$cpf',`nome`='$nome',`rg`= '$rg',`turno`='$turno',`sexo` ='$sexo',`telefone`='$telefone', `dt_nascimento` ='$dt_nascimento', `id_funcao`='$id_funcao' WHERE `id_funcionario` ='$id_funcionario'";
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
