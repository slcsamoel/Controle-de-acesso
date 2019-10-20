<?php
include "cabecalho.php";
require_once('model/Morador.php');
require_once('controller/conexao_banco.php');

?>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/estilo.css" rel="stylesheet">

<?php
$imagem = "imagens/img_morador.png";
$disabilitar = "";
$btn_entrada = "";
$btn_saida = "";

//Verificar si a variavel de sessão id_morador foi iniciada 
if (isset($_GET['id_morador'])) {
  $id_morador = $_GET['id_morador'];
  $resultado  = "SELECT mor.id_morador , mor.nome , img.imagem FROM tb_morador as mor 
  INNER JOIN tb_img_morador as img ON (mor.id_morador = img.id_morador)
  WHERE mor.id_morador = '$id_morador'";
  $resultado_morador = mysqli_query($link, $resultado);
  $morador = mysqli_fetch_array($resultado_morador);
  $imagem = "fotos_moradores/" . $morador['imagem'];
  $disabilitar = "disabled";

  $result_mov = "SELECT * FROM tb_mov_morador WHERE id_morador = '$id_morador' ORDER BY id_movimentacao DESC LIMIT 1";
  $result_movimentacao = mysqli_query($link, $result_mov);
  $movimentacao = mysqli_fetch_array($result_movimentacao);

  if ($movimentacao['id_tp_movimentacao'] < 2) {
    $btn_entrada = "disabled";
  } else {
    $btn_saida = "disabled";
  }
}


?>

<!--Barra navegaçaõ -->
<form class="form-horizontal" action="controller/principal_movimentacao.php" method="post">


  <div id="img_fundo_nav" class="page-header col-md-4">
    <h1>
      <img src="imagens/logo.jpeg" class="ca" opacity:0.3;>
    </h1>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label" for="id_morador">Codigo de Acesso:<h11>*</h11></label>
    <div class="col-md-1">
      <input name="id_morador" class="form-control input-md" type="text" pattern="[0-9]+$">
    </div>
    <label class="col-md-1 control-label" for="cpf">CPF <h11>*</h11></label>
    <div class="col-md-2">
      <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md"  type="text" maxlength="11" pattern="[0-9]+$">
    </div>
    <div class="col-sm-1">
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>


    <div class="col-md-6 control-label">
      <div class="col-sm-8">
      </div>
      <div class="col-sm-4">
        <img src="<?php echo $imagem; ?>" class="img-responsive img-thumbnail" name="imagem">
      </div>

      <div class="col-md-12 control-label">
        <div class="col-sm-8">
        </div>
        <div class="col-md-2">
          <a href="controller/entrada_morador.php?id_morador=<?php echo $id_morador ?>" class="btn btn-primary"  name="btn_entrada" <?= $btn_entrada ?>>Entrada</a>
        </div>

        <div class="col-md-2">
          <a href="controller/saida_morador.php?id_morador=<?php echo $id_morador ?>" class="btn btn-primary"  name="btn_saida" <?= $btn_saida ?>>Saida</a>
        </div>
</form>
</div>
</div>
</div>

</div>

</div>

<?php include "rodape.php"; ?>