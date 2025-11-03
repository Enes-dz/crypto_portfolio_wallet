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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chains`
--

LOCK TABLES `chains` WRITE;
/*!40000 ALTER TABLE `chains` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crypto`
--

LOCK TABLES `crypto` WRITE;
/*!40000 ALTER TABLE `crypto` DISABLE KEYS */;
/*!40000 ALTER TABLE `crypto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crypto_chain_wallets`
--

DROP TABLE IF EXISTS `crypto_chain_wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `crypto_chain_wallets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wallet_id` int(10) unsigned DEFAULT NULL,
  `crypto_chain_id` int(10) unsigned DEFAULT NULL,
  `balance` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crypto_chain_wallets_crypto_chains_FK` (`crypto_chain_id`),
  KEY `crypto_chain_wallets_wallets_FK` (`wallet_id`),
  CONSTRAINT `crypto_chain_wallets_crypto_chains_FK` FOREIGN KEY (`crypto_chain_id`) REFERENCES `crypto_chains` (`id`),
  CONSTRAINT `crypto_chain_wallets_wallets_FK` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crypto_chain_wallets`
--

LOCK TABLES `crypto_chain_wallets` WRITE;
/*!40000 ALTER TABLE `crypto_chain_wallets` DISABLE KEYS */;
/*!40000 ALTER TABLE `crypto_chain_wallets` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crypto_chains`
--

LOCK TABLES `crypto_chains` WRITE;
/*!40000 ALTER TABLE `crypto_chains` DISABLE KEYS */;
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
  `user_id` int(10) unsigned DEFAULT NULL,
  `crypto_chains_wallets_id` int(10) unsigned DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_balances_users_FK` (`user_id`),
  KEY `user_balances_crypto_chain_wallets_FK` (`crypto_chains_wallets_id`),
  CONSTRAINT `user_balances_crypto_chain_wallets_FK` FOREIGN KEY (`crypto_chains_wallets_id`) REFERENCES `crypto_chain_wallets` (`id`),
  CONSTRAINT `user_balances_users_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_balances`
--

LOCK TABLES `user_balances` WRITE;
/*!40000 ALTER TABLE `user_balances` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_wallets`
--

LOCK TABLES `user_wallets` WRITE;
/*!40000 ALTER TABLE `user_wallets` DISABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test','test_username','test@test.com','test_username','test_pass');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallets`
--

LOCK TABLES `wallets` WRITE;
/*!40000 ALTER TABLE `wallets` DISABLE KEYS */;
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

-- Dump completed on 2025-11-02 21:58:21
