<?php
session_start();
require_once('../model/Usuario.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');
$class_usuario = new Usuario();
$class_usuario->setUsuario($usuario = $_POST['usuario']);
$class_usuario->setSenha($senha = $_POST['senha']);
$class_usuario->setNivel_acesso($nivel_acesso = $_POST['nivel_acesso']);
$id_funcionario =  $_GET["id"];


 $class_usuario->cadastra_usuario($link,$senha, $usuario, $nivel_acesso, $id_funcionario)



?>