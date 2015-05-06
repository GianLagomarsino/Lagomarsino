<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP 

$ruta = "../../";
        $ruta_archivos= "../";
include ("../master_pages/headernuevo.php");
include ("../../includes/default.php");
//include ("../../includes/database.php");
include ("../../modelos/cliente.php");
//include ("../../modelos/juridico.php");





$cliente = new cliente();
//$juridico = new juridico();


 ?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>
<link type="text/css" href="../css/menu.css" rel="Stylesheet" /> <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
  <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />

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
  var letra = formulario.nombre.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un nombre");
		formulario.nombre.focus();
		return false;
	  }
	   var letra = formulario.apellido_paterno.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un apellido paterno");
		formulario.apellido_paterno.focus();
		return false;
	  }
	  
	  	   var letra = formulario.apellido_materno.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un apellido materno");
		formulario.apellido_materno.focus();
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
<div id="templatemo_main">
  <div id="templatemo_content">
    	<div class="services_box">
         <form action="cliente_ingresadoNatural.php" class="form-horizontal well" method="post" name="form" onsubmit="return Validar(this);" style="border-right-width: 100px; margin-left: 0px; border-left-width: 100px; border-top-width: 100px; height: 1000%;" > 
       
       <h2 style="color:#ECF2F8;">Ingresar Clientes Naturales</h2>

<p>&nbsp;</p>
<table width="573" valign="right">        
                      <tr class="dark">
             
            <td align="left"><span class="label label-primary" for="input01">Rut</span></td>
            
              <td width="184" align="left"><input class="form-control input-sm" id="rut" name="rut"   type="text"  onBlur="return validar(event);"></td>
              <td><span class="label label-primary" for="input01">Banco</span></td>
              <td><input class="form-control input-sm"" id="banco" name="banco"   type="text"  onblur="return validar(event);" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div class="form-actions"> <button type="submit" class="btn btn-primary">Ingresar</button></div> </td>
    </tr>     
       
                      <tr class="dark">
             
            <td align="left"><span class="label label-primary" for="input01">Nombre</span></td>
            
              <td width="184" align="left"><input class="form-control input-sm" id="nombre" name="nombre"   type="text"  onBlur="return validar(event);"></td>
              <td><span class="label label-primary" for="input01">Ciudad</span></td>
              <td><input class="form-control input-sm" id="ciudad" name="ciudad"   type="text"  onblur="return validar(event);" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
    </tr>   
              <tr class="dark">
             
            <td align="left"><span class="label label-primary" for="input01">Apellido Paterno</span></td>
            
               <td width="184" align="left"><input class="form-control input-sm" id="apellido_paterno" name="apellido_paterno"  type="text" onBlur="return validar(event);"></td>
               <td><span class="label label-primary" for="input01">Telefono</span></td>
               <td><input class="form-control input-sm" id="telefono" name="telefono"   type="text"  onblur="return validar(event);" /></td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td> <button type="reset" onclick = "javascript:window.location='listar_clientesNatural.php'" class="btn">Cancelar</button></td>
    </tr>   
             <tr>
               <td align="left"><span class="label label-primary" for="input01">Apellido materno</span></td>
            
               <td width="184" align="left"><input class="form-control input-sm" id="apellido_materno" name="apellido_materno"  type="text" onBlur="return validar(event);"></td>
               <td class="dark"><span class="label label-primary" for="input01">Celular</span></td>
               <td class="dark"><input class="form-control input-sm" id="celular" name="celular"   type="text"  onblur="return validar(event);" /></td>
               <td class="dark">&nbsp;</td>
               <td class="dark">&nbsp;</td>
               <td class="dark">&nbsp;</td>
              </tr>           
            <tr>
             <td align="left">

              
              </td>
    </tr>                      



                     <tr class="dark">
             
            <td align="left"><span class="label label-primary" for="input01">Direccion</span></td>
            
              <td align="left"><input class="form-control input-sm" id="direccion" name="direccion"   type="text"  onBlur="return validar(event);"></td>
              <td><span class="label label-primary" for="input01">Email</span></td>
              <td><input class="form-control input-sm" id="email" name="email"   type="text"  onblur="return validar(event);" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
    </tr> 

                      <tr class="dark">
                        <td><span class="label label-primary" for="input01">Comuna</span></td>
                        <td><input class="form-control input-sm" id="comuna" name="comuna"   type="text"  onblur="return validar(event);" /></td>
             
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
	  </table>

   
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