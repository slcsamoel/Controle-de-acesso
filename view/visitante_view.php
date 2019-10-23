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

//buscando as movimentações
$btn_entrada = "";
$btn_saida = "";
$resultado_movi = "SELECT * FROM tb_visita_morador as vi INNER JOIN tb_tp_movimentacao as tpm (vi.id_tp_movimentacao = tpm.id_tp_movimentacao) WHERE id_visitante = '$id_visitante' ORDER BY id_visita_morador DESC LIMIT 1 ";
$resultado_movimentacao = mysqli_query($link, $resultado_movi);
$movimentacao = mysqli_fetch_array($resultado_movimentacao);

if ($movimentacao['id_tp_movimentacao'] < 2){
  $btn_entrada = "disabled";
} else {
  $btn_saida = "disabled";
}

?>

<div class="container">
  <div class="pager-header">
    <h1>Visitante</h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal" action="../controller/cadastra_visitante.php" method="post" >

        <div class="panel panel-primary">


          <div class="panel-body">
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="nome">Nome <h11>*</h11></label>
            <div class="col-md-8">
              <input id="nome" name="nome" placeholder="" class="form-control input-md" required="" value="<?php echo $visitante['nome']?>" <?= $btn_entrada ?>  type="text">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="cpf">CPF <h11>*</h11></label>
            <div class="col-md-2">
              <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" value="<?php echo $visitante['cpf']?>" <?= $btn_entrada ?> type="text" maxlength="11" pattern="[0-9]+$">
            </div>

            <label class="col-md-1 control-label" for="dt_nascimento">Nascimento<h11>*</h11></label>
            <div class="col-md-2">
              <input id="dt_nascimento" name="dt_nascimento" placeholder="DD/MM/AAAA"  class="form-control input-md" required="" value="<?php echo $visitante['dt_nascimento']?>" <?= $btn_entrada ?>   type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
            </div>

            <!-- Multiple Radios (inline) -->

            <label class="col-md-1 control-label" for="radios">Sexo <h11>*</h11></label>
            <div class="col-md-4">
              <label required="" class="radio-inline" for="radios-0">
                <input name="sexo" id="sexo" value="feminino" type="radio" required>
                Feminino
              </label>
              <label class="radio-inline" for="radios-1">
                <input name="sexo" id="sexo" value="masculino" type="radio">
                Masculino
              </label>
            </div>
          </div>

          <!-- Prepended text-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="rg">RG <h11>*</h11></label>
            <div class="col-md-2">
              <input id="rg" name="rg" placeholder="Apenas números" class="form-control input-md" required="" value="<?php echo $visitante['rg']?>" <?= $btn_entrada ?>  type="text" maxlength="11" pattern="[0-9]+$">
            </div>

            <label class="col-md-1 control-label" for="telefone">Telefone</label>
            <div class="col-md-2">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input id="telefone" name="telefone" class="form-control" OnKeyPress="formatar('##-#####-####', this)" value="<?php echo $visitante['telefone']?>" <?= $btn_entrada ?>   type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$" OnKeyPress="formatar('## #####-####', this)">
              </div>
            </div>

            <label class="col-md-2 control-label" for="id_morador">Codigo de liberação</label>
            <div class="col-md-2">
              <div class="input-group">
                <span class="input-group-addon">Morador<h11>*</h11></span>
                <input id="id_morador" name="id_morador" class="form-control" placeholder="" required="" value="<?php echo $visitante['id_morador']?>" <?= $btn_entrada ?>  type="text">
              </div>
            </div>
          </div>

          <div class="form-group">
          <label class="col-md-2 control-label" for="dt_movimentacao">Ultima Movimentação<h11>*</h11></label>
            <div class="col-md-2">
              <input id="dt_movimentacao" name="dt_movimentacao" class="form-control input-md"  type="datetime" disabled value="<?php echo $movimentacao['dt_movimentacao']?>"  OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
            </div>

            <div class="col-md-3">
              <input id="movimentacao" name="movimentacao"  class="form-control input-md" disabled  value="<?php echo $movimentacao['movimentacao']?>" type="text">
            </div>
        

          </div>



          <div class="form-group">
            <label class="col-md-2 control-label" for="id_tipo_visita">Tipo de visitante <h11>*</h11></label>
            <div class="col-md-2">
              <select required id="id_tipo_visita" name="id_tipo_visita" class="form-control" value="<?php echo $visitante['id_tipo_visita']?>" >
                <option value="1">Visita</option>
                <option value="2">Prestador serviço</option>
              </select>
            </div>


            <div class="form-group">
              <label class="col-md-2 control-label" for="observacao">Observações<h11>*</h11></label>
              <div class="col-md-4">
                <textarea id="observacao" name="observacao" rows="5"  cols="10" class="form-control input-md"></textarea>
              </div>
            </div>

          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <div class="col-md-12">
            <div class="col-md-6">
              </div>
              <div class="col-md-3">
                <button type="submit" class="btn btn-primary" value="entrada" <?= $btn_saida ?> >Saida</button>
              </div>
              <div class="col-md-3">
                <button type="submit" class="btn btn-primary" value="entrada" <?= $btn_entrada ?>>entrada</button>
              </div>
            </div>

          </div>

        </div>
      </form>
    </div>

  </div>
  <?php require_once "../rodape.php"; ?>