-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2022 a las 14:19:51
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activitat`
--

CREATE TABLE `activitat` (
  `ID_Activitat` int(11) NOT NULL,
  `Descripció` varchar(255) NOT NULL,
  `Durada` varchar(255) NOT NULL,
  `Data` int(11) NOT NULL,
  `Data_fisica` date NOT NULL,
  `h_fi` datetime NOT NULL,
  `h_inici` datetime NOT NULL,
  `Reserves` int(11) NOT NULL,
  `ID_s` int(11) NOT NULL,
  `Act_nom` varchar(255) NOT NULL,
  `img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activitat`
--

INSERT INTO `activitat` (`ID_Activitat`, `Descripció`, `Durada`, `Data`, `Data_fisica`, `h_fi`, `h_inici`, `Reserves`, `ID_s`, `Act_nom`, `img`) VALUES
(1, 'Bici, una activitat a el interior, que pots fer tant individual com grupalment', '4', 1, '2022-03-06', '2022-03-06 12:00:00', '2022-03-08 20:11:04', 18, 1, 'Bici', 'bici.png'),
(2, 'Padel, una activitat que es pot fer tant a interior com exterior,nomes es pot fer grupalment', '2', 2, '2022-03-08', '2022-03-08 20:11:04', '2022-03-08 01:11:04', 0, 1, 'Padel', 'padel.png'),
(3, 'Piscina, una activitat a el interior, que pots fer tant individual com grupalment', '3', 3, '2022-03-08', '2022-03-08 02:11:04', '2022-03-08 20:11:04', 5, 1, 'Piscina', 'piscina.png'),
(4, 'Fitness, una activitat tant a exteriors com a el interior, que pots fer tant individual com grupalment', '3', 4, '2022-03-08', '2022-03-08 02:11:04', '2022-03-08 01:11:04', 2, 1, 'Fitness', 'fitness.png'),
(5, 'Cycling, una activitat a el interior, que pots fer grupalment amb monitor ', '2', 5, '2022-03-07', '2022-03-06 22:11:04', '2022-03-08 22:11:04', 2, 1, 'Cycling', 'cycling.png'),
(6, 'Body pump, una activitat a el interior, que pots fer tant individual com grupalment', '2', 2, '2022-03-07', '2022-03-07 22:11:04', '2022-03-08 22:11:04', 2, 1, 'Body_Pump', 'Body_Pump.png'),
(7, 'Cinta de correr,Una activitat que nomes pots fer a el interior', '2', 5, '2022-03-07', '2022-03-07 22:11:04', '2022-03-07 22:11:04', 0, 1, 'CintadeCorrer', 'CintadeCorrer.png'),
(8, 'Pilates, una activitat que pots fer tant a interior com a exterior,amb ajuda de monitors', '2', 3, '2022-03-07', '2022-03-07 22:11:04', '2022-03-07 22:11:04', 1, 1, 'Pilates', 'Pilates.png'),
(9, 'Natació ,Una activitat que nomes pots fer a el interior amb ajuda de monitors', '1', 1, '2022-03-08', '2022-03-09 22:11:04', '2022-03-09 22:11:04', 6, 1, 'Natacio', 'Natacio.png'),
(10, 'Aquagym,Una activitat que nomes pots fer a el interior amb ajuda de monitors', '1', 2, '2022-03-09', '2022-03-09 00:00:00', '2022-03-09 00:00:00', 0, 1, 'Aquagym', 'Aquagym.png'),
(11, 'Running,Una activitat que tant a interior com a exterior amb ajuda de monitors', '2', 4, '2022-03-06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 'Running', 'Running.png'),
(12, 'Zumba,Una activitat que tant a interior com a exterior amb ajuda de monitors', '1', 5, '2022-03-08', '2022-03-08 20:00:00', '2022-03-08 20:00:00', 0, 1, 'Zumba', 'Zumba.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activitat_colectiva`
--

