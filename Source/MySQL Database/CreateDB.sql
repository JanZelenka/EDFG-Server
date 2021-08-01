CREATE DATABASE  IF NOT EXISTS `faction_guard` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `faction_guard`;
-- MySQL dump 10.13  Distrib 5.7.31, for macos10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: faction_guard
-- ------------------------------------------------------
-- Server version	5.7.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `_template`
--
-- ORDER BY:  `id`

LOCK TABLES `_template` WRITE;
/*!40000 ALTER TABLE `_template` DISABLE KEYS */;
/*!40000 ALTER TABLE `_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `bgs_tick`
--
-- ORDER BY:  `id`

LOCK TABLES `bgs_tick` WRITE;
/*!40000 ALTER TABLE `bgs_tick` DISABLE KEYS */;
INSERT INTO `bgs_tick` (`id`, `ebgsId`, `lastCheckOn`, `updatedOn`, `zzzCreatedBy`, `zzzCreatedOn`, `zzzModifiedBy`, `zzzModifiedOn`) VALUES (1,'61020ec74848940774387575','2021-07-29 23:29:18','2021-07-29 01:27:39',NULL,'2021-07-29 20:23:58',NULL,'2021-07-29 21:29:18'),(2,'61035f9e4848940774387576','2021-07-30 13:10:38','2021-07-30 01:56:17',NULL,'2021-07-30 11:10:38',NULL,'2021-07-30 11:10:38'),(3,'6104affa4848940774387577','2021-07-31 21:01:00','2021-07-31 01:35:17',NULL,'2021-07-31 19:01:00',NULL,'2021-07-31 19:01:00'),(4,'61060dee4848940774387578','2021-08-01 17:39:13','2021-08-01 02:09:44',NULL,'2021-08-01 10:07:43',NULL,'2021-08-01 15:39:13');
/*!40000 ALTER TABLE `bgs_tick` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `commander`
--
-- ORDER BY:  `id`

LOCK TABLES `commander` WRITE;
/*!40000 ALTER TABLE `commander` DISABLE KEYS */;
INSERT INTO `commander` (`id`, `user_id`, `name`, `zzz_created_by`, `zzz_created_on`, `zzz_modified_by`, `zzz_modified_on`) VALUES (1,1,'Greno Zee',0,'2018-02-22 22:42:24',0,'2018-02-22 22:42:24');
/*!40000 ALTER TABLE `commander` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `language`
--
-- ORDER BY:  `id`

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` (`id`, `is_supported`, `iso_639_2`, `iso_639_3b`, `iso_639_3t`, `name`) VALUES (1,0,'al','alp',NULL,'English'),(2,0,'aa','aar',NULL,'Afar'),(3,0,'ab','abk',NULL,'Abkhazian'),(4,0,'af','afr',NULL,'Afrikaans'),(5,0,'ak','aka',NULL,'Akan'),(6,0,'sq','alb',NULL,'Albanian'),(7,0,'am','amh',NULL,'Amharic'),(8,0,'ar','ara',NULL,'Arabic'),(9,0,'an','arg',NULL,'Aragonese'),(10,0,'hy','arm',NULL,'Armenian'),(11,0,'as','asm',NULL,'Assamese'),(12,0,'av','ava',NULL,'Avaric'),(13,0,'ae','ave',NULL,'Avestan'),(14,0,'ay','aym',NULL,'Aymara'),(15,0,'az','aze',NULL,'Azerbaijani'),(16,0,'ba','bak',NULL,'Bashkir'),(17,0,'bm','bam',NULL,'Bambara'),(18,0,'eu','baq',NULL,'Basque'),(19,0,'be','bel',NULL,'Belarusian'),(20,0,'bn','ben',NULL,'Bengali'),(21,0,'bh','bih',NULL,'Bihari languages'),(22,0,'bi','bis',NULL,'Bislama'),(23,0,'bs','bos',NULL,'Bosnian'),(24,0,'br','bre',NULL,'Breton'),(25,0,'bg','bul',NULL,'Bulgarian'),(26,0,'my','bur',NULL,'Burmese'),(27,0,'ca','cat',NULL,'Catalan; Valencian'),(28,0,'ch','cha',NULL,'Chamorro'),(29,0,'ce','che',NULL,'Chechen'),(30,0,'zh','chi',NULL,'Chinese'),(31,0,'cu','chu',NULL,'Church Slavic; Old Slavonic; Church Slavonic; Old Bulgarian; Old Church Slavonic'),(32,0,'cv','chv',NULL,'Chuvash'),(33,0,'kw','cor',NULL,'Cornish'),(34,0,'co','cos',NULL,'Corsican'),(35,0,'cr','cre',NULL,'Cree'),(36,1,'cs','cze',NULL,'Czech'),(37,0,'da','dan',NULL,'Danish'),(38,0,'dv','div',NULL,'Divehi; Dhivehi; Maldivian'),(39,0,'nl','dut',NULL,'Dutch; Flemish'),(40,0,'dz','dzo',NULL,'Dzongkha'),(41,1,'en','eng',NULL,'English'),(42,0,'eo','epo',NULL,'Esperanto'),(43,0,'et','est',NULL,'Estonian'),(44,0,'ee','ewe',NULL,'Ewe'),(45,0,'fo','fao',NULL,'Faroese'),(46,0,'fj','fij',NULL,'Fijian'),(47,1,'fi','fin',NULL,'Finnish'),(48,1,'fr','fre',NULL,'French'),(49,0,'fy','fry',NULL,'Western Frisian'),(50,0,'ff','ful',NULL,'Fulah'),(51,0,'ka','geo',NULL,'Georgian'),(52,0,'de','ger',NULL,'German'),(53,0,'gd','gla',NULL,'Gaelic; Scottish Gaelic'),(54,0,'ga','gle',NULL,'Irish'),(55,0,'gl','glg',NULL,'Galician'),(56,0,'gv','glv',NULL,'Manx'),(57,0,'el','gre',NULL,'Greek, Modern (1453-)'),(58,0,'gn','grn',NULL,'Guarani'),(59,0,'gu','guj',NULL,'Gujarati'),(60,0,'ht','hat',NULL,'Haitian; Haitian Creole'),(61,0,'ha','hau',NULL,'Hausa'),(62,0,'he','heb',NULL,'Hebrew'),(63,0,'hz','her',NULL,'Herero'),(64,0,'hi','hin',NULL,'Hindi'),(65,0,'ho','hmo',NULL,'Hiri Motu'),(66,0,'hr','hrv',NULL,'Croatian'),(67,0,'hu','hun',NULL,'Hungarian'),(68,0,'ig','ibo',NULL,'Igbo'),(69,0,'is','ice',NULL,'Icelandic'),(70,0,'io','ido',NULL,'Ido'),(71,0,'ii','iii',NULL,'Sichuan Yi; Nuosu'),(72,0,'iu','iku',NULL,'Inuktitut'),(73,0,'ie','ile',NULL,'Interlingue; Occidental'),(74,0,'ia','ina',NULL,'Interlingua (International Auxiliary Language Association)'),(75,0,'id','ind',NULL,'Indonesian'),(76,0,'ik','ipk',NULL,'Inupiaq'),(77,1,'it','ita',NULL,'Italian'),(78,0,'jv','jav',NULL,'Javanese'),(79,0,'ja','jpn',NULL,'Japanese'),(80,0,'kl','kal',NULL,'Kalaallisut; Greenlandic'),(81,0,'kn','kan',NULL,'Kannada'),(82,0,'ks','kas',NULL,'Kashmiri'),(83,0,'kr','kau',NULL,'Kanuri'),(84,0,'kk','kaz',NULL,'Kazakh'),(85,0,'km','khm',NULL,'Central Khmer'),(86,0,'ki','kik',NULL,'Kikuyu; Gikuyu'),(87,0,'rw','kin',NULL,'Kinyarwanda'),(88,0,'ky','kir',NULL,'Kirghiz; Kyrgyz'),(89,0,'kv','kom',NULL,'Komi'),(90,0,'kg','kon',NULL,'Kongo'),(91,0,'ko','kor',NULL,'Korean'),(92,0,'kj','kua',NULL,'Kuanyama; Kwanyama'),(93,0,'ku','kur',NULL,'Kurdish'),(94,0,'lo','lao',NULL,'Lao'),(95,0,'la','lat',NULL,'Latin'),(96,0,'lv','lav',NULL,'Latvian'),(97,0,'li','lim',NULL,'Limburgan; Limburger; Limburgish'),(98,0,'ln','lin',NULL,'Lingala'),(99,0,'lt','lit',NULL,'Lithuanian'),(100,0,'lb','ltz',NULL,'Luxembourgish; Letzeburgesch'),(101,0,'lu','lub',NULL,'Luba-Katanga'),(102,0,'lg','lug',NULL,'Ganda'),(103,0,'mk','mac',NULL,'Macedonian'),(104,0,'mh','mah',NULL,'Marshallese'),(105,0,'ml','mal',NULL,'Malayalam'),(106,0,'mi','mao',NULL,'Maori'),(107,0,'mr','mar',NULL,'Marathi'),(108,0,'ms','may',NULL,'Malay'),(109,0,'mg','mlg',NULL,'Malagasy'),(110,0,'mt','mlt',NULL,'Maltese'),(111,0,'mn','mon',NULL,'Mongolian'),(112,0,'na','nau',NULL,'Nauru'),(113,0,'nv','nav',NULL,'Navajo; Navaho'),(114,0,'nr','nbl',NULL,'Ndebele, South; South Ndebele'),(115,0,'nd','nde',NULL,'Ndebele, North; North Ndebele'),(116,0,'ng','ndo',NULL,'Ndonga'),(117,0,'ne','nep',NULL,'Nepali'),(118,0,'nn','nno',NULL,'Norwegian Nynorsk; Nynorsk, Norwegian'),(119,0,'nb','nob',NULL,'Bokmål, Norwegian; Norwegian Bokmål'),(120,0,'no','nor',NULL,'Norwegian'),(121,0,'ny','nya',NULL,'Chichewa; Chewa; Nyanja'),(122,0,'oc','oci',NULL,'Occitan (post 1500); Provençal'),(123,0,'oj','oji',NULL,'Ojibwa'),(124,0,'or','ori',NULL,'Oriya'),(125,0,'om','orm',NULL,'Oromo'),(126,0,'os','oss',NULL,'Ossetian; Ossetic'),(127,0,'pa','pan',NULL,'Panjabi; Punjabi'),(128,0,'fa','per',NULL,'Persian'),(129,0,'pi','pli',NULL,'Pali'),(130,0,'pl','pol',NULL,'Polish'),(131,0,'pt','por',NULL,'Portuguese'),(132,0,'ps','pus',NULL,'Pushto; Pashto'),(133,0,'qu','que',NULL,'Quechua'),(134,0,'rm','roh',NULL,'Romansh'),(135,0,'ro','rum',NULL,'Romanian; Moldavian; Moldovan'),(136,0,'rn','run',NULL,'Rundi'),(137,0,'ru','rus',NULL,'Russian'),(138,0,'sg','sag',NULL,'Sango'),(139,0,'sa','san',NULL,'Sanskrit'),(140,0,'si','sin',NULL,'Sinhala; Sinhalese'),(141,0,'sk','slo',NULL,'Slovak'),(142,0,'sl','slv',NULL,'Slovenian'),(143,0,'se','sme',NULL,'Northern Sami'),(144,0,'sm','smo',NULL,'Samoan'),(145,0,'sn','sna',NULL,'Shona'),(146,0,'sd','snd',NULL,'Sindhi'),(147,0,'so','som',NULL,'Somali'),(148,0,'st','sot',NULL,'Sotho, Southern'),(149,0,'es','spa',NULL,'Spanish; Castilian'),(150,0,'sc','srd',NULL,'Sardinian'),(151,0,'sr','srp',NULL,'Serbian'),(152,0,'ss','ssw',NULL,'Swati'),(153,0,'su','sun',NULL,'Sundanese'),(154,0,'sw','swa',NULL,'Swahili'),(155,0,'sv','swe',NULL,'Swedish'),(156,0,'ty','tah',NULL,'Tahitian'),(157,0,'ta','tam',NULL,'Tamil'),(158,0,'tt','tat',NULL,'Tatar'),(159,0,'te','tel',NULL,'Telugu'),(160,0,'tg','tgk',NULL,'Tajik'),(161,0,'tl','tgl',NULL,'Tagalog'),(162,0,'th','tha',NULL,'Thai'),(163,0,'bo','tib',NULL,'Tibetan'),(164,0,'ti','tir',NULL,'Tigrinya'),(165,0,'to','ton',NULL,'Tonga (Tonga Islands)'),(166,0,'tn','tsn',NULL,'Tswana'),(167,0,'ts','tso',NULL,'Tsonga'),(168,0,'tk','tuk',NULL,'Turkmen'),(169,0,'tr','tur',NULL,'Turkish'),(170,0,'tw','twi',NULL,'Twi'),(171,0,'ug','uig',NULL,'Uighur; Uyghur'),(172,0,'uk','ukr',NULL,'Ukrainian'),(173,0,'ur','urd',NULL,'Urdu'),(174,0,'uz','uzb',NULL,'Uzbek'),(175,0,'ve','ven',NULL,'Venda'),(176,0,'vi','vie',NULL,'Vietnamese'),(177,0,'vo','vol',NULL,'Volapük'),(178,0,'cy','wel',NULL,'Welsh'),(179,0,'wa','wln',NULL,'Walloon'),(180,0,'wo','wol',NULL,'Wolof'),(181,0,'xh','xho',NULL,'Xhosa'),(182,0,'yi','yid',NULL,'Yiddish'),(183,0,'yo','yor',NULL,'Yoruba'),(184,0,'za','zha',NULL,'Zhuang; Chuang'),(185,0,'zu','zul',NULL,'Zulu');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `minor_faction`
--
-- ORDER BY:  `id`

LOCK TABLES `minor_faction` WRITE;
/*!40000 ALTER TABLE `minor_faction` DISABLE KEYS */;
INSERT INTO `minor_faction` (`id`, `ebgsId`, `eddbId`, `allegiance`, `government`, `lastCheckOn`, `name`, `updatedOn`, `zzzCreatedBy`, `zzzCreatedOn`, `zzzModifiedBy`, `zzzModifiedOn`) VALUES (1,'59e7bb5fd22c775be0fe9c55',75239,'independent','democracy','2021-08-01 17:41:22','Beasts of Bestia','2021-08-01 15:36:38',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24');
/*!40000 ALTER TABLE `minor_faction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `minor_faction_presence`
--
-- ORDER BY:  `id`

LOCK TABLES `minor_faction_presence` WRITE;
/*!40000 ALTER TABLE `minor_faction_presence` DISABLE KEYS */;
INSERT INTO `minor_faction_presence` (`id`, `ebgsSystemId`, `influence`, `minorFactionId`, `starSystemId`, `updatedOn`, `zzzCreatedBy`, `zzzCreatedOn`, `zzzModifiedBy`, `zzzModifiedOn`) VALUES (1,'59ea5533d22c775be0b5b215',0.66169,1,1,'2021-08-01 12:05:50',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(2,'59e943a9d22c775be0ac0770',0.65514,1,2,'2021-08-01 06:43:36',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(3,'59e801ced22c775be000506a',0.56596,1,3,'2021-08-01 11:42:03',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(4,'59e862e5d22c775be0015c00',0.23031,1,4,'2021-08-01 11:55:27',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(5,'59e7bb5fd22c775be0fe9c3e',0.73486,1,5,'2021-08-01 06:36:54',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(6,'59eb3977d22c775be0b8644e',0.14585,1,6,'2021-08-01 01:07:20',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(7,'59e90fe4d22c775be03d99bc',0.21236,1,7,'2021-07-25 12:00:20',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(8,'59e943fcd22c775be0ae0381',0.54781,1,8,'2021-08-01 15:31:59',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(9,'59e7ff6ad22c775be00045cb',0.10643,1,9,'2021-08-01 00:56:53',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(10,'59eaeac8d22c775be0b77b37',0.63069,1,10,'2021-08-01 13:45:14',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 14:40:56'),(11,'59e8637ed22c775be0015dd9',0.15996,1,11,'2021-08-01 06:38:06',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(12,'59eb5c35d22c775be0b90e2e',0.17928,1,12,'2021-07-29 01:43:50',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(13,'59e8f24ed22c775be0081cac',0.56784,1,13,'2021-08-01 12:29:30',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(14,'59e7d0cfd22c775be0ff4af3',0.47695,1,14,'2021-08-01 15:36:38',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(15,'59e7a884d22c775be0fe47a7',0.30838,1,15,'2021-08-01 10:59:19',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(16,'59e91099d22c775be03ed486',0.61145,1,16,'2021-08-01 06:33:51',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(17,'59ea42acd22c775be09dbbe2',0.71371,1,17,'2021-08-01 06:47:29',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(18,'59e8f1ddd22c775be0076453',0.07278,1,18,'2021-08-01 11:21:04',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(19,'59e902c8d22c775be0252e0e',0.05996,1,19,'2021-08-01 06:44:28',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(20,'59e7bff7d22c775be0fecf62',0.16932,1,20,'2021-07-31 19:20:25',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(21,'59eb98c1d22c775be0c39755',0.13200,1,21,'2021-08-01 10:36:35',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(22,'59ebbcd3d22c775be005e867',0.09590,1,22,'2021-08-01 04:14:05',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(23,'59e7a65fd22c775be0fe1a9f',0.11700,1,23,'2021-07-31 23:32:21',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(24,'59e7c01dd22c775be0fed03c',0.16434,1,24,'2021-08-01 03:53:09',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00'),(25,'59ea1b67d22c775be09a3bfe',0.09500,1,25,'2021-07-31 22:39:20',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 13:39:00');
/*!40000 ALTER TABLE `minor_faction_presence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `oauth_access_tokens`
--
-- ORDER BY:  `access_token`

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `oauth_authorization_codes`
--
-- ORDER BY:  `authorization_code`

LOCK TABLES `oauth_authorization_codes` WRITE;
/*!40000 ALTER TABLE `oauth_authorization_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_authorization_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `oauth_scopes`
--
-- ORDER BY:  `scope`

LOCK TABLES `oauth_scopes` WRITE;
/*!40000 ALTER TABLE `oauth_scopes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_scopes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `security_privilege`
--
-- ORDER BY:  `id`

LOCK TABLES `security_privilege` WRITE;
/*!40000 ALTER TABLE `security_privilege` DISABLE KEYS */;
INSERT INTO `security_privilege` (`id`, `name`, `zzz_created_by`, `zzz_created_on`, `zzz_modified_by`, `zzz_modified_on`) VALUES (1,'full access',NULL,'2018-02-22 23:27:26',NULL,'2018-04-12 07:16:23'),(2,'user manager',NULL,'2018-02-22 23:27:26',NULL,'2018-04-12 07:16:23'),(3,'mission manager',NULL,'2018-02-22 23:27:26',NULL,'2018-04-12 07:16:23'),(4,'mission translator',NULL,'2018-02-24 12:57:42',NULL,'2018-04-12 07:16:23'),(5,'relations manager',NULL,'2018-04-12 07:12:56',NULL,'2018-04-12 07:16:23');
/*!40000 ALTER TABLE `security_privilege` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `security_role`
--
-- ORDER BY:  `id`

LOCK TABLES `security_role` WRITE;
/*!40000 ALTER TABLE `security_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `security_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `security_role_privilege`
--
-- ORDER BY:  `id`

LOCK TABLES `security_role_privilege` WRITE;
/*!40000 ALTER TABLE `security_role_privilege` DISABLE KEYS */;
/*!40000 ALTER TABLE `security_role_privilege` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `star_system`
--
-- ORDER BY:  `id`

LOCK TABLES `star_system` WRITE;
/*!40000 ALTER TABLE `star_system` DISABLE KEYS */;
INSERT INTO `star_system` (`id`, `minorFactionId_Controlling`, `allegiance`, `coordX`, `coordY`, `coordZ`, `ebgsId`, `economyPrimary`, `economySecondary`, `eddbId`, `lastCheckOn`, `mainStarClass`, `mainStarIsScoopable`, `name`, `population`, `security`, `state`, `updatedOn`, `zzzCreatedBy`, `zzzCreatedOn`, `zzzModifiedBy`, `zzzModifiedOn`) VALUES (1,NULL,'independent',-21.0625,-15.75,-91.75,'59ea5533d22c775be0b5b215','$economy_hightech;','$economy_refinery;',17904,'2021-08-01 17:41:23','M (Red dwarf) Star',1,'Tote',15927631,'$system_security_high;','none','2021-08-01 12:05:50',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(2,NULL,'independent',-25.1875,-14.5,-81.8438,'59e943a9d22c775be0ac0770','$economy_refinery;','$economy_colony;',12558,'2021-08-01 17:41:23','K (Yellow-Orange) Star',1,'LTT 11383',450009,'$system_security_medium;','war','2021-08-01 06:43:36',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(3,NULL,'independent',-18.875,-17.0625,-79.6875,'59e801ced22c775be000506a','$economy_agri;','$economy_extraction;',12357,'2021-08-01 17:41:23','M (Red dwarf) Star',1,'LP 302-22',2147483647,'$system_security_high;','war','2021-08-01 06:42:13',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(4,NULL,'federation',-21.1875,-5.25,-75.3125,'59e862e5d22c775be0015c00','$economy_industrial;','$economy_extraction;',9114,'2021-08-01 17:41:23','K (Yellow-Orange) Star',1,'Hoder',7519601,'$system_security_medium;','none','2021-08-01 11:55:27',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(5,NULL,'independent',-21.125,-8.6875,-100.688,'59e7bb5fd22c775be0fe9c3e','$economy_colony;','$economy_refinery;',4789,'2021-08-01 17:41:23','G (White-Yellow) Star',1,'Fimbulwinter',192725,'$system_security_medium;','civilliberty','2021-08-01 06:36:54',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(6,NULL,'independent',-12.9688,-27.0312,-88.3125,'59eb3977d22c775be0b8644e','$economy_industrial;','$economy_none;',19347,'2021-08-01 17:41:24','T Tauri Star',0,'Xang Tzu',1414663,'$system_security_low;','boom','2021-08-01 01:07:20',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(7,NULL,'independent',-21.75,-33.4375,-93.0625,'59e90fe4d22c775be03d99bc','$economy_refinery;','$economy_none;',5094,'2021-08-01 17:41:23','L (Brown dwarf) Star',0,'Garup',18185,'$system_security_medium;','expansion','2021-07-25 12:00:20',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(8,NULL,'independent',-36.0938,-1.46875,-84.5625,'59e943fcd22c775be0ae0381','$economy_industrial;','$economy_extraction;',2222,'2021-08-01 17:41:23','G (White-Yellow) Star',1,'Bestia',21554660,'$system_security_medium;','boom','2021-08-01 15:31:59',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(9,NULL,'federation',-1.15625,-24.8125,-101.094,'59e7ff6ad22c775be00045cb','$economy_extraction;','$economy_none;',16986,'2021-08-01 17:41:23','M (Red dwarf) Star',1,'Sisini',1481,'$system_security_low;','none','2021-08-01 00:56:53',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(10,NULL,'independent',-22.0312,2.9375,-89.4688,'59eaeac8d22c775be0b77b37','$economy_industrial;','$economy_refinery;',3527,'2021-08-01 17:41:24','K (Yellow-Orange) Star',1,'Clarus',19667579,'$system_security_high;','civilliberty','2021-08-01 13:45:14',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(11,NULL,'alliance',-39,-8.125,-87.75,'59e8637ed22c775be0015dd9','$economy_industrial;','$economy_refinery;',4897,'2021-08-01 17:41:23','G (White-Yellow) Star',1,'Furuhjelm III-674',39062174,'$system_security_high;','boom','2021-08-01 06:38:06',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(12,NULL,'independent',-3.84375,-33.6875,-83.4062,'59eb5c35d22c775be0b90e2e','$economy_colony;','$economy_none;',18912,'2021-08-01 17:41:24','T (Brown dwarf) Star',0,'Wayaliti',19334,'$system_security_low;','none','2021-07-29 01:43:50',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(13,NULL,'independent',-23.625,-10.75,-89.4688,'59e8f24ed22c775be0081cac','$economy_refinery;','$economy_refinery;',10679,'2021-08-01 17:41:23','K (Yellow-Orange) Star',1,'Khaima',388147,'$system_security_medium;','none','2021-08-01 12:29:30',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(14,NULL,'independent',-17.875,-11.75,-90.4375,'59e7d0cfd22c775be0ff4af3','$economy_agri;','$economy_industrial;',4342,'2021-08-01 17:41:23','M (Red dwarf) Star',1,'Dongkum',439405096,'$system_security_high;','none','2021-08-01 15:36:38',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(15,NULL,'independent',-23.1875,-2.625,-100.938,'59e7a884d22c775be0fe47a7','$economy_colony;','$economy_refinery;',3955,'2021-08-01 17:41:23','M (Red dwarf) Star',1,'Daga tri',50003,'$system_security_medium;','none','2021-08-01 10:59:19',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(16,NULL,'independent',-37.6875,-12.6875,-101.281,'59e91099d22c775be03ed486','$economy_industrial;','$economy_none;',2524,'2021-08-01 17:41:23','M (Red dwarf) Star',1,'Bondranses',3653551,'$system_security_low;','none','2021-07-31 19:58:29',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(17,NULL,'independent',-39.1875,-3.1875,-86,'59ea42acd22c775be09dbbe2','$economy_refinery;','$economy_extraction;',10026,'2021-08-01 17:41:23','G (White-Yellow) Star',1,'Jangore',65393,'$system_security_low;','famine','2021-08-01 11:59:10',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(18,NULL,'federation',-45.7812,-17,-90.2812,'59e8f1ddd22c775be0076453','$economy_colony;','$economy_none;',17261,'2021-08-01 17:41:23','M (Red dwarf) Star',1,'Sussche',19743,'$system_security_low;','none','2021-08-01 11:21:04',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(19,NULL,'independent',-13.625,-10.625,-75.25,'59e902c8d22c775be0252e0e','$economy_industrial;','$economy_refinery;',5228,'2021-08-01 17:41:23','K (Yellow-Orange) Star',1,'Girya Gu',3830263,'$system_security_medium;','none','2021-08-01 06:44:28',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(20,NULL,'independent',-7.71875,-32.9688,-88.125,'59e7bff7d22c775be0fecf62','$economy_extraction;','$economy_industrial;',239,'2021-08-01 17:41:23','A (Blue-White) Star',1,'50 Omega Tauri',10282492,'$system_security_medium;','none','2021-07-31 19:20:25',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(21,NULL,'independent',-37.0312,-17.0312,-117.688,'59eb98c1d22c775be0c39755','$economy_extraction;','$economy_none;',17698,'2021-08-01 17:41:24','K (Yellow-Orange) Star',1,'Thiini',6093,'$system_security_low;','lockdown','2021-08-01 10:36:35',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(22,NULL,'independent',-23.9062,5.1875,-80.6562,'59ebbcd3d22c775be005e867','$economy_industrial;','$economy_none;',14409,'2021-08-01 17:41:24','M (Red dwarf) Star',1,'Ngauna',6033432,'$system_security_low;','boom','2021-08-01 04:14:05',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(23,NULL,'independent',-38.5,-2.875,-67.8125,'59e7a65fd22c775be0fe1a9f','$economy_colony;','$economy_refinery;',1309,'2021-08-01 17:41:23','K (Yellow-Orange) Star',1,'Arnemil',55206,'$system_security_medium;','none','2021-07-31 23:32:21',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(24,NULL,'independent',-55.1875,-14.6562,-96.5625,'59e7c01dd22c775be0fed03c','$economy_industrial;','$economy_refinery;',19129,'2021-08-01 17:41:23','K (Yellow-Orange) Star',1,'Wolf 186',20567989,'$system_security_high;','boom','2021-08-01 03:53:09',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24'),(25,NULL,'independent',-45.9062,13.3125,-75.2188,'59ea1b67d22c775be09a3bfe','$economy_military;','$economy_refinery;',12500,'2021-08-01 17:41:23','M (Red dwarf) Star',1,'LP 84-34',66131,'$system_security_low;','none','2021-07-31 22:39:20',NULL,'2021-08-01 13:39:00',NULL,'2021-08-01 15:41:24');
/*!40000 ALTER TABLE `star_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--
-- ORDER BY:  `id`

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `language_id`, `password_hash`, `user_group_id`, `username`, `zzz_created_by`, `zzz_created_on`, `zzz_modified_by`, `zzz_modified_on`) VALUES (1,NULL,NULL,'$2y$10$H/qox2gWBQGY3NMtrVbwW.7uOQiJg1rUWRyx8K0aQWVCadv6OWSLa',NULL,'Greno Zee',0,'2018-02-22 22:42:24',0,'2018-02-22 22:42:24');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user_group`
--
-- ORDER BY:  `id`

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user_group_structure`
--
-- ORDER BY:  `id`

LOCK TABLES `user_group_structure` WRITE;
/*!40000 ALTER TABLE `user_group_structure` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_group_structure` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER child_count_insert BEFORE INSERT ON user_group_structure
  FOR EACH ROW BEGIN
    SET NEW.child_count = NEW.border_high - NEW.border_low;
  END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER child_count_update BEFORE UPDATE ON user_group_structure
  FOR EACH ROW BEGIN
    SET NEW.child_count = NEW.border_high - NEW.border_low;
  END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping data for table `user_security_role`
--
-- ORDER BY:  `id`

LOCK TABLES `user_security_role` WRITE;
/*!40000 ALTER TABLE `user_security_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_security_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'faction_guard'
--

--
-- Dumping routines for database 'faction_guard'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-01 17:56:03
