<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP 


$ruta = "../../";
        $ruta_archivos= "../";
include ("../master_pages/headernuevo.php");
include ("../../includes/default.php");
//include ("../../includes/database.php");
include ("../../modelos/trabajador.php");




$trabajador = new trabajador();

 ?>

<head>
<script language="javascript">
function Validar( contact ){
 var letra = contact.nombre_buscado.value;
   if ( letra == null || letra =="") 
  {
 	alert("Debe ingresar el nombre del trabajador");
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
mensaje = " �Esta Seguro De Querer Eliminar El Trabajador? ";
return confirm( mensaje );

} 
</script>
</head>

<body background="./../../../img/backgrounds/aqua.jpg"> 
 <form  class="form-horizontal well" method="post" action="listar_trabajadoresNombre.php" style="border-right-width: 100px; margin-left: 0px; border-top-width: 100px; border-left-width: 100px;"onSubmit='return Validar(this);'>
                          <div class="cleaner"></div>
						  
						   <h2 style="color:white">Listado De Trabajadores</h2>
                          
						  
                          
                  
          
       
		 <p><span class="label label-primary" for="input01">Buscar Trabajador Por Nombre:</span>  <input type="text" name="nombre_buscado" size="20" value="">
          <button type="submit" class="btn btn-primary"/>Buscar</button>
          <br><br></p>
        
		 <table  width="100%" border="1" cellpadding="0" cellspacing="0">
		<thead>
	
       	<tr>
 	    <th>Rut</th>       
		<th>Nombre</th>		
		<th>Apellidos </th>
		<th>Direccion</th>
        <th>Telefono</th>
		<th>Celular</th>
       
		<th>Modificar</th>
        <th>Eliminar</th>
		     </tr>
						</thead>
                    <tbody>
					 
					
										    <?php 
					$trabajador = new trabajador();
					$nombre = $_POST['nombre_buscado'];
		  	if(isset($nombre)){
				$nombre_buscado = $nombre;
				}
				else{
				$nombre_buscado = "";
				echo "location = 'listar_trabajadores.php'";
				}
		  ?>
					   <?php 
					   
					 $result = $base_datos->sql_query($trabajador->listarTrabajadoresName($nombre));

					while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  $trabajador_id                = $row['trabajador_id'];
					  $nombre			             = $row['nombre'];
					  $apellido_paterno 		             = $row['apellido_paterno'];
					  $apellido_materno             = $row['apellido_materno'];
					  $rut        = $row['rut'];
					  $direccion              = $row['direccion'];
	                  $telefono                  = $row['telefono'];
					  $celular                   = $row['celular'];
					  $sueldo                   = $row['sueldo'];


	         echo "<tr class = 'light'>";
	         
  		     echo "<th><a href='detalles_Trabajadores.php?trabajador_id=".$trabajador_id."'>".$rut."</a></th>";				 
			 echo "<td>".$nombre."</td>";	  		    
	         echo "<td>".$apellido_paterno." ".$apellido_materno."</td>";	  		    

	         //echo "<th>".$apellido_materno."</th>";	  		    

  		     echo "<td>".$direccion."</td>";	
  		     echo "<td>".$telefono."</td>";	
  		 	 echo "<td>".$celular."</td>";
		    // echo "<td>".$sueldo."</td>";	
  		 	 
		    echo "<th><a href='modificar_trabajador.php?trabajador_id=".$trabajador_id."'><img src='../../images/edit.png'></th>"; 
			echo "<th><a href='eliminar_trabajador.php?trabajador_id=".$trabajador_id."'onclick='return confirmar()'><img src='../../images/delete.png'></a></th>";				    	  					}
	 ?>
              </tr>
              
                              <?php 
					    
					 $result = $base_datos->sql_query($trabajador->contarTrabajadoresNombre($nombre_buscado));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number 			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								  echo "<td colspan='7'>Cantidad total de trabajadores</td>";
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