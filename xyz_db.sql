-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-12-2013 a las 21:08:54
-- Versión del servidor: 5.5.34-0ubuntu0.12.04.1
-- Versión de PHP: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `xyz_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_admin` varchar(32) NOT NULL,
  `mail_admin` varchar(32) NOT NULL,
  `password_admin` varchar(32) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `mail_publisher` (`mail_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `name_admin`, `mail_admin`, `password_admin`, `status`) VALUES
(5, 'Cristina', 'cristina@salva.com', '0c74ac34d6652b2da30488d4f38496d8', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(32) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`, `status`) VALUES
(3, 'Aventuras', '1'),
(4, 'Cartas', '1'),
(16, 'Puzzles', '1'),
(6, 'Coches', '0'),
(7, 'Colorear', '1'),
(8, 'Deportes', '1'),
(9, 'Estrategia', '1'),
(12, 'Naval', '1'),
(13, 'Rompecabezas', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories_games`
--

CREATE TABLE IF NOT EXISTS `categories_games` (
  `id_category_game` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_category` int(10) unsigned NOT NULL,
  `id_game` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_category_game`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `categories_games`
--

INSERT INTO `categories_games` (`id_category_game`, `id_category`, `id_game`) VALUES
(1, 12, 1),
(2, 9, 2),
(3, 9, 3),
(4, 9, 4),
(5, 9, 5),
(6, 9, 6),
(7, 4, 7),
(8, 13, 7),
(9, 4, 13),
(10, 3, 0),
(11, 3, 0),
(12, 3, 0),
(13, 3, 0),
(14, 7, 0),
(15, 7, 0),
(16, 3, 0),
(17, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories_photos`
--

CREATE TABLE IF NOT EXISTS `categories_photos` (
  `id_category_photo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_category` int(10) unsigned NOT NULL,
  `id_photo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_category_photo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `categories_photos`
--

INSERT INTO `categories_photos` (`id_category_photo`, `id_category`, `id_photo`) VALUES
(1, 4, 1),
(2, 6, 2),
(3, 8, 3),
(4, 7, 4),
(5, 13, 5),
(6, 12, 6),
(7, 9, 7),
(8, 3, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donations`
--

CREATE TABLE IF NOT EXISTS `donations` (
  `id_donation` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `money` float NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_donation`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `donations`
--

INSERT INTO `donations` (`id_donation`, `id_user`, `id_game`, `money`, `date`) VALUES
(5, 1, 5, 456, '2013-02-18 20:51:28'),
(4, 1, 5, 2334, '2013-02-18 20:49:20'),
(3, 1, 5, 1345680, '2013-02-18 20:35:24'),
(6, 1, 5, 456, '2013-02-18 20:51:36'),
(7, 1, 4, 456, '2013-02-18 20:51:45'),
(8, 1, 4, 1212, '2013-02-18 20:53:51'),
(9, 1, 4, 8328730000000, '2013-02-18 20:55:33'),
(10, 1, 4, 8328730000000, '2013-02-18 20:55:38'),
(11, 1, 4, 8328730000000, '2013-02-18 20:55:38'),
(12, 1, 4, 8328730000000, '2013-02-18 20:55:38'),
(13, 1, 4, 8328730000000, '2013-02-18 20:55:38'),
(14, 1, 4, 8328730000000, '2013-02-18 20:55:39'),
(15, 1, 4, 83287, '2013-02-18 20:55:57'),
(16, 1, 4, 3434, '2013-02-18 20:57:41'),
(17, 1, 3, 2, '2013-02-18 20:59:49'),
(18, 1, 2, 23234, '2013-02-18 21:01:11'),
(19, 5, 5, 500, '2013-02-19 20:46:44'),
(20, 1, 5, 5, '2013-02-25 21:18:36'),
(21, 1, 5, 344, '2013-04-05 21:42:03'),
(22, 1, 5, 2, '2013-04-23 19:20:30'),
(23, 1, 5, 2, '2013-04-23 19:20:31'),
(24, 1, 5, 2, '2013-04-23 19:20:31'),
(25, 1, 5, 2, '2013-04-23 19:20:32'),
(26, 1, 5, 256, '2013-04-23 19:20:37'),
(27, 1, 5, 2, '2013-04-23 19:20:43'),
(28, 1, 5, 2, '2013-04-23 19:20:44'),
(29, 1, 5, 2, '2013-04-23 19:20:44'),
(30, 1, 5, 3, '2013-04-29 19:47:12'),
(31, 1, 5, 3, '2013-04-29 19:47:13'),
(32, 1, 5, 2, '2013-04-30 10:45:17'),
(33, 8, 5, 3, '2013-04-30 15:09:54'),
(34, 1, 5, 5, '2013-05-14 19:48:39'),
(35, 1, 4, 66, '2013-06-03 17:15:09'),
(36, 1, 5, 852, '2013-10-24 17:34:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `embeddeds`
--

CREATE TABLE IF NOT EXISTS `embeddeds` (
  `id_embedded` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name_embedded` text NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_embedded`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `embeddeds`
--

INSERT INTO `embeddeds` (`id_embedded`, `name_embedded`, `status`) VALUES
(1, '<script src="/project-xyz/games/triqui/triqui.js"></script>\n<center>\n<table border="1">\n<tr>\n<td style="border-style:solid;border-left-color:black;border-top-color:black;"><img src="/project-xyz/games/triqui/fondo.PNG" id="c0" onclick="box(0)" /></td>  \n<td style="border-style:solid;border-left-color:black;border-top-color:black;"><img src="/project-xyz/games/triqui/fondo.PNG" id="c1" onclick="box(1)" /></td>  \n<td style="border-style:solid;border-right-color:black;border-left-color:black;border-top-color:black;"><img src="/project-xyz/games/triqui/fondo.PNG" id="c2" onclick="box(2)" /></td>  \n</tr>\n<tr>\n<td style="border-style:solid;border-left-color:black;border-top-color:black;"><img src="/project-xyz/games/triqui/fondo.PNG" id="c3" onclick="box(3)" /></td>  \n<td style="border-style:solid;border-left-color:black;border-top-color:black;"><img src="/project-xyz/games/triqui/fondo.PNG" id="c4" onclick="box(4)" /></td>  \n<td style="border-style:solid;border-right-color:black;border-left-color:black;border-top-color:black;"><img src="/project-xyz/games/triqui/fondo.PNG" id="c5" onclick="box(5)" /></td>  \n</tr>\n<tr>\n<td style="border-style:solid;border-left-color:black;border-top-color:black;border-bottom-color:black;"><img src="/project-xyz/games/triqui/fondo.PNG" id="c6" onclick="box(6)" /></td>  \n<td style="border-style:solid;border-left-color:black;border-top-color:black;border-bottom-color:black;"><img src="/project-xyz/games/triqui/fondo.PNG" id="c7" onclick="box(7)" /></td>  \n<td style="border-style:solid;border-right-color:black;border-left-color:black;border-top-color:black;border-bottom-color:black;"><img src="/project-xyz/games/triqui/fondo.PNG" id="c8" onclick="box(8)" /></td>  \n</tr>\n<tr>\n<td>--------------</td>\n<td>--------------</td>\n<td>--------------</td>\n</tr>\n<tr>\n  <th id="player1_data">Jugador 1</th>  \n  <td>&nbsp;</td>  \n  <th id="player2_data">Jugador 2</th>  \n</tr>\n<tr>\n  <td><img src="/project-xyz/games/triqui/x.PNG" /></td>  \n  <td><img src="/project-xyz/games/triqui/limpiar.png" id="reset" onclick="limpiar()" onmouseout="suelta()" /></td>  \n  <td><img src="/project-xyz/games/triqui/bola.PNG" /></td>  \n</tr>\n<tr>\n  <td><div id="ptsjug1" style="font-weight:bold;text-align:center;">0</div></td>  \n  <td>&nbsp;</td>  \n  <td><div id="ptsjug2" style="font-weight:bold;text-align:center;">0</div></td>  \n</tr>\n</table>\n<br/ >\n<input type="button" value="Reiniciar puntaje" onclick="reiniciar()" />\n\n<script>\nloadPlayers();\n</script>', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id_game` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_parent_game` int(11) unsigned NOT NULL,
  `id_embedded` int(10) unsigned NOT NULL,
  `name_game` varchar(128) NOT NULL,
  `description_game` text NOT NULL,
  `description_short_game` text NOT NULL,
  `update` datetime NOT NULL,
  `version` int(11) unsigned NOT NULL,
  `size` int(11) unsigned NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_game`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id_game`, `id_parent_game`, `id_embedded`, `name_game`, `description_game`, `description_short_game`, `update`, `version`, `size`, `status`) VALUES
(1, 0, 0, 'Hundir la flota', 'Se compone de dos tableros por jugador, dividido cada uno en cuadr&iacute;culas. Los tableros t&iacute;picos son cuadrados de 10 por 10 casillas, y cada posici&oacute;n se identifica con n&uacute;meros para las columnas (de 1 a 10) y con letras para las filas (de la A a la J). En uno de los tableros el jugador coloca sus barcos y registra los tiros del oponente. En el otro, se registran los tiros propios.\r\nAntes de comenzar, cada jugador posiciona los barcos de forma secreta o invisible al oponente, generalmente con el tablero en posici&oacute;n vertical como pizarra. Cada uno ocupa, seg&uacute;n su modelo, una cierta cantidad de posiciones, ya sea horizontal o verticalmente. De esta forma, no se permiten lugares solapados, ya que cada uno ocupa posiciones &uacute;nicas. Ambos participantes poseen y deben ubicar igual n&uacute;mero de naves.\r\nUna vez todas las naves han sido posicionadas, se inicia una serie de rondas. En cada ronda, cada jugador en su turno indica una posici&oacute;n del tablero de su oponente. Si esa posici&oacute;n es ocupada por una parte de un barco, el oponente indica averiado (toque o tocado) y el atacante marca con rojo esa posici&oacute;n, con un pin. Cuando todas las posiciones de un mismo barco han sido da&ntilde;adas debe indicarse hundido dando a conocer tal circunstancia que indicar&aacute; al atacante la importancia de la nave destruida. Ahora bien, si la posici&oacute;n indicada, efectivamente, no posee un barco alojado, se indica con agua, y ser&aacute; marcada con un pin blanco.\r\nQuien descubra primero todas las naves ser&aacute; el vencedor, pero en caso de que el participante que comenzo la partida hunda el barco en su ultima jugada, el otro participante tiene una ultima posibilidad para alcanzar el empate.', 'Juego de estrategia para dos personas. Consiste en encontrar los barcos del otro jugador lo antes posible.', '2013-01-29 16:11:00', 1, 0, '1'),
(2, 0, 1, 'Tres en l&iacute;nea', 'El tres en l&iacute;nea, tambi&eacute;n conocido como tres en raya, juego del gato, tatet&iacute;, triqui, totito, triqui traka, tres en gallo, michi o la vieja, es un juego de l&aacute;piz y papel entre dos jugadores: O y X, que marcan los espacios de un tablero de 3x3 alternadamente. Un jugador gana si consigue tener una l&iacute;nea de tres de sus s&iacute;mbolos: la l&iacute;nea puede ser horizontal, vertical o diagonal.', 'Juego de estrategia para dos personas, consigue alinear 3 O o X antes que tu oponente ! ', '2013-01-29 16:20:00', 1, 0, '1'),
(3, 0, 0, 'Damas', 'Las damas es un juego de mesa para dos contrincantes.  \r\nEl juego consiste en mover las piezas en diagonal a trav&eacute;s de los cuadros negros o blancos del tablero de 64 &oacute; 100 cuadros, con la intenci&oacute;n de capturar las piezas del contrario saltando por encima de ellas.', 'El juego consiste en mover las piezas en diagonal a trav&eacute;s de los cuadros negros o blancos del tablero, consigue que se quede sin piezas tu oponente.', '2013-01-29 16:58:00', 1, 0, '1'),
(4, 0, 0, 'Ajedrez', '', 'Juego de estrategia para dos personas. Gana a tu contrincante los m&aacute;s r&aacute;pido posible!!', '2013-01-29 16:57:00', 1, 0, '1'),
(5, 0, 0, 'Ahorcado', 'El objetivo es adivinar una palabra o frase.\r\nAl comenzar el juego se dibuja una base, y una raya en lugar de cada letra (dejando los espacios si es que corresponden).\r\nComo ayuda suele darse el tema al cual pertenece la palabra.\r\nLuego el jugador deber&aacute; ir diciendo letras que le parece que puede contener la frase. Si acierta, se escriben todas las letras coincidentes. Si la letra no est&aacute;, se escribe la letra arriba en la base previamente dibujada antes de empezar el juego y se agrega una parte al cuerpo (cabeza, brazo, etc.). La cantidad de partes a dibujar puede cambiarse seg&uacute;n la dificultad de la palabra. La cantidad de errores o de fallas permitidas antes de completar el cuerpo, se establecen antes de empezar a jugar. Se gana el juego si se completa la frase, y se pierde si se completa el cuerpo antes de terminar la frase.', 'El objetivo es adivinar una palabra o frase. &iquest;Crees que puedes adivinar la palabra con el m&iacute;nimo de letras posibles?', '2013-01-29 19:53:00', 1, 0, '1'),
(6, 0, 0, 'Buscaminas', 'El juego consiste en despejar todas las casillas de una pantalla que no oculten una mina.\r\nAlgunas casillas tienen un n&uacute;mero, este n&uacute;mero indica las minas que suman todas las casillas circundantes. As&iacute;, si una casilla tiene el n&uacute;mero 3, significa que de las ocho casillas que hay alrededor (si no es en una esquina o borde) hay 3 con minas y 5 sin minas. Si se descubre una casilla sin n&uacute;mero indica que ninguna de las casillas vecinas tiene mina y estas se descubren autom&aacute;ticamente.\r\nSi se descubre una casilla con una mina se pierde la partida.\r\nSe puede poner una marca en las casillas que el jugador piensa que hay minas para ayudar a descubrir la que est&aacute;n cerca.', 'Intenta no caer en una mina, si lo haces has perdido la partida.\r\nSe trata de caer en casillas vacias o con n&uacute;meros.', '2013-02-24 11:41:00', 1, 0, '1'),
(7, 0, 0, 'Memory', 'Para empezar el juego, se colocan diferentes cartas boca abajo sobre una mesa, luego se revuelven, cada jugador deber&aacute; poner turnadamente boca arriba dos cartas al azar, si las dos cartas tienen la misma figura el jugador tomar&aacute; esas dos cartas las cuales le sumaran puntos y podr&aacute; autom&aacute;ticamente repetir el turno, pero si las dos cartas tienen diferentes figuras el jugador deber&aacute; volver a colocar las cartas boca abajo donde el pr&oacute;ximo jugador deber&aacute; levantar nuevamente dos cartas, las &uacute;ltimas dos cartas que queden al final podr&aacute;n ser recopiladas por cualquiera de los jugadores, una vez que las cartas se acaben cada jugador deber&aacute; contar las cartas acumuladas en el desarrollo del juego, solo el que tenga mas cartas ser&aacute; el ganador del juego.', 'Ser&aacute;s m&aacute;s r&aacute;pido que tu contrincante en encontrar el mayor n&uacute;mero de parejas?', '2013-02-24 11:43:00', 1, 0, '1'),
(13, 0, 0, 'Penaltis', 'Hacer goles en un limite de tiempo', '', '2013-04-30 16:00:00', 0, 0, '1'),
(27, 0, 0, 'Spider', 'fkasdjfkalf', 'kjdfaskjflaf', '2013-06-03 19:01:21', 1, 100, '1'),
(25, 0, 0, 'Pinta y colorea', 'Este es un juego para colorear', 'Coloreaaaa', '2013-06-03 16:14:19', 2, 200, '1'),
(26, 0, 0, 'Tadeo Jons', 'juego de aventura', 'tadeooooo rodeooo', '2013-06-03 16:15:00', 2, 100, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games_photos`
--

CREATE TABLE IF NOT EXISTS `games_photos` (
  `id_game_photo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_game` int(10) unsigned NOT NULL,
  `id_photo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_game_photo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `games_photos`
--

INSERT INTO `games_photos` (`id_game_photo`, `id_game`, `id_photo`) VALUES
(1, 1, 6),
(2, 4, 7),
(3, 3, 9),
(4, 2, 10),
(5, 5, 11),
(6, 6, 12),
(7, 7, 13),
(8, 8, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id_log` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_game` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=146 ;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id_log`, `id_user`, `id_game`, `date`, `status`) VALUES
(1, 1, 2, '2013-04-29 20:08:34', '1'),
(2, 1, 6, '2013-04-29 20:18:23', '1'),
(3, 1, 6, '2013-04-29 20:18:27', '1'),
(4, 1, 5, '2013-04-29 20:19:18', '1'),
(5, 1, 4, '2013-04-29 20:20:33', '1'),
(6, 1, 4, '2013-04-29 20:21:00', '1'),
(7, 1, 6, '2013-04-29 20:21:14', '1'),
(8, 1, 3, '2013-04-29 20:24:45', '1'),
(10, 1, 4, '2013-04-29 20:36:04', '1'),
(11, 1, 2, '2013-04-30 09:45:48', '1'),
(12, 1, 2, '2013-04-30 10:02:22', '1'),
(13, 1, 2, '2013-04-30 10:03:01', '1'),
(14, 1, 2, '2013-04-30 10:03:24', '1'),
(15, 1, 2, '2013-04-30 10:03:33', '1'),
(16, 1, 2, '2013-04-30 10:05:49', '1'),
(17, 1, 2, '2013-04-30 10:14:12', '1'),
(18, 1, 2, '2013-04-30 10:15:09', '1'),
(19, 1, 5, '2013-04-30 10:21:51', '1'),
(20, 1, 5, '2013-04-30 10:22:34', '1'),
(21, 1, 5, '2013-04-30 10:26:47', '1'),
(22, 1, 6, '2013-04-30 10:35:45', '1'),
(23, 1, 6, '2013-04-30 10:42:11', '1'),
(24, 1, 6, '2013-04-30 10:42:43', '1'),
(25, 1, 2, '2013-04-30 10:44:31', '1'),
(26, 1, 2, '2013-04-30 11:02:06', '1'),
(27, 1, 2, '2013-04-30 11:06:07', '1'),
(28, 1, 2, '2013-04-30 11:06:41', '1'),
(29, 1, 2, '2013-04-30 11:08:22', '1'),
(30, 1, 2, '2013-04-30 13:32:00', '1'),
(31, 1, 2, '2013-04-30 13:37:42', '1'),
(32, 1, 2, '2013-04-30 13:38:40', '1'),
(33, 1, 2, '2013-04-30 13:39:54', '1'),
(34, 1, 2, '2013-04-30 13:39:57', '1'),
(35, 1, 2, '2013-04-30 13:42:16', '1'),
(36, 1, 2, '2013-04-30 13:45:12', '1'),
(37, 1, 2, '2013-04-30 13:47:12', '1'),
(38, 1, 2, '2013-04-30 13:47:44', '1'),
(39, 1, 2, '2013-04-30 13:48:20', '1'),
(40, 1, 2, '2013-04-30 13:48:50', '1'),
(41, 1, 2, '2013-04-30 13:49:53', '1'),
(42, 1, 2, '2013-04-30 13:52:52', '1'),
(43, 1, 2, '2013-04-30 13:53:01', '1'),
(44, 1, 2, '2013-04-30 13:56:37', '1'),
(45, 1, 2, '2013-04-30 13:57:07', '1'),
(46, 1, 2, '2013-04-30 13:57:55', '1'),
(47, 1, 2, '2013-04-30 13:59:58', '1'),
(48, 1, 2, '2013-04-30 14:00:07', '1'),
(49, 1, 2, '2013-04-30 14:00:09', '1'),
(50, 1, 2, '2013-04-30 14:01:19', '1'),
(51, 1, 2, '2013-04-30 14:03:19', '1'),
(52, 1, 2, '2013-04-30 14:03:58', '1'),
(53, 1, 2, '2013-04-30 14:04:02', '1'),
(54, 1, 2, '2013-04-30 14:04:56', '1'),
(55, 1, 2, '2013-04-30 14:05:51', '1'),
(56, 1, 2, '2013-04-30 14:06:24', '1'),
(57, 1, 2, '2013-04-30 14:14:02', '1'),
(58, 1, 2, '2013-04-30 14:14:06', '1'),
(59, 1, 2, '2013-04-30 14:14:58', '1'),
(60, 1, 2, '2013-04-30 14:16:33', '1'),
(61, 1, 4, '2013-04-30 14:18:48', '1'),
(62, 1, 2, '2013-04-30 14:19:01', '1'),
(63, 1, 2, '2013-04-30 14:19:51', '1'),
(64, 1, 2, '2013-04-30 14:23:54', '1'),
(65, 1, 2, '2013-04-30 15:09:26', '1'),
(66, 1, 2, '2013-04-30 15:24:38', '1'),
(67, 1, 6, '2013-04-30 15:26:00', '1'),
(68, 1, 2, '2013-04-30 17:48:29', '1'),
(69, 1, 2, '2013-04-30 17:52:10', '1'),
(70, 1, 2, '2013-04-30 17:54:09', '1'),
(71, 1, 2, '2013-04-30 19:28:00', '1'),
(72, 1, 2, '2013-04-30 19:29:24', '1'),
(73, 1, 2, '2013-04-30 19:32:06', '1'),
(74, 1, 5, '2013-04-30 19:32:15', '1'),
(75, 1, 5, '2013-04-30 19:33:58', '1'),
(76, 1, 5, '2013-04-30 19:38:10', '1'),
(77, 1, 2, '2013-05-01 12:06:23', '1'),
(78, 1, 2, '2013-05-01 12:26:24', '1'),
(79, 1, 2, '2013-05-01 12:27:28', '1'),
(80, 1, 2, '2013-05-01 12:33:12', '1'),
(81, 1, 2, '2013-05-01 12:33:53', '1'),
(82, 1, 2, '2013-05-07 09:43:43', '1'),
(83, 1, 2, '2013-05-07 09:48:37', '1'),
(84, 1, 2, '2013-05-08 21:43:59', '1'),
(85, 1, 2, '2013-05-13 18:44:33', '1'),
(86, 1, 2, '2013-05-13 18:45:01', '1'),
(87, 1, 2, '2013-05-13 18:51:20', '1'),
(88, 1, 2, '2013-05-13 18:53:47', '1'),
(89, 1, 2, '2013-05-13 19:08:33', '1'),
(90, 1, 2, '2013-05-13 19:12:48', '1'),
(91, 1, 6, '2013-05-13 19:23:26', '1'),
(92, 1, 5, '2013-05-13 19:24:10', '1'),
(93, 1, 2, '2013-05-13 19:24:15', '1'),
(94, 1, 2, '2013-05-13 19:30:49', '1'),
(95, 1, 2, '2013-05-13 19:31:25', '1'),
(96, 1, 2, '2013-05-13 19:32:18', '1'),
(97, 1, 2, '2013-05-13 19:33:17', '1'),
(98, 1, 2, '2013-05-13 19:37:21', '1'),
(99, 1, 2, '2013-05-13 20:22:16', '1'),
(100, 1, 2, '2013-05-13 20:22:41', '1'),
(101, 1, 2, '2013-05-13 20:23:48', '1'),
(102, 1, 2, '2013-05-13 20:24:30', '1'),
(103, 1, 2, '2013-05-13 20:24:44', '1'),
(104, 1, 2, '2013-05-13 20:24:52', '1'),
(105, 1, 2, '2013-05-14 19:39:38', '1'),
(106, 1, 2, '2013-05-28 18:05:17', '1'),
(107, 1, 2, '2013-05-29 16:52:47', '1'),
(108, 1, 5, '2013-05-29 16:52:51', '1'),
(109, 1, 2, '2013-05-29 16:55:24', '1'),
(110, 1, 2, '2013-05-29 17:02:32', '1'),
(111, 1, 2, '2013-05-29 17:09:44', '1'),
(112, 1, 2, '2013-06-03 15:23:40', '1'),
(113, 1, 3, '2013-06-03 15:24:10', '1'),
(114, 1, 2, '2013-06-03 16:05:19', '1'),
(115, 1, 2, '2013-06-03 17:01:35', '1'),
(116, 1, 2, '2013-06-03 17:08:31', '1'),
(117, 1, 2, '2013-06-03 17:08:51', '1'),
(118, 1, 2, '2013-06-03 17:10:09', '1'),
(119, 1, 6, '2013-06-03 17:10:23', '1'),
(120, 1, 2, '2013-06-03 17:10:33', '1'),
(121, 1, 2, '2013-06-03 17:12:50', '1'),
(122, 1, 5, '2013-06-03 17:14:44', '1'),
(123, 1, 2, '2013-06-03 17:21:23', '1'),
(124, 1, 2, '2013-06-03 17:21:50', '1'),
(125, 1, 2, '2013-06-03 17:21:54', '1'),
(126, 1, 2, '2013-06-03 17:25:31', '1'),
(127, 1, 2, '2013-06-03 17:46:15', '1'),
(128, 1, 2, '2013-06-03 17:47:14', '1'),
(129, 1, 2, '2013-06-03 18:53:20', '1'),
(130, 1, 2, '2013-06-03 19:29:13', '1'),
(131, 1, 2, '2013-06-18 16:34:28', '1'),
(132, 1, 2, '2013-06-18 17:38:06', '1'),
(133, 1, 2, '2013-06-18 18:22:08', '1'),
(134, 1, 2, '2013-06-18 18:44:17', '1'),
(135, 1, 2, '2013-06-18 18:44:21', '1'),
(136, 1, 2, '2013-09-30 20:10:09', '1'),
(137, 1, 2, '2013-10-02 10:23:40', '1'),
(138, 1, 2, '2013-10-24 17:32:26', '1'),
(139, 1, 2, '2013-10-24 17:33:51', '1'),
(140, 1, 4, '2013-10-24 17:36:24', '1'),
(141, 1, 2, '2013-10-24 17:44:37', '1'),
(142, 1, 2, '2013-10-24 17:44:43', '1'),
(143, 1, 2, '2013-10-24 17:44:52', '1'),
(144, 1, 2, '2013-10-24 17:44:56', '1'),
(145, 1, 5, '2013-10-24 17:45:03', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_sender` int(10) unsigned NOT NULL,
  `id_recive` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id_photo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_photo` varchar(32) NOT NULL,
  `size_photo` int(10) unsigned NOT NULL,
  `type_photo` int(10) unsigned NOT NULL,
  `date_photo` date NOT NULL,
  `status_photo` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_photo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `photos`
--

INSERT INTO `photos` (`id_photo`, `name_photo`, `size_photo`, `type_photo`, `date_photo`, `status_photo`) VALUES
(1, 'poker.jpg', 0, 0, '2013-01-28', '1'),
(2, 'cars.png', 0, 0, '2013-01-28', '1'),
(3, 'deportes.jpg', 0, 0, '2013-01-28', '1'),
(4, 'colores.jpg', 0, 0, '2013-01-28', '1'),
(5, 'puzzle.jpg', 0, 0, '2013-01-28', '1'),
(6, 'batleship.png', 0, 0, '2013-01-28', '1'),
(7, 'ajedrez.jpg', 0, 0, '2013-01-29', '1'),
(8, 'aventuras.jpg', 0, 0, '2013-01-29', '1'),
(9, 'damas.jpg', 0, 0, '2013-01-29', '1'),
(10, 'tictactoe.png', 0, 0, '2013-01-29', '1'),
(11, 'ahorcado.jpg', 0, 0, '2013-01-29', '1'),
(12, 'buscaminas.png', 0, 0, '2013-02-24', '1'),
(13, 'memory.jpg', 0, 0, '2013-02-24', '1'),
(16, 'Seleccion_001.png', 280668, 0, '2013-06-03', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publishers`
--

CREATE TABLE IF NOT EXISTS `publishers` (
  `id_publisher` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_publisher` varchar(64) NOT NULL,
  `mail_publisher` varchar(64) NOT NULL,
  `password_publisher` varchar(64) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_publisher`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `publishers`
--

INSERT INTO `publishers` (`id_publisher`, `name_publisher`, `mail_publisher`, `password_publisher`, `status`) VALUES
(1, 'Shaepot Project Consulting', 'info@shaepot.com', '0c74ac34d6652b2da30488d4f38496d8', '1'),
(2, 'Alunisono', 'info@alunisono.com', '0c74ac34d6652b2da30488d4f38496d8', '1'),
(3, 'Pseudopixel', 'info@pseudopixel.com', '0c74ac34d6652b2da30488d4f38496d8', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publishers_games`
--

CREATE TABLE IF NOT EXISTS `publishers_games` (
  `id_publisher_game` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_publisher` int(10) unsigned NOT NULL,
  `id_game` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_publisher_game`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `publishers_games`
--

INSERT INTO `publishers_games` (`id_publisher_game`, `id_publisher`, `id_game`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 12),
(9, 1, 13),
(10, 2, 0),
(11, 2, 0),
(12, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id_score` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_score`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `scores`
--

INSERT INTO `scores` (`id_score`, `id_user`, `id_game`, `score`, `date`) VALUES
(1, 1, 1, 25, '2013-02-25 19:47:53'),
(2, 1, 2, 55, '2013-02-25 19:55:38'),
(3, 1, 3, 55, '2013-02-25 19:55:42'),
(4, 1, 1, 189, '2013-02-25 21:23:46'),
(5, 1, 1, 543, '2013-02-25 21:24:15'),
(6, 3, 2, 4513, '2013-06-18 18:41:33'),
(7, 5, 2, 963, '2013-06-18 06:24:45'),
(8, 10, 2, 6321, '2013-06-18 19:41:28'),
(9, 6, 2, 7412, '2013-06-18 05:21:34'),
(10, 5, 2, 8645, '2013-06-13 08:39:17'),
(11, 1, 2, 8997, '2013-06-17 07:38:43'),
(12, 1, 2, 8998, '2013-06-18 07:26:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_user` varchar(32) NOT NULL,
  `last_name_user` varchar(32) NOT NULL,
  `mail_user` varchar(32) NOT NULL,
  `password_user` varchar(32) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `mail_user` (`mail_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `last_name_user`, `mail_user`, `password_user`, `status`) VALUES
(1, 'Cristina', 'Salv&agrave;', 'cristina@salva.com', '0c74ac34d6652b2da30488d4f38496d8', '1'),
(3, 'Alex', 'Cerezo', 'alex@cerezo.com', '534b44a19bf18d20b71ecc4eb77c572f', '1'),
(4, 'Julia', 'Codina', 'julia@codina.com', 'c2e285cb33cecdbeb83d2189e983a8c0', '1'),
(5, 'Ricard', 'Roig MartÃ­', 'ricard@roig.com', '0233f3d1ee8507eff6ede7409ad09644', '1'),
(6, 'Chin', 'Ho Ju', 'pc_rey_master@msn.com', 'e6187a84ff60790f627b029f5a64c877', '1'),
(7, 'albert', 'cuesta mayordomo', 'acm2291@gmail.com', '1d41c853af58d3a7ae54990ce29417d8', '1'),
(8, 'Marta', 'Gonzalez Bellver', 'martabellver91@gmail.com', '1d41c853af58d3a7ae54990ce29417d8', '1'),
(9, 'Marc', 'Vidal', 'marc@vidal.com', '97e1e59c0375e0f55c10d4314db20466', '1'),
(10, 'Rafa', 'Laguna', 'rafa@laguna.com', '35cd2d0d62d9bc5e60a3ca9f7593b05b', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
