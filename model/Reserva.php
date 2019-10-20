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
                $query = mysqli_query($link, "SELECT * FROM tb_reserva WHERE dt_reserva = '$this->data_reserva' AND id_espaco = '$this->espacos'");
                $numDt = mysqli_num_rows ($query);  


               if($numDt > 0)
               {
                       echo('Já existe uma reserva feita pra essa data');
               }else
               {      
                       mysqli_query($link, "INSERT INTO tb_reserva (id_reserva, dt_reserva ,id_espaco ,id_morador,  id_bloco , evento, id_usuario, id_status_reserva) 
                                            VALUES(DEFAULT, '$this->data_reserva' , $this->espacos , '$this->id_morador','$this->torre', '$this->evento', '$this->id_usuario', 1)");

                       header("Location: /Controle-de-acesso/principal.php"); 
               }  
        }

        public function alterarReserva($link, $id_reserva, $id_morador, $torre, $espacos, $evento, $data_reserva, $id_usuario, $status_reserva){

                mysqli_query($link, "UPDATE tb_reserva SET dt_reserva = '$this->data_reserva', id_espaco = $this->espacos,
                                id_morador = $this->id_morador, id_bloco = $this->torre, evento = '$this->evento',
                                 id_usuario = $this->id_usuario, id_status_reserva = $this->status_reserva WHERE id_reserva = $this->id_reserva");

                                 header("Location: /Controle-de-acesso/principal.php"); //Após altera a reserva coloque a pagina pra onde quer redirecionar - coloquei a principal pq não sei qual era
        }

        


       

 
        

        
        
    }