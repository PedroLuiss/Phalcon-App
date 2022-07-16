-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2022 a las 23:13:57
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phalcon_demo-app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `is_public` int(11) NOT NULL DEFAULT '0',
  `created` text COLLATE utf8_bin NOT NULL,
  `updated` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users Articles';

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `description`, `is_public`, `created`, `updated`) VALUES
(16, 7, 'Jeevan Article Update 1121', 'Jeevan Article Update 1121Jeevan Article Update 1121Jeevan Article Update 1121Jeevan Article Update 1121Jeevan Article Update 1121Jeevan Article Update 1121', 0, '1527011714', '1527056296'),
(24, 6, 'Article Title', 'Article Description Article Description Article Description Article Description ', 1, '1527143371', '1527673272'),
(25, 8, 'asdsdasda', 'sadsaddddddddddddddddsadsadddddddddddddddddddddddd', 0, '1657935876', '1657935876'),
(29, 8, 'wewe', 'weweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 0, '1658002273', '1658002273'),
(30, 8, 'errrrrrrrrrrrrrrrrrrr', 'werewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewrwerewrerwwerewr', 1, '1658002288', '1658002288');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(20) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `created_at` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `updated_at` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(27, 'erwewr', 'ewrewr', '1658003613', '1658003613'),
(29, 'werer', 'erer', '1658004141', '1658004141'),
(30, 'qwwq', 'qwwq', '1658003770', '1658003770'),
(31, 'ewew', 'werrew', '1658004123', '1658004123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `created` text NOT NULL,
  `updated` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `active`, `created`, `updated`) VALUES
(6, 'Jeevan Lal', 'jeevanlal@gmail.com', '$2y$08$VmJaVWhzd0xNY1dIdE83KuH9jrygSqPHDlFUmuw2Zq0HhqL2GptjS', 1, '1525260851', '1525260851'),
(7, 'Jeevan', 'jeevan@gmail.com', '$2y$08$NFNyUUhZb3RESlF5NDB0auxTP2W2bBQxPYnKKqZd9tPr3SVHBoJ/S', 1, '1526974958', '1526974958'),
(8, 'Pedro Rodriguez', 'peluisrodriguez2@gmail.com', '$2y$08$SjA1KzJuVVlxQ250QVdka..bDgoaJK2SOG/lssD6Rbmch2Q3UvAYu', 1, '1657935784', '1657935784'),
(9, 'pepe', 'pepe@gmail.com', '$2y$08$UFh4eVdYdXFmTTljaDZxR.JuFyvM.jQNc/2fvukjJUDs6pGwt.cMC', 1, '1657975045', '1657975045');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
