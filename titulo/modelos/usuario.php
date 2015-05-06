<?php
class usuario{

var $usuario_id;
var $login;
var $rut;
var $password;
var $nombre;
var $apellido_paterno;
var $apellido_materno;
var $telefono_usuario;
var $celular_usuario;
var $direccion;
var $email;
var $fecha_creacion;
var $fecha_modificacion;
var $privilegios;
var $sucursal_id;


function usuario(){
}
	//metodos Get
    function getUsuario_id() { return $this->usuario_id;}
	function getLogin() { return $this->login;}
	function getRut() { return $this->rut;}
	function getPassword() { return $this->password;}
	
	
	function getNombre() { return $this->nombre;}
	function getApellido_paterno() { return $this->apellido_paterno;}
	function getApellido_materno() { return $this->apellido_materno;}
	function getTelefono_usuario() { return $this->telefono_usuario;}
	function getCelular_usuario() { return $this->celular_usuario;}
	function getDireccion() { return $this->direccion;}
	function getEmail() { return $this->email;}
	function getFecha_creacion() { return $this->fecha_creacion;}
	function getFecha_modificacion() { return $this->fecha_modificacion;}
	function getPrivilegios() { return $this->privilegios;}
	function getSucursal_id() { return $this->sucursal_id;}	
	
	//metodos SET
		function setUsuario_id($usuario_id) { $this->usuario_id = $usuario_id; }
    	function setLogin($login) { $this->login = $login; }
    	function setRut($rut) { $this->rut = $rut; }
		function setPassword($password) { $this->password = $password; }
    	
		function setNombre($nombre) { $this->nombre = $nombre; }
    	function setApellido_paterno($apellido_paterno) { $this->apellido_paterno = $apellido_paterno; }
    	function setApellido_materno($apellido_materno) { $this->apellido_materno = $apellido_materno; }
		function setTelefono_usuario($telefono_usuario) { $this->telefono_usuario = $telefono_usuario; }
    	function setCelular_usuario($celular_usuario) { $this->celular_usuario = $celular_usuario; }
		function setDireccion($direccion) { $this->direccion = $direccion; }
    	function setEmail($email) { $this->email = $email; }
    	function setFecha_creacion($fecha_creacion) { $this->fecha_creacion = $fecha_creacion; }
		function setFecha_modificacion($fecha_modificacion) { $this->fecha_modificacion = $fecha_modificacion; }
    	function setPrivilegios($privilegios) { $this->privilegios = $privilegios; }
		function setSucusal_id($sucusal_id) { $this->sucusal_id = $sucusal_id; }
    	
		
		

	function getClientesById($usuario_id, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM usuarios WHERE usuario_id = '$usuario_id'");
		if ($row = $base_datos->sql_fetch_assoc($result)) {

			$this->setUsuario_id              ($row['usuario_id']);
			$this->setLogin		  ($row['login']);
			$this->setPassword               ($row['password']);
			$this->setRut                ($row['rut']);    
			$this->setNombre		  ($row['nombre']);
			$this->setApellido_paterno               ($row['apellido_paterno']);
			$this->setApellido_materno                    ($row['apellido_materno']);
			$this->setTelefono_usuario           ($row['telefono_usuario']);
			$this->setCelular_usuario      ($row['celular_usuario']);
			$this->setDireccion                 ($row['direccion']);
			$this->setEmail		              ($row['email']);
			$this->setFecha_creacion          ($row['fecha_creacion']);
			$this->setFecha_modificacion      ($row['fecha_modificacion']);
			$this->setPrivilegios      ($row['privilegios']);
			$this->setSucusal_id      ($row['sucusal_id']);			
			
			return true;
		}
		else {
			return false;
		}
	}
	
 	

	function insert() {
 		$insert =  "insert into usuarios(login, rut, password, nombre, apellido_paterno, apellido_materno, telefono_usuario, celular_usuario, direccion, email, fecha_creacion, fecha_modificacion , privilegios) VALUES(
				
				'".$this->login."',
				'".$this->rut."',
				'".$this->password."',
				'".$this->nombre."',
        		'".$this->apellido_paterno."',
				'".$this->apellido_materno."',
				'".$this->telefono_usuario."',
				'".$this->celular_usuario."',
				'".$this->direccion."',
				'".$this->email."',
				'".$this->fecha_creacion."',
				'".$this->fecha_modificacion."',
				'".$this->privilegios."');";
				
				
				
			
			
     return $insert;
	
	}
	//'".$this->fecha_creacion."',
		//		'".$this->fecha_modificacion."',
				
	
	function listarUsuario()
	{
		return "select * from usuarios ";
	}

	
		
		function listarUsuariosName($nombre_buscado){
	
		return "select * from usuarios  WHERE login like '%$nombre_buscado%'";
		}

	
	function validarRut($rut)
	{
		return "SELECT * FROM usuarios WHERE rut='$rut'";


		
	}
	
		function validarEmail($email)
	{
		return "SELECT * FROM usuarios WHERE email='$email'";


		
	}
		function validarLogin($login)
	{
		return "SELECT * FROM usuarios WHERE login='$login'";


		
	}	
	
			function validarPrivilegios($login, $password)
	{
		return "SELECT privilegios FROM usuarios WHERE login='$login' and password='$password' ";


		
	}
	
	function updateUsuario()
		{
			
			$updateUsuario=  "update usuarios set
			usuario_id = ".$this->usuario_id.",
			login = '".$this->login."',
			rut = '".$this->rut."',
			password = '".$this->password."',
			nombre = '".$this->nombre."',
			apellido_paterno = '".$this->apellido_paterno."',
			apellido_materno = '".$this->apellido_materno."',
			telefono_usuario = ".$this->telefono_usuario.",
			celular_usuario = ".$this->celular_usuario.",
			direccion = '".$this->direccion."',
			fecha_modificacion = '".$this->fecha_modificacion."',
			email = '".$this->email."',

			
			privilegios = '".$this->privilegios."'			
			where usuario_id = ".$this->usuario_id."";
			
			
			return $updateUsuario;
			
	}
		//fecha_creacion = '".$this->fecha_creacion."',
			//fecha_modificacion = '".$this->fecha_modificacion."',
	
	
	
			  function eliminarUsuario($usuario_id){
              return  "delete from usuarios where usuario_id =".$usuario_id;
  }


function validateLogin() {
		return "SELECT * FROM usuarios WHERE login = '".$this->login."' AND password = '".$this->password."'";
	}

	function login () {
		session_start();
		$_SESSION['login'] = $this->privilegio;

	}

	function isLogin() {
		session_start();
    return $_SESSION['login'] ? true : false;
	}

	function logout() {
		session_start();
		if(isset($_SESSION['login']))
		  unset($_SESSION['login']);
		session_destroy();
	}
		
function contarUsuarios() {
		return
		 "SELECT count(*) as number
FROM usuarios";
	}

function contarUsuariosNombre($nombre_buscado) {
		return
		 "SELECT count(*) as number
FROM usuarios where login like '%$nombre_buscado%'";
	}
	
}
?>