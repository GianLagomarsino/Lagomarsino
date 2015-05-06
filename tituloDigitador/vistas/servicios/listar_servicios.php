<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP 

$ruta = "../../";
        $ruta_archivos= "../";
include ("../master_pages/headernuevo.php");
include ("../../includes/default.php");
//include ("../../includes/database.php");
include ("../../modelos/servicio.php");
include ("../../modelos/trabajador.php");



$servicio = new servicio();
//$trabajador = new trabajador();

 ?>
     <link href="<?php echo $ruta; ?>bootstrap/css/tables.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $ruta; ?>bootstrap/css/datepicker.css" rel="stylesheet">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>

<script language="JavaScript">
function confirmar ( mensaje ) {
mensaje = " �Esta Seguro De Querer Eliminar El Servicio? ";
return confirm( mensaje );

} 
</script>

<script language="javascript">
function Validar( contact ){
 var letra = contact.nombre_buscado.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar el nombre del servicio");
  	return false;
  }
  }
</script>
</head>

<body background="./../../../img/backgrounds/aqua.jpg">   
 <form class="form-horizontal well" method="post" name="contact" action="listar_serviciosNombre.php" onSubmit='return Validar(this);' style="border-right-width: 100px; margin-left: 0px; border-top-width: 100px; border-left-width: 100px;">
                          <div class="cleaner"></div>
                          
                   <h2 style="color:white;">Listado De Servicios</h2>
                          
          
         <table  width="100%" border="1" cellpadding="0" cellspacing="0">
		 <p><span class="label label-primary" for="input02">Buscar Servicios Por Nombre</span> <input type="text" name="nombre_buscado" size="20" value="">
          <button type="submit" class="btn btn-primary"/>Buscar</button>
          <br><br></p>
        <thead>
		<tr class ='light'>
        <th>Nombre</th>		
		<th>Descripcion</th>
		<th>Trabajador</th>
		<th>Sucursal</th>
        <th>Inicio</th>
        <th>Tarea</th>		
		<th>Asignar Repuesto</th>
        <th>Pagar</th>
        <th>Modificar</th>
        <th>Eliminar</th>
		     </tr>
						</thead>
                    <tbody>
					 
					
	      <?php 
					   
					 $result = $base_datos->sql_query($servicio->listarServicios());
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  $servicio_id                = $row['servicio_id'];
					  $nombre_servicio			             = $row['nombre_servicio'];
					  $estado_servicio 		             = $row['estado_servicio'];
					  $descripcion             = $row['descripcion'];
					  $nombre             = $row['nombre'];
					  $nombre_sucursal             = $row['nombre_sucursal'];
					  $fecha_creacion             = $row['fecha_creacion'];
					 
					  
					  

					 
	         echo "<tr class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
	         echo "<th><a href='detalles_servicio.php?servicio_id=".$servicio_id."'>".$nombre_servicio."</a></th>";
			 //echo "<td>".$estado_servicio."</td>";	  		    
			echo "<td>".$descripcion."</td>";	  		    
  		    echo "<td>".$nombre."</td>";	
  		    echo "<td>".$nombre_sucursal."</td>";
			echo "<td>";		
			 echo $fecha_creacion = date('d/m/Y', strtotime($fecha_creacion));
			 echo "</td>";
			 	
  		     //echo "<td>".$telefono."</td>";	
  		 	 //echo "<td>".$tarea_servicio."</td>";
		     //echo "<td>".$ingresar_tareas1."</td>";	
  		 	 
		    echo "<th><a href='ingresar_tareas1.php?servicio_id=".$servicio_id."'><img src='../../images/note.png'></th>";			 
	     	echo "<th><a href='repuestos_servicio.php?servicio_id=".$servicio_id."'><img src='../../images/agregar.png'></th>";
		    echo "<th><a href='ingresar_ventas_formaPago.php?servicio_id=".$servicio_id."'><img src='../../images/pagar.png'></th>";
			echo "<th><a href='modificar_servicio.php?servicio_id=".$servicio_id."'><img src='../../images/edit.png'></th>"; 
			echo "<th><a href='eliminar_servicio.php?servicio_id=".$servicio_id."'onclick='return confirmar()'><img src='../../images/delete.png'></a></th>";				 		   
         //*****************
                     
		     
					}
	 ?>
              </tr>
            <?php 
					    
					 $result = $base_datos->sql_query($servicio->contarServicios());
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number 			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='8'>Cantidad total de servicios activos </td>";
								echo "<td>";							
								echo "<td>".$number."</td>";	
								echo "</td>";  
								echo "</tr>";            
	 ?>       

			 
			
 
					  
					
 </tbody> 
		     
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