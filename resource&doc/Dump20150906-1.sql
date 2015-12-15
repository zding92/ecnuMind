-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ecnu_mind
-- ------------------------------------------------------
-- Server version	5.6.25-log

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
  PRIMARY KEY (`id`,`name`),
  KEY `fk_Ability_Direction_idx` (`Direction_id`),
  CONSTRAINT `fk_Ability_Direction` FOREIGN KEY (`Direction_id`) REFERENCES `direction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ability`
--

LOCK TABLES `ability` WRITE;
/*!40000 ALTER TABLE `ability` DISABLE KEYS */;
INSERT INTO `ability` VALUES (1,'前台脚本语言',1,'javascript js 前台 脚本'),(2,'css',1,'css 层叠样式表 前台'),(3,'php',2,'php 脚本 后台'),(4,'mysql',2,'mysql 数据库 sql语言'),(5,'DNA',3,'DNA 基因'),(6,'RNA',3,'RNA'),(7,'骨科',4,'骨科 外科'),(8,'皮肤科',4,'皮肤科 外科');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direction`
--

LOCK TABLES `direction` WRITE;
/*!40000 ALTER TABLE `direction` DISABLE KEYS */;
INSERT INTO `direction` VALUES (1,'web前台',1),(2,'web后台',1),(3,'遗传生物学',2),(4,'临床病理',2),(5,'现代艺术',3),(6,'古典艺术',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field`
--

