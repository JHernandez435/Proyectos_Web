-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2021 a las 21:26:55
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
-- Base de datos: `ejercicio2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idempresa` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(48) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idempresa`, `nombre`, `direccion`, `telefono`, `correo`) VALUES
(1, 'Parlmack', 'cll 12 # 23-76', '4334545', 'parmalack43@gmail.com'),
(2, 'Chibus', 'cr 65 cl 34 # 3-09', '566577', 'chibuslocus@gmail.com'),
(3, 'florest', 'cr 12 # 23-09', '465575', 'florest14@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(10) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `especialidad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `empresa` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `urlimagen` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `telefono`, `especialidad`, `empresa`, `urlimagen`) VALUES
(1, 'Maicol ', 'Funquene', '6575474', 'Salud', 'Florest', 'archivos/'),
(2, 'Jhonatan ', 'Martinez', '56577', 'Sistemas', 'Chibus', 'archivos/'),
(3, 'Efrain ', 'Tarazona', '454533', 'Contabilidad', 'Parlmack', 'archivos/'),
(4, 'Jhonatan ', 'Vargas', '3545435', 'Sistemas', 'Chibus', 'archivos/'),
(5, 'Lorena', 'Suacha', '534534', 'Salud', 'Florest', 'archivos/'),
(6, 'Johana', 'Burgos', '4656464', 'Contabilidad', 'Florest', 'archivos/'),
(7, 'Felipe', 'Merchan', '5654646', 'Salud', 'Parlmack', 'archivos/'),
(8, 'Marcos ', 'Cipagauta', '6576756', 'Contabilidad', 'Chibus', 'archivos/'),
(9, 'Felipe', 'Merchan', '5654646', 'Salud', 'Parlmack', 'archivos/'),
(10, 'Marcos ', 'Cipagauta', '6576756', 'Contabilidad', 'Chibus', 'archivos/');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idempresa`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idempresa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
