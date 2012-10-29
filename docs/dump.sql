/*
SQLyog Ultimate v8.71 
MySQL - 5.1.48-community : Database - stas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`stas` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `stas`;

/*Table structure for table `firms` */

DROP TABLE IF EXISTS `firms`;

CREATE TABLE `firms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `firms` */

insert  into `firms`(`id`,`name`,`description`) values (1,'Viko','Viko'),(2,'Test','');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `image_extension` varchar(8) DEFAULT NULL,
  `price` float NOT NULL,
  `firm_id` int(11) unsigned NOT NULL,
  `status` enum('active','disabled') DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `FK_products_firm_id_firms_id` (`firm_id`),
  CONSTRAINT `FK_products_firm_id_firms_id` FOREIGN KEY (`firm_id`) REFERENCES `firms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=504 DEFAULT CHARSET=utf8;

/*Data for the table `products` */

insert  into `products`(`id`,`title`,`description`,`image_extension`,`price`,`firm_id`,`status`) values (1,'Розетка','Описание розетки Вико','jpg',6,1,'active'),(2,'Розетка Тест','Тест','gif',44.25,2,'active'),(3,'Розетка','Описание розетки Вико','jpg',2.17,1,'active'),(4,'Розетка Тест','Тест','gif',78.73,2,'active'),(6,'Розетка','Описание розетки Вико','jpg',87.14,1,'active'),(7,'Розетка Тест','Тест','gif',99.52,2,'active'),(8,'Розетка','Описание розетки Вико','jpg',36.16,1,'active'),(9,'Розетка Тест','Тест','gif',82.26,2,'active'),(13,'Розетка','Описание розетки Вико','jpg',2.82,1,'active'),(14,'Розетка Тест','Тест','gif',67.3,2,'active'),(15,'Розетка','Описание розетки Вико','jpg',28.07,1,'active'),(16,'Розетка Тест','Тест','gif',38.42,2,'active'),(17,'Розетка','Описание розетки Вико','jpg',7.92,1,'active'),(18,'Розетка Тест','Тест','gif',24.31,2,'active'),(19,'Розетка','Описание розетки Вико','jpg',97.81,1,'active'),(20,'Розетка Тест','Тест','gif',16.1,2,'active'),(28,'Розетка','Описание розетки Вико','jpg',87.1,1,'active'),(29,'Розетка Тест','Тест','gif',87.17,2,'active'),(30,'Розетка','Описание розетки Вико','jpg',74.56,1,'active'),(31,'Розетка Тест','Тест','gif',11.27,2,'active'),(32,'Розетка','Описание розетки Вико','jpg',32.7,1,'active'),(33,'Розетка Тест','Тест','gif',29.67,2,'active'),(34,'Розетка','Описание розетки Вико','jpg',50.24,1,'active'),(35,'Розетка Тест','Тест','gif',62.21,2,'active'),(36,'Розетка','Описание розетки Вико','jpg',60.34,1,'active'),(37,'Розетка Тест','Тест','gif',15.04,2,'active'),(38,'Розетка','Описание розетки Вико','jpg',94.18,1,'active'),(39,'Розетка Тест','Тест','gif',25.81,2,'active'),(40,'Розетка','Описание розетки Вико','jpg',46.48,1,'active'),(41,'Розетка Тест','Тест','gif',54.98,2,'active'),(42,'Розетка','Описание розетки Вико','jpg',35.46,1,'active'),(43,'Розетка Тест','Тест','gif',12.35,2,'active'),(59,'Розетка','Описание розетки Вико','jpg',55.4,1,'active'),(60,'Розетка Тест','Тест','gif',39.92,2,'active'),(61,'Розетка','Описание розетки Вико','jpg',33.43,1,'active'),(62,'Розетка Тест','Тест','gif',47.36,2,'active'),(63,'Розетка','Описание розетки Вико','jpg',36.54,1,'active'),(64,'Розетка Тест','Тест','gif',40.61,2,'active'),(65,'Розетка','Описание розетки Вико','jpg',93.41,1,'active'),(66,'Розетка Тест','Тест','gif',45.25,2,'active'),(67,'Розетка','Описание розетки Вико','jpg',45.99,1,'active'),(68,'Розетка Тест','Тест','gif',94.21,2,'active'),(69,'Розетка','Описание розетки Вико','jpg',33.09,1,'active'),(70,'Розетка Тест','Тест','gif',82.83,2,'active'),(71,'Розетка','Описание розетки Вико','jpg',14.86,1,'active'),(72,'Розетка Тест','Тест','gif',25.82,2,'active'),(73,'Розетка','Описание розетки Вико','jpg',84.53,1,'active'),(74,'Розетка Тест','Тест','gif',45.16,2,'active'),(75,'Розетка','Описание розетки Вико','jpg',72.22,1,'active'),(76,'Розетка Тест','Тест','gif',25.64,2,'active'),(77,'Розетка','Описание розетки Вико','jpg',11.55,1,'active'),(78,'Розетка Тест','Тест','gif',80.8,2,'active'),(79,'Розетка','Описание розетки Вико','jpg',69.35,1,'active'),(80,'Розетка Тест','Тест','gif',4.36,2,'active'),(81,'Розетка','Описание розетки Вико','jpg',13.76,1,'active'),(82,'Розетка Тест','Тест','gif',55.73,2,'active'),(83,'Розетка','Описание розетки Вико','jpg',37.35,1,'active'),(84,'Розетка Тест','Тест','gif',19.56,2,'active'),(85,'Розетка','Описание розетки Вико','jpg',85.75,1,'active'),(86,'Розетка Тест','Тест','gif',70.09,2,'active'),(87,'Розетка','Описание розетки Вико','jpg',93.17,1,'active'),(88,'Розетка Тест','Тест','gif',55.59,2,'active'),(89,'Розетка','Описание розетки Вико','jpg',98.45,1,'active'),(90,'Розетка Тест','Тест','gif',25.48,2,'active'),(122,'Розетка','Описание розетки Вико','jpg',32.05,1,'active'),(123,'Розетка Тест','Тест','gif',83.83,2,'active'),(124,'Розетка','Описание розетки Вико','jpg',22.96,1,'active'),(125,'Розетка Тест','Тест','gif',63.34,2,'active'),(126,'Розетка','Описание розетки Вико','jpg',47.83,1,'active'),(127,'Розетка Тест','Тест','gif',49.12,2,'active'),(128,'Розетка','Описание розетки Вико','jpg',2.09,1,'active'),(129,'Розетка Тест','Тест','gif',63.09,2,'active'),(130,'Розетка','Описание розетки Вико','jpg',9.21,1,'active'),(131,'Розетка Тест','Тест','gif',56.76,2,'active'),(132,'Розетка','Описание розетки Вико','jpg',56.17,1,'active'),(133,'Розетка Тест','Тест','gif',10.56,2,'active'),(134,'Розетка','Описание розетки Вико','jpg',84.28,1,'active'),(135,'Розетка Тест','Тест','gif',89.75,2,'active'),(136,'Розетка','Описание розетки Вико','jpg',95.9,1,'active'),(137,'Розетка Тест','Тест','gif',10.27,2,'active'),(138,'Розетка','Описание розетки Вико','jpg',63.63,1,'active'),(139,'Розетка Тест','Тест','gif',87.36,2,'active'),(140,'Розетка','Описание розетки Вико','jpg',45.92,1,'active'),(141,'Розетка Тест','Тест','gif',67.5,2,'active'),(142,'Розетка','Описание розетки Вико','jpg',99.75,1,'active'),(143,'Розетка Тест','Тест','gif',96.23,2,'active'),(144,'Розетка','Описание розетки Вико','jpg',81.9,1,'active'),(145,'Розетка Тест','Тест','gif',20.81,2,'active'),(146,'Розетка','Описание розетки Вико','jpg',58.34,1,'active'),(147,'Розетка Тест','Тест','gif',29.28,2,'active'),(148,'Розетка','Описание розетки Вико','jpg',71.39,1,'active'),(149,'Розетка Тест','Тест','gif',69.09,2,'active'),(150,'Розетка','Описание розетки Вико','jpg',31.3,1,'active'),(151,'Розетка Тест','Тест','gif',49.22,2,'active'),(152,'Розетка','Описание розетки Вико','jpg',52.2,1,'active'),(153,'Розетка Тест','Тест','gif',13.34,2,'active'),(154,'Розетка','Описание розетки Вико','jpg',10.09,1,'active'),(155,'Розетка Тест','Тест','gif',10.42,2,'active'),(156,'Розетка','Описание розетки Вико','jpg',21.85,1,'active'),(157,'Розетка Тест','Тест','gif',77.99,2,'active'),(158,'Розетка','Описание розетки Вико','jpg',24.39,1,'active'),(159,'Розетка Тест','Тест','gif',87.96,2,'active'),(160,'Розетка','Описание розетки Вико','jpg',66.66,1,'active'),(161,'Розетка Тест','Тест','gif',69.41,2,'active'),(162,'Розетка','Описание розетки Вико','jpg',47.07,1,'active'),(163,'Розетка Тест','Тест','gif',27.13,2,'active'),(164,'Розетка','Описание розетки Вико','jpg',94.43,1,'active'),(165,'Розетка Тест','Тест','gif',90.77,2,'active'),(166,'Розетка','Описание розетки Вико','jpg',70.57,1,'active'),(167,'Розетка Тест','Тест','gif',80.54,2,'active'),(168,'Розетка','Описание розетки Вико','jpg',90.99,1,'active'),(169,'Розетка Тест','Тест','gif',13.33,2,'active'),(170,'Розетка','Описание розетки Вико','jpg',93.69,1,'active'),(171,'Розетка Тест','Тест','gif',28.46,2,'active'),(172,'Розетка','Описание розетки Вико','jpg',61.22,1,'active'),(173,'Розетка Тест','Тест','gif',20.72,2,'active'),(174,'Розетка','Описание розетки Вико','jpg',19.95,1,'active'),(175,'Розетка Тест','Тест','gif',37.58,2,'active'),(176,'Розетка','Описание розетки Вико','jpg',28.05,1,'active'),(177,'Розетка Тест','Тест','gif',27.5,2,'active'),(178,'Розетка','Описание розетки Вико','jpg',53.34,1,'active'),(179,'Розетка Тест','Тест','gif',84.21,2,'active'),(180,'Розетка','Описание розетки Вико','jpg',61.01,1,'active'),(181,'Розетка Тест','Тест','gif',52.45,2,'active'),(182,'Розетка','Описание розетки Вико','jpg',79.2,1,'active'),(183,'Розетка Тест','Тест','gif',38.65,2,'active'),(184,'Розетка','Описание розетки Вико','jpg',55.68,1,'active'),(185,'Розетка Тест','Тест','gif',62.41,2,'active'),(249,'Розетка','Описание розетки Вико','jpg',45.04,1,'active'),(250,'Розетка Тест','Тест','gif',37.97,2,'active'),(251,'Розетка','Описание розетки Вико','jpg',54.72,1,'active'),(252,'Розетка Тест','Тест','gif',59.71,2,'active'),(253,'Розетка','Описание розетки Вико','jpg',34.38,1,'active'),(254,'Розетка Тест','Тест','gif',92.77,2,'active'),(255,'Розетка','Описание розетки Вико','jpg',60.72,1,'active'),(256,'Розетка Тест','Тест','gif',25.28,2,'active'),(257,'Розетка','Описание розетки Вико','jpg',44.23,1,'active'),(258,'Розетка Тест','Тест','gif',45.31,2,'active'),(259,'Розетка','Описание розетки Вико','jpg',93.86,1,'active'),(260,'Розетка Тест','Тест','gif',33.38,2,'active'),(261,'Розетка','Описание розетки Вико','jpg',85.33,1,'active'),(262,'Розетка Тест','Тест','gif',26.48,2,'active'),(263,'Розетка','Описание розетки Вико','jpg',76.43,1,'active'),(264,'Розетка Тест','Тест','gif',2.72,2,'active'),(265,'Розетка','Описание розетки Вико','jpg',84.3,1,'active'),(266,'Розетка Тест','Тест','gif',13.35,2,'active'),(267,'Розетка','Описание розетки Вико','jpg',13.84,1,'active'),(268,'Розетка Тест','Тест','gif',29.16,2,'active'),(269,'Розетка','Описание розетки Вико','jpg',4.27,1,'active'),(270,'Розетка Тест','Тест','gif',33.87,2,'active'),(271,'Розетка','Описание розетки Вико','jpg',56.55,1,'active'),(272,'Розетка Тест','Тест','gif',81.16,2,'active'),(273,'Розетка','Описание розетки Вико','jpg',36.11,1,'active'),(274,'Розетка Тест','Тест','gif',37.1,2,'active'),(275,'Розетка','Описание розетки Вико','jpg',77.16,1,'active'),(276,'Розетка Тест','Тест','gif',74.48,2,'active'),(277,'Розетка','Описание розетки Вико','jpg',40.95,1,'active'),(278,'Розетка Тест','Тест','gif',81.3,2,'active'),(279,'Розетка','Описание розетки Вико','jpg',83.66,1,'active'),(280,'Розетка Тест','Тест','gif',74.39,2,'active'),(281,'Розетка','Описание розетки Вико','jpg',20.99,1,'active'),(282,'Розетка Тест','Тест','gif',81.78,2,'active'),(283,'Розетка','Описание розетки Вико','jpg',45.9,1,'active'),(284,'Розетка Тест','Тест','gif',84.19,2,'active'),(285,'Розетка','Описание розетки Вико','jpg',83.25,1,'active'),(286,'Розетка Тест','Тест','gif',63.69,2,'active'),(287,'Розетка','Описание розетки Вико','jpg',68.7,1,'active'),(288,'Розетка Тест','Тест','gif',52.4,2,'active'),(289,'Розетка','Описание розетки Вико','jpg',55.93,1,'active'),(290,'Розетка Тест','Тест','gif',22.43,2,'active'),(291,'Розетка','Описание розетки Вико','jpg',44.36,1,'active'),(292,'Розетка Тест','Тест','gif',54.51,2,'active'),(293,'Розетка','Описание розетки Вико','jpg',39.49,1,'active'),(294,'Розетка Тест','Тест','gif',33.9,2,'active'),(295,'Розетка','Описание розетки Вико','jpg',51.05,1,'active'),(296,'Розетка Тест','Тест','gif',53.52,2,'active'),(297,'Розетка','Описание розетки Вико','jpg',14.48,1,'active'),(298,'Розетка Тест','Тест','gif',11.84,2,'active'),(299,'Розетка','Описание розетки Вико','jpg',15.74,1,'active'),(300,'Розетка Тест','Тест','gif',43.2,2,'active'),(301,'Розетка','Описание розетки Вико','jpg',68.79,1,'active'),(302,'Розетка Тест','Тест','gif',14.32,2,'active'),(303,'Розетка','Описание розетки Вико','jpg',65.25,1,'active'),(304,'Розетка Тест','Тест','gif',83.29,2,'active'),(305,'Розетка','Описание розетки Вико','jpg',20.69,1,'active'),(306,'Розетка Тест','Тест','gif',53.58,2,'active'),(307,'Розетка','Описание розетки Вико','jpg',5.82,1,'active'),(308,'Розетка Тест','Тест','gif',68.38,2,'active'),(309,'Розетка','Описание розетки Вико','jpg',24.43,1,'active'),(310,'Розетка Тест','Тест','gif',17.01,2,'active'),(311,'Розетка','Описание розетки Вико','jpg',11.75,1,'active'),(312,'Розетка Тест','Тест','gif',7.75,2,'active'),(313,'Розетка','Описание розетки Вико','jpg',3.47,1,'active'),(314,'Розетка Тест','Тест','gif',94.13,2,'active'),(315,'Розетка','Описание розетки Вико','jpg',60.23,1,'active'),(316,'Розетка Тест','Тест','gif',18.75,2,'active'),(317,'Розетка','Описание розетки Вико','jpg',13.05,1,'active'),(318,'Розетка Тест','Тест','gif',9.03,2,'active'),(319,'Розетка','Описание розетки Вико','jpg',5.99,1,'active'),(320,'Розетка Тест','Тест','gif',2.84,2,'active'),(321,'Розетка','Описание розетки Вико','jpg',96.26,1,'active'),(322,'Розетка Тест','Тест','gif',72.77,2,'active'),(323,'Розетка','Описание розетки Вико','jpg',75.05,1,'active'),(324,'Розетка Тест','Тест','gif',56.96,2,'active'),(325,'Розетка','Описание розетки Вико','jpg',59.64,1,'active'),(326,'Розетка Тест','Тест','gif',27.3,2,'active'),(327,'Розетка','Описание розетки Вико','jpg',57.61,1,'active'),(328,'Розетка Тест','Тест','gif',6.12,2,'active'),(329,'Розетка','Описание розетки Вико','jpg',57.8,1,'active'),(330,'Розетка Тест','Тест','gif',70.63,2,'active'),(331,'Розетка','Описание розетки Вико','jpg',79.75,1,'active'),(332,'Розетка Тест','Тест','gif',86.84,2,'active'),(333,'Розетка','Описание розетки Вико','jpg',94.97,1,'active'),(334,'Розетка Тест','Тест','gif',14.32,2,'active'),(335,'Розетка','Описание розетки Вико','jpg',86.68,1,'active'),(336,'Розетка Тест','Тест','gif',90.45,2,'active'),(337,'Розетка','Описание розетки Вико','jpg',92.2,1,'active'),(338,'Розетка Тест','Тест','gif',89.66,2,'active'),(339,'Розетка','Описание розетки Вико','jpg',71.7,1,'active'),(340,'Розетка Тест','Тест','gif',89.54,2,'active'),(341,'Розетка','Описание розетки Вико','jpg',32.58,1,'active'),(342,'Розетка Тест','Тест','gif',94.29,2,'active'),(343,'Розетка','Описание розетки Вико','jpg',73.71,1,'active'),(344,'Розетка Тест','Тест','gif',85.67,2,'active'),(345,'Розетка','Описание розетки Вико','jpg',7.23,1,'active'),(346,'Розетка Тест','Тест','gif',79.12,2,'active'),(347,'Розетка','Описание розетки Вико','jpg',73.93,1,'active'),(348,'Розетка Тест','Тест','gif',32.26,2,'active'),(349,'Розетка','Описание розетки Вико','jpg',39.54,1,'active'),(350,'Розетка Тест','Тест','gif',0.91,2,'active'),(351,'Розетка','Описание розетки Вико','jpg',85.93,1,'active'),(352,'Розетка Тест','Тест','gif',26.94,2,'active'),(353,'Розетка','Описание розетки Вико','jpg',76.88,1,'active'),(354,'Розетка Тест','Тест','gif',3.59,2,'active'),(355,'Розетка','Описание розетки Вико','jpg',87.29,1,'active'),(356,'Розетка Тест','Тест','gif',25.7,2,'active'),(357,'Розетка','Описание розетки Вико','jpg',66.62,1,'active'),(358,'Розетка Тест','Тест','gif',56,2,'active'),(359,'Розетка','Описание розетки Вико','jpg',80.14,1,'active'),(360,'Розетка Тест','Тест','gif',32.71,2,'active'),(361,'Розетка','Описание розетки Вико','jpg',23.11,1,'active'),(362,'Розетка Тест','Тест','gif',17.43,2,'active'),(363,'Розетка','Описание розетки Вико','jpg',17.8,1,'active'),(364,'Розетка Тест','Тест','gif',36.72,2,'active'),(365,'Розетка','Описание розетки Вико','jpg',30.2,1,'active'),(366,'Розетка Тест','Тест','gif',40.83,2,'active'),(367,'Розетка','Описание розетки Вико','jpg',13.57,1,'active'),(368,'Розетка Тест','Тест','gif',45.37,2,'active'),(369,'Розетка','Описание розетки Вико','jpg',86.14,1,'active'),(370,'Розетка Тест','Тест','gif',94.57,2,'active'),(371,'Розетка','Описание розетки Вико','jpg',14.42,1,'active'),(372,'Розетка Тест','Тест','gif',88.42,2,'active'),(373,'Розетка','Описание розетки Вико','jpg',98.83,1,'active'),(374,'Розетка Тест','Тест','gif',28.88,2,'active'),(375,'Розетка','Описание розетки Вико','jpg',47.94,1,'active'),(376,'Розетка Тест','Тест','gif',53.03,2,'active');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`login`,`password`) values (1,'admin','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
