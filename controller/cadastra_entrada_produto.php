<?php
require_once('../model/EntradaProduto.php');
require_once('../controller/conexao_banco.php');
session_start();
$id_usuario = $_SESSION['id_usuario'];


$entradaProduto = new EntradaProduto();
$entradaProduto->setNf_fiscal($nf_fiscal = $_POST['nf_fical']);
$entradaProduto->setTipo_entrada($tipo_entrada = $_POST['id_tp_entrada_produto']);

$entradaProduto->cadastrarEntrada($link, $nf_fiscal, $tipo_entrada, $id_usuario);

echo($nf_fiscal) . "</br>";
echo($tipo_entrada) . "</br>";






