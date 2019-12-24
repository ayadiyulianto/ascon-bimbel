-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 02:40 AM
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
-- Table structure for table `tb_forum`
--

CREATE TABLE `tb_forum` (
  `id` int(11) NOT NULL,
  `id_user_pembuat` int(11) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deskripsi_singkat` varchar(1000) NOT NULL,
  `deskripsi_lengkap` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `nama`, `tgl_dibuat`, `deskripsi_singkat`, `deskripsi_lengkap`, `foto`) VALUES
(1, 'LULUS STAN 2020', '2019-12-09 12:47:18', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua of Lorem Ipsum. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisis ut aliquip ex ea commodo consequat cons', '<p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p><p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p><p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim</p>', '28445.jpg'),
(3, 'LULUS UTBK PTN 2020', '2019-12-11 00:22:12', 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.', '<p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p><p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p><p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim</p>', 'download.jpg'),
(4, 'LULUS STAN 2020', '2019-12-13 11:21:12', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '<h3 style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; font-size: 14px; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">The standard Lorem Ipsum passage, used since the 1500s</h3><p style=\"padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><h3 style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; font-size: 14px; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p style=\"padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p><h3 style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; font-size: 14px; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">1914 translation by H. Rackham</h3><p style=\"padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p>', '7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas_user`
--

CREATE TABLE `tb_kelas_user` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas_user`
--

INSERT INTO `tb_kelas_user` (`id`, `id_kelas`, `id_user`, `tgl_dibuat`) VALUES
(6, 4, 2, '2019-12-13 15:29:13'),
(7, 3, 5, '2019-12-14 10:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `judul_materi` varchar(100) NOT NULL,
  `materi` text NOT NULL,
  `estimasi_waktu` int(3) NOT NULL,
  `no_urut` int(2) UNSIGNED NOT NULL,
  `terakhir_diperbarui` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id`, `id_modul`, `judul_materi`, `materi`, `estimasi_waktu`, `no_urut`, `terakhir_diperbarui`) VALUES
