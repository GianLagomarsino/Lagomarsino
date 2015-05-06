<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?PHP
$ruta = "../../";
        $ruta_archivos= "../";
		include ('../master_pages/headernuevo.php'); 
		include ('../../includes/default.php');
		include ('../../modelos/producto.php');
		//include ('../../modelos/cliente.php');
		include ('../../modelos/proveedor.php');	  
		include ('../../modelos/pago.php');
			 	 
      $producto = new producto();
	  $proveedor = new proveedor(); 
	  //$sucursal = new sucursal(); 
	  $pago = new pago(); 
	  
	  ?><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>



	  <?PHP //jQuery ?>
  <link  rel="stylesheet" href="../../css3/ui-lightness/jquery-ui-1.8.20.custom.css" >
  <script src="../../css3/jquery-1.7.2.min.js"></script>
  <script src="../../css3/jquery-ui-1.8.20.custom.min.js"></script>


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

<form id="form" class="form-horizontal well" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 110px;" onsubmit="return Validar(this);" name="form" action="pago_asociado.php" method="post">
        <fieldset>
          <h2 style="color:white;">Realizar pago de productos pendientes</h2> 
          <table>

<?PHP						
					 	$pago_proveedores_id = $_GET['pago_proveedores_id'];
						//$producto_id = $_GET['producto_id'];
						//$result = mysql_query("select * from productos, pago_proveedores  where productos.producto_id = pago_proveedores.producto_id and  productos.producto_id = ".$_GET['producto_id'].";");
						
						$result2 = mysql_query("select *
from pago_proveedores, productos, proveedores 
where productos.proveedor_id= proveedores.proveedor_id
and productos.producto_id = pago_proveedores.producto_id 
and  pago_proveedores.pago_proveedores_id = ".$_GET['pago_proveedores_id'].";");

						if($row = mysql_fetch_array($result2))
						{
							
					    echo '<input type="hidden" readonly="" name="producto_id" value='.$row['producto_id'].'>';
						echo '<input type="hidden" readonly="" name="total_producto" value='.$row['total_producto'].'>';
						echo '<input type="hidden" readonly="" name="monto_pago" id="monto_pago" value='.$row['total_producto'].'>';
						echo '<input type="hidden" readonly="" name="pago_proveedores_id" value='.$row['pago_proveedores_id'].'>';
						echo '<input type="hidden" readonly="" name="nombre_producto" value='.$row['nombre_producto'].'>';
						echo '<input type="hidden" readonly="" name="marca" value='.$row['marca'].'>';
						echo '<input type="hidden" readonly="" name="cantidad_producto" value='.$row['cantidad_producto'].'>';
						echo '<input type="hidden" readonly="" name="precio_unitario" value='.$row['precio_unitario'].'>';
						echo '<input type="hidden" readonly="" name="monto_pago" id="monto_pago" value='.$row['total_producto'].'>';
                                     
								$total_producto = $row['total_producto'];
								$nombre_producto = $row['nombre_producto'];
								$marca = $row['marca'];
								$cantidad_producto = $row['cantidad_producto'];
								$precio_unitario = $row['precio_unitario'];
								//$tipo_cliente = "juridico";
		
							}
							
							
											
					?>

			
            <tr>
            <td><span class="label label-primary" for="input02">Nombre Producto</span></td>
            
              <td><input class="input-xlarge" id="nombre_producto" name="nombre_producto" readonly="readonly"  
              value="<?PHP echo  $nombre_producto ?>"   type="text" onBlur="return validar(event);"></td>
              <td><span class="label label-primary" for="input02">Pagado</span></td>
              <td><select id="pagado" name="pagado">
                <option value="pendiente">Pendiente</option>
                <option value="Pagado">Pagado</option>
              </select></td>
              </tr> 
             
             <tr>
            <td><span class="label label-primary" for="input02">Marca</span></td>
            
              <td><input class="input-xlarge" id="marca" name="marca" readonly="readonly"  
              value="<?PHP echo  $marca ?>"   type="text" onBlur="return validar(event);"></td>
              <td><span class="label label-primary" for="input04">Fecha Pago</span></td>
              <td><input class="input-xlarge"  id="fecha_pago" name="fecha_pago" type="text" readonly="readonly" onblur="return Validar(event);" /></td>
              </tr>              

             <tr>
            <td><span class="label label-primary" for="input02">Precio Unitario</span></td>
            
              <td><input class="input-xlarge" id="precio_unitario" name="precio_unitario" readonly="readonly"  
              value="<?PHP echo"$"; echo  sprintf( number_format($precio_unitario, 0, '.', '.')); ?>"   type="text" onBlur="return validar(event);"></td>
              <td><span class="label label-primary" for="input04">Fecha Creacion</span></td>
              <td><input class="input-xlarge" readonly="readonly" id="fecha_creacion" name="fecha_creacion" type="text" value="<?php echo date("Y-m-d")?>" /></td>
              </tr> 
              


             <tr>
            <td><span class="label label-primary" for="input02">Cantidad Producto</span></td>
            
              <td><input class="input-xlarge" id="cantidad_producto" name="cantidad_producto" readonly="readonly"  
              value="<?PHP echo  $cantidad_producto ?>"   type="text" onBlur="return validar(event);"></td>
              <td><span class="label label-primary" for="input02">Forma Pago</span></td>
              <td><select id="forma_pago" name="forma_pago">
                <option value="efectivo">Efectivo</option>
                <option value="cheque_al_dia">Cheque al dia</option>
                <option value="cheque_fecha">Cheque a fecha</option>
                <option value="transferencia">Transferencia</option>
              </select></td>
              </tr> 
              
            <tr>
            <td><span class="label label-primary" for="input02">Total a pagar por repuestos</span></td>
            
              <td><input class="input-xlarge" id="total_producto" name="total_producto" readonly="readonly"  
              value="<?PHP echo"$"; echo  sprintf( number_format($total_producto, 0, '.', '.')); ?>"   type="text" onBlur="return validar(event);"></td>
              
 

       
       <input class="input" id="fecha_modificacion" name="fecha_modificacion" readonly="readonly" type="hidden" value="<?php echo date("Y-m-d")?>">    
       <input class="input" readonly="readonly" id="estado" name="estado" value="1" type="hidden" > 
       <input class="input" readonly="readonly" id="deuda" name="deuda"   value="0" type="hidden" >  
 	   <input class="input" readonly="readonly" id="pago_proveedores_id" name="pago_proveedores_id" type="hidden" value="<?php echo $pago_proveedores_id?>"> 
 
 
 
 

 
           
           
           
         
          <div class="form-actions">
          <td>&nbsp;</td>
           <tr>
           <td> <button type="submit" class="btn btn-primary">Ingresar</button></td>
          <td>  <button type="reset" class="btn" onclick = "javascript:window.location='listar_proveedores.php'" >Cancelar</button></td>
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
