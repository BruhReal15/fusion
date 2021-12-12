<?php

class Midia{

    private $pdo;
    public $msgErro = '';

    public function conectar($nome, $host, $usuario, $senha){
        global  $pdo;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch(PDOException $e){
            $msgErro = $e->getMessage();
            echo "Não foi possível conectar ao banco de dados";
        }
    }

    
}

?>