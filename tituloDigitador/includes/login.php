<?php


    // Activar mostrar errores
include ("valida_login.php");
//usuario y clave pasados por el formulario
$user = $_POST["login"];

$pass = $_POST["password"];
;
//usa la funcion conexiones() que se ubica dentro de funciones.php
if (conexiones($user,$pass)){

    //si es valido accedemos a ingreso.php
echo "<script>window.location.href='../vistas/index/index.php';</script>";
	//echo "pasa";
} else {
	echo "<script>alert('Verifique los datos de ingreso');
		window.location.href='../../sign-in.php';</script>";
	
	
}
?>
