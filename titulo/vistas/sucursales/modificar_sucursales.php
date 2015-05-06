<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP 

$ruta = "../../";
$ruta_archivos= "../";
include ("../master_pages/headernuevo.php");
include("../../includes/default.php");
include ("../../modelos/sucursal.php");

$sucursal = new sucursal();

 ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>

<script type="text/javascript" src="../../js/validar.js"></script>
<script type="text/javascript" src="../../js/validarut.js"></script>


 
<?PHP //jQuery ?>

<script type="text/javascript">
                            
function validar(form) 
{ 

 var letra = form.rut.value;
   if ( letra == null || letra =="") 

   {
 	alert("Debe ingresar un RUT"); 
	form.rut.focus();
	return false; 	
	 
	
  }       


    var letra = form.nombre_sucursal.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un nombre de sucursal");
		form.nombre_sucursal.focus();
		return false;
	  }
	  
	  var letra = form.giro.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un giro");
		form.giro.focus();
		return false;
	  }
	  
	  
	  
      var letra = form.nombre_encargado.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un nombre encargado");
		form.nombre_encargado.focus();
		return false;
	  }
	  
	    var letra = form.email.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe Ingresar su mail");
		form.email.focus();
		return false;
	  }
	  else
	  {
	  
			var x=document.forms["form"]["email"].value;
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
			  {
			  alert("Email Invalido");
			  return false;
			  }

	  }
	  
	  
	  var letra = form.direccion_sucursal.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar una direccion sucursal");
		form.direccion_sucursal.focus();
		return false;
	  }
	  
    	  var letra = form.ciudad.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar una ciudad");
		form.ciudad.focus();
		return false;
	  }
	  
	  
	var letra = form.telefono.value;
	if (/^[0-9]+$/.test(letra)&&letra.length!=0)
		{
		}
	else
		{
			alert("Debe ingresar un telefono (solo numeros).");
			return false;
		}


   return Rut(document.form.rut.value);
  }
</script>
</head>

<body background="./../../../img/backgrounds/aqua.jpg"> 

	

<form class="form-horizontal well " method="post" action="sucursal_modificado.php" name="form" id="form" onSubmit="return validar(this);" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 110px;"/>
         <h2 style="color:white" >Modificar Sucursales</h2>
         
       <?PHP 
	   
	  
					$sucursal_id = $_GET['sucursal_id'];
					
					$result = mysql_query("select * from sucursales where sucursal_id = $sucursal_id");
									
					while($row = mysql_fetch_array($result))
					{
					  $sucursal_id                = $row['sucursal_id'];
					  $nombre_sucursal			             = $row['nombre_sucursal'];
					  $nombre_encargado 		             = $row['nombre_encargado'];
					  $direccion_sucursal             = $row['direccion_sucursal'];
					  $telefono                = $row['telefono'];
					  $ciudad                = $row['ciudad'];
					  $giro	             = $row['giro'];
					  $rut 		             = $row['rut'];
					  $email             = $row['email'];

					}
               
                ?>
<table>
            
              <input class="input-xlarge" id="sucursal_id" name="sucursal_id" readonly=""   type="hidden" onBlur="return validar(event);" value="<?PHP echo $sucursal_id; ?>" >


<tr class = 'dark'>
            <td><p><span class="label label-primary" for="input04">Rut</span></p></td>
            
              <td><input class="input-xlarge" id="rut" name="rut" type="text" readonly="readonly" onBlur="return validar(event);" value="<?PHP echo $rut; ?>" ></td>
              <td><span class="label label-primary" for="input04">Email</span></td>
              <td><input class="input-xlarge" id="email" name="email" type="text" onblur="return validar(event);" value="<?PHP echo $email; ?>" /></td>
  </tr> 
              



<tr class = 'dark'>
            <td><span class="label label-primary" for="input04">Nombre Sucursal</span></td>
            
              <td><input class="input-xlarge" id="nombre_sucursal" name="nombre_sucursal" type="text" onBlur="return validar(event);" value="<?PHP echo $nombre_sucursal; ?>" ></td>
              <td><span class="label label-primary" for="input04">Direccion</span></td>
              <td><input class="input-xlarge" id="direccion_sucursal" name="direccion_sucursal"  type="text" onblur="return validar(event);" value="<?PHP echo $direccion_sucursal; ?>" /></td>
              </tr> 

<tr class = 'dark'>
            <td><span class="label label-primary" for="input04">Giro</span></td>
            
              <td><input class="input-xlarge" id="giro" name="giro" type="text" onBlur="return validar(event);" value="<?PHP echo $giro; ?>" ></td>
              <td><span class="label label-primary" for="input04">Ciudad</span></td>
              <td><input class="input-xlarge" id="ciudad" name="ciudad"   type="text" onblur="return validar(event);" value="<?PHP echo $ciudad; ?>" /></td>
              </tr> 
              

              
                 <tr class = 'dark'>
            <td><span class="label label-primary" for="input04">Nombre Encargado</span></td>
            
              <td><input class="input-xlarge" id="nombre_encargado" name="nombre_encargado"  type="text" onBlur="return validar(event);" value="<?PHP echo $nombre_encargado; ?>" ></td>
              <td><span class="label label-primary" for="input04">Telefono</span></td>
              <td><input class="input-xlarge" id="telefono" name="telefono" type="text" onblur="return validar(event);" value="<?PHP echo $telefono; ?>" /></td>
                 </tr> 
              
              
                                                       <tr class = 'dark'>
            <td class = 'dark'>&nbsp;</td>
            
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>   
    
              
              
      </table>
			 
			 		  
         
         <div class="form-actions">
           <button type="submit" class="btn btn-primary">Modificar</button>
            <button type="reset" class="btn" onclick = "javascript:window.location='listar_sucursales.php'">Cancelar</button>
          </div>
        
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