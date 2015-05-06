-- MySQL dump 10.13  Distrib 5.6.16, for Win32 (x86)
--
-- Host: localhost    Database: lagomarsino
-- ------------------------------------------------------
-- Server version	5.6.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(32) DEFAULT NULL,
  `comuna` varchar(32) DEFAULT NULL,
  `ciudad` varchar(32) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `banco` varchar(32) NOT NULL,
  `rut` varchar(32) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (32,'munizaga 182','Valparaiso','Valparaiso',283165,93191539,'gianlago@hotmail.com','SANTANDER','16.813.908-K','0000-00-00','2014-11-21'),(33,'Avda. Pedro Montt 2432 ','Valparaiso','Valparaisos',2469696,93191539,'contacto@piddo.cl','BCI','76.522.480-2','0000-00-00','0000-00-00'),(35,'Avenida Andres Bello 2687','Las Condes','Santiago',224602222,99867456,'contacto@agunsa.cl','Santander','96.566.940-K','0000-00-00','0000-00-00'),(36,'Avenida Libertad 1045','viÃ±a del mar','viÃ±a del mar',322267300,912345679,'contacto@verschae.cl','BCI','82.022.900-2','2014-08-26','2014-08-26');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juridicos`
--

DROP TABLE IF EXISTS `juridicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juridicos` (
  `juridico_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(64) DEFAULT NULL,
  `razon_social` varchar(32) DEFAULT NULL,
  `giro` varchar(32) DEFAULT NULL,
  `representante_legal` varchar(64) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`juridico_id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `juridicos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juridicos`
--

LOCK TABLES `juridicos` WRITE;
/*!40000 ALTER TABLE `juridicos` DISABLE KEYS */;
INSERT INTO `juridicos` VALUES (8,'Piddo','MOTORES PIDDO VALPARAISO LIMITAD','Importador - Exportador','Franco Piddo',33),(10,'Verschae S.A.','Transporte','Sociedad De Transporte De Person','Alfonso Verschae',36),(58,'AGUNSA','Agencias Universales S.A.','PORTUARIO','AGENCIAS UNIVERSALES S A',35);
/*!40000 ALTER TABLE `juridicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `naturales`
--

DROP TABLE IF EXISTS `naturales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `naturales` (
  `naturales_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) DEFAULT NULL,
  `apellido_paterno` varchar(32) DEFAULT NULL,
  `apellido_materno` varchar(32) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`naturales_id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `naturales_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `naturales`
--

