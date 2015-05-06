<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
	include ('../../includes/default.php');
	include ('../../modelos/producto.php');
	include ('../../modelos/servicio.php');
	
	
	$producto = new producto();
    $producto->setServicios_as_productos_id			($_POST['servicios_as_productos_id']);
	$producto->setProducto_id           ($_POST['producto_id']);
	$producto->setServicio_id           ($_POST['servicio_id']);
	$producto->setCantidad_servicio		($_POST['cantidad_servicio']);
	    

 	 $result = $base_datos->sql_query($producto->updateProductosCantidad4());
 	 $result2 = $base_datos->sql_query($producto->updateProductosXservicios5());	
	 $result3 = $base_datos->sql_query($producto->updateProductosXservicios6());	
	 $result4 = $base_datos->sql_query($producto->updateProductosCantidad2());	 		
	 //$result = $base_datos->sql_query($producto->updateProductosCantidad3());
	 //echo print_r($producto);
									echo "<script language='JavaScript'>";
									echo "alert('Producto Actualizado Correctamente');";
									echo "location = 'listar_servicios.php'";
									echo "</script>";

	 
 
?>
</form>