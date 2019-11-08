<?php
// establishing the MySQLi connection
	session_start();
	include("conexion.php");
	//$conexion = new mysqli("localhost","root","adminmariadb","Cuestionarios");

	$user = $_POST['user'];
  $pass = $_POST['pass'];

	$resultado = $conexion->query("select * from ADMINISTRADOR where User = '$user' AND Pass='$pass' LIMIT 1");

	foreach ($resultado as $fila) {
    $_SESSION['logueado']="si";
    $_SESSION['User'] = $fila['User'];
    $_SESSION['Nombre'] = $fila['Nombre'];
    header('Location:Inicio/index.php');
  }

?>

<!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Datos Incorrectos</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
   </head>
   <body style="background-color:white;">
     <div class="container">
       <div class="row">
         <div class="col-md-6 col-md-offset-3">
           <div class="panel panel-danger">
             <div class="panel-heading"><span class="glyphicon glyphicon-warning-sign" ></span> Datos incorrectos</div>
             <div class="panel-body">
               La información ingresada no es correcta, por favor verifique los datos puede
               ser que tenga activa la tecla de Mayúsculas o bien que haya digitado un dato mal.
             </div>
             <div class="panel-footer">
               <a href="admins.php" class="btn btn-danger">Regresar</a>
             </div>
           </div>
         </div>
       </div>
       </div>
   </body>
 </html>
