<?php
    session_start();
    include("conexion.php");
    $idCuest=$_GET['idCuest'];
    $idPreg=$_GET['idPreg'];
    $codCuest = $_SESSION['codCuesJugado'];
    $nick = $_SESSION['nickname'];

    //echo "codCuest:".$_SESSION['codCuesJugado'];
    //echo "nickname:".$_SESSION['nickname'];

    //hacer la consulta si el usuario con nick y cod cuest su respuesta es $correcta
    //si lo es mostrar imagen tu respuesta es correcta sino respuesta mala
    //mostrar tamnien cual era la respuesta correcta

    $correcta = 0;
    $idJugador = 1; //recuperar con el nick

    //recuperando $idJugador
    $jugador =  $conexion->query("SELECT * FROM JUGADOR WHERE NIckName = '$nick' AND CodigoCuestionario = '$codCuest' LIMIT 1");

    foreach ($jugador as $filac) {
      $idJugador = $filac["idJugador"]; //guarda el id del jugador
    }


    //recuperando la respuesta del jugador inner join con jugador
    $respuestaCorrecta =  $conexion->query("SELECT R.idRespuestaJugador, R.Correcta, R.Jugador_Id,R.PREGUNTA_idPregunta,
          J.idJugador, J.NIckName, J.CodigoCuestionario
          FROM RESPUESTA_JUGADOR R INNER JOIN JUGADOR J ON R.Jugador_Id = J.idJugador
          WHERE J.CodigoCuestionario = '$codCuest' AND J.idJugador='$idJugador' AND R.PREGUNTA_idPregunta = '$idPreg' LIMIT 1");

    foreach ($respuestaCorrecta as $filac2) {
        $correcta = $filac2["Correcta"]; //guarda su respuesta
    }

    //ahora recuperamos la respuesta que era la correcta segun el id de la pregunta
    //recuperacion de las respuestas de la pregunta
    $mostrarResp = "";
    $respuestasCorrectas =  $conexion->query("SELECT R.idRespuesta, R.Descripcion,R.No_Respuesta, R.Pregunta_Id,R.esCorrecta, P.idPregunta, P.Cuestionario_Id_Pregunta
        FROM RESPUESTA R INNER JOIN PREGUNTA P ON R.Pregunta_Id = P.idPregunta WHERE P.idPregunta = '$idPreg' AND esCorrecta= '1'");

        foreach ($respuestasCorrectas as $cor) {
          $mostrarResp = $cor["Descripcion"]; //guarda el id del jugador
        }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/supersized.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

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

    h1 {
  color: #ff6000;
  font-weight: normal;
  font-size: 40px;
  font-family: Arial;
}

  </style>
  </head>
  <body style="background-color:#FFFFFF;">
    <?php

    if ($correcta == 0) {
      // code...
      //echo "fallo";
      echo "<div class=\"page-container\">
        <img src=\"../NewAthziri/Imagenes/respuestaIncorrecta.png\" style=\"width:30%; height:30%;\">
        <br>
        <h1>La Respuesta Correcta es: $mostrarResp</h1>
      </div>
      ";

    } else {
      //echo "acerto";
      echo "<div class=\"page-container\">
        <img src=\"../NewAthziri/Imagenes/respuestaCorrecta.png\" style=\"width:30%; height:30%;\">
        <br>
      </div>";

    }


     ?>

    <div  class="content">
    </div>
    <div id="seccionRecargar">

    </div>

    <script type="text/javascript">

        $(document).ready(function(){
          setInterval(
            function(){
              $('#seccionRecargar').load('verificarSiCuestionarioActivo.php');
            },500
          );
        });
    </script>

    <!-- Javascript -->
    <script src="assets/js/jquery-1.8.2.min.js"></script>
    <script src="assets/js/supersized.3.2.7.min.js"></script>
    <script src="assets/js/scripts.js"></script>

  </body>
</html>
