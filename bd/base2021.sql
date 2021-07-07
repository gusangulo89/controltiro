-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-07-2021 a las 05:46:38
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base2021`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacceso`
--

DROP TABLE IF EXISTS `bitacceso`;
CREATE TABLE IF NOT EXISTS `bitacceso` (
  `idacceso` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `fechahora` varchar(150) DEFAULT NULL,
  `hora` varchar(30) DEFAULT NULL,
  `bitoperacion` varchar(250) DEFAULT NULL,
  `bitinstruccion` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`idacceso`)
) ENGINE=InnoDB AUTO_INCREMENT=1267 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bitacceso`
--

INSERT INTO `bitacceso` (`idacceso`, `username`, `fechahora`, `hora`, `bitoperacion`, `bitinstruccion`) VALUES
(893, 'jonathan', 'MiÃ©rcoles 25 de Diciembre de 2019', '04:42:05 PM', 'MiÃ©rcoles 25 de Diciembre de 2019', '06:45:03 PM'),
(894, 'jonathan', 'Lunes 06 de Enero de 2020', '09:23:31 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(895, 'Admin', 'Lunes 06 de Enero de 2020', '09:40:57 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(896, 'jonathan', 'Lunes 06 de Enero de 2020', '10:52:35 AM', 'Lunes 06 de Enero de 2020', '01:38:13 PM'),
(897, 'mchelo', 'Lunes 06 de Enero de 2020', '10:55:45 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(898, 'Admin', 'Lunes 06 de Enero de 2020', '12:26:15 PM', 'Lunes 06 de Enero de 2020', '01:33:14 PM'),
(899, 'jonathan', 'Martes 07 de Enero de 2020', '09:47:35 AM', 'Martes 07 de Enero de 2020', '02:08:29 PM'),
(900, 'Admin', 'Martes 07 de Enero de 2020', '10:18:52 AM', 'Martes 07 de Enero de 2020', '12:02:48 PM'),
(901, 'mchelo', 'Martes 07 de Enero de 2020', '10:52:45 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(902, 'jonathan', 'MiÃ©rcoles 08 de Enero de 2020', '09:08:47 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(903, 'Admin', 'MiÃ©rcoles 08 de Enero de 2020', '09:29:05 AM', 'MiÃ©rcoles 08 de Enero de 2020', '01:19:20 PM'),
(904, 'mchelo', 'MiÃ©rcoles 08 de Enero de 2020', '10:16:49 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(905, 'Admin', 'Jueves 09 de Enero de 2020', '09:24:08 AM', 'Jueves 09 de Enero de 2020', '09:24:27 AM'),
(906, 'jonathan', 'Jueves 09 de Enero de 2020', '09:25:22 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(907, 'Admin', 'Jueves 09 de Enero de 2020', '09:54:45 AM', 'Jueves 09 de Enero de 2020', '01:20:48 PM'),
(908, 'mchelo', 'Jueves 09 de Enero de 2020', '10:00:13 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(909, 'jonathan', 'Jueves 09 de Enero de 2020', '11:35:56 AM', 'Jueves 09 de Enero de 2020', '01:42:02 PM'),
(910, 'jonathan', 'Viernes 10 de Enero de 2020', '09:28:42 AM', 'Viernes 10 de Enero de 2020', '01:27:54 PM'),
(911, 'Admin', 'Viernes 10 de Enero de 2020', '09:46:24 AM', 'Viernes 10 de Enero de 2020', '01:23:54 PM'),
(912, 'mchelo', 'Viernes 10 de Enero de 2020', '09:55:12 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(913, 'jonathan', 'Viernes 10 de Enero de 2020', '10:17:55 PM', 'SÃ¡bado 11 de Enero de 2020', '01:15:48 AM'),
(914, 'jonathan', 'SÃ¡bado 11 de Enero de 2020', '07:34:24 PM', 'Domingo 12 de Enero de 2020', '02:43:25 PM'),
(915, 'jonathan', 'Domingo 12 de Enero de 2020', '02:46:46 PM', 'Domingo 12 de Enero de 2020', '03:32:25 PM'),
(916, 'jonathan', 'Domingo 12 de Enero de 2020', '03:32:51 PM', 'Domingo 12 de Enero de 2020', '03:33:20 PM'),
(917, 'jonathan', 'Domingo 12 de Enero de 2020', '04:37:46 PM', 'Domingo 12 de Enero de 2020', '04:49:28 PM'),
(918, 'jonathan', 'Domingo 12 de Enero de 2020', '04:52:34 PM', 'Domingo 12 de Enero de 2020', '05:07:31 PM'),
(919, 'jonathan', 'Lunes 13 de Enero de 2020', '09:15:02 AM', 'Lunes 13 de Enero de 2020', '01:06:05 PM'),
(920, 'mchelo', 'Lunes 13 de Enero de 2020', '09:39:39 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(921, 'Admin', 'Lunes 13 de Enero de 2020', '09:40:15 AM', 'Lunes 13 de Enero de 2020', '01:02:26 PM'),
(922, 'jonathan', 'Martes 14 de Enero de 2020', '09:00:47 AM', 'Martes 14 de Enero de 2020', '02:42:47 PM'),
(923, 'mchelo', 'Martes 14 de Enero de 2020', '09:18:47 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(924, 'Admin', 'Martes 14 de Enero de 2020', '09:27:08 AM', 'Martes 14 de Enero de 2020', '02:39:41 PM'),
(925, 'mchelo', 'Martes 14 de Enero de 2020', '12:04:03 PM', 'DD-MM-AAAA', 'hh:mm:ss'),
(926, 'jonathan', 'MiÃ©rcoles 15 de Enero de 2020', '09:36:58 AM', 'MiÃ©rcoles 15 de Enero de 2020', '02:09:35 PM'),
(927, 'Admin', 'MiÃ©rcoles 15 de Enero de 2020', '09:38:24 AM', 'MiÃ©rcoles 15 de Enero de 2020', '01:40:53 PM'),
(928, 'mchelo', 'MiÃ©rcoles 15 de Enero de 2020', '09:38:40 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(929, 'mchelo', 'MiÃ©rcoles 15 de Enero de 2020', '12:15:19 PM', 'DD-MM-AAAA', 'hh:mm:ss'),
(930, 'jonathan', 'Jueves 16 de Enero de 2020', '09:15:39 AM', 'Jueves 16 de Enero de 2020', '01:18:53 PM'),
(931, 'mchelo', 'Jueves 16 de Enero de 2020', '09:16:31 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(932, 'Admin', 'Jueves 16 de Enero de 2020', '09:48:57 AM', 'Jueves 16 de Enero de 2020', '12:54:42 PM'),
(933, 'mchelo', 'Jueves 16 de Enero de 2020', '10:12:40 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(934, 'jonathan', 'Viernes 17 de Enero de 2020', '09:39:28 AM', 'Lunes 20 de Enero de 2020', '02:12:07 PM'),
(935, 'mchelo', 'Viernes 17 de Enero de 2020', '09:40:51 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(936, 'Admin', 'Viernes 17 de Enero de 2020', '09:43:09 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(937, 'Admin', 'Viernes 17 de Enero de 2020', '11:07:06 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(938, 'mchelo', 'Lunes 20 de Enero de 2020', '09:11:00 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(939, 'Admin', 'Lunes 20 de Enero de 2020', '09:53:36 AM', 'Lunes 20 de Enero de 2020', '02:07:03 PM'),
(940, 'mchelo', 'Lunes 20 de Enero de 2020', '10:28:26 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(941, 'jonathan', 'Martes 21 de Enero de 2020', '09:30:41 AM', 'Martes 21 de Enero de 2020', '01:39:48 PM'),
(942, 'Admin', 'Martes 21 de Enero de 2020', '09:35:37 AM', 'Martes 21 de Enero de 2020', '01:29:01 PM'),
(943, 'mchelo', 'Martes 21 de Enero de 2020', '09:52:42 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(944, 'jonathan', 'MiÃ©rcoles 22 de Enero de 2020', '09:32:47 AM', 'MiÃ©rcoles 22 de Enero de 2020', '02:13:24 PM'),
(945, 'mchelo', 'MiÃ©rcoles 22 de Enero de 2020', '09:38:46 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(946, 'Admin', 'MiÃ©rcoles 22 de Enero de 2020', '09:44:53 AM', 'MiÃ©rcoles 22 de Enero de 2020', '02:18:51 PM'),
(947, 'mchelo', 'MiÃ©rcoles 22 de Enero de 2020', '10:25:05 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(948, 'jonathan', 'Jueves 23 de Enero de 2020', '09:52:50 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(949, 'Admin', 'Jueves 23 de Enero de 2020', '10:05:40 AM', 'Jueves 23 de Enero de 2020', '10:06:06 AM'),
(950, 'jonathan', 'Jueves 23 de Enero de 2020', '10:06:13 AM', 'Jueves 23 de Enero de 2020', '02:17:08 PM'),
(951, 'mchelo', 'Jueves 23 de Enero de 2020', '10:07:22 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(952, 'Admin', 'Jueves 23 de Enero de 2020', '10:10:23 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(953, 'jonathan', 'Viernes 24 de Enero de 2020', '09:48:15 AM', 'Viernes 24 de Enero de 2020', '01:27:02 PM'),
(954, 'Admin', 'Viernes 24 de Enero de 2020', '09:54:52 AM', 'Viernes 24 de Enero de 2020', '01:22:36 PM'),
(955, 'mchelo', 'Viernes 24 de Enero de 2020', '09:56:46 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(956, 'jonathan', 'Lunes 27 de Enero de 2020', '09:44:06 AM', 'Lunes 27 de Enero de 2020', '01:38:17 PM'),
(957, 'mchelo', 'Lunes 27 de Enero de 2020', '09:45:37 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(958, 'Admin', 'Lunes 27 de Enero de 2020', '10:15:53 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(959, 'Admin', 'Lunes 27 de Enero de 2020', '12:39:59 PM', 'Lunes 27 de Enero de 2020', '01:28:20 PM'),
(960, 'mchelo', 'Lunes 27 de Enero de 2020', '12:56:20 PM', 'DD-MM-AAAA', 'hh:mm:ss'),
(961, 'jonathan', 'Martes 28 de Enero de 2020', '09:20:30 AM', 'Martes 28 de Enero de 2020', '03:45:36 PM'),
(962, 'mchelo', 'Martes 28 de Enero de 2020', '09:36:38 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(963, 'Admin', 'Martes 28 de Enero de 2020', '10:08:02 AM', 'Martes 28 de Enero de 2020', '03:32:40 PM'),
(964, 'Admin', 'MiÃ©rcoles 29 de Enero de 2020', '09:24:37 AM', 'MiÃ©rcoles 29 de Enero de 2020', '09:39:12 AM'),
(965, 'jonathan', 'MiÃ©rcoles 29 de Enero de 2020', '09:39:19 AM', 'MiÃ©rcoles 29 de Enero de 2020', '02:22:08 PM'),
(966, 'jonathan', 'Jueves 30 de Enero de 2020', '09:25:44 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(967, 'Admin', 'Jueves 30 de Enero de 2020', '10:17:18 AM', 'Jueves 30 de Enero de 2020', '01:02:50 PM'),
(968, 'mchelo', 'Jueves 30 de Enero de 2020', '10:21:18 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(969, 'mchelo', 'Jueves 30 de Enero de 2020', '10:51:07 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(970, 'Admin', 'Viernes 31 de Enero de 2020', '09:28:13 AM', 'Viernes 31 de Enero de 2020', '09:28:30 AM'),
(971, 'mchelo', 'Viernes 31 de Enero de 2020', '09:28:33 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(972, 'jonathan', 'Viernes 31 de Enero de 2020', '09:28:37 AM', 'Viernes 31 de Enero de 2020', '02:42:19 PM'),
(973, 'jonathan', 'Martes 04 de Febrero de 2020', '09:22:55 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(974, 'mchelo', 'Martes 04 de Febrero de 2020', '09:24:40 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(975, 'Admin', 'Martes 04 de Febrero de 2020', '11:05:09 AM', 'Martes 04 de Febrero de 2020', '01:18:30 PM'),
(976, 'jonathan', 'Martes 04 de Febrero de 2020', '12:59:21 PM', 'DD-MM-AAAA', 'hh:mm:ss'),
(977, 'Admin', 'MiÃ©rcoles 05 de Febrero de 2020', '09:11:44 AM', 'MiÃ©rcoles 05 de Febrero de 2020', '09:12:34 AM'),
(978, 'jonathan', 'MiÃ©rcoles 05 de Febrero de 2020', '09:12:43 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(979, 'mchelo', 'MiÃ©rcoles 05 de Febrero de 2020', '09:13:45 AM', 'MiÃ©rcoles 05 de Febrero de 2020', '02:25:51 PM'),
(980, 'Admin', 'MiÃ©rcoles 05 de Febrero de 2020', '12:02:57 PM', 'MiÃ©rcoles 05 de Febrero de 2020', '12:03:13 PM'),
(981, 'jonathan', 'MiÃ©rcoles 05 de Febrero de 2020', '12:03:19 PM', 'DD-MM-AAAA', 'hh:mm:ss'),
(982, 'Admin', 'MiÃ©rcoles 05 de Febrero de 2020', '12:36:37 PM', 'MiÃ©rcoles 05 de Febrero de 2020', '12:36:50 PM'),
(983, 'jonathan', 'MiÃ©rcoles 05 de Febrero de 2020', '12:37:02 PM', 'MiÃ©rcoles 05 de Febrero de 2020', '02:33:43 PM'),
(984, 'jonathan', 'Jueves 06 de Febrero de 2020', '09:12:34 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(985, 'mchelo', 'Jueves 06 de Febrero de 2020', '09:23:36 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(986, 'Admin', 'Jueves 06 de Febrero de 2020', '10:38:38 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(987, 'mchelo', 'Jueves 06 de Febrero de 2020', '01:13:30 PM', 'DD-MM-AAAA', 'hh:mm:ss'),
(988, 'Admin', 'Jueves 06 de Febrero de 2020', '02:16:22 PM', 'Jueves 06 de Febrero de 2020', '02:57:04 PM'),
(989, 'jonathan', 'Viernes 07 de Febrero de 2020', '09:10:04 AM', 'Viernes 07 de Febrero de 2020', '02:43:40 PM'),
(990, 'Admin', 'Viernes 07 de Febrero de 2020', '09:45:15 AM', 'Viernes 07 de Febrero de 2020', '02:19:57 PM'),
(991, 'jonathan', 'Lunes 17 de Febrero de 2020', '09:59:34 AM', 'Lunes 17 de Febrero de 2020', '01:39:31 PM'),
(992, 'mchelo', 'Lunes 17 de Febrero de 2020', '11:14:57 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(993, 'Admin', 'Lunes 17 de Febrero de 2020', '12:56:45 PM', 'Lunes 17 de Febrero de 2020', '01:01:11 PM'),
(994, 'Admin', 'Lunes 17 de Febrero de 2020', '01:01:18 PM', 'Lunes 17 de Febrero de 2020', '01:28:46 PM'),
(995, 'jonathan', 'Martes 18 de Febrero de 2020', '09:05:57 AM', 'Martes 18 de Febrero de 2020', '01:03:48 PM'),
(996, 'Admin', 'Martes 18 de Febrero de 2020', '09:06:14 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(997, 'Admin', 'Martes 18 de Febrero de 2020', '11:30:29 AM', 'Martes 18 de Febrero de 2020', '12:59:39 PM'),
(998, 'jonathan', 'MiÃ©rcoles 19 de Febrero de 2020', '09:24:47 AM', 'MiÃ©rcoles 19 de Febrero de 2020', '01:45:03 PM'),
(999, 'mchelo', 'MiÃ©rcoles 19 de Febrero de 2020', '11:34:45 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1000, 'Admin', 'MiÃ©rcoles 19 de Febrero de 2020', '01:07:07 PM', 'MiÃ©rcoles 19 de Febrero de 2020', '01:31:33 PM'),
(1001, 'jonathan', 'Jueves 20 de Febrero de 2020', '08:16:46 AM', 'Jueves 20 de Febrero de 2020', '09:04:20 AM'),
(1002, 'jonathan', 'Jueves 20 de Febrero de 2020', '09:28:16 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1003, 'Admin', 'Jueves 20 de Febrero de 2020', '09:29:19 AM', 'Jueves 20 de Febrero de 2020', '09:29:38 AM'),
(1004, 'mchelo', 'Jueves 20 de Febrero de 2020', '09:29:36 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1005, 'jonathan', 'Jueves 20 de Febrero de 2020', '09:29:44 AM', 'Jueves 20 de Febrero de 2020', '02:13:33 PM'),
(1006, 'Admin', 'Jueves 20 de Febrero de 2020', '09:36:43 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1007, 'jonathan', 'Viernes 21 de Febrero de 2020', '09:26:24 AM', 'Viernes 21 de Febrero de 2020', '02:08:51 PM'),
(1008, 'Admin', 'Viernes 21 de Febrero de 2020', '09:36:34 AM', 'Viernes 21 de Febrero de 2020', '01:47:15 PM'),
(1009, 'mchelo', 'Viernes 21 de Febrero de 2020', '10:15:01 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1010, 'jonathan', 'Lunes 24 de Febrero de 2020', '09:26:02 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1011, 'Admin', 'Lunes 24 de Febrero de 2020', '10:16:38 AM', 'Lunes 24 de Febrero de 2020', '12:55:40 PM'),
(1012, 'mchelo', 'Lunes 24 de Febrero de 2020', '11:26:24 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1013, 'Admin', 'Lunes 24 de Febrero de 2020', '12:57:17 PM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1014, 'Admin', 'Martes 25 de Febrero de 2020', '09:57:45 AM', 'Martes 25 de Febrero de 2020', '01:09:18 PM'),
(1015, 'mchelo', 'Martes 25 de Febrero de 2020', '10:20:56 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1016, 'jonathan', 'Martes 25 de Febrero de 2020', '11:24:54 AM', 'Martes 25 de Febrero de 2020', '01:29:17 PM'),
(1017, 'mchelo', 'Martes 25 de Febrero de 2020', '12:41:53 PM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1018, 'jonathan', 'MiÃ©rcoles 26 de Febrero de 2020', '09:31:51 AM', 'MiÃ©rcoles 26 de Febrero de 2020', '01:37:59 PM'),
(1019, 'Admin', 'MiÃ©rcoles 26 de Febrero de 2020', '09:38:06 AM', 'MiÃ©rcoles 26 de Febrero de 2020', '01:24:04 PM'),
(1020, 'mchelo', 'MiÃ©rcoles 26 de Febrero de 2020', '09:41:22 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1021, 'jonathan', 'Jueves 27 de Febrero de 2020', '09:38:46 AM', 'Jueves 27 de Febrero de 2020', '01:46:17 PM'),
(1022, 'mchelo', 'Jueves 27 de Febrero de 2020', '09:56:35 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1023, 'Admin', 'Jueves 27 de Febrero de 2020', '10:32:56 AM', 'Jueves 27 de Febrero de 2020', '01:39:08 PM'),
(1024, 'jonathan', 'Viernes 28 de Febrero de 2020', '09:24:02 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1025, 'mchelo', 'Viernes 28 de Febrero de 2020', '09:33:38 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1026, 'Admin', 'Viernes 28 de Febrero de 2020', '09:54:43 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1027, 'jonathan', 'Viernes 28 de Febrero de 2020', '10:44:37 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1028, 'Admin', 'Viernes 28 de Febrero de 2020', '01:05:22 PM', 'Viernes 28 de Febrero de 2020', '02:22:05 PM'),
(1029, 'Admin', 'Lunes 02 de Marzo de 2020', '09:58:58 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1030, 'mchelo', 'Lunes 02 de Marzo de 2020', '10:05:05 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1031, 'gusangulomele89', 'Lunes 02 de Marzo de 2020', '10:54:38 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1032, 'Admin', 'Lunes 02 de Marzo de 2020', '02:06:06 PM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1033, 'jonathan', 'Martes 03 de Marzo de 2020', '09:32:07 AM', 'Martes 03 de Marzo de 2020', '01:43:09 PM'),
(1034, 'Admin', 'Martes 03 de Marzo de 2020', '09:39:25 AM', 'Martes 03 de Marzo de 2020', '01:34:15 PM'),
(1035, 'mchelo', 'Martes 03 de Marzo de 2020', '09:42:05 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1036, 'jonathan', 'MiÃ©rcoles 04 de Marzo de 2020', '09:35:45 AM', 'MiÃ©rcoles 04 de Marzo de 2020', '02:37:44 PM'),
(1037, 'mchelo', 'MiÃ©rcoles 04 de Marzo de 2020', '10:10:51 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1038, 'Admin', 'MiÃ©rcoles 04 de Marzo de 2020', '10:14:46 AM', 'MiÃ©rcoles 04 de Marzo de 2020', '02:23:50 PM'),
(1039, 'jonathan', 'Jueves 05 de Marzo de 2020', '09:25:45 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1040, 'Admin', 'Jueves 05 de Marzo de 2020', '09:36:25 AM', 'Jueves 05 de Marzo de 2020', '01:40:35 PM'),
(1041, 'mchelo', 'Jueves 05 de Marzo de 2020', '10:16:57 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1042, 'jonathan', 'Jueves 05 de Marzo de 2020', '01:09:30 PM', 'Jueves 05 de Marzo de 2020', '01:54:37 PM'),
(1043, 'jonathan', 'Viernes 06 de Marzo de 2020', '09:38:08 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1044, 'Admin', 'Viernes 06 de Marzo de 2020', '09:41:05 AM', 'Viernes 06 de Marzo de 2020', '01:24:01 PM'),
(1045, 'jonathan', 'Viernes 06 de Marzo de 2020', '11:39:25 AM', 'Viernes 06 de Marzo de 2020', '01:28:47 PM'),
(1046, 'jonathan', 'Lunes 09 de Marzo de 2020', '09:07:55 AM', 'Lunes 09 de Marzo de 2020', '01:11:51 PM'),
(1047, 'mchelo', 'Lunes 09 de Marzo de 2020', '09:13:52 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1048, 'Admin', 'Lunes 09 de Marzo de 2020', '10:03:03 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1049, 'Admin', 'Lunes 09 de Marzo de 2020', '12:07:07 PM', 'Lunes 09 de Marzo de 2020', '01:11:45 PM'),
(1050, 'jonathan', 'Martes 10 de Marzo de 2020', '09:22:48 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1051, 'mchelo', 'Martes 10 de Marzo de 2020', '09:27:27 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1052, 'Admin', 'Martes 10 de Marzo de 2020', '09:32:27 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1053, 'jonathan', 'Martes 10 de Marzo de 2020', '01:01:37 PM', 'Martes 10 de Marzo de 2020', '01:46:23 PM'),
(1054, 'Admin', 'Martes 10 de Marzo de 2020', '01:26:17 PM', 'Martes 10 de Marzo de 2020', '01:43:04 PM'),
(1055, 'jonathan', 'MiÃ©rcoles 11 de Marzo de 2020', '09:26:18 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1056, 'Admin', 'MiÃ©rcoles 11 de Marzo de 2020', '09:35:10 AM', 'MiÃ©rcoles 11 de Marzo de 2020', '02:58:26 PM'),
(1057, 'mchelo', 'MiÃ©rcoles 11 de Marzo de 2020', '11:23:13 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1058, 'jonathan', 'MiÃ©rcoles 11 de Marzo de 2020', '11:57:36 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1059, 'jonathan', 'MiÃ©rcoles 11 de Marzo de 2020', '02:39:07 PM', 'Jueves 12 de Marzo de 2020', '02:11:20 PM'),
(1060, 'Admin', 'Jueves 12 de Marzo de 2020', '09:42:22 AM', 'Jueves 12 de Marzo de 2020', '02:07:54 PM'),
(1061, 'mchelo', 'Jueves 12 de Marzo de 2020', '10:26:43 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1062, 'jonathan', 'Viernes 13 de Marzo de 2020', '09:48:36 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1063, 'mchelo', 'Viernes 13 de Marzo de 2020', '11:29:29 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1064, 'Admin', 'Viernes 13 de Marzo de 2020', '11:37:42 AM', 'Viernes 13 de Marzo de 2020', '01:50:49 PM'),
(1065, 'jonathan', 'Viernes 13 de Marzo de 2020', '01:35:39 PM', 'Viernes 13 de Marzo de 2020', '02:20:04 PM'),
(1066, 'jonathan', 'Martes 17 de Marzo de 2020', '09:32:27 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1067, 'Admin', 'Martes 17 de Marzo de 2020', '09:49:53 AM', 'Martes 17 de Marzo de 2020', '11:38:12 AM'),
(1068, 'mchelo', 'Martes 17 de Marzo de 2020', '10:52:39 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1069, 'Admin', 'Martes 17 de Marzo de 2020', '11:38:23 AM', 'Martes 17 de Marzo de 2020', '01:28:28 PM'),
(1070, 'jonathan', 'Martes 17 de Marzo de 2020', '12:24:48 PM', 'Martes 17 de Marzo de 2020', '01:28:07 PM'),
(1071, 'Admin', 'MiÃ©rcoles 18 de Marzo de 2020', '09:42:28 AM', 'MiÃ©rcoles 18 de Marzo de 2020', '01:36:58 PM'),
(1072, 'jonathan', 'MiÃ©rcoles 18 de Marzo de 2020', '09:46:43 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1073, 'jonathan', 'MiÃ©rcoles 18 de Marzo de 2020', '11:22:51 AM', 'MiÃ©rcoles 18 de Marzo de 2020', '01:55:36 PM'),
(1074, 'mchelo', 'MiÃ©rcoles 18 de Marzo de 2020', '12:23:42 PM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1075, 'jonathan', 'Jueves 19 de Marzo de 2020', '09:11:14 AM', 'Jueves 19 de Marzo de 2020', '05:03:28 PM'),
(1076, 'Admin', 'Jueves 19 de Marzo de 2020', '09:34:51 AM', 'Jueves 19 de Marzo de 2020', '04:20:07 PM'),
(1077, 'mchelo', 'Jueves 19 de Marzo de 2020', '10:49:06 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1078, 'Admin', 'Viernes 20 de Marzo de 2020', '09:13:46 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1079, 'mchelo', 'Viernes 20 de Marzo de 2020', '10:48:25 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1080, 'gusangulomele89', 'SÃ¡bado 28 de Marzo de 2020', '06:07:05 PM', 'SÃ¡bado 28 de Marzo de 2020', '06:32:51 PM'),
(1081, 'gusangulomele89', 'Jueves 19 de Marzo de 2020', '06:34:15 PM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1082, 'gusangulomele89', 'Martes 19 de Noviembre de 2019', '07:01:31 PM', 'Lunes 30 de Marzo de 2020', '10:06:44 PM'),
(1083, 'gusangulomele89', 'Lunes 30 de Marzo de 2020', '10:06:56 PM', 'Lunes 30 de Marzo de 2020', '11:39:08 PM'),
(1084, 'gusangulomele89', 'Lunes 30 de Marzo de 2020', '11:39:52 PM', 'Domingo 29 de Marzo de 2020', '11:57:25 AM'),
(1085, 'gusangulomele89', 'Domingo 29 de Marzo de 2020', '11:57:39 AM', 'DD-MM-AAAA', 'hh:mm:ss'),
(1086, 'gusangulomele89', 'Domingo 29 de Marzo de 2020', '03:07:35 PM', 'Domingo 29 de Marzo de 2020', '03:47:31 PM'),
(1087, '', '2020-11-08 13:31:45', '2020-11-08 13:31:45', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1088, 'Admin', '2020-11-12 15:23:22', '2020-11-12 15:23:22', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1089, 'Admin', '2020-11-12 15:24:18', '2020-11-12 15:24:18', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 6423'),
(1090, 'Admin', '2020-11-12 15:24:33', '2020-11-12 15:24:33', 'CONSULTA FOLIO 001200', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =001200'),
(1091, 'Admin', '2020-11-12 15:24:36', '2020-11-12 15:24:36', 'IMPRESIÓN DEL FOLIO No. 001200', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n            responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n            folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n            folios.observaciones, folios.itipopractica\r\n            from catfolios as folios\r\n            left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n            left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n            left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n            left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n            left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n            where folios.folio =001200'),
(1092, 'Admin', '2020-11-12 15:25:15', '2020-11-12 15:25:15', 'CONSULTA FOLIO 000150', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =000150'),
(1093, 'Admin', '2020-11-12 15:25:25', '2020-11-12 15:25:25', 'CONSULTA FOLIO 000300', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =000300'),
(1094, 'Admin', '2020-11-12 15:25:31', '2020-11-12 15:25:31', 'CONSULTA FOLIO 000789', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =000789'),
(1095, 'Admin', '2020-11-12 15:25:40', '2020-11-12 15:25:40', 'IMPRESIÓN DEL FOLIO No. 000789', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n            responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n            folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n            folios.observaciones, folios.itipopractica\r\n            from catfolios as folios\r\n            left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n            left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n            left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n            left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n            left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n            where folios.folio =000789'),
(1096, 'Admin', '2020-11-12 15:26:06', '2020-11-12 15:26:06', 'SEL Grado', 'select * from catgrados where idcatgrados = 8'),
(1097, 'Admin', '2020-11-12 15:26:17', '2020-11-12 15:26:17', 'UDP Grado', 'insert into catgrados values(DEFAULT,POLICIA 1°,SIN OBSERVACIONES)'),
(1098, 'Admin', '2020-11-12 15:26:23', '2020-11-12 15:26:23', 'SEL Grado', 'select * from catgrados where idcatgrados = 9'),
(1099, 'Admin', '2020-11-12 15:26:29', '2020-11-12 15:26:29', 'UDP Grado', 'insert into catgrados values(DEFAULT,POLICIA 2°,SIN OBSERVACIONES)'),
(1100, 'Admin', '2020-11-12 15:26:38', '2020-11-12 15:26:38', 'CONSULTA FOLIO 000789', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =000789'),
(1101, 'Admin', '2020-11-12 15:26:42', '2020-11-12 15:26:42', 'IMPRESIÓN DEL FOLIO No. 000789', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n            responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n            folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n            folios.observaciones, folios.itipopractica\r\n            from catfolios as folios\r\n            left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n            left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n            left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n            left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n            left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n            where folios.folio =000789'),
(1102, 'Admin', '2020-11-12 15:27:16', '2020-11-12 15:27:16', 'RESET password', 'SELECT usuario.id, usuario.nombre, usuario.apellido, usuario.username, usuario.fechaalta, \r\n                roles.idcatrol, roles.rolnombre FROM usuarios as usuario inner join catroles as roles on roles.idcatrol = usuario.idcatrol where usuario.id = 2'),
(1103, 'Admin', '2020-11-12 15:27:32', '2020-11-12 15:27:32', 'RESET password', 'update usuarios set password = $2y$10$QLJc84br2wGjfZdzeIZNZO9datBJjeQDGYNuPZVU8wY0zzqiwVUs2 where id = 2'),
(1104, 'Admin', '2020-11-12 15:37:40', '2020-11-12 15:37:40', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1105, 'Admin', '2020-11-12 16:26:58', '2020-11-12 16:26:58', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1106, 'Admin', '2020-11-12 16:27:01', '2020-11-12 16:27:01', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1107, 'Admin', '2020-11-12 16:30:30', '2020-11-12 16:30:30', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1108, 'gusangulomele89', '2020-11-12 16:32:32', '2020-11-12 16:32:32', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,gusangulomele89,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1109, 'gusangulomele89', '2020-11-12 16:33:29', '2020-11-12 16:33:29', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,gusangulomele89,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1110, 'gusangulomele89', '2020-11-12 16:34:41', '2020-11-12 16:34:41', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 759990'),
(1111, 'Admin', '2020-11-12 15:50:44', '2020-11-12 15:50:44', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 759990'),
(1112, 'Admin', '2020-11-12 15:51:03', '2020-11-12 15:51:03', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 759990'),
(1113, 'Admin', '2020-11-12 15:51:37', '2020-11-12 15:51:37', 'UNLOCK user', 'update usuarios set useractivado = 1, sesionactiva = 0  where id = 2'),
(1114, 'gusangulomele89', '2020-11-12 15:51:53', '2020-11-12 15:51:53', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,gusangulomele89,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1115, 'Admin', '2020-11-12 15:56:59', '2020-11-12 15:56:59', 'RESET password', 'SELECT usuario.id, usuario.nombre, usuario.apellido, usuario.username, usuario.fechaalta, \r\n                roles.idcatrol, roles.rolnombre FROM usuarios as usuario inner join catroles as roles on roles.idcatrol = usuario.idcatrol where usuario.id = 3'),
(1116, 'Admin', '2020-11-12 15:57:16', '2020-11-12 15:57:16', 'RESET password', 'update usuarios set password = $2y$10$UUwjyM84BCtX6QYf9.h8AuU.5xsKXf0FO3kysFzch3HBWS7VH9NNq where id = 3'),
(1117, 'gusgus', '2020-11-12 15:58:18', '2020-11-12 15:58:18', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,gusgus,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1118, 'gusgus', '2020-11-12 15:59:19', '2020-11-12 15:59:19', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,gusgus,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1119, 'gusgus', '2020-11-12 16:01:36', '2020-11-12 16:01:36', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,gusgus,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1120, 'gusgus', '2020-11-12 16:02:43', '2020-11-12 16:02:43', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,gusgus,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1121, 'gusgus', '2020-11-12 16:03:11', '2020-11-12 16:03:11', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,gusgus,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1122, 'gusgus', '2020-11-12 16:03:43', '2020-11-12 16:03:43', 'CONSULTA FOLIO 000789', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =000789'),
(1123, 'gusgus', '2020-11-12 16:04:52', '2020-11-12 16:04:52', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,gusgus,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1124, 'Admin', '2020-11-12 16:05:25', '2020-11-12 16:05:25', 'CONSULTA FOLIO 001100', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =001100'),
(1125, 'Admin', '2020-11-12 16:05:27', '2020-11-12 16:05:27', 'IMPRESIÓN DEL FOLIO No. 001100', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n            responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n            folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n            folios.observaciones, folios.itipopractica\r\n            from catfolios as folios\r\n            left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n            left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n            left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n            left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n            left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n            where folios.folio =001100'),
(1126, 'Admin', '2020-11-12 16:05:38', '2020-11-12 16:05:38', 'CONSULTA FOLIO 001100', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =001100'),
(1127, 'Admin', '2020-11-12 16:06:00', '2020-11-12 16:06:00', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1128, 'gusangulomele89', '2020-11-12 16:06:26', '2020-11-12 16:06:26', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,gusangulomele89,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1129, 'Admin', '2020-11-14 17:59:39', '2020-11-14 17:59:39', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1130, 'Admin', '2020-11-14 18:02:16', '2020-11-14 18:02:16', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 1050487'),
(1131, 'Admin', '2020-11-14 18:03:48', '2020-11-14 18:03:48', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 826287'),
(1132, 'Admin', '2020-11-14 18:04:19', '2020-11-14 18:04:19', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 826095'),
(1133, 'gusangulomele89', '2020-11-14 18:07:37', '2020-11-14 18:07:37', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,gusangulomele89,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1134, 'gusangulomele89', '2020-11-14 18:08:12', '2020-11-14 18:08:12', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 826095'),
(1135, 'Admin', '2020-11-14 18:09:12', '2020-11-14 18:09:12', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 826095'),
(1136, 'Admin', '2020-11-14 18:10:39', '2020-11-14 18:10:39', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 818168'),
(1137, 'Admin', '2020-11-14 18:11:39', '2020-11-14 18:11:39', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 807345'),
(1138, 'Admin', '2020-11-14 18:12:16', '2020-11-14 18:12:16', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 763115'),
(1139, 'Admin', '2020-11-14 18:12:33', '2020-11-14 18:12:33', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 762619'),
(1140, 'gusangulomele89', '2020-11-14 18:12:48', '2020-11-14 18:12:48', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 762619'),
(1141, 'Admin', '2020-11-14 18:13:21', '2020-11-14 18:13:21', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 762619'),
(1142, 'Admin', '2020-11-14 18:13:38', '2020-11-14 18:13:38', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 762086');
INSERT INTO `bitacceso` (`idacceso`, `username`, `fechahora`, `hora`, `bitoperacion`, `bitinstruccion`) VALUES
(1143, 'gusangulomele89', '2020-11-14 18:13:52', '2020-11-14 18:13:52', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 762086'),
(1144, 'Admin', '2020-11-14 18:14:22', '2020-11-14 18:14:22', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 762086'),
(1145, 'Admin', '2020-11-14 18:14:34', '2020-11-14 18:14:34', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 761658'),
(1146, 'gusangulomele89', '2020-11-14 18:15:06', '2020-11-14 18:15:06', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 761658'),
(1147, 'Admin', '2020-11-14 18:15:47', '2020-11-14 18:15:47', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 761658'),
(1148, 'gusangulomele89', '2020-11-14 18:15:54', '2020-11-14 18:15:54', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 761658'),
(1149, 'gusangulomele89', '2020-11-14 18:16:16', '2020-11-14 18:16:16', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 761658'),
(1150, 'Admin', '2020-11-14 18:16:33', '2020-11-14 18:16:33', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 761612'),
(1151, 'gusangulomele89', '2020-11-14 18:16:42', '2020-11-14 18:16:42', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 761612'),
(1152, 'Admin', '2020-11-14 18:17:06', '2020-11-14 18:17:06', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 761612'),
(1153, 'gusangulomele89', '2020-11-14 18:17:12', '2020-11-14 18:17:12', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 761612'),
(1154, 'Admin', '2020-11-14 18:17:30', '2020-11-14 18:17:30', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 761387'),
(1155, 'Admin', '2020-11-14 18:17:39', '2020-11-14 18:17:39', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 760921'),
(1156, 'gusangulomele89', '2020-11-14 18:17:49', '2020-11-14 18:17:49', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 760921'),
(1157, 'Admin', '2020-11-14 18:18:16', '2020-11-14 18:18:16', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 760921'),
(1158, 'gusangulomele89', '2020-11-14 18:18:23', '2020-11-14 18:18:23', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 760921'),
(1159, 'gusangulomele89', '2020-11-14 18:18:43', '2020-11-14 18:18:43', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 760921'),
(1160, 'Admin', '2020-11-14 18:19:05', '2020-11-14 18:19:05', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 760441'),
(1161, 'Admin', '2020-11-14 18:19:13', '2020-11-14 18:19:13', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 760148'),
(1162, 'Admin', '2020-11-14 18:19:21', '2020-11-14 18:19:21', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 759862'),
(1163, 'Admin', '2020-11-14 18:19:29', '2020-11-14 18:19:29', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 759266'),
(1164, 'Admin', '2020-11-14 18:19:37', '2020-11-14 18:19:37', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 758974'),
(1165, 'gusangulomele89', '2020-11-14 18:19:49', '2020-11-14 18:19:49', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 758974'),
(1166, 'gusangulomele89', '2020-11-14 18:20:23', '2020-11-14 18:20:23', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 758974'),
(1167, 'gusangulomele89', '2020-11-14 18:20:45', '2020-11-14 18:20:45', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 758974'),
(1168, 'Admin', '2020-11-14 18:24:27', '2020-11-14 18:24:27', 'CONSULTA FOLIO 001231', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =001231'),
(1169, 'Admin', '2020-11-14 18:24:58', '2020-11-14 18:24:58', 'IMPRESIÓN DEL FOLIO No. 001231', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n            responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n            folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n            folios.observaciones, folios.itipopractica\r\n            from catfolios as folios\r\n            left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n            left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n            left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n            left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n            left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n            where folios.folio =001231'),
(1170, 'Admin', '2020-11-14 18:48:23', '2020-11-14 18:48:23', 'CONSULTA FOLIO 001200', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =001200'),
(1171, 'Admin', '2020-11-14 18:48:29', '2020-11-14 18:48:29', 'IMPRESIÓN DEL FOLIO No. 001200', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n            responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n            folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n            folios.observaciones, folios.itipopractica\r\n            from catfolios as folios\r\n            left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n            left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n            left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n            left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n            left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n            where folios.folio =001200'),
(1172, 'Admin', '2020-11-14 18:51:08', '2020-11-14 18:51:08', 'CONSULTA FOLIO 001200', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =001200'),
(1173, 'Admin', '2020-11-14 18:51:11', '2020-11-14 18:51:11', 'IMPRESIÓN DEL FOLIO No. 001200', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n            responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n            folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n            folios.observaciones, folios.itipopractica\r\n            from catfolios as folios\r\n            left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n            left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n            left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n            left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n            left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n            where folios.folio =001200'),
(1174, 'gusangulomele89', '2020-11-14 19:15:30', '2020-11-14 19:15:30', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,gusangulomele89,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1175, 'Admin', '2020-11-14 19:16:07', '2020-11-14 19:16:07', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1176, 'Admin', '2021-02-11 16:32:56', '2021-02-11 16:32:56', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1177, 'Admin', '2021-02-11 16:34:10', '2021-02-11 16:34:10', 'RESET password', 'SELECT usuario.id, usuario.nombre, usuario.apellido, usuario.username, usuario.fechaalta, \r\n                roles.idcatrol, roles.rolnombre FROM usuarios as usuario inner join catroles as roles on roles.idcatrol = usuario.idcatrol where usuario.id = 5'),
(1178, 'Admin', '2021-02-11 16:34:55', '2021-02-11 16:34:55', 'RESET password', 'update usuarios set password = $2y$10$s7hEUpf03Am6/mmdWImC/.e/1QciIbIc0tPWb0zzGNwnRL6vcwE.C where id = 5'),
(1179, 'Admin', '2021-02-11 16:35:05', '2021-02-11 16:35:05', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1180, 'Admin', '2021-02-11 16:35:17', '2021-02-11 16:35:17', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1181, 'Admin', '2021-02-11 16:38:06', '2021-02-11 16:38:06', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1182, 'jonathan', '2021-02-11 16:39:44', '2021-02-11 16:39:44', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,jonathan,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1183, 'Admin', '2021-02-11 16:40:41', '2021-02-11 16:40:41', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 1001215'),
(1184, 'jonathan', '2021-02-11 16:41:11', '2021-02-11 16:41:11', 'RESET password', 'SELECT usuario.id, usuario.nombre, usuario.apellido, usuario.username, usuario.fechaalta, \r\n                roles.idcatrol, roles.rolnombre FROM usuarios as usuario inner join catroles as roles on roles.idcatrol = usuario.idcatrol where usuario.id = 2'),
(1185, 'Admin', '2021-02-11 16:43:26', '2021-02-11 16:43:26', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 1022075'),
(1186, 'Admin', '2021-02-11 16:43:53', '2021-02-11 16:43:53', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 1026075'),
(1187, 'Admin', '2021-02-11 16:45:08', '2021-02-11 16:45:08', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 1022075'),
(1188, 'Admin', '2021-02-11 16:45:20', '2021-02-11 16:45:20', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 1026075'),
(1189, 'Admin', '2021-02-11 16:48:16', '2021-02-11 16:48:16', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 1001215'),
(1190, 'jonathan', '2021-02-11 16:48:22', '2021-02-11 16:48:22', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,jonathan,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1191, 'Admin', '2021-02-11 16:48:43', '2021-02-11 16:48:43', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1192, 'Admin', '2021-06-22 22:57:51', '2021-06-22 22:57:51', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1193, 'Admin', '2021-06-22 22:58:08', '2021-06-22 22:58:08', 'CONSULTA FOLIO 000154', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma,  \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =000154'),
(1194, 'Admin', '2021-06-22 22:58:16', '2021-06-22 22:58:16', 'CONSULTA FOLIO 000015', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma,  \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =000015'),
(1195, 'Admin', '2021-06-22 22:58:23', '2021-06-22 22:58:23', 'CONSULTA FOLIO 000435', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma,  \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =000435'),
(1196, 'Admin', '2021-06-22 22:59:01', '2021-06-22 22:59:01', 'CONSULTA FOLIO 000015', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma,  \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =000015'),
(1197, 'Admin', '2021-06-22 22:59:21', '2021-06-22 22:59:21', 'CONSULTA FOLIO 001231', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma,  \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =001231'),
(1198, 'Admin', '2021-06-22 22:59:41', '2021-06-22 22:59:41', 'CONSULTA FOLIO 001231', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma,  \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =001231'),
(1199, 'Admin', '2021-06-22 22:59:47', '2021-06-22 22:59:47', 'IMPRESIÓN DEL FOLIO No. 001231', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, \r\n            responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n            folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n            folios.observaciones, folios.itipopractica\r\n            from catfolios as folios\r\n            left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n            left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n            left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n            left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n            left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n            where folios.folio =001231'),
(1200, 'Admin', '2021-06-22 23:00:04', '2021-06-22 23:00:04', 'CONSULTA FOLIO 000001', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma,  \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =000001'),
(1201, 'Admin', '2021-06-22 23:01:38', '2021-06-22 23:01:38', 'SEL Instructor de Tiro', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n                elemento.nombre, sector.sectornombre as sector,\r\n                arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n                FROM personal as elemento\r\n                left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n                left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n                left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n                left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n                where elemento.noempleado = 759990'),
(1202, 'Admin', '2021-06-22 23:01:54', '2021-06-22 23:01:54', 'SEL Instructor de Tiro', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n                elemento.nombre, sector.sectornombre as sector,\r\n                arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n                FROM personal as elemento\r\n                left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n                left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n                left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n                left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n                where elemento.noempleado = 759990'),
(1203, 'Admin', '2021-06-22 23:02:56', '2021-06-22 23:02:56', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1204, 'Admin', '2021-06-22 23:03:11', '2021-06-22 23:03:11', 'CONSULTA FOLIO 001231', 'select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma,  \r\n                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,\r\n                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,\r\n                folios.observaciones, folios.itipopractica\r\n                from catfolios as folios\r\n                left join catsector as sector on folios.idcatsector = sector.idcatsector\r\n                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas\r\n                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo\r\n                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores\r\n                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores\r\n                where folios.folio =001231'),
(1205, 'Admin', '2021-06-22 23:03:50', '2021-06-22 23:03:50', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1206, 'Admin', '2021-06-23 12:54:11', '2021-06-23 12:54:11', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1207, 'Admin', '2021-06-23 12:54:34', '2021-06-23 12:54:34', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1208, 'Admin', '2021-06-23 13:13:23', '2021-06-23 13:13:23', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 759990'),
(1209, 'Admin', '2021-06-23 13:46:52', '2021-06-23 13:46:52', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1210, 'Admin', '2021-06-23 13:47:15', '2021-06-23 13:47:15', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1211, 'Admin', '2021-06-23 13:47:40', '2021-06-23 13:47:40', 'UNLOCK user', 'update usuarios set useractivado = 1, sesionactiva = 0  where id = 5'),
(1212, 'Admin', '2021-06-23 13:47:47', '2021-06-23 13:47:47', 'RESET password', 'SELECT usuario.id, usuario.nombre, usuario.apellido, usuario.username, usuario.fechaalta, \r\n                roles.idcatrol, roles.rolnombre FROM usuarios as usuario inner join catroles as roles on roles.idcatrol = usuario.idcatrol where usuario.id = 1'),
(1213, 'Admin', '2021-06-24 17:52:38', '2021-06-24 17:52:38', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1214, 'Admin', '2021-06-24 17:53:30', '2021-06-24 17:53:30', 'DEL Responsable', 'delete from catrespongrupo where noempleado = 836498'),
(1215, 'Admin', '2021-06-24 17:53:45', '2021-06-24 17:53:45', 'SELECT Buscar Responsable', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n                elemento.nombre, sector.sectornombre as sector,\r\n                arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n                FROM personal as elemento\r\n                left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n                left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n                left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n                left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n                where elemento.noempleado =  	836498'),
(1216, 'Admin', '2021-06-24 17:54:51', '2021-06-24 17:54:51', 'SELECT Buscar Responsable', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n                elemento.nombre, sector.sectornombre as sector,\r\n                arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n                FROM personal as elemento\r\n                left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n                left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n                left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n                left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n                where elemento.noempleado =  	85858585'),
(1217, 'Admin', '2021-06-24 17:55:17', '2021-06-24 17:55:17', 'DEL Responsable', 'delete from catrespongrupo where noempleado = 759990'),
(1218, 'Admin', '2021-06-24 17:55:40', '2021-06-24 17:55:40', 'SELECT Buscar Responsable', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n                elemento.nombre, sector.sectornombre as sector,\r\n                arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n                FROM personal as elemento\r\n                left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n                left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n                left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n                left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n                where elemento.noempleado = 759990'),
(1219, 'Admin', '2021-06-24 17:55:49', '2021-06-24 17:55:49', 'INS Responsable', 'insert into catrespongrupo values(DEFAULT,759990,,1)'),
(1220, 'Admin', '2021-06-24 17:58:01', '2021-06-24 17:58:01', 'DEL Responsable', 'delete from catrespongrupo where noempleado = 759990');
INSERT INTO `bitacceso` (`idacceso`, `username`, `fechahora`, `hora`, `bitoperacion`, `bitinstruccion`) VALUES
(1221, 'Admin', '2021-06-24 17:59:02', '2021-06-24 17:59:02', 'SELECT Buscar Responsable', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n                elemento.nombre, sector.sectornombre as sector,\r\n                arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n                FROM personal as elemento\r\n                left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n                left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n                left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n                left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n                where elemento.noempleado = 759990'),
(1222, 'Admin', '2021-06-24 18:03:03', '2021-06-24 18:03:03', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 851141'),
(1223, 'Admin', '2021-06-24 18:06:40', '2021-06-24 18:06:40', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 759990'),
(1224, 'Admin', '2021-06-25 18:16:12', '2021-06-25 18:16:12', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1225, 'Admin', '2021-07-06 18:52:03', '2021-07-06 18:52:03', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1226, 'Admin', '2021-07-06 18:52:34', '2021-07-06 18:52:34', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1227, 'Admin', '2021-07-06 20:34:09', '2021-07-06 20:34:09', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1228, 'Admin', '2021-07-06 20:34:25', '2021-07-06 20:34:25', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1229, 'Admin', '2021-07-06 20:35:42', '2021-07-06 20:35:42', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1230, 'Admin', '2021-07-06 20:36:17', '2021-07-06 20:36:17', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1231, 'Admin', '2021-07-06 20:45:39', '2021-07-06 20:45:39', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1232, 'Admin', '2021-07-06 20:47:24', '2021-07-06 20:47:24', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1233, 'Admin', '2021-07-06 20:47:57', '2021-07-06 20:47:57', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1234, 'Admin', '2021-07-06 20:48:20', '2021-07-06 20:48:20', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1235, 'Admin', '2021-07-06 20:48:40', '2021-07-06 20:48:40', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1236, 'Admin', '2021-07-06 20:49:18', '2021-07-06 20:49:18', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1237, 'Admin', '2021-07-06 22:20:08', '2021-07-06 22:20:08', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1238, 'Admin', '2021-07-06 22:25:23', '2021-07-06 22:25:23', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1239, 'Admin', '2021-07-06 22:25:42', '2021-07-06 22:25:42', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1240, 'Admin', '2021-07-06 22:26:26', '2021-07-06 22:26:26', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1241, 'Admin', '2021-07-06 22:27:33', '2021-07-06 22:27:33', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1242, 'Admin', '2021-07-06 22:28:02', '2021-07-06 22:28:02', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1243, 'Admin', '2021-07-06 22:48:04', '2021-07-06 22:48:04', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 1253'),
(1244, 'Admin', '2021-07-06 22:50:14', '2021-07-06 22:50:14', 'INS sector', 'insert into catsector values(DEFAULT,Sector A,SECTOR,solo para el equipo 1)'),
(1245, 'Admin', '2021-07-06 23:00:36', '2021-07-06 23:00:36', 'SELECT Buscar Responsable', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n                elemento.nombre, sector.sectornombre as sector,\r\n                arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n                FROM personal as elemento\r\n                left join catniveles as grado on grado.idcatgrados = elemento.idcatgrados\r\n                left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n                left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n                left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n                where elemento.noempleado = 1253'),
(1246, 'Admin', '2021-07-06 23:01:42', '2021-07-06 23:01:42', 'SELECT Buscar Responsable', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n                elemento.nombre, sector.sectornombre as sector,\r\n                arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n                FROM personal as elemento\r\n                left join catniveles as grado on grado.idcatgrados = elemento.idcatgrados\r\n                left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n                left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n                left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n                where elemento.noempleado = 1253'),
(1247, 'Admin', '2021-07-06 23:01:45', '2021-07-06 23:01:45', 'INS Responsable', 'insert into catrespongrupo values(DEFAULT,1253,,1)'),
(1248, 'Admin', '2021-07-06 23:08:24', '2021-07-06 23:08:24', 'SEL Instructor de Tiro', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n                elemento.nombre, sector.sectornombre as sector,\r\n                arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n                FROM personal as elemento\r\n                left join catniveles as grado on grado.idcatgrados = elemento.idcatgrados\r\n                left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n                left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n                left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n                where elemento.noempleado = 1572'),
(1249, 'Admin', '2021-07-06 23:08:26', '2021-07-06 23:08:26', 'INS Instructor de Tiro', 'insert into catinstructores values(DEFAULT,1572,)'),
(1250, 'Admin', '2021-07-06 23:14:43', '2021-07-06 23:14:43', 'SEL Jefe de Campo', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n                elemento.nombre, sector.sectornombre as sector,\r\n                arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n                FROM personal as elemento\r\n                left join catniveles as grado on grado.idcatgrados = elemento.idcatgrados\r\n                left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n                left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n                left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n                where elemento.noempleado = 1863'),
(1251, 'Admin', '2021-07-06 23:14:46', '2021-07-06 23:14:46', 'INS Jefe de Campo', 'insert into catrevisores values(DEFAULT,1863,,1)'),
(1252, 'Admin', '2021-07-06 23:29:15', '2021-07-06 23:29:15', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 1253'),
(1253, 'Admin', '2021-07-06 23:29:23', '2021-07-06 23:29:23', 'UDP elemento', 'update personal set idcatgrados = 5, noempleado = 1253,nombre = RAMIREZ LOPEZ JUAN ARMANDO, idcatsector = 0,\r\n                idcatarmas = 4, idcatsituacion = 1, observaciones = SIN OBSERVACIONES where noempleado = 1253'),
(1254, 'Admin', '2021-07-06 23:29:29', '2021-07-06 23:29:29', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 1253'),
(1255, 'Admin', '2021-07-06 23:37:44', '2021-07-06 23:37:44', 'CIERRE DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),CIERRE DE SESIÓN,SQL)'),
(1256, 'Admin', '2021-07-06 23:39:56', '2021-07-06 23:39:56', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1257, 'Admin', '2021-07-06 23:40:39', '2021-07-06 23:40:39', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 1253'),
(1258, 'Admin', '2021-07-06 23:40:53', '2021-07-06 23:40:53', 'UDP elemento', 'update personal set idcatgrados = 5, noempleado = 1253,nombre = RAMIREZ LOPEZ JUAN ARMANDO, idcatsector = 60,\r\n                idcatarmas = 4, idcatsituacion = 1, observaciones = SIN OBSERVACIONES where noempleado = 1253'),
(1259, 'Admin', '2021-07-06 23:42:35', '2021-07-06 23:42:35', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 1863'),
(1260, 'Admin', '2021-07-06 23:42:48', '2021-07-06 23:42:48', 'UDP elemento', 'update personal set idcatgrados = 6, noempleado = 1863,nombre = AMADOR MENDOZA GERARDO PACIFICO, idcatsector = 60,\r\n                idcatarmas = 4, idcatsituacion = 1, observaciones = SIN OBSERVACIONES where noempleado = 1863'),
(1261, 'Admin', '2021-07-06 23:43:33', '2021-07-06 23:43:33', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 1572'),
(1262, 'Admin', '2021-07-06 23:44:06', '2021-07-06 23:44:06', 'INS sector', 'insert into catsector values(DEFAULT,Sector de Instructores,SECTOR,Grupo de instructores de tiro.)'),
(1263, 'Admin', '2021-07-06 23:44:26', '2021-07-06 23:44:26', 'SELECT elemento', 'SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, \r\n        elemento.nombre, sector.sectornombre as sector,\r\n        arma.tipoarma as arma, situacion.situacion, elemento.observaciones\r\n        FROM personal as elemento\r\n        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados\r\n        left join catsector as sector on sector.idcatsector = elemento.idcatsector\r\n        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas\r\n        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion\r\n        where elemento.noempleado = 1572'),
(1264, 'Admin', '2021-07-06 23:44:38', '2021-07-06 23:44:38', 'UDP elemento', 'update personal set idcatgrados = 2, noempleado = 1572,nombre = AGUIRRE RODRIGUEZ FELIPE, idcatsector = 61,\r\n                idcatarmas = 4, idcatsituacion = 1, observaciones = SIN OBSERVACIONES where noempleado = 1572'),
(1265, 'Admin', '2021-07-07 00:21:09', '2021-07-07 00:21:09', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)'),
(1266, 'Admin', '2021-07-07 00:46:03', '2021-07-07 00:46:03', 'INICIO DE SESIÓN', 'insert into bitacceso values (DEFAULT,Admin,NOW(),NOW(),INICIO DE SESIÓN,SQL)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catarmas`
--

