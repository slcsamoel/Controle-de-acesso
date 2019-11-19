<?php  

require_once('../model/Produto.php');
require_once('../controller/conexao_banco.php');
session_start();
$id_usuario = $_SESSION['id_usuario'];


$produto = new Produto();
$produto->setId_produto($id_produto = $_POST['id_produto']);
$produto->setDescricao($descricao = $_POST['descricao']);
$produto->setQuantidade($quantidade = $_POST['quantidade']);
$produto->setObservacao($observacao = $_POST['observacao']);
$produto->setPreco_produto($preco_produto = $_POST['preco']);
$id_tipo_produto = $_POST['id_tipo_produto'];

echo($id_produto) . "</br>";
echo($descricao) . "</br>";
echo($quantidade) . "</br>";
echo($observacao) . "</br>";
echo($id_tipo_produto) . "</br>";


$produto->alterarProduto($link, $id_produto, $descricao, $observacao, $id_tipo_produto, $preco_produto);


?>