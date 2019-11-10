<?php
session_start();  if (!isset($_SESSION["logueado"])){ header("Location:../index.php"); exit(); }
//Las variables de cuestionario se hacen nula
$_SESSION['nombreDeCuestionario']=null;
$_SESSION['descripcionCuestionario']=null;
include("../../conexion.php");
//Buscando el ultimo cuestionario creado
$consultaUltimoCuestionario = mysqli_query($conexion,"SELECT * FROM CUESTIONARIO order by idCuestionario DESC LIMIT 1");
$idCuestionarioABorrar;
while($cuestionario = mysqli_fetch_array($consultaUltimoCuestionario)){
  echo $cuestionario['idCuestionario'];
  $idCuestionarioABorrar=$cuestionario['idCuestionario'];
}
echo "<br>$idCuestionarioABorrar";

//Consultar pregunta por pregunta para eliminar sus respuestas
/*
$cosultaPreguntas=mysqli_query($conexion,"SELECT * FROM PREGUNTA WHERE Cuestionario_Id_Pregunta=$idCuestionarioABorrar");
while($preguntas = mysqli_fetch_array($cosultaPreguntas)){
  echo $preguntas['idCuestionario'];
  $idCuestionarioABorrar=$cuestionario['idCuestionario'];
}

//Eliminando preguntas del ultimo cuestioanrio creado
mysqli_query($conexion,"DELETE FROM PREGUNTA WHERE Cuestionario_Id_Pregunta=$idCuestionarioABorrar");
//Eliminando el ultimo cuestionario creado
mysqli_query($conexion,"DELETE FROM CUESTIONARIO WHERE idCuestionario=$idCuestionarioABorrar");
*/
  header('Location:../index.php');
 ?>
