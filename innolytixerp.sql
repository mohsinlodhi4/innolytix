-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: innolytixerp
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `account_heads`
--

DROP TABLE IF EXISTS `account_heads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_heads` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ledger_id` bigint(20) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `has_child` tinyint(1) NOT NULL DEFAULT 0,
  `has_parent` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_heads`
--

LOCK TABLES `account_heads` WRITE;
/*!40000 ALTER TABLE `account_heads` DISABLE KEYS */;
INSERT INTO `account_heads` VALUES (1,'Assets','10000','asset',1,0,1,0,NULL,'2022-04-11 23:57:26',NULL),(2,'Liabilities','20000','liability',2,0,1,0,NULL,'2022-04-12 00:20:55',NULL),(3,'Capital','30000','equity',3,0,0,0,NULL,NULL,NULL),(4,'Income','40000','income',4,0,0,0,NULL,NULL,NULL),(5,'Expenses','50000','expense',5,0,1,0,NULL,'2022-04-21 08:32:58',NULL),(6,'Fixed Assets','10001','asset',1,1,1,1,'2022-04-12 00:00:14','2022-04-13 19:29:19',NULL),(7,'Current Assets','10002','asset',1,1,1,1,'2022-04-12 00:01:39','2022-04-13 23:37:18',NULL),(8,'Current Liabilities','20001','liability',2,2,1,1,'2022-04-12 00:20:55','2022-04-16 22:38:59',NULL),(9,'Other Liabilities','20002','liability',2,2,0,1,'2022-04-12 00:27:53','2022-04-12 00:27:53',NULL),(10,'Tax Liabilities','20003','liability',2,2,0,1,'2022-04-12 00:28:53','2022-04-12 00:28:53',NULL),(12,'Bank','10003','asset',1,7,1,1,'2022-04-13 23:37:18','2022-04-13 23:39:12',NULL),(14,'Marchandise','10003','asset',1,7,0,1,'2022-04-14 00:29:23','2022-04-14 00:29:23',NULL),(15,'Trade Creditors','20002','liability',2,8,0,1,'2022-04-16 22:38:59','2022-04-16 22:38:59',NULL),(16,'Accounts Receivables','10003','asset',1,7,0,1,'2022-04-17 08:31:32','2022-04-17 08:31:32',NULL);
/*!40000 ALTER TABLE `account_heads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounting_journal_transactions`
--

DROP TABLE IF EXISTS `accounting_journal_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounting_journal_transactions` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_group` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `journal_id` int(11) NOT NULL,
  `debit` bigint(20) DEFAULT NULL,
  `credit` bigint(20) DEFAULT NULL,
  `currency` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_class` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_class_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_date` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `accounting_journal_transactions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounting_journal_transactions`
--

LOCK TABLES `accounting_journal_transactions` WRITE;
/*!40000 ALTER TABLE `accounting_journal_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `accounting_journal_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounting_journals`
--

DROP TABLE IF EXISTS `accounting_journals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounting_journals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ledger_id` int(10) unsigned DEFAULT NULL,
  `balance` bigint(20) NOT NULL,
  `currency` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `morphed_type` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `morphed_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounting_journals`
--

LOCK TABLES `accounting_journals` WRITE;
/*!40000 ALTER TABLE `accounting_journals` DISABLE KEYS */;
INSERT INTO `accounting_journals` VALUES (19,5,0,'USD','App\\Models\\Account',14,'2022-04-13 19:55:42','2022-04-13 19:55:42'),(20,5,0,'USD','App\\Models\\Account',15,'2022-04-13 23:10:52','2022-04-13 23:10:52'),(21,NULL,0,'USD','App\\Models\\Account',16,'2022-04-13 23:30:38','2022-04-13 23:30:38'),(22,1,0,'USD','App\\Models\\Account',17,'2022-04-13 23:32:44','2022-04-13 23:32:44'),(23,NULL,0,'USD','App\\Models\\Account',18,'2022-04-13 23:38:11','2022-04-13 23:38:11'),(24,1,0,'USD','App\\Models\\Account',19,'2022-04-13 23:40:24','2022-04-13 23:40:24'),(25,2,0,'USD','App\\Models\\Account',20,'2022-04-14 00:04:23','2022-04-14 00:04:23'),(26,NULL,0,'USD','App\\Models\\Account',21,'2022-04-14 00:29:43','2022-04-14 00:29:43'),(27,NULL,0,'USD','App\\Models\\Account',22,'2022-04-14 00:40:21','2022-04-14 00:40:21'),(28,NULL,0,'USD','App\\Models\\Account',23,'2022-04-14 00:42:06','2022-04-14 00:42:06'),(29,1,0,'USD','App\\Models\\Account',24,'2022-04-14 00:42:42','2022-04-14 00:42:42'),(30,1,0,'USD','App\\Models\\Account',25,'2022-04-14 00:44:52','2022-04-14 00:44:52'),(33,1,0,'USD','App\\Models\\Account',26,'2022-04-16 22:30:06','2022-04-16 22:30:06'),(34,2,0,'USD','App\\Models\\Account',27,'2022-04-16 22:43:11','2022-04-16 22:43:11'),(35,3,0,'USD','App\\Models\\Account',28,'2022-04-16 22:46:40','2022-04-16 22:46:40'),(36,4,0,'USD','App\\Models\\Account',29,'2022-04-16 23:30:22','2022-04-16 23:30:22'),(37,2,0,'USD','App\\Models\\Vendor',3,'2022-04-21 05:56:47','2022-04-21 05:56:48'),(38,2,0,'USD','App\\Models\\Vendor',4,'2022-04-21 06:02:01','2022-04-21 06:02:01'),(39,1,0,'USD','App\\Models\\Account',30,'2022-04-21 06:03:51','2022-04-21 06:03:51'),(40,1,0,'USD','App\\Models\\Account',31,'2022-04-21 07:31:03','2022-04-21 07:31:03'),(41,1,0,'USD','App\\Models\\Account',32,'2022-04-21 07:55:17','2022-04-21 07:55:17'),(42,5,0,'USD','App\\Models\\Account',33,'2022-04-26 09:14:32','2022-04-26 09:14:32'),(43,2,0,'USD','App\\Models\\Account',34,'2022-04-26 09:15:26','2022-04-26 09:15:26'),(44,2,0,'USD','App\\Models\\Account',35,'2022-04-26 09:17:17','2022-04-26 09:17:17'),(45,2,0,'USD','App\\Models\\Account',36,'2022-04-26 09:18:52','2022-04-26 09:18:52'),(46,1,0,'USD','App\\Models\\Account',37,'2022-04-26 19:55:02','2022-04-26 19:55:02'),(47,1,0,'USD','App\\Models\\Account',38,'2022-04-26 20:41:20','2022-04-26 20:41:20'),(48,1,0,'USD','App\\Models\\Account',39,'2022-04-26 21:03:36','2022-04-26 21:03:36'),(49,1,0,'USD','App\\Models\\Account',40,'2022-04-26 21:10:32','2022-04-26 21:10:32');
/*!40000 ALTER TABLE `accounting_journals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounting_ledgers`
--

DROP TABLE IF EXISTS `accounting_ledgers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounting_ledgers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('asset','liability','equity','income','expense') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounting_ledgers`
--

LOCK TABLES `accounting_ledgers` WRITE;
/*!40000 ALTER TABLE `accounting_ledgers` DISABLE KEYS */;
INSERT INTO `accounting_ledgers` VALUES (1,'Company Assets','asset','2022-04-12 01:54:49','2022-04-12 01:54:49'),(2,'Company Liabilities','liability','2022-04-12 01:54:49','2022-04-12 01:54:49'),(3,'Company Equity','equity','2022-04-12 01:54:49','2022-04-12 01:54:49'),(4,'Company Income','income','2022-04-12 01:54:49','2022-04-12 01:54:49'),(5,'Company Expenses','expense','2022-04-12 01:54:49','2022-04-12 01:54:49');
/*!40000 ALTER TABLE `accounting_ledgers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_id` bigint(20) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `type` char(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'account',
  `type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (14,'Patty Cash',5,NULL,'account',NULL,'2022-04-13 19:55:42','2022-04-13 19:55:42'),(15,'Entertainment',5,NULL,'account',NULL,'2022-04-13 23:10:52','2022-04-13 23:10:52'),(17,'Computer and Laptops',6,NULL,'account',NULL,'2022-04-13 23:32:44','2022-04-13 23:32:44'),(25,'Dell Laptop D442',14,NULL,'account',NULL,'2022-04-14 00:44:52','2022-04-14 00:44:52'),(26,'AL Falah Jahaan Alam',12,NULL,'bank',8,'2022-04-16 22:30:06','2022-04-16 22:30:06'),(27,'KSOBLAP12',16,NULL,'joborder',6,'2022-04-16 22:43:11','2022-04-16 22:43:11'),(28,'Opening Balance Equity',3,NULL,'account',NULL,'2022-04-16 22:46:40','2022-04-16 22:46:40'),(29,'Sales Revenue',4,NULL,'account',NULL,'2022-04-16 23:30:22','2022-04-16 23:30:22'),(30,'12312asdasd123',16,NULL,'joborder',7,'2022-04-21 06:03:51','2022-04-21 06:03:51'),(31,'Meezan Bank Mohsin Khan Lodhi',12,NULL,'bank',9,'2022-04-21 07:31:03','2022-04-21 07:31:03'),(32,'Bank Al Falah my account',12,NULL,'bank',10,'2022-04-21 07:55:17','2022-04-21 07:55:17'),(37,'IPPL-0001',16,NULL,'joborder',8,'2022-04-26 19:55:02','2022-04-26 19:55:02'),(38,'Indus Hospital',16,NULL,'account',NULL,'2022-04-26 20:41:20','2022-04-26 20:41:20'),(39,'IPPL-0002',16,NULL,'joborder',9,'2022-04-26 21:03:36','2022-04-26 21:03:36'),(40,'Laptop',6,NULL,'account',NULL,'2022-04-26 21:10:31','2022-04-26 21:10:31');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `present` int(10) unsigned NOT NULL,
  `day` date NOT NULL,
  `time_in` timestamp NULL DEFAULT NULL,
  `time_out` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendances`
--

LOCK TABLES `attendances` WRITE;
/*!40000 ALTER TABLE `attendances` DISABLE KEYS */;
INSERT INTO `attendances` VALUES (1,'127.0.0.1',1,0,'2022-03-06','2022-03-06 11:16:19','2022-03-06 15:31:06','2022-03-06 11:16:19','2022-03-06 19:12:14',NULL),(2,'127.0.0.1',2,0,'2022-03-07','2022-03-06 19:10:38','2022-03-06 19:11:39','2022-03-06 19:10:38','2022-03-06 19:11:39',NULL),(3,'127.0.0.1',1,0,'2022-03-07','2022-03-06 19:12:14','2022-03-06 23:34:05','2022-03-06 19:12:14','2022-03-06 23:34:05',NULL),(4,'127.0.0.1',2,0,'2022-03-07','2022-03-06 23:34:19','2022-03-06 23:34:56','2022-03-06 23:34:19','2022-03-06 23:34:56',NULL),(5,'127.0.0.1',1,0,'2022-03-07','2022-03-06 23:35:15','2022-03-06 23:39:24','2022-03-06 23:35:15','2022-03-06 23:41:34',NULL),(6,'127.0.0.1',2,0,'2022-03-07','2022-03-06 23:36:33','2022-03-06 23:37:24','2022-03-06 23:36:33','2022-03-06 23:37:24',NULL),(7,'127.0.0.1',1,0,'2022-03-07','2022-03-06 23:41:34','2022-03-06 23:48:22','2022-03-06 23:41:34','2022-03-07 12:21:47',NULL),(8,'127.0.0.1',3,0,'2022-03-07','2022-03-07 12:19:22','2022-03-07 12:20:57','2022-03-07 12:19:22','2022-03-07 12:20:57',NULL),(9,'127.0.0.1',1,0,'2022-03-07','2022-03-07 12:21:47','2022-03-07 12:23:49','2022-03-07 12:21:47','2022-03-08 19:08:08',NULL),(10,'127.0.0.1',1,0,'2022-03-09','2022-03-08 19:08:08','2022-03-08 21:45:46','2022-03-08 19:08:08','2022-03-08 21:52:38',NULL),(11,'127.0.0.1',1,0,'2022-03-09','2022-03-08 21:52:38','2022-03-08 23:50:47','2022-03-08 21:52:38','2022-03-09 08:03:22',NULL),(12,'127.0.0.1',1,0,'2022-03-09','2022-03-09 08:03:22','2022-03-09 08:05:30','2022-03-09 08:03:22','2022-03-09 21:39:59',NULL),(13,'127.0.0.1',1,0,'2022-03-10','2022-03-09 21:39:59','2022-03-09 23:32:36','2022-03-09 21:40:00','2022-03-11 16:34:25',NULL),(14,'127.0.0.1',1,0,'2022-03-11','2022-03-11 16:34:25','2022-03-12 01:15:37','2022-03-11 16:34:25','2022-03-12 08:55:20',NULL),(15,'127.0.0.1',1,0,'2022-03-12','2022-03-12 08:55:20','2022-03-12 08:56:21','2022-03-12 08:55:20','2022-03-12 08:56:21',NULL),(16,'127.0.0.1',2,1,'2022-03-12','2022-03-12 08:56:40','2022-03-12 11:28:41','2022-03-12 08:56:40','2022-03-12 11:28:41',NULL),(17,'127.0.0.1',1,0,'2022-03-12','2022-03-12 18:49:03','2022-03-12 23:05:33','2022-03-12 18:49:03','2022-03-13 09:36:54',NULL),(18,'127.0.0.1',1,0,'2022-03-13','2022-03-13 09:36:53','2022-03-13 22:01:41','2022-03-13 09:36:54','2022-03-14 13:26:36',NULL),(19,'127.0.0.1',1,0,'2022-03-14','2022-03-14 13:26:36','2022-03-14 13:28:42','2022-03-14 13:26:36','2022-03-14 16:29:10',NULL),(20,'127.0.0.1',1,0,'2022-03-14','2022-03-14 16:29:10','2022-03-14 18:34:03','2022-03-14 16:29:10','2022-03-19 19:11:31',NULL),(21,'127.0.0.1',1,0,'2022-03-20','2022-03-19 19:11:31','2022-03-19 20:45:39','2022-03-19 19:11:31','2022-03-20 18:16:26',NULL),(22,'127.0.0.1',1,0,'2022-03-20','2022-03-20 18:16:26','2022-03-20 20:34:16','2022-03-20 18:16:26','2022-03-23 20:59:18',NULL),(23,'127.0.0.1',1,0,'2022-03-24','2022-03-23 20:59:18','2022-03-23 21:05:34','2022-03-23 20:59:20','2022-03-24 21:20:48',NULL),(24,'127.0.0.1',1,0,'2022-03-25','2022-03-24 21:20:48','2022-03-25 01:18:47','2022-03-24 21:20:48','2022-03-25 08:25:15',NULL),(25,'127.0.0.1',1,0,'2022-03-25','2022-03-25 08:25:15','2022-03-25 10:07:30','2022-03-25 08:25:15','2022-03-27 09:39:37',NULL),(26,'127.0.0.1',1,0,'2022-03-27','2022-03-27 09:39:37','2022-03-27 11:56:06','2022-03-27 09:39:37','2022-03-27 14:20:16',NULL),(27,'127.0.0.1',1,0,'2022-03-27','2022-03-27 14:20:16','2022-03-27 18:44:35','2022-03-27 14:20:16','2022-04-02 08:20:53',NULL),(28,'127.0.0.1',1,0,'2022-04-02','2022-04-02 08:20:53','2022-04-02 09:38:14','2022-04-02 08:20:53','2022-04-02 12:01:18',NULL),(29,'127.0.0.1',1,0,'2022-04-02','2022-04-02 12:01:18','2022-04-02 19:39:39','2022-04-02 12:01:18','2022-04-03 21:04:41',NULL),(30,'127.0.0.1',1,0,'2022-04-04','2022-04-03 21:04:41','2022-04-03 21:59:43','2022-04-03 21:04:41','2022-04-04 03:21:59',NULL),(31,'127.0.0.1',1,0,'2022-04-04','2022-04-04 03:21:59','2022-04-04 08:21:19','2022-04-04 03:21:59','2022-04-04 13:09:48',NULL),(32,'127.0.0.1',1,0,'2022-04-04','2022-04-04 13:09:48','2022-04-04 18:47:32','2022-04-04 13:09:48','2022-04-04 21:13:03',NULL),(33,'127.0.0.1',1,0,'2022-04-05','2022-04-04 21:13:03','2022-04-05 02:29:39','2022-04-04 21:13:03','2022-04-05 10:51:23',NULL),(34,'127.0.0.1',1,0,'2022-04-05','2022-04-05 10:51:23','2022-04-05 10:57:26','2022-04-05 10:51:23','2022-04-05 21:04:07',NULL),(35,'127.0.0.1',1,0,'2022-04-06','2022-04-05 21:04:07','2022-04-05 23:30:08','2022-04-05 21:04:07','2022-04-06 05:45:31',NULL),(36,'127.0.0.1',1,0,'2022-04-06','2022-04-06 05:45:31','2022-04-06 08:20:08','2022-04-06 05:45:31','2022-04-06 08:22:10',NULL),(37,'192.168.0.34',1,0,'2022-04-06','2022-04-06 08:22:10','2022-04-06 08:36:40','2022-04-06 08:22:10','2022-04-06 08:40:49',NULL),(38,'192.168.2.11',1,0,'2022-04-06','2022-04-06 08:40:49','2022-04-06 10:13:46','2022-04-06 08:40:49','2022-04-07 12:34:12',NULL),(39,'127.0.0.1',1,0,'2022-04-07','2022-04-07 12:34:12','2022-04-07 12:42:27','2022-04-07 12:34:12','2022-04-09 13:11:54',NULL),(40,'127.0.0.1',1,0,'2022-04-09','2022-04-09 13:11:54','2022-04-09 13:12:23','2022-04-09 13:11:54','2022-04-09 13:12:23',NULL),(41,'127.0.0.1',1,0,'2022-04-10','2022-04-10 13:18:22','2022-04-10 14:28:49','2022-04-10 13:18:22','2022-04-10 16:54:49',NULL),(42,'127.0.0.1',1,0,'2022-04-10','2022-04-10 16:54:49','2022-04-11 00:37:36','2022-04-10 16:54:49','2022-04-11 22:50:15',NULL),(43,'127.0.0.1',1,0,'2022-04-11','2022-04-11 22:50:15','2022-04-12 01:57:30','2022-04-11 22:50:15','2022-04-13 18:57:25',NULL),(44,'127.0.0.1',1,0,'2022-04-13','2022-04-13 18:57:25','2022-04-13 23:41:51','2022-04-13 18:57:25','2022-04-13 23:45:54',NULL),(45,'127.0.0.1',1,0,'2022-04-13','2022-04-13 23:45:54','2022-04-14 01:23:36','2022-04-13 23:45:54','2022-04-14 21:04:11',NULL),(46,'127.0.0.1',1,0,'2022-04-14','2022-04-14 21:04:11','2022-04-14 21:06:13','2022-04-14 21:04:11','2022-04-16 01:37:44',NULL),(47,'127.0.0.1',1,0,'2022-04-15','2022-04-16 01:37:44','2022-04-16 02:16:18','2022-04-16 01:37:44','2022-04-16 18:47:40',NULL),(48,'127.0.0.1',1,0,'2022-04-16','2022-04-16 18:47:40','2022-04-16 23:49:09','2022-04-16 18:47:40','2022-04-17 08:28:56',NULL),(49,'127.0.0.1',1,0,'2022-04-17','2022-04-17 08:28:56','2022-04-17 10:04:10','2022-04-17 08:28:56','2022-04-21 04:46:46',NULL),(50,'127.0.0.1',1,0,'2022-04-20','2022-04-21 04:46:46','2022-04-21 09:30:39','2022-04-21 04:46:46','2022-04-25 05:27:48',NULL),(51,'127.0.0.1',1,0,'2022-04-24','2022-04-25 05:27:48','2022-04-25 07:51:36','2022-04-25 05:27:48','2022-04-25 09:34:20',NULL),(52,'127.0.0.1',1,0,'2022-04-25','2022-04-25 09:34:20','2022-04-25 11:04:39','2022-04-25 09:34:20','2022-04-26 08:44:48',NULL),(53,'127.0.0.1',1,0,'2022-04-26','2022-04-26 08:44:48','2022-04-26 11:50:16','2022-04-26 08:44:49','2022-04-26 18:15:36',NULL),(54,'127.0.0.1',1,0,'2022-04-26','2022-04-26 18:15:36','2022-04-26 18:37:34','2022-04-26 18:15:36','2022-04-26 19:37:27',NULL),(55,'127.0.0.1',1,0,'2022-04-26','2022-04-26 19:37:26','2022-04-26 23:02:43','2022-04-26 19:37:27','2022-04-28 06:01:12',NULL),(56,'127.0.0.1',1,0,'2022-04-27','2022-04-28 06:01:12','2022-04-28 11:38:18','2022-04-28 06:01:12','2022-04-28 14:23:28',NULL),(57,'127.0.0.1',1,0,'2022-04-28','2022-04-28 14:23:28','2022-04-28 16:21:17','2022-04-28 14:23:28','2022-04-29 05:11:21',NULL),(58,'127.0.0.1',1,0,'2022-04-28','2022-04-29 05:11:20','2022-04-29 05:11:21','2022-04-29 05:11:21','2022-04-29 07:29:00',NULL),(59,'127.0.0.1',1,0,'2022-04-29','2022-04-29 07:29:00','2022-04-29 12:16:39','2022-04-29 07:29:00','2022-04-29 17:50:05',NULL),(60,'127.0.0.1',1,1,'2022-04-29','2022-04-29 17:50:05','2022-04-29 20:18:28','2022-04-29 17:50:06','2022-04-29 20:18:28',NULL);
/*!40000 ALTER TABLE `attendances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_balance` int(11) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banks`
--

LOCK TABLES `banks` WRITE;
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
INSERT INTO `banks` VALUES (8,'AL Falah','Gulshan','Jahaan Alam','13123123123','23234234234',15000,1,'2022-04-16 22:30:06','2022-04-16 22:30:06',NULL),(9,'Meezan Bank','Clifton','Mohsin Khan Lodhi','123456','123456',123456,1,'2022-04-21 07:31:03','2022-04-21 07:31:03',NULL),(10,'Bank Al Falah','clifton','my account','789456312','1236544869',123045,1,'2022-04-21 07:55:16','2022-04-21 07:55:16',NULL);
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ntn_no` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `srtn_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (2,'karachi school of business','3227503','5117321','1231232','karachi university road','hammad','121212','manager','2022-04-06 09:18:32','2022-04-06 09:18:32'),(4,'Afzal Bhai','123456789','456123','654789','abc Road karachi','0900878','1234567489','ABC','2022-04-21 05:59:14','2022-04-21 05:59:14'),(5,'Indus Hospital','03212406470','8989989','89898989','jkjdfjkhdfhdsjk','Afzal','03493049399','Hospital Incharge','2022-04-26 19:48:40','2022-04-26 19:48:40'),(6,'ABC Company','123456789','654879','123654','asdasda','123456987','1233','123','2022-04-26 20:46:43','2022-04-26 20:46:43');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_journals`
--

DROP TABLE IF EXISTS `company_journals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_journals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_journals`
--

LOCK TABLES `company_journals` WRITE;
/*!40000 ALTER TABLE `company_journals` DISABLE KEYS */;
INSERT INTO `company_journals` VALUES (7,'Accounts Receivable','2022-04-02 17:34:38','2022-04-02 17:34:38'),(8,'Cash','2022-04-02 17:34:38','2022-04-02 17:34:38'),(9,'Company Income','2022-04-02 17:34:38','2022-04-02 17:34:38');
/*!40000 ALTER TABLE `company_journals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file_uploads`
--

DROP TABLE IF EXISTS `file_uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file_uploads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_upload` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file_uploads`
--

LOCK TABLES `file_uploads` WRITE;
/*!40000 ALTER TABLE `file_uploads` DISABLE KEYS */;
/*!40000 ALTER TABLE `file_uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general_voucher`
--

DROP TABLE IF EXISTS `general_voucher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_voucher` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `credit_account` int(11) NOT NULL,
  `dabit_account` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `joborder_id` bigint(20) DEFAULT NULL,
  `vendor_id` bigint(20) DEFAULT NULL,
  `tax_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_voucher`
--

LOCK TABLES `general_voucher` WRITE;
/*!40000 ALTER TABLE `general_voucher` DISABLE KEYS */;
/*!40000 ALTER TABLE `general_voucher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joborder_id` bigint(20) unsigned NOT NULL,
  `officedetails_id` bigint(20) unsigned NOT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` bigint(20) unsigned NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_bank_id_foreign` (`bank_id`),
  KEY `invoices_joborder_id_foreign` (`joborder_id`),
  KEY `invoices_officedetails_id_foreign` (`officedetails_id`),
  KEY `invoices_created_by_foreign` (`created_by`),
  CONSTRAINT `invoices_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  CONSTRAINT `invoices_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `invoices_joborder_id_foreign` FOREIGN KEY (`joborder_id`) REFERENCES `job_orders` (`id`),
  CONSTRAINT `invoices_officedetails_id_foreign` FOREIGN KEY (`officedetails_id`) REFERENCES `office_details` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices_products`
--

DROP TABLE IF EXISTS `invoices_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unitprice` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `vendor_id` bigint(20) unsigned DEFAULT NULL,
  `invoice_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_products_vendor_id_foreign` (`vendor_id`),
  KEY `invoices_products_invoice_id_foreign` (`invoice_id`),
  CONSTRAINT `invoices_products_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  CONSTRAINT `invoices_products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices_products`
--

LOCK TABLES `invoices_products` WRITE;
/*!40000 ALTER TABLE `invoices_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_orders`
--

DROP TABLE IF EXISTS `job_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_orders_client_id_foreign` (`client_id`),
  KEY `job_orders_created_by_foreign` (`created_by`),
  CONSTRAINT `job_orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `job_orders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_orders`
--

LOCK TABLES `job_orders` WRITE;
/*!40000 ALTER TABLE `job_orders` DISABLE KEYS */;
INSERT INTO `job_orders` VALUES (6,2,'Dell laptop D4322','KSOBLAP12',1,'2022-04-16 22:43:11','2022-04-16 22:43:11',NULL),(7,4,'Test Job Order','12312asdasd123',1,'2022-04-21 06:03:51','2022-04-21 06:03:51',NULL),(8,5,'2134','IPPL-0001',1,'2022-04-26 19:55:02','2022-04-26 19:55:02',NULL),(9,6,'1234','IPPL-0002',1,'2022-04-26 21:03:36','2022-04-26 21:03:36',NULL);
/*!40000 ALTER TABLE `job_orders` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_07_23_145341_create_permission_tables',1),(5,'2021_07_23_163325_add_column_to_permissions',1),(6,'2021_07_23_174927_add_column_deleted_at_to_roles',1),(7,'2021_07_24_023615_add_column_deleted_at_to_users',1),(8,'2021_07_26_121755_create_attendances_table',1),(9,'2021_08_14_011347_create_file_uploads_table',1),(10,'2022_02_20_194739_create_clients_table',1),(11,'2022_03_02_011539_create_vendors_table',1),(12,'2022_03_06_173244_create_taxs_table',2),(13,'2022_03_06_173844_create_office_details_table',2),(14,'2022_03_06_174914_create_quotation_table',3),(15,'2022_03_06_193549_create_quotation_products_table',4),(16,'2022_03_07_003332_create_job_orders_table',5),(17,'2022_03_07_035431_create_banks_table',6),(23,'2022_03_07_040546_create_invoices_table',7),(24,'2022_03_07_041206_create_invoices_products_table',7),(25,'2022_03_13_193744_create_transections_table',8),(26,'2022_03_13_230707_create_purchase_orders_table',9),(27,'2022_03_14_025608_create_purchaseorderproducts_table',10),(31,'2016_05_19_000000_create_accounting_journal_transactions_table',11),(32,'2016_05_19_000000_create_accounting_journals_table',11),(33,'2016_05_19_000000_create_accounts_table',12),(34,'2016_05_19_000000_create_company_journals_table',12),(35,'2016_05_19_000000_create_products_table',12),(36,'2017_05_21_000000_create_accounting_ledgers_table',12),(37,'2022_04_06_023618_create_recipt_voucher_table',13),(38,'2022_04_06_035417_create_payment_vouchers_table',14),(39,'2022_04_06_110017_create_general_voucher_table',15),(40,'2022_04_11_155955_create_account_heads_table',16),(41,'2022_04_28_075401_alter_table_types_for_tax',17),(43,'2022_04_28_090601_create_voucher_taxes_table',18);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `office_details`
--

DROP TABLE IF EXISTS `office_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `office_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ntn_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strn_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `office_details_created_by_foreign` (`created_by`),
  CONSTRAINT `office_details_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `office_details`
--

LOCK TABLES `office_details` WRITE;
/*!40000 ALTER TABLE `office_details` DISABLE KEYS */;
INSERT INTO `office_details` VALUES (1,'Innolytix','adsasd asdasd asdasd ajhkajh Karachi','234234243','2342342','234423423',1,'2022-03-08 22:02:03','2022-03-08 22:02:03',NULL),(2,'asdsad','sdsds','1234123','2134234','234234',1,'2022-03-09 21:51:05','2022-03-09 21:51:05',NULL);
/*!40000 ALTER TABLE `office_details` ENABLE KEYS */;
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
-- Table structure for table `payment_vouchers`
--

