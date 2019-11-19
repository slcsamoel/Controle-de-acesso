<?php
require_once('../controller/conexao_banco.php');

class Apartamento{

    private $nr_apartamento;
    private $id_bloco;

    public function getNr_apartamento()
    {
        return $this->nr_apartamento;
    }

 
    public function setNr_apartamento($nr_apartamento)
    {
        $this->nr_apartamento = $nr_apartamento;

        return $this;
    }

 
    public function getId_bloco()
    {
        return $this->id_bloco;
    }

    public function setId_bloco($id_bloco)
    {
        $this->id_bloco = $id_bloco;

        return $this;
    }

    public function buscarApartamento($link,$nr_apartamento , $id_bloco){

        $sql = "SELECT * fROM tb_apartamento  WHERE nr_apartamento = $nr_apartamento AND id_bloco = $id_bloco
         ";
        $result_select = mysqli_query($link, $sql);
    if($result_select){
         $apartameto = mysqli_fetch_array($result_select);

    }else{
        echo  "<script>alert('Não foi possivel localizar o apartamento Verificar dados informados');</script>"; 
        
    } 

    return $apartameto;

    }    


    public function buscaMorardorPorApartamento($link, $numeroAp, $bloco)
    {
        

        $busca  = "SELECT id_morador, nome, dt_cadastro, tm.tipo_morador, telefone, nr_apartamento, descricao_bloco, ap.id_apartamento, st.status FROM tb_apartamento AS ap
                    INNER JOIN tb_morador AS morador ON (morador.id_apartamento = ap.id_apartamento) 
                    INNER JOIN tb_bloco AS bloco ON (bloco.id_bloco = ap.id_bloco) 
                    INNER JOIN tb_tipo_morador AS tm ON (tm.id_tipo_morador = morador.id_tipo_morador) 
                    INNER JOIN tb_status AS st ON (st.id_status = morador.id_status) 
                    WHERE  nr_apartamento = '$numeroAp'
                    AND   ap.id_bloco = '$bloco'
                    ORDER BY id_morador ";
                
                $resultado_busca = mysqli_query($link, $busca);

                echo"<link href='../bootstrap/css/menu.css'  rel='stylesheet'/>";
                echo "<table class='table table-bordered all'  method='GET'>\n";
                        echo '<thead class="thead-darks">';
                        echo "<tr>\n";
                        echo "<th scope='col'>Cod.</th>\n";
                        echo "<th scope='col'>Nome</th>\n";   
                        echo "<th scope='col'>Telefone</th>\n";
                        echo "<th scope='col'>Residente</th>\n";
                        echo "<th scope='col'>Nº Ap.</th>\n";
                        echo "<th scope='col'>Bloco</th>\n";
                        echo "<th scope='col'>Data Residente</th>\n";  
                        echo "<th scope='col'>Status</th>\n";  
                        echo "<th scope='col'>Ação</th>\n";
                        echo "</tr>\n";  
                        echo "</thead>\n";        
                while($row_busca = mysqli_fetch_assoc($resultado_busca)){ 
                        echo "<tbody>";
                        echo "<tr>\n";
                                echo "<th scope='col'>".$row_busca[id_morador]."</th>\n";
                                echo "<th scope='col'>".$row_busca['nome']."</th>\n";  
                                echo "<th scope='col'>".$row_busca['telefone']."</th>\n"; 
                                echo "<th scope='col'>".$row_busca['tipo_morador']."</th>\n"; 
                                echo "<th scope='col'>".$row_busca['nr_apartamento']."</th>\n"; 
                                echo "<th scope='col'>".$row_busca['descricao_bloco']."</th>\n";
                                echo "<th scope='col'>".date('d/m/Y', strtotime($row_busca['dt_cadastro']))."</th>\n";  
                                echo "<th scope='col'>".$row_busca['status']."</th>\n";                      
                                echo "<th scope='col'><a href='morador_view.php?id_morador=".$row_busca[id_morador]."'> <button type='button' class='btn btn-primary' >Alterar</button></a></th>\n";
                        echo "</tr>\n";  
                        echo "</tbody>"; 
                }echo "</table>\n"; 
    }


}