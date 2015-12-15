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
  CONSTRAINT `fk_Ability_Direction` FOREIGN KEY (`Direction_id`) REFERENCES `direction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=302 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ability`
--

LOCK TABLES `ability` WRITE;
/*!40000 ALTER TABLE `ability` DISABLE KEYS */;
INSERT INTO `ability` VALUES (1,'美术学',1,',美术学,美术学,艺术,',0,'y'),(2,'绘画',1,',绘画,美术学,艺术,',0,'y'),(3,'雕塑',1,',雕塑,美术学,艺术,',0,'y'),(4,'摄影',1,',摄影,美术学,艺术,',0,'y'),(5,'视觉传达设计',2,',视觉传达设计,设计学,艺术,',0,'y'),(6,'数字媒体艺术',2,',数字媒体艺术,设计学,艺术,',0,'y'),(7,'环境艺术设计',2,',环境艺术设计,设计学,艺术,',0,'y'),(8,'公共艺术',2,',公共艺术,设计学,艺术,',0,'y'),(9,'工艺美术',2,',工艺美术,设计学,艺术,',0,'y'),(10,'服装与服饰设计',2,',服装与服饰设计,设计学,艺术,',0,'y'),(11,'音乐表演',3,',音乐表演,音乐与舞蹈,艺术,',0,'y'),(12,'乐器',3,',乐器,音乐与舞蹈,艺术,',0,'y'),(13,'作曲',3,',作曲,音乐与舞蹈,艺术,',0,'y'),(14,'作词',3,',作词,音乐与舞蹈,艺术,',0,'y'),(15,'舞蹈',3,',舞蹈,音乐与舞蹈,艺术,',0,'y'),(16,'舞蹈编导',3,',舞蹈编导,音乐与舞蹈,艺术,',0,'y'),(17,'广播电视编导',4,',广播电视编导,戏剧与影视学,艺术,',0,'y'),(18,'戏剧影视导演',4,',戏剧影视导演,戏剧与影视学,艺术,',0,'y'),(19,'动画',4,',动画,戏剧与影视学,艺术,',0,'y'),(20,'表演',4,',表演,戏剧与影视学,艺术,',0,'y'),(21,'戏剧',4,',戏剧,戏剧与影视学,艺术,',0,'y'),(22,'播音主持',4,',播音主持,戏剧与影视学,艺术,',0,'y'),(23,'公关礼仪',4,',公关礼仪,戏剧与影视学,艺术,',0,'y'),(24,'电影学',4,',电影学,戏剧与影视学,艺术,',0,'y'),(25,'录音艺术',4,',录音艺术,戏剧与影视学,艺术,',0,'y'),(26,'中国语言文学类',5,',中国语言文学类,语言学,人文社科类,',0,'y'),(27,'外国语言文学类',5,',外国语言文学类,语言学,人文社科类,',0,'y'),(28,'新闻学',6,',新闻学,新闻传播学类,人文社科类,',0,'y'),(29,'广播电视学',6,',广播电视学,新闻传播学类,人文社科类,',0,'y'),(30,'广告学',6,',广告学,新闻传播学类,人文社科类,',0,'y'),(31,'传播学',6,',传播学,新闻传播学类,人文社科类,',0,'y'),(32,'编辑出版学',6,',编辑出版学,新闻传播学类,人文社科类,',0,'y'),(33,'哲学',7,',哲学,哲学类,人文社科类,',0,'y'),(34,'逻辑学',7,',逻辑学,哲学类,人文社科类,',0,'y'),(35,'宗教学',7,',宗教学,哲学类,人文社科类,',0,'y'),(36,'科学社会主义',8,',科学社会主义,马克思主义理论类,人文社科类,',0,'y'),(37,'中国共产党历史',8,',中国共产党历史,马克思主义理论类,人文社科类,',0,'y'),(38,'思想政治教育',8,',思想政治教育,马克思主义理论类,人文社科类,',0,'y'),(39,'历史学',9,',历史学,历史学,人文社科类,',0,'y'),(40,'世界史',9,',世界史,历史学,人文社科类,',0,'y'),(41,'考古学',9,',考古学,历史学,人文社科类,',0,'y'),(42,'文物与博物馆学',9,',文物与博物馆学,历史学,人文社科类,',0,'y'),(43,'Web前台',10,',Web前台,网页开发,信息科学技术,',0,'y'),(44,'Web后台',10,',Web后台,网页开发,信息科学技术,',0,'y'),(45,'Word',11,',Word,Office,信息科学技术,',0,'y'),(46,'Excel',11,',Excel,Office,信息科学技术,',0,'y'),(47,'PPT',11,',PPT,Office,信息科学技术,',0,'y'),(48,'SQL Server',12,',SQL Server,数据库,信息科学技术,',0,'y'),(49,'mySQL',12,',mySQL,数据库,信息科学技术,',0,'y'),(50,'Oracle',12,',Oracle,数据库,信息科学技术,',0,'y'),(51,'单片机',13,',单片机,嵌入式,信息科学技术,',0,'y'),(52,'ARM',13,',ARM,嵌入式,信息科学技术,',0,'y'),(53,'FPGA',13,',FPGA,嵌入式,信息科学技术,',0,'y'),(54,'PCB设计',14,',PCB设计,电路设计,信息科学技术,',0,'y'),(55,'模拟电路设计',14,',模拟电路设计,电路设计,信息科学技术,',0,'y'),(56,'数字电路设计',14,',数字电路设计,电路设计,信息科学技术,',0,'y'),(57,'语音识别与处理',15,',语音识别与处理,算法,信息科学技术,',0,'y'),(58,'视频处理算法',15,',视频处理算法,算法,信息科学技术,',0,'y'),(59,'通用数字信号处理',15,',通用数字信号处理,算法,信息科学技术,',0,'y'),(60,'图形图像处理',15,',图形图像处理,算法,信息科学技术,',0,'y'),(61,'机器学习',15,',机器学习,算法,信息科学技术,',0,'y'),(62,'搜索算法',15,',搜索算法,算法,信息科学技术,',0,'y'),(63,'数据挖掘',15,',数据挖掘,算法,信息科学技术,',0,'y'),(64,'iOS开发',16,',iOS开发,移动平台开发,信息科学技术,',0,'y'),(65,'Android开发',16,',Android开发,移动平台开发,信息科学技术,',0,'y'),(66,'WindowsPhone开发',16,',WindowsPhone开发,移动平台开发,信息科学技术,',0,'y'),(67,'跨平台开发',16,',跨平台开发,移动平台开发,信息科学技术,',0,'y'),(68,'Windows开发',17,',Windows开发,桌面平台开发,信息科学技术,',0,'y'),(69,'Mac开发',17,',Mac开发,桌面平台开发,信息科学技术,',0,'y'),(70,'Linux开发',17,',Linux开发,桌面平台开发,信息科学技术,',0,'y'),(71,'有线传输',18,',有线传输,信息通信,信息科学技术,',0,'y'),(72,'无线通信',18,',无线通信,信息通信,信息科学技术,',0,'y'),(73,'电信交换',18,',电信交换,信息通信,信息科学技术,',0,'y'),(74,'船舶与海洋技术',19,',船舶与海洋技术,海洋工程类,轻、重工业,',0,'y'),(75,'海洋工程与技术',19,',海洋工程与技术,海洋工程类,轻、重工业,',0,'y'),(76,'海洋资源开发技术',19,',海洋资源开发技术,海洋工程类,轻、重工业,',0,'y'),(77,'轻化工程',20,',轻化工程,轻工类,轻、重工业,',0,'y'),(78,'包装工程',20,',包装工程,轻工类,轻、重工业,',0,'y'),(79,'印刷工程',20,',印刷工程,轻工类,轻、重工业,',0,'y'),(80,'航空航天工程',21,',航空航天工程,航空航天类,轻、重工业,',0,'y'),(81,'飞行器设计与工程',21,',飞行器设计与工程,航空航天类,轻、重工业,',0,'y'),(82,'飞行器制造工程',21,',飞行器制造工程,航空航天类,轻、重工业,',0,'y'),(83,'飞行器动力工程',21,',飞行器动力工程,航空航天类,轻、重工业,',0,'y'),(84,'飞行器环境与生命保障工程',21,',飞行器环境与生命保障工程,航空航天类,轻、重工业,',0,'y'),(85,'飞行器适航技术',21,',飞行器适航技术,航空航天类,轻、重工业,',0,'y'),(86,'旅游管理',22,',旅游管理,旅游管理类,管理学,',0,'y'),(87,'酒店管理',22,',酒店管理,旅游管理类,管理学,',0,'y'),(88,'会展经济与管理',22,',会展经济与管理,旅游管理类,管理学,',0,'y'),(89,'旅游管理与服务教育',22,',旅游管理与服务教育,旅游管理类,管理学,',0,'y'),(90,'市场营销',23,',市场营销,工商管理类,管理学,',0,'y'),(91,'会计学',23,',会计学,工商管理类,管理学,',0,'y'),(92,'财务管理',23,',财务管理,工商管理类,管理学,',0,'y'),(93,'国际商务',23,',国际商务,工商管理类,管理学,',0,'y'),(94,'人力资源管理',23,',人力资源管理,工商管理类,管理学,',0,'y'),(95,'审计学',23,',审计学,工商管理类,管理学,',0,'y'),(96,'资产评估',23,',资产评估,工商管理类,管理学,',0,'y'),(97,'物业管理',23,',物业管理,工商管理类,管理学,',0,'y'),(98,'文化产业管理',23,',文化产业管理,工商管理类,管理学,',0,'y'),(99,'劳动关系',23,',劳动关系,工商管理类,管理学,',0,'y'),(100,'体育经济与管理',23,',体育经济与管理,工商管理类,管理学,',0,'y'),(101,'财务会计教育',23,',财务会计教育,工商管理类,管理学,',0,'y'),(102,'市场营销教育',23,',市场营销教育,工商管理类,管理学,',0,'y'),(103,'公共事业管理',24,',公共事业管理,公共管理类,管理学,',0,'y'),(104,'行政管理',24,',行政管理,公共管理类,管理学,',0,'y'),(105,'劳动与社会保障',24,',劳动与社会保障,公共管理类,管理学,',0,'y'),(106,'土地资源管理',24,',土地资源管理,公共管理类,管理学,',0,'y'),(107,'城市管理',24,',城市管理,公共管理类,管理学,',0,'y'),(108,'海关管理',24,',海关管理,公共管理类,管理学,',0,'y'),(109,'交通管理',24,',交通管理,公共管理类,管理学,',0,'y'),(110,'海事管理',24,',海事管理,公共管理类,管理学,',0,'y'),(111,'公共关系学',24,',公共关系学,公共管理类,管理学,',0,'y'),(112,'管理科学',25,',管理科学,管理科学与工程类,管理学,',0,'y'),(113,'信息管理与信息系统',25,',信息管理与信息系统,管理科学与工程类,管理学,',0,'y'),(114,'工程管理',25,',工程管理,管理科学与工程类,管理学,',0,'y'),(115,'房地产开发与管理',25,',房地产开发与管理,管理科学与工程类,管理学,',0,'y'),(116,'工程造价',25,',工程造价,管理科学与工程类,管理学,',0,'y'),(117,'保密管理',25,',保密管理,管理科学与工程类,管理学,',0,'y'),(118,'图书馆学',26,',图书馆学,图书情报与档案管理类,管理学,',0,'y'),(119,'档案学',26,',档案学,图书情报与档案管理类,管理学,',0,'y'),(120,'信息资源管理',26,',信息资源管理,图书情报与档案管理类,管理学,',0,'y'),(121,'物流管理',27,',物流管理,物流管理与工程类,管理学,',0,'y'),(122,'工业工程',27,',工业工程,物流管理与工程类,管理学,',0,'y'),(123,'采购管理',27,',采购管理,物流管理与工程类,管理学,',0,'y'),(124,'标准化工程',27,',标准化工程,物流管理与工程类,管理学,',0,'y'),(125,'质量管理工程',27,',质量管理工程,物流管理与工程类,管理学,',0,'y'),(126,'电子商务',28,',电子商务,电子商务类,管理学,',0,'y'),(127,'电子商务及法律',28,',电子商务及法律,电子商务类,管理学,',0,'y'),(128,'财政学',29,',财政学,财政学类,经济学,',0,'y'),(129,'税收学',29,',税收学,财政学类,经济学,',0,'y'),(130,'国际经济与贸易',30,',国际经济与贸易,经济与贸易类,经济学,',0,'y'),(131,'贸易经济',30,',贸易经济,经济与贸易类,经济学,',0,'y'),(132,'经济学',31,',经济学,经济学类,经济学,',0,'y'),(133,'经济统计学',31,',经济统计学,经济学类,经济学,',0,'y'),(134,'金融学',32,',金融学,金融学类,经济学,',0,'y'),(135,'金融工程',32,',金融工程,金融学类,经济学,',0,'y'),(136,'保险学',32,',保险学,金融学类,经济学,',0,'y'),(137,'投资学',32,',投资学,金融学类,经济学,',0,'y'),(138,'地质工程',33,',地质工程,地质类,土木工程与建筑,',0,'y'),(139,'勘查技术与工程',33,',勘查技术与工程,地质类,土木工程与建筑,',0,'y'),(140,'资源勘查工程',33,',资源勘查工程,地质类,土木工程与建筑,',0,'y'),(141,'地下水科学与工程',33,',地下水科学与工程,地质类,土木工程与建筑,',0,'y'),(142,'测绘工程',34,',测绘工程,测绘类,土木工程与建筑,',0,'y'),(143,'遥感科学与技术',34,',遥感科学与技术,测绘类,土木工程与建筑,',0,'y'),(144,'导航工程',34,',导航工程,测绘类,土木工程与建筑,',0,'y'),(145,'地理国情监测',34,',地理国情监测,测绘类,土木工程与建筑,',0,'y'),(146,'水利水电工程',35,',水利水电工程,水利类,土木工程与建筑,',0,'y'),(147,'水文与水资源工程',35,',水文与水资源工程,水利类,土木工程与建筑,',0,'y'),(148,'港口航道与海岸工程',35,',港口航道与海岸工程,水利类,土木工程与建筑,',0,'y'),(149,'历史建筑保护工程',36,',历史建筑保护工程,建筑类,土木工程与建筑,',0,'y'),(150,'建筑结构',36,',建筑结构,建筑类,土木工程与建筑,',0,'y'),(151,'建筑测绘',36,',建筑测绘,建筑类,土木工程与建筑,',0,'y'),(152,'建筑学',36,',建筑学,建筑类,土木工程与建筑,',0,'y'),(153,'城乡规划',36,',城乡规划,建筑类,土木工程与建筑,',0,'y'),(154,'风景园林',36,',风景园林,建筑类,土木工程与建筑,',0,'y'),(155,'土木工程',37,',土木工程,土木类,土木工程与建筑,',0,'y'),(156,'建筑环境与能源应用工程',37,',建筑环境与能源应用工程,土木类,土木工程与建筑,',0,'y'),(157,'给排水科学与工程',37,',给排水科学与工程,土木类,土木工程与建筑,',0,'y'),(158,'建筑电气与智能化',37,',建筑电气与智能化,土木类,土木工程与建筑,',0,'y'),(159,'城市地下空间工程',37,',城市地下空间工程,土木类,土木工程与建筑,',0,'y'),(160,'道路桥梁与渡河工程',37,',道路桥梁与渡河工程,土木类,土木工程与建筑,',0,'y'),(161,'农业资源与环境',38,',农业资源与环境,自然保护与环境生态类,农学,',0,'y'),(162,'野生动物与自然保护区管理',38,',野生动物与自然保护区管理,自然保护与环境生态类,农学,',0,'y'),(163,'水土保持与荒漠化防治',38,',水土保持与荒漠化防治,自然保护与环境生态类,农学,',0,'y'),(164,'动物医学',39,',动物医学,动物医学类,农学,',0,'y'),(165,'动物药学',39,',动物药学,动物医学类,农学,',0,'y'),(166,'水产养殖学',40,',水产养殖学,水产类,农学,',0,'y'),(167,'海洋渔业科学与技术',40,',海洋渔业科学与技术,水产类,农学,',0,'y'),(168,'林学',41,',林学,林学类,农学,',0,'y'),(169,'园林',41,',园林,林学类,农学,',0,'y'),(170,'森林保护',41,',森林保护,林学类,农学,',0,'y'),(171,'农学',42,',农学,植物生产类,农学,',0,'y'),(172,'园艺',42,',园艺,植物生产类,农学,',0,'y'),(173,'植物保护',42,',植物保护,植物生产类,农学,',0,'y'),(174,'植物科学与技术',42,',植物科学与技术,植物生产类,农学,',0,'y'),(175,'种子科学与工程',42,',种子科学与工程,植物生产类,农学,',0,'y'),(176,'设施农业科学与工程',42,',设施农业科学与工程,植物生产类,农学,',0,'y'),(177,'动物科学',43,',动物科学,动物生产类,农学,',0,'y'),(178,'宝石及材料工艺学',44,',宝石及材料工艺学,材料科学与工程,材料工程,',0,'y'),(179,'金属材料工程',44,',金属材料工程,材料科学与工程,材料工程,',0,'y'),(180,'无机非金属材料工程',44,',无机非金属材料工程,材料科学与工程,材料工程,',0,'y'),(181,'高分子材料与工程',44,',高分子材料与工程,材料科学与工程,材料工程,',0,'y'),(182,'复合材料与工程',44,',复合材料与工程,材料科学与工程,材料工程,',0,'y'),(183,'纳米材料与技术',44,',纳米材料与技术,材料科学与工程,材料工程,',0,'y'),(184,'新能源材料与器件',44,',新能源材料与器件,材料科学与工程,材料工程,',0,'y'),(185,'材料物理',45,',材料物理,材料学,材料工程,',0,'y'),(186,'材料化学',45,',材料化学,材料学,材料工程,',0,'y'),(187,'化学制药',46,',化学制药,化学,理学,',0,'y'),(188,'化学成分分析',46,',化学成分分析,化学,理学,',0,'y'),(189,'天文学',48,',天文学,地理,理学,',0,'y'),(190,'自然地理与资源环境',48,',自然地理与资源环境,地理,理学,',0,'y'),(191,'人文地理与城乡规划',48,',人文地理与城乡规划,地理,理学,',0,'y'),(192,'地理信息科学',48,',地理信息科学,地理,理学,',0,'y'),(193,'大气科学',48,',大气科学,地理,理学,',0,'y'),(194,'地球物理学',48,',地球物理学,地理,理学,',0,'y'),(195,'空间科学与技术',48,',空间科学与技术,地理,理学,',0,'y'),(196,'生物科学',49,',生物科学,生物,理学,',0,'y'),(197,'生物技术',49,',生物技术,生物,理学,',0,'y'),(198,'生物信息学',49,',生物信息学,生物,理学,',0,'y'),(199,'生态学',49,',生态学,生物,理学,',0,'y'),(200,'遗传学',49,',遗传学,生物,理学,',0,'y'),(201,'分子生物学',49,',分子生物学,生物,理学,',0,'y'),(202,'生物制药',49,',生物制药,生物,理学,',0,'y'),(203,'数学建模',50,',数学建模,数学,理学,',0,'y'),(204,'力学',52,',力学,物理,理学,',0,'y'),(205,'光学',52,',光学,物理,理学,',0,'y'),(206,'热学',52,',热学,物理,理学,',0,'y'),(207,'电磁学',52,',电磁学,物理,理学,',0,'y'),(208,'原子学',52,',原子学,物理,理学,',0,'y'),(209,'固体物理学',52,',固体物理学,物理,理学,',0,'y'),(210,'跳高',53,',跳高,田赛,体育,',0,'y'),(211,'跳远',53,',跳远,田赛,体育,',0,'y'),(212,'投掷',53,',投掷,田赛,体育,',0,'y'),(213,'体育教育',54,',体育教育,体育学类,体育,',0,'y'),(214,'运动训练',54,',运动训练,体育学类,体育,',0,'y'),(215,'社会体育指导与管理',54,',社会体育指导与管理,体育学类,体育,',0,'y'),(216,'武术与民族传统体育',54,',武术与民族传统体育,体育学类,体育,',0,'y'),(217,'运动人体科学',54,',运动人体科学,体育学类,体育,',0,'y'),(218,'篮球',55,',篮球,球类,体育,',0,'y'),(219,'足球',55,',足球,球类,体育,',0,'y'),(220,'排球',55,',排球,球类,体育,',0,'y'),(221,'乒乓球',55,',乒乓球,球类,体育,',0,'y'),(222,'网球',55,',网球,球类,体育,',0,'y'),(223,'棒球',55,',棒球,球类,体育,',0,'y'),(224,'羽毛球',55,',羽毛球,球类,体育,',0,'y'),(225,'短跑',56,',短跑,径赛,体育,',0,'y'),(226,'中长跑',56,',中长跑,径赛,体育,',0,'y'),(227,'长跑',56,',长跑,径赛,体育,',0,'y'),(228,'马拉松',56,',马拉松,径赛,体育,',0,'y'),(229,'竞走',56,',竞走,径赛,体育,',0,'y'),(230,'射击',57,',射击,其他,体育,',0,'y'),(231,'射箭',57,',射箭,其他,体育,',0,'y'),(232,'旱滑',57,',旱滑,其他,体育,',0,'y'),(233,'游泳',58,',游泳,水上项目,体育,',0,'y'),(234,'跳水',58,',跳水,水上项目,体育,',0,'y'),(235,'中国武术',59,',中国武术,武术,体育,',0,'y'),(236,'跆拳道',59,',跆拳道,武术,体育,',0,'y'),(237,'柔道',59,',柔道,武术,体育,',0,'y'),(238,'空手道',59,',空手道,武术,体育,',0,'y'),(239,'科学教育',60,',科学教育,教育学类,教育,',0,'y'),(240,'人文教育',60,',人文教育,教育学类,教育,',0,'y'),(241,'艺术教育',60,',艺术教育,教育学类,教育,',0,'y'),(242,'学前教育',60,',学前教育,教育学类,教育,',0,'y'),(243,'特殊教育',60,',特殊教育,教育学类,教育,',0,'y'),(244,'政治学与行政学',61,',政治学与行政学,政治学类,法学,',0,'y'),(245,'国际政治',61,',国际政治,政治学类,法学,',0,'y'),(246,'外交学',61,',外交学,政治学类,法学,',0,'y'),(247,'政治学与行政学',61,',政治学与行政学,政治学类,法学,',0,'y'),(248,'国际事务与国际关系',61,',国际事务与国际关系,政治学类,法学,',0,'y'),(249,'政治学、经济学与哲学',61,',政治学、经济学与哲学,政治学类,法学,',0,'y'),(250,'民族学',62,',民族学,民族学类,法学,',0,'y'),(251,'社会学',63,',社会学,社会学类,法学,',0,'y'),(252,'社会工作',63,',社会工作,社会学类,法学,',0,'y'),(253,'人类学',63,',人类学,社会学类,法学,',0,'y'),(254,'女性学',63,',女性学,社会学类,法学,',0,'y'),(255,'家政学',63,',家政学,社会学类,法学,',0,'y'),(256,'科学社会主义',64,',科学社会主义,马克思主义理论类,法学,',0,'y'),(257,'中国共产党历史',64,',中国共产党历史,马克思主义理论类,法学,',0,'y'),(258,'思想政治教育',64,',思想政治教育,马克思主义理论类,法学,',0,'y'),(259,'知识产权',65,',知识产权,法学,法学,',0,'y'),(260,'监狱学',65,',监狱学,法学,法学,',0,'y'),(261,'治安学',66,',治安学,公安学类,法学,',0,'y'),(262,'侦查学',66,',侦查学,公安学类,法学,',0,'y'),(263,'边防管理',66,',边防管理,公安学类,法学,',0,'y'),(264,'禁毒学',66,',禁毒学,公安学类,法学,',0,'y'),(265,'警犬技术',66,',警犬技术,公安学类,法学,',0,'y'),(266,'经济犯罪侦查',66,',经济犯罪侦查,公安学类,法学,',0,'y'),(267,'边防指挥',66,',边防指挥,公安学类,法学,',0,'y'),(268,'消防指挥',66,',消防指挥,公安学类,法学,',0,'y'),(269,'警卫学',66,',警卫学,公安学类,法学,',0,'y'),(270,'公安情报学',66,',公安情报学,公安学类,法学,',0,'y'),(271,'公安管理学',66,',公安管理学,公安学类,法学,',0,'y'),(272,'涉外警务',66,',涉外警务,公安学类,法学,',0,'y'),(273,'国内安全保卫',66,',国内安全保卫,公安学类,法学,',0,'y'),(274,'警务指挥与战术',66,',警务指挥与战术,公安学类,法学,',0,'y'),(275,'能源与环境系统工程',67,',能源与环境系统工程,能源与动力工程,能源与环境,',0,'y'),(276,'新能源科学与工程',67,',新能源科学与工程,能源与动力工程,能源与环境,',0,'y'),(277,'采矿工程',68,',采矿工程,矿业类,能源与环境,',0,'y'),(278,'石油工程',68,',石油工程,矿业类,能源与环境,',0,'y'),(279,'矿物加工工程',68,',矿物加工工程,矿业类,能源与环境,',0,'y'),(280,'油气储运工程',68,',油气储运工程,矿业类,能源与环境,',0,'y'),(281,'矿物资源工程',68,',矿物资源工程,矿业类,能源与环境,',0,'y'),(282,'海洋油气工程',68,',海洋油气工程,矿业类,能源与环境,',0,'y'),(283,'环境科学与工程',69,',环境科学与工程,环境科学与工程类,能源与环境,',0,'y'),(284,'环境工程',69,',环境工程,环境科学与工程类,能源与环境,',0,'y'),(285,'环境生态工程',69,',环境生态工程,环境科学与工程类,能源与环境,',0,'y'),(286,'机械设计制造及其自动化',72,',机械设计制造及其自动化,机械工程,机械与仪器工程,',0,'y'),(287,'材料成型及控制工程',72,',材料成型及控制工程,机械工程,机械与仪器工程,',0,'y'),(288,'机械电子工程',72,',机械电子工程,机械工程,机械与仪器工程,',0,'y'),(289,'过程装备与控制工程',72,',过程装备与控制工程,机械工程,机械与仪器工程,',0,'y'),(290,'车辆工程',72,',车辆工程,机械工程,机械与仪器工程,',0,'y'),(291,'测控技术与仪器',73,',测控技术与仪器,仪器类,机械与仪器工程,',0,'y'),(292,'药学',75,',药学,药学,医学,',0,'y'),(293,'药物制剂',75,',药物制剂,药学,医学,',0,'y'),(294,'护理',76,',护理,医学应用,医学,',0,'y'),(295,'急救',76,',急救,医学应用,医学,',0,'y'),(296,'基础医学',77,',基础医学,医学理论,医学,',0,'y'),(297,'临床医学',77,',临床医学,医学理论,医学,',0,'y'),(298,'口腔医学',77,',口腔医学,医学理论,医学,',0,'y'),(299,'公共卫生与预防',77,',公共卫生与预防,医学理论,医学,',0,'y'),(300,'中医学',77,',中医学,医学理论,医学,',0,'y'),(301,'中西医结合',77,',中西医结合,医学理论,医学,',0,'y');
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
  CONSTRAINT `FK_competition_info` FOREIGN KEY (`comp_type_id`) REFERENCES `competition_info` (`comp_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competition_main`
--

LOCK TABLES `competition_main` WRITE;
/*!40000 ALTER TABLE `competition_main` DISABLE KEYS */;
INSERT INTO `competition_main` VALUES (11,'11111111111,10112110444',1,'审批通过','无相关奖项','2015-10-12','测试姓名','返回','信息科学技术学院'),(12,'11111111113,11111111111',1,'待审批','无相关奖项','2015-12-03','浮点数','嘿嘿嘿','艺术学院'),(13,'11111111113,11111111111,11111111112,11111111114,11111111115,14111111116,10112110444,10112110125',1,'待审批','无相关奖项','2015-12-03','浮点数','3213','艺术学院'),(14,'11111111111,11111111114,11111111115,14111111116,10112110125,10112110444',9,'待审批','无相关奖项','2015-12-03','测试姓名','11111111113','信息科学技术学院');
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
  CONSTRAINT `fk_Department_Academy` FOREIGN KEY (`academy_id`) REFERENCES `academy` (`academy_id`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `fk_Direction_Field1` FOREIGN KEY (`Field_id`) REFERENCES `field` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direction`
--

LOCK TABLES `direction` WRITE;
/*!40000 ALTER TABLE `direction` DISABLE KEYS */;
INSERT INTO `direction` VALUES (1,'美术学',1),(2,'设计学',1),(3,'音乐与舞蹈',1),(4,'戏剧与影视学',1),(5,'语言学',2),(6,'新闻传播学类',2),(7,'哲学类',2),(8,'马克思主义理论类',2),(9,'历史学',2),(10,'网页开发',3),(11,'Office',3),(12,'数据库',3),(13,'嵌入式',3),(14,'电路设计',3),(15,'算法',3),(16,'移动平台开发',3),(17,'桌面平台开发',3),(18,'信息通信',3),(19,'海洋工程类',4),(20,'轻工类',4),(21,'航空航天类',4),(22,'旅游管理类',5),(23,'工商管理类',5),(24,'公共管理类',5),(25,'管理科学与工程类',5),(26,'图书情报与档案管理类',5),(27,'物流管理与工程类',5),(28,'电子商务类',5),(29,'财政学类',6),(30,'经济与贸易类',6),(31,'经济学类',6),(32,'金融学类',6),(33,'地质类',7),(34,'测绘类',7),(35,'水利类',7),(36,'建筑类',7),(37,'土木类',7),(38,'自然保护与环境生态类',8),(39,'动物医学类',8),(40,'水产类',8),(41,'林学类',8),(42,'植物生产类',8),(43,'动物生产类',8),(44,'材料科学与工程',9),(45,'材料学',9),(46,'化学',10),(47,'心理',10),(48,'地理',10),(49,'生物',10),(50,'数学',10),(51,'统计',10),(52,'物理',10),(53,'田赛',11),(54,'体育学类',11),(55,'球类',11),(56,'径赛',11),(57,'其他',11),(58,'水上项目',11),(59,'武术',11),(60,'教育学类',12),(61,'政治学类',13),(62,'民族学类',13),(63,'社会学类',13),(64,'马克思主义理论类',13),(65,'法学',13),(66,'公安学类',13),(67,'能源与动力工程',14),(68,'矿业类',14),(69,'环境科学与工程类',14),(70,'冶金工程',14),(71,'微机电系统工程',15),(72,'机械工程',15),(73,'仪器类',15),(74,'机械工艺技术',15),(75,'药学',16),(76,'医学应用',16),(77,'医学理论',16);
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
  `description` varchar(45) NOT NULL DEFAULT '暂时没有添加描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field`
--

LOCK TABLES `field` WRITE;
/*!40000 ALTER TABLE `field` DISABLE KEYS */;
INSERT INTO `field` VALUES (1,'艺术','暂时没有添加描述'),(2,'人文社科类','暂时没有添加描述'),(3,'信息科学技术','暂时没有添加描述'),(4,'轻、重工业','暂时没有添加描述'),(5,'管理学','暂时没有添加描述'),(6,'经济学','暂时没有添加描述'),(7,'土木与建筑','暂时没有添加描述'),(8,'农学','暂时没有添加描述'),(9,'材料工程','暂时没有添加描述'),(10,'理学','暂时没有添加描述'),(11,'体育','暂时没有添加描述'),(12,'教育','暂时没有添加描述'),(13,'法学','暂时没有添加描述'),(14,'能源与环境','暂时没有添加描述'),(15,'机械与仪器','暂时没有添加描述'),(16,'医学','暂时没有添加描述');
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
  CONSTRAINT `fk_Major_Department` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `tiaozhan_basic_FK1` FOREIGN KEY (`author1_id`) REFERENCES `user_custom` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tiaozhan_basic_FK10` FOREIGN KEY (`comp_id`) REFERENCES `competition_info` (`comp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tiaozhan_basic_FK2` FOREIGN KEY (`author2_id`) REFERENCES `user_custom` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tiaozhan_basic_FK3` FOREIGN KEY (`author3_id`) REFERENCES `user_custom` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tiaozhan_basic_FK4` FOREIGN KEY (`author4_id`) REFERENCES `user_custom` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tiaozhan_basic_FK5` FOREIGN KEY (`author5_id`) REFERENCES `user_custom` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tiaozhan_basic_FK6` FOREIGN KEY (`author6_id`) REFERENCES `user_custom` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tiaozhan_basic_FK9` FOREIGN KEY (`comp_item_id`) REFERENCES `competition_main` (`comp_item_id`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `fk_access_admin` FOREIGN KEY (`access_id`) REFERENCES `academy` (`academy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_userid_admin` FOREIGN KEY (`user_id`) REFERENCES `user_base` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_admin`
--

LOCK TABLES `user_admin` WRITE;
/*!40000 ALTER TABLE `user_admin` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_base`
--

LOCK TABLES `user_base` WRITE;
/*!40000 ALTER TABLE `user_base` DISABLE KEYS */;
INSERT INTO `user_base` VALUES (6,'adminECNU','cc03e747a6afbbcbf8be7668acfebee5','admin','2015-09-24','2015-11-29'),(7,'adminIT','cc03e747a6afbbcbf8be7668acfebee5','admin','2015-09-24','2015-10-13'),(27,'testECNU','cc03e747a6afbbcbf8be7668acfebee5','custom','2015-10-12','2015-12-03'),(28,'ffffd','b46b5c3d7ef9bae31af6122b9c67f054','custom','2015-10-13',NULL),(29,'testECNU2','cc03e747a6afbbcbf8be7668acfebee5','custom','2015-10-13','2015-11-15'),(30,'fsda','64528858aa8a3ba872964006190f7696','custom','2015-10-22',NULL),(31,'fdsafd','64528858aa8a3ba872964006190f7696','custom','2015-10-22',NULL),(32,'ecnu1','cc03e747a6afbbcbf8be7668acfebee5','custom','2015-11-26','2015-11-26'),(33,'ecnu2','cc03e747a6afbbcbf8be7668acfebee5','custom','2015-11-26',NULL),(34,'ecnu3','cc03e747a6afbbcbf8be7668acfebee5','custom','2015-11-26',NULL),(35,'ecnu5','cc03e747a6afbbcbf8be7668acfebee5','custom','2015-11-26',NULL),(36,'ecnu6','cc03e747a6afbbcbf8be7668acfebee5','custom','2015-11-26',NULL);
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
  `unreadmsg_admin_num` int(3) DEFAULT '0',
  `hidden_privacy` enum('S','H') DEFAULT 'H',
  `unreadmsg_user_num` int(3) DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `id_UNIQUE` (`user_id`),
  UNIQUE KEY `studentID_UNIQUE` (`student_id`),
  KEY `fk_userCustom_major_idx` (`major`),
  KEY `fk_userCustom_major` (`major`),
  CONSTRAINT `fk_userid_custom` FOREIGN KEY (`user_id`) REFERENCES `user_base` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_custom`
--

LOCK TABLES `user_custom` WRITE;
/*!40000 ALTER TABLE `user_custom` DISABLE KEYS */;
INSERT INTO `user_custom` VALUES (27,'tian_yu92@yahoo.com','10001112121','测试地址','测试姓名','','信息科学技术学院','电子信息科学与技术','研二','男','我是一个人。','11111111111',11,'专业型硕士','闵行校区',0,'H',0),(28,'sdfasafsder@qq.com','1232141351','sfaasf','哈哈','音乐学系','艺术学院','钢琴','研一','男','发发生','10112110125',11,'全日制本科','中山北路校区',0,'S',0),(29,'214166945@qq.com','123154152','helloWorld','天于','生命医学系','生命科学学院','生命医学','研二','女','ffff','10112110444',11,'专业型硕士','闵行校区',0,'S',0),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'S',0),(31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'S',0),(32,'10132130149@ecnu.cn','1212314','111','abc','音乐学系','艺术学院','指挥','大三','男',NULL,'11111111112',11,NULL,NULL,0,'H',0),(33,'a@a.com','32432213','fsd','浮点数','音乐学系','艺术学院','钢琴','大四','男',NULL,'11111111113',11,NULL,NULL,0,'H',0),(34,'f@d.cop','564265','fdsf','fnd','美术学系','艺术学院','综合绘画','大四','女',NULL,'11111111114',11,NULL,NULL,0,'H',0),(35,'15921916783@c.com','564602','发射点','jgfd','大气资源','资源与环境科学学院','大气科学','研一','女',NULL,'11111111115',11,NULL,NULL,0,'H',0),(36,'fds@f.v','654','fds','fdsn','生命医学系','生命科学学院','生命医学','大四','女',NULL,'14111111116',11,NULL,NULL,0,'H',0);
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
  CONSTRAINT `fk_User_has_Ability_Ability1` FOREIGN KEY (`Ability_id`, `Ability_name`) REFERENCES `ability` (`id`, `name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_User_has_Ability_User1` FOREIGN KEY (`User_id`) REFERENCES `user_custom` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_ability`
--

LOCK TABLES `user_has_ability` WRITE;
/*!40000 ALTER TABLE `user_has_ability` DISABLE KEYS */;
INSERT INTO `user_has_ability` VALUES (43,27,43,'Web前台','网页开发','我会web前台哦~~'),(44,27,44,'Web后台','网页开发','发士大夫十分舒适犯得上发射点犯得上发射点犯得上发生'),(45,27,65,'Android开发','移动平台开发','和规范化'),(46,32,43,'Web前台','网页开发','我也会！'),(47,33,43,'Web前台','网页开发','fsdf'),(48,34,43,'Web前台','网页开发','fgdsgh'),(49,35,43,'Web前台','网页开发','佛教圣地'),(50,36,43,'Web前台','网页开发','fdsffs'),(51,27,1,'美术学','美术学','美术美术美术'),(58,27,2,'绘画','美术学','香香~'),(63,27,26,'中国语言文学类','语言学','chinese'),(64,27,174,'植物科学与技术','植物生产类','xxx');
/*!40000 ALTER TABLE `user_has_ability` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`ecnu_mind_admin`@`%`*/ /*!50003 TRIGGER `ecnu_mind`.`user_has_ability_BEFORE_INSERT` BEFORE INSERT ON `user_has_ability` FOR EACH ROW
set NEW.Direction_name = (select name from ecnu_mind.direction
		 where id = (select Direction_id from ecnu_mind.ability
					   where id = NEW.Ability_id)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `user_notification`
--

DROP TABLE IF EXISTS `user_notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_notification` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipient_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `note_content` varchar(1000) NOT NULL,
  `note_time` varchar(20) NOT NULL,
  PRIMARY KEY (`note_id`),
  KEY `fk_Recipient_id_idx` (`recipient_id`),
  KEY `fk_Sender_id_idx` (`sender_id`),
  CONSTRAINT `fk_Recipient_id` FOREIGN KEY (`recipient_id`) REFERENCES `user_base` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_Sender_id` FOREIGN KEY (`sender_id`) REFERENCES `user_base` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_notification`
--

LOCK TABLES `user_notification` WRITE;
/*!40000 ALTER TABLE `user_notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_notification` ENABLE KEYS */;
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

-- Dump completed on 2015-12-03 20:56:17
