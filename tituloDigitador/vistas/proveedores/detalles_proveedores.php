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
	
	$trabajador = new proveedor();
   // $juridico = new juridico();
	$servicio	= new producto();


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
		$("#FormularioExportacion").submit();
});
});


</script>
<style type="text/css">
.botonExcel{cursor:pointer;}
</style>
	  </head>




<body background="./../../../img/backgrounds/aqua.jpg">   			
<form class="form-horizontal well" method="post" id="FormularioExportacion"  style="border-right-width: 100px; margin-left: 0px; margin-top: 0px; border-left-width: 100px; border-top-width: 110px; height: 100%;" target="_blank" action="../../functions/reporteProveedor.php">
          <h2 style="color:white;">Detalles Proveedor</h2>
	  

       
	   </thead>
	   
 <?php  
             
			 $proveedor = new proveedor();
			 $proveedor_id = $_GET['proveedor_id'];
			 
			
		
		
			
            $result=mysql_query($trabajador->listarProveedores2($proveedor_id));
            //$result2=mysql_query($trabajador->listarProductosxProveedor($proveedor_id));

                            
                    if($row = mysql_fetch_array($result))
                    {
                        $proveedor_id = $row['proveedor_id'];
						$nombre_proveedor			= $row['nombre_proveedor'];
						$direccion_proveedor 			= $row['direccion_proveedor'];
						$email_proveedor 	= $row['email_proveedor'];
						$rut_proveedor					= $row['rut_proveedor'];						
						$telefono_proveedor				= $row['telefono_proveedor'];
						$celular_proveedor				= $row ['celular_proveedor'];
						//$celular 				= $row['celular'];
						//$sueldo 		        	= $row['sueldo'];

						
						

										echo "<table id='Exportar_a_Excel' border='1' style='max-width:40%;'>";			
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Nombre Proveedor</span></TD>";
							echo "<td>".$nombre_proveedor."</td>";
							echo "</tr>";
							
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Direccion</span></TD>";
							echo "<td>".$direccion_proveedor."</td>";
							echo "</tr>";
							
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Email</span></TD>";
							
							echo "<td>".$email_proveedor."</td>";	
							 							echo "</tr>";
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Rut</span></TD>";
							
							  echo "<td>".$rut_proveedor."</td>";
							  							echo "</tr>";
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Telefono</span></TD>";
						
							 echo "<td>".$telefono_proveedor."</td>";
							 							echo "</tr>";
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Celular</span></TD>";
							
							 echo "<td>".$celular_proveedor."</td>";
							echo "</tr>";
							
							echo "<tr class = 'light'>";
							echo "<td class = 'light' ><span for='input01' class='label label-primary'>Exportar</span></TD>";
							 echo "<td><img src='../../images/excel.jpg' class='botonExcel' ?/></td>";
							echo "</tr>";
						   echo "</table>";
						   
						}
						
			
						
?>
	<input type='hidden' id='datos_a_enviar' name='datos_a_enviar' />
