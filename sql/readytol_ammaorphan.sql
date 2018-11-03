-- MySQL dump 10.13  Distrib 5.6.41, for Linux (x86_64)
--
-- Host: localhost    Database: readytol_ammaorphan
-- ------------------------------------------------------
-- Server version	5.6.41

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
-- Table structure for table `access`
--

DROP TABLE IF EXISTS `access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access` (
  `guid` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `user_role` text NOT NULL,
  `check` varchar(5) NOT NULL,
  PRIMARY KEY (`guid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access`
--

LOCK TABLES `access` WRITE;
/*!40000 ALTER TABLE `access` DISABLE KEYS */;
/*!40000 ALTER TABLE `access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `guid` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `discription` longtext NOT NULL,
  `dateandtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`guid`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` (`guid`, `id`, `name`, `image`, `discription`, `dateandtime`) VALUES (54,2,'','1531466609_team7.jpg','','2018-07-13 07:23:29'),(104,8,'Property _103','1534418918_upld_thumb_530353228155830087_8.jpg','This pattern is a defined standard and the property is read-only. Therefore, it is always the same regardless of the culture used or the format provider supplied. The custom','2018-08-16 11:28:38'),(106,7,'Property _102_SELL','1534419015_upld_thumb_530353228155830087_8.jpg','Icon fonts let you to quickly convert vector icons into webfonts. This means you can display vector icons in your website and control them with CSS. Check this ...','2018-08-16 11:30:15'),(109,8,'Property _106','1534482128_upld_thumb_530353228155830087_8.jpg','This pattern is a defined standard and the property is read-only. Therefore, it is always the same regardless of the culture used or the format provider supplied. The custom','2018-08-17 05:02:08'),(95,5,'','1534158911_1.jpg','','2018-08-13 11:15:11'),(96,5,'','1534158911_2.jpg','','2018-08-13 11:15:11'),(97,5,'','1534158911_3.jpg','','2018-08-13 11:15:11'),(98,5,'','1534158911_4.jpg','','2018-08-13 11:15:11'),(99,5,'','1534158911_5.jpg','','2018-08-13 11:15:11'),(103,8,'Property _102','1534418877_upld_thumb_530353228155830087_8.jpg','This pattern is a defined standard and the property is read-only. Therefore, it is always the same regardless of the culture used or the format provid.','2018-08-17 04:55:29'),(105,8,'Property _104','1534418931_upld_thumb_530353228155830087_8.jpg','This pattern is a defined standard and the property is read-only. Therefore, it is always the same regardless of the culture used or the format provider supplied. The custom','2018-08-16 11:28:51'),(107,7,'Property _102_SELL1','1534419026_upld_thumb_530353228155830087_8.jpg','Icon fonts let you to quickly convert vector icons into webfonts. This means you can display vector icons in your website and control them with CSS. Check this ...','2018-08-16 11:30:26'),(108,7,'Property _102_SELL2','1534419041_upld_thumb_530353228155830087_8.jpg','Icon fonts let you to quickly convert vector icons into webfonts. This means you can display vector icons in your website and control them with CSS. Check this ...','2018-08-16 11:30:41'),(110,7,'Property _102_SELL2','1534482180_upld_thumb_530353228155830087_8.jpg','Icon fonts let you to quickly convert vector icons into webfonts. This means you can display vector icons in your website and control them with CSS. Check this ...','2018-08-17 05:03:00'),(111,12,'','1539672709_hero_bg_bw_1.jpg','','2018-10-16 06:51:49'),(112,12,'','1539672749_hero_bg_bw_2.jpg','','2018-10-16 06:52:29'),(113,12,'','1539672755_img_sm_2.jpg','','2018-10-16 06:52:35'),(114,12,'','1539672772_img_sq_6.jpg','','2018-10-16 06:52:52'),(115,11,'','1539672896_hero_bg_bw_1.jpg','','2018-10-16 06:54:56'),(116,11,'','1539672896_hero_bg_bw_2.jpg','','2018-10-16 06:54:56'),(117,11,'','1539672896_hero_bg_bw_3.jpg','','2018-10-16 06:54:56'),(118,11,'','1539672896_img_sm_1.jpg','','2018-10-16 06:54:56'),(119,11,'','1539672896_img_sm_2.jpg','','2018-10-16 06:54:56'),(120,11,'','1539672896_img_sm_3.jpg','','2018-10-16 06:54:56'),(121,10,'','1539672912_about.jpg','','2018-10-16 06:55:12'),(122,10,'','1539672912_donate.png','','2018-10-16 06:55:12'),(123,10,'','1539672912_hero_bg_bw_1.jpg','','2018-10-16 06:55:12'),(124,10,'','1539672912_hero_bg_bw_2.jpg','','2018-10-16 06:55:12'),(125,10,'','1539672912_hero_bg_bw_3.jpg','','2018-10-16 06:55:12'),(126,10,'','1539672912_img_sm_1.jpg','','2018-10-16 06:55:12'),(127,13,'','1539683381_hero_bg_bw_3.jpg','','2018-10-16 09:49:41'),(128,13,'','1539683381_img_sm_1.jpg','','2018-10-16 09:49:41'),(129,13,'','1539683381_img_sm_2.jpg','','2018-10-16 09:49:41'),(130,13,'','1539683381_img_sm_3.jpg','','2018-10-16 09:49:41'),(131,14,'','1540207001_D2GABQ25CV.png','','2018-10-22 11:16:41'),(132,13,'','1540206980_charity-Fotolia_46498469_L.jpg','','2018-10-22 11:16:20'),(133,14,'','1540206980_resize_teja_2.png','','2018-10-22 11:16:20');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `guid` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`guid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`guid`, `image`) VALUES (3,'https://www.youtube.com/embed/3pjqjHwFbgA'),(4,'https://www.youtube.com/embed/_Xcmh1LQB9I'),(5,'https://www.youtube.com/embed/_Xcmh1LQB9I'),(6,'https://www.youtube.com/embed/_Xcmh1LQB9I'),(7,'https://www.youtube.com/embed/_Xcmh1LQB9I'),(8,'https://www.youtube.com/embed/_Xcmh1LQB9I'),(9,'https://www.youtube.com/embed/_Xcmh1LQB9I'),(10,'https://www.youtube.com/watch?v=D3Hhn9VYMtU'),(11,'https://www.youtube.com/watch?v=8MYJDROSOu0');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `guid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `securitykey` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `role` enum('superadmin','adminuser') NOT NULL,
  `status` enum('Active','Pending','Block') NOT NULL,
  `dateandtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `centername` varchar(250) NOT NULL,
  PRIMARY KEY (`guid`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`guid`, `name`, `username`, `password`, `securitykey`, `email`, `date`, `role`, `status`, `dateandtime`, `centername`) VALUES (1,'Super Admin','admin','7LHkGoyWtWgXpUUn7ffi/H3gLWLt1TwunSY1Cqmio1M=','5bc5e781bb100','ammaorphan@info.com','2014-12-09','superadmin','Active','2018-10-16 13:28:33','Matrimony Centers');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `guid` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text NULL,
  `short_description` text NULL,
  `image` varchar(200) NULL,
  `description` text  NULL,
  `date` date NULL,
  PRIMARY KEY (`guid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

commit;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `guid` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(100) NOT NULL,
  `userid` int(30) NOT NULL,
  `vendor` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `location` text NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `wallet` decimal(50,2) NOT NULL,
  `walletpoints` int(50) NOT NULL,
  `discount` decimal(50,2) NOT NULL,
  `coupon` varchar(100) NOT NULL,
  `price` decimal(50,2) NOT NULL,
  `mihpayid` int(50) NOT NULL,
  `bank_ref_num` int(50) NOT NULL,
  `payment_id` varchar(250) NOT NULL,
  `payment_request_id` varchar(250) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`guid`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`guid`, `orderid`, `userid`, `vendor`, `name`, `mobile`, `email`, `image`, `note`, `address`, `location`, `latitude`, `longitude`, `payment_mode`, `total`, `wallet`, `walletpoints`, `discount`, `coupon`, `price`, `mihpayid`, `bank_ref_num`, `payment_id`, `payment_request_id`, `payment_status`, `status`, `date`) VALUES (60,'',0,0,'Test','7856432658','sripada.narendra@icloud.com','','Tes','','','','','',0.00,0.00,0,0.00,'',100.00,0,0,'','','','','0000-00-00'),(61,'',0,0,'','','','1540204020199FEF27-6B28-42D3-9DFA-B525E9A1A0A8.jpeg','','','','','','',0.00,0.00,0,0.00,'',0.00,0,0,'','','','','0000-00-00'),(62,'',0,0,'Harish Dubaguntla','4088163559','dgharish@gmail.com','1540206277care.jpg','for ophan donations.','','','','','',0.00,0.00,0,0.00,'',10.00,0,0,'','','','','0000-00-00'),(63,'',0,0,'Harish Dubaguntla','4088163559','dgharish@gmail.com','1540206382care.jpg','for testing','','','','','',0.00,0.00,0,0.00,'',50.00,0,0,'','','','','0000-00-00'),(64,'',0,0,'Harish Dubaguntla','9000373796','dgharish@gmail.com','1540206414care.jpg','for testing','','','','','',0.00,0.00,0,0.00,'',50.00,0,0,'','','','','0000-00-00'),(65,'',0,0,'apparao','5484845484','sivaalapati@gmail.com','','jbjb','','','','','',0.00,0.00,0,0.00,'',10.00,0,0,'','','','','0000-00-00'),(67,'',0,0,'Harish Dubaguntla','9000373796','dgharish@gmail.com','1540289440P1030262.JPG','Donation','','','','','',0.00,0.00,0,0.00,'',50.00,0,0,'','','','','0000-00-00'),(52,'',0,0,'apparao','','sivaalapati@gmail.com','1539693565banner_3.jpg','','','','','','',0.00,0.00,0,0.00,'',12345.00,0,0,'','','','','0000-00-00'),(53,'',0,0,'apparao','','sivaalapati@gmail.com','1539694089banner_3.jpg','','','','','','',0.00,0.00,0,0.00,'',12345.00,0,0,'','','','','0000-00-00'),(54,'',0,0,'apparao','','sivaalapati@gmail.com','1539694179banner_3.jpg','','','','','','',1234.00,0.00,0,0.00,'',12345.00,0,0,'','','','','0000-00-00'),(55,'',0,0,'suresh','','sivaalapati@gmail.com','1539694444banner_3.jpg','','','','','','',0.00,0.00,0,0.00,'',12.00,0,0,'','','','','0000-00-00'),(56,'',0,0,'apparao','','sivaalapati@gmail.com','1539694808banner_3.jpg','sdfdf','','','','','',0.00,0.00,0,0.00,'',1.00,0,0,'','','','','0000-00-00'),(57,'',0,0,'dasdsa','','sivaalapati@gmail.com','1539694998banner_3.jpg','xszd','','','','','',0.00,0.00,0,0.00,'',1.00,0,0,'','','','','0000-00-00'),(58,'',0,0,'dasdsa','','sivaalapati@gmail.com','1539695031banner_3.jpg','xszd','','','','','',0.00,0.00,0,0.00,'',10.00,0,0,'','','','','0000-00-00'),(59,'',0,0,'apparao','5484845484','sivaalapati@gmail.com','1539695603banner_3.jpg','fvfd','','','','','',0.00,0.00,0,0.00,'',10.00,0,0,'','','','','0000-00-00');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `past_conferences`
--

DROP TABLE IF EXISTS `past_conferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `past_conferences` (
  `guid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`guid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `past_conferences`
--

LOCK TABLES `past_conferences` WRITE;
/*!40000 ALTER TABLE `past_conferences` DISABLE KEYS */;
INSERT INTO `past_conferences` (`guid`, `name`, `image`) VALUES (10,'Album Title','1539672531img_sm_2.jpg'),(11,'Album Title','1539672542img_sq_2.jpg'),(12,'Album Title-2015','1539672557img_sq_3.jpg'),(13,'Album-2018','1539683333img_sq_1.jpg'),(14,'Test Album','15402069271456.JPG');
/*!40000 ALTER TABLE `past_conferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `title`
--

DROP TABLE IF EXISTS `title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `title` (
  `guid` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`guid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `title`
--

LOCK TABLES `title` WRITE;
/*!40000 ALTER TABLE `title` DISABLE KEYS */;
INSERT INTO `title` (`guid`, `title`) VALUES (1,'ammaorphan');
/*!40000 ALTER TABLE `title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `guid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`guid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` (`guid`, `name`, `price`, `description`, `image`) VALUES (1,'Ut laoreet dolore magna aliquam erat','2000','Lorem ipsum dolor sit amet, consectetuer elit, sed diam nonummy nibh tincidunt ut laoreet dolore magna aliquam erat.','1531472495article1.jpg'),(2,'Nibh tincidunt ut laoreet dolore magna aliquam','3000','Lorem ipsum dolor sit amet, consectetuer elit, sed diam nonummy nibh tincidunt ut laoreet dolore magna aliquam erat.','1531475687article4.jpg'),(3,'Consectetuer elit, sed diam nonummy nibh tincidunt','7000','Lorem ipsum dolor sit amet, consectetuer elit, sed diam nonummy nibh tincidunt ut laoreet dolore magna aliquam erat.','1531475733article6.jpg');
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ysa`
--

DROP TABLE IF EXISTS `ysa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ysa` (
  `guid` int(11) NOT NULL AUTO_INCREMENT,
  `ctbr` varchar(200) NOT NULL,
  `tppr` varchar(200) NOT NULL,
  `rppr` varchar(200) NOT NULL,
  `tnme` varchar(200) NOT NULL,
  `fnme` varchar(200) NOT NULL,
  `onme` varchar(200) NOT NULL,
  `cnme` varchar(200) NOT NULL,
  `enme` varchar(200) NOT NULL,
  `anme` varchar(200) NOT NULL,
  `phd` varchar(200) NOT NULL,
  `phdnme` varchar(200) NOT NULL,
  `osnme` varchar(200) NOT NULL,
  PRIMARY KEY (`guid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ysa`
--

LOCK TABLES `ysa` WRITE;
/*!40000 ALTER TABLE `ysa` DISABLE KEYS */;
INSERT INTO `ysa` (`guid`, `ctbr`, `tppr`, `rppr`, `tnme`, `fnme`, `onme`, `cnme`, `enme`, `anme`, `phd`, `phdnme`, `osnme`) VALUES (1,'NO','dbgfb','vbcvb','cvbcv','cscsadsad','cvbvc','cvbfcv','ksbabu@gmail.com','cvbvc','Phd','cscsadsad 80086091','cvbvc');
/*!40000 ALTER TABLE `ysa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'readytol_ammaorphan'
--

--
-- Dumping routines for database 'readytol_ammaorphan'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-23 16:19:40

// Photos
ALTER TABLE album ADD can_see varchar(10);

// Albums
ALTER TABLE past_conferences ADD can_see varchar(10);

// Videos
ALTER TABLE events ADD can_see varchar(10);

Update album set can_see='Yes' WHERE 1=1;
Update past_conferences set can_see='Yes' WHERE 1=1;
Update events set can_see='Yes' WHERE 1=1;
