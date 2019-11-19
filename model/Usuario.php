
<?php 
require_once('Pessoa.php');

class Usuario extends Pessoa {

    private $usuario;
    private $id_funcionario ; 
    private $senha;
    private $nivel_acesso; 
    
    public function setId_funcionario($id_funcionario){
        $this->id_funcionario = $id_funcionario;
        return $this;
    }

    public function getId_funcionario(){
        return $this->id_funcionario;

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
            echo  "<script>alert('Usuario cadastrado com sucesso!');</script>"; 
            echo "<script>window.location='../View/funcionario_view.php?id=".$id_funcionario."'</script>";  
        }else{
            echo  "<script>alert('Erro ao cadastrar!');</script>"; 
            echo "<script>window.location = '../View/funcionario_view.php?id=".$id_funcionario."</script>";     
        }                 
   }

function alterar_senha($link , $senha , $id_usuario){
    mysqli_query($link," UPDATE `tb_usuario` SET `senha`='$senha' WHERE id_usuario = '$id_usuario' ");
    echo  "<script>alert('Senha alterada com sucesso!');</script>"; 
    echo "<script>window.location = '../principal.php';</script>";  
}


}

?>


