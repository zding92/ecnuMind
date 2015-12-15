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
  `state` varchar(45) DEFAULT 'y',
  PRIMARY KEY (`id`,`name`),
  KEY `fk_Ability_Direction_idx` (`Direction_id`),
  CONSTRAINT `fk_Ability_Direction` FOREIGN KEY (`Direction_id`) REFERENCES `direction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ability`
--

LOCK TABLES `ability` WRITE;
/*!40000 ALTER TABLE `ability` DISABLE KEYS */;
INSERT INTO `ability` VALUES (1,'javascript',1,'js',1,'y'),(2,'css',1,'css',2,'y'),(3,'UI设计',2,'UI',0,'y'),(4,'php',2,'php',2,'y'),(5,'网站维护',3,'web',1,'y'),(6,'MySQL',3,'mysql',1,'y'),(7,'Oracle',4,'oracle',0,'y'),(8,'Delphi',4,'delphi',0,'y'),(9,'VisualStudio',4,'vs',0,'y'),(10,'QtCreator',4,'qt',0,'y'),(11,'iOS开发',5,'ios',0,'y'),(12,'Android开发',5,'android',0,'y'),(13,'WindowsPhone开发',5,'winphone',0,'y'),(14,'语音处理算法',6,'voice',0,'y'),(15,'图像处理算法',6,'image',0,'y'),(16,'视频处理算法',6,'vedio',0,'y'),(17,'DSP基础算法',6,'dsp',0,'y'),(18,'ARM嵌入式系统设计',7,'arm',0,'y'),(19,'51单片机',7,'51',0,'y'),(20,'STM32单片机',7,'stm32',0,'y'),(21,'MSP430',7,'msp430',0,'y'),(22,'高速PCB设计',8,'pcb',0,'y'),(23,'PSB设计基础',8,'psb',0,'y'),(24,'模拟电路设计',9,'analog',0,'y'),(25,'数字逻辑电路设计',9,'digital',0,'y'),(26,'生态系统',10,'eco',0,'y'),(27,'人类DNA',11,'dna',0,'y'),(28,'动植物DNA',11,'dna',0,'y'),(29,'生物习性',12,'lifestyle',0,'y'),(30,'细胞学',13,'cell',0,'y'),(31,'饮食健康',14,'diet',0,'y'),(32,'营养学',14,'diet',0,'y'),(33,'Photoshop',15,'ps',0,'y'),(34,'3D建模',17,'3d',0,'y'),(35,'AE',16,'ae',0,'y'),(36,'Flash',16,'flash',0,'y'),(37,'3D-Max',17,'3d',0,'y'),(38,'时装设计',18,'design',0,'y'),(39,'拉丁舞',22,'dance',0,'y'),(40,'机械舞',22,'dance',0,'y'),(41,'美声',21,'voice,music',0,'y'),(42,'合唱',21,'voice,music',0,'y'),(43,'大提琴',20,'music',0,'y'),(44,'小提琴',20,'music',0,'y'),(45,'小品',19,'fun',0,'y'),(46,'现场主持',19,'fun',0,'y'),(47,'书法',24,'art',0,'y'),(48,'素描',23,'art',0,'y'),(49,'油彩',23,'art',0,'y'),(50,'orz',1,'orz',1,'y'),(51,'hhh',12,'hhh',1,'y'),(52,'fsdkjfhskj',13,'fsdkjfhskj',1,'y'),(53,'发士大夫',19,'发士大夫',1,'y'),(54,'的十大首富',22,'的十大首富',1,'y'),(55,'法撒旦',21,'法撒旦',1,'y'),(56,'浮点数',1,'浮点数',1,'y'),(57,'华哥',7,'华哥',1,'y'),(58,'发射点法',1,'发射点法',1,'2');
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academy`
--

LOCK TABLES `academy` WRITE;
/*!40000 ALTER TABLE `academy` DISABLE KEYS */;
INSERT INTO `academy` VALUES (0,'地理科学学院'),(1,'生态与环境科学学院'),(2,'城市与区域科学学院 '),(3,'河口海岸科学研究院'),(4,'教育学部'),(5,'经济学院'),(6,'工商管理学院'),(7,'公共管理学院'),(8,'统计学院'),(9,'国际航运物流研究院'),(10,'人文社会科学学院 '),(11,'社会发展学院'),(12,'外语学院 '),(13,'对外汉语学院'),(14,'心理与认知科学学院'),(15,'体育与健康学院 '),(16,'传播学院 '),(17,'艺术学院'),(18,'设计学院'),(19,'理工学院'),(20,'化学与分子工程学院'),(21,'生命科学学院'),(22,'信息科学技术学院'),(23,'计算机科学与软件工程学院'),(24,'思勉人文高等研究院'),(25,'国际关系与地区发展研究院'),(26,'精密光谱科学与技术国家重点实验室'),(27,'城市发展研究院'),(28,'艺术研究所'),(29,'孟宪承书院'),(30,'东方房地产学院');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competition_main`
--

