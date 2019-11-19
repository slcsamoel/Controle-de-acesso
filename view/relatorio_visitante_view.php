<?php
require_once "../cabecalho_aux.php";
require_once "../model/Visitante.php";
require_once('../controller/conexao_banco.php'); ?>
<title>Movimentação de Morador</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">
<div class="container">
    <div class="pager-header">
        <h1>Movimentação de Visitante</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <form class="form-horizontal" action="#" method="post">

                <div class="panel panel-primary">

                    <div class="panel-body">
                        <div class="form-group">

                            <div class="col-md-11 control-label">

                                <label class="col-md-2 control-label" for="cpf">CPF <h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                                </div>

                            </div>

                            <div class="col-md-11 control-label">

                                <label class="col-md-2 control-label" for="dt_inicio">Data Inicio<h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="dt_inicio" name="dt_inicio" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" onBlur="showhide()">
                                </div>
                                <label class="col-md-2 control-label" for="dt_final">Data Final<h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="dt_final" name="dt_final" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" onBlur="showhide()">
                                </div>

                            </div>


                        </div>
                        <!-- Div criado apenas para ajuste de visualização -->
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
                            <button type="submit" class="btn btn-primary">Gerar Relatorio
                            </button>
                        </div>

                        <?php

                        error_reporting(0);
                        ini_set(“display_errors”, 0);

                        $visitante = new Visitante();
                        if ($_POST['cpf'] != '' || $_POST['cpf'] != null) {
                            $cpf = $_POST['cpf'];
                            $dt_inicial = $_POST['dt_inicial'];
                            $dt_final = $_POST['dt_final'];
                            $visitante->relatorio_entrada($link, $cpf, $dt_inicial, $dt_final);
                        }
                        ?>
                    </div>
                </div>

            </form>
        </div>

    </div>

    <?php require_once "../rodape.php"; ?>