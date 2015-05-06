<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<?PHP 
$ruta = "../../";
$ruta_archivos= "../";

	include ('../master_pages/headernuevo.php');
	include ('../../includes/default.php');
	include ('../../modelos/proveedor.php');
//	include ('../../modelos/juridico.php');
	include ('../../modelos/producto.php');
	
	$proveedor = new proveedor();
   // $juridico = new juridico();
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
		$("#datos_a_enviar3").val( $("<div>").append( $("#Exportar_a_Excel3").eq(0).clone()).html());
		$("#datos_a_enviar4").val( $("<div>").append( $("#Exportar_a_Excel4").eq(0).clone()).html());
		$("#datos_a_enviar5").val( $("<div>").append( $("#Exportar_a_Excel5").eq(0).clone()).html());
		$("#datos_a_enviar6").val( $("<div>").append( $("#Exportar_a_Excel6").eq(0).clone()).html());
		$("#datos_a_enviar7").val( $("<div>").append( $("#Exportar_a_Excel7").eq(0).clone()).html());
		$("#FormularioExportacion").submit();
});
});


</script>
<style type="text/css">
.botonExcel{cursor:pointer;}
</style>
	  </head>




<body background="./../../../img/backgrounds/aqua.jpg">   			
<form class="form-horizontal well" method="post" id="FormularioExportacion"  style="border-right-width: 100px; margin-left: 0px; margin-top: 0px; border-left-width: 100px; border-top-width: 110px; height: 100%;" target="_blank" action="../../functions/reporteProducto.php">
          <h2 style="color:white;">Detalles Producto</h2>
	  

       
	   </thead>
	   
 <?php  
             
			 $producto = new producto();
			 $producto_id = $_GET['producto_id'];
			 
			
		
		
			
            $result=mysql_query($producto->listarProductosDetalles($producto_id));
            //$result2=mysql_query($trabajador->listarProductosxProveedor($proveedor_id));

                            
                    if($row = mysql_fetch_array($result))
                    {
                        $producto_id = $row['producto_id'];
						$nombre_producto			= $row['nombre_producto'];
						$descripcion 			= $row['descripcion'];
						$marca 	= $row['marca'];
						$fecha_ingreso					= $row['fecha_ingreso'];						
						$precio_unitario				= $row['precio_unitario'];
						$precio				= $row ['precio'];
						$cantidad 				= $row['cantidad'];
						$valor_total 		        	= $row['valor_total'];
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
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Precio</span></TD>";
							
							
							 	echo "<td>";
								echo"$"; echo  sprintf( number_format($precio, 0, '.', '.'));
 								echo "</td>";
							echo "</tr>";

							 	
 														echo "</tr>";
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Cantidad</span></TD>";
							
							 echo "<td>".$cantidad."</td>";
							echo "</tr>";
							
														 							echo "</tr>";
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Valor Total</span></TD>";
							
							
							 	echo "<td>";
								echo"$"; echo  sprintf( number_format($valor_total, 0, '.', '.'));
 								echo "</td>";
 								
							echo "</tr>";
							
														 							echo "</tr>";
	
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Exportar</span></TD>";
							 echo "<td><img src='../../images/excel.jpg' class='botonExcel' ?/></td>";
							echo "</tr>";
						   echo "</table>";
						   
						}
						
			
						
?>

<table id="Exportar_a_Excel2"  width="100%" border="1" cellpadding="0" cellspacing="0">
        <thead>
		 <h2 style="color:white;">Proveedor</h2>
		<tr class ='light'>
        <th>Rut Proveedor</th>
        <th>Nombre Proveedor</th>		
		<th>Direccion</th>
	    <th>Email</th>
				
        <th>Telefono</th>
		<th>Celular</th>
  
		     </tr>
						</thead>
                    
					 
					<?php  
             
			 $producto = new producto();
			 $producto_id = $_GET['producto_id'];
			 
			
		
		
			//trabajador asociado al Servicio
            $result3=mysql_query($producto->listarProductosDetallesProveedores($producto_id));
            while($row = mysql_fetch_array($result3))
                    {
			  $producto_id = $row['producto_id'];
					  $proveedor_id = $row['proveedor_id'];
					  $nombre_proveedor		             = $row['nombre_proveedor'];
					  $direccion_proveedor		             = $row['direccion_proveedor'];
					  //$servicio_id				 = $row['servicio_id'];
					  $email_proveedor           = $row['email_proveedor'];
					  $rut_proveedor			     = $row['rut_proveedor'];
					  $telefono_proveedor		             = $row['telefono_proveedor'];
					  $celular_proveedor           = $row['celular_proveedor'];
			

//echo "$r[0]";
//$total_productos  = $row ['total_productos'];
		
							  
						    
			 echo "<tr class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
			echo "<th><a href='../proveedores/detalles_proveedores.php?proveedor_id=".$proveedor_id."'>".$rut_proveedor."</a></th>";	  
			echo "<td>".$nombre_proveedor."</td>";	  		    
			echo "<td>".$direccion_proveedor."</td>";
			echo "<td>".$email_proveedor."</td>";
			echo "<td>".$telefono_proveedor."</td>";	 	  		    
			echo "<td>".$celular_proveedor."</td>";							

		    echo "</tr></table>";
							}
						   
				
