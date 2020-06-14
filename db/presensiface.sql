-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2020 at 04:32 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `presensiface`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapresensi`
--

CREATE TABLE IF NOT EXISTS `datapresensi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` varchar(45) NOT NULL DEFAULT '',
  `Hari` varchar(45) NOT NULL,
  `TanggalPresensi` varchar(45) NOT NULL DEFAULT '',
  `PresensiMasuk` varchar(45) NOT NULL DEFAULT '',
  `PresensiKeluar` varchar(45) NOT NULL DEFAULT '',
  `TanggalBuat` date NOT NULL DEFAULT '0000-00-00',
  `Emai` varchar(255) NOT NULL,
  `Tipe` varchar(45) NOT NULL,
  `Foto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(35) NOT NULL DEFAULT '',
  `alamat` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(13) NOT NULL DEFAULT '',
  `username` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(45) NOT NULL DEFAULT '',
  `id_level` varchar(5) NOT NULL DEFAULT '',
  `NA` varchar(5) NOT NULL DEFAULT '',
  `TanggalBuat` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Foto` varchar(255) NOT NULL DEFAULT '',
  `Ktp` varchar(45) NOT NULL,
  `tanggallahir` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `lastlogin`
--

CREATE TABLE IF NOT EXISTS `lastlogin` (
  `id_lastlogin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` varchar(45) NOT NULL DEFAULT '',
  `TanggalBuat` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_lastlogin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `lastlogin`
--

INSERT INTO `lastlogin` (`id_lastlogin`, `id_user`, `TanggalBuat`) VALUES
(1, '1', '2019-08-12 17:33:46'),
(2, '5', '2019-08-12 19:44:57'),
(3, '1', '2019-08-13 07:23:06'),
(4, '5', '2019-08-13 08:11:29'),
(5, '1', '2019-08-13 08:13:16'),
(6, '1', '2019-10-19 12:45:33'),
(7, '1', '2020-01-09 17:23:44'),
(8, '1', '2020-02-04 17:14:34'),
(9, '1', '2020-02-17 08:51:21'),
(10, '6', '2020-02-17 11:49:59'),
(11, '5', '2020-02-17 13:51:42'),
(12, '5', '2020-02-17 13:54:36'),
(13, '5', '2020-02-17 13:58:13'),
(14, '6', '2020-02-17 14:56:13'),
(15, '1', '2020-02-17 19:48:11'),
(16, '1', '2020-02-17 20:05:51'),
(17, '1', '2020-02-17 21:08:01'),
(18, '6', '2020-02-17 21:10:38'),
(19, '5', '2020-02-18 11:52:47'),
(20, '5', '2020-02-18 12:12:09'),
(21, '5', '2020-02-18 17:19:43'),
(22, '1', '2020-02-18 17:45:01'),
(23, '1', '2020-06-11 19:10:15'),
(24, '1', '2020-06-14 20:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE IF NOT EXISTS `notifikasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(45) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `iduser` varchar(45) NOT NULL,
  `NA` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `judul`, `isi`, `tanggal`, `iduser`, `NA`) VALUES
(1, 'Notifikasi ', 'Pengumuman,bahwasanya tanggal 21 oktober 2020 kita rekreasi bersama', '2019-12-26 11:23:59', '5', 'N'),
(3, 'Notifikasi ', 'Pengumuman,bahwasanya tanggal 21 oktober 2020 kita rekreasi bersama', '2019-12-26 11:25:15', '6', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nama` varchar(45) NOT NULL DEFAULT '',
  `Slider` varchar(255) NOT NULL DEFAULT '',
  `TanggalBuat` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Url` varchar(255) NOT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(35) NOT NULL DEFAULT '',
  `alamat` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(13) NOT NULL DEFAULT '',
  `username` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(45) NOT NULL DEFAULT '',
  `id_level` varchar(5) NOT NULL DEFAULT '',
  `NA` varchar(5) NOT NULL DEFAULT '',
  `TanggalBuat` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Foto` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `phone`, `username`, `password`, `id_level`, `NA`, `TanggalBuat`, `Foto`) VALUES
(1, 'Administrator', 'indraprasta', '0851234567111', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 'N', '2019-08-12 17:33:46', 'user-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE IF NOT EXISTS `user_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(45) NOT NULL DEFAULT '',
  `NA` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `level`, `NA`) VALUES
(1, 'Administrator', 'N'),
(2, 'Karyawan', 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
