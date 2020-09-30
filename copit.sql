-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2020 a las 19:18:42
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
  `NombreCliente` varchar(50) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Pais` varchar(20) NOT NULL,
  `Domicilio` varchar(200) NOT NULL,
  `Reputacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `NombreCliente`, `Email`, `Password`, `Telefono`, `Pais`, `Domicilio`, `Reputacion`) VALUES
(8, 'copit', 'copit@gmail.com', '6ca201eb437e82cdcb55da9e7008f7bb', '', '', '', 0),
(9, 'andy', 'andy@gmail.com', 'f5c30f2bc11fd36e87a570504ee1aa4a', '', '', '', 0),
(10, 'gael', 'gael@gmail.com', 'c625e435536824541608631f9775549b', '', '', '', 0),
(13, 'Luca', 'luca@gmail.com', 'd388bf5b0de734b993b9511a05b9252a', '', '', '', 0),
(21, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 0),
(22, 'asd', 'asd@gmail.com', '7815696ecbf1c96e6894b779456d330e', '', '', '', 0),
(23, 'aksa', 'asasa@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', '', 0),
(24, 'juan', 'juan@gmail.com', 'a31add0c8535719a165e2fad450c4cf6', '', '', '', 0);

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
  `VerificarProducto` tinyint(1) DEFAULT 0,
  `IdDetalleCliente` int(11) NOT NULL,
  `Cantidad` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(86, 'Admin', 'Admin@gmail.com', 'Admin123'),
(89, 'juan', 'juan@gmail.com', 'Juan123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `IdVenta` int(11) NOT NULL,
  `IdDetalleComprador` int(11) NOT NULL,
  `IdDetalleVendedor` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `IdDetalleProducto` int(11) NOT NULL,
  `DetalleNombre` varchar(250) NOT NULL,
  `DetallePrecio` int(11) NOT NULL,
  `VentaNombreDestinatario` varchar(250) NOT NULL,
  `VentaCalle` varchar(250) NOT NULL,
  `VentaNumeroCalle` int(11) NOT NULL,
  `VentaDeptoNum` int(11) NOT NULL,
  `VentaCodigoPostal` int(11) NOT NULL,
  `VentaProvincia` varchar(250) NOT NULL,
  `VentaCiudad` varchar(250) NOT NULL,
  `VentaTelefono` varchar(250) NOT NULL,
  `VentaIndicaciones` varchar(500) NOT NULL,
  `DetalleEmailComprador` varchar(250) NOT NULL,
  `DetalleEmailVendedor` varchar(250) NOT NULL
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
  ADD PRIMARY KEY (`IdCliente`),
  ADD UNIQUE KEY `kEmail` (`Email`);

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
-- Indices de la tabla `diseniadores`
--
ALTER TABLE `diseniadores`
  ADD PRIMARY KEY (`IdDiseniador`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`),
  ADD UNIQUE KEY `IdProducto` (`IdProducto`),
  ADD KEY `fkIdCategoria` (`IdCategoriaProducto`),
  ADD KEY `fkIdTalle` (`IdTalleProducto`),
  ADD KEY `fkIdCondicion` (`IdCondicionProducto`),
  ADD KEY `fkIdDiseniador` (`IdDiseniadorProducto`),
  ADD KEY `IdColor` (`IdColorProducto`),
  ADD KEY `fkIdDetalleCliente` (`IdDetalleCliente`);

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
  ADD PRIMARY KEY (`IdVenta`);

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
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
-- AUTO_INCREMENT de la tabla `diseniadores`
--
ALTER TABLE `diseniadores`
  MODIFY `IdDiseniador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de la tabla `talles`
--
ALTER TABLE `talles`
  MODIFY `IdTalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `IdCategoria` FOREIGN KEY (`IdCategoriaProducto`) REFERENCES `categorias` (`IdCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IdCliente` FOREIGN KEY (`IdDetalleCliente`) REFERENCES `clientes` (`IdCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IdColor` FOREIGN KEY (`IdColorProducto`) REFERENCES `colores` (`IdColor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IdCondicion` FOREIGN KEY (`IdCondicionProducto`) REFERENCES `condicion` (`IdCondicion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IdDiseniador` FOREIGN KEY (`IdDiseniadorProducto`) REFERENCES `diseniadores` (`IdDiseniador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IdTalle` FOREIGN KEY (`IdTalleProducto`) REFERENCES `talles` (`IdTalle`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
