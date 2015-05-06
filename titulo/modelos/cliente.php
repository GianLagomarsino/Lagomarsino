<?php
class cliente{

var $cliente_id;
var $direccion;
var $comuna;
var $ciudad;
var $telefono;
var $celular;
var $email;
var $banco;
var $rut;
var $fecha_creacion;
var $fecha_modificacion;
var $servicios_sericio_id;
//var $tipo_cliente;



function cliente(){
}
	//metodos Get
    function getCliente_id() { return $this->cliente_id;}
	function getDireccion() { return $this->direccion;}
	function getComuna() { return $this->comuna;}
	function getCiudad() { return $this->ciudad;}
	function getTelefono() { return $this->telefono;}
	function getCelular() { return $this->celular;}
	function getEmail() { return $this->email;}
	function getBanco() { return $this->banco;}
	function getRut() { return $this->rut;}
	function getFecha_creacion() { return $this->fecha_creacion;}
	function getFecha_modificacion() { return $this->fecha_modificacion;}
	function getServicios_sericio_id() { return $this->servicios_sericio_id;}
	//function getTipo_cliente() { return $this->tipo_cliente;}
	
	//metodos SET
	function setCliente_id($cliente_id) { $this->cliente_id = $cliente_id; }
    	function setDireccion($direccion) { $this->direccion = $direccion; }
    	function setComuna($comuna) { $this->comuna = $comuna; }
    	function setCiudad($ciudad) { $this->ciudad = $ciudad; }
    	function setTelefono($telefono) { $this->telefono = $telefono; }
    	function setCelular($celular) { $this->celular = $celular; }
    	function setEmail($email) { $this->email = $email; }
    	function setBanco($banco) { $this->banco = $banco; }
    	function setRut($rut) { $this->rut = $rut; }
		function setFecha_creacion($fecha_creacion) { $this->fecha_creacion = $fecha_creacion; }
		function setFecha_modificacion($fecha_modificacion) { $this->fecha_modificacion = $fecha_modificacion; }
		function setServicios_sericio_id($servicios_sericio_id) { $this->servicios_sericio_id = $servicios_sericio_id; }
		function getTipo_cliente() { return $this->tipo_cliente;}
	
		
	
	
	
	function getClientesById($cliente_id, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM clientes WHERE cliente_id = '$cliente_id'");
		if ($row = $base_datos->sql_fetch_assoc($result)) {

			
			
			$this->setCliente_id              ($row['cliente_id']);
			$this->setDireccion		  ($row['direccion']);
			$this->setComuna               ($row['comuna']);
			$this->setCiudad                     ($row['ciudad']);
			$this->setTelefono           ($row['telefono']);
			$this->setCelular      ($row['celular']);
			$this->setEmail		              ($row['email']);
			$this->setBanco                  ($row['banco']);
			$this->setRut                ($row['rut']);    
			$this->setFecha_creacion          ($row['fecha_creacion']);
			$this->setFecha_modificacion      ($row['fecha_modificacion']);
			
			
			
			return true;
		}
		else {
			return false;
		}
	}
	
	
	
	
	
	
	
	  function getClientesByIdJuridico($cliente_id, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM clientes, juridicos WHERE cliente_id = '$cliente_id'");
		if ($row = $base_datos->sql_fetch_assoc($result)) {

			
			
			$this->setCliente_id              ($row['cliente_id']);
			$this->setNombre_empresa	  ($row['nombre_empresa']);
			$this->setRazon_social               ($row['razon_social']);
			$this->setGiro                    ($row['giro']);
			$this->setRepresentante_legal          ($row['representante_legal']);
			$this->setDireccion		  ($row['direccion']);
			$this->setComuna               ($row['comuna']);
			$this->setCiudad                     ($row['ciudad']);
			$this->setTelefono           ($row['telefono']);
			$this->setCelular      ($row['celular']);
			$this->setEmail		              ($row['email']);
			$this->setBanco                  ($row['banco']);
			$this->setRut                ($row['rut']);    
			$this->setFecha_creacion          ($row['fecha_creacion']);
			$this->setFecha_modificacion      ($row['fecha_modificacion']);
			
			
			
			return true;
		}
		else {
			return false;
		}
	}






	
	
