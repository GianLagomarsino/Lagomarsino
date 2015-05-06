<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?PHP
$ruta = "../../";
        $ruta_archivos= "../";
		include ('../master_pages/headernuevo.php'); 
		include ('../../includes/default.php');
		include ('../../modelos/servicio.php');
		include ('../../modelos/cliente.php');
		include ('../../modelos/sucursal.php');	  
		include ('../../modelos/venta.php');
			 	 
      $servicio = new servicio();
	  $cliente = new cliente(); 
	  $sucursal = new sucursal(); 
	  $venta = new venta(); 
	  
	  ?><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>
  <link  rel="stylesheet" href="../../css3/ui-lightness/jquery-ui-1.8.20.custom.css" >
  <script src="../../css3/jquery-1.7.2.min.js"></script>
  <script src="../../css3/jquery-ui-1.8.20.custom.min.js"></script>



<?PHP //jQuery ?>

<script type="text/javascript">  
function Validar(form) 
{ 


   var letra = form.fecha_pago.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar la fecha de pago");
  	form.fecha_pago.focus();
	return false;
  } 
   
   

   
	var fecha_termino = form.fecha_pago.value;
	var fecha_inicio = form.fecha_creacion.value;
	
	if(fecha_inicio > fecha_termino)
	{
		alert("El servicio debe ser pagado el mismo dia o despues de su creacion");
		form.fecha_pago.focus();
		return false;
	}
  
  
   var letra = form.titular_cheque.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar un Titular Cheque");
  	form.titular_cheque.focus();
	return false;
  } 


	
   var letra = form.serie_cheque.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar el numero de serie del cheque");
  	form.serie_cheque.focus();
	return false;
  } 	

   var letra = form.nombre_banco.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar el nombre del banco");
  	form.nombre_banco.focus();
	return false;
  } 	
	
   
   
   var letra = form.cuota.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar cantidad de cuotas");
  	form.cuota.focus();
	return false;
  } 

