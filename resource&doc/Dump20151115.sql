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
  `state` varchar(45) DEFAULT 'y',
  PRIMARY KEY (`id`,`name`),
  KEY `fk_Ability_Direction_idx` (`Direction_id`),
  CONSTRAINT `fk_Ability_Direction` FOREIGN KEY (`Direction_id`) REFERENCES `direction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ability`
--

LOCK TABLES `ability` WRITE;
/*!40000 ALTER TABLE `ability` DISABLE KEYS */;
INSERT INTO `ability` VALUES (1,'javascript',1,'js,javascript,web前台,网站',1,'y'),(2,'css',1,',heejlls,css,ss',2,'y'),(3,'UI设计',1,'UI',0,'y'),(4,'php',2,',php,web后台,网站',2,'y'),(5,'网站维护',3,',web,',1,'y'),(6,'MySQL',3,',hellojs,mysql',1,'y'),(7,'Oracle',4,'oracle',0,'y'),(8,'Delphi',4,'delphi',0,'y'),(9,'VisualStudio',4,'vs',0,'y'),(10,'QtCreator',4,'qt',0,'y'),(11,'iOS开发',5,'ios',0,'y'),(12,'Android开发',5,'android',0,'y'),(13,'WindowsPhone开发',5,'winphone',0,'y'),(14,'语音处理算法',6,'voice',0,'y'),(15,'图像处理算法',6,'image',0,'y'),(16,'视频处理算法',6,'vedio',0,'y'),(17,'DSP基础算法',6,'dsp',0,'y'),(18,'ARM嵌入式系统设计',7,'arm',0,'y'),(19,'51单片机',7,'51',0,'y'),(20,'STM32单片机',7,'stm32',0,'y'),(21,'MSP430',7,'msp430',0,'y'),(22,'高速PCB设计',8,'pcb',0,'y'),(23,'PSB设计基础',8,'psb',0,'y'),(24,'模拟电路设计',9,'analog',0,'y'),(25,'数字逻辑电路设计',9,'digital',0,'y'),(26,'生态系统',10,'eco',0,'y'),(27,'人类DNA',11,'dna',0,'y'),(28,'动植物DNA',11,'dna',0,'y'),(29,'生物习性',12,'lifestyle',0,'y'),(30,'细胞学',13,'cell',0,'y'),(31,'饮食健康',14,'diet',0,'y'),(32,'营养学',14,'diet',0,'y'),(33,'Photoshop',15,'ps',0,'y'),(34,'3D建模',17,'3d',0,'y'),(35,'AE',16,'ae',0,'y'),(36,'Flash',16,'flash',0,'y'),(37,'3D-Max',17,'3d',0,'y'),(38,'时装设计',18,'design',0,'y'),(39,'拉丁舞',22,'dance',0,'y'),(40,'机械舞',22,'dance',0,'y'),(41,'美声',21,'voice,music',0,'y'),(42,'合唱',21,'voice,music',0,'y'),(43,'大提琴',20,'music',0,'y'),(44,'小提琴',20,'music',0,'y'),(45,'小品',19,'fun',0,'y'),(46,'现场主持',19,'fun',0,'y'),(47,'书法',24,'art',0,'y'),(48,'素描',23,'art',0,'y'),(49,'油彩',23,'art',0,'y'),(50,'orz',1,'orz',1,'2'),(51,'室内装潢设计',17,'室内装潢设计',1,'y'),(52,'AI',15,'AI',1,'n'),(53,'',1,'',1,'27'),(54,'js',1,'js',1,'27');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academy`
--

LOCK TABLES `academy` WRITE;
/*!40000 ALTER TABLE `academy` DISABLE KEYS */;
INSERT INTO `academy` VALUES (0,'华东师范大学'),(1,'信息科学技术学院'),(2,'计算机科学与软件工程学院'),(3,'艺术学院'),(4,'生命科学学院'),(5,'资源与环境科学学院');
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
  `comp_state` enum('待审批','审批通过','审批未通过','正在进行','已结束') NOT NULL DEFAULT '待审批',
  `comp_prize` varchar(20) NOT NULL DEFAULT '无相关奖项',
  `apply_date` date DEFAULT NULL,
  `author1_name` varchar(20) DEFAULT NULL,
  `comp_item_name` varchar(45) DEFAULT NULL,
  `owner_academy` varchar(45) NOT NULL,
  PRIMARY KEY (`comp_item_id`),
  KEY `FK_competition_prj_idx1` (`comp_type_id`),
  CONSTRAINT `FK_competition_info` FOREIGN KEY (`comp_type_id`) REFERENCES `competition_info` (`comp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competition_main`
--

LOCK TABLES `competition_main` WRITE;
/*!40000 ALTER TABLE `competition_main` DISABLE KEYS */;
INSERT INTO `competition_main` VALUES (11,'11111111111,10112110444',1,'审批通过','无相关奖项','2015-10-12','测试姓名','测试竞赛方法1','计算机科学与软件工程学院');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'电子工程系',1),(2,'通信工程系',1),(3,'计算机科学与技术系',2),(4,'美术学系',3),(5,'音乐学系',3),(6,'生物学系',4),(7,'生命医学系',4),(8,'大气资源',5);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `major`
--

LOCK TABLES `major` WRITE;
/*!40000 ALTER TABLE `major` DISABLE KEYS */;
INSERT INTO `major` VALUES (1,'微电子',1),(2,'电子信息科学与技术',1),(3,'通信工程',2),(4,'计算机科学与技术',3),(5,'中国画',4),(6,'油画',4),(7,'综合绘画',4),(8,'雕塑与公共艺术',4),(9,'美术教育',4),(10,'声乐',5),(11,'钢琴',5),(12,'指挥',5),(13,'管弦',5),(14,'音乐理论',5),(15,'生物学',6),(16,'生命医学',7),(17,'大气科学',8);
/*!40000 ALTER TABLE `major` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `academy_id` varchar(100) NOT NULL,
  `note_time` varchar(20) NOT NULL,
  `note_title` varchar(60) NOT NULL,
  `note_detail` varchar(1000) NOT NULL,
  PRIMARY KEY (`note_id`),
  KEY `note_userBase_FK_idx` (`academy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (62,'!5!1!4!','2015-10-07 14:53:33','生科资环信院','生科资环信院'),(63,'!0!','2015-10-07 15:49:02','111','111'),(64,'!1!','2015-10-07 15:49:13','222','222'),(65,'!1!2!3!','2015-10-07 15:49:22','333','333'),(66,'!1!4!5!','2015-10-07 15:49:33','444','444'),(67,'!4!2!1!','2015-10-07 15:49:43','555','555'),(68,'!0!','2015-10-07 15:49:50','666','666');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
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
INSERT INTO `tiaozhan_info` VALUES (11,'测试竞赛方法1','A2','B2','B2A','11111111111','10112110444',NULL,NULL,NULL,NULL,0,1,'推荐人','男',55,'华东师范大学','华东师范大学','561000','12345678','24165467','hello','男',66,'交通大学','交通大学','511111','1254564','87965346','','','','','','','','','','范德萨发圣诞','方式ad的','','方式','','',' 的撒富士达','发三大',NULL,'on','on','on','on',NULL,NULL,NULL,NULL,NULL,'on','on','on',NULL,NULL,'','','','lab','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','');
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
INSERT INTO `user_admin` VALUES (6,0),(7,5);
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_base`
--

LOCK TABLES `user_base` WRITE;
/*!40000 ALTER TABLE `user_base` DISABLE KEYS */;
INSERT INTO `user_base` VALUES (6,'adminECNU','cc03e747a6afbbcbf8be7668acfebee5','admin','2015-09-24','2015-10-15'),(7,'adminIT','cc03e747a6afbbcbf8be7668acfebee5','admin','2015-09-24','2015-10-13'),(27,'testECNU','cc03e747a6afbbcbf8be7668acfebee5','custom','2015-10-12','2015-11-15'),(28,'ffffd','b46b5c3d7ef9bae31af6122b9c67f054','custom','2015-10-13',NULL),(29,'testECNU2','cc03e747a6afbbcbf8be7668acfebee5','custom','2015-10-13','2015-11-15'),(30,'fsda','64528858aa8a3ba872964006190f7696','custom','2015-10-22',NULL),(31,'fdsafd','64528858aa8a3ba872964006190f7696','custom','2015-10-22',NULL);
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
  `schooling_system` enum('全日制本科','专业型硕士','学术型硕士','博士') DEFAULT NULL,
  `campus` enum('闵行校区','中山北路校区') DEFAULT NULL,
  `unreadmsg_num` int(3) DEFAULT NULL,
  `hidden_privacy` enum('S','H') DEFAULT 'H',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `id_UNIQUE` (`user_id`),
  UNIQUE KEY `studentID_UNIQUE` (`student_id`),
  CONSTRAINT `fk_userid_custom` FOREIGN KEY (`user_id`) REFERENCES `user_base` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_custom`
