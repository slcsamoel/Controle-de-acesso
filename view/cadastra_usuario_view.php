<?php require_once "../cabecalho_aux.php";?>
<title>Cadastra_usuario</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">

<div class="container">
  <div class="pager-header">
    <h1>Cadastrar Usuario </h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal">

        <div class="panel panel-primary">     
          <div class="panel-body">

           <div class="form-group">
            <label class="col-md-2 control-label" for="nivel_acesso">Nivel Acesso<h11></h11></label>
            <div class="col-md-2">
              <select required id="torre" name="nivel_acesso" class="form-control"> 
              <option value=""></option>
                <option value="1"><h3>1-Portaria</h3></option>
                <option value="2"><h3>2-Sindico</h3></option>
              </select>
            </div>
          </div>


          <div class="form-group">
        
              <div class="col-md-11 control-label">

                <label class="col-md-2 control-label" for="usuario">Usuario<h11></h11></label>  
                <div class="col-md-2">
                  <input id="usuario" name="usuario" placeholder=" usuario " class="form-control input-md" required="" type="text" maxlength="9">
                </div>


                <label class="col-md-2 control-label" for="senha">Senha<h11></h11></label>  
                <div class="col-md-2">
                  <input id="senha" name="senha" placeholder="*********" class="form-control input-md" required="" type="passwords">
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
              <button type="button" class="btn btn-primary">Cadastrar
              </button>
            </div>

          </div>


        </div>

        <!-- Text input-->
      </div>

    </div>

     <?php require_once "../rodape.php";?>
