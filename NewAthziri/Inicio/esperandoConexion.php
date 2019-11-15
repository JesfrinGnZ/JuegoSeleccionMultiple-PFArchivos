<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  	<link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"/>
    <title> Espera de Conectados</title>
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
<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous">
</script>
  </head>
  <body>

<div class="content">
  <img src="../Imagenes/cargando.gif" width="550" height="200" />
  <img src="../Imagenes/EsperaunMomento.png" width="580" height="150" />

  <?php
  session_start();  if (!isset($_SESSION["logueado"])){ header("Location:../index.php"); exit(); }
  include("../conexion.php");
  //$conexion = mysqli_connect( "localhost","root","kittenrv2897","Cuestionarios") or die ("No se ha podido conectar al servidor de Base de datos");
  $nombreCuest = $_GET['nombreCuest'];
  $numCuest = $_GET['idCuest'];

  //antes de iniciar setear preguntas a 0
  $guardar = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='0' WHERE Cuestionario_Id_Pregunta='$numCuest'");

  mysqli_query($conexion, "UPDATE CUESTIONARIO SET Activo='1' WHERE idCuestionario=$numCuest " ) or die ( "Algo ha ido mal en la consulta a la base de datos");

  echo "<h2>Mientras todos se conectan al cuestionario: $nombreCuest.</h2>";

  $clave="";
  $max_chars = round(rand(8,8));  // tendrá entre 7 y 10 caracteres
  $chars = array();
  for ($i="a"; $i<"z"; $i++) $chars[] = $i;
  $chars[] = "z";
  for ($i=0; $i<$max_chars; $i++) {
    $letra = round(rand(0, 1));
    if ($letra) // es letra
      $clave .= $chars[round(rand(0, count($chars)-1))];
    else // es numero
      $clave .= round(rand(0, 9));
  }
  $_SESSION['esperandoConexion']=$clave;
  $cl=$_SESSION['esperandoConexion'];
  echo "<h2>Te puedes unir usando el codigo: $cl </h2>";

  mysqli_query($conexion, "INSERT INTO CUESTIONARIO_REALIZADO (CodigoGenerado,Cuestionario_Id) VALUES ('$clave','$numCuest');") or die ( "Algo ha ido mal en la consulta a la base de datos");

   ?>

</div><br><br><br><br><br><br>

    <div id="seccionRecargar" class="container"></div>

    <div class="container">
      <?php
          echo "<a href=\"verPreguntas.php?idCuest=$numCuest&nombreCuest=$nombreCuest&clave=$clave\">
                  <button type=\"submit\" name=\"login\"> INICIAR JUEGO </button>
                </a>";
       ?>

      <script type="text/javascript">
          $(document).ready(function(){
            setInterval(
              function(){
                $('#seccionRecargar').load('jugadores.php');
              },500

            );

          });
      </script>

    </div>

  </body>
</html>
