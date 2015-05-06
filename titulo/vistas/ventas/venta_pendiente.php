<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
//include ("../master_pages/header.php");
include ("../../includes/default.php");
include('../../modelos/producto.php');
include ('../../modelos/venta.php');
	
	
	$venta = new venta();
	//$venta->setVentas_id	($_GET['ventas_id']);
	$ventas_id = $_GET['ventas_id'];
	//$pago->setMonto_pago	         ($_POST['monto_pago']);
	//$pago->setPagado		         ($_GET['pagado']);
	

 
 $result = $base_datos->sql_query($venta->updateVentaxPendiente($ventas_id)); 

                           
									echo "<script language='JavaScript'>";
									echo "alert('Venta Pendiente');";
									echo "location = '../ventas/listar_ventas.php'";
									echo "</script>";

	 
	 
	 
	 
	 

?>
</form>