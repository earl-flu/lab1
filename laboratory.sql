-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table laboratory.blood_chemistries
CREATE TABLE IF NOT EXISTS `blood_chemistries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `enccode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hpercode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_report` datetime DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requesting_physician` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_technologist_id` bigint unsigned NOT NULL,
  `fbs` decimal(8,2) DEFAULT NULL,
  `sgot` decimal(8,2) DEFAULT NULL,
  `sgpt` decimal(8,2) DEFAULT NULL,
  `creatinine` decimal(8,2) DEFAULT NULL,
  `bun_urea` decimal(8,2) DEFAULT NULL,
  `uric_acid` decimal(8,2) DEFAULT NULL,
  `total_bilirubin` decimal(8,2) DEFAULT NULL,
  `direct_bilirubin` decimal(8,2) DEFAULT NULL,
  `indirect_bilirubin` decimal(8,2) DEFAULT NULL,
  `total_protein` decimal(8,2) DEFAULT NULL,
  `albumin` decimal(8,2) DEFAULT NULL,
  `globulin` decimal(8,2) DEFAULT NULL,
  `ag_ratio` decimal(8,2) DEFAULT NULL,
  `cholesterol` decimal(8,2) DEFAULT NULL,
  `triglyceride` decimal(8,2) DEFAULT NULL,
  `hdl_cholesterol` decimal(8,2) DEFAULT NULL,
  `ldl_cholesterol` decimal(8,2) DEFAULT NULL,
  `vldl_cholesterol` decimal(8,2) DEFAULT NULL,
  `hba1c` decimal(8,2) DEFAULT NULL,
  `sodium` decimal(8,2) DEFAULT NULL,
  `potassium` decimal(8,2) DEFAULT NULL,
  `chloride` decimal(8,2) DEFAULT NULL,
  `ionized_calcium` decimal(8,2) DEFAULT NULL,
  `nonionized_calcium` decimal(8,2) DEFAULT NULL,
  `total_calcium` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blood_chemistries_medical_technologist_id_foreign` (`medical_technologist_id`),
  CONSTRAINT `blood_chemistries_medical_technologist_id_foreign` FOREIGN KEY (`medical_technologist_id`) REFERENCES `medical_technologists` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.blood_chemistries: ~0 rows (approximately)

-- Dumping structure for table laboratory.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.cache: ~0 rows (approximately)

-- Dumping structure for table laboratory.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.cache_locks: ~0 rows (approximately)

