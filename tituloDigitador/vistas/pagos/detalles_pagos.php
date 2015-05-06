<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<?PHP 
$ruta = "../../";
$ruta_archivos= "../";

	include ('../master_pages/headernuevo.php');
	include ('../../includes/default.php');
	include ('../../modelos/proveedor.php');
	include ('../../modelos/pago.php');
	include ('../../modelos/producto.php');
	
	$proveedor = new proveedor();
    $pago = new pago();
	$producto	= new producto();


	  ?>
	         
	  <head>
     <link href="<?php echo $ruta; ?>bootstrap/css/tables.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $ruta; ?>bootstrap/css/datepicker.css" rel="stylesheet">
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>

	        <script language="javascript">
$(document).ready(function() {
	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
		$("#datos_a_enviar2").val( $("<div>").append( $("#Exportar_a_Excel2").eq(0).clone()).html());
		$("#FormularioExportacion").submit();
});
});


</script>
<style type="text/css">
.botonExcel{cursor:pointer;}
</style>
	  </head>




<body background="./../../../img/backgrounds/aqua.jpg">   			
<form class="form-horizontal well" method="post" id="FormularioExportacion"  style="border-right-width: 100px; margin-left: 0px; margin-top: 0px; border-left-width: 100px; border-top-width: 110px; height: 100%;" target="_blank" action="../../functions/reportePagos.php">
          <h2 style="color:white;">Producto</h2>
	  

       
	   </thead>
	   
 <?php  
             
			 $pago = new pago();
			 $pagos_id = $_GET['pagos_id'];
			 
			
		
		
			
            $result=mysql_query($pago->listarPagosDetalle($pagos_id));
            //$result2=mysql_query($trabajador->listarProductosxProveedor($proveedor_id));

                            
                    if($row = mysql_fetch_array($result))
                    {
                        $producto_id = $row['producto_id'];
						$nombre_producto			= $row['nombre_producto'];
						$nombre_proveedor			= $row['nombre_proveedor'];
						$descripcion 			= $row['descripcion'];
						$marca 	= $row['marca'];
						$fecha_ingreso					= $row['fecha_ingreso'];						
						$precio_unitario				= $row['precio_unitario'];
						$precio				= $row ['precio'];
						$cantidad_producto 				= $row['cantidad_producto'];
						$total_producto 		        	= $row['total_producto'];
						$proveedor_id 	= $row['proveedor_id'];

						
						

										echo "<table id='Exportar_a_Excel' border='1' style='max-width:40%;'>";			
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Nombre Producto</span></TD>";
							echo "<td>".$nombre_producto."</td>";
							echo "</tr>";
							

							
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Descripcion</span></TD>";
							echo "<td>".$descripcion."</td>";
							echo "</tr>";
							
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Marca</span></TD>";
							
							echo "<td>".$marca."</td>";	
							 							echo "</tr>";
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Fecha Ingreso</span></TD>";
							
							  										echo "<td>";
							echo $fecha_ingreso = date('d/m/Y', strtotime($fecha_ingreso));
							echo "</td>";
							  							echo "</tr>";
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Precio Unitario</span></TD>";
						
							
							 	echo "<td>";
								echo"$"; echo  sprintf( number_format($precio_unitario, 0, '.', '.'));
 								echo "</td>";
 								
							 							
							 	
 														echo "</tr>";
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Cantidad</span></TD>";
							
							 echo "<td>".$cantidad_producto."</td>";
							echo "</tr>";
							

											echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Total</span></TD>";
						
							
							 	echo "<td>";
								echo"$"; echo  sprintf( number_format($total_producto, 0, '.', '.'));
 								echo "</td>";										 							echo "</tr>";
	
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Exportar</span></TD>";
							 echo "<td><img src='../../images/excel.jpg' class='botonExcel' ?/></td>";
							echo "</tr>";
						   echo "</table>";
						   
						}
						
			
						
