-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2022 a las 08:39:09
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_login_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'hola@email.com', '$2y$10$3dYVkyudPJWn/DDrzQ6wZO8'),
(2, 'jota@email.com', '$2y$10$VwpiCltavNTCqF5UZCe/6.H'),
(39, 'fffffff', '$2y$10$PcdC66AUmT929tCyNCQTnu2'),
(40, 'aaa@email.com', '$2y$10$SAe2TFBGbYoyu1x/zcBFxOr'),
(41, 'asdas@email.com', '$2y$10$oKbpEVj0VAvUkjxFBnD8s.a'),
(42, 'asdas@email.com', '$2y$10$5U1LzB.eRdXlrGnSSXBrx.I'),
(43, 'asdas@email.com', '$2y$10$.33.M./XPvj5EQgoJd3HBOP'),
(44, 'jota@email.com', '$2y$10$DA5dzHmku0DfEfSKTfdDcuQ'),
(45, 'hola@como.estas.com', '$2y$10$jZx.RUpQuuuYAzQR4nkbkeL'),
(46, 'hola@como.estas.com', '$2y$10$oo4IAgRaLM3fSYcnC0Q08uG'),
(47, 'hola@como.estas.com', '$2y$10$8NcvKL0vY4RPY7bw1x72nub'),
(48, 'hola@email.com', '$2y$10$GwwMljp1SaBxEpOSVYDC7e6'),
(49, 'hola@email.com', '$2y$10$Q.g8/ikJSBcPPz1mlUSFTea'),
(50, 'hola@email.com', '$2y$10$EMJgCZFqJOskAut/071MkOc'),
(51, 'hola@email.com', '$2y$10$qTyeazdMk3U91M7Hk6wVfO7'),
(52, 'prueba_uno@email.com', '$2y$10$Ov6yPvGpCtHkYrj3quME7.a'),
(53, 'prueba_uno@email.com', '$2y$10$eV8ccC9tDOquuLl0RTXb2.p'),
(54, 'hola@email.com', '$2y$10$OWR4EeOzDSIHEDD0ugHF1O8'),
(55, 'hola@email.com', '$2y$10$9/D2UwoBwgyVKqsO8kLORuc'),
(56, 'jota@email.com', '$2y$10$767XtUR.MZum7b5nB09YUuk'),
(57, 'jota@email.com', '$2y$10$kB2Vq85OFNjgfHhEz5jvJeU'),
(58, 'jota@email.com', '$2y$10$RK.QM/SJpEJntZBKZkhCkuK'),
(59, 'jota@emial.com', '$2y$10$5sB1lRU4nIR3VJiqE2tJa.4'),
(60, 'jota@email.com', '$2y$10$.xu.YOZgJ4jWHYaAvtJW8um');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
