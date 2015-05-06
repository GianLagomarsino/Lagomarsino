<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
//include ("../master_pages/header.php");
include ("../../includes/default.php");
include('../../modelos/servicio.php');
include ('../../modelos/trabajador.php');
include ('../../modelos/sucursal.php');
include ('../../modelos/cliente.php');
include ('../../modelos/venta.php');

    $servicio = new servicio();
	$venta = new venta();
	$servicio->setServicio_id 		 ($_POST['servicio_id']);
	$venta->setMonto_pago	         ($_POST['monto_pago']);
	$venta->setPagado		         ($_POST['pagado']);
	$venta->setFecha_pago		     ($_POST['fecha_pago']);
	$venta->setForma_pago		     ($_POST['forma_pago']);
	$venta->setTitular_cheque		 ($_POST['titular_cheque']);
	$venta->setSerie_cheque			 ($_POST['serie_cheque']);
	$venta->setNombre_banco	         ($_POST['nombre_banco']);
	$venta->setFecha_creacion		 ($_POST['fecha_creacion']);
	$venta->setFecha_modificacion	 ($_POST['fecha_modificacion']);
	$venta->setCantidad_abono		 ($_POST['cantidad_abono']);
	$venta->setCuota		         ($_POST['cuota']);
	$venta->setEstado		         ($_POST['estado']);
  

 if(!$base_datos->sql_query($venta->insertVentas()))
	{
		echo "alert('Error En La Venta');";
		echo "location = '../ventas/listar_ventas.php'";

	 

	}
 	
	 $ventas_id = mysql_insert_id();
	 echo $servicio->servicio_id; 
	//echo $servicio_id;
	
	 //echo $venta_id;echo "$servicio_id";
	 $result = $base_datos->sql_query($venta->updateVentasxServicios($ventas_id, $servicio->servicio_id));
	 $result2 = $base_datos->sql_query($venta->terminarServicio($servicio->servicio_id));
	 $result3 = $base_datos->sql_query($venta->calcularCuotas($ventas_id));
	 
									
									echo "<script language='JavaScript'>";
									echo "alert('Venta Ingresada');";
									echo "location = '../ventas/listar_ventas.php'";
									echo "</script>";
?>
</form>