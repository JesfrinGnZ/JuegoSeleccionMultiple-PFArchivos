<?php
session_start();  if (!isset($_SESSION["logueado"])){ header("Location:../index.php"); exit(); }
//Las variables de cuestionario se hacen nula
$_SESSION['nombreDeCuestionario']=null;
$_SESSION['descripcionCuestionario']=null;
include("../../conexion.php");
//Buscando el ultimo cuestionario creado
$idCuestionarioABorrar=$_SESSION['idCuestionario'];
//Consultar pregunta por pregunta para eliminar sus respuestas
echo "$idCuestionarioABorrar <br>";
$consultaPreguntas=mysqli_query($conexion,"SELECT idPregunta FROM PREGUNTA WHERE Cuestionario_Id_Pregunta=$idCuestionarioABorrar");
while ($pregunta=mysqli_fetch_array($consultaPreguntas) ) {
  echo $pregunta['idPregunta']."<br>";
  $idPreguntaABorrar=$pregunta['idPregunta'];
  $consultaRespuestas=mysqli_query($conexion,"SELECT idRespuesta FROM RESPUESTA WHERE Pregunta_Id=$idPreguntaABorrar");
  while($respuesta=mysqli_fetch_array($consultaRespuestas)){
    $respuestaABorrar=$respuesta['idRespuesta'];
    mysqli_query($conexion,"DELETE FROM RESPUESTA WHERE idRespuesta=$respuestaABorrar");
  }
    mysqli_query($conexion,"DELETE FROM PREGUNTA WHERE idPregunta=$idPreguntaABorrar");
}
  mysqli_query($conexion,"DELETE FROM CUESTIONARIO WHERE idCuestionario=$idCuestionarioABorrar");


  header('Location:../index.php');
 ?>
