<?php

require_once('../controller/conexao_banco.php');
class BaixaProduto
{
    private $id_baixa;
    private $cpf_funcionario;

    public function getCpf_funcionario()
    {
        return $this->cpf_funcionario;
    }

    public function setCpf_funcionario($cpf_funcionario)
    {
        $this->cpf_funcionario = $cpf_funcionario;

        return $this;
    }

    public function getId_baixa()
    {
        return $this->id_baixa;
    }

    public function setId_baixa($id_baixa)
    {
        $this->id_baixa = $id_baixa;

        return $this;
    }

    public function buscarCpf($link, $cpf_funcionario)
    {


        $busca  = "SELECT id_funcionario, nome, cpf, turno, sexo, dt_cadastro FROM tb_funcionario 
                    WHERE  cpf = '$cpf_funcionario' AND id_status = '1'
                    ORDER BY id_funcionario ";

        $resultado_busca = mysqli_query($link, $busca);

        echo "<link href='../bootstrap/css/menu.css'  rel='stylesheet'/>";
        echo "<table class='table table-bordered all'  method='GET'>\n";
        echo '<thead class="thead-darks">';
        echo "<tr>\n";
        echo "<th scope='col'>Cod.</th>\n";
        echo "<th scope='col'>Nome</th>\n";
        echo "<th scope='col'>CPF</th>\n";
        echo "<th scope='col'>Sexo</th>\n";
        echo "<th scope='col'>Data Cadastro</th>\n";
        echo "<th scope='col'>Turno</th>\n";
        echo "<th scope='col'>Ação</th>\n";
        echo "</tr>\n";
        echo "</thead>\n";
        while ($row_busca = mysqli_fetch_assoc($resultado_busca)) {
            echo "<tbody>";
            echo "<tr>\n";
            echo "<th scope='col'>" . $row_busca[id_funcionario] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['nome'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['cpf'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['sexo'] . "</th>\n";
            echo "<th scope='col'>" . date('d/m/Y', strtotime($row_busca['dt_cadastro'])) . "</th>\n";
            echo "<th scope='col'>" . $row_busca['turno'] . "</th>\n";
            echo "<th scope='col'><a href='../controller/adiciona_baixa.php?id=" . $row_busca[id_funcionario] . "&nome=" . $row_busca['nome'] . "&cpf=" . $row_busca['cpf'] . "'> <button type='button' class='btn btn-primary' >Selecionar</button></a></th>\n";
            echo "</tr>\n";
            echo "</tbody>";
        }
        echo "</table>\n";
    }


    public function adicionaBaixaProduto($link, $id_funcionario, $nome_funcionario, $cpf_funcionario, $id_usuario)
    {

        mysqli_query($link, "INSERT INTO tb_baixa_produto (	id_baixa_produto, id_funcionario ,id_usuario) 
                             VALUES(DEFAULT, '$id_funcionario' , '$id_usuario')");

        $query = "SELECT MAX(id_baixa_produto) FROM tb_baixa_produto ";
        $resultado = mysqli_query($link, $query);
        $resultado_id_baixa = mysqli_fetch_assoc($resultado);


        echo "<script>window.location = '../view/baixar_produtos_view.php?idBaixa=" . $resultado_id_baixa['MAX(id_baixa_produto)'] . "';</script>";
    }


    public function adicionaProdutoBaixa($link, $id_baixa, $codigo_produto, $quantidade)
    {
        $numeroRegistro = mysqli_query($link, "SELECT id_produto FROM tb_itens_baixa WHERE id_baixa_produto = '" . $id_baixa . "' AND id_produto = '" . $codigo_produto . "' ");
        $numDt = mysqli_num_rows($numeroRegistro);

        if ($numDt > 0) {
            echo  "<script>alert('Já existe um produto com esse codigo!');</script>";
            echo "<script>window.location = '../view/baixar_produtos_view.php?idBaixa=" . $id_baixa . "';</script>";
        } else {

            $query_qtd = "SELECT quantidade FROM tb_produto WHERE id_produto = '" . $codigo_produto . "'";
            $resultado_qtd = mysqli_query($link, $query_qtd);
            $qtd_produto = mysqli_fetch_assoc($resultado_qtd);
            if($qtd_produto['quantidade'] <=0 || $qtd_produto['quantidade']== null){
                echo  "<script>alert('Não existe estoque para esse produto!');</script>";
            }else{
            $salva_qtd = $qtd_produto['quantidade'] - $quantidade;

            mysqli_query($link, "UPDATE `tb_produto` SET `quantidade`='$salva_qtd' WHERE id_produto = '" . $codigo_produto . "'");

            mysqli_query($link, "INSERT INTO tb_itens_baixa (id_itens_baixa, id_baixa_produto ,id_produto , quantidade) 
                             VALUES(DEFAULT, '$id_baixa' , $codigo_produto , $quantidade)");
            }
            echo "<script>window.location = '../view/baixar_produtos_view.php?idBaixa=" . $id_baixa . "';</script>";
        }
    }



    public function excluirProdutoBaixa($link, $codigo_produto, $codigo_baixa, $qtd)
    {
        $query_qtd = "SELECT quantidade FROM tb_produto WHERE id_produto = '" . $codigo_produto . "'";
        $resultado_qtd = mysqli_query($link, $query_qtd);
        $qtd_produto = mysqli_fetch_assoc($resultado_qtd);

        $salva_qtd = $qtd_produto['quantidade'] + $qtd;

        mysqli_query($link, "UPDATE `tb_produto` SET `quantidade`='$salva_qtd' WHERE id_produto = '" . $codigo_produto . "'");


        mysqli_query($link, "DELETE FROM `tb_itens_baixa` WHERE (`id_produto` = '$codigo_produto') AND (`id_baixa_produto` = '$codigo_baixa')");

        echo  "<script>alert('Produto removido com sucesso!');</script>";
        echo "<script>window.location = '../view/baixar_produtos_view.php?idBaixa=" . $codigo_baixa . "';</script>";
    }


    public function buscaBaixa($link, $dt_inicial, $dt_final)
    {
        $resultado  = "SELECT saiP.id_baixa_produto, dt_baixa, usuario, nome  FROM tb_baixa_produto as saiP
                        INNER JOIN tb_funcionario AS fun ON (fun.id_funcionario = saiP.id_funcionario) 
                        INNER JOIN tb_usuario AS usu ON (usu.id_usuario = saiP.id_usuario) 
                        WHERE  id_status_mov_produto = '1' AND dt_baixa BETWEEN '" . $dt_inicial . "' AND  '" . $dt_final . "' 
                        ORDER BY saiP.id_baixa_produto";



        $resultado_peca = mysqli_query($link, $resultado);


        echo "<link href='../bootstrap/css/menu.css'  rel='stylesheet'/>";
        echo "<table class='table table-bordered all' method='POST' action='../Model/adicionar_peca_pedido.php' >\n";
        echo '<thead class="thead-darks">';
        echo "<tr>\n";
        echo "<th scope='col'>Cod. Saida</th>\n";
        echo "<th scope='col'>Data Saida</th>\n";
        echo "<th scope='col'>Funcionario</th>\n";
        echo "<th scope='col'>Usuário</th>\n";
        echo "<th scope='col'>Ação</th>\n";
        echo "</tr>\n";
        echo "</thead>\n";
        while ($row_peca = mysqli_fetch_assoc($resultado_peca)) {
            echo "<tbody>";
            echo "<tr>\n";
            echo "<th scope='col'>" . $row_peca[id_baixa_produto] . "</th>\n";
            echo "<th scope='col'>" . $row_peca['dt_baixa'] . "</th>\n";
            echo "<th scope='col'>" . $row_peca['nome'] . "</th>\n";
            echo "<th scope='col'>" . $row_peca['usuario'] . "</th>\n";
            echo "<th scope='col'><a href='../view/baixa_visualizacao_view.php?idBaixa=" . $row_peca['id_baixa_produto'] . "'><button type='button' class='btn btn-primary' >Selecionar</button></a></th>\n";
            echo "</tr>\n";
            echo "</tbody>";
        }
        echo "</table>\n";
    }




    public function cancelarItensBaixa($link, $codigo_produto, $qtd)
    {
        $query_qtd = "SELECT quantidade FROM tb_produto WHERE id_produto = '" . $codigo_produto . "'";
        $resultado_qtd = mysqli_query($link, $query_qtd);
        $qtd_produto = mysqli_fetch_assoc($resultado_qtd);

        $salva_qtd = $qtd_produto['quantidade'] + $qtd;

        mysqli_query($link, "UPDATE `tb_produto` SET `quantidade`='$salva_qtd' WHERE id_produto = '" . $codigo_produto . "'");
    }

    public function relatorioBaixaPdf($link, $id_baixa)
    {
        ob_clean();

        $buscaBaixa  = "SELECT id_baixa_produto, nome, cpf, dt_baixa, usuario FROM tb_baixa_produto AS baixa
        INNER JOIN tb_funcionario AS func ON (baixa.id_funcionario = func.id_funcionario) 
        INNER JOIN tb_usuario AS usu ON (usu.id_usuario = baixa.id_usuario) 
        WHERE  '" . $id_baixa . "' = id_baixa_produto";
        $resultado = mysqli_query($link, $buscaBaixa);
        $baixa = mysqli_fetch_assoc($resultado);

        $busca  = "SELECT tbProduto.id_produto, descricao, tipo_produto, itensbaixa.quantidade FROM tb_produto AS tbProduto
        INNER JOIN tb_tipo_produto AS tpProduto ON (tpProduto.id_tipo_produto = tbProduto.id_tipo_produto) 
        INNER JOIN tb_itens_baixa AS itensbaixa ON (itensbaixa.id_produto = tbProduto.id_produto)
        WHERE  '".$id_baixa."' = itensbaixa.id_baixa_produto
        ORDER BY tbProduto.id_produto ";

        $resultado_busca = mysqli_query($link, $busca);

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', "B", 16);
        $pdf->Cell(190, 10, utf8_decode('Baixa De Produtos'), 0, 0, "C");
        $pdf->Ln(10);
        $pdf->SetFont('Arial', "I", 12);
        $pdf->Cell(190, 10, utf8_decode('N.Baixa:' . $baixa['id_baixa_produto']), 0, 0, "L");
        $pdf->Ln(5);
        $pdf->Cell(190, 10, utf8_decode('Nome do Funcionario :' . $baixa['nome']), 0, 0, "L");
        $pdf->Ln(5);
        $pdf->Cell(190, 10, utf8_decode('Cpf :' . $baixa['cpf']), 0, 0, "L");
        $pdf->Ln(5);
        $pdf->Cell(190, 10, utf8_decode('Usuario de Cadastro :' . $baixa['usuario']), 0, 0, "L");
        $pdf->Ln(5);
        $pdf->Cell(190, 10, utf8_decode('Data Entrada:' . date('d/m/Y', strtotime($baixa['dt_baixa']))), 0, 0, "L");

        $pdf->Ln(15);
        $pdf->SetFont("Arial", "I", 10);
        $pdf->Cell(30, 7, utf8_decode('Codido Produto'), 1, 0, "c");
        $pdf->Cell(30, 7, utf8_decode('descrição'), 1, 0, "c");
        $pdf->Cell(30, 7, utf8_decode('Tipo Produto'), 1, 0, "c");
        $pdf->Cell(30, 7, utf8_decode('Quantidade'), 1, 0, "c");
        $pdf->Ln(10);
        while ($row_busca = mysqli_fetch_assoc($resultado_busca)) {

            $pdf->Cell(30, 7, utf8_decode($row_busca[id_produto]), 0, 0, "c");
            $pdf->Cell(30, 7, utf8_decode($row_busca['descricao']), 0, 0, "c");
            $pdf->Cell(30, 7, utf8_decode($row_busca['tipo_produto']), 0, 0, "c");
            $pdf->Cell(30, 7, utf8_decode($row_busca['quantidade']), 0, 0, "c");
            $pdf->Ln(5);
        }
        $pdf->Ln(20);
        $pdf->SetFont('Arial', "I", 12);
        $pdf->Cell(190, 10, utf8_decode('Assinatura do Funcionario:______________________________ '), 0, 0, "R");

        $pdf->Output(
            $dest = 'D',
            $name = utf8_decode('Relatorio Baixa Produto.pdf'),
            $isUTF8 = false
        );
       
    }
}
