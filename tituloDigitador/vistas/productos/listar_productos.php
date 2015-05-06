<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP 
$ruta = "../../";
$ruta_archivos= "../";

include ("../master_pages/headernuevo.php");
include ("../../includes/default.php");
//include ("../../includes/database.php");
include ("../../modelos/producto.php");




$producto = new producto();

 ?>

<head>

<script language="javascript">
function Validar( contact ){
 var letra = contact.nombre_buscado.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar el nombre del cliente");
  	return false;
  }
  }
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>

     <link href="<?php echo $ruta; ?>bootstrap/css/tables.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $ruta; ?>bootstrap/css/datepicker.css" rel="stylesheet">
<script language="JavaScript">
function confirmar ( mensaje ) {
mensaje = " ¿Esta Seguro De Querer Eliminar El Producto? ";
return confirm( mensaje );

} 
</script>
<script language="javascript">
$(document).ready(function() {
	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
		$("#FormularioExportacion").submit();
});
});


</script>
<style type="text/css">
.botonExcel{cursor:pointer;}
</style>
</head>

<body background="./../../../img/backgrounds/aqua.jpg"> 

           <form method="post" class="form-horizontal well" name="contact" action="listar_productosNombre.php" style="border-right-width: 100px; margin-left: 0px; border-top-width: 100px; border-left-width: 100px;"  onSubmit='return Validar(this);'>
                          <div class="cleaner"></div>  
						  
						  <h2 style="color:white;">Listado De Productos</h2>
                          
                  
          
       <table id="Exportar_a_Excel" width="100%" border="1" cellpadding="0" cellspacing="0">
		 <p><span class="label label-primary" for="input02">Buscar Productos Por Nombre</span> <input type="text" name="nombre_buscado" id="nombre_buscado" size="20" value="">
          <button type="submit" class="btn btn-primary"/>Buscar</button>
          <br><br></p>
        <thead>
		<tr>
        <th>Nombre</th>		
		<th>Descripcion</th>
	    <th>Marca</th>
		<th>Cantidad</th>
 		<th>Precio</th>
		<th>Valor Total</th>
        <th>Agregar Producto</th>
        <th>Vender</th>
        <th>Modificar</th>
        <th>Eliminar</th>
        
		     </tr>
						</thead>
                    <tbody>
					 

				
					   <?php 
					   
					 $result = $base_datos->sql_query($producto->listarProductos());

					while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  $producto_id              = $row['producto_id'];
					  $nombre_producto                = $row['nombre_producto'];
					  $descripcion			             = $row['descripcion'];
					  $marca		             = $row['marca'];
					  $fecha_ingreso             = $row['fecha_ingreso'];
					  $fecha_termino        = $row['fecha_termino'];
					  $precio              = $row['precio'];
	                  $cantidad                  = $row['cantidad'];
					  $descuento                   = $row['descuento'];
					  $valor_total                   = $row['valor_total'];



					 
	         echo "<tr class = 'light'>";
			 //echo "<th>".$cliente_id."</a></th>"; 
	         echo "<th><a href='detalles_producto.php?producto_id=".$producto_id."'>".$nombre_producto."</a></th>";	  
			 echo "<td>".$nombre_producto."</td>";	  		    
	         echo "<td>".$descripcion."</td>";	  		    
			 echo "<td>".$marca."</td>";
	         	  		    
  		     //echo "<td>".$fecha_termino."</td>";
			 			if ($cantidad > 10) {
			echo "<td>";	
			echo "<span class='label label-success' for='input02'>$cantidad<span>";  		    
			echo "</td>";	
}  else {
   			echo "<td>";	
			echo "<span class='label label-danger' for='input02'>$cantidad<span>"; 
}
			echo "</td>";
			 echo "<td>";
			 echo "$"; echo  sprintf( number_format($precio, 0, '.', '.')); 
			 echo "</td>";
		 echo "<td>";
			 echo "$"; echo  sprintf( number_format($valor_total, 0, '.', '.')); 
			 echo "</td>";
		   	 echo "<th><a href='agregar_producto.php?producto_id=".$producto_id."'><img src='../../images/agregar.png'></th>";   		 	 			 echo "<th><a href='ingresar_ventas_formaPago.php?producto_id=".$producto_id."'><img src='../../images/pagar.png'></th>";   		 	 			 echo "<th><a href='modificar_productos.php?producto_id=".$producto_id."'><img src='../../images/edit.png'></th>"; 
			 echo "<th><a href='eliminar_producto.php?producto_id=".$producto_id."'onclick='return confirmar()'><img src='../../images/delete.png'></a></th>";				 
		   
         //*****************
                     
		     
					}
	 ?>
              </tr>
                <?php 
					    
					 $result = $base_datos->sql_query($producto->contarProductos());
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number 			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								  echo "<td colspan='9'>Cantidad De Productos</td>";
								echo "<td>";							
								 echo $number;
								echo "</td>";  
								echo "</tr>";            
	 ?> 
          
              
			 <?php
			 					echo "<tr align='left' class = 'light'>";
								echo "<td colspan='10'>Si la cantidad de stock de productos es igual o mayor a <span class='label label-success' for='input02'>10<span></td>";
								echo "</tr>";  
			 
			 ?>
			
 
					  <?php
					  
					  		echo "<tr align='left' class = 'light'>";
							echo "<td colspan='10'>Si la cantidad de stock de productos es menor a <span class='label label-danger' for='input02'>10<span></td>";	
							 		echo "</tr>";				
								?>
					
          </form>
   
          <form action="../../functions/ficheroExcel.php" method="post" name="FormularioExportacion" target="_blank" id="FormularioExportacion"  style="border-right-width: 100px; margin-left: 0px; border-top-width: 100px; border-left-width: 100px;">
</br>
</br>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
  <tr class="light">
    <td>Exportar a Excel  <img src="../../images/excel.jpg" class="botonExcel" /></td>
    <td>Imprimir<a href="#" onclick="window.print(); return false;">&nbsp;&nbsp;<img src="../../images/impresora.jpg" width="25" height="25"  alt=""/></a></td>
  </tr>


<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
		   					
 

            </tbody> 
		     
			 </table> </form>
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