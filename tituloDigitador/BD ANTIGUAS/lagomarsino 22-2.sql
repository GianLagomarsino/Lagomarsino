-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-02-2014 a las 21:13:51
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lagomarsino`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adelantos`
--

CREATE TABLE IF NOT EXISTS `adelantos` (
  `adelanto_id` int(11) NOT NULL,
  `monto_adelanto` int(11) DEFAULT NULL,
  `fecha_adelanto` int(11) DEFAULT NULL,
  `ultimo_adelanto` date DEFAULT NULL,
  `trabajador_id` int(11) NOT NULL,
  PRIMARY KEY (`adelanto_id`),
  KEY `trabajador_id` (`trabajador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afp`
--

CREATE TABLE IF NOT EXISTS `afp` (
  `afp_id` int(11) NOT NULL,
  `nombre_aseguradora` varchar(32) DEFAULT NULL,
  `tipo_poliza` varchar(32) DEFAULT NULL,
  `poliza` int(11) DEFAULT NULL,
  `porcentaje_descuento` double DEFAULT NULL,
  `trabajador_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`afp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `direccion`, `comuna`, `ciudad`, `telefono`, `celular`, `email`, `banco`, `rut`, `fecha_creacion`, `fecha_modificacion`) VALUES
(32, 'munizaga 182', 'Valparaiso', 'Valparaiso', 283165, 93191539, 'gianlago@hotmail.com', 'SANTANDER', '16.813.908-K', '2014-02-07', '2014-02-07'),
(33, 'Avda. Pedro Montt 2432 ', 'Valparaiso', 'Valparaisos', 2469696, 93191539, 'contacto@piddo.cl', 'BCI', '76.522.480-2', '2014-02-07', '2014-02-07'),
(34, 'AV. ALEMANIA 7114 CERRO MARIPOSA', 'Valparaiso', 'Valparaiso', 321234, 93217845, 'raballay@hotmail.com', 'santander', '17.793.357-0', '2014-02-07', '2014-02-07'),
(35, 'Avenida Andrés Bello 2687', 'Las Condes', 'Santiago', 224602222, 99867456, 'contacto@agunsa.cl', 'Santander', '96.566.940-K', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juridicos`
--

CREATE TABLE IF NOT EXISTS `juridicos` (
  `juridico_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(64) DEFAULT NULL,
  `razon_social` varchar(32) DEFAULT NULL,
  `giro` varchar(32) DEFAULT NULL,
  `representante_legal` varchar(64) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`juridico_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `juridicos`
--

INSERT INTO `juridicos` (`juridico_id`, `nombre_empresa`, `razon_social`, `giro`, `representante_legal`, `cliente_id`) VALUES
(8, 'Piddo', 'MOTORES PIDDO VALPARAISO LIMITAD', 'Importador - Exportador', 'Franco Piddo', 33),
(9, 'agunsa', 'AGENCIAS UNIVERSALES S.A', 'naviera', 'representante agunsa', 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `naturales`
--

CREATE TABLE IF NOT EXISTS `naturales` (
  `naturales_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) DEFAULT NULL,
  `apellido_paterno` varchar(32) DEFAULT NULL,
  `apellido_materno` varchar(32) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`naturales_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `naturales`
--

INSERT INTO `naturales` (`naturales_id`, `nombre`, `apellido_paterno`, `apellido_materno`, `cliente_id`) VALUES
(11, 'Gianfranco ', 'Lagomarsino', 'Lencioni', 32),
(12, 'Roberto', 'Aballay', 'Figueroa', 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
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
  PRIMARY KEY (`pagos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`pagos_id`, `monto_pago`, `pagado`, `fecha_pago`, `forma_pago`, `fecha_creacion`, `fecha_modificacion`, `deuda`, `estado`, `producto_id`) VALUES
(95, 750000, 'Pagado', '2014-02-06', 'efectivo', '2014-02-07', '2014-02-07', 0, 1, 46),
(96, 750000, 'pendiente', '2014-02-15', 'efectivo', '2014-02-07', '2014-02-07', 0, 1, 46),
(97, 40000, 'pendiente', '2014-02-07', 'efectivo', '2014-02-07', '2014-02-07', 0, 1, 49),
(98, 6000, 'Pagado', '2014-02-07', 'efectivo', '2014-02-07', '2014-02-07', 0, 1, 48),
(99, 750000, 'pendiente', '2014-02-07', 'efectivo', '2014-02-07', '2014-02-07', 0, 1, 47),
(100, 15000000, 'Pagado', '2014-02-12', 'efectivo', '2014-02-13', '2014-02-13', 0, 1, 47),
(101, 6000, 'Pagado', '2014-02-12', 'efectivo', '2014-02-13', '2014-02-13', 0, 1, 50),
(102, 6500, 'Pagado', '2014-02-18', 'efectivo', '2014-02-18', '2014-02-18', 0, 1, 50),
(103, 2000, 'Pagado', '2014-02-18', 'efectivo', '2014-02-18', '2014-02-18', 0, 1, 50),
(104, 2500, 'Pagado', '2014-02-18', 'efectivo', '2014-02-18', '2014-02-18', 0, 1, 50),
(105, 2500, 'Pagado', '2014-02-18', 'efectivo', '2014-02-18', '2014-02-18', 0, 1, 50),
(106, 750000, 'pendiente', '2014-02-18', 'efectivo', '2014-02-18', '2014-02-18', 0, 1, 51),
(107, 0, 'pendiente', '2014-02-18', 'efectivo', '2014-02-18', '2014-02-18', 0, 1, 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_proveedores`
--

CREATE TABLE IF NOT EXISTS `pago_proveedores` (
  `pago_proveedores_id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad_producto` int(11) DEFAULT NULL,
  `total_producto` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pago_proveedores_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Volcado de datos para la tabla `pago_proveedores`
--

INSERT INTO `pago_proveedores` (`pago_proveedores_id`, `cantidad_producto`, `total_producto`, `estado`, `producto_id`) VALUES
(51, 50, 750000, 1, 51),
(52, 0, 0, 1, 52),
(53, 100, 1500000, 0, 51);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_trabajadores`
--

CREATE TABLE IF NOT EXISTS `pago_trabajadores` (
  `pago_trabajadores_id` int(11) NOT NULL,
  `total_pagos_trabajadores` int(11) DEFAULT NULL,
  `pagos_id` int(11) DEFAULT NULL,
  `trabajador_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pago_trabajadores_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
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
  PRIMARY KEY (`producto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `nombre_producto`, `descripcion`, `marca`, `fecha_ingreso`, `fecha_termino`, `precio_unitario`, `precio`, `cantidad`, `descuento`, `valor_total`, `proveedor_id`) VALUES
(51, 'inyectores', 'originales', 'bosch', '2014-02-18', '2014-02-18', 15000, 20000, 23, 0, 460000, 16),
(52, 'inyectores alternativos', 'alternativos', 'bosch china', '2014-02-18', '2014-02-18', 100000, 150000, 0, 0, 0, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `proveedor_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(32) DEFAULT NULL,
  `direccion_proveedor` varchar(32) DEFAULT NULL,
  `email_proveedor` varchar(32) DEFAULT NULL,
  `rut_proveedor` varchar(32) DEFAULT NULL,
  `telefono_proveedor` int(11) DEFAULT NULL,
  `celular_proveedor` int(11) DEFAULT NULL,
  PRIMARY KEY (`proveedor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`proveedor_id`, `nombre_proveedor`, `direccion_proveedor`, `email_proveedor`, `rut_proveedor`, `telefono_proveedor`, `celular_proveedor`) VALUES
(15, 'Emasa', 'Avenida Irarrázaval 259, santiag', 'contacto@emasa.cl', '91.776.000-4', 225203100, 84526754),
(16, 'Bosch', 'Avenida Américo Vespucio Norte 2', 'contacto@bosch.cl', '84.716.400-K', 226208700, 91233824);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salud`
--

CREATE TABLE IF NOT EXISTS `salud` (
  `salud_id` int(11) NOT NULL,
  `tipo_provicion` varchar(32) DEFAULT NULL,
  `provicion_numero` int(11) DEFAULT NULL,
  `total_descuento` double DEFAULT NULL,
  `trabajador_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`salud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
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
  PRIMARY KEY (`servicio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`servicio_id`, `nombre_servicio`, `estado_servicio`, `descripcion`, `fecha_creacion`, `fecha_modificacion`, `total_productos`, `trabajador_id`, `sucursal_id`, `cliente_id`, `ventas_id`) VALUES
(23, 'Revisar Inyectores', '0', 'revisar y calibrar inyectores', '2014-02-07', '2014-02-07', NULL, 30, 3, 33, 107),
(24, 'calibrar inyectores3', '0', 'calibrar', '2014-02-07', '2014-02-07', NULL, 30, 3, 35, 72),
(25, 'Calibrar bomba', '0', 'asd', '2014-02-17', '2014-02-17', NULL, 30, 3, 32, 108),
(26, 'prueba', '0', 'prueba', '2014-02-17', '2014-02-17', NULL, 30, 3, 35, 109),
(27, 'asd', '0', 'asd', '2014-02-17', '2014-02-17', NULL, 30, 3, 35, 110),
(28, 'asd', '0', 'asd', '2014-02-18', '2014-02-18', NULL, 30, 3, 32, NULL),
(29, 'prueba', '0', 'prueba', '2014-02-18', '2014-02-18', NULL, 30, 3, 35, 122),
(30, 'prueba', '0', 'prueba', '2014-02-18', '2014-02-18', NULL, 30, 3, 33, 123),
(31, 'prueba ventas cheque', '0', 'pruebas', '2014-02-19', '2014-02-19', NULL, 30, 3, 32, 174);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_as_productos`
--

CREATE TABLE IF NOT EXISTS `servicios_as_productos` (
  `servicios_as_productos_id` int(11) NOT NULL AUTO_INCREMENT,
  `servicio_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `ventas_id` int(11) NOT NULL,
  `cantidad_servicio` int(11) NOT NULL,
  `valor_servicio` int(11) DEFAULT NULL,
  PRIMARY KEY (`servicios_as_productos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=344 ;

--
-- Volcado de datos para la tabla `servicios_as_productos`
--

INSERT INTO `servicios_as_productos` (`servicios_as_productos_id`, `servicio_id`, `producto_id`, `ventas_id`, `cantidad_servicio`, `valor_servicio`) VALUES
(335, 0, 51, 167, 5, 100000),
(336, 0, 51, 168, 5, 100000),
(337, 0, 51, 169, 1, 20000),
(338, 0, 51, 170, 5, 100000),
(339, 0, 51, 171, 6, 120000),
(340, 0, 51, 172, 6, 120000),
(341, 0, 51, 173, 3, 60000),
(342, 0, 51, 175, 1, 20000),
(343, 0, 51, 176, 1, 20000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE IF NOT EXISTS `sucursales` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`sucursal_id`, `nombre_sucursal`, `nombre_encargado`, `direccion_sucursal`, `ciudad`, `telefono`, `email`, `giro`, `rut`) VALUES
(3, 'Lagomarsino Valparaiso', 'Romina Lagomarsino', 'gran bretaña 281', 'asd', 993191539, 'rlagomarsino@yahoo.com', 'asd', '16.813.908-K'),
(4, 'Lagomarsino Valparaiso', 'Romina Lagomarsino', 'gran bretaña 281', 'Valparaiso', 322346019, 'rlagomarsino@yahoo.com', 'taller', '16.813.908-K'),
(5, 'Santiago', 'pierangela lagomarsino', 'baquedano 87', 'Santiago', 993191539, 'mlencionil@hotmail.com', 'laboratorio diesel', '16.813.908-K');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `tarea_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tarea` varchar(32) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `servicio_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tarea_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`tarea_id`, `nombre_tarea`, `valor`, `servicio_id`) VALUES
(1, 'prueba', 123, 23),
(2, 'probar inyectores', 40000, 23),
(3, 'Probar Inyectores', 40000, 24),
(4, 'sacar bomba', 20000, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE IF NOT EXISTS `trabajadores` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`trabajador_id`, `nombre`, `apellido_paterno`, `apellido_materno`, `rut`, `direccion`, `telefono`, `celular`, `sueldo`, `pago_trabajadores_id`, `afp_id`, `salud_id`) VALUES
(30, 'Gianfranco', 'Lagomarsino', 'Lencioni', '16.813.908-K', 'munizaga 182', 2283165, 3191539, 300000, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
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
  UNIQUE KEY `usuarios_PK` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `login`, `rut`, `password`, `nombre`, `apellido_paterno`, `apellido_materno`, `telefono_usuario`, `celular_usuario`, `direccion`, `email`, `fecha_creacion`, `fecha_modificacion`, `privilegios`, `sucursal_id`) VALUES
(1, 'gian', '16.813.908-k', '123', 'Gian', 'Lagomarsino', 'Lagomarsino', 2283165, 2283165, 'asd', 'gianlago@hotmail.com', '0000-00-00', '2014-02-07', 'Administrador', 0),
(7, 'gianprueba', '16813908-k', '123', 'asd', 'asd', 'asd', 123, 123, 'Munizaga 128', 'gianlago2@hotmail.com', '2014-02-05', '2014-02-05', 'Administrador', NULL),
(9, 'gianlago@hotmail.coms', '16813908k', '123', 'Gianfranco ', 'lagomarsino', 'lencioni', 123, 1, 'asd', 'gianlago@hotmail.coms', '2014-02-06', '2014-02-06', 'Administrador', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=177 ;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ventas_id`, `monto_pago`, `pagado`, `fecha_pago`, `forma_pago`, `titular_cheque`, `serie_cheque`, `nombre_banco`, `fecha_creacion`, `fecha_modificacion`, `cantidad_abono`, `cuota`, `estado`) VALUES
(167, 500000, 'Pagado', '2014-02-18', 'Efectivo', '', '', '', '2014-02-18', '2014-02-18', 0, 0, 1),
(168, 500000, 'Pagado', '2014-02-18', 'Efectivo', '', '', '', '2014-02-18', '2014-02-18', 0, 0, 1),
(169, 20000, 'Pagado', '2014-02-18', 'Efectivo', '', '', '', '2014-02-18', '2014-02-18', 0, 0, 1),
(170, 500000, 'Pagado', '2014-02-18', 'Efectivo', '', '', '', '2014-02-18', '2014-02-18', 0, 0, 1),
(171, 720000, 'Pagado', '2014-02-19', 'Cheque al dia', NULL, '12313123', 'santander', '2014-02-19', '2014-02-19', NULL, 0, 1),
(172, 720000, 'Pagado', '2014-02-19', 'Cheque al dia', NULL, '12313123', 'santander', '2014-02-19', '2014-02-19', 360000, 2, 1),
(173, 180000, 'Pendiente', '2014-02-19', 'Cheque al dia', NULL, '12313123', 'santander', '2014-02-19', '2014-02-19', 60000, 3, 1),
(174, 0, 'Pendiente', '2014-02-19', 'Cheque al dia', 'Gianfranco Lagomarsi', '12313123', 'santander', '2014-02-19', '2014-02-19', 0, 1, 1),
(175, 20000, 'Pagado', '2014-02-19', 'Cheque al dia', '', '123134a1', 'BCI', '2014-02-19', '2014-02-19', 6667, 3, 1),
(176, 20000, 'Pagado', '2014-02-19', 'Cheque al dia', 'juan guzman', '123134a1', 'BCI', '2014-02-19', '2014-02-19', 6667, 3, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
