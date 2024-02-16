-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 18 juin 2022 à 07:56
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `annonces`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `AnnDate` timestamp NULL DEFAULT NULL,
  `City` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'encoursdevalidation',
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `AnnonceurId` bigint(20) UNSIGNED NOT NULL,
  `SousCategoryId` bigint(20) UNSIGNED NOT NULL,
  `WhoGetTheOffer` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `annonces_annonceurid_foreign` (`AnnonceurId`),
  KEY `annonces_souscategoryid_foreign` (`SousCategoryId`),
  KEY `annonces_whogettheoffer_foreign` (`WhoGetTheOffer`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `Title`, `Description`, `AnnDate`, `City`, `status`, `images`, `AnnonceurId`, `SousCategoryId`, `WhoGetTheOffer`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'TV Plazma', 'ba9a n9ya li mhtajha marhba', '2022-05-21 16:40:57', 'Casablanca', 'valider', 'RachidTV Plazma1.jpg', 4, 10, NULL, NULL, '2022-05-21 16:40:57', '2022-05-21 16:40:57'),
(2, 'PC HP core 2 duo', 'chi etudiant mhtaj pc kayn hada ba9i n9i', '2022-05-21 16:42:23', 'Rabat', 'valider', 'RachidPC HP1.jpg**RachidPC HP2.jpg**RachidPC HP3.jpg', 4, 9, 5, NULL, '2022-05-21 16:42:23', '2022-05-21 16:42:23'),
(3, 'PC portable', 'j\'offre gratuitement ce pc pour un etudiant', '2022-05-21 16:44:03', 'Tangier', 'valider', 'TDMPC portable1.jpg**TDMPC portable2.jpg**TDMPC portable4.jpg**TDMPC portable5.jpg', 5, 9, NULL, '2022-05-21 16:49:33', '2022-05-21 16:44:03', '2022-05-21 16:49:33'),
(7, '2 cats', 'kaynin had juj 9tiwtat li bra yrabihum ythala fihum', '2022-05-26 19:12:31', 'Rabat', 'valider', 'rachid2 cats1.jpg**rachid2 cats2.jpg**rachid2 cats3.jpg**rachid2 cats4.jpg', 4, 1, NULL, NULL, '2022-05-27 19:12:31', '2022-05-27 19:12:31'),
(8, 'dwa lshab sokar', 'li 3ando fih lararad n3tihlo 3andi zayd', '2022-05-27 19:19:46', 'Marrakech', 'endiscussion', 'tdmdwa lshab sokar1.jpg', 5, 20, 11, NULL, '2022-05-27 19:19:46', '2022-05-27 19:19:46'),
(9, 'pampers & hlib', 'chi famille 3ndha bebe wma3ndhumch bach yxriw xno 5aso ana nxrilih', '2022-05-27 19:20:57', 'Temara', 'valider', 'tdmpampers & hlib1.jpg**tdmpampers & hlib2.jpg', 5, 22, 11, NULL, '2022-05-27 19:20:57', '2022-05-27 19:20:57'),
(12, 'Ketoba 7aylinn', '2dh n ktab rkha o ribakha', '2022-06-06 07:02:48', 'Tangier', 'reffuser', 'nouhailaKetoba 7aylin1.jpg**nouhailaKetoba 7aylin2.jpg', 11, 22, NULL, '2022-06-06 07:05:16', '2022-06-06 07:02:48', '2022-06-06 07:05:16'),
(14, 'caftan maghribi', 'caftan + selham n 3ayl sghir', '2022-06-06 08:30:59', 'Rabat', 'valider', 'nouhailacaftan maghribi1.jpg', 11, 6, NULL, NULL, '2022-06-06 08:30:59', '2022-06-06 08:30:59'),
(15, 'plakar', 'plakara kbira o kathoz', '2022-06-06 08:36:30', 'Tétouan', 'valider', 'nouhailaplakar1.jpg**nouhailaplakar2.webp**nouhailaplakar3.jpg', 11, 14, NULL, NULL, '2022-06-06 08:36:30', '2022-06-06 08:36:30'),
(16, 'table de nuit', 'Vintage!! rah kan 3and jed jedi!', '2022-06-06 08:39:05', 'Tan-Tan', 'endiscussion', 'nouhailatable de nuit1.jpg**nouhailatable de nuit2.jpg**nouhailatable de nuit3.jpg', 11, 15, 4, NULL, '2022-06-06 08:39:05', '2022-06-06 08:39:05'),
(17, 'Pack d me9ali', 'Sah o l3amal! b demana dyali', '2022-06-06 08:40:31', 'Setti Fatma', 'valider', 'nouhailaPack d me9ali1.jpg**nouhailaPack d me9ali2.webp**nouhailaPack d me9ali3.webp', 11, 14, NULL, NULL, '2022-06-06 08:40:31', '2022-06-06 08:40:31'),
(18, 'traditionnel', 'siniya + kisan + berad + megharef', '2022-06-06 08:42:17', 'Fès', 'valider', 'nouhailatraditionnel1.jpg', 11, 14, NULL, NULL, '2022-06-06 08:42:17', '2022-06-06 08:42:17'),
(19, 'ta9xira', 'rah hi hitax makaynxi daw o salama', '2022-06-06 08:44:46', 'Temsia', 'reffuser', 'nouhailata9xira1.jpg', 11, 5, NULL, '2022-06-06 09:18:45', '2022-06-06 08:44:46', '2022-06-06 09:18:45'),
(20, 'hotayxa', 'dk joj al3ab sghar makijiwxi m3ahom', '2022-06-06 08:46:51', 'Bni Frassen', 'valider', 'nouhailahotayxa1.jpg**nouhailahotayxa2.jpg', 30, 21, NULL, NULL, '2022-06-06 08:46:51', '2022-06-06 08:46:51'),
(21, 'monika', 'monika maxi meskona hi thaden', '2022-06-06 08:48:32', 'Youssoufia', 'reffuser', 'nouhailamonika1.webp**nouhailamonika2.webp', 11, 21, NULL, '2022-06-06 09:18:55', '2022-06-06 08:48:32', '2022-06-06 09:18:55'),
(22, 'Djaj', 'djaja beliya yalah 3ada 7ans', '2022-06-06 09:14:11', 'Zoumi', 'reffuser', 'nouhailaDjaj1.jpg**nouhailaDjaj2.jpg', 11, 4, NULL, '2022-06-06 09:18:56', '2022-06-06 09:14:11', '2022-06-06 09:18:56'),
(23, 'baytate', 'xritom o ma3ejbonixi libgha marhba', '2022-06-06 09:14:54', 'Tiflet', 'valider', 'nouhailabaytate1.jpg', 11, 3, NULL, '2022-06-17 14:16:15', '2022-06-06 09:14:54', '2022-06-17 14:16:15'),
(24, 'hejar', 'hejar d behar de dalya', '2022-06-06 09:17:11', 'Tangier', 'reffuser', 'nouhailahejar1.jpg', 11, 14, NULL, '2022-06-06 09:19:00', '2022-06-06 09:17:11', '2022-06-06 09:19:00'),
(26, 'pc hp occasion', 'pc ba9i n9i', '2022-06-17 14:01:22', 'Tangier', 'reffuser', 'testpc hp1.jpg**testpc hp2.jpg**testpc hp3.jpg', 32, 9, NULL, '2022-06-17 14:16:29', '2022-06-17 14:01:22', '2022-06-17 14:16:29'),
(27, 'pc hp n9i', 'pc n9i', '2022-06-17 21:57:53', 'Tangier', 'encoursdevalidation', 'testpc hp1.jpg**testpc hp3.jpg**testpc hp4.jpg', 32, 9, NULL, NULL, '2022-06-17 21:57:53', '2022-06-17 21:57:53');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NomCategory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImageCategory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `NomCategory`, `ImageCategory`, `created_at`, `updated_at`) VALUES
(1, 'Animals', 'Animals.jpg', '2022-05-21 16:14:08', '2022-05-21 16:14:08'),
(2, 'Clothes', 'Clothes.jpg', '2022-05-21 16:16:06', '2022-05-21 16:16:06'),
(3, 'Multimedia', 'MULTIMEDIA.jpg', '2022-05-21 16:18:17', '2022-05-21 16:18:17'),
(4, 'Furniture', 'Furniture.jpg', '2022-05-21 16:20:04', '2022-05-21 16:20:04'),
(5, 'Services', 'Services.jpg', '2022-05-21 16:30:11', '2022-05-21 16:30:11'),
(6, 'Medicines', 'Medicines.jpeg', '2022-05-27 19:16:46', '2022-05-27 19:16:46'),
(7, 'For children', 'For children.png', '2022-05-27 19:17:39', '2022-05-27 19:17:39'),
(8, 'Books', 'Books.jfif', '2022-06-06 07:05:46', '2022-06-06 07:05:46');

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
CREATE TABLE IF NOT EXISTS `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `TheOwnerOfOffer` bigint(20) UNSIGNED NOT NULL,
  `TheWinner` bigint(20) UNSIGNED NOT NULL,
  `AnnId` bigint(20) UNSIGNED NOT NULL,
  `LastSeen` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'encours',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conversations_theownerofoffer_foreign` (`TheOwnerOfOffer`),
  KEY `conversations_thewinner_foreign` (`TheWinner`),
  KEY `conversations_annid_foreign` (`AnnId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`id`, `TheOwnerOfOffer`, `TheWinner`, `AnnId`, `LastSeen`, `status`, `created_at`, `updated_at`) VALUES
(6, 5, 11, 8, NULL, 'encours', '2022-06-06 11:11:14', '2022-06-06 11:11:14'),
(7, 30, 11, 20, NULL, 'encours', NULL, NULL),
(8, 11, 4, 16, NULL, 'encours', '2022-06-17 14:11:12', '2022-06-17 14:11:12');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `IdConversation` bigint(20) UNSIGNED NOT NULL,
  `Sender` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `SendAt` timestamp NULL DEFAULT NULL,
  `Read_At` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_idconversation_foreign` (`IdConversation`),
  KEY `messages_sender_foreign` (`Sender`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `IdConversation`, `Sender`, `content`, `SendAt`, `Read_At`, `created_at`, `updated_at`) VALUES
(1, 8, 11, 'hi', '2022-06-17 14:11:24', NULL, '2022-06-17 14:11:24', '2022-06-17 14:11:24'),
(2, 7, 11, 'salam', '2022-06-17 14:12:52', '2022-06-17 14:15:09', '2022-06-17 14:12:52', '2022-06-17 14:12:52'),
(3, 7, 30, 'wa3alikom salam', '2022-06-17 14:13:13', '2022-06-17 22:32:31', '2022-06-17 14:13:13', '2022-06-17 14:13:13'),
(4, 7, 11, 'labas', '2022-06-17 14:13:31', '2022-06-17 14:15:09', '2022-06-17 14:13:31', '2022-06-17 14:13:31');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2022_04_19_135421_create_category_table', 1),
(17, '2022_04_19_141410_create_sous_category_table', 1),
(18, '2022_05_09_151144_create_annonces_table', 1),
(19, '2022_05_09_151846_create_userwantoffer_table', 1),
(20, '2022_05_10_192351_create_conversations_table', 1),
(21, '2022_05_10_193724_create_messages_table', 1),
(22, '2022_05_16_000545_refresh', 1),
(24, '2022_05_21_181314_create_supports_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `souscategory`
--

DROP TABLE IF EXISTS `souscategory`;
CREATE TABLE IF NOT EXISTS `souscategory` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NomSousCategory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Categoryid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `souscategory_categoryid_foreign` (`Categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `souscategory`
--

INSERT INTO `souscategory` (`id`, `NomSousCategory`, `Categoryid`, `created_at`, `updated_at`) VALUES
(1, 'Cats', 1, '2022-05-21 16:30:24', '2022-05-21 16:30:24'),
(2, 'Dogs', 1, '2022-05-21 16:30:33', '2022-05-21 16:30:33'),
(3, 'Birds', 1, '2022-05-21 16:30:43', '2022-05-21 16:30:43'),
(4, 'Other Animals', 1, '2022-05-21 16:30:58', '2022-05-21 16:30:58'),
(5, 'For Men', 2, '2022-05-21 16:31:48', '2022-05-21 16:31:48'),
(6, 'For Women', 2, '2022-05-21 16:31:55', '2022-05-21 16:31:55'),
(7, 'For Kids', 2, '2022-05-21 16:32:04', '2022-05-21 16:32:04'),
(8, 'Phones', 3, '2022-05-21 16:32:31', '2022-05-21 16:32:31'),
(9, 'Computers', 3, '2022-05-21 16:32:39', '2022-05-21 16:32:39'),
(10, 'TV', 3, '2022-05-21 16:32:47', '2022-05-21 16:32:47'),
(11, 'Beds', 4, '2022-05-21 16:33:50', '2022-05-21 16:33:50'),
(12, 'Chairs', 4, '2022-05-21 16:34:02', '2022-05-21 16:34:02'),
(14, 'Decoration', 4, '2022-05-21 16:34:34', '2022-05-21 16:34:34'),
(15, 'Tables', 4, '2022-05-21 16:34:56', '2022-05-21 16:34:56'),
(16, 'Jobs', 5, '2022-05-21 16:35:22', '2022-05-21 16:35:22'),
(17, 'Studies', 5, '2022-05-21 16:36:26', '2022-05-21 16:36:26'),
(19, 'Other Services', 5, '2022-05-21 16:36:51', '2022-05-21 16:36:51'),
(20, 'all', 6, '2022-05-27 19:17:57', '2022-05-27 19:17:57'),
(21, 'Toys', 7, '2022-05-27 19:18:07', '2022-05-27 19:18:07'),
(22, 'Others', 7, '2022-05-27 19:18:14', '2022-05-27 19:18:14'),
(23, 'all types', 8, '2022-06-06 07:06:26', '2022-06-06 07:06:26');

-- --------------------------------------------------------

--
-- Structure de la table `supports`
--

DROP TABLE IF EXISTS `supports`;
CREATE TABLE IF NOT EXISTS `supports` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `supports`
--

INSERT INTO `supports` (`id`, `Brand`, `Code`, `created_at`, `updated_at`) VALUES
(1, 'Kitea', 1250060, NULL, NULL),
(2, 'Electroplanet', 801460, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `UserName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `City` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(1910) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'utilisateur.png',
  `confmssg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `confnumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `validationlevel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `Points` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`UserName`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phonenumber_unique` (`phoneNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `UserName`, `email`, `phoneNumber`, `birthdate`, `City`, `password`, `photo`, `confmssg`, `confnumber`, `validationlevel`, `admin`, `Points`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Rachid', 'Rachid@gmail.com', 505050505, '1998-04-15', 'Rabat', 'eyJpdiI6Im1QcXQxRk5OcmNiWFZFaWVSUnhCbUE9PSIsInZhbHVlIjoiQXFYNmhCWEcvN2JWSWJqU1B2M0xrQT09IiwibWFjIjoiNzI5YzE4NWI0Y2VmZTNlOGNhOTU3OGJiYTRhOTA2ZmZkNmRhNTVlMGFmZTE3NThhZWZjOTRiM2I2MjEyM2ViZSIsInRhZyI6IiJ9', 'Rachid.jpg', '', '', '2', 0, 5, NULL, NULL, NULL),
(5, 'TDM202', 'TDM@gmail.com', 606060606, '2000-07-07', 'Tangier', 'eyJpdiI6InhEQ2pmSmhVUHphNHFGSUVoTEhFMEE9PSIsInZhbHVlIjoiSW9MUG1xSzB4U0ZoWVo5NDM3Ym0xZz09IiwibWFjIjoiY2UzNjEzZDlmN2FkYmU0ZWNmM2E0YTdjYThkYjliMWQyNDNiYmMzN2RjZWRiZWIwNGYyZTVjODcxMGIyYjc3NCIsInRhZyI6IiJ9', 'utilisateur.png', '', '', '2', 0, 10, NULL, NULL, NULL),
(9, 'Admin', 'admin@gmail.com', 606050505, '1998-04-04', 'rabat', 'eyJpdiI6ImUvMGY3U1RaUkxwUHdneW1XdWpyRXc9PSIsInZhbHVlIjoibjJna2VpNmgxYkFiRFU3MEg1N1haZz09IiwibWFjIjoiYmI5ZGU4MDk1NjIyMzQ3N2JkZTZiNjFlYjk4MWY2MDliODE4Njg2NDk3OGFkMDM0ZTAxYzcyODdlMmFhN2U0MSIsInRhZyI6IiJ9', 'Admin.jpg', '', '', '2', 1, 0, NULL, NULL, NULL),
(11, 'nouhaila', 'nouhailabenhaddou@gmail.com', 653935826, '2002-11-06', 'Tangier', 'eyJpdiI6IkxUZXhqcTM2dHBEOXlTY3BmaGhOUEE9PSIsInZhbHVlIjoiZFZBWVpqTlZvZ1FLeW50azdsSHdPdz09IiwibWFjIjoiYjk2NWEyZTI1NTdlMzJkZDM4YzgxZTllOTYyNTZjYzE4Mjk4M2NjY2NmNGY1YTRkMzQ1ZDQ4NjY3MWFjMGI3ZSIsInRhZyI6IiJ9', 'nouhaila.jpg', 'fKU7qNFTA0sWW2bvRsOuNA3rimX3Nx', 'V8Ww', '2', 0, 20, NULL, '2022-06-06 06:41:52', '2022-06-06 06:41:52'),
(13, 'testt', 'test@gmail.com', 604050606, '2000-02-02', 'Sale', 'eyJpdiI6ImhzSDVPQkFLRzJnRDEzUk5FSWpndEE9PSIsInZhbHVlIjoiYUFPSWhheC9NTElQeGZwWDR3MHJCUT09IiwibWFjIjoiZjJhM2ZhY2FlMTg1NzY4ZDFmNjJmNzVjZjVmNWYyM2IzYjg4YjYxNTJkOWJmYjQzNGU3Mzk2OWRkOGY2ZmFiMiIsInRhZyI6IiJ9', 'utilisateur.png', 'ej0uwrUhTAwHylH9Gob75vcBouY9eZ', '', '0', 0, 0, NULL, '2022-06-08 18:17:34', '2022-06-08 18:17:34'),
(30, 'kaoutar', 'kaoutarboudouft@gmail.com', 688683467, '2001-07-22', 'Tangier', 'eyJpdiI6IlFiUHlxamN3dExtQThuSFVTQW9Eamc9PSIsInZhbHVlIjoiVHdPMzJOV3RVSkFJSkpSY2ovMUppQT09IiwibWFjIjoiMzc5MTBkZjMyZGY5MjlkYjY4Y2Y5YWJjYjBhNDExMTdmM2IwZTZlNjM0OTMxZTJjMjUyNTU1OTZjYmJmZjBhNyIsInRhZyI6IiJ9', 'kaoutar.jpg', 'U1m7BxkZpB1xIg6EhGCK8apvaZ0lIj', 'crSl', '2', 0, 15, NULL, '2022-06-13 16:55:53', '2022-06-13 16:55:53'),
(32, 'test', 'kaoutarboudouft3@gmail.com', 688683468, '2000-12-12', 'Tangier', 'eyJpdiI6IlZuZE9IVE9KcWJXeENlbXdvdVVhN3c9PSIsInZhbHVlIjoia25XMGhUbFNBcXVXdGZ0VkFadlRzZz09IiwibWFjIjoiMzM3MWNiZjczMTc1M2FiNDQyNWMzZTRmMDgxZDg4MDU5Yjg0ODkyMWEzNjAwOWJiOTk5NGZiMTI5MDJiZDBkOSIsInRhZyI6IiJ9', 'test3.png', 'EMe1HuMh7BcwzKVVIq3Mph3Bk3jnp6', 'rFdz', '2', 0, 0, NULL, '2022-06-17 13:45:02', '2022-06-17 13:45:02');

-- --------------------------------------------------------

--
-- Structure de la table `userwantoffer`
--

DROP TABLE IF EXISTS `userwantoffer`;
CREATE TABLE IF NOT EXISTS `userwantoffer` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `UserWhoWant` bigint(20) UNSIGNED NOT NULL,
  `AnnonceId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userwantoffer_userwhowant_foreign` (`UserWhoWant`),
  KEY `userwantoffer_annonceid_foreign` (`AnnonceId`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `userwantoffer`
--

INSERT INTO `userwantoffer` (`id`, `UserWhoWant`, `AnnonceId`, `created_at`, `updated_at`) VALUES
(1, 5, 2, '2022-05-27 16:59:15', '2022-05-27 16:59:15'),
(13, 11, 8, '2022-06-06 07:03:59', '2022-06-06 07:03:59'),
(20, 5, 23, '2022-06-06 11:09:49', '2022-06-06 11:09:49'),
(21, 11, 2, '2022-06-13 17:05:30', '2022-06-13 17:05:30'),
(22, 4, 16, '2022-06-13 17:38:04', '2022-06-13 17:38:04'),
(23, 4, 15, '2022-06-13 17:38:10', '2022-06-13 17:38:10'),
(24, 4, 20, '2022-06-13 17:38:16', '2022-06-13 17:38:16'),
(25, 4, 23, '2022-06-13 17:38:23', '2022-06-13 17:38:23'),
(26, 5, 17, '2022-06-13 17:39:01', '2022-06-13 17:39:01'),
(27, 5, 16, '2022-06-13 17:39:02', '2022-06-13 17:39:02'),
(28, 5, 1, '2022-06-13 17:39:06', '2022-06-13 17:39:06'),
(29, 5, 18, '2022-06-13 17:39:10', '2022-06-13 17:39:10'),
(33, 30, 16, '2022-06-13 17:39:47', '2022-06-13 17:39:47'),
(34, 30, 18, '2022-06-13 17:39:53', '2022-06-13 17:39:53'),
(38, 32, 17, '2022-06-17 14:04:51', '2022-06-17 14:04:51'),
(39, 32, 18, '2022-06-17 14:04:52', '2022-06-17 14:04:52');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_annonceurid_foreign` FOREIGN KEY (`AnnonceurId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `annonces_souscategoryid_foreign` FOREIGN KEY (`SousCategoryId`) REFERENCES `souscategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `annonces_whogettheoffer_foreign` FOREIGN KEY (`WhoGetTheOffer`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_annid_foreign` FOREIGN KEY (`AnnId`) REFERENCES `annonces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conversations_theownerofoffer_foreign` FOREIGN KEY (`TheOwnerOfOffer`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conversations_thewinner_foreign` FOREIGN KEY (`TheWinner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_idconversation_foreign` FOREIGN KEY (`IdConversation`) REFERENCES `conversations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_sender_foreign` FOREIGN KEY (`Sender`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `souscategory`
--
ALTER TABLE `souscategory`
  ADD CONSTRAINT `souscategory_categoryid_foreign` FOREIGN KEY (`Categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `userwantoffer`
--
ALTER TABLE `userwantoffer`
  ADD CONSTRAINT `userwantoffer_annonceid_foreign` FOREIGN KEY (`AnnonceId`) REFERENCES `annonces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userwantoffer_userwhowant_foreign` FOREIGN KEY (`UserWhoWant`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
