-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2022 a las 00:12:17
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juego_palabras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `puntos` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabras`
--

CREATE TABLE `palabras` (
  `id_palabra` int(3) NOT NULL,
  `nombre_palabra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `palabras`
--

INSERT INTO `palabras` (`id_palabra`, `nombre_palabra`) VALUES
(1, 'amor'),
(2, 'oreja'),
(3, 'jamon'),
(4, 'monte'),
(5, 'te'),
(6, 'rioja'),
(7, 'javier'),
(8, 'erar'),
(9, 'articulo'),
(10, 'local'),
(11, 'articulo'),
(12, 'londres'),
(13, 'restar'),
(14, 'argentina'),
(15, 'reto'),
(16, 'tolva'),
(17, 'valvula'),
(18, 'lacre'),
(19, 'cree'),
(20, 'comandancia'),
(21, 'cianuro'),
(22, 'cianuro'),
(23, 'romance'),
(24, 'nasalizare'),
(25, 'eco'),
(26, 'coro'),
(27, 'roja'),
(28, 'jarra'),
(29, 'caminan'),
(30, 'nana'),
(31, 'naranja'),
(32, 'jaula'),
(33, 'nestoriano'),
(34, 'nomade'),
(35, 'dentifrico'),
(36, 'centenar'),
(37, 'naranjal'),
(38, 'alumina'),
(39, 'naturista'),
(40, 'tacos'),
(41, 'mostaza'),
(42, 'zanahoria'),
(43, 'riada'),
(44, 'danzarin'),
(45, 'rincon'),
(46, 'daniel'),
(47, 'elemental'),
(48, 'talio'),
(49, 'liofilizado'),
(50, 'dormiremos'),
(51, 'atole'),
(52, 'leon'),
(53, 'ontario'),
(54, 'calmada'),
(55, 'dante'),
(56, 'lacon'),
(57, 'congo'),
(58, 'goma'),
(59, 'masilla'),
(60, 'llaves'),
(61, 'narrador'),
(62, 'dormiremos'),
(63, 'condenas'),
(64, 'nautica'),
(65, 'tejado'),
(66, 'dona'),
(67, 'navajo'),
(68, 'joroba'),
(69, 'basura'),
(70, 'ranas'),
(71, 'telefono'),
(72, 'nombre'),
(73, 'breton'),
(74, 'tonteria'),
(75, 'riada'),
(76, 'mostaza'),
(77, 'zara'),
(78, 'ratones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `palabras`
--
ALTER TABLE `palabras`
  ADD PRIMARY KEY (`id_palabra`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `palabras`
--
ALTER TABLE `palabras`
  MODIFY `id_palabra` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
