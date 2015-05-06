<?PHP 
$ruta = "../../";
	$ruta_archivos= "../";

	include ('../../includes/default.php');
    include('../../modelos/cliente.php');
	include  ('../../modelos/naturales.php');
    //include('../../includes/default.php');
    
    
     
  
	
	$cliente = new cliente();
	$naturales = new naturales();
	
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

	
	$naturales->setNombre	($_POST['nombre']);
	$naturales->setApellido_Paterno	($_POST['apellido_paterno']);
	$naturales->setApellido_Materno	($_POST['apellido_materno']);
	
		
		
		if($busqueda= $base_datos->sql_query($cliente->validarRut($_POST['rut']))){
		
		if(mysql_num_rows($busqueda)==0) {
		 $result = $base_datos->sql_query($cliente->insert());
					$naturales->setCliente_id(mysql_insert_id());
					//echo $cliente_id;
				//$cliente_natural->setClientes_cliente_id(mysql_insert_id());
			
				if(!$base_datos->sql_query($naturales->insert())){
					
					
					
					
					echo "<script language='JavaScript'>";
					 echo "alert('Error al ingresar cliente natural');";
     				 echo "window.history.back()";
     				 echo "</script>";
					}
					else
					{
					echo "<script language='JavaScript'>";
					 echo "alert('cliente ingresado correctamente');";
     				 echo "location = 'listar_clientesNatural.php'";
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