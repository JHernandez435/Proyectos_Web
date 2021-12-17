-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2020 a las 18:09:27
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
-- Base de datos: `productos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproductos` int(11) NOT NULL,
  `codigo` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(90) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cantidad` int(20) NOT NULL,
  `precio` int(100) NOT NULL,
  `urlimagen` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproductos`, `codigo`, `nombre`, `descripcion`, `cantidad`, `precio`, `urlimagen`) VALUES
(1, '01mause', 'mause', 'mouse logitech rgb inalambrico gaming', 20, 39000, 'archivos/mouse.png'),
(2, '01monitor', 'monitor', 'monitor logitech  4K 120fps gaming', 20, 99000, 'archivos/monitor.jpg'),
(3, '01teclado', 'teclado', ' teclado logitech rgb inalambrico gaming', 20, 56000, 'archivos/teclado.jpg'),
(4, '01camara', 'camara', ' camara 2K logitech ', 20, 58000, 'archivos/camara.jpg'),
(5, '01audifonos', 'audifonos', 'logitech  audífonos rgb inalambrico gaming', 20, 66000, 'archivos/audifonos.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproductos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
