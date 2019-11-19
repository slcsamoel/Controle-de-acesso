<?php
require_once "../cabecalho_aux.php";
require_once('../controller/conexao_banco.php');

$id_funcionario= $_GET['id'];
$_SESSION['id_funcionario'] = $id_funcionario;  


$sql_user = "SELECT * FROM tb_usuario WHERE  id_funcionario = '$id_funcionario'";
$result_user=mysqli_query($link,$sql_user); 
$cadastrado = mysqli_num_rows($result_user);

?>
<title>Cadastra_usuario</title>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="js/jquery-3.4.1.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">

<div class="container">
  <div class="pager-header">
    <h1>Cadastrar Usuario </h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal" action="../controller/cadastra_usuario.php" method="post" >

        <div class="panel panel-primary">     
          <div class="panel-body">

           <div class="form-group">
            <label class="col-md-2 control-label" for="nivel_acesso">Nivel Acesso<h11></h11></label>
            <div class="col-md-2">
              <select required id="nivel_acesso" name="nivel_acesso" class="form-control"> 
              <option value=""></option>
                <option value="1"><h3>1-Portaria</h3></option>
                <option value="2"><h3>2-Sindico</h3></option>
              </select>
            </div>
            <div class="col-md-1">
                  <input id="id_funcionario" name="id_funcionario"  class="form-control input-md"  type="text" value="<?php echo $id_funcionario?>" maxlength="9" readonly >
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
                  <input id="senha" name="senha" placeholder="*********" class="form-control input-md" required="" type="password">
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
              <button type="submit" class="btn btn-primary" value="Voltar" onClick="JavaScript: window.history.back();">Voltar
              </button>
               </div> 

            <div class="col-md-2">
              <button type="submit" class="btn btn-primary" value="Cadastrar">Cadastrar
              </button>
            </div>

          </div>


        </div>

       
      </div>

    </div>

     <?php require_once "../rodape.php";?>
