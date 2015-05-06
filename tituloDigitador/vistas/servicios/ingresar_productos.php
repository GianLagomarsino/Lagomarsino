<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?PHP 
        $ruta = "../../";
        $ruta_archivos= "../";
      include ('../master_pages/headernuevo.php'); 
      include ("../../includes/default.php");
	  include ('../../modelos/tarea.php');
	  include ('../../modelos/proveedor.php');
	  include ('../../modelos/servicio.php');
	  
	 
	  $tarea = new tarea();
	  $servicio = new servicio();
	  
	  
	  ?>
	  
	  <script type="text/javascript" src="../../js/validar.js"></script>
<script type="text/javascript" src="../../js/validarut.js"></script>


<?PHP //jQuery ?>
    <script type="text/javascript">
jQuery(document).ready(function()
    {
        jQuery("#Pagination").tablesorter({sortList: [[0,0], [1,0]]});
    }
);
</script>






<script type="text/javascript">
                            
function validar(form) 
{ 


    var letra = form.nombre_producto.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un nombre al Producto");
		form.nombre_producto.focus();
		return false;
	  }
 
             var letra = form.descripcion.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar una descripcion");
		form.descripcion.focus();
		return false;
	  }        
           var letra = form.marca.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar una marca");
		form.marca.focus();
		return false;
	  }  
   

	  var letra = form.precio_unitario.value;
	if (/^[0-9]+$/.test(letra)&&letra.length!=0)
		{
		}
	else
		{
			alert("Debe ingresar el precio proveedor (solo numeros).");
			form.precio_unitario.focus();
			return false;
		}

    var letra = form.precio.value;
	if (/^[0-9]+$/.test(letra)&&letra.length!=0)
		{
		}
	else
		{
			alert("Debe ingresar el precio unitario (solo numeros).");
			form.precio.focus();
			return false;
		}
		
	
		
			 var letra = form.cantidad.value;
	if (/^[0-9]+$/.test(letra)&&letra.length!=0)
		{
		}
	else
		{
			alert("Debe ingresar la cantidad (solo numeros).");
			form.cantidad.focus();
			return false;
		}
	

		var precio_unitario = form.precio_unitario.value;
		var precio = form.precio.value;
		
		if(precio > precio_unitario)
	{
		alert("El el precio del proveedor debe ser menor al precio unitario");
		form.precio_unitario.focus();
		return false;
	}
		
	
	
  }	  
	  
	  </script>
	  
	  
	  
	  </head>
<body background="./../../../img/backgrounds/aqua.jpg"> 

<form class="form-horizontal well" method="post" name="form" id="form" action="producto_ingresado.php" onSubmit="return validar(this);" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 110px;">
                 <?PHP 
	   
	  
					$servicio_id = $_POST['servicio_id'];
					
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
					}
               $tarea_id = $_POST['tarea_id'];
			   $result2 = mysql_query("select * from tareas where tarea_id = $tarea_id");
									
					while($row = mysql_fetch_array($result2))
					{
						$tarea_id 	  = $row['tarea_id'];
						$nombre_tarea  = $row['nombre_tarea'];
						$valor  = $row['valor'];
						
					}
                ?>

        
        <fieldset>
         <input class="input-xlarge" id="servicio_id" hidden="hidden" name="servicio_id" type="input" value="<?PHP echo $nombre_servicio; ?>" >
          
          <h2 style="color:white;">Ingresar Producto</h2>
          
          
          <table width="309">
                <tr class="dark">
            <td><span class="label label-primary" for="input02">Nombre Servicio</span></td>
            
              <td><input class="input-xlarge" id="nombre_servicio" name="nombre_servicio" readonly="readonly"  type="text" value="<?PHP echo $nombre_servicio; ?>"></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
    
    
            <tr class="dark">
            <td><span class="label label-primary" for="input02">Nombre Tarea</span></td>
            
              <td><input class="input-xlarge" id="nombre_tarea" name="nombre_tarea"   type="text" onBlur="return validar(event);" value="<?PHP echo $nombre_tarea; ?>"></td>
              <td><span class="label label-primary">Precio Proveedor</span></td>
              <td><input class="input-xlarge" id="precio_unitario" name="precio_unitario"   type="text" onblur="return validar(event);" /></td>
            </tr>
  
  
              <tr class="dark">
            <td><span class="label label-primary" for="input02">Descripcion</span></td>
            
              <td><input class="input-xlarge" id="valor" name="valor"   type="text" onBlur="return validar(event);" value="<?PHP echo $valor; ?>"></td>
              <td><span class="label label-primary">Precio (por unidad)</span></td>
              <td><input class="input-xlarge" id="precio" name="precio"   type="text" onblur="return validar(event);" /></td>
              </tr>
        
             <tr class="dark">
            <td><span class="label label-primary" for="input02">Marca</span></td>
            
              <td><input class="input-xlarge" id="marca" name="marca"   type="text" onBlur="return validar(event);"></td>
              <td><span class="label label-primary">Cantidad</span></td>
              <td><input class="input-xlarge" id="cantidad" name="cantidad"   type="text" onblur="return validar(event);" /></td>
              </tr>
        
       <input class="input-xlarge"  id="fecha_ingreso" name="fecha_ingreso" type="hidden" readonly="readonly" value="<?php echo date("Y-m-d")?>">
       <input class="input-xlarge"  id="fecha_termino" name="fecha_termino" type="hidden" readonly="readonly" value="<?php echo date("Y-m-d")?>">   	   <input class="input-xlarge"  id="descuento" name="descuento" type="hidden"     readonly="readonly" value="0">
       <input class="input-xlarge"  id="valor_total" name="valor_total" type="hidden" readonly="readonly" value="0">
         
              <tr class="dark">
            <td>&nbsp;</td>
            
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr> 	          
	              <tr class="dark">
            <td>&nbsp;</td>
            
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr> 		  

		</table>

          
		  		   <div class="control-group">
  		    <tbody>
	      <div class="form-actions">
            <button type="submit" class="btn btn-primary">Ingresar</button>
            <button type="reset" class="btn">Cancelar</button>
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