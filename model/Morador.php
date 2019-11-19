<?php
require_once('Pessoa.php');
require_once('../fpdf/fpdf.php');
class Morador extends Pessoa
{
    private $id_morador;
    private $nome_mae;
    private $nome_pai;
    private $nome;
    private $telefone;
    private $id_tipo_morador;


    public function getId_morador()
    {
        return $this->id_morador;
    }

    public function setId_morador($id_morador)
    {
        $this->id_morador = $id_morador;

        return $this;
    }



    public function getId_tipo_morador()
    {
        return $this->id_tipo_morador;
    }


    public function setId_tipo_morador($id_tipo_morador)
    {
        $this->id_tipo_morador = $id_tipo_morador;

        return $this;
    }


    public function getNome_mae()
    {
        return $this->nome_mae;
    }


    public function setNome_mae($nome_mae)
    {
        $this->nome_mae = $nome_mae;

        return $this;
    }


    public function getNome_pai()
    {
        return $this->nome_pai;
    }


    public function setNome_pai($nome_pai)
    {
        $this->nome_pai = $nome_pai;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }


    public function getTelefone()
    {
        return $this->telefone;
    }


    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getData_cadastro()
    {
        return $this->data_cadastro;
    }


    public function setData_cadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;

        return $this;
    }



    function buscar_cadastro($link, $cpf)
    {
        $sql = "SELECT * fROM tb_morador  WHERE cpf ='$cpf'";
        $result_select = mysqli_query($link, $sql);
        if ($result_select) {
            $cadastro = mysqli_fetch_array($result_select);
        } else {
            echo  "<script>alert('Erro na Consulta');</script>";
        }
        return $cadastro;
    }


    function cadastra_morador($link, $nome, $cpf, $dt_nascimento, $sexo, $rg, $telefone, $nome_mae, $nome_pai, $id_tipo_morador, $id_usuario, $id_apartamento)
    {
        $sql = "INSERT INTO tb_morador(cpf,nome,nome_mae,nome_pai,rg,dt_nascimento,sexo,id_tipo_morador,id_usuario,telefone,id_apartamento,id_status) 
        VAlUES('$cpf','$nome', '$nome_mae','$nome_pai',$rg,'$dt_nascimento','$sexo',$id_tipo_morador,$id_usuario,'$telefone',$id_apartamento, 1)";
        $result_insert = mysqli_query($link, $sql);
        $cadastrado = false;
        if ($result_insert) {
            $cadastrado = true;
        }
        return $cadastrado;
    }



    function buscar_morador($link, $id_morador, $cpf)
    {
        $cadastro = "";
        if (isset($id_morador) && $id_morador != '') {
            $sql = "SELECT * fROM tb_morador  WHERE id_morador = '$id_morador'";
            $result_select = mysqli_query($link, $sql);
            $cadastro = mysqli_fetch_array($result_select);
        } elseif (isset($cpf) && $cpf != '') {
            $sql = "SELECT * fROM tb_morador  WHERE cpf = '$cpf'";
            $result_select = mysqli_query($link, $sql);
            $cadastro = mysqli_fetch_array($result_select);
        } else {
            echo  "<script>alert('Erro na Consulta');</script>";
        }

        if (isset($cadastro['nome'])) {
            return $cadastro;
            // caso encontre ira retorna um cadastro.  
        } else {
            echo "<script>alert('Cadastro não existe');</script>";
            echo "<script language='javascript'>history.back()</script>";
        }
    }

    function alterar_morador($link, $id_morador, $nome, $cpf, $nome_mae, $nome_pai, $dt_nascimento, $sexo, $rg, $telefone, $placa, $id_apartamento, $descricao_veiculo, $id_usuario, $id_tipo_morador)
    {
        mysqli_query($link, " UPDATE `tb_morador` SET `cpf` ='$cpf',`nome`='$nome',`nome_mae`='$nome_mae',`nome_pai`='$nome_pai',`rg`= '$rg',`dt_nascimento` ='$dt_nascimento',`sexo` ='$sexo',
        `id_tipo_morador`='$id_tipo_morador',`id_usuario`='$id_usuario', `telefone`='$telefone',`id_apartamento`='$id_apartamento' WHERE id_morador ='$id_morador'");


        mysqli_query($link, " UPDATE `tb_veiculo` SET `placa` ='$placa',`descricao_veiculo`='$descricao_veiculo' WHERE id_morador ='$id_morador'");
        echo  "<script>alert('Cadastro alterado com sucesso!');</script>";
        echo "<script>window.location = '../View/buscar_morador_view.php';</script>";
    }



    public function buscarMorador($link, $nomeMorador)
    {
        $busca  = "SELECT id_morador, nome, cpf, dt_nascimento, sexo, dt_cadastro, telefone, st.status, bloco.descricao_bloco, tm.tipo_morador FROM tb_morador AS morador
                INNER JOIN tb_apartamento AS ap ON (morador.id_apartamento = ap.id_apartamento) 
                INNER JOIN tb_bloco AS bloco ON (bloco.id_bloco = ap.id_bloco) 
                INNER JOIN tb_tipo_morador AS tm ON (tm.id_tipo_morador = morador.id_tipo_morador) 
                INNER JOIN tb_status AS st ON (st.id_status = morador.id_status) 
                WHERE morador.id_status ='1' AND nome LIKE '%$nomeMorador%'
                ORDER BY id_morador ";

        $resultado_busca = mysqli_query($link, $busca);

        echo "<link href='../bootstrap/css/menu.css'  rel='stylesheet'/>";
        echo "<table class='table table-bordered all'  method='GET'>\n";
        echo '<thead class="thead-darks">';
        echo "<tr>\n";
        echo "<th scope='col'>Cod.</th>\n";
        echo "<th scope='col'>Nome</th>\n";
        echo "<th scope='col'>CPF</th>\n";
        echo "<th scope='col'>Sexo</th>\n";
        echo "<th scope='col'>Telefone</th>\n";
        echo "<th scope='col'>Data Nasc.</th>\n";
        echo "<th scope='col'>Data Residente</th>\n";
        echo "<th scope='col'>Residente</th>\n";
        echo "<th scope='col'>Bloco</th>\n";
        echo "<th scope='col'>Status</th>\n";
        echo "<th scope='col'>Ação</th>\n";
        echo "</tr>\n";
        echo "</thead>\n";
        while ($row_busca = mysqli_fetch_assoc($resultado_busca)) {
            echo "<tbody>";
            echo "<tr>\n";
            echo "<th scope='col'>" . $row_busca[id_morador] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['nome'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['cpf'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['sexo'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['telefone'] . "</th>\n";
            echo "<th scope='col'>" . date('d/m/Y', strtotime($row_busca['dt_nascimento'])) . "</th>\n";
            echo "<th scope='col'>" . date('d/m/Y', strtotime($row_busca['dt_cadastro'])) . "</th>\n";
            echo "<th scope='col'>" . $row_busca['tipo_morador'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['descricao_bloco'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['status'] . "</th>\n";
            echo "<th scope='col'><a href='morador_view.php?id_morador=" . $row_busca[id_morador] . "'> <button type='button' class='btn btn-primary' >Alterar</button></a></th>\n";
            echo "</tr>\n";
            echo "</tbody>";
        }
        echo "</table>\n";
    }

    public function altera_imagem($link, $imagem_nova, $id_morador)
    {
        // excluindo a imagem antiga da pasta 
        $sql = mysqli_query($link, " SELECT imagem FROM tb_img_morador WHERE id_morador = '$id_morador'");
        $verificar = mysqli_num_rows($sql);
        if ($verificar > 0) {
            $foto_antiga = mysqli_fetch_array($sql);
            $url_antiga = '../fotos_moradores/' . $foto_antiga['imagem'];
            unlink($url_antiga);
            $diretorio = '../fotos_moradores/';

            move_uploaded_file($_FILES['imagem_nova']['tmp_name'], $diretorio . $imagem_nova);

            $sql_foto = " UPDATE `tb_img_morador` SET `imagem`='$imagem_nova' WHERE id_morador = $id_morador ";
            mysqli_query($link, $sql_foto);
        } else {


            $diretorio = '../fotos_moradores/';

            move_uploaded_file($_FILES['imagem_nova']['tmp_name'], $diretorio . $imagem_nova);

            $sql_foto = "INSERT INTO tb_img_morador(imagem , id_morador)VALUES('$imagem_nova',$id_morador)";
            mysqli_query($link, $sql_foto);
        }
    }

    function relatorio_entrada($link, $id_morador, $dt_inicial, $dt_final)
    {
        //$morador = buscar_morador($link, $id_morador,$cpf);
        //$id_morador = $morador['id_morador'];   

        $busca  = "SELECT  mor.id_morador, mor.nome , mor.cpf , mov.dt_movimentacao , mov.id_movimentacao ,
             tp.movimentacao , u.usuario FROM tb_morador as mor
             INNER JOIN tb_mov_morador AS mov ON (mor.id_morador = mov.id_morador)
              INNER JOIN tb_tp_movimentacao AS tp ON (tp.id_tp_movimentacao = mov.id_tp_movimentacao) 
              INNER JOIN tb_usuario AS u ON (u.id_usuario = mov.id_usuario) 
              WHERE mor.id_morador = '$id_morador' AND mov.dt_movimentacao BETWEEN '$dt_inicial' AND '$dt_final' ORDER BY mov.id_movimentacao DESC ";

        $resultado_movimentacao = mysqli_query($link, $busca);

        echo "<link href='../bootstrap/css/menu.css'  rel='stylesheet'/>";
        echo "<table class='table table-bordered all'  method='GET'>\n";
        echo '<thead class="thead-darks">';
        echo "<tr>\n";
        echo "<th scope='col'>Cod.</th>\n";
        echo "<th scope='col'>Nome</th>\n";
        echo "<th scope='col'>CPF</th>\n";
        echo "<th scope='col'>Data Movimentação</th>\n";
        echo "<th scope='col'>Movimentação</th>\n";
        echo "<th scope='col'>Usuario</th>\n";
        echo "</tr>\n";
        echo "</thead>\n";
        while ($row_busca = mysqli_fetch_assoc($resultado_movimentacao)) {
            echo "<tbody>";
            echo "<tr>\n";
            echo "<th scope='col'>" . $row_busca[id_morador] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['nome'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['cpf'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['dt_movimentacao'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['movimentacao'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['usuario'] . "</th>\n";
            echo "</tr>\n";
            echo "</tbody>";
        }
        echo "</table>\n";
    }

    function relatorioMovimentacaoPdf($link, $id_morador, $dt_inicial, $dt_final)
        {

        $buscaMor = "SELECT * FROM tb_morador as mor 
        LEFT JOIN tb_apartamento as apart ON (mor.id_apartamento = apart.id_apartamento) INNER JOIN tb_bloco as bloc ON (apart.id_bloco = bloc.id_bloco) 
        WHERE mor.id_morador = '$id_morador'";

        $resultado_morador= mysqli_query($link, $buscaMor);

        $buscaMov = "SELECT  mor.id_morador, mor.nome , mor.cpf , mov.dt_movimentacao , mov.id_movimentacao ,
            tp.movimentacao , u.usuario FROM tb_morador as mor
            INNER JOIN tb_mov_morador AS mov ON (mor.id_morador = mov.id_morador)
             INNER JOIN tb_tp_movimentacao AS tp ON (tp.id_tp_movimentacao = mov.id_tp_movimentacao) 
             INNER JOIN tb_usuario AS u ON (u.id_usuario = mov.id_usuario) 
             WHERE mor.id_morador = '$id_morador' AND mov.dt_movimentacao BETWEEN '$dt_inicial' AND '$dt_final' ORDER BY mov.id_movimentacao DESC ";
        $resultado_movimentacao = mysqli_query($link, $buscaMov);
        $morador = mysqli_fetch_array($resultado_morador);

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', "B", 16);
        $pdf->Cell(190, 10, utf8_decode('Relatorio de movimentação'), 0, 0, "C");
        $pdf->Ln(10);
        $pdf->SetFont('Arial', "I", 12);
        $pdf->Cell(190, 10, utf8_decode('Codigo de Açesso:' . $morador['id_morador']), 0, 0, "L");
        $pdf->Ln(5);
        $pdf->Cell(190, 10, utf8_decode('Nome:'.$morador['nome']), 0, 0, "L");
        $pdf->Ln(5);
        $pdf->Cell(190, 10, utf8_decode('Cpf:'.$morador['cpf']), 0, 0, "L");    
        $pdf->Ln(5);
        $pdf->Cell(190, 10, utf8_decode($morador['descricao_bloco']), 0, 0, "L");        
        $pdf->Ln(5);
        $pdf->Cell(190, 10, utf8_decode('Apartamento:'.$morador['nr_apartamento']), 0, 0, "L");
        
        $pdf->Ln(15);
        $pdf->SetFont("Arial", "I", 10);
        $pdf->Cell(50, 7, utf8_decode('Data'), 1, 0, "c");
        $pdf->Cell(50, 7, utf8_decode('Movimentação'), 1, 0, "c");    
        $pdf->Cell(50, 7, "Usuario", 1, 0, "c");
        $pdf->Ln(10);   
        while ($row_busca = mysqli_fetch_assoc($resultado_movimentacao)){
            $dt_mov = new DateTime($row_busca['dt_movimentacao']);
            $dt_movimentacao = $dt_mov->format('d-m-Y H:i:s');

            $pdf->Cell(50, 7,utf8_decode($dt_movimentacao), 0, 0, "c");
            $pdf->Cell(50, 7,utf8_decode($row_busca['movimentacao']), 0, 0, "c"); 
            $pdf->Cell(50, 7,utf8_decode($row_busca['usuario']), 0, 0, "c");
            $pdf->Ln(5); 
        }

        $pdf->Output($dest = 'D',
        $name = utf8_decode('Relatorio de Movimentação.pdf'),
        $isUTF8 = false);
    }

}
