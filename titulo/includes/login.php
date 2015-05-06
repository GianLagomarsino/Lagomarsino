<?php


    // Activar mostrar errores
include ("valida_login.php");
include ("../modelos/usuario.php");
include ("../includes/default.php");
//usuario y clave pasados por el formulario
$usuario = new usuario;

$user = $_POST["login"];

$pass = $_POST["password"];


;
//usa la funcion conexiones() que se ubica dentro de funciones.php
if (conexiones($user,$pass)){
	
       
					 $result = $base_datos->sql_query($usuario->validarPrivilegios($user, $pass));

					if($row = $base_datos->sql_fetch_assoc($result)) {
						
					  $privilegios              = $row['privilegios'];
					  
					  
if ($privilegios == "Administrador"){

    //si es valido accedemos a ingreso.php
	echo "<script>window.location.href='../vistas/index/index.php';</script>";
	//echo "pasa";
	
} else {
	echo "<script>window.location.href=' ../../tituloDigitador/vistas/index/index.php';</script>";
	

}
	


	}

}

else {
	echo "<script>alert('Verifique los datos de ingreso');
		window.location.href='../../sign-in.php';</script>";
	
	
}
?>

