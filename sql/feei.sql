-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 13, 2022 at 03:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feei`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anrede`
--

CREATE TABLE `anrede` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bezeichnung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bundesland`
--

CREATE TABLE `bundesland` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bezeichnung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funktion`
--

CREATE TABLE `funktion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bezeichnung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategorie_organisation`
--

CREATE TABLE `kategorie_organisation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bezeichnung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_08_22_063653_create_organisation_table', 1),
(7, '2022_08_22_063718_create_netzwerkpartner_table', 1),
(8, '2022_08_22_063730_create_notizen_table', 1),
(9, '2022_08_22_063739_create_person_table', 1),
(10, '2022_09_08_134234_create_themengebiet_table', 1),
(11, '2022_09_08_134238_create_anrede_table', 1),
(12, '2022_09_08_134239_create_titel_table', 1),
(13, '2022_09_08_134241_create_titel_nachgestellt_table', 1),
(14, '2022_09_08_134243_create_titel_verliehen_table', 1),
(15, '2022_09_08_134244_create_bundesland_table', 1),
(16, '2022_09_08_134246_create_funktion_table', 1),
(17, '2022_09_08_134247_create_status_table', 1),
(18, '2022_09_08_134249_create_status_person_table', 1),
(19, '2022_09_08_134251_create_kategorie_organisation_table', 1),
(20, '2022_09_19_084335_create_tx_laender_table', 1),
(21, '2022_09_20_091514_create_mitglied_table', 1),
(22, '2022_09_20_103427_create_ort_table', 1),
(23, '2022_10_03_123216_create_person_themen_table', 1),
(24, '2022_10_11_113930_create_person_mitglied_table', 1),
(25, '2022_10_11_113935_create_organisation_themen_table', 1),
(26, '2022_10_11_113937_create_person_organisation_table', 1),
(27, '2022_10_11_133845_create_mitglied_netzwerkpartner_table', 1),
(28, '2022_10_11_133847_create_mitglied_themen_table', 1),
(29, '2022_10_11_133849_create_person_netzwerkpartner_table', 1),
(30, '2022_10_12_100422_create_user_organisation_table', 1),
(31, '2022_10_12_113657_create_user_person_table', 1),
(32, '2022_10_13_102538_create_user_mitglied_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mitglied`
--

CREATE TABLE `mitglied` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organisation_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bezeichnung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feei_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `einteilung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feei_kv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feei_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ev_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ort_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mitglied_netzwerkpartner_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mitglied_themen_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person_mitglied_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mitglied_netzwerkpartner`
--

CREATE TABLE `mitglied_netzwerkpartner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mitglied_id` bigint(20) UNSIGNED NOT NULL,
  `netzwerkpartner_id` bigint(20) UNSIGNED NOT NULL,
  `funktion_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abteilung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mitglied_themen`
--

CREATE TABLE `mitglied_themen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mitglied_id` bigint(20) UNSIGNED NOT NULL,
  `themengebiet_id` bigint(20) UNSIGNED NOT NULL,
  `funktion_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abteilung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `netzwerkpartner`
--

CREATE TABLE `netzwerkpartner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bezeichnung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `synonyme` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ort_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notizen`
--

CREATE TABLE `notizen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titel` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `synonyme` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ort_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wkonr` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organisation_themen`
--

CREATE TABLE `organisation_themen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organisation_id` bigint(20) UNSIGNED NOT NULL,
  `themengebiet_id` bigint(20) UNSIGNED NOT NULL,
  `funktion_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abteilung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ort`
--

CREATE TABLE `ort` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plz` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bezeichnung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bundesland_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nachname` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vorname` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anrede_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anrede_brief_manuell` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anrede_adresse_manuell` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titel_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titel_verliehen_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titel_nachgestellt_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobil` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobil2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person_id_assistenz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person_id_assistenz2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_person_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sprache` enum('de','en') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'de',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person_mitglied`
--

CREATE TABLE `person_mitglied` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person_id` bigint(20) UNSIGNED NOT NULL,
  `mitglied_id` bigint(20) UNSIGNED NOT NULL,
  `funktion_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abteilung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person_netzwerkpartner`
--

CREATE TABLE `person_netzwerkpartner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person_id` bigint(20) UNSIGNED NOT NULL,
  `netzwerkpartner_id` bigint(20) UNSIGNED NOT NULL,
  `funktion_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abteilung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person_organisation`
--

CREATE TABLE `person_organisation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person_id` bigint(20) UNSIGNED NOT NULL,
  `organisation_id` bigint(20) UNSIGNED NOT NULL,
  `funktion_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abteilung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person_themen`
--

