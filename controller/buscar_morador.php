<?php
require_once('../model/Morador.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');


$class_morador = new Morador();
$id_morador = $_POST['id_morador'];
$class_morador->setNome($nome = $_POST['nome']);


if(isset($id_morador) || isset($nome)){
    $morador= $class_morador->buscar_morador($link, $id_morador ,$nome);
    header("Location: /Controle-de-acesso/view/morador_view.php?id=$id_morador");

}else{

}    


   


    



