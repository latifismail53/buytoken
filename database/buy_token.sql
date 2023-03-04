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

/*Table structure for table `ms_token` */

DROP TABLE IF EXISTS `ms_token`;

CREATE TABLE `ms_token` (
  `id_token` varchar(50) DEFAULT NULL,
  `jumlah_kwh` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `token_generate` */

DROP TABLE IF EXISTS `token_generate`;

CREATE TABLE `token_generate` (
  `nomor_token` bigint(20) unsigned NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  UNIQUE KEY `nomor_token` (`nomor_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
