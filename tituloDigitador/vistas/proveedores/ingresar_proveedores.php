<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?PHP 

$ruta = "../../";
        $ruta_archivos= "../";

include ('../master_pages/headernuevo.php'); 
include ('../../modelos/proveedor.php');
	  
	  $proveedor = new proveedor()
	  
	  ?>
	  <head>
<script type="text/javascript" src="../../js/validar.js"></script>
<script type="text/javascript" src="../../js/validarut.js"></script>


<?PHP //jQuery ?>

<script type="text/javascript">
                            
function validar(form) 
{ 
 var letra = form.rut_proveedor.value;
   if ( letra == null || letra =="") 

   {
 	alert("Debe ingresar un RUT"); 
	form.rut_proveedor.focus();
	return false; 	
	
  }
  
    var letra = form.nombre_proveedor.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe Ingresar Un Nombre");
		form.nombre_proveedor.focus();
		return false;
	  }
    var letra = form.direccion_proveedor.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe Ingresar Una Direccion");
		form.direccion_proveedor.focus();
		return false;
	  }
    
	var letra = form.email_proveedor.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe Ingresar Su Email");
		form.email_proveedor.focus();
		return false;
	  }
	  else
	  {
	  
			var x=document.forms["form"]["email_proveedor"].value;
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
			  {
			  alert("Email Invalido");
			  return false;
			  }

	  }

	var letra = form.telefono_proveedor.value;
	if (/^[0-9]+$/.test(letra)&&letra.length!=0)
		{
		}
	else
		{
			alert("Debe ingresar el telefono (solo numeros).");
			return false;
		}

	var letra = form.celular_proveedor.value;
	if (/^[0-9]+$/.test(letra)&&letra.length!=0)
		{
		}
	else
		{
			alert("Debe ingresar el celular (solo numeros).");
			return false;
		}



    
return Rut2(form.rut_proveedor.value);
  	 
   
   
  

  }
</script>
</head>
<body background="./../../../img/backgrounds/aqua.jpg">  

<form class="form-horizontal well" method="post" action="proveedor_ingresado.php" name="form" id="form" onSubmit="return validar(this);" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 110px;">
  <fieldset>
   
 <table border="0" >        
                  <h2 style="color:white;">Ingresar Proveedor</h2>
                       <tr class="dark">
            <td><span class="label label-primary" for="input04">Rut </span></td>
            
              <td><input class="input-xlarge" id="rut_proveedor" name="rut_proveedor"   type="text" onBlur="return validar(event);"></td>
              <td><span class="label label-primary" for="input03">Email</span></td>
              <td><input class="input-xlarge" id="email_proveedor" name="email_proveedor"   type="text" onblur="return validar(event);" /></td>
                       </tr> 
            
           
            <tr class="dark">
            <td><span class="label label-primary" for="input01">Nombre </span></td>
            
              <td><input class="input-xlarge" id="nombre_proveedor" name="nombre_proveedor"   type="text" onBlur="return validar(event);"></td>
              <td><span class="label label-primary" for="input05">Telefono</span></td>
              <td><input class="input-xlarge" id="telefono_proveedor" name="telefono_proveedor"   type="text" onblur="return validar(event);" /></td>
      </tr>        
            
            <tr class="dark">
            <td><span class="label label-primary" for="input02">Direccion </span></td>
            
              <td><input class="input-xlarge" id="direccion_proveedor" name="direccion_proveedor"   type="text" onBlur="return validar(event);"></td>
              <td><span class="label label-primary" for="input05">Celular</span></td>
              <td><input class="input-xlarge" id="celular_proveedor" name="celular_proveedor"   type="text" onblur="return validar(event);" /></td>
      </tr>         
         

    
          <td height="13"><div class="form-actions">
       
       <p>&nbsp;</p> <tr>  
            <td><button type="submit" class="btn btn-primary">Ingresar</button></td>
            <td><button type="reset" class="btn" onclick = "javascript:window.location='listar_proveedores.php'" >Cancelar</button></td>
    </tr></tr>
    </table></fieldset></div>

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