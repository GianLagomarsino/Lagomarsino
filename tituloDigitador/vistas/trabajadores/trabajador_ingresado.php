<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
include ("../master_pages/header.php");
include ("../../includes/default.php");
    include('../../modelos/trabajador.php');

    
    
     
    
   
        
        $trabajador = new trabajador();	
//	aca se cambian el valor de las variables globales de la clase servicio a travez del bjeto (tarea_nueva)
	//echo $_POST['nombre_tarea']
	
    $trabajador->setTrabajador_id		($_POST['trabajador_id']);
    $trabajador->setNombre		($_POST['nombre']);
	$trabajador->setApellido_paterno		($_POST['apellido_paterno']);
	$trabajador->setApellido_materno			($_POST['apellido_materno']);
	$trabajador->setRut          ($_POST['rut']);
	$trabajador->setDireccion		($_POST['direccion']);
	$trabajador->setTelefono                   ($_POST['telefono']); 
	$trabajador->setCelular                   ($_POST['celular']); 
	$trabajador->setSueldo                   ($_POST['sueldo']); 
	
	//ultimo agregado
        
       
	
	
	
// llama a la funcion insertar y la ejecuta con los valores enviados anteriormente
        
    if($busqueda= $base_datos->sql_query($trabajador->validarRut($_POST['rut']))){
		
		if(mysql_num_rows($busqueda)==0) {   
        
	if(!$base_datos->sql_query($trabajador->insert()))
	{
			echo "<script language='JavaScript'>";
		echo "alert('No fue ingresado el cliente');";
		
		echo "window.history.back()";
		echo "</script>";

               
	}
	else
	{
		echo "<script language='JavaScript'>";
		echo "alert('Trabajador ingresado correctamente');";
		
		echo "location = 'listar_trabajadores.php'";
		echo "</script>";
	} 

		}
		
	

		else{
			
		
		echo "<script language='JavaScript'>";
		echo "alert('El rut ya se encuentra registrado');";
		echo "window.history.back()";
		echo "</script>";
		}
	}		
?>