-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2022 a las 09:09:21
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `notificaciondb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiencia`
--

CREATE TABLE `audiencia` (
  `idaudiencia` int(11) NOT NULL,
  `tipo` varchar(80) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `hora` datetime DEFAULT NULL,
  `edificio` varchar(100) DEFAULT NULL,
  `direccion` varchar(1000) DEFAULT NULL,
  `sala` varchar(45) DEFAULT NULL,
  `observacion` varchar(1000) DEFAULT NULL,
  `proceso_idproceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `audiencia`
--

INSERT INTO `audiencia` (`idaudiencia`, `tipo`, `fecha`, `hora`, `edificio`, `direccion`, `sala`, `observacion`, `proceso_idproceso`) VALUES
(5, 'Formulacion de cargos', '2022-07-26 12:40:00', '0000-00-00 00:00:00', 'Central', 'Av. Universitaria', '002', 'audiencia de formulacion de cargos', 2),
(7, 'Unica', '2022-07-06 09:30:00', '0000-00-00 00:00:00', 'Judicatura', 'Juan de salinas y 18 de noviembre', 'T', 'dsfsf', 2),
(8, 'Unica', '2022-06-26 12:30:00', '2020-01-01 00:00:00', 'Judicatura', 'Juan de salinas y 18 de noviembre', 'B', 'Una observacion', 6),
(9, 'Unica', '2022-05-12 10:00:00', '2022-07-14 20:34:18', 'Central', 'Av. Universitaria', '002', 'Otra observacion', 4),
(10, 'Formulacion de cargos', '2022-08-03 14:50:00', '2022-07-14 20:36:26', 'Judicatura', 'Juan de salinas y 18 de noviembre', ' C', NULL, 7),
(11, 'Unica', '2022-08-14 12:35:00', '2022-07-14 20:37:31', 'Central', 'Av. Universitaria', '001', NULL, 7),
(12, 'Unica', '2022-10-20 13:20:00', '2022-07-14 20:39:16', 'Central', 'Av. Universitaria', '002', 'Robo', 8),
(29, 'Formulacion de cargos', '2022-06-07 12:00:00', '0000-00-00 00:00:00', 'D', 'D', 'e', 'sdsd', 2),
(34, 'Unica', '2022-08-17 17:17:00', '0000-00-00 00:00:00', 'Central', 'sucre y azuay', '5', 'llegar puntual', 2),
(35, 'Unica', '2022-08-09 15:30:00', '0000-00-00 00:00:00', 'Central', 'sucre y azuay', 'G', 'presentarse 10min antes', 3),
(36, 'Formulacion de cargos', '2022-09-16 15:30:00', '0000-00-00 00:00:00', 'Judicatura', '18 de noviembre y Eguiguren', '3', 'llegar 10 minutos antes', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `idnotificacion` int(11) NOT NULL,
  `proceso_idproceso` int(11) NOT NULL,
  `audiencia_idaudiencia` int(11) DEFAULT NULL,
  `persona_idpersona` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`idnotificacion`, `proceso_idproceso`, `audiencia_idaudiencia`, `persona_idpersona`, `fecha`, `estado`) VALUES
(4, 1, NULL, 1, '2022-07-28', 'enviado'),
(5, 8, NULL, 21, '2022-07-28', 'enviado'),
(6, 1, NULL, 1, '2022-07-28', 'enviado'),
(7, 1, NULL, 12, '2022-07-28', 'enviado'),
(8, 1, NULL, 1, '2022-07-28', 'enviado'),
(9, 1, NULL, 12, '2022-07-28', 'enviado'),
(10, 11, NULL, 24, '2022-07-28', 'enviado'),
(15, 4, NULL, 21, NULL, 'activo'),
(18, 4, NULL, 4, NULL, NULL),
(21, 4, NULL, 4, NULL, NULL),
(22, 1, NULL, 1, '2022-07-29', 'enviado'),
(23, 2, 29, 3, '2022-07-29', 'enviado'),
(24, 3, NULL, 4, '2022-07-29', 'enviado'),
(25, 3, NULL, 14, '2022-07-29', 'enviado'),
(26, 2, NULL, 3, '2022-07-29', 'enviado'),
(27, 2, NULL, 3, '2022-07-29', 'enviado'),
(28, 2, NULL, 3, '2022-07-29', 'enviado'),
(29, 2, NULL, 3, '2022-07-29', 'enviado'),
(30, 2, NULL, 3, '2022-07-29', 'enviado'),
(31, 2, NULL, 3, '2022-07-29', 'enviado'),
(32, 2, NULL, 3, '2022-07-29', 'enviado'),
(33, 11, NULL, 24, '2022-07-29', 'enviado'),
(34, 2, NULL, 3, '2022-07-29', 'enviado'),
(35, 2, 34, 3, '2022-07-29', 'enviado'),
(36, 3, 35, 4, '2022-07-29', 'enviado'),
(37, 3, 35, 14, '2022-07-29', 'enviado'),
(38, 3, NULL, 4, '2022-07-29', 'enviado'),
(39, 2, 36, 3, '2022-08-01', 'enviado'),
(40, 2, NULL, 3, '2022-08-01', 'enviado'),
(41, 2, NULL, 3, '2022-08-01', 'enviado'),
(42, 2, NULL, 3, '2022-08-01', 'enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `celular2` varchar(10) DEFAULT NULL,
  `correo` varchar(120) NOT NULL,
  `ciudad` varchar(80) NOT NULL,
  `direccion` varchar(120) DEFAULT NULL,
  `twitter` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombres`, `apellidos`, `dni`, `celular`, `celular2`, `correo`, `ciudad`, `direccion`, `twitter`) VALUES
