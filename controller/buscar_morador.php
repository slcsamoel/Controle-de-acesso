<?php
require_once('../model/Morador.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');


$class_morador = new Morador();
$id_morador = $_POST['id_morador'];
$class_morador->setCpf($cpf = $_POST['cpf']);
$class_morador->setNome($nome = $_POST['nome']);

    $morador = $class_morador->buscar_morador($link, $id_morador ,$cpf,$nome);
    $id_morador = $morador['id_morador'];



if( isset ($morador['nome'])){
    header("Location: /Controle-de-acesso/view/morador_view.php?id_morador=$id_morador");
}else{

    header("Location: /Controle-de-acesso/view/buscar_morador_view.php.php");

}    


   


    



