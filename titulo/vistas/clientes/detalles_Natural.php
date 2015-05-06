<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<?PHP 
$ruta = "../../";
$ruta_archivos= "../";

	include ('../master_pages/headernuevo.php');
	include ('../../includes/default.php');
	include ('../../modelos/cliente.php');
	include ('../../modelos/naturales.php');
	include ('../../modelos/servicio.php');
	
	$cliente = new cliente();
    $naturales = new naturales();
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
      
    
      <link  rel="stylesheet" href="../../css3/ui-lightness/jquery-ui-1.8.20.custom.css" >
  <script src="../../css3/jquery-1.7.2.min.js"></script>
  <script src="../../css3/jquery-ui-1.8.20.custom.min.js"></script>
     
     <script language="javascript">
function Validar(contact){
 var letra = contact.fecha_inicio1.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar la fecha Inicio del servicio");
	contact.fecha_inicio1.focus();
  	return false;
  }
  
  var letra = contact.fecha_inicio2.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar la fecha Inicio del servicio");
	contact.fecha_inicio2.focus();
  	return false;
  }
  
  }
</script>
      <script language="javascript">
$(document).ready(function() {
	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
		$("#datos_a_enviar2").val( $("<div>").append( $("#Exportar_a_Excel2").eq(0).clone()).html());
		$("#datos_a_enviar3").val( $("<div>").append( $("#Exportar_a_Excel3").eq(0).clone()).html());
		$("#FormularioExportacion").submit();
});
});


</script>
<style type="text/css">
.botonExcel{cursor:pointer;}
</style>
      <script type="text/javascript">
						$(function(){
			
							// Datepicker
							$('#datepicker').datepicker({
								inline: true
							});
			
							//hover states on the static widgets
							$('#dialog_link, ul#icons li').hover(
								function() { $(this).addClass('ui-state-hover'); },
								function() { $(this).removeClass('ui-state-hover'); }
							);
			
						});
					</script>
					
<script>
				$(function() {
					$( "#fecha_inicio1").datepicker();
					$( "#fecha_inicio2").datepicker();
				});
				</script>
<script>
				jQuery(function($){
				$.datepicker.regional['es'] = {
					closeText: 'Cerrar',
					prevText: '&#x3c;Ant',
					nextText: 'Sig&#x3e;',
					currentText: 'Hoy',
					monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
					'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
					monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
					'Jul','Ago','Sep','Oct','Nov','Dic'],
					dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
					dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
					dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
					weekHeader: 'Sm',
					dateFormat: 'yy-mm-dd',
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: false,
					yearSuffix: ''};
				$.datepicker.setDefaults($.datepicker.regional['es']);
			});

			</script>

      </head>





	<body background="./../../../img/backgrounds/aqua.jpg">  			
