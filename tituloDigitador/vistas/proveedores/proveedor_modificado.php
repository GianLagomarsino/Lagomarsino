<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
//include ("../master_pages/header.php");
include ("../../includes/default.php");
include('../../modelos/proveedor.php');

    
     
    
   
        
   $proveedor = new proveedor();	
	//	aca se cambian el valor de las variables globales de la clase servicio a travez del bjeto (tarea_nueva)
	//echo $_POST['nombre_tarea'];
    $proveedor->setProveedor_id		($_POST['proveedor_id']);
	$proveedor->setNombre_proveedor		($_POST['nombre_proveedor']);
	$proveedor->setDireccion_proveedor		($_POST['direccion_proveedor']);
	$proveedor->setEmail_proveedor			($_POST['email_proveedor']);
	$proveedor->setRut_proveedor           ($_POST['rut_proveedor']);
	$proveedor->setTelefono_proveedor		($_POST['telefono_proveedor']);
	$proveedor->setCelular_proveedor       ($_POST['celular_proveedor']); 

	

	
	//ultimo agregado
        
       
	
	
	
// llama a la funcion insertar y la ejecuta con los valores enviados anteriormente
        
       
        
	if(!$base_datos->sql_query($proveedor->updateProveedores()))
	{
		echo "No Fue ingresado el registro, Intentelo nuevamente";
                echo print_r($proveedor);
                Print_r($_POST);
                  echo $proveedor->updateProveedores();

               
	}
	else
	{
		echo "<script language='JavaScript'>";
		echo "alert('Proveedor ingresado correctamente');";
		echo "location = 'listar_proveedores.php'";
		echo "</script>";
	} 


?>