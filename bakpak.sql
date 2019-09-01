/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.36-MariaDB : Database - bakpak
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bakpak` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bakpak`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`fname`,`lname`,`username`,`password`,`status`) values (1,'admin','admin','admin','admin','Active');

/*Table structure for table `bundle` */

DROP TABLE IF EXISTS `bundle`;

CREATE TABLE `bundle` (
  `bundle_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `date_added` varchar(255) DEFAULT NULL,
  `item_name_bundled` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bundle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bundle` */

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `item_code` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `cart` */

insert  into `cart`(`cart_id`,`user_id`,`item_code`,`quantity`) values (10,16,10,1),(15,8,6,2),(25,7,1,3),(26,7,15,3),(27,7,3,2),(28,7,4,2),(29,7,2,1);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`cat_id`,`category_name`) values (1,'SCHOOL BASICS'),(2,'ARTS & CRAFTS'),(3,'BOOK SECTION');

/*Table structure for table `delivery` */

DROP TABLE IF EXISTS `delivery`;

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `delivery_status` varchar(50) DEFAULT NULL COMMENT 'PENDING',
  `order_id` int(11) DEFAULT NULL,
  `delivery_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`delivery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `delivery` */

insert  into `delivery`(`delivery_id`,`user_id`,`delivery_status`,`order_id`,`delivery_date`) values (1,7,'pending',1,'2019-01-28 09:52:00');

/*Table structure for table `item_setup` */

DROP TABLE IF EXISTS `item_setup`;

CREATE TABLE `item_setup` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(255) DEFAULT NULL,
  `supp_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `item_image` varchar(100) DEFAULT NULL,
  `date_added` varchar(255) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `unit_price` decimal(11,2) DEFAULT NULL,
  `bundled_price` decimal(11,2) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `unit_measure` varchar(255) DEFAULT NULL,
  `item_quantity` int(11) DEFAULT NULL,
  `item_description` text,
  `item_brand` varchar(255) DEFAULT NULL,
  `item_rating` varchar(255) DEFAULT NULL,
  `item_comment` text,
  `status` varchar(50) DEFAULT 'ACTIVE',
  `bundled_status` varchar(50) DEFAULT 'NO',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `item_setup` */

insert  into `item_setup`(`item_id`,`item_code`,`supp_id`,`category_id`,`sub_category_id`,`item_image`,`date_added`,`discount_price`,`unit_price`,`bundled_price`,`item_name`,`unit_measure`,`item_quantity`,`item_description`,`item_brand`,`item_rating`,`item_comment`,`status`,`bundled_status`) values (7,'r313451',1,1,4,'5c46fe539f3fd9.34386050.jpeg',NULL,0,'35.00','0.00','Glue','PCS',110,'sample','Ampspec','','','ACTIVE','NO'),(8,'321213',1,1,6,'5c46cbffea3417.03961625.jpg','2019-01-22',0,'35.00','0.00','PCS','PCS',100,'Pang gunting','Crayola','','','ACTIVE','NO'),(9,'848920',1,1,5,'5c46cd1e45f6a9.62458837.jpg','2019-01-22',0,'30.00','34.00','PCS','PCS',100,'Ikadauhang gunting','Amspec','','','ACTIVE','NO'),(10,'14802',1,1,4,'5c46fd61d45637.37736884.jpg','',0,'29.00','40.00','Glue','PCS',300,'Papilit siya ','Crayola','','','ACTIVE','NO'),(11,'424311',1,1,2,'5c47279d6ca776.46811922.jpg','2019-01-22',0,'20.00','10.00','Eraser','PCS',100,'Erases everything including your life','Crayola','','','ACTIVE','NO'),(12,'1324013',1,1,2,'5c4727d4885f74.67080324.png','2019-01-22',0,'30.00','20.00','Eraser 2.0','PCS',949,'Another one','Amspec','','','ACTIVE','NO');

/*Table structure for table `notification` */

DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `message` text,
  `status` varchar(255) DEFAULT 'UNREAD',
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `notification` */

insert  into `notification`(`id`,`user_id`,`item_id`,`name`,`message`,`status`,`date`) values (2,7,7,'FeedBack','Your Product is the worst product of all time','READ','2019-01-23 02:02:28'),(3,7,7,'Comment','Ok\r\n','READ','2019-01-23 10:28:18'),(4,7,7,'FeedBack','Nice','READ','2019-01-23 10:28:33'),(5,7,7,'Comment','Nothing','READ','2019-01-23 10:46:31');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `order_totalPrice` decimal(11,2) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT 'UNPAID',
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `orders` */

insert  into `orders`(`order_id`,`user_id`,`cart_id`,`item_id`,`order_totalPrice`,`payment_status`,`order_date`) values (1,7,10,7,'1000.00','UNPAID','2019-01-23 02:40:32');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

/*Table structure for table `point` */

DROP TABLE IF EXISTS `point`;

CREATE TABLE `point` (
  `point_id` int(11) NOT NULL AUTO_INCREMENT,
  `num_point` varchar(50) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`point_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `point` */

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `total_sales` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sales` */

/*Table structure for table `sub_categories` */

DROP TABLE IF EXISTS `sub_categories`;

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_category_name` varchar(255) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `sub_categories` */

insert  into `sub_categories`(`id`,`sub_category_name`,`cat_id`) values (1,'PAPERS',1),(2,'WRITING TOOLS',1),(3,'NOTEBOOKS',1),(4,'ENVELOP',1),(5,'FOLDERS',1),(6,'ERASERS',1),(7,'OFFICE SUPPLIES',1),(8,'COLORING MATERIALS',2),(9,'PAPER PRODUCTS',2),(10,'CRAFT MATERIALS',2),(11,'ENGLISH',3),(12,'MATHEMATICS',3),(13,'SCIENCE',3),(14,'HISTORY',3),(15,'ARTS',3),(16,'PHYSICAL EDUCATION',3),(17,'FILIPINO',3),(18,'MUSIC',3);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `supp_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `tin_number` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Active',
  PRIMARY KEY (`supp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`supp_id`,`supplier_name`,`address`,`contact_no`,`contact_email`,`tin_number`,`status`) values (1,'People Education','Sancianko Str. Cebu City','09296604887','eirracYu12@gmail.com','123013-137294','Active');

/*Table structure for table `tbl` */

DROP TABLE IF EXISTS `tbl`;

CREATE TABLE `tbl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(255) DEFAULT NULL,
  `user_lname` varchar(255) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_birthdate` varchar(255) DEFAULT NULL,
  `user_postal_code` varchar(50) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_status` varchar(50) DEFAULT 'ACTIVE',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user_id`,`user_fname`,`user_lname`,`user_address`,`user_birthdate`,`user_postal_code`,`user_email`,`user_phone`,`user_username`,`user_password`,`user_status`) values (7,'carrie','yu','Archbishop Reyes Ave, Cebu City, 6000 Cebu','09/30/98','6000','carrie_yu12@yahoo.com','09099882257','carrie','123','ACTIVE'),(16,'Arwin Kim','Pinez',NULL,NULL,NULL,'arwin@gmail.com','09099882257','arwin','123','ACTIVE'),(18,'Alyn','Magdadaro','Door 1 2nd floor Romero Bldg. Basak Mandaue','09/30/98','6000','alyn.magdadaro','09099882257','alyn','alyn','ACTIVE'),(19,'maria cress','tecson','address','nov 4 1998','6000','eirracYU12@gmail.com','090909090','mctec','123','INACTIVE');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
