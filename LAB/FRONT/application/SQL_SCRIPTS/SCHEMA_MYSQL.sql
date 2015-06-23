-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-06-2015 a las 00:39:24
-- Versión del servidor: 5.5.43-0+deb8u1
-- Versión de PHP: 5.6.9-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `PHP_LAB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
`id_administrador` bigint(20) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
`id_categoria` bigint(20) NOT NULL,
  `nombre_categoria` varchar(40) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_de_ofertas`
--

CREATE TABLE IF NOT EXISTS `categorias_de_ofertas` (
  `id_categoria` bigint(20) NOT NULL,
  `id_oferta` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
`id_compra` bigint(20) NOT NULL,
  `id_oferta` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE IF NOT EXISTS `ofertas` (
`id_oferta` bigint(20) NOT NULL,
  `titulo_oferta` varchar(40) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `descripcion_corta` varchar(80) DEFAULT NULL,
  `precio` decimal(19,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas_hasta_agotar_stock`
--

CREATE TABLE IF NOT EXISTS `ofertas_hasta_agotar_stock` (
  `id_oferta` bigint(20) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas_temporales`
--

CREATE TABLE IF NOT EXISTS `ofertas_temporales` (
  `id_oferta` bigint(20) NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` bigint(20) NOT NULL,
  `nick` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fechaNac` date NOT NULL,
  `celular` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `edad` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
 ADD PRIMARY KEY (`id_administrador`), ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
 ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `categorias_de_ofertas`
--
ALTER TABLE `categorias_de_ofertas`
 ADD PRIMARY KEY (`id_categoria`,`id_oferta`), ADD KEY `id_oferta` (`id_oferta`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
 ADD PRIMARY KEY (`id_compra`), ADD KEY `id_oferta` (`id_oferta`), ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
 ADD PRIMARY KEY (`id_oferta`);

--
-- Indices de la tabla `ofertas_hasta_agotar_stock`
--
ALTER TABLE `ofertas_hasta_agotar_stock`
 ADD PRIMARY KEY (`id_oferta`);

--
-- Indices de la tabla `ofertas_temporales`
--
ALTER TABLE `ofertas_temporales`
 ADD PRIMARY KEY (`id_oferta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
MODIFY `id_administrador` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
MODIFY `id_categoria` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
MODIFY `id_compra` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
MODIFY `id_oferta` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias_de_ofertas`
--
ALTER TABLE `categorias_de_ofertas`
ADD CONSTRAINT `categorias_de_ofertas_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE,
ADD CONSTRAINT `categorias_de_ofertas_ibfk_2` FOREIGN KEY (`id_oferta`) REFERENCES `ofertas` (`id_oferta`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_oferta`) REFERENCES `ofertas` (`id_oferta`) ON DELETE CASCADE,
ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ofertas_hasta_agotar_stock`
--
ALTER TABLE `ofertas_hasta_agotar_stock`
ADD CONSTRAINT `ofertas_hasta_agotar_stock_ibfk_1` FOREIGN KEY (`id_oferta`) REFERENCES `ofertas` (`id_oferta`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ofertas_temporales`
--
ALTER TABLE `ofertas_temporales`
ADD CONSTRAINT `ofertas_temporales_ibfk_1` FOREIGN KEY (`id_oferta`) REFERENCES `ofertas` (`id_oferta`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