var letra = form.cuota.value;
	if (/^[0-9]+$/.test(letra)&&letra.length!=0)
		{
		}
	else
		{
			alert("Debe ingresar cantidad de cuotas (solo numeros).");
			form.cuota.focus();
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
					$( "#fecha_pago" ).datepicker();
					//$( "#fecha_pago_real" ).datepicker();
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

<form id="form" class="form-horizontal well" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 98px;" onsubmit="return Validar(this);" name="form" action="../ventas/venta_asociada2.php?servicio_id=".$servicio_id."" method="post">
        <fieldset>
          <h2 style="color:white;">Ingresar Venta De Servicios</h2>
<?PHP 
	   
	  
					$servicio_id = $_GET['servicio_id'];
					
					$result = mysql_query("select * from servicios, trabajadores, sucursales 
WHERE trabajadores.trabajador_id = servicios.trabajador_id
AND sucursales.sucursal_id = servicios.sucursal_id
AND servicios.servicio_id = $servicio_id");
									
					while($row = mysql_fetch_array($result))
					{
						$servicio_id 	  = $row['servicio_id'];
						$nombre_servicio  = $row['nombre_servicio'];
						$estado_servicio  = $row['estado_servicio'];
						$descripcion 	  = $row['descripcion'];
						$trabajador_id	  = $row['trabajador_id'];
						$nombre			  = $row['nombre'];
						$apellido_paterno = $row ['apellido_paterno'];
						$sucursal_id 	  = $row ['sucursal_id'];
						$nombre_sucursal  = $row ['nombre_sucursal'];
						//$total_productos  = $row ['total_productos'];
					}  
                ?>
                
	<?PHP             
        $servicio_id = $_GET['servicio_id'];
					
		$sql = "SELECT SUM(servicios_as_productos.valor_servicio)
FROM servicios, servicios_as_productos WHERE servicios.servicio_id = servicios_as_productos.servicio_id AND servicios.servicio_id = $servicio_id"
;

setlocale(LC_MONETARY, 'en_US');
$result = mysql_query($sql);
$r = mysql_fetch_row($result);
$number = $r[0];
//echo "$r[0]";
//$total_productos  = $row ['total_productos'];
		
           ?>
           
           
           
     <?php 
		$servicio_id = $_GET['servicio_id'];			    
					 $result = $base_datos->sql_query($servicio->sumarServiciosxTareas3($servicio_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number3 			= $row['number3'];
					  
						 }
					
          
 							           
	 ?>   
                    
       
	            
<table >
    <input class="input-xlarge" id="servicio_id" name="servicio_id" value="<?PHP echo $servicio_id; ?>" type="hidden" onBlur="return validar(event);">

            <tr class="dark">
            <td><span class="label label-primary" for="input02">Total a pagar por repuestos</span></td>
            
              <td><input class="input-xlarge" id="total_producto" name="total_producto" readonly="readonly"  
              value="<?PHP echo"$"; echo  sprintf( number_format($number, 0, '.', '.')); ?>"   type="text" onBlur="return validar(event);"></td>
              <td><span class="label label-primary" for="input03">Titular Cheque</span></td>
              <td><input class="input-xlarge"  id="titular_cheque" name="titular_cheque" type="text" onblur="return validar(event);" /></td>
              </tr>            
          
            <tr class="dark">
            <td><span class="label label-primary" for="input02">Total a pagar por Tareas</span></td>
            
              <td><input class="input-xlarge" id="total_tareas" name="total_tareas" readonly="readonly"  value="<?PHP echo"$"; echo  sprintf( number_format($number3, 0, '.', '.')); ?>"  type="text" onBlur="return validar(event);"></td>
              <td><span class="label label-primary" for="input03">Serie Cheque</span></td>
              <td><input class="input-xlarge"  id="serie_cheque" name="serie_cheque" type="text" onblur="return validar(event);" /></td>
              </tr>               
            <tr class="dark">
            <td><span class="label label-primary" for="input02">Monto a pagar</span></td>
            
              <td><input class="input-xlarge" id="monto2" name="monto_pago2"   type="text" readonly="readonly" value="<?PHP echo"$"; echo  sprintf( number_format($number + $number3, 0, '.', '.'));?>" onBlur="return validar(event);"></td>
              <td><span class="label label-primary" for="input03">Nombre Banco</span></td>
              <td><input class="input-xlarge"  id="nombre_banco" name="nombre_banco" type="text" onblur="return validar(event);" /></td>
              </tr>
<input class="input-xlarge" id="monto_pago" name="monto_pago"   type="hidden" readonly="readonly" value="<?PHP echo $number + $number2   ?>" onBlur="return validar(event);">
           <tr class="dark">
             <td><span class="label label-primary" for="input03">Fecha Ingreso</span></td>
             <td><input class="input-xlarge"  id="fecha_creacion" name="fecha_creacion" readonly="readonly" type="text"  value="<?php echo date("d-m-y")?>" onblur="return Validar(event);" /></td>
             <td><span class="label label-primary" for="input03">Cantidad Cuotas</span></td>
             <td><input class="input-xlarge"  id="cuota" name="cuota" type="text" onblur="return validar(event);" /></td>
      </tr>




          
           <tr class="dark">
             <td><span class="label label-primary">Fecha Pago</span></td>
             <td><input class="input-xlarge"  id="fecha_pago" name="fecha_pago" type="text" onblur="return validar(event);" /></td>
             <td><span class="label label-primary">Pagado</span></td>
             <td><select id="pagado" name="pagado" >
               <option value="Pendiente">Pendiente</option>
               <option value="Pagado">Pagado</option>
             </select></td>
      </tr>
  			
           <tr class="dark">
             <td><span class="label label-primary">Forma Pago</span></td>
             <td><select id="forma_pago" name="forma_pago">
               <option value="Cheque al dia">Cheque Al Dia</option>
               <option value="Cheque a fecha">Cheque A Fecha</option>
             </select></td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
      </tr>
           
         
          
         <input class="input-xlarge"  id="fecha_modificacion" name="fecha_modificacion" readonly="readonly" type="hidden" value="<?php echo date("Y-m-d")?>" onblur="return validar(event);" />
        
             
           
         
      <input class="input-xlarge"  id="cantidad_abono" name="cantidad_abono" type="hidden" readonly="readonly" onblur="return validar(event);" />
        
         
       <input class="input-xlarge"  id="estado" name="estado" value="1" type="hidden" onBlur="return validar(event);">   </tr>
         
 
 
 

 
           
           
          
          <div class="form-actions">
            <td>&nbsp;</td>
            <tr>
          <td>  <button type="submit" class="btn btn-primary">Ingresar</button></td>
           <td> <button type="reset" class="btn">Cancelar</button></td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
            </tr>
  </div>
         
           </table></fieldset>
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
