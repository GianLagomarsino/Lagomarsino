<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
//include ("../master_pages/header.php");
include ("../../includes/default.php");
include('../../modelos/servicio.php');
include ('../../modelos/trabajador.php');
include ('../../modelos/sucursal.php');
include ('../../modelos/cliente.php');
include ('../../modelos/tarea.php');

    $servicio = new servicio();
	$tarea = new tarea();
	$tarea->setServicio_id 	($_POST['servicio_id']);
	$tarea->setNombre_tarea	($_POST['nombre_tarea']);
	$tarea->setValor 	($_POST['valor']);
	$tarea->setFecha_tarea($_POST['fecha_tarea']);
	//$producto->setCantidad_servicio		($_POST['cantidad_servicio']);

   //echo $producto($producto_id);




			if(!$base_datos->sql_query($tarea->insert())){
				
				echo "Ingreso Erroneo, Intentelo nuevamente";
				              //POST);
                  echo $tarea->insert();
			}
			else{
	
		 $tarea_id = mysql_insert_id();
	     $result = $base_datos->sql_query($tarea->insert2($tarea_id));	
		
		echo "<script language='JavaScript'>";
		echo "alert('servicio asociado correctamente');";
		echo "location = 'listar_servicios.php'";
		echo "</script>";
				
				}
		
	
					

	
?>
</form>