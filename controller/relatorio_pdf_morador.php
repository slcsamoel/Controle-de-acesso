<?php

require_once('../fpdf/fpdf.php');
require_once('../model/Morador.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');

$id_morador = $_POST['id_morador'];
$dt_inicial = $_POST['dt_inicial'];
$dt_final = $_POST['dt_final'];


$class_morador = new Morador();
 
$class_morador->relatorioMovimentacaoPdf($link, $id_morador, $dt_inicial, $dt_final);