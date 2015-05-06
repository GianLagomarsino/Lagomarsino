<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
//include ("../master_pages/header.php");
include ("../../includes/default.php");
include('../../modelos/producto.php');
include ('../../modelos/trabajador.php');
include ('../../modelos/sucursal.php');
include ('../../modelos/cliente.php');
include ('../../modelos/venta.php');
	
	
	$producto = new producto();
	$producto->setProducto_id	($_POST['producto_id']);
	$producto->setServicios_as_productos_id	($_POST['servicios_as_productos_id']);
	
	//$producto->setVentas_id 	($_POST['ventas_id']);
	//$producto->setCantidad_servicio		($_POST['cantidad_servicio']);
    $venta = new venta();
	$venta->setMonto_pago	         ($_POST['monto_pago']);
	$venta->setPagado		         ($_POST['pagado']);
	$venta->setFecha_pago		     ($_POST['fecha_pago']);
	$venta->setForma_pago		     ($_POST['forma_pago']);
	$venta->setSerie_cheque			 ($_POST['serie_cheque']);
	$venta->setNombre_banco	         ($_POST['nombre_banco']);
	$venta->setFecha_creacion		 ($_POST['fecha_creacion']);
	$venta->setFecha_modificacion	 ($_POST['fecha_modificacion']);
	$venta->setCantidad_abono		 ($_POST['cantidad_abono']);
	$venta->setEstado		         ($_POST['estado']);


 
 $result = $base_datos->sql_query($venta->insertVentas()); 

 	
	 $ventas_id = mysql_insert_id();
	 //echo $ventas_id;
	 echo $producto->servicios_as_productos_id; 
	 //$result = $base_datos->sql_query($venta->updateVentasxProductos($ventas_id, $producto->servicios_as_productos_id));
	  if(!$base_datos->sql_query($venta->updateVentasxProductos($ventas_id, $producto->servicios_as_productos_id)))
	{
        
		
		
					 echo $venta->updateVentasxServicios($ventas_id, $producto->servicios_as_productos_id);
			
					echo "ERROR, Los Registros no Se Modificaron Con Exito2";
							//echo print_r($venta);
		//echo $venta->updateVentasxProductos();
					
									
                  
    }
	  else
      {
                           
									echo "<script language='JavaScript'>";
									//echo "alert('Producto Agregado Al Servicio');";
									echo "location = '../productos/listar_productos.php'";
									echo "</script>";

	
	}
	 
	 
	 
	 
	 

?>
</form>