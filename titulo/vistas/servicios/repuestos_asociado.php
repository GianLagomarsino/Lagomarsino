<?PHP 
$ruta = "../../";
$ruta_archivos= "../";
//include ("../master_pages/header.php");
include ("../../includes/default.php");
include('../../modelos/servicio.php');
include ('../../modelos/trabajador.php');
include ('../../modelos/sucursal.php');
include ('../../modelos/cliente.php');
include ('../../modelos/producto.php');

    $servicio = new servicio();
	$producto = new producto();
	$servicio->setServicio_id 	($_POST['servicio_id']);
	$producto->setProducto_id	($_POST['producto_id']);
	$producto->setServicio_id 	($_POST['servicio_id']);
	$producto->setCantidad_servicio		($_POST['cantidad_servicio']);

   //echo $producto($producto_id);



if($busqueda= $base_datos->sql_query($producto->validarProducto())){
	
		if(mysql_num_rows($busqueda)==0) {
			if(!$base_datos->sql_query($producto->insertServicios_as_productos())){
				
				echo "Ingreso Erroneo, Intentelo nuevamente";
				              //POST);
                  //echo $producto->validarProducto();
			}
			else{
	 $servicios_as_productos_id = mysql_insert_id();
	 $result = $base_datos->sql_query($producto->updateProductosXservicios($servicios_as_productos_id));
	 $result2 = $base_datos->sql_query($producto->updateProductosXservicios3($servicios_as_productos_id)); 
	 $result3 = $base_datos->sql_query($producto->updateProductosXservicios4($servicios_as_productos_id));
		
		echo "<script language='JavaScript'>";
		echo "alert('servicio asociado correctamente');";
		echo "location = 'listar_servicios.php'";
		echo "</script>";
				
				}
		}

	
	}			

	
?>
</form>