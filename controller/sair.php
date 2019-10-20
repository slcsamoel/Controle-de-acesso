<?php

session_start();

unset($_SESSION['usuario']);
unset($_SESSION['senha']);
unset($_SESSION['id_morador']);

header("Location: ../index.php");

?>