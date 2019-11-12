<?php

$time_on=20;

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
  header( "refresh:$time_on; url=index.php");
	//redirigir a otra pagina donde haya un boton que pase a la siguiente pregunta y muestre estadisticas
  //cambiando estado de pregunta a usada que es 1
  $guardar = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='1' WHERE idPregunta='$idTemporal'");

  ?>

	<script src="js/jquery.js"> </script>
	<script src="js/bootstrap.min.js"> </script>

</body>
</html>
