<?php
class producto{

	var $producto_id;
	var $nombre_producto;
	var $descripcion;
	var $marca;
	var $fecha_ingreso;
	var $fecha_termino;
	var $precio;
	var $precio_unitario;
	var $cantidad;
	var $descuento;
	var $valor_total;
	var $servicios_as_productos_id;
	var $servicio_id; 
	var $ventas_id; 
	var $cantidad_servicio;
	var $valor_servicio;
	var $proveedor_id;
	var $pago_proveedores_id;
	var $cantidad_producto;
	var $total_producto;
	var $pagos_id;
	

function producto(){
}
		//METODOS GET
	function getProducto_id() { return $this->producto_id;}
	function getServicio_id() { return $this->servicio_id;}
	function getVentas_id() { return $this->ventas_id;}
	function getNombre_producto() { return $this->nombre_producto;}
	function getDescripcion() { return $this->descripcion;}
	function getMarca() { return $this->marca;}
	function getFecha_ingreso() { return $this->fecha_ingreso;}
	function getFecha_termino() { return $this->fecha_termino;}
	function getPrecio () { return $this->precio;}
	function getPrecio_unitario () { return $this->precio_unitario;}
	function getCantidad () { return $this->cantidad;}
	function getDescuento () { return $this->descuento;}
	function getValor_total () { return $this->valor_total;}	
	function getServicios_as_productos_id () { return $this->servicios_as_productos_id;}
	function getCantidad_servicio () { return $this->cantidad_servicio;}	
	function getValor_servicio () { return $this->valor_servicio;}
	function getProveedor_id () { return $this->proveedor_id;}
	function getPago_proveedores_id () { return $this->pago_proveedores_id;}
	function getCantidad_producto () { return $this->cantidad_producto;}
	function getTotal_producto () { return $this->total_producto;}
	
	  //metodos SET
	  
	function setProducto_id($producto_id) { $this->producto_id = $producto_id; }
	function setServicio_id($servicio_id) { $this->servicio_id = $servicio_id; }	
	function setVentas_id($ventas_id) { $this->ventas_id = $ventas_id; }	
    function setNombre_producto($nombre_producto) {$this->nombre_producto = $nombre_producto;}
	function setDescripcion($descripcion) {$this->descripcion=$descripcion;}   
	function setMarca($marca) {$this->marca=$marca;}
    function setFecha_ingreso($fecha_ingreso) { $this->fecha_ingreso = $fecha_ingreso; }
    function setFecha_termino($fecha_termino) { $this->fecha_termino = $fecha_termino; }
	function setPrecio($precio) { $this->precio = $precio; }
	function setPrecio_unitario($precio_unitario) { $this->precio_unitario = $precio_unitario; }
	function setCantidad($cantidad) { $this->cantidad = $cantidad; }
    function setDescuento($descuento) { $this->descuento = $descuento; }	
	function setValor_total($valor_total) { $this->valor_total = $valor_total; }  
	function setServicios_as_productos_id($servicios_as_productos_id) { $this->servicios_as_productos_id = 			   $servicios_as_productos_id; }  
	function setCantidad_servicio($cantidad_servicio) { $this->cantidad_servicio = $cantidad_servicio; } 
	function setValor_servicio($valor_total) { $this->valor_servicio = $valor_servicio; }  
	function setProveedor_id($proveedor_id) { $this->proveedor_id = $proveedor_id; }
	function setPago_proveedores_id($pago_proveedores_id) { $this->pago_proveedores_id = $pago_proveedores_id; } 
	function setCantidad_producto($cantidad_producto) { $this->cantidad_producto = $cantidad_producto; }  
	function setTotal_producto($total_producto) { $this->total_producto = $total_producto; }
	
	
	
	
	