(1, 'Stalin', 'Valle ', '1105196024', '0980790256', '0953243242', 'jairostalin18@gmail.com', 'Loja', 'Av diez de agosto', '@jairstal'),
(2, 'Juan', 'Perez', '1783926374', '0973627162', '', 'jpcorreo@gmail.com', 'Loja', 'Las peñas', '@juanperez'),
(3, 'Mario', 'Valarezo', '1232543678', '0980790256', '', 'jairostalin18@gmail.com', 'Loja', 'Juan de Salinas y Sucre', '@mvalarezo'),
(4, 'Luisa', 'Perez', '21321', '0980790256', '', 'jairostalin18@gmail.com', 'Loja', 'Terminal', '@lperez'),
(5, 'Pedro', 'Armijos', '7263918263', '0976377328', '0978326488', 'pacorreo@gmail.com', 'Loja', 'Tebaida Alta', '@parmijos'),
(7, 'Maria', 'Idalgo', '6283726187', '0974737822', '', 'micorreo@gmail.com', 'Loja', 'Argelia', '@midalgo'),
(8, 'Valentica', 'Herrera', '1728472938', '0980790256', '', 'jairostalin18@gmail.com', 'Loja', 'Sauces Norte', '@vherrera'),
(9, 'Carla', 'Suarez', '2712743983', '0936637263', '', 'cscorreo@gmail.com', 'Loja', 'Lourdes y Diez de agosto', '@csuarez'),
(10, 'Marisela ', 'Valle', '3138123818', '0936256262', '0947362748', 'mv2correo@gmail.com', 'Loja', 'Ciudad Victroia', '@mvalle'),
(11, 'Maria', 'Jara', '3132131212', '0935653272', '0964836283', 'mjcorreo@gmail.com', 'Loja', 'El Valle', '@mjara'),
(12, 'Daniela', 'Criollo', '3422345322', '0953617127', '', 'dacriollo123@gmail.com', 'Loja', 'Jipiro', '@kvalencia'),
(14, 'Diego', 'Merino', '8847459495', '0936376273', '0946378284', 'dmcorreo@gamail.com', 'Loja', 'San Cayetano', '@dmerino'),
(15, 'Carolina', 'Castro', '7399109434', '0966483732', '0946357263', 'cccoreo@gmail.com', 'Loja', 'La Paz', '@ccastro'),
(17, 'Daniela', 'Rojas', '1872312333', '0934656372', '', 'drcorreo@gmail.com', 'Loja', 'La estancia', '@drojas'),
(18, 'Jose', 'Roman', '5895353483', '0935365681', '', 'jrcorreo@gmail.com', 'Loja', 'El Valle', '@jroman'),
(19, 'Jonathan', 'Estrada', '1273812854', '0935365332', '', 'jecorreo@gmail.com', 'Loja', 'Juan de Salinas y Sucre', '@jestrada'),
(21, 'Jairo', 'Contreras', '4738244333', '0936365516', '0937264845', 'jccorreo@gmail.com', 'Loja', 'Terminal', '@jcontreras'),
(22, 'Segundo', 'Pato', '5838392399', '0936567272', '0963745362', 'spcorreo@gamail.com', 'Loja', 'Lourdes y Diez de agosto', '@spato'),
(23, 'Mariuxi', 'Roman', '8483274233', '0936716122', '0967483623', 'mrcorreo@gmail.com', 'Loja', 'Las Pitas', '@mroman'),
(24, 'Daniela', 'Criollo', '1105928747', '0980790256', '8847464', 'jairostalin18@gmail.com', 'Loja', '18 de noviembre', '@jfjfjf'),
(25, 'Jairo', 'Valle', '1105928747', '0980790256', '', 'jairostalin18@gmail.com', 'Loja', '10 de agosto', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_has_proceso`
--

CREATE TABLE `persona_has_proceso` (
  `persona_idpersona` int(11) NOT NULL,
  `proceso_idproceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona_has_proceso`
--

INSERT INTO `persona_has_proceso` (`persona_idpersona`, `proceso_idproceso`) VALUES
(1, 1),
(1, 8),
(2, 1),
(3, 2),
(4, 3),
(7, 3),
(8, 4),
(9, 6),
(10, 7),
(12, 1),
(14, 3),
(15, 4),
(17, 6),
(18, 7),
(19, 6),
(21, 8),
(22, 8),
(25, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_has_rol`
--

CREATE TABLE `persona_has_rol` (
  `persona_idpersona` int(11) NOT NULL,
  `rol_idrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona_has_rol`
--

INSERT INTO `persona_has_rol` (`persona_idpersona`, `rol_idrol`) VALUES
(1, 4),
(2, 11),
(3, 1),
(4, 1),
(5, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 7),
(14, 2),
(15, 1),
(17, 2),
(18, 2),
(19, 1),
(21, 1),
(22, 2),
(23, 2),
(25, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `idproceso` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `fech_creacion` datetime DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`idproceso`, `codigo`, `fech_creacion`, `tipo`, `descripcion`, `estado`) VALUES
(1, 'P001', '2022-06-29 10:45:00', 1, 'Caso delito menor', 0),
(2, 'P002', '2022-06-29 10:00:00', 2, 'Caso regular', 0),
(3, 'P003', '2022-06-29 15:20:00', 1, 'Delito agrabado', 0),
(4, 'P004', '2022-08-18 00:00:00', 3, 'Delito menor por violencia', 0),
(6, 'P005', '2022-06-29 13:30:00', 1, 'Varios impicados en robo', 0),
(7, 'P006', '2022-06-29 10:20:00', 1, 'Robo con arama blanca', 0),
(8, 'P007', '2022-08-10 09:45:00', 2, 'Nivel de alcohol alto', 0),
(11, '1120320220425', '2022-07-28 00:00:00', 4, 'Reconocimiento de paternidad', 0),
(12, '2443344', '2022-07-29 00:00:00', 5, 'separacion ', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombre`) VALUES
(1, 'Procesado'),
(2, 'Denunciante'),
(3, 'Juez'),
(4, 'Perito'),
(5, 'Testigo'),
(6, 'Actor'),
(7, 'Demandado'),
(8, 'Defensor público'),
(9, 'Fiscal'),
(10, 'Policía Nacional'),
(11, 'Abogado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proceso`
--

CREATE TABLE `tipo_proceso` (
  `idproceso` int(11) NOT NULL,
  `proceso` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `tipo_proceso`
--

INSERT INTO `tipo_proceso` (`idproceso`, `proceso`) VALUES
(1, 'Penal'),
(2, 'Transito'),
(3, 'Violencia'),
(4, 'Familia'),
(5, 'Civil'),
(6, 'Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `imagen` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `correo`, `username`, `password`, `imagen`) VALUES
(1, 'Jairo', 'Valle', 'jairostalin18@gmail.com', 'jairstal', '1234', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `audiencia`
--
ALTER TABLE `audiencia`
  ADD PRIMARY KEY (`idaudiencia`),
  ADD KEY `fk_audiencia_proceso1_idx` (`proceso_idproceso`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`idnotificacion`),
  ADD KEY `fk_notificacion_proceso1_idx` (`proceso_idproceso`),
  ADD KEY `fk_notificacion_audiencia1_idx` (`audiencia_idaudiencia`),
  ADD KEY `fk_notificacion_persona1` (`persona_idpersona`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `persona_has_proceso`
--
ALTER TABLE `persona_has_proceso`
  ADD PRIMARY KEY (`persona_idpersona`,`proceso_idproceso`),
  ADD KEY `fk_persona_has_proceso_proceso1_idx` (`proceso_idproceso`),
  ADD KEY `fk_persona_has_proceso_persona_idx` (`persona_idpersona`);

--
-- Indices de la tabla `persona_has_rol`
--
ALTER TABLE `persona_has_rol`
  ADD PRIMARY KEY (`persona_idpersona`,`rol_idrol`),
  ADD KEY `fk_persona_has_rol_rol1_idx` (`rol_idrol`),
  ADD KEY `fk_persona_has_rol_persona1_idx` (`persona_idpersona`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`idproceso`),
  ADD KEY `FK_proceso_tipo_proceso` (`tipo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `tipo_proceso`
--
ALTER TABLE `tipo_proceso`
  ADD PRIMARY KEY (`idproceso`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `audiencia`
--
ALTER TABLE `audiencia`
  MODIFY `idaudiencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idnotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `idproceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_proceso`
--
ALTER TABLE `tipo_proceso`
  MODIFY `idproceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `audiencia`
--
ALTER TABLE `audiencia`
  ADD CONSTRAINT `fk_audiencia_proceso1` FOREIGN KEY (`proceso_idproceso`) REFERENCES `proceso` (`idproceso`);

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `fk_notificacion_audiencia1` FOREIGN KEY (`audiencia_idaudiencia`) REFERENCES `audiencia` (`idaudiencia`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_notificacion_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notificacion_proceso1` FOREIGN KEY (`proceso_idproceso`) REFERENCES `proceso` (`idproceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona_has_proceso`
--
ALTER TABLE `persona_has_proceso`
  ADD CONSTRAINT `fk_persona_has_proceso_persona` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_persona_has_proceso_proceso1` FOREIGN KEY (`proceso_idproceso`) REFERENCES `proceso` (`idproceso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona_has_rol`
--
ALTER TABLE `persona_has_rol`
  ADD CONSTRAINT `fk_persona_has_rol_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_persona_has_rol_rol1` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD CONSTRAINT `FK_proceso_tipo_proceso` FOREIGN KEY (`tipo`) REFERENCES `tipo_proceso` (`idproceso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
