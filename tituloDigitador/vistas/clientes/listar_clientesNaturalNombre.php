<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP 

$ruta = "../../";
$ruta_archivos= "../";
include ("../master_pages/headernuevo.php");
include ("../../includes/default.php");
//include ("../../includes/database.php");
include ("../../modelos/cliente.php");
include ("../../modelos/naturales.php");




$cliente = new cliente();
$naturales = new naturales();
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
mensaje = " ¿Esta Seguro De Querer Eliminar El Cliente? ";
return confirm( mensaje );

} 
</script>
</head>

<body background="./../../../img/backgrounds/aqua.jpg">  

<div id="templatemo_main">
  <div id="templatemo_content">
    	<div class="services_box">
         
          
          
      <form class="form-horizontal well" method="post" name="contact" action="listar_clientesNaturalNombre.php" style="border-right-width: 100px; margin-left: 0px; border-top-width: 110px; border-left-width: 100px;"onSubmit='return Validar(this);'>
	  <div class="cleaner"></div>
                                     

		   <div class="cleaner"></div>
          <h2 style="color:#ECF2F8;">Listar Clientes Naturales</h2>               
                  
          
        <table  width="100%" border="1" cellpadding="0" cellspacing="0">
		<p><span class="label label-primary" for="input01">Buscar Cliente Natural Por Nombre:</span><input type="text" name="nombre_buscado" size="20" value="">
          <button type="submit" class="btn btn-primary"/>Buscar</button>
          <br><br></p>
        <thead>

	    <th>Rut</th>
        <th>Nombre</th>
		<th>Apellidos</th>
		
		<th>Celular</th>
		<th>Direccion</th>
        <th>Ciudad</th>
        <th>Email</th>
		<th>Banco</th>
		
                <th>Editar</th>
                <th>Eliminar</th>

						</thead>
                    <tbody>
					 
															    <?php 
					$naturales = new naturales();
					$nombre = $_POST['nombre_buscado'];
		  	if(isset($nombre)){
				$nombre_buscado = $nombre;
				}
				else{
				$nombre_buscado = "";
				}
		  ?>
					   <?php 
					   
					 $result = $base_datos->sql_query($naturales->listarClientesNameNatural($nombre_buscado));

					while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  $cliente_id                = $row['cliente_id'];
					  $rut			             = $row['rut'];
					  $nombre 		             = $row['nombre'];
					  $apellido_paterno	             = $row['apellido_paterno'];
					  $apellido_materno	             = $row['apellido_materno'];
					  $celular                   = $row['celular'];
					  $direccion                   = $row['direccion'];
					  $comuna                   = $row['comuna'];
					  $ciudad                   = $row['ciudad'];
					  $email                     = $row['email'];           
					  $banco                   = $row['banco'];        

					 
	      echo "<tr class = 'light'>";
  		  echo "<th><a href='detalles_Natural.php?cliente_id=".$cliente_id."'>".$rut."</a></th>";
  		  echo "<td>".$nombre."</td>";	
          echo "<td>".$apellido_paterno." ".$apellido_materno."</td>";	  		    
  		  echo "<td>".$celular."</td>";
		  echo "<td>".$direccion."</td>";	
  		  //echo "<th>".$comuna."</th>";	
  		   echo "<th>".$ciudad."</th>";
	      echo "<td>".$email."</td>";
		  echo "<td>".$banco."</td>";		 
		  echo "<th><a id='cliente_id' name='cliente_id' href='modificar_clientesNaturales.php?cliente_id=".$cliente_id."'><img src='../../images/edit.png'></th>"; 
		  echo "<th><a href='eliminar_clienteNatural.php?cliente_id=".$cliente_id."'onclick='return confirmar()'><img src='../../images/delete.png'></a></th>";				 	  					}
	 ?>
              </tr>
             
		 <?php 
					    
					 $result = $base_datos->sql_query($cliente->contarClientesNaturalesNombre($nombre_buscado));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number 			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								 echo "<td colspan='9'>Cantidad total de clientes naturales</td>";
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