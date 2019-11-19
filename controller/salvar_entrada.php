<?php 
require_once('../controller/conexao_banco.php');
$id_entrada = $_GET['id_entrada_produto'];


mysqli_query($link, "UPDATE `tb_entrada_produto` SET `id_status_mov_produto`= '1' WHERE id_entrada_produto = '" .$id_entrada. "'");

echo  "<script>alert('Entrada de produtos registrada!');</script>";    
echo "<script>window.location = '../principal.php';</script>";
