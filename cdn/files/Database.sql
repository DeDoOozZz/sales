/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 5.1.73 : Database - brighterycmsdemo
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*Table structure for table `blog_categories` */

DROP TABLE IF EXISTS `blog_categories`;

CREATE TABLE `blog_categories` (
  `blog_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` varchar(3) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `seo` varchar(100) DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  `image` text,
  `description` text,
  `sort` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`blog_category_id`),
  UNIQUE KEY `seo` (`seo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `blog_categories` */

insert  into `blog_categories`(`blog_category_id`,`language_id`,`title`,`seo`,`parent`,`image`,`description`,`sort`,`created`) values (1,'en','title222',NULL,0,NULL,'www',0,NULL),(2,'en','Cat2',NULL,1,NULL,'rrrrrr',0,NULL),(3,'en','Cat3',NULL,0,NULL,NULL,NULL,NULL),(4,'en','Cat4',NULL,0,NULL,NULL,NULL,NULL),(5,'en','Cat5',NULL,0,NULL,NULL,0,NULL),(6,'en','ddd',NULL,0,NULL,'',0,NULL),(7,'ar','ddd',NULL,0,NULL,'11\r\n',1,NULL);

/*Table structure for table `blog_keywords` */

DROP TABLE IF EXISTS `blog_keywords`;

CREATE TABLE `blog_keywords` (
  `blog_keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` varchar(3) DEFAULT NULL,
  `blog_post_id` int(11) DEFAULT NULL,
  `keyword_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`blog_keyword_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

/*Data for the table `blog_keywords` */

insert  into `blog_keywords`(`blog_keyword_id`,`language_id`,`blog_post_id`,`keyword_id`) values (1,NULL,2,1),(2,NULL,2,2),(3,NULL,2,3),(4,NULL,3,4),(5,NULL,3,5),(23,NULL,7,2),(24,NULL,7,17),(25,NULL,7,18),(26,NULL,7,10),(38,NULL,0,28),(39,NULL,0,29);

/*Table structure for table `blog_post_comments` */

DROP TABLE IF EXISTS `blog_post_comments`;

CREATE TABLE `blog_post_comments` (
  `blog_post_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_post_id` int(11) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `comment` text,
  `email` varchar(300) DEFAULT NULL,
  `website` text NOT NULL,
  PRIMARY KEY (`blog_post_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `blog_post_comments` */

/*Table structure for table `blog_post_tags` */

DROP TABLE IF EXISTS `blog_post_tags`;

CREATE TABLE `blog_post_tags` (
  `blog_tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_post_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`blog_tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

/*Data for the table `blog_post_tags` */

insert  into `blog_post_tags`(`blog_tag_id`,`blog_post_id`,`tag_id`) values (13,1,1),(14,1,2),(15,1,3),(16,1,6),(17,1,17),(18,2,14),(19,2,18),(20,3,19),(34,7,23),(35,7,26),(36,7,14),(47,0,35),(48,0,36),(49,0,37);

/*Table structure for table `blog_posts` */

DROP TABLE IF EXISTS `blog_posts`;

CREATE TABLE `blog_posts` (
  `blog_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `blog_category_id` int(11) DEFAULT NULL,
  `language_id` varchar(3) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `seo` varchar(200) DEFAULT NULL,
  `image` text,
  `short_content` text,
  `content` longtext,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`blog_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `blog_posts` */

insert  into `blog_posts`(`blog_post_id`,`user_id`,`blog_category_id`,`language_id`,`title`,`seo`,`image`,`short_content`,`content`,`created`) values (1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,'2014-06-03 17:23:45'),(3,1,2,NULL,NULL,NULL,NULL,NULL,NULL,'2014-06-02 16:22:07'),(4,1,4,NULL,NULL,NULL,NULL,NULL,NULL,'2014-06-19 22:10:48'),(5,1,3,NULL,NULL,NULL,NULL,NULL,NULL,'2014-06-23 21:25:47'),(6,1,3,NULL,NULL,NULL,NULL,NULL,NULL,'2014-06-24 01:50:22'),(7,1,3,NULL,NULL,NULL,NULL,NULL,NULL,'2014-06-24 23:08:42'),(8,1,1,NULL,NULL,NULL,NULL,NULL,NULL,'2014-06-25 00:47:36'),(9,1,3,NULL,NULL,NULL,NULL,NULL,NULL,'2014-06-25 22:46:22'),(10,1,3,NULL,NULL,NULL,NULL,NULL,NULL,'2014-07-15 13:34:25'),(11,1,3,NULL,NULL,NULL,NULL,NULL,NULL,'2014-07-26 14:05:47'),(12,1,1,NULL,NULL,NULL,NULL,NULL,NULL,'2014-08-23 08:05:36');

/*Table structure for table `brightery_invoices` */

DROP TABLE IF EXISTS `brightery_invoices`;

CREATE TABLE `brightery_invoices` (
  `brightery_invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `brightery_license_id` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` enum('due','paid','canceled') DEFAULT 'due',
  PRIMARY KEY (`brightery_invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `brightery_invoices` */

insert  into `brightery_invoices`(`brightery_invoice_id`,`brightery_license_id`,`due_date`,`status`) values (1,117,'2015-07-29','paid'),(2,117,'2015-07-28','canceled'),(3,117,'2015-07-08','canceled'),(4,119,'2013-08-20','due'),(5,117,'2015-08-28','canceled'),(6,117,'2015-08-29','due'),(7,119,'2015-08-20','due'),(10,117,'2015-08-29','due'),(9,227,'2015-08-29','due'),(11,117,'2015-08-29','due'),(12,117,'2015-08-29','due');

/*Table structure for table `brightery_licenses` */

DROP TABLE IF EXISTS `brightery_licenses`;

CREATE TABLE `brightery_licenses` (
  `brightery_license_id` int(10) NOT NULL AUTO_INCREMENT,
  `license_code` varchar(50) NOT NULL,
  `brightery_product_id` int(10) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `data` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` enum('fixed','subscription','FREE') DEFAULT NULL,
  `brightery_products_subscription_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`brightery_license_id`)
) ENGINE=InnoDB AUTO_INCREMENT=228 DEFAULT CHARSET=utf8;

/*Data for the table `brightery_licenses` */

insert  into `brightery_licenses`(`brightery_license_id`,`license_code`,`brightery_product_id`,`domain`,`data`,`user_id`,`payment_type`,`brightery_products_subscription_id`) values (117,'abc',84,'12','',2,'subscription',5),(118,'abc',83,'12','',2,'fixed',NULL),(119,'abc',83,'12','',2,'fixed',3),(120,'jjiji',83,'jji','',2,'fixed',NULL),(121,'jjiji',83,'jji','',2,'fixed',NULL),(122,'jjiji',83,'jji','',2,'fixed',NULL),(123,'ddwdw',83,'wdw','',2,'fixed',NULL),(124,'ddwdw',83,'wdw','',2,'fixed',NULL),(125,'ddwdw',83,'wdw','',2,'fixed',NULL),(126,'dada',83,'adad','',2,'fixed',NULL),(127,'dada',83,'adad','',2,'fixed',NULL),(128,'dada',83,'adad','',2,'fixed',NULL),(129,'dwdw',83,'wddw','',2,'fixed',NULL),(130,'dwdw',83,'wddw','',2,'fixed',NULL),(131,'dwdw',83,'wddw','',2,'fixed',NULL),(132,'dwdw',83,'wddw','',2,'fixed',NULL),(133,'dwdw',83,'wddw','',2,'fixed',NULL),(134,'dwdw',83,'wddw','',2,'fixed',NULL),(135,'dwdw',83,'wddw','',2,'fixed',NULL),(136,'wdwd',83,'wdwd','',2,'fixed',NULL),(137,'wdwd',83,'wdwd','',2,'fixed',NULL),(138,'wdwd',83,'wdwd','',2,'fixed',NULL),(139,'wdwd',83,'wdwd','',2,'fixed',NULL),(140,'wdwd',83,'wdwd','',2,'fixed',NULL),(141,'wdwd',83,'wdwd','',2,'fixed',NULL),(142,'wdwd',83,'wdwd','',2,'fixed',NULL),(143,'wdwd',83,'wdwd','',2,'fixed',NULL),(144,'wdwd',83,'wdwd','',2,'fixed',NULL),(145,'wdwd',83,'wdwd','',2,'fixed',NULL),(146,'wdwd',83,'wdwd','',2,'fixed',NULL),(147,'wdwd',83,'wdwd','',2,'fixed',NULL),(148,'wdwd',83,'wdwd','',2,'fixed',NULL),(149,'wdwd',83,'wdwd','',2,'fixed',NULL),(150,'wdwd',83,'wdwd','',2,'fixed',NULL),(151,'wdwd',83,'wdwd','',2,'fixed',NULL),(152,'wdwd',83,'wdwd','',2,'fixed',NULL),(153,'wdwd',83,'wdwd','',2,'fixed',NULL),(154,'wdwd',83,'wdwd','',2,'fixed',NULL),(155,'wdwd',83,'wdwd','',2,'fixed',NULL),(156,'wdwd',83,'wdwd','',2,'fixed',NULL),(157,'wdwd',83,'wdwd','',2,'fixed',NULL),(158,'wdwd',83,'wdwd','',2,'fixed',NULL),(159,'wdwd',83,'wdwd','',2,'fixed',NULL),(160,'wdwd',83,'wdwd','',2,'fixed',NULL),(161,'wdwd',83,'wdwd','',2,'fixed',NULL),(162,'wdwd',83,'wdwd','',2,'fixed',NULL),(163,'wdwd',83,'wdwd','',2,'fixed',NULL),(164,'wdwd',83,'wdwd','',2,'fixed',NULL),(165,'wdwd',83,'wdwd','',2,'fixed',NULL),(166,'wdwd',83,'wdwd','',2,'fixed',NULL),(167,'wdwd',83,'wdwd','',2,'fixed',NULL),(168,'wdwd',83,'wdwd','',2,'fixed',NULL),(169,'wdwd',83,'wdwd','',2,'fixed',NULL),(170,'wdwd',83,'wdwd','',2,'fixed',NULL),(171,'wdwd',83,'wdwd','',2,'fixed',NULL),(172,'wdwd',83,'wdwd','',2,'fixed',NULL),(173,'wdwd',83,'wdwd','',2,'fixed',NULL),(174,'wdwd',83,'wdwd','',2,'fixed',NULL),(175,'wdwd',83,'wdwd','',2,'fixed',NULL),(176,'wdwd',83,'wdwd','',2,'fixed',NULL),(177,'wdwd',83,'wdwd','',2,'fixed',NULL),(178,'wdwd',83,'wdwd','',2,'fixed',NULL),(179,'wdwd',83,'wdwd','',2,'fixed',NULL),(180,'wdwd',83,'wdwd','',2,'fixed',NULL),(181,'wdwd',83,'wdwd','',2,'fixed',NULL),(182,'wdwd',83,'wdwd','',2,'fixed',NULL),(183,'wdwd',83,'wdwd','',2,'fixed',NULL),(184,'wdwd',83,'wdwd','',2,'fixed',NULL),(185,'wdwd',83,'wdwd','',2,'fixed',NULL),(186,'wdwd',83,'wdwd','',2,'fixed',NULL),(187,'wdwd',83,'wdwd','',2,'fixed',NULL),(188,'wdwd',83,'wdwd','',2,'fixed',NULL),(189,'wdwd',83,'wdwd','',2,'fixed',NULL),(190,'wdwd',83,'wdwd','',2,'fixed',NULL),(191,'wdwd',83,'wdwd','',2,'fixed',NULL),(192,'wdwd',83,'wdwd','',2,'fixed',NULL),(193,'wdwd',83,'wdwd','',2,'fixed',NULL),(194,'sfs',83,'fssf','',2,'fixed',NULL),(195,'sfs',83,'fssf','',2,'fixed',NULL),(196,'sfs',83,'fssf','',2,'fixed',NULL),(197,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(198,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(199,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(200,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(201,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(202,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(203,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(204,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(205,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(206,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(207,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(208,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(209,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(210,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(211,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(212,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(213,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(214,'xrxr',83,'qsqsqs','',2,'fixed',NULL),(215,'yyyyyyyy',83,'yyyyyyy','',2,'fixed',NULL),(216,'yousef',83,'1235666','',2,'fixed',NULL),(217,'farah',83,'123456','',2,'fixed',NULL),(218,'farah',83,'123456','',2,'fixed',NULL),(219,'bbbbbbbbbbb',83,'bbbbbbbbbbbb','',2,'fixed',NULL),(220,'',0,'','',NULL,NULL,NULL),(221,'wsws',90,'121','',2,'subscription',NULL),(222,'يص',84,'صيصي','',2,'subscription',NULL),(223,'gg7g7',84,'1848','',2,'subscription',NULL),(224,'tf6f',84,'474','',2,'subscription',NULL),(225,'tf6f',84,'474','',2,'subscription',NULL),(226,'wsws',84,'wsws','',2,'subscription',NULL),(227,'yfyfy',84,'gygy','',2,'subscription',NULL);

/*Table structure for table `brightery_products` */

DROP TABLE IF EXISTS `brightery_products`;

CREATE TABLE `brightery_products` (
  `brightery_product_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `fixed_price_status` tinyint(4) DEFAULT NULL,
  `fixed_price` double DEFAULT NULL,
  `subscription_price_status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`brightery_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

/*Data for the table `brightery_products` */

insert  into `brightery_products`(`brightery_product_id`,`title`,`fixed_price_status`,`fixed_price`,`subscription_price_status`) values (83,'m',1,2,1),(84,'chipsy',0,0,1),(85,'mo',1,19,0),(86,'mo',1,19,0),(87,'molto',1,19,0),(88,'molto',1,19,0),(89,'molto',1,19,0),(90,'jolt',1,19,0),(91,'cranchy',1,100,0),(92,'mo',1,19,0),(93,'mnmnmnmnmnm',1,19,0),(94,'yousef',0,0,1),(95,'543',1,111,1),(96,'5555',0,0,1),(97,'mk ',0,0,1);

/*Table structure for table `brightery_products_subscriptions` */

DROP TABLE IF EXISTS `brightery_products_subscriptions`;

CREATE TABLE `brightery_products_subscriptions` (
  `brightery_products_subscription_id` int(11) NOT NULL AUTO_INCREMENT,
  `brightery_product_id` int(11) NOT NULL,
  `period_cycle` varchar(10) NOT NULL,
  `period` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`brightery_products_subscription_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

/*Data for the table `brightery_products_subscriptions` */

insert  into `brightery_products_subscriptions`(`brightery_products_subscription_id`,`brightery_product_id`,`period_cycle`,`period`,`price`) values (3,0,'Year',2,1),(5,84,'Month',1,50),(71,84,'Day',2,2525),(72,95,'Day',1,0),(73,95,'Day',3,0),(74,95,'Day',7,0),(75,96,'Day',4,5),(76,96,'Day',2,0),(77,96,'Day',5,0),(78,97,'Day',5,0),(79,97,'Day',5,0);

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `clients` */

insert  into `clients`(`client_id`,`name`,`image`) values (3,'jdsj','483792_489207341128752_1998018065_n1.jpg');

/*Table structure for table `clinic_branches` */

DROP TABLE IF EXISTS `clinic_branches`;

CREATE TABLE `clinic_branches` (
  `clinic_branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_branch` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`clinic_branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `clinic_branches` */

insert  into `clinic_branches`(`clinic_branch_id`,`clinic_branch`,`phone`,`address`,`longitude`,`latitude`,`description`) values (12,'Vectoria','01159500591','elgalaa','123654','98745','yyyyyyyyyyyyyyy'),(13,'Elmabara','0123659857458','elasafraa','32659857','89658968','tttttttttttttttt'),(16,'Elsalama','01159500591','sidi bishr','78965413','01236598745','ttttttttttttttt'),(18,'elsa3\'r','788888888','elgalaa','77777777777','8888888888888','tyyyyy');

/*Table structure for table `clinic_disease_templates` */

DROP TABLE IF EXISTS `clinic_disease_templates`;

CREATE TABLE `clinic_disease_templates` (
  `clinic_disease_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `language_id` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`clinic_disease_template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `clinic_disease_templates` */

insert  into `clinic_disease_templates`(`clinic_disease_template_id`,`title`,`content`,`language_id`) values (5,'eyes','ssss','en'),(6,'cancer','uyuyu','en');

/*Table structure for table `clinic_doctor_reservation_types` */

DROP TABLE IF EXISTS `clinic_doctor_reservation_types`;

CREATE TABLE `clinic_doctor_reservation_types` (
  `clinic_doctor_reservation_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `clinic_doctor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`clinic_doctor_reservation_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `clinic_doctor_reservation_types` */

insert  into `clinic_doctor_reservation_types`(`clinic_doctor_reservation_type_id`,`title`,`price`,`clinic_doctor_id`) values (1,'ramad',75,1),(2,'nazar',900,2),(3,'cancer',75,1),(4,'Marwa',1000,2);

/*Table structure for table `clinic_doctor_reviews` */

DROP TABLE IF EXISTS `clinic_doctor_reviews`;

CREATE TABLE `clinic_doctor_reviews` (
  `clinic_doctor_review_id` int(11) NOT NULL AUTO_INCREMENT,
  `review` tinyint(4) DEFAULT NULL,
  `clinic_patient_id` int(11) DEFAULT NULL,
  `clinic_doctor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`clinic_doctor_review_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `clinic_doctor_reviews` */

insert  into `clinic_doctor_reviews`(`clinic_doctor_review_id`,`review`,`clinic_patient_id`,`clinic_doctor_id`) values (3,4,18,20),(2,6,18,24);

/*Table structure for table `clinic_doctors` */

DROP TABLE IF EXISTS `clinic_doctors`;

CREATE TABLE `clinic_doctors` (
  `clinic_doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_specification_id` int(11) NOT NULL,
  `description` text,
  `user_id` int(11) DEFAULT NULL,
  `period_average` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`clinic_doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `clinic_doctors` */

insert  into `clinic_doctors`(`clinic_doctor_id`,`clinic_specification_id`,`description`,`user_id`,`period_average`) values (1,32,'Hossam',1,'30');

/*Table structure for table `clinic_patient_diseases` */

DROP TABLE IF EXISTS `clinic_patient_diseases`;

CREATE TABLE `clinic_patient_diseases` (
  `clinic_patient_disease_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `clinic_disease_template_id` int(11) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`clinic_patient_disease_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

/*Data for the table `clinic_patient_diseases` */

insert  into `clinic_patient_diseases`(`clinic_patient_disease_id`,`user_id`,`clinic_disease_template_id`,`note`) values (24,NULL,5,'Muhammad'),(25,NULL,6,'bnbn'),(26,NULL,6,'edw'),(27,NULL,6,'gf'),(28,NULL,5,'muhammad'),(29,NULL,5,'kokl;k;l'),(30,NULL,5,'kokl;k;l'),(31,NULL,5,'kokl;k;l'),(32,NULL,5,'kokl;k;l'),(33,NULL,6,'iuiuiu'),(34,NULL,5,'frfrrfr'),(38,2,5,'ثث'),(39,2,5,'kl'),(40,2,5,'نممنمنم'),(41,2,6,'نممنمنم');

/*Table structure for table `clinic_patients` */

DROP TABLE IF EXISTS `clinic_patients`;

CREATE TABLE `clinic_patients` (
  `clinic_patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `birthdate` date DEFAULT NULL,
  `note` text,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`clinic_patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `clinic_patients` */

insert  into `clinic_patients`(`clinic_patient_id`,`birthdate`,`note`,`user_id`) values (18,'2015-07-16','ttttttttttttttttt',1);

/*Table structure for table `clinic_patients_notes` */

DROP TABLE IF EXISTS `clinic_patients_notes`;

CREATE TABLE `clinic_patients_notes` (
  `clinic_patient_note_id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_doctor_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`clinic_patient_note_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `clinic_patients_notes` */

insert  into `clinic_patients_notes`(`clinic_patient_note_id`,`clinic_doctor_id`,`user_id`,`note`) values (35,NULL,2,'nottttesyu'),(36,NULL,2,'muhammad');

/*Table structure for table `clinic_recommended_centers` */

DROP TABLE IF EXISTS `clinic_recommended_centers`;

CREATE TABLE `clinic_recommended_centers` (
  `clinic_recommended_center_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` tinytext,
  `type` varchar(255) DEFAULT NULL,
  `clinic_doctor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`clinic_recommended_center_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `clinic_recommended_centers` */

/*Table structure for table `clinic_reservations` */

DROP TABLE IF EXISTS `clinic_reservations`;

CREATE TABLE `clinic_reservations` (
  `clinic_reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_schedule_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `clinic_doctor_reservation_type_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `clinic_reservation_status` enum('pending','canceled','confirmed') DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `status` enum('late','attend','entered','canceled','') DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  PRIMARY KEY (`clinic_reservation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

/*Data for the table `clinic_reservations` */

insert  into `clinic_reservations`(`clinic_reservation_id`,`clinic_schedule_id`,`date`,`time`,`clinic_doctor_reservation_type_id`,`user_id`,`clinic_reservation_status`,`created`,`status`,`order`,`number`) values (2,4,'2015-08-27','11:00:00',2,1,'confirmed','2015-08-22 14:08:00','late',0,1),(3,2,'2015-08-23','16:00:00',1,1,'confirmed','2015-08-22 14:08:23','',0,NULL),(7,1,'2015-08-29','17:00:00',1,25,'confirmed','2015-08-24 12:13:13','',0,2),(9,4,'2015-08-27','17:00:00',3,1,'confirmed','2015-08-24 16:56:41','',0,3),(11,1,'2015-08-29','19:30:00',1,29,'confirmed','2015-08-24 17:04:23','',0,5),(12,1,'2015-08-29','14:30:00',28,2,'confirmed','2015-08-24 17:05:28','',0,1),(14,4,'2015-08-27','22:00:00',1,18,'confirmed','2015-08-24 17:19:31','',0,6),(15,4,'2015-08-27','21:00:00',1,29,'confirmed','2015-08-24 17:25:37','',0,5),(17,4,'2015-08-27','18:00:00',3,28,'confirmed','2015-08-24 17:27:06','',0,4),(22,4,'2015-08-27','14:30:00',1,25,'confirmed','2015-08-25 13:08:02','',0,2),(53,3,'2015-09-01','20:00:00',3,1,'confirmed','2015-08-29 16:42:33','',NULL,NULL),(54,3,'2015-09-01','21:30:00',3,1,'confirmed','2015-08-29 16:46:56','',NULL,NULL),(55,1,'2015-08-29','20:00:00',3,18,'confirmed','2015-08-29 17:56:03','',NULL,6),(56,1,'2015-08-29','18:30:00',1,1,'confirmed','2015-08-29 17:57:38','',NULL,3),(57,1,'2015-08-29','19:00:00',1,2,'confirmed','2015-08-29 18:28:51','',NULL,4),(66,2,'2015-08-30','14:00:00',1,18,'confirmed','2015-08-30 13:48:36','late',NULL,1),(67,2,'2015-08-30','18:00:00',3,1,'confirmed','2015-08-30 13:48:45','attend',NULL,4),(68,2,'2015-08-30','20:00:00',3,2,'confirmed','2015-08-30 13:49:59','',NULL,7),(69,2,'2015-08-30','16:00:00',3,25,'confirmed','2015-08-30 13:53:22','entered',NULL,2),(70,2,'2015-08-30','17:00:00',3,28,'confirmed','2015-08-30 13:57:05','attend',NULL,3),(71,2,'2015-08-30','18:30:00',3,1,'confirmed','2015-08-30 18:06:50','late',NULL,5),(72,2,'2015-08-30','19:30:00',1,1,'confirmed','2015-08-30 18:12:03','',NULL,6);

/*Table structure for table `clinic_schedule_exceptions` */

DROP TABLE IF EXISTS `clinic_schedule_exceptions`;

CREATE TABLE `clinic_schedule_exceptions` (
  `clinic_schedule_exception_id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_schedule_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  PRIMARY KEY (`clinic_schedule_exception_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `clinic_schedule_exceptions` */

insert  into `clinic_schedule_exceptions`(`clinic_schedule_exception_id`,`clinic_schedule_id`,`date`,`from_time`,`to_time`) values (1,3,'2015-08-25','13:00:00','14:00:00');

/*Table structure for table `clinic_schedules` */

DROP TABLE IF EXISTS `clinic_schedules`;

CREATE TABLE `clinic_schedules` (
  `clinic_schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_doctor_id` int(11) DEFAULT NULL,
  `day` enum('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday') DEFAULT NULL,
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  PRIMARY KEY (`clinic_schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `clinic_schedules` */

insert  into `clinic_schedules`(`clinic_schedule_id`,`clinic_doctor_id`,`day`,`from_time`,`to_time`) values (16,1,'Sunday','03:00:00','01:00:00'),(24,1,'Saturday','03:00:00','19:00:00'),(25,NULL,NULL,'02:00:00','07:00:00'),(26,1,'Tuesday','04:00:00','00:00:09');

/*Table structure for table `clinic_specifications` */

DROP TABLE IF EXISTS `clinic_specifications`;

CREATE TABLE `clinic_specifications` (
  `clinic_specification_id` int(11) NOT NULL AUTO_INCREMENT,
  `specification` varchar(255) NOT NULL,
  `clinic_branch_id` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`clinic_specification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `clinic_specifications` */

insert  into `clinic_specifications`(`clinic_specification_id`,`specification`,`clinic_branch_id`,`description`) values (28,'eyes',12,''),(29,'heart',16,''),(30,'head',16,''),(32,'ramad',18,'');

/*Table structure for table `clinic_xray_negative` */

DROP TABLE IF EXISTS `clinic_xray_negative`;

CREATE TABLE `clinic_xray_negative` (
  `clinic_xray_negative_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `user_id` int(11) DEFAULT NULL,
  `image` text,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`clinic_xray_negative_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `clinic_xray_negative` */

insert  into `clinic_xray_negative`(`clinic_xray_negative_id`,`title`,`description`,`user_id`,`image`,`created`) values (12,'muhammad','rdegtr',2,'tytg',NULL),(15,'mmmmmm','mmmmmmmmmm????????????m',2,'',NULL);

/*Table structure for table `commerce_cart` */

DROP TABLE IF EXISTS `commerce_cart`;

CREATE TABLE `commerce_cart` (
  `commerce_cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `commerce_product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `options` text,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`commerce_cart_id`),
  KEY `product_id` (`commerce_product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commerce_cart` */

/*Table structure for table `commerce_categories` */

DROP TABLE IF EXISTS `commerce_categories`;

CREATE TABLE `commerce_categories` (
  `commerce_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `seo` varchar(255) DEFAULT NULL,
  `language_id` varchar(5) DEFAULT NULL,
  `image` text,
  PRIMARY KEY (`commerce_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commerce_categories` */

/*Table structure for table `commerce_category_attributes` */

DROP TABLE IF EXISTS `commerce_category_attributes`;

CREATE TABLE `commerce_category_attributes` (
  `commerce_category_attribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `commerce_category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`commerce_category_attribute_id`),
  KEY `category_id` (`commerce_category_id`),
  CONSTRAINT `commerce_category_attributes_ibfk_1` FOREIGN KEY (`commerce_category_id`) REFERENCES `commerce_categories` (`commerce_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commerce_category_attributes` */

/*Table structure for table `commerce_invoices` */

DROP TABLE IF EXISTS `commerce_invoices`;

CREATE TABLE `commerce_invoices` (
  `commerce_invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `commerce_order_id` int(11) DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`commerce_invoice_id`),
  KEY `order_id` (`commerce_order_id`),
  KEY `order_id_2` (`commerce_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commerce_invoices` */

/*Table structure for table `commerce_order_details` */

DROP TABLE IF EXISTS `commerce_order_details`;

CREATE TABLE `commerce_order_details` (
  `commerce_order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `option` text,
  `qty` int(11) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `commerce_product_id` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `product_total` double DEFAULT NULL,
  PRIMARY KEY (`commerce_order_detail_id`),
  KEY `product_id` (`commerce_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commerce_order_details` */

/*Table structure for table `commerce_orders` */

DROP TABLE IF EXISTS `commerce_orders`;

CREATE TABLE `commerce_orders` (
  `commerce_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `subtotal` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `commerce_payment_method_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `billing_address` text,
  `shipping_address` text,
  PRIMARY KEY (`commerce_order_id`),
  KEY `user_id` (`user_id`),
  KEY `payment_method_id` (`commerce_payment_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commerce_orders` */

/*Table structure for table `commerce_payment_method` */

DROP TABLE IF EXISTS `commerce_payment_method`;

CREATE TABLE `commerce_payment_method` (
  `commerce_payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `fees` double DEFAULT NULL,
  PRIMARY KEY (`commerce_payment_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commerce_payment_method` */

/*Table structure for table `commerce_product_attributes` */

DROP TABLE IF EXISTS `commerce_product_attributes`;

CREATE TABLE `commerce_product_attributes` (
  `commerce_product_attribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `commerce_category_attribute_id` int(11) DEFAULT NULL,
  `value` text,
  `commerce_product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`commerce_product_attribute_id`),
  KEY `category_attribute_id` (`commerce_category_attribute_id`),
  KEY `product_id` (`commerce_product_id`),
  KEY `product_id_2` (`commerce_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commerce_product_attributes` */

/*Table structure for table `commerce_product_detail_options` */

DROP TABLE IF EXISTS `commerce_product_detail_options`;

CREATE TABLE `commerce_product_detail_options` (
  `commerce_product_detail_option_id` int(11) NOT NULL AUTO_INCREMENT,
  `commerce_product_detail_id` int(11) DEFAULT NULL,
  `name` text,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`commerce_product_detail_option_id`),
  KEY `product_detail_id` (`commerce_product_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commerce_product_detail_options` */

/*Table structure for table `commerce_product_details` */

DROP TABLE IF EXISTS `commerce_product_details`;

CREATE TABLE `commerce_product_details` (
  `commerce_product_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `commerce_product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`commerce_product_detail_id`),
  KEY `product_id` (`commerce_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commerce_product_details` */

/*Table structure for table `commerce_product_images` */

DROP TABLE IF EXISTS `commerce_product_images`;

CREATE TABLE `commerce_product_images` (
  `commerce_product_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `primary` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`commerce_product_image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commerce_product_images` */

/*Table structure for table `commerce_products` */

DROP TABLE IF EXISTS `commerce_products`;

CREATE TABLE `commerce_products` (
  `commerce_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `commerce_category_id` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `type` enum('normal','digital','weighted') DEFAULT NULL,
  PRIMARY KEY (`commerce_product_id`),
  KEY `category_id` (`commerce_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commerce_products` */

/*Table structure for table `commerce_shares` */

DROP TABLE IF EXISTS `commerce_shares`;

CREATE TABLE `commerce_shares` (
  `commerce_shares_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_title` varchar(255) DEFAULT NULL,
  `from_description` text,
  `image` text,
  `location` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `to_title` varchar(255) DEFAULT NULL,
  `to_description` text,
  `to_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`commerce_shares_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `commerce_shares` */

/*Table structure for table `commerce_wishlist` */

DROP TABLE IF EXISTS `commerce_wishlist`;

CREATE TABLE `commerce_wishlist` (
  `commerce_wishlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `commerce_product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`commerce_wishlist_id`),
  KEY `product_id` (`commerce_product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commerce_wishlist` */

/*Table structure for table `contactus` */

DROP TABLE IF EXISTS `contactus`;

CREATE TABLE `contactus` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `contactus` */

/*Table structure for table `coupons_business` */

DROP TABLE IF EXISTS `coupons_business`;

CREATE TABLE `coupons_business` (
  `coupons_business_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupons_business_type_id` int(11) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `logo` text,
  `email` varchar(350) DEFAULT NULL,
  `website` text,
  PRIMARY KEY (`coupons_business_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `coupons_business` */

/*Table structure for table `coupons_business_branches` */

DROP TABLE IF EXISTS `coupons_business_branches`;

CREATE TABLE `coupons_business_branches` (
  `coupons_business_branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) DEFAULT NULL,
  `coupons_country_id` int(11) DEFAULT NULL,
  `coupons_city_id` int(11) DEFAULT NULL,
  `address` text,
  `phone` varchar(100) DEFAULT NULL,
  `fax` varbinary(100) DEFAULT NULL,
  PRIMARY KEY (`coupons_business_branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `coupons_business_branches` */

/*Table structure for table `coupons_business_branches_availability` */

DROP TABLE IF EXISTS `coupons_business_branches_availability`;

CREATE TABLE `coupons_business_branches_availability` (
  `coupons_business_branches_availability_id` int(11) NOT NULL AUTO_INCREMENT,
  `day` enum('Sat','Sun','Mon','Tue','Wed','Thu','Fri') DEFAULT NULL,
  `from` time DEFAULT NULL,
  `to` time DEFAULT NULL,
  `coupons_business_branch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`coupons_business_branches_availability_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `coupons_business_branches_availability` */

/*Table structure for table `coupons_business_types` */

DROP TABLE IF EXISTS `coupons_business_types`;

CREATE TABLE `coupons_business_types` (
  `coupons_business_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) DEFAULT NULL,
  `description` text,
  `image` text,
  PRIMARY KEY (`coupons_business_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `coupons_business_types` */

/*Table structure for table `coupons_cities` */

DROP TABLE IF EXISTS `coupons_cities`;

CREATE TABLE `coupons_cities` (
  `coupons_city_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) DEFAULT NULL,
  `coupons_country_id` int(11) DEFAULT NULL,
  `long` varchar(100) DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`coupons_city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `coupons_cities` */

/*Table structure for table `coupons_countries` */

DROP TABLE IF EXISTS `coupons_countries`;

CREATE TABLE `coupons_countries` (
  `coupons_country_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`coupons_country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `coupons_countries` */

/*Table structure for table `coupons_offer_locations` */

DROP TABLE IF EXISTS `coupons_offer_locations`;

CREATE TABLE `coupons_offer_locations` (
  `coupons_offer_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupons_business_branch_id` int(11) DEFAULT NULL,
  `coupons_offer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`coupons_offer_location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `coupons_offer_locations` */

/*Table structure for table `coupons_offers` */

DROP TABLE IF EXISTS `coupons_offers`;

CREATE TABLE `coupons_offers` (
  `coupons_offer_id` int(11) NOT NULL AUTO_INCREMENT,
  `business_title` varchar(255) DEFAULT NULL,
  `clients_title` varchar(255) DEFAULT NULL,
  `description` text,
  `image` text,
  `type` enum('amount','percentage') DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `percentage` double DEFAULT NULL,
  `location` enum('store','online') DEFAULT NULL,
  `website` text,
  `starts` date DEFAULT NULL,
  `ends` date DEFAULT NULL,
  `expire` date DEFAULT NULL,
  `publish` date DEFAULT NULL,
  `Redemption_method` enum('qr','coupon','others') DEFAULT NULL,
  `qr` text,
  `coupon` text,
  `others` text,
  `terms` text,
  PRIMARY KEY (`coupons_offer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `coupons_offers` */

/*Table structure for table `downloads` */

DROP TABLE IF EXISTS `downloads`;

CREATE TABLE `downloads` (
  `download_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` varchar(3) DEFAULT NULL,
  `url` text,
  `image` text,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`download_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `downloads` */

insert  into `downloads`(`download_id`,`language_id`,`url`,`image`,`created`) values (6,'en','LinkdIn.com','desert.jpg','2015-07-14 17:44:05');

/*Table structure for table `email_templates` */

DROP TABLE IF EXISTS `email_templates`;

CREATE TABLE `email_templates` (
  `email_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_type` enum('html','plain') DEFAULT 'plain',
  `language_id` varchar(3) DEFAULT NULL,
  `subject` varchar(300) DEFAULT NULL,
  `content` longtext,
  `attachments` text,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`email_template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `email_templates` */

/*Table structure for table `enquiries` */

DROP TABLE IF EXISTS `enquiries`;

CREATE TABLE `enquiries` (
  `enquiry_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` varchar(3) DEFAULT NULL,
  `seo` varchar(300) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `answer` text,
  `email` varchar(500) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `question` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `answered` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= Pending, 1= Replied And Published, 3= Ignored',
  PRIMARY KEY (`enquiry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `enquiries` */

/*Table structure for table `faqs` */

DROP TABLE IF EXISTS `faqs`;

CREATE TABLE `faqs` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` varchar(3) DEFAULT NULL,
  `question` text,
  `answer` longtext,
  `created` datetime DEFAULT NULL,
  `answered` datetime DEFAULT NULL,
  `visibility_status_id` tinyint(1) NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `faqs` */

insert  into `faqs`(`faq_id`,`language_id`,`question`,`answer`,`created`,`answered`,`visibility_status_id`) values (1,NULL,'               1    ','      1             ',NULL,NULL,1),(2,'en','Wie Alt Bist Du ?','11',NULL,NULL,1),(3,'en','How Are You ?','Fine','2015-07-09 14:24:46',NULL,1);

/*Table structure for table `keywords` */

DROP TABLE IF EXISTS `keywords`;

CREATE TABLE `keywords` (
  `keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  PRIMARY KEY (`keyword_id`),
  KEY `keyword_id` (`keyword_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

/*Data for the table `keywords` */

insert  into `keywords`(`keyword_id`,`name`,`parent`) values (1,'sshpass',0),(2,'Ubuntu',0),(3,'Debian',0),(4,'Photography',0),(5,'10 Stupid Things',0),(6,'css3',0),(7,'media queries',0),(8,'Ubuntu Server',0),(9,'LAMP',0),(10,'Apache',0),(11,'PHP',0),(12,'MySQL',0),(13,'how to install lamp',0),(14,'how to install apache php mysql',0),(15,'Update Firefox',0),(16,'Update',0),(17,'Virtual host',0),(18,'Configuration',0),(19,'Linux',0),(20,'Unix',0),(21,'difference between linux and unix',0),(22,'Infinite loops',0),(23,'Virtual table',0),(24,'Query',0),(25,'Arduino Uno',0),(26,'Launchpad',0),(27,'TM4C123G',0),(28,'Pertol',0),(29,'FUEL',0);

/*Table structure for table `languages` */

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `language_id` varchar(3) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL,
  `path` varchar(20) DEFAULT NULL,
  `default` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `languages` */

insert  into `languages`(`language_id`,`name`,`code`,`path`,`default`) values ('1','English','en','english',1),('2','عربي','ar','arabic',0);

/*Table structure for table `link_types` */

DROP TABLE IF EXISTS `link_types`;

CREATE TABLE `link_types` (
  `link_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`link_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `link_types` */

insert  into `link_types`(`link_type_id`,`name`) values (1,'Header'),(2,'Footer');

/*Table structure for table `links` */

DROP TABLE IF EXISTS `links`;

CREATE TABLE `links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_type_id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `url` text,
  `var` text,
  `visibility_status_id` int(11) NOT NULL DEFAULT '0' COMMENT '0=invisible, 1=visible',
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `links` */

insert  into `links`(`link_id`,`link_type_id`,`name`,`url`,`var`,`visibility_status_id`,`sort`) values (1,1,'Home','{url}','home',1,NULL),(2,1,'Portfolio','{url}portfolio','portfolio',1,NULL),(3,1,'Resume','{url}resume','resume',1,NULL),(5,1,'FAQ','{url}faq','faq',1,NULL),(6,1,'Contact','{url}contact','contact',1,NULL),(11,1,'About','https://bitbucket.org/melsaeed/brighterycms/commits/f2a13cf25605d307d545cc11909f8eec7d937501','About',2,1);

/*Table structure for table `logs` */

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `module` varchar(150) DEFAULT NULL,
  `action` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `logs` */

/*Table structure for table `marital_status` */

DROP TABLE IF EXISTS `marital_status`;

CREATE TABLE `marital_status` (
  `marital_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` varchar(3) DEFAULT NULL,
  `name` varbinary(300) DEFAULT NULL,
  PRIMARY KEY (`marital_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `marital_status` */

insert  into `marital_status`(`marital_status_id`,`language_id`,`name`) values (1,NULL,'Single'),(2,NULL,'Married');

/*Table structure for table `module_settings` */

DROP TABLE IF EXISTS `module_settings`;

CREATE TABLE `module_settings` (
  `module_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `key` varchar(50) DEFAULT NULL,
  `value` text,
  `default_value` text,
  PRIMARY KEY (`module_setting_id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `module_settings` */

insert  into `module_settings`(`module_setting_id`,`module_id`,`key`,`value`,`default_value`) values (1,1,'title','title',NULL),(2,5,'patient_usergroup_id','1',NULL),(3,5,'doctor_usergroup_id','2',NULL),(15,5,NULL,'1',NULL),(14,5,NULL,'3',NULL),(16,5,NULL,'3',NULL),(17,5,NULL,'1',NULL);

/*Table structure for table `modules` */

DROP TABLE IF EXISTS `modules`;

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `raw_name` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `modules` */

insert  into `modules`(`module_id`,`name`,`raw_name`,`status`) values (1,'Home','home',1),(2,'Management Account','management/account',1),(3,'Pages','About',1),(4,'Contact','Contact',1),(5,'Clinic','clinic',1);

/*Table structure for table `nationalities` */

DROP TABLE IF EXISTS `nationalities`;

CREATE TABLE `nationalities` (
  `nationality_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` varchar(3) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`nationality_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `nationalities` */

insert  into `nationalities`(`nationality_id`,`language_id`,`name`) values (1,'en','Egyption'),(2,'en','Germany'),(3,'en','England'),(4,'en','Lebanon');

/*Table structure for table `notifications` */

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `content` text,
  `link` text,
  `created` datetime DEFAULT NULL,
  `status` enum('unread','read') DEFAULT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `notifications` */

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` varchar(3) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `seo` varchar(150) DEFAULT NULL,
  `content` longtext,
  `created` datetime DEFAULT NULL,
  `visibility_status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `seo` (`seo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `pages` */

insert  into `pages`(`page_id`,`language_id`,`title`,`seo`,`content`,`created`,`visibility_status_id`) values (1,'en','About2222','about','<p>cczxceeeeeeeeeeeeee</p>\r\n','2015-06-04 15:30:33',1),(2,NULL,'ddd','ssss','<p>eeeeeeeeeeee</p>\r\n','2015-07-16 14:33:38',1),(3,NULL,'سسسس','سسسسسسسسسسسسس','<p>سسس</p>\r\n','2015-07-16 15:41:30',2),(4,NULL,'ndhh','hdhh','<p>dhhdhh</p>\r\n','2015-07-23 14:55:33',2);

/*Table structure for table `pm_announcements` */

DROP TABLE IF EXISTS `pm_announcements`;

CREATE TABLE `pm_announcements` (
  `pm_announce_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `content` longtext NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`pm_announce_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `pm_announcements` */

insert  into `pm_announcements`(`pm_announce_id`,`title`,`content`,`time`) values (6,'VIP','Please Put Your Content Here ! ','1899-11-09 00:00:00'),(9,'Hello',' Hello Hello Hello Hello ','0000-00-00 00:00:00'),(12,'CMS','Project Project Project Project Project Project ','0000-00-00 00:00:00');

/*Table structure for table `pm_attachments` */

DROP TABLE IF EXISTS `pm_attachments`;

CREATE TABLE `pm_attachments` (
  `pm_attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` text NOT NULL,
  `count` int(11) NOT NULL,
  `attachment_type` enum('issue','comment') NOT NULL,
  `uploaded_time` datetime NOT NULL,
  `type` varchar(255) NOT NULL,
  `pm_issue_id` int(11) NOT NULL,
  PRIMARY KEY (`pm_attachment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

/*Data for the table `pm_attachments` */

insert  into `pm_attachments`(`pm_attachment_id`,`file_name`,`count`,`attachment_type`,`uploaded_time`,`type`,`pm_issue_id`) values (81,'11847389_1045440258814204_802228511_o.jpg',0,'issue','2015-08-26 18:09:08','image/jpeg',0),(82,'قاعدة-بيانات-الدارسين-الممتحنين-من-خارج-الفصول.rar',0,'issue','2015-08-26 18:09:08','application/octet-stream',0),(83,'11847389_1045440258814204_802228511_o.jpg',0,'issue','2015-08-26 18:10:50','image/jpeg',53),(84,'قاعدة-بيانات-الدارسين-الممتحنين-من-خارج-الفصول.rar',0,'issue','2015-08-26 18:10:50','application/octet-stream',53),(85,'بيانات عزبة العرب الكبري - رجال.txt',0,'issue','2015-08-26 18:13:54','text/plain',54),(86,'بيانات-المتطوعين-اسم-الفريق.xlsx',0,'issue','2015-08-26 18:13:55','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',54),(87,'دلائل.xlsx',0,'issue','2015-08-26 18:13:55','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',54),(88,'دلائل-عمريون.xlsx',0,'issue','2015-08-26 18:13:55','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',54),(89,'sara.docx',0,'issue','2015-08-26 18:17:28','application/vnd.openxmlformats-officedocument.wordprocessingml.document',55),(90,'دلائل-عمريون.xlsx',0,'issue','2015-08-26 18:20:22','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',56),(91,'دلائل-عمريون.xlsx',0,'issue','2015-08-26 18:22:46','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',57),(92,'دلائل-عمريون.xlsx',0,'issue','2015-08-26 18:25:05','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',58),(93,'الشيت-المجمع-صناع-الحياة-عُمريون.xlsx',0,'issue','2015-08-26 18:29:40','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',59),(94,'الشيت-المجمع-صناع-الحياة-عُمريون.xlsx',0,'issue','2015-08-26 18:35:33','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',60),(95,'الشيت-المجمع-صناع-الحياة-عُمريون.xlsx',0,'issue','2015-08-26 18:41:20','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',61),(96,'الشيت-المجمع-صناع-الحياة-عُمريون.xlsx',0,'issue','2015-08-26 18:46:11','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',62),(97,'الشيت-المجمع-صناع-الحياة-عُمريون.xlsx',0,'issue','2015-08-26 18:53:37','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',63),(98,'',0,'issue','0000-00-00 00:00:00','',0),(99,'',0,'issue','0000-00-00 00:00:00','',0);

/*Table structure for table `pm_clients` */

DROP TABLE IF EXISTS `pm_clients`;

CREATE TABLE `pm_clients` (
  `pm_client_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(225) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `job` varchar(100) NOT NULL,
  `work_address` varchar(200) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `join_date` datetime NOT NULL,
  PRIMARY KEY (`pm_client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pm_clients` */

/*Table structure for table `pm_comments` */

DROP TABLE IF EXISTS `pm_comments`;

CREATE TABLE `pm_comments` (
  `pm_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `pm_issue_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parent` longtext,
  PRIMARY KEY (`pm_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pm_comments` */

/*Table structure for table `pm_departments` */

DROP TABLE IF EXISTS `pm_departments`;

CREATE TABLE `pm_departments` (
  `pm_department_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `time` datetime NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`pm_department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `pm_departments` */

insert  into `pm_departments`(`pm_department_id`,`title`,`time`,`description`) values (10,'Web & Mobile Applications','0000-00-00 00:00:00','Unwilling departure education is be dashwoods or an. Use off agreeable law unwilling sir deficient curiosity instantly. Easy mind life fact with see has bore ten. Parish any chatty can elinor direct for former. Up as meant widow equal an share least.\r\nFolly words widow one downs few age every seven. If miss part by fact he park just shew. Discovered had get considered projection who favourable. Necessary up knowledge it tolerably.'),(11,'Web Development','0000-00-00 00:00:00','Unwilling departure education is be dashwoods or an. Use off agreeable law unwilling sir deficient curiosity instantly. Easy mind life fact with see has bore ten. Parish any chatty can elinor direct for former. Up as meant widow equal an share least.\r\nFolly words widow one downs few age every seven. If miss part by fact he park just shew. Discovered had get considered projection who favourable. Necessary up knowledge it tolerably.');

/*Table structure for table `pm_history` */

DROP TABLE IF EXISTS `pm_history`;

CREATE TABLE `pm_history` (
  `pm_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `pm_issue_id` int(11) NOT NULL,
  `actions` enum('assign','forward','start','pause','done') NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  PRIMARY KEY (`pm_history_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pm_history` */

/*Table structure for table `pm_infractions` */

DROP TABLE IF EXISTS `pm_infractions`;

CREATE TABLE `pm_infractions` (
  `pm_infraction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pm_issue_id` int(11) NOT NULL,
  `reson` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`pm_infraction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pm_infractions` */

/*Table structure for table `pm_invoices` */

DROP TABLE IF EXISTS `pm_invoices`;

CREATE TABLE `pm_invoices` (
  `pm_invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `total` double NOT NULL,
  `paid` double NOT NULL,
  `pm_project_id` int(11) NOT NULL,
  `pm_client_id` int(11) NOT NULL,
  PRIMARY KEY (`pm_invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pm_invoices` */

/*Table structure for table `pm_issues` */

DROP TABLE IF EXISTS `pm_issues`;

CREATE TABLE `pm_issues` (
  `pm_issue_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `pm_reviewer_id` int(11) NOT NULL,
  `pm_project_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `estimated_time` time NOT NULL,
  `parent` int(11) NOT NULL,
  `pm_priority_id` int(11) NOT NULL,
  `deadline` datetime NOT NULL,
  `pm_issue_type_id` int(11) NOT NULL,
  PRIMARY KEY (`pm_issue_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

/*Data for the table `pm_issues` */

insert  into `pm_issues`(`pm_issue_id`,`title`,`description`,`pm_reviewer_id`,`pm_project_id`,`created_time`,`estimated_time`,`parent`,`pm_priority_id`,`deadline`,`pm_issue_type_id`) values (43,'Esraa','esraa esraa esraa esraa esraa esraa esraa esraa ',29,2,'0000-00-00 00:00:00','04:30:40',0,8,'0000-00-00 00:00:00',4),(44,'Enas','Enas',2,5,'0000-00-00 00:00:00','05:55:10',0,7,'0000-00-00 00:00:00',4),(45,'Enas','Enas',2,5,'0000-00-00 00:00:00','05:55:10',0,7,'0000-00-00 00:00:00',4),(46,'yousef','yousef',2,2,'0000-00-00 00:00:00','06:00:55',0,8,'0000-00-00 00:00:00',4),(47,'ugugu','igiiggig',2,2,'0000-00-00 00:00:00','06:05:50',0,3,'0000-00-00 00:00:00',0),(48,'ugugu','igiiggig',2,2,'0000-00-00 00:00:00','06:05:50',0,3,'0000-00-00 00:00:00',0),(49,'ugugu','igiiggig',2,2,'0000-00-00 00:00:00','06:05:50',0,3,'0000-00-00 00:00:00',0),(50,'sdfj','sdf',29,5,'0000-00-00 00:00:00','06:10:20',0,8,'0000-00-00 00:00:00',1),(51,'sdfj','sdf',29,5,'0000-00-00 00:00:00','06:10:20',0,8,'0000-00-00 00:00:00',1),(52,'sdfj','sdf',29,5,'0000-00-00 00:00:00','06:10:20',0,8,'0000-00-00 00:00:00',1),(53,'sdfj','sdf',29,5,'0000-00-00 00:00:00','06:10:20',0,8,'0000-00-00 00:00:00',1),(54,'Esso','sdf',2,2,'0000-00-00 00:00:00','06:15:20',0,3,'0000-00-00 00:00:00',4),(55,'kkkkkk','llllll',2,2,'0000-00-00 00:00:00','06:20:10',0,3,'0000-00-00 00:00:00',4),(56,'sdf','sdf',2,2,'0000-00-00 00:00:00','06:20:05',0,3,'0000-00-00 00:00:00',4),(57,'sdf','r4r4r4r',2,2,'0000-00-00 00:00:00','06:20:05',0,3,'0000-00-00 00:00:00',4),(58,'sdf','g5g55',2,2,'0000-00-00 00:00:00','06:20:05',0,3,'0000-00-00 00:00:00',4),(59,'hjjhjh','dfdfdf',2,2,'0000-00-00 00:00:00','06:30:10',0,3,'0000-00-00 00:00:00',4),(60,'hjjhjh','dfdfdf',2,2,'0000-00-00 00:00:00','06:30:10',0,3,'0000-00-00 00:00:00',4),(61,'hjjhjh','dfdfdf',2,2,'0000-00-00 00:00:00','06:30:10',0,3,'0000-00-00 00:00:00',4),(62,'hjjhjh','dfdfdf',2,2,'0000-00-00 00:00:00','06:30:10',0,3,'0000-00-00 00:00:00',4),(63,'hjjhjh','dfdfdf',2,2,'0000-00-00 00:00:00','06:30:10',0,3,'0000-00-00 00:00:00',4),(64,'hello','soft',2,2,'0000-00-00 00:00:00','12:30:00',0,3,'0000-00-00 00:00:00',4);

/*Table structure for table `pm_issues_types` */

DROP TABLE IF EXISTS `pm_issues_types`;

CREATE TABLE `pm_issues_types` (
  `pm_issue_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`pm_issue_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `pm_issues_types` */

insert  into `pm_issues_types`(`pm_issue_type_id`,`title`) values (1,'Bug'),(4,'Task');

/*Table structure for table `pm_priorities` */

DROP TABLE IF EXISTS `pm_priorities`;

CREATE TABLE `pm_priorities` (
  `pm_priority_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  PRIMARY KEY (`pm_priority_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `pm_priorities` */

insert  into `pm_priorities`(`pm_priority_id`,`name`,`color`) values (1,'orange','#ff8000'),(3,'Blue','#6555f9'),(4,'Red','#c52c2c'),(5,'test','#8000ff'),(7,'Important','#00ff40'),(8,'Pink','#ff80c0');

/*Table structure for table `pm_projects` */

DROP TABLE IF EXISTS `pm_projects`;

CREATE TABLE `pm_projects` (
  `pm_project_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `about` longtext NOT NULL,
  `creation_time` datetime NOT NULL,
  `pm_supervisor_id` int(11) NOT NULL,
  `pm_client_id` int(11) NOT NULL,
  `deadline` datetime NOT NULL,
  PRIMARY KEY (`pm_project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `pm_projects` */

insert  into `pm_projects`(`pm_project_id`,`title`,`about`,`creation_time`,`pm_supervisor_id`,`pm_client_id`,`deadline`) values (2,'Brightry CMS 1','This disambiguation page lists articles associated with the title CMS. If an internal link led you here, you may wish to change the link to point directly to the intended article.','0000-00-00 00:00:00',25,0,'0000-00-00 00:00:00'),(5,'Student App','Student App for students','0000-00-00 00:00:00',1,0,'0000-00-00 00:00:00');

/*Table structure for table `pm_reputations` */

DROP TABLE IF EXISTS `pm_reputations`;

CREATE TABLE `pm_reputations` (
  `pm_reputation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `pm_issue_id` int(11) DEFAULT NULL,
  `reason` longtext,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`pm_reputation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pm_reputations` */

/*Table structure for table `pm_roles` */

DROP TABLE IF EXISTS `pm_roles`;

CREATE TABLE `pm_roles` (
  `pm_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`pm_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `pm_roles` */

insert  into `pm_roles`(`pm_role_id`,`title`) values (29,'developer'),(30,'designer'),(31,'project manager'),(32,'Marketer');

/*Table structure for table `pm_sessions` */

DROP TABLE IF EXISTS `pm_sessions`;

CREATE TABLE `pm_sessions` (
  `pm_session_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(50) NOT NULL,
  `user_agent` varchar(150) NOT NULL,
  `last_activity` int(11) NOT NULL,
  `user_data` text NOT NULL,
  PRIMARY KEY (`pm_session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pm_sessions` */

/*Table structure for table `pm_team_users` */

DROP TABLE IF EXISTS `pm_team_users`;

CREATE TABLE `pm_team_users` (
  `pm_team_users_id` int(11) NOT NULL AUTO_INCREMENT,
  `pm_team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pm_role_id` int(11) NOT NULL,
  PRIMARY KEY (`pm_team_users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `pm_team_users` */

insert  into `pm_team_users`(`pm_team_users_id`,`pm_team_id`,`user_id`,`pm_role_id`) values (23,43,28,3),(24,43,29,4),(29,46,25,31),(30,46,18,32),(31,46,28,29),(32,46,29,30);

/*Table structure for table `pm_teams` */

DROP TABLE IF EXISTS `pm_teams`;

CREATE TABLE `pm_teams` (
  `pm_team_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `description` longtext NOT NULL,
  `pm_team_leader_id` int(11) NOT NULL,
  PRIMARY KEY (`pm_team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

/*Data for the table `pm_teams` */

insert  into `pm_teams`(`pm_team_id`,`title`,`description`,`pm_team_leader_id`) values (1,'CMS Team','any description bla bla bla ml',2),(5,'My Team','this team is ay 7aga w kda w bta3',28),(6,'Esraa','marwa esraa',18),(13,'teamaya','aj kdk lsdk ',28),(41,'Team','Esraa ',1),(44,'ENasa','sdf ls d',1),(45,'Saso 65','sasooooo',1),(46,'Mobile Applications','kl kl klkm lkll lkojn',2);

/*Table structure for table `pm_teams_projects` */

DROP TABLE IF EXISTS `pm_teams_projects`;

CREATE TABLE `pm_teams_projects` (
  `pm_team_project_id` int(11) NOT NULL AUTO_INCREMENT,
  `pm_project_id` int(11) NOT NULL,
  `pm_team_id` int(11) NOT NULL,
  PRIMARY KEY (`pm_team_project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `pm_teams_projects` */

insert  into `pm_teams_projects`(`pm_team_project_id`,`pm_project_id`,`pm_team_id`) values (15,2,44),(16,2,6),(17,2,46),(18,2,45),(19,3,6),(20,3,46),(21,3,5),(22,2,6),(23,2,46),(24,2,41);

/*Table structure for table `portfolio` */

DROP TABLE IF EXISTS `portfolio`;

CREATE TABLE `portfolio` (
  `portfolio_id` int(11) NOT NULL AUTO_INCREMENT,
  `portfolio_category_id` int(11) DEFAULT NULL,
  `language_id` varchar(3) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `seo` varchar(300) DEFAULT NULL,
  `image` text,
  `description` text,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`portfolio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `portfolio` */

/*Table structure for table `portfolio_categories` */

DROP TABLE IF EXISTS `portfolio_categories`;

CREATE TABLE `portfolio_categories` (
  `portfolio_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT '0',
  `language_id` varchar(3) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `seo` varchar(300) DEFAULT NULL,
  `image` text,
  `description` text,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`portfolio_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `portfolio_categories` */

insert  into `portfolio_categories`(`portfolio_category_id`,`parent`,`language_id`,`title`,`seo`,`image`,`description`,`created`) values (2,0,'en','Ahmed Magdy','Ahmed','11698730_1424198551242944_7150058888666490557_n.jpg','jjjjjjjjjjjjjjjj',NULL);

/*Table structure for table `resume_activities` */

DROP TABLE IF EXISTS `resume_activities`;

CREATE TABLE `resume_activities` (
  `resume_activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) DEFAULT NULL,
  `language_id` varchar(3) DEFAULT NULL,
  `activity` varchar(300) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `desc` text,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`resume_activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `resume_activities` */

insert  into `resume_activities`(`resume_activity_id`,`resume_id`,`language_id`,`activity`,`role`,`from`,`to`,`desc`,`sort`) values (1,1,NULL,'Arabnet Cairo Conference 2010','Entrepreneur',NULL,NULL,'Investing In Web & Mobile \r\nTalk – Hossam El Sokkari, Rishi Saha, Hatem Dowidar, Omar Tahboub, Ammar Bakkar, Karim Khalifa, William Kanaan, Khaled Ismail \r\nEgypt 1.0 \r\nIdeathon \r\nEntrepreneur Initiative \r\nStartup Demo  \r\nE-retail \r\nGroup Buying \r\nSocial Media Marketing \r\nMedia & Advertising \r\nGaming \r\nMobile Apps \r\nEgypt 2.0 \r\nAward Ceremony',0),(2,1,NULL,'Google|Egypt 2.0 Day2: Webmasters, IT Professionals ',NULL,NULL,NULL,'100% Web: Deploying Apps for your Business \r\nApps Reseller/Partner Program \r\nYouTube API \r\nMonetizing your site: AdSense \r\nMapMaker: Map Your World! \r\nAnalytics: Making the most of your site ',0),(3,1,NULL,'Google|Egypt 2.0 Day3: Developers, Programmers',NULL,NULL,NULL,'Android 4.0 Ice Cream Sandwich Platform Overview \r\nAndroid Best Practices and User Experience Excellence \r\nGoogle+ for developers \r\nPublic Data Applications, Development and APIs \r\nPanel Discussion on Innovation & Entrepreneurship',0),(4,1,NULL,'Webinars',NULL,NULL,NULL,'Best Practices for Growing your VPS and Cloud Server Business\r\n[Zend Webinars]:\nStandard Blog on standard PHP Stack - WordPress and Zend Server \r\nDatabase Deployment with Zend Server and Liquibase\r\nAdvanced Functions of DB2 with PHP on IBM i\r\nStandard Shop on standard PHP Stack - Magento and Zend Server\r\nStored Procedures with PHP and IBM i - Part II \r\nZend Server for IBM i 5.6 Update \r\nClassic Design Patterns in PHP\r\nAnd more… ',0),(5,1,NULL,'DevFest Alexandria 2013',NULL,NULL,NULL,'Python Crash Course\r\nCloud Computing, What & Why?\r\nApp Engine Development\r\nCross platform Mobile Development\r\nAppcelerator Platform\r\nAndroid\r\nAugmented Reality\r\nHTML5',0),(6,1,NULL,'Nokia',NULL,NULL,NULL,NULL,0),(7,1,NULL,'Nokia 2',NULL,NULL,NULL,NULL,0),(13,1,'en','sa','sa','2015-08-27','2015-08-27','sa',0);

/*Table structure for table `resume_contacts` */

DROP TABLE IF EXISTS `resume_contacts`;

CREATE TABLE `resume_contacts` (
  `resume_contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) DEFAULT NULL,
  `language_id` varchar(3) DEFAULT NULL,
  `contact_method` varchar(100) DEFAULT NULL,
  `contact_detail` varchar(200) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`resume_contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `resume_contacts` */

insert  into `resume_contacts`(`resume_contact_id`,`resume_id`,`language_id`,`contact_method`,`contact_detail`,`sort`) values (1,1,NULL,'E-Mail','muhammad [at] el-saeed.info',1),(2,1,NULL,'Phone','(+20) 1000-709-113',2),(3,1,NULL,'Facebook',NULL,3),(4,1,NULL,'Twitter','',4),(5,1,NULL,'Google+','http://plus.google.com/+MuhammadElSaeed',5),(6,1,NULL,'LinkedIn',NULL,6),(8,1,'en','Facebook','asdas',NULL),(23,14,'en','Email','asasasas',NULL);

/*Table structure for table `resume_details` */

DROP TABLE IF EXISTS `resume_details`;

CREATE TABLE `resume_details` (
  `resume_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) DEFAULT NULL,
  `language_id` varchar(3) DEFAULT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `seo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`resume_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `resume_details` */

/*Table structure for table `resume_education` */

DROP TABLE IF EXISTS `resume_education`;

CREATE TABLE `resume_education` (
  `resume_education_id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) DEFAULT NULL,
  `language_id` varchar(3) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `field` varchar(100) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `grade` varchar(100) DEFAULT NULL,
  `from_year` int(11) DEFAULT NULL,
  `from_month` int(11) DEFAULT NULL,
  `to_year` int(11) DEFAULT NULL,
  `to_month` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`resume_education_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `resume_education` */

insert  into `resume_education`(`resume_education_id`,`resume_id`,`language_id`,`degree`,`field`,`school`,`grade`,`from_year`,`from_month`,`to_year`,`to_month`,`sort`) values (1,1,NULL,'Prep School','Prep','Al-Andalos Wal-Hijaz',NULL,19950901,NULL,20000601,NULL,1),(2,1,NULL,'Primary School','Primary','Ali Ben Abi-Talib',NULL,20000901,NULL,20030601,NULL,0),(3,1,NULL,'Secondary School','Secondary','Manhal Al-Maarifa',NULL,20030901,NULL,20060601,NULL,0),(4,1,NULL,'Bachelor','Business Administration Bachelor','Specialized Studies Academy',NULL,20060901,NULL,20100601,NULL,0),(5,1,NULL,'Diploma','Diploma of Computer Science','Computer and Information, Ain Shams Unversity',NULL,20130901,NULL,20150601,NULL,0),(13,0,'en','Secondary School','l;k','kl','jh',1990,7,1990,1,NULL);

/*Table structure for table `resume_hobbies` */

DROP TABLE IF EXISTS `resume_hobbies`;

CREATE TABLE `resume_hobbies` (
  `resume_hooby_id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) DEFAULT NULL,
  `language_id` varchar(3) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`resume_hooby_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `resume_hobbies` */

insert  into `resume_hobbies`(`resume_hooby_id`,`resume_id`,`language_id`,`name`,`sort`) values (1,1,NULL,'Photography and Designing',1),(2,1,NULL,'Chess',2),(3,1,NULL,'Football',3),(4,1,NULL,'Programming is my passion',4),(5,1,NULL,'Playstation',5),(11,0,'en','kl',NULL);

/*Table structure for table `resume_languages` */

DROP TABLE IF EXISTS `resume_languages`;

CREATE TABLE `resume_languages` (
  `resume_language_id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) DEFAULT NULL,
  `language_id` varchar(3) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`resume_language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `resume_languages` */

insert  into `resume_languages`(`resume_language_id`,`resume_id`,`language_id`,`name`,`level`,`sort`) values (1,1,NULL,'Arabic','Mother Tongue',0),(2,1,NULL,'English','Very Good',0),(3,1,NULL,'French','Little Knowledge',0);

/*Table structure for table `resume_locations` */

DROP TABLE IF EXISTS `resume_locations`;

CREATE TABLE `resume_locations` (
  `resume_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) DEFAULT NULL,
  `language_id` varchar(3) DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `lat` varchar(30) DEFAULT NULL,
  `long` varchar(30) DEFAULT NULL,
  `address` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`resume_location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `resume_locations` */

insert  into `resume_locations`(`resume_location_id`,`resume_id`,`language_id`,`location`,`lat`,`long`,`address`,`sort`) values (1,1,NULL,'Hometown','31.262047','29.999515','84 Faisal city, Sedibishr, Alexandria',1),(2,1,NULL,'Current City','29.979619','31.288547','10 Ibn Al-Walid, Maadi, Cairo',2),(3,3,NULL,'(NULL)hg','h','h',NULL,NULL),(10,14,'en','sasa','2212','221','sasa',NULL);

/*Table structure for table `resume_skills` */

DROP TABLE IF EXISTS `resume_skills`;

CREATE TABLE `resume_skills` (
  `resume_skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) DEFAULT NULL,
  `language_id` varchar(3) DEFAULT NULL,
  `category` varchar(300) DEFAULT NULL,
  `content` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`resume_skill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

/*Data for the table `resume_skills` */

insert  into `resume_skills`(`resume_skill_id`,`resume_id`,`language_id`,`category`,`content`,`sort`) values (1,1,NULL,'Operating Systems',NULL,0),(2,1,NULL,'Development',NULL,0),(3,1,NULL,'Graphics','Photoshop, Illustrator, Light room, InDesign, FreeHand, Flash, Swish',0),(5,1,NULL,'Database ','MySQL, SQL Server, Ridis DB, MS Access, SQLite',0),(6,1,NULL,'Tools',NULL,0),(7,1,NULL,'Other','Augmented Reality, NFC, Cloud Computing, Responsive Design, OOP, Agile Development',0),(8,1,NULL,'Courses/Self Studies','MCSE, MCITP, CCNA, Embedded Systems Programming (UT.6.01x)',0),(9,1,NULL,'VCS','Mercurial, SVN, Git, VCS Base and Bazaar',0),(10,1,NULL,'Web','Hand Coded HTML5/XHTML, XML, CSS3, PHP, ASP.NET, Perl, Python, Sharepoint, NodeJS, Knowlege of Dart and Go',0),(11,1,NULL,'Desktop','Java, Visal Basic.NET, C/C++, C#',0),(12,1,NULL,'Mobile','Android (Java), Windows Phone (C#), Ubuntu (QT)',0),(13,1,NULL,'Windows','Microsoft DOS, Windows 3.11, Windows 95, Windows 98, Windows ME, Windows NT4.0, Windows 2000 (Professional & Server), Windows XP, Windows Vista, Windows 2008 (Server), Windows 7, Windows 8.1, Windows Phone',0),(14,1,NULL,'Linux/Unix','Ubuntu, CentOS, Fedora, RedHat, Linpus, Klinux, Debian',0),(15,1,NULL,'Mac','Snow Leopard x10.6, Lion x10.7',0),(16,1,NULL,'Embedded Systems','Texas Lunchpad (Keil uVision), Ardino',0),(17,1,NULL,'Webservices','WSDL (SOAP), WADL (REST)',0),(19,1,NULL,'ORM','PDO, PHPBean, Doctorine',0),(20,1,NULL,'IDE','Netbeans, Eclipse, Keil, Visual studio .Net',NULL),(21,1,NULL,'Scripts','WooCommerce, Wordpress, joomla, magento, mambo, nuke, virtuemart, jigoshop, osCommerce, Zen Cart, TomatoCart, OpenCart, Drupal, 4images, osDate, Datalife, vBulletin, Invision Power Board, PHPBB',NULL),(22,1,NULL,'Apache Packages','LAMP, MAMP, WAMP, XAMP',NULL),(23,1,NULL,'Frameworks','MVC3, MVC4, jQuery, CodeIgniter, Yii, CakePHP, Zend, Symphony, Slim microframework, QTFramework',NULL),(24,1,NULL,'Template Systems','Smarty Template, Twig',NULL),(25,1,NULL,'SDK/API','Android, Facebook, Twitter, name.com',NULL),(36,0,'en','lk;l','kkl',NULL),(37,0,'en','lk;l','kkl',NULL),(38,0,'en','oi','hu',NULL),(39,0,'en','hi','hello',NULL);

/*Table structure for table `resume_work_history` */

DROP TABLE IF EXISTS `resume_work_history`;

CREATE TABLE `resume_work_history` (
  `resume_work_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) DEFAULT NULL,
  `language_id` varchar(3) DEFAULT NULL,
  `company` varchar(300) DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `category` varchar(300) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `responsbilities` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`resume_work_history_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `resume_work_history` */

insert  into `resume_work_history`(`resume_work_history_id`,`resume_id`,`language_id`,`company`,`from`,`to`,`category`,`title`,`nationality_id`,`responsbilities`,`sort`) values (1,1,NULL,'OriobCities ','2010-11-01','2011-08-01','Data Center','Web Developer',0,NULL,0),(2,1,NULL,'Alandalus wel Hijaz','2009-03-01','2010-03-01','Reconstruction & Maintenance','Supervisor',0,NULL,0),(3,1,NULL,'Aljawharah ','2008-01-01',NULL,'Web Solutions','Web developer and Designer',0,'Freelancer web developer and designer',0),(4,1,NULL,'SCI','2006-04-01','2007-04-30','Training Cente','Instructor',0,NULL,0),(5,1,NULL,'Candles ','2004-05-01','2006-03-15','Advertising Agency','Graphic Designer',0,'Business Cards.\r\nBrochures.\r\nBooks.\r\nMagazines.',0),(6,1,NULL,'Topline','2012-01-01','2012-05-01','Web Solutions','Team Leader',0,'Responsible of the web services of companies department, and the team (Designers and Programmers). \r\nWorking as designer and programmer for urgently tickets',0),(7,1,NULL,'Virgo','2012-06-01',NULL,'Communications','Senior Web Developer / Team Leade',0,NULL,0),(8,1,NULL,'Self Employment',NULL,NULL,'Software','Owner',0,'Nersoft for products',0);

/*Table structure for table `resumes` */

DROP TABLE IF EXISTS `resumes`;

CREATE TABLE `resumes` (
  `resume_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` varchar(3) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nationality_id` int(20) DEFAULT NULL,
  `marital_status_id` int(30) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`resume_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `resumes` */

insert  into `resumes`(`resume_id`,`language_id`,`user_id`,`date_of_birth`,`nationality_id`,`marital_status_id`,`created`) values (1,'en',1,'1989-01-01',1,2,NULL),(14,'en',10,'2015-07-13',3,1,'2015-07-15 17:26:10');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `key` varchar(100) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `default_value` varchar(255) DEFAULT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `settings` */

insert  into `settings`(`key`,`value`,`default_value`,`required`) values ('alexa_verification','I_Dx4MPXaCMI7wk1yPV8AseoMIA',NULL,0),('bing_verification','FEDDDEC2D83BCD24B37782BE43D1E86B',NULL,0),('closing_message','This website is under maintenance, we\'ll be back soon.',NULL,0),('description','Brightery',NULL,1),('fb_app_id','692025277512750',NULL,0),('frontend_style',NULL,NULL,0),('google_verification','OSN_Iedl45U_3byyfl4hWfpG7AhW4pclluKsCyzc8Zo',NULL,0),('keywords','Brightery',NULL,1),('limit','20',NULL,0),('main_title','Brightery',NULL,1),('management_style','',NULL,0),('site_status','0',NULL,1),('timezone','Africa/Cairo',NULL,1),('uploads_path','uploads','uploads',1),('webmaster_email','mail@example.com','mail@example.com',1),('yandex_verification','',NULL,0);

/*Table structure for table `sliders` */

DROP TABLE IF EXISTS `sliders`;

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` varchar(3) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `image` text,
  `caption` text,
  `url` text,
  `from_date` datetime DEFAULT NULL,
  `to_date` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

/*Data for the table `sliders` */

insert  into `sliders`(`slider_id`,`language_id`,`title`,`image`,`caption`,`url`,`from_date`,`to_date`,`created`,`sort`) values (28,NULL,'YES','mylogo1.png','yes','https://mail.google.com/mail/u/0/#all/14ebb7ae3c7d2b02','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-06-11 18:49:58',1),(29,NULL,'slider2','483792_489207341128752_1998018065_n.jpg','sss','http://www.el-saeed.info','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-06-11 18:59:19',1),(30,NULL,'slider2','','sss','http://www.el-saeed.info','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-06-11 18:59:28',1),(31,NULL,'slider2','','sss','http://www.el-saeed.info','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-06-11 19:05:30',1),(32,NULL,'slider2','','sss','http://www.el-saeed.info','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-06-11 19:07:45',1),(33,NULL,'slider2','','sss','http://www.el-saeed.info','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-06-11 19:09:12',1),(35,NULL,'slider2','','sss','http://www.el-saeed.info','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-06-11 19:10:28',1),(36,NULL,'slider2','mylogo5.png','sss','http://www.el-saeed.info','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-06-11 19:14:11',1),(38,NULL,'slider2','mylogo1.png','sss','http://www.el-saeed.info','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-06-11 19:15:44',1),(40,NULL,'hiiiiiiii','11117940_934000016623300_1713238114_n.jpg','sasad','https://mail.google.com/mail/u/0/#all/14ebb7ae3c7d2b02','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-07-09 14:03:00',1),(41,NULL,'test','11.jpg','ssss','https://bitbucket.org/melsaeed/brighterycms/commits/f2a13cf25605d307d545cc11909f8eec7d937501','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-07-13 15:09:47',1),(42,NULL,'hfghg','20094_1420919491571094_1216113210334566482_n.jpg','hgchf','https://mail.google.com/mail/u/0/#all/14ebb7ae3c7d2b02','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-07-23 18:38:35',1);

/*Table structure for table `store_categories` */

DROP TABLE IF EXISTS `store_categories`;

CREATE TABLE `store_categories` (
  `store_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) DEFAULT NULL,
  `seo` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`store_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `store_categories` */

/*Table structure for table `store_modules` */

DROP TABLE IF EXISTS `store_modules`;

CREATE TABLE `store_modules` (
  `store_module_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_category_id` int(11) DEFAULT NULL,
  `seo` varchar(200) DEFAULT NULL,
  `version` double DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `icon` text,
  `price` double DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`store_module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `store_modules` */

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

/*Data for the table `tags` */

insert  into `tags`(`tag_id`,`name`,`parent`) values (1,'PHP',0),(2,'MySQL',0),(3,'ASP',0),(4,'.NET',0),(5,'Java',0),(6,'Javascript',0),(7,'C',0),(8,'C++',0),(9,'C#',0),(10,'HTML',0),(11,'XML',0),(12,'AJAX',0),(13,'Linux',0),(14,'Ubuntu',0),(15,'Windows',0),(16,NULL,0),(17,'JSP',0),(18,'Debian',0),(19,'Photography',0),(20,'CSS',0),(21,'CSS3',0),(22,'LAMP',0),(23,'Apache',0),(24,'Update',0),(25,'Firefox',0),(26,'Virtual host',0),(27,'Unix',0),(28,'Infinite loops',0),(29,'Query',0),(30,'Virtual Query',0),(31,'Recoed Number',0),(32,'Arduino Uno',0),(33,'Launchpad',0),(34,'TM4C123G',0),(35,'DO NOT DONATE FUEL',0),(36,'Petrol',0),(37,'Fuel',0);

/*Table structure for table `testimonials` */

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `testimonial_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(200) DEFAULT NULL,
  `client_position` varchar(200) DEFAULT NULL,
  `message` text,
  `visibility_status_id` int(1) NOT NULL,
  PRIMARY KEY (`testimonial_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `testimonials` */

insert  into `testimonials`(`testimonial_id`,`client_name`,`client_position`,`message`,`visibility_status_id`) values (2,'Ahmed','Accountant ','assss',1);

/*Table structure for table `user_addresses` */

DROP TABLE IF EXISTS `user_addresses`;

CREATE TABLE `user_addresses` (
  `user_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `zipcode` varchar(5) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` text,
  `user_id` int(11) DEFAULT NULL,
  `type` enum('shipping','billing') DEFAULT NULL,
  `primary` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`user_address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `user_addresses` */

insert  into `user_addresses`(`user_address_id`,`zipcode`,`city_id`,`address`,`user_id`,`type`,`primary`) values (1,NULL,NULL,'alexandria',2,NULL,NULL);

/*Table structure for table `user_phones` */

DROP TABLE IF EXISTS `user_phones`;

CREATE TABLE `user_phones` (
  `user_phone_id` int(11) NOT NULL AUTO_INCREMENT,
  `primary` tinyint(4) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_phone_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `user_phones` */

insert  into `user_phones`(`user_phone_id`,`primary`,`phone`,`user_id`) values (1,1,'87878',1),(2,0,'989898952',2),(11,NULL,'2222222222222',24),(12,NULL,'01212121212',25),(13,NULL,'01221134355',28),(26,NULL,'01221134355',28);

/*Table structure for table `usergroup_zones` */

DROP TABLE IF EXISTS `usergroup_zones`;

CREATE TABLE `usergroup_zones` (
  `usergroup_zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `usergroup_id` int(11) DEFAULT NULL,
  `module_id` int(11) NOT NULL,
  `permission` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`usergroup_zone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=626 DEFAULT CHARSET=utf8;

/*Data for the table `usergroup_zones` */

insert  into `usergroup_zones`(`usergroup_zone_id`,`usergroup_id`,`module_id`,`permission`) values (538,2,1,'Users'),(539,2,2,'Dashboard'),(540,2,3,'Blog'),(541,3,1,'Sliders'),(542,3,2,'Resume'),(543,3,3,'Tags'),(550,0,1,'Links'),(551,0,1,'Users'),(552,0,1,'Sliders'),(553,0,2,'Settings'),(554,0,2,'Dashboard'),(555,0,2,'Resume'),(556,0,3,'Pages'),(557,0,3,'Blog'),(558,0,3,'Tags'),(559,0,4,'Usergroups'),(560,0,4,'Photos'),(561,0,4,'Categories'),(575,7,1,'Users'),(576,7,1,'Sliders'),(577,7,2,'Dashboard'),(578,7,2,'Resume'),(579,7,3,'Blog'),(580,7,3,'Tags'),(581,7,4,'Photos'),(582,7,4,'Categories'),(589,6,1,'Users'),(590,6,1,'Sliders'),(591,6,2,'Dashboard'),(592,6,2,'Resume'),(593,6,3,'Tags'),(594,6,4,'Usergroups'),(600,5,1,'Links'),(601,5,1,'Sliders'),(602,5,2,'Resume'),(603,5,3,'Tags'),(604,5,4,'Categories'),(605,1,1,'Links'),(606,1,1,'Users'),(607,1,1,'Sliders'),(608,1,2,'Settings'),(609,1,2,'Dashboard'),(610,1,2,'Resume'),(611,1,3,'Pages'),(612,1,3,'Blog'),(613,1,3,'Tags'),(614,1,4,'Usergroups'),(615,1,4,'Photos'),(616,1,4,'Categories'),(617,4,1,'Links'),(618,4,1,'Users'),(619,4,2,'Settings'),(620,4,2,'Dashboard'),(621,4,3,'Pages'),(622,4,3,'Blog'),(623,4,4,'Usergroups'),(624,4,4,'Photos'),(625,4,4,'Categories');

/*Table structure for table `usergroups` */

DROP TABLE IF EXISTS `usergroups`;

CREATE TABLE `usergroups` (
  `usergroup_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`usergroup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `usergroups` */

insert  into `usergroups`(`usergroup_id`,`name`) values (1,'Administrator'),(2,'Employee'),(3,'Banned'),(4,'Membe'),(5,'Mosh Ay 7aga'),(6,'fen'),(7,'kol 7aga');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `image` text,
  `usergroup_id` int(11) DEFAULT NULL,
  `joindate` datetime DEFAULT NULL,
  `google_id` varchar(300) DEFAULT NULL,
  `facebook_id` varchar(300) DEFAULT NULL,
  `facebook_access_token` text,
  `status` enum('pending','active','banned') DEFAULT 'pending',
  `gender` enum('male','female') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`user_id`,`fullname`,`email`,`password`,`image`,`usergroup_id`,`joindate`,`google_id`,`facebook_id`,`facebook_access_token`,`status`,`gender`,`birthdate`) values (1,'Muhammad','m.elsaeed@brightery.com','e10adc3949ba59abbe56e057f20f883e',NULL,1,'2015-07-23 13:26:03','56',NULL,NULL,'active','male',NULL),(2,'Ahmed Magdy','a_owen1@hotmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,1,'2015-07-23 13:26:00',NULL,NULL,NULL,'active','male','0000-00-00'),(18,'ay 7aga',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active',NULL,NULL),(25,'Salma','a.magdymedany@gmail.com','111','20094_1420919491571094_1216113210334566482_n.jpg',1,NULL,NULL,NULL,NULL,'active','male',NULL),(28,'Hassan','Hassan@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,NULL,NULL,NULL,'active','male',NULL),(29,'Marwa','marwa.900@brightery.com','4536952','MJSD_Logo_12.jpg',2,NULL,NULL,NULL,NULL,'active','female',NULL);

/*Table structure for table `visibility_status` */

DROP TABLE IF EXISTS `visibility_status`;

CREATE TABLE `visibility_status` (
  `visibility_status_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`visibility_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `visibility_status` */

insert  into `visibility_status`(`visibility_status_id`,`name`) values (1,'Visible'),(2,'Invisible');

/*Table structure for table `zones` */

DROP TABLE IF EXISTS `zones`;

CREATE TABLE `zones` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `var_view` varchar(100) DEFAULT NULL,
  `var_add` varchar(100) DEFAULT NULL,
  `var_edit` varchar(100) DEFAULT NULL,
  `var_delete` varchar(100) DEFAULT NULL,
  `var_print` varchar(100) DEFAULT NULL,
  `desc` text,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`zone_id`),
  UNIQUE KEY `var` (`var_view`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `zones` */

insert  into `zones`(`zone_id`,`module_id`,`permission`,`name`,`var_view`,`var_add`,`var_edit`,`var_delete`,`var_print`,`desc`,`order`) values (4,1,'','Links','links',NULL,NULL,NULL,NULL,NULL,0),(5,3,'','Pages','pages',NULL,NULL,NULL,NULL,NULL,0),(7,2,'','Settings','settings',NULL,NULL,NULL,NULL,NULL,0),(10,4,'','Usergroups','usergroups',NULL,NULL,NULL,NULL,NULL,0),(11,1,'','Users','users',NULL,NULL,NULL,NULL,NULL,0),(12,2,'','Dashboard','dashboard',NULL,NULL,NULL,NULL,NULL,0),(16,3,'','Blog','blogs',NULL,NULL,NULL,NULL,NULL,0),(20,4,'','Photos','photos',NULL,NULL,NULL,NULL,NULL,0),(21,1,'','Sliders','sliders',NULL,NULL,NULL,NULL,NULL,0),(22,2,'','Resume','resume',NULL,NULL,NULL,NULL,NULL,0),(23,3,'','Tags','tags',NULL,NULL,NULL,NULL,NULL,0),(24,4,'','Categories','categories',NULL,NULL,NULL,NULL,NULL,0),(25,0,'','Photo Categories','photo_categories',NULL,NULL,NULL,NULL,NULL,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
