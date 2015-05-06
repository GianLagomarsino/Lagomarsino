<?php
class tarea{

	var $tarea_id;
	var $nombre_tarea;
	var $valor;
	var $servicio_id;
	var $tareas_as_servicios_id;
	var $fecha_tarea;

	

function tarea(){
}
		//METODOS GET
	function getTarea_id() { return $this->tarea_id;}
	function getNombre_tarea() { return $this->nombre_tarea;}
	function getValor() { return $this->valor;}
	function getServicio_id() { return $this->servicio_id;}
	function getTareas_as_servicios_id() { return $this->tareas_as_servicios_id;}
	function getFecha_tarea() { return $this->fecha_tarea;}
	 
	  //metodos SET
	  
	function setTarea_id($tarea_id) { $this->tarea_id = $tarea_id; }
    function setNombre_tarea($nombre_tarea) {$this->nombre_tarea = $nombre_tarea;}
	function setValor($valor) {$this->valor = $valor; }
	function setServicio_id($servicio_id) {$this->servicio_id = $servicio_id; }   
	function sesTareas_as_servicios_id($tareas_as_servicios_id) { $this->tareas_as_servicios_id = $tareas_as_servicios_id; }
	function setFecha_tarea($fecha_tarea) {$this->fecha_tarea = $fecha_tarea; } 
	
	
			function insert() {
		//$image = $this->image ? "images/".$this->escort."/".$this->image : 'images/siluet.png';
		$insert =  "INSERT INTO tareas(nombre_tarea, valor) VALUES(
				
				'".$this->nombre_tarea."',
				'".$this->valor."');";
		
				return $insert;
	
	}
	function insert2($tarea_id){
		
		$insert2 = "insert into tareas_as_servicios(tarea_id, servicio_id, fecha_tarea) VALUES(
				
				'".$tarea_id."',
				'".$this->servicio_id."',
				'".$this->fecha_tarea."');";
				
				return $insert2;
		
		}
	function insert3(){
		
		$insert3 = "insert into tareas_as_servicios(tarea_id, servicio_id, fecha_tarea) VALUES(
				
				'".$this->tarea_id."',
				'".$this->servicio_id."',
				'".$this->fecha_tarea."');";
				
				return $insert3;
		
		}
	
	function listarTareas()
	{
		//return "select * from servicios, trabajadores";
		return "select *
from tareas, servicios
where servicios.servicios_id = tareas.servicios_id";
	}
	
	function listarTareas2()
	{
		//return "select * from servicios, trabajadores";
		return "select *
from tareas";
	}
	
		function listarTareas3($tarea_id)
	{
		//return "select * from servicios, trabajadores";
		return "select *
from tareas where tarea_id= ".$tarea_id;;
	}

function listarTareas2Nombre($nombre_buscado)
	{
		//return "select * from servicios, trabajadores";
		return "select *
from tareas where nombre_tarea like '%$nombre_buscado%'";
	}




		function listarTareasName($nombres_buscado){
		return "select *
from tareas, servicios
where servicios.servicios_id = tareas.servicios_id and nombre_tarea like '%$nombres_buscado%'" ;
		}
	
	
	   function updateTareas()
		{
			
			$updateTareas =  "update tareas set
			nombre_tarea = '".$this->nombre_tarea."',
			valor = ".$this->valor."
			where tarea_id = ".$this->tarea_id."";
			
			
			return $updateTareas;
			
	
	
	}
	
	  function eliminarTareas($tareas_id){
              return  "delete from tareas where tarea_id =".$tarea_id;
  }
  

	
	
       function getTareaById($tareas_id, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM tarea_id WHERE tareas_id = '$tarea_id'");
		
		if ($row = $base_datos->sql_fetch_assoc($result)) {
		

			$this->setNombre_tarea          ($row['nombre_tarea']);
            $this->setValor      ($row['valor']);
			$this->setServicio_id      ($row['servicio_id']);
			
			
			return true;
		}
		else {
			return false;
		}
	}
	
  

		function listarTareasServicios($servicio_id)
	{
		//return "select * from servicios, trabajadores";
		return "SELECT * 
FROM tareas_as_servicios, servicios, tareas
WHERE servicios.servicio_id = tareas_as_servicios.servicio_id
and tareas_as_servicios.tarea_id = tareas.tarea_id
AND tareas_as_servicios.servicio_id =".$servicio_id;
	}
	
	
		
			
		function listarTareasTrabajadores($tarea_id)
	{
		//return "select * from servicios, trabajadores";
			return "SELECT * FROM tareas_as_servicios, servicios, tareas,  sucursales, trabajadores
			 WHERE servicios.servicio_id = tareas_as_servicios.servicio_id
			  and servicios.trabajador_id = trabajadores.trabajador_id
			  and servicios.sucursal_id = sucursales.sucursal_id
			  and tareas_as_servicios.tarea_id = tareas.tarea_id 
			  AND tareas.tarea_id =$tarea_id ORDER BY servicios.estado_servicio ASC, tareas_as_servicios.fecha_tarea DESC"; 
	}		
			
			
		
	
	
	
			function sumarServicios($servicio_id)
	{
		//return "select * from servicios, trabajadores";
		return "SELECT SUM(tareas.valor)
FROM tareas, servicios WHERE servicios.servicio_id = tareas.servicio_id AND servicios.servicio_id =".$servicio_id;
	}
	
	
				function contarTareas()
	{
		//return "select * from servicios, trabajadores";
		return "SELECT count(*) as number
FROM tareas";
	}
	
	function contarTareasNombre($nombre_buscado)
	{
		//return "select * from servicios, trabajadores";
		return "SELECT count(*) as number
FROM tareas where nombre_tarea like '%$nombre_buscado%'";
	}
	
	
	
	function contarServiciosxTareas($tarea_id)
	{
		//return "select * from servicios, trabajadores";
		return "SELECT count(*) as number FROM tareas_as_servicios, servicios, tareas, trabajadores, sucursales WHERE servicios.servicio_id = tareas_as_servicios.servicio_id and servicios.trabajador_id = trabajadores.trabajador_id and servicios.sucursal_id = sucursales.sucursal_id and tareas_as_servicios.tarea_id = tareas.tarea_id AND tareas.tarea_id =".$tarea_id;
	}
}

	
	
	




?>