<?php
session_start();
require_once('../model/Morador.php');
require_once('../model/Pessoa.php');
require_once('../model/Apartamento.php');
require_once('../controller/conexao_banco.php');
$id_usuario = $_SESSION['id_usuario'];
$class_morador = new Morador();
$class_apartamento = new Apartamento();
//$class_veiculo = new Veiculo();

$class_morador->setId_morador($id_morador = $_POST['id_morador']);
$class_morador->setNome($nome = $_POST['nome']);
$class_morador->setCpf($cpf = $_POST['cpf']);
$class_morador->setDt_nascimento($dt_nascimento = $_POST['dt_nascimento']);
$class_morador->setSexo($sexo = $_POST['sexo']);
$class_morador->setRg($rg = $_POST['rg']);
$class_morador->setTelefone($telefone = $_POST['telefone']);
$class_morador->setNome_mae($nome_mae = $_POST['nome_mae']);
$class_morador->setNome_pai($nome_pai = $_POST['nome_pai']);
$class_morador->setId_tipo_morador($id_tipo_morador = $_POST['id_tipo_morador']);
$class_morador->setId_status($id_status = $_POST['id_status']);
$class_apartamento->setId_bloco($id_bloco = $_POST['id_bloco']);
$class_apartamento->setNr_apartamento($nr_apartamento = $_POST['nr_apartamento']);
$placa = $_POST['placa'];
$descricao_veiculo = $_POST['descricao_veiculo'];



/*
var_dump($class_morador);
echo '<br>';
var_dump($class_apartamento);
echo '<br>';
var_dump($class_veiculo);
 */        
                    //verifica si houve alteração de status caso sim o morador e desativado 
    if($id_status > 1){
          // executando query para desativação na tb_morador 
            $sql = " UPDATE tb_morador SET id_status = '$id_status' WHERE id_morador = '$id_morador' ";  
            $result_desativar = mysqli_query($link ,$sql);              
                        if($result_desativar){                               
                            echo  "<script>alert('O morador Foi desativado!');</script>";
                            echo "<script>window.location = '../view/buscar_morador_view.php';</script>";
                        }else{          
                            echo  "<script>alert('Erro ao tenta desativar o usuario');</scipt>";        
                         echo "<script>window.location = '../view/buscar_morador_view.php';</script>";
                        }    
          }
          if(isset($_FILES['imagem_nova']['name']) && !empty($_FILES['imagem_nova']['name'])){
            $extensao = explode('.', $_FILES['imagem_nova']['name']);
            $extensao = strtolower(end($extensao));
            $imagem_nova = md5(time()) . $extensao;
              $altera_img = $class_morador->altera_imagem($link , $imagem_nova , $id_morador);
            }


            $apartamento = $class_apartamento->buscarApartamento($link, $nr_apartamento, $id_bloco);
            $id_apartamento = $apartamento['id_apartamento'];
            $altera = $class_morador->alterar_morador($link,$id_morador, $nome, $cpf, $nome_mae , $nome_pai, $dt_nascimento, $sexo, $rg, $telefone,$placa, $id_apartamento,$descricao_veiculo,$id_usuario ,$id_tipo_morador);       
    

        
        
    
      
           
    
    
    
    
       



        

    

