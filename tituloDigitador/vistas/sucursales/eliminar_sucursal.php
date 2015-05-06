<?php
include ("../../includes/default.php");
include ("../../modelos/sucursal.php");

$sucursal = new sucursal();

$sucursal_id = $_GET['sucursal_id'];
$result = $base_datos->sql_query($sucursal->eliminarSucursal($sucursal_id));


      echo "<script language='JavaScript'>";
      echo "location = 'listar_sucursales.php'";
      echo "</script>";

?>
