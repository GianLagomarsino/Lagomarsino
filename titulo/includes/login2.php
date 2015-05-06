<?php


    // Activar mostrar errores

include ("login.php");
$conectar = mysql_connect("localhost","root","");
	//seleccionar la base de datos para trabajar
mysql_select_db('lagomarsino',$conectar);
//usuario y clave pasados por el formulario

$sql = "select privilegios from usuarios WHERE `login`='$user' AND `password`='$pass'";
	echo "$sql";

if ($sql = "administrador"){

    //si es valido accedemos a ingreso.php

	//echo "pasa";
	echo "$pass";
	echo "$user";	
} else {
	echo "<script>window.location.href='../tituloDigitador/vistas/index/index.php';</script>";
	

}
?>
