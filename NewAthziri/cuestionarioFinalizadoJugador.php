<!DOCTYPE html>
<html lang="es" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Ahtziri | Fin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

    </head>
    <body>
        <div class="page-container">
		        <img class="logo" src="../NewAthziri/Imagenes/Logo.png"/ style="width:30%; height:30%;">
            <h1>¡Has terminado el cuestionario!</h1>
            <br>

            <?php

            include("conexion.php");
            $consultaBuena = "SELECT COUNT(RESPUESTA_JUGADOR.Correcta) AS Buenas FROM RESPUESTA_JUGADOR
            INNER JOIN JUGADOR ON RESPUESTA_JUGADOR.Jugador_Id = JUGADOR.idJugador
            WHERE RESPUESTA_JUGADOR.Correcta='1' AND JUGADOR.NickName='201531132' AND JUGADOR.CodigoCuestionario='5hsj079i';";
            $resultadoBuena = mysqli_query( $conexion, $consultaBuena ) or die ( "Algo ha ido mal en la consulta a la base de datos");
            while ($columna = mysqli_fetch_array( $resultadoBuena))
            {
            	$buenas = $columna[0];
            }

            $consultaMala = "SELECT COUNT(RESPUESTA_JUGADOR.Correcta) AS Buenas FROM RESPUESTA_JUGADOR
            INNER JOIN JUGADOR ON RESPUESTA_JUGADOR.Jugador_Id = JUGADOR.idJugador
            WHERE RESPUESTA_JUGADOR.Correcta='0' AND JUGADOR.NickName='201531132' AND JUGADOR.CodigoCuestionario='5hsj079i';";
            $resultadoMala = mysqli_query( $conexion, $consultaMala ) or die ( "Algo ha ido mal en la consulta a la base de datos");
            while ($columna = mysqli_fetch_array( $resultadoMala))
            {
            	$malas = $columna[0];
            }

            	?>

              <h2>Estadisticas de tus resultados:</h2>
              <br>

            	<script type="text/javascript">
            	var buena  = '<?php echo $buenas; ?>';
            	var mala  = '<?php echo $malas; ?>';
            	//document.write(buena);
            	window.onload = function () {

            	var chart = new CanvasJS.Chart("chartContainer", {
            		theme: "light1", // "light2", "dark1", "dark2"
            		animationEnabled: false, // change to true
            		//title:{
            			//text: "Tus resultados:"
            		//},

            		data: [
            		{
            			// Change type to "bar", "area", "spline", "pie",etc.
            			type: "pie",
            			dataPoints: [
            				{ label: "Correctas",  y: parseInt(buena,10) },
            				{ label: "Incorrectas", y: parseInt(mala,10)  },

            			]
            		}
            		]
            	});
            	chart.render();

            	}
            	</script>

            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>


            <form action="validacionEntradas.php" method="POST">
                <button  type="submit" name="login"> Descargar resultados </button>
            </form>
            <a href="index.php" style="color:#FFFFFF;">
       			 <button type="submit">Finalizar</button>
       		 </a>
           <br>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init1.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>
