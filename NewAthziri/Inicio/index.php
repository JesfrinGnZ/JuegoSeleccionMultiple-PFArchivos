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
<body background="img/fondo 1.png">

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

						<a href="index.php" class="navbar-brand"> <h4>Inicio | Ahtziri</h4> </a>
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

  <div class="container">

    <?php
    include("../conexion.php");
    $id = 1;
    $usuarioLog = $_SESSION['User'];
    //$conn = mysqli_connect('localhost','root','3211','Cuestionarios');
    $sql = "SELECT * FROM CUESTIONARIO WHERE Admin_User='".$usuarioLog."'";
    $result = mysqli_query($conexion,$sql);
    echo "
    <h2>Hola $usuarioLog!</h2>
    <div class=\"panel panel-default\">
    <div class=\"panel-heading\">
        Lista de Cuestionarios
        <a href=\"creacionDeCuestionarios/creacionDeCuestionario.php\" class=\"btn btn-success pull-right\">Crear cuestionario!</a>
    </div>

      <table border = 2 cellspacing = 2 cellpadding = 2 class=\"table table-bordered\">
        <thead class=\"thead-light\">
        <tr>
          <th scope=\"col\"> Acciones </th>
          <th scope=\"col\"> ID </th>
          <th scope=\"col\"> Nombre</th>
          <th scope=\"col\"> Descripcion</th>
        </tr>
        </thead>";
    while($row = mysqli_fetch_array($result)){
      echo "
        <tbody>
        <tr>
          <td><a href=\"esperandoConexion.php?idCuest=$row[0]&nombreCuest=$row[1]\"><button type=\"submit\" class=\"btn btn-primary\">Activar</button></a>
          <td>".$row[0]."</td>
          <td>".$row[1]."</td>
          <td>".$row[2]."</td>
          <br>
        </tr>
        </tbody>";
    }
    echo "</table>
          </div>";

          $sql2 = "SELECT CUESTIONARIO_REALIZADO.CodigoGenerado, CUESTIONARIO.Nombre FROM CUESTIONARIO
          INNER JOIN ADMINISTRADOR ON CUESTIONARIO.Admin_User = ADMINISTRADOR.User
          INNER JOIN CUESTIONARIO_REALIZADO ON CUESTIONARIO_REALIZADO.Cuestionario_Id = CUESTIONARIO.idCuestionario
          WHERE ADMINISTRADOR.User='$usuarioLog';";
          $result2 = mysqli_query($conexion,$sql2);
          echo "
          <div class=\"panel panel-default\">
          <div class=\"panel-heading\">
              Lista de Cuestionarios Jugados
          </div>

            <table border = 2 cellspacing = 2 cellpadding = 2 class=\"table table-bordered\">
              <thead class=\"thead-light\">
              <tr>
                <th scope=\"col\"> Descargar </th>
                <th scope=\"col\"> Codigo de Juego </th>
                <th scope=\"col\"> Nombre de Cuestionaio </th>
              </tr>
              </thead>";
          while($row2 = mysqli_fetch_array($result2)){
            echo "
              <tbody>
              <tr>
                <td><a href=\"exportarCsv.php?clave=$row2[0]\"><button type=\"submit\" class=\"btn btn-primary\">Descargar Resultados</button></a>
                <td>".$row2[0]."</td>
                <td>".$row2[1]."</td>
                <br>
              </tr>
              </tbody>";
          }
          echo "</table>
                </div>";
     ?>

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
