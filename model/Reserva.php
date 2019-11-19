<?php 
require_once('../controller/conexao_banco.php');

    class Reserva 
    {
        private $id_reserva;
        private $id_morador;
        private $id_usuario;
        private $torre;
        private $espacos;
        private $evento;
        private $data_reserva;   
        private $status_reserva;  

 
        public function getId_reserva()
        {
                return $this->id_reserva;
        }

        
        public function setId_reserva($id_reserva)
        {
                $this->id_reserva = $id_reserva;

                return $this;
        }

         
        public function getId_morador()
        {
                return $this->id_morador;
        }

        
        public function setId_morador($id_morador)
        {
                $this->id_morador = $id_morador;

                return $this;
        }

         
        public function getTorre()
        {
                return $this->torre;
        }

        
        public function setTorre($torre)
        {
                $this->torre = $torre;

                return $this;
        }

         
        public function getEspacos()
        {
                return $this->espacos;
        }

         
        public function setEspacos($espacos)
        {
                $this->espacos = $espacos;

                return $this;
        }

        
        public function getEvento()
        {
                return $this->evento;
        }

        
        public function setEvento($evento)
        {
                $this->evento = $evento;

                return $this;
        }

         
        public function getData_reserva()
        {
                return $this->data_reserva;
        }

       
        public function setData_reserva($data_reserva)
        {
                $this->data_reserva = $data_reserva;

                return $this;
        }
        public function getId_usuario()
        {
                return $this->id_usuario;
        }

       
        public function setId_usuario($id_usuario)
        {
                $this->id_usuario = $id_usuario;

                return $this;
        }

        public function getStatus_reserva()
        {
                return $this->status_reserva;
        }

        
        public function setStatus_reserva($status_reserva)
        {
                $this->status_reserva = $status_reserva;

                return $this;
        }

        public function adicionarReserva($link, $id_morador, $torre, $espacos, $evento, $data_reserva, $id_usuario )
        {       
                $query = mysqli_query($link, "SELECT MAX(id_reserva) FROM tb_reserva WHERE dt_reserva = '$this->data_reserva' AND id_espaco = '$this->espacos'");// Pega o ultimo registro com essa data e salão
                $numeroRegistro = mysqli_query($link, "SELECT * FROM tb_reserva WHERE dt_reserva = '$this->data_reserva' AND id_espaco = '$this->espacos'");
                $numDt = mysqli_num_rows ($numeroRegistro); // Verifica qaultas linha existem com  
                $row_busca = mysqli_fetch_assoc($query);
                $id = $row_busca["MAX(id_reserva)"];

                echo($numDt);
                $query2 = mysqli_query($link, "SELECT id_status_reserva FROM tb_reserva WHERE id_reserva = '$id'");
                $row_busca2 = mysqli_fetch_assoc($query2);


               if($numDt > 0 && $row_busca2['id_status_reserva'] == 1)
               {
                       echo('Já existe uma reserva feita pra essa data');
               }elseif($numDt == 0 || $row_busca2['id_status_reserva'] == 2)
               {      
                       mysqli_query($link, "INSERT INTO tb_reserva (id_reserva, dt_reserva ,id_espaco ,id_morador,  id_bloco , evento, id_usuario, id_status_reserva) 
                                            VALUES(DEFAULT, '$this->data_reserva' , $this->espacos , '$this->id_morador','$this->torre', '$this->evento', '$this->id_usuario', 1)");

                       header("Location: /Controle-de-acesso/principal.php"); 
               }  
        }

        public function alterarReserva($link, $id_reserva, $id_morador, $torre, $espacos, $evento, $data_reserva, $id_usuario, $status_reserva){


                $ativo = mysqli_query($link, "SELECT id_status_reserva FROM tb_reserva WHERE dt_reserva = '$this->data_reserva' AND id_espaco = '$this->espacos' AND id_status_reserva = 1 AND id_reserva <> '$this->id_reserva'");
                $numDt = mysqli_num_rows ($ativo);
                echo($numDt);

                
                if($numDt > 0)
                {
                    echo("Já existe uma reserva ativa");
                }else
                {
                    mysqli_query($link, "UPDATE tb_reserva SET dt_reserva = '$this->data_reserva', id_espaco = $this->espacos,
                                         id_morador = $this->id_morador, id_bloco = $this->torre, evento = '$this->evento',
                                         id_usuario = $this->id_usuario, id_status_reserva = $this->status_reserva WHERE id_reserva = $this->id_reserva");

                    header("Location: /Controle-de-acesso/principal.php"); //Após altera a reserva coloque a pagina pra onde quer redirecionar - coloquei a principal pq não sei qual era
                }
                
        
        }




        public function buscaReserva($link, $espacos, $data_reserva)
        {
                $busca  = "SELECT id_reserva, descricao_bloco, descricao_espaco, res.id_morador, nome, evento, dt_reserva, status_reserva FROM tb_reserva AS res
                INNER JOIN tb_espacos ON (res.id_espaco = id_espacos) 
                INNER JOIN tb_morador AS tbMorador  ON (res.id_morador = tbMorador.id_morador)
                INNER JOIN tb_bloco AS tbBloco ON (res.id_bloco = tbBloco.id_bloco) 
                INNER JOIN tb_status_reserva AS tbStatus ON (res.id_status_reserva = tbStatus.id_status_reserva) 
                WHERE  id_espaco = '$espacos'
                AND   dt_reserva = '$data_reserva' 
                ORDER BY id_reserva ";

                
                $resultado_busca = mysqli_query($link, $busca);


                echo"<link href='../bootstrap/css/menu.css'  rel='stylesheet'/>";
                echo "<table class='table table-bordered all'  method='GET'>\n";
                        echo '<thead class="thead-darks">';
                        echo "<tr>\n";
                        echo "<th scope='col'>Cod. Reserva</th>\n";
                        echo "<th scope='col'>Data Reserva</th>\n";   
                        echo "<th scope='col'>Espaço</th>\n";
                        echo "<th scope='col'>Morador</th>\n";
                        echo "<th scope='col'>Evento</th>\n";
                        echo "<th scope='col'>Bloco</th>\n";
                        echo "<th scope='col'>Status</th>\n";  
                        echo "<th scope='col'>Ação</th>\n";
                        echo "</tr>\n";  
                        echo "</thead>\n";        
                while($row_busca = mysqli_fetch_assoc($resultado_busca)){ 
                        echo "<tbody>";
                        echo "<tr>\n";
                                echo "<th scope='col'>".$row_busca[id_reserva]."</th>\n";
                                echo "<th scope='col'>".date('d/m/Y', strtotime($row_busca['dt_reserva']))."</th>\n";  
                                echo "<th scope='col'>".$row_busca['descricao_espaco']."</th>\n"; 
                                echo "<th scope='col'>".$row_busca['nome']."</th>\n"; 
                                echo "<th scope='col'>".$row_busca['evento']."</th>\n"; 
                                echo "<th scope='col'>".$row_busca['descricao_bloco']."</th>\n";
                                echo "<th scope='col'>".$row_busca['status_reserva']."</th>\n";                       
                                echo "<th scope='col'><a href='reservas_view.php?id=".$row_busca[id_reserva]."'> <button type='button' class='btn btn-primary' >Alterar</button></a></th>\n";
                        echo "</tr>\n";  
                        echo "</tbody>"; 
                }echo "</table>\n"; 
        }

        


       

 
        

        
        
    }