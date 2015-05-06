<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<?PHP 
$ruta = "../../";
$ruta_archivos= "../";

	include ('../master_pages/headernuevo.php');
	include ('../../includes/default.php');
	  include ('../../modelos/producto.php');
	  include ('../../modelos/servicio.php');
	  
	  $producto = new producto();
	  $servicio = new servicio();
	  ?>
	  <head>

	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>
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
		alert("Debe ingresar estado del servicio");
		form.marca.focus();
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
	
	
  }	  
	  
	  </script>
	  
	  </head>
<body background="./../../../img/backgrounds/aqua.jpg"> 

<form class="form-horizontal well" name="form" id="form" method="post" action="producto_modificado.php" onSubmit="return validar(this);" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 98px;">

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
          <h2 style="color:white">Modificar Producto</h2>
          <div class="control-group">

		              
            <div class="controls" hidden>
              <input class="input-xlarge" id="producto_id"  name="producto_id" type="text" value="<?PHP echo $producto_id; ?>">
			  <input class="input-xlarge" id="descuento"  name="descuento" type="text" value="<?PHP echo $descuento; ?>">
              <input class="input-xlarge" id="valor_servicio" name="valor_servicio" type="text" value="0">
              <input class="input-xlarge" id="fecha_ingreso" name="fecha_ingreso" readonly="readonly" type="text" value="<?PHP echo $fecha_ingreso; ?>">
            </div>

<table>

    
            <tr class="dark">
            <td><span class="label label-primary" for="input02">Nombre Producto</span></td>
            
              <td><input class="input-xlarge" id="nombre_producto" name="nombre_producto"   type="text" onBlur="return validar(event);"value="<?PHP echo $nombre_producto; ?>"></td>
              <td><span class="label label-primary" for="input02">Precio</span></td>
              <td><input class="input-xlarge" id="precio" name="precio"   type="text" onblur="return validar(event);"value="<?PHP echo $precio; ?>" /></td>
              </tr>
            <tr class="dark">
            <td><span class="label label-primary" for="input02">Descripcion</span></td>
            
              <td><input class="input-xlarge" id="descripcion" name="descripcion"   type="text" onBlur="return validar(event);"value="<?PHP echo $descripcion; ?>"></td>
              <td><span class="label label-primary">Cantidad total</span></td>
              <td><input class="input-xlarge" id="cantidad" name="cantidad"   type="text" onblur="return validar(event);"value="<?PHP echo $cantidad; ?>" /></td>
              </tr>
            <tr class="dark">
            <td><span class="label label-primary" for="input02">Marca</span></td>
            
              <td><input class="input-xlarge" id="marca" name="marca"   type="text" onBlur="return validar(event);"value="<?PHP echo $marca; ?>"></td>
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