<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?PHP
$ruta = "../../";
        $ruta_archivos= "../";
		include ('../master_pages/headernuevo.php'); 
		include ('../../includes/default.php');
		include ('../../modelos/servicio.php');
		include ('../../modelos/venta.php');
		
		
	  
	  $servicio = new servicio();
	  $venta = new venta();
	  
	  ?><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>


<?PHP //jQuery ?>

<script language="javascript">
function url(uri) {
location.href = uri;  }
</script>
<script type="text/javascript">
                            

function Validar( formulario ) 
{

 var letra = formulario.clientes.value;
  if (letra!="Seleccione..")
	{
	}
	else
	{
		alert("Debe seleccionar un servicio");
		return false;
	}	
 
  }	  
	  
	  </script>
	  
	  </head>
<body background="./../../../img/backgrounds/aqua.jpg">  

<form id="form" class="form-horizontal well" method="post" name="formulario" id="formulario" onClick="return validar(this);" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 110px;"/>
<?PHP 
	   
	  
					$servicio_id = $_GET['servicio_id'];
					$servicio_id;
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
                
                
                
        <fieldset>
		          <h2 style="color:white;">Para ingresar una venta, Indique la forma de pago</h2>
        	   <table width="200" border="0">
                 <tr>
                   
				     <div align="left"><span class="label label-primary">Forma Pago</span>
                        <select name="tipo_cliente" id="tipo_cliente" onchange="url(this.value);">
                        <option value="0">Seleccionar Forma De Pago</option>
                        <option name="servicio_id" value="ingresar_ventas.php?servicio_id=<?php echo $servicio_id; ?>">Efectivo</option>
                        <option value="ingresar_ventas2.php?servicio_id=<?php echo $servicio_id; ?>">Cheque</option>
           </select>
					
           
             </tr></table></fieldset>
			 <br/>
			 
			 <td><button type="reset" class="btn"  value=Atr&aacute;s onclick="history.go(-1)">Cancelar</button></td>
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
