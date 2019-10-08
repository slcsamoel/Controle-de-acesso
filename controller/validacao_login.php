<?php
    session_start();
require_once('../model/Usuario.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');
$class_usuario = new Usuario();
$class_usuario->setNome($nome = $_POST['usuario']);
$class_usuario->setNome($senha = $_POST['senha']);
    function logar($link, $nome, $senha){
        $resultado = mysqli_query($link, "SELECT usuario , senha , id_nivel_acesso, id_usuario FROM tb_usuario WHERE usuario = '".$nome."' AND senha = '".$senha."'");
        
        if($resultado){//lOGIN COM SUCESSO

            $dados_usuario = mysqli_fetch_array($resultado);

            if(isset($dados_usuario['usuario'])){ // verificar si foi retornado um usuario 
                $_SESSION["id_usuario"] = $dados_usuario['id_usuario'];
                $_SESSION["usuario"]  = $dados_usuario['usuario'];
                $_SESSION["id_nivel_acesso"]    = $dados_usuario['id_nivel_acesso'];
                header("Location:../principal.php");
        }else{

            header("Location: ../index.php?erro=1");
        }

        }else{ 
            echo('Não foi possivel fazer o login');
        }   
}
logar($link, $nome, $senha);

?>