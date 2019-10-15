-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2019 a las 02:32:46
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpintegrador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escritores`
--

CREATE TABLE `escritores` (
  `IdEscritor` int(11) NOT NULL,
  `Nombre` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `Edad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `escritores`
--

INSERT INTO `escritores` (`IdEscritor`, `Nombre`, `Edad`) VALUES
(1, 'José Lius Borges', 98),
(2, 'Gabriel García Márquez', 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `IdNoticia` int(11) NOT NULL,
  `Título` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Subtitulo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Noticia-Desarrollo` text COLLATE latin1_spanish_ci NOT NULL,
  `Tema` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `IdEscritor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Usuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `Pass` varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `escritores`
--
ALTER TABLE `escritores`
  ADD PRIMARY KEY (`IdEscritor`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`IdNoticia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `escritores`
--
ALTER TABLE `escritores`
  MODIFY `IdEscritor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `IdNoticia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
