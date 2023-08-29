-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-08-2023 a las 16:01:54
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vinyls`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_autor`
--

CREATE TABLE `db_autor` (
  `id` int(11) NOT NULL,
  `nombreAutor` text NOT NULL,
  `añoAutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `db_autor`
--

INSERT INTO `db_autor` (`id`, `nombreAutor`, `añoAutor`) VALUES
(1, 'Supertramp', 1969),
(2, 'Electric Light Orchestra', 1976);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_discos`
--

CREATE TABLE `db_discos` (
  `id` int(11) NOT NULL,
  `imagen` text NOT NULL,
  `nombreDisco` text NOT NULL,
  `fechaDisco` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `db_discos`
--

INSERT INTO `db_discos` (`id`, `imagen`, `nombreDisco`, `fechaDisco`, `idAutor`) VALUES
(2, 'public\\images\\portadas\\2.jpg', 'ELO\'s Greatest Hits', 1979, 2),
(47, '', 'DSA', 1960, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `db_autor`
--
ALTER TABLE `db_autor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `db_discos`
--
ALTER TABLE `db_discos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAutor` (`idAutor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `db_autor`
--
ALTER TABLE `db_autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `db_discos`
--
ALTER TABLE `db_discos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `db_discos`
--
ALTER TABLE `db_discos`
  ADD CONSTRAINT `db_discos_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `db_autor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
