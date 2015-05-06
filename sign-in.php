<!DOCTYPE html>
<html>
<head>
	<title>Servicio Diesel Lagomarsino</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Styles -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="css/compiled/sign-in.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

    <div class="navbar navbar-inverse navbar-static-top" width="100%" height="55%" role="navigation">
        <div class="container">
            <div class="navbar-header">
                        <a href="index.html"> <img src="img/banner2.png" name="imagen" width="100%" height="55" align="baseline" class="bar" /></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>


            <div class="collapse navbar-collapse navbar-ex1-collapse" role="navigation" style="width:auto ; height:auto">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">INICIO</a></li>
                    <li><a href="about-us.html">NUESTRA EMPRESA</a></li>
                    <li><a href="services.html">SERVICIOS</a></li>
                    <li><a href="products.html">PRODUCTOS</a></li>
                    <li><a href="contact.html">CONTACTENOS</a></li>
                    <li><a href="branch.html">SUCURSALES</a></li>
                    <li class="active"><a href="sign-in.php">LOGIN</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Sign In Option 1 -->
    <div id="sign_in1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 header">
                    <h4>Administrador Lagomarsino</h4>
                    <p>
                       Debe ingresar el nombre de usuario y contraseña paara continuar</p>

                  
                </div>

                <div class="col-sm-3 division">
                    <div class="line l"></div>
                    <span>-</span>
                    <div class="line r"></div>
                </div>

                <div class="col-md-12 footer">
                    
                   	<form class="form-inline" name="frm_ingreso" id="frm_ingreso" method="post"
                    action="titulo/includes/login.php" onsubmit='return Validar(this);'>
                        
                        <input name="login" id="login" type="text" placeholder="Login" class="form-control">
                        <input name="password" id="password" type="password" placeholder="Contraseña" class="form-control">
                        <input type="submit" value="Ingresar">
                    </form>
                </div>

                <div class="col-md-12 proof">
                    <div class="col-md-6 remember">
                       
                    </div>

                    <div class="col-md-6">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    

        <!-- starts footer -->
         <footer id="footer" >
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
                            © 2014 Gianfranco Lagomarsino. All rights reserved.
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </footer>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
</body>
</html>
