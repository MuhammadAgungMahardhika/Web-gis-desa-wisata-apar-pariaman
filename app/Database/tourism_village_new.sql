-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: apar
-- ------------------------------------------------------
-- Server version	8.0.37

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
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activities` (
  `id` varchar(2) NOT NULL,
  `name` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES ('01','Makan Bajamba','Makan yang dilakukan secara bersama-sama dengan menggunakan pelapah pohon pisang sebagai letak alas makanan'),('02','Jelajahi Mangrove Dengan Kano','Menjelajahi hutan mangrove dengan kano'),('03','Menanam Mangrove','Menanam Mangrove langsung di Desa Wisata Apar'),('04','Maelo Pukek','Maelo pukek adalah kegiatan maelo jaring yang berisi hasil tangkapan ikan yang ditarik secara bersama'),('05','Melepas Tukik','Kegiatan melepaskan penyu-penyu ke lautan'),('06','Sekolah Tinggi Ilmu Beruk','Kegiatan melihat aksi beruk mengambil buah kelapa langsung dari pohon kelapa dan memberikannya ke wisatawan'),('07','Tracking dan Edukasi Mangrove','Kegiatan yang dilakukan dengan berjalan menjelajahi track hutan mangrove dan dipandu oleh pemandu wisata yang berpengalaman');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activities_gallery`
--

