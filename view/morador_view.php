<?php
require_once "../cabecalho_aux.php";
require_once('../model/Morador.php');
require_once('../model/Apartamento.php');
require_once('../controller/conexao_banco.php');

if ($id_nivel_acesso < 2) {
  $display = 'none';
  $desativar = 'disabled';
} else {
  $display = '';
  $desativar = '';
}

?>
<title>morador</title>
<?php

//$morador = new Morador();
//$apartamento = new Apartamento();
$id_morador = $_GET['id_morador'];
$resultado  = "SELECT * FROM tb_morador as mor 
INNER JOIN tb_status as st ON (mor.id_status = st.id_status) INNER JOIN tb_tipo_morador as tp ON (mor.id_tipo_morador = tp.id_tipo_morador) WHERE mor.id_morador IN ('$id_morador')";
$resultado_morador = mysqli_query($link, $resultado);
$morador = mysqli_fetch_array($resultado_morador);
$dt_cad = new DateTime($morador['dt_cadastro']);
$dt_cadastro = $dt_cad->format('d-m-Y H:i:s');
//INNER JOIN tb_img_morador as img ON (mor.id_morador = img.id_morador) 
//INNER JOIN tb_veiculo as veic ON (mor.id_morador = veic.id_morador) 

//BUSCANDO IMAGEM
$resultado_img = "SELECT * FROM tb_img_morador 
WHERE id_morador = '$id_morador'";
$resultado_imagem = mysqli_query($link, $resultado_img);
$imagem = mysqli_fetch_array($resultado_imagem);



//BUSCANDO VEICULOS
$resultado_veic = "SELECT * FROM tb_veiculo  
WHERE id_morador = '$id_morador'";
$resultado_veiculo = mysqli_query($link, $resultado_veic);
$veiculo = mysqli_fetch_array($resultado_veiculo);


//buscando o apartamento
$resultado_apart = "SELECT * FROM tb_morador as mor 
LEFT JOIN tb_apartamento as apart ON (mor.id_apartamento = apart.id_apartamento) INNER JOIN tb_bloco as bloc ON (apart.id_bloco = bloc.id_bloco) 
WHERE mor.id_morador = '$id_morador'";
$resultado_apartamento = mysqli_query($link, $resultado_apart);
$apartamento = mysqli_fetch_array($resultado_apartamento);

//buscando as movimentações
$btn_entrada = "";
$btn_saida = "";
$resultado_movi = "SELECT * FROM tb_mov_morador WHERE id_morador = '$id_morador' ORDER BY id_movimentacao DESC LIMIT 1";
$resultado_movimentacao = mysqli_query($link, $resultado_movi);
$movimentacao = mysqli_fetch_array($resultado_movimentacao);

if ($movimentacao['id_tp_movimentacao'] < 2) {
  $btn_entrada = "disabled";
} else {
  $btn_saida = "disabled";
}
$dt_mov = new DateTime($movimentacao['dt_movimentacao']);
$dt_movimentacao = $dt_mov->format('d-m-Y H:i:s');

?>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">


