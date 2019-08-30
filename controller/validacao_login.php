<?php
require_once ( ' ../model/Usuario.php ' );
require_once ( ' ../model/Pessoa.php ' );
require_once ( ' ../controller/conexao_banco.php ' );
$ class_usuario  =  novo  Usuario ();
$ class_usuario -> setNome ( $ nome  =  $ _POST [ ' usuario ' ]);
$ class_usuario -> setNome ( $ senha  =  $ _POST [ ' senha ' ]);
    função  logar ( $ link , $ nome , $ senha ) {
        $ resultado  =  mysqli_query ( $ link , " SELECT usuario e senha FROM tb_usuario WHERE usuario =  ' " . $ nome . " ' AND senha = ' " . $ senha . " ' " );
        
        if (mysqli_num_rows ( $ resultado ) >  0 ) { / / lOGIN COM SUCESSO
            cabeçalho ( ' localização: ../principal.php ' );
            eco ( ' Logado ' );
        } mais {
            echo ( ' não ' );
        }   
}
logar ( $ link , $ nome , $ senha );


?>