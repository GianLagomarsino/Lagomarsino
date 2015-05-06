<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
include ("../master_pages/header.php");
include ('../../includes/default.php');
include('../../modelos/cliente.php');
include('../../modelos/juridico.php');

    
 $cliente = new cliente();	
 $juridico = new juridico();
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
	
	//$juridico->setCliente_id ($_POST['cliente_id']);
	$juridico->setJuridico_id ($_POST['juridico_id']);
	$juridico->setNombre_empresa ($_POST['nombre_empresa']);
	$juridico->setRazon_social ($_POST['razon_social']);
	$juridico->setGiro ($_POST['giro']);
	$juridico->setRepresentante_legal ($_POST['representante_legal']);

	
	//ultimo agregado
        
       
	
	
	
// llama a la funcion insertar y la ejecuta con los valores enviados anteriormente
        
       
        
	if(!$base_datos->sql_query($cliente->updateCliente()))
	{
		echo "<script language='JavaScript'>";
		echo "alert('error en modificar cliente');";
		echo "location = 'Listar_clientesJuridico.php'";
		echo "</script>";
               
	}
	
		if(!$base_datos->sql_query($juridico->updateJuridico()))
	{
		echo "<script language='JavaScript'>";
		echo "alert('error en modificar cliente juridico');";
		echo "location = 'Listar_clientesJuridico.php'";
		echo "</script>";
               
	}
	
	
	
	
	
	else
	{
		echo "<script language='JavaScript'>";
		echo "alert('Cliente ingresado correctamente');";
		echo "location = 'Listar_clientesJuridico.php'";
		echo "</script>";
	} 

	
	
	

?>


