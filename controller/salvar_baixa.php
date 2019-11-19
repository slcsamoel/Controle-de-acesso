<?php 
require_once('../fpdf/fpdf.php');
require_once('../model/BaixaProduto.php');
require_once('../controller/conexao_banco.php');

$baixaProduto = new BaixaProduto();
$id_baixa = $_GET['id_baixa_produto'];

$sql = "UPDATE `tb_baixa_produto` SET `id_status_mov_produto`= '1' WHERE id_baixa_produto = '" .$id_baixa. "'";

$result = mysqli_query($link,$sql);
echo  "<script>alert('Baixa de produtos registrada!');</script>";
echo "<script>window.location ='../view/baixa_visualizacao_view.php?idBaixa=" .$id_baixa. "';</script>";