		function getProductoById($producto_id, $base_datos) {
		$result = $base_datos->sql_query("SELECT * FROM productos WHERE producto_id = '$producto_id'");
		if ($row = $base_datos->sql_query($result)) {

			
			
			$this->setProducto_id              ($row['producto_id']);
			$this->setNombre_producto		  ($row['nombre_producto']);
			$this->setDescripcion               ($row['descripcion']);
			$this->setMarca                     ($row['marca']);
			$this->setFecha_ingreso      ($row['fecha_ingreso']);
			$this->setFecha_termino		              ($row['fecha_termino']);
			$this->setPrecio                  ($row['precio']);

			$this->setCantidad              ($row['cantidad']);
			$this->setDescuento		  ($row['descuento']);
			$this->setValor_total               ($row['valor_total']);
			$this->setServicios_as_productos_id               ($row['servicios_as_productos_id']);
			
			
			return true;
		}
		else {
			return false;
		}
	}
	
	
	
	
	
	
	
			function insert() {
		//$image = $this->image ? "images/".$this->escort."/".$this->image : 'images/siluet.png';
		$insert =  "INSERT INTO productos (nombre_producto, descripcion, marca, fecha_ingreso, fecha_termino, precio_unitario, precio , cantidad, descuento, valor_total, proveedor_id) VALUES(
				
				'".$this->nombre_producto."',
				'".$this->descripcion."',
        		'".$this->marca."',
				'".$this->fecha_ingreso."',
				'".$this->fecha_termino."',
				'".$this->precio_unitario."',
				'".$this->precio."',
				'".$this->cantidad."',
				'".$this->descuento."',
				'".$this->valor_total."',
				'".$this->proveedor_id."');";
		
