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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `tipo` int(12) DEFAULT NULL,
  `dtAlteracao` date DEFAULT NULL,
  `dtCriacao` date DEFAULT NULL,
  `usrCriou` int(11) DEFAULT NULL,
  `usrAlterou` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_categoria_tipo_idx` (`tipo`),
  CONSTRAINT `fk_categoria_tipo` FOREIGN KEY (`tipo`) REFERENCES `tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,1,'Mecânico',1,NULL,'2014-05-06',1,NULL),(2,1,'Mecânico',2,NULL,'2014-05-06',1,NULL),(3,1,'Mecânico',3,NULL,'2014-05-06',1,NULL),(4,1,'Mecânico',4,NULL,'2014-05-06',1,NULL),(5,1,'Elétrico',1,NULL,'2014-05-06',1,NULL),(6,1,'Elétrico',2,NULL,'2014-05-06',1,NULL),(7,1,'Elétrico',3,NULL,'2014-05-06',1,NULL),(8,1,'Elétrico',4,NULL,'2014-05-06',1,NULL),(9,1,'Eletrônico',1,NULL,'2014-05-06',1,NULL),(10,1,'Eletrônico',3,NULL,'2014-05-06',1,NULL),(11,1,'Eletrônico',4,NULL,'2014-05-06',1,NULL),(12,1,'Hidráulico',1,NULL,'2014-05-06',1,NULL),(13,1,'Hidráulico',2,NULL,'2014-05-06',1,NULL),(14,1,'Hidráulico',3,NULL,'2014-05-06',1,NULL),(15,1,'Hidráulico',4,NULL,'2014-05-06',1,NULL);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
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
