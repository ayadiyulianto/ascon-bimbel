-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 12:24 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oasse_bimbel`
--

-- --------------------------------------------------------

--
-- Table structure for table `disc_sesi`
--

CREATE TABLE `disc_sesi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_pengerjaan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah_d` int(3) NOT NULL,
  `jumlah_i` int(3) NOT NULL,
  `jumlah_s` int(3) NOT NULL,
  `jumlah_c` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disc_sesi`
--

INSERT INTO `disc_sesi` (`id`, `id_user`, `waktu_pengerjaan`, `jumlah_d`, `jumlah_i`, `jumlah_s`, `jumlah_c`) VALUES
(2, 5, '2020-01-06 16:44:29', 8, 6, 4, 2),
(3, 5, '2020-01-07 09:05:40', 68, 50, 44, 38),
(4, 5, '2020-01-07 09:12:24', 80, 60, 40, 20),
(5, 5, '2020-01-08 12:10:34', 71, 53, 39, 37),
(6, 5, '2020-02-17 16:53:57', 80, 60, 40, 20);

-- --------------------------------------------------------

--
-- Table structure for table `disc_soal`
--

CREATE TABLE `disc_soal` (
  `id` int(11) NOT NULL,
  `soal_d` varchar(250) NOT NULL,
  `soal_i` varchar(250) NOT NULL,
  `soal_s` varchar(250) NOT NULL,
  `soal_c` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disc_soal`
--

INSERT INTO `disc_soal` (`id`, `soal_d`, `soal_i`, `soal_s`, `soal_c`) VALUES
(1, 'Memberi Semangat', 'Petualang', 'Teliti', 'Mudah Menyesuaikan Diri'),
(2, 'Suka Menggoda', 'Berpendirian Teguh', 'Senang Membujuk', 'Suka Kedamaian'),
(3, 'Pandai Bergaul', 'Berkemauan Kuat', 'Suka Berkorban', 'Suka Mengalah'),
(4, 'Suka Meyakinkan', 'Suka Bersaing', 'Penuh Pertimbangan', 'Senang Dibimbing'),
(5, 'Periang', 'Dihormati / Disegani', 'Senang Menangani Problem', 'Cenderung Rendah Hati'),
(6, 'Semangat', 'Percaya Diri', 'Peka / Perasa', 'Cepat Puas'),
(7, 'Suka Menyanjung / Memuji', 'Berfikir Positif', 'Perencana', 'Sabar'),
(8, 'Spontan', 'Praktis', 'Ketat Pada Waktu', 'Pemalu'),
(9, 'Optimis', 'Suka Bicara Terus Terang', 'Rapi / Teratur', 'Sopan / Hormat'),
(10, 'Suka Senda Gurau', 'Tegar / Kuat Hati', 'Jujur', 'Ramah Tamah'),
(11, 'Menyukai Kenikmatan', 'Berani / Tidak Penakut', 'Rinci / Terperinci', 'Diplomatis / Hati-Hati'),
(12, 'Penggembira', 'Percaya Diri', 'Berbudaya / Terpelajar', 'Konsisten / Tidak Mudah Berubah'),
(13, 'Suka Memberi Ilham / Inspirasi', 'Mandiri', 'Idealis', 'Tidak Suka Menantang'),
(14, 'Lincah / Suka Membuka Diri', 'Mampu Memutuskan', 'Tekun / Ulet', 'Sedikit Humor'),
(15, 'Mudah Berbaur / Bergaul', 'Cepat Bertindak', 'Gemar Musik Lembut', 'Perantara / Penengah'),
(16, 'Senang Berbicara', 'Suka Ngotot Kuat Bertahan', 'Senang Berfikir', 'Bersikap Toleran'),
(17, 'Lincah Bersemangat', 'Senang Membimbing', 'Pendengar yang Baik', 'Setia / Tidak Gampang Berubah'),
(18, 'Lucu / Humor', 'Suka Memimpin', 'Berfikir Matematis', 'Mudah Menerima Saran'),
(19, 'Terkenal Luas / Populer', 'Produktif / Menghasilkan', 'Perfeksionis', 'Suka Mengijinkan / Memperbolehkan'),
(20, 'Bersemangat', 'Berani / Tidak Gampang Takut', 'Berkelakuan Tenang / Kalem', 'Berpendirian Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `id_diskusi` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_konten` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` mediumtext NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `id_user_post` int(11) NOT NULL,
  `waktu_post` datetime NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diskusi`
--

INSERT INTO `diskusi` (`id_diskusi`, `id_kelas`, `id_konten`, `judul`, `isi`, `status`, `id_user_post`, `waktu_post`, `waktu_edit`) VALUES
(1, 7, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Nam porttitor varius mollis. Nullam at eros eget neque dictum accumsan ut a magna. Nam eu metus eget nibh vulputate pretium. Morbi arcu tellus, pulvinar sed libero vitae, feugiat fermentum velit. Duis quam quam, pretium at convallis nec, pulvinar eget lectus. Phasellus luctus tempor odio in pharetra. Sed a est sem. Quisque a ipsum lacus. Vivamus quis urna malesuada, malesuada velit in, porta erat. Nulla id augue eu risus rutrum viverra eu eget ipsum. Nullam ex nisl, cursus fermentum blandit in, ornare eget elit. Proin vitae turpis sed enim bibendum interdum. Proin suscipit sit amet sem id cursus.</p>', 'Y', 3, '2019-12-24 00:00:00', '2020-04-02 11:18:33'),
(2, 7, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Nam porttitor varius mollis. Nullam at eros eget neque dictum accumsan ut a magna. Nam eu metus eget nibh vulputate pretium. Morbi arcu tellus, pulvinar sed libero vitae, feugiat fermentum velit. Duis quam quam, pretium at convallis nec, pulvinar eget lectus. Phasellus luctus tempor odio in pharetra. Sed a est sem. Quisque a ipsum lacus. Vivamus quis urna malesuada, malesuada velit in, porta erat. Nulla id augue eu risus rutrum viverra eu eget ipsum. Nullam ex nisl, cursus fermentum blandit in, ornare eget elit. Proin vitae turpis sed enim bibendum interdum. Proin suscipit sit amet sem id cursus.</p>', 'Y', 3, '2019-12-24 00:00:00', '2020-04-02 11:18:33'),
(3, 7, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Nam porttitor varius mollis. Nullam at eros eget neque dictum accumsan ut a magna. Nam eu metus eget nibh vulputate pretium. Morbi arcu tellus, pulvinar sed libero vitae, feugiat fermentum velit. Duis quam quam, pretium at convallis nec, pulvinar eget lectus. Phasellus luctus tempor odio in pharetra. Sed a est sem. Quisque a ipsum lacus. Vivamus quis urna malesuada, malesuada velit in, porta erat. Nulla id augue eu risus rutrum viverra eu eget ipsum. Nullam ex nisl, cursus fermentum blandit in, ornare eget elit. Proin vitae turpis sed enim bibendum interdum. Proin suscipit sit amet sem id cursus.</p>', 'Y', 3, '2020-01-03 17:11:01', '2020-04-02 11:18:33'),
(4, 7, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Nam porttitor varius mollis. Nullam at eros eget neque dictum accumsan ut a magna. Nam eu metus eget nibh vulputate pretium. Morbi arcu tellus, pulvinar sed libero vitae, feugiat fermentum velit. Duis quam quam, pretium at convallis nec, pulvinar eget lectus. Phasellus luctus tempor odio in pharetra. Sed a est sem. Quisque a ipsum lacus. Vivamus quis urna malesuada, malesuada velit in, porta erat. Nulla id augue eu risus rutrum viverra eu eget ipsum. Nullam ex nisl, cursus fermentum blandit in, ornare eget elit. Proin vitae turpis sed enim bibendum interdum. Proin suscipit sit amet sem id cursus.</p>', 'N', 3, '2020-05-06 10:46:36', '2020-05-06 10:46:36'),
(5, 7, 4, 'Kenapa tugas tidak diterima', '<p>Mohon periksa kembali ketentuan penilaian tugas yang bersangkutan</p>', 'Y', 2, '2020-05-15 15:07:39', '2020-06-11 13:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8 NOT NULL,
  `deskripsi_singkat` varchar(300) NOT NULL,
  `foto_cover` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id_user_post` int(11) NOT NULL,
  `waktu_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug`, `deskripsi_singkat`, `foto_cover`, `id_user_post`, `waktu_post`) VALUES
(1, 'Sekolah Dasar', 'sekolah-dasar', 'Bimbel SD untuk kelas 4, 5, dan 6 SD ini akan memberikan bimbingan belajar untuk pendalaman materi sekolah, melakukan persiapan menjelang ulangan, ujian tengah semester dan ujian akhir semester.', 'Sekolah_Dasar1.jpg', 1, '2020-06-09 00:00:00'),
(2, 'Sekolah Menengah Pertama', 'sekolah-menengah-pertama', '', '', 1, '2020-06-09 00:00:00'),
(3, 'Sekolah Menengah Atas', 'sekolah-menengah-atas', '', '', 1, '2020-06-09 00:00:00'),
(4, 'Persiapan Test', 'persiapan-test', 'Program Bimbingan Belajar Intensif untuk persiapan menghadapi serangkaian tes SBMPTN UTBK 2020 serta seleksi Ujian Mandiri  berbagai Perguruan Tinggi Negeri.', 'Persiapan_Test.png', 1, '2020-06-09 00:00:00'),
(6, 'Pengembangan Diri', 'pengembangan-diri', 'Personal development Specializations and courses teach strategies and frameworks for personal growth, goal setting, and self improvement. You\'ll learn to manage personal finances, deliver effective speeches, make ethical decisions, and think more creatively.', 'Pengembangan_Diri1.jpg', 1, '2020-06-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `deskripsi_singkat` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `is_aktif` enum('Y','N') NOT NULL DEFAULT 'N',
  `is_buka_pendaftaran` enum('Y','N') NOT NULL DEFAULT 'Y',
  `status_verify` enum('New','Verified','Suspended') NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` int(3) NOT NULL,
  `kode_referral` varchar(32) NOT NULL,
  `id_user_post` int(11) NOT NULL,
  `waktu_post` datetime NOT NULL,
  `id_user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_kategori`, `nama_kelas`, `slug`, `deskripsi_singkat`, `foto`, `deskripsi`, `is_aktif`, `is_buka_pendaftaran`, `status_verify`, `harga`, `diskon`, `kode_referral`, `id_user_post`, `waktu_post`, `id_user_edit`, `waktu_edit`) VALUES
(7, 6, 'Belajar Prinsip Pemrograman SOLID', 'belajar-prinsip-pemrograman-solid', 'Jadilah praktisi dalam menciptakan desain aplikasi yang mudah dimengerti, mudah dikelola, dan mudah dikembangkan melalui prinsip SOLID.', 'Belajar_Prinsip_Pemrograman_SOLID.jpg', '<p style=\"text-align: justify; \"><span style=\"font-family: \" ibm=\"\" plex=\"\" sans\";\"=\"\">Semua orang bisa membuat kode program selama dia tahu suatu bahasa pemrograman. Tetapi membuat kode program yang mudah dimengerti, mudah dikelola, dan mudah dikembangkan ada</span>lah tantangan yang nyata, bahkan untuk seorang yang sudah menjadi programmer sekali pun. Tergantung dari paradigma apa yang dipakai, pasti ada solusi yang bisa digunakan untuk menyelesaikan problem tersebut. Di dalam paradigma OOP (object oriented programming&nbsp;atau pemrograman berorientasi object), dikenal prinsip SOLID yang memiliki tujuan untuk membuat kode program lebih mudah dimengerti, mudah dikelola, dan mudah dikembangkan. Robert C Martin (Uncle Bob) adalah seorang&nbsp;engineer&nbsp;dan&nbsp;instructor&nbsp;dari Amerika mengenalkan SOLID di papernya yang berjudul&nbsp;Design Principle and Design Pattern&nbsp;pada tahun 2000.</p><p style=\"text-align: justify; \">Di dalam kelas ini akan dibahas mengenai lima prinsip utama dalam SOLID yaitu&nbsp;Single Responsibility,&nbsp;Open-Closed,&nbsp;Liskov Substitution,&nbsp;Interface Segregation,&nbsp;dan&nbsp;Dependency Inversion. Akan dibahas juga mengenai pilar utama dalam OOP dan hubungan antar objek.</p>', 'Y', 'Y', 'Verified', 300000, 11, '', 2, '2020-04-16 08:28:38', 2, '2020-06-12 10:55:21'),
(8, 6, 'Source Code Management untuk Pemula', 'source-code-management-untuk-pemula', 'Skill coding belumlah cukup, tuntutan industri saat ini mewajibkan seorang developer mampu berkolaborasi dengan developer lainnya.', 'Source_Code_Management_untuk_Pemula.jpg', '<p><span style=\"font-family: \"IBM Plex Sans\";\">Di dalam dunia development aplikasi, source code management (version control) adalah salah satu tools yang bisa digunakan untuk berkolaborasi antara developer. Perusahaan-perusahaan besar di dunia sudah pasti', 'Y', 'Y', 'Suspended', 0, 10, '', 2, '2020-05-11 13:39:29', 2, '2020-06-10 14:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_pengajar`
--

CREATE TABLE `kelas_pengajar` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_post` datetime NOT NULL,
  `has_access` enum('Y','N') NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `kelas_pengajar`
--

INSERT INTO `kelas_pengajar` (`id`, `id_kelas`, `id_user`, `waktu_post`, `has_access`, `role`) VALUES
(10, 7, 2, '2020-04-16 08:28:38', 'Y', 'Utama'),
(17, 7, 3, '2020-04-21 21:38:22', 'Y', 'Pembantu'),
(18, 8, 2, '2020-05-11 13:49:31', 'Y', 'Utama');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_post` datetime NOT NULL,
  `has_access` enum('Y','N') CHARACTER SET utf8 NOT NULL,
  `is_finished` enum('Y','N') CHARACTER SET utf8 NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `id_kelas`, `id_user`, `waktu_post`, `has_access`, `is_finished`) VALUES
(1, 7, 2, '2020-06-10 05:22:12', 'Y', 'N'),
(2, 7, 3, '2020-06-10 05:22:12', 'Y', 'N'),
(5, 8, 2, '2020-06-10 05:22:12', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `konten_siswa`
--

CREATE TABLE `konten_siswa` (
  `id` int(11) NOT NULL,
  `id_konten` int(11) NOT NULL,
  `id_user_siswa` int(11) NOT NULL,
  `is_finished` enum('Y','N') NOT NULL,
  `status` varchar(20) NOT NULL,
  `nilai` int(3) NOT NULL,
  `keterangan` text NOT NULL,
  `catatan_siswa` text NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `konten_siswa`
--

INSERT INTO `konten_siswa` (`id`, `id_konten`, `id_user_siswa`, `is_finished`, `status`, `nilai`, `keterangan`, `catatan_siswa`, `waktu_mulai`, `waktu_selesai`) VALUES
(1, 1, 2, 'Y', '', 0, '', '<p>tidak ada</p>', '2020-04-07 18:55:49', '2020-04-07 18:55:49'),
(3, 2, 2, 'Y', '', 0, '', '', '2020-05-01 11:23:21', '2020-05-01 11:35:16'),
(4, 3, 2, 'Y', 'Berhasil', 100, '', '', '2020-05-01 11:35:25', '2020-06-12 14:17:15'),
(5, 4, 2, 'Y', 'Berhasil', 90, '', '', '2020-05-02 09:50:11', '2020-06-12 15:29:16'),
(6, 5, 2, 'Y', '', 0, '', '', '2020-06-11 15:45:44', '2020-06-12 14:26:12'),
(7, 100, 2, 'N', '', 0, '', '', '2020-06-11 16:04:51', '0000-00-00 00:00:00'),
(8, 100, 2, 'N', '', 0, '', '', '2020-06-11 16:22:25', '0000-00-00 00:00:00'),
(9, 100, 2, 'N', '', 0, '', '', '2020-06-11 16:32:51', '0000-00-00 00:00:00'),
(10, 6, 2, 'Y', '', 0, '', '', '2020-06-12 14:26:14', '2020-06-12 14:27:05'),
(11, 7, 2, 'Y', 'Berhasil', 100, '', '', '2020-06-12 14:27:12', '2020-06-12 15:01:18'),
(12, 8, 2, 'N', '', 0, '', '', '2020-06-12 15:01:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kupon`
--

CREATE TABLE `kupon` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `value` int(11) NOT NULL,
  `quota` int(5) NOT NULL,
  `waktu_post` datetime NOT NULL,
  `waktu_expired` datetime NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `id_user_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kupon`
--

INSERT INTO `kupon` (`id`, `id_kelas`, `code`, `value`, `quota`, `waktu_post`, `waktu_expired`, `status`, `id_user_post`) VALUES
(1, 8, 'BELAJAR', 50000, 0, '2020-06-04 00:00:00', '2020-06-11 00:00:00', 'N', 2),
(2, 8, 'FLASHSALE', 50000, 10, '2020-06-04 00:00:00', '2020-06-04 00:00:00', 'Y', 2),
(3, 7, 'PROMOSI', 50000, 0, '2020-06-11 15:33:45', '2020-06-14 15:33:45', 'Y', 2);

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `url_string` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(500) NOT NULL,
  `waktu_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id`, `id_user`, `id_kelas`, `url_string`, `title`, `subtitle`, `waktu_post`) VALUES
(1, 2, 0, '', 'mendaftar kelas \"Belajar Prinsip Pemrograman SOLID\"', '', '2020-05-26 00:00:00'),
(2, 2, 0, 'welcome/diskusi/1', 'mengunggah topik diskusi #1', 'judul \"kenapa tugas saya tidak diterima\"', '2020-05-27 11:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id` int(2) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `rekening` varchar(100) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode_bayar`
--

INSERT INTO `metode_bayar` (`id`, `jenis`, `rekening`, `atas_nama`, `logo`) VALUES
(1, 'TRANSFER BANK', 'BRI 0987654321', 'PT ASCON INOVASI DATA', 'logo-bri.png'),
(2, 'TRANSFER BANK', 'BNI 0987654321', 'PT ASCON INOVASI DATA', 'logo-bni.jpg'),
(3, 'KARTU KREDIT', 'PAY PAL 0987654321', 'PT ASCON INOVASI DATA', 'logo-paypal.png');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_modul` varchar(100) NOT NULL,
  `deskripsi_singkat` varchar(500) NOT NULL,
  `no_urut` int(2) UNSIGNED NOT NULL,
  `is_aktif` enum('Y','N') NOT NULL,
  `id_user_post` int(11) NOT NULL,
  `id_user_edit` int(11) NOT NULL,
  `waktu_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `waktu_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `id_kelas`, `nama_modul`, `deskripsi_singkat`, `no_urut`, `is_aktif`, `id_user_post`, `id_user_edit`, `waktu_post`, `waktu_edit`) VALUES
(4, 7, 'Object Oriented Programming', 'Paradigma pemrograman itu apa sih? Paradigma pemrograman adalah gaya atau cara kita menulis program. Pada Modul ini kita akan membahas mengenai paradigma OOP (object-oriented programming.)', 1, 'Y', 2, 2, '2020-04-24 08:24:39', '2020-05-15 11:30:59'),
(5, 7, 'Introduction Software Design', 'Kita seringkali mendengar bahwa dalam mengembangkan software, membutuhkan architecture dan design. Sebelumnya, apakah yang dimaksud dengan architecture? dan apakah yang dimaksud design? Apakah kedua h', 2, 'Y', 2, 2, '2020-04-27 14:26:37', '2020-05-15 11:29:34'),
(6, 7, 'Introduction to  SOLID', 'SOLID merupakan kumpulan dari beberapa principle yang diwujudkan oleh engineer-engineer yang ahli dibidangnya. SOLID membantu kita  mengembangkan sebuah perangkat lunak dengan tingkat kekukuhan yang tinggi.', 4, 'Y', 2, 0, '2020-06-12 09:47:22', '2020-06-12 09:47:22'),
(7, 7, 'Unpublish', '', 3, 'N', 2, 0, '2020-06-12 10:37:27', '2020-06-12 10:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `modul_konten`
--

CREATE TABLE `modul_konten` (
  `id_konten` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `judul_konten` varchar(100) NOT NULL,
  `jenis` enum('Text','Video','Latihan','Tugas') NOT NULL,
  `no_urut` int(2) UNSIGNED NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `isi` mediumtext NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `durasi_belajar` int(3) NOT NULL,
  `latihan_jumlah_soal` int(3) NOT NULL,
  `latihan_passing_grade` int(3) NOT NULL,
  `latihan_has_timer` enum('Y','N') NOT NULL DEFAULT 'N',
  `catatan` text NOT NULL,
  `id_user_post` int(11) NOT NULL,
  `id_user_edit` int(11) NOT NULL,
  `waktu_post` datetime NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modul_konten`
--

INSERT INTO `modul_konten` (`id_konten`, `id_modul`, `judul_konten`, `jenis`, `no_urut`, `status`, `isi`, `video_url`, `durasi_belajar`, `latihan_jumlah_soal`, `latihan_passing_grade`, `latihan_has_timer`, `catatan`, `id_user_post`, `id_user_edit`, `waktu_post`, `waktu_edit`) VALUES
(1, 4, 'Object Oriented Programming', 'Text', 1, 'Y', '<p dir=\"ltr\" style=\"\">Saat mengembangkan sebuah perangkat lunak, tentu kita harus mengetahui terlebih dahulu paradigma dalam dunia pemrograman. Mungkin kita sudah pernah mendengar beberapa paradigma seperti&nbsp;imperative,&nbsp;object-oriented,&nbsp;procedural, dan&nbsp;functional. Paradigma pemrograman itu apa sih? Paradigma pemrograman adalah gaya atau cara kita menulis program. Pada Modul ini kita akan membahas mengenai paradigma OOP (object-oriented programming.)</p><p dir=\"ltr\" style=\"\">Sebelum membahas mengenai paradigma OOP, sebaiknya kita juga harus tahu mengenai hubungan antara prinsip S.O.L.I.D ini di dalam konsep OOP. Jadi prinsip S.O.L.I.D ini merupakan panduan bagi kita saat kita akan mengembangkan sebuah sistem dengan pendekatan OOP, di mana jika kita mengikuti prinsip-prinsip ini kita dapat membuat sebuah sistem yang mudah kita gunakan dan kembangkan kembali, kokoh, dan tidak rapuh. Pada modul ini kita akan mempelajari apa itu OOP dan pilar-pilar utama dalam pendekatan OOP seperti encapsulation, abstraction, inheritance, dan polymorphism yang akan kita bahas pada modul berikutnya.&nbsp;</p>', '', 30, 0, 0, 'Y', '<p>Belum ada catatan</p>', 2, 0, '2020-04-24 13:53:42', '0000-00-00 00:00:00'),
(2, 4, '4 Pilar\'s OOP', 'Video', 2, 'Y', '', 'https://www.youtube.com/embed/tgbNymZ7vqY', 23, 0, 0, 'Y', '<p>Belum ada catatan</p>', 2, 2, '2020-04-24 14:07:11', '2020-04-27 12:03:07'),
(3, 4, 'Kuis OOP', 'Latihan', 4, 'Y', '', '', 10, 10, 70, 'N', '<p>Tidak ada</p>', 2, 2, '2020-04-25 12:29:59', '2020-04-25 12:47:36'),
(4, 4, 'Program Sederhana', 'Tugas', 5, 'Y', '<p>Buat program Hello World dengan Javascript</p>', '', 0, 0, 0, 'Y', '<p>tidak ada</p>', 2, 0, '2020-04-27 14:12:12', '0000-00-00 00:00:00'),
(5, 5, 'Introduction', 'Text', 1, 'Y', '<p dir=\"ltr\" style=\"margin-bottom: 1.5rem;\">Pada dunia nyata, misalnya dalam membangun sebuah rumah, architecture memiliki tanggung jawab untuk dapat membuat bentuk dari bangunan rumah tersebut, baik dalam rancangan interior maupun eksterior. Sedangkan desain lebih mengarah pada hubungan antar komponen-komponen di dalamnya. Desain interior misalnya, memiliki tanggung jawab untuk dapat menciptakan nilai estetika antara komponen di dalam ruangan, misalnya cat, kain atau perabot.&nbsp;</p><p dir=\"ltr\" style=\"margin-bottom: 1.5rem;\">Di dalam software, architecture berada pada tingkat tertinggi&nbsp;(high-level), di mana definisinya sebuah pola arsitektur yang menentukan bentuk dan struktur keseluruhan aplikasi perangkat lunak. Sedangkan desain memiliki posisi sebagai tingkat rendah&nbsp;(low-level)&nbsp;di bawah architecture, dan memiliki definisi sebuah interkoneksi antara modul dan beberapa software entities seperti packages, components, dan classes.</p>', '', 10, 0, 0, 'N', '', 2, 0, '2020-05-15 11:32:23', '0000-00-00 00:00:00'),
(6, 5, 'Software Design Principle', 'Text', 2, 'Y', '<p dir=\"ltr\" style=\"margin-bottom: 1.5rem;\">Kita sudah berkenalan dengan software design pada modul sebelumnya. Bedanya, di modul ini kita akan sama-sama mempelajari beberapa prinsip design. Tapi sebelum lanjut, yuk kita pahami dulu apa itu Software Design Principle. </p><p dir=\"ltr\" style=\"margin-bottom: 1.5rem;\">Software Design Principle merupakan sebuah pedoman yang dapat kita gunakan untuk menghindari design yang buruk saat mengembangkan sebuah perangkat lunak. Menurut Robert C. Martin, terdapat 3 (tiga) karakteristik penting dari design yang buruk yang perlu kita perhatikan dan sebaiknya dihindari.</p><p dir=\"ltr\" style=\"margin-bottom: 1.5rem;\">Mari kita bahas satu-satu ketiga pedoman tersebut.</p><h3 dir=\"ltr\" style=\"margin-bottom: 1.5rem; line-height: 1.2;\">Rigidity </h3><p dir=\"ltr\" style=\"margin-bottom: 1.5rem;\">Di mulai dari rigidity atau kekakuan. Rigidity adalah kondisi suatu sistem yang sulit diubah, bahkan untuk perubahan yang paling sederhana. Saat kita ingin melakukan perubahan, perubahan tersebut menyebabkan ketergantungan untuk mengubah item lain di dalam suatu modul. Alhasil, perubahan yang seharusnya dapat dilakukan dalam waktu yang singkat,  malah sebaliknya. Belum lagi dampaknya pada modul-modul lain yang saling berkaitan.</p><h3 dir=\"ltr\" style=\"margin-bottom: 1.5rem; line-height: 1.2;\">Fragility </h3><p dir=\"ltr\" style=\"margin-bottom: 1.5rem;\">Selanjutnya adalah fragility. Fragility (kerapuhan) masih memiliki keterkaitan dengan rigidity. Fragility adalah kecenderungan perangkat lunak yang salah di beberapa bagian setiap kali melakukan perubahan. Seringkali kesalahan terjadi di area yang tidak memiliki hubungan konseptual dengan area yang diubah. Sehingga jika melakukan perbaikan, kadang takut timbul kesalahan dengan cara yang tidak terduga. Ketika fragility ada di dalam suatu perangkat lunak, kemungkinan kesalahan akan meningkat seiring berjalannya waktu. Perangkat lunak semacam itu tak hanya sulit dipelihara, bahkan sulit juga dipertahankan. Saat melakukan perbaikan, alih-alih memperbaiki kesalahan yang ada, sebuah sistem akan menjadi lebih buruk dan menimbulkan lebih banyak masalah.</p><h3 dir=\"ltr\" style=\"margin-bottom: 1.5rem; line-height: 1.2;\">Immobility </h3><p style=\"margin-bottom: 1.5rem;\">Terakhir yang harus kita perhatikan dan hindari adalah Imobilitas. Yaitu sebuah ketidakmampuan untuk menggunakan kembali perangkat lunak dari proyek lain atau bagian-bagian dari proyek yang sama. Seorang engineer tentu akan mengalami kondisi di mana ia membutuhkan modul atau sistem yang sebelumnya sudah pernah ditulis atau dibuat oleh engineer lain. Namun, sering juga terjadi bahwa modul yang dibutuhkan tersebut memiliki terlalu banyak bobot yang bergantung padanya. Setelah mencoba untuk memisahkan, para engineer menemukan bahwa pekerjaan dan risiko yang diperlukan untuk memisahkan bagian yang diinginkan (dari bagian yang tidak diinginkan), terlalu besar untuk ditoleransi. Sehingga alih-alih menulis ulang (re-write), sang engineer akan menggunakannya kembali untuk project lain.</p><p style=\"margin-bottom: 1.5rem;\"><br>Dari penjelasan beberapa pedoman di atas, kita dapat mengetahui lebih dalam mengenai perbedaan antara architecture dan design pada perangkat lunak. Selain itu, telah dijelaskan pula tentang bagaimana kita mendefinisikan sebuah design yang buruk dan perlu kita dihindari.<br><br>Pada modul selanjutnya kita akan mempelajari  tentang prinsip SOLID, baik itu definisi, penjelasan dan contoh studi kasus kapan kita membutuhkannya. Yuk lanjut!</p>', '', 20, 0, 0, 'N', '', 2, 0, '2020-05-15 14:07:14', '0000-00-00 00:00:00'),
(7, 5, 'Kuis Object Oriented Programming (OOP)', 'Latihan', 3, 'Y', '', '', 30, 25, 70, 'Y', '', 2, 2, '2020-05-15 14:21:55', '2020-05-15 14:32:26'),
(8, 6, 'Single Responsibility Principle', 'Video', 1, 'Y', '', 'https://www.youtube.com/embed/YI3tsmFsrOg', 10, 0, 0, 'N', '', 2, 0, '2020-06-12 10:24:36', '0000-00-00 00:00:00'),
(9, 6, 'Open/Close Principle', 'Text', 2, 'Y', '<p style=\"text-align: justify; \">Setelah selesai dengan Single Responsibility Principle, mari kita lanjut ke aturan berikutnya yaitu sebuah entitas perangkat lunak seperti class, property, dan function. Mereka adalah entitas untuk ditambahkan tetapi tidak untuk dimodifikasi yaitu&nbsp;Open/Close Principle. Seperti apa detail aturannya?</p><h3 dir=\"ltr\" style=\"text-align: justify; margin-bottom: 1.5rem; line-height: 1.2;\">Open/Close Principle (OCP)</h3><p dir=\"ltr\" style=\"text-align: justify; margin-bottom: 1.5rem;\">Pada Tahun 1988, seorang profesor asal Perancis, Bertrand Meyer menulis sebuah buku yang berjudul&nbsp;Object Oriented Software Construction. Di dalamnya terdapat sebuah aturan yang mengatur di mana sebuah artefak perangkat lunak harus terbuka untuk ditambahkan tetapi tertutup untuk dimodifikasi. Aturan tersebut kemudian ditulis lagi pada sebuah artikel yang berjudul&nbsp;The Open-Closed Principle&nbsp;oleh Robert C. Martin pada tahun 1996.</p><p dir=\"ltr\" style=\"text-align: justify; margin-bottom: 1.5rem;\">Lantas apa yang dimaksud dengan terbuka untuk ditambahkan dan tertutup untuk dimodifikasi? Jangan bingung. Terbuka untuk ditambahkan adalah keadaan ketika sebuah sistem dapat ditambahkan dengan spesifikasi baru yang dibutuhkan. Sedangkan tertutup untuk dimodifikasi adalah agar ketika ingin menambahkan spesifikasi baru, kita tidak perlu mengubah atau memodifikasi sistem yang telah ada.</p><p style=\"text-align: justify; margin-bottom: 1.5rem;\">Aturan ini sekilas terlihat bertentangan satu sama lain, yah? Namun tak usah khawatir, karena saat kita bisa mengatur dependensi sistem dengan baik dan benar, dengan mudahnya aturan tersebut dapat kita capai. Secara umum, penggunaan aturan open/close diterapkan dengan memanfaatkan&nbsp;interface&nbsp;dan abstraksi kelas daripada menggunakan sebuah kelas konkret. Penggunaan&nbsp;interface&nbsp;dan abstraksi kelas bertujuan agar dapat mudah diperbaiki setelah pengembangan tanpa harus mengganggu kelas yang mewarisi dan ketika ingin membuat fungsionalitas baru, cukup dengan membuat kelas baru dan mewarisi&nbsp;interface&nbsp;atau abstraksi tersebut.</p><div style=\"text-align: justify; \"><br></div>', '', 20, 0, 0, 'N', '', 2, 0, '2020-06-12 10:26:42', '0000-00-00 00:00:00'),
(10, 6, 'Liskov Substitution Principle (LSP)', 'Text', 3, 'Y', '<p dir=\"ltr\" style=\"text-align: justify; margin-bottom: 1.5rem;\">Oke, kita lanjut ke aturan berikutnya yaitu&nbsp;Liskov Substitution Principle. &nbsp;Aturan ini disampaikan pada pembukaan sebuah acara oleh Barbara Liskov. Beliau menyampaikan pernyataan sebagai berikut “if for each object o1 of type S there is an object o2 of type T such that for all programs P defined in terms of T, the behavior of P is unchanged when o1 is subtituted for o2 then S is a subtype of T”.&nbsp;</p><p dir=\"ltr\" style=\"text-align: justify; margin-bottom: 1.5rem;\">Sederhanannya, Liskov’s substitution adalah aturan yang berlaku untuk hirarki pewarisan. Hal ini mengharuskan kita untuk mendesain kelas-kelas yang kita miliki sehingga ketergantungan antar klien dapat disubstitusikan tanpa klien mengetahui tentang perubahan yang ada. Oleh karena itu, seluruh SubClass setidaknya dapat berjalan dengan cara yang sama seperti SuperClass-nya.</p><p dir=\"ltr\" style=\"text-align: justify; margin-bottom: 1.5rem;\">Untuk menjadikan sebuah kelas benar-benar menjadi SubClass, kelas tersebut tidak hanya wajib untuk menerapkan fungsi dan properti dari SuperClass, melainkan juga harus memiliki perilaku yang sama dengan SuperClass-nya. Untuk mencapainya, terdapat beberapa aturan yang harus dipatuhi. Mari kita bahas satu per satu.</p><h3 dir=\"ltr\" style=\"text-align: justify; margin-bottom: 1.5rem; line-height: 1.2;\">Contravariant dan Covariant</h3><p dir=\"ltr\" style=\"text-align: justify; margin-bottom: 1.5rem;\">Aturan pertama, SubClass harus memiliki sifat contravariant dan covariant.&nbsp;Contravariant&nbsp;adalah kondisi di mana parameter dari sebuah fungsi yang berada pada SubClass harus memiliki tipe dan jumlah yang sama dengan fungsi yang berada pada SuperClass-nya. Sedangkan&nbsp;Covariant&nbsp;adalah kondisi pengembalian nilai dari fungsi yang berada pada SubClass dan SuperClass.</p><h3 dir=\"ltr\" style=\"text-align: justify; margin-bottom: 1.5rem; line-height: 1.2;\">preconditions dan postconditions</h3><p dir=\"ltr\" style=\"text-align: justify; margin-bottom: 1.5rem;\">Selanjutnya adalah aturan preconditions dan postconditions. Ini merupakan tindakan yang harus ada sebelum atau sesudah sebuah proses dijalankan. Contohnya, ketika kita ingin memanggil sebuah fungsi yang digunakan untuk membaca data dari database, terlebih dahulu kita harus memastikan database tersebut dalam keadaan terbuka agar proses dapat dijalankan. Ini disebut sebagai&nbsp;precondition. Sedangkan&nbsp;postcondition, contohnya saat proses baca tulis di dalam database telah selesai, kita harus memastikan database tersebut sudah tertutup.</p><h3 dir=\"ltr\" style=\"text-align: justify; margin-bottom: 1.5rem; line-height: 1.2;\">Invariant</h3><p dir=\"ltr\" style=\"text-align: justify; margin-bottom: 1.5rem;\">Berikutnya adalah invariant. Dalam pembuatan sebuah SubClass, SubClass tersebut harus memiliki invarian yang sama dengan SuperClass-nya.&nbsp;Invarian&nbsp;sendiri adalah penjelasan dari kondisi suatu proses yang benar sebelum proses tersebut dimulai dan tetap benar setelahnya.</p><h3 dir=\"ltr\" style=\"text-align: justify; margin-bottom: 1.5rem; line-height: 1.2;\">Constraint</h3><p style=\"text-align: justify; margin-bottom: 1.5rem;\">Terakhir, aturan tentang constraint dari sebuah SubClass. Secara default, SubClass dapat memiliki fungsi dan properti dari SuperClass-nya. Selain itu, kita juga dapat menambahkan member baru di dalamnya.&nbsp;Constraint&nbsp;di sini adalah pembatasan yang ditentukan oleh SuperClass terhadap perubahan keadaan sebuah obyek. Sebagai contoh misal SuperClass memiliki obyek yang memiliki nilai tetap, maka SubClass tidak diijinkan untuk mengubah keadaan dari nilai obyek tersebut.</p>', '', 0, 0, 0, 'N', '', 2, 0, '2020-06-12 10:32:34', '0000-00-00 00:00:00'),
(11, 4, 'Unpublish', 'Text', 3, 'N', '', '', 0, 0, 0, 'N', '', 2, 0, '2020-06-12 10:33:28', '0000-00-00 00:00:00'),
(12, 5, 'Unpublish', 'Tugas', 4, 'N', '', '', 0, 0, 0, 'N', '', 2, 0, '2020-06-12 10:37:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `id_sumber` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `id_user_recipient` int(11) NOT NULL,
  `unread` enum('Y','N') NOT NULL,
  `waktu_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `type`, `id_sumber`, `judul`, `id_user_recipient`, `unread`, `waktu_post`) VALUES
(1, 'pengumuman', 1, 'Selamat datang di kelas ini', 3, 'Y', '2020-05-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `id_invoice` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status` enum('registered','confirmed','approved','canceled') NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `jenis_bayar` varchar(50) NOT NULL,
  `tujuan_bayar` varchar(100) NOT NULL,
  `tujuan_atas_nama` varchar(100) NOT NULL,
  `tujuan_logo` varchar(255) NOT NULL,
  `waktu_register` datetime NOT NULL,
  `waktu_konfirmasi` datetime NOT NULL,
  `waktu_approved` datetime NOT NULL,
  `waktu_canceled` datetime NOT NULL,
  `bayar_atas_nama` varchar(100) NOT NULL,
  `bayar_rekening` varchar(100) NOT NULL,
  `foto_konfirmasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_invoice`, `id_user`, `id_kelas`, `status`, `harga`, `diskon`, `coupon_code`, `coupon_value`, `total_bayar`, `jenis_bayar`, `tujuan_bayar`, `tujuan_atas_nama`, `tujuan_logo`, `waktu_register`, `waktu_konfirmasi`, `waktu_approved`, `waktu_canceled`, `bayar_atas_nama`, `bayar_rekening`, `foto_konfirmasi`) VALUES
(1, 'DFAZ200501U2K7', 2, 7, 'approved', 200000, 0, '', 0, 200000, 'TRANSFER BANK', 'BRI 0987654321', 'PT ASCON INOVASI DATA', 'logo-bri.png', '2020-06-03 00:00:00', '2020-06-03 00:00:00', '2020-06-03 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(2, 'GYSQ200605U2K8', 2, 8, 'approved', 200000, 10, 'BELAJAR', 50000, 130000, 'TRANSFER BANK', 'BRI 0987654321', 'PT ASCON INOVASI DATA', 'logo-bri.png', '2020-06-05 00:00:00', '2020-06-06 19:55:11', '2020-06-10 05:22:12', '0000-00-00 00:00:00', 'Adi Yulianto', 'BTN 0987654321', 'GYSQ200605U2K8.jpg'),
(3, 'SKFH200501U2K8', 3, 7, 'approved', 200000, 0, '', 0, 200000, 'TRANSFER BANK', 'BRI 0987654321', 'PT ASCON INOVASI DATA', 'logo-bri.png', '2020-06-03 00:00:00', '2020-06-03 00:00:00', '2020-06-03 00:00:00', '0000-00-00 00:00:00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` mediumtext NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `id_user_post` int(11) NOT NULL,
  `id_user_edit` int(11) NOT NULL,
  `waktu_post` datetime NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_kelas`, `judul`, `isi`, `status`, `id_user_post`, `id_user_edit`, `waktu_post`, `waktu_edit`) VALUES
(1, 7, 'Selamat datang siswa baru di kelas Belajar Prinsip Pemrograman SOLID', '<p>Dengan mendaftar di kelas ini, siswa diharapkan mengikuti tata tertib yang berlaku</p>', 'Y', 2, 2, '2020-05-26 21:36:43', '2020-06-11 11:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `review` varchar(200) NOT NULL,
  `waktu_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_user`, `id_kelas`, `rating`, `review`, `waktu_post`) VALUES
(1, 2, 7, 5, 'An incredible course that covers a lot of vital algorithm on graphs and strings. I learned a lot of new material that I hadn\'t known before. Thank you very much for this amazing course!', '2020-06-12 17:10:37'),
(2, 3, 7, 4, 'Amazing course! Loved the theory and exercises! Just a note for others: Its part 1 had almost no dependency on book, but this part 2 has some dependency (e.g. chapter on Graph) on book as well.', '2020-04-28 07:58:34'),
(3, 2, 8, 4, 'An incredible course that covers a lot of vital algorithm on graphs and strings. I learned a lot of new material that I hadn\'t known before. Thank you very much for this amazing course!', '2020-04-28 07:58:34'),
(4, 3, 8, 5, 'Amazing course! Loved the theory and exercises! Just a note for others: Its part 1 had almost no dependency on book, but this part 2 has some dependency (e.g. chapter on Graph) on book as well.', '2020-04-28 07:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `sesi_latihan`
--

CREATE TABLE `sesi_latihan` (
  `id` int(11) NOT NULL,
  `id_konten` int(11) NOT NULL,
  `id_user_siswa` int(11) NOT NULL,
  `status` enum('Belum','Gagal','Berhasil') NOT NULL,
  `nilai` int(3) NOT NULL,
  `passing_grade` int(3) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sesi_latihan`
--

INSERT INTO `sesi_latihan` (`id`, `id_konten`, `id_user_siswa`, `status`, `nilai`, `passing_grade`, `waktu_mulai`, `waktu_selesai`) VALUES
(10, 3, 2, 'Berhasil', 100, 70, '2020-06-12 14:15:34', '2020-06-12 14:17:15'),
(11, 7, 2, 'Gagal', 67, 70, '2020-06-12 14:27:34', '2020-06-12 14:35:22'),
(12, 7, 2, 'Berhasil', 100, 70, '2020-06-12 14:58:05', '2020-06-12 15:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `sesi_soal`
--

CREATE TABLE `sesi_soal` (
  `id` int(11) NOT NULL,
  `id_sesi_latihan` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `status` enum('belum','sudah','salah','benar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sesi_soal`
--

INSERT INTO `sesi_soal` (`id`, `id_sesi_latihan`, `id_soal`, `jawaban`, `status`) VALUES
(29, 10, 15, '[\"46\"]', 'benar'),
(30, 10, 13, '[\"41\"]', 'benar'),
(31, 10, 16, '[\"48\"]', 'benar'),
(32, 10, 14, '[\"44\"]', 'benar'),
(33, 10, 2, '[\"1\"]', 'benar'),
(34, 11, 8, '[\"28\",\"27\"]', 'salah'),
(35, 11, 7, '[\"24\"]', 'benar'),
(36, 11, 12, '[\"36\"]', 'benar'),
(37, 11, 4, '[\"23\"]', 'salah'),
(38, 11, 11, '[\"35\"]', 'benar'),
(39, 11, 9, '[\"31\"]', 'benar'),
(40, 12, 4, '[\"20\"]', 'benar'),
(41, 12, 9, '[\"31\"]', 'benar'),
(42, 12, 11, '[\"35\"]', 'benar'),
(43, 12, 8, '[\"27\",\"28\"]', 'benar'),
(44, 12, 7, '[\"24\"]', 'benar'),
(45, 12, 12, '[\"36\"]', 'benar');

-- --------------------------------------------------------

--
-- Table structure for table `sesi_tugas`
--

CREATE TABLE `sesi_tugas` (
  `id` int(11) NOT NULL,
  `id_konten` int(11) NOT NULL,
  `id_user_siswa` int(11) NOT NULL,
  `jawaban` mediumtext NOT NULL,
  `waktu_post` datetime NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `nilai` int(3) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_user_reviewer` int(11) NOT NULL,
  `waktu_review` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sesi_tugas`
--

INSERT INTO `sesi_tugas` (`id`, `id_konten`, `id_user_siswa`, `jawaban`, `waktu_post`, `waktu_edit`, `nilai`, `status`, `id_user_reviewer`, `waktu_review`) VALUES
(1, 4, 2, '<p>asdfghjkl</p>', '2020-05-08 00:00:00', '0000-00-00 00:00:00', 70, 'Berhasil', 2, '2020-05-30 13:25:59'),
(3, 4, 2, '<p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; box-sizing: inherit; clear: both; color: rgb(36, 39, 41);\">There is not a built-in form validation check for whether or not a value is in the database, but you can create your own validation checks.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; box-sizing: inherit; clear: both; color: rgb(36, 39, 41);\">in your model that handles roles, add something like this:<br></p><pre class=\"default prettyprint prettyprinted\" style=\"margin-bottom: 1em; padding: 12px 8px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; font-size: 13px; vertical-align: baseline; box-sizing: inherit; width: auto; max-height: 600px; background-color: var(--black-050); border-radius: 3px; color: rgb(36, 39, 41); overflow-wrap: normal;\"><code style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; font-size: 13px; vertical-align: baseline; box-sizing: inherit; background-color: transparent; white-space: inherit;\"><span class=\"kwd\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--blue-800);\">function</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\"> role_exists</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">(</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">$key</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">)</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">\r\n</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">{</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">\r\n    $this</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">-&gt;</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">db</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">-&gt;</span><span class=\"kwd\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--blue-800);\">where</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">(</span><span class=\"str\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--red-800);\">\'rolekey\'</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">,</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">$key</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">);</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">\r\n    $query </span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">=</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\"> $this</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">-&gt;</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">db</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">-&gt;</span><span class=\"kwd\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--blue-800);\">get</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">(</span><span class=\"str\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--red-800);\">\'roles\'</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">);</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">\r\n    </span><span class=\"kwd\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--blue-800);\">if</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\"> </span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">(</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">$query</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">-&gt;</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">num_rows</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">()</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\"> </span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">&gt;</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\"> </span><span class=\"lit\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--red-800);\">0</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">){</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">\r\n        </span><span class=\"kwd\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--blue-800);\">return</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\"> </span><span class=\"kwd\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--blue-800);\">true</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">;</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">\r\n    </span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">}</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">\r\n    </span><span class=\"kwd\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--blue-800);\">else</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">{</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">\r\n        </span><span class=\"kwd\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--blue-800);\">return</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\"> </span><span class=\"kwd\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--blue-800);\">false</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">;</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">\r\n    </span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">}</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">\r\n</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--black-750);\">}</span></code></pre>', '2020-06-12 14:24:13', '0000-00-00 00:00:00', 90, 'Berhasil', 2, '2020-06-12 15:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `soal_jawaban`
--

CREATE TABLE `soal_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban_text` text NOT NULL,
  `is_benar` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `soal_jawaban`
--

INSERT INTO `soal_jawaban` (`id_jawaban`, `id_soal`, `jawaban_text`, `is_benar`) VALUES
(1, 2, '<p  class=\"mg-b-0\">Object Oriented Programming</p>', 'Y'),
(2, 2, '<p  class=\"mg-b-0\">OOPs salah<br></p>', 'N'),
(15, 2, '<p  class=\"mg-b-0\">ooppppppp</p>', 'N'),
(19, 4, '<p class=\"mg-b-0\"><span style=\"font-family: monospace; font-size: medium; white-space: pre-wrap;\">Agar seluruh proses pengolahan nilai pada sebuah object dapat dipantau.</span><br></p>', 'N'),
(20, 4, '<p class=\"mg-b-0\"><span style=\"font-family: monospace; font-size: medium; white-space: pre-wrap;\">Agar kita akan lebih leluasa dalam melakukan perubahan nilai tanpa harus mengakses propertinya secara langsung, cukup gunakan fungsi setter yang tersedia.</span><br></p>', 'Y'),
(21, 4, '<p class=\"mg-b-0\"><span style=\"font-family: monospace; font-size: medium; white-space: pre-wrap;\">Agar dapat menghindari kompleksitas suatu sistem.</span><br></p>', 'N'),
(23, 4, '<p><span style=\"font-family: monospace; font-size: medium; white-space: pre-wrap;\">Agar kita lebih leluasa dalam melakukan perubahan kondisi dari sebuah fungsi tanpa harus tau proses di belakangnya seperti apa.</span><br></p>', 'N'),
(24, 7, '<p class=\"mg-b-0\">Software design principle</p>', 'Y'),
(25, 7, '<p class=\"mg-b-0\">Software installation principle</p>', 'N'),
(26, 7, '<p class=\"mg-b-0\">Software entities principle</p>', 'N'),
(27, 8, '<p class=\"mg-b-0\">Single responsibility</p>', 'Y'),
(28, 8, '<p class=\"mg-b-0\">open/close</p>', 'Y'),
(29, 8, '<p class=\"mg-b-0\">single repository</p>', 'N'),
(30, 9, '<p class=\"mg-b-0\">imperative</p>', 'N'),
(31, 9, '<p class=\"mg-b-0\">object-oriented</p>', 'Y'),
(32, 9, '<p class=\"mg-b-0\">procedural</p>', 'N'),
(33, 11, '<p class=\"mg-b-0\">Inheritance</p>', 'N'),
(34, 11, '<p class=\"mg-b-0\">Encapsulaion</p>', 'N'),
(35, 11, '<p class=\"mg-b-0\">Composition</p>', 'Y'),
(36, 12, '<p>superclass</p>', 'Y'),
(37, 12, '<p>subclass</p>', 'N'),
(38, 12, '<p>function</p>', 'N'),
(39, 13, '<p class=\"mg-b-0\">Single inheritance</p>', 'N'),
(40, 13, '<p class=\"mg-b-0\">multilevel</p>', 'N'),
(41, 13, '<p class=\"mg-b-0\">internal</p>', 'Y'),
(42, 14, '<p class=\"mg-b-0\">single inheritance</p>', 'N'),
(43, 14, '<p class=\"mg-b-0\">multilevel&nbsp;<span style=\"font-size: 0.875rem;\">inheritance</span></p>', 'N'),
(44, 14, '<p class=\"mg-b-0\">multiple&nbsp;<span style=\"font-size: 0.875rem;\">inheritance</span></p>', 'Y'),
(45, 15, '<p class=\"mg-b-0\">single inheritance</p>', 'N'),
(46, 15, '<p class=\"mg-b-0\">multiple&nbsp;<span style=\"font-size: 0.875rem;\">inheritance</span></p>', 'Y'),
(47, 15, '<p class=\"mg-b-0\">multilevel&nbsp;<span style=\"font-size: 0.875rem;\">inheritance</span></p>', 'N'),
(48, 16, '<p class=\"mg-b-0\">Abstraction layer</p>', 'Y'),
(49, 16, '<p class=\"mg-b-0\">delegation layer</p>', 'N'),
(50, 16, '<p class=\"mg-b-0\">system layer</p>', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `soal_pertanyaan`
--

CREATE TABLE `soal_pertanyaan` (
  `id_soal` int(11) NOT NULL,
  `id_konten` int(11) NOT NULL,
  `jenis_soal` varchar(20) NOT NULL,
  `soal` text NOT NULL,
  `pembahasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `soal_pertanyaan`
--

INSERT INTO `soal_pertanyaan` (`id_soal`, `id_konten`, `jenis_soal`, `soal`, `pembahasan`) VALUES
(2, 3, 'radio', '<p  class=\"mg-b-0\">Apa kepanjangan OOP?</p>', '<p>OOP</p>'),
(4, 7, 'radio', '<p class=\"mg-b-0\" class=\"mg-b-0\">Salah satu alasan untuk menggunakan encapsulation adalah ...<br></p>', '<p>Belum ada pembahasan</p>'),
(7, 7, 'radio', '<p class=\"mg-b-0\">Serangkaian aturan yang akan membantu kita guna menghindari kebiasaan buruk dalam merancang sebuah pengembangan perangkat lunak merupakan pengertian dari</p>', ''),
(8, 7, 'checkbox', 'Berikut ini adalah bagian dari design principle', ''),
(9, 7, 'radio', 'Disebut apakah paradigma yang memvisualisasikan kode sehingga mirip seperti skenario dalam kehidupan nyata?', ''),
(11, 7, 'radio', 'Berikut yang&nbsp;bukan&nbsp;merupakan pilar dari pemrograman berbasis object adalah ...', ''),
(12, 7, 'radio', 'Kelas yang dikenal juga dengan istilah Induk, Base, atau Parent Class dan fitur-fitur yang dimiliki umumnya akan diwariskan ke kelas dibawahnya merupakan pengertian dari ...', ''),
(13, 3, 'radio', 'Berikut adalah beberapa jenis Inheritance,&nbsp;kecuali&nbsp;', ''),
(14, 3, 'radio', 'Jenis Inheritance yang tidak di-support dengan baik bahasa pemrograman Java adalah', ''),
(15, 3, 'radio', 'Jenis Inheritance yang merupakan gabungan dari beberapa jenis Inheritance adalah', ''),
(16, 3, 'radio', 'Mekanisme yang memisahkan 2 (dua) kompleksitas sebuah sistem adalah pengertian dari&nbsp;', '');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `waktu_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `kategori`, `nama`, `email`, `no_hp`, `subjek`, `isi`, `waktu_post`) VALUES
(1, 'Lapor Bug', 'Adi Yulianto', 'adiyulianto888@gmail.com', '082281264609', 'Tes submit tiket', 'Tes submit tiket', '2020-06-11 21:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('Administrator','Pengajar','Siswa') NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `cookie_key` varchar(60) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `id_user_post` int(11) NOT NULL,
  `waktu_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `role`, `nama_user`, `password`, `cookie_key`, `pekerjaan`, `bio`, `no_hp`, `tgl_lahir`, `jk`, `foto`, `alamat`, `status`, `id_user_post`, `waktu_post`, `id_user_edit`, `waktu_edit`) VALUES
(1, 'administrator@gmail.com', 'Administrator', 'Administrator', '$2y$10$ZugEBrrmwA/.9X6c/Df9DOFq0F7h990E/DUDmrhGgr15jPSr3BWLa', 'rAPdyDatb5wXMFH16k0QJRux8U72TiKfvmgnZVBLphNlcEqCYWoez43SsGjI', 'Backend Engineer', '', '082281264609', '1996-07-17', 'L', '', 'Kota Bengkulu', 'Y', 0, '2019-12-13 11:55:15', 0, '2020-03-29 12:35:44'),
(2, 'adiyulianto888@gmail.com', 'Siswa', 'Adi Yulianto', '$2y$10$LgdkJZxECY5I/gQ5Edf.J.VKB6mTJIkgXQFJoRo8csHzBDDpSoWHi', 'dDhe9s0WT5PZCNJq7xRHMtUongBGumaj1kLAwyifV2v3IYlrbXKcE8pO4F6Q', 'Software Engineer', 'Craftman, Geek, 5 Grade Scholar', '082281264609', '1996-07-17', 'L', '', 'Kota Bengkulu', 'Y', 0, '2019-12-13 11:55:15', 0, '2020-03-29 12:35:44'),
(3, 'yuliant7adi@gmail.com', 'Pengajar', 'Yulianto Adi', '$2y$10$LgdkJZxECY5I/gQ5Edf.J.VKB6mTJIkgXQFJoRo8csHzBDDpSoWHi', '', 'Software Engineer', 'One in  seven point eight humans who live on blue earth', '082281264609', '2019-12-13', 'L', '', 'Kota Bengkulu', 'Y', 0, '2019-12-13 11:55:15', 0, '2020-03-29 12:35:44'),
(5, 'thomasmustafa@gmail.com', 'Pengajar', 'Thomas Mustafa Kamal', '$2y$10$MeR.KHDgioH/KrTKK8IuH.VETUs3IGND6PmDmymoW8rP/ON65YtJu', '', '', '', '', '0000-00-00', 'L', '', 'Kota Bengkulu', 'Y', 0, '2020-05-11 10:55:23', 0, '2020-05-11 10:55:23'),
(6, 'administrator2@gmail.com', 'Administrator', 'Administrator 2', '$2y$10$LgdkJZxECY5I/gQ5Edf.J.VKB6mTJIkgXQFJoRo8csHzBDDpSoWHi', 'ige5K0EcFwvV1LAhqSa9fpkBuy8XCJNo7GrPZmsT4l2bWxnOzYIDUtQjd6HM', '', '', '', '0000-00-00', 'L', '', '', 'N', 1, '2020-06-09 14:36:43', 0, '2020-06-09 14:36:43');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_diskusi`
-- (See below for the actual view)
--
CREATE TABLE `view_diskusi` (
`id_diskusi` int(11)
,`id_kelas` int(11)
,`id_konten` int(11)
,`judul` varchar(100)
,`isi` mediumtext
,`status` enum('Y','N')
,`id_user_post` int(11)
,`waktu_post` datetime
,`waktu_edit` datetime
,`id_modul` int(11)
,`nama_modul` varchar(100)
,`judul_konten` varchar(100)
,`nama_user` varchar(100)
,`role` enum('Administrator','Pengajar','Siswa')
,`foto` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_kelas`
-- (See below for the actual view)
--
CREATE TABLE `view_kelas` (
`id_kelas` int(11)
,`nama_kelas` varchar(100)
,`slug` varchar(150)
,`id_kategori` int(11)
,`nama_kategori` varchar(50)
,`deskripsi_singkat` varchar(200)
,`foto` varchar(100)
,`is_aktif` enum('Y','N')
,`is_buka_pendaftaran` enum('Y','N')
,`harga` int(11)
,`diskon` int(3)
,`waktu_post` datetime
,`waktu_edit` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pembelian`
-- (See below for the actual view)
--
CREATE TABLE `view_pembelian` (
`id` int(11)
,`id_invoice` varchar(50)
,`id_user` int(11)
,`id_kelas` int(11)
,`status` enum('registered','confirmed','approved','canceled')
,`harga` int(11)
,`diskon` int(11)
,`coupon_code` varchar(50)
,`coupon_value` int(11)
,`total_bayar` int(11)
,`jenis_bayar` varchar(50)
,`tujuan_bayar` varchar(100)
,`tujuan_atas_nama` varchar(100)
,`tujuan_logo` varchar(255)
,`waktu_register` datetime
,`waktu_konfirmasi` datetime
,`waktu_approved` datetime
,`waktu_canceled` datetime
,`bayar_atas_nama` varchar(100)
,`bayar_rekening` varchar(100)
,`foto_konfirmasi` varchar(255)
,`nama_kelas` varchar(100)
,`foto` varchar(100)
,`nama_user` varchar(100)
,`no_hp` varchar(13)
,`email` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pengajar`
-- (See below for the actual view)
--
CREATE TABLE `view_pengajar` (
`id` int(11)
,`id_kelas` int(11)
,`id_user` int(11)
,`waktu_post` datetime
,`has_access` enum('Y','N')
,`role` varchar(20)
,`nama_user` varchar(100)
,`foto` varchar(255)
,`pekerjaan` varchar(100)
,`bio` varchar(500)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pengumuman`
-- (See below for the actual view)
--
CREATE TABLE `view_pengumuman` (
`id_pengumuman` int(11)
,`id_kelas` int(11)
,`judul` varchar(200)
,`isi` mediumtext
,`status` enum('Y','N')
,`id_user_post` int(11)
,`id_user_edit` int(11)
,`waktu_post` datetime
,`waktu_edit` datetime
,`nama_user` varchar(100)
,`role` enum('Administrator','Pengajar','Siswa')
,`foto` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_review`
-- (See below for the actual view)
--
CREATE TABLE `view_review` (
`id_review` int(11)
,`id_user` int(11)
,`id_kelas` int(11)
,`rating` int(1)
,`review` varchar(200)
,`waktu_post` datetime
,`nama_user` varchar(100)
,`role` enum('Administrator','Pengajar','Siswa')
,`foto` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_siswa`
-- (See below for the actual view)
--
CREATE TABLE `view_siswa` (
`id` int(11)
,`id_kelas` int(11)
,`id_user` int(11)
,`waktu_post` datetime
,`has_access` enum('Y','N')
,`is_finished` enum('Y','N')
,`nama_user` varchar(100)
,`jk` enum('L','P')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tugas_siswa`
-- (See below for the actual view)
--
CREATE TABLE `view_tugas_siswa` (
`id` int(11)
,`id_konten` int(11)
,`id_user_siswa` int(11)
,`jawaban` mediumtext
,`waktu_post` datetime
,`waktu_edit` datetime
,`nilai` int(3)
,`status` varchar(20)
,`id_user_reviewer` int(11)
,`waktu_review` datetime
,`nama_user` varchar(100)
,`judul_konten` varchar(100)
,`nama_modul` varchar(100)
,`id_kelas` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `view_diskusi`
--
DROP TABLE IF EXISTS `view_diskusi`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_diskusi`  AS  select `diskusi`.`id_diskusi` AS `id_diskusi`,`diskusi`.`id_kelas` AS `id_kelas`,`diskusi`.`id_konten` AS `id_konten`,`diskusi`.`judul` AS `judul`,`diskusi`.`isi` AS `isi`,`diskusi`.`status` AS `status`,`diskusi`.`id_user_post` AS `id_user_post`,`diskusi`.`waktu_post` AS `waktu_post`,`diskusi`.`waktu_edit` AS `waktu_edit`,`modul_konten`.`id_modul` AS `id_modul`,`modul`.`nama_modul` AS `nama_modul`,`modul_konten`.`judul_konten` AS `judul_konten`,`user`.`nama_user` AS `nama_user`,`user`.`role` AS `role`,`user`.`foto` AS `foto` from (((`diskusi` left join `modul_konten` on((`modul_konten`.`id_konten` = `diskusi`.`id_konten`))) left join `modul` on((`modul`.`id_modul` = `modul_konten`.`id_modul`))) join `user` on((`user`.`id_user` = `diskusi`.`id_user_post`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_kelas`
--
DROP TABLE IF EXISTS `view_kelas`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_kelas`  AS  select `kelas`.`id_kelas` AS `id_kelas`,`kelas`.`nama_kelas` AS `nama_kelas`,`kelas`.`slug` AS `slug`,`kelas`.`id_kategori` AS `id_kategori`,`kategori`.`nama_kategori` AS `nama_kategori`,`kelas`.`deskripsi_singkat` AS `deskripsi_singkat`,`kelas`.`foto` AS `foto`,`kelas`.`is_aktif` AS `is_aktif`,`kelas`.`is_buka_pendaftaran` AS `is_buka_pendaftaran`,`kelas`.`harga` AS `harga`,`kelas`.`diskon` AS `diskon`,`kelas`.`waktu_post` AS `waktu_post`,`kelas`.`waktu_edit` AS `waktu_edit` from (`kelas` join `kategori` on((`kategori`.`id_kategori` = `kelas`.`id_kategori`))) where (`kelas`.`status_verify` <> 'Suspended') ;

-- --------------------------------------------------------

--
-- Structure for view `view_pembelian`
--
DROP TABLE IF EXISTS `view_pembelian`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_pembelian`  AS  select `pembelian`.`id` AS `id`,`pembelian`.`id_invoice` AS `id_invoice`,`pembelian`.`id_user` AS `id_user`,`pembelian`.`id_kelas` AS `id_kelas`,`pembelian`.`status` AS `status`,`pembelian`.`harga` AS `harga`,`pembelian`.`diskon` AS `diskon`,`pembelian`.`coupon_code` AS `coupon_code`,`pembelian`.`coupon_value` AS `coupon_value`,`pembelian`.`total_bayar` AS `total_bayar`,`pembelian`.`jenis_bayar` AS `jenis_bayar`,`pembelian`.`tujuan_bayar` AS `tujuan_bayar`,`pembelian`.`tujuan_atas_nama` AS `tujuan_atas_nama`,`pembelian`.`tujuan_logo` AS `tujuan_logo`,`pembelian`.`waktu_register` AS `waktu_register`,`pembelian`.`waktu_konfirmasi` AS `waktu_konfirmasi`,`pembelian`.`waktu_approved` AS `waktu_approved`,`pembelian`.`waktu_canceled` AS `waktu_canceled`,`pembelian`.`bayar_atas_nama` AS `bayar_atas_nama`,`pembelian`.`bayar_rekening` AS `bayar_rekening`,`pembelian`.`foto_konfirmasi` AS `foto_konfirmasi`,`kelas`.`nama_kelas` AS `nama_kelas`,`kelas`.`foto` AS `foto`,`user`.`nama_user` AS `nama_user`,`user`.`no_hp` AS `no_hp`,`user`.`email` AS `email` from ((`pembelian` join `kelas` on((`kelas`.`id_kelas` = `pembelian`.`id_kelas`))) join `user` on((`user`.`id_user` = `pembelian`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_pengajar`
--
DROP TABLE IF EXISTS `view_pengajar`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_pengajar`  AS  select `kelas_pengajar`.`id` AS `id`,`kelas_pengajar`.`id_kelas` AS `id_kelas`,`kelas_pengajar`.`id_user` AS `id_user`,`kelas_pengajar`.`waktu_post` AS `waktu_post`,`kelas_pengajar`.`has_access` AS `has_access`,`kelas_pengajar`.`role` AS `role`,`user`.`nama_user` AS `nama_user`,`user`.`foto` AS `foto`,`user`.`pekerjaan` AS `pekerjaan`,`user`.`bio` AS `bio` from (`kelas_pengajar` join `user` on((`user`.`id_user` = `kelas_pengajar`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_pengumuman`
--
DROP TABLE IF EXISTS `view_pengumuman`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_pengumuman`  AS  select `pengumuman`.`id_pengumuman` AS `id_pengumuman`,`pengumuman`.`id_kelas` AS `id_kelas`,`pengumuman`.`judul` AS `judul`,`pengumuman`.`isi` AS `isi`,`pengumuman`.`status` AS `status`,`pengumuman`.`id_user_post` AS `id_user_post`,`pengumuman`.`id_user_edit` AS `id_user_edit`,`pengumuman`.`waktu_post` AS `waktu_post`,`pengumuman`.`waktu_edit` AS `waktu_edit`,`user`.`nama_user` AS `nama_user`,`user`.`role` AS `role`,`user`.`foto` AS `foto` from (`pengumuman` join `user` on((`user`.`id_user` = `pengumuman`.`id_user_post`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_review`
--
DROP TABLE IF EXISTS `view_review`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_review`  AS  select `review`.`id_review` AS `id_review`,`review`.`id_user` AS `id_user`,`review`.`id_kelas` AS `id_kelas`,`review`.`rating` AS `rating`,`review`.`review` AS `review`,`review`.`waktu_post` AS `waktu_post`,`user`.`nama_user` AS `nama_user`,`user`.`role` AS `role`,`user`.`foto` AS `foto` from (`review` join `user` on((`user`.`id_user` = `review`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_siswa`
--
DROP TABLE IF EXISTS `view_siswa`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_siswa`  AS  select `kelas_siswa`.`id` AS `id`,`kelas_siswa`.`id_kelas` AS `id_kelas`,`kelas_siswa`.`id_user` AS `id_user`,`kelas_siswa`.`waktu_post` AS `waktu_post`,`kelas_siswa`.`has_access` AS `has_access`,`kelas_siswa`.`is_finished` AS `is_finished`,`user`.`nama_user` AS `nama_user`,`user`.`jk` AS `jk` from (`kelas_siswa` join `user` on((`user`.`id_user` = `kelas_siswa`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_tugas_siswa`
--
DROP TABLE IF EXISTS `view_tugas_siswa`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_tugas_siswa`  AS  select `sesi_tugas`.`id` AS `id`,`sesi_tugas`.`id_konten` AS `id_konten`,`sesi_tugas`.`id_user_siswa` AS `id_user_siswa`,`sesi_tugas`.`jawaban` AS `jawaban`,`sesi_tugas`.`waktu_post` AS `waktu_post`,`sesi_tugas`.`waktu_edit` AS `waktu_edit`,`sesi_tugas`.`nilai` AS `nilai`,`sesi_tugas`.`status` AS `status`,`sesi_tugas`.`id_user_reviewer` AS `id_user_reviewer`,`sesi_tugas`.`waktu_review` AS `waktu_review`,`user`.`nama_user` AS `nama_user`,`modul_konten`.`judul_konten` AS `judul_konten`,`modul`.`nama_modul` AS `nama_modul`,`modul`.`id_kelas` AS `id_kelas` from (((`sesi_tugas` join `user` on((`user`.`id_user` = `sesi_tugas`.`id_user_siswa`))) join `modul_konten` on((`modul_konten`.`id_konten` = `sesi_tugas`.`id_konten`))) join `modul` on((`modul`.`id_modul` = `modul_konten`.`id_modul`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disc_sesi`
--
ALTER TABLE `disc_sesi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disc_soal`
--
ALTER TABLE `disc_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`id_diskusi`) USING BTREE,
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_user_post` (`id_user_post`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_user_post` (`id_user_post`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user_post` (`id_user_post`),
  ADD KEY `id_user_edit` (`id_user_edit`);

--
-- Indexes for table `kelas_pengajar`
--
ALTER TABLE `kelas_pengajar`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_kelas` (`id_kelas`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_kelas` (`id_kelas`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `konten_siswa`
--
ALTER TABLE `konten_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_peserta` (`id_user_siswa`),
  ADD KEY `kode_modul` (`id_konten`) USING BTREE;

--
-- Indexes for table `kupon`
--
ALTER TABLE `kupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`),
  ADD KEY `kode_kelas` (`id_kelas`),
  ADD KEY `id_user_post` (`id_user_post`),
  ADD KEY `id_user_edit` (`id_user_edit`);

--
-- Indexes for table `modul_konten`
--
ALTER TABLE `modul_konten`
  ADD PRIMARY KEY (`id_konten`),
  ADD KEY `id_modul` (`id_modul`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_user` (`id_user_recipient`) USING BTREE;

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `no_invoice` (`id_invoice`),
  ADD KEY `id_kelas` (`id_kelas`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`) USING BTREE,
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `sesi_latihan`
--
ALTER TABLE `sesi_latihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_siswa` (`id_user_siswa`),
  ADD KEY `id_latihan` (`id_konten`) USING BTREE;

--
-- Indexes for table `sesi_soal`
--
ALTER TABLE `sesi_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_soal` (`id_soal`),
  ADD KEY `id_sesi_latihan` (`id_sesi_latihan`) USING BTREE;

--
-- Indexes for table `sesi_tugas`
--
ALTER TABLE `sesi_tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tugas` (`id_konten`) USING BTREE,
  ADD KEY `id_user` (`id_user_siswa`) USING BTREE,
  ADD KEY `id_user_koreksi` (`id_user_reviewer`) USING BTREE;

--
-- Indexes for table `soal_jawaban`
--
ALTER TABLE `soal_jawaban`
  ADD PRIMARY KEY (`id_jawaban`) USING BTREE,
  ADD KEY `id_pertanyaan` (`id_soal`) USING BTREE;

--
-- Indexes for table `soal_pertanyaan`
--
ALTER TABLE `soal_pertanyaan`
  ADD PRIMARY KEY (`id_soal`) USING BTREE,
  ADD KEY `kode_modul` (`id_konten`) USING BTREE;

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disc_sesi`
--
ALTER TABLE `disc_sesi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `disc_soal`
--
ALTER TABLE `disc_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `id_diskusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kelas_pengajar`
--
ALTER TABLE `kelas_pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `konten_siswa`
--
ALTER TABLE `konten_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kupon`
--
ALTER TABLE `kupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `modul_konten`
--
ALTER TABLE `modul_konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sesi_latihan`
--
ALTER TABLE `sesi_latihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sesi_soal`
--
ALTER TABLE `sesi_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `sesi_tugas`
--
ALTER TABLE `sesi_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `soal_jawaban`
--
ALTER TABLE `soal_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `soal_pertanyaan`
--
ALTER TABLE `soal_pertanyaan`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `soal_jawaban`
--
ALTER TABLE `soal_jawaban`
  ADD CONSTRAINT `FK_soal_jawaban_soal_pertanyaan` FOREIGN KEY (`id_soal`) REFERENCES `soal_pertanyaan` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal_pertanyaan`
--
ALTER TABLE `soal_pertanyaan`
  ADD CONSTRAINT `FK_soal_pertanyaan_modul_konten` FOREIGN KEY (`id_konten`) REFERENCES `modul_konten` (`id_konten`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
