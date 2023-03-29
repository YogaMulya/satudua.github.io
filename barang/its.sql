-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2019 at 05:34 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `its`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `kadaluwarsa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `jenis_barang`, `nama_barang`, `jumlah`, `satuan`, `kadaluwarsa`) VALUES
(1, 'makanan', 'bakso sapi', 7946, 'buah', '2019-02-02'),
(2, 'sanitasi', 'kertas HVS a4', 31, 'lusin', '2019-02-01'),
(3, 'makanan', 'bakso ayam', 2, 'buah', ''),
(4, 'makanan', 'bakso jamur', 23, 'buah', ''),
(888, 'elektronik', 'monitor LG', 40, 'buah', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis_barang`) VALUES
(4, 'sembako'),
(5, 'makanan'),
(6, 'elektronik'),
(7, 'homo'),
(8, 'edo'),
(9, 'wibu'),
(10, 'singkek'),
(11, 'handri'),
(12, 'igun');

-- --------------------------------------------------------

--
-- Table structure for table `koor`
--

CREATE TABLE `koor` (
  `id_koordinator` int(11) NOT NULL,
  `koordinator` varchar(255) NOT NULL,
  `nama_koor` varchar(255) NOT NULL,
  `tempat_koor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koor`
--

INSERT INTO `koor` (`id_koordinator`, `koordinator`, `nama_koor`, `tempat_koor`) VALUES
(1, 'pengadaan', 'Budi', '1'),
(2, 'Pengadaan', 'Gunawan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `tempat` int(11) NOT NULL,
  `nama_ruang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `tempat`, `nama_ruang`) VALUES
(1, 2, 'sekretariat'),
(2, 2, 'seminar'),
(4, 5, 'sirkulasi');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan`) VALUES
(2, 'kilometer'),
(4, 'buah'),
(5, 'lusin');

-- --------------------------------------------------------

--
-- Table structure for table `semi`
--

CREATE TABLE `semi` (
  `id_sub` int(255) NOT NULL,
  `trx` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `koordinator` varchar(255) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `permintaan` int(11) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan_tahun` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `id_sub` int(255) NOT NULL,
  `nota` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `koordinator` varchar(255) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `permintaan` int(11) NOT NULL,
  `setuju` int(11) NOT NULL,
  `ambil` int(11) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan_tahun` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`id_sub`, `nota`, `nama`, `koordinator`, `id_barang`, `nama_barang`, `permintaan`, `setuju`, `ambil`, `jenis_barang`, `satuan`, `tanggal`, `id_user`, `bulan`, `tahun`, `bulan_tahun`) VALUES
(145, 'Budi-Mar-2019', 'NetCut', 'Budi', 2, 'kertas HVS a4', 1, 0, 0, 'sanitasi', 'lusin', '2019-03-03', 2, 'Mar', 2020, 'Mar-2020'),
(146, 'Budi-Mar-2019', 'NetCut', 'Budi', 2, 'kertas HVS a4', 1, 0, 0, 'sanitasi', 'lusin', '2019-03-03', 2, 'Mar', 2019, 'Mar-2019');

--
-- Triggers `sub`
--
DELIMITER $$
CREATE TRIGGER `setuju` AFTER UPDATE ON `sub` FOR EACH ROW BEGIN
UPDATE barang SET jumlah=jumlah-NEW.setuju
WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(255) NOT NULL,
  `nota` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `koordinator` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `setuju` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nota`, `nama`, `koordinator`, `tanggal`, `id_user`, `setuju`) VALUES
(101, 'Budi-Mar-2019', 'NetCut', 'Budi', 'Mar-2019', 2, 0),
(102, 'Gunawan-Mar-2019', 'pc', 'Gunawan', 'Mar-2019', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_koordinator` int(11) NOT NULL,
  `koordinator` varchar(255) NOT NULL,
  `hp` int(15) NOT NULL,
  `level` int(11) NOT NULL,
  `tempat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `id_koordinator`, `koordinator`, `hp`, `level`, `tempat`) VALUES
(2, 'super', '123', 'NetCut', 0, 'Budi', 123, 3, 'sekretariat'),
(3, 'admin', 'admin', 'DNS', 0, 'Budi', 62, 1, 'seminar'),
(4, '123', '123', 'Root', 0, 'Budi', 82, 2, 'sekretariat'),
(5, 'koor', 'koor', 'koor', 0, 'Budi', 62, 4, 'sekretariat'),
(6, 'pc', 'pc', 'pc', 0, 'Gunawan', 32, 4, 'sekretariat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `koor`
--
ALTER TABLE `koor`
  ADD PRIMARY KEY (`id_koordinator`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `semi`
--
ALTER TABLE `semi`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`),
  ADD UNIQUE KEY `nota` (`nota`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=889;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `koor`
--
ALTER TABLE `koor`
  MODIFY `id_koordinator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `semi`
--
ALTER TABLE `semi`
  MODIFY `id_sub` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub`
--
ALTER TABLE `sub`
  MODIFY `id_sub` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
