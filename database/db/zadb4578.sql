-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.26 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;



-- Volcando estructura para tabla proyecto1.agendar_visita
CREATE TABLE IF NOT EXISTS `agendar_visita` (
  `id_visita` int unsigned NOT NULL AUTO_INCREMENT,
  `nomb_emp` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit` tinyint(1) NOT NULL,
  `fecha_v` date NOT NULL,
  `usrid` int unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empre_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id_visita`),
  KEY `agendar_visita_usrid_foreign` (`usrid`),
  KEY `empre_id` (`empre_id`),
  CONSTRAINT `agendar_visita_usrid_foreign` FOREIGN KEY (`usrid`) REFERENCES `usr` (`id_usr`) ON DELETE CASCADE,
  CONSTRAINT `empres` FOREIGN KEY (`empre_id`) REFERENCES `empresa` (`id_emp`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.agendar_visita: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `agendar_visita` DISABLE KEYS */;
INSERT IGNORE INTO `agendar_visita` (`id_visita`, `nomb_emp`, `visit`, `fecha_v`, `usrid`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `empre_id`) VALUES
	(1, 'Fereteria Contru', 0, '2021-10-21', 8, NULL, NULL, NULL, NULL, 1),
	(2, 'Ferreteria Salomon', 0, '2021-10-25', 8, NULL, NULL, NULL, NULL, 2),
	(3, 'Ferreteria Feras', 0, '2021-10-25', 8, NULL, NULL, NULL, NULL, 3),
	(4, 'Ferreteria Cristal', 1, '2021-10-25', 8, NULL, NULL, NULL, NULL, 6),
	(5, 'Fereteria Contru', 1, '2021-10-25', 8, NULL, NULL, NULL, NULL, 1),
	(6, 'Ferreteria Plasmat', 1, '2021-11-03', 8, NULL, NULL, NULL, NULL, 4),
	(7, 'Ferreteria Salomon', 1, '2021-11-03', 8, NULL, NULL, NULL, NULL, 2),
	(8, 'Ferreteria Feras', 1, '2021-11-03', 8, NULL, NULL, NULL, NULL, 3);
/*!40000 ALTER TABLE `agendar_visita` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.ciudad
CREATE TABLE IF NOT EXISTS `ciudad` (
  `id_ciudad` int unsigned NOT NULL AUTO_INCREMENT,
  `nombc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depa` int unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ciudad`),
  KEY `ciudad_depa_foreign` (`depa`),
  CONSTRAINT `ciudad_depa_foreign` FOREIGN KEY (`depa`) REFERENCES `departamento` (`id_dep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.ciudad: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.departamento
CREATE TABLE IF NOT EXISTS `departamento` (
  `id_dep` int unsigned NOT NULL AUTO_INCREMENT,
  `nomb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_dep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.departamento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_emp` int unsigned NOT NULL AUTO_INCREMENT,
  `nomb_emp` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` int NOT NULL,
  `direccion` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` int NOT NULL,
  `ciudad` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usr_id` int unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `log` double DEFAULT NULL,
  `cordenada` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `activo_em` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_emp`),
  KEY `empresa_usr_id_foreign` (`usr_id`),
  CONSTRAINT `empresa_usr_id_foreign` FOREIGN KEY (`usr_id`) REFERENCES `usr` (`id_usr`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.empresa: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT IGNORE INTO `empresa` (`id_emp`, `nomb_emp`, `nit`, `direccion`, `telefon`, `ciudad`, `imagen`, `usr_id`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `lat`, `log`, `cordenada`, `activo_em`) VALUES
	(1, 'Fereteria Contru', 58858874, 'Calle Antezana y Calama n°250', 4458454, 'Quillacollo', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'https://goo.gl/maps/75BnFNR1zFNSynAe6', 1),
	(2, 'Ferreteria Salomon', 48484854, 'Ladizlao Cabrera N° 451', 44845484, 'Cercado', 'uploads/F31uQzLMf0lr89WwO3eDnRbPvaVkTlakrd5X2Bqz.jpg', 7, NULL, NULL, NULL, NULL, NULL, NULL, 'https://goo.gl/maps/3ZzGuznDasAZh1eN7', 1),
	(3, 'Ferreteria Feras', 78797945, 'Calle Calama y jordan n° 258', 48784848, 'Cercado', NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, 'https://goo.gl/maps/DugL8qVPcvpyroW4A', 1),
	(4, 'Ferreteria Plasmat', 78978974, 'Calle Santa Cruz, America N°485', 4458787, 'Cercado', NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d7616.670625256458!2d-66.17281067765249!3d-17.347590811561886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e0!4m3!3m2!1d-17.343847699999998!2d-66.16536909999999!4m5!1s0x93e374357290a801%3A0xdb510fa34dfed56f!2sMayorazgo%2C%20Cochabamba!3m2!1d-17.3508854!2d-66.1688803!5e0!3m2!1sen!2sbo!4v1635148394062!5m2!1sen!2sbo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>', 1),
	(5, 'Ferreteria Campus', 484848584, 'Calle Salaca y Ramon Dario N°454', 4414154, 'Cercado', NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d60925.52373856752!2d-66.19942192477468!3d-17.371178682583636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e0!4m3!3m2!1d-17.3472452!2d-66.1749403!4m5!1s0x93e373f94e9edddf%3A0xd6a7bea9d74e780d!2sUMSS%2C%20Cochabamba!3m2!1d-17.394603999999998!2d-66.1478669!5e0!3m2!1sen!2sbo!4v1635149815663!5m2!1sen!2sbo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>', 1),
	(6, 'Ferreteria Cristal', 154844848, 'Calle Salamaca 454', 4484848, 'Quillacollo', NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, 'https://goo.gl/maps/SKe8Gmszoi61VDYR8', 1);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.funcion
CREATE TABLE IF NOT EXISTS `funcion` (
  `id_funcion` int unsigned NOT NULL AUTO_INCREMENT,
  `funci` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_funcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.funcion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `funcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcion` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.funcion_iu
CREATE TABLE IF NOT EXISTS `funcion_iu` (
  `iu_d` int unsigned NOT NULL,
  `funcion_id` int unsigned NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `funcion_iu_iu_d_foreign` (`iu_d`),
  KEY `funcion_iu_funcion_id_foreign` (`funcion_id`),
  CONSTRAINT `funcion_iu_funcion_id_foreign` FOREIGN KEY (`funcion_id`) REFERENCES `funcion` (`id_funcion`),
  CONSTRAINT `funcion_iu_iu_d_foreign` FOREIGN KEY (`iu_d`) REFERENCES `iu` (`id_iu`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.funcion_iu: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `funcion_iu` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcion_iu` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.iu
CREATE TABLE IF NOT EXISTS `iu` (
  `id_iu` int unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_iu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.iu: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `iu` DISABLE KEYS */;
/*!40000 ALTER TABLE `iu` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.log
CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int unsigned NOT NULL AUTO_INCREMENT,
  `dato_viejo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dato_nuevo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `usr_id` int unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_log`),
  KEY `log_usr_id_foreign` (`usr_id`),
  CONSTRAINT `log_usr_id_foreign` FOREIGN KEY (`usr_id`) REFERENCES `usr` (`id_usr`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.log: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.migrations: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(2, '2021_10_05_004118_create_departamentos_table', 1),
	(3, '2021_10_05_005913_create_funcions_table', 1),
	(4, '2021_10_05_010005_create_rols_table', 1),
	(5, '2021_10_05_010036_create_ius_table', 1),
	(6, '2021_10_05_010424_create_personas_table', 1),
	(7, '2021_10_05_010502_create_ciudades_table', 1),
	(8, '2021_10_05_010541_create_funcion_ius_table', 1),
	(9, '2021_10_05_022445_create_rol_funcions_table', 1),
	(10, '2021_10_05_022605_create_usrs_table', 1),
	(11, '2021_10_05_022641_create_usr_rols_table', 1),
	(12, '2021_10_05_022847_create_password_resets_table', 1),
	(13, '2021_10_05_022926_create_logs_table', 1),
	(14, '2021_10_05_034840_create_sesions_table', 1),
	(15, '2021_10_17_025453_create_empresa_table', 2),
	(16, '2021_10_17_025947_create_agendar_visita_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_us` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_id_us_foreign` (`id_us`),
  KEY `password_resets_email_index` (`email`),
  CONSTRAINT `password_resets_id_us_foreign` FOREIGN KEY (`id_us`) REFERENCES `usr` (`id_usr`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.password_resets: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT IGNORE INTO `password_resets` (`email`, `token`, `id_us`, `created_at`) VALUES
	('cristian@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 4, NULL),
	('jhas@gmail.com', 'd5737c928ff96dd654189d6819792d519c4f90d9', 5, NULL),
	('eliord@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 6, NULL),
	('mario@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 7, NULL),
	('juan@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 8, NULL),
	('cris@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 9, NULL),
	('Jhasmi@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 10, NULL),
	('dani@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 11, NULL),
	('muriel@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 12, NULL),
	('cristal@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 13, NULL);
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `ci` int NOT NULL,
  `nombre` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apepa` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apema` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ci2` int DEFAULT NULL,
  PRIMARY KEY (`ci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.persona: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT IGNORE INTO `persona` (`ci`, `nombre`, `apepa`, `apema`, `deleted_at`, `created_at`, `updated_at`, `ci2`) VALUES
	(4566335, 'Cristian', 'Mamani', 'Fernandez', NULL, NULL, NULL, NULL),
	(5584847, 'Eliord', 'Roca', 'Sanco', NULL, NULL, NULL, NULL),
	(7784848, 'Daniel', 'Mamani', 'Quispe', NULL, NULL, NULL, NULL),
	(7787845, 'Elias Miguel', 'Rodriguez', 'Ambrocio', NULL, NULL, '2021-11-03 02:54:34', 5848454),
	(8484848, 'Marai', 'Mendez', 'Cristal', NULL, NULL, NULL, NULL),
	(25254674, 'Juan Pablo', 'Martinez', 'Peralta', NULL, NULL, NULL, NULL),
	(45454545, 'Endzo', 'Galarsa', 'Messi', NULL, NULL, NULL, NULL),
	(46548484, 'Jhasmin', 'Orellano', 'Ortiz', NULL, NULL, NULL, NULL),
	(56565623, 'Mario', 'Castañeda', 'Moreno', NULL, NULL, NULL, NULL),
	(56595959, 'Jhasmin', 'Orelllano', 'Mendieta', NULL, NULL, NULL, NULL),
	(454841818, 'Cristian', 'Almadro', 'Carrillo', NULL, NULL, NULL, NULL),
	(784848778, 'Muriel', 'Rodriguez', 'Cralde', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.personal_access_tokens: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int unsigned NOT NULL AUTO_INCREMENT,
  `ro` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.rol: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` (`id_rol`, `ro`, `descripcion`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Supremo', 'Lopuede ver todo', NULL, NULL, NULL),
	(2, 'Admin', 'lo puede hacer pero no ver todo', NULL, NULL, NULL),
	(3, 'Empleado', 'Puede registrar clientes', NULL, NULL, NULL),
	(4, 'Cliente', 'Registrado con su empresa', NULL, NULL, NULL);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.rol_funcion
CREATE TABLE IF NOT EXISTS `rol_funcion` (
  `activo` tinyint(1) NOT NULL,
  `rol_id` int unsigned NOT NULL,
  `funcion_id` int unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `rol_funcion_rol_id_foreign` (`rol_id`),
  KEY `rol_funcion_funcion_id_foreign` (`funcion_id`),
  CONSTRAINT `rol_funcion_funcion_id_foreign` FOREIGN KEY (`funcion_id`) REFERENCES `funcion` (`id_funcion`) ON DELETE CASCADE,
  CONSTRAINT `rol_funcion_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.rol_funcion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `rol_funcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `rol_funcion` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.sesion
CREATE TABLE IF NOT EXISTS `sesion` (
  `id_sesion` int unsigned NOT NULL AUTO_INCREMENT,
  `activo` tinyint(1) NOT NULL,
  `pid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `hora_conect` datetime NOT NULL,
  `hora_disconect` datetime NOT NULL,
  `usr_id` int unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sesion`),
  KEY `sesion_usr_id_foreign` (`usr_id`),
  CONSTRAINT `sesion_usr_id_foreign` FOREIGN KEY (`usr_id`) REFERENCES `usr` (`id_usr`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.sesion: ~43 rows (aproximadamente)
/*!40000 ALTER TABLE `sesion` DISABLE KEYS */;
INSERT IGNORE INTO `sesion` (`id_sesion`, `activo`, `pid`, `fecha`, `hora_conect`, `hora_disconect`, `usr_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 0, 'Elias Miguel', '2021-10-18 21:59:43', '2021-10-18 21:59:43', '2021-10-19 01:07:07', 1, NULL, NULL, NULL),
	(2, 0, 'Elias Miguel', '2021-10-19 01:07:22', '2021-10-19 01:07:22', '2021-10-21 20:29:35', 1, NULL, NULL, NULL),
	(3, 0, 'Elias Miguel', '2021-10-20 04:18:43', '2021-10-20 04:18:43', '2021-10-21 20:29:35', 1, NULL, NULL, NULL),
	(4, 0, 'Elias Miguel', '2021-10-20 08:42:22', '2021-10-20 08:42:22', '2021-10-21 20:29:35', 1, NULL, NULL, NULL),
	(5, 0, 'Elias Miguel', '2021-10-20 16:01:06', '2021-10-20 16:01:06', '2021-10-21 20:29:35', 1, NULL, NULL, NULL),
	(6, 0, 'Elias Miguel', '2021-10-21 01:35:06', '2021-10-21 01:35:06', '2021-10-21 20:29:35', 1, NULL, NULL, NULL),
	(7, 0, 'Elias Miguel', '2021-10-21 07:25:57', '2021-10-21 07:25:57', '2021-10-21 20:29:35', 1, NULL, NULL, NULL),
	(8, 0, 'Elias Miguel', '2021-10-21 12:52:09', '2021-10-21 12:52:09', '2021-10-21 20:29:35', 1, NULL, NULL, NULL),
	(9, 0, 'Elias Miguel', '2021-10-21 20:28:51', '2021-10-21 20:28:51', '2021-10-21 20:29:35', 1, NULL, NULL, NULL),
	(10, 0, 'Elias Miguel', '2021-10-24 11:51:37', '2021-10-24 11:51:37', '2021-10-25 21:26:25', 1, NULL, NULL, NULL),
	(11, 0, 'Elias Miguel', '2021-10-24 18:55:44', '2021-10-24 18:55:44', '2021-10-25 21:26:25', 1, NULL, NULL, NULL),
	(12, 0, 'Elias Miguel', '2021-10-25 04:45:36', '2021-10-25 04:45:36', '2021-10-25 21:26:25', 1, NULL, NULL, NULL),
	(13, 0, 'Elias Miguel', '2021-10-25 07:49:31', '2021-10-25 07:49:31', '2021-10-25 21:26:25', 1, NULL, NULL, NULL),
	(14, 0, 'Juan Pablo', '2021-10-25 12:40:12', '2021-10-25 12:40:12', '2021-10-25 16:58:17', 8, NULL, NULL, NULL),
	(15, 0, 'Elias Miguel', '2021-10-25 16:49:57', '2021-10-25 16:49:57', '2021-10-25 21:26:25', 1, NULL, NULL, NULL),
	(16, 0, 'Cristian', '2021-10-25 16:58:45', '2021-10-25 16:58:45', '2021-10-25 17:01:55', 4, NULL, NULL, NULL),
	(17, 0, 'Mario', '2021-10-25 17:02:07', '2021-10-25 17:02:07', '2021-10-25 17:07:15', 7, NULL, NULL, NULL),
	(18, 0, 'Juan Pablo', '2021-10-25 17:07:48', '2021-10-25 17:07:48', '2021-10-25 19:33:23', 8, NULL, NULL, NULL),
	(19, 0, 'Juan Pablo', '2021-10-25 19:33:45', '2021-10-25 19:33:45', '2021-10-25 21:11:50', 8, NULL, NULL, NULL),
	(20, 0, 'Cristian', '2021-10-25 21:13:12', '2021-10-25 21:13:12', '2021-10-25 21:18:56', 4, NULL, NULL, NULL),
	(21, 0, 'Cristian', '2021-10-25 21:19:15', '2021-10-25 21:19:15', '2021-10-25 21:20:17', 9, NULL, NULL, NULL),
	(22, 0, 'Juan Pablo', '2021-10-25 21:20:38', '2021-10-25 21:20:38', '2021-10-25 21:24:04', 8, NULL, NULL, NULL),
	(23, 0, 'Cristian', '2021-10-25 21:24:24', '2021-10-25 21:24:24', '2021-10-25 21:26:19', 9, NULL, NULL, NULL),
	(24, 0, 'Cristian', '2021-10-25 21:27:48', '2021-10-25 21:27:48', '2021-10-25 22:09:41', 9, NULL, NULL, NULL),
	(25, 0, 'Elias Miguel', '2021-10-25 21:55:45', '2021-10-25 21:55:45', '2021-10-26 16:41:00', 1, NULL, NULL, NULL),
	(26, 1, 'Jhasmin', '2021-10-25 22:19:24', '2021-10-25 22:19:24', '2021-10-25 22:19:24', 10, NULL, NULL, NULL),
	(27, 0, 'Juan Pablo', '2021-10-25 23:03:45', '2021-10-25 23:03:45', '2021-10-25 23:05:14', 8, NULL, NULL, NULL),
	(28, 0, 'Juan Pablo', '2021-10-25 23:05:54', '2021-10-25 23:05:54', '2021-11-03 08:00:50', 8, NULL, NULL, NULL),
	(29, 0, 'Elias Miguel', '2021-10-26 16:04:36', '2021-10-26 16:04:36', '2021-10-26 16:41:00', 1, NULL, NULL, NULL),
	(30, 0, 'Elias Miguel', '2021-10-26 16:40:07', '2021-10-26 16:40:07', '2021-10-26 16:41:00', 1, NULL, NULL, NULL),
	(31, 0, 'Juan Pablo', '2021-10-26 16:41:21', '2021-10-26 16:41:21', '2021-11-03 08:00:50', 8, NULL, NULL, NULL),
	(32, 0, 'Elias Miguel', '2021-10-27 05:38:26', '2021-10-27 05:38:26', '2021-10-27 05:42:47', 1, NULL, NULL, NULL),
	(33, 0, 'Elias Miguel', '2021-10-27 05:43:35', '2021-10-27 05:43:35', '2021-10-27 05:45:10', 1, NULL, NULL, NULL),
	(34, 0, 'Elias Miguel', '2021-10-27 05:45:25', '2021-10-27 05:45:25', '2021-10-27 05:57:09', 1, NULL, NULL, NULL),
	(35, 0, 'Elias Miguel', '2021-10-27 06:48:12', '2021-10-27 06:48:12', '2021-10-27 14:12:19', 1, NULL, NULL, NULL),
	(36, 0, 'Elias Miguel', '2021-10-27 14:06:22', '2021-10-27 14:06:22', '2021-10-27 14:12:19', 1, NULL, NULL, NULL),
	(37, 0, 'Elias Miguel', '2021-10-27 14:12:44', '2021-10-27 14:12:44', '2021-10-27 14:13:14', 1, NULL, NULL, NULL),
	(38, 1, 'Mario', '2021-10-27 14:13:30', '2021-10-27 14:13:30', '2021-10-27 14:13:30', 7, NULL, NULL, NULL),
	(39, 1, 'Mario', '2021-10-27 16:20:57', '2021-10-27 16:20:57', '2021-10-27 16:20:57', 7, NULL, NULL, NULL),
	(40, 0, 'Elias Miguel', '2021-10-28 13:56:42', '2021-10-28 13:56:42', '2021-11-01 03:19:10', 1, NULL, NULL, NULL),
	(41, 0, 'Elias Miguel', '2021-10-28 23:50:15', '2021-10-28 23:50:15', '2021-11-01 03:19:10', 1, NULL, NULL, NULL),
	(42, 0, 'Elias Miguel', '2021-11-01 03:13:54', '2021-11-01 03:13:54', '2021-11-01 03:19:10', 1, NULL, NULL, NULL),
	(43, 0, 'Elias Miguel', '2021-11-03 02:34:50', '2021-11-03 02:34:50', '2021-11-03 07:57:05', 1, NULL, NULL, NULL),
	(44, 0, 'Elias Miguel', '2021-11-03 07:28:36', '2021-11-03 07:28:36', '2021-11-03 07:57:05', 1, NULL, NULL, NULL),
	(45, 0, 'Juan Pablo', '2021-11-03 07:57:36', '2021-11-03 07:57:36', '2021-11-03 08:00:50', 8, NULL, NULL, NULL),
	(46, 0, 'Elias Miguel', '2021-11-03 08:01:09', '2021-11-03 08:01:09', '2021-11-03 08:01:51', 1, NULL, NULL, NULL),
	(47, 0, 'Juan Pablo', '2021-11-03 08:02:10', '2021-11-03 08:02:10', '2021-11-03 08:12:16', 8, NULL, NULL, NULL),
	(48, 1, 'Mario', '2021-11-03 08:12:44', '2021-11-03 08:12:44', '2021-11-03 08:12:44', 7, NULL, NULL, NULL),
	(49, 0, 'Elias Miguel', '2021-11-03 16:32:19', '2021-11-03 16:32:19', '2021-11-03 18:05:30', 1, NULL, NULL, NULL),
	(50, 0, 'Elias Miguel', '2021-11-03 18:05:56', '2021-11-03 18:05:56', '2021-11-03 18:06:15', 1, NULL, NULL, NULL),
	(51, 0, 'Endzo', '2021-11-03 18:06:34', '2021-11-03 18:06:34', '2021-11-03 18:07:57', 2, NULL, NULL, NULL),
	(52, 0, 'Endzo', '2021-11-03 18:18:29', '2021-11-03 18:18:29', '2021-11-03 18:21:00', 2, NULL, NULL, NULL),
	(53, 0, 'Endzo', '2021-11-03 18:23:22', '2021-11-03 18:23:22', '2021-11-03 19:07:09', 2, NULL, NULL, NULL),
	(54, 0, 'Juan Pablo', '2021-11-03 19:07:32', '2021-11-03 19:07:32', '2021-11-03 19:48:04', 8, NULL, NULL, NULL),
	(55, 0, 'Elias Miguel', '2021-11-03 19:49:03', '2021-11-03 19:49:03', '2021-11-03 19:50:19', 1, NULL, NULL, NULL),
	(56, 0, 'Juan Pablo', '2021-11-03 19:50:35', '2021-11-03 19:50:35', '2021-11-03 20:05:47', 8, NULL, NULL, NULL),
	(57, 1, 'Mario', '2021-11-03 20:06:02', '2021-11-03 20:06:02', '2021-11-03 20:06:02', 7, NULL, NULL, NULL);
/*!40000 ALTER TABLE `sesion` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.usr
CREATE TABLE IF NOT EXISTS `usr` (
  `id_usr` int unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `ci_per` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_usr`),
  UNIQUE KEY `usr_login_unique` (`login`),
  UNIQUE KEY `usr_email_unique` (`email`),
  KEY `usr_ci_per_foreign` (`ci_per`),
  CONSTRAINT `usr_ci_per_foreign` FOREIGN KEY (`ci_per`) REFERENCES `persona` (`ci`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.usr: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `usr` DISABLE KEYS */;
INSERT IGNORE INTO `usr` (`id_usr`, `login`, `email`, `password`, `foto`, `telefono`, `ci_per`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'cradoblack@gmail.com', 'cradoblack@gmail.com', 'd1e5ecb30985cd74f52cccd79d4d86c38cf0797e', 'uploads/EM5lzaFPvSKcOPFlKudCcLxI2RauImd55NtXbF3F.jpg', 58878484, 7787845, NULL, NULL, NULL, '2021-10-27 05:45:02'),
	(2, 'endzo@gmail.com', 'endzo@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL, NULL, 45454545, NULL, NULL, NULL, NULL),
	(4, 'cristian@gmail.com', 'cristian@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL, 78747858, 4566335, NULL, NULL, NULL, NULL),
	(5, 'jhas@gmail.com', 'jhas@gmail.com', 'd5737c928ff96dd654189d6819792d519c4f90d9', NULL, 85887874, 46548484, NULL, NULL, NULL, NULL),
	(6, 'eliord@gmail.com', 'eliord@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL, 78748485, 5584847, NULL, NULL, NULL, NULL),
	(7, 'mario@gmail.com', 'mario@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'uploads/TV6K7pAwPRUeouG5txmGcvW8UsgWnJt4KJKtxUrV.jpg', 77874744, 56565623, NULL, NULL, NULL, NULL),
	(8, 'juan@gmail.com', 'juan@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL, 78555478, 25254674, NULL, NULL, NULL, NULL),
	(9, 'cris@gmail.com', 'cris@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'uploads/oYpTGHBlT1LEXSDkhlutQHnOOqik4VjeNoaxawlE.jpg', 84878484, 454841818, NULL, NULL, NULL, NULL),
	(10, 'Jhasmi@gmail.com', 'Jhasmi@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'uploads/b4Yiebqw6nYEtDrKzO45icmvMwdKZX2ucYArgk68.jpg', 68578747, 56595959, NULL, NULL, NULL, NULL),
	(11, 'dani@gmail.com', 'dani@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'uploads/6pyrJj4iRwFOWxrBTga4d7Vw0BAiIus9rnQCWd3n.jpg', 78978848, 7784848, NULL, NULL, NULL, NULL),
	(12, 'muriel@gmail.com', 'muriel@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'uploads/IR5lX2DagVV4XgEFK4RElftu6Yu0ddwvCCjijnOn.jpg', 77878778, 784848778, NULL, NULL, NULL, NULL),
	(13, 'cristal@gmail.com', 'cristal@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'uploads/bSNtG9sIVe9VTMr9a9ZPrc29NNALBDxGmTFAk3pA.jpg', 78797848, 8484848, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `usr` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto1.usr_rol
CREATE TABLE IF NOT EXISTS `usr_rol` (
  `usr_id` int unsigned NOT NULL,
  `rol_id` int unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `usr_rol_usr_id_foreign` (`usr_id`),
  KEY `usr_rol_rol_id_foreign` (`rol_id`),
  CONSTRAINT `usr_rol_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE,
  CONSTRAINT `usr_rol_usr_id_foreign` FOREIGN KEY (`usr_id`) REFERENCES `usr` (`id_usr`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto1.usr_rol: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `usr_rol` DISABLE KEYS */;
INSERT IGNORE INTO `usr_rol` (`usr_id`, `rol_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL, NULL),
	(2, 2, NULL, NULL, NULL),
	(4, 4, NULL, NULL, NULL),
	(5, 3, NULL, NULL, NULL),
	(6, 2, NULL, NULL, NULL),
	(7, 4, NULL, NULL, NULL),
	(8, 3, NULL, NULL, NULL),
	(9, 4, NULL, NULL, NULL),
	(10, 4, NULL, NULL, NULL),
	(11, 4, NULL, NULL, NULL),
	(12, 4, NULL, NULL, NULL),
	(13, 4, NULL, NULL, NULL);
/*!40000 ALTER TABLE `usr_rol` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
