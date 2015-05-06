<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?PHP
$ruta = "../../";
        $ruta_archivos= "../";
		include ('../master_pages/header.php'); 
		include ('../../includes/default.php');
		include ('../../modelos/servicio.php');
		include ('../../modelos/producto.php');
		include ('../../modelos/cliente.php');
		include ('../../modelos/sucursal.php');	  
		include ('../../modelos/venta.php');
		
	  $producto = new producto();		 	 
      $servicio = new servicio();
	  $cliente = new cliente(); 
	  $sucursal = new sucursal(); 
	  $venta = new venta();
	   //$producto->setProducto_id	($_POST['producto_id']);
	  
	  ?><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>
<link type="text/css" href="../css/menu.css" rel="Stylesheet" /> <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
  <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="../style/tables.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.tablesorter/jquery-latest.js"></script>
<script type="text/javascript" src="../js/jquery.tablesorter/jquery.tablesorter.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.20.custom.min.js"></script>


<?PHP //jQuery ?>

<script type="text/javascript">
                            
function validar(form) 
{ 
    var letra = form.nombre_servicio.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un nombre al servicio");
		form.nombre_servicio.focus();
		return false;
	  }
     
	  

  	  
          var letra = form.estado_servicio.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar estado del servicio");
		form.estado_servicio.focus();
		return false;
	  }
             var letra = form.descripcion.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar una descripcion");
		form.descripcion.focus();
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
<body>  

<form id="form" class="form-horizontal well" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 98px;" onsubmit="return validar(this);" name="form" action="../ventas/repuesto_asociado.php?productos_id=".$productos_id."" method="post">
        <fieldset>
          <h2>Ingresar Venta De Productos</h2>
		<?PHP 
	   
	  
					$servicios_as_productos_id = $_GET['servicios_as_productos_id'];
					
					$result = mysql_query("select * from servicios_as_productos
WHERE servicios_as_productos_id =  $servicios_as_productos_id");
									
					while($row = mysql_fetch_array($result))
					{
						$producto_id 	  = $row['producto_id'];
						$servicios_as_productos_id  = $row ['servicios_as_productos_id'];
						$cantidad_servicios  = $row ['cantidad_servicio'];
						$valor_servicio  = $row ['valor_servicio'];
						
					}
               
                ?>
<table >
    <input class="input-xlarge" id="producto_id" name="producto_id" value="<?PHP echo $producto_id; ?>" readonly="readonly" type="hidden" onBlur="return validar(event);">
   <input class="input-xlarge" id="producto_id" name="servicios_as_productos_id" readonly="readonly" value="<?PHP echo $servicios_as_productos_id; ?>" type="hidden" onBlur="return validar(event);"> 

  <tr>
            <td><span class="label label-primary" for="input02">Valor Total De Los Repuestos</span></td>
            
              <td><input class="input-xlarge" id="valor_servicio" name="valor_servicio" readonly="" type="text" value="<?PHP echo "$"; echo  sprintf( number_format($valor_servicio, 0, '.', '.'));  ?>" ></td>
              </tr> 
        
            
            
<input class="input-xlarge" id="monto" name="monto_pago" readonly="readonly" value="<?PHP echo $valor_servicio; ?>"   type="hidden" onBlur="return validar(event);"></td>
              


           <tr>
            <td><span class="label label-primary" for="input02">pagado</span></td>
            
             <td> <select id="pagado" name="pagado" >
                	<option value="Pendiente">Pendiente</option>
					<option value="Pagado">Pagado</option>
                    </select></td>
</tr>

          
           <tr>
             <td><span class="label label-primary" for="input04">Fecha Pago</span></td>
              <td><input class="input-xlarge"  id="fecha_pago" name="fecha_pago" readonly="readonly" type="text" onBlur="return validar(event);"></td>
</tr>
 
 <tr>
             <td><span class="label label-primary" for="input04">Forma PAgo</span></td>
              <td><input class="input-xlarge"  id="forma_pago" name="forma_pago" value="efectivo" readonly="readonly" type="text" onBlur="return validar(event);"></td>
</tr> 			
           <tr>
            <td><span class="label label-primary" for="input02">Forma Pago</span></td>
            
             <td> <select name="forma_pago" >
                	<option value="efectivo">Efectivo</option>
					<option value="cheque_al_dia">Cheque al dia</option>
					<option value="cheque_fecha">Cheque a fecha</option>
					<option value="transferencia">Transferencia</option>
                    </select></td>
</tr>

         <tr> <td><span class="label label-primary" for="input03">Serie Cheque (solo si el pago es con Cheque)</span></td>
		  <td><input class="input-xlarge"  id="serie_cheque" name="serie_cheque" type="text" onBlur="return validar(event);"></td>
           </tr>
         
  <tr>
          <td><span class="label label-primary" for="input03">Nombre Banco (solo si el pago es con Cheque)</span></td>
       	  <td><input class="input-xlarge"  id="nombre_banco" name="nombre_banco" type="text" onBlur="return validar(event);"></td>
           
        </tr> 
       
       
        
  <input class="input-xlarge"  id="fecha_creacion" name="fecha_creacion" readonly="readonly" type="hidden" value="<?php echo date("Y-m-d")?>" onBlur="return validar(event);">
           
         
          
  <input class="input-xlarge"  id="fecha_modificacion" name="fecha_modificacion" readonly="readonly" type="hidden" value="<?php echo date("Y-m-d")?>" onblur="return validar(event);" />
        
         
           
         
         <tr> 
         <td><span class="label label-primary" for="input03">Cantidad Abono (solo si el pago es con Cheque)</span><td><input class="input-xlarge"  id="cantidad_abono" name="cantidad_abono" type="text" onblur="return validar(event);" />
        
          
         </td>
           
       <input class="input-xlarge"  id="estado" name="estado" value="1" type="hidden" onBlur="return validar(event);">   </tr>
         
 
 
 

 
           
           
           
           </table>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Ingresar</button>
            <button type="reset" class="btn">Cancelar</button>
  </div>
        </fieldset>
</form>
</body>

</html>