<div class="container">
  <div class="pager-header">
    <h1>Morador</h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal" enctype="multipart/form-data" action="../controller/alterar_morador.php" method="post">

        <div class="panel panel-primary">


          <div class="panel-body">


            <!-- Text input-->
            <div class="form-group">


              <label class="col-md-2 control-label">Codigo de Acesso <h11>*</h11></label>
              <div class="col-md-1">
                <input id="id_morador" name="id_morador" placeholder="" class="form-control input-md" value="<?php echo $morador['id_morador'] ?>" type="text" readonly>
              </div>

              <label class="col-md-2 control-label" for="nome">Nome <h11>*</h11></label>
              <div class="col-md-6">
                <input id="nome" name="nome" placeholder="" class="form-control input-md" value="<?php echo $morador['nome'] ?>" type="text" <?= $desativar ?>>
              </div>
            </div>

            <div class="form-group">

              <label class="col-md-2 control-label" for="nome_mae">Nome da Mãe<h11>*</h11></label>
              <div class="col-md-4">
                <input id="nome_mae" name="nome_mae" placeholder="" class="form-control input-md" value="<?php echo $morador['nome_mae'] ?>" type="text" <?= $desativar ?>>
              </div>

              <label class="col-md-2 control-label" for="nome_pai">Nome da Pai<h11>*</h11></label>
              <div class="col-md-4">
                <input id="nome_pai" name="nome_pai" placeholder="" class="form-control input-md" value="<?php echo $morador['nome_pai'] ?>" type="text" <?= $desativar ?>>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="Nome">CPF <h11>*</h11></label>
              <div class="col-md-2">
                <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" value="<?php echo $morador['cpf'] ?>" type="text" maxlength="11" pattern="[0-9]+$" <?= $desativar ?>>
              </div>

              <label class="col-md-1 control-label" for="dt_nascimento">Nascimento<h11>*</h11></label>
              <div class="col-md-2">
                <input id="dt_nascimento" name="dt_nascimento" placeholder="DD/MM/AAAA" class="form-control input-md" value="<?php echo $morador['dt_nascimento'] ?>" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()" <?= $desativar ?>>
              </div>

              <!--input tipo radio para selecionar o sexo  -->

              <label class="col-md-1 control-label" for="radios" value="<?php echo $morador['sexo'] ?>">Sexo <h11>*</h11></label>
              <div class="col-md-4">
                <label required="" class="radio-inline" for="radios-0">
                  <input name="sexo" id="sexo" <?php if ($morador['sexo'] == 'feminino') {
                                                  echo "checked";
                                                } ?> value="feminino" type="radio" <?= $desativar ?>>
                  Feminino
                </label>
                <label class="radio-inline" for="radios-1">
                  <input name="sexo" id="sexo" <?php if ($morador['sexo'] == 'masculino') {
                                                  echo "checked";
                                                } ?> value="masculino" type="radio" <?= $desativar ?>>
                  Masculino
                </label>
              </div>
            </div>

            <!-- Prepended text-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="Nome">RG <h11>*</h11></label>
              <div class="col-md-2">
                <input id="rg" name="rg" class="form-control input-md" type="text" value="<?php echo $morador['rg'] ?> " maxlength="11" <?= $desativar ?>>
              </div>

              <label class="col-md-1 control-label" for="prependedtext">Telefone</label>
              <div class="col-md-2">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                  <input id="telefone" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX" type="text" value="<?php echo $morador['telefone'] ?>" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$" OnKeyPress="formatar('## #####-####', this)" <?= $desativar ?>>
                </div>
              </div>
            </div>

            <!-- Prepended text-->

            <div class="form-group">
              <label class="col-md-2 control-label" for="dt_cadastro">Data Cadastro<h11>*</h11></label>
              <div class="col-md-2">
                <input id="dt_cadastro" name="dt_cadastro" class="form-control input-md" type="datetime" value="<?php echo $dt_cadastro ?>" maxlength="13" onBlur="showhide()" disabled>
              </div>


              <!-- Search input-->

              <label class="col-md-1 control-label" for="placa">Placa <h11></h11></label>
              <div class="col-md-2">
                <input id="placa" name="placa" placeholder="letra e numeros" class="form-control input-md" value="<?php echo $veiculo['placa'] ?>" <?= $desativar ?>>
              </div>
              <label class="col-md-2 control-label" for="descricao_veiculo">Descrição do Veiculo<h11></h11></label>
              <div class="col-md-2">
                <input id="descricao_veiculo" name="descricao_veiculo" class="form-control input-md" value="<?php echo $veiculo['descricao_veiculo'] ?>" <?= $desativar ?>>
              </div>
            </div>

            <!-- Prepended text-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="prependedtext">Apartamento</label>
              <div class="col-md-3">
                <div class="input-group">
                  <span class="input-group-addon">Bloco<h11>*</h11></span>
                  <select required id="id_bloco" name="id_bloco" class="form-control" value="<?php echo ($apartamento['id_bloco']) ?>" <?= $desativar ?>>
                    <option value="<?php echo ($apartamento['id_bloco']) ?>"><?php echo ($apartamento['descricao_bloco']) ?></option>
                    <option value="1">Bloco-A</option>
                    <option value="2">Bloco-B</option>
                    <option value="3">Bloco-C</option>
                    <option value="4">Bloco-D</option>
                    <option value="5">Bloco-E</option>
                    <option value="6">Bloco-F</option>
                  </select>
                </div>
              </div>

              <div class="col-md-2">
                <div class="input-group">
                  <span class="input-group-addon">Numero<h11>*</h11></span>
                  <input id="nr_apartamento" name="nr_apartamento" class="form-control" type="text" value="<?php echo ($apartamento['nr_apartamento']) ?>" <?= $desativar ?>>
                </div>
              </div>

              <label class="col-md-1 control-label" for="id_status">Status<h11>*</h11></label>
              <div class="col-md-2">
                <select required id="id_status" name="id_status" class="form-control" <?= $desativar ?>>
                  <option value="<?= $morador['id_status'] ?>"><?php echo ($morador['status']) ?></option>
                  <?php
                  $buscaStatus = mysqli_query($link, "SELECT id_status , status FROM tb_status");
                  $arrayStatus = $buscaStatus->fetch_all();
                  foreach ($arrayStatus as $key => $value) :
                    echo '<option value="' . $value[0] . '">' . $value[1] . '</option>';
                  endforeach;
                  ?>
                </select>
              </div>
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="id_tipo_morador">Tipo Morador <h11>*</h11></label>
            <div class="col-md-2">
              <select required id="id_tipo_morador" name="id_tipo_morador" class="form-control" <?= $desativar ?>>
                <option value="<?= $morador["id_tipo_morador"] ?>"><?= $morador["tipo_morador"] ?></option>
                <?php
                $buscaTipo = mysqli_query($link, "SELECT id_tipo_morador , tipo_morador FROM tb_tipo_morador");
                $arrayTipo = $buscaTipo->fetch_all();
                foreach ($arrayTipo as $key => $value) :
                  echo '<option value="' . $value[0] . '">' . $value[1] . '</option>';
                endforeach;
                ?>
              </select>
            </div>
            <label class="col-md-1 control-label" for="dt_entrada">Entrada</label>
            <div class="col-md-2">
              <input id="dt_entrada" name="dt_entrada" placeholder="DD/MM/AAAA" class="form-control input-md" type="datetime" value="<?php if ($movimentacao['id_tp_movimentacao'] < 2) echo $dt_movimentacao; ?>" maxlength="13" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()" disabled>
            </div>
            <label class="col-md-1 control-label" for="dt_saida">Saida</label>
            <div class="col-md-2">
              <input id="dt_cadastro" name="dt_cadastro" placeholder="DD/MM/AAAA" class="form-control input-md" type="datetime" value="<?php if ($movimentacao['id_tp_movimentacao'] > 1) echo $dt_movimentacao; ?>" maxlength="13" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()" disabled>
            </div>
            <div class="col-sm-2">
              <img name=" imagem" src="<?php echo '../fotos_moradores/' . $imagem['imagem'] ?>" class="img-responsive img-thumbnail">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
            </div>
            <label class="col-md-2 control-label">Altera Foto<h11>*</h11></label>
            <div class="col-md-3">
              <input name="imagem_nova" type="file" class=" form-control-file " />
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">

            <div class="col-md-4">

            </div>
            <div class="col-md-3">
              <a href="../view/relatorio_pdf_morador_view.php?id_morador=<?php echo $id_morador ?>" class="btn btn-primary" name="btn_relatorio">Relatorio de Movimentação</a>

            </div>
            <div class="col-md-1">
              <a href="../controller/entrada_morador.php?id_morador=<?php echo $id_morador ?>" class="btn btn-primary" name="btn_entrada" <?= $btn_entrada ?>>Entrada</a>
            </div>

            <div class="col-md-1">
              <a href="../controller/saida_morador.php?id_morador=<?php echo $id_morador ?>" class="btn btn-primary" name="btn_saida" <?= $btn_saida ?>>Saida</a>
            </div>

            <div class="col-md-1">
              <a href="../view/buscar_morador_view.php" class="btn btn-primary" name="btn_voltar">Voltar</a>
            </div>

            <div class="col-md-2">
              <button type="submit" class="btn btn-primary" name="salvar" <?= 'style="display:' . $display . '"' ?>>Salvar e Sair</button>
            </div>
          </div>


        </div>

        <!-- Text input-->
    </div>

  </div>

  <?php require_once "../rodape.php"; ?>