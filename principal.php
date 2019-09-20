<?php include "cabecalho.php"; ?>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/estilo.css" rel="stylesheet">

<!--Barra navegaçaõ -->
<form class="form-horizontal">


  <div id="img_fundo_nav" class="page-header col-md-4">
    <h1>
      <img src="imagens/logo.jpeg" class="ca">
    </h1>
  </div>
  <div class="form-group">
    <label class="col-md-1 control-label" for="id">id<h11>*</h11></label>
    <div class="col-md-1">
      <input id="id" name="placa" class="form-control input-md" value="">
    </div>
    <label class="col-md-1 control-label" for="Nome">Nome <h11>*</h11></label>
    <div class="col-md-3">
      <input id="Nome" name="Nome" placeholder="" class="form-control input-md" type="text">
    </div>
    <div class="col-sm-1">
      <button type="button" class="btn btn-primary">Buscar</button>
    </div>
    
   
  
    <div class="col-md-6 control-label">
    <div class="col-sm-8">
    </div>
      <div class="col-sm-4">
        <img src="imagens/img_morador.png" class="img-responsive img-thumbnail" name="img_morador">
      </div>
    
      <div class="col-md-12 control-label">
      <div class="col-sm-8">
    </div>
    <div class="col-md-2">
    <button type="button" class="btn btn-primary" name="btn_entrada" value="0" >Entrada</button>
  </div>
  
  <div class="col-md-2">
    <button type="button" class="btn btn-primary" name="btn_saida" value="0" >Saida</button>
  </div>
  </div>
  </div>
  </div>

  </div>

  </div>

  <?php include "rodape.php"; ?>