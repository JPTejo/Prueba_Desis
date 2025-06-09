-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2025 at 06:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prueba_desis`
--

-- --------------------------------------------------------

--
-- Table structure for table `bodegas`
--

CREATE TABLE `bodegas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bodegas`
--

INSERT INTO `bodegas` (`id`, `nombre`) VALUES
(1, 'Bodega Norte'),
(2, 'Bodega Centro'),
(3, 'Bodega  Sur');

-- --------------------------------------------------------

--
-- Table structure for table `monedas`
--

CREATE TABLE `monedas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monedas`
--

INSERT INTO `monedas` (`id`, `nombre`) VALUES
(1, 'Peso Chileno'),
(2, 'Euro'),
(3, 'DÓLAR');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_bodega` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_moneda` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `materiales` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `id_bodega`, `id_sucursal`, `id_moneda`, `precio`, `descripcion`, `materiales`) VALUES
(4, 'PROD01K', 'Set Comedor', 1, 7, 3, 1500.00, 'Elegante set de comedor de madera natural', 'madera, vidrio'),
(7, 'FM283', 'Salmon', 2, 10, 3, 43.58, 'Lote 24, caja 24', 'plástico, metal'),
(8, 'JK4820', 'Jurel tipo salmon', 2, 9, 1, 150.00, 'Una caja de 24 unidades de jurel', 'madera, vidrio'),
(9, 'Prod-K05', 'Set de cuchillos', 3, 13, 2, 863.11, 'Un set de cuchillos de cocina', 'plástico, metal');

-- --------------------------------------------------------

--
-- Table structure for table `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_bodega` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre`, `id_bodega`) VALUES
(6, 'Sucursal NORTE-Oriente', 1),
(7, 'Sucursal NORTE-Centro', 1),
(8, 'Sucursal NORTE-Occidente', 1),
(9, 'Sucursal CENTRO-Oriente', 2),
(10, 'Sucursal CENTRO-Centro', 2),
(11, 'Sucursal CENTRO-Occidente', 2),
(12, 'Sucursal SUR-Oriente', 3),
(13, 'Sucursal SUR-Centro', 3),
(14, 'Sucursal SUR-Occidente', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monedas`
--
ALTER TABLE `monedas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_bodega` (`id_bodega`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `id_moneda` (`id_moneda`);

--
-- Indexes for table `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bodega` (`id_bodega`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `monedas`
--
ALTER TABLE `monedas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`id_moneda`) REFERENCES `monedas` (`id`);

--
-- Constraints for table `sucursales`
--
ALTER TABLE `sucursales`
  ADD CONSTRAINT `sucursales_ibfk_1` FOREIGN KEY (`id_bodega`) REFERENCES `bodegas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
