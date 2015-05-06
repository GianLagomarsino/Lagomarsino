<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
//include ("../master_pages/header.php");
include ("../../includes/default.php");
include('../../modelos/servicio.php');
include ('../../modelos/trabajador.php');
include ('../../modelos/sucursal.php');
include ('../../modelos/cliente.php');


    
    
     
        
    $servicio = new servicio();
	$sucursal = new sucursal();
	$trabajador = new trabajador(); 
	$cliente = new cliente(); 
		 
//	aca se cambian el valor de las variables globales de la clase servicio a travez del bjeto (tarea_nueva)
	//echo $_POST['nombre_tarea'];
    $servicio->setNombre_servicio		     ($_POST['nombre_servicio']);
	$servicio->setEstado_servicio		     ($_POST['estado_servicio']);
	$servicio->setDescripcion		         ($_POST['descripcion']);
	$servicio->setFecha_creacion		         ($_POST['fecha_creacion']);
	$servicio->setFecha_modificacion		         ($_POST['fecha_modificacion']);
	$servicio->setTrabajador_id	         ($_POST['trabajador_id']);
	$servicio->setCliente_id		         ($_POST['clientes']);
	$servicio->setSucursal_id		         ($_POST['sucursal_id']);
	

	
	//ultimo agregado
        
       
	
	
	
// llama a la funcion insertar y la ejecuta con los valores enviados anteriormente
        
       
        
	if(!$base_datos->sql_query($servicio->insert()))
	{
		echo "No Fue ingresado el registro, Intentelo nuevamente";
                echo print_r($servicio);
                Print_r($_POST);
                  echo $servicio->insert();

               
	}
	else
	{
		echo "<script language='JavaScript'>";
		echo "alert('Servicio ingresado correctamente');";
		echo "location = 'listar_servicios.php'";
		echo "</script>";
	} 


?>