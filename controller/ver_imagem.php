<?php
require_once('../controller/conexao_banco.php');
  
$id_imagem = $_GET[id_imagem];

function mostra_imagem($link,$id_imagem){
$sql_foto = "SELECT codigo, 
imagem FROM tb_img_funcionario WHERE id_imagem = $id_imagem";
$resultado = mysqli_query($link ,$sql_foto);
$imagem = mysqli_fetch_object($resultado);
Header( "Content-type: image/jpeg");

return $imagem->imagem;
}
echo mostra_imagem($link,$id_imagem);
