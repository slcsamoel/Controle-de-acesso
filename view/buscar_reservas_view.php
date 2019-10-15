<?php require_once "../cabecalho_aux.php";
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

      <form class="form-horizontal" method="POST" action="../controller/buscar_reserva.php">

        <div class="panel panel-primary">


          <div class="panel-body">


           <div class="form-group">
            <label class="col-md-2 control-label" for="torre">Torre<h11></h11></label>
            <div class="col-md-2">
              <select required id="torre" name="torre" class="form-control">
              <option value=""></option>
               <?php 
                $buscaTorre  = mysqli_query($link, "SELECT descricao_bloco, id_bloco FROM tb_bloco "); 
                $arrayTorres = $buscaTorre->fetch_all();
                foreach($arrayTorres as $key => $value):
                  echo '<option value="'.$value[1].'">'.$value[0].'</option>'; 
                endforeach;
                ?>
              </select>
            </div>

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

        <div class="col-md-3">
             <div class="input-group">
              <span class="input-group-addon">Status<h11>*</h11></span>
              <select required id="id_status_reserva" name="id_status_reserva" class="form-control">
              <option value="1">ATIVA</option>
              <option value="2">CANCELADA</option>
            </select>
            </div>
          </div>     
          <div class="col-md-5">
        </div>


        <div class="col-md-2">
          <button type="submit" class="btn btn-primary">Buscar
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



