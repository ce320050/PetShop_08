/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.4.14-MariaDB : Database - petshop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`petshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `petshop`;

/*Table structure for table `keranjang` */

DROP TABLE IF EXISTS `keranjang`;

CREATE TABLE `keranjang` (
  `id_cart` int(11) NOT NULL AUTO_INCREMENT,
  `fid_user` int(11) NOT NULL,
  `fid_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `keranjang` */

/*Table structure for table `metode_pembayaran` */

DROP TABLE IF EXISTS `metode_pembayaran`;

CREATE TABLE `metode_pembayaran` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `metode_pembayaran` */

insert  into `metode_pembayaran`(`id_transaksi`,`name`,`address`,`phone`,`payment`) values (1,'Jesika Manurung','Medan','081245637789','tunai');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama_product` varchar(300) DEFAULT NULL,
  `gambar` varchar(300) DEFAULT NULL,
  `harga` varchar(500) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updates_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `product` */

insert  into `product`(`id`,`nama_product`,`gambar`,`harga`,`keterangan`,`created_at`,`updates_at`) values (1,'Dog Food','1.jpeg','325.000','20 Kg','2021-06-03 18:59:02','2021-05-31 18:00:00'),(2,'Cat Food Keke','2.jpg','85.000','2 Kg','2021-05-31 18:00:00','2021-05-31 18:00:00'),(3,'Dog and Cat Shampo','3.jpg','25.000','250 Ml','2021-05-31 18:00:00','2021-05-31 18:00:00'),(4,'Vege Bones','4.jpg','20.000','Mainan anjing','2021-05-31 18:00:00','2021-05-31 18:00:00'),(5,'Tali Kekang','5.jpg','65.000','Lebar 2.5 cm','2021-05-31 18:00:00','2021-05-31 18:00:00'),(6,'Tali Kekang Rantai','6.jpg','20.000','Ukuran rantai 3 mm','2021-05-31 18:00:00','2021-05-31 18:00:00'),(7,'Pasir Kucing','7.jpg','40.000','5 Liter','2021-05-31 18:00:00','2021-05-31 18:00:00');

/*Table structure for table `transaksi_detail` */

DROP TABLE IF EXISTS `transaksi_detail`;

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nama_product` varchar(255) NOT NULL,
  PRIMARY KEY (`id_transaksi_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi_detail` */

insert  into `transaksi_detail`(`id_transaksi_detail`,`id_transaksi`,`id_product`,`qty`,`harga`,`subtotal`,`nama_product`) values (1,0,1,2,325000,650000,'Dog Food'),(2,0,2,1,85000,85000,'Cat Food Keke'),(3,0,1,1,325000,325000,'Dog Food');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password`) values (1,'shopiasibarani','shopiasibarani@gmail.com','sibarani123');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
