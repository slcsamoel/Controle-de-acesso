<?php
require_once('../model/BaixaProduto.php');
require_once('../controller/conexao_banco.php');
session_start();
$id_usuario = $_SESSION['id_usuario'];

$baixa = new BaixaProduto();

$codigo_baixa = $_GET['id_baixa_produto'];
$codigo_produto = $_GET['id_produto'];
$qtd = $_GET['quantidade'];

$baixa->excluirProdutoBaixa($link, $codigo_produto, $codigo_baixa, $qtd);

echo($codigo_baixa) . "</br>";
echo($codigo_produto) . "</br>";
echo($qtd) . "</br>";






