<?php
session_start();
require_once('../model/Funcionario.php');
require_once('../model/Pessoa.php');
require_once('../controller/conexao_banco.php');
$class_funcionario = new Funcionario();
$class_funcionario->setNome($nome = $_POST['nome']);
$class_funcionario->setCpf($cpf = $_POST['cpf']);
$class_funcionario->setDt_nascimento($dt_nascimento = $_POST['dt_nascimento']);
$class_funcionario->setSexo($sexo = $_POST['sexo']);
$class_funcionario->setRg($rg = $_POST['rg']);
$class_funcionario->setTelefone($telefone = $_POST['telefone']);
$class_funcionario->setTurno($turno = $_POST['turno']);
$class_funcionario->setId_funcao($id_funcao = $_POST['id_funcao']);


//Select inicial para a verificação si o funcionario já existe na base de dados 
$sql = "SELECT * fROM tb_funcionario  WHERE cpf ='$cpf' AND id_status= 1 ";
$result_select = mysqli_query($link, $sql);
$verificaCpf    = mysqli_num_rows($result_select);

//verificando caso já exista o funcionario apresenta a mensagem e redireciona para tela de cadastro novamente 
if ($verificaCpf > 0) {
    echo  "<script>alert('Já possui uma funcionario com esse CPF cadastrado!');</script>";
    echo "<script>window.location = '../view/cadastra_funcionario_view.php';</script>";
} else {
    // caso não é executada a  função cadastra_funcionario 
    $cadastra=$class_funcionario->cadastra_funcionario($link, $nome, $cpf, $dt_nascimento, $sexo, $rg, $telefone, $turno, $id_funcao);

    if ($cadastra) {
        $dados_funcionario = $class_funcionario->buscar_funcionario($link, $cpf);
        $id_funcionario = $dados_funcionario['id_funcionario'];

        // capturando a extenção da imagem 
        $extensao = explode('.', $_FILES['imagem']['name']);
        $extensao = strtolower(end($extensao));
        //convertendo a data do momento da inserção de imagem para md5 sera usada como nome da imagem 
        //e conctenado com a extenção  
        $imagem = md5(time()) . $extensao;
        $diretorio = '../fotos_funcionarios/';

        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $imagem);

        $sql_foto = "INSERT INTO tb_img_funcionario(imagem ,id_funcionario)VALUES('$imagem',$id_funcionario)";
        $result_foto = mysqli_query($link, $sql_foto);
        if ($result_foto) {
            header("Location: /Controle-de-acesso/view/funcionario_view.php?id=$id_funcionario");
        } else {
            echo  "<script>alert('Erro ao cadastrar fotos');</script>";
            echo "<script>window.location = '../view/cadastra_funcionario_view.php';</script>";
        }
    } else {
        echo  "<script>alert('Erro ao efetuar cadastro');</script>";
        echo "<script>window.location = '../view/cadastra_funcionario_view.php';</script>";
    }
}
