<?php
 //include database configuration file
 include("../conexion.php");
session_start( );

 $claveCuestionario = $_SESSION['codCuesJugado'];
 $nicknamePlayer = $_SESSION['nickname'];

 //get records from database
 $consultaTabla = "SELECT JUGADOR.NickName, PREGUNTA.Descripcion, RESPUESTA_JUGADOR.Correcta,
CUESTIONARIO_REALIZADO.CodigoGenerado, CUESTIONARIO.Nombre
FROM RESPUESTA_JUGADOR
INNER JOIN JUGADOR ON RESPUESTA_JUGADOR.Jugador_Id=JUGADOR.idJugador
INNER JOIN CUESTIONARIO_REALIZADO ON JUGADOR.CodigoCuestionario=CUESTIONARIO_REALIZADO.CodigoGenerado
INNER JOIN CUESTIONARIO ON CUESTIONARIO_REALIZADO.Cuestionario_Id=CUESTIONARIO.idCuestionario
INNER JOIN PREGUNTA ON RESPUESTA_JUGADOR.PREGUNTA_idPregunta=PREGUNTA.idPregunta
AND CUESTIONARIO_REALIZADO.CodigoGenerado='$claveCuestionario' AND JUGADOR.NickName='$nicknamePlayer';";

 $resultadoTabla = mysqli_query( $conexion, $consultaTabla ) or die ( "Algo ha ido mal en la consulta a la base de datos");

 if($resultadoTabla->num_rows > 0){
     $delimiter = ",";
     $filename = "members_" . date('Y-m-d') . ".csv";

     //create a file pointer
     $f = fopen('php://memory', 'w');

     //set column headers
     $fields = array('NickName', 'Pregunta','Resultado','Codigo','Cuestionario');
     fputcsv($f, $fields, $delimiter);

     //output each row of the data, format line as csv and write to file pointer
     while($row = $resultadoTabla->fetch_assoc()){
         $lineData = array($row['NickName'], $row['Descripcion'], $row['Correcta'], $row['CodigoGenerado'],$row['Nombre']);
         fputcsv($f, $lineData, $delimiter);
     }

     //move back to beginning of file
     fseek($f, 0);

     //set headers to download file rather than displayed
     header('Content-Type: text/csv');
     header('Content-Disposition: attachment; filename="' . $filename . '";');

     //output all remaining data on a file pointer
     fpassthru($f);
 }
 exit;

 ?>
