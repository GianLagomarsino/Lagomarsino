<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP 

$ruta = "../../";
$ruta_archivos= "../";
include ("../master_pages/headernuevo.php");
include("../../includes/default.php");
include ("../../modelos/trabajador.php");

$trabajador = new trabajador();

 ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>
<?PHP //jQuery ?>
	  
	  
	  <head>
<script type="text/javascript" src="../../js/validar.js"></script>
<script type="text/javascript" src="../../js/validarut.js"></script>


 
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
		alert("Debe ingresar apellido paterno");
		form.apellido_paterno.focus();
		return false;
	  }
	            var letra = form.apellido_materno.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar apellido materno");
		form.apellido_materno.focus();
		return false;
	  }
	   
   
      var letra = form.direccion.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar una direccion");
		form.direccion.focus();
		return false;
	  }

	
	var letra = form.celular.value;
	if (/^[0-9]+$/.test(letra)&&letra.length!=0)
		{
		}
	else
		{
			alert("Debe ingresar el celular (solo numeros).");
			return false;
		}
	var letra = form.telefono.value;
	if (/^[0-9]+$/.test(letra)&&letra.length!=0)
		{
		}
	else
		{
			alert("Debe ingresar el telefono (solo numeros).");
			return false;
		}

	  	var letra = form.sueldo.value;
	if (/^[0-9]+$/.test(letra)&&letra.length!=0)
		{
		}
	else
		{
			alert("Debe ingresar el sueldo (solo numeros).");
			return false;
		}
		
		    return Rut(document.form.rut.value);
  }
</script>
</head>

</head>

<body background="./../../../img/backgrounds/aqua.jpg"> 


	

<form class="form-horizontal well " method="post" action="trabajador_modificado.php" name="form" id="form" onsubmit="return validar(this);" style="border-right-width: 100px; margin-left: 0px; margin-top: 0px; border-left-width: 100px; border-top-width: 100px;" >
         <h2 style="color:white">Modificar Trabajador</h2>
         
       <?PHP 
	   
	  
					$trabajador_id = $_GET['trabajador_id'];
					
					$result = mysql_query("select * from trabajadores where trabajador_id = $trabajador_id");
									
					while($row = mysql_fetch_array($result))
					{
						//$trabajador_id = $row['trabajador_id'];
						$nombre = $row['nombre'];
						$apellido_paterno = $row['apellido_paterno'];
						$apellido_materno = $row['apellido_materno'];
						$rut = $row['rut'];
						$direccion = $row['direccion'];
						$telefono = $row['telefono'];
						$celular = $row['celular'];
						$sueldo = $row['sueldo'];
					}
               
                ?>


                      <div class="controls" hidden>
              <input class="input-xlarge" id="trabajador_id" name="trabajador_id" type="text" value="<?PHP echo $trabajador_id; ?>"/>
			             </div>
                         
                         <table border="0"  >        
                      <tr class="dark">
             
            <td width="116" align="left"><span class="label label-primary" for="input01">Rut</span></td>
            
              <td width="157" align="left"><input class="form-control input-sm" id="rut" name="rut"  value="<?PHP echo $rut; ?>"   type="text" onBlur="return validar(event);"></td>
              <td width="58" align="left"><span class="label label-primary">Direccion</span></td>
              <td width="144" align="left"><input class="form-control input-sm" id="direccion" name="direccion" value="<?PHP echo $direccion?>"  type="text" onblur="return validar(event);" /></td>
                      </tr>
                               <tr class="dark">
             
            <td align="left"><span class="label label-primary" for="input01">Nombre</span></td>
            
              <td align="left"><input class="form-control input-sm" id="nombre" name="nombre"  value="<?PHP echo $nombre; ?>"   type="text" onBlur="return validar(event);"></td>
              <td align="left"><span class="label label-primary" for="input01">Telefono</span></td>
              <td align="left"><input class="form-control input-sm" id="telefono" name="telefono" value="<?PHP echo $telefono?>"   type="text" onblur="return validar(event);" /></td>
                               </tr> 
                  
    <tr class="dark">
             
            <td align="left"><span class="label label-primary" for="input01">Apellido Paterno</span></td>
            
              <td align="left"><input class="form-control input-sm" id="apellido_paterno" name="apellido_paterno"  value="<?PHP echo $apellido_paterno; ?>"   type="text" onBlur="return validar(event);"></td>
              <td align="left"><span class="label label-primary" for="input01">Celular</span></td>
              <td align="left"><input class="form-control input-sm" id="celular" name="celular" value="<?PHP echo $celular?>"  type="text" onblur="return validar(event);" /></td>
              </tr>                  
                  
           
              <tr class="dark">
             
            <td align="left"><span class="label label-primary" for="input01">Apellido Materno</span></td>
            
              <td align="left"><input class="form-control input-sm" id="apellido_materno" name="apellido_materno"  value="<?PHP echo $apellido_materno; ?>"   type="text" onBlur="return validar(event);"></td>
              <td align="left"><span class="label label-primary" for="input01">Sueldo</span></td>
              <td align="left"><input class="form-control input-sm" id="sueldo" name="sueldo" value="<?PHP echo $sueldo?>"  type="text" onblur="return validar(event);" /></td>
              </tr>                      

            <tr class="dark">
            <td>&nbsp;</td>
            
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>                          
       
			 
			 </table>
		  
         
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Modificar</button>
            <button type="reset" class="btn" onclick = "javascript:window.location='listar_trabajadores.php'" >Cancelar</button>
  
        
     </div> </form>

</body>
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

</html>