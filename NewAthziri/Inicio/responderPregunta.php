<?php
include("../conexion.php");

//recibiendo datos con get
$idCuest = $_GET['idCuest'];
$codCuest = $_GET['codCuest'];
$nick = $_GET['nick'];
$idPreg = $_GET['idPreg'];
$time_on = $_GET['tiempoPreg'] + 2; //mas uno por atraso del admin
//recuperando respuestas para enviar



 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


	<title>Ahtziri | Responde</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" >
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<script type="text/javascript">
function guardarRespuesta(){
        toastr.success("Se respuesta se a procesado forfavor espere","Aviso!");
        $('#cbox1').attr("disabled", true);
        $('#cbox2').attr("disabled", true);
        $('#cbox3').attr("disabled", true);
        $('#cbox4').attr("disabled", true);
        return false;

      }
</script>
<body>

		<div class="container">
      <form  method="post">
        <a>
          <img src="img/Cuadrado.png">
          <label><input type="checkbox" name="cbox11" id="cbox1" value="1"   onclick="guardarRespuesta();" > Este es mi primer checkbox</label><br>
        </a>

        <a>
          <img src="img/Circulo.png">
          <label><input type="checkbox" name="cbox22" id="cbox2" value="2"   onclick="guardarRespuesta();" > Este es mi segundo checkbox</label><br>
        </a>

        <a>
          <img src="img/Triangulo.png">
          <label><input type="checkbox" name="cbox33" id="cbox3" value="3"   onclick="guardarRespuesta();" > Este es mi tercer checkbox</label><br>
        </a>
        <a>
          <img src="img/Rombo.png">
          <label><input type="checkbox" name="cbox44" id="cbox4" value="4"   onclick="guardarRespuesta();" > Este es mi cuarto checkbox</label><br>
        </a>

      </form>
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
  header("refresh:$time_on; url=../vistaEsperaPregunta.php?idCuest=$idCuest&idPreg=$idPreg");
	//redirigir a otra pagina donde haya un boton que pase a la siguiente pregunta y muestre estadisticas
  //cambiando estado de pregunta a usada que es 1
  //$guardar = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='1' WHERE idPregunta='$idTemporal'");

  ?>

	<script src="js/jquery.js"> </script>
	<script src="js/bootstrap.min.js"> </script>

</body>
</html>
