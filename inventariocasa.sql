-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-01-2017 a las 00:32:08
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventariocasa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eliminados`
--

CREATE TABLE `eliminados` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(30) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eliminados`
--

INSERT INTO `eliminados` (`id`, `id_producto`, `nombre_producto`, `nombre_usuario`) VALUES
(1, 9, 'mueble', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `precio` float NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `profundidad` int(11) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `fecha_compra` date NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `fecha_vencimiento`, `tipo`, `categoria`, `profundidad`, `ubicacion`, `fecha_compra`, `estado`) VALUES
(1, 'televisor', 1240.5, '2016-11-10', 'electronico', 'sala', 5, 'segundoPiso/sala/derecha', '2016-10-13', 'nuevo'),
(2, 'espejo', 125, '2016-10-21', 'articulo', 'bano', 3, 'plantaBaja/banio1/izquierda', '2016-09-01', 'semi-nuevo'),
(3, 'cortinas', 85, '2016-08-12', 'tela', 'recamara', 3, 'segundoPiso/sala/izquierda', '2016-05-04', 'semi-nuevo'),
(4, 'computadora', 5500, '2016-12-21', 'hp-240-g3', 'recamara', 6, 'recamara3/escritorio', '2014-10-01', 'semi-nuevo'),
(5, 'mesa de centro', 240, '2016-12-02', 'articulo', 'sala', 7, 'segundoPiso/sala/centro', '2016-05-19', 'nuevo'),
(6, 'lavadora', 5800, '2017-01-04', 'electrodomestico', 'cocina', 2, 'deposito/centro', '2015-02-07', 'semi-nuevo'),
(7, 'impresora', 280, '2017-01-05', 'electronico', 'recamara', 4, 'segundoPiso/recamara2/derecha', '2015-02-05', 'mal-estado'),
(8, 'colchom', 2805.7, '2016-10-15', 'articulo', 'sala', 2, 'recamara1/izquierda', '2016-09-10', 'nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `password`, `apellido`, `fecha`, `email`) VALUES
(1, 'jose', '1234', 'villarroel', '2017-01-11', 'jose@hotmail.com'),
(2, 'ariel', '12345', 'gomez', '2017-01-11', 'ariel@gmail.com'),
(344, 'mario', '123', 'bross', '1993-05-06', 'mario@gmail.com'),
(2344, 'raul', '123', 'perez', '1993-10-06', 'raul@hotmail.com'),
(234444, 'carlos', '1234', 'ramirez', '1993-10-06', 'carlos@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eliminados`
--
ALTER TABLE `eliminados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eliminados`
--
ALTER TABLE `eliminados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234445;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
