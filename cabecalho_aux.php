<?php
session_start();
if (!isset($_SESSION["usuario"]))header("Location: index.php?erro=1");
$id_usuario = $_SESSION["id_usuario"];
$usuario = $_SESSION["usuario"];
$id_nivel_acesso = $_SESSION["id_nivel_acesso"];
?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Barra de navegação aparecera em todas as telas do sistema  -->
    <title>Controle de Acesso</title>

    <!-- Bootstrap -->
    
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
                    <li class="dropdown" ></a>
                        <ul  class="dropdown-menu">
                        <li></li>   
                        <li></li>
                      </ul>
                    </li>

                    </li>
                    <li class="dropdown" >
                    <ul class="dropdown-menu">
                        <li></li>   
                        <li></li>
                      </ul>
                    </li>
                         <li class="dropdown" >
                     
                      <ul class="dropdown-menu">
                        <li></li>   
                        <li></li>
                      </ul>
                    </li>
                    <li class="dropdown" >
                      
                      <ul class="dropdown-menu">
                        <li></li>   
                        <li></li>
                      </ul>  

                    </li>
                    <li><a href="../principal.php">Menu Principal</a></li>
                    
                  </ul>
                </div>

              </div>  
            </nav>
            <script src="js/jquery-3.4.1.js"></script>
             <script src="bootstrap/js/bootstrap.min.js"></script>
           
      <div id="all">
</div>