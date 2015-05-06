<?php
include ("../../includes/default.php");
include ("../../modelos/servicio.php");

$servicio = new servicio();

$servicio_id = $_GET['servicio_id'];
$result = $base_datos->sql_query($servicio->eliminarServicio($servicio_id));


      echo "<script language='JavaScript'>";
      echo "location = 'listar_servicios.php'";
      echo "</script>";

?>
