<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP 

$ruta = "../../";
$ruta_archivos= "../";
include ("../master_pages/headernuevo.php");
include ("../../includes/default.php");
//include ("../../includes/database.php");
include ("../../modelos/cliente.php");




$cliente = new cliente();

 ?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>


<script type="text/javascript" src="../../js/validar.js"></script>
<script type="text/javascript" src="../../js/validarut.js"></script>

<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.min.js"></script>

<?PHP //jQuery ?>

<script type="text/javascript">
function Validar( formulario ) 
{


 var letra = formulario.rut.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar su RUT");
	formulario.rut.focus();
  	return false;
  }
  
  var letra = formulario.nombre_empresa.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un nombre de empresa");
		formulario.nombre_empresa.focus();
		return false;
	  }
	  
	var letra = formulario.razon_social.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar una razon social");
		formulario.razon_social.focus();
		return false;
	  }
	  
	var letra = formulario.giro.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar una giro");
		formulario.giro.focus();
		return false;
	  }
	  
	var letra = formulario.representante_legal.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un representante legal");
		formulario.representante_legal.focus();
		return false;
	  }
  
  
   var letra = formulario.direccion.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar una direccion");
	formulario.direccion.focus();
  	return false;
	
  }


	var letra = formulario.comuna.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar una comuna");
		formulario.comuna.focus();
		return false;
	  }


	var letra = formulario.ciudad.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar una ciudad");
		formulario.ciudad.focus();
		return false;
	  }
	  
	  
	  var letra = formulario.email.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe Ingresar su mail");
		formulario.email.focus();
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
	  var letra = formulario.banco.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un banco");
		formulario.banco.focus();
		return false;
	  }
	
	return Rut(document.form.rut.value);
    
}



</script>
</head>

<body background="./../../../img/backgrounds/aqua.jpg">    

<form onsubmit="return Validar(this);" name="form" method="post" class="form-horizontal well" action="cliente_ingresadoJuridico.php" style="border-right-width: 100px; margin-left: 0px; border-left-width: 100px; border-top-width: 110px; height: 100%;" >
    
  <fieldset>
       <h2 style="color:white;">Ingresar Clientes Juridico</h2>
</p>
<table>        
                      <tr class="dark">
             
            <td width="137"><span class="label label-primary" for="input01">Rut</span></td>
            <td width="170"><input class="input-xlarge" id="rut" name="rut"   type="text"  onblur="return validar(event);" /></td>
            <td width="80"><span class="label label-primary">Comuna</span></td>
            <td width="158"><input class="input-xlarge" id="comuna" name="comuna"   type="text"  onblur="return validar(event);" /></td>
            <td width="90">   <button type="submit" class="btn btn-primary">Ingresar</button></td>
              </tr>     
                      <tr class="dark">
             
            <td><span class="label label-primary" for="input01">Noombre Empresa</span></td>
            <td width="170"><input class="input-xlarge" id="nombre_empresa" name="nombre_empresa"   type="text"  onblur="return validar(event);" /></td>
            <td width="80"><span class="label label-primary">Ciudad</span></td>
            <td width="158"><input class="input-xlarge" id="ciudad" name="ciudad"   type="text"  onblur="return validar(event);" /></td>
            <td width="90">&nbsp;</td>
              </tr>                 
                          <tr class="dark">
             
            <td><span class="label label-primary" for="input01">Razon Social</span></td>
            <td width="170"><input class="input-xlarge" id="razon_social" name="razon_social"   type="text"  onblur="return validar(event);" /></td>
            <td width="80"><span class="label label-primary">Telefono</span></td>
            <td width="158"><input class="input-xlarge" id="telefono" name="telefono"   type="text"  onblur="return validar(event);" /></td>
            <td width="90">&nbsp;</td>
              </tr>  
                          <tr class="dark">
             
            <td><span class="label label-primary" for="input01">Giro</span></td>
            <td width="170"><input class="input-xlarge" id="giro" name="giro"   type="text"  onblur="return validar(event);" /></td>
            <td width="80"><span class="label label-primary">Celular</span></td>
            <td width="158"><input class="input-xlarge" id="celular" name="celular"   type="text"  onblur="return validar(event);" /></td>
            <td width="90"> <button type="reset" onclick = "javascript:window.location='listar_clientesJuridico.php'" class="btn">Cancelar</button>;</td>
              </tr>  
 
                           <tr class="dark">
             
            <td><span class="label label-primary" for="input01">Representante Legal</span></td>
            <td width="170"><input class="input-xlarge" id="representante_legal" name="representante_legal"   type="text"  onblur="return validar(event);" /></td>
            <td width="80"><span class="label label-primary">Email</span></td>
            <td width="158"><input class="input-xlarge" id="email" name="email"   type="text"  onblur="return validar(event);" /></td>
            <td width="90">&nbsp;</td>
              </tr>               
              
        
                     <tr class="dark">
             
            <td><span class="label label-primary" for="input01">Direccion</span></td>
            <td><input class="input-xlarge" id="direccion" name="direccion"   type="text"  onblur="return validar(event);" /></td>
            <td><span class="label label-primary">Banco</span></td>
            <td><input class="input-xlarge" id="banco" name="banco"   type="text"  onblur="return validar(event);" /></td>
            <td>&nbsp;</td>
              </tr> 

                      <tr class="dark">
             
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            
              <td>&nbsp;</td>
              </tr>  

    
         
         <input type="hidden" name="fecha_creacion" id="fecha_creacion" value="<?php echo date("y/m/d");
?>"  />
	    <input type="hidden" name="fecha_modificacion" id="fecha_modificacion" value="<?php echo date("y/m/d");
?>" />
	  </p>


          	   </table>
		
       
</table>
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