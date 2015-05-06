<?php
include ("../../includes/default.php");
include ("../../modelos/cliente.php");
include ("../../modelos/juridico.php");


$cliente = new cliente();
$juridico = new juridico();

$cliente_id = $_GET['cliente_id'];


$result = $base_datos->sql_query($cliente->eliminarClientes($cliente_id));
$result = $base_datos->sql_query($cliente->eliminarClientesJuridicos($cliente_id));

      echo "<script language='JavaScript'>";
     
	  echo "location = 'listar_clientesJuridico.php'";
      echo "</script>";

?>
