<?php
		//include ("../master_pages/header.php");
	$ruta = "../../";
	$ruta_archivos= "../";

	include ("../../includes/default.php");
	include('../../modelos/trabajador.php');

    
    
     
  
    $trabajador = new trabajador();	
		
		
    $trabajador->setTrabajador_id		     ($_POST['trabajador_id']);
    $trabajador->setNombre		             ($_POST['nombre']);
	$trabajador->setApellido_paterno		 ($_POST['apellido_paterno']);
	$trabajador->setApellido_materno		 ($_POST['apellido_materno']);
	$trabajador->setRut          			 ($_POST['rut']);
	$trabajador->setDireccion				 ($_POST['direccion']);
	$trabajador->setTelefono                 ($_POST['telefono']); 
	$trabajador->setCelular                  ($_POST['celular']); 
	$trabajador->setSueldo                   ($_POST['sueldo']); 
       
	   
	   
	 if(!$base_datos->sql_query($trabajador->updateTrabajadores()))
	{
		echo "<script language='JavaScript'>";
		echo "alert('No se pudo modificar el trabajador');";
		echo "window.history.back()";
		echo "</script>";

	}
	else
	{
		echo "<script language='JavaScript'>";
		echo "alert('Trabajador Modificado correctamente');";
		echo "location = 'listar_trabajadores.php'";
		echo "</script>";
	} 
		
	

?> 