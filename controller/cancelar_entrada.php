<?php
require_once('../model/EntradaProduto.php');
require_once('../controller/conexao_banco.php');
$entradaProduto = new EntradaProduto();

$id_entrada = $_GET['id_entrada_produto'];
$busca  = "SELECT * FROM tb_itens_entrada WHERE id_entrada_produto = $id_entrada ORDER BY  id_itens_entrada";
$resultado_busca = mysqli_query($link , $busca);                              

while ($resultado = mysqli_fetch_assoc($resultado_busca)) {

$codigo_produto = $resultado['id_produto'];
$qtd = $resultado['quantidade'];
    $entradaProduto->cancelarEntradaItens($link, $codigo_produto,$qtd);
}


mysqli_query($link, "UPDATE `tb_entrada_produto` SET `id_status_mov_produto`= '2' WHERE id_entrada_produto = '" .$id_entrada. "'");

echo  "<script>alert('Entrada Cancelada com sucesso!');</script>";
echo "<script>window.location = '../view/cadastra_entrada_view.php'</script>";
