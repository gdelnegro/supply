CREATE DATABASE  IF NOT EXISTS `osuply_app` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `osuply_app`;
-- MySQL dump 10.13  Distrib 5.6.13, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: osuply_app
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `preferenciasVenda`
--

DROP TABLE IF EXISTS `preferenciasVenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preferenciasVenda` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `pessoa` int(12) NOT NULL,
  `categoria` int(12) DEFAULT NULL,
  `tipo` int(12) DEFAULT NULL,
  `subcategoria` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`,`pessoa`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `unico` (`pessoa`,`categoria`,`tipo`,`subcategoria`),
  KEY `fk_preferencias_pessoa_idx` (`pessoa`),
  KEY `fk_preferencias_categoria_idx` (`categoria`),
  KEY `fk_preferencias_tipo_idx` (`tipo`),
  KEY `fk_preferencias_subcategoria_idx` (`subcategoria`),
  CONSTRAINT `fk_preferencias_pessoa0` FOREIGN KEY (`pessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_preferencias_categoria0` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_preferencias_tipo0` FOREIGN KEY (`tipo`) REFERENCES `tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_preferencias_subcategoria0` FOREIGN KEY (`subcategoria`) REFERENCES `subCategoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preferenciasVenda`
--

LOCK TABLES `preferenciasVenda` WRITE;
/*!40000 ALTER TABLE `preferenciasVenda` DISABLE KEYS */;
INSERT INTO `preferenciasVenda` VALUES (1,1,3,3,1),(2,1,7,3,2),(3,1,10,3,3),(5,2,3,3,1),(4,2,7,3,2);
/*!40000 ALTER TABLE `preferenciasVenda` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-06 17:30:21
