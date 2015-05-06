<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
include ('../master_pages/header.php');
include ('../../includes/default.php');
include('../../modelos/cliente.php');
include('../../modelos/naturales.php');

    
 $cliente = new cliente();	
 $naturales = new naturales();
 //	aca se cambian el valor de las variables globales de la clase servicio a travez del bjeto (tarea_nueva)
	//echo $_POST['nombre_tarea'];
   
    $cliente->setCliente_id	 ($_POST['cliente_id']);
	$cliente->setDireccion	 ($_POST['direccion']);
	$cliente->setComuna		 ($_POST['comuna']);
	$cliente->setCiudad		 ($_POST['ciudad']);
	$cliente->setTelefono    ($_POST['telefono']);
	$cliente->setCelular	 ($_POST['celular']);
	$cliente->setBanco       ($_POST['banco']); 
	$cliente->setRut         ($_POST['rut']);
	$cliente->setEmail         ($_POST['email']);
	//$cliente->setRut         ($_POST['rut']);
	$cliente->setFecha_modificacion         ($_POST['fecha_modificacion']);
	
	
	//$naturales->setCliente_id ($_POST['cliente_id']);
	//$naturales->setNaturales_id ($_POST['naturales_id']);
	$naturales->setNombre ($_POST['nombre']);
	$naturales->setApellido_paterno ($_POST['apellido_paterno']);
	$naturales->setApellido_materno ($_POST['apellido_materno']);
//	$naturales->setRepresentante_legal ($_POST['representante_legal']);

	
	//ultimo agregado
        
       
	
	
	
// llama a la funcion insertar y la ejecuta con los valores enviados anteriormente
        

        
	if(!$base_datos->sql_query($cliente->updateCliente()))
	{
		echo "<script language='JavaScript'>";
		echo "alert('Registro cliente no actualizado');";
		echo "window.history.back()";
		echo "</script>";
               
	}
	
		if(!$base_datos->sql_query($naturales->updateNatural()))
	{
		echo "<script language='JavaScript'>";
		echo "alert('Registro cliente natural no actualizado');";
		echo "window.history.back()";
		echo "</script>";
               
	}
	
	
		else{
			
		

		echo "<script language='JavaScript'>";
		echo "alert('Cliente ingresado correctamente');";
		echo "location = 'Listar_clientesNatural.php'";
		echo "</script>";

		}


?>