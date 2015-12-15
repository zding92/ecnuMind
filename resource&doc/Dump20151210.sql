-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ecnu_mind
-- ------------------------------------------------------
-- Server version	5.6.26-log

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
-- Table structure for table `competition_info`
--

DROP TABLE IF EXISTS `competition_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competition_info` (
  `comp_id` int(5) NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(45) DEFAULT NULL,
  `comp_apply_start_date` date DEFAULT NULL,
  `comp_apply_end_date` date DEFAULT NULL,
  `comp_start_date` date DEFAULT NULL,
  `comp_end_date` date DEFAULT NULL,
  `comp_sponsor` varchar(45) DEFAULT NULL,
  `comp_importance` varchar(5) DEFAULT NULL,
  `comp_field` varchar(45) DEFAULT NULL,
  `comp_brief` mediumtext,
  `comp_official_website` varchar(100) DEFAULT NULL,
  `comp_max_people` int(5) DEFAULT NULL,
  `comp_owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`comp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competition_info`
--

LOCK TABLES `competition_info` WRITE;
/*!40000 ALTER TABLE `competition_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `competition_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competition_main`
--

DROP TABLE IF EXISTS `competition_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competition_main` (
  `comp_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_participant_id` varchar(200) NOT NULL,
  `comp_type_id` int(5) NOT NULL,
  `comp_state` enum('待审批','审批通过','审批未通过','正在进行','已结束') NOT NULL DEFAULT '待审批',
  `comp_prize` varchar(20) NOT NULL DEFAULT '无相关奖项',
  `apply_date` date DEFAULT NULL,
  `author1_name` varchar(20) DEFAULT NULL,
  `comp_item_name` varchar(45) DEFAULT NULL,
  `apply_academy` varchar(60) NOT NULL,
  `comp_item_brief` mediumtext,
  `comp_owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`comp_item_id`),
  KEY `FK_competition_prj_idx1` (`comp_type_id`),
  CONSTRAINT `FK_competition_info` FOREIGN KEY (`comp_type_id`) REFERENCES `competition_info` (`comp_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competition_main`
--

LOCK TABLES `competition_main` WRITE;
/*!40000 ALTER TABLE `competition_main` DISABLE KEYS */;
/*!40000 ALTER TABLE `competition_main` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-10 22:14:19
