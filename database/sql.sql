-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: shoes_shop
-- ------------------------------------------------------
-- Server version	8.0.20

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
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_name_unique` (`name`),
  UNIQUE KEY `brands_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'PROF. SYLVIA SIPES','default.jpg','test-miss-damaris-collier-phd',NULL,'2020-02-15 02:40:04','2020-02-15 02:40:04'),(2,'MR. JIMMIE TOY','default.jpg','test-pedro-nolan',NULL,'2020-02-15 02:40:04','2020-02-15 02:40:04'),(3,'VANESSA BOSCO','default.jpg','test-miss-brielle-west',NULL,'2020-02-15 02:40:04','2020-02-15 02:40:04'),(4,'MISS SANDRA MARQUARDT SR.','default.jpg','test-prof-marcus-stark-i',NULL,'2020-02-15 02:40:04','2020-02-15 02:40:04'),(5,'JAQUELINE BRUEN','default.jpg','test-allison-bayer',NULL,'2020-02-15 02:40:04','2020-02-15 02:40:04'),(6,'PAT GLEICHNER','default.jpg','test-prof-zella-cole-phd',NULL,'2020-02-15 02:40:05','2020-02-15 02:40:05'),(7,'MR. WILBER JACOBI II','default.jpg','test-mr-rodolfo-kerluke-phd',NULL,'2020-02-15 02:40:05','2020-02-15 02:40:05'),(8,'ANSEL SMITH II','default.jpg','test-margaret-bahringer',NULL,'2020-02-15 02:40:05','2020-02-15 02:40:05'),(9,'LUTHER CUMMINGS','default.jpg','test-ramona-zemlak',NULL,'2020-02-15 02:40:05','2020-02-15 02:40:05'),(10,'LIZZIE TURNER','default.jpg','test-ms-elmira-zboncak',NULL,'2020-02-15 02:40:05','2020-02-15 02:40:05'),(11,'EMILE GRANT DDS','default.jpg','test-fausto-heller',NULL,'2020-02-15 02:40:05','2020-02-15 02:40:05'),(12,'MAYMIE DICKI II','default.jpg','test-erica-vandervort',NULL,'2020-02-15 02:40:05','2020-02-15 02:40:05'),(13,'MRS. NEDRA MILLS IV','default.jpg','test-keegan-hahn',NULL,'2020-02-15 02:40:06','2020-02-15 02:40:06'),(14,'BILLIE RAU','default.jpg','test-miss-queen-mcdermott',NULL,'2020-02-15 02:40:06','2020-02-15 02:40:06'),(15,'MR. PATRICK ABSHIRE MD','default.jpg','test-caitlyn-powlowski',NULL,'2020-02-15 02:40:06','2020-02-15 02:40:06'),(16,'BERNIE SHANAHAN DDS','default.jpg','test-verona-monahan',NULL,'2020-02-15 02:40:06','2020-02-15 02:40:06'),(17,'NYAH GLOVER','default.jpg','test-chyna-herzog',NULL,'2020-02-15 02:40:06','2020-02-15 02:40:06'),(18,'ADIAS','default.jpg','adias',NULL,'2020-02-15 02:40:06','2020-02-18 07:55:49'),(19,'NIKE','default.jpg','nike',NULL,'2020-02-15 02:40:07','2020-02-18 07:55:12'),(20,'BALENCIAGA','default.jpg','balenciaga',NULL,'2020-02-15 02:40:07','2020-02-18 07:54:56');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Giày Balenciage nữ','giay-balenciage-nu',4,NULL,'2020-02-15 02:40:03','2020-02-18 06:19:39'),(2,'Gày balen Nam','gay-balen-nam',5,NULL,'2020-02-15 02:40:03','2020-02-18 06:19:23'),(3,'Giày da nam','giay-da-nam',5,NULL,'2020-02-15 02:40:04','2020-02-15 02:45:25'),(4,'Giày nữ','giay-nu',NULL,NULL,'2020-02-15 02:40:04','2020-02-15 02:44:30'),(5,'Giày nam','giay-nam',NULL,NULL,'2020-02-15 02:40:04','2020-02-15 02:44:10');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_product`
--

DROP TABLE IF EXISTS `category_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_product` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_product_category_id_foreign` (`category_id`),
  KEY `category_product_product_id_foreign` (`product_id`),
  CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_product`
--

