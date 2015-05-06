<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
include ('../master_pages/header.php');
include ('../../includes/default.php');
include('../../modelos/venta.php');
include ('../../modelos/trabajador.php');
include ('../../modelos/sucursal.php');
include ('../../modelos/cliente.php');
include ('../../modelos/producto.php');

    $venta = new venta();
	
	
	$producto = new producto();
	$producto->setProducto_id	($_POST['producto_id']);
	//	$producto->setVentas_id 	($_POST['ventas_id']);
	$producto->setCantidad_servicio		($_POST['cantidad_servicio']);
    
    $venta = new venta();
	//$venta->setMonto_pago	         ($_POST['monto_pago']);
	$venta->setPagado		         ($_POST['pagado']);
	$venta->setFecha_pago		     ($_POST['fecha_pago']);
	$venta->setForma_pago		     ($_POST['forma_pago']);
	$venta->setSerie_cheque			 ($_POST['serie_cheque']);
	$venta->setNombre_banco	         ($_POST['nombre_banco']);
	$venta->setFecha_creacion		 ($_POST['fecha_creacion']);
	$venta->setFecha_modificacion	 ($_POST['fecha_modificacion']);
	$venta->setCantidad_abono		 ($_POST['cantidad_abono']);
	$venta->setEstado		         ($_POST['estado']);
  

	 $result1 = $base_datos->sql_query($producto->insertServicios_as_productos());

	 $servicios_as_productos_id = mysql_insert_id();
	 $servicios_as_productos_id2 = mysql_insert_id();
	
	 //echo $servicios_as_productos_id; 
	 //$producto->setServicios_as_productos_id	($_POST['servicios_as_productos_id']);
	 $result2 = $base_datos->sql_query($producto->updateProductosXservicios3($servicios_as_productos_id));
	 $result3 = $base_datos->sql_query($producto->updateProductosXservicios($servicios_as_productos_id));
	 $result4 = $base_datos->sql_query($producto->updateProductosXservicios4($servicios_as_productos_id));


     $result5 = $base_datos->sql_query($venta->insertVentas()); 
     //$result6 = $base_datos->sql_query($producto->calcularMontoPago($servicios_as_productos_id));
	 $ventas_id = mysql_insert_id();
	 
 	 
	 $result7 = $base_datos->sql_query($venta->updateVentasxProductos($ventas_id,  $servicios_as_productos_id2));
	 $result8 = $base_datos->sql_query($producto->calcularMontoPago($servicios_as_productos_id));
	 
									echo "<script language='JavaScript'>";
									echo "alert('Producto Vendido');";
									echo "location = '../productos/listar_productos.php'";
									echo "</script>";
	

?>
