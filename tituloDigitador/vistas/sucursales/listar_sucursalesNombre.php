<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP 


$ruta = "../../";
        $ruta_archivos= "../";
include ("../master_pages/headernuevo.php");
include ("../../includes/default.php");
//include ("../../includes/database.php");
include ("../../modelos/sucursal.php");




$sucursal = new sucursal();

 ?>

<head>
<script language="javascript">
function Validar( contact ){
 var letra = contact.nombre_buscado.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar el nombre de la sucursal");
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
mensaje = " �Esta Seguro De Querer Eliminar La Sucursal? ";
return confirm( mensaje );

} 
</script>
</head>

<body background="./../../../img/backgrounds/aqua.jpg"> 
 <form  class="form-horizontal well" method="post" action="listar_sucursalesNombre.php" style="border-right-width: 100px; margin-left: 0px; border-top-width: 100px; border-left-width: 100px;"onSubmit='return Validar(this);'>
                          <div class="cleaner"></div>
						  
						   <h2 style="color:white">Listado De Sucursales</h2>
                          
						  
                          
                  
          
       
		  <p><span class="label label-primary">Buscar Sucursal Por Nombre:</span> <input type="text" name="nombre_buscado" size="20" value="">
           <button type="submit" class="btn btn-primary"/>Buscar</button>
          <br><br></p>
        
		 <table  width="100%" border="1" cellpadding="0" cellspacing="0">
		<thead>
	
       	<tr>
        <th>RUT</th>	
		<th>Nombre Sucursal</th>		
		<th>Nombre Encargado </th>
	    
        <th>Direccion Sucursal</th>
		<th>Ciudad</th>
        <th>Giro</th>
        <th>Telefono</th>
        <th>Email</th>
		<th>Modificar</th>
        <th>Eliminar</th>
		     
						</thead>
                    <tbody>
					 
					 
					
										    <?php 
					$sucursal = new sucursal();
					$nombre_sucursal = $_POST['nombre_buscado'];
		  	if(isset($nombre_sucursal)){
				$nombre_buscado = $nombre_sucursal;
				}
				else{
				$nombre_buscado = "";
				echo "location = 'listar_sucursales.php'";
				}
		  ?>
					   <?php 
					   
					 $result = $base_datos->sql_query($sucursal->listarSucursalesNombre($nombre_buscado));

					while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  $sucursal_id                = $row['sucursal_id'];
					  $nombre_sucursal			             = $row['nombre_sucursal'];
					  $nombre_encargado 		             = $row['nombre_encargado'];
					  $direccion_sucursal             = $row['direccion_sucursal'];
					  $telefono                = $row['telefono'];
					  $ciudad                = $row['ciudad'];
					  $giro	             = $row['giro'];
					  $rut 		             = $row['rut'];
					  $email             = $row['email'];
					  //$servicio_id        = $row['servicio_id'];



	         echo "<tr class = 'light'>";
	         echo "<th><a href='detalles_sucursales.php?sucursal_id=".$sucursal_id."'>".$rut."</a></th>";
			 echo "<td>".$nombre_sucursal."</td>";	  		    
	         echo "<td>".$nombre_encargado."</td>";	  		    
  		     echo "<td>".$direccion_sucursal."</td>";
			 echo "<td>".$ciudad."</td>";	  		    
	         echo "<td>".$giro."</td>";	  		    
  		     echo "<td>".$telefono."</td>";	
			 echo "<td>".$email."</td>";	
             
		    echo "<th><a href='modificar_sucursales.php?sucursal_id=".$sucursal_id."'><img src='../../images/edit.png'></th>"; 
			echo "<th><a href='eliminar_sucursal.php?sucursal_id=".$sucursal_id."'onclick='return confirmar()'><img src='../../images/delete.png'></a></th>";				 
		    	  					}
	 ?>
              </tr>
              
              			    <?php 
					    
					 $result = $base_datos->sql_query($sucursal->contarSucursalesNombre($nombre_buscado));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number 			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								  echo "<td colspan='9'>Cantidad total de sucursales segun el rango buscado</td>";
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