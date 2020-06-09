-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: multiauth
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-1

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,'NsWLaK','تهران خیابان ازادی','7777','2018-01-19 06:06:21','2018-01-19 06:06:21'),(2,'HoP5ae','تهران خیابان نارمک','3333','2018-01-19 06:07:22','2018-01-19 06:07:22'),(3,'RK2czO','تهران خیابان اسلامی','3333','2018-01-19 06:15:44','2018-01-19 06:15:44');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presence_now` tinyint(1) NOT NULL DEFAULT '1',
  `doc_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialties` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_to_visit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_token` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_url_token` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '84s6tb',
  `price_of_free_visit` double(8,5) NOT NULL DEFAULT '0.00000',
  `total_earn_till_now` double(8,5) NOT NULL DEFAULT '0.00000',
  `doc_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `insured_expiration_date` date NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  UNIQUE KEY `admins_url_token_unique` (`url_token`),
  UNIQUE KEY `admins_address_url_token_unique` (`address_url_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'wildonion','ea_pain@yahoo.com',0,'5a61d9ea3c373.jpg','heartbleed','8','kBtFuc','HoP5ae',210.00000,0.00000,'i\'m a heartbleed docy','2012-09-09','$2y$10$xvNuNjEFSvipkhYu7FzUfOB.PS3.FYpnnt7lOF/7zG1J6173848.i','xO4feGRs4nSzKReG4SZmm05WhYpF0d8ygqTSbKVAZ2VjKWgpyZF7ls6Ip0W5','2018-01-19 06:07:10','2018-01-19 08:13:38'),(2,'vocfu','vocfu_pain@yahoo.com',1,'5a61d9adb49e9.jpg','heartbleed','6','KUBEgt','RK2czO',340.00000,34.00000,'i\'m a heartbleed doooooc','2013-09-09','$2y$10$3OpPSfwZCRlHenMZgpsGluy2gp6.sCslXQ6.SMAQ4CUfDEbQyjgly','XoG3qn3OgSLRUZIQUxq4bIX6wnA7FF8h2WdLsYNaRyA810AB6BmEmeSVsCd3','2018-01-19 06:15:33','2018-01-19 08:12:37'),(3,'icfu','an_pain@yahoo.com',1,'5a61db9ce5aa1.jpg','urology','10','1uXP55','ZFSXUO',348.00000,34.80000,'i am a urology doctor','2016-09-01','$2y$10$H2d1xvQjPpfHUcTvouNaKeabvIWG1BKeDXSwk35/3ign/ZzEfKpmG','P6ZLBbdkTyRX5cR3eqpgBiGi8RE6FnbKiMKUEjXAgrOKTGO516pZgHGILddN','2018-01-19 06:23:34','2018-01-19 08:20:53');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor_presence`
--

DROP TABLE IF EXISTS `doctor_presence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor_presence` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address_url_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `from` time NOT NULL DEFAULT '00:00:00',
  `till` time NOT NULL DEFAULT '00:00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor_presence`
--

LOCK TABLES `doctor_presence` WRITE;
/*!40000 ALTER TABLE `doctor_presence` DISABLE KEYS */;
INSERT INTO `doctor_presence` VALUES (1,'HoP5ae','sunday, monday','10:00:00','13:00:00','2018-01-19 06:07:10','2018-01-19 06:11:40'),(2,'RK2czO','thursday','08:00:00','10:00:00','2018-01-19 06:15:33','2018-01-19 08:12:37'),(3,'ZFSXUO','sunday, monday','09:00:00','10:00:00','2018-01-19 06:23:34','2018-01-19 06:24:07');
/*!40000 ALTER TABLE `doctor_presence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `earn_of_clinic`
--

DROP TABLE IF EXISTS `earn_of_clinic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `earn_of_clinic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total_earn` double(8,5) NOT NULL DEFAULT '0.00000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `earn_of_clinic`
--

LOCK TABLES `earn_of_clinic` WRITE;
/*!40000 ALTER TABLE `earn_of_clinic` DISABLE KEYS */;
INSERT INTO `earn_of_clinic` VALUES (1,34.00000,'2018-01-19 06:29:50','2018-01-19 06:29:50'),(2,34.80000,'2018-01-19 07:02:26','2018-01-19 07:02:26');
/*!40000 ALTER TABLE `earn_of_clinic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general_patients_info`
--

DROP TABLE IF EXISTS `general_patients_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_patients_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issued` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` tinyint(4) NOT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'other',
  `disease_experience` tinyint(1) NOT NULL DEFAULT '0',
  `insured` tinyint(1) NOT NULL DEFAULT '0',
  `kind_of_insured` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `insured_expiration_date` date NOT NULL,
  `doc_token` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `general_patients_info_doc_token_unique` (`doc_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_patients_info`
--

LOCK TABLES `general_patients_info` WRITE;
/*!40000 ALTER TABLE `general_patients_info` DISABLE KEYS */;
INSERT INTO `general_patients_info` VALUES (1,'zohreh','کرج هفت تیر','تهران','33333',24,'female',1,1,'T-E','2019-09-09','rK8oG5','2018-01-19 06:29:18','2018-01-19 06:29:18'),(2,'steve','تهران خیابان کرج','شیراز','99999',15,'male',1,0,'LIFE','2034-09-09','k7iMoh','2018-01-19 08:01:48','2018-01-19 08:01:48');
/*!40000 ALTER TABLE `general_patients_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insured`
--

DROP TABLE IF EXISTS `insured`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insured` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `off_percentage` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insured`
--

LOCK TABLES `insured` WRITE;
/*!40000 ALTER TABLE `insured` DISABLE KEYS */;
INSERT INTO `insured` VALUES (1,'T-E',10,NULL,NULL),(2,'LIFE',4,'2018-01-19 07:01:24','2018-01-19 07:01:24');
/*!40000 ALTER TABLE `insured` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=353 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (343,'2014_10_12_000000_create_users_table',1),(344,'2014_10_12_100000_create_password_resets_table',1),(345,'2017_07_24_164536_create_admins_table',1),(346,'2018_01_12_125640_create_patients_table',1),(347,'2018_01_12_180819_create_insured_table',1),(348,'2018_01_12_182629_create_addresses_table',1),(349,'2018_01_12_183425_create_doctor_presence_table',1),(350,'2018_01_12_185037_create_patient_visit_paper_table',1),(351,'2018_01_12_185352_create_prescription_table',1),(352,'2018_01_12_191500_create_earn_of_clinic_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient_visit_paper`
--

DROP TABLE IF EXISTS `patient_visit_paper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient_visit_paper` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `room` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double(8,5) NOT NULL DEFAULT '0.00000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_visit_paper`
--

LOCK TABLES `patient_visit_paper` WRITE;
/*!40000 ALTER TABLE `patient_visit_paper` DISABLE KEYS */;
INSERT INTO `patient_visit_paper` VALUES (1,1,2,'6',34.00000,'2018-01-19 06:29:50','2018-01-19 06:29:50'),(2,1,3,'10',34.80000,'2018-01-19 07:02:26','2018-01-19 07:02:26');
/*!40000 ALTER TABLE `patient_visit_paper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescription` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription`
--

LOCK TABLES `prescription` WRITE;
/*!40000 ALTER TABLE `prescription` DISABLE KEYS */;
INSERT INTO `prescription` VALUES (1,1,2,'this is a fansy patient','2018-01-19 07:00:19','2018-01-19 07:00:19'),(2,1,3,'این بیمار مشکل روانی دارد','2018-01-19 07:09:40','2018-01-19 07:09:40');
/*!40000 ALTER TABLE `prescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` tinyint(4) NOT NULL,
  `clerk_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_token` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_url_token` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'viFRlI',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_url_token_unique` (`url_token`),
  UNIQUE KEY `users_address_url_token_unique` (`address_url_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'erfan','ea_pain@yahoo.com','$2y$10$b72Zn33xi/o7RWDy3DZ9aebXc1obKBT40iidjcIqxYmNAjkGFanMu',15,'5a61c88427e56.jpg','JHbMyb','NsWLaK','vEopsAvIXpqEVbxxwcZKWo6LG3Bzeys1FnozQloeawpMJ0b8HHJhR1fvDlET','2018-01-19 06:06:03','2018-01-19 06:59:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-19 22:09:35
