<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: login.html");
        exit;
    }

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
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="view/css/style-home.css">
</head>
<body>
    <header>
        <h1>Fusion</h1>
        <ul>
            <li><a href="">Músicas</a></li>
            <li><a href="">Filmes</a></li>

        </ul>
        <p>Boa tarde, <?php echo $dado['nickName'] ?></p>
    </header>
    <div class="config">
        <h2>Menu</h2>
        <div class="config-area">
            <div id="img-area">
                <img src="<?php echo $dir . $dado['photo'] ?>" height="250px">
                <p><?php echo $dado['firstName']. " ". $dado['lastName'] ?></p>
            </div>
            <div>
                <ul>
                    <li><a href="account.php">Configurações</a></li>
                </ul>
            </div>
            <p><a href="controller/sair.php">Deslogar</a></p>
        </div>
    </div>
    <div class="txt-busca">
        <p>Qual é a boa de hoje?</p>
        <form action="">
            <input type="search" name="busca" id="busca">
        </form>
    </div>
    <div class="container">
        <p>Últimos acessos</p>
        <div class="cards">
            <div class="carousel" data-flickity='{"cellAlign": "left", "freeScroll": true }'>
                <?php $midias = $u->recuperarDadosMidia();?>
            </div>
        </div>
    </div>
    <div class="container">
        <p>Suas Músicas</p>
        <div class="cards">
            <div class="carousel" data-flickity='{"cellAlign": "left", "freeScroll": true }'>
                <?php $midias = $u->recuperarDadosMidia();?>
            </div>    
        </div>
    </div>
    <div class="container">
        <p>Seus filmes inacabados</p>
        <div class="cards">
            <div class="carousel" data-flickity='{"cellAlign": "left", "freeScroll": true }'>
                <?php $midias = $u->recuperarDadosMidia();?>
            </div>    
        </div>
    </div>
    <div class="container">
        <p>Assista novamente</p>
        <div class="cards">
            <div class="carousel" data-flickity='{"cellAlign": "left", "freeScroll": true }'>
                <?php $midias = $u->recuperarDadosMidia();?>
            </div>    
        </div>
    </div>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
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