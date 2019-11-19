<?php
require_once('../model/EntradaProduto.php');
require_once('../controller/conexao_banco.php');
session_start();
$id_usuario = $_SESSION['id_usuario'];


$entradaProduto = new EntradaProduto();

$codigo_produto = $_GET['idProd'];
$codigo_entrada = $_GET['entrada'];
$nf = $_GET['nf'];
$tpe = $_GET['tpe'];
$qtd = $_GET['qtd'];

$entradaProduto->excluirProdutoEntrada($link, $codigo_produto, $codigo_entrada, $nf, $tpe, $qtd);

echo($codigo_produto) . "</br>";
echo($codigo_entrada) . "</br>";






