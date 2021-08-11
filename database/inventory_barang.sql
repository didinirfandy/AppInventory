-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2021 pada 16.47
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_log_barang`
--

CREATE TABLE `activity_log_barang` (
  `id_log_barang` int(11) NOT NULL,
  `date_log` datetime NOT NULL,
  `nik_admin` int(11) NOT NULL,
  `kd_pembelian` varchar(25) NOT NULL,
  `kd_supplier` varchar(25) NOT NULL,
  `kd_barang` varchar(8) NOT NULL,
  `qty_sisa` int(11) NOT NULL,
  `qty_gudang` int(11) NOT NULL,
  `qty_batal` int(11) NOT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `activity_log_barang`
--

INSERT INTO `activity_log_barang` (`id_log_barang`, `date_log`, `nik_admin`, `kd_pembelian`, `kd_supplier`, `kd_barang`, `qty_sisa`, `qty_gudang`, `qty_batal`, `remark`) VALUES
(15, '2021-07-30 15:10:45', 123, 'BLI30072100001', 'SUP000001', '01.03.', 15, 0, 0, ''),
(16, '2021-07-30 15:10:45', 123, 'BLI30072100001', 'SUP000001', '02.01.', 20, 0, 0, ''),
(17, '2021-07-30 15:10:45', 123, 'BLI30072100001', 'SUP000001', '01.04.', 16, 0, 0, ''),
(22, '2021-08-01 12:35:23', 123, 'BLI01082100001', 'SUP000002', '01.03.', 7, 0, 0, 'ini alasan nya'),
(23, '2021-08-01 12:35:23', 123, 'BLI01082100001', 'SUP000002', '04.01.', 7, 0, 0, 'ini alasan nya'),
(28, '2021-08-05 02:52:24', 123, 'BLI30072100001', 'SUP000001', '02.01.', 15, 5, 0, 'test masuk barang'),
(38, '2021-08-07 00:52:19', 123, 'BLI30072100001', 'SUP000001', '02.01.', 9, 1, 0, 'asdas'),
(39, '2021-08-07 00:53:58', 123, 'BLI30072100001', 'SUP000001', '02.01.', 9, 1, 0, 'asdasd'),
(40, '2021-08-07 00:58:58', 123, 'BLI30072100001', 'SUP000001', '02.01.', 9, 1, 0, 'asdasd'),
(41, '2021-08-07 00:59:31', 123, 'BLI30072100001', 'SUP000001', '02.01.', 8, 0, 1, 'asdasd'),
(42, '2021-08-07 01:21:44', 123, 'BLI30072100001', 'SUP000001', '02.01.', 8, 0, 1, 'adfafad'),
(43, '2021-08-07 01:23:06', 123, 'BLI30072100001', 'SUP000001', '02.01.', 0, 0, 8, 'kuhou'),
(44, '2021-08-07 01:26:07', 123, 'BLI30072100001', 'SUP000001', '01.04.', 0, 16, 0, 'aklasjadf'),
(45, '2021-08-07 01:30:34', 123, 'BLI07082100001', 'SUP000003', '02.03.', 50, 0, 0, 'asdasdasddasd'),
(46, '2021-08-07 01:30:34', 123, 'BLI07082100001', 'SUP000003', '03.04.', 30, 0, 0, 'asdasdasddasd'),
(47, '2021-08-07 01:30:34', 123, 'BLI07082100001', 'SUP000003', '06.04.', 40, 0, 0, 'asdasdasddasd'),
(48, '2021-08-07 01:35:10', 123, 'BLI07082100002', 'SUP000002', '01.01.', 10, 0, 0, 'asdassfbaeb'),
(49, '2021-08-07 01:38:15', 123, 'BLI07082100003', 'SUP000001', '03.03.', 15, 0, 0, 'kjhalfhalf'),
(50, '2021-08-07 18:10:46', 123, 'BLI01082100001', 'SUP000002', '04.01.', 2, 0, 5, 'sdsdfa'),
(51, '2021-08-07 18:15:30', 123, 'BLI01082100001', 'SUP000002', '01.03.', 2, 5, 0, 'wedasdas'),
(52, '2021-08-07 18:15:50', 123, 'BLI01082100001', 'SUP000002', '01.03.', 1, 0, 1, 'asdasd'),
(53, '2021-08-07 20:04:38', 123, 'BLI07082100003', 'SUP000001', '03.03.', 15, 0, 0, 'terasdafasvrwghnyjm'),
(54, '2021-08-07 20:23:17', 123, 'BLI07082100003', 'SUP000001', '03.03.', 15, 0, 0, 'asdas'),
(55, '2021-08-07 20:24:28', 123, 'BLI07082100003', 'SUP000001', '03.03.', 15, 0, 0, 'asdasdq'),
(56, '2021-08-07 20:26:47', 123, 'BLI07082100003', 'SUP000001', '03.03.', 15, 0, 0, 'agdfadfb'),
(57, '2021-08-07 20:34:15', 123, 'BLI07082100003', 'SUP000001', '03.03.', 15, 0, 0, 'asdqwdas'),
(58, '2021-08-07 20:36:01', 123, 'BLI01082100001', 'SUP000002', '01.03.', 0, 0, 1, 'asdafwfadw'),
(59, '2021-08-07 20:42:02', 123, 'BLI07082100002', 'SUP000002', '01.01.', 5, 5, 0, 'qefvafda'),
(60, '2021-08-07 20:42:18', 123, 'BLI07082100002', 'SUP000002', '01.01.', 0, 0, 5, 'asdqwdasd'),
(61, '2021-08-07 20:45:09', 123, 'BLI07082100002', 'SUP000002', '01.01.', 5, 0, 5, 'xbadfa'),
(62, '2021-08-07 20:48:06', 123, 'BLI07082100002', 'SUP000002', '01.01.', 0, 5, 0, 'favawd'),
(63, '2021-08-07 20:55:54', 123, 'BLI07082100002', 'SUP000002', '01.01.', 5, 0, 5, 'afsdsdfg'),
(64, '2021-08-07 20:57:09', 123, 'BLI07082100002', 'SUP000002', '01.01.', 0, 5, 0, 'afaeghaer'),
(65, '2021-08-07 20:59:09', 123, 'BLI07082100002', 'SUP000002', '01.01.', 6, 4, 0, 'asdqwdas'),
(66, '2021-08-07 20:59:22', 123, 'BLI07082100002', 'SUP000002', '01.01.', 2, 0, 4, 'asdqw'),
(67, '2021-08-07 20:59:38', 123, 'BLI07082100002', 'SUP000002', '01.01.', 0, 2, 0, 'asdfaedfq'),
(68, '2021-08-07 21:09:24', 123, 'BLI07082100002', 'SUP000002', '01.01.', 2, 8, 0, 'dfasdf'),
(69, '2021-08-07 21:09:42', 123, 'BLI07082100002', 'SUP000002', '01.01.', 0, 0, 2, 'sdqwdsd'),
(70, '2021-08-07 21:49:31', 123, 'BLI07082100002', 'SUP000002', '01.01.', 8, 0, 2, 'asdasdqw'),
(71, '2021-08-07 21:50:36', 123, 'BLI07082100002', 'SUP000002', '01.01.', 8, 0, 2, 'asdqeadsf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_log_harga`
--

