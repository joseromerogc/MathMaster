-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-04-2017 a las 04:28:27
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mathmaster`
--

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Matemática Positiva', 'matematicapositiva2012@gmail.com', '$2y$10$0s7eqM3BZEpHqgAfsfR/xO2w2fHWpAb4CUeumaOvrFvN3mBtEcKd6', 'U2VkS7LvXu4jNMcsojLB6YIRUd9DMa2Tu7B6tzbTHETnyjqIvCAIyKQnhzGf', '2017-01-06 17:27:31', '2017-04-13 16:15:12'),
(2, 'Participantex', 'participante@gmail.com', '$2y$10$DfcvMLCmG5IrgWflPavb0uddgYoWgy4.GhRHofDIyW5FWD7G2PwoS', 'DTlOVWemB12UHMc9eMbWIU2wtWoWvFMJdSZlomsaxAkxI2diDk1cXCsT9gbk', '2017-01-12 02:08:15', '2017-04-11 00:14:44'),
(3, 'Participante 2', 'participante2@gmail.com', '$2y$10$h.cd9wPndZPB/Ibahjd84uUO7lgZ.xAdLdVwu1PHYB.eG9giy9.J.', 'oJBs5i03YsZHGexgVV8nqs2M1q72F0Ne3Rbk3ODg101s3twd7IJGw5vnl8bA', '2017-01-12 02:11:13', '2017-01-12 02:21:49'),
(4, 'Participante 3', 'participante3@gmail.com', '$2y$10$XoVZ1i7SIWmpqa/dR5n8ge3553VLdVNLnjeyA.4DUzFc.BFzDPi76', 'vqnEmfYcS55lR8cNlaDaSj4OaEVVJxHZriYeq5bMQngjZTptN84cZhl06fNS', '2017-01-12 02:22:14', '2017-04-11 15:18:57'),
(5, 'Participante 4', 'participante4@gmail.com', '$2y$10$c7FGQ2KG7NmwXR5BWs.o6e9frey8dtIPGYTDSRRmTc0FNPbV/yP4O', 'V9OwGpuxn5y6Vi35yU0DRN2OiylCdxgJsK3Z8whgX8lbVEwY4AuFSf5DSEsQ', '2017-01-12 03:02:01', '2017-04-11 00:15:22'),
(6, 'Prueba', 'pruebaxxx@gmail.com', '$2y$10$Lpkf3iWW1DlGGuy5maNSjeVsPrKedS5l/W/BXdJxHpv/gDzuVoHX2', '0FWY8OnfY3Vzh0nxa12rYSFKPjtkT3RtbQo2IfpnnSrRIRUPenhPwxevEuFm', '2017-04-11 17:45:29', '2017-04-13 16:37:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