DROP TABLE IF EXISTS `payment_vouchers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_vouchers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank_account` int(11) NOT NULL,
  `dabit_account` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `joborder_id` bigint(20) NOT NULL,
  `vendor_id` bigint(20) DEFAULT NULL,
  `tax_id` bigint(20) DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_vouchers`
--

LOCK TABLES `payment_vouchers` WRITE;
/*!40000 ALTER TABLE `payment_vouchers` DISABLE KEYS */;
INSERT INTO `payment_vouchers` VALUES (1,2,5,'payment against PO#99YU5566',25,1,0,0,0,NULL,NULL,NULL,'2022-04-06 05:53:58','2022-04-06 05:53:58',NULL),(2,9,15,'test desc',1000,1,7,2,2,NULL,NULL,NULL,'2022-04-25 07:01:21','2022-04-25 07:01:21',NULL),(3,8,14,'test desc',500,1,6,1,1,NULL,NULL,NULL,'2022-04-26 08:54:18','2022-04-26 08:54:18',NULL),(4,8,34,'qwe',1234,1,6,1,1,NULL,NULL,NULL,'2022-04-26 09:15:51','2022-04-26 09:15:51',NULL),(5,8,35,'234',123,1,6,1,1,NULL,NULL,NULL,'2022-04-26 09:17:41','2022-04-26 09:17:41',NULL),(6,8,36,'123',200,1,6,1,1,NULL,NULL,NULL,'2022-04-26 09:19:14','2022-04-26 09:19:14',NULL),(7,8,14,'xdf',12,1,6,1,5,NULL,NULL,NULL,'2022-04-26 21:25:53','2022-04-26 21:25:53',NULL),(8,8,14,NULL,123,1,6,NULL,1,NULL,NULL,NULL,'2022-04-28 10:37:32','2022-04-28 10:37:32',NULL),(9,9,17,'test desc',5000,1,6,NULL,NULL,NULL,NULL,NULL,'2022-04-28 11:21:50','2022-04-28 11:21:50',NULL);
/*!40000 ALTER TABLE `payment_vouchers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'permissions.index','web','2022-03-06 11:15:54','2022-03-06 11:15:54','permissions.index',NULL,'permissions',NULL),(2,'permissions.create','web','2022-03-06 11:15:54','2022-03-06 11:15:54','permissions.create',NULL,'permissions',NULL),(3,'permissions.store','web','2022-03-06 11:15:54','2022-03-06 11:15:54','permissions.store',NULL,'permissions',NULL),(4,'permissions.show','web','2022-03-06 11:15:54','2022-03-06 11:15:54','permissions.show',NULL,'permissions',NULL),(5,'permissions.edit','web','2022-03-06 11:15:54','2022-03-06 11:15:54','permissions.edit',NULL,'permissions',NULL),(6,'permissions.update','web','2022-03-06 11:15:55','2022-03-06 11:15:55','permissions.update',NULL,'permissions',NULL),(7,'permissions.destroy','web','2022-03-06 11:15:55','2022-03-06 11:15:55','permissions.destroy',NULL,'permissions',NULL),(8,'permissions.load-router','web','2022-03-06 11:15:55','2022-03-06 11:15:55','permissions.load-router',NULL,'permissions',NULL),(9,'roles.index','web','2022-03-06 11:15:55','2022-03-06 11:15:55','roles.index',NULL,'roles',NULL),(10,'roles.create','web','2022-03-06 11:15:55','2022-03-06 11:15:55','roles.create',NULL,'roles',NULL),(11,'roles.store','web','2022-03-06 11:15:55','2022-03-06 11:15:55','roles.store',NULL,'roles',NULL),(12,'roles.show','web','2022-03-06 11:15:55','2022-03-06 11:15:55','roles.show',NULL,'roles',NULL),(13,'roles.edit','web','2022-03-06 11:15:55','2022-03-06 11:15:55','roles.edit',NULL,'roles',NULL),(14,'roles.update','web','2022-03-06 11:15:55','2022-03-06 11:15:55','roles.update',NULL,'roles',NULL),(15,'roles.destroy','web','2022-03-06 11:15:55','2022-03-06 11:15:55','roles.destroy',NULL,'roles',NULL),(16,'users.index','web','2022-03-06 11:15:55','2022-03-06 11:15:55','users.index',NULL,'users',NULL),(17,'users.create','web','2022-03-06 11:15:55','2022-03-06 11:15:55','users.create',NULL,'users',NULL),(18,'users.store','web','2022-03-06 11:15:55','2022-03-06 11:15:55','users.store',NULL,'users',NULL),(19,'users.show','web','2022-03-06 11:15:55','2022-03-06 11:15:55','users.show',NULL,'users',NULL),(20,'users.edit','web','2022-03-06 11:15:55','2022-03-06 11:15:55','users.edit',NULL,'users',NULL),(21,'users.update','web','2022-03-06 11:15:55','2022-03-06 11:15:55','users.update',NULL,'users',NULL),(22,'users.destroy','web','2022-03-06 11:15:55','2022-03-06 11:15:55','users.destroy',NULL,'users',NULL),(23,'attendances.index','web','2022-03-06 11:15:55','2022-03-06 11:15:55','attendances.index',NULL,'attendances',NULL),(24,'attendances.create','web','2022-03-06 11:15:56','2022-03-06 11:15:56','attendances.create',NULL,'attendances',NULL),(25,'attendances.store','web','2022-03-06 11:15:56','2022-03-06 11:15:56','attendances.store',NULL,'attendances',NULL),(26,'attendances.show','web','2022-03-06 11:15:56','2022-03-06 11:15:56','attendances.show',NULL,'attendances',NULL),(27,'attendances.edit','web','2022-03-06 11:15:56','2022-03-06 11:15:56','attendances.edit',NULL,'attendances',NULL),(28,'attendances.update','web','2022-03-06 11:15:56','2022-03-06 11:15:56','attendances.update',NULL,'attendances',NULL),(29,'attendances.destroy','web','2022-03-06 11:15:56','2022-03-06 11:15:56','attendances.destroy',NULL,'attendances',NULL),(30,'generator_builder.index','web','2022-03-06 11:15:56','2022-03-06 11:15:56','generator_builder.index',NULL,'generator_builder',NULL),(31,'generator_builder.field_template','web','2022-03-06 11:15:56','2022-03-06 11:15:56','generator_builder.field_template',NULL,'generator_builder',NULL),(32,'generator_builder.relation_field_template','web','2022-03-06 11:15:56','2022-03-06 11:15:56','generator_builder.relation_field_template',NULL,'generator_builder',NULL),(33,'generator_builder.generate','web','2022-03-06 11:15:56','2022-03-06 11:15:56','generator_builder.generate',NULL,'generator_builder',NULL),(34,'generator_builder.rollback','web','2022-03-06 11:15:56','2022-03-06 11:15:56','generator_builder.rollback',NULL,'generator_builder',NULL),(35,'generator_builder.from_file','web','2022-03-06 11:15:56','2022-03-06 11:15:56','generator_builder.from_file',NULL,'generator_builder',NULL),(36,'fileUploads.index','web','2022-03-06 11:15:56','2022-03-06 11:15:56','fileUploads.index',NULL,'fileUploads',NULL),(37,'fileUploads.create','web','2022-03-06 11:15:56','2022-03-06 11:15:56','fileUploads.create',NULL,'fileUploads',NULL),(38,'fileUploads.store','web','2022-03-06 11:15:56','2022-03-06 11:15:56','fileUploads.store',NULL,'fileUploads',NULL),(39,'fileUploads.show','web','2022-03-06 11:15:56','2022-03-06 11:15:56','fileUploads.show',NULL,'fileUploads',NULL),(40,'fileUploads.edit','web','2022-03-06 11:15:56','2022-03-06 11:15:56','fileUploads.edit',NULL,'fileUploads',NULL),(41,'fileUploads.update','web','2022-03-06 11:15:56','2022-03-06 11:15:56','fileUploads.update',NULL,'fileUploads',NULL),(42,'fileUploads.destroy','web','2022-03-06 11:15:57','2022-03-06 11:15:57','fileUploads.destroy',NULL,'fileUploads',NULL),(43,'clients.index','web','2022-03-06 11:15:57','2022-03-06 11:15:57','clients.index',NULL,'clients',NULL),(44,'clients.create','web','2022-03-06 11:15:57','2022-03-06 11:15:57','clients.create',NULL,'clients',NULL),(45,'clients.store','web','2022-03-06 11:15:57','2022-03-06 11:15:57','clients.store',NULL,'clients',NULL),(46,'clients.show','web','2022-03-06 11:15:57','2022-03-06 11:15:57','clients.show',NULL,'clients',NULL),(47,'clients.edit','web','2022-03-06 11:15:57','2022-03-06 11:15:57','clients.edit',NULL,'clients',NULL),(48,'clients.update','web','2022-03-06 11:15:57','2022-03-06 11:15:57','clients.update',NULL,'clients',NULL),(49,'clients.destroy','web','2022-03-06 11:15:57','2022-03-06 11:15:57','clients.destroy',NULL,'clients',NULL),(50,'vendors.index','web','2022-03-06 11:15:57','2022-03-06 11:15:57','vendors.index',NULL,'vendors',NULL),(51,'vendors.create','web','2022-03-06 11:15:57','2022-03-06 11:15:57','vendors.create',NULL,'vendors',NULL),(52,'vendors.store','web','2022-03-06 11:15:57','2022-03-06 11:15:57','vendors.store',NULL,'vendors',NULL),(53,'vendors.show','web','2022-03-06 11:15:57','2022-03-06 11:15:57','vendors.show',NULL,'vendors',NULL),(54,'vendors.edit','web','2022-03-06 11:15:57','2022-03-06 11:15:57','vendors.edit',NULL,'vendors',NULL),(55,'vendors.update','web','2022-03-06 11:15:58','2022-03-06 11:15:58','vendors.update',NULL,'vendors',NULL),(56,'vendors.destroy','web','2022-03-06 11:15:58','2022-03-06 11:15:58','vendors.destroy',NULL,'vendors',NULL),(57,'taxes.index','web','2022-03-06 15:06:53','2022-03-06 15:06:53','taxes.index',NULL,'taxes',NULL),(58,'taxes.create','web','2022-03-06 15:06:53','2022-03-06 15:06:53','taxes.create',NULL,'taxes',NULL),(59,'taxes.store','web','2022-03-06 15:06:53','2022-03-06 15:06:53','taxes.store',NULL,'taxes',NULL),(60,'taxes.show','web','2022-03-06 15:06:53','2022-03-06 15:06:53','taxes.show',NULL,'taxes',NULL),(61,'taxes.edit','web','2022-03-06 15:06:53','2022-03-06 15:06:53','taxes.edit',NULL,'taxes',NULL),(62,'taxes.update','web','2022-03-06 15:06:53','2022-03-06 15:06:53','taxes.update',NULL,'taxes',NULL),(63,'taxes.destroy','web','2022-03-06 15:06:53','2022-03-06 15:06:53','taxes.destroy',NULL,'taxes',NULL),(64,'officeDetails.index','web','2022-03-06 15:06:53','2022-03-06 15:06:53','officeDetails.index',NULL,'officeDetails',NULL),(65,'officeDetails.create','web','2022-03-06 15:06:53','2022-03-06 15:06:53','officeDetails.create',NULL,'officeDetails',NULL),(66,'officeDetails.store','web','2022-03-06 15:06:54','2022-03-06 15:06:54','officeDetails.store',NULL,'officeDetails',NULL),(67,'officeDetails.show','web','2022-03-06 15:06:54','2022-03-06 15:06:54','officeDetails.show',NULL,'officeDetails',NULL),(68,'officeDetails.edit','web','2022-03-06 15:06:54','2022-03-06 15:06:54','officeDetails.edit',NULL,'officeDetails',NULL),(69,'officeDetails.update','web','2022-03-06 15:06:54','2022-03-06 15:06:54','officeDetails.update',NULL,'officeDetails',NULL),(70,'officeDetails.destroy','web','2022-03-06 15:06:54','2022-03-06 15:06:54','officeDetails.destroy',NULL,'officeDetails',NULL),(71,'quotations.index','web','2022-03-06 15:06:54','2022-03-06 15:06:54','quotations.index',NULL,'quotations',NULL),(72,'quotations.create','web','2022-03-06 15:06:54','2022-03-06 15:06:54','quotations.create',NULL,'quotations',NULL),(73,'quotations.store','web','2022-03-06 15:06:54','2022-03-06 15:06:54','quotations.store',NULL,'quotations',NULL),(74,'quotations.show','web','2022-03-06 15:06:54','2022-03-06 15:06:54','quotations.show',NULL,'quotations',NULL),(75,'quotations.edit','web','2022-03-06 15:06:54','2022-03-06 15:06:54','quotations.edit',NULL,'quotations',NULL),(76,'quotations.update','web','2022-03-06 15:06:54','2022-03-06 15:06:54','quotations.update',NULL,'quotations',NULL),(77,'quotations.destroy','web','2022-03-06 15:06:54','2022-03-06 15:06:54','quotations.destroy',NULL,'quotations',NULL),(78,'quotationProducts.index','web','2022-03-06 15:06:54','2022-03-06 15:06:54','quotationProducts.index',NULL,'quotationProducts',NULL),(79,'quotationProducts.create','web','2022-03-06 15:06:54','2022-03-06 15:06:54','quotationProducts.create',NULL,'quotationProducts',NULL),(80,'quotationProducts.store','web','2022-03-06 15:06:54','2022-03-06 15:06:54','quotationProducts.store',NULL,'quotationProducts',NULL),(81,'quotationProducts.show','web','2022-03-06 15:06:55','2022-03-06 15:06:55','quotationProducts.show',NULL,'quotationProducts',NULL),(82,'quotationProducts.edit','web','2022-03-06 15:06:55','2022-03-06 15:06:55','quotationProducts.edit',NULL,'quotationProducts',NULL),(83,'quotationProducts.update','web','2022-03-06 15:06:55','2022-03-06 15:06:55','quotationProducts.update',NULL,'quotationProducts',NULL),(84,'quotationProducts.destroy','web','2022-03-06 15:06:55','2022-03-06 15:06:55','quotationProducts.destroy',NULL,'quotationProducts',NULL),(85,'jobOrders.index','web','2022-03-06 23:30:17','2022-03-06 23:30:17','jobOrders.index',NULL,'jobOrders',NULL),(86,'jobOrders.create','web','2022-03-06 23:30:17','2022-03-06 23:30:17','jobOrders.create',NULL,'jobOrders',NULL),(87,'jobOrders.store','web','2022-03-06 23:30:17','2022-03-06 23:30:17','jobOrders.store',NULL,'jobOrders',NULL),(88,'jobOrders.show','web','2022-03-06 23:30:17','2022-03-06 23:30:17','jobOrders.show',NULL,'jobOrders',NULL),(89,'jobOrders.edit','web','2022-03-06 23:30:17','2022-03-06 23:30:17','jobOrders.edit',NULL,'jobOrders',NULL),(90,'jobOrders.update','web','2022-03-06 23:30:17','2022-03-06 23:30:17','jobOrders.update',NULL,'jobOrders',NULL),(91,'jobOrders.destroy','web','2022-03-06 23:30:17','2022-03-06 23:30:17','jobOrders.destroy',NULL,'jobOrders',NULL),(92,'banks.index','web','2022-03-06 23:30:17','2022-03-06 23:30:17','banks.index',NULL,'banks',NULL),(93,'banks.create','web','2022-03-06 23:30:17','2022-03-06 23:30:17','banks.create',NULL,'banks',NULL),(94,'banks.store','web','2022-03-06 23:30:17','2022-03-06 23:30:17','banks.store',NULL,'banks',NULL),(95,'banks.show','web','2022-03-06 23:30:17','2022-03-06 23:30:17','banks.show',NULL,'banks',NULL),(96,'banks.edit','web','2022-03-06 23:30:17','2022-03-06 23:30:17','banks.edit',NULL,'banks',NULL),(97,'banks.update','web','2022-03-06 23:30:17','2022-03-06 23:30:17','banks.update',NULL,'banks',NULL),(98,'banks.destroy','web','2022-03-06 23:30:17','2022-03-06 23:30:17','banks.destroy',NULL,'banks',NULL),(99,'invoices.index','web','2022-03-06 23:30:17','2022-03-06 23:30:17','invoices.index',NULL,'invoices',NULL),(100,'invoices.create','web','2022-03-06 23:30:17','2022-03-06 23:30:17','invoices.create',NULL,'invoices',NULL),(101,'invoices.store','web','2022-03-06 23:30:17','2022-03-06 23:30:17','invoices.store',NULL,'invoices',NULL),(102,'invoices.show','web','2022-03-06 23:30:18','2022-03-06 23:30:18','invoices.show',NULL,'invoices',NULL),(103,'invoices.edit','web','2022-03-06 23:30:18','2022-03-06 23:30:18','invoices.edit',NULL,'invoices',NULL),(104,'invoices.update','web','2022-03-06 23:30:18','2022-03-06 23:30:18','invoices.update',NULL,'invoices',NULL),(105,'invoices.destroy','web','2022-03-06 23:30:18','2022-03-06 23:30:18','invoices.destroy',NULL,'invoices',NULL),(106,'invoicesProducts.index','web','2022-03-06 23:30:18','2022-03-06 23:30:18','invoicesProducts.index',NULL,'invoicesProducts',NULL),(107,'invoicesProducts.create','web','2022-03-06 23:30:18','2022-03-06 23:30:18','invoicesProducts.create',NULL,'invoicesProducts',NULL),(108,'invoicesProducts.store','web','2022-03-06 23:30:18','2022-03-06 23:30:18','invoicesProducts.store',NULL,'invoicesProducts',NULL),(109,'invoicesProducts.show','web','2022-03-06 23:30:18','2022-03-06 23:30:18','invoicesProducts.show',NULL,'invoicesProducts',NULL),(110,'invoicesProducts.edit','web','2022-03-06 23:30:18','2022-03-06 23:30:18','invoicesProducts.edit',NULL,'invoicesProducts',NULL),(111,'invoicesProducts.update','web','2022-03-06 23:30:18','2022-03-06 23:30:18','invoicesProducts.update',NULL,'invoicesProducts',NULL),(112,'invoicesProducts.destroy','web','2022-03-06 23:30:18','2022-03-06 23:30:18','invoicesProducts.destroy',NULL,'invoicesProducts',NULL),(113,'transections.index','web','2022-03-13 15:49:56','2022-03-13 15:49:56','transections.index',NULL,'transections',NULL),(114,'transections.create','web','2022-03-13 15:49:56','2022-03-13 15:49:56','transections.create',NULL,'transections',NULL),(115,'transections.store','web','2022-03-13 15:49:56','2022-03-13 15:49:56','transections.store',NULL,'transections',NULL),(116,'transections.show','web','2022-03-13 15:49:56','2022-03-13 15:49:56','transections.show',NULL,'transections',NULL),(117,'transections.edit','web','2022-03-13 15:49:56','2022-03-13 15:49:56','transections.edit',NULL,'transections',NULL),(118,'transections.update','web','2022-03-13 15:49:56','2022-03-13 15:49:56','transections.update',NULL,'transections',NULL),(119,'transections.destroy','web','2022-03-13 15:49:56','2022-03-13 15:49:56','transections.destroy',NULL,'transections',NULL),(120,'purchaseOrders.index','web','2022-03-13 20:04:47','2022-03-13 20:04:47','purchaseOrders.index',NULL,'purchaseOrders',NULL),(121,'purchaseOrders.create','web','2022-03-13 20:04:47','2022-03-13 20:04:47','purchaseOrders.create',NULL,'purchaseOrders',NULL),(122,'purchaseOrders.store','web','2022-03-13 20:04:47','2022-03-13 20:04:47','purchaseOrders.store',NULL,'purchaseOrders',NULL),(123,'purchaseOrders.show','web','2022-03-13 20:04:47','2022-03-13 20:04:47','purchaseOrders.show',NULL,'purchaseOrders',NULL),(124,'purchaseOrders.edit','web','2022-03-13 20:04:47','2022-03-13 20:04:47','purchaseOrders.edit',NULL,'purchaseOrders',NULL),(125,'purchaseOrders.update','web','2022-03-13 20:04:47','2022-03-13 20:04:47','purchaseOrders.update',NULL,'purchaseOrders',NULL),(126,'purchaseOrders.destroy','web','2022-03-13 20:04:48','2022-03-13 20:04:48','purchaseOrders.destroy',NULL,'purchaseOrders',NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_orders`
--

DROP TABLE IF EXISTS `purchase_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `joborder_id` bigint(20) unsigned NOT NULL,
  `vendor_id` bigint(20) unsigned NOT NULL,
  `officedetail_id` bigint(20) unsigned NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `payment_terms` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` float NOT NULL DEFAULT 0,
  `sub_total` bigint(20) DEFAULT NULL,
  `grand_total` bigint(20) DEFAULT NULL,
  `bank_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_orders_joborder_id_foreign` (`joborder_id`),
  KEY `purchase_orders_vendor_id_foreign` (`vendor_id`),
  KEY `purchase_orders_officedetail_id_foreign` (`officedetail_id`),
  KEY `purchase_orders_bank_id_foreign` (`bank_id`),
  CONSTRAINT `purchase_orders_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  CONSTRAINT `purchase_orders_joborder_id_foreign` FOREIGN KEY (`joborder_id`) REFERENCES `job_orders` (`id`),
  CONSTRAINT `purchase_orders_officedetail_id_foreign` FOREIGN KEY (`officedetail_id`) REFERENCES `office_details` (`id`),
  CONSTRAINT `purchase_orders_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_orders`
--

LOCK TABLES `purchase_orders` WRITE;
/*!40000 ALTER TABLE `purchase_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchaseorderproducts`
--

DROP TABLE IF EXISTS `purchaseorderproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchaseorderproducts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unitprice` bigint(20) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `purchaseorder_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchaseorderproducts_purchaseorder_id_foreign` (`purchaseorder_id`),
  CONSTRAINT `purchaseorderproducts_purchaseorder_id_foreign` FOREIGN KEY (`purchaseorder_id`) REFERENCES `purchase_orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchaseorderproducts`
--

LOCK TABLES `purchaseorderproducts` WRITE;
/*!40000 ALTER TABLE `purchaseorderproducts` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchaseorderproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation`
--

DROP TABLE IF EXISTS `quotation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotation` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `subject` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `grand_total` int(11) NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `officedetails_id` bigint(20) unsigned DEFAULT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quotation_client_id_foreign` (`client_id`),
  KEY `quotation_officedetails_id_foreign` (`officedetails_id`),
  KEY `quotation_created_by_foreign` (`created_by`),
  CONSTRAINT `quotation_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `quotation_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `quotation_officedetails_id_foreign` FOREIGN KEY (`officedetails_id`) REFERENCES `office_details` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation`
--

LOCK TABLES `quotation` WRITE;
/*!40000 ALTER TABLE `quotation` DISABLE KEYS */;
/*!40000 ALTER TABLE `quotation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation_products`
--

DROP TABLE IF EXISTS `quotation_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotation_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unitprice` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `vendor_id` bigint(20) unsigned DEFAULT NULL,
  `quotation_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quotation_products_vendor_id_foreign` (`vendor_id`),
  KEY `quotation_products_quotation_id_foreign` (`quotation_id`),
  CONSTRAINT `quotation_products_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotation` (`id`),
  CONSTRAINT `quotation_products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation_products`
--

LOCK TABLES `quotation_products` WRITE;
/*!40000 ALTER TABLE `quotation_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `quotation_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipt_voucher`
--

DROP TABLE IF EXISTS `recipt_voucher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipt_voucher` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank_account` int(11) NOT NULL,
  `credit_account` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `joborder_id` bigint(20) NOT NULL,
  `tax_id` bigint(20) DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipt_voucher`
--

LOCK TABLES `recipt_voucher` WRITE;
/*!40000 ALTER TABLE `recipt_voucher` DISABLE KEYS */;
/*!40000 ALTER TABLE `recipt_voucher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,2),(2,2),(3,2),(4,2),(5,2),(6,2),(7,2),(8,2),(9,2),(10,2),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2),(17,2),(18,2),(19,2),(20,2),(21,2),(22,2),(23,2),(24,2),(25,2),(26,2),(27,2),(28,2),(29,2),(36,2),(37,2),(38,2),(39,2),(40,2),(41,2),(42,2),(43,2),(44,2),(45,2),(46,2),(47,2),(48,2),(49,2),(50,2),(51,2),(52,2),(53,2),(54,2),(55,2),(56,2),(57,2),(58,2),(59,2),(60,2),(61,2),(62,2),(63,2),(64,2),(65,2),(66,2),(67,2),(68,2),(69,2),(70,2),(71,2),(72,2),(73,2),(74,2),(75,2),(76,2),(77,2),(78,2),(79,2),(80,2),(81,2),(82,2),(83,2),(84,2),(85,2),(86,2),(87,2),(88,2),(89,2),(90,2),(91,2),(92,2),(93,2),(94,2),(95,2),(96,2),(97,2),(98,2),(99,2),(100,2),(101,2),(102,2),(103,2),(104,2),(105,2),(106,2),(107,2),(108,2),(109,2),(110,2),(111,2),(112,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'supper-admin','api','2022-03-06 11:15:58','2022-03-06 11:15:58','Supper Admin',NULL,NULL),(2,'admin','web','2022-03-06 23:32:24','2022-03-06 23:32:24','admin','admin',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxs`
--

DROP TABLE IF EXISTS `taxs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taxs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int(11) NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `taxs_created_by_foreign` (`created_by`),
  CONSTRAINT `taxs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxs`
--

LOCK TABLES `taxs` WRITE;
/*!40000 ALTER TABLE `taxs` DISABLE KEYS */;
INSERT INTO `taxs` VALUES (1,'GST',17,1,'2022-03-08 22:07:34','2022-03-08 22:07:34',NULL),(2,'FST',5,1,'2022-03-09 08:04:28','2022-03-14 18:09:56',NULL),(3,'asd',12,1,'2022-03-09 21:50:48','2022-03-09 21:50:48',NULL),(4,'abc tax',3,1,'2022-03-25 08:38:47','2022-03-25 08:38:47',NULL),(5,'W.H.T',3,1,'2022-04-26 21:25:36','2022-04-26 21:25:36',NULL);
/*!40000 ALTER TABLE `taxs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transections`
--

DROP TABLE IF EXISTS `transections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `joborder_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `bank_id` bigint(20) unsigned DEFAULT NULL,
  `cheque_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transections_joborder_id_foreign` (`joborder_id`),
  KEY `transections_bank_id_foreign` (`bank_id`),
  KEY `transections_created_by_foreign` (`created_by`),
  CONSTRAINT `transections_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  CONSTRAINT `transections_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `transections_joborder_id_foreign` FOREIGN KEY (`joborder_id`) REFERENCES `job_orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transections`
--

LOCK TABLES `transections` WRITE;
/*!40000 ALTER TABLE `transections` DISABLE KEYS */;
/*!40000 ALTER TABLE `transections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Arslan','innolytix@xyz.xyz',NULL,'$2a$10$rdwOqh1zJsKTwKSvim9Pt.BGgka3Xpcp6mQK8UvVRjXPD56agiUci',NULL,'2022-03-06 11:15:58','2022-03-06 11:15:58',NULL),(2,'Ahmed','ahmed@gmail.com',NULL,'$2y$10$pjUt8zBk/naMNYs1z8oMEetN3JO92uhsOWWqt4/DMjPujdjznZKuu',NULL,'2022-03-06 19:10:38','2022-03-06 19:10:38',NULL),(3,'hammad','hammad@test.com',NULL,'$2y$10$5Y.QefCc5pVi18iNjYfhZuPYiBFR6z/sWM84i7wDsJ.oNf5vQbNFu',NULL,'2022-03-07 12:19:22','2022-03-07 12:19:22',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendors` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ntn_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strn_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deals_in` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendors_user_id_foreign` (`user_id`),
  CONSTRAINT `vendors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` VALUES (1,'EZY Technologies','0131232132','45464646','46546456','Karachi Share-','Electronics',1,'2022-04-14 00:02:25','2022-04-14 00:02:25',NULL),(2,'Hammad Khan Lodhi','213456879','987456','987456','DEF Road Lyari','Softwares',1,'2022-04-21 05:55:30','2022-04-21 05:55:30',NULL),(3,'Hammad Khan Lodhi','213456879','987456','987456','DEF Road Lyari','Softwares',1,'2022-04-21 05:56:47','2022-04-21 05:56:59','2022-04-21 05:56:59'),(4,'Aqib Bhai','123456','654789','12356','akjdnslkj','abc',1,'2022-04-21 06:02:01','2022-04-21 06:02:01',NULL);
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voucher_taxes`
--

DROP TABLE IF EXISTS `voucher_taxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voucher_taxes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tax_id` bigint(20) NOT NULL,
  `voucher_id` bigint(20) NOT NULL,
  `voucher_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voucher_taxes`
--

LOCK TABLES `voucher_taxes` WRITE;
/*!40000 ALTER TABLE `voucher_taxes` DISABLE KEYS */;
INSERT INTO `voucher_taxes` VALUES (3,1,8,'App\\Models\\Reciptvoucher','2022-04-29 07:57:37','2022-04-29 07:57:37'),(4,2,8,'App\\Models\\Reciptvoucher','2022-04-29 07:57:37','2022-04-29 07:57:37');
/*!40000 ALTER TABLE `voucher_taxes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-02  2:29:33
