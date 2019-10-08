<?php
require_once "../cabecalho_aux.php";
require_once('../model/Funcionario.php');
require_once('../controller/conexao_banco.php');?>

<title>Funcionario</title>
<?php
$funcionario = new Funcionario();
$id = $_GET['id'];
$resultado  = "SELECT * FROM tb_funcionario as func 
INNER JOIN tb_img_funcionario as img ON (func.id_funcionario = img.id_funcionario) 
WHERE func.id_funcionario = '$id'  ";
$resultado_usuario = mysqli_query($link, $resultado);
$funcionario = mysqli_fetch_assoc($resultado_usuario);
$_SESSION["id_funcionario"] = $funcionario['id_funcionario'];

$url_usuario = "cadastra_usuario_view.php?id=$funcionario[id_funcionario]";

if($funcionario['id_funcao']!=1){
  $display ='none';
}else{
  $display ='';
}

?>
<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">

<div class="container" id="div_conteudo" >
  <div class="pager-header">
    <h1>Funcionário</h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal" enctype="multipart/form-data" action="../controller/alterar_funcionario.php" method="post">

        <div class="panel panel-primary">

          <div class="panel-body">
         
           
            <div class="form-group">
              <label class="col-md-2 control-label" for="nome">Nome <h11>*</h11></label>
              <div class="col-md-8">
                <input id="nome" name="nome"  class="form-control input-md"  type="text" value="<?php echo $funcionario['nome']?>">
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="cpf">CPF <h11>*</h11></label>
              <div class="col-md-2">
                <input id="cpf" name="cpf" class="form-control input-md" required="" type="text" value="<?php echo $funcionario['cpf']?>" maxlength="11" pattern="[0-9]+$">
              </div>

              <label class="col-md-1 control-label" for="dt_nascimento">Nascimento<h11>*</h11></label>
              <div class="col-md-2">
                <input id="dt_nascimento" name="dt_nascimento"  class="form-control input-md" value="<?php echo $funcionario['dt_nascimento']?>" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
              </div>
              <label class="col-md-1 control-label" for="radios" value="<?php echo $funcionario['sexo']?>">Sexo <h11>*</h11></label>
              <div class="col-md-4">
                <label required="" class="radio-inline" for="radios-0">
                  <input name="sexo" id="sexo" <?php if($funcionario['sexo'] == 'feminino'){ echo "checked"; } ?> value="feminino" type="radio">
                  Feminino
                </label>
                <label class="radio-inline" for="radios-1">
                  <input name="sexo" id="sexo" <?php if($funcionario['sexo'] == 'masculino'){ echo "checked"; } ?> value="masculino"  type="radio">
                  Masculino
                </label>
              </div>
            </div>

            <!-- Prepended text-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="rg">RG <h11>*</h11></label>
              <div class="col-md-2">
                <input id="rg" name="rg"  class="form-control input-md" required="" type="text" value="<?php echo $funcionario['rg']?>" maxlength="11" pattern="[0-9]+$">
              </div>

              <label class="col-md-1 control-label" for="telefone">Telefone</label>
              <div class="col-md-2">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                  <input id="telefone" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX" type="text"  value="<?php echo $funcionario['telefone']?>"maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$" OnKeyPress="formatar('## #####-####', this)">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label" for="dt_cadastro">Data Cadastro<h11></h11></label>
            <div class="col-md-2">
              <input id="dt_cadastro" name="dt_cadastro"  class="form-control input-md"  type="date-time" value="<?php echo $funcionario['dt_cadastro']?>" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
            </div>

          </div>

          <div class="form-group">
            <label class="col-md-2 control-label" for="turno">Turno<h11>*</h11></label>
            <div class="col-md-2">
              <select required id="turno" name="turno" class="form-control">
                <option ><?php echo $funcionario['turno']?></option>
                <option value="diurno">diurno</option>
                <option value="noturno">noturno</option>
              </select>
            </div>

            <label class="col-md-2 control-label" for="id_funcao">Função<h11>*</h11></label>
            <div class="col-md-2">
              <select required id="id_funcao" name="id_funcao" class="form-control">
                <?php 
                $buscaFuncao = mysqli_query($link, "SELECT id_funcao , funcao FROM tb_funcao WHERE id_funcao = $funcionario[id_funcao]"); 
                $arrayFuncao = $buscaFuncao->fetch_all();
                foreach($arrayFuncao as $key => $value):
                  echo '<option value="'.$value[0].'">'.$value[1].'</option>'; 
                endforeach;
                ?>
                 <option value="1">Porteiro(a)</option>
                <option value="2">Zelador(a)</option>
                <option value="3">Faxineiro(a)</option>
              </select>
            </div>
            <label class="col-md-2 control-label" for="id_status">Status<h11>*</h11></label>
            <div class="col-md-2">
              <select required id="id_status" name="id_status" class="form-control">
                <?php 
                $buscaStatus = mysqli_query($link, "SELECT id_status , status FROM tb_status WHERE id_status = $funcionario[id_status]"); 
                $arrayStatus = $buscaStatus->fetch_all();
                foreach($arrayStatus as $key => $value):
                  echo '<option value="'.$value[0].'">'.$value[1].'</option>'; 
                endforeach;
                ?>
                <option value="1">Ativo</option>
                <option value="2">Inativo</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-5">
                  
            </div>
            <div class="col-md-5">
            </div>
            <div class="col-sm-2">
              <img name=" imagem" src="<?php echo '../fotos_funcionarios/'.$funcionario['imagem']?>" class="img-responsive img-thumbnail">
            </div>

          </div> 
          <div class="form-group">
            <div class="col-md-2">
                  
            </div>
            <div class="col-md-5">
            </div>
          
            <div class="col-md-2">
             <a class="btn btn-primary " <?= 'style="display:'.$display.'"'?> href="<?=$url_usuario?>"> 
              Usuario
            </a> 
            </div>
            <div class="col-md-1">
            <a type="button" class="btn btn-primary " href="../principal.php"> 
              Voltar
            </a>
            </div>

            <div class="col-md-1">
              <button id="btn_salvar" type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
            </div>
            
          </div>


        </div>

        <!-- Text input-->
    </div>

  </div>
  <?php require_once "../rodape.php"; ?>