
<?php
session_start();
$codCuestionarioJugado=$_POST['codigoCuestionario'];
$nickname=$_POST['nickname'];
$_SESSION['codCuesJugado']=$codCuestionarioJugado;
$_SESSION['nickname']=$nickname;
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

<div id="seccionRecargar" class="content">
  <?php
    include("validacionEntradas.php");
 $resultadoNick->close();
 $resultadoActivo->close();
   ?>
</div>

<script type="text/javascript">

    $(document).ready(function(){
      setInterval(
        function(){
          $('#seccionRecargar').load('verificarSiCuestionarioInicio.php');
        },5000
      );
    });
</script>
<?php
  echo "Este es mi mensaje";
?>

  </body>
</html>