?>
 
	
 <table  id="Exportar_a_Excel3"  width="100%" border="1" cellpadding="0" cellspacing="0">
       <h2 style="color:white;">Actualmente usado en el o los siguientes servicios</h2>
        <thead>
							<th>Nombre Servicio</th>
							<th>Descripcion</th>
							<th>Inicio</th>
							<th>Trabajador</th>
							<th>Sucursal</th>
                            
 
	  </thead>
                    
					 
					<?php  
             
			 $producto = new producto();
			 $producto_id = $_GET['producto_id'];
			 
			
		
		
			//trabajador asociado al Servicio
            $result3=mysql_query($producto->listarProductosxServicios2($producto_id));
            while($row = mysql_fetch_array($result3))
                    {
			 		  $producto_id = $row['producto_id'];
					  $servicio_id		             = $row['servicio_id'];
					  $sucursal_id		             = $row['sucursal_id'];
					  $trabajador_id		             = $row['trabajador_id'];
					   
					  $nombre_servicio		             = $row['nombre_servicio'];
					  $descripcion				 = $row['descripcion'];
					  $fecha_creacion           = $row['fecha_creacion'];
					  $nombre			     = $row['nombre'];
					  $estado_servicio = $row ['estado_servicio'];
					  $apellido_paterno = $row['apellido_paterno'];
					  $apellido_materno = $row['apellido_materno'];
					  $nombre_sucursal		             = $row['nombre_sucursal'];
					 
			

//echo "$r[0]";
//$total_productos  = $row ['total_productos'];
		
							  
						    
			 echo "<tr class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
			echo "<th><a href='../servicios/detalles_servicio.php?servicio_id=".$servicio_id."'>".$nombre_servicio."</a></th>";	  
			echo "<td>".$descripcion."</td>";
													echo "<td>";
							echo $fecha_creacion = date('d/m/Y', strtotime($fecha_creacion));
							echo "</td>";	  		    
			echo "<th><a href='../trabajadores/detalles_trabajadores.php?trabajador_id=".$trabajador_id."'>".$nombre." ".$apellido_paterno." ".$apellido_materno."</a></th>";	
			echo "<th><a href='../sucursales/detalles_sucursales.php?sucursal_id=".$sucursal_id."'>".$nombre_sucursal."</a></th>";	 
		    echo "</tr>";
							}
						   
				
