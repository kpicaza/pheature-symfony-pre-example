-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: amigunerumi
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pheature_toggles`
--

DROP TABLE IF EXISTS `pheature_toggles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pheature_toggles` (
  `feature_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `strategies` json NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`feature_id`),
  KEY `IDX_592B07D98B8E8428` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pheature_toggles`
--

LOCK TABLES `pheature_toggles` WRITE;
/*!40000 ALTER TABLE `pheature_toggles` DISABLE KEYS */;
INSERT INTO `pheature_toggles` VALUES ('admin_dashboard','admin_dashboard',1,'[{\"segments\": [{\"criteria\": [\"developer\"], \"segment_id\": \"is_developer\", \"segment_type\": \"strict_matching_segment\"}], \"strategy_id\": \"enable_for_developers\", \"strategy_type\": \"enable_by_matching_segment\"}]','2021-05-23 19:50:02','2021-05-24 20:43:33'),('show_brand_logo','show_brand_logo',1,'[]','2021-05-23 16:11:52','2021-05-23 19:47:07'),('show_commercial_name','show_commercial_name',1,'[]','2021-05-23 19:35:48','2021-05-23 19:47:31'),('show_contact_info','show_contact_info',1,'[]','2021-05-23 19:47:45','2021-05-23 19:47:48'),('show_home_dynamic_catalog','show_home_dynamic_catalog',1,'[{\"segments\": [{\"criteria\": [\"developer\"], \"segment_id\": \"is_developer\", \"segment_type\": \"strict_matching_segment\"}], \"strategy_id\": \"enable_for_developers\", \"strategy_type\": \"enable_by_matching_segment\"}, {\"segments\": [{\"criteria\": {\"location\": \"barcelona\"}, \"segment_id\": \"barcelona\", \"segment_type\": \"strict_matching_segment\"}, {\"criteria\": {\"location\": \"bilbo\"}, \"segment_id\": \"bilbo\", \"segment_type\": \"strict_matching_segment\"}], \"strategy_id\": \"enable_for_location\", \"strategy_type\": \"enable_by_matching_segment\"}]','2021-05-23 19:44:07','2021-05-24 21:23:42'),('test_toggle','test_toggle',0,'[]','2021-05-24 21:42:42',NULL);
/*!40000 ALTER TABLE `pheature_toggles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-26 18:39:23
