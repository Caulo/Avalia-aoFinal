<?php
session_start();
if (! isset($_SESSION["autenticado"])){
    
    header('Location: http://localhost/projeto/');
}


require_once("Banco.php");
require_once("BD/Usuario.php");


var_dump($_POST);

$usuario = new Usuario($_POST);

$pdo = new Banco();

$linha = $pdo->exec( $usuario->getInsert() );

if ($linha > 0 ) {
    header('Location: http://localhost/projeto/incluirUsuario.php?ok=1');
}else{
    echo "erro";
}

?>