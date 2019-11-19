<?php
require_once('../fpdf/fpdf.php');
require_once('../model/BaixaProduto.php');
require_once('../controller/conexao_banco.php');

$baixaProduto = new BaixaProduto();

$id_baixa = $_GET['id_baixa'];

$baixaProduto-> relatorioBaixaPdf($link, $id_baixa);
