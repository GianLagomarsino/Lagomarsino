<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<?PHP 
$ruta = "../../";
$ruta_archivos= "../";

	include ('../master_pages/headernuevo.php');
	include ('../../includes/default.php');
	include ('../../modelos/cliente.php');
	include ('../../modelos/juridico.php');
	include ('../../modelos/naturales.php');
	include ('../../modelos/servicio.php');
	include ('../../modelos/tarea.php');
		//$cliente = new cliente();
    //$juridico = new juridico();
	
	$tarea	= new tarea();
		//$sucursal = new sucursal();
		

	  ?>
	         
	  <head>

	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="<?php echo $ruta; ?>bootstrap/css/tables.css" rel="stylesheet" type="text/css" />
<title>Laboratorio Diesel Lagomarsino</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript">
function imprSelec(muestra)
{var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();}
</script>  

      <script language="javascript">
$(document).ready(function() {
	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
		$("#datos_a_enviar2").val( $("<div>").append( $("#Exportar_a_Excel2").eq(0).clone()).html());
		$("#FormularioExportacion").submit();
});
});


</script>
<style type="text/css">
.botonExcel{cursor:pointer;}
</style>
	  </head>
 			
	<body background="./../../../img/backgrounds/aqua.jpg">  			
<form class="form-horiziontal well" method="post"  id="FormularioExportacion" style="border-right-width: 100px; margin-left: 0px; margin-top: 0px; border-left-width: 100px; border-top-width: 110px;" target="_blank" action="../../functions/reporteTarea.php">
          
          <div id="muestra"> 
          
          <h2 style="color:white;">Tarea</h2>

	   <thead>

 	<?php  
			 $tarea = new tarea();
			 $tarea_id = $_GET['tarea_id'];
					
					
					$result = $base_datos->sql_query($tarea->listarTareas3($tarea_id));
     						if($row = mysql_fetch_array($result)){
				 
						$tarea_id	        = $row['tarea_id'];
						$nombre_tarea	        = $row['nombre_tarea'];
                        $valor	        = $row['valor'];
									

$precio = sprintf( number_format($valor, 0, '.', '.'));
						
						
						 echo"<table id='Exportar_a_Excel' border='1''>
          					<thead></tr>
							<th>Nombre Tarea</th>
							<th>Valor</th>
							<th>Imprimir</th>
							<th>Exportar</th>
						
							
							</thead>
							<tr align='center' class = 'light'>
							<td>".$nombre_tarea."</td>
							<td>$ ".$precio."</td>
							<td><a href='#' onclick='window.print(); return false;' ><img src='../../images/print.png''/></a></td>
							<td><img src='../../images/excel.jpg' class='botonExcel' ?/></td>
						
						  </table>";
							}        
		
					
?>     

     	           <input type='hidden' id='datos_a_enviar' name='datos_a_enviar' />
<input type='hidden' id='datos_a_enviar2' name='datos_a_enviar2' />

	   </thead>
 <h2 style="color:white;">Servicios Asociados</h2>
	
 <table id="Exportar_a_Excel2"  width="100%" border="1" cellpadding="0" cellspacing="0">
        <thead>
							<th>Nombre Servicio</th>
							<th>Descripcion Servicio</th>
                            <th>Estado</th>
							<th>Inicio</th>
							<th>Trabajador</th>
                            <th>Sucursal</th>
							<th>Telefono</th>

	  </thead>
      
	  
<?php  
             
			 
			
		
		
			//trabajador asociado al Servicio
            $result3=mysql_query($tarea->listarTareasTrabajadores($tarea_id));
            while($row = mysql_fetch_array($result3))
                    {
						$servicio_id	        = $row['servicio_id'];
						$nombre_servicio	        = $row['nombre_servicio'];
						$estado_servicio	        = $row['estado_servicio'];
                        $descripcion	        = $row['descripcion'];
						$fecha_creacion	        = $row['fecha_creacion'];
						$trabajador_id			= $row['trabajador_id'];
						$nombre			= $row['nombre'];
						$apellido_paterno 			= $row['apellido_paterno'];
						$apellido_materno 	= $row['apellido_materno'];
						$sucursal_id			= $row['sucursal_id'];
						$nombre_sucursal			= $row['nombre_sucursal'];
						$telefono			= $row['telefono'];		
			

						    
							echo "<tr align='center' class = 'light'>";
	
												echo "<td><a href='../servicios/detalles_servicio.php?servicio_id=".$servicio_id."'>".$nombre_servicio."</a></td>";
						echo "<td>".$descripcion."</td>";
												if ($estado_servicio == "0") {
			echo "<th>";	
			echo "<span class='label label-success' for='input02'>Activo<span>";  		    
			echo "</th>";	
}  else {
   			echo "<th>";	
			echo "<span class='label label-danger' for='input02'>Finalizado<span>";  		    
			echo "</th>";
} 		    
						echo "<td>";
						echo $fecha_creacion = date('d/m/Y', strtotime($fecha_creacion));
						echo "</td>";
	
												echo "<td><a href='../trabajadores/detalles_Trabajadores.php?trabajador_id=".$trabajador_id."'>".$nombre." ".$apellido_paterno." ".$apellido_materno."</a></td>";
														    
			echo "</th>";
						echo "<td><a href='../sucursales/detalles_sucursales.php?sucursal_id=".$sucursal_id."'>".$nombre_sucursal."</a></td>";
						echo "<td>".$telefono."</td>";
						
						
							}
						   
				
?>



 <?php 
		$tarea_id = $_GET['tarea_id'];			    
					 $result = $base_datos->sql_query($tarea->contarServiciosxTareas($tarea_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number 			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								echo "<td colspan='6'>Numero de veces que se a realizado la tarea $nombre_tarea</td>";
								echo "<td align='center'>".$number."</td>";
								echo "</tr>";            
	 ?> 



	
 
</table>
</table>
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