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
      $sql_buscar = "SELECT * FROM tb_img_funcionario WHERE id_funcionario = $funcionario[id_funcionario]";
      $result_foto = mysqli_query($link, $sql_buscar);
      $foto = mysqli_fetch_array($result_foto);
   

     echo '<td align="center">';
     echo '<img src="ver_imagem.php?id=$foto[id_imagem]" style="max-width: 250px" />';
      echo'</td>';
    
  } else {
    echo 'Não foi Possivel conectar com o banco';
  }
  
  return $funcionario;
}
buscar_funcionario($link, $cpf);

