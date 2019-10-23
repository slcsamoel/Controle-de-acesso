<?php
session_start();
require_once('../model/Visitante.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');


$class_visitante = new Visitante();
$class_visitante->setCpf($cpf = $_POST['cpf']);
$class_visitante->setCpf($nome = $_POST['nome']);

$visitante = $class_visitante->buscar_visitante($link,$cpf,$nome);
$id_visitante = $visitante['id_visitante'];

if (isset($visitante['nome'])){

    header("Location: /Controle-de-acesso/view/visitante_view.php?id=$id_visitante");
    
} else {

    echo  "<script>alert('Visitante não cadastrado ');</script>"; 
    echo "<script>window.location = '../view/buscar_visitante_view.php';</script>";
}


