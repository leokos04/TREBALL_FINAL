-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-02-2023 a las 22:10:14
-- Versión del servidor: 8.0.32-0ubuntu0.20.04.2
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ldk_prototipo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `id` int NOT NULL,
  `nombre` text NOT NULL,
  `grupo` text NOT NULL,
  `pais` text NOT NULL,
  `fecha_creacion` date NOT NULL,
  `cantidad` int NOT NULL,
  `imagen` text NOT NULL,
  `mp3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`id`, `nombre`, `grupo`, `pais`, `fecha_creacion`, `cantidad`, `imagen`, `mp3`) VALUES
(56, 'mario dame dineros', 'Desarrolladores', 'esp', '2023-01-08', 1005, 'fresa.png', 'SHAKIRA___BZRP_Music_Sessions_53.mp3'),
(59, 'Squizofrenia', 'leo', 'bg', '2023-02-03', 57, 'wd3edc_1940c6bec72a86b585ad6cf7e7d226e7d0f11e08.jpg', 'SnapInsta.io - Kalush Orchestra - Stefania (Official Video Eurovision 2022) (128 kbps).mp3'),
(60, 'Alcoholicos Anonimos', 'leo', 'bg', '2023-02-03', 43, 'who-is-hasbulla-magomedov-everything-you-need-to-know-about-mini-khabib-1631203934-view-0.png', 'SnapInsta.io - Kalush Orchestra - Stefania (Official Video Eurovision 2022) (128 kbps).mp3'),
(61, 'Mario lucho por tu amor', 'leo', 'bg', '2023-02-03', 17, 'Hasbulla-with-his-father.jpg', 'Tito_Silva_X_Tefi_C_Mi_Bebito_Fiu_Fiu_Letra_L.mp3'),
(62, 'Primero validar luego programar', 'Mario', 'esp', '2023-02-03', 1, 'limon.png', 'SnapInsta.io - Dimitri Vegas & Like Mike - Rampage (128 kbps).mp3'),
(63, 'Julian UwU', 'Lokost', 'esp', '2023-02-05', 6, 'image.png', 'SnapSave.io - Yonkou MacroRap (One Piece) - Caos _ SoulRap ft. Varios Artistas (128 kbps).mp3'),
(64, 'mluz', 'ml', 'ml', '2023-02-24', 11, 'Dictado7-Claudia.jpg', '1.Cumpleaños feliz.mp3'),
(65, 'aaa', 'aa', 'aaa', '2023-02-11', 5, 'Captura de pantalla 2022-10-16 212120.png', 'SHAKIRA____BZRP_Music_Sessions_53.mp3'),
(66, 'bb', 'bb', 'esp', '2023-02-19', 5, 'WhatsApp Image 2023-02-18 at 20.32.04 (1).jpeg', 'correct.mp3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_cancion` int NOT NULL,
  `fecha_adquision` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `id_usuario`, `id_cancion`, `fecha_adquision`) VALUES
(74, 12, 59, '2023-02-04 03:22:14'),
(75, 12, 59, '2023-02-04 03:22:15'),
(86, 1, 56, '2023-02-05 01:01:23'),
(87, 1, 56, '2023-02-05 01:01:59'),
(88, 1, 56, '2023-02-05 01:02:03'),
(89, 1, 60, '2023-02-05 01:02:37'),
(92, 1, 62, '2023-02-05 01:08:02'),
(93, 1, 61, '2023-02-05 20:18:12'),
(94, 1, 61, '2023-02-05 20:18:14'),
(95, 1, 61, '2023-02-05 20:18:15'),
(98, 1, 61, '2023-02-05 20:18:22'),
(99, 1, 61, '2023-02-05 20:18:24'),
(102, 11, 59, '2023-02-05 22:27:50'),
(103, 11, 62, '2023-02-05 22:28:08'),
(104, 11, 62, '2023-02-05 22:28:10'),
(105, 11, 62, '2023-02-05 22:28:12'),
(107, 11, 59, '2023-02-05 22:28:29'),
(111, 15, 56, '2023-02-13 11:28:26'),
(112, 15, 56, '2023-02-13 11:28:28'),
(113, 15, 56, '2023-02-13 11:29:24'),
(114, 15, 56, '2023-02-13 11:29:28'),
(115, 15, 56, '2023-02-13 11:29:28'),
(116, 15, 56, '2023-02-13 11:29:29'),
(117, 15, 56, '2023-02-13 11:29:29'),
(118, 15, 56, '2023-02-13 11:29:30'),
(119, 15, 56, '2023-02-13 11:29:30'),
(120, 15, 56, '2023-02-13 11:29:31'),
(121, 15, 56, '2023-02-13 11:29:31'),
(122, 15, 56, '2023-02-13 11:29:32'),
(123, 15, 56, '2023-02-13 11:29:33'),
(124, 15, 56, '2023-02-13 11:29:33'),
(125, 15, 56, '2023-02-13 11:29:34'),
(126, 15, 56, '2023-02-13 11:29:35'),
(127, 15, 56, '2023-02-13 11:29:35'),
(128, 15, 56, '2023-02-13 11:29:36'),
(133, 1, 59, '2023-02-16 10:16:45'),
(137, 16, 62, '2023-02-16 13:24:35'),
(138, 16, 62, '2023-02-16 13:24:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_pass` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `user_pass`, `rol`) VALUES
(1, 'leokos', 'leokos004@gmail.com', '48eece05064738df375f8a2caad885c8', 'admin'),
(2, 'prueba', 'prueba@gmail.es', '48eece05064738df375f8a2caad885c8', 'user'),
(5, 'prueba2', 'prueba2@solvam.es', '48eece05064738df375f8a2caad885c8', 'user'),
(11, 'leokos', 'leokos0041@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'user'),
(12, 'leokos', 'leonardo.d.kostadinov@gmail.com', '21ff01ab13dc46cc5c08af9f077df9db', 'user'),
(13, 'asd', 'asd@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'user'),
(14, 'ml', 'ml@ml.es', 'a2fff333b392ca01069e6cf3f5337b9a', 'user'),
(15, 'admin', 'jose@gmail.com', 'a5e5d0fdaf24852473e4ff9bab6a6393', 'user'),
(16, 'ivanito', 'ivan.sanchez.giner@gmail.com', '2f92ec38c9dc802943a9cc0b271c03cf', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_cancion` (`id_cancion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_cancion`) REFERENCES `canciones` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
