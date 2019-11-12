<?php
// Ejemplo de conexión a base de datos MySQL con PHP.
//
// Ejemplo realizado por Oscar Abad Folgueira: http://www.oscarabadfolgueira.com y https://www.dinapyme.com

// Datos de la base de datos
session_start();  if (!isset($_SESSION["logueado"])){ header("Location:../index.php"); exit(); }
include("../conexion.php");

//consulta para ver el nickname de los jugadores sin traslapar otros examenes;
$codigo=$_SESSION['esperandoConexion'];
$consultaNick = "SELECT JUGADOR.NickName FROM JUGADOR INNER JOIN CUESTIONARIO_REALIZADO WHERE
            JUGADOR.CodigoCuestionario=CUESTIONARIO_REALIZADO.CodigoGenerado AND JUGADOR.CodigoCuestionario = '$codigo' ORDER BY JUGADOR.NickName;";
$resultadoNick = mysqli_query( $conexion, $consultaNick ) or die ( "Algo ha ido mal en la consulta a la base de datos");

//consulta para el conteo de cuantos jugadores hay
$consultaNJugadores = "SELECT COUNT(CodigoCuestionario) AS Numero_Jugadores FROM JUGADOR WHERE CodigoCuestionario = '$codigo';";
$resultadoNJugadores = mysqli_query( $conexion, $consultaNJugadores ) or die ( "Algo ha ido mal en la consulta a la base de datos");

//resultado de cuantos jugadores hay conectados
echo "
  <table border = 2 cellspacing = 2 cellpadding = 2 class=\"table\">
    <thead class=\"thead-black\">
    <tr>
      <th id=\"Conectados\">Conectados</th>
    </tr>
    </thead>
    <tbody>";
while($extraido = mysqli_fetch_array($resultadoNJugadores)) {
  echo '<tr>';
  echo  '<td>'.$extraido['Numero_Jugadores'].'</td>';
  echo '</tr>';
  }
echo "
    </tbody>
  </table>";
 //Motrar el resultado de los registro de los jugadores (nickname)
echo "
  <table border = 2 cellspacing = 2 cellpadding = 2 class=\"table\">
    <thead class=\"thead-black\">
    <tr>
      <th>NickName</th>
    </tr>
    </thead>
    <tbody>";

// Bucle while que recorre cada registro y muestra cada campo en la tabla.
while ($columna = mysqli_fetch_array( $resultadoNick ))
{
  echo "<tr>";
  echo "<td>" . $columna['NickName']  . "</td>";
  echo "</tr>";
}
echo "
    </tbody>
  </table>";
 // Fin de la tabla

// cerrar conexión de base de datos
mysqli_close( $conexion );


?>
