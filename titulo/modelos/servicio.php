<?php
class servicio{

	var $servicio_id;
	var $nombre_servicio;
	var $estado_servicio;
	var $descripcion;
	var $fecha_creacion;
	var $fecha_modificacion;
	var $trabajador_id;
	var $cliente_id;
	var $sucursal_id;
	

function servicio(){
}
		//METODOS GET
	function getServicio_id() { return $this->servicio_id;}
	function getNombre_servicio() { return $this->nombre_servicio;}
	function getEstado_servicio() { return $this->estado_servicio;}
	function getDescripcion() { return $this->descripcion;}
	function getFecha_creacion() { return $this->fecha_creacion;}
	function getFecha_modificacion() { return $this->fecha_creacion;}
	function getTrabajador_id() { return $this->fecha_modificacion;}	
	function getCliente_id() { return $this->cliente_id;}	
	function getSucursal_id() { return $this->sucursal_id;}	
	
	  //metodos SET
	  
	function setServicio_id($servicio_id) { $this->servicio_id = $servicio_id; }
    function setNombre_servicio($nombre_servicio) {$this->nombre_servicio = $nombre_servicio;}
	function setEstado_servicio($estado_servicio) {$this->estado_servicio=$estado_servicio;}   
	function setDescripcion($descripcion) {$this->descripcion=$descripcion;}
 	function setTrabajador_id($trabajador_id) { $this->trabajador_id = $trabajador_id; }  
	
	function setFecha_creacion($fecha_creacion) { $this->fecha_creacion = $fecha_creacion; }  
	function setFecha_modificacion($fecha_modificacion) { $this->fecha_modificacion = $fecha_modificacion; }  
	
	function setCliente_id($cliente_id) { $this->cliente_id = $cliente_id; }  
	function setSucursal_id($sucursal_id) { $this->sucursal_id = $sucursal_id; }  
	
	
			function insert() {
		//$image = $this->image ? "images/".$this->escort."/".$this->image : 'images/siluet.png';
		$insert =  "INSERT INTO servicios(nombre_servicio, estado_servicio, descripcion, trabajador_id, fecha_creacion,fecha_modificacion , cliente_id, sucursal_id) VALUES(
				
				'".$this->nombre_servicio."',
				'".$this->estado_servicio."',
				'".$this->descripcion."',
				'".$this->trabajador_id."',
				'".$this->fecha_creacion."',
				'".$this->fecha_modificacion."',
				'".$this->cliente_id."',
				'".$this->sucursal_id."');";
		
		return $insert;
	
	}
	function listarServicios()
	{
		//return "select * from servicios, trabajadores";
		return "select servicios.servicio_id,servicios.nombre_servicio, servicios.estado_servicio, servicios.descripcion, servicios.fecha_creacion,
 trabajadores.nombre,
sucursales.nombre_sucursal
from trabajadores, servicios,sucursales where servicios.trabajador_id = trabajadores.trabajador_id 
and servicios.estado_servicio = 1 
and servicios.sucursal_id = sucursales.sucursal_id";
	}
	

		function listarServiciosName($nombres_buscado){
		return "select servicios.servicio_id,servicios.nombre_servicio, servicios.estado_servicio, servicios.descripcion, 		          	servicios.fecha_creacion,
trabajadores.nombre,
sucursales.nombre_sucursal
from trabajadores, servicios,sucursales where servicios.trabajador_id = trabajadores.trabajador_id 
and servicios.estado_servicio = 1 
and servicios.sucursal_id = sucursales.sucursal_id && nombre_servicio like '%$nombres_buscado%'" ;
		}
	
	function listarServiciosTerminados()
	{
		//return "select * from servicios, trabajadores";
		return "select servicios.servicio_id,servicios.nombre_servicio, servicios.estado_servicio, servicios.descripcion, servicios.fecha_creacion,
 trabajadores.nombre,
sucursales.nombre_sucursal
from trabajadores, servicios,sucursales where servicios.trabajador_id = trabajadores.trabajador_id 
and servicios.estado_servicio = 0 
and servicios.sucursal_id = sucursales.sucursal_id";
	}

		function listarServiciosNameTerminados($nombres_buscado){
		return "select servicios.servicio_id,servicios.nombre_servicio, servicios.estado_servicio, servicios.descripcion, 		          	servicios.fecha_creacion,
trabajadores.nombre,
sucursales.nombre_sucursal
from trabajadores, servicios,sucursales where servicios.trabajador_id = trabajadores.trabajador_id 
and servicios.estado_servicio = 0 
and servicios.sucursal_id = sucursales.sucursal_id && nombre_servicio like '%$nombres_buscado%'" ;
		}


		function listarServiciosFecha($fecha_inicio1, $fecha_inicio2){
		return "select servicios.servicio_id,servicios.nombre_servicio, servicios.estado_servicio, servicios.descripcion, 		          	servicios.fecha_creacion,
trabajadores.nombre,
sucursales.nombre_sucursal
from trabajadores, servicios,sucursales 
where servicios.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2'
and servicios.trabajador_id = trabajadores.trabajador_id 
and servicios.estado_servicio = 0 
and servicios.sucursal_id = sucursales.sucursal_id";
		}

