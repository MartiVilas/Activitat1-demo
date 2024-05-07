-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-05-2024 a las 11:24:07
-- Versión del servidor: 5.7.40-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fct`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EMPRESA`
--

CREATE TABLE `EMPRESA` (
  `emp_id` int(11) NOT NULL,
  `emp_nom` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `emp_ubicacio` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `emp_sector` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `emp_descripcio` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `EMPRESA`
--

INSERT INTO `EMPRESA` (`emp_id`, `emp_nom`, `emp_ubicacio`, `emp_sector`, `emp_descripcio`) VALUES
(3, 'Empresa C', 'Ubicación C', 'Sector C', 'Descripción de la Empresa C'),
(4, 'Empresa A', 'Ubicación A', 'Sector A', 'Descripción de la Empresa A'),
(5, 'Empresa B', 'Ubicación B', 'Sector B', 'Descripción de la Empresa B'),
(6, 'Empresa C', 'Ubicación C', 'Sector C', 'Descripción de la Empresa C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARI`
--

CREATE TABLE `USUARI` (
  `usu_mail` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `usu_password` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VALORACIO`
--

CREATE TABLE `VALORACIO` (
  `val_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `usu_mail` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `val_puntuacio` decimal(3,2) DEFAULT NULL,
  `val_comentari` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `VALORACIO`
--

INSERT INTO `VALORACIO` (`val_id`, `emp_id`, `usu_mail`, `val_puntuacio`, `val_comentari`) VALUES
(1, 1, 'usuario1@example.com', '4.50', 'Comentario de valoración para Empresa A'),
(2, 2, 'usuario2@example.com', '3.80', 'Comentario de valoración para Empresa B'),
(3, 3, 'usuario3@example.com', '5.00', 'Comentario de valoración para Empresa C');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `EMPRESA`
--
ALTER TABLE `EMPRESA`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indices de la tabla `USUARI`
--
ALTER TABLE `USUARI`
  ADD PRIMARY KEY (`usu_mail`);

--
-- Indices de la tabla `VALORACIO`
--
ALTER TABLE `VALORACIO`
  ADD PRIMARY KEY (`val_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `EMPRESA`
--
ALTER TABLE `EMPRESA`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `VALORACIO`
--
ALTER TABLE `VALORACIO`
  MODIFY `val_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;