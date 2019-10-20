<?php
session_start();
require_once('../controller/conexao_banco.php');

$id_morador = $_GET['id_morador'];
$id_usuario = $_SESSION['id_usuario'];

$sql ="INSERT INTO tb_mov_morador(id_morador ,id_usuario ,id_tp_movimentacao) VALUES ($id_morador,$id_usuario,2)";
$resul_insert = mysqli_query($link, $sql);

if($resul_insert){
unset($_SESSION['id_morador']);
header("Location: ../principal.php");
}