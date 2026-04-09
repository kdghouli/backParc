-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 avr. 2026 à 00:13
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_mmr`
--

-- --------------------------------------------------------

--
-- Structure de la table `agences`
--

CREATE TABLE `agences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(40) NOT NULL,
  `site` varchar(40) NOT NULL,
  `division` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agences`
--

INSERT INTO `agences` (`id`, `nom`, `site`, `division`, `created_at`, `updated_at`) VALUES
(1, 'Marrakech', 'CBGS', 'M210', NULL, '2026-01-15 19:58:28'),
(2, 'Beni Mellal', 'CBGS', 'M220', NULL, NULL),
(3, 'Khouribga', 'CBGS', 'M260', NULL, NULL),
(4, 'Ain Harrouda', 'SCBG', 'M171', NULL, NULL),
(6, 'Essaouira', 'CBGS', 'M230', '2026-01-03 18:35:52', '2026-01-03 18:35:52'),
(7, 'Safi', 'CBGS', 'M240', '2026-01-03 18:36:20', '2026-01-03 18:36:20'),
(8, 'Ouarzazate', 'CBGS', 'M280', '2026-01-03 18:36:41', '2026-01-03 18:36:41'),
(9, 'Sidi Bennour', 'CBGS', 'M250', '2026-01-03 18:37:01', '2026-01-03 18:37:01'),
(10, 'El Kelaa', 'CBGS', 'M270', '2026-01-03 18:37:19', '2026-01-03 18:37:19'),
(11, 'El Jadida', 'SCBG', 'M120', '2026-01-13 16:40:30', '2026-01-13 16:40:30');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Camion', NULL, NULL),
(2, 'Voiture', NULL, NULL),
(3, 'Scooter', NULL, NULL),
(4, 'Chariot élèvateur', NULL, NULL),
(5, 'Autre', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) NOT NULL,
  `kilometrage` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `vhl_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `comment`, `kilometrage`, `active`, `vhl_id`, `created_at`, `updated_at`, `user_id`, `statut_id`, `parent_id`) VALUES
(98, 'tyretyrtyr', NULL, 1, 2, '2025-08-02 13:59:03', '2025-08-02 13:59:03', 23, 6, NULL),
(129, 'gmlhjmlhmlfdgh', '9898', 0, 2, '2026-01-29 19:08:46', '2026-01-29 19:08:46', 23, 3, NULL),
(130, 'dghouli khalid', '000000 000000', 0, 6, '2026-01-29 19:25:31', '2026-01-29 19:25:31', 23, 8, NULL),
(131, 'test status', NULL, 0, 6, '2026-02-04 16:55:55', '2026-02-04 16:55:55', 23, 2, NULL),
(133, 'sdfgfgfdgdfg', 'sdss', 0, 9, '2026-02-05 19:48:49', '2026-02-05 19:48:49', 23, 3, NULL),
(134, 'fdsgdfgsdgsd', 'fffff', 1, 9, '2026-02-05 19:56:46', '2026-02-05 19:56:46', 22, 8, NULL),
(135, 'fghghjghj', 'ghjghj', 1, 9, '2026-02-05 21:09:52', '2026-02-05 21:09:52', 22, 4, NULL),
(137, 'dgfsdgdgdgf', 'ghjghj', 1, 4, '2026-02-06 19:40:00', '2026-02-06 19:40:00', 21, 8, NULL),
(138, '367 en panne active 99', '99', 1, 10, '2026-02-06 19:56:01', '2026-02-06 19:56:01', 23, 2, NULL),
(139, 'assia dghouli', 'ddd', 1, 7, '2026-02-06 20:06:54', '2026-02-06 20:06:54', 23, 3, NULL),
(140, 'sdfsdfsdfsdf', 'sdfsdf', 1, 20, '2026-02-06 20:20:45', '2026-02-06 20:20:45', 24, 3, NULL),
(141, 'jhjghjgj', 'hjgj', 1, 1, '2026-02-06 20:39:38', '2026-02-06 20:39:38', 24, 4, NULL),
(142, 'houda alla', '9999', 1, 9, '2026-02-07 07:23:12', '2026-02-07 07:23:12', 23, 7, NULL),
(143, 'probleme resolu e', '999', 1, 2, '2026-02-07 07:52:49', '2026-02-07 09:55:29', 23, 1, NULL),
(144, 'resolu', '99', 0, 1, '2026-02-07 07:53:52', '2026-02-07 07:53:52', 23, 1, NULL),
(145, 'kljkljkl', NULL, 1, 1, '2026-02-07 07:55:21', '2026-02-07 07:55:21', 23, 1, NULL),
(146, 'fgsdgdfg', 'fddgdfg', 1, 1, '2026-02-07 07:57:07', '2026-02-07 07:57:07', 23, 1, NULL),
(147, 'sdfgfdgdsg', 'dsfgdfg', 1, 1, '2026-02-07 08:19:51', '2026-02-07 08:19:51', 23, 2, NULL),
(148, 'c\'est ok', '147', 1, 1, '2026-02-07 14:50:08', '2026-02-07 14:50:08', 23, 1, NULL),
(149, 'oooo88', '146', 1, 1, '2026-02-07 14:51:52', '2026-02-07 15:02:31', 23, NULL, NULL),
(150, 'ddd', '147', 1, 1, '2026-02-07 15:03:02', '2026-02-07 15:03:02', 23, NULL, NULL),
(151, 'dfsgdg', 'ggg', 1, 8, '2026-02-07 15:06:43', '2026-02-07 15:06:43', 23, 3, NULL),
(152, '9999', '150', 1, 1, '2026-02-07 15:29:45', '2026-02-07 15:29:45', 23, 5, NULL),
(153, 'dsdfdsfsdfsqdfsfsdfd', 'dd', 1, 14, '2026-02-07 15:38:23', '2026-02-07 15:38:23', 23, 2, NULL),
(154, 'ghhh', '137', 1, 4, '2026-02-07 16:15:06', '2026-02-07 16:15:06', 23, 1, NULL),
(155, 'khalid yojareb', '985', 1, 11, '2026-02-07 16:20:43', '2026-02-07 16:20:43', 23, 2, NULL),
(156, 'gfdfgfg', 'gfgdf', 1, 12, '2026-02-07 16:23:07', '2026-02-07 16:23:07', 23, 2, NULL),
(157, 'sdfsdfsd', 'dfff', 1, 15, '2026-02-07 16:27:24', '2026-02-07 16:27:24', 23, 1, NULL),
(158, 'ythgfhfg', 'fdhfh', 1, 16, '2026-02-07 16:29:09', '2026-02-07 16:29:09', 23, 1, NULL),
(159, 'sqdqSDQS', '99999', 1, 26, '2026-02-07 16:43:39', '2026-02-07 16:43:39', 23, 2, NULL),
(160, 'SDFGDFG', '9999', 1, 17, '2026-02-07 16:47:17', '2026-02-07 16:47:17', 23, 3, NULL),
(161, 'jhgjhg', NULL, 1, 16, '2026-02-07 16:50:53', '2026-02-07 16:50:53', 23, 2, NULL),
(162, 'fgsgsdxf', 'dfgdfg', 1, 4, '2026-02-07 16:53:27', '2026-02-07 16:53:27', 23, 1, NULL),
(163, '999999', '99999', 1, 25, '2026-02-07 16:55:28', '2026-02-07 16:55:28', 23, 2, NULL),
(164, 'dsfqsdf', 'ffff', 1, 39, '2026-02-07 17:55:46', '2026-02-07 17:55:46', 23, 2, NULL),
(165, 'fdgdsfgsdfg', 'fgf', 1, 28, '2026-02-07 17:58:05', '2026-02-07 17:58:05', 23, 2, NULL),
(166, 'hfgjgfhj', 'hgjfghj', 1, 18, '2026-02-07 17:59:18', '2026-02-07 17:59:18', 23, 2, NULL),
(169, 'gdfhgfhfg', 'gfhfg', 1, 41, '2026-02-07 18:07:05', '2026-02-07 18:07:05', 23, 2, NULL),
(170, 'fdgdhfghfg', 'fghfg', 1, 41, '2026-02-07 18:09:55', '2026-02-07 18:09:55', 23, 2, NULL),
(171, 'fhhh', NULL, 1, 41, '2026-02-07 18:10:18', '2026-02-07 18:10:18', 23, 3, 169),
(172, 'hgfhfghf', 'hh', 1, 41, '2026-02-07 18:10:55', '2026-02-07 18:10:55', 23, 1, NULL),
(173, 'dgfdfgdfg', 'fgsdfg', 1, 35, '2026-02-07 18:14:12', '2026-02-07 18:14:12', 23, 2, NULL),
(174, 'dghouli khalid', 'ghjghj', 1, 1, '2026-02-07 20:51:31', '2026-02-07 20:51:31', 23, 2, NULL),
(175, 'fdsddgdfg', 'fdgdfg', 1, 1, '2026-02-07 20:55:34', '2026-02-07 20:55:34', 23, 1, NULL),
(176, 'fhfgdgf', 'dfghfh', 1, 1, '2026-02-07 20:56:17', '2026-02-07 20:56:17', 23, 3, NULL),
(177, 'cvbnvbvcbn', 'bnvcnvbn', 1, 2, '2026-02-07 20:59:27', '2026-02-07 20:59:27', 23, 4, NULL),
(178, 'dsfsdfsdf', 'dssdf', 1, 2, '2026-02-07 21:03:18', '2026-02-07 21:03:18', 23, 7, NULL),
(179, 'dfgdfgdfg', 'dfgdfg', 1, 2, '2026-02-07 21:08:55', '2026-02-07 21:08:55', 23, 2, NULL),
(180, 'gfhfdghfgh', 'fghfgh', 1, 1, '2026-02-07 21:11:31', '2026-02-07 21:11:31', 23, 5, NULL),
(181, 'gfdhdfghfgh', NULL, 1, 1, '2026-02-07 21:12:47', '2026-02-07 21:12:47', 23, 1, NULL),
(182, 'dfgsdfgdfg', 'dfgdfg', 1, 13, '2026-02-07 21:14:43', '2026-02-07 21:14:43', 22, 2, NULL),
(183, 'dfghfdgdfgh', 'fghfgh', 1, 31, '2026-02-07 21:44:59', '2026-02-07 21:44:59', 22, 2, NULL),
(184, 'kkkkk', NULL, 1, 1, '2026-02-08 13:11:15', '2026-02-08 13:11:15', 22, 2, 180),
(185, 'ok', 'ok', 1, 1, '2026-02-11 18:05:33', '2026-02-11 18:05:33', 25, 1, NULL),
(186, 'fghfghfgh', 'gfhfgh', 1, 2, '2026-02-21 22:59:10', '2026-02-21 22:59:10', 25, 2, NULL),
(187, 'hjkhjk', 'jkhjk', 1, 1, '2026-02-21 23:06:28', '2026-02-21 23:06:28', 25, 3, NULL),
(188, 'gg', NULL, 1, 1, '2026-02-21 23:08:18', '2026-02-21 23:08:18', 25, 2, NULL),
(189, 'ok', NULL, 1, 2, '2026-02-21 23:12:55', '2026-02-21 23:12:55', 25, 1, 179),
(190, 'ok', NULL, 1, 1, '2026-02-21 23:35:04', '2026-02-21 23:35:04', 25, 1, 188);

