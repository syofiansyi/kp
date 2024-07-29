-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 03:11 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(18) NOT NULL,
  `nama_dosen` varchar(30) DEFAULT NULL,
  `password` varchar(34) DEFAULT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` varchar(9) NOT NULL,
  `nama_mhs` varchar(34) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `matkul_metopen` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `npm` varchar(9) DEFAULT NULL,
  `id_bimbing` int(11) DEFAULT NULL,
  `total` varchar(11) DEFAULT NULL,
  `jenis_seminar` enum('semprop','semhas','sidang','') DEFAULT NULL,
  `status1` enum('lulus','gagal','','') DEFAULT NULL,
  `ASS` varchar(30) DEFAULT NULL,
  `dipt` varchar(19) DEFAULT NULL,
  `pendahuluan` varchar(11) DEFAULT NULL,
  `pustaka` varchar(11) DEFAULT NULL,
  `metopen` varchar(11) DEFAULT NULL,
  `hasilpem` varchar(11) DEFAULT NULL,
  `simpsar` varchar(11) DEFAULT NULL,
  `bahasa` varchar(11) DEFAULT NULL,
  `ttulis` varchar(11) DEFAULT NULL,
  `argumen` varchar(11) DEFAULT NULL,
  `metode` varchar(11) DEFAULT NULL,
  `materi` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`username`, `password`, `nama`) VALUES
('OPERATOR', '5787be38ee03a9ae5360f54d9026465f', 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id_bimbing` int(11) NOT NULL,
  `npm` varchar(9) DEFAULT NULL,
  `nama_pb1` varchar(50) NOT NULL,
  `nama_pb2` varchar(50) NOT NULL,
  `pb1` varchar(20) DEFAULT NULL,
  `pb2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `pengirim` varchar(20) NOT NULL,
  `pesan` varchar(500) NOT NULL,
  `status` varchar(13) NOT NULL,
  `penerima` varchar(20) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `doc` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`pengirim`, `pesan`, `status`, `penerima`, `id_pesan`, `nama`, `doc`) VALUES
('operator', ' asasdscascas', 'dibaca', 'A1J015037', 4, 'operator', NULL),
('operator', ' asdadasd', 'dibaca', 'A1J015037', 5, 'operator', NULL),
('A1J015032', ' cdcdcdds', 'dibaca', 'A1J015037', 6, 'Astri Rarantika ', NULL),
('A1J015032', ' saccscsc', 'dibaca', 'A1J015037', 7, 'Astri Rarantika ', NULL),
('OPERATOR', ' scacs', 'dibaca', 'A1J015037', 8, 'operator', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semhas`
--

