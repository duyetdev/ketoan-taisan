CREATE DATABASE  IF NOT EXISTS `TSCD` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `TSCD`;
-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: TSCD
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Chi_tiet_phieu_ban`
--

DROP TABLE IF EXISTS `Chi_tiet_phieu_ban`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Chi_tiet_phieu_ban` (
  `so_pb` int(11) NOT NULL,
  `ma_ts` int(11) DEFAULT NULL,
  `tk_doi_ung` int(11) DEFAULT NULL,
  `so_tien` float DEFAULT NULL,
  PRIMARY KEY (`so_pb`),
  KEY `fk_Chi_tiet_phieu_ban_2_idx` (`ma_ts`),
  KEY `fk_Chi_tiet_phieu_ban_3_idx` (`tk_doi_ung`),
  CONSTRAINT `fk_Chi_tiet_phieu_ban_1` FOREIGN KEY (`so_pb`) REFERENCES `Phieu_ban_ts` (`so_pb`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Chi_tiet_phieu_ban_2` FOREIGN KEY (`ma_ts`) REFERENCES `Tai_san` (`ma_ts`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Chi_tiet_phieu_ban_3` FOREIGN KEY (`tk_doi_ung`) REFERENCES `Tai_khoan` (`ma_tk`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Chi_tiet_phieu_ban`
--

LOCK TABLES `Chi_tiet_phieu_ban` WRITE;
/*!40000 ALTER TABLE `Chi_tiet_phieu_ban` DISABLE KEYS */;
/*!40000 ALTER TABLE `Chi_tiet_phieu_ban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Chi_tiet_phieu_mua`
--

DROP TABLE IF EXISTS `Chi_tiet_phieu_mua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Chi_tiet_phieu_mua` (
  `so_pm` int(11) NOT NULL,
  `ma_ts` int(11) DEFAULT NULL,
  `tk_doi_ung` int(11) DEFAULT NULL,
  `so_tien` float DEFAULT NULL,
  PRIMARY KEY (`so_pm`),
  KEY `fk_Chi_tiet_phieu_mua_2_idx` (`ma_ts`),
  KEY `fk_Chi_tiet_phieu_mua_3_idx` (`tk_doi_ung`),
  CONSTRAINT `fk_Chi_tiet_phieu_mua_1` FOREIGN KEY (`so_pm`) REFERENCES `Chi_tiet_phieu_mua` (`ma_ts`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Chi_tiet_phieu_mua_2` FOREIGN KEY (`ma_ts`) REFERENCES `Phieu_mua_ts` (`so_pm`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Chi_tiet_phieu_mua_3` FOREIGN KEY (`tk_doi_ung`) REFERENCES `Tai_khoan` (`ma_tk`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Chi_tiet_phieu_mua`
--

LOCK TABLES `Chi_tiet_phieu_mua` WRITE;
/*!40000 ALTER TABLE `Chi_tiet_phieu_mua` DISABLE KEYS */;
/*!40000 ALTER TABLE `Chi_tiet_phieu_mua` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Khach_hang`
--

DROP TABLE IF EXISTS `Khach_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Khach_hang` (
  `ma_kh` int(11) NOT NULL,
  `ten_kh` varchar(45) DEFAULT NULL,
  `dia_chi` varchar(45) DEFAULT NULL,
  `ma_so_thue` varchar(45) DEFAULT NULL,
  `so_tai_khoan` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ma_kh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Khach_hang`
--

LOCK TABLES `Khach_hang` WRITE;
/*!40000 ALTER TABLE `Khach_hang` DISABLE KEYS */;
/*!40000 ALTER TABLE `Khach_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Kho`
--

DROP TABLE IF EXISTS `Kho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Kho` (
  `ma_kho` int(11) NOT NULL,
  `ten_kho` varchar(45) DEFAULT NULL,
  `dia_chi` varchar(45) DEFAULT NULL,
  `sdt` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ma_kho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Kho`
--

LOCK TABLES `Kho` WRITE;
/*!40000 ALTER TABLE `Kho` DISABLE KEYS */;
/*!40000 ALTER TABLE `Kho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Loai_tai_san`
--

DROP TABLE IF EXISTS `Loai_tai_san`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Loai_tai_san` (
  `ma_lts` int(11) NOT NULL,
  `ten_loai` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ma_lts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Loai_tai_san`
--

LOCK TABLES `Loai_tai_san` WRITE;
/*!40000 ALTER TABLE `Loai_tai_san` DISABLE KEYS */;
/*!40000 ALTER TABLE `Loai_tai_san` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Phieu_ban_ts`
--

DROP TABLE IF EXISTS `Phieu_ban_ts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Phieu_ban_ts` (
  `so_pb` int(11) NOT NULL,
  `ngay_ban` varchar(45) DEFAULT NULL,
  `so_hoa_don` varchar(45) DEFAULT NULL,
  `ngay_hoa_don` varchar(45) DEFAULT NULL,
  `loai_hoa_don` varchar(45) DEFAULT NULL,
  `thue_suat` varchar(45) DEFAULT NULL,
  `ma_kh` int(11) DEFAULT NULL,
  `ma_tk` int(11) DEFAULT NULL,
  `ma_kho` int(11) DEFAULT NULL,
  PRIMARY KEY (`so_pb`),
  KEY `fk_Phieu_ban_ts_1_idx` (`ma_kh`),
  KEY `fk_Phieu_ban_ts_2_idx` (`ma_tk`),
  KEY `fk_Phieu_ban_ts_3_idx` (`ma_kho`),
  CONSTRAINT `fk_Phieu_ban_ts_2` FOREIGN KEY (`ma_tk`) REFERENCES `Tai_khoan` (`ma_tk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Phieu_ban_ts_3` FOREIGN KEY (`ma_kho`) REFERENCES `Kho` (`ma_kho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Phieu_ban_ts_1` FOREIGN KEY (`ma_kh`) REFERENCES `Khach_hang` (`ma_kh`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Phieu_ban_ts`
--

LOCK TABLES `Phieu_ban_ts` WRITE;
/*!40000 ALTER TABLE `Phieu_ban_ts` DISABLE KEYS */;
/*!40000 ALTER TABLE `Phieu_ban_ts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Phieu_mua_ts`
--

DROP TABLE IF EXISTS `Phieu_mua_ts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Phieu_mua_ts` (
  `so_pm` int(11) NOT NULL,
  `ngay_lap` date DEFAULT NULL,
  `ngay_su_dung` date DEFAULT NULL,
  `so_hoa_son` int(11) DEFAULT NULL,
  `ngay_phat_hanh_hd` date DEFAULT NULL,
  `loai_hoa_don` varchar(45) DEFAULT NULL,
  `thue_suat` float DEFAULT NULL,
  `ma_kh` int(11) DEFAULT NULL,
  `ma_tk_chinh` int(11) DEFAULT NULL,
  `ma_kho` int(11) DEFAULT NULL,
  PRIMARY KEY (`so_pm`),
  KEY `fk_Phieu_mua_ts_1_idx` (`ma_kh`),
  KEY `fk_Phieu_mua_ts_2_idx` (`ma_tk_chinh`),
  KEY `fk_Phieu_mua_ts_3_idx` (`ma_kho`),
  CONSTRAINT `fk_Phieu_mua_ts_2` FOREIGN KEY (`ma_tk_chinh`) REFERENCES `Tai_khoan` (`ma_tk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Phieu_mua_ts_3` FOREIGN KEY (`ma_kho`) REFERENCES `Kho` (`ma_kho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Phieu_mua_ts_1` FOREIGN KEY (`ma_kh`) REFERENCES `Khach_hang` (`ma_kh`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Phieu_mua_ts`
--

LOCK TABLES `Phieu_mua_ts` WRITE;
/*!40000 ALTER TABLE `Phieu_mua_ts` DISABLE KEYS */;
/*!40000 ALTER TABLE `Phieu_mua_ts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tai_khoan`
--

DROP TABLE IF EXISTS `Tai_khoan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tai_khoan` (
  `ma_tk` int(11) NOT NULL,
  `ten_tk` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ma_tk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tai_khoan`
--

LOCK TABLES `Tai_khoan` WRITE;
/*!40000 ALTER TABLE `Tai_khoan` DISABLE KEYS */;
/*!40000 ALTER TABLE `Tai_khoan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tai_san`
--

DROP TABLE IF EXISTS `Tai_san`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tai_san` (
  `ma_ts` int(11) NOT NULL,
  `ten_ts` varchar(45) DEFAULT NULL,
  `dvt` varchar(45) DEFAULT NULL,
  `nguyen_gia` int(11) DEFAULT NULL,
  `so_nam_khau_hao` int(11) DEFAULT NULL,
  `ma_lts` int(11) DEFAULT NULL,
  PRIMARY KEY (`ma_ts`),
  KEY `fk_Tai_san_1_idx` (`ma_lts`),
  CONSTRAINT `fk_Tai_san_1` FOREIGN KEY (`ma_lts`) REFERENCES `Loai_tai_san` (`ma_lts`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tai_san`
--

LOCK TABLES `Tai_san` WRITE;
/*!40000 ALTER TABLE `Tai_san` DISABLE KEYS */;
/*!40000 ALTER TABLE `Tai_san` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-10 10:56:48
