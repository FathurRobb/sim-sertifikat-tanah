-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 10:02 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendataan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_fisik`
--

CREATE TABLE `data_fisik` (
  `no_berkas` varchar(20) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hak` varchar(50) NOT NULL,
  `no_sertifikat` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tahun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_fisik`
--

INSERT INTO `data_fisik` (`no_berkas`, `desa`, `nama`, `no_hak`, `no_sertifikat`, `status`, `tahun`) VALUES
('12', 'ciko', 'adi', '034', 'ST24', 'Selesai', '2020'),
('12345', 'Mekarsari', 'aditiya', '1234', '123sd', 'Selesai', '2020'),
('272264', 'mekarjaya', 'aditiya suryana', '00546', 'aaq123456', 'Selesai', '2019'),
('334131231', 'Cimekar', 'Irfan', '223431541', 'ACFW3341', 'Selesai', '2020'),
('334541431', 'Testing', 'Panduan Website', '334312314', 'AC3431541', 'Selesai', '2019'),
('44141343', 'Cimerekmek', 'Rohmat Saipudin', '43113341', '64141343', 'Selesai', '2019'),
('5413454', 'Cigiringsing', 'Rusdi', '3415413', '5613413', 'Selesai', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `data_pbt`
--

CREATE TABLE `data_pbt` (
  `no_pbt` int(25) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `dokumen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pbt`
--

INSERT INTO `data_pbt` (`no_pbt`, `desa`, `tahun`, `nama`, `status`, `dokumen`) VALUES
(12345, 'mekarsari', '2020', 'bpk ade', '', '86958488_PBT.1520.2019.91 Bidang 18042019-Model 1.'),
(123444, 'ytry', '2020', 'sdf', NULL, '1832797308_598903.jpg'),
(334134, 'Cimekar', '2020', 'Irfan', '', '312110463_COBA_UPLOAD.pdf'),
(6511541, 'Cigerwix', '2020', 'Yujeng Semangat', '', '1764213747_CERT-C3LA2D5K.jpg'),
(9811541, 'Cijambe', '2020', 'Jajat Sudrajat', '', '767237177_serangan.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `data_sertifikat`
--

CREATE TABLE `data_sertifikat` (
  `no_sertifikat` varchar(20) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `tahun` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_sertifikat`
--

INSERT INTO `data_sertifikat` (`no_sertifikat`, `desa`, `tahun`, `nama`, `status`) VALUES
('1122', 'mekar', 2020, 'harapan', 'Selesai'),
('12345', 'mekarjaya', 2020, 'aditiya', 'Selesai'),
('443154134', 'Cigiringsing', 2020, 'Jajang Ruhiyat', 'Selesai'),
('64141343', 'Cimerekmek', 2020, 'Rusdi Oyag', 'Selesai'),
('7891156', 'Kebon Kangkung', 2019, 'Jajang Gimana Aja	', 'Selesai'),
('ACFW3341', 'Cimekar', 2020, 'Irfan', 'Selesai'),
('AK47541343', 'Konohagakure', 2019, 'Rusdi Oyag', 'Belum'),
('CA44312312', 'Testing', 2020, 'Panduan Website', 'Selesai'),
('CM37641343', 'Cimencret', 2020, 'Enok Sukaesih', 'Selesai'),
('RB12341343', 'Rancabentang', 2019, 'Jajang Sukmara', 'Belum'),
('RB44141343', 'Rancabentang', 2020, 'Yoggi Doang', 'Selesai'),
('RB54541343', 'Rancabentang', 2020, 'Yusman Jegag', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `pemohon_file`
--

CREATE TABLE `pemohon_file` (
  `id_pemohon_file` int(5) NOT NULL,
  `id_permohonan` varchar(6) NOT NULL,
  `berita_acara` varchar(255) NOT NULL,
  `risalah` varchar(255) NOT NULL,
  `sktmba` varchar(255) NOT NULL,
  `s_permohonan` varchar(255) NOT NULL,
  `s_pernyataan` varchar(255) NOT NULL,
  `s_riwayat_tanah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemohon_file`
--

INSERT INTO `pemohon_file` (`id_pemohon_file`, `id_permohonan`, `berita_acara`, `risalah`, `sktmba`, `s_permohonan`, `s_pernyataan`, `s_riwayat_tanah`) VALUES
(1, 'KP0001', 'KP0001_Berita Acara.doc', 'KP0001_Risalah 201B.doc', '', 'KP0001_Surat Permohonan.doc', 'KP0001_Surat Pernyataan.doc', 'KP0001_Surat Riwayat Tanah.doc');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `token` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `berita_acara` varchar(255) NOT NULL,
  `risalah` varchar(255) NOT NULL,
  `sktbma` varchar(255) NOT NULL,
  `s_permohonan` varchar(255) NOT NULL,
  `s_pernyataan` varchar(255) NOT NULL,
  `s_riwayat_tanah` varchar(255) NOT NULL,
  `status` enum('0','1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id_permohonan` varchar(6) NOT NULL,
  `id_user` int(5) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('Sedang','Proses','Selesai','Batal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id_permohonan`, `id_user`, `kecamatan`, `desa`, `alamat`, `status`) VALUES
('KP0001', 7, 'Andir', 'dungus cariang', 'Gang Mesjid Al-Hikmah', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`id`, `target`, `hasil`) VALUES
(1, 40, 43);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `dibuat_pada` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `jabatan`, `dibuat_pada`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'Admin', '2020-07-13 10:06:07.976279'),
(2, 'fisik', 'dc16bb9cf738fa0a05bb6e8fca2f32b3', 'fisik@gmail.com', 'fisik', 'Fisik', '2020-07-13 10:06:53.640352'),
(8, 'JoniAttack', 'e978d0bd075779e32d23a00cdbeed61d', 'joni@yahoo.co.id', 'Joni Joget', 'Pemohon', '2021-03-17 09:00:39.207705'),
(7, 'RedHead', 'ed2bcd4deda5629174382ac5bc5473c0', 'sheeran@gmail.com', 'Ed Sheeran', 'Pemohon', '2021-03-14 15:56:07.892884'),
(3, 'yuridis ', 'ed143029b5dfcf16faa3a0f18a07c8f1', 'yuridis@gmail.com', 'yuridis ', 'Yuridis', '2020-07-13 10:06:35.969980');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_fisik`
--
ALTER TABLE `data_fisik`
  ADD PRIMARY KEY (`no_berkas`);

--
-- Indexes for table `data_pbt`
--
ALTER TABLE `data_pbt`
  ADD PRIMARY KEY (`no_pbt`);

--
-- Indexes for table `data_sertifikat`
--
ALTER TABLE `data_sertifikat`
  ADD PRIMARY KEY (`no_sertifikat`);

--
-- Indexes for table `pemohon_file`
--
ALTER TABLE `pemohon_file`
  ADD PRIMARY KEY (`id_pemohon_file`),
  ADD KEY `id_user` (`id_permohonan`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`token`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id_permohonan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemohon_file`
--
ALTER TABLE `pemohon_file`
  MODIFY `id_pemohon_file` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemohon_file`
--
ALTER TABLE `pemohon_file`
  ADD CONSTRAINT `pemohon_file_ibfk_1` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan` (`id_permohonan`);

--
-- Constraints for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD CONSTRAINT `permohonan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
