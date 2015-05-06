<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?PHP
$ruta = "../../";
        $ruta_archivos= "../";
		include ('../master_pages/header.php'); 
		include ('../../includes/default.php');
		include ('../../modelos/servicio.php');
		include ('../../modelos/cliente.php');
		include ('../../modelos/sucursal.php');	  
		include ('../../modelos/trabajador.php');	 	 
      $servicio = new servicio();
	  $cliente = new cliente(); 
	  $sucursal = new sucursal(); 
	  $trabajador = new trabajador(); 
	  ?><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laboratorio Diesel Lagomarsino</title>
<link type="text/css" href="../css/menu.css" rel="Stylesheet" /> <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
  <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />



<?PHP //jQuery ?>

<script type="text/javascript">
                            
function validar(form) 
{ 
    var letra = form.nombre_servicio.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar un nombre al servicio");
		form.nombre_servicio.focus();
		return false;
	  }
     
	  

  	  
          var letra = form.estado_servicio.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar estado del servicio");
		form.estado_servicio.focus();
		return false;
	  }
             var letra = form.descripcion.value;
	   if ( letra == null || letra =="") 
	  {
		alert("Debe ingresar una descripcion");
		form.descripcion.focus();
		return false;
	  }        
   
   
  

  }	  
	  
	  </script>
	  
	  </head>
<body>  

<form id="form" class="form-horizontal well" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 98px;" onsubmit="return validar(this);" name="form" action="servicio_ingresado.php" method="post">
        <fieldset>
          <h2>Ingresar Servicios</h2>
	   <table width="326" border="0">
<table width="200" border="0">
                 <tr>
				   	<div class="control-group">
            <label class="control-label" for="input02">Nombre Cliente</label>
            <div class="controls">
              
              
            </div>
                     <?PHP						
					 	$cliente_id = $_POST['clientes'];
						$result = mysql_query("select * from clientes where cliente_id = ".$_POST['clientes'].";");
						while($row = mysql_fetch_array($result))
						{
							$tipo_cliente = " ";
							$result2 = mysql_query("select * from juridicos where cliente_id = ".$row['cliente_id']."");
							while($row2 = mysql_fetch_array($result2))
							{
								echo '<input type="hidden" name="clientes" value='.$row['cliente_id'].'>'.$row2['nombre_empresa'];
								$tipo_cliente = "juridico";
		
							}
							
							$result2 = mysql_query("select * from naturales where cliente_id = ".$row['cliente_id']."");
							while($row2 = mysql_fetch_array($result2))
							{
								echo '<input type="hidden" name="clientes" value='.$row['cliente_id'].'>'.$row2['nombre']." ".$row2['apellido_paterno'];
								$tipo_cliente = "natural";
							}
						}					
					?>
                   </div></th>
                 </tr>	

           
	<div class="control-group">
            <label class="control-label" for="input02">Nombre Servicio</label>
            <div class="controls">
              <input class="input-xlarge" id="nombre_servicio" name="nombre_servicio"   type="text" onBlur="return validar(event);">
              
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="input03">Estado Servicio</label>
            <div class="controls">
              <input class="input-xlarge"  id="estado_servicio" name="estado_servicio" type="text" onBlur="return validar(event);">
            </div>
          </div>

		              </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="input04">Descripcion</label>
            <div class="controls">
              <input class="input-xlarge"  id="descripcion" name="descripcion" type="text" onBlur="return validar(event);">
            </div>
          </div>
		  
		  
		   <div class="control-group" hidden>
            <label for="select01" class="control-label">Sucursal</label>
            <div class="controls">
              <select id="select01" hidden>
                <option>nombre sucursal</option>

              
            </div>
			</div>
     
<?php
			
						$sucursal = new sucursal();					 	
            
						$result = mysql_query("SELECT nombre_sucursal, sucursal_id from sucursales");

						while($row = mysql_fetch_array($result))
						{
                  $nombre_sucursal = $row['nombre_sucursal'];
				  $sucursal_id = $row['sucursal_id'];
							echo "<option value='".$sucursal_id."'>".$nombre_sucursal." </option>";	
						}
						
						
						
