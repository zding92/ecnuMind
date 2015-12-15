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
  `people_no` int(11) DEFAULT '0',
  PRIMARY KEY (`id`,`name`),
  KEY `fk_Ability_Direction_idx` (`Direction_id`),
  CONSTRAINT `fk_Ability_Direction` FOREIGN KEY (`Direction_id`) REFERENCES `direction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ability`
--

LOCK TABLES `ability` WRITE;
/*!40000 ALTER TABLE `ability` DISABLE KEYS */;
INSERT INTO `ability` VALUES (1,'javascript',1,1),(2,'css',1,2),(3,'UI设计',2,0),(4,'php',2,2),(5,'网站维护',3,1),(6,'MySQL',3,1),(7,'Oracle',4,0),(8,'Delphi',4,0),(9,'VisualStudio',4,0),(10,'QtCreator',4,0),(11,'iOS开发',5,0),(12,'Android开发',5,0),(13,'WindowsPhone开发',5,0),(14,'语音处理算法',6,0),(15,'图像处理算法',6,0),(16,'视频处理算法',6,0),(17,'DSP基础算法',6,0),(18,'ARM嵌入式系统设计',7,0),(19,'51单片机',7,0),(20,'STM32单片机',7,0),(21,'MSP430',7,0),(22,'高速PCB设计',8,0),(23,'PSB设计基础',8,0),(24,'模拟电路设计',9,0),(25,'数字逻辑电路设计',9,0),(26,'生态系统',10,0),(27,'人类DNA',11,0),(28,'动植物DNA',11,0),(29,'生物习性',12,0),(30,'细胞学',13,0),(31,'饮食健康',14,0),(32,'营养学',14,0),(33,'Photoshop',15,0),(34,'3D建模',17,0),(35,'AE',16,0),(36,'Flash',16,0),(37,'3D-Max',17,0),(38,'时装设计',18,0),(39,'拉丁舞',22,0),(40,'机械舞',22,0),(41,'美声',21,0),(42,'合唱',21,0),(43,'大提琴',20,0),(44,'小提琴',20,0),(45,'小品',19,0),(46,'现场主持',19,0),(47,'书法',24,0),(48,'素描',23,0),(49,'油彩',23,0);
/*!40000 ALTER TABLE `ability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` decimal(10,0) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `User_has_Ability_id` int(11) NOT NULL,
  `Commentator_id` int(11) NOT NULL,
  `Commentator_username` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Comment_User_has_Ability1_idx` (`User_has_Ability_id`),
  KEY `fk_Comment_User1_idx` (`Commentator_id`,`Commentator_username`),
  CONSTRAINT `fk_Comment_User1` FOREIGN KEY (`Commentator_id`, `Commentator_username`) REFERENCES `user` (`id`, `username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comment_User_has_Ability1` FOREIGN KEY (`User_has_Ability_id`) REFERENCES `user_has_ability` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,10,'好好好',3,3,'cindy'),(2,8,'略叼',1,4,'dennis'),(3,9,'屌的啊',3,2,'bob'),(4,9,'厉害',1,1,'alice'),(5,7,'不错哦',1,5,'ellen');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direction`
--

DROP TABLE IF EXISTS `direction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `Field_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Direction_Field1_idx` (`Field_id`),
  CONSTRAINT `fk_Direction_Field1` FOREIGN KEY (`Field_id`) REFERENCES `field` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direction`
--

LOCK TABLES `direction` WRITE;
/*!40000 ALTER TABLE `direction` DISABLE KEYS */;
INSERT INTO `direction` VALUES (1,'Web前台',1),(2,'Web后台',1),(3,'数据库',1),(4,'桌面平台',1),(5,'移动平台',1),(6,'DSP技术',1),(7,'嵌入式',1),(8,'PCB设计',1),(9,'电路设计',1),(10,'生态系统',2),(11,'DNA研究',2),(12,'生物习性',2),(13,'细胞学',2),(14,'人类健康',2),(15,'平面设计',3),(16,'动画设计',3),(17,'立体设计',3),(18,'服装设计',3),(19,'表演',4),(20,'演奏',4),(21,'演唱',4),(22,'舞蹈',4),(23,'绘画',4),(24,'书法',4);
/*!40000 ALTER TABLE `direction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field`
--

DROP TABLE IF EXISTS `field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field`
--

LOCK TABLES `field` WRITE;
/*!40000 ALTER TABLE `field` DISABLE KEYS */;
INSERT INTO `field` VALUES (1,'信息技术'),(2,'生物医药'),(3,'设计'),(4,'艺术');
/*!40000 ALTER TABLE `field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(45) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `academy` varchar(45) DEFAULT NULL,
  `major` varchar(45) DEFAULT NULL,
  `grade` varchar(45) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `brief` varchar(200) DEFAULT NULL,
  `hidden_name` varchar(5) DEFAULT NULL,
  `message` varchar(400) DEFAULT NULL,
  `studentid` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`username`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'123','alice','alice','',NULL,NULL,'alice',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'123','bob','bob',NULL,NULL,NULL,'bob',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'123','cindy','cindy',NULL,NULL,NULL,'cindy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'123','dennis','dennis',NULL,NULL,NULL,'dennis',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'123','ellen','ellen',NULL,NULL,NULL,'ellen',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_信息`
--

DROP TABLE IF EXISTS `user_信息`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_信息` (
  `id` int(11) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_信息`
--

LOCK TABLES `user_信息` WRITE;
/*!40000 ALTER TABLE `user_信息` DISABLE KEYS */;
INSERT INTO `user_信息` VALUES (1,'zding92','zding');
/*!40000 ALTER TABLE `user_信息` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_ability`
--

DROP TABLE IF EXISTS `user_has_ability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_ability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` int(11) NOT NULL,
  `User_username` varchar(20) NOT NULL,
  `Ability_id` int(11) NOT NULL,
  `Ability_name` varchar(45) NOT NULL,
  `selfcomment` varchar(200) DEFAULT '这个人很懒，啥都没说~',
  `tags` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`User_id`,`User_username`,`Ability_id`,`Ability_name`),
  KEY `fk_User_has_Ability_Ability1_idx` (`Ability_id`,`Ability_name`),
  KEY `fk_User_has_Ability_User1_idx` (`User_id`,`User_username`),
  CONSTRAINT `fk_User_has_Ability_Ability1` FOREIGN KEY (`Ability_id`, `Ability_name`) REFERENCES `ability` (`id`, `name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Ability_User1` FOREIGN KEY (`User_id`, `User_username`) REFERENCES `user` (`id`, `username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_ability`
--

LOCK TABLES `user_has_ability` WRITE;
/*!40000 ALTER TABLE `user_has_ability` DISABLE KEYS */;
INSERT INTO `user_has_ability` VALUES (1,1,'alice',1,'javascript','这个人很懒，啥都没说~','javascript'),(2,1,'alice',6,'MySQL','这个人很懒，啥都没说~','MySQL'),(3,3,'cindy',2,'css','这个人很懒，啥都没说~','css'),(4,5,'ellen',4,'php','这个人很懒，啥都没说~','php'),(5,2,'bob',5,'网站维护','这个人很懒，啥都没说~','apache'),(6,4,'dennis',2,'css','这个人很懒，啥都没说~','css'),(7,4,'dennis',4,'php','这个人很懒，啥都没说~','php');
/*!40000 ALTER TABLE `user_has_ability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_custom`
--

DROP TABLE IF EXISTS `user_custom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_custom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(45) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `academy` varchar(45) DEFAULT NULL,
  `major` varchar(45) DEFAULT NULL,
  `grade` varchar(45) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `brief` varchar(200) DEFAULT NULL,
  `hidden_name` varchar(5) DEFAULT NULL,
  `message` varchar(400) DEFAULT NULL,
  `studentid` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `studentID_UNIQUE` (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_custom`
--

LOCK TABLES `user_custom` WRITE;
/*!40000 ALTER TABLE `user_custom` DISABLE KEYS */;
INSERT INTO `user_custom` VALUES (1,'zding92','zding','ecnu_testECNU','1234@qq.com','18000000000',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'fdasfd','hello',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'fdasfd','hello',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'zzzzdddd1','hello',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'zzzzdddd1','hello',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'fdasfd','hello',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'zzzzdddd1','hello',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'a87b8bcbfe5a5030fc01e7688e2bbc94','JJJJJ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'a87b8bcbfe5a5030fc01e7688e2bbc94','3dkltsyt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'64528858aa8a3ba872964006190f7696','3dkltsytt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'9f41aa55a5e3f6a400305dd4bc7f43aa','zding92','zding92',NULL,NULL,NULL,'张鼎',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'cc03e747a6afbbcbf8be7668acfebee5','testECNU','ecdfa','1239835@qq.com','18011111111','地址测试','姓哈哈','通信工程系','信息学院','电子信息科学与技术','年级测试','female','简546','true','即时消息测试','10112110121'),(22,'e99a18c428cb38d5f260853678922e03','1001','1001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'e99a18c428cb38d5f260853678922e03','g1001','g1001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user_custom` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-15 21:27:23
