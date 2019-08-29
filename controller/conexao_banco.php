<?php

$link = mysqli_connect("localhost", "root", "", "mydb"); // Conecta com o banco de dados

if(!$link){
    try{	
        throw new Exception('Erro ao se conectar com banco');
     }catch (Exception $e){
        echo $e->getMessage();
     }
}


