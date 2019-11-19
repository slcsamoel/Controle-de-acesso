<?php
require_once('../model/BaixaProduto.php');
require_once('../controller/conexao_banco.php');

$baixaProduto = new BaixaProduto();

$id_baixa = $_GET['id_baixa_produto'];

$busca  = "SELECT * FROM tb_itens_baixa WHERE id_baixa_produto = $id_baixa ORDER BY  id_itens_baixa";
$resultado_busca = mysqli_query($link, $busca);

while ($resultado = mysqli_fetch_assoc($resultado_busca)) {
    $codigo_produto = $resultado['id_produto'];
    $qtd = $resultado['quantidade'];
    $baixaProduto->cancelarItensBaixa($link, $codigo_produto, $qtd);
}

mysqli_query($link, "UPDATE `tb_baixa_produto` SET `id_status_mov_produto`= '2' WHERE id_baixa_produto = '" .$id_baixa. "'");

echo  "<script>alert('Baixar Cancelada com sucesso!');</script>";
echo "<script>window.location = '../view/selecionar_funcionario_baixa_view.php'</script>";
