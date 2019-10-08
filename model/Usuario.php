
<?php 
require_once('Pessoa.php');

class Usuario extends Pessoa {

    private $usuario;
    private $id ; 
    private $senha;
    private $nivel_acesso; 
    
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;

    }

    public function getSenha()
    {
        return $this->senha;
    }


    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }


    public function getNivel_acesso()
    {
        return $this->nivel_acesso;
    }

 
    public function setNivel_acesso($nivel_acesso)
    {
        $this->nivel_acesso = $nivel_acesso;

        return $this;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }


    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }
    
function cadastra_usuario($link,$senha, $usuario, $nivel_acesso, $id_funcionario){
    $sql = " INSERT INTO tb_usuario(senha,usuario,id_nivel_acesso,id_funcionario,id_status) VAlUES('$senha','$usuario', $nivel_acesso,$id_funcionario,1)";

        $result_isert = mysqli_query($link , $sql);

        if($result_isert){
            echo 'Usuario cadastrado';

        }else{
        echo 'Erro ao fazer cadastro ';
        }
   }
}

?>


