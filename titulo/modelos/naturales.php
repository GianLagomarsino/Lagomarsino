<?php
class naturales{

var $naturales_id;
var $nombre;
var $apellido_paterno;
var $apellido_materno;
var $cliente_id;



function naturales(){}
	//metodos Get
    function getNaturales_id() { return $this->naturales_id;}
	function getNombre() { return $this->nombre;}
	function getApellido_Paterno() { return $this->apellido_paterno;}
	function getApellido_Materno() { return $this->apellido_materno;}
	function getCliente_id() { return $this->cliente_id;}
	
	
	
	//metodos SET
	function setNaturales_id($naturales_id) { $this->naturales_id = $naturales_id; }
    	function setNombre($nombre) { $this->nombre= $nombre; }
    	function setApellido_Paterno($apellido_paterno) { $this->apellido_paterno = $apellido_paterno; }
		function setApellido_Materno($apellido_materno) { $this->apellido_materno = $apellido_materno; }
		function setCliente_id($cliente_id) { $this->cliente_id = $cliente_id; }
	
	  function getClientesById($cliente_id, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM naturales WHERE cliente_id = '$cliente_id'");
		if ($row = $base_datos->sql_fetch_assoc($result)) {

			$this->setNaturales_id       ($row['naturales_id']);
			$this->setNombre	         ($row['nombre']);
			$this->setApellido_Paterno   ($row['apellido_paterno']);
			$this->setApellido_Materno   ($row['apellido_materno']);
			$this->setCliente_id         ($row['cliente_id']);
			
			return true;
		}
		else {
			return false;
		}
	}
	
	
	function getClientesByIdPago($pago_id, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM naturales, pagos WHERE pagos.naturales_id = cliente.naturales_id and pagos.pago_id = '$pago_id'");
		if ($row = $base_datos->sql_fetch_assoc($result)){
			
			$this->setNaturales_id              ($row['naturales_id']);
			$this->setNombre	  				($row['nombre']);
			$this->setApellido_Paterno               ($row['apellido_paterno']);
			$this->setApellido_Materno               ($row['apellido_materno']);
			
			
			
			return true;
		}
		else {
			return false;
			}
		}
	
		function insert() {
		//$image = $this->image ? "images/".$this->escort."/".$this->image : 'images/siluet.png';
			$insert =  "INSERT INTO naturales(nombre, apellido_paterno, apellido_materno, cliente_id) VALUES(	
			'".$this->nombre."',
			'".$this->apellido_paterno."',
			'".$this->apellido_materno."',
			".$this->cliente_id.");";
			
			
			return $insert;
		}
	

		function listarClientesNaturales()
	{
		return "select * from clientes, naturales where clientes.cliente_id = naturales.cliente_id";
	}
	

		
		function updateNatural(){
			$update=  "update naturales set nombre='$this->nombre', apellido_paterno='$this->apellido_paterno', apellido_materno='$this->apellido_materno' where cliente_id='$_REQUEST[cliente_id]'";
			
			//echo $update;
			return $update;
		}
		
		function listarClientesNameNatural($nombre_buscado){
	
		return "select clientes.cliente_id, clientes.rut,naturales.naturales_id , naturales.nombre , naturales.apellido_paterno, naturales.apellido_materno, clientes.celular, clientes.direccion, clientes.comuna, clientes.ciudad, clientes.email, clientes.banco  from clientes, naturales WHERE naturales.nombre like '%$nombre_buscado%'  && clientes.cliente_id = naturales.cliente_id";
		}
	
}


?>