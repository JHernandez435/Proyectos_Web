-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-03-2021 a las 14:36:56
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `correo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cedula` int(150) NOT NULL,
  `telefono` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `edad` int(80) NOT NULL,
  `correo` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mensaje` varchar(800) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `cedula`, `telefono`, `edad`, `correo`, `mensaje`, `estado`) VALUES
(1, 'ana maria cipagauta', 1007305710, '3214138571', 20, 'anamariacipagauta@gmail.com', 'cita medica el 2 de abril', 'Confimado'),
(2, 'jhon', 1049396563, '3134597526', 22, 'jhon@gmail.com', 'cita medica 2 julio', 'Confimado'),
(3, 'laura', 128795, '3215879', 17, 'juan@gmail.com', 'cita medica 2 julio', 'Confimado'),
(4, 'raul', 874512, '32213', 35, 'raul@gmail.com', 'cita medica 8 julio', 'Confimado'),
(5, 'santa sofia', 9856, '36956', 35, 'ximena@gmailcom', 'cita medica 2 julio', 'Espera'),
(6, 'diego', 1005687495, '3214568596', 45, 'diego@gmail.com', 'cita odontologica', 'Espera'),
(7, 'diego', 23857695, '3115448987', 45, 'diego@gmail.com', 'cita medica 2 julio', 'Espera'),
(8, 'sara', 100875532, '325485', 25, 'juan@gmail.com', 'cita medica 2 julio', 'Espera'),
(9, 'erika', 75565522, '32568987', 85, 'erika@gmail.com', 'cita medica 4 junio', 'Espera'),
(10, 'Ana maria acosta', 1005648979, '3214138554', 26, 'alejandra@gmail.com', 'ana@gmail.com', 'Espera');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
