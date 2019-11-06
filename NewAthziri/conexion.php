<?php
	if(!$conexion = mysqli_connect("localhost","root","adminmariadb","Cuestionarios"))
	{
		echo"Error";
	}
	else {

			?>
			<img src="../NewAthziri/Imagenes/cargando.gif" style="margin-left:35%; margin-top:10%;"/>
			<?php
			header("Refresh: 2; url=index.php");

		 }
?>
