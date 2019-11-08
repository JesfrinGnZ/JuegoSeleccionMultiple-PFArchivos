<?php
  include("../conexion.php");

  function consultar1 ($consulta){
    $ejecutar = mysqli_query($conexion,$consulta);
    if (!$ejecutar) {
      echo "Error al consultar datos";
      // code...
      return null;
    } else {
        $paquete = mysql_fetch_array($ejecutar);
        return $paquete;
    }
  }
    function consultar ($consulta){
      $pp = $conexion->query($consulta);
      return $pp;
    }

?>
