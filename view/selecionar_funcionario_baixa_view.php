<?php

require_once "../cabecalho_aux.php"; 
require_once('../model/BaixaProduto.php');?>
<title>buscar_funcionario</title>

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">

<div class="container">
    <div class="pager-header">
        <h1>Selecionar Funcionário </h1>
    </div>
    <form class="form-horizontal" action="#" method="post">

        <div class="panel panel-primary">

            <div class="panel-body">
                <div class="form-group">

                    <label class="col-md-2 control-label" for="cpf">CPF<h11></h11></label>
                    <div class="col-md-2">
                        <input id="cpf" name="cpf" placeholder="Insira o CPF" class="form-control input-md" type="text" >
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" value="buscar">Buscar </button>
                    </div>

                </div>

                <div class="panel-body">
                </div>
                <div class="form-group col-sm-10">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-10">
                    <?php

                error_reporting(0);
                ini_set(“display_errors”, 0 );

                $baixa = new BaixaProduto();
                $baixa->setCpf_funcionario($cpf_funcionario = $_POST['cpf']);
                $baixa->buscarCpf($link, $cpf_funcionario);
                ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10">
                        
                    </div>
                    <div class="col-md-2">
              <button type="submit" class="btn btn-primary" value="Voltar" onClick="JavaScript: window.history.back();">Voltar
              </button>
               </div> 
               

                </div>


            </div>
        </div>

    </form>
</div>
</div>
<?php require_once "../rodape.php"; ?>