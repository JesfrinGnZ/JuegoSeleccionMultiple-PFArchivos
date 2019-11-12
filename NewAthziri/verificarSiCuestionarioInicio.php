<?php
echo rand(1,800);

include("conexion.php");
$codCuestionarioJugado=$_SESSION['codCuesJugado'];
$query="SELECT C.Activo
              FROM CUESTIONARIO C INNER JOIN CUESTIONARIO_REALIZADO CR ON CR.Cuestionario_Id = C.idCuestionario WHERE CR.CodigoGenerado=$codCuestionarioJugado AND C.Activo = '0'";
$resultadoQuery=mysqli_query($conexion,$query)or die("Algo ha salido mal en la consulta");
if($resultadoQuery->num_rows>0){
?>
<script>
window.location.href = "vistaLeePregunta.php";
</script>

<?php//Si no colocar el mensaje y las imagenes
}

 ?>
