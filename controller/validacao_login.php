<?php
require_once ('../model/Usuario.php');
require_once ('../model/Pessoa.php');
//require_once ('conexao_banco.php');


        $class_usuario = new usuario();

        $class_usuario->setNome($nome = $_POST['usuario']);
        $class_usuario->setSenha($senha = $_POST['senha']);
        

    


?>