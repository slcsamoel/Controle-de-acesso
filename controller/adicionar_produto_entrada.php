<?php
require_once('../model/EntradaProduto.php');
require_once('../controller/conexao_banco.php');
session_start();
$id_usuario = $_SESSION['id_usuario'];

$entraProduto = new EntradaProduto();

$id_entrada = $_POST['id_entrada_produto'];
$codigo_produto = $_POST['id_produto'];
$quantidade = $_POST['quantidade'];
$nf_fiscal = $_POST['nf_fiscal'];
$tp_entrada = $_POST['id_tp_entrada'];

$entraProduto->adicionaProdutoEntrada($link, $id_entrada, $codigo_produto, $quantidade, $tp_entrada, $nf_fiscal);

echo($id_entrada) . "</br>";
echo($codigo_produto) . "</br>";
echo($quantidade) . "</br>";
echo($tp_entrada) . "</br>";
echo($nf_fiscal) . "</br>";






