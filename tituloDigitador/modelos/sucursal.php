<?php
class sucursal{

var $sucursal_id;
var $nombre_sucursal;
var $nombre_encargado;
var $direccion_sucursal;
var $ciudad;
var $telefono;
var $email;
var $giro;
var $rut;



function sucursal(){
}
	//metodos Get
    function getSucursal_id() { return $this->sucursal_id;}
	function getNombre_sucursal() { return $this->nombre_sucursal;}
	function getNombre_encargado() { return $this->nombre_encargado;}
	function getDireccion_sucursal() { return $this->direccion_sucursal;}
	
	function getCiudad() { return $this->ciudad;}
	function getTelefono() { return $this->telefono;}
	function getEmail() { return $this->email;}
	function getGiro() { return $this->giro;}
	function getRut() { return $this->rut;}
	
	
	
	
	//function getServicio_id() { return $this->servicio_id;}
	
	
	//metodos SET
	function setSucursal_id($sucursal_id) { $this->sucursal_id = $sucursal_id; }
    function setNombre_sucursal($nombre_sucursal) { $this->nombre_sucursal = $nombre_sucursal; }
    function setNombre_encargado($nombre_encargado) { $this->nombre_encargado = $nombre_encargado; }
    function setDireccion_sucursal($direccion_sucursal) { $this->direccion_sucursal = $direccion_sucursal; }
    
	function setCiudad($ciudad) { $this->ciudad = $ciudad; }
    function setTelefono($telefono) { $this->telefono = $telefono; }
    function setGiro($giro) { $this->giro = $giro; }
    function setEmail($email) { $this->email = $email; }
    function setRut($rut) { $this->rut = $rut; }
    
		    	
		//function setServicio_id($servicio_id) { $this->servicio_id = $servicio_id; }
	
		
		
	  function getSucursalById($sucursal_id, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM sucursales WHERE sucursal_id = '$sucursal_id'");
		if ($row = $base_datos->sql_fetch_assoc($result)) {

			$this->setSucursal_id             ($row['sucursal_id']);
			$this->setNombre_sucursal		  ($row['nombre_sucursal']);
			$this->setNombre_encargado        ($row['nombre_encargado']);
			$this->setDireccion_sucursal      ($row['direccion_sucursal']);
			$this->setServicio_id             ($row['servicio_id']);

			$this->setCiudad             ($row['ciudad']);
			$this->setTelefono		  ($row['telefono']);
			$this->setGiro        ($row['giro']);
			$this->setEmail      ($row['email']);
			$this->setRut             ($row['rut']);			
			
			
			return true;
		}
		else {
			return false;
		}
	}
	
	
	
		function insert() {
		//$image = $this->image ? "images/".$this->escort."/".$this->image : 'images/siluet.png';
		$insert =  "INSERT INTO sucursales(nombre_sucursal, nombre_encargado, direccion_sucursal, ciudad, telefono, giro, email, rut) VALUES(
				
				'".$this->nombre_sucursal."',
				'".$this->nombre_encargado."',
				'".$this->direccion_sucursal."',
				'".$this->ciudad."',
				'".$this->telefono."',
				'".$this->giro."',
				'".$this->email."',
				'".$this->rut."');";
				
				
				
			
			
    return $insert;
	
	}
	
	

	
	function listarSucursales()
	{
		return "select * from sucursales";
	}
	
	
		
	
		

		function listarSucursalesNombre($nombre_buscado)
	{
	
		return "select * from sucursales  WHERE nombre_sucursal like '%$nombre_buscado%'";
		}
	
	
	
	
		function updateSucursal()
	{
			
		$updateSucursal = "update sucursales set
		nombre_sucursal = '".$this->nombre_sucursal."',
		nombre_encargado = '".$this->nombre_encargado."',
		direccion_sucursal = '".$this->direccion_sucursal."',
		ciudad = '".$this->ciudad."',
		telefono = '".$this->telefono."',
		giro = '".$this->giro."',
		email = '".$this->email."',
		rut = '".$this->rut."'
		where sucursal_id = ".$this->sucursal_id."";
			
			
		return $updateSucursal;
			
	}
	
	
	
	
		function eliminarSucursal($sucursal_id)
	{
        return  "delete from sucursales where sucursal_id =".$sucursal_id;
    }




		function listarSucursal2($sucursal_id)
	{
		return "SELECT * 
		FROM sucursales 
		WHERE sucursal_id =".$sucursal_id;
		
	}


		function listarServiciosxSucursal($sucursal_id)
	
	{
		return "SELECT * 
		FROM servicios AS servicios,trabajadores as trabajadores, sucursales AS sucursales
		WHERE trabajadores.trabajador_id = servicios.trabajador_id
		and  servicios.sucursal_id = sucursales.sucursal_id
		AND sucursales.sucursal_id='$sucursal_id' ORDER BY servicios.estado_servicio desc";

	}
	
	
	function contarSucursales()
	
	{
		return "SELECT count(*) as number
FROM sucursales";

	}
		function contarSucursalesNombre($nombre_buscado)
	
	{
		return "SELECT count(*) as number
FROM sucursales where nombre_sucursal like '%$nombre_buscado%'";

	}
	
	
	
}

?>