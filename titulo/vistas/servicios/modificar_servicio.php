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
      $servicio = new servicio();
	  $cliente = new cliente(); 
	  $sucursal = new sucursal(); 
	  $trabajador = new trabajador(); 
	  
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
 
<form class="form-horizontal well" name="form" id="form" onSubmit="return validar(this);" method="post" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 98px;" action="servicio_modificado.php?servicio_id=".$servicio_id."">
       
		
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
						$fecha_creacion = $row['fecha_creacion'];
						$descripcion 	  = $row['descripcion'];
						$trabajador_id	  = $row['trabajador_id'];
						$nombre			  = $row['nombre'];
						$apellido_paterno = $row ['apellido_paterno'];
						$sucursal_id 	  = $row ['sucursal_id'];
						$nombre_sucursal  = $row ['nombre_sucursal'];
						$cliente_id  	  =	$row ['cliente_id'];
					}
               
                ?>
	
  
          <h2 style="color:white;">Modificar Servicios</h2>
         
          <table width="200" border="0">
                
                <tr class="dark">
                 
            <td><span class="label label-primary" for="input01">Nombre Servicio</span></td>
            
             <td> <input class="input-xlarge" id="nombre_servicio" name="nombre_servicio"   type="text" onBlur="return validar(event);"value="<?PHP echo $nombre_servicio; ?>"></td>
              
              </tr>

         
          <tr class="dark"> 
            <td><span class="label label-primary" for="input03">Descripcion</span></td>
            
              <td>	<input class="input-xlarge" id="descripcion" name="descripcion"   type="text" onBlur="return validar(event);" value="<?PHP echo $descripcion; ?>">
              </td> </tr>  	
              
              
                  <tr class="dark"> 
            <td><span class="label label-primary" for="input03">Fecha Creacion</span></td>
            
              <td>	<input class="input-xlarge" id="fecha_creacion" name="fecha_creacion"  readonly="readonly"  type="text" onBlur="return validar(event);" value="<?PHP echo $fecha_creacion; ?>">
              </td> </tr>  
              
              
              <input class="input-xlarge" id="servicio_id" name="servicio_id" type="hidden" value="<?PHP echo $servicio_id; ?>">
			 <input class="input-xlarge" id="estado_servicio" name="estado_servicio" type="hidden" value="<?PHP echo $estado_servicio; ?>">
             <input class="input-xlarge" id="fecha_modificacion" name="fecha_modificacion" type="hidden" value="<?PHP echo date('y/m/d'); ?>">
             
             <tr class="dark">
 <td><span class="label label-primary" for="input04">Nombre sucursal</span></td>
                       <td><select value"<?PHP echo $sucursal_id; ?>" id="sucursal_id" name="sucursal_id">
                           <option value="<?PHP echo $sucursal_id; ?>."><?PHP echo $nombre_sucursal; ?> 
                         <?PHP						
						
								$result=mysql_query("select distinct sucursal_id from sucursales");

						while($row = mysql_fetch_array($result))
						{
							$result2 = mysql_query("select nombre_sucursal,sucursal_id from sucursales where sucursal_id = ".$row['sucursal_id']."");
							while($row2 = mysql_fetch_array($result2))
							{
								echo '<option value='.$row['sucursal_id'].'>'.$row2['nombre_sucursal'].'</option>';
							}
							
						}
           
        
           ?></option> </select> </td></tr>

              
    <tr class="dark">
 <td><span class="label label-primary" for="input04">Trabajador</span></td>
                       <td><select id="trabajador_id" name="trabajador_id">
                         <option value="<?PHP echo $trabajador_id; ?>."><?PHP echo $nombre; ?>  
                         <?PHP						
						
								$result=mysql_query("select distinct trabajador_id from trabajadores");

						while($row = mysql_fetch_array($result))
						{
							$result2 = mysql_query("select * from trabajadores where trabajador_id = ".$row['trabajador_id']."");
							while($row2 = mysql_fetch_array($result2))
							{
								echo '<option value='.$row['trabajador_id'].'>'.$row2['nombre'].' '.$row2['apellido_paterno'].'</option>';
							}
							
						}
           
        
           ?> </option> </select></td></tr>
    
   


  
  
  
           
           
           
           
           
           
           
           
           
            <div class="form-actions">
         
            <tr>
             
            <td><button type="submit" class="btn btn-primary">Asignar</button></td>
            <td><button type="reset" class="btn"  value=Atr&aacute;s onclick="history.go(-1)">Cancelar</button></td>
			
          </tr>
          </div>
</table></form>
 
 
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