-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.17-log - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para etroncoso
CREATE DATABASE IF NOT EXISTS `etroncoso` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `etroncoso`;

-- Volcando estructura para tabla etroncoso.actividades
CREATE TABLE IF NOT EXISTS `actividades` (
  `id_actividad` int(5) NOT NULL AUTO_INCREMENT,
  `nombre_actividad` varchar(50) NOT NULL,
  `id_tipo` int(3) NOT NULL,
  `inicio` varchar(10) DEFAULT NULL,
  `termino` varchar(10) DEFAULT NULL,
  `duracion` float NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '1',
  `modalidad` int(2) NOT NULL,
  `logotipo` varchar(80) NOT NULL,
  `id_coordinador` int(5) NOT NULL,
  PRIMARY KEY (`id_actividad`),
  KEY `id_coordinador` (`id_coordinador`),
  KEY `id_tipo` (`id_tipo`),
  CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`id_coordinador`) REFERENCES `coordinadores` (`id_coordinador`),
  CONSTRAINT `actividades_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipos` (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla etroncoso.actividades: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `actividades` DISABLE KEYS */;
INSERT IGNORE INTO `actividades` (`id_actividad`, `nombre_actividad`, `id_tipo`, `inicio`, `termino`, `duracion`, `estado`, `modalidad`, `logotipo`, `id_coordinador`) VALUES
	(1, 'Futbol americano', 2, '04/15/2015', NULL, 3, 1, 2, '', 5),
	(4, 'Ajedrez', 1, '04/21/2015', NULL, 3, 1, 1, 'e:\\img\\LogoIntel.PNG', 5),
	(5, 'Club de Programacion', 3, '04/14/2015', NULL, 4, 1, 2, 'LogoIntel.PNG', 4),
	(6, 'Club de robÃ³tica', 3, '02/01/2017', NULL, 5, 1, 1, '', 5);
/*!40000 ALTER TABLE `actividades` ENABLE KEYS */;

-- Volcando estructura para tabla etroncoso.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `num_boleta` int(11) NOT NULL,
  `nombre` varchar(80) CHARACTER SET latin1 NOT NULL,
  `grupo` varchar(5) CHARACTER SET latin1 NOT NULL,
  `carrera` int(2) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '1',
  `sexo` int(2) NOT NULL,
  PRIMARY KEY (`num_boleta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla etroncoso.alumnos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT IGNORE INTO `alumnos` (`num_boleta`, `nombre`, `grupo`, `carrera`, `estado`, `sexo`) VALUES
	(2013670012, 'Mithzi Alejandra Damasco Leyva', '3CM4', 3, 1, 2),
	(2013670056, 'Abraham Torres Gutierrez', '3CM2', 1, 1, 1),
	(2013670057, 'Ernesto Jacobo Troncoso de la Riva', '3CM1', 1, 1, 1);
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;

-- Volcando estructura para tabla etroncoso.asistencia
CREATE TABLE IF NOT EXISTS `asistencia` (
  `id_registro` int(10) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(10) NOT NULL,
  `id_actividad` int(5) NOT NULL,
  `num_boleta` int(11) NOT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `num_boleta` (`num_boleta`),
  KEY `id_actividad` (`id_actividad`),
  CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`num_boleta`) REFERENCES `alumnos` (`num_boleta`),
  CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla etroncoso.asistencia: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT IGNORE INTO `asistencia` (`id_registro`, `fecha`, `id_actividad`, `num_boleta`) VALUES
	(1, '02/22/2017', 4, 2013670056),
	(2, '02/22/2017', 4, 2013670057),
	(3, '02/23/2017', 4, 2013670056),
	(4, '02/24/2017', 6, 2013670012),
	(5, '02/24/2017', 6, 2013670056);
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;

-- Volcando estructura para tabla etroncoso.configuracion
CREATE TABLE IF NOT EXISTS `configuracion` (
  `id_configuracion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `valor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_configuracion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla etroncoso.configuracion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
INSERT IGNORE INTO `configuracion` (`id_configuracion`, `nombre`, `valor`) VALUES
	(1, 'rutaImagenes', 'e:\\\\img\\\\');
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;

-- Volcando estructura para tabla etroncoso.coordinadores
CREATE TABLE IF NOT EXISTS `coordinadores` (
  `id_coordinador` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) CHARACTER SET latin1 NOT NULL,
  `usuario` varchar(20) CHARACTER SET latin1 NOT NULL,
  `contrasena` blob NOT NULL,
  `email` varchar(50) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '1',
  `privilegio` int(2) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id_coordinador`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla etroncoso.coordinadores: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `coordinadores` DISABLE KEYS */;
INSERT IGNORE INTO `coordinadores` (`id_coordinador`, `nombre`, `usuario`, `contrasena`, `email`, `estado`, `privilegio`) VALUES
	(1, 'Ernesto', 'ejtrsolo', _binary 0x5FCCF0AF4F861CFF905F7846B0692822, 'ejtrsolo@gmail.com', 1, 1),
	(2, 'Ernesto Troncoso', 'ejtr', _binary 0x5FCCF0AF4F861CFF905F7846B0692822, 'ejtrsolo@gmail.com', 1, 1),
	(3, 'Mitzi Alejandra Damasco Leyva', 'mithzi', _binary 0x5FCCF0AF4F861CFF905F7846B0692822, 'lokoernez@gmail.com', 2, 1),
	(4, 'Sandra', 'sandra', _binary 0x5FCCF0AF4F861CFF905F7846B0692822, 'santiago1@gmail.com', 2, 1),
	(5, 'Santiago', 'santiago', _binary 0x5FCCF0AF4F861CFF905F7846B0692822, 'qwerty@gmail.com', 1, 2);
/*!40000 ALTER TABLE `coordinadores` ENABLE KEYS */;

-- Volcando estructura para tabla etroncoso.listas
CREATE TABLE IF NOT EXISTS `listas` (
  `id_lista` int(5) NOT NULL AUTO_INCREMENT,
  `id_actividad` int(5) NOT NULL,
  `num_boleta` int(11) NOT NULL,
  PRIMARY KEY (`id_lista`),
  KEY `num_boleta` (`num_boleta`),
  KEY `id_actividad` (`id_actividad`),
  CONSTRAINT `listas_ibfk_1` FOREIGN KEY (`num_boleta`) REFERENCES `alumnos` (`num_boleta`),
  CONSTRAINT `listas_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla etroncoso.listas: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `listas` DISABLE KEYS */;
INSERT IGNORE INTO `listas` (`id_lista`, `id_actividad`, `num_boleta`) VALUES
	(1, 1, 2013670012),
	(2, 1, 2013670056),
	(3, 4, 2013670057),
	(4, 4, 2013670056),
	(5, 6, 2013670012),
	(6, 6, 2013670056);
/*!40000 ALTER TABLE `listas` ENABLE KEYS */;

-- Volcando estructura para tabla etroncoso.tipos
CREATE TABLE IF NOT EXISTS `tipos` (
  `id_tipo` int(3) NOT NULL AUTO_INCREMENT,
  `tipo_actividad` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla etroncoso.tipos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
INSERT IGNORE INTO `tipos` (`id_tipo`, `tipo_actividad`) VALUES
	(1, 'Conferencia'),
	(2, 'Taller'),
	(3, 'Club'),
	(4, 'Concurso'),
	(5, 'Curso');
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;

-- Volcando estructura para tabla etroncoso.trabajos
CREATE TABLE IF NOT EXISTS `trabajos` (
  `id_trabajo` int(10) NOT NULL AUTO_INCREMENT,
  `horas` int(2) NOT NULL,
  `num_boleta` int(11) NOT NULL,
  `id_actividad` int(5) NOT NULL,
  PRIMARY KEY (`id_trabajo`),
  KEY `num_boleta` (`num_boleta`),
  KEY `id_actividad` (`id_actividad`),
  CONSTRAINT `trabajos_ibfk_1` FOREIGN KEY (`num_boleta`) REFERENCES `alumnos` (`num_boleta`),
  CONSTRAINT `trabajos_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla etroncoso.trabajos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `trabajos` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
