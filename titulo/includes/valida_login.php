<?php

//funcion para conectar a la base de datos y verificar la existencia del usuario
function conexiones($user, $pass) {
	//conexion con el servidor de base de datos MySQL
	//cambiar localhost por servidor
	//segundo espacio nombre usuario del servidor
	//espacio en blanco es contraseña
$conectar = mysql_connect("localhost","root","");
	//seleccionar la base de datos para trabajar
mysql_select_db('lagomarsino',$conectar);

//encripta la password a md5, al encriptarlo no funciona la sentencia
//$pass=md5($pass);

	//sentencia sql para consultar el nombre del usuario
$sql = "select login, password from usuarios WHERE `login`='$user' AND `password`='$pass'";

	//ejecucion de la sentencia anterior
	$ejecutar_sql=mysql_query($sql,$conectar)or die(mysql_error());

	//si existe inicia una sesion y guarda el nombre del usuario
	if (mysql_num_rows($ejecutar_sql)!=0){
		//inicio de sesion
        $fila=mysql_fetch_array($ejecutar_sql);
		session_start();
		//configurar un elemento usuario dentro del arreglo global $_SESSION
		$_SESSION['login']=$user;
		
		/*      $_SESSION['apellidop']=$fila['apellidop'];
        $_SESSION['apellidom']=$fila['apellidom'];*/
        //retornar verdadero
		return true;
	} else {
		//retornar falso
		return false;
	}
}
//funcion para verificar que dentro del arreglo global $_SESSION existe el nombre del usuario
function verificar_usuario(){
	//continuar una sesion iniciada
	session_start();
	//comprobar la existencia del usuario
	if ($_SESSION[user]){
		return true;
	}
        
}
?>