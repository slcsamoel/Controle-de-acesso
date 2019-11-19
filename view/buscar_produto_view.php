<?php
require_once "../cabecalho_aux.php";
require_once('../controller/conexao_banco.php');
require_once('../model/Produto.php');?>
<title>buscar_produto</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">


<div class="container">
  <div class="pager-header">
    <h1>Buscar Produtos</h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal" action="#" method="POST">

        <div class="panel panel-primary">


          <div class="panel-body">
            <div class="form-group">

              <!--<div class="form-group">
                <label class="col-md-2 control-label" for="id_produto">Código do produto<h11></h11></label>
                <div class="col-md-2">
                  <input id="id_produto" name="id_produto" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                </div>-->

                <!-- Prepended checkbox -->
                <label class="col-md-2 control-label" for="descricao">Descrição<h11></h11></label>  
                <div class="col-md-6">
                  <input id="descricao" name="descricao"  class="form-control input-md" required="" type="text" maxlength="11" >
                </div>

             <div class="col-md-2">
            <button type="sumit" class="btn btn-primary">Buscar
            </button>
            </div>
            </div>
            </div>
            <div class="col-md-8">

             

            </div>
          </div>
          <?php
          error_reporting(0);
          ini_set(“display_errors”, 0 );

          $produto = new Produto();
          $produto->setDescricao($descricao = $_POST['descricao']);
          $produto->buscaProduto($link, $descricao);
        ?>
        </div>
        

      </form>
    </div>

  </div>


</div>
</div>

<?php require_once "../rodape.php";?>