<?php
include_once('Pessoa.php');

class Morador extends Pessoa{
    

    private $nome_mae;
    private $nome_pai;
    private $telefone;
    private $placa;
    private $torre;
    private $nr_apartamento;
    private $tipo_morador;

    public function getTipo_morador()
    {
        return $this->tipo_morador;
    }


    public function setTipo_morador($tipo_morador)
    {
        $this->tipo_morador = $tipo_morador;

        return $this;
    }


    public function getNr_apartamento()
    {
        return $this->nr_apartamento;
    }

  
    public function setNr_apartamento($nr_apartamento){
        $this->nr_apartamento = $nr_apartamento;

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


    public function getNome_pai(){
        return $this->nome_pai;
    }


    public function setNome_pai($nome_pai)
    {
        $this->nome_pai = $nome_pai;

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

    public function getPlaca()
    {
        return $this->placa;
    }

  
    public function setPlaca($placa)
    {
        $this->placa = $placa;

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

   
    public function getData_cadastro()
    {
        return $this->data_cadastro;
    }

   
    public function setData_cadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;

        return $this;
    }



    function buscar_morador($link, $id ,$nome){
        $sql = "SELECT * fROM tb_morador  WHERE cpf ='$id' OR LIKE %$nome% ";
        $result_select = mysqli_query($link, $sql);
        if ($result_select) {
          $morador = mysqli_fetch_array($result_select);  
        } else {
            echo  "<script>alert('Erro na Consulta');</script>"; 
        }
        return $morador;
        
      }

      
      function cadastra_morador($link, $nome, $cpf , $dt_nascimento , $sexo , $rg , $telefone,$nome_mae , $nome_pai, $tipo_morador , $id_usuario  ){

        $sql =" INSERT INTO tb_morador(cpf,nome,nome_mae,nome_pai,rg,dt_nascimento,sexo,dt_cadastro,tipo_morador,id_usuario,telefone,id_status)";
       $sql.= "VAlUES('$cpf','$nome', '$nome_mae','$nome_pai','$rg','$dt_nascimento','$sexo','$tipo_morador',$id_usuario,'$telefone', 1)";            
        $result_insert = mysqli_query($link,$sql);
            $cadastrado = false;
        if($result_insert){
            $cadastrado = true;
        }else{
            echo  "<script>alert('Erro na query de cadastro');</script>";
            echo "<script>window.location = '../view/cadastra_Morador_view.php';</script>";

              }
             return $cadastrado;   
    }





}