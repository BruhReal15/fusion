<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: login.html");
        exit;
    }
?>
<?php
    require_once 'model/usuarios.php';
    $u = new usuario;
    $dir = "controller/usuarios/";

    $u->conectar("fusion_project", "localhost", "root", "");
    if($u->msgErro ==""){           
        $dado = $u->recuperarDadosUsuarios($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fusion</title>
    <link rel="stylesheet" href="view/css/style-config.css">
    
</head>
<body>
    <header>
        <h1>Fusion</h1>
        <nav>
            <ul>
                <li><a href="">Suporte</a></li>
                <li><a href="acesso.php">Inicio</a></li>
                <li><?php
                        echo $dado['nickName'];
                    ?>
                </li>
            </ul>
        </nav>
    </header>
    <section class="container">
        <div class="menu">
            <div class="photo-name">
                <img src="<?php echo $dir . $dado['photo'] ?>" height="250px">
                <h2><?php echo $dado['firstName']. " ". $dado['lastName'] ?></h2>

            </div>
            <div class="btns">
                <hr>
                <a href=""><p class="on">Visão Geral</p></a>
                <hr>
                <a href="alterarApelido.php"><p>Alterar apelido</p></a>
                <hr>
                <a href="alterarSenha.php"><p>Trocar senha</p></a>
                <hr>
                <a href=""><p>Planos Disponíveis</p></a>
                <hr>
                <a href=""><p>Configurações de pagamento</p></a>
                <hr>
            </div>
            <div class="delete">
                <a href="deletarConta.php"><p>Excluir conta</p></a>
            </div>
        </div>
        
        <div class="info">
            <h2>Visão geral</h2>
            <div class="info-box">
                <p class="info-title">Apelido</p>
                <div class="item">
                    <p>
                        <?php
                        echo $dado['nickName'];
                        ?>
                    </p>
                </div>
            </div>
            <div class="info-box">
                <p class="info-title">Nome</p>
                <div class="item">
                    <p>
                        <?php
                        echo $dado['firstName'].' '. $dado['lastName'];
                        ?>
                    </p>
                </div>
            </div>
            <div class="info-box">
                <p class="info-title">telefone</p>
                <div class="item">
                    <p>
                        <?php
                        echo $dado['celNumber'];
                        ?>
                    </p>
                </div>
            </div>
            <div class="info-box">
                <p class="info-title">Email</p>
                <div class="item">
                    <p>
                        <?php
                        echo $dado['email'];
                        ?>
                    </p>
                </div>
            </div>
            <div class="info-box">
                <p class="info-title">Data de nascimento</p>
                <div class="item">
                    <p>
                        <?php
                        echo date("d/m/Y", strtotime($dado['birth']));
                        ?>
                    </p>
                </div>
            </div>
            <div class="info-box">
                <p class="info-title">Gênero</p>
                <div class="item">
                    <p>
                        <?php
                        if($dado['gender'] == 'M')
                            echo 'Masculino';
                        else if ($dado['gender'] == "F")
                            echo 'Feminino';
                        else
                            echo 'Outro';
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
        
<?php
    }else{
        ?>
            <div class="msg-erro">Erro com o banco de dados!</div>
            <?php
            echo "Erro: ".$u->msgErro;
    }

?>
