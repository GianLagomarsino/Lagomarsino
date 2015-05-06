<?PHP
$ruta = "../../";
$ruta_archivos= "../";


	//include ('../master_pages/header.php');
	include('../../includes/default.php');
    include('../../modelos/servicio.php');
	include('../../modelos/trabajador.php');
    $servicio = new servicio();
	//$trabajador = new trabajador();
		   
                
		
		
		
		
        $servicio->setServicio_id              	($_POST['servicio_id']);
        $servicio->setNombre_servicio			($_POST['nombre_servicio']);
		$servicio->setFecha_modificacion			($_POST['fecha_modificacion']);
		
		$servicio->setDescripcion			    ($_POST['descripcion']);
	    $servicio->setSucursal_id			    ($_POST['sucursal_id']);
		$servicio->setTrabajador_id			    ($_POST['trabajador_id']);
		
		//$trabajador->setNombre			    ($_POST['nombre']);
         
		 
		  
       if(!$base_datos->sql_query($servicio->updateServicios()))
	{
        
		echo "ERROR, Los Registros no Se Modificaron Con Exito";
		echo print_r($servicio);
		echo $servicio->updateServicios();
									
									}
                    else
                    {
                           {
									echo "<script language='JavaScript'>";
									echo "alert('Servicio Actualizado Correctamente');";
									echo "location = 'listar_servicios.php'";
									echo "</script>";

	
	} 
}


	
	/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
