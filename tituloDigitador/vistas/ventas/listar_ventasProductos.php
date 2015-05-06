<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP 

$ruta = "../../";
        $ruta_archivos= "../";
include ("../master_pages/headernuevo.php");
include ("../../includes/default.php");
//include ("../../includes/database.php");
include ("../../modelos/servicio.php");
include ("../../modelos/venta.php");



$venta = new venta();
//$trabajador = new trabajador();

 ?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>
     <link href="<?php echo $ruta; ?>bootstrap/css/tables.css" rel="stylesheet" type="text/css" />
      <link  rel="stylesheet" href="../../css3/ui-lightness/jquery-ui-1.8.20.custom.css" >
  <script src="../../css3/jquery-1.7.2.min.js"></script>
  <script src="../../css3/jquery-ui-1.8.20.custom.min.js"></script>

<script language="JavaScript">
function confirmar ( mensaje ) {
mensaje = " �Esta Seguro De Querer Eliminar La Venta? ";
return confirm( mensaje );

} 
</script>
<script language="javascript">
function Validar(contact){
 var letra = contact.fecha_inicio1.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar la fecha Inicio del servicio");
	contact.fecha_inicio1.focus();
  	return false;
  }
  
  var letra = contact.fecha_inicio2.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar la fecha Inicio del servicio");
	contact.fecha_inicio2.focus();
  	return false;
  }
  
  }
</script>

<script type="text/javascript">
						$(function(){
			
							// Datepicker
							$('#datepicker').datepicker({
								inline: true
							});
			
							//hover states on the static widgets
							$('#dialog_link, ul#icons li').hover(
								function() { $(this).addClass('ui-state-hover'); },
								function() { $(this).removeClass('ui-state-hover'); }
							);
			
						});
					</script>
					
<script>
				$(function() {
					$( "#fecha_inicio1" ).datepicker();
					$( "#fecha_inicio2" ).datepicker();
				});
				</script>
<script>
				jQuery(function($){
				$.datepicker.regional['es'] = {
					closeText: 'Cerrar',
					prevText: '&#x3c;Ant',
					nextText: 'Sig&#x3e;',
					currentText: 'Hoy',
					monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
					'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
					monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
					'Jul','Ago','Sep','Oct','Nov','Dic'],
					dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
					dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
					dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
					weekHeader: 'Sm',
					dateFormat: 'yy-mm-dd',
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: false,
					yearSuffix: ''};
				$.datepicker.setDefaults($.datepicker.regional['es']);
			});

			</script>
</head>

<body background="./../../../img/backgrounds/aqua.jpg">  
 <form class="form-horizontal well" method="post" name="contact" action="listar_ventasProductosFechas.php" onSubmit='return Validar(this);' style="border-right-width: 100px; margin-left: 0px; border-top-width: 100px; border-left-width: 100px;">
                          <div class="cleaner"></div>
                          
                   <h2 style="color:white">Listado Ventas De Productos</h2>
                          
          
         <table  width="100%" border="1" cellpadding="0" cellspacing="0">
<p><span class="label label-primary" for="input02">Buscar Ventas de productos con fecha creacion entre</span> <input readonly="readonly" type="text" id="fecha_inicio1" name="fecha_inicio1" size="20" value="" onBlur="return validar(event);"> <span class="label label-primary" for="input02"> Y</span>  <input readonly="readonly" type="text" id="fecha_inicio2" name="fecha_inicio2" size="20" value="" onBlur="return Validar(event);">
          <button type="submit" class="btn btn-primary"/>Buscar</button>
          <br><br></p>	
        <thead>
		<tr class ='light'>
        <th>Nombre Producto</th>		
		<th>cantidad producto</th>		
		<th>valor producto</th>		
		<th>Monto Pago</th>		
		<th>Pagado</th>
		<th>Forma Pago</th>
        <th>Cuotas</th>
        <th>Precio Cuotas</th>
        <th>Fecha Pago</th>
		<th>Fecha Creacion</th>

		     </tr>
						</thead>
                    <tbody>
					 
					
					   <?php 
					   
					 $result = $base_datos->sql_query($venta->listarVentasServicios());
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					 // $servicio_id 			= $row['servicio_id'];
					  $producto_id 			= $row['producto_id'];
					  $nombre_producto 			= $row['nombre_producto'];
					  $cantidad_servicio 			= $row['cantidad_servicio'];
					  $valor_servicio 			= $row['valor_servicio'];
					  //$nombre_servicio 			= $row[''];
					  $ventas_id                = $row['ventas_id'];
					  $monto_pago			             = $row['monto_pago'];
					  $pagado 		             = $row['pagado'];
					  $fecha_pago             = $row['forma_pago'];
					  $fecha_pago             = $row['fecha_pago'];
					  $serie_cheque             = $row['serie_cheque'];
					  $nombre_banco             = $row['nombre_banco'];
					  $forma_pago                = $row['forma_pago'];
					  $fecha_creacion                = $row['fecha_creacion'];
					  $fecha_modificacion			             = $row['fecha_modificacion'];
					  $cantidad_abono 		             = $row['cantidad_abono'];
					  $estado             = $row['estado'];
					   $cuota             = $row['cuota'];





					 
	         echo "<tr class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
	         echo "<th><a href='detalles_ventas.php?ventas_id=".$producto_id."'>".$nombre_producto."</a></th>";
			echo "<td>".$cantidad_servicio."</td>";	  		    
			echo "<td>";							
			echo "$"; echo  sprintf( number_format($valor_servicio, 0, '.', '.'));
			echo "</td>";
			echo "<td>";							
			echo "$"; echo  sprintf( number_format($monto_pago, 0, '.', '.'));
			echo "</td>";  		    
						if ($pagado == "Pagado") {
			echo "<td>";	
			echo "<span class='label label-success' for='input02'>Pagado<span>";  		    
			echo "</td>";	
}  else {
   			echo "<td>";	
			echo "<span class='label label-danger' for='input02'>Pendiente<span>";  		    
			echo "</td>";
}
				echo "<td>".$forma_pago."</td>";
			
									if ($cuota == "0") {
			echo "<td>";	
			echo "<span class='label label-success' for='input02'>sin cuotas<span>";  		    
			echo "</td>";	
}  else {
   			echo "<td>";	
			echo "<span class='label label-danger' for='input02'>$cuota cuotas<span>";  		    
			echo "</td>";
}

									if ($cantidad_abono == "0") {
			echo "<td>";	
			echo "<span class='label label-success' for='input02'>sin cuotas<span>";  		    
			echo "</td>";	
}  else {
   			$precioCuotas = sprintf( number_format($cantidad_abono, 0, '.', '.'));
			echo "<td>";	
			echo "<span class='label label-danger' for='input02'>$$precioCuotas por cuotas<span>";  		    
			echo "</td>";
};	  		    
			echo "<td>";
			echo $fecha_pago = date('d/m/Y', strtotime($fecha_pago));
			echo "</td>";
			echo "<td>";
			echo $fecha_creacion = date('d/m/Y', strtotime($fecha_creacion));
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
       </tr>
             <?php

 $result = $base_datos->sql_query($venta->contarVentaProductos());
				 while($row = $base_datos->sql_fetch_assoc($result)) {
			     $number 			= $row['number'];
					


					 
	        echo "<tr class = 'light'>";
			 echo "<td colspan='7'>Cantidad total de venta de productos</td>";
			echo "<td>".$number."</td>";	  		    
			 
						 }
					
                     
	 ?>		

			
 
					  
					
 </tbody> 
		     
			 </table>
						
          
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