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
INSERT INTO `bgs_tick` (`id`, `ebgsId`, `lastCheckOn`, `updatedOn`, `zzzCreatedBy`, `zzzCreatedOn`, `zzzModifiedBy`, `zzzModifiedOn`) VALUES (1,'61020ec74848940774387575','2021-07-29 23:29:18','2021-07-29 01:27:39',NULL,'2021-07-29 20:23:58',NULL,'2021-07-29 21:29:18');
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
INSERT INTO `minor_faction` (`id`, `ebgsId`, `eddbId`, `allegiance`, `government`, `lastCheckOn`, `name`, `updatedOn`, `zzzCreatedBy`, `zzzCreatedOn`, `zzzModifiedBy`, `zzzModifiedOn`) VALUES (1,'59e7b92fd22c775be0fe80e0',75648,'independent','cooperative','2021-07-29 23:41:16','Inara Nexus','2021-07-29 21:07:40',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32');
/*!40000 ALTER TABLE `minor_faction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `minor_faction_presence`
--
-- ORDER BY:  `id`

LOCK TABLES `minor_faction_presence` WRITE;
/*!40000 ALTER TABLE `minor_faction_presence` DISABLE KEYS */;
INSERT INTO `minor_faction_presence` (`id`, `ebgsSystemId`, `influence`, `minorFactionId`, `starSystemId`, `updatedOn`, `zzzCreatedBy`, `zzzCreatedOn`, `zzzModifiedBy`, `zzzModifiedOn`) VALUES (1,'59e7b92fd22c775be0fe80bd',0.67765,1,1,'2021-07-29 19:39:07',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(2,'59e8a174d22c775be0023a17',0.57889,1,2,'2021-07-26 15:58:02',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(3,'59e8a1add22c775be0023c04',0.51804,1,3,'2021-07-28 02:38:59',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(4,'59e910d0d22c775be03f3dae',0.58573,1,4,'2021-06-25 22:08:06',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(5,'59e92918d22c775be06a29b4',0.69823,1,5,'2021-07-26 19:01:53',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(6,'59e96df1d22c775be0378abd',0.49645,1,6,'2021-07-28 20:25:00',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(7,'59e8b906d22c775be002aa86',0.43626,1,7,'2021-07-18 13:57:56',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(8,'59e9173dd22c775be04b1f3d',0.62069,1,8,'2021-06-16 15:36:16',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(9,'59e8a1e5d22c775be0023cd7',0.14741,1,9,'2021-07-26 15:50:14',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(10,'59e927a7d22c775be067af82',0.70230,1,10,'2021-07-25 02:57:57',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(11,'59ea7efdd22c775be0b675b4',0.47181,1,11,'2021-07-27 12:04:32',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(12,'59ec1004d22c775be0f21d39',0.20641,1,12,'2021-07-29 18:15:33',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(13,'59e9e22dd22c775be0995fba',0.50152,1,13,'2021-07-29 00:01:11',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(14,'59e982f1d22c775be07c41fb',0.12675,1,14,'2021-07-28 08:18:41',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(15,'59e8e24ad22c775be003930a',0.59151,1,15,'2021-07-28 20:24:17',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(16,'59e8ab56d22c775be00267d4',0.72637,1,16,'2021-07-29 20:54:55',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(17,'59e8b7f0d22c775be002a485',0.55798,1,17,'2021-07-28 14:44:47',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(18,'59e8b56bd22c775be00295fa',0.46982,1,18,'2021-07-10 00:11:59',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(19,'59e81949d22c775be000a2f7',0.58765,1,19,'2021-07-25 07:05:08',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(20,'59e8f184d22c775be006d74f',0.11542,1,20,'2021-07-25 15:05:33',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(21,'59e8f289d22c775be0087cb1',0.55070,1,21,'2021-07-21 11:03:19',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(22,'59f4c934d22c775be0e071f8',0.18600,1,22,'2021-07-19 18:17:59',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(23,'59ea544fd22c775be0b5ad22',0.12118,1,23,'2021-07-29 20:59:21',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(24,'59e8f614d22c775be00e0f8d',0.50397,1,24,'2021-07-27 16:30:32',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(25,'59e9fb97d22c775be099c985',0.64478,1,25,'2021-07-28 20:34:01',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(26,'59e805efd22c775be0005fdb',0.10090,1,26,'2021-07-29 11:41:00',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(27,'59e7d53ed22c775be0ff7108',0.71016,1,27,'2021-07-27 12:05:24',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(28,'59e9f5f0d22c775be099b59d',0.07503,1,28,'2021-07-26 21:15:25',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(29,'59e874f8d22c775be00194a7',0.13905,1,29,'2021-07-29 17:14:31',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(30,'59f5dbced22c775be079b7a6',0.21670,1,30,'2021-07-29 00:03:53',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(31,'59e8b684d22c775be0029c0d',0.12215,1,31,'2021-07-26 15:49:30',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(32,'59e8f194d22c775be006f03c',0.04096,1,32,'2021-07-26 15:55:24',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(33,'59e8d971d22c775be0035cc0',0.39200,1,33,'2021-07-27 19:33:33',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(34,'59eb3e11d22c775be0b879ed',0.11735,1,34,'2021-07-11 17:00:56',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(35,'5a95bdffd1b6a37c3c202dcf',0.09375,1,35,'2021-07-29 21:07:40',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(36,'59e9f591d22c775be099b472',0.08068,1,36,'2021-07-25 11:26:24',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(37,'59e8f10ed22c775be006323a',0.04270,1,37,'2021-07-28 23:35:51',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(38,'59ed2222d22c775be0beaaec',0.04196,1,38,'2021-07-27 19:49:53',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(39,'59e8f846d22c775be011bdd1',0.04644,1,39,'2021-07-23 04:12:37',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(40,'59e8b73cd22c775be0029fc7',0.19980,1,40,'2021-07-29 21:03:51',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(41,'59eb91e8d22c775be0ba116d',0.15784,1,41,'2021-07-23 03:41:23',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(42,'59ec3065d22c775be04f4646',0.21209,1,42,'2021-07-21 14:39:46',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(43,'59f10b13d22c775be06caf22',0.03582,1,43,'2021-07-11 22:30:01',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(44,'59ea2897d22c775be09a7eaa',0.05389,1,44,'2021-07-25 11:25:13',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(45,'59ecbde5d22c775be0512686',0.05800,1,45,'2021-07-29 15:43:32',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(46,'59e81673d22c775be0009843',0.04667,1,46,'2021-07-26 00:37:00',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(47,'59eb2431d22c775be0b80e80',0.04296,1,47,'2021-07-22 15:56:40',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(48,'59f38916d22c775be05bb9cf',0.03226,1,48,'2021-07-24 07:16:30',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(49,'59e8b0dfd22c775be0028052',0.06487,1,49,'2021-07-25 09:49:18',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(50,'59e82c79d22c775be000db26',0.08591,1,50,'2021-07-29 15:26:44',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32');
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
INSERT INTO `star_system` (`id`, `minorFactionId_Controlling`, `allegiance`, `coordX`, `coordY`, `coordZ`, `ebgsId`, `economyPrimary`, `economySecondary`, `eddbId`, `lastCheckOn`, `name`, `population`, `security`, `state`, `updatedOn`, `zzzCreatedBy`, `zzzCreatedOn`, `zzzModifiedBy`, `zzzModifiedOn`) VALUES (1,NULL,'independent',-93.8125,39.7188,-86.1562,'59e7b92fd22c775be0fe80bd','$economy_agri;','$economy_refinery;',9775,'2021-07-29 23:41:27','Inara',2147483647,'$system_security_high;','none','2021-07-29 19:39:07',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(2,NULL,'independent',-93.8438,36.125,-83.9062,'59e8a174d22c775be0023a17','$economy_colony;','$economy_extraction;',6800,'2021-07-29 23:41:27','HIP 15415',38948,'$system_security_low;','expansion','2021-07-26 15:58:02',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(3,NULL,'independent',-92.2812,30.875,-79.3438,'59e8a1add22c775be0023c04','$economy_industrial;','$economy_extraction;',6708,'2021-07-29 23:41:27','HIP 13179',11784963,'$system_security_high;','expansion','2021-07-28 02:38:59',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(4,NULL,'independent',-101.188,44.6562,-86.125,'59e910d0d22c775be03f3dae','$economy_refinery;','$economy_none;',4576,'2021-07-29 23:41:27','Eoto',30294,'$system_security_low;','expansion','2021-06-25 22:08:06',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(5,NULL,'independent',-92.4062,32.0625,-86.1875,'59e92918d22c775be06a29b4','$economy_extraction;','$economy_colony;',18867,'2021-07-29 23:41:27','Warnones',3836358,'$system_security_medium;','expansion','2021-07-26 19:01:53',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(6,NULL,'independent',-92.4375,21.3125,-78.9688,'59e96df1d22c775be0378abd','$economy_colony;','$economy_extraction;',6327,'2021-07-29 23:41:27','HIP 11111',24753,'$system_security_low;','none','2021-07-28 20:25:00',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(7,NULL,'independent',-91.1562,16.9062,-89.8438,'59e8b906d22c775be002aa86','$economy_refinery;','$economy_extraction;',19535,'2021-07-29 23:41:27','Yemaki',35941,'$system_security_medium;','none','2021-07-18 13:57:56',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(8,NULL,'independent',-94.1562,47.625,-90.5625,'59e9173dd22c775be04b1f3d','$economy_industrial;','$economy_extraction;',7076,'2021-07-29 23:41:27','HIP 21165',4373254,'$system_security_medium;','none','2021-06-16 15:36:16',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(9,NULL,'independent',-88.125,32.8125,-70.4062,'59e8a1e5d22c775be0023cd7','$economy_colony;','$economy_extraction;',2045,'2021-07-29 23:41:27','BD+77 84',69432,'$system_security_medium;','none','2021-07-26 15:50:14',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(10,NULL,'independent',-81.6875,42.5312,-83.625,'59e927a7d22c775be067af82','$economy_industrial;','$economy_refinery;',17909,'2021-07-29 23:41:27','Tougeir',9097226,'$system_security_medium;','expansion','2021-07-25 02:57:57',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(11,NULL,'independent',-80,36.9375,-80.5312,'59ea7efdd22c775be0b675b4','$economy_industrial;','$economy_extraction;',13909,'2021-07-29 23:41:28','Muchihiks',3036258,'$system_security_medium;','expansion','2021-07-27 12:04:32',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(12,NULL,'alliance',-79.4375,39.4688,-80.125,'59ec1004d22c775be0f21d39','$economy_extraction;','$economy_extraction;',11424,'2021-07-29 23:41:28','Lahua',93669,'$system_security_low;','none','2021-07-29 18:15:33',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(13,NULL,'independent',-108.344,37.125,-78.9688,'59e9e22dd22c775be0995fba','$economy_colony;','$economy_refinery;',1239,'2021-07-29 23:41:28','Ardhri',75450,'$system_security_medium;','none','2021-07-29 00:01:11',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(14,NULL,'independent',-98.7188,23.7812,-71.1875,'59e982f1d22c775be07c41fb','$economy_refinery;','$economy_colony;',15698,'2021-07-29 23:41:28','Poqomathi',203050,'$system_security_medium;','none','2021-07-28 08:18:41',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(15,NULL,'independent',-81.9062,20.1562,-81.5,'59e8e24ad22c775be003930a','$economy_military;','$economy_refinery;',14233,'2021-07-29 23:41:27','Nawad',127721,'$system_security_low;','none','2021-07-28 20:24:17',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(16,NULL,'independent',-82.1562,18.9062,-70.0625,'59e8ab56d22c775be00267d4','$economy_industrial;','$economy_none;',10349,'2021-07-29 23:41:27','Kalaako',2249964,'$system_security_medium;','none','2021-07-29 20:54:55',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(17,NULL,'federation',-90.4688,19.375,-62.7188,'59e8b7f0d22c775be002a485','$economy_extraction;','$economy_none;',19750,'2021-07-29 23:41:27','Zenmaku',2488,'$system_security_low;','none','2021-07-28 14:44:47',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(18,NULL,'independent',-83.625,45.9062,-96.2812,'59e8b56bd22c775be00295fa','$economy_extraction;','$economy_extraction;',7213,'2021-07-29 23:41:27','HIP 24329',200668,'$system_security_medium;','none','2021-07-10 00:11:59',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(19,NULL,'independent',-75.9062,42.5312,-90.75,'59e81949d22c775be000a2f7','$economy_refinery;','$economy_extraction;',10103,'2021-07-29 23:41:27','Jeng',62533,'$system_security_low;','expansion','2021-07-25 07:05:08',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(20,NULL,'independent',-83,44.9375,-67.1562,'59e8f184d22c775be006d74f','$economy_military;','$economy_refinery;',13479,'2021-07-29 23:41:27','MCC 105',81321,'$system_security_medium;','none','2021-07-25 15:05:33',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(21,NULL,'independent',-87.4375,54.2812,-73.4375,'59e8f289d22c775be0087cb1','$economy_hightech;','$economy_refinery;',12224,'2021-07-29 23:41:27','Liu Huang',7419252,'$system_security_medium;','expansion','2021-07-21 11:03:19',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(22,NULL,'alliance',-88.2812,53.7188,-71.5625,'59f4c934d22c775be0e071f8','$economy_industrial;','$economy_extraction;',627,'2021-07-29 23:41:28','Akbakara',5616293,'$system_security_medium;','expansion','2021-07-19 18:17:59',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(23,NULL,'independent',-76.1562,20,-88.2188,'59ea544fd22c775be0b5ad22','$economy_industrial;','$economy_extraction;',17815,'2021-07-29 23:41:28','Tjapakh',21482872,'$system_security_high;','none','2021-07-29 20:59:21',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(24,NULL,'independent',-84.0312,16.125,-97.2188,'59e8f614d22c775be00e0f8d','$economy_colony;','$economy_extraction;',10780,'2021-07-29 23:41:27','Khuzwangpo',75992,'$system_security_low;','expansion','2021-07-27 16:30:32',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(25,NULL,'independent',-83.625,16.7188,-101.625,'59e9fb97d22c775be099c985','$economy_industrial;','$economy_none;',6871,'2021-07-29 23:41:28','HIP 17126',3602602,'$system_security_low;','none','2021-07-28 20:34:01',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(26,NULL,'independent',-75.125,16.25,-95.2188,'59e805efd22c775be0005fdb','$economy_extraction;','$economy_refinery;',5273,'2021-07-29 23:41:27','Gliese 3251',75511,'$system_security_medium;','none','2021-07-29 11:41:00',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(27,NULL,'independent',-94.2188,33.4375,-89.3125,'59e7d53ed22c775be0ff7108','$economy_military;','$economy_military;',14535,'2021-07-29 23:41:27','Niu Yun',59736,'$system_security_low;','expansion','2021-07-27 12:05:24',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(28,NULL,'independent',-106.812,42.0625,-63.9375,'59e9f5f0d22c775be099b59d','$economy_extraction;','$economy_refinery;',12924,'2021-07-29 23:41:28','Luggerates',97819,'$system_security_medium;','none','2021-07-26 21:15:25',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(29,NULL,'independent',-78.3438,20.4062,-66.25,'59e874f8d22c775be00194a7','$economy_refinery;','$economy_industrial;',658,'2021-07-29 23:41:27','Akuni',5913094,'$system_security_high;','none','2021-07-29 17:14:31',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(30,NULL,'independent',-107.469,43.9062,-72.75,'59f5dbced22c775be079b7a6','$economy_military;','$economy_refinery;',16442,'2021-07-29 23:41:28','Sambaho',22063,'$system_security_medium;','none','2021-07-29 00:03:53',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(31,NULL,'independent',-96.2812,31.6562,-71.25,'59e8b684d22c775be0029c0d','$economy_extraction;','$economy_industrial;',8723,'2021-07-29 23:41:27','HIP 8525',2162455,'$system_security_high;','none','2021-07-26 15:49:30',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(32,NULL,'independent',-109.875,45.4688,-73.8438,'59e8f194d22c775be006f03c','$economy_military;','$economy_extraction;',4057,'2021-07-29 23:41:27','Daruwach',72864,'$system_security_medium;','none','2021-07-26 15:55:24',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(33,NULL,'independent',-75.6875,14.75,-68.3125,'59e8d971d22c775be0035cc0','$economy_refinery;','$economy_extraction;',19013,'2021-07-29 23:41:27','Windin',103997,'$system_security_low;','expansion','2021-07-27 19:33:33',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(34,NULL,'independent',-108.812,39.5938,-105.531,'59eb3e11d22c775be0b879ed','$economy_colony;','$economy_extraction;',6850,'2021-07-29 23:41:28','HIP 16646',11959,'$system_security_low;','expansion','2021-07-11 17:00:56',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(35,NULL,'independent',-86.0312,13.5,-77.0312,'5a95bdffd1b6a37c3c202dcf','$economy_industrial;','$economy_refinery;',17517965,'2021-07-29 23:41:28','Tawell',48219315,'$system_security_high;','civilliberty','2021-07-29 21:07:40',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(36,NULL,'independent',-97.125,41.375,-71.7188,'59e9f591d22c775be099b472','$economy_refinery;','$economy_none;',10443,'2021-07-29 23:41:28','Kanus',18046,'$system_security_low;','none','2021-07-25 11:26:24',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(37,NULL,'independent',-111.219,29.5938,-85.3125,'59e8f10ed22c775be006323a','$economy_industrial;','$economy_refinery;',8785,'2021-07-29 23:41:27','HIP 8825',26228433,'$system_security_high;','none','2021-07-28 23:35:51',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(38,NULL,'independent',-110.906,16.5,-67.8438,'59ed2222d22c775be0beaaec','$economy_industrial;','$economy_refinery;',7221,'2021-07-29 23:41:28','HIP 2453',9835816,'$system_security_high;','none','2021-07-27 19:49:53',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(39,NULL,'federation',-65.5938,-1.125,-81.375,'59e8f846d22c775be011bdd1','$economy_colony;','$economy_refinery;',17798,'2021-07-29 23:41:27','Tirfing',248086,'$system_security_medium;','none','2021-07-23 04:12:37',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(40,NULL,'independent',-84.5312,17.9062,-75.7812,'59e8b73cd22c775be0029fc7','$economy_refinery;','$economy_extraction;',16821,'2021-07-29 23:41:27','Shili',161462,'$system_security_low;','none','2021-07-29 21:03:51',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(41,NULL,'alliance',-96.875,59.8125,-82.625,'59eb91e8d22c775be0ba116d','$economy_refinery;','$economy_extraction;',3291,'2021-07-29 23:41:28','Chernobo',60426,'$system_security_low;','none','2021-07-23 03:41:23',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(42,NULL,'federation',-98.5,50.1875,-89.5625,'59ec3065d22c775be04f4646','$economy_refinery;','$economy_extraction;',1669,'2021-07-29 23:41:28','Baiabozo',316538,'$system_security_medium;','none','2021-07-21 14:39:46',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(43,NULL,'federation',-116.5,49.5,-77.2188,'59f10b13d22c775be06caf22','$economy_refinery;','$economy_refinery;',38307,'2021-07-29 23:41:28','Gliese 9035',623904,'$system_security_low;','none','2021-07-11 22:30:01',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(44,NULL,'independent',-102.938,56.625,-101.812,'59ea2897d22c775be09a7eaa','$economy_colony;','$economy_refinery;',95071,'2021-07-29 23:41:28','HIP 23318',44445,'$system_security_low;','expansion','2021-07-25 11:25:13',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(45,NULL,'independent',-98.375,37.5625,-61.2812,'59ecbde5d22c775be0512686','$economy_industrial;','$economy_refinery;',13946,'2021-07-29 23:41:28','Muncheim',7416862,'$system_security_high;','none','2021-07-29 15:43:32',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(46,NULL,'independent',-82.1875,-2.125,-77.0938,'59e81673d22c775be0009843','$economy_industrial;','$economy_extraction;',12232,'2021-07-29 23:41:27','Liu Yanec',3749436,'$system_security_medium;','none','2021-07-26 00:37:00',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(47,NULL,'alliance',-88.2812,59.6562,-92.4375,'59eb2431d22c775be0b80e80','$economy_refinery;','$economy_none;',2669,'2021-07-29 23:41:28','Bumba',24993,'$system_security_low;','none','2021-07-22 15:56:40',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(48,NULL,'alliance',-85.4062,63.4688,-88.7812,'59f38916d22c775be05bb9cf','$economy_industrial;','$economy_none;',9827,'2021-07-29 23:41:28','Insubii',1003439,'$system_security_low;','expansion','2021-07-24 07:16:30',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(49,NULL,'independent',-75,43,-63,'59e8b0dfd22c775be0028052','$economy_extraction;','$economy_none;',914,'2021-07-29 23:41:27','Andancan',12620,'$system_security_low;','none','2021-07-25 09:49:18',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32'),(50,NULL,'independent',-69.1562,29.8125,-102.781,'59e82c79d22c775be000db26','$economy_hightech;','$economy_refinery;',7159,'2021-07-29 23:41:27','HIP 22961',13711588,'$system_security_high;','expansion','2021-07-29 15:26:44',NULL,'2021-07-29 21:41:32',NULL,'2021-07-29 21:41:32');
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

-- Dump completed on 2021-07-30  0:30:22
