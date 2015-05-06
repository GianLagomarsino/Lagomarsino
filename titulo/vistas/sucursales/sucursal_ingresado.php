<?PHP 
	$ruta_archivos= "../";

	$ruta = "../../";
include ("../master_pages/header.php");
include('../../modelos/sucursal.php');
include ("../../includes/default.php");




    
    
     
    
   
        
        $sucursal = new sucursal();	
//	aca se cambian el valor de las variables globales de la clase servicio a travez del bjeto (tarea_nueva)
	//echo $_POST['nombre_tarea']
	
  //  $sucursal->setSucursal_id		($_POST['sucursal_id']);
    $sucursal->setNombre_sucursal		($_POST['nombre_sucursal']);
	$sucursal->setNombre_encargado		($_POST['nombre_encargado']);
	$sucursal->setDireccion_sucursal			($_POST['direccion_sucursal']);
 	$sucursal->setCiudad		($_POST['ciudad']);
	$sucursal->setTelefono			($_POST['telefono']);
	$sucursal->setEmail		($_POST['email']);
	$sucursal->setRut			($_POST['rut']);
	$sucursal->setGiro			($_POST['giro']);

	
	//ultimo agregado
        
       
	
	
	
// llama a la funcion insertar y la ejecuta con los valores enviados anteriormente
        
       
        
	if(!$base_datos->sql_query($sucursal->insert()))
	{

				echo "alert('No Fue ingresado el registro, Intentelo nuevamente');";
                echo print_r($sucursal);
                Print_r($_POST);
                  echo $sucursal->insert();

               
	}
	else
	{
		echo "<script language='JavaScript'>";
		echo "alert('Sucursal ingresada correctamente');";
		
		echo "location = 'listar_sucursales.php'";
		echo "</script>";
	} 


?>