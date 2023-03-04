/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.25-MariaDB : Database - buy_token
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`buy_token` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `buy_token`;

/*Table structure for table `ms_pelanggan` */

DROP TABLE IF EXISTS `ms_pelanggan`;

CREATE TABLE `ms_pelanggan` (
  `id_pel` varchar(50) NOT NULL,
  `no_meter` int(11) DEFAULT NULL,
  `daya_listrik` varchar(50) DEFAULT NULL,
  `kat_daya` varchar(10) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `alamat_lengkap` varchar(50) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `no_handphone` varchar(12) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_pel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ms_pelanggan` */

LOCK TABLES `ms_pelanggan` WRITE;

insert  into `ms_pelanggan`(`id_pel`,`no_meter`,`daya_listrik`,`kat_daya`,`nama_lengkap`,`alamat_lengkap`,`email`,`no_handphone`,`created_at`,`updated_at`) values 
('21490182',2147483647,'0','R1-900R','latif ismail adjie','kp baru banget jadi','emailny@mail.com','02147483','2023-03-04 11:11:58','2023-03-04 17:42:01'),
('75369975',100256985,'357.25','R2-3600','latif ismail adjie','jalan jalan',NULL,'08158888','2023-03-02 20:03:31','2023-03-04 17:41:53');

UNLOCK TABLES;

/*Table structure for table `ms_token` */

DROP TABLE IF EXISTS `ms_token`;

CREATE TABLE `ms_token` (
  `id_token` varchar(50) DEFAULT NULL,
  `jumlah_kwh` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ms_token` */

LOCK TABLES `ms_token` WRITE;

insert  into `ms_token`(`id_token`,`jumlah_kwh`,`harga`,`created_at`,`update_at`) values 
('TKcc275031c2221a03','13.2',20000,'2023-03-01 19:31:45',NULL),
('TKc05a40672650335f','33.1',50000,'2023-03-01 19:32:41',NULL),
('TKfec07cf2a0aa57ad','66.2',100000,'2023-03-01 19:32:52',NULL),
('TKce35ec6182aa57ec','132.3',250000,'2023-03-01 19:33:05',NULL);

UNLOCK TABLES;

/*Table structure for table `token_generate` */

DROP TABLE IF EXISTS `token_generate`;

CREATE TABLE `token_generate` (
  `nomor_token` bigint(20) unsigned NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  UNIQUE KEY `nomor_token` (`nomor_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `token_generate` */

LOCK TABLES `token_generate` WRITE;

insert  into `token_generate`(`nomor_token`,`id_transaksi`,`created_at`) values 
(2147483647,'ID-f4bf0ee9','2023-03-02 18:53:28'),
(41694498811,'ID-496653f9','2023-03-02 19:03:38'),
(76584540496,'ID-d20c6cfd','2023-03-04 13:00:53'),
(98394534565,'ID-b5912a1c','2023-03-02 19:00:37');

UNLOCK TABLES;

/*Table structure for table `tr_pembayaran` */

DROP TABLE IF EXISTS `tr_pembayaran`;

CREATE TABLE `tr_pembayaran` (
  `id_transaksi` varchar(50) NOT NULL,
  `id_pel` int(11) DEFAULT NULL,
  `id_token` varchar(50) DEFAULT NULL,
  `nmr_hp` varchar(50) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `jumlah_kwh` varchar(50) DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `tgl_pembelian` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tr_pembayaran` */

LOCK TABLES `tr_pembayaran` WRITE;

insert  into `tr_pembayaran`(`id_transaksi`,`id_pel`,`id_token`,`nmr_hp`,`email`,`jumlah_kwh`,`metode_pembayaran`,`total_bayar`,`tgl_pembelian`,`created_at`) values 
('ID-496653f9',75369975,'TKc05a40672650335f','12','as','33.1','kartu_kredit',52000,'2023-03-02 19:03:38','2023-03-02 19:03:38'),
('ID-b5912a1c',75369975,'TKfec07cf2a0aa57ad','12222','yyyy','66.2','kartu_kredit',102000,'2023-03-02 19:00:37','2023-03-02 19:00:37'),
('ID-d20c6cfd',75369975,'TKce35ec6182aa57ec','123123123','test@asdad','132.3','paypal',252000,'2023-03-04 13:00:53','2023-03-04 13:00:53'),
('ID-f4bf0ee9',75369975,'TKfec07cf2a0aa57ad','1222','asd','66.2','kartu_kredit',102000,'2023-03-02 18:53:28','2023-03-02 18:53:28');

UNLOCK TABLES;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pel` varchar(50) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(150) NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

LOCK TABLES `user` WRITE;

insert  into `user`(`id`,`id_pel`,`name`,`username`,`password`,`role`) values 
(10,NULL,'tester','test','$2y$10$w2Q99l8hIDBJC5TSE4J6huac3GS6hS.MWHak6ykY0uxw8L2FuJYB2','users'),
(11,NULL,'admin','admin','$2y$10$VwjDmDWxbNeYezbfhD1tded6iLBZcySLZXHyHG./NNjGhYdGqxBVG','admin');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
