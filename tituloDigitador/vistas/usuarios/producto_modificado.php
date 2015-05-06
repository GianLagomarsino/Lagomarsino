<?PHP 
$ruta = "../../";
$ruta_archivos= "../";

	//include ('../master_pages/header.php');
	include ('../../includes/default.php');
	//include ('../../modelos/usuario.php');
	$usuario = new usuario();
?>
<?php	  
	    $usuario->setLogin	($_POST['login']);
	$usuario->setPassword	($_POST['password']);
	$usuario->setRut	($_POST['rut']);
	$usuario->setNombre_usuario ($_POST['nombre_usuario']);
	$usuario->setApellido_paterno_usuario ($_POST['apellido_paterno_usuario']);
	$usuario->setApellido_materno_usuario($_POST['apellido_materno_usuario']);
	$usuario->setTelefono_usuario ($_POST['telefono_usuario']);
	$usuario->setCelular_usuario ($_POST['celular_usuario']);
	$usuario->setDireccion($_POST['direccion']);
	$usuario->setEmail ($_POST['email']);
	$usuario->setFecha_creacion ($_POST['fecha_creacion']);
	$usuario->setFecha_modificacion ($_POST['fecha_modificacion']);


	$busqueda= mysql_query($usuario_nuevo->validarRut()); 
	$busqueda2=mysql_query($usuario_nuevo->validarUsuario());
	$busqueda3=mysql_query($usuario_nuevo->validarRutUser());
	
		
        
                            if(!$base_datos->sql_query($usuario->updateUsuarios()))
	{
                          			echo "<script language='JavaScript'>";
									echo "alert('Usuario no se ha actualizado correctamente');";
									//echo "location = 'modificar_productos.php'";
									echo "</script>";
                    }
                    else
                    {
                           {
									echo "<script language='JavaScript'>";
									echo "alert('Usuario Actualizado Correctamente');";
									echo "location = 'listar_usuarios.php'";
									echo "</script>";
	} 
	 } 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
