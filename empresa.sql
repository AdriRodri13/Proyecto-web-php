-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2024 a las 12:01:34
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
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `puesto` varchar(100) NOT NULL,
  `sueldo` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `email`, `puesto`, `sueldo`) VALUES
('ea5e02e7-92ef-11ef-bffa-107c614d864d', 'Ana Gomez', 'ana.gomez@example.com', 'Analista', 55000.00),
('ea5e0476-92ef-11ef-bffa-107c614d864d', 'Luis Fernandez', 'luis.fernandez@example.com', 'Desarrollador', 60000.00),
('ea5e04f5-92ef-11ef-bffa-107c614d864d', 'Maria Torres', 'maria.torres@example.com', 'Diseñador', 45000.00),
('ea5e055d-92ef-11ef-bffa-107c614d864d', 'Pedro Ramirez', 'pedro.ramirez@example.com', 'Tester', 40000.00),
('ea5e05c3-92ef-11ef-bffa-107c614d864d', 'Lucia Vargas', 'lucia.vargas@example.com', 'Product Owner', 75000.00),
('ea5e0629-92ef-11ef-bffa-107c614d864d', 'Carlos Mendoza', 'carlos.mendoza@example.com', 'Scrum Master', 70000.00),
('ea5e068a-92ef-11ef-bffa-107c614d864d', 'Elena Lopez', 'elena.lopez@example.com', 'Project Manager', 90000.00),
('ea5e06f4-92ef-11ef-bffa-107c614d864d', 'Diego Navarro', 'diego.navarro@example.com', 'Consultor', 65000.00),
('ea5e0759-92ef-11ef-bffa-107c614d864d', 'Sandra Castillo', 'sandra.castillo@example.com', 'Administrador', 50000.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
