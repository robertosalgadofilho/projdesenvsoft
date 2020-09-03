-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: bdvendas
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `nomeCliente` varchar(45) DEFAULT NULL,
  `eMailCliente` varchar(20) DEFAULT NULL,
  `enderecoCliente` varchar(45) DEFAULT NULL,
  `telefoneCliente` varchar(15) DEFAULT NULL,
  `estadoCliente` varchar(20) DEFAULT NULL,
  `paisCliente` varchar(25) DEFAULT NULL,
  `cepCliente` varchar(15) DEFAULT NULL,
  `cpfCliente` varchar(20) DEFAULT NULL,
  `rgCliente` varchar(20) DEFAULT NULL,
  `senhaCliente` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (9,'Amanda','amanda@gmail.com','AV. A, 221','987654321','RS','Brasil','90040331','7015014032','1045063291','******');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalhespedido`
--

DROP TABLE IF EXISTS `detalhespedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalhespedido` (
  `iddetalhespedido` int NOT NULL,
  `idPedido` int DEFAULT NULL,
  `idProduto` int DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `precoUnitario` decimal(10,0) DEFAULT NULL,
  `desconto` decimal(2,0) DEFAULT NULL,
  PRIMARY KEY (`iddetalhespedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalhespedido`
--

LOCK TABLES `detalhespedido` WRITE;
/*!40000 ALTER TABLE `detalhespedido` DISABLE KEYS */;
INSERT INTO `detalhespedido` VALUES (1,1,19,1,30,NULL),(2,1,21,1,3199,NULL);
/*!40000 ALTER TABLE `detalhespedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido` (
  `idpedido` int NOT NULL AUTO_INCREMENT,
  `idCliente` int DEFAULT NULL,
  `dataPedido` date DEFAULT NULL,
  `tipoPagamento` varchar(45) DEFAULT NULL,
  `anotacoes` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpedido`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,9,'2020-07-12','cartão',NULL),(2,9,'2020-07-13','dinheiro',NULL),(3,9,'2020-07-14','cartão',NULL);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto` (
  `idProduto` int NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(45) NOT NULL,
  `descricaoProduto` varchar(200) NOT NULL,
  `custoProduto` decimal(10,0) NOT NULL,
  `qtdadeProduto` int DEFAULT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (19,'Mouse','Mouse Sem Fio 2.4GHZ USB Branco - MO286',30,10),(20,'Notebook','Notebook Lenovo Dual Core 4GB 500GB Tela 15.6” Windows 10 Ideapad S145',2399,5),(21,'Notebook','Notebook Samsung Book E30 Intel Core i3-10110U 10ª Geração 4GB 1TB 15.6\'\' Windows 10 Home NP550XCJ-KT1BR - Prata',3199,8);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-23 21:13:43