		return $insert;
	    
		
	
	}
			function insertProductos() {
		//$image = $this->image ? "images/".$this->escort."/".$this->image : 'images/siluet.png';
		$insertProductos =  "insert into pago_proveedores (cantidad_producto, estado, producto_id) VALUES(
				
				'".$this->cantidad."',
				'0',
				'".$this->producto_id."');";
		
		return $insertProductos;
	    
	}
	
	
			function insertProductos2($producto_id) {
		//$image = $this->image ? "images/".$this->escort."/".$this->image : 'images/siluet.png';
		$insertProductos =  "insert into pago_proveedores (cantidad_producto, estado, producto_id) VALUES(
				
				'".$this->cantidad."',
				'0',
				'".$producto_id."')";
		
		return $insertProductos;
	    
	}
	
	
	
	 function updateCantidadPagoProveedor($pago_proveedores_id)
	{
	 $updateCantidadPagoProveedor = "
update productos, pago_proveedores  set
pago_proveedores.total_producto = ".$this->cantidad." * (productos.precio_unitario)
where productos.producto_id = pago_proveedores.producto_id
and pago_proveedores.pago_proveedores_id =".$pago_proveedores_id."";
			
		return $updateCantidadPagoProveedor;	
	}	
	
	
	
	
	
	
	
   function updateCantidad($producto_id)
	{
	 $updateCantidad = "
update productos  set
valor_total = cantidad * precio
where producto_id =".$producto_id."";
			
		return $updateCantidad;	
	}		 

	function validarProducto()
	{
		
		return "select * from servicios_as_productos
where servicio_id = ".$this->servicio_id."
and  producto_id = ".$this->producto_id."";

		
	}
	
	function insertServicios_as_productos() {
		//$image = $this->image ? "images/".$this->escort."/".$this->image : 'images/siluet.png';
		$insertServicios_as_productos =  "INSERT INTO servicios_as_productos(servicio_id, producto_id, ventas_id ,cantidad_servicio) values (
			
			
			'".$this->servicio_id."',
			'".$this->producto_id."',
			'".$this->ventas_id."',
			'".$this->cantidad_servicio."');";
			
			return $insertServicios_as_productos;
	
		}
	
	
	
	
	
	
	   function updateProductosXservicioss()
	{
	 $updateProductosXservicioss = "
update productos, servicios_as_productos set
productos.cantidad = productos.cantidad - =".$this->cantidad_servicio."
where productos.producto_id = servicios_as_productos.producto_id
and servicios_as_productos.servicios_as_productos_id =".$this->servicios_as_productos_id."";
			
		return $updateProductosXservicioss;	
	}
		

	
	   function updateProductosXservicios($servicios_as_productos_id)
	{
	 $updateProductosXservicios = "
update productos, servicios_as_productos set
productos.cantidad = productos.cantidad - servicios_as_productos.cantidad_servicio
where productos.producto_id = servicios_as_productos.producto_id
and servicios_as_productos.servicios_as_productos_id =".$servicios_as_productos_id."";
			
		return $updateProductosXservicios;	
	}
		
	
	
		   function updateProductosXservicios2($servicios_as_productos_id)
	{
	 $updateProductosXservicios2 = "
update productos, servicios_as_productos set
productos.cantidad = productos.cantidad + servicios_as_productos.cantidad_servicio
where productos.producto_id = servicios_as_productos.producto_id
and servicios_as_productos.servicios_as_productos_id =".$servicios_as_productos_id."";
			
		return $updateProductosXservicios2;	
	}
	
		   function updateProductosXservicios3($servicios_as_productos_id)
	{
	 $updateProductosXservicios3 = "
UPDATE productos,
servicios_as_productos SET servicios_as_productos.valor_servicio = productos.precio * servicios_as_productos.cantidad_servicio WHERE productos.producto_id = servicios_as_productos.producto_id AND servicios_as_productos.servicios_as_productos_id =".$servicios_as_productos_id."";
			
		return $updateProductosXservicios3;	
	}
		 
		 
		 
		function updateProductosXservicios4($servicios_as_productos_id)
	{
	 $updateProductosXservicios4 = "
UPDATE productos,
servicios_as_productos SET productos.valor_total = productos.precio * productos.cantidad WHERE productos.producto_id = servicios_as_productos.producto_id AND servicios_as_productos.servicios_as_productos_id =".$servicios_as_productos_id."";
			
		return $updateProductosXservicios4;	
	}			 
		 
		   function updateProductosXservicios5()
	{
	 $updateProductosXservicios5 = "
UPDATE productos,
servicios_as_productos SET servicios_as_productos.valor_servicio = (productos.precio) * (servicios_as_productos.cantidad_servicio) WHERE productos.producto_id = servicios_as_productos.producto_id AND servicios_as_productos.servicios_as_productos_id =".$this->servicios_as_productos_id."";
			
		return $updateProductosXservicios5;	
	}	
	
	function updateProductosXservicios6()
	{
	 $updateProductosXservicios6 = "
update productos, servicios_as_productos set
productos.cantidad = (productos.cantidad) + (".$this->cantidad_servicio.")
where productos.producto_id = servicios_as_productos.producto_id
and servicios_as_productos.servicios_as_productos_id =".$this->servicios_as_productos_id."";
			
		return $updateProductosXservicios6;	
	}
	
	function updateProductosXservicios7()
	{
	 $updateProductosXservicios7 = "
update productos, servicios_as_productos set
productos.cantidad = (productos.cantidad) - (".$this->cantidad_servicio.")
where productos.producto_id = servicios_as_productos.producto_id
and servicios_as_productos.servicios_as_productos_id =".$this->servicios_as_productos_id."";
			
		return $updateProductosXservicios7;	
	}	
	
function calcularMontoPago($servicios_as_productos_id)
	{
	 $calcularMontoPago = "
UPDATE productos,
servicios_as_productos, ventas
SET ventas.monto_pago = (servicios_as_productos.cantidad_servicio) * (servicios_as_productos.valor_servicio)
WHERE productos.producto_id = servicios_as_productos.producto_id 
AND servicios_as_productos.ventas_id = ventas.ventas_id 
AND servicios_as_productos.servicios_as_productos_id =".$servicios_as_productos_id."";
			
		return $calcularMontoPago;	
	}		
	
	

	
	
	
	
		

		   function updateLimpiarValor($servicios_as_productos_id)
	{
	 $updateLimpiarValor = "
update
productos, servicios_as_productos
SET
servicios_as_productos.valor_servicio = 0
where productos.producto_id = servicios_as_productos.producto_id
and servicios_as_productos.servicios_as_productos_id=".$servicios_as_productos_id."";
			
		return $updateLimpiarValor;	
	}	

