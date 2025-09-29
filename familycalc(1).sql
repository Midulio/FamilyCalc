-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2025 a las 00:12:35
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
-- Base de datos: `familycalc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casa`
--

CREATE TABLE `casa` (
  `id_casa` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `localidad` varchar(50) DEFAULT NULL,
  `provincia` varchar(50) NOT NULL,
  `id_usuarios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `casa`
--

INSERT INTO `casa` (`id_casa`, `nombre`, `calle`, `numero`, `localidad`, `provincia`, `id_usuarios`) VALUES
(9, 'Gil', '122', 1444, 'launus', 'buenos aires', NULL),
(10, 'Arce', '333', 444, 'launus', 'buenos aires', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id_movimientos` int(11) NOT NULL,
  `importe` int(11) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `id_casa` int(11) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `id_usuarios` int(11) DEFAULT NULL,
  `estados` varchar(50) NOT NULL,
  `servicios` varchar(50) NOT NULL,
  `tipo_de_gastos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `id_casa` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `id_casa`, `nombre`, `apellido`, `sexo`) VALUES
(2, 9, 'facundo', 'arce', ''),
(5, 10, 'Joaquin', 'Gil', ''),
(6, 10, 'tizi', 'midulia ', 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `PASSWORD` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `casa`
--
ALTER TABLE `casa`
  ADD PRIMARY KEY (`id_casa`),
  ADD KEY `fk_id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id_movimientos`),
  ADD KEY `id_casa` (`id_casa`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `id_casa` (`id_casa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `casa`
--
ALTER TABLE `casa`
  MODIFY `id_casa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_movimientos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `casa`
--
ALTER TABLE `casa`
  ADD CONSTRAINT `fk_id_usuarios` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`id_casa`) REFERENCES `casa` (`id_casa`),
  ADD CONSTRAINT `movimientos_ibfk_3` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`),
  ADD CONSTRAINT `movimientos_ibfk_5` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`id_casa`) REFERENCES `casa` (`id_casa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
