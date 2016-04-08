-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2016 a las 15:56:45
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `frisko`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acl_phinxlog`
--

CREATE TABLE IF NOT EXISTS `acl_phinxlog` (
  `version` bigint(20) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acl_phinxlog`
--

INSERT INTO `acl_phinxlog` (`version`, `start_time`, `end_time`) VALUES
(20141229162641, '2016-03-08 01:51:37', '2016-03-08 01:51:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lft` (`lft`,`rght`),
  KEY `alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=284 ;

--
-- Volcado de datos para la tabla `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 552),
(2, 1, NULL, NULL, 'Articulos', 2, 15),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 2, NULL, NULL, 'isAuthorized', 13, 14),
(9, 1, NULL, NULL, 'Ventas', 16, 31),
(10, 9, NULL, NULL, 'index', 17, 18),
(11, 9, NULL, NULL, 'view', 19, 20),
(12, 9, NULL, NULL, 'add', 21, 22),
(13, 9, NULL, NULL, 'edit', 23, 24),
(14, 9, NULL, NULL, 'delete', 25, 26),
(15, 9, NULL, NULL, 'isAuthorized', 27, 28),
(16, 1, NULL, NULL, 'Umedidas', 32, 45),
(17, 16, NULL, NULL, 'index', 33, 34),
(18, 16, NULL, NULL, 'view', 35, 36),
(19, 16, NULL, NULL, 'add', 37, 38),
(20, 16, NULL, NULL, 'edit', 39, 40),
(21, 16, NULL, NULL, 'delete', 41, 42),
(22, 16, NULL, NULL, 'isAuthorized', 43, 44),
(23, 1, NULL, NULL, 'Provincias', 46, 59),
(24, 23, NULL, NULL, 'index', 47, 48),
(25, 23, NULL, NULL, 'view', 49, 50),
(26, 23, NULL, NULL, 'add', 51, 52),
(27, 23, NULL, NULL, 'edit', 53, 54),
(28, 23, NULL, NULL, 'delete', 55, 56),
(29, 23, NULL, NULL, 'isAuthorized', 57, 58),
(30, 1, NULL, NULL, 'ComprasDetalle', 60, 65),
(31, 30, NULL, NULL, 'delete', 61, 62),
(32, 30, NULL, NULL, 'isAuthorized', 63, 64),
(33, 1, NULL, NULL, 'Artfamilias', 66, 79),
(34, 33, NULL, NULL, 'index', 67, 68),
(35, 33, NULL, NULL, 'view', 69, 70),
(36, 33, NULL, NULL, 'add', 71, 72),
(37, 33, NULL, NULL, 'edit', 73, 74),
(38, 33, NULL, NULL, 'delete', 75, 76),
(39, 33, NULL, NULL, 'isAuthorized', 77, 78),
(40, 1, NULL, NULL, 'Depositos', 80, 95),
(41, 40, NULL, NULL, 'index', 81, 82),
(42, 40, NULL, NULL, 'view', 83, 84),
(43, 40, NULL, NULL, 'add', 85, 86),
(44, 40, NULL, NULL, 'edit', 87, 88),
(45, 40, NULL, NULL, 'delete', 89, 90),
(46, 40, NULL, NULL, 'isAuthorized', 91, 92),
(47, 1, NULL, NULL, 'Compras', 96, 111),
(48, 47, NULL, NULL, 'index', 97, 98),
(49, 47, NULL, NULL, 'view', 99, 100),
(50, 47, NULL, NULL, 'add', 101, 102),
(51, 47, NULL, NULL, 'edit', 103, 104),
(52, 47, NULL, NULL, 'delete', 105, 106),
(53, 47, NULL, NULL, 'isAuthorized', 107, 108),
(54, 1, NULL, NULL, 'GuiasDetalle', 112, 117),
(55, 54, NULL, NULL, 'delete', 113, 114),
(56, 54, NULL, NULL, 'isAuthorized', 115, 116),
(57, 1, NULL, NULL, 'FormaPagos', 118, 131),
(58, 57, NULL, NULL, 'index', 119, 120),
(59, 57, NULL, NULL, 'view', 121, 122),
(60, 57, NULL, NULL, 'add', 123, 124),
(61, 57, NULL, NULL, 'edit', 125, 126),
(62, 57, NULL, NULL, 'delete', 127, 128),
(63, 57, NULL, NULL, 'isAuthorized', 129, 130),
(64, 1, NULL, NULL, 'Departamentos', 132, 145),
(65, 64, NULL, NULL, 'index', 133, 134),
(66, 64, NULL, NULL, 'view', 135, 136),
(67, 64, NULL, NULL, 'add', 137, 138),
(68, 64, NULL, NULL, 'edit', 139, 140),
(69, 64, NULL, NULL, 'delete', 141, 142),
(70, 64, NULL, NULL, 'isAuthorized', 143, 144),
(71, 1, NULL, NULL, 'Artmarcas', 146, 159),
(72, 71, NULL, NULL, 'index', 147, 148),
(73, 71, NULL, NULL, 'view', 149, 150),
(74, 71, NULL, NULL, 'add', 151, 152),
(75, 71, NULL, NULL, 'edit', 153, 154),
(76, 71, NULL, NULL, 'delete', 155, 156),
(77, 71, NULL, NULL, 'isAuthorized', 157, 158),
(78, 1, NULL, NULL, 'Socios', 160, 173),
(79, 78, NULL, NULL, 'index', 161, 162),
(80, 78, NULL, NULL, 'view', 163, 164),
(81, 78, NULL, NULL, 'add', 165, 166),
(82, 78, NULL, NULL, 'edit', 167, 168),
(83, 78, NULL, NULL, 'delete', 169, 170),
(84, 78, NULL, NULL, 'isAuthorized', 171, 172),
(85, 1, NULL, NULL, 'OrdenVentasDetalle', 174, 179),
(86, 85, NULL, NULL, 'delete', 175, 176),
(87, 85, NULL, NULL, 'isAuthorized', 177, 178),
(88, 1, NULL, NULL, 'VentasDetalle', 180, 185),
(89, 88, NULL, NULL, 'delete', 181, 182),
(90, 88, NULL, NULL, 'isAuthorized', 183, 184),
(91, 1, NULL, NULL, 'OrdenCompras', 186, 203),
(92, 91, NULL, NULL, 'index', 187, 188),
(93, 91, NULL, NULL, 'view', 189, 190),
(94, 91, NULL, NULL, 'add', 191, 192),
(95, 91, NULL, NULL, 'edit', 193, 194),
(96, 91, NULL, NULL, 'delete', 195, 196),
(97, 91, NULL, NULL, 'info', 197, 198),
(98, 91, NULL, NULL, 'isAuthorized', 199, 200),
(99, 1, NULL, NULL, 'Impuestos', 204, 217),
(100, 99, NULL, NULL, 'index', 205, 206),
(101, 99, NULL, NULL, 'view', 207, 208),
(102, 99, NULL, NULL, 'add', 209, 210),
(103, 99, NULL, NULL, 'edit', 211, 212),
(104, 99, NULL, NULL, 'delete', 213, 214),
(105, 99, NULL, NULL, 'isAuthorized', 215, 216),
(106, 1, NULL, NULL, 'OrdenComprasDetalle', 218, 223),
(107, 106, NULL, NULL, 'delete', 219, 220),
(108, 106, NULL, NULL, 'isAuthorized', 221, 222),
(109, 1, NULL, NULL, 'Ingresos', 224, 237),
(110, 109, NULL, NULL, 'index', 225, 226),
(111, 109, NULL, NULL, 'view', 227, 228),
(112, 109, NULL, NULL, 'add', 229, 230),
(113, 109, NULL, NULL, 'edit', 231, 232),
(114, 109, NULL, NULL, 'delete', 233, 234),
(115, 109, NULL, NULL, 'isAuthorized', 235, 236),
(116, 1, NULL, NULL, 'ArticuloPrecios', 238, 251),
(117, 116, NULL, NULL, 'index', 239, 240),
(118, 116, NULL, NULL, 'view', 241, 242),
(119, 116, NULL, NULL, 'add', 243, 244),
(120, 116, NULL, NULL, 'edit', 245, 246),
(121, 116, NULL, NULL, 'delete', 247, 248),
(122, 116, NULL, NULL, 'isAuthorized', 249, 250),
(123, 1, NULL, NULL, 'Monedas', 252, 265),
(124, 123, NULL, NULL, 'index', 253, 254),
(125, 123, NULL, NULL, 'view', 255, 256),
(126, 123, NULL, NULL, 'add', 257, 258),
(127, 123, NULL, NULL, 'edit', 259, 260),
(128, 123, NULL, NULL, 'delete', 261, 262),
(129, 123, NULL, NULL, 'isAuthorized', 263, 264),
(130, 1, NULL, NULL, 'Pages', 266, 271),
(131, 130, NULL, NULL, 'display', 267, 268),
(132, 130, NULL, NULL, 'isAuthorized', 269, 270),
(133, 1, NULL, NULL, 'Guias', 272, 285),
(134, 133, NULL, NULL, 'index', 273, 274),
(135, 133, NULL, NULL, 'view', 275, 276),
(136, 133, NULL, NULL, 'add', 277, 278),
(137, 133, NULL, NULL, 'edit', 279, 280),
(138, 133, NULL, NULL, 'delete', 281, 282),
(139, 133, NULL, NULL, 'isAuthorized', 283, 284),
(140, 1, NULL, NULL, 'IngresosDetalle', 286, 291),
(141, 140, NULL, NULL, 'delete', 287, 288),
(142, 140, NULL, NULL, 'isAuthorized', 289, 290),
(143, 1, NULL, NULL, 'Docseries', 292, 305),
(144, 143, NULL, NULL, 'index', 293, 294),
(145, 143, NULL, NULL, 'view', 295, 296),
(146, 143, NULL, NULL, 'add', 297, 298),
(147, 143, NULL, NULL, 'edit', 299, 300),
(148, 143, NULL, NULL, 'delete', 301, 302),
(149, 143, NULL, NULL, 'isAuthorized', 303, 304),
(150, 1, NULL, NULL, 'ArticulosInfo', 306, 311),
(151, 150, NULL, NULL, 'index', 307, 308),
(152, 150, NULL, NULL, 'isAuthorized', 309, 310),
(153, 1, NULL, NULL, 'Distritos', 312, 325),
(154, 153, NULL, NULL, 'index', 313, 314),
(155, 153, NULL, NULL, 'view', 315, 316),
(156, 153, NULL, NULL, 'add', 317, 318),
(157, 153, NULL, NULL, 'edit', 319, 320),
(158, 153, NULL, NULL, 'delete', 321, 322),
(159, 153, NULL, NULL, 'isAuthorized', 323, 324),
(160, 1, NULL, NULL, 'OrdenVentas', 326, 343),
(161, 160, NULL, NULL, 'index', 327, 328),
(162, 160, NULL, NULL, 'view', 329, 330),
(163, 160, NULL, NULL, 'add', 331, 332),
(164, 160, NULL, NULL, 'edit', 333, 334),
(165, 160, NULL, NULL, 'delete', 335, 336),
(166, 160, NULL, NULL, 'isAuthorized', 337, 338),
(167, 1, NULL, NULL, 'ListaPrecios', 344, 357),
(168, 167, NULL, NULL, 'index', 345, 346),
(169, 167, NULL, NULL, 'view', 347, 348),
(170, 167, NULL, NULL, 'add', 349, 350),
(171, 167, NULL, NULL, 'edit', 351, 352),
(172, 167, NULL, NULL, 'delete', 353, 354),
(173, 167, NULL, NULL, 'isAuthorized', 355, 356),
(174, 1, NULL, NULL, 'Users', 358, 375),
(175, 174, NULL, NULL, 'index', 359, 360),
(176, 174, NULL, NULL, 'view', 361, 362),
(177, 174, NULL, NULL, 'add', 363, 364),
(178, 174, NULL, NULL, 'edit', 365, 366),
(179, 174, NULL, NULL, 'delete', 367, 368),
(180, 174, NULL, NULL, 'login', 369, 370),
(181, 174, NULL, NULL, 'logout', 371, 372),
(182, 174, NULL, NULL, 'isAuthorized', 373, 374),
(183, 1, NULL, NULL, 'Roles', 376, 389),
(184, 183, NULL, NULL, 'index', 377, 378),
(185, 183, NULL, NULL, 'view', 379, 380),
(186, 183, NULL, NULL, 'add', 381, 382),
(187, 183, NULL, NULL, 'edit', 383, 384),
(188, 183, NULL, NULL, 'delete', 385, 386),
(189, 183, NULL, NULL, 'isAuthorized', 387, 388),
(190, 1, NULL, NULL, 'Documentos', 390, 403),
(191, 190, NULL, NULL, 'index', 391, 392),
(192, 190, NULL, NULL, 'view', 393, 394),
(193, 190, NULL, NULL, 'add', 395, 396),
(194, 190, NULL, NULL, 'edit', 397, 398),
(195, 190, NULL, NULL, 'delete', 399, 400),
(196, 190, NULL, NULL, 'isAuthorized', 401, 402),
(197, 1, NULL, NULL, 'Bancos', 404, 417),
(198, 197, NULL, NULL, 'index', 405, 406),
(199, 197, NULL, NULL, 'view', 407, 408),
(200, 197, NULL, NULL, 'add', 409, 410),
(201, 197, NULL, NULL, 'edit', 411, 412),
(202, 197, NULL, NULL, 'delete', 413, 414),
(203, 197, NULL, NULL, 'isAuthorized', 415, 416),
(204, 1, NULL, NULL, 'Acl', 418, 419),
(205, 1, NULL, NULL, 'Bake', 420, 421),
(206, 1, NULL, NULL, 'DebugKit', 422, 437),
(207, 206, NULL, NULL, 'Panels', 423, 428),
(208, 207, NULL, NULL, 'index', 424, 425),
(209, 207, NULL, NULL, 'view', 426, 427),
(210, 206, NULL, NULL, 'Toolbar', 429, 432),
(211, 210, NULL, NULL, 'clearCache', 430, 431),
(212, 206, NULL, NULL, 'Requests', 433, 436),
(213, 212, NULL, NULL, 'view', 434, 435),
(214, 1, NULL, NULL, 'Migrations', 438, 439),
(215, 1, NULL, NULL, 'Menus', 440, 453),
(216, 215, NULL, NULL, 'index', 441, 442),
(217, 215, NULL, NULL, 'view', 443, 444),
(218, 215, NULL, NULL, 'add', 445, 446),
(219, 215, NULL, NULL, 'edit', 447, 448),
(220, 215, NULL, NULL, 'delete', 449, 450),
(221, 215, NULL, NULL, 'isAuthorized', 451, 452),
(222, 1, NULL, NULL, 'Links', 454, 467),
(223, 222, NULL, NULL, 'index', 455, 456),
(224, 222, NULL, NULL, 'view', 457, 458),
(225, 222, NULL, NULL, 'add', 459, 460),
(226, 222, NULL, NULL, 'edit', 461, 462),
(227, 222, NULL, NULL, 'delete', 463, 464),
(228, 222, NULL, NULL, 'isAuthorized', 465, 466),
(229, 160, NULL, NULL, 'info', 339, 340),
(230, 1, NULL, NULL, 'Cajas', 468, 481),
(231, 230, NULL, NULL, 'index', 469, 470),
(232, 230, NULL, NULL, 'view', 471, 472),
(233, 230, NULL, NULL, 'add', 473, 474),
(234, 230, NULL, NULL, 'edit', 475, 476),
(235, 230, NULL, NULL, 'delete', 477, 478),
(236, 230, NULL, NULL, 'isAuthorized', 479, 480),
(237, 1, NULL, NULL, 'Cargos', 482, 495),
(238, 237, NULL, NULL, 'index', 483, 484),
(239, 237, NULL, NULL, 'view', 485, 486),
(240, 237, NULL, NULL, 'add', 487, 488),
(241, 237, NULL, NULL, 'edit', 489, 490),
(242, 237, NULL, NULL, 'delete', 491, 492),
(243, 237, NULL, NULL, 'isAuthorized', 493, 494),
(244, 1, NULL, NULL, 'LibroCajas', 496, 509),
(245, 244, NULL, NULL, 'index', 497, 498),
(246, 244, NULL, NULL, 'view', 499, 500),
(247, 244, NULL, NULL, 'add', 501, 502),
(248, 244, NULL, NULL, 'edit', 503, 504),
(249, 244, NULL, NULL, 'delete', 505, 506),
(250, 244, NULL, NULL, 'isAuthorized', 507, 508),
(258, 1, NULL, NULL, 'CajasMovimientos', 510, 523),
(259, 258, NULL, NULL, 'index', 511, 512),
(260, 258, NULL, NULL, 'view', 513, 514),
(261, 258, NULL, NULL, 'add', 515, 516),
(262, 258, NULL, NULL, 'edit', 517, 518),
(263, 258, NULL, NULL, 'delete', 519, 520),
(264, 258, NULL, NULL, 'isAuthorized', 521, 522),
(266, 9, NULL, NULL, 'ctacobrar', 29, 30),
(267, 47, NULL, NULL, 'ctapagar', 109, 110),
(268, 1, NULL, NULL, 'Ctacorrientes', 524, 537),
(269, 268, NULL, NULL, 'index', 525, 526),
(270, 268, NULL, NULL, 'view', 527, 528),
(271, 268, NULL, NULL, 'add', 529, 530),
(272, 268, NULL, NULL, 'edit', 531, 532),
(273, 268, NULL, NULL, 'delete', 533, 534),
(274, 268, NULL, NULL, 'isAuthorized', 535, 536),
(275, 160, NULL, NULL, 'pos', 341, 342),
(276, 1, NULL, NULL, 'PosSettings', 538, 551),
(277, 276, NULL, NULL, 'index', 539, 540),
(278, 276, NULL, NULL, 'view', 541, 542),
(279, 276, NULL, NULL, 'add', 543, 544),
(280, 276, NULL, NULL, 'edit', 545, 546),
(281, 276, NULL, NULL, 'delete', 547, 548),
(282, 276, NULL, NULL, 'isAuthorized', 549, 550),
(283, 91, NULL, NULL, 'printer', 201, 202);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `departamento_id` int(11) NOT NULL,
  `provincia_id` int(11) NOT NULL,
  `distrito_id` int(11) NOT NULL,
  `zona` varchar(150) DEFAULT NULL COMMENT 'Urb., AAHH, etc',
  `direccion` varchar(255) DEFAULT NULL,
  `socio_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `socio_id_fk_idx` (`socio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `addresses`
