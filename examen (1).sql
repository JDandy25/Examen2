-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2025 a las 19:17:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineainvestigacion`
--

CREATE TABLE `lineainvestigacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechaCreado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lineainvestigacion`
--

INSERT INTO `lineainvestigacion` (`id`, `nombre`, `estado`, `fechaCreado`) VALUES
(1, 'Ing. Sof', 1, '2025-06-11 11:31:11'),
(2, 'Redes', 1, '2025-06-11 11:31:11'),
(3, 'Gestion T.I', 1, '2025-06-11 11:31:33'),
(4, 'Robotica e I.A', 1, '2025-06-11 11:31:33'),
(5, 'Seguridad Informatica', 1, '2025-06-11 11:31:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesis`
--

CREATE TABLE `tesis` (
  `id` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `id_linea` int(11) NOT NULL,
  `resumen` varchar(128) NOT NULL,
  `objetivos` varchar(200) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `id_tesista` int(11) NOT NULL,
  `fechaCreado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tesis`
--

INSERT INTO `tesis` (`id`, `titulo`, `id_linea`, `resumen`, `objetivos`, `fechaInicio`, `fechaFin`, `estado`, `id_tesista`, `fechaCreado`) VALUES
(1, 'sassadsadas', 3, 'aaaaaaaaaaaaaaaaaa', 'bbbbbbbbbbbbbbbbb', '2025-05-30', '2025-06-14', 1, 1, '2025-06-11 11:37:43'),
(2, 'sdadasda', 1, 'sadsadsa', 'asdfghjkjhgfaASDFGHVDFSVVSD', '2025-06-01', '2025-06-19', 1, 1, '2025-06-11 12:05:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesista`
--

CREATE TABLE `tesista` (
  `id` int(11) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `nombres` varchar(64) NOT NULL,
  `dni` char(8) NOT NULL,
  `id_tipo` int(64) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechaCreado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tesista`
--

INSERT INTO `tesista` (`id`, `apellidos`, `nombres`, `dni`, `id_tipo`, `estado`, `fechaCreado`) VALUES
(1, 'pipipi', 'juan', '46546546', 4, 0, '2025-06-11 10:59:46'),
(2, 'dsdasdas', 'sdasdasda', '12345678', 3, 0, '2025-06-11 11:08:15'),
(3, 'wqdwqdqwdqw', 'wqdwdwd', '33735345', 4, 1, '2025-06-11 12:12:51'),
(4, 'asdasdsadas', 'sadsad', '14144525', 1, 1, '2025-06-11 12:13:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoescuela`
--

CREATE TABLE `tipoescuela` (
  `id` int(11) NOT NULL,
  `escuela` varchar(64) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechaCreado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipoescuela`
--

INSERT INTO `tipoescuela` (`id`, `escuela`, `estado`, `fechaCreado`) VALUES
(1, 'Ing. Sistemas', 1, '2025-06-11 10:55:02'),
(2, 'Ing. Mecanica Electrica', 1, '2025-06-11 10:55:02'),
(3, 'Ing. Mecatronica', 1, '2025-06-11 10:55:23'),
(4, 'Ing. Ciberseguridad', 1, '2025-06-11 10:55:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lineainvestigacion`
--
ALTER TABLE `lineainvestigacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tesista` (`id_tesista`),
  ADD KEY `id_linea` (`id_linea`);

--
-- Indices de la tabla `tesista`
--
ALTER TABLE `tesista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `tipoescuela`
--
ALTER TABLE `tipoescuela`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lineainvestigacion`
--
ALTER TABLE `lineainvestigacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tesis`
--
ALTER TABLE `tesis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tesista`
--
ALTER TABLE `tesista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipoescuela`
--
ALTER TABLE `tipoescuela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD CONSTRAINT `tesis_ibfk_1` FOREIGN KEY (`id_tesista`) REFERENCES `tesista` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tesis_ibfk_2` FOREIGN KEY (`id_linea`) REFERENCES `lineainvestigacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tesista`
--
ALTER TABLE `tesista`
  ADD CONSTRAINT `tesista_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipoescuela` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
