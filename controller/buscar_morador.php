<?php
require_once('../model/Morador.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');


$class_morador = new Morador();
$class_morador->setId($id = $_POST['id']);
$class_morador->setNome($nome = $_POST['nome']);


if(isset($id) || isset($nome)){


}else{

    
}

   


    



