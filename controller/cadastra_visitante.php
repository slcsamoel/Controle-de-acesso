<?php
session_start();
require_once('../model/Visitante.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');
$class_visitante = new Visitante();
$class_visitante->setNome($nome = $_POST['nome']);
$class_visitante->setCpf($cpf = $_POST['cpf']);
$class_visitante->setDt_nascimento($dt_nascimento = $_POST['dt_nascimento']);
$class_visitante->setSexo($sexo = $_POST['sexo']);
$class_visitante->setRg($rg = $_POST['rg']);
$class_visitante->setTelefone($telefone = $_POST['telefone']);
$class_visitante->setObservacao($observacao = $_POST['observacao']);

$id_morador = $_POST['id_morador'];
$id_tipo_visita = $_POST['id_tipo_visita'];
$id_usuario = $_SESSION['id_usuario'];

$sql = "SELECT * fROM tb_visitante  WHERE cpf ='$cpf' AND id_status= 1 ";
$result_select = mysqli_query($link, $sql);
$verificaCpf    = mysqli_num_rows($result_select);

if ($verificaCpf > 0) {
    echo  "<script>alert('Já possui um visitante com esse CPF cadastrado!');</script>";
    echo "<script>window.location = '../view/cadastra_visitante_view.php';</script>";
} else {
    
    $cadastra = $class_visitante->cadastra_visitante($link, $nome, $cpf, $dt_nascimento, $sexo, $rg, $telefone, $observacao, $id_usuario, $id_tipo_visita);
    
    if ($cadastra) {
        $dados_visitante = $class_visitante->buscar_visitante($link, $cpf,$nome);
        $id_visitante = $dados_visitante['id_visitante'];

        $class_visitante->entrada_visita($link,$id_morador, $id_visitante, $id_usuario);

        header("Location: ../principal.php");
    }    
}  