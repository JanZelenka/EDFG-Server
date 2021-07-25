CREATE DATABASE  IF NOT EXISTS `faction_guard` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `faction_guard`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
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
-- Table structure for table `_template`
--

DROP TABLE IF EXISTS `_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_template` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `zzzCreatedBy` int(11) unsigned DEFAULT NULL,
  `zzzCreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzzModifiedBy` int(11) unsigned DEFAULT NULL,
  `zzzModifiedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bgs_tick`
--

DROP TABLE IF EXISTS `bgs_tick`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bgs_tick` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ebgsId` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastCheckOn` datetime NOT NULL,
  `occuredOn` datetime NOT NULL,
  `zzzCreatedBy` int(11) unsigned DEFAULT NULL,
  `zzzCreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzzModifiedBy` int(11) unsigned DEFAULT NULL,
  `zzzModifiedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IX_occuredOn_UNIQUE` (`occuredOn`),
  UNIQUE KEY `IX_ebgsId_UNIQUE` (`ebgsId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `commander`
--

DROP TABLE IF EXISTS `commander`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commander` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `zzz_created_by` int(11) unsigned DEFAULT NULL,
  `zzz_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzz_modified_by` int(11) unsigned DEFAULT NULL,
  `zzz_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_NAME` (`name`) USING BTREE,
  KEY `IX_USER_ID` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `is_supported` tinyint(4) DEFAULT '0',
  `iso_639_2` varchar(2) CHARACTER SET utf8mb4 DEFAULT NULL,
  `iso_639_3b` varchar(3) CHARACTER SET utf8mb4 DEFAULT NULL,
  `iso_639_3t` varchar(3) CHARACTER SET utf8mb4 DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `login`
--

DROP TABLE IF EXISTS `login`;
/*!50001 DROP VIEW IF EXISTS `login`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `login` AS SELECT 
 1 AS `commander_id`,
 1 AS `user_id`,
 1 AS `username`,
 1 AS `password_hash`,
 1 AS `language_name`,
 1 AS `language_iso_639_2`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `minor_faction`
--

DROP TABLE IF EXISTS `minor_faction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `minor_faction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ebgsId` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eddbId` int(11) DEFAULT NULL,
  `allegiance` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `government` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastCheckOn` datetime DEFAULT NULL,
  `name` varchar(126) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedOn` datetime NOT NULL,
  `zzzCreatedBy` varchar(62) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zzzCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `zzzModifiedBy` varchar(62) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zzzModifiedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eddbId_UNIQUE` (`eddbId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `minor_faction_presence`
--

DROP TABLE IF EXISTS `minor_faction_presence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `minor_faction_presence` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ebgsSystemId` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `influence` decimal(6,5) DEFAULT NULL,
  `minorFactionId` int(11) NOT NULL,
  `starSystemId` int(11) NOT NULL,
  `updatedOn` datetime NOT NULL,
  `zzzCreatedBy` varchar(62) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zzzCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `zzzModifiedBy` varchar(62) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zzzModifiedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `minor_faction_presence_view`
--

DROP TABLE IF EXISTS `minor_faction_presence_view`;
/*!50001 DROP VIEW IF EXISTS `minor_faction_presence_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `minor_faction_presence_view` AS SELECT 
 1 AS `id`,
 1 AS `ebgsSystemId`,
 1 AS `influence`,
 1 AS `minorFactionId`,
 1 AS `starSystemId`,
 1 AS `updatedOn`,
 1 AS `zzzCreatedBy`,
 1 AS `zzzCreatedOn`,
 1 AS `zzzModifiedBy`,
 1 AS `zzzModifiedOn`,
 1 AS `starSystem_id`,
 1 AS `starSystem_coordX`,
 1 AS `starSystem_coordY`,
 1 AS `starSystem_coordZ`,
 1 AS `starSystem_ebgsId`,
 1 AS `starSystem_eddbId`,
 1 AS `starSystem_name`,
 1 AS `starSystem_lastCheckOn`,
 1 AS `starSystem_updatedOn`,
 1 AS `starSystem_zzzCreatedBy`,
 1 AS `starSystem_zzzCreatedOn`,
 1 AS `starSystem_zzzModifiedBy`,
 1 AS `starSystem_zzzModifiedOn`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `access_token` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`access_token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `oauth_authorization_codes`
--

DROP TABLE IF EXISTS `oauth_authorization_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_authorization_codes` (
  `authorization_code` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect_uri` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_token` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`authorization_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `oauth_scopes`
--

DROP TABLE IF EXISTS `oauth_scopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_scopes` (
  `scope` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`scope`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `security_privilege`
--

DROP TABLE IF EXISTS `security_privilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `security_privilege` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zzz_created_by` int(11) unsigned DEFAULT NULL,
  `zzz_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzz_modified_by` int(11) unsigned DEFAULT NULL,
  `zzz_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `security_role`
--

DROP TABLE IF EXISTS `security_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `security_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) unsigned NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zzz_created_by` int(11) unsigned DEFAULT NULL,
  `zzz_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzz_modified_by` int(11) unsigned DEFAULT NULL,
  `zzz_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IX_USER_GROUP_ID` (`user_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `security_role_privilege`
--

DROP TABLE IF EXISTS `security_role_privilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `security_role_privilege` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `security_role_id` int(11) unsigned NOT NULL,
  `security_privilege_id` int(11) unsigned NOT NULL,
  `zzz_created_by` int(11) unsigned DEFAULT NULL,
  `zzz_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzz_modified_by` int(11) unsigned DEFAULT NULL,
  `zzz_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IX_SECURITY_ROLE_ID` (`security_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `star_system`
--

DROP TABLE IF EXISTS `star_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `star_system` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `coordX` float DEFAULT NULL,
  `coordY` float DEFAULT NULL,
  `coordZ` float DEFAULT NULL,
  `ebgsId` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eddbId` int(11) DEFAULT NULL,
  `lastCheckOn` datetime DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updatedOn` datetime DEFAULT NULL,
  `zzzCreatedBy` varchar(62) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zzzCreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzzModifiedBy` varchar(62) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zzzModifiedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ebgsId_UNIQUE` (`ebgsId`),
  UNIQUE KEY `eddbId_UNIQUE` (`eddbId`)
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `language_id` int(11) unsigned DEFAULT NULL,
  `password_hash` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_group_id` int(11) DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `zzz_created_by` int(11) unsigned DEFAULT NULL,
  `zzz_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzz_modified_by` int(11) unsigned DEFAULT NULL,
  `zzz_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_USERNAME` (`username`) USING BTREE,
  UNIQUE KEY `UNIQUE_EMAIL` (`email`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(11) unsigned NOT NULL DEFAULT '41',
  `user_group_id__parent` int(11) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zzz_created_by` int(11) unsigned DEFAULT NULL,
  `zzz_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzz_modified_by` int(11) unsigned DEFAULT NULL,
  `zzz_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_CODE` (`code`) USING BTREE,
  UNIQUE KEY `UNIQUE_NAME` (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_group_structure`
--

DROP TABLE IF EXISTS `user_group_structure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group_structure` (
  `id` int(11) unsigned NOT NULL,
  `border_high` int(11) unsigned NOT NULL DEFAULT '1',
  `border_low` int(11) unsigned NOT NULL DEFAULT '0',
  `child_count` int(11) unsigned NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT '0',
  `user_group_id` int(11) unsigned NOT NULL,
  `user_group_id__root` int(11) unsigned DEFAULT NULL,
  `zzz_created_by` int(11) unsigned DEFAULT NULL,
  `zzz_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzz_modified_by` int(11) unsigned DEFAULT NULL,
  `zzz_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ix_border_high` (`border_high`,`user_group_id__root`),
  KEY `ix_border_low` (`border_low`,`user_group_id__root`),
  KEY `ix_user_group_id~parent` (`user_group_id__root`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
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
-- Table structure for table `user_security_role`
--

DROP TABLE IF EXISTS `user_security_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_security_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `security_role_id` int(11) unsigned DEFAULT NULL,
  `zzz_created_by` int(11) unsigned DEFAULT NULL,
  `zzz_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzz_modified_by` int(11) unsigned DEFAULT NULL,
  `zzz_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IX_USER_ID` (`user_id`),
  UNIQUE KEY `IX_SECURITY_ROLE_ID` (`security_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping routines for database 'faction_guard'
--

--
-- Final view structure for view `login`
--

/*!50001 DROP VIEW IF EXISTS `login`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `login` AS select `commander`.`id` AS `commander_id`,`commander`.`user_id` AS `user_id`,`commander`.`name` AS `username`,`user`.`password_hash` AS `password_hash`,`language`.`name` AS `language_name`,`language`.`iso_639_2` AS `language_iso_639_2` from ((`commander` join `user` on((`user`.`id` = `commander`.`user_id`))) left join `language` on((`user`.`language_id` = `language`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `minor_faction_presence_view`
--

/*!50001 DROP VIEW IF EXISTS `minor_faction_presence_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `minor_faction_presence_view` AS select `mfp`.`id` AS `id`,`mfp`.`ebgsSystemId` AS `ebgsSystemId`,`mfp`.`influence` AS `influence`,`mfp`.`minorFactionId` AS `minorFactionId`,`mfp`.`starSystemId` AS `starSystemId`,`mfp`.`updatedOn` AS `updatedOn`,`mfp`.`zzzCreatedBy` AS `zzzCreatedBy`,`mfp`.`zzzCreatedOn` AS `zzzCreatedOn`,`mfp`.`zzzModifiedBy` AS `zzzModifiedBy`,`mfp`.`zzzModifiedOn` AS `zzzModifiedOn`,`sts`.`id` AS `starSystem_id`,`sts`.`coordX` AS `starSystem_coordX`,`sts`.`coordY` AS `starSystem_coordY`,`sts`.`coordZ` AS `starSystem_coordZ`,`sts`.`ebgsId` AS `starSystem_ebgsId`,`sts`.`eddbId` AS `starSystem_eddbId`,`sts`.`name` AS `starSystem_name`,`sts`.`lastCheckOn` AS `starSystem_lastCheckOn`,`sts`.`updatedOn` AS `starSystem_updatedOn`,`sts`.`zzzCreatedBy` AS `starSystem_zzzCreatedBy`,`sts`.`zzzCreatedOn` AS `starSystem_zzzCreatedOn`,`sts`.`zzzModifiedBy` AS `starSystem_zzzModifiedBy`,`sts`.`zzzModifiedOn` AS `starSystem_zzzModifiedOn` from (`minor_faction_presence` `mfp` left join `star_system` `sts` on((`mfp`.`starSystemId` = `sts`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-25 22:09:06
