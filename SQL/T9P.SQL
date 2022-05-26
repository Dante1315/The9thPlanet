-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2021 a las 03:05:27
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
-- Base de datos: `t9p`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(45) NOT NULL,
  `app_admin` varchar(45) NOT NULL,
  `apm_admin` varchar(45) NOT NULL,
  `fecha_admin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `id_am` int(11) NOT NULL,
  `recibe_am` int(11) NOT NULL,
  `estado_am` varchar(45) DEFAULT NULL,
  `envia_am` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`id_am`, `recibe_am`, `estado_am`, `envia_am`) VALUES
(12, 2, NULL, 1),
(13, 1, NULL, 2),
(14, 3, '0', 2),
(15, 3, '0', 2),
(16, 3, '0', 1),
(17, 1, '0', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_com` int(11) NOT NULL,
  `texto_com` varchar(45) DEFAULT NULL,
  `foto_com` varchar(45) DEFAULT NULL,
  `reportes_com` int(11) DEFAULT NULL,
  `fecha_com` datetime NOT NULL,
  `id_publi` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_com`, `texto_com`, `foto_com`, `reportes_com`, `fecha_com`, `id_publi`, `id_usu`) VALUES
(1, 'Hola', NULL, NULL, '2021-11-16 14:55:28', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_men` int(11) NOT NULL,
  `texto_men` varchar(45) DEFAULT NULL,
  `foto_men` varchar(45) DEFAULT NULL,
  `recibe_men` int(11) NOT NULL,
  `envia_men` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_no` int(11) NOT NULL,
  `accion_no` varchar(45) NOT NULL,
  `id_publi` int(11) NOT NULL,
  `visto` int(11) NOT NULL,
  `fecha_no` datetime NOT NULL,
  `iid_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id_publi` int(11) NOT NULL,
  `texto_publi` varchar(45) DEFAULT NULL,
  `foto_publi` varchar(45) DEFAULT NULL,
  `nocomentarios_publi` int(11) DEFAULT NULL,
  `reacciones_publi` int(11) DEFAULT NULL,
  `reportes_publi` int(11) DEFAULT NULL,
  `fecha_publi` datetime NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id_publi`, `texto_publi`, `foto_publi`, `nocomentarios_publi`, `reacciones_publi`, `reportes_publi`, `fecha_publi`, `id_usu`) VALUES
(1, 'Holaaa', 'fotos/Captura de pantalla (384).png', NULL, NULL, NULL, '2021-11-16 14:55:22', 1),
(2, 'a', 'fotos/', NULL, NULL, NULL, '2021-11-16 15:14:17', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reacciones`
--

CREATE TABLE `reacciones` (
  `id_re` int(11) NOT NULL,
  `id_publi` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reacciones`
--

INSERT INTO `reacciones` (`id_re`, `id_publi`, `id_usu`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `nom_usu` varchar(45) NOT NULL,
  `app_usu` varchar(45) NOT NULL,
  `apm_usu` varchar(45) NOT NULL,
  `alias_usu` varchar(45) NOT NULL,
  `fecha_usu` varchar(45) NOT NULL,
  `correo_usu` varchar(45) NOT NULL,
  `contra_usu` varchar(45) NOT NULL,
  `area_usu` varchar(45) DEFAULT NULL,
  `rol_usu` varchar(45) NOT NULL,
  `foto_usu` varchar(45) DEFAULT NULL,
  `sexo_usu` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nom_usu`, `app_usu`, `apm_usu`, `alias_usu`, `fecha_usu`, `correo_usu`, `contra_usu`, `area_usu`, `rol_usu`, `foto_usu`, `sexo_usu`) VALUES
(1, 'Dante', 'Ramirez', 'Aranda', 'DarthDante', '2003-06-05', 'danterara26@gmail.com', 'Dante@23$', NULL, 'Alumno', './img/sinfotoperfil.jpg', '1'),
(2, 'Israel', 'Raaaa', 'Aranda', 'DarthDant', '2000-02-10', 'anterara26@gmail.com', 'Dante@23$', NULL, 'Alumno', './img/sinfotoperfil.jpg', '1'),
(3, 'fdsafdsa', 'fdsfsd', 'dsfsaf', 'dfasfas', '2000-01-01', 'dante12@gmail.com', 'Dante@23$', NULL, 'Alumno', './img/sinfotoperfil.jpg', '1');

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
  ADD PRIMARY KEY (`id_am`,`envia_am`),
  ADD KEY `fk_amigos_usuarios1_idx` (`envia_am`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_com`,`id_publi`),
  ADD KEY `fk_comentarios_publicaciones1_idx` (`id_publi`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_men`,`envia_men`),
  ADD KEY `fk_mensajes_usuarios1_idx` (`envia_men`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_no`,`iid_usu`),
  ADD KEY `fk_Notificaciones_usuarios1_idx` (`iid_usu`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_publi`,`id_usu`),
  ADD KEY `fk_publicaciones_usuarios_idx` (`id_usu`);

--
-- Indices de la tabla `reacciones`
--
ALTER TABLE `reacciones`
  ADD PRIMARY KEY (`id_re`,`id_publi`),
  ADD KEY `fk_reacciones_publicaciones1_idx` (`id_publi`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `amigos`
--
ALTER TABLE `amigos`
  MODIFY `id_am` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_men` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reacciones`
--
ALTER TABLE `reacciones`
  MODIFY `id_re` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `fk_amigos_usuarios1` FOREIGN KEY (`envia_am`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_publicaciones1` FOREIGN KEY (`id_publi`) REFERENCES `publicaciones` (`id_publi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `fk_mensajes_usuarios1` FOREIGN KEY (`envia_men`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `fk_Notificaciones_usuarios1` FOREIGN KEY (`iid_usu`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `fk_publicaciones_usuarios` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reacciones`
--
ALTER TABLE `reacciones`
  ADD CONSTRAINT `fk_reacciones_publicaciones1` FOREIGN KEY (`id_publi`) REFERENCES `publicaciones` (`id_publi`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
