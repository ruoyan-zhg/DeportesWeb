-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.25-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para web_deporte
CREATE DATABASE IF NOT EXISTS `web_deporte` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `web_deporte`;

-- Volcando estructura para tabla web_deporte.evento
CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `deporte` enum('voleibol','futbol','tenis','natacion','baloncesto') NOT NULL, --atletismo?
  `localizacion` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `numero_de_participantes` int(3) NOT NULL,
  `Imagen` longblob NOT NULL,
  `creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_evento`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla web_deporte.evento: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` (`id_evento`, `titulo`, `descripcion`, `deporte`, `localizacion`, `fecha`, `numero_de_participantes`, `Imagen`, `creacion`) VALUES
	(1, 'Torneo Tenis', 'Se celebrara un torneo de tenis de 8 participantes', 'tenis', 'Canchas tenis UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-12 15:30:00', 8, _binary '', '2023-01-11 00:10:16');
  (2, 'Competicion Mejor Saque', 'Competifion de quien tiene el mejor saque entre los participantes', 'tenis', 'Canchas tenis UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-18 12:30:00', 16, _binary '', '2023-01-15 16:50:00');
	(3, 'Juego Amistoso Tenis', 'Evento para que jueguen los que quieran jugar al tenis con alguien', 'tenis', 'Canchas tenis UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-12 15:30:00', 8, _binary '', '2023-01-12 12:00:25');
	(4, 'Torneo Futbol', 'Torneo de Futbol para jugadores universitarios se jugaran 8 equipos, equipos de 4', 'futbol', 'Estadio futbol UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-25 15:30:00', 32, _binary '', '2023-01-11 00:10:16');
	(5, 'Competicion mejor Portero', 'Entre los participantes se compite por quien para mas goles', 'futbol', 'Estadio futbol UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-19 16:30:00', 20, _binary '', '2023-01-15 13:10:36');
	(6, 'Competicion mejor Goleador', 'Entre los participantes se mirarra quien mete mas goles a la porteria', 'futbol', 'Estadio futbol UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-11 18:30:00', 20, _binary '', '2023-01-16 10:12:14');
	(7, 'Evento Mejor saque', 'Evento de Voleibol que consiste en saber quien es el mejor sacando la pelota', 'voleibol', 'Canchas voleibol UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-20 16:40:00', 10, _binary '', '2023-01-12 00:12:01');
	(8, 'Entrenamiento en Equipo', 'Evento deportimo para formar los equipos para el dia del torneo', 'voleibol', 'Canchas voleibol UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-21 11:30:00', 20, _binary '', '2023-01-10 00:08:20');
	(9, 'Torneo Voleibol', 'Mini Torneo de Voleibol 4 equipos de 5 ', 'voleibol', 'Canchas voleibol UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-30 12:20:00', 20, _binary '', '2023-01-14 00:09:40');
	(10, 'Estilo Mariposa 100m', 'Competicion de quien es el mas rapido nadando mariposa en 100m', 'natacion', 'Piscina Edificio D UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-12 10:30:00', 12, _binary '', '2023-01-12 00:11:10');
	(11, 'Tornemo Velocidad 50m', 'Evento para encontrar quien es el mas rapido de la universidad nadando 50m', 'natacion', 'Piscina Edificio D UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-13 10:30:00', 12, _binary '', '2023-01-11 00:11:15');
	(12, 'Torneo Brazas 100m', 'Evento deportivo de natacion, natacion brazas en 100m quien sera el mas rapido?', 'natacion', 'Piscina Edificio D UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-14 10:30:00', 12, _binary '', '2023-01-11 00:11:20');
	(13, 'MiniTorneo Baloncesto', 'Evento deportivo de baloncesto 6 equipos de 3', 'baloncesto', 'Canchas baloncesto UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-30 10:30:00', 18, _binary '', '2023-01-14 00:09:01');
	(14, 'Competicion de tiros', 'Quien marcara el que mas tirando a la canasta, apuntate y muestranos tu potencial', 'baloncesto', 'Canchas baloncesto UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-25 16:30:00', 20, _binary '', '2023-01-14 00:12:05');
	(15, 'Torneo 1 vs 1', 'Torneo individual de 1 contra 1, ayuda a mejorar como un jugador individual y enseñanos lo que eres capaz', 'baloncesto', 'Canchas baloncesto UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-12 09:30:00', 8, _binary '', '2023-01-13 00:01:10');
	(16, 'Salto de altura', 'Evento deportivo quien salta, el que mas y se llevara el titulo de el que salta mas lejos', 'atletismo', 'Campo de atletismo UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-28 12:30:00', 15, _binary '', '2023-01-15 00:11:11');
	(17, 'Velocidad', 'Competicion de velocidad, quien correra el mas rapido de todos', 'atletismo', 'Campo de atletismo UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-27 12:30:00', 20, _binary '', '2023-01-11 00:12:12');
	(18, 'Salto de vallas', 'Quien llevara a la meta mas rapido saltando las vallas, ven, participa y lo descubriras ', 'atletismo', 'Campo de atletismo UEM,	C/ Tajo s/n, Villaviciosa de Od', '2023-02-23 12:45:00', 10, _binary '', '2023-01-11 00:01:01');

/*!40000 ALTER TABLE `evento` ENABLE KEYS */;


-- Volcando estructura para tabla web_deporte.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `contasenia` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `administrador` binary(1) NOT NULL,
  `creacion` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_usuario`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla web_deporte.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `contasenia`, `email`, `administrador`, `creacion`) VALUES
	(22081665, 'Oscar', 'Gonzalez', 'asas', 'oscarsin2301@gmail.com', _binary 0x30, '2023-01-11 09:23:50'),
	(22083030, 'Ramon', 'Guerra', 'provisional', '22083030@live.uem.es', _binary 0x30, '2023-01-11 00:17:20');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


-- Volcando estructura para tabla web_deporte.participante
CREATE TABLE IF NOT EXISTS `participante` (
  `id_particidante` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_particidante`),
  KEY `FK_participante_evento` (`id_evento`),
  KEY `FK_participante_usuario` (`id_usuario`),
  CONSTRAINT `FK_participante_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_participante_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla web_deporte.participante: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `participante` DISABLE KEYS */;
INSERT INTO `participante` (`id_particidante`, `id_evento`, `id_usuario`) VALUES
	(1, 1, 22083030);
/*!40000 ALTER TABLE `participante` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
