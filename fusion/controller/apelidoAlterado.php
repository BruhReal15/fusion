<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: login.html");
        exit;
    }
    require_once '../model/usuarios.php';
    $u = new usuario;
    $dir = "controller/usuarios/";
    $u->conectar("fusion_project", "localhost", "root", "");
    if($u->msgErro ==""){
        $novoApelido = addslashes($_POST['apelido']);
        $u->trocarApelido($_SESSION['id'], $novoApelido);
        header("location: ../account.php");
    }else{
            echo "Erro: ".$u->msgErro;
    }
?>