<?php

$email_cadastrado = 0;
$registrado_com_sucesso = 0;

if(isset($_POST['submit']))
{

    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nascimento = $_POST['nascimento'];
    $data_criacao = date('d/m/Y');

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";

    $verifica = $conexao -> query($sql);

    if(mysqli_num_rows($verifica) !== 1){

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,senha,nascimento,data_criacao) VALUES ('$nome','$email','$senha','$nascimento','$data_criacao')");
    
        header('Location: index.php');
    }
    else if(mysqli_num_rows($verifica) == 1){
        $email_cadastrado = 1;
    }
}


?>