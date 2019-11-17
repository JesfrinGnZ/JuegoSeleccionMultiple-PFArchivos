
<?php
session_start();
include("conexion.php");
$codCuestionarioJugado=$_POST['codigoCuestionario'];
$nickname=$_POST['nickname'];

//loagrego a sesion para acceder desde cualquier lado
$_SESSION['codCuesJugado']=$codCuestionarioJugado;
$_SESSION['nickname']=$nickname;

//guardar jugador en la bd
//guardando  jugador pero ya se guarda
//$guardar = mysqli_query($conexion,"INSERT INTO JUGADOR VALUES (null,'$nickname','$codCuestionarioJugado')");

//$_SESSION['pregTotales']= null;
//$_SESSION['pregActual']= null;


//recuperando cuestionario
//$cuest =  $conexion->query("SELECT * FROM CUESTIONARIO_REALIZADO WHERE CodigoGenerado = '$codCuestionarioJugado' LIMIT 1");


//$sql = "SELECT COUNT(PREGUNTA.Cuestionario_Id_Pregunta) AS NoPreguntas FROM CUESTIONARIO_REALIZADO
//INNER JOIN CUESTIONARIO ON CUESTIONARIO_REALIZADO.Cuestionario_Id=CUESTIONARIO.idCuestionario
//INNER JOIN PREGUNTA ON PREGUNTA.Cuestionario_Id_Pregunta='4';";
//resultado de cuantos jugadores hay conectados
//$resultadoNPreguntas = mysqli_query( $conexion, $sql ) or die ( "Algo ha ido mal en la consulta a la base de datos");
//while($extraido = mysqli_fetch_array($resultadoNPreguntas)) {
//  $_SESSION['pregTotales']= $extraido['NoPreguntas'];


//  }

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
  <?php
    include("validacionEntradas.php");
 $resultadoNick->close();
 $resultadoActivo->close();
   ?>
</div>

<div id="seccionRecargar">

</div>

<script type="text/javascript">

    $(document).ready(function(){
      setInterval(
        function(){
          $('#seccionRecargar').load('verificarSiCuestionarioInicio.php');
        },500
      );
    });
</script>

  </body>
</html>
