<!doctype html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Incluindo framework Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/modern-business.css" rel="stylesheet">
   
    <link href="css/estilo.css" rel="stylesheet">

    <link href="css/login.css" rel="stylesheet" type="text/css">
 
</head>

<body >
    <div class="container">
        <div class="card card-container">
            <h2> YES BURITI</h2>
           
            <img id="logo" class="profile-img-card" src="imagens/logo.jpeg" />
                <p id="profile-name" class="profile-name-card"></p> 
      
                <form id="form_login" class="form-signin" action="controller/validacao_login.php" method="post" enctype="multipart/form-data">
                <!--<span id="reauth-email" class="reauth-email"></span>-->
                <input id="usuario" type="text" name="usuario" class="form-control" placeholder=" usuario" required autofocus>
                <input id="senha" type="password" name="senha" class="form-control" placeholder=" Senha" required>
               
             <button id="entrar" class="btn btn-lg btn-primary btn-block btn-signin" type="submit" value="Entrar">Entrar</button>
            </form><!-- Fim do For -->
          
        </div><!-- /card-container -->
   
   	<hr>
   
    </div><!-- /container -->
    
    <!-- Footer -->
        <footer style="background:none;">
            <div class="row">
                <div class="col-lg-12">
                   <p><center><span style="color:#848688">
                    Copyright &copy; Condomínio Yes Buriti - 
                    <span style="color:#848688; font-size:10px;">web: </span>
                    <i style="color:#848688; font-size:10px;">versão 1.0</i>
                    </center>
                    </p>
                      
                </div>
            </div>
        </footer>

</body>

</html>



