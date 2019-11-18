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
	<title>Ahtziri | Leer Pregunta</title>
  <style type="text/css">
      .content {
        width:600px;
        height:400px;
        margin:0px auto;
        text-align:center;
        background-color:#ffffff;
      }

      .content img {
        vertical-align:middle;
        horizontal-align:middle;
      }
  </style>
</head>
<body>
  <div class="content">
    <img src="../NewAthziri/Imagenes/cargando.gif" width="550" height="200" />
    <img src="../NewAthziri/Imagenes/EsperaunMomento.png" width="580" height="150" />
    <h2>Debes Leer bien la pregunta antes de pasar a responder... </h2>
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
  <div class="text-center"><br>
    <h2> Segundos para continuar <span id="countdown"><?php echo floor($time_on);
    //redirigirndo a una vista despues de el tiempo time_on
     header( "refresh:$time_on; url=Inicio/responderPregunta.php?idCuest=$idCuest&codCuest=$codCuest&nick=$nick&idPreg=$idTemporalPreg&tiempoPreg=$tiempoPreg");
    ?>
    </h2>
  </div>

	<script src="js/jquery.js"> </script>
	<script src="js/bootstrap.min.js"> </script>

</body>
</html>
