<?php require_once "../cabecalho_aux.php"; 
require_once('../controller/conexao_banco.php');
require_once('../model/entradaProduto.php');?>

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">
<?php
$entradaProduto = new EntradaProduto();
$id_entrada = $_GET['id'];
$tipo_entrada_produto = $_GET['tpe'];
 
 $busca  = "SELECT id_entrada_produto, entrada.id_tp_entrada_produto, dt_entrada, tpen.tipo_entrada_produto, nf_fiscal FROM tb_entrada_produto AS entrada
                                INNER JOIN tb_tp_entrada_produto AS tpen ON (tpen.id_tp_entrada_produto = entrada.id_tp_entrada_produto) 
                                WHERE entrada.id_entrada_produto = '$id_entrada' 
                                AND entrada.id_tp_entrada_produto = '$tipo_entrada_produto'";
                $resultado_busca = mysqli_query($link, $busca);
                $row_usuario = mysqli_fetch_assoc($resultado_busca);?>

<div class="container">
    <div class="pager-header">
        <h1>Entrada de Produto</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <form class="form-horizontal" action="../controller/adicionar_produto_entrada.php" method="post">

                <div class="panel panel-primary">
                    <div class="panel-body">
                    </div>                    
                    <input type="text" style="display:none;" name="id_tp_entrada" value="<?php echo $row_usuario['id_tp_entrada_produto']?>">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="id_entrada_produto">N.Entrada</label>
                        <div class="col-md-1">
                            <input readonly id="id_entrada_produto" name="id_entrada_produto" class="form-control input-md" value="<?php echo $row_usuario['id_entrada_produto']?>" type="text" maxlength="5" pattern="[0-9]+$">
                        </div>
                        <label class="col-md-2 control-label" for="id_entrada_produto">NF Fiscal</label>
                        <div class="col-md-1">
                            <input readonly id="nf_fiscal" name="nf_fiscal" class="form-control input-md" value="<?php echo $row_usuario['nf_fiscal']?>" type="text" maxlength="5" pattern="[0-9]+$">
                        </div>
                        <label class="col-md-2 control-label" for="id_tp_entrada_produto">Tipo de Entrada <h11>*</h11></label>
                        <div class="col-md-3">
                            <select readonly id="id_tp_entrada_produto" name="id_tp_entrada_produto" class="form-control">
                                <option value="<?php echo $row_usuario['tipo_entrada_produto']?>"> <?php echo $row_usuario['tipo_entrada_produto']?></option>
                                
                            </select>
                        </div>

                    </div>

                    

                <div class="panel-body">
                    </div>
                    <div class="form-group">

                        <label class="col-md-2 control-label" for="id_produto">Cod.Produto<h11>*</h11></label>
                        <div class="col-md-1">
                            <input id="id_produto" name="id_produto" class="form-control input-md" required="" type="text" maxlength="5" pattern="[0-9]+$">
                        </div>

                        <label class="col-md-2 control-label" for="quantidade">Quantidade<h11>*</h11></label>
                        <div class="col-md-1">
                            <input id="quantidade" name="quantidade" class="form-control input-md" required="" type="Number" maxlength="5" min="0" pattern="[0-9]+$">
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary" value="adicionar">Adicionar</button>
                        </div>
                    </div>
                    <div class="panel-body">
                    </div>
                    <div class="form-group col-sm-10 ">
                    <div class="col-md-2">
                    </div>
                    <div style="margin-left: 18%;">
                    <?php

                    error_reporting(0);
                    ini_set(“display_errors”, 0 );
                    $id_entrada = $row_usuario['id_entrada_produto'];
                    $busca  = "SELECT tbProduto.id_produto, descricao, tipo_produto, itensEntrada.quantidade, preco_produto FROM tb_produto AS tbProduto
                                INNER JOIN tb_tipo_produto AS tpProduto ON (tpProduto.id_tipo_produto = tbProduto.id_tipo_produto) 
                                INNER JOIN tb_itens_entrada AS itensEntrada ON (itensEntrada.id_produto = tbProduto.id_produto)
                                WHERE  '".$id_entrada."' = itensEntrada.id_entrada_produto
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
                        echo "<th scope='col'>Valor</th>\n";
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
                                echo "<th scope='col'>".$row_busca['preco_produto']."</th>\n";             
                                echo "<th scope='col'><a href='../controller/deletar_produto_entrada.php?idProd=".$row_busca[id_produto]."&entrada=".$id_entrada."&nf=".$nf_fiscal."&tpe=".$row_usuario['id_tp_entrada_produto']."&qtd=".$row_busca['quantidade']."'><button type='button' class='btn btn-danger' >Deletar</button></a></th>\n";
                        echo "</tr>\n";  
                        echo "</tbody>"; 
                }echo "</table>\n"; 
                    ?>
</div>
                    </div> 
                    <div class="form-group">
                    
                    </div> 
                    <div class="form-group">
                    <?php
                        $id_entrada = $row_usuario['id_entrada_produto'];
                        $query_total  = "SELECT total_entrada FROM `tb_total_entrada` WHERE id_entrada_produto = '".$id_entrada."'";                
                        $resultado_total  = mysqli_query($link, $query_total);
                        $total = mysqli_fetch_assoc($resultado_total);
                    ?>  

                    <label class="col-md-2 control-label" for="valor_total">Valor Total Entrada</label>
                        <div class="col-md-1">
                            <input id="valor_total" readonly name="valor_total" class="form-control input-md" value="<?php echo $total['total_entrada']?>" type="text" maxlength="5" pattern="[0-9]+$">
                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <div class="col-md-8">
                         
                        </div> 
                            <div class="col-md-2">
                            <a href="../controller/cancelar_entrada.php?id_entrada_produto=<?php echo $id_entrada?>&idProd=<?php echo $row_busca[id_produto]?>&qtd=<?php echo $row_busca['quantidade']?>" ><button type="button" class="btn btn-primary" value="Salvar">Cancelar e Voltar</button></a>
                            </div>
                            <div class="col-md-1">
                                <a href="../controller/salvar_entrada.php?id_entrada_produto=<?php echo $id_entrada?>"><button type="button" class="btn btn-primary" value="Salvar">Registrar Entrada</button></a>
                    </div>


                </div>
            </form>
        </div>

    </div>
    <?php require_once "../rodape.php"; ?>