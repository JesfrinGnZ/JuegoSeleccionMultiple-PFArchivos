<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="Inicio/css/bootstrap.min.css">
	<link rel="stylesheet" href="Inicio/css/styleInicio.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
	<link rel="stylesheet" href="assets/css/reset.css">
	<link rel="stylesheet" href="assets/css/supersized.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"/>
	<title> Ahtziri | Inicio </title>
</head>
<!--<body background="Inicio/img/fondo.jpg"> -->
	<body>

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

						<a href="index.php" class="navbar-brand"> <h4>Ahtziri</h4> </a>
					</div>

					<div class="collapse navbar-collapse" id="navbar-1">
						<ul class="nav navbar-nav navbar-right">
              <li><a href="admins.php"><h5>Administradores</h5></a></li>
							<li><a href="index.php"><h5>Jugadores</h5></a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
	</div>

	<div class="page-container">
		<p><img class="logo" src="../NewAthziri/Imagenes/Logo.png" align="middle" style="width:30%; height:30%;">
		<hr>
		<a href="admins.php" style="color:#FFFFFF;">
				<button type="submit">Soy Administrador</button>
		 </a>
		 <a href="ingresoCodigo.php" style="color:#FFFFFF;">
			 <button type="submit">Soy Jugador</button>
		 </a>

	</div>


</body>

<script src="Inicio/js/jquery.js"> </script>
<script src="Inicio/js/bootstrap.min.js"> </script>

</html>
