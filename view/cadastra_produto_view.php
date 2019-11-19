<?php require_once "../cabecalho_aux.php";
require_once('../controller/conexao_banco.php'); ?>

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">

<div class="container">
    <div class="pager-header">
        <h1>Cadastro de Produtos</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <form class="form-horizontal" action="../controller/cadastra_produto.php" method="post">

                <div class="panel panel-primary">


                    <div class="panel-body">
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="descricao">Descricao<h11>*</h11></label>
                        <div class="col-md-4">
                            <input id="descricao" name="descricao" placeholder="" class="form-control input-md" required="" type="text">
                        </div>
                      
                        <div class="col-md-1">
                            <input id="quantidade" name="quantidade" class="form-control input-md" style="display:none" value='0' type="Number" maxlength="5" pattern="[0-9]+$">
                        </div>
                    </div>
                    <div class="form-group">  
                      <div class="form-group">
                            <label class="col-md-2 control-label" for="id_tipo_produto">Tipo de Produtos<h11>*</h11></label>
                            <div class="col-md-2">
                                <select required id="id_tipo_produto" name="id_tipo_produto" class="form-control">
                                    <option value=""> </option>
                                    <?php 
                                        $buscaTorre  = mysqli_query($link, "SELECT tipo_produto, id_tipo_produto FROM tb_tipo_produto "); 
                                        $arrayTorres = $buscaTorre->fetch_all();
                                        foreach($arrayTorres as $key => $value):
                                        echo '<option value="'.$value[1].'">'.$value[0].'</option>'; 
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                            </div>
                        <label class="col-md-2 control-label" for="preco">Preço<h11>*</h11></label>
                        <div class="col-md-1">
                            <input id="preco" name="preco" class="form-control input-md" required="" type="text"  ">
                        </div>
                      </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="observacao">Observações<h11>*</h11></label>
                                <div class="col-md-4">
                                    <textarea id="observacao" name="observacao" rows="5" cols="10" class="form-control input-md"></textarea>
                                </div>
                            </div>

                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-7"></div>

                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary" value="Salvar">Voltar</button>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary" value="Salvar">Salvar</button>
                                </div>
                            </div>

                        </div>

                    </div>
            </form>
        </div>

    </div>
    <?php require_once "../rodape.php"; ?>