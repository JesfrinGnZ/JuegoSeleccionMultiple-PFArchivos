<?php
//session_start();
include("../conexion.php");

//recuperadas de post
$resp = $_POST["respuesta"];
$nick = $_POST["nick"];//
$idPreg = $_POST["idPreg"];
$codCuest = $_POST["codCuest"];

//$nickname= $_SESSION['nickname'];
//$codCuest = $_SESSION['codCuesJugado'];

//para hacer el insert
$correcta = 0;
$idJugador = 1; //recuperar con el nick
//el id de la pregunta

//recuperando $idJugador
$jugador =  $conexion->query("SELECT * FROM JUGADOR WHERE NIckName = '$nick' AND CodigoCuestionario = '$codCuest' LIMIT 1");

foreach ($jugador as $filac) {
  $idJugador = $filac["idJugador"]; //guarda el id del jugador
}

//recuperacion de las respuestas de la pregunta
$respuestas =  $conexion->query("SELECT R.idRespuesta, R.Descripcion,R.No_Respuesta, R.Pregunta_Id,R.esCorrecta, P.idPregunta, P.Cuestionario_Id_Pregunta
    FROM RESPUESTA R INNER JOIN PREGUNTA P ON R.Pregunta_Id = P.idPregunta WHERE P.idPregunta = '$idPreg'");

//temporales para almacenar respuestas recuperadas de preguntas si tiene si es porque no se le ha asignado nada
$r1 = "si";
$r2 = "si";
$r3 = "si";
$r4 = "si";

foreach ($respuestas as $fila2) {
  if ($r1 == "si") {
        $r1 = $fila2;
  } else if ($r2 == "si") {
        $r2 = $fila2;
  } else  if ($r3 === "si") {
        $r3 = $fila2;
  } else  if ($r4 == "si") {
        $r4 = $fila2;
  }
}

//verificando que respuesta eligio
if ($resp == 1) {
  // code...
  $correcta = $r1["esCorrecta"];
} else if ($resp == 2) {
  // code...
  $correcta = $r2["esCorrecta"];
} else if ($resp == 3) {
  // code...
  $correcta = $r3["esCorrecta"];
} else {
  $correcta = $r4["esCorrecta"];

}

//guardando respuesta jugador
$guardar = mysqli_query($conexion,"INSERT INTO RESPUESTA_JUGADOR VALUES (null,'$correcta','$idJugador','$idPreg','$codCuest')");

?>
