-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2018 a las 03:34:17
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hsjb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `cod_med` bigint(10) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `telefono` int(7) NOT NULL,
  `dni` int(7) NOT NULL,
  `dia1atenc` set('lunes','martes','miercoles','jueves','viernes','sabado','domingo') DEFAULT NULL,
  `dia2atenc` set('lunes','martes','miercoles','jueves','viernes','sabado','domingo') DEFAULT NULL,
  `dia3atenc` set('lunes','martes','miercoles','jueves','viernes','sabado','domingo') DEFAULT NULL,
  `dia4atenc` set('lunes','martes','miercoles','jueves','viernes','sabado','domingo') DEFAULT NULL,
  `dia5atenc` set('lunes','martes','miercoles','jueves','viernes','sabado','domingo') DEFAULT NULL,
  `especialidad` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`cod_med`, `nombre`, `apellido`, `direccion`, `telefono`, `dni`, `dia1atenc`, `dia2atenc`, `dia3atenc`, `dia4atenc`, `dia5atenc`, `especialidad`) VALUES
(15, 'Arturo', 'blanco', 'Juan Pablo Vera, 280', 15404743, 37462532, 'lunes', 'martes', 'viernes', NULL, NULL, 'cardiologia'),
(16, 'daniel', 'bautista', 'Hilarion Furque y Av. Bartolomé', 15404743, 36462532, 'lunes', 'martes', 'miercoles', NULL, NULL, 'cardiologia'),
(17, 'julian', 'argar', 'plaza del maestro', 1544857, 254753643, 'lunes', 'jueves', 'viernes', 'domingo', NULL, 'ginecologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `cod_solicitud` int(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `medico` varchar(25) NOT NULL,
  `dia` date NOT NULL,
  `horario` time NOT NULL,
  `paciente` varchar(25) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `division` varchar(25) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telefono_part` int(10) NOT NULL,
  `obra_soc` varchar(30) NOT NULL,
  `telefono_cel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`cod_solicitud`, `descripcion`, `medico`, `dia`, `horario`, `paciente`, `direccion`, `division`, `estado`, `observaciones`, `email`, `telefono_part`, `obra_soc`, `telefono_cel`) VALUES
(1, 'resfrio severo', 'gabriela miranda', '2018-01-20', '08:00:00', 'juan gabriel blanco', 'Juan Pablo Vera, 280', 'laboratorio', 'activo', '', 'danieltesorero@gmail.com', 0, '', 154404743);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `cod_turno` int(10) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `diagnostico` varchar(150) NOT NULL,
  `fecha_atencion` date NOT NULL,
  `hora` time NOT NULL,
  `medico` varchar(50) NOT NULL,
  `paciente` varchar(50) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `resultado` varchar(100) NOT NULL,
  `obra_soc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(25) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `idusuario` int(6) NOT NULL,
  `division` varchar(25) NOT NULL,
  `nombrecomp` varchar(40) NOT NULL,
  `dni` int(8) NOT NULL,
  `email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `pass`, `idusuario`, `division`, `nombrecomp`, `dni`, `email`) VALUES
('wolfsilver', '1234', 1, 'laboratorio', 'sergio daniel blanco', 37462532, 'danieltesorero2009@gmail.com'),
('admin', '12345', 2, 'general', 'gustavo', 37462533, 'danieltesorero2009@gmail.com'),
('danielw', '123456', 4, 'atencion', 'sergio wolf blanco', 37468888, 'yasd@gmail.com'),
('daniel', '1234', 5, 'dasd', 'daniel tesouro', 37462345, 'danieltesorero2009@gmail.com'),
('das', '123', 8, 'ddd', 'danss', 37462333, 'danieltesorero2009@gmail.com'),
('jjjjjj', '12345', 15, 'sdfgh', 'sdfghj', 37462435, 'danieltesorero2009@gmail.com'),
('admin', '1234567', 24, 'admin', 'wolfadmin', 37484374, 'yayi@gmail.com'),
('', '', 32, '', '', 0, ''),
('gabu', '123', 33, 'unica', 'gabriela miranda', 34724247, 'gaby90@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`cod_med`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`cod_solicitud`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`cod_turno`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `cod_med` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `cod_solicitud` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `cod_turno` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