CREATE TABLE `activitat_colectiva` (
  `ID_Activitat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activitat_colectiva`
--

INSERT INTO `activitat_colectiva` (`ID_Activitat`) VALUES
(5),
(6),
(8),
(9),
(10),
(11),
(12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activitat_individual`
--

CREATE TABLE `activitat_individual` (
  `ID_Activitat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activitat_individual`
--

INSERT INTO `activitat_individual` (`ID_Activitat`) VALUES
(1),
(2),
(3),
(4),
(7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuntar`
--

CREATE TABLE `apuntar` (
  `ID_ALTA` varchar(255) NOT NULL,
  `ID_BAIXA` varchar(255) DEFAULT NULL,
  `ID_h` int(9) NOT NULL,
  `DNI_c` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `apuntar`
--

INSERT INTO `apuntar` (`ID_ALTA`, `ID_BAIXA`, `ID_h`, `DNI_c`) VALUES
('2022-03-06', '2022-03-07', 1, '21041009B'),
('2022-03-07', NULL, 2, '55627647P'),
('2022-03-07', '2022-03-08', 3, '21041009B'),
('2022-03-07', '2022-03-08', 3, '21041009B'),
('2022-03-07', '2022-03-08', 3, '21041009B'),
('2022-03-08', '2022-03-08', 6, '21041009B'),
('2022-03-08', '2022-03-08', 6, '21041009B'),
('2022-03-08', '2022-03-08', 6, '21041009B'),
('2022-03-08', '2022-03-08', 6, '21041009B'),
('2022-03-08', '2022-03-08', 6, '21041009B'),
('2022-03-08', '2022-03-08', 6, '21041009B'),
('2022-03-08', NULL, 12, '21041009B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `Nom` varchar(255) NOT NULL,
  `Cognom` varchar(255) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Correu` varchar(255) NOT NULL,
  `Adreça` varchar(255) NOT NULL,
  `Telefon` varchar(9) NOT NULL,
  `CC` varchar(255) NOT NULL,
  `Contrassenya` varchar(255) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`Nom`, `Cognom`, `DNI`, `Correu`, `Adreça`, `Telefon`, `CC`, `Contrassenya`, `Data`) VALUES
('Eric', 'Estivill', '21041009B', 'ericestivill123@gmail.com', 'ametllers', '619545197', 'ES6621000418401234567891', 'c6388979247bfa077409e0e8bf926dd8', '2003-08-27'),
('Joan', 'Estebe', '55627647P', 'eric@gmail.com', 'ametllers', '619545197', 'ES6621000418401234567891', 'ZXJpYzEyMw==', '2003-08-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursa`
--

CREATE TABLE `cursa` (
  `ID_Cursa` varchar(255) NOT NULL,
  `Hora` date NOT NULL,
  `Nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursa`
--

INSERT INTO `cursa` (`ID_Cursa`, `Hora`, `Nom`) VALUES
('1', '2022-03-08', 'Cursa2'),
('2', '2022-03-10', 'Cursa'),
('3', '2022-03-14', 'Cursa3'),
('4', '2022-03-15', 'Cursa4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `ID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`ID`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitor`
--

CREATE TABLE `monitor` (
  `Nom_m` varchar(255) NOT NULL,
  `Cognom_m` varchar(255) NOT NULL,
  `Telefon` int(11) NOT NULL,
  `Correu` varchar(255) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Adreça` varchar(255) NOT NULL,
  `Salari` varchar(255) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `monitor`
--

INSERT INTO `monitor` (`Nom_m`, `Cognom_m`, `Telefon`, `Correu`, `DNI`, `Adreça`, `Salari`, `ID`) VALUES
('Jaume', 'Pique', 664258163, 'jpique@gmail.com', '49211293X', 'Rambla castella 2', '1200', 2),
('Albert', 'Font', 620635162, 'afont@gmail.com', '61054776B', 'Carrer Barcelona 5', '1200', 3),
('Carme', 'Hernandez', 678156984, 'chernandez1@gmail.com', '71913872W', 'Carrer major 18', '1200', 1),
('Maria', 'Sanchez', 644715212, 'msanchez95@gmail.com', '87264638Q', 'Carrer Madrid27', '1200', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participa`
--

CREATE TABLE `participa` (
  `DNI` varchar(9) NOT NULL,
  `ID_Cursa` varchar(255) NOT NULL,
  `registre` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `participa`
--

INSERT INTO `participa` (`DNI`, `ID_Cursa`, `registre`) VALUES
('21041009B', '3', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserves`
--

CREATE TABLE `reserves` (
  `DNI` varchar(9) NOT NULL,
  `Num_reserves` int(11) NOT NULL,
  `ID_Activitat` int(11) DEFAULT NULL,
  `h_inici` datetime DEFAULT NULL,
  `h_fi` datetime DEFAULT NULL,
  `Dat_fisica` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserves`
--

INSERT INTO `reserves` (`DNI`, `Num_reserves`, `ID_Activitat`, `h_inici`, `h_fi`, `Dat_fisica`) VALUES
('21041009B', 0, 2, '2022-03-07 23:11:04', '2022-03-06 20:11:04', '2022-03-06'),
('21041009B', 0, 1, '2022-03-08 00:11:04', '2022-03-06 12:00:00', '2022-03-06'),
('21041009B', 0, 6, '2022-03-07 22:11:04', '2022-03-07 22:11:04', '2022-03-07'),
('55627647P', 0, 1, NULL, NULL, NULL),
('21041009B', 0, 1, '2022-03-08 01:11:04', '2022-03-06 12:00:00', '2022-03-06'),
('21041009B', 0, 5, '2022-03-08 22:11:04', '2022-03-06 22:11:04', '2022-03-07'),
('21041009B', 0, 1, '2022-03-08 20:11:04', '2022-03-06 12:00:00', '2022-03-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `ID` int(11) NOT NULL,
  `Aforament` varchar(255) NOT NULL,
  `Descripcio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`ID`, `Aforament`, `Descripcio`) VALUES
(1, '100', 'Sala de Gimnasia'),
(2, '120', 'Sala de Fitness'),
(3, '100', 'Sala de Piscina'),
(4, '100', 'Sala de Gimnasia'),
(5, '100', 'Sala de Gimnasia'),
(6, '100', 'Sala de Gimnasia');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activitat`
--
ALTER TABLE `activitat`
  ADD PRIMARY KEY (`ID_Activitat`),
  ADD KEY `Activitat_fk0` (`ID_s`);

--
-- Indices de la tabla `activitat_colectiva`
--
ALTER TABLE `activitat_colectiva`
  ADD PRIMARY KEY (`ID_Activitat`);

--
-- Indices de la tabla `activitat_individual`
--
ALTER TABLE `activitat_individual`
  ADD PRIMARY KEY (`ID_Activitat`);

--
-- Indices de la tabla `apuntar`
--
ALTER TABLE `apuntar`
  ADD KEY `Apuntar_fk0` (`ID_h`),
  ADD KEY `Apuntar_fk1` (`DNI_c`);

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `cursa`
--
ALTER TABLE `cursa`
  ADD PRIMARY KEY (`ID_Cursa`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`DNI`),
  ADD KEY `Monitor_fk0` (`ID`);

--
-- Indices de la tabla `participa`
--
ALTER TABLE `participa`
  ADD KEY `Participa_fk0` (`DNI`),
  ADD KEY `Participa_fk1` (`ID_Cursa`);

--
-- Indices de la tabla `reserves`
--
ALTER TABLE `reserves`
  ADD KEY `Reserves_fk0` (`DNI`),
  ADD KEY `Reserves_fk1` (`ID_Activitat`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activitat`
--
ALTER TABLE `activitat`
  MODIFY `ID_Activitat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `activitat_colectiva`
--
ALTER TABLE `activitat_colectiva`
  MODIFY `ID_Activitat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `activitat_individual`
--
ALTER TABLE `activitat_individual`
  MODIFY `ID_Activitat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activitat`
--
ALTER TABLE `activitat`
  ADD CONSTRAINT `Activitat_fk0` FOREIGN KEY (`ID_s`) REFERENCES `sala` (`ID`);

--
-- Filtros para la tabla `activitat_colectiva`
--
ALTER TABLE `activitat_colectiva`
  ADD CONSTRAINT `Activitat_colectiva_fk0` FOREIGN KEY (`ID_Activitat`) REFERENCES `activitat` (`ID_Activitat`);

--
-- Filtros para la tabla `activitat_individual`
--
ALTER TABLE `activitat_individual`
  ADD CONSTRAINT `Activitat_individual_fk0` FOREIGN KEY (`ID_Activitat`) REFERENCES `activitat` (`ID_Activitat`);

--
-- Filtros para la tabla `apuntar`
--
ALTER TABLE `apuntar`
  ADD CONSTRAINT `Apuntar_fk0` FOREIGN KEY (`ID_h`) REFERENCES `historial` (`ID`),
  ADD CONSTRAINT `Apuntar_fk1` FOREIGN KEY (`DNI_c`) REFERENCES `client` (`DNI`);

--
-- Filtros para la tabla `monitor`
--
ALTER TABLE `monitor`
  ADD CONSTRAINT `Monitor_fk0` FOREIGN KEY (`ID`) REFERENCES `sala` (`ID`);

--
-- Filtros para la tabla `participa`
--
ALTER TABLE `participa`
  ADD CONSTRAINT `Participa_fk0` FOREIGN KEY (`DNI`) REFERENCES `client` (`DNI`),
  ADD CONSTRAINT `Participa_fk1` FOREIGN KEY (`ID_Cursa`) REFERENCES `cursa` (`ID_Cursa`);

--
-- Filtros para la tabla `reserves`
--
ALTER TABLE `reserves`
  ADD CONSTRAINT `Reserves_fk0` FOREIGN KEY (`DNI`) REFERENCES `client` (`DNI`),
  ADD CONSTRAINT `Reserves_fk1` FOREIGN KEY (`ID_Activitat`) REFERENCES `activitat` (`ID_Activitat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
