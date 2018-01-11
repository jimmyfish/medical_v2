-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: medical
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `hasil`
--

DROP TABLE IF EXISTS `hasil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hasil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `satuan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parameter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `metode_analisa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `baku_mutu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8_unicode_ci,
  `alasan` longtext COLLATE utf8_unicode_ci,
  `is_approved` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_user_idx` (`transaksi`),
  KEY `IDX_4A7670638D93D649` (`user`),
  KEY `IDX_4A7670634EA3CB3D` (`approved_by`),
  CONSTRAINT `FK_4A7670634EA3CB3D` FOREIGN KEY (`approved_by`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_4A7670638D93D649` FOREIGN KEY (`user`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_4A767063F31AE490` FOREIGN KEY (`transaksi`) REFERENCES `transaksi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hasil`
--

LOCK TABLES `hasil` WRITE;
/*!40000 ALTER TABLE `hasil` DISABLE KEYS */;
INSERT INTO `hasil` VALUES (1,1,5,NULL,'qugweuqwye','inenqyiewyi','heqiuwnheiqwu','iehyqinuwenhoqwiue',NULL,NULL,0);
/*!40000 ALTER TABLE `hasil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratorium`
--

DROP TABLE IF EXISTS `laboratorium`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratorium` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lab` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_lab` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kode_lab` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratorium`
--

LOCK TABLES `laboratorium` WRITE;
/*!40000 ALTER TABLE `laboratorium` DISABLE KEYS */;
INSERT INTO `laboratorium` VALUES (1,'Klinik','Klinik','KL');
/*!40000 ALTER TABLE `laboratorium` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` longtext COLLATE utf8_unicode_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` VALUES (1,'Lukman Arif H','Joaodyqwie','09127391623781263');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sampel`
--

DROP TABLE IF EXISTS `sampel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sampel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_laboratorium` int(11) DEFAULT NULL,
  `lokasi_pengambilan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `petugas_pengambil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `kondisi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_sampel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parameter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kode_sampel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `metode_pengambilan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5915752E1DC0374D` (`id_laboratorium`),
  CONSTRAINT `FK_5915752E1DC0374D` FOREIGN KEY (`id_laboratorium`) REFERENCES `laboratorium` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sampel`
--

LOCK TABLES `sampel` WRITE;
/*!40000 ALTER TABLE `sampel` DISABLE KEYS */;
INSERT INTO `sampel` VALUES (1,1,'kjhaiduqnhwiuenhqwineh','iuqhwiuenhqieh','iouqehwinehqiowneh','2018-01-19 01:17:32','uqnheiuqwheiuhqweh','obiehoiehqoiwehqiowueh','qwiuehuqwe','KL-001','iuheiquwhenioqwue');
/*!40000 ALTER TABLE `sampel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sampel` int(11) DEFAULT NULL,
  `pelanggan` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `biaya` int(11) NOT NULL,
  `tanggal_pengambilan_hasil` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_F31AE4905915752E` (`sampel`),
  KEY `IDX_F31AE4901A984E40` (`pelanggan`),
  KEY `IDX_F31AE4908D93D649` (`user`),
  CONSTRAINT `FK_F31AE4901A984E40` FOREIGN KEY (`pelanggan`) REFERENCES `pelanggan` (`id`),
  CONSTRAINT `FK_F31AE4905915752E` FOREIGN KEY (`sampel`) REFERENCES `sampel` (`id`),
  CONSTRAINT `FK_F31AE4908D93D649` FOREIGN KEY (`user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (1,1,1,3,175000,'2018-01-19 01:17:32');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` longtext COLLATE utf8_unicode_ci,
  `telp` bigint(20) DEFAULT NULL,
  `bagian` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `roles` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Thaddeus Ruecker','bret.rolfson','denesik.juston@hotmail.com','dc3a388cf38ae88246560749b776aa1b','903 Stephen Mall\nEast Heiditon, OR 12019-9490',8990314474,'HRD','Staff',0,'a:1:{i:0;s:9:\"ROLE_USER\";}'),(2,'Makayla Kozey','batz.maddison','albina.muller@mitchell.info','dc3a388cf38ae88246560749b776aa1b','574 Alvina Ports Apt. 975\nCaspermouth, WY 52005-0802',8990314474,'HRD','Staff',0,'a:1:{i:0;s:9:\"ROLE_USER\";}'),(3,'Madalyn Koch','nico67','raynor.esperanza@jenkins.info','dc3a388cf38ae88246560749b776aa1b','405 Renner Motorway Suite 322\nWest Vern, NV 43555-9323',8990314474,'HRD','Staff',0,'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),(4,'Eleonore Schaden','hammes.hailie','lester.ullrich@yahoo.com','dc3a388cf38ae88246560749b776aa1b','873 Kautzer Courts Apt. 441\nWest Angeline, ID 82943-4934',8990314474,'HRD','Staff',0,'a:1:{i:0;s:9:\"ROLE_USER\";}'),(5,'Marcelino Berge','champlin.alexandria','naomie.gulgowski@sipes.biz','dc3a388cf38ae88246560749b776aa1b','7792 Rogahn Trafficway Apt. 438\nSchimmelstad, NM 52109',8990314474,'2','Staff',0,'a:1:{i:0;s:11:\"ROLE_ANALIS\";}');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-12  2:06:49
