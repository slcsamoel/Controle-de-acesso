<?php
require_once('../controller/conexao_banco.php');

class Produto
{

    private $id_produto;
    private $descricao;
    private $quantidade;
    private $observacao;
    private $dt_cadastro;
    private $preco_produto;

    public function getId_produto()
    {
        return $this->id_produto;
    }

    public function setId_produto($id_produto)
    {
        $this->id_produto = $id_produto;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }


    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }


    public function getObservacao()
    {
        return $this->observacao;
    }

    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }


    public function getDt_cadastro()
    {
        return $this->dt_cadastro;
    }

    public function setDt_cadastro($dt_cadastro)
    {
        $this->dt_cadastro = $dt_cadastro;

        return $this;
    }

    public function getPreco_produto()
    {
        return $this->preco_produto;
    }

    public function setPreco_produto($preco_produto)
    {
        $this->preco_produto = $preco_produto;

        return $this;
    }


    public function adicionarProduto($link, $descricao, $observacao, $id_tipo_produto, $id_usuario, $preco_produto)
    {

        mysqli_query($link, " INSERT INTO tb_produto (descricao , observacao,id_tipo_produto,id_usuario,preco_produto) 
                             VALUES('$descricao','$observacao','$id_tipo_produto', '$id_usuario','$preco_produto')");
        echo  "<script>alert('Cadastrado com sucesso!');</script>";
        echo "<script>window.location = '../View/buscar_produto_view.php';</script>";
    }

    public function buscaProduto($link, $descricao)
    {
        $busca  = "SELECT id_produto, descricao, quantidade, observacao, dt_cadastro, tipo_produto FROM tb_produto AS tbProduto
                INNER JOIN tb_tipo_produto AS tpProduto ON (tpProduto.id_tipo_produto = tbProduto.id_tipo_produto) 
                WHERE  descricao LIKE '%$this->descricao%'
                ORDER BY id_produto ";

        $resultado_busca = mysqli_query($link, $busca);

        echo "<link href='../bootstrap/css/menu.css'  rel='stylesheet'/>";
        echo "<table class='table table-bordered all'  method='GET'>\n";
        echo '<thead class="thead-darks">';
        echo "<tr>\n";
        echo "<th scope='col'>Cod.</th>\n";
        echo "<th scope='col'>Descrição</th>\n";
        echo "<th scope='col'>Tipo Produto</th>\n";
        echo "<th scope='col'>Quantidade</th>\n";
        echo "<th scope='col'>Data Cadastro</th>\n";
        echo "<th scope='col'>Observação</th>\n";
        echo "<th scope='col'>Ação</th>\n";
        echo "</tr>\n";
        echo "</thead>\n";
        while ($row_busca = mysqli_fetch_assoc($resultado_busca)) {
            echo "<tbody>";
            echo "<tr>\n";
            echo "<th scope='col'>" . $row_busca[id_produto] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['descricao'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['tipo_produto'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['quantidade'] . "</th>\n";
            echo "<th scope='col'>" . date('d/m/Y', strtotime($row_busca['dt_cadastro'])) . "</th>\n";
            echo "<th scope='col'>" . $row_busca['observacao'] . "</th>\n";
            echo "<th scope='col'><a href='produto_view.php?id=" . $row_busca[id_produto] . "'> <button type='button' class='btn btn-primary' >Alterar</button></a></th>\n";
            echo "</tr>\n";
            echo "</tbody>";
        }
        echo "</table>\n";
    }


    public function alterarProduto($link, $id_produto, $descricao, $observacao, $id_tipo_produto, $preco_produto)
    {

        mysqli_query($link, "UPDATE `tb_produto` SET `descricao` = '$descricao', `observacao` = '$observacao',`id_tipo_produto` = '$id_tipo_produto', `preco_produto` = '$preco_produto'
                             WHERE id_produto = '$id_produto' ");
        echo  "<script>alert('Alterado com sucesso!');</script>";
        echo "<script>window.location = '../View/buscar_produto_view.php';</script>";
    }



    public function adicionaProduto($link, $id_produto, $quantidade)
    {



        $query  = "SELECT id_produto, descricao, quantidade FROM tb_produto 
                   WHERE id_produto = $id_produto
                   ORDER BY id_produto";



        $resultado_peca = mysqli_query($link, $query);

        echo "<link href='../bootstrap/css/menu.css'  rel='stylesheet'/>";
        echo "<table class='table table-bordered' method='GET' action='../Model/deletar_servico_pedido.php' >\n";
        echo '<thead class="thead-darks">';
        echo "<tr>\n";
        echo "<th scope='col'>Cod.</th>\n";
        echo "<th scope='col'>Descrição Produto</th>\n";
        echo "<th scope='col'>Valor Produto</th>\n";
        echo "<th scope='col'>Excluir</th>\n";
        echo "</tr>\n";
        echo "</thead>\n";
        while ($row_peca = mysqli_fetch_assoc($resultado_peca)) {
            echo "<tbody>";
            echo "<tr>\n";
            echo "<th scope='col'>" . $row_peca[id_produto] . "</th>\n";
            echo "<th scope='col'>" . substr($row_peca['descricao'], 0, 40) . "</th>\n";
            echo "<th scope='col'>" . $row_peca['quantidade'] . "</th>\n";
            echo "<th scope='col'><a href='../Model/deletar_servico_pedido.php> <button type='button' class='btn btn-danger' >Excluir</button></a></th>\n";
            echo "</tr>\n";
            echo "</tbody>";
        }
        echo "</table>\n";
    }
}
