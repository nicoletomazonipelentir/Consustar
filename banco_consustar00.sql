-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: consustar
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horarios` (
  `id` date DEFAULT NULL,
  `horario` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES ('2023-11-27','09:00'),('2023-11-27','09:40'),('2023-11-27','10:20'),('2023-11-27','11:00'),('2023-11-27','11:20'),('2023-11-27','11:40'),('2023-11-27','13:00'),('2023-11-27','13:20'),('2023-11-27','13:40'),('2023-11-27','14:00'),('2023-11-27','14:20'),('2023-11-27','14:40'),('2023-11-27','15:00'),('2023-11-27','15:20'),('2023-11-27','15:40'),('2023-11-27','16:00'),('2023-11-27','16:20'),('2023-11-27','16:40'),('2023-11-28','08:00'),('2023-11-28','08:20'),('2023-11-28','08:40'),('2023-11-28','09:00'),('2023-11-28','09:20'),('2023-11-28','09:40'),('2023-11-28','10:00'),('2023-11-28','10:20'),('2023-11-28','10:40'),('2023-11-28','11:00'),('2023-11-28','11:20'),('2023-11-28','11:40'),('2023-11-28','13:00'),('2023-11-28','13:20'),('2023-11-28','13:40'),('2023-11-28','14:00'),('2023-11-28','14:20'),('2023-11-28','14:40'),('2023-11-28','15:00'),('2023-11-28','15:20'),('2023-11-28','15:40'),('2023-11-28','16:00'),('2023-11-28','16:20'),('2023-11-28','16:40'),('2023-11-28','08:00'),('2023-11-28','08:20'),('2023-11-28','08:40'),('2023-11-28','09:00'),('2023-11-28','09:20'),('2023-11-28','09:40'),('2023-11-28','10:00'),('2023-11-28','10:20'),('2023-11-28','10:40'),('2023-11-28','11:00'),('2023-11-28','11:20'),('2023-11-28','11:40'),('2023-11-28','13:00'),('2023-11-28','13:20'),('2023-11-28','13:40'),('2023-11-28','14:00'),('2023-11-28','14:20'),('2023-11-28','14:40'),('2023-11-28','15:00'),('2023-11-28','15:20'),('2023-11-28','15:40'),('2023-11-28','16:00'),('2023-11-28','16:20'),('2023-11-28','16:40'),('2023-11-29','08:00'),('2023-11-29','08:20'),('2023-11-29','08:40'),('2023-11-29','09:00'),('2023-11-29','09:20'),('2023-11-29','09:40'),('2023-11-29','10:00'),('2023-11-29','10:20'),('2023-11-29','10:40'),('2023-11-29','11:00'),('2023-11-29','11:20'),('2023-11-29','11:40'),('2023-11-29','13:00'),('2023-11-29','13:20'),('2023-11-29','13:40'),('2023-11-29','14:00'),('2023-11-29','14:20'),('2023-11-29','14:40'),('2023-11-29','15:00'),('2023-11-29','15:20'),('2023-11-29','15:40'),('2023-11-29','16:00'),('2023-11-29','16:20'),('2023-11-29','16:40'),('2023-11-27','08:20'),('2023-11-27','09:20');
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pacientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `horario` varchar(5) NOT NULL,
  `dia` date NOT NULL,
  `cpf` char(14) NOT NULL,
  `carteira_sus` varchar(15) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `carteira_sus` (`carteira_sus`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(8) NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `numCarteira` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2023-11-27 17:56:40
