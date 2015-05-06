<?php
include ("../../includes/default.php");
include ("../../modelos/producto.php");
include ('../../modelos/servicio.php');

$producto = new producto();
//$servicio = new servicio();

$servicios_as_productos_id = $_GET['servicios_as_productos_id'];
//$servicio_id = $_GET['servicio_id'];

$result0 = $base_datos->sql_query($producto->updateLimpiarValor($servicios_as_productos_id));
$result1 = $base_datos->sql_query($producto->updateProductosXservicios2($servicios_as_productos_id));
$result2 = $base_datos->sql_query($producto->eliminarProductoxServicio($servicios_as_productos_id));
//echo $producto->updateProductosXservicios2($servicios_as_productos_id);
//echo $producto->eliminarProductoxServicio($servicios_as_productos_id);
     
	  echo "<script language='JavaScript'>";
      echo "location = 'listar_servicios.php'";
	  //echo "<a href='detalles_servicio.php?servicio_id=".$servicio_id."'>";
      echo "</script>";

?>
