<?php
session_start();
include("conexion.php");
$codCuestionarioJugado=$_SESSION['codCuesJugado'];
$query="SELECT * FROM CUESTIONARIO INNER JOIN CUESTIONARIO_REALIZADO WHERE CUESTIONARIO.idCuestionario=CUESTIONARIO_REALIZADO.Cuestionario_Id
        AND CUESTIONARIO.Activo='0' AND CUESTIONARIO_REALIZADO.CodigoGenerado='".$codCuestionarioJugado."'";
$resultadoQuery=mysqli_query($conexion,$query)or die("Algo ha salido mal en la consulta");
if($resultadoQuery->num_rows>0){
   ?>
   <script>
   window.location.href = "vistaLeePregunta.php";
   </script>
   <?php
}

?>
