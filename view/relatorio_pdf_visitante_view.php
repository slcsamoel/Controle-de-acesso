<?php
require_once "../cabecalho_aux.php";
require_once('../controller/conexao_banco.php');


$id_visitante = $_GET['id_visitante'];

?>
<title>Relatorio de movimentação de Morador</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">
<div class="container">
    <div class="pager-header">
        <h1>Data da Movimentação</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <form class="form-horizontal" action="../controller/relatorio_pdf_visitante.php"  method="post">

                <div class="panel panel-primary">

                    <div class="panel-body">
                        <div class="form-group">

                            <div class="col-md-11 control-label">
                                <div class="col-md-2">
                                    <input id="id_visitante" name="id_visitante" style="display:none;" class="form-control input-md" type="text" maxlength="11" value="<?php echo $id_visitante?>" readonly>
                                </div>
                            </div>

                            <div class="col-md-11 control-label">

                                <label class="col-md-2 control-label" for="dt_inicio">Data Inicio<h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="dt_inicial" name="dt_inicial" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" onBlur="showhide()">
                                </div>
                                <label class="col-md-2 control-label" for="dt_final">Data Final<h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="dt_final" name="dt_final" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" onBlur="showhide()">
                                </div>

                            </div>


                        </div>
                        <div class="col-md-8">
                            <div class="col-md-6">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a type="button" class="btn btn-primary " href="../principal.php">
                                Voltar
                            </a>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary" value="gerar_relatorio">Gerar Relatorio
                            </button>
                        </div>
                        <div class="col-md-12">
                        </div>
                     </div>

                </div>

            </form>
        </div>

    </div>

    <?php require_once "../rodape.php"; ?>