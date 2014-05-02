/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.0.45-community-nt : Database - online_test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`online_test` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `online_test`;

/*Table structure for table `ans_table` */

DROP TABLE IF EXISTS `ans_table`;

CREATE TABLE `ans_table` (
  `Ans_id` int(11) NOT NULL auto_increment,
  `Que_id` int(11) default NULL,
  `Ans` varchar(50) default NULL,
  PRIMARY KEY  (`Ans_id`),
  KEY `FK_ans` (`Que_id`),
  CONSTRAINT `FK_ans` FOREIGN KEY (`Que_id`) REFERENCES `questions` (`Que_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `opt_table` */

DROP TABLE IF EXISTS `opt_table`;

CREATE TABLE `opt_table` (
  `Opt_id` int(11) NOT NULL auto_increment,
  `Que_id` int(11) default NULL,
  `Opt_a` varchar(50) default NULL,
  `Opt_b` varchar(50) default NULL,
  `Opt_c` varchar(50) default NULL,
  `Opt_d` varchar(50) default NULL,
  `Ans` varchar(20) default NULL,
  PRIMARY KEY  (`Opt_id`),
  KEY `FK_ans_table` (`Que_id`),
  CONSTRAINT `FK_ans_table` FOREIGN KEY (`Que_id`) REFERENCES `questions` (`Que_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Table structure for table `questions` */

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `Que_id` int(11) NOT NULL auto_increment,
  `Type_id` int(11) default NULL,
  `Question` text,
  `Opt_a` varchar(20) default NULL,
  `Opt_b` varchar(20) default NULL,
  `Opt_c` varchar(20) default NULL,
  `Opt_d` varchar(20) default NULL,
  `Ans` varchar(20) default NULL,
  PRIMARY KEY  (`Que_id`),
  KEY `FK_questions` (`Type_id`),
  CONSTRAINT `FK_questions` FOREIGN KEY (`Type_id`) REFERENCES `test_type` (`Type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Table structure for table `test_type` */

DROP TABLE IF EXISTS `test_type`;

CREATE TABLE `test_type` (
  `Type_id` int(11) NOT NULL auto_increment,
  `Test_type` varchar(30) default NULL,
  PRIMARY KEY  (`Type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `user_id` */

DROP TABLE IF EXISTS `user_id`;

CREATE TABLE `user_id` (
  `u_id` int(11) NOT NULL auto_increment,
  `id` int(11) default NULL,
  `user_id` varchar(20) default NULL,
  `password` varchar(20) default NULL,
  PRIMARY KEY  (`u_id`),
  KEY `FK_user_id` (`id`),
  CONSTRAINT `FK_user_id` FOREIGN KEY (`id`) REFERENCES `user_info` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Table structure for table `user_info` */

DROP TABLE IF EXISTS `user_info`;

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL auto_increment,
  `f_name` varchar(20) default NULL,
  `email` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
