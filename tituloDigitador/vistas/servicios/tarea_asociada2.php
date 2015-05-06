<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
//include ("../master_pages/header.php");
include ("../../includes/default.php");
include('../../modelos/servicio.php');
include ('../../modelos/tarea.php');

    $servicio = new servicio();
	$tarea = new tarea();
	
	
	$tarea->setServicio_id 	($_POST['servicio_id']);
	$tarea->setTarea_id 	($_POST['tarea_id']);
	$tarea->setFecha_tarea($_POST['fecha_tarea']);
	//$producto->setCantidad_servicio		($_POST['cantidad_servicio']);

   //echo $producto($producto_id);




			if(!$base_datos->sql_query($tarea->insert3())){
				
		
		echo "alert('Ingreso Erroneo, Intentelo nuevamente');";
		echo "location = 'listar_servicios.php'";
		echo "</script>";
                
			}
			else{
	
		
		echo "<script language='JavaScript'>";
		echo "alert('servicio asociado correctamente');";
		echo "location = 'listar_servicios.php'";
		echo "</script>";
				
				}
		
	
					

	
?>
</form>