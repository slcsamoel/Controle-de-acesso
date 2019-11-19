
<?php 
require_once "../model/Morador.php";
require_once "../cabecalho_aux.php";
require_once('../controller/conexao_banco.php');?>
<title>buscar_morador</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/modern-business.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">

<div class="container">
  <div class="pager-header">
    <h1>Buscar Morador</h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal" action="#" method="post">

        <div class="panel panel-primary">


          <div class="panel-body">
            <div class="form-group">

              <div class="col-md-12 control-label">

                <!---<label class="col-md-2 control-label" for="">Codigo de Acesso<h11></h11></label>  
                <div class="col-md-1">
                  <input id="id_morador" name="id_morador"  class="form-control input-md" type="text" maxlength="10" pattern="[0-9]+$">
                </div>-->

               <!--- <label class="col-md-2 control-label" for="cpf">CPF <h11>*</h11></label>  
              <div class="col-md-2">
                <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md"  type="text" maxlength="11" pattern="[0-9]+$">
              </div>-->
              <label class="col-md-2 control-label" for="nome">Nome<h11>*</h11></label>  
              <div class="col-md-6">
                <input id="nome" name="nome" placeholder="Nome" class="form-control input-md"  type="text">
              </div>

            </div> 
            <div class="form-group">  
              <div class="col-md-2">    
            </div> 
             <div class="col-md-4">    
              </div>
            </div>
            <div class="col-md-8">
              <div class="col-md-6">
              </div>
              </div>
              <div class="col-md-1">
              </div>
            <div class="col-md-3">
              <button type="submit" class="btn btn-primary" value="buscar">Buscar
              </button>
            </div>

          </div>


        </div>

      </div>

      <?php

  error_reporting(0);
  ini_set(“display_errors”, 0 );

  $morador = new Morador();
  if($_POST['nome']!='' AND $_POST['nome'] != null ){$morador->setNome($nomeMorador = $_POST['nome']); 
  $morador->buscarMorador($link, $nomeMorador);
  }
?>
    </form>

    </div>
    <?php require_once "../rodape.php";?>


