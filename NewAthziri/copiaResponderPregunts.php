

<?php

include("../conexion.php");

//recibiendo datos con get
$idCuest = $_GET['idCuest'];
$codCuest = $_GET['codCuest'];
$nick = $_GET['nick'];
$idPreg = $_GET['idPreg'];
$time_on = $_GET['tiempoPreg'] + 2; //mas uno por atraso del admin
//$tiempoPreg = $_GET['tiempoPreg'];

$enviar = 5;

//$var_PHP=0;


//asignando tiempoPreg



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

  <script type="text/javascript">
  //var Var_JavaScript  = 888;
  //var porId=document.getElementById("nombre").value;
  //function guardarRespuesta(){
    //      toastr.success("Se respuesta se a procesado forfavor espere","Aviso!");
      //    $('#cbox1').attr("disabled", true);
        //  $('#cbox2').attr("disabled", true);
          //$('#cbox3').attr("disabled", true);
          //$('#cbox4').attr("disabled", true);
          //return false;

        //}

        function guardarRespuesta(){
               toastr.success("Debe seleccionar al menos una respuesta correcta","Aviso!");
               $('#cbox1').attr("disabled", true);
               $('#cbox2').attr("disabled", true);
               $('#cbox3').attr("disabled", true);
               $('#cbox4').attr("disabled", true);

                   var c1 = document.getElementById('cbox1').checked;
                   var c2 = document.getElementById('cbox2').checked;
                   var c3 = document.getElementById('cbox3').checked;
                   var c4 = document.getElementById('cbox4').checked;

                   //validamos campos
                   if(c1){
                     toastr.error("SELECCIONO 1");
                     $("#caja_valor").val('1');
                     return false;
                   }else if(c2){
                     toastr.error("SELECCIONO 2");
                     $("#caja_valor").val('2');
                     return false;
                   }else if(c3){
                     toastr.error("SELECCIONO 3");
                     $("#caja_valor").val('3');
                     return false;
                   }else if(c4){
                     toastr.error("SELECCIONO 4");
                     $("#caja_valor").val('4');
                     return false;
                   }else{
                     $("#caja_valor").val('0');
                   }


               return false;

             }
  </script>



</head>
<body background="img/fondoPaper.jpg">

  <div class="container">

    <form method="POST">
      <a>
        <img width="50" height="50" src="https://img.itch.zone/aW1nLzE2ODQ5NTgucG5n/347x500/grp9WT.png">
        <label><input type="checkbox" id="cbox1" name="cbox1" value="first_checkbox" onclick="guardarRespuesta();" > Este es mi primer checkbox</label><br>
      </a>

      <a>
        <img width="50" height="50" src="https://img.itch.zone/aW1nLzE2ODQ5NTgucG5n/347x500/grp9WT.png">
        <label><input type="checkbox" id="cbox2"  name="cbox2" value="first_checkbox" onclick="guardarRespuesta();"  > Este es mi segundo checkbox</label><br>
      </a>

      <a>
        <img width="50" height="50" src="https://img.itch.zone/aW1nLzE2ODQ5NTgucG5n/347x500/grp9WT.png">
        <label><input type="checkbox" id="cbox3" name="cbox3" value="first_checkbox" onclick="guardarRespuesta();" > Este es mi tercer checkbox</label><br>
      </a>

      <a>
        <img width="50" height="50" src="https://img.itch.zone/aW1nLzE2ODQ5NTgucG5n/347x500/grp9WT.png">
        <label><input type="checkbox" id="cbox4"  name="cbox4" value="first_checkbox" onclick="guardarRespuesta();"  > Este es mi cuarto checkbox</label><br>
      </a>

    <input type="text" name="caja_valor" id="caja_valor" readonly>





<!--
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
**
<a href="../vistaEsperaPregunta.php">
    <button  onclick="desactiva();" type="button" name="button" id="bot1" ><img src="img/Cuadrado.png"></button>
  </a>

  <a href="../vistaEsperaPregunta.php" >
    <button onclick="desactiva();" type="button" name="button" id="bot2" ><img src="img/Circulo.png"></button>
  </a>
</div>
<div class="container">
<a href="../vistaEsperaPregunta.php">
  <button onclick="desactiva3();" type="button" name="button" id="bot3" ><img src="img/Triangulo.png"></button>
</a>

<a  href="../vistaEsperaPregunta.php">
  <button onclick="desactiva4();" type="button" name="button" id="bot4" ><img src="img/Rombo.png"></button>
</a>




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
***************************


<a >
    <button  onclick="desactiva();" type="button" name="button" id="bot1" ><img src="img/Cuadrado.png"></button>
  </a>

  <a >
    <button onclick="desactiva2();" type="button" name="button" id="bot2" ><img src="img/Circulo.png"></button>
  </a>
</div>
<div class="container">
<a >
  <button onclick="desactiva3();" type="button" name="button" id="bot3" ><img src="img/Triangulo.png"></button>
</a>

<a >
  <button onclick="desactiva4();" type="button" name="button" id="bot4" ><img src="img/Rombo.png"></button>
</a>

    <a style="color:#FFFFFF;">
       <button oneclick="desactiva();" id="bot1" type="button"><img src="img/Cuadrado.png"></button>
    </a>

    <a style="color:#FFFFFF;" >
    <button oneclick="desactiva();" id="bot2" type="button"><img src="img/Circulo.png"></button>
    </a>

    <a style="color:#FFFFFF;" >
     <button oneclick="desactiva();" id="bot3" type="button"><img src="img/Triangulo.png"></button>
     </a>

     <a style="color:#FFFFFF;" >
       <button oneclick="desactiva();" id="bot4" type="button"><img src="img/Rombo.png"></button>
       </a>
-->
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
/*POR EL MOMENTO SE VA A LA PANTALLA DE ESPERA DE UNIDOS PERO EN REALIDAD
	DEBE IRSE A OTRA VISTA QUE HAGA LO MIESMO QUE ESTA PERO TENGA OTRA IMAGEN
	lo hice deuna vez mejor
*/
header("refresh:$time_on; url=../vistaEsperaPregunta.php?idCuest=$idCuest&idPreg=$idPreg");
//redirigir a otra pagina donde haya un boton que pase a la siguiente pregunta y muestre estadisticas
//cambiando estado de pregunta a usada que es 1
//$guardar = mysqli_query($conexion,"UPDATE PREGUNTA SET Estado='1' WHERE idPregunta='$idTemporal'");

?>

	<script src="js/jquery.js"> </script>
	<script src="js/bootstrap.min.js"> </script>

</body>
</html>
