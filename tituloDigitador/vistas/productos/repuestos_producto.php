<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?PHP 

$ruta = "../../";
        $ruta_archivos= "../";
include ('../master_pages/headernuevo.php');
         include('../../includes/default.php');
		include ('../../modelos/servicio.php');
		include ('../../modelos/cliente.php');
		include ('../../modelos/sucursal.php');	  
		include ('../../modelos/trabajador.php');
		include ('../../modelos/producto.php');
			 	 
      $servicio = new servicio();
	  $cliente = new cliente(); 
	  $sucursal = new sucursal(); 
	  $trabajador = new trabajador();
	  $producto = new producto(); 
	  
	  ?>
	  <?PHP //jQuery ?>
<script type="text/javascript" src="../../js/validar.js"></script>
<script type="text/javascript" src="../../js/validarut.js"></script>

    
  <link  rel="stylesheet" href="../../css3/ui-lightness/jquery-ui-1.8.20.custom.css" >
  <script src="../../css3/jquery-1.7.2.min.js"></script>
  <script src="../../css3/jquery-ui-1.8.20.custom.min.js"></script>

<script type="text/javascript">
                            
function Validar(formulario) 
{ 
  
   var letra = formulario.cantidad_servicio.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar cantidad producto");
	formulario.cantidad_servicio.focus();
  	return false;
  }
   var numero1 = formulario.cantidad_servicio.value;
   var numero2 = formulario.cantidad.value
  
    
	if (parseInt(numero2) <= parseInt(numero1))
  {
     alert("El campo cantidad servicios debe ser menor que el campo cantidad total ");
     formulario.cantidad_servicio.focus();
	 return false;
  }
	
	
	
   
  var letra = formulario.cantidad_servicio.value;
  if (/^[0-9]+$/.test(letra)&&letra.length!=0)
	{
	}
	else
	{
		alert("Debe ingresar el presupuesto (solo numeros)");
		formulario.cantidad_servicio.focus();
		return false;
	
}
  
 var letra = formulario.fecha_pago.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar la fecha de pago");
  	formulario.fecha_pago.focus();
	return false;
  } 
   
   

   
	var fecha_termino = formulario.fecha_pago.value;
	var fecha_inicio = formulario.fecha_creacion.value;
	
	if(fecha_inicio > fecha_termino)
	{
		alert("El servicio debe ser pagado el mismo dia o despues de su creacion");
		formulario.fecha_pago.focus();
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
 
<form class="form-horizontal well" name="form" id="form" onSubmit="return Validar(this);" method="post" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 98px;" action="repuestos_vendido.php?producto_id=".$producto_id."">
       
		
		<?PHP 
	   
	  
					$producto_id = $_GET['producto_id'];
					
					$result = mysql_query("select * from productos 
WHERE producto_id = $producto_id");
									
					while($row = mysql_fetch_array($result))
					{
						$producto_id 	  = $row['producto_id'];
						$nombre_producto  = $row['nombre_producto'];
						$descripcion 	  = $row['descripcion'];
						$marca	  = $row['marca'];
						$fecha_ingreso			  = $row['fecha_ingreso'];
						$precio = $row ['precio'];
						$cantidad 	  = $row ['cantidad'];
						//$nombre_sucursal  = $row ['nombre_sucursal'];
					}
               
                ?>
	
        <fieldset>
          <h2 style="color:white">Vender Producto</h2>
    <div class="control-group">

		              
            <div class="controls" hidden>
              <input class="input-xlarge" id="producto_id"  name="producto_id" type="text" value="<?PHP echo $producto_id; ?>">
			  
              
            </div>
<table>
		  
            <tr class="dark">
            <td><span class="label label-primary" for="input02">Nombre Producto</span></td>
            
              <td><input class="input-xlarge" id="nombre_producto" name="nombre_producto" readonly="readonly"  type="text" onBlur="return validar(event);"value="<?PHP echo $nombre_producto; ?>"></td>
              <td><span class="label label-primary">Cantidad de repuestos</span></td>
              <td><input class="input-xlarge" id="cantidad_servicio" name="cantidad_servicio"   type="text" onblur="return Validar(event);" /></td>
              </tr>
 <tr class="dark">
            <td><span class="label label-primary" for="input02">Descripcion</span></td>
            
              <td><input class="input-xlarge" id="descripcion" name="descripcion"   type="text" readonly="readonly" onBlur="return validar(event);"value="<?PHP echo $descripcion; ?>"></td>
              <td><span class="label label-primary">Pagado</span></td>
              <td><select id="pagado" name="pagado">
                <option value="Pendiente">Pendiente</option>
                <option value="Pagado">Pagado</option>
              </select></td>
              </tr>			  
              
  <tr class="dark">
            <td><span class="label label-primary" for="input02">Marca</span></td>
            
              <td><input class="input-xlarge" id="marca" name="marca"   type="text" readonly="readonly" onBlur="return validar(event);"value="<?PHP echo $marca; ?>"></td>
              <td><span class="label label-primary">Fecha Ingreso</span></td>
              <td><input class="input-xlarge"  id="fecha_creacion" name="fecha_creacion" readonly="readonly" type="text"  value="<?php echo date("Y-m-d")?>" onblur="return Validar(event);" /></td>
              </tr>
              
              <tr class="dark">
            <td><span class="label label-primary" for="input02">Fecha Ingreso</span></td>
            
              <td><input class="input-xlarge" id="fecha_ingreso" name="fecha_ingreso"   type="text" readonly="readonly" onBlur="return validar(event);"value="<?PHP echo $fecha_ingreso = date('d/m/Y', strtotime($fecha_ingreso));; ?>"></td>
              <td><span class="label label-primary">Fecha Pago</span></td>
              <td><input class="input-xlarge"  id="fecha_pago" name="fecha_pago" type="text" readonly="" onblur="return Validar(event);" /></td>
              </tr>
              
 <tr class="dark">
            <td><span class="label label-primary" for="input02">Precio</span></td>
            
              <td><input class="input-xlarge" id="precio" name="precio"   type="text" readonly="readonly" onBlur="return validar(event);"value="<?PHP echo "$"; echo  sprintf( number_format($precio, 0, '.', '.')); ?>"></td>
              <td><span class="label label-primary">Forma Pago</span></td>
              <td><input class="input-xlarge"  id="forma_pago" name="forma_pago" type="text" value="Efectivo" readonly="readonly" /></td>
      </tr>

           

            <tr class="dark">
            <td><span class="label label-primary" for="input02">Cantidad total</span></td>
            
              <td><input class="input-xlarge" id="cantidad" name="cantidad" readonly="readonly"   type="text" onBlur="return Validar(event);"value="<?PHP echo $cantidad; ?>"></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>

         
		  <input class="input-xlarge"  id="serie_cheque" name="serie_cheque" type="hidden" readonly="readonly" onBlur="return validar(event);">
          <input class="input-xlarge"  id="nombre_banco" name="nombre_banco" type="hidden" readonly="readonly" onBlur="return validar(event);">
          <input class="input-xlarge"  id="cantidad_abono" name="cantidad_abono" type="hidden" readonly="" onblur="return validar(event);" />
  <input class="input-xlarge"  id="fecha_modificacion" name="fecha_modificacion" readonly="readonly" type="hidden" value="<?php echo date("Y-m-d")?>" onblur="return validar(event);" />
       
         <tr class="dark"> <td>&nbsp;</td>
        
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
      </tr>
         
         
                      </table>
         <input class="input-xlarge" id="monto_pago" name="monto_pago"   type="hidden" readonly="readonly" value="0" onBlur="return validar(event);">         <input class="input-xlarge"  id="estado" name="estado" value="1" type="hidden" onBlur="return validar(event);">    
           
           
           
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Asignar</button>
            <button type="reset" class="btn" onclick = "javascript:window.location='listar_productos.php'">Cancelar</button>
          </div>
        </fieldset>
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