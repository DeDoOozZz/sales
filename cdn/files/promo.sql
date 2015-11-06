/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 5.5.44-0ubuntu0.14.04.1 : Database - promos
*********************************************************************
*/


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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