CREATE TABLE `person_themen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person_id` bigint(20) UNSIGNED NOT NULL,
  `themengebiet_id` bigint(20) UNSIGNED NOT NULL,
  `funktion_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abteilung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'readonlyuser', 'Read-Only User', '{\"user.show\":false,\"user.create\":false,\"user.edit\":false,\"user.delete\":false,\"user.export\":false,\"persons.show\":true,\"persons.create\":true,\"persons.edit\":false,\"persons.delete\":false,\"persons.export\":false,\"organisations.show\":true,\"organisations.create\":true,\"organisations.edit\":false,\"organisations.delete\":false,\"organisations.export\":false,\"networkpartners.show\":true,\"networkpartners.create\":true,\"networkpartners.edit\":false,\"networkpartners.delete\":false,\"networkpartners.export\":false,\"notes.show\":true,\"notes.create\":true,\"notes.edit\":true,\"notes.delete\":true,\"branchoffice.show\":false,\"branchoffice.create\":false,\"branchoffice.edit\":false,\"branchoffice.delete\":false,\"branchoffice.export\":false,\"city.show\":false,\"city.create\":false,\"city.edit\":false,\"city.delete\":false,\"city.export\":false,\"topic.show\":false,\"topic.create\":false,\"topic.edit\":false,\"topic.delete\":false,\"topic.export\":false,\"salutation.show\":false,\"salutation.create\":false,\"salutation.edit\":false,\"salutation.delete\":false,\"salutation.export\":false,\"titleprefix.show\":false,\"titleprefix.create\":false,\"titleprefix.edit\":false,\"titleprefix.delete\":false,\"titleprefix.export\":false,\"titlesuffix.show\":false,\"titlesuffix.create\":false,\"titlesuffix.edit\":false,\"titlesuffix.delete\":false,\"titlesuffix.export\":false,\"titleawarded.show\":false,\"titleawarded.create\":false,\"titleawarded.edit\":false,\"titleawarded.delete\":false,\"titleawarded.export\":false,\"federalstate.show\":false,\"federalstate.create\":false,\"federalstate.edit\":false,\"federalstate.delete\":false,\"federalstate.export\":false,\"functions.show\":false,\"functions.create\":false,\"functions.edit\":false,\"functions.delete\":false,\"functions.export\":false,\"status.show\":false,\"status.create\":false,\"status.edit\":false,\"status.delete\":false,\"status.export\":false,\"statusperson.show\":false,\"statusperson.create\":false,\"statusperson.edit\":false,\"statusperson.delete\":false,\"statusperson.export\":false,\"category.show\":false,\"category.create\":false,\"category.edit\":false,\"category.delete\":false,\"category.export\":false,\"country.show\":false,\"country.create\":false,\"country.edit\":false,\"country.delete\":false,\"country.export\":false}', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(2, 'user', 'User', '{\"user.show\":false,\"user.create\":false,\"user.edit\":false,\"user.delete\":false,\"user.export\":false,\"persons.show\":true,\"persons.create\":true,\"persons.edit\":true,\"persons.delete\":false,\"persons.export\":true,\"organisations.show\":true,\"organisations.create\":true,\"organisations.edit\":true,\"organisations.delete\":false,\"organisations.export\":true,\"networkpartners.show\":true,\"networkpartners.create\":true,\"networkpartners.edit\":true,\"networkpartners.delete\":false,\"networkpartners.export\":true,\"notes.show\":true,\"notes.create\":true,\"notes.edit\":true,\"notes.delete\":true,\"branchoffice.show\":false,\"branchoffice.create\":false,\"branchoffice.edit\":false,\"branchoffice.delete\":false,\"branchoffice.export\":false,\"city.show\":false,\"city.create\":false,\"city.edit\":false,\"city.delete\":false,\"city.export\":false,\"topic.show\":false,\"topic.create\":false,\"topic.edit\":false,\"topic.delete\":false,\"topic.export\":false,\"salutation.show\":false,\"salutation.create\":false,\"salutation.edit\":false,\"salutation.delete\":false,\"salutation.export\":false,\"titleprefix.show\":false,\"titleprefix.create\":false,\"titleprefix.edit\":false,\"titleprefix.delete\":false,\"titleprefix.export\":false,\"titlesuffix.show\":false,\"titlesuffix.create\":false,\"titlesuffix.edit\":false,\"titlesuffix.delete\":false,\"titlesuffix.export\":false,\"titleawarded.show\":false,\"titleawarded.create\":false,\"titleawarded.edit\":false,\"titleawarded.delete\":false,\"titleawarded.export\":false,\"federalstate.show\":false,\"federalstate.create\":false,\"federalstate.edit\":false,\"federalstate.delete\":false,\"federalstate.export\":false,\"functions.show\":false,\"functions.create\":false,\"functions.edit\":false,\"functions.delete\":false,\"functions.export\":false,\"status.show\":false,\"status.create\":false,\"status.edit\":false,\"status.delete\":false,\"status.export\":false,\"statusperson.show\":false,\"statusperson.create\":false,\"statusperson.edit\":false,\"statusperson.delete\":false,\"statusperson.export\":false,\"category.show\":false,\"category.create\":false,\"category.edit\":false,\"category.delete\":false,\"category.export\":false,\"country.show\":false,\"country.create\":false,\"country.edit\":false,\"country.delete\":false,\"country.export\":false}', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(3, 'superuser', 'Super-User', '{\"user.show\":true,\"user.create\":true,\"user.edit\":true,\"user.delete\":true,\"user.export\":true,\"persons.show\":true,\"persons.create\":true,\"persons.edit\":true,\"persons.delete\":true,\"persons.export\":true,\"organisations.show\":true,\"organisations.create\":true,\"organisations.edit\":true,\"organisations.delete\":true,\"organisations.export\":true,\"networkpartners.show\":true,\"networkpartners.create\":true,\"networkpartners.edit\":true,\"networkpartners.delete\":true,\"networkpartners.export\":true,\"notes.show\":true,\"notes.create\":true,\"notes.edit\":true,\"notes.delete\":true,\"branchoffice.show\":false,\"branchoffice.create\":false,\"branchoffice.edit\":false,\"branchoffice.delete\":false,\"branchoffice.export\":false,\"city.show\":false,\"city.create\":false,\"city.edit\":false,\"city.delete\":false,\"city.export\":false,\"topic.show\":false,\"topic.create\":false,\"topic.edit\":false,\"topic.delete\":false,\"topic.export\":false,\"salutation.show\":false,\"salutation.create\":false,\"salutation.edit\":false,\"salutation.delete\":false,\"salutation.export\":false,\"titleprefix.show\":false,\"titleprefix.create\":false,\"titleprefix.edit\":false,\"titleprefix.delete\":false,\"titleprefix.export\":false,\"titlesuffix.show\":false,\"titlesuffix.create\":false,\"titlesuffix.edit\":false,\"titlesuffix.delete\":false,\"titlesuffix.export\":false,\"titleawarded.show\":false,\"titleawarded.create\":false,\"titleawarded.edit\":false,\"titleawarded.delete\":false,\"titleawarded.export\":false,\"federalstate.show\":false,\"federalstate.create\":false,\"federalstate.edit\":false,\"federalstate.delete\":false,\"federalstate.export\":false,\"functions.show\":false,\"functions.create\":false,\"functions.edit\":false,\"functions.delete\":false,\"functions.export\":false,\"status.show\":false,\"status.create\":false,\"status.edit\":false,\"status.delete\":false,\"status.export\":false,\"statusperson.show\":false,\"statusperson.create\":false,\"statusperson.edit\":false,\"statusperson.delete\":false,\"statusperson.export\":false,\"category.show\":false,\"category.create\":false,\"category.edit\":false,\"category.delete\":false,\"category.export\":false,\"country.show\":false,\"country.create\":false,\"country.edit\":false,\"country.delete\":false,\"country.export\":false}', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(4, 'feeiadmin', 'FEEI Admin', '{\"user.show\":true,\"user.create\":true,\"user.edit\":true,\"user.delete\":true,\"user.export\":true,\"persons.show\":true,\"persons.create\":true,\"persons.edit\":true,\"persons.delete\":true,\"persons.export\":true,\"organisations.show\":true,\"organisations.create\":true,\"organisations.edit\":true,\"organisations.delete\":true,\"organisations.export\":true,\"networkpartners.show\":true,\"networkpartners.create\":true,\"networkpartners.edit\":true,\"networkpartners.delete\":true,\"networkpartners.export\":true,\"notes.show\":true,\"notes.create\":true,\"notes.edit\":true,\"notes.delete\":true,\"branchoffice.show\":true,\"branchoffice.create\":true,\"branchoffice.edit\":true,\"branchoffice.delete\":true,\"branchoffice.export\":true,\"city.show\":true,\"city.create\":true,\"city.edit\":true,\"city.delete\":true,\"city.export\":true,\"topic.show\":true,\"topic.create\":true,\"topic.edit\":true,\"topic.delete\":true,\"topic.export\":true,\"salutation.show\":true,\"salutation.create\":true,\"salutation.edit\":true,\"salutation.delete\":true,\"salutation.export\":true,\"titleprefix.show\":true,\"titleprefix.create\":true,\"titleprefix.edit\":true,\"titleprefix.delete\":true,\"titleprefix.export\":true,\"titlesuffix.show\":true,\"titlesuffix.create\":true,\"titlesuffix.edit\":true,\"titlesuffix.delete\":true,\"titlesuffix.export\":true,\"titleawarded.show\":true,\"titleawarded.create\":true,\"titleawarded.edit\":true,\"titleawarded.delete\":true,\"titleawarded.export\":true,\"federalstate.show\":true,\"federalstate.create\":true,\"federalstate.edit\":true,\"federalstate.delete\":true,\"federalstate.export\":true,\"functions.show\":true,\"functions.create\":true,\"functions.edit\":true,\"functions.delete\":true,\"functions.export\":true,\"status.show\":true,\"status.create\":true,\"status.edit\":true,\"status.delete\":true,\"status.export\":true,\"statusperson.show\":true,\"statusperson.create\":true,\"statusperson.edit\":true,\"statusperson.delete\":true,\"statusperson.export\":true,\"category.show\":true,\"category.create\":true,\"category.edit\":true,\"category.delete\":true,\"category.export\":true,\"country.show\":true,\"country.create\":true,\"country.edit\":true,\"country.delete\":true,\"country.export\":true}', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(5, 'admin', 'Admin (abss)', '{\"user.show\":true,\"user.create\":true,\"user.edit\":true,\"user.delete\":true,\"user.export\":true,\"persons.show\":true,\"persons.create\":true,\"persons.edit\":true,\"persons.delete\":true,\"persons.export\":true,\"organisations.show\":true,\"organisations.create\":true,\"organisations.edit\":true,\"organisations.delete\":true,\"organisations.export\":true,\"networkpartners.show\":true,\"networkpartners.create\":true,\"networkpartners.edit\":true,\"networkpartners.delete\":true,\"networkpartners.export\":true,\"notes.show\":true,\"notes.create\":true,\"notes.edit\":true,\"notes.delete\":true,\"branchoffice.show\":true,\"branchoffice.create\":true,\"branchoffice.edit\":true,\"branchoffice.delete\":true,\"branchoffice.export\":true,\"city.show\":true,\"city.create\":true,\"city.edit\":true,\"city.delete\":true,\"city.export\":true,\"topic.show\":true,\"topic.create\":true,\"topic.edit\":true,\"topic.delete\":true,\"topic.export\":true,\"salutation.show\":true,\"salutation.create\":true,\"salutation.edit\":true,\"salutation.delete\":true,\"salutation.export\":true,\"titleprefix.show\":true,\"titleprefix.create\":true,\"titleprefix.edit\":true,\"titleprefix.delete\":true,\"titleprefix.export\":true,\"titlesuffix.show\":true,\"titlesuffix.create\":true,\"titlesuffix.edit\":true,\"titlesuffix.delete\":true,\"titlesuffix.export\":true,\"titleawarded.show\":true,\"titleawarded.create\":true,\"titleawarded.edit\":true,\"titleawarded.delete\":true,\"titleawarded.export\":true,\"federalstate.show\":true,\"federalstate.create\":true,\"federalstate.edit\":true,\"federalstate.delete\":true,\"federalstate.export\":true,\"functions.show\":true,\"functions.create\":true,\"functions.edit\":true,\"functions.delete\":true,\"functions.export\":true,\"status.show\":true,\"status.create\":true,\"status.edit\":true,\"status.delete\":true,\"status.export\":true,\"statusperson.show\":true,\"statusperson.create\":true,\"statusperson.edit\":true,\"statusperson.delete\":true,\"statusperson.export\":true,\"category.show\":true,\"category.create\":true,\"category.edit\":true,\"category.delete\":true,\"category.export\":true,\"country.show\":true,\"country.create\":true,\"country.edit\":true,\"country.delete\":true,\"country.export\":true}', '2022-10-13 08:22:29', '2022-10-13 08:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(2, 2, '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(3, 3, '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(4, 4, '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(5, 5, '2022-10-13 08:22:29', '2022-10-13 08:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bezeichnung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_person`
