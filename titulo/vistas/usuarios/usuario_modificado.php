<?php
	//	include ("../master_pages/header.php");
	$ruta = "../../";
	$ruta_archivos= "../";

	include ("../../includes/default.php");
	
	include('../../modelos/usuario.php');

    
    
     
  
    $usuario = new usuario();	
		
		
    $usuario->setUsuario_id		     ($_POST['usuario_id']);
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
//	$usuario->setFecha_creacion                  ($_POST['Fecha_creacion']); 
	$usuario->setFecha_modificacion				 ($_POST['fecha_modificacion']);
	$usuario->setPrivilegios                   ($_POST['privilegios']); 	
   
   if(!$base_datos->sql_query($usuario->updateUsuario()
))
	{
		echo "ERROR, Los Registros no Se Modificaron Con Exito";
		echo print_r($usuario);
		echo $usuario->updateUsuario();

	}
	else
	{
		echo "<script language='JavaScript'>";
		echo "alert('Usuario Modificado correctamente');";
		echo "location = 'listar_usuarios.php'";
		echo "</script>";
	} 


?> 