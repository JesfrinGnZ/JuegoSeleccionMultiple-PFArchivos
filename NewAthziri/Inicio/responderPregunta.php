<?php
include("../conexion.php");

//recibiendo datos con get
$idCuest = $_GET['idCuest'];
$codCuest = $_GET['codCuest'];
$nick = $_GET['nick'];
$idPreg = $_GET['idPreg'];
$time_on = $_GET['tiempoPreg'] + 1; //mas uno por atraso del admin
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
  <div class="container">
    <h1> Seleccione su Respuesta</h1>
    <a>
      <img src="img/Cuadrado.jpg">
      <label><input id="cbox1" type="radio" name="respuesta" value="1">Respuesta 1</label><br>
    </a>

    <a>
      <img src="img/Circulo.jpg">
      <label><input id="cbox2" type="radio" name="respuesta" value="2">Respuesta 2</label><br>
    </a>

    <a>
      <img src="img/Triangulo.jpg">
      <label><input id="cbox3" type="radio" name="respuesta" value="3">Respuesta 3</label><br>
    </a>
    <a>
      <img src="img/Rombo.jpg">
      <label><input id="cbox4" type="radio" name="respuesta" value="4">Respuesta 4</label><br>
    </a>

  </div>

  <script>

      $(document).ready(function() {
          $('input[type="radio"]').click(function() {
              var respuesta = $(this).val();
              var nick = '<?php echo $nick; ?>' //por ser string
              var idPreg = '<?php echo $idPreg; ?>'
              var codCuest = '<?php echo $codCuest; ?>'
              $.ajax({
                  url: "guardarRespuesta.php",
                  method: "POST",
                  data: {
                      respuesta: respuesta, nick: nick, idPreg: idPreg, codCuest: codCuest
                  }
                  //no necesito ninguno respuesta por eso elimino success
                  //,
                  //success: function(data) {
                  //    $('#result').html(data);
                  //}
              });

              //desactivando los demas radios despues de la primera respuesta
              toastr.success("Su respuesta se ha registrado. Por favor espere mientras los demas responden...","Aviso!");
              $('#cbox1').attr("disabled", true);
              $('#cbox2').attr("disabled", true);
              $('#cbox3').attr("disabled", true);
              $('#cbox4').attr("disabled", true);
          });
      });
  </script>

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
  <div class="tex-center"><br>
    <h3>Segundos para continuar  <span id="countdown"><?php echo floor($time_on);
      //redirigirndo a una vista despues de el tiempo time_on
      header("refresh:$time_on; url=../vistaEsperaPregunta.php?idCuest=$idCuest&idPreg=$idPreg");
      ?>
    </h3>
  </div>

	<script src="js/jquery.js"> </script>
	<script src="js/bootstrap.min.js"> </script>

</body>
</html>
