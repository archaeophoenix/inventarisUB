-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 06, 2016 at 02:00 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `merk` varchar(30) DEFAULT NULL,
  `spesifikasi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `type`, `merk`, `spesifikasi`) VALUES
(1, 'C1', 'Mobile Phone', 'Nokia', 'Java Mobile'),
(2, 'optical mouse', 'gadget', 'HP', 'wireless'),
(3, 'optical mouse', 'gadget', 'toshiba', 'wireless'),
(4, 'galaxy J', 'Mobile Phone', 'Samsung', 'support 4g'),
(5, 'Blade', 'Mobile Phone', 'ZTE', 'support 4G\r\n'),
(6, 'XPS', 'Laptop', 'Dell', 'Intel i3'),
(7, 'Ascend II', 'Mobile Phone', 'Huawei', 'RAM 1GB\r\n'),
(8, 'Elite Book', 'Laptop', 'HP', 'Intel i5'),
(9, 'Redmi2', 'Mobile Phone', 'MI', 'Support 4G');

-- --------------------------------------------------------

--
-- Table structure for table `biro`
--

CREATE TABLE `biro` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biro`
--

INSERT INTO `biro` (`id`, `nama`) VALUES
(1, 'Informatika'),
(2, 'ASGNI2'),
(3, 'vcasc as-2'),
(4, 'asd as'),
(5, 'psod a'),
(6, 'Percetakan');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi`
--

CREATE TABLE `evaluasi` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `jenis` int(11) DEFAULT NULL,
  `mutu` int(11) DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `respon` int(11) DEFAULT NULL,
  `evaluasi` int(11) DEFAULT NULL,
  `syarat` text,
  `eva` varchar(50) DEFAULT NULL,
  `nik_eva` varchar(15) DEFAULT NULL,
  `gaof` varchar(50) DEFAULT NULL,
  `nik_gaof` varchar(15) DEFAULT NULL,
  `kabaga` varchar(50) DEFAULT NULL,
  `nik_kabaga` varchar(15) DEFAULT NULL,
  `ctanggal` date DEFAULT NULL,
  `cwaktu` int(11) NOT NULL,
  `sesuai` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tepat` int(11) NOT NULL,
  `baru` int(11) NOT NULL,
  `fungsi` int(11) NOT NULL,
  `ket_cwaktu` varchar(50) NOT NULL,
  `ket_sesuai` varchar(50) NOT NULL,
  `ket_jumlah` varchar(50) NOT NULL,
  `ket_tepat` varchar(50) NOT NULL,
  `ket_baru` varchar(50) NOT NULL,
  `ket_fungsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluasi`
--

