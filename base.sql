/*
SQLyog Community Edition- MySQL GUI v8.05 
MySQL - 5.5.5-10.1.26-MariaDB : Database - proyecto
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`proyecto` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `proyecto`;

/*Table structure for table `catproductos` */

DROP TABLE IF EXISTS `catproductos`;

CREATE TABLE `catproductos` (
  `id_cat_producto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_categoria` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `activo` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cat_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `catproductos` */

insert  into `catproductos`(`id_cat_producto`,`nom_categoria`,`activo`,`remember_token`,`created_at`,`updated_at`) values (1,'Limpieza','Si',NULL,NULL,NULL),(2,'Seguridad','Si',NULL,NULL,NULL);

/*Table structure for table `catservicios` */

DROP TABLE IF EXISTS `catservicios`;

CREATE TABLE `catservicios` (
  `id_cat_ser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_cate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activo` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cat_ser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `catservicios` */

insert  into `catservicios`(`id_cat_ser`,`nom_cate`,`activo`,`remember_token`,`created_at`,`updated_at`) values (1,'dfg','Si',NULL,NULL,NULL);

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombrecli` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `apacli` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `amacli` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correocli` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `telcli` int(11) NOT NULL,
  `genero` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `callecli` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `no_ext` int(11) NOT NULL,
  `no_int` int(11) NOT NULL,
  `colcli` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `locacli` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `muncli` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `id_es` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientes_id_es_foreign` (`id_es`),
  CONSTRAINT `clientes_id_es_foreign` FOREIGN KEY (`id_es`) REFERENCES `estados` (`id_es`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`nombrecli`,`apacli`,`amacli`,`archivo`,`correocli`,`telcli`,`genero`,`callecli`,`no_ext`,`no_int`,`colcli`,`locacli`,`muncli`,`cp`,`id_es`,`deleted_at`,`remember_token`,`created_at`,`updated_at`) values (1,'sergio','perez','caballero','20181214_013719_images.jpg','cv@gmail.com',21344345,'masculino','monte',1,2,'jesus','lomas','san ',12345,1,NULL,NULL,NULL,'2018-12-14 01:46:33'),(2,'sergio','perez','caballero','sinfoto.jpg','kkkk@gmail.com',2147483647,'masculino','Fuerza aerea',1,22,'fghj','TOLUCA','ji',50295,1,NULL,NULL,'2018-12-14 02:40:26','2018-12-14 02:40:26');

/*Table structure for table `empleados` */

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
  `id_emp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_emp` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `apa_emp` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ama_emp` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `rfc` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telemp` int(11) NOT NULL,
  `correo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `calle_emp` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `no_ext` int(11) NOT NULL,
  `no_int` int(11) NOT NULL,
  `colemp` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `locaemp` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `munemp` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `id_es` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_emp`),
  KEY `empleados_id_es_foreign` (`id_es`),
  CONSTRAINT `empleados_id_es_foreign` FOREIGN KEY (`id_es`) REFERENCES `estados` (`id_es`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `empleados` */

insert  into `empleados`(`id_emp`,`nombre_emp`,`apa_emp`,`ama_emp`,`rfc`,`archivo`,`telemp`,`correo`,`genero`,`calle_emp`,`no_ext`,`no_int`,`colemp`,`locaemp`,`munemp`,`cp`,`id_es`,`deleted_at`,`remember_token`,`created_at`,`updated_at`) values (1,'dfg','fgh','fgh','gh','fgh',0,'dfg','fg','df',0,0,'fg','df','fg',0,1,NULL,NULL,NULL,NULL),(2,'sergio','perez','caballero','ABCD123456AS3','20181214_051738_chivol.jpg',2147483647,'kkkk@gmail.com','','tollocan',23,23,'wedfghj','TOLUCA','mumu',50295,2,NULL,NULL,'2018-12-14 05:17:39','2018-12-14 05:17:39'),(3,'sergio','perez','caballero','ABCD123456AS3','sinfoto.jpg',2147483647,'kkkk@gmail.com','','qwertyuiop',1,22,'wedfghj','TOLUCA','FGHJ',50295,2,'2018-12-14 05:33:31',NULL,'2018-12-14 05:20:24','2018-12-14 05:33:31'),(4,'sergio','perez','caballero','ABCD123456AS3','sinfoto.jpg',2147483647,'kkkk@gmail.com','masculino','h',6,22,'wedfghj','TOLUCA','ghjkl',50295,2,NULL,NULL,'2018-12-14 05:22:01','2018-12-14 05:33:02');

/*Table structure for table `empresas` */

DROP TABLE IF EXISTS `empresas`;

CREATE TABLE `empresas` (
  `id_empresa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_empresa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activo` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `empresas` */

insert  into `empresas`(`id_empresa`,`nombre_empresa`,`tipo_empresa`,`activo`,`deleted_at`,`remember_token`,`created_at`,`updated_at`) values (1,'we','sdf','Si',NULL,NULL,NULL,'2018-12-14 05:51:58'),(2,'barcel','botana','No',NULL,NULL,'2018-12-14 05:46:51','2018-12-14 05:51:06');

/*Table structure for table `estados` */

DROP TABLE IF EXISTS `estados`;

CREATE TABLE `estados` (
  `id_es` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activo` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_es`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `estados` */

insert  into `estados`(`id_es`,`estado`,`activo`,`remember_token`,`created_at`,`updated_at`) values (1,'sdfgh','Si',NULL,NULL,NULL),(2,'mexico','Si',NULL,NULL,NULL);

/*Table structure for table `marcaproductos` */

DROP TABLE IF EXISTS `marcaproductos`;

CREATE TABLE `marcaproductos` (
  `id_marca` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_marca` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `activo` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `marcaproductos` */

insert  into `marcaproductos`(`id_marca`,`nom_marca`,`activo`,`remember_token`,`created_at`,`updated_at`) values (1,'Trupper','Si',NULL,NULL,NULL),(2,'Impacter','Si',NULL,NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2018_10_04_041413_catservicios',1),('2018_10_04_042309_empresas',1),('2018_10_04_042936_catproductos',1),('2018_10_04_043430_marcaproductos',1),('2018_11_26_234331_users',1),('2018_12_13_220238_estados',1),('2018_10_04_001043_clientes',2),('2018_10_11_231704_empleados',2),('2018_10_11_233141_proveedores',2),('2018_10_12_000050_productos',3),('2018_10_12_034639_servicios',3),('2018_10_12_035819_pedidos',4);

/*Table structure for table `pedidos` */

DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos` (
  `id_pedido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_pedido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_entrega` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_prov` int(10) unsigned NOT NULL,
  `id_prod` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `pedidos_id_prov_foreign` (`id_prov`),
  KEY `pedidos_id_prod_foreign` (`id_prod`),
  CONSTRAINT `pedidos_id_prod_foreign` FOREIGN KEY (`id_prod`) REFERENCES `productos` (`id_prod`),
  CONSTRAINT `pedidos_id_prov_foreign` FOREIGN KEY (`id_prov`) REFERENCES `proveedores` (`id_prov`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pedidos` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id_prod` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_prod` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_prod` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Existencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `costo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_m` int(11) NOT NULL,
  `contenido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activo` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `id_marca` int(10) unsigned NOT NULL,
  `id_cat_producto` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_prod`),
  KEY `productos_id_marca_foreign` (`id_marca`),
  KEY `productos_id_cat_producto_foreign` (`id_cat_producto`),
  CONSTRAINT `productos_id_cat_producto_foreign` FOREIGN KEY (`id_cat_producto`) REFERENCES `catproductos` (`id_cat_producto`),
  CONSTRAINT `productos_id_marca_foreign` FOREIGN KEY (`id_marca`) REFERENCES `marcaproductos` (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `productos` */

insert  into `productos`(`id_prod`,`nombre_prod`,`archivo`,`descripcion_prod`,`Existencia`,`costo`,`u_m`,`contenido`,`activo`,`id_marca`,`id_cat_producto`,`deleted_at`,`remember_token`,`created_at`,`updated_at`) values (1,'fabuloso','sdf','lentes de platico anti rayaduras','100','150',0,'100','Si',1,1,NULL,'',NULL,NULL),(2,'cascos ','20181214_013719_images.jpg','cascos de diferentes colores.','50','250',0,'25','si',1,2,NULL,NULL,NULL,NULL),(3,'Abrillantador de pizo','20181214_013719_images.jpg','Abrillantados de superficies.','20','85',0,'100','si',2,1,NULL,NULL,NULL,NULL),(4,'Asmorol','sinfoto.jpg','Abrillantador para llantas.','15','55',0,'20','si',2,1,NULL,NULL,NULL,NULL),(5,'clorox','sinfoto.jpg','','Ninguna','',1,'','',2,1,NULL,NULL,'2019-03-13 21:52:34','2019-03-13 21:52:34'),(6,'bicarbonato','sinfoto.jpg','','Ninguna','',1,'','',2,1,NULL,NULL,'2019-03-13 22:05:08','2019-03-13 22:05:08');

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `id_prov` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_prov` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `apa_prov` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ama_prov` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo_prov` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `tel_prov` int(11) NOT NULL,
  `genero` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `calle_prov` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `no_ext` int(11) NOT NULL,
  `no_int` int(11) NOT NULL,
  `col_prov` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `loca_prov` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `mun_prov` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `esta_prov` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `id_es` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_prov`),
  KEY `proveedores_id_es_foreign` (`id_es`),
  CONSTRAINT `proveedores_id_es_foreign` FOREIGN KEY (`id_es`) REFERENCES `estados` (`id_es`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `proveedores` */

insert  into `proveedores`(`id_prov`,`nombre_prov`,`apa_prov`,`ama_prov`,`archivo`,`correo_prov`,`tel_prov`,`genero`,`calle_prov`,`no_ext`,`no_int`,`col_prov`,`loca_prov`,`mun_prov`,`esta_prov`,`cp`,`id_es`,`deleted_at`,`remember_token`,`created_at`,`updated_at`) values (1,'F','dfg','f','20181214_061449_download (1).jpg','fghq@gmail.com',23432434,'femenino','fg',0,0,'fg','fg','fg','fg',2332,2,NULL,NULL,NULL,'2018-12-14 06:14:49'),(2,'sergio','perez','manuellito','sinfoto.jpg','dfghjk@m.com',2147483647,'masculino','r',4,1,'san pablo','TOLUCA','autopan','',50295,2,NULL,NULL,'2018-12-14 06:01:55','2018-12-14 06:01:55');

/*Table structure for table `servicios` */

DROP TABLE IF EXISTS `servicios`;

CREATE TABLE `servicios` (
  `id_ser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_ser` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_ser` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_solicitud_ser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio_ser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_fin_ser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_empresa` int(10) unsigned NOT NULL,
  `id_emp` int(10) unsigned NOT NULL,
  `id_cat_ser` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ser`),
  KEY `servicios_id_empresa_foreign` (`id_empresa`),
  KEY `servicios_id_emp_foreign` (`id_emp`),
  KEY `servicios_id_cat_ser_foreign` (`id_cat_ser`),
  CONSTRAINT `servicios_id_cat_ser_foreign` FOREIGN KEY (`id_cat_ser`) REFERENCES `catservicios` (`id_cat_ser`),
  CONSTRAINT `servicios_id_emp_foreign` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id_emp`),
  CONSTRAINT `servicios_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `servicios` */

insert  into `servicios`(`id_ser`,`nombre_ser`,`descripcion_ser`,`fecha_solicitud_ser`,`fecha_inicio_ser`,`fecha_fin_ser`,`id_empresa`,`id_emp`,`id_cat_ser`,`deleted_at`,`remember_token`,`created_at`,`updated_at`) values (1,'sd','df','df','df','fg',1,1,1,NULL,NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id_user`,`nombre_user`,`contrasena`,`correo`,`tipo_user`,`remember_token`,`created_at`,`updated_at`) values (1,'jio','12345','wer','Admin',NULL,NULL,NULL),(2,'ser','12345','q','usuario',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
