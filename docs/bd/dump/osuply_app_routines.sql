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
-- Temporary table structure for view `preferenciasDeVenda`
--

DROP TABLE IF EXISTS `preferenciasDeVenda`;
/*!50001 DROP VIEW IF EXISTS `preferenciasDeVenda`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `preferenciasDeVenda` (
  `pessoa` tinyint NOT NULL,
  `Categoria` tinyint NOT NULL,
  `Tipo` tinyint NOT NULL,
  `SubCategoria` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `preferenciasDeCompra`
--

DROP TABLE IF EXISTS `preferenciasDeCompra`;
/*!50001 DROP VIEW IF EXISTS `preferenciasDeCompra`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `preferenciasDeCompra` (
  `pessoa` tinyint NOT NULL,
  `Categoria` tinyint NOT NULL,
  `Tipo` tinyint NOT NULL,
  `SubCategoria` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `preferenciasDeVenda`
--

/*!50001 DROP TABLE IF EXISTS `preferenciasDeVenda`*/;
/*!50001 DROP VIEW IF EXISTS `preferenciasDeVenda`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `preferenciasDeVenda` AS select `preferenciasVenda`.`pessoa` AS `pessoa`,`categoria`.`descricao` AS `Categoria`,`tipos`.`descricao` AS `Tipo`,`subCategoria`.`descricao` AS `SubCategoria` from (((`preferenciasVenda` join `categoria` on((`categoria`.`id` = `preferenciasVenda`.`categoria`))) join `tipos` on((`tipos`.`id` = `preferenciasVenda`.`tipo`))) join `subCategoria` on((`subCategoria`.`id` = `preferenciasVenda`.`subcategoria`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `preferenciasDeCompra`
--

/*!50001 DROP TABLE IF EXISTS `preferenciasDeCompra`*/;
/*!50001 DROP VIEW IF EXISTS `preferenciasDeCompra`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `preferenciasDeCompra` AS select `preferenciasCompra`.`pessoa` AS `pessoa`,`categoria`.`descricao` AS `Categoria`,`tipos`.`descricao` AS `Tipo`,`subCategoria`.`descricao` AS `SubCategoria` from (((`preferenciasCompra` join `categoria` on((`categoria`.`id` = `preferenciasCompra`.`categoria`))) join `tipos` on((`tipos`.`id` = `preferenciasCompra`.`tipo`))) join `subCategoria` on((`subCategoria`.`id` = `preferenciasCompra`.`subcategoria`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-06 17:30:22
