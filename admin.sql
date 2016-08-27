-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2016 at 04:06 
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
  `kategori` varchar(50) NOT NULL,
  `spesifikasi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `type`, `merk`, `kategori`, `spesifikasi`) VALUES
(1, 'C1', 'Mobile Phone', 'Nokia', '', 'Java Mobile'),
(2, 'optical mouse', 'gadget', 'HP', '', 'wireless'),
(3, 'optical mouse', 'gadget', 'toshiba', '', 'wireless'),
(4, 'galaxy J', 'Mobile Phone', 'Samsung', '', 'support 4g'),
(5, 'Blade', 'Mobile Phone', 'ZTE', '', 'support 4G\r\n'),
(6, 'XPS', 'Laptop', 'Dell', '', 'Intel i3'),
(7, 'Ascend II', 'Mobile Phone', 'Huawei', 'Handphone', 'RAM 1GB\r\n'),
(8, 'Elite Book', 'Laptop', 'HP', '', 'Intel i5'),
(9, 'Redmi2', 'Mobile Phone', 'MI', '', 'Support 4G');

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
(6, 1, 2, '2016-04-23 11:02:04', '2005', 1),
(7, 1, 1, '2016-08-13 07:46:36', '1000', 1);

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
(4, NULL, NULL, '2016-08-06 11:51:16', 0, 2, 'informatika', '2016-08-06', 1, 6, 'mboh', 0, 4),
(5, '', '1010', '2016-08-13 07:35:43', 1, 0, '', '2016-08-13', 1, 6, '', 4, 4);

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
(10, 0, 2, 0, 2, 3, '100', 0, '', 'asdasd', 'asdasd', 1, ''),
(11, 0, 1, 0, 2, 2, '100', 0, '', '123', 'qweqw', 1, ''),
(13, 1, 5, 3, 1, 2, '100', 0, '', '', '', 0, ''),
(14, 6, 2, 1, 3, 1, '1000', 0, '2000', '', '', 0, ''),
(15, 1, 5, 3, 3, 1, '1000', 0, '1000', '', '', 0, ''),
(17, 2, 6, 2, 4, 1, '1000', 0, '1000', '', '', 1, ''),
(19, NULL, 2, NULL, 5, 1, '1000', 0, '', '', '', 0, ''),
(20, NULL, 6, NULL, 5, 1, '1000', 0, '', '', '', 0, '');

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
(1, '[value-2]', '[value-3]', '2016-08-11 06:02:46', '123457', 'password', 0, 0, 0, 1, 1),
(2, 'j su asd', '[value-3]', '2016-08-11 06:02:46', '123458', 'password', 1, 0, 2, 2, 1),
(3, 'djasd asdd', 'j su asd', '2016-08-11 06:02:46', '123459', 'password', 1, 2, 2, 3, 0),
(4, 'asdasjhd', 'jjks asd', '2016-08-11 06:02:46', '123460', 'password', 1, 14, 1, 4, 1),
(5, '[value-2]', 'khasd asd', '2016-08-11 06:02:46', '123461', 'password', 0, 0, 2, 5, 1),
(6, 'khasd asd', 'jjks asd', '2016-08-11 06:02:46', '123462', 'password', 0, 5, 2, 6, 1),
(7, 'jjks asd', 'khasd asd', '2016-08-11 06:02:46', '123463', 'password', 0, 0, 2, 7, 1),
(8, 'j su asd', 'jjks asd', '2016-08-11 06:02:46', '123464', 'password', 0, 7, 2, 8, 1),
(9, '[as-2]', 'onns', '2016-08-11 06:02:46', '123465', 'password', 2, 0, 2, 2, 1),
(10, 'onns', 'jjks as', '2016-08-11 06:02:46', '123466', 'password', 2, 9, 2, 3, 0),
(11, 'asdasjhd', 'jjks asd', '2016-08-11 06:02:46', '123467', 'password', 2, 15, 1, 4, 1),
(12, 'aasdssas', 'jddddasd', '2016-08-11 06:02:46', '123468', 'password', 1, 14, 1, 4, 1),
(14, 'qwe', 'asd', '2016-08-11 06:02:46', '123469', 'password', 1, 2, 2, 3, 1),
(15, 'iop', 'jkl', '2016-08-11 06:02:46', '123470', 'password', 2, 9, 2, 3, 1),
(16, 'j su asder dfg ', 'sdgfs rest', '2016-08-11 06:02:46', '123471', 'password', 0, 7, 2, 9, 1),
(17, 'sad aspdo', 'asd oij', '2016-08-13 08:09:17', '000000', 'password', 6, 0, 1, 3, 1);

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
(1, 'pertama', 8, 0, '2016-08-13 11:08:25', '2016-06-17', '109030', 1, 1, '', '2', '14', '4', '7', '8', '5', '6', 16, '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '{"ts":{"3":"","1":""},"tq":{"3":"","1":""},"del":{"3":"","1":""},"top":{"3":"","1":""}}', '', '', '', '', NULL, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', 'sembarang kalir wis. pokok seneng', 0),
(2, 'kedua', 4, 0, '2016-08-20 15:55:30', '2016-06-18', '111222', 1, 1, '', '2', '14', '4', '7', '8', '5', '6', 16, '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '{"ts":{"2":"","1":"","3":""},"tq":{"2":"","1":"","3":""},"del":{"2":"Manifest","1":"","3":""},"top":{"2":"Belum dibayar","1":"","3":""}}', 'lkasjdl', '07291837', 'kasdhakbsdhk', '123123', '2016-07-23', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 0),
(3, 'percobaan ', 2, 1, '2016-08-13 11:08:25', '2016-07-26', '123', 1, 1, '', '2', '14', '4', '7', '8', '5', '6', 16, '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '{"ts":{"3":"","1":""},"tq":{"3":"","1":""},"del":{"3":"","1":""},"top":{"3":"","1":""}}', '', '', '', '', NULL, '', '', '', '', '', '', 0, 0, 0, '', '', '', '123123', 'sing penting tuku sik', 1),
(4, 'Sembarang', 5, 0, '2016-08-20 15:33:48', '2016-08-06', '1726531', 1, 1, '', '2', '14', '4', '7', '8', '5', '6', 16, 'sdasd', 's', '', '2016-08-13', '', '', '', '', 'asdsad', '+628', '', '', '2016-08-13', '', 'Manifest', 'Uang Muka', '', 'qwewqe', 'z sdf sdf', '2016-08-13', '', '{"ba":"","ku":"","ed":"","km":"","ts":{"2":""},"tq":{"2":""},"del":{"2":""},"top":{"2":""}}', 'asdasd', '', '', '', '2016-08-13', 'asdasd', '', '', '', '', '', 0, 0, 0, '', '', '', '12736128', 'pokok e ono', 0),
(5, 'mboh', 0, 0, '2016-08-27 14:05:34', '2016-08-27', '', 1, 1, '', '2', '14', '4', '7', '8', '5', '6', 16, '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_pengguna` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `tanggal`, `id_pengguna`, `keterangan`) VALUES
(1, '2016-08-15 12:38:55', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(2, '2016-08-15 12:39:04', 4, ''),
(3, '2016-08-15 13:19:57', 4, 'asdasjhd Keluar Aplikasi'),
(4, '2016-08-15 13:20:09', NULL, 'Membuka Halaman Pengguna'),
(5, '2016-08-15 13:21:00', 4, 'asdasjhd Masuk Aplikasi'),
(6, '2016-08-15 13:21:00', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(7, '2016-08-15 13:21:06', 4, 'asdasjhd Keluar Aplikasi'),
(8, '2016-08-15 13:21:20', 1, '[value-2] Masuk Aplikasi'),
(9, '2016-08-15 13:21:20', 1, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(10, '2016-08-15 13:21:21', 1, 'Membuka Halaman Pengguna'),
(11, '2016-08-16 07:24:48', 1, '[value-2] Masuk Aplikasi'),
(12, '2016-08-16 07:24:49', 1, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(13, '2016-08-16 07:25:18', 1, 'Membuka Halaman Barang'),
(14, '2016-08-16 07:25:19', 1, 'Membuka Halaman Harga'),
(15, '2016-08-16 07:25:20', 1, 'Membuka Report Supplier'),
(16, '2016-08-16 07:30:07', 1, '[value-2] Keluar Aplikasi'),
(17, '2016-08-18 07:07:04', 0, ' Masuk Aplikasi'),
(18, '2016-08-18 07:07:29', 0, ' Masuk Aplikasi'),
(19, '2016-08-18 07:07:39', 0, ' Masuk Aplikasi'),
(20, '2016-08-18 07:08:04', 4, 'asdasjhd Masuk Aplikasi'),
(21, '2016-08-18 07:08:04', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(22, '2016-08-18 11:42:24', 4, 'asdasjhd Masuk Aplikasi'),
(23, '2016-08-18 11:42:24', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(24, '2016-08-18 13:54:28', 4, 'asdasjhd Masuk Aplikasi'),
(25, '2016-08-18 13:54:28', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(26, '2016-08-20 06:59:53', 0, ' Masuk Aplikasi'),
(27, '2016-08-20 07:00:00', 4, 'asdasjhd Masuk Aplikasi'),
(28, '2016-08-20 07:00:00', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(29, '2016-08-20 07:50:58', 4, 'Membuka Halaman Barang'),
(30, '2016-08-20 07:51:18', 4, 'Membuka Halaman Barang'),
(31, '2016-08-20 07:52:07', 4, 'Membuka Halaman Barang'),
(32, '2016-08-20 07:52:14', 4, 'Menipulasi Data Barang'),
(33, '2016-08-20 07:52:14', 4, 'Membuka Halaman Barang'),
(34, '2016-08-20 07:52:16', 4, 'Membuka Halaman Barang'),
(35, '2016-08-20 07:52:34', 4, 'Membuka Halaman Barang'),
(36, '2016-08-20 07:52:59', 4, 'Membuka Halaman Barang'),
(37, '2016-08-20 07:53:49', 4, 'Membuka Halaman Barang'),
(38, '2016-08-20 07:55:26', 4, 'Membuka Halaman Barang'),
(39, '2016-08-20 07:56:43', 4, 'Membuka Halaman Barang'),
(40, '2016-08-20 07:57:31', 4, 'Membuka Halaman Barang'),
(41, '2016-08-20 07:57:56', 4, 'Membuka Halaman Barang'),
(42, '2016-08-20 07:58:15', 4, 'Membuka Halaman Barang'),
(43, '2016-08-20 07:58:37', 4, 'Membuka Halaman Barang'),
(44, '2016-08-20 07:58:57', 4, 'Membuka Halaman Barang'),
(45, '2016-08-20 07:59:06', 4, 'Membuka Halaman Barang'),
(46, '2016-08-20 08:00:13', 4, 'Membuka Halaman Barang'),
(47, '2016-08-20 08:00:23', 4, 'Membuka Halaman Barang'),
(48, '2016-08-20 08:03:12', 4, 'Membuka Halaman Barang'),
(49, '2016-08-20 08:03:47', 4, 'Membuka Halaman Barang'),
(50, '2016-08-20 08:05:33', 4, 'Membuka Halaman Barang'),
(51, '2016-08-20 08:05:44', 4, 'Membuka Halaman Barang'),
(52, '2016-08-20 08:06:05', 4, 'Membuka Halaman Barang'),
(53, '2016-08-20 08:07:18', 4, 'Membuka Halaman Barang'),
(54, '2016-08-20 08:08:00', 4, 'Membuka Halaman Barang'),
(55, '2016-08-20 08:12:29', 4, 'Membuka Report Inventaris Periode Bulan 08 Tahun 2'),
(56, '2016-08-20 08:16:24', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(57, '2016-08-20 08:16:26', 4, 'Membuka Form Purchase'),
(58, '2016-08-20 08:16:56', 4, 'Membuka Form Purchase'),
(59, '2016-08-20 08:17:09', 4, 'Membuka Form Purchase'),
(60, '2016-08-20 08:17:19', 4, 'Membuka Form Purchase'),
(61, '2016-08-20 08:17:48', 4, 'Membuka Form Purchase'),
(62, '2016-08-20 08:19:38', 4, 'Membuka Form Purchase'),
(63, '2016-08-20 08:19:51', 4, 'Membuka Form Purchase'),
(64, '2016-08-20 08:19:59', 4, 'Membuka Form Purchase'),
(65, '2016-08-20 08:20:19', 4, 'Membuka Form Purchase'),
(66, '2016-08-20 08:22:39', 4, 'Membuka Halaman Vendor'),
(67, '2016-08-20 08:23:03', 4, 'Membuka Halaman Vendor'),
(68, '2016-08-20 08:23:11', 4, 'Membuka Halaman Harga'),
(69, '2016-08-20 08:23:33', 4, 'Membuka Halaman Harga'),
(70, '2016-08-20 08:23:48', 4, 'Membuka Halaman Biro'),
(71, '2016-08-20 08:23:55', 4, 'Membuka Halaman Biro'),
(72, '2016-08-20 08:27:40', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(73, '2016-08-20 08:27:48', 4, 'Lihat List Purchase Periode Bulan 7 Tahun 2016'),
(74, '2016-08-20 08:27:55', 4, 'Lihat List Purchase Periode Bulan 7 Tahun 2016'),
(75, '2016-08-20 08:28:16', 4, 'Lihat List Purchase Periode Bulan 7 Tahun 2016'),
(76, '2016-08-20 08:29:05', 4, 'Lihat List Purchase Periode Bulan 7 Tahun 2016'),
(77, '2016-08-20 14:49:07', 4, 'asdasjhd Masuk Aplikasi'),
(78, '2016-08-20 14:49:07', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(79, '2016-08-20 14:49:25', 4, 'Membuka Halaman Pengguna'),
(80, '2016-08-20 14:49:46', 4, 'Membuka Halaman Pengguna'),
(81, '2016-08-20 14:50:19', 4, 'Membuka Halaman Pengguna'),
(82, '2016-08-20 14:50:43', 4, 'Membuka Halaman Pengguna'),
(83, '2016-08-20 14:54:11', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(84, '2016-08-20 14:54:13', 4, 'Membuka Form Purchase'),
(85, '2016-08-20 14:54:50', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(86, '2016-08-20 15:10:06', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(87, '2016-08-20 15:10:12', 4, 'Membuka Report Validasi'),
(88, '2016-08-20 15:10:15', 4, 'Membuka Report Validasi'),
(89, '2016-08-20 15:10:51', 4, 'Membuka Report Validasi'),
(90, '2016-08-20 15:11:02', 4, 'Membuka Report Validasi'),
(91, '2016-08-20 15:11:03', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(92, '2016-08-20 15:12:04', 4, 'Membuka Report Validasi'),
(93, '2016-08-20 15:12:10', 4, 'Membuka Report Permohonan Pembayaran'),
(94, '2016-08-20 15:12:13', 4, 'Membuka Report Permohonan Pembayaran'),
(95, '2016-08-20 15:12:21', 4, 'Edit data Permohonan Pembayaran'),
(96, '2016-08-20 15:12:21', 4, 'Membuka Report Permohonan Pembayaran'),
(97, '2016-08-20 15:12:26', 4, 'Membuka Report Permohonan Pembayaran'),
(98, '2016-08-20 15:12:34', 4, 'Membuka Report Permohonan Pembayaran'),
(99, '2016-08-20 15:12:41', 4, 'Edit data Permohonan Pembayaran'),
(100, '2016-08-20 15:12:41', 4, 'Membuka Report Permohonan Pembayaran'),
(101, '2016-08-20 15:13:52', 4, 'Membuka Report Permohonan Pembayaran'),
(102, '2016-08-20 15:14:25', 4, 'Membuka Report BASTB'),
(103, '2016-08-20 15:14:27', 4, 'Membuka Report BASTB'),
(104, '2016-08-20 15:15:06', 4, 'Membuka Report BASTB'),
(105, '2016-08-20 15:15:32', 4, 'Membuka Report BASTB'),
(106, '2016-08-20 15:15:46', 4, 'Membuka Report Purchase Order'),
(107, '2016-08-20 15:15:49', 4, 'Membuka Report Purchase Order'),
(108, '2016-08-20 15:27:13', 4, 'Membuka Report Purchase Order'),
(109, '2016-08-20 15:27:21', 4, 'Membuka Report Purchase Order'),
(110, '2016-08-20 15:30:53', 4, 'Membuka Report Purchase Order'),
(111, '2016-08-20 15:30:57', 4, 'Membuka Report Purchase Order'),
(112, '2016-08-20 15:31:38', 4, 'Membuka Report Purchase Order'),
(113, '2016-08-20 15:31:42', 4, 'Membuka Report Purchase Order'),
(114, '2016-08-20 15:31:46', 4, 'Membuka Report Purchase Order'),
(115, '2016-08-20 15:31:50', 4, 'Membuka Report Purchase Order'),
(116, '2016-08-20 15:31:54', 4, 'Membuka Report Purchase Order'),
(117, '2016-08-20 15:31:57', 4, 'Membuka Report Purchase Order'),
(118, '2016-08-20 15:32:00', 4, 'Membuka Report Purchase Order'),
(119, '2016-08-20 15:32:02', 4, 'Membuka Report Purchase Order'),
(120, '2016-08-20 15:32:08', 4, 'Membuka Report Purchase Order'),
(121, '2016-08-20 15:32:19', 4, 'Membuka Report Purchase Order'),
(122, '2016-08-20 15:33:30', 4, 'Membuka Report Purchase Order'),
(123, '2016-08-20 15:33:48', 4, 'Edit data Purchase Order'),
(124, '2016-08-20 15:33:49', 4, 'Membuka Report Purchase Order'),
(125, '2016-08-20 15:33:52', 4, 'Membuka Report Purchase Order'),
(126, '2016-08-20 15:33:56', 4, 'Membuka Report Purchase Order'),
(127, '2016-08-20 15:34:12', 4, 'Membuka Report Canvas'),
(128, '2016-08-20 15:34:17', 4, 'Membuka Report Canvas'),
(129, '2016-08-20 15:35:47', 4, 'Membuka Report Canvas'),
(130, '2016-08-20 15:49:49', 4, 'Membuka Report Canvas'),
(131, '2016-08-20 15:50:10', 4, 'Membuka Report Canvas'),
(132, '2016-08-20 15:50:57', 4, 'Membuka Report Canvas'),
(133, '2016-08-20 15:51:35', 4, 'Membuka Report Canvas'),
(134, '2016-08-20 15:52:59', 4, 'Membuka Report Canvas'),
(135, '2016-08-20 15:54:55', 4, 'Membuka Report Canvas'),
(136, '2016-08-20 15:55:12', 4, 'Membuka Report Canvas'),
(137, '2016-08-20 15:55:30', 4, 'Edit Report Canvas'),
(138, '2016-08-20 15:55:30', 4, 'Membuka Report Canvas'),
(139, '2016-08-20 15:55:35', 4, 'Membuka Report Canvas'),
(140, '2016-08-20 15:56:04', 4, 'Membuka Report Canvas'),
(141, '2016-08-20 15:56:34', 4, 'Membuka Report Canvas'),
(142, '2016-08-20 15:57:16', 4, 'Membuka Report Canvas'),
(143, '2016-08-20 15:58:03', 4, 'Membuka Report Canvas'),
(144, '2016-08-20 15:58:35', 4, 'Membuka Report Canvas'),
(145, '2016-08-20 15:58:43', 4, 'Membuka Report Canvas'),
(146, '2016-08-20 15:59:22', 4, 'Membuka Report Canvas'),
(147, '2016-08-20 16:00:19', 4, 'Membuka Report Canvas'),
(148, '2016-08-20 16:00:49', 4, 'Membuka Report Canvas'),
(149, '2016-08-20 16:01:09', 4, 'Membuka Memo kedua'),
(150, '2016-08-20 16:01:30', 4, 'Membuka Report Inventaris Periode Bulan 08 Tahun 2'),
(151, '2016-08-20 16:01:37', 4, 'Membuka Form Inventaris'),
(152, '2016-08-20 16:03:15', 4, 'Membuka Form Inventaris'),
(153, '2016-08-20 16:03:37', 4, 'Membuka Form Inventaris'),
(154, '2016-08-20 16:03:47', 4, 'Membuka Form Inventaris'),
(155, '2016-08-20 16:03:53', 4, 'Membuka Form Inventaris'),
(156, '2016-08-20 16:04:35', 4, 'Membuka Form Inventaris'),
(157, '2016-08-20 16:04:50', 4, 'Membuka Report Inventaris Periode Bulan 08 Tahun 2'),
(158, '2016-08-20 16:04:51', 4, 'Membuka Memo kedua'),
(159, '2016-08-20 16:04:58', 4, 'Membuka Report Supplier'),
(160, '2016-08-20 16:05:00', 4, 'Membuka Report Supplier'),
(161, '2016-08-27 14:02:55', 4, 'asdasjhd Masuk Aplikasi'),
(162, '2016-08-27 14:02:55', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(163, '2016-08-27 14:03:10', 4, 'Lihat List Purchase Periode Bulan 7 Tahun 2016'),
(164, '2016-08-27 14:03:20', 4, 'Membuka Report Permintaan Barang'),
(165, '2016-08-27 14:03:49', 4, 'Membuka Report Permintaan Barang'),
(166, '2016-08-27 14:03:54', 4, 'Membuka Report Permintaan Barang'),
(167, '2016-08-27 14:03:57', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(168, '2016-08-27 14:03:59', 4, 'Membuka Form Purchase'),
(169, '2016-08-27 14:04:26', 4, 'Input data purchase mboh'),
(170, '2016-08-27 14:04:26', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(171, '2016-08-27 14:04:34', 4, 'Membuka Form Purchase'),
(172, '2016-08-27 14:04:38', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(173, '2016-08-27 14:04:40', 4, 'Membuka Form Purchase'),
(174, '2016-08-27 14:05:08', 4, 'Edit data purchase mboh'),
(175, '2016-08-27 14:05:08', 4, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(176, '2016-08-27 14:05:19', 4, 'asdasjhd Keluar Aplikasi'),
(177, '2016-08-27 14:05:28', 14, 'qwe Masuk Aplikasi'),
(178, '2016-08-27 14:05:29', 14, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(179, '2016-08-27 14:05:34', 14, 'Edit Status Purchase'),
(180, '2016-08-27 14:05:35', 14, 'Lihat List Purchase Periode Bulan 08 Tahun 2016'),
(181, '2016-08-27 14:05:40', 14, 'Membuka Memo mboh');

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
(1, '2', '2016', 'qweq', 'weqwe', 'weqwe', 'qweq'),
(2, '7', '2016', 'weqwe', 'qweqw', 'eqw', 'ewqeqwe');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `id_purchase`, `tanggal`, `file`, `keterangan`) VALUES
(1, 1, '2016-08-18 14:36:33', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(2, 1, '2016-08-20 07:01:29', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(3, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(4, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(5, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(6, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(7, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(8, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(9, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(10, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(11, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(12, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(13, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(14, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(15, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(16, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(17, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(18, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(19, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar'),
(20, 1, '2016-08-20 07:01:42', '57b5c7f1bffec.gif', 'kucing anjing bertengkar');

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
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
