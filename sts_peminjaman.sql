-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 01:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sts_peminjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `kategori`, `merk`, `jumlah`) VALUES
(17, 'B12', 'Gitar', 'Alat Musik', 'Yamaha', 10),
(18, 'B13', 'Drum ', 'Alat Musik', 'Yamaha', 5),
(20, 'B14', 'Suling', 'Alat Musik', 'Yamaha', 4),
(21, 'B15', 'Terminal', 'Fasilitas Sekolah', 'Yamaha', 100),
(22, 'B16', 'Kabel', 'Alat Musik', 'Yamaha', 50),
(23, 'B17', 'Kursi', 'Peralatan Kelas', 'Yamaha', 200),
(24, 'B18', 'Meja', 'Peralatan Kelas', 'Bangku', 100),
(25, 'B19', 'Speaker', 'Alat Musik', 'Yamaha', 8),
(26, 'B20', 'Toa', 'Fasilitas Sekolah', 'Yamaha', 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dt_peminjaman`
-- (See below for the actual view)
--
CREATE TABLE `dt_peminjaman` (
`id` int(11)
,`tgl_pinjam` date
,`tgl_kembali` date
,`no_identitas` varchar(255)
,`nama` varchar(255)
,`kode_barang` varchar(255)
,`nama_barang` varchar(255)
,`jumlah` int(11)
,`keperluan` varchar(255)
,`status` varchar(255)
,`id_login` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `tgl_pinjam`, `tgl_kembali`, `no_identitas`, `kode_barang`, `jumlah`, `keperluan`, `status`, `id_login`) VALUES
(124, '2024-03-07', '2024-03-07', '12345', '123', 2, 'Belajar', 'Belum Kembali', 789),
(125, '2024-03-07', '2024-03-07', '1234', '123', 2, 'Belajar', 'Belum Kembali', 789),
(135, '2024-03-14', '0000-00-00', '456', '', 6, 'Belajar', 'Belum Kembali', 1),
(136, '2024-03-14', '0000-00-00', '1115', '', 5, '-', 'Belum Kembali', 1),
(137, '2024-03-14', '0000-00-00', '1015', 'B12', 3, '-', 'Belum Kembali', 1),
(138, '2024-03-14', '0000-00-00', '1', '', 3, '-', 'Belum Kembali', 1),
(139, '2024-03-14', '0000-00-00', '1', '', 3, 'Belajar', 'Belum Kembali', 1),
(140, '2024-03-14', '0000-00-00', '1105', '', 3, 'Belajar', 'Belum Kembali', 1),
(141, '2024-03-14', '0000-00-00', '1105', 'B12', 3, 'Belajar', 'Belum Kembali', 1),
(142, '2024-03-14', '0000-00-00', '1105', 'B12', 6, 'Belajar', 'Belum Kembali', 1),
(143, '2024-03-14', '0000-00-00', '1105', 'B18', 100, 'Belajar', 'Belum Kembali', 1),
(144, '2024-03-14', '0000-00-00', '1105', 'B17', 50, 'Belajar', 'Belum Kembali', 1),
(145, '2024-03-14', '0000-00-00', '1105', 'B15', 20, 'Belajar', 'Belum Kembali', 0),
(146, '2024-03-14', '0000-00-00', '1105', 'B15', 10, '-', 'Belum Kembali', 1),
(147, '2024-03-14', '0000-00-00', '1015', 'B12', 1, 'Belajar', 'Sudah Kembali', 1),
(148, '2024-03-14', '0000-00-00', '11', 'B12', 1, 'Belajar', 'Belum Kembali', 0);

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `peminjaman` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
      UPDATE barang SET jumlah = jumlah - NEW.jumlah
      WHERE kode_barang = NEW.kode_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pengembalian` AFTER DELETE ON `peminjaman` FOR EACH ROW BEGIN 
     UPDATE barang SET jumlah = jumlah + OLD.jumlah
     WHERE kode_barang = OLD.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `no_identitas`, `nama`, `status`, `username`, `password`, `role`) VALUES
(1, '11', 'Andin', 'Petugas', 'andin', '123', 'Admin'),
(3, '13', 'Angel', 'Peminjam', 'angel', '456', 'user'),
(4, '14', 'Melya', 'Petugas', 'melya', '789', 'Admin');

-- --------------------------------------------------------

--
-- Structure for view `dt_peminjaman`
--
DROP TABLE IF EXISTS `dt_peminjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dt_peminjaman`  AS SELECT `peminjaman`.`id` AS `id`, `peminjaman`.`tgl_pinjam` AS `tgl_pinjam`, `peminjaman`.`tgl_kembali` AS `tgl_kembali`, `peminjaman`.`no_identitas` AS `no_identitas`, `user`.`nama` AS `nama`, `peminjaman`.`kode_barang` AS `kode_barang`, `barang`.`nama_barang` AS `nama_barang`, `peminjaman`.`jumlah` AS `jumlah`, `peminjaman`.`keperluan` AS `keperluan`, `peminjaman`.`status` AS `status`, `peminjaman`.`id_login` AS `id_login` FROM ((`peminjaman` join `barang` on(`barang`.`kode_barang` = `peminjaman`.`kode_barang`)) join `user` on(`peminjaman`.`no_identitas` = `user`.`no_identitas`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
