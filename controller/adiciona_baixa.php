<?php
require_once('../model/BaixaProduto.php');
require_once('../controller/conexao_banco.php');
session_start();
$id_usuario = $_SESSION['id_usuario'];

$baixaProduto = new BaixaProduto();

$id_funcionario = $_GET['id'];
$nome_funcionario = $_GET['nome'];
$cpf_funcionario = $_GET['cpf'];


$baixaProduto->adicionaBaixaProduto($link, $id_funcionario, $nome_funcionario, $cpf_funcionario, $id_usuario);

echo($id_funcionario) . "</br>";
echo($nome_funcionario) . "</br>";
echo($cpf_funcionario) . "</br>";
echo($id_usuario) . "</br>";