<input type='hidden' id='datos_a_enviar2' name='datos_a_enviar2' />
<input type='hidden' id='datos_a_enviar3' name='datos_a_enviar3' />
 <table id="Exportar_a_Excel2"  width="100%" border="1" cellpadding="0" cellspacing="0">
        <thead>
		 <h2 style="color:white;">Productos Pendientes Asociados</h2>
		<tr class ='light'>
        <th>Nombre Producto</th>		
		<th>Descripcion</th>
	    <th>Marca</th>
		<th>Numero de producto</th>		
        <th>Precio Unitario</th>
		<th>Total producto</th>
        <th>Pagar</th>
        
		     </tr>
						</thead>
                    <tbody>
					 
					
					   <?php 
					   
					 $result2 = $base_datos->sql_query($proveedor->listarProductosxProveedor($proveedor_id));
						 while($row = $base_datos->sql_fetch_assoc($result2)) {
						
					  
					  $pago_proveedores_id		             = $row['pago_proveedores_id'];
					  $producto_id		             = $row['producto_id'];
					  //$servicio_id				 = $row['servicio_id'];
					  $nombre_producto           = $row['nombre_producto'];
					  $descripcion			     = $row['descripcion'];
					  $marca		             = $row['marca'];
					  $precio_unitario           = $row['precio_unitario'];
	                  $cantidad_producto         = $row['cantidad_producto'];
					  $total_producto            = $row['total_producto'];
					 
	         
			 
			 echo "<tr class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
			echo "<td>".$nombre_producto."</td>";	  		    
			echo "<td>".$descripcion."</td>";
			echo "<td>".$marca."</td>";
			echo "<td>".$cantidad_producto."</td>";	 	  		    
			echo "<td>";							
			echo "$"; echo  sprintf( number_format($precio_unitario, 0, '.', '.'));
			echo "</td>";	         		    
			echo "<td>";							
			echo "$"; echo  sprintf( number_format($total_producto, 0, '.', '.'));
			echo "</td>";	        
			
				  		    
  		     echo "<th><a href='ingresar_pagos.php?pago_proveedores_id=".$pago_proveedores_id."'><img src='../../images/pagar.png'></th></tr>";
  		    //echo "<td><a href='../sucursales/detalles_sucursales.php?sucursal_id=".$sucursal_id."'>".$nombre_sucursal."</a></td>";		
  		     //echo "<td>".$telefono."</td>";	
  		 	 //echo "<td>".$celular."</td>";
		     //echo "<td>".$sueldo."</td>";	
  		 	 
		   // echo "";
          		  
					}
           ?>
           
             <?php 
					    
					 $result = $base_datos->sql_query($proveedor->contarProductosProveedorPendiente($proveedor_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number 			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
 echo "<td colspan='6'>Total Repuestos</td>";
 echo "<td>";
 echo "$"; echo  sprintf( number_format($number, 0, '.', '.'));
 echo "</td>";
 echo "</tr>";
 echo "<tr align='right' class = 'light'>";
 echo "<td colspan='6'>IVA</td>";
 echo "<td>";
 echo "$"; echo  sprintf( number_format($number * 0.19, 0, '.', '.'));
 echo "</td>";
  echo "<tr align='right' class = 'light'>";
 echo "<td colspan='6'>TOTAL CON IVA</td>";
 echo "<td>";
 echo "$"; echo  sprintf( number_format($number * 1.19, 0, '.', '.'));
 echo "</td>";

								echo "</tr>";            
	 ?> 
           
          <table id="Exportar_a_Excel3"  width="100%" border="1" cellpadding="0" cellspacing="0">
        <thead>
		 <h2 style="color:white;">Productos Pagados Asociados</h2>
		<tr class ='light'>
        <th>Nombre Producto</th>		
		<th>Descripcion</th>
	    <th>Marca</th>
		<th>Numero de producto</th>		
        <th>Precio Unitario</th>
		<th>Total producto</th>
        
        
		     </tr>
						</thead>
                    <tbody>
					 
					
					   <?php 
					   
					 $result2 = $base_datos->sql_query($proveedor->listarProductosxProveedor2($proveedor_id));
						 while($row = $base_datos->sql_fetch_assoc($result2)) {
						
					  
					  $pago_proveedores_id		             = $row['pago_proveedores_id'];
					  $producto_id		             = $row['producto_id'];
					  //$servicio_id				 = $row['servicio_id'];
					  $nombre_producto           = $row['nombre_producto'];
					  $descripcion			     = $row['descripcion'];
					  $marca		             = $row['marca'];
					  $precio_unitario           = $row['precio_unitario'];
	                  $cantidad_producto         = $row['cantidad_producto'];
					  $total_producto            = $row['total_producto'];
					 
	         
			 
			 echo "<tr class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
			echo "<td>".$nombre_producto."</td>";	  		    
			echo "<td>".$descripcion."</td>";
			echo "<td>".$marca."</td>";
			echo "<td>".$cantidad_producto."</td>";	 	  		    
			echo "<td>";							
			echo "$"; echo  sprintf( number_format($precio_unitario, 0, '.', '.'));
			echo "</td>";	         		    
			echo "<td>";							
			echo "$"; echo  sprintf( number_format($total_producto, 0, '.', '.'));
			echo "</td>";	        
			
				  		    
  		    //echo "<th><a href='ingresar_pagos.php?pago_proveedores_id=".$pago_proveedores_id."'><img src='../../images/pagar.png'></th></tr>";
  		    //echo "<td><a href='../sucursales/detalles_sucursales.php?sucursal_id=".$sucursal_id."'>".$nombre_sucursal."</a></td>";		
  		     //echo "<td>".$telefono."</td>";	
  		 	 //echo "<td>".$celular."</td>";
		     //echo "<td>".$sueldo."</td>";	
  		 	 
		   // echo "";
          		  
					}
           ?>
            <?php 
					    
					 $result = $base_datos->sql_query($proveedor->contarProductosProveedorPagados($proveedor_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number 			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
 echo "<td colspan='5'>Total Historico Repuestos Pagados</td>";
 echo "<td>";
 echo "$"; echo  sprintf( number_format($number, 0, '.', '.'));
 echo "</td>";
 echo "</tr>";
 echo "<tr align='right' class = 'light'>";
 echo "<td colspan='5'>IVA</td>";
 echo "<td>";
 echo "$"; echo  sprintf( number_format($number * 0.19, 0, '.', '.'));
 echo "</td>";
  echo "<tr align='right' class = 'light'>";
 echo "<td colspan='5'>TOTAL CON IVA</td>";
 echo "<td>";
 echo "$"; echo  sprintf( number_format($number * 1.19, 0, '.', '.'));
 echo "</td>";
								echo "</tr>";            
	 ?> 
          </table>
        </div>
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

</body>

</html>