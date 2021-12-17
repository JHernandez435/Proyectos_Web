-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2021 a las 21:21:41
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejercicio3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idcita` int(11) NOT NULL,
  `cedula` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `edad` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `mensaje` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(80) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idcita`, `cedula`, `nombre`, `telefono`, `edad`, `email`, `mensaje`, `estado`) VALUES
(1, '1010156195', 'Lucas Peralta', '3114958798', '19', 'jhernandez.a103@misena.edu.co', 'prueba', 'activo'),
(2, '1010156168', 'lucas', '2312321', '23', 'decoracionflor@gmail.com', 'asdsadsadsa', 'espera'),
(3, '1010156168', 'holaaa', '31232', '23', 'decoracionflor@gmail.com', 'sadfdgfdgfdg', 'activo'),
(4, '1010156168', 'capo', '213213', '2131', 'decoracionflor@gmail.com', 'fdgfdgfdrtret', 'espera'),
(5, '1010156168', 'Lucas Peralta', '4234324324', '45', 'decoracionflor@gmail.com', 'fsdfsdfsdfsdf', 'espera'),
(6, '1010156168', 'Lucas Peralta', '234234', '34', 'decoracionflor@gmail.com', 'dsfsdfsdfsdf', 'espera'),
(7, '1010156168', 'Pedro Manuel', '3123213', '23', 'decoracionflor@gmail.com', 'wdsadsad', 'espera'),
(8, '1010156168', 'Juan Alarcon', '3114952766', '23', 'decoracionflor@gmail.com', 'sadsadsadsa', 'espera'),
(9, '14342324', 'holaaa', '3114952766', '34324', 'jhernandez.a103@hotmail.com', 'werwerwerwerewr', 'espera'),
(10, '1010156168', '', '213213', '45', 'decoracionflor@gmail.com', 'wqeqweqweqwe', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idcita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
