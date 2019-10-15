<?php
session_start();
require_once('../model/Morador.php');
require_once('../model/Pessoa.php');
require_once('../model/Apartamento.php');
require_once('../model/Veiculo.php');
require_once('../controller/conexao_banco.php');
//require_once('../controller/buscar_morador.php');
$id_usuario = $_SESSION['id_usuario'];
$class_morador = new Morador();
$class_apartamento = new Apartamento();
$class_veiculo = new Veiculo();

$class_morador->setNome($nome = $_POST['nome']);
$class_morador->setCpf($cpf = $_POST['cpf']);
$class_morador->setDt_nascimento($dt_nascimento = $_POST['dt_nascimento']);
$class_morador->setSexo($sexo = $_POST['sexo']);
$class_morador->setRg($rg = $_POST['rg']);
$class_morador->setTelefone($telefone = $_POST['telefone']);
$class_morador->setNome_mae($nome_mae = $_POST['nome_mae']);
$class_morador->setNome_pai($nome_pai = $_POST['nome_pai']);
$class_morador->setTipo_morador($tipo_morador = $_POST['tipo_morador']);
$class_apartamento->setId_bloco($id_bloco = $_POST['id_bloco']);
$class_apartamento->setNr_apartamento($nr_apartamento = $_POST['nr_apartamento']);
$class_veiculo->setPlaca($placa=$_POST['placa']);
$class_veiculo->setDescricao_veiculo($descricao_veiculo = $_POST['descricao_veiculo']);

$apartamento = $class_apartamento->buscarApartamento($link, $nr_apartamento, $id_bloco);
$id_apartamento = $apartamento['id_apartamento'];

//inserindo 

//verificando si o morador a ser cadastrado já existe 
$sql = "SELECT * fROM tb_morador  WHERE cpf ='$cpf' AND id_status= 1 ";
$result_select = mysqli_query($link, $sql);

$verificaCpf   = mysqli_num_rows($result_select);
// verificando caso seja maior que zero significar que o cpf inserido já existe na base de dados  
if ($verificaCpf > 0) {
    echo  "<script>alert('Já possui uma Morador com esse CPF cadastrado!');</script>";
    echo "<script>window.location = '../view/cadastra_morador_view.php';</script>";
} else {

    $cadastrado = $class_morador->cadastra_morador($link, $nome, $cpf, $dt_nascimento, $sexo, $rg, $telefone, $nome_mae, $nome_pai, $tipo_morador, $id_usuario, $id_apartamento);

        //si morador foi cadastrado ira inseri a imagem nos scripts abaixo 
    if ($cadastrado) {
        //inserindo imagem 
        $dados_morador = $class_morador->buscar_cadastro($link, $cpf);
        $id_morador = $dados_morador[id_morador];
        if(isset($placa)||isset($descricao_veiculo)){
         $class_veiculo->cadastraveiculo($link,$id_morador,$placa,$descricao_veiculo); 
        }
 
        //verificando si a imagem foi inserida 
       
            // capturando a extenção da imagem 
            $extensao = explode('.', $_FILES['imagem']['name']);
            $extensao = strtolower(end($extensao));
            //convertendo a data do momento da inserção de imagem para md5 sera usada como nome da imagem 
            //e conctenado com a extenção  
            $imagem = md5(time()) . $extensao;
            $diretorio = '../fotos_moradores/';

            move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$imagem);

            $sql_foto = "INSERT INTO tb_img_morador(imagem , id_morador)VALUES('$imagem',$id_morador)";
            $result_foto = mysqli_query($link, $sql_foto);

            if ($result_foto) {
                echo  "<script>alert('Cadastro Efetuado com sucesso');</script>";
                header("Location: /Controle-de-acesso/view/morador_view.php?id=$id_morador");
            } else {

                echo  "<script>alert('Erro ao efetuar cadastro');</script>";
                echo "<script>window.location = '../view/cadastra_morador_view.php';</script>";
            }
        } else {

            echo  "<script>alert('Erro ao efetuar cadastro');</script>";
            echo "<script>window.location = '../view/cadastra_morador_view.php';</script>";
        }
    }

