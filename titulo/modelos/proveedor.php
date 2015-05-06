<?php
class proveedor{

	var $proveedor_id;
	var $nombre_proveedor;
	var $direccion_proveedor;
	var $email_proveedor;
	var $rut_proveedor;
	var $telefono_proveedor;
	var $celular_proveedor;
	var $pago_proveedor_id;
	var $cantidad_producto;
	var $total_producto;
	var $pagos_id;
function proveedor(){
}
		//METODOS GET
	function getProveedor_id() { return $this->proveedor_id;}
	function getNombre_proveedor() { return $this->nombre_proveedor;}
	function getDireccion_proveedor() { return $this->direccion_proveedor;}
	function getEmail_proveedor() { return $this->email_proveedor;}
	function getRut_proveedor()              { return $this->rut_proveedor;}
	function getTelefono_proveedor() { return $this->telefono_proveedor;}
	function getCelular_proveedor () { return $this->celular_proveedor;}
		function getPago_proveedor_id () { return $this->pago_proveedor_id;}
	function getCantidad_producto () { return $this->cantidad_producto;}
	function getTotal_producto () { return $this->total_producto;}
	

	  //metodos SET
	  
	function setProveedor_id($proveedor_id) { $this->proveedor_id = $proveedor_id; }
    function setNombre_proveedor($nombre_proveedor) {$this->nombre_proveedor = $nombre_proveedor;}
    function setDireccion_proveedor($direccion_proveedor) {$this->direccion_proveedor=$direccion_proveedor;}
    function setEmail_proveedor($email_proveedor) { $this->email_proveedor = $email_proveedor; }
    function setRut_proveedor($rut_proveedor) { $this->rut_proveedor = $rut_proveedor; }
	function setTelefono_proveedor($telefono_proveedor) { $this->telefono_proveedor = $telefono_proveedor; }
	function setCelular_proveedor($celular_proveedor) { $this->celular_proveedor = $celular_proveedor; }
	function setPago_proveedor_id($pago_proveedor_id) { $this->pago_proveedor_id = $pago_proveedor_id; } 
	function setCantidad_producto($cantidad_producto) { $this->cantidad_producto = $cantidad_producto; }  
	function setTotal_producto($total_producto) { $this->total_producto = $total_producto; }
	
	
			function insert() {
		//$image = $this->image ? "images/".$this->escort."/".$this->image : 'images/siluet.png';
		$insert =  "INSERT INTO proveedores (nombre_proveedor, direccion_proveedor, email_proveedor, rut_proveedor, telefono_proveedor, celular_proveedor) VALUES(
				
				'".$this->nombre_proveedor."',
				'".$this->direccion_proveedor."',
        		'".$this->email_proveedor."',
				'".$this->rut_proveedor."',
				'".$this->telefono_proveedor."',
				'".$this->celular_proveedor."');";
		
		return $insert;
	
	}
	function listarProveedores()
	{
		return "select proveedor_id, nombre_proveedor, direccion_proveedor , email_proveedor, rut_proveedor, telefono_proveedor, celular_proveedor from proveedores";
	}
	
			function listarProveedores2($proveedor_id)
	{
		return "SELECT * 
		FROM proveedores 
		WHERE proveedor_id =".$proveedor_id."";
		
		}
	
function listarProductosxProveedor($proveedor_id)
	
	{
		return "select * 
from productos, proveedores, pago_proveedores
where productos.producto_id = pago_proveedores.producto_id
and productos.proveedor_id = proveedores.proveedor_id
and pago_proveedores.estado = '0'
and proveedores.proveedor_id = ".$proveedor_id."";

	}	
	
	
	function listarProductosxProveedor2($proveedor_id)
	
	{
		return "select * 
from productos, proveedores, pago_proveedores
where productos.producto_id = pago_proveedores.producto_id
and productos.proveedor_id = proveedores.proveedor_id
and pago_proveedores.estado = '1'
and proveedores.proveedor_id = ".$proveedor_id."";

	}
	
	
		function listarProveedoresName($nombre_buscado){
		return "select * FROM proveedores WHERE nombre_proveedor like '%$nombre_buscado%'" ;
		}
	
	function getProveedorById($proveedor_id, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM proveedores WHERE proveedor_id = '$proveedor_id'");
		if ($row = $base_datos->sql_fetch_assoc($result)) {

			
			
			$this->setProveedor_id              ($row['proveedor_id']);
			$this->setNombre_proveedor		  ($row['nombre_proveedor']);
			$this->setDireccion_proveedor               ($row['direccion_proveedor']);
			$this->setEmail_proveedor                     ($row['email_proveedor']);
			$this->setRut_proveedor      ($row['rut_proveedor']);
			$this->setTelefono_proveedor		              ($row['telefono_proveedor']);
			$this->setCelular_proveedor                  ($row['celular_proveedor']);

			
			
			
			return true;
		}
		else {
			return false;
		}
	}
	

		function validarRut($rut_proveedor)
	{
		return "select * from proveedores where rut_proveedor = '$rut_proveedor'";

		
	}
	
	
	
	
	
			function updateProveedores()
		{
			
			$updateProveedores=  "update proveedores set
			nombre_proveedor= '".$this->nombre_proveedor."',
			direccion_proveedor= '".$this->direccion_proveedor."',
			email_proveedor= '".$this->email_proveedor."',
			rut_proveedor= '".$this->rut_proveedor."',
			telefono_proveedor= ".$this->telefono_proveedor.",
			celular_proveedor= ".$this->celular_proveedor."
			where proveedor_id = ".$this->proveedor_id."";
			
			
			return $updateProveedores;
			
	
	
	}
	
		  function eliminarProveedor($proveedor_id){
              return  "delete from proveedores where proveedor_id =".$proveedor_id;
  }
	function contarProductosProveedorPendiente($proveedor_id){
              return  "SELECT SUM( pago_proveedores.total_producto) as number
FROM productos, proveedores, pago_proveedores
WHERE productos.producto_id = pago_proveedores.producto_id
AND productos.proveedor_id = proveedores.proveedor_id
AND pago_proveedores.estado =  '0'
AND proveedores.proveedor_id = ".$proveedor_id;
  }
	function contarProductosProveedorPagados($proveedor_id){
              return  "SELECT SUM( pago_proveedores.total_producto) as number
FROM productos, proveedores, pago_proveedores
WHERE productos.producto_id = pago_proveedores.producto_id
AND productos.proveedor_id = proveedores.proveedor_id
AND pago_proveedores.estado =  '1'
AND proveedores.proveedor_id = ".$proveedor_id;
  }	
	
	function contarProveedores(){
              return  "SELECT count(*) as number
FROM proveedores ";
  }
	
	function contarProveedoresNombre($nombre_buscado){
              return  "SELECT count(*) as number
FROM proveedores where nombre_proveedor like '%$nombre_buscado%' ";
  }	
	
}

?>