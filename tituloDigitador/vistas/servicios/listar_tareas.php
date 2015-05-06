<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP 

$ruta = "../../";
        $ruta_archivos= "../";
include ("../master_pages/headernuevo.php");
include ("../../includes/default.php");
//include ("../../includes/database.php");
include ("../../modelos/servicio.php");
include ("../../modelos/tarea.php");
include ("../../modelos/trabajador.php");



$servicio = new servicio();
$tarea = new tarea();
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
 <form class="form-horizontal well" method="post" name="contact" action="listar_tareasNombre.php" onSubmit='return Validar(this);' style="border-right-width: 100px; margin-left: 0px; border-top-width: 100px; border-left-width: 100px;">
                          <div class="cleaner"></div>
                          
                   <h2 style="color:white;">Listado De Tareas</h2>
                          
          
         <table  width="75%" border="1" cellpadding="0" cellspacing="0">
		 <p><span class="label label-primary" for="input02">Buscar Tareas Por Nombre</span> <input type="text" name="nombre_buscado" size="20" value="">
          <button type="submit" class="btn btn-primary"/>Buscar</button>
          <br><br></p>
        <thead>
		<tr class ='light'>
        <th width="21%">Nombre tarea</th>		
		<th width="20%">Valor</th>
        <th width="24%">Modificar</th>
        <th width="35%">Eliminar</th>
		     </tr>
						</thead>
                    <tbody>
					 
					
	      <?php 
					   
					 $result = $base_datos->sql_query($tarea->listarTareas2());
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  $tarea_id                = $row['tarea_id'];
					  $nombre_tarea			             = $row['nombre_tarea'];
					  $valor 		             = $row['valor'];
					
					 
					  
					  

					 
	         echo "<tr class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
	         echo "<td><a href='detalles_tarea.php?tarea_id=".$tarea_id."'>".$nombre_tarea."</a></td>";
			 //echo "<td>".$estado_servicio."</td>";	 
			 echo "<td>"; 		    
			echo "$"; echo  sprintf( number_format($valor, 0, '.', '.'));
			echo "</td>";		    
  		   echo "<th><a href='modificar_tarea.php?tarea_id=".$tarea_id."'><img src='../../images/edit.png'></th>"; 
			echo "<th><a href='eliminar_servicio.php?tarea_id=".$tarea_id."'onclick='return confirmar()'><img src='../../images/delete.png'></a></th>";				 		   
         //*****************
                     
		     
					}
	 ?>
              </tr>
             <?php 
					    
					 $result = $base_datos->sql_query($tarea->contarTareas());
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number 			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								 echo "<td colspan='3'>Cantidad total de tareas</td>";
								echo "<td>";							
								 echo $number;
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