(1, 1, 'Judul Materi 1', '<h3 style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(0, 0, 0); margin-top: 15px; margin-bottom: 15px; font-size: 14px; padding: 0px;\">The standard Lorem Ipsum passage, used since the 1500s</h3><p style=\"color: rgb(0, 0, 0); padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><h3 style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(0, 0, 0); margin-top: 15px; margin-bottom: 15px; font-size: 14px; padding: 0px;\">Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p style=\"color: rgb(0, 0, 0); padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p><h3 style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(0, 0, 0); margin-top: 15px; margin-bottom: 15px; font-size: 14px; padding: 0px;\">1914 translation by H. Rackham</h3><p style=\"color: rgb(0, 0, 0); padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p><h3 style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(0, 0, 0); margin-top: 15px; margin-bottom: 15px; font-size: 14px; padding: 0px;\">Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p style=\"color: rgb(0, 0, 0); padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p><h3 style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(0, 0, 0); margin-top: 15px; margin-bottom: 15px; font-size: 14px; padding: 0px;\">1914 translation by H. Rackham</h3><p style=\"color: rgb(0, 0, 0); padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"</p>', 60, 1, '2019-12-13 14:38:27'),
(6, 4, 'Judul Materi 1 Modul 4', '<h3 style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(0, 0, 0); margin-top: 15px; margin-bottom: 15px; font-size: 14px; padding: 0px;\">The standard Lorem Ipsum passage, used since the 1500s</h3><p style=\"color: rgb(0, 0, 0); padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><h3 style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(0, 0, 0); margin-top: 15px; margin-bottom: 15px; font-size: 14px; padding: 0px;\">Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p style=\"color: rgb(0, 0, 0); padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p><h3 style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(0, 0, 0); margin-top: 15px; margin-bottom: 15px; font-size: 14px; padding: 0px;\">1914 translation by H. Rackham</h3><p style=\"color: rgb(0, 0, 0); padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p><h3 style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(0, 0, 0); margin-top: 15px; margin-bottom: 15px; font-size: 14px; padding: 0px;\">Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p style=\"color: rgb(0, 0, 0); padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p><h3 style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(0, 0, 0); margin-top: 15px; margin-bottom: 15px; font-size: 14px; padding: 0px;\">1914 translation by H. Rackham</h3><p style=\"color: rgb(0, 0, 0); padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"</p>', 60, 1, '2019-12-13 14:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi_siswa`
--

CREATE TABLE `tb_materi_siswa` (
  `id` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_user_siswa` int(11) NOT NULL,
  `waktu_mulai` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `waktu_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_materi_siswa`
--

INSERT INTO `tb_materi_siswa` (`id`, `id_materi`, `id_user_siswa`, `waktu_mulai`, `waktu_selesai`) VALUES
(3, 6, 5, '2019-12-21 13:37:12', '2019-12-21 16:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_modul`
--

CREATE TABLE `tb_modul` (
  `id` int(1) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_modul` varchar(100) NOT NULL,
  `deskripsi_singkat` varchar(1000) NOT NULL,
  `passing_grade` int(3) NOT NULL,
  `jml_soal` int(3) NOT NULL,
  `durasi_pengerjaan` int(3) NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `no_urut` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_modul`
--

INSERT INTO `tb_modul` (`id`, `id_kelas`, `nama_modul`, `deskripsi_singkat`, `passing_grade`, `jml_soal`, `durasi_pengerjaan`, `tgl_dibuat`, `no_urut`) VALUES
(1, 3, 'Modul 2', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assu', 60, 10, 120, '2019-12-13 14:02:54', 2),
(4, 3, 'Modul 1', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assu', 60, 10, 120, '2019-12-13 14:02:54', 1),
(5, 3, 'Modul 3', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assu', 60, 10, 120, '2019-12-13 14:02:54', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_modul_siswa`
--

CREATE TABLE `tb_modul_siswa` (
  `id` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `id_user_siswa` int(11) NOT NULL,
  `status` enum('Belum Selesai','Selesai') NOT NULL,
  `id_materi_dibaca_terakhir` int(11) DEFAULT NULL,
  `status_latihan` enum('Belum dikerjakan','Gagal','Berhasil') NOT NULL,
  `nilai` int(3) DEFAULT NULL,
  `tgl_pengerjaan` datetime DEFAULT NULL,
  `id_sesi_latihan_terakhir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_modul_siswa`
--

INSERT INTO `tb_modul_siswa` (`id`, `id_modul`, `id_user_siswa`, `status`, `id_materi_dibaca_terakhir`, `status_latihan`, `nilai`, `tgl_pengerjaan`, `id_sesi_latihan_terakhir`) VALUES
(1, 4, 5, 'Belum Selesai', NULL, 'Berhasil', 100, '2019-12-21 13:40:34', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_review`
--

CREATE TABLE `tb_review` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sesi_latihan`
--

CREATE TABLE `tb_sesi_latihan` (
  `id` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `id_user_siswa` int(11) NOT NULL,
  `status` enum('Belum','Gagal','Berhasil') NOT NULL,
  `nilai` int(3) NOT NULL,
  `tgl_mulai` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_selesai` datetime DEFAULT NULL,
  `passing_grade` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_sesi_latihan`
--

INSERT INTO `tb_sesi_latihan` (`id`, `id_modul`, `id_user_siswa`, `status`, `nilai`, `tgl_mulai`, `tgl_selesai`, `passing_grade`) VALUES
(8, 4, 5, 'Berhasil', 100, '2019-12-21 13:40:34', '2019-12-21 13:43:38', 60);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sesi_soal`
--

CREATE TABLE `tb_sesi_soal` (
  `id` int(11) NOT NULL,
  `id_sesi` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban` varchar(250) NOT NULL,
  `status` enum('belum','sudah','salah','benar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sesi_soal`
--

INSERT INTO `tb_sesi_soal` (`id`, `id_sesi`, `id_soal`, `jawaban`, `status`) VALUES
(2, 8, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,', 'benar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `soal` text NOT NULL,
  `benar_1` varchar(250) NOT NULL,
  `salah_1` varchar(250) NOT NULL,
  `salah_2` varchar(250) NOT NULL,
  `salah_3` varchar(250) NOT NULL,
  `pembahasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id`, `id_modul`, `soal`, `benar_1`, `salah_1`, `salah_2`, `salah_3`, `pembahasan`) VALUES
(2, 4, '<h3 style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">The standard Lorem Ipsum passage, used since the 1500s</h3><p style=\"padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,', 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id', '<h3 style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">The standard Lorem Ipsum passage, used since the 1500s</h3><p style=\"padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><h3 style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p style=\"padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p><h3 style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">1914 translation by H. Rackham</h3><p style=\"padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `role` enum('admin','pengajar','siswa') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_ditambahkan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `role`, `username`, `password`, `email`, `nama`, `no_hp`, `tgl_lahir`, `jk`, `foto`, `alamat`, `tgl_ditambahkan`) VALUES
(1, 'admin', 'admin', '$2y$10$LgdkJZxECY5I/gQ5Edf.J.VKB6mTJIkgXQFJoRo8csHzBDDpSoWHi', 'adiyulianto888@gmail.com', 'Administrator', '082281264609', '2019-12-01', 'Laki-laki', '', 'Kota Bengkulu', '0000-00-00 00:00:00'),
(2, 'pengajar', 'ayadiyul', '$2y$10$pLfN.ka6W5nVjaCSKOJFnO6DmgJt2.zqyBGO6IADwLgdVm/RJp1ae', 'adiyulianto888@gmail.com', 'Adi Yulianto', '082281264609', '2019-12-13', 'Laki-laki', '', 'Kota Bengkulu', '0000-00-00 00:00:00'),
(3, 'siswa', 'rscs', '$2y$10$xDCyS6kNEFC77NsEbI24TeyI7IpzoflyF/giPj2B/Q0ipVsIW.t3K', 'rickysadewa007@gmail.com', 'Ricky Sadewa', '082281264609', '2019-12-13', 'Laki-laki', '', 'Bengkulu', '0000-00-00 00:00:00'),
(4, 'pengajar', 'rs', '$2y$10$ZIXrZxwr.wC.VrVE0Yyp9OHks0.mchei1aCXz1tuyIOqsG4R/SYNK', 'rickysadewa007@gmail.com', 'Ricky Sadewa', '', '0000-00-00', 'Laki-laki', '', '', '2019-12-13 11:55:15'),
(5, 'siswa', 'ay', '$2y$10$JMMxfU828U5fByizlfyRD.SMCHGCzCNs3h9bp8gzHS/KGLFvPemF.', 'adiyulianto888@gmail.com', 'Adi Yulianto', '', '0000-00-00', 'Laki-laki', '', '', '2019-12-13 13:33:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_forum`
--
ALTER TABLE `tb_forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_pembuat` (`id_user_pembuat`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelas_user`
--
ALTER TABLE `tb_kelas_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_kelas` (`id_kelas`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_modul` (`id_modul`);

--
-- Indexes for table `tb_materi_siswa`
--
ALTER TABLE `tb_materi_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_modul` (`id_materi`),
  ADD KEY `id_user_peserta` (`id_user_siswa`);

--
-- Indexes for table `tb_modul`
--
ALTER TABLE `tb_modul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_kelas` (`id_kelas`);

--
-- Indexes for table `tb_modul_siswa`
--
ALTER TABLE `tb_modul_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_modul` (`id_modul`),
  ADD KEY `id_user_siswa` (`id_user_siswa`) USING BTREE,
  ADD KEY `id_sesi_latihan_terakhir` (`id_sesi_latihan_terakhir`);

--
-- Indexes for table `tb_review`
--
ALTER TABLE `tb_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_sesi_latihan`
--
ALTER TABLE `tb_sesi_latihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_modul` (`id_modul`),
  ADD KEY `id_user_peserta` (`id_user_siswa`);

--
-- Indexes for table `tb_sesi_soal`
--
ALTER TABLE `tb_sesi_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sesi` (`id_sesi`,`id_soal`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_modul` (`id_modul`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_forum`
--
ALTER TABLE `tb_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_kelas_user`
--
ALTER TABLE `tb_kelas_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_materi_siswa`
--
ALTER TABLE `tb_materi_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_modul`
--
ALTER TABLE `tb_modul`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_modul_siswa`
--
ALTER TABLE `tb_modul_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_sesi_latihan`
--
ALTER TABLE `tb_sesi_latihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_sesi_soal`
--
ALTER TABLE `tb_sesi_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_forum`
--
ALTER TABLE `tb_forum`
  ADD CONSTRAINT `tb_forum_ibfk_1` FOREIGN KEY (`id_user_pembuat`) REFERENCES `tb_user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tb_kelas_user`
--
ALTER TABLE `tb_kelas_user`
  ADD CONSTRAINT `tb_kelas_user_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kelas_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD CONSTRAINT `tb_materi_ibfk_1` FOREIGN KEY (`id_modul`) REFERENCES `tb_modul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_materi_siswa`
--
ALTER TABLE `tb_materi_siswa`
  ADD CONSTRAINT `tb_materi_siswa_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `tb_materi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_materi_siswa_ibfk_2` FOREIGN KEY (`id_user_siswa`) REFERENCES `tb_user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tb_modul`
--
ALTER TABLE `tb_modul`
  ADD CONSTRAINT `tb_modul_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_modul_siswa`
--
ALTER TABLE `tb_modul_siswa`
  ADD CONSTRAINT `tb_modul_siswa_ibfk_1` FOREIGN KEY (`id_user_siswa`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_modul_siswa_ibfk_2` FOREIGN KEY (`id_modul`) REFERENCES `tb_modul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_review`
--
ALTER TABLE `tb_review`
  ADD CONSTRAINT `tb_review_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_review_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tb_sesi_latihan`
--
ALTER TABLE `tb_sesi_latihan`
  ADD CONSTRAINT `tb_sesi_latihan_ibfk_1` FOREIGN KEY (`id_modul`) REFERENCES `tb_modul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_sesi_latihan_ibfk_2` FOREIGN KEY (`id_user_siswa`) REFERENCES `tb_user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tb_sesi_soal`
--
ALTER TABLE `tb_sesi_soal`
  ADD CONSTRAINT `tb_sesi_soal_ibfk_1` FOREIGN KEY (`id_sesi`) REFERENCES `tb_sesi_latihan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_sesi_soal_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `tb_soal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_ibfk_1` FOREIGN KEY (`id_modul`) REFERENCES `tb_modul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
