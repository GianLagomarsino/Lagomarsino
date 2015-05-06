<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
//include ("../master_pages/header.php");
include ("../../includes/default.php");
include('../../modelos/producto.php');
include ('../../modelos/pago.php');
	
	
	$pago = new pago();
	$pago->setPagos_id	($_GET['pagos_id']);
	//$pago->setMonto_pago	         ($_POST['monto_pago']);
	//$pago->setPagado		         ($_GET['pagado']);
	

 
 $result = $base_datos->sql_query($pago->updatePagosxPagado()); 

                           
									echo "<script language='JavaScript'>";
									echo "alert('Producto Pagado');";
									echo "location = '../pagos/listar_pagos.php'";
									echo "</script>";

	 
	 
	 
	 
	 

?>
</form>