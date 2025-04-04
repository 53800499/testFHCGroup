-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 04 avr. 2025 à 16:59
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `emplois`
--

DROP TABLE IF EXISTS `emplois`;
CREATE TABLE IF NOT EXISTS `emplois` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `requirements` text NOT NULL,
  `salary_range` varchar(100) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `status` enum('brouillon','publiee','fermee') DEFAULT 'brouillon',
  `recruiter_id` bigint UNSIGNED NOT NULL,
  `deadline` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recruiter` (`recruiter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `emplois`
--

INSERT INTO `emplois` (`id`, `title`, `description`, `requirements`, `salary_range`, `location`, `department`, `status`, `recruiter_id`, `deadline`, `created_at`, `updated_at`) VALUES
(2, 'aaaaaaaa', 'aaaaaaa', 'Oui', 'zzzzzzzzz', 'aaaaaaaaaa', 'aaaaaaaa', 'brouillon', 5, '2025-05-02', '2025-04-04 15:37:41', '2025-04-04 15:37:41');

-- --------------------------------------------------------

--
-- Structure de la table `employers`
--

DROP TABLE IF EXISTS `employers`;
CREATE TABLE IF NOT EXISTS `employers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `position` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `hire_date` date NOT NULL,
  `salary` int NOT NULL,
  `statut` enum('actif','en_conge','licenciee') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `employers`
--

INSERT INTO `employers` (`id`, `nom`, `email`, `position`, `departement`, `hire_date`, `salary`, `statut`, `created_at`, `updated_at`) VALUES
(10, 'Arthurs', 'bassirousikirou59dd@gmail.com', '45', 'Mono', '2025-04-12', 56453, '', '2025-04-04 14:20:44', '2025-04-04 14:20:44'),
(12, 'aaaaaaaaa', 'bassiroeeeeeeeusikirou59@gmail.com', '45', 'Mono', '2025-04-11', 12, 'actif', '2025-04-04 14:49:36', '2025-04-04 14:49:36'),
(4, 'Bassirou', 'bassirousikirou5@gmail.com', '45', 'Atacora', '2025-04-06', 12355555, '', '2025-04-04 12:26:20', '2025-04-04 13:01:52'),
(5, 'Arthurs', 'bassirousikirou9@gmail.com', '45', 'Atacora', '2025-04-13', 45565, 'actif', '2025-04-04 12:27:40', '2025-04-04 12:27:40'),
(6, 'Arthurs', 'bassirousikirou90@gmail.com', '45', 'Atacora', '2025-04-13', 45565, 'actif', '2025-04-04 12:29:05', '2025-04-04 12:29:05'),
(7, 'eeeeee', 'bassirousikirou500009@gmail.com', '45', 'Atacora', '2025-04-04', 21555456, 'actif', '2025-04-04 12:31:24', '2025-04-04 12:31:24'),
(8, 'Duponts', 'bassirousikirou509@gmail.com', '45', 'Atacora', '2025-04-12', 32563, 'actif', '2025-04-04 12:32:21', '2025-04-04 12:32:21'),
(9, 'SAluto', 'bassirousikirou0000000@gmail.com', '45', 'Mono', '2025-04-12', 1555322, 'actif', '2025-04-04 12:36:54', '2025-04-04 12:36:54');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
