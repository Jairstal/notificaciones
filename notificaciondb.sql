SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


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

INSERT INTO `audiencia` (`idaudiencia`, `tipo`, `fecha`, `hora`, `edificio`, `direccion`, `sala`, `observacion`, `proceso_idproceso`) VALUES
(2, 'Preliminar', '2022-06-28 17:00:00', '2022-06-28 17:00:00', 'Las Americas', 'Juan de Salinas y Sucre', '2', 'Primera audiencia', 1),
(3, 'Juicio', '2022-06-29 13:25:00', '2022-06-29 13:25:00', 'Las Américas', 'Juan de Salinas y sucre', '1', NULL, 1),
(4, 'Preliminar', '2022-06-30 14:00:00', '2022-06-30 14:00:00', 'Las Americas', 'Juan de Salinas y sucre', '4', 'Primera audiencia', 2),
(5, 'Juicio', '2022-06-30 13:30:00', '2022-06-30 13:30:00', 'Fiscalía', 'Juan Jose Peña y Lourdes', '3', NULL, 1),
(7, 'Juicio', '2022-07-01 10:45:00', '2022-07-01 10:45:00', 'Fiscalía', 'Juan José Peña y Lourdes', '5', NULL, 1),
(8, 'Única', '2022-07-01 10:50:00', '2022-07-01 10:50:00', 'Fiscalía', 'Juan José Peña y Lourdes', '6', NULL, 2),
(9, 'Juicio', '2022-07-02 13:40:00', '2022-07-02 13:40:00', 'Las Americas', 'Juan de Salinas y sucre', '2', 'Ultima audiencia', 1),
(10, 'Juicio', '2022-07-05 13:00:00', '2022-07-05 13:00:00', 'Fiscalía', 'Juan José Peña y Lourdes', '5', 'Reapertura', 1),
(11, 'Única', '2022-07-05 13:00:00', '2022-07-05 13:00:00', 'Las Americas', 'Juan de Salinas y sucre', '1', NULL, 2);

CREATE TABLE `notificacion` (
  `idnotificacion` int(11) NOT NULL,
  `proceso_idproceso` int(11) NOT NULL,
  `audiencia_idaudiencia` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `notificacion` (`idnotificacion`, `proceso_idproceso`, `audiencia_idaudiencia`, `fecha`, `estado`) VALUES
(1, 1, 2, '2022-06-29', '1'),
(2, 2, 3, '2022-06-29', '2'),
(3, 1, 5, '2022-06-30', '1'),
(4, 2, 4, '2022-06-30', '2');

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombres` varchar(200) DEFAULT NULL,
  `apellidos` varchar(200) DEFAULT NULL,
  `dni` varchar(50) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `celular2` int(11) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `twitter` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `persona` (`idpersona`, `nombres`, `apellidos`, `dni`, `celular`, `celular2`, `correo`, `ciudad`, `direccion`, `twitter`) VALUES
(1, 'Stalin', 'Valle ', '1105196024', 980790256, 980790257, 'jairostalin18@gmail.com', 'Loja', 'Las pitas, colon castro 9338', '@jairstal'),
(2, 'Juan', 'Perez', '1100434234', 987673446, 954784774, 'juanperez@gmail.com', 'Loja', 'Las peñas', '@juanperez'),
(3, 'Fernando', 'Castro', '1194763978', 985670959, 962113547, 'fernandocastro@gmail.com', 'Loja', 'Juan de Salinas y Sucre', '@fernando15'),
(4, 'Maria', 'Godoy', '1107045561', 935986542, 987589322, 'mariagodoy@gmail.com', 'Loja', 'Juan José Peña y Lourdes', '@maria20'),
(5, 'Pepe', 'Martinez', '3212455345', 932323231, 923447382, 'pepem@gmail.com', 'Loja', 'Diez de agosto y Bolivar', '@pepem23');

CREATE TABLE `persona_has_proceso` (
  `persona_idpersona` int(11) NOT NULL,
  `proceso_idproceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `persona_has_proceso` (`persona_idpersona`, `proceso_idproceso`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2);

CREATE TABLE `persona_has_rol` (
  `persona_idpersona` int(11) NOT NULL,
  `rol_idrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `persona_has_rol` (`persona_idpersona`, `rol_idrol`) VALUES
(1, 1),
(4, 1),
(5, 2),
(2, 3),
(3, 3);

CREATE TABLE `proceso` (
  `idproceso` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `fech_creacion` datetime DEFAULT NULL,
  `tipo` varchar(80) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `proceso` (`idproceso`, `codigo`, `fech_creacion`, `tipo`, `descripcion`, `estado`) VALUES
(1, 'JA-001', '2022-06-30 04:23:34', 'Juicio de alimentos', 'El demandante solicita que el acusado le entregue mensualmente una pensión por la manutención del hijo.', 1),
(2, 'AT-001', '2022-06-30 04:36:18', 'Accidente de transito', 'El acusado por un preseunto de lito de conducir bajjo efectos del alcohol.', 2);

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `rol` (`idrol`, `nombre`) VALUES
(1, 'Procesado'),
(2, 'Demandante'),
(3, 'Juez');

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `imagen` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `correo`, `username`, `password`, `imagen`) VALUES
(1, 'Jairo', 'Valle', 'jairostalin18@gmail.com', 'jairstal', '1234', NULL);


ALTER TABLE `audiencia`
  ADD PRIMARY KEY (`idaudiencia`),
  ADD KEY `fk_audiencia_proceso1_idx` (`proceso_idproceso`);

ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`idnotificacion`),
  ADD KEY `fk_notificacion_proceso1_idx` (`proceso_idproceso`),
  ADD KEY `fk_notificacion_audiencia1_idx` (`audiencia_idaudiencia`);

ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

ALTER TABLE `persona_has_proceso`
  ADD PRIMARY KEY (`persona_idpersona`,`proceso_idproceso`),
  ADD KEY `fk_persona_has_proceso_proceso1_idx` (`proceso_idproceso`),
  ADD KEY `fk_persona_has_proceso_persona_idx` (`persona_idpersona`);

ALTER TABLE `persona_has_rol`
  ADD PRIMARY KEY (`persona_idpersona`,`rol_idrol`),
  ADD KEY `fk_persona_has_rol_rol1_idx` (`rol_idrol`),
  ADD KEY `fk_persona_has_rol_persona1_idx` (`persona_idpersona`);

ALTER TABLE `proceso`
  ADD PRIMARY KEY (`idproceso`);

ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);


ALTER TABLE `audiencia`
  MODIFY `idaudiencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `notificacion`
  MODIFY `idnotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `proceso`
  MODIFY `idproceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `audiencia`
  ADD CONSTRAINT `fk_audiencia_proceso1` FOREIGN KEY (`proceso_idproceso`) REFERENCES `proceso` (`idproceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `notificacion`
  ADD CONSTRAINT `fk_notificacion_audiencia1` FOREIGN KEY (`audiencia_idaudiencia`) REFERENCES `audiencia` (`idaudiencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notificacion_proceso1` FOREIGN KEY (`proceso_idproceso`) REFERENCES `proceso` (`idproceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `persona_has_proceso`
  ADD CONSTRAINT `fk_persona_has_proceso_persona` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_has_proceso_proceso1` FOREIGN KEY (`proceso_idproceso`) REFERENCES `proceso` (`idproceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `persona_has_rol`
  ADD CONSTRAINT `fk_persona_has_rol_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_has_rol_rol1` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
