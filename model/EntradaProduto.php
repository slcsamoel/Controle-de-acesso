<?php
require_once('../controller/conexao_banco.php');
require_once('../fpdf/fpdf.php');
class EntradaProduto
{
    private $id_entrada;
    private $nf_fiscal;
    private $tipo_entrada;


    public function getId_entrada()
    {
        return $this->id_entrada;
    }


    public function setId_entrada($id_entrada)
    {
        $this->id_entrada = $id_entrada;

        return $this;
    }


    public function getNf_fiscal()
    {
        return $this->nf_fiscal;
    }


    public function setNf_fiscal($nf_fiscal)
    {
        $this->nf_fiscal = $nf_fiscal;

        return $this;
    }


    public function getTipo_entrada()
    {
        return $this->tipo_entrada;
    }


    public function setTipo_entrada($tipo_entrada)
    {
        $this->tipo_entrada = $tipo_entrada;

        return $this;
    }


    public function cadastrarEntrada($link, $nf_fiscal, $tipo_entrada, $id_usuario)
    {

        mysqli_query($link, "INSERT INTO tb_entrada_produto (id_entrada_produto, id_usuario ,id_tp_entrada_produto , nf_fiscal) 
                             VALUES(DEFAULT, '$id_usuario' , $this->tipo_entrada , '$this->nf_fiscal')");
        $id_inserido = mysqli_insert_id($link);

        $query = "SELECT id_entrada_produto FROM tb_entrada_produto WHERE id_entrada_produto = '" . $id_inserido . "' AND id_tp_entrada_produto = '" . $tipo_entrada . "'";
        $resultado = mysqli_query($link, $query);
        $resultado_id_entrada = mysqli_fetch_assoc($resultado);

        $id_entrada = $resultado_id_entrada['id_entrada_produto'];

        $valor_total = 0;
        mysqli_query($link, "INSERT INTO tb_total_entrada (id_total_entrada, id_entrada_produto ,total_entrada) 
                        VALUES(DEFAULT, '$id_entrada' , $valor_total)");

        echo "<script>window.location = '../view/entrada_produto_view.php?id=" . $id_entrada . "&tpe=" . $tipo_entrada . "';</script>";
    }

    public function adicionaProdutoEntrada($link, $id_entrada, $codigo_produto, $quantidade, $tp_entrada)
    {
        $numeroRegistro = mysqli_query($link, "SELECT id_produto FROM tb_itens_entrada WHERE id_entrada_produto = '" . $id_entrada . "' AND id_produto = '" . $codigo_produto . "' ");
        $numDt = mysqli_num_rows($numeroRegistro);

        if ($numDt > 0) {
            echo  "<script>alert('Já existe um produto com esse codigo!');</script>";
            echo "<script>window.location = '../view/entrada_produto_view.php?id=" . $id_entrada . "&tpe=" . $tp_entrada . "';</script>";
        } else {

            $query_preco = "SELECT preco_produto FROM tb_produto WHERE id_produto = '" . $codigo_produto . "'";
            $resultado_preco = mysqli_query($link, $query_preco);
            $valor_produto = mysqli_fetch_assoc($resultado_preco);

            $salva_valor_produto = $quantidade * $valor_produto['preco_produto'];

            $query_preco2 = "SELECT total_entrada FROM tb_total_entrada WHERE id_entrada_produto = '" . $id_entrada . "'";
            $resultado_preco2 = mysqli_query($link, $query_preco2);
            $valor_produto2 = mysqli_fetch_assoc($resultado_preco2);

            $salva_valor_produto2 = $valor_produto2['total_entrada'] + $salva_valor_produto;

            $query_qtd = "SELECT quantidade FROM tb_produto WHERE id_produto = '" . $codigo_produto . "'";
            $resultado_qtd = mysqli_query($link, $query_qtd);
            $qtd_produto = mysqli_fetch_assoc($resultado_qtd);

            $salva_qtd = $qtd_produto['quantidade'] + $quantidade;

            mysqli_query($link, "UPDATE `tb_total_entrada` SET `total_entrada`='$salva_valor_produto2' WHERE id_entrada_produto = '" . $id_entrada . "'");

            mysqli_query($link, "UPDATE `tb_produto` SET `quantidade`='$salva_qtd' WHERE id_produto = '" . $codigo_produto . "'");

            mysqli_query($link, "INSERT INTO tb_itens_entrada (id_itens_entrada, id_entrada_produto ,id_produto , quantidade) 
                             VALUES(DEFAULT, '$id_entrada' , $codigo_produto , $quantidade)");

            echo "<script>window.location = '../view/entrada_produto_view.php?id=" . $id_entrada . "&tpe=" . $tp_entrada . "';</script>";
        }
    }


    public function excluirProdutoEntrada($link, $codigo_produto, $codigo_entrada, $nf, $tpe, $qtd)
    {
        $query_qtd = "SELECT quantidade FROM tb_produto WHERE id_produto = '" . $codigo_produto . "'";
        $resultado_qtd = mysqli_query($link, $query_qtd);
        $qtd_produto = mysqli_fetch_assoc($resultado_qtd);

        $salva_qtd = $qtd_produto['quantidade'] - $qtd;

        mysqli_query($link, "UPDATE `tb_produto` SET `quantidade`='$salva_qtd' WHERE id_produto = '" . $codigo_produto . "'");


        $query_preco = "SELECT preco_produto FROM tb_produto WHERE id_produto = '" . $codigo_produto . "'";
        $resultado_preco = mysqli_query($link, $query_preco);
        $valor_produto = mysqli_fetch_assoc($resultado_preco);

        $valor_a_tira = $qtd * $valor_produto['preco_produto'];
        echo ($valor_a_tira) . "<br>";

        $query_preco2 = "SELECT total_entrada FROM tb_total_entrada WHERE id_entrada_produto = '" . $codigo_entrada . "'";
        $resultado_preco2 = mysqli_query($link, $query_preco2);
        $valor_produto2 = mysqli_fetch_assoc($resultado_preco2);

        $valor_a_tira2 = $valor_produto2['total_entrada'] - $valor_a_tira;

        echo ($valor_a_tira2) . "<br>";



        mysqli_query($link, "UPDATE `tb_total_entrada` SET `total_entrada`= '$valor_a_tira2' WHERE id_entrada_produto = '" . $codigo_entrada . "'");


        mysqli_query($link, "DELETE FROM `tb_itens_entrada` WHERE (`id_produto` = '$codigo_produto') AND (`id_entrada_produto` = '$codigo_entrada')");

        echo  "<script>alert('Produto removido com sucesso!');</script>";
        echo "<script>window.location = '../view/entrada_produto_view.php?id=" . $codigo_entrada . "&tpe=" . $tpe . "';</script>";
    }


    public function buscaEntrada($link, $dt_inicial, $dt_final)
    {
        $resultado  = "SELECT entP.id_entrada_produto, dt_entrada, nf_fiscal, total_entrada, usuario, id_tp_entrada_produto ,id_status_mov_produto FROM tb_entrada_produto as entP
                        INNER JOIN tb_usuario AS usu ON (usu.id_usuario = entP.id_usuario) 
                        INNER JOIN tb_total_entrada AS ttEn ON (ttEn.id_entrada_produto = entP.id_entrada_produto)  
                        WHERE id_status_mov_produto = '1' AND dt_entrada BETWEEN '" . $dt_inicial . "' AND  '" . $dt_final . "' 
                        ORDER BY entP.id_entrada_produto";



        $resultado_peca = mysqli_query($link, $resultado);


        echo "<link href='../bootstrap/css/menu.css'  rel='stylesheet'/>";
        echo "<table class='table table-bordered all' method='POST' action='../Model/adicionar_peca_pedido.php' >\n";
        echo '<thead class="thead-darks">';
        echo "<tr>\n";
        echo "<th scope='col'>Cod. Entrada</th>\n";
        echo "<th scope='col'>Data Entrada</th>\n";
        echo "<th scope='col'>NF</th>\n";
        echo "<th scope='col'>Usuário</th>\n";
        echo "<th scope='col'>Total Entrada</th>\n";
        echo "<th scope='col'>Ação</th>\n";
        echo "</tr>\n";
        echo "</thead>\n";
        while ($row_peca = mysqli_fetch_assoc($resultado_peca)) {
            echo "<tbody>";
            echo "<tr>\n";
            echo "<th scope='col'>" . $row_peca[id_entrada_produto] . "</th>\n";
            echo "<th scope='col'>" . $row_peca['dt_entrada'] . "</th>\n";
            echo "<th scope='col'>" . $row_peca['nf_fiscal'] . "</th>\n";
            echo "<th scope='col'>" . $row_peca['usuario'] . "</th>\n";
            echo "<th scope='col'>" . $row_peca['total_entrada'] . "</th>\n";
            echo "<th scope='col'><a href='../view/entrada_visualizacao_view.php?id=" . $row_peca['id_entrada_produto'] . "&tpe=" . $row_peca['id_tp_entrada_produto'] . "'><button type='button' class='btn btn-primary' >Selecionar</button></a></th>\n";
            echo "</tr>\n";
            echo "</tbody>";
        }
        echo "</table>\n";
    }

    public function cancelarEntradaItens($link, $codigo_produto, $qtd)
    {
        $query_qtd = "SELECT quantidade FROM tb_produto WHERE id_produto ='$codigo_produto' ";
        $resultado_qtd = mysqli_query($link, $query_qtd);
        $qtd_produto = mysqli_fetch_array($resultado_qtd);

        $salva_qtd = $qtd_produto['quantidade'] - $qtd;

        mysqli_query($link, "UPDATE `tb_produto` SET `quantidade`='$salva_qtd' WHERE id_produto = '" . $codigo_produto . "'");
    }


    public function relatorioEntradaPdf($link, $id_entrada)
    {

        $buscaEnt = "SELECT id_entrada_produto, entrada.id_tp_entrada_produto, dt_entrada, tpen.tipo_entrada_produto, nf_fiscal, usuario FROM tb_entrada_produto AS entrada
        INNER JOIN tb_usuario AS usu ON (usu.id_usuario = entrada.id_usuario) 
        INNER JOIN tb_tp_entrada_produto AS tpen ON (tpen.id_tp_entrada_produto = entrada.id_tp_entrada_produto)
        WHERE id_entrada_produto = '$id_entrada'";
        $resultado_entrada = mysqli_query($link, $buscaEnt);
        $entrada = mysqli_fetch_assoc($resultado_entrada);


        $query_total  = "SELECT total_entrada FROM `tb_total_entrada` WHERE id_entrada_produto = '".$id_entrada."'";                
        $resultado_total  = mysqli_query($link, $query_total);
        $total = mysqli_fetch_assoc($resultado_total);

        $busca  = "SELECT tbProduto.id_produto, descricao, tipo_produto, itensEntrada.quantidade, preco_produto FROM tb_produto AS tbProduto
        INNER JOIN tb_tipo_produto AS tpProduto ON (tpProduto.id_tipo_produto = tbProduto.id_tipo_produto) 
        INNER JOIN tb_itens_entrada AS itensEntrada ON (itensEntrada.id_produto = tbProduto.id_produto)
        WHERE  '" . $id_entrada . "' = itensEntrada.id_entrada_produto
        ORDER BY tbProduto.id_produto ";
        $resultado_busca = mysqli_query($link, $busca);

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', "B", 16);
        $pdf->Cell(190, 10, utf8_decode('Entrada De Produtos'), 0, 0, "C");
        $pdf->Ln(10);
        $pdf->SetFont('Arial', "I", 12);
        $pdf->Cell(190, 10, utf8_decode('N.Entrada:' . $entrada['id_entrada_produto']), 0, 0, "L");
        $pdf->Ln(5);
        $pdf->Cell(190, 10, utf8_decode('NF Fiscal:'.$entrada['nf_fiscal']), 0, 0, "L");
        $pdf->Ln(5);
        $pdf->Cell(190, 10, utf8_decode('Tipo de Entrada:'.$entrada['tipo_entrada_produto']), 0, 0, "L");    
        $pdf->Ln(5);
        $pdf->Cell(190, 10, utf8_decode('Usuario de Cadastro:'.$entrada['usuario']), 0, 0, "L");        
        $pdf->Ln(5);
        $pdf->Cell(190, 10, utf8_decode('Data Entrada:'.date('d/m/Y', strtotime($entrada['dt_entrada']))), 0, 0, "L");

        $pdf->Ln(15);
        $pdf->SetFont("Arial", "I", 10);
        $pdf->Cell(30, 7, utf8_decode('Codido Produto'), 1, 0, "c");
        $pdf->Cell(30, 7, utf8_decode('descrição'), 1, 0, "c");    
        $pdf->Cell(30, 7, utf8_decode('Tipo Produto'), 1, 0, "c");
        $pdf->Cell(30, 7, utf8_decode('Quantidade'), 1, 0, "c");
        $pdf->Cell(30, 7, utf8_decode('Valor'), 1, 0, "c");   
        $pdf->Ln(10); 
        while ($row_busca = mysqli_fetch_assoc($resultado_busca)){

            $pdf->Cell(30, 7,utf8_decode($row_busca[id_produto]), 0, 0, "c");
            $pdf->Cell(30, 7,utf8_decode($row_busca['descricao']), 0, 0, "c"); 
            $pdf->Cell(30, 7,utf8_decode($row_busca['tipo_produto']), 0, 0, "c");
            $pdf->Cell(30, 7,utf8_decode($row_busca['quantidade']), 0, 0, "c");
            $pdf->Cell(30, 7,utf8_decode($row_busca['preco_produto']), 0, 0, "c");
            $pdf->Ln(5); 
        }
        $pdf->Ln(15);
        $pdf->SetFont('Arial', "I", 12);
        $pdf->Cell(190, 10, utf8_decode('Total Da Entrada:'.$total['total_entrada']), 0, 0, "L");

        $pdf->Output($dest = 'D',
        $name = utf8_decode('Relatorio Entrada Produto.pdf'),
        $isUTF8 = false);

    }


}
