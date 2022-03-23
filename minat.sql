-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 04:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minat`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggaltes` date DEFAULT NULL,
  `R` float NOT NULL,
  `I` float NOT NULL,
  `A` float NOT NULL,
  `S` float NOT NULL,
  `E` float NOT NULL,
  `C` float NOT NULL,
  `kode` varchar(11) NOT NULL,
  `durasi` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_user`, `tanggaltes`, `R`, `I`, `A`, `S`, `E`, `C`, `kode`, `durasi`) VALUES
(111, 34, '2021-10-16', 0.545455, 0.363636, 66, 0.727273, 0.181818, 0.0909091, 'SRI', '00:02:57'),
(112, 36, '2021-10-16', 0.545455, 0.363636, 66, 0.727273, 0.181818, 0.0909091, 'SRI', '00:05:15'),
(113, 36, '2021-10-18', 1, 1, 66, 0.727273, 0.222222, 0.2, 'RIS', '00:01:57'),
(114, 36, '2021-10-18', 0.454545, 0.272727, 66, 0.727273, 0.181818, 0.0909091, 'SRI', '00:01:08'),
(115, 36, '2021-10-18', 0.625, 0.3, 66, 0.8, 0.181818, 0.0909091, 'SRI', '00:01:03'),
(116, 36, '2021-10-18', 0.5, 0.75, 66, 0.727273, 0.666667, 0.333333, 'ISE', '00:01:04'),
(117, 36, '2021-10-18', 1, 1, 66, 1, 1, 1, 'ACI', '00:00:32'),
(118, 36, '2021-10-18', 0.454545, 0.272727, 66, 0.727273, 0.4, 0.2, 'SAE', '00:01:06'),
(132, 38, '2021-10-29', 0.636364, 0.727273, 5, 0.727273, 0.909091, 0.545455, 'AEI', '00:02:24'),
(133, 39, '2021-10-29', 0.181818, 0.818182, 5, 0.727273, 0.818182, 0.636364, 'EIS', '00:02:08'),
(134, 36, '2021-10-29', 0.818182, 1, 4, 0.272727, 0.272727, 0.727273, 'IRC', '00:02:06'),
(135, 40, '2021-10-29', 0.727273, 0.727273, 4, 0.909091, 0.818182, 0.909091, 'SAC', '00:01:58'),
(136, 41, '2021-10-29', 0.0909091, 0.272727, 5, 0.181818, 0, 0.0909091, 'ISR', '00:01:32'),
(137, 42, '2021-10-29', 0, 0, 5, 0.818182, 0.363636, 0.0909091, 'SAE', '00:02:03'),
(138, 38, '2021-10-31', 0.454545, 0.818182, 4, 0.727273, 0.818182, 1, 'ACI', '00:01:53'),
(139, 36, '2021-10-31', 0.727273, 0.909091, 5, 0.181818, 0.636364, 0.545455, 'IRE', '00:01:55'),
(140, 40, '2021-10-31', 0.545455, 0.727273, 4, 0.909091, 0.818182, 1, 'SAC', '00:01:53'),
(141, 39, '2021-10-31', 0.363636, 0.727273, 5, 0.545455, 0.818182, 0.454545, 'EIA', '00:02:16'),
(142, 41, '2021-10-31', 0.0909091, 0.272727, 5, 0.181818, 0, 0.0909091, 'ISR', '00:01:35'),
(143, 42, '2021-10-31', 0, 0, 5, 0.636364, 0.363636, 0.181818, 'SAE', '00:01:50'),
(144, 43, '2021-11-19', 1, 1, 4, 1, 1, 1, 'ACI', '00:01:11'),
(145, 43, '2021-11-19', 0.545455, 0.363636, 5, 0.727273, 0.181818, 0.0909091, 'SRI', '00:01:24'),
(146, 43, '2021-11-19', 0.454545, 0.272727, 5, 0.727273, 0.181818, 0.0909091, 'SRI', '00:00:57'),
(147, 43, '2021-11-19', 0, 1, 4, 1, 0, 1, 'ICS', '00:01:06'),
(148, 43, '2021-11-19', 1, 0, 5, 0, 1, 0, 'AER', '00:01:04'),
(149, 43, '2021-11-19', 0, 1, 4, 1, 1, 1, 'ACI', '00:01:07'),
(150, 45, '2021-11-20', 0.454545, 0.272727, 5, 0.272727, 0.727273, 0.181818, 'ERS', '00:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `kode`
--

CREATE TABLE `kode` (
  `id_kode` int(11) NOT NULL,
  `kode1` varchar(11) NOT NULL,
  `kode2` varchar(11) NOT NULL,
  `kode3` varchar(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `jurusan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode`
--

INSERT INTO `kode` (`id_kode`, `kode1`, `kode2`, `kode3`, `kode`, `jurusan`) VALUES
(2, 'A', 'E', 'I', 'AEI', 'Jurnalistik / Penyiar, Ilmu Bahasa'),
(3, 'A', 'E', 'S', 'AES', 'Bhs. Inggris, Seni Rupa, Desain Grafis, Desain Interior, Jurnalistik, Multimedia, Musik, Komposisi Musik, Pendidikan Musik, Fotografi, Desain Komunikasi Visual'),
(4, 'A', 'I', 'E', 'AIE', 'Filsafat'),
(5, 'A', 'I', 'R', 'AIR', 'Arsitektur, Produksi Media'),
(6, 'A', 'I', 'S', 'AIS', 'Bhs. Inggris, Agama, Bhs. Prancis, Filsafat, Bhs Rusia, Spanyol, atau Jerman'),
(7, 'A', 'R', 'E', 'ARE', 'Seni, Mode (Fashion), Desain Grafis'),
(8, 'A', 'R', 'S', 'ARS', 'Desain Interior'),
(9, 'A', 'S', 'E', 'ASE', 'Pendidikan Seni, Pendidikan Bhs Inggris, Seni Lukis, Pendidikan Agama, Drama / Seni Teater, Ilmu Bumi / Kebumian'),
(10, 'A', 'S', 'I', 'ASI', 'Seni, Seni Terapan, Seni dan Ilmu Media, Musik, Komposisi Musik'),
(11, 'A', 'S', 'R', 'ASR', 'Seni Tari'),
(12, 'C', 'E', 'I', 'CEI', 'Akuntansi, Statistik Bisnis'),
(13, 'C', 'E', 'R', 'CER', 'Manajemen Logistik'),
(14, 'C', 'I', 'E', 'CIE', 'Akuntansi, Bisnis'),
(15, 'C', 'I', 'R', 'CIR', 'Bisnis'),
(16, 'C', 'R', 'S', 'CRS', 'Akuntansi'),
(17, 'E', 'A', 'S', 'EAS', 'Ilmu Komunikasi, Periklanan, Jurnalistik / Hubungan Masyarakat, Hukum'),
(18, 'E', 'C', 'I', 'ECI', 'Keuangan'),
(19, 'E', 'I', 'A', 'EIA', 'Ilmu Politik'),
(20, 'E', 'I', 'C', 'EIC', 'Bisnis Internasional'),
(21, 'E', 'I', 'R', 'EIR', 'Teknik Industri'),
(22, 'E', 'I', 'S', 'EIS', 'Manajemen'),
(23, 'E', 'R', 'C', 'ERC', 'Bisnis'),
(24, 'E', 'R', 'I', 'ERI', 'Teknik Industri'),
(25, 'E', 'R', 'S', 'ERS', 'Manajemen, Pemasaran'),
(26, 'E', 'S', 'A', 'ESA', 'Hubungan Masyarakat'),
(27, 'E', 'S', 'C', 'ESC', 'Bisnis, Keuangan, Manajemen Pelayanan Kesehatan, Hubungan Masyarakat, Manajemen Sumber Daya Manusia, Pemasaran, Administrasi Publik, Pariwisata'),
(28, 'E', 'S', 'I', 'ESI', 'Hubungan Internasional, Ilmu Politik'),
(29, 'E', 'S', 'R', 'ESR', 'Pendidikan Bisnis, Keuangan, Manajemen Keuangan, Manajemen Persediaan'),
(30, 'I', 'A', 'R', 'IAR', 'Antropologi, Ilmu Astronomi, Biokimia, Biologi'),
(31, 'I', 'A', 'S', 'IAS', 'Ekonomi, Sosiologi'),
(32, 'I', 'C', 'A', 'ICA', 'Matematika'),
(33, 'I', 'C', 'E', 'ICE', 'Ekonomi, Manajemen Informatika'),
(34, 'I', 'C', 'S', 'ICS', 'Sistem Informasi'),
(35, 'I', 'E', 'C', 'IEC', 'Ilmu Komputer'),
(36, 'I', 'E', 'R', 'IER', 'Matematika, Farmasi'),
(37, 'I', 'E', 'S', 'IES', 'Ilmu Komputer dan Informasi, Peradilan Pidana, Ekonomi, Manajemen, Sosiologi'),
(38, 'I', 'R', 'C', 'IRC', 'Kimia, Ilmu Komputer, Ilmu Lingkungan, Ilmu Forensik'),
(39, 'I', 'R', 'E', 'IRE', 'Antropologi, Biokimia, Biologi, Teknik Biomedis, Pertanian, Kimia, Teknik Listrik / Elektro, Ilmu Kesehatan Lingkungan, Ilmu Olahraga, Geografi dan Geosains, Sistem Informasi, Komputasi Matematika, Matematika, Teknik Mesin, Fisika, Statistika, Ilmu Binatang / Hewan'),
(40, 'I', 'R', 'S', 'IRS', 'Pertanian, Ilmu Laboratorium Klinis / Analis Kesehatan, Kedokteran Gigi, Sistem Informasi Geografis, Geologi, Informatika, Mikrobiologi, Teknik Kedokteran Nuklir, Fisioterapi'),
(41, 'I', 'S', 'A', 'ISA', 'Ilmu Laboratorium Klinis / Teknologi Medis, Psikologi'),
(42, 'I', 'S', 'C', 'ISC', 'Administrasi Informasi Kesehatan'),
(43, 'I', 'S', 'E', 'ISE', 'Teknik Radiologi, Psikologi'),
(44, 'I', 'S', 'R', 'ISR', 'Ilmu Kedokteran, Pendidikan IPA'),
(45, 'R', 'E', 'C', 'REC', 'Hukum Administrasi'),
(46, 'R', 'E', 'I', 'REI', 'Teknologi Manajemen Rekayasa Konstruksi'),
(47, 'R', 'E', 'S', 'RES', 'Ilmu Terapan, Manajemen Teknologi'),
(48, 'R', 'I', 'E', 'RIE', 'Komputer dan Teknologi Informasi'),
(49, 'R', 'I', 'S', 'RIS', 'Fisioterapi, Teknik Komputer'),
(50, 'R', 'S', 'I', 'RSI', 'Ilmu Paramedis'),
(51, 'S', 'A', 'C', 'SAC', 'Pendidikan Dasar / SD'),
(52, 'S', 'A', 'E', 'SAE', 'Pendidikan Biologi, Komunikasi, Pendidikan Bahasa Inggris, Pendidikan Kesehatan, Pendidikan Sejarah, Pendidikan Jurnalistik, Pendidikan Matematika, Ilmu Bumi / Kebumian, Pendidikan Agama'),
(53, 'S', 'A', 'I', 'SAI', 'Pendidikan Kimia, Kesehatan Gigi, Pendidikan Bahasa Asing, Pendidikan Sastra Bahasa, Pendidikan Matematika, Pendidikan Musik, Filsafat'),
(54, 'S', 'C', 'E', 'SCE', 'Manajemen Pelayanan Kesehatan'),
(55, 'S', 'C', 'I', 'SCI', 'Bioteknologi'),
(56, 'S', 'E', 'A', 'SEA', 'Pendidikan Sekolah Dasar, Pengembangan Keluarga & Manusia, Pendidikan Kesehatan dan Promosi Kesehatan'),
(57, 'S', 'E', 'C', 'SEC', 'Pendidikan Usia Dini (PAUD / KB / TK), Pendidikan Sekolah Dasar, Manajemen Sumber Daya Manusia, Pekerja Sosial (Bimbingan Konseling, Psikologi, dll)'),
(58, 'S', 'E', 'I', 'SEI', 'Politik, Sejarah, Ilmu Politik'),
(59, 'S', 'E', 'R', 'SER', 'Ilmu Olahraga, Pendidikan Fisika'),
(60, 'S', 'I', 'A', 'SIA', 'Konseling, Pendidikan Matematika, Perawat, Pendidikan Ilmu Sosial, Pekerja Sosial (Bimbingan Konseling, Psikologi, dll), Pendidikan Luar Biasa'),
(61, 'S', 'I', 'C', 'SIC', 'Perawat'),
(62, 'S', 'I', 'E', 'SIE', 'Ilmu Lingkungan, Perawat, Psikologi'),
(63, 'S', 'I', 'R', 'SIR', 'Ilmu Olahraga'),
(64, 'S', 'R', 'E', 'SRE', 'Pendidikan Kepelatihan, Kesehatan dan Olahraga, Pendidikan Luar Sekolah, Fisioterapi'),
(65, 'S', 'R', 'I', 'SRI', 'Fisioterapi');

-- --------------------------------------------------------

--
-- Table structure for table `kode_satuan`
--

CREATE TABLE `kode_satuan` (
  `id_kode1` int(11) NOT NULL,
  `kode_huruf` varchar(1) NOT NULL,
  `nama_kode` varchar(30) NOT NULL,
  `keterangan` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode_satuan`
