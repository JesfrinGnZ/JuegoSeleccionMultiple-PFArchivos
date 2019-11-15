<?php
  //si no esta logueado mandarlo al index principal
  session_start();  if (!isset($_SESSION["logueado"])){ header("Location:../index.php"); exit(); }
	include("../conexion.php");
	//recibiendo datos con get

	$numCuest = $_GET['idCuest'];
	$nomCuest = $_GET['nomCuest'];
	$numPreg = $_GET['idPregunta'];
	$clave = $_GET['clave'];

  //$guardar = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='1' WHERE idPregunta='$numPreg'");

	$resultado =  $conexion->query("SELECT R.idRespuesta, R.Descripcion,R.No_Respuesta, R.Pregunta_Id,R.esCorrecta, P.idPregunta, P.Cuestionario_Id_Pregunta
			FROM RESPUESTA R INNER JOIN PREGUNTA P ON R.Pregunta_Id = P.idPregunta WHERE P.idPregunta = '$numPreg'");

	$r1 = "si";
	$r2 = "si";
	$r3 = "si";
	$r4 = "si";

	foreach ($resultado as $fila) {
		if ($r1 == "si") {
					$r1 = $fila;
		} else if ($r2 == "si") {
					$r2 = $fila;
		} else  if ($r3 === "si") {
					$r3 = $fila;
		} else  if ($r4 == "si") {
					$r4 = $fila;
		}

	}



	//asignando tiempo de vista de la pregunta
	$time_on = $_GET['tiempoPreg'];

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
	<title>Ahtziri | Responde</title>
</head>
<body background="img/fondo 1.png">

		<div class="container">



		<table border = 2 cellspacing = 2 cellpadding = 2 class="table">

		  <tbody>
		  <tr>
		    <td><img src="img/Cuadrado.png"><FONT FACE="impact" SIZE=6 COLOR="black"><br>
		<?php echo "".$r1["Descripcion"]; ?></FONT></td>
		    <td><img src="img/Circulo.png"><FONT FACE="impact" SIZE=6 COLOR="black"><br>
		 <?php echo "".$r2["Descripcion"]; ?></FONT></td>
		    <br>
		  </tr>
		  <tr>
		    <td><img src="img/Triangulo.png"><FONT FACE="impact" SIZE=6 COLOR="black"><br>
		 <?php echo "".$r3["Descripcion"]; ?></FONT></td>
		    <td><img src="img/Rombo.png"><FONT FACE="impact" SIZE=6 COLOR="black"><br>
		 <?php echo "".$r4["Descripcion"]; ?></FONT></td>
		    <br>
		  </tr>
		  </tbody>
		</table>


		</div>
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
  Redirigiendo en <span id="countdown"><?php echo floor($time_on);
  //redirigirndo a una vista despues de el tiempo time_on
  //**esto sigue dando clavos aqui.
  //$guardar = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='1' WHERE idPregunta='$numPreg'");
  header( "refresh:$time_on; url=pasarSiguientePregunta.php?idCuest=$numCuest&nombreCuest=$nomCuest&clave=$clave&numPreg=$numPreg");
	//redirigir a otra pagina donde haya un boton que pase a la siguiente pregunta y muestre estadisticas
  //cambiando estado de pregunta a usada que es 1
  //$guardar = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='1' WHERE idPregunta='$numPreg'");

  ?>

	<script src="js/jquery.js"> </script>
	<script src="js/bootstrap.min.js"> </script>

</body>
</html>
