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
<link type="text/css" href="../css/menu.css" rel="Stylesheet" /> <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
  <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />



<?PHP //jQuery ?>

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

<form class="form-horizontal well"   name="formulario" id="formulario" onClick="return validar(this);" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 110px;" action="ingresar_pagos.php" method="post"/>

        <fieldset>
		          <h2 style="color:white" >Ingresar Pago</h2>
		         
                  
				 <div align="left">
<p><span class="label label-primary">Necesita asociarlo al pedido de productos de un proveedor</span></p>
<p>&nbsp;</p>
<p>
				   <table width="200" border="0">
				   
</p>
				 <tr>
                   
				     <div align="left"><span class="label label-primary">Nombre Producto</span>
                       <select id="pago_proveedores_id" name="pago_proveedores_id">
                         
                        <?PHP						
						$result=mysql_query("select distinct pago_proveedores_id from pago_proveedores");
						$result3=mysql_query("select * from pago_proveedores where estado = 0");
						if (mysql_num_rows($result3)>0){
						while($row = mysql_fetch_array($result))
						{
							$result2 = mysql_query("select * from pago_proveedores, productos, proveedores where productos.proveedor_id = proveedores.proveedor_id
and pago_proveedores.producto_id = productos.producto_id and pago_proveedores.estado = 0 and pago_proveedores.pago_proveedores_id =".$row['pago_proveedores_id']."");
							while($row2 = mysql_fetch_array($result2))
							{
								$producto_id = $row['producto_id'];
							echo '<option value='.$row['pago_proveedores_id'].'>Producto: '.$row2['nombre_producto'].', Proveedor: '.$row2['nombre_proveedor'].', Cantidad:'.$row2['cantidad_producto'].'</option>';
							}
							
						}
					
						}
						else{
		echo "<script language='JavaScript'>";
		echo "alert('No Existen Pago a proveedores Pendientes');";
		echo "alert('Sera Redireccionado A Ingresar Servicios');";
		echo "location = '../ventas/listar_ventas.php'";
		echo "</script>";                
              }
           ?>
           </select> </div></tr></table>
          <div class="form-actions">
            <p>&nbsp;</p>
            <button type="submit" class="btn btn-primary">Ingresar</button>
            <button type="reset" class="btn">Cancelar</button>
          </div>
             </th></tr></fieldset></table>
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
