<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?PHP 

$ruta = "../../";
 $ruta_archivos= "../";
include ('../master_pages/headernuevo.php');
         include('../../includes/default.php');
		include ('../../modelos/tarea.php');

$tarea = new tarea();
	  ?><?PHP //jQuery ?>

<script type="text/javascript">
                            
function validar(form) 
{ 
    var letra = form.nombre_tarea.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un nombre al servicio");
		form.nombre_tarea.focus();
		return false;
	  }
     
	  

  	  var letra = form.valor.value;
	if (/^[0-9]+$/.test(letra)&&letra.length!=0)
		{
		}
	else
		{
			alert("Debe ingresar el valor (solo numeros).");
					form.valor.focus();
			return false;
		}
   
   
  

  }	  
	  
	  </script></head>
<body background="./../../../img/backgrounds/aqua.jpg">  
 
<form class="form-horizontal well" name="form" id="form" onSubmit="return validar(this);" method="post" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 98px;" action="tarea_modificada.php">
       
		
		<?PHP 
	   
	  
					$tarea_id = $_GET['tarea_id'];
					
					$result = mysql_query("select * from tareas
WHERE tarea_id = $tarea_id");
									
					while($row = mysql_fetch_array($result))
					{
						$tarea_id 	  = $row['tarea_id'];
						$nombre_tarea  = $row['nombre_tarea'];
						$valor  = $row['valor'];
						
										}
               
                ?>
	
  
          <h2 style="color:white;">Modificar Servicios</h2>
         
          <table width="200" border="0">
                
                <tr class="dark">
                 
            <td><span class="label label-primary" for="input01">Nombre Servicio</span></td>
            
             <td> <input class="input-xlarge" id="nombre_tarea" name="nombre_tarea"   type="text" onBlur="return validar(event);"value="<?PHP echo $nombre_tarea; ?>"></td>
              
              </tr>

         
          <tr class="dark"> 
            <td><span class="label label-primary" for="input03">Descripcion</span></td>
            
              <td>	<input class="input-xlarge" id="valor" name="valor"   type="text" onBlur="return validar(event);" value="<?PHP echo $valor; ?>">
              </td> </tr>  	
              
              

              
              
              <input class="input-xlarge" id="tarea_id" name="tarea_id" type="hidden" value="<?PHP echo $tarea_id; ?>">
			 
    
   


  
  
  
           
           
           
           
           
           
           
           
           
            <div class="form-actions">
         <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
             
            <td><button type="submit" class="btn btn-primary">Asignar</button></td>
            <td><button type="reset" class="btn">Cancelar</button></td>
          </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            </div>
</table></form>
 
 
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