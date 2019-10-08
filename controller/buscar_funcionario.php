<?php
session_start();
require_once('../model/Funcionario.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');


$class_funcionario = new Funcionario();
$class_funcionario->setCpf($cpf = $_POST['cpf']);




$funcionario = $class_funcionario->buscar_funcionario($link, $cpf);
$id_funcionario = $funcionario['id_funcionario']; 

if(empty($id_funcionario)){
  echo  "<script>alert('Funcionario não existe');</script>"; 
  echo "<script>window.location = '../view/buscar_Funcionario_view.php';</script>";
}else{  
 
  header("Location: /Controle-de-acesso/view/funcionario_view.php?id=$id_funcionario");
}