function updateProveedoresxEstado($pago_proveedores_id)
		{
			
			$updateProveedoresxEstado=  "update pago_proveedores set
			estado = '1'
			where pago_proveedores_id = ".$pago_proveedores_id."";
			
			
			return $updateProveedoresxEstado;
			
	
	
	}	
	
	
	
	
	
	
	function listarProductos()
	{
		return "select * from productos where cantidad > 0";
	}
	
		function listarProductosName($nombres_buscado){
		return "select * FROM productos WHERE nombre_producto like '%$nombres_buscado%' and cantidad > 0" ;
		}

	function listarProductos2()
	{
		return "select * from productos where cantidad <= 0";
	}
	
		function listarProductosName2($nombres_buscado){
		return "select * FROM productos WHERE nombre_producto like '%$nombres_buscado%' and cantidad <= 0" ;
		}

	
	

	
	   function updateProductos()
	{
		$updateProductos = "update productos set 
			nombre_producto = '".$this->nombre_producto."',
			descripcion = '".$this->descripcion."',
			marca = '".$this->marca."',
			fecha_ingreso = '".$this->fecha_ingreso."',
			precio = ".$this->precio.",
            cantidad = ".$this->cantidad."
			where producto_id = ".$this->producto_id."";
			
		return $updateProductos;	
	}
  function updateProductosCantidad()
	{
		$updateProductosCantidad = "update productos set 
			
            cantidad = cantidad + ".$this->cantidad."
			where producto_id = ".$this->producto_id."";
			
		return $updateProductosCantidad;	
	}	
	
 function updateProductosCantidad2()
	{
			 $updateProductosCantidad2 = "update productos set valor_total = (precio * cantidad) where producto_id= ".$this->producto_id."";
			
		return $updateProductosCantidad2;	
	}
	
	
	
  function updateProductosCantidadServicio()
	{
		$updateProductosCantidadServicio = "update servicios_as_productos set 
			
            cantidad_servicio = cantidad_servicio + ".$this->cantidad_servicio."
			where servicios_as_productos_id = ".$this->servicios_as_productos_id."";
			
		return $updateProductosCantidadServicio;	
	}		

  function updateProductosCantidadServicio2()
	{
		$updateProductosCantidadServicio2 = "update productos set 
			
            cantidad = cantidad - ".$this->cantidad_servicio."
			where producto_id = ".$this->producto_id."";
			
		return $updateProductosCantidadServicio2;	
	}	


	
  function updateProductosCantidad3()
	{
		$updateProductosCantidad3 = "update servicios_as_productos set 
			
            cantidad_servicio = cantidad_servicio + ".$this->cantidad_servicio."
			where servicios_as_productos_id = ".$this->servicios_as_productos_id."";
			
		return $updateProductosCantidad3;	
	}	
	
 function updateProductosCantidad5()
	{
			 $updateProductosCantidad5 = "update
			  servicios_as_productos, productos set servicios_as_productos.valor_servicio =
			   (productos.precio) * (servicios_as_productos.cantidad_servicio)
			   where productos.producto_id = servicios_as_productos.producto_id
			   and servicios_as_productos.servicios_as_productos_id = ".$this->servicios_as_productos_id."";
			
		return $updateProductosCantidad5;	
	}	
	
		
	
	
	
  function updateProductosCantidad4()
	{
		$updateProductosCantidad4 = "update servicios_as_productos, productos set 
			
            servicios_as_productos.cantidad_servicio = (servicios_as_productos.cantidad_servicio) - (".$this->cantidad_servicio.")
			where productos.producto_id = servicios_as_productos.producto_id
and servicios_as_productos.servicios_as_productos_id = ".$this->servicios_as_productos_id."";
			
		return $updateProductosCantidad4;	
	}		



	
	
		  function eliminarProducto($producto_id){
              return  "delete from productos where producto_id =".$producto_id;
  }
  
  		  function eliminarProductoxServicio($servicios_as_productos_id){
              return  "delete from servicios_as_productos where servicios_as_productos_id =".$servicios_as_productos_id;
  }
  
  
    function listarProductosDetalles($producto_id)
	
	{
		return "SELECT * 
from productos
where producto_id = ".$producto_id;

	}	
	
	    function listarProductosDetallesProveedores($producto_id)
	
	{
		return "SELECT * from productos, proveedores
where proveedores.proveedor_id = productos.proveedor_id 
and productos.producto_id = ".$producto_id;

	}
	
  
  function listarProductosxServicios($producto_id)
	
	{
		return "SELECT * 
from servicios, productos
where productos.servicios_as_productos_id = servicios.servicio_id
and productos.producto_id = ".$producto_id;

	}	
	
	  
  function contarProductos()
	
	{
		return "SELECT count(*) as number
FROM productos where cantidad > 0 ";

	}	
	
	  function contarProductosNombre($nombre_buscado)
	
	{
		return "SELECT count(*) as number
FROM productos where cantidad > 0 and nombre_producto like '%$nombre_buscado%' ";

	}		
	
	  function contarProductosSinStock()
	
	{
		return "SELECT count(*) as number
FROM productos where cantidad <= 0 ";

	}	
	
		
	  function contarProductosSinStockNombre($nombre_buscado)
	
	{
		return "SELECT count(*) as number
FROM productos where cantidad <= 0 and nombre_producto like '%$nombre_buscado%' ";

	}	
	
				function listarProductosxServicios2($producto_id)
	
	{
		return "select * from productos, servicios, servicios_as_productos, trabajadores, sucursales where servicios.servicio_id = servicios_as_productos.servicio_id and servicios.trabajador_id = trabajadores.trabajador_id and servicios.estado_servicio = '1' and servicios.sucursal_id = sucursales.sucursal_id and productos.producto_id = servicios_as_productos.producto_id and productos.producto_id = ".$producto_id;

	}
	
	
					function contarProductosxServicios2($producto_id)
	
	{
		return "select count(*) as cuentaProductosxServicios2 from productos, servicios, servicios_as_productos, trabajadores, sucursales where servicios.servicio_id = servicios_as_productos.servicio_id and servicios.trabajador_id = trabajadores.trabajador_id and servicios.estado_servicio = '1' and servicios.sucursal_id = sucursales.sucursal_id and productos.producto_id = servicios_as_productos.producto_id and productos.producto_id = ".$producto_id;

	}
	
	function listarProductosxServicios3($producto_id)
	
	{
		return "select productos.producto_id,
		servicios.estado_servicio,
servicios.nombre_servicio,
servicios.servicio_id,
servicios.descripcion,
servicios.fecha_creacion,
trabajadores.trabajador_id,
trabajadores.nombre,
trabajadores.apellido_paterno,
trabajadores.apellido_materno,
sucursales.sucursal_id,
sucursales.nombre_sucursal,
ventas.fecha_creacion as fecha_termino
from productos, servicios, servicios_as_productos, trabajadores, sucursales,ventas 
where servicios.servicio_id = servicios_as_productos.servicio_id and servicios.trabajador_id = trabajadores.trabajador_id 
and servicios.estado_servicio = '0'
and servicios.ventas_id = ventas.ventas_id
and servicios.sucursal_id = sucursales.sucursal_id 
and productos.producto_id = servicios_as_productos.producto_id and productos.producto_id =".$producto_id;

	}
	
	
					function contarProductosxServicios3($producto_id)
	
	{
		return "select count(*) as cuentaProductosxServicios3 from productos, servicios, servicios_as_productos, trabajadores, sucursales where servicios.servicio_id = servicios_as_productos.servicio_id and servicios.trabajador_id = trabajadores.trabajador_id and servicios.estado_servicio = '0' and servicios.sucursal_id = sucursales.sucursal_id and productos.producto_id = servicios_as_productos.producto_id and productos.producto_id = ".$producto_id;

	}
	
	function listarProductosxVentas1($producto_id)
	
	{
		return "select productos.nombre_producto, servicios_as_productos.cantidad_servicio, productos.precio_unitario, productos.precio, servicios_as_productos.valor_servicio, ventas.pagado, ventas.forma_pago, ventas.fecha_pago, ventas.estado, ventas.ventas_id from productos, servicios_as_productos, ventas where productos.producto_id = servicios_as_productos.producto_id and servicios_as_productos.ventas_id = ventas.ventas_id and productos.producto_id =".$producto_id;

	}	
	
	
						function contarProductosxVentas1($producto_id)
	
	{
		return "select count(*) as cuentaProductosxVentas1 from productos, servicios_as_productos, ventas where productos.producto_id = servicios_as_productos.producto_id and servicios_as_productos.ventas_id = ventas.ventas_id and productos.producto_id = ".$producto_id;

	}
	
							function sumarProductosxVentas1($producto_id)
	
	{
		return "select SUM(servicios_as_productos.valor_servicio) as cuenta from productos, servicios_as_productos, ventas where productos.producto_id = servicios_as_productos.producto_id and servicios_as_productos.ventas_id = ventas.ventas_id and productos.producto_id = ".$producto_id;

	}
	
								function sumarCantidadProductosxVentas1($producto_id)
	
	{
		return "select SUM(servicios_as_productos.cantidad_servicio) as cuenta2 from productos, servicios_as_productos, ventas where productos.producto_id = servicios_as_productos.producto_id and servicios_as_productos.ventas_id = ventas.ventas_id and productos.producto_id =".$producto_id;

	}
	
	
	
		function listarProductosxPagos1($producto_id)
	
	{
		return "select * from productos, proveedores, pago_proveedores, pagos where productos.producto_id = pago_proveedores.producto_id and pago_proveedores.pagos_id = pagos.pagos_id and productos.proveedor_id = proveedores.proveedor_id and productos.producto_id =".$producto_id;

	}	
	
		function contarProductosxPagosFinlaziados($producto_id)
	
	{
		return "select count(*) as cuenta1 from productos, proveedores, pago_proveedores, pagos where productos.producto_id = pago_proveedores.producto_id and pago_proveedores.pagos_id = pagos.pagos_id and productos.proveedor_id = proveedores.proveedor_id and productos.producto_id =".$producto_id;

	}	
	
			function contarProductosxPagosFinlaziadosCantidad($producto_id)
	
	{
		return "select sum(pago_proveedores.cantidad_producto) as cuenta2 from productos, proveedores, pago_proveedores, pagos where productos.producto_id = pago_proveedores.producto_id and pago_proveedores.pagos_id = pagos.pagos_id and productos.proveedor_id = proveedores.proveedor_id and productos.producto_id =".$producto_id;

	}	
	
				function contarProductosxPagosFinlaziadosTotal($producto_id)
	
	{
		return "select sum(pago_proveedores.total_producto) as cuenta3 from productos, proveedores, pago_proveedores, pagos where productos.producto_id = pago_proveedores.producto_id and pago_proveedores.pagos_id = pagos.pagos_id and productos.proveedor_id = proveedores.proveedor_id and productos.producto_id =".$producto_id;

	}
	
			function listarProductosxPagos2($producto_id)
	
	{
		return "select * from productos, proveedores, pago_proveedores where productos.producto_id = pago_proveedores.producto_id and productos.proveedor_id = proveedores.proveedor_id and pago_proveedores.estado = '0' and productos.producto_id =".$producto_id;

	}	
	
				function contarProductosxPagos2($producto_id)
	
	{
		return "select count(*) as number from productos, proveedores, pago_proveedores where productos.producto_id = pago_proveedores.producto_id and productos.proveedor_id = proveedores.proveedor_id and pago_proveedores.estado = '0' and productos.producto_id =".$producto_id;

	}	
	
	
					function sumarProductosxPagos2($producto_id)
	
	{
		return "select sum(pago_proveedores.cantidad_producto) as number2 from productos, proveedores, pago_proveedores where productos.producto_id = pago_proveedores.producto_id and productos.proveedor_id = proveedores.proveedor_id and pago_proveedores.estado = '0' and productos.producto_id =".$producto_id;

	}
	
						function sumarProductosxPagos3($producto_id)
	
	{
		return "select sum(pago_proveedores.total_producto) as number3 from productos, proveedores, pago_proveedores where productos.producto_id = pago_proveedores.producto_id and productos.proveedor_id = proveedores.proveedor_id and pago_proveedores.estado = '0' and productos.producto_id =".$producto_id;

	}
	
	
}

?>