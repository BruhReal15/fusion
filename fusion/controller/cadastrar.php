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
    
    $firstName = addslashes($_POST['first-name']);
    $lastName = addslashes($_POST['last-name']);
    $email = addslashes($_POST['email']);
    $confirmEmail = addslashes($_POST['confirm-email']);
    $senha = addslashes($_POST['password']);
    $confirmarSenha =addslashes($_POST['confirm-password']);
    $celNumber = addslashes($_POST['cel-number']);
    $birth = addslashes($_POST['idade']);
    $nickName = addslashes($_POST['nickName']);
    $gender = addslashes($_POST['select']);
    $image = 'padrao.png';
    $imageName = $_FILES['image']['name'];
    $imageNameTemp = $_FILES['image']['tmp_name'];
    $imageType = $_FILES['image']['type'];
    $imageExt = substr($imageName, -4, 5);
    $dir = "usuarios/";
    //verificacao se esta vazio por php
        
        $u->conectar("fusion_project", "db-fusion.cb790qtisjin.us-east-1.rds.amazonaws.com", "admin", "12345678");
        if($u->msgErro == ''){ //ok
            if($senha == $confirmarSenha){
                if($email == $confirmEmail){
                    if ( $imageName != NULL ){
                        $image = $email . '.' .  $imageExt;
                        move_uploaded_file( $imageNameTemp, $dir . $image . '.' . $imageExt);
                    }
                    if($u->cadastrar($firstName, $lastName, $email, $senha,$celNumber,$birth, $nickName, $gender, $image)){
                        ?>
                        <div class="msg-erro">cadastrado com sucesso</div> 
                        <?php
                        header("location: ../acesso.php");
                    }else{
                        ?>
                        <div class="msg-erro">Email já cadastrado</div> 
                        <?php
                    }
                }else {
                    ?>
                    <div class="msg-erro">Os emails não correspodem!</div> 
                    <?php
                }
            }else{
                ?>
                <div class="msg-erro">As senhas não correspondem!</div> 
                <?php
            }
        } else{
            echo "Erro :".$u->msgErro;
            ?>
            <div>bosta</div>
            <?php
        }
    
?>
</body>
</html>
