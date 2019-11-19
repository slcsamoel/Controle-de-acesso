<?php
require_once('Pessoa.php');
require_once('../fpdf/fpdf.php');
class Visitante extends Pessoa
{
    private $telefone;
    private $observacao;
    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

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

    function cadastra_visitante($link, $nome, $cpf, $dt_nascimento, $sexo, $rg, $telefone, $observacao, $id_usuario, $id_tipo_visita)
    {
        $sql = "INSERT INTO tb_visitante(nome,cpf,rg,dt_nascimento,telefone,sexo,observacao,id_usuario,id_status,id_tipo_visita)
        VAlUES('$nome','$cpf','$rg','$dt_nascimento','$telefone','$sexo','$observacao',$id_usuario,1,$id_tipo_visita)";
        $resul_insert = mysqli_query($link, $sql);
        $cadastrado = false;
        if ($resul_insert) {
            $cadastrado = true;
        } else {
            echo  "<script>alert('Erro ao executa Cadastro');</script>";
            echo "<script>window.location = '../view/cadastra_visitante_view.php';</script>";
        }
        return $cadastrado;
    }

    function buscar_visitante($link, $cpf, $nome)
    {
        $cadastro = "";
        if (isset($cpf) && $cpf != '') {
            $sql = "SELECT * fROM tb_visitante  WHERE cpf = '$cpf'";
            $result_select = mysqli_query($link, $sql);
            $cadastro = mysqli_fetch_array($result_select);
        } elseif (isset($nome) && $nome != '') {
            $sql = "SELECT * fROM tb_visitante  WHERE nome  LIKE '%$nome%'";
            $result_select = mysqli_query($link, $sql);
            $cadastro = mysqli_fetch_array($result_select);
        } else {
            //echo  "<script>alert('Erro na Consulta');</script>";
        }
        if (isset($cadastro['nome'])) {
            return $cadastro;
        } else {

            //echo "<script>alert('Cadastro não existe');</script>";
            //echo "<script language='javascript'>history.back()</script>";
        }
    }

    public function entrada_visita($link, $id_morador, $id_visitante, $id_usuario)
    {
        $sql = "INSERT INTO tb_visita_morador(id_morador,id_visitante,id_usuario,id_tp_movimentacao)
         VALUES ($id_morador,$id_visitante, $id_usuario,1)";
        $resul_insert = mysqli_query($link, $sql);
        if ($resul_insert) {
            echo "<script>alert('Entrada Registrada');</script>";
            echo "<script>window.location = '../view/buscar_visitantes_view.php';</script>";
        }
    }

    public function saida_visita($link, $id_visitante, $id_morador, $id_usuario)
    {
        $sql = " INSERT INTO tb_visita_morador(id_morador,id_visitante,id_usuario,id_tp_movimentacao)
         VALUES ($id_morador, $id_visitante, $id_usuario,2)";
        mysqli_query($link, $sql);

        echo  "<script>alert('Saida do visitante registrada');</script>";
        echo "<script>window.location = '../view/buscar_visitantes_view.php';</script>";
    }

    public function alterar_visita($link, $nome, $cpf, $dt_nascimento, $sexo, $rg, $telefone, $observacao, $id_usuario, $id_tipo_visita, $id_visitante)
    {
        mysqli_query($link, "UPDATE `tb_visitante` SET `nome`='$nome',`cpf`='$cpf',`rg`='$rg',`dt_nascimento`='$dt_nascimento',`telefone`='$telefone',`sexo`='$sexo',`observacao`='$observacao',`id_usuario`='$id_usuario' ,`id_tipo_visita`='$id_tipo_visita' WHERE id_visitante = '$id_visitante'");
    }

