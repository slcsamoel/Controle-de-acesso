<?php
session_start();

require_once('../model/Visitante.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');

$class_visitante = new Visitante();
$id_usuario = $_SESSION['id_usuario'];

$class_visitante->setNome($nome = $_POST['nome']);
$class_visitante->setCpf($cpf = $_POST['cpf']);
$class_visitante->setDt_nascimento($dt_nascimento = $_POST['dt_nascimento']);
$class_visitante->setSexo($sexo = $_POST['sexo']);
$class_visitante->setRg($rg = $_POST['rg']);
$class_visitante->setTelefone($telefone = $_POST['telefone']);
$class_visitante->setObservacao($observacao = $_POST['observacao']);
$id_morador = $_POST['id_morador'];
$id_visitante = $_POST['id_visitante'];
$id_tipo_visita = $_POST['id_tipo_visita'];


/*
var_dump($class_visitante);
echo '<br>';
echo $id_visitante;

echo '<br>';
echo $id_morador;
echo '<br>';
echo $id_tipo_visita;
*/
$class_visitante->alterar_visita($link, $nome, $cpf, $dt_nascimento, $sexo,$rg, $telefone, $observacao, $id_usuario, $id_tipo_visita ,$id_visitante );

$class_visitante->entrada_visita($link,$id_morador, $id_visitante, $id_usuario);

        
        


