<?php
session_start();
include("conexion.php");
$idCuest=$_GET['idCuest'];
$idPreg=$_GET['idPreg'];

//$valor = $_POST["caja_valor"];
//echo $valor;


//if ($enviar == 1) {
  // code...
//  echo "ES LA UNO ";
//} else {

//  echo "NO ES LA UNO";
//}

//if ($respuesta = 1) {
  // code...
//  echo "Se selecciono la respuesta 1";
//} else {

//  echo "No se selecciono la respuesta 1";
//}

//echo "se envio resp: $respEnv";
//echo "se envio id resp: $idRespEnv";
//$codCuestionarioJugado =
//$nickname =
//$_SESSION['codCuesJugado']=$codCuestionarioJugado;
//$_SESSION['nickname']=$nickname;
echo "codCuest:".$_SESSION['codCuesJugado'];
echo "nickname:".$_SESSION['nickname'];

//recuperacion de las respuestas de la pregunta
$respuestas =  $conexion->query("SELECT R.idRespuesta, R.Descripcion,R.No_Respuesta, R.Pregunta_Id,R.esCorrecta, P.idPregunta, P.Cuestionario_Id_Pregunta
    FROM RESPUESTA R INNER JOIN PREGUNTA P ON R.Pregunta_Id = P.idPregunta WHERE P.idPregunta = '$idPreg'");

$r1 = "si";
$r2 = "si";
$r3 = "si";
$r4 = "si";

foreach ($respuestas as $fila2) {
  if ($r1 == "si") {
        $r1 = $fila2;
  } else if ($r2 == "si") {
        $r2 = $fila2;
  } else  if ($r3 === "si") {
        $r3 = $fila2;
  } else  if ($r4 == "si") {
        $r4 = $fila2;
  }

}

//$respEnv = "";
//$idRespEnv "";

echo "".$r1["Descripcion"]." ";
echo "".$r2["Descripcion"]." ";
echo "".$r3["Descripcion"]." ";
echo "".$r4["Descripcion"]." ";

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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

</style>
  </head>
  <body>

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

  </body>
</html>
