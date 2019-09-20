<?php require_once "../cabecalho_aux.php"; ?>
<title>Movimentação de Morador</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">
<div class="container">
    <div class="pager-header">
        <h1>Movimentação de Morador</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <form class="form-horizontal">

                <div class="panel panel-primary">

                    <div class="panel-body">
                        <div class="form-group">

                            <div class="col-md-11 control-label">

                                <label class="col-md-2 control-label" for="id">ID<h11></h11></label>
                                <div class="col-md-1">
                                    <input id="cpf" name="id" placeholder="id" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                                </div>


                                <label class="col-md-2 control-label" for="nome">Nome<h11></h11></label>
                                <div class="col-md-6">
                                    <input id="id" name="nome" placeholder="Digite o nome do morador" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                                </div>

                            </div>

                            <div class="col-md-11 control-label">

                                <label class="col-md-2 control-label" for="dt_inicio">Data Inicio<h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="dtnasc" name="dt_inicio" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                                </div>
                                <label class="col-md-2 control-label" for="dt_final">Data Final<h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="dtnasc" name="dt_final" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                                </div>

                            </div>


                        </div>
                        <!-- Div criado apenas para ajuste de visualização -->
                        <div class="col-md-8">
                            <div class="col-md-6">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary">Gerar Relatorio
                            </button>
                        </div>

                    </div>


                </div>

            </form>
        </div>

    </div>

    <?php require_once "../rodape.php"; ?>