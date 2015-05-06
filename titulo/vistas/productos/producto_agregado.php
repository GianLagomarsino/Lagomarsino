<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
	include ('../../includes/default.php');
	include ('../../modelos/producto.php');
	$producto = new producto();
    	$producto->setProducto_id              ($_POST['producto_id']);
		$producto->setCantidad		($_POST['cantidad']);
	    //$cantidad= $

 	 $result = $base_datos->sql_query($producto->updateProductosCantidad());
	 $result2 = $base_datos->sql_query($producto->updateProductosCantidad2());
	 $result3 = $base_datos->sql_query($producto->insertProductos());
	 $pago_proveedores_id = mysql_insert_id();
	 $result4 = $base_datos->sql_query($producto->updateCantidadPagoProveedor($pago_proveedores_id));
	 	//echo print_r($producto);
									echo "<script language='JavaScript'>";
									echo "alert('Producto Actualizado Correctamente');";
									echo "location = 'listar_productos.php'";
									echo "</script>";

	 
 
?>
</form>