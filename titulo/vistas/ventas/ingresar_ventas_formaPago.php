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

<form class="form-horizontal well" method="post" name="formulario" id="formulario" onClick="return validar(this);" style="border-right-width: 100px; margin-left: 0px; border-left-width: 100px; border-top-width: 110px;"/>

        <fieldset>
		          <h2 style="color:white">Para ingresar una venta, Indique la forma de pago</h2>
		          <p style="color:white">&nbsp;</p>
        	   <table width="200" border="0">
                 <tr>
                   
				     <div align="left"><span class="label label-primary">Forma Pago</span>
                        <select name="tipo_cliente" id="tipo_cliente" onchange="url(this.value);">
                        <option value="0">Seleccionar Forma De Pago</option>
                        <option value="../ventas/ingresar_ventas1.php">Efectivo</option>
                        <option value="../ventas/ingresar_ventas2.php">Cheque</option>
           </select></div>
					  <p style="color:white">&nbsp;</p>
           
             </tr></table></fieldset>
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
