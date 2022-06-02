-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: db5000128127.hosting-data.io
-- Tiempo de generación: 18-07-2019 a las 16:50:19
-- Versión del servidor: 5.7.25-log
-- Versión de PHP: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbs122647`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ESPtable2`
--

CREATE TABLE `ESPtable2` (
  `id` int(5) NOT NULL,
  `PASSWORD` int(5) NOT NULL,
  `RECEIVED_BOOL1` int(1) NOT NULL,
  `RECEIVED_BOOL2` int(1) NOT NULL,
  `RECEIVED_BOOL3` int(1) NOT NULL,
  `RECEIVED_BOOL4` int(1) NOT NULL,
  `RECEIVED_BOOL5` int(1) NOT NULL,
  `RECEIVED_BOOL6` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ESPtable2`
--

INSERT INTO `ESPtable2` (`id`, `PASSWORD`, `RECEIVED_BOOL1`, `RECEIVED_BOOL2`, `RECEIVED_BOOL3`, `RECEIVED_BOOL4`, `RECEIVED_BOOL5`, `RECEIVED_BOOL6`) VALUES
(99999, 12345, 0, 0, 0, 0, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ESPtable2`
--
ALTER TABLE `ESPtable2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ESPtable2`
--
ALTER TABLE `ESPtable2`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE EVENT reset
    ON SCHEDULE
      EVERY 1 MIN
        DO
update `RECEIVED_BOOL1_2`
set state=0
where time < date_sub(now(),interval 1 MIN) 
  and (state=1) ;

CREATE EVENT IF NOT EXISTS `update_status_event`
ON SCHEDULE
    EVERY 19 DAY_HOUR
    COMMENT 'Update the status every days at 19:00'
    DO
        UPDATE `order`
        SET `order`.`status` = 'complete'
        WHERE `order`.`status` <> 'complete'
        AND TIMESTAMPDIFF('DAY', `order`.`date`, now()) >= 3;