--

INSERT INTO `addresses` (`id`, `departamento_id`, `provincia_id`, `distrito_id`, `zona`, `direccion`, `socio_id`) VALUES
(1, 1, 1, 4, 'BELLAVISTA NANAY', 'AV LA MARINA 685', 5),
(2, 1, 1, 4, '', 'CALLE MISTI 485', 6),
(3, 16, 142, 1, '', '', 8),
(4, 4, 35, 0, 'CERCADO', 'CALLE TOMAS VALLE 265', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lft` (`lft`,`rght`),
  KEY `alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Roles', 3, NULL, 1, 4),
(2, 1, 'Users', 5, NULL, 2, 3),
(3, NULL, 'Roles', 4, NULL, 5, 8),
(4, 3, 'Users', 6, NULL, 6, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `aro_id` (`aro_id`,`aco_id`),
  KEY `aco_id` (`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artfamilias`
--

CREATE TABLE IF NOT EXISTS `artfamilias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `artfamilias`
--

INSERT INTO `artfamilias` (`id`, `nombre`) VALUES
(1, 'LACTEOS'),
(2, 'ABARROTES'),
(3, 'BEBIDAS ENERGIZANTES'),
(4, 'BEBIDAS GASIFICADAS'),
(5, 'SALSAS Y ADEREZOS'),
(6, 'ACEITES'),
(7, 'CONDIMENTOS Y ESPECERIAS'),
(8, 'DESCARTABLES'),
(9, 'DESODORANTES'),
(10, 'CONSERVA DE FRUTAS'),
(11, 'EMBUTIDOS'),
(12, 'CIGARRILLOS'),
(13, 'CAFES'),
(14, 'MENESTRAS'),
(15, 'LICORES'),
(16, 'PERFUMERIA'),
(17, 'ARTICULOS DE LIMPIEZA'),
(18, 'GOLOSINAS'),
(19, 'HELADOS'),
(20, 'CONSERVA DE ALIMENTOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `artfamilia_id` bigint(20) NOT NULL,
  `artmarca_id` bigint(20) DEFAULT NULL,
  `umedida_id` int(11) NOT NULL,
  `codigo` varchar(100) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `imagen_dir` varchar(255) DEFAULT NULL,
  `tipo` int(1) NOT NULL DEFAULT '0' COMMENT '0=Articulo\n1=Servicio\n2=Tipo de Gasto\n3=Patrimocio',
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactivo\n1=Activo',
  `pdv` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `artfamilia_id_fk_art_idx` (`artfamilia_id`),
  KEY `artmarca_id_fk_art_idx` (`artmarca_id`),
  KEY `umedida_id_idx` (`umedida_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `artfamilia_id`, `artmarca_id`, `umedida_id`, `codigo`, `nombre`, `descripcion`, `imagen`, `imagen_dir`, `tipo`, `estado`, `pdv`) VALUES
(1, 1, 1, 1, '1001', 'YOGOURT GLORIA X 1LT', '', 'yogurt gloria x 1lt.png', 'webroot\\files\\Articulos\\imagen\\1', 0, 1, 1),
(2, 3, NULL, 1, '1002', 'GATORADE X 500ML', '', 'GATORADE X 500ML.jpg', 'webroot\\files\\Articulos\\imagen\\2', 0, 1, 1),
(3, 4, NULL, 1, '1003', 'COCA COLA X 500ml', 'COCA COLA X 500ml', 'coca cola 500ml.jpg', 'webroot\\files\\Articulos\\imagen\\3', 0, 1, 1),
(4, 15, NULL, 1, '1004', 'CAJA DE VINO GATO TINTO X 1 LT. X 12 UN', 'VINOS IMPORTADOS', '', NULL, 0, 1, 0),
(5, 15, NULL, 1, '1005', 'VINO CASILLERO DEL DIABLO X 750 CC PINOT NOIR', 'VINOS IMPORTADOS', '', NULL, 0, 1, 0),
(6, 12, NULL, 1, '1006', 'HAMILTON CIGARROS X 10 UN. CLASICO', '', 'hamilton x 10.jpg', 'webroot\\files\\Articulos\\imagen\\6', 0, 1, 1),
(7, 12, NULL, 1, '1007', 'LUCKY STRIKE CIGARROS X 10 UN BLUE', '', 'lucky strike.jpg', 'webroot\\files\\Articulos\\imagen\\7', 0, 1, 1),
(8, 13, NULL, 1, '1008', 'ALTOMAYO CAFE INSTANT FCO X 50 GR. CLASICO', '', '', NULL, 0, 1, 0),
(9, 13, NULL, 1, '1009', 'CAFETAL CAFE MOLIDO BOLSA X 220 GR.', '', '', NULL, 0, 1, 0),
(10, 8, NULL, 1, '1010', 'BOLSAS BLANCAS 5 X 10 ( 100 UN )', '', '', NULL, 0, 1, 0),
(11, 20, NULL, 1, '1011', 'CAMPOMAR SOLIDO DE CABALLA X 170 GR.', '', '', NULL, 0, 1, 0),
(12, 11, NULL, 1, '1012', 'LAIVE TOCINO AHUMADO SALCHI/SUIZA X 200 GR', '', '', NULL, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_info`
--

CREATE TABLE IF NOT EXISTS `articulos_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `articulo_id` bigint(20) NOT NULL,
  `deposito_id` int(11) NOT NULL,
  `lista_precio_id` bigint(20) NOT NULL,
  `articulo_precio_id` bigint(20) DEFAULT NULL,
  `existencia` decimal(10,2) NOT NULL DEFAULT '0.00',
  `reservada` decimal(10,2) NOT NULL DEFAULT '0.00',
  `disponible` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `articulo_id_fk_info_idx` (`articulo_id`),
  KEY `deposito_id_fk_info_idx` (`deposito_id`),
  KEY `lista_precio_id_idx` (`lista_precio_id`),
  KEY `articulo_precio_id_fk_ainfo_idx` (`articulo_precio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `articulos_info`
--

INSERT INTO `articulos_info` (`id`, `articulo_id`, `deposito_id`, `lista_precio_id`, `articulo_precio_id`, `existencia`, `reservada`, `disponible`) VALUES
(1, 1, 1, 1, 2, '0.00', '0.00', '0.00'),
(2, 2, 1, 1, 3, '-2.00', '0.00', '-2.00'),
(3, 1, 1, 2, 4, '0.00', '0.00', '0.00'),
(4, 2, 1, 2, 5, '-2.00', '0.00', '-2.00'),
(5, 1, 2, 1, 6, '0.00', '0.00', '0.00'),
(6, 2, 2, 1, 7, '0.00', '0.00', '0.00'),
(7, 1, 2, 2, 8, '0.00', '0.00', '0.00'),
(8, 2, 2, 2, 9, '0.00', '0.00', '0.00'),
(10, 3, 1, 1, 12, '-3.00', '0.00', '-3.00'),
(11, 3, 1, 2, 13, '-3.00', '0.00', '-3.00'),
(12, 4, 1, 1, 14, '1.00', '0.00', '1.00'),
(13, 4, 1, 2, 15, '1.00', '0.00', '1.00'),
(14, 5, 1, 1, 16, '0.00', '0.00', '0.00'),
(15, 5, 1, 2, 17, '0.00', '0.00', '0.00'),
(16, 6, 1, 1, 18, '0.00', '0.00', '0.00'),
(17, 6, 1, 2, 19, '0.00', '0.00', '0.00'),
(18, 7, 1, 1, 20, '0.00', '0.00', '0.00'),
(19, 7, 1, 2, 21, '0.00', '0.00', '0.00'),
(20, 8, 1, 1, 22, '10.00', '0.00', '10.00'),
(21, 8, 1, 2, 23, '10.00', '0.00', '10.00'),
(22, 9, 1, 1, 24, '15.00', '0.00', '15.00'),
(23, 9, 1, 2, 25, '15.00', '0.00', '15.00'),
(24, 10, 1, 1, 26, '200.00', '0.00', '200.00'),
(25, 10, 1, 2, 27, '200.00', '0.00', '200.00'),
(26, 11, 1, 1, 28, '25.00', '0.00', '25.00'),
(27, 11, 1, 2, 29, '25.00', '0.00', '25.00'),
(28, 12, 1, 1, 30, '0.00', '0.00', '0.00'),
(29, 12, 1, 2, 31, '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_precios`
--

CREATE TABLE IF NOT EXISTS `articulo_precios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `deposito_id` int(11) NOT NULL,
  `lista_precio_id` bigint(20) NOT NULL,
  `articulo_id` bigint(20) NOT NULL,
  `impuesto_id` int(11) NOT NULL,
  `precio_minimo` decimal(10,2) DEFAULT NULL,
  `precio_estandar` decimal(10,2) DEFAULT NULL,
  `precio_maximo` decimal(10,2) DEFAULT NULL,
  `incluir_impuesto` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0=Impuesto no incluido, 1= Impuesto Incluido',
  PRIMARY KEY (`id`),
  KEY `lista_precio_id_fk_ap_idx` (`lista_precio_id`),
  KEY `impuesto_id_fk_ap_idx` (`impuesto_id`),
  KEY `articulo_id_fk_ap_idx` (`articulo_id`),
  KEY `deposito_id_fk_ap_idx` (`deposito_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `articulo_precios`
--

INSERT INTO `articulo_precios` (`id`, `deposito_id`, `lista_precio_id`, `articulo_id`, `impuesto_id`, `precio_minimo`, `precio_estandar`, `precio_maximo`, `incluir_impuesto`) VALUES
(2, 1, 1, 1, 1, '3.80', '4.10', '4.30', 0),
(3, 1, 1, 2, 1, '1.40', '1.50', '1.60', 0),
(4, 1, 2, 1, 1, '4.80', '5.00', '5.20', 0),
(5, 1, 2, 2, 1, '1.90', '2.00', '2.10', 0),
(6, 2, 1, 1, 1, '3.80', '4.10', '4.30', 0),
(7, 2, 1, 2, 1, '1.40', '1.50', '1.60', 0),
(8, 2, 2, 1, 1, '4.80', '5.00', '5.20', 0),
(9, 2, 2, 2, 1, '1.90', '2.00', '2.10', 0),
(12, 1, 1, 3, 1, '1.40', '1.50', '1.60', 0),
(13, 1, 2, 3, 1, '1.90', '2.00', '2.10', 0),
(14, 1, 1, 4, 1, '110.00', '112.00', '115.00', 0),
(15, 1, 2, 4, 1, '130.00', '132.00', '135.00', 0),
(16, 1, 1, 5, 1, '19.00', '20.00', '21.00', 0),
(17, 1, 2, 5, 1, '24.50', '25.00', '26.50', 0),
(18, 1, 1, 6, 1, '3.00', '3.10', '3.20', 0),
(19, 1, 2, 6, 1, '3.50', '3.70', '4.00', 0),
(20, 1, 1, 7, 1, '3.50', '3.70', '3.80', 0),
(21, 1, 2, 7, 1, '4.30', '4.50', '4.80', 0),
(22, 1, 1, 8, 1, '4.00', '4.20', '4.40', 0),
(23, 1, 2, 8, 1, '5.50', '5.80', '6.00', 0),
(24, 1, 1, 9, 1, '5.00', '5.10', '5.20', 0),
(25, 1, 2, 9, 1, '6.10', '6.30', '6.50', 0),
(26, 1, 1, 10, 1, '0.40', '0.50', '0.60', 0),
(27, 1, 2, 10, 1, '0.90', '1.00', '1.20', 0),
(28, 1, 1, 11, 1, '3.20', '3.40', '3.70', 0),
(29, 1, 2, 11, 1, '4.40', '4.50', '4.70', 0),
(30, 1, 1, 12, 1, '7.90', '8.10', '8.30', 0),
(31, 1, 2, 12, 1, '9.65', '9.70', '9.90', 0);

--
-- Disparadores `articulo_precios`
--
DROP TRIGGER IF EXISTS `insert_existencia_articulos_ap`;
DELIMITER //
CREATE TRIGGER `insert_existencia_articulos_ap` AFTER INSERT ON `articulo_precios`
 FOR EACH ROW begin

INSERT INTO articulos_info(deposito_id, articulo_id, lista_precio_id,articulo_precio_id) values(NEW.deposito_id, NEW.articulo_id, NEW.lista_precio_id,NEW.id);

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artmarcas`
--

CREATE TABLE IF NOT EXISTS `artmarcas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `artmarcas`
--

INSERT INTO `artmarcas` (`id`, `nombre`) VALUES
(1, 'GLORIA'),
(2, 'LAIVE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'BCP', 'BANCO DE CREDITO'),
(2, 'BBVA CONTINENTAL', 'BANCO CONTINENTAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE IF NOT EXISTS `cajas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `libro_caja_id` bigint(20) NOT NULL,
  `deposito_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha` date NOT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Activo\n2=Procesado',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `libro_caja_id_fk_caja_idx` (`libro_caja_id`),
  KEY `deposito_id_idx` (`deposito_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id`, `libro_caja_id`, `deposito_id`, `nombre`, `descripcion`, `fecha`, `fecha_cierre`, `estado`, `created`, `updated`, `user_id`) VALUES
(1, 1, 1, 'Caja Menor 15-03-2016 10:46', '', '2016-03-15', NULL, 1, '2016-03-15 10:44:42', '0000-00-00 00:00:00', 0),
(2, 1, 1, 'Caja Menor 16-03-2016 10:42', '', '2016-03-16', NULL, 1, '2016-03-16 10:42:31', '0000-00-00 00:00:00', 0),
(3, 1, 1, 'Caja PDV admin 2016-04-07 15:56', NULL, '2016-04-07', NULL, 1, '2016-04-07 15:56:56', '0000-00-00 00:00:00', 5),
(4, 1, 1, 'Caja PDV admin 2016-04-08 07:59', NULL, '2016-04-08', NULL, 1, '2016-04-08 07:59:23', '0000-00-00 00:00:00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas_movimientos`
--

CREATE TABLE IF NOT EXISTS `cajas_movimientos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `caja_id` bigint(20) DEFAULT NULL,
  `ctacorriente_id` bigint(20) DEFAULT NULL,
  `compra_id` bigint(20) DEFAULT NULL,
  `venta_id` bigint(20) DEFAULT NULL,
  `cargo_id` bigint(20) DEFAULT NULL,
  `moneda_id` int(11) NOT NULL DEFAULT '0',
  `concepto` varchar(255) DEFAULT NULL,
  `tipo_cambio` decimal(10,2) NOT NULL DEFAULT '1.00',
  `entrada` decimal(10,2) NOT NULL DEFAULT '0.00',
  `salida` decimal(10,2) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tipo_movimiento` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Entrada\n1=Salida',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `socio_id` bigint(20) unsigned DEFAULT NULL,
  `compra_text` varchar(100) DEFAULT NULL,
  `venta_text` varchar(100) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `metodo_pago_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '''0''=>''Efectivo'',''1''=>''Tarjeta Crédito/Débito'',''2''=>''Deposito'',''3''=>''Cheque''',
  `ctacorriente_destino_id` bigint(20) unsigned DEFAULT NULL,
  `paga_con` decimal(10,2) DEFAULT NULL,
  `cambio` decimal(10,2) DEFAULT NULL,
  `tipo_tarjeta` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `caja_id_fk_cm_idx` (`caja_id`),
  KEY `cargo_id_fk_cm_idx` (`cargo_id`),
  KEY `compra_id_fk_cm_idx` (`compra_id`),
  KEY `venta_id_fk_cm_idx` (`venta_id`),
  KEY `ctacorriente_id_fk_cm_idx` (`ctacorriente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `cajas_movimientos`
--

INSERT INTO `cajas_movimientos` (`id`, `caja_id`, `ctacorriente_id`, `compra_id`, `venta_id`, `cargo_id`, `moneda_id`, `concepto`, `tipo_cambio`, `entrada`, `salida`, `created`, `modified`, `tipo_movimiento`, `user_id`, `socio_id`, `compra_text`, `venta_text`, `descripcion`, `metodo_pago_id`, `ctacorriente_destino_id`, `paga_con`, `cambio`, `tipo_tarjeta`) VALUES
(1, 2, 1, NULL, 6, NULL, 1, 'Cobro de Factura: 1-5', '1.00', '40.12', NULL, '2016-03-16 17:50:56', '2016-03-16 17:50:56', 0, 5, 5, '', '6_2016-03-16_40.12', '4140-6881-7105-3379', 1, NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, 7, NULL, 1, 'Cobro de Factura: 1-6', '1.00', '8.02', NULL, '2016-03-16 17:53:24', '2016-03-16 17:53:24', 0, 5, 5, '', '7_2016-03-16_8.02', '', 0, NULL, NULL, NULL, NULL),
(3, 2, NULL, 4, NULL, NULL, 1, 'Pago de Factura: 002-03601', '1.00', '0.00', '27.73', '2016-03-16 17:53:37', '2016-03-16 17:53:37', 1, 5, 2, '4_2016-03-16_27.73', '', '', 0, NULL, NULL, NULL, NULL),
(4, 2, 1, 3, NULL, NULL, 1, 'Pago de Factura: 001-014901', '1.00', '0.00', '133.34', '2016-03-16 23:15:30', '2016-03-16 23:15:30', 1, 5, 2, '3_2016-03-16_133.34', '', 'Nro. Operación 3540', 2, 2, NULL, NULL, NULL),
(5, 3, NULL, NULL, 12, NULL, 1, 'Cobro de TICKET BOLETA 1-4', '1.00', '13.69', NULL, '2016-04-07 16:08:23', '2016-04-07 16:08:23', 0, 5, 8, NULL, '12_2016-04-07_13.69', NULL, 0, NULL, '20.00', '6.31', NULL),
(6, 3, 1, NULL, 14, NULL, 1, 'Cobro de TICKET FACTURA 1-1', '1.00', '20.53', NULL, '2016-04-07 18:10:47', '2016-04-07 18:10:47', 0, 5, 1, NULL, '14_2016-04-07_20.53', '', 2, NULL, NULL, NULL, 0);

--
-- Disparadores `cajas_movimientos`
--
DROP TRIGGER IF EXISTS `update_saldo_compra_venta`;
DELIMITER //
CREATE TRIGGER `update_saldo_compra_venta` AFTER INSERT ON `cajas_movimientos`
 FOR EACH ROW begin
DECLARE total decimal(10,2);
DECLARE saldos decimal(10,2);
	if new.compra_id is not null then
		SELECT grantotal INTO total FROM compras WHERE id=NEW.compra_id;
		SELECT saldo INTO saldos FROM compras WHERE id=NEW.compra_id;
        if new.salida < total then
        	update compras set saldo = total - new.salida where id = new.compra_id;
        else
        	update compras set pagado = 1 where id = new.compra_id;
        end if;
        if new.salida = saldos then
        	update compras set saldo = 0, pagado = 1 where id = new.compra_id;
        end if;
    end if;
    
    if new.venta_id is not null then
		SELECT grantotal INTO total FROM ventas WHERE id=NEW.venta_id;
		SELECT saldo INTO saldos FROM ventas WHERE id=NEW.venta_id;
        if new.entrada < total then
        	update ventas set saldo = total - new.entrada where id = new.venta_id;
        else
        	update ventas set cobrado = 1 where id = new.venta_id;
        end if;
        if new.entrada = saldos then
        	update ventas set saldo = 0, cobrado = 1 where id = new.venta_id;
        end if;
    end if;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE IF NOT EXISTS `cargos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `socio_id` bigint(20) DEFAULT NULL,
  `impuesto_id` int(11) DEFAULT NULL,
  `incluir_impuesto` tinyint(4) DEFAULT '0' COMMENT '0=No incluye impuesto\n1=Incluye Impuesto',
  `nombre` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `tipo_cargo` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Cargo Fijo\n1=Cargo Variable',
  PRIMARY KEY (`id`),
  KEY `socio_id_fk_cargo_idx` (`socio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `socio_id`, `impuesto_id`, `incluir_impuesto`, `nombre`, `total`, `estado`, `created`, `modified`, `tipo_cargo`) VALUES
(1, NULL, NULL, 0, 'APERTURA DE CAJA', '0.00', 1, '2016-03-15 21:16:46', '2016-03-15 21:16:46', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `socio_id` bigint(20) NOT NULL,
  `orden_compra_id` bigint(20) DEFAULT NULL,
  `ingreso_id` bigint(20) DEFAULT NULL,
  `serie` varchar(10) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `estado` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Grabado\n1=Procesado',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `impuesto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `grantotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pagado` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `saldo` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `socio_id_fk_com_idx` (`socio_id`),
  KEY `orden_compra_id_fk_com_idx` (`orden_compra_id`),
  KEY `ingreso_id_fk_com_idx` (`ingreso_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `socio_id`, `orden_compra_id`, `ingreso_id`, `serie`, `numero`, `fecha`, `estado`, `total`, `impuesto`, `grantotal`, `pagado`, `created`, `modified`, `saldo`) VALUES
(3, 2, 15, NULL, '001', '014901', '2016-03-16', 1, '113.00', '20.34', '133.34', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 2, 16, NULL, '002', '03601', '2016-03-16', 1, '23.50', '4.23', '27.73', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 2, 17, NULL, '002', '001546', '2016-03-16', 1, '252.70', '45.49', '298.19', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 2, 18, NULL, '002', '1545', '2016-04-07', 1, '75.50', '13.59', '89.09', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

--
-- Disparadores `compras`
--
DROP TRIGGER IF EXISTS `update_orden_compra_after_infert`;
DELIMITER //
CREATE TRIGGER `update_orden_compra_after_infert` AFTER INSERT ON `compras`
 FOR EACH ROW begin
 if new.orden_compra_id then
 	update orden_compras set estado=2, compra_id=new.id where id=new.orden_compra_id;
 end if;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_detalle`
--

CREATE TABLE IF NOT EXISTS `compras_detalle` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `compra_id` bigint(20) NOT NULL,
  `articulo_id` bigint(20) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `incluir_impuesto` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `tasa_impuesto` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compra_id_fk_comdet_idx` (`compra_id`),
  KEY `articulo_id_fk_comdet_idx` (`articulo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `compras_detalle`
--

INSERT INTO `compras_detalle` (`id`, `compra_id`, `articulo_id`, `cantidad`, `precio`, `incluir_impuesto`, `tasa_impuesto`) VALUES
(8, 3, 8, '15.00', '4.20', 0, '18.00'),
(9, 3, 10, '100.00', '0.50', 0, '18.00'),
(10, 4, 8, '5.00', '4.20', 0, '18.00'),
(11, 4, 10, '5.00', '0.50', 0, '18.00'),
(12, 5, 8, '1.00', '4.20', 0, '18.00'),
(13, 5, 10, '1.00', '0.50', 0, '18.00'),
(14, 5, 9, '10.00', '5.10', 0, '18.00'),
(15, 5, 4, '1.00', '112.00', 0, '18.00'),
(16, 5, 11, '25.00', '3.40', 0, '18.00'),
(17, 6, 10, '100.00', '0.50', 0, '18.00'),
(18, 6, 9, '5.00', '5.10', 0, '18.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctacorrientes`
--

CREATE TABLE IF NOT EXISTS `ctacorrientes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `banco_id` int(11) NOT NULL,
  `deposito_id` int(11) DEFAULT NULL,
  `socio_id` bigint(20) DEFAULT NULL,
  `moneda_id` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `nro_cuenta` varchar(100) DEFAULT NULL,
  `tipo` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Ahorros\n1=Cuenta Corriente',
  `estado` tinyint(4) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `banco_id_fk_ctaco_idx` (`banco_id`),
  KEY `socio_id_fk_ctaco_idx` (`socio_id`),
  KEY `moneda_id_fk_ctaco_idx` (`moneda_id`),
  KEY `deposito_id_fk_ctaco_idx` (`deposito_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ctacorrientes`
--

INSERT INTO `ctacorrientes` (`id`, `banco_id`, `deposito_id`, `socio_id`, `moneda_id`, `descripcion`, `nro_cuenta`, `tipo`, `estado`, `created`, `modified`) VALUES
(1, 2, 1, NULL, 1, 'CTA DE AHORRO SOLES', '0179-0200375615', 0, 1, '2016-03-16 12:39:39', '2016-03-16 12:39:39'),
(2, 1, NULL, 2, 1, 'CTA CORRIENTE SOLES', '0057-0200771282', 1, 1, '2016-03-16 12:42:51', '2016-03-16 12:42:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'AMAZONAS'),
(2, 'ANCASH'),
(3, 'APURIMAC'),
(4, 'AREQUIPA'),
(5, 'AYACUCHO'),
(6, 'CAJAMARCA'),
(7, 'CUSCO'),
(8, 'HUANCAVELICA'),
(9, 'HUANUCO'),
(10, 'ICA'),
(11, 'JUNIN'),
(12, 'LA LIBERTAD'),
(13, 'LAMBAYEQUE'),
(14, 'LIMA'),
(15, 'CALLAO'),
(16, 'LORETO'),
(17, 'MADRE DE DIOS'),
(18, 'MOQUEGUA'),
(19, 'PASCO'),
(20, 'PIURA'),
(21, 'PUNO'),
(22, 'SAN MARTIN'),
(23, 'TACNA'),
(24, 'TUMBES'),
(25, 'UCAYALI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositos`
--

CREATE TABLE IF NOT EXISTS `depositos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `depositos`
--

INSERT INTO `depositos` (`id`, `nombre`, `direccion`, `telefono`, `email`) VALUES
(1, 'OFICINA PRINCIPAL', 'CALLE SAN JOSE 223', '253745', ''),
(2, 'OFICINA PUNCHANA', 'CALLE MISTI 485', '253313', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE IF NOT EXISTS `distritos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `provincia_id` int(11) NOT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `provincia_id_fk_idx` (`provincia_id`),
  KEY `departamento_id_fk_dist_idx` (`departamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id`, `nombre`, `provincia_id`, `departamento_id`) VALUES
(1, 'IQUITOS', 142, 16),
(2, 'PUNCHANA', 142, 16),
(3, 'SAN JUAN BAUTISTA', 142, 16),
(4, 'BELEN', 142, 16),
(5, 'AREQUIPA', 35, 4),
(6, 'CAYMA', 35, 4);

--
-- Disparadores `distritos`
--
DROP TRIGGER IF EXISTS `distritos_BEFORE_INSERT`;
DELIMITER //
CREATE TRIGGER `distritos_BEFORE_INSERT` BEFORE INSERT ON `distritos`
 FOR EACH ROW BEGIN
 
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docseries`
--

CREATE TABLE IF NOT EXISTS `docseries` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `documento_id` int(11) NOT NULL,
  `deposito_id` int(11) NOT NULL,
  `serie` int(3) unsigned zerofill NOT NULL,
  `numero` int(7) unsigned zerofill NOT NULL,
  `tipo` int(2) DEFAULT '0' COMMENT '0=Venta\n1=Caja\n2=Almacen\n3=Manufactura',
  PRIMARY KEY (`id`),
  KEY `deposito_id_fk_docs_idx` (`deposito_id`),
  KEY `documento_id_fk_docs_idx` (`documento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `docseries`
--

INSERT INTO `docseries` (`id`, `documento_id`, `deposito_id`, `serie`, `numero`, `tipo`) VALUES
(1, 1, 1, 001, 0000004, 0),
(2, 2, 1, 001, 0000008, 0),
(3, 3, 1, 001, 0000013, 2),
(4, 1, 2, 002, 0001001, 0),
(5, 2, 2, 002, 0010001, 0),
(6, 4, 1, 001, 0000014, 2),
(7, 5, 1, 001, 0000005, 0),
(8, 6, 1, 001, 0000002, 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `docseriev`
--
CREATE TABLE IF NOT EXISTS `docseriev` (
`deposito_id` int(11)
,`id` bigint(20)
,`documento_id` int(11)
,`nombre` varchar(150)
,`serie` int(3) unsigned zerofill
,`numero` int(7) unsigned zerofill
,`tipo` int(2)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE IF NOT EXISTS `documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `abreviatura` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `nombre`, `abreviatura`) VALUES
(1, 'BOLETA DE VENTA', 'BV'),
(2, 'FACTURA DE VENTA', 'FV'),
(3, 'GUIA DE REMISION', 'GR'),
(4, 'GUIA INTERNA', 'GI'),
(5, 'TICKET BOLETA', 'TB'),
(6, 'TICKET FACTURA', 'TF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pagos`
--

CREATE TABLE IF NOT EXISTS `forma_pagos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0' COMMENT 'cantidad de dias',
  `sistema` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `forma_pagos`
--

INSERT INTO `forma_pagos` (`id`, `nombre`, `cantidad`, `sistema`) VALUES
(1, 'EFECTIVO', 0, 0),
(2, 'TARJETA DE CREDITO/DEBITO', 0, 0),
(3, 'CHEQUE/DEPOSITO', 0, 0),
(5, 'CRÉDITO 30 DIAS', 30, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guias`
--

CREATE TABLE IF NOT EXISTS `guias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `deposito_id` int(11) NOT NULL,
  `orden_venta_id` bigint(20) DEFAULT NULL,
  `socio_id` bigint(20) NOT NULL,
  `documento_id` int(11) NOT NULL DEFAULT '0',
  `direccion` varchar(255) NOT NULL DEFAULT '',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `serie` int(3) unsigned zerofill NOT NULL,
  `numero` int(7) unsigned zerofill NOT NULL,
  `docserie_id` bigint(20) NOT NULL,
  `codigo_unico` varchar(100) DEFAULT NULL COMMENT 'serie.numero.docserie_id.deposito_id',
  `estado` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0=Grabado 1=Procesado',
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_unico_UNIQUE` (`codigo_unico`),
  KEY `socio_id_fk_gr_idx` (`socio_id`),
  KEY `orden_venta_id_fk_gr_idx` (`orden_venta_id`),
  KEY `documento_id_fk_gr_idx` (`documento_id`),
  KEY `deposito_id_fk_gr_idx` (`deposito_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `guias`
--

INSERT INTO `guias` (`id`, `deposito_id`, `orden_venta_id`, `socio_id`, `documento_id`, `direccion`, `fecha`, `serie`, `numero`, `docserie_id`, `codigo_unico`, `estado`) VALUES
(3, 1, 3, 5, 3, 'AV. 28 DE JULIO 572', '2016-03-16', 001, 0000010, 3, '1.10.3.1', 1),
(4, 1, 5, 5, 3, 'CALLE 11 DE MAYO LAS MALVINAS PUNCHA', '2016-03-16', 001, 0000011, 3, '1.11.3.1', 1),
(16, 1, 28, 8, 4, ' ', '2016-04-07', 001, 0000012, 6, '1.12.6.1', 1),
(17, 1, 29, 1, 3, ' ', '2016-04-07', 001, 0000012, 3, '1.12.3.1', 1),
(18, 1, 30, 1, 4, ' ', '2016-04-07', 001, 0000013, 6, '1.13.6.1', 1);

--
-- Disparadores `guias`
--
DROP TRIGGER IF EXISTS `update_docserie_numero_guia`;
DELIMITER //
CREATE TRIGGER `update_docserie_numero_guia` BEFORE INSERT ON `guias`
 FOR EACH ROW begin
	update docseries set numero=new.numero+1 where id=new.docserie_id;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `update_orden_venta_after_infert`;
DELIMITER //
CREATE TRIGGER `update_orden_venta_after_infert` AFTER INSERT ON `guias`
 FOR EACH ROW begin
	if new.orden_venta_id then
		update orden_ventas set status_guia=1, guia_id=new.id where id = new.orden_venta_id;
	end if;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guias_detalle`
--

CREATE TABLE IF NOT EXISTS `guias_detalle` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `guia_id` bigint(20) NOT NULL,
  `articulo_id` bigint(20) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL DEFAULT '0.00',
  `descripcion` varchar(255) DEFAULT NULL,
  `deposito_id` int(10) unsigned NOT NULL DEFAULT '0',
  `estado` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0=Grabado 1=Procesado',
  PRIMARY KEY (`id`),
  KEY `guia_id_fk_gd_idx` (`guia_id`),
  KEY `articulo_id_fk_gd_idx` (`articulo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `guias_detalle`
--

INSERT INTO `guias_detalle` (`id`, `guia_id`, `articulo_id`, `cantidad`, `descripcion`, `deposito_id`, `estado`) VALUES
(8, 3, 8, '5.00', NULL, 1, 1),
(9, 3, 10, '5.00', NULL, 1, 1),
(10, 4, 8, '1.00', NULL, 1, 1),
(11, 4, 10, '1.00', NULL, 1, 1),
(21, 16, 8, '2.00', NULL, 1, 1),
(22, 17, 3, '3.00', NULL, 1, 1),
(23, 17, 2, '2.00', NULL, 1, 1),
(24, 18, 8, '3.00', NULL, 1, 1);

--
-- Disparadores `guias_detalle`
--
DROP TRIGGER IF EXISTS `update_existencia_articulos_after_insert_gd`;
DELIMITER //
CREATE TRIGGER `update_existencia_articulos_after_insert_gd` AFTER INSERT ON `guias_detalle`
 FOR EACH ROW begin

IF new.estado = 1 THEN
	 update articulos_info set existencia=(existencia-new.cantidad), disponible=(disponible-new.cantidad) where deposito_id=new.deposito_id and articulo_id=new.articulo_id;
END IF;

END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `update_existencia_articulos_after_update_gd`;
DELIMITER //
CREATE TRIGGER `update_existencia_articulos_after_update_gd` AFTER UPDATE ON `guias_detalle`
 FOR EACH ROW begin

IF new.estado = 1 THEN
	 update articulos_info set existencia=(existencia-new.cantidad), disponible=(disponible-new.cantidad) where deposito_id=new.deposito_id and articulo_id=new.articulo_id;
END IF;

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  KEY `I18N_FIELD` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuestos`
--

CREATE TABLE IF NOT EXISTS `impuestos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `tasa` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `impuestos`
--

INSERT INTO `impuestos` (`id`, `nombre`, `descripcion`, `tasa`) VALUES
(1, 'IGV', 'IMPUESTO GENERAL DE VENTAS', '18.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE IF NOT EXISTS `ingresos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `deposito_id` int(11) NOT NULL,
  `socio_id` bigint(20) NOT NULL,
  `orden_compra_id` bigint(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0=Grabado 1=Procesado',
  PRIMARY KEY (`id`),
  KEY `socio_id_fk_ing_idx` (`socio_id`),
  KEY `orden_compra_id_fk_ing_idx` (`orden_compra_id`),
  KEY `deposito_id_fk_ing_idx` (`deposito_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id`, `deposito_id`, `socio_id`, `orden_compra_id`, `fecha`, `estado`) VALUES
(4, 1, 2, 15, '2016-03-16', 1),
(5, 1, 2, 16, '2016-03-16', 1),
(6, 1, 2, 17, '2016-03-16', 1),
(7, 1, 2, 18, '2016-04-07', 1);

--
-- Disparadores `ingresos`
--
DROP TRIGGER IF EXISTS `update_ingreso_detalle_after_infert`;
DELIMITER //
CREATE TRIGGER `update_ingreso_detalle_after_infert` AFTER INSERT ON `ingresos`
 FOR EACH ROW begin

IF new.estado=1 THEN
 update ingresos_detalle set deposito_id=new.deposito_id, estado=1 where ingreso_id=new.id;
END IF;
if new.orden_compra_id then
	update orden_compras set status=1, ingreso_id=new.id where id=new.orden_compra_id;
end if;

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_detalle`
--

CREATE TABLE IF NOT EXISTS `ingresos_detalle` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ingreso_id` bigint(20) NOT NULL,
  `articulo_id` bigint(20) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL DEFAULT '0.00',
  `deposito_id` int(10) unsigned NOT NULL DEFAULT '0',
  `estado` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0=Grabado 1=Procesado',
  PRIMARY KEY (`id`),
  KEY `ingreso_id_fk_idet_idx` (`ingreso_id`),
  KEY `articulo_id_fk_idet_idx` (`articulo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `ingresos_detalle`
--

INSERT INTO `ingresos_detalle` (`id`, `ingreso_id`, `articulo_id`, `cantidad`, `deposito_id`, `estado`) VALUES
(14, 4, 8, '15.00', 1, 1),
(15, 4, 10, '100.00', 1, 1),
(16, 5, 8, '5.00', 1, 1),
(17, 5, 10, '5.00', 1, 1),
(18, 6, 8, '1.00', 1, 1),
(19, 6, 10, '1.00', 1, 1),
(20, 6, 9, '10.00', 1, 1),
(21, 6, 4, '1.00', 1, 1),
(22, 6, 11, '25.00', 1, 1),
(23, 7, 10, '100.00', 1, 1),
(24, 7, 9, '5.00', 1, 1);

--
-- Disparadores `ingresos_detalle`
--
DROP TRIGGER IF EXISTS `update_existencia_articulos_after_insert`;
DELIMITER //
CREATE TRIGGER `update_existencia_articulos_after_insert` AFTER INSERT ON `ingresos_detalle`
 FOR EACH ROW begin

IF new.estado = 1 THEN
	 update articulos_info set existencia=(existencia+new.cantidad), disponible=(disponible+new.cantidad) where deposito_id=new.deposito_id and articulo_id=new.articulo_id;
END IF;

END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `update_existencia_articulos_after_update`;
DELIMITER //
CREATE TRIGGER `update_existencia_articulos_after_update` AFTER UPDATE ON `ingresos_detalle`
 FOR EACH ROW begin 
 IF new.estado = 1 THEN 
	 update articulos_info set existencia=(existencia+new.cantidad), disponible=(disponible+new.cantidad) where deposito_id=new.deposito_id and articulo_id=new.articulo_id;
 END IF; 
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_cajas`
--

CREATE TABLE IF NOT EXISTS `libro_cajas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `moneda_id` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Activo\n2=Procesado',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `libro_cajas`
--

INSERT INTO `libro_cajas` (`id`, `nombre`, `descripcion`, `moneda_id`, `estado`, `created`, `modified`) VALUES
(1, 'LIBRO DE CAJA 2016 S/.', 'LIBRO DE CAJA MAYOR 2016 S/.', 1, 1, '2016-03-15 10:40:11', '2016-03-15 10:40:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` longtext CHARACTER SET utf8,
  `link` varchar(255) CHARACTER SET utf8 NOT NULL,
  `target` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `rel` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `visibility_roles` longtext CHARACTER SET utf8,
  `params` longtext CHARACTER SET utf8,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `menu_id_fk_idx` (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `links`
--

INSERT INTO `links` (`id`, `parent_id`, `menu_id`, `title`, `class`, `description`, `link`, `target`, `rel`, `status`, `lft`, `rght`, `visibility_roles`, `params`, `created`, `modified`) VALUES
(1, 0, 1, 'Inicio', 'home', '', 'controller:pages/action:display', '', '', 1, 1, 2, NULL, '', '2016-03-08 04:42:39', '2016-03-08 04:42:39'),
(2, 0, 1, 'Socios', 'socio', '', 'controller:socios/action:index', '', '', 1, 3, 4, NULL, '', '2016-03-08 04:49:59', '2016-03-08 04:55:15'),
(13, 0, 1, 'Compras', 'compras', '', '#', '', '', 1, 5, 8, '["3"]', '', '2016-03-08 14:10:40', '2016-03-08 14:10:40'),
(14, 13, 1, 'Orden Compras', 'orden-compras', '', 'controller:orden-compras/action:index', '', '', 1, 6, 7, '["3"]', '', '2016-03-08 14:12:48', '2016-03-08 14:12:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_precios`
--

CREATE TABLE IF NOT EXISTS `lista_precios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `socio_id` bigint(20) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `moneda_id` int(11) NOT NULL,
  `tipo_lista` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Compra\n1=Venta',
  `incluir_impuesto` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=No Incluir\n1=Si Incluir',
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactivo\n1=Activo',
  PRIMARY KEY (`id`),
  KEY `moneda_id_fk_lp_idx` (`moneda_id`),
  KEY `socios_id_fk_lp_idx` (`socio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `lista_precios`
--

INSERT INTO `lista_precios` (`id`, `socio_id`, `nombre`, `moneda_id`, `tipo_lista`, `incluir_impuesto`, `estado`) VALUES
(1, NULL, 'PRECIOS DE COMPRA S/.', 1, 0, 0, 1),
(2, NULL, 'PRECIO DE VENTA S/.', 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` longtext CHARACTER SET utf8,
  `status` tinyint(4) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `link_count` int(11) DEFAULT NULL,
  `params` longtext CHARACTER SET utf8,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `title`, `alias`, `class`, `description`, `status`, `weight`, `link_count`, `params`, `created`, `modified`) VALUES
(1, 'Menu Principal', 'main', NULL, '', 1, NULL, 4, '', '0000-00-00 00:00:00', '2016-03-08 04:18:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedas`
--

CREATE TABLE IF NOT EXISTS `monedas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `simbolo` varchar(10) NOT NULL,
  `iso` varchar(10) DEFAULT NULL COMMENT 'NUEVO SOL',
  `sistema` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `monedas`
--

INSERT INTO `monedas` (`id`, `nombre`, `simbolo`, `iso`, `sistema`) VALUES
(1, 'NUEVO SOL', 'S/.', 'PEN', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compras`
--

CREATE TABLE IF NOT EXISTS `orden_compras` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `socio_id` bigint(20) NOT NULL DEFAULT '0',
  `compra_id` bigint(20) DEFAULT NULL,
  `ingreso_id` bigint(20) DEFAULT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `estado` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Guardado\n1=Procesado\n2=Facturado, 3=anulado',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `impuesto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `grantotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `socio_id_fk_oc_idx` (`socio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `orden_compras`
--

INSERT INTO `orden_compras` (`id`, `socio_id`, `compra_id`, `ingreso_id`, `fecha`, `estado`, `total`, `impuesto`, `grantotal`, `status`, `user_id`, `created`, `modified`) VALUES
(15, 2, 3, 4, '2016-03-16', 2, '113.00', '20.34', '133.34', 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 2, 4, 5, '2016-03-16', 2, '23.50', '4.23', '27.73', 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 2, 5, 6, '2016-03-16', 2, '252.70', '45.49', '298.19', 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 2, 6, 7, '2016-04-07', 2, '75.50', '13.59', '89.09', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compras_detalle`
--

CREATE TABLE IF NOT EXISTS `orden_compras_detalle` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `orden_compra_id` bigint(20) NOT NULL,
  `articulo_id` bigint(20) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL DEFAULT '0.00',
  `precio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `incluir_impuesto` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `tasa_impuesto` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `orden_compra_id_fk_ocd_idx` (`orden_compra_id`),
  KEY `articulo_id_fk_ocd_idx` (`articulo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `orden_compras_detalle`
--

INSERT INTO `orden_compras_detalle` (`id`, `orden_compra_id`, `articulo_id`, `cantidad`, `precio`, `incluir_impuesto`, `tasa_impuesto`) VALUES
(35, 15, 8, '15.00', '4.20', 0, '18.00'),
(36, 15, 10, '100.00', '0.50', 0, '18.00'),
(37, 16, 8, '5.00', '4.20', 0, '18.00'),
(38, 16, 10, '5.00', '0.50', 0, '18.00'),
(39, 17, 8, '1.00', '4.20', 0, '18.00'),
(40, 17, 10, '1.00', '0.50', 0, '18.00'),
(41, 17, 9, '10.00', '5.10', 0, '18.00'),
(42, 17, 4, '1.00', '112.00', 0, '18.00'),
(43, 17, 11, '25.00', '3.40', 0, '18.00'),
(44, 18, 9, '5.00', '5.10', 0, '18.00'),
(45, 18, 10, '100.00', '0.50', 0, '18.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_ventas`
--

CREATE TABLE IF NOT EXISTS `orden_ventas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `deposito_id` int(11) NOT NULL,
  `socio_id` bigint(20) NOT NULL,
  `forma_pago_id` bigint(20) NOT NULL,
  `fecha` date NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Proforma\n, 1=Orden Estandar\n, 2=Orden Venta, 3=Anulado',
  `guia_id` bigint(20) unsigned DEFAULT NULL,
  `venta_id` bigint(20) unsigned DEFAULT NULL,
  `status_venta` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status_guia` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `impuesto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `grantotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `socio_id_fk_ov_idx` (`socio_id`),
  KEY `deposito_id_fk_ov_idx` (`deposito_id`),
  KEY `user_id_fk_ov_idx` (`user_id`),
  KEY `forma_pago_id_fk_ov_idx` (`forma_pago_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `orden_ventas`
--

INSERT INTO `orden_ventas` (`id`, `user_id`, `deposito_id`, `socio_id`, `forma_pago_id`, `fecha`, `estado`, `guia_id`, `venta_id`, `status_venta`, `status_guia`, `total`, `impuesto`, `grantotal`) VALUES
(3, 5, 1, 5, 1, '2016-03-16', 1, 3, 6, 1, 1, '34.00', '6.12', '40.12'),
(5, 5, 1, 5, 1, '2016-03-16', 1, 4, 7, 1, 1, '6.80', '1.22', '8.02'),
(28, 5, 1, 8, 1, '2016-04-07', 2, 16, 12, 1, 1, '11.60', '2.09', '13.69'),
(29, 5, 1, 1, 1, '2016-04-07', 1, 17, 13, 1, 1, '10.00', '1.80', '11.80'),
(30, 5, 1, 1, 2, '2016-04-07', 2, 18, 14, 1, 1, '17.40', '3.13', '20.53');

--
-- Disparadores `orden_ventas`
--
DROP TRIGGER IF EXISTS `update_existencia_articulos_ov`;
DELIMITER //
CREATE TRIGGER `update_existencia_articulos_ov` AFTER UPDATE ON `orden_ventas`
 FOR EACH ROW begin
 if new.status_guia=1 and new.estado=1 then
  update orden_ventas_detalle set estado = 4 where orden_venta_id=new.id;
 end if;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_ventas_detalle`
--

CREATE TABLE IF NOT EXISTS `orden_ventas_detalle` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `orden_venta_id` bigint(20) NOT NULL,
  `articulo_id` bigint(20) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `estado` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deposito_id` int(10) unsigned NOT NULL DEFAULT '0',
  `incluir_impuesto` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `tasa_impuesto` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `orden_venta_id_fk_ovd_idx` (`orden_venta_id`),
  KEY `articulo_id_fk_ovd_idx` (`articulo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `orden_ventas_detalle`
--

INSERT INTO `orden_ventas_detalle` (`id`, `orden_venta_id`, `articulo_id`, `cantidad`, `precio`, `estado`, `deposito_id`, `incluir_impuesto`, `tasa_impuesto`) VALUES
(11, 3, 8, '5.00', '5.80', 4, 1, 0, '18.00'),
(12, 3, 10, '5.00', '1.00', 4, 1, 0, '18.00'),
(13, 5, 8, '1.00', '5.80', 4, 1, 0, '18.00'),
(14, 5, 10, '1.00', '1.00', 4, 1, 0, '18.00'),
(46, 28, 8, '2.00', '5.80', 2, 1, 0, '18.00'),
(47, 29, 3, '3.00', '2.00', 4, 1, 0, '18.00'),
(48, 29, 2, '2.00', '2.00', 4, 1, 0, '18.00'),
(49, 30, 8, '3.00', '5.80', 2, 1, 0, '18.00');

--
-- Disparadores `orden_ventas_detalle`
--
DROP TRIGGER IF EXISTS `actualiza_existencia_articulos_after_insert_orden_estandar`;
DELIMITER //
CREATE TRIGGER `actualiza_existencia_articulos_after_insert_orden_estandar` AFTER INSERT ON `orden_ventas_detalle`
 FOR EACH ROW begin
if new.estado=1 then
		update articulos_info set reservada=(reservada+new.cantidad), disponible=(disponible-new.cantidad) where deposito_id=new.deposito_id and articulo_id=new.articulo_id;
    end if;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `actualiza_existencia_articulos_after_update_orden_estandar`;
DELIMITER //
CREATE TRIGGER `actualiza_existencia_articulos_after_update_orden_estandar` AFTER UPDATE ON `orden_ventas_detalle`
 FOR EACH ROW begin
	if new.estado=1 then
		update articulos_info set reservada=(reservada+new.cantidad), disponible=(disponible-new.cantidad) where deposito_id=new.deposito_id and articulo_id=new.articulo_id;
    end if;
	if new.estado=4 then
		update articulos_info set reservada=(reservada-new.cantidad), disponible=(disponible+new.cantidad) where deposito_id=new.deposito_id and articulo_id=new.articulo_id;
    end if;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pos_settings`
--

CREATE TABLE IF NOT EXISTS `pos_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deposito_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `docserie_id` bigint(20) NOT NULL COMMENT 'serie de documento para la guia de remision',
  `documento_venta` varchar(100) NOT NULL,
  `caja_id` bigint(20) DEFAULT NULL,
  `socio_id` bigint(20) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_fk_ps_idx` (`user_id`),
  KEY `deposito_id_fk_ps_idx` (`deposito_id`),
  KEY `docserie_id_fk_ps_idx` (`docserie_id`),
  KEY `socio_id_fk_ps_idx` (`socio_id`),
  KEY `caja_id_fk_ps_idx` (`caja_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pos_settings`
--

INSERT INTO `pos_settings` (`id`, `deposito_id`, `user_id`, `docserie_id`, `documento_venta`, `caja_id`, `socio_id`, `estado`, `created`, `modified`) VALUES
(3, 1, 5, 6, '["7","8"]', NULL, 8, 1, '2016-03-19 12:17:22', '2016-03-19 12:19:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `departamento_id_fk_idx` (`departamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=196 ;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `nombre`, `departamento_id`) VALUES
(1, 'CHACHAPOYAS', 1),
(2, 'BAGUA', 1),
(3, 'BONGARA', 1),
(4, 'CONDORCANQUI', 1),
(5, 'LUYA', 1),
(6, 'RODRIGUEZ DE MENDOZA', 1),
(7, 'UTCUBAMBA', 1),
(8, 'AIJA', 2),
(9, 'ANTONIO RAIMONDI', 2),
(10, 'ASUNCIÓN', 2),
(11, 'BOLOGNESI', 2),
(12, 'CARHUAZ', 2),
(13, 'CARLOS FERMÍN FITZCARRALD', 2),
(14, 'CASMA', 2),
(15, 'CORONGO', 2),
(16, 'HUARAZ', 2),
(17, 'HUARI', 2),
(18, 'HUARMEY', 2),
(19, 'HUAYLAS', 2),
(20, 'MARISCAL LUZURIAGA', 2),
(21, 'OCROS', 2),
(22, 'PALLASCA', 2),
(23, 'POMABAMBA', 2),
(24, 'RECUAY', 2),
(25, 'SANTA', 2),
(26, 'SIHUAS', 2),
(27, 'YUNGAY', 2),
(28, 'ABANCAY', 3),
(29, 'ANDAHUAYLAS', 3),
(30, 'ANTABAMBA', 3),
(31, 'AYMARAES', 3),
(32, 'CHINCHEROS', 3),
(33, 'COTABAMBAS', 3),
(34, 'GRAU', 3),
(35, 'AREQUIPA', 4),
(36, 'CAMANA', 4),
(37, 'CARAVELI', 4),
(38, 'CASTILLA', 4),
(39, 'CAYLLOMA', 4),
(40, 'CONDESUYOS', 4),
(41, 'ISLAY', 4),
(42, 'LA UNION', 4),
(43, 'CANGALLO', 5),
(44, 'HUAMANGA', 5),
(45, 'HUANCA', 5),
(46, 'HUANTA', 5),
(47, 'LA MAR', 5),
(48, 'LUCANAS', 5),
(49, 'PARINACOCHAS', 5),
(50, 'PÁUCAR', 5),
(51, 'SUCRE', 5),
(52, 'VÍCTOR FAJARDO', 5),
(53, 'VILCAS HUAMAN', 5),
(54, 'CAJABAMBA', 6),
(55, 'CAJAMARCA', 6),
(56, 'CELENDIN', 6),
(57, 'CHOTA', 6),
(58, 'CONTUMAZA', 6),
(59, 'CUTERVO', 6),
(60, 'HUALGAYOC', 6),
(61, 'JAEN', 6),
(62, 'SAN IGNACIO', 6),
(63, 'SAN MARCOS', 6),
(64, 'SAN MIGUEL', 6),
(65, 'SAN PABLO', 6),
(66, 'SANTA CRUZ', 6),
(67, 'ACOMAYO', 7),
(68, 'ANTA', 7),
(69, 'CALCA', 7),
(70, 'CANAS', 7),
(71, 'CANCHIS', 7),
(72, 'CHUMBIVILCAS', 7),
(73, 'CUSCO', 7),
(74, 'ESPINAR', 7),
(75, 'LA CONVENCION', 7),
(76, 'PARURO', 7),
(77, 'PAUCARTAMBO', 7),
(78, 'QUISPICANCHI', 7),
(79, 'URUBAMBA', 7),
(80, 'ACOBAMBA', 8),
(81, 'ANGARAES', 8),
(82, 'CASTROVIRREYNA', 8),
(83, 'CHURCAMPA', 8),
(84, 'HUANCAVELICA', 8),
(85, 'HUAYTARA', 8),
(86, 'TAYACAJA', 8),
(87, 'AMBO', 9),
(88, 'DOS DE MAYO', 9),
(89, 'HUACAYBAMBA', 9),
(90, 'HUAMALIES', 9),
(91, 'HUÁNUCO', 9),
(92, 'LAURICOCHA', 9),
(93, 'LEONCIO PRADO', 9),
(94, 'MARAÑON', 9),
(95, 'PACHITEA', 9),
(96, 'PUERTO INCA', 9),
(97, 'YAROWILCA', 9),
(98, 'CHINCHA', 10),
(99, 'ICA', 10),
(100, 'NAZCA', 10),
(101, 'PALPA', 10),
(102, 'PISCO', 10),
(103, 'CHANCHAMAYO', 11),
(104, 'CHUPACA', 11),
(105, 'CONCEPCION', 11),
(106, 'HUANCAYO', 11),
(107, 'JAUJA', 11),
(108, 'JUNIN', 11),
(109, 'SATIPO', 11),
(110, 'TARMA', 11),
(111, 'YAULI', 11),
(112, 'ASCOPE', 12),
(113, 'BOLIVAR', 12),
(114, 'CHEPEN', 12),
(115, 'GRAN CHIMU', 12),
(116, 'JULCAN', 12),
(117, 'OTUZCO', 12),
(118, 'PACASMAYO', 12),
(119, 'PATAZ', 12),
(120, 'SÁNCHEZ CARRION', 12),
(121, 'SANTIAGO DE CHUCO', 12),
(122, 'TRUJILLO', 12),
(123, 'VIRU', 12),
(124, 'CHICLAYO', 13),
(125, 'FERREÑAFE', 13),
(126, 'LAMBAYEQUE', 13),
(127, 'BARRANCA', 14),
(128, 'CAJATAMBO', 14),
(129, 'CANTA', 14),
(130, 'CAÑETE', 14),
(131, 'HUARAL', 14),
(132, 'HUAROCHIRI', 14),
(133, 'HUAURA', 14),
(134, 'LIMA', 14),
(135, 'OYON', 14),
(136, 'YAUYOS', 14),
(137, 'CALLAO', 15),
(138, 'ALTO AMAZONAS', 16),
(139, 'DATEM DEL MARAÑON', 16),
(140, 'LORETO', 16),
(141, 'MARISCAL RAMON CASTILLA', 16),
(142, 'MAYNAS', 16),
(143, 'REQUENA', 16),
(144, 'UCAYALI', 16),
(145, 'MANU', 17),
(146, 'TAHUAMANU', 17),
(147, 'TAMBOPATA', 17),
(148, 'GENERAL SANCHEZ CERRO', 18),
(149, 'ILO', 18),
(150, 'MARISCAL NIETO', 18),
(151, 'DANIEL ALCIDES CARRION', 19),
(152, 'OXAPAMPA', 19),
(153, 'PASCO', 19),
(154, 'AYABACA', 20),
(155, 'HUANCABAMBA', 20),
(156, 'MORROPON', 20),
(157, 'PAITA', 20),
(158, 'PIURA', 20),
(159, 'SECHURA', 20),
(160, 'SULLANA', 20),
(161, 'TALARA', 20),
(162, 'AZANGARO', 21),
(163, 'CARABAYA', 21),
(164, 'CHUCUITO', 21),
(165, 'EL COLLAO', 21),
(166, 'HUANCANE', 21),
(167, 'LAMPA', 21),
(168, 'MELGAR', 21),
(169, 'MOHO', 21),
(170, 'PUNO', 21),
(171, 'SAN ANTONIO DE PUTINA', 21),
(172, 'SAN ROMÁN', 21),
(173, 'SANDIA', 21),
(174, 'YUNGUYO', 21),
(175, 'BELLAVISTA', 22),
(176, 'EL DORADO', 22),
(177, 'HUALLAGA', 22),
(178, 'LAMAS', 22),
(179, 'MARISCAL CACERES', 22),
(180, 'MOYOBAMBA', 22),
(181, 'PICOTA', 22),
(182, 'RIOJA', 22),
(183, 'SAN MARTIN', 22),
(184, 'TOCACHE', 22),
(185, 'CANDARAVE', 23),
(186, 'JORGE BASADRE', 23),
(187, 'TACNA', 23),
(188, 'TARATA', 24),
(189, 'CONTRALMIRANTE VILLAR', 24),
(190, 'TUMBES', 24),
(191, 'ZARUMILLA', 24),
(192, 'ATALAYA', 25),
(193, 'CORONEL PORTILLO', 25),
(194, 'PADRE ABAD', 25),
(195, 'PURUS', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(3, 'Administrador'),
(4, 'Ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(40) NOT NULL DEFAULT '',
  `data` text,
  `expires` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE IF NOT EXISTS `socios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_doc` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=DNI\n 0=RUC',
  `codigo` int(11) DEFAULT NULL COMMENT 'dni o ruc',
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `movil` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `address_id` bigint(20) NOT NULL COMMENT 'Id de la direccion predeterminada para facturar y envio de mercaderia',
  `cliente` tinyint(4) DEFAULT '0' COMMENT '0=Cliente1=Proveedor2=Empleado',
  `proveedor` tinyint(4) DEFAULT '0',
  `empleado` tinyint(4) DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1= activo\n0=inactivo',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `tipo_doc`, `codigo`, `nombre`, `descripcion`, `telefono`, `movil`, `email`, `address_id`, `cliente`, `proveedor`, `empleado`, `estado`) VALUES
(1, 0, 2147483647, 'REPRESENTACIONES Y DISTRIBUCIONES CALCINA SAC', 'REDICAL SAC', '', '', '', 0, 1, 0, 0, 1),
(2, 0, 2147483647, 'GRUPO DELTRON S.A.', '', '', '', '', 0, 0, 1, 0, 1),
(3, 1, 44729752, 'OMAR SABOYA CARO', '', '253745', '956683860', 'omarsc17@gmail.com', 0, 0, 0, 1, 1),
(5, 0, 2147483647, 'OBRAS DE INGENIERIA S.A.', 'OBRAINSA', '6164646', '', '', 1, 1, 0, 0, 1),
(6, 1, 43215925, 'ROSARIO DEL PILAR SANCHEZ AGUILAR', '', '253313', '944649409', 'charito_0625@hotmail.com', 0, 0, 0, 1, 1),
(8, 1, 0, 'ESTANDAR', 'CLIENTE ESTANDAR PARA VENTAS RAPIDAS CON TICKET', '', '', '', 0, 1, 0, 0, 1),
(9, 0, 2147483647, 'GRUPO UPGRADE SAC', '', '256458', '956686414', 'info@grupoupgrade.com', 0, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `umedidas`
--

CREATE TABLE IF NOT EXISTS `umedidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `simbolo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `umedidas`
--

INSERT INTO `umedidas` (`id`, `nombre`, `simbolo`) VALUES
(1, 'UNIDAD', 'UND');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `socio_id` bigint(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `agente` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=Agente de ventas',
  `visibility_roles` longtext,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `role_id_fk_idx` (`role_id`),
  KEY `socio_id_fk_idx` (`socio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `socio_id`, `role_id`, `username`, `password`, `agente`, `visibility_roles`, `estado`, `created`, `modified`) VALUES
(5, 3, 3, 'admin', '$2y$10$r1vVD7IeSUQhi0lSQ8SBuuNwPurjvAWpkrW6NjbRbX7tGsFoDwsTe', 1, '["1","2"]', 1, '2016-03-08 02:24:00', '2016-03-10 12:15:37'),
(6, 6, 4, 'rsachez', '$2y$10$CR/bZl22DKUYag6FPMUjn.9HLQ/eNM0GvVlr1WV69sMOSNhfDLDXK', 1, '["2"]', 1, '2016-03-12 12:48:19', '2016-03-12 12:48:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `socio_id` bigint(20) NOT NULL,
  `orden_venta_id` bigint(20) DEFAULT NULL,
  `documento_id` int(11) NOT NULL,
  `deposito_id` int(11) NOT NULL,
  `forma_pago_id` bigint(20) NOT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `serie` int(3) unsigned zerofill NOT NULL DEFAULT '000',
  `numero` int(7) unsigned zerofill NOT NULL DEFAULT '0000000',
  `estado` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Grabado\n1=Procesado',
  `docserie_id` bigint(20) NOT NULL DEFAULT '0',
  `codigo_unico` varchar(100) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `impuesto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `grantotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cobrado` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `saldo` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_unico_UNIQUE` (`codigo_unico`),
  KEY `socio_id_fk_v_idx` (`socio_id`),
  KEY `documento_id_fk_v_idx` (`documento_id`),
  KEY `deposito_id_fk_v_idx` (`deposito_id`),
  KEY `user_id_fk_v_idx` (`user_id`),
  KEY `forma_pago_id_fk_v_idx` (`forma_pago_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `user_id`, `socio_id`, `orden_venta_id`, `documento_id`, `deposito_id`, `forma_pago_id`, `fecha`, `serie`, `numero`, `estado`, `docserie_id`, `codigo_unico`, `total`, `impuesto`, `grantotal`, `cobrado`, `created`, `modified`, `saldo`) VALUES
(6, 5, 5, 3, 2, 1, 1, '2016-03-16', 001, 0000005, 1, 2, '1.5.2.1', '34.00', '6.12', '40.12', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, 5, 5, 5, 2, 1, 1, '2016-03-16', 001, 0000006, 1, 2, '1.6.2.1', '6.80', '1.22', '8.02', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(12, 5, 8, 28, 5, 1, 1, '2016-04-07', 001, 0000004, 1, 7, '1.4.6.1', '11.60', '2.09', '13.69', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(13, 5, 1, 29, 2, 1, 1, '2016-04-07', 001, 0000007, 1, 2, '1.7.2.1', '10.00', '1.80', '11.80', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(14, 5, 1, 30, 6, 1, 2, '2016-04-07', 001, 0000001, 1, 8, '1.1.6.1', '17.40', '3.13', '20.53', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

--
-- Disparadores `ventas`
--
DROP TRIGGER IF EXISTS `update_numero_documento_venta`;
DELIMITER //
CREATE TRIGGER `update_numero_documento_venta` BEFORE INSERT ON `ventas`
 FOR EACH ROW begin
 update docseries set numero=new.numero+1 where id=new.docserie_id;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `update_orden_venta_after_infert_status`;
DELIMITER //
CREATE TRIGGER `update_orden_venta_after_infert_status` AFTER INSERT ON `ventas`
 FOR EACH ROW begin
	if new.orden_venta_id then
		update orden_ventas set venta_id=new.id, status_venta=1 where id = new.orden_venta_id;
	end if;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE IF NOT EXISTS `ventas_detalle` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `venta_id` bigint(20) DEFAULT NULL,
  `articulo_id` bigint(20) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `serie` longtext COMMENT 'serie de articulos',
  `incluir_impuesto` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `tasa_impuesto` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `venta_id_fk_vd_idx` (`venta_id`),
  KEY `articulo_id_fk_vd_idx` (`articulo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id`, `venta_id`, `articulo_id`, `cantidad`, `precio`, `serie`, `incluir_impuesto`, `tasa_impuesto`) VALUES
(12, 6, 8, '5.00', '5.80', NULL, 0, '18.00'),
(13, 6, 10, '5.00', '1.00', NULL, 0, '18.00'),
(14, 7, 8, '1.00', '5.80', NULL, 0, '18.00'),
(15, 7, 10, '1.00', '1.00', NULL, 0, '18.00'),
(20, 12, 8, '2.00', '5.80', NULL, 0, '18.00'),
(21, 13, 3, '3.00', '2.00', NULL, 0, '18.00'),
(22, 13, 2, '2.00', '2.00', NULL, 0, '18.00'),
(23, 14, 8, '3.00', '5.80', NULL, 0, '18.00');

-- --------------------------------------------------------

--
-- Estructura para la vista `docseriev`
--
DROP TABLE IF EXISTS `docseriev`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `docseriev` AS select `ds`.`deposito_id` AS `deposito_id`,`ds`.`id` AS `id`,`ds`.`documento_id` AS `documento_id`,`d`.`nombre` AS `nombre`,`ds`.`serie` AS `serie`,`ds`.`numero` AS `numero`,`ds`.`tipo` AS `tipo` from (`docseries` `ds` join `documentos` `d`) where (`d`.`id` = `ds`.`documento_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `socio_id_fk_add` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `artfamilia_id_fk_art` FOREIGN KEY (`artfamilia_id`) REFERENCES `artfamilias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `artmarca_id_fk_art` FOREIGN KEY (`artmarca_id`) REFERENCES `artmarcas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `umedida_id_fk_art` FOREIGN KEY (`umedida_id`) REFERENCES `umedidas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `articulos_info`
--
ALTER TABLE `articulos_info`
  ADD CONSTRAINT `articulo_id_fk_ainfo` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `articulo_precio_id_fk_ainfo` FOREIGN KEY (`articulo_precio_id`) REFERENCES `articulo_precios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `deposito_id_fk_ainfo` FOREIGN KEY (`deposito_id`) REFERENCES `depositos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lista_precio_id_fk_ainfo` FOREIGN KEY (`lista_precio_id`) REFERENCES `lista_precios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `articulo_precios`
--
ALTER TABLE `articulo_precios`
  ADD CONSTRAINT `articulo_id_fk_ap` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `deposito_id_fk_ap` FOREIGN KEY (`deposito_id`) REFERENCES `depositos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `impuesto_id_fk_ap` FOREIGN KEY (`impuesto_id`) REFERENCES `impuestos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lista_precio_id_fk_ap` FOREIGN KEY (`lista_precio_id`) REFERENCES `lista_precios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD CONSTRAINT `deposito_id_fk_caja` FOREIGN KEY (`deposito_id`) REFERENCES `depositos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `libro_caja_id_fk_caja` FOREIGN KEY (`libro_caja_id`) REFERENCES `libro_cajas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cajas_movimientos`
--
ALTER TABLE `cajas_movimientos`
  ADD CONSTRAINT `caja_id_fk_cm` FOREIGN KEY (`caja_id`) REFERENCES `cajas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cargo_id_fk_cm` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `compra_id_fk_cm` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ctacorriente_id_fk_cm` FOREIGN KEY (`ctacorriente_id`) REFERENCES `ctacorrientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `venta_id_fk_cm` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `socio_id_fk_cargo` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `ingreso_id_fk_com` FOREIGN KEY (`ingreso_id`) REFERENCES `ingresos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `socio_id_fk_com` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compras_detalle`
--
ALTER TABLE `compras_detalle`
  ADD CONSTRAINT `articulo_id_fk_comdet` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `compra_id_fk_comdet` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ctacorrientes`
--
ALTER TABLE `ctacorrientes`
  ADD CONSTRAINT `banco_id_fk_ctaco` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `deposito_id_fk_ctaco` FOREIGN KEY (`deposito_id`) REFERENCES `depositos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `moneda_id_fk_ctaco` FOREIGN KEY (`moneda_id`) REFERENCES `monedas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `socio_id_fk_ctaco` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD CONSTRAINT `departamento_id_fk_dist` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `provincia_id_fk_dist` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docseries`
--
ALTER TABLE `docseries`
  ADD CONSTRAINT `deposito_id_fk_docs` FOREIGN KEY (`deposito_id`) REFERENCES `depositos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `documento_id_fk_docs` FOREIGN KEY (`documento_id`) REFERENCES `documentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `guias`
--
ALTER TABLE `guias`
  ADD CONSTRAINT `deposito_id_fk_gr` FOREIGN KEY (`deposito_id`) REFERENCES `depositos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `documento_id_fk_gr` FOREIGN KEY (`documento_id`) REFERENCES `documentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `socio_id_fk_gr` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `guias_detalle`
--
ALTER TABLE `guias_detalle`
  ADD CONSTRAINT `articulo_id_fk_gd` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `guia_id_fk_gd` FOREIGN KEY (`guia_id`) REFERENCES `guias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD CONSTRAINT `deposito_id_fk_ing` FOREIGN KEY (`deposito_id`) REFERENCES `depositos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `socio_id_fk_ing` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingresos_detalle`
--
ALTER TABLE `ingresos_detalle`
  ADD CONSTRAINT `articulo_id_fk_idet` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ingreso_id_fk_idet` FOREIGN KEY (`ingreso_id`) REFERENCES `ingresos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `menu_id_fk_us` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lista_precios`
--
ALTER TABLE `lista_precios`
  ADD CONSTRAINT `moneda_id_fk_lp` FOREIGN KEY (`moneda_id`) REFERENCES `monedas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `socios_id_fk_lp` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_compras`
--
ALTER TABLE `orden_compras`
  ADD CONSTRAINT `socio_id_fk_oc` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_compras_detalle`
--
ALTER TABLE `orden_compras_detalle`
  ADD CONSTRAINT `articulo_id_fk_ocd` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orden_compra_id_fk_ocd` FOREIGN KEY (`orden_compra_id`) REFERENCES `orden_compras` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_ventas`
--
ALTER TABLE `orden_ventas`
  ADD CONSTRAINT `deposito_id_fk_ov` FOREIGN KEY (`deposito_id`) REFERENCES `depositos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `forma_pago_id_fk_ov` FOREIGN KEY (`forma_pago_id`) REFERENCES `forma_pagos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `socio_id_fk_ov` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id_fk_ov` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_ventas_detalle`
--
ALTER TABLE `orden_ventas_detalle`
  ADD CONSTRAINT `articulo_id_fk_ovd` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orden_venta_id_fk_ovd` FOREIGN KEY (`orden_venta_id`) REFERENCES `orden_ventas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pos_settings`
--
ALTER TABLE `pos_settings`
  ADD CONSTRAINT `caja_id_fk_ps` FOREIGN KEY (`caja_id`) REFERENCES `cajas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `deposito_id_fk_ps` FOREIGN KEY (`deposito_id`) REFERENCES `depositos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `docserie_id_fk_ps` FOREIGN KEY (`docserie_id`) REFERENCES `docseries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `socio_id_fk_ps` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id_fk_ps` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `departamento_id_fk_prov` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_id_fk_us` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `socio_id_fk_us` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `deposito_id_fk_v` FOREIGN KEY (`deposito_id`) REFERENCES `depositos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `documento_id_fk_v` FOREIGN KEY (`documento_id`) REFERENCES `documentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `forma_pago_id_fk_v` FOREIGN KEY (`forma_pago_id`) REFERENCES `forma_pagos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `socio_id_fk_v` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id_fk_v` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `articulo_id_fk_vd` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `venta_id_fk_vd` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
