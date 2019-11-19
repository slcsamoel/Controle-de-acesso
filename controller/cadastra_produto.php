<?php  

require_once('../model/Produto.php');
require_once('../controller/conexao_banco.php');
session_start();
$id_usuario = $_SESSION['id_usuario'];


$produto = new Produto();
$produto->setDescricao($descricao = $_POST['descricao']);
$produto->setQuantidade($quantidade = $_POST['quantidade']);
$produto->setObservacao($observacao = $_POST['observacao']);
$produto->setPreco_produto($preco_produto = $_POST['preco']);
$id_tipo_produto = $_POST['id_tipo_produto'];

echo($descricao) . "</br>";
echo($quantidade) . "</br>";
echo($observacao) . "</br>";
echo($id_tipo_produto) . "</br>";
echo($id_usuario) . "</br>";
echo($preco_produto) . "</br>";
$produto->adicionarProduto($link, $descricao, $observacao, $id_tipo_produto, $id_usuario, $preco_produto);


?>