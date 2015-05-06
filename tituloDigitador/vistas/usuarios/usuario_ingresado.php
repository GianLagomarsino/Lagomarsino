<?PHP 
    $ruta = "../../";
$ruta_archivos= "../";
//include ("../master_pages/header.php");
include ("../../includes/default.php");
    include('../../modelos/usuario.php');

    
    
     
   

	$usuario = new usuario();
	
	// $usuario->setUsuario_id		     ($_POST['usuario_id']);
    $usuario->setLogin		             ($_POST['login']);
	$usuario->setRut          			 ($_POST['rut']);
	$usuario->setPassword		 ($_POST['password']);
	$usuario->setNombre		             ($_POST['nombre']);
	$usuario->setApellido_paterno		 ($_POST['apellido_paterno']);
	$usuario->setApellido_materno		 ($_POST['apellido_materno']);
	$usuario->setTelefono_usuario                 ($_POST['telefono_usuario']); 
	$usuario->setCelular_usuario                  ($_POST['celular_usuario']); 
	$usuario->setDireccion				 ($_POST['direccion']);
	$usuario->setEmail                   ($_POST['email']); 
    $usuario->setCelular_usuario                  ($_POST['celular_usuario']); 
	$usuario->setDireccion				 ($_POST['direccion']);
	$usuario->setEmail                   ($_POST['email']);
	$usuario->setPrivilegios                   ($_POST['privilegios']); 	
	$usuario->setFecha_creacion                  ($_POST['fecha_creacion']); 
    $usuario->setFecha_modificacion				 ($_POST['fecha_modificacion']);

 
 
  if($busqueda= $base_datos->sql_query($usuario->validarLogin($_POST['login']))){
		
		if(mysql_num_rows($busqueda)==0) {
if($busqueda= $base_datos->sql_query($usuario->validarEmail($_POST['email']))){
		
		if(mysql_num_rows($busqueda)==0) {
		if($busqueda= $base_datos->sql_query($usuario->validarRut($_POST['rut']))){
		
		if(mysql_num_rows($busqueda)==0) {
			
	   if(!$base_datos->sql_query($usuario->insert()
))
	{
		echo "<script language='JavaScript'>";
		echo "alert('El registro no se agrego correctamente');";
		echo "window.history.back()";
		//echo "location = 'listar_trabajadores.php'";
		echo "</script>";

	}
	else
	{
		echo "<script language='JavaScript'>";
		echo "alert('Usuario ingresado correctamente');";
		echo "location = 'listar_usuarios.php'";
		echo "</script>";
	} 

}
		
	

		else{
			
		
		echo "<script language='JavaScript'>";
		echo "alert('El rut ya se encuentra registrado');";
		echo "window.history.back()";
		//echo "location = 'listar_trabajadores.php'";
		echo "</script>";
		}
	}	
		
		}
 		else{
			
		
		echo "<script language='JavaScript'>";
		echo "alert('El email ya se encuentra registrado');";
		echo "window.history.back()";
		//echo "location = 'listar_trabajadores.php'";
		echo "</script>";
		}
		}
 }
 else{
			
		
		echo "<script language='JavaScript'>";
		echo "alert('El login ya se encuentra registrado');";
		echo "window.history.back()";
		//echo "location = 'listar_trabajadores.php'";
		echo "</script>";
		}
		
 
 
 }
 

?> 
	
