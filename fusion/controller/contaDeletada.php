<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: login.html");
    exit;
}
    require_once '../model/usuarios.php';
    $u = new usuario;
    $u->conectar("fusion_project", "localhost", "root", "");
    if($u->msgErro ==""){
        $senha = addslashes($_POST['password']);
        if($u->verificarSenha($_SESSION['id'], $senha)){
            $u->deletarConta($_SESSION['id']);
        }else{
            echo "Senha incorreta";
        }
    }else{
        echo "Erro: ".$u->msgErro;
    }


?>