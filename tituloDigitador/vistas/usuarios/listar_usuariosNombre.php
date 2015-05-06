<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP 

$ruta = "../../";
$ruta_archivos= "../";
include ("../master_pages/headernuevo.php");
include ("../../includes/default.php");
//include ("../../includes/database.php");
//include ("../../modelos/usuario.php");
//include ("../../modelos/detalles_usuario.php");




$usuario = new usuario();
//$detalles_usuario = new detalles_usuario();
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
mensaje = " �Esta Seguro De Querer Eliminar El Usuario? ";
return confirm( mensaje );

} 
</script>
</head>

<body background="./../../../img/backgrounds/aqua.jpg"> 

<div id="templatemo_main">
  <div id="templatemo_content">
    	<div class="services_box">
          
          
                           <form class="form-horizontal well" method="post" name="contact" action="listar_usuariosNombre.php" style="border-right-width: 100px; margin-left: 0px; border-top-width: 100px; border-left-width: 100px;"onSubmit='return Validar(this);'>
						   <div class="cleaner"></div>
                          
                  <h2 style="color:white;">Listar Usuarios</h2>
          
        <table  width="100%" border="1" cellpadding="0" cellspacing="0">
		

		
		 <p><span class="label label-primary" for="input01">Buscar Usuario Por Login:</span> <input type="text" name="nombre_buscado" size="20" value="">
          <button type="submit" class="btn btn-primary"/>Buscar</button>
          <br><br></p>
        <thead>
		<tr>
        <th>Rut</th>		
		<th>Login</th>
		<th>Nombre Completo</th>
		<th>Telefono</th>
        <th>Celular</th>
		<th>Direccion</th>
        <th>Email</th>
		<th>Privilegios</th>
		<th>Editar</th>
        <th>Eliminar</th>
		     </tr>
						</thead>
                    <tbody>
					 
										    <?php 
					$usuario = new usuario();
					$nombre = $_POST['nombre_buscado'];
		  	if(isset($nombre)){
				$nombre_buscado = $nombre;
				}
				else{
				$nombre_buscado = "";
				}
		  ?>
					
					   <?php 
					   
					 $result = $base_datos->sql_query($usuario->listarUsuariosName($nombre_buscado));

					while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  $usuario_id                = $row['usuario_id'];
					  $login			             = $row['login'];
					  $rut			             = $row['rut'];
					  $nombre		             = $row['nombre'];
					  $apellido_paterno             = $row['apellido_paterno'];
					  $apellido_materno              = $row['apellido_materno'];
	                  $telefono_usuario         = $row['telefono_usuario'];
                      $celular_usuario                  = $row['celular_usuario'];
					  $direccion                   = $row['direccion'];
					  $email                   = $row['email'];
					  //$fecha_creacion                   = $row['fecha_creacion'];
					  $privilegios                   = $row['privilegios'];
					

					 
	         echo "<tr class = 'light'>";
			
			echo "<td>".$rut."</a></td>"; 
			 echo "<td>".$login."</td>";
			echo "<td>".$nombre." ".$apellido_paterno." ".$apellido_materno."</td>";
			 //echo "<td>".$apellido_paterno."</td>";	  		    
  		     //echo "<td>".$apellido_materno."</td>";	
  		     //echo "<td>".$giro."</th>";	
  		     echo "<td>".$telefono_usuario."</td>";	
  		 	 echo "<td>".$celular_usuario."</td>";
			 echo "<td>".$direccion."</td>";
			 echo "<td>".$email."</td>";
			 echo "<td>".$privilegios."</td>";
			
			 
			 
		//	 $tabla .="<td><p>".$fecha_creacion."</p></td>";	
		//	 $tabla .="<td><p>".$fecha_modificacion."</p></td>";
  		//     $tabla .="<td><p>".$estado."</p></td>";			 
		    echo "<th><a href='modificar_usuarios.php?usuario_id=".$usuario_id."'><img src='../../images/edit.png'></th>"; 
			echo "<th><a href='eliminar_usuarios.php?usuario_id=".$usuario_id."'onclick='return confirmar()'><img src='../../images/delete.png'></a></th>";				 	}
	 ?>
              </tr>
             
			 
			    <?php 
					    
					 $result = $base_datos->sql_query($usuario->contarUsuariosNombre($nombre_buscado));
						 while($row = $base_datos->sql_fetch_assoc($result)) {
						
					  
					  $number 			= $row['number'];
					  
						 }
					
          
 								echo "<tr align='right' class = 'light'>";
								  echo "<td colspan='9'>Cantidad total de usuarios</td>";
								echo "<td>";							
								echo $number;
								echo "</td>";  
								echo "</tr>";            
	 ?> 
			 
			 
			
			 
			
 
					  
					
 </tbody> 
		     
			 </table>
			</thead>			
          
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