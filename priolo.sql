-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-07-2010 a las 04:15:46
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `priolo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `categorie_name` varchar(200) NOT NULL,
  `order` int(3) NOT NULL,
  `reference` varchar(200) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `categories`
--

INSERT INTO `categories` (`categories_id`, `parent_id`, `categorie_name`, `order`, `reference`, `date_added`, `last_modified`) VALUES
(1, 0, 'Aire Acondicionado', 1, 'aire-acondicionado', '2010-07-02 17:39:17', '0000-00-00 00:00:00'),
(2, 1, 'Residencial', 1, 'residencial', '2010-07-02 17:40:00', '0000-00-00 00:00:00'),
(3, 1, 'Light Comercial', 2, 'light-comercial', '2010-07-02 17:40:55', '0000-00-00 00:00:00'),
(4, 1, 'Comercial', 3, 'comercial', '2010-07-02 17:41:19', '0000-00-00 00:00:00'),
(5, 0, 'Calerfacción', 1, 'calerfaccion', '2010-07-02 17:47:54', '0000-00-00 00:00:00'),
(6, 5, 'Calderas y Quemadores', 1, 'calderas-y-quemadores', '2010-07-02 17:48:33', '0000-00-00 00:00:00'),
(7, 5, 'Radiadores y Toalleros', 2, 'radiadores-y-toalleros', '2010-07-02 17:48:53', '0000-00-00 00:00:00'),
(8, 5, 'Piso Radiante', 3, 'piso-radiante', '2010-07-02 17:49:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` varchar(500) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('49ee41ff0345032e1ca0809440300f9d', '127.0.0.1', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.2.3', 1278280191, 'a:10:{s:7:"user_id";s:1:"1";s:8:"username";s:5:"admin";s:5:"email";s:23:"ingpriolo@speedy.com.ar";s:6:"phone1";s:26:"(0261) 4200441 – 4250361";s:6:"phone2";s:14:"(0261) 4473336";s:8:"address1";s:32:"Laprida 228 – Ciudad - Mendoza";s:8:"address2";s:70:"Parque Industrial Eje Norte entre calle 7 esq. 4 - Las Heras - Mendoza";s:10:"date_added";s:19:"2010-06-15 00:00:00";s:13:"last_modified";s:19:"2010-07-01 17:54:10";s:9:"logged_in";s:1:"1";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE IF NOT EXISTS `obras` (
  `obra_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `order` int(3) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`obra_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `obras`
--

INSERT INTO `obras` (`obra_id`, `name`, `order`, `date_added`, `last_modified`) VALUES
(1, 'Edificio Alto Belgrano', 1, '2010-07-02 11:57:06', '0000-00-00 00:00:00'),
(2, 'Condominos Dalvian', 2, '2010-07-02 11:57:31', '0000-00-00 00:00:00'),
(3, 'Banco de La Nación Argentina Sucursal San Rafael, Mendoza.', 3, '2010-07-02 12:00:14', '0000-00-00 00:00:00'),
(4, 'Banco de La Nación Argentina Sucursal San Martín, Ciudad, Mendoza.', 4, '2010-07-02 12:00:32', '0000-00-00 00:00:00'),
(5, 'Banco Creedicop, Maipú, Mendoza.', 5, '2010-07-02 12:00:37', '0000-00-00 00:00:00'),
(6, 'Salas de Gobierno Universidad Champagnat, Mendoza.', 6, '2010-07-02 12:01:22', '0000-00-00 00:00:00'),
(7, 'Nuevo Edificio Diputados. Mendoza.', 7, '2010-07-02 12:01:54', '0000-00-00 00:00:00'),
(8, 'Clínica Francesa, Mendoza.', 8, '2010-07-02 12:01:52', '0000-00-00 00:00:00'),
(9, 'Hospital en Las Heras, Mendoza.', 9, '2010-07-02 12:02:06', '0000-00-00 00:00:00'),
(10, 'Hospital Saporitti, Rivadavia, Mendoza.', 10, '2010-07-02 12:02:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras_gallery`
--

CREATE TABLE IF NOT EXISTS `obras_gallery` (
  `obrasgallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `obra_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`obrasgallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `obras_gallery`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `order` int(3) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcar la base de datos para la tabla `products`
--

INSERT INTO `products` (`products_id`, `product_name`, `image`, `thumb`, `order`, `date_added`, `last_modified`) VALUES
(1, 'Equipos de ventas', 'equipos-de-ventas.jpg', 'equipos-de-ventas.jpg', 1, '2010-07-02 17:45:24', '0000-00-00 00:00:00'),
(2, 'Equipos Multisplit Xpower Invertir y Toshiba', 'Equipos-Multisplit-Xpower-Invertir-y-Toshiba.jpg', 'Equipos-Multisplit-Xpower-Invertir-y-Toshiba.jpg', 2, '2010-07-02 17:45:50', '0000-00-00 00:00:00'),
(3, 'Equipos Split de Pared', 'Equipos-Split-de-Pared.jpg', 'Equipos-Split-de-Pared.jpg', 3, '2010-07-02 17:46:19', '0000-00-00 00:00:00'),
(11, 'Centrífugas y por Absorción', 'Centrífugas-y-por-Absorción.jpg', 'Centrífugas-y-por-Absorción.jpg', 1, '2010-07-04 18:42:21', '0000-00-00 00:00:00'),
(12, 'Controladores de Campo CCN', 'Controladores-_de_Campo_CCN.jpg', 'Controladores-_de_Campo_CCN.jpg', 2, '2010-07-04 18:42:53', '0000-00-00 00:00:00'),
(13, 'Controles de Integración', 'Controles-de-Integración.jpg', 'Controles-de-Integración.jpg', 3, '2010-07-04 18:43:50', '0000-00-00 00:00:00'),
(14, 'Enfriadoras de Líquido Especiales', 'Enfriadoras-de-Líquido-Especiales.jpg', 'Enfriadoras-de-Líquido-Especiales.jpg', 4, '2010-07-04 18:43:50', '0000-00-00 00:00:00'),
(15, 'Enfriadoras de Líquido por Absorción Carrier Sanyo', 'Enfriadoras-de-Líquido-por-Absorción-Carrier-Sanyo.jpg', 'Enfriadoras-de-Líquido-por-Absorción-Carrier-Sanyo.jpg', 5, '2010-07-04 18:44:27', '0000-00-00 00:00:00'),
(16, 'Equipos de Precisión', 'Equipos-de-Precisión.jpg', 'Equipos-de-Precisión.jpg', 6, '2010-07-04 18:44:27', '0000-00-00 00:00:00'),
(17, 'Interfases de red', 'Interfases-de-red.jpg', 'Interfases-de-red.jpg', 7, '2010-07-04 18:45:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_to_categories`
--

CREATE TABLE IF NOT EXISTS `products_to_categories` (
  `products_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `categorie_parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `products_to_categories`
--

INSERT INTO `products_to_categories` (`products_id`, `categories_id`, `categorie_parent`) VALUES
(1, 2, 1),
(2, 2, 1),
(3, 2, 1),
(11, 4, 1),
(12, 4, 1),
(13, 4, 1),
(14, 4, 1),
(15, 4, 1),
(16, 4, 1),
(17, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone1` char(50) NOT NULL,
  `phone2` char(50) NOT NULL,
  `address1` varchar(500) NOT NULL,
  `address2` varchar(500) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `phone1`, `phone2`, `address1`, `address2`, `date_added`, `last_modified`) VALUES
(1, 'admin', 'PihkQ4pWJhOI1o8z/kWDyHQPfH6KekSHzQ/muA==', 'ingpriolo@speedy.com.ar', '(0261) 4200441 – 4250361', '(0261) 4473336', 'Laprida 228 – Ciudad - Mendoza', 'Parque Industrial Eje Norte entre calle 7 esq. 4 - Las Heras - Mendoza', '2010-06-15 00:00:00', '2010-07-01 17:54:10');
