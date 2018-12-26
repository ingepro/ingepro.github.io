-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2015 a las 02:59:56
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pollos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE IF NOT EXISTS `almacen` (
  `nit` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  PRIMARY KEY (`nit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`nit`, `nombre`, `telefono`, `email`, `direccion`) VALUES
('900456017-3', 'COMERCIALIZADORA DE POLLOS', '8862596', 'pollos@yahoo.es', 'CR 54 NRO  27-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `nrofactura` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `ccresponsable` varchar(20) NOT NULL,
  PRIMARY KEY (`nrofactura`),
  KEY `ccresponsable` (`ccresponsable`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`nrofactura`, `fecha`, `ccresponsable`) VALUES
(6, '2015-10-20', '1050'),
(8, '2015-11-26', '1010'),
(16, '2015-11-26', '1212'),
(17, '2015-12-03', '1212');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompras`
--

CREATE TABLE IF NOT EXISTS `detallecompras` (
  `nrofactura` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`nrofactura`,`idproducto`),
  KEY `nrofactura` (`nrofactura`),
  KEY `idproducto` (`idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallecompras`
--

INSERT INTO `detallecompras` (`nrofactura`, `idproducto`, `valor`, `cantidad`) VALUES
(6, 2, 5700, 8),
(6, 3, 2100, 3),
(8, 1, 2500, 25),
(16, 3, 2100, 8),
(17, 1, 2500, 100),
(17, 2, 5700, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE IF NOT EXISTS `detalleventas` (
  `nrofactura` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`nrofactura`,`idproducto`),
  KEY `idproducto` (`idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalleventas`
--

INSERT INTO `detalleventas` (`nrofactura`, `idproducto`, `valor`, `cantidad`) VALUES
(1, 1, 2500, 2),
(1, 3, 2100, 1),
(2, 1, 2500, 9),
(2, 2, 5700, 3),
(3, 1, 2500, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `cc` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tipousuario` varchar(20) NOT NULL,
  PRIMARY KEY (`cc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`cc`, `nombre`, `apellidos`, `cargo`, `password`, `tipousuario`) VALUES
('1010', 'pepe', 'perez', 'Asistente C4', '1010', 'Asistente'),
('1020', 'Luis', 'Arias', 'Vendedor T2', '1020', 'Vendedor'),
('1030', 'Diego', 'Cardona', 'Asistente C4', '1030', 'Asistente'),
('1040', 'Diana', 'Mora', 'Asistente C2', '1040', 'Asistente'),
('1050', 'Luisa', 'Hernandez', 'Vendedor T1', '1050', 'Vendedor'),
('1212', 'Admin', 'Admin', 'Administrador', '1212', 'Administrador'),
('3002', 'Andres', 'Sanchez', 'Asistente C7', '3002', 'Asistente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `stockmin` int(11) NOT NULL,
  `stockmax` int(11) NOT NULL,
  `stockactual` int(11) NOT NULL,
  `preciocompra` int(11) NOT NULL,
  `precioventa` int(11) NOT NULL,
  `nitproveedor` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nitproveedor` (`nitproveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `stockmin`, `stockmax`, `stockactual`, `preciocompra`, `precioventa`, `nitproveedor`) VALUES
(1, 'Queso Campesino', 10, 40, 90, 2500, 3600, '900459017-5'),
(2, 'pechuga campesina adobada', 5, 20, 12, 5700, 7200, '900541289-5'),
(3, 'Muslo 100 gr', 15, 50, 10, 2100, 2800, '900887741-5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `nit` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`nit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`nit`, `nombre`, `telefono`, `direccion`, `email`) VALUES
('900459017-5', 'Quesera Santo Domingo', '8833645', 'Av 19 NRO 19-17', 'quesossd@gmail.com'),
('900541289-5', 'pechugas la teresita', '8874569', 'km 5 via magdalena', 'pechugas@hotmail.com'),
('900887741-5', 'alcampo ', '8756412', 'Cr 27 Nro 12-50', 'alcampo@hotmail.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tempdetalle`
--

CREATE TABLE IF NOT EXISTS `tempdetalle` (
  `codigo` int(11) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `cant` int(11) NOT NULL,
  `valorun` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tempdetallev`
--

CREATE TABLE IF NOT EXISTS `tempdetallev` (
  `codigo` int(11) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `cant` int(11) NOT NULL,
  `valorun` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `nrofactura` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `ccresponsable` varchar(20) NOT NULL,
  PRIMARY KEY (`nrofactura`),
  KEY `ccresponsable` (`ccresponsable`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`nrofactura`, `fecha`, `ccresponsable`) VALUES
(1, '2015-11-26', '1020'),
(2, '2015-11-26', '1040'),
(3, '2015-12-03', '1212');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`ccresponsable`) REFERENCES `personal` (`cc`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  ADD CONSTRAINT `detallecompras_ibfk_1` FOREIGN KEY (`nrofactura`) REFERENCES `compras` (`nrofactura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallecompras_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD CONSTRAINT `detalleventas_ibfk_1` FOREIGN KEY (`nrofactura`) REFERENCES `ventas` (`nrofactura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleventas_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`nitproveedor`) REFERENCES `proveedores` (`nit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`ccresponsable`) REFERENCES `personal` (`cc`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
