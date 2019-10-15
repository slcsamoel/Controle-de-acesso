
 <?php require_once "../cabecalho_aux.php";
 require_once('../model/Reserva.php');

$reserva = new Reserva();
$torre = $_GET['torre'];
$espacos = $_GET['espacos'];
$data_reserva = $_GET['dtEvento'];
 
 $busca  = "SELECT descricao_bloco, descricao_espaco, res.id_morador, nome, evento, dt_reserva  FROM tb_reserva AS res
                                INNER JOIN tb_espacos ON (res.id_espaco = id_espacos) 
                                INNER JOIN tb_morador AS tbMorador  ON (res.id_morador = tbMorador.id_morador)
                                INNER JOIN tb_bloco AS tbBloco ON (res.id_bloco = tbBloco.id_bloco) 
                                WHERE res.id_bloco = '$torre' 
                                AND   id_espaco = '$espacos'
                                AND   dt_reserva = '$data_reserva'";
                $resultado_busca = mysqli_query($link, $busca);
                $row_usuario = mysqli_fetch_assoc($resultado_busca);
                ?>

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
      <form class="form-horizontal"  method="POST" action="../controller/alterar_reserva.php">
        <div class="panel panel-primary">
          <div class="panel-body">
           <div class="form-group">
            <label class="col-md-1 control-label" for="prependedtext">Local</label>

            
            <div class="col-md-2">
              <div class="input-group">
                <span class="input-group-addon">Bloco<h11>*</h11></span>
                <select required id="id_bloco" name="id_bloco" class="form-control" value="<?php echo($row_usuario['id_bloco'])?>">
                <option value="<?php echo($row_usuario['id_bloco'])?>"></option>   
              <option value="1">Bloco-A</option>
              <option value="2">Bloco-B</option>
              <option value="3">Bloco-C</option>
              <option value="4">Bloco-D</option>
              <option value="5">Bloco-E</option>
              <option value="6">Bloco-F</option>
            </select>
              </div>
            </div>

            <div class="col-md-3">
             <div class="input-group">
              <span class="input-group-addon">Espaço<h11>*</h11></span>
              <select required id="id_espaco" name="id_espaco" class="form-control">
                <option value="<?php echo($row_usuario['id_espaco'])?>"></option>   
              <option value="1">Churrasqueira</option>
              <option value="2">Salao de Festa</option>
            </select>
            </div>
          </div>

          <div class="col-md-3">
             <div class="input-group">
              <span class="input-group-addon">Status<h11>*</h11></span>
              <select required id="id_status_reserva" name="id_status_reserva" class="form-control">
                <option value="<?php //echo($row_usuario[])?>"></option>   
              <option value="1">ATIVA</option>
              <option value="2">CANCELADA</option>
            </select>
            </div>
          </div>



        </div>
        <div class="form-group">     
          
               <label class="col-md-2 control-label" for="id_morador">Código de Acesso:<h11></h11></label>  
                <div class="col-md-1">
                  <input id="id_morador" name="id_morador" placeholder="Apenas números" value="<?php echo($row_usuario['id_morador'])?>" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                </div>
                <label class="col-md-2 control-label" for="evento">Evento<h11></h11></label>  
                <div class="col-md-3">
                  <input id="evento" name="evento" placeholder="Evento" value="<?php echo($row_usuario['evento'])?>" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                </div>
                <label class="col-md-2 control-label" for="dtEvento">Data Evento<h11>*</h11></label>  
                <div class="col-md-2">
                  <input id="dtEvento" name="dtEvento" placeholder="DD/MM/AAAA" value="<?php echo($row_usuario['dt_reserva'])?>" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                </div>

            </div>
        <div class="form-group">

          <label class="col-md-1 control-label" for="nome">Nome <h11></h11></label>  
              <div class="col-md-6">
                <input id="nome" name="nome" placeholder="" class="form-control input-md" value="<?php echo($row_usuario['nome'])?>" required="" type="text" disabled>
              </div>

          <div class="col-md-3">
          </div>

          <div class="col-md-1">
            <button type="submit" class="btn btn-primary">Voltar</button>
          </div>
          <div class="col-md-1">
            <button type="button" class="btn btn-primary">Salvar</button>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>

<?php require_once "../rodape.php";?>