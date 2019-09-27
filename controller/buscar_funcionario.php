<?php
require_once('../model/Funcionario.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');


$class_funcionario = new Funcionario();
$class_funcionario->setCpf($cpf = $_POST['cpf']);

function buscar_funcionario($link, $cpf)
{
  $sql = "SELECT * fROM tb_funcionario  WHERE cpf ='$cpf' AND id_status= 1 ";
  $result_select = mysqli_query($link, $sql);
  if ($result_select) {
    $funcionario = mysqli_fetch_array($result_select);  
    
  } else {
    echo 'Não foi Possivel conectar com o banco';
  }
  
  return $funcionario;
}
buscar_funcionario($link, $cpf);

