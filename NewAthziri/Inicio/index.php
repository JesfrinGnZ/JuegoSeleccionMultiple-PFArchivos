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
	<title> Ahtziri | Inicio </title>
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

						<a href="index.php" class="navbar-brand"> <h4>Inicio | Athziri</h4> </a>
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

  <div class="page-container">
    <?php
    include("../conexion.php");
    $id = 1;
    $usuarioLog = $_SESSION['User'];
    //$conn = mysqli_connect('localhost','root','3211','Cuestionarios');
    $sql = "SELECT * FROM CUESTIONARIO WHERE Admin_User='".$usuarioLog."'";
    $result = mysqli_query($conexion,$sql);
    echo "
    <h2>Hola $usuarioLog!</h2>
      <table border = 1 cellspacing = 1 cellpadding = 1>
        <tr>
          <th> Acciones </th>
          <th> ID </th>
          <th> Nombre</th>
          <th> Descripcion</th>
        </tr>";
    while($row = mysqli_fetch_array($result)){
      echo "
        <tr>
          <td><a href=\"esperandoConexion.php?idCuest=$row[0]\">Activar</a>
          <td>".$row[0]."</td>
          <td>".$row[1]."</td>
          <td>".$row[2]."</td>
          <br>
        </tr>";
    }
    echo "</table>";
     ?>

  </div>
        <!--Botones-->
        <div class="container-fluid">
          <section class="main row">
            <div class="btn-group">
              <a href="creacionDeCuestionarios/creacionDeCuestionario.php">
                <button type="submit" class="btn btn-danger">Crear</button>
              </a>
            </div>
          </section>
        </div>

        <footer>
					<div class="container">
						<center> <h5> Copyright &copy;</h5> </center>
					</div>
				</footer>

	<script src="js/jquery.js"> </script>
	<script src="js/bootstrap.min.js"> </script>

</body>
</html>
