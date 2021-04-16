-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: maytinh
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'Samsung'),(2,'Kingston'),(3,'Apple'),(4,'Asus'),(6,'Watermelonn');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `type_id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(40) DEFAULT NULL,
  `type_description` varchar(255) DEFAULT NULL,
  `type_img` text,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'PC','Máy tính','1616501748.png'),(2,'laptop','Laptop nhỏ gọn','collection-1.png'),(3,'Tablet','Máy tính bảng','collection-2.png');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id_cmt` int NOT NULL AUTO_INCREMENT,
  `id_customer` int DEFAULT NULL,
  `id_product` int DEFAULT NULL,
  `comments_detail` varchar(255) DEFAULT NULL,
  `comments_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cmt`),
  KEY `id_customer` (`id_customer`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (57,14,50,'Sản phẩm hay đấy','2021-03-22 18:43:29'),(58,1,52,'Bao giờ có hàng vậy','2021-03-22 19:09:57'),(60,4,39,'Sản phẩm rất tốt','2021-03-23 18:20:33'),(62,4,38,'Tuyệt vời','2021-03-23 18:35:32'),(64,4,57,'sp rất tuyệt','2021-03-23 19:52:56'),(68,2,57,'Mãi chưa có hàng thế','2021-04-03 00:21:34'),(69,2,57,'Nhập hàng đi','2021-04-03 00:21:41'),(70,3,57,'Nhập đi','2021-04-03 00:21:58'),(71,3,57,'phân trang','2021-04-03 00:22:02'),(72,3,57,'PHÂN','2021-04-03 00:22:07');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controladmin`
--

DROP TABLE IF EXISTS `controladmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `controladmin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(40) DEFAULT NULL,
  `admin_password` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controladmin`
--

LOCK TABLES `controladmin` WRITE;
/*!40000 ALTER TABLE `controladmin` DISABLE KEYS */;
INSERT INTO `controladmin` VALUES (1,'baodepzai','123456');
/*!40000 ALTER TABLE `controladmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `id_customer` int NOT NULL AUTO_INCREMENT,
  `customer_username` char(40) DEFAULT NULL,
  `customer_password` tinytext,
  `customer_name` varchar(40) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `customer_phone` tinytext,
  PRIMARY KEY (`id_customer`),
  UNIQUE KEY `customer_username` (`customer_username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'baodepzai','123456789','Hoàng Gia Bảo','HN-Ba Đình','975128208'),(2,'congdat','123456789','Nguyễn Công Đạt','HN','12345678'),(3,'fancyboy','123456789','Bùi Minh Đức','HN Đống Đaa','0975128204'),(4,'nauq123','123456789','Mạnh Quân','Thái Bình','123456788'),(5,'manhtien','1234567899','Đỗ Mạnh Tiến','Phú Thọ','358588401'),(6,'sieunhan','123456Bao','Siêu nhân','KKKK','15632'),(7,'sieunhan123','bdz123456','Hoàng Gia Bảo','HN-BĐ','975128204'),(8,'congnghia','123456789','Nghĩa Trần','HN','123456789'),(9,'sonduong','123456789','Nguyễn Quý Sơn Dương','Bên kia HN','123456'),(10,'ducanh','123456789','Đức Anh Pro','Hoàng Hoa Thám','123456'),(11,'viettung','123456789','Việt Tùng','Phú Thọ','843273223'),(12,'minhhieu','123456789','Minh Hiếu','HN','123456'),(13,'phuongnguyen','123456789','Phương Nguyễn','HN-Ba Đình','123456789'),(14,'hieuhoang','123456789','Hiếu','HN','123456789'),(15,'baodepzai123','123456789','Gia Bảo','HN','975128204'),(16,'maiktra','1234567899','Dra','HN','975128204'),(17,'ian','123456789b','Cruel','HN','0975128204');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice` (
  `id_invoice` int NOT NULL AUTO_INCREMENT,
  `id_customer` int DEFAULT NULL,
  `invoice_date` datetime DEFAULT NULL,
  `invoice_note` varchar(255) DEFAULT NULL,
  `invoice_total` varchar(255) DEFAULT NULL,
  `invoice_name` varchar(50) DEFAULT NULL,
  `invoice_address` varchar(250) DEFAULT NULL,
  `invoice_payment` int DEFAULT NULL,
  `invoice_phone` tinytext,
  `invoice_status` int DEFAULT NULL,
  PRIMARY KEY (`id_invoice`),
  KEY `id_customer` (`id_customer`),
  KEY `fk_payment_id` (`invoice_payment`),
  CONSTRAINT `fk_payment_id` FOREIGN KEY (`invoice_payment`) REFERENCES `payment` (`id_payment`),
  CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (35,1,'2021-03-19 20:42:31','Ship buổi chiều nhé','8,836,000','Hoàng Gia Bảo','HN-Ba Đình',1,'975128204',1),(36,13,'2021-03-19 20:44:48','Ship vào lúc tối','6,600,000','Phương','HN-Ba Đình',1,'975128204',0),(37,13,'2021-03-19 20:55:16','Giao trước 8h','1,805,000','Phương','HN-BĐ',1,'975128204',1),(38,3,'2021-03-19 22:36:13','Ship trước chiều ngày mai','33,690,000','Bùi Minh Đức','Đống Đa',1,'123456789',1),(39,9,'2021-03-19 22:54:20','Ship trước chiều ngày mai','5,360,000','Sơn Dương','Bên kia HN',1,'123456789',1),(40,5,'2021-03-19 23:00:07','Ship trước 5h ngày mai','32,460,000','Mạnh Tiến','HN',1,'123456789',1),(41,5,'2021-03-19 23:02:40','Ship nhanh nhé','2,997,000','Tiến','HN',1,'123456789',0),(42,5,'2021-03-19 23:04:27','Ship đi','4,000,000','Tiến','HN',1,'9384938',0),(43,5,'2021-03-19 23:05:02','HN','150,000','Bố mẹ','HN',1,'374637467',1),(44,5,'2021-03-19 23:13:11','Ship trước 5h ngày mai','1,998,000','Bố mẹ','HN',1,'123456789',0),(46,3,'2021-03-22 14:49:25','Ship nhanh','5,460,000','Bùi Minh Đức','HN',1,'123456789',1),(47,3,'2021-03-22 14:53:11','HN nghìn năm văn vở','1,232,134','Bố mẹ','HN',1,'123456789',1),(48,14,'2021-03-22 18:52:35','Ship trước ngày mai nhé','3,160,000','Hiếu','HN',1,'123456789',0),(49,1,'2021-03-22 19:11:33','ĐÀO TẤN RULE','15,000,000','Bảo','HN',1,'975128204',0),(50,1,'2021-03-22 23:08:13','Ship nhanh','1,580,000','Bảo','HN',1,'975128204',1),(51,4,'2021-03-23 18:30:41','Ship trước 5h ngày mai','3,160,000','Nguyễn Mạnh Quân','HN',1,'123456789',1),(52,4,'2021-03-23 18:35:08','OK OK OK','2,999,000','Mạnh Quân','HN',1,'123456789',1),(53,15,'2021-03-23 21:10:42','Ship trước 5h chiều ngày mai','23,580,000','Gia Bảo','HN',1,'975128204',1),(54,15,'2021-03-23 21:17:33','HN nghìn năm','11,000,000','Gia Bảo','HN',1,'975128204',0),(55,1,'2021-03-28 20:45:57','Ship 5h trước  ngày mai','33,000,000','Bảo','HN',1,'975128204',0),(56,16,'2021-04-03 00:18:44','Mai báo cáo thực tập','11,000,000','Dũng','HN',1,'975128204',0),(57,3,'2021-04-03 00:35:56','HN','1,560,000','Bùi Minh Đức','HN Đống Đa',1,'975128204',1),(58,3,'2021-04-03 00:39:15','HN','4,680,000','Bùi Minh Đức','HN Đống Đa',1,'0975128204',1),(59,3,'2021-04-03 10:37:38','Hello','11,000,000','Đức','HN',1,'0975128204',0);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_detail`
--

DROP TABLE IF EXISTS `invoice_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_detail` (
  `id_detail` int NOT NULL AUTO_INCREMENT,
  `id_invoice` int DEFAULT NULL,
  `id_product` int DEFAULT NULL,
  `detail_quantity` int DEFAULT NULL,
  `detail_price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `id_invoice` (`id_invoice`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `invoice_detail_ibfk_1` FOREIGN KEY (`id_invoice`) REFERENCES `invoice` (`id_invoice`),
  CONSTRAINT `invoice_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_detail`
--

LOCK TABLES `invoice_detail` WRITE;
/*!40000 ALTER TABLE `invoice_detail` DISABLE KEYS */;
INSERT INTO `invoice_detail` VALUES (15,35,38,4,'3996000'),(16,35,32,4,'3610000'),(17,35,31,1,'1230000'),(18,36,37,3,'3000000'),(19,36,39,3,'3600000'),(20,37,32,2,'1805000'),(21,38,31,3,'3690000'),(22,38,49,2,'30000000'),(23,39,37,5,'5000000'),(24,39,34,3,'360000'),(25,40,49,2,'30000000'),(26,40,31,2,'2460000'),(27,41,38,3,'2997000'),(28,42,33,4,'4000000'),(29,43,44,1,'150000'),(30,44,38,2,'1998000'),(31,46,37,3,'3000000'),(32,46,31,2,'2460000'),(33,47,35,1,'1232134'),(34,48,50,2,'3160000'),(35,49,52,1,'15000000'),(36,50,50,1,'1580000'),(37,51,50,2,'3160000'),(38,52,33,2,'2000000'),(39,52,38,1,'999000'),(40,53,57,2,'22000000'),(41,53,50,1,'1580000'),(42,54,57,1,'11000000'),(43,55,57,3,'33000000'),(44,56,57,1,'11000000'),(45,57,53,1,'1560000'),(46,58,53,3,'4680000'),(47,59,57,1,'11000000');
/*!40000 ALTER TABLE `invoice_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `id_payment` int NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,'Thanh toán tại nơi');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id_product` int NOT NULL AUTO_INCREMENT,
  `product_type` int DEFAULT NULL,
  `product_name` varchar(40) NOT NULL,
  `product_img` text,
  `product_ram` varchar(20) DEFAULT NULL,
  `product_cpu` varchar(20) DEFAULT NULL,
  `product_description` varchar(100) DEFAULT NULL,
  `product_price` int NOT NULL,
  `product_status` int NOT NULL,
  `product_brand` int DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  KEY `product_type` (`product_type`),
  KEY `fk_brand_id` (`product_brand`),
  CONSTRAINT `fk_brand_id` FOREIGN KEY (`product_brand`) REFERENCES `brand` (`brand_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_type`) REFERENCES `category` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (31,3,'Tablet-3321','1615461624.jpg','Ram 18gb','Cpu 3.7 ghz','Máy nhẹ',1230000,0,3),(32,1,'PC-4782','1615631482.jpg','Ram 64gb','CPU-9 4ghz','Máy cực khỏe, siêu phẩm',902500,0,4),(33,2,'Laptop-12ll3','1615631542.jpg','Ram 8gb','CPU-3 3.5ghz','Máy nhẹ, giá rẻ',1000000,1,6),(34,3,'Tablet-33A5','1615632547.png','Ram 4gb','Cpu 3.5 ghz','nhỏ gọn',120000,0,4),(35,3,'tablet-415B','1615632618.jpg','Ram 19GB','Cpu 3.5 ghz','nhỏ gọn',1232134,0,4),(37,1,'PC-41JK','1615632748.png','Ram 16gb','Cpu 3.7 ghz','Máy khỏe',1000000,0,4),(38,1,'PC-410H','1615632951.png','Ram 12gb','CPU-9 4ghz','Máy siêu nhanh',999000,1,4),(39,2,'Laptop-12OL','1615633005.png','Ram 16gb','CPU-3 4ghz','Máy cực nhẹ',1200000,1,4),(44,1,'PC-41JK','1615713042.png','Ram 16gb','CPU-9 4ghz','Máy khỏe',150000,1,4),(46,1,'PC-410A','1616008122.jpg','Ram 16gb','Cpu 3.7 ghz','Máy tính giả lập',7800000,1,4),(49,1,'PC-400A','1616168097.png','Ram 16gb','Cpu 3.7 ghz','Máy tính giả lập',15000000,1,2),(50,3,'tablet-21GL','1616398927.jpg','Ram 18gb','CPU-9 4ghz','Nhỏ gọn',1580000,1,1),(52,2,'Laptop-1IP4','1616414975.png','Ram 18gb','Cpu 3.5 ghz','Laptop nhỏ gọn',15000000,0,4),(53,1,'PC-42OP','1616500255.jpg','Ram 16gb','CPU-9 4ghz','Máy tính giả lập',1560000,1,1),(55,2,'Laptop-16KL','1616500609.png','Ram 16gb','Cpu 3.7 ghz','Laptop nhỏ gọn',1600000,0,2),(57,2,'Laptop-1200','1616500699.png','Ram 16gb','CPU-9 4ghz','Laptop nhỏ gọn',11000000,1,3),(64,1,'PC-OOPP','1617420737.png','Ram 16gb','CPU-9 4ghz','Máy tính giả lập',15000000,1,1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slide` (
  `id_slide` int NOT NULL AUTO_INCREMENT,
  `slide_content` varchar(255) DEFAULT NULL,
  `slide_img` text,
  PRIMARY KEY (`id_slide`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slide`
--

LOCK TABLES `slide` WRITE;
/*!40000 ALTER TABLE `slide` DISABLE KEYS */;
INSERT INTO `slide` VALUES (1,'Đón đầu xu hướng công nghệ','1616403042.jpg'),(2,'Luôn luôn đổi mới, tối ưu sản phẩm','1616404118.jpg'),(4,'Xu hướng công nghệ dẫn đầu','1616498000.jpg'),(6,'Xu hướng công nghệ dẫn đầu','1617384414.jpg'),(7,'Đón đầu xu hướng công nghệ','1617420978.jpg');
/*!40000 ALTER TABLE `slide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'maytinh'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-12 19:03:22
