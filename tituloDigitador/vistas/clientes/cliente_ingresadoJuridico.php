<?PHP 
    include('../../includes/default.php');
    //include ('../master_pages/header.php');
    
	include('../../modelos/cliente.php');
	include  ('../../modelos/juridico.php');
    
    
    $cliente = new cliente();
	$juridico = new juridico();
	
	$cliente->setRut	($_POST['rut']);
	$cliente->setDireccion($_POST['direccion']);
	$cliente->setComuna ($_POST['comuna']);
	$cliente->setCiudad ($_POST['ciudad']);
	$cliente->setTelefono ($_POST['telefono']);
	$cliente->setCelular ($_POST['celular']);
	$cliente->setEmail ($_POST['email']);
	$cliente->setBanco	($_POST['banco']);
	$cliente->setFecha_creacion ($_POST['fecha_creacion']);
	$cliente->setFecha_modificacion ($_POST['fecha_modificacion']);
	$cliente->setFecha_creacion ($_POST['fecha_creacion']);
	$cliente->setFecha_modificacion ($_POST['fecha_modificacion']);
	
	$juridico->setNombre_empresa	($_POST['nombre_empresa']);
	$juridico->setRazon_social	($_POST['razon_social']);
	$juridico->setGiro ($_POST['giro']);
	$juridico->setRepresentante_legal($_POST['representante_legal']);

if($busqueda= $base_datos->sql_query($cliente->validarRut($_POST['rut']))){
		
		if(mysql_num_rows($busqueda)==0) {
 $result = $base_datos->sql_query($cliente->insert());
					$juridico->setCliente_id(mysql_insert_id());
					//echo $cliente_id;
				//$cliente_natural->setClientes_cliente_id(mysql_insert_id());
			
				if(!$base_datos->sql_query($juridico->insert())){
					
					
					
					
					echo "<script language='JavaScript'>";
					 echo "alert('Error al ingresar cliente juridico');";
     				 echo "window.history.back()";
     				 echo "</script>";
					}
					else
					{
					echo "<script language='JavaScript'>";
					 echo "alert('cliente ingresado correctamente');";
     				 echo "location = 'listar_clientesJuridico.php'";
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