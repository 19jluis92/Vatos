-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2014 a las 18:03:08
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `carservicedb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(4, 'tsuru'),
(5, 'test'),
(6, 'Alfa Romeo'),
(7, 'Acura'),
(8, 'test2'),
(9, 'test2'),
(10, 'test2'),
(11, 'test2'),
(12, 'ferrari'),
(13, 'ferrari'),
(14, 'ferrari'),
(15, 'ferrari'),
(16, 'ferrari'),
(17, 'ferrari'),
(18, 'ferrari'),
(19, 'ferrari'),
(26, 'testk'),
(27, 'testm'),
(28, 'aaa'),
(29, 'uuu'),
(30, 'fsdf'),
(31, 'aaasda'),
(32, 'www'),
(33, 'www'),
(34, 'eee'),
(35, 'wq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bump`
--

CREATE TABLE IF NOT EXISTS `bump` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPiece` int(11) NOT NULL,
  `idSeverity` int(11) NOT NULL,
  `idInspection` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Bump_Inspection1_idx` (`idInspection`),
  KEY `fk_Bump_Piece1_idx` (`idPiece`),
  KEY `fk_Bump_Severity1_idx` (`idSeverity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartype`
--

CREATE TABLE IF NOT EXISTS `cartype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cartype`
--

INSERT INTO `cartype` (`id`, `name`) VALUES
(1, 'sedan'),
(2, 'camioneta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carworkshop`
--

CREATE TABLE IF NOT EXISTS `carworkshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `idCity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_CarWorkShop_City1_idx` (`idCity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `idState` int(11) NOT NULL,
  `Citycol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_City_State1_idx` (`idState`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(60) NOT NULL,
  `LastName` varchar(70) NOT NULL,
  `RFC` varchar(18) DEFAULT NULL,
  `Clientcol` varchar(45) DEFAULT NULL,
  `Clientcol1` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientphone`
--

CREATE TABLE IF NOT EXISTS `clientphone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lada` varchar(3) DEFAULT NULL,
  `area` varchar(5) DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Phone_Client1_idx` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientvehicle`
--

CREATE TABLE IF NOT EXISTS `clientvehicle` (
  `idClient` int(11) NOT NULL,
  `idVehicle` int(11) NOT NULL,
  PRIMARY KEY (`idClient`,`idVehicle`),
  KEY `fk_Client_has_Vehicle_Vehicle1_idx` (`idVehicle`),
  KEY `fk_Client_has_Vehicle_Client1_idx` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`id`, `Name`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `idLocation` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Department_Location1_idx` (`idLocation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `lastName` varchar(65) NOT NULL,
  `nss` varchar(45) DEFAULT NULL,
  `idCity` int(11) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `cellphone` varchar(15) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `idCarWorkShop` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Employee_User_idx` (`idUser`),
  KEY `fk_Employee_CarWorkShop1_idx` (`idCarWorkShop`),
  KEY `fk_Employee_City1_idx` (`idCity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='				' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspection`
--

CREATE TABLE IF NOT EXISTS `inspection` (
  `id` int(11) NOT NULL,
  `idService` int(11) NOT NULL,
  `mileage` decimal(10,2) NOT NULL,
  `fuel` decimal(10,2) NOT NULL,
  `inspectionDate` datetime DEFAULT NULL,
  `type` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Inspection_Service1_idx` (`idService`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `idCarWorkShop` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Location_CarWorkShop1_idx` (`idCarWorkShop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model`
--

CREATE TABLE IF NOT EXISTS `model` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `idBrand` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Model_Brand1_idx` (`idBrand`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piece`
--

CREATE TABLE IF NOT EXISTS `piece` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relocation`
--

CREATE TABLE IF NOT EXISTS `relocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relocationDate` datetime NOT NULL,
  `idEmployee` int(11) NOT NULL,
  `reason` varchar(4000) NOT NULL,
  `idDepartment` int(11) NOT NULL,
  `idService` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Relocation_Employee1_idx` (`idEmployee`),
  KEY `fk_Relocation_Department1_idx` (`idDepartment`),
  KEY `fk_Relocation_Service1_idx` (`idService`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` datetime NOT NULL,
  `endDate` datetime DEFAULT NULL,
  `idCarWorkShop` int(11) NOT NULL,
  `idVehicle` int(11) NOT NULL,
  `idEmployee` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Service_Vehicle1_idx` (`idVehicle`),
  KEY `fk_Service_CarWorkShop1_idx` (`idCarWorkShop`),
  KEY `fk_Service_Employee1_idx` (`idEmployee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `severity`
--

CREATE TABLE IF NOT EXISTS `severity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(60) NOT NULL,
  `IdCountry` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_State_County1_idx` (`IdCountry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='				' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userrole`
--

CREATE TABLE IF NOT EXISTS `userrole` (
  `idUser` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idRole`),
  KEY `fk_User_has_Role_Role1_idx` (`idRole`),
  KEY `fk_User_has_Role_User1_idx` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vin` varchar(45) NOT NULL,
  `idModel` int(11) DEFAULT NULL,
  `idColor` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `idCarType` int(11) DEFAULT NULL,
  `characteristics` varchar(4000) DEFAULT NULL,
  `plates` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Vehicle_Model1_idx` (`idModel`),
  KEY `fk_Vehicle_Color1_idx` (`idColor`),
  KEY `fk_Vehicle_CarType1_idx` (`idCarType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `workshopphone`
--

CREATE TABLE IF NOT EXISTS `workshopphone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lada` varchar(3) DEFAULT NULL,
  `area` varchar(5) DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL,
  `idCarWorkShop` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_WorkShopPhone_CarWorkShop1_idx` (`idCarWorkShop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bump`
--
ALTER TABLE `bump`
  ADD CONSTRAINT `fk_Bump_Inspection1` FOREIGN KEY (`idInspection`) REFERENCES `inspection` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bump_Piece1` FOREIGN KEY (`idPiece`) REFERENCES `piece` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bump_Severity1` FOREIGN KEY (`idSeverity`) REFERENCES `severity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carworkshop`
--
ALTER TABLE `carworkshop`
  ADD CONSTRAINT `fk_CarWorkShop_City1` FOREIGN KEY (`idCity`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_City_State1` FOREIGN KEY (`idState`) REFERENCES `state` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientphone`
--
ALTER TABLE `clientphone`
  ADD CONSTRAINT `fk_Phone_Client1` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientvehicle`
--
ALTER TABLE `clientvehicle`
  ADD CONSTRAINT `fk_Client_has_Vehicle_Client1` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Client_has_Vehicle_Vehicle1` FOREIGN KEY (`idVehicle`) REFERENCES `vehicle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk_Department_Location1` FOREIGN KEY (`idLocation`) REFERENCES `location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_Employee_CarWorkShop1` FOREIGN KEY (`idCarWorkShop`) REFERENCES `carworkshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Employee_City1` FOREIGN KEY (`idCity`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Employee_User` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inspection`
--
ALTER TABLE `inspection`
  ADD CONSTRAINT `fk_Inspection_Service1` FOREIGN KEY (`idService`) REFERENCES `service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk_Location_CarWorkShop1` FOREIGN KEY (`idCarWorkShop`) REFERENCES `carworkshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `fk_Model_Brand1` FOREIGN KEY (`idBrand`) REFERENCES `brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `relocation`
--
ALTER TABLE `relocation`
  ADD CONSTRAINT `fk_Relocation_Department1` FOREIGN KEY (`idDepartment`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Relocation_Employee1` FOREIGN KEY (`idEmployee`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Relocation_Service1` FOREIGN KEY (`idService`) REFERENCES `service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk_Service_CarWorkShop1` FOREIGN KEY (`idCarWorkShop`) REFERENCES `carworkshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Service_Employee1` FOREIGN KEY (`idEmployee`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Service_Vehicle1` FOREIGN KEY (`idVehicle`) REFERENCES `vehicle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `fk_State_County1` FOREIGN KEY (`IdCountry`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `userrole`
--
ALTER TABLE `userrole`
  ADD CONSTRAINT `fk_User_has_Role_Role1` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_Role_User1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `fk_Vehicle_CarType` FOREIGN KEY (`idCarType`) REFERENCES `cartype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vehicle_Color1` FOREIGN KEY (`idColor`) REFERENCES `color` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vehicle_Model1` FOREIGN KEY (`idModel`) REFERENCES `model` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `workshopphone`
--
ALTER TABLE `workshopphone`
  ADD CONSTRAINT `fk_WorkShopPhone_CarWorkShop1` FOREIGN KEY (`idCarWorkShop`) REFERENCES `carworkshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
