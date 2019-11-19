<?php
require_once('../model/BaixaProduto.php');
require_once('../controller/conexao_banco.php');
session_start();
$id_usuario = $_SESSION['id_usuario'];

$baixa = new BaixaProduto();

$id_baixa = $_POST['id_baixa_produto'];
$codigo_produto = $_POST['id_produto'];
$quantidade = $_POST['quantidade'];

$baixa->adicionaProdutoBaixa($link, $id_baixa, $codigo_produto, $quantidade);

echo($id_entrada) . "</br>";
echo($codigo_produto) . "</br>";
echo($quantidade) . "</br>";
echo($tp_entrada) . "</br>";
echo($nf_fiscal) . "</br>";






