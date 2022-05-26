-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2021 a las 00:00:01
-- Versión del servidor: 5.7.34-log
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `thenp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(45) NOT NULL,
  `alias_admin` varchar(45) NOT NULL,
  `correo_admin` varchar(45) NOT NULL,
  `contra_admin` varchar(45) NOT NULL,
  `sexo_admin` varchar(45) DEFAULT NULL,
  `fechana_admin` datetime DEFAULT NULL,
  `fotop_admin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nom_admin`, `alias_admin`, `correo_admin`, `contra_admin`, `sexo_admin`, `fechana_admin`, `fotop_admin`) VALUES
(1, 'Dante', 'Dantee', 'danterara26@gmail.com', 'Dante@234%', 'Masculino', '2003-06-05 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `id_amig` int(11) NOT NULL,
  `estado_amig` varchar(45) NOT NULL,
  `id_usu1` int(11) DEFAULT NULL,
  `id_eamig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_com` int(11) NOT NULL,
  `txt_com` varchar(45) DEFAULT NULL,
  `img_com` varchar(45) DEFAULT NULL,
  `fecha_com` datetime DEFAULT NULL,
  `reportes_com` int(11) DEFAULT NULL,
  `Comentarioscol` varchar(45) DEFAULT NULL,
  `id_publi` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eusuario-amigos`
--

CREATE TABLE `eusuario-amigos` (
  `id_eamig` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eusuario-grupo`
--

CREATE TABLE `eusuario-grupo` (
  `id_eug` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_g` int(11) NOT NULL,
  `nom_g` varchar(45) NOT NULL,
  `foto_g` varchar(45) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mens` int(11) NOT NULL,
  `texto_mens` varchar(45) DEFAULT NULL,
  `img_mens` varchar(45) DEFAULT NULL,
  `fecha_mens` datetime DEFAULT NULL,
  `id_usu1` int(11) DEFAULT NULL,
  `id_usu` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `misgrupos`
--

CREATE TABLE `misgrupos` (
  `id_mig` int(11) NOT NULL,
  `id_eug` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id_publi` int(11) NOT NULL,
  `texto_publi` varchar(45) DEFAULT NULL,
  `reacciones_publi` int(11) DEFAULT NULL,
  `foto__publi` varchar(45) DEFAULT NULL,
  `reportes_publi` int(11) DEFAULT NULL,
  `fecha_publi` datetime DEFAULT NULL,
  `nocomentarios_publi` int(11) DEFAULT NULL,
  `id_usu` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `nom_usu` varchar(45) NOT NULL,
  `app_usu` varchar(45) NOT NULL,
  `apm_usu` varchar(45) NOT NULL,
  `fecha_usu` date NOT NULL,
  `contra_usu` varchar(45) NOT NULL,
  `sexo_usu` varchar(45) DEFAULT NULL,
  `correo_usu` varchar(45) NOT NULL,
  `area_usu` set('ingles','progra') DEFAULT NULL,
  `rol_usu` varchar(45) DEFAULT NULL,
  `noseguidos_usu` int(11) DEFAULT NULL,
  `noseguidores_usu` int(11) DEFAULT NULL,
  `alias_usu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nom_usu`, `app_usu`, `apm_usu`, `fecha_usu`, `contra_usu`, `sexo_usu`, `correo_usu`, `area_usu`, `rol_usu`, `noseguidos_usu`, `noseguidores_usu`, `alias_usu`) VALUES