--

INSERT INTO `kode_satuan` (`id_kode1`, `kode_huruf`, `nama_kode`, `keterangan`) VALUES
(8, 'R', 'Realistik', 'Tipe realistik merupakan tipe seseorang yang menyukai aktivitas yang melibatkan kemampuan mekanis dan fisik. Kamu dapat menemukan mereka pada bidang konstruksi, kesehatan dan kebugaran, olahraga dan rekreasi, perbaikan, teknologi dan kegiatan yang serupa. Mereka lebih suka mengerjakan kegiatan menggunakan alat atau menggunakan tangan secara langsung serta berkegiatan di luar ruangan yang banyak petualangan. Mereka lebih berorientasi pada hasil yang nyata dan langsung.'),
(9, 'I', 'Investigatif', 'Tipe investigatif adalah tipe seseorang yang senang dengan kegiatan mengumpulkan, menganalisis, dan menafsirkan informasi, serta mengungkap fakta atau teori baru. Mereka lebih menyukai sesuatu yang berkaitan dengan ilmu pengetahuan dan memiliki rasa ingin tahu. Seseorang dengan tipe investigatif dapat kamu temui di lingkungan akademik atau penelitian yang memungkinkan mereka mengembangkan ide. Mereka lebih senang bekerja sendiri daripada dalam kelompok. Mereka dimotivasi oleh rasa ingin tahu, belajar, dan pengetahuan.'),
(10, 'A', 'Artistik', 'Tipe artistik adalah tipe seseorang yang senang dengan nilai estetika dan membutuhkan ekspresi diri. Mereka kurang menyukai hal-hal yang sistematik, teratur, dan rutin. Mereka mengekspresikan diri dengan rekreasi atau kegiatan seni. Motivasi mereka adalah untuk mengekspresikan diri.'),
(11, 'S', 'Sosial', 'Tipe sosial adalah tipe seseorang yang senang dengan kegiatan yang bekerja dengan orang lain. Pekerjaan yang mereka lakukan biasanya dalam bidang pengajaran, konseling, dan layanan pelanggan. Seseorang dengan tipe sosial dapat kamu temui di lingkungan sosial, yang memungkinkan mereka untuk berinteraksi secara teratur dengan banyak orang, bekerja dalam kelompok, dan memecahkan masalah dengan berbagi pikiran dan perasaan. Motivasi mereka adalah dalam hal membantu orang banyak.'),
(12, 'E', 'Enterpris', 'Tipe enterpris adalah tipe seseorang yang menyukai kegiatan dibidang mengelola, mengarahkan, atau membujuk orang lain dalam lingkungan bisnis atau perusahaan. Mereka mencari posisi kepemimpinan, kekuasaan, dan status serta senang membimbing orang lain menuju tujuan organisasi tertentu dan kesuksesan ekonomi. Mereka juga paling mungkin mengambil risiko pribadi dan keuangan. Mereka termotivasi oleh kemampuan mereka untuk membujuk orang lain.'),
(13, 'C', 'Konvensional', 'Tipe konvensional adalah tipe seseorang yang senang dengan kegiatan yang detail, organisasi, dan keakuratan data. Mereka sering menikmati kegiatan matematika dan manajemen data dan dapat ditemukan dalam pekerjaan seperti akuntansi, perbankan investasi, dan asuransi. Mereka senang menertibkan data, informasi, dan objek dan dimotivasi oleh tugas-tugas organisasi.');

