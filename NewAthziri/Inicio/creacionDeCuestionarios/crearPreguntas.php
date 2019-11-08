<?php
session_start();  if (!isset($_SESSION["logueado"])){ header("Location:../index.php"); exit(); }
$NombreCuestionario = $_POST['nombreC'];
$DescripcionCuestionario = $_POST['descripcionC'];
//echo "***********************<br>";
//echo "<a>".$NombreCuestionario."</a><br>";
//echo "<a>".$DescripcionCuestionario."</a><br>";
//echo "***********************<br>";
if ($_SESSION['nombreDeCuestionario']==null and $_SESSION['descripcionCuestionario']==null) {
    //Se asignaran los valores y se creara el cuestionario
    echo "<a>SE CREO EL CUESTIONARIO</a><br>";
    include("../../conexion.php");
    $_SESSION['nombreDeCuestionario']=$NombreCuestionario;
    $_SESSION['descripcionCuestionario']=$DescripcionCuestionario;
    $User=$_SESSION['User'];
    $guardar = mysqli_query($conexion,"INSERT INTO CUESTIONARIO(Nombre,Descripcion,Admin_User) VALUES ('$NombreCuestionario','$DescripcionCuestionario','$User')");
}else{
//  echo "No se asignaorpn valores<br>";
  $_SESSION["logueado"]="si";
//  echo "<a>".$_SESSION['nombreDeCuestionario']."</a><br>";
//  echo "<a>".$_SESSION['descripcionCuestionario']."</a><br>";
}

 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" href="../css/styleInicio.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script>
    function noatras(){
  window.location.hash="no-back-button";
  window.location.hash="Again-No-back-button"
  window.onhashchange=function(){
                      window.location.hash="no-back-button";
                      }
  }
</script>
  </head>
  <div class="">
    <header>
      <nav class="navbar navbar-default navbar-static-top navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
              <span class="sr-only"> Menu </span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <a href="index.php" class="navbar-brand"> <h4>Inicio || Athziri</h4> </a>
          </div>

          <div class="collapse navbar-collapse" id="navbar-1">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="salir.php"><h5>Terminar Cuestionario</h5></a>
              </li>
              <li>
                <a href="salir.php"><h5>Cancelar Cuestionario</h5></a>
              </li>
              <li>
                <a href="salir.php"><h5>Cerrar Sesion</h5></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
  </div>
  <body onload="noatras();">

<h1>Creacion de pregunta</h1>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
 <input class="tex-center" type="text" name="postre" id="postre" placeholder="Ingrese la pregunta">

    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <div class="input-group-text">
    <input type="checkbox" aria-label="Checkbox for following text input" >
    </div>
    </div>
    <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Ingrese respuesta 1">
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <div class="input-group-text">
    <input type="checkbox" aria-label="Checkbox for following text input" >
    </div>
    </div>
    <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Ingrese respuesta 2">
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <div class="input-group-text">
    <input type="checkbox" aria-label="Checkbox for following text input" >
    </div>
    </div>
    <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Ingrese respuesta 3">
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <div class="input-group-text">
    <input type="checkbox" aria-label="Checkbox for following text input" >
    </div>
    </div>
    <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Ingrese respuesta 4">
    </div>

    <div class="text-center">
  <button type="submit" class="btn btn-primary">Guardar Pregunta</button>
</div>

  </form>

    <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // Usamos la Variable Super Global $_REQUEST
      $nombrepostre = htmlspecialchars($_REQUEST['postre']);

      // Si el usuario no ingreso nombre del postre, le imprimimos un mensaje
      if (empty($nombrepostre)) {
          echo "Por favor, escriba el nombre del Postre que desea Pedir";
      } else {
          echo $nombrepostre; // Imprimimos el nombre del postre que ingreso el usuario
      }
  }
?>

  </body>

</html>
