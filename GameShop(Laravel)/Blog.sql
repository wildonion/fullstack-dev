-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB-5+b1

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
-- Table structure for table `admin_contact_info`
--

DROP TABLE IF EXISTS `admin_contact_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_contact_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telegram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compony` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci,
  `about_meF_User` text COLLATE utf8mb4_unicode_ci,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_contact_info`
--

LOCK TABLES `admin_contact_info` WRITE;
/*!40000 ALTER TABLE `admin_contact_info` DISABLE KEYS */;
INSERT INTO `admin_contact_info` VALUES (1,1,'erfan arefi','l1w2o','@wild_onion','Erfan Wo','ea_pain@yahoo.com','ea_pain@yahoo.com','WO','contact.png','<p style=\"text-align: right;\"><img alt=\"shayan_val\" src=\"http://127.0.0.1:8000/uploads/photos/1/user.png\" style=\"width: 150px; height: 150px; float: right;\" /></p>\r\n\r\n<p style=\"text-align: right;\">سلام من شایان ولی یاری هستم 21 ساله از تهران</p>\r\n\r\n<p style=\"text-align: right;\">اوقات فراغت خود را با درس و دانشگاه و جلوه های ویژه و بازی سازی</p>\r\n\r\n<p style=\"text-align: right;\">و آهنگ سازی و ... میگذرونم</p>','<p>hello, i&#39;m shayan valyari</p>','09211686115',NULL,'2017-03-27 19:29:51');
/*!40000 ALTER TABLE `admin_contact_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `body_setting`
--

DROP TABLE IF EXISTS `body_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `body_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titleF_User` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionF_User` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `body_setting`
--

