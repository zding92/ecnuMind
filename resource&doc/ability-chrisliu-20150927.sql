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
-- Table structure for table `ability`
--

DROP TABLE IF EXISTS `ability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `Direction_id` int(11) NOT NULL,
  `tags` varchar(200) DEFAULT NULL,
  `people_count` int(11) DEFAULT '0',
  `state` enum('y','n','u') NOT NULL,
  PRIMARY KEY (`id`,`name`),
  KEY `fk_Ability_Direction_idx` (`Direction_id`),
  CONSTRAINT `fk_Ability_Direction` FOREIGN KEY (`Direction_id`) REFERENCES `direction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ability`
--

LOCK TABLES `ability` WRITE;
/*!40000 ALTER TABLE `ability` DISABLE KEYS */;
INSERT INTO `ability` VALUES (1,'javascript',1,'js',1,'y'),(2,'css',1,'css',2,'y'),(3,'UI设计',2,'UI',0,'y'),(4,'php',2,'php',2,'y'),(5,'网站维护',3,'web',1,'y'),(6,'MySQL',3,'mysql',1,'y'),(7,'Oracle',4,'oracle',0,'y'),(8,'Delphi',4,'delphi',0,'y'),(9,'VisualStudio',4,'vs',0,'y'),(10,'QtCreator',4,'qt',0,'y'),(11,'iOS开发',5,'ios',0,'y'),(12,'Android开发',5,'android',0,'y'),(13,'WindowsPhone开发',5,'winphone',0,'y'),(14,'语音处理算法',6,'voice',0,'y'),(15,'图像处理算法',6,'image',0,'y'),(16,'视频处理算法',6,'vedio',0,'y'),(17,'DSP基础算法',6,'dsp',0,'y'),(18,'ARM嵌入式系统设计',7,'arm',0,'y'),(19,'51单片机',7,'51',0,'y'),(20,'STM32单片机',7,'stm32',0,'y'),(21,'MSP430',7,'msp430',0,'y'),(22,'高速PCB设计',8,'pcb',0,'y'),(23,'PSB设计基础',8,'psb',0,'y'),(24,'模拟电路设计',9,'analog',0,'y'),(25,'数字逻辑电路设计',9,'digital',0,'y'),(26,'生态系统',10,'eco',0,'y'),(27,'人类DNA',11,'dna',0,'y'),(28,'动植物DNA',11,'dna',0,'y'),(29,'生物习性',12,'lifestyle',0,'y'),(30,'细胞学',13,'cell',0,'y'),(31,'饮食健康',14,'diet',0,'y'),(32,'营养学',14,'diet',0,'y'),(33,'Photoshop',15,'ps',0,'y'),(34,'3D建模',17,'3d',0,'y'),(35,'AE',16,'ae',0,'y'),(36,'Flash',16,'flash',0,'y'),(37,'3D-Max',17,'3d',0,'y'),(38,'时装设计',18,'design',0,'y'),(39,'拉丁舞',22,'dance',0,'y'),(40,'机械舞',22,'dance',0,'y'),(41,'美声',21,'voice,music',0,'y'),(42,'合唱',21,'voice,music',0,'y'),(43,'大提琴',20,'music',0,'y'),(44,'小提琴',20,'music',0,'y'),(45,'小品',19,'fun',0,'y'),(46,'现场主持',19,'fun',0,'y'),(47,'书法',24,'art',0,'y'),(48,'素描',23,'art',0,'y'),(49,'油彩',23,'art',0,'y'),(50,'水墨',23,'art',0,'y'),(62,'发发顺丰',1,'发发顺丰',1,'u');
/*!40000 ALTER TABLE `ability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'ecnu_mind'
--

--
-- Dumping routines for database 'ecnu_mind'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-27 23:55:49