LOCK TABLES `category_product` WRITE;
/*!40000 ALTER TABLE `category_product` DISABLE KEYS */;
INSERT INTO `category_product` VALUES (1,1,1,NULL,NULL),(2,2,1,NULL,NULL),(3,1,2,NULL,NULL),(4,2,2,NULL,NULL),(5,1,3,NULL,NULL),(6,2,3,NULL,NULL),(7,1,4,NULL,NULL),(8,2,4,NULL,NULL),(9,1,5,NULL,NULL),(10,2,5,NULL,NULL),(11,1,6,NULL,NULL),(12,2,6,NULL,NULL),(13,1,7,NULL,NULL),(14,2,7,NULL,NULL),(15,1,8,NULL,NULL),(16,2,8,NULL,NULL),(17,1,9,NULL,NULL),(18,2,9,NULL,NULL),(19,1,10,NULL,NULL),(20,2,10,NULL,NULL),(21,1,11,NULL,NULL),(22,2,11,NULL,NULL),(23,1,12,NULL,NULL),(24,2,12,NULL,NULL),(25,1,13,NULL,NULL),(26,2,13,NULL,NULL),(27,1,14,NULL,NULL),(28,2,14,NULL,NULL),(29,1,15,NULL,NULL),(30,2,15,NULL,NULL),(31,1,16,NULL,NULL),(32,2,16,NULL,NULL),(33,1,17,NULL,NULL),(34,2,17,NULL,NULL),(35,1,18,NULL,NULL),(36,2,18,NULL,NULL),(37,1,19,NULL,NULL),(38,2,19,NULL,NULL),(39,1,20,NULL,NULL),(40,2,20,NULL,NULL),(41,1,21,NULL,NULL),(42,2,21,NULL,NULL),(43,1,22,NULL,NULL),(44,2,22,NULL,NULL),(45,1,23,NULL,NULL),(46,2,23,NULL,NULL),(47,1,24,NULL,NULL),(48,2,24,NULL,NULL),(49,1,25,NULL,NULL),(50,2,25,NULL,NULL),(51,1,26,NULL,NULL),(52,2,26,NULL,NULL),(53,1,27,NULL,NULL),(54,2,27,NULL,NULL),(55,1,28,NULL,NULL),(56,2,28,NULL,NULL),(57,1,29,NULL,NULL),(58,2,29,NULL,NULL),(59,1,30,NULL,NULL),(60,2,30,NULL,NULL),(61,1,31,NULL,NULL),(62,2,31,NULL,NULL),(63,1,32,NULL,NULL),(64,2,32,NULL,NULL),(65,1,33,NULL,NULL),(66,2,33,NULL,NULL),(67,1,34,NULL,NULL),(68,2,34,NULL,NULL),(69,1,35,NULL,NULL),(70,2,35,NULL,NULL),(71,1,36,NULL,NULL),(72,2,36,NULL,NULL),(73,1,37,NULL,NULL),(74,2,37,NULL,NULL),(75,1,38,NULL,NULL),(76,2,38,NULL,NULL),(77,1,39,NULL,NULL),(78,2,39,NULL,NULL),(79,1,40,NULL,NULL),(80,2,40,NULL,NULL),(81,1,41,NULL,NULL),(82,2,41,NULL,NULL),(83,1,42,NULL,NULL),(84,2,42,NULL,NULL),(85,1,43,NULL,NULL),(86,2,43,NULL,NULL),(87,1,44,NULL,NULL),(88,2,44,NULL,NULL),(89,1,45,NULL,NULL),(90,2,45,NULL,NULL),(91,1,46,NULL,NULL),(92,2,46,NULL,NULL),(93,1,47,NULL,NULL),(94,2,47,NULL,NULL),(95,1,48,NULL,NULL),(96,2,48,NULL,NULL),(97,1,49,NULL,NULL),(98,2,49,NULL,NULL),(99,1,50,NULL,NULL),(100,2,50,NULL,NULL),(101,4,49,NULL,NULL),(102,5,49,NULL,NULL),(103,5,40,NULL,NULL);
/*!40000 ALTER TABLE `category_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double(8,2) NOT NULL DEFAULT '0.00',
  `status` int NOT NULL DEFAULT '0',
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupons_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` VALUES (1,'GIAM','cash',100000.00,1,'2020-02-19',0,'2020-02-16 15:28:57','2020-02-16 15:48:28'),(2,'GIAM1','percent',10.00,1,'2020-02-19',10,'2020-02-16 15:36:23','2020-02-16 15:36:23');
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_01_01_031024_create_brands_table',1),(5,'2020_01_02_090555_create_products_table',1),(6,'2020_01_04_090643_create_product_images_table',1),(7,'2020_01_04_090704_create_product_sizes_table',1),(8,'2020_01_06_090719_create_product_size_colors_table',1),(9,'2020_01_07_150226_create_categories_table',1),(10,'2020_01_16_095856_create_coupons_table',1),(11,'2020_01_20_021846_create_slides_table',1),(12,'2020_01_20_083311_create_permission_tables',1),(13,'2020_02_12_153523_create_orders_table',1),(14,'2020_02_26_074606_create_jobs_table',2),(15,'2020_03_04_043221_add_google_id_and_facebook_id_to_users',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
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
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
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
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',1),(3,'App\\Models\\User',1),(4,'App\\Models\\User',1),(5,'App\\Models\\User',1),(6,'App\\Models\\User',1),(7,'App\\Models\\User',1),(8,'App\\Models\\User',1),(9,'App\\Models\\User',12),(9,'App\\Models\\User',13),(9,'App\\Models\\User',14);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (2,'Hạ Huy','admin@admin.com','0337172888','Hà Nội','1','1hrkFe898c','cod','Đã nhận được đơn hàng','30000','200098','2020-02-16 16:03:30','2020-02-16 16:03:30'),(3,'Hạ Huy','haqhuy99@gmail.com','0337172888','Hà Nội','1','k7940F3OS0','cod','Đã nhận được đơn hàng','30000','200098','2020-02-16 16:03:53','2020-02-16 16:03:53'),(4,'Hạ Huy','admin@admin.com','0337172888','Hà Nội','1','SAL1HXVzql','cod','Đã nhận được đơn hàng','30000','200098','2020-02-16 16:04:07','2020-02-16 16:04:07'),(5,'Hạ Huy','admin@admin.com','0337172888','Hà Nội','1','ByfHwlrDLq','cod','Đã nhận được đơn hàng','30000','200098','2020-02-16 16:04:40','2020-02-16 16:04:40'),(6,'Hạ Huy','admin@admin.com','0337172888','Hà Nội','1','3H6h5FI4OX','cod','Đã nhận được đơn hàng','30000','200098','2020-02-16 16:05:43','2020-02-16 16:05:43'),(8,'Hạ Huy','admin@admin.com','0337172888','Hà Nội','1','IegwHVMXYU','cod','Đang vận chuyển','30000','200098','2020-02-16 16:09:28','2020-02-16 16:13:18'),(9,'Hạ Huy','admin@admin.com','0337172888','ha noi','1','XRHWHYexgE','cod','Đã nhận được đơn hàng','30000','200098','2020-02-18 08:09:48','2020-02-18 08:09:48'),(10,'Hạ Huy','admin@admin.com','0337172888','ha noi','1','fvA7Q6Jqtg','cod','Đã nhận được đơn hàng','30000','100049','2020-02-23 07:57:50','2020-02-23 07:57:50');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'view brand','web','2020-02-15 02:40:09','2020-02-15 02:40:09'),(2,'update brand','web','2020-02-15 02:40:10','2020-02-15 02:40:10'),(3,'new brand','web','2020-02-15 02:40:10','2020-02-15 02:40:10'),(4,'delete brand','web','2020-02-15 02:40:10','2020-02-15 02:40:10'),(5,'view category','web','2020-02-15 02:40:10','2020-02-15 02:40:10'),(6,'update category','web','2020-02-15 02:40:10','2020-02-15 02:40:10'),(7,'new category','web','2020-02-15 02:40:10','2020-02-15 02:40:10'),(8,'delete category','web','2020-02-15 02:40:10','2020-02-15 02:40:10'),(9,'view coupon','web','2020-02-15 02:40:11','2020-02-15 02:40:11'),(10,'update coupon','web','2020-02-15 02:40:11','2020-02-15 02:40:11'),(11,'new coupon','web','2020-02-15 02:40:11','2020-02-15 02:40:11'),(12,'delete coupon','web','2020-02-15 02:40:11','2020-02-15 02:40:11'),(13,'view role','web','2020-02-15 02:40:11','2020-02-15 02:40:11'),(14,'update role','web','2020-02-15 02:40:11','2020-02-15 02:40:11'),(15,'new role','web','2020-02-15 02:40:12','2020-02-15 02:40:12'),(16,'delete role','web','2020-02-15 02:40:12','2020-02-15 02:40:12'),(17,'view product','web','2020-02-15 02:40:12','2020-02-15 02:40:12'),(18,'update product','web','2020-02-15 02:40:12','2020-02-15 02:40:12'),(19,'new product','web','2020-02-15 02:40:12','2020-02-15 02:40:12'),(20,'delete product','web','2020-02-15 02:40:12','2020-02-15 02:40:12'),(21,'view slide','web','2020-02-15 02:40:13','2020-02-15 02:40:13'),(22,'update slide','web','2020-02-15 02:40:13','2020-02-15 02:40:13'),(23,'new slide','web','2020-02-15 02:40:13','2020-02-15 02:40:13'),(24,'delete slide','web','2020-02-15 02:40:13','2020-02-15 02:40:13'),(25,'view user','web','2020-02-15 02:40:13','2020-02-15 02:40:13'),(26,'update user','web','2020-02-15 02:40:14','2020-02-15 02:40:14'),(27,'new user','web','2020-02-15 02:40:14','2020-02-15 02:40:14'),(28,'delete user','web','2020-02-15 02:40:14','2020-02-15 02:40:14'),(29,'view order','web','2020-02-15 02:40:14','2020-02-15 02:40:14'),(30,'update order','web','2020-02-15 02:40:14','2020-02-15 02:40:14'),(31,'new order','web','2020-02-15 02:40:15','2020-02-15 02:40:15'),(32,'delete order','web','2020-02-15 02:40:15','2020-02-15 02:40:15'),(33,'not permission','web','2020-02-15 02:40:15','2020-02-15 02:40:15');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,50,'1582006864.jpg','2020-02-18 06:21:04','2020-02-18 06:21:04'),(2,50,'1582006864.','2020-02-18 06:21:04','2020-02-18 06:21:04'),(3,49,'1582443179.jpg','2020-02-23 07:32:59','2020-02-23 07:32:59');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_order`
--

DROP TABLE IF EXISTS `product_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_order` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_order_product_id_foreign` (`product_id`),
  KEY `product_order_order_id_foreign` (`order_id`),
  CONSTRAINT `product_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_order_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_order`
--

LOCK TABLES `product_order` WRITE;
/*!40000 ALTER TABLE `product_order` DISABLE KEYS */;
INSERT INTO `product_order` VALUES (2,2,50,2,'30','Black',NULL,NULL),(3,3,50,2,'30','Black',NULL,NULL),(4,4,50,2,'30','Black',NULL,NULL),(5,5,50,2,'30','Black',NULL,NULL),(6,6,50,2,'30','Black',NULL,NULL),(8,8,50,2,'30','Black',NULL,NULL),(9,9,50,2,'30','Yellow',NULL,NULL),(10,10,50,1,'30','Black',NULL,NULL);
/*!40000 ALTER TABLE `product_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_size_colors`
--

DROP TABLE IF EXISTS `product_size_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_size_colors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_size_id` bigint unsigned NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_size_colors_product_size_id_foreign` (`product_size_id`),
  CONSTRAINT `product_size_colors_product_size_id_foreign` FOREIGN KEY (`product_size_id`) REFERENCES `product_sizes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_size_colors`
--

LOCK TABLES `product_size_colors` WRITE;
/*!40000 ALTER TABLE `product_size_colors` DISABLE KEYS */;
INSERT INTO `product_size_colors` VALUES (1,1,'Black',10,'2020-02-15 02:40:24','2020-02-15 02:40:24'),(2,1,'Red',10,'2020-02-15 02:40:24','2020-02-15 02:40:24'),(3,2,'Black',10,'2020-02-15 02:40:24','2020-02-15 02:40:24'),(4,2,'Red',10,'2020-02-15 02:40:24','2020-02-15 02:40:24'),(5,3,'Black',10,'2020-02-15 02:40:25','2020-02-15 02:40:25'),(6,3,'Red',10,'2020-02-15 02:40:25','2020-02-15 02:40:25'),(7,4,'Black',10,'2020-02-15 02:40:26','2020-02-15 02:40:26'),(8,4,'Red',10,'2020-02-15 02:40:26','2020-02-15 02:40:26'),(9,5,'Black',10,'2020-02-15 02:40:26','2020-02-15 02:40:26'),(10,5,'Red',10,'2020-02-15 02:40:26','2020-02-15 02:40:26'),(11,6,'Black',10,'2020-02-15 02:40:26','2020-02-15 02:40:26'),(12,6,'Red',10,'2020-02-15 02:40:26','2020-02-15 02:40:26'),(13,7,'Black',10,'2020-02-15 02:40:27','2020-02-15 02:40:27'),(14,7,'Red',10,'2020-02-15 02:40:27','2020-02-15 02:40:27'),(15,8,'Black',10,'2020-02-15 02:40:28','2020-02-15 02:40:28'),(16,8,'Red',10,'2020-02-15 02:40:28','2020-02-15 02:40:28'),(17,9,'Black',10,'2020-02-15 02:40:28','2020-02-15 02:40:28'),(18,9,'Red',10,'2020-02-15 02:40:28','2020-02-15 02:40:28'),(19,10,'Black',10,'2020-02-15 02:40:29','2020-02-15 02:40:29'),(20,10,'Red',10,'2020-02-15 02:40:29','2020-02-15 02:40:29'),(21,11,'Black',10,'2020-02-15 02:40:29','2020-02-15 02:40:29'),(22,11,'Red',10,'2020-02-15 02:40:29','2020-02-15 02:40:29'),(23,12,'Black',10,'2020-02-15 02:40:29','2020-02-15 02:40:29'),(24,12,'Red',10,'2020-02-15 02:40:29','2020-02-15 02:40:29'),(25,13,'Black',10,'2020-02-15 02:40:30','2020-02-15 02:40:30'),(26,13,'Red',10,'2020-02-15 02:40:30','2020-02-15 02:40:30'),(27,14,'Black',10,'2020-02-15 02:40:31','2020-02-15 02:40:31'),(28,14,'Red',10,'2020-02-15 02:40:31','2020-02-15 02:40:31'),(29,15,'Black',10,'2020-02-15 02:40:31','2020-02-15 02:40:31'),(30,15,'Red',10,'2020-02-15 02:40:31','2020-02-15 02:40:31'),(31,16,'Black',10,'2020-02-15 02:40:32','2020-02-15 02:40:32'),(32,16,'Red',10,'2020-02-15 02:40:32','2020-02-15 02:40:32'),(33,17,'Black',10,'2020-02-15 02:40:32','2020-02-15 02:40:32'),(34,17,'Red',10,'2020-02-15 02:40:32','2020-02-15 02:40:32'),(35,18,'Black',10,'2020-02-15 02:40:32','2020-02-15 02:40:32'),(36,18,'Red',10,'2020-02-15 02:40:33','2020-02-15 02:40:33'),(37,19,'Black',10,'2020-02-15 02:40:33','2020-02-15 02:40:33'),(38,19,'Red',10,'2020-02-15 02:40:34','2020-02-15 02:40:34'),(39,20,'Black',10,'2020-02-15 02:40:34','2020-02-15 02:40:34'),(40,20,'Red',10,'2020-02-15 02:40:34','2020-02-15 02:40:34'),(41,21,'Black',10,'2020-02-15 02:40:34','2020-02-15 02:40:34'),(42,21,'Red',10,'2020-02-15 02:40:34','2020-02-15 02:40:34'),(43,22,'Black',10,'2020-02-15 02:40:35','2020-02-15 02:40:35'),(44,22,'Red',10,'2020-02-15 02:40:35','2020-02-15 02:40:35'),(45,23,'Black',10,'2020-02-15 02:40:36','2020-02-15 02:40:36'),(46,23,'Red',10,'2020-02-15 02:40:36','2020-02-15 02:40:36'),(47,24,'Black',10,'2020-02-15 02:40:36','2020-02-15 02:40:36'),(48,24,'Red',10,'2020-02-15 02:40:36','2020-02-15 02:40:36'),(49,25,'Black',10,'2020-02-15 02:40:37','2020-02-15 02:40:37'),(50,25,'Red',10,'2020-02-15 02:40:37','2020-02-15 02:40:37'),(51,26,'Black',10,'2020-02-15 02:40:37','2020-02-15 02:40:37'),(52,26,'Red',10,'2020-02-15 02:40:38','2020-02-15 02:40:38'),(53,27,'Black',10,'2020-02-15 02:40:38','2020-02-15 02:40:38'),(54,27,'Red',10,'2020-02-15 02:40:38','2020-02-15 02:40:38'),(55,28,'Black',10,'2020-02-15 02:40:39','2020-02-15 02:40:39'),(56,28,'Red',10,'2020-02-15 02:40:39','2020-02-15 02:40:39'),(57,29,'Black',10,'2020-02-15 02:40:39','2020-02-15 02:40:39'),(58,29,'Red',10,'2020-02-15 02:40:39','2020-02-15 02:40:39'),(59,30,'Black',10,'2020-02-15 02:40:39','2020-02-15 02:40:39'),(60,30,'Red',10,'2020-02-15 02:40:39','2020-02-15 02:40:39'),(61,31,'Black',10,'2020-02-15 02:40:40','2020-02-15 02:40:40'),(62,31,'Red',10,'2020-02-15 02:40:40','2020-02-15 02:40:40'),(63,32,'Black',10,'2020-02-15 02:40:41','2020-02-15 02:40:41'),(64,32,'Red',10,'2020-02-15 02:40:41','2020-02-15 02:40:41'),(65,33,'Black',10,'2020-02-15 02:40:41','2020-02-15 02:40:41'),(66,33,'Red',10,'2020-02-15 02:40:41','2020-02-15 02:40:41'),(67,34,'Black',10,'2020-02-15 02:40:42','2020-02-15 02:40:42'),(68,34,'Red',10,'2020-02-15 02:40:42','2020-02-15 02:40:42'),(69,35,'Black',10,'2020-02-15 02:40:42','2020-02-15 02:40:42'),(70,35,'Red',10,'2020-02-15 02:40:42','2020-02-15 02:40:42'),(71,36,'Black',10,'2020-02-15 02:40:42','2020-02-15 02:40:42'),(72,36,'Red',10,'2020-02-15 02:40:43','2020-02-15 02:40:43'),(73,37,'Black',10,'2020-02-15 02:40:43','2020-02-15 02:40:43'),(74,37,'Red',10,'2020-02-15 02:40:43','2020-02-15 02:40:43'),(75,38,'Black',10,'2020-02-15 02:40:44','2020-02-15 02:40:44'),(76,38,'Red',10,'2020-02-15 02:40:44','2020-02-15 02:40:44'),(77,39,'Black',10,'2020-02-15 02:40:44','2020-02-15 02:40:44'),(78,39,'Red',10,'2020-02-15 02:40:44','2020-02-15 02:40:44'),(79,40,'Black',10,'2020-02-15 02:40:45','2020-02-15 02:40:45'),(80,40,'Red',10,'2020-02-15 02:40:45','2020-02-15 02:40:45'),(81,41,'Black',10,'2020-02-15 02:40:45','2020-02-15 02:40:45'),(82,41,'Red',10,'2020-02-15 02:40:45','2020-02-15 02:40:45'),(83,42,'Black',10,'2020-02-15 02:40:46','2020-02-15 02:40:46'),(84,42,'Red',10,'2020-02-15 02:40:46','2020-02-15 02:40:46'),(85,43,'Black',10,'2020-02-15 02:40:47','2020-02-15 02:40:47'),(86,43,'Red',10,'2020-02-15 02:40:47','2020-02-15 02:40:47'),(87,44,'Black',10,'2020-02-15 02:40:47','2020-02-15 02:40:47'),(88,44,'Red',10,'2020-02-15 02:40:47','2020-02-15 02:40:47'),(89,45,'Black',10,'2020-02-15 02:40:47','2020-02-15 02:40:47'),(90,45,'Red',10,'2020-02-15 02:40:47','2020-02-15 02:40:47'),(91,46,'Black',10,'2020-02-15 02:40:48','2020-02-15 02:40:48'),(92,46,'Red',10,'2020-02-15 02:40:48','2020-02-15 02:40:48'),(93,47,'Black',10,'2020-02-15 02:40:49','2020-02-15 02:40:49'),(94,47,'Red',10,'2020-02-15 02:40:49','2020-02-15 02:40:49'),(95,48,'Black',10,'2020-02-15 02:40:49','2020-02-15 02:40:49'),(96,48,'Red',10,'2020-02-15 02:40:49','2020-02-15 02:40:49'),(97,49,'Black',10,'2020-02-15 02:40:50','2020-02-15 02:40:50'),(98,49,'Red',10,'2020-02-15 02:40:50','2020-02-15 02:40:50'),(99,50,'Black',10,'2020-02-15 02:40:50','2020-02-15 02:40:50'),(100,50,'Red',10,'2020-02-15 02:40:50','2020-02-15 02:40:50'),(101,51,'Black',10,'2020-02-15 02:40:50','2020-02-15 02:40:50'),(102,51,'Red',10,'2020-02-15 02:40:51','2020-02-15 02:40:51'),(103,52,'Black',10,'2020-02-15 02:40:51','2020-02-15 02:40:51'),(104,52,'Red',10,'2020-02-15 02:40:52','2020-02-15 02:40:52'),(105,53,'Black',10,'2020-02-15 02:40:52','2020-02-15 02:40:52'),(106,53,'Red',10,'2020-02-15 02:40:52','2020-02-15 02:40:52'),(107,54,'Black',10,'2020-02-15 02:40:52','2020-02-15 02:40:52'),(108,54,'Red',10,'2020-02-15 02:40:52','2020-02-15 02:40:52'),(109,55,'Black',10,'2020-02-15 02:40:53','2020-02-15 02:40:53'),(110,55,'Red',10,'2020-02-15 02:40:53','2020-02-15 02:40:53'),(111,56,'Black',10,'2020-02-15 02:40:53','2020-02-15 02:40:53'),(112,56,'Red',10,'2020-02-15 02:40:54','2020-02-15 02:40:54'),(113,57,'Black',10,'2020-02-15 02:40:54','2020-02-15 02:40:54'),(114,57,'Red',10,'2020-02-15 02:40:54','2020-02-15 02:40:54'),(115,58,'Black',10,'2020-02-15 02:40:55','2020-02-15 02:40:55'),(116,58,'Red',10,'2020-02-15 02:40:55','2020-02-15 02:40:55'),(117,59,'Black',10,'2020-02-15 02:40:55','2020-02-15 02:40:55'),(118,59,'Red',10,'2020-02-15 02:40:55','2020-02-15 02:40:55'),(119,60,'Black',10,'2020-02-15 02:40:55','2020-02-15 02:40:55'),(120,60,'Red',10,'2020-02-15 02:40:56','2020-02-15 02:40:56'),(121,61,'Black',10,'2020-02-15 02:40:56','2020-02-15 02:40:56'),(122,61,'Red',10,'2020-02-15 02:40:56','2020-02-15 02:40:56'),(123,62,'Black',10,'2020-02-15 02:40:57','2020-02-15 02:40:57'),(124,62,'Red',10,'2020-02-15 02:40:57','2020-02-15 02:40:57'),(125,63,'Black',10,'2020-02-15 02:40:57','2020-02-15 02:40:57'),(126,63,'Red',10,'2020-02-15 02:40:57','2020-02-15 02:40:57'),(127,64,'Black',10,'2020-02-15 02:40:58','2020-02-15 02:40:58'),(128,64,'Red',10,'2020-02-15 02:40:58','2020-02-15 02:40:58'),(129,65,'Black',10,'2020-02-15 02:40:58','2020-02-15 02:40:58'),(130,65,'Red',10,'2020-02-15 02:40:58','2020-02-15 02:40:58'),(131,66,'Black',10,'2020-02-15 02:40:58','2020-02-15 02:40:58'),(132,66,'Red',10,'2020-02-15 02:40:59','2020-02-15 02:40:59'),(133,67,'Black',10,'2020-02-15 02:40:59','2020-02-15 02:40:59'),(134,67,'Red',10,'2020-02-15 02:40:59','2020-02-15 02:40:59'),(135,68,'Black',10,'2020-02-15 02:41:00','2020-02-15 02:41:00'),(136,68,'Red',10,'2020-02-15 02:41:00','2020-02-15 02:41:00'),(137,69,'Black',10,'2020-02-15 02:41:00','2020-02-15 02:41:00'),(138,69,'Red',10,'2020-02-15 02:41:00','2020-02-15 02:41:00'),(139,70,'Black',10,'2020-02-15 02:41:01','2020-02-15 02:41:01'),(140,70,'Red',10,'2020-02-15 02:41:01','2020-02-15 02:41:01'),(141,71,'Black',10,'2020-02-15 02:41:01','2020-02-15 02:41:01'),(142,71,'Red',10,'2020-02-15 02:41:01','2020-02-15 02:41:01'),(143,72,'Black',10,'2020-02-15 02:41:02','2020-02-15 02:41:02'),(144,72,'Red',10,'2020-02-15 02:41:02','2020-02-15 02:41:02'),(145,73,'Black',10,'2020-02-15 02:41:03','2020-02-15 02:41:03'),(146,73,'Red',10,'2020-02-15 02:41:03','2020-02-15 02:41:03'),(147,74,'Black',10,'2020-02-15 02:41:03','2020-02-15 02:41:03'),(148,74,'Red',10,'2020-02-15 02:41:03','2020-02-15 02:41:03'),(149,75,'Black',10,'2020-02-15 02:41:03','2020-02-15 02:41:03'),(150,75,'Red',10,'2020-02-15 02:41:04','2020-02-15 02:41:04'),(151,76,'Black',10,'2020-02-15 02:41:04','2020-02-15 02:41:04'),(152,76,'Red',10,'2020-02-15 02:41:04','2020-02-15 02:41:04'),(153,77,'Black',10,'2020-02-15 02:41:05','2020-02-15 02:41:05'),(154,77,'Red',10,'2020-02-15 02:41:05','2020-02-15 02:41:05'),(155,78,'Black',10,'2020-02-15 02:41:05','2020-02-15 02:41:05'),(156,78,'Red',10,'2020-02-15 02:41:05','2020-02-15 02:41:05'),(157,79,'Black',10,'2020-02-15 02:41:06','2020-02-15 02:41:06'),(158,79,'Red',10,'2020-02-15 02:41:06','2020-02-15 02:41:06'),(159,80,'Black',10,'2020-02-15 02:41:06','2020-02-15 02:41:06'),(160,80,'Red',10,'2020-02-15 02:41:06','2020-02-15 02:41:06'),(161,81,'Black',10,'2020-02-15 02:41:07','2020-02-15 02:41:07'),(162,81,'Red',10,'2020-02-15 02:41:07','2020-02-15 02:41:07'),(163,82,'Black',10,'2020-02-15 02:41:08','2020-02-15 02:41:08'),(164,82,'Red',10,'2020-02-15 02:41:08','2020-02-15 02:41:08'),(165,83,'Black',10,'2020-02-15 02:41:08','2020-02-15 02:41:08'),(166,83,'Red',10,'2020-02-15 02:41:08','2020-02-15 02:41:08'),(167,84,'Black',10,'2020-02-15 02:41:08','2020-02-15 02:41:08'),(168,84,'Red',10,'2020-02-15 02:41:08','2020-02-15 02:41:08'),(169,85,'Black',10,'2020-02-15 02:41:09','2020-02-15 02:41:09'),(170,85,'Red',10,'2020-02-15 02:41:09','2020-02-15 02:41:09'),(171,86,'Black',10,'2020-02-15 02:41:09','2020-02-15 02:41:09'),(172,86,'Red',10,'2020-02-15 02:41:10','2020-02-15 02:41:10'),(173,87,'Black',10,'2020-02-15 02:41:10','2020-02-15 02:41:10'),(174,87,'Red',10,'2020-02-15 02:41:10','2020-02-15 02:41:10'),(175,88,'Black',10,'2020-02-15 02:41:10','2020-02-15 02:41:10'),(176,88,'Red',10,'2020-02-15 02:41:11','2020-02-15 02:41:11'),(177,89,'Black',10,'2020-02-15 02:41:11','2020-02-15 02:41:11'),(178,89,'Red',10,'2020-02-15 02:41:11','2020-02-15 02:41:11'),(179,90,'Black',10,'2020-02-15 02:41:11','2020-02-15 02:41:11'),(180,90,'Red',10,'2020-02-15 02:41:11','2020-02-15 02:41:11'),(181,91,'Black',10,'2020-02-15 02:41:12','2020-02-15 02:41:12'),(182,91,'Red',10,'2020-02-15 02:41:12','2020-02-15 02:41:12'),(183,92,'Black',10,'2020-02-15 02:41:12','2020-02-15 02:41:12'),(184,92,'Red',10,'2020-02-15 02:41:12','2020-02-15 02:41:12'),(185,93,'Black',10,'2020-02-15 02:41:12','2020-02-15 02:41:12'),(186,93,'Red',10,'2020-02-15 02:41:12','2020-02-15 02:41:12'),(187,94,'Black',10,'2020-02-15 02:41:13','2020-02-15 02:41:13'),(188,94,'Red',10,'2020-02-15 02:41:13','2020-02-15 02:41:13'),(189,95,'Black',10,'2020-02-15 02:41:14','2020-02-15 02:41:14'),(190,95,'Red',10,'2020-02-15 02:41:14','2020-02-15 02:41:14'),(191,96,'Black',10,'2020-02-15 02:41:14','2020-02-15 02:41:14'),(192,96,'Red',10,'2020-02-15 02:41:14','2020-02-15 02:41:14'),(193,97,'Black',10,'2020-02-15 02:41:16','2020-02-15 02:41:16'),(194,97,'Red',10,'2020-02-15 02:41:16','2020-02-15 02:41:16'),(195,98,'Black',10,'2020-02-15 02:41:16','2020-02-15 02:41:16'),(196,98,'Red',10,'2020-02-15 02:41:16','2020-02-15 02:41:16'),(197,99,'Black',10,'2020-02-15 02:41:16','2020-02-15 02:41:16'),(198,99,'Red',10,'2020-02-15 02:41:16','2020-02-15 02:41:16'),(199,100,'Black',10,'2020-02-15 02:41:17','2020-02-15 02:41:17'),(200,100,'Red',10,'2020-02-15 02:41:17','2020-02-15 02:41:17'),(201,101,'Black',10,'2020-02-15 02:41:17','2020-02-15 02:41:17'),(202,101,'Red',10,'2020-02-15 02:41:17','2020-02-15 02:41:17'),(203,102,'Black',10,'2020-02-15 02:41:17','2020-02-15 02:41:17'),(204,102,'Red',10,'2020-02-15 02:41:17','2020-02-15 02:41:17'),(205,103,'Black',10,'2020-02-15 02:41:18','2020-02-15 02:41:18'),(206,103,'Red',10,'2020-02-15 02:41:18','2020-02-15 02:41:18'),(207,104,'Black',10,'2020-02-15 02:41:18','2020-02-15 02:41:18'),(208,104,'Red',10,'2020-02-15 02:41:19','2020-02-15 02:41:19'),(209,105,'Black',10,'2020-02-15 02:41:19','2020-02-15 02:41:19'),(210,105,'Red',10,'2020-02-15 02:41:19','2020-02-15 02:41:19'),(211,106,'Black',10,'2020-02-15 02:41:20','2020-02-15 02:41:20'),(212,106,'Red',10,'2020-02-15 02:41:20','2020-02-15 02:41:20'),(213,107,'Black',10,'2020-02-15 02:41:20','2020-02-15 02:41:20'),(214,107,'Red',10,'2020-02-15 02:41:20','2020-02-15 02:41:20'),(215,108,'Black',10,'2020-02-15 02:41:21','2020-02-15 02:41:21'),(216,108,'Red',10,'2020-02-15 02:41:21','2020-02-15 02:41:21'),(217,109,'Black',10,'2020-02-15 02:41:22','2020-02-15 02:41:22'),(218,109,'Red',10,'2020-02-15 02:41:22','2020-02-15 02:41:22'),(219,110,'Black',10,'2020-02-15 02:41:22','2020-02-15 02:41:22'),(220,110,'Red',10,'2020-02-15 02:41:22','2020-02-15 02:41:22'),(221,111,'Black',10,'2020-02-15 02:41:22','2020-02-15 02:41:22'),(222,111,'Red',10,'2020-02-15 02:41:23','2020-02-15 02:41:23'),(223,112,'Black',10,'2020-02-15 02:41:23','2020-02-15 02:41:23'),(224,112,'Red',10,'2020-02-15 02:41:23','2020-02-15 02:41:23'),(225,113,'Black',10,'2020-02-15 02:41:24','2020-02-15 02:41:24'),(226,113,'Red',10,'2020-02-15 02:41:24','2020-02-15 02:41:24'),(227,114,'Black',10,'2020-02-15 02:41:24','2020-02-15 02:41:24'),(228,114,'Red',10,'2020-02-15 02:41:24','2020-02-15 02:41:24'),(229,115,'Black',10,'2020-02-15 02:41:25','2020-02-15 02:41:25'),(230,115,'Red',10,'2020-02-15 02:41:25','2020-02-15 02:41:25'),(231,116,'Black',10,'2020-02-15 02:41:25','2020-02-15 02:41:25'),(232,116,'Red',10,'2020-02-15 02:41:25','2020-02-15 02:41:25'),(233,117,'Black',10,'2020-02-15 02:41:26','2020-02-15 02:41:26'),(234,117,'Red',10,'2020-02-15 02:41:26','2020-02-15 02:41:26'),(235,118,'Black',10,'2020-02-15 02:41:27','2020-02-15 02:41:27'),(236,118,'Red',10,'2020-02-15 02:41:27','2020-02-15 02:41:27'),(237,119,'Black',10,'2020-02-15 02:41:27','2020-02-15 02:41:27'),(238,119,'Red',10,'2020-02-15 02:41:27','2020-02-15 02:41:27'),(239,120,'Black',10,'2020-02-15 02:41:27','2020-02-15 02:41:27'),(240,120,'Red',10,'2020-02-15 02:41:27','2020-02-15 02:41:27'),(241,121,'Black',10,'2020-02-15 02:41:28','2020-02-15 02:41:28'),(242,121,'Red',10,'2020-02-15 02:41:28','2020-02-15 02:41:28'),(243,122,'Black',10,'2020-02-15 02:41:28','2020-02-15 02:41:28'),(244,122,'Red',10,'2020-02-15 02:41:28','2020-02-15 02:41:28'),(245,123,'Black',10,'2020-02-15 02:41:28','2020-02-15 02:41:28'),(246,123,'Red',10,'2020-02-15 02:41:29','2020-02-15 02:41:29'),(247,124,'Black',10,'2020-02-15 02:41:29','2020-02-15 02:41:29'),(248,124,'Red',10,'2020-02-15 02:41:29','2020-02-15 02:41:29'),(249,125,'Black',10,'2020-02-15 02:41:30','2020-02-15 02:41:30'),(250,125,'Red',10,'2020-02-15 02:41:30','2020-02-15 02:41:30'),(251,126,'Black',10,'2020-02-15 02:41:30','2020-02-15 02:41:30'),(252,126,'Red',10,'2020-02-15 02:41:30','2020-02-15 02:41:30'),(253,127,'Black',10,'2020-02-15 02:41:31','2020-02-15 02:41:31'),(254,127,'Red',10,'2020-02-15 02:41:31','2020-02-15 02:41:31'),(255,128,'Black',10,'2020-02-15 02:41:31','2020-02-15 02:41:31'),(256,128,'Red',10,'2020-02-15 02:41:31','2020-02-15 02:41:31'),(257,129,'Black',10,'2020-02-15 02:41:31','2020-02-15 02:41:31'),(258,129,'Red',10,'2020-02-15 02:41:31','2020-02-15 02:41:31'),(259,130,'Black',10,'2020-02-15 02:41:32','2020-02-15 02:41:32'),(260,130,'Red',10,'2020-02-15 02:41:33','2020-02-15 02:41:33'),(261,131,'Black',10,'2020-02-15 02:41:33','2020-02-15 02:41:33'),(262,131,'Red',10,'2020-02-15 02:41:33','2020-02-15 02:41:33'),(263,132,'Black',10,'2020-02-15 02:41:33','2020-02-15 02:41:33'),(264,132,'Red',10,'2020-02-15 02:41:33','2020-02-15 02:41:33'),(265,133,'Black',10,'2020-02-15 02:41:34','2020-02-15 02:41:34'),(266,133,'Red',10,'2020-02-15 02:41:34','2020-02-15 02:41:34'),(267,134,'Black',10,'2020-02-15 02:41:34','2020-02-15 02:41:34'),(268,134,'Red',10,'2020-02-15 02:41:34','2020-02-15 02:41:34'),(269,135,'Black',10,'2020-02-15 02:41:35','2020-02-15 02:41:35'),(270,135,'Red',10,'2020-02-15 02:41:35','2020-02-15 02:41:35'),(271,136,'Black',10,'2020-02-15 02:41:36','2020-02-15 02:41:36'),(272,136,'Red',10,'2020-02-15 02:41:36','2020-02-15 02:41:36'),(273,137,'Black',10,'2020-02-15 02:41:36','2020-02-15 02:41:36'),(274,137,'Red',10,'2020-02-15 02:41:36','2020-02-15 02:41:36'),(275,138,'Black',10,'2020-02-15 02:41:37','2020-02-15 02:41:37'),(276,138,'Red',10,'2020-02-15 02:41:37','2020-02-15 02:41:37'),(277,139,'Black',10,'2020-02-15 02:41:38','2020-02-15 02:41:38'),(278,139,'Red',10,'2020-02-15 02:41:38','2020-02-15 02:41:38'),(279,140,'Black',10,'2020-02-15 02:41:38','2020-02-15 02:41:38'),(280,140,'Red',10,'2020-02-15 02:41:38','2020-02-15 02:41:38'),(281,141,'Black',10,'2020-02-15 02:41:38','2020-02-15 02:41:38'),(282,141,'Red',10,'2020-02-15 02:41:38','2020-02-15 02:41:38'),(283,142,'Black',10,'2020-02-15 02:41:39','2020-02-15 02:41:39'),(284,142,'Red',10,'2020-02-15 02:41:39','2020-02-15 02:41:39'),(285,143,'Black',10,'2020-02-15 02:41:39','2020-02-15 02:41:39'),(286,143,'Red',10,'2020-02-15 02:41:40','2020-02-15 02:41:40'),(287,144,'Black',10,'2020-02-15 02:41:40','2020-02-15 02:41:40'),(288,144,'Red',10,'2020-02-15 02:41:40','2020-02-15 02:41:40'),(295,148,'Black',10,'2020-02-15 02:41:42','2020-02-15 02:41:42'),(296,148,'Yellow',10,'2020-02-15 02:41:42','2020-02-18 06:23:01'),(297,149,'Black',10,'2020-02-15 02:41:42','2020-02-15 02:41:42'),(298,149,'Yellow',10,'2020-02-15 02:41:42','2020-02-18 06:23:15'),(299,150,'Black',10,'2020-02-15 02:41:43','2020-02-15 02:41:43'),(300,150,'Yellow',10,'2020-02-15 02:41:43','2020-02-18 06:23:20');
/*!40000 ALTER TABLE `product_size_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_sizes`
--

DROP TABLE IF EXISTS `product_sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_sizes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `size` smallint NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_sizes_product_id_foreign` (`product_id`),
  CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_sizes`
--

LOCK TABLES `product_sizes` WRITE;
/*!40000 ALTER TABLE `product_sizes` DISABLE KEYS */;
INSERT INTO `product_sizes` VALUES (1,1,30,100000,'2020-02-15 02:40:23','2020-02-15 02:40:23'),(2,1,31,100000,'2020-02-15 02:40:24','2020-02-15 02:40:24'),(3,1,32,100000,'2020-02-15 02:40:24','2020-02-15 02:40:24'),(4,2,30,100001,'2020-02-15 02:40:25','2020-02-15 02:40:25'),(5,2,31,100001,'2020-02-15 02:40:26','2020-02-15 02:40:26'),(6,2,32,100001,'2020-02-15 02:40:26','2020-02-15 02:40:26'),(7,3,30,100002,'2020-02-15 02:40:27','2020-02-15 02:40:27'),(8,3,31,100002,'2020-02-15 02:40:27','2020-02-15 02:40:27'),(9,3,32,100002,'2020-02-15 02:40:27','2020-02-15 02:40:27'),(10,4,30,100003,'2020-02-15 02:40:28','2020-02-15 02:40:28'),(11,4,31,100003,'2020-02-15 02:40:28','2020-02-15 02:40:28'),(12,4,32,100003,'2020-02-15 02:40:29','2020-02-15 02:40:29'),(13,5,30,100004,'2020-02-15 02:40:30','2020-02-15 02:40:30'),(14,5,31,100004,'2020-02-15 02:40:30','2020-02-15 02:40:30'),(15,5,32,100004,'2020-02-15 02:40:30','2020-02-15 02:40:30'),(16,6,30,100005,'2020-02-15 02:40:31','2020-02-15 02:40:31'),(17,6,31,100005,'2020-02-15 02:40:32','2020-02-15 02:40:32'),(18,6,32,100005,'2020-02-15 02:40:32','2020-02-15 02:40:32'),(19,7,30,100006,'2020-02-15 02:40:33','2020-02-15 02:40:33'),(20,7,31,100006,'2020-02-15 02:40:33','2020-02-15 02:40:33'),(21,7,32,100006,'2020-02-15 02:40:33','2020-02-15 02:40:33'),(22,8,30,100007,'2020-02-15 02:40:35','2020-02-15 02:40:35'),(23,8,31,100007,'2020-02-15 02:40:35','2020-02-15 02:40:35'),(24,8,32,100007,'2020-02-15 02:40:35','2020-02-15 02:40:35'),(25,9,30,100008,'2020-02-15 02:40:37','2020-02-15 02:40:37'),(26,9,31,100008,'2020-02-15 02:40:37','2020-02-15 02:40:37'),(27,9,32,100008,'2020-02-15 02:40:37','2020-02-15 02:40:37'),(28,10,30,100009,'2020-02-15 02:40:38','2020-02-15 02:40:38'),(29,10,31,100009,'2020-02-15 02:40:38','2020-02-15 02:40:38'),(30,10,32,100009,'2020-02-15 02:40:38','2020-02-15 02:40:38'),(31,11,30,100010,'2020-02-15 02:40:40','2020-02-15 02:40:40'),(32,11,31,100010,'2020-02-15 02:40:40','2020-02-15 02:40:40'),(33,11,32,100010,'2020-02-15 02:40:40','2020-02-15 02:40:40'),(34,12,30,100011,'2020-02-15 02:40:41','2020-02-15 02:40:41'),(35,12,31,100011,'2020-02-15 02:40:41','2020-02-15 02:40:41'),(36,12,32,100011,'2020-02-15 02:40:42','2020-02-15 02:40:42'),(37,13,30,100012,'2020-02-15 02:40:43','2020-02-15 02:40:43'),(38,13,31,100012,'2020-02-15 02:40:43','2020-02-15 02:40:43'),(39,13,32,100012,'2020-02-15 02:40:43','2020-02-15 02:40:43'),(40,14,30,100013,'2020-02-15 02:40:44','2020-02-15 02:40:44'),(41,14,31,100013,'2020-02-15 02:40:45','2020-02-15 02:40:45'),(42,14,32,100013,'2020-02-15 02:40:45','2020-02-15 02:40:45'),(43,15,30,100014,'2020-02-15 02:40:46','2020-02-15 02:40:46'),(44,15,31,100014,'2020-02-15 02:40:46','2020-02-15 02:40:46'),(45,15,32,100014,'2020-02-15 02:40:47','2020-02-15 02:40:47'),(46,16,30,100015,'2020-02-15 02:40:48','2020-02-15 02:40:48'),(47,16,31,100015,'2020-02-15 02:40:48','2020-02-15 02:40:48'),(48,16,32,100015,'2020-02-15 02:40:48','2020-02-15 02:40:48'),(49,17,30,100016,'2020-02-15 02:40:50','2020-02-15 02:40:50'),(50,17,31,100016,'2020-02-15 02:40:50','2020-02-15 02:40:50'),(51,17,32,100016,'2020-02-15 02:40:50','2020-02-15 02:40:50'),(52,18,30,100017,'2020-02-15 02:40:51','2020-02-15 02:40:51'),(53,18,31,100017,'2020-02-15 02:40:51','2020-02-15 02:40:51'),(54,18,32,100017,'2020-02-15 02:40:51','2020-02-15 02:40:51'),(55,19,30,100018,'2020-02-15 02:40:53','2020-02-15 02:40:53'),(56,19,31,100018,'2020-02-15 02:40:53','2020-02-15 02:40:53'),(57,19,32,100018,'2020-02-15 02:40:53','2020-02-15 02:40:53'),(58,20,30,100019,'2020-02-15 02:40:54','2020-02-15 02:40:54'),(59,20,31,100019,'2020-02-15 02:40:55','2020-02-15 02:40:55'),(60,20,32,100019,'2020-02-15 02:40:55','2020-02-15 02:40:55'),(61,21,30,100020,'2020-02-15 02:40:56','2020-02-15 02:40:56'),(62,21,31,100020,'2020-02-15 02:40:56','2020-02-15 02:40:56'),(63,21,32,100020,'2020-02-15 02:40:56','2020-02-15 02:40:56'),(64,22,30,100021,'2020-02-15 02:40:58','2020-02-15 02:40:58'),(65,22,31,100021,'2020-02-15 02:40:58','2020-02-15 02:40:58'),(66,22,32,100021,'2020-02-15 02:40:58','2020-02-15 02:40:58'),(67,23,30,100022,'2020-02-15 02:40:59','2020-02-15 02:40:59'),(68,23,31,100022,'2020-02-15 02:40:59','2020-02-15 02:40:59'),(69,23,32,100022,'2020-02-15 02:40:59','2020-02-15 02:40:59'),(70,24,30,100023,'2020-02-15 02:41:01','2020-02-15 02:41:01'),(71,24,31,100023,'2020-02-15 02:41:01','2020-02-15 02:41:01'),(72,24,32,100023,'2020-02-15 02:41:01','2020-02-15 02:41:01'),(73,25,30,100024,'2020-02-15 02:41:02','2020-02-15 02:41:02'),(74,25,31,100024,'2020-02-15 02:41:02','2020-02-15 02:41:02'),(75,25,32,100024,'2020-02-15 02:41:03','2020-02-15 02:41:03'),(76,26,30,100025,'2020-02-15 02:41:04','2020-02-15 02:41:04'),(77,26,31,100025,'2020-02-15 02:41:04','2020-02-15 02:41:04'),(78,26,32,100025,'2020-02-15 02:41:04','2020-02-15 02:41:04'),(79,27,30,100026,'2020-02-15 02:41:06','2020-02-15 02:41:06'),(80,27,31,100026,'2020-02-15 02:41:06','2020-02-15 02:41:06'),(81,27,32,100026,'2020-02-15 02:41:06','2020-02-15 02:41:06'),(82,28,30,100027,'2020-02-15 02:41:07','2020-02-15 02:41:07'),(83,28,31,100027,'2020-02-15 02:41:07','2020-02-15 02:41:07'),(84,28,32,100027,'2020-02-15 02:41:07','2020-02-15 02:41:07'),(85,29,30,100028,'2020-02-15 02:41:08','2020-02-15 02:41:08'),(86,29,31,100028,'2020-02-15 02:41:09','2020-02-15 02:41:09'),(87,29,32,100028,'2020-02-15 02:41:09','2020-02-15 02:41:09'),(88,30,30,100029,'2020-02-15 02:41:10','2020-02-15 02:41:10'),(89,30,31,100029,'2020-02-15 02:41:10','2020-02-15 02:41:10'),(90,30,32,100029,'2020-02-15 02:41:10','2020-02-15 02:41:10'),(91,31,30,100030,'2020-02-15 02:41:11','2020-02-15 02:41:11'),(92,31,31,100030,'2020-02-15 02:41:12','2020-02-15 02:41:12'),(93,31,32,100030,'2020-02-15 02:41:12','2020-02-15 02:41:12'),(94,32,30,100031,'2020-02-15 02:41:13','2020-02-15 02:41:13'),(95,32,31,100031,'2020-02-15 02:41:13','2020-02-15 02:41:13'),(96,32,32,100031,'2020-02-15 02:41:13','2020-02-15 02:41:13'),(97,33,30,100032,'2020-02-15 02:41:15','2020-02-15 02:41:15'),(98,33,31,100032,'2020-02-15 02:41:15','2020-02-15 02:41:15'),(99,33,32,100032,'2020-02-15 02:41:15','2020-02-15 02:41:15'),(100,34,30,100033,'2020-02-15 02:41:17','2020-02-15 02:41:17'),(101,34,31,100033,'2020-02-15 02:41:17','2020-02-15 02:41:17'),(102,34,32,100033,'2020-02-15 02:41:17','2020-02-15 02:41:17'),(103,35,30,100034,'2020-02-15 02:41:18','2020-02-15 02:41:18'),(104,35,31,100034,'2020-02-15 02:41:18','2020-02-15 02:41:18'),(105,35,32,100034,'2020-02-15 02:41:18','2020-02-15 02:41:18'),(106,36,30,100035,'2020-02-15 02:41:19','2020-02-15 02:41:19'),(107,36,31,100035,'2020-02-15 02:41:19','2020-02-15 02:41:19'),(108,36,32,100035,'2020-02-15 02:41:20','2020-02-15 02:41:20'),(109,37,30,100036,'2020-02-15 02:41:21','2020-02-15 02:41:21'),(110,37,31,100036,'2020-02-15 02:41:21','2020-02-15 02:41:21'),(111,37,32,100036,'2020-02-15 02:41:21','2020-02-15 02:41:21'),(112,38,30,100037,'2020-02-15 02:41:23','2020-02-15 02:41:23'),(113,38,31,100037,'2020-02-15 02:41:23','2020-02-15 02:41:23'),(114,38,32,100037,'2020-02-15 02:41:23','2020-02-15 02:41:23'),(115,39,30,100038,'2020-02-15 02:41:24','2020-02-15 02:41:24'),(116,39,31,100038,'2020-02-15 02:41:25','2020-02-15 02:41:25'),(117,39,32,100038,'2020-02-15 02:41:25','2020-02-15 02:41:25'),(118,40,30,100039,'2020-02-15 02:41:26','2020-02-15 02:41:26'),(119,40,31,100039,'2020-02-15 02:41:26','2020-02-15 02:41:26'),(120,40,32,100039,'2020-02-15 02:41:26','2020-02-15 02:41:26'),(121,41,30,100040,'2020-02-15 02:41:27','2020-02-15 02:41:27'),(122,41,31,100040,'2020-02-15 02:41:28','2020-02-15 02:41:28'),(123,41,32,100040,'2020-02-15 02:41:28','2020-02-15 02:41:28'),(124,42,30,100041,'2020-02-15 02:41:29','2020-02-15 02:41:29'),(125,42,31,100041,'2020-02-15 02:41:29','2020-02-15 02:41:29'),(126,42,32,100041,'2020-02-15 02:41:29','2020-02-15 02:41:29'),(127,43,30,100042,'2020-02-15 02:41:30','2020-02-15 02:41:30'),(128,43,31,100042,'2020-02-15 02:41:31','2020-02-15 02:41:31'),(129,43,32,100042,'2020-02-15 02:41:31','2020-02-15 02:41:31'),(130,44,30,100043,'2020-02-15 02:41:32','2020-02-15 02:41:32'),(131,44,31,100043,'2020-02-15 02:41:32','2020-02-15 02:41:32'),(132,44,32,100043,'2020-02-15 02:41:32','2020-02-15 02:41:32'),(133,45,30,100044,'2020-02-15 02:41:33','2020-02-15 02:41:33'),(134,45,31,100044,'2020-02-15 02:41:34','2020-02-15 02:41:34'),(135,45,32,100044,'2020-02-15 02:41:34','2020-02-15 02:41:34'),(136,46,30,100045,'2020-02-15 02:41:35','2020-02-15 02:41:35'),(137,46,31,100045,'2020-02-15 02:41:35','2020-02-15 02:41:35'),(138,46,32,100045,'2020-02-15 02:41:36','2020-02-15 02:41:36'),(139,47,30,100046,'2020-02-15 02:41:37','2020-02-15 02:41:37'),(140,47,31,100046,'2020-02-15 02:41:37','2020-02-15 02:41:37'),(141,47,32,100046,'2020-02-15 02:41:37','2020-02-15 02:41:37'),(142,48,30,100047,'2020-02-15 02:41:39','2020-02-15 02:41:39'),(143,48,31,100047,'2020-02-15 02:41:39','2020-02-15 02:41:39'),(144,48,32,100047,'2020-02-15 02:41:39','2020-02-15 02:41:39'),(148,50,30,100049,'2020-02-15 02:41:42','2020-02-15 02:41:42'),(149,50,31,100049,'2020-02-15 02:41:42','2020-02-15 02:41:42'),(150,50,32,100049,'2020-02-15 02:41:42','2020-02-15 02:41:42');
/*!40000 ALTER TABLE `product_sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` bigint unsigned NOT NULL,
  `sale` int NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'MSPRO0','Giày nike 0',1,0,'default.jpg','san pham',1,'giay-nike-0','2020-03-15 02:40:23','2020-02-15 02:40:23'),(2,'MSPRO1','Giày nike 1',1,0,'default.jpg','san pham',1,'giay-nike-1','2020-03-15 02:40:25','2020-02-15 02:40:25'),(3,'MSPRO2','Giày nike 2',1,0,'default.jpg','san pham',1,'giay-nike-2','2020-02-15 02:40:27','2020-02-15 02:40:27'),(4,'MSPRO3','Giày nike 3',1,0,'default.jpg','san pham',1,'giay-nike-3','2020-02-15 02:40:28','2020-02-15 02:40:28'),(5,'MSPRO4','Giày nike 4',1,0,'default.jpg','san pham',1,'giay-nike-4','2020-02-15 02:40:29','2020-02-15 02:40:29'),(6,'MSPRO5','Giày nike 5',1,0,'default.jpg','san pham',1,'giay-nike-5','2020-04-15 02:40:31','2020-02-15 02:40:31'),(7,'MSPRO6','Giày nike 6',1,0,'default.jpg','san pham',1,'giay-nike-6','2020-02-15 02:40:33','2020-02-15 02:40:33'),(8,'MSPRO7','Giày nike 7',1,0,'default.jpg','san pham',1,'giay-nike-7','2020-02-15 02:40:35','2020-02-15 02:40:35'),(9,'MSPRO8','Giày nike 8',1,0,'default.jpg','san pham',1,'giay-nike-8','2020-02-15 02:40:36','2020-02-15 02:40:36'),(10,'MSPRO9','Giày nike 9',1,0,'default.jpg','san pham',1,'giay-nike-9','2020-02-15 02:40:38','2020-02-15 02:40:38'),(11,'MSPRO10','Giày nike 10',1,0,'default.jpg','san pham',1,'giay-nike-10','2020-02-15 02:40:40','2020-02-15 02:40:40'),(12,'MSPRO11','Giày nike 11',1,0,'default.jpg','san pham',1,'giay-nike-11','2020-02-15 02:40:41','2020-02-15 02:40:41'),(13,'MSPRO12','Giày nike 12',1,0,'default.jpg','san pham',1,'giay-nike-12','2020-02-15 02:40:43','2020-02-15 02:40:43'),(14,'MSPRO13','Giày nike 13',1,0,'default.jpg','san pham',1,'giay-nike-13','2020-02-15 02:40:44','2020-02-15 02:40:44'),(15,'MSPRO14','Giày nike 14',1,0,'default.jpg','san pham',1,'giay-nike-14','2020-02-15 02:40:46','2020-02-15 02:40:46'),(16,'MSPRO15','Giày nike 15',1,0,'default.jpg','san pham',1,'giay-nike-15','2020-02-15 02:40:48','2020-02-15 02:40:48'),(17,'MSPRO16','Giày nike 16',1,0,'default.jpg','san pham',1,'giay-nike-16','2020-02-15 02:40:49','2020-02-15 02:40:49'),(18,'MSPRO17','Giày nike 17',1,0,'default.jpg','san pham',1,'giay-nike-17','2020-02-15 02:40:51','2020-02-15 02:40:51'),(19,'MSPRO18','Giày nike 18',1,0,'default.jpg','san pham',1,'giay-nike-18','2020-02-15 02:40:52','2020-02-15 02:40:52'),(20,'MSPRO19','Giày nike 19',1,0,'default.jpg','san pham',1,'giay-nike-19','2020-02-15 02:40:54','2020-02-15 02:40:54'),(21,'MSPRO20','Giày nike 20',1,0,'default.jpg','san pham',1,'giay-nike-20','2020-02-15 02:40:56','2020-02-15 02:40:56'),(22,'MSPRO21','Giày nike 21',1,0,'default.jpg','san pham',1,'giay-nike-21','2020-02-15 02:40:57','2020-02-15 02:40:57'),(23,'MSPRO22','Giày nike 22',1,0,'default.jpg','san pham',1,'giay-nike-22','2020-02-15 02:40:59','2020-02-15 02:40:59'),(24,'MSPRO23','Giày nike 23',1,0,'default.jpg','san pham',1,'giay-nike-23','2020-02-15 02:41:00','2020-02-15 02:41:00'),(25,'MSPRO24','Giày nike 24',1,0,'default.jpg','san pham',1,'giay-nike-24','2020-02-15 02:41:02','2020-02-15 02:41:02'),(26,'MSPRO25','Giày nike 25',1,0,'default.jpg','san pham',1,'giay-nike-25','2020-02-15 02:41:04','2020-02-15 02:41:04'),(27,'MSPRO26','Giày nike 26',1,0,'default.jpg','san pham',1,'giay-nike-26','2020-02-15 02:41:05','2020-02-15 02:41:05'),(28,'MSPRO27','Giày nike 27',1,0,'default.jpg','san pham',1,'giay-nike-27','2020-02-15 02:41:07','2020-02-15 02:41:07'),(29,'MSPRO28','Giày nike 28',1,0,'default.jpg','san pham',1,'giay-nike-28','2020-02-15 02:41:08','2020-02-15 02:41:08'),(30,'MSPRO29','Giày nike 29',1,0,'default.jpg','san pham',1,'giay-nike-29','2020-02-15 02:41:10','2020-02-15 02:41:10'),(31,'MSPRO30','Giày nike êm đẹp chạy bộ',1,0,'1582443860.PNG','<p>san pham</p>',1,'giay-nike-em-dep-chay-bo','2020-02-15 02:41:11','2020-02-23 07:44:20'),(32,'MSPRO31','Giày lười đẹp',1,0,'1582443836.PNG','<p>san pham</p>',1,'giay-luoi-dep','2020-02-15 02:41:12','2020-02-23 07:43:56'),(33,'MSPRO32','Giày nike chạy bộ đen',1,0,'1582443815.PNG','<p>san pham</p>',1,'giay-nike-chay-bo-den','2020-02-15 02:41:14','2020-02-23 07:43:35'),(34,'MSPRO33','Giày nike air cổ thấp',1,0,'1582443786.PNG','<p>san pham</p>',1,'giay-nike-air-co-thap','2020-02-15 02:41:16','2020-02-23 07:43:06'),(35,'MSPRO34','Giày nike chạy bộ',1,0,'1582443760.PNG','<p>san pham</p>',1,'giay-nike-chay-bo','2020-02-15 02:41:18','2020-02-23 07:42:40'),(36,'MSPRO35','Giày Profile đen',1,0,'1582443729.jpg','<p>san pham</p>',1,'giay-profile-den','2020-02-15 02:41:19','2020-02-23 07:42:09'),(37,'MSPRO36','Giày profile xám đẹp',1,0,'1582443707.jpg','<p>san pham</p>',1,'giay-profile-xam-dep','2020-02-15 02:41:21','2020-02-23 07:41:47'),(38,'MSPRO37','Giày addias đẹp',1,0,'1582443663.jpg','<p>san pham</p>',1,'giay-addias-dep','2020-02-15 02:41:23','2020-02-23 07:41:03'),(39,'MSPRO38','Giày puma trắng',1,0,'1582443632.jpg','<p>san pham</p>',1,'giay-puma-trang','2020-02-15 02:41:24','2020-02-23 07:40:32'),(40,'MSPRO39','Giày puma da đẹp',1,0,'1582443592.jpg','<p>san pham</p>',1,'giay-puma-da-dep','2020-02-15 02:41:26','2020-02-23 07:39:52'),(41,'MSPRO40','Giày convert cổ thấp',1,0,'1582443520.jpg','<p>san pham</p>',1,'giay-convert-co-thap','2020-02-15 02:41:27','2020-02-23 07:38:40'),(42,'MSPRO41','Giày Convert',1,0,'1582443499.jpg','<p>san pham</p>',1,'giay-convert','2020-02-15 02:41:29','2020-02-23 07:38:19'),(43,'MSPRO42','Giày MC Qeen',1,0,'1582443476.jpg','<p>san pham</p>',1,'giay-mc-qeen','2020-02-15 02:41:30','2020-02-23 07:37:56'),(44,'MSPRO43','Giày nike profile đẹp',1,0,'1582443448.jpg','<p>san pham</p>',1,'giay-nike-profile-dep','2020-02-15 02:41:32','2020-02-23 07:37:28'),(45,'MSPRO44','Giày nike anphalbounce',1,0,'1582443405.PNG','<p>san pham</p>',1,'giay-nike-anphalbounce','2020-02-15 02:41:33','2020-02-23 07:36:45'),(46,'MSPRO45','Giày nike Yz700',1,0,'1582443356.jpg','<p>san pham</p>',1,'giay-nike-yz700','2020-02-15 02:41:35','2020-02-23 07:35:56'),(47,'MSPRO46','Giày nike yz350',1,0,'1582443339.jpg','<p>san pham</p>',1,'giay-nike-yz350','2020-02-15 02:41:37','2020-02-23 07:35:39'),(48,'MSPRO47','Giày nike ari cổ cao',1,0,'1582443290.jpg','<p>san pham</p>',1,'giay-nike-ari-co-cao','2020-02-15 02:41:39','2020-02-23 07:34:50'),(49,'MSPRO48','Giày balenciaga rep 1:1',1,0,'1582443161.jpg','<p>san pham</p>',1,'giay-balenciaga-rep-11','2020-02-15 02:41:40','2020-02-23 07:32:41'),(50,'BLR1','Giày balenciaga Rep +',1,0,'1582006852.','<p>Gi&agrave;y balenciage đẹp m&ecirc; ngừoi</p>',1,'giay-balenciaga-rep','2020-02-15 02:41:41','2020-02-18 06:20:52');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
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
INSERT INTO `role_has_permissions` VALUES (25,1),(26,1),(27,1),(28,1),(17,2),(18,2),(19,2),(20,2),(5,3),(6,3),(7,3),(8,3),(1,4),(2,4),(3,4),(4,4),(29,5),(30,5),(31,5),(32,5),(13,6),(14,6),(15,6),(16,6),(21,7),(22,7),(23,7),(24,7),(9,8),(10,8),(11,8),(12,8),(33,9);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'MANAGE USER','web','2020-02-15 02:40:15','2020-02-15 02:40:15'),(2,'MANAGE PRODUCT','web','2020-02-15 02:40:15','2020-02-15 02:40:15'),(3,'MANAGE CATEGORY','web','2020-02-15 02:40:16','2020-02-15 02:40:16'),(4,'MANAGE BRAND','web','2020-02-15 02:40:16','2020-02-15 02:40:16'),(5,'MANAGE ORDER','web','2020-02-15 02:40:16','2020-02-15 02:40:16'),(6,'MANAGE ROLE','web','2020-02-15 02:40:16','2020-02-15 02:40:16'),(7,'MANAGE SLIDE','web','2020-02-15 02:40:16','2020-02-15 02:40:16'),(8,'MANAGE COUPON','web','2020-02-15 02:40:16','2020-02-15 02:40:16'),(9,'CUSTOMER','web','2020-02-15 02:40:16','2020-02-15 02:40:16');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slides` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` smallint NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Hạ Huy','1582011466.jpg','0337172888',1,'admin@admin.com','ha noi',NULL,'$2y$10$dMf/dq2Xe2r8kAnY9iiNm.MJMmW74zYfAVQclEr1kwxba0uUWjCv.',NULL,'2020-02-15 02:40:07','2020-02-18 07:37:47',NULL,NULL),(2,'Jovan Fay','default.jpg','03371112000',1,'jeremy39@example.com','7932 Giovanny Place Suite 044\nNew Elwin, GA 47867','2020-02-15 02:40:07','$2y$10$fwaKM8wMgz.Ltvtpn/egHupFaIPvGXVi8vRC1XHpjtXcP4QPAX.wG','alBqnvxMfU','2020-02-15 02:40:08','2020-02-15 02:40:08',NULL,NULL),(3,'Delta Schuster','default.jpg','03371112000',1,'waino08@example.com','2500 Crona Corners\nLake Koby, NC 26575','2020-02-15 02:40:07','$2y$10$wNmOLYHE6ffLueaMCGtl9uehNcdsFAI2O49e3L.crHwt1E/fZdqCS','AbrHC2NwRX','2020-02-15 02:40:08','2020-02-15 02:40:08',NULL,NULL),(4,'Elisabeth Wintheiser','default.jpg','03371112000',1,'wyundt@example.org','289 Bernier Knolls Apt. 663\nLake Jarod, CO 34650','2020-02-15 02:40:07','$2y$10$elevpzSVL7FSh2wpoVUdkO3vN.wwe8/Lo29vYBPQINyzg/UTs5gxy','PTuGM04Y9a','2020-02-15 02:40:08','2020-02-15 02:40:08',NULL,NULL),(5,'Carleton Boehm','default.jpg','03371112000',1,'windler.gonzalo@example.com','29179 Maya Curve\nReichelland, WA 06124','2020-02-15 02:40:07','$2y$10$DeHBN.0mgtoQXQ2NZQHz7.z9/k91Gzcq7fEuut2DPJzAIIKeEpEoC','1ORY6p0cgF','2020-02-15 02:40:09','2020-02-15 02:40:09',NULL,NULL),(6,'Susana Tromp','default.jpg','03371112000',1,'dane46@example.com','10105 Upton Hill Suite 798\nNorth Otis, LA 08350','2020-02-15 02:40:08','$2y$10$.c/lDhxgmqVh/xRc7I.wOuiJqAVuGxHzRqqUELNTJSen5y9Ga0fLm','SAK9lSwj2J','2020-02-15 02:40:09','2020-02-15 02:40:09',NULL,NULL),(7,'Prof. Kathryn Mitchell','default.jpg','03371112000',1,'wbauch@example.net','110 Ella Trace Suite 960\nO\'Connerton, ND 12065','2020-02-15 02:40:08','$2y$10$WUCSjM6J/efQIBefsbAFOOEgZ/n3X0q25z2B.E3TMRWE106PPNayG','XmEBKxjMbx','2020-02-15 02:40:09','2020-02-15 02:40:09',NULL,NULL),(8,'Prof. Ronaldo Dicki Sr.','default.jpg','03371112000',1,'therese.reichel@example.com','69739 Green Pass Apt. 024\nSouth Aisha, CA 01292','2020-02-15 02:40:08','$2y$10$BHMU6DGfteclajdEJlOCpuCjoWjCJ1axLxKRtAd/2kfUfll0eusQ2','ljRgxYhOta','2020-02-15 02:40:09','2020-02-15 02:40:09',NULL,NULL),(9,'Dion Legros','default.jpg','03371112000',1,'arnoldo.jacobson@example.com','490 Kertzmann Springs\nPort Imaniberg, AZ 36384-2917','2020-02-15 02:40:08','$2y$10$lFkDkfE/xodIA9/WWWkiMeyipgUUU7wSV.BmfU5OPQ/L8Z9Ho0e5G','Uoyvjgzad2','2020-02-15 02:40:09','2020-02-15 02:40:09',NULL,NULL),(10,'Jeanie Hand','default.jpg','03371112000',1,'juvenal.von@example.net','4462 Forrest Hollow Suite 309\nWilltown, IN 43203-6017','2020-02-15 02:40:08','$2y$10$WTSCj.v24R.9tMNzReCdCOepof6EYlmIQfGnyDdSMp.YdIwEF5gve','JZY84K2QKp','2020-02-15 02:40:09','2020-02-15 02:40:09',NULL,NULL),(11,'Destiny Kuvalis','default.jpg','03371112000',1,'kbradtke@example.net','7278 Donnelly River\nPort Roderickstad, OK 28848-7871','2020-02-15 02:40:08','$2y$10$NRdYj8kyZMHLkIVdTsboLODEpyd8pNvXVfiCpEHTJvmVBxWgk1leS','N56KNYoUiL','2020-02-15 02:40:09','2020-02-15 02:40:09',NULL,NULL),(12,'Huy Quang','default.jpg','033xxxxxxxx',1,'xemmer1999@gmail.com',NULL,NULL,'$2y$10$J3akLl1vYqwJgtura86NaOFz7qAo60SV3c/Ev/KfJDviImyPJN6MS',NULL,'2020-03-04 06:07:11','2020-03-04 06:07:11','100889390191193742513',NULL),(13,'Hạ Huy','default.jpg','033xxxxxxxx',1,'haqhuy1999@gmail.com',NULL,NULL,'$2y$10$8RHr97mab1IdXqPAtdpqAO5nhmh9R.g58o6ci8QHPfmxVwiTAsHwG',NULL,'2020-03-04 06:54:30','2020-03-04 06:54:30',NULL,'1121900938157186'),(14,'Hạ Huy','default.jpg','033xxxxxxxx',1,'haqhuy99.wd@gmail.com',NULL,NULL,'$2y$10$tJDeGLjHQsC46aGTOxlQ0uEjqtXTRfHVkoGKANijCbS4.mv1MSz/C',NULL,'2020-03-11 03:33:22','2020-03-11 03:33:22','107150773606297716178',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'shoes_shop'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-04 22:41:45
