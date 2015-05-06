<?php
class venta{

var $ventas_id;
var $monto_pago;
var $pagado;
var $fecha_pago;
var $forma_pago;
var $titular_cheque;
var $serie_cheque;
var $nombre_banco;
var $fecha_creacion;
var $fecha_modificacion;
var $cantidad_abono;
var $cuota;
var $estado;
var $servicio_id;



function sucursal(){
}
	//metodos Get
    function getVentas_id() { return $this->ventas_id;}
	function getMonto_pago() { return $this->monto_pago;}
	function getPagado() { return $this->pagado;}
	function getFecha_pago() { return $this->fecha_pago;}
	function getForma_pago() { return $this->forma_pago;}
    function getTitular_cheque() { return $this->titular_cheque;}
	function getSerie_cheque() { return $this->serie_cheque;}
	function getNombre_banco() { return $this->nombre_banco;}
	function getFecha_creacion() { return $this->fecha_creacion;}
	function getFecha_modificacion() { return $this->fecha_modificacion;}
	function getCantidad_abono() { return $this->cantidad_abono;}	
	function getCuota() { return $this->cuota;}
	function getEstado() { return $this->estado;}
	function getServicio_id() { return $this->servicio_id;}	
			
	//metodos SET
	function setVentas_id($ventas_id) { $this->venta_id = $ventas_id; }
    	function setMonto_pago($monto_pago) { $this->monto_pago = $monto_pago; }
    	function setPagado($pagado) { $this->pagado = $pagado; }
        function setFecha_pago($fecha_pago) { $this->fecha_pago = $fecha_pago; }
        function setForma_pago($forma_pago) { $this->forma_pago = $forma_pago; }
		function setTitular_cheque($titular_cheque) { $this->titular_cheque = $titular_cheque; }		
		function setSerie_cheque($serie_cheque) { $this->serie_cheque = $serie_cheque; }
    	function setNombre_banco($nombre_banco) { $this->nombre_banco = $nombre_banco; }
    	function setFecha_creacion($fecha_creacion) { $this->fecha_creacion = $fecha_creacion; }
        function setFecha_modificacion($fecha_modificacion) { $this->fecha_modificacion = $fecha_modificacion; }
    	function setCantidad_abono($cantidad_abono) { $this->cantidad_abono = $cantidad_abono; }
		function setCuota($cuota) { $this->cuota = $cuota; }
    	function setEstado($estado) { $this->estado = $estado; }		
    	function setServicio_id($servicio_id) { $this->servicio_id = $servicio_id; }
		
		
	  function getVentasByID($sucursal_id, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM ventas WHERE ventas_id = '$ventas_id'");
		if ($row = $base_datos->sql_fetch_assoc($result)) {

			$this->setVentas_id              ($row['ventas_id']);
			$this->setMonto_pago		  ($row['monto_pago']);
			$this->setPagado               ($row['pagado']);
			$this->setFecha_pago               ($row['fecha_pago']);
			$this->setForma_pago               ($row['forma_pago']);
			$this->setSerie_cheque             ($row['serie_cheque']);
			$this->setNombre_banco              ($row['nombre_banco']);
			$this->setFecha_creacion		  ($row['fecha_creacion']);
			$this->setFecha_modificacion               ($row['fecha_modificacion']);
			$this->setCantidad_abono               ($row['cantidad_abono']);
			$this->setEstado             ($row['estado']);			
			
			
			return true;
		}
		else {
			return false;
		}
	}
	
	
	
