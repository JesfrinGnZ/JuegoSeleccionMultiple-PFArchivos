<?php
include("conexion.php");
session_start();
$time_on=20;

//recibiendo datos con get
$codCuest = $_SESSION['codCuesJugado'];
$nick = $_SESSION['nickname']; //este era el clavo porque ya no daba el nick mas adelante no estaba el $_sesion

//recuperando cuestionario
$cuest =  $conexion->query("SELECT * FROM CUESTIONARIO_REALIZADO WHERE CodigoGenerado = '$codCuest' LIMIT 1");

$idCuest = 0;
foreach ($cuest as $filac) {
  $idCuest = $filac["Cuestionario_Id"]; //guarda el id del cuestionario
}

$pregunta =  $conexion->query("SELECT P.idPregunta, P.Descripcion, P.Tiempo,P.Estado, C.idCuestionario
      FROM PREGUNTA P INNER JOIN CUESTIONARIO C ON P.Cuestionario_Id_Pregunta = C.idCuestionario WHERE C.idCuestionario = '$idCuest' AND P.Estado='0' LIMIT 1");

//variables para la pregunta
$idTemporalPreg = 0;
$tiempoPreg = 0;
$descripcionPreg = "";

//validando que la consulta haya recuperado algo
if ($pregunta->num_rows>0) {
  foreach ($pregunta as $fila1) {
    $descripcionPreg = $fila1["Descripcion"];
    $idTemporalPreg = $fila1["idPregunta"]; //guarda el id de la pregunta a trabajar
    $tiempoPreg = $fila1["Tiempo"]; //guarda el id de la pregunta a trabajar
  }
} else {
    //cuestionario finalizado porque ya no hay ninguna pregunta con estado no respondida

    header("Location:Inicio/cuestionarioTerminadoJugador.php");
}

//recuperando respuestas para enviar



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
<body>

		<div class="container">

      <h2>LEE LA PREGUNTA</h2>

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
  header( "refresh:$time_on; url=Inicio/responderPregunta.php?idCuest=$idCuest&codCuest=$codCuest&nick=$nick&idPreg=$idTemporalPreg&tiempoPreg=$tiempoPreg");
	//redirigir a otra pagina donde haya un boton que pase a la siguiente pregunta y muestre estadisticas
  //cambiando estado de pregunta a usada que es 1
  //$guardar = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='1' WHERE idPregunta='$idTemporal'");

  ?>

	<script src="js/jquery.js"> </script>
	<script src="js/bootstrap.min.js"> </script>

</body>
</html>
