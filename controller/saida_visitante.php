<?php
session_start();

require_once('../model/Visitante.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');

$class_visitante = new Visitante();
$id_usuario = $_SESSION['id_usuario'];
$id_morador = $_GET['id_morador'];
$id_visitante = $_GET['id_visitante'];

$class_visitante->saida_visita($link, $id_visitante, $id_morador, $id_usuario);