function contarServiciosFecha($fecha_inicio1, $fecha_inicio2){
		return "select count(*)
from trabajadores, servicios,sucursales 
where servicios.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2'
and servicios.trabajador_id = trabajadores.trabajador_id 
and servicios.estado_servicio = 0 
and servicios.sucursal_id = sucursales.sucursal_id";
		}


	
			function updateServicios()
		{
			
			$updateServicios =  "update servicios set
			servicio_id = ".$this->servicio_id.",
			nombre_servicio = '".$this->nombre_servicio."',
			descripcion = '".$this->descripcion."',
			fecha_modificacion = '".$this->fecha_modificacion."',
			trabajador_id = ".$this->trabajador_id.",
			sucursal_id = ".$this->sucursal_id."
			where servicio_id = ".$this->servicio_id."";
			
			
			return $updateServicios;
			
	
	
	}
	
	  function eliminarServicio($servicio_id){
              return  "delete from servicios where servicio_id =".$servicio_id;
  }
  
		function listarServicios2($servicio_id)
	{
		return "select servicios.servicio_id,servicios.nombre_servicio, servicios.estado_servicio, servicios.descripcion, servicios.fecha_creacion,
trabajadores.trabajador_id, trabajadores.nombre, trabajadores.apellido_paterno, trabajadores.apellido_materno,
sucursales.nombre_sucursal, sucursales.telefono, sucursales.sucursal_id
 from trabajadores, servicios,sucursales where servicios.trabajador_id = trabajadores.trabajador_id 
and servicios.sucursal_id = sucursales.sucursal_id
and servicios.servicio_id = ".$servicio_id;

		}
		function listarServiciosxNaturales($servicio_id)
	{
		return "select *
 from servicios, clientes, naturales 
 where servicios.cliente_id = naturales.cliente_id
AND naturales.cliente_id = clientes.cliente_id
and servicios.servicio_id = ".$servicio_id;

		}

		function listarServiciosxJuridicos($servicio_id)
	{
		return "select *
 from servicios, clientes, juridicos 
 where servicios.cliente_id = juridicos.cliente_id
AND juridicos.cliente_id = clientes.cliente_id
and servicios.servicio_id = ".$servicio_id;

		}



	
	
       function getServiciosById($servicio, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM servicios WHERE servicio_id = '$servicio_id'");
		
		if ($row = $base_datos->sql_fetch_assoc($result)) {
		

			$this->setServicio_id          ($row['servicio_id']);
            $this->setNombre_servicio      ($row['nombre_servicio']);
			$this->setEstado_servicio      ($row['estado_servicio']);
			$this->setDescripcion          ($row['descripcion']);
            $this->setTrabajador_id        ($row['trabajador_id']);
			$this->setSucursal_id          ($row['sucursal_id']);
			$this->setCliente_id           ($row['cliente_id']);
			
			return true;
		}
		else {
			return false;
		}
	}
	
      function getTrabajadorById($servicio_id, $base_datos) {
		$result = $base_datos->sql_query("select *
		from trabajadores, servicios
		where trabajadores.trabajador_id = servicios.trabajador_id
		and servicios.servicio_id = '$servicio_id'");
		
		if ($row = $base_datos->sql_fetch_assoc($result)) {
		

			$this->setServicio_id          ($row['servicio_id']);
            $this->setTrabajador_id        ($row['trabajador_id']);
			
			return true;
		}
		else {
			return false;
		}
	}	
	
	
	function listarTrabajadoressxServicios($servicio_id)
	
	{
		return "SELECT * 
FROM servicios, trabajadores
WHERE trabajadores.trabajador_id = servicios.trabajador_id
AND servicios.servicio_id =".$servicio_id;

	}
	
		function listarSucursalesxServicios($servicio_id)
	
	{
		return "SELECT * 
FROM servicios, sucursales
WHERE sucursales.sucursal_id = servicios.sucursal_id
AND servicios.servicio_id =".$servicio_id;

	}
		function listarNaturalxServicios($servicio_id)
	
	{
		return "SELECT * 
FROM servicios AS servicios, clientes AS clientes, naturales AS naturales
WHERE servicios.cliente_id = clientes.cliente_id
AND naturales.cliente_id = clientes.cliente_id
AND clientes.cliente_id =".$servicio_id;

	}
			function listarJuridicoxServicios($servicio_id)
	
	{
		return "SELECT * 
FROM servicios AS servicios, clientes AS clientes, juridicos AS juridicos
WHERE servicios.cliente_id = clientes.cliente_id
AND juridicos.cliente_id = clientes.cliente_id
AND clientes.cliente_id =".$servicio_id;

	}
	

			
			function listarServicios3()
	{
		return "SELECT * 
		FROM servicios, productos 
		WHERE servicios.servicio_id = productos.servicios_as_tareas_id";
		
		}
				function listarServiciosxProductos($servicio_id)
	
	{
		return "select servicios.servicio_id, productos.producto_id, servicios_as_productos.servicios_as_productos_id, productos.nombre_producto, productos.descripcion, productos.marca, productos.precio, productos.cantidad, servicios_as_productos.cantidad_servicio,productos.valor_total, servicios_as_productos.valor_servicio  
from productos, servicios, servicios_as_productos
where servicios.servicio_id = servicios_as_productos.servicio_id
and productos.producto_id = servicios_as_productos.producto_id
and servicios.servicio_id =".$servicio_id;

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

	
	function trabajadorMaxServicioFinalizados(){
		
		return "SELECT trabajadores.nombre, COUNT( trabajadores.nombre ) AS cnt
FROM trabajadores, servicios
WHERE trabajadores.trabajador_id = servicios.trabajador_id
AND servicios.estado_servicio = 0
GROUP BY trabajadores.nombre
HAVING COUNT( trabajadores.nombre ) = (

SELECT MAX( cnt ) AS maximo
FROM (

SELECT trabajadores.nombre, COUNT( trabajadores.nombre ) AS cnt
FROM trabajadores, servicios
WHERE trabajadores.trabajador_id = servicios.trabajador_id
AND servicios.estado_servicio = 0
GROUP BY trabajadores.nombre
)tabla1
)";
		
		
		}
	
function trabajadorMinServicioFinalizados(){
		
		return "SELECT trabajadores.nombre, COUNT( trabajadores.nombre ) AS cnt
FROM trabajadores, servicios
WHERE trabajadores.trabajador_id = servicios.trabajador_id
AND servicios.estado_servicio = 0
GROUP BY trabajadores.nombre
HAVING COUNT( trabajadores.nombre ) = (

SELECT min( cnt ) AS maximo
FROM (

SELECT trabajadores.nombre, COUNT( trabajadores.nombre ) AS cnt
FROM trabajadores, servicios
WHERE trabajadores.trabajador_id = servicios.trabajador_id
AND servicios.estado_servicio = 0
GROUP BY trabajadores.nombre
)tabla1
)";
		
		
		}	
	function contarServicios()
	{
		//return "select * from servicios, trabajadores";
		return "select count(*) as number
from trabajadores, servicios,sucursales where servicios.trabajador_id = trabajadores.trabajador_id 
and servicios.estado_servicio = 1 
and servicios.sucursal_id = sucursales.sucursal_id";
	}
	
	
		function contarServiciosNombre($nombre_buscado)
	{
		//return "select * from servicios, trabajadores";
		return "select count(*) as number
from trabajadores, servicios,sucursales where servicios.nombre_servicio like '%$nombre_buscado%'
and servicios.trabajador_id = trabajadores.trabajador_id 
and servicios.estado_servicio = 1 
and servicios.sucursal_id = sucursales.sucursal_id";
	}
	
		function contarServiciosFinalizados()
	{
		//return "select * from servicios, trabajadores";
		return "select count(*) as number
from trabajadores, servicios,sucursales 
where servicios.trabajador_id = trabajadores.trabajador_id 
and servicios.estado_servicio = 0
and servicios.sucursal_id = sucursales.sucursal_id";
	}
	function contarServiciosFinalizadosFecha($fecha_inicio1, $fecha_inicio2)
	{
		//return "select * from servicios, trabajadores";
		return "select count(*) as number
from trabajadores, servicios,sucursales 
where servicios.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2'
and servicios.trabajador_id = trabajadores.trabajador_id 
and servicios.estado_servicio = 0
and servicios.sucursal_id = sucursales.sucursal_id";
	}
	
	function sumarServiciosxProdutos($servicio_id)
	{
		//return "select * from servicios, trabajadores";
		return "SELECT SUM(servicios_as_productos.valor_servicio) as numberProductos FROM servicios, servicios_as_productos, productos WHERE servicios.servicio_id = servicios_as_productos.servicio_id and servicios_as_productos.producto_id = productos.producto_id AND servicios.servicio_id = $servicio_id";
	}	
	
		function sumarServiciosxTareas($servicio_id)
	{
		//return "select * from servicios, trabajadores";
		return "SELECT SUM(tareas.valor) as number
FROM tareas, servicios, tareas_as_servicios 
WHERE tareas.tarea_id = tareas_as_servicios.tarea_id 
and servicios.servicio_id = tareas_as_servicios.servicio_id 
AND servicios.servicio_id = $servicio_id";
	}	
	
			function sumarServiciosxTareas2($servicio_id)
	{
		//return "select * from servicios, trabajadores";
		return "SELECT SUM(tareas.valor) as number2
FROM tareas, servicios, tareas_as_servicios 
WHERE tareas.tarea_id = tareas_as_servicios.tarea_id 
and servicios.servicio_id = tareas_as_servicios.servicio_id 
AND servicios.servicio_id = $servicio_id";
	}	
				function sumarServiciosxTareas3($servicio_id)
	{
		//return "select * from servicios, trabajadores";
		return "SELECT SUM(tareas.valor) as number3
FROM tareas, servicios, tareas_as_servicios 
WHERE tareas.tarea_id = tareas_as_servicios.tarea_id 
and servicios.servicio_id = tareas_as_servicios.servicio_id 
AND servicios.servicio_id = $servicio_id";
	}	
}

	
	
	




?>