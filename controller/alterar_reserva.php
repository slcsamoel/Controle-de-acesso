<?php
   

require_once('../model/Reserva.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');
session_start();
$id_usuario = $_SESSION['id_usuario'];


$reserva = new Reserva();
$reserva->setId_morador($id_morador = $_POST['id_morador']);
$reserva->setTorre($torre = $_POST['torre']);
$reserva->setId_usuario($id_usuario = $_SESSION['id_usuario']);
$reserva->setEspacos($espacos = $_POST['espacos']);
$reserva->setEvento($evento = $_POST['evento']);
$reserva->setData_reserva($data_reserva = $_POST['data_reserva']);

echo($torre) . "</br>";
echo($espacos) . "</br>";
echo($evento) . "</br>";
echo($id_morador) . "</br>";
echo($data_reserva) . "</br>";
echo($id_usuario) . "</br>";





$reserva->adicionarReserva($link, $id_morador, $torre, $espacos, $evento, $data_reserva, $id_usuario);


?>