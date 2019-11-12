<?php

  include("conexion.php");
  $codCuestionarioJugado=$_POST['codigoCuestionario'];
  $nickname=$_POST['nickname'];
  include("conexion.php");
  echo "<img src=\"../NewAthziri/Imagenes/cargando.gif\" width=\"550\" height=\"200\" />";

  $consultaNick = "SELECT Cuestionario_Id FROM CUESTIONARIO_REALIZADO WHERE CodigoGenerado='$codCuestionarioJugado';";
  $resultadoNick = mysqli_query( $conexion, $consultaNick ) or die ( "Algo ha ido mal en la consulta a la base de datos");
  $row_cnt = $resultadoNick->num_rows;
  if ($row_cnt==0) {
    echo "<h2>Lo sentimos el cuestionario no existe</h2>";
  }else{
      while($resultado = mysqli_fetch_array($resultadoNick)) {
        $idCuestionarioGuardado = $resultado['Cuestionario_Id'];
      }
      $consultaActivo = "SELECT * FROM CUESTIONARIO WHERE idCuestionario='$idCuestionarioGuardado' AND Activo='1';";
      $resultadoActivo = mysqli_query( $conexion, $consultaActivo ) or die ( "Algo ha ido mal en la consulta a la base de datos");
      $row_cnt2 = $resultadoActivo->num_rows;
      if ($row_cnt2>0) {
        $consultaJug = "SELECT * FROM JUGADOR INNER JOIN CUESTIONARIO_REALIZADO WHERE
                    JUGADOR.Nickname='$nickname' AND CUESTIONARIO_REALIZADO.CodigoGenerado= '$codCuestionarioJugado';";
        $resultadoJug = mysqli_query( $conexion, $consultaJug ) or die ( "Algo ha ido mal en la consulta a la base de datos");
          $row_cnt3 = $resultadoJug->num_rows;
          if ($row_cnt3==0) {
            $insertarJug = "INSERT INTO JUGADOR (Nickname, codigoCuestionario) VALUES ('$nickname','$codCuestionarioJugado');";
            $insertarJug = mysqli_query( $conexion, $insertarJug ) or die ( "Algo ha ido mal en la consulta a la base de datos");
            echo "
              <img src=\"../NewAthziri/Imagenes/EsperaunMomento.png\" width=\"580\" height=\"150\" />
              <h2>Esperando a los demas jugadores.</h2>
              <h2>Nickname:$nickname</h2>";

          }else{
            echo "<h2>El nickName que has escogido ya esta en uso.Selecciona otro</h2>";
          }

      }else{
        echo "<h2>Lo sentimos el cuestionario no esta disponible</h2>";
      }
  }


   $resultadoNick->close();
   $resultadoActivo->close();

 ?>
