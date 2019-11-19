<?php

require_once('../fpdf/fpdf.php');
require_once('../model/Visitante.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');

$id_visitante = $_POST['id_visitante'];
$dt_inicial = $_POST['dt_inicial'];
$dt_final = $_POST['dt_final'];

echo $id_visitante;


$class_visitante = new Visitante();
 
$class_visitante->relatorioMovimentacaoPdf($link, $id_visitante, $dt_inicial, $dt_final);