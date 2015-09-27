CREATE DATABASE  IF NOT EXISTS `ecnu_mind` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ecnu_mind`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ecnu_mind
-- ------------------------------------------------------
-- Server version	5.6.21-log

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
INSERT INTO `ability` VALUES (1,'前台脚本语言',1,'javascript js 前台 脚本',0),(2,'css',1,'css 层叠样式表 前台',0),(3,'php',2,'php 脚本 后台',0),(4,'mysql',2,'mysql 数据库 sql语言',0),(5,'DNA',3,'DNA 基因',0),(6,'RNA',3,'RNA',0),(7,'骨科',4,'骨科 外科',0),(8,'皮肤科',4,'皮肤科 外科',0);
/*!40000 ALTER TABLE `ability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `academy`
--

DROP TABLE IF EXISTS `academy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academy` (
  `academy_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`academy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academy`
--

LOCK TABLES `academy` WRITE;
/*!40000 ALTER TABLE `academy` DISABLE KEYS */;
INSERT INTO `academy` VALUES (0,'华东师范大学'),(1,'信息科学技术学院'),(2,'计算机科学与软件工程学院'),(3,'艺术学院'),(4,'生命科学学院');
/*!40000 ALTER TABLE `academy` ENABLE KEYS */;
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
  PRIMARY KEY (`id`),
  KEY `fk_Comment_User_has_Ability1_idx` (`User_has_Ability_id`),
  KEY `fk_Comment_User1_idx` (`Commentator_id`),
  CONSTRAINT `fk_Comment_User1` FOREIGN KEY (`Commentator_id`) REFERENCES `user_custom` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  `comp_template` varchar(100) DEFAULT NULL,
  `comp_sponsor` varchar(45) DEFAULT NULL,
  `comp_importance` varchar(5) DEFAULT NULL,
  `comp_field` varchar(45) DEFAULT NULL,
  `comp_brief` mediumtext,
  `comp_official_website` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`comp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competition_info`
--

LOCK TABLES `competition_info` WRITE;
/*!40000 ALTER TABLE `competition_info` DISABLE KEYS */;
INSERT INTO `competition_info` VALUES (1,'挑战杯创业大赛（小挑）','2015-03-06','2016-03-06','2016-04-15','2016-05-15','Tiaozhan','国家教育部','★★★★☆','创业','这是全国大学生巅峰竞赛','www.baidu.com'),(2,'大夏杯','2016-03-06','2016-03-07','2016-04-15','2016-05-15','Tiaozhan','华东师大团委','★','综合','这是全国大学生巅峰竞赛','www.baidu.com'),(3,'挑战杯创业大赛（大挑）','2015-03-06','2015-05-06','2016-04-15','2016-05-15','Tiaozhan','国家教育部','★★★★★','综合','这是全国大学生巅峰竞赛','www.baidu.com'),(4,'全国大学生电子设计竞赛（上海赛区）','2015-03-06','2015-05-06','2016-04-15','2016-05-15','Tiaozhan','上海教育部','★★★★★','信息技术','大学生电子设计大赛','www.baidu.com'),(5,'大学生计算机能力竞赛','2016-03-06','2016-05-06','2016-04-15','2016-05-15','Tiaozhan','上海教育部','★★','信息技术','大学生电子设计大赛','www.baidu.com'),(6,'英特尔杯全国大学生嵌入式邀请赛','2016-03-06','2016-05-06','2016-04-15','2016-05-15','Tiaozhan','上海教育部','★★★★','信息技术','大学生电子设计大赛','www.baidu.com'),(7,'蓝桥杯','2015-03-06','2015-05-06','2016-04-15','2016-05-15','Tiaozhan','上海教育部','★★★','信息技术','大学生电子设计大赛','www.baidu.com'),(8,'大学生英语翻译大赛','2015-03-06','2015-05-06','2016-04-15','2016-05-15','Tiaozhan','上海教育部','★★★★','语言','大学生电子设计大赛','www.baidu.com'),(9,'华东师范大学十大歌手','2015-03-06','2016-03-06','2016-04-15','2016-05-15','Tiaozhan','上海教育部','★','艺术','大学生电子设计大赛','www.baidu.com'),(10,'全国商科院校大赛','2015-03-06','2016-03-06','2016-04-15','2016-05-15','Tiaozhan','上海教育部','★★★★','商业','大学生电子设计大赛','www.baidu.com'),(11,'全国道德法律辩论赛','2015-03-06','2015-05-06','2016-04-15','2016-05-15','Tiaozhan','上海教育部','★★★★','法律','大学生电子设计大赛','www.baidu.com');
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
  `comp_state` varchar(30) NOT NULL DEFAULT '等待批准',
  `comp_prize` varchar(20) NOT NULL DEFAULT '无相关奖项',
  `apply_date` date DEFAULT NULL,
  `author1_name` varchar(20) DEFAULT NULL,
  `comp_item_name` varchar(45) DEFAULT NULL,
  `owner_academy` varchar(45) NOT NULL,
  PRIMARY KEY (`comp_item_id`),
  KEY `FK_competition_prj_idx1` (`comp_type_id`),
  CONSTRAINT `FK_competition_info` FOREIGN KEY (`comp_type_id`) REFERENCES `competition_info` (`comp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competition_main`
--

LOCK TABLES `competition_main` WRITE;
/*!40000 ALTER TABLE `competition_main` DISABLE KEYS */;
INSERT INTO `competition_main` VALUES (2,'10112110128,10112140125',1,'已结束','无相关奖项','2015-09-25','二货','啦啦啦','资环学院'),(3,'10112110128,10112110129',1,'已结束','无相关奖项','2015-09-26','余粉','fd你','资环学院'),(4,'10112110128,10112110129',1,'已结束','无相关奖项','2015-09-26','余粉','fds','资环学院'),(5,'10112110128,10112110129',1,'已结束','无相关奖项','2015-09-26','余粉','你好啊','资环学院'),(6,'10112110128,10112110129',10,'已结束','无相关奖项','2015-09-27','余粉','你好啊','资环学院'),(7,'10112110128,10112110129',9,'已结束','上海市一等奖','2015-09-27','余粉','你好啊','资环学院'),(8,'10112110128,10112110129',9,'已结束','一等奖','2015-09-27','余粉','乌拉拉','资环学院');
/*!40000 ALTER TABLE `competition_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `academy_id` int(11) NOT NULL,
  PRIMARY KEY (`department_id`),
  KEY `fk_Department_Academy_idx` (`academy_id`),
  CONSTRAINT `fk_Department_Academy` FOREIGN KEY (`academy_id`) REFERENCES `academy` (`academy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'电子工程系',1),(2,'通信工程系',1),(3,'计算机科学与技术系',2),(4,'美术学系',3),(5,'音乐学系',3),(6,'生物学系',4),(7,'生命医学系',4);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
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
-- Table structure for table `major`
--

DROP TABLE IF EXISTS `major`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `major` (
  `major_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`major_id`),
  KEY `fk_Major_Department_idx` (`department_id`),
  CONSTRAINT `fk_Major_Department` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `major`
--

LOCK TABLES `major` WRITE;
/*!40000 ALTER TABLE `major` DISABLE KEYS */;
INSERT INTO `major` VALUES (1,'微电子',1),(2,'电子信息科学与技术',1),(3,'通信工程',2),(4,'计算机科学与技术',3),(5,'中国画',4),(6,'油画',4),(7,'综合绘画',4),(8,'雕塑与公共艺术',4),(9,'美术教育',4),(10,'声乐',5),(11,'钢琴',5),(12,'指挥',5),(13,'管弦',5),(14,'音乐理论',5),(15,'生物学',6),(16,'生命医学',7);
/*!40000 ALTER TABLE `major` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiaozhan_info`
--

DROP TABLE IF EXISTS `tiaozhan_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiaozhan_info` (
  `comp_item_id` int(11) NOT NULL,
  `comp_item_name` varchar(80) NOT NULL,
  `group_type` varchar(2) DEFAULT NULL,
  `type_selector` varchar(2) DEFAULT NULL,
  `detailed_type` varchar(20) DEFAULT NULL,
  `author1_id` varchar(11) NOT NULL,
  `author2_id` varchar(11) DEFAULT NULL,
  `author3_id` varchar(11) DEFAULT NULL,
  `author4_id` varchar(11) DEFAULT NULL,
  `author5_id` varchar(11) DEFAULT NULL,
  `author6_id` varchar(11) DEFAULT NULL,
  `practice_type` tinyint(1) NOT NULL DEFAULT '0',
  `comp_id` int(5) DEFAULT NULL,
  `referee_name` varchar(20) DEFAULT NULL,
  `referee_gender` varchar(6) DEFAULT NULL,
  `referee_age` int(2) DEFAULT NULL,
  `referee_job` varchar(45) DEFAULT NULL,
  `referee_add` varchar(45) DEFAULT NULL,
  `referee_zipcode` varchar(10) DEFAULT NULL,
  `referee_workphone` varchar(20) DEFAULT NULL,
  `referee_homephone` varchar(20) DEFAULT NULL,
  `teacher_name` varchar(20) DEFAULT NULL,
  `teacher_gender` varchar(6) DEFAULT NULL,
  `teacher_age` int(2) DEFAULT NULL,
  `teacher_job` varchar(45) DEFAULT NULL,
  `teacher_add` varchar(45) DEFAULT NULL,
  `teacher_zipcode` varchar(10) DEFAULT NULL,
  `teacher_workphone` varchar(20) DEFAULT NULL,
  `teacher_homephone` varchar(20) DEFAULT NULL,
  `b1_1` mediumtext,
  `b1_2` mediumtext,
  `b1_3` mediumtext,
  `b1_4` mediumtext,
  `b1_5` mediumtext,
  `b1_6` mediumtext,
  `b1_7` mediumtext,
  `b1_8` mediumtext,
  `b1_9` mediumtext,
  `b2_1` mediumtext,
  `b2_2` mediumtext,
  `b2_3` mediumtext,
  `b2_4` mediumtext,
  `b2_5` mediumtext,
  `b2_6` mediumtext,
  `b2_7` mediumtext,
  `b2_8` mediumtext,
  `b2_c_1` varchar(3) DEFAULT NULL,
  `b2_c_2` varchar(3) DEFAULT NULL,
  `b2_c_3` varchar(3) DEFAULT NULL,
  `b2_c_4` varchar(3) DEFAULT NULL,
  `b2_c_5` varchar(3) DEFAULT NULL,
  `b2_c_7` varchar(3) DEFAULT NULL,
  `b2_c_6` varchar(3) DEFAULT NULL,
  `b2_c_8` varchar(3) DEFAULT NULL,
  `b2_c_9` varchar(3) DEFAULT NULL,
  `b2_c_10` varchar(3) DEFAULT NULL,
  `b2_c_11` varchar(3) DEFAULT NULL,
  `b2_c_12` varchar(3) DEFAULT NULL,
  `b2_c_13` varchar(3) DEFAULT NULL,
  `b2_c_14` varchar(3) DEFAULT NULL,
  `b2_c_15` varchar(3) DEFAULT NULL,
  `b3_1` mediumtext,
  `b3_2` mediumtext,
  `b3_3` mediumtext,
  `b3_4` mediumtext,
  `b3_5` mediumtext,
  `b3_6` mediumtext,
  `b3_10` mediumtext,
  `b3_7` varchar(3) DEFAULT NULL,
  `b3_8` varchar(3) DEFAULT NULL,
  `b3_9` varchar(3) DEFAULT NULL,
  `b3_c_1` varchar(3) DEFAULT NULL,
  `b3_c_2` varchar(3) DEFAULT NULL,
  `b3_c_3` varchar(3) DEFAULT NULL,
  `b3_c_4` varchar(3) DEFAULT NULL,
  `b3_c_5` varchar(3) DEFAULT NULL,
  `b3_c_6` varchar(3) DEFAULT NULL,
  `b3_c_7` varchar(3) DEFAULT NULL,
  `b3_c_8` varchar(3) DEFAULT NULL,
  `b3_ip1` varchar(20) DEFAULT NULL,
  `b3_ip2` varchar(20) DEFAULT NULL,
  `b3_ip1_date` varchar(20) DEFAULT NULL,
  `b3_ip2_date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`comp_item_id`),
  KEY `tiaozhan_basic_FK_1_idx` (`author1_id`,`author2_id`),
  KEY `tiaozhan_basic_FK2_idx` (`author2_id`),
  KEY `tiaozhan_basic_FK3_idx` (`author3_id`),
  KEY `tiaozhan_basic_FK4_idx` (`author4_id`),
  KEY `tiaozhan_basic_F5_idx` (`author5_id`),
  KEY `tiaozhan_basic_FK6_idx` (`author6_id`),
  KEY `tiaozhan_basic_FK9_idx` (`comp_id`),
  CONSTRAINT `tiaozhan_basic_FK1` FOREIGN KEY (`author1_id`) REFERENCES `user_custom` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tiaozhan_basic_FK10` FOREIGN KEY (`comp_id`) REFERENCES `competition_info` (`comp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tiaozhan_basic_FK2` FOREIGN KEY (`author2_id`) REFERENCES `user_custom` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tiaozhan_basic_FK3` FOREIGN KEY (`author3_id`) REFERENCES `user_custom` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tiaozhan_basic_FK4` FOREIGN KEY (`author4_id`) REFERENCES `user_custom` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tiaozhan_basic_FK5` FOREIGN KEY (`author5_id`) REFERENCES `user_custom` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tiaozhan_basic_FK6` FOREIGN KEY (`author6_id`) REFERENCES `user_custom` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tiaozhan_basic_FK9` FOREIGN KEY (`comp_item_id`) REFERENCES `competition_main` (`comp_item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiaozhan_info`
--

LOCK TABLES `tiaozhan_info` WRITE;
/*!40000 ALTER TABLE `tiaozhan_info` DISABLE KEYS */;
INSERT INTO `tiaozhan_info` VALUES (2,'f','A1','B1','B1A','10112110128','10112140125',NULL,NULL,NULL,NULL,1,1,'fds','男',23,'','','','','','','男',NULL,'','','','','','','','','','','','','','','','','','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','lab','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',''),(3,'你好','A1','B1','B1A','10112110128','10112110129',NULL,NULL,NULL,NULL,1,1,'','男',NULL,'','','','','','','男',NULL,'','','','','','','','','','','','','','','','','','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','lab','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',''),(4,'fds','A1','B1','B1A','10112110128','10112110129',NULL,NULL,NULL,NULL,1,1,'','男',NULL,'','','','','','','男',NULL,'','','','','','','','','','','','','','','','','','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','lab','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',''),(5,'你好啊','A2','B1','B1B','10112110128','10112110129',NULL,NULL,NULL,NULL,1,1,'','男',NULL,'','','','','','','男',NULL,'','','','','','','','','','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'你好啊','A1','B1','B1A','10112110128','10112110129',NULL,NULL,NULL,NULL,1,10,'','男',NULL,'','','','','','','男',NULL,'','','','','','','','','','','','','','','','','','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','lab','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',''),(7,'浮夸','A2','B1','B1A','10112110128','10112110129',NULL,NULL,NULL,NULL,1,9,'','男',NULL,'','','','','','','男',NULL,'','','','','','','','','','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'乌拉拉','A1','B2','B2B','10112110128','10112110129',NULL,NULL,NULL,NULL,1,9,'','男',NULL,'','','','','','','男',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tiaozhan_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_admin`
--

DROP TABLE IF EXISTS `user_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_admin` (
  `user_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `userid_UNIQUE` (`user_id`),
  KEY `fk_access_admin_idx` (`access_id`),
  CONSTRAINT `fk_access_admin` FOREIGN KEY (`access_id`) REFERENCES `academy` (`academy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_userid_admin` FOREIGN KEY (`user_id`) REFERENCES `user_base` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_admin`
--

LOCK TABLES `user_admin` WRITE;
/*!40000 ALTER TABLE `user_admin` DISABLE KEYS */;
INSERT INTO `user_admin` VALUES (6,1);
/*!40000 ALTER TABLE `user_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_base`
--

DROP TABLE IF EXISTS `user_base`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_base` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_access` varchar(6) DEFAULT 'custom',
  `register_date` date DEFAULT NULL,
  `last_login_date` date DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `userid_UNIQUE` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_base`
--

LOCK TABLES `user_base` WRITE;
/*!40000 ALTER TABLE `user_base` DISABLE KEYS */;
INSERT INTO `user_base` VALUES (1,'a','1','1',NULL,'1992-07-21'),(2,'testECNU','cc03e747a6afbbcbf8be7668acfebee5','custom','2015-09-22','2015-09-27'),(3,'phphhp','64528858aa8a3ba872964006190f7696','custom','2015-09-23','2015-09-26'),(4,'phphhpf','64528858aa8a3ba872964006190f7696','custom','2015-09-24',NULL),(5,'phphhp4','64528858aa8a3ba872964006190f7696','custom','2015-09-24','2015-09-26'),(6,'admin','64528858aa8a3ba872964006190f7696','admin','2015-09-24','2015-09-27');
/*!40000 ALTER TABLE `user_base` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_custom`
--

DROP TABLE IF EXISTS `user_custom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_custom` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `academy` varchar(45) DEFAULT NULL,
  `major` varchar(45) DEFAULT NULL,
  `grade` varchar(45) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `brief` varchar(200) DEFAULT NULL,
  `student_id` varchar(11) DEFAULT NULL,
  `complete_steps` int(2) DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `id_UNIQUE` (`user_id`),
  UNIQUE KEY `studentID_UNIQUE` (`student_id`),
  CONSTRAINT `fk_userid_custom` FOREIGN KEY (`user_id`) REFERENCES `user_base` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_custom`
--

LOCK TABLES `user_custom` WRITE;
/*!40000 ALTER TABLE `user_custom` DISABLE KEYS */;
INSERT INTO `user_custom` VALUES (2,'305605080@qq.com','18021051036','你好中国','余粉','资环xxx系','资环学院','资环xxx-2专业','大二','男','你好，我是简介，啦啦','10112110128',11),(3,'tian_yu92@yahoo.com','18021051037',' 地方撒','于天','通信工程系','信息学院','电子信息科学与技术','大四','男',NULL,'10112110129',11),(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(5,'tian_yu92@yahoo.co','18888888888','554','你好地方','计算机系','信息学院','计算机工程','研二','男','方式','10112140125',11);
/*!40000 ALTER TABLE `user_custom` ENABLE KEYS */;
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
  CONSTRAINT `fk_User_has_Ability_User1` FOREIGN KEY (`User_id`) REFERENCES `user_custom` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_ability`
--

LOCK TABLES `user_has_ability` WRITE;
/*!40000 ALTER TABLE `user_has_ability` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_has_ability` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-27 14:03:41
