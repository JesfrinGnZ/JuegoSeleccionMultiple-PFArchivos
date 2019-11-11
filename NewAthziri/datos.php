<?php

	include("conexionLogin.php");

	$Usuario = $_POST['U'];
	$Nombre = $_POST['N'];
	$Contrasena = $_POST['P'];

	//$Fecha = $_POST['F'];
	//$Genero = $_POST['G'];
	//verificar que el usuario no exista

	$guardar = mysqli_query($conexion,"INSERT INTO ADMINISTRADOR VALUES ('$Usuario','$Nombre','$Contrasena')");


?>
