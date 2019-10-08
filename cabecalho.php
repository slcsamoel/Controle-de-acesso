<?php
session_start();
$usuario = $_SESSION['usuario'];
$id_nivel_acesso = $_SESSION['id_nivel_acesso'];

if($id_nivel_acesso < 2){
  $display ='none';
}else{
  $display ='';
}
?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Barra de navegação aparecera em todas as telas do sistema  -->
    <title>Controle de Acesso</title>
          <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="css/estilo.css" rel="stylesheet">
     
  </head>
  <body>

   <!--Barra navegaçaõ -->
   <nav class="navbar navbar-default">
              <div class="container">
                <div class="navbar-header">
                  <a href="" class="navbar-brand">Controle de Acesso</a>
                </div>
                <div class="collapse navbar-collapse" id="barra-navegacao">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" ><a href="" class="dropdown-toggle" data-toggle="dropdown">Morador <span class="caret"></span> </a>
                        <ul id="lt_morador" class="dropdown-menu">
                        <li><a href="view/buscar_morador_view.php" >Consultar</a></li>   
                        <li <?='style="display:'.$display.'"'?>><a href="view/cadastra_morador_view.php" >Cadastrar</a></li>
                      </ul>
                    </li>

                    </li>
                    <li class="dropdown" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Visitantes
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="view/buscar_visitantes_view.php">Consultar</a></li>   
                        <li><a href="view/cadastra_visitantes_view.php">Cadastrar</a></li>
                      </ul>
                    </li>
                         <li class="dropdown" <?='style="display:'.$display.'"'?>>
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      Funcionario<span class="caret"></span>
                    </a>
                      <ul class="dropdown-menu">
                        <li><a href="view/buscar_funcionario_view.php">Consultar</a></li>   
                        <li><a href="view/cadastra_funcionario_view.php">Cadastrar</a></li>
                      </ul>
                    </li>
                    <li class="dropdown" >
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reservas
                       <span class="caret"></span>
                     </a>
                      <ul class="dropdown-menu">
                        <li><a href="view/buscar_reservas_view.php">Consultar</a></li>   
                        <li><a href="view/cadastra_reserva_view.php">Cadastrar</a></li>
                      </ul>
                    </li>
                    <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" ><a href="" class="dropdown-toggle" data-toggle="dropdown">Relatorios<span class="caret"></span> </a>
                        <ul id="lt_morador" class="dropdown-menu">
                        <li><a href="view/relatorio_morador_view.php"  >Relatorios movimentação de moradores</a></li>   
                        <li><a href="view/relatorio_visitante_view.php">Relatorios movimentação de visitantes</a></li>
                      </ul>
                    </li>

                    <li><a href="view/buscar_apartamento_view.php">Apartamentos</a></li>
                    <li class="dropdown" >
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      Minha Conta  <span class="caret"></span>
                    </a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Editar</a></li>   
                        <li><a href="controller/sair.php">Sair</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>

              </div>  
            </nav>
            <script src="js/jquery-3.4.1.js"></script>
             <script src="bootstrap/js/bootstrap.min.js"></script>
           
      <div id="all">
</div>