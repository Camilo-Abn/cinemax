-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2022 a las 20:18:29
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `portada` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `director` text NOT NULL,
  `reparto` text NOT NULL,
  `sinopsis` text NOT NULL,
  `duracion` int(11) NOT NULL,
  `fechas` datetime NOT NULL,
  `precio` int(11) NOT NULL,
  `asientos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `portada`, `titulo`, `director`, `reparto`, `sinopsis`, `duracion`, `fechas`, `precio`, `asientos`) VALUES
(1, 'img/jurassic.jpg', 'Jurassic World Dominio', 'Colin Trevorrow', 'Jeff Goldblum,Chris Pratt,Bryce Dallas Howard,Laura Dern', 'Dirigida por Colin Trevorrow, el guionista de la saga de Jurassic World, esta nueva entrega transcurre cuatro años después de la destrucción de Isla Nublar. Ahora, los dinosaurios conviven – y cazan – con los seres humanos en todo el mundo. Este frágil equilibrio cambiará el futuro y decidirá, de una vez por todas, si los seres humanos seguirán en la cúspide de los depredadores en un planeta que comparten.', 147, '2022-06-27 08:00:00', 3500, '0,0,0,0,0,0,0,0,0,0,0,\r\n0,0,0,0,0,0,0,1,0,0,0,\r\n0,0,0,0,0,0,0,0,0,0,0,\r\n0,0,0,0,0,0,0,0,0,0,0,\r\n0,0,0,0,0,0,0,0,0,0,0,\r\n0,0,0,0,0,0,0,0,0,0,0'),
(2, 'img/topgun.jpg', 'TOP GUN Maverick', 'Joseph Kosinski', 'Tom Cruise, Jennifer Connelly, Miles Teller', 'Después de más de 30 años de servicio como uno de los mejores aviadores de la Marina, Pete \"Maverick\" Mitchell (Tom Cruise) está donde pertenece, emprendiendo su carrera como un valiente piloto de pruebas y esquivando el avance de rango que lo dejaría en tierra. Cuando se encuentra entrenando un grupo de graduados de TOPGUN para una misión especial que ningún piloto vivo ha podido ver, Maverick se encuentra con el teniente Bradley Bradshaw o también conocido como \"Rooster\", el hijo del difunto amigo de Maverick y Oficial de intercepción de radar, el tiente Nick Bradshaw \"Goose\". Enfrentado a un futuro incierto y luchando con los fantasmas de su pasado, Maverick se ve envuelto en una lucha con sus miedos más profundos que terminan llevándolo a una misión que exige el máximo sacrificio de aquellos que serán elegidos para volarla.', 131, '2022-06-29 19:00:00', 3500, '0,0,0,0,0,0,0,0,0,0,0,\r\n0,0,0,0,0,0,0,0,0,0,0,\r\n0,0,0,0,0,0,0,0,0,0,0,\r\n0,0,0,0,0,0,0,0,0,0,0,\r\n0,0,0,0,0,0,0,0,0,0,0,\r\n0,0,0,0,0,0,0,0,0,0,0'),
(5, 'img/ds.jpg', 'Doctor Strange en el MdlL', 'Sam Raimi', 'Chiwetel Ejiofor,Benedict Cumberbatch,Elizabeth Olsen,Benedict Wong,Xochitl Gomez,Rachel McAdams', 'En DOCTOR STRANGE EN EL MULTIVERSO DE LA LOCURA de Marvel Studios, el Universo Cinematográfico de Marvel (MCU por sus siglas en inglés) se adentra  en el Multiverso y amplía sus límites más que nunca. El film presenta un viaje a lo desconocido con Doctor Strange, quien, con la ayuda de aliados místicos nuevos y otros ya conocidos por la audiencia, atraviesa las alucinantes y peligrosas realidades alternativas del Multiverso para enfrentarse a un nuevo y misterioso adversario.', 127, '2022-06-27 15:24:00', 4000, '0,0,0,0,0,0,0,0,0,0,0,\r\n                            0,0,0,0,0,0,0,0,0,0,0,\r\n                            0,0,0,0,0,0,0,0,0,0,0,\r\n                            0,0,0,0,0,0,0,0,0,0,0,\r\n                            0,0,0,0,0,0,0,0,0,0,0,\r\n                            0,0,0,0,0,0,0,0,0,0,0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
