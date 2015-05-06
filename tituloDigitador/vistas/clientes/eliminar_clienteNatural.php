<?php
include ("../../includes/default.php");
include ("../../modelos/cliente.php");
include ("../../modelos/naturales.php");


$cliente = new cliente();
$naturales = new naturales();

$cliente_id = $_GET['cliente_id'];


$result = $base_datos->sql_query($cliente->eliminarClientes($cliente_id));
$result = $base_datos->sql_query($cliente->eliminarClientesNaturales($cliente_id));

      echo "<script language='JavaScript'>";
     
	  echo "location = 'listar_clientesNatural.php'";
      echo "</script>";

?>
