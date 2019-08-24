<?php require_once "../navegacao.php";?>
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

      <form class="form-horizontal">

        <div class="panel panel-primary">


          <div class="panel-body">
            <div class="form-group">

              <div class="form-group">
                <label class="col-md-2 control-label" for="torre">Torre<h11></h11></label>
                <div class="col-md-2">
                  <select required id="torre" name="torre" class="form-control">
                    <option value=""></option>
                    <option value="1"><h3>1</h3></option>
                    <option value="2"><h3>2</h3></option>
                    <option value="3"><h3>3</h3></option>
                    <option value="4"><h3>4</h3></option>
                  </select>
                </div>

                <!-- Prepended checkbox -->
                <label class="col-md-2 control-label" for="numero">Numero<h11></h11></label>  
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
              <button type="button" class="btn btn-primary">Buscar
              </button>
            </div>

          </div>

        </div>

      </form>
    </div>

  </div>


</div>
</div>

<?php require_once "../rodape.php";?>