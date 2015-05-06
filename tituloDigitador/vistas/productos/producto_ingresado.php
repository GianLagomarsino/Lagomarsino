<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
//include ("../master_pages/header.php");
include ("../../includes/default.php");
include('../../modelos/producto.php');
include('../../modelos/proveedor.php');

     
    
   
        
        $producto = new producto();	
		$proveedor = new proveedor();
//	aca se cambian el valor de las variables globales de la clase servicio a travez del bjeto (tarea_nueva)
	//echo $_POST['nombre_tarea'];
	
    $producto->setProveedor_id			($_POST['proveedor_id']);
    
	$producto->setNombre_producto		($_POST['nombre_producto']);
	$producto->setDescripcion		($_POST['descripcion']);
	$producto->setMarca			($_POST['marca']);
	$producto->setFecha_ingreso          ($_POST['fecha_ingreso']);
	$producto->setFecha_termino		($_POST['fecha_termino']);
	$producto->setPrecio_unitario                   ($_POST['precio_unitario']); 
	$producto->setPrecio                   ($_POST['precio']); 
	$producto->setCantidad                   ($_POST['cantidad']); 
	$producto->setDescuento                   ($_POST['descuento']); 
	$producto->setValor_total                   ($_POST['valor_total']); 	
	
	//ultimo agregado
        
       
	
	
	
// llama a la funcion insertar y la ejecuta con los valores enviados anteriormente
        
  	 $result = $base_datos->sql_query($producto->insert());   
	 $producto_id = mysql_insert_id();
	 $result2 = $base_datos->sql_query($producto->updateCantidad($producto_id));  
     $result3 = $base_datos->sql_query($producto->insertProductos2($producto_id));
	 $pago_proveedores_id = mysql_insert_id();
	 $result4 = $base_datos->sql_query($producto->updateCantidadPagoProveedor($pago_proveedores_id));
	 
	 
	 
	    
		
									echo "<script language='JavaScript'>";
									echo "alert('Producto Ingresado Correctamente');";
									echo "location = 'listar_productos.php'";
									echo "</script>";


?>