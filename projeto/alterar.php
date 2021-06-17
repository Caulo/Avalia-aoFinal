<?php
session_start();
if (! isset($_SESSION["autenticado"])){
    
    header('Location: http://localhost/projeto/');
}


require_once("Banco.php");
require_once("BD/Usuario.php");




$usuario = new Usuario($_POST);

$pdo = new Banco();

//var_dump($usuario->getUpdate());die();
$linha = $pdo->exec( $usuario->getUpdate() );

if ($linha > 0 ) {
    header('Location: http://localhost/projeto/editarUsuario.php?ok=1&id='.$_POST['id']);
}else{
    header('Location: http://localhost/projeto/editarUsuario.php?ok=2'.$_POST['id']);
}

?>