<?php
require_once "../cabecalho_aux.php";
require_once('../controller/conexao_banco.php');
?>
<title>Altera Senha </title>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="js/jquery-3.4.1.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">

<div class="container">
  <div class="pager-header">
    <h1> Altera Senha </h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal" action="../controller/alterar_senha.php" method="post" >

        <div class="panel panel-primary">     
          <div class="panel-body">
          <div class="form-group">
        
              <div class="col-md-11 control-label">

                <label class="col-md-2 control-label" for="usuario">Nova Senha<h11>*</h11></label>  
                <div class="col-md-2">
                <input id="senha" name="senha" placeholder="*********" class="form-control input-md" required="" type="password">
                </div>
                <label class="col-md-2 control-label" for="confirma_senha"> Confirma Senha<h11>*</h11></label>  
                <div class="col-md-2">
                  <input id="confirma_senha" name="confirma_senha" placeholder="*********" class="form-control input-md" required="" type="password">
                </div>
               
              </div>
            </div>
            <div class="form-group">
            </div>
            <div class="col-md-8">
              <div class="col-md-6">
              </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary" value="Voltar" onClick="JavaScript: window.history.back();">Voltar
              </button>
               </div> 
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary" value="Alterar">Alterar
              </button>
            </div>

          </div>


        </div>

       
      </div>

    </div>

     <?php require_once "../rodape.php";?>
