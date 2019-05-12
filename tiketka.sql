-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 03:43 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiketka`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idKelas` int(3) NOT NULL,
  `namaKelas` varchar(30) NOT NULL,
  `harga` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idKelas`, `namaKelas`, `harga`) VALUES
(3, 'Eksekutif', 120000),
(4, 'Bisnis', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `kereta`
--

CREATE TABLE `kereta` (
  `idKA` int(3) NOT NULL,
  `namaKA` varchar(30) NOT NULL,
  `tanggalBerangkat` date NOT NULL,
  `tanggalTiba` date NOT NULL,
  `jamBerangkat` varchar(10) NOT NULL,
  `jamTiba` varchar(10) NOT NULL,
  `dari` varchar(30) NOT NULL,
  `ke` varchar(30) NOT NULL,
  `idKelas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kereta`
--

INSERT INTO `kereta` (`idKA`, `namaKA`, `tanggalBerangkat`, `tanggalTiba`, `jamBerangkat`, `jamTiba`, `dari`, `ke`, `idKelas`) VALUES
(1, 'Argo Parahyangan', '2014-04-22', '2014-04-22', '06:00', '08:45', 'Jakarta Pusat', 'Bandung', 4),
(3, 'Argo Parahyangan', '2014-04-23', '2014-04-23', '13:01', '15:00', 'Jakarta Pusat', 'Surabaya', 3),
(4, 'Argo Parahyangan', '2014-04-24', '2014-04-24', '03:00', '04:00', 'Surabaya', 'Jember', 4),
(5, 'Argo Kencana', '2018-11-04', '2018-11-04', '08:00', '11:00', 'Bandung', 'Jakarta', 3);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `idKonfirmasi` int(5) NOT NULL,
  `idPesan` int(5) NOT NULL,
  `noRekening` varchar(25) NOT NULL,
  `namaAccount` varchar(100) DEFAULT NULL,
  `tanggalTransfer` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`idKonfirmasi`, `idPesan`, `noRekening`, `namaAccount`, `tanggalTransfer`) VALUES
(1, 1, '201987735', 'Mr. nobody', '2018-10-10'),
(2, 2, '6050882367', 'NamaAKun', '2018-10-09'),
(3, 3, '1010001110', 'Pelanggan Satu', '2018-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `idPesan` int(5) NOT NULL,
  `iduser` int(4) NOT NULL,
  `namaPemesan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `noTelp` varchar(15) NOT NULL,
  `tanggalPesan` date NOT NULL,
  `dewasa` int(11) NOT NULL,
  `anak` int(11) NOT NULL,
  `idKA` int(3) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`idPesan`, `iduser`, `namaPemesan`, `alamat`, `noTelp`, `tanggalPesan`, `dewasa`, `anak`, `idKA`, `status`) VALUES
(1, 1, 'administrator', 'jl. xxx', '08222', '2018-10-10', 2, 0, 5, 2),
(2, 1, 'administrator', 'jl xyxyxy2', '021654266', '2018-10-10', 1, 0, 5, 2),
(3, 5, 'Pelanggan Satu', 'Jl. Pelanggan Satu no. 1', '0811111111', '2018-10-14', 2, 0, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(65) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `nama`, `pass`, `level`) VALUES
(1, 'admin', 'administrator', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin'),
(2, 'bdianto', 'Budianto', '5f4dcc3b5aa765d61d8327deb882cf99', 'pelanggan'),
(3, 'dennyk', 'Denny Kurniawan', '5f4dcc3b5aa765d61d8327deb882cf99', 'pelanggan'),
(4, 'administrator', 'Administrator', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin'),
(5, 'customer1', 'Pelanggan Satu', '5f4dcc3b5aa765d61d8327deb882cf99', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idKelas`);

--
-- Indexes for table `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`idKA`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`idKonfirmasi`),
  ADD KEY `idPesan` (`idPesan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`idPesan`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idKelas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kereta`
--
ALTER TABLE `kereta`
  MODIFY `idKA` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `idKonfirmasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `idPesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_1` FOREIGN KEY (`idPesan`) REFERENCES `pesan` (`idPesan`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
