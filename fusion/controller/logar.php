<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processamento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    


<?php
    require_once '../model/usuarios.php';
    $u = new usuario;
    
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    $u->conectar("fusion_project", "localhost", "root", "");
    if($u->msgErro ==""){
        if($u->logar($email, $senha)){
            header("location: ../acesso.php");
        }else{
            ?>
            <div class="msg-erro">Email e/ou senha estão errados!</div>
            <?php
        }
    }else{
        ?>
            <div class="msg-erro">Erro com o banco de dados!</div>
            <?php
            echo "Erro: ".$u->msgErro;
    }
?>