-- --------------------------------------------------------

--
-- Structure de la table `dailychecks`
--

CREATE TABLE `dailychecks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dateControle` date DEFAULT NULL,
  `frein` tinyint(1) NOT NULL DEFAULT 0,
  `pneus` tinyint(1) NOT NULL DEFAULT 0,
  `eclairage` tinyint(1) NOT NULL DEFAULT 0,
  `extincteur` tinyint(1) NOT NULL DEFAULT 0,
  `batterie` tinyint(1) NOT NULL DEFAULT 0,
  `fuite` tinyint(1) NOT NULL DEFAULT 0,
  `avertisseur` tinyint(1) NOT NULL DEFAULT 0,
  `ceinture` tinyint(1) NOT NULL DEFAULT 0,
  `retroviseur` tinyint(1) NOT NULL DEFAULT 0,
  `observation` varchar(255) DEFAULT NULL,
  `kilometrage` varchar(255) DEFAULT '0',
  `vhl_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `utilisateur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dailychecks`
--

INSERT INTO `dailychecks` (`id`, `dateControle`, `frein`, `pneus`, `eclairage`, `extincteur`, `batterie`, `fuite`, `avertisseur`, `ceinture`, `retroviseur`, `observation`, `kilometrage`, `vhl_id`, `user_id`, `utilisateur_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, '2026-04-09', 1, 1, 1, 1, 1, 1, 1, 1, 1, 'ras', '02365', 3, 22, 4, NULL, NULL, NULL),
(9, '2026-04-09', 0, 0, 1, 1, 1, 0, 1, 1, 1, NULL, '2222', 5, 23, 3, NULL, NULL, NULL),
(10, '2026-04-09', 1, 1, 1, 1, 1, 0, 1, 1, 1, NULL, '99', 16, 33, 2, '2026-04-09 20:04:54', '2026-04-09 20:04:54', NULL),
(11, '2026-04-09', 1, 1, 1, 1, 1, 0, 1, 1, 1, NULL, '87', 9, 33, 2, '2026-04-09 20:05:48', '2026-04-09 20:05:48', NULL),
(12, '2026-04-09', 1, 1, 1, 1, 1, 0, 1, 1, 1, NULL, '0', 7, 33, 2, '2026-04-09 20:06:02', '2026-04-09 20:06:02', NULL),
(13, '2026-04-09', 1, 1, 1, 1, 1, 0, 1, 1, 1, NULL, '0', 14, NULL, 2, '2026-04-09 20:13:46', '2026-04-09 20:13:46', NULL),
(14, '2026-04-09', 1, 1, 1, 1, 1, 0, 1, 1, 1, NULL, '878787', 26, NULL, 2, '2026-04-09 20:15:19', '2026-04-09 20:15:19', NULL),
(15, '2026-04-09', 1, 1, 1, 1, 1, 0, 1, 1, 1, NULL, '0', 13, NULL, 2, '2026-04-09 20:22:50', '2026-04-09 21:04:12', '2026-04-09 21:04:12'),
(16, '2026-04-09', 1, 1, 1, 1, 1, 0, 1, 1, 1, NULL, '0', 12, 33, 2, '2026-04-09 20:25:11', '2026-04-09 20:25:11', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hist_statuts`
--

CREATE TABLE `hist_statuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vhl_id` bigint(20) UNSIGNED NOT NULL,
  `ancien_statut_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nouveau_statut_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `commentaire` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hist_statuts`
--

INSERT INTO `hist_statuts` (`id`, `vhl_id`, `ancien_statut_id`, `nouveau_statut_id`, `user_id`, `commentaire`, `created_at`, `updated_at`) VALUES
(52, 1, 1, 3, 24, 'Changement automatique via système', '2026-02-07 20:56:18', '2026-02-07 20:56:18'),
(54, 13, 1, 2, 24, 'Changement automatique via système', '2026-02-07 21:14:44', '2026-02-07 21:14:44'),
(55, 31, 1, 2, 22, 'Changement automatique via système', '2026-02-07 21:45:00', '2026-02-07 21:45:00'),
(56, 1, 1, 2, 22, 'Changement automatique via système', '2026-02-08 13:11:16', '2026-02-08 13:11:16'),
(57, 1, 2, 1, 25, 'Changement automatique via système', '2026-02-11 18:05:34', '2026-02-11 18:05:34'),
(58, 1, 1, 3, 25, 'Changement automatique via système', '2026-02-21 23:06:29', '2026-02-21 23:06:29'),
(59, 1, 3, 2, 25, 'Changement automatique via système', '2026-02-21 23:08:19', '2026-02-21 23:08:19'),
(60, 2, 2, 1, 25, 'Changement automatique via système', '2026-02-21 23:12:56', '2026-02-21 23:12:56'),
(61, 1, 2, 1, 25, 'Changement automatique via système', '2026-02-21 23:35:05', '2026-02-21 23:35:05');

-- --------------------------------------------------------

--
-- Structure de la table `imagesvhls`
--

CREATE TABLE `imagesvhls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagevhl` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vhl_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `intitules`
--

CREATE TABLE `intitules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `location` tinyint(1) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `acronym` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `intitules`
--

INSERT INTO `intitules` (`id`, `nom`, `location`, `ville`, `adresse`, `tel`, `mail`, `created_at`, `updated_at`, `acronym`) VALUES
(1, 'Eccbc-SCBG', 0, 'Casablanca', '', '', '', NULL, NULL, 'ECCBC'),
(2, 'Eccbc-CBGS', 0, 'Marrakech', '', '', '', NULL, NULL, 'ECCBC'),
(3, 'Eccbc-CBGN', 0, 'Fes', '', '', '', NULL, NULL, 'ECCBC'),
(4, 'Eccbc-COBOMI', 0, 'Casablanca', '', '', '', NULL, NULL, 'ECCBC'),
(5, 'Chaabi LLD', 1, 'Casablanca', '', '', '', NULL, NULL, 'CHAABI'),
(6, 'AJ Manutention', 1, 'Casablanca', '', '', '', NULL, NULL, 'AJ'),
(7, 'Espace Location', 1, 'Casablanca', '', '', '', NULL, NULL, 'ESP LOC'),
(8, 'Arval', 1, 'Casablanca', '', '2125566998874', '', NULL, '2025-12-25 19:07:03', 'ARVAL'),
(9, 'Optiflux', 1, 'Casablanca', '', '', '', NULL, NULL, 'OPTIFLUX'),
(10, 'Ste Lagouassem', 1, 'Casablanca', '', '', '', NULL, NULL, 'LAG'),
(11, 'Leader (Auto Hall)', 1, 'Casablanca', '', '', '', NULL, NULL, 'LEADER');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `kilometrages`
--

CREATE TABLE `kilometrages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kilometrage` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `observation` text NOT NULL,
  `vhl_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_26_303836_create_vhls_table', 1),
(5, '2024_06_05_214540_create_agences_table', 1),
(6, '2024_06_05_214640_create_categories_table', 1),
(7, '2024_06_05_214701_create_intitules_table', 1),
(8, '2024_06_05_214829_create_commentaires_table', 1),
(9, '2024_06_05_215339_create_status_table', 1),
(10, '2024_06_05_215734_create_services_table', 1),
(11, '2024_06_05_215752_create_utilisateurs_table', 1),
(12, '2024_06_05_220302_create_kilometrages_table', 1),
(13, '2024_06_05_220932_create_prestataires_table', 1),
(14, '2024_06_06_181544_add_column_vhls', 1),
(15, '2024_06_07_215215_add_column_vhls', 1),
(16, '2024_06_08_130911_create_statu_vhl_table', 1),
(17, '2024_12_08_190227_create_personal_access_tokens_table', 1),
(18, '2025_03_18_213509_add_column_photo_users', 2),
(19, '2025_03_19_221811_create_imagesvhls_table', 3),
(20, '2025_04_12_140132_create_statut_vhl_table', 4),
(21, '2025_05_16_204448_add_column_commentaires', 5),
(22, '2025_06_16_194901_add_column_utilisateurs', 6),
(23, '2025_06_22_160912_add_column_parent_id_commentaires', 7),
(24, '2025_07_05_065338_add_column_acronym_intitules', 8),
(25, '2025_07_20_174817_add_column_vhls_etat_id', 9),
(26, '2025_07_20_180508_create_hist_statuts_table', 10),
(28, '2025_08_05_084255_create_daily_checks_table', 11),
(29, '2026_01_27_193142_add_column', 12),
(31, '2026_03_03_215621_create_tags_table', 13),
(32, '2026_03_03_230939_add_column_user_id', 14),
(33, '2026_03_03_234947_add_column_soft_delete', 15),
(34, '2026_03_06_221410_create_telescope_entries_table', 16),
(35, '2026_04_09_214931_add_softdelete', 17);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '7f392b9cec39fdefeca5ba4c0443d29928a4270aedabf5dfa2f352feb409167c', '[\"*\"]', NULL, NULL, '2025-03-17 22:03:14', '2025-03-17 22:03:14'),
(2, 'App\\Models\\User', 1, 'auth_token', '0bbb6808b6bd1d4ae4be5d91fae279bbbce891b6f082cbe21797387e24094e78', '[\"*\"]', NULL, NULL, '2025-03-17 22:05:00', '2025-03-17 22:05:00'),
(3, 'App\\Models\\User', 2, 'auth_token', '72e3684db7213e2f72d863a9f3ed2b0dbf72d7ff8c4dca328a123066a9f339f8', '[\"*\"]', NULL, NULL, '2025-03-18 21:55:36', '2025-03-18 21:55:36'),
(4, 'App\\Models\\User', 2, 'auth_token', 'd95fb41eeded8ab02186d3675fe27e0b12f7bc691a27bf9d4145e64faca68e31', '[\"*\"]', NULL, NULL, '2025-03-18 21:55:58', '2025-03-18 21:55:58'),
(5, 'App\\Models\\User', 1, 'auth_token', 'ea07552e2ed53cf5487f05a400bdc869a54450c711c8b8a9bae44b29c5de71f1', '[\"*\"]', NULL, NULL, '2025-03-18 22:33:38', '2025-03-18 22:33:38'),
(6, 'App\\Models\\User', 2, 'auth_token', '49860db34e328ed67128215964b896209ede589483670f94f2b0b9f3f43d8863', '[\"*\"]', NULL, NULL, '2025-03-18 23:10:48', '2025-03-18 23:10:48'),
(7, 'App\\Models\\User', 1, 'auth_token', 'a86c60974eb80260c74dd81ae45c598b651ab5a3eabbbfd3d3f94519e4bb574e', '[\"*\"]', NULL, NULL, '2025-03-20 17:20:53', '2025-03-20 17:20:53'),
(8, 'App\\Models\\User', 1, 'auth_token', 'aec9d573229ba44bd605559d0876ad5af1f09f12e66c25988c4ba4c769e7c967', '[\"*\"]', NULL, NULL, '2025-03-20 17:55:38', '2025-03-20 17:55:38'),
(9, 'App\\Models\\User', 1, 'auth_token', '8f590b5943d57592ed66ecd29bc0bb5f494627ca5a14f81078b8bb66249c4ae1', '[\"*\"]', NULL, NULL, '2025-03-21 17:03:19', '2025-03-21 17:03:19'),
(10, 'App\\Models\\User', 1, 'auth_token', 'abc940e76ec5280e644513e93940f66b239f61faaabd56e03b24d9b0274c4544', '[\"*\"]', NULL, NULL, '2025-04-04 22:45:49', '2025-04-04 22:45:49'),
(11, 'App\\Models\\User', 1, 'auth_token', 'ebcae57746dbdc3c4437f91a11faeb2d2818b26f70304bf577bfed830c32a170', '[\"*\"]', NULL, NULL, '2025-04-05 11:24:51', '2025-04-05 11:24:51'),
(12, 'App\\Models\\User', 1, 'auth_token', '4b8b17fbaba1fbaa689a3568f40a9bef58697c50ef164d64ba935785ba2c3b9b', '[\"*\"]', NULL, NULL, '2025-04-14 17:20:32', '2025-04-14 17:20:32'),
(13, 'App\\Models\\User', 1, 'auth_token', '32b638e330010360d5331a51cc3c0fd4bb8b3c2df50c7489a2edf7b47d3e5d80', '[\"*\"]', NULL, NULL, '2025-04-16 17:36:05', '2025-04-16 17:36:05'),
(14, 'App\\Models\\User', 1, 'auth_token', '142fc7773779ec99d2d4f71e1fe107f90ac527053d1fd60838b38b8b98c82967', '[\"*\"]', NULL, NULL, '2025-04-17 17:08:33', '2025-04-17 17:08:33'),
(15, 'App\\Models\\User', 1, 'auth_token', 'ef1658577d6d3c877e7b88ddc6847d6beba0854793a641a9f211a946ae919a1e', '[\"*\"]', NULL, NULL, '2025-04-17 21:14:25', '2025-04-17 21:14:25'),
(16, 'App\\Models\\User', 1, 'auth_token', '4ff27919874d70ed01df899370fdefede244c85332eb14d9f7935453cacd7afa', '[\"*\"]', NULL, NULL, '2025-06-29 12:01:27', '2025-06-29 12:01:27'),
(17, 'App\\Models\\User', 1, 'auth_token', '7c2bbe708d1dbd8f2c44cc7ba09992f21f776761f366bb4b01e0c9a502336926', '[\"*\"]', NULL, NULL, '2025-06-29 12:01:29', '2025-06-29 12:01:29'),
(18, 'App\\Models\\User', 1, 'auth_token', 'b311381299499c29f7f3de8ece8b0e833482704f4177e09d9579785a8ce73271', '[\"*\"]', NULL, NULL, '2025-06-29 12:01:59', '2025-06-29 12:01:59'),
(19, 'App\\Models\\User', 1, 'auth_token', '12f5c91a77eee1de23ce2aaf584c726dc6fb833a1fe2685e0d8584238e4d289e', '[\"*\"]', NULL, NULL, '2025-06-29 12:02:05', '2025-06-29 12:02:05'),
(20, 'App\\Models\\User', 1, 'auth_token', '2b0c26e189feb9aa4ea5b78bb29a3eb4c0b616e3aa2c3d5215691f8872ed277b', '[\"*\"]', NULL, NULL, '2025-06-29 12:03:59', '2025-06-29 12:03:59'),
(21, 'App\\Models\\User', 3, 'auth_token', '0959e1caaa552036226c0794a3b0be614403cea3d8f3f91e693edac14a5a6769', '[\"*\"]', NULL, NULL, '2025-06-29 12:05:19', '2025-06-29 12:05:19'),
(22, 'App\\Models\\User', 1, 'auth_token', 'f382ff36c6e721a67500b3f1ecaf2df8714d7b4b989afea1c24a58441ecc596e', '[\"*\"]', NULL, NULL, '2025-06-29 13:30:35', '2025-06-29 13:30:35'),
(23, 'App\\Models\\User', 1, 'auth_token', '49991824f5a5af722d2979863aee404c14be8de28a75a5ef465540ad5806fdc6', '[\"*\"]', NULL, NULL, '2025-06-29 13:33:16', '2025-06-29 13:33:16'),
(24, 'App\\Models\\User', 1, 'auth_token', 'b0a8f1ac1fd8efd65191f5f9d17a92eca2fabcb39833c56b6947305c7004ba3b', '[\"*\"]', NULL, NULL, '2025-06-29 13:33:22', '2025-06-29 13:33:22'),
(25, 'App\\Models\\User', 1, 'auth_token', 'ff1a7e55ee1bcb487634c26fdbcd9abfc6e5c85eda170b9802d87327e3dfbbe0', '[\"*\"]', NULL, NULL, '2025-06-29 13:35:23', '2025-06-29 13:35:23'),
(26, 'App\\Models\\User', 1, 'auth_token', '5ae0ccdf020984f909d9d253971a13e9638f7b85a970547465f5c4c1005d3beb', '[\"*\"]', NULL, NULL, '2025-06-29 13:35:53', '2025-06-29 13:35:53'),
(27, 'App\\Models\\User', 3, 'auth_token', 'c7e18411e29504ca06bf0a2b026bef4df802c1dcde51a08238722e62ee7c2266', '[\"*\"]', NULL, NULL, '2025-06-29 13:38:45', '2025-06-29 13:38:45'),
(28, 'App\\Models\\User', 3, 'auth_token', '13fdd246781dbb8e1e7d37e28f2730a30704c8676dcd386bb736ba70a986aaca', '[\"*\"]', NULL, NULL, '2025-06-29 13:39:14', '2025-06-29 13:39:14'),
(29, 'App\\Models\\User', 3, 'auth_token', '71ec445ac994d28e2a587013856bf7e4e5281ba52dc2e8281e6c0b9cff3f7de8', '[\"*\"]', NULL, NULL, '2025-06-29 13:40:58', '2025-06-29 13:40:58'),
(30, 'App\\Models\\User', 1, 'auth_token', '2e649bc7f5f3f160e38604ab5878fc253fbe360320071cd79f4661b3d49fb4a9', '[\"*\"]', NULL, NULL, '2025-06-30 22:07:46', '2025-06-30 22:07:46'),
(31, 'App\\Models\\User', 3, 'auth_token', 'f442732dea03f998643c15e5e2fc10a2a9a10cb02c2c8fd396f5fb72fa5377c3', '[\"*\"]', NULL, NULL, '2025-06-30 22:09:01', '2025-06-30 22:09:01'),
(32, 'App\\Models\\User', 1, 'auth_token', '1713892c8be228eea747c42530788ed3959bd06b26907b1cf0cc79b52e38361f', '[\"*\"]', NULL, NULL, '2025-06-30 22:14:51', '2025-06-30 22:14:51'),
(33, 'App\\Models\\User', 1, 'auth_token', 'f143af626dee86b694118ddf51a31ebb6a8b3b73adcb827a98f65ebf558df9b2', '[\"*\"]', NULL, NULL, '2025-07-01 17:46:55', '2025-07-01 17:46:55'),
(34, 'App\\Models\\User', 4, 'auth_token', '8f2372c5db47a01b587eca686c24cc99a74ca57aa1f6ea7a1284764fb7b1ba68', '[\"*\"]', NULL, NULL, '2025-07-01 17:50:05', '2025-07-01 17:50:05'),
(35, 'App\\Models\\User', 5, 'auth_token', 'c1b0fe2f4dc4a754bba961c993cf516796381bd1a7c665d6ac24168b47c90769', '[\"*\"]', NULL, NULL, '2025-07-01 17:57:26', '2025-07-01 17:57:26'),
(36, 'App\\Models\\User', 6, 'auth_token', 'cbf90f395064a7811d98bab58c4c5e84a8b376aec9e12770431a57625eae58d8', '[\"*\"]', NULL, NULL, '2025-07-01 18:06:22', '2025-07-01 18:06:22'),
(37, 'App\\Models\\User', 7, 'auth_token', '3f33a86567ea00bca973f0419587cca0340bd5ff3ec70d45ee852459bec5d755', '[\"*\"]', NULL, NULL, '2025-07-01 18:07:38', '2025-07-01 18:07:38'),
(38, 'App\\Models\\User', 7, 'auth_token', '29623ac7507d49674ea9b07891c812e4bf787a6af005073f02bbe63e8172b97a', '[\"*\"]', NULL, NULL, '2025-07-01 18:07:58', '2025-07-01 18:07:58'),
(39, 'App\\Models\\User', 7, 'auth_token', '226b54a1ebf4398e5dc070dfae7f212ae911dd213897dd73d39fa4fa0145382f', '[\"*\"]', NULL, NULL, '2025-07-01 18:09:49', '2025-07-01 18:09:49'),
(40, 'App\\Models\\User', 7, 'auth_token', '908188eb4a4ed1f6eff41d376d1f4bf6dd2633ae63dc90d03307c88c67c36959', '[\"*\"]', NULL, NULL, '2025-07-01 18:10:24', '2025-07-01 18:10:24'),
(41, 'App\\Models\\User', 7, 'auth_token', '76c49b7917aa51fa268f2ce8b34a2002b6139c102b90a84cd4b3acaa1a05c31f', '[\"*\"]', NULL, NULL, '2025-07-01 18:31:17', '2025-07-01 18:31:17'),
(42, 'App\\Models\\User', 7, 'auth_token', 'a61f27f483dd14cec24bf1ec62ba078584d65fba4a6e9e051d75f033fa5cb857', '[\"*\"]', NULL, NULL, '2025-07-01 18:33:47', '2025-07-01 18:33:47'),
(43, 'App\\Models\\User', 8, 'auth_token', '9a3db3e8d2e503b906649eb04d73a57859a17982556bc16d144fdbb948949dc3', '[\"*\"]', NULL, NULL, '2025-07-01 18:50:07', '2025-07-01 18:50:07'),
(44, 'App\\Models\\User', 7, 'auth_token', '4be02900637628da503438402e1a1a1ce9c084f4061d79aa5305e22ec89463e7', '[\"*\"]', NULL, NULL, '2025-07-01 18:50:57', '2025-07-01 18:50:57'),
(45, 'App\\Models\\User', 8, 'auth_token', 'a0880399111bb8a6571d30931fde1b8b7a01745452a32503515fc28a13bb0d73', '[\"*\"]', NULL, NULL, '2025-07-01 19:12:09', '2025-07-01 19:12:09'),
(46, 'App\\Models\\User', 7, 'auth_token', 'dbca053c1d7c4eb1760eadc4af92996d27a62e59d92f8ec4ffd5598108d37632', '[\"*\"]', NULL, NULL, '2025-07-04 18:55:15', '2025-07-04 18:55:15'),
(47, 'App\\Models\\User', 7, 'auth_token', 'c9e22ee778052859f786c63b4db810b1e3f97de778af4ddda9638f97ca9fb380', '[\"*\"]', NULL, NULL, '2025-07-11 18:24:21', '2025-07-11 18:24:21'),
(48, 'App\\Models\\User', 7, 'auth_token', '487829cd3fe8584d15d31803a9dbf717fe88ed7fc9030629333c5b68699db0cb', '[\"*\"]', NULL, NULL, '2025-07-11 19:23:03', '2025-07-11 19:23:03'),
(49, 'App\\Models\\User', 7, 'auth_token', '1437e7e21f0cf29c986813f64c693c4e48c790e768ec9d6083c26265dab4cdb7', '[\"*\"]', NULL, NULL, '2025-07-13 15:49:06', '2025-07-13 15:49:06'),
(50, 'App\\Models\\User', 7, 'auth_token', '604d195b4445a9c8d8c11aa268e61a18243c1e5f9d52aacba9e6e45d09e04b19', '[\"*\"]', NULL, NULL, '2025-07-13 15:49:18', '2025-07-13 15:49:18'),
(51, 'App\\Models\\User', 9, 'auth_token', 'e40d6f11f3de6feb54adfec21bf1e55f092921d9e3c3b88dee46224d90541121', '[\"*\"]', NULL, NULL, '2025-07-26 08:25:43', '2025-07-26 08:25:43'),
(52, 'App\\Models\\User', 20, 'auth_token', 'c32577e99efc2f647be0e6f8f19538a34c04dd80adc9c8f8eff9da5c5b2fb645', '[\"*\"]', NULL, NULL, '2026-02-04 17:17:35', '2026-02-04 17:17:35'),
(53, 'App\\Models\\User', 21, 'auth_token', '4c2b0c1eecb2cf02c4bd4456dbfffb806234387b8f58a08c6ada71c6d60960e6', '[\"*\"]', NULL, NULL, '2026-02-04 17:20:09', '2026-02-04 17:20:09'),
(54, 'App\\Models\\User', 21, 'auth_token', '73e60c2aecc906fd802013193ec5ce3095bda5b89d37a14291708448679a4b01', '[\"*\"]', NULL, NULL, '2026-02-04 17:21:26', '2026-02-04 17:21:26'),
(55, 'App\\Models\\User', 22, 'auth_token', '0e470e932e567d32037fb1163e7dd12d0e6284b8656350a537b35ecba86ec0b2', '[\"*\"]', NULL, NULL, '2026-02-04 17:38:34', '2026-02-04 17:38:34'),
(56, 'App\\Models\\User', 23, 'auth_token', '699c8bdb086dc0ada21cd706067e152e1dd06f33076feddc37d48d05fa60aa5a', '[\"*\"]', NULL, NULL, '2026-02-04 17:40:04', '2026-02-04 17:40:04'),
(59, 'App\\Models\\User', 23, 'auth_token', '2bc58227021184ec58a80aba8da6414da36f90d0b6234a7cc0622a7d74fc8223', '[\"*\"]', NULL, NULL, '2026-02-04 18:47:10', '2026-02-04 18:47:10'),
(76, 'App\\Models\\User', 25, 'auth_token', '062ee64e992749e0d9cea40e0ebecdd7ed2abdb83dc31f8f23bc22c3bc676393', '[\"*\"]', NULL, NULL, '2026-02-10 21:09:09', '2026-02-10 21:09:09'),
(77, 'App\\Models\\User', 25, 'auth_token', '0cec01ee68968752c854bdb910a79fa8ae15bab671c51843338465435e8d4a16', '[\"*\"]', NULL, NULL, '2026-02-10 21:09:53', '2026-02-10 21:09:53'),
(88, 'App\\Models\\User', 24, 'auth_token', '725c7e67c0409bb45069055172ff78ff62cdcef211f000b94b1a6da3a23fabcd', '[\"*\"]', NULL, NULL, '2026-02-15 15:36:15', '2026-02-15 15:36:15'),
(95, 'App\\Models\\User', 26, 'auth_token', 'aa1e705f194bb2505766cb2fe36fe529ac11dcc92a4412eff470a2632d8f0cc8', '[\"*\"]', NULL, NULL, '2026-02-22 09:09:03', '2026-02-22 09:09:03'),
(96, 'App\\Models\\User', 26, 'auth_token', 'fc275fdbb99f391dac8848bb0721703310aa7a100929dd774b4fb1ac47a65657', '[\"*\"]', NULL, NULL, '2026-02-22 09:20:33', '2026-02-22 09:20:33'),
(97, 'App\\Models\\User', 27, 'auth_token', '74e035cad3821b220a806467749079ae0d49a7151210ee9f50ac1c4803595f58', '[\"*\"]', NULL, NULL, '2026-02-22 09:33:36', '2026-02-22 09:33:36'),
(98, 'App\\Models\\User', 28, 'auth_token', '636aeadd9919d49db6642e652a897bb62cbbaec0d6ee6ab0768ddc14df88aa34', '[\"*\"]', NULL, NULL, '2026-02-22 09:49:42', '2026-02-22 09:49:42'),
(103, 'App\\Models\\User', 23, 'auth_token', '1078d1822978dada58ef26c3e5a1c8afc182be931258ea8725b4f551826961ed', '[\"*\"]', NULL, NULL, '2026-03-09 23:00:44', '2026-03-09 23:00:44'),
(104, 'App\\Models\\User', 32, 'auth_token', '7b60d8775d96cc42658856c37d878298e0aa6fb8ead399f090b08d15bed4776c', '[\"*\"]', NULL, NULL, '2026-03-09 23:39:00', '2026-03-09 23:39:00'),
(105, 'App\\Models\\User', 23, 'auth_token', '86eb9f7f88f57b4a0c195de3d51c8190943578a82df422328d0e67846dd99258', '[\"*\"]', NULL, NULL, '2026-03-09 23:39:51', '2026-03-09 23:39:51'),
(106, 'App\\Models\\User', 33, 'auth_token', '98470e110ff8069c83d26d478a9ce9375e4dd0d6d7c6c9dfb66b11f36847b72d', '[\"*\"]', NULL, NULL, '2026-03-09 23:47:40', '2026-03-09 23:47:40'),
(107, 'App\\Models\\User', 34, 'auth_token', '0e03e7d2bcd4688dc02409746261b6ccb47ca818b23a2549e9a06363bb2263ec', '[\"*\"]', NULL, NULL, '2026-03-09 23:48:49', '2026-03-09 23:48:49'),
(108, 'App\\Models\\User', 35, 'auth_token', '9216b2ddd8beb50cb0865b43aeeeaa7b5cea206f07b9325c890218961a53d2c2', '[\"*\"]', NULL, NULL, '2026-03-09 23:53:52', '2026-03-09 23:53:52'),
(109, 'App\\Models\\User', 33, 'auth_token', 'd243ea928a36082c1360219e456948b78384b178893134209b3351febb52ba02', '[\"*\"]', NULL, NULL, '2026-03-10 21:50:29', '2026-03-10 21:50:29'),
(115, 'App\\Models\\User', 33, 'auth_token', '65ac093b34eac42a304dbf94594ce2829cdec98cdd648e1eec02faf1c36a9ab4', '[\"*\"]', NULL, NULL, '2026-03-14 00:15:17', '2026-03-14 00:15:17'),
(117, 'App\\Models\\User', 33, 'auth_token', '33911f963e1c812c6b80542920e392100820e12a76a84a3903087335dc566fb0', '[\"*\"]', NULL, NULL, '2026-03-15 23:28:50', '2026-03-15 23:28:50'),
(118, 'App\\Models\\User', 33, 'auth_token', '8aa9979659baf24a9549bd5ba29f173b460ab1f0e7056512c57501b8ffd8a187', '[\"*\"]', NULL, NULL, '2026-04-05 15:42:55', '2026-04-05 15:42:55'),
(133, 'App\\Models\\User', 33, 'auth_token', 'f9e680c26c553abf3ed9619c32d3d0b79790e95f8c3210a3f79d7f5f3403c9fc', '[\"*\"]', NULL, NULL, '2026-04-05 16:41:35', '2026-04-05 16:41:35');

-- --------------------------------------------------------

--
-- Structure de la table `prestataires`
--

CREATE TABLE `prestataires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code_fournisseur` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Commercial', NULL, NULL),
(2, 'Logistique', NULL, NULL),
(3, 'Distribution', NULL, NULL),
(4, 'Production', NULL, NULL),
(5, 'Autre', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6iW9npNOcLp65ISrkZfopPXXHCiZztqHJxJDXkIr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDZNMDg0Q2Fva3ZQVGpWU3R0Y2lRa0s1elM4VkhQWm1WelBpaE5MbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9nZW5lcmF0ZS1wZGYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1773004097),
('77QmBAvlZYRxvMbmkGGkSQJjeNoniXYnJ5xo2CFw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidHp6QVdMeDZiMG9FVm1XRENpdDBIczA5eElXdzk2cFF5VmFqOFdmSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9nZW5lcmF0ZS1wZGYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjIyOiJQSFBERUJVR0JBUl9TVEFDS19EQVRBIjthOjA6e319', 1773010009),
('LQE5vzF2C8VKe6ive6mwYuQozwtFu6t7a4w9Nl1s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVEZsVFczQlZWZWJNdDRmRzBKdkdoNmNpdUxSTjFiUFd2NFZUT0FYQyI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774641268);

-- --------------------------------------------------------

--
-- Structure de la table `statuts`
--

CREATE TABLE `statuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `statuts`
--

INSERT INTO `statuts` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Ok', NULL, NULL),
(2, 'Panne (arrêt)', NULL, NULL),
(3, 'Entretien régulier', NULL, NULL),
(4, 'En réparation', NULL, NULL),
(5, 'Contrôle technique', NULL, NULL),
(6, 'Problème de papier', NULL, NULL),
(7, 'Accidentée', NULL, NULL),
(8, 'Fin de contrat', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `priority` enum('low','medium','high','critical') NOT NULL DEFAULT 'medium',
  `status` enum('open','in_progress','closed') NOT NULL DEFAULT 'open',
  `urgence` enum('low','medium','urgent') NOT NULL DEFAULT 'medium',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `priority`, `status`, `urgence`, `created_at`, `updated_at`, `user_id`, `deleted_at`) VALUES
(1, 'Finaliser le rapport mensuel', 'Préparer et finaliser le rapport pour la réunion de demain', 'high', 'closed', 'urgent', '2026-03-03 23:14:15', '2026-03-08 15:01:38', 33, NULL),
(2, 'Mettre à jour la documentation 22', 'Mettre à jour le README et la documentation technique', 'medium', 'open', 'medium', '2026-03-03 23:14:15', '2026-03-04 23:26:21', 33, NULL),
(3, 'Corriger le bug #1234', 'Le formulaire de connexion ne fonctionne pas sur mobile', 'critical', 'open', 'urgent', '2026-03-03 23:14:15', '2026-03-08 12:38:05', NULL, '2026-03-08 12:38:05'),
(4, 'Préparer la présentation client', 'Créer les slides pour la réunion de jeudi', 'high', 'closed', 'medium', '2026-03-03 23:14:15', '2026-03-08 12:38:08', NULL, '2026-03-08 12:38:08'),
(5, 'Mettre à jour les dépendances', 'Mettre à jour npm et composer packages', 'low', 'open', 'low', '2026-03-03 23:14:15', '2026-03-03 23:14:15', 33, NULL),
(6, 'Et excepturi et.', 'Corrupti ut occaecati cupiditate nesciunt accusantium. Autem sit consequuntur labore voluptas nobis assumenda nulla. Omnis et ducimus et.', 'medium', 'open', 'medium', '2026-03-02 13:31:32', '2026-03-08 12:38:47', NULL, '2026-03-08 12:38:47'),
(7, 'Sint impedit nemo et totam.', 'Cupiditate qui ut error occaecati expedita. Illum amet facilis odit quos harum non. Dolore totam qui illum et enim ea fugiat.', 'low', 'closed', 'medium', '2026-02-10 02:29:39', '2026-03-08 12:38:37', NULL, '2026-03-08 12:38:37'),
(8, 'Quis officia reprehenderit.', 'Non illo ut aut fugit qui earum. Necessitatibus sequi repellendus dolor explicabo impedit rerum dolore. Dicta expedita aliquid aliquam pariatur beatae consequuntur odio. Voluptas voluptatum esse ad et aut.', 'critical', 'closed', 'urgent', '2026-02-27 06:48:58', '2026-03-08 12:38:55', NULL, '2026-03-08 12:38:55'),
(9, 'Perspiciatis sint architecto dolores animi.', 'Delectus eum aut doloribus a et in. Possimus nostrum expedita voluptate dolores quis. Et optio autem error et rerum.', 'critical', 'closed', 'urgent', '2026-02-27 06:21:15', '2026-03-08 12:38:42', NULL, '2026-03-08 12:38:42'),
(10, 'Consequuntur nam in saepe sequi.', 'Officiis possimus sed rerum. Libero aliquam deleniti error distinctio rerum nesciunt. Rerum et doloribus iure atque et aut. Sapiente doloremque provident aspernatur et voluptatem natus in vitae. Aut eius voluptatibus vel sequi distinctio.', 'critical', 'closed', 'medium', '2026-02-11 09:04:29', '2026-03-08 12:38:32', NULL, '2026-03-08 12:38:32'),
(11, 'Quo vero doloremque tempora.', 'Temporibus ab aliquam enim corrupti animi aut. Repellat minus ut aspernatur sunt corrupti porro et. Nihil fuga exercitationem qui ducimus consequatur iure consequuntur. Autem officia suscipit eligendi est eum modi.', 'high', 'closed', 'medium', '2026-02-15 16:07:45', '2026-03-08 12:38:25', NULL, '2026-03-08 12:38:25'),
(12, 'Voluptate ea voluptatem et.', 'Nihil corporis fugiat voluptatibus omnis voluptate delectus dolores. Necessitatibus molestiae odit a praesentium magnam. Sed quia et veritatis illo eos. Unde repudiandae libero veritatis culpa.', 'low', 'in_progress', 'urgent', '2026-02-14 08:30:02', '2026-03-08 12:38:28', NULL, '2026-03-08 12:38:28'),
(13, 'Eos odio quia ut.', 'Alias quidem in repellendus tempore aut placeat. Ut corrupti inventore enim soluta voluptatem voluptates odio. Non distinctio molestiae voluptatem at officia rem alias. Delectus praesentium nobis repellat officia perspiciatis amet temporibus.', 'high', 'in_progress', 'low', '2026-02-23 03:41:39', '2026-03-08 12:38:19', NULL, '2026-03-08 12:38:19'),
(14, 'Laudantium tenetur quaerat ipsam minus nihil.', 'Mollitia inventore dolorem et laboriosam odit eius quo. A nisi ut eligendi est et. Quos aliquid aut sed. Vitae aspernatur et qui repellat delectus possimus.', 'high', 'open', 'low', '2026-02-21 22:53:49', '2026-03-08 12:38:21', NULL, '2026-03-08 12:38:21'),
(15, 'Qui cumque commodi et.', 'Nemo ab quam rerum. Doloribus adipisci pariatur sit accusantium. Earum aut corrupti exercitationem repellat et qui mollitia. Non voluptatem et ut voluptas occaecati.', 'critical', 'closed', 'low', '2026-02-23 16:09:23', '2026-03-08 12:38:17', NULL, '2026-03-08 12:38:17'),
(16, 'Ut enim laudantium molestiae.', 'Omnis rem deleniti nihil voluptatem est. Laborum ab quidem repellat dolores. Et impedit incidunt et iste eos ab adipisci.', 'high', 'in_progress', 'medium', '2026-02-28 09:45:48', '2026-03-03 13:14:19', 33, NULL),
(17, 'Vero eveniet quasi.', 'Eius sequi suscipit totam dolore occaecati ullam eligendi. Et saepe deserunt pariatur ea quibusdam.', 'medium', 'in_progress', 'low', '2026-02-21 18:11:20', '2026-03-08 12:38:23', NULL, '2026-03-08 12:38:23'),
(18, 'Aut fuga fugiat voluptas.', 'Voluptatem eveniet similique quae aperiam pariatur. Enim et eum alias aut. Et magni enim sit earum suscipit sapiente libero numquam.', 'low', 'open', 'urgent', '2026-03-03 12:55:24', '2026-03-08 12:38:44', NULL, '2026-03-08 12:38:44'),
(19, 'Aliquam doloremque quae et.', 'Nihil quis perspiciatis omnis dignissimos ut non. Tempora officia deleniti ut. Repudiandae earum a laborum ut esse. Minus vel id atque perferendis.', 'low', 'in_progress', 'medium', '2026-02-09 03:09:12', '2026-03-08 12:38:39', NULL, '2026-03-08 12:38:39'),
(20, 'Dignissimos eveniet deleniti.', 'Et deleniti molestias soluta sit eaque dolorem dolores. Maxime fuga et quos voluptatum sed. Unde asperiores recusandae repellat sit quis reprehenderit tenetur. Distinctio similique nihil quam a et dolore ut.', 'critical', 'in_progress', 'medium', '2026-02-13 05:32:27', '2026-03-08 12:38:30', NULL, '2026-03-08 12:38:30'),
(21, 'Quaerat fugit sed.', 'Eum illum iusto quod consequatur sit. Atque voluptas est ut porro est quasi molestiae. Amet odio sapiente qui nisi.', 'low', 'in_progress', 'medium', '2026-03-03 04:43:52', '2026-03-08 12:38:52', NULL, '2026-03-08 12:38:52'),
(22, 'Eligendi nam reprehenderit praesentium voluptates.', 'Quidem est voluptas est vitae inventore consequatur quia. Possimus reprehenderit rerum quo dolorem magnam nobis. Quo quas laborum non facilis est beatae.', 'medium', 'in_progress', 'urgent', '2026-02-04 19:59:12', '2026-03-04 23:17:19', NULL, '2026-03-04 23:17:19'),
(23, 'Explicabo exercitationem nostrum.', 'Accusamus perferendis ducimus quidem nostrum impedit eum. Quasi nihil omnis illo voluptatem quidem non. In nihil consequuntur in debitis amet esse consequatur. Nihil in velit enim dolorum qui aut. Ex unde maxime molestias consequuntur sint.', 'critical', 'closed', 'medium', '2026-02-23 19:11:27', '2026-03-08 12:38:15', NULL, '2026-03-08 12:38:15'),
(24, 'Ipsa nam qui autem.', 'Officiis qui tempora consequatur nisi. Laboriosam voluptates expedita est sunt quo aliquam nihil qui. Quo ut id quibusdam aut minus sit reprehenderit labore.', 'high', 'in_progress', 'low', '2026-03-01 14:53:31', '2026-03-08 12:38:49', NULL, '2026-03-08 12:38:49'),
(25, 'Optio ea optio amet vero saepe.', 'Sit voluptatum consequuntur perspiciatis nostrum similique velit. Quia quo distinctio placeat voluptatum omnis. Autem magnam ut labore est ut provident. Sed veniam distinctio fuga possimus.', 'critical', 'closed', 'low', '2026-02-11 07:43:18', '2026-03-08 12:38:34', NULL, '2026-03-08 12:38:34'),
(26, 'titre', 'description', 'medium', 'open', 'medium', '2026-03-04 23:22:59', '2026-03-08 12:37:57', NULL, '2026-03-08 12:37:57'),
(27, 'titre avec user', 'description avec user', 'medium', 'open', 'medium', '2026-03-04 23:24:56', '2026-03-08 12:38:00', NULL, '2026-03-08 12:38:00'),
(28, 'sgfdgsdf USER', 'gsdfgsdfgdsgfdfgdffdgfgd', 'medium', 'open', 'medium', '2026-03-04 23:34:04', '2026-03-08 12:36:09', NULL, '2026-03-08 12:36:09'),
(29, 'salamo', 'salamo', 'medium', 'open', 'medium', '2026-03-05 22:31:10', '2026-03-08 12:38:11', NULL, '2026-03-08 12:38:11'),
(30, 'fhjhfjhg 33', 'fjfghjghjhg 33', 'medium', 'open', 'medium', '2026-03-05 22:43:38', '2026-03-08 12:37:53', NULL, '2026-03-08 12:37:53'),
(31, 'gfdhfghgfh 66', 'sdgfhsdfghdfghgf  66', 'medium', 'open', 'medium', '2026-03-05 22:46:46', '2026-03-08 12:37:47', NULL, '2026-03-08 12:37:47'),
(32, 'fdghfdghgfh  33', 'gfdfghgfhgh   33', 'medium', 'open', 'medium', '2026-03-05 22:47:13', '2026-03-08 12:37:59', NULL, '2026-03-08 12:37:59'),
(33, 'fgdhfgh  88', 'fdghfgh  88', 'medium', 'open', 'medium', '2026-03-05 22:48:55', '2026-03-08 12:37:49', NULL, '2026-03-08 12:37:49'),
(34, 'dbghg', 'dfghfghgfhg', 'medium', 'open', 'medium', '2026-03-05 22:51:14', '2026-03-08 12:37:45', NULL, '2026-03-08 12:37:45'),
(35, 'dfgsdfgdfg  66', 'dfgsdfgdfg  66', 'medium', 'open', 'medium', '2026-03-05 23:02:07', '2026-03-08 12:38:03', NULL, '2026-03-08 12:38:03'),
(36, 'salam ya sahbi', 'salam ya sahbi', 'medium', 'open', 'medium', '2026-03-07 22:37:37', '2026-03-08 12:37:43', NULL, '2026-03-08 12:37:43'),
(37, 'salam ya sahbi 2', 'salam ya sahbi 2', 'medium', 'open', 'medium', '2026-03-07 22:41:01', '2026-03-08 12:37:42', NULL, '2026-03-08 12:37:42'),
(38, 'ma baghich ntfak', 'ma baghich ntfak', 'medium', 'open', 'medium', '2026-03-07 22:42:42', '2026-03-08 12:37:40', NULL, '2026-03-08 12:37:40'),
(39, 'khalid à khalid', 'khalid à khalid', 'medium', 'open', 'medium', '2026-03-07 22:47:01', '2026-03-08 12:37:39', NULL, '2026-03-08 12:37:39'),
(40, 'khalid à khalid 2', 'khalid à kalid 2', 'medium', 'open', 'medium', '2026-03-07 22:51:38', '2026-03-08 12:37:33', NULL, '2026-03-08 12:37:33'),
(41, 'dfsqsf', 'sdfqsfqsdf', 'medium', 'open', 'medium', '2026-03-07 23:20:39', '2026-03-08 12:37:31', NULL, '2026-03-08 12:37:31'),
(42, 'dfsgdfg', 'dfsgdsgdfg', 'medium', 'open', 'medium', '2026-03-07 23:27:29', '2026-03-08 12:37:28', NULL, '2026-03-08 12:37:28'),
(43, 'fgdfgdfg', 'dfgdfgdfg', 'medium', 'open', 'medium', '2026-03-07 23:29:16', '2026-03-08 12:37:25', NULL, '2026-03-08 12:37:25'),
(44, 'dgggggg', 'dgggggg', 'medium', 'open', 'medium', '2026-03-07 23:32:22', '2026-03-08 12:37:22', NULL, '2026-03-08 12:37:22'),
(45, 'dggggggg', 'ggggggggg', 'medium', 'closed', 'medium', '2026-03-07 23:33:41', '2026-03-08 12:37:20', NULL, '2026-03-08 12:37:20'),
(46, 'fdsqdfsdf', 'sqdfqsfsdf', 'medium', 'closed', 'medium', '2026-03-07 23:36:46', '2026-03-08 12:37:15', NULL, '2026-03-08 12:37:15'),
(47, 'fdsgdfgd', 'dgdsgdgsdgdsgd', 'medium', 'open', 'medium', '2026-03-07 23:38:42', '2026-03-08 12:37:13', NULL, '2026-03-08 12:37:13'),
(48, 'gfhfghdf', 'dfghfdghfdgh', 'medium', 'open', 'medium', '2026-03-07 23:39:39', '2026-03-08 12:37:10', NULL, '2026-03-08 12:37:10'),
(49, 'azerzaerzer', 'zerzaerazerzarzer', 'medium', 'open', 'medium', '2026-03-07 23:40:03', '2026-03-08 00:35:20', NULL, '2026-03-08 00:35:20'),
(50, 'gfhdfgh', 'fghfghdfhg', 'medium', 'open', 'medium', '2026-03-07 23:42:59', '2026-03-08 12:37:05', NULL, '2026-03-08 12:37:05'),
(51, 'dfsdgdfg', 'dfsgdsgdsg', 'medium', 'open', 'medium', '2026-03-07 23:44:56', '2026-03-08 12:37:02', NULL, '2026-03-08 12:37:02'),
(52, 'jgfhjfghjgfhjfghjghjghj', 'ghjfghjfghjfghjgfhjghjfghjh', 'medium', 'open', 'medium', '2026-03-07 23:47:56', '2026-03-08 00:35:25', NULL, '2026-03-08 00:35:25'),
(53, 'dfgdfgdf', 'dfgdsfgsdfg', 'medium', 'open', 'medium', '2026-03-07 23:52:21', '2026-03-08 12:37:00', NULL, '2026-03-08 12:37:00'),
(54, 'dfsdfsd', 'fsdfsdfgfdg', 'medium', 'open', 'medium', '2026-03-07 23:54:22', '2026-03-08 12:36:57', NULL, '2026-03-08 12:36:57'),
(55, 'ghjgfhj', 'gfhjghjghjgj', 'medium', 'open', 'medium', '2026-03-07 23:58:43', '2026-03-08 12:36:55', NULL, '2026-03-08 12:36:55'),
(56, 'ghjgjgh', 'jghjgjgjgj', 'medium', 'open', 'medium', '2026-03-08 00:00:57', '2026-03-08 12:36:52', NULL, '2026-03-08 12:36:52'),
(57, 'kkkkkkkkkyt', 'kkkkku', 'medium', 'open', 'medium', '2026-03-08 00:03:58', '2026-03-08 12:36:50', NULL, '2026-03-08 12:36:50'),
(58, 'fgdgdfg', 'dfgdsfgdfg', 'medium', 'open', 'medium', '2026-03-08 00:07:27', '2026-03-08 12:36:46', NULL, '2026-03-08 12:36:46'),
(59, 'dsgfdfg', 'dfgdsfgdfg', 'medium', 'open', 'medium', '2026-03-08 00:09:21', '2026-03-08 12:36:44', NULL, '2026-03-08 12:36:44'),
(60, 'jghfjfghjgfh', 'jgfhjghjghjgj', 'medium', 'open', 'medium', '2026-03-08 00:19:57', '2026-03-08 12:36:34', NULL, '2026-03-08 12:36:34'),
(61, 'gfhdfgfgh', 'fgdhfdghfghfgh', 'medium', 'open', 'medium', '2026-03-08 00:22:27', '2026-03-08 12:36:30', NULL, '2026-03-08 12:36:30'),
(62, 'dhjhgjfghj 89', 'ghjfghjfghjfghjghj  89', 'medium', 'open', 'medium', '2026-03-08 00:24:22', '2026-03-08 12:36:41', 23, '2026-03-08 12:36:41'),
(63, 'dghouli', 'dghouli', 'medium', 'open', 'medium', '2026-03-08 00:25:41', '2026-03-08 12:36:39', 23, '2026-03-08 12:36:39'),
(64, 'gfdsgdfg 33', 'dfgsdgdgfdfg 33', 'medium', 'open', 'medium', '2026-03-08 00:26:18', '2026-03-08 12:36:28', 23, '2026-03-08 12:36:28'),
(65, 'fghjfghjghj   9999', 'fghjfghjgjgjj 999999', 'medium', 'closed', 'medium', '2026-03-08 00:28:01', '2026-03-08 12:36:36', 23, '2026-03-08 12:36:36'),
(66, 'daw daw', 'daw daw', 'medium', 'open', 'medium', '2026-03-08 00:33:31', '2026-03-08 12:36:24', 23, '2026-03-08 12:36:24'),
(67, 'assia', 'assia', 'high', 'open', 'urgent', '2026-03-08 12:22:41', '2026-03-08 12:36:21', 23, '2026-03-08 12:36:21');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
(21, 'hassan grag', 'hassan@gmail.com', NULL, '$2y$12$gY.Ljr4uRADaIPMMos3mseHP0jruGMqq.Nyka4sF5cRWD0HHGgd5a', NULL, '2026-02-04 17:20:09', '2026-02-05 21:13:04', NULL),
(22, 'ibrahim', 'ibrahim@gmail.com', NULL, '$2y$12$v7OQr2PEHGHopebMNyaGpeJ2teIhou7xmEsirJbMeHC58lLzuliry', NULL, '2026-02-04 17:38:34', '2026-02-05 21:04:11', 'profile_images/o5bXa2CScU2XkfK3KJdQTi6MtVEAOoTL3sNKO6Is.jpg'),
(23, 'houda Akrach', 'houda@gmail.com', NULL, '$2y$12$syUW4EpYqAI4qLAtWAfjaOaA/6HIO4EdVtVmJvAr/hQk7CYyGvHA2', NULL, '2026-02-04 17:40:04', '2026-02-07 07:20:55', 'profile_images/3d2w4ob6zE4rELzprhXhBgZ0bsaAjAC0MXIM1RAp.jpg'),
(24, 'assia', 'assia@gmail.com', NULL, '$2y$12$bf9eCV9/pZ2QUAe7VqpB0eXUbFCcK3UFchqrVR6ycjEHgWVTW5gVW', NULL, '2026-02-06 20:06:19', '2026-02-06 20:30:08', 'profile_images/hqtkulfyQwYS4i3Hv2PpGynci6rRRhK7u0yGmbal.jpg'),
(25, 'abdellah', 'abdellah@gmail.com', NULL, '$2y$12$1wxNZahTS58rwfWTrtyL8euMjVaDRFUvKKrf6.vKILCtjaa1cKBly', NULL, '2026-02-10 21:09:09', '2026-02-10 21:10:31', 'profile_images/tSVHE6XmWPHGP5YLw8Cy3vnzqYfUBWeeLfKf7sxt.jpg'),
(29, 'abdo', 'abdo@gmail.com', NULL, '$2y$12$euWdCh3YvdK4PTyR0etYOudMdl8BN/VCfv8V3d4DcFVTbfZiDQFne', NULL, '2026-03-08 16:38:19', '2026-03-08 16:38:19', NULL),
(33, 'khalid dghouli', 'kdghouli@gmail.com', NULL, '$2y$12$0o8F2iiALuQNKunnuRWA0.K2cn1uePd2roHprQspSDd5QKg1bySw.', NULL, '2026-03-09 23:47:40', '2026-03-09 23:47:40', NULL),
(34, 'khalid dghouli', 'kdghoulio@gmail.com', NULL, '$2y$12$2uMOs/514WOUyA2GXZIrwe3P26a3tQK4.oDjBcgYc.cPlw1YHxhRa', NULL, '2026-03-09 23:48:49', '2026-03-09 23:48:49', NULL),
(35, 'khalid dghouli', 'kdghoulii@gmail.com', NULL, '$2y$12$mgOfr5TWsO8MOQQ65haJj.F5mgYrppp9K0W/6gNyeVbCwPHHKu.hi', NULL, '2026-03-09 23:53:52', '2026-03-09 23:53:52', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `poste` varchar(255) DEFAULT NULL,
  `tel` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agence_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `poste`, `tel`, `mail`, `service_id`, `created_at`, `updated_at`, `agence_id`) VALUES
(1, 'Chef d\'agence', 'Chef d\'agence', '', '', 3, NULL, NULL, 2),
(2, 'Ben Said Brahim', 'Chauffeur routier', '0666021846', 'SDFGDF@DFGDF.FD', 2, NULL, NULL, 1),
(3, 'Adil Babazia', 'Prévendeur', '', 'SDFGDF@DFGDF.FD', 1, NULL, NULL, 1),
(4, 'Debiani Mohamed', 'Prévendeur', '', 'SDFGDF@DFGDF.FD', 1, NULL, NULL, 1),
(8, 'Khalid dghouli', 'Agent de logistique', '0666535177', 'kdghouli@morocco.eccbc.com', 2, '2025-07-05 20:08:16', '2025-07-05 20:41:38', 1),
(10, 'Commun', NULL, '', '', 1, NULL, NULL, 1),
(11, 'Semlali Abderrahim', 'SAV', '0661122026', 'SDFGDF@DFGDF.FD', 2, NULL, NULL, 1),
(13, 'EL KAMOUNI ABDELMOULA', 'Conducteur chariot', '654665455465465456', 'kamouni@gmail.com', 2, '2026-04-06 07:23:38', '2026-04-06 07:23:38', 1),
(14, 'TANJI AHMED', 'Conducteur chariot', '333330000', 'tanji@gmail.com', 2, '2026-04-06 07:24:37', '2026-04-06 07:24:37', 1),
(15, 'KHOUFFALLAH KHALID', 'Conducteur chariot', '3333300000000', 'KHOUFKHALID@gmail.com', 2, '2026-04-06 07:25:36', '2026-04-06 07:25:36', 1),
(16, 'EL BISSAOUI MUSTAPHA', 'Conducteur chariot', '3333300000000', 'BISSAOUI@gmail.com', 2, '2026-04-06 07:26:41', '2026-04-06 07:26:41', 1),
(17, 'BEN EDDAOUDI ABDERRAHIM', 'Conducteur chariot', '3333300000000', 'eddaoudi@gmail.com', 2, '2026-04-06 07:28:12', '2026-04-06 07:28:12', 1),
(18, 'EL MAKDOUR MOHAMED', 'Conducteur chariot', '3333300000000', 'makdour@gmail.com', 2, '2026-04-06 07:28:50', '2026-04-06 07:28:50', 1),
(19, 'KBIRI ALAOUI MOHAMED', 'Conducteur chariot', '3333300000000', 'kbiri@gmail.com', 2, '2026-04-06 07:29:43', '2026-04-06 07:29:43', 1),
(20, 'TAHHAN MOHAMED', 'Conducteur chariot', '3333300000000', 'tahhan@gmail.com', 2, '2026-04-06 07:43:46', '2026-04-06 07:43:46', 1),
(21, 'GOURAM SAID', 'Conducteur chariot', '3333300000000', 'gouram@gmail.com', 2, '2026-04-06 07:45:02', '2026-04-06 07:45:02', 1),
(22, 'EL ABBADI ABDELKADER', 'Conducteur chariot', '3333300000000', 'abbadi@gmai.com', 2, '2026-04-06 07:52:24', '2026-04-06 07:52:24', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vhls`
--

CREATE TABLE `vhls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricule` varchar(20) NOT NULL,
  `marque` varchar(40) DEFAULT NULL,
  `type` varchar(60) DEFAULT NULL,
  `ww` varchar(40) DEFAULT NULL,
  `chassis` varchar(40) DEFAULT NULL,
  `puissance` varchar(10) DEFAULT NULL,
  `date_mc` varchar(255) DEFAULT NULL,
  `equipement` varchar(20) DEFAULT NULL,
  `observation` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agence_id` bigint(20) UNSIGNED NOT NULL,
  `categorie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `intitule_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `utilisateur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `statut_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vhls`
--

INSERT INTO `vhls` (`id`, `matricule`, `marque`, `type`, `ww`, `chassis`, `puissance`, `date_mc`, `equipement`, `observation`, `deleted_at`, `created_at`, `updated_at`, `agence_id`, `categorie_id`, `intitule_id`, `service_id`, `utilisateur_id`, `statut_id`) VALUES
(1, '32093-A-26', 'Mitsubishi', 'Fighter', NULL, NULL, '20', '2003-12-12', NULL, 'de matiére premiere', NULL, NULL, '2026-02-26 23:06:49', 1, 1, 2, 2, 2, 1),
(2, 'Ms 359', 'Toyota', NULL, NULL, NULL, NULL, NULL, '359', NULL, NULL, NULL, '2026-02-21 23:12:56', 1, 4, 6, 4, 10, 1),
(3, 'Ms 360', 'Toyota', NULL, NULL, NULL, NULL, '2024-11-14', '360', NULL, NULL, NULL, '2026-01-22 19:40:00', 2, 4, 6, 4, 10, 4),
(4, 'Ms 361', 'Toyota', NULL, NULL, NULL, NULL, NULL, '361', NULL, NULL, NULL, '2026-02-07 16:15:07', 1, 4, 6, 4, 10, 1),
(5, 'Ms 362', 'Toyota', NULL, NULL, NULL, NULL, NULL, '362', NULL, NULL, NULL, '2026-02-05 19:33:11', 1, 4, 6, 4, 10, 2),
(6, 'Ms 363', 'Toyota', NULL, NULL, NULL, NULL, '2025-01-03', '363', NULL, NULL, NULL, '2026-02-22 08:25:35', 1, 4, 6, 2, 10, 2),
(7, 'Ms 364', 'Toyota', NULL, NULL, NULL, NULL, NULL, '364', NULL, NULL, NULL, '2026-02-06 20:06:55', 1, 4, 6, 2, 10, 3),
(8, 'Ms 365', 'Toyota', NULL, NULL, NULL, NULL, NULL, '363', NULL, NULL, NULL, '2026-02-07 15:06:44', 1, 4, 6, 2, 10, 3),
(9, 'Ms 366', 'Toyota', NULL, NULL, NULL, NULL, NULL, '366', NULL, NULL, NULL, '2026-02-07 07:23:12', 1, 4, 6, 2, 10, 7),
(10, 'Ms 367', 'Toyota', NULL, NULL, NULL, NULL, NULL, '367', NULL, NULL, NULL, '2026-02-06 19:56:01', 1, 4, 6, 2, 10, 2),
(11, 'Ms 368', 'Toyota', NULL, NULL, NULL, NULL, NULL, '368', NULL, NULL, NULL, '2026-02-07 16:20:44', 3, 4, 6, 2, 10, 2),
(12, 'Ms 369', 'Toyota', NULL, NULL, NULL, NULL, NULL, '369', NULL, NULL, NULL, '2026-02-07 16:23:08', 1, 4, 6, 2, 10, 2),
(13, 'Ms 370', 'Toyota', NULL, NULL, NULL, NULL, NULL, '370', NULL, NULL, NULL, '2026-02-07 21:14:44', 1, 4, 6, 2, 10, 2),
(14, 'Ms 371', 'Toyota', NULL, NULL, NULL, NULL, NULL, '371', NULL, NULL, NULL, '2026-02-07 15:38:24', 1, 4, 6, 2, 10, 2),
(15, 'Ms 372', 'Toyota', NULL, NULL, NULL, NULL, NULL, '372', 'à Sidi Ghanem', NULL, NULL, NULL, 1, 4, 6, 2, 10, 1),
(16, 'Ms 278', 'TCM', NULL, NULL, NULL, NULL, NULL, '278', NULL, NULL, NULL, '2026-02-07 16:50:53', 1, 4, 6, 2, 10, 2),
(17, 'Ms 279', 'Toyota', NULL, NULL, NULL, NULL, NULL, '279', NULL, NULL, NULL, '2026-02-07 16:47:17', 4, 4, 6, 2, 10, 3),
(18, '84568-T-6', 'Citroen', 'Berlingo', '406668', 'VR7EBYHT6RJ744753', '6', '07/11/2024', NULL, NULL, NULL, NULL, '2026-02-07 17:59:18', 1, 2, 5, 2, 11, 2),
(19, '44356-B-7', 'Citroen', 'Berlingo', '059042', NULL, '6', '04/10/2022', NULL, NULL, NULL, NULL, NULL, 1, 2, 5, 1, 10, 1),
(20, '6-058016', 'Kymco', 'Agylité', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-02-06 20:20:45', 1, 3, 5, 1, 3, 3),
(21, '6-058020', 'Kymco', 'Agylité', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 5, 1, 4, 1),
(25, 'Ms 235', 'Toyota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:12:09', '2026-02-07 16:55:29', 2, 4, 6, 3, 10, 2),
(26, 'Ms 282', 'Toyota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:12:35', '2026-02-07 16:43:40', 2, 4, 6, 3, 10, 2),
(27, '4633-A-15', 'Mitsubishi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:20:56', '2025-07-04 19:20:56', 2, 1, 3, 3, 10, 1),
(28, '33250-A-13', 'Mitsubishi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:21:42', '2026-02-07 17:58:06', 2, 1, 1, 3, 10, 2),
(29, '32724-A-13', 'Mitsubishi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:22:13', '2025-07-04 19:22:13', 2, 1, 1, 3, 10, 1),
(30, '16565-B-7', 'Fuso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:24:36', '2025-07-04 19:24:36', 2, 1, 9, 3, 10, 1),
(31, '66288-D-8', 'Isuzu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:27:42', '2026-02-07 21:45:00', 2, 1, 10, 3, 10, 2),
(32, '57800-D-8', 'Isuzu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:30:37', '2025-07-04 19:30:37', 2, 1, 10, 3, 10, 1),
(33, '67103-D-8', 'Iveco', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:31:11', '2025-07-04 19:31:11', 2, 1, 10, 3, 10, 1),
(34, '67165-D-8', 'Isuzu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:31:49', '2025-07-04 19:31:49', 2, 1, 10, 3, 10, 1),
(35, '74355-D-8', 'Isuzu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:32:52', '2026-02-07 18:14:12', 2, 1, 10, 3, 10, 2),
(36, '74356-D-8', 'Isuzu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:33:46', '2025-07-04 19:33:46', 2, 1, 10, 3, 10, 1),
(37, '96891-T-6', 'Fuso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:34:25', '2025-07-04 19:34:25', 2, 1, 11, 3, 10, 1),
(38, '96892-T-6', 'Fuso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:35:11', '2025-07-04 19:35:11', 2, 1, 11, 3, 10, 1),
(39, '74362-D-8', 'Isuzu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:35:46', '2026-02-07 17:55:47', 2, 1, 10, 3, 10, 2),
(40, '74363-D-8', 'Isuzu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:36:19', '2026-02-22 13:57:45', 2, 1, 10, 3, 10, 1),
(41, '84690-B-8', 'Mitsubishi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 19:36:46', '2025-07-04 19:36:46', 2, 1, 10, 3, 10, 1),
(46, 'ggjghjh', 'hjkhjk', 'ghjkhgjk', 'ghkgh', 'jkhgkhj', 'hgjkghjk', '2026-02-03', NULL, NULL, '2026-02-14 15:46:50', '2026-02-14 07:29:33', '2026-02-14 15:46:50', 1, 1, 1, 1, 10, 1),
(47, 'fgjghj', 'gfhjfghj', 'fghjfghjg', 'jfghjgh', 'jghfghj', 'fgjfghj', '2026-02-01', NULL, NULL, '2026-02-14 15:46:53', '2026-02-14 07:30:21', '2026-02-14 15:46:53', 1, 1, 1, 1, 10, 1),
(48, 'hjfghj', 'ghjghj', 'ghjghj', 'ghjghj', 'gfhjgfhj', 'fghjghj', '2026-02-05', NULL, NULL, '2026-02-14 15:46:44', '2026-02-14 07:45:04', '2026-02-14 15:46:44', 11, 4, 5, 1, 11, 6),
(49, 'fghjfghjgh', 'ghjghj', 'ghjgh', 'jgfhjfghj', 'gfhjfghj', 'fghjghj', '2026-02-04', NULL, NULL, '2026-02-14 15:46:41', '2026-02-14 07:53:09', '2026-02-14 15:46:41', 3, 1, 6, 4, 3, 5),
(50, 'ghjfghj', 'ghjghj', 'ghjghj', 'ghjghj', 'ghjghj', 'hgjghjfgj', '2026-02-12', NULL, NULL, '2026-02-14 15:46:37', '2026-02-14 08:09:17', '2026-02-14 15:46:37', 10, 3, 7, 2, 3, 7),
(51, 'dfggh', 'fghfgh', 'fghfgh', 'gfhfgh', 'fdghfgh', 'fgdhfgh', '2026-02-06', NULL, NULL, '2026-02-14 15:46:34', '2026-02-14 08:22:18', '2026-02-14 15:46:34', 2, 3, 5, 3, 2, 7),
(52, 'gfdghfgh', 'fghfgh', 'fghfgh', 'fghfgh', 'fghfgh', 'fghfgh', '2026-02-04', NULL, NULL, '2026-02-14 15:46:29', '2026-02-14 08:44:31', '2026-02-14 15:46:29', 2, 2, 4, 3, 10, 5),
(64, 'ghjfghjgh', 'ghjfghj', 'ghjgfhj', 'ghjfghjg', 'fghjfghj', 'ghfjfghj', '2026-02-05', NULL, NULL, '2026-02-21 22:17:38', '2026-02-14 19:01:14', '2026-02-21 22:17:38', 4, 2, 10, 4, 4, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agences`
--
ALTER TABLE `agences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentaires_vhl_id_foreign` (`vhl_id`),
  ADD KEY `commentaires_user_id_foreign` (`user_id`),
  ADD KEY `commentaires_statut_id_foreign` (`statut_id`),
  ADD KEY `commentaires_parent_id_foreign` (`parent_id`);

--
-- Index pour la table `dailychecks`
--
ALTER TABLE `dailychecks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dailychecks_vhl_id_foreign` (`vhl_id`),
  ADD KEY `dailychecks_user_id_foreign` (`user_id`),
  ADD KEY `dailychecks_utilisateur_id_foreign` (`utilisateur_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `hist_statuts`
--
ALTER TABLE `hist_statuts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hist_statuts_ancien_statut_id_foreign` (`ancien_statut_id`),
  ADD KEY `hist_statuts_nouveau_statut_id_foreign` (`nouveau_statut_id`),
  ADD KEY `hist_statuts_user_id_foreign` (`user_id`),
  ADD KEY `hist_statuts_vhl_id_index` (`vhl_id`),
  ADD KEY `hist_statuts_created_at_index` (`created_at`);

--
-- Index pour la table `imagesvhls`
--
ALTER TABLE `imagesvhls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagesvhls_vhl_id_foreign` (`vhl_id`);

--
-- Index pour la table `intitules`
--
ALTER TABLE `intitules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kilometrages`
--
ALTER TABLE `kilometrages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kilometrages_vhl_id_foreign` (`vhl_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `prestataires`
--
ALTER TABLE `prestataires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `statuts`
--
ALTER TABLE `statuts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`),
  ADD KEY `tasks_status_index` (`status`),
  ADD KEY `tasks_priority_index` (`priority`),
  ADD KEY `tasks_urgence_index` (`urgence`),
  ADD KEY `tasks_created_at_index` (`created_at`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateurs_service_id_foreign` (`service_id`),
  ADD KEY `utilisateurs_agence_id_foreign` (`agence_id`);

--
-- Index pour la table `vhls`
--
ALTER TABLE `vhls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vhls_agence_id_foreign` (`agence_id`),
  ADD KEY `vhls_categorie_id_foreign` (`categorie_id`),
  ADD KEY `vhls_intitule_id_foreign` (`intitule_id`),
  ADD KEY `vhls_service_id_foreign` (`service_id`),
  ADD KEY `vhls_utilisateur_id_foreign` (`utilisateur_id`),
  ADD KEY `vhls_statut_id_foreign` (`statut_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agences`
--
ALTER TABLE `agences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT pour la table `dailychecks`
--
ALTER TABLE `dailychecks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `hist_statuts`
--
ALTER TABLE `hist_statuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `imagesvhls`
--
ALTER TABLE `imagesvhls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `intitules`
--
ALTER TABLE `intitules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `kilometrages`
--
ALTER TABLE `kilometrages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT pour la table `prestataires`
--
ALTER TABLE `prestataires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `statuts`
--
ALTER TABLE `statuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `vhls`
--
ALTER TABLE `vhls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `commentaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commentaires_statut_id_foreign` FOREIGN KEY (`statut_id`) REFERENCES `statuts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaires_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaires_vhl_id_foreign` FOREIGN KEY (`vhl_id`) REFERENCES `vhls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `dailychecks`
--
ALTER TABLE `dailychecks`
  ADD CONSTRAINT `dailychecks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dailychecks_utilisateur_id_foreign` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dailychecks_vhl_id_foreign` FOREIGN KEY (`vhl_id`) REFERENCES `vhls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `hist_statuts`
--
ALTER TABLE `hist_statuts`
  ADD CONSTRAINT `hist_statuts_ancien_statut_id_foreign` FOREIGN KEY (`ancien_statut_id`) REFERENCES `statuts` (`id`),
  ADD CONSTRAINT `hist_statuts_nouveau_statut_id_foreign` FOREIGN KEY (`nouveau_statut_id`) REFERENCES `statuts` (`id`),
  ADD CONSTRAINT `hist_statuts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `hist_statuts_vhl_id_foreign` FOREIGN KEY (`vhl_id`) REFERENCES `vhls` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `imagesvhls`
--
ALTER TABLE `imagesvhls`
  ADD CONSTRAINT `imagesvhls_vhl_id_foreign` FOREIGN KEY (`vhl_id`) REFERENCES `vhls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `kilometrages`
--
ALTER TABLE `kilometrages`
  ADD CONSTRAINT `kilometrages_vhl_id_foreign` FOREIGN KEY (`vhl_id`) REFERENCES `vhls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_agence_id_foreign` FOREIGN KEY (`agence_id`) REFERENCES `agences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateurs_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vhls`
--
ALTER TABLE `vhls`
  ADD CONSTRAINT `vhls_agence_id_foreign` FOREIGN KEY (`agence_id`) REFERENCES `agences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vhls_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vhls_intitule_id_foreign` FOREIGN KEY (`intitule_id`) REFERENCES `intitules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vhls_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vhls_statut_id_foreign` FOREIGN KEY (`statut_id`) REFERENCES `statuts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vhls_utilisateur_id_foreign` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