?>
<table id="Exportar_a_Excel2" border='1'>
        <thead>
        <h2 style="color:white">Detalle Pago</h2>
		<tr class ='light'>
        <th>Nombre producto</th>		
		<th>Proveedor</th>
        <th>Cantidad producto</th>		
		<th>Valor por unidad</th>	
        <th>Valor Unitario</th>
        <th>Total a pagar</th>		
		
       	<th>Pagado</th>
		<th>Forma pago</th>
       	<th>Fecha creacion</th>
        <th>Fecha pago</th>

        
		     </tr>
						</thead>
                    <tbody>
  <?php 
					   
					 $result = $base_datos->sql_query($pago->listarPagosDetalle2($pagos_id));
						 if($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					 // $servicio_id 			= $row['servicio_id'];
					  $producto_id 			= $row['producto_id'];
					  $nombre_producto 			= $row['nombre_producto'];
					  $cantidad_producto 			= $row['cantidad_producto'];
					  $precio_unitario 			= $row['precio_unitario'];
					  $nombre_proveedor 			= $row['nombre_proveedor'];
					  
					  $pagos_id                = $row['pagos_id'];
					  $monto_pago			             = $row['monto_pago'];
					  $pagado 		             = $row['pagado'];
					  $fecha_pago             = $row['forma_pago'];
					   $forma_pago                = $row['forma_pago'];
					  $fecha_pago             = $row['fecha_pago'];
					  
					 
					  $fecha_creacion                = $row['fecha_creacion'];
					  //$fecha_modificacion			             = $row['fecha_modificacion'];
					  //$cantidad_abono 		             = $row['cantidad_abono'];
					  $estado             = $row['estado'];





					 
	         echo "<tr class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
	        echo "<th><a href='../productos/detalles_producto.php?producto_id=".$producto_id."'>".$nombre_producto."</a></th>";
			echo "<td><a href='../proveedores/detalles_proveedores.php?proveedor_id=".$proveedor_id."'>".$nombre_proveedor."</a></td>";
			echo "<td>".$nombre_proveedor."</td>";	  		    
			echo "<td>".$cantidad_producto."</td>";	  		    
			echo "<td>";  
			 echo "$"; echo  sprintf( number_format($precio_unitario, 0, '.', '.')); 
			echo "</td>";		    
			echo "<td>";  
			 echo "$"; echo  sprintf( number_format($monto_pago, 0, '.', '.')); 
			echo "</td>";	  		    
			//echo "<td>".$valor_servicio."</td>";	  		    
			echo "<td>".$pagado."</td>";
			echo "<td>".$forma_pago."</td>";	  		    
  		    
				    echo "<td>";
			echo $fecha_creacion = date('d/m/Y', strtotime($fecha_creacion));
			echo "</td>";	
			echo "<td>";
			echo $fecha_pago = date('d/m/Y', strtotime($fecha_pago));
			echo "</td>";	
  	
  		   
			 //echo "<td>".$telefono."</td>";	
  		 	 //echo "<td>".$celular."</td>";
		     //echo "<td>".$sueldo."</td>";	
  		 	 
			//echo"<th><a href='repuestos_servicio.php?servicio_id=".$servicio_id."'><img src='../../images/agregar.png'></th>";
		    //echo "<th><a href='modificar_servicio.php?servicio_id=".$servicio_id."'><img src='../../images/pagar.png'></th>";
			//echo "<th><a href='modificar_servicio.php?servicio_id=".$servicio_id."'><img src='../../images/edit.png'></th>"; 
			//echo "<th><a href='eliminar_servicio.php?servicio_id=".$servicio_id."'onclick='return confirmar()'><img src='../../images/delete.png'></a></th>"; 
					}
	 ?>
       </table> 
	<input type='hidden' id='datos_a_enviar' name='datos_a_enviar' />
	<input type='hidden' id='datos_a_enviar2' name='datos_a_enviar2' />
  
</form>


<!-- starts footer -->
       <footer id="footer" style="margin-top:0;">
        <div class="container">
            <div class="row info">
                <div class="col-sm-6 residence">
                    <ul>
                        <li><strong>Sucursal Valparaiso </strong></li>
                        <li><strong>Direccion : </strong>Gran Bretaña 281</li>
                        <li><strong>Ciudad : </strong> Valparaiso, Chile</li>
                    </ul>
                </div>
                <div class="col-sm-5 touch">
                    <ul>
                        <li><strong>Telefono 1 : </strong> (32)2283165</li>
                        <li><strong>Telefono 2 : </strong> (32)2346019</li>
                        <li><strong>Email : </strong><a href="#"> rlagomarsino@yahoo.com</a></li>
                    </ul>
                </div>
            </div>
           
            <div class="row info">
                <div class="col-sm-6 residence">
                    <ul>
                        <li><strong>Sucursal San Felipe</strong></li>
                        <li><strong>Direccion : </strong>La Torre 590</li>
                        <li><strong>Ciudad : </strong> San Felipe, Chile</li>
                    </ul>
                </div>
                <div class="col-sm-5 touch">
                    <ul>
                        <li><strong>Telefono : </strong> (34)2581117</li>
                        <li><strong>Email : </strong><a href="#"> rlagomarsino@yahoo.com</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="row credits">
               
                    <div class="row copyright">
                        <div class="col-md-12">
                            © 2014 Gianfranco Lagomarsino. All rights reserved. Theme by Detail Canvas.
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </footer>	
</html>