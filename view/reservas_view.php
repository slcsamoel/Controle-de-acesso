
 <?php require_once "../cabecalho_aux.php";?>

  <title>Cadastra_reserva</title>

  <!-- Bootstrap -->
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/estilo.css" rel="stylesheet">
  
<div class="container">
  <div class="pager-header">
    <h1>Reservas</h1>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <form class="form-horizontal">
        <div class="panel panel-primary">
          <div class="panel-body">
           <div class="form-group">
            <label class="col-md-1 control-label" for="prependedtext">Local</label>
            <div class="col-md-2">
              <div class="input-group">
                <span class="input-group-addon">Torre <h11>*</h11></span>
                <input id="numero" name="numero" class="form-control" placeholder="" required=""  type="text">
              </div>
            </div>
            <div class="col-md-3">
             <div class="input-group">
              <span class="input-group-addon">Espaço<h11>*</h11></span>
              <input id="numero" name="numero" class="form-control" placeholder="" required=""  type="text">
            </div>

          </div>
        </div>
        <div class="form-group">     
              <div class="col-md-11 control-label">
               <label class="col-md-1 control-label" for="id_morador">ID <h11></h11></label>  
                <div class="col-md-2">
                  <input id="id_morador" name="id_morador" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                </div>
                <label class="col-md-2 control-label" for="evento">Evento<h11></h11></label>  
                <div class="col-md-3">
                  <input id="evento" name="evento" placeholder="Evento" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                </div>
                <label class="col-md-2 control-label" for="Nome">Data Evento<h11>*</h11></label>  
                <div class="col-md-2">
                  <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                </div>

              </div>
            </div>
        <div class="form-group">

          <label class="col-md-1 control-label" for="Nome">Nome <h11></h11></label>  
              <div class="col-md-6">
                <input id="Nome" name="Nome" placeholder="" class="form-control input-md" required="" type="text">
              </div>

          <div class="col-md-1">
            <button type="button" class="btn btn-primary">Altera</button>
          </div>
          <div class="col-md-1">
            <button type="button" class="btn btn-primary">Excluir</button>
          </div>
          <div class="col-md-1">
            <button type="button" class="btn btn-primary">Novo</button>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>

<?php require_once "../rodape.php";?>