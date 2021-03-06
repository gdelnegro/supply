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
-- Table structure for table `subCategoria`
--

DROP TABLE IF EXISTS `subCategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subCategoria` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `categoria` int(12) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `dtAlteracao` date DEFAULT NULL,
  `dtCriacao` date DEFAULT NULL,
  `usrCriou` int(11) DEFAULT NULL,
  `usrAlterou` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`descricao`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `unico` (`id`,`categoria`),
  KEY `pesquisa` (`descricao`,`categoria`,`usrCriou`,`usrAlterou`),
  KEY `auditoria` (`dtAlteracao`,`dtCriacao`,`usrCriou`,`usrAlterou`),
  KEY `usuario` (`usrCriou`,`usrAlterou`) USING BTREE,
  KEY `data` (`dtAlteracao`,`dtCriacao`) USING BTREE,
  KEY `fk_subCategoria_categoria_idx` (`categoria`),
  CONSTRAINT `fk_subCategoria_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subCategoria`
--

LOCK TABLES `subCategoria` WRITE;
/*!40000 ALTER TABLE `subCategoria` DISABLE KEYS */;
INSERT INTO `subCategoria` VALUES (1,'Ferramentas',3,'1',NULL,'2014-05-06',1,NULL),(2,'Ferramentas',7,'1',NULL,'2014-05-06',1,NULL),(3,'Ferramentas',10,'1',NULL,'2014-05-06',1,NULL),(4,'Ferramentas',14,'1',NULL,'2014-05-06',1,NULL);
/*!40000 ALTER TABLE `subCategoria` ENABLE KEYS */;
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
