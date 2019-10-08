<?php
require_once "../cabecalho_aux.php";?>
  <title>apartamentos</title>

  <!-- Bootstrap -->
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/estilo.css" rel="stylesheet">
  
<div class="container">
  <div class="pager-header">
    <h1>Apartamentos</h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal">

        <div class="panel panel-primary">


          <div class="panel-body">


           <div class="form-group">
            <div class="col-md-2">
              <div class="input-group">
                <span class="input-group-addon">Torre <h11></h11></span>
                <input id="numero" name="numero" class="form-control" placeholder="" required=""  type="text">
              </div>

            </div>

            <div class="col-md-3">
             <div class="input-group">
              <span class="input-group-addon">Numero<h11></h11></span>
              <input id="numero" name="numero" class="form-control" placeholder="" required=""  type="text">
            </div>

          </div>
        </div>


        <div class="form-group">
          
              <div class="col-md-11 control-label">

                <label class="col-md-1 control-label" for="cpf">Situação<h11></h11></label>  
                <div class="col-md-2">
                  <input id="cpf" name="cpf"class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                </div>
                <label class="col-md-2 control-label" for="cpf">Ramal<h11></h11></label>  
                <div class="col-md-2">
                  <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                </div>

              </div>
            </div>
            <table class="col-md-4 table table-striped table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>Moradores</th>
            <th>ID</th>
         </tr>
        </thead>
        <tbody>
          <tr>
            <td>Samoel lopes Costa </td>
            <td>200</td>
            </tr>
            <tr>
            <td>Saul Matuzinho</td>
            <td>201</td>
            
          </tr>
            <tr>
            <td>Nivaldo Rodrigues</td>
            <td>202</td>
          </tr>
            <tr>
            <td>Edmarques lopes </td>
            <td>203</td>
          </tr>
        </tbody>
      </table>
          </div>

                </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php require_once "../rodape.php";?>

