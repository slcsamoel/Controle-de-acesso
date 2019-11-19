<?php
require_once "../cabecalho_aux.php";
require_once('../model/Visitante.php');
require_once('../controller/conexao_banco.php');


?>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">
<?php
$id_visitante = $_GET['id'];
$resultado  = "SELECT * FROM tb_visitante as vis INNER JOIN tb_tipo_visita as tp ON (vis.id_tipo_visita = tp.id_tipo_visita) 
WHERE vis.id_visitante = '$id_visitante'";
$resultado_visitante = mysqli_query($link, $resultado);
$visitante = mysqli_fetch_array($resultado_visitante);

$id_visitante = $visitante['id_visitante'];
$id_status = $visitante['id_status'];


//buscando as movimentações
$btn_entrada = " ";
$btn_saida = " ";
$resultado_movi = "SELECT * FROM tb_visita_morador WHERE id_visitante = '$id_visitante' ORDER BY id_visita_morador DESC LIMIT 1 ";
$resultado_movimentacao = mysqli_query($link, $resultado_movi);
$movimentacao = mysqli_fetch_array($resultado_movimentacao);

$id_morador = $movimentacao['id_morador'];

if ($movimentacao['id_tp_movimentacao'] < 2) {
  $btn_entrada = "disabled";
  $movimento = 'ENTRADA';

  $altera_form = "readonly";
} else {
  $btn_saida = " disabled ";
  $movimento = 'SAIDA';
  $altera_form = " ";
}

//salvar a observação em uma variavel 

?>

<div class="container">
  <div class="pager-header">
    <h1>Visitante</h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal" enctype="multipart/form-data" action="../controller/entrada_visitante.php"  name="formul" method="post">

        <div class="panel panel-primary">


          <div class="panel-body">
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="nome">Nome <h11>*</h11></label>
            <div class="col-md-8">
              <input id="nome" name="nome" placeholder="" class="form-control input-md" value="<?php echo $visitante['nome'] ?>" <?= $altera_form ?> type="text">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="cpf">CPF <h11>*</h11></label>
            <div class="col-md-2">
              <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" value="<?php echo $visitante['cpf'] ?>" <?= $altera_form ?> type="text" maxlength="11" pattern="[0-9]+$">
            </div>

            <label class="col-md-1 control-label" for="dt_nascimento">Nascimento<h11>*</h11></label>
            <div class="col-md-2">
              <input id="dt_nascimento" name="dt_nascimento" placeholder="DD/MM/AAAA" class="form-control input-md" value="<?php echo $visitante['dt_nascimento'] ?>" <?= $altera_form ?> type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
            </div>

            <!-- Multiple Radios (inline) -->

            <label class="col-md-1 control-label" for="radios" value="<?php echo $visitante['sexo'] ?>" <?= $altera_form ?>>Sexo <h11>*</h11></label>
            <div class="col-md-4">
              <label class="radio-inline" for="radios-0">
                <input name="sexo" id="sexo" <?php if ($visitante['sexo'] == 'feminino') {
                                                echo "checked";
                                              } ?> value="feminino" type="radio">
                Feminino
              </label>
              <label class="radio-inline" for="radios-1">
                <input name="sexo" id="sexo" <?php if ($visitante['sexo'] == 'masculino') {
                                                echo "checked";
                                              } ?> value="masculino" type="radio">
                Masculino
              </label>
            </div>
          </div>

          <!-- Prepended text-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="rg">RG <h11>*</h11></label>
            <div class="col-md-2">
              <input id="rg" name="rg" placeholder="Apenas números" class="form-control input-md" value="<?php echo $visitante['rg'] ?>" <?= $altera_form ?> type="text" maxlength="11" pattern="[0-9]+$">
            </div>

            <label class="col-md-1 control-label" for="telefone">Telefone</label>
            <div class="col-md-2">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input id="telefone" name="telefone" class="form-control" OnKeyPress="formatar('##-#####-####', this)" value="<?php echo $visitante['telefone'] ?>" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$" OnKeyPress="formatar('## #####-####', this)" <?= $altera_form ?>>
              </div>
            </div>

            <label class="col-md-2 control-label" for="id_morador">Codigo de liberação</label>
            <div class="col-md-2">
              <div class="input-group">
                <span class="input-group-addon">Morador<h11>*</h11></span>
                <input id="id_morador" name="id_morador" class="form-control" placeholder="" value="<?= $movimentacao['id_morador'] ?>" <?= $altera_form ?> type="text">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label" for="dt_movimentacao">Ultima Movimentação<h11>*</h11></label>
            <div class="col-md-2">
              <input id="dt_movimentacao" name="dt_movimentacao" class="form-control input-md" type="datetime" disabled value="<?php echo $movimentacao['dt_movimentacao'] ?>" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
            </div>

            <div class="col-md-3">
              <input id="movimentacao" name="movimentacao" class="form-control input-md" disabled value="<?php echo $movimento ?>" type="text">
            </div>

          </div>
          <div class="form-group">
            <label class="col-md-2 control-label" for="id_tipo_visita">Tipo de visitante <h11>*</h11></label>
            <div class="col-md-3">

              <select required id="id_tipo_visita" name="id_tipo_visita" class="form-control" <?= $altera_form ?>>
                <option value="<?= $visitante['id_tipo_visita'] ?>"><?php echo ($visitante['tipo_visita']) ?></option>
                <?php
                $buscaTpVisita = mysqli_query($link, "SELECT id_tipo_visita , tipo_visita FROM tb_tipo_visita");
                $arrayTpvisita = $buscaTpVisita->fetch_all();
                foreach ($arrayTpvisita as $key => $value) :
                  echo '<option value="' . $value[0] . '">' . $value[1] . '</option>';
                endforeach;
                ?>
              </select>
            </div>

            <div class="col-md-1">
              <input type="hidden" id="id_visitante" name="id_visitante" class="form-control input-md" readonly value="<?= $id_visitante ?>" type="text">
              <input type="hidden" id="id_status" name="id_status" class="form-control input-md" readonly value="<?= $id_status ?>" type="text">
            </div>


            <div class="form-group">
              <label class="col-md-2 control-label" for="observacao">Observações<h11>*</h11></label>
              <div class="col-md-3">
                <textarea id="observacao" type="text" name="observacao" rows="5" cols="10" class="form-control input-md" <?= $altera_form ?> ><?= $visitante['observacao'] ?></textarea>
              </div>
            </div>

          </div>
          <!-- Select Basic -->
          <div class="form-group">
            <div class="col-md-12">
              <div class="col-md-6">
              </div>
              <div class="col-md-3">
              <a href="../view/relatorio_pdf_visitante_view.php?id_visitante=<?php echo $id_visitante?>" class="btn btn-primary" name="btn_relatorio">Relatorio de Movimentação</a>
            </div>

              <div class="col-md-1">
              <a href="../view/buscar_visitantes_view.php" class="btn btn-primary">Voltar</a>
                </button>
              </div>
              <div class="col-md-1">
                <a href="../controller/saida_visitante.php?id_visitante=<?php echo $id_visitante ?>&id_morador=<?= $id_morador ?>" <?= $btn_saida ?> class="btn btn-primary">Saida</a>
              </div>

              <div class="col-md-1">
                <button type="submit" class="btn btn-primary" value="Entrada" <?= $btn_entrada ?>>Entrada</button> 
              </div>
            </div>

          </div>

        </div>
      </form>
     
    </div>

  </div>
  <?php require_once "../rodape.php"; ?>