LOCK TABLES `field` WRITE;
/*!40000 ALTER TABLE `field` DISABLE KEYS */;
INSERT INTO `field` VALUES (1,'信息技术'),(2,'生物医药'),(3,'艺术设计');
/*!40000 ALTER TABLE `field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiaozhan_b1`
--

DROP TABLE IF EXISTS `tiaozhan_b1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiaozhan_b1` (
  `prj_id` int(5) NOT NULL,
  `b1_1` mediumtext,
  `b1_2` mediumtext,
  `b1_3` mediumtext,
  `b1_4` mediumtext,
  `b1_5` mediumtext,
  `b1_6` mediumtext,
  `b1_7` mediumtext,
  `b1_8` mediumtext,
  `b1_9` mediumtext,
  PRIMARY KEY (`prj_id`),
  CONSTRAINT `Tiaozhan_b1_FK_1` FOREIGN KEY (`prj_id`) REFERENCES `tiaozhan_info` (`prj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiaozhan_b1`
--

LOCK TABLES `tiaozhan_b1` WRITE;
/*!40000 ALTER TABLE `tiaozhan_b1` DISABLE KEYS */;
INSERT INTO `tiaozhan_b1` VALUES (45,'1','2','3','4','5','6','7','8','9'),(46,'1','2','3','4','5','6','7','8','9'),(47,'1','2','3','4','5','6','7','8','9');
/*!40000 ALTER TABLE `tiaozhan_b1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiaozhan_b2`
--

DROP TABLE IF EXISTS `tiaozhan_b2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiaozhan_b2` (
  `prj_id` int(5) NOT NULL,
  `b2_1` mediumtext,
  `b2_2` mediumtext,
  `b2_3` mediumtext,
  `b2_4` mediumtext,
  `b2_5` mediumtext,
  `b2_6` mediumtext,
  `b2_7` mediumtext,
  `b2_8` mediumtext,
  `b2_c_1` tinyint(1) NOT NULL DEFAULT '0',
  `b2_c_2` tinyint(1) NOT NULL DEFAULT '0',
  `b2_c_3` tinyint(1) NOT NULL DEFAULT '0',
  `b2_c_4` tinyint(1) NOT NULL DEFAULT '0',
  `b2_c_5` tinyint(1) NOT NULL DEFAULT '0',
  `b2_c_6` tinyint(1) NOT NULL DEFAULT '0',
  `b2_c_7` tinyint(1) NOT NULL DEFAULT '0',
  `b2_c_8` tinyint(1) NOT NULL DEFAULT '0',
  `b2_c_9` tinyint(1) NOT NULL DEFAULT '0',
  `b2_c_10` tinyint(1) NOT NULL DEFAULT '0',
  `b2_c_11` tinyint(1) NOT NULL DEFAULT '0',
  `b2_c_12` tinyint(1) NOT NULL DEFAULT '0',
  `b2_c_13` tinyint(1) NOT NULL DEFAULT '0',
  `b2_c_14` tinyint(1) NOT NULL DEFAULT '0',
  `b2_c_15` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`prj_id`),
  CONSTRAINT `tiaozhan_b2_FK_1` FOREIGN KEY (`prj_id`) REFERENCES `tiaozhan_info` (`prj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiaozhan_b2`
--

LOCK TABLES `tiaozhan_b2` WRITE;
/*!40000 ALTER TABLE `tiaozhan_b2` DISABLE KEYS */;
INSERT INTO `tiaozhan_b2` VALUES (41,'1','2','3','4','5','7','7','8',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(43,'1','2','3','4','5','7','7','8',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(44,'1','2','3','4','5','7','7','8',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `tiaozhan_b2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiaozhan_b3`
--

DROP TABLE IF EXISTS `tiaozhan_b3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiaozhan_b3` (
  `prj_id` int(5) NOT NULL,
  `b3_1` mediumtext,
  `b3_2` mediumtext,
  `b3_3` mediumtext,
  `b3_4` mediumtext,
  `b3_5` mediumtext,
  `b3_6` mediumtext,
  `b3_7` mediumtext,
  `b3_8` mediumtext,
  `b3_c_1` tinyint(1) DEFAULT NULL,
  `b3_c_2` tinyint(1) DEFAULT NULL,
  `b3_c_3` tinyint(1) DEFAULT NULL,
  `b3_c_4` tinyint(1) DEFAULT NULL,
  `b3_c_5` tinyint(1) DEFAULT NULL,
  `b3_c_6` tinyint(1) DEFAULT NULL,
  `b3_c_7` tinyint(1) DEFAULT NULL,
  `b3_c_8` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`prj_id`),
  CONSTRAINT `tiaozhan_b3_FK_1` FOREIGN KEY (`prj_id`) REFERENCES `tiaozhan_info` (`prj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiaozhan_b3`
--

LOCK TABLES `tiaozhan_b3` WRITE;
/*!40000 ALTER TABLE `tiaozhan_b3` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiaozhan_b3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiaozhan_info`
--

DROP TABLE IF EXISTS `tiaozhan_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiaozhan_info` (
  `prj_id` int(5) NOT NULL AUTO_INCREMENT,
  `prj_name` varchar(80) NOT NULL,
  `group_type` varchar(2) NOT NULL,
  `type_selector` varchar(2) NOT NULL,
  `detailed_type` varchar(20) NOT NULL,
  `referee_id` int(11) NOT NULL,
  `author1_id` varchar(11) NOT NULL,
  `author2_id` varchar(11) DEFAULT NULL,
  `author3_id` varchar(11) DEFAULT NULL,
  `author4_id` varchar(11) DEFAULT NULL,
  `author5_id` varchar(11) DEFAULT NULL,
  `author6_id` varchar(11) DEFAULT NULL,
  `practice_type` tinyint(1) NOT NULL DEFAULT '0',
  `teacher_id` int(11) NOT NULL,
  `prj_date` date DEFAULT NULL,
  PRIMARY KEY (`prj_id`),
  KEY `tiaozhan_basic_FK_1_idx` (`author1_id`,`author2_id`),
  KEY `tiaozhan_basic_FK7_idx1` (`referee_id`),
  KEY `tiaozhan_basic_FK8_idx` (`teacher_id`),
  KEY `tiaozhan_basic_FK2_idx` (`author2_id`),
  KEY `tiaozhan_basic_FK3_idx` (`author3_id`),
  KEY `tiaozhan_basic_FK4_idx` (`author4_id`),
  KEY `tiaozhan_basic_F5_idx` (`author5_id`),
  KEY `tiaozhan_basic_FK6_idx` (`author6_id`),
  CONSTRAINT `tiaozhan_basic_FK1` FOREIGN KEY (`author1_id`) REFERENCES `user_custom` (`studentid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tiaozhan_basic_FK2` FOREIGN KEY (`author2_id`) REFERENCES `user_custom` (`studentid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tiaozhan_basic_FK3` FOREIGN KEY (`author3_id`) REFERENCES `user_custom` (`studentid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tiaozhan_basic_FK4` FOREIGN KEY (`author4_id`) REFERENCES `user_custom` (`studentid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tiaozhan_basic_FK5` FOREIGN KEY (`author5_id`) REFERENCES `user_custom` (`studentid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tiaozhan_basic_FK6` FOREIGN KEY (`author6_id`) REFERENCES `user_custom` (`studentid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tiaozhan_basic_FK7` FOREIGN KEY (`referee_id`) REFERENCES `tiaozhan_teacher` (`teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tiaozhan_basic_FK8` FOREIGN KEY (`teacher_id`) REFERENCES `tiaozhan_teacher` (`teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiaozhan_info`
--

LOCK TABLES `tiaozhan_info` WRITE;
/*!40000 ALTER TABLE `tiaozhan_info` DISABLE KEYS */;
INSERT INTO `tiaozhan_info` VALUES (1,'1','1','1','1',1,'10112140253',NULL,NULL,NULL,NULL,NULL,1,1,'2015-02-15'),(41,'a','A1','B2','B2B',42,'10112140253','null','null','null','null','null',1,41,NULL),(43,'a','A1','B2','B2B',48,'10112140253','null','null','null','null','null',1,47,NULL),(44,'a','A1','B2','B2B',50,'10112140253','null','null','null','null','null',1,49,NULL),(45,'A','A1','B1','B1A',54,'10112140253','null','null','null','null','null',1,53,NULL),(46,'A','A1','B1','B1A',56,'10112140253','null','null','null','null','null',1,55,'2015-09-06'),(47,'A','A1','B1','B1A',58,'10112140253','null','null','null','null','null',1,57,'2015-09-06');
/*!40000 ALTER TABLE `tiaozhan_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiaozhan_basicinfo`
--

DROP TABLE IF EXISTS `tiaozhan_basicinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiaozhan_basicinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiaozhan_basicinfo`
--

LOCK TABLES `tiaozhan_basicinfo` WRITE;
/*!40000 ALTER TABLE `tiaozhan_basicinfo` DISABLE KEYS */;
INSERT INTO `tiaozhan_basicinfo` VALUES (1,'aa');
/*!40000 ALTER TABLE `tiaozhan_basicinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiaozhan_teacher`
--

DROP TABLE IF EXISTS `tiaozhan_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiaozhan_teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(20) DEFAULT NULL,
  `teacher_gender` varchar(6) DEFAULT NULL,
  `teacher_age` int(2) DEFAULT NULL,
  `teacher_job` varchar(45) DEFAULT NULL,
  `teacher_add` varchar(45) DEFAULT NULL,
  `teacher_zipcode` varchar(10) DEFAULT NULL,
  `teacher_workphone` varchar(20) DEFAULT NULL,
  `teacher_homephone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiaozhan_teacher`
--

LOCK TABLES `tiaozhan_teacher` WRITE;
/*!40000 ALTER TABLE `tiaozhan_teacher` DISABLE KEYS */;
INSERT INTO `tiaozhan_teacher` VALUES (1,'2',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'fdsa',NULL,213,'fdsa','fdsa','124','124','124'),(36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,'fdas',NULL,214,'fdsa','fdsa','2134','da','1243'),(38,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(39,'fdas',NULL,214,'fdsa','fdsa','2134','da','1243'),(40,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(41,'fdas',NULL,214,'fdsa','fdsa','2134','da','1243'),(42,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(43,'fdas',NULL,214,'fdsa','fdsa','2134','da','1243'),(44,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(45,'fdas',NULL,214,'fdsa','fdsa','2134','da','1243'),(46,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(47,'fdas',NULL,214,'fdsa','fdsa','2134','da','1243'),(48,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(49,'fdas',NULL,214,'fdsa','fdsa','2134','da','1243'),(50,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(51,'fdas',NULL,214,'fdsa','fdsa','2134','da','1243'),(52,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(53,'da',NULL,123,'fsa','fdsa','fdsa','fdsa','fdsa'),(54,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(55,'da',NULL,123,'fsa','fdsa','fdsa','fdsa','fdsa'),(56,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(57,'da',NULL,123,'fsa','fdsa','fdsa','fdsa','fdsa'),(58,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tiaozhan_teacher` ENABLE KEYS */;
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
  `Ability_id` int(11) NOT NULL,
  `Ability_name` varchar(45) NOT NULL,
  `selfcomment` varchar(200) DEFAULT '这个人很懒，啥都没说~',
  PRIMARY KEY (`id`,`User_id`,`Ability_id`,`Ability_name`),
  KEY `fk_User_has_Ability_Ability1_idx` (`Ability_id`,`Ability_name`),
  KEY `fk_User_has_Ability_User1_idx` (`User_id`),
  CONSTRAINT `fk_User_has_Ability_Ability1` FOREIGN KEY (`Ability_id`, `Ability_name`) REFERENCES `ability` (`id`, `name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Ability_User1` FOREIGN KEY (`User_id`) REFERENCES `user_custom` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_ability`
--

LOCK TABLES `user_has_ability` WRITE;
/*!40000 ALTER TABLE `user_has_ability` DISABLE KEYS */;
INSERT INTO `user_has_ability` VALUES (11,21,1,'前台脚本语言','这个人很懒，啥都没说~'),(12,21,4,'MySQL','这个人很懒，啥都没说~');
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
INSERT INTO `user_custom` VALUES (1,'null','null','null','null','null','null','null','null','null','null','null','null','null','null','null','null'),(2,'zding92','zding','ecnu_testECNU','1234@qq.com','18000000000',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10112140253'),(9,'fdasfd','hello',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'zzzzdddd1','hello',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'zzzzdddd1','hello',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'fdasfd','hello',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'zzzzdddd1','hello',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'a87b8bcbfe5a5030fc01e7688e2bbc94','JJJJJ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'a87b8bcbfe5a5030fc01e7688e2bbc94','3dkltsyt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'64528858aa8a3ba872964006190f7696','3dkltsytt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'9f41aa55a5e3f6a400305dd4bc7f43aa','zding92','zding92',NULL,NULL,NULL,'张鼎',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'cc03e747a6afbbcbf8be7668acfebee5','testECNU','ecdfa','1239835@qq.com','18011111111','地址测试','姓哈哈','通信工程系','信息学院','电子信息科学与技术','年级测试','female','简546','true','即时消息测试','10112110121'),(22,'e99a18c428cb38d5f260853678922e03','1001','1001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'e99a18c428cb38d5f260853678922e03','g1001','g1001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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

-- Dump completed on 2015-09-06 23:23:55
