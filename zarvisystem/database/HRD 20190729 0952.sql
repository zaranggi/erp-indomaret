-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.14-MariaDB-1:10.3.14+maria~bionic-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema hrd
--

CREATE DATABASE IF NOT EXISTS hrd;
USE hrd;

--
-- Definition of table `bck`
--

DROP TABLE IF EXISTS `bck`;
CREATE TABLE `bck` (
  `id` int(10) unsigned NOT NULL DEFAULT 0,
  `id_jabatan` smallint(5) DEFAULT 0,
  `id_dep` smallint(5) DEFAULT 0,
  `id_atasan` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nik` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `regency` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_blocked` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bck`
--

/*!40000 ALTER TABLE `bck` DISABLE KEYS */;
INSERT INTO `bck` (`id`,`id_jabatan`,`id_dep`,`id_atasan`,`name`,`password`,`email`,`username`,`nik`,`phone`,`whatsapp`,`address`,`province`,`regency`,`district`,`note`,`is_blocked`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (2265,34,31,'0','BUDIMAN','',NULL,'1998000104','1998000104',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2254,34,31,'0','AGUS SUBAGIO','',NULL,'1998000725','1998000725',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2036,34,31,'0','SINGGIH EHRDIANTO','',NULL,'1999004043','1999004043',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2083,34,31,'0','DENI ARY WAHYUDI','',NULL,'2001001701','2001001701',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1949,34,31,'0','BASUKI','',NULL,'2004002725','2004002725',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1943,34,31,'0','ANDHIKA RESPATI BAGASWARA','',NULL,'2013020270','2013020270',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2120,34,31,'0','ARIF DARMAWAN','',NULL,'2013030174','2013030174',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2180,34,31,'0','PANJI PRASETIYO','',NULL,'2013116895','2013116895',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2034,34,31,'0','SAMUEL GIAN LUCA ENDICO','',NULL,'2015027708','2015027708',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bck` ENABLE KEYS */;


--
-- Definition of table `cabang`
--

DROP TABLE IF EXISTS `cabang`;
CREATE TABLE `cabang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(4) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(45) NOT NULL,
  `provinsi` varchar(45) DEFAULT NULL,
  `tlp1` varchar(45) DEFAULT NULL,
  `tlp2` varchar(45) DEFAULT NULL,
  `fax1` varchar(45) DEFAULT NULL,
  `fax2` varchar(45) DEFAULT NULL,
  `buka` date DEFAULT NULL,
  `tutup` date DEFAULT NULL,
  `kont_awal` date DEFAULT NULL,
  `kont_akhir` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`,`kode`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cabang`
--

/*!40000 ALTER TABLE `cabang` DISABLE KEYS */;
INSERT INTO `cabang` (`id`,`kode`,`nama`,`alamat`,`kota`,`provinsi`,`tlp1`,`tlp2`,`fax1`,`fax2`,`buka`,`tutup`,`kont_awal`,`kont_akhir`,`created_at`,`updated_at`) VALUES 
 (1,'C001','Cabang Jember','Perum. Graha Permata Indah Blok i-4','Jember','Jawa Timur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-08-02 15:51:32','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `cabang` ENABLE KEYS */;


--
-- Definition of table `company_profile`
--

DROP TABLE IF EXISTS `company_profile`;
CREATE TABLE `company_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` varchar(45) DEFAULT NULL,
  `provinsi` varchar(45) DEFAULT NULL,
  `zipcode` varchar(45) DEFAULT NULL,
  `tlp1` varchar(45) DEFAULT NULL,
  `fax1` varchar(45) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_profile`
--

/*!40000 ALTER TABLE `company_profile` DISABLE KEYS */;
INSERT INTO `company_profile` (`id`,`nama`,`email`,`deskripsi`,`alamat`,`kota`,`provinsi`,`zipcode`,`tlp1`,`fax1`,`logo`,`created_at`,`updated_at`) VALUES 
 (1,'PT. Sintesa Citra Abadi','admin@sintesacitraabadi.co.id','Detail tentang About us Perusahaan<br>','Jl. Mawar','Jember','Jawa Timur','68121','','','','2019-06-23 16:43:04','2019-06-22 11:06:04');
/*!40000 ALTER TABLE `company_profile` ENABLE KEYS */;


--
-- Definition of table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_subdep` int(10) unsigned NOT NULL,
  `name_department` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`id`,`id_subdep`,`name_department`) VALUES 
 (1,0,'EDP'),
 (11,0,'CASHIER AMBASSADOR'),
 (12,0,'FINANCE - REG'),
 (13,0,'FRANCHISING'),
 (22,0,'IDM I - MOBILE JEMBER'),
 (23,0,'LICENSE'),
 (24,0,'LOCATION'),
 (25,0,'MERCHANDISING'),
 (26,0,'PROJECT'),
 (30,0,'VIRTUAL ADMINISTRATION'),
 (31,0,'DEVELOPMENT'),
 (32,0,'CABANG JEMBER'),
 (33,0,'HRD'),
 (34,0,'GA'),
 (35,0,'TAX'),
 (36,0,'ACCOUNTING'),
 (37,0,'AREA'),
 (38,0,'INVENTORY CONTROL');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;


--
-- Definition of table `department_bck`
--

DROP TABLE IF EXISTS `department_bck`;
CREATE TABLE `department_bck` (
  `id` int(10) unsigned NOT NULL DEFAULT 0,
  `id_subdep` int(10) unsigned NOT NULL,
  `name_department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_bck`
--

/*!40000 ALTER TABLE `department_bck` DISABLE KEYS */;
INSERT INTO `department_bck` (`id`,`id_subdep`,`name_department`) VALUES 
 (1,0,'EDP'),
 (7,0,'ACCOUNTING - FRC'),
 (8,0,'ACCOUNTING - REG'),
 (9,0,'AREA - OPERATION'),
 (10,0,'AREA INVENTORY'),
 (11,0,'CASHIER AMBASSADOR'),
 (12,0,'FINANCE - REG'),
 (13,0,'FRANCHISING'),
 (14,0,'GA - ADMINISTRATION'),
 (15,0,'GA - ASSETS'),
 (16,0,'GA - BUILDING MANAGEMENT'),
 (17,0,'GA - SECURITY'),
 (18,0,'GA - VEHICLE'),
 (19,0,'HR - ADMINISTRATION & BENEFIT I'),
 (20,0,'HR - ADMINISTRATION & BENEFIT II'),
 (21,0,'HR - RECRUITMENT & PLACEMENT'),
 (22,0,'IDM I - MOBILE JEMBER'),
 (23,0,'LICENSE'),
 (24,0,'LOCATION'),
 (25,0,'MERCHANDISING'),
 (26,0,'PROJECT'),
 (27,0,'TAX - FRC'),
 (28,0,'TAX - REGULER'),
 (29,0,'TRAINING CENTER'),
 (30,0,'VIRTUAL ADMINISTRATION'),
 (31,0,'DEVELOPMENT'),
 (32,0,'CABANG JEMBER'),
 (33,0,'HRD'),
 (34,0,'GA'),
 (35,0,'TAX'),
 (36,0,'ACCOUNTING'),
 (37,0,'AREA');
/*!40000 ALTER TABLE `department_bck` ENABLE KEYS */;


--
-- Definition of table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts` (
  `id` char(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `regency_id` char(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;


--
-- Definition of table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_content` mediumtext DEFAULT NULL,
  `event_title` text DEFAULT NULL,
  `event_author` varchar(50) NOT NULL DEFAULT '0',
  `event_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `event_status` varchar(20) NOT NULL DEFAULT 'publish',
  `images` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`id`,`event_content`,`event_title`,`event_author`,`event_date`,`due_date`,`event_status`,`images`,`created_at`,`updated_at`) VALUES 
 (1,'test event<br>','Test Event','Donny Irianto Anggriawan','2019-06-01','2019-06-29','Y',NULL,'2019-06-22 10:46:57','2019-06-22 10:46:57');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;


--
-- Definition of table `homes`
--

DROP TABLE IF EXISTS `homes`;
CREATE TABLE `homes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `homes`
--

/*!40000 ALTER TABLE `homes` DISABLE KEYS */;
/*!40000 ALTER TABLE `homes` ENABLE KEYS */;


--
-- Definition of table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `name_jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` (`id_jabatan`,`name_jabatan`) VALUES 
 (12,'Administrator'),
 (31,'Branch Manager'),
 (32,'Deputi Branch Manager Opr'),
 (33,'Deputi Branch Manager Adm'),
 (34,'Manager'),
 (35,'Supervisor'),
 (36,'Senior Clerk'),
 (37,'Clerk'),
 (38,'Acting Junior Supervisor'),
 (39,'Baker'),
 (40,'Baking Trainer'),
 (41,'Driver'),
 (42,'Duta Kasir Indomaret'),
 (43,'Junior Supervisor'),
 (44,'Kasir Pembimbing'),
 (45,'Kasir Sales'),
 (46,'Kasir Terampil'),
 (47,'Kepala Regu'),
 (48,'Kepala Toko'),
 (49,'Mekanik'),
 (50,'Merchandiser'),
 (51,'Receptionist'),
 (52,'Satpam'),
 (53,'Senior Baker'),
 (55,'Surveyor'),
 (56,'Teknisi'),
 (57,'Trainer');
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;


--
-- Definition of table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `urut` int(3) NOT NULL DEFAULT 0,
  `id_main` int(10) unsigned NOT NULL DEFAULT 0,
  `id_submain` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(25) DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `adminmenu` enum('Y','N') NOT NULL DEFAULT 'Y',
  `id_dep` text DEFAULT NULL,
  `auth_access` text DEFAULT NULL,
  `auth_add` text DEFAULT NULL,
  `auth_update` text DEFAULT NULL,
  `auth_delete` text DEFAULT NULL,
  `auth_upload` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`,`name_menu`,`link`,`urut`,`id_main`,`id_submain`,`icon`,`active`,`adminmenu`,`id_dep`,`auth_access`,`auth_add`,`auth_update`,`auth_delete`,`auth_upload`) VALUES 
 (2,'Manage Menu','menu',0,0,0,'stack3','Y','Y','#1#','#12#','#12#','#12#','#12#','#12#'),
 (29,'Manage Users','#',92,0,0,'users4','Y','Y','#36# #37# #32# #11# #31# #1# #12# #13# #34# #33# #22# #23# #24# #25# #26# #35# #30##38#','#38# #12# #39# #40# #31# #37# #33# #32# #41# #42# #43# #44# #45# #46# #47# #48# #34# #49# #50# #51# #52# #53# #36# #35# #55# #56# #57##36#','#12#','#12#','#12#','#12#'),
 (30,'Users','users',1,29,0,NULL,'Y','Y','#1#','#12#','#12#','#12#','#12#','#12#'),
 (43,'Profile','profile',2,29,0,NULL,'Y','Y','#36# #37# #32# #11# #31# #1# #12# #13# #34# #33# #22# #23# #24# #25# #26# #35# #30##38#','#38# #12# #39# #40# #31# #37# #33# #32# #41# #42# #43# #44# #45# #46# #47# #48# #34# #49# #50# #51# #52# #53# #36# #35# #55# #56# #57#','','#38# #12# #39# #40# #31# #37# #33# #32# #41# #42# #43# #44# #45# #46# #47# #48# #34# #49# #50# #51# #52# #53# #36# #35# #55# #56# #57#','#12#','#12#'),
 (83,'Home','home',0,0,0,'office','Y','Y','#36# #37# #32# #11# #31# #1# #12# #13# #34# #33# #22# #23# #24# #25# #26# #35# #30##38#','#38# #12# #39# #40# #31# #37# #33# #32# #41# #42# #43# #44# #45# #46# #47# #48# #34# #49# #50# #51# #52# #53# #36# #35# #55# #56# #57##36#','','','#12#','#12#'),
 (90,'Jabatan','jabatan',0,29,0,NULL,'N','Y','#1#','#12#','#12#','#12#','#12#','#12#'),
 (102,'Company Profile','cv',0,98,0,NULL,'Y','Y','#1#','#12# #31#','#12# #31#','#12# #31#','#12# #31#','#12# #31#'),
 (109,'Manage Menu','menufront',0,98,0,NULL,'Y','Y','#1#','#12# #31#','#12# #31#','#12# #31#','#12# #31#','#12# #31#'),
 (110,'Surat Perintah Lembur','#',0,0,0,'envelop4','Y','Y','#36# #37# #32# #11# #31# #1# #12# #13# #34# #33# #22# #23# #24# #25# #26# #35# #30##38#','#38# #12# #39# #40# #31# #37# #33# #32# #41# #42# #43# #44# #45# #46# #47# #48# #34# #49# #50# #51# #52# #53# #36# #35# #55# #56# #57##36#','','','',''),
 (111,'Pengajuan SPL','spl',0,110,0,NULL,'Y','Y','#36# #37# #32# #11# #31# #1# #12# #13# #34# #33# #22# #23# #24# #25# #26# #35# #30##38#','#12# #39# #40# #37# #41# #42# #44# #45# #46# #47# #48# #49# #50# #51# #52# #53# #36# #55# #56# #57#','#38# #39# #40# #37# #41# #42# #44# #45# #46# #47# #48# #49# #50# #51# #52# #53# #36# #55# #56# #57#','','',''),
 (112,'Karyawan','karyawan',0,29,0,NULL,'Y','Y','#33#','#12# #37# #43# #34# #36# #35#','#12# #37# #43# #34# #36# #35#','#12# #37# #43# #34# #36# #35#','#12#','#12#'),
 (113,'Pending SPL','pendspl',0,110,0,NULL,'Y','Y','#36# #37# #32# #11# #31# #1# #12# #13# #34# #33# #22# #23# #24# #25# #26# #35# #30##38#','#38# #12# #39# #40# #31# #37# #33# #32# #41# #42# #43# #44# #45# #46# #47# #48# #34# #49# #50# #51# #52# #53# #36# #35# #55# #56# #57#','','#12# #34# #35#','',''),
 (114,'Approved SPL','apspl',0,110,0,NULL,'Y','Y','#36# #37# #32# #11# #31# #1# #12# #13# #34# #33# #22# #23# #24# #25# #26# #35# #30##38#','#38# #12# #39# #40# #31# #37# #33# #32# #41# #42# #43# #44# #45# #46# #47# #48# #34# #49# #50# #51# #52# #53# #36# #35# #55# #56# #57#','','','',''),
 (115,'Reject Spl','rejectspl',0,110,0,NULL,'Y','Y','#36# #37# #32# #11# #31# #1# #12# #13# #34# #33# #22# #23# #24# #25# #26# #35# #30##38#','#38# #12# #39# #40# #31# #37# #33# #32# #41# #42# #43# #44# #45# #46# #47# #48# #34# #49# #50# #51# #52# #53# #36# #35# #55# #56# #57#','','','',''),
 (116,'Trend Spl','trendspl',0,110,0,NULL,'Y','Y','#32# #1# #33#','#38# #12# #31# #33# #32# #34# #35#','','','',''),
 (117,'Report SPL','hisspl',0,110,0,NULL,'Y','Y','#36# #37# #32# #11# #31# #1# #12# #13# #34# #33# #22# #38# #23# #24# #25# #26# #35# #30#','#38# #12# #39# #40# #31# #37# #33# #32# #41# #42# #43# #44# #45# #46# #47# #48# #34# #49# #50# #51# #52# #53# #36# #35# #55# #56# #57#','','','',''),
 (118,'Pengajuan Dana OPR','#',0,0,0,'clippy','Y','Y','#32# #1#','#12# #33# #34# #35#','#12# #33# #34# #35#','#12# #33# #34# #36#','#12#','#12#'),
 (119,'Pengajuan Dana','pdopr',0,118,0,NULL,'Y','Y','#36# #37# #32# #11# #31# #1# #12# #13# #34# #33# #22# #38# #23# #24# #25# #26# #35# #30#','#12# #31# #33# #32# #34# #35#','#12# #35#','#12# #35#','#12#','#12#'),
 (120,'List PDO','listpdo',0,118,0,NULL,'Y','Y','#36# #37# #32# #11# #31# #1# #12# #13# #34# #33# #22# #38# #23# #24# #25# #26# #35# #30#','#12# #33# #34# #35#','#12# #33# #34# #35#','#12# #33# #34# #35#','#12#','#12#'),
 (121,'Report PDO','rpdo',0,118,0,NULL,'Y','Y','#36# #37# #32# #11# #31# #1# #12# #13# #34# #33# #22# #38# #23# #24# #25# #26# #35# #30#','#12# #31# #33# #32# #34# #35#','','','',''),
 (122,'Toko Sewa','#',0,0,0,'store2','Y','Y','#32# #1#','#12# #33#','','','',''),
 (123,'Daftar Sewa','toko',0,122,0,NULL,'Y','Y','#32# #1#','#12# #33#','#12#','#12#','#12#','');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


--
-- Definition of table `menu_front`
--

DROP TABLE IF EXISTS `menu_front`;
CREATE TABLE `menu_front` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `urut` int(3) NOT NULL DEFAULT 0,
  `id_main` int(10) unsigned NOT NULL DEFAULT 0,
  `id_submain` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(25) DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_front`
--

/*!40000 ALTER TABLE `menu_front` DISABLE KEYS */;
INSERT INTO `menu_front` (`id`,`name_menu`,`link`,`urut`,`id_main`,`id_submain`,`icon`,`active`) VALUES 
 (1,'Home','home',0,0,0,NULL,'Y'),
 (2,'Product','product',0,0,0,NULL,'Y'),
 (3,'Portofolio','portofolio',0,0,0,NULL,'Y'),
 (4,'Events','events',0,0,0,NULL,'Y'),
 (5,'Contact Us','contactus',0,0,0,NULL,'Y');
/*!40000 ALTER TABLE `menu_front` ENABLE KEYS */;


--
-- Definition of table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`,`batch`) VALUES 
 ('2014_10_12_000000_create_users_table',1),
 ('2014_10_12_100000_create_password_resets_table',1),
 ('2015_12_28_110927_create_homes_table',2),
 ('2018_05_11_085933_create_model_users_table',3),
 ('2018_07_27_133249_create_invites_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


--
-- Definition of table `model_users`
--

DROP TABLE IF EXISTS `model_users`;
CREATE TABLE `model_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_users`
--

/*!40000 ALTER TABLE `model_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_users` ENABLE KEYS */;


--
-- Definition of table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


--
-- Definition of table `pdo_mstran`
--

DROP TABLE IF EXISTS `pdo_mstran`;
CREATE TABLE `pdo_mstran` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_dep` tinyint(2) unsigned NOT NULL,
  `kode_trx` varchar(25) NOT NULL,
  `id_akun` int(10) unsigned NOT NULL,
  `nama_akun` varchar(50) DEFAULT NULL,
  `tanggal_pdo` date NOT NULL,
  `rp_pengajuan` decimal(18,0) NOT NULL DEFAULT 0,
  `rp_realisasi` decimal(18,0) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`tanggal_pdo`,`id_dep`,`kode_trx`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdo_mstran`
--

/*!40000 ALTER TABLE `pdo_mstran` DISABLE KEYS */;
INSERT INTO `pdo_mstran` (`id`,`id_dep`,`kode_trx`,`id_akun`,`nama_akun`,`tanggal_pdo`,`rp_pengajuan`,`rp_realisasi`,`created_at`,`updated_at`) VALUES 
 (1,1,'PDO0001-1-VII-2019',1,'Biaya Gaji ','2019-07-29','6000000000','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (2,1,'PDO0001-1-VII-2019',2,'Biaya Pengobatan ','2019-07-29','0','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (3,1,'PDO0001-1-VII-2019',3,'Biaya Insentif','2019-07-29','0','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (4,1,'PDO0001-1-VII-2019',4,'Operational Departemen','2019-07-29','100000000','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (5,1,'PDO0001-1-VII-2019',5,'Supplier HD ','2019-07-29','0','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (6,1,'PDO0001-1-VII-2019',6,'Supplier NHD ','2019-07-29','0','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (7,1,'PDO0001-1-VII-2019',7,'Biaya Listrik ','2019-07-29','0','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (8,1,'PDO0001-1-VII-2019',8,'Biaya Telepon & Fax','2019-07-29','0','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (9,1,'PDO0001-1-VII-2019',9,'Pembayaran TAX ( PAJAK )','2019-07-29','500000000','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (10,1,'PDO0001-1-VII-2019',10,'Pembayaran Surplus Kas','2019-07-29','0','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (11,1,'PDO0001-1-VII-2019',11,'Top Up Transaksi Virtual','2019-07-29','0','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (12,1,'PDO0001-1-VII-2019',12,'LPD/LPM','2019-07-29','0','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (13,1,'PDO0001-1-VII-2019',13,'Tagihan Frc','2019-07-29','0','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (14,1,'PDO0001-1-VII-2019',14,'Tagihan Belum TTF & Sudah TTF','2019-07-29','0','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (15,1,'PDO0001-1-VII-2019',15,'by operasional taxforce','2019-07-29','5000000','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (16,1,'PDO0001-1-VII-2019',16,'Lain - lain','2019-07-29','0','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (17,1,'PDO0002-1-VII-2019',1,'Biaya Gaji ','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (18,1,'PDO0002-1-VII-2019',2,'Biaya Pengobatan ','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (19,1,'PDO0002-1-VII-2019',3,'Biaya Insentif','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (20,1,'PDO0002-1-VII-2019',4,'Operational Departemen','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (21,1,'PDO0002-1-VII-2019',5,'Supplier HD ','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (22,1,'PDO0002-1-VII-2019',6,'Supplier NHD ','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (23,1,'PDO0002-1-VII-2019',7,'Biaya Listrik ','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (24,1,'PDO0002-1-VII-2019',8,'Biaya Telepon & Fax','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (25,1,'PDO0002-1-VII-2019',9,'Pembayaran TAX ( PAJAK )','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (26,1,'PDO0002-1-VII-2019',10,'Pembayaran Surplus Kas','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (27,1,'PDO0002-1-VII-2019',11,'Top Up Transaksi Virtual','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (28,1,'PDO0002-1-VII-2019',12,'LPD/LPM','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (29,1,'PDO0002-1-VII-2019',13,'Tagihan Frc','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (30,1,'PDO0002-1-VII-2019',14,'Tagihan Belum TTF & Sudah TTF','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (31,1,'PDO0002-1-VII-2019',15,'BY OPR EDP','2019-07-29','3000000','0','2019-07-29 09:40:20','0000-00-00 00:00:00'),
 (32,1,'PDO0002-1-VII-2019',16,'Lain - lain','2019-07-29','0','0','2019-07-29 09:40:20','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `pdo_mstran` ENABLE KEYS */;


--
-- Definition of table `pdo_status`
--

DROP TABLE IF EXISTS `pdo_status`;
CREATE TABLE `pdo_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `progress` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdo_status`
--

/*!40000 ALTER TABLE `pdo_status` DISABLE KEYS */;
INSERT INTO `pdo_status` (`id`,`progress`) VALUES 
 (1,'Pengajuan'),
 (2,'Approved by Manager'),
 (3,'Rejected by Manager'),
 (4,'Approved by DBM'),
 (5,'Rejected by DBM');
/*!40000 ALTER TABLE `pdo_status` ENABLE KEYS */;


--
-- Definition of table `pdopr_akun`
--

DROP TABLE IF EXISTS `pdopr_akun`;
CREATE TABLE `pdopr_akun` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdopr_akun`
--

/*!40000 ALTER TABLE `pdopr_akun` DISABLE KEYS */;
INSERT INTO `pdopr_akun` (`id`,`nama`,`created_at`,`updated_at`) VALUES 
 (1,'Biaya Gaji ','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2,'Biaya Pengobatan ','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (3,'Biaya Insentif','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (4,'Operational Departemen','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (5,'Supplier HD ','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (6,'Supplier NHD ','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (7,'Biaya Listrik ','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (8,'Biaya Telepon & Fax','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (9,'Pembayaran TAX ( PAJAK )','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (10,'Pembayaran Surplus Kas','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (11,'Top Up Transaksi Virtual','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (12,'LPD/LPM','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (13,'Tagihan Frc','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (14,'Tagihan Belum TTF & Sudah TTF','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (15,'Uang Muka per departemen','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (16,'Lain - lain','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `pdopr_akun` ENABLE KEYS */;


--
-- Definition of table `pdopr_transaksi`
--

DROP TABLE IF EXISTS `pdopr_transaksi`;
CREATE TABLE `pdopr_transaksi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_dep` int(10) unsigned NOT NULL,
  `kode_trx` varchar(50) DEFAULT NULL,
  `minggu` tinyint(1) DEFAULT 1,
  `nik_spv` varchar(10) NOT NULL,
  `nama_spv` varchar(50) NOT NULL,
  `nik_mgr` varchar(10) NOT NULL,
  `nama_mgr` varchar(50) NOT NULL,
  `nik_dbm` varchar(10) NOT NULL,
  `nama_dbm` varchar(50) NOT NULL,
  `tanggal_pdo` date NOT NULL,
  `status_pdo` tinyint(1) NOT NULL DEFAULT 0,
  `tanggal_pdo_spv` date NOT NULL,
  `tanggal_pdo_mgr` date NOT NULL,
  `tanggal_pdo_dbm` date NOT NULL,
  `total_pdo` decimal(18,0) NOT NULL DEFAULT 0,
  `total_realisasi` decimal(18,0) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`,`id_dep`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdopr_transaksi`
--

/*!40000 ALTER TABLE `pdopr_transaksi` DISABLE KEYS */;
INSERT INTO `pdopr_transaksi` (`id`,`id_dep`,`kode_trx`,`minggu`,`nik_spv`,`nama_spv`,`nik_mgr`,`nama_mgr`,`nik_dbm`,`nama_dbm`,`tanggal_pdo`,`status_pdo`,`tanggal_pdo_spv`,`tanggal_pdo_mgr`,`tanggal_pdo_dbm`,`total_pdo`,`total_realisasi`,`created_at`,`updated_at`) VALUES 
 (1,1,'PDO0001-1-VII-2019',1,'7777777777','Donny Irianto Anggriawan','2005008378','','','','2019-07-29',1,'2019-07-29','0000-00-00','0000-00-00','6605000000','0','2019-07-29 08:50:30','0000-00-00 00:00:00'),
 (2,1,'PDO0002-1-VII-2019',1,'2005008378','DHANIEL WHARDANA','2001001701','','','','2019-07-29',1,'2019-07-29','0000-00-00','0000-00-00','3000000','0','2019-07-29 09:40:20','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `pdopr_transaksi` ENABLE KEYS */;


--
-- Definition of table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_category` bigint(20) DEFAULT NULL,
  `post_author` varchar(50) NOT NULL DEFAULT '0',
  `post_date` datetime DEFAULT NULL,
  `post_content` mediumtext DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `post_title` text DEFAULT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`,`id_category`,`post_author`,`post_date`,`post_content`,`images`,`post_title`,`post_status`,`comment_status`,`post_name`,`created_at`,`updated_at`) VALUES 
 (1,1,'Donny Irianto Anggriawan','2019-06-22 00:00:00','<div class=\"mb-3\">\r\n										<p>Attachment apartments in delightful by motionless it no. \r\nAnd now she burst sir learn total. Hearing hearted shewing own ask. \r\nSolicitude uncommonly use her motionless not collecting age. The \r\nproperly servants required mistaken outlived bed and. Remainder \r\nadmitting neglected is he belonging to perpetual objection up. Has widen\r\n too you decay begin which asked equal any.</p>\r\n\r\n										<p>Started his hearted any civilly. So me by marianne admitted\r\n speaking. Men bred fine call ask. Cease one miles truth day above \r\nseven. Suspicion sportsmen provision suffering mrs saw engrossed \r\nsomething. Snug soon he on plan in be dine some.</p>\r\n\r\n										<p>Death there mirth way the noisy merit. Piqued shy spring \r\nnor six though mutual living ask extent. Replying of dashwood advanced \r\nladyship smallest disposal or. Attempt offices own improve now see. \r\nCalled person are around county talked her esteem. Those fully these way\r\n nay thing seems.</p>\r\n									</div><div class=\"mb-3\"><h5 class=\"font-weight-semibold\">Out believe has request not how comfort evident</h5>\r\n\r\n									<p class=\"mb-3\">Up delight cousins we feeling minutes. Genius \r\nhas looked end piqued spring. Down has rose feel find man. Learning day \r\ndesirous informed expenses material returned six the. She enabled \r\ninvited exposed him another. Reasonably conviction solicitude me mr at \r\ndiscretion reasonable. Age out full gate bed day lose.</p></div>',NULL,'Selamat Datang','Y','open','','2019-06-22 11:31:25','2019-06-22 11:31:25');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;


--
-- Definition of table `postcategory`
--

DROP TABLE IF EXISTS `postcategory`;
CREATE TABLE `postcategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT 0,
  `title` varchar(100) NOT NULL DEFAULT ' ',
  `deskripsi` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postcategory`
--

/*!40000 ALTER TABLE `postcategory` DISABLE KEYS */;
INSERT INTO `postcategory` (`id`,`parent_id`,`title`,`deskripsi`,`image`,`active`,`created_at`,`updated_at`) VALUES 
 (1,0,'Project',NULL,'Postcategory_Project.jpg','Y','2019-06-22 11:30:25','2019-06-22 11:30:25');
/*!40000 ALTER TABLE `postcategory` ENABLE KEYS */;


--
-- Definition of table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` (`id`,`name`) VALUES 
 ('11','ACEH'),
 ('12','SUMATERA UTARA'),
 ('13','SUMATERA BARAT'),
 ('14','RIAU'),
 ('15','JAMBI'),
 ('16','SUMATERA SELATAN'),
 ('17','BENGKULU'),
 ('18','LAMPUNG'),
 ('19','KEPULAUAN BANGKA BELITUNG'),
 ('21','KEPULAUAN RIAU'),
 ('31','DKI JAKARTA'),
 ('32','JAWA BARAT'),
 ('33','JAWA TENGAH'),
 ('34','DI YOGYAKARTA'),
 ('35','JAWA TIMUR'),
 ('36','BANTEN'),
 ('51','BALI'),
 ('52','NUSA TENGGARA BARAT'),
 ('53','NUSA TENGGARA TIMUR'),
 ('61','KALIMANTAN BARAT'),
 ('62','KALIMANTAN TENGAH'),
 ('63','KALIMANTAN SELATAN'),
 ('64','KALIMANTAN TIMUR'),
 ('65','KALIMANTAN UTARA'),
 ('71','SULAWESI UTARA'),
 ('72','SULAWESI TENGAH'),
 ('73','SULAWESI SELATAN'),
 ('74','SULAWESI TENGGARA'),
 ('75','GORONTALO'),
 ('76','SULAWESI BARAT'),
 ('81','MALUKU'),
 ('82','MALUKU UTARA'),
 ('91','PAPUA BARAT'),
 ('94','PAPUA');
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;


--
-- Definition of table `regencies`
--

DROP TABLE IF EXISTS `regencies`;
CREATE TABLE `regencies` (
  `id` char(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `province_id` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regencies`
--

/*!40000 ALTER TABLE `regencies` DISABLE KEYS */;
INSERT INTO `regencies` (`id`,`province_id`,`name`) VALUES 
 ('1101','11','KABUPATEN SIMEULUE'),
 ('1102','11','KABUPATEN ACEH SINGKIL'),
 ('1103','11','KABUPATEN ACEH SELATAN'),
 ('1104','11','KABUPATEN ACEH TENGGARA'),
 ('1105','11','KABUPATEN ACEH TIMUR'),
 ('1106','11','KABUPATEN ACEH TENGAH'),
 ('1107','11','KABUPATEN ACEH BARAT'),
 ('1108','11','KABUPATEN ACEH BESAR'),
 ('1109','11','KABUPATEN PIDIE'),
 ('1110','11','KABUPATEN BIREUEN'),
 ('1111','11','KABUPATEN ACEH UTARA'),
 ('1112','11','KABUPATEN ACEH BARAT DAYA'),
 ('1113','11','KABUPATEN GAYO LUES'),
 ('1114','11','KABUPATEN ACEH TAMIANG'),
 ('1115','11','KABUPATEN NAGAN RAYA'),
 ('1116','11','KABUPATEN ACEH JAYA'),
 ('1117','11','KABUPATEN BENER MERIAH'),
 ('1118','11','KABUPATEN PIDIE JAYA'),
 ('1171','11','KOTA BANDA ACEH'),
 ('1172','11','KOTA SABANG'),
 ('1173','11','KOTA LANGSA'),
 ('1174','11','KOTA LHOKSEUMAWE'),
 ('1175','11','KOTA SUBULUSSALAM'),
 ('1201','12','KABUPATEN NIAS'),
 ('1202','12','KABUPATEN MANDAILING NATAL'),
 ('1203','12','KABUPATEN TAPANULI SELATAN'),
 ('1204','12','KABUPATEN TAPANULI TENGAH'),
 ('1205','12','KABUPATEN TAPANULI UTARA'),
 ('1206','12','KABUPATEN TOBA SAMOSIR'),
 ('1207','12','KABUPATEN LABUHAN BATU'),
 ('1208','12','KABUPATEN ASAHAN'),
 ('1209','12','KABUPATEN SIMALUNGUN'),
 ('1210','12','KABUPATEN DAIRI'),
 ('1211','12','KABUPATEN KARO'),
 ('1212','12','KABUPATEN DELI SERDANG'),
 ('1213','12','KABUPATEN LANGKAT'),
 ('1214','12','KABUPATEN NIAS SELATAN'),
 ('1215','12','KABUPATEN HUMBANG HASUNDUTAN'),
 ('1216','12','KABUPATEN PAKPAK BHARAT'),
 ('1217','12','KABUPATEN SAMOSIR'),
 ('1218','12','KABUPATEN SERDANG BEDAGAI'),
 ('1219','12','KABUPATEN BATU BARA'),
 ('1220','12','KABUPATEN PADANG LAWAS UTARA'),
 ('1221','12','KABUPATEN PADANG LAWAS'),
 ('1222','12','KABUPATEN LABUHAN BATU SELATAN'),
 ('1223','12','KABUPATEN LABUHAN BATU UTARA'),
 ('1224','12','KABUPATEN NIAS UTARA'),
 ('1225','12','KABUPATEN NIAS BARAT'),
 ('1271','12','KOTA SIBOLGA'),
 ('1272','12','KOTA TANJUNG BALAI'),
 ('1273','12','KOTA PEMATANG SIANTAR'),
 ('1274','12','KOTA TEBING TINGGI'),
 ('1275','12','KOTA MEDAN'),
 ('1276','12','KOTA BINJAI'),
 ('1277','12','KOTA PADANGSIDIMPUAN'),
 ('1278','12','KOTA GUNUNGSITOLI'),
 ('1301','13','KABUPATEN KEPULAUAN MENTAWAI'),
 ('1302','13','KABUPATEN PESISIR SELATAN'),
 ('1303','13','KABUPATEN SOLOK'),
 ('1304','13','KABUPATEN SIJUNJUNG'),
 ('1305','13','KABUPATEN TANAH DATAR'),
 ('1306','13','KABUPATEN PADANG PARIAMAN'),
 ('1307','13','KABUPATEN AGAM'),
 ('1308','13','KABUPATEN LIMA PULUH KOTA'),
 ('1309','13','KABUPATEN PASAMAN'),
 ('1310','13','KABUPATEN SOLOK SELATAN'),
 ('1311','13','KABUPATEN DHARMASRAYA'),
 ('1312','13','KABUPATEN PASAMAN BARAT'),
 ('1371','13','KOTA PADANG'),
 ('1372','13','KOTA SOLOK'),
 ('1373','13','KOTA SAWAH LUNTO'),
 ('1374','13','KOTA PADANG PANJANG'),
 ('1375','13','KOTA BUKITTINGGI'),
 ('1376','13','KOTA PAYAKUMBUH'),
 ('1377','13','KOTA PARIAMAN'),
 ('1401','14','KABUPATEN KUANTAN SINGINGI'),
 ('1402','14','KABUPATEN INDRAGIRI HULU'),
 ('1403','14','KABUPATEN INDRAGIRI HILIR'),
 ('1404','14','KABUPATEN PELALAWAN'),
 ('1405','14','KABUPATEN S I A K'),
 ('1406','14','KABUPATEN KAMPAR'),
 ('1407','14','KABUPATEN ROKAN HULU'),
 ('1408','14','KABUPATEN BENGKALIS'),
 ('1409','14','KABUPATEN ROKAN HILIR'),
 ('1410','14','KABUPATEN KEPULAUAN MERANTI'),
 ('1471','14','KOTA PEKANBARU'),
 ('1473','14','KOTA D U M A I'),
 ('1501','15','KABUPATEN KERINCI'),
 ('1502','15','KABUPATEN MERANGIN'),
 ('1503','15','KABUPATEN SAROLANGUN'),
 ('1504','15','KABUPATEN BATANG HARI'),
 ('1505','15','KABUPATEN MUARO JAMBI'),
 ('1506','15','KABUPATEN TANJUNG JABUNG TIMUR'),
 ('1507','15','KABUPATEN TANJUNG JABUNG BARAT'),
 ('1508','15','KABUPATEN TEBO'),
 ('1509','15','KABUPATEN BUNGO'),
 ('1571','15','KOTA JAMBI'),
 ('1572','15','KOTA SUNGAI PENUH'),
 ('1601','16','KABUPATEN OGAN KOMERING ULU'),
 ('1602','16','KABUPATEN OGAN KOMERING ILIR'),
 ('1603','16','KABUPATEN MUARA ENIM'),
 ('1604','16','KABUPATEN LAHAT'),
 ('1605','16','KABUPATEN MUSI RAWAS'),
 ('1606','16','KABUPATEN MUSI BANYUASIN'),
 ('1607','16','KABUPATEN BANYU ASIN'),
 ('1608','16','KABUPATEN OGAN KOMERING ULU SELATAN'),
 ('1609','16','KABUPATEN OGAN KOMERING ULU TIMUR'),
 ('1610','16','KABUPATEN OGAN ILIR'),
 ('1611','16','KABUPATEN EMPAT LAWANG'),
 ('1612','16','KABUPATEN PENUKAL ABAB LEMATANG ILIR'),
 ('1613','16','KABUPATEN MUSI RAWAS UTARA'),
 ('1671','16','KOTA PALEMBANG'),
 ('1672','16','KOTA PRABUMULIH'),
 ('1673','16','KOTA PAGAR ALAM'),
 ('1674','16','KOTA LUBUKLINGGAU'),
 ('1701','17','KABUPATEN BENGKULU SELATAN'),
 ('1702','17','KABUPATEN REJANG LEBONG'),
 ('1703','17','KABUPATEN BENGKULU UTARA'),
 ('1704','17','KABUPATEN KAUR'),
 ('1705','17','KABUPATEN SELUMA'),
 ('1706','17','KABUPATEN MUKOMUKO'),
 ('1707','17','KABUPATEN LEBONG'),
 ('1708','17','KABUPATEN KEPAHIANG'),
 ('1709','17','KABUPATEN BENGKULU TENGAH'),
 ('1771','17','KOTA BENGKULU'),
 ('1801','18','KABUPATEN LAMPUNG BARAT'),
 ('1802','18','KABUPATEN TANGGAMUS'),
 ('1803','18','KABUPATEN LAMPUNG SELATAN'),
 ('1804','18','KABUPATEN LAMPUNG TIMUR'),
 ('1805','18','KABUPATEN LAMPUNG TENGAH'),
 ('1806','18','KABUPATEN LAMPUNG UTARA'),
 ('1807','18','KABUPATEN WAY KANAN'),
 ('1808','18','KABUPATEN TULANGBAWANG'),
 ('1809','18','KABUPATEN PESAWARAN'),
 ('1810','18','KABUPATEN PRINGSEWU'),
 ('1811','18','KABUPATEN MESUJI'),
 ('1812','18','KABUPATEN TULANG BAWANG BARAT'),
 ('1813','18','KABUPATEN PESISIR BARAT'),
 ('1871','18','KOTA BANDAR LAMPUNG'),
 ('1872','18','KOTA METRO'),
 ('1901','19','KABUPATEN BANGKA'),
 ('1902','19','KABUPATEN BELITUNG'),
 ('1903','19','KABUPATEN BANGKA BARAT'),
 ('1904','19','KABUPATEN BANGKA TENGAH'),
 ('1905','19','KABUPATEN BANGKA SELATAN'),
 ('1906','19','KABUPATEN BELITUNG TIMUR'),
 ('1971','19','KOTA PANGKAL PINANG'),
 ('2101','21','KABUPATEN KARIMUN'),
 ('2102','21','KABUPATEN BINTAN'),
 ('2103','21','KABUPATEN NATUNA'),
 ('2104','21','KABUPATEN LINGGA'),
 ('2105','21','KABUPATEN KEPULAUAN ANAMBAS'),
 ('2171','21','KOTA B A T A M'),
 ('2172','21','KOTA TANJUNG PINANG'),
 ('3101','31','KABUPATEN KEPULAUAN SERIBU'),
 ('3171','31','KOTA JAKARTA SELATAN'),
 ('3172','31','KOTA JAKARTA TIMUR'),
 ('3173','31','KOTA JAKARTA PUSAT'),
 ('3174','31','KOTA JAKARTA BARAT'),
 ('3175','31','KOTA JAKARTA UTARA'),
 ('3201','32','KABUPATEN BOGOR'),
 ('3202','32','KABUPATEN SUKABUMI'),
 ('3203','32','KABUPATEN CIANJUR'),
 ('3204','32','KABUPATEN BANDUNG'),
 ('3205','32','KABUPATEN GARUT'),
 ('3206','32','KABUPATEN TASIKMALAYA'),
 ('3207','32','KABUPATEN CIAMIS'),
 ('3208','32','KABUPATEN KUNINGAN'),
 ('3209','32','KABUPATEN CIREBON'),
 ('3210','32','KABUPATEN MAJALENGKA'),
 ('3211','32','KABUPATEN SUMEDANG'),
 ('3212','32','KABUPATEN INDRAMAYU'),
 ('3213','32','KABUPATEN SUBANG'),
 ('3214','32','KABUPATEN PURWAKARTA'),
 ('3215','32','KABUPATEN KARAWANG'),
 ('3216','32','KABUPATEN BEKASI'),
 ('3217','32','KABUPATEN BANDUNG BARAT'),
 ('3218','32','KABUPATEN PANGANDARAN'),
 ('3271','32','KOTA BOGOR'),
 ('3272','32','KOTA SUKABUMI'),
 ('3273','32','KOTA BANDUNG'),
 ('3274','32','KOTA CIREBON'),
 ('3275','32','KOTA BEKASI'),
 ('3276','32','KOTA DEPOK'),
 ('3277','32','KOTA CIMAHI'),
 ('3278','32','KOTA TASIKMALAYA'),
 ('3279','32','KOTA BANJAR'),
 ('3301','33','KABUPATEN CILACAP'),
 ('3302','33','KABUPATEN BANYUMAS'),
 ('3303','33','KABUPATEN PURBALINGGA'),
 ('3304','33','KABUPATEN BANJARNEGARA'),
 ('3305','33','KABUPATEN KEBUMEN'),
 ('3306','33','KABUPATEN PURWOREJO'),
 ('3307','33','KABUPATEN WONOSOBO'),
 ('3308','33','KABUPATEN MAGELANG'),
 ('3309','33','KABUPATEN BOYOLALI'),
 ('3310','33','KABUPATEN KLATEN'),
 ('3311','33','KABUPATEN SUKOHARJO'),
 ('3312','33','KABUPATEN WONOGIRI'),
 ('3313','33','KABUPATEN KARANGANYAR'),
 ('3314','33','KABUPATEN SRAGEN'),
 ('3315','33','KABUPATEN GROBOGAN'),
 ('3316','33','KABUPATEN BLORA'),
 ('3317','33','KABUPATEN REMBANG'),
 ('3318','33','KABUPATEN PATI'),
 ('3319','33','KABUPATEN KUDUS'),
 ('3320','33','KABUPATEN JEPARA'),
 ('3321','33','KABUPATEN DEMAK'),
 ('3322','33','KABUPATEN SEMARANG'),
 ('3323','33','KABUPATEN TEMANGGUNG'),
 ('3324','33','KABUPATEN KENDAL'),
 ('3325','33','KABUPATEN BATANG'),
 ('3326','33','KABUPATEN PEKALONGAN'),
 ('3327','33','KABUPATEN PEMALANG'),
 ('3328','33','KABUPATEN TEGAL'),
 ('3329','33','KABUPATEN BREBES'),
 ('3371','33','KOTA MAGELANG'),
 ('3372','33','KOTA SURAKARTA'),
 ('3373','33','KOTA SALATIGA'),
 ('3374','33','KOTA SEMARANG'),
 ('3375','33','KOTA PEKALONGAN'),
 ('3376','33','KOTA TEGAL'),
 ('3401','34','KABUPATEN KULON PROGO'),
 ('3402','34','KABUPATEN BANTUL'),
 ('3403','34','KABUPATEN GUNUNG KIDUL'),
 ('3404','34','KABUPATEN SLEMAN'),
 ('3471','34','KOTA YOGYAKARTA'),
 ('3501','35','KABUPATEN PACITAN'),
 ('3502','35','KABUPATEN PONOROGO'),
 ('3503','35','KABUPATEN TRENGGALEK'),
 ('3504','35','KABUPATEN TULUNGAGUNG'),
 ('3505','35','KABUPATEN BLITAR'),
 ('3506','35','KABUPATEN KEDIRI'),
 ('3507','35','KABUPATEN MALANG'),
 ('3508','35','KABUPATEN LUMAJANG'),
 ('3509','35','KABUPATEN JEMBER'),
 ('3510','35','KABUPATEN BANYUWANGI'),
 ('3511','35','KABUPATEN BONDOWOSO'),
 ('3512','35','KABUPATEN SITUBONDO'),
 ('3513','35','KABUPATEN PROBOLINGGO'),
 ('3514','35','KABUPATEN PASURUAN'),
 ('3515','35','KABUPATEN SIDOARJO'),
 ('3516','35','KABUPATEN MOJOKERTO'),
 ('3517','35','KABUPATEN JOMBANG'),
 ('3518','35','KABUPATEN NGANJUK'),
 ('3519','35','KABUPATEN MADIUN'),
 ('3520','35','KABUPATEN MAGETAN'),
 ('3521','35','KABUPATEN NGAWI'),
 ('3522','35','KABUPATEN BOJONEGORO'),
 ('3523','35','KABUPATEN TUBAN'),
 ('3524','35','KABUPATEN LAMONGAN'),
 ('3525','35','KABUPATEN GRESIK'),
 ('3526','35','KABUPATEN BANGKALAN'),
 ('3527','35','KABUPATEN SAMPANG'),
 ('3528','35','KABUPATEN PAMEKASAN'),
 ('3529','35','KABUPATEN SUMENEP'),
 ('3571','35','KOTA KEDIRI'),
 ('3572','35','KOTA BLITAR'),
 ('3573','35','KOTA MALANG'),
 ('3574','35','KOTA PROBOLINGGO'),
 ('3575','35','KOTA PASURUAN'),
 ('3576','35','KOTA MOJOKERTO'),
 ('3577','35','KOTA MADIUN'),
 ('3578','35','KOTA SURABAYA'),
 ('3579','35','KOTA BATU'),
 ('3601','36','KABUPATEN PANDEGLANG'),
 ('3602','36','KABUPATEN LEBAK'),
 ('3603','36','KABUPATEN TANGERANG'),
 ('3604','36','KABUPATEN SERANG'),
 ('3671','36','KOTA TANGERANG'),
 ('3672','36','KOTA CILEGON'),
 ('3673','36','KOTA SERANG'),
 ('3674','36','KOTA TANGERANG SELATAN'),
 ('5101','51','KABUPATEN JEMBRANA'),
 ('5102','51','KABUPATEN TABANAN'),
 ('5103','51','KABUPATEN BADUNG'),
 ('5104','51','KABUPATEN GIANYAR'),
 ('5105','51','KABUPATEN KLUNGKUNG'),
 ('5106','51','KABUPATEN BANGLI'),
 ('5107','51','KABUPATEN KARANG ASEM'),
 ('5108','51','KABUPATEN BULELENG'),
 ('5171','51','KOTA DENPASAR'),
 ('5201','52','KABUPATEN LOMBOK BARAT'),
 ('5202','52','KABUPATEN LOMBOK TENGAH'),
 ('5203','52','KABUPATEN LOMBOK TIMUR'),
 ('5204','52','KABUPATEN SUMBAWA'),
 ('5205','52','KABUPATEN DOMPU'),
 ('5206','52','KABUPATEN BIMA'),
 ('5207','52','KABUPATEN SUMBAWA BARAT'),
 ('5208','52','KABUPATEN LOMBOK UTARA'),
 ('5271','52','KOTA MATARAM'),
 ('5272','52','KOTA BIMA'),
 ('5301','53','KABUPATEN SUMBA BARAT'),
 ('5302','53','KABUPATEN SUMBA TIMUR'),
 ('5303','53','KABUPATEN KUPANG'),
 ('5304','53','KABUPATEN TIMOR TENGAH SELATAN'),
 ('5305','53','KABUPATEN TIMOR TENGAH UTARA'),
 ('5306','53','KABUPATEN BELU'),
 ('5307','53','KABUPATEN ALOR'),
 ('5308','53','KABUPATEN LEMBATA'),
 ('5309','53','KABUPATEN FLORES TIMUR'),
 ('5310','53','KABUPATEN SIKKA'),
 ('5311','53','KABUPATEN ENDE'),
 ('5312','53','KABUPATEN NGADA'),
 ('5313','53','KABUPATEN MANGGARAI'),
 ('5314','53','KABUPATEN ROTE NDAO'),
 ('5315','53','KABUPATEN MANGGARAI BARAT'),
 ('5316','53','KABUPATEN SUMBA TENGAH'),
 ('5317','53','KABUPATEN SUMBA BARAT DAYA'),
 ('5318','53','KABUPATEN NAGEKEO'),
 ('5319','53','KABUPATEN MANGGARAI TIMUR'),
 ('5320','53','KABUPATEN SABU RAIJUA'),
 ('5321','53','KABUPATEN MALAKA'),
 ('5371','53','KOTA KUPANG'),
 ('6101','61','KABUPATEN SAMBAS'),
 ('6102','61','KABUPATEN BENGKAYANG'),
 ('6103','61','KABUPATEN LANDAK'),
 ('6104','61','KABUPATEN MEMPAWAH'),
 ('6105','61','KABUPATEN SANGGAU'),
 ('6106','61','KABUPATEN KETAPANG'),
 ('6107','61','KABUPATEN SINTANG'),
 ('6108','61','KABUPATEN KAPUAS HULU'),
 ('6109','61','KABUPATEN SEKADAU'),
 ('6110','61','KABUPATEN MELAWI'),
 ('6111','61','KABUPATEN KAYONG UTARA'),
 ('6112','61','KABUPATEN KUBU RAYA'),
 ('6171','61','KOTA PONTIANAK'),
 ('6172','61','KOTA SINGKAWANG'),
 ('6201','62','KABUPATEN KOTAWARINGIN BARAT'),
 ('6202','62','KABUPATEN KOTAWARINGIN TIMUR'),
 ('6203','62','KABUPATEN KAPUAS'),
 ('6204','62','KABUPATEN BARITO SELATAN'),
 ('6205','62','KABUPATEN BARITO UTARA'),
 ('6206','62','KABUPATEN SUKAMARA'),
 ('6207','62','KABUPATEN LAMANDAU'),
 ('6208','62','KABUPATEN SERUYAN'),
 ('6209','62','KABUPATEN KATINGAN'),
 ('6210','62','KABUPATEN PULANG PISAU'),
 ('6211','62','KABUPATEN GUNUNG MAS'),
 ('6212','62','KABUPATEN BARITO TIMUR'),
 ('6213','62','KABUPATEN MURUNG RAYA'),
 ('6271','62','KOTA PALANGKA RAYA'),
 ('6301','63','KABUPATEN TANAH LAUT'),
 ('6302','63','KABUPATEN KOTA BARU'),
 ('6303','63','KABUPATEN BANJAR'),
 ('6304','63','KABUPATEN BARITO KUALA'),
 ('6305','63','KABUPATEN TAPIN'),
 ('6306','63','KABUPATEN HULU SUNGAI SELATAN'),
 ('6307','63','KABUPATEN HULU SUNGAI TENGAH'),
 ('6308','63','KABUPATEN HULU SUNGAI UTARA'),
 ('6309','63','KABUPATEN TABALONG'),
 ('6310','63','KABUPATEN TANAH BUMBU'),
 ('6311','63','KABUPATEN BALANGAN'),
 ('6371','63','KOTA BANJARMASIN'),
 ('6372','63','KOTA BANJAR BARU'),
 ('6401','64','KABUPATEN PASER'),
 ('6402','64','KABUPATEN KUTAI BARAT'),
 ('6403','64','KABUPATEN KUTAI KARTANEGARA'),
 ('6404','64','KABUPATEN KUTAI TIMUR'),
 ('6405','64','KABUPATEN BERAU'),
 ('6409','64','KABUPATEN PENAJAM PASER UTARA'),
 ('6411','64','KABUPATEN MAHAKAM HULU'),
 ('6471','64','KOTA BALIKPAPAN'),
 ('6472','64','KOTA SAMARINDA'),
 ('6474','64','KOTA BONTANG'),
 ('6501','65','KABUPATEN MALINAU'),
 ('6502','65','KABUPATEN BULUNGAN'),
 ('6503','65','KABUPATEN TANA TIDUNG'),
 ('6504','65','KABUPATEN NUNUKAN'),
 ('6571','65','KOTA TARAKAN'),
 ('7101','71','KABUPATEN BOLAANG MONGONDOW'),
 ('7102','71','KABUPATEN MINAHASA'),
 ('7103','71','KABUPATEN KEPULAUAN SANGIHE'),
 ('7104','71','KABUPATEN KEPULAUAN TALAUD'),
 ('7105','71','KABUPATEN MINAHASA SELATAN'),
 ('7106','71','KABUPATEN MINAHASA UTARA'),
 ('7107','71','KABUPATEN BOLAANG MONGONDOW UTARA'),
 ('7108','71','KABUPATEN SIAU TAGULANDANG BIARO'),
 ('7109','71','KABUPATEN MINAHASA TENGGARA'),
 ('7110','71','KABUPATEN BOLAANG MONGONDOW SELATAN'),
 ('7111','71','KABUPATEN BOLAANG MONGONDOW TIMUR'),
 ('7171','71','KOTA MANADO'),
 ('7172','71','KOTA BITUNG'),
 ('7173','71','KOTA TOMOHON'),
 ('7174','71','KOTA KOTAMOBAGU'),
 ('7201','72','KABUPATEN BANGGAI KEPULAUAN'),
 ('7202','72','KABUPATEN BANGGAI'),
 ('7203','72','KABUPATEN MOROWALI'),
 ('7204','72','KABUPATEN POSO'),
 ('7205','72','KABUPATEN DONGGALA'),
 ('7206','72','KABUPATEN TOLI-TOLI'),
 ('7207','72','KABUPATEN BUOL'),
 ('7208','72','KABUPATEN PARIGI MOUTONG'),
 ('7209','72','KABUPATEN TOJO UNA-UNA'),
 ('7210','72','KABUPATEN SIGI'),
 ('7211','72','KABUPATEN BANGGAI LAUT'),
 ('7212','72','KABUPATEN MOROWALI UTARA'),
 ('7271','72','KOTA PALU'),
 ('7301','73','KABUPATEN KEPULAUAN SELAYAR'),
 ('7302','73','KABUPATEN BULUKUMBA'),
 ('7303','73','KABUPATEN BANTAENG'),
 ('7304','73','KABUPATEN JENEPONTO'),
 ('7305','73','KABUPATEN TAKALAR'),
 ('7306','73','KABUPATEN GOWA'),
 ('7307','73','KABUPATEN SINJAI'),
 ('7308','73','KABUPATEN MAROS'),
 ('7309','73','KABUPATEN PANGKAJENE DAN KEPULAUAN'),
 ('7310','73','KABUPATEN BARRU'),
 ('7311','73','KABUPATEN BONE'),
 ('7312','73','KABUPATEN SOPPENG'),
 ('7313','73','KABUPATEN WAJO'),
 ('7314','73','KABUPATEN SIDENRENG RAPPANG'),
 ('7315','73','KABUPATEN PINRANG'),
 ('7316','73','KABUPATEN ENREKANG'),
 ('7317','73','KABUPATEN LUWU'),
 ('7318','73','KABUPATEN TANA TORAJA'),
 ('7322','73','KABUPATEN LUWU UTARA'),
 ('7325','73','KABUPATEN LUWU TIMUR'),
 ('7326','73','KABUPATEN TORAJA UTARA'),
 ('7371','73','KOTA MAKASSAR'),
 ('7372','73','KOTA PAREPARE'),
 ('7373','73','KOTA PALOPO'),
 ('7401','74','KABUPATEN BUTON'),
 ('7402','74','KABUPATEN MUNA'),
 ('7403','74','KABUPATEN KONAWE'),
 ('7404','74','KABUPATEN KOLAKA'),
 ('7405','74','KABUPATEN KONAWE SELATAN'),
 ('7406','74','KABUPATEN BOMBANA'),
 ('7407','74','KABUPATEN WAKATOBI'),
 ('7408','74','KABUPATEN KOLAKA UTARA'),
 ('7409','74','KABUPATEN BUTON UTARA'),
 ('7410','74','KABUPATEN KONAWE UTARA'),
 ('7411','74','KABUPATEN KOLAKA TIMUR'),
 ('7412','74','KABUPATEN KONAWE KEPULAUAN'),
 ('7413','74','KABUPATEN MUNA BARAT'),
 ('7414','74','KABUPATEN BUTON TENGAH'),
 ('7415','74','KABUPATEN BUTON SELATAN'),
 ('7471','74','KOTA KENDARI'),
 ('7472','74','KOTA BAUBAU'),
 ('7501','75','KABUPATEN BOALEMO'),
 ('7502','75','KABUPATEN GORONTALO'),
 ('7503','75','KABUPATEN POHUWATO'),
 ('7504','75','KABUPATEN BONE BOLANGO'),
 ('7505','75','KABUPATEN GORONTALO UTARA'),
 ('7571','75','KOTA GORONTALO'),
 ('7601','76','KABUPATEN MAJENE'),
 ('7602','76','KABUPATEN POLEWALI MANDAR'),
 ('7603','76','KABUPATEN MAMASA'),
 ('7604','76','KABUPATEN MAMUJU'),
 ('7605','76','KABUPATEN MAMUJU UTARA'),
 ('7606','76','KABUPATEN MAMUJU TENGAH'),
 ('8101','81','KABUPATEN MALUKU TENGGARA BARAT'),
 ('8102','81','KABUPATEN MALUKU TENGGARA'),
 ('8103','81','KABUPATEN MALUKU TENGAH'),
 ('8104','81','KABUPATEN BURU'),
 ('8105','81','KABUPATEN KEPULAUAN ARU'),
 ('8106','81','KABUPATEN SERAM BAGIAN BARAT'),
 ('8107','81','KABUPATEN SERAM BAGIAN TIMUR'),
 ('8108','81','KABUPATEN MALUKU BARAT DAYA'),
 ('8109','81','KABUPATEN BURU SELATAN'),
 ('8171','81','KOTA AMBON'),
 ('8172','81','KOTA TUAL'),
 ('8201','82','KABUPATEN HALMAHERA BARAT'),
 ('8202','82','KABUPATEN HALMAHERA TENGAH'),
 ('8203','82','KABUPATEN KEPULAUAN SULA'),
 ('8204','82','KABUPATEN HALMAHERA SELATAN'),
 ('8205','82','KABUPATEN HALMAHERA UTARA'),
 ('8206','82','KABUPATEN HALMAHERA TIMUR'),
 ('8207','82','KABUPATEN PULAU MOROTAI'),
 ('8208','82','KABUPATEN PULAU TALIABU'),
 ('8271','82','KOTA TERNATE'),
 ('8272','82','KOTA TIDORE KEPULAUAN'),
 ('9101','91','KABUPATEN FAKFAK'),
 ('9102','91','KABUPATEN KAIMANA'),
 ('9103','91','KABUPATEN TELUK WONDAMA'),
 ('9104','91','KABUPATEN TELUK BINTUNI'),
 ('9105','91','KABUPATEN MANOKWARI'),
 ('9106','91','KABUPATEN SORONG SELATAN'),
 ('9107','91','KABUPATEN SORONG'),
 ('9108','91','KABUPATEN RAJA AMPAT'),
 ('9109','91','KABUPATEN TAMBRAUW'),
 ('9110','91','KABUPATEN MAYBRAT'),
 ('9111','91','KABUPATEN MANOKWARI SELATAN'),
 ('9112','91','KABUPATEN PEGUNUNGAN ARFAK'),
 ('9171','91','KOTA SORONG'),
 ('9401','94','KABUPATEN MERAUKE'),
 ('9402','94','KABUPATEN JAYAWIJAYA'),
 ('9403','94','KABUPATEN JAYAPURA'),
 ('9404','94','KABUPATEN NABIRE'),
 ('9408','94','KABUPATEN KEPULAUAN YAPEN'),
 ('9409','94','KABUPATEN BIAK NUMFOR'),
 ('9410','94','KABUPATEN PANIAI'),
 ('9411','94','KABUPATEN PUNCAK JAYA'),
 ('9412','94','KABUPATEN MIMIKA'),
 ('9413','94','KABUPATEN BOVEN DIGOEL'),
 ('9414','94','KABUPATEN MAPPI'),
 ('9415','94','KABUPATEN ASMAT'),
 ('9416','94','KABUPATEN YAHUKIMO'),
 ('9417','94','KABUPATEN PEGUNUNGAN BINTANG'),
 ('9418','94','KABUPATEN TOLIKARA'),
 ('9419','94','KABUPATEN SARMI'),
 ('9420','94','KABUPATEN KEEROM'),
 ('9426','94','KABUPATEN WAROPEN'),
 ('9427','94','KABUPATEN SUPIORI'),
 ('9428','94','KABUPATEN MAMBERAMO RAYA'),
 ('9429','94','KABUPATEN NDUGA'),
 ('9430','94','KABUPATEN LANNY JAYA'),
 ('9431','94','KABUPATEN MAMBERAMO TENGAH'),
 ('9432','94','KABUPATEN YALIMO'),
 ('9433','94','KABUPATEN PUNCAK'),
 ('9434','94','KABUPATEN DOGIYAI'),
 ('9435','94','KABUPATEN INTAN JAYA'),
 ('9436','94','KABUPATEN DEIYAI'),
 ('9471','94','KOTA JAYAPURA');
/*!40000 ALTER TABLE `regencies` ENABLE KEYS */;


--
-- Definition of table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `active` varchar(1) NOT NULL,
  `urutan` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` (`id`,`title`,`content`,`link`,`image`,`active`,`urutan`,`created_at`,`updated_at`) VALUES 
 (1,'Welcome To PT. Sintesa Citra Abadi','Selamat datang, ini adalah halaman website kami.',NULL,'slider_Welcome To PT. Sintesa Citra Abadi.jpg','Y',0,'2019-06-22 13:31:21','2019-06-22 13:31:21'),
 (2,'Food Park','Kami membangun Food Park dengan Design Modern dan Minimalis',NULL,'slider_Food Park.jpg','Y',0,'2019-06-22 13:33:07','2019-06-22 13:33:07'),
 (3,'Real Estate','Kami juga Menyediakan Real Estate',NULL,'slider_Real Estate.jpg','Y',0,'2019-06-22 13:33:46','2019-06-22 13:33:46'),
 (4,'Construction & Enginering','Construction & Enginering Details',NULL,'slider_Construction & Enginering.jpg','Y',0,'2019-06-22 13:34:15','2019-06-22 13:34:15');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;


--
-- Definition of table `spl`
--

DROP TABLE IF EXISTS `spl`;
CREATE TABLE `spl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_dep` tinyint(2) DEFAULT 0,
  `NIK` varchar(10) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `TANGGAL` date NOT NULL,
  `JAM_START` time NOT NULL,
  `JAM_END` time NOT NULL,
  `TOTAL_LEMBUR` varchar(5) NOT NULL DEFAULT '00:00',
  `STATUS_KERJA` varchar(9) NOT NULL,
  `STATUS_HARI` varchar(6) NOT NULL,
  `KETERANGAN` text NOT NULL,
  `SELESAI` tinyint(1) DEFAULT 0,
  `STATUS_LEMBUR` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `NIK_SPV` varchar(10) DEFAULT NULL,
  `SPV_NAME` varchar(50) DEFAULT NULL,
  `NIK_MANAGER` varchar(10) DEFAULT NULL,
  `MANAGER_NAME` varchar(50) DEFAULT NULL,
  `NIK_DBM_ADM` varchar(10) DEFAULT NULL,
  `DBM_ADM_NAME` varchar(50) DEFAULT NULL,
  `APPROVAL_SPV` datetime DEFAULT NULL,
  `APPROVAL_MAN` datetime DEFAULT NULL,
  `APPROVAL_DBM_ADM` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`NIK`,`TANGGAL`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spl`
--

/*!40000 ALTER TABLE `spl` DISABLE KEYS */;
INSERT INTO `spl` (`id`,`id_dep`,`NIK`,`NAME`,`TANGGAL`,`JAM_START`,`JAM_END`,`TOTAL_LEMBUR`,`STATUS_KERJA`,`STATUS_HARI`,`KETERANGAN`,`SELESAI`,`STATUS_LEMBUR`,`NIK_SPV`,`SPV_NAME`,`NIK_MANAGER`,`MANAGER_NAME`,`NIK_DBM_ADM`,`DBM_ADM_NAME`,`APPROVAL_SPV`,`APPROVAL_MAN`,`APPROVAL_DBM_ADM`,`CREATED_AT`,`UPDATED_AT`) VALUES 
 (1,33,'2008420006','AHMAD HASYIM ASYARI','2019-08-03','09:00:00','12:00:00','3','NON SHIFT','NORMAL','Laporan Bulanan',0,1,'2008420387',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-26 15:54:37','2019-07-26 15:54:37'),
 (2,33,'2008420006','AHMAD HASYIM ASYARI','2019-08-03','09:00:00','12:00:00','3','NON SHIFT','NORMAL','Laporan Bulanan',0,1,'2008420387',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-26 15:54:50','2019-07-26 15:54:50'),
 (3,33,'2008420006','AHMAD HASYIM ASYARI','2019-08-03','09:00:00','12:00:00','3','NON SHIFT','NORMAL','Laporan Bulanan',0,1,'2008420387',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-26 15:56:11','2019-07-26 15:56:11'),
 (4,33,'2008420006','AHMAD HASYIM ASYARI','2019-08-03','09:00:00','12:00:00','3','NON SHIFT','NORMAL','Laporan Bulanan',0,1,'2008420387',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-26 15:57:37','2019-07-26 15:57:37'),
 (5,33,'2008420006','AHMAD HASYIM ASYARI','2019-08-03','09:00:00','12:00:00','3','NON SHIFT','NORMAL','Laporan Bulanan',0,1,'2008420387',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-26 15:58:25','2019-07-26 15:58:25'),
 (6,1,'2012073403','DONNY IRIANTO ANGGRIAWAN','2019-07-26','16:00:00','16:00:00','8','NON SHIFT','MERAH','lembur',0,1,'2005008378',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-26 16:03:44','2019-07-26 16:03:44'),
 (7,33,'2008420006','AHMAD HASYIM ASYARI','2019-08-03','09:00:00','12:00:00','3','NON SHIFT','NORMAL','Laporan Bulanan',0,1,'2008420387',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-26 16:54:59','2019-07-26 16:54:59'),
 (8,1,'2015081495','FATHOR ROSI','2019-07-27','05:30:00','08:00:00','2.30','NON SHIFT','NORMAL','Pasang baza T20A - A Yani BWI. Sampe toko jam 6.26 pagi, posisi cpu masih di toko, info anak toko nunggu shift 1 datang untuk bawa barang-barang ke lokasi bazar termasuk cpu. Lalu saya lanjut ke toko FTMV - Banterang, posisi cpu sama masih di toko, lalu saya nyuruh anak toko untuk bawa cpu ke lokasi bazar karena mau segera di pasang. Setelah komputer bazar FTMV sampai di stand bazar, di sana masih belum ada meja, dan tenda bazar baru di berdirikan, posisi sudah jam 6.55 pagi. Setelah itu personil toko T20A info saya kalu cpu dan meja sudah ready di stand bazar, akhirnya saya pergi ke lokasi bazar T20A, sesampainya disana, personil toko masih cari stpkontak buat komputer bazar dan peralatan lainnya. Lalu saya bantu personil toko nata/merapikan meja dan setelah ada stopkontak saya langsung setting komputer bazar, kurang lebih jam 8.00 komputer bazar T20A sudah ready, jadi saya langsung lanjut ke stand bazar FTMV. sampai disana saya langsung setting komputer dan ada masalah pada koneksi(MODEM). modem cad 04 tidak bisa konek ke kantor, sudah di pandu tim network masih belum bisa. rencana modem mau dibawa ke toko tetapi lokasi jalan sudah ditutup. Dan komputer bazar FTMV belum update prodmas, akhirnya saya info tim data untuk kirim prodmas lewat HP, akan tetapi hp tidak bisa detek di komputer, sudah dicobapakai hp lain masih tetap tidak detek. Lalu saya pinjem modem di bazar T20A, jaraknya lumayan jauh dan saya jalan kaki karena jalan sudah di tutup. lalu saya pasang modem T20A di bazar FTMV dam bazar FTMV ready kurang lebih jam 10.30. Jadi 2 komputer bazar T20A dan FTMV memakai 1 modem, gantian.',0,1,'2005008376',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-27 19:47:05','2019-07-27 19:47:05'),
 (9,1,'2015081495','FATHOR ROSI','2019-07-27','17:30:00','19:00:00','1.30','NON SHIFT','NORMAL','Bongkar Bazar T20A dan FTMV. jam 17.25 saya info anak data untuk ambil data sales bazar T20A, akan tetapi sampai jam 17.46 tetap tidak di modem oleh anak data, alasannya (Ditunggu ya.. masih makan dan sholat). akhirnya saya packing dulu komputer bazarnya lalu mau saya pasang di toko buat diambil data sales bazarnya. lalu saya packing komputer bazar FTMV dan langsung ke toko FTMV. Jam 18.22 saya info anak data agar ambil data sales bazar ftmv. dan pada jam 18.39 baru selesai nge up data sales bazar. lalu saya lanjut ke T20A, jam 19.04 saya info anak data buat ambil data sales bazar T20A, lalu selesai pada jam 19.12. lalu saya packing kembali komputer bazar.',0,1,'2005008376',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-27 20:06:16','2019-07-27 20:06:16');
/*!40000 ALTER TABLE `spl` ENABLE KEYS */;


--
-- Definition of table `status_lembur`
--

DROP TABLE IF EXISTS `status_lembur`;
CREATE TABLE `status_lembur` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `progress` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_lembur`
--

/*!40000 ALTER TABLE `status_lembur` DISABLE KEYS */;
INSERT INTO `status_lembur` (`id`,`progress`) VALUES 
 (1,'Pengajuan'),
 (2,'Approvement Supervisor'),
 (3,'Rejected By Supervisor'),
 (4,'Approvement Manager'),
 (5,'Rejected By Manager'),
 (6,'Approvement DBM'),
 (7,'Rejected By DBM');
/*!40000 ALTER TABLE `status_lembur` ENABLE KEYS */;


--
-- Definition of table `tokosewa`
--

DROP TABLE IF EXISTS `tokosewa`;
CREATE TABLE `tokosewa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `akte` varchar(50) NOT NULL,
  `kdtk` varchar(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kdtk_to` varchar(4) NOT NULL DEFAULT '',
  `nama_to` varchar(50) NOT NULL DEFAULT '',
  `alamat` text NOT NULL,
  `kota` varchar(25) NOT NULL DEFAULT '',
  `tanggal_sewa` date DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`akte`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokosewa`
--

/*!40000 ALTER TABLE `tokosewa` DISABLE KEYS */;
INSERT INTO `tokosewa` (`id`,`akte`,`kdtk`,`nama`,`kdtk_to`,`nama_to`,`alamat`,`kota`,`tanggal_sewa`,`jatuh_tempo`,`created_at`,`updated_at`) VALUES 
 (1,'JBR-12-10052','F04R','SUKOSARI','','','JL.KALIMANTAN 24','JEMBER','2019-06-01','2024-08-01',NULL,NULL);
/*!40000 ALTER TABLE `tokosewa` ENABLE KEYS */;


--
-- Definition of table `tokosewa_mstran`
--

DROP TABLE IF EXISTS `tokosewa_mstran`;
CREATE TABLE `tokosewa_mstran` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `akte` varchar(50) NOT NULL,
  `jenis_trx` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `nik_users` varchar(10) NOT NULL,
  `nama_users` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`akte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokosewa_mstran`
--

/*!40000 ALTER TABLE `tokosewa_mstran` DISABLE KEYS */;
/*!40000 ALTER TABLE `tokosewa_mstran` ENABLE KEYS */;


--
-- Definition of table `upcoming`
--

DROP TABLE IF EXISTS `upcoming`;
CREATE TABLE `upcoming` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `up_title` varchar(50) DEFAULT NULL,
  `up_content` mediumtext DEFAULT NULL,
  `up_date` date DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upcoming`
--

/*!40000 ALTER TABLE `upcoming` DISABLE KEYS */;
/*!40000 ALTER TABLE `upcoming` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_jabatan` smallint(5) DEFAULT 0,
  `id_dep` smallint(5) DEFAULT 0,
  `id_atasan` varchar(10) COLLATE utf8_unicode_ci DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(35) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nik` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_blocked` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`,`nik`,`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2285 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`id_jabatan`,`id_dep`,`id_atasan`,`name`,`photo`,`password`,`email`,`username`,`nik`,`phone`,`whatsapp`,`address`,`province`,`regency`,`district`,`note`,`is_blocked`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (1,12,1,'2005008378','Donny Irianto Anggriawan','usr_2012073403.jpg','$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy','donnyirianto.anggriawan@gmail.com','donny','7777777777','087712746464','087712746464','Perum Sumbersari Permai I Blok E-11, Jember','JAWA TIMUR','KABUPATEN JEMBER','SUMBERSARI','The man who does more than he is paid for will soon be paid more than he does','0','8l04Kxx9lEelybBtQ981Qy3TwibHJQpptKCREPheU0xQEqlz4a0emdY0shcd','2015-12-17 08:33:56','2019-07-26 17:07:30'),
 (2,36,1,'2005008378','DONNY IRIANTO ANGGRIAWAN','usr_2012073403.jpg','$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012073403','2012073403',NULL,NULL,NULL,NULL,NULL,NULL,'The man who does more than he is paid for will soon be paid more than he does','0',NULL,'0000-00-00 00:00:00','2019-07-26 18:16:08'),
 (1536,35,30,'2013030174','HERU SETIAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'1999000546','1999000546',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1537,35,31,'1999004043','SUGENG ARIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'1999001171','1999001171',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1538,36,25,'0','VERONICA ELI RETNO PALUPI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2000000586','2000000586',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1539,35,25,'','AGUNG WIDODO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2000004085','2000004085',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1540,35,31,'1999004043','SUHERMANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2001006830','2001006830',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1541,35,23,'','KHASAN MAS UD',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2002001539','2002001539',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1542,38,31,'2007414020','ANTOK WITANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2002001594','2002001594',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1543,36,12,'2007001355','WIDIYAWATI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2002006743','2002006743',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1544,35,13,'2015027708','IDA WINDARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2002007162','2002007162',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1545,36,34,'2007003959','RINA SETYOWATI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2003007753','2003007753',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1546,36,31,'2007414125','CAHYA INDRA KURNIAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2004002686','2004002686',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1547,36,35,'2012028239','ADHA FITRIA ARININGSIH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2004002793','2004002793',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1548,36,25,'0','ARIS WIDODO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2004002803','2004002803',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1549,57,33,'2013086432','NANA ADRIYAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2004002817','2004002817',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1550,36,31,'1999001171','MOCH RISKI SARIF',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2004003030','2004003030',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1551,35,25,'','ANDRIK PURWANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2005008158','2005008158',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1552,36,25,'0','MIFTAHUL ARIFIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2005008162','2005008162',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1553,35,31,'1999004043','RAHMAT AJI BENTAR',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2005008165','2005008165',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1554,36,35,'2012028239','IPUNG ARI PURNOMO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2005008238','2005008238',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1555,36,12,'2007001355','ADI PUJIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2005008362','2005008362',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1556,35,1,'2001001701','MUHAMMAD JAELANI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2005008376','2005008376',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1557,35,1,'2001001701','DHANIEL WHARDANA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2005008378','2005008378',NULL,NULL,NULL,NULL,NULL,NULL,'All blame is a waste of time. No matter how much fault you find with another, and regardless of how much you blame him,  it will not change you','0',NULL,'0000-00-00 00:00:00','2019-07-18 21:00:00'),
 (1558,43,34,'2006003909','BENNY AGUS KRISTIAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006003514','2006003514',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1559,36,24,'0','YUNI ARIS VIANTI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006003717','2006003717',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1560,36,37,'0','DIANA WULANDARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006003798','2006003798',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1561,37,38,'2007003834','URBANI OKTAVIA YUNUS',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006003830','2006003830',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1562,36,34,'2007003959','DESY ARUM KURNIAWATI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006003839','2006003839',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1563,45,12,'2007414334','JOKO DWI FITRIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006003859','2006003859',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1564,45,12,'2007414334','ONO WAHYUNI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006003865','2006003865',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1565,45,12,'2007414334','RUSTON NAWAWI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006003869','2006003869',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1566,35,34,'2004002725','KHOIRUL NUR HIDAYAT',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006003909','2006003909',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1567,35,33,'2013020270','ERU MUJI PRAYITNO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006008099','2006008099',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1568,45,12,'2007414334','RONY KURNIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006008155','2006008155',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1569,36,31,'2007414020','RUDI HARI YANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006008194','2006008194',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1570,36,1,'2005008376','SULISTYO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006008198','2006008198',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1571,47,34,'2006003909','EDI SUSANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006008304','2006008304',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1572,47,34,'2006003909','HERYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006008305','2006008305',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1573,35,23,'','SUCIONO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006008309','2006008309',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1574,57,33,'2013086432','INDRI MAILAN DARIWATI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006008368','2006008368',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1575,36,38,'2007003934','SIGIT ROBIANSYAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2006081570','2006081570',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1576,36,38,'2007003834','FARID SURYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007001353','2007001353',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1577,35,38,'2013116895','YUSAK SETIAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007001354','2007001354',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1578,35,12,'2013030174','ANIS NOOR MAZIDAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007001355','2007001355',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1579,41,34,'2011010139','DWI APRILIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007003721','2007003721',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1580,45,12,'2007414334','IMANSYAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007003722','2007003722',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1581,35,38,'2013116895','EKO ANDRI WAHYUDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007003834','2007003834',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1582,36,38,'2007003834','RACHMAT HIDAYAT',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007003852','2007003852',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1583,57,33,'2013086432','PUTRA DWI SULIS HARIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007003871','2007003871',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1584,36,25,'0','YOHANES SUKRISTIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007003902','2007003902',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1585,36,34,'2006003909','SAMUEL ARGA SAPUTRA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007003903','2007003903',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1586,35,38,'2013116895','HENDRA PERDANA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007003934','2007003934',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1587,35,34,'2004002725','HERU BUDI UTOMO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007003959','2007003959',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1588,35,31,'1999004043','DIAN ROSYIDA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007414020','2007414020',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1589,36,34,'2007003959','TOHARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007414076','2007414076',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1590,35,31,'1999004043','ARIF UTAMA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007414125','2007414125',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1591,36,26,'2012096349','FATIMATUZ ZAHRO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007414130','2007414130',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1592,57,33,'2013086432','INDRA FAQIH QURANI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007414183','2007414183',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1593,36,12,'2007414334','MISBAHUL ARIFIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007414311','2007414311',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1594,35,12,'2013030174','VITIS SILVESTREA P D',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2007414334','2007414334',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1595,57,33,'2013086432','SRI WAHYU NINGSIH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2008400197','2008400197',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1596,36,33,'2008420387','AHMAD HASYIM ASYARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2008420006','2008420006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1597,36,33,'2008420387','MUHAMMAD ABROR',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2008420039','2008420039',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1598,35,34,'2004002725','JHON RICARD TAMBUNAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2008420053','2008420053',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1599,35,25,'','DIDIN ANDI SUSILO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2008420060','2008420060',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1600,35,35,'2013030174','DEDY EKO JUMANTORO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2008420097','2008420097',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1601,36,30,'1999000546','EKO SUGENG SUPRIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2008420100','2008420100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1602,36,1,'2005008378','SETYOBUDI WAHYUDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2008420355','2008420355',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1603,36,35,'2012028239','ROSITA PERMANASARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2008420361','2008420361',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1604,35,33,'2013020270','RICA ERAUNING RATTI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2008420387','2008420387',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1605,36,31,'2007414020','EDI PRIYONO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2008892991','2008892991',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1606,37,34,'2008420053','M LUTFI EFENDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009045959','2009045959',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1607,37,34,'2008420053','SYAIFUL BAHRI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009045960','2009045960',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1608,37,34,'2008420053','SALMAN ALFARISIH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009045961','2009045961',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1609,57,33,'2013086432','MOHAMAD AHYAK',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009046160','2009046160',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1610,36,34,'2011010139','YUDHA KUSUMA NAGARA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009047157','2009047157',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1611,36,38,'2007001354','YUDHI KURNIAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009047158','2009047158',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1612,36,38,'2007003934','AGUNG RUSLI KUSUMA WIJAYA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009047172','2009047172',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1613,37,34,'2008420053','SUGIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009047173','2009047173',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1614,36,38,'2007003934','TEJO PRABOWO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009402739','2009402739',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1615,45,12,'2007414334','M MUKHLIS',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009404145','2009404145',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1616,37,38,'2007003834','DEDI HARIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009404152','2009404152',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1617,37,38,'2007003934','SELDI SUTAN MAULANA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009404153','2009404153',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1618,36,23,'2002001539','A DWI YOGA ADVIYAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009404602','2009404602',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1619,45,12,'2007414334','FIKI PRAYOGA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009405255','2009405255',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1620,36,38,'2007003834','AHMAD HARIYONO','usr_2009405334.jpg','$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2009405334','2009405334',NULL,NULL,NULL,NULL,NULL,NULL,'Saat Allah menaikan level keuanganmu, jangan naikan gaya hidupmu.\nTapi naikan level sedekahmu.\nKarena itulah harta sejati','0',NULL,'0000-00-00 00:00:00','2019-07-26 17:14:36'),
 (1621,36,33,'2008420387','FAUZAN SUWES IN DWI DIO F',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010001532','2010001532',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1622,36,1,'2005008378','ERFAN EFENDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010001535','2010001535',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1623,36,23,'2002001539','EKA WARDANI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010004206','2010004206',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1624,36,33,'2006008099','AGUS SURYO PRASETYO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010004252','2010004252',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1625,48,22,'0','SUPRIADI KURNIAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010004253','2010004253',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1626,36,31,'2007414125','AGUS FERIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010004267','2010004267',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1627,45,12,'2007414334','TIRTO HIDAYAT',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010011116','2010011116',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1628,36,34,'2006003909','IRVAN VAUZI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010013701','2010013701',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1629,36,35,'2012028239','DANI FEBRIAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010013702','2010013702',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1630,36,1,'2005008378','NURIS ISWAHYUDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010013705','2010013705',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1631,37,38,'2007001354','FATHUR ROHMAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010016992','2010016992',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1632,37,34,'2011010139','ROCKY DWITANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010016994','2010016994',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1633,37,12,'2007001355','YUNITA KURNIAWATI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010019669','2010019669',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1634,36,33,'2013020270','FERI PRIMA RIANTO S',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010019682','2010019682',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1635,52,34,'2006003909','BUDI CAHYONO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010019701','2010019701',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1636,36,1,'2005008378','ZULFI APRILLIA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010022142','2010022142',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1637,36,1,'2005008376','FERI DWI PURNOMO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010024955','2010024955',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1638,37,34,'2006003909','ZIA UL KHASAN FATHONI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010024956','2010024956',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1639,36,38,'2007003934','ARIE DWI PRASETIA ADJI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010024971','2010024971',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1640,36,1,'2005008378','RICHY JEPRI KARNAIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010024973','2010024973',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1641,56,26,'2012096349','SUWARNO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010024974','2010024974',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1642,36,31,'0','FATHUR ROSI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010025387','2010025387',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1643,36,1,'2005008378','AGUS PRASETYA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010027364','2010027364',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1644,37,31,'2007414125','MOCH ILYAS',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010027371','2010027371',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1645,36,13,'2002007162','MOH ABDUL AHWAN SUBARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010027376','2010027376',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1646,36,26,'2012096349','SUHARYADI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010027386','2010027386',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1647,36,31,'2001006830','ERIK ANGGUN WINARTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010027389','2010027389',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1648,49,34,'2006003909','PURYADI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2010030009','2010030009',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1649,36,31,'1999001171','SUPRIYADI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011001141','2011001141',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1650,37,31,'2001006830','FARID WAJIDI UTAMA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011001143','2011001143',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1651,37,38,'2007001354','HENDI RISKI KUSUMA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011001148','2011001148',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1652,37,31,'2007414125','HARI SUBANGUN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011004843','2011004843',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1653,36,31,'2013086434','HENDRIK ANDRIAN PRATIKNO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011004845','2011004845',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1654,37,31,'2001006830','PRASETYO IRAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011004847','2011004847',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1655,36,25,'0','DONKY ALFIANDRA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011004850','2011004850',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1656,36,38,'2007001354','AKH WASILUL M',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011004854','2011004854',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1657,36,34,'2007003959','RIKO HADI PURNOMO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011004860','2011004860',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1658,37,34,'2008420053','m jainuri',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011004862','2011004862',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1659,36,31,'1999001171','SRI WULANDARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011005335','2011005335',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1660,36,38,'2007001354','WASILLATUR RAHMAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011006667','2011006667',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1661,36,12,'2007414334','MOCH MOHYES YUDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011006678','2011006678',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1662,36,24,'0','NANANG',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011006683','2011006683',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1663,36,12,'2007001355','HENDRIK ARIS',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011008474','2011008474',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1664,37,31,'2001006830','FARIS KURNIAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011008480','2011008480',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1665,37,31,'2007414125','YUDIK',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011008481','2011008481',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1666,36,31,'2001006830','MOH SYAIFUDIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011008483','2011008483',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1667,37,38,'2007003834','MUHAMAD',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011008493','2011008493',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1668,45,12,'2007414334','MA RUF',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011008752','2011008752',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1669,36,30,'1999000546','INA WARDIANA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011010138','2011010138',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1670,35,34,'2004002725','AHMAD IRFAN HIDAYAT',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011010139','2011010139',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1671,36,31,'2005008165','AHMAD AINUL AZIZ',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011010555','2011010555',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1672,36,34,'2011010139','NUNUNG SUBIYANTORO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011010560','2011010560',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1673,36,31,'2005008165','SYAMSUL ARIFIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011011480','2011011480',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1674,36,23,'2002001539','M SAMSUL ARIFIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011012598','2011012598',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1675,47,34,'2006003909','ARIEF SETIYAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011013173','2011013173',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1676,36,31,'2007414125','IMAM FAUZI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011015918','2011015918',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1677,45,12,'2007414334','MUSTA IN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011017973','2011017973',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1678,37,34,'2007003959','VITA APRILIA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011018508','2011018508',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1679,37,1,'2005008378','MUHAMMAD ABDUL AZIS',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011018511','2011018511',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1680,37,26,'2012096349','DHIO ABDULLAH FALENTINO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011018517','2011018517',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1681,36,26,'2012096349','HAIRUL UMAM A MD',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011018520','2011018520',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1682,45,12,'2007414334','ADE RIZAL DARMAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011018762','2011018762',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1683,36,38,'2007001354','HERU DARMAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011020868','2011020868',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1684,36,38,'2007001354','MAKMUR ALAMSYAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011020869','2011020869',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1685,37,38,'2007003934','MUHAMMAD ARIF',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011020873','2011020873',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1686,36,25,'0','FARID EKO PUTRANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2011020882','2011020882',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1687,37,31,'2007414020','JENER RICO SATRIA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012022465','2012022465',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1688,37,38,'2007003934','MOCH IFAN NOVIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012022468','2012022468',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1689,36,34,'2008420053','SAMPURNA BASUKI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012022471','2012022471',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1690,37,33,'2013086432','KIKIE OCTAVIANTI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012022980','2012022980',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1691,52,34,'2006003909','FREDI CAHYO APRILYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012023429','2012023429',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1692,52,34,'2006003909','WAJARI MISGIONO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012023857','2012023857',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1693,37,1,'2005008378','DIMAS SULTAN TAKDIR ALI S',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012024163','2012024163',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1694,52,34,'2006003909','SAMSUL ARIFIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012024174','2012024174',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1695,45,12,'2007414334','MOHAMMAD SOLIHIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012024663','2012024663',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1696,37,34,'2008420053','RIDWAN AHMAD RIYADI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012024666','2012024666',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1697,37,31,'2001006830','MOH IQBAL',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012024792','2012024792',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1698,55,24,'0','RIZKI RAHMATULLAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012024931','2012024931',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1699,37,31,'2001006830','ROSI ANDRI ARIFIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012024972','2012024972',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1700,37,31,'2013086434','MUBARAK',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012024977','2012024977',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1701,57,33,'2013086432','NILLY SEPTIAN BERLIANA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012025001','2012025001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1702,37,34,'2011010139','LUTFIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012025002','2012025002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1703,37,38,'2007003934','ABDUL RIFAI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012025004','2012025004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1704,37,38,'2007003934','ACHMAD NOOR CHOLIS',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012025009','2012025009',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1705,37,38,'2007003834','ADE PUTRA BUDI LAKSONO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012025922','2012025922',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1706,37,34,'2006003909','MERISA FITRIANA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012025926','2012025926',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1707,49,34,'2006003909','MOCH ARIFIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012026193','2012026193',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1708,52,34,'2006003909','JUNAEDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012026246','2012026246',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1709,37,1,'2005008378','DIO FEBRIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012026609','2012026609',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1710,37,34,'2008420053','MOCH BADRIONO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012026615','2012026615',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1711,37,34,'2008420053','MOH ROFIQ',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012026616','2012026616',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1712,36,31,'1999001171','MUHAMMAD SANTONI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012026618','2012026618',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1713,36,12,'2007414334','IKE PUJI LESTARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012027896','2012027896',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1714,36,35,'2008420097','REZA PAHLEVI RAMADHAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012027898','2012027898',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1715,37,38,'2007003934','WAHYU ARIEF PRATIKNO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012028202','2012028202',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1716,35,35,'2013030174','NENI SRI LESTARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012028239','2012028239',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1717,36,34,'2006003909','MOHAMMAD ALI IKHWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012028243','2012028243',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1718,37,1,'2005008376','FARID BAKHTIAR RADIANSYAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012029183','2012029183',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1719,37,34,'2006003909','MUHAMMAD HAMZAH AL AMIEN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012029190','2012029190',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1720,37,34,'2006003909','RONY ROMADHON',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012029193','2012029193',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1721,37,34,'2006003909','YOYOK PRASETYO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012029196','2012029196',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1722,56,26,'2012096349','HARITOKO MARGIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012029878','2012029878',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1723,37,38,'2007001354','ONI BUDI HARSONO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012029966','2012029966',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1724,36,35,'2012028239','UYUN LUTFIANI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012029970','2012029970',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1725,36,1,'2005008376','ABD MAJID',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012030076','2012030076',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1726,37,31,'2007414125','SUCIPTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012030436','2012030436',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1727,37,23,'2002001539','FAUZIA MAGHFUROH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012031059','2012031059',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1728,37,38,'2007001354','MUH ERVAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012031062','2012031062',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1729,37,34,'2006003909','KHOIRUL UMAM',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012031937','2012031937',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1730,37,35,'2012028239','KHOTIM',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012031938','2012031938',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1731,37,24,'0','MASYHUDA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012031941','2012031941',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1732,36,38,'2007003934','KHOIRUL UMAM',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012032217','2012032217',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1733,36,36,'0','AMALIAH AMANDA ROCHMANIA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012032336','2012032336',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1734,36,36,'0','USWATUN HASANAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012032342','2012032342',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1735,37,1,'2005008376','ABD YAQIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012032755','2012032755',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1736,36,1,'2005008378','BAGUS PAHLEVI ARIFIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012032756','2012032756',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1737,45,12,'2007414334','AHMAD SUGIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012032759','2012032759',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1738,37,34,'2006003909','MOCHAMMAD NUR HAMID',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012032760','2012032760',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1739,37,23,'2002001539','PRISCA FITRIANI ANTIKA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012034374','2012034374',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1740,57,33,'2013086432','MOCHAMAD ANDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012034484','2012034484',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1741,36,1,'0','NINDY BEKTI PRATIWI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012035523','2012035523',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1742,36,36,'0','RISKI AMELIA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012035525','2012035525',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1743,36,37,'0','LISA MARDIANA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012035526','2012035526',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1744,37,34,'2011010139','LUTFIA EKA PRAKASIWI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012036810','2012036810',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1745,37,25,'0','DWI FLADLIKA M',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012038025','2012038025',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1746,37,31,'2007414020','HUSNUL HOTIMAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012041315','2012041315',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1747,36,23,'2002001539','IMANSYAH FANDI R PUTRA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012041873','2012041873',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1748,57,33,'2013086432','DWI APRIL LIANTI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012043458','2012043458',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1749,47,34,'2006003909','JONI HARTONO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012045121','2012045121',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1750,37,34,'2006003909','MUHAMMAD WASIL',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012048277','2012048277',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1751,37,34,'2006003909','EDI PURNOMO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012048279','2012048279',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1752,49,34,'2006003909','MUHAMMAD TOHIR',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012048280','2012048280',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1753,52,34,'2006003909','AGUS SUPRIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012048282','2012048282',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1754,37,34,'2008420053','HENDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012049153','2012049153',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1755,37,38,'2007003834','TAUFIQ HIDAYAT',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012053240','2012053240',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1756,56,26,'2012096349','IMAM MUTTAQIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012053801','2012053801',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1757,56,26,'2012096349','SANDIK JULI HANDOKO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012053802','2012053802',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1758,37,38,'2007001354','MOH ALI MUSTOFA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012053816','2012053816',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1759,49,34,'2006003909','HIDAYATUL SIDIK',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012058087','2012058087',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1760,36,23,'2006008309','AGUS SETIAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012058096','2012058096',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1761,37,38,'2007001354','MOH RIZAL DWI FITRIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012060345','2012060345',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1762,37,38,'2007001354','IQBAL YANUAR M',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012061719','2012061719',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1763,37,38,'2007001354','MOH EFENDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012063441','2012063441',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1764,37,34,'2008420053','ROFIQ',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012068505','2012068505',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1765,55,24,'0','MUHAMMAD ISA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012071110','2012071110',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1767,37,34,'2008420053','SURYADI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012073578','2012073578',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1768,37,34,'2006003909','SRI WAHYUNI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012074836','2012074836',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1769,57,33,'2013086432','KRISNA EKA SAPUTRA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012075319','2012075319',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1770,37,31,'2005008165','MUHAMMAD RIDHATUL Z',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012079585','2012079585',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1771,37,30,'1999000546','RISKI SAMSUL ARIFIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012080618','2012080618',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1772,52,34,'2006003909','INDRA RAYUDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012083193','2012083193',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1773,37,31,'2007414125','HOIRUL ROZIQIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012083194','2012083194',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1774,37,26,'2012096349','FANDI HIDAYAT',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012085446','2012085446',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1775,53,25,'2008420060','HARIYADI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012086298','2012086298',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1776,37,38,'2007001354','RIAN HERIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012088670','2012088670',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1777,55,24,'0','WAHYU GUSLIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012090252','2012090252',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1778,36,38,'2007003934','NUR KUSUMA WARDANI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012092980','2012092980',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1779,37,34,'2008420053','DIMAS PUTRA DAMANHURI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012095358','2012095358',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1780,37,1,'2005008378','HUSNUL HIDAYAT',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012095359','2012095359',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1781,37,37,'0','LUSI PUJI ASTUTIK',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012095361','2012095361',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1782,37,1,'2005008378','NUR EKA PRISTIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012095362','2012095362',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1783,35,26,'1998000104','BIMA ARI NOFITRA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012096349','2012096349',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1784,37,1,'2005008378','MUH ALI MUDHOFIR',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012096352','2012096352',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1785,37,24,'0','AHMAD BAIDLOWI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012097130','2012097130',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1786,37,38,'2007001354','AHMAD SUBARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012097891','2012097891',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1787,52,34,'2006003909','RISQI AGUNG TRIJAYA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012100429','2012100429',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1788,37,24,'0','ARDHI HIDAYATULLAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012100908','2012100908',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1789,37,38,'2007003834','WAHYU PURWANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012101752','2012101752',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1790,36,26,'2012096349','JUWITA MEGASARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012101881','2012101881',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1791,36,34,'2008420053','DONY WIRANATA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012102508','2012102508',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1792,37,31,'2007414125','PUPUT PUJI LESTARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012103105','2012103105',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1793,52,34,'2006003909','RAHMAD SUPRIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012103106','2012103106',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1794,36,13,'2002007162','LINA FAJARSARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012106444','2012106444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1795,40,25,'2005008158','AGUS SUTRISNO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012107527','2012107527',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1796,37,34,'2008420053','SUKRON MAKMUN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012107784','2012107784',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1797,37,38,'2007003834','AHMAD HOLILI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012109618','2012109618',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1798,37,38,'2007003934','HASAN FADILLAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012109620','2012109620',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1799,37,38,'2007003834','RUDI SUMARTONO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012109625','2012109625',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1800,37,34,'2006003909','SLAMET HERMANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012111178','2012111178',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1801,52,34,'2006003909','ROSYIDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2012112076','2012112076',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1802,52,34,'2006003909','GHOZALI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013001229','2013001229',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1803,52,34,'2006003909','IMAM FARISI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013003135','2013003135',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1804,37,38,'2007003834','JEFRI FAJAR',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013004479','2013004479',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1805,37,38,'2007001354','ARIF FERDI SISWANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013004664','2013004664',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1806,37,38,'2007001354','KHOIRUL UMAM',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013004666','2013004666',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1807,56,26,'2012096349','SAIFUL BAHRI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013004821','2013004821',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1808,37,30,'1999000546','DIMAS RIO KUSUMA BAKTI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013006310','2013006310',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00');
INSERT INTO `users` (`id`,`id_jabatan`,`id_dep`,`id_atasan`,`name`,`photo`,`password`,`email`,`username`,`nik`,`phone`,`whatsapp`,`address`,`province`,`regency`,`district`,`note`,`is_blocked`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (1809,37,38,'2007001354','JOKO SANTUSO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013007871','2013007871',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1810,37,34,'2006003909','IMRON GOZALI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013008416','2013008416',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1811,37,34,'2008420053','ADHIRAL JAMIL',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013009085','2013009085',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1812,36,31,'0','RONI FIRMANSYAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013009122','2013009122',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1813,50,22,'0','WAHYU BUDI UTOMO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013010959','2013010959',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1814,36,23,'2002001539','IRWAN MUJI HARTANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013012128','2013012128',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1815,37,34,'2008420053','MUHDORI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013014011','2013014011',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1816,56,26,'2012096349','ANDI ROBBIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013019006','2013019006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1817,37,1,'2005008378','YAHYA SUGIHARTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013020593','2013020593',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1818,52,34,'2006003909','RAHMAT',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013025848','2013025848',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1819,37,31,'2001006830','HENGKI VERNANDO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013026015','2013026015',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1820,37,26,'2012096349','RIO BELLA PRESTIAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013026299','2013026299',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1821,36,1,'2005008378','WILDAN RIFQI ANANTA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013026300','2013026300',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1822,37,1,'2005008376','HARIR AZHAR APRIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013030507','2013030507',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1823,40,25,'2008420060','SITI AISYAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013031202','2013031202',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1824,52,34,'2006003909','IWAN WAHYUDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013033457','2013033457',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1825,37,38,'2007001354','SRI ADI PANOTOGOMO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013035315','2013035315',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1826,37,38,'2007001354','RISKI ANDIKA KELANA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013035805','2013035805',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1827,37,38,'2007001354','AFIAN FIRDAUS',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013036647','2013036647',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1828,52,34,'2006003909','ELY MARWANDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013036649','2013036649',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1829,52,34,'2006003909','ZAENAL ABIDIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013036652','2013036652',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1830,37,30,'1999000546','GUNAWAN CHANIAGO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013037024','2013037024',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1831,52,34,'2006003909','DWI SATRIA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013037664','2013037664',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1832,37,38,'2007001354','ROBIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013037666','2013037666',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1833,37,38,'2007001354','BOBY ARDIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013040374','2013040374',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1834,37,31,'2001006830','MOHAMMAD NASRULLAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013040512','2013040512',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1835,55,24,'0','MUHAMMAD HADI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013055613','2013055613',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1836,37,24,'0','ICHSAN NUR JAYADI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013059156','2013059156',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1837,37,24,'0','M LASTRIO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013059333','2013059333',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1838,41,31,'0','ANDIK SUGIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013059824','2013059824',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1839,37,1,'2005008376','AHMAD MUHLISIN JAFAR',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013076153','2013076153',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1840,37,1,'2005008376','SETIAWAN PANGESTU SUKIRNO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013082046','2013082046',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1841,35,11,'2013020270','ARIFUR RAHMAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013086432','2013086432',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1842,35,31,'1999004043','NURHADI JAKAL SATRIYA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013086434','2013086434',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1843,37,31,'2007414125','NURUL ARISANDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013089778','2013089778',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1844,37,31,'2007414125','MASTOMI HUSRIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013091377','2013091377',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1845,49,34,'2006003909','MOCHAMMAD HAFID NASYIR',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013091379','2013091379',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1846,49,34,'2006003909','MOH FAUZI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013091380','2013091380',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1847,37,31,'0','ANNISA AMALIA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013098053','2013098053',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1848,36,33,'2006008099','ANDY CAHYO PRASETYO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013099060','2013099060',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1849,37,1,'2005008376','ANDI CAHYA KUSUMA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013101177','2013101177',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1850,37,1,'2005008378','MOH AKBAR RIZKI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013101178','2013101178',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1851,37,38,'2007001354','MOH RONI YULIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013101179','2013101179',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1852,37,30,'1999000546','ACHMAD FAUZEN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013102205','2013102205',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1853,37,38,'2007001354','MOHAMAD MIFTAKHUL KHOIR',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013102483','2013102483',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1854,52,34,'2006003909','HARIS HERMAWANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013105547','2013105547',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1855,39,25,'2005008158','ABDUR RAHMAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013110311','2013110311',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1856,40,25,'2005008158','MOHAMMAD HAFIDZ',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013110313','2013110313',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1857,37,31,'2013086434','NUR INDAH RAHMAWATI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013121926','2013121926',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1858,37,38,'2007001354','M HUDORI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013122459','2013122459',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1859,37,38,'2007001354','SYAHRUN NABAWI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013122464','2013122464',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1860,37,31,'2001006830','QODLY HIDAYATULLAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013122521','2013122521',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1861,41,34,'2011010139','ACH SATRIA MAFAZA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013133332','2013133332',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1862,37,38,'2007001354','HERU APRIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013144276','2013144276',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1863,37,38,'2007001354','MOH MUIS',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013144277','2013144277',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1864,45,12,'2007414334','ANDRE KHOERUL ADHA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013148455','2013148455',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1865,39,25,'2008420060','SAMSUL ARIFIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013148488','2013148488',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1866,37,34,'2007003959','ABD HAMID',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013149457','2013149457',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1867,37,23,'2006008309','ABDUR RAHMAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013149458','2013149458',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1868,42,11,'2013086432','SIWI HAPSARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013151188','2013151188',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1869,37,34,'2008420053','FERI HENDRA IRAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013151504','2013151504',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1870,39,25,'2005008158','MOHAMAD RIZAL',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013153531','2013153531',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1871,37,38,'2007001354','SAIFUL HUDA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013153532','2013153532',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1872,37,12,'2007001355','KIKI LUKITA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013154694','2013154694',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1873,37,1,'2005008376','ZAINAL ALIM',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013157997','2013157997',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1874,37,38,'2007001354','FIRZA RIALDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013161134','2013161134',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1875,37,31,'2005008165','NOVI RATNASARI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013166924','2013166924',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1876,57,33,'2013086432','M RIZAL FAHMI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013168175','2013168175',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1877,52,34,'2006003909','EKO JAINURI RAHMAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013171578','2013171578',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1878,37,34,'2011010139','HAMDANI HIDAYATULLAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013171579','2013171579',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1879,52,34,'2006003909','MOCHAMMAD ROFIK',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013171580','2013171580',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1880,39,25,'2008420060','NIERAYU EKA CANDRA KIRANA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013188371','2013188371',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1881,49,34,'2006003909','HAFID ALAMSYA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013192154','2013192154',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1882,49,34,'2006003909','SAIFUL ROHMAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013192155','2013192155',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1883,37,25,'2000004085','SRI PUJI RAHAYU',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013193734','2013193734',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1884,39,25,'2005008158','MILA AYUNINGRUM',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013195984','2013195984',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1885,37,33,'2006008099','AWIN TAMMAH MAULIDA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013196121','2013196121',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1886,37,26,'2012096349','CHRISMA EBBY MILLER',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013197157','2013197157',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1887,37,38,'2007001354','IGUSTI ABDAUS SOLIHIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013197694','2013197694',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1888,37,38,'2007003834','RIZAL MUARIF',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013202974','2013202974',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1889,37,38,'2007001354','HENDRIK KURNIAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013202978','2013202978',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1890,37,38,'2007001354','IWAN FEBRIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013202979','2013202979',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1891,37,38,'2007003834','SULTAN OKTAF BERNAZI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013203938','2013203938',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1892,37,1,'2005008376','YOGI ISMAIL',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013205786','2013205786',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1893,37,33,'2010019682','ADIF FIQROH MIFTAHUL AGIL',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013208252','2013208252',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1894,37,31,'2001006830','RIZALDI ADISTYA PAMUNGKAS',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013208253','2013208253',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1895,37,31,'2001006830','MOHAMMAD INDRA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013208254','2013208254',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1896,37,31,'2013086434','AFAN FERDIANSYAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013208255','2013208255',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1897,37,26,'2012096349','RAHMATULLAH INSANI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013210610','2013210610',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1898,37,26,'2012096349','FATAH ARI BIANSYAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013214046','2013214046',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1899,37,26,'2012096349','RUDI HARTONO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013214049','2013214049',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1900,37,31,'2007414020','ANTON PRASTYO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013215988','2013215988',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1901,37,38,'2007001354','AGUS FAMUJI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013218477','2013218477',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1902,37,1,'2005008378','ARIF YAHYA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013221335','2013221335',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1903,37,31,'1999001171','FAJRIN FIBRYANTI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013235692','2013235692',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1904,37,34,'2011010139','RIKO SATRIO NUGROHO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013235694','2013235694',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1905,37,31,'1999001171','RIZAL RIZKY ILMIAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013235695','2013235695',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1906,37,38,'2007001354','MUHAMMAD FATHUR ROHMAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015002032','2015002032',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1907,44,11,'2013086432','WIWIN DWI RAHAYU',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015004520','2015004520',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1908,37,1,'2005008376','ZANUAR RAHMAT HIDAYAT',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015005054','2015005054',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1909,37,38,'2007001354','MUHAMMAD NIMAL FATA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015005823','2015005823',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1910,37,38,'2007001354','MUHAMMAD SULAIMAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015005828','2015005828',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1911,37,38,'2007001354','DOROTHY STEVEN VICTORY TAEKAS',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015005832','2015005832',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1912,37,38,'2007001354','MOHAMMAD IMRON MAULANA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015005838','2015005838',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1913,37,33,'2013086432','LAILIYATUL MUNAWAROH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015008138','2015008138',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1914,37,38,'2007001354','IQBAL CHAIRUDIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015009191','2015009191',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1915,49,34,'2006003909','MOHAMAD ROKUM',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015011263','2015011263',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1916,46,11,'2013086432','SITI ROFIATUS SHOLEHA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015012661','2015012661',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1917,37,1,'2005008376','ARIZAL DWI FARISKI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015014179','2015014179',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1918,37,1,'2005008376','HAIRUDDIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015014180','2015014180',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1919,42,11,'2013086432','ASHRIEN ZYIRAH YUNIAR',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015036786','2015036786',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1920,36,35,'2008420097','ALYA SALSABILA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015049375','2015049375',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1921,37,1,'2005008376','MUHAMMAD AGUNG RIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015057341','2015057341',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1922,37,1,'2005008376','AHMAD ISRON ERFANDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015059385','2015059385',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1923,39,25,'2005008158','LULUK NURUL AIZZAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015063336','2015063336',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1924,45,12,'2007414334','FIRMANSYAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015069376','2015069376',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1925,51,34,'2008420053','YESINTA DIAN AYUNING DEWI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015074104','2015074104',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1926,37,38,'2007001354','ARONA IRONAKA AM',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015074540','2015074540',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1927,37,38,'2007001354','MOH SUBAIDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015074771','2015074771',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1928,37,38,'2007003934','FERDIYANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015075019','2015075019',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1929,36,35,'2012028239','RISKI NURHIDAYAT',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015078475','2015078475',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1930,37,1,'2005008376','WAHYU DIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015078636','2015078636',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1931,45,12,'2007414334','SABDA SABARILAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015079418','2015079418',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1932,37,1,'2005008376','FATHOR ROSI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015081495','2015081495',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1933,37,26,'2012096349','RIFAN ARIFIN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015085820','2015085820',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1934,37,1,'2005008376','BAYU NOFIANDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015093812','2015093812',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1935,36,26,'2012096349','JANUAR PRIHANTORO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015099972','2015099972',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1936,37,34,'2008420053','SITI NURFADILAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015109925','2015109925',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1937,37,34,'2007003959','GUSMAN WAHYU HIDAYATULLAH',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015124354','2015124354',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1938,45,12,'2007414334','MUHAMMAD ERVAN EFENDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015130505','2015130505',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1939,45,12,'2007414334','MOH ABDULLAH AGIL',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015145904','2015145904',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1940,37,38,'2007001354','ABDUL HAFIDZ',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015147282','2015147282',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1941,37,38,'2007001354','RAHMAD HIDAYAD',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015147286','2015147286',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1942,37,38,'2007001354','HOIRUL ANAM',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015147290','2015147290',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1943,34,33,'2012026543','ANDHIKA RESPATI BAGASWARA',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013020270','2013020270',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (1949,34,34,'2012026543','BASUKI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2004002725','2004002725',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2034,34,13,'2012026543','SAMUEL GIAN LUCA ENDICO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2015027708','2015027708',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2036,34,31,'2012026543','SINGGIH EHRDIANTO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'1999004043','1999004043',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2083,34,1,'2012026543','DENI ARY WAHYUDI',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2001001701','2001001701',NULL,NULL,NULL,NULL,NULL,NULL,'Jangan dulu mengatakan “tidak mampu” sebelum Anda berusaha menjadikan diri Anda mampu.','0',NULL,'0000-00-00 00:00:00','2019-07-18 12:00:02'),
 (2120,34,35,'2012026543','ARIF DARMAWAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013030174','2013030174',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2180,34,38,'2012026543','PANJI PRASETIYO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'2013116895','2013116895',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2254,34,24,'2012026543','AGUS SUBAGIO',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'1998000725','1998000725',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2265,34,26,'2012026543','BUDIMAN',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy',NULL,'1998000104','1998000104',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2284,33,32,'0','Agustinus Antya Aruna',NULL,'$2y$10$VS70b6JgDHhlI.cE3LHkFuN.DmqOpFxn672XAEsOakKSTPbLJXAXy','bm@jbr.indomaret.co.id','2012026543','2012026543',NULL,NULL,'-',NULL,NULL,NULL,NULL,'0',NULL,'2019-06-28 11:27:17','2019-06-28 11:27:27');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of table `users_group`
--

DROP TABLE IF EXISTS `users_group`;
CREATE TABLE `users_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_group` varchar(45) NOT NULL DEFAULT '',
  `fullname` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_group`
--

/*!40000 ALTER TABLE `users_group` DISABLE KEYS */;
INSERT INTO `users_group` (`id`,`name_group`,`fullname`) VALUES 
 (1,'ADMINISTRATOR','ADMINISTRATOR'),
 (13,'REDAKSI','REDAKSI');
/*!40000 ALTER TABLE `users_group` ENABLE KEYS */;


--
-- Definition of table `users_photo`
--

DROP TABLE IF EXISTS `users_photo`;
CREATE TABLE `users_photo` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_users` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_photo`
--

/*!40000 ALTER TABLE `users_photo` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_photo` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
