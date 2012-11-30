# SQL Manager 2011 for MySQL 5.1.0.2
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : jcat


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `jcat`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `jcat`;

#
# Структура для таблицы `cache`: 
#

CREATE TABLE `cache` (
  `id` CHAR(128) COLLATE latin1_swedish_ci NOT NULL,
  `expire` INTEGER(11) DEFAULT NULL,
  `value` LONGBLOB,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `catalog_category`: 
#

CREATE TABLE `catalog_category` (
  `category_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `category_name` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,
  `category_review` TEXT COLLATE utf8_general_ci,
  `category_photodir` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,
  `category_parent` INTEGER(11) DEFAULT NULL,
  `category_lft` INTEGER(11) DEFAULT NULL,
  `category_rgt` INTEGER(11) DEFAULT NULL,
  `category_level` INTEGER(11) DEFAULT NULL,
  `category_pic1` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,
  `category_pic2` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,
  `category_pic3` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,
  `category_pic4` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  KEY `lft` (`category_lft`),
  KEY `rgt` (`category_rgt`),
  KEY `level` (`category_level`),
  KEY `name` (`category_name`)
)ENGINE=InnoDB
AUTO_INCREMENT=17 AVG_ROW_LENGTH=2340 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `user_users`: 
#

CREATE TABLE `user_users` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) COLLATE utf8_general_ci NOT NULL,
  `password` VARCHAR(128) COLLATE utf8_general_ci NOT NULL,
  `email` VARCHAR(128) COLLATE utf8_general_ci NOT NULL,
  `activkey` VARCHAR(128) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `createtime` INTEGER(10) NOT NULL DEFAULT 0,
  `lastvisit` INTEGER(10) NOT NULL DEFAULT 0,
  `superuser` INTEGER(1) NOT NULL DEFAULT 0,
  `status` INTEGER(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
)ENGINE=InnoDB
AUTO_INCREMENT=8 AVG_ROW_LENGTH=8192 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `catalog_order`: 
#

CREATE TABLE `catalog_order` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `id_user` INTEGER(11) DEFAULT NULL,
  `submitted` TINYINT(1) NOT NULL DEFAULT 0,
  `date_submit` INTEGER(11) DEFAULT NULL,
  `allowed` TINYINT(1) NOT NULL DEFAULT 0,
  `date_allow` INTEGER(11) DEFAULT NULL,
  `manager_id` INTEGER(11) DEFAULT NULL,
  `id_paidmetod` INTEGER(11) DEFAULT NULL,
  `paid_date` INTEGER(11) DEFAULT NULL,
  `payed` INTEGER(11) DEFAULT NULL,
  `id_shipped` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `catalog_order_fk1` FOREIGN KEY (`id_user`) REFERENCES `user_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=2 AVG_ROW_LENGTH=16384 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `catalog_vendor`: 
#

CREATE TABLE `catalog_vendor` (
  `vendor_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  `vendor_review` TEXT COLLATE utf8_general_ci,
  `vendor_logo` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`vendor_id`)
)ENGINE=InnoDB
AUTO_INCREMENT=2 AVG_ROW_LENGTH=16384 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `catalog_product`: 
#

CREATE TABLE `catalog_product` (
  `product_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `product_name` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,
  `product_model` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,
  `product_dilprice` FLOAT(9,2) DEFAULT NULL,
  `product_retprice` FLOAT(9,2) DEFAULT NULL,
  `product_olddilprice` FLOAT(9,2) DEFAULT NULL,
  `product_oldretprice` FLOAT(9,2) DEFAULT NULL,
  `product_show` TINYINT(1) DEFAULT NULL,
  `product_shortdesc` TEXT COLLATE utf8_general_ci,
  `product_review` TEXT COLLATE utf8_general_ci,
  `product_feature` TEXT COLLATE utf8_general_ci,
  `product_main_photo` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  `product_feature_photo` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  `product_maincategory` INTEGER(11) DEFAULT NULL,
  `product_vendor` INTEGER(11) DEFAULT NULL,
  `product_kod1c` INTEGER(11) DEFAULT NULL,
  `product_dimensions` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,
  `product_qty` INTEGER(11) DEFAULT NULL COMMENT 'Количество',
  PRIMARY KEY (`product_id`),
  KEY `product_maincategory` (`product_maincategory`),
  KEY `product_vendor` (`product_vendor`),
  CONSTRAINT `catalog_product_ibfk_1` FOREIGN KEY (`product_vendor`) REFERENCES `catalog_vendor` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `catalog_product_ibfk_2` FOREIGN KEY (`product_maincategory`) REFERENCES `catalog_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
)ENGINE=InnoDB
AUTO_INCREMENT=119 AVG_ROW_LENGTH=16384 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `catalog_order_detail`: 
#

CREATE TABLE `catalog_order_detail` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `id_order` INTEGER(11) DEFAULT NULL,
  `id_product` INTEGER(11) DEFAULT NULL,
  `qty` INTEGER(11) DEFAULT NULL,
  `price` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_order` (`id_order`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `catalog_order_detail_fk1` FOREIGN KEY (`id_order`) REFERENCES `catalog_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `catalog_order_detail_fk2` FOREIGN KEY (`id_product`) REFERENCES `catalog_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=213 AVG_ROW_LENGTH=4096 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `catalog_photo`: 
#

CREATE TABLE `catalog_photo` (
  `photo_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `photo_idproduct` INTEGER(11) DEFAULT NULL,
  `photo_name` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`photo_id`),
  KEY `photo_idproduct` (`photo_idproduct`),
  CONSTRAINT `catalog_photo_ibfk_1` FOREIGN KEY (`photo_idproduct`) REFERENCES `catalog_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=528 AVG_ROW_LENGTH=528 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `catalog_product_category`: 
#

CREATE TABLE `catalog_product_category` (
  `product_id` INTEGER(11) DEFAULT NULL,
  `category_id` INTEGER(11) DEFAULT NULL,
  KEY `product_id` (`product_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `catalog_product_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `catalog_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `catalog_product_category_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `catalog_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `rights_auth_item`: 
#

CREATE TABLE `rights_auth_item` (
  `name` VARCHAR(64) COLLATE utf8_general_ci NOT NULL,
  `type` INTEGER(11) NOT NULL,
  `description` TEXT COLLATE utf8_general_ci,
  `bizrule` TEXT COLLATE utf8_general_ci,
  `data` TEXT COLLATE utf8_general_ci,
  PRIMARY KEY (`name`)
)ENGINE=InnoDB
AVG_ROW_LENGTH=431 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `rights_auth_assignment`: 
#

CREATE TABLE `rights_auth_assignment` (
  `itemname` VARCHAR(64) COLLATE utf8_general_ci NOT NULL,
  `userid` VARCHAR(64) COLLATE utf8_general_ci NOT NULL,
  `bizrule` TEXT COLLATE utf8_general_ci,
  `data` TEXT COLLATE utf8_general_ci,
  PRIMARY KEY (`itemname`, `userid`),
  CONSTRAINT `rights_auth_assignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `rights_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AVG_ROW_LENGTH=8192 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `rights_auth_item_child`: 
#

CREATE TABLE `rights_auth_item_child` (
  `parent` VARCHAR(64) COLLATE utf8_general_ci NOT NULL,
  `child` VARCHAR(64) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`),
  KEY `child` (`child`),
  CONSTRAINT `rights_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `rights_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rights_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `rights_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AVG_ROW_LENGTH=4096 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `rights_rights`: 
#

CREATE TABLE `rights_rights` (
  `itemname` VARCHAR(64) COLLATE utf8_general_ci NOT NULL,
  `type` INTEGER(11) NOT NULL,
  `weight` INTEGER(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `rights_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `user_profiles`: 
#

CREATE TABLE `user_profiles` (
  `user_id` INTEGER(11) NOT NULL,
  `lastname` VARCHAR(50) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `firstname` VARCHAR(50) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `birthday` DATE NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
)ENGINE=InnoDB
AVG_ROW_LENGTH=8192 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `user_profiles_fields`: 
#

CREATE TABLE `user_profiles_fields` (
  `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
  `varname` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `title` VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
  `field_type` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `field_size` INTEGER(3) NOT NULL DEFAULT 0,
  `field_size_min` INTEGER(3) NOT NULL DEFAULT 0,
  `required` INTEGER(1) NOT NULL DEFAULT 0,
  `match` VARCHAR(255) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `range` VARCHAR(255) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `error_message` VARCHAR(255) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `other_validator` VARCHAR(5000) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `default` VARCHAR(255) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `widget` VARCHAR(255) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `widgetparams` VARCHAR(5000) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `position` INTEGER(3) NOT NULL DEFAULT 0,
  `visible` INTEGER(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`, `widget`, `visible`)
)ENGINE=InnoDB
AUTO_INCREMENT=4 AVG_ROW_LENGTH=5461 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Структура для таблицы `tbl_migration`: 
#

CREATE TABLE `tbl_migration` (
  `version` VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
  `apply_time` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
)ENGINE=InnoDB
AVG_ROW_LENGTH=8192 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Data for the `rights_auth_item` table  (LIMIT -424,500)
#

INSERT INTO `rights_auth_item` (`name`, `type`, `description`, `bizrule`, `data`) VALUES 
  ('aaAdminMenu',0,'Доступ к меню администрации',NULL,'N;'),
  ('aaAdminRights',0,'Администрирование Прав',NULL,'N;'),
  ('aaCatalogAdmin',1,'Администрирование Каталога',NULL,'N;'),
  ('aaViewCatalog',1,'Просмотр Каталога',NULL,'N;'),
  ('admin',2,'Администратор',NULL,'N;'),
  ('Authenticated',2,'Авторизованный',' !Yii::app()->user->isGuest;','N;'),
  ('Catalog.Default.*',1,NULL,NULL,'N;'),
  ('Catalog.Default.Index',0,NULL,NULL,'N;'),
  ('Catalog.JCategory.*',1,NULL,NULL,'N;'),
  ('Catalog.JCategory.Admin',0,NULL,NULL,'N;'),
  ('Catalog.JCategory.Create',0,NULL,NULL,'N;'),
  ('Catalog.JCategory.Delete',0,NULL,NULL,'N;'),
  ('Catalog.JCategory.Index',0,NULL,NULL,'N;'),
  ('Catalog.JCategory.Update',0,NULL,NULL,'N;'),
  ('Catalog.JCategory.View',0,NULL,NULL,'N;'),
  ('Catalog.JPhoto.*',1,'Фото',NULL,'N;'),
  ('Catalog.JPhoto.Admin',0,NULL,NULL,'N;'),
  ('Catalog.JPhoto.Create',0,NULL,NULL,'N;'),
  ('Catalog.JPhoto.Delete',0,NULL,NULL,'N;'),
  ('Catalog.JPhoto.Index',0,NULL,NULL,'N;'),
  ('Catalog.JPhoto.Update',0,NULL,NULL,'N;'),
  ('Catalog.JPhoto.View',0,NULL,NULL,'N;'),
  ('Catalog.JProduct.*',1,NULL,NULL,'N;'),
  ('Catalog.JProduct.Admin',0,NULL,NULL,'N;'),
  ('Catalog.JProduct.Create',0,NULL,NULL,'N;'),
  ('Catalog.JProduct.Delete',0,NULL,NULL,'N;'),
  ('Catalog.JProduct.Index',0,NULL,NULL,'N;'),
  ('Catalog.JProduct.Update',0,NULL,NULL,'N;'),
  ('Catalog.JProduct.UpdatePhoto',0,NULL,NULL,'N;'),
  ('Catalog.JProduct.View',0,NULL,NULL,'N;'),
  ('Catalog.JVendor.*',1,NULL,NULL,'N;'),
  ('Catalog.JVendor.Admin',0,NULL,NULL,'N;'),
  ('Catalog.JVendor.Create',0,NULL,NULL,'N;'),
  ('Catalog.JVendor.Delete',0,NULL,NULL,'N;'),
  ('Catalog.JVendor.Index',0,NULL,NULL,'N;'),
  ('Catalog.JVendor.Update',0,NULL,NULL,'N;'),
  ('Catalog.JVendor.View',0,NULL,NULL,'N;'),
  ('CatalogAdmin',2,'Администратор Каталога',NULL,'N;'),
  ('Dealer',2,'Партнер',NULL,'N;'),
  ('Guest',2,'Гость',NULL,'N;'),
  ('Site.*',1,NULL,NULL,'N;'),
  ('Site.Contact',0,NULL,NULL,'N;'),
  ('Site.Error',0,NULL,NULL,'N;'),
  ('Site.Index',0,NULL,NULL,'N;'),
  ('User.Activation.*',1,NULL,NULL,'N;'),
  ('User.Activation.Activation',0,NULL,NULL,'N;'),
  ('User.Admin.*',1,NULL,NULL,'N;'),
  ('User.Admin.Admin',0,NULL,NULL,'N;'),
  ('User.Admin.Create',0,NULL,NULL,'N;'),
  ('User.Admin.Delete',0,NULL,NULL,'N;'),
  ('User.Admin.Update',0,NULL,NULL,'N;'),
  ('User.Admin.View',0,NULL,NULL,'N;'),
  ('User.Default.*',1,NULL,NULL,'N;'),
  ('User.Default.Index',0,NULL,NULL,'N;'),
  ('User.Login.*',1,NULL,NULL,'N;'),
  ('User.Login.Login',0,NULL,NULL,'N;'),
  ('User.Logout.*',1,NULL,NULL,'N;'),
  ('User.Logout.Logout',0,NULL,NULL,'N;'),
  ('User.Profile.*',1,NULL,NULL,'N;'),
  ('User.Profile.Changepassword',0,NULL,NULL,'N;'),
  ('User.Profile.Edit',0,NULL,NULL,'N;'),
  ('User.Profile.Profile',0,NULL,NULL,'N;'),
  ('User.ProfileField.*',1,NULL,NULL,'N;'),
  ('User.ProfileField.Admin',0,NULL,NULL,'N;'),
  ('User.ProfileField.Create',0,NULL,NULL,'N;'),
  ('User.ProfileField.Delete',0,NULL,NULL,'N;'),
  ('User.ProfileField.Update',0,NULL,NULL,'N;'),
  ('User.ProfileField.View',0,NULL,NULL,'N;'),
  ('User.Recovery.*',1,NULL,NULL,'N;'),
  ('User.Recovery.Recovery',0,NULL,NULL,'N;'),
  ('User.Registration.*',1,NULL,NULL,'N;'),
  ('User.Registration.Registration',0,NULL,NULL,'N;'),
  ('User.User.*',1,NULL,NULL,'N;'),
  ('User.User.Index',0,NULL,NULL,'N;'),
  ('User.User.View',0,NULL,NULL,'N;');
COMMIT;

#
# Data for the `rights_auth_assignment` table  (LIMIT -493,500)
#

INSERT INTO `rights_auth_assignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES 
  ('aaAdminMenu','1',NULL,'N;'),
  ('aaAdminMenu','3',NULL,'N;'),
  ('admin','1',NULL,'N;'),
  ('Authenticated','2',NULL,'N;'),
  ('CatalogAdmin','3',NULL,'N;'),
  ('Dealer','1',NULL,'N;');
COMMIT;

#
# Data for the `rights_auth_item_child` table  (LIMIT -465,500)
#

INSERT INTO `rights_auth_item_child` (`parent`, `child`) VALUES 
  ('aaCatalogAdmin','Catalog.JCategory.Admin'),
  ('aaCatalogAdmin','Catalog.JCategory.Create'),
  ('aaCatalogAdmin','Catalog.JCategory.Delete'),
  ('aaCatalogAdmin','Catalog.JCategory.Update'),
  ('aaCatalogAdmin','Catalog.JProduct.Admin'),
  ('aaCatalogAdmin','Catalog.JProduct.Create'),
  ('aaCatalogAdmin','Catalog.JProduct.Delete'),
  ('aaCatalogAdmin','Catalog.JProduct.Update'),
  ('aaCatalogAdmin','Catalog.JProduct.UpdatePhoto'),
  ('aaCatalogAdmin','Catalog.JVendor.Admin'),
  ('aaCatalogAdmin','Catalog.JVendor.Create'),
  ('aaCatalogAdmin','Catalog.JVendor.Delete'),
  ('aaCatalogAdmin','Catalog.JVendor.Update'),
  ('aaViewCatalog','Catalog.JCategory.Index'),
  ('aaViewCatalog','Catalog.JCategory.View'),
  ('aaViewCatalog','Catalog.JProduct.Index'),
  ('aaViewCatalog','Catalog.JProduct.View'),
  ('aaViewCatalog','Catalog.JVendor.Index'),
  ('aaViewCatalog','Catalog.JVendor.View'),
  ('Authenticated','aaViewCatalog'),
  ('Catalog.JPhoto.*','Catalog.JPhoto.Admin'),
  ('Catalog.JPhoto.*','Catalog.JPhoto.Create'),
  ('Catalog.JPhoto.*','Catalog.JPhoto.Delete'),
  ('Catalog.JPhoto.*','Catalog.JPhoto.Index'),
  ('Catalog.JPhoto.*','Catalog.JPhoto.Update'),
  ('Catalog.JPhoto.*','Catalog.JPhoto.View'),
  ('CatalogAdmin','aaCatalogAdmin'),
  ('CatalogAdmin','aaViewCatalog'),
  ('Dealer','aaViewCatalog'),
  ('Guest','aaViewCatalog'),
  ('Guest','Site.Contact'),
  ('Site.*','Site.Contact'),
  ('Site.*','Site.Error'),
  ('Site.*','Site.Index');
COMMIT;

#
# Data for the `user_profiles` table  (LIMIT -492,500)
#

INSERT INTO `user_profiles` (`user_id`, `lastname`, `firstname`, `birthday`) VALUES 
  (1,'Admin','Administrator','0000-00-00'),
  (2,'Demo','Demo','0000-00-00'),
  (3,'Иванов','Ваня','0000-00-00'),
  (4,'gggg','ffff','0000-00-00'),
  (5,'Иванов','Ваня','0000-00-00'),
  (6,'yyyyyyyy','fffff','0000-00-00'),
  (7,'ooooooooooo','hhhhhhhhh','0000-00-00');
COMMIT;

#
# Data for the `user_profiles_fields` table  (LIMIT -496,500)
#

INSERT INTO `user_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES 
  (1,'lastname','Last Name','VARCHAR',50,3,1,'','','Incorrect Last Name (length between 3 and 50 characters).','','','','',1,3),
  (2,'firstname','First Name','VARCHAR',50,3,1,'','','Incorrect First Name (length between 3 and 50 characters).','','','','',0,3),
  (3,'birthday','Birthday','DATE',0,0,2,'','','','','0000-00-00','UWjuidate','{\"ui-theme\":\"redmond\"}',3,2);
COMMIT;

#
# Data for the `user_users` table  (LIMIT -492,500)
#

INSERT INTO `user_users` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES 
  (1,'admin','21232f297a57a5a743894a0e4a801fc3','webmaster@example.com','9a24eff8c15a6a141ece27eb6947da0f',1261146094,1354295713,1,1),
  (2,'demo','fe01ce2a7fbac8fafaed7c982a04e229','demo@example.com','099f825543f7850cc038b90aaff39fac',1261146096,1354293587,0,1),
  (3,'catadmin','83bb40c46f13e535c852b2caeb9e2adc','ddd@ddd.com','de06d1d375c2f4866ddbf9867ecb2841',1354288293,1354295690,0,1),
  (4,'test1','827ccb0eea8a706c4c34a16891f84e7b','test1@test.com','16f1fdd7d50c7bc3f33e40117ee3741a',1354289348,1354289348,0,0),
  (5,'test2','ad0234829205b9033196ba818f7a872b','test2@test.com','f879f19d84502f8278650de1d3816505',1354296820,0,0,0),
  (6,'test3','9992295627e7e7162bdf77f14734acf8','test3@test.com','becb7ee39d702fd2d23c8b0dc374ec7f',1354297086,0,0,0),
  (7,'test4','86985e105f79b95d6bc918fb45ec7727','test4@test.com','2f35fb67ce29f6ba34b31064916a6fd4',1354297321,0,0,0);
COMMIT;

#
# Data for the `catalog_category` table  (LIMIT -483,500)
#

INSERT INTO `catalog_category` (`category_id`, `category_name`, `category_review`, `category_photodir`, `category_parent`, `category_lft`, `category_rgt`, `category_level`, `category_pic1`, `category_pic2`, `category_pic3`, `category_pic4`) VALUES 
  (1,'root',NULL,NULL,0,0,31,0,'1.jpg','2.jpg',NULL,NULL);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;