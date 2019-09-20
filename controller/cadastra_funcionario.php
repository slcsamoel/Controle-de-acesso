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
/*
$imagem = $_FILES['imagem']['tmp_name'];
$tamanho = $_FILES['imagem']['size'];
$tipo = $_FILES['imagem']['type'];
$nome = $_FILES['imagem']['name'];
*/
    function cadastra_funcionario($link, $nome, $cpf , $dt_nascimento , $sexo , $rg , $telefone , $turno ){
        $sql =" INSERT INTO tb_funcionario(cpf,nome,rg,turno,sexo,telefone,id_status,dt_nascimento) VAlUES('$cpf','$nome', $rg,'$turno','$sexo','$telefone' ,1,'$dt_nascimento')";

        $resul_insert = mysqli_query($link,$sql);
        
        if($resul_insert){
             $dados_funcionario = buscar_funcionario($link,$cpf);


            echo $dados_funcionario['id_funcionario'];
            echo ('<br>');
            echo "cadastro realizado com sucessso";
        }else{ 
            echo('Não foi possivel fazer o cadastro');
        }   
}
cadastra_funcionario($link, $nome, $cpf , $dt_nascimento , $sexo , $rg , $telefone ,$turno);



/*
function insere_imagem($imagem,$tamanho,$tipo,$nome,$id_funcionario){

        $fp ="";
        $conteudo ="";
        $rb ="rb";
    if($imagem !="none ){

      $fp = fopen($imagem, $rb);
      $conteudo = fread($fp, $tamanho);
      $conteudo = addslashes($conteudo);
       fclose($fp);





     }else{
         echo ('<br>');

         echo 'não foi possivel inseri a imagem';
     }


    }
    */
    
   ?> 