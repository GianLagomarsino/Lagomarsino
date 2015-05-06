<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?PHP 

$ruta = "../../";
        $ruta_archivos= "../";
include ('../master_pages/header.php');
         include('../../includes/default.php');
		include ('../../modelos/servicio.php');
		include ('../../modelos/cliente.php');
		include ('../../modelos/sucursal.php');	  
		include ('../../modelos/trabajador.php');
		include ('../../modelos/producto.php');
			 	 
      $servicio = new servicio();
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
<body>  
 
<form class="form-horizontal well" name="form" id="form" onSubmit="return validar(this);" method="post" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 98px;" action="producto_restado.php?servicios_as_productos_id=".$servicios_as_productos_id."">
       
		
		<?PHP 
	   
	  				$servicios_as_productos_id = $_GET['servicios_as_productos_id'];
					//$producto_id = $_GET['producto_id'];
					//$servicio_id = $_GET['servicio_id'];
					//$producto_id
					$result = mysql_query("SELECT * 
FROM servicios, productos, servicios_as_productos
WHERE servicios.servicio_id =servicios_as_productos.servicio_id
and productos.producto_id = servicios_as_productos.producto_id 
and servicios_as_productos.servicios_as_productos_id =$servicios_as_productos_id ");
									
					while($row = mysql_fetch_array($result))
					{
						
						$servicios_as_productos_id 	  = $row['servicios_as_productos_id'];
						$producto_id 	  = $row['producto_id'];
						$servicio_id 	  = $row['servicio_id'];
						$nombre_producto  = $row['nombre_producto'];
						$nombre_servicio  = $row['nombre_servicio'];
						$descripcion 	  = $row['descripcion'];
						$marca	  = $row['marca'];
						$fecha_ingreso			  = $row['fecha_ingreso'];
						$precio = $row ['precio'];
						$cantidad 	  = $row ['cantidad'];
						$cantidad_servicio 	  = $row ['cantidad_servicio'];
						$valor_total = $row['valor_total'];
						$cantidad_servicio 	  = $row ['cantidad_servicio'];
						$valor_servicio = $row['valor_servicio'];
						//$nombre_sucursal  = $row ['nombre_sucursal'];
					}
               
                ?>
	
        <fieldset>
          <h2>Asignar Repuestos A Un Servicio</h2>
          <div class="control-group">

		              
            <div class="controls" hidden>
             <input class="input-xlarge" id="servicios_as_productos_id"  name="servicios_as_productos_id" type="text" value="<?PHP echo $servicios_as_productos_id; ?>">
             <input class="input-xlarge" id="producto_id"  name="producto_id" type="text" value="<?PHP echo $producto_id; ?>">
			 <input class="input-xlarge" id="servicio_id"  name="servicio_id" type="text" value="<?PHP echo $servicio_id; ?>"> 
              
            </div>
			    <div class="control-group">
		  <label class="control-label" for="input01">Nombre Servicio</label>
            <div class="controls">
              <input class="input-xlarge" id="nombre_servicio" readonly="readonly" name="nombre_servicio" type="text" value="<?PHP echo $nombre_servicio; ?>">
			  
              
            </div>
          </div>
		  
			    <div class="control-group">
		  <label class="control-label" for="input01">Nombre Producto</label>
            <div class="controls">
              <input class="input-xlarge" id="nombre_producto" readonly="readonly" name="nombre_producto" type="text" value="<?PHP echo $nombre_producto; ?>">
			  
              
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="input3">Descripcion</label>
            <div class="controls">
              <input class="input-xlarge" id="descripcion" name="descripcion" readonly="readonly" type="text" value="<?PHP echo $descripcion; ?>">
 </div> 
  </div> 
           
                     <div class="control-group">
            <label class="control-label" for="input3">Marca</label>
            <div class="controls">
              <input class="input-xlarge" id="marca" name="marca" readonly="readonly" type="text" value="<?PHP echo $marca; ?>">
            </div> 
             </div> 

                      <div class="control-group">
            <label class="control-label" for="input3">Fecha Ingreso</label>
            <div class="controls">
              <input class="input-xlarge" id="fecha_ingreso" name="fecha_ingreso" readonly="readonly" type="text" value="<?PHP echo $fecha_ingreso; ?>">
            </div> 
            </div>
                      <div class="control-group">
            <label class="control-label" for="input3">Precio</label>
            <div class="controls">
              <input class="input-xlarge" id="precio" name="precio" readonly="readonly" type="text" value="<?PHP echo $precio; ?>">
            </div> 
            </div>
                       <div class="control-group">
            <label class="control-label" for="input3">Cantidad total</label>
            <div class="controls">
              <input class="input-xlarge" id="cantidadtotal" name="cantidadtotal" readonly="readonly" type="text" value="<?PHP echo $cantidad; ?>">
            </div> 
            </div>

                      <div class="control-group">
            <label class="control-label" for="input3">Cantidad de repuestos</label>
            <div class="controls">
              <input class="input-xlarge" id="cantidad_servicio" name="cantidad_servicio" type="text" >
            </div> 
            </div>
 <div class="control-group" >
   <div class="controls"></div>
        </div>
  
  </td>
  
  
   </div> 
             </div> 


           
        </select>	  

 <div class="control-group" >
   <div class="controls"></div>
        </div>
  
  </td>
          
           
           
                    
           
           
           
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Asignar</button>
            <button type="reset" class="btn">Cancelar</button>
          </div>
        </fieldset>
</form>
</body>

</html>