CREATE DATABASE  IF NOT EXISTS `cashmanha` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cashmanha`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cashmanha
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

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
-- Table structure for table `accesos`
--

DROP TABLE IF EXISTS `accesos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accesos` (
  `idacceso` int(11) NOT NULL AUTO_INCREMENT,
  `fechaacceso` timestamp NOT NULL DEFAULT current_timestamp(),
  `dispositivo` varchar(255) NOT NULL,
  `sistemaoperativo` varchar(255) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  PRIMARY KEY (`idacceso`),
  KEY `accesos_ibfk_1` (`idusuarios`),
  CONSTRAINT `accesos_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accesos`
--

LOCK TABLES `accesos` WRITE;
/*!40000 ALTER TABLE `accesos` DISABLE KEYS */;
INSERT INTO `accesos` VALUES (1,'2022-03-22 05:38:11','SONYVAIO','Windows NT',1),(2,'2022-03-22 05:39:09','SONYVAIO','Windows NT',1),(3,'2022-03-22 05:39:53','SONYVAIO','Windows NT',1),(4,'2022-03-22 05:40:28','SONYVAIO','Windows NT',1),(5,'2022-03-22 05:41:25','SONYVAIO','Windows NT',1),(6,'2022-03-23 02:43:47','SONYVAIO','Windows NT',1),(7,'2022-03-23 02:45:40','SONYVAIO','Windows NT',1),(8,'2022-03-23 03:03:02','SONYVAIO','Windows NT',1),(9,'2022-03-23 03:13:40','SONYVAIO','Windows NT',1),(10,'2022-03-23 03:25:46','SONYVAIO','Windows NT',1),(11,'2022-03-23 03:31:31','SONYVAIO','Windows NT',1),(12,'2022-03-23 03:42:25','SONYVAIO','Windows NT',1),(13,'2022-03-23 03:44:44','SONYVAIO','Windows NT',1),(14,'2022-03-23 03:49:17','SONYVAIO','Windows NT',1),(15,'2022-03-23 03:55:55','SONYVAIO','Windows NT',1),(16,'2022-03-23 05:57:23','SONYVAIO','Windows NT',1),(17,'2022-03-23 05:58:04','SONYVAIO','Windows NT',1),(18,'2022-03-23 05:58:25','SONYVAIO','Windows NT',1),(19,'2022-03-23 06:00:41','SONYVAIO','Windows NT',1),(20,'2022-03-23 06:00:59','SONYVAIO','Windows NT',1),(21,'2022-03-23 06:01:33','SONYVAIO','Windows NT',1),(22,'2022-03-23 06:02:00','SONYVAIO','Windows NT',1),(23,'2022-03-23 05:35:31','SONYVAIO','Windows NT',1),(24,'2022-03-23 05:42:00','SONYVAIO','Windows NT',1),(25,'2022-03-23 05:44:34','SONYVAIO','Windows NT',1),(26,'2022-03-23 06:21:05','SONYVAIO','Windows NT',1),(27,'2022-03-23 06:21:57','SONYVAIO','Windows NT',1),(28,'2022-03-24 02:52:58','SONYVAIO','Windows NT',1),(29,'2022-03-24 02:56:33','SONYVAIO','Windows NT',1),(30,'2022-03-24 03:01:00','SONYVAIO','Windows NT',1),(31,'2022-03-24 03:06:15','SONYVAIO','Windows NT',1),(32,'2022-03-24 03:10:35','SONYVAIO','Windows NT',1),(33,'2022-03-24 03:29:00','SONYVAIO','Windows NT',2),(34,'2022-03-24 03:29:17','SONYVAIO','Windows NT',2),(35,'2022-03-24 03:36:40','SONYVAIO','Windows NT',3),(36,'2022-03-24 03:37:05','SONYVAIO','Windows NT',3),(37,'2022-03-24 03:51:18','SONYVAIO','Windows NT',4),(38,'2022-03-24 03:52:03','SONYVAIO','Windows NT',4),(39,'2022-03-24 04:00:56','SONYVAIO','Windows NT',5),(40,'2022-03-24 04:01:21','SONYVAIO','Windows NT',5),(41,'2022-03-24 04:08:16','SONYVAIO','Windows NT',6),(42,'2022-03-24 04:08:38','SONYVAIO','Windows NT',6),(43,'2022-03-24 04:53:31','SONYVAIO','Windows NT',7),(44,'2022-03-24 04:53:49','SONYVAIO','Windows NT',7),(45,'2022-03-24 04:55:30','SONYVAIO','Windows NT',2),(46,'2022-03-24 04:59:21','SONYVAIO','Windows NT',7),(47,'2022-03-24 05:00:13','SONYVAIO','Windows NT',5),(48,'2022-03-24 05:02:10','SONYVAIO','Windows NT',4),(49,'2022-03-24 05:03:12','SONYVAIO','Windows NT',6),(50,'2022-03-24 05:06:03','SONYVAIO','Windows NT',7),(51,'2022-03-24 05:08:36','SONYVAIO','Windows NT',1),(52,'2022-03-24 05:33:26','SONYVAIO','Windows NT',8),(53,'2022-03-24 05:38:27','SONYVAIO','Windows NT',5),(54,'2022-03-24 05:40:14','SONYVAIO','Windows NT',4),(55,'2022-03-24 05:41:06','SONYVAIO','Windows NT',6),(56,'2022-03-24 05:48:10','SONYVAIO','Windows NT',8),(57,'2022-03-24 05:49:52','SONYVAIO','Windows NT',6),(58,'2022-03-24 05:53:45','SONYVAIO','Windows NT',7),(59,'2022-03-24 06:03:02','SONYVAIO','Windows NT',1),(60,'2022-03-24 06:05:46','SONYVAIO','Windows NT',8),(61,'2022-03-24 06:21:24','SONYVAIO','Windows NT',1),(62,'2022-03-25 02:37:32','SONYVAIO','Windows NT',1),(63,'2022-03-25 02:41:38','SONYVAIO','Windows NT',1),(64,'2022-03-25 03:20:38','SONYVAIO','Windows NT',1),(65,'2022-03-25 03:22:43','SONYVAIO','Windows NT',7),(66,'2022-03-25 03:23:12','SONYVAIO','Windows NT',7),(67,'2022-03-25 03:38:40','SONYVAIO','Windows NT',1),(68,'2022-03-25 03:52:13','SONYVAIO','Windows NT',1),(69,'2022-03-25 04:00:30','SONYVAIO','Windows NT',1),(70,'2022-03-25 04:09:24','SONYVAIO','Windows NT',9),(71,'2022-03-25 04:22:16','SONYVAIO','Windows NT',5),(72,'2022-03-25 04:25:32','SONYVAIO','Windows NT',4),(73,'2022-03-25 04:28:04','SONYVAIO','Windows NT',5),(74,'2022-03-25 04:37:12','SONYVAIO','Windows NT',6),(75,'2022-03-25 04:42:54','SONYVAIO','Windows NT',9),(76,'2022-03-25 04:44:13','SONYVAIO','Windows NT',9),(77,'2022-03-25 04:53:10','SONYVAIO','Windows NT',1),(78,'2022-03-25 05:43:08','SONYVAIO','Windows NT',2),(79,'2022-03-25 05:56:09','SONYVAIO','Windows NT',8),(80,'2022-03-25 06:02:11','SONYVAIO','Windows NT',4),(81,'2022-03-25 06:03:20','SONYVAIO','Windows NT',1),(82,'2022-03-25 06:08:29','SONYVAIO','Windows NT',6),(83,'2022-03-25 06:11:32','SONYVAIO','Windows NT',1),(84,'2022-03-25 07:23:32','SONYVAIO','Windows NT',7),(85,'2022-03-26 02:25:43','SONYVAIO','Windows NT',1),(86,'2022-03-26 02:32:48','SONYVAIO','Windows NT',1),(87,'2022-03-26 03:34:54','SONYVAIO','Windows NT',1),(88,'2022-03-26 03:45:21','SONYVAIO','Windows NT',1),(89,'2022-03-26 03:49:59','SONYVAIO','Windows NT',1),(90,'2022-03-26 03:52:00','SONYVAIO','Windows NT',1),(91,'2022-03-26 05:12:34','SONYVAIO','Windows NT',5),(92,'2022-03-26 05:13:36','SONYVAIO','Windows NT',4),(93,'2022-03-26 05:14:34','SONYVAIO','Windows NT',6),(94,'2022-03-26 10:24:44','SONYVAIO','Windows NT',1),(95,'2022-03-26 10:34:26','SONYVAIO','Windows NT',1),(96,'2022-03-26 10:51:12','SONYVAIO','Windows NT',2),(97,'2022-03-26 10:51:22','SONYVAIO','Windows NT',1),(98,'2022-03-28 10:44:14','SONYVAIO','Windows NT',1),(99,'2022-03-28 11:00:20','SONYVAIO','Windows NT',1),(100,'2022-03-28 11:02:01','SONYVAIO','Windows NT',1),(101,'2022-03-29 02:09:32','SONYVAIO','Windows NT',1),(102,'2022-03-29 02:59:13','SONYVAIO','Windows NT',1),(103,'2022-03-29 03:15:42','SONYVAIO','Windows NT',6),(104,'2022-03-29 10:12:04','SONYVAIO','Windows NT',1),(105,'2022-03-29 11:16:31','SONYVAIO','Windows NT',8),(106,'2022-03-30 02:22:41','SONYVAIO','Windows NT',1),(107,'2022-03-30 02:55:04','SONYVAIO','Windows NT',8),(108,'2022-03-30 03:20:15','SONYVAIO','Windows NT',7),(109,'2022-03-31 02:20:06','SONYVAIO','Windows NT',1),(110,'2022-03-31 05:58:29','SONYVAIO','Windows NT',8),(111,'2022-03-31 06:45:14','SONYVAIO','Windows NT',8),(112,'2022-04-01 01:35:29','SONYVAIO','Windows NT',1),(113,'2022-04-01 02:58:08','SONYVAIO','Windows NT',8),(114,'2022-04-01 05:10:01','SONYVAIO','Windows NT',5),(115,'2022-04-01 05:11:14','SONYVAIO','Windows NT',4),(116,'2022-04-01 05:11:59','SONYVAIO','Windows NT',6),(117,'2022-04-01 05:25:13','SONYVAIO','Windows NT',8),(118,'2022-04-01 05:34:10','SONYVAIO','Windows NT',1),(119,'2022-04-01 06:28:10','SONYVAIO','Windows NT',4),(120,'2022-04-01 06:29:36','SONYVAIO','Windows NT',5),(121,'2022-04-01 06:31:08','SONYVAIO','Windows NT',6),(122,'2022-04-01 06:32:17','SONYVAIO','Windows NT',1),(123,'2022-04-02 01:58:39','SONYVAIO','Windows NT',1),(124,'2022-04-02 02:00:44','SONYVAIO','Windows NT',4),(125,'2022-04-02 02:05:33','SONYVAIO','Windows NT',5),(126,'2022-04-02 02:08:46','SONYVAIO','Windows NT',6),(127,'2022-04-02 02:13:19','SONYVAIO','Windows NT',1),(128,'2022-04-02 02:32:21','SONYVAIO','Windows NT',8),(129,'2022-04-02 02:52:21','SONYVAIO','Windows NT',1),(130,'2022-04-02 06:16:29','SONYVAIO','Windows NT',11),(131,'2022-04-02 06:16:53','SONYVAIO','Windows NT',11),(132,'2022-04-02 06:18:34','SONYVAIO','Windows NT',6),(133,'2022-04-02 06:21:39','SONYVAIO','Windows NT',5),(134,'2022-04-02 06:22:35','SONYVAIO','Windows NT',4),(135,'2022-04-02 06:24:05','SONYVAIO','Windows NT',6),(136,'2022-04-02 06:28:25','SONYVAIO','Windows NT',11),(137,'2022-04-02 06:29:21','SONYVAIO','Windows NT',1),(138,'2022-04-08 05:40:56','LEGION5','Windows NT',1),(148,'2022-04-08 06:15:31','LEGION5','Windows NT',5),(149,'2022-04-08 06:24:06','LEGION5','Windows NT',4),(150,'2022-04-08 06:25:16','LEGION5','Windows NT',6),(151,'2022-04-19 21:55:46','LEGION5','Windows NT',1),(152,'2022-09-06 00:19:15','LEGION5','Windows NT',1),(153,'2022-09-06 00:40:05','LEGION5','Windows NT',6),(154,'2022-09-06 00:41:50','LEGION5','Windows NT',5),(155,'2022-09-06 00:42:29','LEGION5','Windows NT',4),(156,'2022-09-06 00:43:04','LEGION5','Windows NT',6),(157,'2022-09-06 04:49:28','LEGION5','Windows NT',1);
/*!40000 ALTER TABLE `accesos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `codigostransferencias`
--

DROP TABLE IF EXISTS `codigostransferencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `codigostransferencias` (
  `idcodigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigoseguridad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(50) NOT NULL DEFAULT 'Valido',
  `idusuarios` int(11) NOT NULL,
  PRIMARY KEY (`idcodigo`),
  KEY `codigostransferencias_ibfk_1` (`idusuarios`),
  CONSTRAINT `codigostransferencias_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `codigostransferencias`
--

LOCK TABLES `codigostransferencias` WRITE;
/*!40000 ALTER TABLE `codigostransferencias` DISABLE KEYS */;
INSERT INTO `codigostransferencias` VALUES (1,380035,'2022-03-24 06:06:51','Valido',8),(2,670719,'2022-03-25 03:29:12','Valido',7);
/*!40000 ALTER TABLE `codigostransferencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creditos`
--

DROP TABLE IF EXISTS `creditos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `creditos` (
  `idcreditos` int(11) NOT NULL AUTO_INCREMENT,
  `idusuarios` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `tipocliente` varchar(50) NOT NULL,
  `montocredito` decimal(9,2) NOT NULL,
  `interescredito` float NOT NULL,
  `plazocredito` int(11) NOT NULL,
  `cuotamensual` decimal(9,2) NOT NULL,
  `fechasolicitud` date NOT NULL,
  `salariocliente` decimal(9,2) NOT NULL,
  `saldocredito` decimal(15,6) DEFAULT NULL,
  `estado` varchar(30) NOT NULL DEFAULT 'en proceso',
  `observaciones` varchar(1500) DEFAULT NULL,
  `observacion_gerencia` varchar(1500) DEFAULT NULL,
  `observacion_presidencia` varchar(1500) DEFAULT NULL,
  `usuario_empleado` varchar(255) NOT NULL,
  `progreso_solicitud` tinyint(4) NOT NULL DEFAULT 10,
  `progreso_pagocredito` tinyint(4) NOT NULL DEFAULT 0,
  `fecha_ultimarevision` timestamp NULL DEFAULT NULL,
  `usuario_gestionando` varchar(255) DEFAULT NULL,
  `cuotas_generadas` char(2) NOT NULL DEFAULT 'no',
  `copiacontratocliente` varchar(255) DEFAULT NULL,
  `estadocrediticio` varchar(255) NOT NULL DEFAULT 'Nuevo Cliente',
  `proceso_finalizado` char(2) NOT NULL DEFAULT 'no',
  `enviaralhistorico` char(2) NOT NULL DEFAULT 'no',
  `ocultartransacciones_clientes` char(2) NOT NULL DEFAULT 'no',
  `creditoactivo` char(2) NOT NULL DEFAULT 'si',
  PRIMARY KEY (`idcreditos`),
  KEY `idusuarios` (`idusuarios`),
  KEY `idproducto` (`idproducto`),
  CONSTRAINT `creditos_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE,
  CONSTRAINT `creditos_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creditos`
--

LOCK TABLES `creditos` WRITE;
/*!40000 ALTER TABLE `creditos` DISABLE KEYS */;
INSERT INTO `creditos` VALUES (10,1,2,'asalariado',10000.00,10.95,90,155.07,'2022-04-06',2505.88,9333.333334,'aprobado','Cliente cumple con todos los estandares.','aprobado','Aprobado','marco.almagro',100,0,'2022-04-07 17:30:38','ester.cuenca','si','062332_624e77592cd00_ContratoPrPersonal02-03343322-4.pdf','Nuevo Cliente','si','no','no','si'),(11,10,3,'independiente',2950000.00,6.9,15,20408.05,'2022-04-06',95898.88,2884444.444444,'aprobado','Cliente cumple con todos los estandares. Posee una sociedad fuerte.','aprobado','Aprobado','marco.almagro',100,0,'2022-04-07 17:49:53','ester.cuenca','si','062351_624e7beb02acf_ContratoPrHipotecas-00000001-0.pdf','Nuevo Cliente','si','no','no','si'),(12,7,4,'asalariado',45000.00,30.8,90,784.20,'2022-04-07',2500.00,45000.000000,'aprobado','Cumple con todos los estandares','Aprobado','Aprobado','daniel.rivera',100,0,'2022-04-08 06:24:55','ester.cuenca','si','071828_624f81a46e82f_ContratoPrVehiculos-00000000-7.pdf','Nuevo Cliente','si','no','no','si');
/*!40000 ALTER TABLE `creditos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER EnviarSolicitudesCreditosDenegadas_HistoricoCreditos AFTER DELETE ON creditos FOR EACH ROW INSERT INTO historicocreditos (idusuarios,idproducto,idcreditos,montocredito,interescredito,plazocredito,cuotamensual,estado) VALUES (old.idusuarios,old.idproducto,old.idcreditos,old.montocredito,old.interescredito,old.plazocredito,old.cuotamensual,old.estado) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuentas` (
  `idcuentas` int(11) NOT NULL AUTO_INCREMENT,
  `numerocuenta` int(12) NOT NULL,
  `montocuenta` decimal(9,2) NOT NULL,
  `fechaapertura` timestamp NOT NULL DEFAULT current_timestamp(),
  `idproducto` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `estadocuenta` varchar(50) NOT NULL DEFAULT 'activa',
  PRIMARY KEY (`idcuentas`),
  UNIQUE KEY `numerocuenta` (`numerocuenta`),
  UNIQUE KEY `idusuarios` (`idusuarios`),
  KEY `idproducto` (`idproducto`),
  CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`),
  CONSTRAINT `cuentas_ibfk_2` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
INSERT INTO `cuentas` VALUES (1,101462573,2200.00,'2022-03-24 05:27:43',1,7,'activa'),(2,104176523,2100.00,'2022-03-24 06:02:28',1,8,'activa'),(3,105321467,6500.00,'2022-03-25 04:43:59',1,9,'activa'),(4,106741235,10500.00,'2022-03-25 06:08:45',1,1,'activa'),(5,101537246,75000.00,'2022-03-26 05:19:49',1,10,'activa');
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER HabilitarSistemaCuentasClientes_PortalCashman AFTER INSERT ON cuentas FOR EACH ROW UPDATE usuarios SET poseecuenta="si" WHERE idusuarios=NEW.idusuarios */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `cuotas`
--

DROP TABLE IF EXISTS `cuotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuotas` (
  `idcuotas` int(11) NOT NULL AUTO_INCREMENT,
  `idcreditos` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `montocancelar` decimal(9,2) NOT NULL,
  `estadocuota` varchar(30) NOT NULL DEFAULT 'pendiente',
  `nombreproducto` varchar(255) NOT NULL,
  `montocapital` decimal(9,2) NOT NULL,
  `fechavencimiento` date NOT NULL,
  `incumplimiento_pago` char(2) NOT NULL DEFAULT 'NO',
  `disponiblehistorico` char(2) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`idcuotas`),
  KEY `idusuarios` (`idusuarios`),
  KEY `idproducto` (`idproducto`),
  KEY `cuotas_ibfk_2` (`idcreditos`),
  CONSTRAINT `cuotas_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION,
  CONSTRAINT `cuotas_ibfk_2` FOREIGN KEY (`idcreditos`) REFERENCES `creditos` (`idcreditos`) ON DELETE CASCADE,
  CONSTRAINT `cuotas_ibfk_3` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=391 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuotas`
--

LOCK TABLES `cuotas` WRITE;
/*!40000 ALTER TABLE `cuotas` DISABLE KEYS */;
INSERT INTO `cuotas` VALUES (19,10,2,1,155.07,'cancelado','Préstamos Personales',111.11,'2022-05-06','NO','no'),(20,10,2,1,155.07,'cancelado','Préstamos Personales',111.11,'2022-06-06','NO','no'),(21,10,2,1,155.07,'cancelado','Préstamos Personales',111.11,'2022-07-06','NO','no'),(22,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2022-08-08','NO','no'),(23,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2022-09-06','NO','no'),(24,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2022-10-06','NO','no'),(25,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2022-11-07','NO','no'),(26,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2022-12-06','NO','no'),(27,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2023-01-06','NO','no'),(28,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2023-02-06','NO','no'),(29,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2023-03-06','NO','no'),(30,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2023-04-06','NO','no'),(31,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2023-05-08','NO','no'),(32,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2023-06-06','NO','no'),(33,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2023-07-06','NO','no'),(34,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2023-08-07','NO','no'),(35,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2023-09-06','NO','no'),(36,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2023-10-06','NO','no'),(37,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2023-11-06','NO','no'),(38,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2023-12-06','NO','no'),(39,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2024-01-08','NO','no'),(40,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2024-02-06','NO','no'),(41,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2024-03-06','NO','no'),(42,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2024-04-08','NO','no'),(43,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2024-05-06','NO','no'),(44,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2024-06-06','NO','no'),(45,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2024-07-08','NO','no'),(46,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2024-08-06','NO','no'),(47,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2024-09-06','NO','no'),(48,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2024-10-07','NO','no'),(49,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2024-11-06','NO','no'),(50,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2024-12-06','NO','no'),(51,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2025-01-06','NO','no'),(52,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2025-02-06','NO','no'),(53,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2025-03-06','NO','no'),(54,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2025-04-07','NO','no'),(55,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2025-05-06','NO','no'),(56,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2025-06-06','NO','no'),(57,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2025-07-07','NO','no'),(58,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2025-08-06','NO','no'),(59,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2025-09-08','NO','no'),(60,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2025-10-06','NO','no'),(61,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2025-11-06','NO','no'),(62,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2025-12-08','NO','no'),(63,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2026-01-06','NO','no'),(64,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2026-02-06','NO','no'),(65,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2026-03-06','NO','no'),(66,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2026-04-06','NO','no'),(67,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2026-05-06','NO','no'),(68,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2026-06-08','NO','no'),(69,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2026-07-06','NO','no'),(70,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2026-08-06','NO','no'),(71,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2026-09-07','NO','no'),(72,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2026-10-06','NO','no'),(73,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2026-11-06','NO','no'),(74,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2026-12-07','NO','no'),(75,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2027-01-06','NO','no'),(76,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2027-02-08','NO','no'),(77,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2027-03-08','NO','no'),(78,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2027-04-06','NO','no'),(79,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2027-05-06','NO','no'),(80,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2027-06-07','NO','no'),(81,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2027-07-06','NO','no'),(82,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2027-08-06','NO','no'),(83,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2027-09-06','NO','no'),(84,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2027-10-06','NO','no'),(85,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2027-11-08','NO','no'),(86,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2027-12-06','NO','no'),(87,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2028-01-06','NO','no'),(88,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2028-02-07','NO','no'),(89,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2028-03-06','NO','no'),(90,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2028-04-06','NO','no'),(91,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2028-05-08','NO','no'),(92,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2028-06-06','NO','no'),(93,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2028-07-06','NO','no'),(94,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2028-08-07','NO','no'),(95,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2028-09-06','NO','no'),(96,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2028-10-06','NO','no'),(97,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2028-11-06','NO','no'),(98,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2028-12-06','NO','no'),(99,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2029-01-08','NO','no'),(100,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2029-02-06','NO','no'),(101,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2029-03-06','NO','no'),(102,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2029-04-06','NO','no'),(103,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2029-05-07','NO','no'),(104,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2029-06-06','NO','no'),(105,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2029-07-06','NO','no'),(106,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2029-08-06','NO','no'),(107,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2029-09-06','NO','no'),(108,10,2,1,155.07,'pendiente','Préstamos Personales',111.11,'2029-10-08','NO','no'),(109,11,3,10,20408.05,'cancelado','Préstamos Hipotecarios',16388.89,'2022-05-06','NO','no'),(110,11,3,10,20408.05,'cancelado','Préstamos Hipotecarios',16388.89,'2022-06-06','NO','no'),(111,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2022-07-06','NO','no'),(112,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2022-08-08','NO','no'),(113,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2022-09-06','NO','no'),(114,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2022-10-06','NO','no'),(115,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2022-11-07','NO','no'),(116,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2022-12-06','NO','no'),(117,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2023-01-06','NO','no'),(118,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2023-02-06','NO','no'),(119,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2023-03-06','NO','no'),(120,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2023-04-06','NO','no'),(121,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2023-05-08','NO','no'),(122,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2023-06-06','NO','no'),(123,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2023-07-06','NO','no'),(124,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2023-08-07','NO','no'),(125,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2023-09-06','NO','no'),(126,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2023-10-06','NO','no'),(127,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2023-11-06','NO','no'),(128,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2023-12-06','NO','no'),(129,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2024-01-08','NO','no'),(130,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2024-02-06','NO','no'),(131,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2024-03-06','NO','no'),(132,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2024-04-08','NO','no'),(133,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2024-05-06','NO','no'),(134,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2024-06-06','NO','no'),(135,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2024-07-08','NO','no'),(136,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2024-08-06','NO','no'),(137,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2024-09-06','NO','no'),(138,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2024-10-07','NO','no'),(139,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2024-11-06','NO','no'),(140,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2024-12-06','NO','no'),(141,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2025-01-06','NO','no'),(142,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2025-02-06','NO','no'),(143,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2025-03-06','NO','no'),(144,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2025-04-07','NO','no'),(145,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2025-05-06','NO','no'),(146,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2025-06-06','NO','no'),(147,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2025-07-07','NO','no'),(148,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2025-08-06','NO','no'),(149,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2025-09-08','NO','no'),(150,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2025-10-06','NO','no'),(151,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2025-11-06','NO','no'),(152,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2025-12-08','NO','no'),(153,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2026-01-06','NO','no'),(154,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2026-02-06','NO','no'),(155,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2026-03-06','NO','no'),(156,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2026-04-06','NO','no'),(157,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2026-05-06','NO','no'),(158,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2026-06-08','NO','no'),(159,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2026-07-06','NO','no'),(160,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2026-08-06','NO','no'),(161,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2026-09-07','NO','no'),(162,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2026-10-06','NO','no'),(163,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2026-11-06','NO','no'),(164,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2026-12-07','NO','no'),(165,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2027-01-06','NO','no'),(166,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2027-02-08','NO','no'),(167,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2027-03-08','NO','no'),(168,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2027-04-06','NO','no'),(169,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2027-05-06','NO','no'),(170,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2027-06-07','NO','no'),(171,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2027-07-06','NO','no'),(172,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2027-08-06','NO','no'),(173,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2027-09-06','NO','no'),(174,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2027-10-06','NO','no'),(175,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2027-11-08','NO','no'),(176,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2027-12-06','NO','no'),(177,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2028-01-06','NO','no'),(178,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2028-02-07','NO','no'),(179,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2028-03-06','NO','no'),(180,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2028-04-06','NO','no'),(181,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2028-05-08','NO','no'),(182,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2028-06-06','NO','no'),(183,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2028-07-06','NO','no'),(184,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2028-08-07','NO','no'),(185,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2028-09-06','NO','no'),(186,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2028-10-06','NO','no'),(187,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2028-11-06','NO','no'),(188,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2028-12-06','NO','no'),(189,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2029-01-08','NO','no'),(190,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2029-02-06','NO','no'),(191,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2029-03-06','NO','no'),(192,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2029-04-06','NO','no'),(193,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2029-05-07','NO','no'),(194,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2029-06-06','NO','no'),(195,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2029-07-06','NO','no'),(196,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2029-08-06','NO','no'),(197,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2029-09-06','NO','no'),(198,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2029-10-08','NO','no'),(199,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2029-11-06','NO','no'),(200,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2029-12-06','NO','no'),(201,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2030-01-07','NO','no'),(202,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2030-02-06','NO','no'),(203,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2030-03-06','NO','no'),(204,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2030-04-08','NO','no'),(205,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2030-05-06','NO','no'),(206,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2030-06-06','NO','no'),(207,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2030-07-08','NO','no'),(208,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2030-08-06','NO','no'),(209,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2030-09-06','NO','no'),(210,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2030-10-07','NO','no'),(211,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2030-11-06','NO','no'),(212,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2030-12-06','NO','no'),(213,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2031-01-06','NO','no'),(214,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2031-02-06','NO','no'),(215,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2031-03-06','NO','no'),(216,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2031-04-07','NO','no'),(217,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2031-05-06','NO','no'),(218,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2031-06-06','NO','no'),(219,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2031-07-07','NO','no'),(220,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2031-08-06','NO','no'),(221,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2031-09-08','NO','no'),(222,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2031-10-06','NO','no'),(223,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2031-11-06','NO','no'),(224,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2031-12-08','NO','no'),(225,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2032-01-06','NO','no'),(226,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2032-02-06','NO','no'),(227,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2032-03-08','NO','no'),(228,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2032-04-06','NO','no'),(229,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2032-05-06','NO','no'),(230,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2032-06-07','NO','no'),(231,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2032-07-06','NO','no'),(232,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2032-08-06','NO','no'),(233,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2032-09-06','NO','no'),(234,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2032-10-06','NO','no'),(235,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2032-11-08','NO','no'),(236,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2032-12-06','NO','no'),(237,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2033-01-06','NO','no'),(238,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2033-02-07','NO','no'),(239,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2033-03-07','NO','no'),(240,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2033-04-06','NO','no'),(241,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2033-05-06','NO','no'),(242,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2033-06-06','NO','no'),(243,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2033-07-06','NO','no'),(244,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2033-08-08','NO','no'),(245,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2033-09-06','NO','no'),(246,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2033-10-06','NO','no'),(247,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2033-11-07','NO','no'),(248,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2033-12-06','NO','no'),(249,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2034-01-06','NO','no'),(250,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2034-02-06','NO','no'),(251,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2034-03-06','NO','no'),(252,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2034-04-06','NO','no'),(253,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2034-05-08','NO','no'),(254,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2034-06-06','NO','no'),(255,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2034-07-06','NO','no'),(256,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2034-08-07','NO','no'),(257,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2034-09-06','NO','no'),(258,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2034-10-06','NO','no'),(259,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2034-11-06','NO','no'),(260,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2034-12-06','NO','no'),(261,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2035-01-08','NO','no'),(262,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2035-02-06','NO','no'),(263,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2035-03-06','NO','no'),(264,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2035-04-06','NO','no'),(265,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2035-05-07','NO','no'),(266,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2035-06-06','NO','no'),(267,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2035-07-06','NO','no'),(268,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2035-08-06','NO','no'),(269,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2035-09-06','NO','no'),(270,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2035-10-08','NO','no'),(271,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2035-11-06','NO','no'),(272,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2035-12-06','NO','no'),(273,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2036-01-07','NO','no'),(274,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2036-02-06','NO','no'),(275,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2036-03-06','NO','no'),(276,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2036-04-07','NO','no'),(277,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2036-05-06','NO','no'),(278,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2036-06-06','NO','no'),(279,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2036-07-07','NO','no'),(280,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2036-08-06','NO','no'),(281,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2036-09-08','NO','no'),(282,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2036-10-06','NO','no'),(283,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2036-11-06','NO','no'),(284,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2036-12-08','NO','no'),(285,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2037-01-06','NO','no'),(286,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2037-02-06','NO','no'),(287,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2037-03-06','NO','no'),(288,11,3,10,20408.05,'pendiente','Préstamos Hipotecarios',16388.89,'2037-04-06','NO','no'),(289,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2022-05-09','NO','no'),(290,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2022-06-07','NO','no'),(291,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2022-07-07','NO','no'),(292,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2022-08-08','NO','no'),(293,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2022-09-07','NO','no'),(294,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2022-10-07','NO','no'),(295,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2022-11-07','NO','no'),(296,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2022-12-07','NO','no'),(297,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2023-01-09','NO','no'),(298,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2023-02-07','NO','no'),(299,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2023-03-07','NO','no'),(300,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2023-04-07','NO','no'),(301,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2023-05-08','NO','no'),(302,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2023-06-07','NO','no'),(303,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2023-07-07','NO','no'),(304,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2023-08-07','NO','no'),(305,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2023-09-07','NO','no'),(306,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2023-10-09','NO','no'),(307,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2023-11-07','NO','no'),(308,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2023-12-07','NO','no'),(309,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2024-01-08','NO','no'),(310,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2024-02-07','NO','no'),(311,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2024-03-07','NO','no'),(312,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2024-04-08','NO','no'),(313,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2024-05-07','NO','no'),(314,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2024-06-07','NO','no'),(315,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2024-07-08','NO','no'),(316,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2024-08-07','NO','no'),(317,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2024-09-09','NO','no'),(318,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2024-10-07','NO','no'),(319,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2024-11-07','NO','no'),(320,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2024-12-09','NO','no'),(321,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2025-01-07','NO','no'),(322,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2025-02-07','NO','no'),(323,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2025-03-07','NO','no'),(324,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2025-04-07','NO','no'),(325,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2025-05-07','NO','no'),(326,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2025-06-09','NO','no'),(327,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2025-07-07','NO','no'),(328,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2025-08-07','NO','no'),(329,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2025-09-08','NO','no'),(330,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2025-10-07','NO','no'),(331,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2025-11-07','NO','no'),(332,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2025-12-08','NO','no'),(333,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2026-01-07','NO','no'),(334,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2026-02-09','NO','no'),(335,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2026-03-09','NO','no'),(336,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2026-04-07','NO','no'),(337,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2026-05-07','NO','no'),(338,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2026-06-08','NO','no'),(339,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2026-07-07','NO','no'),(340,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2026-08-07','NO','no'),(341,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2026-09-07','NO','no'),(342,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2026-10-07','NO','no'),(343,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2026-11-09','NO','no'),(344,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2026-12-07','NO','no'),(345,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2027-01-07','NO','no'),(346,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2027-02-08','NO','no'),(347,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2027-03-08','NO','no'),(348,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2027-04-07','NO','no'),(349,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2027-05-07','NO','no'),(350,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2027-06-07','NO','no'),(351,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2027-07-07','NO','no'),(352,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2027-08-09','NO','no'),(353,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2027-09-07','NO','no'),(354,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2027-10-07','NO','no'),(355,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2027-11-08','NO','no'),(356,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2027-12-07','NO','no'),(357,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2028-01-07','NO','no'),(358,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2028-02-07','NO','no'),(359,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2028-03-07','NO','no'),(360,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2028-04-07','NO','no'),(361,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2028-05-08','NO','no'),(362,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2028-06-07','NO','no'),(363,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2028-07-07','NO','no'),(364,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2028-08-07','NO','no'),(365,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2028-09-07','NO','no'),(366,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2028-10-09','NO','no'),(367,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2028-11-07','NO','no'),(368,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2028-12-07','NO','no'),(369,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2029-01-08','NO','no'),(370,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2029-02-07','NO','no'),(371,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2029-03-07','NO','no'),(372,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2029-04-09','NO','no'),(373,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2029-05-07','NO','no'),(374,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2029-06-07','NO','no'),(375,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2029-07-09','NO','no'),(376,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2029-08-07','NO','no'),(377,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2029-09-07','NO','no'),(378,12,4,7,784.20,'pendiente','Préstamos de Vehículos',500.00,'2029-10-08','NO','no');
/*!40000 ALTER TABLE `cuotas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER CambioEstadoComprobadorCuotasMensualesClientes AFTER INSERT ON cuotas FOR EACH ROW UPDATE creditos SET cuotas_generadas="si" WHERE idcreditos=NEW.idcreditos */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER HabilitarSistemaPortalClientes_Creditos AFTER INSERT ON cuotas FOR EACH ROW UPDATE usuarios SET habilitarsistema="si" WHERE idusuarios=NEW.idusuarios */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `datosvehiculoscreditos`
--

