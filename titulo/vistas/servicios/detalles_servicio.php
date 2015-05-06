<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<?PHP 
$ruta = "../../";
$ruta_archivos= "../";

	include ('../master_pages/headernuevo.php');
	include ('../../includes/default.php');
	include ('../../modelos/cliente.php');
	include ('../../modelos/juridico.php');
	include ('../../modelos/naturales.php');
	include ('../../modelos/servicio.php');
	include ('../../modelos/tarea.php');
		//$cliente = new cliente();
    //$juridico = new juridico();
	$servicio	= new servicio();
	$tarea	= new tarea();
		//$sucursal = new sucursal();
		

	  ?>
	         
	  <head>

	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="<?php echo $ruta; ?>bootstrap/css/tables.css" rel="stylesheet" type="text/css" />
<title>Laboratorio Diesel Lagomarsino</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript">
function imprSelec(muestra)
{var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();}
</script>  
 <script language="javascript">
$(document).ready(function() {
	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
		$("#datos_a_enviar2").val( $("<div>").append( $("#Exportar_a_Excel2").eq(0).clone()).html());
		$("#datos_a_enviar3").val( $("<div>").append( $("#Exportar_a_Excel3").eq(0).clone()).html());
		$("#datos_a_enviar4").val( $("<div>").append( $("#Exportar_a_Excel4").eq(0).clone()).html());
		$("#FormularioExportacion").submit();
});
});


</script>
<style type="text/css">
.botonExcel{cursor:pointer;}
</style>
	  </head>
 			
	<body background="./../../../img/backgrounds/aqua.jpg">  			
<form class="form-horiziontal well" method="post"  id="FormularioExportacion" style="border-right-width: 100px; margin-left: 0px; margin-top: 0px; border-left-width: 100px; border-top-width: 110px;"  target="_blank" action="../../functions/reporteServicio.php">
          
          <div id="muestra"> 
          
          <h2 style="color:white;">Cliente</h2>

	   <thead>

 	<?php  
			 $servicio = new servicio();
			 $servicio_id = $_GET['servicio_id'];
					
					
					$result = $base_datos->sql_query($servicio->listarServiciosxNaturales($servicio_id));
     						if($row = mysql_fetch_array($result)){
				 
						$nombre_servicio	        = $row['nombre_servicio'];
						$estado_servicio	        = $row['estado_servicio'];
                        $descripcion	        = $row['descripcion'];
						$fecha_creacion	        = $row['fecha_creacion'];
						
						
						
						$cliente_id			= $row['cliente_id'];
						$nombre			= $row['nombre'];
						$apellido_paterno 			= $row['apellido_paterno'];
						$direccion 	= $row['direccion'];
						$ciudad 	= $row['ciudad'];
						$celular 	= $row['celular'];
						$apellido_materno 	= $row['apellido_materno'];
						$sucursal_id			= $row['sucursal_id'];
						$telefono			= $row['telefono'];				


						
						
						 echo"<table id='Exportar_a_Excel'  border='1' width='200'>
          					<thead></tr>
							<th>Nombre Cliente</th>
							<th>Telefono</th>
							<th>Celular</th>
							<th>Direccion</th>
							<th>Ciudad</th>
							<th>Reporte</th>
							
							</thead>
							<tr class = 'light'>
							<td><a href='../clientes/detalles_Natural.php?cliente_id=".$cliente_id."'>".$nombre." ".$apellido_paterno." ".$apellido_materno."</td>
							<td>".$telefono."</td>
							<td>".$celular."</td>
							<td>".$direccion."</td>
							<td>".$ciudad."</td>
							<td><img src='../../images/excel.jpg' class='botonExcel' ?/></td>
						
						
						  </table>";
							}        
		
					
?>     

	<?php  
			 $servicio = new servicio();
			 $servicio_id = $_GET['servicio_id'];
					
					
					$result = $base_datos->sql_query($servicio->listarServiciosxJuridicos($servicio_id));
     						if($row = mysql_fetch_array($result)){
				 
						$nombre_servicio	        = $row['nombre_servicio'];
						$estado_servicio	        = $row['estado_servicio'];
                        $descripcion	        = $row['descripcion'];
						$fecha_creacion	        = $row['fecha_creacion'];
						$cliente_id			= $row['cliente_id'];
						$nombre_empresa			= $row['nombre_empresa'];
						$razon_social 			= $row['razon_social'];
						$direccion 	= $row['direccion'];
						$ciudad 	= $row['ciudad'];
						$celular 	= $row['celular'];
						$sucursal_id			= $row['sucursal_id'];
						$telefono			= $row['telefono'];				


						
						
						 echo"<table  id='Exportar_a_Excel' border='1' width='200'>
          					<thead></tr>
							<th>Nombre Cliente</th>
							<th>Razon Social</th>
							<th>Telefono</th>
							<th>Celular</th>
							<th>Direccion</th>
							<th>Ciudad</th>
							<th>Reporte</th>
							
							</thead>
							<tr class = 'light'>
							<td><a href='../clientes/detalles_Juridicos.php?cliente_id=".$cliente_id."'>".$nombre_empresa."</td>
							<td>".$razon_social."</td>
							<td>".$telefono."</td>
							<td>".$celular."</td>
							<td>".$direccion."</td>
							<td>".$ciudad."</td>
							<td><img src='../../images/excel.jpg' class='botonExcel' ?/></td>
						
						  </table>";
							}        
		
					
