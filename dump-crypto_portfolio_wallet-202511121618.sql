-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: crypto_portfolio_wallet
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `chains`
--

DROP TABLE IF EXISTS `chains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `symbol` varchar(100) DEFAULT NULL,
  `rpc_link` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chains`
--

LOCK TABLES `chains` WRITE;
/*!40000 ALTER TABLE `chains` DISABLE KEYS */;
INSERT INTO `chains` VALUES (1,'Solana','SOL','https://api.mainnet-beta.solana.com');
/*!40000 ALTER TABLE `chains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crypto`
--

DROP TABLE IF EXISTS `crypto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `crypto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `symbol` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crypto`
--

LOCK TABLES `crypto` WRITE;
/*!40000 ALTER TABLE `crypto` DISABLE KEYS */;
INSERT INTO `crypto` VALUES (5,'Jupiter','JUP','#2f4f4f','path_to_JUP_logo');
/*!40000 ALTER TABLE `crypto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crypto_chains`
--

DROP TABLE IF EXISTS `crypto_chains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `crypto_chains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `crypto_id` int(10) unsigned DEFAULT NULL,
  `chain_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crypto_chains_crypto_FK` (`crypto_id`),
  KEY `crypto_chains_chains_FK` (`chain_id`),
  CONSTRAINT `crypto_chains_chains_FK` FOREIGN KEY (`chain_id`) REFERENCES `chains` (`id`),
  CONSTRAINT `crypto_chains_crypto_FK` FOREIGN KEY (`crypto_id`) REFERENCES `crypto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crypto_chains`
--

LOCK TABLES `crypto_chains` WRITE;
/*!40000 ALTER TABLE `crypto_chains` DISABLE KEYS */;
INSERT INTO `crypto_chains` VALUES (1,5,1);
/*!40000 ALTER TABLE `crypto_chains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_balances`
--

DROP TABLE IF EXISTS `user_balances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_balances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_wallets_id` int(10) unsigned DEFAULT NULL,
  `crypto_chains_id` int(10) unsigned DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_balances_crypto_chains_FK` (`crypto_chains_id`),
  KEY `user_balances_user_wallets_FK` (`user_wallets_id`),
  CONSTRAINT `user_balances_crypto_chains_FK` FOREIGN KEY (`crypto_chains_id`) REFERENCES `crypto_chains` (`id`),
  CONSTRAINT `user_balances_user_wallets_FK` FOREIGN KEY (`user_wallets_id`) REFERENCES `user_wallets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_balances`
--

LOCK TABLES `user_balances` WRITE;
/*!40000 ALTER TABLE `user_balances` DISABLE KEYS */;
INSERT INTO `user_balances` VALUES (1,3,1,42);
/*!40000 ALTER TABLE `user_balances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_wallets`
--

DROP TABLE IF EXISTS `user_wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_wallets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `wallet_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_wallets_users_FK` (`user_id`),
  KEY `user_wallets_wallets_FK` (`wallet_id`),
  CONSTRAINT `user_wallets_users_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `user_wallets_wallets_FK` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_wallets`
--

LOCK TABLES `user_wallets` WRITE;
/*!40000 ALTER TABLE `user_wallets` DISABLE KEYS */;
INSERT INTO `user_wallets` VALUES (3,5,3);
/*!40000 ALTER TABLE `user_wallets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'test','test','test@test.com','test','$2y$10$B6y9NUL9cDQwHGvUOK9YZeecDsVRQg2OoOL7EjWBuomD/77vOU8B.','user'),(5,'Enes','Dzihanovic','enes.dzihanovic@stu.ibu.edu.ba','trulexbob','$2y$10$r8FlD3bGu/AWvAXnICAMl.X33RW04ncmI.kiA6S.qnmTzyQ7G/7am','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallets`
--

DROP TABLE IF EXISTS `wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wallets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(100) DEFAULT NULL,
  `seed_phrase` varchar(500) DEFAULT NULL,
  `chain_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wallets_chains_FK` (`chain_id`),
  CONSTRAINT `wallets_chains_FK` FOREIGN KEY (`chain_id`) REFERENCES `chains` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallets`
--

LOCK TABLES `wallets` WRITE;
/*!40000 ALTER TABLE `wallets` DISABLE KEYS */;
INSERT INTO `wallets` VALUES (3,'BfyHkZ3NwxWcWTZsqf9gtSSRD7ZTPCUw','9pwMSBJx4lvYS57q1Vfb4DHz0sYiyGCvjk67sVAecfpRBLiK',1);
/*!40000 ALTER TABLE `wallets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'crypto_portfolio_wallet'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-12 16:18:42
