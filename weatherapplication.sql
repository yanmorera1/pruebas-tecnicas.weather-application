-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 02:40 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weatherapplication`
--
CREATE DATABASE IF NOT EXISTS `weatherapplication` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `weatherapplication`;

-- --------------------------------------------------------

--
-- Table structure for table `ciudades`
--

CREATE TABLE `ciudades` (
  `CiudadID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `PaisID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudades`
--

INSERT INTO `ciudades` (`CiudadID`, `Nombre`, `PaisID`) VALUES
(1, 'Bogota', 1),
(2, 'Medellin', 1),
(3, 'Berlin', 2),
(4, 'Paris', 3),
(5, 'Moscu', 4),
(6, 'Pekin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `configuracion`
--

CREATE TABLE `configuracion` (
  `ConfiguracionID` int(11) NOT NULL,
  `Llave` varchar(50) NOT NULL,
  `Valor` varchar(70) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configuracion`
--

INSERT INTO `configuracion` (`ConfiguracionID`, `Llave`, `Valor`, `Descripcion`) VALUES
(1, 'UsuarioAdministrador', '1', 'Id del usuario de administrador');

-- --------------------------------------------------------

--
-- Table structure for table `mensajes`
--

CREATE TABLE `mensajes` (
  `MensajeID` int(11) NOT NULL,
  `Mensaje` varchar(500) DEFAULT NULL,
  `UsuarioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mensajes`
--

INSERT INTO `mensajes` (`MensajeID`, `Mensaje`, `UsuarioID`) VALUES
(1, 'Hola', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paises`
--

CREATE TABLE `paises` (
  `PaisID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paises`
--

INSERT INTO `paises` (`PaisID`, `Nombre`) VALUES
(1, 'Colombia'),
(2, 'Alemania'),
(3, 'Francia'),
(4, 'Rusia'),
(5, 'China');

-- --------------------------------------------------------

--
-- Table structure for table `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `TipoDocumentoID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipodocumento`
--

INSERT INTO `tipodocumento` (`TipoDocumentoID`, `Nombre`) VALUES
(1, 'Cédula de ciudadanía'),
(2, 'NIT'),
(3, 'Tarjeta de identidad');

-- --------------------------------------------------------

--
-- Table structure for table `tiposusuarios`
--

CREATE TABLE `tiposusuarios` (
  `TipoUsuarioID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiposusuarios`
--

INSERT INTO `tiposusuarios` (`TipoUsuarioID`, `Nombre`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioID` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `TipoDocumentoID` int(11) NOT NULL,
  `NumeroDocumento` varchar(20) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Telefono` varchar(30) DEFAULT NULL,
  `TipoUsuarioID` int(11) NOT NULL,
  `Contrasenia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`UsuarioID`, `Nombres`, `Apellidos`, `TipoDocumentoID`, `NumeroDocumento`, `Email`, `Telefono`, `TipoUsuarioID`, `Contrasenia`) VALUES
(1, 'Yan', 'Morera', 1, '1072448076', 'yankmoca99@gmail.com', '3196404715', 1, '123456'),
(2, 'Fernando', 'Morera', 2, '1072448077', 'fernandomorera@gmail.com', '3196402715', 2, '1234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`CiudadID`);

--
-- Indexes for table `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`ConfiguracionID`);

--
-- Indexes for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`MensajeID`);

--
-- Indexes for table `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`PaisID`);

--
-- Indexes for table `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`TipoDocumentoID`);

--
-- Indexes for table `tiposusuarios`
--
ALTER TABLE `tiposusuarios`
  ADD PRIMARY KEY (`TipoUsuarioID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `CiudadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `ConfiguracionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `MensajeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paises`
--
ALTER TABLE `paises`
  MODIFY `PaisID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `TipoDocumentoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tiposusuarios`
--
ALTER TABLE `tiposusuarios`
  MODIFY `TipoUsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
