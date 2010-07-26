-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-07-2010 a las 05:53:20
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
  `level` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcar la base de datos para la tabla `categories`
--

INSERT INTO `categories` (`categories_id`, `parent_id`, `categorie_name`, `order`, `reference`, `level`, `date_added`, `last_modified`) VALUES
(22, 0, 'Aire Acondicionado', 1, 'aire-acondicionado', 0, '2010-07-21 18:24:59', '0000-00-00 00:00:00'),
(23, 0, 'Calefacción', 2, 'calefaccion', 0, '2010-07-21 18:25:19', '0000-00-00 00:00:00'),
(24, 0, 'Ventilaciones Conductos', 3, 'ventilaciones-conductos', 0, '2010-07-21 18:25:43', '0000-00-00 00:00:00'),
(25, 22, 'Comercial', 1, 'comercial', 1, '2010-07-21 18:26:47', '0000-00-00 00:00:00'),
(26, 22, 'Light Comercial', 2, 'light-comercial', 1, '2010-07-21 18:28:00', '0000-00-00 00:00:00'),
(27, 22, 'Residencial', 3, 'residencial', 1, '2010-07-21 18:28:17', '2010-07-21 18:34:39'),
(28, 23, 'Calderas y Quemadores', 1, 'calderas-y-quemadores', 1, '2010-07-21 18:28:57', '0000-00-00 00:00:00'),
(29, 23, 'Paneles Solares', 2, 'paneles-solares', 1, '2010-07-21 18:30:00', '0000-00-00 00:00:00'),
(30, 23, 'Piso Radiante', 3, 'piso-radiante', 1, '2010-07-21 18:31:12', '0000-00-00 00:00:00'),
(31, 23, 'Radiadores y Toalleros', 4, 'radiadores-y-toalleros', 1, '2010-07-21 18:33:29', '0000-00-00 00:00:00');

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
('30c39107ac109861e84105c8293406a2', '192.168.1.3', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.2.7', 1280116276, 'a:3:{s:8:"username";s:5:"admin";s:7:"user_id";s:1:"1";s:9:"logged_in";s:1:"1";}'),
('3bee7649d7663792358802d0427786d3', '192.168.1.3', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1;', 1280115029, ''),
('dc6d65b915febe2f94ee41b691f7dca1', '192.168.1.3', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES; rv', 1280114941, 'a:3:{s:8:"username";s:5:"admin";s:7:"user_id";s:1:"1";s:9:"logged_in";s:1:"1";}'),
('723357c132476ee6d264e10efbb9549e', '192.168.1.3', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1;', 1280114775, 'a:3:{s:8:"username";s:5:"admin";s:7:"user_id";s:1:"1";s:9:"logged_in";s:1:"1";}'),
('17c3a748db26aa0dbaadaa6671afb588', '127.0.0.1', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.2.7', 1280114254, 'a:3:{s:8:"username";s:5:"admin";s:7:"user_id";s:1:"1";s:9:"logged_in";s:1:"1";}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcar la base de datos para la tabla `obras`
--

INSERT INTO `obras` (`obra_id`, `name`, `order`, `date_added`, `last_modified`) VALUES
(1, 'Edificio Alto Belgrano', 3, '2010-07-16 19:49:52', '2010-07-24 01:09:28'),
(2, 'Condominos Dalvian', 1, '2010-07-16 19:50:08', '0000-00-00 00:00:00'),
(3, 'Banco de La Nación Argentina Sucursal San Rafael, Mendoza', 2, '2010-07-16 19:50:23', '0000-00-00 00:00:00'),
(4, 'Banco de La Nación Argentina Sucursal Necochea y 9 de Julio, Mendoza', 4, '2010-07-16 19:50:34', '0000-00-00 00:00:00'),
(5, 'Banco de La Nación Argentina Sucursal San Martín, Ciudad, Mendoza.', 5, '2010-07-16 19:50:47', '0000-00-00 00:00:00'),
(6, 'Banco Creedicop, Maipú, Mendoza.', 6, '2010-07-16 19:51:01', '0000-00-00 00:00:00'),
(7, 'Salas de Gobierno Universidad Champagnat, Mendoza', 7, '2010-07-16 19:51:27', '0000-00-00 00:00:00'),
(8, 'Nuevo Edificio Diputados. Mendoza', 8, '2010-07-16 19:51:40', '0000-00-00 00:00:00'),
(9, 'Clínica Francesa, Mendoza', 9, '2010-07-16 19:51:51', '0000-00-00 00:00:00'),
(10, 'Hospital en Las Heras, Mendoza', 10, '2010-07-16 19:52:00', '0000-00-00 00:00:00'),
(11, 'Hospital Saporitti, Rivadavia, Mendoza', 11, '2010-07-16 19:52:11', '0000-00-00 00:00:00'),
(12, 'Instituto Imagen y Diagnóstico', 12, '2010-07-16 19:52:21', '0000-00-00 00:00:00'),
(13, 'Teatro Independencia', 13, '2010-07-16 19:52:34', '0000-00-00 00:00:00'),
(14, 'Mendoza Plaza Shopping', 14, '2010-07-16 19:52:44', '0000-00-00 00:00:00'),
(15, 'Bodega Familia Zuccardi', 15, '2010-07-16 19:52:56', '0000-00-00 00:00:00'),
(16, 'Bodega Diageo (Navarro Correas)', 16, '2010-07-16 19:53:09', '0000-00-00 00:00:00'),
(17, 'Bodega Viñas de Agrelo, Mendoza', 18, '2010-07-16 19:53:20', '0000-00-00 00:00:00'),
(18, 'Bodega Vista Flores', 17, '2010-07-16 19:53:34', '0000-00-00 00:00:00'),
(19, 'Aeropuerto Argentina 2000 – Aeropuerto San Luis', 19, '2010-07-16 19:53:44', '0000-00-00 00:00:00'),
(20, 'Call Center Telecom, Mendoza', 20, '2010-07-16 19:53:54', '0000-00-00 00:00:00'),
(21, 'Taller Hangar Villa Reynolds, San Luis', 21, '2010-07-16 19:54:04', '0000-00-00 00:00:00'),
(22, 'Centrales Térmicas Mendoza', 22, '2010-07-16 19:54:13', '0000-00-00 00:00:00'),
(23, 'Planta Industrial Diario Los Andes, Mendoza', 23, '2010-07-16 19:54:24', '0000-00-00 00:00:00'),
(24, 'Hotel Hyatt Mendoza', 24, '2010-07-16 19:54:36', '0000-00-00 00:00:00'),
(25, 'Concesionaria de automotores Genco, Mendoza', 25, '2010-07-16 19:54:45', '0000-00-00 00:00:00'),
(26, 'Conicet', 26, '2010-07-16 19:54:55', '0000-00-00 00:00:00'),
(27, 'Sistema de Climatización en Bioplanta ISCAMEN, Mendoza', 27, '2010-07-16 19:55:04', '0000-00-00 00:00:00'),
(28, 'Bolsa de Comercio, calle Sarmiento y España, Mendoza', 28, '2010-07-16 19:55:13', '0000-00-00 00:00:00'),
(29, 'Oficinas varias Ministerio de Seguridad de Mendoza', 29, '2010-07-16 19:55:23', '0000-00-00 00:00:00'),
(30, 'Casino de Mendoza', 30, '2010-07-16 19:55:35', '0000-00-00 00:00:00'),
(31, 'Viviendas Unifamiliares', 31, '2010-07-16 19:55:45', '0000-00-00 00:00:00'),
(32, 'Viviendas Colectivas', 32, '2010-07-16 19:55:54', '0000-00-00 00:00:00'),
(33, 'Edificios de Oficinas', 33, '2010-07-16 19:56:03', '0000-00-00 00:00:00'),
(34, 'Canal 7 Mendoza', 34, '2010-07-16 19:56:13', '0000-00-00 00:00:00'),
(35, 'Hangar Departamento Vialidad Nacional en Puente del Inca, Mendoza', 35, '2010-07-16 19:56:23', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `obras_gallery`
--

INSERT INTO `obras_gallery` (`obrasgallery_id`, `obra_id`, `image`, `thumb`, `width`, `height`, `order`, `date_added`, `last_modified`) VALUES
(1, 1, '12799445414c4a675dbcbf8__100_2019.jpg', '12799445414c4a675dbcbf8__100_2019_thumb.jpg', 138, 103, 1, '2010-07-24 01:09:08', '0000-00-00 00:00:00'),
(2, 1, '12799445634c4a6773ac675__papataller_011.jpg', '12799445634c4a6773ac675__papataller_011_thumb.jpg', 138, 103, 2, '2010-07-24 01:09:29', '0000-00-00 00:00:00');

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
  `product_name` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `thumb_width` int(11) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `order` int(3) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Volcar la base de datos para la tabla `products`
--

INSERT INTO `products` (`products_id`, `product_name`, `image`, `thumb`, `thumb_width`, `thumb_height`, `order`, `date_added`, `last_modified`) VALUES
(15, 'Centrífugas y por Absorción', '12797482484c4768981bb99__centrífugas-y-por-absorción.jpg', '12797482484c4768981bb99__centrífugas-y-por-absorción_thumb.jpg', 128, 95, 37, '2010-07-21 18:37:28', '0000-00-00 00:00:00'),
(16, 'Controladores de Campo CCN', '12797482994c4768cb7c3d7__controladores-_de_campo_ccn.jpg', '12797482994c4768cb7c3d7__controladores-_de_campo_ccn_thumb.jpg', 128, 95, 36, '2010-07-21 18:38:19', '0000-00-00 00:00:00'),
(17, 'Controles de Integración', '12797490604c476bc4c3229__controles-de-integración.jpg', '12797490604c476bc4c3229__controles-de-integración_thumb.jpg', 121, 82, 37, '2010-07-21 18:51:00', '0000-00-00 00:00:00'),
(18, 'Enfriadoras de Líquido Especiales', '12797490914c476be36c218__enfriadoras-de-líquido-especiales.jpg', '12797490914c476be36c218__enfriadoras-de-líquido-especiales_thumb.jpg', 128, 95, 38, '2010-07-21 18:51:31', '0000-00-00 00:00:00'),
(19, 'Enfriadoras de Líquido por Absorción Carrier Sanyo', '12797491274c476c0777bcd__enfriadoras-de-líquido-por-absorción-carrier-sanyo.jpg', '12797491274c476c0777bcd__enfriadoras-de-líquido-por-absorción-carrier-sanyo_thumb.jpg', 128, 95, 42, '2010-07-21 18:52:07', '0000-00-00 00:00:00'),
(20, 'Equipos de Precisión', '12797491564c476c240852f__equipos-de-precisión.jpg', '12797491564c476c240852f__equipos-de-precisión_thumb.jpg', 128, 95, 40, '2010-07-21 18:52:36', '0000-00-00 00:00:00'),
(21, 'Interfases de red', '12797491864c476c4289223__interfases-de-red.jpg', '12797491864c476c4289223__interfases-de-red_thumb.jpg', 128, 95, 39, '2010-07-21 18:53:06', '0000-00-00 00:00:00'),
(22, 'Periféricos Control Sensores de Temperatura y Humedad', '12797492264c476c6ab3fab__periféricos-control----sensores-de-temperatura-y-humedad.jpg', '12797492264c476c6ab3fab__periféricos-control----sensores-de-temperatura-y-humedad_thumb.jpg', 128, 95, 47, '2010-07-21 18:53:46', '0000-00-00 00:00:00'),
(23, 'Sistemas Separados Comerciales 40MS- 38KF/QF/AKA/AQA', '12797514024c4774eaf3320__sistemas-separados-comerciales-40ms--38kf_qf_aka_aqa.jpg', '12797514024c4774eaf3320__sistemas-separados-comerciales-40ms--38kf_qf_aka_aqa_thumb.jpg', 128, 95, 41, '2010-07-21 19:30:03', '2010-07-23 21:48:16'),
(24, 'Sistemas Separados Comerciales 40MZ-38KF/AQA', '12797514704c47752e95c9e__sistemas-separados-comerciales-40mz--38kf_aqa.jpg', '12797514704c47752e95c9e__sistemas-separados-comerciales-40mz--38kf_aqa_thumb.jpg', 102, 118, 44, '2010-07-21 19:31:10', '2010-07-23 21:47:26'),
(25, 'Sistema VVT 3V', '12797514944c47754652668__sistema-vvt-3v.jpg', '12797514944c47754652668__sistema-vvt-3v_thumb.jpg', 128, 97, 29, '2010-07-21 19:31:34', '0000-00-00 00:00:00'),
(26, 'Unidades Autocontenidas Condensación por Agua 50BPB/BP', '12797517694c477659c05f7__unidades-autocontenidas-condensación-por-agua-50bpb_bp.jpg', '12797517694c477659c05f7__unidades-autocontenidas-condensación-por-agua-50bpb_bp_thumb.jpg', 128, 82, 31, '2010-07-21 19:36:09', '2010-07-23 21:49:31'),
(27, 'Unidades Enfriadoras Condensación por Agua Compresor Scroll-30HK 30HR', '12797518124c477684d58d2__unidades-enfriadoras-condensación-por-agua-compresor-scroll-30hk_30hr.jpg', '12797518124c477684d58d2__unidades-enfriadoras-condensación-por-agua-compresor-scroll-30hk_30hr_thumb.jpg', 128, 95, 32, '2010-07-21 19:36:52', '0000-00-00 00:00:00'),
(28, 'Unidades Enfriadoras Condensación por Aire Compresor Scroll', '12797518434c4776a30f989__unidades-enfriadoras-condensación-por-aire-compresor-scroll.jpg', '12797518434c4776a30f989__unidades-enfriadoras-condensación-por-aire-compresor-scroll_thumb.jpg', 128, 95, 33, '2010-07-21 19:37:23', '0000-00-00 00:00:00'),
(29, 'Unidades Enfriadoras Condensación por Aire Compresor Scroll 30RB', '12797518714c4776bf27864__unidades-enfriadoras-condensación-por-aire-compresor-scroll-30rb.jpg', '12797518714c4776bf27864__unidades-enfriadoras-condensación-por-aire-compresor-scroll-30rb_thumb.jpg', 119, 118, 34, '2010-07-21 19:37:51', '0000-00-00 00:00:00'),
(30, 'Unidades Enfriadoras Ecológicas Condensación por Agua Compresor Screw 30HX', '12797519104c4776e6ef4dd__unidades-enfriadoras-ecológicas-condensación-por-agua-compresor-screw-–-30hx.jpg', '12797519104c4776e6ef4dd__unidades-enfriadoras-ecológicas-condensación-por-agua-compresor-screw-–-30hx_thumb.jpg', 128, 95, 35, '2010-07-21 19:38:30', '0000-00-00 00:00:00'),
(31, 'Unidades Enfriadoras Ecológicas Condensación por Aire Compresor Screw 30GX', '12797519494c47770decb28__unidades-enfriadoras-ecológicas-condensación-por-aire-compresor-screw-30gx.jpg', '12797519494c47770decb28__unidades-enfriadoras-ecológicas-condensación-por-aire-compresor-screw-30gx_thumb.jpg', 128, 95, 38, '2010-07-21 19:39:09', '0000-00-00 00:00:00'),
(32, 'Unidades Enfriadoras Ecológicas Condensación por Aire Compresor Screw 30XA Aquaforce', '12797523674c4778afe23cb__unidades-enfriadoras-ecológicas-condensación-por-aire-compresor-screw-30xa-aquaforce.jpg', '12797523674c4778afe23cb__unidades-enfriadoras-ecológicas-condensación-por-aire-compresor-screw-30xa-aquaforce_thumb.jpg', 128, 66, 37, '2010-07-21 19:46:07', '0000-00-00 00:00:00'),
(33, 'Unidades Fan Coil Agua Fría Terminales 42LSA', '12797528274c477a7b891d2__unidades-fan-coil-agua-fría-terminales-42lsa.jpg', '12797528274c477a7b891d2__unidades-fan-coil-agua-fría-terminales-42lsa_thumb.jpg', 128, 95, 41, '2010-07-21 19:53:47', '0000-00-00 00:00:00'),
(34, 'Unidades Fan Coil Baja Silueta Agua Fría 42 B', '12797528604c477a9c9ec92__unidades-fan-coil-baja-silueta-agua-fría-42-b.jpg', '12797528604c477a9c9ec92__unidades-fan-coil-baja-silueta-agua-fría-42-b_thumb.jpg', 128, 95, 39, '2010-07-21 19:54:20', '0000-00-00 00:00:00'),
(35, 'Unidades Fan Coil Terminales Agua Fría 42 N', '12797528984c477ac238bc5__unidades-fan-coil-terminales-agua-fría-42-n.jpg', '12797528984c477ac238bc5__unidades-fan-coil-terminales-agua-fría-42-n_thumb.jpg', 128, 95, 37, '2010-07-21 19:54:58', '0000-00-00 00:00:00'),
(36, 'Unidades Manejadoras de Aire Agua Fría 39 ITC', '12797529284c477ae019aca__unidades-manejadoras-de-aire-agua-fría-39-itc.jpg', '12797529284c477ae019aca__unidades-manejadoras-de-aire-agua-fría-39-itc_thumb.jpg', 128, 95, 45, '2010-07-21 19:55:28', '0000-00-00 00:00:00'),
(37, 'Unidades Manejadoras de Aire Modulares Agua Fría 39CMA Cubo mágico', '12797542974c478039678c6__unidades-manejadoras-de-aire-modulares-agua-fría-39cma-cubo-mágico.jpg', '12797542974c478039678c6__unidades-manejadoras-de-aire-modulares-agua-fría-39cma-cubo-mágico_thumb.jpg', 128, 40, 40, '2010-07-21 20:18:17', '0000-00-00 00:00:00'),
(38, 'Unidades Roof Top  50TJN/ 48TJND/ 50TQN', '12797543204c4780505bbc1__unidades-roof-top--50tjn_48tjnd_50tqn.jpg', '12797543204c4780505bbc1__unidades-roof-top--50tjn_48tjnd_50tqn_thumb.jpg', 128, 60, 43, '2010-07-21 20:18:40', '2010-07-23 21:43:24'),
(39, 'Unidades Roof Top Ecológicas', '12797543424c47806602f03__unidades-roof-top--ecológicas.jpg', '12797543424c47806602f03__unidades-roof-top--ecológicas_thumb.jpg', 128, 60, 46, '2010-07-21 20:19:02', '0000-00-00 00:00:00'),
(40, 'Unidades-tipo-Cassette', '12797543664c47807e14bab__unidades-tipo-cassette.jpg', '12797543664c47807e14bab__unidades-tipo-cassette_thumb.jpg', 128, 95, 30, '2010-07-21 20:19:26', '0000-00-00 00:00:00'),
(41, 'Acondicionadores de Aire Tipo Cassette', '12799265524c4a21180cf54__acondicionadores-de-aire-tipo-cassette.jpg', '12799265524c4a21180cf54__acondicionadores-de-aire-tipo-cassette_thumb.jpg', 103, 118, 4, '2010-07-23 20:09:12', '0000-00-00 00:00:00'),
(42, 'Calefactor a Gas Evaporadora Condensadora', '12799266584c4a21826b371__calefactor-a-gas_evaporadora_condensadora.jpg', '12799266584c4a21826b371__calefactor-a-gas_evaporadora_condensadora_thumb.jpg', 128, 100, 5, '2010-07-23 20:10:58', '0000-00-00 00:00:00'),
(43, 'Controles y Termostatos Comfort Zone II. Sistema Multizona, Volumen y Temperatura variable', '12799266984c4a21aa6d67d__controles-y-termostatos----comfort-zone-ii.jpg', '12799266984c4a21aa6d67d__controles-y-termostatos----comfort-zone-ii_thumb.jpg', 128, 104, 3, '2010-07-23 20:11:38', '2010-07-23 21:29:11'),
(44, 'Equipos Piso Techo', '12799267174c4a21bdb2cd7__equipos-piso-techo.jpg', '12799267174c4a21bdb2cd7__equipos-piso-techo_thumb.jpg', 102, 118, 4, '2010-07-23 20:11:57', '0000-00-00 00:00:00'),
(45, 'Sistema Separados 40ME- 38X/C', '12799267384c4a21d235f7f__sistema-separados.jpg', '12799267384c4a21d235f7f__sistema-separados_thumb.jpg', 128, 52, 5, '2010-07-23 20:12:18', '2010-07-23 20:18:04'),
(46, 'Sistemas  Separados 40MS- 38HC/QC', '12799272404c4a23c844657__sistemas--separados.jpg', '12799272404c4a23c844657__sistemas--separados_thumb.jpg', 128, 53, 6, '2010-07-23 20:20:40', '0000-00-00 00:00:00'),
(48, 'Sistemas Separados Baja Silueta', '12799275394c4a24f32e969__sistemas-separados-baja-silueta.jpg', '12799275394c4a24f32e969__sistemas-separados-baja-silueta_thumb.jpg', 128, 103, 7, '2010-07-23 20:25:39', '0000-00-00 00:00:00'),
(49, 'Unidades Roof Top', '12799275794c4a251b094b7__unidades-roof-top.jpg', '12799275794c4a251b094b7__unidades-roof-top_thumb.jpg', 128, 87, 8, '2010-07-23 20:26:19', '0000-00-00 00:00:00'),
(50, 'Unidades Roof Top Ecológicas', '12799275974c4a252d1f9c4__unidades-roof-top-ecológicas.jpg', '12799275974c4a252d1f9c4__unidades-roof-top-ecológicas_thumb.jpg', 128, 87, 9, '2010-07-23 20:26:37', '0000-00-00 00:00:00'),
(51, 'Equipos de Ventana', '12799276434c4a255b0f703__equipos-de-ventas.jpg', '12799276434c4a255b0f703__equipos-de-ventas_thumb.jpg', 127, 118, 51, '2010-07-23 20:27:23', '2010-07-23 21:10:08'),
(52, 'Equipos Multisplit Xpower Invertir y Toshiba', '12799276694c4a2575e8372__equipos-multisplit-xpower-invertir-y-toshiba.jpg', '12799276694c4a2575e8372__equipos-multisplit-xpower-invertir-y-toshiba_thumb.jpg', 128, 66, 53, '2010-07-23 20:27:49', '0000-00-00 00:00:00'),
(53, 'Equipos Split de Pared', '12799277024c4a2596e1415__equipos-split-de-pared.jpg', '12799277024c4a2596e1415__equipos-split-de-pared_thumb.jpg', 128, 75, 52, '2010-07-23 20:28:22', '2010-07-23 21:10:35'),
(54, 'Acumuladores sanitarios baxi', '12799277634c4a25d36647b__acumuladores-sanitarios-baxi.jpg', '12799277634c4a25d36647b__acumuladores-sanitarios-baxi_thumb.jpg', 55, 118, 13, '2010-07-23 20:29:23', '0000-00-00 00:00:00'),
(55, 'Calderas a Leña', '12799278864c4a264e461a3__calderas--a-leña.jpg', '12799278864c4a264e461a3__calderas--a-leña_thumb.jpg', 128, 117, 12, '2010-07-23 20:31:26', '2010-07-23 21:07:03'),
(56, 'Calderas Centrales de Alta Capacidad', '12799279074c4a2663c0d0b__calderas-centrales-de-alta-capacidad.jpg', '12799279074c4a2663c0d0b__calderas-centrales-de-alta-capacidad_thumb.jpg', 125, 118, 14, '2010-07-23 20:31:47', '0000-00-00 00:00:00'),
(57, 'Calderas Compactas Westen de pie. Linea Compact FS', '12799279614c4a2699a9b11__calderas-compactas-westen-de-pie.jpg', '12799279614c4a2699a9b11__calderas-compactas-westen-de-pie_thumb.jpg', 57, 118, 15, '2010-07-23 20:32:41', '2010-07-23 21:06:09'),
(58, 'Calderas Compactas Westen Murales. Linea Pulsar D', '12799279854c4a26b138709__calderas-compactas-westen-murales.jpg', '12799279854c4a26b138709__calderas-compactas-westen-murales_thumb.jpg', 82, 118, 16, '2010-07-23 20:33:05', '2010-07-23 21:01:36'),
(59, 'Calderas Eléctricas', '12799280424c4a26ea45f0a__calderas-eléctricas.jpg', '12799280424c4a26ea45f0a__calderas-eléctricas_thumb.jpg', 95, 118, 17, '2010-07-23 20:34:02', '0000-00-00 00:00:00'),
(60, 'Calderas Para Piscinas', '12799280584c4a26fa7768b__calderas-para-piscinas.jpg', '12799280584c4a26fa7768b__calderas-para-piscinas_thumb.jpg', 95, 118, 18, '2010-07-23 20:34:18', '0000-00-00 00:00:00'),
(61, 'Calderas Compactas Westen Murales. Linea Quasar D', '12799280794c4a270f20858__linea--quasar-d.jpg', '12799280794c4a270f20858__linea--quasar-d_thumb.jpg', 66, 118, 10, '2010-07-23 20:34:39', '2010-07-23 21:04:41'),
(62, 'Calderas Compactas Westen Murales. Linea Star Digit', '12799281634c4a2763ca8fb__linea-star-digit.jpg', '12799281634c4a2763ca8fb__linea-star-digit_thumb.jpg', 85, 118, 9, '2010-07-23 20:36:03', '2010-07-23 21:05:00'),
(63, 'Modelo CAC', '12799281824c4a2776a2627__modelo-cac.jpg', '12799281824c4a2776a2627__modelo-cac_thumb.jpg', 126, 118, 11, '2010-07-23 20:36:22', '0000-00-00 00:00:00'),
(64, 'Caños', '12799282094c4a2791b57d7__caños.jpg', '12799282094c4a2791b57d7__caños_thumb.jpg', 109, 105, 1, '2010-07-23 20:36:49', '0000-00-00 00:00:00'),
(65, 'Colectores', '12799282224c4a279e7e36d__colectores.jpg', '12799282224c4a279e7e36d__colectores_thumb.jpg', 127, 115, 2, '2010-07-23 20:37:02', '0000-00-00 00:00:00'),
(66, 'Línea Kaldo', '12799282454c4a27b53294f__línea-kaldo.jpg', '12799282454c4a27b53294f__línea-kaldo_thumb.jpg', 92, 118, 1, '2010-07-23 20:37:25', '0000-00-00 00:00:00'),
(67, 'Toalleros', '12799282574c4a27c137b4f__toalleros.jpg', '12799282574c4a27c137b4f__toalleros_thumb.jpg', 54, 118, 2, '2010-07-23 20:37:37', '0000-00-00 00:00:00'),
(68, 'Conductos de chapa y ventilaciones', '12799289474c4a2a730474d__conductos-de-chapa-y-ventilaciones.jpg', '12799289474c4a2a730474d__conductos-de-chapa-y-ventilaciones_thumb.jpg', 128, 96, 1, '2010-07-23 20:49:08', '0000-00-00 00:00:00'),
(69, 'Cortinas de Aire', '12799290594c4a2ae36a84e__cortinas-de-aire.jpg', '12799290594c4a2ae36a84e__cortinas-de-aire_thumb.jpg', 128, 104, 2, '2010-07-23 20:50:59', '0000-00-00 00:00:00'),
(70, 'Extractores', '12799290734c4a2af16defe__extractores.jpg', '12799290734c4a2af16defe__extractores_thumb.jpg', 128, 90, 3, '2010-07-23 20:51:13', '0000-00-00 00:00:00'),
(71, 'Ventiladores Axiales', '12799290884c4a2b00e940b__ventiladores-axiales.jpg', '12799290884c4a2b00e940b__ventiladores-axiales_thumb.jpg', 119, 118, 4, '2010-07-23 20:51:28', '0000-00-00 00:00:00'),
(72, 'Ventiladores centrífugos', '12799291044c4a2b1084d2f__ventiladores-centrífugos.jpg', '12799291044c4a2b1084d2f__ventiladores-centrífugos_thumb.jpg', 97, 118, 5, '2010-07-23 20:51:44', '0000-00-00 00:00:00');

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
(15, 25, 22),
(16, 25, 22),
(17, 25, 22),
(18, 25, 22),
(19, 25, 22),
(20, 25, 22),
(21, 25, 22),
(22, 25, 22),
(23, 25, 22),
(24, 25, 22),
(25, 25, 22),
(26, 25, 22),
(27, 25, 22),
(28, 25, 22),
(29, 25, 22),
(30, 25, 22),
(31, 25, 22),
(32, 25, 22),
(33, 25, 22),
(34, 25, 22),
(35, 25, 22),
(36, 25, 22),
(37, 25, 22),
(38, 25, 22),
(39, 25, 22),
(40, 25, 22),
(41, 26, 22),
(42, 26, 22),
(43, 26, 22),
(44, 26, 22),
(45, 26, 22),
(46, 26, 22),
(48, 26, 22),
(49, 26, 22),
(50, 26, 22),
(51, 27, 22),
(52, 27, 22),
(53, 27, 22),
(54, 28, 23),
(55, 28, 23),
(56, 28, 23),
(57, 28, 23),
(58, 28, 23),
(59, 28, 23),
(60, 28, 23),
(61, 28, 23),
(62, 28, 23),
(63, 28, 23),
(64, 30, 23),
(65, 30, 23),
(66, 31, 23),
(67, 31, 23),
(68, 24, 0),
(69, 24, 0),
(70, 24, 0),
(71, 24, 0),
(72, 24, 0);

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
(1, 'Aire Acondicionado', 2, '2010-07-16 10:33:44', '0000-00-00 00:00:00'),
(2, 'Calderas y Radiadores', 3, '2010-07-16 10:34:50', '0000-00-00 00:00:00'),
(3, 'Piso Radiante', 4, '2010-07-16 10:35:14', '0000-00-00 00:00:00'),
(4, 'Ventilaciones y Extracciones', 5, '2010-07-16 10:35:45', '0000-00-00 00:00:00');

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
  `emailcv` varchar(100) NOT NULL,
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

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `emailcv`, `phone1`, `phone2`, `address1`, `address2`, `date_added`, `last_modified`) VALUES
(1, 'admin', 'PihkQ4pWJhOI1o8z/kWDyHQPfH6KekSHzQ/muA==', 'ingpriolo@speedy.com.ar', 'iwmattoni@yahoo.com', '(0261) 4200441 – 4250361', '(0261) 4473336', 'Laprida 228 – Ciudad - Mendoza', 'Parque Industrial Eje Norte entre calle 7 esq. 4 - Las Heras - Mendoza', '2010-06-15 00:00:00', '2010-07-07 22:38:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `v_categories`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `priolo`.`v_categories` AS select distinct `priolo`.`categories`.`categories_id` AS `categories_id`,`priolo`.`categories`.`parent_id` AS `parent_id`,`priolo`.`categories`.`categorie_name` AS `categorie_name`,`priolo`.`categories`.`order` AS `order`,`priolo`.`categories`.`reference` AS `reference`,`priolo`.`categories`.`level` AS `level`,`priolo`.`categories`.`date_added` AS `date_added`,`priolo`.`categories`.`last_modified` AS `last_modified` from (`priolo`.`products_to_categories` join `priolo`.`categories` on((`priolo`.`products_to_categories`.`categories_id` = `priolo`.`categories`.`categories_id`))) order by `priolo`.`categories`.`order`;

--
-- Volcar la base de datos para la tabla `v_categories`
--

INSERT INTO `v_categories` (`categories_id`, `parent_id`, `categorie_name`, `order`, `reference`, `level`, `date_added`, `last_modified`) VALUES
(25, 22, 'Comercial', 1, 'comercial', 1, '2010-07-21 18:26:47', '0000-00-00 00:00:00'),
(28, 23, 'Calderas y Quemadores', 1, 'calderas-y-quemadores', 1, '2010-07-21 18:28:57', '0000-00-00 00:00:00'),
(26, 22, 'Light Comercial', 2, 'light-comercial', 1, '2010-07-21 18:28:00', '0000-00-00 00:00:00'),
(24, 0, 'Ventilaciones Conductos', 3, 'ventilaciones-conductos', 0, '2010-07-21 18:25:43', '0000-00-00 00:00:00'),
(27, 22, 'Residencial', 3, 'residencial', 1, '2010-07-21 18:28:17', '2010-07-21 18:34:39'),
(30, 23, 'Piso Radiante', 3, 'piso-radiante', 1, '2010-07-21 18:31:12', '0000-00-00 00:00:00'),
(31, 23, 'Radiadores y Toalleros', 4, 'radiadores-y-toalleros', 1, '2010-07-21 18:33:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `v_products`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `priolo`.`v_products` AS select `priolo`.`products`.`products_id` AS `products_id`,`priolo`.`products`.`product_name` AS `product_name`,`priolo`.`products`.`image` AS `image`,`priolo`.`products`.`thumb` AS `thumb`,`priolo`.`products`.`thumb_width` AS `thumb_width`,`priolo`.`products`.`thumb_height` AS `thumb_height`,`priolo`.`products`.`order` AS `order`,`priolo`.`products`.`date_added` AS `date_added`,`priolo`.`products`.`last_modified` AS `last_modified`,`priolo`.`categories`.`categorie_name` AS `categorie_name`,`priolo`.`categories`.`categories_id` AS `categories_id`,`priolo`.`categories`.`level` AS `level` from ((`priolo`.`products` join `priolo`.`products_to_categories` on((`priolo`.`products`.`products_id` = `priolo`.`products_to_categories`.`products_id`))) join `priolo`.`categories` on((`priolo`.`products_to_categories`.`categories_id` = `priolo`.`categories`.`categories_id`))) order by `priolo`.`products`.`order`;

--
-- Volcar la base de datos para la tabla `v_products`
--

INSERT INTO `v_products` (`products_id`, `product_name`, `image`, `thumb`, `thumb_width`, `thumb_height`, `order`, `date_added`, `last_modified`, `categorie_name`, `categories_id`, `level`) VALUES
(64, 'Caños', '12799282094c4a2791b57d7__caños.jpg', '12799282094c4a2791b57d7__caños_thumb.jpg', 109, 105, 1, '2010-07-23 20:36:49', '0000-00-00 00:00:00', 'Piso Radiante', 30, 1),
(66, 'Línea Kaldo', '12799282454c4a27b53294f__línea-kaldo.jpg', '12799282454c4a27b53294f__línea-kaldo_thumb.jpg', 92, 118, 1, '2010-07-23 20:37:25', '0000-00-00 00:00:00', 'Radiadores y Toalleros', 31, 1),
(68, 'Conductos de chapa y ventilaciones', '12799289474c4a2a730474d__conductos-de-chapa-y-ventilaciones.jpg', '12799289474c4a2a730474d__conductos-de-chapa-y-ventilaciones_thumb.jpg', 128, 96, 1, '2010-07-23 20:49:08', '0000-00-00 00:00:00', 'Ventilaciones Conductos', 24, 0),
(65, 'Colectores', '12799282224c4a279e7e36d__colectores.jpg', '12799282224c4a279e7e36d__colectores_thumb.jpg', 127, 115, 2, '2010-07-23 20:37:02', '0000-00-00 00:00:00', 'Piso Radiante', 30, 1),
(67, 'Toalleros', '12799282574c4a27c137b4f__toalleros.jpg', '12799282574c4a27c137b4f__toalleros_thumb.jpg', 54, 118, 2, '2010-07-23 20:37:37', '0000-00-00 00:00:00', 'Radiadores y Toalleros', 31, 1),
(69, 'Cortinas de Aire', '12799290594c4a2ae36a84e__cortinas-de-aire.jpg', '12799290594c4a2ae36a84e__cortinas-de-aire_thumb.jpg', 128, 104, 2, '2010-07-23 20:50:59', '0000-00-00 00:00:00', 'Ventilaciones Conductos', 24, 0),
(43, 'Controles y Termostatos Comfort Zone II. Sistema Multizona, Volumen y Temperatura variable', '12799266984c4a21aa6d67d__controles-y-termostatos----comfort-zone-ii.jpg', '12799266984c4a21aa6d67d__controles-y-termostatos----comfort-zone-ii_thumb.jpg', 128, 104, 3, '2010-07-23 20:11:38', '2010-07-23 21:29:11', 'Light Comercial', 26, 1),
(70, 'Extractores', '12799290734c4a2af16defe__extractores.jpg', '12799290734c4a2af16defe__extractores_thumb.jpg', 128, 90, 3, '2010-07-23 20:51:13', '0000-00-00 00:00:00', 'Ventilaciones Conductos', 24, 0),
(41, 'Acondicionadores de Aire Tipo Cassette', '12799265524c4a21180cf54__acondicionadores-de-aire-tipo-cassette.jpg', '12799265524c4a21180cf54__acondicionadores-de-aire-tipo-cassette_thumb.jpg', 103, 118, 4, '2010-07-23 20:09:12', '0000-00-00 00:00:00', 'Light Comercial', 26, 1),
(44, 'Equipos Piso Techo', '12799267174c4a21bdb2cd7__equipos-piso-techo.jpg', '12799267174c4a21bdb2cd7__equipos-piso-techo_thumb.jpg', 102, 118, 4, '2010-07-23 20:11:57', '0000-00-00 00:00:00', 'Light Comercial', 26, 1),
(71, 'Ventiladores Axiales', '12799290884c4a2b00e940b__ventiladores-axiales.jpg', '12799290884c4a2b00e940b__ventiladores-axiales_thumb.jpg', 119, 118, 4, '2010-07-23 20:51:28', '0000-00-00 00:00:00', 'Ventilaciones Conductos', 24, 0),
(42, 'Calefactor a Gas Evaporadora Condensadora', '12799266584c4a21826b371__calefactor-a-gas_evaporadora_condensadora.jpg', '12799266584c4a21826b371__calefactor-a-gas_evaporadora_condensadora_thumb.jpg', 128, 100, 5, '2010-07-23 20:10:58', '0000-00-00 00:00:00', 'Light Comercial', 26, 1),
(45, 'Sistema Separados 40ME- 38X/C', '12799267384c4a21d235f7f__sistema-separados.jpg', '12799267384c4a21d235f7f__sistema-separados_thumb.jpg', 128, 52, 5, '2010-07-23 20:12:18', '2010-07-23 20:18:04', 'Light Comercial', 26, 1),
(72, 'Ventiladores centrífugos', '12799291044c4a2b1084d2f__ventiladores-centrífugos.jpg', '12799291044c4a2b1084d2f__ventiladores-centrífugos_thumb.jpg', 97, 118, 5, '2010-07-23 20:51:44', '0000-00-00 00:00:00', 'Ventilaciones Conductos', 24, 0),
(46, 'Sistemas  Separados 40MS- 38HC/QC', '12799272404c4a23c844657__sistemas--separados.jpg', '12799272404c4a23c844657__sistemas--separados_thumb.jpg', 128, 53, 6, '2010-07-23 20:20:40', '0000-00-00 00:00:00', 'Light Comercial', 26, 1),
(48, 'Sistemas Separados Baja Silueta', '12799275394c4a24f32e969__sistemas-separados-baja-silueta.jpg', '12799275394c4a24f32e969__sistemas-separados-baja-silueta_thumb.jpg', 128, 103, 7, '2010-07-23 20:25:39', '0000-00-00 00:00:00', 'Light Comercial', 26, 1),
(49, 'Unidades Roof Top', '12799275794c4a251b094b7__unidades-roof-top.jpg', '12799275794c4a251b094b7__unidades-roof-top_thumb.jpg', 128, 87, 8, '2010-07-23 20:26:19', '0000-00-00 00:00:00', 'Light Comercial', 26, 1),
(50, 'Unidades Roof Top Ecológicas', '12799275974c4a252d1f9c4__unidades-roof-top-ecológicas.jpg', '12799275974c4a252d1f9c4__unidades-roof-top-ecológicas_thumb.jpg', 128, 87, 9, '2010-07-23 20:26:37', '0000-00-00 00:00:00', 'Light Comercial', 26, 1),
(62, 'Calderas Compactas Westen Murales. Linea Star Digit', '12799281634c4a2763ca8fb__linea-star-digit.jpg', '12799281634c4a2763ca8fb__linea-star-digit_thumb.jpg', 85, 118, 9, '2010-07-23 20:36:03', '2010-07-23 21:05:00', 'Calderas y Quemadores', 28, 1),
(61, 'Calderas Compactas Westen Murales. Linea Quasar D', '12799280794c4a270f20858__linea--quasar-d.jpg', '12799280794c4a270f20858__linea--quasar-d_thumb.jpg', 66, 118, 10, '2010-07-23 20:34:39', '2010-07-23 21:04:41', 'Calderas y Quemadores', 28, 1),
(63, 'Modelo CAC', '12799281824c4a2776a2627__modelo-cac.jpg', '12799281824c4a2776a2627__modelo-cac_thumb.jpg', 126, 118, 11, '2010-07-23 20:36:22', '0000-00-00 00:00:00', 'Calderas y Quemadores', 28, 1),
(55, 'Calderas a Leña', '12799278864c4a264e461a3__calderas--a-leña.jpg', '12799278864c4a264e461a3__calderas--a-leña_thumb.jpg', 128, 117, 12, '2010-07-23 20:31:26', '2010-07-23 21:07:03', 'Calderas y Quemadores', 28, 1),
(54, 'Acumuladores sanitarios baxi', '12799277634c4a25d36647b__acumuladores-sanitarios-baxi.jpg', '12799277634c4a25d36647b__acumuladores-sanitarios-baxi_thumb.jpg', 55, 118, 13, '2010-07-23 20:29:23', '0000-00-00 00:00:00', 'Calderas y Quemadores', 28, 1),
(56, 'Calderas Centrales de Alta Capacidad', '12799279074c4a2663c0d0b__calderas-centrales-de-alta-capacidad.jpg', '12799279074c4a2663c0d0b__calderas-centrales-de-alta-capacidad_thumb.jpg', 125, 118, 14, '2010-07-23 20:31:47', '0000-00-00 00:00:00', 'Calderas y Quemadores', 28, 1),
(57, 'Calderas Compactas Westen de pie. Linea Compact FS', '12799279614c4a2699a9b11__calderas-compactas-westen-de-pie.jpg', '12799279614c4a2699a9b11__calderas-compactas-westen-de-pie_thumb.jpg', 57, 118, 15, '2010-07-23 20:32:41', '2010-07-23 21:06:09', 'Calderas y Quemadores', 28, 1),
(58, 'Calderas Compactas Westen Murales. Linea Pulsar D', '12799279854c4a26b138709__calderas-compactas-westen-murales.jpg', '12799279854c4a26b138709__calderas-compactas-westen-murales_thumb.jpg', 82, 118, 16, '2010-07-23 20:33:05', '2010-07-23 21:01:36', 'Calderas y Quemadores', 28, 1),
(59, 'Calderas Eléctricas', '12799280424c4a26ea45f0a__calderas-eléctricas.jpg', '12799280424c4a26ea45f0a__calderas-eléctricas_thumb.jpg', 95, 118, 17, '2010-07-23 20:34:02', '0000-00-00 00:00:00', 'Calderas y Quemadores', 28, 1),
(60, 'Calderas Para Piscinas', '12799280584c4a26fa7768b__calderas-para-piscinas.jpg', '12799280584c4a26fa7768b__calderas-para-piscinas_thumb.jpg', 95, 118, 18, '2010-07-23 20:34:18', '0000-00-00 00:00:00', 'Calderas y Quemadores', 28, 1),
(25, 'Sistema VVT 3V', '12797514944c47754652668__sistema-vvt-3v.jpg', '12797514944c47754652668__sistema-vvt-3v_thumb.jpg', 128, 97, 29, '2010-07-21 19:31:34', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(40, 'Unidades-tipo-Cassette', '12797543664c47807e14bab__unidades-tipo-cassette.jpg', '12797543664c47807e14bab__unidades-tipo-cassette_thumb.jpg', 128, 95, 30, '2010-07-21 20:19:26', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(26, 'Unidades Autocontenidas Condensación por Agua 50BPB/BP', '12797517694c477659c05f7__unidades-autocontenidas-condensación-por-agua-50bpb_bp.jpg', '12797517694c477659c05f7__unidades-autocontenidas-condensación-por-agua-50bpb_bp_thumb.jpg', 128, 82, 31, '2010-07-21 19:36:09', '2010-07-23 21:49:31', 'Comercial', 25, 1),
(27, 'Unidades Enfriadoras Condensación por Agua Compresor Scroll-30HK 30HR', '12797518124c477684d58d2__unidades-enfriadoras-condensación-por-agua-compresor-scroll-30hk_30hr.jpg', '12797518124c477684d58d2__unidades-enfriadoras-condensación-por-agua-compresor-scroll-30hk_30hr_thumb.jpg', 128, 95, 32, '2010-07-21 19:36:52', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(28, 'Unidades Enfriadoras Condensación por Aire Compresor Scroll', '12797518434c4776a30f989__unidades-enfriadoras-condensación-por-aire-compresor-scroll.jpg', '12797518434c4776a30f989__unidades-enfriadoras-condensación-por-aire-compresor-scroll_thumb.jpg', 128, 95, 33, '2010-07-21 19:37:23', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(29, 'Unidades Enfriadoras Condensación por Aire Compresor Scroll 30RB', '12797518714c4776bf27864__unidades-enfriadoras-condensación-por-aire-compresor-scroll-30rb.jpg', '12797518714c4776bf27864__unidades-enfriadoras-condensación-por-aire-compresor-scroll-30rb_thumb.jpg', 119, 118, 34, '2010-07-21 19:37:51', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(30, 'Unidades Enfriadoras Ecológicas Condensación por Agua Compresor Screw 30HX', '12797519104c4776e6ef4dd__unidades-enfriadoras-ecológicas-condensación-por-agua-compresor-screw-–-30hx.jpg', '12797519104c4776e6ef4dd__unidades-enfriadoras-ecológicas-condensación-por-agua-compresor-screw-–-30hx_thumb.jpg', 128, 95, 35, '2010-07-21 19:38:30', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(16, 'Controladores de Campo CCN', '12797482994c4768cb7c3d7__controladores-_de_campo_ccn.jpg', '12797482994c4768cb7c3d7__controladores-_de_campo_ccn_thumb.jpg', 128, 95, 36, '2010-07-21 18:38:19', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(15, 'Centrífugas y por Absorción', '12797482484c4768981bb99__centrífugas-y-por-absorción.jpg', '12797482484c4768981bb99__centrífugas-y-por-absorción_thumb.jpg', 128, 95, 37, '2010-07-21 18:37:28', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(17, 'Controles de Integración', '12797490604c476bc4c3229__controles-de-integración.jpg', '12797490604c476bc4c3229__controles-de-integración_thumb.jpg', 121, 82, 37, '2010-07-21 18:51:00', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(32, 'Unidades Enfriadoras Ecológicas Condensación por Aire Compresor Screw 30XA Aquaforce', '12797523674c4778afe23cb__unidades-enfriadoras-ecológicas-condensación-por-aire-compresor-screw-30xa-aquaforce.jpg', '12797523674c4778afe23cb__unidades-enfriadoras-ecológicas-condensación-por-aire-compresor-screw-30xa-aquaforce_thumb.jpg', 128, 66, 37, '2010-07-21 19:46:07', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(35, 'Unidades Fan Coil Terminales Agua Fría 42 N', '12797528984c477ac238bc5__unidades-fan-coil-terminales-agua-fría-42-n.jpg', '12797528984c477ac238bc5__unidades-fan-coil-terminales-agua-fría-42-n_thumb.jpg', 128, 95, 37, '2010-07-21 19:54:58', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(18, 'Enfriadoras de Líquido Especiales', '12797490914c476be36c218__enfriadoras-de-líquido-especiales.jpg', '12797490914c476be36c218__enfriadoras-de-líquido-especiales_thumb.jpg', 128, 95, 38, '2010-07-21 18:51:31', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(31, 'Unidades Enfriadoras Ecológicas Condensación por Aire Compresor Screw 30GX', '12797519494c47770decb28__unidades-enfriadoras-ecológicas-condensación-por-aire-compresor-screw-30gx.jpg', '12797519494c47770decb28__unidades-enfriadoras-ecológicas-condensación-por-aire-compresor-screw-30gx_thumb.jpg', 128, 95, 38, '2010-07-21 19:39:09', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(21, 'Interfases de red', '12797491864c476c4289223__interfases-de-red.jpg', '12797491864c476c4289223__interfases-de-red_thumb.jpg', 128, 95, 39, '2010-07-21 18:53:06', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(34, 'Unidades Fan Coil Baja Silueta Agua Fría 42 B', '12797528604c477a9c9ec92__unidades-fan-coil-baja-silueta-agua-fría-42-b.jpg', '12797528604c477a9c9ec92__unidades-fan-coil-baja-silueta-agua-fría-42-b_thumb.jpg', 128, 95, 39, '2010-07-21 19:54:20', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(20, 'Equipos de Precisión', '12797491564c476c240852f__equipos-de-precisión.jpg', '12797491564c476c240852f__equipos-de-precisión_thumb.jpg', 128, 95, 40, '2010-07-21 18:52:36', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(37, 'Unidades Manejadoras de Aire Modulares Agua Fría 39CMA Cubo mágico', '12797542974c478039678c6__unidades-manejadoras-de-aire-modulares-agua-fría-39cma-cubo-mágico.jpg', '12797542974c478039678c6__unidades-manejadoras-de-aire-modulares-agua-fría-39cma-cubo-mágico_thumb.jpg', 128, 40, 40, '2010-07-21 20:18:17', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(23, 'Sistemas Separados Comerciales 40MS- 38KF/QF/AKA/AQA', '12797514024c4774eaf3320__sistemas-separados-comerciales-40ms--38kf_qf_aka_aqa.jpg', '12797514024c4774eaf3320__sistemas-separados-comerciales-40ms--38kf_qf_aka_aqa_thumb.jpg', 128, 95, 41, '2010-07-21 19:30:03', '2010-07-23 21:48:16', 'Comercial', 25, 1),
(33, 'Unidades Fan Coil Agua Fría Terminales 42LSA', '12797528274c477a7b891d2__unidades-fan-coil-agua-fría-terminales-42lsa.jpg', '12797528274c477a7b891d2__unidades-fan-coil-agua-fría-terminales-42lsa_thumb.jpg', 128, 95, 41, '2010-07-21 19:53:47', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(19, 'Enfriadoras de Líquido por Absorción Carrier Sanyo', '12797491274c476c0777bcd__enfriadoras-de-líquido-por-absorción-carrier-sanyo.jpg', '12797491274c476c0777bcd__enfriadoras-de-líquido-por-absorción-carrier-sanyo_thumb.jpg', 128, 95, 42, '2010-07-21 18:52:07', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(38, 'Unidades Roof Top  50TJN/ 48TJND/ 50TQN', '12797543204c4780505bbc1__unidades-roof-top--50tjn_48tjnd_50tqn.jpg', '12797543204c4780505bbc1__unidades-roof-top--50tjn_48tjnd_50tqn_thumb.jpg', 128, 60, 43, '2010-07-21 20:18:40', '2010-07-23 21:43:24', 'Comercial', 25, 1),
(24, 'Sistemas Separados Comerciales 40MZ-38KF/AQA', '12797514704c47752e95c9e__sistemas-separados-comerciales-40mz--38kf_aqa.jpg', '12797514704c47752e95c9e__sistemas-separados-comerciales-40mz--38kf_aqa_thumb.jpg', 102, 118, 44, '2010-07-21 19:31:10', '2010-07-23 21:47:26', 'Comercial', 25, 1),
(36, 'Unidades Manejadoras de Aire Agua Fría 39 ITC', '12797529284c477ae019aca__unidades-manejadoras-de-aire-agua-fría-39-itc.jpg', '12797529284c477ae019aca__unidades-manejadoras-de-aire-agua-fría-39-itc_thumb.jpg', 128, 95, 45, '2010-07-21 19:55:28', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(39, 'Unidades Roof Top Ecológicas', '12797543424c47806602f03__unidades-roof-top--ecológicas.jpg', '12797543424c47806602f03__unidades-roof-top--ecológicas_thumb.jpg', 128, 60, 46, '2010-07-21 20:19:02', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(22, 'Periféricos Control Sensores de Temperatura y Humedad', '12797492264c476c6ab3fab__periféricos-control----sensores-de-temperatura-y-humedad.jpg', '12797492264c476c6ab3fab__periféricos-control----sensores-de-temperatura-y-humedad_thumb.jpg', 128, 95, 47, '2010-07-21 18:53:46', '0000-00-00 00:00:00', 'Comercial', 25, 1),
(51, 'Equipos de Ventana', '12799276434c4a255b0f703__equipos-de-ventas.jpg', '12799276434c4a255b0f703__equipos-de-ventas_thumb.jpg', 127, 118, 51, '2010-07-23 20:27:23', '2010-07-23 21:10:08', 'Residencial', 27, 1),
(53, 'Equipos Split de Pared', '12799277024c4a2596e1415__equipos-split-de-pared.jpg', '12799277024c4a2596e1415__equipos-split-de-pared_thumb.jpg', 128, 75, 52, '2010-07-23 20:28:22', '2010-07-23 21:10:35', 'Residencial', 27, 1),
(52, 'Equipos Multisplit Xpower Invertir y Toshiba', '12799276694c4a2575e8372__equipos-multisplit-xpower-invertir-y-toshiba.jpg', '12799276694c4a2575e8372__equipos-multisplit-xpower-invertir-y-toshiba_thumb.jpg', 128, 66, 53, '2010-07-23 20:27:49', '0000-00-00 00:00:00', 'Residencial', 27, 1);
