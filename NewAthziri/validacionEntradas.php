<?php

  include("conexion.php");
  $codCuestionarioJugado=$_POST['codigoCuestionario'];
  $nickname=$_POST['nickname'];

  echo "$codCuestionarioJugado <br>";
  echo "$nickname<br>";

  $guardar = mysqli_query($conexion,"INSERT INTO JUGADOR VALUES (null,'$nickname','$codCuestionarioJugado')");

 ?>
