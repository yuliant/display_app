-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 05, 2023 at 02:40 AM
-- Server version: 5.7.33
-- PHP Version: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerja_info_musasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `display_settings`
--

CREATE TABLE `display_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `display_settings`
--

INSERT INTO `display_settings` (`id`, `key`, `value`, `label`, `description`, `type`, `created_at`, `updated_at`) VALUES
(1, 'display_title', 'SMP MUHAMMADIYAH 1 SIDOARJO', 'Judul Display', 'Judul utama yang ditampilkan.', 'text', NULL, '2023-09-05 00:56:50'),
(2, 'display_subtitle', 'No, Jl. Samanhudi No.81, Jasem, Bulusidokare, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61216', 'Sub Judul Display', 'Sub judul yang menambahkan keterangan.', 'text', NULL, '2023-09-05 00:56:50'),
(3, 'logo', 'bg_images/169387540941.png', 'Logo', 'Logo yang ditampilkan di tampilan informasi.', 'file', NULL, '2023-09-05 00:56:50'),
(4, 'bg_image', 'bg_images/169387767114.jpg', 'Gambar Latar Belakang', 'Gambar latar belakang judul display.', 'file', NULL, '2023-09-05 01:34:31'),
(5, 'video_source', 'streaming', 'Sumber Video', 'Sumber video (playlist, local, streaming).', 'select', NULL, '2023-08-16 10:37:47'),
(6, 'video_playlist_id', '1', 'ID Playlist Video', 'ID playlist video YouTube.', 'text', NULL, '2023-08-16 07:34:48'),
(8, 'video_streaming_url', 'https://streaming.com/video', 'URL Streaming Video', 'URL streaming video eksternal.', 'text', NULL, '2023-08-16 07:34:48'),
(9, 'display_orientation', 'landscape', 'Orientasi Display', 'Orientasi tampilan (landscape/portrait).', 'radio', NULL, '2023-09-05 01:35:33'),
(10, 'mode_event', 'image', 'Tipe event', 'Tipe Event bisa berupa text / image ', 'select', NULL, '2023-09-05 01:10:29'),
(11, 'tema', 'layout_1', 'Tema untuk tampilan display', 'Tema-tema yang disediakan, setiap tema memiliki perbedaan fungsi dan letak posisi widget', 'select', NULL, '2023-09-05 01:17:50'),
(12, 'bg_image_big', 'bg_images/169362303241.jpg', 'Gambar Latar Belakang Full', 'Gambar latar belakang tema full', 'file', NULL, '2023-09-02 02:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `position`, `created_at`, `updated_at`) VALUES
(3, 'MASRIZAL EKA YULIANTO', 'masrizal04@gmail.com', 'Staff IT', '2023-09-05 01:11:55', '2023-09-05 01:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_description`, `event_date`, `event_time`, `type`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Lomba 17 Agustusan', 'Kegiatan lomba memperingati HUT RI Ke-78 di SMPN 2 Bandar Lampung', '2023-08-22', '07:00:00', 'image', '1692517772.png', NULL, '2023-08-20 01:52:46'),
(3, 'Projek P5 Tema 1', 'Kegiatan Projek P5 Tema 1 untuk kelas 7 dan kelas 8 kurikulum merdeka di SMPN 2 Bandar Lampung', '2023-09-08', '07:00:00', 'image', '1692516896.png', '2023-08-20 00:34:56', '2023-09-05 01:18:08'),
(5, 'Projek P5 Tema 1', 'Kegiatan Projek P5 Tema 1 untuk kelas 7 dan kelas 8 kurikulum merdeka di SMPN 2 Bandar Lampung', '2023-08-23', '07:00:00', 'text', '', '2023-08-20 01:23:45', '2023-08-20 01:23:45'),
(6, 'Projek P5 Tema 1', 'Kegiatan Projek P5 Tema 1 untuk kelas 7 dan kelas 8 kurikulum merdeka di SMPN 2 Bandar Lampung', '2023-08-22', '07:00:00', 'text', '', '2023-08-20 01:24:12', '2023-08-20 01:24:12'),
(7, 'Projek P5 Tema 1', 'Kegiatan Projek P5 Tema 1 untuk kelas 7 dan kelas 8 kurikulum merdeka di SMPN 2 Bandar Lampung', '2023-08-24', '07:00:00', 'text', '', '2023-08-20 01:24:35', '2023-08-20 01:24:35'),
(8, 'PPDB', 'PPDB 2023', '2023-09-08', '07:13:00', 'text', '1693876400.jpg', '2023-09-05 01:13:20', '2023-09-05 01:18:33');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mata_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `kode_guru`, `nama_guru`, `mata_pelajaran`, `created_at`, `updated_at`) VALUES
(1, '12', 'M. Abdi Fajrin, S.Pd.', 'PJOK', '2023-08-21 13:17:55', '2023-08-21 13:17:55'),
(2, '13', 'Denada Anzalna, S.Pd.', 'Informatika', '2023-08-21 13:35:03', '2023-08-21 13:39:05'),
(3, '50', 'Zahra, S.Pd.', 'PKn/PAK', '2023-08-23 07:05:45', '2023-08-23 07:05:45'),
(4, '38', 'Ade Sri Rahayu, S.Pd.', 'IPA/Prakarya', '2023-08-23 07:06:19', '2023-08-23 07:06:19'),
(5, '3', 'Dra. Merita Marpaung', 'IPA', '2023-08-23 07:13:25', '2023-08-23 07:13:25'),
(6, '17', 'Dedi Cahyadi, M.Pd.', 'PKn/PAK', '2023-08-23 07:13:59', '2023-08-23 07:13:59'),
(7, '33', 'Anita Diana, SE, M.Pd.', 'IPS', '2023-08-23 07:14:27', '2023-08-23 07:14:27'),
(8, '20', 'Bertalina, S.Pd.', 'Bahasa Lampung', '2023-08-23 07:16:38', '2023-08-23 07:16:38'),
(9, '22', 'Hernie Talman, S.Pd.', 'Bahasa Indonesia', '2023-08-23 07:17:03', '2023-08-23 07:17:03'),
(10, '32', 'Alif Maulana, S.Pd.', 'PAI', '2023-08-23 07:17:20', '2023-08-23 07:17:20'),
(11, '37', 'Arismun, M.Pd.', 'Bahasa Inggris', '2023-08-23 07:17:42', '2023-08-23 07:17:42'),
(12, '11', 'Kuswo, M.Pd.I', 'PAI', '2023-08-23 07:24:23', '2023-08-23 07:24:23'),
(13, '28', 'Setio I.P. Ningsih, S.Pd.', 'Bahasa Inggris', '2023-08-23 07:25:06', '2023-08-23 07:25:06'),
(14, '34', 'Drs. Budi Rimawan, MM', 'Bahasa Indonesia', '2023-08-23 07:25:32', '2023-08-23 07:25:32'),
(15, '42', 'Kartika Dwi Handayani, S.Pd.', 'Matematika', '2023-08-23 07:26:09', '2023-08-23 07:26:09'),
(16, '46', 'Fahruddin Arrozi, S.Pd.', 'PAI', '2023-08-23 07:26:39', '2023-08-23 07:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `hadis_nabi`
--

CREATE TABLE `hadis_nabi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hadis_nabi`
--

INSERT INTO `hadis_nabi` (`id`, `judul`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Hadits Tentang Niat', '\"Sesungguhnya amalan itu tergantung niatnya dan seseorang akan mendapatkan sesuai dengan apa yang ia niatkan,\" (HR. Bukhari dan Muslim).', '2023-09-02 08:08:31', '2023-09-02 08:08:31'),
(2, 'Silahturahmi', '\"Beribadahlah pada Allah SWT dengan sempurna jangan syirik, dirikanlah sholat, tunaikan zakat, dan jalinlah silaturahmi dengan orangtua dan saudara.\" (HR Bukhari).', '2023-09-02 08:13:19', '2023-09-02 08:13:19'),
(3, 'Kehidupan', '\"Ketahuilah bahwasannya kemenangan itu bersama kesabaran, dan jalan keluar itu bersama kesulitan, dan bahwasanya bersama kesulitan ada kemudahan\". (Hr. Tirmidzi).', '2023-09-02 08:13:49', '2023-09-02 08:13:49'),
(4, 'Sabar', '\"Barangsiapa yang berusaha menjaga diri, maka Allah menjaganya, barangsiapa yang berusaha merasa cukup, maka Allah mencukupinya. Barangsiapa yang berusaha bersabar, maka Allah akan menjadikannya bisa bersabar dan tidak ada seorang pun yang dianugerahi sesuatu yang melebihi kesabaran.\" (HR Bukhari)', '2023-09-02 08:14:10', '2023-09-02 08:14:10'),
(5, 'Bersyukur', '\"Barang siapa yang tidak mensyukuri yang sedikit, maka ia tidak akan mampu mensyukuri sesuatu yang banyak.\" (HR. Ahmad)', '2023-09-02 08:14:33', '2023-09-02 08:14:33'),
(6, 'Berdzikir', '\"Sesungguhnya ku ucapkan kalimat, \'Subhanallah walhamdulillah wa laa ilaaha illallaaha wallahu akbar; Maha Suci Allah segala puji bagi-Nya, tidak ada Tuhan selain Allah dan Allah Maha Besar, lebih aku cintai dari pada semua yang disinari oleh matahari.\'\" (HR. Muslim)', '2023-09-02 08:15:00', '2023-09-02 19:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_jumat`
--

CREATE TABLE `jadwal_jumat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `khotib` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `muadzin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_jumat`
--

INSERT INTO `jadwal_jumat` (`id`, `tanggal`, `khotib`, `imam`, `muadzin`, `created_at`, `updated_at`) VALUES
(1, '2023-09-08', 'Alif Maulana, S.Pd.', 'Alif Maulana, S.Pd.', 'Fahruddin Arrozi, S.Pd.', '2023-09-02 19:17:29', '2023-09-02 19:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rombel_id` bigint(20) UNSIGNED NOT NULL,
  `jamke_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id`, `kode_guru`, `rombel_id`, `jamke_id`, `created_at`, `updated_at`) VALUES
(1, '12', 1, 1, '2023-08-21 15:28:45', '2023-08-21 15:28:45'),
(2, '12', 2, 1, '2023-08-21 15:28:45', '2023-08-21 15:31:41'),
(3, '13', 3, 1, '2023-08-21 15:32:28', '2023-08-21 15:51:48'),
(4, '12', 1, 2, '2023-08-21 15:51:10', '2023-08-21 15:51:10'),
(5, NULL, 10, 2, '2023-08-21 15:51:16', '2023-08-22 14:43:52'),
(6, '12', 1, 3, '2023-08-22 14:26:31', '2023-08-22 14:26:31'),
(7, '13', 1, 5, '2023-08-22 14:26:31', '2023-08-22 14:26:31'),
(8, NULL, 10, 13, '2023-08-22 14:26:37', '2023-08-22 14:43:52'),
(9, '50', 1, 14, '2023-08-23 07:15:00', '2023-08-23 07:15:00'),
(10, '38', 2, 14, '2023-08-23 07:15:00', '2023-08-23 07:15:00'),
(11, '3', 4, 14, '2023-08-23 07:15:00', '2023-08-23 07:15:00'),
(12, '17', 5, 14, '2023-08-23 07:15:01', '2023-08-23 07:15:01'),
(13, '33', 6, 14, '2023-08-23 07:15:01', '2023-08-23 07:15:01'),
(14, '20', 7, 14, '2023-08-23 07:18:02', '2023-08-23 07:18:02'),
(15, '22', 8, 14, '2023-08-23 07:18:02', '2023-08-23 07:18:02'),
(16, '32', 9, 14, '2023-08-23 07:18:02', '2023-08-23 07:18:02'),
(17, '37', 10, 14, '2023-08-23 07:18:02', '2023-08-23 07:18:02'),
(18, '50', 1, 15, '2023-08-23 07:23:51', '2023-08-23 07:23:51'),
(19, '38', 2, 15, '2023-08-23 07:23:51', '2023-08-23 07:23:51'),
(20, '3', 4, 15, '2023-08-23 07:23:51', '2023-08-23 07:23:51'),
(21, '17', 5, 15, '2023-08-23 07:23:51', '2023-08-23 07:23:51'),
(22, '33', 6, 15, '2023-08-23 07:23:51', '2023-08-23 07:23:51'),
(23, '20', 7, 15, '2023-08-23 07:23:51', '2023-08-23 07:23:51'),
(24, '22', 8, 15, '2023-08-23 07:23:51', '2023-08-23 07:23:51'),
(25, '32', 9, 15, '2023-08-23 07:23:51', '2023-08-23 07:23:51'),
(26, '37', 10, 15, '2023-08-23 07:23:51', '2023-08-23 07:23:51'),
(27, '11', 11, 15, '2023-08-23 07:27:09', '2023-08-23 07:27:09'),
(28, '28', 12, 15, '2023-08-23 07:27:09', '2023-08-23 07:27:09'),
(29, '34', 13, 15, '2023-08-23 07:27:09', '2023-08-23 07:27:09'),
(30, '42', 14, 15, '2023-08-23 07:27:09', '2023-08-23 07:27:09'),
(31, '46', 15, 15, '2023-08-23 07:27:09', '2023-08-23 07:27:09'),
(32, '50', 4, 1, '2023-09-05 01:30:26', '2023-09-05 01:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `jamkes`
--

CREATE TABLE `jamkes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_awal` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `no_urut` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jamkes`
--

INSERT INTO `jamkes` (`id`, `hari`, `nama_jam`, `waktu_awal`, `waktu_akhir`, `no_urut`, `created_at`, `updated_at`) VALUES
(1, 'Selasa', 'Jam Ke-1', '07:00:00', '23:50:00', 1, '2023-08-21 14:24:20', '2023-09-05 01:31:06'),
(2, 'Senin', 'Jam Ke-2', '08:00:00', '08:40:00', 2, '2023-08-21 14:37:59', '2023-08-22 07:38:43'),
(3, 'Senin', 'Jam Ke-3', '08:40:00', '09:20:00', 3, '2023-08-21 16:27:02', '2023-08-22 07:38:53'),
(4, 'Senin', 'Jam Ke-0', '07:00:00', '07:20:00', 0, '2023-08-22 06:31:04', '2023-08-22 07:38:32'),
(5, 'Senin', 'Jam Ke-4', '09:20:00', '10:00:00', 4, '2023-08-22 06:34:08', '2023-08-22 07:39:00'),
(6, 'Senin', 'Istirahat 1', '10:00:00', '10:20:00', 5, '2023-08-22 06:38:09', '2023-08-22 07:39:15'),
(7, 'Senin', 'Jam Ke-5', '10:20:00', '11:00:00', 6, '2023-08-22 07:36:04', '2023-08-22 07:39:22'),
(8, 'Senin', 'Jam Ke-6', '11:00:00', '11:40:00', 7, '2023-08-22 07:41:53', '2023-08-22 07:41:53'),
(9, 'Senin', 'Jam Ke-7', '11:40:00', '12:20:00', 8, '2023-08-22 07:42:40', '2023-08-22 07:42:40'),
(10, 'Senin', 'Istirahat 2', '12:20:00', '13:30:00', 9, '2023-08-22 07:43:35', '2023-08-22 07:43:35'),
(11, 'Senin', 'Jam Ke-8', '13:00:00', '13:40:00', 10, '2023-08-22 07:46:12', '2023-08-22 07:46:12'),
(12, 'Senin', 'Jam Ke-9', '13:40:00', '14:20:00', 11, '2023-08-22 07:47:00', '2023-08-22 07:47:00'),
(13, 'Senin', 'Jam Ke-10', '14:20:00', '15:00:00', 12, '2023-08-22 07:47:22', '2023-08-22 07:47:22'),
(14, 'Rabu', 'Jam Ke-9', '13:40:00', '14:20:00', 12, '2023-08-23 07:04:23', '2023-08-23 07:04:23'),
(15, 'Rabu', 'Jam Ke-10', '14:20:00', '15:00:00', 13, '2023-08-23 07:21:21', '2023-08-23 07:21:21');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_13_053055_create_employees_table', 2),
(7, '2014_10_12_000000_create_users_table', 3),
(8, '2023_08_15_065547_create_settings_table', 4),
(9, '2023_08_16_130545_create_display_settings_table', 5),
(10, '2023_08_19_141109_create_student_of_the_month_table', 6),
(11, '2023_08_20_042253_create_school_messages_table', 7),
(13, '2023_08_20_070002_create_events_table', 8),
(14, '2023_08_20_135259_create_news_feed_table', 9),
(15, '2023_08_20_144103_create_timetables_table', 10),
(16, '2023_08_21_195658_create_gurus_table', 11),
(17, '2023_08_21_204252_create_rombels_table', 12),
(18, '2023_08_21_210221_create_jamkes_table', 13),
(19, '2023_08_21_213150_create_add_hari_to_jamkes', 14),
(20, '2023_08_21_213621_create_del_hari_from_jamkes', 15),
(21, '2023_08_21_214319_create_jadwal_pelajaran_table', 16),
(22, '2023_08_25_203944_create_videos_table', 17),
(23, '2023_09_02_145033_create_hadis_nabi_table', 18),
(24, '2023_09_03_020430_create_jadwal_jumat_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `news_feed`
--

CREATE TABLE `news_feed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_feed`
--

INSERT INTO `news_feed` (`id`, `title`, `content`, `date`, `created_at`, `updated_at`) VALUES
(7, 'PPDB 2024/2025', 'Dibuka!!!', '2023-09-01', '2023-09-05 01:24:24', '2023-09-05 01:24:24');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rombels`
--

CREATE TABLE `rombels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rombels`
--

INSERT INTO `rombels` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, '7-1', '2023-08-21 13:57:20', '2023-08-21 13:57:20'),
(2, '7-2', '2023-08-21 14:00:31', '2023-08-21 14:00:31'),
(3, '7-3', '2023-08-21 14:00:55', '2023-08-21 14:00:55'),
(4, '7-4', '2023-08-21 14:00:55', '2023-08-21 14:00:55'),
(5, '7-5', '2023-08-21 14:00:55', '2023-08-21 14:00:55'),
(6, '7-6', '2023-08-21 14:00:55', '2023-08-21 14:00:55'),
(7, '7-7', '2023-08-21 14:00:55', '2023-08-21 14:00:55'),
(8, '7-8', '2023-08-21 14:00:55', '2023-08-21 14:00:55'),
(9, '7-9', '2023-08-21 14:00:55', '2023-08-21 14:00:55'),
(10, '7-10', '2023-08-21 14:00:55', '2023-08-21 14:00:55'),
(11, '8-1', '2023-08-23 07:19:47', '2023-08-23 07:19:47'),
(12, '8-2', '2023-08-23 07:19:54', '2023-08-23 07:19:54'),
(13, '8-3', '2023-08-23 07:19:59', '2023-08-23 07:19:59'),
(14, '8-4', '2023-08-23 07:20:04', '2023-08-23 07:20:04'),
(15, '8-5', '2023-08-23 07:20:13', '2023-08-23 07:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `school_messages`
--

CREATE TABLE `school_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembuat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_messages`
--

INSERT INTO `school_messages` (`id`, `pembuat`, `message`, `created_at`, `updated_at`) VALUES
(9, 'admin', 'coba', '2023-09-05 01:25:12', '2023-09-05 01:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'Display Informasi', '2023-08-14 23:59:42', '2023-08-25 13:01:04'),
(2, 'app_logo', 'path/to/logo.png', '2023-08-14 23:59:42', '2023-08-25 13:01:04'),
(3, 'app_description', 'Aplikasi Display Informasi Sekolah yang dibuat menggunakan framework laravel 10 pada tahun 2023, yang merupakan penyempurnaan dari DISFO sebelumnya, namun dalam bentuk dan kerangka yang berbeda.', '2023-08-14 23:59:42', '2023-08-25 13:01:04'),
(4, 'contact_info', 'Email: hendra.dharmawan@gmail.com, Phone: +6281371435904', '2023-08-14 23:59:42', '2023-08-25 13:01:04'),
(5, 'language', 'idn', '2023-08-14 23:59:42', '2023-09-02 17:25:51'),
(6, 'short_name', 'DISFO', NULL, '2023-08-25 13:01:04'),
(7, 'kota', 'Kabupaten Sidoarjo', NULL, '2023-09-05 01:07:24'),
(8, 'time_zone', 'Asia/Jakarta', NULL, '2023-09-02 19:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `student_of_the_month`
--

CREATE TABLE `student_of_the_month` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_prestasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_of_the_month`
--

INSERT INTO `student_of_the_month` (`id`, `nama_siswa`, `ket_prestasi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'M. FAIZ RAMADHAN FIRDAUS', 'Juara 1 Lomba Olympiade IPA Tingkat Kota', 'student_fotos/4nQokawm69dXeMTCGR7EvYDBwbdmuWXCR3xZqiXb.gif', '2023-08-19 07:14:32', '2023-08-31 15:48:14'),
(2, 'RAHAYU LESTARI', 'Juara 1 Gaya Kupu-kupu 50 Meter Walikota Cup 2023', 'student_fotos/10J1jZcHyuHYcznd33fncnV30Hro7Zio6p4XryxJ.png', '2023-08-19 07:56:59', '2023-08-19 22:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `classroom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `day`, `subject`, `start_time`, `end_time`, `classroom`, `teacher_name`, `created_at`, `updated_at`) VALUES
(1, 'Senin', 'Matematika', '07:00:00', '12:30:00', 'Kelas A', 'Jessica Iskandar', NULL, '2023-08-21 03:50:57'),
(2, 'Senin', 'Bahasa Inggris', '10:00:00', '12:30:00', 'Kelas B', 'Nama Guru 2', NULL, '2023-08-21 03:51:11'),
(3, 'Senin', 'Pendidikan Anti Korupsi', '10:00:00', '12:50:00', 'Kelas B', 'Santi', '2023-08-20 08:05:58', '2023-08-21 03:51:23'),
(4, 'Senin', 'PJOK', '10:00:00', '12:50:00', 'Kelas C', 'M. Abdi Fajrin', '2023-08-20 09:09:10', '2023-08-21 03:51:39'),
(9, 'Senin', 'PJOK', '10:00:00', '12:30:00', 'Kelas C', 'Adi Isra', '2023-08-20 16:48:52', '2023-08-21 03:52:17'),
(10, 'Senin', 'PKn', '10:00:00', '13:00:00', 'Kelas D', 'Dani', '2023-08-21 03:52:56', '2023-08-21 03:52:56'),
(11, 'Senin', 'Matematika', '10:00:00', '13:00:00', 'Kelas E', 'Joni', '2023-08-21 03:53:23', '2023-08-21 03:53:23'),
(12, 'Senin', 'Pendidikan Agama', '10:00:00', '13:00:00', 'Kelas A', 'Gerry', '2023-08-21 03:53:53', '2023-08-21 03:53:53'),
(13, 'Senin', 'Bahasa Lampung', '10:00:00', '13:00:00', 'Kelas A', 'Santi', '2023-08-21 04:00:01', '2023-08-21 04:00:01'),
(14, 'Senin', 'Seni Budaya', '10:00:00', '13:00:00', 'Kelas A', 'Jihan', '2023-08-21 04:01:46', '2023-08-21 04:01:46'),
(15, 'Senin', 'Bahasa Indonesia', '10:00:00', '13:00:00', 'Kelas B', 'Doni Iskandar', '2023-08-21 04:02:59', '2023-08-21 04:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Hendra Bro', 'admin@example.com', NULL, '$2y$10$.YLm2.Ac7Jv.gz9pG1sMbeozjVbMfKXoZ6bFoh8hjbM2Tt2zIsVJa', 'admin', 'active', NULL, NULL, '2023-08-14 07:11:06'),
(2, 'Doni Salmanan', 'doni@gmail.com', NULL, '$2y$10$I5ckBT/1z5C3oBuDUlPX6OHk09bh.N93wQhBKLNuv1UWx5yGGqXV.', 'user', 'active', NULL, '2023-08-14 08:28:46', '2023-08-14 08:28:46'),
(3, 'MASRIZAL EKA YULIANTO', 'masrizal04@gmail.com', NULL, '$2y$10$VSJyVSgoA0.XkMtTeTFre.7tiYjiIhCUI6XqjodLv0NWTFtt5Zvza', 'user', 'active', NULL, '2023-09-05 01:11:22', '2023-09-05 01:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `video_path`, `created_at`, `updated_at`) VALUES
(2, 'Animasi Singkat', 'Video animasi singkat 1', 'videos/1Ze2cMZzDF1YH8WtzQC9w3MFoosmyhR8flkL7hZu.mp4', '2023-08-25 14:04:57', '2023-08-25 14:16:13'),
(3, 'Collide', 'Collide', 'videos/kupBeiKUn4e06Zp1uoBhng2XarBOKK40sBHCraHU.mp4', '2023-09-05 01:20:45', '2023-09-05 01:20:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `display_settings`
--
ALTER TABLE `display_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `display_settings_key_unique` (`key`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gurus_kode_guru_unique` (`kode_guru`);

--
-- Indexes for table `hadis_nabi`
--
ALTER TABLE `hadis_nabi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_jumat`
--
ALTER TABLE `jadwal_jumat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_pelajaran_kode_guru_foreign` (`kode_guru`),
  ADD KEY `jadwal_pelajaran_rombel_id_foreign` (`rombel_id`),
  ADD KEY `jadwal_pelajaran_jamke_id_foreign` (`jamke_id`);

--
-- Indexes for table `jamkes`
--
ALTER TABLE `jamkes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_feed`
--
ALTER TABLE `news_feed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rombels`
--
ALTER TABLE `rombels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_messages`
--
ALTER TABLE `school_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `student_of_the_month`
--
ALTER TABLE `student_of_the_month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `display_settings`
--
ALTER TABLE `display_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hadis_nabi`
--
ALTER TABLE `hadis_nabi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_jumat`
--
ALTER TABLE `jadwal_jumat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `jamkes`
--
ALTER TABLE `jamkes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `news_feed`
--
ALTER TABLE `news_feed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rombels`
--
ALTER TABLE `rombels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `school_messages`
--
ALTER TABLE `school_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_of_the_month`
--
ALTER TABLE `student_of_the_month`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD CONSTRAINT `jadwal_pelajaran_jamke_id_foreign` FOREIGN KEY (`jamke_id`) REFERENCES `jamkes` (`id`),
  ADD CONSTRAINT `jadwal_pelajaran_kode_guru_foreign` FOREIGN KEY (`kode_guru`) REFERENCES `gurus` (`kode_guru`),
  ADD CONSTRAINT `jadwal_pelajaran_rombel_id_foreign` FOREIGN KEY (`rombel_id`) REFERENCES `rombels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