		  function getClientesByIdNaturales($cliente_id, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM clientes, naturales WHERE cliente_id = '$cliente_id'");
		if ($row = $base_datos->sql_fetch_assoc($result)) {

			
			
			$this->setCliente_id              ($row['cliente_id']);
			$this->setNombre	  ($row['nombre']);
			$this->setApellido_paterno               ($row['apellido_paterno']);
			$this->setApellido_materno                    ($row['apellido_materno']);
			//$this->setRepresentante_legal          ($row['representante_legal']);
			$this->setDireccion		  ($row['direccion']);
			$this->setComuna               ($row['comuna']);
			$this->setCiudad                     ($row['ciudad']);
			$this->setTelefono           ($row['telefono']);
			$this->setCelular      ($row['celular']);
			$this->setEmail		              ($row['email']);
			$this->setBanco                  ($row['banco']);
			$this->setRut                ($row['rut']);    
			$this->setFecha_creacion          ($row['fecha_creacion']);
			$this->setFecha_modificacion      ($row['fecha_modificacion']);
			
			
			
			return true;
		}
		else {
			return false;
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		function insert() {
		//$image = $this->image ? "images/".$this->escort."/".$this->image : 'images/siluet.png';
		$insert =  "INSERT INTO clientes(direccion,comuna,ciudad,telefono,celular,email,banco,rut,fecha_creacion,fecha_modificacion) VALUES(
				
				'".$this->direccion."',
				'".$this->comuna."',
        		'".$this->ciudad."',
				'".$this->telefono."',
				'".$this->celular."',
				'".$this->email."',
				'".$this->banco."',
				'".$this->rut."',
				'".$this->fecha_creacion."',
				'".$this->fecha_modificacion."');";
				
				
			
			
    return $insert;
	
	}
	
	
	function listarClientesJuridicos()
	{
		return "select clientes.cliente_id,
		clientes.rut,
		juridicos.nombre_empresa,
		juridicos.razon_social,
		juridicos.giro,
		juridicos.representante_legal,
		clientes.telefono,
		clientes.celular,
		clientes.direccion,
		clientes.comuna,
		clientes.ciudad,
		clientes.email,
		clientes.banco
		from clientes, juridicos
		where  clientes.cliente_id = juridicos.cliente_id";
	}
	
	function listarClientesNaturales()
	{
		return "select clientes.cliente_id,
		clientes.rut,
		naturales.nombre,
		naturales.apellido_paterno,
        naturales.apellido_materno,
		clientes.telefono,
		clientes.celular, 
		clientes.direccion, 
		clientes.comuna, 
		clientes.ciudad, 
		clientes.email, 
		clientes.banco  
		from clientes, naturales 
		where  clientes.cliente_id = naturales.cliente_id";
	}
	
	
	
	function listarClientesJuridicos2($cliente_id)
	{
		return "select *
		from clientes AS clientes,  juridicos AS juridicos
		where clientes.cliente_id = juridicos.cliente_id
		and clientes.cliente_id =".$cliente_id;
	}
	
	function listarClientesNaturales2($cliente_id)
	{
		return "SELECT * 
		FROM clientes AS clientes,  naturales AS naturales
		WHERE naturales.cliente_id = clientes.cliente_id
		AND clientes.cliente_id =".$cliente_id;
		
		}

		
		function eliminarClientes($cliente_id){
              return  "delete from clientes where clientes.cliente_id=".$cliente_id ;
  }
		
		function eliminarClientesNaturales($cliente_id){
              return  "delete from naturales where naturales.cliente_id =".$cliente_id ;
  }
  
  
		function eliminarClientesJuridicos($cliente_id){
              return  "delete from juridicos where juridicos.cliente_id =".$cliente_id ;
  }
  
  
			
		
		
		
		function updateCliente()
		{
			
			$update=  "update clientes set
			direccion='".$this->direccion."',
			comuna= '".$this->comuna."',
			ciudad= '".$this->ciudad."',
			telefono= ".$this->telefono.",
			celular= ".$this->celular.",
			email= '".$this->email."',
			banco= '".$this->banco."',
			fecha_creacion= '".$this->fecha_creacion."',
			fecha_modificacion= '".$this->fecha_modificacion."'
			where cliente_id = ".$this->cliente_id."";
			
			return $update;
			
	}
	
	

	
	
	
	
	
	
	
	function listarClientesName($nombres_buscado){
		return "select * FROM clientes WHERE nombres like '%$nombres_buscado%'" ;
		}
		
		function listarClientesNameJuridico($nombre_buscado){
	
		return "select clientes.cliente_id, clientes.rut, juridicos.nombre_empresa , juridicos.razon_social,juridicos.giro,juridicos.representante_legal,clientes.celular, clientes.direccion, clientes.comuna, clientes.comuna, clientes.ciudad, clientes.email, clientes.banco  from clientes, juridicos WHERE juridicos.nombre_empresa like '%$nombre_buscado%' && clientes.cliente_id = juridicos.cliente_id";
		}
		function listarClientesNameNatural($nombre_buscado){
	
		return "select clientes.cliente_id, clientes.rut, naturales.nombre , naturales.apellido,clientes.celular, clientes.direccion, clientes.comuna, clientes.ciudad, clientes.email, clientes.banco  from clientes, naturales WHERE naturales.nombre like '%$nombre_buscado%'  && clientes.cliente_id = naturales.cliente_id";
		}
	function tipo_cliente()
	{
		return $query = "select count(*) as contar from juridicos where cliente_id =".$this->getCliente_id().";";
		
	}
	

	
	
	function validarRut($rut)
	{
		return "SELECT * FROM clientes WHERE rut='$rut'";

		
	}
	
	
	function listarClientes()
	{
		return "select *  from clientes";
	}
	
	
	function listarClientesxServiciosNaturales($cliente_id)
	
	{
		return "SELECT *
		FROM clientes AS clientes, servicios AS servicios, naturales AS naturales, sucursales AS sucursales, trabajadores AS trabajadores
		WHERE trabajadores.trabajador_id = servicios.trabajador_id
		AND sucursales.sucursal_id = servicios.sucursal_id
		and servicios.estado_servicio = 1
		AND servicios.cliente_id = naturales.cliente_id
		AND naturales.cliente_id = clientes.cliente_id
		AND clientes.cliente_id =".$cliente_id;

	}
	
	function listarClientesxServiciosNaturales2($cliente_id)
	
	{
		return "SELECT *
		FROM clientes AS clientes, servicios AS servicios, naturales AS naturales, sucursales AS sucursales, trabajadores AS trabajadores
		WHERE trabajadores.trabajador_id = servicios.trabajador_id
		AND sucursales.sucursal_id = servicios.sucursal_id
		and servicios.estado_servicio = 0
		AND servicios.cliente_id = naturales.cliente_id
		AND naturales.cliente_id = clientes.cliente_id
		AND clientes.cliente_id =".$cliente_id;

	}
	
function listarClientesxServiciosNaturales2Fecha($cliente_id, $fecha_inicio1, $fecha_inicio2)
	
	{
		return "SELECT *
		FROM clientes AS clientes, servicios AS servicios, naturales AS naturales, sucursales AS sucursales, trabajadores AS trabajadores
		WHERE servicios.fecha_creacion between '$fecha_inicio1' and '$fecha_inicio2' 
		AND trabajadores.trabajador_id = servicios.trabajador_id
		AND sucursales.sucursal_id = servicios.sucursal_id
		and servicios.estado_servicio = 0
		AND servicios.cliente_id = naturales.cliente_id
		AND naturales.cliente_id = clientes.cliente_id
		AND clientes.cliente_id =".$cliente_id;

	}


	
	
	function listarClientesxServiciosJuridicos($cliente_id)
	
	{
		return "SELECT *
		FROM clientes AS clientes, servicios AS servicios, juridicos AS juridicos, sucursales AS sucursales, trabajadores AS trabajadores
		WHERE trabajadores.trabajador_id = servicios.trabajador_id
		AND sucursales.sucursal_id = servicios.sucursal_id
		and servicios.estado_servicio = 1
		AND servicios.cliente_id = juridicos.cliente_id
		AND juridicos.cliente_id = clientes.cliente_id
		AND clientes.cliente_id =".$cliente_id;

	}
	
		function listarClientesxServiciosJuridicos2($cliente_id)
	
	{
		return "SELECT *
		FROM clientes AS clientes, servicios AS servicios, juridicos AS juridicos, sucursales AS sucursales, trabajadores AS trabajadores
		WHERE trabajadores.trabajador_id = servicios.trabajador_id
		AND sucursales.sucursal_id = servicios.sucursal_id
		and servicios.estado_servicio = 0
		AND servicios.cliente_id = juridicos.cliente_id
		AND juridicos.cliente_id = clientes.cliente_id
		AND clientes.cliente_id =".$cliente_id;

	}

		function listarClientesxServiciosJuridicos2Fecha($cliente_id, $fecha_inicio1, $fecha_inicio2)
	
	{
		return "SELECT *
		FROM clientes AS clientes, servicios AS servicios, juridicos AS juridicos, sucursales AS sucursales, trabajadores AS trabajadores
		WHERE servicios.fecha_creacion between '$fecha_inicio1' and '$fecha_inicio2' 
		and trabajadores.trabajador_id = servicios.trabajador_id
		AND sucursales.sucursal_id = servicios.sucursal_id
		and servicios.estado_servicio = 0
		AND servicios.cliente_id = juridicos.cliente_id
		AND juridicos.cliente_id = clientes.cliente_id
		AND clientes.cliente_id =".$cliente_id;

	}






 function contarClientesNaturales()
	
	{
		return "SELECT count(*) as number
from clientes, naturales where clientes.cliente_id = naturales.cliente_id";

	}
	
	 function contarClientesNaturalesNombre($nombre_buscado)
	
	{
		return "SELECT count(*) as number
from clientes, naturales WHERE naturales.nombre like '%$nombre_buscado%'  && clientes.cliente_id = naturales.cliente_id";

	}
	
	function contarClientesxServiciosNaturales2($cliente_id)
	
	{
		return "SELECT count(*) as number
		FROM clientes AS clientes, servicios AS servicios, naturales AS naturales, sucursales AS sucursales, trabajadores AS trabajadores
		WHERE trabajadores.trabajador_id = servicios.trabajador_id
		AND sucursales.sucursal_id = servicios.sucursal_id
		and servicios.estado_servicio = 0
		AND servicios.cliente_id = naturales.cliente_id
		AND naturales.cliente_id = clientes.cliente_id
		AND clientes.cliente_id =".$cliente_id;

	}
	
		function contarClientesxServiciosNaturales2Fecha($cliente_id, $fecha_inicio1, $fecha_inicio2)
	
	{
		return "SELECT count(*) as number
		FROM clientes AS clientes, servicios AS servicios, naturales AS naturales, sucursales AS sucursales, trabajadores AS trabajadores
		WHERE servicios.fecha_creacion between '$fecha_inicio1' and '$fecha_inicio2' 
		and trabajadores.trabajador_id = servicios.trabajador_id
		AND sucursales.sucursal_id = servicios.sucursal_id
		and servicios.estado_servicio = 0
		AND servicios.cliente_id = naturales.cliente_id
		AND naturales.cliente_id = clientes.cliente_id
		AND clientes.cliente_id =".$cliente_id;

	}
	
	
	
	
	
	function contarClientesxServiciosNaturales($cliente_id)
	
	{
		return "SELECT count(*) as number
		FROM clientes AS clientes, servicios AS servicios, naturales AS naturales, sucursales AS sucursales, trabajadores AS trabajadores
		WHERE trabajadores.trabajador_id = servicios.trabajador_id
		AND sucursales.sucursal_id = servicios.sucursal_id
		and servicios.estado_servicio = 1
		AND servicios.cliente_id = naturales.cliente_id
		AND naturales.cliente_id = clientes.cliente_id
		AND clientes.cliente_id =".$cliente_id;

	}
		function contarClientesJuridicos()
	
	{
		return "SELECT count(*) as number 
from clientes, juridicos where  clientes.cliente_id = juridicos.cliente_id";

	}
			function contarClientesJuridicosNombre($nombre_buscado)
	
	{
		return "SELECT count(*) as number from clientes, juridicos where juridicos.nombre_empresa like '%$nombre_buscado%' and clientes.cliente_id = juridicos.cliente_id";

	}
	
		function contarClientesxServiciosJuridicos($cliente_id)
	
	{
		return "SELECT count(*) as number
		FROM clientes AS clientes, servicios AS servicios, juridicos AS juridicos, sucursales AS sucursales, trabajadores AS trabajadores
		WHERE trabajadores.trabajador_id = servicios.trabajador_id
		AND sucursales.sucursal_id = servicios.sucursal_id
		and servicios.estado_servicio = 1
		AND servicios.cliente_id = juridicos.cliente_id
		AND juridicos.cliente_id = clientes.cliente_id
		AND clientes.cliente_id =".$cliente_id;

	}
	
	function contarClientesxServiciosJuridicos2($cliente_id)
	
	{
		return "SELECT count(*) as number
		FROM clientes AS clientes, servicios AS servicios, juridicos AS juridicos, sucursales AS sucursales, trabajadores AS trabajadores
		WHERE trabajadores.trabajador_id = servicios.trabajador_id
		AND sucursales.sucursal_id = servicios.sucursal_id
		and servicios.estado_servicio = 0
		AND servicios.cliente_id = juridicos.cliente_id
		AND juridicos.cliente_id = clientes.cliente_id
		AND clientes.cliente_id =".$cliente_id;

	}
	
		function contarClientesxServiciosJuridicos2Fecha($cliente_id, $fecha_inicio1, $fecha_inicio2)
	
	{
		return "SELECT count(*) as number
		FROM clientes AS clientes, servicios AS servicios, juridicos AS juridicos, sucursales AS sucursales, trabajadores AS trabajadores
		WHERE servicios.fecha_creacion between '$fecha_inicio1' and '$fecha_inicio2' 
		and trabajadores.trabajador_id = servicios.trabajador_id
		AND sucursales.sucursal_id = servicios.sucursal_id
		and servicios.estado_servicio = 0
		AND servicios.cliente_id = juridicos.cliente_id
		AND juridicos.cliente_id = clientes.cliente_id
		AND clientes.cliente_id =".$cliente_id;

	}
	
}

?>