<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<?PHP 
$ruta = "../../";
$ruta_archivos= "../";

	include ('../master_pages/headernuevo.php');
	include ('../../includes/default.php');
	include ('../../modelos/sucursal.php');
//	include ('../../modelos/juridico.php');
	include ('../../modelos/servicio.php');
	
	$sucursal = new sucursal();
   // $juridico = new juridico();
	$servicio	= new servicio();

	  ?>
	         
	  <head>

	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>
<link href="<?php echo $ruta; ?>bootstrap/css/tables.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $ruta; ?>bootstrap/css/datepicker.css" rel="stylesheet">
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
<form class="form-horizontal well" method="post" id="FormularioExportacion"   style="border-right-width: 100px; margin-left: 0px; margin-top: 0px; border-left-width: 100px; border-top-width: 110px;" target="_blank" action="../../functions/reporteSucursal.php">
  <table id="Exportar_a_Excel"  width="100%" border="1" cellpadding="0" cellspacing="0">
		<h2 style="color:white">Detalles Sucursal</h2>
        <thead>
		<tr class ='light'>
							<th>Nombre Sucursal</th>
							<th>Nombre Encargado</th>
							<th>Direccion Sucursal</th>
                            <th>Exportar</th>	

		     </tr>
						</thead>
                    <tbody>
					 
					
	   
 <?php  
             
			 $sucursal = new sucursal();
			 $sucursal_id = $_GET['sucursal_id'];
			 
			
		
		
			
            $result=mysql_query($sucursal->listarSucursal2($sucursal_id));
            $result2=mysql_query($sucursal->listarServiciosxSucursal($sucursal_id));
			//$result3=mysql_query($sucursal->listarTareasXservicio($cliente_id));
			//$result4=mysql_query($sucursal->listarProductosxTareas($cliente_id));
		    //$result5=mysql_query($sucursal->listarServicios($cliente_id));
			
			 
			 
            //$servicio = new servicio();
             //$servicio_id = $_GET['servicio_id']; 
            
           //$result=mysql_query($servicio->listarServicioPorClienteJuridico($servicio_id));
           //$result2=mysql_query($servicio->listarServicioPorClienteNatural($servicio_id));
		  // $result3=mysql_query($servicio->listarTareasXservicio($servicio_id));
			
                            
                    if($row = mysql_fetch_array($result))
                    {
                        $nombre_sucursal			= $row['nombre_sucursal'];
						$nombre_encargado 			= $row['nombre_encargado'];
						$direccion_sucursal 	= $row['direccion_sucursal'];
						//$servicio_id					= $row['servicio_id'];						

						
						

   
						   
						   echo"<tr class = 'light'>
							<td>".$nombre_sucursal."</td>
							<td>".$nombre_encargado."</td>
							<td>".$direccion_sucursal."</td>
							<th><img src='../../images/excel.jpg' class='botonExcel' ?/></th>
								  </table>";
							}
				
?>

  <table id="Exportar_a_Excel2"  width="100%" border="1" cellpadding="0" cellspacing="0">
        <thead>
		<h2 style="color:white">Detalles Servicios Asociados</h2>
		<tr class ='light'>
        <th>Nombre</th>		
		<th>Descripcion</th>
		<th>Trabajador Encargado</th>
		<th>Estado</th>		

		     </tr>
						</thead>
                    <tbody>
					 
					
					   <?php 
					   
					 $result = $base_datos->sql_query($sucursal->listarServiciosxSucursal($sucursal_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  $servicio_id                = $row['servicio_id'];
					  $nombre_servicio			             = $row['nombre_servicio'];
					  $estado_servicio 		             = $row['estado_servicio'];
					  $descripcion             = $row['descripcion'];
					  $nombre             = $row['nombre'];
					  $nombre_sucursal             = $row['nombre_sucursal'];
					  
					 
	         
			 
			 echo "<tr class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
	        echo "<th><a href='../servicios/detalles_servicio.php?servicio_id=".$servicio_id."'>".$nombre_servicio."</a></th>";
			
			//echo "<td>".$estado_servicio."</td>";	  		    
			echo "<td>".$descripcion."</td>";	  		    
  		    echo "<td>".$nombre."</td>";	
  		    									if ($estado_servicio == "0") {
			echo "<th>";	
			echo "<span class='label label-danger' for='input02'>Finalizado<span>";  		    
			echo "</th>";	
}  else {
   			echo "<th>";	
			echo "<span class='label label-success' for='input02'>Activo<span>";  		    
			echo "</th>";
} 		
  		     //echo "<td>".$telefono."</td>";	
  		 	 //echo "<td>".$celular."</td>";
		     //echo "<td>".$sueldo."</td>";	
  		 	 
		    echo "</tr>";
 
					  
					}
           ?>
</table>
     			           <input type='hidden' id='datos_a_enviar' name='datos_a_enviar' />
<input type='hidden' id='datos_a_enviar2' name='datos_a_enviar2' /> 
           
              
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