<?php
class pago{

var $pagos_id;
var $monto_pago;
var $pagado;
var $fecha_pago;
var $forma_pago;
var $fecha_creacion;
var $fecha_modificacion;
var $deuda;
var $estado;
var $producto_id;





function pago(){
}
	//metodos Get
    function getPagos_id() { return $this->pagos_id;}
	function getMonto_pago() { return $this->monto_pago;}
	function getPagado() { return $this->pagado;}
	function getFecha_pago() { return $this->fecha_pago;}
	function getForma_pago() { return $this->forma_pago;}
	function getFecha_creacion() { return $this->fecha_creacion;}
	function getFecha_modificacion() { return $this->fecha_modificacion;}
	function getDeuda() { return $this->deuda;}	
	function getEstado() { return $this->estado;}
	function getProducto_id() { return $this->producto_id;}
			
	//metodos SET
		function setPagos_id($pagos_id) { $this->pagos_id = $pagos_id; }
    	function setMonto_pago($monto_pago) { $this->monto_pago = $monto_pago; }
    	function setPagado($pagado) { $this->pagado = $pagado; }
        function setFecha_pago($fecha_pago) { $this->fecha_pago = $fecha_pago; }
        function setForma_pago($forma_pago) { $this->forma_pago = $forma_pago; }		
		function setFecha_creacion($fecha_creacion) { $this->fecha_creacion = $fecha_creacion; }
        function setFecha_modificacion($fecha_modificacion) { $this->fecha_modificacion = $fecha_modificacion; }
    	function setDeuda($deuda) { $this->deuda = $deuda; }
    	function setEstado($estado) { $this->estado = $estado; }		
    	function setProducto_id($producto_id) { $this->producto_id = $producto_id; }	
		
	  function getPagosByID($pagos_id, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM pagos WHERE pagos_id = '$pagos_id'");
		if ($row = $base_datos->sql_fetch_assoc($result)) {

			$this->setPagos_id             ($row['pagos_id']);
			$this->setMonto_pago		  ($row['monto_pago']);
			$this->setPagado               ($row['pagado']);
			$this->setFecha_pago               ($row['fecha_pago']);
			$this->setForma_pago               ($row['forma_pago']);
			$this->setFecha_creacion		  ($row['fecha_creacion']);
			$this->setFecha_modificacion               ($row['fecha_modificacion']);
			$this->setDeuda               ($row['deuda']);
			$this->setEstado             ($row['estado']);			
			
			
			return true;
		}
		else {
			return false;
		}
	}
	
	
	
