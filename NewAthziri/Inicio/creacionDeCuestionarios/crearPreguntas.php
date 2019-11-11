<?php
include("inicioCreacionDePreguntas.php");
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" >
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
    function noatras(){
  window.location.hash="no-back-button";
  window.location.hash="Again-No-back-button"
  window.onhashchange=function(){
                      window.location.hash="no-back-button";
                      }
  }

  function validaCampos(){

  var pregunta = $("#pregunta").val();
  var r1 = $("#r1").val();
  var r2 = $("#r2").val();
  var r2 = $("#r3").val();
  var r2 = $("#r4").val();

  //
  var c1 = document.getElementById('rc1').checked;
  var c2 = document.getElementById('rc2').checked;
  var c3 = document.getElementById('rc3').checked;
  var c4 = document.getElementById('rc4').checked;


  //validamos campos
  if(!c1 && !c2 && !c3 && !c4){
    toastr.error("Debe seleccionar al menos una respuesta correcta","Aviso!");
    return false;
  }

  if($.trim(pregunta) == "" || $.trim(r1)=="" || $.trim(r2)=="" || $.trim(r3)=="" || $.trim(r4)==""){
  toastr.error("No ha ingresado datos obligatorios","Aviso!");
    return false;
  }

  }

  function mostrarMensajeDeTerminado(){
    alert("Cuestionario Guardado");
    return true;
  }

  function mostrarMensajeDeBorrado(){
    alert("Cuestionario Borrado");
    return true;
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
                <a  onclick="mostrarMensajeDeTerminado();" href="terminarCuestionario.php"><h5>Terminar Cuestionario</h5></a>
              </li>
              <li>
                <a onclick="mostrarMensajeDeBorrado();" href="borrarCuestionario.php"><h5>Cancelar Cuestionario</h5></a>

              </li>
              <li>
                <a href="../salir.php"><h5>Cerrar Sesion</h5></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
  </div>
  <body onload="noatras();" background="../img/fondo 1.png">

<h2>Creacion de pregunta, cuestionario:<?php echo $_SESSION['nombreDeCuestionario']; ?></h2>

</script>
<div class="container">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  onsubmit="return validaCampos();">
                          <div class="form-group">
                              <label for="nombre">
                                <h4><span class="label label-primary">Pregunta*</span></h4>
                                </label>
                              <input class="form-control" id="pregunta" name="pregunta" type="text" placeholder="Ingrese pregunta"></input>
                          </div>
                          <div class="form-group">
                              <label for="edad">
                                <h4><span class="label label-success">Respuesta1*</span></h4>
                              </label>
                              <input class="form-control" id="r1" name="r1" type="text" placeholder="Ingrese respuesta"></input>
                          </div>
                          <div class="form-group">
                              <label for="edad">
                                <h4> <span class="label label-warning">Respuesta2*</span></h4>
                              </label>
                              <input class="form-control" id="r2" name="r2" type="text" placeholder="Ingrese respuesta"></input>
                          </div>
                          <div class="form-group">
                              <label for="edad">
                                <h4><span class="label label-danger">Respuesta3*</span></h4>
                              </label>
                              <input class="form-control" id="r3" name="r3" type="text" placeholder="Ingrese respuesta"></input>
                          </div>
                          <div class="form-group">
                              <label for="edad">
                                <h4><span class="label label-info">Respuesta4*</span></h4>
                              </label>
                              <input class="form-control" id="r4" name="r4" type="text" placeholder="Ingrese respuesta"></input>
                          </div><br>

                          <h4><label for="">Escoja las respuestas correctas</label><br></h4>
                          <label for="test">
                          <input type="checkbox" name="rc1" id="rc1">
                          Respuesta 1
                          </label><br>
                          <label for="test">
                          <input type="checkbox" name="rc2" id="rc2">
                          Respuesta 2
                          </label><br>
                          <label for="test">
                          <input type="checkbox" name="rc3" id="rc3">
                          Respuesta 3
                          </label><br>
                          <label for="test">
                          <input type="checkbox" name="rc4" id="rc4">
                          Respuesta 4
                        </label><br><br>

                        <h4><label for="">Escoja el tiempo de respuesta</label></h4>
                          <select name="tiempo" id="tiempo" class="browser-default custom-select">
                            <option value="20">20s</option>
                            <option value="30">30s</option>
                            <option value="40">40s</option>
                            <option value="50">50s</option>
                            <option value="60">60s</option>
                          </select>


                          <div class="text-center">
                            <input  type="submit" class="btn btn-success" value="Crear pregunta">
                          </div>
  </form>

                     <h3><span class="label label-danger">Preguntas creadas</span></h3><br>


   <?php

   //echo "EMPEZANDO A REALIZAR ACCIONES ";
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // Usamos la Variable Super Global $_REQUEST
       $nombreDePregunta = htmlspecialchars($_REQUEST['pregunta']);
       if (!empty($nombreDePregunta)){//Aca se trabajara con las preguntas
    //       echo "Se crearan las preguntas";
  //         echo "Tiempo:".$_POST['tiempo']."<br>";
           //Valores
           $descripcion=$_POST['pregunta'];
           $tiempo=$_POST['tiempo'];
           $idCuestionario=$_SESSION['idCuestionario'];
           include("../../conexion.php");
           //Guardar la pregunta
            $guardar2=mysqli_query($conexion,"INSERT INTO PREGUNTA(Descripcion,Tiempo,Cuestionario_Id_Pregunta) VALUES ('$descripcion','$tiempo','$idCuestionario')");
          //Obtener el id de la pregunta
          $preguntaCreada = mysqli_query($conexion,"SELECT * FROM PREGUNTA order by idPregunta DESC LIMIT 1");
          while($pregunta = mysqli_fetch_array($preguntaCreada)){
          //  echo "Id de pregunta guardada:".$pregunta['idPregunta'];
            $idDePreguntaCreada=$pregunta['idPregunta'];
          }
         //Se crean las respuestas
          if (isset($_POST["rc1"])) {
            $respuestaEsCorrecta="1";
          } else {
            $respuestaEsCorrecta="0";
          }
          $descripcion=$_POST['r1'];
          $guardar3=mysqli_query($conexion,"INSERT INTO RESPUESTA(Descripcion,No_Respuesta,Simbolo,Color,Pregunta_Id,esCorrecta) VALUES ('$descripcion','1','cuadrado','verde','$idDePreguntaCreada','$respuestaEsCorrecta')");

          if (isset($_POST["rc2"])) {
            $respuestaEsCorrecta="1";
          } else {
            $respuestaEsCorrecta="0";
          }
          $descripcion=$_POST['r2'];
          $guardar3=mysqli_query($conexion,"INSERT INTO RESPUESTA(Descripcion,No_Respuesta,Simbolo,Color,Pregunta_Id,esCorrecta) VALUES ('$descripcion','2','triangulo','amarillo','$idDePreguntaCreada','$respuestaEsCorrecta')");

          if (isset($_POST["rc3"])) {
            $respuestaEsCorrecta="1";
          } else {
            $respuestaEsCorrecta="0";
          }
          $descripcion=$_POST['r3'];
          $guardar3=mysqli_query($conexion,"INSERT INTO RESPUESTA(Descripcion,No_Respuesta,Simbolo,Color,Pregunta_Id,esCorrecta) VALUES ('$descripcion','3','circulo','rojo','$idDePreguntaCreada','$respuestaEsCorrecta')");

          if (isset($_POST["rc4"])) {
            $respuestaEsCorrecta="1";
          } else {
            $respuestaEsCorrecta="0";
          }
          $descripcion=$_POST['r4'];
          $guardar3=mysqli_query($conexion,"INSERT INTO RESPUESTA(Descripcion,No_Respuesta,Simbolo,Color,Pregunta_Id,esCorrecta) VALUES ('$descripcion','4','rombo','celeste','$idDePreguntaCreada','$respuestaEsCorrecta')");

  //Se cargan las preguntas y respuestas creados de la pregunta para colocarlos eb una mysql_tabla

  $preguntasCreadas = mysqli_query($conexion,"SELECT idPregunta,Descripcion,Tiempo FROM PREGUNTA WHERE Cuestionario_Id_Pregunta=$idCuestionario");

  echo "<table border = 2 cellspacing = 2 cellpadding = 2 class=\"table\">
  <thead class=\"thead-light\">
    <tr>
      <th scope=\"col\">Pregunta</th>
      <th scope=\"col\">Respuesta1</th>
      <th scope=\"col\">Respueta2</th>
      <th scope=\"col\">Respuesta3</th>
      <th scope=\"col\">Respuesta4</th>
    </tr>
  </thead>
  <tbody>";
  while($pregunta = mysqli_fetch_array($preguntasCreadas)){
    //echo "Id de pregunta creada:".$pregunta['idPregunta'];
    echo " <tr>";
    $idDepreguntaActual=$pregunta['idPregunta'];
    $respuestasDePregunta =mysqli_query($conexion,"SELECT * FROM RESPUESTA WHERE Pregunta_Id=$idDepreguntaActual");
    echo "<td>".$pregunta['Descripcion']."</td> ";
    while($respuestaDePregunta=mysqli_fetch_array($respuestasDePregunta)){
      echo "<td>".$respuestaDePregunta['Descripcion']."</td> ";
    }
    echo " </tr>";
  }

  echo "  </tbody>
        </table>";
          /*function guardarRespuesta($postEsCorrecta,$postDescripcion,$noDeRespuesta,$simbolo,$color){
            echo "Guardando pregunta";
            if (isset($_POST["rc1"])) {
              $respuestaEsCorrecta="1";
            } else {
              $respuestaEsCorrecta="0";
            }
            $descripcion=$_POST['r1'];
            $guardar3=mysqli_query($conexion,"INSERT INTO RESPUESTA(Descripcion,No_Respuesta,Simbolo,Color,Pregunta_Id,esCorrecta) VALUES ('$descripcion','$noDeRespuesta','$simbolo','$color','$idDePreguntaCreada','$respuestaEsCorrecta')");
          }

          guardarRespuesta("rc1","r1",1,"cuadrado","verde");*/

          //Se jala de la base de datos todas las preguntas con sus respuestas para ponerlas en una tabla

       }else{
         echo "<h2>Aun no existen preguntas</h2>";
       }

   }

  ?>

</div>



  </body>

</html>