CREATE TABLE `semhas` (
  `npm` varchar(9) DEFAULT NULL,
  `id_semhas` varchar(11) NOT NULL,
  `nama_pg1` varchar(50) NOT NULL,
  `nama_pg2` varchar(50) NOT NULL,
  `pg1` varchar(50) DEFAULT NULL,
  `pg2` varchar(50) DEFAULT NULL,
  `pukul` time DEFAULT NULL,
  `tanggal1` date NOT NULL,
  `status` enum('proses','daftar','selesai','gagal') DEFAULT NULL,
  `ruang` varchar(50) NOT NULL,
  `id_bimbing` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semprop`
--

CREATE TABLE `semprop` (
  `npm` varchar(9) DEFAULT NULL,
  `id_semprop` varchar(11) NOT NULL,
  `nama_pg1` varchar(50) NOT NULL,
  `nama_pg2` varchar(50) NOT NULL,
  `pg1` varchar(50) DEFAULT NULL,
  `pg2` varchar(50) DEFAULT NULL,
  `pukul` time DEFAULT NULL,
  `tanggal` date NOT NULL,
  `status` enum('proses','daftar','selesai','gagal') DEFAULT NULL,
  `ruang` varchar(50) NOT NULL,
  `id_bimbing` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sidang`
--

CREATE TABLE `sidang` (
  `npm` varchar(9) DEFAULT NULL,
  `id_sidang` varchar(11) NOT NULL,
  `nama_pg1` varchar(50) NOT NULL,
  `nama_pg2` varchar(50) NOT NULL,
  `pg1` varchar(50) DEFAULT NULL,
  `pg2` varchar(50) DEFAULT NULL,
  `pukul` time DEFAULT NULL,
  `tanggal3` date NOT NULL,
  `status` enum('proses','daftar','selesai','gagal') DEFAULT NULL,
  `ruang` varchar(50) NOT NULL,
  `id_bimbing` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `id_skripsi` int(4) NOT NULL,
  `npm` varchar(9) DEFAULT NULL,
  `jenis` varchar(11) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `acc_judul` enum('terima','tolak','selesai','proses','gagal','tb') DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `syarat`
--

CREATE TABLE `syarat` (
  `id_syarat` varchar(11) NOT NULL,
  `npm` varchar(9) DEFAULT NULL,
  `fileskrip` varchar(200) DEFAULT NULL,
  `acc_seminar` enum('semprop','semhas','sidang','s1','s2','s3','gagal') DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `kbskrip` varchar(200) DEFAULT NULL,
  `sizin` varchar(200) DEFAULT NULL,
  `ukt` varchar(200) DEFAULT NULL,
  `transkrip` varchar(200) DEFAULT NULL,
  `lhs` varchar(200) DEFAULT NULL,
  `krs` varchar(200) DEFAULT NULL,
  `ijazah` varchar(200) DEFAULT NULL,
  `nim` varchar(200) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `npm` (`npm`),
  ADD KEY `id_bimbing` (`id_bimbing`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id_bimbing`),
  ADD KEY `npm` (`npm`),
  ADD KEY `pb1` (`pb1`),
  ADD KEY `pb2` (`pb2`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `semhas`
--
ALTER TABLE `semhas`
  ADD PRIMARY KEY (`id_semhas`),
  ADD KEY `npm` (`npm`),
  ADD KEY `dosen_penguji1` (`pg1`),
  ADD KEY `dosen_penguji2` (`pg2`),
  ADD KEY `id_bimbing` (`id_bimbing`);

--
-- Indexes for table `semprop`
--
ALTER TABLE `semprop`
  ADD PRIMARY KEY (`id_semprop`),
  ADD KEY `npm` (`npm`),
  ADD KEY `dosen_penguji1` (`pg1`),
  ADD KEY `dosen_penguji2` (`pg2`),
  ADD KEY `id_bimbing` (`id_bimbing`);

--
-- Indexes for table `sidang`
--
ALTER TABLE `sidang`
  ADD PRIMARY KEY (`id_sidang`),
  ADD UNIQUE KEY `id_bimbing_2` (`id_bimbing`),
  ADD KEY `npm` (`npm`),
  ADD KEY `dosen_penguji1` (`pg1`),
  ADD KEY `dosen_penguji2` (`pg2`),
  ADD KEY `id_bimbing` (`id_bimbing`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id_skripsi`),
  ADD KEY `npm` (`npm`);

--
-- Indexes for table `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`id_syarat`),
  ADD KEY `npm` (`npm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id_bimbing` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id_skripsi` int(4) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD CONSTRAINT `pembimbing_ibfk_1` FOREIGN KEY (`id_bimbing`) REFERENCES `skripsi` (`id_skripsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semhas`
--
ALTER TABLE `semhas`
  ADD CONSTRAINT `semhas_ibfk_1` FOREIGN KEY (`id_semhas`) REFERENCES `syarat` (`id_syarat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semprop`
--
ALTER TABLE `semprop`
  ADD CONSTRAINT `semprop_ibfk_1` FOREIGN KEY (`id_semprop`) REFERENCES `syarat` (`id_syarat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sidang`
--
ALTER TABLE `sidang`
  ADD CONSTRAINT `sidang_ibfk_1` FOREIGN KEY (`id_sidang`) REFERENCES `syarat` (`id_syarat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD CONSTRAINT `skripsi_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