--

LOCK TABLES `user_custom` WRITE;
/*!40000 ALTER TABLE `user_custom` DISABLE KEYS */;
INSERT INTO `user_custom` VALUES (27,'tian_yu92@yahoo.com','10001112121','测试地址','测试姓名','电子工程系','信息科学技术学院','电子信息科学与技术','研二','男','我是一个人。','11111111111',11,'专业型硕士','闵行校区',0,'H'),(28,'sdfasafsder@qq.com','1232141351','sfaasf','哈哈','音乐学系','艺术学院','钢琴','研一','男','发发生','10112110125',11,'全日制本科','中山北路校区',0,'S'),(29,'214166945@qq.com','123154152','helloWorld','天于','生命医学系','生命科学学院','生命医学','研二','女','ffff','10112110444',11,'专业型硕士','闵行校区',0,'S'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'S'),(31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'S');
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
  `Direction_name` varchar(45) DEFAULT NULL,
  `selfComment` varchar(200) DEFAULT '这个人很懒，啥都没说~',
  PRIMARY KEY (`id`,`User_id`,`Ability_id`,`Ability_name`),
  KEY `fk_User_has_Ability_Ability1_idx` (`Ability_id`,`Ability_name`),
  KEY `fk_User_has_Ability_User1_idx` (`User_id`),
  KEY `fk_User_has_ability_Direction_idx` (`Direction_name`),
  CONSTRAINT `fk_User_has_Ability_Ability1` FOREIGN KEY (`Ability_id`, `Ability_name`) REFERENCES `ability` (`id`, `name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Ability_User1` FOREIGN KEY (`User_id`) REFERENCES `user_custom` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_ability`
--

LOCK TABLES `user_has_ability` WRITE;
/*!40000 ALTER TABLE `user_has_ability` DISABLE KEYS */;
INSERT INTO `user_has_ability` VALUES (19,27,4,'php','web后台','我的php时尚时尚最时尚'),(20,27,1,'javascript','web前台','我的javascript时尚时尚最时尚'),(21,27,26,'生态系统','生态系统','我的生态系统时尚时尚最时尚'),(22,27,2,'css','web前台','fddsafsdaf'),(23,27,3,'UI设计','web前台','fdsafsdafa'),(24,27,32,'营养学','人类健康','我能把你喂成猪'),(25,29,3,'UI设计','web前台','我很厉害哦'),(26,29,12,'Android开发','移动技术','安卓'),(27,27,51,'室内装潢设计','立体设计','我的装潢技术最时尚'),(28,28,1,'javascript','web前台','哈哈哈'),(29,29,1,'javascript','web前台','这个人很懒，啥都没说~'),(30,27,54,'js','web前台','这个人很懒，啥都没说~'),(31,29,6,'MySQL','数据库','这个人很懒，啥都没说~'),(32,28,32,'营养学','人类健康','我能把你喂成猪'),(33,29,32,'营养学','人类健康','我能把你喂成猪'),(34,28,4,'php','web后台','我的php时尚时尚最时尚'),(35,29,4,'php','web后台','我的php时尚时尚最时尚'),(37,29,51,'室内装潢设计','立体设计','我的装潢技术最时尚');
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

-- Dump completed on 2015-11-15 14:59:55
