-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2024 at 11:15 AM
-- Server version: 8.0.36-cll-lve
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kapahrco_twoday`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `section1_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section1_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `section2_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `section2_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section2_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `description`, `section1_image`, `section1_description`, `section2_description`, `section2_image`, `section2_video`, `created_at`, `updated_at`) VALUES
(1, 'Tentang Kami', 'Madrasah Aliyah Putri An-Nur berdiri dibawah naungan Yayasan Pendidikan dan Dakwah Islam Jagasatru (YPDIJ).', 'D5RNVTwkDKiJOF3mUieRBJpJ106pRVXGxnzXXX0H.jpg', 'Dari kelebihan diatas Madrasah Aliyah Putri An-Nur Kota Cirebon dapat bersaing dan berkembang baik secara ilmu pengetahuan dan ilmu keagamaan.', 'Madrasah Aliyah Putri An-Nur Kota Cirebon merupakan Lembaga pendidikan dibawah naungan Yayasan Pendidikan dan Dakwah Islam Jagasatru (YPDIJ) Kota Cirebon. Sekolah khusus putri yang sistem pendidikan kurtilas yang dipadukan dengan kurikulum Pondok Pesantren berbasis Multimedia. Madrasah Aliyah Putri An-Nur Kota Cirebon berlokasi di Jln. Pangeran Drajat, Kecamatan Kesambi, Jagasatru, Kota Cirebon.', 'po.jpg', 'oUlGTR6GIcHjVxQGfREAfQJOdLXg8TRp0YJtWFSJ.mp4', '2024-05-25 12:44:50', '2024-05-25 21:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('fahranlubis.nf@gmail.com|127.0.0.1', 'i:2;', 1716666361),
('fahranlubis.nf@gmail.com|127.0.0.1:timer', 'i:1716666361;', 1716666361);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'PPJ.png', NULL, NULL),
(2, 'LOGOMA.png', NULL, NULL),
(3, 'LOGOKEMENAG.png', NULL, NULL),
(4, 'LOGOMI.png', NULL, NULL),
(5, 'LOGOKOTA.png', NULL, NULL),
(6, 'LOGOMTS.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ekskuls`
--

CREATE TABLE `ekskuls` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ekskuls`
--

INSERT INTO `ekskuls` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Engslih Club', 'Engslih Club merupakan Ekstrakurikuler yang menyediakan pelatihan Bahasa Inggris. Kegiatan ini dapat menumbuhkan dan meningkatkan keahlian siswa dalam berbicara, mendengar dan menulis Bahasa Inggris.', 'englis club.jpg', NULL, NULL),
(2, 'Pramuka MAPAN', 'Gerakan Pramuka merupakan organisasi yang menyelenggarakan pendidikan kepaduan nasional nonformal. Kegiatan Pramuka dilaksanakan dengan berbagai kegiatan menarik, sehat, menyenangkan dan umumnya dilaksanakan di tempat terbuka.', 'peramuka mapan.jpg', NULL, NULL),
(3, 'BTQ MAPAN', 'BTQ Mapan merupakan kegiatan Ekstrakurikuler yang mempelajari dan mendalami Ilmu dan Seni Al-Qur\'an, seperti Qira\'ati, kaligrafi, tajwid, hafalan Al-Qur\'an dan lain sebagainya', 'BTQ Mapan.jpg', NULL, NULL),
(4, 'Hadroh MAPAN', 'Hadroh MAPAN merupakan kegiatan Ekstrakurikuler yang mempelajari seni musik Hadroh. Seni musik hadrah berisi lantunan pujian atau sholawat Nabi Muhammad SAW, yang diiringi dengan alat musik seperti rebana, bass, genjring dan sebagainya.', 'hadroh mapan.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ekskul_pages`
--

CREATE TABLE `ekskul_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ekskul_pages`
--

INSERT INTO `ekskul_pages` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Ekstrakurikuler', 'Ekstrakurikuler merupakan kegiatan yang diselenggarakan oleh unit sekolah yang dirancang secara khusus sesuai dengan minat dan bakat siswa. Fungsi kegiatan Ekstrakurikuler sendiri sebagai bagian dari pengembangan minat dan bakat, memperluas pengalaman komunikasi, relaksasi dan persiapan jenjang karir di masa depan.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `description`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Ruang Belajar yang Representative', 'Ruangan belajar yang luas dan nyaman dapat menampung kurang lebih 40 siswa perkelasnya.', 'bi-clock-history', NULL, NULL),
(2, 'Hotspot Area', 'Madrasah Aliyah Putri An-Nur memiliki hotspot area yang dapat mendukung kegiatan belajar siswa dalam mengerjakan tugas.', 'bi-broadcast', NULL, NULL),
(3, 'Pembelajaran Menggunakan Media Infocus dan Multimedia', 'Madrasah Aliyah Putri An-Nur Kota Cirebon memiliki 3 ruang kelas, masing-masing kelas memiliki fasilitas belajar seperti Infokus sehingga kegiatan belajar mengajar tidak membosankan dan nyaman.', 'bi-easel', NULL, NULL),
(4, 'Koperasi Sekolah', 'Peran Koperasi Sekolah dapat membantu siswa dalam kegiatan belajar mengajar. Unit ini bertujuan melayani kebutuhan pokok siswa serta melatih siswa untuk bertanggung jawab, bekerjasama dan jujur.', 'bi-bounding-box-circles', NULL, NULL),
(5, 'Lab Komputer', 'Madrasah Aliyah Putri An-Nur Kota Cirebon memiliki Lab Komputer. Selain belajar ilmu agama dan sains, siswa juga dapat mempelajari ilmu komputer.', 'bi-pc-display-horizontal', NULL, NULL),
(6, 'Perpustakaan', 'Madrasah Aliyah Putri An-Nur Kota Cirebon memiliki Perpustakaan bersih dan nyaman untuk para siswa membaca dan memperluas ilmu pengetahuan.', 'bi-book-half', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_pages`
--

CREATE TABLE `home_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `section1_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_list1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_list1_val` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_list2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_list2_val` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_list3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_list3_val` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3_vid1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3_vid2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_pages`
--

INSERT INTO `home_pages` (`id`, `section1_title`, `section1_subtitle`, `section1_photo`, `section1_url`, `section2_photo`, `section2_list1`, `section2_list1_val`, `section2_list2`, `section2_list2_val`, `section2_list3`, `section2_list3_val`, `section3_title`, `section3_subtitle`, `section3_photo`, `section3_vid1`, `section3_vid2`, `created_at`, `updated_at`) VALUES
(1, 'Selamat Datang di MA Putri AN-NUR', 'Hidup Mulia atau Mati Syahid', 'JQZ3Cy6SkpOvxHcqD0QMu6XY2R5vtSQVisoevRoU.jpg', 'https://www.youtube.com/watch?v=kbAbXGnR5Dc', 'LquTpgs8wYpG1M57vaX5tJE2cMnowgKaLeev2g4x.jpg', 'Tenaga Pengajar Ustadz dan Ustadzah', '13', 'Murid Santri dan Non Santri', '71', 'Jam Belajar dalam satu pekan', '48', 'Bergabunglah Bersama Kami', 'Madrasah Aliyah Putri An-Nur, Sekolah Modern khusus Perempuan berbasis Pesantren', 'maprofil.png', 'qaNEJSLRM2Oo02AcLMIcZqvpZ5WcvMLwqkjjXFcO.mp4', 'eH02L1OoiGwWgn0trHwvlBQhYptkwVrizaV7PlkQ.mp4', '2024-05-25 12:44:49', '2024-05-26 22:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_01_031900_create_home_heroes_table', 1),
(5, '2024_05_01_033400_create_settings_table', 1),
(6, '2024_05_01_044300_create_clients_table', 1),
(7, '2024_05_02_134141_create_vision_missions_table', 1),
(8, '2024_05_24_134934_create_ekskul_pages_table', 1),
(9, '2024_05_24_135238_create_ekskuls_table', 1),
(10, '2024_05_24_153026_create_vision_pages_table', 1),
(11, '2024_05_24_160912_create_programs_table', 1),
(12, '2024_05_24_161255_create_program_photos_table', 1),
(13, '2024_05_24_163911_create_web_abouts_table', 1),
(14, '2024_05_24_165618_create_why_us_table', 1),
(15, '2024_05_24_171039_create_facilities_table', 1),
(16, '2024_05_24_174723_create_page_facilities_table', 1),
(17, '2024_05_24_180613_create_page_teams_table', 1),
(18, '2024_05_24_180655_create_teams_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_facilities`
--

CREATE TABLE `page_facilities` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_facilities`
--

INSERT INTO `page_facilities` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Fasilitas', 'Madrasah Aliyah Putri An-Nur Kota Cirebon memiliki Fasilitas belajar yang lengkap dan nyaman.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_teams`
--

CREATE TABLE `page_teams` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_teams`
--

INSERT INTO `page_teams` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Tenaga Pengajar', 'Madrasah Aliyah An-Nur Kota Cirebon memiliki Tenaga Pengajar yang berpengalaman dan berintegritas tinggi.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_beasiswa` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_pendaftaran` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `description`, `info_beasiswa`, `link_pendaftaran`, `quote`, `admin_photo`, `admin_name`, `admin_position`, `created_at`, `updated_at`) VALUES
(1, 'Program Unggulan', 'Program unggulan merupakan sebuah program beasiswa bagi siswa yang kurang mampu dalam hal ekonomi, siswa yang berprestasi dan mendapatkan program beasiswa dari pemerintah', '<h2>Program Beasiswa</h2>\r\n  <p>\r\n    Program beasiswa merupakan sebuah program yang bertujuan untuk membantu masyarakat dengan keadaan ekonomi menengah kebawah agar tetap melanjutkan pendidikan.\r\n  </p>\r\n  <p>\r\n    Tidak hanya itu, program beasiswa ini memiliki beberapa kriteria, adapun kriteria yang dimaksud ialah:\r\n  </p>\r\n  <ul style=\"text-align: justify;\">\r\n    <li><b>Program Beasiswa Berprestasi</b></li>\r\n    <li><b>Program Beasiswa Siswa Yatim</b></li>\r\n    <li><b>Program Beasiswa dari Pemerintah</b></li>\r\n  </ul>', '', 'Selamat bergabung menjadi anggota keluarga MA Putri An-Nur Kota Cirebon. Selamat belajar dan berprestasi, semangat kalian membantu kalian di masa yang akan datang.', 'of31aDRDCzM6iNAQI788ZNkdTmWg9AXBDmYtivi9.png', 'Vivi Silvana, SE', 'Kepala Sekolah', NULL, '2024-05-25 21:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `program_photos`
--

CREATE TABLE `program_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_photos`
--

INSERT INTO `program_photos` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'brosur2.jpg', NULL, NULL),
(2, 'brosur.jpg', NULL, NULL),
(3, 'Program Beasiswa.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6fPo8NCVLX5VDa9xttmoJcXTHDNOVohq1Pl15L0f', NULL, '103.56.204.42', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3Zvb3BnZWRJRUVIWFdPNEdNeHFsR1VkS0NRZlJ5Szd2c3pKdEcxRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vdGhyZWVkYXkua2FwLWFoci5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1717366788),
('7wGpUkxyymcBvMLJxjsxZHV7CFZ02aPkDoUtd3xV', NULL, '103.56.204.42', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVhEd3JkOVFEOFRuQTBnOEZIZ0xZN3NDRWlOYm54YWd4aXJ4c1M2UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly90aHJlZWRheS5rYXAtYWhyLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1717379635),
('JvCbcQbZsg1LWlMa4QBnwh5xoFYGcXVgQS3kcoEU', 1, '2001:df7:5300:7::29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZHpxZTVSNk83T29ZTDVJR0RsMmRVTGpQY0RJUk0zN0dFSmRKQTJ0dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vdGhyZWVkYXkua2FwLWFoci5jb20vaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1717387758),
('LClfHc1cmsNWQpCE2Qu3uUzL59i72nIPPA6Weaur', NULL, '103.56.204.42', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnplbnIzT2ozV09pZzh6N0hLVWU4T3FOY0t5eDRRc2l3YVRUQkRCQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vd3d3LnRocmVlZGF5LmthcC1haHIuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1717366795),
('xIfZgdA4CnVzm7Op3MVR1UZeDOWajgYyXHkdlIhx', NULL, '103.56.204.42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1hXem5YU3lZeVFmeEU1TDU3ajlLR0NUUTRTRE1tcGNHUktSbHBmNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vdGhyZWVkYXkua2FwLWFoci5jb20vaHVidW5naS1rYW1pIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1717387311);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_name2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_name3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_weekday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_weekend` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `app_name`, `app_name2`, `app_name3`, `open_weekday`, `open_weekend`, `logo`, `email`, `phone`, `youtube`, `facebook`, `instagram`, `address`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'MA Putri An-Nur Kota Cirebon', 'MAPAN', 'Madrasah Aliyah Putri An-Nur Kota Cirebon', 'Mon-Sun: 07AM - 18PM', 'Friday: day off', '43kL0xFKbNQHiZJfAk7LoJrkJd8vCPd7MSDFEBMo.png', 'maannurcirebon@gmail.com1', '+62 831-2387-23741', 'http://www.youtube.com/@maannurcirebon5111', 'https://web.facebook.com/Mapanofficialcrb1', 'https://www.instagram.com/mapanofficialcrb?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==', 'Jln. Pangeran Drajat Jagasatru, Kesambi Kota Cirebon', 'MA Putri AN-NUR', NULL, '2024-05-27 01:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `position`, `image`, `facebook`, `twitter`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 'Vivi Silvana, SE', 'Kepala Madrasah', 'RbLU9ILiwHfnrW9Ni6fCoUYggEET2coW69T1FibQ.png', '', '', '', '', NULL, '2024-05-25 21:25:04'),
(2, 'Emi Sukemi, S.Ag', 'Kabid. Perpustakaan', 'sEuXaOlp9t7Z528RGrcxRjI2cJt8wTwSIzHpyhev.png', '', '', '', '', NULL, '2024-05-25 21:24:24'),
(3, 'Nurun Novianah, S.Pd.I', 'Kabid. Tata Usaha', 'g4JsFugsVxWpFJcI5pJmGUBOdBFJsPzx6nlUERRs.png', '', '', '', '', NULL, '2024-05-25 21:24:32'),
(4, 'Abdul Hamid Yahya', 'Wakabid. Humas', 'WdVjHeIm8qn5dglcvloeleL4ktRJxVvBrl1w0G8U.png', '', '', '', '', NULL, '2024-05-26 21:55:51'),
(5, 'Ahmad Aisy, MM', 'Wakabid. Kurikulum', 'nIdp22UPbmcongIbVs1ipE6ts2WEE91TJhMUC2Lm.png', '', '', '', '', NULL, '2024-05-25 21:23:48'),
(6, 'Vidya S.Hakimi, S.Pd', 'Wakabid. Kesiswaan', 'ujRIc24Hd1x7bJGvhK2GpILMX38ry6cG0I9zUoIN.png', '', '', '', '', NULL, '2024-05-25 21:24:57'),
(7, 'Saadah N, S.Pd', 'Staff Tata Usaha', 'AprHf4X79HFnmeeVslXfrH29uajGhluf341EAlYG.png', '', '', '', '', NULL, '2024-05-25 21:24:41'),
(8, 'Abdurrahman, S.Pd', 'Staff Tata Usaha', 'QLjibimdznv9Joe4tFgcArddqWBPBqv6g4B9BGfF.png', '', '', '', '', NULL, '2024-05-25 21:23:35'),
(9, 'Abdurrahman, S.Pd', 'Wali Kelas X', 'kT0ggb45CpufZjZAi7ydCCSBnSExw2hSNgJA7woZ.png', '', '', '', '', NULL, '2024-05-25 21:23:42'),
(10, 'Siti Khodijah, S.Pd', 'Wali Kelas XI', 'FDcjmURBp3Qz94g1IyOLTTkgM7fe7D385W394NBh.png', '', '', '', '', NULL, '2024-05-25 21:24:50'),
(11, 'Ahmad Aisy, MM', 'Wali Kelas XII', 'vnPePa7N7UgJrxrFj6JKyKGRnAr7N2s700OVyhx1.png', '', '', '', '', NULL, '2024-05-25 21:23:54'),
(12, 'Mais Nursiam', 'Operator', 'OhX2rVVfakmnXiFryhdEGBF1p5WzLXZItuuxUv3T.png', '', '', '', '', NULL, '2024-05-25 21:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','staff') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'staff',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `middleName`, `lastName`, `email`, `photo`, `role`, `email_verified_at`, `lastLogin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'MA Putri', 'An-Nur', 'admin@gmail.com', 'QF8wfHoM8WyAqEvjkijDVAfOPbS2t6ueho5rLtlD.png', 'admin', '2024-05-25 12:44:49', '2024-05-25 19:44:49', '$2y$12$Gx5qtY/i1J/EshM9zurDbukg9a58m3b.r56ZegDIzGTJ0Vah3WBfO', 'ZeZqj7vK97eWxwRAX3fAKoEezboy70oysGfwHdqAwQEiKc5vX6y9HhvV5Vul', '2024-05-25 12:44:49', '2024-05-25 21:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `vision_missions`
--

CREATE TABLE `vision_missions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vision_missions`
--

INSERT INTO `vision_missions` (`id`, `title`, `vision`, `mission`, `created_at`, `updated_at`) VALUES
(1, 'Visi dan Misi MA Putri An-Nur Kota Cirebon', '<p>\"Terwujudnya Insan Terdidik yang Berakhlakul Karimah Kuat dan Menjunjung Tinggi Nilai-nilai Islami.</p>\n<p>Unggul dalam Prestasi, Memilik Kecerdasan Intelektual serta Mampu Menerapkan Teknologi Digital\"</p>\n<ul style=\"text-align: justify;\">\n    <b>Indikator Visi MA An-Nur Kota Cirebon adalah:</b>\n    <li><b>Memiliki Budi Pekerti dan Akhlak Mulia.</b></li>\n    <li><b>Memiliki Kecintaan Terhadap Bangsa dan Negara Indonesia.</b></li>\n    <li><b>Memiliki Semangat untuk Meraih Prestasi secara Berkelanjutan.</b></li>\n    <li><b>Memiliki Rasa Solidaritas dan Toleransi Terhadap Keanekaragaman Bangsa Indonesia.</b></li>\n    <li><b>Menguasai Ilmu Pengetahuan dan Teknologi.</b></li>\n    <li><b>Memiliki Sikap Kritis, Kreatif, Komunikatif dan Kolaboratif.</b></li>\n    <li><b>Memiliki Kemandirian Belajar dan Berorganisasi.</b></li>\n    <li><b>Memiliki Kecintaan Terhadap Budaya Membaca dan Menulis Dimanapun Berada.</b></li>\n</ul>', '<ul style=\"text-align: justify;\">\n    <li><b>Memberikan Pendidikan Islami dan Qur\'ani Berkualitas untuk Membentuk Karakter Siswa yang Berakhlakul Karimah dan Menjunjung Tinggi Nilai-nilai Islami.</b></li>\n    <li><b>Menerapkan Kurikulum yang Berbasis Kompetensi dan Mengintegritasikan Nilai-nilai Agama ke dalam Pembelajaran Sains untuk Meningkatkan Kecerdasan Intelektual.</b></li>\n    <li><b>Mengasah Peserta Didik untuk Berprestasi dan Meningkatkan Pengetahuan Sains.</b></li>\n    <li><b>Membentuk Peserta Didik yang Mandiri, Kolaboratif dan Berpikir Kritis.</b></li>\n    <li><b>Mengembangkan Kemampuan Peserta Didik dalam Menggunakan Teknologi Digital untuk Memperoleh Informasi, Menganalisis Data, dan Berkomunikasi Secara Efektif.</b></li>\n    <li><b>Mendorong Peserta Didik untuk Mengembangkan Kreativitas dan Inovasi dalam Pemanfaatan Teknologi Digital untuk Kepentingan Agama dan Masyarakat.</b></li>\n    <li><b>Menyiapkan Lulusan yang Memiliki Life Skill dan Berdaya Guna Bagi Masyarakat.</b></li>\n</ul>', '2024-05-25 12:44:49', '2024-05-25 12:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `vision_pages`
--

CREATE TABLE `vision_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vision_pages`
--

INSERT INTO `vision_pages` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sambutan Kepala Sekolah', 'Selamat datang di Madrasah Aliyah Putri An-Nur Kota Cirebon. Kami segenap keluarga MAPAN mengucapkan Terimakasih kepada para wali murid yang telah mendaftarkan putri nya di Madrasah Aliyah Putri An-Nur Kota Cirebon dan tidak lupa kepada para Ustadz dan Ustadzah yang telah membantu kegiatan belajar mengajar dan memberikan ilmu serta pengalamannya kepada para murid. Semoga ilmunya bermanfaat bagi diri sendiri dan masyarakat. Aamiiin.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `why_uses`
--

CREATE TABLE `why_uses` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_uses`
--

INSERT INTO `why_uses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pendidikan Holistik', 'Memberikan pengalaman belajar yang mencakup aspek Agama, Moral, Sosial, Sains dan Akademis', NULL, NULL),
(2, 'Pengembangan Karakter dan Akhlak', 'Yayasan Pendidikan dan Dakwah Islam Jagasatru (YPDIJ) turut membantu pembentukan karakter dan akhlak siswa melalui pendekatan pendidikan yang berfokus pada integritas, kejujuran dan tanggung jawab.', NULL, NULL),
(3, 'Pembentukan Kemandirian', 'Menyediakan asrama Pesantren yang dapat membantu siswa mengembangkan kemandirian, tanggung jawab pribadi, dan keterampilan sehari-hari.', NULL, NULL),
(4, 'Pengajaran Nilai-nilai Keagamaan', 'Siswa mendapatkan pemahaman yang mendalam tentang Nilai-nilai keagamaan dan etika yang kuat dalam disiplin ilmu agama.', NULL, NULL),
(5, 'Pemberdayaan Perempuan', 'Meningkatkan rasa percaya diri untuk mampu berperan aktif dalam memecahkan masalah, dan memberikan akses yang setara untuk mendukung pengembangan potensi perempuan.', NULL, NULL),
(6, 'Pengajaran oleh Guru Ahli', 'Tenaga pengajar yang terlatih dan berpengalaman di bidangnya memberikan pengalaman yang terarah dan mendalam, sehingga dapat membantu siswa memahami konsep pembelajaran yang kompleks.', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekskuls`
--
ALTER TABLE `ekskuls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekskul_pages`
--
ALTER TABLE `ekskul_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_facilities`
--
ALTER TABLE `page_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_teams`
--
ALTER TABLE `page_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_photos`
--
ALTER TABLE `program_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vision_missions`
--
ALTER TABLE `vision_missions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vision_pages`
--
ALTER TABLE `vision_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_uses`
--
ALTER TABLE `why_uses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ekskuls`
--
ALTER TABLE `ekskuls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ekskul_pages`
--
ALTER TABLE `ekskul_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `page_facilities`
--
ALTER TABLE `page_facilities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_teams`
--
ALTER TABLE `page_teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program_photos`
--
ALTER TABLE `program_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vision_missions`
--
ALTER TABLE `vision_missions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vision_pages`
--
ALTER TABLE `vision_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `why_uses`
--
ALTER TABLE `why_uses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
