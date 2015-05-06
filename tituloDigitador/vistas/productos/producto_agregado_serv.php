<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
	include ('../../includes/default.php');
	include ('../../modelos/producto.php');
	$producto = new producto();
    
	
	$producto->setServicios_as_productos_id              ($_POST['servicios_as_productos_id']);
	$producto->setProducto_id   ($_POST['producto_id']);
	$producto->setServicio_id	($_POST['servicio_id']);
	$producto->setCantidad		($_POST['cantidad']);
	$producto->setCantidad_servicio ($_POST['cantidad_servicio']);
	    //$cantidad= $

 	 $result  = $base_datos->sql_query($producto->updateProductosCantidadServicio());
	 $result2 = $base_datos->sql_query($producto->updateProductosCantidadServicio2());
	 $result3 = $base_datos->sql_query($producto->updateProductosCantidad2());
	 $result4 = $base_datos->sql_query($producto->updateProductosCantidad5());
	 	//echo print_r($producto);
		
		
		//echo $producto->updateProductosCantidadServicio();
		//echo $producto->updateProductosCantidadServicio2();
		//echo $producto->updateProductosCantidad2();
		//echo $producto->updateProductosCantidad5();
		
									echo "<script language='JavaScript'>";
									echo "alert('Producto Actualizado Correctamente');";
									echo ' location ="../servicios/listar_servicios.php"';
									echo "</script>";

	 
 
?>
</form>