-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2025 at 04:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_test_reminders`
--

CREATE TABLE `appointment_test_reminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('pending','completed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_test_reminders`
--

INSERT INTO `appointment_test_reminders` (`id`, `student_id`, `title`, `appointment_date`, `appointment_time`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'Feaver', '2025-12-18', '01:07:22', 'DSJKFHDNK JHDSKJH DSKJV HSDKJ KDSJHKDJSHDK', 'pending', '2025-12-16 19:38:23', '2025-12-16 19:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `assignment_link` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `assignment_status` enum('pending','complete','submitted','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `student_id`, `title`, `description`, `assignment_link`, `deadline`, `status`, `assignment_status`, `created_at`, `updated_at`) VALUES
(1, 6, 'Math matices', 'Page layouts look better with something in each section. ', 'http://127.0.0.1:8000/assignments/create', '2025-12-10', 'active', 'pending', '2025-12-07 06:04:52', '2025-12-09 17:43:42'),
(2, 6, 'Hindi', 'Page layouts look better with something in each section. ', 'https://www.amazon.in/', '2025-12-18', 'active', 'submitted', '2025-12-07 06:04:52', '2025-12-14 07:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `certificate_file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `title`, `student_id`, `certificate_file`, `created_at`, `updated_at`) VALUES
(1, 'First Division In 10th', 6, 'students/fdUWaxGrgAe9gsva3ZuyNZaaX9DlFAB7YKGE0FUw.jpg', '2025-12-16 19:56:06', '2025-12-16 19:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender_id`, `receiver_id`, `title`, `description`, `path`, `created_at`, `updated_at`) VALUES
(3, 13, 17, 'Hello', 'HI, I am Arun kumar .', 'chatFiles/3bZKrQg7mUExpJYBlzB9GFr3focfCU1KVV7MbQTo.jpg', '2025-12-03 21:50:07', '2025-12-03 21:50:07'),
(4, 17, 13, 'New chat', 'Hello consultant user', 'chatFiles/v8k3dY2J5s6x9rjUCGVhXxeKPKYHJgGSTEPLhkX3.jpg', '2025-12-03 22:01:51', '2025-12-03 22:01:51'),
(5, 17, 13, 'dfkd', 'lkjldkfjlkj lkjsdlkfjslk jlsdkjvlksdjlk csjdlkj', NULL, '2025-12-04 03:36:55', '2025-12-04 03:36:55'),
(6, 17, 13, 'dgdsfd', 'dsfhsda sfasd', NULL, '2025-12-07 16:16:30', '2025-12-07 16:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `chat_files`
--

CREATE TABLE `chat_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `code`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '10th', 'SK0222', NULL, 'active', '2025-08-30 16:11:50', '2025-08-30 16:12:41'),
(4, '11th', 'SA377', NULL, 'active', '2025-08-30 16:15:33', '2025-08-30 16:15:33'),
(5, '12th', 'DH374', NULL, 'active', '2025-08-30 16:15:53', '2025-08-30 16:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `class_bookings`
--

CREATE TABLE `class_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `class_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` enum('pending','confirmed','cancelled','completed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `consultant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `teacher_id`, `school_id`, `consultant_id`, `title`, `description`, `file_path`, `created_at`, `updated_at`) VALUES
(2, 17, 14, 13, 'Math Test not giving review', 'Hello, Principle Your school teacher not give reive on time', NULL, '2025-12-06 17:02:17', '2025-12-06 17:02:17'),
(5, 17, 14, 13, 'fjkhdkj', 'jsdkhaskdahdkshj', NULL, '2025-12-09 17:37:18', '2025-12-09 17:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `consultant_profiles`
--

CREATE TABLE `consultant_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultant_student`
--

CREATE TABLE `consultant_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `consultant_id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultent_student_documents`
--

CREATE TABLE `consultent_student_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscriptions_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`documents`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT 0,
  `consultant_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `duration_hours` int(10) UNSIGNED DEFAULT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'beginner',
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`documents`)),
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `slug`, `created_by`, `class_id`, `description`, `price`, `duration_hours`, `level`, `image`, `video`, `documents`, `is_published`, `created_at`, `updated_at`) VALUES
(4, 'Math', 'math', 4, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishi', 100.00, NULL, 'beginner', 'courses/images/5Ffrob6AlxHGOw4BRzowMZR9ygsCzvolXIWEONq2.png', 'courses/videos/fClDmBy59KKlXOZfrOiUqNoppUcp6KnH5ZhSIE5w.mp4', '[\"courses/documents/dz50BR5k8oT8u2r7LtSz2Pg9fsqoxpQJ4cYN6oPF.pdf\"]', 1, '2025-09-09 05:23:22', '2025-09-09 05:23:22'),
(5, 'History', 'history', NULL, 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by ac', 1000.00, NULL, 'intermediate', 'courses/images/nE9fS9PgPQrDDmTkqk4EuTTra7nHJeEgetgZbKj2.jpg', 'courses/videos/BpnmKq9nE7FxPXz1Rxu2rsCMJ0TtxOlYfCCmtyub.mp4', '[\"courses/documents/JT6rdfJzVcdtxzXb4T6KxBPFBVzYYvkAfQ38KmuO.pdf\", \"courses/documents/IgrcZ64f19E8rAigkTzQYgFwN3q2OG0VXIIPGZuA.pdf\"]', 1, '2025-09-20 23:58:03', '2025-09-21 05:42:23'),
(6, 'yoga', 'yoga', NULL, 1, 'yoga class course', 0.00, NULL, 'beginner', 'courses/images/Mkszvvw7L6dFm4qoHaIFbmettNSm8zP95IirEsop.png', 'courses/videos/cD7lhgaWPxv5XRuZDzJLv6IN4kr5wqSA3ZJQbDHl.mp4', '\"[\\\"courses\\\\/documents\\\\/DRzlrEBU8XiqKowV70uyXopnTkLsOJyZ5McPXMGN.pdf\\\"]\"', 0, '2025-11-13 16:37:49', '2025-11-13 16:37:49'),
(7, 'test', 'test', NULL, 1, 'test test test', 0.00, NULL, 'beginner', 'courses/images/ZAOtmy9Gw3rVISCPFp4NYHiOBnt73HFCOfeM6iHr.png', NULL, '\"[]\"', 0, '2025-11-13 17:13:16', '2025-11-13 17:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan`
--

CREATE TABLE `diet_plan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `shared_by_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `share_date` date NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `valid_upto` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diet_plan`
--

INSERT INTO `diet_plan` (`id`, `student_id`, `shared_by_id`, `title`, `share_date`, `file_path`, `valid_upto`, `created_at`, `updated_at`) VALUES
(1, 6, 13, 'First month died', '2025-12-16', 'students/fdUWaxGrgAe9gsva3ZuyNZaaX9DlFAB7YKGE0FUw.jpg', '2025-12-31', '2025-12-16 16:57:21', '2025-12-16 16:57:21'),
(2, 6, 13, 'Second month died', '2026-01-01', 'students/fdUWaxGrgAe9gsva3ZuyNZaaX9DlFAB7YKGE0FUw.jpg', '2026-01-29', '2025-12-16 16:57:21', '2025-12-16 16:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_consultations`
--

CREATE TABLE `doctor_consultations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `problem` text NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `scheduled_at` datetime NOT NULL,
  `symptoms` text DEFAULT NULL,
  `status` enum('scheduled','completed','cancelled') DEFAULT 'scheduled',
  `feedback` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_consultations`
--

INSERT INTO `doctor_consultations` (`id`, `student_id`, `patient_name`, `problem`, `doctor_name`, `scheduled_at`, `symptoms`, `status`, `feedback`, `created_at`, `updated_at`) VALUES
(2, 6, 'Arun kumar', 'djkcdfnkj', 'Dr.Sanjay', '2025-12-19 01:26:00', 'jlkjlkjlkjl', 'scheduled', NULL, '2025-12-16 12:25:05', '2025-12-16 12:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `exam_report_cards`
--

CREATE TABLE `exam_report_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `exam` varchar(100) DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `marks_obtained` int(11) DEFAULT NULL,
  `max_marks` int(11) DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_report_cards`
--

INSERT INTO `exam_report_cards` (`id`, `student_id`, `created_by`, `exam`, `exam_date`, `subject`, `marks_obtained`, `max_marks`, `grade`, `file_path`, `description`, `created_at`, `updated_at`) VALUES
(1, 6, 13, 'Mid Term Exam ', '2025-12-10', 'Math', 40, 50, 'A', NULL, 'Page layouts look better with something in each section. Web page designers, content writers, and layout artists use lorem ipsum', '2025-12-14 16:25:48', '2025-12-14 16:25:48'),
(2, 6, 13, 'Mid Term Exam ', '2025-12-12', 'English', 40, 50, 'A', NULL, 'Page layouts look better with something in each section. Web page designers, content writers, and layout artists use lorem ipsum', '2025-12-13 16:25:48', '2025-12-13 16:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Teachers', 'Helping nature teachers', 1, '2025-09-03 06:47:44', '2025-09-03 06:47:44'),
(6, 'Doctors', 'Health issue manage', 1, '2025-09-03 06:48:43', '2025-09-03 06:48:43'),
(7, 'Sports', 'All activity related to health', 1, '2025-09-03 06:51:39', '2025-09-03 06:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `lab_reports`
--

CREATE TABLE `lab_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `shared_by_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `share_date` date NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `valid_upto` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_reports`
--

INSERT INTO `lab_reports` (`id`, `student_id`, `shared_by_id`, `title`, `share_date`, `file_path`, `valid_upto`, `created_at`, `updated_at`) VALUES
(1, 6, 13, 'Blood Sugar Report', '2025-12-16', 'students/fdUWaxGrgAe9gsva3ZuyNZaaX9DlFAB7YKGE0FUw.jpg', '2025-12-31', '2025-12-16 16:57:21', '2025-12-16 19:30:06'),
(2, 6, 13, 'Blood test Report', '2026-01-01', 'students/fdUWaxGrgAe9gsva3ZuyNZaaX9DlFAB7YKGE0FUw.jpg', '2026-01-29', '2025-12-16 16:57:21', '2025-12-16 19:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_07_10_131016_create_sessions_table', 1),
(7, '2025_08_05_165540_create_products_table', 2),
(8, '2025_08_29_023431_create_roles_table', 3),
(9, '2025_08_30_132718_create_classes_table', 4),
(10, '2025_08_30_132857_create_students_table', 5),
(11, '2025_08_30_132737_create_sections_table', 6),
(12, '2025_08_31_041353_create_permissions_table', 7),
(13, '2025_07_10_145218_create_sessions_table', 8),
(14, '2025_09_01_200529_create_consultant_profiles_table', 8),
(15, '2025_09_01_200657_create_school_profiles_table', 8),
(16, '2025_09_01_200743_create_teacher_profiles_table', 8),
(17, '2025_09_01_200818_create_plans_table', 8),
(18, '2025_09_01_200844_create_student_subscriptions_table', 8),
(19, '2025_09_01_200913_create_addons_table', 8),
(20, '2025_09_01_200935_create_student_addons_table', 8),
(21, '2025_09_01_201055_create_teacher_availability_table', 8),
(22, '2025_09_01_201144_create_class_bookings_table', 8),
(23, '2025_09_03_172409_create_features_table', 9),
(24, '2025_09_07_031121_create_courses_table', 10),
(25, '2025_09_07_033604_add_class_id_to_courses_table', 11),
(26, '2025_09_07_050822_add_created_by_to_courses_table', 12),
(27, '2025_09_15_165331_create_school_teachers_table', 13),
(28, '2025_09_19_164944_create_teacher_details_table', 14),
(29, '2025_09_20_063841_create_consultant_student_table', 15),
(30, '2025_09_20_071601_add_consultant_id_to_student_subscriptions_table', 16),
(31, '2025_09_21_070748_create_consultent_student_documents_table', 17),
(32, '2025_09_24_032723_add_created_by_and_school_ids_to_students_table', 18),
(33, '2025_09_25_162157_create_parent_call_summaries_table', 19),
(34, '2025_09_28_031144_create_reviews_table', 20),
(35, '2025_11_16_090322_questionnaires', 21),
(36, '2025_11_30_140709_create_student_data_performances_table', 22),
(37, '2025_12_02_161345_create_chat_files_table', 23),
(38, '2025_12_02_161312_create_chats_table', 24),
(39, '2025_12_06_214422_create_complains_table', 25),
(41, '2025_12_07_092938_create_assignments_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `parent_call_summaries`
--

CREATE TABLE `parent_call_summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `consultant_id` bigint(20) UNSIGNED NOT NULL,
  `summary` text DEFAULT NULL,
  `attachments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attachments`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `can_view` tinyint(1) NOT NULL DEFAULT 0,
  `can_edit` tinyint(1) NOT NULL DEFAULT 0,
  `can_delete` tinyint(1) NOT NULL DEFAULT 0,
  `can_show` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `user_id`, `role_id`, `can_view`, `can_edit`, `can_delete`, `can_show`, `created_at`, `updated_at`) VALUES
(2, 4, 1, 1, 1, 1, 0, '2025-08-30 18:34:06', '2025-11-16 01:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`course_id`)),
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration_days` int(11) NOT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `course_id`, `name`, `price`, `duration_days`, `features`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Silver', 100.00, 60, '[\"5\"]', '2025-09-03 07:16:01', '2025-09-03 07:16:01'),
(2, '[\"4\"]', 'Gold', 200.00, 90, '[\"6\", \"7\"]', '2025-09-03 07:16:33', '2025-09-09 05:55:23'),
(3, '[\"4\"]', 'Platinum', 300.00, 360, '[\"5\", \"6\", \"7\"]', '2025-09-03 07:17:40', '2025-09-09 05:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `consultant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `status` enum('pending_review','approved','rejected','published') NOT NULL DEFAULT 'pending_review',
  `consultant_remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `teacher_id`, `school_id`, `student_id`, `consultant_id`, `title`, `description`, `file_path`, `status`, `consultant_remark`, `created_at`, `updated_at`) VALUES
(1, 17, 14, 6, 13, 'new data', 'kjdhskjfh kjdhv ksdhv kjfh kjdsh jkdhs ksjhskdjk', NULL, 'approved', NULL, '2025-11-27 21:52:44', '2025-11-27 21:52:44'),
(3, 17, 14, 6, 13, 'Math Data review', 'sjhskj hskdjh kdjfh kjdshdkcj hsdck j hckjhask', NULL, 'approved', NULL, '2025-12-01 10:57:51', '2025-12-01 11:27:50'),
(4, 17, 14, 6, 13, 'Math', 'dgkfjfksjfkdl', NULL, 'approved', NULL, '2025-12-01 11:37:52', '2025-12-08 03:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `query` text DEFAULT NULL,
  `status` enum('open','completed') NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super-admin', '2025-08-29 16:47:30', '2025-08-29 16:47:30'),
(2, 'Admin', 'admin', '2025-08-29 16:54:20', '2025-08-29 16:54:20'),
(3, 'Consultant', 'consultant', '2025-08-29 16:55:45', '2025-08-29 16:55:45'),
(4, 'School', 'school', '2025-08-29 16:56:52', '2025-08-29 16:56:52'),
(5, 'School Teacher', 'school-teacher', '2025-08-29 16:57:05', '2025-08-29 16:57:05'),
(6, 'Individual Teacher', 'individual-teacher', '2025-08-29 16:57:23', '2025-08-29 16:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_code` varchar(50) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `additional_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_info`)),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_profiles`
--

CREATE TABLE `school_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_teachers`
--

CREATE TABLE `school_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`teacher_ids`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_teachers`
--

INSERT INTO `school_teachers` (`id`, `school_id`, `teacher_ids`, `created_at`, `updated_at`) VALUES
(6, 14, '[\"15\",\"17\"]', '2025-11-18 16:06:30', '2025-11-27 11:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `room_no` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `class_id`, `name`, `room_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', '101', 'active', '2025-08-30 16:20:33', '2025-08-30 16:20:33'),
(2, 4, 'B', '102', 'active', '2025-08-30 16:23:43', '2025-08-30 16:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('94HJAYhVmjWtrqRx2hPu422DgrO3Acd1mMie5l7I', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVzVuWGlNWGxuVzdCdHFZZ1BTbGRFb0tQRnI5dTJBVVljTU9Ra1lHeiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc3R1ZGVudC9jZXJ0aWZpY2F0ZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU0OiJsb2dpbl9zdHVkZW50XzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njt9', 1765915008),
('nC87sDLqLLpwZC6g85a7Uuy7MvfqsU1tBAyXYg87', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQkZ5VFpZdjZxaEF1SXdUYkFqV0dlVk1yQUFRbUREVVpaNUtxSUY1dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9jbGFzc3Jvb20tcmVwb3J0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1NDoibG9naW5fc3R1ZGVudF81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7fQ==', 1765908686),
('vInCF8PXMOlc27usg8VLtyOJG4M3z891tvyHP2RA', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRnNZbXpFZnF5STlobVpEcERqbHdER0JtU3Vwbk1hRTNpRDdCWjRqdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9zdHVkZW50L2RvY3Rvci1jb25zdWx0YXRpb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU0OiJsb2dpbl9zdHVkZW50XzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njt9', 1765911181),
('wBd4489tjanmKV4q4BGkjqmGlVHBYwKjn326lHew', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieEszZTN0ZUVqWFBNeXZmNDF4RUZyQVo1UVdmaXdiMExVYm53YkRnbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1765908487);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `consultant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `alternate_phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_phone` varchar(20) DEFAULT NULL,
  `guardian_email` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive','graduated','suspended') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `height` varchar(100) DEFAULT NULL,
  `weight` varchar(100) DEFAULT NULL,
  `blood_group` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `created_by`, `consultant_id`, `password`, `first_name`, `last_name`, `middle_name`, `gender`, `date_of_birth`, `email`, `phone`, `alternate_phone`, `address`, `city`, `state`, `country`, `postal_code`, `father_name`, `mother_name`, `guardian_name`, `guardian_phone`, `guardian_email`, `profile_image`, `status`, `created_at`, `updated_at`, `deleted_at`, `height`, `weight`, `blood_group`) VALUES
(6, 4, 13, '$2y$10$36TGjI2LFKKFf04YApTfkOQIWpw1xG5O7lWDtfSUG6Yu2xnY4M.ky', 'New', 'Student', NULL, NULL, '2006-02-07', 'student@gmail.com', '9900990099', '9889877778', 'Aonla Bareilly UP', 'Bareilly', 'Uttar pradesh', 'India', '243303', 'Veerandra singh', 'AK', 'FSS', '9048590530', 'ddk@gmail.com', 'students/GVmwDOcdlsOj4wsvAuu8Im0BCRRBkjNzMKKA3aX9.jpg', 'active', '2025-11-16 16:05:46', '2025-12-16 14:12:54', NULL, '20.53', '50.32', 'A+'),
(7, 4, 13, '$2a$12$BSMuOFsyPAAFPhwFxj0Q2eSx1.0z7F2gNcSfZWTYHo8ebF/kxyrLa', 'Aman', 'Gupta', NULL, NULL, NULL, 'aman.gupta@gmail.com', '8899988999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2025-11-23 15:31:36', '2025-11-23 17:19:36', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_academic_sessions`
--

CREATE TABLE `student_academic_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `consultant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `session_year` varchar(20) NOT NULL,
  `admission_number` varchar(255) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `roll_number` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_academic_sessions`
--

INSERT INTO `student_academic_sessions` (`id`, `student_id`, `school_id`, `class_id`, `section_id`, `consultant_id`, `teacher_id`, `session_year`, `admission_number`, `admission_date`, `roll_number`, `start_date`, `end_date`, `remarks`, `created_at`, `updated_at`) VALUES
(4, 6, 14, 1, 1, NULL, NULL, '2025-2026', NULL, NULL, '19ESK001', '2025-11-17', NULL, NULL, '2025-11-16 16:05:46', '2025-11-16 16:05:46'),
(5, 7, 14, 1, 1, NULL, NULL, '2025-2026', NULL, NULL, '19ESK002', '2025-11-24', NULL, NULL, '2025-11-23 15:31:36', '2025-11-23 15:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `student_addons`
--

CREATE TABLE `student_addons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `addon_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_data_performances`
--

CREATE TABLE `student_data_performances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `questionnaires_id` bigint(20) UNSIGNED NOT NULL,
  `academic_performance` tinyint(4) DEFAULT NULL,
  `competition` tinyint(4) DEFAULT NULL,
  `consistency` tinyint(4) DEFAULT NULL,
  `test_preparedness` tinyint(4) DEFAULT NULL,
  `class_engagement` tinyint(4) DEFAULT NULL,
  `subject_understanding` tinyint(4) DEFAULT NULL,
  `homework` tinyint(4) DEFAULT NULL,
  `grasping_ability` tinyint(4) DEFAULT NULL,
  `retention_power` tinyint(4) DEFAULT NULL,
  `conceptual_clarity` tinyint(4) DEFAULT NULL,
  `attention_span` tinyint(4) DEFAULT NULL,
  `learning_speed` tinyint(4) DEFAULT NULL,
  `peer_interaction` tinyint(4) DEFAULT NULL,
  `discipline` tinyint(4) DEFAULT NULL,
  `respect_for_authority` tinyint(4) DEFAULT NULL,
  `motivation_level` tinyint(4) DEFAULT NULL,
  `response_to_feedback` tinyint(4) DEFAULT NULL,
  `stamina` tinyint(4) DEFAULT NULL,
  `participation_in_sports` tinyint(4) DEFAULT NULL,
  `teamwork_in_games` tinyint(4) DEFAULT NULL,
  `fitness_level` tinyint(4) DEFAULT NULL,
  `interest_in_activities` tinyint(4) DEFAULT NULL,
  `initiative_in_projects` tinyint(4) DEFAULT NULL,
  `curiosity_level` tinyint(4) DEFAULT NULL,
  `problem_solving` tinyint(4) DEFAULT NULL,
  `extra_curricular` tinyint(4) DEFAULT NULL,
  `idea_generation` tinyint(4) DEFAULT NULL,
  `maths` tinyint(4) DEFAULT NULL,
  `science` tinyint(4) DEFAULT NULL,
  `english` tinyint(4) DEFAULT NULL,
  `social_studies` tinyint(4) DEFAULT NULL,
  `computer_science` tinyint(4) DEFAULT NULL,
  `suggestions` text DEFAULT NULL,
  `attachment_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_data_performances`
--

INSERT INTO `student_data_performances` (`id`, `questionnaires_id`, `academic_performance`, `competition`, `consistency`, `test_preparedness`, `class_engagement`, `subject_understanding`, `homework`, `grasping_ability`, `retention_power`, `conceptual_clarity`, `attention_span`, `learning_speed`, `peer_interaction`, `discipline`, `respect_for_authority`, `motivation_level`, `response_to_feedback`, `stamina`, `participation_in_sports`, `teamwork_in_games`, `fitness_level`, `interest_in_activities`, `initiative_in_projects`, `curiosity_level`, `problem_solving`, `extra_curricular`, `idea_generation`, `maths`, `science`, `english`, `social_studies`, `computer_science`, `suggestions`, `attachment_path`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 6, 5, 7, NULL, NULL, '2025-11-30 09:36:27', '2025-11-30 09:36:27'),
(6, 3, 6, 5, 3, 7, 4, 7, 4, 0, 0, 0, 0, 0, 6, 0, 0, 6, 0, 4, 7, 0, 4, 0, 4, 6, 0, 0, 5, 0, 0, 0, 0, 5, 'dfgfmkldj lkdsjfl kxjsdlkvjclfksj lksdjvlkdjlxcjsl kcjdfl jdfl', 'questionnaires/wGgqDX48jgbS1tgYgK7DJM4v77NDlYcMKxgsQYXP.pdf', '2025-12-01 11:27:50', '2025-12-01 11:27:50'),
(7, 4, 3, 7, 4, 8, 4, 8, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, '2025-12-01 11:38:48', '2025-12-08 03:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `student_subscriptions`
--

CREATE TABLE `student_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `consultant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_subscriptions`
--

INSERT INTO `student_subscriptions` (`id`, `student_id`, `consultant_id`, `plan_id`, `start_date`, `end_date`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 6, 13, 1, '2025-11-15', '2025-12-31', 1, '2025-11-22 09:55:22', '2025-11-22 09:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_availabilities`
--

CREATE TABLE `teacher_availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `day_of_week` tinyint(3) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_details`
--

CREATE TABLE `teacher_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `subject_specialization` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `number_of_hours` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_feedbacks`
--

CREATE TABLE `teacher_feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_feedbacks`
--

INSERT INTO `teacher_feedbacks` (`id`, `subject`, `feedback`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Math', 'Student Improving in this subject', 13, '2025-12-14 11:45:14', '2025-12-14 11:45:14'),
(2, 'Hindi', 'Student Improving in this subject', 13, '2025-12-14 11:45:14', '2025-12-14 11:45:14'),
(3, 'English', 'Student Improving in this subject', 13, '2025-12-14 11:45:14', '2025-12-14 11:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_profiles`
--

CREATE TABLE `teacher_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('school','freelancer') NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `phone_number`, `role_id`, `created_by`) VALUES
(4, 'Super Admin', 'superadmin@gmail.com', NULL, '$2y$10$bMYgZ3vG7pzXqCXIHqBePeeVmKVu6VRkrUcqkzftpMp0fK2pFR0sm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-28 14:24:46', '2025-11-08 20:55:23', '9876543210', 1, NULL),
(12, 'Admin', 'admin@gmail.com', NULL, '$2y$10$ohNh0CNixcpraUVdfvoRSu8xYZrP/4HrfpO2U1w6XdexWw3Ar61Ba', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-16 01:31:42', '2025-11-16 01:31:42', '9876543210', 2, NULL),
(13, 'Consultant', 'consultant@gmail.com', NULL, '$2y$10$rc.wkSbHhJxnhh.LRBqBYulzf6B0q5FPxRWsVljM14c9EOAu72WoS', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-16 01:32:04', '2025-11-16 01:32:04', '1234567890', 3, NULL),
(14, 'D.R.M Inter collage jaipur Rajasthan', 'school@gmail.com', NULL, '$2y$10$w9moZUPCzXlT89QIRhYgu.tpbiFOh4bnvpTFopMGIzE/JTLiPrL5e', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-16 01:32:26', '2025-11-27 11:43:37', '1234567899', 4, NULL),
(15, 'School Teacher', 'schoolteacher@gmail.com', NULL, '$2y$10$7kCrsECcb71OBKpDQEQU9.fALUQE0zocLffvgWXn7ADj7rufgwNcS', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-16 01:32:55', '2025-11-16 01:32:55', '1234567880', 5, NULL),
(16, 'Individual Teacher', 'individualteacher@gmail.com', NULL, '$2y$10$IWmQs6NyxOe/5qrFxmR9nOiTFVPyP1Rf8DXNGZ15QIHfjTwJlewLy', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-16 01:33:29', '2025-11-16 01:33:29', '1234567098', 6, NULL),
(17, 'Sanjay Teacher', 'sanjay@gmail.com', NULL, '$2y$10$36TGjI2LFKKFf04YApTfkOQIWpw1xG5O7lWDtfSUG6Yu2xnY4M.ky', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-27 11:55:43', '2025-11-27 11:55:43', '5758348349', 5, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_test_reminders`
--
ALTER TABLE `appointment_test_reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reminder_student` (`student_id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_student_id_foreign` (`student_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_receiver_id_foreign` (`receiver_id`),
  ADD KEY `chats_sender_id_receiver_id_index` (`sender_id`,`receiver_id`);

--
-- Indexes for table `chat_files`
--
ALTER TABLE `chat_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classes_code_unique` (`code`);

--
-- Indexes for table `class_bookings`
--
ALTER TABLE `class_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_bookings_student_id_foreign` (`student_id`),
  ADD KEY `class_bookings_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complains_teacher_id_foreign` (`teacher_id`),
  ADD KEY `complains_school_id_foreign` (`school_id`),
  ADD KEY `complains_consultant_id_foreign` (`consultant_id`);

--
-- Indexes for table `consultant_profiles`
--
ALTER TABLE `consultant_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultant_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `consultant_student`
--
ALTER TABLE `consultant_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultant_student_student_id_foreign` (`student_id`),
  ADD KEY `consultant_student_consultant_id_foreign` (`consultant_id`),
  ADD KEY `consultant_student_subscription_id_foreign` (`subscription_id`);

--
-- Indexes for table `consultent_student_documents`
--
ALTER TABLE `consultent_student_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultent_student_documents_subscriptions_id_foreign` (`subscriptions_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`),
  ADD KEY `courses_class_id_foreign` (`class_id`),
  ADD KEY `courses_created_by_foreign` (`created_by`);

--
-- Indexes for table `diet_plan`
--
ALTER TABLE `diet_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_diet_student` (`student_id`),
  ADD KEY `fk_diet_shared_by` (`shared_by_id`);

--
-- Indexes for table `doctor_consultations`
--
ALTER TABLE `doctor_consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_report_cards`
--
ALTER TABLE `exam_report_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_reports`
--
ALTER TABLE `lab_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_diet_student` (`student_id`),
  ADD KEY `fk_diet_shared_by` (`shared_by_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_call_summaries`
--
ALTER TABLE `parent_call_summaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_call_summaries_consultant_id_foreign` (`consultant_id`),
  ADD KEY `parent_call_summaries_student_id_foreign` (`student_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_user_id_foreign` (`user_id`),
  ADD KEY `permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questionnaires_teacher_id_foreign` (`teacher_id`),
  ADD KEY `questionnaires_school_id_foreign` (`school_id`),
  ADD KEY `questionnaires_student_id_foreign` (`student_id`),
  ADD KEY `questionnaires_consultant_id_foreign` (`consultant_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_student_id_foreign` (`student_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_code` (`school_code`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `school_profiles`
--
ALTER TABLE `school_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `school_teachers`
--
ALTER TABLE `school_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_teachers_school_id_foreign` (`school_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_class_id_foreign` (`class_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_created_by_foreign` (`created_by`),
  ADD KEY `students_consultant_id_foreign` (`consultant_id`);

--
-- Indexes for table `student_academic_sessions`
--
ALTER TABLE `student_academic_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `consultant_id` (`consultant_id`),
  ADD KEY `student_academic_sessions_section_id_foreign` (`section_id`),
  ADD KEY `fk_school_user` (`school_id`);

--
-- Indexes for table `student_addons`
--
ALTER TABLE `student_addons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_addons_student_id_foreign` (`student_id`),
  ADD KEY `student_addons_addon_id_foreign` (`addon_id`);

--
-- Indexes for table `student_data_performances`
--
ALTER TABLE `student_data_performances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_data_performances_questionnaires_id_foreign` (`questionnaires_id`);

--
-- Indexes for table `student_subscriptions`
--
ALTER TABLE `student_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_subscriptions_student_id_foreign` (`student_id`),
  ADD KEY `student_subscriptions_plan_id_foreign` (`plan_id`),
  ADD KEY `student_subscriptions_consultant_id_foreign` (`consultant_id`);

--
-- Indexes for table `teacher_availabilities`
--
ALTER TABLE `teacher_availabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_availability_teacher_id_foreign` (`user_id`) USING BTREE;

--
-- Indexes for table `teacher_details`
--
ALTER TABLE `teacher_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `teacher_feedbacks`
--
ALTER TABLE `teacher_feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_teacher_feedbacks_created_by` (`created_by`);

--
-- Indexes for table `teacher_profiles`
--
ALTER TABLE `teacher_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_profiles_user_id_foreign` (`user_id`),
  ADD KEY `teacher_profiles_school_id_foreign` (`school_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment_test_reminders`
--
ALTER TABLE `appointment_test_reminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat_files`
--
ALTER TABLE `chat_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class_bookings`
--
ALTER TABLE `class_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `consultant_profiles`
--
ALTER TABLE `consultant_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultant_student`
--
ALTER TABLE `consultant_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consultent_student_documents`
--
ALTER TABLE `consultent_student_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diet_plan`
--
ALTER TABLE `diet_plan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_consultations`
--
ALTER TABLE `doctor_consultations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_report_cards`
--
ALTER TABLE `exam_report_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lab_reports`
--
ALTER TABLE `lab_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `parent_call_summaries`
--
ALTER TABLE `parent_call_summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_profiles`
--
ALTER TABLE `school_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_teachers`
--
ALTER TABLE `school_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_academic_sessions`
--
ALTER TABLE `student_academic_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_addons`
--
ALTER TABLE `student_addons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_data_performances`
--
ALTER TABLE `student_data_performances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_subscriptions`
--
ALTER TABLE `student_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_availabilities`
--
ALTER TABLE `teacher_availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher_details`
--
ALTER TABLE `teacher_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_feedbacks`
--
ALTER TABLE `teacher_feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_profiles`
--
ALTER TABLE `teacher_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment_test_reminders`
--
ALTER TABLE `appointment_test_reminders`
  ADD CONSTRAINT `fk_reminder_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_bookings`
--
ALTER TABLE `class_bookings`
  ADD CONSTRAINT `class_bookings_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_bookings_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `complains`
--
ALTER TABLE `complains`
  ADD CONSTRAINT `complains_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `complains_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `complains_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `consultant_profiles`
--
ALTER TABLE `consultant_profiles`
  ADD CONSTRAINT `consultant_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `consultant_student`
--
ALTER TABLE `consultant_student`
  ADD CONSTRAINT `consultant_student_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `consultant_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `consultant_student_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `student_subscriptions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `consultent_student_documents`
--
ALTER TABLE `consultent_student_documents`
  ADD CONSTRAINT `consultent_student_documents_subscriptions_id_foreign` FOREIGN KEY (`subscriptions_id`) REFERENCES `student_subscriptions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `courses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `diet_plan`
--
ALTER TABLE `diet_plan`
  ADD CONSTRAINT `fk_diet_shared_by` FOREIGN KEY (`shared_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_diet_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_report_cards`
--
ALTER TABLE `exam_report_cards`
  ADD CONSTRAINT `exam_report_cards_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_report_cards_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parent_call_summaries`
--
ALTER TABLE `parent_call_summaries`
  ADD CONSTRAINT `parent_call_summaries_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parent_call_summaries_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD CONSTRAINT `questionnaires_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `questionnaires_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questionnaires_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questionnaires_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `school_profiles`
--
ALTER TABLE `school_profiles`
  ADD CONSTRAINT `school_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `school_teachers`
--
ALTER TABLE `school_teachers`
  ADD CONSTRAINT `school_teachers_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `students_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `student_academic_sessions`
--
ALTER TABLE `student_academic_sessions`
  ADD CONSTRAINT `fk_school_user` FOREIGN KEY (`school_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `student_academic_sessions_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_academic_sessions_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_academic_sessions_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `student_academic_sessions_ibfk_4` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `student_academic_sessions_ibfk_5` FOREIGN KEY (`consultant_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `student_academic_sessions_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `student_addons`
--
ALTER TABLE `student_addons`
  ADD CONSTRAINT `student_addons_addon_id_foreign` FOREIGN KEY (`addon_id`) REFERENCES `addons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_addons_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_data_performances`
--
ALTER TABLE `student_data_performances`
  ADD CONSTRAINT `student_data_performances_questionnaires_id_foreign` FOREIGN KEY (`questionnaires_id`) REFERENCES `questionnaires` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_subscriptions`
--
ALTER TABLE `student_subscriptions`
  ADD CONSTRAINT `fk_student_subscription_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_subscriptions_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `student_subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_subscriptions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_availabilities`
--
ALTER TABLE `teacher_availabilities`
  ADD CONSTRAINT `teacher_availability_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_details`
--
ALTER TABLE `teacher_details`
  ADD CONSTRAINT `teacher_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_feedbacks`
--
ALTER TABLE `teacher_feedbacks`
  ADD CONSTRAINT `fk_teacher_feedbacks_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_profiles`
--
ALTER TABLE `teacher_profiles`
  ADD CONSTRAINT `teacher_profiles_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `teacher_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
