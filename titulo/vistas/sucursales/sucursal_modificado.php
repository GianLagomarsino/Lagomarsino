<?php
	$ruta = "../../";
	$ruta_archivos= "../";
	include ("../master_pages/header.php");
	include ("../../includes/default.php");
    include('../../modelos/sucursal.php');

    $sucursal = new sucursal();	
		
		
    $sucursal->setSucursal_id		($_POST['sucursal_id']);
    $sucursal->setNombre_sucursal		($_POST['nombre_sucursal']);
	$sucursal->setNombre_encargado		($_POST['nombre_encargado']);
	$sucursal->setDireccion_sucursal			($_POST['direccion_sucursal']);
 	$sucursal->setCiudad		($_POST['ciudad']);
	$sucursal->setTelefono			($_POST['telefono']);
	$sucursal->setEmail		($_POST['email']);
	$sucursal->setRut			($_POST['rut']);
	$sucursal->setGiro			($_POST['giro']);
	//$sucursal->setServicio_id			($_POST['servicio_id']);
	
  if(!$base_datos->sql_query($sucursal->updateSucursal()))
	{

		echo "ERROR, Los Registros no Se Modificaron Con Exito";
		echo print_r($sucursal);
		echo $sucursal->updateSucursal();
               

               
	}
	else
	{
		echo "<script language='JavaScript'>";
		echo "alert('Sucursal ingresada correctamente');";
		
		echo "location = 'listar_sucursales.php'";
		echo "</script>";
	} 


?> 