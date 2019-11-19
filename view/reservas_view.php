
 <?php require_once "../cabecalho_aux.php";
 require_once('../model/Reserva.php');

$reserva = new Reserva();
$idReserva = $_GET['id'];
 
 $busca  = "SELECT id_reserva, descricao_bloco, descricao_espaco, res.id_morador, nome, evento, dt_reserva, status_reserva, res.id_bloco, res.id_status_reserva,  res.id_espaco FROM tb_reserva AS res
                                INNER JOIN tb_espacos ON (res.id_espaco = id_espacos) 
                                INNER JOIN tb_morador AS tbMorador  ON (res.id_morador = tbMorador.id_morador)
                                INNER JOIN tb_bloco AS tbBloco ON (res.id_bloco = tbBloco.id_bloco) 
                                INNER JOIN tb_status_reserva AS tbStatus ON (res.id_status_reserva = tbStatus.id_status_reserva) 
                                WHERE id_reserva = '$idReserva' ";
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

            <input style="display: none;" name='id_reserva' id='id_reserva' value="<?php echo($row_usuario['id_reserva'])?>">
            <div class="col-md-2">
              <div class="input-group">
                <span class="input-group-addon">Bloco<h11>*</h11></span>
                <select  id="torre" name="torre" class="form-control">
                <option value="<?php echo($row_usuario['id_bloco'])?>" ><?php echo($row_usuario['descricao_bloco'])?></option>   
                <?php 
                $buscaTorre  = mysqli_query($link, "SELECT descricao_bloco, id_bloco FROM tb_bloco "); 
                $arrayTorres = $buscaTorre->fetch_all();
                foreach($arrayTorres as $key => $value):
                  echo '<option value="'.$value[1].'">'.$value[0].'</option>'; 
                endforeach;
                ?>
            </select>
              </div>
            </div>

            <div class="col-md-3">
             <div class="input-group">
              <span class="input-group-addon">Espaço<h11>*</h11></span>
              <select  id="espacos" name="espacos" class="form-control">
                <option value="<?php echo($row_usuario['id_espaco'])?>"><?php echo($row_usuario['descricao_espaco'])?></option>   
                <?php 
                $buscaEspacos  = mysqli_query($link, "SELECT descricao_espaco, id_espacos FROM tb_espacos "); 
                $arrayEspacos = $buscaEspacos->fetch_all();
                foreach($arrayEspacos as $key => $value):
                  echo '<option value="'.$value[1].'">'.$value[0].'</option>'; 
                endforeach;
                ?>
              </select>
            </select>
            </div>
          </div>

          <div class="col-md-3">
             <div class="input-group">
              <span class="input-group-addon">Status<h11>*</h11></span>
              <select  id="status" name="status" class="form-control">
                <option value="<?php echo($row_usuario['id_status_reserva'])?>"><?php echo($row_usuario['status_reserva'])?></option>   
                <?php 
                $buscaStatus  = mysqli_query($link, "SELECT Status_reserva, id_status_reserva FROM tb_status_reserva "); 
                $arrayStatus = $buscaStatus->fetch_all();
                foreach($arrayStatus as $key => $value):
                  echo '<option value="'.$value[1].'">'.$value[0].'</option>'; 
                endforeach;
                ?>
            </select>
            </div>
          </div>



        </div>
        <div class="form-group">     
          
               <label class="col-md-2 control-label" for="id_morador">Cod. Usuário:<h11></h11></label>  
                <div class="col-md-1">
                  <input id="id_morador" name="id_morador" placeholder="Apenas números" value="<?php echo($row_usuario['id_morador'])?>" class="form-control input-md" type="text" maxlength="11" pattern="[0-9]+$">
                </div>
                <label class="col-md-2 control-label" for="evento">Evento<h11></h11></label>  
                <div class="col-md-3">
                  <input id="evento" name="evento" placeholder="Evento" value="<?php echo($row_usuario['evento'])?>" class="form-control input-md"  type="text" maxlength="11" >
                </div>
                <label class="col-md-2 control-label" for="data_reserva">Data Evento<h11>*</h11></label>  
                <div class="col-md-2">
                  <input id="data_reserva" name="data_reserva" placeholder="DD/MM/AAAA" value="<?php echo($row_usuario['dt_reserva'])?>" class="form-control input-md"  type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                </div>

            </div>
        <div class="form-group">

          <label class="col-md-1 control-label" for="nome">Nome <h11></h11></label>  
              <div class="col-md-6">
                <input id="nome" name="nome" placeholder="" class="form-control input-md" value="<?php echo($row_usuario['nome'])?>"  type="text" disabled>
              </div>

          <div class="col-md-3">
          </div>

          <div class="col-md-1">
            <button type="submit" class="btn btn-primary">Voltar</button>
          </div>
          <div class="col-md-1">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>

<?php require_once "../rodape.php";?>