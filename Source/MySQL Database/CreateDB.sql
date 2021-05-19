-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2018 at 12:34 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faction_guard`
--

-- --------------------------------------------------------

--
-- Table structure for table `APISession`
--

DROP TABLE IF EXISTS `APISession`;
CREATE TABLE `APISession` (
  `ID` int(10) UNSIGNED NOT NULL,
  `User_ID` int(10) UNSIGNED NOT NULL COMMENT 'Foreign key to the user',
  `Token` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Expiry` int(10) UNSIGNED NOT NULL COMMENT 'Unix timestamp of the token expiry'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commander`
--

DROP TABLE IF EXISTS `commander`;
CREATE TABLE `commander` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `zzz_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzz_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `zzz_created_by` int(11) UNSIGNED NOT NULL,
  `zzz_modified_by` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_supported` bit(1) DEFAULT b'0',
  `iso_639_2` varchar(2) CHARACTER SET utf8mb4 DEFAULT NULL,
  `iso_639_3b` varchar(3) CHARACTER SET utf8mb4 DEFAULT NULL,
  `iso_639_3t` varchar(3) CHARACTER SET utf8mb4 DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `login`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `login`;
CREATE TABLE `login` (
`id` int(11) unsigned
,`username` varchar(100)
,`password_hash` varchar(64)
,`language_name` varchar(100)
,`language_iso_639_2` varchar(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `access_token` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_authorization_codes`
--

DROP TABLE IF EXISTS `oauth_authorization_codes`;
CREATE TABLE `oauth_authorization_codes` (
  `authorization_code` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect_uri` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_token` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `client_id` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_secret` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect_uri` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grant_types` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_jwt`
--

DROP TABLE IF EXISTS `oauth_jwt`;
CREATE TABLE `oauth_jwt` (
  `client_id` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public_key` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `refresh_token` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_scopes`
--

DROP TABLE IF EXISTS `oauth_scopes`;
CREATE TABLE `oauth_scopes` (
  `scope` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_users`
--

DROP TABLE IF EXISTS `oauth_users`;
CREATE TABLE `oauth_users` (
  `username` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT NULL,
  `scope` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zzz_created_by` int(11) UNSIGNED NOT NULL,
  `zzz_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzz_modified_by` int(11) UNSIGNED NOT NULL,
  `zzz_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `language_id` int(11) UNSIGNED DEFAULT NULL,
  `password_hash` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_group_id` int(11) DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `zzz_created_by` int(11) UNSIGNED NOT NULL,
  `zzz_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzz_modified_by` int(11) UNSIGNED NOT NULL,
  `zzz_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zzz_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzz_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `zzz_created_by` int(10) UNSIGNED NOT NULL,
  `zzz_modified_by` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_group_role`
--

DROP TABLE IF EXISTS `user_group_role`;
CREATE TABLE `user_group_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_group_id` int(10) UNSIGNED DEFAULT NULL,
  `zzz_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzz_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `zzz_created_by` int(10) UNSIGNED NOT NULL,
  `zzz_modified_by` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `_template`
--

DROP TABLE IF EXISTS `_template`;
CREATE TABLE `_template` (
  `id` int(11) UNSIGNED NOT NULL,
  `zzz_created_by` int(11) UNSIGNED NOT NULL,
  `zzz_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zzz_modified_by` int(11) UNSIGNED NOT NULL,
  `zzz_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure for view `login`
--
DROP TABLE IF EXISTS `login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login`  AS  select `user`.`id` AS `id`,`user`.`username` AS `username`,`user`.`password_hash` AS `password_hash`,`language`.`name` AS `language_name`,`language`.`iso_639_2` AS `language_iso_639_2` from (`user` left join `language` on((`user`.`language_id` = `language`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `APISession`
--
ALTER TABLE `APISession`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `IX_APISession_Token_Unique` (`Token`),
  ADD KEY `IX_APISession_Expiry` (`Expiry`);

--
-- Indexes for table `commander`
--
ALTER TABLE `commander`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `IX_Name_Unique` (`name`) USING BTREE,
  ADD KEY `IX_User_ID` (`user_id`) USING BTREE;

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`access_token`);

--
-- Indexes for table `oauth_authorization_codes`
--
ALTER TABLE `oauth_authorization_codes`
  ADD PRIMARY KEY (`authorization_code`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`refresh_token`);

--
-- Indexes for table `oauth_scopes`
--
ALTER TABLE `oauth_scopes`
  ADD PRIMARY KEY (`scope`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `IX_Username_Unique` (`username`) USING BTREE,
  ADD UNIQUE KEY `IX_Email_Unique` (`email`) USING BTREE;

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `IX_Code_Unique` (`code`) USING BTREE,
  ADD UNIQUE KEY `IX_Name_Unique` (`name`) USING BTREE;

--
-- Indexes for table `user_group_role`
--
ALTER TABLE `user_group_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_template`
--
ALTER TABLE `_template`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `APISession`
--
ALTER TABLE `APISession`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commander`
--
ALTER TABLE `commander`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_group_role`
--
ALTER TABLE `user_group_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_template`
--
ALTER TABLE `_template`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