DROP TABLE IF EXISTS `activities_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activities_gallery` (
  `id` varchar(2) NOT NULL,
  `activities_id` varchar(2) NOT NULL,
  `url` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `activities_gallery_ibfk_1` (`activities_id`),
  CONSTRAINT `activities_gallery_ibfk_1` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities_gallery`
--

LOCK TABLES `activities_gallery` WRITE;
/*!40000 ALTER TABLE `activities_gallery` DISABLE KEYS */;
INSERT INTO `activities_gallery` VALUES ('06','02','1670323729_319612e83d38514d6f8b.png','2022-12-06 04:48:51','2022-12-06 04:48:51'),('07','03','1670323840_8355275f21786d8621da.jpg','2022-12-06 04:50:45','2022-12-06 04:50:45'),('08','03','1670323825_e0d14e2fb3a30376498b.jpeg','2022-12-06 04:50:45','2022-12-06 04:50:45'),('11','05','1670324209_847a1bba00ef6163651f.jpg','2022-12-06 04:59:27','2022-12-06 04:59:27'),('12','05','1670324342_14ab38b65d36e7d289e3.png','2022-12-06 04:59:27','2022-12-06 04:59:27'),('13','04','1670324392_3a7db948056879bc8a76.jpg','2022-12-06 05:00:36','2022-12-06 05:00:36'),('14','04','1670324425_f86442f3aef6a00a9e3b.jpg','2022-12-06 05:00:36','2022-12-06 05:00:36'),('15','06','1670324601_1521c87310e4830792d2.jpeg','2022-12-06 05:04:48','2022-12-06 05:04:48'),('16','06','1670324603_88e539aa630a86bfcf7d.jpeg','2022-12-06 05:04:48','2022-12-06 05:04:48'),('17','06','1670324677_3559261a0722236fe4db.jpg','2022-12-06 05:04:48','2022-12-06 05:04:48'),('18','01','1670324908_626a7e277c3ddc9332fa.jpg','2022-12-06 05:09:20','2022-12-06 05:09:20'),('19','01','1670324908_4957745e3f2203cc46fa.jpg','2022-12-06 05:09:20','2022-12-06 05:09:20'),('20','07','1670325136_2ce07ab26ddbe60909f6.jpg','2022-12-06 05:13:11','2022-12-06 05:13:11'),('21','07','1670325187_5855ee3afd4f771f9b85.jpg','2022-12-06 05:13:11','2022-12-06 05:13:11');
/*!40000 ALTER TABLE `activities_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apar`
--

DROP TABLE IF EXISTS `apar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apar` (
  `id` varchar(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type_of_tourism` varchar(50) DEFAULT NULL,
  `address` text,
  `open` time DEFAULT NULL,
  `close` time DEFAULT NULL,
  `status` text,
  `ticket` text,
  `contact_person` varchar(13) DEFAULT NULL,
  `facebook` text,
  `tiktok` text,
  `instagram` text,
  `youtube` text,
  `description` text,
  `video_url` text,
  `geom` geometry DEFAULT NULL,
  `geom_area` geometry DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apar`
--

LOCK TABLES `apar` WRITE;
/*!40000 ALTER TABLE `apar` DISABLE KEYS */;
INSERT INTO `apar` VALUES ('1','Apar Tourism village','Eco tourism, Education, Nature','Pariaman','08:00:00','17:00:00',NULL,'5000','6281373517899','desa_wisata_apar','','desa_wisata_apar','@desawisataaparkotapariaman9988','Desa wisata apar adalah sebuah desa wisata yang ada di Kota Pariaman Sumatera Barat yang mana memiliki konsep alam budaya dan kearifan lokal.\r\n\r\nDesa wisata apar sendiri menyajikan berbagai macam destinasi seperti hutan mangrove yang di lengkapi dengan tracking mangrove yang bisa memanjakan mata pengunjung untuk menikmati hutan mangrove dan di lenkapi dengan gazebo2 serta menara pandang. Selain itu pengunjung juga bisa melihat penyu didalam penangkaran dari penyu yang baru lahir sampai penyu yang sudah berumur. Pemandangan pantai diiringi dengan sunset disana juga dapat membuat pengunjung terpukau melihatnya.',NULL,_binary '\0\0\0\0\0\0\0hB\Ó}Y@ù\Ï\Â/\„ø',_binary '\Ê\0\0\0\0\0\0\0\0\0\0\0±\»\À\ƒY@Bn\Á„ø±\»W\œY@I˝?Kø„ø±\»\Î\‡Y@¿\\˛\œ,„ø∞\»ÚY@≤]•\‚\Ï;„ø∞\»´Y@Å±¢I„ø∞\»?Y@?#ù≥\ÓH„ø±\»W)Y@\n\Â¬∂D\„øB}\€4Y@¢\“\"®L\„øB}õVY@káó™P\„øB}?vY@âB˘î^Q\„øB}?£Y@ä4=≠∞J\„øC}áàY@ˇÑY¿jE\„øB}{îY@\◊\ﬁ˙<\„øA}_íY@#&n\Î.\„øB}/ïY@Zg(2\«%\„øB}ìY@\È\‘yB5!\„øB}ªrY@èÉjı\„øB};\\Y@f\…Ò©\„øB}wMY@a\‰e\∆Ò˚\‚øB}ó<Y@ëÒ\‘\›Cı\‚øC}´7Y@äæÚI\Ô\‚øC}\À&Y@¿ˆr\Ê\ÕÚ\‚øA}\„Y@*±\¬ˇ¸\‚øA}{\rY@wâ¥®a\„øC}sY@\«˘{	\„øB}˘Y@û\”¿p3\„øB}\ﬂY@hwÅoç\„øB}\”Y@5Ò¸vq„ø±\»\À\ƒY@Bn\Á\„ø');
/*!40000 ALTER TABLE `apar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apar_gallery`
--

DROP TABLE IF EXISTS `apar_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apar_gallery` (
  `id` varchar(2) NOT NULL,
  `apar_id` varchar(2) NOT NULL,
  `url` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `apar_gallery_ibfk_1` (`apar_id`),
  CONSTRAINT `apar_gallery_ibfk_1` FOREIGN KEY (`apar_id`) REFERENCES `apar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apar_gallery`
--

LOCK TABLES `apar_gallery` WRITE;
/*!40000 ALTER TABLE `apar_gallery` DISABLE KEYS */;
INSERT INTO `apar_gallery` VALUES ('01','1','1670488572_4ff8e5dd8b7fc8434af4.jpg','2022-12-08 02:36:17','2022-12-08 02:36:17'),('02','1','1670488572_2f0065706c8235583b8a.jpg','2022-12-08 02:36:17','2022-12-08 02:36:17');
/*!40000 ALTER TABLE `apar_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atraction`
--

DROP TABLE IF EXISTS `atraction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atraction` (
  `id` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `category_id` varchar(1) DEFAULT NULL,
  `open` time DEFAULT NULL,
  `close` time DEFAULT NULL,
  `employe` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  `contact_person` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `video_url` text,
  `geom` geometry DEFAULT NULL,
  `geom_area` geometry DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `atraction_ibfk_1` (`category_id`),
  CONSTRAINT `atraction_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_atraction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atraction`
--

LOCK TABLES `atraction` WRITE;
/*!40000 ALTER TABLE `atraction` DISABLE KEYS */;
INSERT INTO `atraction` VALUES ('01','Apar Mangrove Park','1','08:00:00','18:00:00','Fadel Muhammad',3000,'6282390504444','Apar Mangrove Park adalah wisata menjelajahi keindahan hutan mangrove di Desa Wisata Apar dilengkapi dengan gazebo dan menara pandang untuk melakukan spot berfoto atau sekedar menikmati pemandangan alam.','mangrove.mp4',_binary '\0\0\0\0\0\0\0Ad\”BY@Ωπ\«\Î$/\„ø',_binary '\Ê\0\0\0\0\0\0\0\0\0\0\0i\ ˙\ÔY@\ÁΩ\‰ë=.\„øi\ QÛY@zï\\-\„øi ù¡ÛY@C{†\”¡-\„øi ù¸ÙY@{%\„\‘g-\„øj\ ˜Y@|˜°êó.\„øi ù\Ã˜Y@ê0£Mm/\„øi\ \“˘Y@Ãè\0ê\ƒ.\„øj ù}˚Y@>ÄáO\Ê.\„øiRM\÷Y@A¢•2\„øh ùi\0Y@i\ÃAÒ2\„øi ùP˚Y@Å*\rè/\„øj ù˙Y@\0ªMö/\„øi ùü˜Y@r‡±âÜ0\„øh\ ıY@|˜°êó.\„øh\ ÙY@˙$_èÒ.\„øi\ \ ÚY@©\ \÷˙-\„øi\ ÆY@ú⁄Ø\€.\„øi\ ˙\ÔY@\ÁΩ\‰ë=.\„ø'),('02','UPT Konservasi Penyu','1','08:00:00','19:00:00','Fadel Muhammad',0,'082390504444','UPT Konservasi Penyu adalah sebuah tempat penangkaran bagi 3 jenis penyu dari 7 jenis penyu yang ada di dunia. Mulai dari penyu bertelur sampai penyu dapat dilepaskan kembali ke lautan. Pelepasan penyu dilakukan dekat pantai di UPT Konservasi Penyu','turtle.mp4',_binary '\0\0\0\0\0\0\0π\'º\¬\nY@˙]\\\”QH\„ø',_binary '\Ê\0\0\0\0\0\0\0\0\0\0\0•\ÏV	Y@∂2Ω∂^G„ø•\Ïé\—\rY@\‡xº\…E„ø¶\ÏéGY@õﬂüu≠G„ø§\ÏEY@\ZL^∞ I„ø•\ÏV	Y@∂2Ω∂^G\„ø');
/*!40000 ALTER TABLE `atraction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atraction_gallery`
--

DROP TABLE IF EXISTS `atraction_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atraction_gallery` (
  `id` varchar(2) NOT NULL,
  `atraction_id` varchar(2) DEFAULT NULL,
  `url` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `atraction_gallery_id_foreign` (`atraction_id`) /*!80000 INVISIBLE */,
  CONSTRAINT `atraction_gallery_ibfk_1` FOREIGN KEY (`atraction_id`) REFERENCES `atraction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 KEY_BLOCK_SIZE=1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atraction_gallery`
--

LOCK TABLES `atraction_gallery` WRITE;
/*!40000 ALTER TABLE `atraction_gallery` DISABLE KEYS */;
INSERT INTO `atraction_gallery` VALUES ('01','01','1669605716_eca982e626207add7010.jpg','2022-11-27 21:22:05','2022-11-27 21:22:05'),('02','01','1669605718_f09bff8bc478b80efa08.jpg','2022-11-27 21:22:05','2022-11-27 21:22:05'),('03','01','1669605721_67dab4d26eb877e5bfaa.jpg','2022-11-27 21:22:05','2022-11-27 21:22:05'),('04','01','1669605724_7e77fef5a73e6038a353.jpg','2022-11-27 21:22:05','2022-11-27 21:22:05'),('05','02','1670036601_a906ec6d378eda574407.jpg','2022-12-02 21:03:39','2022-12-02 21:03:39'),('06','02','1670036605_a39d98d7b56d3f6e5791.jpg','2022-12-02 21:03:39','2022-12-02 21:03:39'),('07','02','1670036608_1cf2b8737343c8be6922.jpg','2022-12-02 21:03:39','2022-12-02 21:03:39'),('08','02','1670036612_b92e24d34b2052ecd6d2.jpg','2022-12-02 21:03:39','2022-12-02 21:03:39');
/*!40000 ALTER TABLE `atraction_gallery` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_users`
--

LOCK TABLES `auth_groups_users` WRITE;
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
INSERT INTO `auth_groups_users` VALUES (1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=602 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_logins`
--

LOCK TABLES `auth_logins` WRITE;
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` VALUES (1,'::1','m.agungmahardika12@gmail.com',18,'2022-04-30 04:04:43',1),(2,'::1','m.agungmahardika12@gmail.com',18,'2022-04-30 04:24:39',1),(3,'::1','m.agungmahardika12@gmail.com',18,'2022-04-30 04:41:25',1),(4,'::1','m.agungmahardika12@gmail.com',NULL,'2022-04-30 04:41:32',0),(5,'::1','m.agungmahardika12@gmail.com',18,'2022-04-30 04:41:40',1),(6,'::1','m.agungmahardika12@gmail.com',NULL,'2022-04-30 04:44:25',0),(7,'::1','m.agungmahardika12@gmail.com',18,'2022-04-30 04:44:31',1),(8,'::1','m.agungmahardika12@gmail.com',18,'2022-04-30 04:50:10',1),(9,'::1','asd',NULL,'2022-04-30 04:53:22',0),(10,'::1','agun',NULL,'2022-04-30 04:53:30',0),(11,'::1','agung',NULL,'2022-04-30 04:53:38',0),(12,'::1','m.agungmahardika12@gmail.com',NULL,'2022-04-30 04:56:14',0),(13,'::1','m.agungmahardika12@gmail.com',24,'2022-04-30 04:56:35',1),(14,'::1','m.agungmahardika12@gmail.com',24,'2022-04-30 04:58:02',1),(15,'::1','m.agungmahardika12@gmail.com',24,'2022-04-30 04:58:12',1),(16,'::1','m.agungmahardika12@gmail.com',24,'2022-04-30 04:59:03',1),(17,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 05:02:49',1),(18,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:09:54',1),(19,'::1','tes@gmail.com',4,'2022-04-30 06:10:29',1),(20,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:10:49',1),(21,'::1','tes@gmail.com',4,'2022-04-30 06:13:48',1),(22,'::1','tes@gmail.com',4,'2022-04-30 06:14:51',1),(23,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:15:01',1),(24,'::1','tes@gmail.com',4,'2022-04-30 06:15:34',1),(25,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:38:13',1),(26,'::1','tes@gmail.com',4,'2022-04-30 06:38:23',1),(27,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:40:48',1),(28,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:45:40',1),(29,'::1','tes@gmail.com',4,'2022-04-30 06:45:49',1),(30,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:46:04',1),(31,'::1','tes@gmail.com',4,'2022-04-30 06:46:49',1),(32,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:46:57',1),(33,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 06:47:28',1),(34,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 07:48:13',1),(35,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 07:54:46',1),(36,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 07:57:16',1),(37,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 07:59:05',1),(38,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 08:02:40',1),(39,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 08:03:04',1),(40,'::1','tes@gmail.com',4,'2022-04-30 08:05:42',1),(41,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 08:08:17',1),(42,'::1','agung',NULL,'2022-04-30 08:43:09',0),(43,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 08:43:20',1),(44,'::1','m.agungmahardika12@gmail.com',NULL,'2022-04-30 08:43:29',0),(45,'::1','m.agungmahardika12@gmail.com',NULL,'2022-04-30 08:44:45',0),(46,'::1','m.agungmahardika12@gmail.co',NULL,'2022-04-30 08:44:57',0),(47,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 08:45:03',1),(48,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 08:51:31',1),(49,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 09:11:03',1),(50,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 09:25:41',1),(51,'::1','dygigegary@mailinator.com',5,'2022-04-30 09:26:31',1),(52,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 09:26:45',1),(53,'::1','dygigegary@mailinator.com',5,'2022-04-30 09:37:08',1),(54,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 09:41:10',1),(55,'::1','tedobax@mailinator.com',6,'2022-04-30 09:44:20',1),(56,'::1','m.agungmahardika12@gmail.com',1,'2022-04-30 09:50:32',1),(57,'::1','dygigegary@mailinator.com',5,'2022-05-01 03:21:06',1),(58,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 03:21:19',1),(59,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 03:35:21',1),(60,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 03:42:25',1),(61,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 03:42:50',1),(62,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 03:45:43',1),(63,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 03:48:18',1),(64,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 03:48:33',1),(65,'::1','dygigegary@mailinator.com',5,'2022-05-01 04:14:44',1),(66,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 04:28:33',1),(67,'::1','dygigegary@mailinator.com',5,'2022-05-01 04:41:48',1),(68,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 04:43:19',1),(69,'::1','dygigegary@mailinator.com',5,'2022-05-01 04:50:04',1),(70,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 04:50:29',1),(71,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 05:24:14',1),(72,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 05:38:40',1),(73,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 06:50:57',1),(74,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 06:58:04',1),(75,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 07:01:20',1),(76,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 07:08:46',1),(77,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 07:15:42',1),(78,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 07:20:22',1),(79,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 07:28:46',1),(80,'::1','dygigegary@mailinator.com',5,'2022-05-01 07:29:19',1),(81,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 07:32:13',1),(82,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 08:04:21',1),(83,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 08:12:37',1),(84,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 08:23:04',1),(85,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 08:26:25',1),(86,'::1','dygigegary@mailinator.com',5,'2022-05-01 08:30:13',1),(87,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 08:30:36',1),(88,'::1','m.agungmahardika12@gmail.com',1,'2022-05-01 09:17:06',1),(89,'::1','m.agungmahardika12@gmail.com',1,'2022-05-02 21:28:33',1),(90,'::1','dygigegary@mailinator.com',5,'2022-05-02 21:28:55',1),(91,'::1','m.agungmahardika12@gmail.com',1,'2022-05-02 22:21:13',1),(92,'::1','m.agungmahardika12@gmail.com',1,'2022-05-04 11:16:12',1),(93,'::1','dygigegary@mailinator.com',5,'2022-05-04 11:16:50',1),(94,'::1','m.agungmahardika12@gmail.com',1,'2022-05-04 11:17:46',1),(95,'::1','m.agungmahardika12@gmail.com',1,'2022-05-04 11:34:45',1),(96,'::1','m.agungmahardika12@gmail.com',1,'2022-05-04 21:27:08',1),(97,'::1','m.agungmahardika12@gmail.com',1,'2022-05-05 11:54:13',1),(98,'::1','m.agungmahardika12@gmail.com',1,'2022-05-05 23:36:31',1),(99,'::1','m.agungmahardika12@gmail.com',1,'2022-05-05 23:36:53',1),(100,'::1','wasyjipymo@mailinator.com',10,'2022-05-05 23:42:53',1),(101,'::1','m.agungmahardika12@gmail.com',1,'2022-05-07 11:48:51',1),(102,'::1','dygigegary@mailinator.com',5,'2022-05-07 12:01:10',1),(103,'::1','m.agungmahardika12@gmail.com',1,'2022-05-07 12:01:58',1),(104,'::1','agung',NULL,'2022-05-07 22:41:51',0),(105,'::1','m.agungmahardika12@gmail.com',1,'2022-05-07 22:41:58',1),(106,'::1','m.agungmahardika12@gmail.com',1,'2022-05-08 00:09:32',1),(107,'::1','dygigegary@mailinator.com',5,'2022-05-08 00:13:23',1),(108,'::1','m.agungmahardika12@gmail.com',1,'2022-05-08 00:22:41',1),(109,'::1','m.agungmahardika12@gmail.com',1,'2022-05-08 02:27:04',1),(110,'::1','m.agungmahardika12@gmail.com',1,'2022-05-08 02:31:10',1),(111,'::1','m.agungmahardika12@gmail.com',1,'2022-05-10 02:03:50',1),(112,'::1','dygigegary@mailinator.com',5,'2022-05-10 09:16:51',1),(113,'::1','cite@mailinator.com',13,'2022-05-10 09:17:24',1),(114,'::1','m.agungmahardika12@gmail.com',1,'2022-05-10 10:26:05',1),(115,'::1','agung',NULL,'2022-05-10 11:20:06',0),(116,'::1','m.agungmahardika12@gmail.com',1,'2022-05-10 11:20:11',1),(117,'::1','m.agungmahardika12@gmail.com',1,'2022-05-10 11:35:55',1),(118,'::1','dygigegary@mailinator.com',5,'2022-05-10 11:36:07',1),(119,'::1','m.agungmahardika12@gmail.com',1,'2022-05-19 20:56:13',1),(120,'::1','m.agungmahardika12@gmail.com',1,'2022-05-19 21:01:22',1),(121,'::1','m.agungmahardika12@gmail.com',1,'2022-05-19 21:38:26',1),(122,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:13:01',1),(123,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:17:15',1),(124,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:17:35',1),(125,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:19:00',1),(126,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:20:26',1),(127,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:27:17',1),(128,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:27:48',1),(129,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:28:37',1),(130,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:29:44',1),(131,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:30:00',1),(132,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:42:09',1),(133,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:42:27',1),(134,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:45:11',1),(135,'::1','m.agungmahardika12@gmail.com',1,'2022-05-20 09:51:19',1),(136,'::1','m.agungmahardika12@gmail.com',1,'2022-05-22 04:58:17',1),(137,'::1','m.agungmahardika12@gmail.com',1,'2022-05-22 07:18:00',1),(138,'::1','m.agungmahardika12@gmail.com',1,'2022-05-22 07:38:34',1),(139,'::1','m.agungmahardika12@gmail.com',1,'2022-05-22 07:39:56',1),(140,'::1','m.agungmahardika12@gmail.com',1,'2022-05-22 08:57:48',1),(141,'::1','m.agungmahardika12@gmail.com',1,'2022-05-22 09:37:49',1),(142,'::1','m.agungmahardika12@gmail.com',1,'2022-05-22 09:51:51',1),(143,'::1','m.agungmahardika12@gmail.com',1,'2022-05-23 03:31:07',1),(144,'::1','m.agungmahardika12@gmail.com',1,'2022-05-23 09:33:35',1),(145,'::1','m.agungmahardika12@gmail.com',1,'2022-05-25 20:59:12',1),(146,'::1','m.agungmahardika12@gmail.com',1,'2022-05-26 02:48:16',1),(147,'::1','m.agungmahardika12@gmail.com',1,'2022-05-30 12:14:13',1),(148,'::1','m.agungmahardika12@gmail.com',1,'2022-05-30 21:18:00',1),(149,'::1','m.agungmahardika12@gmail.com',1,'2022-05-31 22:54:56',1),(150,'::1','m.agungmahardika12@gmail.com',1,'2022-05-31 23:10:32',1),(151,'::1','m.agungmahardika12@gmail.com',1,'2022-05-31 23:13:38',1),(152,'::1','tes@gmail.com',NULL,'2022-05-31 23:15:06',0),(153,'::1','tes@gmail.com',NULL,'2022-05-31 23:15:17',0),(154,'::1','tes123',NULL,'2022-05-31 23:15:27',0),(155,'::1','tes@gmail.com',NULL,'2022-05-31 23:15:38',0),(156,'::1','m.agungmahardika12@gmail.com',1,'2022-05-31 23:15:45',1),(157,'::1','agung',NULL,'2022-06-29 04:03:56',0),(158,'::1','agung',NULL,'2022-06-29 04:04:03',0),(159,'::1','agung',NULL,'2022-06-29 04:04:22',0),(160,'::1','agung',NULL,'2022-06-29 10:20:38',0),(161,'::1','Agung',NULL,'2022-06-29 10:20:54',0),(162,'::1','m.agungmahardika12@gmail.com',1,'2022-06-29 10:22:59',1),(163,'::1','m.agungmahardika12@gmail.com',1,'2022-06-29 15:25:02',1),(164,'::1','m.agungmahardika12@gmail.com',1,'2022-06-30 01:28:00',1),(165,'::1','m.agungmahardika12@gmail.com',1,'2022-06-30 01:30:10',1),(166,'::1','m.agungmahardika12@gmail.com',1,'2022-06-30 22:02:25',1),(167,'::1','m.agungmahardika12@gmail.com',1,'2022-06-30 23:03:09',1),(168,'::1','m.agungmahardika12@gmail.com',1,'2022-07-01 02:27:13',1),(169,'::1','agung',NULL,'2022-07-01 05:17:13',0),(170,'::1','m.agungmahardika12@gmail.com',1,'2022-07-01 05:17:17',1),(171,'::1','m.agungmahardika12@gmail.com',1,'2022-07-01 08:17:57',1),(172,'::1','m.agungmahardika12@gmail.com',1,'2022-07-01 09:56:21',1),(173,'::1','m.agungmahardika12@gmail.com',1,'2022-07-01 09:59:09',1),(174,'::1','m.agungmahardika12@gmail.com',1,'2022-07-01 09:59:50',1),(175,'::1','agung@gmail.com',16,'2022-07-01 12:02:30',1),(176,'::1','m.agungmahardika12@gmail.com3',1,'2022-07-01 12:08:35',1),(177,'::1','m.agungmahardika12@gmail.com3',1,'2022-07-01 18:00:27',1),(178,'::1','m.agungmahardika12@gmail.com3',1,'2022-07-02 00:28:17',1),(179,'::1','agung',NULL,'2022-07-02 00:47:56',0),(180,'::1','m.agungmahardika12@gmail.com3',1,'2022-07-02 00:48:01',1),(181,'::1','agung',NULL,'2022-07-02 20:54:37',0),(182,'::1','agung',NULL,'2022-07-02 20:54:43',0),(183,'::1','agung',NULL,'2022-07-02 20:54:52',0),(184,'::1','m.agungmahardika12@gmail.com',1,'2022-07-02 20:54:59',1),(185,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 02:18:06',1),(186,'::1','agungs',NULL,'2022-07-03 05:38:09',0),(187,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 05:38:13',1),(188,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 11:37:49',1),(189,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 19:49:50',1),(190,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 21:57:31',1),(191,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 22:12:36',1),(192,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 22:15:39',1),(193,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 22:28:39',1),(194,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 22:28:40',1),(195,'::1','oke@gmail.com',17,'2022-07-03 22:29:57',1),(196,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 22:30:13',1),(197,'::1','poki@gmail.com',19,'2022-07-03 22:56:06',1),(198,'::1','m.agungmahardika12@gmail.com',1,'2022-07-03 22:56:33',1),(199,'::1','m.agungmahardika12@gmail.com',1,'2022-07-04 02:23:40',1),(200,'::1','user@gmail.com',20,'2022-07-04 02:33:12',1),(201,'::1','m.agungmahardika12@gmail.com',1,'2022-07-04 02:33:35',1),(202,'::1','user@gmail.com',20,'2022-07-04 02:34:11',1),(203,'::1','m.agungmahardika12@gmail.com',1,'2022-07-04 02:34:24',1),(204,'::1','m.agungmahardika12@gmail.com',1,'2022-07-04 11:59:40',1),(205,'::1','m.agungmahardika12@gmail.com',1,'2022-07-04 21:27:52',1),(206,'::1','m.agungmahardika12@gmail.com',1,'2022-07-05 08:36:55',1),(207,'::1','m.agungmahardika12@gmail.com',1,'2022-07-06 00:50:04',1),(208,'::1','m.agungmahardika12@gmail.com',1,'2022-07-06 04:45:07',1),(209,'::1','m.agungmahardika12@gmail.com',1,'2022-07-06 06:33:26',1),(210,'::1','m.agungmahardika12@gmail.com',1,'2022-07-06 10:35:47',1),(211,'::1','m.agungmahardika12@gmail.com',1,'2022-07-07 22:45:31',1),(212,'::1','m.agungmahardika12@gmail.com',1,'2022-07-08 04:37:25',1),(213,'::1','m.agungmahardika12@gmail.com',1,'2022-07-08 08:42:55',1),(214,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 07:04:30',1),(215,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 20:17:19',1),(216,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 20:20:52',1),(217,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 20:27:02',1),(218,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 21:06:46',1),(219,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 21:18:42',1),(220,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 21:19:34',1),(221,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 21:20:08',1),(222,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 21:20:47',1),(223,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 21:21:14',1),(224,'::1','haha@gmail.com',21,'2022-07-09 21:23:10',1),(225,'::1','m.agungmahardika12@gmail.com',1,'2022-07-09 23:57:52',1),(226,'::1','haha@gmail.com',21,'2022-07-10 01:25:11',1),(227,'::1','m.agungmahardika12@gmail.com',1,'2022-07-10 04:56:35',1),(228,'::1','m.agungmahardika12@gmail.com',1,'2022-07-12 09:10:16',1),(229,'::1','m.agungmahardika12@gmail.com',1,'2022-07-13 23:29:30',1),(230,'::1','m.agungmahardika12@gmail.com',1,'2022-07-14 07:26:36',1),(231,'::1','m.agungmahardika12@gmail.com',1,'2022-07-15 02:19:31',1),(232,'::1','m.agungmahardika12@gmail.com',1,'2022-07-15 09:17:49',1),(233,'::1','m.agungmahardika12@gmail.com',1,'2022-07-16 05:05:06',1),(234,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 06:33:28',1),(235,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 09:45:54',1),(236,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 09:52:18',1),(237,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 09:53:18',1),(238,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 09:55:13',1),(239,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 09:59:49',1),(240,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 20:03:21',1),(241,'::1','m.agungmahardika12@gmail.com',1,'2022-07-17 20:44:27',1),(242,'::1','m.agungmahardika12@gmail.com',1,'2022-07-18 01:28:48',1),(243,'::1','m.agungmahardika12@gmail.com',1,'2022-07-19 01:17:16',1),(244,'::1','tes@gmail.com',NULL,'2022-07-19 01:48:10',0),(245,'::1','tes@gmail.com',23,'2022-07-19 01:48:42',1),(246,'::1','m.agungmahardika12@gmail.com',1,'2022-07-19 08:17:10',1),(247,'::1','m.agungmahardika12@gmail.com',1,'2022-07-20 00:01:28',1),(248,'::1','m.agungmahardika12@gmail.com',1,'2022-07-20 04:14:10',1),(249,'::1','m.agungmahardika12@gmail.com',1,'2022-07-20 08:00:04',1),(250,'::1','m.agungmahardika12@gmail.com',1,'2022-07-20 11:59:32',1),(251,'::1','m.agungmahardika12@gmail.com',1,'2022-07-22 04:55:40',1),(252,'::1','m.agungmahardika12@gmail.com',1,'2022-08-01 03:13:45',1),(253,'::1','m.agungmahardika12@gmail.com',1,'2022-08-02 02:13:09',1),(254,'::1','m.agungmahardika12@gmail.com',1,'2022-08-02 02:58:42',1),(255,'::1','m.agungmahardika12@gmail.com',1,'2022-08-02 03:05:01',1),(256,'::1','m.agungmahardika12@gmail.com',1,'2022-08-02 04:11:03',1),(257,'::1','m.agungmahardika12@gmail.com',1,'2022-08-02 04:16:38',1),(258,'::1','m.agungmahardika12@gmail.com',1,'2022-08-02 04:33:13',1),(259,'::1','m.agungmahardika12@gmail.com',1,'2022-08-02 07:27:13',1),(260,'::1','tes@gmail.com',23,'2022-08-02 08:11:43',1),(261,'::1','m.agungmahardika12@gmail.com',1,'2022-08-02 08:18:25',1),(262,'::1','m.agungmahardika12@gmail.com',1,'2022-08-02 22:20:40',1),(263,'::1','tes@gmail.com',23,'2022-08-02 22:27:44',1),(264,'::1','m.agungmahardika12@gmail.com',1,'2022-08-03 01:37:12',1),(265,'::1','m.agungmahardika12@gmail.com',1,'2022-08-03 01:42:10',1),(266,'::1','m.agungmahardika12@gmail.com',1,'2022-08-03 02:29:44',1),(267,'::1','tes@gmail.com',23,'2022-08-07 05:56:42',1),(268,'::1','m.agungmahardika12@gmail.com',1,'2022-08-07 11:22:12',1),(269,'::1','m.agungmahardika12@gmail.com',1,'2022-08-07 21:07:23',1),(270,'::1','m.agungmahardika12@gmail.com',1,'2022-08-08 10:06:32',1),(271,'::1','tes@gmail.com',23,'2022-08-08 22:47:08',1),(272,'::1','tes@gmail.com',23,'2022-08-09 04:45:01',1),(273,'::1','tes@gmail.com',23,'2022-08-09 19:36:49',1),(274,'::1','m.agungmahardika12@gmail.com',1,'2022-08-10 08:40:52',1),(275,'::1','m.agungmahardika12@gmail.com',1,'2022-08-10 11:50:48',1),(276,'::1','tes@gmail.com',23,'2022-08-11 03:49:01',1),(277,'::1','m.agungmahardika12@gmail.com',1,'2022-08-11 03:49:44',1),(278,'::1','tes@gmail.com',23,'2022-08-11 03:51:03',1),(279,'::1','tes@gmail.com',23,'2022-08-11 21:48:40',1),(280,'::1','tes@gmail.com',23,'2022-08-13 22:53:18',1),(281,'::1','m.agungmahardika12@gmail.com',1,'2022-08-14 08:47:18',1),(282,'::1','m.agungmahardika12@gmail.com',1,'2022-08-15 06:14:00',1),(283,'::1','a@gmail.com',24,'2022-08-15 08:01:13',1),(284,'::1','m.agungmahardika12@gmail.com',1,'2022-08-15 16:36:43',1),(285,'::1','m.agungmahardika12@gmail.com',1,'2022-08-16 02:42:36',1),(286,'::1','m.agungmahardika12@gmail.com',1,'2022-08-18 07:06:44',1),(287,'::1','m.agungmahardika12@gmail.com',1,'2022-08-19 19:56:23',1),(288,'::1','m.agungmahardika12@gmail.com',1,'2022-08-21 10:46:57',1),(289,'192.168.115.62','m.agungmahardika12@gmail.com',1,'2022-08-24 03:50:40',1),(290,'::1','m.agungmahardika12@gmail.com',1,'2022-08-24 03:52:50',1),(291,'::1','tes@gmail.com',23,'2022-08-24 04:02:26',1),(292,'::1','m.agungmahardika12@gmail.com',1,'2022-08-24 04:05:59',1),(293,'::1','m.agungmahardika12@gmail.com',1,'2022-08-24 04:16:07',1),(294,'::1','tes@gmail.com',23,'2022-08-24 04:16:27',1),(295,'::1','m.agungmahardika12@gmail.com',1,'2022-08-24 04:18:13',1),(296,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-08-28 21:39:03',1),(297,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-08-29 19:14:33',1),(298,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-08-30 04:42:35',1),(299,'::1','m.agungmahardika12@gmail.com',1,'2022-08-30 08:13:54',1),(300,'::1','m.agungmahardika12@gmail.com',1,'2022-08-30 19:40:00',1),(301,'::1','m.agungmahardika12@gmail.com',1,'2022-08-31 05:20:10',1),(302,'::1','m.agungmahardika12@gmail.com',1,'2022-08-31 21:47:36',1),(303,'::1','m.agungmahardika12@gmail.com',1,'2022-09-01 19:16:05',1),(304,'::1','m.agungmahardika12@gmail.com',1,'2022-09-02 20:08:44',1),(305,'::1','m.agungmahardika12@gmail.com',1,'2022-09-03 05:05:33',1),(306,'::1','m.agungmahardika12@gmail.com',1,'2022-09-03 08:53:41',1),(307,'::1','tes@gmail.com',23,'2022-09-03 09:03:14',1),(308,'::1','m.agungmahardika12@gmail.com',1,'2022-09-03 09:05:12',1),(309,'::1','m.agungmahardika12@gmail.com',1,'2022-09-03 12:04:30',1),(310,'::1','m.agungmahardika12@gmail.com',1,'2022-09-04 19:05:18',1),(311,'::1','m.agungmahardika12@gmail.com',1,'2022-09-05 17:04:12',1),(312,'::1','m.agungmahardika12@gmail.com',1,'2022-09-05 19:02:20',1),(313,'::1','tes@gmail.com',23,'2022-09-05 21:59:45',1),(314,'::1','tes@gmail.com',23,'2022-09-05 22:00:13',1),(315,'::1','tes@gmail.com',23,'2022-09-05 22:02:02',1),(316,'::1','tes@gmail.com',NULL,'2022-09-05 22:09:42',0),(317,'::1','m.agungmahardika12@gmail.com',1,'2022-09-05 22:10:00',1),(318,'::1','m.agungmahardika12@gmail.com',1,'2022-09-05 23:02:59',1),(319,'::1','tes@gmail.com',NULL,'2022-09-05 23:03:20',0),(320,'::1','tes@gmail.com',NULL,'2022-09-05 23:03:29',0),(321,'::1','tes@gmail.com',NULL,'2022-09-05 23:03:48',0),(322,'::1','tes@gmail.com',23,'2022-09-05 23:03:55',1),(323,'::1','m.agungmahardika12@gmail.com',1,'2022-09-05 23:06:53',1),(324,'::1','tes@gmail.com',23,'2022-09-05 23:08:35',1),(325,'::1','m.agungmahardika12@gmail.com',1,'2022-09-05 23:23:25',1),(326,'::1','m.agungmahardika12@gmail.com',1,'2022-09-06 09:10:15',1),(327,'::1','tes@gmail.com',NULL,'2022-09-06 09:57:47',0),(328,'::1','tes@gmail.com',23,'2022-09-06 09:57:59',1),(329,'::1','m.agungmahardika12@gmail.com',1,'2022-09-06 10:05:22',1),(330,'::1','tes@gmail.com',23,'2022-09-06 10:36:22',1),(331,'::1','m.agungmahardika12@gmail.com',1,'2022-09-06 11:43:22',1),(332,'::1','tes@gmail.com',NULL,'2022-09-06 11:45:24',0),(333,'::1','tes@gmail.com',23,'2022-09-06 11:45:31',1),(334,'::1','tes@gmail.com',23,'2022-09-06 12:19:27',1),(335,'::1','m.agungmahardika12@gmail.com',1,'2022-09-07 00:51:29',1),(336,'::1','m.agungmahardika12@gmail.com',1,'2022-09-07 04:46:36',1),(337,'::1','m.agungmahardika12@gmail.com',1,'2022-09-07 09:02:59',1),(338,'::1','m.agungmahardika12@gmail.com',1,'2022-09-07 18:34:40',1),(339,'::1','m.agungmahardika12@gmail.com',1,'2022-09-07 20:26:50',1),(340,'::1','m.agungmahardika12@gmail.com',1,'2022-09-12 09:06:40',1),(341,'::1','m.agungmahardika12@gmail.com',1,'2022-09-12 09:10:30',1),(342,'::1','m.agungmahardika12@gmail.com',1,'2022-09-12 21:42:47',1),(343,'::1','m.agungmahardika12@gmail.com',1,'2022-09-12 21:43:23',1),(344,'::1','m.agungmahardika12@gmail.com',1,'2022-09-12 21:53:14',1),(345,'::1','m.agungmahardika12@gmail.com',1,'2022-09-12 21:56:26',1),(346,'::1','m.agungmahardika12@gmail.com',1,'2022-09-12 22:10:05',1),(347,'::1','m.agungmahardika12@gmail.com',1,'2022-09-12 22:11:44',1),(348,'::1','m.agungmahardika12@gmail.com',1,'2022-09-12 22:12:42',1),(349,'::1','agungs',NULL,'2022-09-12 22:23:35',0),(350,'::1','m.agungmahardika12@gmail.com',1,'2022-09-12 22:23:38',1),(351,'::1','m.agungmahardika12@gmail.com',1,'2022-09-12 22:23:49',1),(352,'::1','agungs',NULL,'2022-09-12 22:23:51',0),(353,'::1','m.agungmahardika12@gmail.com',1,'2022-09-12 22:23:54',1),(354,'::1','agung',NULL,'2022-09-12 22:23:57',0),(355,'::1','m.agungmahardika12@gmail.com',1,'2022-09-12 22:24:00',1),(356,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-12 23:21:43',1),(357,'192.168.100.172','agungs',NULL,'2022-09-12 23:21:49',0),(358,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-12 23:21:52',1),(359,'192.168.100.172','tes@gmail.com',23,'2022-09-12 23:21:58',1),(360,'192.168.100.172','tes@gmail.co',NULL,'2022-09-12 23:22:01',0),(361,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-12 23:22:05',1),(362,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-12 23:24:00',1),(363,'192.168.100.172','agung',NULL,'2022-09-12 23:24:14',0),(364,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-12 23:24:20',1),(365,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-12 23:29:35',1),(366,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-12 23:43:57',1),(367,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-12 23:56:50',1),(368,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 00:00:38',1),(369,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 00:01:55',1),(370,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 00:26:05',1),(371,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 05:00:51',1),(372,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 05:01:12',1),(373,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 10:18:51',1),(374,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 10:19:02',1),(375,'192.168.100.172','tes@gmail.com',23,'2022-09-13 10:19:37',1),(376,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 10:20:43',1),(377,'192.168.100.172','tes@gmail.com',23,'2022-09-13 10:21:01',1),(378,'192.168.100.172','tes@gmail.com',23,'2022-09-13 10:29:33',1),(379,'192.168.100.172','agung',NULL,'2022-09-13 10:30:45',0),(380,'192.168.100.172','agung',NULL,'2022-09-13 10:30:50',0),(381,'192.168.100.172','agung',NULL,'2022-09-13 10:31:18',0),(382,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 10:31:27',1),(383,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 10:33:48',1),(384,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 10:35:18',1),(385,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 10:35:51',1),(386,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 10:36:24',1),(387,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 10:38:06',1),(388,'192.168.100.172','tes@gmail.com',23,'2022-09-13 10:38:20',1),(389,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 10:50:16',1),(390,'192.168.100.172','agung',NULL,'2022-09-13 10:55:06',0),(391,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 10:55:19',1),(392,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 11:01:02',1),(393,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 11:02:17',1),(394,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 11:11:22',1),(395,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 11:15:08',1),(396,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 11:23:54',1),(397,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 11:26:25',1),(398,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 11:31:14',1),(399,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 20:01:12',1),(400,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 21:25:29',1),(401,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 21:31:33',1),(402,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 21:33:34',1),(403,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 21:36:36',1),(404,'192.168.100.172','agung',NULL,'2022-09-13 21:37:31',0),(405,'192.168.100.172','agung',NULL,'2022-09-13 21:37:34',0),(406,'192.168.100.172','asd',NULL,'2022-09-13 21:38:58',0),(407,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 21:39:18',1),(408,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 21:41:31',1),(409,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 21:43:12',1),(410,'192.168.100.172','agung',NULL,'2022-09-13 21:44:11',0),(411,'192.168.100.172','agung',NULL,'2022-09-13 21:50:20',0),(412,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 21:50:37',1),(413,'192.168.100.172','agung',NULL,'2022-09-13 21:50:47',0),(414,'192.168.100.172','agung',NULL,'2022-09-13 21:55:53',0),(415,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 21:57:56',1),(416,'192.168.100.172','agung',NULL,'2022-09-13 21:59:54',0),(417,'192.168.100.172','agung',NULL,'2022-09-13 21:59:57',0),(418,'192.168.100.172','tes',NULL,'2022-09-13 22:00:06',0),(419,'192.168.100.172','agung',NULL,'2022-09-13 22:01:23',0),(420,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 22:01:31',1),(421,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 22:03:09',1),(422,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 22:07:48',1),(423,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 23:24:22',1),(424,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 23:43:32',1),(425,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 23:50:36',1),(426,'192.168.100.172','tes@gmail.com',23,'2022-09-13 23:51:05',1),(427,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-13 23:55:36',1),(428,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-14 00:28:11',1),(429,'192.168.56.62','m.agungmahardika12@gmail.com',1,'2022-09-14 01:46:30',1),(430,'192.168.56.62','m.agungmahardika12@gmail.com',1,'2022-09-14 01:49:42',1),(431,'192.168.56.62','m.agungmahardika12@gmail.com',1,'2022-09-14 02:03:04',1),(432,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-14 15:27:56',1),(433,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-14 15:41:11',1),(434,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-14 21:23:41',1),(435,'192.168.56.62','m.agungmahardika12@gmail.com',1,'2022-09-15 01:35:16',1),(436,'192.168.56.62','m.agungmahardika12@gmail.com',1,'2022-09-15 01:36:50',1),(437,'192.168.56.62','m.agungmahardika12@gmail.com',1,'2022-09-15 01:58:47',1),(438,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-15 18:17:34',1),(439,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 00:18:06',1),(440,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 08:21:49',1),(441,'192.168.100.172','tes@gmail.com',23,'2022-09-18 08:22:43',1),(442,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 08:24:49',1),(443,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 08:29:23',1),(444,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 08:30:56',1),(445,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 08:35:12',1),(446,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 08:51:33',1),(447,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 08:54:39',1),(448,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 08:54:49',1),(449,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 09:04:00',1),(450,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 09:14:10',1),(451,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 09:24:34',1),(452,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 09:33:06',1),(453,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 09:33:18',1),(454,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 09:34:50',1),(455,'192.168.100.172','\'agung\'',NULL,'2022-09-18 09:35:02',0),(456,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 19:24:25',1),(457,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 19:24:40',1),(458,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 19:26:12',1),(459,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 19:26:24',1),(460,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 19:26:58',1),(461,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 19:28:03',1),(462,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 19:29:25',1),(463,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 20:31:33',1),(464,'192.168.100.172','agung',NULL,'2022-09-18 22:32:10',0),(465,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 22:32:18',1),(466,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 22:33:06',1),(467,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 22:41:34',1),(468,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 22:47:18',1),(469,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 22:49:50',1),(470,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 22:51:28',1),(471,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 22:51:43',1),(472,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 22:53:26',1),(473,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 22:55:11',1),(474,'192.168.100.172','agung',NULL,'2022-09-18 23:04:18',0),(475,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 23:04:26',1),(476,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 23:07:48',1),(477,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 23:09:08',1),(478,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 23:17:32',1),(479,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 23:25:49',1),(480,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 23:27:24',1),(481,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 23:29:08',1),(482,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-18 23:31:05',1),(483,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 01:04:09',1),(484,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 01:06:46',1),(485,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 01:08:33',1),(486,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 01:26:03',1),(487,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 01:30:04',1),(488,'192.168.100.172','tes@gmail.com',23,'2022-09-19 01:34:35',1),(489,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 01:35:23',1),(490,'192.168.100.172','tes@gmail.com',23,'2022-09-19 01:35:41',1),(491,'192.168.100.172','tes@gmail.com',23,'2022-09-19 01:37:07',1),(492,'192.168.100.172','tes@gmail.com',23,'2022-09-19 01:41:31',1),(493,'192.168.100.172','tes@gmail.com',23,'2022-09-19 01:48:26',1),(494,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 01:53:38',1),(495,'192.168.100.172','tes@gmail.com',23,'2022-09-19 01:54:07',1),(496,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 01:54:47',1),(497,'192.168.100.172','tes@gmail.com',23,'2022-09-19 01:55:01',1),(498,'192.168.100.172','tes@gmail.com',23,'2022-09-19 01:55:19',1),(499,'192.168.100.172','tes@gmail.com',23,'2022-09-19 01:55:50',1),(500,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 01:56:04',1),(501,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 04:42:16',1),(502,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 08:26:15',1),(503,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 09:26:14',1),(504,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 21:17:58',1),(505,'192.168.100.172','tes@gmail.com',23,'2022-09-19 21:24:40',1),(506,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 21:25:14',1),(507,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-19 21:29:40',1),(508,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-20 10:07:24',1),(509,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-22 22:08:21',1),(510,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-22 22:31:46',1),(511,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-09-23 03:14:46',1),(512,'::1','m.agungmahardika12@gmail.com',1,'2022-09-27 04:44:36',1),(513,'10.24.3.144','m.agungmahardika12@gmail.com',1,'2022-10-02 03:04:10',1),(514,'10.24.3.144','tes@gmail.com',23,'2022-10-02 03:04:58',1),(515,'::1','m.agungmahardika12@gmail.com',1,'2022-10-13 08:13:22',1),(516,'::1','tes@gmail.com',23,'2022-10-14 02:26:54',1),(517,'::1','m.agungmahardika12@gmail.com',1,'2022-10-14 02:28:00',1),(518,'::1','m.agungmahardika12@gmail.com',1,'2022-10-14 21:22:49',1),(519,'::1','m.agungmahardika12@gmail.com',1,'2022-10-14 21:49:30',1),(520,'::1','m.agungmahardika12@gmail.com',1,'2022-10-14 23:51:03',1),(521,'::1','m.agungmahardika12@gmail.com',1,'2022-10-15 00:39:22',1),(522,'::1','m.agungmahardika12@gmail.com',1,'2022-10-15 02:54:06',1),(523,'::1','m.agungmahardika12@gmail.com',1,'2022-10-15 06:08:35',1),(524,'::1','m.agungmahardika12@gmail.com',1,'2022-10-15 06:09:12',1),(525,'::1','m.agungmahardika12@gmail.com',1,'2022-10-15 06:15:27',1),(526,'::1','m.agungmahardika12@gmail.com',1,'2022-10-15 06:35:22',1),(527,'::1','m.agungmahardika12@gmail.com',1,'2022-10-15 09:25:26',1),(528,'::1','agung',NULL,'2022-10-15 20:50:01',0),(529,'::1','m.agungmahardika12@gmail.com',1,'2022-10-15 20:50:06',1),(530,'::1','m.agungmahardika12@gmail.com',1,'2022-10-16 08:48:52',1),(531,'::1','m.agungmahardika12@gmail.com',1,'2022-10-16 09:59:04',1),(532,'::1','tes@gmail.com',26,'2022-10-16 10:05:27',1),(533,'::1','m.agungmahardika12@gmail.com',1,'2022-10-16 10:07:22',1),(534,'::1','m.agungmahardika12@gmail.com',1,'2022-10-16 10:17:04',1),(535,'::1','m.agungmahardika12@gmail.com',1,'2022-10-16 21:04:49',1),(536,'::1','m.agungmahardika12@gmail.com',1,'2022-10-17 08:24:11',1),(537,'::1','m.agungmahardika12@gmail.com',1,'2022-10-17 19:45:49',1),(538,'::1','m.agungmahardika12@gmail.com',1,'2022-10-17 23:42:17',1),(539,'::1','m.agungmahardika12@gmail.com',1,'2022-10-18 02:00:20',1),(540,'::1','m.agungmahardika12@gmail.com',1,'2022-10-19 07:54:30',1),(541,'::1','m.agungmahardika12@gmail.com',1,'2022-10-19 09:00:25',1),(542,'::1','m.agungmahardika12@gmail.com',1,'2022-10-20 09:33:52',1),(543,'::1','admin',NULL,'2022-10-21 03:02:53',0),(544,'::1','m.agungmahardika12@gmail.com',1,'2022-10-21 03:03:00',1),(545,'::1','m.agungmahardika12@gmail.com',1,'2022-10-21 21:47:02',1),(546,'::1','m.agungmahardika12@gmail.com',1,'2022-10-25 22:16:37',1),(547,'::1','m.agungmahardika12@gmail.com',1,'2022-11-01 08:04:43',1),(548,'::1','m.agungmahardika12@gmail.com',1,'2022-11-01 20:28:18',1),(549,'::1','m.agungmahardika12@gmail.com',1,'2022-11-03 19:39:12',1),(550,'::1','m.agungmahardika12@gmail.com',1,'2022-11-04 23:48:13',1),(551,'::1','admin',NULL,'2022-11-07 01:22:11',0),(552,'::1','m.agungmahardika12@gmail.com',1,'2022-11-07 01:22:32',1),(553,'::1','m.agungmahardika12@gmail.com',1,'2022-11-07 21:26:19',1),(554,'::1','m.agungmahardika12@gmail.com',1,'2022-11-08 00:24:35',1),(555,'::1','m.agungmahardika12@gmail.com',1,'2022-11-08 08:03:09',1),(556,'::1','m.agungmahardika12@gmail.com',1,'2022-11-08 16:29:30',1),(557,'::1','m.agungmahardika12@gmail.com',1,'2022-11-08 20:24:16',1),(558,'::1','m.agungmahardika12@gmail.com',1,'2022-11-09 03:19:53',1),(559,'::1','m.agungmahardika12@gmail.com',1,'2022-11-09 07:14:39',1),(560,'::1','m.agungmahardika12@gmail.com',1,'2022-11-09 19:30:19',1),(561,'::1','m.agungmahardika12@gmail.com',1,'2022-11-09 19:53:39',1),(562,'::1','m.agungmahardika12@gmail.com',1,'2022-11-10 00:04:15',1),(563,'::1','m.agungmahardika12@gmail.com',1,'2022-11-10 07:40:18',1),(564,'::1','m.agungmahardika12@gmail.com',1,'2022-11-10 16:51:28',1),(565,'::1','m.agungmahardika12@gmail.com',1,'2022-11-11 07:53:13',1),(566,'::1','xifuzujom@mailinator.com',27,'2022-11-11 07:59:14',1),(567,'::1','m.agungmahardika12@gmail.com',1,'2022-11-11 07:59:34',1),(568,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-11-13 16:51:20',1),(569,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-11-13 17:19:27',1),(570,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-11-14 04:05:36',1),(571,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-11-19 22:18:07',1),(572,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-11-22 00:42:05',1),(573,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-11-22 03:04:27',1),(574,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-11-22 03:56:52',1),(575,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-11-23 20:04:59',1),(576,'192.168.100.172','m.agungmahardika12@gmail.com',1,'2022-11-23 20:29:33',1),(577,'2001:448a:1041:1ab3:d99e:6c2c:700:92e0','m.agungmahardika12@gmail.com',1,'2022-11-24 18:15:47',1),(578,'::1','m.agungmahardika12@gmail.com',1,'2022-11-24 18:29:30',1),(579,'2001:448a:1041:1ab3:d99e:6c2c:700:92e0','m.agungmahardika12@gmail.com',1,'2022-11-24 19:24:04',1),(580,'2001:448a:1041:1ab3:1dbd:64d6:3567:76d3','m.agungmahardika12@gmail.com',1,'2022-11-24 19:40:59',1),(581,'2001:448a:1041:1ab3:d99e:6c2c:700:92e0','m.agungmahardika12@gmail.com',1,'2022-11-25 00:56:29',1),(582,'2001:448a:1041:1ab3:d99e:6c2c:700:92e0','m.agungmahardika12@gmail.com',1,'2022-11-25 04:26:41',1),(583,'2001:448a:1041:1ab3:79f9:d038:41ad:1a65','m.agungmahardika12@gmail.com',1,'2022-11-26 04:01:47',1),(584,'2001:448a:1041:1ab3:79f9:d038:41ad:1a65','m.agungmahardika12@gmail.com',1,'2022-11-26 04:12:05',1),(585,'2001:448a:1041:1ab3:79f9:d038:41ad:1a65','m.agungmahardika12@gmail.com',1,'2022-11-26 07:58:52',1),(586,'2001:448a:1041:1ab3:d4d7:9b69:d4a6:db4b','m.agungmahardika12@gmail.com',1,'2022-11-26 20:28:38',1),(587,'2001:448a:1041:1ab3:a90b:4a1f:a862:651','m.agungmahardika12@gmail.com',1,'2022-11-27 21:12:16',1),(588,'2001:448a:1041:1ab3:a90b:4a1f:a862:651','m.agungmahardika12@gmail.com',1,'2022-11-28 00:08:11',1),(589,'182.4.71.184','m.agungmahardika12@gmail.com',1,'2022-12-02 20:21:26',1),(590,'182.4.71.184','m.agungmahardika12@gmail.com',1,'2022-12-02 20:21:43',1),(591,'2001:448a:1041:1ab3:69:d33a:e636:2a01','m.agungmahardika12@gmail.com',1,'2022-12-04 05:10:36',1),(592,'2001:448a:1041:1ab3:69:d33a:e636:2a01','m.agungmahardika12@gmail.com',1,'2022-12-04 07:14:39',1),(593,'125.162.70.86','m.agungmahardika12@gmail.com',1,'2022-12-04 18:20:42',1),(594,'103.212.43.153','m.agungmahardika12@gmail.com',1,'2022-12-04 22:18:16',1),(595,'2001:448a:1041:1ab3:75d8:a84b:dd25:af0a','m.agungmahardika12@gmail.com',1,'2022-12-06 04:33:39',1),(596,'2001:448a:1041:1ab3:8d1a:842c:a03f:a89d','m.agungmahardika12@gmail.com',1,'2022-12-07 16:41:37',1),(597,'2001:448a:1041:1ab3:8d1a:842c:a03f:a89d','m.agungmahardika12@gmail.com',1,'2022-12-07 17:02:07',1),(598,'2001:448a:1041:1ab3:8d1a:842c:a03f:a89d','m.agungmahardika12@gmail.com',1,'2022-12-07 17:29:48',1),(599,'2001:448a:1041:1ab3:8d1a:842c:a03f:a89d','m.agungmahardika12@gmail.com',1,'2022-12-07 19:29:35',1),(600,'2001:448a:1041:1ab3:a9d9:9cff:eb77:8f41','m.agungmahardika12@gmail.com',1,'2022-12-07 22:57:12',1),(601,'2001:448a:1041:1ab3:a9d9:9cff:eb77:8f41','m.agungmahardika12@gmail.com',1,'2022-12-07 23:04:28',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_users_permissions`
--

LOCK TABLES `auth_users_permissions` WRITE;
/*!40000 ALTER TABLE `auth_users_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_users_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_atraction`
--

DROP TABLE IF EXISTS `category_atraction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_atraction` (
  `id` varchar(1) NOT NULL,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_atraction`
--

LOCK TABLES `category_atraction` WRITE;
/*!40000 ALTER TABLE `category_atraction` DISABLE KEYS */;
INSERT INTO `category_atraction` VALUES ('1','Uniqe'),('2','Ordinary');
/*!40000 ALTER TABLE `category_atraction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rating_id` int unsigned DEFAULT NULL,
  `comment` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `comment_rating_id_foreign` (`rating_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`rating_id`) REFERENCES `rating` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `culinary_place`
--

DROP TABLE IF EXISTS `culinary_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `culinary_place` (
  `id` varchar(2) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `owner` varchar(25) DEFAULT NULL,
  `open` time DEFAULT NULL,
  `close` time DEFAULT NULL,
  `contact_person` varchar(13) DEFAULT NULL,
  `description` text,
  `geom` geometry DEFAULT NULL,
  `geom_area` geometry DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `culinary_place`
--

LOCK TABLES `culinary_place` WRITE;
/*!40000 ALTER TABLE `culinary_place` DISABLE KEYS */;
INSERT INTO `culinary_place` VALUES ('01','Kadai Buk Yen','Yen','08:00:00','17:00:00','6282390504444','Kadai buk yen, menjual makanan dan minuman',_binary '\0\0\0\0\0\0\0.	\∆Y@7ûï0\„ø',NULL),('02','Kadai Muaro Apar','Yeni','08:00:00','18:00:00','6282390504444','Kadai Muaro Apar menjual berbagai makanan dan minuman ',_binary '\0\0\0\0\0\0\0Xv†\“ÒY@˜4í1\„ø',NULL),('03','Kadai Aci Ella','Aci Ella','08:00:00','18:00:00','6282390504444','Kadai Aci Ella menjual makanan dan minuman seperti mie, pop ice dll.',_binary '\0\0\0\0\0\0\0BK\r#ÛY@+\Œ≈ù\⁄2\„ø',NULL),('04','Kadai Teh Talua Ko Hye','uye','08:00:00','18:00:00','6282390504444','Kadai Teh Talua Ko Hye menjual berbagai makanan dan minuman seperti teh talua',_binary '\0\0\0\0\0\0\0\‰ø˜Y@\ÓJÙF6\„ø',NULL),('05','Kadai Bimbim','Bimbim','08:00:00','18:00:00','6282390504444','Kadai bimbim menjual berbagai makanan dan minuman seperti mie, kelapa muda,  jus dll',_binary '\0\0\0\0\0\0\0\◊’âp¯Y@\Z\ËÛ¥p7\„ø',NULL),('06','Kadai Incimai','Cik Mai','08:00:00','18:00:00','6282390504444','Kadai Incimai menjual berbagai makanan dan minuman',_binary '\0\0\0\0\0\0\0\ﬂM\ÿ˙˘Y@8-\€˚9\„ø',NULL),('07','Kadai Delia','Delia','08:00:00','18:00:00','6282390504444','Kadai Delia menjual berbagai makanan dan minuman, seperti kelapa muda, mie, jus dll',_binary '\0\0\0\0\0\0\0¿˝F\\¸Y@˚Å;\„ø',NULL),('08','Kadai Cik Uniang','Uniang','08:00:00','18:00:00','6282390504444','Kadai Cik Uniang menjual berbagai makanan dan minuman, seperti mie , jus, kelapa muda dll',_binary '\0\0\0\0\0\0\0w/\÷˚Y@Jfí\‰˚:\„ø',NULL),('09','Kadai Ita','Ita','08:00:00','18:00:00','6282390504444','Kadai Ita menjual berbagai makanan dan minuman seperti mie, jus, kelapa muda dll',_binary '\0\0\0\0\0\0\0D5\„¸Y@(!¢\‚I<\„ø',NULL),('10','Kadai Suka Maju',NULL,'08:00:00','18:00:00','6282390504444','Kadai Suka Maju menjual berbagai makanan dan minuman seperti mie, jus, kelapa muda dll',_binary '\0\0\0\0\0\0\0ß\Ô-ì˛Y@˙E\r\Ë=\„ø',NULL),('11','Kadai Reni','Reni','08:00:00','18:00:00','6282390504444','Kadai Reni menjual berbagai makanan dan minuman seperti mie, jus, kelapa muda. Kadai Reni juga menjual batu karang',_binary '\0\0\0\0\0\0\0∂\œt¿ˇY@å\∆oD\÷>\„ø',NULL),('12','Kadai Imel','Imel','08:00:00','18:00:00','6282390504444','Kadai Imel menjual berbagai makanan dan minuman seperti mie, jus , kelapa muda dll',_binary '\0\0\0\0\0\0\0\‹\Ô\0Y@kCIq#?\„ø',NULL),('13','Kadai Pambawo Razaki','Buk','08:00:00','18:00:00','6282390504444','Kadai Pambawo Razaki menjual berbagai makanan dan minuman seperti mie, jus, kelapa muda dll',_binary '\0\0\0\0\0\0\0ï6MÜ\0Y@_%£ÛØ?\„ø',NULL),('14','Kadai Pondok Khaira','Khaira','08:00:00','18:00:00','6282390504444','Kadai Khaira menjual berbagai makanan dan minuman seperti mie, jus, kelapa muda dll',_binary '\0\0\0\0\0\0\0‘ÆœΩY@R+\n√ôB\„ø',NULL);
/*!40000 ALTER TABLE `culinary_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `culinary_place_gallery`
--

DROP TABLE IF EXISTS `culinary_place_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `culinary_place_gallery` (
  `id` varchar(2) NOT NULL,
  `culinary_place_id` varchar(2) NOT NULL,
  `url` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `culinary_place_gallery_culinary_place_id_foreign` (`culinary_place_id`),
  CONSTRAINT `culinary_place_id` FOREIGN KEY (`culinary_place_id`) REFERENCES `culinary_place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `culinary_place_gallery`
--

LOCK TABLES `culinary_place_gallery` WRITE;
/*!40000 ALTER TABLE `culinary_place_gallery` DISABLE KEYS */;
INSERT INTO `culinary_place_gallery` VALUES ('04','02','1669471850_5e8cc51737ebe03424c4.jpg','2022-11-26 08:11:07','2022-11-26 08:11:07'),('05','02','1669471857_52a82e6a8427fae69546.jpg','2022-11-26 08:11:07','2022-11-26 08:11:07'),('06','03','1669471994_81bcf91de6cf9bacdf92.jpg','2022-11-26 08:13:23','2022-11-26 08:13:23'),('07','03','1669471995_4409799636b1a54d5de3.jpg','2022-11-26 08:13:23','2022-11-26 08:13:23'),('08','03','1669471999_fff3b3191c515b0d77d4.jpg','2022-11-26 08:13:23','2022-11-26 08:13:23'),('09','04','1669472141_151a48459ed4ce2e97aa.jpg','2022-11-26 08:15:59','2022-11-26 08:15:59'),('10','04','1669472157_cab2425ca6795f277736.jpg','2022-11-26 08:15:59','2022-11-26 08:15:59'),('11','05','1669472218_b051d7443ea38d99350f.jpg','2022-11-26 08:17:17','2022-11-26 08:17:17'),('12','05','1669472225_a021e830c58555b61f93.jpg','2022-11-26 08:17:17','2022-11-26 08:17:17'),('13','05','1669472234_9035990e9f46f5a20d57.jpg','2022-11-26 08:17:17','2022-11-26 08:17:17'),('14','06','1669472362_ed0c57a613ad8a7c39db.jpg','2022-11-26 08:19:30','2022-11-26 08:19:30'),('15','06','1669472365_3c5195658a5a559dd14d.jpg','2022-11-26 08:19:30','2022-11-26 08:19:30'),('16','07','1669472511_92b6b714a6b24bfbe235.jpg','2022-11-26 08:22:23','2022-11-26 08:22:23'),('17','07','1669472512_4b4f1b43022931223d62.jpg','2022-11-26 08:22:23','2022-11-26 08:22:23'),('18','07','1669472534_bc1bcd71ae6b3b33d074.jpg','2022-11-26 08:22:23','2022-11-26 08:22:23'),('20','09','1669472815_71f3347bcd8804a01bce.jpg','2022-11-26 08:27:13','2022-11-26 08:27:13'),('21','09','1669472819_28b5ae1b7d918cb05454.jpg','2022-11-26 08:27:13','2022-11-26 08:27:13'),('22','09','1669472821_967b81ec3a51e2663fb2.jpg','2022-11-26 08:27:13','2022-11-26 08:27:13'),('23','10','1669472937_4d075f69c58dbc27ee29.jpg','2022-11-26 08:29:34','2022-11-26 08:29:34'),('24','10','1669472949_475890e3938986ddd557.jpg','2022-11-26 08:29:34','2022-11-26 08:29:34'),('25','10','1669472971_360d6f773e5e5542f191.jpg','2022-11-26 08:29:34','2022-11-26 08:29:34'),('26','11','1669473101_85ee46e532253654c8ed.jpg','2022-11-26 08:32:27','2022-11-26 08:32:27'),('27','11','1669473102_b0a87af3cb91dfecc0be.jpg','2022-11-26 08:32:27','2022-11-26 08:32:27'),('28','11','1669473141_50e6560c5495c2178070.jpg','2022-11-26 08:32:27','2022-11-26 08:32:27'),('29','11','1669473123_38175170603a951bb4e1.jpg','2022-11-26 08:32:27','2022-11-26 08:32:27'),('30','12','1669473248_627729bea8828402b72a.jpg','2022-11-26 08:34:59','2022-11-26 08:34:59'),('31','12','1669473256_043d0aeb0bbd03ee9330.jpg','2022-11-26 08:34:59','2022-11-26 08:34:59'),('32','12','1669473272_d161a8294635138d3ddb.jpg','2022-11-26 08:34:59','2022-11-26 08:34:59'),('33','13','1669473371_70dd38bfcd505c8f695e.jpg','2022-11-26 08:36:38','2022-11-26 08:36:38'),('34','13','1669473377_ae53ad4e12fe8c0109d4.jpg','2022-11-26 08:36:38','2022-11-26 08:36:38'),('35','13','1669473377_53b31edc1fe1d895d9f0.jpg','2022-11-26 08:36:38','2022-11-26 08:36:38'),('36','13','1669473382_947b3b3cdd58f77cd788.jpg','2022-11-26 08:36:38','2022-11-26 08:36:38'),('37','14','1669473465_121f58e64d7408a59376.jpg','2022-11-26 08:38:03','2022-11-26 08:38:03'),('38','14','1669473475_f2382fa2ade213b6e865.jpg','2022-11-26 08:38:03','2022-11-26 08:38:03'),('39','14','1669473481_1460a80db461602679bf.jpg','2022-11-26 08:38:04','2022-11-26 08:38:04'),('40','01','1669473566_25b95a92c5657678810e.jpg','2022-11-26 08:40:03','2022-11-26 08:40:03'),('41','01','1669473570_1e36631800172f59e1f3.jpg','2022-11-26 08:40:03','2022-11-26 08:40:03'),('42','01','1669473580_c5b15e624622448de946.jpg','2022-11-26 08:40:03','2022-11-26 08:40:03'),('43','08','1669473662_26fe4397062103006a6f.jpg','2022-11-26 08:41:15','2022-11-26 08:41:15');
/*!40000 ALTER TABLE `culinary_place_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_package`
--

DROP TABLE IF EXISTS `detail_package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_package` (
  `package_id` varchar(2) NOT NULL,
  `activities_id` varchar(2) NOT NULL,
  KEY `activities_id_idx` (`activities_id`),
  KEY `detail_package_ibfk_1` (`package_id`),
  CONSTRAINT `detail_package_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_package_ibfk_2` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_package`
--

LOCK TABLES `detail_package` WRITE;
/*!40000 ALTER TABLE `detail_package` DISABLE KEYS */;
INSERT INTO `detail_package` VALUES ('02','01'),('03','03'),('01','02'),('04','01'),('04','02'),('04','04'),('04','05'),('04','06'),('04','07'),('06','01'),('06','07');
/*!40000 ALTER TABLE `detail_package` ENABLE KEYS */;
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
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `price` varchar(13) DEFAULT NULL,
  `contact_person` varchar(13) DEFAULT NULL,
  `description` text,
  `video_url` varchar(255) DEFAULT NULL,
  `geom` geometry DEFAULT NULL,
  `geom_area` geometry DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
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
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_gallery_event_id_foreign` (`event_id`),
  CONSTRAINT `event_gallery_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_gallery`
--

LOCK TABLES `event_gallery` WRITE;
/*!40000 ALTER TABLE `event_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility`
--

DROP TABLE IF EXISTS `facility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facility` (
  `id` varchar(2) NOT NULL,
  `name` varchar(25) NOT NULL,
  `area_size` int DEFAULT NULL,
  `open` time DEFAULT NULL,
  `close` time DEFAULT NULL,
  `description` text,
  `geom` geometry DEFAULT NULL,
  `geom_area` geometry DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility`
--

LOCK TABLES `facility` WRITE;
/*!40000 ALTER TABLE `facility` DISABLE KEYS */;
INSERT INTO `facility` VALUES ('01','Toilet',16,'08:00:00','19:00:00','Toilet Umum untuk wisatawan desa wisata Apar ',_binary '\0\0\0\0\0\0\0è1^ê\0Y@<\Ÿ0∑9=\„ø',NULL),('02','Toilet',60,'08:00:00','19:00:00','Toilet umum untuk wisatawan desa wisata Apar dekat UPT Konservasi Penyu',_binary '\0\0\0\0\0\0\0ü§ÜWY@¯\\ø\√aG\„ø',NULL),('03','Hatchery I',100,'08:00:00','18:00:00','Hatchery I adalah tempat peletakan penyu-penyu yang masih kecil',_binary '\0\0\0\0\0\0\0∞í,≥\nY@ø	¶!G\„ø',NULL),('04','Hacther II',100,'08:00:00','18:00:00','Hacthery II adalah tempat peletakan penyu yang sudah dewasa',_binary '\0\0\0\0\0\0\0\Í\À\“N\rY@w^ä\\G\„ø',NULL),('05','Kantor Bumdes Apar',300,'08:00:00','17:00:00','Kantor Bumdes Apar Desa Apar',_binary '\0\0\0\0\0\0\0<ª\0$(Y@-ø\„FW*\„ø',_binary '\Ê\0\0\0\0\0\0\0\0\0\0\0aÅ&Y@≥ÙM\»&\„øaÅ•&Y@°°\Ã_)\„øaÅˇ&Y@\∆4\‚\»@*\„øa_)Y@\√2I**\„øa\ÿ(Y@¢Rá\'\„øaÅ&Y@≥ÙM\»&\„ø'),('06','Spot Memancing Ikan',NULL,NULL,NULL,'Spot untuk memancing ikan laut di desa wisata Apar',_binary '\0\0\0\0\0\0\0\r(H*\€Y@äI\Í à\'\„ø',NULL),('07','Toilet',45,'08:00:00','20:00:00','Toilet umum untuk wisatawan desa wisata Apar',_binary '\0\0\0\0\0\0\0B`a˘Y@íZ\Ê|\ 4\„ø',NULL),('08','Spot foto',16,NULL,NULL,'Spot foto pada jalur tracking Apar Mangrove Park',_binary '\0\0\0\0\0\0\0ı\€Y@Å†P\r/\„ø',NULL),('09','Spot foto',NULL,NULL,NULL,'Spot foto di jalur tracking desa wisata Apar ',_binary '\0\0\0\0\0\0\0®Ù~iÚY@yMYód.\„ø',NULL),('10','Spot foto',NULL,NULL,NULL,'Spot foto di jalur tracking desa wisata Apar',_binary '\0\0\0\0\0\0\0GzˆY@…é\œ\\.\„ø',NULL),('11','Spot foto',NULL,NULL,NULL,'Spot foto di jalur tracking desa wisata Apar',_binary '\0\0\0\0\0\0\0Å|Ö\‹˜Y@¡_£{0\„ø',NULL),('12','Menara tower spot foto',NULL,NULL,NULL,'Menara tower yang disediakan untuk melihat pemandangan dan spot berfoto di desa wisata Apar. Sekaligus menjadi akhir dari jalur tracking desa wisata Apar',_binary '\0\0\0\0\0\0\0\ÂEG\Ó\0Y@≠â¢ì\Á2\„ø',NULL),('13','Parkir',300,'08:00:00','18:00:00','Parkiran untuk kendaraan, roda dua, roda empat dan bus',_binary '\0\0\0\0\0\0\0x~rê\ÁY@\ﬁ/\—\ÊY%\„ø',_binary '\Ê\0\0\0\0\0\0\0\0\0\0\02˚\Ì|\‰Y@[Ö	\'±$\„ø2˚\Ì\0\ËY@˘˘ı\Íó#\„ø2˚m3\ÍY@ùw•!%\„ø1˚mU\ÊY@.)\"&\„ø2˚\Ì|\‰Y@[Ö	\'±$\„ø'),('14','Camping area',2000,'08:00:00','19:00:00','Area camping untuk staycation di desa wisata Apar ',_binary '\0\0\0\0\0\0\0\Ÿs¸\ƒˇY@túWL\◊9\„ø',_binary '\Ê\0\0\0\0\0\0\0\0\0\0\0É\‘˙_˚Y@\ÌjY7„øÑ\‘zí˝Y@ûø‘öã6„øÉ\‘zùY@\Ì:P}9„øÉ\‘zF˛Y@t3M^:„øÉ\‘˙_˚Y@\ÌjY7\„ø');
/*!40000 ALTER TABLE `facility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility_gallery`
--

DROP TABLE IF EXISTS `facility_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facility_gallery` (
  `id` varchar(2) NOT NULL,
  `facility_id` varchar(2) NOT NULL,
  `url` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `facility_gallery_facility_id_foreign` (`facility_id`),
  CONSTRAINT `facility_id` FOREIGN KEY (`facility_id`) REFERENCES `facility` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility_gallery`
--

LOCK TABLES `facility_gallery` WRITE;
/*!40000 ALTER TABLE `facility_gallery` DISABLE KEYS */;
INSERT INTO `facility_gallery` VALUES ('01','01','1669474381_2416ca136d846ccca8ed.jpg','2022-11-26 08:53:20','2022-11-26 08:53:20'),('02','01','1669474390_c0564b5e3f160bc22eb0.jpg','2022-11-26 08:53:20','2022-11-26 08:53:20'),('05','03','1669474658_49277f398fbd93412230.jpg','2022-11-26 08:58:18','2022-11-26 08:58:18'),('06','03','1669474662_4e91b4cf148b79d33b66.jpg','2022-11-26 08:58:19','2022-11-26 08:58:19'),('07','03','1669474656_c31afe89523355c5580c.jpg','2022-11-26 08:58:19','2022-11-26 08:58:19'),('08','04','1669474751_caccaee143a0768d3ec8.jpg','2022-11-26 08:59:35','2022-11-26 08:59:35'),('09','04','1669474773_ed4a21e300bd872b0d2d.jpg','2022-11-26 08:59:35','2022-11-26 08:59:35'),('10','05','1669475013_7390f45088bbd6c81582.jpg','2022-11-26 09:03:39','2022-11-26 09:03:39'),('11','05','1669474983_2baae39b8ba46b970c1d.jpg','2022-11-26 09:03:39','2022-11-26 09:03:39'),('12','05','1669474990_25b5ed9b789c7463797d.jpg','2022-11-26 09:03:39','2022-11-26 09:03:39'),('13','06','1669475116_81692e8f7bab21a12d49.jpg','2022-11-26 09:05:43','2022-11-26 09:05:43'),('14','06','1669475107_12534ed7b2a31b823512.jpg','2022-11-26 09:05:43','2022-11-26 09:05:43'),('15','06','1669475132_26ee6b72a4443cc6dda5.jpg','2022-11-26 09:05:43','2022-11-26 09:05:43'),('16','07','1669475484_719f0a5ef6ff9d451dd4.jpg','2022-11-26 09:12:10','2022-11-26 09:12:10'),('17','07','1669475485_0220fec29e4ff198d989.jpg','2022-11-26 09:12:10','2022-11-26 09:12:10'),('18','08','1669475660_e364939a42517398ffb8.jpg','2022-11-26 09:14:31','2022-11-26 09:14:31'),('19','09','1669475720_189ab531a1f24c5d8344.jpg','2022-11-26 09:15:51','2022-11-26 09:15:51'),('20','10','1669475869_d2e52338199b4acf34eb.jpg','2022-11-26 09:18:08','2022-11-26 09:18:08'),('21','11','1669475952_b6df68f8302bca6513c3.jpg','2022-11-26 09:19:16','2022-11-26 09:19:16'),('22','12','1669476135_4421fa0e36a61a7da9e2.jpg','2022-11-26 09:22:18','2022-11-26 09:22:18'),('23','13','1669476407_318b1ffe6caae18aa91d.jpg','2022-11-26 09:27:07','2022-11-26 09:27:07'),('24','13','1669476377_494ff6ea4be13c595b56.jpg','2022-11-26 09:27:07','2022-11-26 09:27:07'),('25','13','1669476413_34aa15c3f6cd93a014c1.jpg','2022-11-26 09:27:07','2022-11-26 09:27:07'),('26','13','1669476424_5f672fdf2e970b6020eb.jpg','2022-11-26 09:27:07','2022-11-26 09:27:07'),('27','02','1669476486_e7fdc5302e06ae9492d6.jpg','2022-11-26 09:28:23','2022-11-26 09:28:23'),('28','02','1669476485_2688e8767268426aa459.jpg','2022-11-26 09:28:23','2022-11-26 09:28:23'),('29','14','1669477008_14e09a6aec1a45aef686.jpg','2022-11-26 09:36:53','2022-11-26 09:36:53'),('30','14','1669477007_973be591409ccc888b34.jpg','2022-11-26 09:36:53','2022-11-26 09:36:53');
/*!40000 ALTER TABLE `facility_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility_package`
--

DROP TABLE IF EXISTS `facility_package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facility_package` (
  `id` varchar(2) NOT NULL,
  `package_id` varchar(2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `facility_package_ibfk_1` (`package_id`),
  CONSTRAINT `facility_package_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility_package`
--

LOCK TABLES `facility_package` WRITE;
/*!40000 ALTER TABLE `facility_package` DISABLE KEYS */;
INSERT INTO `facility_package` VALUES ('07','04','Guide'),('1','06','Booking Area'),('2','06','Pemateri'),('3','06','Makan + Snack'),('4','06','Guide'),('5','06','Dokumentasi'),('6','06','Gazebo rest / outdoor rest (pantai) ');
/*!40000 ALTER TABLE `facility_package` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017-11-20-223112','Myth\\Auth\\Database\\Migrations\\CreateAuthTables','default','Myth\\Auth',1651301533,1),(2,'2022-06-29-203927','App\\Database\\Migrations\\Apar','default','App',1656536105,2),(3,'2022-06-29-205803','App\\Database\\Migrations\\Atraction','default','App',1656536455,3),(4,'2022-06-29-210747','App\\Database\\Migrations\\Event','default','App',1656537022,4),(5,'2022-06-29-211115','App\\Database\\Migrations\\Atraction','default','App',1656537086,5),(6,'2022-06-29-211155','App\\Database\\Migrations\\Facility','default','App',1656537182,6),(7,'2022-06-30-023454','App\\Database\\Migrations\\WorshipPlace','default','App',1656556745,7),(8,'2022-06-30-023513','App\\Database\\Migrations\\CulinaryPlace','default','App',1656556746,7),(9,'2022-06-30-023528','App\\Database\\Migrations\\SouvenirPlace','default','App',1656556746,7),(10,'2022-06-30-040003','App\\Database\\Migrations\\CulinaryPlace','default','App',1656562156,8),(11,'2022-06-30-040033','App\\Database\\Migrations\\SouvenirPlace','default','App',1656562156,8),(12,'2022-06-30-040055','App\\Database\\Migrations\\WorshipPlace','default','App',1656562157,8),(13,'2022-06-30-042057','App\\Database\\Migrations\\Atraction','default','App',1656562865,9),(14,'2022-07-01-062044','App\\Database\\Migrations\\Atraction','default','App',1656656457,10),(15,'2022-07-01-062231','App\\Database\\Migrations\\Atraction','default','App',1656656568,11),(16,'2022-07-01-062353','App\\Database\\Migrations\\Atraction','default','App',1656656647,12),(17,'2022-07-01-103229','App\\Database\\Migrations\\Facility','default','App',1656671559,13),(18,'2022-07-03-081327','App\\Database\\Migrations\\Atraction','default','App',1656836210,14),(20,'2022-07-13-020726','App\\Database\\Migrations\\AparGallery','default','App',1657678370,15),(49,'2022-07-13-025921','App\\Database\\Migrations\\Apar','default','App',1657682556,16),(50,'2022-07-13-025948','App\\Database\\Migrations\\Event','default','App',1657682557,16),(51,'2022-07-13-030025','App\\Database\\Migrations\\CulinaryPlace','default','App',1657682558,16),(52,'2022-07-13-030048','App\\Database\\Migrations\\SouvenirPlace','default','App',1657682559,16),(53,'2022-07-13-030112','App\\Database\\Migrations\\WorshipPlace','default','App',1657682559,16),(54,'2022-07-13-030132','App\\Database\\Migrations\\Facility','default','App',1657682560,16),(55,'2022-07-13-030159','App\\Database\\Migrations\\Atraction','default','App',1657682560,16),(56,'2022-07-13-031956','App\\Database\\Migrations\\AparGallery','default','App',1657682560,16),(99,'2022-07-13-032655','App\\Database\\Migrations\\AparGallery','default','App',1658294204,17),(100,'2022-07-13-032926','App\\Database\\Migrations\\AparVideo','default','App',1658294205,17),(101,'2022-07-13-033252','App\\Database\\Migrations\\AtractionGallery','default','App',1658294206,17),(102,'2022-07-13-033459','App\\Database\\Migrations\\AtractionVideo','default','App',1658294207,17),(103,'2022-07-13-033634','App\\Database\\Migrations\\EventGallery','default','App',1658294209,17),(104,'2022-07-13-033742','App\\Database\\Migrations\\EventVideo','default','App',1658294211,17),(105,'2022-07-13-033829','App\\Database\\Migrations\\FacilityGallery','default','App',1658294211,17),(106,'2022-07-13-033839','App\\Database\\Migrations\\FacilityVideo','default','App',1658294212,17),(107,'2022-07-13-033936','App\\Database\\Migrations\\WorshipPlaceGallery','default','App',1658294213,17),(108,'2022-07-13-033956','App\\Database\\Migrations\\WorshipPlaceVideo','default','App',1658294214,17),(109,'2022-07-13-034414','App\\Database\\Migrations\\CulinaryPlaceGallery','default','App',1658294214,17),(110,'2022-07-13-034423','App\\Database\\Migrations\\CulinaryPlaceVideo','default','App',1658294215,17),(111,'2022-07-13-034537','App\\Database\\Migrations\\SouvenirPlaceGallery','default','App',1658294216,17),(112,'2022-07-13-034547','App\\Database\\Migrations\\SouvenirPlaceVideo','default','App',1658294217,17),(113,'2022-07-13-034817','App\\Database\\Migrations\\Product','default','App',1658294217,17),(114,'2022-07-13-035312','App\\Database\\Migrations\\DetailProduct','default','App',1658294218,17),(115,'2022-07-13-035640','App\\Database\\Migrations\\Menu','default','App',1658294219,17),(116,'2022-07-13-035731','App\\Database\\Migrations\\DetailMenu','default','App',1658294219,17),(117,'2022-07-18-040720','App\\Database\\Migrations\\ReviewAtraction','default','App',1658294221,17),(118,'2022-08-14-022634','App\\Database\\Migrations\\Comment','default','App',1660444162,18);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package` (
  `id` varchar(2) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `min_capacity` int DEFAULT NULL,
  `contact_person` varchar(13) DEFAULT NULL,
  `brosur_url` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package`
--

LOCK TABLES `package` WRITE;
/*!40000 ALTER TABLE `package` DISABLE KEYS */;
INSERT INTO `package` VALUES ('01','Paket Jelajahi Hutan Mangrove Dengan Kano',20000,1,'6282390504444','1669516152_60cc27670a80e6b7fee5.jpeg','Jelajahi hutan mangrove dengan menaiki kano'),('02','Paket Makan Bajamba',400000,10,'6282390504444','paket_makan_bajamba.jpeg','Nikmati paket makan nasi baka kas desa wisata apar bersama keluarga di bawah pohon pinus dan embusan angin dan demburan ombak yang akan menambah rasa nikmat makan di tepi pantai '),('03','Paket Menanam Mangrove',15000,1,'6282390504444','paket_menanam_mangrove.jpeg','Menanam pohon mangrove langsung di desa wisata apar'),('04','Paket One Day Tour Apar',1200000,10,'6282390504444','1670325209_bfd22790c867f34a2757.jpeg','Nikmati keseruan berwisata di desa wisata apar selama satu hari '),('05','Paket Edukasi Desa Apar',NULL,1,'6282390504444','paket_edukasi_desa_apar.jpeg','Melihat dan mencoba langsung proses pmbuatan produk khas desa wisata apar'),('06','Paket Study Banding',60000,30,'6282390504444','1670325316_fa02a48588e1f137848a.jpeg','Study banding di desa wisata apar');
/*!40000 ALTER TABLE `package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` varchar(2) NOT NULL,
  `product_category_id` varchar(1) NOT NULL,
  `name` text,
  `price` int DEFAULT NULL,
  `brosur_url` text,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `product_category_id` (`product_category_id`),
  CONSTRAINT `product_category_id` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES ('01','1','Gulai Lokan',1000,'1669258868_283427d9cf2aa89b6b31.jpeg',''),('02','1','Kelapa Muda',2000,'1669258837_ad245b288bbbb6da60f0.jpeg','Kelapa muda yang segar sambil menikmati keindahan pantai dan duduk bersantai di tepi pantai Desa Wisata Apar'),('03','1','Langkitang',5000,'langkitang.jpeg',NULL),('04','1','Lapek Koncu',2000,'lapek_konci.jpeg',NULL),('05','1','Mangkuak',3000,'mangkuak.jpeg',NULL),('06','1','Sala Lauk',500,'sala_lauk.jpeg',NULL),('07','1','Sumbareh',1000,'sumbareh.jpeg',NULL),('08','2','Sendal Rajutan Benang',10000,'sandal_rajutan_benang.jpeg',NULL),('09','1','Karupuak Mie',2000,'1667985996_532dadac3fa3ae77c68a.jpeg','');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_category` (
  `id` varchar(1) NOT NULL,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES ('1','culinary'),('2','souvenir');
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rating` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `atraction_id` varchar(1) DEFAULT NULL,
  `event_id` varchar(1) DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `review_atraction_user_id_foreign` (`user_id`),
  KEY `atraction_id` (`atraction_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`atraction_id`) REFERENCES `atraction` (`id`),
  CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `review_atraction_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating`
--

LOCK TABLES `rating` WRITE;
/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `souvenir_place`
--

DROP TABLE IF EXISTS `souvenir_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `souvenir_place` (
  `id` varchar(2) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `owner` varchar(25) DEFAULT NULL,
  `open` time DEFAULT NULL,
  `close` time DEFAULT NULL,
  `contact_person` varchar(13) DEFAULT NULL,
  `description` text,
  `geom` geometry DEFAULT NULL,
  `geom_area` geometry DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `souvenir_place`
--

LOCK TABLES `souvenir_place` WRITE;
/*!40000 ALTER TABLE `souvenir_place` DISABLE KEYS */;
INSERT INTO `souvenir_place` VALUES ('01','Kios',NULL,'08:00:00','16:00:00','6282390504444','Tempat berjualan produk, suvenir di desa wisata Apar',_binary '\0\0\0\0\0\0\0∫RKJ\ÏY@5˜©ç^+\„ø',NULL);
/*!40000 ALTER TABLE `souvenir_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `souvenir_place_gallery`
--

DROP TABLE IF EXISTS `souvenir_place_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `souvenir_place_gallery` (
  `id` varchar(2) NOT NULL,
  `souvenir_place_id` varchar(2) NOT NULL,
  `url` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `souvenir_place_id_idx` (`souvenir_place_id`),
  CONSTRAINT `souvenir_place_id` FOREIGN KEY (`souvenir_place_id`) REFERENCES `souvenir_place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `souvenir_place_gallery`
--

LOCK TABLES `souvenir_place_gallery` WRITE;
/*!40000 ALTER TABLE `souvenir_place_gallery` DISABLE KEYS */;
INSERT INTO `souvenir_place_gallery` VALUES ('01','01','1669471234_aed279fbce7ec7dee1a2.jpg','2022-11-26 08:02:34','2022-11-26 08:02:34');
/*!40000 ALTER TABLE `souvenir_place_gallery` ENABLE KEYS */;
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
  `user_image` varchar(255) NOT NULL DEFAULT 'default.png',
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'m.agungmahardika12@gmail.com','admin','Muhammad Admin','Komplek Cimpago Permai Blok C',6281373517899,'default.png','$2y$10$0EViDolbF2cVmwj69hPo5eDWUK4b9HRaUJXlm2/CgiBhx7lvKvQ.6',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-04-30 05:02:38','2022-04-30 05:02:38',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worship_place`
--

DROP TABLE IF EXISTS `worship_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `worship_place` (
  `id` varchar(2) NOT NULL,
  `name` varchar(25) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `building_size` int DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  `description` text,
  `geom` geometry DEFAULT NULL,
  `geom_area` geometry DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worship_place`
--

LOCK TABLES `worship_place` WRITE;
/*!40000 ALTER TABLE `worship_place` DISABLE KEYS */;
INSERT INTO `worship_place` VALUES ('01','Tempat Sholat','Lesehan',45,10,'Tempat sholat berbentuk lesehan, cukup untuk 10 orang sholat',_binary '\0\0\0\0\0\0\0Ö˘ü∫Y@\»—π.>=\„ø',NULL),('02','Musholla Darussalam','Musholla',100,40,'Musholla Darussalam yang berada tepat di gerbang desa wisata Apar',_binary '\0\0\0\0\0\0\0¨*\…tY@:3\Í\Ô\ﬂ\„ø',_binary '\Ê\0\0\0\0\0\0\0\0\0\0\0\…\ÓLúY@#\·ä2\›\Z\„ø\»\ÓL^Y@\≈ÙyÆ\„ø\»\ÓL\‘	Y@¶J17\„ø\…\Ó\Ã˚Y@`55)\Z\„ø\…\ÓLúY@#\·ä2\›\Z\„ø');
/*!40000 ALTER TABLE `worship_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worship_place_gallery`
--

DROP TABLE IF EXISTS `worship_place_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `worship_place_gallery` (
  `id` varchar(2) NOT NULL,
  `worship_place_id` varchar(2) NOT NULL,
  `url` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `worship_place_id_idx` (`worship_place_id`),
  CONSTRAINT `worship_place_id` FOREIGN KEY (`worship_place_id`) REFERENCES `worship_place` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worship_place_gallery`
--

LOCK TABLES `worship_place_gallery` WRITE;
/*!40000 ALTER TABLE `worship_place_gallery` DISABLE KEYS */;
INSERT INTO `worship_place_gallery` VALUES ('01','01','1669474005_78a5272500e6cd149cdb.jpg','2022-11-26 08:46:48','2022-11-26 08:46:48'),('02','01','1669474001_bf7fa9e817b61727dd48.jpg','2022-11-26 08:46:48','2022-11-26 08:46:48'),('03','02','1669474278_3782659ca06677ddcfcd.jpg','2022-11-26 08:51:23','2022-11-26 08:51:23'),('04','02','1669474276_87f7133949b8f8aef826.jpg','2022-11-26 08:51:23','2022-11-26 08:51:23');
/*!40000 ALTER TABLE `worship_place_gallery` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-12 13:03:52