<form action="../../functions/reporteClienteNatural.php" target="_blank" id="FormularioExportacion" class="form-horizontal well" method="post"  style="border-right-width: 100px; margin-left: 0px; margin-top: 0px; border-left-width: 100px; border-top-width: 110px; height: 100%;" >
         
	  
       <table id="Exportar_a_Excel" width="100%" border="1" cellpadding="0" cellspacing="0">
        <h2 style="color:#ECF2F8;">Detalles Cliente Naturales</h2>
	   <thead>
	                        <th>Rut</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Comuna</th>
                            <th>Ciudad</th>
                            <th>Telefono</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Banco</th>
                            <th>Exportar</th>
                            
	   
	   </thead>
	   
 <?php  
             
			 $cliente = new cliente();
			 $cliente_id = isset($_GET['cliente_id']) ? $_GET['cliente_id'] : null ;

		
		
			
            $result=mysql_query($cliente->listarClientesNaturales2($cliente_id));
            $result2=mysql_query($cliente->listarClientesxServiciosNaturales($cliente_id));
			//$result3=mysql_query($cliente->listarTareasXservicio($cliente_id));
			//$result4=mysql_query($cliente->listarProductosxTareas($cliente_id));
		    //$result5=mysql_query($cliente->listarServicios($cliente_id));
			
			 
			 
            //$servicio = new servicio();
             //$servicio_id = $_GET['servicio_id']; 
            
           //$result=mysql_query($servicio->listarServicioPorClienteJuridico($servicio_id));
           //$result2=mysql_query($servicio->listarServicioPorClienteNatural($servicio_id));
		  // $result3=mysql_query($servicio->listarTareasXservicio($servicio_id));
			
                            
                    if($row = mysql_fetch_array($result))
                    {
                        $cliente_id				= $row['cliente_id'];
						$nombre					= $row['nombre'];
						$rut					= $row['rut'];
						$apellido_paterno 		= $row['apellido_paterno'];
						$apellido_materno		= $row['apellido_materno'];
						$direccion 				= $row['direccion'];
						$comuna         		= $row['comuna'];
						$ciudad        			= $row['ciudad'];
						$telefono				= $row ['telefono'];
						$celular 				= $row['celular'];
						$email		        	= $row['email'];
                        $banco 		        	= $row['banco'];
						$fecha_creacion 		= $row['fecha_creacion'];
						$fecha_modificacion 	= $row['fecha_modificacion'];                                        											
						
						
						
			 echo "<tr align='center' class = 'light'>";			
			 echo "<td>".$rut."</td>";	  
	         echo "<td>".$nombre." ".$apellido_paterno." ".$apellido_materno."</td>";
			 echo "<td>".$direccion."</td>";
			 echo "<td>".$comuna."</td>";	  		    
			 echo "<td>".$ciudad."</td>";	  		    
  		     echo "<td>".$telefono."</td>";	
  		     echo "<td>".$celular."</d>";	
  		 	 echo "<td>".$email."</td>";					
  		 	 echo "<td>".$banco."</td>";
			 echo "<td><img src='../../images/excel.jpg' class='botonExcel' ?/></td>";
			 
			 echo "</table>";
						   
						}
					
