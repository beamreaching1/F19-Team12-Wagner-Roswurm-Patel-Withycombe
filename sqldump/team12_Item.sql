CREATE DATABASE  IF NOT EXISTS `team12` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `team12`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: team12-db.c5i62rnyygs1.us-east-1.rds.amazonaws.com    Database: team12
-- ------------------------------------------------------
-- Server version	5.7.22-log

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
-- Table structure for table `Item`
--

DROP TABLE IF EXISTS `Item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(256) NOT NULL,
  `item_pic` varchar(256) NOT NULL,
  `item_cost` decimal(10,2) NOT NULL,
  `item_category` varchar(100) DEFAULT NULL,
  `item_count` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Item`
--

LOCK TABLES `Item` WRITE;
/*!40000 ALTER TABLE `Item` DISABLE KEYS */;
INSERT INTO `Item` VALUES (1,' Sony PlayStation 4 PS4 1TB 500GB Console Only','https://thumbs1.ebaystatic.com/pict/04040_0.jpg',195.00,'Video Game Consoles',58),(2,' Sony PlayStation 4 PS4 1TB 500GB Console Only','https://thumbs1.ebaystatic.com/pict/04040_0.jpg',195.00,'Video Game Consoles',76),(3,' Sony PlayStation 4 PS4 1TB 500GB Console Only','https://thumbs1.ebaystatic.com/pict/04040_0.jpg',195.00,'Video Game Consoles',15),(4,'Waterproof Shockproof Hybrid TPU Phone Case Full Cover Fr iPhone X 7 6s 6 8 Plus','https://thumbs1.ebaystatic.com/pict/232493691772404000000002_2.jpg',6.49,'Cases, Covers & Skins',65),(5,'Waterproof Shockproof Hybrid TPU Phone Case Full Cover Fr iPhone X 7 6s 6 8 Plus','https://thumbs1.ebaystatic.com/pict/232493691772404000000003_2.jpg',5.89,'Cases, Covers & Skins',51),(6,'Waterproof Shockproof Hybrid TPU Phone Case Full Cover Fr iPhone X 7 6s 6 8 Plus','https://thumbs1.ebaystatic.com/pict/232493691772404000000003_2.jpg',6.42,'Cases, Covers & Skins',29),(7,'Waterproof Shockproof Hybrid TPU Phone Case Full Cover Fr iPhone X 7 6s 6 8 Plus','https://thumbs1.ebaystatic.com/pict/232493691772404000000002_2.jpg',6.49,'Cases, Covers & Skins',94),(8,'Waterproof Shockproof Hybrid TPU Phone Case Full Cover Fr iPhone X 7 6s 6 8 Plus','https://thumbs1.ebaystatic.com/pict/232493691772404000000003_2.jpg',5.89,'Cases, Covers & Skins',71),(9,'Waterproof Shockproof Hybrid TPU Phone Case Full Cover Fr iPhone X 7 6s 6 8 Plus','https://thumbs1.ebaystatic.com/pict/232493691772404000000003_2.jpg',6.42,'Cases, Covers & Skins',4),(10,'Waterproof Shockproof Hybrid TPU Phone Case Full Cover Fr iPhone X 7 6s 6 8 Plus','https://thumbs1.ebaystatic.com/pict/232493691772404000000002_2.jpg',6.49,'Cases, Covers & Skins',73),(11,'Waterproof Shockproof Hybrid TPU Phone Case Full Cover Fr iPhone X 7 6s 6 8 Plus','https://thumbs1.ebaystatic.com/pict/232493691772404000000003_2.jpg',5.89,'Cases, Covers & Skins',6),(12,'Waterproof Shockproof Hybrid TPU Phone Case Full Cover Fr iPhone X 7 6s 6 8 Plus','https://thumbs1.ebaystatic.com/pict/232493691772404000000003_2.jpg',6.42,'Cases, Covers & Skins',80),(13,'Xbox One S 1TB NBA2K20 Console Physical Copy Game Bundle New ','https://thumbs4.ebaystatic.com/m/mmgVqzJ1upwW_tDdL1AKd0g/140.jpg',189.99,'Video Game Consoles',69),(14,'Gaming Keyboard Backlit PC Mechanical Feeling Backlight Wired LED Illuminated','https://thumbs3.ebaystatic.com/m/mOh4W6pR7j2Kp2FsGZqBRBw/140.jpg',17.99,'Keyboards & Keypads',26),(15,'2.4GHz Wireless Optical Mouse Adjustable DPI Cordless Mice + Receiver for Laptop','https://thumbs2.ebaystatic.com/m/mzaEkPfSq2LDEHrKUkdMBPQ/140.jpg',5.75,'Mice, Trackballs & Touchpads',94),(16,'HP X3000 | Wireless Mouse | Red | K5D26AA#ABA','https://thumbs2.ebaystatic.com/m/mMEhByLKmwVoglaKj8JJDOQ/140.jpg',13.50,'Mice, Trackballs & Touchpads',33),(17,'2.4GHz Wireless Optical Mouse Mice & USB Receiver For PC Laptop Computer DPI USA','https://thumbs4.ebaystatic.com/pict/193168148815404000000001_1.jpg',5.99,'Mice, Trackballs & Touchpads',51),(18,'2.4GHz Wireless Optical Mouse Adjustable DPI Cordless Mice + Receiver for Laptop','https://thumbs2.ebaystatic.com/m/mcFKAkUF7HzLebvLCMBizuA/140.jpg',5.99,'Mice, Trackballs & Touchpads',9),(19,'Waterproof Bluetooth 5.0 Earbuds Headphones Wireless Headset Noise Cancelling','https://thumbs3.ebaystatic.com/m/mUTlcWGuLtQ3ypVoWFLq0dg/140.jpg',23.39,'Headsets',62);
/*!40000 ALTER TABLE `Item` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-02  3:27:32
