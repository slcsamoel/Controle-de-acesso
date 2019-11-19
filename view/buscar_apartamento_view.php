<?php
require_once "../cabecalho_aux.php";
require_once('../model/Apartamento.php');
require_once('../controller/conexao_banco.php');?>
<title>buscar_apartamentos</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">


<div class="container">
  <div class="pager-header">
    <h1>Buscar Apartamentos</h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal" method="POST" action="#">

        <div class="panel panel-primary">


          <div class="panel-body">
            <div class="form-group">

              <div class="form-group">
                <label class="col-md-2 control-label" for="torre">Torre<h11></h11></label>
                <div class="col-md-2">
                  <select required id="torre" name="torre" class="form-control">
                    <option value=""></option>
                    <?php 
                    $buscaTorre  = mysqli_query($link, "SELECT descricao_bloco, id_bloco FROM tb_bloco "); 
                    $arrayTorres = $buscaTorre->fetch_all();
                    foreach($arrayTorres as $key => $value):
                      echo '<option value="'.$value[1].'">'.$value[0].'</option>'; 
                    endforeach;
                    ?>
                  </select>
                </div>

                <!-- Prepended checkbox -->
                <label class="col-md-2 control-label" for="numero">Número AP.<h11></h11></label>  
                <div class="col-md-2">
                  <input id="numero" name="numero" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                </div>

              </div>
            </div>
            <div class="col-md-8">

              <div class="col-md-6">

              </div>

            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary">Buscar
              </button>
            </div>

          </div>

        </div>

        <?php

      error_reporting(0);
      ini_set(“display_errors”, 0 );

      $apartamento = new Apartamento();
      $apartamento->setNr_apartamento($numeroAp = $_POST['numero']);
      $apartamento->setId_bloco($bloco = $_POST['torre']);
      $apartamento->buscaMorardorPorApartamento($link, $numeroAp, $bloco);
?>

      </form>
    </div>

  </div>


</div>
</div>

<?php require_once "../rodape.php";?>