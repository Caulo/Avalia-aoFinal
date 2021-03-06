<?php
session_start();
require_once("Banco.php");
require_once("BD/Usuario.php");

if (! isset($_SESSION["autenticado"])){
    
    header('Location: http://localhost/projeto/');
}

if (! isset($_GET["id"])) {
    echo '<div class="alert alert-danger" role="alert">
    Falta o id do produto.
        </div>'; 
    die();
}

$pdo = new Banco();

$usuario = new Usuario();
$row = [];
foreach($pdo->query($usuario->getSelectById($_GET["id"])) as $row) {
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Celulares</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="index.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  
  </head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><span class="	glyphicon glyphicon-phone"></span></a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="contato.html">Contato</a></li>
        <li><a href="quemsomos.html">Quem Somos</a></li>
      </ul>
      <form class="navbar-form navbar-left" action="/action_page.php">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="carrinho.html"><span class="	glyphicon glyphicon-shopping-cart"></span></a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
    

  </nav>
  <br>
  
  <div class="container">
        
        <?php
        if (count($row) == 0 ){
            echo '<div class="alert alert-danger" role="alert">
            Este id n??o existe.
                </div>'; 
            die();
        }
        // var_dump($row);die();
        ?>
        <h1>Deseja  realmente excluir este usu??rio ?</h1>
        <br><br>
        <?php
        echo '
        <section class="content-section text-center">
    <div class="contact-section">
        <div class="container">
            <br>
            
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="excluir.php" method="post"  class="form-horizontal">
                    <input type="hidden" name="id" value="'.$row['id'].'" >
                        <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                         name="email" value="'.$row['email'].'" disabled
                        >
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Senha</label>
              <input type="text" class="form-control" id="exampleFormControlInput1"
               name="password" value="'.$row['password'].'" disabled
              >
                        </div>
                       
                        <br>
                        <div class="row">
                        <div class="col">
                           <a class="btn btn-danger" href="consultaUsuario.php" role="button">N??o</a>
                           <input type="submit" value="Sim" class="btn btn-success" role="button">
                        </div>
                        <br>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>
        ';

        ?>
    

    <br><br>
    </div>

    <script>
        
    </script>
    
 
    <br>
    <div>
    <footer class="footer">
	  <div class="container">
		<div class="col-sm-4">
			<div class="row">
				<ul class="footerAccess">
					<li><i class="fa fa-angle-double-right icon-link" aria-hidden="true"></i><a href="index.html" class="footer-link">Home</a></li>
					<li><i class="fa fa-angle-double-right icon-link"	aria-hidden="true"></i><a href="quemsomos.html"class="footer-link"> Quem Somos</a></li>
					<li><i class="fa fa-angle-double-right icon-link"	aria-hidden="true"></i><a href="contato.html"class="footer-link"> Contato</a></li>
					<li><i class="fa fa-angle-double-right icon-link"	aria-hidden="true"></i><a href="carrinho.html" class="footer-link"> Carrinho</a></li>
					<li><i class="fa fa-angle-double-right icon-link"	aria-hidden="true"></i><a href="login.php" class="scroll"	class="footer-link"> Login</a></li>
				
				</ul>
				
			</div>
		</div>
		<div class="col-sm-4">
			<div class="row">
				<h3>Social</h3>
				<div>
					<a href="#"><i class="fa fa-facebook-official" style="font-size:24px" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-pinterest-square" style="font-size:24px" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-telegram" style="font-size:24px" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-twitter-square" style="font-size:24px" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-youtube-play" style="font-size:24px" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-google-plus-official-play" style="font-size:24px" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" style="font-size:24px" aria-hidden="true"></i></a>
				</div>
                
			</div>
		</div>
        <div class="col-sm-4">
			<div class="row">
				<h3>Formas de Pagamento</h3>
				<div>
					<i class="fa fa-cc-amex" style="font-size:24px" aria-hidden="true"></i>
                    <i class="fa fa-cc-diners-club" style="font-size:24px" aria-hidden="true"></i>
                    <i class="fa fa-cc-mastercard" style="font-size:24px" aria-hidden="true"></i>
					<i class="fa fa-cc-paypal" style="font-size:24px" aria-hidden="true"></i>
                    <i class="fa fa-cc-visa" style="font-size:24px" aria-hidden="true"></i>
                   
				</div>
			</div>
		</div>

    <div class="col-sm-4">
			<div class="row">
				<h3>Telefones para Contato</h3>
				<div>
					<p>Rio de Janeiro: (21) 9 9999-9999</p>
          <p>Outras Cidades (21) 9 9999-9999</p>
                   
				</div>
			</div>
		</div>

		
	  </div>
    
                  
        </div>
               
     </div> 
      
	</footer>
    <div
    style="padding: 10px; background-color: black; color: lightgray; font-family: Aldrich; text-align: center; font-size: 150%;">
    <p style="margin: 0;">
        ?? Copyright 2021 <a style="color: white; font-family: Aldrich;"></a>
            
    </p>
  </div>
</body>
</html>
