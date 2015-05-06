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
 <link href="<?php echo $ruta; ?>bootstrap/css/tables.css" rel="stylesheet" type="text/css" />
      <link  rel="stylesheet" href="../../css3/ui-lightness/jquery-ui-1.8.20.custom.css" >
  <script src="../../css3/jquery-1.7.2.min.js"></script>
  <script src="../../css3/jquery-ui-1.8.20.custom.min.js"></script>


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

<form class="form-horizontal well" method="post" action="ingresar_ventas.php" name="formulario" id="formulario" onClick="return validar(this);" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 98px;"/>

        <fieldset>
		          <h2 style="color:white">Para ingresar una venta, necesita asociarlo a un servicio</h2>
        	   <table width="200" border="0">
                 <tr>
                   
				     <div align="left"><span class="label label-primary">Nombre servicio</span>
                       <select id="servicio_id" name="servicio_id">
                        <?PHP						
						$result=mysql_query("select distinct servicio_id from servicios");
						$result3=mysql_query("select * from servicios where estado_servicio = 1");
						if (mysql_num_rows($result3)>0){
						while($row = mysql_fetch_array($result))
						{
							$result2 = mysql_query("select * from servicios where estado_servicio = 1 and servicio_id = ".$row['servicio_id']."");
							
							
							while($row2 = mysql_fetch_array($result2))
							{
								echo '<option value='.$row['servicio_id'].'>'.$row2['nombre_servicio'].'</option>';
							}
							
						}
						}
						else{
		echo "<script language='JavaScript'>";
		echo "alert('No Existen Servicios Pendientes');";
		echo "alert('Sera Redireccionado A Ingresar Servicios');";
		echo "location = '../servicios/ingresar_servicios1.php'";
		echo "</script>";                
              }
          
			
           
           ?>
           </select> 
          <div class="form-actions">
          <p>&nbsp;</p>
            <button type="submit" class="btn btn-primary">Ingresar</button>
            <button type="reset" class="btn" onclick = "javascript:window.location='listar_ventas.php'">Cancelar</button>
          </div>
             </th></tr></table>
        	   
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
