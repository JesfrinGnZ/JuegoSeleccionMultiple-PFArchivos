<?php
  //si no esta logueado mandarlo al index principal

  session_start();  if (!isset($_SESSION["logueado"])){ header("Location:../index.php"); exit(); }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styleInicio.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"/>
	<title> Preguntas </title>
</head>
<body background="img/fondo.jpg">

	<!--Menu de navegacion navbar---->
	<div class="">
		<header>
			<nav class="navbar navbar-default navbar-static-top navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
							<span class="sr-only"> Menu </span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a href="index.php" class="navbar-brand"> <h4>Inicio || Athziri</h4> </a>
					</div>

					<div class="collapse navbar-collapse" id="navbar-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="salir.php"><h5>Cerrar Sesion</h5></a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
	</div>
				<footer>
					<div class="container">
						<center> <h5> Copyright &copy;</h5> </center>
					</div>
				</footer>

        <?php
            //include("../conexion.php");
            include("funciones.php");
            //echo "<h1>uno</h1>";
            $user = "bryan";
            $pass = "bryan1234";
            $resultado =  $conexion->query("select * from ADMINISTRADOR where User = '$user' AND Pass='$pass' LIMIT 1");

            //$resultado = consultar("select * from ADMINISTRADOR where User = '$user' AND Pass='$pass' LIMIT 1");
            //echo "<h1>uno</h1>";
            foreach ($resultado as $fila) {
              echo "<h1>uno</h1>";
              //echo "<p>".utf8_encode($fila["Descripcion"])."</p>";

            }
        ?>


	<script src="js/jquery.js"> </script>
	<script src="js/bootstrap.min.js"> </script>

</body>
</html>