		function insertPagos() {
		//$image = $this->image ? "images/".$this->escort."/".$this->image : 'images/siluet.png';
		$insertPagos =  "INSERT INTO pagos(monto_pago, pagado, fecha_pago, forma_pago, fecha_creacion, fecha_modificacion, deuda, estado) VALUES(
				
				'".$this->monto_pago."',
				'".$this->pagado."',
				'".$this->fecha_pago."',
				'".$this->forma_pago."',							
				'".$this->fecha_creacion."',
				'".$this->fecha_modificacion."',
				'".$this->deuda."',
				'".$this->estado."');";
				
	
    return $insertPagos;
	
	}
	 
		function updatePagos()
	{
			
		$updatePagos = "update pagos set
		monto_pago = '".$this->monto_pago."',
		pagado = '".$this->pagado."',
		fecha_pago = '".$this->fecha_pago."',
		forma_pago = '".$this->forma_pago."',
		fecha_creacion = '".$this->fecha_creacion."',
		fecha_modificacion = '".$this->fecha_modificacion."',
		deuda = '".$this->deuda."',
		estado = '".$this->estado."'
		where pagos_id = ".$this->pagos_id."";
			
			
		return $updatePagos;
			
	}

	
	function updatePagosxProductos($pagos_id, $producto_id)
	{
		
		$updatePagosxProductos = "update pagos set
		producto_id = ".$producto_id."
		where pagos_id = ".$pagos_id."";
			
			
		return $updatePagosxProductos;
			
	}
	
		

	function updatePagosxProductos2($pagos_id, $pago_proveedores_id)
	{
		
		$updatePagosxProductos2 = "update pago_proveedores set
		pagos_id = ".$pagos_id."
		where pago_proveedores_id = ".$pago_proveedores_id."";
			
			
		return $updatePagosxProductos2;
			
	}		 
	function updateProveedoresxEstado($pago_proveedores_id)
	{
		
		$updateProveedoresxEstado = "update pago_proveedores set
		estado = '1'
		where pago_proveedores_id = ".$pago_proveedores_id."";
			
			
		return $updateProveedoresxEstado;
			
	}





		
		function updatePagosxPagado()
	{
		
		$updatePagosxPagado = "update pagos set
		pagado = 'Pagado'
		where pagos_id = '".$this->pagos_id."'";
			
			
		return $updatePagosxPagado;
			
	
	
	}
			function updatePagosxPendiente()
	{
		
		$updatePagosxPendiente = "update pagos set
		pagado = 'pendiente'
		where pagos_id = '".$this->pagos_id."'";
			
			
		return $updatePagosxPendiente;
			
	}
	
	
	
	
	
	
		function eliminarPagos($pago_id)
	{
        return  "delete from pagos where pago_id =".$pago_id;
    }


		function listarPagos()
	{
        return  "SELECT * 
FROM pagos, pago_proveedores, proveedores, productos
WHERE productos.proveedor_id = proveedores.proveedor_id
AND productos.producto_id = pago_proveedores.producto_id
AND pagos.producto_id = pago_proveedores.producto_id
and pago_proveedores.pagos_id = pagos.pagos_id
and pago_proveedores.estado = 1
AND pagos.pagado =  'Pendiente'";
    }
		function listarPagosDetalle($pagos_id)
	{
        return  "SELECT * 
FROM pagos, pago_proveedores, proveedores, productos
WHERE productos.proveedor_id = proveedores.proveedor_id
AND productos.producto_id = pago_proveedores.producto_id
AND pagos.producto_id = pago_proveedores.producto_id
and pago_proveedores.pagos_id = pagos.pagos_id
and pagos.pagos_id = ".$pagos_id."";

    }
	
	
			function listarPagosDetalle2($pagos_id)
	{
        return  "SELECT * 
FROM pagos, pago_proveedores, proveedores, productos
WHERE productos.proveedor_id = proveedores.proveedor_id
AND productos.producto_id = pago_proveedores.producto_id
AND pagos.producto_id = pago_proveedores.producto_id
and pago_proveedores.pagos_id = pagos.pagos_id
and pagos.pagos_id = ".$pagos_id."";

    }
		function listarPagos2()
	{
        return  "SELECT * 
FROM pagos, pago_proveedores, proveedores, productos
WHERE productos.proveedor_id = proveedores.proveedor_id
AND productos.producto_id = pago_proveedores.producto_id
AND pagos.producto_id = pago_proveedores.producto_id
and pago_proveedores.pagos_id = pagos.pagos_id
and pago_proveedores.estado = 1
AND pagos.pagado =  'Pagado'";
    }

		function listarPagosFecha($fecha_inicio1, $fecha_inicio2)
	{
        return  "select * 
from pagos, pago_proveedores, proveedores, productos
where pagos.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2'
and productos.proveedor_id = proveedores.proveedor_id
and productos.producto_id = pago_proveedores.producto_id
and pagos.producto_id = pago_proveedores.producto_id
and pagos.pagado =  'Pendiente'";
    }

		function listarPagosFecha2($fecha_inicio1, $fecha_inicio2)
	{
        return  "select * 
from pagos, pago_proveedores, proveedores, productos
where pagos.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2'
and productos.proveedor_id = proveedores.proveedor_id
and productos.producto_id = pago_proveedores.producto_id
and pagos.producto_id = pago_proveedores.producto_id
and pagos.pagado =  'Pagado'";
    }

	

		function listarVentasDesactivadas()
	{
        return  "SELECT *
FROM pago_proveedores, proveedores, productos, pagos
where productos.producto_id = pago_proveedores.roducto_id 
and pago_proveedores.pago_id = pagos.pago_id
and pagos.estado = 0";
    }

			function contarPagosPendientes()
	{
        return  "SELECT count(*) as number
FROM pagos, pago_proveedores, proveedores, productos
WHERE productos.proveedor_id = proveedores.proveedor_id
AND productos.producto_id = pago_proveedores.producto_id
AND pagos.producto_id = pago_proveedores.producto_id
and pago_proveedores.pagos_id = pagos.pagos_id
AND pagos.pagado =  'Pendiente'";
    }


			function contarPagosPendientesFecha($fecha_inicio1, $fecha_inicio2)
	{
        return  "SELECT count(*) as number
FROM pagos, pago_proveedores, proveedores, productos
WHERE pagos.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2' 
and productos.proveedor_id = proveedores.proveedor_id
AND productos.producto_id = pago_proveedores.producto_id
AND pagos.producto_id = pago_proveedores.producto_id
AND pagos.pagado =  'Pendiente'";
    }

			function sumarPagosPendientesFecha($fecha_inicio1, $fecha_inicio2)
	{
        return  "SELECT SUM( pagos.monto_pago ) as number
FROM pagos, pago_proveedores, proveedores, productos
WHERE pagos.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2'
AND productos.proveedor_id = proveedores.proveedor_id
AND productos.producto_id = pago_proveedores.producto_id
AND pagos.producto_id = pago_proveedores.producto_id
AND pagos.pagado =  'Pendiente'";
    }
	
			function contarPagosPagados()
	{
        return  "SELECT count(*) as number
FROM pagos, pago_proveedores, proveedores, productos
WHERE productos.proveedor_id = proveedores.proveedor_id
AND productos.producto_id = pago_proveedores.producto_id
AND pagos.producto_id = pago_proveedores.producto_id
AND pagos.pagado =  'Pagado'";
    }

			function contarPagosPagadosFecha($fecha_inicio1, $fecha_inicio2)
	{
        return  "SELECT count(*) as number
FROM pagos, pago_proveedores, proveedores, productos
WHERE productos.proveedor_id = proveedores.proveedor_id
AND productos.producto_id = pago_proveedores.producto_id
AND pagos.producto_id = pago_proveedores.producto_id
AND pagos.pagado =  'Pagado'";
    }

			function sumarPagosPagadosFecha($fecha_inicio1, $fecha_inicio2)
	{
        return  "SELECT SUM(pagos.monto_pago) as number
FROM pagos, pago_proveedores, proveedores, productos
WHERE pagos.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2'
and productos.proveedor_id = proveedores.proveedor_id
AND productos.producto_id = pago_proveedores.producto_id
AND pagos.producto_id = pago_proveedores.producto_id
AND pagos.pagado =  'Pagado'";
    }



}

?>