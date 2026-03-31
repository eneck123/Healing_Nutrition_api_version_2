-- MySQL dump 10.13  Distrib 8.0.45, for Win64 (x86_64)
--
-- Host: localhost    Database: nutrition_project
-- ------------------------------------------------------
-- Server version	8.0.45

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrateurs`
--

DROP TABLE IF EXISTS `administrateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrateurs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `administrateurs_identifiant_unique` (`identifiant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrateurs`
--

LOCK TABLES `administrateurs` WRITE;
/*!40000 ALTER TABLE `administrateurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrateurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maladie_chroniques`
--

DROP TABLE IF EXISTS `maladie_chroniques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maladie_chroniques` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maladie_chroniques`
--

LOCK TABLES `maladie_chroniques` WRITE;
/*!40000 ALTER TABLE `maladie_chroniques` DISABLE KEYS */;
INSERT INTO `maladie_chroniques` VALUES (1,'Obésité','obésité modérée',NULL,NULL),(2,'Obésité','obésité sévère',NULL,NULL);
/*!40000 ALTER TABLE `maladie_chroniques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_12_14_000001_create_personal_access_tokens_table',1),(2,'2024_08_12_143424_create_maladie_chroniques_table',1),(3,'2024_08_12_143738_create_administrateurs-table',1),(4,'2024_08_12_143901_create_questions_table',1),(5,'2024_08_12_144050_create_utilisateurs_table',1),(6,'2024_08_12_144448_create_reponses_table',1),(7,'2024_09_01_151253_create_plan_nutritionnels_table',1),(8,'2024_11_08_203838_create_password_resets_table',1),(9,'2025_02_19_102346_create_question_possible_answers_table',1),(10,'2025_12_23_124213_add_notification_and_tdee_columns_to_utilisateurs_table',1),(11,'2026_02_18_230756_add_pdf_path_to_plan_nutritionnels_table',1),(12,'2026_03_10_120000_add_conditional_columns_to_questions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan_nutritionnels`
--

DROP TABLE IF EXISTS `plan_nutritionnels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plan_nutritionnels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur_id` bigint unsigned NOT NULL,
  `pdf_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_nutritionnels_utilisateur_id_foreign` (`utilisateur_id`),
  CONSTRAINT `plan_nutritionnels_utilisateur_id_foreign` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_nutritionnels`
--

LOCK TABLES `plan_nutritionnels` WRITE;
/*!40000 ALTER TABLE `plan_nutritionnels` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan_nutritionnels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_possible_answers`
--

DROP TABLE IF EXISTS `question_possible_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question_possible_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint unsigned NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_possible_answers_question_id_foreign` (`question_id`),
  CONSTRAINT `question_possible_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_possible_answers`
--

LOCK TABLES `question_possible_answers` WRITE;
/*!40000 ALTER TABLE `question_possible_answers` DISABLE KEYS */;
INSERT INTO `question_possible_answers` VALUES (1,1,'Oui','2026-03-28 21:34:53','2026-03-28 21:34:53'),(2,1,'Non','2026-03-28 21:34:53','2026-03-28 21:34:53'),(3,3,'Oui','2026-03-28 21:34:53','2026-03-28 21:34:53'),(4,3,'Non','2026-03-28 21:34:53','2026-03-28 21:34:53'),(5,5,'Insuline','2026-03-28 21:34:53','2026-03-28 21:34:53'),(6,5,'Médicaments pour perdre du poids (ex : orlistat, liraglutide…)','2026-03-28 21:34:53','2026-03-28 21:34:53'),(7,5,'Médicaments pour la tension artérielle (ex : IEC, ARA2, bêta-bloquants…)','2026-03-28 21:34:53','2026-03-28 21:34:53'),(8,5,'Médicaments pour le cholestérol (ex : statines)','2026-03-28 21:34:53','2026-03-28 21:34:53'),(9,5,'Médicaments pour baisser la glycémie (ex : metformine, glimepiride…)','2026-03-28 21:34:53','2026-03-28 21:34:53'),(10,5,'Aucun de ces médicaments','2026-03-28 21:34:53','2026-03-28 21:34:53'),(11,7,'1-2','2026-03-28 21:34:53','2026-03-28 21:34:53'),(12,7,'3-4','2026-03-28 21:34:53','2026-03-28 21:34:53'),(13,7,'5 ou plus','2026-03-28 21:34:53','2026-03-28 21:34:53'),(14,8,'Oui','2026-03-28 21:34:53','2026-03-28 21:34:53'),(15,8,'Non','2026-03-28 21:34:53','2026-03-28 21:34:53'),(16,10,'Tous les jours','2026-03-28 21:34:53','2026-03-28 21:34:53'),(17,10,'Une fois par semaine','2026-03-28 21:34:53','2026-03-28 21:34:53'),(18,10,'Occasionnellement','2026-03-28 21:34:53','2026-03-28 21:34:53'),(19,10,'Jamais','2026-03-28 21:34:53','2026-03-28 21:34:53'),(20,11,'Moins de 6 h','2026-03-28 21:34:53','2026-03-28 21:34:53'),(21,11,'6h -7h','2026-03-28 21:34:53','2026-03-28 21:34:53'),(22,11,'8h -9h','2026-03-28 21:34:53','2026-03-28 21:34:53'),(23,11,'Plus de 9h','2026-03-28 21:34:53','2026-03-28 21:34:53'),(24,12,'Oui','2026-03-28 21:34:53','2026-03-28 21:34:53'),(25,12,'Non','2026-03-28 21:34:53','2026-03-28 21:34:53'),(26,13,'Oui','2026-03-28 21:34:53','2026-03-28 21:34:53'),(27,13,'Non','2026-03-28 21:34:53','2026-03-28 21:34:53'),(28,14,'Aucun','2026-03-28 21:34:53','2026-03-28 21:34:53'),(29,14,'1j-3j','2026-03-28 21:34:53','2026-03-28 21:34:53'),(30,14,'4j-6j','2026-03-28 21:34:53','2026-03-28 21:34:53'),(31,14,'7j','2026-03-28 21:34:53','2026-03-28 21:34:53'),(32,15,'Moins de 4h','2026-03-28 21:34:53','2026-03-28 21:34:53'),(33,15,'4h-6h','2026-03-28 21:34:53','2026-03-28 21:34:53'),(34,15,'6h-8h','2026-03-28 21:34:53','2026-03-28 21:34:53'),(35,15,'Plus de 8h','2026-03-28 21:34:53','2026-03-28 21:34:53'),(36,16,'Marche','2026-03-28 21:34:53','2026-03-28 21:34:53'),(37,16,'Yoga','2026-03-28 21:34:53','2026-03-28 21:34:53'),(38,16,'Autre','2026-03-28 21:34:53','2026-03-28 21:34:53'),(39,17,'Oui','2026-03-28 21:34:53','2026-03-28 21:34:53'),(40,17,'Non','2026-03-28 21:34:53','2026-03-28 21:34:53'),(41,19,'Oui','2026-03-28 21:34:53','2026-03-28 21:34:53'),(42,19,'Non','2026-03-28 21:34:53','2026-03-28 21:34:53'),(43,20,'Oui','2026-03-28 21:34:53','2026-03-28 21:34:53'),(44,20,'Non','2026-03-28 21:34:53','2026-03-28 21:34:53'),(45,21,'Oui','2026-03-28 21:34:53','2026-03-28 21:34:53'),(46,21,'Non','2026-03-28 21:34:53','2026-03-28 21:34:53'),(47,23,'Perdre du poids','2026-03-28 21:34:53','2026-03-28 21:34:53'),(48,23,'Améliorer votre forme physique','2026-03-28 21:34:53','2026-03-28 21:34:53'),(49,24,'Moins de 5 kg.','2026-03-28 21:34:53','2026-03-28 21:34:53'),(50,24,'5 - 10 kg.','2026-03-28 21:34:53','2026-03-28 21:34:53'),(51,24,'Plus de 10 kg.','2026-03-28 21:34:53','2026-03-28 21:34:53'),(52,25,'Perdre moins de 5 Kg: Léger 300 kcal','2026-03-28 21:34:53','2026-03-28 21:34:53'),(53,25,'Perdre moins de 5Kg: Moyen 400 kcal','2026-03-28 21:34:53','2026-03-28 21:34:53'),(54,25,'Perdre moins de 5Kg: Serein 500 kcal','2026-03-28 21:34:53','2026-03-28 21:34:53'),(55,25,'Perdre entre 5-10Kg: Léger 500 kcal','2026-03-28 21:34:53','2026-03-28 21:34:53'),(56,25,'Perdre entre 5-10Kg: Moyen 600 kcal','2026-03-28 21:34:53','2026-03-28 21:34:53'),(57,25,'Perdre entre 5-10Kg: Serein 700 kcal','2026-03-28 21:34:53','2026-03-28 21:34:53'),(58,25,'Perdre plus de 10Kg: Léger 700 kcal','2026-03-28 21:34:53','2026-03-28 21:34:53'),(59,25,'Perdre plus de 10Kg: Moyen 800 kcal','2026-03-28 21:34:53','2026-03-28 21:34:53'),(60,25,'Perdre plus de 10Kg: Serein 900 kcal','2026-03-28 21:34:53','2026-03-28 21:34:53'),(61,26,'Oui','2026-03-28 21:34:53','2026-03-28 21:34:53'),(62,26,'Non','2026-03-28 21:34:53','2026-03-28 21:34:53'),(63,28,'Oui','2026-03-28 21:34:53','2026-03-28 21:34:53'),(64,28,'Non','2026-03-28 21:34:53','2026-03-28 21:34:53'),(65,29,'Oui','2026-03-28 21:34:53','2026-03-28 21:34:53'),(66,29,'Non','2026-03-28 21:34:53','2026-03-28 21:34:53'),(67,30,'Allergies','2026-03-28 21:34:53','2026-03-28 21:34:53'),(68,30,'Intolérances','2026-03-28 21:34:53','2026-03-28 21:34:53'),(69,30,'Préférences culturelles','2026-03-28 21:34:53','2026-03-28 21:34:53'),(70,30,'Religieuses','2026-03-28 21:34:53','2026-03-28 21:34:53'),(71,31,'Oui','2026-03-28 21:34:53','2026-03-28 21:34:53'),(72,31,'Non','2026-03-28 21:34:54','2026-03-28 21:34:54'),(73,32,'Oui','2026-03-28 21:34:54','2026-03-28 21:34:54'),(74,32,'Non','2026-03-28 21:34:54','2026-03-28 21:34:54'),(75,34,'Oui','2026-03-28 21:34:54','2026-03-28 21:34:54'),(76,34,'Non','2026-03-28 21:34:54','2026-03-28 21:34:54'),(77,36,'Moins de 6 h','2026-03-28 21:34:54','2026-03-28 21:34:54'),(78,36,'6h -7h','2026-03-28 21:34:54','2026-03-28 21:34:54'),(79,36,'8h -9h','2026-03-28 21:34:54','2026-03-28 21:34:54'),(80,36,'Plus de 9h','2026-03-28 21:34:54','2026-03-28 21:34:54'),(81,37,'Oui','2026-03-28 21:34:54','2026-03-28 21:34:54'),(82,37,'Non','2026-03-28 21:34:54','2026-03-28 21:34:54'),(83,38,'Oui','2026-03-28 21:34:54','2026-03-28 21:34:54'),(84,38,'Non','2026-03-28 21:34:54','2026-03-28 21:34:54'),(85,39,'Tous les jours','2026-03-28 21:34:54','2026-03-28 21:34:54'),(86,39,'Parfois','2026-03-28 21:34:54','2026-03-28 21:34:54'),(87,40,'Oui','2026-03-28 21:34:54','2026-03-28 21:34:54'),(88,40,'Non','2026-03-28 21:34:54','2026-03-28 21:34:54'),(89,42,'Aucun','2026-03-28 21:34:54','2026-03-28 21:34:54'),(90,42,'1j-3j','2026-03-28 21:34:54','2026-03-28 21:34:54'),(91,42,'4j-6j','2026-03-28 21:34:54','2026-03-28 21:34:54'),(92,42,'7j','2026-03-28 21:34:54','2026-03-28 21:34:54'),(93,43,'Moins de 4h','2026-03-28 21:34:54','2026-03-28 21:34:54'),(94,43,'4h-6h','2026-03-28 21:34:54','2026-03-28 21:34:54'),(95,43,'6h-8h','2026-03-28 21:34:54','2026-03-28 21:34:54'),(96,43,'Plus de 8h','2026-03-28 21:34:54','2026-03-28 21:34:54'),(97,44,'Marche','2026-03-28 21:34:54','2026-03-28 21:34:54'),(98,44,'Yoga','2026-03-28 21:34:54','2026-03-28 21:34:54'),(99,44,'Autre','2026-03-28 21:34:54','2026-03-28 21:34:54'),(100,45,'Oui','2026-03-28 21:34:54','2026-03-28 21:34:54'),(101,45,'Non','2026-03-28 21:34:54','2026-03-28 21:34:54'),(102,48,'Oui','2026-03-28 21:34:54','2026-03-28 21:34:54'),(103,48,'Non','2026-03-28 21:34:54','2026-03-28 21:34:54'),(104,49,'Oui','2026-03-28 21:34:54','2026-03-28 21:34:54'),(105,49,'Non','2026-03-28 21:34:54','2026-03-28 21:34:54'),(106,50,'Oui','2026-03-28 21:34:54','2026-03-28 21:34:54'),(107,50,'Non','2026-03-28 21:34:54','2026-03-28 21:34:54'),(108,51,'Oui','2026-03-28 21:34:54','2026-03-28 21:34:54'),(109,51,'Non','2026-03-28 21:34:54','2026-03-28 21:34:54');
/*!40000 ALTER TABLE `question_possible_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `texte_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maladie_chronique_id` bigint unsigned NOT NULL,
  `parent_question_id` bigint unsigned DEFAULT NULL,
  `trigger_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_possible_answers` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_maladie_chronique_id_foreign` (`maladie_chronique_id`),
  KEY `questions_parent_question_id_foreign` (`parent_question_id`),
  CONSTRAINT `questions_maladie_chronique_id_foreign` FOREIGN KEY (`maladie_chronique_id`) REFERENCES `maladie_chroniques` (`id`) ON DELETE CASCADE,
  CONSTRAINT `questions_parent_question_id_foreign` FOREIGN KEY (`parent_question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Avez-vous des antécédents de diabète de type 2, d\'hypertension artérielle ou de maladies cardiovasculaires ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(2,'Si oui, lequel ?',1,1,'Oui',0,'2026-03-28 21:34:53','2026-03-28 21:34:54'),(3,'Prenez-vous actuellement des médicaments qui sont liés à votre antécédent précédent ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(4,'Si oui, lesquels ?',1,3,'Oui',0,'2026-03-28 21:34:53','2026-03-28 21:34:54'),(5,'Prenez-vous actuellement l\'un des types de médicaments suivants ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(6,'Pouvez-vous décrire une journée typique de vos repas et collations ?',1,NULL,NULL,0,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(7,'Combien de portions de fruits et légumes consommez-vous par jour ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(8,'Grignotez-vous entre les repas ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(9,'Si oui, quels aliments consommez-vous ?',1,8,'Oui',0,'2026-03-28 21:34:53','2026-03-28 21:34:54'),(10,'A quelle fréquence consommez-vous des boissons sucrées ou alcoolisées ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(11,'Combien d\'heures de sommeil avez-vous par nuit ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(12,'Avez-vous l\'apnée du sommeil ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(13,'Avez-vous récemment fait un régime de perte du poids ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(14,'Combien de jours par semaine pratiquez-vous une activité physique ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(15,'Combien de temps passez-vous en position assise chaque jour ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(16,'Quelles activités physiques appréciez-vous ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(17,'Connaissez-vous votre fréquence cardiaque au repos ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(18,'Si oui, veuillez- nous la donner ?',1,17,'Oui',0,'2026-03-28 21:34:53','2026-03-28 21:34:54'),(19,'Mangez-vous souvent par stress ou ennui ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(20,'Avez-vous tendance à finir votre assiette même si vous n\'avez plus faim ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(21,'Avez-vous déjà suivi un régime alimentaire particulier ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(22,'Si oui, lequel, et a-t-il été efficace pour vous ? Pourquoi ?',1,21,'Oui',0,'2026-03-28 21:34:53','2026-03-28 21:34:54'),(23,'Quel est votre objectif principal en matière de santé ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(24,'Combien de kg voulez-vous perdre ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(25,'Selon votre objectif de perte de poids, quel niveau de changement êtes-vous prêt à suivre ?',1,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(26,'Avez-vous été diagnostiqué avec des problèmes de santé liés à l\'obésité, comme le diabète de type 2, l\'hypertension ou l\'hypercholestérolémie ?',2,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(27,'Si oui lequel ?',2,26,'Oui',0,'2026-03-28 21:34:53','2026-03-28 21:34:54'),(28,'Avez-vous subi des opérations chirurgicales liées à votre poids comme une chirurgie bariatrique ?',2,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(29,'Avez-vous des restrictions alimentaires ?',2,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(30,'Si oui, choisissez l\'option qui s\'appliquent ?',2,29,'Oui',1,'2026-03-28 21:34:53','2026-03-28 21:34:54'),(31,'Consommez-vous régulièrement des aliments riches en calories vides, comme les boissons sucrées, les fast-foods, ou les desserts ?',2,NULL,NULL,1,'2026-03-28 21:34:53','2026-03-28 21:34:53'),(32,'Suivez-vous déjà un plan nutritionnel ou avez-vous consulté un diététicien auparavant ?',2,NULL,NULL,1,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(33,'Si oui, parlez-nous de ça brièvement en quelques lignes',2,32,'Oui',0,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(34,'Buvez-vous régulièrement des boissons sucrées ou alcoolisées ?',2,NULL,NULL,1,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(35,'Si oui, Quand ? Quelle quantité ?',2,34,'Oui',0,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(36,'Combien d\' heures de sommeil avez-vous par nuit ?',2,NULL,NULL,1,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(37,'Avez-vous l\'apnée du sommeil ?',2,NULL,NULL,1,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(38,'Avez-vous des douleurs articulaires ou des limitations de mobilité ?',2,NULL,NULL,1,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(39,'Si oui, A quelle fréquence ?',2,38,'Oui',1,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(40,'Avez-vous récemment fait un régime de perte du poids ?',2,NULL,NULL,1,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(41,'Si oui, combien de poids avez-vous perdu ?',2,40,'Oui',0,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(42,'Combien de jours par semaine pratiquez-vous une activité physique ?',2,NULL,NULL,1,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(43,'Combien de temps passez-vous en position assise chaque jour ?',2,NULL,NULL,1,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(44,'Quelles activités physiques appréciez-vous ?',2,NULL,NULL,1,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(45,'Connaissez-vous votre fréquence cardiaque au repos ?',2,NULL,NULL,1,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(46,'Si oui, veuillez- nous la donner ?',2,45,'Oui',0,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(47,'Comment décririez-vous votre ressenti personnel par rapport à votre poids ?',2,NULL,NULL,0,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(48,'Mangez-vous souvent par stress ou ennui ?',2,NULL,NULL,1,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(49,'Avez-vous tendance à finir votre assiette même si vous n\'avez plus faim ?',2,NULL,NULL,1,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(50,'Avez-vous des habitudes alimentaires liées à des émotions, comme le stress ou la dépression ?',2,NULL,NULL,1,'2026-03-28 21:34:54','2026-03-28 21:34:54'),(51,'Avez-vous déjà suivi un programme ou tenté de perdre du poids auparavant ?',2,NULL,NULL,1,'2026-03-28 21:34:54','2026-03-28 21:34:54');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reponses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint unsigned NOT NULL,
  `question_possible_answer_id` bigint unsigned DEFAULT NULL,
  `utilisateur_id` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reponses_question_id_foreign` (`question_id`),
  KEY `reponses_utilisateur_id_foreign` (`utilisateur_id`),
  CONSTRAINT `reponses_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reponses_utilisateur_id_foreign` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reponses`
--

LOCK TABLES `reponses` WRITE;
/*!40000 ALTER TABLE `reponses` DISABLE KEYS */;
/*!40000 ALTER TABLE `reponses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateurs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Utilisateur',
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poids` int NOT NULL,
  `taille` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_de_taille` double(8,2) NOT NULL,
  `tour_de_hanche` double(8,2) NOT NULL,
  `tour_du_cou` double(8,2) NOT NULL,
  `niveau_d_activite_physique` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maladie_chronique_id` bigint unsigned DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tdee` double(8,2) DEFAULT NULL,
  `img_notification` tinyint(1) NOT NULL DEFAULT '0',
  `imc_notification` tinyint(1) NOT NULL DEFAULT '0',
  `rth_notification` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `utilisateurs_email_unique` (`email`),
  KEY `utilisateurs_maladie_chronique_id_foreign` (`maladie_chronique_id`),
  CONSTRAINT `utilisateurs_maladie_chronique_id_foreign` FOREIGN KEY (`maladie_chronique_id`) REFERENCES `maladie_chroniques` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (1,'Administrateur','Admin','Nutrition',20,'M',110,110,'adminnutrition@gmail.com','$2y$12$ksR5o835LMehq2DH7i8e7OmpdtFo8DpZUmTAFOygt1sd4ttsUNyHm',100.00,100.00,100.00,'2',NULL,NULL,NULL,NULL,NULL,0,0,0);
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-03-30 17:24:50
