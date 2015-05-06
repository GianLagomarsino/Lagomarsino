<?php
include ("../../includes/default.php");
include ("../../modelos/producto.php");

$producto = new producto();

$producto_id = $_GET['producto_id'];
$result = $base_datos->sql_query($producto->eliminarProducto($producto_id));


      echo "<script language='JavaScript'>";
      echo "location = 'listar_productos.php'";
      echo "</script>";

?>
