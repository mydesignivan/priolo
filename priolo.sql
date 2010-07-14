-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-07-2010 a las 19:28:42
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `priolo`
--
CREATE DATABASE `priolo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `priolo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `categorie_name` varchar(200) NOT NULL,
  `order` int(3) NOT NULL,
  `reference` varchar(200) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `categories`
--

INSERT INTO `categories` (`categories_id`, `parent_id`, `categorie_name`, `order`, `reference`, `level`, `date_added`, `last_modified`) VALUES
(1, 0, 'Aire Acondicionado', 1, 'aire-acondicionado', 0, '2010-07-02 17:39:17', '0000-00-00 00:00:00'),
(2, 1, 'Residencial', 1, 'residencial', 1, '2010-07-02 17:40:00', '0000-00-00 00:00:00'),
(3, 1, 'Light Comercial', 2, 'light-comercial', 1, '2010-07-02 17:40:55', '0000-00-00 00:00:00'),
(4, 1, 'Comercial', 3, 'comercial', 1, '2010-07-02 17:41:19', '0000-00-00 00:00:00'),
(5, 0, 'Calerfacción', 1, 'calerfaccion', 0, '2010-07-02 17:47:54', '0000-00-00 00:00:00'),
(6, 5, 'Calderas y Quemadores', 1, 'calderas-y-quemadores', 1, '2010-07-02 17:48:33', '0000-00-00 00:00:00'),
(7, 5, 'Radiadores y Toalleros', 2, 'radiadores-y-toalleros', 1, '2010-07-02 17:48:53', '0000-00-00 00:00:00'),
(8, 5, 'Piso Radiante', 3, 'piso-radiante', 1, '2010-07-02 17:49:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
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
('5b6e636a815afc69ab3414bed2702171', '192.168.0.2', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.1.9', 1279128137, 'a:3:{s:8:"username";s:5:"admin";s:7:"user_id";s:1:"1";s:9:"logged_in";s:1:"1";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

DROP TABLE IF EXISTS `obras`;
CREATE TABLE IF NOT EXISTS `obras` (
  `obra_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `order` int(3) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`obra_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcar la base de datos para la tabla `obras`
--

INSERT INTO `obras` (`obra_id`, `name`, `order`, `date_added`, `last_modified`) VALUES
(1, 'Edificio Alto Belgrano', 10, '2010-07-02 11:57:06', '0000-00-00 00:00:00'),
(2, 'Condominos Dalvian', 2, '2010-07-02 11:57:31', '0000-00-00 00:00:00'),
(3, 'Banco de La Nación Argentina Sucursal San Rafael, Mendoza.', 5, '2010-07-02 12:00:14', '0000-00-00 00:00:00'),
(4, 'Banco de La Nación Argentina Sucursal San Martín, Ciudad, Mendoza.', 12, '2010-07-02 12:00:32', '0000-00-00 00:00:00'),
(5, 'Banco Creedicop, Maipú, Mendoza.', 4, '2010-07-02 12:00:37', '0000-00-00 00:00:00'),
(6, 'Salas de Gobierno Universidad Champagnat, Mendoza.', 6, '2010-07-02 12:01:22', '0000-00-00 00:00:00'),
(7, 'Nuevo Edificio Diputados. Mendoza.', 9, '2010-07-02 12:01:54', '0000-00-00 00:00:00'),
(8, 'Clínica Francesa, Mendoza.', 11, '2010-07-02 12:01:52', '0000-00-00 00:00:00'),
(9, 'Hospital en Las Heras, Mendoza.', 8, '2010-07-02 12:02:06', '0000-00-00 00:00:00'),
(10, 'Hospital Saporitti, Rivadavia, Mendoza.', 7, '2010-07-02 12:02:18', '0000-00-00 00:00:00'),
(11, 'prueba1', 3, '2010-07-13 09:44:35', '2010-07-13 13:05:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras_gallery`
--

DROP TABLE IF EXISTS `obras_gallery`;
CREATE TABLE IF NOT EXISTS `obras_gallery` (
  `obrasgallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `obra_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`obrasgallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `obras_gallery`
--

INSERT INTO `obras_gallery` (`obrasgallery_id`, `obra_id`, `image`, `thumb`, `width`, `height`, `order`, `date_added`, `last_modified`) VALUES
(6, 11, '12790250664c3c5faa8cbc4__100_0338.jpg', '12790250664c3c5faa8cbc4__100_0338_thumb.jpg', 138, 103, 1, '2010-07-13 09:44:35', '0000-00-00 00:00:00'),
(7, 11, '12790250714c3c5fafe631e__100_0619.jpg', '12790250714c3c5fafe631e__100_0619_thumb.jpg', 138, 103, 2, '2010-07-13 09:44:35', '0000-00-00 00:00:00'),
(8, 11, '12790370884c3c8ea0dddee__100_0634.jpg', '12790370884c3c8ea0dddee__100_0634_thumb.jpg', 138, 103, 3, '2010-07-13 13:05:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `thumb_width` int(11) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `order` int(3) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcar la base de datos para la tabla `products`
--

INSERT INTO `products` (`products_id`, `product_name`, `image`, `thumb`, `thumb_width`, `thumb_height`, `order`, `date_added`, `last_modified`) VALUES
(18, 'producto1', '12791265164c3debf48ec3f__sistema-separados.jpg', '12791265164c3debf48ec3f__sistema-separados_thumb.jpg', 152, 61, 1, '2010-07-14 13:55:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_to_categories`
--

DROP TABLE IF EXISTS `products_to_categories`;
CREATE TABLE IF NOT EXISTS `products_to_categories` (
  `products_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `categorie_parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `products_to_categories`
--

INSERT INTO `products_to_categories` (`products_id`, `categories_id`, `categorie_parent`) VALUES
(18, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `proveedor_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `order` int(3) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`proveedor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`proveedor_id`, `name`, `order`, `date_added`, `last_modified`) VALUES
(12, 'prov1', 13, '2010-07-13 13:09:08', '2010-07-13 13:41:57'),
(13, 'prov2', 12, '2010-07-13 13:41:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores_gallery`
--

DROP TABLE IF EXISTS `proveedores_gallery`;
CREATE TABLE IF NOT EXISTS `proveedores_gallery` (
  `provgallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `proveedor_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`provgallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `proveedores_gallery`
--

INSERT INTO `proveedores_gallery` (`provgallery_id`, `proveedor_id`, `image`, `thumb`, `width`, `height`, `order`, `date_added`, `last_modified`) VALUES
(8, 12, '12790373214c3c8f895d791__carrier.jpg', '12790373214c3c8f895d791__carrier_thumb.jpg', 0, 0, 1, '2010-07-13 13:09:08', '0000-00-00 00:00:00'),
(9, 12, '12790373334c3c8f9534efe__giacomini.jpg', '12790373334c3c8f9534efe__giacomini_thumb.jpg', 0, 0, 2, '2010-07-13 13:09:08', '0000-00-00 00:00:00'),
(10, 13, '12790392744c3c972a26e1e__carrier.jpg', '12790392744c3c972a26e1e__carrier_thumb.jpg', 0, 0, 0, '2010-07-13 13:41:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
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