DROP TABLE IF EXISTS `catarmas`;
CREATE TABLE IF NOT EXISTS `catarmas` (
  `idcatarmas` int NOT NULL AUTO_INCREMENT,
  `tipoarma` varchar(100) NOT NULL,
  `calibre` varchar(10) NOT NULL,
  `observaciones` varchar(300) NOT NULL,
  PRIMARY KEY (`idcatarmas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catarmas`
--

INSERT INTO `catarmas` (`idcatarmas`, `tipoarma`, `calibre`, `observaciones`) VALUES
(1, 'PISTOLA', '9 mm', 'SIN OBSERVACIONES'),
(2, 'SUB AMETRALLADORA', '9 mm', 'SIN OBSERVACIONES'),
(3, 'FUSIL', '.223', 'SIN OBSERVACIONES'),
(4, 'NO HA TIRADO', '', ''),
(5, 'FALTANDO', '', ''),
(6, 'FUSIL', '5.56', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catfolios`
--

DROP TABLE IF EXISTS `catfolios`;
CREATE TABLE IF NOT EXISTS `catfolios` (
  `idcatfolios` int NOT NULL AUTO_INCREMENT,
  `folio` varchar(30) NOT NULL,
  `campotiro` varchar(50) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  `idcatsector` int NOT NULL,
  `idcatarmas` int NOT NULL,
  `idcatrespongrupo` int NOT NULL,
  `idcatrevisores` int NOT NULL,
  `idcatinstructores` int NOT NULL,
  `carconsumidos` int DEFAULT NULL,
  `casentregados` int DEFAULT NULL,
  `casextraviados` int DEFAULT NULL,
  `siluetas` int DEFAULT NULL,
  `asistentes` int NOT NULL,
  `observaciones` varchar(500) DEFAULT NULL,
  `itipopractica` int DEFAULT NULL,
  PRIMARY KEY (`idcatfolios`),
  KEY `idcatsector` (`idcatsector`),
  KEY `idcatarmas` (`idcatarmas`),
  KEY `idcatrespongrupo` (`idcatrespongrupo`),
  KEY `idcatrevisores` (`idcatrevisores`),
  KEY `idcatinstructores` (`idcatinstructores`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catinstructores`
--

DROP TABLE IF EXISTS `catinstructores`;
CREATE TABLE IF NOT EXISTS `catinstructores` (
  `idcatinstructores` int NOT NULL AUTO_INCREMENT,
  `noempleado` int NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idcatinstructores`),
  KEY `noempleado` (`noempleado`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catinstructores`
--

INSERT INTO `catinstructores` (`idcatinstructores`, `noempleado`, `observaciones`) VALUES
(15, 759990, ''),
(25, 740043, ''),
(39, 735732, ''),
(40, 710847, ''),
(41, 745102, ''),
(42, 762064, ''),
(44, 757738, ''),
(45, 753662, ''),
(46, 754143, ''),
(47, 1572, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catniveles`
--

DROP TABLE IF EXISTS `catniveles`;
CREATE TABLE IF NOT EXISTS `catniveles` (
  `idcatgrados` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idcatgrados`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catniveles`
--

INSERT INTO `catniveles` (`idcatgrados`, `nombre`, `observaciones`) VALUES
(1, 'SUPER INTENDENTE', 'SIN OBSERVACIONES'),
(2, 'PRIMER INSPECTOR', 'SIN OBSERVACIONES'),
(3, 'SEGUNDO INSPECTOR', 'SIN OBSERVACIONES'),
(4, 'SUB INSPECTOR', 'SIN OBSERVACIONES'),
(5, 'PRIMER OFICIAL', 'SIN OBSERVACIONES'),
(6, 'SEGUNDO OFICIAL', 'SIN OBSERVACIONES'),
(7, 'SUB OFICIAL', 'SIN OBSERVACIONES'),
(8, 'POLICIA 1°', 'SIN OBSERVACIONES'),
(9, 'POLICIA 2°', 'SIN OBSERVACIONES'),
(10, 'POLICIA', 'SIN OBSERVACIONES'),
(11, 'POLICIA 3o', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catrespongrupo`
--

DROP TABLE IF EXISTS `catrespongrupo`;
CREATE TABLE IF NOT EXISTS `catrespongrupo` (
  `idcatrespongrupo` int NOT NULL AUTO_INCREMENT,
  `noempleado` int NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `activo` int NOT NULL,
  PRIMARY KEY (`idcatrespongrupo`),
  KEY `noempleado` (`noempleado`),
  KEY `idcatsector` (`observaciones`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catrespongrupo`
--

INSERT INTO `catrespongrupo` (`idcatrespongrupo`, `noempleado`, `observaciones`, `activo`) VALUES
(1, 1253, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catrevisores`
--

DROP TABLE IF EXISTS `catrevisores`;
CREATE TABLE IF NOT EXISTS `catrevisores` (
  `idcatrevisores` int NOT NULL AUTO_INCREMENT,
  `noempleado` int NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  `activo` int NOT NULL,
  PRIMARY KEY (`idcatrevisores`),
  KEY `noempleado` (`noempleado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catrevisores`
--

INSERT INTO `catrevisores` (`idcatrevisores`, `noempleado`, `observaciones`, `activo`) VALUES
(1, 1863, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catroles`
--

DROP TABLE IF EXISTS `catroles`;
CREATE TABLE IF NOT EXISTS `catroles` (
  `idcatrol` int NOT NULL AUTO_INCREMENT,
  `rolnombre` varchar(30) NOT NULL,
  `observaciones` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idcatrol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catroles`
--

INSERT INTO `catroles` (`idcatrol`, `rolnombre`, `observaciones`) VALUES
(1, 'Administrador', 'Ninguna'),
(2, 'Usuario', 'Ninguna'),
(3, 'Consulta', 'Instructor de Cancha de Tiro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catsector`
--

DROP TABLE IF EXISTS `catsector`;
CREATE TABLE IF NOT EXISTS `catsector` (
  `idcatsector` int NOT NULL AUTO_INCREMENT,
  `sectornombre` varchar(100) NOT NULL,
  `sectortipo` varchar(100) NOT NULL,
  `sectorobservaciones` varchar(300) NOT NULL,
  PRIMARY KEY (`idcatsector`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catsector`
--

INSERT INTO `catsector` (`idcatsector`, `sectornombre`, `sectortipo`, `sectorobservaciones`) VALUES
(60, 'Sector A', 'SECTOR', 'solo para el equipo 1'),
(61, 'Sector de Instructores', 'SECTOR', 'Grupo de instructores de tiro.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catsituacion`
--

DROP TABLE IF EXISTS `catsituacion`;
CREATE TABLE IF NOT EXISTS `catsituacion` (
  `idcatsituacion` int NOT NULL AUTO_INCREMENT,
  `situacion` varchar(20) NOT NULL,
  `observaciones` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idcatsituacion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catsituacion`
--

INSERT INTO `catsituacion` (`idcatsituacion`, `situacion`, `observaciones`) VALUES
(1, 'ACTIVO', 'SIN OBSERVACIONES'),
(2, 'SUBDIRECTOR', '25 cartuchos'),
(3, 'DIRECTOR', '50 cartuchos'),
(4, 'RECLUSORIO', 'SIN OBSERVACIONES'),
(5, 'DEFUNCIÃ“N', 'SIN OBSERVACIONES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

DROP TABLE IF EXISTS `lista`;
CREATE TABLE IF NOT EXISTS `lista` (
  `id` int NOT NULL AUTO_INCREMENT,
  `noempleado` int DEFAULT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  `fecha` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `noempleado` (`noempleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `idpersonal` int NOT NULL AUTO_INCREMENT,
  `idcatgrados` int NOT NULL,
  `recibo` varchar(100) DEFAULT NULL,
  `noempleado` int NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `idcatsector` int NOT NULL,
  `idcatarmas` int NOT NULL,
  `idcatsituacion` int NOT NULL,
  `observaciones` varchar(500) NOT NULL,
  PRIMARY KEY (`idpersonal`),
  KEY `idcatgrados` (`idcatgrados`),
  KEY `idcatsector` (`idcatsector`),
  KEY `idcatarmas` (`idcatarmas`),
  KEY `idcatsituacion` (`idcatsituacion`)
) ENGINE=InnoDB AUTO_INCREMENT=51639 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`idpersonal`, `idcatgrados`, `recibo`, `noempleado`, `nombre`, `idcatsector`, `idcatarmas`, `idcatsituacion`, `observaciones`) VALUES
(1, 5, 'foto/1253.jpg', 1253, 'RAMIREZ LOPEZ JUAN ARMANDO', 60, 4, 1, 'SIN OBSERVACIONES'),
(2, 2, 'foto/1572.jpg', 1572, 'AGUIRRE RODRIGUEZ FELIPE', 61, 4, 1, 'SIN OBSERVACIONES'),
(3, 6, 'foto/1863.jpg', 1863, 'AMADOR MENDOZA GERARDO PACIFICO', 60, 4, 1, 'SIN OBSERVACIONES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `polasistencia`
--

DROP TABLE IF EXISTS `polasistencia`;
CREATE TABLE IF NOT EXISTS `polasistencia` (
  `icveasistencia` int NOT NULL AUTO_INCREMENT,
  `dfecha` varchar(50) NOT NULL,
  `icantasistentes` int DEFAULT NULL,
  `icantfaltistas` int DEFAULT NULL,
  `icantcartuchos` int DEFAULT NULL,
  PRIMARY KEY (`icveasistencia`),
  UNIQUE KEY `icveasistencia_UNIQUE` (`icveasistencia`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `polasistencia`
--

INSERT INTO `polasistencia` (`icveasistencia`, `dfecha`, `icantasistentes`, `icantfaltistas`, `icantcartuchos`) VALUES
(1, '2020-03-28', 4, 0, 72),
(2, '2020-03-30', 1, 0, 18),
(3, '2020-11-12', 4, 0, 72),
(4, '2020-11-15', 37, 0, 666),
(5, '2021-02-11', 6, 0, 108),
(6, '2021-06-23', 1, 0, 18),
(7, '2021-06-24', 2, 0, 36),
(8, '2021-07-07', 10, 0, 180);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `idcatrol` int NOT NULL,
  `useractivado` int NOT NULL,
  `password` varchar(250) NOT NULL,
  `sesionactiva` int NOT NULL,
  `fechaalta` varchar(150) NOT NULL,
  `fechaultimamod` varchar(150) NOT NULL,
  `dfechavencimiento` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idcatrol` (`idcatrol`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `username`, `idcatrol`, `useractivado`, `password`, `sesionactiva`, `fechaalta`, `fechaultimamod`, `dfechavencimiento`) VALUES
(1, 'Gustavo', 'Angulo', 'Admin', 1, 1, '$2y$10$zR.T8t3yWHL6IJt4uX7SzeVEyO7k36fvQEaS2EpCqGqeY7AkjnKtq', 1, '', 'Sábado 09 de Septiembre de 2017', '2021-12-31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