LOCK TABLES `competition_main` WRITE;
/*!40000 ALTER TABLE `competition_main` DISABLE KEYS */;
INSERT INTO `competition_main` VALUES (9,'10112110128,10112110129',1,'已结束','省市二等奖','2015-10-06','于天','测试','3'),(10,'10112110128,10112110129',1,'审批未通过','全国一等奖','2015-10-06','于天','范德萨发挖人我卡了金融了哇ur穷清热 ','艺术学院');
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
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (0,'地理信息科学系',0),(1,'地理科学系',0),(2,'其他',0),(3,'环境科学系',1),(4,'环境工程系',1),(5,'生态学系',1),(6,'环境生态工程系',1),(7,'其他',1),(8,'人文地理与城乡规划系',2),(9,'其他',2),(10,'其他',3),(11,'教育学系',4),(12,'课程与教学系',4),(13,'教育信息技术学系',4),(14,'教育管理系',4),(15,'学前教育学系',4),(16,'特殊教育学系',4),(17,'教育康复学系',4),(18,'教育心理学系',4),(19,'艺术教育部',4),(20,'高职部',4),(21,'基础教育改革与发展研究所',4),(22,'课程与教学研究所',4),(23,'国际与比较教育研究所',4),(24,'高等教育研究所',4),(25,'职业教育与成人教育研究所',4),(26,'教育经济研究所',4),(27,'国家教育宏观政策研究院',4),(28,'开放教育学院',4),(29,'上海教师发展学院',4),(30,'教师教育学院',4),(31,'上海终身教育研究院',4),(32,'教育高等研究院',4),(33,'考试与评价研究院',4),(34,'教育部中学校长培训中心',4),(35,'上海数字化教育装备工程技术研究中心',4),(36,'上海市特殊教育资源中心',4),(37,'言语听觉科学教育部重点实验室',4),(38,'金融学系',5),(39,'经济学系',5),(40,'风险管理与保险系',5),(41,'国际经济与贸易系',5),(42,'金融工程系',5),(43,'会计学系',6),(44,'企业管理系',6),(45,'旅游学系',6),(46,'信息管理系',6),(47,'房地产管理系',6),(48,'会展管理系',6),(49,'行政管理系',7),(50,'统计学系',8),(51,'其他',9),(52,'中国语言文学系',10),(53,'历史学系',10),(54,'哲学系',10),(55,'政治学系',10),(56,'法律系',10),(57,'社会科学部',10),(58,'古籍研究所',10),(59,'社会学系',11),(60,'社会工作系',11),(61,'人口研究所',11),(62,'民俗学研究所',11),(63,'人类学研究所',11),(64,'英语系',12),(65,'日语系',12),(66,'法语系',12),(67,'德语系',12),(68,'俄语系',12),(69,'翻译系',12),(70,'大学英语教学部',12),(71,'汉语言系',13),(72,'对外汉语系',13),(73,'汉语文化教学中心',13),(74,'心理学系',14),(75,'应用心理学系',14),(76,'发展与教育心理学研究所',14),(77,'认知神经科学研究所',14),(78,'运动学系',15),(79,'体育教育系',15),(80,'社会体育系',15),(81,'大学体育教学部 ',15),(82,'广播电视学系',16),(83,'新闻学系',16),(84,'传播学系',16),(85,'美术学系',17),(86,'音乐学系',17),(87,'其他',18),(88,'数学系',19),(89,'物理学系',19),(90,'化学系',20),(91,'上海市绿色化学与化工过程绿色化重点实验室',20),(92,'上海分子治疗与新药创制工程技术研究中心',20),(93,'生物学系',21),(94,'生命医学系',21),(95,'生命医学研究所',21),(96,'脑功能基因组学研究所',21),(97,'电子工程系',22),(98,'通信工程系',22),(99,'计算机科学技术系',23),(100,'软件科学与技术系',23),(101,'数据科学与工程系',23),(102,'嵌入式软件与系统系',23),(103,'密码与网络安全系',23),(104,'计算中心',23),(105,'其他',24),(106,'其他',25),(107,'其他',26),(108,'其他',27),(109,'其他',28),(110,'中文系',29),(111,'英语系',29),(112,'政治学系',29),(113,'历史学系',29),(114,'数学系',29),(115,'物理学系',29),(116,'化学系',29),(117,'生物系',29),(118,'地理系',29),(119,'体育系',29),(120,'音乐学系',29),(121,'美术学系',29),(122,'其他',30);
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
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `major`
--

