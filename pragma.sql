-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2025 a las 19:10:23
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pragma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accounts`
--

CREATE TABLE `accounts` (
  `IdAccount` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contrasena` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `accounts`
--

INSERT INTO `accounts` (`IdAccount`, `Email`, `Contrasena`) VALUES
(1, 'nose', '1234aeiou');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aerolineas`
--

CREATE TABLE `aerolineas` (
  `IdAerolinea` int(11) NOT NULL,
  `Descripcion` varchar(30) NOT NULL,
  `Ubicacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviones`
--

CREATE TABLE `aviones` (
  `IdAvion` int(11) NOT NULL,
  `Capacidad` int(11) NOT NULL,
  `Tamaño` char(10) NOT NULL,
  `Marca` varchar(30) NOT NULL,
  `IdAerolinea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajeros`
--

CREATE TABLE `pasajeros` (
  `IdPasajero` int(11) NOT NULL,
  `IdAccount` int(11) DEFAULT NULL,
  `NombreCompleto` varchar(50) NOT NULL,
  `Telefono` mediumint(9) NOT NULL,
  `DocumentoIdentidad` int(11) NOT NULL,
  `Genero` char(20) NOT NULL,
  `TipoDocumento` char(20) NOT NULL,
  `FechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `IdReserva` int(11) NOT NULL,
  `IdVuelo` int(11) NOT NULL,
  `IdAccount` int(11) NOT NULL,
  `PrecioTotal` int(10) NOT NULL,
  `FechaReserva` datetime NOT NULL DEFAULT current_timestamp(),
  `EstadoPago` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_pasajeros`
--

CREATE TABLE `reservas_pasajeros` (
  `IdReserva` int(11) NOT NULL,
  `IdPasajero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `IdServicio` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sillas`
--

CREATE TABLE `sillas` (
  `IdSilla` int(11) NOT NULL,
  `IdAvion` int(11) NOT NULL,
  `IdTipoSilla` int(11) NOT NULL,
  `Disponible` tinyint(1) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposillas`
--

CREATE TABLE `tiposillas` (
  `IdTipoSilla` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `IdVuelo` int(11) NOT NULL,
  `FechaSalida` datetime NOT NULL,
  `FechaVuelta` datetime NOT NULL,
  `PrecioIda` int(10) NOT NULL,
  `PrecioVuelta` int(10) NOT NULL,
  `Destino` varchar(100) NOT NULL,
  `Origen` varchar(100) NOT NULL,
  `IdAvion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos_servicios`
--

CREATE TABLE `vuelos_servicios` (
  `IdVuelo` int(11) NOT NULL,
  `IdServicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`IdAccount`);

--
-- Indices de la tabla `aerolineas`
--
ALTER TABLE `aerolineas`
  ADD PRIMARY KEY (`IdAerolinea`);

--
-- Indices de la tabla `aviones`
--
ALTER TABLE `aviones`
  ADD PRIMARY KEY (`IdAvion`),
  ADD KEY `IdAerolinea` (`IdAerolinea`);

--
-- Indices de la tabla `pasajeros`
--
ALTER TABLE `pasajeros`
  ADD PRIMARY KEY (`IdPasajero`),
  ADD KEY `IdAccount` (`IdAccount`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`IdReserva`),
  ADD KEY `IdVuelo` (`IdVuelo`);

--
-- Indices de la tabla `reservas_pasajeros`
--
ALTER TABLE `reservas_pasajeros`
  ADD PRIMARY KEY (`IdReserva`,`IdPasajero`),
  ADD KEY `IdPasajero` (`IdPasajero`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`IdServicio`);

--
-- Indices de la tabla `sillas`
--
ALTER TABLE `sillas`
  ADD PRIMARY KEY (`IdSilla`),
  ADD KEY `IdAvion` (`IdAvion`),
  ADD KEY `IdTipoSilla` (`IdTipoSilla`);

--
-- Indices de la tabla `tiposillas`
--
ALTER TABLE `tiposillas`
  ADD PRIMARY KEY (`IdTipoSilla`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`IdVuelo`),
  ADD KEY `IdAvion` (`IdAvion`);

--
-- Indices de la tabla `vuelos_servicios`
--
ALTER TABLE `vuelos_servicios`
  ADD PRIMARY KEY (`IdVuelo`,`IdServicio`),
  ADD KEY `IdServicio` (`IdServicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accounts`
--
ALTER TABLE `accounts`
  MODIFY `IdAccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `aerolineas`
--
ALTER TABLE `aerolineas`
  MODIFY `IdAerolinea` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aviones`
--
ALTER TABLE `aviones`
  MODIFY `IdAvion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pasajeros`
--
ALTER TABLE `pasajeros`
  MODIFY `IdPasajero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `IdReserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `IdServicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sillas`
--
ALTER TABLE `sillas`
  MODIFY `IdSilla` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiposillas`
--
ALTER TABLE `tiposillas`
  MODIFY `IdTipoSilla` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `IdVuelo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aviones`
--
ALTER TABLE `aviones`
  ADD CONSTRAINT `aviones_ibfk_1` FOREIGN KEY (`IdAerolinea`) REFERENCES `aerolineas` (`IdAerolinea`);

--
-- Filtros para la tabla `pasajeros`
--
ALTER TABLE `pasajeros`
  ADD CONSTRAINT `pasajeros_ibfk_1` FOREIGN KEY (`IdAccount`) REFERENCES `accounts` (`IdAccount`),
  ADD CONSTRAINT `pasajeros_ibfk_2` FOREIGN KEY (`IdAccount`) REFERENCES `accounts` (`IdAccount`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`IdVuelo`) REFERENCES `vuelos` (`IdVuelo`);

--
-- Filtros para la tabla `reservas_pasajeros`
--
ALTER TABLE `reservas_pasajeros`
  ADD CONSTRAINT `reservas_pasajeros_ibfk_1` FOREIGN KEY (`IdPasajero`) REFERENCES `pasajeros` (`IdPasajero`),
  ADD CONSTRAINT `reservas_pasajeros_ibfk_2` FOREIGN KEY (`IdReserva`) REFERENCES `reservas` (`IdReserva`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sillas`
--
ALTER TABLE `sillas`
  ADD CONSTRAINT `sillas_ibfk_1` FOREIGN KEY (`IdAvion`) REFERENCES `aviones` (`IdAvion`),
  ADD CONSTRAINT `sillas_ibfk_2` FOREIGN KEY (`IdTipoSilla`) REFERENCES `tiposillas` (`IdTipoSilla`);

--
-- Filtros para la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD CONSTRAINT `vuelos_ibfk_1` FOREIGN KEY (`IdAvion`) REFERENCES `aviones` (`IdAvion`);

--
-- Filtros para la tabla `vuelos_servicios`
--
ALTER TABLE `vuelos_servicios`
  ADD CONSTRAINT `vuelos_servicios_ibfk_1` FOREIGN KEY (`IdVuelo`) REFERENCES `vuelos` (`IdVuelo`),
  ADD CONSTRAINT `vuelos_servicios_ibfk_2` FOREIGN KEY (`IdServicio`) REFERENCES `servicios` (`IdServicio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
