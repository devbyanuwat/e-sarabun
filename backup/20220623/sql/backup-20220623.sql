-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: sarabun
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_department` varchar(30) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'งานทะเบียน'),(2,'สำนักคอม');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doc_status`
--

DROP TABLE IF EXISTS `doc_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doc_status` (
  `doc_status_id` int(10) NOT NULL AUTO_INCREMENT,
  `doc_status` varchar(50) NOT NULL,
  PRIMARY KEY (`doc_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_status`
--

LOCK TABLES `doc_status` WRITE;
/*!40000 ALTER TABLE `doc_status` DISABLE KEYS */;
INSERT INTO `doc_status` VALUES (1,'ยังไม่ได้อ่าน'),(2,'อ่านแล้ว');
/*!40000 ALTER TABLE `doc_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doc_traffic`
--

DROP TABLE IF EXISTS `doc_traffic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doc_traffic` (
  `doc_traffic_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_traffic_type` varchar(100) NOT NULL,
  PRIMARY KEY (`doc_traffic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_traffic`
--

LOCK TABLES `doc_traffic` WRITE;
/*!40000 ALTER TABLE `doc_traffic` DISABLE KEYS */;
/*!40000 ALTER TABLE `doc_traffic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doc_type`
--

DROP TABLE IF EXISTS `doc_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doc_type` (
  `doc_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_type` varchar(30) NOT NULL,
  PRIMARY KEY (`doc_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_type`
--

LOCK TABLES `doc_type` WRITE;
/*!40000 ALTER TABLE `doc_type` DISABLE KEYS */;
INSERT INTO `doc_type` VALUES (1,'หมวดอนุมัติจัดซื้อ'),(2,'หมวดงบประมาณการเงิน'),(10,'จัดซื้อจัดจ้าง 2022');
/*!40000 ALTER TABLE `doc_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doc_user_file`
--

DROP TABLE IF EXISTS `doc_user_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doc_user_file` (
  `doc_user_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(11) NOT NULL,
  `doc_user_file_name` varchar(255) NOT NULL,
  PRIMARY KEY (`doc_user_file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_user_file`
--

LOCK TABLES `doc_user_file` WRITE;
/*!40000 ALTER TABLE `doc_user_file` DISABLE KEYS */;
INSERT INTO `doc_user_file` VALUES (1,1,'ตัวอย่าง.pdf'),(2,1,'ตัวอย่าง.pdf'),(3,1,'ตัวอย่าง.pdf'),(4,1,'Final_CAD.pdf'),(5,4,'ตัวอย่าง.pdf'),(6,4,'Final_CAD.pdf'),(7,5,'Final_CAD.pdf'),(8,5,'TCT-อนุวัชร.pdf'),(9,8,'TCT-อนุวัชร.pdf'),(10,16,'icons8-add-user-male-100.png'),(11,16,'icons8-send-email-100.png'),(12,16,'icons8-admin-settings-male-50.png'),(13,16,'icons8-delete-96.png'),(14,16,'icons8-logout-96.png'),(15,16,'icons8-search-50.png'),(16,16,'icons8-download-100.png'),(17,16,'icons8-email-send-48.png'),(18,17,'icons8-add-user-male-100.png'),(19,17,'icons8-send-email-100.png'),(20,17,'icons8-admin-settings-male-50.png'),(21,18,'icons8-add-user-male-100.png'),(22,18,'icons8-send-email-100.png'),(23,18,'icons8-admin-settings-male-50.png'),(24,20,'icons8-add-user-male-100.png'),(25,20,'icons8-send-email-100.png'),(26,19,'icons8-admin-settings-male-50.png'),(27,20,'icons8-edit-50.png'),(28,20,'icons8-folder-50.png'),(29,25,'add_document.png'),(30,25,'add_user.png'),(31,25,'delete.png'),(32,26,'add_document.png'),(33,26,'add_user.png'),(34,26,'delete.png'),(35,26,'download.png'),(36,26,'edit.png'),(37,26,'folder.png'),(38,27,'add_document.png'),(39,27,'add_user.png'),(40,27,'delete.png'),(41,27,'download.png'),(42,27,'edit.png'),(43,27,'folder.png'),(44,28,'add_document.png'),(45,28,'add_user.png'),(46,28,'delete.png'),(47,28,'download.png'),(48,28,'edit.png'),(49,28,'folder.png'),(50,29,'add_document.png'),(51,29,'add_user.png'),(52,29,'delete.png'),(53,29,'download.png'),(54,29,'edit.png'),(55,29,'folder.png'),(56,30,'add_document.png'),(57,30,'add_user.png'),(58,30,'delete.png'),(59,30,'download.png'),(60,30,'edit.png'),(61,30,'folder.png'),(62,31,'add_document.png'),(63,31,'add_user.png'),(64,31,'delete.png'),(65,31,'download.png'),(66,31,'edit.png'),(67,31,'folder.png'),(68,32,'add_document.png'),(69,32,'add_user.png'),(70,32,'delete.png'),(71,32,'download.png'),(72,32,'edit.png'),(73,32,'folder.png'),(74,33,'add_document.png'),(75,33,'add_user.png'),(76,33,'delete.png'),(77,33,'download.png'),(78,33,'edit.png'),(79,33,'folder.png'),(80,34,'add_user.png'),(81,35,'add_user.png'),(82,36,'add_user.png'),(83,39,'add_user.png'),(84,41,'add_document.png'),(85,41,'add_user.png'),(86,41,'delete.png'),(87,41,'download.png'),(88,41,'edit.png'),(89,42,'corona_bg2.jpg'),(90,42,'ezgif-7-cb850d03008c.gif'),(91,42,'GUI.PNG'),(92,42,'malong.png');
/*!40000 ALTER TABLE `doc_user_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doc_book_number` varchar(30) NOT NULL,
  `doc_date` varchar(15) NOT NULL,
  `doc_time` varchar(10) NOT NULL,
  `doc_from` varchar(30) NOT NULL,
  `doc_topic` varchar(150) NOT NULL,
  `doc_refer_to` varchar(30) NOT NULL,
  `doc_attach` varchar(20) NOT NULL,
  `doc_handle` varchar(30) NOT NULL,
  `doc_action` varchar(30) NOT NULL,
  `doc_urgency` varchar(50) NOT NULL,
  `doc_status` varchar(20) NOT NULL,
  `doc_traffic_id` int(11) NOT NULL,
  `doc_des` varchar(255) NOT NULL,
  `doc_to` varchar(50) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document`
--

LOCK TABLES `document` WRITE;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` VALUES (15,1,6,'กยศ 1','2022-05-03','15:50','aa','aaa','aaa','aa','saas','aaa','urgen_normal','1',0,'','test002'),(20,1,1,'a','2022-05-29','04:16','a','a','a','a','a','a','urgen_normal','2',1,'sss','test002'),(21,2,1,'a','2022-05-29','04:16','a','a','a','a','a','a','urgen_normal','1',1,'sss','test002'),(22,1,6,'กยศ 1','2022-05-03','15:50','aa','aaa','aaa','aa','saas','aaa','urgen_normal','1',0,'','test002'),(25,1,1,'a','2022-06-14','21:27','กทม','จัดซื้อจัดจ้าง เอกสาร','-','-','-','-','urgen_normal','1',1,'google.com',''),(34,1,1,'a','22222-02-22','22:22','a','a','a','a','a','s','urgen_normal','1',1,'a',''),(35,1,1,'a','22222-02-22','22:22','a','a','a','a','a','s','urgen_normal','1',1,'a',''),(36,1,1,'a','22222-02-22','22:22','a','a','a','a','a','s','urgen_normal','1',1,'a',''),(39,1,1,'a','22222-02-22','22:22','a','a','a','a','a','s','urgen_normal','1',1,'a',''),(41,1,1,'0003','2022-06-14','09:00','มจพ','-','-','-','-','-','urgen_normal','1',1,'-',''),(42,10,1,'0004','2022-06-13','10:00','มจพ','-','-','-','-','-','urgen_normal','1',1,'-','');
/*!40000 ALTER TABLE `document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `position` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_rank` varchar(30) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position`
--

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` VALUES (1,'เจ้าหน้าที่ คอบ.'),(2,'อาจารย์');
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `send_mail`
--

DROP TABLE IF EXISTS `send_mail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `send_mail` (
  `send_mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `doc_status_id` int(2) NOT NULL DEFAULT 1,
  `doc_traffic_id` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`send_mail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `send_mail`
--

LOCK TABLES `send_mail` WRITE;
/*!40000 ALTER TABLE `send_mail` DISABLE KEYS */;
INSERT INTO `send_mail` VALUES (1,2,20,1,1),(2,2,15,2,1),(3,2,21,1,1),(4,2,22,1,1),(5,5,15,1,1),(6,5,21,1,1),(7,5,15,2,1),(9,5,15,1,1),(11,5,15,1,1),(13,5,15,2,1),(15,5,15,1,1),(17,5,15,1,1),(19,5,15,1,1),(29,7,21,1,1),(30,8,21,2,1),(32,2,41,1,1),(33,8,41,1,1),(34,8,42,2,1),(35,7,42,1,1),(36,2,42,1,1);
/*!40000 ALTER TABLE `send_mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_lineid` varchar(30) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_tel` varchar(10) NOT NULL,
  `post_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','1234','Anuwat Tansanguan','','','',0,0,1),(2,'test002','test002','veeeeee','#','Janjira.wilawan@gmail.com','#',1,1,2),(5,'test003','test003','test003','#','oufonnuch@gmail.com','1231231231',1,2,2),(7,'test004','test004','test003','#','test@g.com','1231231231',1,2,2),(8,'baby_benz','1234','natchanon jan','#','pocketninja@g.com','1231231231',1,2,2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_level`
--

DROP TABLE IF EXISTS `user_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_rank` varchar(30) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_level`
--

LOCK TABLES `user_level` WRITE;
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT INTO `user_level` VALUES (1,'admin'),(2,'user');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-23 22:27:08
