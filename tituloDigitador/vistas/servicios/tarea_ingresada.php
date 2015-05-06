<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
//include ("../master_pages/header.php");
include ("../../includes/default.php");
include('../../modelos/tarea.php');


    
    
     
        
    $tarea = new tarea();

		 
//	aca se cambian el valor de las variables globales de la clase servicio a travez del bjeto (tarea_nueva)
	//echo $_POST['nombre_tarea'];
    $tarea->setNombre_tarea		     ($_POST['nombre_tarea']);
	$tarea->setValor		     ($_POST['valor']);


	
	//ultimo agregado
        
       
	
	
	
// llama a la funcion insertar y la ejecuta con los valores enviados anteriormente
        
       
        
	if(!$base_datos->sql_query($tarea->insert()))
	{
		echo "No Fue ingresado el registro, Intentelo nuevamente";


               
	}
	else
	{
		echo "<script language='JavaScript'>";
		echo "alert('Servicio ingresado correctamente');";
		echo "location = 'listar_tareas.php'";
		echo "</script>";
	} 


?>