LOCK TABLES `major` WRITE;
/*!40000 ALTER TABLE `major` DISABLE KEYS */;
INSERT INTO `major` VALUES (0,'地理科学专业（基地）',0),(1,'地理信息科学专业',1),(2,'自然地理学',2),(3,'气象学',2),(4,'课程与教学论',2),(5,'学科教学',2),(6,'环境科学专业',3),(7,'环境工程专业',4),(8,'生态学专业',5),(9,'环境生态工程专业',6),(10,'生态学',7),(11,'环境工程',7),(12,'环境科学',7),(13,'人文地理与城乡规划',8),(14,'人文地理学',9),(15,'区域经济学',9),(16,'教育原理',11),(17,'教育史',11),(18,'教育政策学',11),(19,'教育文化与社会',11),(20,'比较教育学',12),(21,'课程与教学论',12),(22,'学科教学（语文）',12),(23,'学科教学（数学）',12),(24,'学科教学（英语）',12),(25,'科学与技术教育',12),(26,'教育技术学',13),(27,'公共事业管理',14),(28,'学前教育',15),(29,'特殊教育',16),(30,'教育康复',17),(31,'教育心理学',18),(32,'艺术教育',19),(33,'金融学',38),(34,'经济学',39),(35,'保险',40),(36,'国际经济与贸易',41),(37,'金融工程',42),(38,'会计学',43),(39,'工商管理',44),(40,'旅游管理',45),(41,'信息管理与信息系统',46),(42,'房地产开发与管理',47),(43,'会展经济与管理',48),(44,'行政管理',49),(45,'人力资源管理',49),(46,'统计学',50),(47,'经济统计学',50),(48,'汉语言文学',52),(49,'中国古代文学',52),(50,'中国现当代文学',52),(51,'汉语言文字学',52),(52,'比较文学与世界文学',52),(53,'语言学及应用语言学',52),(54,'文艺学',52),(55,'学科教学（语文）',52),(56,'历史学',53),(57,'哲学',54),(58,'公共关系学',55),(59,'政治学与行政学',55),(60,'法学',56),(61,'社会学',59),(62,'社会工作',60),(63,'英语',64),(64,'日语',65),(65,'法语',66),(66,'德语',67),(67,'西班牙语',67),(68,'俄语',68),(69,'翻译',69),(70,'汉语言',71),(71,'商务汉语',71),(72,'国际商务汉英双语',71),(73,'国际商务汉日双语',71),(74,'汉语国际教育',72),(75,'心理学',74),(76,'应用心理学',75),(77,'运动学',78),(78,'体育教育',79),(79,'社会体育',80),(80,'广播电视编导',82),(81,'播音与主持艺术',82),(82,'新闻学',83),(83,'广告学',83),(84,'编辑出版学',84),(85,'传媒文化教研室',84),(86,'绘画专业中国画',85),(87,'绘画专业油画',85),(88,'绘画专业观念形态',85),(89,'绘画专业综合绘画',85),(90,'雕塑与公共艺术',85),(91,'美术教育',85),(92,'继续教育',85),(93,'艺术理论',85),(94,'声乐',86),(95,'钢琴',86),(96,'指挥',86),(97,'管弦乐教研室',86),(98,'音乐理论',86),(99,'视觉传达',87),(100,'产品设计',87),(101,'环境设计',87),(102,'公共艺术',87),(103,'时尚设计',87),(104,'成人教育',87),(108,'数学与应用数学',88),(109,'信息与计算科学',88),(110,'物理学理科基地班',89),(111,'电子科学与技术',89),(112,'应用化学',90),(113,'生物科学',93),(114,'生物技术',93),(115,'生命医学',94),(116,'微电子学与固体电子学专业',97),(117,'电子信息科学与技术',97),(118,'通信工程',98),(119,'计算机科学与技术',99),(120,'软件科学与技术',100),(121,'数据科学与工程',101),(122,'嵌入式软件与系统',102),(123,'密码与网络安全',103),(124,'汉语言文学',110),(125,'英语',111),(126,'思想政治教育',112),(127,'历史学',113),(128,'数学与应用数学',114),(129,'物理学',115),(130,'化学',116),(131,'生物科学',117),(132,'地理科学',118),(133,'体育教育',119),(134,'音乐学',120),(135,'美术学',121);
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
INSERT INTO `tiaozhan_info` VALUES (9,'测试','A1','B1','B1A','10112110128','10112110129',NULL,NULL,NULL,NULL,1,1,'于天','男',22,'','','','','','男男女女','男',22,'','','','','','范德萨','额外人','314','51','','','521','521','521',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'范德萨发挖人我卡了金融了哇ur穷清热 ','A1','B2','B2A','10112110128','10112110129',NULL,NULL,NULL,NULL,1,1,'发的萨菲','男',55,'范德萨','','','','','发','男',44,'','','','','','','','','','','','','','','发生大风','','','','','人哇认为','发的萨菲','',NULL,'on',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'on',NULL,NULL,NULL,NULL,NULL,'','','','lab','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','');
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_base`
--

LOCK TABLES `user_base` WRITE;
/*!40000 ALTER TABLE `user_base` DISABLE KEYS */;
INSERT INTO `user_base` VALUES (1,'a','1','1',NULL,'1992-07-21'),(2,'testECNU','cc03e747a6afbbcbf8be7668acfebee5','custom','2015-09-22','2015-10-24'),(3,'phphhp','64528858aa8a3ba872964006190f7696','custom','2015-09-23','2015-09-26'),(4,'phphhpf','64528858aa8a3ba872964006190f7696','custom','2015-09-24',NULL),(5,'phphhp4','64528858aa8a3ba872964006190f7696','custom','2015-09-24','2015-09-26'),(6,'adminECNU','cc03e747a6afbbcbf8be7668acfebee5','admin','2015-09-24','2015-10-16'),(7,'adminIT','cc03e747a6afbbcbf8be7668acfebee5','admin','2015-09-24','2015-10-04'),(8,'testECNU523','cc03e747a6afbbcbf8be7668acfebee5','custom','2015-10-05',NULL),(9,'testECNU52','cc03e747a6afbbcbf8be7668acfebee5','custom','2015-10-05',NULL),(10,'3dktlsyt','64528858aa8a3ba872964006190f7696','custom','2015-10-07',NULL),(11,'3dktlsyt33','092fcddf8e7e11afdb4036936f06739e','custom','2015-10-07',NULL),(12,'3jklsaj','092fcddf8e7e11afdb4036936f06739e','custom','2015-10-07',NULL),(13,'3dkltsyt','64528858aa8a3ba872964006190f7696','custom','2015-10-07',NULL),(14,'3dkltsyt3','64528858aa8a3ba872964006190f7696','custom','2015-10-07',NULL),(15,'3dktlsytfdsa','64528858aa8a3ba872964006190f7696','custom','2015-10-07',NULL),(16,'3dktlsytyt','64528858aa8a3ba872964006190f7696','custom','2015-10-07',NULL),(17,'3dkltsytttt','64528858aa8a3ba872964006190f7696','custom','2015-10-07',NULL),(18,'fuckname','64528858aa8a3ba872964006190f7696','custom','2015-10-07',NULL),(19,'damnit','64528858aa8a3ba872964006190f7696','custom','2015-10-07',NULL),(20,'helloworld','64528858aa8a3ba872964006190f7696','custom','2015-10-07','2015-10-07'),(21,'fdsald','64528858aa8a3ba872964006190f7696','custom','2015-10-07',NULL),(22,'3dkltsytfsd','64528858aa8a3ba872964006190f7696','custom','2015-10-07',NULL);
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
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `id_UNIQUE` (`user_id`),
  UNIQUE KEY `studentID_UNIQUE` (`student_id`),
  CONSTRAINT `fk_userid_custom` FOREIGN KEY (`user_id`) REFERENCES `user_base` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_custom`