?>
<input type='hidden' id='datos_a_enviar' name='datos_a_enviar' />
<input type='hidden' id='datos_a_enviar2' name='datos_a_enviar2' />
<input type='hidden' id='datos_a_enviar3' name='datos_a_enviar3' />
 <table id="Exportar_a_Excel2" width="100%" border="1" cellpadding="0" cellspacing="0">
        <thead>
		<h2 style="color:#ECF2F8;">Detalles Servicios En Curso</h2>
		<tr class ='light'>
        <th>Nombre</th>		
		<th>Fecha Inicio</th>
	    <th>Descripcion</th>
        <th>Trabajador Encargado</th>
		<th>Sucursal Asociada</th>		

		     </tr>
						</thead>
                    <tbody>
					 
					
					   <?php 
					   
					 $result = $base_datos->sql_query($cliente->listarClientesxServiciosNaturales($cliente_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  $servicio_id               = $row['servicio_id'];
					  $sucursal_id               = $row['sucursal_id'];
					  $trabajador_id             = $row['trabajador_id'];
					  $nombre_servicio			 = $row['nombre_servicio'];
					  $estado_servicio 		     = $row['estado_servicio'];
					  $fecha_creacion			 = $row['fecha_creacion'];
					  $descripcion               = $row['descripcion'];
					  $nombre                    = $row['nombre'];
					  $nombre_sucursal           = $row['nombre_sucursal'];
					  
					 
	         
			 
			 echo "<tr align='center' class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
	        echo "<td><a href='../servicios/detalles_servicio.php?servicio_id=".$servicio_id."'>".$nombre_servicio."</a></td>";
						echo "<td>";		
			 echo $fecha_creacion = date('d/m/Y', strtotime($fecha_creacion));
			 echo "</td>";
		  	echo "<td>".$descripcion."</td>";


		    echo "<td><a href='../trabajadores/detalles_trabajadores.php?trabajador_id=".$trabajador_id."'>".$nombre."</td>";	
  		    echo "<td><a href='../sucursales/detalles_sucursales.php?sucursal_id=".$sucursal_id."'>".$nombre_sucursal."</a></td>";		
  		     //echo "<td>".$telefono."</td>";	
  		 	 //echo "<td>".$celular."</td>";
		     //echo "<td>".$sueldo."</td>";	
  		 	 
		   ;
		  
          		  
					}
					
				
	
	       ?>
           <?php 
					    
					 $result = $base_datos->sql_query($cliente->contarClientesxServiciosNaturales($cliente_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number 			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								 echo "<td colspan='4'>Cantidad total de servicios en curso</td>";
								echo "<td align='center'>";							
								 echo $number;
								echo "</td>";  
								echo "</tr>";            
	 ?> 
                  
	</th>
        </div>
        </table>
        </form>
    <form class="form-horizontal well" method="post" name="contact" action="detalles_naturalFecha.php?cliente_id=<?php echo "$cliente_id"?>"
   onSubmit='return Validar(this);' style="border-right-width: 100px; margin-left: 0px; margin-top: -80px; border-left-width: 100px;  height: 100%;">
         <table id="Exportar_a_Excel3" width="100%" border="1" cellpadding="0" cellspacing="0">
        <h2 style="color:#ECF2F8;">Detalles Servicios Finalizados</h2>
  
        <p><span class="label label-primary" for="input02">Buscar Servicios finalizados por fecha inicio entre</span> <input readonly="readonly" type="text" id="fecha_inicio1" name="fecha_inicio1" size="20" value=""> <span class="label label-primary" for="input02"> Y</span>  <input readonly="readonly" type="text" id="fecha_inicio2" name="fecha_inicio2" size="20" value="">
      <input readonly="readonly" type="hidden" id="cliente_id" name="cliente_id" size="20" value="<?php echo $cliente_id?>">
      
          <button type="submit" class="btn btn-primary" />Buscar</button>
          <br><br></p>
        <thead>
		
		<tr class ='light'>
        <th>Nombre</th>		
		<th>Fecha Inicio</th>
	    <th>Descripcion</th>
        <th>Trabajador Encargado</th>
		<th>Sucursal Asociada</th>		

		     </tr>
						</thead>
                    <tbody>
					 
					
					   <?php 
					   
					 $result = $base_datos->sql_query($cliente->listarClientesxServiciosNaturales2($cliente_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  $servicio_id               = $row['servicio_id'];
					  $sucursal_id               = $row['sucursal_id'];
					  $trabajador_id             = $row['trabajador_id'];
					  $nombre_servicio			 = $row['nombre_servicio'];
					  $estado_servicio 		     = $row['estado_servicio'];
					  $fecha_creacion			 = $row['fecha_creacion'];
					  $descripcion               = $row['descripcion'];
					  $nombre                    = $row['nombre'];
					  $nombre_sucursal           = $row['nombre_sucursal'];
					  
					 
	         
		
			 echo "<tr align='center' class = 'light'>";
			 //echo "<th>".$servicio_id."</a></th>"; 
	        echo "<td><a href='../servicios/detalles_servicio.php?servicio_id=".$servicio_id."'>".$nombre_servicio."</a></td>";
						echo "<td>";		
			 echo $fecha_creacion = date('d/m/Y', strtotime($fecha_creacion));
			 echo "</td>";
			 
		  	echo "<td>".$descripcion."</td>";


		    echo "<td><a href='../trabajadores/detalles_trabajadores.php?trabajador_id=".$trabajador_id."'>".$nombre."</td>";	
  		    echo "<td><a href='../sucursales/detalles_sucursales.php?sucursal_id=".$sucursal_id."'>".$nombre_sucursal."</a></td>";		
  		     //echo "<td>".$telefono."</td>";	
  		 	 //echo "<td>".$celular."</td>";
		     //echo "<td>".$sueldo."</td>";	
  		 	 
		   ;
		  
          		  
					}
					
				

	       ?>
           
            
           
           
           
           <?php 
					    
					 $result = $base_datos->sql_query($cliente->contarClientesxServiciosNaturales2($cliente_id));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number 			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								 echo "<td colspan='4'>Cantidad total de servicios finalizados</td>";
								echo "<td align='center'>";							
								 echo $number;
								echo "</td>";  
								echo "</tr>";  
								          
	 ?> 
	</th>
        </div>
        </table>
        
</form>

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