-- Dumping structure for table laboratory.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table laboratory.hematologies
CREATE TABLE IF NOT EXISTS `hematologies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `enccode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hpercode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_report` datetime DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requesting_physician` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clinical_diagnosis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bed_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_technologist_id` bigint unsigned NOT NULL,
  `hematocrit_m` decimal(8,2) DEFAULT NULL,
  `hematocrit_f` decimal(8,2) DEFAULT NULL,
  `hemoglobin_m` decimal(8,2) DEFAULT NULL,
  `hemoglobin_f` decimal(8,2) DEFAULT NULL,
  `rbc_count` decimal(8,2) DEFAULT NULL,
  `wbc_count` decimal(8,2) DEFAULT NULL,
  `differential_count` decimal(8,2) DEFAULT NULL,
  `neutrophils` decimal(8,2) DEFAULT NULL,
  `segmenters` decimal(8,2) DEFAULT NULL,
  `stabs` decimal(8,2) DEFAULT NULL,
  `juveniles` decimal(8,2) DEFAULT NULL,
  `myclocytes` decimal(8,2) DEFAULT NULL,
  `lymphocytes` decimal(8,2) DEFAULT NULL,
  `monocytes` decimal(8,2) DEFAULT NULL,
  `eusinophils` decimal(8,2) DEFAULT NULL,
  `basophils` decimal(8,2) DEFAULT NULL,
  `esr_m` decimal(8,2) DEFAULT NULL,
  `esr_f` decimal(8,2) DEFAULT NULL,
  `platelet_count` decimal(8,2) DEFAULT NULL,
  `bleeding_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clotting_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mcv` decimal(8,2) DEFAULT NULL,
  `mch` decimal(8,2) DEFAULT NULL,
  `mchc` decimal(8,2) DEFAULT NULL,
  `blood_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hematologies_medical_technologist_id_foreign` (`medical_technologist_id`),
  CONSTRAINT `hematologies_medical_technologist_id_foreign` FOREIGN KEY (`medical_technologist_id`) REFERENCES `medical_technologists` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.hematologies: ~0 rows (approximately)

-- Dumping structure for table laboratory.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.jobs: ~0 rows (approximately)

-- Dumping structure for table laboratory.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.job_batches: ~0 rows (approximately)

-- Dumping structure for table laboratory.medical_technologists
CREATE TABLE IF NOT EXISTS `medical_technologists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `medical_technologists_license_number_unique` (`license_number`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.medical_technologists: ~8 rows (approximately)
INSERT INTO `medical_technologists` (`id`, `name`, `license_number`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'Tesorero, Malu S, RMT', '0035915', 1, '2024-10-06 14:26:51', '2024-10-06 14:26:51'),
	(2, 'Rodriguez, Angeline, RMT', '0088604', 1, '2024-10-06 14:26:51', '2024-10-06 14:26:51'),
	(3, 'Haban, Ma. Rizza, RMT', '0060660', 1, '2024-10-06 14:26:51', '2024-10-06 14:26:51'),
	(4, 'Belaro, Hayley, RMT', '0022444', 1, '2024-10-06 14:26:51', '2024-10-06 14:26:51'),
	(5, 'Teves, Aubrey Jewel, RMT', '0117483', 1, '2024-10-06 14:26:51', '2024-10-06 14:26:51'),
	(6, 'Reyes, Josefina, RMT', '0025058', 1, '2024-10-06 14:26:51', '2024-10-06 14:26:51'),
	(7, 'Tatel, Maria Florentina, RMT', '0027998', 1, '2024-10-06 14:26:51', '2024-10-06 14:26:51'),
	(8, 'Collantes, Jessa, RMT', '0078519', 1, '2024-10-06 14:26:51', '2024-10-06 14:26:51');

-- Dumping structure for table laboratory.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_07_15_052850_create_papers_table', 1),
	(5, '2024_07_15_052855_create_tags_table', 1),
	(6, '2024_07_15_052906_create_paper_tag_table', 1),
	(7, '2024_07_15_054840_create_offices_table', 1),
	(8, '2024_07_16_053341_add_theme_to_users_table', 1),
	(9, '2024_10_02_230000_create_medical_technologists_table', 1),
	(10, '2024_10_02_231700_create_patients_table', 1),
	(11, '2024_10_02_231712_create_hematologies_table', 1),
	(12, '2024_10_05_231205_create_urines_table', 1),
	(13, '2024_10_06_150646_create_blood_chemistries_table', 1);

-- Dumping structure for table laboratory.offices
CREATE TABLE IF NOT EXISTS `offices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.offices: ~4 rows (approximately)
INSERT INTO `offices` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'BMCH', '2024-10-06 14:26:51', '2024-10-06 14:26:51'),
	(2, 'EBMC', '2024-10-06 14:26:51', '2024-10-06 14:26:51'),
	(3, 'DOH', '2024-10-06 14:26:51', '2024-10-06 14:26:51'),
	(4, 'PDOH', '2024-10-06 14:26:51', '2024-10-06 14:26:51');

-- Dumping structure for table laboratory.papers
CREATE TABLE IF NOT EXISTS `papers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `office_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `papers_office_id_foreign` (`office_id`),
  CONSTRAINT `papers_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.papers: ~0 rows (approximately)

-- Dumping structure for table laboratory.paper_tag
CREATE TABLE IF NOT EXISTS `paper_tag` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `paper_id` bigint unsigned NOT NULL,
  `tag_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paper_tag_paper_id_foreign` (`paper_id`),
  KEY `paper_tag_tag_id_foreign` (`tag_id`),
  CONSTRAINT `paper_tag_paper_id_foreign` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `paper_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.paper_tag: ~0 rows (approximately)

-- Dumping structure for table laboratory.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table laboratory.patients
CREATE TABLE IF NOT EXISTS `patients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.patients: ~0 rows (approximately)

-- Dumping structure for table laboratory.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('Fo9WuPgRpoNzaMiS58tPcELg5wqf8zVFydHIvRHx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNkZyVjJ0Q1drR0tUZ0F1Nm5pVzQ0Zkgzbm40Q1ZmR3lkMVBHQXdtUCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozOToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Jsb29kLWNoZW1pc3RyaWVzIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1728224853);

-- Dumping structure for table laboratory.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.tags: ~4 rows (approximately)
INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'firstTag', '2024-10-06 14:26:51', '2024-10-06 14:26:51'),
	(2, 'secondTag', '2024-10-06 14:26:51', '2024-10-06 14:26:51'),
	(3, 'AOP2023', '2024-10-06 14:26:51', '2024-10-06 14:26:51'),
	(4, 'AOP2024', '2024-10-06 14:26:51', '2024-10-06 14:26:51');

-- Dumping structure for table laboratory.urines
CREATE TABLE IF NOT EXISTS `urines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `enccode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hpercode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_report` datetime DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requesting_physician` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_technologist_id` bigint unsigned NOT NULL,
  `macro_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `macro_transparency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `macro_sp_gravity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `macro_reaction_ph` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `macro_albumin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `macro_sugar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `micro_epithelial_cells` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `micro_red_cells` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `micro_pus_cells` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `micro_bacteria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `micro_casts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` text COLLATE utf8mb4_unicode_ci,
  `pt_result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_brand_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_lot_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_expiry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `urines_medical_technologist_id_foreign` (`medical_technologist_id`),
  CONSTRAINT `urines_medical_technologist_id_foreign` FOREIGN KEY (`medical_technologist_id`) REFERENCES `medical_technologists` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.urines: ~0 rows (approximately)

-- Dumping structure for table laboratory.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'blue-theme',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laboratory.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `theme`) VALUES
	(1, 'Earl', 'earl@pho.com', NULL, '$2y$12$oU1sCtEDY6YCTVDpI2sIJORJo4Y4ORax.3/jejxJxM5Jt9IpSVjaC', NULL, '2024-10-06 14:26:50', '2024-10-06 14:26:50', 'blue-theme'),
	(2, 'Arjay', 'arjay@ebmc.com', NULL, '$2y$12$aJr56ATWJkZxLnNwjYbh0.98ZGfDQR1mL9MuO1ltuXyuGpX1Xem4W', NULL, '2024-10-06 14:26:50', '2024-10-06 14:26:50', 'blue-theme'),
	(3, 'anthony', 'anthony@ebmc.com', NULL, '$2y$12$3L78YBAnHb9nLVH2W5/ZfOqutCyJbl5qrVD10TGL8FX1NKN4EyaqK', NULL, '2024-10-06 14:26:50', '2024-10-06 14:26:50', 'blue-theme');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