?>     

	      <h2 style="color:white;">Detalles Servicios</h2>
					<?php  
			 $servicio = new servicio();
			 $servicio_id = $_GET['servicio_id'];
					
					
					$result = $base_datos->sql_query($servicio->listarServicios2($servicio_id));
     						if($row = mysql_fetch_array($result)){
				 
						$nombre_servicio	        = $row['nombre_servicio'];
						$estado_servicio	        = $row['estado_servicio'];
                        $descripcion	        = $row['descripcion'];
						$fecha_creacion	        = $row['fecha_creacion'];
						
						
						$trabajador_id			= $row['trabajador_id'];
						$nombre			= $row['nombre'];
						$apellido_paterno 			= $row['apellido_paterno'];
						$apellido_materno 	= $row['apellido_materno'];
						$sucursal_id			= $row['sucursal_id'];
						$nombre_sucursal			= $row['nombre_sucursal'];
						$telefono			= $row['telefono'];				


						
						
						 echo"<table  id='Exportar_a_Excel3' border='1' width='200'>
          					<thead></tr>
							<th>Nombre Servicio</th>
							<th>Descripcion Servicio</th>
							<th>Inicio</th>
							<th>Nombre Trabajador</th>
							<th>Sucursal</th>
							<th>Telefono</th>
							<th>Imprimir</th>
							</thead>
							<tr class = 'light'>
							<td>".$nombre_servicio."</td>
							<td>".$descripcion."</td>";
							echo "<td>";
							echo $fecha_creacion = date('d/m/Y', strtotime($fecha_creacion));
							echo "</td>";
							echo "<td><a href='../trabajadores/detalles_trabajadores.php?trabajador_id=".$trabajador_id."'>".$nombre." ".$apellido_paterno." ".$apellido_materno."</td>
							<td><a href='../sucursales/detalles_sucursales.php?sucursal_id=".$sucursal_id."'>".$nombre_sucursal."</a></td>
							<td>".$telefono."</td>
							
							<td><a href='#' onclick='window.print(); return false;' ><img src='../../images/print.png''/></a></td>
								  </table>";
							}        
		
					
?>
	           <input type='hidden' id='datos_a_enviar' name='datos_a_enviar' />
<input type='hidden' id='datos_a_enviar2' name='datos_a_enviar2' />
<input type='hidden' id='datos_a_enviar3' name='datos_a_enviar3' />
<input type='hidden' id='datos_a_enviar4' name='datos_a_enviar4' />
	   </thead>
 <h2 style="color:white;">Productos Asociados</h2>
	
 <table  id="Exportar_a_Excel4"  width="100%" border="1" cellpadding="0" cellspacing="0">
        <thead>
							<th>Nombre Producto</th>
							<th>Descripcion</th>
							<th>Marca</th>
							<th>Precio</th>
							<th>cantidad producto</th>
                            <th>Stock Total</th>
							<th>Valor Total</th>
                            <th>Agregar</th>
							
                            
	   
	  </thead>
<?php  
             
			 $servicio = new servicio();
			 $servicio_id = $_GET['servicio_id'];
			 
			
		
		
			//trabajador asociado al Servicio
            $result3=mysql_query($servicio->listarServiciosxProductos($servicio_id));
            while($row = mysql_fetch_array($result3))
                    {
					  $servicios_as_productos_id		             = $row['servicios_as_productos_id'];
					  $producto_id		             = $row['producto_id'];
					  $nombre_producto           = $row['nombre_producto'];
					  $descripcion			     = $row['descripcion'];
					  $marca		             = $row['marca'];
					  $precio           = $row['precio'];
	                  $cantidad         = $row['cantidad'];
					  $servicio_id 		= $row['servicio_id'];
					  
					  $cantidad_servicio         = $row['cantidad_servicio'];
					  
					  $valor_servicio           = $row['valor_servicio'];
			

//echo "$r[0]";
//$total_productos  = $row ['total_productos'];
		
							  
						    
							echo "<tr class = 'light'>";
							echo "<td><a href='../productos/detalles_productos.php?producto_id=".$producto_id."'>".$nombre_producto."</a></td>";
							echo "<td>".$descripcion."</td>";
							echo "<td>".$marca."</td>";
							echo "<td>";							
							echo "$"; echo  sprintf( number_format($precio, 0, '.', '.'));
							echo "</td>";
							echo "<td>".$cantidad_servicio."</td>";
							echo "<td>".$cantidad."</td>";
							echo "<td>";
							echo "$"; echo  sprintf( number_format($valor_servicio, 0, '.', '.'));
							echo "</td>";
							echo "<th><a href='../productos/agregar_producto_serv.php?servicios_as_productos_id=".$servicios_as_productos_id."'><img src='../../images/agregar.png'></th>";
							//echo "<tr>".$r[0]."</tr>";
							}
						   
				