(1, 'Dante', 'Ramirez', 'Aranda', '2003-06-05', 'Dante@234g', 'masculino', 'dramireza1802@alumno.ipn.mx', NULL, NULL, NULL, NULL, ''),
(3, 'afds', 'fs', 'dfs', '2021-11-12', 'dfgdfg', '2', 'ASda@sda.com', NULL, NULL, NULL, NULL, 'gd'),
(6, 'Israel', 'aaa', 'd', '2021-11-02', 'aaaaa', '1', 'pepperoni@gmail.com', NULL, NULL, NULL, NULL, 'dsa'),
(7, 'Perez', 'Aranda', 'Juan', '2021-11-14', 'aaaaaa', '1', 'daaaa@gmail.com', NULL, NULL, NULL, NULL, 'Perez34'),
(8, 'Jaime', 'Minor', 'Minor', '2021-12-01', 'fdssdf', '1', 'jaime@ipn.mx', NULL, NULL, NULL, NULL, 'demonassit'),
(9, 'Jaime', 'Minor', 'Minor', '2021-12-01', 'dsf', '1', 'jaimeaa@ipn.mx', NULL, NULL, NULL, NULL, 'demonassit');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id_amig`,`id_eamig`),
  ADD KEY `fk_Amigos_Eusuario-amigos1_idx` (`id_eamig`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_com`,`id_publi`,`id_usu`,`id_admin`),
  ADD KEY `fk_Comentarios_publicaciones1_idx` (`id_publi`,`id_usu`,`id_admin`);

--
-- Indices de la tabla `eusuario-amigos`
--
ALTER TABLE `eusuario-amigos`
  ADD PRIMARY KEY (`id_eamig`,`id_usu`),
  ADD KEY `fk_Eusuario-amigos_Usuarios1_idx` (`id_usu`);

--
-- Indices de la tabla `eusuario-grupo`
--
ALTER TABLE `eusuario-grupo`
  ADD PRIMARY KEY (`id_eug`,`id_usu`),
  ADD KEY `fk_Eusuario-grupo_Usuarios1_idx` (`id_usu`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_g`,`id_usu`),
  ADD KEY `fk_Grupos_Usuarios_idx` (`id_usu`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mens`,`id_usu`,`id_admin`),
  ADD KEY `fk_Mensajes_Usuarios1_idx` (`id_usu`),
  ADD KEY `fk_Mensajes_Administrador1_idx` (`id_admin`);

--
-- Indices de la tabla `misgrupos`
--
ALTER TABLE `misgrupos`
  ADD PRIMARY KEY (`id_mig`,`id_eug`),
  ADD KEY `fk_misgrupos_Eusuario-grupo1_idx` (`id_eug`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_publi`,`id_usu`,`id_admin`),
  ADD KEY `fk_publicaciones_Usuarios1_idx` (`id_usu`),
  ADD KEY `fk_publicaciones_Administrador1_idx` (`id_admin`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `amigos`
--
ALTER TABLE `amigos`
  MODIFY `id_amig` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eusuario-amigos`
--
ALTER TABLE `eusuario-amigos`
  MODIFY `id_eamig` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_g` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mens` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `fk_Amigos_Eusuario-amigos1` FOREIGN KEY (`id_eamig`) REFERENCES `eusuario-amigos` (`id_eamig`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_Comentarios_publicaciones1` FOREIGN KEY (`id_publi`,`id_usu`,`id_admin`) REFERENCES `publicaciones` (`id_publi`, `id_usu`, `id_admin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `eusuario-amigos`
--
ALTER TABLE `eusuario-amigos`
  ADD CONSTRAINT `fk_Eusuario-amigos_Usuarios1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `eusuario-grupo`
--
ALTER TABLE `eusuario-grupo`
  ADD CONSTRAINT `fk_Eusuario-grupo_Usuarios1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `fk_Grupos_Usuarios` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `fk_Mensajes_Administrador1` FOREIGN KEY (`id_admin`) REFERENCES `administrador` (`id_admin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mensajes_Usuarios1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `misgrupos`
--
ALTER TABLE `misgrupos`
  ADD CONSTRAINT `fk_misgrupos_Eusuario-grupo1` FOREIGN KEY (`id_eug`) REFERENCES `eusuario-grupo` (`id_eug`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `fk_publicaciones_Administrador1` FOREIGN KEY (`id_admin`) REFERENCES `administrador` (`id_admin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicaciones_Usuarios1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
