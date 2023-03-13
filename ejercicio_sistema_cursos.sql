-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-03-2023 a las 07:16:51
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejercicio_sistema_cursos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `legajo` varchar(10) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `modalidad` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `legajo`, `descripcion`, `modalidad`) VALUES
(12, 'Curso de Bootstrap ', 'C-1', 'El curso de Bootstrap te enseñará a utilizar uno de los frameworks más populares para diseño web, permitiéndote crear páginas web modernas y responsive de forma rápida y sencilla.', 'GRUPAL'),
(13, 'Curso de JavaScript', 'C-2', 'El curso de JavaScript te permitirá aprender uno de los lenguajes de programación más importantes para el desarrollo web. Aprenderás a utilizar JavaScript para crear interactividad en tus sitios web, mediante el uso de eventos, manipulación del DOM, validación de formularios y mucho más. ', 'GRUPAL'),
(14, 'Curso de PHP', 'C-3', 'El curso de PHP te enseñará a utilizar uno de los lenguajes de programación más utilizados en el desarrollo web del lado del servidor. Aprenderás a utilizar PHP para crear aplicaciones web dinámicas, interconectar con bases de datos, manipular archivos y mucho más. ', 'GRUPAL'),
(15, 'Curso de Python', 'C-4', 'Aprende uno de los lenguajes de programación más populares del momento, utilizado en ciencia de datos, inteligencia artificial, desarrollo web y mucho más. ', 'INDIVIDUAL'),
(16, 'Curso de Java', 'C-5', 'Aprende uno de los lenguajes de programación más utilizados en el mundo empresarial. En este curso aprenderás los fundamentos del lenguaje Java, a crear aplicaciones con interfaz gráfica de usuario, a manipular bases de datos, y a utilizar frameworks.', 'INDIVIDUAL'),
(17, 'Curso de SQL ', 'C-6', 'Aprende uno de los lenguajes de consulta más importantes para el manejo de bases de datos. En este curso aprenderás los fundamentos del lenguaje SQL, a crear tablas, a insertar y actualizar datos, a hacer consultas complejas y a manipular bases de datos relacionales.', 'INDIVIDUAL'),
(18, 'Curso de C++', 'C-7', 'Aprende uno de los lenguajes de programación más poderosos y utilizados en la industria. En este curso aprenderás los fundamentos del lenguaje C++, a manejar punteros, a crear estructuras de datos complejas, y a utilizar técnicas avanzadas de programación orientada a objetos.', 'INDIVIDUAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dni` int NOT NULL,
  `razonSocial` varchar(200) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `edad` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

DROP TABLE IF EXISTS `registros`;
CREATE TABLE IF NOT EXISTS `registros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idPersona` int NOT NULL,
  `idCurso` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_registro_persona` (`idPersona`),
  KEY `fk_registro_curso` (`idCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `fk_registro_curso` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_registro_persona` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
