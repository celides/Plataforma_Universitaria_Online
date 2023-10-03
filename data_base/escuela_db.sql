-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-09-2023 a las 19:52:46
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: 'escuela_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_materia`
--

DROP TABLE IF EXISTS `alumno_materia`;
CREATE TABLE IF NOT EXISTS `alumno_materia` (
  `id_am` int NOT NULL AUTO_INCREMENT,
  `alumno_id` int NOT NULL,
  `materia_id` int NOT NULL,
  `calificacion` float DEFAULT NULL,
  PRIMARY KEY (`id_am`),
  KEY `alumno_materia_fk0` (`alumno_id`),
  KEY `alumno_materia_fk1` (`materia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

DROP TABLE IF EXISTS `maestros`;
CREATE TABLE IF NOT EXISTS `maestros` (
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_rol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro_materia`
--

DROP TABLE IF EXISTS `maestro_materia`;
CREATE TABLE IF NOT EXISTS `maestro_materia` (
  `id_mm` int NOT NULL AUTO_INCREMENT,
  `maestro_id` int DEFAULT NULL,
  `materia_id` int DEFAULT NULL,
  PRIMARY KEY (`id_mm`),
  KEY `maestro_materia_fk0` (`maestro_id`),
  KEY `maestro_materia_fk1` (`materia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestro_materia`
--

INSERT INTO `maestro_materia` (`id_mm`, `maestro_id`, `materia_id`) VALUES
(6, 24, 7),
(7, 25, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_materia`
--

DROP TABLE IF EXISTS `nombre_materia`;
CREATE TABLE IF NOT EXISTS `nombre_materia` (
  `id_materia` int NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_materia`),
  UNIQUE KEY `nombre_materia` (`nombre_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nombre_materia`
--

INSERT INTO `nombre_materia` (`id_materia`, `nombre_materia`) VALUES
(18, ''),
(16, 'Artistica'),
(14, 'Ciencias de la Tierra'),
(15, 'Idiomas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'admin'),
(2, 'maestro'),
(3, 'alumno');



DROP TABLE IF EXISTS `usuarios_datos`;
CREATE TABLE IF NOT EXISTS `usuarios_datos` (
  `id_ud` int NOT NULL AUTO_INCREMENT,
  `dni` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_rol` int NOT NULL,
  PRIMARY KEY (`id_ud`),
  KEY `usuarios_datos_fk0` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `usuarios_datos` (`id_ud`, `dni`, `nombre`, `apellidos`, `direccion`, `fecha_nacimiento`, `id_rol`) VALUES
(1, 0, 'robert', 'robert', 'robert', '2001-12-20', 1),
(9, 0, 'juan', 'juan', 'juan', '0000-00-00', 2),
(10, 0, 'adri', 'adri', 'adri', '0000-00-00', 2),
(12, 0, 'liza', 'liza', 'liza', '0000-00-00', 2);

-- --------------------------------------------------------


DROP TABLE IF EXISTS `usuarios_login`;
CREATE TABLE IF NOT EXISTS `usuarios_login` (
  `id_ul` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `datos_id` int NOT NULL,
  PRIMARY KEY (`id_ul`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `datos_id` (`datos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `usuarios_login` (`id_ul`, `email`, `password`, `datos_id`) VALUES
(1, 'admin@admin', '3333', 1),
(2, 'juan@juan', '$2y$10$WdvL2F5X5kmkTax/BzYM/.ajMQ35kkf/yFJLqVSHeyBmXBo0MpZr.', 9),
(4, 'adri@adri', '$2y$10$IjFUa9AoSFvJd/7C.iwuF..Lv1UrxATnZ28yDhtVbzd8GG5IpWdb.', 10),
(6, 'liza@liza', '$2y$10$T4DStRu/PQhPbvAi.gYm4O9M6tGxuynzjY2LLfDl86AobOBg6ieEm', 12);


ALTER TABLE `alumno_materia`
  ADD CONSTRAINT `alumno_materia_fk0` FOREIGN KEY (`alumno_id`) REFERENCES `usuarios_datos` (`id_ud`),
  ADD CONSTRAINT `alumno_materia_fk1` FOREIGN KEY (`materia_id`) REFERENCES `nombre_materia` (`id_materia`);


ALTER TABLE `maestro_materia`
  ADD CONSTRAINT `maestro_materia_fk0` FOREIGN KEY (`maestro_id`) REFERENCES `usuarios_datos` (`id_ud`),
  ADD CONSTRAINT `maestro_materia_fk1` FOREIGN KEY (`materia_id`) REFERENCES `nombre_materia` (`id_materia`);


ALTER TABLE `usuarios_datos`
  ADD CONSTRAINT `usuarios_datos_fk0` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);


ALTER TABLE `usuarios_login`
  ADD CONSTRAINT `usuarios_login_fk0` FOREIGN KEY (`datos_id`) REFERENCES `usuarios_datos` (`id_ud`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
