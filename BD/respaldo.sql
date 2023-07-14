-- MariaDB dump 10.19  Distrib 10.11.4-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: BDMAOUI
-- ------------------------------------------------------
-- Server version	10.11.4-MariaDB-1

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
-- Table structure for table `DetallesVenta`
--

DROP TABLE IF EXISTS `DetallesVenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DetallesVenta` (
  `detalle_id` int(11) NOT NULL,
  `venta_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `estatus` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `Total` float DEFAULT NULL,
  PRIMARY KEY (`detalle_id`),
  KEY `venta_id` (`venta_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `DetallesVenta_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `Ventas` (`venta_id`),
  CONSTRAINT `DetallesVenta_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `Productos` (`producto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DetallesVenta`
--

LOCK TABLES `DetallesVenta` WRITE;
/*!40000 ALTER TABLE `DetallesVenta` DISABLE KEYS */;
INSERT INTO `DetallesVenta` VALUES
(0,1,1,1,'1','2023-02-02',20),
(1,1,1,1,'1','2023-02-02',20),
(2,1,1,1,'1','2023-02-02',80),
(3,1,1,1,'1','2023-02-02',-80),
(4,1,1,1,'1','2023-02-02',-80),
(5,1,1,1,'1','2023-02-02',40),
(6,1,1,1,'1','2023-02-02',440);
/*!40000 ALTER TABLE `DetallesVenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nosotros`
--

DROP TABLE IF EXISTS `Nosotros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Nosotros` (
  `Nombre` varchar(50) DEFAULT NULL,
  `Objetivo` varchar(500) DEFAULT NULL,
  `Mision` varchar(500) DEFAULT NULL,
  `Vision` varchar(500) DEFAULT NULL,
  `Valores` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nosotros`
--

LOCK TABLES `Nosotros` WRITE;
/*!40000 ALTER TABLE `Nosotros` DISABLE KEYS */;
INSERT INTO `Nosotros` VALUES
('Toothless Company Technologies','Implementar servicios tecnológicos mediante el uso de software, base de datos, levantador de servicios por puertos, redes para la creación de interfaces visuales para el público interesado en la gestión online.','Somos una empresa dedicada a la atención personalizada, gestión de proyectos tecnológicos con profesionalismo y respeto hacia nuestro cliente.','En un plazo aproximado de un año aspiramos posicionarnos como empresa líder en el mercado de servicios tecnológicos online.','Respeto: Este valor nos representa debido al profesionalismo con el que se trata a nuestros clientes, así como miembros de la compañía. Trabajo colaborativo: El trabajo colaborativo es un valor fundamental en la empresa para el éxito y eficiencia de los proyectos desarrollados. Calidad: Para la entrega de sistemas los cuales pasan pruebas de funcionalidad dando resultados óptimos.');
/*!40000 ALTER TABLE `Nosotros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Productos`
--

DROP TABLE IF EXISTS `Productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Productos` (
  `producto_id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `estatus` varchar(20) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `fecha_caducidad` date DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `costo` float DEFAULT NULL,
  PRIMARY KEY (`producto_id`),
  KEY `sucursal_id` (`sucursal_id`),
  CONSTRAINT `Productos_ibfk_1` FOREIGN KEY (`sucursal_id`) REFERENCES `Sucursal` (`sucursal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Productos`
--

LOCK TABLES `Productos` WRITE;
/*!40000 ALTER TABLE `Productos` DISABLE KEYS */;
INSERT INTO `Productos` VALUES
(1,'Gato',99.00,10,1,'0','miau.jpeg','2023-07-05','Miau',20,0),
(2,'1',1.00,1,1,'1','miau.jpeg','2023-07-05','1',1,90),
(3,'1',1.00,1,1,'1','miau.jpeg','2023-07-05','1',1,55),
(4,'1',1.00,1,1,'1','miau.jpeg','2023-07-05','1',1,NULL),
(7,'jsjs',50.00,5,1,'1','cl.jpg','2023-02-01','miau',20,12),
(8,'jsjs',50.00,1,1,'1','cl.jpg','2023-02-01','miau',20,380),
(9,'jsjs',50.00,1,1,'1','cl.jpg','2023-02-01','miau',20,380),
(12,'miau',99.99,99,1,'1','miau.jpeg','2023-07-13','Miau',20,NULL),
(20,'Lona',800.00,23,1,'1','22JC25_AW01.jpeg','2026-05-28','Lonas',4,700),
(10001,'Gatote',120.00,2,1,'1','miau.jpeg','2023-07-14','Miau',20,NULL);
/*!40000 ALTER TABLE `Productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Recetas`
--

DROP TABLE IF EXISTS `Recetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Recetas` (
  `nombre` varchar(50) DEFAULT NULL,
  `paso` varchar(999) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `ingredientes` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Recetas`
--

LOCK TABLES `Recetas` WRITE;
/*!40000 ALTER TABLE `Recetas` DISABLE KEYS */;
INSERT INTO `Recetas` VALUES
('1','1','1','1'),
('1','1','1','1');
/*!40000 ALTER TABLE `Recetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sucursal`
--

DROP TABLE IF EXISTS `Sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sucursal` (
  `sucursal_id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `estatus` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sucursal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sucursal`
--

LOCK TABLES `Sucursal` WRITE;
/*!40000 ALTER TABLE `Sucursal` DISABLE KEYS */;
INSERT INTO `Sucursal` VALUES
(1,'Sucursal1','Calle Principal 123','Ciudad1','123456789','Activa');
/*!40000 ALTER TABLE `Sucursal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios` (
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `tipo_usuario` varchar(50) DEFAULT NULL,
  `estatus` varchar(20) DEFAULT NULL,
  `domicilio` varchar(100) DEFAULT NULL,
  `codigo` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
INSERT INTO `Usuarios` VALUES
(0,'Santiago Alejandro','Tavizone Rivera','stavizone7@gmail.com','442-612-1181','Usuario general','1','Av. Bellavista 2041 #19 Qro, Qro.','8616','12345678'),
(1,'1','1','1','1','Administrador','1','1','1','1'),
(2,'Miau','Gato','2022371033@uteq.edu.mx','4','Usuario general','1','Av gatote','1220','11111111'),
(99,'Miau','Gato','miau@gato.com','4426121181','Administrador','1','Av Gatote','0','12345678');
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ventas`
--

DROP TABLE IF EXISTS `Ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ventas` (
  `venta_id` int(11) NOT NULL,
  `fecha_venta` date DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `estatus` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`venta_id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `Ventas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `Usuarios` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ventas`
--

LOCK TABLES `Ventas` WRITE;
/*!40000 ALTER TABLE `Ventas` DISABLE KEYS */;
INSERT INTO `Ventas` VALUES
(0,'2023-01-02',1,'1'),
(1,'2023-12-02',0,'1');
/*!40000 ALTER TABLE `Ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-13 20:14:42
