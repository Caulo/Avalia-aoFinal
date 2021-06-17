<?php
session_start();
if (! isset($_SESSION["autenticado"])){
    
    header('Location: http://localhost/projeto/');
}


require_once("Banco.php");
require_once("BD/Usuario.php");




$usuario = new Usuario($_POST);

$pdo = new Banco();


$linha = $pdo->exec( $usuario->getDelete() );


header('Location: http://localhost/projeto/consultaUsuario.php');

?>