LOCK TABLES `naturales` WRITE;
/*!40000 ALTER TABLE `naturales` DISABLE KEYS */;
INSERT INTO `naturales` VALUES (1,'Gianfranco','Lagomarsino','Lencioni',32);
/*!40000 ALTER TABLE `naturales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago_proveedores`
--

DROP TABLE IF EXISTS `pago_proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago_proveedores` (
  `pago_proveedores_id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad_producto` int(11) DEFAULT NULL,
  `total_producto` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `pagos_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pago_proveedores_id`),
  KEY `producto_id` (`producto_id`),
  KEY `pagos_id` (`pagos_id`),
  CONSTRAINT `pago_proveedores_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`),
  CONSTRAINT `pago_proveedores_ibfk_2` FOREIGN KEY (`pagos_id`) REFERENCES `pagos` (`pagos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_proveedores`
--

LOCK TABLES `pago_proveedores` WRITE;
/*!40000 ALTER TABLE `pago_proveedores` DISABLE KEYS */;
INSERT INTO `pago_proveedores` VALUES (89,5,2500,1,63,141),(90,10,5000,1,63,141),(91,4,400,1,69,142),(92,3,300,1,69,143),(93,5,2500,1,63,144),(94,9,63000,1,70,145),(95,123,15129,0,71,NULL),(96,50,25000,0,63,NULL),(97,30,15000,0,63,NULL);
/*!40000 ALTER TABLE `pago_proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `pagos_id` int(11) NOT NULL AUTO_INCREMENT,
  `monto_pago` int(11) DEFAULT NULL,
  `pagado` varchar(10) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `forma_pago` varchar(10) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `deuda` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `producto_id` int(11) NOT NULL,
  PRIMARY KEY (`pagos_id`),
  KEY `producto_id` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (141,5000,'pendiente','2014-04-11','efectivo','2014-04-10','2014-04-10',0,1,63),(142,400,'Pagado','2014-04-19','efectivo','2014-04-10','2014-04-10',0,1,69),(143,300,'Pagado','2014-04-19','efectivo','2014-04-10','2014-04-10',0,1,69),(144,2500,'pendiente','2014-05-30','efectivo','2014-05-30','2014-05-30',0,1,63),(145,63000,'Pagado','2014-05-30','efectivo','2014-05-30','2014-05-30',0,1,70);
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(32) DEFAULT NULL,
  `descripcion` varchar(128) DEFAULT NULL,
  `marca` varchar(32) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_termino` date DEFAULT NULL,
  `precio_unitario` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `valor_total` int(11) DEFAULT NULL,
  `proveedor_id` int(11) NOT NULL,
  PRIMARY KEY (`producto_id`),
  KEY `proveedor_id` (`proveedor_id`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`proveedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (63,'Golillas','golillas cobre','s/m','2014-04-09','2014-04-09',500,1000,241,0,241000,15),(69,'inyectores','asd','asda','2014-04-09','2014-04-09',100,200,48,0,9600,16),(70,'inyector chino','inyector alternativo','chaihu','2014-05-30','2014-05-30',7000,8000,0,0,8000,15),(71,'asdas','asda','asda','2014-08-26','2014-08-26',123,12331,93,0,1146783,15);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedores` (
  `proveedor_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(32) DEFAULT NULL,
  `direccion_proveedor` varchar(64) DEFAULT NULL,
  `email_proveedor` varchar(32) DEFAULT NULL,
  `rut_proveedor` varchar(32) DEFAULT NULL,
  `telefono_proveedor` int(11) DEFAULT NULL,
  `celular_proveedor` int(11) DEFAULT NULL,
  PRIMARY KEY (`proveedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (15,'Emasa','Avenida Irarrazaval 259, santiago','contacto@emasa.cl','91.776.000-4',225203100,84526754),(16,'Bosch','Avenida Americo Vespucio Norte 2, santiago','contacto@bosch.cl','84.716.400-K',226208700,91233824);
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios` (
  `servicio_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_servicio` varchar(32) DEFAULT NULL,
  `estado_servicio` varchar(32) DEFAULT NULL,
  `descripcion` varchar(128) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `total_productos` int(11) DEFAULT NULL,
  `trabajador_id` int(11) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `ventas_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`servicio_id`),
  KEY `trabajador_id` (`trabajador_id`),
  KEY `ventas_id` (`ventas_id`),
  CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`trabajador_id`) REFERENCES `trabajadores` (`trabajador_id`),
  CONSTRAINT `servicios_ibfk_2` FOREIGN KEY (`ventas_id`) REFERENCES `ventas` (`ventas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (32,'calibrar inyectores3','0','extraer bombas inyectoras y calibrarlos','2014-02-25','2014-02-25',NULL,30,3,32,182),(33,'Revisar Inyectores','0','comprobar estado de inyectores','2014-02-25','2014-02-25',NULL,30,3,32,183),(34,'prueba sin otros registros','0','prueba sin otros registros','2014-02-25','2014-03-03',NULL,31,3,32,187),(35,'prueba ','0','prueba','2014-02-25','2014-03-04',NULL,32,3,32,187),(36,'prueba 4','0','prueba4','2014-03-04','2014-03-04',NULL,30,3,32,188),(37,'prueba 5','0','prueba5','2014-03-04','2014-03-04',NULL,31,3,32,189),(38,'prueba con lukas','0','lukas 2','2014-03-06','2014-03-25',NULL,32,3,36,190),(39,'prueba','0','pruebasrs','2014-03-25','2014-11-21',NULL,30,3,32,198),(40,'asd','0','asda','2014-04-17','2014-04-17',NULL,30,3,35,195),(41,'asda','0','sdasda','2014-04-17','2014-04-17',NULL,30,3,35,193),(42,'prueba eliminar','1','drop','2014-08-26','2014-08-26',NULL,30,3,32,NULL),(43,'probando','1','probando muchas cosas','2014-11-19','2014-11-19',NULL,31,4,33,NULL);
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios_as_productos`
--

DROP TABLE IF EXISTS `servicios_as_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios_as_productos` (
  `servicios_as_productos_id` int(11) NOT NULL AUTO_INCREMENT,
  `servicio_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `ventas_id` int(11) NOT NULL,
  `cantidad_servicio` int(11) NOT NULL,
  `valor_servicio` int(11) DEFAULT NULL,
  PRIMARY KEY (`servicios_as_productos_id`),
  KEY `servicio_id` (`servicio_id`,`producto_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `servicios_as_productos_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=372 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios_as_productos`
--

LOCK TABLES `servicios_as_productos` WRITE;
/*!40000 ALTER TABLE `servicios_as_productos` DISABLE KEYS */;
INSERT INTO `servicios_as_productos` VALUES (362,41,63,0,20,20000),(363,0,70,194,8,64000),(364,39,63,0,30,30000),(365,32,69,0,2,400),(366,39,69,0,2,400),(367,43,63,0,32,32000),(368,43,69,0,5,1000),(369,0,71,196,30,369930),(370,0,63,197,100,100000),(371,0,63,199,30,30000);
/*!40000 ALTER TABLE `servicios_as_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursales`
--

DROP TABLE IF EXISTS `sucursales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursales` (
  `sucursal_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_sucursal` varchar(32) DEFAULT NULL,
  `nombre_encargado` varchar(32) DEFAULT NULL,
  `direccion_sucursal` varchar(32) DEFAULT NULL,
  `ciudad` varchar(32) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `giro` varchar(32) NOT NULL,
  `rut` varchar(15) NOT NULL,
  PRIMARY KEY (`sucursal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursales`
--

LOCK TABLES `sucursales` WRITE;
/*!40000 ALTER TABLE `sucursales` DISABLE KEYS */;
INSERT INTO `sucursales` VALUES (3,'San  Felipe','Romina Lagomarsino','gran bretana 281','asd',993191539,'rlagomarsino@yahoo.com','asd','16.813.908-K'),(4,'Valparaiso','Romina Lagomarsino','gran bretana 281','Valparaiso',322346019,'rlagomarsino@yahoo.com','taller','16.813.908-K'),(5,'Santiago','pierangela lagomarsino','baquedano 87','Santiago',993191539,'mlencionil@hotmail.com','laboratorio diesel','16.813.908-K');
/*!40000 ALTER TABLE `sucursales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tareas`
--

DROP TABLE IF EXISTS `tareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tareas` (
  `tarea_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tarea` varchar(32) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  PRIMARY KEY (`tarea_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas`
--

LOCK TABLES `tareas` WRITE;
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
INSERT INTO `tareas` VALUES (18,'prueba',1600),(19,'calibrar inyectores',40000),(20,'prueba5',1500),(21,'asda',123),(22,'extraer inyectores',30000);
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tareas_as_servicios`
--

DROP TABLE IF EXISTS `tareas_as_servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tareas_as_servicios` (
  `tareas_as_servicios_id` int(11) NOT NULL AUTO_INCREMENT,
  `tarea_id` int(11) DEFAULT NULL,
  `servicio_id` int(11) DEFAULT NULL,
  `fecha_tarea` date DEFAULT NULL,
  PRIMARY KEY (`tareas_as_servicios_id`),
  KEY `fecha_tarea` (`fecha_tarea`),
  KEY `servicio_id` (`servicio_id`),
  KEY `fecha_tarea_2` (`fecha_tarea`),
  KEY `tarea_id` (`tarea_id`),
  CONSTRAINT `tareas_as_servicios_ibfk_1` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`servicio_id`),
  CONSTRAINT `tareas_as_servicios_ibfk_2` FOREIGN KEY (`tarea_id`) REFERENCES `tareas` (`tarea_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas_as_servicios`
--

LOCK TABLES `tareas_as_servicios` WRITE;
/*!40000 ALTER TABLE `tareas_as_servicios` DISABLE KEYS */;
INSERT INTO `tareas_as_servicios` VALUES (22,18,39,'2014-04-09'),(23,19,39,'2014-04-09'),(24,19,39,'2014-04-09'),(25,20,39,'2014-04-09'),(26,18,39,'2014-04-09'),(27,18,41,'2014-04-18'),(28,18,41,'2014-04-18'),(29,18,39,'2014-05-13'),(30,19,42,'2014-11-18'),(31,19,43,'2014-11-19'),(32,22,43,'2014-11-19');
/*!40000 ALTER TABLE `tareas_as_servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajadores`
--

DROP TABLE IF EXISTS `trabajadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajadores` (
  `trabajador_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) DEFAULT NULL,
  `apellido_paterno` varchar(32) DEFAULT NULL,
  `apellido_materno` varchar(32) DEFAULT NULL,
  `rut` varchar(13) DEFAULT NULL,
  `direccion` varchar(32) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `sueldo` int(11) DEFAULT NULL,
  `pago_trabajadores_id` int(11) DEFAULT NULL,
  `afp_id` int(11) DEFAULT NULL,
  `salud_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`trabajador_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajadores`
--

LOCK TABLES `trabajadores` WRITE;
/*!40000 ALTER TABLE `trabajadores` DISABLE KEYS */;
INSERT INTO `trabajadores` VALUES (30,'Gianfranco','Lagomarsino','Lencioni','16.813.908-K','munizaga 182',2283165,3191539,300000,NULL,NULL,NULL),(31,'paola rosalba','aballay','aballay','12.124.532-9','sausalito 234',12354366,12342567,300000,NULL,NULL,NULL),(32,'judith','abadi ','abadi','15.015.878-8','CANADA 2550 POBL INDEPENDENCIA ',456123,12395121,150000,NULL,NULL,NULL);
/*!40000 ALTER TABLE `trabajadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) DEFAULT NULL,
  `rut` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nombre` varchar(32) DEFAULT NULL,
  `apellido_paterno` varchar(32) DEFAULT NULL,
  `apellido_materno` varchar(32) DEFAULT NULL,
  `telefono_usuario` int(11) DEFAULT NULL,
  `celular_usuario` int(11) DEFAULT NULL,
  `direccion` varchar(32) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `privilegios` varchar(32) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  UNIQUE KEY `usuarios_PK` (`usuario_id`),
  KEY `sucursal_id` (`sucursal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'gian','16.813.908-k','123','Gian','Lagomarsino','Lencioni',2283165,2283165,'asd','gianlago@hotmail.com','0000-00-00','2014-04-28','Administrador',0),(10,'lukas','15.740.741-4','123','Lukas','Riveros','Letelier',2283165,2283165,'munizaga 182','asdasda@hotmail.com','2014-02-25','2014-04-01','Administrador',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `ventas_id` int(11) NOT NULL AUTO_INCREMENT,
  `monto_pago` int(11) DEFAULT NULL,
  `pagado` varchar(10) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `forma_pago` varchar(20) DEFAULT NULL,
  `titular_cheque` varchar(45) DEFAULT NULL,
  `serie_cheque` varchar(20) DEFAULT NULL,
  `nombre_banco` varchar(20) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `cantidad_abono` int(11) DEFAULT NULL,
  `cuota` int(11) DEFAULT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`ventas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (179,4500,'Pagado','2014-02-25','Efectivo','','','','2014-02-25','2014-02-25',0,0,1),(180,6860000,'Pagado','2014-02-25','Efectivo','','','','2014-02-25','2014-02-25',0,0,1),(181,65000,'Pagado','2014-02-25','Efectivo','','','','2014-02-25','2014-02-25',0,0,1),(182,324600,'Pagado','2014-02-25','Efectivo','','','','2014-02-25','2014-02-25',0,0,1),(183,575750,'Pagado','2014-02-25','Efectivo','','','','2014-02-25','2014-02-25',0,0,1),(184,664700,'Pagado','2014-02-27','Efectivo','','','','2014-02-25','2014-02-25',0,0,1),(185,2300,'Pagado','2014-02-25','Efectivo','','','','2014-02-25','2014-02-25',0,0,1),(186,500,'Pagado','2014-02-27','Efectivo','','','','2014-02-27','2014-02-27',0,0,1),(187,460000,'Pendiente','2014-03-05','Cheque al dia','juan guzman','132154654','bci','2014-03-04','2014-03-04',92000,5,1),(188,3500,'Pagado','2014-03-04','Efectivo','','','','2014-03-04','2014-03-04',0,0,1),(189,432000,'Pagado','2014-03-04','Efectivo','','','','2014-03-04','2014-03-04',0,0,1),(190,500,'Pendiente','2014-03-04','Efectivo','','','','2014-03-25','2014-03-25',0,0,1),(191,500,'Pendiente','2014-03-31','Efectivo','','','','2014-03-31','2014-03-31',0,0,1),(192,0,'','0000-00-00','','','','','0000-00-00','0000-00-00',0,0,0),(193,20000,'Pendiente','2014-04-30','Efectivo','','','','2014-04-18','2014-04-18',0,0,1),(194,512000,'Pagado','2014-05-30','Efectivo','','','','2014-05-30','2014-05-30',0,0,1),(195,0,'Pendiente','2014-11-21','Efectivo','','','','2014-11-21','2014-11-21',0,0,1),(196,11097900,'Pagado','2014-11-28','Efectivo','','','','2014-11-21','2014-11-21',0,0,1),(197,10000000,'Pendiente','2014-11-22','Efectivo','','','','2014-11-21','2014-11-21',0,0,1),(198,116700,'Pendiente','2014-11-21','Efectivo','','','','2014-11-21','2014-11-21',0,0,1),(199,900000,'Pagado','2014-11-22','Efectivo','','','','2014-11-21','2014-11-21',0,0,1);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-23 23:42:02
