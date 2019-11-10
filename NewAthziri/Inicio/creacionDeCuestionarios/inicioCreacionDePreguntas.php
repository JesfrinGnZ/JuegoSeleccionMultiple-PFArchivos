<?php

session_start();  if (!isset($_SESSION["logueado"])){ header("Location:../index.php"); exit(); }
$NombreCuestionario = $_POST['nombreC'];
$DescripcionCuestionario = $_POST['descripcionC'];
//echo "***********************<br>";
//echo "<a>".$NombreCuestionario."</a><br>";
//echo "<a>".$DescripcionCuestionario."</a><br>";
//echo "<a>".$_SESSION['nombreDeCuestionario']."</a><br>";
//echo "<a>".$_SESSION['descripcionCuestionario']."</a><br>";
//echo "***********************<br>";
if ($_SESSION['nombreDeCuestionario']==null and $_SESSION['descripcionCuestionario']==null) {
    //Se asignaran los valores y se creara el cuestionario
    $_SESSION['seCreoPregunta']=null;
    //echo "<a>SE CREO EL CUESTIONARIO</a><br>";
    include("../../conexion.php");
    $_SESSION['nombreDeCuestionario']=$NombreCuestionario;
    $_SESSION['descripcionCuestionario']=$DescripcionCuestionario;
    $User=$_SESSION['User'];
    $guardar = mysqli_query($conexion,"INSERT INTO CUESTIONARIO(Nombre,Descripcion,Admin_User) VALUES ('$NombreCuestionario','$DescripcionCuestionario','$User')");
    $consultaUltimoCuestionario = mysqli_query($conexion,"SELECT * FROM CUESTIONARIO order by idCuestionario DESC LIMIT 1");
    while($cuestionario = mysqli_fetch_array($consultaUltimoCuestionario)){
      //echo $cuestionario['idCuestionario'];
      $_SESSION['idCuestionario']=$cuestionario['idCuestionario'];
    }
}else{
  //echo "<a>Existio un error y el cuestionario no se pudo crear</a><br>";
}
  //echo "guardado actual:".$_SESSION['idCuestionario'];
 ?>
