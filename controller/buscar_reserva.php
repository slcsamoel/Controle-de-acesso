<?php
   

require_once('../model/Reserva.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');
session_start();

$reserva = new Reserva();
$reserva->setTorre($torre = $_POST['torre']);
$reserva->setEspacos($espacos = $_POST['espacos']);
$reserva->setData_reserva($data_reserva = $_POST['dtEvento']);

header("Location: /Controle-de-acesso/view/reservas_view.php?torre=$torre&espacos=$espacos&dtEvento=$data_reserva");


echo($torre) . "</br>";
echo($espacos) . "</br>";
echo($data_reserva) . "</br>";




?>