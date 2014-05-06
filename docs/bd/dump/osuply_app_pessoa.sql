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
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `emailContato` varchar(45) NOT NULL,
  `telefonePrincipal` varchar(14) NOT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `grupo` int(11) DEFAULT NULL,
  `tipoPessoa` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `dtAlteracao` date DEFAULT NULL,
  `dtCriacao` date DEFAULT NULL,
  `usrCriou` int(11) DEFAULT NULL,
  `usrAlterou` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`nome`,`emailContato`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_pessoa_grupo_idx` (`grupo`),
  KEY `fk_pessoa_tipoPessoa_idx` (`tipoPessoa`),
  KEY `fk_pessoa_status_idx` (`status`),
  CONSTRAINT `fk_pessoa_grupo` FOREIGN KEY (`grupo`) REFERENCES `grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoa_tipoPessoa` FOREIGN KEY (`tipoPessoa`) REFERENCES `tipoPessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoa_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (1,'Gustavo','gustavo@gustavo.com.br','(11)98286-3430','4c96f8324e3ba54a99e78249b95daa30',1,1,NULL,NULL,NULL,NULL,NULL),(2,'Teste','teste@teste.com.br','(11)98286-3430','698dc19d489c4e4db73e28a713eab07b',2,1,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-06 17:30:22