    public function buscarVisitante($link, $nomeVisitante)
    {
        $busca  = "SELECT * FROM tb_visitante AS vi
                INNER JOIN tb_tipo_visita AS tp ON (vi.id_tipo_visita = tp.id_tipo_visita)  
                INNER JOIN tb_status AS st ON (vi.id_status = st.id_status) 
                WHERE  nome LIKE '%$nomeVisitante%'
                ORDER BY id_visitante ";

        $resultado_busca = mysqli_query($link, $busca);

        echo "<link href='../bootstrap/css/menu.css'  rel='stylesheet'/>";
        echo "<table class='table table-bordered all'  method='GET'>\n";
        echo '<thead class="thead-darks">';
        echo "<tr>\n";
        echo "<th scope='col'>Nome</th>\n";
        echo "<th scope='col'>CPF</th>\n";
        echo "<th scope='col'>Sexo</th>\n";
        echo "<th scope='col'>Telefone</th>\n";
        echo "<th scope='col'>Data Nasc.</th>\n";
        echo "<th scope='col'>tipo_visita</th>\n";
        echo "<th scope='col'>Ação</th>\n";
        echo "</tr>\n";
        echo "</thead>\n";
        while ($row_busca = mysqli_fetch_assoc($resultado_busca)) {
            echo "<tbody>";
            echo "<tr>\n";
            echo "<th scope='col'>" . $row_busca['nome'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['cpf'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['sexo'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['telefone'] . "</th>\n";
            echo "<th scope='col'>" . date('d/m/Y', strtotime($row_busca['dt_nascimento'])) . "</th>\n";
            echo "<th scope='col'>" . $row_busca['tipo_visita'] . "</th>\n";
            echo "<th scope='col'><a href='visitante_view.php?id=" . $row_busca[id_visitante] . "'> <button type='button' class='btn btn-primary' >Alterar</button></a></th>\n";
            echo "</tr>\n";
            echo "</tbody>";
        }
        echo "</table>\n";
    }
    function relatorio_entrada($link, $cpf, $dt_inicial, $dt_final)
    {

        $busca  = "SELECT vi.id_visitante , vi.nome , vi.cpf , mov.dt_movimentacao, mov.id_morador , tpmov.movimentacao , u.usuario FROM tb_visitante as vi INNER JOIN tb_tipo_visita
         as tp ON(vi.id_tipo_visita = tp.id_tipo_visita) 
         INNER JOIN tb_visita_morador as mov on(vi.id_visitante = mov.id_visitante)
         INNER JOIN tb_tp_movimentacao AS tpmov ON (tpmov.id_tp_movimentacao = mov.id_tp_movimentacao) 
          INNER JOIN tb_usuario as u on(u.id_usuario = mov.id_usuario)
           WHERE vi.cpf LIKE '%$cpf%'
            AND mov.dt_movimentacao 
            BETWEEN '$dt_inicial' AND '$dt_final' ORDER BY mov.id_visita_morador ASC ";

        $resultado_movimentacao = mysqli_query($link, $busca);

        echo "<link href='../bootstrap/css/menu.css'  rel='stylesheet'/>";
        echo "<table class='table table-bordered all'  method='GET'>\n";
        echo '<thead class="thead-darks">';
        echo "<tr>\n";
        echo "<th scope='col'>Nome</th>\n";
        echo "<th scope='col'>CPF</th>\n";
        echo "<th scope='col'>Data Movimentação</th>\n";
        echo "<th scope='col'>Movimentação</th>\n";
        echo "<th scope='col'>Cod.Liberação</th>\n";
        echo "<th scope='col'>Usuario</th>\n";
        echo "</tr>\n";
        echo "</thead>\n";
        while ($row_busca = mysqli_fetch_assoc($resultado_movimentacao)) {
            echo "<tbody>";
            echo "<tr>\n";
            echo "<th scope='col'>" . $row_busca['nome'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['cpf'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['dt_movimentacao'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['movimentacao'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['id_morador'] . "</th>\n";
            echo "<th scope='col'>" . $row_busca['usuario'] . "</th>\n";
            echo "</tr>\n";
            echo "</tbody>";
        }
        echo "</table>\n";
    }

    function relatorioMovimentacaoPdf($link, $id_visitante, $dt_inicial, $dt_final)
    {

        $buscaVist = "SELECT * FROM tb_visitante as vis INNER JOIN tb_tipo_visita as tp ON (vis.id_tipo_visita = tp.id_tipo_visita) 
     WHERE vis.id_visitante = '$id_visitante'";

        $resultado_visitante = mysqli_query($link, $buscaVist);
        $visita = mysqli_fetch_array($resultado_visitante);

        $buscaMov = "SELECT vi.id_visitante , vi.nome , vi.cpf , mov.dt_movimentacao, mov.id_morador , tpmov.movimentacao , u.usuario FROM tb_visitante as vi INNER JOIN tb_tipo_visita
     as tp ON(vi.id_tipo_visita = tp.id_tipo_visita) 
     INNER JOIN tb_visita_morador as mov on(vi.id_visitante = mov.id_visitante)
     INNER JOIN tb_tp_movimentacao AS tpmov ON (tpmov.id_tp_movimentacao = mov.id_tp_movimentacao) 
      INNER JOIN tb_usuario as u on(u.id_usuario = mov.id_usuario)
       WHERE vi.id_visitante = '$id_visitante'
        AND mov.dt_movimentacao 
        BETWEEN '$dt_inicial' AND '$dt_final' ORDER BY mov.id_visita_morador ASC ";

        $resultado_movimentacao = mysqli_query($link, $buscaMov);

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', "B", 16);
        $pdf->Cell(190, 10, utf8_decode('Relatorio de movimentação'), 0, 0, "C");
        $pdf->Ln(10);
        $pdf->SetFont('Arial', "I", 12);
        $pdf->Cell(190, 10, utf8_decode('Nome:' . $visita['nome']), 0, 0, "L");
        $pdf->Ln(5);
        $pdf->Cell(190, 10, utf8_decode('Cpf:' . $visita['cpf']), 0, 0, "L");
        $pdf->Ln(5);
        $pdf->Cell(190, 10, utf8_decode('Tipo de visita :' . $visita['tipo_visita']), 0, 0, "L");

        $pdf->Ln(15);
        $pdf->SetFont("Arial", "I", 10);
        $pdf->Cell(50, 7, utf8_decode('Data'), 1, 0, "c");
        $pdf->Cell(50, 7, utf8_decode('Movimentação'), 1, 0, "c");
        $pdf->Cell(50, 7, utf8_decode('Codigo de Liberação'), 1, 0, "c");
        $pdf->Cell(50, 7, "Usuario", 1, 0, "c");
        $pdf->Ln(10);
        while ($row_busca = mysqli_fetch_assoc($resultado_movimentacao)) {
            $dt_mov = new DateTime($row_busca['dt_movimentacao']);
            $dt_movimentacao = $dt_mov->format('d-m-Y H:i:s');

            $pdf->Cell(50, 7, utf8_decode($dt_movimentacao), 0, 0, "c");
            $pdf->Cell(50, 7, utf8_decode($row_busca['movimentacao']), 0, 0, "c");
            $pdf->Cell(50, 7, utf8_decode($row_busca['id_morador']), 0, 0, "c");
            $pdf->Cell(50, 7, utf8_decode($row_busca['usuario']), 0, 0, "c");
            $pdf->Ln(5);
        }

        $pdf->Output(
            $dest = 'D',
            $name = utf8_decode('Relatorio de Movimentação visita.pdf'),
            $isUTF8 = false
        );
    }
}
