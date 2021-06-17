<?php
session_start();

require_once("Banco.php");

$email = $_GET['email'];
$senha = $_GET['senha'];

$pdo =  new Banco();


$sql = "SELECT * from usuario where email ='$email' and password ='$senha' ";
$result = $pdo->query($sql);


if (empty($result->rowCount())) {
    unset($_SESSION["autenticado"]);
   header('Location: http://localhost/projeto/login.php');
}else{
    $_SESSION["autenticado"]=true;
     header('Location: http://localhost/projeto/cadastro.php');
}


?>