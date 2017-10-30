# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.28-MariaDB)
# Database: Dice
# Generation Time: 2017-10-30 12:25:02 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table stats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stats`;

CREATE TABLE `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `game` int(12) NOT NULL,
  `total` decimal(12,2) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `stats` WRITE;
/*!40000 ALTER TABLE `stats` DISABLE KEYS */;

INSERT INTO `stats` (`id`, `username`, `game`, `total`)
VALUES
	(56,'Rima',1,1.10),
	(57,'Rima',2,0.30),
	(58,'Rima',3,0.50),
	(59,'Rima',4,0.50),
	(60,'Rima',5,0.00),
	(61,'Rima',6,0.10),
	(62,'Rima',7,0.00),
	(63,'Rima',8,0.40),
	(64,'Rima',9,0.40),
	(65,'Rima',10,0.90),
	(66,'Rima',11,1.30),
	(67,'Rima',12,0.60),
	(68,'Paulius',1,0.00),
	(69,'Paulius',2,0.40),
	(70,'Paulius',3,0.80),
	(71,'Paulius',4,0.60),
	(72,'Paulius',5,0.00),
	(73,'Paulius',6,0.60),
	(74,'Paulius',1,0.10),
	(75,'Paulius',2,0.80),
	(76,'Paulius',3,0.50),
	(77,'Paulius',4,0.00),
	(78,'Paulius',1,0.90),
	(79,'Grazina',1,0.20),
	(80,'Grazina',2,1.70),
	(81,'Grazina',3,0.00),
	(82,'Grazina',4,0.10),
	(83,'Grazina',5,0.30),
	(84,'Hello',1,0.90),
	(85,'Hello',1,0.40),
	(86,'Hello',2,0.00),
	(87,'Paulius',1,0.10),
	(88,'Paulius',2,0.40),
	(89,'Paulius',1,0.90);

/*!40000 ALTER TABLE `stats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `total`)
VALUES
	(1,'Paulius','$2y$10$oHML5o/ib2D3kY/lU.VVFeZ9K7UxdzRoknF6XFMPLoa4Nb62x.sy2',11),
	(2,'Rima','$2y$10$cRrVXaGs3QXAt4ofV92gcOk3LfxbyzRaMWzemxSpsKNrsPXY4TTK.',0),
	(3,'Fausta','$2y$10$DfMSSafDQUelCiT2vxrgm.Sw.dKaoTUZMk48TYydJJD7GSOC.F3IW',1),
	(4,'Jonas','$2y$10$tgpiXTPkkwN6W33rAY.kBOp5JjkqNtJ1OC9BW8r8tzfNsGN.ITpMS',0),
	(5,'Olegas','$2y$10$CVNbwgPNtj9bgTeXtRRbs.3wK.MWyrfhw77sH8oVTDI4xAy51l69u',0),
	(7,'Mersas','$2y$10$GavnfMxTVKpIT5Bc5f0jE.qacHAIXQEehNdlpfHBnlxgkokz4VUBm',0),
	(11,'Grazina','$2y$10$1dE.7uNC.vCWI2x0X0UrquDdw506NiVb3JUhZ6UoZYBZhgL2//X1u',0),
	(12,'Hello','$2y$10$6pIskfQ.7BireSMWi7ywl.qT047lCwJ7ORe7Wh1m4F5bCPDK82KL.',0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
