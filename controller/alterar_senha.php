<?php
session_start();
require_once('../model/Usuario.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');
$class_usuario = new Usuario();
$class_usuario->setSenha($senha = $_POST['senha']);
$confirma_senha = $_POST['confirma_senha'];
$id_usuario = $_SESSION['id_usuario'];

if($senha != $confirma_senha){
    echo  "<script>alert('Os dois campos devem ser iguais !');</script>"; 
    echo "<script>window.location = 'window.history.back()';</script>";  
}else{
$class_usuario->alterar_senha($link , $senha , $id_usuario);
}