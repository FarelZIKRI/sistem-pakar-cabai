-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2025 pada 08.43
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispak_cabe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `gejalas`
--

CREATE TABLE `gejalas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bobot` double DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gejalas`
--

INSERT INTO `gejalas` (`id`, `kode`, `nama`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'G01', 'Daun menguning', 3, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(2, 'G02', 'Daun layu', 5, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(3, 'G03', 'Tulang daun memutih/pucat', 2, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(4, 'G04', 'Batang menguning', 3, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(5, 'G05', 'Akar membusuk', 5, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(6, 'G06', 'Tanaman layu mendadak', 5, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(7, 'G07', 'Batang kecoklatan jika dipotong', 4, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(8, 'G08', 'Keluar lendir putih dari batang', 5, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(9, 'G09', 'Akar utama membusuk/rusak', 4, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(10, 'G10', 'Bercak coklat pada buah', 4, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(11, 'G11', 'Buah membusuk', 5, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(12, 'G12', 'Jamur berwarna pink pada buah', 3, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(13, 'G13', 'Bercak hitam melingkar pada buah', 4, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(14, 'G14', 'Buah kering dan keriput', 3, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(15, 'G15', 'Bercak bulat kecil pada daun', 3, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(16, 'G16', 'Bercak abu-abu dengan tepi coklat', 3, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(17, 'G17', 'Daun kering dan rontok', 4, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(18, 'G18', 'Bercak berlubang di tengah', 2, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(19, 'G19', 'Pertumbuhan kerdil', 3, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(20, 'G20', 'Produksi buah menurun', 2, '2025-12-24 08:12:10', '2025-12-24 08:12:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `konsultasis`
--

CREATE TABLE `konsultasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `hasil_cf` text DEFAULT NULL,
  `hasil_wp` text DEFAULT NULL,
  `penyakit_terpilih_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai_keyakinan` double DEFAULT NULL,
  `input_gejala` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konsultasis`
--

INSERT INTO `konsultasis` (`id`, `nama_pengguna`, `tanggal`, `hasil_cf`, `hasil_wp`, `penyakit_terpilih_id`, `nilai_keyakinan`, `input_gejala`, `created_at`, `updated_at`) VALUES
(2, 'siswanto', '2025-12-25 12:01:19', '[{\"penyakit\":{\"id\":2,\"kode\":\"P02\",\"nama\":\"Layu Bakteri\",\"deskripsi\":\"Disebabkan oleh bakteri Ralstonia solanacearum. Tanaman layu mendadak dan batang mengeluarkan lendir putih jika dipotong.\",\"solusi\":\"Perbaiki drainase, rotasi tanaman, dan gunakan bakterisida.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"cf_value\":0.95952,\"percentage\":95.95},{\"penyakit\":{\"id\":1,\"kode\":\"P01\",\"nama\":\"Layu Fusarium\",\"deskripsi\":\"Penyakit layu yang disebabkan oleh jamur Fusarium oxysporum. Gejala khas adalah daun menguning dan layu mulai dari bawah.\",\"solusi\":\"Cabut dan musnahkan tanaman sakit. Gunakan fungisida berbahan aktif benomil.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"cf_value\":0.88304,\"percentage\":88.3},{\"penyakit\":{\"id\":3,\"kode\":\"P03\",\"nama\":\"Busuk Buah (Antraknosa)\",\"deskripsi\":\"Disebabkan jamur Colletotrichum. Menyerang buah cabai, menimbulkan bercak coklat kehitaman.\",\"solusi\":\"Semprot fungisida, atur jarak tanam agar tidak terlalu lembab.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"cf_value\":0.6976000000000001,\"percentage\":69.76},{\"penyakit\":{\"id\":4,\"kode\":\"P04\",\"nama\":\"Bercak Daun\",\"deskripsi\":\"Disebabkan jamur Cercospora capsici. Terdapat bercak bulat kecil berwarna abu-abu dengan tepi coklat pada daun.\",\"solusi\":\"Sanitasi kebun, musnahkan daun terinfeksi, semprot fungisida.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"cf_value\":0.27999999999999997,\"percentage\":28}]', '[{\"penyakit\":{\"id\":4,\"kode\":\"P04\",\"nama\":\"Bercak Daun\",\"deskripsi\":\"Disebabkan jamur Cercospora capsici. Terdapat bercak bulat kecil berwarna abu-abu dengan tepi coklat pada daun.\",\"solusi\":\"Sanitasi kebun, musnahkan daun terinfeksi, semprot fungisida.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"wp_value\":0.574499579280828,\"percentage\":57.45},{\"penyakit\":{\"id\":3,\"kode\":\"P03\",\"nama\":\"Busuk Buah (Antraknosa)\",\"deskripsi\":\"Disebabkan jamur Colletotrichum. Menyerang buah cabai, menimbulkan bercak coklat kehitaman.\",\"solusi\":\"Semprot fungisida, atur jarak tanam agar tidak terlalu lembab.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"wp_value\":0.28100593392138723,\"percentage\":28.1},{\"penyakit\":{\"id\":2,\"kode\":\"P02\",\"nama\":\"Layu Bakteri\",\"deskripsi\":\"Disebabkan oleh bakteri Ralstonia solanacearum. Tanaman layu mendadak dan batang mengeluarkan lendir putih jika dipotong.\",\"solusi\":\"Perbaiki drainase, rotasi tanaman, dan gunakan bakterisida.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"wp_value\":0.09726581948361743,\"percentage\":9.73},{\"penyakit\":{\"id\":1,\"kode\":\"P01\",\"nama\":\"Layu Fusarium\",\"deskripsi\":\"Penyakit layu yang disebabkan oleh jamur Fusarium oxysporum. Gejala khas adalah daun menguning dan layu mulai dari bawah.\",\"solusi\":\"Cabut dan musnahkan tanaman sakit. Gunakan fungisida berbahan aktif benomil.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"wp_value\":0.04722866731416754,\"percentage\":4.72}]', 2, 0.95952, '{\"1\":\"1\",\"2\":\"0.4\",\"3\":\"0.2\",\"5\":\"0.2\",\"6\":\"0.6\",\"7\":\"1\",\"9\":\"0.8\",\"10\":\"0.2\",\"13\":\"0.8\",\"14\":\"1\",\"15\":\"0.4\"}', '2025-12-24 22:01:19', '2025-12-24 22:01:19'),
(3, 'Hariyanti', '2025-12-25 12:09:29', '[{\"penyakit\":{\"id\":2,\"kode\":\"P02\",\"nama\":\"Layu Bakteri\",\"deskripsi\":\"Disebabkan oleh bakteri Ralstonia solanacearum. Tanaman layu mendadak dan batang mengeluarkan lendir putih jika dipotong.\",\"solusi\":\"Perbaiki drainase, rotasi tanaman, dan gunakan bakterisida.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"cf_value\":0.96416,\"percentage\":96.42},{\"penyakit\":{\"id\":1,\"kode\":\"P01\",\"nama\":\"Layu Fusarium\",\"deskripsi\":\"Penyakit layu yang disebabkan oleh jamur Fusarium oxysporum. Gejala khas adalah daun menguning dan layu mulai dari bawah.\",\"solusi\":\"Cabut dan musnahkan tanaman sakit. Gunakan fungisida berbahan aktif benomil.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"cf_value\":0.8830399999999999,\"percentage\":88.3},{\"penyakit\":{\"id\":4,\"kode\":\"P04\",\"nama\":\"Bercak Daun\",\"deskripsi\":\"Disebabkan jamur Cercospora capsici. Terdapat bercak bulat kecil berwarna abu-abu dengan tepi coklat pada daun.\",\"solusi\":\"Sanitasi kebun, musnahkan daun terinfeksi, semprot fungisida.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"cf_value\":0.398,\"percentage\":39.8},{\"penyakit\":{\"id\":3,\"kode\":\"P03\",\"nama\":\"Busuk Buah (Antraknosa)\",\"deskripsi\":\"Disebabkan jamur Colletotrichum. Menyerang buah cabai, menimbulkan bercak coklat kehitaman.\",\"solusi\":\"Semprot fungisida, atur jarak tanam agar tidak terlalu lembab.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"cf_value\":0.36000000000000004,\"percentage\":36}]', '[{\"penyakit\":{\"id\":3,\"kode\":\"P03\",\"nama\":\"Busuk Buah (Antraknosa)\",\"deskripsi\":\"Disebabkan jamur Colletotrichum. Menyerang buah cabai, menimbulkan bercak coklat kehitaman.\",\"solusi\":\"Semprot fungisida, atur jarak tanam agar tidak terlalu lembab.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"wp_value\":0.6969438885997026,\"percentage\":69.69},{\"penyakit\":{\"id\":2,\"kode\":\"P02\",\"nama\":\"Layu Bakteri\",\"deskripsi\":\"Disebabkan oleh bakteri Ralstonia solanacearum. Tanaman layu mendadak dan batang mengeluarkan lendir putih jika dipotong.\",\"solusi\":\"Perbaiki drainase, rotasi tanaman, dan gunakan bakterisida.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"wp_value\":0.1685661273207761,\"percentage\":16.86},{\"penyakit\":{\"id\":4,\"kode\":\"P04\",\"nama\":\"Bercak Daun\",\"deskripsi\":\"Disebabkan jamur Cercospora capsici. Terdapat bercak bulat kecil berwarna abu-abu dengan tepi coklat pada daun.\",\"solusi\":\"Sanitasi kebun, musnahkan daun terinfeksi, semprot fungisida.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"wp_value\":0.10120906102969479,\"percentage\":10.12},{\"penyakit\":{\"id\":1,\"kode\":\"P01\",\"nama\":\"Layu Fusarium\",\"deskripsi\":\"Penyakit layu yang disebabkan oleh jamur Fusarium oxysporum. Gejala khas adalah daun menguning dan layu mulai dari bawah.\",\"solusi\":\"Cabut dan musnahkan tanaman sakit. Gunakan fungisida berbahan aktif benomil.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"wp_value\":0.0332809230498265,\"percentage\":3.33}]', 2, 0.96416, '{\"1\":\"0.4\",\"2\":\"1\",\"3\":\"0.2\",\"5\":\"0.2\",\"6\":\"0.4\",\"7\":\"1\",\"8\":\"0.8\",\"11\":\"0.4\",\"14\":\"0.6\",\"15\":\"0.2\",\"18\":\"0.6\",\"20\":\"1\"}', '2025-12-24 22:09:29', '2025-12-24 22:09:29'),
(4, 'Hartini', '2025-12-25 20:29:55', '[{\"penyakit\":{\"id\":2,\"kode\":\"P02\",\"nama\":\"Layu Bakteri\",\"deskripsi\":\"Disebabkan oleh bakteri Ralstonia solanacearum. Tanaman layu mendadak dan batang mengeluarkan lendir putih jika dipotong.\",\"solusi\":\"Perbaiki drainase, rotasi tanaman, dan gunakan bakterisida.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"cf_value\":0.953632,\"percentage\":95.36},{\"penyakit\":{\"id\":1,\"kode\":\"P01\",\"nama\":\"Layu Fusarium\",\"deskripsi\":\"Penyakit layu yang disebabkan oleh jamur Fusarium oxysporum. Gejala khas adalah daun menguning dan layu mulai dari bawah.\",\"solusi\":\"Cabut dan musnahkan tanaman sakit. Gunakan fungisida berbahan aktif benomil.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"cf_value\":0.588736,\"percentage\":58.87},{\"penyakit\":{\"id\":3,\"kode\":\"P03\",\"nama\":\"Busuk Buah (Antraknosa)\",\"deskripsi\":\"Disebabkan jamur Colletotrichum. Menyerang buah cabai, menimbulkan bercak coklat kehitaman.\",\"solusi\":\"Semprot fungisida, atur jarak tanam agar tidak terlalu lembab.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"cf_value\":0.548416,\"percentage\":54.84},{\"penyakit\":{\"id\":4,\"kode\":\"P04\",\"nama\":\"Bercak Daun\",\"deskripsi\":\"Disebabkan jamur Cercospora capsici. Terdapat bercak bulat kecil berwarna abu-abu dengan tepi coklat pada daun.\",\"solusi\":\"Sanitasi kebun, musnahkan daun terinfeksi, semprot fungisida.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"cf_value\":0.4496,\"percentage\":44.96}]', '[{\"penyakit\":{\"id\":4,\"kode\":\"P04\",\"nama\":\"Bercak Daun\",\"deskripsi\":\"Disebabkan jamur Cercospora capsici. Terdapat bercak bulat kecil berwarna abu-abu dengan tepi coklat pada daun.\",\"solusi\":\"Sanitasi kebun, musnahkan daun terinfeksi, semprot fungisida.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"wp_value\":0.480738562867902,\"percentage\":48.07},{\"penyakit\":{\"id\":2,\"kode\":\"P02\",\"nama\":\"Layu Bakteri\",\"deskripsi\":\"Disebabkan oleh bakteri Ralstonia solanacearum. Tanaman layu mendadak dan batang mengeluarkan lendir putih jika dipotong.\",\"solusi\":\"Perbaiki drainase, rotasi tanaman, dan gunakan bakterisida.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"wp_value\":0.27458218387649785,\"percentage\":27.46},{\"penyakit\":{\"id\":3,\"kode\":\"P03\",\"nama\":\"Busuk Buah (Antraknosa)\",\"deskripsi\":\"Disebabkan jamur Colletotrichum. Menyerang buah cabai, menimbulkan bercak coklat kehitaman.\",\"solusi\":\"Semprot fungisida, atur jarak tanam agar tidak terlalu lembab.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"wp_value\":0.19046700624195756,\"percentage\":19.05},{\"penyakit\":{\"id\":1,\"kode\":\"P01\",\"nama\":\"Layu Fusarium\",\"deskripsi\":\"Penyakit layu yang disebabkan oleh jamur Fusarium oxysporum. Gejala khas adalah daun menguning dan layu mulai dari bawah.\",\"solusi\":\"Cabut dan musnahkan tanaman sakit. Gunakan fungisida berbahan aktif benomil.\",\"gambar\":null,\"created_at\":\"2025-12-24T15:12:10.000000Z\",\"updated_at\":\"2025-12-24T15:12:10.000000Z\"},\"wp_value\":0.054212247013642564,\"percentage\":5.42}]', 2, 0.953632, '{\"1\":\"0.2\",\"2\":\"0.4\",\"3\":\"0.2\",\"5\":\"0.4\",\"6\":\"0.6\",\"7\":\"0.8\",\"8\":\"0.8\",\"10\":\"0.2\",\"11\":\"0.4\",\"13\":\"0.2\",\"14\":\"0.2\",\"15\":\"0.2\",\"16\":\"0.4\",\"19\":\"0.2\",\"20\":\"1\"}', '2025-12-25 06:29:55', '2025-12-25 06:29:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_25_072059_add_avatar_to_users_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakits`
--

