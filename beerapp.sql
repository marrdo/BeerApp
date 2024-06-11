-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2024 a las 18:30:42
-- Versión del servidor: 8.0.36-0ubuntu0.22.04.1
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `beerapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cervezas`
--

CREATE TABLE `Cervezas` (
  `id` char(36) NOT NULL DEFAULT 'c13f1c36-122e-4884-966b-675cc747488b',
  `ref` varchar(20) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `media_valoracion` decimal(3,2) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `ibu` int DEFAULT NULL,
  `grados_alcohol` decimal(4,2) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `origen` varchar(50) DEFAULT NULL,
  `familia_estilos` varchar(50) DEFAULT NULL,
  `sabor_dominante` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Cervezas`
--

INSERT INTO `Cervezas` (`id`, `ref`, `slug`, `nombre`, `descripcion`, `precio`, `stock`, `media_valoracion`, `tipo`, `ibu`, `grados_alcohol`, `color`, `origen`, `familia_estilos`, `sabor_dominante`) VALUES
('27243a6d-68fc-489b-9a3e-3170230b3310', 'CER-0003', 'CER-0003', 'Una', 'Prueba', 1.00, 1, 3.00, '0', 1, 1.00, '0', 'islas-británicas', '12', 'madera'),
('83abcbda-dc8b-42ba-a7e9-da8f006f499d', 'CER-0001', 'CER-0001', 'Leffe', 'Cerveza de color dorado y espuma cremosa. De notable intensidad aromática, destaca por sus toques especiados a clavo y sus afrutados con matices de plátano y frutas maduras, todo ello con un fondo ligero de notas de malta. En boca resulta equilibrada de amargor moderado, con un punto dulce, cuerpo ligero y final seco.', 1.80, 1, 0.00, 'Ale', 20, 6.60, '2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint NOT NULL,
  `migration_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20240518223546, 'Users', '2024-05-18 20:44:02', '2024-05-18 20:44:02', 0),
(20240518223714, 'Beers', '2024-05-18 20:44:02', '2024-05-18 20:44:02', 0),
(20240518223720, 'Reviews', '2024-05-18 20:44:02', '2024-05-18 20:44:02', 0),
(20240519094945, 'Roles', '2024-05-19 07:55:12', '2024-05-19 07:55:12', 0),
(20240519095033, 'RolesUsuarios', '2024-05-19 07:55:12', '2024-05-19 07:55:13', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Resenas`
--

CREATE TABLE `Resenas` (
  `id` char(36) NOT NULL DEFAULT '4ffbd6b2-2cc4-46e3-a759-c4a25a024d2b',
  `ref` varchar(20) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `calificacion` decimal(3,2) NOT NULL,
  `user_id` char(36) NOT NULL,
  `cerveza_id` char(36) NOT NULL,
  `comentario` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Resenas`
--

INSERT INTO `Resenas` (`id`, `ref`, `slug`, `calificacion`, `user_id`, `cerveza_id`, `comentario`) VALUES
('265fa81f-810e-47cd-a56d-3b804939c921', 'RES-0004', 'RES-0004', 5.00, 'ceec536b-8372-4d98-afc7-82cd93e40bd4', '83abcbda-dc8b-42ba-a7e9-da8f006f499d', 'Ta buena'),
('94d2ff06-5de3-4d14-8dc1-3df71308f886', 'RES-0002', 'RES-0002', 1.00, 'ceec536b-8372-4d98-afc7-82cd93e40bd4', '27243a6d-68fc-489b-9a3e-3170230b3310', 'wer'),
('afe71e50-afcb-49f6-bc94-50366cd3b403', 'RES-0003', 'RES-0003', 1.00, 'ceec536b-8372-4d98-afc7-82cd93e40bd4', '27243a6d-68fc-489b-9a3e-3170230b3310', 'wer'),
('bef7afa0-17af-11ef-9124-08002796b452', 'RES-0001', 'RES-0001', 5.00, '7d999e0b-8ca6-4486-9c0e-84733948061c', '27243a6d-68fc-489b-9a3e-3170230b3310', 'Prueba 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Roles`
--

CREATE TABLE `Roles` (
  `id` char(36) NOT NULL DEFAULT '17e3127c-07fd-4dfd-a71b-8225d07cf96a',
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Roles`
--

INSERT INTO `Roles` (`id`, `nombre`) VALUES
('3af35726-15ce-11ef-b038-08002796b452', 'admin'),
('40d46abf-15ce-11ef-b038-08002796b452', 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE `Users` (
  `id` char(36) NOT NULL DEFAULT 'b85904dd-ab8f-4acd-901b-3bbf728d2628',
  `dni` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Users`
--

INSERT INTO `Users` (`id`, `dni`, `nombre`, `apellidos`, `email`, `direccion`, `password`) VALUES
('7d999e0b-8ca6-4486-9c0e-84733948061c', '90345693M', 'user', 'prueba', 'prueba@es.es', 'prueba', '$2y$10$JAsiJE7tFeXrHbzUudX.g.N9ZF0wgJ2K/zKeTz6p7FUVbDn3NveU6'),
('ceec536b-8372-4d98-afc7-82cd93e40bd4', '2304958934N', 'root', 'admin', 'root@admin.es', 'Sevilla', '$2y$10$mM5IQ5JbzNUOLxPRjNY5t.2NRm6SG9EAQDMDOH5/orvu32Vcz.Kgq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users_roles`
--

CREATE TABLE `Users_roles` (
  `id` int NOT NULL,
  `user_id` char(36) NOT NULL,
  `roles_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Users_roles`
--

INSERT INTO `Users_roles` (`id`, `user_id`, `roles_id`) VALUES
(1, 'ceec536b-8372-4d98-afc7-82cd93e40bd4', '3af35726-15ce-11ef-b038-08002796b452'),
(2, '7d999e0b-8ca6-4486-9c0e-84733948061c', '40d46abf-15ce-11ef-b038-08002796b452');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Cervezas`
--
ALTER TABLE `Cervezas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref` (`ref`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indices de la tabla `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `Resenas`
--
ALTER TABLE `Resenas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref` (`ref`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cerveza_id` (`cerveza_id`);

--
-- Indices de la tabla `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `Users_roles`
--
ALTER TABLE `Users_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `BY_USER_ID` (`user_id`),
  ADD KEY `BY_ROLES_ID` (`roles_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Users_roles`
--
ALTER TABLE `Users_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Resenas`
--
ALTER TABLE `Resenas`
  ADD CONSTRAINT `Resenas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Resenas_ibfk_2` FOREIGN KEY (`cerveza_id`) REFERENCES `Cervezas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Users_roles`
--
ALTER TABLE `Users_roles`
  ADD CONSTRAINT `Users_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users_roles_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `Roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
