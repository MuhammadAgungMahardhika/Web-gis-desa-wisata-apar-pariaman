-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: tourism_village
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `apar`
--

DROP TABLE IF EXISTS `apar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apar` (
  `id` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_of_tourism` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_person` varchar(13) DEFAULT NULL,
  `description` text,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `geom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apar`
--

LOCK TABLES `apar` WRITE;
/*!40000 ALTER TABLE `apar` DISABLE KEYS */;
INSERT INTO `apar` VALUES ('A01','Apars','Eco','pariaman','6281373517899','oke','-0.598238','100.111393',NULL);
/*!40000 ALTER TABLE `apar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apar_gallery`
--

DROP TABLE IF EXISTS `apar_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apar_gallery` (
  `id` varchar(8) NOT NULL,
  `apar_id` varchar(8) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apar_gallery_apar_id_foreign` (`apar_id`),
  CONSTRAINT `apar_gallery_apar_id_foreign` FOREIGN KEY (`apar_id`) REFERENCES `apar` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apar_gallery`
--

LOCK TABLES `apar_gallery` WRITE;
/*!40000 ALTER TABLE `apar_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `apar_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apar_video`
--

DROP TABLE IF EXISTS `apar_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apar_video` (
  `id` varchar(8) NOT NULL,
  `apar_id` varchar(8) NOT NULL,
  `url` varchar(255) NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `apar_video_apar_id_foreign` (`apar_id`),
  CONSTRAINT `apar_video_apar_id_foreign` FOREIGN KEY (`apar_id`) REFERENCES `apar` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apar_video`
--

LOCK TABLES `apar_video` WRITE;
/*!40000 ALTER TABLE `apar_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `apar_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atraction`
--

DROP TABLE IF EXISTS `atraction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atraction` (
  `id` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `contact_person` varchar(13) DEFAULT NULL,
  `description` text,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `geom` geometry DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atraction`
--

LOCK TABLES `atraction` WRITE;
/*!40000 ALTER TABLE `atraction` DISABLE KEYS */;
INSERT INTO `atraction` VALUES ('A01','Mangrove Edupark',2,'3000','23','asd','-0.600898','100.109226',NULL),('A02','Turtles Conservation',2,'2000','6281373517899','sd','-0.602701','100.110170',NULL),('A023','TesAja',2,'3000','232','asd','1','1',NULL),('A04','GeomTes',2,NULL,NULL,NULL,'-0.596596','100.110878',_binary '\0\0\0\0\0\0\0\0\0\0\0\0\0çÅw¯Y@æ\ÌÅ]„øçÅ\«Y@ç•XÇ[\Z„øçÅkY@ß¨-\€W%„øçÅw¯Y@æ\ÌÅ]\„ø'),('A05','Tessss',2,'300','232','asd','-0.596596','100.110878',NULL);
/*!40000 ALTER TABLE `atraction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atraction_gallery`
--

DROP TABLE IF EXISTS `atraction_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atraction_gallery` (
  `id` varchar(8) NOT NULL,
  `atraction_id` varchar(8) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `atraction_gallery_atraction_id_foreign` (`atraction_id`),
  CONSTRAINT `atraction_gallery_atraction_id_foreign` FOREIGN KEY (`atraction_id`) REFERENCES `atraction` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atraction_gallery`
--

LOCK TABLES `atraction_gallery` WRITE;
/*!40000 ALTER TABLE `atraction_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `atraction_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atraction_video`
--

DROP TABLE IF EXISTS `atraction_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atraction_video` (
  `id` varchar(8) NOT NULL,
  `atraction_id` varchar(8) NOT NULL,
  `url` varchar(255) NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `atraction_video_atraction_id_foreign` (`atraction_id`),
  CONSTRAINT `atraction_video_atraction_id_foreign` FOREIGN KEY (`atraction_id`) REFERENCES `atraction` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atraction_video`
--

LOCK TABLES `atraction_video` WRITE;
/*!40000 ALTER TABLE `atraction_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `atraction_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_activation_attempts`
--

DROP TABLE IF EXISTS `auth_activation_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_activation_attempts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_activation_attempts`
--

LOCK TABLES `auth_activation_attempts` WRITE;
/*!40000 ALTER TABLE `auth_activation_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_activation_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups`
--

DROP TABLE IF EXISTS `auth_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups`
--

LOCK TABLES `auth_groups` WRITE;
/*!40000 ALTER TABLE `auth_groups` DISABLE KEYS */;
INSERT INTO `auth_groups` VALUES (1,'admin','Site Administrator'),(2,'user','Reguler User');
/*!40000 ALTER TABLE `auth_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_permissions`
--

DROP TABLE IF EXISTS `auth_groups_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups_permissions` (
  `group_id` int unsigned NOT NULL DEFAULT '0',
  `permission_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_permissions`
--

LOCK TABLES `auth_groups_permissions` WRITE;
/*!40000 ALTER TABLE `auth_groups_permissions` DISABLE KEYS */;
INSERT INTO `auth_groups_permissions` VALUES (1,1),(1,2),(2,2);
/*!40000 ALTER TABLE `auth_groups_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_users`
--

DROP TABLE IF EXISTS `auth_groups_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups_users` (
  `group_id` int unsigned NOT NULL DEFAULT '0',
  `user_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_users`
--

LOCK TABLES `auth_groups_users` WRITE;
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
INSERT INTO `auth_groups_users` VALUES (1,1),(2,20),(2,21),(2,22),(2,23);
/*!40000 ALTER TABLE `auth_groups_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_logins`
--

DROP TABLE IF EXISTS `auth_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_logins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_logins`
--

LOCK TABLES `auth_logins` WRITE;
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` VALUES (1,'::1','m.agungmahardika12@gmail.com',18,'2022-04-30 04:04:43',1),(2,'::1','m.agungmahardika12@gmail.com',18,'2022-04-30 04:24:39',1),(3,'::1','m.agungmahardika12@gmail.com',18,'2022-04-30 04:41:25',1),(4,'::1','m.agungmahardika12@gmail.com',NULL,'2022-04-30 04:41:32',0),(5,'::1','m.agungmahardika12@gmail.com',18,'2022-04-30 04:41:40',1),(6,'::1','m.agungmahardika12@gmail.com',NULL,'2022-04-30 04:44:25',0),(7,'::1','m.agungmahardika12@gmail.com',18,'2022-04-30 04:44:31',1),(8,'::1','m.agungmahardika12@gmail.com',18,'2022-04-30 04:50:10',1),(9,'::1','asd',NULL,'2022-04-30 04:53:22',0),(10,'::1','agun',NULL,'2022-04-30 04:53:30',0),(11,'::1','agung',NULL,'2022-04-30 04:53:38',0),(12,'::1','m.agungmahardika12@gmail.com',NULL,'2022-04-30 04:56:14',0),(13,'::1','m.agungmahardika12@gmail.com',24,'2022-04-30 04:56:35',1),(14,'::1','m.agungmahardika12@gmail.com',24,'2022-04-30 04:58:02',1),(15,'::1','m.agungmahardika12@gmail.com',24,'2022-04-30 04:58:12',1),(16,'::1','m.agungmahardika12@gmail.com',24,'2022-04-30 04:59:03',1),(17,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 05:02:49',1),(18,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:09:54',1),(19,'::1','tes@gmail.com',4,'2022-04-30 06:10:29',1),(20,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:10:49',1),(21,'::1','tes@gmail.com',4,'2022-04-30 06:13:48',1),(22,'::1','tes@gmail.com',4,'2022-04-30 06:14:51',1),(23,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:15:01',1),(24,'::1','tes@gmail.com',4,'2022-04-30 06:15:34',1),(25,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:38:13',1),(26,'::1','tes@gmail.com',4,'2022-04-30 06:38:23',1),(27,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:40:48',1),(28,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:45:40',1),(29,'::1','tes@gmail.com',4,'2022-04-30 06:45:49',1),(30,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:46:04',1),(31,'::1','tes@gmail.com',4,'2022-04-30 06:46:49',1),(32,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:46:57',1),(33,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:47:28',1),(34,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 07:48:13',1),(35,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 07:54:46',1),(36,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 07:57:16',1),(37,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 07:59:05',1),(38,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 08:02:40',1),(39,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 08:03:04',1),(40,'::1','tes@gmail.com',4,'2022-04-30 08:05:42',1),(41,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 08:08:17',1),(42,'::1','agung',NULL,'2022-04-30 08:43:09',0),(43,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 08:43:20',1),(44,'::1','m.agungmahardika12@gmail.com',NULL,'2022-04-30 08:43:29',0),(45,'::1','m.agungmahardika12@gmail.com',NULL,'2022-04-30 08:44:45',0),(46,'::1','m.agungmahardika12@gmail.co',NULL,'2022-04-30 08:44:57',0),(47,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 08:45:03',1),(48,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 08:51:31',1),(49,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 09:11:03',1),(50,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 09:25:41',1),(51,'::1','dygigegary@mailinator.com',5,'2022-04-30 09:26:31',1),(52,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 09:26:45',1),(53,'::1','dygigegary@mailinator.com',5,'2022-04-30 09:37:08',1),(54,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 09:41:10',1),(55,'::1','tedobax@mailinator.com',6,'2022-04-30 09:44:20',1),(56,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 09:50:32',1),(57,'::1','dygigegary@mailinator.com',5,'2022-05-01 03:21:06',1),(58,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 03:21:19',1),(59,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 03:35:21',1),(60,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 03:42:25',1),(61,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 03:42:50',1),(62,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 03:45:43',1),(63,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 03:48:18',1),(64,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 03:48:33',1),(65,'::1','dygigegary@mailinator.com',5,'2022-05-01 04:14:44',1),(66,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 04:28:33',1),(67,'::1','dygigegary@mailinator.com',5,'2022-05-01 04:41:48',1),(68,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 04:43:19',1),(69,'::1','dygigegary@mailinator.com',5,'2022-05-01 04:50:04',1),(70,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 04:50:29',1),(71,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 05:24:14',1),(72,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 05:38:40',1),(73,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 06:50:57',1),(74,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 06:58:04',1),(75,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 07:01:20',1),(76,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 07:08:46',1),(77,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 07:15:42',1),(78,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 07:20:22',1),(79,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 07:28:46',1),(80,'::1','dygigegary@mailinator.com',5,'2022-05-01 07:29:19',1),(81,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 07:32:13',1),(82,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 08:04:21',1),(83,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 08:12:37',1),(84,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 08:23:04',1),(85,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 08:26:25',1),(86,'::1','dygigegary@mailinator.com',5,'2022-05-01 08:30:13',1),(87,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 08:30:36',1),(88,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 09:17:06',1),(89,'::1','m.agungmahardika12@gmail.com',1,'2022-05-02 21:28:33',1),(90,'::1','dygigegary@mailinator.com',5,'2022-05-02 21:28:55',1),(91,'::1','m.agungmahardika12@gmail.com',1,'2022-05-02 22:21:13',1),(92,'::1','m.agungmahardika12@gmail.com',1,'2022-05-04 11:16:12',1),(93,'::1','dygigegary@mailinator.com',5,'2022-05-04 11:16:50',1),(94,'::1','m.agungmahardika12@gmail.com',1,'2022-05-04 11:17:46',1),(95,'::1','m.agungmahardika12@gmail.com',1,'2022-05-04 11:34:45',1),(96,'::1','m.agungmahardika12@gmail.com',1,'2022-05-04 21:27:08',1),(97,'::1','m.agungmahardika12@gmail.com',1,'2022-05-05 11:54:13',1),(98,'::1','m.agungmahardika12@gmail.com',1,'2022-05-05 23:36:31',1),(99,'::1','m.agungmahardika12@gmail.com',1,'2022-05-05 23:36:53',1),(100,'::1','wasyjipymo@mailinator.com',10,'2022-05-05 23:42:53',1),(101,'::1','m.agungmahardika12@gmail.com',1,'2022-05-07 11:48:51',1),(102,'::1','dygigegary@mailinator.com',5,'2022-05-07 12:01:10',1),(103,'::1','m.agungmahardika12@gmail.com',1,'2022-05-07 12:01:58',1),(104,'::1','agung',NULL,'2022-05-07 22:41:51',0),(105,'::1','m.agungmahardika12@gmail.com',1,'2022-05-07 22:41:58',1),(106,'::1','m.agungmahardika12@gmail.com',1,'2022-05-08 00:09:32',1),(107,'::1','dygigegary@mailinator.com',5,'2022-05-08 00:13:23',1),(108,'::1','m.agungmahardika12@gmail.com',1,'2022-05-08 00:22:41',1),(109,'::1','m.agungmahardika12@gmail.com',1,'2022-05-08 02:27:04',1),(110,'::1','m.agungmahardika12@gmail.com',1,'2022-05-08 02:31:10',1),(111,'::1','m.agungmahardika12@gmail.com',1,'2022-05-10 02:03:50',1),(112,'::1','dygigegary@mailinator.com',5,'2022-05-10 09:16:51',1),(113,'::1','cite@mailinator.com',13,'2022-05-10 09:17:24',1),(114,'::1','m.agungmahardika12@gmail.com',1,'2022-05-10 10:26:05',1),(115,'::1','agung',NULL,'2022-05-10 11:20:06',0),(116,'::1','m.agungmahardika12@gmail.com',1,'2022-05-10 11:20:11',1),(117,'::1','m.agungmahardika12@gmail.com',1,'2022-05-10 11:35:55',1),(118,'::1','dygigegary@mailinator.com',5,'2022-05-10 11:36:07',1),(119,'::1','m.agungmahardika12@gmail.com',1,'2022-05-19 20:56:13',1),(120,'::1','m.agungmahardika12@gmail.com',1,'2022-05-19 21:01:22',1),(121,'::1','m.agungmahardika12@gmail.com',1,'2022-05-19 21:38:26',1),(122,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:13:01',1),(123,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:17:15',1),(124,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:17:35',1),(125,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:19:00',1),(126,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:20:26',1),(127,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:27:17',1),(128,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:27:48',1),(129,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:28:37',1),(130,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:29:44',1),(131,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:30:00',1),(132,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:42:09',1),(133,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:42:27',1),(134,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:45:11',1),(135,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:51:19',1),(136,'::1','m.agungmahardika12@gmail.com',1,'2022-05-22 04:58:17',1),(137,'::1','m.agungmahardika12@gmail.com',1,'2022-05-22 07:18:00',1),(138,'::1','m.agungmahardika12@gmail.com',1,'2022-05-22 07:38:34',1),(139,'::1','m.agungmahardika12@gmail.com',1,'2022-05-22 07:39:56',1),(140,'::1','m.agungmahardika12@gmail.com',1,'2022-05-22 08:57:48',1),(141,'::1','m.agungmahardika12@gmail.com',1,'2022-05-22 09:37:49',1),(142,'::1','m.agungmahardika12@gmail.com',1,'2022-05-22 09:51:51',1),(143,'::1','m.agungmahardika12@gmail.com',1,'2022-05-23 03:31:07',1),(144,'::1','m.agungmahardika12@gmail.com',1,'2022-05-23 09:33:35',1),(145,'::1','m.agungmahardika12@gmail.com',1,'2022-05-25 20:59:12',1),(146,'::1','m.agungmahardika12@gmail.com',1,'2022-05-26 02:48:16',1),(147,'::1','m.agungmahardika12@gmail.com',1,'2022-05-30 12:14:13',1),(148,'::1','m.agungmahardika12@gmail.com',1,'2022-05-30 21:18:00',1),(149,'::1','m.agungmahardika12@gmail.com',1,'2022-05-31 22:54:56',1),(150,'::1','m.agungmahardika12@gmail.com',1,'2022-05-31 23:10:32',1),(151,'::1','m.agungmahardika12@gmail.com',1,'2022-05-31 23:13:38',1),(152,'::1','tes@gmail.com',NULL,'2022-05-31 23:15:06',0),(153,'::1','tes@gmail.com',NULL,'2022-05-31 23:15:17',0),(154,'::1','tes123',NULL,'2022-05-31 23:15:27',0),(155,'::1','tes@gmail.com',NULL,'2022-05-31 23:15:38',0),(156,'::1','m.agungmahardika12@gmail.com',1,'2022-05-31 23:15:45',1),(157,'::1','agung',NULL,'2022-06-29 04:03:56',0),(158,'::1','agung',NULL,'2022-06-29 04:04:03',0),(159,'::1','agung',NULL,'2022-06-29 04:04:22',0),(160,'::1','agung',NULL,'2022-06-29 10:20:38',0),(161,'::1','Agung',NULL,'2022-06-29 10:20:54',0),(162,'::1','m.agungmahardika12@gmail.com',1,'2022-06-29 10:22:59',1),(163,'::1','m.agungmahardika12@gmail.com',1,'2022-06-29 15:25:02',1),(164,'::1','m.agungmahardika12@gmail.com',1,'2022-06-30 01:28:00',1),(165,'::1','m.agungmahardika12@gmail.com',1,'2022-06-30 01:30:10',1),(166,'::1','m.agungmahardika12@gmail.com',1,'2022-06-30 22:02:25',1),(167,'::1','m.agungmahardika12@gmail.com',1,'2022-06-30 23:03:09',1),(168,'::1','m.agungmahardika12@gmail.com',1,'2022-07-01 02:27:13',1),(169,'::1','agung',NULL,'2022-07-01 05:17:13',0),(170,'::1','m.agungmahardika12@gmail.com',1,'2022-07-01 05:17:17',1),(171,'::1','m.agungmahardika12@gmail.com',1,'2022-07-01 08:17:57',1),(172,'::1','m.agungmahardika12@gmail.com',1,'2022-07-01 09:56:21',1),(173,'::1','m.agungmahardika12@gmail.com',1,'2022-07-01 09:59:09',1),(174,'::1','m.agungmahardika12@gmail.com',1,'2022-07-01 09:59:50',1),(175,'::1','agung@gmail.com',16,'2022-07-01 12:02:30',1),(176,'::1','m.agungmahardika12@gmail.com3',1,'2022-07-01 12:08:35',1),(177,'::1','m.agungmahardika12@gmail.com3',1,'2022-07-01 18:00:27',1),(178,'::1','m.agungmahardika12@gmail.com3',1,'2022-07-02 00:28:17',1),(179,'::1','agung',NULL,'2022-07-02 00:47:56',0),(180,'::1','m.agungmahardika12@gmail.com3',1,'2022-07-02 00:48:01',1),(181,'::1','agung',NULL,'2022-07-02 20:54:37',0),(182,'::1','agung',NULL,'2022-07-02 20:54:43',0),(183,'::1','agung',NULL,'2022-07-02 20:54:52',0),(184,'::1','m.agungmahardika12@gmail.com',1,'2022-07-02 20:54:59',1),(185,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 02:18:06',1),(186,'::1','agungs',NULL,'2022-07-03 05:38:09',0),(187,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 05:38:13',1),(188,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 11:37:49',1),(189,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 19:49:50',1),(190,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 21:57:31',1),(191,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 22:12:36',1),(192,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 22:15:39',1),(193,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 22:28:39',1),(194,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 22:28:40',1),(195,'::1','oke@gmail.com',17,'2022-07-03 22:29:57',1),(196,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 22:30:13',1),(197,'::1','poki@gmail.com',19,'2022-07-03 22:56:06',1),(198,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 22:56:33',1),(199,'::1','m.agungmahardika12@gmail.com',1,'2022-07-04 02:23:40',1),(200,'::1','user@gmail.com',20,'2022-07-04 02:33:12',1),(201,'::1','m.agungmahardika12@gmail.com',1,'2022-07-04 02:33:35',1),(202,'::1','user@gmail.com',20,'2022-07-04 02:34:11',1),(203,'::1','m.agungmahardika12@gmail.com',1,'2022-07-04 02:34:24',1),(204,'::1','m.agungmahardika12@gmail.com',1,'2022-07-04 11:59:40',1),(205,'::1','m.agungmahardika12@gmail.com',1,'2022-07-04 21:27:52',1),(206,'::1','m.agungmahardika12@gmail.com',1,'2022-07-05 08:36:55',1),(207,'::1','m.agungmahardika12@gmail.com',1,'2022-07-06 00:50:04',1),(208,'::1','m.agungmahardika12@gmail.com',1,'2022-07-06 04:45:07',1),(209,'::1','m.agungmahardika12@gmail.com',1,'2022-07-06 06:33:26',1),(210,'::1','m.agungmahardika12@gmail.com',1,'2022-07-06 10:35:47',1),(211,'::1','m.agungmahardika12@gmail.com',1,'2022-07-07 22:45:31',1),(212,'::1','m.agungmahardika12@gmail.com',1,'2022-07-08 04:37:25',1),(213,'::1','m.agungmahardika12@gmail.com',1,'2022-07-08 08:42:55',1),(214,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 07:04:30',1),(215,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 20:17:19',1),(216,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 20:20:52',1),(217,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 20:27:02',1),(218,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 21:06:46',1),(219,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 21:18:42',1),(220,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 21:19:34',1),(221,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 21:20:08',1),(222,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 21:20:47',1),(223,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 21:21:14',1),(224,'::1','haha@gmail.com',21,'2022-07-09 21:23:10',1),(225,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 23:57:52',1),(226,'::1','haha@gmail.com',21,'2022-07-10 01:25:11',1),(227,'::1','m.agungmahardika12@gmail.com',1,'2022-07-10 04:56:35',1),(228,'::1','m.agungmahardika12@gmail.com',1,'2022-07-12 09:10:16',1),(229,'::1','m.agungmahardika12@gmail.com',1,'2022-07-13 23:29:30',1),(230,'::1','m.agungmahardika12@gmail.com',1,'2022-07-14 07:26:36',1),(231,'::1','m.agungmahardika12@gmail.com',1,'2022-07-15 02:19:31',1),(232,'::1','m.agungmahardika12@gmail.com',1,'2022-07-15 09:17:49',1),(233,'::1','m.agungmahardika12@gmail.com',1,'2022-07-16 05:05:06',1),(234,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 06:33:28',1),(235,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 09:45:54',1),(236,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 09:52:18',1),(237,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 09:53:18',1),(238,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 09:55:13',1),(239,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 09:59:49',1),(240,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 20:03:21',1),(241,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 20:44:27',1),(242,'::1','m.agungmahardika12@gmail.com',1,'2022-07-18 01:28:48',1),(243,'::1','m.agungmahardika12@gmail.com',1,'2022-07-19 01:17:16',1),(244,'::1','tes@gmail.com',NULL,'2022-07-19 01:48:10',0),(245,'::1','tes@gmail.com',23,'2022-07-19 01:48:42',1),(246,'::1','m.agungmahardika12@gmail.com',1,'2022-07-19 08:17:10',1),(247,'::1','m.agungmahardika12@gmail.com',1,'2022-07-20 00:01:28',1);
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_permissions`
--

DROP TABLE IF EXISTS `auth_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_permissions`
--

LOCK TABLES `auth_permissions` WRITE;
/*!40000 ALTER TABLE `auth_permissions` DISABLE KEYS */;
INSERT INTO `auth_permissions` VALUES (1,'manage-users','Manage All User'),(2,'manage-profile','Manage User\'s Profile ');
/*!40000 ALTER TABLE `auth_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_reset_attempts`
--

DROP TABLE IF EXISTS `auth_reset_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_reset_attempts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_reset_attempts`
--

LOCK TABLES `auth_reset_attempts` WRITE;
/*!40000 ALTER TABLE `auth_reset_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_reset_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_tokens`
--

DROP TABLE IF EXISTS `auth_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_tokens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_tokens`
--

LOCK TABLES `auth_tokens` WRITE;
/*!40000 ALTER TABLE `auth_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_users_permissions`
--

DROP TABLE IF EXISTS `auth_users_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_users_permissions` (
  `user_id` int unsigned NOT NULL DEFAULT '0',
  `permission_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_users_permissions`
--

LOCK TABLES `auth_users_permissions` WRITE;
/*!40000 ALTER TABLE `auth_users_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_users_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `culinary_place`
--

DROP TABLE IF EXISTS `culinary_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `culinary_place` (
  `id` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `contact_person` varchar(14) DEFAULT NULL,
  `description` text,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `geom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `culinary_place`
--

LOCK TABLES `culinary_place` WRITE;
/*!40000 ALTER TABLE `culinary_place` DISABLE KEYS */;
INSERT INTO `culinary_place` VALUES ('C01','Kadai 1','Buk Ita','23','ok','-0.601006','100.108819',NULL),('C02','Kadai 2','Buk Melly','32','adsad','-0.599869','100.108089',NULL);
/*!40000 ALTER TABLE `culinary_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `culinary_place_gallery`
--

DROP TABLE IF EXISTS `culinary_place_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `culinary_place_gallery` (
  `id` varchar(8) NOT NULL,
  `culinary_place_id` varchar(8) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `culinary_place_gallery_culinary_place_id_foreign` (`culinary_place_id`),
  CONSTRAINT `culinary_place_gallery_culinary_place_id_foreign` FOREIGN KEY (`culinary_place_id`) REFERENCES `culinary_place` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `culinary_place_gallery`
--

LOCK TABLES `culinary_place_gallery` WRITE;
/*!40000 ALTER TABLE `culinary_place_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `culinary_place_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `culinary_place_video`
--

DROP TABLE IF EXISTS `culinary_place_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `culinary_place_video` (
  `id` varchar(8) NOT NULL,
  `culinary_place_id` varchar(8) NOT NULL,
  `url` varchar(255) NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `culinary_place_video_culinary_place_id_foreign` (`culinary_place_id`),
  CONSTRAINT `culinary_place_video_culinary_place_id_foreign` FOREIGN KEY (`culinary_place_id`) REFERENCES `culinary_place` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `culinary_place_video`
--

LOCK TABLES `culinary_place_video` WRITE;
/*!40000 ALTER TABLE `culinary_place_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `culinary_place_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_menu`
--

DROP TABLE IF EXISTS `detail_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_menu` (
  `id` varchar(8) NOT NULL,
  `menu_id` varchar(8) NOT NULL,
  `culinary_place_id` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_menu_menu_id_foreign` (`menu_id`),
  KEY `detail_menu_culinary_place_id_foreign` (`culinary_place_id`),
  CONSTRAINT `detail_menu_culinary_place_id_foreign` FOREIGN KEY (`culinary_place_id`) REFERENCES `culinary_place` (`id`),
  CONSTRAINT `detail_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_menu`
--

LOCK TABLES `detail_menu` WRITE;
/*!40000 ALTER TABLE `detail_menu` DISABLE KEYS */;
INSERT INTO `detail_menu` VALUES ('DM01','M01','C01'),('DM02','M02','C01'),('DM03','M01','C02');
/*!40000 ALTER TABLE `detail_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_product`
--

DROP TABLE IF EXISTS `detail_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_product` (
  `id` varchar(8) NOT NULL,
  `product_id` varchar(8) NOT NULL,
  `souvenir_place_id` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_product_product_id_foreign` (`product_id`),
  KEY `detail_product_souvenir_place_id_foreign` (`souvenir_place_id`),
  CONSTRAINT `detail_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `detail_product_souvenir_place_id_foreign` FOREIGN KEY (`souvenir_place_id`) REFERENCES `souvenir_place` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_product`
--

LOCK TABLES `detail_product` WRITE;
/*!40000 ALTER TABLE `detail_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event` (
  `id` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `price` varchar(13) DEFAULT NULL,
  `description` text,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `geom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES ('E01','Panjek baruak','08 Wib - 10.00 WIB','2000','asd','2','2',NULL);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_gallery`
--

DROP TABLE IF EXISTS `event_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_gallery` (
  `id` varchar(8) NOT NULL,
  `event_id` varchar(8) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_gallery_event_id_foreign` (`event_id`),
  CONSTRAINT `event_gallery_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_gallery`
--

LOCK TABLES `event_gallery` WRITE;
/*!40000 ALTER TABLE `event_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_video`
--

DROP TABLE IF EXISTS `event_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_video` (
  `id` varchar(8) NOT NULL,
  `event_id` varchar(8) NOT NULL,
  `url` varchar(255) NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_video_event_id_foreign` (`event_id`),
  CONSTRAINT `event_video_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_video`
--

LOCK TABLES `event_video` WRITE;
/*!40000 ALTER TABLE `event_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility`
--

DROP TABLE IF EXISTS `facility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facility` (
  `id` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `geom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility`
--

LOCK TABLES `facility` WRITE;
/*!40000 ALTER TABLE `facility` DISABLE KEYS */;
INSERT INTO `facility` VALUES ('F01','Kantor POKDARWIS','sdas','-0.600684','100.109269',NULL);
/*!40000 ALTER TABLE `facility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility_gallery`
--

DROP TABLE IF EXISTS `facility_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facility_gallery` (
  `id` varchar(8) NOT NULL,
  `facility_id` varchar(8) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `facility_gallery_facility_id_foreign` (`facility_id`),
  CONSTRAINT `facility_gallery_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facility` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility_gallery`
--

LOCK TABLES `facility_gallery` WRITE;
/*!40000 ALTER TABLE `facility_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `facility_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility_video`
--

DROP TABLE IF EXISTS `facility_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facility_video` (
  `id` varchar(8) NOT NULL,
  `facility_id` varchar(8) NOT NULL,
  `url` varchar(255) NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `facility_video_facility_id_foreign` (`facility_id`),
  CONSTRAINT `facility_video_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facility` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility_video`
--

LOCK TABLES `facility_video` WRITE;
/*!40000 ALTER TABLE `facility_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `facility_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `id` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `menu_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES ('M01','Mie Rebus','10000','mie_rebus.jpg'),('M02','Mie Goreng','15000','mie_goreng.jpg');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017-11-20-223112','Myth\\Auth\\Database\\Migrations\\CreateAuthTables','default','Myth\\Auth',1651301533,1),(2,'2022-06-29-203927','App\\Database\\Migrations\\Apar','default','App',1656536105,2),(3,'2022-06-29-205803','App\\Database\\Migrations\\Atraction','default','App',1656536455,3),(4,'2022-06-29-210747','App\\Database\\Migrations\\Event','default','App',1656537022,4),(5,'2022-06-29-211115','App\\Database\\Migrations\\Atraction','default','App',1656537086,5),(6,'2022-06-29-211155','App\\Database\\Migrations\\Facility','default','App',1656537182,6),(7,'2022-06-30-023454','App\\Database\\Migrations\\WorshipPlace','default','App',1656556745,7),(8,'2022-06-30-023513','App\\Database\\Migrations\\CulinaryPlace','default','App',1656556746,7),(9,'2022-06-30-023528','App\\Database\\Migrations\\SouvenirPlace','default','App',1656556746,7),(10,'2022-06-30-040003','App\\Database\\Migrations\\CulinaryPlace','default','App',1656562156,8),(11,'2022-06-30-040033','App\\Database\\Migrations\\SouvenirPlace','default','App',1656562156,8),(12,'2022-06-30-040055','App\\Database\\Migrations\\WorshipPlace','default','App',1656562157,8),(13,'2022-06-30-042057','App\\Database\\Migrations\\Atraction','default','App',1656562865,9),(14,'2022-07-01-062044','App\\Database\\Migrations\\Atraction','default','App',1656656457,10),(15,'2022-07-01-062231','App\\Database\\Migrations\\Atraction','default','App',1656656568,11),(16,'2022-07-01-062353','App\\Database\\Migrations\\Atraction','default','App',1656656647,12),(17,'2022-07-01-103229','App\\Database\\Migrations\\Facility','default','App',1656671559,13),(18,'2022-07-03-081327','App\\Database\\Migrations\\Atraction','default','App',1656836210,14),(20,'2022-07-13-020726','App\\Database\\Migrations\\AparGallery','default','App',1657678370,15),(49,'2022-07-13-025921','App\\Database\\Migrations\\Apar','default','App',1657682556,16),(50,'2022-07-13-025948','App\\Database\\Migrations\\Event','default','App',1657682557,16),(51,'2022-07-13-030025','App\\Database\\Migrations\\CulinaryPlace','default','App',1657682558,16),(52,'2022-07-13-030048','App\\Database\\Migrations\\SouvenirPlace','default','App',1657682559,16),(53,'2022-07-13-030112','App\\Database\\Migrations\\WorshipPlace','default','App',1657682559,16),(54,'2022-07-13-030132','App\\Database\\Migrations\\Facility','default','App',1657682560,16),(55,'2022-07-13-030159','App\\Database\\Migrations\\Atraction','default','App',1657682560,16),(56,'2022-07-13-031956','App\\Database\\Migrations\\AparGallery','default','App',1657682560,16),(99,'2022-07-13-032655','App\\Database\\Migrations\\AparGallery','default','App',1658294204,17),(100,'2022-07-13-032926','App\\Database\\Migrations\\AparVideo','default','App',1658294205,17),(101,'2022-07-13-033252','App\\Database\\Migrations\\AtractionGallery','default','App',1658294206,17),(102,'2022-07-13-033459','App\\Database\\Migrations\\AtractionVideo','default','App',1658294207,17),(103,'2022-07-13-033634','App\\Database\\Migrations\\EventGallery','default','App',1658294209,17),(104,'2022-07-13-033742','App\\Database\\Migrations\\EventVideo','default','App',1658294211,17),(105,'2022-07-13-033829','App\\Database\\Migrations\\FacilityGallery','default','App',1658294211,17),(106,'2022-07-13-033839','App\\Database\\Migrations\\FacilityVideo','default','App',1658294212,17),(107,'2022-07-13-033936','App\\Database\\Migrations\\WorshipPlaceGallery','default','App',1658294213,17),(108,'2022-07-13-033956','App\\Database\\Migrations\\WorshipPlaceVideo','default','App',1658294214,17),(109,'2022-07-13-034414','App\\Database\\Migrations\\CulinaryPlaceGallery','default','App',1658294214,17),(110,'2022-07-13-034423','App\\Database\\Migrations\\CulinaryPlaceVideo','default','App',1658294215,17),(111,'2022-07-13-034537','App\\Database\\Migrations\\SouvenirPlaceGallery','default','App',1658294216,17),(112,'2022-07-13-034547','App\\Database\\Migrations\\SouvenirPlaceVideo','default','App',1658294217,17),(113,'2022-07-13-034817','App\\Database\\Migrations\\Product','default','App',1658294217,17),(114,'2022-07-13-035312','App\\Database\\Migrations\\DetailProduct','default','App',1658294218,17),(115,'2022-07-13-035640','App\\Database\\Migrations\\Menu','default','App',1658294219,17),(116,'2022-07-13-035731','App\\Database\\Migrations\\DetailMenu','default','App',1658294219,17),(117,'2022-07-18-040720','App\\Database\\Migrations\\ReviewAtraction','default','App',1658294221,17);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review_atraction`
--

DROP TABLE IF EXISTS `review_atraction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review_atraction` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `atraction_id` varchar(8) NOT NULL,
  `comment` text,
  `likes` int NOT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `review_atraction_user_id_foreign` (`user_id`),
  KEY `review_atraction_atraction_id_foreign` (`atraction_id`),
  CONSTRAINT `review_atraction_atraction_id_foreign` FOREIGN KEY (`atraction_id`) REFERENCES `atraction` (`id`),
  CONSTRAINT `review_atraction_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review_atraction`
--

LOCK TABLES `review_atraction` WRITE;
/*!40000 ALTER TABLE `review_atraction` DISABLE KEYS */;
/*!40000 ALTER TABLE `review_atraction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `souvenir_place`
--

DROP TABLE IF EXISTS `souvenir_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `souvenir_place` (
  `id` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `geom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `souvenir_place`
--

LOCK TABLES `souvenir_place` WRITE;
/*!40000 ALTER TABLE `souvenir_place` DISABLE KEYS */;
INSERT INTO `souvenir_place` VALUES ('S01','Kios 1','sada','-0.600888','100.108818',NULL);
/*!40000 ALTER TABLE `souvenir_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `souvenir_place_gallery`
--

DROP TABLE IF EXISTS `souvenir_place_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `souvenir_place_gallery` (
  `id` varchar(8) NOT NULL,
  `souvenir_place_id` varchar(8) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `souvenir_place_gallery_souvenir_place_id_foreign` (`souvenir_place_id`),
  CONSTRAINT `souvenir_place_gallery_souvenir_place_id_foreign` FOREIGN KEY (`souvenir_place_id`) REFERENCES `souvenir_place` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `souvenir_place_gallery`
--

LOCK TABLES `souvenir_place_gallery` WRITE;
/*!40000 ALTER TABLE `souvenir_place_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `souvenir_place_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `souvenir_place_video`
--

DROP TABLE IF EXISTS `souvenir_place_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `souvenir_place_video` (
  `id` varchar(8) NOT NULL,
  `souvenir_place_id` varchar(8) NOT NULL,
  `url` varchar(255) NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `souvenir_place_video_souvenir_place_id_foreign` (`souvenir_place_id`),
  CONSTRAINT `souvenir_place_video_souvenir_place_id_foreign` FOREIGN KEY (`souvenir_place_id`) REFERENCES `souvenir_place` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `souvenir_place_video`
--

LOCK TABLES `souvenir_place_video` WRITE;
/*!40000 ALTER TABLE `souvenir_place_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `souvenir_place_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` bigint DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'m.agungmahardika12@gmail.com','agung','M.AgungMahardhika','Komplek Cimpago Permai Blok C',6281373517899,'foto_gw.jpeg','$2y$10$sgwROqqSG2DDuQ72A0GhOeNRXkkKUXUeTJlIxQhrpee3iimcBEENW',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-04-30 05:02:38','2022-04-30 05:02:38',NULL),(20,'user@gmail.com','userpertama','UserDoang','asdas',81373517899,'default.svg','$2y$10$wVnmzPFV0EJFNDRrEBWH.eaTZFSNsFLgeWCUhgDCBeLMtde4pAC/K',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-07-04 02:33:00','2022-07-04 02:33:00',NULL),(21,'haha@gmail.com','haha',NULL,NULL,NULL,'default.svg','$2y$10$.5YKZPxPkEIu0i.70kE6MOhTEMEM9a2fZp3QBkcVaPBOXmrGWWzK.',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-07-09 21:23:03','2022-07-09 21:23:03',NULL),(22,'qiva@mailinator.com','kovaka',NULL,NULL,NULL,'default.svg','$2y$10$qDiOZpaKF70UGdM2nMA5seubjHiUkMQRVli.0mIEvuFdNqQI9oZtC',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-07-17 09:57:14','2022-07-17 09:57:14',NULL),(23,'tes@gmail.com','nevymi',NULL,NULL,NULL,'default.svg','$2y$10$HrIkrTkYvrJl/5yey1Stw.wXqiiKRo4l4TbUJybKKiHSmHCurX0vy',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-07-19 01:48:32','2022-07-19 01:48:32',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worship_place`
--

DROP TABLE IF EXISTS `worship_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `worship_place` (
  `id` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` text,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `geom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worship_place`
--

LOCK TABLES `worship_place` WRITE;
/*!40000 ALTER TABLE `worship_place` DISABLE KEYS */;
INSERT INTO `worship_place` VALUES ('W01','Mesjid Nurul Iman',NULL,'asdas','-0.597369','100.109634',NULL);
/*!40000 ALTER TABLE `worship_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worship_place_gallery`
--

DROP TABLE IF EXISTS `worship_place_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `worship_place_gallery` (
  `id` varchar(8) NOT NULL,
  `worship_place_id` varchar(8) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `worship_place_gallery_worship_place_id_foreign` (`worship_place_id`),
  CONSTRAINT `worship_place_gallery_worship_place_id_foreign` FOREIGN KEY (`worship_place_id`) REFERENCES `worship_place` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worship_place_gallery`
--

LOCK TABLES `worship_place_gallery` WRITE;
/*!40000 ALTER TABLE `worship_place_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `worship_place_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worship_place_video`
--

DROP TABLE IF EXISTS `worship_place_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `worship_place_video` (
  `id` varchar(8) NOT NULL,
  `worship_place_id` varchar(8) NOT NULL,
  `url` varchar(255) NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `worship_place_video_worship_place_id_foreign` (`worship_place_id`),
  CONSTRAINT `worship_place_video_worship_place_id_foreign` FOREIGN KEY (`worship_place_id`) REFERENCES `worship_place` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worship_place_video`
--

LOCK TABLES `worship_place_video` WRITE;
/*!40000 ALTER TABLE `worship_place_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `worship_place_video` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-20 14:47:27
