<?php require_once "../cabecalho_aux.php"; 
require_once('../controller/conexao_banco.php');
require_once('../model/BaixaProduto.php');?>
    
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">
<?php
$id_baixa = $_GET['idBaixa'];

    $busca  = "SELECT id_baixa_produto, nome, cpf, dt_baixa FROM tb_baixa_produto AS baixa
                INNER JOIN tb_funcionario AS func ON (baixa.id_funcionario = func.id_funcionario) 
                WHERE  '".$id_baixa."' = id_baixa_produto";
    $resultado = mysqli_query($link, $busca);
    $resultado_baixa = mysqli_fetch_assoc($resultado); 


?>
<div class="container">
    <div class="pager-header">
        <h1>Baixa de Produtos</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <form class="form-horizontal" action="../controller/adicionar_produto_baixa.php" method="post">

                <div class="panel panel-primary">
                    <div class="panel-body">
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="id_baixa_produto">N.Baixa</label>
                        <div class="col-md-1">
                            <input id="id_baixa_produto" name="id_baixa_produto" class="form-control input-md" readonly value="<?php echo ($resultado_baixa['id_baixa_produto'])?>" type="text" maxlength="5" pattern="[0-9]+$">
                        </div>

                        <label class="col-md-2 control-label" for="nome">Nome </label>
                        <div class="col-md-4">
                            <input id="nome" name="nome" placeholder="" class="form-control input-md" readonly value="<?php echo ($resultado_baixa['nome'])?>" type="text">
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="cpf">CPF</label>
                        <div class="col-md-2">
                            <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" readonly value="<?php echo ($resultado_baixa['cpf'])?>" type="text" maxlength="11" pattern="[0-9]+$">
                        </div>

                        <label class="col-md-2 control-label" for="dt_entrada">Data da Baixa</label>
                        <div class="col-md-2">
                            <input id="dt_entrada" name="dt_entrada" placeholder="DD/MM/AAAA" class="form-control input-md" readonly value="<?php echo(date('d/m/Y', strtotime($resultado_baixa['dt_baixa'])))?>" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                        </div>
                    </div>

                    <div class="panel-body">
                    </div>
                    <div class="panel-body">
                    </div>
                    <div class="form-group">

                        <label class="col-md-2 control-label" for="id_produto">Cod.Produto</label>
                        <div class="col-md-1">
                            <input id="id_produto" name="id_produto" class="form-control input-md" type="text" maxlength="5" pattern="[0-9]+$">
                        </div>

                        <label class="col-md-2 control-label" for="quantidade">Quantidade</label>
                        <div class="col-md-1">
                            <input id="quantidade" name="quantidade" class="form-control input-md" type="Number" min="0" maxlength="5" pattern="[0-9]+$">
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary" value="adicionar">Adicionar</button>
                        </div>
                    </div>
                    <div class="form-group col-sm-10 ">
                        <div class="col-md-2">
                        </div>
                        <div style="margin-left: 18%;">
                    <?php

                    error_reporting(0);
                    ini_set(“display_errors”, 0 );
                    $id_baixa = $resultado_baixa['id_baixa_produto'];
                    $busca  = "SELECT tbProduto.id_produto, descricao, tipo_produto, itensbaixa.quantidade FROM tb_produto AS tbProduto
                                INNER JOIN tb_tipo_produto AS tpProduto ON (tpProduto.id_tipo_produto = tbProduto.id_tipo_produto) 
                                INNER JOIN tb_itens_baixa AS itensbaixa ON (itensbaixa.id_produto = tbProduto.id_produto)
                                WHERE  '".$id_baixa."' = itensbaixa.id_baixa_produto
                                ORDER BY tbProduto.id_produto ";

                $resultado_busca = mysqli_query($link, $busca);
    
    
                    echo"<link href='../bootstrap/css/menu.css'  rel='stylesheet'/>";
                echo "<table class='table table-bordered all'  method='GET'>\n";
                        echo '<thead class="thead-darks">';
                        echo "<tr>\n";
                        echo "<th scope='col'>Cod.</th>\n";
                        echo "<th scope='col'>Descrição</th>\n";   
                        echo "<th scope='col'>Tipo Produto</th>\n";
                        echo "<th scope='col'>Quantidade</th>\n"; 
                        echo "<th scope='col'>Ação</th>\n";
                        echo "</tr>\n";  
                        echo "</thead>\n";        
                while($row_busca = mysqli_fetch_assoc($resultado_busca)){ 
                        echo "<tbody>";
                        echo "<tr>\n";
                                echo "<th scope='col'>".$row_busca[id_produto]."</th>\n";
                                echo "<th scope='col'>".$row_busca['descricao']."</th>\n";  
                                echo "<th scope='col'>".$row_busca['tipo_produto']."</th>\n"; 
                                echo "<th scope='col'>".$row_busca['quantidade']."</th>\n";            
                                echo "<th scope='col'><a href='../controller/deleta_produto_baixa.php?id_produto=".$row_busca[id_produto]."&id_baixa_produto=".$id_baixa."&quantidade=".$row_busca['quantidade']."'><button type='button' class='btn btn-danger' >Deletar</button></a></th>\n";
                        echo "</tr>\n";  
                        echo "</tbody>"; 
                }echo "</table>\n"; 
                    ?>
</div>
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">

                       

                        

                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <div class="col-md-8">

                        </div>
                        <div class="col-md-2">
                        <a href="../controller/cancelar_baixa.php?id_baixa_produto=<?php echo $id_baixa?>" ><button type="button" class="btn btn-primary" value="Salvar">Cancelar e Voltar</button></a>
                        </div>
                        <div class="col-md-2">
                            <a href="../controller/salvar_baixa.php?id_baixa_produto=<?php echo $id_baixa?>"><button type="button" class="btn btn-primary" value="Salvar">Registrar Baixa</button></a>
                        </div>
                       


                    </div>
            </form>
        </div>

    </div>
    <?php require_once "../rodape.php"; ?>