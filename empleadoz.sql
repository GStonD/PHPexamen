-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2020 a las 22:39:54
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empleadoz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dep`
--

CREATE TABLE `dep` (
  `puesto` int(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dep`
--

INSERT INTO `dep` (`puesto`, `descripcion`) VALUES
(1, 'SISTEMAS'),
(2, 'Mecatronica'),
(3, 'Bioquimica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emp`
--

CREATE TABLE `emp` (
  `clave_empleado` int(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido_paterno` varchar(100) NOT NULL,
  `apellido_materno` varchar(100) NOT NULL,
  `fecha_nacimiento` varchar(100) NOT NULL,
  `departamento` int(50) NOT NULL,
  `sueldo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `emp`
--

INSERT INTO `emp` (`clave_empleado`, `nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `departamento`, `sueldo`) VALUES
(40, 'Jassie', 'Aguilar ', 'Zazueta', '1979-09-29', 1, '40,000.00'),
(41, 'Edwin', ' Gandarilla ', 'Aguilar', '1992-01-01', 2, '60,000.00 ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dep`
--
ALTER TABLE `dep`
  ADD PRIMARY KEY (`puesto`);

--
-- Indices de la tabla `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`clave_empleado`),
  ADD KEY `fk_empleado_departamento` (`departamento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `emp`
--
ALTER TABLE `emp`
  MODIFY `clave_empleado` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `emp`
--
ALTER TABLE `emp`
  ADD CONSTRAINT `fk_empleado_departamento` FOREIGN KEY (`departamento`) REFERENCES `dep` (`puesto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