?>		

 <?php 
		$producto_id = $_GET['producto_id'];			    
					 $result = $base_datos->sql_query($producto->contarProductosxServicios2($producto_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $cuentaProductosxServicios2 			= $row['cuentaProductosxServicios2'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='4'>Total Servicios Activos</td>";
								
 								echo "<td>".$cuentaProductosxServicios2."</td>";
 								
								echo "</tr>";            
	 ?> 
     
     
 
	
 <table  id="Exportar_a_Excel4"  width="100%" border="1" cellpadding="0" cellspacing="0">
        
        <h2 style="color:white;">Usado en el o los siguientes servicios finalizados</h2>
        <thead>
							<th>Nombre Servicio</th>
							<th>Descripcion</th>
							<th>Inicio</th>
                            <th>Termino</th>
							<th>Trabajador</th>
							<th>Sucursal</th>
                            
 
	  </thead>
                    
					 
					<?php  
             
			 $producto = new producto();
			 $producto_id = $_GET['producto_id'];
			 
			
		
		
			//trabajador asociado al Servicio
            $result4=mysql_query($producto->listarProductosxServicios3($producto_id));
            while($row = mysql_fetch_array($result4))
                    {
			 		  $producto_id = $row['producto_id'];
					  $servicio_id		             = $row['servicio_id'];
					  $sucursal_id		             = $row['sucursal_id'];
					  $trabajador_id		             = $row['trabajador_id'];
					   
					  $nombre_servicio		             = $row['nombre_servicio'];
					  $descripcion				 = $row['descripcion'];
					  $fecha_creacion           = $row['fecha_creacion'];
					  $fecha_termino 		= $row['fecha_termino'];
					  $nombre			     = $row['nombre'];
					  $estado_servicio = $row ['estado_servicio'];
					  $apellido_paterno = $row['apellido_paterno'];
					  $apellido_materno = $row['apellido_materno'];
					  $nombre_sucursal		             = $row['nombre_sucursal'];
					 
			

//echo "$r[0]";
//$total_productos  = $row ['total_productos'];
		
							  
						    
			 echo "<tr class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
			echo "<th><a href='../servicios/detalles_servicio.php?servicio_id=".$servicio_id."'>".$nombre_servicio."</a></th>";	  
			echo "<td>".$descripcion."</td>";

										echo "<td>";
							echo $fecha_creacion = date('d/m/Y', strtotime($fecha_creacion));
							echo "</td>";
										echo "<td>";
							echo $fecha_termino = date('d/m/Y', strtotime($fecha_termino));
							echo "</td>";	  		    
			echo "<th><a href='../trabajadores/detalles_trabajadores.php?trabajador_id=".$trabajador_id."'>".$nombre." ".$apellido_paterno." ".$apellido_materno."</a></th>";	
			echo "<th><a href='../sucursales/detalles_sucursales.php?sucursal_id=".$sucursal_id."'>".$nombre_sucursal."</a></th>";	 
		    echo "</tr>";
							}
						   
				
?>		

 <?php 
		$producto_id = $_GET['producto_id'];			    
					 $result = $base_datos->sql_query($producto->contarProductosxServicios3($producto_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $cuentaProductosxServicios3 			= $row['cuentaProductosxServicios3'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='5'>Total Servicios Activos</td>";
								
 								echo "<td>".$cuentaProductosxServicios3."</td>";
 								
								echo "</tr>";            
	 ?> 
     			 
           </table>
           
          <table  id="Exportar_a_Excel5"  width="100%" border="1" cellpadding="0" cellspacing="0">
        
        <h2 style="color:white;">Productos vendido</h2>
        <thead>
        <tr>
							<th>Producto</th>
							<th>Cantidad</th>
                            <th>Valor Compra</th>
                            <th>Valor Venta</th>
                            <th>Monto Pago</th>
							<th>Pagado</th>
                            <th>Forma Pago</th>
							<th>Fecha Pago</th>
							
                            
 
	  </thead>
                    
					 
					<?php  
             
			 $producto = new producto();
			 $producto_id = $_GET['producto_id'];
			 
			
		
		
			//trabajador asociado al Servicio
            $result5=mysql_query($producto->listarProductosxVentas1($producto_id));
            while($row = mysql_fetch_array($result5))
                    {
					
			 		  $ventas_id = $row['ventas_id'];
					  $nombre_producto = $row['nombre_producto'];
					  $cantidad_servicio		             = $row['cantidad_servicio'];
					  $precio_unitario				 = $row['precio_unitario'];
					  $precio           = $row['precio'];
					  $valor_servicio 		= $row['valor_servicio'];
					  $pagado			     = $row['pagado'];
					  $forma_pago = $row ['forma_pago'];
					  $fecha_pago	 = $row['fecha_pago'];
					  $estado = $row['estado'];
					  
					 					  
						    
			 echo "<tr class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
			echo "<th><a href='../ventas/detalles_ventas.php?ventas_id=".$ventas_id."'>".$nombre_producto."</a></th>";	  
			echo "<td>".$cantidad_servicio."</td>";
			
			
			echo "<td>";
			echo"$"; echo  sprintf( number_format($precio_unitario, 0, '.', '.'));
 			echo "</td>";
 								
			echo "<td>";
			echo"$"; echo  sprintf( number_format($precio, 0, '.', '.'));
 			echo "</td>";
 								
			echo "<td>";
			echo"$"; echo  sprintf( number_format($valor_servicio, 0, '.', '.'));
 			echo "</td>";
 								
		
			echo "<td>".$pagado."</td>";
			echo "<td>".$forma_pago."</td>";
			
			echo "<td>";
			echo $fecha_pago = date('d/m/Y', strtotime($fecha_pago));
			echo "</td>";
							
							}
						   
				
?>		

  <?php 
		$producto_id = $_GET['producto_id'];			    
					 $result = $base_datos->sql_query($producto->contarProductosxVentas1($producto_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $cuentaProductosxVentas1			= $row['cuentaProductosxVentas1'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='7'>El producto ha sido vendido </td>";
								
 								echo "<td>".$cuentaProductosxVentas1." Veces</td>";
 								
								echo "</tr>";            
	 ?> 
      <?php 
		$producto_id = $_GET['producto_id'];			    
					 $result = $base_datos->sql_query($producto->sumarCantidadProductosxVentas1($producto_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $cuenta2			= $row['cuenta2'];
					  
						 }
					
          
 						 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='7'>Se han vendido </td>";
								
 								echo "<td>".$cuenta2." Unidades del producto</td>";
 								
								echo "</tr>";           
	 ?> 
     
  
    <?php 
		$producto_id = $_GET['producto_id'];			    
					 $result = $base_datos->sql_query($producto->sumarProductosxVentas1($producto_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $cuenta			= $row['cuenta'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='7'>Venta Total Del Producto</td>";
								echo "<td>";
								echo"$"; echo  sprintf( number_format($cuenta, 0, '.', '.'));
 								echo "</td>";
 								
								echo "</tr>";            
	 ?> 
     
     
      
          </table>
           
          <table  id="Exportar_a_Excel6"  width="100%" border="1" cellpadding="0" cellspacing="0">
        
        <h2 style="color:white;">Productos por pagar al proveedor</h2>
        <thead>
        <tr>
							<th>Producto</th>
							<th>Cantidad</th>
                            <th>Valor Compra</th>
                            <th>Monto Pago</th>
							<th>Pagado</th>
                            <th>Forma Pago</th>
                            
                           
							
                            
 
	  </thead>
                    
					 
					<?php  
             
			 $producto = new producto();
			 $producto_id = $_GET['producto_id'];
			 
			
		
		
			//trabajador asociado al Servicio
            $result5=mysql_query($producto->listarProductosxPagos2($producto_id));
            while($row = mysql_fetch_array($result5))
                    {
					
			 		  
					  $nombre_producto = $row['nombre_producto'];
					  $cantidad_producto		             = $row['cantidad_producto'];
					  $precio_unitario				 = $row['precio_unitario'];
					  $precio           = $row['precio'];
					  $total_producto	 		= $row['total_producto'];
					
					 
					  $estado = $row['estado'];
					  
					 					  
						    
			 echo "<tr class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
			echo "<th><a href='../ventas/detalles_ventas.php?ventas_id=".$ventas_id."'>".$nombre_producto."</a></th>";	  
			echo "<td>".$cantidad_producto."</td>";
			
			
			echo "<td>";
			echo"$"; echo  sprintf( number_format($precio_unitario, 0, '.', '.'));
 			echo "</td>";
 								
 								
			echo "<td>";
			echo"$"; echo  sprintf( number_format($total_producto, 0, '.', '.'));
 			echo "</td>";
 								
		
			echo "<td>".$pagado."</td>";
			echo "<td>".$forma_pago."</td>";
			
	
							
							}
						   
				
?>		
       <?php 
		$producto_id = $_GET['producto_id'];			    
					 $result = $base_datos->sql_query($producto->contarProductosxPagos2($producto_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='5'>Cantidad total de pedidos inpagos</td>";
								echo "<td>".$number."</td>";
								echo "</tr>";            
	 ?> 
     
           <?php 
		$producto_id = $_GET['producto_id'];			    
					 $result = $base_datos->sql_query($producto->sumarProductosxPagos2($producto_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number2			= $row['number2'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='5'>Cantidad total de repuestos inpagos</td>";
								echo "<td>".$number2."</td>";
								echo "</tr>";            
	 ?> 
     
     
                <?php 
		$producto_id = $_GET['producto_id'];			    
					 $result = $base_datos->sql_query($producto->sumarProductosxPagos3($producto_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number3			= $row['number3'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='5'>Valor total de la deuda</td>";
										echo "<td>";
			echo"$"; echo  sprintf( number_format($number3, 0, '.', '.'));
 			echo "</td>";
								echo "</tr>";            
	 ?> 
           </table>
          </table>
           
          <table  id="Exportar_a_Excel7"  width="100%" border="1" cellpadding="0" cellspacing="0">
        
        <h2 style="color:white;">Productos pagados al proveedor</h2>
        <thead>
        <tr>
							<th>Producto</th>
							<th>Cantidad</th>
                            <th>Valor Compra</th>
                            <th>Monto Pago</th>
							<th>Pagado</th>
                            <th>Forma Pago</th>
                            <th>Fecha</th>
                           
							
                            
 
	  </thead>
                    
					 
					<?php  
             
			 $producto = new producto();
			 $producto_id = $_GET['producto_id'];
			 
			
		
		
			//trabajador asociado al Servicio
            $result5=mysql_query($producto->listarProductosxPagos1($producto_id));
            while($row = mysql_fetch_array($result5))
                    {
					  $pago_proveedores_id =  $row['pago_proveedores_id'];
			 		  $pagos_id =  $row['pagos_id'];
					  $nombre_producto = $row['nombre_producto'];
					  $cantidad_producto		             = $row['cantidad_producto'];
					  $precio_unitario				 = $row['precio_unitario'];
					  $precio           = $row['precio'];
					  $total_producto	 		= $row['total_producto'];
					  $forma_pago = $row['forma_pago'];
					  $pagado			     = $row['pagado'];
					  $fecha_pago	 = $row['fecha_pago'];
					  $estado = $row['estado'];
					  
					 					  
						    
			 echo "<tr class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
			echo "<th><a href='../pagos/detalles_pagos.php?pagos_id=".$pagos_id."'>".$nombre_producto."</a></th>";	  
			echo "<td>".$cantidad_producto."</td>";
			
			
			echo "<td>";
			echo"$"; echo  sprintf( number_format($precio_unitario, 0, '.', '.'));
 			echo "</td>";
 								
 								
			echo "<td>";
			echo"$"; echo  sprintf( number_format($total_producto, 0, '.', '.'));
 			echo "</td>";
 								
		
			echo "<td>".$pagado."</td>";
			echo "<td>".$forma_pago."</td>";
			
			echo "<td>";
			echo $fecha_pago = date('d/m/Y', strtotime($fecha_pago));
			echo "</td>";
							
							}
						   
				
?>		
<?php 
		$producto_id = $_GET['producto_id'];			    
					 $result = $base_datos->sql_query($producto->contarProductosxPagosFinlaziados($producto_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $cuenta1			= $row['cuenta1'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='6'>Cantidad de veces que a sido pagado el repuesto</td>";
								echo "<td>".$cuenta1."</td>";
								echo "</tr>";            
	 ?> 
<?php 
		$producto_id = $_GET['producto_id'];			    
					 $result = $base_datos->sql_query($producto->contarProductosxPagosFinlaziadosCantidad($producto_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $cuenta2			= $row['cuenta2'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='6'>Cantidad total de stock comprado</td>";
								echo "<td>".$cuenta2."</td>";
								echo "</tr>";            
	 ?> 
     
     <?php 
		$producto_id = $_GET['producto_id'];			    
					 $result = $base_datos->sql_query($producto->contarProductosxPagosFinlaziadosTotal($producto_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $cuenta3			= $row['cuenta3'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='6'>Cantidad total de stock comprado</td>";
								
									echo "<td>";
			echo"$"; echo  sprintf( number_format($cuenta3, 0, '.', '.'));
 			echo "</td>";
								echo "</tr>";            
	 ?> 
               
           </table>
	<input type='hidden' id='datos_a_enviar' name='datos_a_enviar' />
	<input type='hidden' id='datos_a_enviar2' name='datos_a_enviar2' />
	<input type='hidden' id='datos_a_enviar3' name='datos_a_enviar3' />
	<input type='hidden' id='datos_a_enviar4' name='datos_a_enviar4' />
 	<input type='hidden' id='datos_a_enviar5' name='datos_a_enviar5' />
  	<input type='hidden' id='datos_a_enviar6' name='datos_a_enviar6' />      
    <input type='hidden' id='datos_a_enviar7' name='datos_a_enviar7' />   
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