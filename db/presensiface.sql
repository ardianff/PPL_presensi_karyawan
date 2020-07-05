-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2020 pada 09.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensiface`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapresensi`
--

CREATE TABLE `datapresensi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(45) NOT NULL DEFAULT '',
  `Hari` varchar(45) NOT NULL,
  `TanggalPresensi` varchar(45) NOT NULL DEFAULT '',
  `PresensiMasuk` varchar(45) NOT NULL DEFAULT '',
  `PresensiKeluar` varchar(45) NOT NULL DEFAULT '',
  `TanggalBuat` date NOT NULL DEFAULT '0000-00-00',
  `Emai` varchar(255) NOT NULL,
  `Tipe` varchar(45) NOT NULL,
  `Foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datapresensi`
--

INSERT INTO `datapresensi` (`id`, `id_user`, `Hari`, `TanggalPresensi`, `PresensiMasuk`, `PresensiKeluar`, `TanggalBuat`, `Emai`, `Tipe`, `Foto`) VALUES
(1, 'lukman', 'Kamis', '2019-03-21', '10:23:15', '', '2019-03-21', '356578091791629', 'Masuk', 'user-8.jpg'),
(2, 'lukman', 'Kamis', '2019-03-21', '', '10:23:15', '2019-03-21', '356578091791629', 'Keluar', 'user-8.jpg'),
(4, 'lukman', 'Selasa', '2020-02-18', '14:08:29', '', '2020-02-18', '354465106043018', 'Masuk', 'user-10.jpg'),
(5, 'lukman', 'Selasa', '2020-02-18', '', '14:09:00', '2020-02-18', '354465106043018', 'Keluar', 'user-10.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `tanggallahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `alamat`, `phone`, `username`, `password`, `id_level`, `NA`, `TanggalBuat`, `Foto`, `Ktp`, `tanggallahir`) VALUES
(34, 'Ardian', 'Semarang', '123', 'ardian', '5b3bb3e5458e02aa356f2fc671ae08d9', '2', '', '2020-07-16 00:00:00', 'pic_karyawan1593754500688.jpg', '123', '2020-07-07'),
(41, 'Septian Muhammad Adii', 'Boyolaliii', '0822255221311', 'septian', '202cb962ac59075b964b07152d234b70', '2', '', '2020-07-05 14:16:02', 'user-5.png', '12344', '2020-06-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lastlogin`
--

CREATE TABLE `lastlogin` (
  `id_lastlogin` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(45) NOT NULL DEFAULT '',
  `TanggalBuat` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lastlogin`
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
(23, '1', '2020-06-28 09:42:33'),
(24, '6', '2020-06-28 09:44:26'),
(25, '6', '2020-06-28 09:47:55'),
(26, '1', '2020-06-28 09:48:11'),
(27, '7', '2020-06-28 09:50:06'),
(28, '6', '2020-06-28 09:54:43'),
(29, '6', '2020-06-28 09:55:12'),
(30, '6', '2020-07-03 13:44:10'),
(31, '6', '2020-07-03 14:05:09'),
(32, '6', '2020-07-03 14:22:54'),
(33, '6', '2020-07-03 16:03:29'),
(34, '6', '2020-07-03 20:34:45'),
(35, '6', '2020-07-03 22:10:28'),
(36, '6', '2020-07-03 22:33:20'),
(37, '1', '2020-07-03 22:38:02'),
(38, '6', '2020-07-03 22:49:26'),
(39, '6', '2020-07-03 22:50:26'),
(40, '6', '2020-07-04 00:54:29'),
(41, '6', '2020-07-04 11:32:09'),
(42, '6', '2020-07-04 12:09:46'),
(43, '6', '2020-07-05 12:00:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(45) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `iduser` varchar(45) NOT NULL,
  `NA` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `judul`, `isi`, `tanggal`, `iduser`, `NA`) VALUES
(4, 'Test', 'Test Saja', '2020-07-05 14:24:03', '41', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(10) UNSIGNED NOT NULL,
  `Nama` varchar(45) NOT NULL DEFAULT '',
  `Slider` varchar(255) NOT NULL DEFAULT '',
  `TanggalBuat` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `Nama`, `Slider`, `TanggalBuat`, `Url`) VALUES
(3, 'slide 1', 'slide1.jpg', '2019-08-13 07:23:23', ''),
(4, 'slide 2', 'slide2.jpg', '2019-08-13 07:23:34', ''),
(15, 'Test', 'pic_karyawan1593754500688.jpg', '2020-07-05 14:25:31', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(35) NOT NULL DEFAULT '',
  `alamat` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(13) NOT NULL DEFAULT '',
  `username` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(45) NOT NULL DEFAULT '',
  `id_level` varchar(5) NOT NULL DEFAULT '',
  `NA` varchar(5) NOT NULL DEFAULT '',
  `TanggalBuat` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Foto` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `phone`, `username`, `password`, `id_level`, `NA`, `TanggalBuat`, `Foto`) VALUES
(1, 'Administratorr', 'Jemberr', '0851234567111', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 'N', '2019-08-12 17:33:46', 'user-1.jpg'),
(5, 'lukman', 'jember', '123', 'lukman', 'b5bbc8cf472072baffe920e4e28ee29c', '2', '', '2019-08-12 19:43:21', ''),
(6, 'Septian Muhammad Adi', 'Boyolali', '082225522131', 'septian', '5b3bb3e5458e02aa356f2fc671ae08d9', '1', '', '2020-06-28 09:44:16', ''),
(7, 'Alifffff', 'Pemalang', '082222222', 'alif', '099a147c0c6bcd34009896b2cc88633c', '1', '', '2020-06-28 09:49:44', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(45) NOT NULL DEFAULT '',
  `NA` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id`, `level`, `NA`) VALUES
(1, 'Administrator', 'N'),
(2, 'Karyawan', 'N');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datapresensi`
--
ALTER TABLE `datapresensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lastlogin`
--
ALTER TABLE `lastlogin`
  ADD PRIMARY KEY (`id_lastlogin`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datapresensi`
--
ALTER TABLE `datapresensi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `lastlogin`
--
ALTER TABLE `lastlogin`
  MODIFY `id_lastlogin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
