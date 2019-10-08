<?php
session_start();
require_once('../model/Funcionario.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');
$class_funcionario = new Funcionario();
$class_funcionario->setNome($nome = $_POST['nome']);
$class_funcionario->setCpf($cpf = $_POST['cpf']);
$class_funcionario->setDt_nascimento($dt_nascimento = $_POST['dt_nascimento']);
$class_funcionario->setSexo($sexo = $_POST['sexo']);
$class_funcionario->setRg($rg = $_POST['rg']);
$class_funcionario->setTelefone($telefone = $_POST['telefone']);
$class_funcionario->setTurno($turno = $_POST['turno']);
$class_funcionario->setId_status($id_status = $_POST['id_status']);
$class_funcionario->setId_funcao($id_funcao = $_POST['id_funcao']);


            //

         $funcionario = $class_funcionario->buscar_funcionario($link, $cpf);
            $id_funcionario =  $funcionario['id_funcionario'];
                    // verifica si houve alteração de status caso sim o funcionario e desativado 
    if($id_status >1){

            // executando query para desativação na tb_funcionario 
            $sql = "UPDATE tb_funcionario SET id_status = '$id_status' WHERE id_funcionario = '$id_funcionario' ";  
            $result_desativar = mysqli_query($link ,$sql);
                // caso a desativação seja feita desativa também na tb usuario 
            if($result_desativar){
                    $sql_user = "UPDATE tb_usuario SET id_status = '$id_status' WHERE id_funcionario = '$id_funcionario' ";  
                    $result_desativar_user = mysqli_query($link ,$sql);
                        if($result_desativar_user){    
                                // desativando e redirecionando para a tela de consulta de funcionario. 
                            echo  "<script>alert('O funcionario Foi desativado!');</script>";
                            echo "<script>window.location = '../view/buscar_Funcionario_view.php';</script>";
                        }else{
                        echo  "<script>alert('Erro ao tenta desativar o usuario');</script>";        
                         echo "<script>window.location = '../view/buscar_Funcionario_view.php';</script>";
                        }    

            }else{
             echo  "<script>alert('Erro ao tenta desativar o funcionario');</script>";
            echo "<script>window.location = '../view/buscar_Funcionario_view.php';</script>";
            }
                    
        }else{

        
            $altera = $class_funcionario ->alterar_funcionario($link,$id_funcionario, $nome, $cpf, $dt_nascimento, $sexo, $rg, $telefone, $turno, $id_funcao);
            if($altera){

                echo  "<script>alert('Cadastro alterado com sucesso ');</script>";
                echo "<script>window.location = '../view/buscar_Funcionario_view.php';</script>";
            }else{
                echo  "<script>alert('Erro ao Altera Cadastro');</script>";
                echo "<script>window.location = '../view/buscar_Funcionario_view.php';</script>";

            }
    
    }

    
      
           
    
    
    
    
       



        

    

