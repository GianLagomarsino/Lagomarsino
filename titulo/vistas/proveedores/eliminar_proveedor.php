<?php
include ("../../includes/default.php");
include ("../../modelos/proveedor.php");

$proveedor = new proveedor();

$proveedor_id = $_GET['proveedor_id'];
$result = $base_datos->sql_query($proveedor->eliminarProveedor($proveedor_id));


      echo "<script language='JavaScript'>";
      echo "location = 'listar_proveedores.php'";
      echo "</script>";

?>
