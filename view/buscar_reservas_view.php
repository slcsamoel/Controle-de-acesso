<?php require_once "../cabecalho_aux.php";
require_once('../model/Reserva.php');
require_once('../controller/conexao_banco.php');?>
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

      <form class="form-horizontal" method="POST" action="#">

        <div class="panel panel-primary">


          <div class="panel-body">


           

            <!-- Prepended checkbox -->
            <label class="col-md-2 control-label" for="espacos">Espaços<h11></h11></label>
            <div class="col-md-2">
              <select required id="espacos" name="espacos" class="form-control">
              <option value="1"><h2></h2></option>
               <option value="1"><h2>Currasqueira</h2></option>
               <option value="2"><h2>Salão de festas</h2></option>
               
             </select>
           </div>
           <label class="col-md-2 control-label" for="dtEvento">Data Evento<h11>*</h11></label>  
           <div class="col-md-2">
            <input id="dtEvento" name="dtEvento" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
          </div>

        </div>

        <div class="form-group">

        </div>
        <div class="form-group">
        <div class="col-md-2">
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

  $morador = new Morador();
  $morador->setNome($nomeMorador = $_POST['nome']);
  $morador->buscarMorador($link, $nomeMorador);
  ?>



  </form>


</div>

</div>
</div>
</div>
<?php require_once "../rodape.php";?>



