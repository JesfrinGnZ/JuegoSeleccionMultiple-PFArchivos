<?php
session_start();  if (!isset($_SESSION["logueado"])){ header("Location:../index.php"); exit(); }

include("../conexion.php");
//recibiendo datos con get
$nombreCuest = $_GET['nombreCuest'];
$numCuest = $_GET['idCuest'];
$clave = $_GET['clave'];
$numPreg = $_GET['numPreg'];

//haber aqui si da el cambio de estado de pregunta
//$guardar1 = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='1' WHERE idPregunta='$numPreg'");

//en este caso los clientes deben verificar si esta en 0 para empezar a correr tiempo
$guardar = mysqli_query($conexion,"UPDATE CUESTIONARIO SET Activo='1' WHERE idCuestionario='$numCuest'");

$consultaBuena = "SELECT COUNT(RESPUESTA_JUGADOR.Correcta) AS Buenas FROM RESPUESTA_JUGADOR
WHERE RESPUESTA_JUGADOR.PREGUNTA_idPregunta='$numPreg' AND RESPUESTA_JUGADOR.CodigoCuestRealizado='$clave'
AND RESPUESTA_JUGADOR.Correcta='1';";
            $resultadoBuena = mysqli_query( $conexion, $consultaBuena ) or die ( "Algo ha ido mal en la consulta a la base de datos");
            while ($columnas = mysqli_fetch_array( $resultadoBuena))
            {
            	$buenas = $columnas['Buenas'];
            }

            $consultaMala = "SELECT COUNT(RESPUESTA_JUGADOR.Correcta) AS Malas FROM RESPUESTA_JUGADOR
WHERE RESPUESTA_JUGADOR.PREGUNTA_idPregunta='$numPreg' AND RESPUESTA_JUGADOR.CodigoCuestRealizado='$clave'
AND RESPUESTA_JUGADOR.Correcta='0';";
            $resultadoMala = mysqli_query( $conexion, $consultaMala ) or die ( "Algo ha ido mal en la consulta a la base de datos");
            while ($columna = mysqli_fetch_array( $resultadoMala))
            {
            	$malas = $columna['Malas'];
            }

 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  	<link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/styleInicio.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  </head>

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
              <li>
                <a href="../salir.php"><h5>Cerrar Sesion</h5></a>
              </li>
            </ul>

          </div>
        </div>
      </nav>
    </header>
  </div>

    <body background="img/fondo 1.png">
      <div class="container">

<h2>Estadisticas de los resultados:</h2>
              <br>

            	<script type="text/javascript">
            	var buena  = '<?php echo $buenas; ?>';
            	var mala  = '<?php echo $malas; ?>';
            	//document.write(buena);
            	window.onload = function () {

            	var chart = new CanvasJS.Chart("chartContainer", {
            		theme: "dark1", // "light2", "dark1", "dark2"
            		animationEnabled: true, // change to true
            		//title:{
            			//text: "Tus resultados:"
            		//},

            		data: [
            		{
            			// Change type to "bar", "area", "spline", "pie",etc.
            			type: "bar",
            			dataPoints: [
            				{ label: "Correctas",  y: parseInt(buena,10) },
            				{ label: "Incorrectas", y: parseInt(mala,10)  },

            			]
            		}
            		]
            	});
            	chart.render();
            	}
            	</script>

            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>

        <?php
            //$guardar1 = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='1' WHERE idPregunta='$numPreg'");
            echo "<a href=\"verPreguntas.php?idCuest=$numCuest&nombreCuest=$nombreCuest&clave=$clave\">
                    <button type=\"submit\" name=\"login\"> Siguiente Pregunta </button>
                  </a>";
            $guardar1 = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='1' WHERE idPregunta='$numPreg'");
         ?>
      </div>
      <footer>
    		<div class="container">
    			<center> <h5> Copyright &copy;</h5> </center>
    		</div>
    	</footer>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    </body>

</html>