CREATE TABLE `penyakits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `solusi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyakits`
--

INSERT INTO `penyakits` (`id`, `kode`, `nama`, `deskripsi`, `solusi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'P01', 'Layu Fusarium', 'Penyakit layu yang disebabkan oleh jamur Fusarium oxysporum. Gejala khas adalah daun menguning dan layu mulai dari bawah.', 'Cabut dan musnahkan tanaman sakit. Gunakan fungisida berbahan aktif benomil.', NULL, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(2, 'P02', 'Layu Bakteri', 'Disebabkan oleh bakteri Ralstonia solanacearum. Tanaman layu mendadak dan batang mengeluarkan lendir putih jika dipotong.', 'Perbaiki drainase, rotasi tanaman, dan gunakan bakterisida.', NULL, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(3, 'P03', 'Busuk Buah (Antraknosa)', 'Disebabkan jamur Colletotrichum. Menyerang buah cabai, menimbulkan bercak coklat kehitaman.', 'Semprot fungisida, atur jarak tanam agar tidak terlalu lembab.', NULL, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(4, 'P04', 'Bercak Daun', 'Disebabkan jamur Cercospora capsici. Terdapat bercak bulat kecil berwarna abu-abu dengan tepi coklat pada daun.', 'Sanitasi kebun, musnahkan daun terinfeksi, semprot fungisida.', NULL, '2025-12-24 08:12:10', '2025-12-24 08:12:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rules`
--

CREATE TABLE `rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penyakit_id` bigint(20) UNSIGNED NOT NULL,
  `gejala_id` bigint(20) UNSIGNED NOT NULL,
  `cf_pakar` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rules`
--

INSERT INTO `rules` (`id`, `penyakit_id`, `gejala_id`, `cf_pakar`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0.8, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(2, 1, 2, 0.8, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(3, 1, 4, 0.6, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(4, 1, 5, 0.7, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(5, 2, 6, 0.9, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(6, 2, 7, 0.8, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(7, 2, 8, 0.9, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(8, 2, 9, 0.7, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(9, 3, 10, 0.8, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(10, 3, 11, 0.9, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(11, 3, 12, 0.7, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(12, 3, 13, 0.8, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(13, 4, 15, 0.7, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(14, 4, 16, 0.9, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(15, 4, 17, 0.6, '2025-12-24 08:12:10', '2025-12-24 08:12:10'),
(16, 4, 18, 0.5, '2025-12-24 08:12:10', '2025-12-24 08:12:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MPPtgllyzlRCrbrQSokRlwVdLipQIgE0AtwiGmMw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNEFkbE5DZ1NaOFVyMWszOHp0VlY0VldVRktKWFZac245YVBnekpXOSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9nZWphbGEiO3M6NToicm91dGUiO3M6MTg6ImFkbWluLmdlamFsYS5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766647431),
('tXAHnBQfVNSI5bbW65E0qE2TxWsIzABMF3WpKJIH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHV1dmpFUDdDU1VRRklYZlRpeVdGUkxrMTdMMUFDWHlUMGF6TGdZUiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9oYXNpbC80IjtzOjU6InJvdXRlIjtzOjI1OiJmcm9udC5jb25zdWx0YXRpb24ucmVzdWx0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766669396);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Ganteng', NULL, 'admin@example.com', NULL, '$2y$12$izO39ew6ehybHeuNMT3oLeyoapH9ICCPHZU36YBsibVrWWaL0TA/y', NULL, '2025-12-25 04:42:27', '2025-12-25 04:42:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gejalas`
--
ALTER TABLE `gejalas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsultasis`
--
ALTER TABLE `konsultasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyakit_terpilih_id` (`penyakit_terpilih_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penyakits`
--
ALTER TABLE `penyakits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyakit_id` (`penyakit_id`),
  ADD KEY `gejala_id` (`gejala_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gejalas`
--
ALTER TABLE `gejalas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `konsultasis`
--
ALTER TABLE `konsultasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penyakits`
--
ALTER TABLE `penyakits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `rules`
--
ALTER TABLE `rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `konsultasis`
--
ALTER TABLE `konsultasis`
  ADD CONSTRAINT `konsultasis_ibfk_1` FOREIGN KEY (`penyakit_terpilih_id`) REFERENCES `penyakits` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_ibfk_1` FOREIGN KEY (`penyakit_id`) REFERENCES `penyakits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rules_ibfk_2` FOREIGN KEY (`gejala_id`) REFERENCES `gejalas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