?> </select>


  
            </div>
          </div>
		  		   <div class="control-group" hidden>
            <label for="select01" class="control-label">trabajadores</label>
            <div class="controls">
              <select id="select01" hidden>
                <option>nombre trabajadores</option>

              
            </div>
			</div>
     
<?php
			
						$sucursal = new sucursal();					 	
            
						$result = mysql_query("SELECT * from trabajadores");

						while($row = mysql_fetch_array($result))
						{
                  $nombre = $row['nombre'];
				  $trabajador_id = $row['trabajador_id'];
							echo "<option value='".$trabajador_id."'>".$nombre." </option>";	
						}
						
						
						
?> </select>


  
            </div>
          </div>
		  
		  
		  
		  
		  
<p><table width="200" align="center" cellpadding="0" cellspacing="0" id="Pagination" summary="Summary Here">
            <h1>Seleccione un Trabajador</h1>
			<thead>
              <tr>            
                <td>Seleccione</td>
				<td>Trabajador Id</td>
                <td>Nombre Trabajador</td>
                <td>Apellido Paterno</td>                
                <td>Apellido Materno</td>
                        
              </tr>
            </thead>
            <tbody>
               
                 <?php  
                 $trabajador = new trabajador();
                  $result2 = $base_datos->sql_query($trabajador->listarTrabajadores());


                    while($row = $base_datos->sql_fetch_assoc($result2))
                    {

                    	
						$trabajador_id   = $row['trabajador_id'];
                        $nombre = $row['nombre'];
                        $apellido_paterno  = $row['apellido_paterno'];
                        $apellido_materno = $row['apellido_materno'];
                       // $presupuesto   = $row['presupuesto'];
                       // $pago_id       = $row['pago_id'];

                      //  $cliente->getClientesByServicio($sucursal_id,$base_datos);

                            echo "<tr class='dark'>
                            	 <td><input type='radio' name='trabajador_id' value ='$trabajador_id'/>".
								 "<td>".$trabajador_id."</td>".
                            	 "<td>".$nombre."</td>".
                            	 "<td>".$apellido_paterno."</td>".
                            	 "<td>".$apellido_materno."</td>".
                            	 "</tr>";

  //                          	 $cliente->setNombres("");
//                            	 $cliente->setApellidos("");
		    }

						
				?>	           

  <p><table width="200" align="center" cellpadding="0" cellspacing="0" id="Pagination" summary="Summary Here">
            <h1>Seleccione una sucursal</h1>
			<thead>
              <tr>            
                <td>Seleccione</td>
				<td>Sucursal ID</td>
                <td>Nombre Sucursal</td>
                <td>Nombre Encargado</td>                
                <td>Direccion Sucursal</td>
                        
              </tr>
            </thead>
            <tbody>
               
                 <?php  
                 $sucursal = new sucursal();
					 $result2 = $base_datos->sql_query($sucursal->listarSucursales());


                    while($row = $base_datos->sql_fetch_assoc($result2))
                    {

                    	
						$sucursal_id   = $row['sucursal_id'];
                        $nombre_sucursal = $row['nombre_sucursal'];
                        $nombre_encargado  = $row['nombre_encargado'];
                        $direccion_sucursal = $row['direccion_sucursal'];
                       // $presupuesto   = $row['presupuesto'];
                       // $pago_id       = $row['pago_id'];

                      //  $cliente->getClientesByServicio($sucursal_id,$base_datos);

                            echo "<tr class='dark'>
                            	 <td><input type='radio' name='sucursal_id' value ='$sucursal_id'/>".
								 "<td>".$sucursal_id."</td>".
                            	 "<td>".$nombre_sucursal."</td>".
                            	 "<td>".$nombre_encargado."</td>".
                            	 "<td>".$direccion_sucursal."</td>".
                            	 "</tr>";

  //                          	 $cliente->setNombres("");
//                            	 $cliente->setApellidos("");
		    }

						
				?>	




  </select>
  
  
  
  </td>
           
           
           
           </table>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Ingresar</button>
            <button type="reset" class="btn">Cancelar</button>
          </div>
        </fieldset>
</form>
</body>

</html>