--

LOCK TABLES `user_custom` WRITE;
/*!40000 ALTER TABLE `user_custom` DISABLE KEYS */;
INSERT INTO `user_custom` VALUES (2,'305605080@qqq.com','18021051036','你好','于天','2','1','3','研一','男','你好，我是简介，啦啦烦烦得到的烦得到的fff ','10112110128',11,'专业型硕士','闵行校区',0),(3,'tian_yu92@yahoo.com','18021051037',' 地方撒','于天','通信工程系','信息学院','电子信息科学与技术','大四','男',NULL,'10112110129',11,'博士','闵行校区',NULL),(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'专业型硕士','中山北路校区',NULL),(5,'tian_yu92@yahoo.co','18888888888','554','你好地方','计算机系','信息学院','计算机工程','研二','男','方式','10112140125',11,'学术型硕士','中山北路校区',NULL),(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(20,'305605080@qq.com','214124213','14dfs','于天','3','2','4','研一','男','fsdafs','10112111518',11,'学术型硕士','闵行校区',NULL),(21,'214166945@qq.com','124314215','富士达','于天','7','4','16','研三','男','','10112110126',11,'专业型硕士','中山北路校区',NULL),(22,'2141669452@qq.com','21415156','fdsaf','哈哈','3','2','4','研二','男','','10115442132',11,'专业型硕士','闵行校区',NULL);
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
  `selfComment` varchar(200) DEFAULT '这个人很懒，啥都没说~',
  PRIMARY KEY (`id`,`User_id`,`Ability_id`,`Ability_name`),
  KEY `fk_User_has_Ability_Ability1_idx` (`Ability_id`,`Ability_name`),
  KEY `fk_User_has_Ability_User1_idx` (`User_id`),
  CONSTRAINT `fk_User_has_Ability_Ability1` FOREIGN KEY (`Ability_id`, `Ability_name`) REFERENCES `ability` (`id`, `name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Ability_User1` FOREIGN KEY (`User_id`) REFERENCES `user_custom` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_ability`
--

LOCK TABLES `user_has_ability` WRITE;
/*!40000 ALTER TABLE `user_has_ability` DISABLE KEYS */;
INSERT INTO `user_has_ability` VALUES (8,2,1,'javascript','i love js'),(9,2,4,'php','i love php'),(10,2,11,'iOS开发','i love iOS'),(11,2,36,'Flash','flash~~~~'),(15,2,9,'VisualStudio','vs'),(17,2,3,'UI设计','fdsafsaf'),(18,2,51,'hhh','fafasdf'),(19,2,52,'fsdkjfhskj','fjdklsjkfjkfjsk'),(20,2,53,'发士大夫','放大放大撒'),(21,2,54,'的十大首富','发士大夫'),(22,2,55,'法撒旦','发售'),(23,2,56,'浮点数','房贷首付'),(24,2,2,'css','我好屌'),(25,2,57,'华哥','TI'),(26,2,50,'orz','凡地方撒'),(27,2,58,'发射点法','这个人很懒，啥都没说~');
/*!40000 ALTER TABLE `user_has_ability` ENABLE KEYS */;
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

-- Dump completed on 2015-10-26 20:50:18