CREATE TABLE `activity_log_harga` (
  `id_log_harga` int(11) NOT NULL,
  `date_log` datetime DEFAULT NULL,
  `nik_admin` int(11) NOT NULL,
  `kd_pembelian` varchar(25) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `kd_gudang` varchar(25) NOT NULL,
  `kd_supplier` varchar(25) NOT NULL,
  `harga_start` double NOT NULL,
  `harga_now` double NOT NULL,
  `tgl_masuk_gudang` date NOT NULL,
  `tgl_harga_naik` date DEFAULT NULL,
  `tgl_harga_turun` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `activity_log_harga`
--

INSERT INTO `activity_log_harga` (`id_log_harga`, `date_log`, `nik_admin`, `kd_pembelian`, `kd_barang`, `kd_gudang`, `kd_supplier`, `harga_start`, `harga_now`, `tgl_masuk_gudang`, `tgl_harga_naik`, `tgl_harga_turun`) VALUES
(1, '2021-08-05 02:52:24', 123, 'BLI30072100001', 'GDG05082100001', '02.01.', 'SUP000001', 1176000, 1176000, '2021-08-05', '0000-00-00', '0000-00-00'),
(2, '2021-08-07 00:52:19', 123, 'BLI30072100001', 'GDG07082100001', '02.01.', 'SUP000001', 1176000, 1176000, '2021-08-07', '0000-00-00', '0000-00-00'),
(3, '2021-08-07 00:53:58', 123, 'BLI30072100001', 'GDG07082100002', '02.01.', 'SUP000001', 1176000, 1176000, '2021-08-07', '0000-00-00', '0000-00-00'),
(4, '2021-08-07 00:58:58', 123, 'BLI30072100001', 'GDG07082100003', '02.01.', 'SUP000001', 1176000, 1176000, '2021-08-07', '0000-00-00', '0000-00-00'),
(5, '2021-08-07 01:26:07', 123, 'BLI30072100001', 'GDG07082100004', '01.04.', 'SUP000001', 1760000, 1760000, '2021-08-07', '0000-00-00', '0000-00-00'),
(6, '2021-08-07 18:15:30', 123, 'BLI01082100001', 'GDG07082100005', '01.03.', 'SUP000002', 5500000, 5500000, '2021-08-07', '0000-00-00', '0000-00-00'),
(7, '2021-08-07 20:42:02', 123, 'BLI07082100002', 'GDG07082100006', '01.01.', 'SUP000002', 2200000, 2200000, '2021-08-07', '0000-00-00', '0000-00-00'),
(8, '2021-08-07 20:48:06', 123, 'BLI07082100002', 'GDG07082100007', '01.01.', 'SUP000002', 2200000, 2200000, '2021-08-07', '0000-00-00', '0000-00-00'),
(9, '2021-08-07 20:57:09', 123, 'BLI07082100002', 'GDG07082100008', '01.01.', 'SUP000002', 2200000, 2200000, '2021-08-07', '0000-00-00', '0000-00-00'),
(10, '2021-08-07 20:59:09', 123, 'BLI07082100002', 'GDG07082100009', '01.01.', 'SUP000002', 2200000, 2200000, '2021-08-07', '0000-00-00', '0000-00-00'),
(11, '2021-08-07 20:59:38', 123, 'BLI07082100002', 'GDG07082100010', '01.01.', 'SUP000002', 2200000, 2200000, '2021-08-07', '0000-00-00', '0000-00-00'),
(12, '2021-08-07 21:09:24', 123, 'BLI07082100002', 'GDG07082100011', '01.01.', 'SUP000002', 2200000, 2200000, '2021-08-07', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_log_user`
--

CREATE TABLE `activity_log_user` (
  `log_id` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `log_user` varchar(100) NOT NULL,
  `log_menu` varchar(100) NOT NULL,
  `log_aksi` varchar(100) NOT NULL,
  `log_item` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `activity_log_user`
--

INSERT INTO `activity_log_user` (`log_id`, `log_time`, `log_user`, `log_menu`, `log_aksi`, `log_item`) VALUES
(1, '2021-07-24 03:34:03', 'Admin', 'login', 'Masuk', ''),
(2, '2021-07-24 03:35:34', 'Admin', 'logout', 'Keluar', ''),
(3, '2021-07-24 03:35:46', 'Admin', 'login', 'Masuk', ''),
(4, '2021-07-24 03:36:45', 'Admin', 'logout', 'Keluar', ''),
(5, '2021-07-24 03:53:37', 'Admin', 'login', 'Masuk', ''),
(6, '2021-07-24 03:53:44', 'Admin', 'logout', 'Keluar', ''),
(7, '2021-07-24 03:54:53', 'Admin', 'login', 'Masuk', ''),
(8, '2021-07-24 03:55:10', 'Admin', 'logout', 'Keluar', ''),
(9, '2021-07-24 03:55:18', 'Admin', 'login', 'Masuk', ''),
(10, '2021-07-24 03:56:56', 'Admin', 'logout', 'Keluar', ''),
(11, '2021-07-24 03:57:01', 'Admin', 'login', 'Masuk', ''),
(12, '2021-07-24 03:58:42', 'Admin', 'logout', 'Keluar', ''),
(13, '2021-07-24 03:58:49', 'Admin', 'login', 'Masuk', ''),
(14, '2021-07-24 03:59:59', 'Admin', 'logout', 'Keluar', ''),
(15, '2021-07-24 04:00:07', 'Admin', 'login', 'Masuk', ''),
(16, '2021-07-24 04:01:11', 'Admin', 'logout', 'Keluar', ''),
(17, '2021-07-24 04:02:18', 'Admin', 'login', 'Masuk', ''),
(18, '2021-07-24 04:02:27', 'Admin', 'logout', 'Keluar', ''),
(19, '2021-07-24 04:03:15', 'Admin', 'login', 'Masuk', ''),
(20, '2021-07-24 04:03:22', 'Admin', 'logout', 'Keluar', ''),
(21, '2021-07-24 15:12:23', 'Admin', 'login', 'Masuk', ''),
(22, '2021-07-24 18:58:33', 'Admin', 'login', 'Masuk', ''),
(23, '2021-07-24 21:47:15', 'Admin', 'login', 'Masuk', ''),
(24, '2021-07-24 23:34:33', 'Admin', 'logout', 'Keluar', ''),
(25, '2021-07-24 23:34:39', 'Admin', 'login', 'Masuk', ''),
(26, '2021-07-25 10:40:50', 'Admin', 'login', 'Masuk', ''),
(27, '2021-07-25 10:40:57', 'Admin', 'logout', 'Keluar', ''),
(28, '2021-07-25 10:41:26', 'Admin', 'login', 'Masuk', ''),
(29, '2021-07-25 10:41:32', 'Admin', 'logout', 'Keluar', ''),
(30, '2021-07-25 22:46:26', 'Admin', 'login', 'Masuk', ''),
(31, '2021-07-26 02:25:05', 'Admin', 'logout', 'Keluar', ''),
(32, '2021-07-26 21:16:09', 'Admin', 'login', 'Masuk', ''),
(33, '2021-07-26 22:35:41', 'Admin', 'logout', 'Keluar', ''),
(34, '2021-07-28 14:24:50', 'Admin', 'login', 'Masuk', ''),
(35, '2021-07-28 23:16:31', 'Admin', 'login', 'Masuk', ''),
(36, '2021-07-29 11:51:18', 'Admin', 'login', 'Masuk', ''),
(37, '2021-07-30 02:55:58', 'Admin', 'login', 'Masuk', ''),
(38, '2021-07-30 13:09:19', 'Admin', 'login', 'Masuk', ''),
(39, '2021-07-30 15:08:56', 'Admin', 'Tambah Pembelian', 'Delete', 'BLI30072100001'),
(40, '2021-07-30 15:09:58', 'Admin', 'Tambah Pembelian', 'Delete', 'BLI30072100001'),
(41, '2021-07-30 17:37:53', 'Admin', 'login', 'Masuk', ''),
(42, '2021-07-31 00:09:17', 'Admin', 'logout', 'Keluar', ''),
(43, '2021-07-31 00:09:22', 'Admin', 'login', 'Masuk', ''),
(44, '2021-07-31 02:15:16', 'Admin', 'logout', 'Keluar', ''),
(45, '2021-07-31 20:35:58', 'Admin', 'login', 'Masuk', ''),
(46, '2021-07-31 21:57:44', 'Admin', 'login', 'Masuk', ''),
(47, '2021-08-01 00:41:18', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(48, '2021-08-01 00:41:58', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(49, '2021-08-01 00:45:05', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(50, '2021-08-01 00:45:05', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(51, '2021-08-01 00:45:15', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(52, '2021-08-01 00:53:18', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(53, '2021-08-01 00:57:10', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(54, '2021-08-01 01:10:07', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(55, '2021-08-01 01:11:17', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(56, '2021-08-01 01:16:27', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(57, '2021-08-01 01:17:51', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(58, '2021-08-01 01:19:00', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(59, '2021-08-01 01:30:37', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(60, '2021-08-01 01:32:50', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(61, '2021-08-01 01:32:52', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(62, '2021-08-01 01:35:29', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(63, '2021-08-01 01:39:27', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(64, '2021-08-01 01:41:35', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(65, '2021-08-01 01:45:02', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(66, '2021-08-01 01:57:43', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(67, '2021-08-01 02:55:36', 'Aset', 'Tambah Pembelian', 'Delete', 'BLI01082100002'),
(68, '2021-08-01 05:35:04', 'Admin', 'login', 'Masuk', ''),
(69, '2021-08-01 11:50:09', 'Admin', 'login', 'Masuk', ''),
(70, '2021-08-01 12:19:56', 'Admin', 'login', 'Masuk', ''),
(71, '2021-08-01 12:24:17', 'Admin', 'login', 'Masuk', ''),
(72, '2021-08-01 22:46:51', 'Admin', 'login', 'Masuk', ''),
(73, '2021-08-02 07:22:42', 'Admin', 'login', 'Masuk', ''),
(74, '2021-08-02 07:24:32', 'Admin', 'logout', 'Keluar', ''),
(75, '2021-08-02 07:24:39', 'Admin', 'login', 'Masuk', ''),
(76, '2021-08-02 20:36:09', 'Admin', 'logout', 'Keluar', ''),
(77, '2021-08-02 20:36:15', 'Admin', 'login', 'Masuk', ''),
(78, '2021-08-03 12:51:58', 'Admin', 'login', 'Masuk', ''),
(79, '2021-08-03 21:28:01', 'Admin', 'logout', 'Keluar', ''),
(80, '2021-08-03 21:29:04', 'Admin', 'login', 'Masuk', ''),
(81, '2021-08-04 08:08:29', 'Admin', 'login', 'Masuk', ''),
(82, '2021-08-05 19:23:41', 'Admin', 'logout', 'Keluar', ''),
(83, '2021-08-06 04:28:06', 'Admin', 'login', 'Masuk', ''),
(84, '2021-08-06 17:44:18', 'Admin', 'login', 'Masuk', ''),
(85, '2021-08-07 00:10:38', 'Admin', 'login', 'Masuk', ''),
(86, '2021-08-07 17:46:40', 'Admin', 'login', 'Masuk', ''),
(87, '2021-08-08 10:56:20', 'Admin', 'login', 'Masuk', ''),
(88, '2021-08-09 13:52:44', 'Admin', 'login', 'Masuk', ''),
(89, '2021-08-09 19:44:05', 'Admin', 'logout', 'Keluar', ''),
(90, '2021-08-09 20:27:26', 'Admin', 'login', 'Masuk', ''),
(91, '2021-08-10 22:18:05', 'Admin', 'login', 'Masuk', ''),
(92, '2021-08-11 05:00:11', 'Admin', 'login', 'Masuk', ''),
(93, '2021-08-11 05:06:16', 'Admin', 'logout', 'Keluar', ''),
(94, '2021-08-11 05:07:13', 'Admin', 'login', 'Masuk', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail` int(6) NOT NULL,
  `kd_pembelian` varchar(25) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `harga_beli` double NOT NULL,
  `qty` int(11) NOT NULL,
  `qty_sisa` int(11) NOT NULL,
  `qty_gudang` int(11) NOT NULL,
  `qty_batal` int(11) NOT NULL,
  `total` double NOT NULL,
  `status_beli` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '5=cencel dan gudang;4=cencel;3=cencel sebagian;2=gudang;1=gudang sebagaian;0=pengiriman',
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1=TidakAktif;0=Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail`, `kd_pembelian`, `kd_barang`, `satuan`, `harga_beli`, `qty`, `qty_sisa`, `qty_gudang`, `qty_batal`, `total`, `status_beli`, `status`) VALUES
(12, 'BLI30072100001', '01.03.', 'SET', 1200000, 15, 15, 0, 0, 18000000, '0', '0'),
(13, 'BLI30072100001', '02.01.', 'UNIT', 1120000, 20, 0, 6, 14, 0, '5', '0'),
(14, 'BLI30072100001', '01.04.', 'SET', 1600000, 16, 0, 16, 0, 25600000, '2', '0'),
(21, 'BLI01082100001', '01.03.', 'UNIT', 5000000, 7, 0, 5, 2, 0, '5', '0'),
(22, 'BLI01082100001', '04.01.', 'SET', 4500000, 7, 2, 0, 0, 9000000, '3', '0'),
(23, 'BLI07082100001', '02.03.', 'UNIT', 5000000, 50, 50, 0, 0, 250000000, '0', '0'),
(24, 'BLI07082100001', '03.04.', 'SET', 3000000, 30, 30, 0, 0, 90000000, '0', '0'),
(25, 'BLI07082100001', '06.04.', 'PCS', 4000000, 40, 40, 0, 0, 160000000, '0', '0'),
(26, 'BLI07082100002', '01.01.', 'SET', 2000000, 10, 10, 0, 0, 20000000, '0', '0'),
(27, 'BLI07082100003', '03.03.', 'SET', 2500000, 15, 15, 0, 0, 37500000, '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `kd_penjualan` varchar(25) NOT NULL,
  `kd_gudang` varchar(25) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `harga` double NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `kd_penjualan`, `kd_gudang`, `kd_barang`, `satuan`, `harga`, `qty`, `total`) VALUES
(14, 'PNJL08082100008', 'GDG08082100001', '01.03.', 'SET', 1320000, 1, 1320000),
(15, 'PNJL08082100008', 'GDG08082100001', '01.03.', 'SET', 1320000, 2, 2640000),
(16, 'PNJL09082100001', 'GDG08082100001', '01.03.', 'SET', 1320000, 1, 1320000),
(17, 'PNJ09082100001', 'GDG08082100001', '01.03.', 'SET', 1320000, 1, 1320000),
(18, 'PNJ09082100002', 'GDG09082100001', '01.02.', 'UNIT', 1925000, 15, 28875000),
(19, 'PNJ09082100003', 'GDG08082100001', '01.03.', 'SET', 1320000, 1, 1320000),
(20, 'PNJ09082100004', 'GDG08082100001', '01.03.', 'SET', 1320000, 1, 1320000),
(21, 'PNJ09082100005', 'GDG08082100001', '01.03.', 'SET', 1320000, 1, 1320000),
(22, 'PNJ09082100006', 'GDG08082100001', '01.03.', 'SET', 1320000, 1, 1320000),
(23, 'PNJ09082100007', 'GDG08082100001', '01.03.', 'SET', 1320000, 1, 1320000),
(24, 'PNJ09082100008', 'GDG09082100002', '01.04.', 'UNIT', 1320000, 1, 1320000),
(25, 'PNJ09082100009', 'GDG09082100002', '01.04.', 'UNIT', 1320000, 1, 1320000),
(26, 'PNJ09082100010', 'GDG09082100002', '01.04.', 'UNIT', 1320000, 1, 1320000),
(27, 'PNJ09082100011', 'GDG09082100002', '01.04.', 'UNIT', 1320000, 1, 1320000),
(28, 'PNJ09082100012', 'GDG09082100002', '01.04.', 'UNIT', 1320000, 1, 1320000),
(29, 'PNJ09082100012', 'GDG09082100002', '01.04.', 'UNIT', 1320000, 2, 2640000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_barang`
--

CREATE TABLE `kode_barang` (
  `id_kd_barang` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `sub_kode` varchar(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `persen_naik` varchar(25) DEFAULT NULL,
  `persen_turun` varchar(25) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=Tidak Aktif;1=Aktif',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kode_barang`
--

INSERT INTO `kode_barang` (`id_kd_barang`, `kode`, `sub_kode`, `nama_barang`, `harga`, `persen_naik`, `persen_turun`, `status`, `created_at`) VALUES
(1, '01.', '*', 'Sofa', 0, '10', '5', '1', NULL),
(2, '01.', '01.', 'Sofa tamu L minimalis', 0, NULL, NULL, '1', NULL),
(3, '01.', '02.', 'Sofa U minimalis living fulset meja', 0, NULL, NULL, '1', NULL),
(4, '01.', '03.', 'Set sofa rotan sintesis minimalis azura', 0, NULL, NULL, '1', NULL),
(5, '01.', '04.', 'Sofa louis kayu jati jepara', 0, NULL, NULL, '1', NULL),
(6, '01.', '05.', 'Sofa minimalis modern L shape tosca', 0, NULL, NULL, '1', NULL),
(7, '02.', '*', 'Meja', 0, '5', '10', '1', NULL),
(8, '02.', '01.', 'Set meja makan jati minimalis 6 kursi ', 0, NULL, NULL, '1', NULL),
(9, '02.', '02.', 'Set meja makan trembesi 2x1 meter solid glossy', 0, NULL, NULL, '1', NULL),
(10, '02.', '03.', 'Meja kerja putih welnut ', 0, NULL, NULL, '1', NULL),
(11, '02.', '04.', 'Set meja café minimalis kayu jati ', 0, NULL, NULL, '1', NULL),
(12, '02.', '05.', 'Meja repsesionis minimalis modern ', 0, NULL, NULL, '1', NULL),
(13, '03.', '*', 'Kursi', 0, '5', '10', '1', NULL),
(14, '03.', '01.', 'Set kursi teras jati minimalis daun jepara', 0, NULL, NULL, '1', NULL),
(15, '03.', '02.', 'Kursi tamu minimalis model box', 0, NULL, NULL, '1', NULL),
(16, '03.', '03.', 'Kursi retro L minimalis', 0, NULL, NULL, '1', NULL),
(17, '03.', '04.', 'Set kursi tamu jati minimalis model koin mawar', 0, NULL, NULL, '1', NULL),
(18, '03.', '05.', 'Kursi duduk laci sepatu minimalis ', 0, NULL, NULL, '1', NULL),
(19, '04.', '*', 'Lemari', 0, '10', '5', '1', NULL),
(20, '04.', '01.', 'Lemari pakaian 3 pintu glossy', 0, NULL, NULL, '1', NULL),
(21, '04.', '02.', 'Lemari tv bufet lemari pajangan', 0, NULL, NULL, '1', NULL),
(22, '04.', '03.', 'Lemari pajangan minimalis ukir jati', 0, NULL, NULL, '1', NULL),
(23, '04.', '04.', 'Lemari pakaian 4 pintu sliding', 0, NULL, NULL, '1', NULL),
(24, '04.', '05.', 'Atria lemari pakaian pintu tarik', 0, NULL, NULL, '1', NULL),
(25, '05.', '*', 'Kasur', 0, '5', '10', '1', NULL),
(26, '05.', '01.', 'Kasur informa sleep 200x200 cm', 0, NULL, NULL, '1', NULL),
(27, '05.', '02.', 'Kasur informa sleep 120x200 cm', 0, NULL, NULL, '1', NULL),
(28, '05.', '03.', 'Kasur informa sleep 100x200 cm', 0, NULL, NULL, '1', NULL),
(29, '05.', '04.', 'Kasur busa inoac (ori)', 0, NULL, NULL, '1', NULL),
(30, '05.', '05.', 'Kasur spring bed inthebox 160x200 cm', 0, NULL, NULL, '1', NULL),
(31, '06.', '*', 'Kitchen Set', 0, '10', '5', '1', NULL),
(32, '06.', '01.', 'Kitchen set rak dapur lemari piring white marble', 0, NULL, NULL, '1', NULL),
(33, '06.', '02.', 'Kitchen set lemari multi fungsi', 0, NULL, NULL, '1', NULL),
(34, '06.', '03.', 'Kitchen set rak bawah 3 pintu', 0, NULL, NULL, '1', NULL),
(35, '06.', '04.', 'Kitchen set minimalis meranti', 0, NULL, NULL, '1', NULL),
(36, '06.', '05.', 'Kitchen set bawah 3 pintu modern', 0, NULL, NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_satuan_barang`
--

CREATE TABLE `kode_satuan_barang` (
  `id_satuan` int(11) NOT NULL,
  `kd_satuan` varchar(25) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1=tidak aktif;0=aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_barang`
--

CREATE TABLE `master_barang` (
  `id_barang` int(11) NOT NULL,
  `kd_pembelian` varchar(25) NOT NULL,
  `kd_gudang` varchar(25) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `tgl_masuk_gudang` datetime DEFAULT NULL,
  `harga_jual_start` int(11) NOT NULL,
  `harga_jual_now` int(11) DEFAULT NULL,
  `harga_beli` int(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=aktif;1=tidak aktif;',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_barang`
--

INSERT INTO `master_barang` (`id_barang`, `kd_pembelian`, `kd_gudang`, `kd_barang`, `tgl_masuk_gudang`, `harga_jual_start`, `harga_jual_now`, `harga_beli`, `qty`, `status`, `created_at`) VALUES
(3, 'BLI30072100001', 'GDG05082100001', '02.01.', '2021-08-05 02:52:24', 1176000, 1176000, 1120000, 5, '0', '2021-08-05 02:52:24'),
(4, 'BLI30072100001', 'GDG07082100001', '02.01.', '2021-08-07 00:52:19', 1176000, 1176000, 1120000, 1, '0', '2021-08-07 00:52:19'),
(5, 'BLI30072100001', 'GDG07082100002', '02.01.', '2021-08-07 00:53:58', 1176000, 1176000, 1120000, 1, '0', '2021-08-07 00:53:58'),
(6, 'BLI30072100001', 'GDG07082100003', '02.01.', '2021-08-07 00:58:58', 1176000, 1176000, 1120000, 1, '0', '2021-08-07 00:58:58'),
(7, 'BLI30072100001', 'GDG07082100004', '01.04.', '2021-08-07 01:26:07', 1760000, 1760000, 1600000, 16, '0', '2021-08-07 01:26:07'),
(8, 'BLI01082100001', 'GDG07082100005', '01.03.', '2021-08-07 18:15:30', 5500000, 5500000, 5000000, 5, '0', '2021-08-07 18:15:30'),
(9, 'BLI07082100002', 'GDG07082100006', '01.01.', '2021-08-07 20:42:02', 2200000, 2200000, 2000000, 5, '0', '2021-08-07 20:42:02'),
(10, 'BLI07082100002', 'GDG07082100007', '01.01.', '2021-08-07 20:48:06', 2200000, 2200000, 2000000, 5, '0', '2021-08-07 20:48:06'),
(11, 'BLI07082100002', 'GDG07082100008', '01.01.', '2021-08-07 20:57:09', 2200000, 2200000, 2000000, 5, '0', '2021-08-07 20:57:09'),
(12, 'BLI07082100002', 'GDG07082100009', '01.01.', '2021-08-07 20:59:09', 2200000, 2200000, 2000000, 4, '0', '2021-08-07 20:59:09'),
(13, 'BLI07082100002', 'GDG07082100010', '01.01.', '2021-08-07 20:59:38', 2200000, 2200000, 2000000, 2, '0', '2021-08-07 20:59:38'),
(14, 'BLI07082100002', 'GDG07082100011', '01.01.', '2021-08-07 21:09:24', 2200000, 2200000, 2000000, 8, '0', '2021-08-07 21:09:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_barang_cencel`
--

CREATE TABLE `master_barang_cencel` (
  `id_cencel` int(11) NOT NULL,
  `kd_pembelian` varchar(25) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `tgl_cencel` datetime DEFAULT NULL,
  `harga_beli` int(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_barang_cencel`
--

INSERT INTO `master_barang_cencel` (`id_cencel`, `kd_pembelian`, `kd_barang`, `tgl_cencel`, `harga_beli`, `qty`, `created_at`) VALUES
(7, 'BLI30072100001', '02.01.', '2021-08-05 03:59:01', 1120000, 5, '2021-08-05 03:59:01'),
(8, 'BLI30072100001', '02.01.', '2021-08-07 00:59:31', 1120000, 1, '2021-08-07 00:59:31'),
(9, 'BLI30072100001', '02.01.', '2021-08-07 01:21:44', 1120000, 1, '2021-08-07 01:21:44'),
(10, 'BLI30072100001', '02.01.', '2021-08-07 01:23:06', 1120000, 8, '2021-08-07 01:23:06'),
(11, 'BLI01082100001', '04.01.', '2021-08-07 18:10:46', 4500000, 5, '2021-08-07 18:10:46'),
(12, 'BLI01082100001', '01.03.', '2021-08-07 18:15:50', 5000000, 1, '2021-08-07 18:15:50'),
(13, 'BLI01082100001', '01.03.', '2021-08-07 20:36:01', 5000000, 1, '2021-08-07 20:36:01'),
(14, 'BLI07082100002', '01.01.', '2021-08-07 20:42:18', 2000000, 5, '2021-08-07 20:42:18'),
(15, 'BLI07082100002', '01.01.', '2021-08-07 20:45:09', 2000000, 5, '2021-08-07 20:45:09'),
(16, 'BLI07082100002', '01.01.', '2021-08-07 20:55:54', 2000000, 5, '2021-08-07 20:55:54'),
(17, 'BLI07082100002', '01.01.', '2021-08-07 20:59:22', 2000000, 4, '2021-08-07 20:59:22'),
(18, 'BLI07082100002', '01.01.', '2021-08-07 21:09:42', 2000000, 2, '2021-08-07 21:09:42'),
(19, 'BLI07082100002', '01.01.', '2021-08-07 21:49:31', 2000000, 2, '2021-08-07 21:49:31'),
(20, 'BLI07082100002', '01.01.', '2021-08-07 21:50:36', 2000000, 2, '2021-08-07 21:50:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_login`
--

CREATE TABLE `master_login` (
  `user_id` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `user_level` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '1=Admin;2=User',
  `genre` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '1=Laki-laki;2=Perempuan',
  `date_login` datetime NOT NULL,
  `status_login` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '1=Login;2=Logout',
  `user_valid` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '1=Valid;2=TidakValid',
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_login`
--

INSERT INTO `master_login` (`user_id`, `nik`, `username`, `password`, `nama`, `user_level`, `genre`, `date_login`, `status_login`, `user_valid`, `image`) VALUES
(1, 123, 'Admin', '202cb962ac59075b964b07152d234b70', 'Rista Nursolihah', '1', '2', '2021-08-11 05:07:13', '1', '1', 'default_cewe.png'),
(2, 123456, 'User', '202cb962ac59075b964b07152d234b70', 'Martin', '2', '1', '0000-00-00 00:00:00', '0', '1', 'default_cewe.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pembelian`
--

CREATE TABLE `master_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `kd_pembelian` varchar(25) NOT NULL,
  `tgl_pembelian` datetime NOT NULL,
  `nik_admin` int(11) NOT NULL,
  `kd_supplier` varchar(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1=tidak aktif;0=aktif',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_pembelian`
--

INSERT INTO `master_pembelian` (`id_pembelian`, `kd_pembelian`, `tgl_pembelian`, `nik_admin`, `kd_supplier`, `total_pembelian`, `status`, `created_at`) VALUES
(13, 'BLI30072100001', '2021-07-30 00:00:00', 123, 'SUP000001', 43600000, '0', '2021-08-07 01:23:06'),
(17, 'BLI01082100001', '2021-08-01 12:35:23', 123, 'SUP000002', 9000000, '0', '2021-08-07 20:36:01'),
(18, 'BLI07082100001', '2021-08-07 01:30:34', 123, 'SUP000003', 500000000, '0', '2021-08-07 01:30:34'),
(19, 'BLI07082100002', '2021-08-07 01:35:10', 123, 'SUP000002', 4000000, '0', '2021-08-07 21:50:36'),
(20, 'BLI07082100003', '2021-08-07 01:38:15', 123, 'SUP000001', 37500000, '0', '2021-08-07 20:34:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_penjualan`
--

CREATE TABLE `master_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kd_penjualan` varchar(25) NOT NULL,
  `tgl_penjualan` datetime NOT NULL,
  `nik_admin` int(6) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `alamat_tujuan` longtext NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_penjualan`
--

INSERT INTO `master_penjualan` (`id_penjualan`, `kd_penjualan`, `tgl_penjualan`, `nik_admin`, `nama_pelanggan`, `alamat_tujuan`, `total_penjualan`, `bayar`, `remark`, `created_at`) VALUES
(16, 'PNJL0808210', '2021-08-08 13:01:45', 123, 'Tatang', 'Cimahi', 3960000, 4000000, NULL, '2021-08-08 13:01:45'),
(17, 'PNJL0908210', '2021-08-09 20:16:15', 123, 'Mansur', 'Jakut', 1320000, 1320000, NULL, '2021-08-09 20:16:15'),
(18, 'PNJ09082100', '2021-08-09 20:26:45', 123, 'Mustofa', 'Kalideres', 1320000, 1320000, NULL, '2021-08-09 20:26:45'),
(19, 'PNJ09082100', '2021-08-09 20:31:04', 123, 'Juned', 'Ciamis', 28875000, 28875000, NULL, '2021-08-09 20:31:04'),
(20, 'PNJ09082100', '2021-08-09 20:32:09', 123, 'Kekei', 'Nggk tau', 1320000, 1320000, NULL, '2021-08-09 20:32:09'),
(21, 'PNJ09082100', '2021-08-09 20:55:52', 123, 'Mansur', 'Jakut', 1320000, 1320000, NULL, '2021-08-09 20:55:52'),
(22, 'PNJ09082100', '2021-08-09 21:03:05', 123, 'Mamn', 'Pejompongan', 1320000, 1320000, NULL, '2021-08-09 21:03:05'),
(23, 'PNJ09082100', '2021-08-09 21:05:49', 123, 'Jaja', 'Sulawesi', 1320000, 1320000, NULL, '2021-08-09 21:05:49'),
(24, 'PNJ09082100', '2021-08-09 21:10:11', 123, 'Westerling', 'Belanda', 1320000, 1320000, NULL, '2021-08-09 21:10:11'),
(25, 'PNJ09082100', '2021-08-09 22:22:29', 123, 'Hhaha', 'hahaha', 1320000, 1320000, NULL, '2021-08-09 22:22:29'),
(26, 'PNJ09082100', '2021-08-09 22:31:56', 123, 'AS', 'AS', 1320000, 1320000, NULL, '2021-08-09 22:31:56'),
(27, 'PNJ09082100', '2021-08-09 22:37:11', 123, 'DEDE', 'Jakarta', 1320000, 1320000, NULL, '2021-08-09 22:37:11'),
(28, 'PNJ09082100', '2021-08-09 22:42:33', 123, 'JUJU', 'JUJU', 1320000, 1320000, NULL, '2021-08-09 22:42:33'),
(29, 'PNJ09082100', '2021-08-09 22:56:08', 123, 'LALA', 'BENHIL', 3960000, 4000000, NULL, '2021-08-09 22:56:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `kd_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `pemilik` varchar(225) NOT NULL,
  `kota` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`kd_perusahaan`, `nama_perusahaan`, `alamat`, `pemilik`, `kota`) VALUES
(1, 'PUTRA SOURCE', 'Condong Catur, Sleman Yogyakarta', 'Rizka Dwi Saputra', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `kd_supplier` varchar(25) NOT NULL,
  `nama_supplier` varchar(60) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1=tidak aktif;0=aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `kd_supplier`, `nama_supplier`, `alamat`, `deskripsi`, `status`) VALUES
(1, 'SUP000001', 'Toko Anjas', 'condong catur, sleman', NULL, '0'),
(2, 'SUP000002', 'TB Agus Hokya', 'Kuningan, Bandung Barat Selatan Ke Utara', NULL, '0'),
(3, 'SUP000003', 'Toko Putra', 'jl. merdeka, boyolali, jakarta selatan', NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tem_pembelian`
--

CREATE TABLE `tem_pembelian` (
  `id_tem` int(6) NOT NULL,
  `kd_pembelian` varchar(25) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga` double NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tem_pembelian`
--

INSERT INTO `tem_pembelian` (`id_tem`, `kd_pembelian`, `kd_barang`, `nama`, `satuan`, `harga`, `qty`, `total`) VALUES
(61, 'BLI02082100001', '03.05.', 'Kursi duduk laci sepatu minimalis ', 'SET', 1000000, 17, 17000000),
(67, 'BLI10082100001', '01.03.', 'Set sofa rotan sintesis minimalis azura', 'SET', 2000000, 12, 24000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tem_penjualan`
--

CREATE TABLE `tem_penjualan` (
  `id_tem_penjualan` int(11) NOT NULL,
  `kd_penjualan` varchar(25) NOT NULL,
  `kd_gudang` varchar(25) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `harga` double NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity_log_barang`
--
ALTER TABLE `activity_log_barang`
  ADD PRIMARY KEY (`id_log_barang`);

--
-- Indeks untuk tabel `activity_log_harga`
--
ALTER TABLE `activity_log_harga`
  ADD PRIMARY KEY (`id_log_harga`);

--
-- Indeks untuk tabel `activity_log_user`
--
ALTER TABLE `activity_log_user`
  ADD PRIMARY KEY (`log_id`);

--
-- Indeks untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indeks untuk tabel `kode_barang`
--
ALTER TABLE `kode_barang`
  ADD PRIMARY KEY (`id_kd_barang`);

--
-- Indeks untuk tabel `kode_satuan_barang`
--
ALTER TABLE `kode_satuan_barang`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `master_barang_cencel`
--
ALTER TABLE `master_barang_cencel`
  ADD PRIMARY KEY (`id_cencel`);

--
-- Indeks untuk tabel `master_login`
--
ALTER TABLE `master_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `master_pembelian`
--
ALTER TABLE `master_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `master_penjualan`
--
ALTER TABLE `master_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`kd_perusahaan`),
  ADD KEY `kd_perusahaan` (`kd_perusahaan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tem_pembelian`
--
ALTER TABLE `tem_pembelian`
  ADD PRIMARY KEY (`id_tem`);

--
-- Indeks untuk tabel `tem_penjualan`
--
ALTER TABLE `tem_penjualan`
  ADD PRIMARY KEY (`id_tem_penjualan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity_log_barang`
--
ALTER TABLE `activity_log_barang`
  MODIFY `id_log_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `activity_log_harga`
--
ALTER TABLE `activity_log_harga`
  MODIFY `id_log_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `activity_log_user`
--
ALTER TABLE `activity_log_user`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `kode_barang`
--
ALTER TABLE `kode_barang`
  MODIFY `id_kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `kode_satuan_barang`
--
ALTER TABLE `kode_satuan_barang`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_barang`
--
ALTER TABLE `master_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `master_barang_cencel`
--
ALTER TABLE `master_barang_cencel`
  MODIFY `id_cencel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `master_login`
--
ALTER TABLE `master_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `master_pembelian`
--
ALTER TABLE `master_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `master_penjualan`
--
ALTER TABLE `master_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `kd_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tem_pembelian`
--
ALTER TABLE `tem_pembelian`
  MODIFY `id_tem` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `tem_penjualan`
--
ALTER TABLE `tem_penjualan`
  MODIFY `id_tem_penjualan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
