-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-12-2018 a las 05:23:16
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

DROP TABLE IF EXISTS `aprendiz`;
CREATE TABLE IF NOT EXISTS `aprendiz` (
  `id_aprendiz` int(10) NOT NULL AUTO_INCREMENT,
  `primer_nombre_aprendiz` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `segundo_nombre_aprendiz` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `primer_apellido_aprendiz` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `segundo_apellido_aprendiz` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_tipo_documento` int(15) DEFAULT '1',
  `documento` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tel_aprendiz` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cel_aprendiz` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_ficha` int(20) DEFAULT NULL,
  `id_resultado` int(11) DEFAULT NULL,
  `id_genero` int(15) DEFAULT NULL,
  PRIMARY KEY (`id_aprendiz`),
  KEY `id_ficha` (`id_ficha`),
  KEY `id_genero` (`id_genero`),
  KEY `id_tipo_documento` (`id_tipo_documento`) USING BTREE,
  KEY `id_resultado` (`id_resultado`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aprendiz`
--

INSERT INTO `aprendiz` (`id_aprendiz`, `primer_nombre_aprendiz`, `segundo_nombre_aprendiz`, `primer_apellido_aprendiz`, `segundo_apellido_aprendiz`, `id_tipo_documento`, `documento`, `correo`, `tel_aprendiz`, `cel_aprendiz`, `id_ficha`, `id_resultado`, `id_genero`) VALUES
(1, 'Andres ', 'Alberto', 'Domiguez ', 'De la rosa', 1, '123', 'ed@h.com', '798456', '987654', 1, 1, 1),
(6, 'Gimbo', 'Romero', 'Salazar', 'Perico', 1, '321', '12333', '123123', '432112', 3, 1, 2),
(8, 'brayan', 'stiven', 'martinez', 'asdasd', 1, '654', 'sena@sena.edu.co', '2885028', '3108629074', 1, 1, 1),
(9, 'Albeeto', 'asdasd', 'asdasd', 'asdasd', 1, '123987', 'sena@sena.edu.co', '123123', '123123', 3, 1, 1),
(10, 'BRayan', 'Steven', 'asd', 'asdfasdf', 1, '1073717073', 'sena@sena.edu.co', '123123', '123123', 1, 1, 1),
(11, 'qwer', 'qwer', 'qwer', 'qwer', 5, '3126547895', 'sena@sena.edu.co', '1234456345', '34563456', 5, 2, 1),
(12, 'Ja', 'Ja', 'Je je', 'Je je', 1, '159987', 'sena@sena.edu.co', '123123', '123123', 3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id_cargo` int(15) NOT NULL AUTO_INCREMENT,
  `cargo` char(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `cargo`) VALUES
(1, 'Administrador'),
(2, 'Apoyo de Administracion'),
(3, 'Instructor'),
(4, 'Bienestar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapa`
--

DROP TABLE IF EXISTS `etapa`;
CREATE TABLE IF NOT EXISTS `etapa` (
  `id_etapa` int(12) NOT NULL AUTO_INCREMENT,
  `etapa` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_etapa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `etapa`
--

INSERT INTO `etapa` (`id_etapa`, `etapa`) VALUES
(1, 'Lectiva'),
(2, 'Productiva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

DROP TABLE IF EXISTS `ficha`;
CREATE TABLE IF NOT EXISTS `ficha` (
  `id_ficha` int(20) NOT NULL AUTO_INCREMENT,
  `numero_ficha` char(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_programa` int(10) DEFAULT NULL,
  `id_jornada` int(15) DEFAULT '0',
  `id_trimestre` int(15) DEFAULT '0',
  `id_etapa` int(15) DEFAULT '0',
  `id_tipo_formacion` int(15) DEFAULT '0',
  PRIMARY KEY (`id_ficha`),
  KEY `id_programa` (`id_programa`),
  KEY `id_etapa` (`id_etapa`),
  KEY `id_jornada` (`id_jornada`),
  KEY `id_trimestre` (`id_trimestre`),
  KEY `id_tipo_formacion` (`id_tipo_formacion`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`id_ficha`, `numero_ficha`, `id_programa`, `id_jornada`, `id_trimestre`, `id_etapa`, `id_tipo_formacion`) VALUES
(1, '1438303', 1, 1, 5, 1, 1),
(2, '1265489', 4, 1, 5, 1, 1),
(3, '1365241', 4, 1, 3, 1, 1),
(4, '1563548', 4, 1, 5, 1, 1),
(5, '1234332', 3, 1, 5, 1, 1),
(6, '16859635', 3, 1, 2, 1, 1),
(8, '16859633', 2, 2, NULL, NULL, NULL),
(9, '168592333', 2, 2, NULL, NULL, NULL),
(10, '168259633', 2, 2, NULL, NULL, NULL),
(11, '16834234633', 2, 2, NULL, NULL, NULL),
(12, '168596333241234', 3, 2, NULL, NULL, NULL),
(13, '7894685', 3, 2, NULL, NULL, NULL),
(14, '78946852', 2, 1, NULL, NULL, NULL),
(15, '12594285', 1, 1, NULL, NULL, NULL),
(16, '125942852', 2, 2, NULL, NULL, NULL),
(17, '1259428522', 1, 1, 4, 1, 2),
(18, '12594522', 1, 1, 4, 1, 2),
(19, '125945232', 1, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `id_genero` int(10) NOT NULL AUTO_INCREMENT,
  `genero` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

DROP TABLE IF EXISTS `jornada`;
CREATE TABLE IF NOT EXISTS `jornada` (
  `id_jornada` int(11) NOT NULL AUTO_INCREMENT,
  `jornada` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_jornada`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`id_jornada`, `jornada`) VALUES
(1, 'Diurna'),
(2, 'Nocturna'),
(3, 'Fines de Semana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

DROP TABLE IF EXISTS `novedad`;
CREATE TABLE IF NOT EXISTS `novedad` (
  `id_novedad` int(11) NOT NULL AUTO_INCREMENT,
  `id_aprendiz` int(10) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_tipo_novedad` int(20) DEFAULT NULL,
  `ficha_ingresar` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `motivo` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_novedad`),
  KEY `id_tipo_novedad` (`id_tipo_novedad`),
  KEY `novedad_ibfk_1` (`id_aprendiz`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `novedad`
--

INSERT INTO `novedad` (`id_novedad`, `id_aprendiz`, `fecha`, `id_tipo_novedad`, `ficha_ingresar`, `motivo`, `descripcion`) VALUES
(1, 1, '2018-09-24', 1, NULL, 'Diferente', 'No disponible'),
(2, 6, '2018-09-24', 2, NULL, 'Se callo', 'En un paseo'),
(3, 10, '2018-11-02', 1, NULL, 'asdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_formacion`
--

DROP TABLE IF EXISTS `programa_formacion`;
CREATE TABLE IF NOT EXISTS `programa_formacion` (
  `id_programa` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_programa` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT '000000',
  PRIMARY KEY (`id_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programa_formacion`
--

INSERT INTO `programa_formacion` (`id_programa`, `nombre_programa`) VALUES
(1, 'ANALISIS Y DESARROLLO DE SISTEMAS DE INFORMACION'),
(2, 'TECNICO EN PROGRAMACION DE MULTIMEDIA'),
(3, 'DISENO E INTEGRACION DE MULTIMEDIA'),
(4, 'TECNICO EN ELABORACION DE AUDIOVISUALES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_aprendizaje`
--

DROP TABLE IF EXISTS `resultados_aprendizaje`;
CREATE TABLE IF NOT EXISTS `resultados_aprendizaje` (
  `id_resultado` int(11) NOT NULL AUTO_INCREMENT,
  `resultado` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `resultado_aprendizaje` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_resultado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `resultados_aprendizaje`
--

INSERT INTO `resultados_aprendizaje` (`id_resultado`, `resultado`, `resultado_aprendizaje`) VALUES
(1, 'A', 'Analizar'),
(2, 'B', 'Base de datos'),
(3, 'C', 'Comprar'),
(4, 'D', 'Datos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `id_tipo_documento` int(15) NOT NULL AUTO_INCREMENT,
  `tipo_documento` char(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_tipo_documento`, `tipo_documento`) VALUES
(1, 'Cedula de Ciudadania'),
(2, 'Tarjeta de Identidad'),
(3, 'Cedula de Extrangeria'),
(4, 'Pasaporte'),
(5, 'D.N.I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_formacion`
--

DROP TABLE IF EXISTS `tipo_formacion`;
CREATE TABLE IF NOT EXISTS `tipo_formacion` (
  `id_tipo_formacion` int(12) NOT NULL AUTO_INCREMENT,
  `tipo_formacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_tipo_formacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_formacion`
--

INSERT INTO `tipo_formacion` (`id_tipo_formacion`, `tipo_formacion`) VALUES
(1, 'Presencial'),
(2, 'Virtual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_novedad`
--

DROP TABLE IF EXISTS `tipo_novedad`;
CREATE TABLE IF NOT EXISTS `tipo_novedad` (
  `id_tipo_novedad` int(20) NOT NULL AUTO_INCREMENT,
  `novedad` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_tipo_novedad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_novedad`
--

INSERT INTO `tipo_novedad` (`id_tipo_novedad`, `novedad`) VALUES
(1, 'Desercion'),
(2, 'Aplazamiento'),
(3, 'Re-ingreso'),
(4, 'Retiro Voluntario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trimestre`
--

DROP TABLE IF EXISTS `trimestre`;
CREATE TABLE IF NOT EXISTS `trimestre` (
  `id_trimestre` int(12) NOT NULL AUTO_INCREMENT,
  `trimestre` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_trimestre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trimestre`
--

INSERT INTO `trimestre` (`id_trimestre`, `trimestre`) VALUES
(1, 'Primer '),
(2, 'Segundo'),
(3, 'Tercer '),
(4, 'Cuarto '),
(5, 'Quinto '),
(6, 'Sexto '),
(7, 'Septimo '),
(8, 'Octavo ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `primer_nombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `segundo_nombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `primer_apellido` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `segundo_apellido` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_tipo_documento` int(10) NOT NULL DEFAULT '1',
  `documento` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_cargo` int(20) DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrasena` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `cel_usuario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tel_usuario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_genero` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_genero` (`id_genero`),
  KEY `id_tipo_documento` (`id_tipo_documento`),
  KEY `id_cargo` (`id_cargo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `id_tipo_documento`, `documento`, `id_cargo`, `correo`, `direccion`, `contrasena`, `cel_usuario`, `tel_usuario`, `id_genero`) VALUES
(1, 'Sebas995', 'Sebas', 'Tian', 'Martinez ', 'Valencia', 1, '1000801153', 1, 'sebas@gmail.com', 'calle 19', '$2y$15$S47gc6weJWHOiR2vgZ9dGuGW7Wu5TrrRBgCxemoi9uCFy7NFc9iui', '7848952', '3218793395', 1),
(2, 'stiven10', 'brayan', 'stiven', 'martinez', 'torres', 1, '1073717073', 3, 'bas@gmail.com', 'carrera 6 a n 23-24', '$2y$15$2alv6zYJ3cU/cIOOdMHnAue2qYGNL7hy0PFdAndd6CNzlUMiA2HPi', '2885028', '3108629074', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD CONSTRAINT `aprendiz_ibfk_1` FOREIGN KEY (`id_ficha`) REFERENCES `ficha` (`id_ficha`),
  ADD CONSTRAINT `aprendiz_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`),
  ADD CONSTRAINT `aprendiz_ibfk_3` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`),
  ADD CONSTRAINT `aprendiz_ibfk_4` FOREIGN KEY (`id_resultado`) REFERENCES `resultados_aprendizaje` (`id_resultado`);

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`id_programa`) REFERENCES `programa_formacion` (`id_programa`),
  ADD CONSTRAINT `ficha_ibfk_2` FOREIGN KEY (`id_trimestre`) REFERENCES `trimestre` (`id_trimestre`),
  ADD CONSTRAINT `ficha_ibfk_3` FOREIGN KEY (`id_jornada`) REFERENCES `jornada` (`id_jornada`),
  ADD CONSTRAINT `ficha_ibfk_4` FOREIGN KEY (`id_etapa`) REFERENCES `etapa` (`id_etapa`),
  ADD CONSTRAINT `ficha_ibfk_5` FOREIGN KEY (`id_tipo_formacion`) REFERENCES `tipo_formacion` (`id_tipo_formacion`);

--
-- Filtros para la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD CONSTRAINT `novedad_ibfk_1` FOREIGN KEY (`id_aprendiz`) REFERENCES `aprendiz` (`id_aprendiz`),
  ADD CONSTRAINT `novedad_ibfk_2` FOREIGN KEY (`id_tipo_novedad`) REFERENCES `tipo_novedad` (`id_tipo_novedad`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
