-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-07-2010 a las 19:34:48
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.3.0

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
('fa49cf0ffcb66ee42e911790768af3e8', '192.168.0.2', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.1.9', 1279300810, 'a:3:{s:8:"username";s:5:"admin";s:7:"user_id";s:1:"1";s:9:"logged_in";s:1:"1";}');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `obras`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras_gallery`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `obras_gallery`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `pages_id` int(11) NOT NULL AUTO_INCREMENT,
  `pagename` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`pages_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `pages`
--

INSERT INTO `pages` (`pages_id`, `pagename`, `title`, `content`, `last_modified`) VALUES
(3, 'home-cont1', 'Nuestras Instalaciones', '<p>Contamos con un edificio propio donde funcionan los departamentos de administraci&oacute;n, ventas, ingenier&iacute;a y servicio t&eacute;cnico; y con una nave de 1200m2, en el Parque Industrial Eje Norte en Las Heras, Mendoza, donde realizamos fabricaciones en chapa a trav&eacute;s de un plasma de alta tecnolog&iacute;a, reparaciones y pruebas de equipos de aire acondicionado y calderas.</p>', '0000-00-00 00:00:00'),
(4, 'home-cont2', 'Área Ingeniería', '<p>Equipo compuesto por reconocidos profesionales del medio que brindan asesoramiento t&eacute;cnico especializado a los clientes. Este departamento posee adem&aacute;s, software especiales para desarrollar los diferentes sistemas de aire acondicionado, calefacci&oacute;n, ventilaciones.</p>', '0000-00-00 00:00:00'),
(5, 'home-cont3', 'Area Mantenimiento', '<p>Compuesto por personal altamente capacitados y con continuo entrenamiento, manteni&eacute;ndolos al tanto de los &uacute;ltimos avances tecnol&oacute;gicos dentro de nuestra industria. Cuentan adem&aacute;s con una flota de veh&iacute;culos, herramientas, taller para poder realizar un correcto mantenimiento preventivo y correctivo de cada sistema.</p>', '0000-00-00 00:00:00'),
(6, 'empresa', 'Empresa', '<p>Ingenier&iacute;a Termomec&aacute;nica Priolo es una empresa familiar que se inici&oacute; a fines de la d&eacute;cada del `60, en el &aacute;rea de reparaciones y mantenimiento de equipos de refrigeraci&oacute;n domiciliaria. Desde la d&eacute;cada del &acute;90 empez&oacute; a proyectar, comercializar y ejecutar sistemas de refrigeraci&oacute;n, calefacci&oacute;n y ventilaci&oacute;n; siempre respetando normas nacionales e internacionales, y utilizando maquinar&iacute;as de tecnolog&iacute;a de punta, &uacute;nicas en nuestra provincia. Desde hace ya m&aacute;s de 10 a&ntilde;os es Concesionario y Dealer Oficial CARRIER en Mendoza.</p>', '0000-00-00 00:00:00'),
(7, 'servicios', 'Servicios', '<ul>\n<li>Asesoramiento realizado por reconocido profesionales del medio.</li>\n<li>Proyecto de todo tipo de sistemas de aire acondicionado, calefacci&oacute;n y ventilaci&oacute;n. </li>\n<li>Instalaciones termomec&aacute;nicas de aire acondicionado y calefacci&oacute;n. </li>\n<li>Ventilaci&oacute;n industrial. </li>\n<li>Mantenimiento programado de todo tipo de instalaciones. </li>\n<li>Mantenimiento de pretemporada. </li>\n</ul>', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `products`
--

INSERT INTO `products` (`products_id`, `product_name`, `image`, `thumb`, `thumb_width`, `thumb_height`, `order`, `date_added`, `last_modified`) VALUES
(1, 'Centrífugas y por Absorción', '12792989324c408d74a4d96__centrífugas-y-por-absorción.jpg', '12792989324c408d74a4d96__centrífugas-y-por-absorción_thumb.jpg', 200, 148, 1, '2010-07-16 13:48:52', '0000-00-00 00:00:00'),
(2, 'Controladores de Campo CCN', '12792989554c408d8b7bed9__controladores-_de_campo_ccn.jpg', '12792989554c408d8b7bed9__controladores-_de_campo_ccn_thumb.jpg', 200, 148, 2, '2010-07-16 13:49:15', '0000-00-00 00:00:00'),
(3, 'Controles de Integración', '12792989724c408d9ceebd3__controles-de-integración.jpg', '12792989724c408d9ceebd3__controles-de-integración_thumb.jpg', 121, 82, 3, '2010-07-16 13:49:32', '0000-00-00 00:00:00'),
(4, 'Enfriadoras de Líquido Especiales', '12792990014c408db991fed__enfriadoras-de-líquido-especiales.jpg', '12792990014c408db991fed__enfriadoras-de-líquido-especiales_thumb.jpg', 200, 148, 4, '2010-07-16 13:50:01', '0000-00-00 00:00:00'),
(5, 'Enfriadoras de Líquido por Absorción Carrier Sanyo', '12792990374c408ddd8a428__enfriadoras-de-líquido-por-absorción-carrier-sanyo.jpg', '12792990374c408ddd8a428__enfriadoras-de-líquido-por-absorción-carrier-sanyo_thumb.jpg', 200, 148, 5, '2010-07-16 13:50:37', '0000-00-00 00:00:00'),
(6, 'Equipos de Precisión', '12792990554c408def5e1a8__equipos-de-precisión.jpg', '12792990554c408def5e1a8__equipos-de-precisión_thumb.jpg', 200, 148, 6, '2010-07-16 13:50:55', '0000-00-00 00:00:00'),
(7, 'Interfases de red', '12792990714c408dff205ab__interfases-de-red.jpg', '12792990714c408dff205ab__interfases-de-red_thumb.jpg', 200, 148, 7, '2010-07-16 13:51:11', '0000-00-00 00:00:00');

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
(1, 4, 1),
(2, 4, 1),
(3, 4, 1),
(4, 4, 1),
(5, 4, 1),
(6, 4, 1),
(7, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `proveedor_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `order` int(3) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`proveedor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`proveedor_id`, `name`, `order`, `date_added`, `last_modified`) VALUES
(1, 'Aire Acondicionado', 1, '2010-07-16 10:33:44', '0000-00-00 00:00:00'),
(2, 'Calderas y Radiadores', 2, '2010-07-16 10:34:50', '0000-00-00 00:00:00'),
(3, 'Piso Radiante', 3, '2010-07-16 10:35:14', '0000-00-00 00:00:00'),
(4, 'Ventilaciones y Extracciones', 4, '2010-07-16 10:35:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores_gallery`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `proveedores_gallery`
--

INSERT INTO `proveedores_gallery` (`provgallery_id`, `proveedor_id`, `image`, `thumb`, `width`, `height`, `order`, `date_added`, `last_modified`) VALUES
(1, 1, '12792872044c405fa428035__carrier.jpg', '12792872044c405fa428035__carrier_thumb.jpg', 167, 100, 0, '2010-07-16 10:33:44', '0000-00-00 00:00:00'),
(2, 1, '12792872164c405fb07f055__toshiba.jpg', '12792872164c405fb07f055__toshiba_thumb.jpg', 167, 42, 0, '2010-07-16 10:33:44', '0000-00-00 00:00:00'),
(3, 2, '12792872854c405ff5d23e3__triangular.jpg', '12792872854c405ff5d23e3__triangular_thumb.jpg', 167, 55, 0, '2010-07-16 10:34:50', '0000-00-00 00:00:00'),
(4, 2, '12792872894c405ff945a27__westen.jpg', '12792872894c405ff945a27__westen_thumb.jpg', 146, 30, 0, '2010-07-16 10:34:50', '0000-00-00 00:00:00'),
(5, 3, '12792873134c4060110b588__giacomini.jpg', '12792873134c4060110b588__giacomini_thumb.jpg', 167, 35, 0, '2010-07-16 10:35:14', '0000-00-00 00:00:00'),
(6, 4, '12792873434c40602fd8a4e__ing_horacio_ciarrapico.jpg', '12792873434c40602fd8a4e__ing_horacio_ciarrapico_thumb.jpg', 167, 72, 0, '2010-07-16 10:35:45', '0000-00-00 00:00:00');

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

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_categories`
--
CREATE TABLE IF NOT EXISTS `v_categories` (
`categories_id` int(11)
,`parent_id` int(11)
,`categorie_name` varchar(200)
,`order` int(3)
,`reference` varchar(200)
,`level` int(11)
,`date_added` datetime
,`last_modified` datetime
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_products`
--
CREATE TABLE IF NOT EXISTS `v_products` (
`products_id` int(11)
,`product_name` varchar(200)
,`image` varchar(255)
,`thumb` varchar(255)
,`thumb_width` int(11)
,`thumb_height` int(11)
,`order` int(3)
,`date_added` datetime
,`last_modified` datetime
,`categorie_name` varchar(200)
,`categories_id` int(11)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `v_categories`
--
DROP TABLE IF EXISTS `v_categories`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_categories` AS select distinct `categories`.`categories_id` AS `categories_id`,`categories`.`parent_id` AS `parent_id`,`categories`.`categorie_name` AS `categorie_name`,`categories`.`order` AS `order`,`categories`.`reference` AS `reference`,`categories`.`level` AS `level`,`categories`.`date_added` AS `date_added`,`categories`.`last_modified` AS `last_modified` from (`products_to_categories` join `categories` on((`products_to_categories`.`categories_id` = `categories`.`categories_id`))) order by `categories`.`order`;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_products`
--
DROP TABLE IF EXISTS `v_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_products` AS select `products`.`products_id` AS `products_id`,`products`.`product_name` AS `product_name`,`products`.`image` AS `image`,`products`.`thumb` AS `thumb`,`products`.`thumb_width` AS `thumb_width`,`products`.`thumb_height` AS `thumb_height`,`products`.`order` AS `order`,`products`.`date_added` AS `date_added`,`products`.`last_modified` AS `last_modified`,`categories`.`categorie_name` AS `categorie_name`,`categories`.`categories_id` AS `categories_id` from ((`products` join `products_to_categories` on((`products`.`products_id` = `products_to_categories`.`products_id`))) join `categories` on((`products_to_categories`.`categories_id` = `categories`.`categories_id`))) order by `products`.`order`;
