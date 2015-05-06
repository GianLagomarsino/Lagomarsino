<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?PHP 

$ruta = "../../";
        $ruta_archivos= "../";
include ('../master_pages/headernuevo.php');
         include('../../includes/default.php');
		//include ('../../modelos/servicio.php');
		//include ('../../modelos/cliente.php');
		//include ('../../modelos/sucursal.php');	  
		//include ('../../modelos/trabajador.php');
		include ('../../modelos/producto.php');
			 	 
    //  $servicio = new servicio();
	//  $cliente = new cliente(); 
	//  $sucursal = new sucursal(); 
	 // $trabajador = new trabajador();
	  $producto = new producto(); 
	  
	  ?><?PHP //jQuery ?>

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
	  
	  </script></head>
<body background="./../../../img/backgrounds/aqua.jpg">   
 
<form class="form-horizontal well" name="form" id="form" onSubmit="return validar(this);" method="post" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 98px;" action="producto_agregado_serv.php?producto_id=".$producto_id."">
       
		
		<?PHP 
	   
	  
					$servicios_as_productos_id = $_GET['servicios_as_productos_id'];
					
					$result = mysql_query("select * from productos, servicios, servicios_as_productos
where productos.producto_id = servicios_as_productos.producto_id
and servicios.servicio_id = servicios_as_productos.servicio_id 
and servicios_as_productos.servicios_as_productos_id = $servicios_as_productos_id");
									
					while($row = mysql_fetch_array($result))
					{
						$servicios_as_productos_id 	  = $row['servicios_as_productos_id'];
						$producto_id 	  = $row['producto_id'];
						$servicio_id 	  = $row['servicio_id'];
						$nombre_producto  = $row['nombre_producto'];
						$descripcion 	  = $row['descripcion'];
						$marca	  = $row['marca'];
						$fecha_ingreso			  = $row['fecha_ingreso'];
						$precio_unitario = $row['precio_unitario'];
						$precio = $row ['precio'];
						$cantidad 	  = $row ['cantidad'];
						$cantidad_servicio = $row['cantidad_servicio'];
						$valor_servicio = $row['valor_servicio'];
						//$nombre_sucursal  = $row ['nombre_sucursal'];
					}
               
                ?>
	
        <fieldset>
          <h2 style="color:white;">Asignar Repuestos A Un Servicio</h2>
           
          <div class="control-group">

		              
            <div class="controls" hidden>
              <input class="input-xlarge" id="producto_id"  name="producto_id" type="text" value="<?PHP echo $producto_id; ?>">
              <input class="input-xlarge" id="servicio_id"  name="servicio_id" type="text" value="<?PHP echo $servicio_id; ?>">
			  <input class="input-xlarge" id="servicios_as_productos_id"  name="servicios_as_productos_id" type="text" value="<?PHP echo $servicios_as_productos_id; ?>">
              
            </div>
<table>
		  
            <tr>
            <td><span class="label label-primary" for="input02">Nombre Producto</span></td>
            
              <td><input class="input-xlarge" id="nombre_producto" name="nombre_producto" readonly="readonly"  type="text" onBlur="return validar(event);"value="<?PHP echo $nombre_producto; ?>"></td>
              </tr>
 <tr>
            <td><span class="label label-primary" for="input02">Descripcion</span></td>
            
              <td><input class="input-xlarge" id="descripcion" name="descripcion"   type="text" readonly="readonly" onBlur="return validar(event);"value="<?PHP echo $descripcion; ?>"></td>
              </tr>			  
              
  <tr>
            <td><span class="label label-primary" for="input02">Marca</span></td>
            
              <td><input class="input-xlarge" id="marca" name="marca"   type="text" readonly="readonly" onBlur="return validar(event);"value="<?PHP echo $marca; ?>"></td>
              </tr>
              
              <tr>
            <td><span class="label label-primary" for="input02">Fecha Ingreso</span></td>
            
              <td><input class="input-xlarge" id="fecha_ingreso" name="fecha_ingreso"   type="text" readonly="readonly" onBlur="return validar(event);"value="<?PHP echo $fecha_ingreso; ?>"></td>
              </tr>
              
 <tr>
            <td><span class="label label-primary" for="input02">Precio</span></td>
            
              <td><input class="input-xlarge" id="precio" name="precio"   type="text" readonly="readonly" onBlur="return validar(event);"value="<?PHP echo $precio; ?>"></td>
              </tr>

           

            <tr>
            <td><span class="label label-primary" for="input02">Cantidad total</span></td>
            
              <td><input class="input-xlarge" id="cantidad" name="cantidad" readonly="readonly"   type="text" onBlur="return validar(event);"value="<?PHP echo $cantidad; ?>"></td>
              </tr>  

            <tr>
            <td><span class="label label-primary" for="input02">Cantidad de repuestos</span></td>
            
              <td><input class="input-xlarge" id="cantidad_servicio" name="cantidad_servicio"   type="text" onBlur="return validar(event);"></td>
              </tr>                     
         
                      </table>
           
           
           
          <p>&nbsp;</p>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Asignar</button>
            <button type="reset" class="btn">Cancelar</button>
          </div>
        </fieldset>
</form> <!-- starts footer -->
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