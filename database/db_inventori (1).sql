-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Jul 2021 pada 15.42
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventori`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kd_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(60) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_jual` int(15) NOT NULL,
  `harga_beli` int(15) NOT NULL,
  `stok` int(4) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_barang`, `nama_barang`, `satuan`, `harga_jual`, `harga_beli`, `stok`, `status`) VALUES
('BB0001', 'Lemari kayu', '6', 1000000, 900000, 9, '1'),
('BRG0001', 'Kursi ukiran', '5', 1500000, 1000000, 10, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangp_sementara`
--

CREATE TABLE `barangp_sementara` (
  `id_barangp` int(6) NOT NULL,
  `nama_barangp` varchar(225) NOT NULL,
  `jml_barang` int(20) NOT NULL,
  `harga_barangp` double NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barangp_sementara`
--

INSERT INTO `barangp_sementara` (`id_barangp`, `nama_barangp`, `jml_barang`, `harga_barangp`, `jenis_barang`, `total`) VALUES
(9, 'Almari mahoni 2', 5, 4000000, 'Lemari', 0),
(11, 'Almari mahoni', 1, 4000000, 'lemari', 0),
(12, 'Kitchen set marmer', 1, 2500000, 'lemari', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_barang_pembelian`
--

CREATE TABLE `d_barang_pembelian` (
  `id_barangp` int(6) NOT NULL,
  `id_pembelian` int(6) NOT NULL,
  `kd_pembelian` char(10) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `supplier` varchar(225) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `jenis_barang` varchar(225) NOT NULL,
  `jml_barang` int(100) NOT NULL,
  `harga_beli` double NOT NULL,
  `total_harga` double NOT NULL,
  `harga_jual` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_barang_pembelian`
--

INSERT INTO `d_barang_pembelian` (`id_barangp`, `id_pembelian`, `kd_pembelian`, `tgl_pembelian`, `supplier`, `nama_barang`, `jenis_barang`, `jml_barang`, `harga_beli`, `total_harga`, `harga_jual`) VALUES
(0, 1, '222', '2021-07-08', 'Jaya Makmur', 'Lemari mahoni premium', 'Lemari', 1, 3500000, 3500000, 3850000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_penjualan`
--

CREATE TABLE `d_penjualan` (
  `id_penjualan` int(6) NOT NULL,
  `kd_penjualan` char(8) NOT NULL,
  `kd_barang` varchar(8) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_supplier`
--

CREATE TABLE `pembelian_supplier` (
  `kode_pembelian` int(25) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `supplier` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `kd_penjualan` char(8) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `kd_admin` int(6) NOT NULL,
  `dibayar` double NOT NULL,
  `total_penjualan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_sementara`
--

CREATE TABLE `penjualan_sementara` (
  `id_penjualan_sementara` int(11) NOT NULL,
  `kd_penjualan` char(8) NOT NULL,
  `kd_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `harga` double NOT NULL,
  `item` int(4) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `kd_supplier` int(6) NOT NULL,
  `nama_supplier` varchar(60) NOT NULL,
  `alamat` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `barangp_sementara`
--
ALTER TABLE `barangp_sementara`
  ADD PRIMARY KEY (`id_barangp`);

--
-- Indexes for table `d_barang_pembelian`
--
ALTER TABLE `d_barang_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD UNIQUE KEY `kd_pembelian` (`kd_pembelian`) USING BTREE,
  ADD UNIQUE KEY `id_barangp` (`id_barangp`);

--
-- Indexes for table `d_penjualan`
--
ALTER TABLE `d_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `kd_penjualan` (`kd_penjualan`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `pembelian_supplier`
--
ALTER TABLE `pembelian_supplier`
  ADD PRIMARY KEY (`kode_pembelian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kd_penjualan`),
  ADD KEY `kd_admin` (`kd_admin`);

--
-- Indexes for table `penjualan_sementara`
--
ALTER TABLE `penjualan_sementara`
  ADD PRIMARY KEY (`id_penjualan_sementara`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kd_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangp_sementara`
--
ALTER TABLE `barangp_sementara`
  MODIFY `id_barangp` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `d_barang_pembelian`
--
ALTER TABLE `d_barang_pembelian`
  MODIFY `id_pembelian` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `d_penjualan`
--
ALTER TABLE `d_penjualan`
  MODIFY `id_penjualan` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian_supplier`
--
ALTER TABLE `pembelian_supplier`
  MODIFY `kode_pembelian` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan_sementara`
--
ALTER TABLE `penjualan_sementara`
  MODIFY `id_penjualan_sementara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `kd_supplier` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
