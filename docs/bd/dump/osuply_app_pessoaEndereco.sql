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
-- Table structure for table `pessoaEndereco`
--

DROP TABLE IF EXISTS `pessoaEndereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoaEndereco` (
  `pessoa` int(12) NOT NULL,
  `endereco` int(12) NOT NULL,
  `tipoEndereco` int(11) NOT NULL COMMENT 'Se endereço �',
  `apelido` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`pessoa`,`endereco`),
  KEY `fk_pessoaEndereço_Endereco_idx` (`endereco`),
  KEY `fk_pessoaEndereco_tipoEndereço_idx` (`tipoEndereco`),
  CONSTRAINT `fk_pessoaEndereço_Pessoa` FOREIGN KEY (`pessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoaEndereço_Endereco` FOREIGN KEY (`endereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pessoaEndereco_tipoEndereço` FOREIGN KEY (`tipoEndereco`) REFERENCES `tipoEndereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoaEndereco`
--

LOCK TABLES `pessoaEndereco` WRITE;
/*!40000 ALTER TABLE `pessoaEndereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoaEndereco` ENABLE KEYS */;
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
