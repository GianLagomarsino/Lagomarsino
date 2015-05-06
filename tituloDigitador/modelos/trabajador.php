<?php
class trabajador{

	var $trabajador_id;
	var $nombre;
	var $apellido_paterno;
	var $apellido_materno;
	var $rut;
	var $direccion;
	var $telefono;
	var $celular;
	var $sueldo;


function trabajador(){
}
		//METODOS GET
	function getTrabajador_id() { return $this->trabajador_id;}
	function getNombre() { return $this->nombre;}
	function getApellido_paterno() { return $this->apellido_paterno;}
	function getApellido_materno() { return $this->apellido_materno;}
	function getRut()              { return $this->rut;}
	function getDireccion() { return $this->direccion;}
	function getTelefono () { return $this->telefono;}
	function getCelular () { return $this->celular;}
	function getSueldo () { return $this->sueldo;}	
	
	  //metodos SET
	  
	function setTrabajador_id($trabajador_id) { $this->trabajador_id = $trabajador_id; }
    function setNombre($nombre) {$this->nombre = $nombre;}
    function setApellido_paterno($apellido_paterno) {$this->apellido_paterno=$apellido_paterno;}
    function setApellido_materno($apellido_materno) { $this->apellido_materno = $apellido_materno; }
    function setRut($rut) { $this->rut = $rut; }
	function setDireccion($direccion) { $this->direccion = $direccion; }
	function setTelefono($telefono) { $this->telefono = $telefono; }
    function setCelular($celular) { $this->celular = $celular; }	
	function setSueldo($sueldo) { $this->sueldo = $sueldo; }  

	
	
			function insert() {
		//$image = $this->image ? "images/".$this->escort."/".$this->image : 'images/siluet.png';
		$insert =  "INSERT INTO trabajadores(nombre, apellido_paterno, apellido_materno, rut, direccion, telefono, celular, sueldo) VALUES(
				
				'".$this->nombre."',
				'".$this->apellido_paterno."',
        		'".$this->apellido_materno."',
				'".$this->rut."',
				'".$this->direccion."',
				'".$this->telefono."',
				'".$this->celular."',
				'".$this->sueldo."');";
		
		return $insert;
	
	}
	
		function validarRut($rut)
	{
		return "select * FROM trabajadores where rut='$rut'";

		
	}
	
	
	function listarTrabajadores()
	{
		return "select trabajador_id, nombre, apellido_paterno , apellido_materno, rut, direccion, telefono, celular, sueldo from trabajadores";
	}
	
		function listarTrabajadoresName($nombres_buscado){
		return "select * FROM trabajadores WHERE nombre like '%$nombres_buscado%'" ;
		}
	
	
	function updateTrabajadores()
	{
		$update = "UPDATE trabajadores SET 
			          nombre = '".$this->nombre."',
			apellido_paterno = '".$this->apellido_paterno."',
			apellido_materno = '".$this->apellido_materno."',
			             rut = '".$this->rut."',
			       direccion = '".$this->direccion."',
					telefono = ".$this->telefono.",
					celular  = ".$this->celular.",
					  sueldo = ".$this->sueldo."
		WHERE trabajador_id  = ".$this->trabajador_id."";
		return $update;	
	
	}
		/*	function updateTrabajadores()
		{
			
			$update=  "update trabajadores set nombre='$this->nombre',apellido_paterno='$this->apellido_paterno',apellido_materno='$this->apellido_materno',rut='$this->rut',direccion='$this->direccion',telefono='$this->telefono',celular='$this->celular',sueldo='$this->sueldo' where trabajador_id = '$this->trabajador_id'";
			
			
			return $update;
	
	}*/
	
	
	
		  function eliminarTrabajador($trabajador_id){
              return  "delete from trabajadores where trabajador_id =".$trabajador_id;
  }
	
	



        function getTrabajadoresById($trabajador_id, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM trabajadores WHERE trabajador_id = '$trabajador_id'");
		if ($row = $base_datos->sql_fetch_assoc($result)) {

			$this->setTrabajador_id          ($row['trabajador_id']);
                        //$this->setPago_id                 ($row['pago_id']);
			$this->setNombre               ($row['nombre']);
			$this->setApellido_paterno             ($row['apellido_paterno']);
			$this->setApellido_materno             ($row['apellido_materno']);
			$this->setRut                  ($row['rut']);
            $this->setDireccion             ($row['direccion']);
            $this->setTelefono             ($row['telefono']);
			$this->setCelular             ($row['celular']);
			$this->setSueldo            ($row['sueldo']);
			
			return true;
		}
		else {
			return false;
		}
	}

	
		function listarTrabajadores2($trabajador_id)
	{
		return "SELECT * 
		FROM trabajadores 
		WHERE trabajador_id =".$trabajador_id;
		
		}
	
			function listarServiciosxTrabajador($trabajador_id)
	
	{
		return "SELECT * FROM trabajadores AS trabajadores, servicios AS servicios, sucursales AS sucursales WHERE sucursales.sucursal_id = servicios.sucursal_id AND servicios.trabajador_id = trabajadores.trabajador_id AND trabajadores.trabajador_id = '$trabajador_id' ORDER BY servicios.estado_servicio desc,servicios.fecha_creacion asc";

	}	
	
	
	
			function listarServiciosxTrabajadorActivos($trabajador_id)
	
	{
		return "SELECT * 
		FROM trabajadores AS trabajadores, servicios AS servicios, sucursales AS sucursales
		WHERE sucursales.sucursal_id = servicios.sucursal_id
		AND servicios.trabajador_id = trabajadores.trabajador_id
		and servicios.estado_servicio = 1 
		AND trabajadores.trabajador_id =".$trabajador_id;

	}
	
			function listarServiciosxTrabajadorFinalizados($trabajador_id)
	
	{
		return "SELECT * 
		FROM trabajadores AS trabajadores, servicios AS servicios, sucursales AS sucursales
		WHERE sucursales.sucursal_id = servicios.sucursal_id
		AND servicios.trabajador_id = trabajadores.trabajador_id
		and servicios.estado_servicio = 0 
		AND trabajadores.trabajador_id =".$trabajador_id;

	}	
	
	
	function contarTrabajadoresxServicioActivo($trabajador_id)
	{
	return "
	SELECT COUNT(*)
FROM trabajadores, servicios, sucursales
WHERE servicios.trabajador_id = trabajadores.trabajador_id
AND servicios.estado_servicio =1
AND servicios.sucursal_id = sucursales.sucursal_id
AND trabajadores.trabajador_id =".$trabajador_id;

	}
	function contarTrabajadoresxServicioFinalizados($trabajador_id)
	{
	return "
	SELECT COUNT(*)
FROM trabajadores, servicios, sucursales
WHERE servicios.trabajador_id = trabajadores.trabajador_id
AND servicios.estado_servicio = 0
AND servicios.sucursal_id = sucursales.sucursal_id
AND trabajadores.trabajador_id =".$trabajador_id;

	}

function contarTrabajadores()
	{
	return "SELECT count(*) number
FROM trabajadores";

	}


function contarTrabajadoresNombre($nombre_buscado)
	{
	return "SELECT count(*) number
FROM trabajadores where nombre like '%$nombre_buscado%'";

	}

	
}
?>