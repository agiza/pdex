/*
SQLyog Ultimate v9.60 
MySQL - 5.5.16 : Database - presdex
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`presdex` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `presdex`;

/*Table structure for table `compare_term` */

DROP TABLE IF EXISTS `compare_term`;

CREATE TABLE `compare_term` (
  `ct_id` int(11) NOT NULL AUTO_INCREMENT,
  `ct_query` varchar(255) NOT NULL,
  `ct_name` varchar(255) NOT NULL,
  `ct_racer` int(11) DEFAULT NULL,
  `ct_negative` tinyint(1) DEFAULT '0',
  `ct_last_query_date` datetime DEFAULT NULL,
  `ct_max_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ct_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `compare_term` */

insert  into `compare_term`(`ct_id`,`ct_query`,`ct_name`,`ct_racer`,`ct_negative`,`ct_last_query_date`,`ct_max_id`) values (1,'Romney :)','Good Romney',2,0,NULL,NULL),(2,'Romney :(','Bad Romney',2,1,NULL,NULL),(3,'Obama :)','Good Obama',1,0,NULL,NULL),(4,'Obama :(','Bad Obama',1,1,NULL,NULL);

/*Table structure for table `racer` */

DROP TABLE IF EXISTS `racer`;

CREATE TABLE `racer` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(255) DEFAULT NULL,
  `r_img` varchar(255) DEFAULT NULL,
  `r_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `racer` */

insert  into `racer`(`r_id`,`r_name`,`r_img`,`r_desc`) values (1,'Barak Obama',NULL,NULL),(2,'Mitt Romney',NULL,NULL);

/*Table structure for table `tweet` */

DROP TABLE IF EXISTS `tweet`;

CREATE TABLE `tweet` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_date` datetime NOT NULL,
  `t_user` varchar(255) NOT NULL,
  `t_user_id` int(11) DEFAULT NULL,
  `t_user_name` varchar(255) DEFAULT NULL,
  `t_geo` varchar(255) DEFAULT NULL,
  `t_id_str` varchar(255) DEFAULT NULL,
  `t_profile_img_url` text,
  `t_text` text NOT NULL,
  `t_sentiment` enum('positive','negative') DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tweet` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
