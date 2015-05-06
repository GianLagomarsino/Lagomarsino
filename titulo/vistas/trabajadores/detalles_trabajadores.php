<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<?PHP 
$ruta = "../../";
$ruta_archivos= "../";

	include ('../master_pages/headernuevo.php');
	include ('../../includes/default.php');
	include ('../../modelos/trabajador.php');
//	include ('../../modelos/juridico.php');
	include ('../../modelos/servicio.php');
	
	$trabajador = new trabajador();
   // $juridico = new juridico();
	$servicio	= new servicio();

	
	  ?>
	         
	  <head>

	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>
     <link href="<?php echo $ruta; ?>bootstrap/css/tables.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $ruta; ?>bootstrap/css/datepicker.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Styles -->
    <link href="../../../css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../../css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../../css/compiled/theme.css" />


    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
     <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="./../../js/bootstrap.min.js"></script>
    <script src="../../../js/theme.js"></script>
    <script type="text/javascript" src="../../../js/flexslider.js"></script>

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
	<form class="form-horizontal well" method="post" id="FormularioExportacion"  style="border-right-width: 100px; margin-left: 0px; margin-top: 0px; border-left-width: 100px; border-top-width: 110px;"  target="_blank" action="../../functions/reporteTrabajador.php">
	<h2 style="color:white">Detalles Trabajadores </h2>
	   <table id="Exportar_a_Excel" border='1' width='200' id='Pagination' align='center' summary='Summary Here'>
	   <thead>
	                       
                                  	<tr>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
							<th>Apellido Materno</th>
                            <th>Rut</th>				
                            <th>Direccion</th>
							<th>Telefono</th>
                            <th>Celular</th>
                            <th>Sueldo</th>
                             <th>Exportar</th>
                                  	</tr>
	   
	   </thead>
	   
 <?php  
             
			 $trabajador = new trabajador();
			 $trabajador_id = $_GET['trabajador_id'];
			 
			
		
		
			
            $result=mysql_query($trabajador->listarTrabajadores2($trabajador_id));
            $result2=mysql_query($trabajador->listarServiciosxTrabajadorActivos($trabajador_id));

			
                            
                    if($row = mysql_fetch_array($result))
                    {
                        $nombre			= $row['nombre'];
						$apellido_paterno 			= $row['apellido_paterno'];
						$apellido_materno 	= $row['apellido_materno'];
						$rut					= $row['rut'];						
						$direccion 				= $row['direccion'];
						$telefono				= $row ['telefono'];
						$celular 				= $row['celular'];
						$sueldo 		        	= $row['sueldo'];

						
						

										echo "<tr class = 'light'>";			
			 echo "<td>".$nombre."</td>";	  		    
	         echo "<td>".$apellido_paterno."</td>";	  		    
			 echo "<td>".$apellido_materno."</td>";	  		    
  		     echo "<td>".$rut."</td>";	
  		     //echo "<td>".$representante_legal."</d>";	
  		 	 echo "<td>".$direccion."</td>";
			 //echo "<td>".$comuna."</td>";	  		    
			 //echo "<td>".$ciudad."</td>";	  		    
  		     echo "<td>".$telefono."</td>";	
  		     echo "<td>".$celular."</d>";	
  		 	 echo "<td>".$sueldo."</td>";					
  		 	 echo "<th><img src='../../images/excel.jpg' class='botonExcel' ?/></th>";
			 //echo "<td>".$banco."</td>";
						   
						   
						}
?>
  </tr>
            

<table id="Exportar_a_Excel2" width="100%" border="1" cellpadding="0" cellspacing="0">
        <thead>
		<h2 style="color:white">Detalles Servicios Activos Asociados</h2>
		<tr class ='light'>
        <th>Nombre</th>		
		<th>Descripcion</th>
        <th>Estado</th>
        <th>Fecha</th>
		<th>Sucursal Asociada</th>
        		

		     </tr>
						</thead>
                    <tbody>
					 
					
					   <?php 
					   
					 $result2 = $base_datos->sql_query($trabajador->listarServiciosxTrabajador($trabajador_id));
						 while($row = $base_datos->sql_fetch_assoc($result2)) {
						
					  $servicio_id                = $row['servicio_id'];
					  $sucursal_id                = $row['sucursal_id'];
					  $trabajador_id                = $row['trabajador_id'];
					  $nombre_servicio			             = $row['nombre_servicio'];
					  $estado_servicio 		             = $row['estado_servicio'];
					  $descripcion             = $row['descripcion'];
					  $fecha_creacion           = $row['fecha_creacion'];
					  $nombre_sucursal             = $row['nombre_sucursal'];
					  
					 
	         
			 
			 echo "<tr class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
	        echo "<th><a href='../servicios/detalles_servicio.php?servicio_id=".$servicio_id."'>".$nombre_servicio."</a></th>";
			
			//echo "<td>".$estado_servicio."</td>";	  		    
			echo "<td>".$descripcion."</td>";
									if ($estado_servicio == "0") {
			echo "<th>";	
			echo "<span class='label label-danger' for='input02'>Finalizado<span>";  		    
			echo "</th>";	
}  else {
   			echo "<th>";	
			echo "<span class='label label-success' for='input02'>Activo<span>";  		    
			echo "</th>";
} 		    
			echo "<td>";		
			 echo $fecha_creacion = date('d/m/Y', strtotime($fecha_creacion));
			 echo "</td>";
			 
			 
			 
  		    //echo "<td><a href='../trabajadores/detalles_trabajadores.php?trabajador_id=".$trabajador_id."'>".$nombre_trabajador."</td>";	
  		    echo "<th><a href='../sucursales/detalles_sucursales.php?sucursal_id=".$sucursal_id."'>".$nombre_sucursal."</a></th>";		
  		     //echo "<td>".$telefono."</td>";	
  		 	 //echo "<td>".$celular."</td>";
		     //echo "<td>".$sueldo."</td>";	
  		 	 
		    echo "</tr>";
            
 
					  
					}
           ?>
           
  <?php
	$sql = mysql_query($trabajador->contarTrabajadoresxServicioActivo($trabajador_id));

	$result = mysql_fetch_array($sql);
//$r = mysql_fetch_array($result);
//$result = $sql[0];



 
 echo "<tr align='right' class = 'light'>";
 echo "<td colspan='4'>Cantidad de servicios activos asociados al trabajador:</td>";
 								echo "<td>";							
								echo $result[0];
								echo "</td>"; 
 echo "</tr>";

?>
<?php
	$sql = mysql_query($trabajador->contarTrabajadoresxServicioFinalizados($trabajador_id));

	$result = mysql_fetch_array($sql);
//$r = mysql_fetch_array($result);
//$result = $sql[0];



 
 echo "<tr align='right' class = 'light'>";
 echo "<td colspan='4'>Cantidad de servicios finalizados asociados al trabajador:</td>";
								echo "<td>";							
								echo $result[0];
								echo "</td>";  
 echo "</tr>";
 echo "</table>";
?>
     

 			           <input type='hidden' id='datos_a_enviar' name='datos_a_enviar' />
<input type='hidden' id='datos_a_enviar2' name='datos_a_enviar2' /> 
           
          
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