-- --------------------------------------------------------

--
-- Table structure for table `smt_alternatif`
--

CREATE TABLE `smt_alternatif` (
  `id_alternatif` tinyint(3) UNSIGNED NOT NULL,
  `alternatif` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smt_alternatif`
--

INSERT INTO `smt_alternatif` (`id_alternatif`, `alternatif`) VALUES
(1, 'ACI'),
(2, 'AEI'),
(3, 'AER'),
(4, 'AES'),
(6, 'AIR'),
(7, 'AIS'),
(8, 'ARE'),
(9, 'ARS'),
(10, 'ASE'),
(11, 'ASI'),
(12, 'ASR'),
(13, 'CEI'),
(14, 'CER'),
(15, 'CIE'),
(16, 'CIR'),
(17, 'CRS'),
(18, 'EAS'),
(19, 'ECI'),
(20, 'EIA'),
(21, 'EIC'),
(22, 'EIR'),
(23, 'EIS'),
(24, 'ERC'),
(25, 'ERI'),
(26, 'ERS'),
(27, 'ESA'),
(28, 'ESC'),
(29, 'ESI'),
(30, 'ESR'),
(31, 'IAR'),
(32, 'IAS'),
(33, 'ICA'),
(34, 'ICE'),
(35, 'ICS'),
(36, 'IEC'),
(37, 'IER'),
(38, 'IES'),
(39, 'IRC'),
(40, 'IRE'),
(41, 'IRS'),
(42, 'ISA'),
(43, 'ISC'),
(44, 'ISE'),
(45, 'ISR'),
(46, 'REC'),
(47, 'REI'),
(48, 'RES'),
(49, 'RIE'),
(50, 'RIS'),
(51, 'RSI'),
(52, 'SAC'),
(53, 'SAE'),
(54, 'SAI'),
(55, 'SCE'),
(56, 'SCI'),
(57, 'SEA'),
(58, 'SEC'),
(59, 'SEI'),
(60, 'SER'),
(61, 'SIA'),
(62, 'SIC'),
(63, 'SIE'),
(64, 'SIR'),
(65, 'SRE'),
(66, 'SRI');

-- --------------------------------------------------------

--
-- Table structure for table `smt_data`
--

CREATE TABLE `smt_data` (
  `id_data` int(11) UNSIGNED NOT NULL,
  `id_alternatif` tinyint(3) UNSIGNED DEFAULT NULL,
  `id_kriteria` tinyint(3) UNSIGNED DEFAULT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smt_data`
--

INSERT INTO `smt_data` (`id_data`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 6),
(3, 1, 3, 10),
(4, 1, 4, 3),
(5, 1, 5, 3),
(6, 1, 6, 8),
(7, 2, 1, 3),
(8, 2, 2, 6),
(9, 2, 3, 10),
(10, 2, 4, 3),
(11, 2, 5, 8),
(12, 2, 6, 3),
(13, 3, 1, 6),
(14, 3, 2, 3),
(15, 3, 3, 10),
(16, 3, 4, 3),
(17, 3, 5, 8),
(18, 3, 6, 3),
(19, 4, 1, 3),
(20, 4, 2, 3),
(21, 4, 3, 10),
(22, 4, 4, 6),
(23, 4, 5, 8),
(24, 4, 6, 3),
(25, 5, 1, 3),
(26, 5, 2, 8),
(27, 5, 3, 10),
(28, 5, 4, 3),
(29, 5, 5, 6),
(30, 5, 6, 3),
(31, 6, 1, 6),
(32, 6, 2, 8),
(33, 6, 3, 10),
(34, 6, 4, 3),
(35, 6, 5, 3),
(36, 6, 6, 3),
(37, 7, 1, 3),
(38, 7, 2, 8),
(39, 7, 3, 10),
(40, 7, 4, 6),
(41, 7, 5, 3),
(42, 7, 6, 3),
(43, 8, 1, 8),
(44, 8, 2, 3),
(45, 8, 3, 10),
(46, 8, 4, 3),
(47, 8, 5, 6),
(48, 8, 6, 3),
(49, 9, 1, 8),
(50, 9, 2, 3),
(51, 9, 3, 10),
(52, 9, 4, 6),
(53, 9, 5, 3),
(54, 9, 6, 3),
(55, 10, 1, 3),
(56, 10, 2, 3),
(57, 10, 3, 10),
(58, 10, 4, 8),
(59, 10, 5, 6),
(60, 10, 6, 3),
(61, 11, 1, 3),
(62, 11, 2, 6),
(63, 11, 3, 10),
(64, 11, 4, 8),
(65, 11, 5, 3),
(66, 11, 6, 3),
(67, 12, 1, 6),
(68, 12, 2, 3),
(69, 12, 3, 10),
(70, 12, 4, 8),
(71, 12, 5, 3),
(72, 12, 6, 3),
(73, 13, 1, 3),
(74, 13, 2, 6),
(75, 13, 3, 3),
(76, 13, 4, 3),
(77, 13, 5, 8),
(78, 13, 6, 10),
(79, 14, 1, 6),
(80, 14, 2, 3),
(81, 14, 3, 3),
(82, 14, 4, 3),
(83, 14, 5, 8),
(84, 14, 6, 10),
(85, 15, 1, 3),
(86, 15, 2, 8),
(87, 15, 3, 3),
(88, 15, 4, 3),
(89, 15, 5, 6),
(90, 15, 6, 10),
(91, 16, 1, 6),
(92, 16, 2, 8),
(93, 16, 3, 3),
(94, 16, 4, 3),
(95, 16, 5, 3),
(96, 16, 6, 10),
(97, 17, 1, 8),
(98, 17, 2, 3),
(99, 17, 3, 3),
(100, 17, 4, 6),
(101, 17, 5, 3),
(102, 17, 6, 10),
(103, 18, 1, 3),
(104, 18, 2, 3),
(105, 18, 3, 8),
(106, 18, 4, 6),
(107, 18, 5, 10),
(108, 18, 6, 3),
(109, 19, 1, 3),
(110, 19, 2, 6),
(111, 19, 3, 3),
(112, 19, 4, 3),
(113, 19, 5, 10),
(114, 19, 6, 8),
(115, 20, 1, 3),
(116, 20, 2, 8),
(117, 20, 3, 6),
(118, 20, 4, 3),
(119, 20, 5, 10),
(120, 20, 6, 3),
(121, 21, 1, 3),
(122, 21, 2, 8),
(123, 21, 3, 3),
(124, 21, 4, 3),
(125, 21, 5, 10),
(126, 21, 6, 6),
(127, 22, 1, 6),
(128, 22, 2, 8),
(129, 22, 3, 3),
(130, 22, 4, 3),
(131, 22, 5, 10),
(132, 22, 6, 3),
(133, 23, 1, 3),
(134, 23, 2, 8),
(135, 23, 3, 3),
(136, 23, 4, 6),
(137, 23, 5, 10),
(138, 23, 6, 3),
(139, 24, 1, 8),
(140, 24, 2, 3),
(141, 24, 3, 3),
(142, 24, 4, 3),
(143, 24, 5, 10),
(144, 24, 6, 6),
(145, 25, 1, 8),
(146, 25, 2, 6),
(147, 25, 3, 3),
(148, 25, 4, 3),
(149, 25, 5, 10),
(150, 25, 6, 3),
(151, 26, 1, 8),
(152, 26, 2, 3),
(153, 26, 3, 3),
(154, 26, 4, 6),
(155, 26, 5, 10),
(156, 26, 6, 3),
(157, 27, 1, 3),
(158, 27, 2, 3),
(159, 27, 3, 6),
(160, 27, 4, 8),
(161, 27, 5, 10),
(162, 27, 6, 3),
(163, 28, 1, 3),
(164, 28, 2, 3),
(165, 28, 3, 3),
(166, 28, 4, 8),
(167, 28, 5, 10),
(168, 28, 6, 6),
(169, 29, 1, 3),
(170, 29, 2, 6),
(171, 29, 3, 3),
(172, 29, 4, 8),
(173, 29, 5, 10),
(174, 29, 6, 3),
(175, 30, 1, 6),
(176, 30, 2, 3),
(177, 30, 3, 3),
(178, 30, 4, 8),
(179, 30, 5, 10),
(180, 30, 6, 3),
(181, 31, 1, 6),
(182, 31, 2, 10),
(183, 31, 3, 8),
(184, 31, 4, 3),
(185, 31, 5, 3),
(186, 31, 6, 3),
(187, 32, 1, 3),
(188, 32, 2, 10),
(189, 32, 3, 8),
(190, 32, 4, 6),
(191, 32, 5, 3),
(192, 32, 6, 3),
(193, 33, 1, 3),
(194, 33, 2, 10),
(195, 33, 3, 6),
(196, 33, 4, 3),
(197, 33, 5, 3),
(198, 33, 6, 8),
(199, 34, 1, 3),
(200, 34, 2, 10),
(201, 34, 3, 3),
(202, 34, 4, 3),
(203, 34, 5, 6),
(204, 34, 6, 8),
(205, 35, 1, 3),
(206, 35, 2, 10),
(207, 35, 3, 3),
(208, 35, 4, 6),
(209, 35, 5, 3),
(210, 35, 6, 8),
(211, 36, 1, 3),
(212, 36, 2, 10),
(213, 36, 3, 3),
(214, 36, 4, 3),
(215, 36, 5, 8),
(216, 36, 6, 6),
(217, 37, 1, 6),
(218, 37, 2, 10),
(219, 37, 3, 3),
(220, 37, 4, 3),
(221, 37, 5, 8),
(222, 37, 6, 3),
(223, 38, 1, 3),
(224, 38, 2, 10),
(225, 38, 3, 3),
(226, 38, 4, 6),
(227, 38, 5, 8),
(228, 38, 6, 3),
(229, 39, 1, 8),
(230, 39, 2, 10),
(231, 39, 3, 3),
(232, 39, 4, 3),
(233, 39, 5, 3),
(234, 39, 6, 6),
(235, 40, 1, 8),
(236, 40, 2, 10),
(237, 40, 3, 3),
(238, 40, 4, 3),
(239, 40, 5, 6),
(240, 40, 6, 3),
(241, 41, 1, 8),
(242, 41, 2, 10),
(243, 41, 3, 3),
(244, 41, 4, 6),
(245, 41, 5, 3),
(246, 41, 6, 3),
(247, 42, 1, 3),
(248, 42, 2, 10),
(249, 42, 3, 6),
(250, 42, 4, 8),
(251, 42, 5, 3),
(252, 42, 6, 3),
(253, 43, 1, 3),
(254, 43, 2, 10),
(255, 43, 3, 3),
(256, 43, 4, 8),
(257, 43, 5, 3),
(258, 43, 6, 6),
(259, 44, 1, 3),
(260, 44, 2, 10),
(261, 44, 3, 3),
(262, 44, 4, 8),
(263, 44, 5, 6),
(264, 44, 6, 3),
(265, 45, 1, 6),
(266, 45, 2, 10),
(267, 45, 3, 3),
(268, 45, 4, 8),
(269, 45, 5, 3),
(270, 45, 6, 3),
(271, 46, 1, 10),
(272, 46, 2, 3),
(273, 46, 3, 3),
(274, 46, 4, 3),
(275, 46, 5, 8),
(276, 46, 6, 6),
(277, 47, 1, 10),
(278, 47, 2, 6),
(279, 47, 3, 3),
(280, 47, 4, 3),
(281, 47, 5, 8),
(282, 47, 6, 3),
(283, 48, 1, 10),
(284, 48, 2, 3),
(285, 48, 3, 3),
(286, 48, 4, 6),
(287, 48, 5, 8),
(288, 48, 6, 3),
(289, 49, 1, 10),
(290, 49, 2, 8),
(291, 49, 3, 3),
(292, 49, 4, 3),
(293, 49, 5, 6),
(294, 49, 6, 3),
(295, 50, 1, 10),
(296, 50, 2, 8),
(297, 50, 3, 3),
(298, 50, 4, 6),
(299, 50, 5, 3),
(300, 50, 6, 3),
(301, 51, 1, 10),
(302, 51, 2, 6),
(303, 51, 3, 3),
(304, 51, 4, 8),
(305, 51, 5, 3),
(306, 51, 6, 3),
(307, 52, 1, 3),
(308, 52, 2, 3),
(309, 52, 3, 8),
(310, 52, 4, 10),
(311, 52, 5, 3),
(312, 52, 6, 6),
(313, 53, 1, 3),
(314, 53, 2, 3),
(315, 53, 3, 8),
(316, 53, 4, 10),
(317, 53, 5, 6),
(318, 53, 6, 3),
(319, 54, 1, 3),
(320, 54, 2, 6),
(321, 54, 3, 8),
(322, 54, 4, 10),
(323, 54, 5, 3),
(324, 54, 6, 3),
(325, 55, 1, 3),
(326, 55, 2, 3),
(327, 55, 3, 3),
(328, 55, 4, 10),
(329, 55, 5, 6),
(330, 55, 6, 8),
(331, 56, 1, 3),
(332, 56, 2, 6),
(333, 56, 3, 3),
(334, 56, 4, 10),
(335, 56, 5, 3),
(336, 56, 6, 8),
(337, 57, 1, 3),
(338, 57, 2, 3),
(339, 57, 3, 6),
(340, 57, 4, 10),
(341, 57, 5, 8),
(342, 57, 6, 3),
(343, 58, 1, 3),
(344, 58, 2, 3),
(345, 58, 3, 3),
(346, 58, 4, 10),
(347, 58, 5, 8),
(348, 58, 6, 6),
(349, 59, 1, 3),
(350, 59, 2, 6),
(351, 59, 3, 3),
(352, 59, 4, 10),
(353, 59, 5, 8),
(354, 59, 6, 3),
(355, 60, 1, 6),
(356, 60, 2, 3),
(357, 60, 3, 3),
(358, 60, 4, 10),
(359, 60, 5, 8),
(360, 60, 6, 3),
(361, 61, 1, 3),
(362, 61, 2, 8),
(363, 61, 3, 6),
(364, 61, 4, 10),
(365, 61, 5, 3),
(366, 61, 6, 3),
(367, 62, 1, 3),
(368, 62, 2, 8),
(369, 62, 3, 3),
(370, 62, 4, 10),
(371, 62, 5, 3),
(372, 62, 6, 6),
(373, 63, 1, 3),
(374, 63, 2, 8),
(375, 63, 3, 3),
(376, 63, 4, 10),
(377, 63, 5, 6),
(378, 63, 6, 3),
(379, 64, 1, 6),
(380, 64, 2, 8),
(381, 64, 3, 3),
(382, 64, 4, 10),
(383, 64, 5, 3),
(384, 64, 6, 3),
(385, 65, 1, 8),
(386, 65, 2, 3),
(387, 65, 3, 3),
(388, 65, 4, 10),
(389, 65, 5, 6),
(390, 65, 6, 3),
(391, 66, 1, 8),
(392, 66, 2, 6),
(393, 66, 3, 3),
(394, 66, 4, 10),
(395, 66, 5, 3),
(396, 66, 6, 3),
(397, 0, 1, 1),
(398, 0, 2, 1),
(399, 0, 3, 1),
(400, 0, 4, 1),
(401, 0, 5, 1),
(402, 0, 6, 1),
(403, 68, 1, 1),
(404, 68, 2, 1),
(405, 68, 3, 1),
(406, 68, 4, 1),
(407, 68, 5, 1),
(408, 68, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `smt_kriteria`
--

CREATE TABLE `smt_kriteria` (
  `id_kriteria` tinyint(3) UNSIGNED NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `bobot` float UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smt_kriteria`
--

INSERT INTO `smt_kriteria` (`id_kriteria`, `kriteria`, `bobot`) VALUES
(1, 'R', 1),
(2, 'I', 0.272727),
(3, 'A', 0.272727),
(4, 'S', 0.272727),
(5, 'E', 0.727273),
(6, 'C', 0.181818);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `nomor` int(4) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `tipe`, `nomor`, `pertanyaan`) VALUES
(1, 'Realistik', 1, 'Saya suka memperbaiki peralatan listrik'),
(2, 'Realistik', 2, 'Saya suka memperbaiki mobil atau sepeda'),
(3, 'Realistik', 3, 'Saya suka membuat sesuatu yang baru dari kayu'),
(4, 'Realistik', 4, 'Saya suka merangkai peralatan mekanik'),
(5, 'Realistik', 5, 'Saya suka mengendarai truk atau traktor'),
(6, 'Realistik', 6, 'Saya suka menggunakan peralatan kerja logam atau mesin perkakas'),
(7, 'Realistik', 7, 'Saya suka bekerja di bengkel motor atau mobil'),
(8, 'Realistik', 8, 'Saya suka mempelajari keterampilan'),
(9, 'Realistik', 9, 'Saya suka mempelajari gambar teknik'),
(10, 'Realistik', 10, 'Saya suka mempelajari pertukangan kayu'),
(11, 'Realistik', 11, 'Saya suka mempelajari mekanik mobil'),
(12, 'Investigatif', 1, 'Saya suka membaca buku atau majalah ilmiah'),
(13, 'Investigatif', 2, 'Saya suka bekerja di laboratorium'),
(14, 'Investigatif', 3, 'Saya suka bekerja pada proyek ilmiah'),
(15, 'Investigatif', 4, 'Saya suka membuat model roket'),
(16, 'Investigatif', 5, 'Saya suka bekerja dengan zat-zat kimia'),
(17, 'Investigatif', 6, 'Saya suka membaca mata pelajaran khusus sesuai kesukaan saya'),
(18, 'Investigatif', 7, 'Saya suka menyelesaikan permasalahan matematika atau teka-teki catur'),
(19, 'Investigatif', 8, 'Saya suka mempelajari fisika'),
(20, 'Investigatif', 9, 'Saya suka mempelajari kimia'),
(21, 'Investigatif', 10, 'Saya suka mempelajari geometri'),
(22, 'Investigatif', 11, 'Saya suka mempelajari biologi'),
(23, 'Artistik', 1, 'Saya suka membuat sketsa, gambar, atau lukisan'),
(24, 'Artistik', 2, 'Saya suka menonton drama'),
(25, 'Artistik', 3, 'Saya suka merancang perabotan rumah atau bangunan'),
(26, 'Artistik', 4, 'Saya suka bermain alat musik pada band, grup, atau orkestra'),
(27, 'Artistik', 5, 'Saya suka mempelajari alat musik'),
(28, 'Artistik', 6, 'Saya suka menghadiri pertunjukan konser, atau musikal'),
(29, 'Artistik', 7, 'Saya suka membaca buku fiksi populer'),
(30, 'Artistik', 8, 'Saya suka membuat foto atau potret'),
(31, 'Artistik', 9, 'Saya suka membaca naskah drama'),
(32, 'Artistik', 10, 'Saya suka membaca dan menulis puisi'),
(33, 'Artistik', 11, 'Saya suka mempelajari seni'),
(34, 'Sosial', 1, 'Saya suka menulis dan mengirim surat kepada sahabat pena'),
(35, 'Sosial', 2, 'Saya suka menghadiri diskusi atau ceramah agama'),
(36, 'Sosial', 3, 'Saya suka menjadi anggota kelompok kegiatan sosial'),
(37, 'Sosial', 4, 'Saya suka membantu orang lain memecahkan persoalan pribadinya'),
(38, 'Sosial', 5, 'Saya suka mengasuh bayi atau anak-anak'),
(39, 'Sosial', 6, 'Saya suka menghadiri kegiatan sosial'),
(40, 'Sosial', 7, 'Saya suka menari dan menyanyi bersama'),
(41, 'Sosial', 8, 'Saya suka membaca buku psikologi'),
(42, 'Sosial', 9, 'Saya suka menghadiri pertemuan dan diskusi'),
(43, 'Sosial', 10, 'Saya suka menghadiri pertandingan olahraga'),
(44, 'Sosial', 11, 'Apakah suka bermain bola?'),
(45, 'Enterpris', 1, 'Saya suka membujuk, mempengaruhi, atau menyakinkan orang lain'),
(46, 'Enterpris', 2, 'Saya suka berjualan sesuatu'),
(47, 'Enterpris', 3, 'Saya suka berdiskusi tentang politik'),
(48, 'Enterpris', 4, 'Saya suka menjalankan bisnis di perusahaan pribadi'),
(49, 'Enterpris', 5, 'Saya suka menghadiri konferensi'),
(50, 'Enterpris', 6, 'Saya suka menyampaikan pendapat'),
(51, 'Enterpris', 7, 'Saya suka mengorganisir suatu kegiatan'),
(52, 'Enterpris', 8, 'Saya suka mengawasi dan mensupervisi pekerjaan orang lain'),
(53, 'Enterpris', 9, 'Saya suka menemui orang penting'),
(54, 'Enterpris', 10, 'Saya suka memimpin kelompok kerja dalam mencapai tujuan bersama'),
(55, 'Enterpris', 11, 'Saya suka berpartisipasi dalam kampanye politik'),
(56, 'Konvensional', 1, 'Saya suka menjaga kerapian meja kerja dan ruangan'),
(57, 'Konvensional', 2, 'Saya suka mengetik makalah atau surat untuk diri sendiri atau orang lain'),
(58, 'Konvensional', 3, 'Saya suka menjumlah, mengkali, dan membagi bilangan dalam kegiatan kantor atau pembukuan'),
(59, 'Konvensional', 4, 'Saya suka mengoperasikan alat kantor'),
(60, 'Konvensional', 5, 'Saya suka merinci catatan keuangan'),
(61, 'Konvensional', 6, 'Saya suka mempelajari mengetik'),
(62, 'Konvensional', 7, 'Saya suka mempelajari bisnis'),
(63, 'Konvensional', 8, 'Saya suka mempelajari pembukuan'),
(64, 'Konvensional', 9, 'Saya suka mempelajari matematika komersial'),
(65, 'Konvensional', 10, 'Saya suka melaksanakan kegiatan kearsipan'),
(66, 'Konvensional', 11, 'Saya suka menulis surat bisnis'),
(67, 'Artistik', 12, 'Apakah suka melukis?');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `peran` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempatlahir` varchar(50) NOT NULL,
  `tanggallahir` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `peran`, `username`, `password`, `email`, `nama`, `tempatlahir`, `tanggallahir`, `foto`) VALUES
(21, 'admin', 'admin', '123', 'admin1@gmail.com', 'Admin 1', 'Balikpapan', '1999-09-05', '1320453459_pp-idris.jpg'),
(34, '', 'rasyad', '123', 'rasyaddjibran@gmail.com', 'Rasyad Djibran', 'Malang', '2003-10-23', '776017743_WhatsApp Image 2021-09-28 at 06.56.43.jpeg'),
(35, 'admin', 'admin2', '123', 'admin2@gmail.com', 'admin 2', 'Malang', '2006-03-12', '297692171_WhatsApp Image 2021-09-28 at 06.56.33.jpeg'),
(36, '', 'fikri', '123', 'iksan200512@gmail.com', 'Muhammad Ihsanul Fikri', 'Balikpapan', '2005-12-19', '1879610889_WhatsApp Image 2021-09-28 at 06.56.33.jpeg'),
(38, '', 'afifah', '123', 'afifah.2952@gmail.com', 'Afifah Nida Ul-Haq', 'Balikpapan', '2002-05-29', '1687641065_ppafifah.jpg'),
(39, '', 'firdaus', '123', 'abdullahalfirdausnuzula86@gmail.com', 'Abdullah Al-Firdaus Nuzula', 'Malang', '2006-03-12', '68463809_pp.jpg'),
(40, '', 'nabilah', '123', 'nabilahnrlhq@gmail.com', 'Nabilah Nurul Haq', 'Balikpapan', '2001-05-06', '1919593973_nabilah.jpg'),
(41, '', 'idris', '123', 'idrisridwanulhaq@gmail.com', 'Idris Ridwanul Haq', 'Balikpapan', '1994-08-31', '76622417_pp-idris.jpg'),
(42, '', 'mariyam', '123', 'mariyamalhaq@gmail.com', 'Mariyam Jamilah Tholibatul Haq', 'Balikpapan', '2002-03-11', '1072682979_pp-mariyam.jpg'),
(43, '', 'budi', '123', 'budiraharjo@gmail.com', 'Budi', 'Malang', '1999-01-01', '1094230000_WhatsApp Image 2021-08-16 at 16.17.14.jpeg'),
(45, '', 'afif', '123', 'afifrahar@gmail.com', 'Afif Rahar', 'Malang', '1998-11-01', '1208180084_WhatsApp Image 2021-09-28 at 06.56.33.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kode`
--
ALTER TABLE `kode`
  ADD PRIMARY KEY (`id_kode`);

--
-- Indexes for table `kode_satuan`
--
ALTER TABLE `kode_satuan`
  ADD PRIMARY KEY (`id_kode1`);

--
-- Indexes for table `smt_alternatif`
--
ALTER TABLE `smt_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `smt_data`
--
ALTER TABLE `smt_data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `smt_kriteria`
--
ALTER TABLE `smt_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `kode`
--
ALTER TABLE `kode`
  MODIFY `id_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `kode_satuan`
--
ALTER TABLE `kode_satuan`
  MODIFY `id_kode1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `smt_alternatif`
--
ALTER TABLE `smt_alternatif`
  MODIFY `id_alternatif` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `smt_data`
--
ALTER TABLE `smt_data`
  MODIFY `id_data` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=409;

--
-- AUTO_INCREMENT for table `smt_kriteria`
--
ALTER TABLE `smt_kriteria`
  MODIFY `id_kriteria` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