LOCK TABLES `body_setting` WRITE;
/*!40000 ALTER TABLE `body_setting` DISABLE KEYS */;
INSERT INTO `body_setting` VALUES (1,1,'اخطار','deactivating title','compony.png',1,'<p style=\"text-align: right;\"><span style=\"font-size:20px;\"><span style=\"font-family: BZiba;\">این سایت غیر فعال است</span></span></p>','<p>this site is currently disabled</p>',NULL,'2017-03-18 17:22:02');
/*!40000 ALTER TABLE `body_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `brand` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandF_User` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,1,'<p style=\"text-align: right;\"><span style=\"font-size:24px;\"><span style=\"font-family: BTabassom;\">به سایت شایان ولی یاری خوش امدید امیدوارم تو این سایت بتونم محتویات خوبی براتون بذارم</span></span></p>\r\n\r\n<p style=\"text-align: right;\"><span style=\"font-size:24px;\"><span style=\"font-family: BTabassom;\">به بلاگ من سر بزنید بازی های من رو حتما ببینید دوستان ممنون! هدف از ایجاد این سایت و قسمت بلاگ آن این بوده که بتونم همیشه کارهای خود در زمینه بازی سازی و آهنگ سازی و جلوه های ویژه رو برای بقیه به ارمغان</span></span></p>\r\n\r\n<p style=\"text-align: right;\"><span style=\"font-size:24px;\"><span style=\"font-family: BTabassom;\">بگذارم</span></span></p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/uploads/photos/1/gamecollection.jpeg\" style=\"width: 200px; height: 125px;\" /></p>\r\n\r\n<p>&nbsp;</p>','<p>brand description or image here ...</p>','blog.png',NULL,'2017-06-02 04:57:39');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `news_ID` int(11) NOT NULL,
  `news_title_F_User` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0','عرفان','ea_pain@yahoo.com','سلام ک*ری سایت خوبی داری :grinning:',1,3,'test','تست','2017-05-10 07:32:13','2017-05-10 07:32:48'),(2,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0','erfan','ea_pain@yahoo.com','hi:)',1,3,'test','تست','2017-05-10 07:51:35','2017-05-10 07:52:00'),(3,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0','علی','ea_pain@yahoo.com','سلام اقا سایت بدی نیست:smiley:',0,3,'test','تست','2017-05-10 08:01:20','2017-05-10 08:01:20'),(4,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0','ali','ali_pain@yahoo.com','اقا سلام چه خبر',1,3,'test','تست','2017-05-10 08:37:42','2017-05-10 08:38:04'),(5,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0','محمد عرفان عارفی مقدم','ea_pain@yahoo.com',':heart:',0,3,'test','تست','2017-05-11 07:51:56','2017-05-11 07:51:56'),(6,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0','ali','ali_pain@yahoo.com',':couplekiss:',1,3,'test','تست','2017-05-12 02:23:18','2017-05-12 02:23:38'),(7,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0','کیر خر','ea_pain@yahoo.com','ک*رخر ک*کش',0,3,'test','تست-اول','2017-07-02 14:44:33','2017-07-02 14:44:33');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `footer_setting`
--

DROP TABLE IF EXISTS `footer_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `footer_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionF_User` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footer_setting`
--

LOCK TABLES `footer_setting` WRITE;
/*!40000 ALTER TABLE `footer_setting` DISABLE KEYS */;
INSERT INTO `footer_setting` VALUES (1,1,'<p style=\"text-align: right;\"><span style=\"font-size:11px;\"><span style=\"font-family: BFarnaz;\">طراحی شده توسط</span></span></p>\r\n\r\n<p style=\"text-align: right;\"><img alt=\"\" src=\"http://127.0.0.1:8000/uploads/photos/1/wo.png\" style=\"width: 60px; height: 37px;\" />&nbsp;</p>','<p>all right reserved</p>',NULL,'2017-03-19 10:00:16');
/*!40000 ALTER TABLE `footer_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kryptonit3_counter_page`
--

DROP TABLE IF EXISTS `kryptonit3_counter_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kryptonit3_counter_page` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kryptonit3_counter_page_page_unique` (`page`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kryptonit3_counter_page`
--

LOCK TABLES `kryptonit3_counter_page` WRITE;
/*!40000 ALTER TABLE `kryptonit3_counter_page` DISABLE KEYS */;
INSERT INTO `kryptonit3_counter_page` VALUES (2,'0c17ea82-b210-53a5-8137-83ee231feb2a'),(10,'141fe74f-15c3-5cc5-a3a0-1cb219361cea'),(7,'23d06c4b-f2e5-5c65-9a0c-a62786abc295'),(8,'5e6883d5-e927-5255-ad79-9af4aeed7273'),(5,'7ef0c971-0559-5d24-a189-d72f8d05d2d7'),(4,'a14854fc-559c-58f9-b924-995921257a0d'),(1,'abe7f04d-f1f1-5914-bb49-ac0a53938fdf'),(3,'d0ead06c-7df4-56bd-9959-da485f63a681'),(9,'d20a08e2-6c69-5273-8858-fcd6a61578ae'),(6,'dec754a5-7ef3-529b-8f0e-88321f9e8fb3');
/*!40000 ALTER TABLE `kryptonit3_counter_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kryptonit3_counter_page_visitor`
--

DROP TABLE IF EXISTS `kryptonit3_counter_page_visitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kryptonit3_counter_page_visitor` (
  `page_id` bigint(20) unsigned NOT NULL,
  `visitor_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `kryptonit3_counter_page_visitor_page_id_index` (`page_id`),
  KEY `kryptonit3_counter_page_visitor_visitor_id_index` (`visitor_id`),
  CONSTRAINT `kryptonit3_counter_page_visitor_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `kryptonit3_counter_page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kryptonit3_counter_page_visitor_visitor_id_foreign` FOREIGN KEY (`visitor_id`) REFERENCES `kryptonit3_counter_visitor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kryptonit3_counter_page_visitor`
--

LOCK TABLES `kryptonit3_counter_page_visitor` WRITE;
/*!40000 ALTER TABLE `kryptonit3_counter_page_visitor` DISABLE KEYS */;
INSERT INTO `kryptonit3_counter_page_visitor` VALUES (1,1,'2017-03-16 08:53:01'),(2,1,'2017-05-02 13:37:13'),(3,1,'2017-03-15 21:24:51'),(4,1,'2017-04-16 07:43:23'),(5,1,'2017-03-19 19:29:43'),(6,1,'2017-03-20 09:28:50'),(7,1,'2017-03-20 09:22:48'),(8,1,'2017-03-20 06:30:15'),(9,1,'2017-05-02 13:32:10'),(10,1,'2017-08-07 12:34:16'),(10,2,'2017-06-07 12:06:10');
/*!40000 ALTER TABLE `kryptonit3_counter_page_visitor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kryptonit3_counter_visitor`
--

DROP TABLE IF EXISTS `kryptonit3_counter_visitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kryptonit3_counter_visitor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `visitor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kryptonit3_counter_visitor_visitor_unique` (`visitor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kryptonit3_counter_visitor`
--

LOCK TABLES `kryptonit3_counter_visitor` WRITE;
/*!40000 ALTER TABLE `kryptonit3_counter_visitor` DISABLE KEYS */;
INSERT INTO `kryptonit3_counter_visitor` VALUES (2,'437fced6e0607330bb82af734d2831f758a493561c5579bb0bdf9d4e82585735'),(1,'b1b13a51b2d3b365dfd3192af553e387994c10a3c165365a3392114c32bc89c8');
/*!40000 ALTER TABLE `kryptonit3_counter_visitor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `latest_news`
--

DROP TABLE IF EXISTS `latest_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `latest_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_descF_User` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagsF_User` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titleF_User` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionF_User` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `latest_news`
--

LOCK TABLES `latest_news` WRITE;
/*!40000 ALTER TABLE `latest_news` DISABLE KEYS */;
INSERT INTO `latest_news` VALUES (3,'تست-اول','this is a test','تست این یک تست است','test','تست اول','test','1.jpg','<p style=\"text-align: right;\">خیله خب این یک تست کیری است لطفا احترام بگذارید</p>','<p>allright then this a dicky test</p>','Jim Carrey - I\'m Gay.mp4','2017-05-03 11:11:11','2017-06-10 04:39:05');
/*!40000 ALTER TABLE `latest_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (16,'127.0.0.1',1,'2017-03-27 10:44:03','2017-03-27 10:44:03'),(24,'127.0.0.1',2,'2017-05-02 13:32:43','2017-05-02 13:32:43');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=381 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (353,'2014_10_12_000000_create_users_table',1),(354,'2014_10_12_100000_create_password_resets_table',1),(355,'2015_06_21_181359_create_kryptonit3_counter_page_table',1),(356,'2015_06_21_193003_create_kryptonit3_counter_visitor_table',1),(357,'2015_06_21_193059_create_kryptonit3_counter_page_visitor_table',1),(358,'2017_02_20_190901_create_video_games_table',1),(360,'2017_02_20_202500_create_admin_contact_info_table',1),(361,'2017_03_03_131715_create_latest_news_table',1),(362,'2017_03_05_061658_create_body_setting_table',1),(363,'2017_03_08_120326_create_likes_table',1),(364,'2017_03_10_080332_create_brand_table',1),(365,'2017_03_13_090713_create_shop_store_setting_table',1),(369,'2017_03_19_102314_create_footer_setting_table',2),(372,'2017_03_19_125438_add_tags_to_video_games',4),(373,'2017_03_19_130941_add_tags_to_latest_news',5),(374,'2017_03_19_142754_create_nstag_setting_table',6),(375,'2017_03_19_144924_add_meta_desc_to_video_games',7),(376,'2017_03_19_144955_add_meta_desc_to_latest_news',7),(377,'2017_03_19_163708_add_user_info_to_comments',8),(379,'2017_03_19_165225_create_comments_table',9),(380,'2017_03_27_210548_add_news_title_to_comments',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nstag_setting`
--

DROP TABLE IF EXISTS `nstag_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nstag_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `page` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_descF_User` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagsF_User` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nstag_setting`
--

LOCK TABLES `nstag_setting` WRITE;
/*!40000 ALTER TABLE `nstag_setting` DISABLE KEYS */;
INSERT INTO `nstag_setting` VALUES (1,1,'main_page','سایت شایان ولی یاری سایتی است برای به عرضه گذاشتن بازی های جدید و همچنین به اشتراک گذاشتن قسمت های جلوه های ويژه در قسمت بلاگ همین سایت میباشد','yes','شایان, بلاگ, صفحه اصلی','shayan, blog',NULL,NULL),(2,1,'portfolio_page','اره','yes','شایان, بلاگ, بازی های من','shayan, blog',NULL,NULL),(3,1,'blogs_page','اره','yes','شایان, بلاگ, بلاگ من','shayan, blog',NULL,NULL),(4,1,'contact_page','نه','yes','شایان, بلاگ','shayan, blog',NULL,NULL),(5,1,'shop_page','فروشگاه سایت شایان ولی یاری\r\nبرای دانلود یا خرید بازی های ساخته شده','shop store of the shayan valiyari for downloading or buying new game','شایان ولی یاری, فروشگاه','shayan, shop',NULL,NULL);
/*!40000 ALTER TABLE `nstag_setting` ENABLE KEYS */;
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
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('ea_pain@yahoo.com','$2y$10$o0hwGzxSpDjFHjX5J0hSZeMH6laAlffqHXJJjvdSVHOGTybHQvCT2','2017-06-05 11:40:51');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_setting`
--

DROP TABLE IF EXISTS `shop_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titleF_User` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionF_User` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_setting`
--

LOCK TABLES `shop_setting` WRITE;
/*!40000 ALTER TABLE `shop_setting` DISABLE KEYS */;
INSERT INTO `shop_setting` VALUES (1,1,'اخطار','deactivating title',NULL,0,'<p style=\"text-align: right;\">در حال راه اندازی از صبر و شکیبایی شما متشکریم</p>\r\n\r\n<p style=\"text-align: right;\"><img alt=\"\" src=\"http://127.0.0.1:8000/uploads/photos/1/02.jpg\" style=\"width: 100px; height: 56px;\" /></p>','<p>deactivating description here</p>','2018-03-11 17:38:06',NULL,'2017-04-15 10:51:01');
/*!40000 ALTER TABLE `shop_setting` ENABLE KEYS */;
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'erfan','ea_pain@yahoo.com','$2y$10$RfKHVoizhHxXnI.6NRfOr.u5yyxSRe79Fwuwssp20YbjfWHW0eNsi','asiewstxrXeXqYAAZt40prXFehsB3gSOe76SyTGwO9Qjr5dSxl64XBDC94Fm','2017-03-15 15:31:06','2017-06-05 11:24:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_games`
--

DROP TABLE IF EXISTS `video_games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_descF_User` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagsF_User` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titleFUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_game_n1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_game_n2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_game_n3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_game_n4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_game_n5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_game_n6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_n2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_n3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_n4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_n2F_User` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_n3F_User` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_n4F_User` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_game_n2_status` int(11) NOT NULL DEFAULT '0',
  `picture_game_n3_status` int(11) NOT NULL DEFAULT '0',
  `picture_game_n4_status` int(11) NOT NULL DEFAULT '0',
  `picture_game_n5_status` int(11) NOT NULL DEFAULT '0',
  `picture_game_n6_status` int(11) NOT NULL DEFAULT '0',
  `video_game` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionFUser` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_games`
--

LOCK TABLES `video_games` WRITE;
/*!40000 ALTER TABLE `video_games` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_games` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-24 16:51:17
