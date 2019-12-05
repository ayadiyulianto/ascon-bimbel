-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Des 2019 pada 04.39
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oasse_bimbel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_forum`
--

CREATE TABLE IF NOT EXISTS `tb_forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_dibuat` datetime NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `id_user_pembuat` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user_pembuat` (`id_user_pembuat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `kode_kelas` varchar(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas_user`
--

CREATE TABLE IF NOT EXISTS `tb_kelas_user` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(6) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `kode_kelas` (`kode_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_materi`
--

CREATE TABLE IF NOT EXISTS `tb_materi` (
  `id_materi` varchar(6) NOT NULL,
  `kode_modul` varchar(6) NOT NULL,
  `judul_materi` varchar(100) NOT NULL,
  `materi` text NOT NULL,
  `no_urut` int(2) NOT NULL,
  `estimasi_waktu` int(3) NOT NULL,
  PRIMARY KEY (`id_materi`),
  KEY `kode_modul` (`kode_modul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_materi_peserta`
--

CREATE TABLE IF NOT EXISTS `tb_materi_peserta` (
  `id` int(11) NOT NULL,
  `kode_modul` varchar(6) NOT NULL,
  `id_user_peserta` varchar(6) NOT NULL,
  `status` enum('Belum','Selesai') NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kode_modul` (`kode_modul`),
  KEY `id_user_peserta` (`id_user_peserta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_modul`
--

CREATE TABLE IF NOT EXISTS `tb_modul` (
  `kode_modul` varchar(6) NOT NULL,
  `kode_kelas` varchar(6) NOT NULL,
  `nama_modul` varchar(50) NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `passing_grade` int(2) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  PRIMARY KEY (`kode_modul`),
  KEY `kode_kelas` (`kode_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_peserta`
--

CREATE TABLE IF NOT EXISTS `tb_nilai_peserta` (
  `id_sesi` int(11) NOT NULL,
  `kode_modul` varchar(6) NOT NULL,
  `id_user_peserta` varchar(6) NOT NULL,
  `status` enum('Gagal','Berhasil') NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `nilai` int(3) NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `passing_grade` int(2) NOT NULL,
  PRIMARY KEY (`id_sesi`),
  KEY `kode_modul` (`kode_modul`),
  KEY `id_user_peserta` (`id_user_peserta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_review`
--

CREATE TABLE IF NOT EXISTS `tb_review` (
  `id_review` varchar(6) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `rating` int(1) NOT NULL,
  `review` text NOT NULL,
  `id_kelas` varchar(6) NOT NULL,
  PRIMARY KEY (`id_review`),
  KEY `id_user` (`id_user`),
  KEY `id_kelas` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sesi_soal`
--

CREATE TABLE IF NOT EXISTS `tb_sesi_soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sesi` int(11) NOT NULL,
  `id_user_peserta` varchar(6) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sesi` (`id_sesi`,`id_user_peserta`,`id_soal`),
  KEY `id_soal` (`id_soal`),
  KEY `id_user_peserta` (`id_user_peserta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE IF NOT EXISTS `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `kode_modul` varchar(6) NOT NULL,
  `soal` text NOT NULL,
  `benar_1` varchar(100) NOT NULL,
  `salah_1` varchar(100) NOT NULL,
  `salah_2` varchar(100) NOT NULL,
  `salah_3` varchar(100) NOT NULL,
  `pembahasan` text NOT NULL,
  PRIMARY KEY (`id_soal`),
  KEY `kode_modul` (`kode_modul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` varchar(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','pengajar','peserta') NOT NULL,
  `alamat` varchar(150) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_forum`
--
ALTER TABLE `tb_forum`
  ADD CONSTRAINT `tb_forum_ibfk_1` FOREIGN KEY (`id_user_pembuat`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kelas_user`
--
ALTER TABLE `tb_kelas_user`
  ADD CONSTRAINT `tb_kelas_user_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `tb_kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kelas_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD CONSTRAINT `tb_materi_ibfk_1` FOREIGN KEY (`kode_modul`) REFERENCES `tb_modul` (`kode_modul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_materi_peserta`
--
ALTER TABLE `tb_materi_peserta`
  ADD CONSTRAINT `tb_materi_peserta_ibfk_1` FOREIGN KEY (`kode_modul`) REFERENCES `tb_modul` (`kode_modul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_materi_peserta_ibfk_2` FOREIGN KEY (`id_user_peserta`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_modul`
--
ALTER TABLE `tb_modul`
  ADD CONSTRAINT `tb_modul_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `tb_kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_nilai_peserta`
--
ALTER TABLE `tb_nilai_peserta`
  ADD CONSTRAINT `tb_nilai_peserta_ibfk_1` FOREIGN KEY (`kode_modul`) REFERENCES `tb_modul` (`kode_modul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_peserta_ibfk_2` FOREIGN KEY (`id_user_peserta`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  ADD CONSTRAINT `tb_review_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_review_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_sesi_soal`
--
ALTER TABLE `tb_sesi_soal`
  ADD CONSTRAINT `tb_sesi_soal_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `tb_soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_sesi_soal_ibfk_2` FOREIGN KEY (`id_sesi`) REFERENCES `tb_nilai_peserta` (`id_sesi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_sesi_soal_ibfk_3` FOREIGN KEY (`id_user_peserta`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_ibfk_1` FOREIGN KEY (`kode_modul`) REFERENCES `tb_modul` (`kode_modul`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