		function insertVentas() {
		//$image = $this->image ? "images/".$this->escort."/".$this->image : 'images/siluet.png';
		$insertVentas =  "INSERT INTO ventas(monto_pago, pagado, fecha_pago, forma_pago, titular_cheque, serie_cheque, nombre_banco, fecha_creacion, fecha_modificacion, cantidad_abono, cuota ,estado) VALUES(
				
				'".$this->monto_pago."',
				'".$this->pagado."',
				'".$this->fecha_pago."',
				'".$this->forma_pago."',
				'".$this->titular_cheque."',				
				'".$this->serie_cheque."',
				'".$this->nombre_banco."',				
				'".$this->fecha_creacion."',
				'".$this->fecha_modificacion."',
				'".$this->cantidad_abono."',
				'".$this->cuota."',
				'".$this->estado."');";
				
	
    return $insertVentas;
	
	}
	
	
	
	
	
		function updateVentas()
	{
			
		$updateVentas = "update ventas set
		monto_pago = '".$this->monto_pago."',
		pagado = '".$this->pagado."',
		fecha_pago = '".$this->fecha_pago."',
		forma_pago = '".$this->forma_pago."',
		titular_cheque = '".$this->titular_cheque."',
		serie_cheque = '".$this->serie_cheque."',
		nombre_banco = '".$this->nombre_banco."',
		fecha_creacion = '".$this->fecha_creacion."',
		fecha_modificacion = '".$this->fecha_modificacion."',
		cantidad_abono = '".$this->cantidad_abono."',
		cuota = '".$this->cuota."',
		estado = '".$this->estado."'
		where ventas_id = ".$this->ventas_id."";
			
			
		return $updateVentas;
			
	}
	
	function updateVentasxServicios($ventas_id, $servicio_id)
	{
		
		$updateVentasxServicios = "update servicios set
		ventas_id = ".$ventas_id."
		where servicio_id = ".$servicio_id."";
			
			
		return $updateVentasxServicios;
			
	}
	
		function calcularCuotas($ventas_id)
	{
		
		$calcularCuotas = "update ventas set
		cantidad_abono = monto_pago / cuota
		where ventas_id = ".$ventas_id."";
			
			
		return $calcularCuotas;
			
	}
	
	
	
	
	
	function terminarServicio($servicio_id)
	{
		
		$terminarServicio = "update servicios set
		estado_servicio = 0
		where servicio_id = ".$servicio_id."";
			
			
		return $terminarServicio;
			
	}	
	
	
	function updateVentasxProductos($ventas_id, $servicios_as_productos_id)
	{
		
		$updateVentasxServicios = "update servicios_as_productos set
		ventas_id = ".$ventas_id."
		where servicios_as_productos_id = ".$servicios_as_productos_id."";
			
			
		return $updateVentasxServicios;
			
	}
		
	
	
		function eliminarVentas($ventas_id)
	{
        return  "delete from ventas where ventas_id =".$ventas_id;
    }


		function sumarVentas()
	{
        return  "SELECT count(*) as total
FROM servicios, sucursales, ventas
where servicios.ventas_id = ventas.ventas_id 
and servicios.sucursal_id = sucursales.sucursal_id
and ventas.estado = 1";
    }


		function sumarVentasFecha($fecha_inicio1, $fecha_inicio2)
	{
        return  "SELECT count(*) as number 
FROM servicios, sucursales, ventas
where ventas.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2' 
and servicios.ventas_id = ventas.ventas_id 
and servicios.sucursal_id = sucursales.sucursal_id
and ventas.estado = 1";
    }
		
		function sumarVentasFechaMontoPago($fecha_inicio1, $fecha_inicio2)
	{
        return  "SELECT SUM(ventas.monto_pago) as number  
FROM servicios, sucursales, ventas
where ventas.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2' 
and servicios.ventas_id = ventas.ventas_id 
and servicios.sucursal_id = sucursales.sucursal_id
and ventas.estado = 1";
    }


		function listarVentas()
	{
        return  "SELECT *
FROM servicios, sucursales, ventas
where servicios.ventas_id = ventas.ventas_id 
and servicios.sucursal_id = sucursales.sucursal_id
and ventas.estado = 1";
    }

		function listarVentasNaturales()
	{
        return  "SELECT *
FROM servicios, sucursales, ventas , clientes, naturales
where servicios.ventas_id = ventas.ventas_id 
and servicios.sucursal_id = sucursales.sucursal_id
AND servicios.cliente_id = naturales.cliente_id
AND naturales.cliente_id = clientes.cliente_id
and ventas.estado = 1";
    }

		function listarVentasJuridicos()
	{
        return  "SELECT *
FROM servicios, sucursales, ventas , clientes, juridicos
where servicios.ventas_id = ventas.ventas_id 
and servicios.sucursal_id = sucursales.sucursal_id
AND servicios.cliente_id = juridicos.cliente_id
AND juridicos.cliente_id = clientes.cliente_id
and ventas.estado = 1";
    }

		function contarVentaProductos()
	{
        return  "SELECT count(*) as number 
FROM productos, ventas, servicios_as_productos
where productos.producto_id = servicios_as_productos.producto_id
AND ventas.ventas_id = servicios_as_productos.ventas_id
AND ventas.estado =1";
    }

		function contarVentaProductosFecha($fecha_inicio1, $fecha_inicio2)
	{
        return  "SELECT count(*) as number
FROM productos, ventas, servicios_as_productos
where ventas.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2' 
and productos.producto_id = servicios_as_productos.producto_id
AND ventas.ventas_id = servicios_as_productos.ventas_id
AND ventas.estado =1";
    }
		function sumarVentaProductosFecha($fecha_inicio1, $fecha_inicio2)
	{
        return  "SELECT SUM( servicios_as_productos.valor_servicio * servicios_as_productos.cantidad_servicio ) as number
FROM productos, ventas, servicios_as_productos
where ventas.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2' 
and productos.producto_id = servicios_as_productos.producto_id
AND ventas.ventas_id = servicios_as_productos.ventas_id
AND ventas.estado =1";
    }

		function listarVentasFechas($fecha_inicio1, $fecha_inicio2)
	{
        return  "SELECT *
FROM servicios, sucursales, ventas
where ventas.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2' 
and servicios.ventas_id = ventas.ventas_id 
and servicios.sucursal_id = sucursales.sucursal_id
and ventas.estado = 1";
    }		


		function listarVentasFechasNaturales($fecha_inicio1, $fecha_inicio2)
	{
        return  "SELECT *
FROM servicios, sucursales, ventas , clientes, naturales
where ventas.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2'
and servicios.ventas_id = ventas.ventas_id 
and servicios.sucursal_id = sucursales.sucursal_id
AND servicios.cliente_id = naturales.cliente_id
AND naturales.cliente_id = clientes.cliente_id
and ventas.estado = 1";
    }	

		function listarVentasFechasJuridicos($fecha_inicio1, $fecha_inicio2)
	{
        return  "SELECT *
FROM servicios, sucursales, ventas , clientes, juridicos
where ventas.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2'
and servicios.ventas_id = ventas.ventas_id 
and servicios.ventas_id = ventas.ventas_id 
and servicios.sucursal_id = sucursales.sucursal_id
AND servicios.cliente_id = juridicos.cliente_id
AND juridicos.cliente_id = clientes.cliente_id
and ventas.estado = 1";
    }

		
		
		function listarVentasServicios()
	{
        return  "SELECT * 
FROM productos, ventas, servicios_as_productos
WHERE productos.producto_id = servicios_as_productos.producto_id
AND ventas.ventas_id = servicios_as_productos.ventas_id
AND ventas.estado =1";
    }
	
			function listarVentasServiciosFechas($fecha_inicio1, $fecha_inicio2)
	{
        return  "SELECT * 
FROM productos, ventas, servicios_as_productos
where ventas.fecha_creacion
between '$fecha_inicio1' and '$fecha_inicio2' 
and productos.producto_id = servicios_as_productos.producto_id
AND ventas.ventas_id = servicios_as_productos.ventas_id
AND ventas.estado =1";
    }
	

		function listarVentasDesactivadas()
	{
        return  "SELECT *
FROM servicios, sucursales, ventas
where servicios.ventas_id = ventas.ventas_id 
and servicios.sucursal_id = sucursales.sucursal_id
and ventas.estado = 0";
    }

		function listarVentasServiciosDesactivados()
	{
        return  "SELECT * 
FROM productos, ventas, servicios_as_productos
WHERE productos.producto_id = servicios_as_productos.producto_id
AND ventas.ventas_id = servicios_as_productos.ventas_id
AND ventas.estado = 0";
    }

		function sumarValorProductoxServicio($servicio_id)
	{
        
	$sumarValorProductoxServicio = "SELECT SUM(servicios_as_productos.valor_servicio)
FROM servicios, servicios_as_productos WHERE servicios.servicio_id = servicios_as_productos.servicio_id AND servicios.servicio_id = ".$servicio_id."";
 return $sumarValorProductoxServicio;

		
    }

function updateVentaxPagado($ventas_id)
	{
		
		$updateVentaxPagado = "update ventas set
		pagado = 'Pagado'
		where ventas_id = ".$ventas_id;
			
			
		return $updateVentaxPagado;
			
	
	
	}
			function updateVentaxPendiente($ventas_id)
	{
		
		$updateVentaxPendiente = "update ventas set
		pagado = 'Pendiente'
		where ventas_id = ".$ventas_id;
			
			
		return $updateVentaxPendiente;
			
	}


}

?>