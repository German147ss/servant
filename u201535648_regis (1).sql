
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-08-2018 a las 09:38:06
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u201535648_regis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile1` varchar(15) NOT NULL,
  `mobile2` varchar(15) NOT NULL,
  `password` char(60) NOT NULL,
  `role` char(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `local` varchar(250) NOT NULL,
  `last_login` datetime NOT NULL,
  `last_seen` datetime NOT NULL,
  `last_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_status` char(1) NOT NULL DEFAULT '1',
  `deleted` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile1` (`mobile1`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `mobile1`, `mobile2`, `password`, `role`, `created_on`, `local`, `last_login`, `last_seen`, `last_edited`, `account_status`, `deleted`) VALUES
(1, 'Admin', 'Demo', 'demo@1410inc.xyz', '08021111111', '07032222222', '$2y$10$xv9I14OlR36kPCjlTv.wEOX/6Dl7VMuWCl4vCxAVWP1JwYIaw4J2C', 'Super', '2017-01-04 22:19:16', '', '2018-08-04 07:39:19', '2018-08-04 06:10:01', '2018-08-04 07:39:19', '1', '0'),
(18, 'Victoria', 'Bravo', 'servantindependencia@gmail.com', '43008414', '', '$2y$10$s.1MjxJSgWd3wPMSVqTQK.pjKUJlPJydTgaBZRm49K.tF3K8F0v0G', 'Basic', '2018-08-02 19:56:19', 'independencia', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-08-02 19:56:19', '1', '0'),
(16, 'Elena', 'Peralta', 'servantargerich@gmail.com', '43002282', '', '$2y$10$efE0r1IyLhJmAHXBXghYhuTTxCwwTZ9EyutHPBkNmnYtePcZRisGu', 'Basic', '2018-08-02 19:49:38', 'brown2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-08-02 19:49:38', '1', '0'),
(17, 'Miguel', 'Posada', 'servantpatricios@gmail.com', '21037383', '', '$2y$10$3kTcNytwvkIjf8CAYyNIA.vL.bhOvucsqx4JMQm03kMKyZ3FtK3de', 'Basic', '2018-08-02 19:53:57', 'patricios', '2018-08-02 21:39:01', '2018-08-02 22:20:32', '2018-08-02 22:20:32', '1', '0'),
(5, 'Diego', 'Arango', 'servantelectronic@hotmail.com', '541010101010', '', '$2y$10$GmLYVjTyCAdpgGjiaQ80M.Ub8Y52LazNCeSMUZWE5JjBDIssHWIri', 'Super', '2018-07-24 16:38:53', 'independencia', '2018-08-01 20:42:33', '2018-07-31 20:23:20', '2018-08-01 20:42:33', '1', '0'),
(13, 'Lucas', 'Azara', 'servantbrown@gmail.com', '53000585', '', '$2y$10$dLbhKFmy1kMD7vK/cOK.Cut58/M49sQ2Gcb.0y4doKEM.6CUK04vy', 'Basic', '2018-08-01 21:58:58', 'brown', '2018-08-02 19:28:34', '2018-08-02 19:37:04', '2018-08-02 19:47:43', '1', '0'),
(12, 'David', 'Dueño', 'servantelectronic@gmail.com', '1234567890', '1234567890', '$2y$10$72Tn6CsrvfG2u7NX.5CBO.40CKROhsT7JfP13tNUIFEjLvKARWrci', 'Super', '2018-08-01 20:30:07', '', '2018-08-03 20:53:56', '2018-08-03 21:21:49', '2018-08-03 21:21:49', '1', '0'),
(19, 'Preasda', 'Asdasd', 'prueba@gmail.com', '123456789', '', '$2y$10$KpySta8hwXLVkT4HJ2Zb3O6fsHlx4/JjY9VAq9HR1blqsVmSVWXh6', 'Super', '2018-08-03 04:12:39', 'rincon', '2018-08-04 03:41:07', '0000-00-00 00:00:00', '2018-08-04 03:41:07', '1', '0'),
(22, 'Asdasd', 'Asdas', '123@gmail.com', '123111111', '', '$2y$10$CvrVi7LecWqIPgGghOAKNeqAaw0mQjW2WRZU5h6JCgjonVpT4HPXq', 'Basic', '2018-08-04 03:31:24', 'patricios', '2018-08-04 06:11:48', '2018-08-04 07:53:41', '2018-08-04 07:53:41', '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  `address` varchar(250) COLLATE utf8_bin NOT NULL,
  `mobile` int(250) NOT NULL,
  `dni` int(250) NOT NULL,
  `cp` int(250) NOT NULL,
  `customer_ref` varchar(250) COLLATE utf8_bin NOT NULL,
  `customer_id` varchar(250) COLLATE utf8_bin NOT NULL,
  `i_points` int(250) NOT NULL,
  `group_points` int(250) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `address`, `mobile`, `dni`, `cp`, `customer_ref`, `customer_id`, `i_points`, `group_points`, `created_on`) VALUES
(0, 'DEFAULT', 'DEFAULT', 'DEFAULT@DEAFULT', 'DEAFULT', 1234567890, 1234567890, 123, 'S0', 'S0', 0, 0, '0000-00-00 00:00:00'),
(14, 'Ariel', 'Torrez', 'tariel634@gmail.com', 'Calle 889 N°3938, Solano, Bs As', 1128946345, 37052718, 0, 'S1', 'S2', 0, 0, '2018-07-24 03:50:23'),
(13, 'Gustavo Gabriel', 'Melian', 'gustavo@gmail.com', 'Av. Corrientes 3910', 1131783112, 38782874, 0, 'S1', 'S4', 0, 0, '2018-07-24 03:15:10'),
(15, 'Amayez Quinteros', 'Leandro Damian', 'leoamayez@gmail.com', 'Calle 125 N° 243, La Plata', 3547, 39737711, 1900, 'S1', 'S9', 0, 0, '2018-07-26 09:20:19'),
(12, 'Jose Luis', 'Martinez Mendieta', 'martinezjose_66@hotmail.com', 'Cmte. Lucena 51', 1167831657, 39167626, 1870, 'S0', 'S1', 0, 0, '2018-07-24 03:13:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventlog`
--

CREATE TABLE IF NOT EXISTS `eventlog` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event` varchar(200) NOT NULL,
  `eventRowIdOrRef` varchar(20) DEFAULT NULL,
  `eventDesc` text,
  `eventTable` varchar(20) DEFAULT NULL,
  `staffInCharge` bigint(20) unsigned NOT NULL,
  `eventTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=164 ;

--
-- Volcado de datos para la tabla `eventlog`
--

INSERT INTO `eventlog` (`id`, `event`, `eventRowIdOrRef`, `eventDesc`, `eventTable`, `staffInCharge`, `eventTime`) VALUES
(163, 'New Transaction', '1277631', '3 items totalling $2,434.00 with reference number 1277631 was purchased', 'transactions', 22, '2018-08-04 06:12:27'),
(162, 'Creation of new item', '49', 'Addition of 500 quantities of a new item ''producto de indep'' with a unit price of $50.00 to stock', 'items', 1, '2018-08-04 06:11:37'),
(153, 'Creation of new item', '44', 'Addition of 123 quantities of a new item ''Prueba'' with a unit price of $800.00 to stock', 'items', 1, '2018-08-04 02:16:09'),
(154, 'New Transaction', '8284276', '1 items totalling $800.00 with reference number 8284276 was purchased', 'transactions', 1, '2018-08-04 02:59:51'),
(155, 'Creation of new item', '45', 'Addition of 50 quantities of a new item ''aaaaa'' with a unit price of $1,234.00 to stock', 'items', 1, '2018-08-04 03:40:55'),
(156, 'New Transaction', '720550', '1 items totalling $1,234.00 with reference number 720550 was purchased', 'transactions', 22, '2018-08-04 03:43:11'),
(157, 'Creation of new item', '46', 'Addition of 50 quantities of a new item ''DOS'' with a unit price of $500.00 to stock', 'items', 1, '2018-08-04 03:45:23'),
(158, 'New Transaction', '081995', '2 items totalling $3,468.00 with reference number 081995 was purchased', 'transactions', 22, '2018-08-04 03:47:05'),
(159, 'Creation of new item', '47', 'Addition of 12 quantities of a new item ''german'' with a unit price of $111.00 to stock', 'items', 1, '2018-08-04 04:52:47'),
(160, 'New Transaction', '027942', '1 items totalling $111.00 with reference number 027942 was purchased', 'transactions', 22, '2018-08-04 04:53:24'),
(161, 'Creation of new item', '48', 'Addition of 10 quantities of a new item ''Producto de pat'' with a unit price of $700.00 to stock', 'items', 1, '2018-08-04 06:07:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` text,
  `unitCost` decimal(10,2) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `quantity` int(6) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `points` int(250) NOT NULL,
  `local` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `name`, `code`, `description`, `unitCost`, `unitPrice`, `quantity`, `dateAdded`, `lastUpdated`, `points`, `local`) VALUES
(44, 'Prueba', '12', '', '500.00', '800.00', 122, '2018-08-04 02:16:09', '2018-08-04 02:59:51', 13, 'brown2'),
(45, 'aaaaa', '99', '', '123.00', '1234.00', 46, '2018-08-04 03:40:55', '2018-08-04 06:12:27', 21, 'patricios'),
(46, 'DOS', '10', '', '100.00', '500.00', 47, '2018-08-04 03:45:23', '2018-08-04 06:12:27', 8, 'patricios'),
(47, 'german', '123', '', '22.00', '111.00', 11, '2018-08-04 04:52:47', '2018-08-04 04:53:24', 2, 'patricios'),
(48, 'Producto de pat', '66', '', '520.00', '700.00', 9, '2018-08-04 06:07:26', '2018-08-04 06:12:27', 12, 'patricios'),
(49, 'producto de indep', '66', '', '10.00', '50.00', 499, '2018-08-04 06:11:37', '2018-08-04 06:12:27', 1, 'independencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lk_sess`
--

CREATE TABLE IF NOT EXISTS `lk_sess` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `transId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ref` varchar(10) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `itemCode` varchar(50) NOT NULL,
  `description` text,
  `quantity` int(6) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `totalMoneySpent` decimal(10,2) NOT NULL,
  `amountTendered` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `discount_percentage` decimal(10,2) NOT NULL,
  `vatPercentage` decimal(10,2) NOT NULL,
  `vatAmount` decimal(10,2) NOT NULL,
  `changeDue` decimal(10,2) NOT NULL,
  `modeOfPayment` varchar(20) NOT NULL,
  `cust_code` varchar(250) DEFAULT NULL,
  `cust_name` varchar(20) DEFAULT NULL,
  `cust_phone` varchar(15) DEFAULT NULL,
  `cust_email` varchar(50) DEFAULT NULL,
  `transType` char(1) NOT NULL,
  `staffId` bigint(20) unsigned NOT NULL,
  `local` varchar(50) NOT NULL,
  `transDate` datetime NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cancelled` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`transId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Volcado de datos para la tabla `transactions`
--

INSERT INTO `transactions` (`transId`, `ref`, `itemName`, `itemCode`, `description`, `quantity`, `unitPrice`, `totalPrice`, `totalMoneySpent`, `amountTendered`, `discount_amount`, `discount_percentage`, `vatPercentage`, `vatAmount`, `changeDue`, `modeOfPayment`, `cust_code`, `cust_name`, `cust_phone`, `cust_email`, `transType`, `staffId`, `local`, `transDate`, `lastUpdated`, `cancelled`) VALUES
(87, '6874916', 'ADAPTADOR AUTO 2,4 RCC-205', '6954851251385', '', 1, '490.00', '490.00', '490.00', '500.00', '0.00', '0.00', '0.00', '0.00', '10.00', 'Cash', '', '', '', '', '1', 17, 'patricios', '2018-08-02 21:39:35', '2018-08-02 21:39:35', '0'),
(112, '1277631', 'Producto de pat', '66', '', 1, '700.00', '700.00', '2434.00', '2500.00', '0.00', '0.00', '0.00', '0.00', '66.00', 'Cash', '', 'German Hugo Martinez', '1164540375', 'germanmendieta123ss@gmail.com', '1', 22, '', '2018-08-04 06:12:27', '2018-08-04 06:12:27', '0'),
(111, '1277631', 'DOS', '10', '', 1, '500.00', '500.00', '2434.00', '2500.00', '0.00', '0.00', '0.00', '0.00', '66.00', 'Cash', '', 'German Hugo Martinez', '1164540375', 'germanmendieta123ss@gmail.com', '1', 22, '', '2018-08-04 06:12:27', '2018-08-04 06:12:27', '0'),
(110, '1277631', 'aaaaa', '99', '', 1, '1234.00', '1234.00', '2434.00', '2500.00', '0.00', '0.00', '0.00', '0.00', '66.00', 'Cash', '', 'German Hugo Martinez', '1164540375', 'germanmendieta123ss@gmail.com', '1', 22, '', '2018-08-04 06:12:27', '2018-08-04 06:12:27', '0'),
(109, '027942', 'german', '123', '', 1, '111.00', '111.00', '111.00', '200.00', '0.00', '0.00', '0.00', '0.00', '89.00', 'Cash', '', '', '', '', '1', 22, '', '2018-08-04 04:53:24', '2018-08-04 04:53:24', '0'),
(108, '081995', 'DOS', '10', '', 2, '500.00', '1000.00', '3468.00', '3500.00', '0.00', '0.00', '0.00', '0.00', '32.00', 'Cash', '', '', '', '', '1', 22, '', '2018-08-04 03:47:05', '2018-08-04 03:47:05', '0'),
(105, '8284276', 'Prueba', '12', '', 1, '800.00', '800.00', '800.00', '800.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'POS', '', '', '', '', '1', 1, '', '2018-08-04 02:59:51', '2018-08-04 02:59:51', '0'),
(106, '720550', 'aaaaa', '99', '', 1, '1234.00', '1234.00', '1234.00', '1500.00', '0.00', '0.00', '0.00', '0.00', '266.00', 'Cash', '', '', '', '', '1', 22, '', '2018-08-04 03:43:11', '2018-08-04 03:43:11', '0'),
(107, '081995', 'aaaaa', '99', '', 2, '1234.00', '2468.00', '3468.00', '3500.00', '0.00', '0.00', '0.00', '0.00', '32.00', 'Cash', '', '', '', '', '1', 22, '', '2018-08-04 03:47:05', '2018-08-04 03:47:05', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
