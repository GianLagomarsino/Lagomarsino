<?PHP 
$ruta = "../../";
$ruta_archivos= "../";

//	include ('../master_pages/header.php');
	include ('../../includes/default.php');
	include ('../../modelos/producto.php');
	$producto = new producto();

	    $producto->setProducto_id              ($_POST['producto_id']);
        $producto->setNombre_producto              ($_POST['nombre_producto']);
        $producto->setDescripcion			($_POST['descripcion']);
		$producto->setMarca			($_POST['marca']);
		$producto->setFecha_ingreso			($_POST['fecha_ingreso']);
		$producto->setPrecio			($_POST['precio']);
		$producto->setCantidad		($_POST['cantidad']);
		//$producto->setServicios_as_tareas_id        	($_POST['servicios_as_tareas_id']);
        
        
		$result = $base_datos->sql_query($producto->updateProductos());
		$result2 = $base_datos->sql_query($producto->updateProductosCantidad2());
									echo "<script language='JavaScript'>";
									echo "alert('Producto Agregado Al Servicio');";
									echo "location = 'listar_productos.php'";
									echo "</script>";
									
?>
