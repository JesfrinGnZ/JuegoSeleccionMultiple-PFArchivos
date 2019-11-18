<?php
  //si no esta logueado mandarlo al index principal

  session_start();  if (!isset($_SESSION["logueado"])){ header("Location:../index.php"); exit(); }

  include("../conexion.php");

  //recibiendo datos con get
  $nombreCuest = $_GET['nombreCuest'];
  $numCuest = $_GET['idCuest'];
  $clave = $_GET['clave'];

  //echo "<h2>Respondiendo Cuestionario: $nombreCuest</h2>";

  //desactivando custionario para todods los clientes que se unieron despues de tiempo
  //en este caso los clientes deben verificar si esta en 0 para empezar a correr tiempo
  $guardar = mysqli_query($conexion,"UPDATE CUESTIONARIO SET Activo='0' WHERE idCuestionario='$numCuest'");

  $resultado =  $conexion->query("SELECT P.idPregunta, P.Descripcion, P.Tiempo,P.Estado, C.idCuestionario
        FROM PREGUNTA P INNER JOIN CUESTIONARIO C ON P.Cuestionario_Id_Pregunta = C.idCuestionario WHERE C.idCuestionario = '$numCuest' AND P.Estado='0' LIMIT 1");

  $idTemporal = 0;
  $tiempoPreg = 0;
  $descripcionPreg = "";

  //validando que la consulta haya recuperado algo
  if ($resultado->num_rows>0) {
    // code...
    foreach ($resultado as $fila) {
      //echo "<h2>".utf8_encode($fila["Descripcion"])."?</h2>";
      $descripcionPreg = $fila["Descripcion"];
      $idTemporal = $fila["idPregunta"]; //guarda el id de la pregunta a trabajar
      $tiempoPreg = $fila["Tiempo"]; //guarda el id de la pregunta a trabajar
    }
    $time_on = 20;
  } else {
      //redirigimos a la parte de terminar cuestionario
      //**pasar todas las preguntas a usadas depues de terminar el cuestionario para que el cliente atrasado no pueda ver
      $guardar = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='1' WHERE idCuestionario='$numCuest'");

      header("Location:cuestionarioTerminado.php?nombreCuest=$nombreCuest&idCuest=$numCuest&clave=$clave");
      //echo "<script>window.open('cuestionarioTerminado.php','_self')</script>";
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/styleInicio.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"/>
	<title> Preguntas </title>
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

  <div class="container">
    <?php
      echo "<h2>Respondiendo Cuestionario: $nombreCuest</h2>
          <h2>$descripcionPreg ??</h2>";


    ?>
    <script type="text/javascript">

    (function () {
        var timeLeft = <?php echo $time_on; ?>,
        cinterval;

        var timeDec = function (){
            timeLeft--;
            document.getElementById('countdown').innerHTML = timeLeft;
            if(timeLeft === 0){
                clearInterval(cinterval);
            }
        };

        cinterval = setInterval(timeDec, 1000);
     })();

  </script>
  <div class="tex-center">
    <h3>  Segundos para continuar <span id="countdown"><?php echo floor($time_on);
      //redirigirndo a una vista despues de el tiempo time_on
      //$guardar = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='1' WHERE idPregunta='$idTemporal'");
      header( "refresh:$time_on; url=leerRespuestas.php?idCuest=$numCuest&nomCuest=$nombreCuest&idPregunta=$idTemporal&tiempoPreg=$tiempoPreg&clave=$clave");

      //cambiandomestado de pregunta a usada que es 1
      //$guardar = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='1' WHERE idPregunta='$idTemporal'");

      ?></h3>
  </div>


  </span> <br><br>


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