INSERT INTO `evaluasi` (`id`, `tanggal`, `id_vendor`, `jenis`, `mutu`, `waktu`, `harga`, `bayar`, `respon`, `evaluasi`, `syarat`, `eva`, `nik_eva`, `gaof`, `nik_gaof`, `kabaga`, `nik_kabaga`, `ctanggal`, `cwaktu`, `sesuai`, `jumlah`, `tepat`, `baru`, `fungsi`, `ket_cwaktu`, `ket_sesuai`, `ket_jumlah`, `ket_tepat`, `ket_baru`, `ket_fungsi`) VALUES
(4, '2016-07-22', 1, 1, 4, 4, 4, 4, 4, 3, 'asdasd', 'asda', 'sdasd', 'sdas', 'asda', 'dasd', 'asd', '2016-07-30', 1, 1, 0, 0, 1, 1, 'asd', '21', 'fghfg', 'sdwer', 'gfg', 'uiouio'),
(5, '2016-06-01', 2, 1, 4, 2, 1, 1, 1, 1, 'asdasd', 'asd', 'asdasd', 'asdas', 'asdasd', 'das', 'dasd', NULL, 0, 0, 0, 0, 0, 0, '', '', '', '', '', ''),
(6, '2016-07-24', 3, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, '', '', '', '', '', '', '2016-07-24', 0, 0, 1, 0, 0, 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id` int(11) NOT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `pembaruan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `harga` varchar(30) DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id`, `id_vendor`, `id_barang`, `pembaruan`, `harga`, `aktif`) VALUES
(1, 3, 5, '2016-04-23 10:43:38', '1000', 1),
(2, 2, 6, '2016-04-23 11:01:58', '1010', 1),
(3, 1, 5, '2016-04-23 10:44:00', '1015', 1),
(4, 3, 1, '2016-04-23 10:45:15', '2020', 1),
(5, 2, 1, '2016-04-23 10:45:38', '2000', 1),
(6, 1, 2, '2016-04-23 11:02:04', '2005', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` int(11) NOT NULL,
  `reg` varchar(20) DEFAULT NULL,
  `harga` varchar(30) DEFAULT NULL,
  `input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `masuk` int(11) NOT NULL DEFAULT '0',
  `keluar` int(11) NOT NULL DEFAULT '0',
  `alokasi` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_biro` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `keterangan` text,
  `id_purchase` int(11) NOT NULL DEFAULT '0',
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `reg`, `harga`, `input`, `masuk`, `keluar`, `alokasi`, `tanggal`, `id_biro`, `id_barang`, `keterangan`, `id_purchase`, `id_pengguna`) VALUES
(1, NULL, '1000', '2016-08-06 11:05:21', 1, 0, 'Informatika', '2016-08-06', 1, 2, NULL, 3, 4),
(2, NULL, '1000', '2016-08-06 07:23:02', 1, 0, 'Informatika', '2016-08-06', 1, 5, NULL, 3, 4),
(3, 'PC', '1000', '2016-08-06 11:15:25', 9, 0, 'mboh', '2016-08-06', 1, 6, 'ngarambes', 0, 4),
(4, NULL, NULL, '2016-08-06 11:51:16', 0, 2, 'informatika', '2016-08-06', 1, 6, 'mboh', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `id_harga` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `id_purchase` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` varchar(30) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `nego` varchar(30) NOT NULL,
  `reg` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `terima` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `id_harga`, `id_barang`, `id_vendor`, `id_purchase`, `jumlah`, `harga`, `total`, `nego`, `reg`, `keterangan`, `terima`, `ket`) VALUES
(10, NULL, 2, NULL, 2, 3, '100', 0, '', 'asdasd', 'asdasd', 1, ''),
(11, NULL, 1, NULL, 2, 2, '100', 0, '', '123', 'qweqw', 1, ''),
(13, 1, 5, 3, 1, 2, '100', 0, '', '', '', 0, ''),
(14, 6, 2, 1, 3, 1, '1000', 0, '2000', '', '', 0, ''),
(15, 1, 5, 3, 3, 1, '1000', 0, '1000', '', '', 0, ''),
(17, 2, 6, 2, 4, 1, '1000', 0, '1000', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `gelar` varchar(50) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nik` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_biro` int(11) DEFAULT NULL,
  `id_atasan` int(11) DEFAULT NULL,
  `izin` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `aktiv` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `gelar`, `tanggal`, `nik`, `password`, `id_biro`, `id_atasan`, `izin`, `status`, `aktiv`) VALUES
(1, '[value-2]', '[value-3]', '2016-06-11 08:01:49', '123123', NULL, 0, 0, 0, 1, 1),
(2, 'j su asd', '[value-3]', '2016-06-10 09:51:42', '234234', NULL, 1, 0, 2, 2, 1),
(3, 'djasd asdd', 'j su asd', '2016-06-12 06:06:27', '345345', NULL, 1, 2, 2, 3, 0),
(4, 'asdasjhd', 'jjks asd', '2016-06-12 07:39:42', '456456', NULL, 1, 14, 1, 4, 1),
(5, '[value-2]', 'khasd asd', '2016-06-10 09:51:42', '567567', NULL, 0, 0, 2, 5, 1),
(6, 'khasd asd', 'jjks asd', '2016-06-10 09:51:42', '678678', NULL, 0, 5, 2, 6, 1),
(7, 'jjks asd', 'khasd asd', '2016-06-10 09:51:42', '789789', NULL, 0, 0, 2, 7, 1),
(8, 'j su asd', 'jjks asd', '2016-06-10 09:51:42', '890890', NULL, 0, 7, 2, 8, 1),
(9, '[as-2]', 'onns', '2016-06-10 09:51:42', '135135', NULL, 2, 0, 2, 2, 1),
(10, 'onns', 'jjks as', '2016-06-12 06:11:00', '246246', NULL, 2, 9, 2, 3, 0),
(11, 'asdasjhd', 'jjks asd', '2016-06-12 07:40:10', '357357', NULL, 2, 15, 1, 4, 1),
(12, 'aasdssas', 'jddddasd', '2016-06-12 07:39:42', '882354', NULL, 1, 14, 1, 4, 1),
(14, 'qwe', 'asd', '2016-06-12 09:40:55', 'zxc', '333333', 1, 2, 2, 3, 1),
(15, 'iop', 'jkl', '2016-06-12 07:40:06', 'bnm', '789', 2, 9, 2, 3, 1),
(16, 'j su asder dfg ', 'sdgfs rest', '2016-06-10 09:51:42', '890890', NULL, 0, 7, 2, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `purchasing` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal` date DEFAULT NULL,
  `ref` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `id_biro` int(11) DEFAULT NULL,
  `akun` varchar(20) NOT NULL,
  `kabiroumum` varchar(50) DEFAULT NULL,
  `kabiro` varchar(50) DEFAULT NULL,
  `purchaser` varchar(50) DEFAULT NULL,
  `keuangan` varchar(50) DEFAULT NULL,
  `kakeuangan` varchar(50) DEFAULT NULL,
  `rektor` varchar(50) DEFAULT NULL,
  `wareknonakademik` varchar(50) DEFAULT NULL,
  `kabag` int(11) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `tanggalbayar` date DEFAULT NULL,
  `perihal` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `rekening` varchar(20) NOT NULL,
  `to` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `attn` varchar(50) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `po` varchar(15) DEFAULT NULL,
  `delivery` varchar(15) DEFAULT NULL,
  `payment` varchar(15) DEFAULT NULL,
  `other` varchar(50) DEFAULT NULL,
  `signature` varchar(50) DEFAULT NULL,
  `sname` varchar(50) DEFAULT NULL,
  `sdate` varchar(50) DEFAULT NULL,
  `note` text NOT NULL,
  `ket` text NOT NULL,
  `serah` varchar(50) NOT NULL,
  `nik_serah` varchar(15) NOT NULL,
  `terima` varchar(50) NOT NULL,
  `nik_terima` varchar(15) NOT NULL,
  `tanggal_terima` date DEFAULT NULL,
  `dekan` varchar(50) NOT NULL,
  `nik_dekan` varchar(15) NOT NULL,
  `pustaka` varchar(50) NOT NULL,
  `nik_pustaka` varchar(15) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `estimasi` int(11) NOT NULL,
  `prioritas` tinyint(4) NOT NULL,
  `pengadaan` tinyint(4) NOT NULL,
  `keterangan` text NOT NULL,
  `mto` text NOT NULL,
  `mcc` text NOT NULL,
  `nomemo` varchar(20) NOT NULL,
  `memo` text NOT NULL,
  `inventaris` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `purchasing`, `level`, `type`, `input`, `tanggal`, `ref`, `status`, `id_biro`, `akun`, `kabiroumum`, `kabiro`, `purchaser`, `keuangan`, `kakeuangan`, `rektor`, `wareknonakademik`, `kabag`, `kepada`, `dari`, `nomor`, `tanggalbayar`, `perihal`, `nama`, `bank`, `rekening`, `to`, `phone`, `fax`, `attn`, `dates`, `po`, `delivery`, `payment`, `other`, `signature`, `sname`, `sdate`, `note`, `ket`, `serah`, `nik_serah`, `terima`, `nik_terima`, `tanggal_terima`, `dekan`, `nik_dekan`, `pustaka`, `nik_pustaka`, `fasilitas`, `deskripsi`, `estimasi`, `prioritas`, `pengadaan`, `keterangan`, `mto`, `mcc`, `nomemo`, `memo`, `inventaris`) VALUES
