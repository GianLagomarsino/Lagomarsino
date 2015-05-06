<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
//include ("../master_pages/header.php");
include ("../../includes/default.php");
include('../../modelos/servicio.php');
include ('../../modelos/proveedor.php');
include ('../../modelos/producto.php');
include ('../../modelos/pago.php');

    $producto = new producto();
	$pago = new pago();
	$proveedor = new proveedor();
	
	$producto->setProducto_id 			    ($_POST['producto_id']);
	$producto->setPago_proveedores_id ($_POST['pago_proveedores_id']);
	$pago->setMonto_pago	         ($_POST['monto_pago']);
	$pago->setPagado		         ($_POST['pagado']);
	$pago->setFecha_pago		     ($_POST['fecha_pago']);
	$pago->setForma_pago		     ($_POST['forma_pago']);
	$pago->setFecha_creacion		 ($_POST['fecha_creacion']);
	$pago->setFecha_modificacion	 ($_POST['fecha_modificacion']);
	$pago->setDeuda				     ($_POST['deuda']);
	$pago->setEstado		         ($_POST['estado']);
  
 if(!$base_datos->sql_query($pago->insertPagos()))
	{
	echo "ERROR, Los Registros no Se Modificaron Con Exito";

	  
	  								echo "<script language='JavaScript'>";
									echo "alert('ERROR, Los Registros no Se Modificaron Con Exito');";
									echo "window.history.back()";
									echo "</script>";

	 

	}
 	
	 $pagos_id = mysql_insert_id();
	// echo $producto->producto_id; 
	 //echo $producto->pago_proveedores_id; 
	 
	 $result = $base_datos->sql_query($pago->updatePagosxProductos($pagos_id, $producto->producto_id));
	 $result3 = $base_datos->sql_query($pago->updatePagosxProductos2($pagos_id, $producto->pago_proveedores_id));
	 $result2 = $base_datos->sql_query($pago->updateProveedoresxEstado($producto->pago_proveedores_id)); 
	 
	  
	  									echo "<script language='JavaScript'>";
									
									
									echo "alert('Producto Pagado');";
									echo "location = '../productos/listar_productos.php'";
									echo "</script>";

?>
</form>