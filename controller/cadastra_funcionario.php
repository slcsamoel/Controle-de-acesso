<?php
    session_start();
require_once('../model/Funcionario.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');
require_once('../controller/buscar_funcionario.php');
$class_funcionario = new Funcionario();
$class_funcionario->setNome($nome = $_POST['nome']);
$class_funcionario->setCpf($cpf = $_POST['cpf']);
$class_funcionario->setDt_nascimento($dt_nascimento = $_POST['dt_nascimento']);
$class_funcionario->setSexo($sexo = $_POST['sexo']);
$class_funcionario->setRg($rg = $_POST['rg']);
$class_funcionario->setTelefone($telefone = $_POST['telefone']);
$class_funcionario->setTurno($turno = $_POST['turno']);

// variaveis para imagem

            //inserindo 
    function cadastra_funcionario($link, $nome, $cpf , $dt_nascimento , $sexo , $rg , $telefone , $turno ){
        $sql =" INSERT INTO tb_funcionario(cpf,nome,rg,turno,sexo,telefone,id_status,dt_nascimento) VAlUES('$cpf','$nome', $rg,'$turno','$sexo','$telefone' ,1,'$dt_nascimento')";

        $resul_insert = mysqli_query($link,$sql);
        
        if($resul_insert){
                //inserindo imagem 
                $dados_funcionario = buscar_funcionario($link,$cpf);
                $id_funcionario = $dados_funcionario['id_funcionario'];
       
            if(isset($_FILES['imagem'])){
            $extensao = explode('.',$_FILES['imagem']['name']);
            $extensao = strtolower(end($extensao));
            $imagem = md5(time()).$extensao; 
            $diretorio = '../fotos_funcionarios/';   
             
            move_uploaded_file( $_FILES['imagem']['tmp_name'], $diretorio.$imagem);
                   
          $sql_foto = "INSERT INTO tb_img_funcionario(id_funcionario , imagem)VALUES( $id_funcionario,'$imagem')";
                $result_foto = mysqli_query($link,$sql_foto);

                if($result_foto){

                    echo 'foto cadastrada com sucesso';

                }else{

                    echo 'foto não cadastrada';
                }

            }

         

                 echo 'Cadastro realizado com sucesso';  
                
        }else{
        echo 'cadastro não realizado';     
        }

    }
        cadastra_funcionario($link, $nome, $cpf , $dt_nascimento , $sexo , $rg , $telefone ,$turno);



        

    

