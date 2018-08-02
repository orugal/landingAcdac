-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2018 a las 00:51:17
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `landing`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `landing`
--

CREATE TABLE `landing` (
  `idDonacion` bigint(20) NOT NULL,
  `buyerFullName` text NOT NULL,
  `documento` text NOT NULL,
  `shippingAddress` text NOT NULL,
  `shippingCity` text NOT NULL,
  `pais` text NOT NULL,
  `buyerEmail` text NOT NULL,
  `amount` text NOT NULL,
  `estadoTx` text NOT NULL,
  `transactionId` text NOT NULL,
  `reference_pol` text NOT NULL,
  `referenceCode` text NOT NULL,
  `tx_value` text NOT NULL,
  `currency` text NOT NULL,
  `descripcion` text NOT NULL,
  `entidad` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `landing`
--

INSERT INTO `landing` (`idDonacion`, `buyerFullName`, `documento`, `shippingAddress`, `shippingCity`, `pais`, `buyerEmail`, `amount`, `estadoTx`, `transactionId`, `reference_pol`, `referenceCode`, `tx_value`, `currency`, `descripcion`, `entidad`, `fecha`) VALUES
(1, 'JOSE MANUEL MAHECHA', '234234', 'CR 18 N. 86 A _ 14', 'BOGOTA', 'Colombia', 'seonetdg@gmail.com', '100000', 'TransacciÃ³n pendiente', '2e4dd16e-9f97-4004-aac2-45be0950cf52', '1052046350', 'Donacion ACDAC - 530005', '100000.00', 'COP', 'DonaciÃ³n', 'BALOTO', '2018-08-02 00:50:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `landing`
--
ALTER TABLE `landing`
  ADD PRIMARY KEY (`idDonacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `landing`
--
ALTER TABLE `landing`
  MODIFY `idDonacion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
