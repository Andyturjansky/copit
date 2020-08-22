-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2020 a las 21:37:48
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `copit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IdCategoria` int(11) NOT NULL,
  `NombreCat` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCategoria`, `NombreCat`) VALUES
(1, 'Zapatillas'),
(2, 'Camperas'),
(3, 'Buzos'),
(4, 'Remeras'),
(5, 'Accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Pais` varchar(20) NOT NULL,
  `Domicilio` varchar(200) NOT NULL,
  `Reputacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `IdColor` int(11) NOT NULL,
  `NombreColor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`IdColor`, `NombreColor`) VALUES
(1, 'Rojo'),
(2, 'Blanco'),
(3, 'Negro'),
(4, 'Verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion`
--

CREATE TABLE `condicion` (
  `IdCondicion` int(11) NOT NULL,
  `NombreCondicion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `condicion`
--

INSERT INTO `condicion` (`IdCondicion`, `NombreCondicion`) VALUES
(1, 'Nuevo'),
(2, 'Usado'),
(3, 'Poco uso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `IdDetalle` int(11) NOT NULL,
  `IdDetalleProducto` int(11) NOT NULL,
  `IdDetalleVenta` int(11) NOT NULL,
  `DetalleCantidad` int(11) NOT NULL,
  `DetallePrecio` float NOT NULL,
  `SubTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diseniadores`
--

CREATE TABLE `diseniadores` (
  `IdDiseniador` int(11) NOT NULL,
  `NombreDiseniador` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `diseniadores`
--

INSERT INTO `diseniadores` (`IdDiseniador`, `NombreDiseniador`) VALUES
(1, 'Supreme'),
(2, 'Nike'),
(3, 'Balenciaga'),
(4, 'Travis Scott'),
(5, 'Off White'),
(6, 'Bape'),
(7, 'Gucci');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProducto` int(11) NOT NULL,
  `IdCategoriaProducto` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `IdCondicionProducto` int(11) NOT NULL,
  `IdTalleProducto` int(11) NOT NULL,
  `IdDiseniadorProducto` int(11) NOT NULL,
  `IdColorProducto` int(11) NOT NULL,
  `DescripcionProducto` varchar(1000) NOT NULL,
  `Precio` float NOT NULL,
  `ImagenProducto` varchar(255) NOT NULL DEFAULT '',
  `VerificarProducto` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `IdCategoriaProducto`, `Nombre`, `IdCondicionProducto`, `IdTalleProducto`, `IdDiseniadorProducto`, `IdColorProducto`, `DescripcionProducto`, `Precio`, `ImagenProducto`, `VerificarProducto`) VALUES
(1, 2, 'Campera Supreme X The north face', 1, 2, 1, 2, 'Comprada en Supreme New York el dia de su lanzamiento.', 15000, 'Supreme-The-North-Face-Mountain-Parka.jpg', 1),
(2, 1, 'Nike Air Yeezy 2 Red October', 2, 1, 2, 1, 'Fueron usadas muy pocas veces, estan impecables.', 23000, 'nikeAirYeezy.jpg', 1),
(96, 4, 'Remera Off White', 1, 3, 5, 2, 'Remera sin uso de la coleecion 2019', 1000, 'OFF-WHITE-Flamed-Bart-T-Shirt-White.jpg', 1),
(97, 3, 'Buzo Astroworld Travis', 3, 4, 4, 3, 'Buzo con muy poco uso, comprado en el concierto de NY', 6000, 'Travis-Scott-Astrowolrd-Wish-You-Were-Here-Hoodie-Black.jpg', 1),
(98, 5, 'Billetera Gucci', 3, 1, 7, 3, 'Billetera gucci con diseño snake', 500, 'Gucci-Bifold-Wallet-GG-Supreme-Kingsnake-4-Card-Slots-Black-Studio-1.jpg', 1),
(99, 1, 'Balenciaga speed trainer', 1, 2, 3, 3, 'Balenciagas talle 9 US con caja y bolsa original.', 23000, 'speedTrainer.jpg', 1),
(100, 2, 'Campera adidas x bape', 2, 3, 6, 4, 'Campera bape x adidas camo', 12300, 'Bape-ABC-Camo-Track-Jacket-Green.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talles`
--

CREATE TABLE `talles` (
  `IdTalle` int(11) NOT NULL,
  `NombreTalle` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `talles`
--

INSERT INTO `talles` (`IdTalle`, `NombreTalle`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XXL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Nombre`, `Email`, `Password`) VALUES
(6, 'Administrador', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `IdVenta` int(11) NOT NULL,
  `IdDetalleCliente` int(11) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`IdColor`);

--
-- Indices de la tabla `condicion`
--
ALTER TABLE `condicion`
  ADD PRIMARY KEY (`IdCondicion`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`IdDetalle`),
  ADD KEY `fkIdProducto` (`IdDetalleProducto`),
  ADD KEY `fkIdVenta` (`IdDetalleVenta`);

--
-- Indices de la tabla `diseniadores`
--
ALTER TABLE `diseniadores`
  ADD PRIMARY KEY (`IdDiseniador`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `fkIdCategoria` (`IdCategoriaProducto`),
  ADD KEY `fkIdTalle` (`IdTalleProducto`),
  ADD KEY `fkIdCondicion` (`IdCondicionProducto`),
  ADD KEY `fkIdDiseniador` (`IdDiseniadorProducto`),
  ADD KEY `IdColor` (`IdColorProducto`);

--
-- Indices de la tabla `talles`
--
ALTER TABLE `talles`
  ADD PRIMARY KEY (`IdTalle`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IdVenta`),
  ADD KEY `fkIdCliente` (`IdDetalleCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `IdColor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `condicion`
--
ALTER TABLE `condicion`
  MODIFY `IdCondicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `IdDetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `diseniadores`
--
ALTER TABLE `diseniadores`
  MODIFY `IdDiseniador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `talles`
--
ALTER TABLE `talles`
  MODIFY `IdTalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD CONSTRAINT `IdProducto` FOREIGN KEY (`IdDetalleProducto`) REFERENCES `productos` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IdVenta` FOREIGN KEY (`IdDetalleVenta`) REFERENCES `ventas` (`IdVenta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `IdCategoria` FOREIGN KEY (`IdCategoriaProducto`) REFERENCES `categorias` (`IdCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IdColor` FOREIGN KEY (`IdColorProducto`) REFERENCES `colores` (`IdColor`),
  ADD CONSTRAINT `IdCondicion` FOREIGN KEY (`IdCondicionProducto`) REFERENCES `condicion` (`IdCondicion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IdDiseniador` FOREIGN KEY (`IdDiseniadorProducto`) REFERENCES `diseniadores` (`IdDiseniador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IdTalle` FOREIGN KEY (`IdTalleProducto`) REFERENCES `talles` (`IdTalle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `IdCliente` FOREIGN KEY (`IdDetalleCliente`) REFERENCES `clientes` (`IdCliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
