<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css">

    .content {
    	width:600px;
    	height:400px;
    	margin:0px auto;
    	text-align:center;
    	background-color:#ffffff;
    }

    .content img {
    	vertical-align:middle;
      horizontal-align:middle;
    }


</style>
  </head>
  <body>

<div class="content">
  <img src="../Imagenes/cargando.gif" width="550" height="200" />
  <img src="../Imagenes/EsperaunMomento.png" width="580" height="150" />

  <?php
  $numCuest = $_GET['idCuest'];
  echo "<h2>Mientras todos se conectan al cuestionario $numCuest.</h2>";
   ?>

</div>


  </body>
</html>
