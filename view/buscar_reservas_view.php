<?php require_once "../navegacao.php";?>
<title>buscar_reserva</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">
<div class="container">
  <div class="pager-header">
    <h1>Buscar Reservas </h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal">

        <div class="panel panel-primary">


          <div class="panel-body">


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
            <label class="col-md-2 control-label" for="torre">Espaços<h11></h11></label>
            <div class="col-md-2">
              <select required id="torre" name="torre" class="form-control">
               <option value="1"><h2>Currasqueira</h2></option>
               <option value="2"><h2>Salão de festas</h2></option>
               
             </select>
           </div>
           <label class="col-md-2 control-label" for="Nome">Data Evento<h11>*</h11></label>  
           <div class="col-md-2">
            <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
          </div>

        </div>


        <div class="form-group">


        </div>

        <div class="form-group">

        </div>


        <div class="col-md-10">

          <div class="col-md-10">

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



