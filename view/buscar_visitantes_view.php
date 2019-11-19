<?php
require_once "../cabecalho_aux.php"; 
require_once "../model/Visitante.php";
require_once "../cabecalho_aux.php";
require_once('../controller/conexao_banco.php');
?>
<title>buscar_visitantes</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">
<div class="container">
  <div class="pager-header">
    <h1>Buscar Visitantes</h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal" action="#" method="post">

        <div class="panel panel-primary">

          <div class="panel-body">
            <div class="form-group">

              <div class="col-md-11 control-label">
                <label class="col-md-2 control-label" for="nome">Nome<h11></h11></label>
                <div class="col-md-4">
                  <input id="nome" name="nome" class="form-control input-md" type="text">
                </div>

              </div>
            </div>

            <div class="col-md-8">
              <div class="col-md-6">
              </div>
            </div>

            <div class="col-md-2">
              <button type="submit" class="btn btn-primary">Buscar</button>
            </div>

          </div>


        </div>
        <?php

        error_reporting(0);
        ini_set(“display_errors”, 0);

        $visitante = new Visitante();
        if ($_POST['nome'] != '' and $_POST['nome'] != null) {
          $visitante->setNome($nomeVisitante = $_POST['nome']);
          $visitante->buscarVisitante($link, $nomeVisitante);
        }
        ?>

      </form>
    </div>

  </div>

  <?php require_once "../rodape.php"; ?>