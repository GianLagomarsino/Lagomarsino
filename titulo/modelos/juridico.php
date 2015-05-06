<?php
class juridico{

var $juridico_id;
var $nombre_empresa;
var $razon_social;
var $giro;
var $representante_legal;
var $cliente_id;


function juridico(){
}
	//metodos Get
    function getJuridico_id() { return $this->juridico_id;}
	function getNombre_empresa() { return $this->nombre_empresa;}
	function getRazon_social() { return $this->razon_social;}
	function getGiro() { return $this->giro;}
	function getRepresentante_legal() { return $this->representante_legal;}
	function getCliente_id() { return $this->cliente_id;}
	
	
	//metodos SET
		function setJuridico_id($juridico_id) { $this->juridico_id = $juridico_id; }
    	function setNombre_empresa($nombre_empresa) { $this->nombre_empresa = $nombre_empresa; }
    	function setRazon_social($razon_social) { $this->razon_social = $razon_social; }
    	function setGiro($giro) { $this->giro = $giro; }
    	function setRepresentante_legal($representante_legal) { $this->representante_legal = $representante_legal; }
		function setCliente_id($cliente_id) { $this->cliente_id = $cliente_id; }
    	
	
	  function getClientesById($cliente_id, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM juridicos WHERE cliente_id = '$cliente_id'");
		if ($row = $base_datos->sql_fetch_assoc($result)) {

			$this->setJuridico_id         ($row['juridico_id']);
			$this->setNombre_empresa	  ($row['nombre_empresa']);
			$this->setRazon_social        ($row['razon_social']);
			$this->setGiro                ($row['giro']);
			$this->setRepresentante_legal ($row['representante_legal']);
			$this->setCliente_id         ($row['cliente_id']);
			
			return true;
		}
		else {
			return false;
		}
	}
	
	
	
		function insert() {
		//$image = $this->image ? "images/".$this->escort."/".$this->image : 'images/siluet.png';
		$insert =  "INSERT INTO juridicos(nombre_empresa,razon_social,giro,representante_legal,cliente_id) VALUES(
				
				'".$this->nombre_empresa."',
				'".$this->razon_social."',
        		'".$this->giro."',
				'".$this->representante_legal."',
				".$this->cliente_id.");";
				
				
    return $insert;
	
	}
	
	
	function listarClientesJuridicos()
	{
		return "select clientes.cliente_id, clientes.rut, juridicos.nombre_empresa , juridicos.razon_social,juridicos.giro,juridicos.representante_legal,clientes.celular, clientes.direccion, clientes.comuna, clientes.ciudad, clientes.email, clientes.banco  from clientes, juridicos where  clientes.cliente_id = juridicos.cliente_id";
	}
	
		
	
				function updateJuridico()
		{
			
			$update=  "update juridicos set nombre_empresa='$this->nombre_empresa', razon_social='$this->razon_social',giro='$this->giro',representante_legal='$this->representante_legal' where cliente_id = '$_REQUEST[cliente_id]'";
			
			
			return $update;
	
	}
			
			
	
	
		  function eliminarClientes($cliente_id){
           return  "delete clientes, juridicos from clientes, juridicos where clientes.cliente_id && juridicos.cliente_id =".$cliente_id ;
		   

  }
	
	
		function listarClientesNameJuridico($nombre_buscado){
	
		return "select clientes.cliente_id, clientes.rut, juridicos.nombre_empresa , juridicos.razon_social, juridicos.giro, juridicos.representante_legal, juridicos.giro, clientes.celular, clientes.direccion, clientes.comuna, clientes.ciudad, clientes.email, clientes.banco  from clientes, juridicos WHERE juridicos.nombre_empresa like '%$nombre_buscado%'  && clientes.cliente_id = juridicos.cliente_id";
		}
	
	}






?>