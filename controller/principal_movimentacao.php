<?php
//session_start();
require_once('../model/Morador.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');



$id_morador = $_POST['id_morador'];
$cpf = $_POST['cpf'];
$class_morador = new Morador();
$nome = '';
// verificar si as variaveis foi iniciadas 
//caso sim fazer a busca e inseri o id_morador na variavel de sessão
 
    if($id_morador > 0 || $cpf !=''){
    $morador_mov = $class_morador->buscar_morador($link, $id_morador,$cpf,$nome);  
    }

    if( isset ($morador_mov['nome'])){
      header("Location: ../principal.php?id_morador=$morador_mov[id_morador]");
    }else{

      header("Location: ../principal.php");

    }

  