DROP TABLE IF EXISTS `datosvehiculoscreditos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datosvehiculoscreditos` (
  `iddatosvehiculos` int(11) NOT NULL AUTO_INCREMENT,
  `idcreditos` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `placa` varchar(8) NOT NULL,
  `clase` varchar(30) NOT NULL,
  `anio` int(11) NOT NULL,
  `capacidad` varchar(5) NOT NULL,
  `asientos` varchar(5) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `numeromotor` varchar(17) NOT NULL,
  `chasisgrabado` varchar(17) NOT NULL,
  `chasisvin` varchar(17) NOT NULL,
  `color` varchar(40) NOT NULL,
  PRIMARY KEY (`iddatosvehiculos`),
  KEY `datosvehiculoscreditos_ibfk_1` (`idcreditos`),
  KEY `datosvehiculoscreditos_ibfk_2` (`idproducto`),
  KEY `datosvehiculoscreditos_ibfk_3` (`idusuarios`),
  CONSTRAINT `datosvehiculoscreditos_ibfk_1` FOREIGN KEY (`idcreditos`) REFERENCES `creditos` (`idcreditos`) ON DELETE CASCADE,
  CONSTRAINT `datosvehiculoscreditos_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE,
  CONSTRAINT `datosvehiculoscreditos_ibfk_3` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datosvehiculoscreditos`
--

LOCK TABLES `datosvehiculoscreditos` WRITE;
/*!40000 ALTER TABLE `datosvehiculoscreditos` DISABLE KEYS */;
INSERT INTO `datosvehiculoscreditos` VALUES (1,12,4,7,'P488487','DEPORTIVO',2020,'4.00','4.00','BMW','i 8','WBY2Z2C57FV674366','WBY2Z2C57FV674366','WBY2Z2C57FV674366','Blanco Metalico');
/*!40000 ALTER TABLE `datosvehiculoscreditos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleusuarios`
--

DROP TABLE IF EXISTS `detalleusuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalleusuarios` (
  `iddetalle` int(11) NOT NULL AUTO_INCREMENT,
  `dui` varchar(10) NOT NULL,
  `nit` varchar(17) NOT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  `telefonotrabajo` varchar(9) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `direcciontrabajo` varchar(255) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `genero` char(1) NOT NULL,
  `estadocivil` varchar(30) NOT NULL,
  `fotoduifrontal` varchar(255) NOT NULL,
  `fotoduireverso` varchar(255) NOT NULL,
  `fotonit` varchar(255) NOT NULL,
  `fotofirma` varchar(255) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  PRIMARY KEY (`iddetalle`),
  UNIQUE KEY `dui` (`dui`,`nit`),
  KEY `detalleusuarios_ibfk_1` (`idusuarios`),
  CONSTRAINT `detalleusuarios_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleusuarios`
--

LOCK TABLES `detalleusuarios` WRITE;
/*!40000 ALTER TABLE `detalleusuarios` DISABLE KEYS */;
INSERT INTO `detalleusuarios` VALUES (1,'03343322-4','0614-220319-000-0','2121-0099','7755-3333','2208-8988','Lorem de ipsum av lorem No 44 Av Amapolas Ote Block \"E\" PERFEITO! SI!!!!','CashMan H.A','Administrador Sistemas','Col Cumbres De Cuscatlán Pje 10 Políg Q No 105','1998-12-25','m','Comprometido','011817_62479631a8465_DuiFrontal.jpg','011817_62479631a846d_DuiReverso.jpg','011817_62479631a846d_NitFrontal.jpg','011817_62479631a846d_Firma.png',1),(2,'00000000-1','0611-140887-111-2','7766-8888','7788-7777','7799-9988','Bo La Esperanza 5 Av Sur No 13, Santa Rosa de Lima','CashMan H.A','Administradora de Sistemas','Col Cumbres De Cuscatlán Pje 10 Políg Q No 105','1987-09-14','f','Casada','231526_623b909be2389_DuiFrontal.jpg','231526_623b909be2390_DuiReverso.jpg','231526_623b909be2390_NitFrontal.jpg','231526_623b909be2390_Firma.png',2),(3,'00000000-2','0611-220499-111-1','2211-3333','7899-1233','2211-4455','Col La Rábida 29 Cl Ote No 730, San Salvador','CashMan H.A','Administrador de Sistemas','Col Cumbres De Cuscatlán Pje 10 Políg Q No 105','1999-04-22','m','Comprometido','231535_623b92915aedf_DuiFrontal.jpg','231535_623b92915aee6_DuiReverso.jpg','231535_623b92915aee6_NitFrontal.jpg','231535_623b92915aee6_Firma.png',3),(4,'00000000-3','0611-220495-009-1','2211-2222','2211-2233','7788-7777','Resid Cdad Real Políg L-Sevilla No 01, San Juan Opico','CashMan H.A','Presidencia CEO','Col Cumbres De Cuscatlán Pje 10 Políg Q No 105','1995-04-22','f','Casada','231542_623b9462e7859_DuiFrontal.jpg','231542_623b9462e7860_DuiReverso.jpg','231542_623b9462e7860_NitFrontal.jpg','231542_623b9462e7860_Firma.png',4),(5,'00000000-4','0611-220999-112-2','2234-4999','2234-4950','2233-9944','Bo El Calvario Cl Alberto Masferrer No 44-B Sto Tomás, Santo Tomás','CashMan H.A','Gerencia','Col Cumbres De Cuscatlán Pje 10 Políg Q No 105','1999-09-22','m','Casado','231600_623b98609eb9d_DuiFrontal.jpg','231600_623b98609eba4_DuiReverso.jpg','231600_623b98609eba4_NitFrontal.jpg','231600_623b98609eba4_Firma.png',5),(6,'00000000-6','0611-291280-112-1','2233-2111','2233-2112','2244-2221',' Autop Nte Cond San Francisco No 14','CashMan H.A','Atención al Cliente','Col Cumbres De Cuscatlán Pje 10 Políg Q No 105','1980-12-29','m','Casado','231607_623b9a3445811_DuiFrontal.jpg','231607_623b9a3445818_DuiReverso.jpg','231607_623b9a3445818_NitFrontal.jpg','231607_623b9a3445818_Firma.png',6),(7,'00000000-7','0611-220997-112-2','2244-3344','7889-0099','2218-0440','Villa Constitución Cl Ppal No G-1 Galera Quemada Nejapa, Nejapa','Industrias Topaz','Jefa RR.HH','Bo San Antonio Cl Ppal 1 Cuadra Antes De Telecom','1997-09-22','m','Soltero','231652_623ba4acba391_DuiFrontal.jpg','231652_623ba4acba3a0_DuiReverso.jpg','231652_623ba4acba3a0_NitFrontal.jpg','231652_623ba4acba3a0_Firma.png',7),(9,'00000000-8','0611-050590-112-2','2211-4455','7994-7748','2299-8484','Col San José Cl A La Playa Loc 5 Metalío, Metalio','Grupo LEMUS','Atención al Cliente','Z Ind Plan De La Laguna Cl Circunv Políg A Bod 1 Antgo Cusca','1990-05-05','f','Divorciada','231732_623bae2953054_DuiFrontal.jpg','231732_623bae295305b_DuiReverso.jpg','231732_623bae295305b_NitFrontal.jpg','231732_623bae295305b_Firma.png',8),(10,'00000000-9','0612-221194-112-2','2211-4446','7878-4636','2947-1122','Rpto Bosques Del Matazano C C Matazano Loc 10 Soya, Soyapango','Grupo OCEANO','Ventas y Marketing','Cond Cuscatlán Fnl 4 Cl Pte y 25 Av Nte No 220','1994-11-22','f','Divorciada','241608_623cebd785835_DuiFrontal.jpg','241608_623cebd785842_DuiReverso.jpg','241608_623cebd785842_NitFrontal.jpg','241608_623cebd785842_Firma.png',9),(11,'00000001-0','0611-260197-117-1','2299-4400','7755-0099','2310-0690','Col La Sultana Cl Las Rosas No 37 Antg Cusc, Tonacatepeque','SERSAPROSA','Dpto Riesgos Jurídicos','Urb Universitaria Cl Los Pinos No 20','1997-01-26','m','Soltero','251707_623e4b353d628_DuiFrontal.jpg','251707_623e4b353d634_DuiReverso.jpg','251707_623e4b353d634_NitFrontal.jpg','251707_623e4b353d634_Firma.png',10),(12,'00000001-4','0613-220387-122-8','2298-7783','7904-8389','2211-9983','Lorem de ipsum av lorem No 44','Grupo Q','Agente de ventas (telefónico)','Calle La Reforma, NO 450-E Colonia Escalón (Edificio contact-center).','1987-03-22','m','Divorciado','011816_624795cce0504_DuiFrontal.jpg','011816_624795cce050b_DuiReverso.jpg','011816_624795cce050b_NitFrontal.jpg','011816_624795cce050b_Firma.png',11);
/*!40000 ALTER TABLE `detalleusuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER ComprobacionCompletarPerfilUsuarios AFTER INSERT ON detalleusuarios FOR EACH ROW UPDATE usuarios SET completoperfil="si" WHERE idusuarios=NEW.idusuarios */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `historicocreditos`
--

DROP TABLE IF EXISTS `historicocreditos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historicocreditos` (
  `idhistorico` int(11) NOT NULL AUTO_INCREMENT,
  `idusuarios` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idcreditos` int(11) NOT NULL,
  `montocredito` decimal(9,2) NOT NULL,
  `interescredito` float NOT NULL,
  `plazocredito` int(11) NOT NULL,
  `cuotamensual` decimal(9,2) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`idhistorico`),
  KEY `idusuarios` (`idusuarios`),
  KEY `idproducto` (`idproducto`),
  KEY `idcreditos` (`idcreditos`),
  CONSTRAINT `historicocreditos_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historicocreditos`
--

LOCK TABLES `historicocreditos` WRITE;
/*!40000 ALTER TABLE `historicocreditos` DISABLE KEYS */;
INSERT INTO `historicocreditos` VALUES (1,1,2,8,1550.00,10.05,12,168.48,'cancelado'),(2,1,2,9,340.00,6,6,70.08,'cancelado'),(3,8,2,13,1500.00,11.6,12,165.49,'cancelado');
/*!40000 ALTER TABLE `historicocreditos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER HabilitarNuevasSolicitudesCrediticias_Clientes AFTER INSERT ON historicocreditos FOR EACH ROW UPDATE usuarios SET habilitarnuevoscreditos="si" WHERE idusuarios=new.idusuarios */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `historicocuotascreditos`
--

DROP TABLE IF EXISTS `historicocuotascreditos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historicocuotascreditos` (
  `idhistorico` int(11) NOT NULL AUTO_INCREMENT,
  `idcreditos` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `montocancelar` decimal(9,2) NOT NULL,
  `nombreproducto` varchar(255) NOT NULL,
  `montocapital` decimal(9,2) NOT NULL,
  `fechavencimiento` date NOT NULL,
  PRIMARY KEY (`idhistorico`),
  KEY `historicocuotascreditos_ibfk_2` (`idproducto`),
  KEY `idusuarios` (`idusuarios`),
  KEY `idcreditos` (`idcreditos`),
  CONSTRAINT `historicocuotascreditos_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historicocuotascreditos`
--

LOCK TABLES `historicocuotascreditos` WRITE;
/*!40000 ALTER TABLE `historicocuotascreditos` DISABLE KEYS */;
INSERT INTO `historicocuotascreditos` VALUES (1,8,2,1,168.48,'Préstamos Personales',129.17,'2022-05-06'),(2,8,2,1,168.48,'Préstamos Personales',129.17,'2022-06-06'),(3,8,2,1,168.48,'Préstamos Personales',129.17,'2022-07-06'),(4,8,2,1,168.48,'Préstamos Personales',129.17,'2022-08-08'),(5,8,2,1,168.48,'Préstamos Personales',129.17,'2022-09-06'),(6,8,2,1,168.48,'Préstamos Personales',129.17,'2022-10-06'),(7,8,2,1,168.48,'Préstamos Personales',129.17,'2022-11-07'),(8,8,2,1,168.48,'Préstamos Personales',129.17,'2022-12-06'),(9,8,2,1,168.48,'Préstamos Personales',129.17,'2023-01-06'),(10,8,2,1,168.48,'Préstamos Personales',129.17,'2023-02-06'),(11,8,2,1,168.48,'Préstamos Personales',129.17,'2023-03-06'),(12,8,2,1,168.48,'Préstamos Personales',129.17,'2023-04-06'),(13,9,2,1,70.08,'Préstamos Personales',56.67,'2022-05-06'),(14,9,2,1,70.08,'Préstamos Personales',56.67,'2022-06-06'),(15,9,2,1,70.08,'Préstamos Personales',56.67,'2022-07-06'),(16,9,2,1,70.08,'Préstamos Personales',56.67,'2022-08-08'),(17,9,2,1,70.08,'Préstamos Personales',56.67,'2022-09-06'),(18,9,2,1,70.08,'Préstamos Personales',56.67,'2022-10-06'),(19,13,2,8,165.49,'Préstamos Personales',125.00,'2022-10-05'),(20,13,2,8,165.49,'Préstamos Personales',125.00,'2022-11-07'),(21,13,2,8,165.49,'Préstamos Personales',125.00,'2022-12-05'),(22,13,2,8,165.49,'Préstamos Personales',125.00,'2023-01-05'),(23,13,2,8,165.49,'Préstamos Personales',125.00,'2023-02-06'),(24,13,2,8,165.49,'Préstamos Personales',125.00,'2023-03-06'),(25,13,2,8,165.49,'Préstamos Personales',125.00,'2023-04-05'),(26,13,2,8,165.49,'Préstamos Personales',125.00,'2023-05-05'),(27,13,2,8,165.49,'Préstamos Personales',125.00,'2023-06-05'),(28,13,2,8,165.49,'Préstamos Personales',125.00,'2023-07-05'),(29,13,2,8,165.49,'Préstamos Personales',125.00,'2023-08-07'),(30,13,2,8,165.49,'Préstamos Personales',125.00,'2023-09-05');
/*!40000 ALTER TABLE `historicocuotascreditos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER ComprobacionSolicitudCrediticiaCanceladaClientes_EnvioHistorico AFTER INSERT ON historicocuotascreditos FOR EACH ROW UPDATE creditos SET enviaralhistorico="si" WHERE idcreditos =NEW.idcreditos */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER OcultarTransaccionesProcesadasPortalClientes_CreditosCancelados AFTER INSERT ON historicocuotascreditos FOR EACH ROW UPDATE creditos SET ocultartransacciones_clientes="si" WHERE idcreditos=new.idcreditos */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `historicotransacciones`
--

DROP TABLE IF EXISTS `historicotransacciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historicotransacciones` (
  `idhistoricotransaccion` int(11) NOT NULL AUTO_INCREMENT,
  `idusuarios` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idcreditos` int(11) NOT NULL,
  `idcuotas` int(11) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `monto` decimal(9,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `dias_incumplimiento` int(11) NOT NULL,
  `empleado_gestion` varchar(255) NOT NULL,
  PRIMARY KEY (`idhistoricotransaccion`),
  KEY `idproducto` (`idproducto`),
  CONSTRAINT `historicotransacciones_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historicotransacciones`
--

LOCK TABLES `historicotransacciones` WRITE;
/*!40000 ALTER TABLE `historicotransacciones` DISABLE KEYS */;
INSERT INTO `historicotransacciones` VALUES (1,1,2,8,1,'TCH#34d41aafcd',168.48,'2022-04-07 17:11:35',0,'marco.almagro'),(2,1,2,8,2,'TCH#229b89be58',168.48,'2022-04-07 17:11:45',0,'marco.almagro'),(3,1,2,8,3,'TCH#dea8c73929',168.48,'2022-04-07 17:11:57',0,'marco.almagro'),(4,1,2,8,4,'TCH#1f4973ddf2',168.48,'2022-04-07 17:12:13',0,'marco.almagro'),(5,1,2,8,5,'TCH#da52925946',168.48,'2022-04-07 17:12:30',0,'marco.almagro'),(6,1,2,8,6,'TCH#c16b6cfb8b',168.48,'2022-04-07 17:12:49',0,'marco.almagro'),(7,1,2,8,7,'TCH#6974b763c1',168.48,'2022-04-07 17:13:00',0,'marco.almagro'),(8,1,2,8,8,'TCH#ae3f0c14bd',168.48,'2022-04-07 17:13:11',0,'marco.almagro'),(9,1,2,8,9,'TCH#c63864c939',168.48,'2022-04-07 17:13:20',0,'marco.almagro'),(10,1,2,8,10,'TCH#b2d3adde2f',168.48,'2022-04-07 17:13:31',0,'marco.almagro'),(11,1,2,8,11,'TCH#99ef3a857e',168.48,'2022-04-07 17:13:40',0,'marco.almagro'),(12,1,2,8,12,'TCH#6a92299bf2',168.48,'2022-04-07 17:13:59',0,'marco.almagro'),(13,1,2,9,13,'TCH#6796adce31',70.08,'2022-04-07 17:24:37',0,'daniel.rivera'),(14,1,2,9,14,'TCH#43d6bbe88b',70.08,'2022-04-07 17:24:48',0,'daniel.rivera'),(15,1,2,9,15,'TCH#5328ffcee0',70.08,'2022-04-07 17:25:15',0,'daniel.rivera'),(16,1,2,9,16,'TCH#c5a467a7a2',70.08,'2022-04-07 17:25:28',0,'daniel.rivera'),(17,1,2,9,17,'TCH#a1a17cf1dc',70.08,'2022-04-07 17:25:40',0,'daniel.rivera'),(18,1,2,9,18,'TCH#ac01b24e4c',70.08,'2022-04-07 17:26:03',0,'daniel.rivera'),(19,1,2,10,19,'TCH#82517863ac',155.07,'2022-04-07 17:32:35',0,'marco.almagro'),(20,1,2,10,20,'TCH#b35e19c00a',155.07,'2022-04-07 17:32:50',0,'marco.almagro'),(21,1,2,10,21,'TCH#1cdd80a7fc',155.07,'2022-04-07 17:33:04',0,'marco.almagro'),(22,10,3,11,109,'TCH#0ad1ad91a9',20408.05,'2022-04-07 17:52:10',0,'marco.almagro'),(23,10,3,11,110,'TCH#7a64afb416',20408.05,'2022-04-07 17:52:23',0,'marco.almagro'),(24,8,2,13,379,'TCH#9b28c94038',165.49,'2022-09-06 00:45:53',0,'marco.almagro'),(25,8,2,13,380,'TCH#01a0db7d46',165.49,'2022-09-06 00:46:04',0,'marco.almagro'),(26,8,2,13,381,'TCH#7851daf0f7',165.49,'2022-09-06 00:46:16',0,'marco.almagro'),(27,8,2,13,382,'TCH#9adcc2a844',165.49,'2022-09-06 00:46:26',0,'marco.almagro'),(28,8,2,13,383,'TCH#d64dc07e01',165.49,'2022-09-06 00:46:36',0,'marco.almagro'),(29,8,2,13,384,'TCH#034fcadc1e',165.49,'2022-09-06 00:46:46',0,'marco.almagro'),(30,8,2,13,385,'TCH#a9c7a1577b',165.49,'2022-09-06 00:46:56',0,'marco.almagro'),(31,8,2,13,386,'TCH#1a4230b484',165.49,'2022-09-06 00:47:05',0,'marco.almagro'),(32,8,2,13,387,'TCH#6042359520',165.49,'2022-09-06 00:47:15',0,'marco.almagro'),(33,8,2,13,388,'TCH#b176a6c157',165.49,'2022-09-06 00:47:25',0,'marco.almagro'),(34,8,2,13,389,'TCH#93e1f82f9c',165.49,'2022-09-06 00:47:35',0,'marco.almagro'),(35,8,2,13,390,'TCH#8836f44f62',165.49,'2022-09-06 00:47:55',0,'marco.almagro');
/*!40000 ALTER TABLE `historicotransacciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensajeria`
--

DROP TABLE IF EXISTS `mensajeria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mensajeria` (
  `idmensajeria` int(11) NOT NULL AUTO_INCREMENT,
  `idusuarios` int(11) NOT NULL,
  `nombremensaje` varchar(255) NOT NULL,
  `asuntomensaje` varchar(255) NOT NULL,
  `detallemensaje` varchar(5000) NOT NULL,
  `fechamensaje` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idusuariosdestinatario` int(11) NOT NULL,
  `ocultarmensaje` char(2) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`idmensajeria`),
  KEY `idusuarios` (`idusuarios`),
  KEY `idusuariosdestinatario` (`idusuariosdestinatario`),
  CONSTRAINT `mensajeria_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE,
  CONSTRAINT `mensajeria_ibfk_2` FOREIGN KEY (`idusuariosdestinatario`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensajeria`
--

LOCK TABLES `mensajeria` WRITE;
/*!40000 ALTER TABLE `mensajeria` DISABLE KEYS */;
INSERT INTO `mensajeria` VALUES (1,1,'Bienvenida Portal','Saludos Cordiales','Por medio de la presente, quisiera expresarle la más sincera bienvenida como nuevo cliente de nuestra compañia. Esperamos suplir sus necesidades financieras y que todos sus planes sean de muchos éxitos.','2022-03-24 05:13:28',7,'no'),(2,2,'Reportes Fallos','Consulta gestiones reportes fallos','Buen día estimado, informar sobre la disponibilidad de reportes de fallos de plataforma para todos los usuarios y clientes.','2022-03-25 05:44:15',1,'no');
/*!40000 ALTER TABLE `mensajeria` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER EnvioNotificacionNuevosMensajesUsuarios AFTER INSERT ON mensajeria FOR EACH ROW INSERT INTO notificaciones (idusuarios,titulonotificacion,descripcionnotificacion,clasificacionnotificacion) VALUES (new.idusuariosdestinatario,"Nuevo Mensaje Recibido","Por favor revisa tu bandeja de entrada, has recibido un nuevo mensaje","nuevomensaje") */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notificaciones` (
  `idnotificacion` int(11) NOT NULL AUTO_INCREMENT,
  `idusuarios` int(11) NOT NULL,
  `titulonotificacion` varchar(255) NOT NULL,
  `descripcionnotificacion` varchar(255) NOT NULL,
  `fechanotificacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `clasificacionnotificacion` varchar(100) NOT NULL,
  `ocultarnotificacion` char(2) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`idnotificacion`),
  KEY `idusuarios` (`idusuarios`),
  CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones`
--

LOCK TABLES `notificaciones` WRITE;
/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
INSERT INTO `notificaciones` VALUES (1,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#34d41aafcd','2022-04-07 17:11:35','pagorecibido','no'),(2,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#229b89be58','2022-04-07 17:11:45','pagorecibido','no'),(3,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#dea8c73929','2022-04-07 17:11:57','pagorecibido','no'),(4,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#1f4973ddf2','2022-04-07 17:12:13','pagorecibido','no'),(5,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#da52925946','2022-04-07 17:12:30','pagorecibido','no'),(6,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#c16b6cfb8b','2022-04-07 17:12:49','pagorecibido','no'),(7,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#6974b763c1','2022-04-07 17:13:00','pagorecibido','no'),(8,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#ae3f0c14bd','2022-04-07 17:13:11','pagorecibido','no'),(9,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#c63864c939','2022-04-07 17:13:20','pagorecibido','no'),(10,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#b2d3adde2f','2022-04-07 17:13:31','pagorecibido','no'),(11,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#99ef3a857e','2022-04-07 17:13:40','pagorecibido','no'),(12,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#6a92299bf2','2022-04-07 17:13:59','pagorecibido','no'),(13,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#6796adce31','2022-04-07 17:24:37','pagorecibido','no'),(14,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#43d6bbe88b','2022-04-07 17:24:48','pagorecibido','no'),(15,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#5328ffcee0','2022-04-07 17:25:15','pagorecibido','no'),(16,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#c5a467a7a2','2022-04-07 17:25:28','pagorecibido','no'),(17,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#a1a17cf1dc','2022-04-07 17:25:40','pagorecibido','no'),(18,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#ac01b24e4c','2022-04-07 17:26:03','pagorecibido','no'),(19,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#82517863ac','2022-04-07 17:32:35','pagorecibido','no'),(20,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#b35e19c00a','2022-04-07 17:32:50','pagorecibido','no'),(21,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#1cdd80a7fc','2022-04-07 17:33:04','pagorecibido','no'),(22,10,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#0ad1ad91a9','2022-04-07 17:52:10','pagorecibido','no'),(23,10,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#7a64afb416','2022-04-07 17:52:23','pagorecibido','no'),(24,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#82517863ac','2022-04-08 05:52:49','pagorecibido','no'),(25,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#b35e19c00a','2022-04-08 05:52:49','pagorecibido','no'),(26,1,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#1cdd80a7fc','2022-04-08 05:52:49','pagorecibido','no'),(27,10,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#0ad1ad91a9','2022-04-08 05:52:49','pagorecibido','no'),(28,10,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#7a64afb416','2022-04-08 05:52:49','pagorecibido','no'),(29,8,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#9b28c94038','2022-09-06 00:45:53','pagorecibido','no'),(30,8,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#01a0db7d46','2022-09-06 00:46:04','pagorecibido','no'),(31,8,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#7851daf0f7','2022-09-06 00:46:16','pagorecibido','no'),(32,8,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#9adcc2a844','2022-09-06 00:46:26','pagorecibido','no'),(33,8,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#d64dc07e01','2022-09-06 00:46:36','pagorecibido','no'),(34,8,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#034fcadc1e','2022-09-06 00:46:46','pagorecibido','no'),(35,8,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#a9c7a1577b','2022-09-06 00:46:56','pagorecibido','no'),(36,8,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#1a4230b484','2022-09-06 00:47:05','pagorecibido','no'),(37,8,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#6042359520','2022-09-06 00:47:15','pagorecibido','no'),(38,8,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#b176a6c157','2022-09-06 00:47:25','pagorecibido','no'),(39,8,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#93e1f82f9c','2022-09-06 00:47:35','pagorecibido','no'),(40,8,'Pago Cuota Mensual Recibido','Pago efectuado con éxito referencia TCH#8836f44f62','2022-09-06 00:47:55','pagorecibido','no');
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) NOT NULL,
  `nombreproducto` varchar(255) NOT NULL,
  `descripcionproducto` varchar(255) NOT NULL,
  `requisitosproductos` varchar(1000) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'CAhorrosPe-CHSA','Cuentas de Ahorro Personales','Cuentas de ahorro personales simples, sin libreta express.','Mayor de 18 años, apertura mínima de $25.00 USD, DUI o NIT.\r\nPoseer un crédito activo o bien tener un histórico de crédito anterior con la empresa.','activo'),(2,'PrPersonal-CHSA','Préstamos Personales','Préstamo pago en ventanilla, orientado a la consolidación de deudas, traslado de préstamos o  gastos personales.  Aplica para asalariados o profesional independiente.','Plazo máximo hasta 6 años,\r\nMontos desde $1,500 hasta $50,0000.\r\nEdad desde 21 hasta 70 años. Fotocopia de DUI Y NIT,\r\nAsalariado con 6 meses o más de laborar en la empresa (ingresos mínimos $600.00),\r\nEstado de cuenta de AFP,\r\nConstancia de salario vigente, debidamente sellada y firmada.\r\nCopia de recibo de agua, luz o teléfono fijo,\r\nEstados de cuenta vigentes de las deudas a cancelar\r\nProfesional independiente con 3 años en la gestión(ingreso mínimos de $1,200),\r\nPropietario que declara a título personal(ingresos mínimos de $5,100)\r\nUltimas 3 declaraciones de renta','activo'),(3,'PrHipoteca-CHSA','Préstamos Hipotecarios','Préstamos hipotecarios con tasas de interés competitivas, se financia hasta un 90% del valor total del inmueble','','activo'),(4,'PrVehiculo-CHSA','Préstamos de Vehículos','Préstamo orientado a financiar la compra de vehículo nuevo exclusivamente (No aplica vehículos comerciales; Camiones, Buses, Microbuses)','Asalariados','activo');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recuperacion`
--

DROP TABLE IF EXISTS `recuperacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recuperacion` (
  `idrecuperaciones` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(15) NOT NULL DEFAULT 'nousado',
  PRIMARY KEY (`idrecuperaciones`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recuperacion`
--

LOCK TABLES `recuperacion` WRITE;
/*!40000 ALTER TABLE `recuperacion` DISABLE KEYS */;
INSERT INTO `recuperacion` VALUES (1,'dan@gmail.com','973a9afcf6',10236,'2022-03-23 02:15:43','nousado'),(2,'dan@gmail.com','96540bceb5',44571,'2022-03-29 02:41:38','nousado'),(3,'dan@gmail.com','83e35e7792',30483,'2022-03-29 02:48:10','usado'),(4,'dan@gmail.com','f3fdab2ff7',89357,'2022-03-29 02:51:41','usado');
/*!40000 ALTER TABLE `recuperacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referenciaspersonales`
--

DROP TABLE IF EXISTS `referenciaspersonales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `referenciaspersonales` (
  `idreferencias` int(11) NOT NULL AUTO_INCREMENT,
  `idcreditos` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `nombres_referencia1` varchar(255) NOT NULL,
  `apellidos_referencia1` varchar(255) NOT NULL,
  `empresa_referencia1` varchar(255) NOT NULL,
  `profesion_oficioreferencia1` varchar(255) NOT NULL,
  `telefono_referencia1` varchar(9) NOT NULL,
  `nombres_referencia2` varchar(255) NOT NULL,
  `apellidos_referencia2` varchar(255) NOT NULL,
  `empresa_referencia2` varchar(255) NOT NULL,
  `profesion_oficioreferencia2` varchar(255) NOT NULL,
  `telefono_referencia2` varchar(9) NOT NULL,
  PRIMARY KEY (`idreferencias`),
  KEY `referenciaspersonales_ibfk_1` (`idcreditos`),
  KEY `referenciaspersonales_ibfk_2` (`idproducto`),
  KEY `referenciaspersonales_ibfk_3` (`idusuarios`),
  CONSTRAINT `referenciaspersonales_ibfk_1` FOREIGN KEY (`idcreditos`) REFERENCES `creditos` (`idcreditos`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `referenciaspersonales_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `referenciaspersonales_ibfk_3` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referenciaspersonales`
--

LOCK TABLES `referenciaspersonales` WRITE;
/*!40000 ALTER TABLE `referenciaspersonales` DISABLE KEYS */;
INSERT INTO `referenciaspersonales` VALUES (3,10,1,2,'Maria del Carmen','Mendoza','SigmaQ','Jefa RR.HH','7648-3838','Rosmi Adonay','Chavez','SIgmaQ','Despachador Operativo','7738-4847'),(4,11,10,3,'Joaquin','Topaz','Industrias Topaz','CEO','7453-8447','Sandra Avila','Bahia','Textufil','CO-CEO','7399-4858'),(5,12,7,4,'Josue','Hernandez','Grupo Q','Vendedor / Atencion al Cliente','7484-3993','Rodrigo','Mendoza','FUSALMO','Jefe Proyeccion Social','7784-8747');
/*!40000 ALTER TABLE `referenciaspersonales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reporteproblemasplataforma`
--

DROP TABLE IF EXISTS `reporteproblemasplataforma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reporteproblemasplataforma` (
  `idreporte` int(11) NOT NULL AUTO_INCREMENT,
  `idusuarios` int(11) NOT NULL,
  `nombrereporte` varchar(255) NOT NULL,
  `descripcionreporte` varchar(3000) NOT NULL,
  `fotoreporte` varchar(255) NOT NULL,
  `fecharegistroreporte` datetime NOT NULL,
  `fechaactualizacionreporte` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` varchar(50) NOT NULL,
  `comentarioactualizacion` varchar(3000) DEFAULT NULL,
  `empleado_gestion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idreporte`),
  KEY `idusuarios` (`idusuarios`),
  CONSTRAINT `reporteproblemasplataforma_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reporteproblemasplataforma`
--

LOCK TABLES `reporteproblemasplataforma` WRITE;
/*!40000 ALTER TABLE `reporteproblemasplataforma` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporteproblemasplataforma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombrerol` varchar(75) NOT NULL,
  `descripcionrol` varchar(255) NOT NULL,
  PRIMARY KEY (`idrol`),
  UNIQUE KEY `nombrerol` (`nombrerol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrador','Usuarios administradores, encargados del mantenimiento de sistemas CashMan H.A..'),(2,'presidencia','Usuarios del departamento de presidencia CashMan H.A, incluido CEO general de la empresa.'),(3,'gerencia','Todo el personal operativo del departamento de gerencia CashMan H.A '),(4,'atencionclientes','Todo el personal operativo del departamento de atención al cliente.'),(5,'clientes','Clientes cashmanha los cuáles poseen al menos un producto asociado con la empresa');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transacciones`
--

DROP TABLE IF EXISTS `transacciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transacciones` (
  `idtransaccion` int(11) NOT NULL AUTO_INCREMENT,
  `idusuarios` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idcreditos` int(11) NOT NULL,
  `idcuotas` int(11) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `monto` decimal(9,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `dias_incumplimiento` int(11) NOT NULL,
  `empleado_gestion` varchar(255) NOT NULL,
  PRIMARY KEY (`idtransaccion`),
  KEY `idusuarios` (`idusuarios`),
  KEY `idcreditos` (`idcreditos`),
  KEY `idproducto` (`idproducto`),
  KEY `idcuotas` (`idcuotas`),
  CONSTRAINT `transacciones_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE,
  CONSTRAINT `transacciones_ibfk_2` FOREIGN KEY (`idcreditos`) REFERENCES `creditos` (`idcreditos`) ON DELETE CASCADE,
  CONSTRAINT `transacciones_ibfk_3` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE,
  CONSTRAINT `transacciones_ibfk_4` FOREIGN KEY (`idcuotas`) REFERENCES `cuotas` (`idcuotas`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacciones`
--

LOCK TABLES `transacciones` WRITE;
/*!40000 ALTER TABLE `transacciones` DISABLE KEYS */;
INSERT INTO `transacciones` VALUES (19,1,2,10,19,'TCH#82517863ac',155.07,'2022-04-07 17:32:35',0,'marco.almagro'),(20,1,2,10,20,'TCH#b35e19c00a',155.07,'2022-04-07 17:32:50',0,'marco.almagro'),(21,1,2,10,21,'TCH#1cdd80a7fc',155.07,'2022-04-07 17:33:04',0,'marco.almagro'),(22,10,3,11,109,'TCH#0ad1ad91a9',20408.05,'2022-04-07 17:52:10',0,'marco.almagro'),(23,10,3,11,110,'TCH#7a64afb416',20408.05,'2022-04-07 17:52:23',0,'marco.almagro');
/*!40000 ALTER TABLE `transacciones` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER CambioEstadoCrediticio_EstadoExcelenteCreditosClientes AFTER INSERT ON transacciones FOR EACH ROW BEGIN
	-- VARIABLE GLOBAL PARA OBTENER CONSULTA
	DECLARE _cuotas_pagadas INT;
    DECLARE _estadocrediticio varchar(255);
 	SET
    	_cuotas_pagadas := (
      		SELECT cuotas_pagadas
      		FROM vista_contadorpagosatiempo_creditosclientes
      		WHERE idcreditos = NEW.idcreditos
    	);
    SET
    	_estadocrediticio := (
      		SELECT estadocrediticio
      		FROM vista_contadorpagosatiempo_creditosclientes
      		WHERE idcreditos = NEW.idcreditos
    	);
    -- SI CLIENTES NO PRESENTA MAYORES RETRASOS Y ES NUEVO CLIENTE, ESTADO SERA EXCELENTE
	IF _cuotas_pagadas>=10 THEN
    	IF _estadocrediticio="Nuevo Cliente" THEN
			UPDATE creditos SET estadocrediticio="Excelente" WHERE idcreditos = NEW.idcreditos;
       	END IF;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER CambioEstadoCuotasVencidas AFTER INSERT ON transacciones FOR EACH ROW BEGIN
	DECLARE _incumplimiento_pago char(2);
    SET
    _incumplimiento_pago := (
      SELECT incumplimiento_pago
      FROM cuotas
      WHERE idcuotas = NEW.idcuotas
    );
    IF _incumplimiento_pago="SI" THEN
    	UPDATE cuotas SET incumplimiento_pago="PT" WHERE idcuotas=NEW.idcuotas; 
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER CambioEstadoCuotas_OrdenPagoCreditosClientes AFTER INSERT ON transacciones FOR EACH ROW UPDATE cuotas SET estadocuota="cancelado" WHERE idcuotas=new.idcuotas */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER CambioEstadoRecordCrediticio_CreditocClientes AFTER INSERT ON transacciones FOR EACH ROW BEGIN
	-- VARIABLE GLOBAL PARA OBTENER CONSULTA
	DECLARE _cuotas_pagadas_tarde INT;
 	SET
    	_cuotas_pagadas_tarde := (
      		SELECT cuotas_pagadas_tarde
      		FROM vista_contadorpagoscuotastardias_creditosclientes
      		WHERE idcreditos = NEW.idcreditos
    	);
    -- SI CLIENTE PRESENTA 2 RETRASOS, SERA REGULAR
	IF _cuotas_pagadas_tarde>=2 THEN
		UPDATE creditos SET estadocrediticio="Regular" WHERE idcreditos = NEW.idcreditos;
    -- SI CLIENTE PRESENTA MAS DE 5 RETRASOS, SERA DEFICIENTE
	IF _cuotas_pagadas_tarde>5 THEN
    	UPDATE creditos SET estadocrediticio="Deficiente" WHERE idcreditos = NEW.idcreditos;
	END IF;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER EnvioNotificacionPagoRecibidoClientesCashmanHa AFTER INSERT ON transacciones FOR EACH ROW INSERT INTO notificaciones (idusuarios,titulonotificacion,descripcionnotificacion,clasificacionnotificacion) SELECT CONCAT(new.idusuarios),CONCAT("Pago Cuota Mensual Recibido"),CONCAT("Pago efectuado con éxito referencia ",new.referencia),CONCAT("pagorecibido") */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER RecalcularSaldoFinal_CreditosClientes AFTER INSERT ON transacciones FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _montocredito decimal(9,2);
   DECLARE _saldocredito decimal(15,6);
   DECLARE _plazocredito INT;
   DECLARE _idproducto INT;
    -- CALCULAR EL CAPITAL AUTOMATICAMENTE
   DECLARE calculocapital decimal(15,6);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
   SET
    _montocredito := (
      SELECT montocredito
      FROM creditos
      WHERE idcreditos = NEW.idcreditos
    );
   SET
    _plazocredito := (
      SELECT plazocredito
      FROM creditos
      WHERE idcreditos = NEW.idcreditos
    );
    SET
    _idproducto := (
      SELECT idproducto
      FROM creditos
      WHERE idcreditos = NEW.idcreditos
    );
   SET
    _saldocredito := (
      SELECT saldocredito
      FROM creditos
      WHERE idcreditos = NEW.idcreditos
    );
   -- CALCULO CAPITAL PRESTAMOS HIPOTECARIOS -> CONVERSION A MESES
   IF _idproducto=3 THEN
   SET calculocapital=_montocredito/(_plazocredito*12);
   -- CALCULO DEMÁS PRODUCTOS
   ELSE 
   SET calculocapital=_montocredito/_plazocredito;
   END IF;
   -- ACTUALIZAR CAPITAL DE CLIENTE ESPECIFICO
   UPDATE creditos SET saldocredito=saldocredito-calculocapital WHERE idcreditos=new.idcreditos;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER RegistroTransaccionesCuotasCreditosClientes_Historico AFTER INSERT ON transacciones FOR EACH ROW INSERT INTO historicotransacciones (idusuarios,idproducto,idcreditos,idcuotas,referencia,monto,fecha,dias_incumplimiento,empleado_gestion) VALUES (NEW.idusuarios,NEW.idproducto,NEW.idcreditos,NEW.idcuotas,NEW.referencia,NEW.monto,NEW.fecha,NEW.dias_incumplimiento,NEW.empleado_gestion) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `CambioEstadoCancelacionCreditosClientes_UltimaCuotaPagada` AFTER INSERT ON `transacciones` FOR EACH ROW BEGIN

	-- VARIABLE DE DATO SALDO CREDITO CLIENTES

   DECLARE _saldocredito decimal(15,6);

   -- OBTENER LAS CONSULTA DE LOS DATOS REQUERIDOS

   SET

    _saldocredito := (

      SELECT saldocredito

      FROM creditos

      WHERE idcreditos = NEW.idcreditos

    );

   -- SI EL SALDO ES IGUAL A CERO "0" ENTONCES CLIENTE HA TERMINADO DE PAGAR SU RESPONSABILIDAD CREDITICIA Y AUTOMATICAMENTE EL CREDITO TOMA EL ESTADO << CANCELADO >>

   IF _saldocredito<1 THEN

   SET _saldocredito=0;

   UPDATE creditos SET estado="cancelado" WHERE idcreditos=new.idcreditos;

   END IF;

   IF _saldocredito<0 THEN

   SET _saldocredito=0;

   UPDATE creditos SET estado="cancelado" WHERE idcreditos=new.idcreditos;

   END IF;

   IF _saldocredito = 0 THEN

   UPDATE creditos SET estado="cancelado" WHERE idcreditos=new.idcreditos;

   END IF;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `transaccionescuentasclientes`
--

DROP TABLE IF EXISTS `transaccionescuentasclientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaccionescuentasclientes` (
  `idtransaccioncuentas` int(11) NOT NULL AUTO_INCREMENT,
  `idusuarios` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idcuentas` int(11) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `monto` decimal(9,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `empleado_gestion` varchar(255) NOT NULL,
  `tipotransaccion` varchar(50) NOT NULL,
  `estadotransaccion` varchar(50) NOT NULL,
  `saldonuevocuenta_transaccion` decimal(9,2) NOT NULL,
  PRIMARY KEY (`idtransaccioncuentas`),
  KEY `idusuarios` (`idusuarios`),
  KEY `idproducto` (`idproducto`),
  KEY `transaccionescuentasclientes_ibfk_3` (`idcuentas`),
  CONSTRAINT `transaccionescuentasclientes_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE,
  CONSTRAINT `transaccionescuentasclientes_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE,
  CONSTRAINT `transaccionescuentasclientes_ibfk_3` FOREIGN KEY (`idcuentas`) REFERENCES `cuentas` (`idcuentas`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccionescuentasclientes`
--

LOCK TABLES `transaccionescuentasclientes` WRITE;
/*!40000 ALTER TABLE `transaccionescuentasclientes` DISABLE KEYS */;
INSERT INTO `transaccionescuentasclientes` VALUES (1,8,1,2,'TDCA-CH#13f32b8d82018a4d',2070.00,'2022-03-24 06:03:40','daniel.rivera','Entrada','Procesada',2100.00),(2,7,1,1,'TDCA-CH#a072a7f54a6ecf6e',50.00,'2022-03-24 06:04:25','daniel.rivera','Entrada','Procesada',400.00),(3,8,1,2,'TOCCA-CH#0e49bd8bece245f08f',75.00,'2022-03-24 06:07:21','Clientes','EnvioTransferencia','Procesada',75.00),(4,7,1,2,'TOCCA-CH#0e49bd8bece245f08f',75.00,'2022-03-24 06:07:21','Clientes','DepositoTransferencia','Procesada',75.00),(5,7,1,1,'TRCA-CH#f67d08f667bc7de9',50.00,'2022-03-25 02:53:14','daniel.rivera','Salida','Procesada',425.00),(6,7,1,1,'TRCA-CH#19507cbb5e5a449f',25.00,'2022-03-25 02:56:39','daniel.rivera','Salida','Procesada',400.00),(7,8,1,2,'TRCA-CH#5ddf2092729922c1',25.00,'2022-03-25 02:58:00','daniel.rivera','Salida','Procesada',2000.00),(8,7,1,1,'TDCA-CH#1ea65a9365e12dec',1900.00,'2022-03-25 02:58:56','daniel.rivera','Entrada','Procesada',2300.00),(9,7,1,1,'TOCCA-CH#89da69d48b48eb23dd',100.00,'2022-03-25 03:29:30','Clientes','EnvioTransferencia','Procesada',100.00),(10,8,1,1,'TOCCA-CH#89da69d48b48eb23dd',100.00,'2022-03-25 03:29:30','Clientes','DepositoTransferencia','Procesada',100.00),(11,9,1,3,'TDCA-CH#d50c7a5860aa1db8',3000.00,'2022-03-25 04:44:42','marco.almagro','Entrada','Procesada',6500.00);
/*!40000 ALTER TABLE `transaccionescuentasclientes` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER RecalcularSaldoFinal_CuentasAhorroClientes AFTER INSERT ON transaccionescuentasclientes FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _montocuenta decimal(9,2);
   DECLARE _monto decimal(9,2);
   DECLARE _tipotransaccion varchar(50);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
   SET
    _montocuenta := (
      SELECT montocuenta
      FROM cuentas
      WHERE idcuentas = NEW.idcuentas
    );
    SET
    _monto := (
      SELECT monto
      FROM transaccionescuentasclientes
      WHERE idtransaccioncuentas  = NEW.idtransaccioncuentas 
    );
    SET
    _tipotransaccion := (
      SELECT tipotransaccion
      FROM transaccionescuentasclientes
      WHERE idtransaccioncuentas  = NEW.idtransaccioncuentas 
    );
    -- VALIDAR SI EL CLIENTE REALIZA UN DEPOSITO O RETIRO A SU CUENTA
    IF (_tipotransaccion = "Entrada") THEN
    UPDATE cuentas SET montocuenta=montocuenta+_monto WHERE idcuentas=new.idcuentas;
    END IF;
    IF (_tipotransaccion = "Salida") THEN
    UPDATE cuentas SET montocuenta=montocuenta-_monto WHERE idcuentas=new.idcuentas;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER AnularTransaccionesCuentasClientes AFTER UPDATE ON transaccionescuentasclientes FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _estadotransaccion varchar(50);
   DECLARE _monto decimal(9,2);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
   SET
    _estadotransaccion := (
      SELECT estadotransaccion
      FROM transaccionescuentasclientes
      WHERE idtransaccioncuentas  = NEW.idtransaccioncuentas 
    );
    SET
    _monto := (
      SELECT monto
      FROM transaccionescuentasclientes
      WHERE idtransaccioncuentas  = NEW.idtransaccioncuentas 
    );
   -- CALCULO REINTEGRO TRANSACCION ANULADA A CUENTAS DE CLIENTES
   IF _estadotransaccion="AnularRetiro" THEN
   UPDATE cuentas SET montocuenta=montocuenta+_monto WHERE idcuentas=new.idcuentas;
   END IF;
   IF _estadotransaccion="AnularDeposito" THEN
   UPDATE cuentas SET montocuenta=montocuenta-_monto WHERE idcuentas=new.idcuentas;
   END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `transferencias`
--

DROP TABLE IF EXISTS `transferencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transferencias` (
  `idtransferencia` int(11) NOT NULL AUTO_INCREMENT,
  `numerocuenta` int(11) DEFAULT NULL,
  `monto` decimal(9,2) DEFAULT NULL,
  `referencia` varchar(255) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(15) DEFAULT 'NoProcesado',
  `idusuarios` int(11) DEFAULT NULL,
  `idusuariodestino` int(11) NOT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `idcuentas` int(11) DEFAULT NULL,
  `idcuentadestino` int(11) NOT NULL,
  PRIMARY KEY (`idtransferencia`),
  KEY `transferencias_ibfk_1` (`idusuarios`),
  KEY `transferencias_ibfk_2` (`idproducto`),
  KEY `transferencias_ibfk_3` (`idcuentas`),
  KEY `transferencias_ibfk_4` (`idusuariodestino`),
  KEY `transferencias_ibfk_5` (`idcuentadestino`),
  CONSTRAINT `transferencias_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE,
  CONSTRAINT `transferencias_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE,
  CONSTRAINT `transferencias_ibfk_3` FOREIGN KEY (`idcuentas`) REFERENCES `cuentas` (`idcuentas`) ON DELETE CASCADE,
  CONSTRAINT `transferencias_ibfk_4` FOREIGN KEY (`idusuariodestino`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE,
  CONSTRAINT `transferencias_ibfk_5` FOREIGN KEY (`idcuentadestino`) REFERENCES `cuentas` (`idcuentas`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transferencias`
--

LOCK TABLES `transferencias` WRITE;
/*!40000 ALTER TABLE `transferencias` DISABLE KEYS */;
INSERT INTO `transferencias` VALUES (1,101462573,75.00,'TOCCA-CH#0e49bd8bece245f08f','2022-03-24 06:07:21','Procesada',8,7,1,2,1),(2,104176523,100.00,'TOCCA-CH#89da69d48b48eb23dd','2022-03-25 03:29:30','Procesada',7,8,1,1,2);
/*!40000 ALTER TABLE `transferencias` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER RecalcularSaldoFinal_TransferenciasClientes AFTER INSERT ON transferencias FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _montocuenta decimal(9,2);
   DECLARE _monto decimal(9,2);
   DECLARE _tipotransaccion varchar(50);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
   SET
    _montocuenta := (
      SELECT montocuenta
      FROM cuentas
      WHERE idcuentas = NEW.idcuentas
    );
    SET
    _monto := (
      SELECT monto
      FROM transferencias
      WHERE idtransferencia   = NEW.idtransferencia  
    ); 
    -- RESTAR SALDO DE TRANSFERENCIA CUENTA DE ORIGEN CLIENTE
    UPDATE cuentas SET montocuenta=montocuenta-_monto WHERE idcuentas=new.idcuentas;
    -- SUMAR SALDO A FAVOR DE TRANSFERENCIA RECIBIDA CLIENTE
    UPDATE cuentas SET montocuenta=montocuenta+_monto WHERE idcuentas=new.idcuentadestino;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER RegistroMovimientosTransferencias_EnvioTransferencias AFTER INSERT ON transferencias FOR EACH ROW BEGIN
	-- VARIABLES DE DATOS CLIENTES
   DECLARE _montocuenta decimal(9,2);
   DECLARE _monto decimal(9,2);
   DECLARE montocuenta decimal(9,2);
   -- OBTENER LAS CONSULTAS DE LOS DATOS REQUERIDOS
    SET
    _montocuenta := (
      SELECT montocuenta
      FROM cuentas
      WHERE idcuentas = NEW.idcuentas
    );
    SET
    _monto := (
      SELECT monto
      FROM transferencias
      WHERE idtransferencia   = NEW.idtransferencia  
    ); 
    -- REGISTRAR MOVIMIENTO ENVIO DE TRANSFERENCIA CLIENTES
    INSERT INTO transaccionescuentasclientes (idusuarios,idproducto,idcuentas,referencia,monto,empleado_gestion,tipotransaccion,estadotransaccion,saldonuevocuenta_transaccion) VALUES(new.idusuarios,new.idproducto,new.idcuentas,new.referencia,new.monto,"Clientes","EnvioTransferencia","Procesada",_monto);
    INSERT INTO transaccionescuentasclientes (idusuarios,idproducto,idcuentas,referencia,monto,empleado_gestion,tipotransaccion,estadotransaccion,saldonuevocuenta_transaccion) VALUES(new.idusuariodestino,new.idproducto,new.idcuentas,new.referencia,new.monto,"Clientes","DepositoTransferencia","Procesada",_monto);
    
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `codigousuario` varchar(255) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `fotoperfil` varchar(255) DEFAULT 'foto_usuarios_nuevos.png',
  `idrol` int(11) NOT NULL,
  `estado_usuario` varchar(25) NOT NULL DEFAULT 'activo',
  `completoperfil` varchar(2) NOT NULL DEFAULT 'no',
  `habilitarsistema` char(2) NOT NULL DEFAULT 'no',
  `nuevousuario` char(2) NOT NULL DEFAULT 'si',
  `poseecuenta` char(2) NOT NULL DEFAULT 'no',
  `poseecredito` char(2) NOT NULL DEFAULT 'no',
  `habilitarnuevoscreditos` char(2) NOT NULL DEFAULT 'si',
  `quienregistro` varchar(255) NOT NULL,
  PRIMARY KEY (`idusuarios`),
  UNIQUE KEY `codigousuario` (`codigousuario`),
  UNIQUE KEY `correo` (`correo`),
  KEY `usuarios_ibfk_1` (`idrol`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Daniel','Rivera','daniel.rivera','f7GC9/YfeAzBc','dan@gmail.com','211543_6214078166f67_b2.PNG',1,'activo','si','si','no','si','si','si','daniel.rivera'),(2,'Norma','Boix','norma.boix','f7GC9/YfeAzBc','normaboix@yahoo.es','foto_usuarios_nuevos.png',1,'activo','si','no','no','no','no','si','daniel.rivera'),(3,'Avelino','Blanco','avelino.blanco','f7GC9/YfeAzBc','avelinoblanco@gmail.com','foto_usuarios_nuevos.png',1,'activo','si','no','no','no','no','si','daniel.rivera'),(4,'Ester','Cuenca','ester.cuenca','f7GC9/YfeAzBc','estercuenca@gmail.com','foto_usuarios_nuevos.png',2,'activo','si','no','no','no','no','si','daniel.rivera'),(5,'Faustino','Padron','faustino.padron','f7GC9/YfeAzBc','faustopadron@gmail.com','foto_usuarios_nuevos.png',3,'activo','si','no','no','no','no','si','daniel.rivera'),(6,'Marco','Almagro','marco.almagro','f7GC9/YfeAzBc','marco111@gmail.com','foto_usuarios_nuevos.png',4,'activo','si','no','no','no','no','si','daniel.rivera'),(7,'Jenifer Abigail','Castañeda','jenifer.abigail','f7GC9/YfeAzBc','jeniferabg@gmail.com','foto_usuarios_nuevos.png',5,'activo','si','si','no','si','no','si','daniel.rivera'),(8,'Maria Cristina','Frances Rosas','maria.frances','f7GC9/YfeAzBc','mariacristinaf@yahoo.com','foto_usuarios_nuevos.png',5,'inactivo','si','si','no','si','no','si','daniel.rivera'),(9,'Luz Mancebo','Llabrés','luz.mancebo','f7GC9/YfeAzBc','luzmcllabres@gmail.com','foto_usuarios_nuevos.png',5,'bloqueado','si','si','no','si','no','si','daniel.rivera'),(10,'Leonel Alexander','Franco González','leonel.franco','e1LW4NPXPhoo.','modificarcorreoreal@gmail.com','foto_usuarios_nuevos.png',5,'activo','si','si','si','si','no','si','daniel.rivera'),(11,'Javier Ernesto','Ponce Díaz','javier.ponce','f7GC9/YfeAzBc','javierponcedi1@yahoo.es','foto_usuarios_nuevos.png',5,'bloqueado','si','si','no','no','no','si','daniel.rivera');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vista_bandejaentradamensajescashmanha`
--

DROP TABLE IF EXISTS `vista_bandejaentradamensajescashmanha`;
/*!50001 DROP VIEW IF EXISTS `vista_bandejaentradamensajescashmanha`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_bandejaentradamensajescashmanha` AS SELECT 
 1 AS `idmensajeria`,
 1 AS `idusuarios`,
 1 AS `idusuariosdestinatario`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `codigousuario`,
 1 AS `fotoperfil`,
 1 AS `nombremensaje`,
 1 AS `asuntomensaje`,
 1 AS `detallemensaje`,
 1 AS `fechamensaje`,
 1 AS `ocultarmensaje`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_calculaduracioncodigoseguridad_transferencias`
--

DROP TABLE IF EXISTS `vista_calculaduracioncodigoseguridad_transferencias`;
/*!50001 DROP VIEW IF EXISTS `vista_calculaduracioncodigoseguridad_transferencias`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_calculaduracioncodigoseguridad_transferencias` AS SELECT 
 1 AS `idcodigo`,
 1 AS `codigoseguridad`,
 1 AS `minutos_expiracion`,
 1 AS `estado`,
 1 AS `idusuarios`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_calculo_ultimaactividad_ticketsreportesplataforma`
--

DROP TABLE IF EXISTS `vista_calculo_ultimaactividad_ticketsreportesplataforma`;
/*!50001 DROP VIEW IF EXISTS `vista_calculo_ultimaactividad_ticketsreportesplataforma`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_calculo_ultimaactividad_ticketsreportesplataforma` AS SELECT 
 1 AS `idreporte`,
 1 AS `idusuarios`,
 1 AS `codigousuario`,
 1 AS `estado`,
 1 AS `dias_ultima_actividad`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_calculocuentasahorooregistradas_interfaces`
--

DROP TABLE IF EXISTS `vista_calculocuentasahorooregistradas_interfaces`;
/*!50001 DROP VIEW IF EXISTS `vista_calculocuentasahorooregistradas_interfaces`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_calculocuentasahorooregistradas_interfaces` AS SELECT 
 1 AS `numero_cuentasahorro_registradas`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_calculocuotasregistradas_interfaces`
--

DROP TABLE IF EXISTS `vista_calculocuotasregistradas_interfaces`;
/*!50001 DROP VIEW IF EXISTS `vista_calculocuotasregistradas_interfaces`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_calculocuotasregistradas_interfaces` AS SELECT 
 1 AS `numero_cuotas_registrados`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_calculocuotasvencidas_interfaces`
--

DROP TABLE IF EXISTS `vista_calculocuotasvencidas_interfaces`;
/*!50001 DROP VIEW IF EXISTS `vista_calculocuotasvencidas_interfaces`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_calculocuotasvencidas_interfaces` AS SELECT 
 1 AS `numero_cuotas_vencidas`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_calculodiasfechavencimiento_cuotasclientes`
--

DROP TABLE IF EXISTS `vista_calculodiasfechavencimiento_cuotasclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_calculodiasfechavencimiento_cuotasclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_calculodiasfechavencimiento_cuotasclientes` AS SELECT 
 1 AS `idcuotas`,
 1 AS `idusuarios`,
 1 AS `idproducto`,
 1 AS `montocancelar`,
 1 AS `estadocuota`,
 1 AS `fechavencimiento`,
 1 AS `incumplimiento_pago`,
 1 AS `dias_incumplimiento`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_calculoexpiracion_codigocambiocredencialesusuarios`
--

DROP TABLE IF EXISTS `vista_calculoexpiracion_codigocambiocredencialesusuarios`;
/*!50001 DROP VIEW IF EXISTS `vista_calculoexpiracion_codigocambiocredencialesusuarios`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_calculoexpiracion_codigocambiocredencialesusuarios` AS SELECT 
 1 AS `idrecuperaciones`,
 1 AS `correo`,
 1 AS `token`,
 1 AS `codigo`,
 1 AS `minutos_expiracion`,
 1 AS `estado`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_calculoingresostransacciones_empleadosatencionclientes`
--

DROP TABLE IF EXISTS `vista_calculoingresostransacciones_empleadosatencionclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_calculoingresostransacciones_empleadosatencionclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_calculoingresostransacciones_empleadosatencionclientes` AS SELECT 
 1 AS `empleado_gestion`,
 1 AS `monto_transacciones_empleados`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_calculonumerocuotascanceladas_interfaces`
--

DROP TABLE IF EXISTS `vista_calculonumerocuotascanceladas_interfaces`;
/*!50001 DROP VIEW IF EXISTS `vista_calculonumerocuotascanceladas_interfaces`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_calculonumerocuotascanceladas_interfaces` AS SELECT 
 1 AS `numero_cuotas_canceladas`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_calculonumerocuotaspagadastarde_interfaces`
--

DROP TABLE IF EXISTS `vista_calculonumerocuotaspagadastarde_interfaces`;
/*!50001 DROP VIEW IF EXISTS `vista_calculonumerocuotaspagadastarde_interfaces`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_calculonumerocuotaspagadastarde_interfaces` AS SELECT 
 1 AS `numero_cuotas_pagadas_tarde`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_calculonumerotransferencias_interfaces`
--

DROP TABLE IF EXISTS `vista_calculonumerotransferencias_interfaces`;
/*!50001 DROP VIEW IF EXISTS `vista_calculonumerotransferencias_interfaces`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_calculonumerotransferencias_interfaces` AS SELECT 
 1 AS `numero_transferencias`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_calculoproductosregistrados_interfaces`
--

DROP TABLE IF EXISTS `vista_calculoproductosregistrados_interfaces`;
/*!50001 DROP VIEW IF EXISTS `vista_calculoproductosregistrados_interfaces`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_calculoproductosregistrados_interfaces` AS SELECT 
 1 AS `numero_productos_registrados`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_calculotransaccionescreditos_interfaces`
--

DROP TABLE IF EXISTS `vista_calculotransaccionescreditos_interfaces`;
/*!50001 DROP VIEW IF EXISTS `vista_calculotransaccionescreditos_interfaces`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_calculotransaccionescreditos_interfaces` AS SELECT 
 1 AS `numero_transacciones_creditos`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_codigosseguridadtransferenciasclientes`
--

DROP TABLE IF EXISTS `vista_codigosseguridadtransferenciasclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_codigosseguridadtransferenciasclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_codigosseguridadtransferenciasclientes` AS SELECT 
 1 AS `idcodigo`,
 1 AS `codigoseguridad`,
 1 AS `fecha`,
 1 AS `estado`,
 1 AS `idusuarios`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_configuracionusuariosgeneral`
--

DROP TABLE IF EXISTS `vista_configuracionusuariosgeneral`;
/*!50001 DROP VIEW IF EXISTS `vista_configuracionusuariosgeneral`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_configuracionusuariosgeneral` AS SELECT 
 1 AS `idusuarios`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `codigousuario`,
 1 AS `correo`,
 1 AS `fotoperfil`,
 1 AS `estado_usuario`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consulta_asignarnuevoscreditosclientes`
--

DROP TABLE IF EXISTS `vista_consulta_asignarnuevoscreditosclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consulta_asignarnuevoscreditosclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consulta_asignarnuevoscreditosclientes` AS SELECT 
 1 AS `idusuarios`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `codigousuario`,
 1 AS `correo`,
 1 AS `fotoperfil`,
 1 AS `completoperfil`,
 1 AS `estado_usuario`,
 1 AS `habilitarnuevoscreditos`,
 1 AS `dui`,
 1 AS `nit`,
 1 AS `telefono`,
 1 AS `celular`,
 1 AS `telefonotrabajo`,
 1 AS `direccion`,
 1 AS `empresa`,
 1 AS `cargo`,
 1 AS `direcciontrabajo`,
 1 AS `fechanacimiento`,
 1 AS `genero`,
 1 AS `estadocivil`,
 1 AS `fotoduifrontal`,
 1 AS `fotoduireverso`,
 1 AS `fotonit`,
 1 AS `fotofirma`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consulta_datosgeneralesresultadosinicioadmins`
--

DROP TABLE IF EXISTS `vista_consulta_datosgeneralesresultadosinicioadmins`;
/*!50001 DROP VIEW IF EXISTS `vista_consulta_datosgeneralesresultadosinicioadmins`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consulta_datosgeneralesresultadosinicioadmins` AS SELECT 
 1 AS `numero_usuarios_registrados`,
 1 AS `numero_productos_registrados`,
 1 AS `numero_reportes_registrados`,
 1 AS `numero_solicitudes_recuperaciones`,
 1 AS `numero_cuotas`,
 1 AS `numero_transacciones`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultacalculoavancecreditos_interfazclientes`
--

DROP TABLE IF EXISTS `vista_consultacalculoavancecreditos_interfazclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consultacalculoavancecreditos_interfazclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultacalculoavancecreditos_interfazclientes` AS SELECT 
 1 AS `idcreditos`,
 1 AS `idusuarios`,
 1 AS `idproducto`,
 1 AS `nombreproducto`,
 1 AS `codigo`,
 1 AS `interescredito`,
 1 AS `cuotamensual`,
 1 AS `montocredito`,
 1 AS `plazocredito`,
 1 AS `enviaralhistorico`,
 1 AS `cuotas_canceladas`,
 1 AS `montocapital`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultacalculocuotascanceladas_creditosclientes`
--

DROP TABLE IF EXISTS `vista_consultacalculocuotascanceladas_creditosclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consultacalculocuotascanceladas_creditosclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultacalculocuotascanceladas_creditosclientes` AS SELECT 
 1 AS `idcreditos`,
 1 AS `idusuarios`,
 1 AS `idproducto`,
 1 AS `montocapital`,
 1 AS `cuotas_canceladas`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultaclientes_creditoscancelados`
--

DROP TABLE IF EXISTS `vista_consultaclientes_creditoscancelados`;
/*!50001 DROP VIEW IF EXISTS `vista_consultaclientes_creditoscancelados`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultaclientes_creditoscancelados` AS SELECT 
 1 AS `idhistorico`,
 1 AS `idusuarios`,
 1 AS `idproducto`,
 1 AS `idcreditos`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `dui`,
 1 AS `nit`,
 1 AS `fotoperfil`,
 1 AS `codigo`,
 1 AS `nombreproducto`,
 1 AS `montocredito`,
 1 AS `interescredito`,
 1 AS `plazocredito`,
 1 AS `cuotamensual`,
 1 AS `estado`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultaclientesmorosos`
--

DROP TABLE IF EXISTS `vista_consultaclientesmorosos`;
/*!50001 DROP VIEW IF EXISTS `vista_consultaclientesmorosos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultaclientesmorosos` AS SELECT 
 1 AS `idcuotas`,
 1 AS `idusuarios`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `dui`,
 1 AS `nombreproducto`,
 1 AS `montocancelar`,
 1 AS `estadocuota`,
 1 AS `fechavencimiento`,
 1 AS `incumplimiento_pago`,
 1 AS `dias_incumplimiento`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultacompletanuevassolicitudescreditosclientesgestiones`
--

DROP TABLE IF EXISTS `vista_consultacompletanuevassolicitudescreditosclientesgestiones`;
/*!50001 DROP VIEW IF EXISTS `vista_consultacompletanuevassolicitudescreditosclientesgestiones`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultacompletanuevassolicitudescreditosclientesgestiones` AS SELECT 
 1 AS `idusuarios`,
 1 AS `idcreditos`,
 1 AS `idproducto`,
 1 AS `tipocliente`,
 1 AS `montocredito`,
 1 AS `interescredito`,
 1 AS `plazocredito`,
 1 AS `cuotamensual`,
 1 AS `saldocredito`,
 1 AS `fechasolicitud`,
 1 AS `salariocliente`,
 1 AS `progreso_solicitud`,
 1 AS `estado`,
 1 AS `observaciones`,
 1 AS `observacion_gerencia`,
 1 AS `observacion_presidencia`,
 1 AS `usuario_empleado`,
 1 AS `cuotas_generadas`,
 1 AS `estadocrediticio`,
 1 AS `proceso_finalizado`,
 1 AS `enviaralhistorico`,
 1 AS `creditoactivo`,
 1 AS `codigo`,
 1 AS `nombreproducto`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `codigousuario`,
 1 AS `fotoperfil`,
 1 AS `idrol`,
 1 AS `dui`,
 1 AS `nit`,
 1 AS `telefono`,
 1 AS `celular`,
 1 AS `telefonotrabajo`,
 1 AS `direccion`,
 1 AS `empresa`,
 1 AS `cargo`,
 1 AS `direcciontrabajo`,
 1 AS `fechanacimiento`,
 1 AS `nombres_referencia1`,
 1 AS `apellidos_referencia1`,
 1 AS `empresa_referencia1`,
 1 AS `profesion_oficioreferencia1`,
 1 AS `telefono_referencia1`,
 1 AS `nombres_referencia2`,
 1 AS `apellidos_referencia2`,
 1 AS `empresa_referencia2`,
 1 AS `profesion_oficioreferencia2`,
 1 AS `telefono_referencia2`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultacompletausuariosdetalles`
--

DROP TABLE IF EXISTS `vista_consultacompletausuariosdetalles`;
/*!50001 DROP VIEW IF EXISTS `vista_consultacompletausuariosdetalles`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultacompletausuariosdetalles` AS SELECT 
 1 AS `idusuarios`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `codigousuario`,
 1 AS `correo`,
 1 AS `fotoperfil`,
 1 AS `idrol`,
 1 AS `estado_usuario`,
 1 AS `completoperfil`,
 1 AS `quienregistro`,
 1 AS `dui`,
 1 AS `nit`,
 1 AS `telefono`,
 1 AS `celular`,
 1 AS `telefonotrabajo`,
 1 AS `direccion`,
 1 AS `empresa`,
 1 AS `cargo`,
 1 AS `direcciontrabajo`,
 1 AS `fechanacimiento`,
 1 AS `genero`,
 1 AS `estadocivil`,
 1 AS `fotoduifrontal`,
 1 AS `fotoduireverso`,
 1 AS `fotonit`,
 1 AS `fotofirma`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultacopiascontrato_suscritocreditosclientes`
--

DROP TABLE IF EXISTS `vista_consultacopiascontrato_suscritocreditosclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consultacopiascontrato_suscritocreditosclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultacopiascontrato_suscritocreditosclientes` AS SELECT 
 1 AS `idusuarios`,
 1 AS `copiacontratocliente`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `codigousuario`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultacuotasgeneradas_creditosaprobadosclientes`
--

DROP TABLE IF EXISTS `vista_consultacuotasgeneradas_creditosaprobadosclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consultacuotasgeneradas_creditosaprobadosclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultacuotasgeneradas_creditosaprobadosclientes` AS SELECT 
 1 AS `idcuotas`,
 1 AS `idusuarios`,
 1 AS `idproducto`,
 1 AS `idcreditos`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `fotoperfil`,
 1 AS `dui`,
 1 AS `nit`,
 1 AS `montocredito`,
 1 AS `interescredito`,
 1 AS `plazocredito`,
 1 AS `cuotamensual`,
 1 AS `montocancelar`,
 1 AS `estadocuota`,
 1 AS `nombreproducto`,
 1 AS `montocapital`,
 1 AS `fechavencimiento`,
 1 AS `incumplimiento_pago`,
 1 AS `dias_incumplimiento`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultacuotashistoricocreditosclientes`
--

DROP TABLE IF EXISTS `vista_consultacuotashistoricocreditosclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consultacuotashistoricocreditosclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultacuotashistoricocreditosclientes` AS SELECT 
 1 AS `idhistoricotransaccion`,
 1 AS `idusuarios`,
 1 AS `idproducto`,
 1 AS `idcreditos`,
 1 AS `idcuotas`,
 1 AS `montocredito`,
 1 AS `interescredito`,
 1 AS `plazocredito`,
 1 AS `cuotamensual`,
 1 AS `referencia`,
 1 AS `montocancelar`,
 1 AS `fecha`,
 1 AS `dias_incumplimiento`,
 1 AS `empleado_gestion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultadatosprestamosdevehiculosclientes`
--

DROP TABLE IF EXISTS `vista_consultadatosprestamosdevehiculosclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consultadatosprestamosdevehiculosclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultadatosprestamosdevehiculosclientes` AS SELECT 
 1 AS `iddatosvehiculos`,
 1 AS `idcreditos`,
 1 AS `idproducto`,
 1 AS `idusuarios`,
 1 AS `placa`,
 1 AS `clase`,
 1 AS `anio`,
 1 AS `capacidad`,
 1 AS `asientos`,
 1 AS `marca`,
 1 AS `modelo`,
 1 AS `numeromotor`,
 1 AS `chasisgrabado`,
 1 AS `chasisvin`,
 1 AS `color`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultadetallecompletotransaccionescuentasclientes`
--

DROP TABLE IF EXISTS `vista_consultadetallecompletotransaccionescuentasclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consultadetallecompletotransaccionescuentasclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultadetallecompletotransaccionescuentasclientes` AS SELECT 
 1 AS `idtransaccioncuentas`,
 1 AS `idusuarios`,
 1 AS `idproducto`,
 1 AS `idcuentas`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `codigo`,
 1 AS `nombreproducto`,
 1 AS `numerocuenta`,
 1 AS `referencia`,
 1 AS `monto`,
 1 AS `fecha`,
 1 AS `empleado_gestion`,
 1 AS `tipotransaccion`,
 1 AS `estadotransaccion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultadetallesinterfazpresidencia`
--

DROP TABLE IF EXISTS `vista_consultadetallesinterfazpresidencia`;
/*!50001 DROP VIEW IF EXISTS `vista_consultadetallesinterfazpresidencia`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultadetallesinterfazpresidencia` AS SELECT 
 1 AS `numero_productos_registrados`,
 1 AS `numero_cuotas_registrados`,
 1 AS `numero_cuentasahorro_registradas`,
 1 AS `numero_transacciones_creditos`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultadetallessolicitudescreditosaprobadosclientes`
--

DROP TABLE IF EXISTS `vista_consultadetallessolicitudescreditosaprobadosclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consultadetallessolicitudescreditosaprobadosclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultadetallessolicitudescreditosaprobadosclientes` AS SELECT 
 1 AS `idusuarios`,
 1 AS `idcreditos`,
 1 AS `idproducto`,
 1 AS `montocredito`,
 1 AS `interescredito`,
 1 AS `plazocredito`,
 1 AS `cuotamensual`,
 1 AS `fechasolicitud`,
 1 AS `estado`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `codigousuario`,
 1 AS `correo`,
 1 AS `fotoperfil`,
 1 AS `dui`,
 1 AS `nit`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultaestadosolicitudcredito_portalclientesbienvenida`
--

DROP TABLE IF EXISTS `vista_consultaestadosolicitudcredito_portalclientesbienvenida`;
/*!50001 DROP VIEW IF EXISTS `vista_consultaestadosolicitudcredito_portalclientesbienvenida`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultaestadosolicitudcredito_portalclientesbienvenida` AS SELECT 
 1 AS `idusuarios`,
 1 AS `estado`,
 1 AS `progreso_solicitud`,
 1 AS `nombreproducto`,
 1 AS `codigo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultaexistenciacuotasmensualesclientes`
--

DROP TABLE IF EXISTS `vista_consultaexistenciacuotasmensualesclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consultaexistenciacuotasmensualesclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultaexistenciacuotasmensualesclientes` AS SELECT 
 1 AS `idcuotas`,
 1 AS `idcreditos`,
 1 AS `idproducto`,
 1 AS `idusuarios`,
 1 AS `nombreproducto`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultaexistenciareferenciasclientes`
--

DROP TABLE IF EXISTS `vista_consultaexistenciareferenciasclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consultaexistenciareferenciasclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultaexistenciareferenciasclientes` AS SELECT 
 1 AS `idreferencias`,
 1 AS `idcreditos`,
 1 AS `idusuarios`,
 1 AS `idproducto`,
 1 AS `nombres_referencia1`,
 1 AS `apellidos_referencia1`,
 1 AS `empresa_referencia1`,
 1 AS `profesion_oficioreferencia1`,
 1 AS `telefono_referencia1`,
 1 AS `nombres_referencia2`,
 1 AS `apellidos_referencia2`,
 1 AS `empresa_referencia2`,
 1 AS `profesion_oficioreferencia2`,
 1 AS `telefono_referencia2`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultageneralreestructuracioncreditosclientes`
--

DROP TABLE IF EXISTS `vista_consultageneralreestructuracioncreditosclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consultageneralreestructuracioncreditosclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultageneralreestructuracioncreditosclientes` AS SELECT 
 1 AS `idusuarios`,
 1 AS `idcreditos`,
 1 AS `montocredito`,
 1 AS `interescredito`,
 1 AS `plazocredito`,
 1 AS `cuotamensual`,
 1 AS `estado`,
 1 AS `fechasolicitud`,
 1 AS `cuotas_generadas`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `codigousuario`,
 1 AS `fotoperfil`,
 1 AS `dui`,
 1 AS `nit`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultageneralusuarios`
--

DROP TABLE IF EXISTS `vista_consultageneralusuarios`;
/*!50001 DROP VIEW IF EXISTS `vista_consultageneralusuarios`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultageneralusuarios` AS SELECT 
 1 AS `idusuarios`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `codigousuario`,
 1 AS `correo`,
 1 AS `fotoperfil`,
 1 AS `idrol`,
 1 AS `estado_usuario`,
 1 AS `completoperfil`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultalistadogeneralcuentasahorrosregistradas`
--

DROP TABLE IF EXISTS `vista_consultalistadogeneralcuentasahorrosregistradas`;
/*!50001 DROP VIEW IF EXISTS `vista_consultalistadogeneralcuentasahorrosregistradas`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultalistadogeneralcuentasahorrosregistradas` AS SELECT 
 1 AS `idcuentas`,
 1 AS `idusuarios`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `fotoperfil`,
 1 AS `dui`,
 1 AS `nit`,
 1 AS `numerocuenta`,
 1 AS `montocuenta`,
 1 AS `estadocuenta`,
 1 AS `fechaapertura`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultanuevo_prestamopersonal_asignado_clientes`
--

DROP TABLE IF EXISTS `vista_consultanuevo_prestamopersonal_asignado_clientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consultanuevo_prestamopersonal_asignado_clientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultanuevo_prestamopersonal_asignado_clientes` AS SELECT 
 1 AS `idproducto`,
 1 AS `idcreditos`,
 1 AS `codigo`,
 1 AS `nombreproducto`,
 1 AS `fechasolicitud`,
 1 AS `montocredito`,
 1 AS `interescredito`,
 1 AS `plazocredito`,
 1 AS `progreso_solicitud`,
 1 AS `progreso_pagocredito`,
 1 AS `estado`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `codigousuario`,
 1 AS `idusuarios`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultanumeroreportesfallasplataformageneral`
--

DROP TABLE IF EXISTS `vista_consultanumeroreportesfallasplataformageneral`;
/*!50001 DROP VIEW IF EXISTS `vista_consultanumeroreportesfallasplataformageneral`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultanumeroreportesfallasplataformageneral` AS SELECT 
 1 AS `numero_reportes_registrados`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultanumerosolicitudesrecuperaciones`
--

DROP TABLE IF EXISTS `vista_consultanumerosolicitudesrecuperaciones`;
/*!50001 DROP VIEW IF EXISTS `vista_consultanumerosolicitudesrecuperaciones`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultanumerosolicitudesrecuperaciones` AS SELECT 
 1 AS `numero_solicitudes_recuperaciones`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultaproductosnuevoscreditos`
--

DROP TABLE IF EXISTS `vista_consultaproductosnuevoscreditos`;
/*!50001 DROP VIEW IF EXISTS `vista_consultaproductosnuevoscreditos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultaproductosnuevoscreditos` AS SELECT 
 1 AS `idproducto`,
 1 AS `codigo`,
 1 AS `nombreproducto`,
 1 AS `estado`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultaproductosregistrados`
--

DROP TABLE IF EXISTS `vista_consultaproductosregistrados`;
/*!50001 DROP VIEW IF EXISTS `vista_consultaproductosregistrados`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultaproductosregistrados` AS SELECT 
 1 AS `numero_productos_registrados`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultardisponibilidadnuevoscreditosclientes`
--

DROP TABLE IF EXISTS `vista_consultardisponibilidadnuevoscreditosclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consultardisponibilidadnuevoscreditosclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultardisponibilidadnuevoscreditosclientes` AS SELECT 
 1 AS `idusuarios`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `codigousuario`,
 1 AS `habilitarnuevoscreditos`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultareportesfallosplataforma`
--

DROP TABLE IF EXISTS `vista_consultareportesfallosplataforma`;
/*!50001 DROP VIEW IF EXISTS `vista_consultareportesfallosplataforma`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultareportesfallosplataforma` AS SELECT 
 1 AS `idreporte`,
 1 AS `idusuarios`,
 1 AS `codigousuario`,
 1 AS `nombrereporte`,
 1 AS `descripcionreporte`,
 1 AS `fotoreporte`,
 1 AS `fecharegistroreporte`,
 1 AS `fechaactualizacionreporte`,
 1 AS `estado`,
 1 AS `comentarioactualizacion`,
 1 AS `empleado_gestion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultatransaccionesclientesgeneral`
--

DROP TABLE IF EXISTS `vista_consultatransaccionesclientesgeneral`;
/*!50001 DROP VIEW IF EXISTS `vista_consultatransaccionesclientesgeneral`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultatransaccionesclientesgeneral` AS SELECT 
 1 AS `idcuotas`,
 1 AS `idusuarios`,
 1 AS `referencia`,
 1 AS `monto`,
 1 AS `fecha`,
 1 AS `empleado_gestion`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `habilitarnuevoscreditos`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultatransaccionescuentasclientes`
--

DROP TABLE IF EXISTS `vista_consultatransaccionescuentasclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_consultatransaccionescuentasclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultatransaccionescuentasclientes` AS SELECT 
 1 AS `idtransaccioncuentas`,
 1 AS `idusuarios`,
 1 AS `idproducto`,
 1 AS `idcuentas`,
 1 AS `numerocuenta`,
 1 AS `codigo`,
 1 AS `nombreproducto`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `dui`,
 1 AS `nit`,
 1 AS `referencia`,
 1 AS `monto`,
 1 AS `fecha`,
 1 AS `empleado_gestion`,
 1 AS `tipotransaccion`,
 1 AS `estadotransaccion`,
 1 AS `saldonuevocuenta_transaccion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo`
--

DROP TABLE IF EXISTS `vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo`;
/*!50001 DROP VIEW IF EXISTS `vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo` AS SELECT 
 1 AS `idusuarios`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `dui`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_consultausuariosregistrados`
--

DROP TABLE IF EXISTS `vista_consultausuariosregistrados`;
/*!50001 DROP VIEW IF EXISTS `vista_consultausuariosregistrados`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_consultausuariosregistrados` AS SELECT 
 1 AS `numero_usuarios_registrados`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_contadorcreditosgestionados_empleadosatencionclientes`
--

DROP TABLE IF EXISTS `vista_contadorcreditosgestionados_empleadosatencionclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_contadorcreditosgestionados_empleadosatencionclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_contadorcreditosgestionados_empleadosatencionclientes` AS SELECT 
 1 AS `usuario_empleado`,
 1 AS `numero_creditos_gestionados`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_contadorincumplimientopagoscreditosclientes`
--

DROP TABLE IF EXISTS `vista_contadorincumplimientopagoscreditosclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_contadorincumplimientopagoscreditosclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_contadorincumplimientopagoscreditosclientes` AS SELECT 
 1 AS `idusuarios`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `total_incumplimientos_pagos`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_contadorpagosatiempo_creditosclientes`
--

DROP TABLE IF EXISTS `vista_contadorpagosatiempo_creditosclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_contadorpagosatiempo_creditosclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_contadorpagosatiempo_creditosclientes` AS SELECT 
 1 AS `idusuarios`,
 1 AS `idcreditos`,
 1 AS `idcuotas`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `estadocrediticio`,
 1 AS `cuotas_pagadas`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_contadorpagoscuotastardias_creditosclientes`
--

DROP TABLE IF EXISTS `vista_contadorpagoscuotastardias_creditosclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_contadorpagoscuotastardias_creditosclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_contadorpagoscuotastardias_creditosclientes` AS SELECT 
 1 AS `idusuarios`,
 1 AS `idcreditos`,
 1 AS `idcuotas`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `estadocrediticio`,
 1 AS `cuotas_pagadas_tarde`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_contadortransacciones_empleadosatencionclientes`
--

DROP TABLE IF EXISTS `vista_contadortransacciones_empleadosatencionclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_contadortransacciones_empleadosatencionclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_contadortransacciones_empleadosatencionclientes` AS SELECT 
 1 AS `numero_transacciones_empleados_atencionclientes`,
 1 AS `empleado_gestion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_datosgeneralescreditoscanceladoshistoricoclientes`
--

DROP TABLE IF EXISTS `vista_datosgeneralescreditoscanceladoshistoricoclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_datosgeneralescreditoscanceladoshistoricoclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_datosgeneralescreditoscanceladoshistoricoclientes` AS SELECT 
 1 AS `idhistorico`,
 1 AS `idproducto`,
 1 AS `idusuarios`,
 1 AS `idcreditos`,
 1 AS `montocredito`,
 1 AS `interescredito`,
 1 AS `plazocredito`,
 1 AS `cuotamensual`,
 1 AS `estado`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `fotoperfil`,
 1 AS `nombreproducto`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_detallecompletotransaccionesempleados`
--

DROP TABLE IF EXISTS `vista_detallecompletotransaccionesempleados`;
/*!50001 DROP VIEW IF EXISTS `vista_detallecompletotransaccionesempleados`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_detallecompletotransaccionesempleados` AS SELECT 
 1 AS `idtransaccion`,
 1 AS `idusuarios`,
 1 AS `idproducto`,
 1 AS `idcreditos`,
 1 AS `idcuotas`,
 1 AS `referencia`,
 1 AS `monto`,
 1 AS `fecha`,
 1 AS `dias_incumplimiento`,
 1 AS `empleado_gestion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_detalleinterfazgerencia`
--

DROP TABLE IF EXISTS `vista_detalleinterfazgerencia`;
/*!50001 DROP VIEW IF EXISTS `vista_detalleinterfazgerencia`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_detalleinterfazgerencia` AS SELECT 
 1 AS `numero_productos_registrados`,
 1 AS `numero_cuotas_registrados`,
 1 AS `numero_cuentasahorro_registradas`,
 1 AS `numero_transacciones_creditos`,
 1 AS `numero_cuotas_pagadas_tarde`,
 1 AS `numero_cuotas_canceladas`,
 1 AS `numero_transferencias`,
 1 AS `numero_cuotas_vencidas`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_detallesfacturacioncreditosclientes`
--

DROP TABLE IF EXISTS `vista_detallesfacturacioncreditosclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_detallesfacturacioncreditosclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_detallesfacturacioncreditosclientes` AS SELECT 
 1 AS `idcuotas`,
 1 AS `idcreditos`,
 1 AS `idproducto`,
 1 AS `idusuarios`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `dui`,
 1 AS `nit`,
 1 AS `cuotamensual`,
 1 AS `montocancelar`,
 1 AS `nombreproducto`,
 1 AS `codigo`,
 1 AS `montocapital`,
 1 AS `fechavencimiento`,
 1 AS `referencia`,
 1 AS `fecha`,
 1 AS `dias_incumplimiento`,
 1 AS `empleado_gestion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_detallesfacturacioncreditosclienteshistoricos`
--

DROP TABLE IF EXISTS `vista_detallesfacturacioncreditosclienteshistoricos`;
/*!50001 DROP VIEW IF EXISTS `vista_detallesfacturacioncreditosclienteshistoricos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_detallesfacturacioncreditosclienteshistoricos` AS SELECT 
 1 AS `idhistoricotransaccion`,
 1 AS `idusuarios`,
 1 AS `idcreditos`,
 1 AS `idcuotas`,
 1 AS `idproducto`,
 1 AS `codigo`,
 1 AS `nombreproducto`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `dui`,
 1 AS `nit`,
 1 AS `referencia`,
 1 AS `montocredito`,
 1 AS `cuotamensual`,
 1 AS `montocancelar`,
 1 AS `fecha`,
 1 AS `dias_incumplimiento`,
 1 AS `empleado_gestion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_detallesusuarios`
--

DROP TABLE IF EXISTS `vista_detallesusuarios`;
/*!50001 DROP VIEW IF EXISTS `vista_detallesusuarios`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_detallesusuarios` AS SELECT 
 1 AS `iddetalle`,
 1 AS `dui`,
 1 AS `nit`,
 1 AS `telefono`,
 1 AS `celular`,
 1 AS `telefonotrabajo`,
 1 AS `direccion`,
 1 AS `empresa`,
 1 AS `cargo`,
 1 AS `direcciontrabajo`,
 1 AS `fechanacimiento`,
 1 AS `genero`,
 1 AS `estadocivil`,
 1 AS `idusuarios`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_notificacionesrecibidasusuarios`
--

DROP TABLE IF EXISTS `vista_notificacionesrecibidasusuarios`;
/*!50001 DROP VIEW IF EXISTS `vista_notificacionesrecibidasusuarios`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_notificacionesrecibidasusuarios` AS SELECT 
 1 AS `idnotificacion`,
 1 AS `idusuarios`,
 1 AS `titulonotificacion`,
 1 AS `descripcionnotificacion`,
 1 AS `fechanotificacion`,
 1 AS `clasificacionnotificacion`,
 1 AS `ocultarnotificacion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_numerocuotasregistradas`
--

DROP TABLE IF EXISTS `vista_numerocuotasregistradas`;
/*!50001 DROP VIEW IF EXISTS `vista_numerocuotasregistradas`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_numerocuotasregistradas` AS SELECT 
 1 AS `numero_cuotas`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_numerotransaccionesprocesadas`
--

DROP TABLE IF EXISTS `vista_numerotransaccionesprocesadas`;
/*!50001 DROP VIEW IF EXISTS `vista_numerotransaccionesprocesadas`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_numerotransaccionesprocesadas` AS SELECT 
 1 AS `numero_transacciones`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_productoscashmanha`
--

DROP TABLE IF EXISTS `vista_productoscashmanha`;
/*!50001 DROP VIEW IF EXISTS `vista_productoscashmanha`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_productoscashmanha` AS SELECT 
 1 AS `idproducto`,
 1 AS `codigo`,
 1 AS `nombreproducto`,
 1 AS `descripcionproducto`,
 1 AS `requisitosproductos`,
 1 AS `estado`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_reporteiniciosdesesiones`
--

DROP TABLE IF EXISTS `vista_reporteiniciosdesesiones`;
/*!50001 DROP VIEW IF EXISTS `vista_reporteiniciosdesesiones`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_reporteiniciosdesesiones` AS SELECT 
 1 AS `idacceso`,
 1 AS `fechaacceso`,
 1 AS `dispositivo`,
 1 AS `sistemaoperativo`,
 1 AS `idusuarios`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_rolesdeusuarioscompleto`
--

DROP TABLE IF EXISTS `vista_rolesdeusuarioscompleto`;
/*!50001 DROP VIEW IF EXISTS `vista_rolesdeusuarioscompleto`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_rolesdeusuarioscompleto` AS SELECT 
 1 AS `idrol`,
 1 AS `nombrerol`,
 1 AS `descripcionrol`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_transaccionespagocuotascreditosclientes`
--

DROP TABLE IF EXISTS `vista_transaccionespagocuotascreditosclientes`;
/*!50001 DROP VIEW IF EXISTS `vista_transaccionespagocuotascreditosclientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_transaccionespagocuotascreditosclientes` AS SELECT 
 1 AS `idtransaccion`,
 1 AS `idusuarios`,
 1 AS `idcuotas`,
 1 AS `referencia`,
 1 AS `monto`,
 1 AS `fecha`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_usuariosperfilincompleto`
--

DROP TABLE IF EXISTS `vista_usuariosperfilincompleto`;
/*!50001 DROP VIEW IF EXISTS `vista_usuariosperfilincompleto`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_usuariosperfilincompleto` AS SELECT 
 1 AS `idusuarios`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `codigousuario`,
 1 AS `correo`,
 1 AS `fotoperfil`,
 1 AS `idrol`,
 1 AS `estado_usuario`,
 1 AS `completoperfil`,
 1 AS `quienregistro`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'cashmanha'
--
/*!50106 SET @save_time_zone= @@TIME_ZONE */ ;
/*!50106 DROP EVENT IF EXISTS `CambioEstadoCuotasClientes_IncumplimientoPagos` */;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8mb4 */ ;;
/*!50003 SET character_set_results = utf8mb4 */ ;;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`root`@`localhost`*/ /*!50106 EVENT `CambioEstadoCuotasClientes_IncumplimientoPagos` ON SCHEDULE EVERY 100 SECOND STARTS '2022-04-08 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE vista_calculodiasfechavencimiento_cuotasclientes SET incumplimiento_pago="SI" WHERE dias_incumplimiento>0 AND estadocuota="pendiente" */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
/*!50106 DROP EVENT IF EXISTS `CambioEstadosCodigoSeguridad` */;;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8mb4 */ ;;
/*!50003 SET character_set_results = utf8mb4 */ ;;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`root`@`localhost`*/ /*!50106 EVENT `CambioEstadosCodigoSeguridad` ON SCHEDULE EVERY 30 SECOND STARTS '2022-04-08 00:00:00' ON COMPLETION PRESERVE ENABLE DO CALL CambioEstadoCodigoSeguridad() */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
/*!50106 DROP EVENT IF EXISTS `CambioEstadoTicketsReportesPlataforma_Inactividad` */;;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8mb4 */ ;;
/*!50003 SET character_set_results = utf8mb4 */ ;;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`root`@`localhost`*/ /*!50106 EVENT `CambioEstadoTicketsReportesPlataforma_Inactividad` ON SCHEDULE EVERY 2 MINUTE STARTS '2022-04-08 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE vista_calculo_ultimaactividad_ticketsreportesplataforma SET estado="cerrado" WHERE estado="resuelto" OR estado="no resuelto" OR dias_ultima_actividad>3 */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
/*!50106 DROP EVENT IF EXISTS `ExpirarCodigoSeguridad_TransferenciasClientes` */;;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8mb4 */ ;;
/*!50003 SET character_set_results = utf8mb4 */ ;;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`root`@`localhost`*/ /*!50106 EVENT `ExpirarCodigoSeguridad_TransferenciasClientes` ON SCHEDULE EVERY 30 SECOND STARTS '2022-04-08 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE vista_calculaduracioncodigoseguridad_transferencias SET estado="Vencido" WHERE minutos_expiracion>2 */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
/*!50106 DROP EVENT IF EXISTS `SumatoriaMoraCuotasClientesVencidas` */;;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8mb4 */ ;;
/*!50003 SET character_set_results = utf8mb4 */ ;;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`root`@`localhost`*/ /*!50106 EVENT `SumatoriaMoraCuotasClientesVencidas` ON SCHEDULE EVERY 1 DAY STARTS '2022-04-08 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE cuotas SET montocancelar=montocancelar+5.99 WHERE incumplimiento_pago="SI" */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
DELIMITER ;
/*!50106 SET TIME_ZONE= @save_time_zone */ ;

--
-- Dumping routines for database 'cashmanha'
--
/*!50003 DROP PROCEDURE IF EXISTS `ActivarCuentasAhorroRegistradasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActivarCuentasAhorroRegistradasClientes`(IN _idcuentas INT)
UPDATE cuentas SET estadocuenta="activa" WHERE idcuentas=_idcuentas ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActivarProductosCashManHa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActivarProductosCashManHa`(IN _idproducto INT)
UPDATE productos SET estado="activo" WHERE idproducto=_idproducto ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizacionDatosCuenta_InicioSesionUsuariosPrimeraVez` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizacionDatosCuenta_InicioSesionUsuariosPrimeraVez`(IN _idusuarios INT, IN _codigousuario VARCHAR(255), IN _contrasenia VARCHAR(255), IN _nuevousuario CHAR(2))
UPDATE usuarios SET codigousuario = _codigousuario, contrasenia=_contrasenia, nuevousuario=_nuevousuario WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizacionDatosNuevasSolicitudesCreditos_PrimeraRevision` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizacionDatosNuevasSolicitudesCreditos_PrimeraRevision`(IN _idcreditos INT, IN _tipocliente VARCHAR(50), IN _montocredito DECIMAL(9,2), IN _interescredito FLOAT, IN _plazocredito INT, IN _cuotamensual DECIMAL(9,2), IN _salariocliente DECIMAL(9,2), IN _saldocredito DECIMAL(9,2), IN _estado VARCHAR(30), IN _observacion_gerencia VARCHAR(1500), IN _progreso_solicitud TINYINT(4), IN _fecha_ultimarevision TIMESTAMP, IN _usuario_gestionando VARCHAR(255))
UPDATE creditos SET tipocliente=_tipocliente, montocredito=_montocredito, interescredito=_interescredito, plazocredito=_plazocredito, cuotamensual=_cuotamensual, salariocliente=_salariocliente, saldocredito = _saldocredito, observacion_gerencia=_observacion_gerencia, estado=_estado, progreso_solicitud=_progreso_solicitud, fecha_ultimarevision=_fecha_ultimarevision, usuario_gestionando=_usuario_gestionando WHERE idcreditos=_idcreditos ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizacionRevisionFinalPresidencia_SolicitudCreditoClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizacionRevisionFinalPresidencia_SolicitudCreditoClientes`(IN _idcreditos INT, IN _estado VARCHAR(30), IN _observacion_presidencia VARCHAR(1500), IN _progreso_solicitud TINYINT(4), IN _fecha_ultimarevision TIMESTAMP, IN _usuario_gestionando VARCHAR(255))
UPDATE creditos SET estado=_estado, observacion_presidencia=_observacion_presidencia, progreso_solicitud=_progreso_solicitud, fecha_ultimarevision=_fecha_ultimarevision, usuario_gestionando=_usuario_gestionando WHERE idcreditos=_idcreditos ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizacionSaldoCreditosClientes_ReestructuracionSolicitudes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizacionSaldoCreditosClientes_ReestructuracionSolicitudes`(IN idcreditos INT, IN _saldocredito DECIMAL(9,2))
UPDATE creditos SET saldocredito=_saldocredito WHERE idcreditos=_idcreditos ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizacionTicketsReportesFallosPlataforma` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizacionTicketsReportesFallosPlataforma`(IN _idreporte INT, IN _estado VARCHAR(50), IN _comentarioactualizacion VARCHAR(3000), IN _empleado_gestion VARCHAR(255))
UPDATE reporteproblemasplataforma SET estado=_estado, comentarioactualizacion=_comentarioactualizacion, empleado_gestion=_empleado_gestion WHERE idreporte=_idreporte ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarConfiguracionCuentasAdministradoresConFoto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasAdministradoresConFoto`(IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _codigousuario VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255), IN _fotoperfil VARCHAR(255))
UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, contrasenia=_contrasenia, correo=_correo, fotoperfil=_fotoperfil WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarConfiguracionCuentasAdministradoresSinFoto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasAdministradoresSinFoto`(IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _codigousuario VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255))
UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, contrasenia=_contrasenia, correo=_correo WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarConfiguracionCuentasClientesConFoto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasClientesConFoto`(IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255), IN _fotoperfil VARCHAR(255))
UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, contrasenia=_contrasenia, correo=_correo, fotoperfil=_fotoperfil WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarConfiguracionCuentasClientesSinFoto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasClientesSinFoto`(IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255))
UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, contrasenia=_contrasenia, correo=_correo WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarConfiguracionCuentasGerenciaConFoto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasGerenciaConFoto`(IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255), IN _fotoperfil VARCHAR(255))
UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, contrasenia=_contrasenia, correo=_correo, fotoperfil=_fotoperfil WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarConfiguracionCuentasGerenciaSinFoto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasGerenciaSinFoto`(IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255))
UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, contrasenia=_contrasenia, correo=_correo WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarConfiguracionCuentasPresidenciaConFoto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasPresidenciaConFoto`(IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _codigousuario VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255), IN _fotoperfil VARCHAR(255))
UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, contrasenia=_contrasenia, correo=_correo, fotoperfil=_fotoperfil WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarConfiguracionCuentasPresidenciaSinFoto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarConfiguracionCuentasPresidenciaSinFoto`(IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _codigousuario VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255))
UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, contrasenia=_contrasenia, correo=_correo WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarDetallesUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarDetallesUsuarios`(IN _idusuarios INT, IN _dui VARCHAR(10), IN _nit VARCHAR(17), IN _telefono VARCHAR(9), IN _celular VARCHAR(9), IN _telefonotrabajo VARCHAR(9), IN _direccion VARCHAR(255), IN _empresa VARCHAR(255), IN _cargo VARCHAR(255), IN _direcciontrabajo VARCHAR(255), IN _fechanacimiento DATE, IN _genero CHAR(1), IN _estadocivil VARCHAR(30))
UPDATE detalleusuarios SET dui=_dui, nit=_nit, telefono=_telefono, celular=_celular, telefonotrabajo=_telefonotrabajo, direccion=_direccion, empresa=_empresa, cargo=_cargo, direcciontrabajo=_direcciontrabajo, fechanacimiento=_fechanacimiento, genero=_genero, estadocivil=_estadocivil WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AnularDepositosTransaccionesCuentasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AnularDepositosTransaccionesCuentasClientes`(IN _idtransaccioncuentas INT)
UPDATE transaccionescuentasclientes SET estadotransaccion="AnularDeposito" WHERE idtransaccioncuentas=_idtransaccioncuentas ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AnularRetirosTransaccionesCuentasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AnularRetirosTransaccionesCuentasClientes`(IN _idtransaccioncuentas INT)
UPDATE transaccionescuentasclientes SET estadotransaccion="AnularRetiro" WHERE idtransaccioncuentas=_idtransaccioncuentas ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BloquearCuentasAhorroRegistradasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BloquearCuentasAhorroRegistradasClientes`(IN _idcuentas INT)
UPDATE cuentas SET estadocuenta="bloqueada" WHERE idcuentas=_idcuentas ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BloquearUsuarios_Clientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BloquearUsuarios_Clientes`(IN _idusuarios INT)
UPDATE usuarios SET estado_usuario="bloqueado" WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CambioContraseniaRecuperacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CambioContraseniaRecuperacion`(IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255))
UPDATE usuarios SET contrasenia=_contrasenia WHERE correo=_correo ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CambioEstadoCodigoSeguridad` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CambioEstadoCodigoSeguridad`()
UPDATE vista_calculoexpiracion_codigocambiocredencialesusuarios SET estado="vencido" WHERE minutos_expiracion>6 AND estado="usado" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CambioEstadoToken` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CambioEstadoToken`(IN _correo VARCHAR(255), IN _token VARCHAR(255), IN _codigo INT, IN _estado VARCHAR(15))
UPDATE recuperacion SET estado="usado" WHERE correo=_correo AND token=_token AND codigo=_codigo ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CerrarCuentasAhorroRegistradasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CerrarCuentasAhorroRegistradasClientes`(IN _idcuentas INT)
UPDATE cuentas SET estadocuenta="cerrada" WHERE idcuentas=_idcuentas ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ComprobacionRegistroNuevasSolicitudesCrediticias_Clientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ComprobacionRegistroNuevasSolicitudesCrediticias_Clientes`(IN _idusuarios INT)
SELECT * FROM vista_consultardisponibilidadnuevoscreditosclientes WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaCompletaRolesDeUsuariosRegistrados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaCompletaRolesDeUsuariosRegistrados`()
SELECT * FROM vista_rolesdeusuarioscompleto ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaCompleta_CuotasGeneradasClientes_CreditosActivos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaCompleta_CuotasGeneradasClientes_CreditosActivos`(IN _idusuarios INT)
SELECT * FROM vista_consultacuotasgeneradas_creditosaprobadosclientes WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaCompleta_CuotasGeneradasClientes_CreditosCancelados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaCompleta_CuotasGeneradasClientes_CreditosCancelados`(IN _idusuarios INT, IN _idcreditos INT)
SELECT * FROM vista_consultacuotashistoricocreditosclientes WHERE idusuarios=_idusuarios AND idcreditos=_idcreditos ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaCompleta_ReportesFallosPlataforma` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaCompleta_ReportesFallosPlataforma`()
SELECT * FROM vista_consultareportesfallosplataforma ORDER BY fecharegistroreporte ASC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaConfirmacionIngresoReferenciasPersonalesClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaConfirmacionIngresoReferenciasPersonalesClientes`(IN _idusuarios INT)
SELECT * FROM vista_consultanuevo_prestamopersonal_asignado_clientes WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaCuotasVencidasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaCuotasVencidasClientes`(IN _idcuotas INT)
SELECT DATEDIFF(CURDATE() , (select MAX(fechavencimiento)
                             from cuotas 
                             where idcuotas = _idcuotas)) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaDatosClientes_NuevasCuentasAhorrosDepositoPlazoFijo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDatosClientes_NuevasCuentasAhorrosDepositoPlazoFijo`()
SELECT * FROM vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaDatosClientes_TransferenciasCuentasAhorros` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDatosClientes_TransferenciasCuentasAhorros`(IN _numerocuenta INT)
SELECT * FROM vista_consultalistadogeneralcuentasahorrosregistradas WHERE numerocuenta=_numerocuenta ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaDatosGenerales_InicioPlataformaAdministradores` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDatosGenerales_InicioPlataformaAdministradores`()
SELECT * FROM vista_consulta_datosgeneralesresultadosinicioadmins ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaDatosGenerales_InicioPlataformaGerencia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDatosGenerales_InicioPlataformaGerencia`()
SELECT * FROM vista_detalleinterfazgerencia ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaDatosGenerales_InicioPlataformaPresidencia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDatosGenerales_InicioPlataformaPresidencia`()
SELECT * FROM vista_consultadetallesinterfazpresidencia ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaDatosSolicitudCrediticiaClientes_Historicos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDatosSolicitudCrediticiaClientes_Historicos`(IN _idusuarios INT, IN _idcreditos INT)
SELECT * FROM vista_datosgeneralescreditoscanceladoshistoricoclientes  WHERE idusuarios=_idusuarios AND idcreditos=_idcreditos ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaDatosVehiculos_PrestamosdeVehiculosClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDatosVehiculos_PrestamosdeVehiculosClientes`(IN _idusuarios INT)
SELECT * FROM vista_consultadatosprestamosdevehiculosclientes WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaDetalleCompletoTransacciones_PagoCuotasCreditosEmpleados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDetalleCompletoTransacciones_PagoCuotasCreditosEmpleados`(IN _empleado_gestion VARCHAR(255))
SELECT * FROM vista_consultatransaccionesclientesgeneral WHERE empleado_gestion=_empleado_gestion ORDER BY fecha DESC LIMIT 200 ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaDetalleComprobanteDepositoCuentasAhorroClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDetalleComprobanteDepositoCuentasAhorroClientes`(IN _idtransaccioncuentas INT, IN _idusuarios INT)
SELECT * FROM vista_consultatransaccionescuentasclientes WHERE  idtransaccioncuentas=_idtransaccioncuentas AND idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaDetalleComprobanteDepositoCuentasAhorroClientes_P1` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDetalleComprobanteDepositoCuentasAhorroClientes_P1`(IN _idusuarios INT)
SELECT * FROM vista_consultatransaccionescuentasclientes WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaDisponibilidadCodigoUnicoProductos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDisponibilidadCodigoUnicoProductos`(IN _codigo VARCHAR(255))
SELECT * FROM productos WHERE codigo=_codigo ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaDisponibilidadUsuariosUnicos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaDisponibilidadUsuariosUnicos`(IN _codigousuario VARCHAR(255))
SELECT * FROM usuarios WHERE codigousuario=_codigousuario ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaEspecificaCuotasClientes_OrdenPagoSistemaPagos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEspecificaCuotasClientes_OrdenPagoSistemaPagos`(IN _idusuarios INT, IN _idcuotas INT)
SELECT * FROM vista_consultacuotasgeneradas_creditosaprobadosclientes WHERE idusuarios=_idusuarios AND idcuotas=_idcuotas ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaEspecificaDatosCuentasAhorroClientesCashmanha` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEspecificaDatosCuentasAhorroClientesCashmanha`(IN _idusuarios INT)
SELECT * FROM vista_consultalistadogeneralcuentasahorrosregistradas WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaEspecificaRolesDeUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEspecificaRolesDeUsuarios`(IN _idrol INT)
SELECT * from vista_rolesdeusuarioscompleto WHERE idrol=_idrol ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaEspecificaSolicitudesCreditosAprobadas_EnCurso` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEspecificaSolicitudesCreditosAprobadas_EnCurso`(IN _idusuarios INT)
SELECT * FROM vista_consultadetallessolicitudescreditosaprobadosclientes WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaEspecificaSolicitudesReestructuracionCreditosClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEspecificaSolicitudesReestructuracionCreditosClientes`(IN _usuario_empleado VARCHAR(255))
SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE estado="reestructuracion" AND usuario_empleado=_usuario_empleado ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaEspecificaTransaccionesCuentasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEspecificaTransaccionesCuentasClientes`(IN _idusuarios INT)
SELECT * FROM vista_consultadetallecompletotransaccionescuentasclientes WHERE idusuarios=_idusuarios ORDER BY fecha DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaEspecifica_ReportesFallosPlataforma` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEspecifica_ReportesFallosPlataforma`(IN _idreporte INT)
SELECT * FROM vista_consultareportesfallosplataforma WHERE idreporte=_idreporte ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaGeneralCompletaUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralCompletaUsuarios`(IN _idusuarios INT)
SELECT * FROM vista_consultacompletausuariosdetalles WHERE completoperfil="si" AND idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaGeneralListadoClientesNuevosCreditos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralListadoClientesNuevosCreditos`()
SELECT * FROM vista_consulta_asignarnuevoscreditosclientes WHERE completoperfil="si" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaGeneralProductosRegistrados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralProductosRegistrados`(IN _idproducto INT)
SELECT * FROM vista_productoscashmanha WHERE idproducto=_idproducto ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaGeneralReestructuracionCreditosClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralReestructuracionCreditosClientes`()
SELECT * FROM vista_consultageneralreestructuracioncreditosclientes WHERE cuotas_generadas="no" AND estado="reestructuracion" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaGeneralSolicitudesCreditosDenegadasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralSolicitudesCreditosDenegadasClientes`()
SELECT * FROM vista_consultageneralreestructuracioncreditosclientes WHERE cuotas_generadas="no" AND estado="denegado" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaGeneralTransaccionesCuentasClientesAnuladas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralTransaccionesCuentasClientesAnuladas`()
SELECT * FROM vista_consultatransaccionescuentasclientes WHERE estadotransaccion="AnularDeposito" OR estadotransaccion="AnularRetiro" ORDER BY fecha DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaGeneralTransaccionesCuentasClientesProcesadas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralTransaccionesCuentasClientesProcesadas`()
SELECT * FROM vista_consultatransaccionescuentasclientes WHERE estadotransaccion="Procesada" ORDER BY fecha DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaGeneralUsuariosBloqueados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralUsuariosBloqueados`()
SELECT * FROM vista_consultageneralusuarios WHERE estado_usuario="bloqueado" AND completoperfil="si" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaGeneralUsuariosInactivos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralUsuariosInactivos`()
SELECT * FROM vista_consultageneralusuarios WHERE estado_usuario="inactivo" AND completoperfil="si" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaGeneralUsuariosRegistrados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGeneralUsuariosRegistrados`()
SELECT * FROM vista_consultageneralusuarios WHERE estado_usuario="activo" AND completoperfil="si" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaGestionadorCuotasMensualesContratos_CreditosAprobados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaGestionadorCuotasMensualesContratos_CreditosAprobados`(IN _idusuarios INT)
SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE idusuarios=_idusuarios AND estado="aprobado" OR estado="cancelado" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaIdUnicoCreditos_ProductosClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaIdUnicoCreditos_ProductosClientes`(IN _idusuarios INT)
SELECT idcreditos, idproducto, nombreproducto, progreso_solicitud FROM vista_consultanuevo_prestamopersonal_asignado_clientes WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaListadoCuentasAhorrosRegistradas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaListadoCuentasAhorrosRegistradas`()
SELECT * FROM vista_consultalistadogeneralcuentasahorrosregistradas ORDER BY nombres ASC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaListadoGeneralCreditosAprobados_EnCurso` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaListadoGeneralCreditosAprobados_EnCurso`()
SELECT * FROM vista_consultadetallessolicitudescreditosaprobadosclientes WHERE estado="aprobado" OR estado="cancelado" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaListadoGeneralCuotasClientesMorosos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaListadoGeneralCuotasClientesMorosos`()
SELECT * FROM vista_consultaclientesmorosos WHERE dias_incumplimiento>0 AND estadocuota="pendiente" ORDER BY dias_incumplimiento DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaMensajesBandejaEntradaUsuariosCashmanHa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaMensajesBandejaEntradaUsuariosCashmanHa`(IN _idusuariosdestinatario INT)
SELECT * FROM vista_bandejaentradamensajescashmanha WHERE idusuariosdestinatario=_idusuariosdestinatario AND ocultarmensaje="no" ORDER BY fechamensaje DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaNombresCompletos_EnviarMensajeriaNuevaUsuariosCashManHa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaNombresCompletos_EnviarMensajeriaNuevaUsuariosCashManHa`()
SELECT idusuarios, nombres, apellidos, codigousuario FROM usuarios ORDER BY nombres ASC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaNotificacionesRecortada_BarraHerramientasPlataforma` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaNotificacionesRecortada_BarraHerramientasPlataforma`(IN _idusuarios INT)
SELECT titulonotificacion,descripcionnotificacion,fechanotificacion,clasificacionnotificacion FROM vista_notificacionesrecibidasusuarios WHERE idusuarios=_idusuarios AND ocultarnotificacion="no" ORDER BY fechanotificacion DESC LIMIT 25 ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaNuevasAsignacioneCreditosClientes_PrimeraRevision` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaNuevasAsignacioneCreditosClientes_PrimeraRevision`(IN _idusuarios INT)
SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE idusuarios=_idusuarios AND estado="en proceso" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaNuevasAsignacioneCreditosClientes_SegundaRevision` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaNuevasAsignacioneCreditosClientes_SegundaRevision`(IN _idusuarios INT)
SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE idusuarios=_idusuarios AND estado="aprobacioninicial" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarAvanceCreditosClientes_InterfazInicioClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarAvanceCreditosClientes_InterfazInicioClientes`(IN _idusuarios INT)
SELECT * FROM vista_consultacalculoavancecreditos_interfazclientes WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarConfiguracionCuentaUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarConfiguracionCuentaUsuarios`(IN _idusuarios INT)
SELECT * FROM vista_configuracionusuariosgeneral WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCopiaContratoCreditos_Clientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCopiaContratoCreditos_Clientes`(IN _idusuarios INT)
SELECT * FROM vista_consultacopiascontrato_suscritocreditosclientes WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCorreoRecuperacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCorreoRecuperacion`(IN _correo VARCHAR(255))
SELECT * FROM usuarios WHERE correo=_correo ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarDatosClientes_CreditosCanceladosFiniquitoCancelacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDatosClientes_CreditosCanceladosFiniquitoCancelacion`(IN _idusuarios INT, IN _idhistorico INT)
SELECT * FROM vista_consultaclientes_creditoscancelados WHERE estado="cancelado" AND idusuarios=_idusuarios AND idhistorico=_idhistorico ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarDetallesMensajesBandejaEntradaUsuariosCashmanHa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDetallesMensajesBandejaEntradaUsuariosCashmanHa`(IN _idusuariosdestinatario INT, IN _idmensajeria INT)
SELECT * FROM vista_bandejaentradamensajescashmanha WHERE idusuariosdestinatario=_idusuariosdestinatario AND idmensajeria=_idmensajeria ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarDisponibilidadNumeroCuentaAhorroClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDisponibilidadNumeroCuentaAhorroClientes`(IN _numerocuenta INT)
SELECT * FROM cuentas WHERE numerocuenta=_numerocuenta ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaReestructuracionesCreditosNuevasSolicitudesClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaReestructuracionesCreditosNuevasSolicitudesClientes`(IN _idusuarios INT)
SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE idusuarios=_idusuarios AND estado="reestructuracion" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarEstadoSolicitudCrediticia_BienvenidaPortalClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEstadoSolicitudCrediticia_BienvenidaPortalClientes`(IN _idusuarios INT)
SELECT * FROM vista_consultaestadosolicitudcredito_portalclientesbienvenida WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarExistenciaCuentaAhorros_SistemaTransferenciasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarExistenciaCuentaAhorros_SistemaTransferenciasClientes`(IN _numerocuenta INT)
SELECT * FROM cuentas WHERE numerocuenta=_numerocuenta ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarExistenciasReferenciasClientesCreditos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarExistenciasReferenciasClientesCreditos`(IN _idusuarios INT)
SELECT * FROM vista_consultaexistenciareferenciasclientes WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarListadoCreditosClientesCancelados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarListadoCreditosClientesCancelados`()
SELECT * FROM vista_consultaclientes_creditoscancelados WHERE estado="cancelado" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarListadoCreditosClientesCanceladosPortalClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarListadoCreditosClientesCanceladosPortalClientes`(IN _idusuarios INT)
SELECT * FROM vista_consultaclientes_creditoscancelados WHERE estado="cancelado" AND idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarMisTransaccionesProcesadasClientes_Especifica` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarMisTransaccionesProcesadasClientes_Especifica`(IN _idusuarios INT)
SELECT * FROM vista_consultatransaccionesclientesgeneral WHERE idusuarios=_idusuarios ORDER BY fecha DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarNotificacionesRecibidasUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarNotificacionesRecibidasUsuarios`(IN _idusuarios INT)
SELECT * FROM vista_notificacionesrecibidasusuarios WHERE idusuarios=_idusuarios AND ocultarnotificacion="no" ORDER BY fechanotificacion DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarNumeroUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarNumeroUsuarios`()
SELECT * FROM vista_configuracionusuariosgeneral ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarPerfilUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPerfilUsuarios`(IN _idusuarios INT)
SELECT * FROM vista_detallesusuarios WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarProductosCashManHARegistrados_Activos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductosCashManHARegistrados_Activos`()
SELECT * FROM vista_productoscashmanha WHERE estado="activo" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarProductosCashManHARegistrados_Expirados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductosCashManHARegistrados_Expirados`()
SELECT * FROM vista_productoscashmanha WHERE estado="expirado" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarProductosCashManHARegistrados_Inactivos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductosCashManHARegistrados_Inactivos`()
SELECT * FROM vista_productoscashmanha WHERE estado="inactivo" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarProductosDisponibles_NuevosCreditos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductosDisponibles_NuevosCreditos`()
SELECT * FROM vista_consultaproductosnuevoscreditos WHERE estado="activo" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarTransaccionesProcesadasClientes_General` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTransaccionesProcesadasClientes_General`()
SELECT * FROM vista_consultatransaccionesclientesgeneral ORDER BY fecha DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarTransaccionesProcesadasClientes_PortalInicioClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTransaccionesProcesadasClientes_PortalInicioClientes`(IN _idusuarios INT)
SELECT * FROM vista_consultatransaccionesclientesgeneral WHERE idusuarios=_idusuarios ORDER BY fecha DESC LIMIT 51 ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarTransaccionesProcesadasClientes_UltimasTransacciones` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTransaccionesProcesadasClientes_UltimasTransacciones`()
SELECT * FROM vista_consultatransaccionesclientesgeneral ORDER BY fecha DESC LIMIT 200 ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarUltimoIdTransaccion_CuentasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarUltimoIdTransaccion_CuentasClientes`()
SELECT idtransaccioncuentas, idusuarios FROM vista_consultatransaccionescuentasclientes ORDER BY fecha DESC LIMIT 1 ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaSolicitudesCreditosAprobadas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaSolicitudesCreditosAprobadas`()
SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE estado="aprobado" AND cuotas_generadas="no" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaSolicitudesCreditosProcesadas_EmpleadosAtencionClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaSolicitudesCreditosProcesadas_EmpleadosAtencionClientes`(IN _usuario_empleado VARCHAR(255))
SELECT * FROM vista_contadorcreditosgestionados_empleadosatencionclientes WHERE usuario_empleado=_usuario_empleado ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaTotalIngresosTransaccionesCreditos_EmpleadosAtencion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaTotalIngresosTransaccionesCreditos_EmpleadosAtencion`(IN _empleado_gestion VARCHAR(255))
SELECT * FROM vista_calculoingresostransacciones_empleadosatencionclientes WHERE empleado_gestion=_empleado_gestion ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaTransacciones_PagosCreditosClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaTransacciones_PagosCreditosClientes`(IN _idusuarios INT, IN _idcuotas INT)
SELECT * FROM vista_transaccionespagocuotascreditosclientes WHERE idusuarios=_idusuarios AND idcuotas=_idcuotas ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaUsuariosGestorNuevosCreditos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaUsuariosGestorNuevosCreditos`(IN _idusuarios INT)
SELECT * FROM vista_consulta_asignarnuevoscreditosclientes WHERE idusuarios=_idusuarios AND completoperfil="si" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaUsuariosIngresoNuevasSolicitudesCreditos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaUsuariosIngresoNuevasSolicitudesCreditos`()
SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE estado="en proceso" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaUsuariosIngresoNuevasSolicitudesCreditosUltimaRevision` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaUsuariosIngresoNuevasSolicitudesCreditosUltimaRevision`()
SELECT * FROM vista_consultacompletanuevassolicitudescreditosclientesgestiones WHERE estado="aprobacioninicial" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaUsuariosPerfilIncompleto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaUsuariosPerfilIncompleto`(IN _quienregistro VARCHAR(255))
SELECT * FROM vista_usuariosperfilincompleto WHERE completoperfil="no" AND estado_usuario="activo" AND quienregistro=_quienregistro ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ContadorTransaccionesProcesadas_EmpleadosAtencionClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ContadorTransaccionesProcesadas_EmpleadosAtencionClientes`(IN _empleado_gestion VARCHAR(255))
SELECT * FROM vista_contadortransacciones_empleadosatencionclientes WHERE empleado_gestion=_empleado_gestion ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConteoCuotasCanceladasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConteoCuotasCanceladasClientes`(IN _idusuarios INT)
SELECT idusuarios,estadocuota from vista_consultacuotasgeneradas_creditosaprobadosclientes WHERE idusuarios=_idusuarios AND estadocuota="cancelado" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DesactivarProductosCashmanHa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DesactivarProductosCashmanHa`(IN _idproducto INT)
UPDATE productos SET estado="inactivo" WHERE idproducto=_idproducto ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DesactivarUsuarios_Clientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DesactivarUsuarios_Clientes`(IN _idusuarios INT)
UPDATE usuarios SET estado_usuario="inactivo" WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `EliminarRolesUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarRolesUsuarios`(IN _idrol INT)
DELETE FROM roles WHERE idrol=_idrol ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `EliminarSolicitudesCrediticiasCanceladas_Clientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarSolicitudesCrediticiasCanceladas_Clientes`(IN _idcreditos INT)
DELETE FROM creditos WHERE idcreditos=_idcreditos ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `EnvioHistoricoSolicitudesCreditos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `EnvioHistoricoSolicitudesCreditos`(IN _idcreditos INT)
DELETE FROM creditos WHERE idcreditos=_idcreditos ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Evaluar_IncumplimientosPagosCuotasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Evaluar_IncumplimientosPagosCuotasClientes`(IN __idcuotas INT)
UPDATE cuotas SET estadocuota="SI" WHERE idcuotas=_idcuotas ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ExpirarProductosCashmanHa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ExpirarProductosCashmanHa`(IN _idproducto INT)
UPDATE productos SET estado="expirado" WHERE idproducto=_idproducto ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `IngresoSolicitudNuevosPrestamosClientes_NuevasAsignaciones` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `IngresoSolicitudNuevosPrestamosClientes_NuevasAsignaciones`(IN _idusuarios INT, IN _idproducto INT, IN _tipocliente VARCHAR(50), IN _montocredito DECIMAL(9,2), IN _interescredito FLOAT, IN _plazocredito INT, IN _cuotamensual DECIMAL(9,2), IN _fechasolicitud DATE, IN _salariocliente DECIMAL(9,2), IN _saldocredito DECIMAL(9,2), IN _observaciones VARCHAR(1500), IN _usuario_empleado VARCHAR(255))
INSERT INTO creditos (idusuarios,idproducto,tipocliente,montocredito,interescredito,plazocredito,cuotamensual,fechasolicitud,salariocliente,saldocredito,observaciones,usuario_empleado) VALUES (_idusuarios,_idproducto,_tipocliente,_montocredito,_interescredito,_plazocredito,_cuotamensual,_fechasolicitud,_salariocliente,_saldocredito,_observaciones,_usuario_empleado) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `IniciarSesion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `IniciarSesion`(IN Usuario VARCHAR(255), IN Pass VARCHAR(255))
BEGIN
SELECT * FROM usuarios WHERE (codigousuario=Usuario OR correo=Usuario) AND contrasenia=Pass AND estado_usuario="activo";
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarConfiguracionCuentaUsuarios_Administradores` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarConfiguracionCuentaUsuarios_Administradores`(IN _idusuarios INT, IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _codigousuario VARCHAR(255), IN _correo VARCHAR(255), IN _idrol INT, IN _estado_usuario VARCHAR(25))
UPDATE usuarios SET nombres=_nombres, apellidos=_apellidos, codigousuario=_codigousuario, correo=_correo, idrol=_idrol, estado_usuario=_estado_usuario WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarDetallesUsuarios_Clientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarDetallesUsuarios_Clientes`(IN _idusuarios INT, IN _dui VARCHAR(10), IN _nit VARCHAR(17), IN _telefono VARCHAR(9), IN _celular VARCHAR(9), IN _telefonotrabajo VARCHAR(9), IN _direccion VARCHAR(255), IN _empresa VARCHAR(255), IN _cargo VARCHAR(255), IN _direcciontrabajo VARCHAR(255), IN _fechanacimiento DATE, IN _genero CHAR(1), IN _estadocivil VARCHAR(30), IN _fotoduifrontal VARCHAR(255), IN _fotoduireverso VARCHAR(255), IN _fotonit VARCHAR(255), IN _fotofirma VARCHAR(255))
UPDATE detalleusuarios SET dui=_dui,nit=_nit,telefono=_telefono,celular=_celular,telefonotrabajo=_telefonotrabajo,direccion=_direccion,empresa=_empresa,cargo=_cargo,direcciontrabajo=_direcciontrabajo,fechanacimiento=_fechanacimiento,genero=_genero,estadocivil=_estadocivil,fotoduifrontal=_fotoduifrontal,fotoduireverso=_fotoduireverso,fotonit=_fotonit,fotofirma=_fotofirma WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarProductosRegistradosCashManHa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarProductosRegistradosCashManHa`(IN _idproducto INT, IN _codigo VARCHAR(255), IN _nombreproducto VARCHAR(255), IN _descripcionproducto VARCHAR(255), IN _requisitosproductos VARCHAR(1000), IN _estado VARCHAR(15))
UPDATE productos SET codigo=_codigo, nombreproducto=_nombreproducto, descripcionproducto=_descripcionproducto, requisitosproductos=_requisitosproductos, estado=_estado WHERE idproducto=_idproducto ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarReferenciasPersonalesLaboralesClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarReferenciasPersonalesLaboralesClientes`(IN _idreferencias INT, IN _idcreditos INT, IN _idproducto INT, IN _nombres_referencia1 VARCHAR(255), IN _apellidos_referencia1 VARCHAR(255), IN _empresa_referencia1 VARCHAR(255), IN _profesion_oficioreferencia1 VARCHAR(255), IN _telefono_referencia1 VARCHAR(9), IN _nombres_referencia2 VARCHAR(255), IN _apellidos_referencia2 VARCHAR(255), IN _empresa_referencia2 VARCHAR(255), IN _profesion_oficioreferencia2 VARCHAR(255), IN _telefono_referencia2 VARCHAR(255))
UPDATE referenciaspersonales SET idcreditos=_idcreditos, idproducto=_idproducto, nombres_referencia1=_nombres_referencia1, apellidos_referencia1=_apellidos_referencia1, empresa_referencia1=_empresa_referencia1, profesion_oficioreferencia1=_profesion_oficioreferencia1, telefono_referencia1=_telefono_referencia1, nombres_referencia2=_nombres_referencia2, apellidos_referencia2=_apellidos_referencia2, empresa_referencia2=_empresa_referencia2,profesion_oficioreferencia2=_profesion_oficioreferencia2, telefono_referencia2=_telefono_referencia2 WHERE idreferencias=_idreferencias ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarRolesUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarRolesUsuarios`(IN _idrol INT, IN _nombrerol VARCHAR(75), IN _descripcionrol VARCHAR(255))
UPDATE roles SET nombrerol=_nombrerol, descripcionrol=_descripcionrol WHERE idrol=_idrol ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `MostrarDetallesDatosClientes_FacturacionCreditosCashManHa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarDetallesDatosClientes_FacturacionCreditosCashManHa`(IN _idcuotas INT, IN _idusuarios INT)
SELECT * FROM vista_detallesfacturacioncreditosclientes WHERE idcuotas=_idcuotas AND idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `MostrarDetallesDatosClientes_FacturacionCreditosHistoricos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarDetallesDatosClientes_FacturacionCreditosHistoricos`(IN `_idhistoricotransaccion` INT, IN `_idusuarios` INT, IN `_idcreditos` INT, IN `_idcuotas` INT)
SELECT * FROM vista_detallesfacturacioncreditosclienteshistoricos WHERE idhistoricotransaccion=_idhistoricotransaccion AND idusuarios=_idusuarios AND idcreditos=_idcreditos AND idcuotas=_idcuotas ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `OcultarMensajesRecibidos_MensajeriaInternaUsuariosCashManHa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `OcultarMensajesRecibidos_MensajeriaInternaUsuariosCashManHa`(IN _idmensajeria INT)
UPDATE mensajeria SET ocultarmensaje="si" WHERE idmensajeria=_idmensajeria ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `OcultarNotificacionesRecibidasUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `OcultarNotificacionesRecibidasUsuarios`(IN _idnotificacion INT)
UPDATE notificaciones SET ocultarnotificacion="si" WHERE idnotificacion=_idnotificacion ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ReactivarUsuarios_Clientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ReactivarUsuarios_Clientes`(IN _idusuarios INT)
UPDATE usuarios SET estado_usuario="activo" WHERE idusuarios=_idusuarios ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ReestablecerContrasenias` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ReestablecerContrasenias`(IN _correo VARCHAR(255), IN _token VARCHAR(255), IN _codigo INT)
BEGIN
INSERT INTO recuperacion (correo,token,codigo) VALUES (_correo,_token,_codigo);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarAccesosUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarAccesosUsuarios`(IN _dispositivo VARCHAR(255), IN _sistemaoperativo VARCHAR(255), IN _idusuarios INT)
INSERT INTO accesos (dispositivo,sistemaoperativo,idusuarios) VALUES (_dispositivo,_sistemaoperativo,_idusuarios) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarCuotasMensualesHistoricoCreditosClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarCuotasMensualesHistoricoCreditosClientes`(IN _idcreditos INT, IN _idproducto INT, IN _idusuarios INT, IN _montocancelar DECIMAL(9,2), IN _nombreproducto VARCHAR(255), IN _montocapital DECIMAL(9,2), IN _fechavencimiento DATE)
INSERT INTO historicocuotascreditos (idcreditos,idproducto,idusuarios,montocancelar,nombreproducto,montocapital,fechavencimiento) VALUES (_idcreditos,_idproducto,_idusuarios,_montocancelar,_nombreproducto,_montocapital,_fechavencimiento) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarCuotasMensualesNuevosCreditosClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarCuotasMensualesNuevosCreditosClientes`(IN _idcreditos INT, IN _idproducto INT, IN _idusuarios INT, IN _montocancelar DECIMAL(9,2), IN _nombreproducto VARCHAR(255), IN _montocapital DECIMAL(9,2), IN _fechavencimiento DATE)
INSERT INTO cuotas (idcreditos,idproducto,idusuarios,montocancelar,nombreproducto,montocapital,fechavencimiento) VALUES (_idcreditos,_idproducto,_idusuarios,_montocancelar,_nombreproducto,_montocapital,_fechavencimiento) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarDetallesUsuarios_Clientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarDetallesUsuarios_Clientes`(IN _dui VARCHAR(10), IN _nit VARCHAR(17), IN _telefono VARCHAR(9), IN _celular VARCHAR(9), IN _telefonotrabajo VARCHAR(9), IN _direccion VARCHAR(255), IN _empresa VARCHAR(255), IN _cargo VARCHAR(255), IN _direcciontrabajo VARCHAR(255), IN _fechanacimiento DATE, IN _genero CHAR(1), IN _estadocivil VARCHAR(30), IN _fotoduifrontal VARCHAR(255), IN _fotoduireverso VARCHAR(255), IN _fotonit VARCHAR(255), IN _fotofirma VARCHAR(255), IN _idusuarios INT)
INSERT INTO detalleusuarios (dui,nit,telefono,celular,telefonotrabajo,direccion,empresa,cargo,direcciontrabajo,fechanacimiento,genero,estadocivil,fotoduifrontal,fotoduireverso,fotonit,fotofirma,idusuarios) VALUES (_dui,_nit,_telefono,_celular,_telefonotrabajo,_direccion,_empresa,_cargo,_direcciontrabajo,_fechanacimiento,_genero,_estadocivil,_fotoduifrontal,_fotoduireverso,_fotonit,_fotofirma,_idusuarios) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarNuevosClientesAdministradores` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarNuevosClientesAdministradores`(IN _nombres VARCHAR(255), IN _apellidos VARCHAR(255), IN _codigousuario VARCHAR(255), IN _contrasenia VARCHAR(255), IN _correo VARCHAR(255), IN _idrol INT, IN _quienregistro VARCHAR(255))
INSERT INTO usuarios (nombres,apellidos,codigousuario,contrasenia,correo,idrol,quienregistro) VALUES (_nombres,_apellidos,_codigousuario,_contrasenia,_correo,_idrol,_quienregistro) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarNuevosProductosCashManHa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarNuevosProductosCashManHa`(IN _codigo VARCHAR(255), IN _nombreproducto VARCHAR(255), IN _descripcionproducto VARCHAR(255), IN _requisitosproductos VARCHAR(1000), IN _estado VARCHAR(15))
INSERT INTO productos (codigo,nombreproducto,descripcionproducto,requisitosproductos,estado) VALUES (_codigo,_nombreproducto,_descripcionproducto,_requisitosproductos,_estado) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarSolicitudesCreditosClientesHistorico_Cancelados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarSolicitudesCreditosClientesHistorico_Cancelados`(IN _idusuarios INT, IN _idproducto INT, IN _idcreditos INT, IN _montocredito DECIMAL(9,2), IN _interescredito FLOAT, IN _plazocredito INT, IN _cuotamensual DECIMAL(9,2), IN _estado VARCHAR(30))
INSERT INTO historicocreditos (idusuarios,idproducto,idcreditos,montocredito,interescredito,plazocredito,cuotamensual,estado) VALUES (_idusuarios,_idproducto,_idcreditos,_montocredito,_interescredito,_plazocredito,_cuotamensual,_estado) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarTransferenciasEnviadasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarTransferenciasEnviadasClientes`(IN _numerocuenta INT, IN _monto DECIMAL(9,2), IN _referencia VARCHAR(255), IN _estado VARCHAR(50), IN _idusuarios INT, IN _idusuariodestino INT, IN _idproducto INT, IN _idcuentas INT, IN _idcuentadestino INT)
INSERT INTO transferencias (numerocuenta,monto,referencia,estado,idusuarios,idusuariodestino ,idproducto,idcuentas,idcuentadestino) VALUES (_numerocuenta,_monto,_referencia,_estado,_idusuarios,_idusuariodestino ,_idproducto,_idcuentas,_idcuentadestino) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistroCodigoSeguridadTransferenciasCuentasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroCodigoSeguridadTransferenciasCuentasClientes`(IN _codigoseguridad INT, IN _idusuarios INT)
INSERT INTO codigostransferencias (codigoseguridad,idusuarios) VALUES(_codigoseguridad,_idusuarios) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistroCopiaContratoClientesFinal` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroCopiaContratoClientesFinal`(IN _idcreditos INT, IN _copiacontratocliente VARCHAR(255))
UPDATE creditos SET copiacontratocliente=_copiacontratocliente, proceso_finalizado="si" WHERE idcreditos=_idcreditos ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistroDepositoCuentasAhorrosClientesCashManHa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroDepositoCuentasAhorrosClientesCashManHa`(IN _idusuarios INT, IN _idproducto INT, IN _idcuentas INT, IN _referencia VARCHAR(255), IN _monto DECIMAL(9,2), IN _empleado_gestion VARCHAR(255), IN _tipotransaccion VARCHAR(50), IN _estadotransaccion VARCHAR(50), IN _saldonuevocuenta_transaccion DECIMAL(9,2))
INSERT INTO transaccionescuentasclientes (idusuarios,idproducto,idcuentas,referencia,monto,empleado_gestion,tipotransaccion,estadotransaccion,saldonuevocuenta_transaccion) VALUES (_idusuarios,_idproducto,_idcuentas,_referencia,_monto,_empleado_gestion,_tipotransaccion,_estadotransaccion,_saldonuevocuenta_transaccion) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistroInformacionVehiculosCreditosClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroInformacionVehiculosCreditosClientes`(IN _idcreditos INT, IN _idproducto INT, IN _idusuarios INT, IN _placa VARCHAR(8), IN _clase VARCHAR(30), IN _anio INT, IN _capacidad VARCHAR(5), IN _asientos VARCHAR(5), IN _marca VARCHAR(255), IN _modelo VARCHAR(255), IN _numeromotor VARCHAR(17), IN _chasisgrabado VARCHAR(17), IN _chasisvin VARCHAR(17), IN _color VARCHAR(40))
INSERT INTO datosvehiculoscreditos (idcreditos,idproducto,idusuarios,placa,clase,anio,capacidad,asientos,marca,modelo,numeromotor,chasisgrabado,chasisvin,color) VALUES (_idcreditos,_idproducto,_idusuarios,_placa,_clase,_anio,_capacidad,_asientos,_marca,_modelo,_numeromotor,_chasisgrabado,_chasisvin,_color) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistroNuevasCuentasAhorroClientesCashmanha` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroNuevasCuentasAhorroClientesCashmanha`(IN _numerocuenta INT, IN _montocuenta DECIMAL(9,2), IN _idproducto INT, IN _idusuarios INT)
INSERT INTO cuentas (numerocuenta,montocuenta,idproducto,idusuarios) VALUES (_numerocuenta,_montocuenta,_idproducto,_idusuarios) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistroNuevasReferenciasPersonalesLaboralesClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroNuevasReferenciasPersonalesLaboralesClientes`(IN _idcreditos INT, IN _idusuarios INT, IN _idproducto INT, IN _nombres_referencia1 VARCHAR(255), IN _apellidos_referencia1 VARCHAR(255), IN _empresa_referencia1 VARCHAR(255), IN _profesion_oficioreferencia1 VARCHAR(255), IN _telefono_referencia1 VARCHAR(9), IN _nombres_referencia2 VARCHAR(255), IN _apellidos_referencia2 VARCHAR(255), IN _empresa_referencia2 VARCHAR(255), IN _profesion_oficioreferencia2 VARCHAR(255), IN _telefono_referencia2 VARCHAR(9))
INSERT INTO referenciaspersonales (idcreditos,idusuarios,idproducto,nombres_referencia1,apellidos_referencia1,empresa_referencia1,profesion_oficioreferencia1,telefono_referencia1,nombres_referencia2,apellidos_referencia2,empresa_referencia2,profesion_oficioreferencia2,telefono_referencia2) VALUES (_idcreditos,_idusuarios,_idproducto,_nombres_referencia1,_apellidos_referencia1,_empresa_referencia1,_profesion_oficioreferencia1,_telefono_referencia1,_nombres_referencia2,_apellidos_referencia2,_empresa_referencia2,_profesion_oficioreferencia2,_telefono_referencia2) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistroNuevosMensajesUsuarios_MensajeriaCashManHa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroNuevosMensajesUsuarios_MensajeriaCashManHa`(IN _idusuarios INT, IN _nombremensaje VARCHAR(255), IN _asuntomensaje VARCHAR(255), IN _detallemensaje VARCHAR(5000), IN _idusuariosdestinatario INT)
INSERT INTO mensajeria (idusuarios,nombremensaje,asuntomensaje,detallemensaje,idusuariosdestinatario) VALUES (_idusuarios,_nombremensaje,_asuntomensaje,_detallemensaje,_idusuariosdestinatario) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistroNuevosRolesDeUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroNuevosRolesDeUsuarios`(IN _nombrerol VARCHAR(75), IN _descripcionrol VARCHAR(255))
INSERT INTO roles (nombrerol,descripcionrol) VALUES (_nombrerol,_descripcionrol) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistroPagoCuotasCreditosClientes_OrdenPagosCashManHa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroPagoCuotasCreditosClientes_OrdenPagosCashManHa`(IN _idusuarios INT, IN _idproducto INT, IN _idcreditos INT, IN _idcuotas INT, IN _referencia VARCHAR(255), IN _monto DECIMAL(9,2), IN _dias_incumplimiento INT, IN _empleado_gestion VARCHAR(255))
INSERT INTO transacciones (idusuarios,idproducto,idcreditos,idcuotas,referencia,monto,dias_incumplimiento,empleado_gestion) VALUES (_idusuarios,_idproducto,_idcreditos,_idcuotas,_referencia,_monto,_dias_incumplimiento,_empleado_gestion) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistroReportesFallosPlataforma` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroReportesFallosPlataforma`(IN _idusuarios INT, IN _nombrereporte VARCHAR(255), IN _descripcionreporte VARCHAR(3000), IN _fotoreporte VARCHAR(255), IN _fecharegistroreporte DATETIME, IN _estado VARCHAR(50))
INSERT INTO reporteproblemasplataforma (idusuarios,nombrereporte,descripcionreporte,fotoreporte,fecharegistroreporte,estado) VALUES (_idusuarios,_nombrereporte,_descripcionreporte,_fotoreporte,_fecharegistroreporte,_estado) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistroRetiroCuentasAhorrosClientesCashManHa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistroRetiroCuentasAhorrosClientesCashManHa`(IN _idusuarios INT, IN _idproducto INT, IN _idcuentas INT, IN _referencia VARCHAR(255), IN _monto DECIMAL(9,2), IN _empleado_gestion VARCHAR(255), IN _tipotransaccion VARCHAR(50), IN _estadotransaccion VARCHAR(50), IN _saldonuevocuenta_transaccion DECIMAL(9,2))
INSERT INTO transaccionescuentasclientes (idusuarios,idproducto,idcuentas,referencia,monto,empleado_gestion,tipotransaccion,estadotransaccion,saldonuevocuenta_transaccion) VALUES (_idusuarios,_idproducto,_idcuentas,_referencia,_monto,_empleado_gestion,_tipotransaccion,_estadotransaccion,_saldonuevocuenta_transaccion) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ReporteCompletoIniciosdeSesionesUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ReporteCompletoIniciosdeSesionesUsuarios`(IN _idusuarios INT)
SELECT * FROM vista_reporteiniciosdesesiones WHERE idusuarios=_idusuarios ORDER BY fechaacceso DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SumatoriaIncumplimientoMora_CuotasClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SumatoriaIncumplimientoMora_CuotasClientes`()
UPDATE cuotas SET montocancelar=montocancelar+5.99 WHERE incumplimiento_pago="SI" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `VerificarCodigoSeguridad` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerificarCodigoSeguridad`(IN _codigo INT, IN _correo VARCHAR(255), IN _token VARCHAR(255))
SELECT * FROM recuperacion WHERE codigo=_codigo AND correo=_correo AND token=_token AND estado="nousado" ORDER BY idrecuperaciones DESC LIMIT 1 ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Verificar_ValidacionCodigoSeguridadTransferencias` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Verificar_ValidacionCodigoSeguridadTransferencias`(IN _codigoseguridad INT, IN _idusuarios INT)
SELECT * FROM vista_codigosseguridadtransferenciasclientes WHERE codigoseguridad = _codigoseguridad AND idusuarios = _idusuarios AND estado="Valido" ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `vista_bandejaentradamensajescashmanha`
--

/*!50001 DROP VIEW IF EXISTS `vista_bandejaentradamensajescashmanha`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_bandejaentradamensajescashmanha` AS select `mensajeria`.`idmensajeria` AS `idmensajeria`,`mensajeria`.`idusuarios` AS `idusuarios`,`mensajeria`.`idusuariosdestinatario` AS `idusuariosdestinatario`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`codigousuario` AS `codigousuario`,`usuarios`.`fotoperfil` AS `fotoperfil`,`mensajeria`.`nombremensaje` AS `nombremensaje`,`mensajeria`.`asuntomensaje` AS `asuntomensaje`,`mensajeria`.`detallemensaje` AS `detallemensaje`,`mensajeria`.`fechamensaje` AS `fechamensaje`,`mensajeria`.`ocultarmensaje` AS `ocultarmensaje` from (`mensajeria` left join `usuarios` on(`mensajeria`.`idusuarios` = `usuarios`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_calculaduracioncodigoseguridad_transferencias`
--

/*!50001 DROP VIEW IF EXISTS `vista_calculaduracioncodigoseguridad_transferencias`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_calculaduracioncodigoseguridad_transferencias` AS select `codigostransferencias`.`idcodigo` AS `idcodigo`,`codigostransferencias`.`codigoseguridad` AS `codigoseguridad`,concat(timestampdiff(MINUTE,`codigostransferencias`.`fecha`,current_timestamp())) AS `minutos_expiracion`,`codigostransferencias`.`estado` AS `estado`,`codigostransferencias`.`idusuarios` AS `idusuarios` from `codigostransferencias` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_calculo_ultimaactividad_ticketsreportesplataforma`
--

/*!50001 DROP VIEW IF EXISTS `vista_calculo_ultimaactividad_ticketsreportesplataforma`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_calculo_ultimaactividad_ticketsreportesplataforma` AS select `reporteproblemasplataforma`.`idreporte` AS `idreporte`,`reporteproblemasplataforma`.`idusuarios` AS `idusuarios`,`usuarios`.`codigousuario` AS `codigousuario`,`reporteproblemasplataforma`.`estado` AS `estado`,to_days(current_timestamp()) - to_days(`reporteproblemasplataforma`.`fechaactualizacionreporte`) AS `dias_ultima_actividad` from (`reporteproblemasplataforma` join `usuarios` on(`reporteproblemasplataforma`.`idusuarios` = `usuarios`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_calculocuentasahorooregistradas_interfaces`
--

/*!50001 DROP VIEW IF EXISTS `vista_calculocuentasahorooregistradas_interfaces`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_calculocuentasahorooregistradas_interfaces` AS select count(0) AS `numero_cuentasahorro_registradas` from `cuentas` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_calculocuotasregistradas_interfaces`
--

/*!50001 DROP VIEW IF EXISTS `vista_calculocuotasregistradas_interfaces`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_calculocuotasregistradas_interfaces` AS select count(0) AS `numero_cuotas_registrados` from `cuotas` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_calculocuotasvencidas_interfaces`
--

/*!50001 DROP VIEW IF EXISTS `vista_calculocuotasvencidas_interfaces`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_calculocuotasvencidas_interfaces` AS select count(0) AS `numero_cuotas_vencidas` from `cuotas` where `cuotas`.`incumplimiento_pago` = 'SI\'SI' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_calculodiasfechavencimiento_cuotasclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_calculodiasfechavencimiento_cuotasclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_calculodiasfechavencimiento_cuotasclientes` AS select `cuotas`.`idcuotas` AS `idcuotas`,`cuotas`.`idusuarios` AS `idusuarios`,`cuotas`.`idproducto` AS `idproducto`,`cuotas`.`montocancelar` AS `montocancelar`,`cuotas`.`estadocuota` AS `estadocuota`,`cuotas`.`fechavencimiento` AS `fechavencimiento`,`cuotas`.`incumplimiento_pago` AS `incumplimiento_pago`,to_days(current_timestamp()) - to_days(`cuotas`.`fechavencimiento`) AS `dias_incumplimiento` from `cuotas` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_calculoexpiracion_codigocambiocredencialesusuarios`
--

/*!50001 DROP VIEW IF EXISTS `vista_calculoexpiracion_codigocambiocredencialesusuarios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_calculoexpiracion_codigocambiocredencialesusuarios` AS select `recuperacion`.`idrecuperaciones` AS `idrecuperaciones`,`recuperacion`.`correo` AS `correo`,`recuperacion`.`token` AS `token`,`recuperacion`.`codigo` AS `codigo`,concat(timestampdiff(MINUTE,`recuperacion`.`fecha`,current_timestamp())) AS `minutos_expiracion`,`recuperacion`.`estado` AS `estado` from `recuperacion` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_calculoingresostransacciones_empleadosatencionclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_calculoingresostransacciones_empleadosatencionclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_calculoingresostransacciones_empleadosatencionclientes` AS select `transacciones`.`empleado_gestion` AS `empleado_gestion`,sum(`transacciones`.`monto`) AS `monto_transacciones_empleados` from `transacciones` group by `transacciones`.`empleado_gestion` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_calculonumerocuotascanceladas_interfaces`
--

/*!50001 DROP VIEW IF EXISTS `vista_calculonumerocuotascanceladas_interfaces`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_calculonumerocuotascanceladas_interfaces` AS select count(0) AS `numero_cuotas_canceladas` from `cuotas` where `cuotas`.`estadocuota` = 'cancelado\'cancelado' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_calculonumerocuotaspagadastarde_interfaces`
--

/*!50001 DROP VIEW IF EXISTS `vista_calculonumerocuotaspagadastarde_interfaces`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_calculonumerocuotaspagadastarde_interfaces` AS select count(0) AS `numero_cuotas_pagadas_tarde` from `cuotas` where `cuotas`.`incumplimiento_pago` = 'PT\'PT' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_calculonumerotransferencias_interfaces`
--

/*!50001 DROP VIEW IF EXISTS `vista_calculonumerotransferencias_interfaces`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_calculonumerotransferencias_interfaces` AS select count(0) AS `numero_transferencias` from `transferencias` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_calculoproductosregistrados_interfaces`
--

/*!50001 DROP VIEW IF EXISTS `vista_calculoproductosregistrados_interfaces`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_calculoproductosregistrados_interfaces` AS select count(0) AS `numero_productos_registrados` from `productos` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_calculotransaccionescreditos_interfaces`
--

/*!50001 DROP VIEW IF EXISTS `vista_calculotransaccionescreditos_interfaces`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_calculotransaccionescreditos_interfaces` AS select count(0) AS `numero_transacciones_creditos` from `transacciones` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_codigosseguridadtransferenciasclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_codigosseguridadtransferenciasclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_codigosseguridadtransferenciasclientes` AS select `codigostransferencias`.`idcodigo` AS `idcodigo`,`codigostransferencias`.`codigoseguridad` AS `codigoseguridad`,`codigostransferencias`.`fecha` AS `fecha`,`codigostransferencias`.`estado` AS `estado`,`codigostransferencias`.`idusuarios` AS `idusuarios` from `codigostransferencias` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_configuracionusuariosgeneral`
--

/*!50001 DROP VIEW IF EXISTS `vista_configuracionusuariosgeneral`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_configuracionusuariosgeneral` AS select `usuarios`.`idusuarios` AS `idusuarios`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`codigousuario` AS `codigousuario`,`usuarios`.`correo` AS `correo`,`usuarios`.`fotoperfil` AS `fotoperfil`,`usuarios`.`estado_usuario` AS `estado_usuario` from `usuarios` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consulta_asignarnuevoscreditosclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consulta_asignarnuevoscreditosclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consulta_asignarnuevoscreditosclientes` AS select `usuarios`.`idusuarios` AS `idusuarios`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`codigousuario` AS `codigousuario`,`usuarios`.`correo` AS `correo`,`usuarios`.`fotoperfil` AS `fotoperfil`,`usuarios`.`completoperfil` AS `completoperfil`,`usuarios`.`estado_usuario` AS `estado_usuario`,`usuarios`.`habilitarnuevoscreditos` AS `habilitarnuevoscreditos`,`detalleusuarios`.`dui` AS `dui`,`detalleusuarios`.`nit` AS `nit`,`detalleusuarios`.`telefono` AS `telefono`,`detalleusuarios`.`celular` AS `celular`,`detalleusuarios`.`telefonotrabajo` AS `telefonotrabajo`,`detalleusuarios`.`direccion` AS `direccion`,`detalleusuarios`.`empresa` AS `empresa`,`detalleusuarios`.`cargo` AS `cargo`,`detalleusuarios`.`direcciontrabajo` AS `direcciontrabajo`,`detalleusuarios`.`fechanacimiento` AS `fechanacimiento`,`detalleusuarios`.`genero` AS `genero`,`detalleusuarios`.`estadocivil` AS `estadocivil`,`detalleusuarios`.`fotoduifrontal` AS `fotoduifrontal`,`detalleusuarios`.`fotoduireverso` AS `fotoduireverso`,`detalleusuarios`.`fotonit` AS `fotonit`,`detalleusuarios`.`fotofirma` AS `fotofirma` from (`usuarios` left join `detalleusuarios` on(`usuarios`.`idusuarios` = `detalleusuarios`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consulta_datosgeneralesresultadosinicioadmins`
--

/*!50001 DROP VIEW IF EXISTS `vista_consulta_datosgeneralesresultadosinicioadmins`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consulta_datosgeneralesresultadosinicioadmins` AS select `vista_consultausuariosregistrados`.`numero_usuarios_registrados` AS `numero_usuarios_registrados`,`vista_consultaproductosregistrados`.`numero_productos_registrados` AS `numero_productos_registrados`,`vista_consultanumeroreportesfallasplataformageneral`.`numero_reportes_registrados` AS `numero_reportes_registrados`,`vista_consultanumerosolicitudesrecuperaciones`.`numero_solicitudes_recuperaciones` AS `numero_solicitudes_recuperaciones`,`vista_numerocuotasregistradas`.`numero_cuotas` AS `numero_cuotas`,`vista_numerotransaccionesprocesadas`.`numero_transacciones` AS `numero_transacciones` from (((((`vista_consultausuariosregistrados` left join `vista_consultaproductosregistrados` on(`vista_consultausuariosregistrados`.`numero_usuarios_registrados` = `vista_consultausuariosregistrados`.`numero_usuarios_registrados`)) left join `vista_consultanumeroreportesfallasplataformageneral` on(`vista_consultausuariosregistrados`.`numero_usuarios_registrados` = `vista_consultausuariosregistrados`.`numero_usuarios_registrados`)) left join `vista_consultanumerosolicitudesrecuperaciones` on(`vista_consultausuariosregistrados`.`numero_usuarios_registrados` = `vista_consultausuariosregistrados`.`numero_usuarios_registrados`)) left join `vista_numerocuotasregistradas` on(`vista_consultausuariosregistrados`.`numero_usuarios_registrados` = `vista_consultausuariosregistrados`.`numero_usuarios_registrados`)) left join `vista_numerotransaccionesprocesadas` on(`vista_consultausuariosregistrados`.`numero_usuarios_registrados` = `vista_consultausuariosregistrados`.`numero_usuarios_registrados`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultacalculoavancecreditos_interfazclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultacalculoavancecreditos_interfazclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultacalculoavancecreditos_interfazclientes` AS select `creditos`.`idcreditos` AS `idcreditos`,`creditos`.`idusuarios` AS `idusuarios`,`creditos`.`idproducto` AS `idproducto`,`productos`.`nombreproducto` AS `nombreproducto`,`productos`.`codigo` AS `codigo`,`creditos`.`interescredito` AS `interescredito`,`creditos`.`cuotamensual` AS `cuotamensual`,`creditos`.`montocredito` AS `montocredito`,`creditos`.`plazocredito` AS `plazocredito`,`creditos`.`enviaralhistorico` AS `enviaralhistorico`,`vista_consultacalculocuotascanceladas_creditosclientes`.`cuotas_canceladas` AS `cuotas_canceladas`,`vista_consultacalculocuotascanceladas_creditosclientes`.`montocapital` AS `montocapital` from ((`creditos` join `productos` on(`creditos`.`idproducto` = `productos`.`idproducto`)) join `vista_consultacalculocuotascanceladas_creditosclientes` on(`vista_consultacalculocuotascanceladas_creditosclientes`.`idusuarios` = `creditos`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultacalculocuotascanceladas_creditosclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultacalculocuotascanceladas_creditosclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultacalculocuotascanceladas_creditosclientes` AS select `cuotas`.`idcreditos` AS `idcreditos`,`cuotas`.`idusuarios` AS `idusuarios`,`cuotas`.`idproducto` AS `idproducto`,`cuotas`.`montocapital` AS `montocapital`,count(0) AS `cuotas_canceladas` from `cuotas` where `cuotas`.`estadocuota` = 'cancelado' group by `cuotas`.`idusuarios` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultaclientes_creditoscancelados`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultaclientes_creditoscancelados`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultaclientes_creditoscancelados` AS select `historicocreditos`.`idhistorico` AS `idhistorico`,`historicocreditos`.`idusuarios` AS `idusuarios`,`historicocreditos`.`idproducto` AS `idproducto`,`historicocreditos`.`idcreditos` AS `idcreditos`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`detalleusuarios`.`dui` AS `dui`,`detalleusuarios`.`nit` AS `nit`,`usuarios`.`fotoperfil` AS `fotoperfil`,`productos`.`codigo` AS `codigo`,`productos`.`nombreproducto` AS `nombreproducto`,`historicocreditos`.`montocredito` AS `montocredito`,`historicocreditos`.`interescredito` AS `interescredito`,`historicocreditos`.`plazocredito` AS `plazocredito`,`historicocreditos`.`cuotamensual` AS `cuotamensual`,`historicocreditos`.`estado` AS `estado` from (((`historicocreditos` join `usuarios` on(`historicocreditos`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`productos`.`idproducto` = `historicocreditos`.`idproducto`)) join `detalleusuarios` on(`detalleusuarios`.`idusuarios` = `historicocreditos`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultaclientesmorosos`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultaclientesmorosos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultaclientesmorosos` AS select `vista_calculodiasfechavencimiento_cuotasclientes`.`idcuotas` AS `idcuotas`,`usuarios`.`idusuarios` AS `idusuarios`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`detalleusuarios`.`dui` AS `dui`,`productos`.`nombreproducto` AS `nombreproducto`,`vista_calculodiasfechavencimiento_cuotasclientes`.`montocancelar` AS `montocancelar`,`vista_calculodiasfechavencimiento_cuotasclientes`.`estadocuota` AS `estadocuota`,`vista_calculodiasfechavencimiento_cuotasclientes`.`fechavencimiento` AS `fechavencimiento`,`vista_calculodiasfechavencimiento_cuotasclientes`.`incumplimiento_pago` AS `incumplimiento_pago`,`vista_calculodiasfechavencimiento_cuotasclientes`.`dias_incumplimiento` AS `dias_incumplimiento` from (((`vista_calculodiasfechavencimiento_cuotasclientes` join `usuarios` on(`vista_calculodiasfechavencimiento_cuotasclientes`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`vista_calculodiasfechavencimiento_cuotasclientes`.`idproducto` = `productos`.`idproducto`)) join `detalleusuarios` on(`usuarios`.`idusuarios` = `detalleusuarios`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultacompletanuevassolicitudescreditosclientesgestiones`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultacompletanuevassolicitudescreditosclientesgestiones`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultacompletanuevassolicitudescreditosclientesgestiones` AS select `usuarios`.`idusuarios` AS `idusuarios`,`creditos`.`idcreditos` AS `idcreditos`,`creditos`.`idproducto` AS `idproducto`,`creditos`.`tipocliente` AS `tipocliente`,`creditos`.`montocredito` AS `montocredito`,`creditos`.`interescredito` AS `interescredito`,`creditos`.`plazocredito` AS `plazocredito`,`creditos`.`cuotamensual` AS `cuotamensual`,`creditos`.`saldocredito` AS `saldocredito`,`creditos`.`fechasolicitud` AS `fechasolicitud`,`creditos`.`salariocliente` AS `salariocliente`,`creditos`.`progreso_solicitud` AS `progreso_solicitud`,`creditos`.`estado` AS `estado`,`creditos`.`observaciones` AS `observaciones`,`creditos`.`observacion_gerencia` AS `observacion_gerencia`,`creditos`.`observacion_presidencia` AS `observacion_presidencia`,`creditos`.`usuario_empleado` AS `usuario_empleado`,`creditos`.`cuotas_generadas` AS `cuotas_generadas`,`creditos`.`estadocrediticio` AS `estadocrediticio`,`creditos`.`proceso_finalizado` AS `proceso_finalizado`,`creditos`.`enviaralhistorico` AS `enviaralhistorico`,`creditos`.`creditoactivo` AS `creditoactivo`,`productos`.`codigo` AS `codigo`,`productos`.`nombreproducto` AS `nombreproducto`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`codigousuario` AS `codigousuario`,`usuarios`.`fotoperfil` AS `fotoperfil`,`usuarios`.`idrol` AS `idrol`,`detalleusuarios`.`dui` AS `dui`,`detalleusuarios`.`nit` AS `nit`,`detalleusuarios`.`telefono` AS `telefono`,`detalleusuarios`.`celular` AS `celular`,`detalleusuarios`.`telefonotrabajo` AS `telefonotrabajo`,`detalleusuarios`.`direccion` AS `direccion`,`detalleusuarios`.`empresa` AS `empresa`,`detalleusuarios`.`cargo` AS `cargo`,`detalleusuarios`.`direcciontrabajo` AS `direcciontrabajo`,`detalleusuarios`.`fechanacimiento` AS `fechanacimiento`,`referenciaspersonales`.`nombres_referencia1` AS `nombres_referencia1`,`referenciaspersonales`.`apellidos_referencia1` AS `apellidos_referencia1`,`referenciaspersonales`.`empresa_referencia1` AS `empresa_referencia1`,`referenciaspersonales`.`profesion_oficioreferencia1` AS `profesion_oficioreferencia1`,`referenciaspersonales`.`telefono_referencia1` AS `telefono_referencia1`,`referenciaspersonales`.`nombres_referencia2` AS `nombres_referencia2`,`referenciaspersonales`.`apellidos_referencia2` AS `apellidos_referencia2`,`referenciaspersonales`.`empresa_referencia2` AS `empresa_referencia2`,`referenciaspersonales`.`profesion_oficioreferencia2` AS `profesion_oficioreferencia2`,`referenciaspersonales`.`telefono_referencia2` AS `telefono_referencia2` from ((((`creditos` join `usuarios` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) join `detalleusuarios` on(`detalleusuarios`.`idusuarios` = `usuarios`.`idusuarios`)) join `referenciaspersonales` on(`referenciaspersonales`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`productos`.`idproducto` = `creditos`.`idproducto`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultacompletausuariosdetalles`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultacompletausuariosdetalles`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultacompletausuariosdetalles` AS select `usuarios`.`idusuarios` AS `idusuarios`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`codigousuario` AS `codigousuario`,`usuarios`.`correo` AS `correo`,`usuarios`.`fotoperfil` AS `fotoperfil`,`usuarios`.`idrol` AS `idrol`,`usuarios`.`estado_usuario` AS `estado_usuario`,`usuarios`.`completoperfil` AS `completoperfil`,`usuarios`.`quienregistro` AS `quienregistro`,`detalleusuarios`.`dui` AS `dui`,`detalleusuarios`.`nit` AS `nit`,`detalleusuarios`.`telefono` AS `telefono`,`detalleusuarios`.`celular` AS `celular`,`detalleusuarios`.`telefonotrabajo` AS `telefonotrabajo`,`detalleusuarios`.`direccion` AS `direccion`,`detalleusuarios`.`empresa` AS `empresa`,`detalleusuarios`.`cargo` AS `cargo`,`detalleusuarios`.`direcciontrabajo` AS `direcciontrabajo`,`detalleusuarios`.`fechanacimiento` AS `fechanacimiento`,`detalleusuarios`.`genero` AS `genero`,`detalleusuarios`.`estadocivil` AS `estadocivil`,`detalleusuarios`.`fotoduifrontal` AS `fotoduifrontal`,`detalleusuarios`.`fotoduireverso` AS `fotoduireverso`,`detalleusuarios`.`fotonit` AS `fotonit`,`detalleusuarios`.`fotofirma` AS `fotofirma` from (`usuarios` left join `detalleusuarios` on(`detalleusuarios`.`idusuarios` = `usuarios`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultacopiascontrato_suscritocreditosclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultacopiascontrato_suscritocreditosclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultacopiascontrato_suscritocreditosclientes` AS select `usuarios`.`idusuarios` AS `idusuarios`,`creditos`.`copiacontratocliente` AS `copiacontratocliente`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`codigousuario` AS `codigousuario` from (`creditos` join `usuarios` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultacuotasgeneradas_creditosaprobadosclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultacuotasgeneradas_creditosaprobadosclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultacuotasgeneradas_creditosaprobadosclientes` AS select `cuotas`.`idcuotas` AS `idcuotas`,`usuarios`.`idusuarios` AS `idusuarios`,`productos`.`idproducto` AS `idproducto`,`creditos`.`idcreditos` AS `idcreditos`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`fotoperfil` AS `fotoperfil`,`detalleusuarios`.`dui` AS `dui`,`detalleusuarios`.`nit` AS `nit`,`creditos`.`montocredito` AS `montocredito`,`creditos`.`interescredito` AS `interescredito`,`creditos`.`plazocredito` AS `plazocredito`,`creditos`.`cuotamensual` AS `cuotamensual`,`cuotas`.`montocancelar` AS `montocancelar`,`cuotas`.`estadocuota` AS `estadocuota`,`cuotas`.`nombreproducto` AS `nombreproducto`,`cuotas`.`montocapital` AS `montocapital`,`cuotas`.`fechavencimiento` AS `fechavencimiento`,`cuotas`.`incumplimiento_pago` AS `incumplimiento_pago`,to_days(current_timestamp()) - to_days(`cuotas`.`fechavencimiento`) AS `dias_incumplimiento` from ((((`cuotas` join `usuarios` on(`cuotas`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`productos`.`idproducto` = `cuotas`.`idproducto`)) join `detalleusuarios` on(`detalleusuarios`.`idusuarios` = `usuarios`.`idusuarios`)) join `creditos` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultacuotashistoricocreditosclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultacuotashistoricocreditosclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultacuotashistoricocreditosclientes` AS select `historicotransacciones`.`idhistoricotransaccion` AS `idhistoricotransaccion`,`historicotransacciones`.`idusuarios` AS `idusuarios`,`historicotransacciones`.`idproducto` AS `idproducto`,`historicotransacciones`.`idcreditos` AS `idcreditos`,`historicotransacciones`.`idcuotas` AS `idcuotas`,`historicocreditos`.`montocredito` AS `montocredito`,`historicocreditos`.`interescredito` AS `interescredito`,`historicocreditos`.`plazocredito` AS `plazocredito`,`historicocreditos`.`cuotamensual` AS `cuotamensual`,`historicotransacciones`.`referencia` AS `referencia`,`historicotransacciones`.`monto` AS `montocancelar`,`historicotransacciones`.`fecha` AS `fecha`,`historicotransacciones`.`dias_incumplimiento` AS `dias_incumplimiento`,`historicotransacciones`.`empleado_gestion` AS `empleado_gestion` from (`historicotransacciones` join `historicocreditos` on(`historicotransacciones`.`idcreditos` = `historicocreditos`.`idcreditos`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultadatosprestamosdevehiculosclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultadatosprestamosdevehiculosclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultadatosprestamosdevehiculosclientes` AS select `datosvehiculoscreditos`.`iddatosvehiculos` AS `iddatosvehiculos`,`datosvehiculoscreditos`.`idcreditos` AS `idcreditos`,`datosvehiculoscreditos`.`idproducto` AS `idproducto`,`datosvehiculoscreditos`.`idusuarios` AS `idusuarios`,`datosvehiculoscreditos`.`placa` AS `placa`,`datosvehiculoscreditos`.`clase` AS `clase`,`datosvehiculoscreditos`.`anio` AS `anio`,`datosvehiculoscreditos`.`capacidad` AS `capacidad`,`datosvehiculoscreditos`.`asientos` AS `asientos`,`datosvehiculoscreditos`.`marca` AS `marca`,`datosvehiculoscreditos`.`modelo` AS `modelo`,`datosvehiculoscreditos`.`numeromotor` AS `numeromotor`,`datosvehiculoscreditos`.`chasisgrabado` AS `chasisgrabado`,`datosvehiculoscreditos`.`chasisvin` AS `chasisvin`,`datosvehiculoscreditos`.`color` AS `color` from `datosvehiculoscreditos` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultadetallecompletotransaccionescuentasclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultadetallecompletotransaccionescuentasclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultadetallecompletotransaccionescuentasclientes` AS select `transaccionescuentasclientes`.`idtransaccioncuentas` AS `idtransaccioncuentas`,`transaccionescuentasclientes`.`idusuarios` AS `idusuarios`,`transaccionescuentasclientes`.`idproducto` AS `idproducto`,`transaccionescuentasclientes`.`idcuentas` AS `idcuentas`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`productos`.`codigo` AS `codigo`,`productos`.`nombreproducto` AS `nombreproducto`,`cuentas`.`numerocuenta` AS `numerocuenta`,`transaccionescuentasclientes`.`referencia` AS `referencia`,`transaccionescuentasclientes`.`monto` AS `monto`,`transaccionescuentasclientes`.`fecha` AS `fecha`,`transaccionescuentasclientes`.`empleado_gestion` AS `empleado_gestion`,`transaccionescuentasclientes`.`tipotransaccion` AS `tipotransaccion`,`transaccionescuentasclientes`.`estadotransaccion` AS `estadotransaccion` from (((`transaccionescuentasclientes` join `usuarios` on(`transaccionescuentasclientes`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`transaccionescuentasclientes`.`idproducto` = `productos`.`idproducto`)) join `cuentas` on(`transaccionescuentasclientes`.`idcuentas` = `cuentas`.`idcuentas`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultadetallesinterfazpresidencia`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultadetallesinterfazpresidencia`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultadetallesinterfazpresidencia` AS select `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` AS `numero_productos_registrados`,`vista_calculocuotasregistradas_interfaces`.`numero_cuotas_registrados` AS `numero_cuotas_registrados`,`vista_calculocuentasahorooregistradas_interfaces`.`numero_cuentasahorro_registradas` AS `numero_cuentasahorro_registradas`,`vista_calculotransaccionescreditos_interfaces`.`numero_transacciones_creditos` AS `numero_transacciones_creditos` from (((`vista_calculoproductosregistrados_interfaces` left join `vista_calculocuotasregistradas_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculocuentasahorooregistradas_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculotransaccionescreditos_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultadetallessolicitudescreditosaprobadosclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultadetallessolicitudescreditosaprobadosclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultadetallessolicitudescreditosaprobadosclientes` AS select `usuarios`.`idusuarios` AS `idusuarios`,`creditos`.`idcreditos` AS `idcreditos`,`creditos`.`idproducto` AS `idproducto`,`creditos`.`montocredito` AS `montocredito`,`creditos`.`interescredito` AS `interescredito`,`creditos`.`plazocredito` AS `plazocredito`,`creditos`.`cuotamensual` AS `cuotamensual`,`creditos`.`fechasolicitud` AS `fechasolicitud`,`creditos`.`estado` AS `estado`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`codigousuario` AS `codigousuario`,`usuarios`.`correo` AS `correo`,`usuarios`.`fotoperfil` AS `fotoperfil`,`detalleusuarios`.`dui` AS `dui`,`detalleusuarios`.`nit` AS `nit` from ((`creditos` join `usuarios` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) join `detalleusuarios` on(`detalleusuarios`.`idusuarios` = `usuarios`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultaestadosolicitudcredito_portalclientesbienvenida`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultaestadosolicitudcredito_portalclientesbienvenida`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultaestadosolicitudcredito_portalclientesbienvenida` AS select `creditos`.`idusuarios` AS `idusuarios`,`creditos`.`estado` AS `estado`,`creditos`.`progreso_solicitud` AS `progreso_solicitud`,`productos`.`nombreproducto` AS `nombreproducto`,`productos`.`codigo` AS `codigo` from ((`creditos` join `usuarios` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`creditos`.`idproducto` = `productos`.`idproducto`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultaexistenciacuotasmensualesclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultaexistenciacuotasmensualesclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultaexistenciacuotasmensualesclientes` AS select `cuotas`.`idcuotas` AS `idcuotas`,`cuotas`.`idcreditos` AS `idcreditos`,`cuotas`.`idproducto` AS `idproducto`,`cuotas`.`idusuarios` AS `idusuarios`,`cuotas`.`nombreproducto` AS `nombreproducto` from `cuotas` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultaexistenciareferenciasclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultaexistenciareferenciasclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultaexistenciareferenciasclientes` AS select `referenciaspersonales`.`idreferencias` AS `idreferencias`,`referenciaspersonales`.`idcreditos` AS `idcreditos`,`usuarios`.`idusuarios` AS `idusuarios`,`referenciaspersonales`.`idproducto` AS `idproducto`,`referenciaspersonales`.`nombres_referencia1` AS `nombres_referencia1`,`referenciaspersonales`.`apellidos_referencia1` AS `apellidos_referencia1`,`referenciaspersonales`.`empresa_referencia1` AS `empresa_referencia1`,`referenciaspersonales`.`profesion_oficioreferencia1` AS `profesion_oficioreferencia1`,`referenciaspersonales`.`telefono_referencia1` AS `telefono_referencia1`,`referenciaspersonales`.`nombres_referencia2` AS `nombres_referencia2`,`referenciaspersonales`.`apellidos_referencia2` AS `apellidos_referencia2`,`referenciaspersonales`.`empresa_referencia2` AS `empresa_referencia2`,`referenciaspersonales`.`profesion_oficioreferencia2` AS `profesion_oficioreferencia2`,`referenciaspersonales`.`telefono_referencia2` AS `telefono_referencia2` from (`referenciaspersonales` join `usuarios` on(`referenciaspersonales`.`idusuarios` = `usuarios`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultageneralreestructuracioncreditosclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultageneralreestructuracioncreditosclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultageneralreestructuracioncreditosclientes` AS select `a`.`idusuarios` AS `idusuarios`,`a`.`idcreditos` AS `idcreditos`,`a`.`montocredito` AS `montocredito`,`a`.`interescredito` AS `interescredito`,`a`.`plazocredito` AS `plazocredito`,`a`.`cuotamensual` AS `cuotamensual`,`a`.`estado` AS `estado`,`a`.`fechasolicitud` AS `fechasolicitud`,`a`.`cuotas_generadas` AS `cuotas_generadas`,`b`.`nombres` AS `nombres`,`b`.`apellidos` AS `apellidos`,`b`.`codigousuario` AS `codigousuario`,`b`.`fotoperfil` AS `fotoperfil`,`c`.`dui` AS `dui`,`c`.`nit` AS `nit` from ((`creditos` `a` join `usuarios` `b` on(`a`.`idusuarios` = `b`.`idusuarios`)) join `detalleusuarios` `c` on(`a`.`idusuarios` = `c`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultageneralusuarios`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultageneralusuarios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultageneralusuarios` AS select `usuarios`.`idusuarios` AS `idusuarios`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`codigousuario` AS `codigousuario`,`usuarios`.`correo` AS `correo`,`usuarios`.`fotoperfil` AS `fotoperfil`,`usuarios`.`idrol` AS `idrol`,`usuarios`.`estado_usuario` AS `estado_usuario`,`usuarios`.`completoperfil` AS `completoperfil` from `usuarios` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultalistadogeneralcuentasahorrosregistradas`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultalistadogeneralcuentasahorrosregistradas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultalistadogeneralcuentasahorrosregistradas` AS select `cuentas`.`idcuentas` AS `idcuentas`,`cuentas`.`idusuarios` AS `idusuarios`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`fotoperfil` AS `fotoperfil`,`detalleusuarios`.`dui` AS `dui`,`detalleusuarios`.`nit` AS `nit`,`cuentas`.`numerocuenta` AS `numerocuenta`,`cuentas`.`montocuenta` AS `montocuenta`,`cuentas`.`estadocuenta` AS `estadocuenta`,`cuentas`.`fechaapertura` AS `fechaapertura` from ((`cuentas` join `usuarios` on(`cuentas`.`idusuarios` = `usuarios`.`idusuarios`)) join `detalleusuarios` on(`cuentas`.`idusuarios` = `detalleusuarios`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultanuevo_prestamopersonal_asignado_clientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultanuevo_prestamopersonal_asignado_clientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultanuevo_prestamopersonal_asignado_clientes` AS select `creditos`.`idproducto` AS `idproducto`,`creditos`.`idcreditos` AS `idcreditos`,`productos`.`codigo` AS `codigo`,`productos`.`nombreproducto` AS `nombreproducto`,`creditos`.`fechasolicitud` AS `fechasolicitud`,`creditos`.`montocredito` AS `montocredito`,`creditos`.`interescredito` AS `interescredito`,`creditos`.`plazocredito` AS `plazocredito`,`creditos`.`progreso_solicitud` AS `progreso_solicitud`,`creditos`.`progreso_pagocredito` AS `progreso_pagocredito`,`creditos`.`estado` AS `estado`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`codigousuario` AS `codigousuario`,`usuarios`.`idusuarios` AS `idusuarios` from ((`creditos` join `usuarios` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`productos`.`idproducto` = `creditos`.`idproducto`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultanumeroreportesfallasplataformageneral`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultanumeroreportesfallasplataformageneral`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultanumeroreportesfallasplataformageneral` AS select count(`reporteproblemasplataforma`.`idreporte`) AS `numero_reportes_registrados` from `reporteproblemasplataforma` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultanumerosolicitudesrecuperaciones`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultanumerosolicitudesrecuperaciones`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultanumerosolicitudesrecuperaciones` AS select count(`recuperacion`.`idrecuperaciones`) AS `numero_solicitudes_recuperaciones` from `recuperacion` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultaproductosnuevoscreditos`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultaproductosnuevoscreditos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultaproductosnuevoscreditos` AS select `productos`.`idproducto` AS `idproducto`,`productos`.`codigo` AS `codigo`,`productos`.`nombreproducto` AS `nombreproducto`,`productos`.`estado` AS `estado` from `productos` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultaproductosregistrados`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultaproductosregistrados`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultaproductosregistrados` AS select count(`productos`.`idproducto`) AS `numero_productos_registrados` from `productos` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultardisponibilidadnuevoscreditosclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultardisponibilidadnuevoscreditosclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultardisponibilidadnuevoscreditosclientes` AS select `usuarios`.`idusuarios` AS `idusuarios`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`codigousuario` AS `codigousuario`,`usuarios`.`habilitarnuevoscreditos` AS `habilitarnuevoscreditos` from `usuarios` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultareportesfallosplataforma`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultareportesfallosplataforma`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultareportesfallosplataforma` AS select `reporteproblemasplataforma`.`idreporte` AS `idreporte`,`reporteproblemasplataforma`.`idusuarios` AS `idusuarios`,`usuarios`.`codigousuario` AS `codigousuario`,`reporteproblemasplataforma`.`nombrereporte` AS `nombrereporte`,`reporteproblemasplataforma`.`descripcionreporte` AS `descripcionreporte`,`reporteproblemasplataforma`.`fotoreporte` AS `fotoreporte`,`reporteproblemasplataforma`.`fecharegistroreporte` AS `fecharegistroreporte`,`reporteproblemasplataforma`.`fechaactualizacionreporte` AS `fechaactualizacionreporte`,`reporteproblemasplataforma`.`estado` AS `estado`,`reporteproblemasplataforma`.`comentarioactualizacion` AS `comentarioactualizacion`,`reporteproblemasplataforma`.`empleado_gestion` AS `empleado_gestion` from (`reporteproblemasplataforma` join `usuarios` on(`reporteproblemasplataforma`.`idusuarios` = `usuarios`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultatransaccionesclientesgeneral`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultatransaccionesclientesgeneral`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultatransaccionesclientesgeneral` AS select `cuotas`.`idcuotas` AS `idcuotas`,`transacciones`.`idusuarios` AS `idusuarios`,`transacciones`.`referencia` AS `referencia`,`transacciones`.`monto` AS `monto`,`transacciones`.`fecha` AS `fecha`,`transacciones`.`empleado_gestion` AS `empleado_gestion`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`habilitarnuevoscreditos` AS `habilitarnuevoscreditos` from ((`transacciones` join `usuarios` on(`transacciones`.`idusuarios` = `usuarios`.`idusuarios`)) join `cuotas` on(`cuotas`.`idcuotas` = `transacciones`.`idcuotas`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultatransaccionescuentasclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultatransaccionescuentasclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultatransaccionescuentasclientes` AS select `transaccionescuentasclientes`.`idtransaccioncuentas` AS `idtransaccioncuentas`,`transaccionescuentasclientes`.`idusuarios` AS `idusuarios`,`transaccionescuentasclientes`.`idproducto` AS `idproducto`,`transaccionescuentasclientes`.`idcuentas` AS `idcuentas`,`cuentas`.`numerocuenta` AS `numerocuenta`,`productos`.`codigo` AS `codigo`,`productos`.`nombreproducto` AS `nombreproducto`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`detalleusuarios`.`dui` AS `dui`,`detalleusuarios`.`nit` AS `nit`,`transaccionescuentasclientes`.`referencia` AS `referencia`,`transaccionescuentasclientes`.`monto` AS `monto`,`transaccionescuentasclientes`.`fecha` AS `fecha`,`transaccionescuentasclientes`.`empleado_gestion` AS `empleado_gestion`,`transaccionescuentasclientes`.`tipotransaccion` AS `tipotransaccion`,`transaccionescuentasclientes`.`estadotransaccion` AS `estadotransaccion`,`transaccionescuentasclientes`.`saldonuevocuenta_transaccion` AS `saldonuevocuenta_transaccion` from ((((`transaccionescuentasclientes` join `usuarios` on(`transaccionescuentasclientes`.`idusuarios` = `usuarios`.`idusuarios`)) join `detalleusuarios` on(`transaccionescuentasclientes`.`idusuarios` = `detalleusuarios`.`idusuarios`)) join `productos` on(`transaccionescuentasclientes`.`idproducto` = `productos`.`idproducto`)) join `cuentas` on(`transaccionescuentasclientes`.`idcuentas` = `cuentas`.`idcuentas`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultausuariosnuevascuentas_ahorros_depositosplazofijo` AS select `usuarios`.`idusuarios` AS `idusuarios`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`detalleusuarios`.`dui` AS `dui` from (`usuarios` join `detalleusuarios` on(`usuarios`.`idusuarios` = `detalleusuarios`.`idusuarios`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_consultausuariosregistrados`
--

/*!50001 DROP VIEW IF EXISTS `vista_consultausuariosregistrados`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_consultausuariosregistrados` AS select count(`usuarios`.`idusuarios`) AS `numero_usuarios_registrados` from `usuarios` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_contadorcreditosgestionados_empleadosatencionclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_contadorcreditosgestionados_empleadosatencionclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_contadorcreditosgestionados_empleadosatencionclientes` AS select `creditos`.`usuario_empleado` AS `usuario_empleado`,count(0) AS `numero_creditos_gestionados` from `creditos` group by `creditos`.`usuario_empleado` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_contadorincumplimientopagoscreditosclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_contadorincumplimientopagoscreditosclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_contadorincumplimientopagoscreditosclientes` AS select `usuarios`.`idusuarios` AS `idusuarios`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,count(0) AS `total_incumplimientos_pagos` from (`cuotas` join `usuarios` on(`cuotas`.`idusuarios` = `usuarios`.`idusuarios`)) where `cuotas`.`incumplimiento_pago` = 'PT' group by `usuarios`.`idusuarios` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_contadorpagosatiempo_creditosclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_contadorpagosatiempo_creditosclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_contadorpagosatiempo_creditosclientes` AS select `cuotas`.`idusuarios` AS `idusuarios`,`creditos`.`idcreditos` AS `idcreditos`,`cuotas`.`idcuotas` AS `idcuotas`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`creditos`.`estadocrediticio` AS `estadocrediticio`,count(`cuotas`.`incumplimiento_pago`) AS `cuotas_pagadas` from ((`cuotas` join `usuarios` on(`cuotas`.`idusuarios` = `usuarios`.`idusuarios`)) join `creditos` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) where `cuotas`.`incumplimiento_pago` = 'NO' and `cuotas`.`estadocuota` = 'cancelado' group by `cuotas`.`idusuarios` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_contadorpagoscuotastardias_creditosclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_contadorpagoscuotastardias_creditosclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_contadorpagoscuotastardias_creditosclientes` AS select `cuotas`.`idusuarios` AS `idusuarios`,`creditos`.`idcreditos` AS `idcreditos`,`cuotas`.`idcuotas` AS `idcuotas`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`creditos`.`estadocrediticio` AS `estadocrediticio`,count(`cuotas`.`incumplimiento_pago`) AS `cuotas_pagadas_tarde` from ((`cuotas` join `usuarios` on(`cuotas`.`idusuarios` = `usuarios`.`idusuarios`)) join `creditos` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) where `cuotas`.`incumplimiento_pago` = 'PT' group by `cuotas`.`idusuarios` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_contadortransacciones_empleadosatencionclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_contadortransacciones_empleadosatencionclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_contadortransacciones_empleadosatencionclientes` AS select count(0) AS `numero_transacciones_empleados_atencionclientes`,`transacciones`.`empleado_gestion` AS `empleado_gestion` from `transacciones` group by `transacciones`.`empleado_gestion` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_datosgeneralescreditoscanceladoshistoricoclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_datosgeneralescreditoscanceladoshistoricoclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_datosgeneralescreditoscanceladoshistoricoclientes` AS select `historicocreditos`.`idhistorico` AS `idhistorico`,`historicocreditos`.`idproducto` AS `idproducto`,`historicocreditos`.`idusuarios` AS `idusuarios`,`historicocreditos`.`idcreditos` AS `idcreditos`,`historicocreditos`.`montocredito` AS `montocredito`,`historicocreditos`.`interescredito` AS `interescredito`,`historicocreditos`.`plazocredito` AS `plazocredito`,`historicocreditos`.`cuotamensual` AS `cuotamensual`,`historicocreditos`.`estado` AS `estado`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`fotoperfil` AS `fotoperfil`,`productos`.`nombreproducto` AS `nombreproducto` from ((`historicocreditos` join `usuarios` on(`historicocreditos`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`historicocreditos`.`idproducto` = `productos`.`idproducto`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_detallecompletotransaccionesempleados`
--

/*!50001 DROP VIEW IF EXISTS `vista_detallecompletotransaccionesempleados`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_detallecompletotransaccionesempleados` AS select `transacciones`.`idtransaccion` AS `idtransaccion`,`transacciones`.`idusuarios` AS `idusuarios`,`transacciones`.`idproducto` AS `idproducto`,`transacciones`.`idcreditos` AS `idcreditos`,`transacciones`.`idcuotas` AS `idcuotas`,`transacciones`.`referencia` AS `referencia`,`transacciones`.`monto` AS `monto`,`transacciones`.`fecha` AS `fecha`,`transacciones`.`dias_incumplimiento` AS `dias_incumplimiento`,`transacciones`.`empleado_gestion` AS `empleado_gestion` from `transacciones` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_detalleinterfazgerencia`
--

/*!50001 DROP VIEW IF EXISTS `vista_detalleinterfazgerencia`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_detalleinterfazgerencia` AS select `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` AS `numero_productos_registrados`,`vista_calculocuotasregistradas_interfaces`.`numero_cuotas_registrados` AS `numero_cuotas_registrados`,`vista_calculocuentasahorooregistradas_interfaces`.`numero_cuentasahorro_registradas` AS `numero_cuentasahorro_registradas`,`vista_calculotransaccionescreditos_interfaces`.`numero_transacciones_creditos` AS `numero_transacciones_creditos`,`vista_calculonumerocuotaspagadastarde_interfaces`.`numero_cuotas_pagadas_tarde` AS `numero_cuotas_pagadas_tarde`,`vista_calculonumerocuotascanceladas_interfaces`.`numero_cuotas_canceladas` AS `numero_cuotas_canceladas`,`vista_calculonumerotransferencias_interfaces`.`numero_transferencias` AS `numero_transferencias`,`vista_calculocuotasvencidas_interfaces`.`numero_cuotas_vencidas` AS `numero_cuotas_vencidas` from (((((((`vista_calculoproductosregistrados_interfaces` left join `vista_calculocuotasregistradas_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculocuentasahorooregistradas_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculotransaccionescreditos_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculonumerocuotaspagadastarde_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculonumerocuotascanceladas_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculonumerotransferencias_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) left join `vista_calculocuotasvencidas_interfaces` on(`vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados` = `vista_calculoproductosregistrados_interfaces`.`numero_productos_registrados`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_detallesfacturacioncreditosclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_detallesfacturacioncreditosclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_detallesfacturacioncreditosclientes` AS select `cuotas`.`idcuotas` AS `idcuotas`,`cuotas`.`idcreditos` AS `idcreditos`,`cuotas`.`idproducto` AS `idproducto`,`cuotas`.`idusuarios` AS `idusuarios`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`detalleusuarios`.`dui` AS `dui`,`detalleusuarios`.`nit` AS `nit`,`creditos`.`cuotamensual` AS `cuotamensual`,`cuotas`.`montocancelar` AS `montocancelar`,`cuotas`.`nombreproducto` AS `nombreproducto`,`productos`.`codigo` AS `codigo`,`cuotas`.`montocapital` AS `montocapital`,`cuotas`.`fechavencimiento` AS `fechavencimiento`,`transacciones`.`referencia` AS `referencia`,`transacciones`.`fecha` AS `fecha`,`transacciones`.`dias_incumplimiento` AS `dias_incumplimiento`,`transacciones`.`empleado_gestion` AS `empleado_gestion` from (((((`cuotas` join `usuarios` on(`cuotas`.`idusuarios` = `usuarios`.`idusuarios`)) join `detalleusuarios` on(`detalleusuarios`.`idusuarios` = `usuarios`.`idusuarios`)) join `transacciones` on(`transacciones`.`idcuotas` = `cuotas`.`idcuotas`)) join `creditos` on(`creditos`.`idusuarios` = `usuarios`.`idusuarios`)) join `productos` on(`productos`.`idproducto` = `cuotas`.`idproducto`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_detallesfacturacioncreditosclienteshistoricos`
--

/*!50001 DROP VIEW IF EXISTS `vista_detallesfacturacioncreditosclienteshistoricos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_detallesfacturacioncreditosclienteshistoricos` AS select `historicotransacciones`.`idhistoricotransaccion` AS `idhistoricotransaccion`,`historicotransacciones`.`idusuarios` AS `idusuarios`,`historicotransacciones`.`idcreditos` AS `idcreditos`,`historicotransacciones`.`idcuotas` AS `idcuotas`,`historicotransacciones`.`idproducto` AS `idproducto`,`productos`.`codigo` AS `codigo`,`productos`.`nombreproducto` AS `nombreproducto`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`detalleusuarios`.`dui` AS `dui`,`detalleusuarios`.`nit` AS `nit`,`historicotransacciones`.`referencia` AS `referencia`,`historicocreditos`.`montocredito` AS `montocredito`,`historicocreditos`.`cuotamensual` AS `cuotamensual`,`historicotransacciones`.`monto` AS `montocancelar`,`historicotransacciones`.`fecha` AS `fecha`,`historicotransacciones`.`dias_incumplimiento` AS `dias_incumplimiento`,`historicotransacciones`.`empleado_gestion` AS `empleado_gestion` from ((((`historicotransacciones` join `historicocreditos` on(`historicotransacciones`.`idcreditos` = `historicocreditos`.`idcreditos`)) join `usuarios` on(`historicotransacciones`.`idusuarios` = `usuarios`.`idusuarios`)) join `detalleusuarios` on(`historicotransacciones`.`idusuarios` = `detalleusuarios`.`idusuarios`)) join `productos` on(`historicotransacciones`.`idproducto` = `productos`.`idproducto`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_detallesusuarios`
--

/*!50001 DROP VIEW IF EXISTS `vista_detallesusuarios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_detallesusuarios` AS select `detalleusuarios`.`iddetalle` AS `iddetalle`,`detalleusuarios`.`dui` AS `dui`,`detalleusuarios`.`nit` AS `nit`,`detalleusuarios`.`telefono` AS `telefono`,`detalleusuarios`.`celular` AS `celular`,`detalleusuarios`.`telefonotrabajo` AS `telefonotrabajo`,`detalleusuarios`.`direccion` AS `direccion`,`detalleusuarios`.`empresa` AS `empresa`,`detalleusuarios`.`cargo` AS `cargo`,`detalleusuarios`.`direcciontrabajo` AS `direcciontrabajo`,`detalleusuarios`.`fechanacimiento` AS `fechanacimiento`,`detalleusuarios`.`genero` AS `genero`,`detalleusuarios`.`estadocivil` AS `estadocivil`,`detalleusuarios`.`idusuarios` AS `idusuarios` from `detalleusuarios` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_notificacionesrecibidasusuarios`
--

/*!50001 DROP VIEW IF EXISTS `vista_notificacionesrecibidasusuarios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_notificacionesrecibidasusuarios` AS select `notificaciones`.`idnotificacion` AS `idnotificacion`,`notificaciones`.`idusuarios` AS `idusuarios`,`notificaciones`.`titulonotificacion` AS `titulonotificacion`,`notificaciones`.`descripcionnotificacion` AS `descripcionnotificacion`,`notificaciones`.`fechanotificacion` AS `fechanotificacion`,`notificaciones`.`clasificacionnotificacion` AS `clasificacionnotificacion`,`notificaciones`.`ocultarnotificacion` AS `ocultarnotificacion` from `notificaciones` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_numerocuotasregistradas`
--

/*!50001 DROP VIEW IF EXISTS `vista_numerocuotasregistradas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_numerocuotasregistradas` AS select count(`cuotas`.`idcuotas`) AS `numero_cuotas` from `cuotas` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_numerotransaccionesprocesadas`
--

/*!50001 DROP VIEW IF EXISTS `vista_numerotransaccionesprocesadas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_numerotransaccionesprocesadas` AS select count(`transacciones`.`idtransaccion`) AS `numero_transacciones` from `transacciones` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_productoscashmanha`
--

/*!50001 DROP VIEW IF EXISTS `vista_productoscashmanha`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_productoscashmanha` AS select `productos`.`idproducto` AS `idproducto`,`productos`.`codigo` AS `codigo`,`productos`.`nombreproducto` AS `nombreproducto`,`productos`.`descripcionproducto` AS `descripcionproducto`,`productos`.`requisitosproductos` AS `requisitosproductos`,`productos`.`estado` AS `estado` from `productos` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_reporteiniciosdesesiones`
--

/*!50001 DROP VIEW IF EXISTS `vista_reporteiniciosdesesiones`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_reporteiniciosdesesiones` AS select `accesos`.`idacceso` AS `idacceso`,`accesos`.`fechaacceso` AS `fechaacceso`,`accesos`.`dispositivo` AS `dispositivo`,`accesos`.`sistemaoperativo` AS `sistemaoperativo`,`accesos`.`idusuarios` AS `idusuarios` from `accesos` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_rolesdeusuarioscompleto`
--

/*!50001 DROP VIEW IF EXISTS `vista_rolesdeusuarioscompleto`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_rolesdeusuarioscompleto` AS select `roles`.`idrol` AS `idrol`,`roles`.`nombrerol` AS `nombrerol`,`roles`.`descripcionrol` AS `descripcionrol` from `roles` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_transaccionespagocuotascreditosclientes`
--

/*!50001 DROP VIEW IF EXISTS `vista_transaccionespagocuotascreditosclientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_transaccionespagocuotascreditosclientes` AS select `transacciones`.`idtransaccion` AS `idtransaccion`,`transacciones`.`idusuarios` AS `idusuarios`,`transacciones`.`idcuotas` AS `idcuotas`,`transacciones`.`referencia` AS `referencia`,`transacciones`.`monto` AS `monto`,`transacciones`.`fecha` AS `fecha` from `transacciones` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_usuariosperfilincompleto`
--

/*!50001 DROP VIEW IF EXISTS `vista_usuariosperfilincompleto`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_usuariosperfilincompleto` AS select `usuarios`.`idusuarios` AS `idusuarios`,`usuarios`.`nombres` AS `nombres`,`usuarios`.`apellidos` AS `apellidos`,`usuarios`.`codigousuario` AS `codigousuario`,`usuarios`.`correo` AS `correo`,`usuarios`.`fotoperfil` AS `fotoperfil`,`usuarios`.`idrol` AS `idrol`,`usuarios`.`estado_usuario` AS `estado_usuario`,`usuarios`.`completoperfil` AS `completoperfil`,`usuarios`.`quienregistro` AS `quienregistro` from `usuarios` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-05 23:39:05
