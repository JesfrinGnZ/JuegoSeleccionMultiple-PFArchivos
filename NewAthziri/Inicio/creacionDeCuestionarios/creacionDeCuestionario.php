<?php
session_start();  if (!isset($_SESSION["logueado"])){ header("Location:../index.php"); exit(); }

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
              <li><a href="salir.php"><h5>Cerrar Sesion</h5></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
  </div>

    <body>
      <form action="crearPreguntas.php" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Nombre de cuestionario</label>
          <input type="text" name="nombreC" class="form-control" id="exampleInputPassword1" placeholder="Descripcion">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Descripcion</label>
        <input type="text" name="descripcionC" class="form-control" id="exampleInputPassword1" placeholder="Descripcion">
        </div>
        <input type="submit" name="" value="Crear">
      </form>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    </body>

</html>