?>
 <?php 
		$servicio_id = $_GET['servicio_id'];			    
					 $result = $base_datos->sql_query($servicio->sumarServiciosxProdutos($servicio_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $numberProductos 			= $row['numberProductos'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='7'>Total Repuestos</td>";
								echo "<td>";
 								echo "$"; echo  sprintf( number_format($numberProductos, 0, '.', '.'));
 								echo "</td>";
								echo "</tr>";            
	 ?> 



	
 <table  id="Exportar_a_Excel4"  width="100%" border="1" cellpadding="0" cellspacing="0">
   <h2 style="color:white;">Tareas Asociadas</h2>      <thead>
							<th>Nombre Tarea</th>
                           <th>Fecha </th> 
							<th>Precio</th>

							
                            
	   
	  </thead>
<?php  
             
			 $tarea = new tarea();
			 $servicio_id = $_GET['servicio_id'];
			 
			
		
		
			//trabajador asociado al Servicio
            $result4=mysql_query($tarea->listarTareasServicios($servicio_id));
            //while($row = mysql_fetch_array($result3))
            while($row = mysql_fetch_array($result4))
                    {
					  $nombre_tarea		             = $row['nombre_tarea'];
					  $valor		             = $row['valor'];
					  $servicio_id           = $row['servicio_id'];
					  $fecha_tarea 			= $row['fecha_tarea'];

//echo "$r[0]";
//$total_productos  = $row ['total_productos'];
		
							  
						    
							echo "<tr class = 'light'>";
							echo "<td>".$nombre_tarea."</td>";
							echo "<td>".$fecha_tarea."</td>";
							echo "<td>";
							echo "$"; echo  sprintf( number_format($valor, 0, '.', '.'));
							echo "</td>";

							
							//echo "<tr>".$r[0]."</tr>";
							}
						   
				
?>

  <?php 
		$servicio_id = $_GET['servicio_id'];			    
					 $result = $base_datos->sql_query($servicio->sumarServiciosxTareas($servicio_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number 			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='2'>Total Tareas</td>";
								echo "<td>";
 								echo "$"; echo  sprintf( number_format($number, 0, '.', '.'));
 								echo "</td>";
								echo "</tr>";            
	 ?> 

</table>
 </thead>
</table>

<TABLE id="Exportar_a_Excel5" BORDER>
	<TR><TH style="background-color:#0062B0;color:#ffffff">Total Por Productos Asociados Al Servicio</TH>
		<TD style="background-color:#00356B;color:#ffffff"><?php echo "$"; echo  sprintf( number_format($numberProductos, 0, '.', '.')); ?></TD></TR>
	<TR><TH style="background-color:#0062B0;color:#ffffff">Total Por Tareas Asociadas Al Servicio </TH>
		<TD style="background-color:#00356B;color:#ffffff"><?php echo "$"; echo  sprintf( number_format($number, 0, '.', '.')); ?></TD></TR>
	<TR><TH style="background-color:#0062B0;color:#ffffff">Total</TH>
		<TD style="background-color:#00356B;color:#ffffff"><?php echo "$"; echo  sprintf( number_format($numberProductos + $number , 0, '.', '.'));?></TD> <TD style="background-color:#0062B0;color:#ffffff">IVA</TD> <TD style="background-color:#00356B;color:#ffffff"><?php echo "$"; echo  sprintf( number_format(($numberProductos + $number) * 0.19 , 0, '.', '.'));?></TD></TR>
        <TR><TH style="background-color:#0062B0;color:#ffffff">Total Mas IVA</TH>
		<TD style="background-color:#00356B;color:#ffffff"><?php echo "$"; echo  sprintf( number_format(($numberProductos + $number) * 1.19 , 0, '.', '.'));?></TD></TR>
</TABLE>
							
                            
	   
	  </thead>
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