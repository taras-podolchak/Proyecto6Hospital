-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2022 a las 08:44:27
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
-- Base de datos: `hospital_0`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `borrarDept` (IN `Num` INT)   delete from dept where dept_No = Num$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarDoctor` (IN `hospCod` INT, IN `apell` VARCHAR(50), IN `espec` VARCHAR(100), IN `sal` INT)   INSERT INTO doctor(hospital_cod,apellido,especialidad,salario)
VALUES(
    hospCod,
    apell,
    espec,
    sal
)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicilio` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_o` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido1`, `apellido2`, `domicilio`, `ciudad`, `sexo`, `s_o`, `comentario`) VALUES
(1, 'a', 'a', '', '', 'Girona', NULL, '', 'Escribe aquí tus comentarios'),
(2, 'Taras', 'Podolchak', '', 'calle Piqueñas 2', 'Madrid', 'Hombre', 'Windows 8,W 2008,', 'Escribe aquí tus comentarios'),
(3, 'Taras', 'Podolchak', '', 'calle Piqueñas 2', 'Madrid', 'Hombre', 'Windows 8,W 2008', 'Escribe aquí tus comentarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dept`
--

CREATE TABLE `dept` (
  `DEPT_NO` int(11) NOT NULL,
  `DNOMBRE` varchar(40) DEFAULT NULL,
  `LOC` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dept`
--

INSERT INTO `dept` (`DEPT_NO`, `DNOMBRE`, `LOC`) VALUES
(10, 'CONTABILIDAD', 'SEVILLA'),
(20, 'INVESTIGACIÓN', 'MADRID'),
(30, 'VENTAS', 'BARCELONA'),
(40, 'PRODUCCIÓN', 'BILBAO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `HOSPITAL_COD` int(11) DEFAULT NULL,
  `DOCTOR_NO` int(11) NOT NULL,
  `APELLIDO` varchar(50) DEFAULT NULL,
  `ESPECIALIDAD` varchar(40) DEFAULT NULL,
  `SALARIO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`HOSPITAL_COD`, `DOCTOR_NO`, `APELLIDO`, `ESPECIALIDAD`, `SALARIO`) VALUES
(33, 1, 'Fernandez', 'yo que se', 25000),
(17, 120, 'Curro F.', 'Urologia', 250000),
(22, 386, 'Cabeza D.', 'Psiquiatria', 125000),
(22, 398, 'Best K.', 'Urologia', 150000),
(19, 435, 'Lopez A.', 'Cardiologia', 350000),
(22, 453, 'Galo C.', 'Pediatria', 250000),
(17, 521, 'Nino P.', 'Neurologia', 390000),
(45, 522, 'Adams C.', 'Neurologia', 450000),
(18, 585, 'Miller G.', 'Ginecologia', 250000),
(45, 607, 'Niqo P.', 'Pediatria', 240000),
(18, 982, 'Cajal R', 'Cardiologia', 290000),
(20, 983, 'Podolchak', 'yo que se', 300000),
(20, 984, 'Podolchak', 'yo que se', 30000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emp`
--

CREATE TABLE `emp` (
  `EMP_NO` int(11) NOT NULL,
  `APELLIDO` varchar(40) DEFAULT NULL,
  `OFICIO` varchar(40) DEFAULT NULL,
  `DIR` int(11) DEFAULT NULL,
  `FECHA_ALT` date DEFAULT NULL,
  `SALARIO` int(11) DEFAULT NULL,
  `COMISION` int(11) DEFAULT NULL,
  `DEPT_NO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `emp`
--

INSERT INTO `emp` (`EMP_NO`, `APELLIDO`, `OFICIO`, `DIR`, `FECHA_ALT`, `SALARIO`, `COMISION`, `DEPT_NO`) VALUES
(7369, 'sanchez', 'EMPLEADO', 7902, '1994-12-17', 104000, 0, 20),
(7499, 'arroyo', 'VENDEDOR', 7698, '1994-02-20', 208000, 39000, 30),
(7521, 'sala', 'VENDEDOR', 7698, '1995-02-22', 162500, 65000, 30),
(7566, 'jimenez', 'DIRECTOR', 7839, '1995-04-02', 386750, 0, 20),
(7654, 'martin', 'VENDEDOR', 7698, '1955-07-29', 162500, 182000, 30),
(7698, 'negro', 'DIRECTOR', 7839, '1995-05-01', 370500, 0, 30),
(7782, 'cerezo', 'DIRECTOR', 7839, '1995-06-09', 318500, 0, 10),
(7788, 'gil', 'ANALISTA', 7566, '1995-11-09', 390000, 0, 20),
(7839, 'rey', 'PRESIDENTE', NULL, '1995-11-17', 650000, NULL, 10),
(7844, 'tovar', 'VENDEDOR', 7698, '1995-07-08', 195000, 0, 30),
(7876, 'alonso', 'EMPLEADO', 7788, '1995-07-23', 143000, 0, 20),
(7900, 'jimeno', 'EMPLEADO', 7698, '1995-12-03', 123500, 0, 30),
(7902, 'fernandez', 'ANALISTA', 7566, '1995-12-11', 390000, 0, 20),
(7934, 'muñoz', 'EMPLEADO', 7782, '1996-01-23', 169000, 0, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermo`
--

CREATE TABLE `enfermo` (
  `INSCRIPCION` int(11) NOT NULL,
  `APELLIDO` varchar(40) DEFAULT NULL,
  `DIRECCION` varchar(50) DEFAULT NULL,
  `FECHA_NAC` date DEFAULT NULL,
  `SEXO` varchar(1) DEFAULT NULL,
  `NSS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `enfermo`
--

INSERT INTO `enfermo` (`INSCRIPCION`, `APELLIDO`, `DIRECCION`, `FECHA_NAC`, `SEXO`, `NSS`) VALUES
(10995, 'Languia M.', 'Goya 20', '1956-05-16', 'M', 280862482),
(14024, 'Fernandez N.', 'Recoletos', '1967-07-23', 'F', 321790059),
(18004, 'Serrano V.', 'Alcala 12', '1960-05-21', 'F', 284991452),
(36658, 'Domin S.', 'Mayor 71', '1942-01-01', 'M', 160657471),
(38702, 'Neal R.', 'Orense 21', '1940-07-18', 'F', 380010217),
(39217, 'Cervantes M.', 'Perón 8', '1952-02-19', 'M', 440294390),
(59076, 'Miller G.', 'Lopez de Hoyos 2', '1945-10-10', 'F', 311969044),
(63827, 'Ruiz P.', 'Esquerdo 103', '1980-12-26', 'M', 200973253),
(64882, 'Fraser A.', 'Soto 3', '1980-08-19', 'F', 285201776),
(74835, 'Benitez E.', 'Argentina 5', '1956-10-05', 'M', 154811767),
(74844, 'Podolchak', 'Madrid', '2022-07-26', 'M', 123456789);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospital`
--

CREATE TABLE `hospital` (
  `HOSPITAL_COD` int(11) NOT NULL,
  `NOMBRE` varchar(40) DEFAULT NULL,
  `DIRECCION` varchar(50) DEFAULT NULL,
  `TELEFONO` varchar(9) DEFAULT NULL,
  `NUM_CAMA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hospital`
--

INSERT INTO `hospital` (`HOSPITAL_COD`, `NOMBRE`, `DIRECCION`, `TELEFONO`, `NUM_CAMA`) VALUES
(17, 'ruber', 'juan bravo 49', '914027100', 217),
(18, 'general', 'Atocha s/n', '595-3111', 987),
(19, 'provincial', 'o donell 50', '964-4264', 502),
(22, 'la paz', 'castellana 1000', '923-5411', 412),
(45, 'san carlos', 'ciudad universitaria', '597-1500', 845);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupacion`
--

CREATE TABLE `ocupacion` (
  `INSCRIPCION` int(11) NOT NULL,
  `HOSPITAL_COD` int(11) NOT NULL,
  `SALA_COD` int(11) NOT NULL,
  `CAMA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ocupacion`
--

INSERT INTO `ocupacion` (`INSCRIPCION`, `HOSPITAL_COD`, `SALA_COD`, `CAMA`) VALUES
(10995, 13, 3, 1),
(14024, 13, 3, 3),
(18004, 13, 3, 2),
(36658, 18, 4, 1),
(38702, 18, 4, 2),
(39217, 22, 6, 1),
(59076, 22, 6, 2),
(63827, 22, 6, 3),
(64823, 22, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `idPlan` int(11) NOT NULL,
  `HOSPITAL_COD` int(11) DEFAULT NULL,
  `SALA_COD` int(11) DEFAULT NULL,
  `EMPLEADO_NO` int(11) NOT NULL,
  `APELLIDO` varchar(40) DEFAULT NULL,
  `FUNCION` varchar(30) DEFAULT NULL,
  `TURNO` varchar(1) DEFAULT NULL,
  `SALARIO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`idPlan`, `HOSPITAL_COD`, `SALA_COD`, `EMPLEADO_NO`, `APELLIDO`, `FUNCION`, `TURNO`, `SALARIO`) VALUES
(1, 19, 6, 3754, 'diaz b.', 'ENFERMERO', 'T', 226200),
(2, 19, 6, 3106, 'hernandez j.', 'ENFERMERO', 'T', 275500),
(3, 18, 4, 6357, 'karplus w.', 'INTERINO', 'T', 337900),
(4, 22, 6, 1009, 'higueras d.', 'ENFERMERA', 'T', 200500),
(5, 22, 6, 8422, 'bocina g.', 'ENFERMERO', 'M', 163800),
(6, 22, 2, 9901, 'nuñez c.', 'INTERINO', 'M', 221000),
(7, 22, 1, 6065, 'rivera g.', 'ENFERMERA', 'N', 162600),
(8, 22, 1, 7379, 'carlos r.', 'ENFERMERA', 'T', 211900),
(9, 45, 4, 1280, 'amigo r.', 'INTERINO', 'N', 221000),
(10, 45, 1, 8526, 'frank h.', 'ENFERMERO', 'T', 252200),
(11, 17, 2, 8519, 'chuko c.', 'ENFERMERO', 'T', 252200),
(12, 17, 6, 8520, 'palomo c.', 'INTERINO', 'M', 219210),
(13, 17, 6, 8521, 'cortes v.', 'ENFERMERA', 'N', 221200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `idSala` int(11) NOT NULL,
  `HOSPITAL_COD` int(11) NOT NULL,
  `SALA_COD` int(11) DEFAULT NULL,
  `NOMBRE` varchar(40) DEFAULT NULL,
  `NUM_CAMA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`idSala`, `HOSPITAL_COD`, `SALA_COD`, `NOMBRE`, `NUM_CAMA`) VALUES
(1, 19, 3, 'cuidados intensivos', 21),
(2, 19, 6, 'psiquiatria', 67),
(3, 18, 3, 'cuidados intensivos', 10),
(4, 18, 4, 'cardiologia', 53),
(5, 22, 1, 'recuperacion', 10),
(6, 22, 6, 'psiquiatria', 118),
(7, 22, 2, 'maternidad', 34),
(8, 45, 4, 'cardiologia', 55),
(9, 45, 1, 'recuperacion', 17),
(10, 45, 2, 'maternidad', 24),
(11, 17, 2, 'maternidad', 19),
(12, 17, 6, 'psiquiatria', 20),
(13, 17, 3, 'cuidados intensivos', 21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`DEPT_NO`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DOCTOR_NO`);

--
-- Indices de la tabla `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`EMP_NO`);

--
-- Indices de la tabla `enfermo`
--
ALTER TABLE `enfermo`
  ADD PRIMARY KEY (`INSCRIPCION`);

--
-- Indices de la tabla `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`HOSPITAL_COD`);

--
-- Indices de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  ADD PRIMARY KEY (`INSCRIPCION`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`idPlan`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`idSala`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `DOCTOR_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=985;

--
-- AUTO_INCREMENT de la tabla `enfermo`
--
ALTER TABLE `enfermo`
  MODIFY `INSCRIPCION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74845;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `idPlan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `idSala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
