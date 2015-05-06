<?php
include ("../../includes/default.php");
include ("../../modelos/trabajador.php");

$trabajador = new trabajador();

$trabajador_id = $_GET['trabajador_id'];
$result = $base_datos->sql_query($trabajador->eliminarTrabajador($trabajador_id));


      echo "<script language='JavaScript'>";
      echo "location = 'listar_trabajadores.php'";
      echo "</script>";

?>
