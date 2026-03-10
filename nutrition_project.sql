-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 10 mars 2026 à 14:08
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
-- Base de données : `nutrition_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `maladie_chroniques`
--

CREATE TABLE `maladie_chroniques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `maladie_chroniques`
--

INSERT INTO `maladie_chroniques` (`id`, `nom`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Obésité', 'obésité modérée', NULL, NULL),
(2, 'Obésité', 'obésité sévère', NULL, NULL);

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_08_12_143424_create_maladie_chroniques_table', 1),
(3, '2024_08_12_143738_create_administrateurs-table', 1),
(4, '2024_08_12_143901_create_questions_table', 1),
(5, '2024_08_12_144050_create_utilisateurs_table', 1),
(6, '2024_08_12_144448_create_reponses_table', 1),
(7, '2024_09_01_151253_create_plan_nutritionnels_table', 1),
(8, '2024_11_08_203838_create_password_resets_table', 1),
(9, '2025_02_19_102346_create_question_possible_answers_table', 1),
(10, '2025_12_23_124213_add_notification_and_tdee_columns_to_utilisateurs_table', 1),
(11, '2026_02_18_230756_add_pdf_path_to_plan_nutritionnels_table', 1),
(12, '2026_03_10_120000_add_conditional_columns_to_questions_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, 'App\\Models\\Utilisateur', 2, 'auth_token', '419e93285bd2ebdfe9f486fec2ffd2784b10860b7ff7acda2eca86f8ec044500', '[\"*\"]', NULL, NULL, '2026-03-10 11:48:01', '2026-03-10 11:48:01'),
(2, 'App\\Models\\Utilisateur', 2, 'API Token', '64ae5a4c687a946f32765741f3547650ccb99cf0b8feb1193b732fe2fe66e312', '[\"*\"]', '2026-03-10 12:05:12', NULL, '2026-03-10 11:48:42', '2026-03-10 12:05:12');

-- --------------------------------------------------------

--
-- Structure de la table `plan_nutritionnels`
--

CREATE TABLE `plan_nutritionnels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `utilisateur_id` bigint(20) UNSIGNED NOT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `texte_question` varchar(255) NOT NULL,
  `maladie_chronique_id` bigint(20) UNSIGNED NOT NULL,
  `parent_question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `trigger_answer` varchar(255) DEFAULT NULL,
  `has_possible_answers` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `texte_question`, `maladie_chronique_id`, `parent_question_id`, `trigger_answer`, `has_possible_answers`, `created_at`, `updated_at`) VALUES
(1, 'Avez-vous des antécédents de diabète de type 2, d\'hypertension artérielle ou de maladies cardiovasculaires ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(2, 'Si oui, lequel ?', 1, 1, 'Oui', 0, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(3, 'Prenez-vous actuellement des médicaments qui sont liés à votre antécédent précédent ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(4, 'Si oui, lesquels ?', 1, 3, 'Oui', 0, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(5, 'Prenez-vous actuellement l\'un des types de médicaments suivants ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(6, 'Pouvez-vous décrire une journée typique de vos repas et collations ?', 1, NULL, NULL, 0, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(7, 'Combien de portions de fruits et légumes consommez-vous par jour ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(8, 'Grignotez-vous entre les repas ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(9, 'Si oui, quels aliments consommez-vous ?', 1, 8, 'Oui', 0, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(10, 'A quelle fréquence consommez-vous des boissons sucrées ou alcoolisées ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(11, 'Combien d\'heures de sommeil avez-vous par nuit ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(12, 'Avez-vous l\'apnée du sommeil ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(13, 'Avez-vous récemment fait un régime de perte du poids ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(14, 'Combien de jours par semaine pratiquez-vous une activité physique ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(15, 'Combien de temps passez-vous en position assise chaque jour ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(16, 'Quelles activités physiques appréciez-vous ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(17, 'Connaissez-vous votre fréquence cardiaque au repos ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(18, 'Si oui, veuillez- nous la donner ?', 1, 17, 'Oui', 0, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(19, 'Mangez-vous souvent par stress ou ennui ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(20, 'Avez-vous tendance à finir votre assiette même si vous n\'avez plus faim ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(21, 'Avez-vous déjà suivi un régime alimentaire particulier ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(22, 'Si oui, lequel, et a-t-il été efficace pour vous ? Pourquoi ?', 1, 21, 'Oui', 0, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(23, 'Quel est votre objectif principal en matière de santé ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(24, 'Combien de kg voulez-vous perdre ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(25, 'Selon votre objectif de perte de poids, quel niveau de changement êtes-vous prêt à suivre ?', 1, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(26, 'Avez-vous été diagnostiqué avec des problèmes de santé liés à l\'obésité, comme le diabète de type 2, l\'hypertension ou l\'hypercholestérolémie ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(27, 'Si oui lequel ?', 2, 26, 'Oui', 0, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(28, 'Avez-vous subi des opérations chirurgicales liées à votre poids comme une chirurgie bariatrique ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(29, 'Avez-vous des restrictions alimentaires ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(30, 'Si oui, choisissez l\'option qui s\'appliquent ?', 2, 29, 'Oui', 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(31, 'Consommez-vous régulièrement des aliments riches en calories vides, comme les boissons sucrées, les fast-foods, ou les desserts ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(32, 'Suivez-vous déjà un plan nutritionnel ou avez-vous consulté un diététicien auparavant ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(33, 'Si oui, parlez-nous de ça brièvement en quelques lignes', 2, 32, 'Oui', 0, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(34, 'Buvez-vous régulièrement des boissons sucrées ou alcoolisées ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(35, 'Si oui, Quand ? Quelle quantité ?', 2, 34, 'Oui', 0, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(36, 'Combien d\' heures de sommeil avez-vous par nuit ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(37, 'Avez-vous l\'apnée du sommeil ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(38, 'Avez-vous des douleurs articulaires ou des limitations de mobilité ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(39, 'Si oui, A quelle fréquence ?', 2, 38, 'Oui', 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(40, 'Avez-vous récemment fait un régime de perte du poids ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(41, 'Si oui, combien de poids avez-vous perdu ?', 2, 40, 'Oui', 0, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(42, 'Combien de jours par semaine pratiquez-vous une activité physique ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(43, 'Combien de temps passez-vous en position assise chaque jour ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(44, 'Quelles activités physiques appréciez-vous ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(45, 'Connaissez-vous votre fréquence cardiaque au repos ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(46, 'Si oui, veuillez- nous la donner ?', 2, 45, 'Oui', 0, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(47, 'Comment décririez-vous votre ressenti personnel par rapport à votre poids ?', 2, NULL, NULL, 0, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(48, 'Mangez-vous souvent par stress ou ennui ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(49, 'Avez-vous tendance à finir votre assiette même si vous n\'avez plus faim ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(50, 'Avez-vous des habitudes alimentaires liées à des émotions, comme le stress ou la dépression ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(51, 'Avez-vous déjà suivi un programme ou tenté de perdre du poids auparavant ?', 2, NULL, NULL, 1, '2026-03-10 11:34:05', '2026-03-10 11:34:05');

-- --------------------------------------------------------

--
-- Structure de la table `question_possible_answers`
--

CREATE TABLE `question_possible_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `question_possible_answers`
--

INSERT INTO `question_possible_answers` (`id`, `question_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(2, 1, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(3, 3, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(4, 3, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(5, 5, 'Insuline', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(6, 5, 'Médicaments pour perdre du poids (ex : orlistat, liraglutide…)', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(7, 5, 'Médicaments pour la tension artérielle (ex : IEC, ARA2, bêta-bloquants…)', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(8, 5, 'Médicaments pour le cholestérol (ex : statines)', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(9, 5, 'Médicaments pour baisser la glycémie (ex : metformine, glimepiride…)', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(10, 5, 'Aucun de ces médicaments', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(11, 7, '1-2', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(12, 7, '3-4', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(13, 7, '5 ou plus', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(14, 8, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(15, 8, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(16, 10, 'Tous les jours', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(17, 10, 'Une fois par semaine', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(18, 10, 'Occasionnellement', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(19, 10, 'Jamais', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(20, 11, 'Moins de 6 h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(21, 11, '6h -7h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(22, 11, '8h -9h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(23, 11, 'Plus de 9h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(24, 12, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(25, 12, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(26, 13, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(27, 13, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(28, 14, 'Aucun', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(29, 14, '1j-3j', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(30, 14, '4j-6j', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(31, 14, '7j', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(32, 15, 'Moins de 4h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(33, 15, '4h-6h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(34, 15, '6h-8h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(35, 15, 'Plus de 8h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(36, 16, 'Marche', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(37, 16, 'Yoga', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(38, 16, 'Autre', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(39, 17, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(40, 17, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(41, 19, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(42, 19, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(43, 20, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(44, 20, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(45, 21, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(46, 21, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(47, 23, 'Perdre du poids', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(48, 23, 'Améliorer votre forme physique', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(49, 24, 'Moins de 5 kg.', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(50, 24, '5 - 10 kg.', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(51, 24, 'Plus de 10 kg.', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(52, 25, 'Perdre moins de 5 Kg: Léger 300 kcal', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(53, 25, 'Perdre moins de 5Kg: Moyen 400 kcal', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(54, 25, 'Perdre moins de 5Kg: Serein 500 kcal', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(55, 25, 'Perdre entre 5-10Kg: Léger 500 kcal', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(56, 25, 'Perdre entre 5-10Kg: Moyen 600 kcal', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(57, 25, 'Perdre entre 5-10Kg: Serein 700 kcal', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(58, 25, 'Perdre plus de 10Kg: Léger 700 kcal', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(59, 25, 'Perdre plus de 10Kg: Moyen 800 kcal', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(60, 25, 'Perdre plus de 10Kg: Serein 900 kcal', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(61, 26, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(62, 26, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(63, 28, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(64, 28, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(65, 29, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(66, 29, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(67, 30, 'Allergies', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(68, 30, 'Intolérances', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(69, 30, 'Préférences culturelles', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(70, 30, 'Religieuses', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(71, 31, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(72, 31, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(73, 32, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(74, 32, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(75, 34, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(76, 34, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(77, 36, 'Moins de 6 h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(78, 36, '6h -7h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(79, 36, '8h -9h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(80, 36, 'Plus de 9h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(81, 37, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(82, 37, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(83, 38, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(84, 38, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(85, 39, 'Tous les jours', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(86, 39, 'Parfois', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(87, 40, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(88, 40, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(89, 42, 'Aucun', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(90, 42, '1j-3j', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(91, 42, '4j-6j', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(92, 42, '7j', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(93, 43, 'Moins de 4h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(94, 43, '4h-6h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(95, 43, '6h-8h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(96, 43, 'Plus de 8h', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(97, 44, 'Marche', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(98, 44, 'Yoga', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(99, 44, 'Autre', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(100, 45, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(101, 45, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(102, 48, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(103, 48, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(104, 49, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(105, 49, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(106, 50, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(107, 50, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(108, 51, 'Oui', '2026-03-10 11:34:05', '2026-03-10 11:34:05'),
(109, 51, 'Non', '2026-03-10 11:34:05', '2026-03-10 11:34:05');

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `question_possible_answer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `utilisateur_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Utilisateur',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `poids` int(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `tour_de_taille` double(8,2) NOT NULL,
  `tour_de_hanche` double(8,2) NOT NULL,
  `tour_du_cou` double(8,2) NOT NULL,
  `niveau_d_activite_physique` varchar(255) NOT NULL,
  `maladie_chronique_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tdee` double(8,2) DEFAULT NULL,
  `img_notification` tinyint(1) NOT NULL DEFAULT 0,
  `imc_notification` tinyint(1) NOT NULL DEFAULT 0,
  `rth_notification` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `role`, `nom`, `prenom`, `age`, `sexe`, `poids`, `taille`, `email`, `mot_de_passe`, `tour_de_taille`, `tour_de_hanche`, `tour_du_cou`, `niveau_d_activite_physique`, `maladie_chronique_id`, `last_login_date`, `created_at`, `updated_at`, `tdee`, `img_notification`, `imc_notification`, `rth_notification`) VALUES
(1, 'Administrateur', 'Admin', 'Nutrition', 20, 'M', 110, 110, 'adminnutrition@gmail.com', '$2y$12$9pL7KSlNDVUEytk0Nn2i9OeiD7thXspdTRI1a8beDCl5BNs3bXg92', 100.00, 100.00, 100.00, '2', NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(2, 'Utilisateur', 'Dupont', 'Jean', 35, 'M', 95, 172, 'adammadochrist321@gmail.com', '$2y$12$/Wr3iwd0zw58UFAEDtpxdeO.LJ5PWBdLHr3yNm33Gd3Tm.MSF4qoS', 105.00, 110.00, 42.00, 'Modéré', 1, '2026-03-10 12:48:42', '2026-03-10 11:48:00', '2026-03-10 12:00:06', 2226.00, 0, 0, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `administrateurs_identifiant_unique` (`identifiant`);

--
-- Index pour la table `maladie_chroniques`
--
ALTER TABLE `maladie_chroniques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `plan_nutritionnels`
--
ALTER TABLE `plan_nutritionnels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_nutritionnels_utilisateur_id_foreign` (`utilisateur_id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_maladie_chronique_id_foreign` (`maladie_chronique_id`),
  ADD KEY `questions_parent_question_id_foreign` (`parent_question_id`);

--
-- Index pour la table `question_possible_answers`
--
ALTER TABLE `question_possible_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_possible_answers_question_id_foreign` (`question_id`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reponses_question_id_foreign` (`question_id`),
  ADD KEY `reponses_utilisateur_id_foreign` (`utilisateur_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utilisateurs_email_unique` (`email`),
  ADD KEY `utilisateurs_maladie_chronique_id_foreign` (`maladie_chronique_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `maladie_chroniques`
--
ALTER TABLE `maladie_chroniques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `plan_nutritionnels`
--
ALTER TABLE `plan_nutritionnels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `question_possible_answers`
--
ALTER TABLE `question_possible_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `plan_nutritionnels`
--
ALTER TABLE `plan_nutritionnels`
  ADD CONSTRAINT `plan_nutritionnels_utilisateur_id_foreign` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_maladie_chronique_id_foreign` FOREIGN KEY (`maladie_chronique_id`) REFERENCES `maladie_chroniques` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_parent_question_id_foreign` FOREIGN KEY (`parent_question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `question_possible_answers`
--
ALTER TABLE `question_possible_answers`
  ADD CONSTRAINT `question_possible_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Contraintes pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `reponses_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reponses_utilisateur_id_foreign` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_maladie_chronique_id_foreign` FOREIGN KEY (`maladie_chronique_id`) REFERENCES `maladie_chroniques` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
