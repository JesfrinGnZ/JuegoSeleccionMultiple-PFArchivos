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
        include("../conexion.php");
        $resultado =  $conexion->query("SELECT P.idPregunta, P.Descripcion, P.Tiempo, C.idCuestionario
              FROM PREGUNTA P INNER JOIN CUESTIONARIO C ON P.Cuestionario_Id_Pregunta = C.idCuestionario WHERE C.idCuestionario = '1' LIMIT 1");
        $idTemporal = 0;
        foreach ($resultado as $fila) {
          echo "<h2>".utf8_encode($fila["Descripcion"])."?</h2>";
          $idTemporal = $fila["idPregunta"];

        }
        $time_on = 10;

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
  Redirecting in <span id="countdown"><?php echo floor($time_on);
  //redirigirndo a una vista despues de el tiempo time_on
  header( "refresh:$time_on; url=../esperandoRespuestas.php");

  //cambiandomestado de pregunta a usada que es 1
  $guardar = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='1' WHERE idPregunta='$idTemporal'");

  ?>

  </span> seconds.<br><br>


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
