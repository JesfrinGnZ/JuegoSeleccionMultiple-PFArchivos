<?php
	if(!$conexion = mysqli_connect("localhost","root","7321","Cuestionarios"))

	{
		echo "<script>alert('No se Completo la solicitud por fallos de configuracion...'); </script>".
		"<img src=\"Imagenes/cargando.gif\" style=\"margin-left:35%; margin-top:10%;\"/>";
		//retornar al index
		header("Refresh: 2; url=index.php");
	}
	else {
		//echo "<img src=\"Imagenes/cargando.gif\" style=\"margin-left:35%; margin-top:10%;\"/>";
		//retornar al index
		//header("Refresh: 2");

	}
?>
