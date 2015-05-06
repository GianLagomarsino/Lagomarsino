<head>
<script type="text/javascript" src="../../js/validar.js"></script>
<script type="text/javascript" src="../../js/validarut.js"></script>

<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.min.js"></script>
<?PHP 
$ruta = "../../";
$ruta_archivos= "../";

include ('../../modelos/proveedor.php');
include ("../../includes/default.php");
	  
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

	
 if($busqueda= $base_datos->sql_query($proveedor->validarRut($_POST['rut_proveedor']))){
		
		if(mysql_num_rows($busqueda)==0) {   
		
		if(!$base_datos->sql_query($proveedor->insert()))
	{
		echo "<script language='JavaScript'>";
		echo "alert('No Fue ingresado el registro, Intentelo nuevamente');";
		echo "location = 'listar_proveedores.php'";
		echo "</script>";

               
	}
	else
	{
		echo "<script language='JavaScript'>";
		echo "alert('Proveedor ingresado correctamente');";
		echo "location = 'listar_proveedores.php'";
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
</head>