--

CREATE TABLE `status_person` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bezeichnung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `themengebiet`
--

CREATE TABLE `themengebiet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bezeichnung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `titel`
--

CREATE TABLE `titel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bezeichnung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `titel_nachgestellt`
--

CREATE TABLE `titel_nachgestellt` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bezeichnung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `titel_verliehen`
--

CREATE TABLE `titel_verliehen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bezeichnung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tx_laender`
--

CREATE TABLE `tx_laender` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `IEBStaatNr` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Bezeichnung` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Bezeichnung_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ISO` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EU` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Arbeitserlaubnis` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Aufenthaltserlaubnis` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tx_laender`
--

INSERT INTO `tx_laender` (`id`, `IEBStaatNr`, `Bezeichnung`, `Bezeichnung_en`, `ISO`, `iban`, `EU`, `Arbeitserlaubnis`, `Aufenthaltserlaubnis`, `created_at`, `updated_at`) VALUES
(1, '93081', 'Österreich', 'Austria', 'AUT', 'AT', '1', '1', '1', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(2, '94225', 'Keine Angabe', 'not specified', 'dd', 'dd', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(3, '94881', 'Afghanistan', 'Afghanistan', 'AFG', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(4, '94882', 'Ägypten', 'Egypt', 'EGY', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(5, '94883', 'Albanien', 'Albania', 'ALB', 'AL', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(6, '94884', 'Algerien', 'Algeria', 'DZA', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(7, '94885', 'Andorra', 'Andorra', 'AND', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(8, '94886', 'Angola', 'Angola', 'AGO', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(9, '94887', 'Antigua und Barbuda', 'Antigua and Barbuda', 'ATG', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(10, '94888', 'Äquatorialguinea', 'Equatorial Guinea', 'GNQ', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(11, '94889', 'Argentinien', 'Argentina', 'ARG', 'AR', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(12, '94890', 'Armenien', 'Armenia', 'ARM', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(13, '94891', 'Aserbaidschan', 'Azerbaijan', 'AZE', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(14, '94892', 'Äthiopien', 'Ethiopia', 'ATH', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(15, '94893', 'Australien', 'Australia', 'AUS', 'AU', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(16, '94894', 'Bahamas', 'Bahamas', 'BHS', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(17, '94895', 'Bahrain', 'Bahrain', 'BHR', 'BH', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(18, '94896', 'Bangladesch', 'Bangladesh', 'BGD', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(19, '94897', 'Barbados', 'Barbados', 'BRB', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(20, '94898', 'Weißrussland (Belarus)', 'Belarus', 'BLR', 'BY', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(21, '94899', 'Belgien', 'Belgium', 'BEL', 'BE', '1', '1', '1', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(22, '94900', 'Belize', 'Belize', 'BLZ', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(23, '94901', 'Benin', 'Benin', 'BEN', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(24, '94902', 'Bhutan', 'Bhutan', 'BTN', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(25, '94903', 'Bolivien', 'Bolivia', 'BOL', 'BO', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(26, '94904', 'Bosnien und Herzegowina', 'Bosnia and Herzegovina', 'BIH', 'BA', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(27, '94905', 'Botswana (Botsuana)', 'Botswana', 'BWA', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(28, '94906', 'Brasilien', 'Brazil', 'BRA', 'BR', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(29, '94907', 'Brunei Darussalam', 'Brunei Darussalam', 'BRN', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(30, '94908', 'Bulgarien', 'Bulgaria', 'BGR', 'BG', '1', '1', '1', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(31, '94909', 'Burkina Faso', 'Burkina Faso', 'BFA', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(32, '94910', 'Burundi', 'Burundi', 'BDI', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(33, '94911', 'Chile', 'Chile', 'CHL', 'CL', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(34, '94912', 'China', 'China', 'CHN', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(35, '94913', 'Costa Rica', 'Costa Rica', 'CRI', 'CR', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(36, '94914', 'Elfenbeinküste (Côte d´Ivoire)', 'Ivory Coast (Côte d´Ivoire)', 'CIV', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(37, '94915', 'Dänemark', 'Denmark', 'DNK', 'DK', '1', '1', '1', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(38, '94916', 'Deutschland', 'Germany', 'DEU', 'DE', '1', '1', '1', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(39, '94917', '', '', '', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(40, '94903', 'Dominica', 'Dominica', 'DME', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(41, '94918', 'Dominikanische Republik', 'Dominican Republic', 'DOM', 'DO', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(42, '94919', 'Dschibuti', 'Djibouti', 'DJI', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(43, '94920', 'Ecuador', 'Ecuador', 'ECU', 'EC', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(44, '94921', 'El Salvador', 'El Salvador', 'SLV', 'SL', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(45, '94922', 'Eritrea', 'Eritrea', 'ERI', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(46, '94923', 'Estland', 'Estonia', 'EST', 'EE', '1', '1', '1', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(47, '94924', 'Fidschi', 'Fiji', 'FJI', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(48, '94925', 'Finnland', 'Finland', 'FIN', 'FI', '1', '1', '1', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(49, '94926', 'Frankreich', 'France', 'FRA', 'FR', '1', '1', '1', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(50, '94927', 'Gabun', 'Gabon', 'GAB', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(51, '94928', 'Gambia', 'Gambia', 'GMB', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(52, '94929', 'Georgien', 'Georgia', 'GEO', 'GE', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(53, '94930', 'Ghana', 'Ghana', 'GHA', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(54, '94931', 'Grenada', 'Grenada', 'GRD', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(55, '94932', 'Griechenland', 'Greece', 'GRC', 'EL', '1', '1', '1', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(56, '94933', 'Guatemala', 'Guatemala', 'GTM', 'GL', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(57, '94934', 'Guinea', 'Guinea', 'GIN', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(58, '94935', 'Guinea-Bissau', 'Guinea-Bissau', 'GNB', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(59, '94936', 'Guyana', 'Guyana', 'GUY', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(60, '94937', 'Haiti', 'Haiti', 'HTI', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(61, '94938', 'Honduras', 'Honduras', 'HND', 'HN', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(62, '94939', 'Indien', 'India', 'IND', 'IN', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(63, '94940', 'Indonesien', 'Indonesia', 'IND', 'ID', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(64, '94941', 'Irak', 'Iraq', 'IRQ', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(65, '94942', 'Iran - Islamische Republik', 'Iran - Islamic Republic', 'IRN', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(66, '94943', 'Irland', 'Ireland', 'IRL', 'IE', '1', '1', '1', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(67, '94944', 'Island', 'Iceland', 'ISL', 'IS', '0', '1', '1', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(68, '94945', 'Israel', 'Israel', 'ISR', 'IL', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(69, '94946', 'Italien', 'Italy', 'ITA', 'IT', '1', '1', '1', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(70, '94947', 'Jamaika', 'Jamaica', 'JAM', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(71, '94948', 'Japan', 'Japan', 'JPN', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(72, '94949', 'Jemen', 'Yemen', 'YEM', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(73, '94950', 'Jordanien', 'Jordan', 'JOR', 'JO', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(74, '94951', 'Kambodscha', 'Cambodia', 'KHM', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(75, '94952', 'Kamerun', 'Cameroon', 'CMR', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(76, '94953', 'Kanada', 'Canada', 'CNA', 'CA', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(77, '94954', 'Kap Verde', 'Cape Verde', 'CPV', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(78, '94955', 'Kasachstan', 'Kazakhstan', 'KAZ', 'KZ', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(79, '94956', 'Katar', 'Qatar', 'QAT', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(80, '94957', 'Kenia', 'Kenya', 'KEN', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(81, '94958', 'Kirgisistan', 'Kyrgyzstan', 'KGZ', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(82, '94959', 'Kiribati', 'Kiribati', 'KIR', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(83, '94960', 'Kolumbien', 'Colombia', 'COL', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(84, '94961', 'Komoren', 'Comoros', 'COM', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(85, '94962', 'Kongo', 'Congo', 'COG', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(86, '94963', 'Kongo - Demokratische Republik', 'Democratic Republic of the Congo', 'COD', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(87, '94964', 'Korea (Nord)- Demokratische Volksrepublik', 'Democratic Peoples Republic of Korea', 'PRK', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(88, '94965', 'Korea (Süd) - Republik', 'Republic of Korea', 'KOR', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(89, '94966', 'Kosovo', 'Kosovo', 'XKX', 'XK', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(90, '94967', 'Kroatien', 'Croatia', 'HRV', 'HR', '1', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(91, '94968', 'Kuba', 'Cuba', 'CUB', '', '0', '0', '0', '2022-10-13 08:22:29', '2022-10-13 08:22:29'),
(92, '94969', 'Kuwait', 'Kuwait', 'KWT', 'KW', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(93, '94970', 'Laos - Demokratische Volksrepublik', 'Lao People s Democratic Republic', 'LAO', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(94, '94971', 'Lesotho', 'Lesotho', 'LSO', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(95, '94972', 'Lettland', 'Latvia', 'LVA', 'LV', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(96, '94973', 'Libanon', 'Lebanon', 'LBN', 'LB', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(97, '94974', 'Liberia', 'Liberia', 'LBR', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(98, '94975', 'Libyen', 'Libya', 'LBY', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(99, '94976', 'Liechtenstein', 'Liechtenstein', 'LIE', 'LI', '0', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(100, '94977', 'Litauen', 'Lithuania', 'LTU', 'LT', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(101, '94978', 'Luxemburg', 'Luxembourg', 'LUX', 'LU', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(102, '94979', 'Madagaskar', 'Madagascar', 'MDG', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(103, '94980', 'Malawi', 'Malawi', 'MWI', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(104, '94981', 'Malaysia', 'Malaysia', 'MYS', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(105, '94903', '', '', '', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(106, '94982', 'Malediven', 'Meldives', 'MDV', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(107, '94983', 'Mali', 'Mali', 'MLI', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(108, '94984', 'Malta', 'Malta', 'MLT', 'ML', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(109, '94985', 'Marokko', 'Morocco', 'MAR', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(110, '94986', 'Marshallinseln', 'Marshall Islands', 'MHL', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(111, '94987', 'Mauretanien', 'Mauritania', 'MRT', 'MR', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(112, '94988', 'Mauritius', 'Mauritius', 'MSU', 'MU', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(113, '94989', 'Mazedonien', 'Macedonia', 'MKD', 'MK', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(114, '94990', 'Mexiko', 'Mexico', 'MEX', 'MX', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(115, '94991', 'Mikronesien - Föderierte Staaten von', 'Federated States of Micronesia', 'FSM', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(116, '94992', 'Moldawien (Rep. Moldau)', 'Republic of Moldova', 'MDA', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(117, '94993', 'Monaco', 'Monaco', 'MCO', 'MC', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(118, '94994', 'Mongolei', 'Mongolia', 'MNG', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(119, '94995', 'Montenegro', 'Montenegro', 'MNE', 'ME', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(120, '94996', 'Mosambik', 'Mozambique', 'MOZ', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(121, '94997', 'Myanmar (Birma)', 'Myanmar', 'MMR', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(122, '94998', 'Namibia', 'Namibia', 'NAM', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(123, '94999', 'Nauru', 'Nauru', 'NRU', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(124, '95000', 'Nepal', 'Nepal', 'NPL', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(125, '95001', 'Neuseeland', 'New Zealand', 'NZL', 'NZ', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(126, '95002', 'Nicaragua', 'Nicaragua', 'NIC', 'NI', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(127, '95003', 'Niederlande', 'Netherlands', 'NLD', 'NL', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(128, '95004', 'Niger', 'Niger', 'NER', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(129, '95005', 'Nigeria', 'Nigeria', 'NGA', 'NG', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(130, '95006', 'Norwegen', 'Norway', 'NOR', 'NO', '0', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(131, '95007', 'Oman', 'Oman', 'OMN', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(132, '95009', 'Pakistan', 'Pakistan', 'PAK', 'PK', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(133, '95010', 'Palau', 'Palau', 'PLW', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(134, '95011', 'Panama', 'Panama', 'PAN', 'PA', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(135, '95012', 'Papua-Neuguinea', 'Papua New-Guinea', 'PNG', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(136, '95013', 'Paraguay', 'Paraguay', 'PRY', 'PY', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(137, '95014', 'Peru', 'Peru', 'PER', 'PE', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(138, '94015', 'Philippinen', 'Philippines', 'PHL', 'PH', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(139, '95016', 'Polen', 'Poland', 'POL', 'PL', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(140, '95017', 'Portugal', 'Portugal', 'PRT', 'PT', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(141, '95018', 'Ruanda', 'Rwanda', 'RWA', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(142, '95019', 'Rumänien', 'Romania', 'ROU', 'RO', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(143, '95020', 'Russische Föderation', 'Russian Federation', 'RUS', 'RU', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(144, '95021', 'Salomonen', 'Solomon Islands', 'SLB', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(145, '95022', 'Sambia', 'Zambia', 'ZMB', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(146, '95023', 'Samoa', 'Samoa', 'WSM', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(147, '95024', 'San Marino', 'San Marino', 'SMR', 'SM', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(148, '95025', 'São Tomé und Príncipe', 'São Tomé and Príncipe', 'STP', 'ST', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(149, '95026', 'Saudi-Arabien', 'Saudi-Arabien', 'SAU', 'SA', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(150, '95027', 'Schweden', 'Sweden', 'SWE', 'SE', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(151, '95028', 'Schweiz', 'Switzerland', 'CHE', 'CH', '0', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(152, '95029', 'Senegal', 'Senegal', 'SEN', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(153, '95030', 'Serbien', 'Serbia', 'SRB', 'RS', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(154, '95031', 'Seychellen', 'Seychelles', 'SYC', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(155, '95032', 'Sierra Leone', 'Sierra Leone', 'SLE', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(156, '95033', 'Simbabwe (Zimbabwe)', 'Zimbabwe', 'ZWE', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(157, '95034', 'Singapur', 'Singapore', 'SGP', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(158, '95035', 'Slowakei', 'Slovakia', 'SVK', 'SV', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(159, '95036', 'Slowenien', 'Slovenia', 'SVN', 'SI', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(160, '95037', 'Somalia', 'Somalia', 'SOM', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(161, '95038', 'Spanien', 'Spain', 'ESP', 'ES', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(162, '95039', 'Sri Lanka', 'Sri Lanka', 'LKA', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(163, '95040', 'St. Kitts und Nevis', 'Saint Kitts and Nevis', 'KNA', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(164, '95041', 'St. Lucia', 'Saint Lucia', 'LCA', 'LC', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(165, '95042', 'St. Vincent und die Grenadinen', 'Saint Vincent and the Grenadines', 'VCT', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(166, '95043', 'Südafrika', 'South Africa', 'ZAF', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(167, '95044', 'Suriname', 'Suriname', 'SUP', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(168, '95045', 'Swasiland', 'Swaziland', 'SWZ', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(169, '95046', 'Syrien - Arabische Republik', 'Syria - Arab Republic', 'SYR', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(170, '95047', 'Tadschikistan', 'Tajikistan', 'TJK', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(171, '95048', 'Tansania - Vereinigte Republik', 'United Republic of Tanzania', 'TZA', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(172, '95049', 'Thailand', 'Thailand', 'THA', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(173, '95050', 'Timor-Leste (Osttimor)', 'Timor-Leste', 'TLS', 'TL', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(174, '95051', 'Togo', 'Togo', 'TGO', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(175, '95052', 'Tonga', 'Tonga', 'TON', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(176, '95053', 'Trinidad und Tobago', 'Trinidad and Tobago', 'TTO', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(177, '95054', 'Tschad', 'Chad', 'TCD', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(178, '95055', 'Tschechische Republik', 'Czech Republic', 'CZE', 'CZ', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(179, '95056', 'Tunesien', 'Tunisia', 'TUN', 'TN', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(180, '95057', 'Türkei', 'Turkey', 'TUR', 'TR', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(181, '95058', 'Turkmenistan', 'Turkmenistan', 'TKM', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(182, '95059', 'Tuvalu', 'Tuvalu', 'TUV', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(183, '95060', 'Uganda', 'Uganda', 'UGA', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(184, '95061', 'Ukraine', 'Ukraine', 'UKR', 'UA', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(185, '95062', 'Ungarn', 'Hungary', 'HUN', 'HU', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(186, '95063', 'Uruguay', 'Uruguay', 'URY', 'UY', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(187, '95064', 'Usbekistan', 'Uzbekistan', 'UZB', 'UZ', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(188, '95065', 'Vanuatu', 'Vanuatu', 'VUT', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(189, '95066', 'Vatikan', 'Vatican', 'VAT', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(190, '95067', 'Venezuela', 'Venezuela', 'VEN', 'VE', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(191, '95068', 'Vereinigte Arabische Emirate', 'United Arab Emirates', 'ARE', 'AE', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(192, '95069', 'Vereinigte Staaten', 'United States', 'USA', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(193, '95070', 'Vereinigtes Königreich Großbritannien', 'United Kingdom of Great Britain', 'GBR', 'GB', '0', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(194, '95071', 'Vietnam', 'Vietnam', 'VNM', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(195, '95072', 'Zentralafrikanische Republik', 'Central African Republic', 'CAF', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(196, '95073', 'Zypern', 'Cyprus', 'CYP', 'CY', '1', '1', '1', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(197, '95074', 'Staatenlos', 'stateless', '', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(198, '95075', 'Unbekannt', 'unknown', '', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(199, '95075', 'Ungeklärt', 'uncertain', '', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(200, '95077', 'Südsudan', 'South Sudan', 'SSD', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(201, '95078', 'Sudan', 'Sudan', 'SDN', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(202, '95079', 'Cook Inseln ', 'Cook Islands', 'COK', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(203, '94912', 'Taiwan (Rep. China)', 'Taiwan', 'TWN', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30'),
(204, '94985', 'Westsahara ', 'Western Sahara', 'ESH', '', '0', '0', '0', '2022-10-13 08:22:30', '2022-10-13 08:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ist_aktivi` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `ist_aktivi`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Readonly', 'User', 'readonlyuser@admin.com', NULL, '$2y$10$GPksDfm3bhXL.CUxk.cve.0loMJEUKMt.4lMTB//c0Qu9UXY4bnwq', 'true', NULL, '2022-10-13 08:22:29', '2022-10-13 08:22:29', NULL),
(2, 'User', 'User', 'user@admin.com', NULL, '$2y$10$Z89Q977C78UicEYnYQutJ.iJiLgxJwd4SaMR9P.rlbWKLukhFAeTW', 'true', NULL, '2022-10-13 08:22:29', '2022-10-13 08:22:29', NULL),
(3, 'Super', 'User', 'superuser@admin.com', NULL, '$2y$10$lHMwAfywY1tEGtvwcF6Fvur1R7rUuXy84vp7WPCvSKZsSGfpDfozK', 'true', NULL, '2022-10-13 08:22:29', '2022-10-13 08:22:29', NULL),
(4, 'FEEI', 'Admin', 'feeiadmin@admin.com', NULL, '$2y$10$5aTLQjNWHrY73NhZI1ySB.N2gnQupptHzS/tTk5c7J7Sl6WWwkRHC', 'true', NULL, '2022-10-13 08:22:29', '2022-10-13 08:22:29', NULL),
(5, 'Admin', '(abss)', 'admin@admin.com', NULL, '$2y$10$I1u.cWxXKAWqnmwIXJv3MuufcurDa8qaMZA3OidXszyG7p7bH7FES', 'true', NULL, '2022-10-13 08:22:29', '2022-10-13 08:22:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_mitglied`
--

CREATE TABLE `user_mitglied` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mitglied_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_organisation`
--

CREATE TABLE `user_organisation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organisation_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_person`
--

CREATE TABLE `user_person` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anrede`
--
ALTER TABLE `anrede`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bundesland`
--
ALTER TABLE `bundesland`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `funktion`
--
ALTER TABLE `funktion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategorie_organisation`
--
ALTER TABLE `kategorie_organisation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitglied`
--
ALTER TABLE `mitglied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitglied_netzwerkpartner`
--
ALTER TABLE `mitglied_netzwerkpartner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mitglied_netzwerkpartner_mitglied_id_foreign` (`mitglied_id`),
  ADD KEY `mitglied_netzwerkpartner_netzwerkpartner_id_foreign` (`netzwerkpartner_id`);

--
-- Indexes for table `mitglied_themen`
--
ALTER TABLE `mitglied_themen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mitglied_themen_mitglied_id_foreign` (`mitglied_id`),
  ADD KEY `mitglied_themen_themengebiet_id_foreign` (`themengebiet_id`);

--
-- Indexes for table `netzwerkpartner`
--
ALTER TABLE `netzwerkpartner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notizen`
--
ALTER TABLE `notizen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation_themen`
--
ALTER TABLE `organisation_themen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisation_themen_organisation_id_foreign` (`organisation_id`),
  ADD KEY `organisation_themen_themengebiet_id_foreign` (`themengebiet_id`);

--
-- Indexes for table `ort`
--
ALTER TABLE `ort`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `person_mitglied`
--
ALTER TABLE `person_mitglied`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_mitglied_person_id_foreign` (`person_id`),
  ADD KEY `person_mitglied_mitglied_id_foreign` (`mitglied_id`);

--
-- Indexes for table `person_netzwerkpartner`
--
ALTER TABLE `person_netzwerkpartner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_netzwerkpartner_person_id_foreign` (`person_id`),
  ADD KEY `person_netzwerkpartner_netzwerkpartner_id_foreign` (`netzwerkpartner_id`);

--
-- Indexes for table `person_organisation`
--
ALTER TABLE `person_organisation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_organisation_person_id_foreign` (`person_id`),
  ADD KEY `person_organisation_organisation_id_foreign` (`organisation_id`);

--
-- Indexes for table `person_themen`
--
ALTER TABLE `person_themen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_themen_person_id_foreign` (`person_id`),
  ADD KEY `person_themen_themengebiet_id_foreign` (`themengebiet_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_person`
--
ALTER TABLE `status_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themengebiet`
--
ALTER TABLE `themengebiet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `titel`
--
ALTER TABLE `titel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titel_nachgestellt`
--
ALTER TABLE `titel_nachgestellt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titel_verliehen`
--
ALTER TABLE `titel_verliehen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tx_laender`
--
ALTER TABLE `tx_laender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_mitglied`
--
ALTER TABLE `user_mitglied`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_mitglied_mitglied_id_foreign` (`mitglied_id`),
  ADD KEY `user_mitglied_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_organisation`
--
ALTER TABLE `user_organisation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_organisation_organisation_id_foreign` (`organisation_id`),
  ADD KEY `user_organisation_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_person`
--
ALTER TABLE `user_person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_person_person_id_foreign` (`person_id`),
  ADD KEY `user_person_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anrede`
--
ALTER TABLE `anrede`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bundesland`
--
ALTER TABLE `bundesland`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funktion`
--
ALTER TABLE `funktion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategorie_organisation`
--
ALTER TABLE `kategorie_organisation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `mitglied`
--
ALTER TABLE `mitglied`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mitglied_netzwerkpartner`
--
ALTER TABLE `mitglied_netzwerkpartner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mitglied_themen`
--
ALTER TABLE `mitglied_themen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `netzwerkpartner`
--
ALTER TABLE `netzwerkpartner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notizen`
--
ALTER TABLE `notizen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organisation_themen`
--
ALTER TABLE `organisation_themen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ort`
--
ALTER TABLE `ort`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person_mitglied`
--
ALTER TABLE `person_mitglied`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person_netzwerkpartner`
--
ALTER TABLE `person_netzwerkpartner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person_organisation`
--
ALTER TABLE `person_organisation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person_themen`
--
ALTER TABLE `person_themen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_person`
--
ALTER TABLE `status_person`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `themengebiet`
--
ALTER TABLE `themengebiet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `titel`
--
ALTER TABLE `titel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `titel_nachgestellt`
--
ALTER TABLE `titel_nachgestellt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `titel_verliehen`
--
ALTER TABLE `titel_verliehen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tx_laender`
--
ALTER TABLE `tx_laender`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_mitglied`
--
ALTER TABLE `user_mitglied`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_organisation`
--
ALTER TABLE `user_organisation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_person`
--
ALTER TABLE `user_person`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mitglied_netzwerkpartner`
--
ALTER TABLE `mitglied_netzwerkpartner`
  ADD CONSTRAINT `mitglied_netzwerkpartner_mitglied_id_foreign` FOREIGN KEY (`mitglied_id`) REFERENCES `mitglied` (`id`),
  ADD CONSTRAINT `mitglied_netzwerkpartner_netzwerkpartner_id_foreign` FOREIGN KEY (`netzwerkpartner_id`) REFERENCES `netzwerkpartner` (`id`);

--
-- Constraints for table `mitglied_themen`
--
ALTER TABLE `mitglied_themen`
  ADD CONSTRAINT `mitglied_themen_mitglied_id_foreign` FOREIGN KEY (`mitglied_id`) REFERENCES `mitglied` (`id`),
  ADD CONSTRAINT `mitglied_themen_themengebiet_id_foreign` FOREIGN KEY (`themengebiet_id`) REFERENCES `themengebiet` (`id`);

--
-- Constraints for table `organisation_themen`
--
ALTER TABLE `organisation_themen`
  ADD CONSTRAINT `organisation_themen_organisation_id_foreign` FOREIGN KEY (`organisation_id`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `organisation_themen_themengebiet_id_foreign` FOREIGN KEY (`themengebiet_id`) REFERENCES `themengebiet` (`id`);

--
-- Constraints for table `person_mitglied`
--
ALTER TABLE `person_mitglied`
  ADD CONSTRAINT `person_mitglied_mitglied_id_foreign` FOREIGN KEY (`mitglied_id`) REFERENCES `mitglied` (`id`),
  ADD CONSTRAINT `person_mitglied_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `person_netzwerkpartner`
--
ALTER TABLE `person_netzwerkpartner`
  ADD CONSTRAINT `person_netzwerkpartner_netzwerkpartner_id_foreign` FOREIGN KEY (`netzwerkpartner_id`) REFERENCES `netzwerkpartner` (`id`),
  ADD CONSTRAINT `person_netzwerkpartner_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `person_organisation`
--
ALTER TABLE `person_organisation`
  ADD CONSTRAINT `person_organisation_organisation_id_foreign` FOREIGN KEY (`organisation_id`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `person_organisation_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `person_themen`
--
ALTER TABLE `person_themen`
  ADD CONSTRAINT `person_themen_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `person_themen_themengebiet_id_foreign` FOREIGN KEY (`themengebiet_id`) REFERENCES `themengebiet` (`id`);

--
-- Constraints for table `user_mitglied`
--
ALTER TABLE `user_mitglied`
  ADD CONSTRAINT `user_mitglied_mitglied_id_foreign` FOREIGN KEY (`mitglied_id`) REFERENCES `mitglied` (`id`),
  ADD CONSTRAINT `user_mitglied_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_organisation`
--
ALTER TABLE `user_organisation`
  ADD CONSTRAINT `user_organisation_organisation_id_foreign` FOREIGN KEY (`organisation_id`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `user_organisation_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_person`
--
ALTER TABLE `user_person`
  ADD CONSTRAINT `user_person_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `user_person_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
