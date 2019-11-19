<?php
require_once('../fpdf/fpdf.php');
require_once('../model/EntradaProduto.php');
require_once('../controller/conexao_banco.php');

$entradaProduto = new EntradaProduto();

$id_entrada = $_POST['id_entrada_produto'];

$entradaProduto->relatorioEntradaPdf($link, $id_entrada);



