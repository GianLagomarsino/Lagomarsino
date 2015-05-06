<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Styles -->
    <link href="../../../css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../../css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../../css/compiled/theme.css" />

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="../../../css/compiled/about.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="../../../text/css" href="css/lib/animate.css" media="screen, projection" />
    <link rel="stylesheet" href="../../../css/lib/flexslider.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
     <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="./../../js/bootstrap.min.js"></script>
    <script src="../../../js/theme.js"></script>
    <script type="text/javascript" src="../../../js/flexslider.js"></script>

<?PHP
$ruta = "../../";
        $ruta_archivos= "../";
		include ('../master_pages/headernuevo.php'); 
		include ('../../includes/default.php');
		include ('../../modelos/servicio.php');
		include ('../../modelos/cliente.php');
		
		
	  
	  $servicio = new servicio();
	  $cliente = new cliente();
	  
	  ?><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>




<?PHP //jQuery ?>

<script type="text/javascript">
                            

function Validar( formulario ) 
{

 var letra = formulario.proveedor_id.value;
  if (letra=="Seleccione..")
	{
	}
	else
	{
		alert("Debe seleccionar un Proveedor");
		return false;
	}	
 
  }	  
	  
	  </script>
	  
	  </head>
<body background="./../../../img/backgrounds/aqua.jpg">  

<div id="process">
        <div class="container">
            <div class="section_header">
              
            </div>
            <div class="row services_circles">
              <div class="col-sm-4 description">
                    <div class="text active">
                      <form class="form-horizontal well" method="post" action="tarea_asociada2.php" name="formulario" id="formulario" onSubmit="return validar(this);"/>

        <fieldset>
        <p>&nbsp;</p>
		          <h2 style="color:white;">Asociar una tarea ya creada</h2>
                  	<?PHP 
	   
	  
					$servicio_id = $_GET['servicio_id'];
					
					$result = mysql_query("select * from servicios, trabajadores, sucursales 
WHERE trabajadores.trabajador_id = servicios.trabajador_id
AND sucursales.sucursal_id = servicios.sucursal_id
AND servicios.servicio_id = $servicio_id");
									
					while($row = mysql_fetch_array($result))
					{
						$servicio_id 	  = $row['servicio_id'];
						$nombre_servicio  = $row['nombre_servicio'];
						$estado_servicio  = $row['estado_servicio'];
						$descripcion 	  = $row['descripcion'];
						$trabajador_id	  = $row['trabajador_id'];
						$nombre			  = $row['nombre'];
						$apellido_paterno = $row ['apellido_paterno'];
						$sucursal_id 	  = $row ['sucursal_id'];
						$nombre_sucursal  = $row ['nombre_sucursal'];
					}
               
                ?>
        	   <table width="200" border="0">
                 <tr>
                                    <div align="left">
                   <p><span class="label label-primary">Nombre Servicio</span>
                     <input class="input-xlarge" id="servicio_id" name="servicio_id"  readonly="readonly"  type="input" onBlur="return validar(event);"value="<?PHP echo $nombre_servicio; ?>">
                   </p>
                  
                 </div>
          <input class="input-xlarge" id="servicio_id" name="servicio_id"  readonly="readonly"  type="hidden" onBlur="return validar(event);"value="<?PHP echo $servicio_id; ?>">
          <input class="input-xlarge" id="fecha_tarea" name="fecha_tarea" readonly type="hidden" value="<?php echo date("Y-m-d")?>">
				     <div align="left"><span class="label label-primary">Nombre Tarea</span>
                       <select id="tarea_id" name="tarea_id">
                         
                         <?PHP						
						
								$result=mysql_query("select distinct tarea_id from tareas");
								$result3=mysql_query("select * from tareas");
								if (mysql_num_rows($result3)>0){


						while($row = mysql_fetch_array($result))
						{
							$result2 = mysql_query("select * from tareas where tarea_id = ".$row['tarea_id']."");
							while($row2 = mysql_fetch_array($result2))
							{
								echo '<option value='.$row['tarea_id'].'>'.$row2['nombre_tarea'].' Valor:'.$row2['valor'].'</option>';
							}
							
						}
								}
								
						else{
						echo "<script language='JavaScript'>";
						echo "alert('No Existen Tareas');";
						echo "alert('Sera Redireccionado A Ingresar tareas');";
						echo "location = 'ingresar_tareas.php'";
						echo "</script>";                
              }
        
           ?>  
           </select> 
          <td height="13"><div class="form-actions">
       
      <tr>  
            <td><button type="submit" class="btn btn-primary">Ingresar</button></td>
			<td><button type="reset" class="btn"  value=Atr&aacute;s onclick="history.go(-1)">Cancelar</button></td>
            
    </tr></tr>
             </th></tr>
             </table> 
        	   </fieldset>
</form>
                           <p></p>
                    </div>
                    <div class="text">
                        <form class="form-vertical well" method="post" action="tarea_servicio.php"
name="formulario" id="formulario" onSubmit="return validar(this);" />


		<?PHP 
	   
	  
					$servicio_id = $_GET['servicio_id'];
					
					$result = mysql_query("select * from servicios, trabajadores, sucursales 
WHERE trabajadores.trabajador_id = servicios.trabajador_id
AND sucursales.sucursal_id = servicios.sucursal_id
AND servicios.servicio_id = $servicio_id");
									
					while($row = mysql_fetch_array($result))
					{
						$servicio_id 	  = $row['servicio_id'];
						$nombre_servicio  = $row['nombre_servicio'];
						$estado_servicio  = $row['estado_servicio'];
						$descripcion 	  = $row['descripcion'];
						$trabajador_id	  = $row['trabajador_id'];
						$nombre			  = $row['nombre'];
						$apellido_paterno = $row ['apellido_paterno'];
						$sucursal_id 	  = $row ['sucursal_id'];
						$nombre_sucursal  = $row ['nombre_sucursal'];
					}
               
                ?>
        <fieldset>
         <p>&nbsp;</p>
		          <h2 style="color:white;">Crear y asociar al servicio</h2>
                 <div align="left">
                   <p><span class="label label-primary">Nombre Servicio</span>
                     <input class="input-xlarge" id="nombre_servicio" name="nombre_servicio"  readonly="readonly"  type="input" onBlur="return validar(event);"value="<?PHP echo $nombre_servicio; ?>">
                   </p>
                   
                 </div>
          <input class="input-xlarge" id="servicio_id" name="servicio_id"  readonly="readonly"  type="hidden" onBlur="return validar(event);"value="<?PHP echo $servicio_id; ?>">
                  
</fieldset>
                  <td><button type="submit" class="btn btn-primary">Ingresar</button></td>
				   <td><button type="reset" class="btn"  value=Atr&aacute;s onclick="history.go(-1)">Cancelar</button></td>
				 
                  </form>
				  
                           <p></p>
                    </div>
                    <div class="text">
                                                    <p></p>
                           <p></p>
                    </div>
                </div>
 <p>&nbsp;</p>
                <div class="col-sm-6 areas" style="margin-right: -100px">
                    <p>&nbsp;</p>
                     <p>&nbsp;</p>
                    <div class="circle active">
                    <span style="padding-top: 40%;">Existente</span>
                    </div>
                    <div class="circle">
                    <span style="padding-top: 40%;">Nueva</span>
                    </div>
              	
                </div>
            </div>
        </div>
    </div>
 <!-- SEPARADOR -->

    <div id="clients">
        <div class="container">
            <div class="section_header">
                <h3></h3>
            </div>
            <div class="row">
                
            </div>
        </div>
    </div>
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
