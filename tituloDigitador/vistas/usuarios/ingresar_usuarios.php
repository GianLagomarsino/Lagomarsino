<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP 

$ruta = "../../";
$ruta_archivos= "../";
include ("../master_pages/headernuevo.php");
include ("../../includes/default.php");
//include ("../../includes/database.php");
//include ("../../modelos/usuario.php");




$usuario = new usuario();

 ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>
>



<script type="text/javascript" src="../../js/validar.js"></script>
<script type="text/javascript" src="../../js/validarut.js"></script>

<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.min.js"></script>
 
<?PHP //jQuery ?>

<script type="text/javascript">
                            
function validar(form) 
{ 
         var letra = form.rut.value;
   if ( letra == null || letra =="") 

   {
 	alert("Debe ingresar su RUT"); 
	form.rut.focus();
	return false; 	
	 
	
  }
	
 var letra = form.nombre.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un nombre");
		form.nombre.focus();
		return false;
	  }
	   var letra = form.apellido_paterno.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un apellido paterno");
		form.apellido_paterno.focus();
		return false;
	  }
	  
	  	   var letra = form.apellido_materno.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un apellido materno");
		form.apellido_materno.focus();
		return false;
	  }   
  
var letra = form.telefono_usuario.value;
	if (/^[0-9]+$/.test(letra)&&letra.length!=0)
		{
		}
	else
		{
			alert("Debe ingresar el telefono (solo numeros).");
			return false;
		}
	var letra = form.celular_usuario.value;
	if (/^[0-9]+$/.test(letra)&&letra.length!=0)
		{
		}
	else
		{
			alert("Debe ingresar el Celular(solo numeros).");
			return false;
		}
	
             var letra = form.direccion.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar una direccion");
		form.direccion.focus();
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
			  form.email.focus();
			  return false;
			  }

	  }


	  
           var letra = form.login.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar login");
		form.login.focus();
		return false;
	  }  
		 var letra = form.password.value;
		  if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un password");
		form.password.focus();
		return false;
	  }        
           var letra = form.password2.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar confirmar passowrd");
		form.password2.focus();
		return false;
	  } 

	p1 = form.password.value;
	p2 = form.password2.value;
	
	if(p1 != p2)
	{
		alert("Las passwords son distintas, deben ser iguales");
		form.password.focus();
		return false;
	}
    
	return Rut(document.form.rut.value);
  }	  
	  
	  </script>
</head>

<body background="./../../../img/backgrounds/aqua.jpg"> 

         <form action="usuario_ingresado.php" class="form-horizontal well" method="post" name="form" id="form" onsubmit="return validar(this);" style="border-right-width: 100px; margin-left: 0px; margin-top: 0px; border-left-width: 100px; border-top-width: 110px;" >
     <fieldset>

  <h2 style="color:white">Ingresar Usuario</h2>

 <table class="light">        
                      
             <tr class="dark">
            <td><span class="label label-primary" for="input01">Rut</span></td>
            
              <td  width="184"><input class="form-control input-sm" id="rut" name="rut"   type="text" onBlur="return validar(event);"></td>
              <td><span class="label label-primary" for="input01">Direccion</span></td>
              <td><input class="form-control input-sm" id="direccion" name="direccion"   type="text" onblur="return validar(event);" /></td>
              </tr>     
            <tr class="dark">
            <td><span class="label label-primary" for="input01">Nombre</span></td>
              </td>
            

            
              <td>
                <input class="form-control input-sm" id="nombre" name="nombre" type="text" onblur="return validar(event);" /></td>
              <td><span class="label label-primary" for="input01">Email</span></td>
              <td><input class="form-control input-sm" id="email" name="email"   type="text" onblur="return validar(event);" /></td>
      </tr>                      

<tr class="dark">
            <td><span class="label label-primary" for="input01">Apellido Paterno</span></td>
            
              <td><input class="form-control input-sm" id="apellido_paterno" name="apellido_paterno"   type="text" onblur="return validar(event);" /></td>
              <td><span class="label label-primary" for="input01">Login</span></td>
              <td><input class="form-control input-sm" id="login" name="login"   type="text" onblur="return validar(event);" /></td>
      </tr>     
            <tr class="dark">
            
            
                                     <td><span class="label label-primary" for="input01">Apellido Materno</span></td>
            
              <td><input class="form-control input-sm" id="apellido_materno" name="apellido_materno"   type="text" onblur="return validar(event);" /></td>
              <td><span class="label label-primary" for="input01">Password</span></td>
              <td><input name="password" type="password" class="form-control input-sm" id="password" onblur="return validar(event);" value="" /></td>
              </tr>     
         
            <tr class="dark">
              <td><span class="label label-primary" for="input01">Telefono</span></td>
              <td><input class="form-control input-sm" id="telefono_usuario" name="telefono_usuario"   type="text" onblur="return validar(event);" /></td>
		    <td><span class="label label-primary" for="input01">Confirmar Password</span></td>
              <td><input class="form-control input-sm" id="password2" name="password2"   type="password" onblur="return validar(event);" /></td>
              </tr>     
            
            <tr class="dark">
              <td><span class="label label-primary" for="input01">Celular</span></td>
              <td><input class="form-control input-sm" id="celular_usuario" name="celular_usuario"   type="text" onblur="return validar(event);" /></td>
              <td>&nbsp;</td>

              </tr>
   
       
         <input type="hidden" name="fecha_creacion" id="fecha_creacion" value="<?php echo date("y/m/d");?>" />
	    <input type="hidden" name="fecha_modificacion" id="fecha_modificacion" value="<?php echo date("y/m/d");?>" />
        <input type="hidden" name="privilegios" id="privilegios" value="Administrador"/>
	  </p>
	    
	         
          	   </table>
		  <td>&nbsp;</td>

		    <div class="form-actions">
            <button type="submit" class="btn btn-primary">Ingresar</button>
            <button type="reset" class="btn" onclick = "javascript:window.location='listar_usuarios.php'">Cancelar</button>
          </div>
       

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
</html>