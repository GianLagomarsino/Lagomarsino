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
 	alert("Debe ingresar el nombre del Producto");
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
mensaje = " �Esta Seguro De Querer Eliminar El Producto? ";
return confirm( mensaje );

} 
</script>
</head>

<body background="./../../../img/backgrounds/aqua.jpg"> 
           <form method="post" class="form-horizontal well" name="contact" action="listar_productosNombre.php" onSubmit='return Validar(this);' style="border-right-width: 100px; margin-left: 0px; border-top-width: 100px; border-left-width: 100px;" onSubmit='return Validar(this);'>
                          <div class="cleaner"></div>  
						  
						  
						  <h2 style="color:white;">Listado De Productos</h2>
                          
                  
          
       <table  width="100%" border="1" cellpadding="0" cellspacing="0">
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
					$producto = new producto();
					$nombre_producto = $_POST['nombre_buscado'];
		  	if(isset($nombre_producto)){
				$nombre_buscado = $nombre_producto;
				}
				else{
				$nombre_buscado = "";
				}
		  ?>
				
					   <?php 
					   
					 $result = $base_datos->sql_query($producto->listarProductosName($nombre_buscado));

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
		   	 echo "<th><a href='agregar_producto.php?producto_id=".$producto_id."'><img src='../../images/agregar.png'></th>";   		 	 			 echo "<th><a href='repuestos_producto.php?producto_id=".$producto_id."'><img src='../../images/pagar.png'></th>";   		 	 			 echo "<th><a href='modificar_productos.php?producto_id=".$producto_id."'><img src='../../images/edit.png'></th>"; 
			 echo "<th><a href='eliminar_producto.php?producto_id=".$producto_id."'onclick='return confirmar()'><img src='../../images/delete.png'></a></th>";				 
		   
					  
					}
				
                     
	 ?>
     
                     <?php 
					    
					 $result = $base_datos->sql_query($producto->contarProductosNombre($nombre_buscado));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number 			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								  echo "<td colspan='9'>Cantidad de productos en relacion al rango seleccionado</td>";
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