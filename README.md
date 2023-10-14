# vinil'slife


## Integrante
- [Gonzalo Hellers](gonzalohellers@gmail.com)

## Temática del Trabajo Práctico Especial (TPE)

El proyecto vinil'slife se centra en el desarrollo de un gestor de discos de vinilo y autores. 
Este sistema permitirá a los usuarios llevar un registro organizado de su colección de vinilos, incluyendo información detallada sobre los discos y los artistas que los crearon.

## Descripción de la Temática

La temática de este proyecto se enfoca en la pasión por la música en formato de vinilo. 
Los vinilos son apreciados por su calidad de sonido y su valor histórico, y los coleccionistas suelen tener una variedad de discos de diferentes géneros y artistas.
vinil'slife ayudará a los usuarios a catalogar su colección, proporcionando información esencial sobre cada disco y el autor correspondiente.

## Diagrama de Entidad Relación (DER)

A continuación, se muestra el diagrama de entidad-relación (DER) que representa la estructura de la base de datos utilizada en Vinilo Manager:

![Diagrama de Entidad Relación](Diagrama de Entidad Relación.pdf)


## Codigo SQL:

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2023 a las 03:56:06
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
  `Imagen` text NOT NULL,
  `nombreAutor` text NOT NULL,
  `anioAutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `db_autor`
--

INSERT INTO `db_autor` (`id`, `Imagen`, `nombreAutor`, `anioAutor`) VALUES
(1, 'public\\images\\autores\\Supertramp.jpeg', 'Supertramp', 1969),
(2, 'public\\images\\autores\\Elo.jpg', 'Electric Light Orchestra', 1982),
(5, 'public\\images\\autores\\paulMccartney.jpg', 'Paul Mccartney', 1942),
(6, 'public\\images\\autores\\beeGees.jpeg', 'Bee Gees', 1958);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_discos`
--

CREATE TABLE `db_discos` (
  `idVin` int(11) NOT NULL,
  `imagen` text NOT NULL,
  `nombreDisco` text NOT NULL,
  `fechaDisco` int(11) NOT NULL,
  `genero` text NOT NULL,
  `idAutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `db_discos`
--

INSERT INTO `db_discos` (`idVin`, `imagen`, `nombreDisco`, `fechaDisco`, `genero`, `idAutor`) VALUES
(3, 'public\\images\\portadas\\breakFastInAmerica.jpg', 'Breakfast in America', 1979, '', 1),
(70, 'public\\images\\portadas\\pipesOfPeace.jpg', 'Pipes of Peace', 1983, '', 5),
(71, 'public\\images\\portadas\\famousLastWords.jpg', 'Famous Last Words', 1982, '', 1),
(72, 'public\\images\\portadas\\beeGeesGreatest.jpg', 'Bee Gees Greatest', 1979, '', 6),
(73, 'public\\images\\portadas\\EloGreatest.jpg', 'Elo\'s Greatest Hits', 1979, '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `pass` text NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `pass`, `rol`) VALUES
(4, 'Gonzah', '$argon2id$v=19$m=65536,t=4,p=1$WHlPUW5IS1Mwdkt3ZFVhUQ$/q+JOYMHG8h+kJCn8JP6BUZGh1leOtN8YH0nA56vJE0', 'admin'),
(6, 'Gonzalo', '$argon2id$v=19$m=65536,t=4,p=1$T2xyY0ZXMVNhQ0prMGNrdA$2/Enlt7K4paOfxIJlVU6sJXcGUDzS2JkhzF5tzKeEL8', 'usuario');

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
  ADD PRIMARY KEY (`idVin`),
  ADD KEY `idAutor` (`idAutor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `db_autor`
--
ALTER TABLE `db_autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `db_discos`
--
ALTER TABLE `db_discos`
  MODIFY `idVin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

