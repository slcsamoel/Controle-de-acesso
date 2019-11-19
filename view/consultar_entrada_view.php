<?php
require_once "../cabecalho_aux.php";
require_once('../model/EntradaProduto.php');
require_once('../controller/conexao_banco.php'); ?>
<title>buscar_produto</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">


<div class="container">
    <div class="pager-header">
        <h1>Consulta Entrada</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <form class="form-horizontal" action="#" method="post">

                <div class="panel panel-primary">


                    <div class="panel-body">
                        <div class="form-group">

                            <div class="form-group">

                                <label class="col-md-2 control-label" for="dt_inicial">Data Inicial<h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="dt_inicial" name="dt_inical" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                                </div>

                                <!-- Prepended checkbox -->
                                <label class="col-md-2 control-label" for="dt_final">Data Fim<h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="dt_final" name="dt_final" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                                </div>

                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">



                        </div>
                        <?php

error_reporting(0);
ini_set(“display_errors”, 0 );

$entrada = new EntradaProduto();
$dt_inicial = $_POST['dt_inical'];
$dt_final = $_POST['dt_final'];
$entrada->buscaEntrada($link, $dt_inicial, $dt_final);
?>
                    </div>
                    

                </div>


            </form>
        </div>

    </div>


</div>
</div>

<?php require_once "../rodape.php"; ?>