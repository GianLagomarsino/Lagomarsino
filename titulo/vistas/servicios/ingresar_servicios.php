<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?PHP
$ruta = "../../";
        $ruta_archivos= "../";
		include ('../master_pages/headernuevo.php');
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
<body background="./../../../img/backgrounds/aqua.jpg">

<form id="form" class="form-horizontal well" style="border-right-width: 98px; margin-left: 0px; border-left-width: 98px; border-top-width: 98px;" onsubmit="return validar(this);" name="form" action="servicio_ingresado.php" method="post">
        <fieldset>
          <h2 style="color:white;">Ingresar Servicios</h2>


  <table width="200" border="0">
  <td height="29" class="dark">
   <span class="label label-primary">Cliente:
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
        </span></td>



                <tr class="dark">

            <td><span class="label label-primary" for="input01">Servicio</span>
           <td> <input class="input-xlarge" id="nombre_servicio" name="nombre_servicio"   type="text" onBlur="return validar(event);"></td>

              </tr>


              <input class="input-xlarge" id="estado_servicio" name="estado_servicio" readonly="readonly"  type="hidden" value="1">

             <tr class="dark">

            <td><span class="label label-primary" for="input03">Descripcion</span></td>

              <td>	<input class="input-xlarge" id="descripcion" name="descripcion"   type="text" onBlur="return validar(event);">
              </td> </tr>
 		<input class="input-xlarge" id="estado_servicio" name="estado_servicio" readonly type="hidden" value="1"  />
        <input class="input-xlarge" id="fecha_creacion" name="fecha_creacion" readonly type="hidden" value="<?php echo date("Y-m-d")?>">
 		<input class="input-xlarge" id="fecha_modificacion" name="fecha_modificacion" readonly type="hidden" value="<?php echo date("Y-m-d")?>">
 <tr>
 <td><span class="label label-primary" for="input04">Sucursal</span></td>
                       <td><select id="sucursal_id" name="sucursal_id">

                         <?PHP

								$result=mysql_query("select distinct sucursal_id from sucursales");

						while($row = mysql_fetch_array($result))
						{
							$result2 = mysql_query("select nombre_sucursal,sucursal_id from sucursales where sucursal_id = ".$row['sucursal_id']."");
							while($row2 = mysql_fetch_array($result2))
							{
								echo '<option value='.$row['sucursal_id'].'>'.$row2['nombre_sucursal'].'</option>';
							
							}

						}


           ?>
</tr>
<tr>
 <td><span class="label label-primary" for="input04">Trabajador</span></td>
                       <td><select id="trabajador_id" name="trabajador_id">

                         <?PHP

								$result=mysql_query("select distinct trabajador_id from trabajadores");

						while($row = mysql_fetch_array($result))
						{
							$result2 = mysql_query("select * from trabajadores where trabajador_id = ".$row['trabajador_id']."");
							while($row2 = mysql_fetch_array($result2))
							{
								echo '<option value='.$row['trabajador_id'].'>'.$row2['nombre'].' '.$row2['apellido_paterno'].'</option>';
								 
							}

						}


           ?>

</tr>












  </td>
    <p>&nbsp;</p>



           </table>
          <div class="form-actions">
          <p>&nbsp;</p>
            <button type="submit" class="btn btn-primary">Ingresar</button>
             <button type="reset" class="btn" value=Atr&aacute;s onclick = "javascript:window.location='listar_servicios.php'">Cancelar</button>
		
			 
		
			 
			 
          </div>
        </fieldset>
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

</body>

</html>