(1, 'pertama', 8, 0, '2016-07-24 17:07:49', '2016-06-17', '109030', 0, 1, '', '2', '14', '4', '7', '8', '5', '6', 16, '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '{"ts":{"3":"","1":""},"tq":{"3":"","1":""},"del":{"3":"","1":""},"top":{"3":"","1":""}}', '', '', '', '', NULL, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', 'sembarang kalir wis. pokok seneng', 0),
(2, 'kedua', 7, 0, '2016-07-30 12:13:01', '2016-06-18', '111222', 0, 1, '', '2', '14', '4', '7', '8', '5', '6', 16, '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 'lkasjdl', '07291837', 'kasdhakbsdhk', '123123', '2016-07-23', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 0),
(3, 'percobaan ', 2, 1, '2016-08-06 07:23:02', '2016-07-26', '123', 0, 1, '', '2', '14', '4', '7', '8', '5', '6', 16, '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '{"ts":{"3":"","1":""},"tq":{"3":"","1":""},"del":{"3":"","1":""},"top":{"3":"","1":""}}', '', '', '', '', NULL, '', '', '', '', '', '', 0, 0, 0, '', '', '', '123123', 'sing penting tuku sik', 1),
(4, 'Sembarang', 4, 0, '2016-08-06 11:58:39', '2016-08-06', '1726531', 0, 1, '', '2', '14', '4', '7', '8', '5', '6', 16, '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '{"ts":{"2":""},"tq":{"2":""},"del":{"2":""},"top":{"2":""}}', '', '', '', '', NULL, '', '', '', '', '', '', 0, 0, 0, '', '', '', '12736128', 'pokok e ono', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `buat` varchar(50) DEFAULT NULL,
  `nik_buat` varchar(15) DEFAULT NULL,
  `setuju` varchar(50) DEFAULT NULL,
  `nik_setuju` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `bulan`, `tahun`, `buat`, `nik_buat`, `setuju`, `nik_setuju`) VALUES
(1, '2', '2016', 'qweq', 'weqwe', 'weqwe', 'qweq');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `nama` varchar(70) DEFAULT NULL,
  `alamat` text,
  `telpon` varchar(15) DEFAULT NULL,
  `kontak` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `nama`, `alamat`, `telpon`, `kontak`, `hp`) VALUES
(1, 'telcomindo', 'indonesia', '021', '', ''),
(2, 'Roxy', 'ooooo', '081', 'e', '0'),
(3, 'PGC', 'kjsdkasdasd asa asdasd', '021111', 's', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biro`
--
ALTER TABLE `biro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `biro`
--
ALTER TABLE `biro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
