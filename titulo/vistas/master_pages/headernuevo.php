<?PHP
 
  include  ("../../modelos/usuario.php");



	   

  $usuario = new usuario();

if($usuario->isLogin() || $usuario->getPrivilegios() == 'Adminitrador'){

}

else { 
  echo "<script language='JavaScript'>";
  
  echo "location = '../../../sign-in.php'";
  echo "</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Servicio Diesel Lagomarsino</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    

    <!-- Styles -->
    <link href="../../../css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../../css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../../css/compiled/theme.css" />

	 
	 
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="../../../ss/compiled/index.css" type="text/css" media="screen" />    
    <link rel="stylesheet" type="text/css" href="../../../css/lib/animate.css" media="screen, projection" />       
	  <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/theme.js"></script>

	
	
	
    <script type="text/javascript" src="../../../js/index-slider.js"></script>

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body class="pull_top">
    
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
        
            <div class="navbar-header">
                <a href="../index/index.php "target="_blank"> <img src="../../images/banner2.png" name="imagen" width="100%" height="55" align="baseline" class="bar" /></a>
			
               
                
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse" role="navigation">
                 
                <ul class="nav navbar-nav navbar-left" style="
    margin-left: -15;
    width: 1024px;
    border-left-width: -15;
">
                 
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes <b class="caret"></b></a>
                        <ul class="dropdown-menu">
          <li><a href="<?php echo $ruta_archivos; ?>clientes/ingresar_clientesNatural.php">Ingresar Clientes Naturales</a></li>
          <li><a href="<?php echo $ruta_archivos; ?>clientes/listar_clientesNatural.php">Listar Clientes Naturales</a></li>
          <li><a href="<?php echo $ruta_archivos; ?>clientes/ingresar_clientesJuridico.php">Ingresar Clientes Juridicos</a></li>
          <li><a href="<?php echo $ruta_archivos; ?>clientes/Listar_clientesJuridico.php">Listar Clientes Juridicos</a></li>
                        </ul>
                    </li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Servicios <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $ruta_archivos; ?>servicios/ingresar_servicios1.php">Ingresar Servicio</a></li>
                            <li><a href="<?php echo $ruta_archivos; ?>servicios/listar_servicios.php">Listar Servicios En Curso</a></li>
                            <li><a href="<?php echo $ruta_archivos; ?>servicios/listar_servicios_terminados.php">Listar Servicios Terminados</a></li>
                            <li><a href="<?php echo $ruta_archivos; ?>servicios/ingresar_tareas.php">Ingresar Tareas</a></li>
                             <li><a href="<?php echo $ruta_archivos; ?>servicios/listar_tareas.php">Listar Tareas</a></li>
                          
                        </ul>
                    </li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proveedores <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $ruta_archivos; ?>proveedores/ingresar_proveedores.php">Ingresar Proveedor</a></li>
                            <li><a href="<?php echo $ruta_archivos; ?>proveedores/listar_proveedores.php">Listar Proveedor</a></li>
                          </ul>
                    </li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $ruta_archivos; ?>productos/ingresar_productos1.php">Ingresar Producto</a></li>
                            <li><a href="<?php echo $ruta_archivos; ?>productos/listar_productos.php">Listar Producto</a></li>
							<li><a href="<?php echo $ruta_archivos; ?>productos/listar_productos_agotados.php">Listar Producto Agotados</a></li>
                          </ul>
                    </li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Trabajadores <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $ruta_archivos; ?>trabajadores/ingresar_trabajadores.php">Ingresar Trabajadores</a></li>
                            <li><a href="<?php echo $ruta_archivos; ?>trabajadores/listar_trabajadores.php">Listar Trabajadores</a></li>
							</ul>
                    </li>
					     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Uuarios <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $ruta_archivos; ?>usuarios/ingresar_usuarios.php">Ingresar Usuarios</a></li>
                            <li><a href="<?php echo $ruta_archivos; ?>usuarios/listar_usuarios.php">Listar Usuarios</a></li>
							</ul>
                    </li>
					    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sucursales <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $ruta_archivos; ?>sucursales/ingresar_sucursales.php">Ingresar Sucursales</a></li>
                            <li><a href="<?php echo $ruta_archivos; ?>sucursales/listar_sucursales.php">Listar Sucursales</a></li>
							</ul>
                    </li>
					    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pagos <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $ruta_archivos; ?>pagos/ingresar_pagos1.php">Ingresar Pagos</a></li>
                            <li><a href="<?php echo $ruta_archivos; ?>pagos/listar_pagos.php">Listar Productos Pendientes</a></li>
							<li><a href="<?php echo $ruta_archivos; ?>pagos/listar_pagos2.php">Listar Productos Pagados</a></li>
							</ul>
                    </li>
					  
					  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ventas <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $ruta_archivos; ?>ventas/ingresar_ventas_formaPago.php" >Ingresar Ventas</a></li>
                            <li><a href="<?php echo $ruta_archivos; ?>ventas/listar_ventas.php" >Listar Ventas De Servicio</a></li>
							<li><a href="<?php echo $ruta_archivos; ?>ventas/listar_ventasProductos.php" >Listar Ventas De Productos</a></li>
							</ul>
                    </li>					
					 <li><a href="../../../logout.php">Cerrar</a></li>
					
                  
                
            </div>
        </div>
    </div>
    </body>
    