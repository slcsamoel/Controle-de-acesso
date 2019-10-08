<?php require_once "../cabecalho_aux.php";
require_once('../controller/conexao_banco.php');

?>
<title>Cadastra_reserva</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">

<div class="container">
  <div class="pager-header">
    <h1>Cadastrar Reserva </h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal" method="POST" action="../controller/cadastrar_reserva.php" >

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
                <option value=""></option>
                <?php 
                $buscaEspacos  = mysqli_query($link, "SELECT descricao_espaco, id_espacos FROM tb_espacos "); 
                $arrayEspacos = $buscaEspacos->fetch_all();
                foreach($arrayEspacos as $key => $value):
                  echo '<option value="'.$value[1].'">'.$value[0].'</option>'; 
                endforeach;
                ?>
              </select>
            </div>

          </div>


          <div class="form-group">
    
                <label class="col-md-2 control-label" for="id_morador">Código Morador<h11></h11></label>  
                <div class="col-md-2">
                  <input id="id_morador" name="id_morador" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                </div>


                <label class="col-md-2 control-label" for="evento">Evento<h11></h11></label>  
                <div class="col-md-2">
                  <input id="evento" name="evento"  class="form-control input-md" required="" type="text" maxlength="11" >
                </div>


                <label class="col-md-2 control-label" for="data_reserva">Data Evento<h11>*</h11></label>  
                <div class="col-md-2">
                  <input id="data_reserva" name="data_reserva" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                </div>

              </div>
    
            <div class="form-group">

            </div>
            <div class="col-md-8">

              <div class="col-md-6">

              </div>

            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary">Cadastrar
              </button>
            </div>

          </div>


        </div>

        <!-- Text input-->
      </div>

    </div>
              </form>
     <?php require_once "../rodape.php";?>
