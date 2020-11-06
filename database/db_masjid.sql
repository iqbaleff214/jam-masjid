-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 06, 2020 at 03:56 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kajian`
--

CREATE TABLE `tb_kajian` (
  `id_kajian` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL DEFAULT curdate(),
  `id_ustadz` int(11) NOT NULL DEFAULT 0,
  `id_waktu` int(11) NOT NULL DEFAULT 0,
  `judul` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `akhwat` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kajian`
--

INSERT INTO `tb_kajian` (`id_kajian`, `tanggal`, `id_ustadz`, `id_waktu`, `judul`, `deskripsi`, `akhwat`) VALUES
(1, 1581897600, 1, 1, '', ' ', 1),
(2, 1582502400, 2, 1, '', ' ', 1),
(3, 1581552000, 3, 2, '', ' ', NULL),
(4, 1582156800, 2, 2, '', ' ', NULL),
(5, 1582761600, 4, 2, '', ' ', NULL),
(6, 1581033600, 3, 4, '', ' ', NULL),
(7, 1581638400, 1, 4, '', ' ', NULL),
(8, 1582243200, 3, 4, '', ' ', NULL),
(9, 1582848000, 1, 4, '', ' ', NULL),
(10, 1582329600, 6, 2, '', ' ', NULL),
(11, 1582934400, 7, 2, '', ' ', NULL),
(12, 1581984000, 1, 2, '', ' ', NULL),
(13, 1582588800, 8, 2, '', ' ', NULL),
(14, 1580601600, 5, 3, '', ' ', NULL),
(15, 1581206400, 5, 3, '', ' ', NULL),
(16, 1581811200, 5, 3, '', ' ', NULL),
(17, 1582416000, 5, 3, '', ' ', NULL),
(18, 1583798400, 6, 1, '', ' ', NULL),
(19, 1583625600, 2, 1, '', ' ', NULL),
(20, 1584144000, 2, 2, '', '  ', 1),
(21, 1583280000, 1, 2, '', ' ', NULL),
(22, 1598313600, 7, 2, 'Jebakan Maksiat', ' Tentang ini dan itu', NULL),
(23, 1598572800, 2, 2, 'Adab Memakai Sandal', ' ', NULL),
(24, 1598832000, 8, 2, '', ' ', NULL),
(26, 1602115200, 1, 2, 'Jebakan Maksiat', ' ', NULL),
(27, 1602288000, 4, 1, '', ' ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kajian_log`
--

CREATE TABLE `tb_kajian_log` (
  `id_log` int(11) NOT NULL,
  `id_kajian` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL DEFAULT curdate(),
  `id_ustadz` int(11) NOT NULL DEFAULT 0,
  `id_waktu` int(11) NOT NULL DEFAULT 0,
  `judul` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `akhwat` int(1) DEFAULT NULL,
  `waktu_tambah` int(11) DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_khutbah`
--

CREATE TABLE `tb_khutbah` (
  `id_khutbah` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `id_ustadz` int(11) NOT NULL,
  `id_muadzin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_khutbah`
--

INSERT INTO `tb_khutbah` (`id_khutbah`, `tanggal`, `id_ustadz`, `id_muadzin`) VALUES
(1, 1584057600, 2, 1),
(2, 1585267200, 5, 1),
(3, 1598572800, 4, 1),
(4, 1602201600, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_khutbah_log`
--

CREATE TABLE `tb_khutbah_log` (
  `id_log` int(11) NOT NULL,
  `id_khutbah` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `id_ustadz` int(11) NOT NULL,
  `id_muadzin` int(11) NOT NULL,
  `waktu_tambah` int(11) DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_muadzin`
--

CREATE TABLE `tb_muadzin` (
  `id_muadzin` int(11) NOT NULL,
  `muadzin` varchar(50) NOT NULL DEFAULT '0',
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_muadzin`
--

INSERT INTO `tb_muadzin` (`id_muadzin`, `muadzin`, `alamat`) VALUES
(1, 'Bilal bin Rabbah', 'Madinah'),
(2, 'Abdullah bin Ummi Maktum', 'Madinah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengurus`
--

CREATE TABLE `tb_pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(256) NOT NULL DEFAULT '0',
  `pin` varchar(11) DEFAULT NULL,
  `warna` varchar(50) NOT NULL DEFAULT '0',
  `view` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengurus`
--

INSERT INTO `tb_pengurus` (`id_pengurus`, `nama`, `password`, `pin`, `warna`, `view`) VALUES
(1, 'Masjid Ar-Rahmah', '$2y$10$BhGK.Dsz04MB2AtZ5EXAReTm09W5xjoxoDCirY1QDBBNMmg11kN2e', NULL, 'orange', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ustadz`
--

CREATE TABLE `tb_ustadz` (
  `id_ustadz` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `no_telp` varchar(15) NOT NULL DEFAULT '0',
  `alamat` text NOT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ustadz`
--

INSERT INTO `tb_ustadz` (`id_ustadz`, `nama`, `no_telp`, `alamat`, `facebook`, `instagram`, `foto`, `bio`) VALUES
(1, 'Mas\'udi', '0821323123', 'Banjarmasin', '', '', 'default.png', ' '),
(2, 'Rahmat Fauzan, Lc., M.A.', '0821323123', 'Banjarmasin', '', '', 'default.png', ' '),
(3, 'Riza Rahman, Lc.', '0821323123', 'Banjarmasin', '', '', 'default.png', ' '),
(4, 'Dr. H. Abdul Basir', '0821323123', 'Banjarmasin', '', '', 'default.png', ' '),
(5, 'Umar Thalib', '0821323123', 'Banjarmasin', '', '', 'default.png', ' '),
(6, 'Khairuddin Abhaka', '0821323123', 'Banjarmasin', '', '', 'default.png', ' '),
(7, 'H. Mairijani, M.Ag.', '0821323123', 'Banjarmasin', '', '', 'default.png', ' '),
(8, 'Fauzi Rahmani', '0821323123', 'Banjarmasin', '', '', 'default.png', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_waktu`
--

CREATE TABLE `tb_waktu` (
  `id_waktu` int(11) NOT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_waktu`
--

INSERT INTO `tb_waktu` (`id_waktu`, `waktu`, `keterangan`) VALUES
(1, 'Setelah Ashar', 'Untuk Muslimah'),
(2, 'Setelah Maghrib', ''),
(3, 'Setelah Shubuh', ''),
(4, 'Pagi', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kajian`
--
ALTER TABLE `tb_kajian`
  ADD PRIMARY KEY (`id_kajian`),
  ADD KEY `id_ustadz` (`id_ustadz`);

--
-- Indexes for table `tb_kajian_log`
--
ALTER TABLE `tb_kajian_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_ustadz` (`id_ustadz`);

--
-- Indexes for table `tb_khutbah`
--
ALTER TABLE `tb_khutbah`
  ADD PRIMARY KEY (`id_khutbah`);

--
-- Indexes for table `tb_khutbah_log`
--
ALTER TABLE `tb_khutbah_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_muadzin`
--
ALTER TABLE `tb_muadzin`
  ADD PRIMARY KEY (`id_muadzin`);

--
-- Indexes for table `tb_pengurus`
--
ALTER TABLE `tb_pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indexes for table `tb_ustadz`
--
ALTER TABLE `tb_ustadz`
  ADD PRIMARY KEY (`id_ustadz`);

--
-- Indexes for table `tb_waktu`
--
ALTER TABLE `tb_waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kajian`
--
ALTER TABLE `tb_kajian`
  MODIFY `id_kajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_kajian_log`
--
ALTER TABLE `tb_kajian_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_khutbah`
--
ALTER TABLE `tb_khutbah`
  MODIFY `id_khutbah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_khutbah_log`
--
ALTER TABLE `tb_khutbah_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_muadzin`
--
ALTER TABLE `tb_muadzin`
  MODIFY `id_muadzin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengurus`
--
ALTER TABLE `tb_pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_ustadz`
--
ALTER TABLE `tb_ustadz`
  MODIFY `id_ustadz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_waktu`
--
ALTER TABLE `tb_waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
