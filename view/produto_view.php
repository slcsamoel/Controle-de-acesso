<?php require_once "../cabecalho_aux.php";
require_once('../controller/conexao_banco.php');
require_once('../model/Produto.php');

$produto = new Produto();
$idProduto = $_GET['id'];

$busca  = "SELECT id_produto, descricao, quantidade, observacao, dt_cadastro, prod.id_tipo_produto, tpprod.tipo_produto, preco_produto FROM tb_produto AS prod
                                INNER JOIN tb_tipo_produto AS tpprod ON (tpprod.id_tipo_produto = prod.id_tipo_produto) 
                                WHERE id_produto = '$idProduto' ";
$resultado_busca = mysqli_query($link, $busca);
$row_usuario = mysqli_fetch_assoc($resultado_busca); ?>

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">

<div class="container">
    <div class="pager-header">
        <h1>Produto</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <form class="form-horizontal" action="../controller/altera_produto.php" method="POST">

                <div class="panel panel-primary">


                    <div class="form-group" style="margin-top: 3%;">
                        <label class="col-md-2 control-label" for="id_produto">Codigo do Produto<h11>*</h11></label>
                        <div class="col-md-1">
                            <input id="id_produto" name="id_produto" class="form-control input-md" type="text" readonly value="<?php echo $row_usuario['id_produto'] ?>">
                        </div>


                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="descricao">Descricao<h11>*</h11></label>
                        <div class="col-md-4">
                            <input id="descricao" name="descricao" placeholder="" class="form-control input-md" value="<?php echo $row_usuario['descricao'] ?>" type="text">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="id_tipo_produto">Tipo de Produtos<h11>*</h11></label>
                            <div class="col-md-2">
                                <select required id="id_tipo_produto" name="id_tipo_produto" class="form-control">
                                    <option value="<?php echo $row_usuario['id_tipo_produto'] ?>"> <?php echo $row_usuario['tipo_produto'] ?></option>
                                    <?php
                                    $buscaTorre  = mysqli_query($link, "SELECT tipo_produto, id_tipo_produto FROM tb_tipo_produto ");
                                    $arrayTorres = $buscaTorre->fetch_all();
                                    foreach ($arrayTorres as $key => $value) :
                                        echo '<option value="' . $value[1] . '">' . $value[0] . '</option>';
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <label class="col-md-2 control-label" for="preco">Preço</label>
                            <div class="col-md-1">
                                <input id="preco" name="preco" class="form-control input-md" value="<?php echo $row_usuario['preco_produto'] ?>" type="text" maxlength="5">
                            </div>
                            <label class="col-md-2 control-label" for="preco">Estoque</label>
                            <div class="col-md-1">
                            <input id="quantidade" name="quantidade" class="form-control input-md " readonly type="text" value="<?php echo $row_usuario['quantidade'] ?>" ">
                        </div>             

                      </div>
                        <div class=" form-group">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="observacao">Observações<h11>*</h11></label>
                                    <div class="col-md-4">
                                        <textarea id="observacao" name="observacao" rows="5" cols="10" class="form-control input-md"><?php echo $row_usuario['observacao'] ?></textarea>
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