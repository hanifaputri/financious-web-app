-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2020 at 08:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(120) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tj_transport` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tj_transport`, `uang_makan`) VALUES
(1, 'Staff Marketing', '4000000', '800000', '500000'),
(2, 'Staff Finance', '4500000', '700000', '500000'),
(3, 'Staff Logistik', '3500000', '700000', '450000'),
(5, 'Staff Public Relation', '4500000', '550000', '500000'),
(6, 'Admin', '4700000', '850000', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_kehadiran`, `bulan`, `nik`, `nama_pegawai`, `jenis_kelamin`, `nama_jabatan`, `hadir`, `sakit`, `alpha`) VALUES
(1, '082020', '1234567890', 'Doni', 'Laki-laki', 'Staff Finance', 20, 1, 1),
(2, '012020', '1234567890', 'Doni', 'Laki-laki', 'Staff Finance', 20, 0, 2),
(3, '012020', '1234567895', 'Ghina', 'Perempuan', 'Staff Finance', 21, 1, 0),
(4, '012020', '1234567891', 'Hanifa', 'February', 'Staff Marketing', 22, 0, 0),
(5, '012020', '1234567894', 'Liza', 'Perempuan', 'Staff Public Relation', 20, 2, 0),
(6, '122020', '1234567890', 'Doni', 'Laki-laki', 'Staff Finance', 24, 0, 0),
(13, '082020', '1234567894', 'Liza', 'Perempuan', 'Staff Public Relation', 28, 2, 0),
(14, '082020', '1234567893', 'Atta', 'Laki-laki', 'Staff Logistik', 0, 0, 0),
(15, '082020', '1234567895', 'Ghina', 'Perempuan', 'Staff Finance', 0, 0, 0),
(16, '082020', '1234567891', 'Hanifa', 'Perempuan', 'Staff Marketing', 30, 0, 0),
(17, '122020', '1234567893', 'Atta', 'Laki-laki', 'Staff Logistik', 24, 4, 2),
(18, '122020', '1234567895', 'Ghina', 'Perempuan', 'Staff Finance', 30, 0, 0),
(19, '122020', '1234567891', 'Hanifa', 'Perempuan', 'Staff Marketing', 29, 1, 0),
(20, '122020', '1234567894', 'Liza', 'Perempuan', 'Staff Public Relation', 29, 0, 1),
(41, '032020', '1234567893', 'Atta', 'Laki-laki', 'Staff Logistik', 1, 0, 0),
(42, '032020', '1234567890', 'Doni', 'Laki-laki', 'Staff Logistik', 1, 0, 0),
(43, '032020', '1234567895', 'Ghina', 'Perempuan', 'Staff Finance', 1, 0, 0),
(44, '032020', '1234567891', 'Hanifa', 'Perempuan', 'Staff Marketing', 1, 0, 0),
(45, '032020', '1234567894', 'Liza', 'Perempuan', 'Staff Public Relation', 1, 0, 0),
(46, '012020', '1234567893', 'Atta', 'Laki-laki', 'Staff Logistik', 30, 0, 0),
(47, '042020', '1234567893', 'Atta', 'Laki-laki', 'Staff Logistik', 28, 0, 2),
(48, '042020', '1234567890', 'Doni', 'Laki-laki', 'Staff Logistik', 24, 3, 3),
(49, '042020', '1234567895', 'Ghina', 'Perempuan', 'Staff Finance', 30, 0, 0),
(50, '042020', '1234567891', 'Hanifa', 'Perempuan', 'Staff Marketing', 30, 0, 0),
(51, '042020', '1234567894', 'Liza', 'Perempuan', 'Staff Public Relation', 30, 0, 0),
(52, '012020', '1234567888', 'Ardhito', 'Laki-laki', 'Staff Public Relation', 25, 0, 5),
(53, '012020', '1234567889', 'Hani', 'Perempuan', 'Staff Marketing', 25, 0, 5),
(54, '012020', '1234567777', 'Raisa', 'Perempuan', 'Admin', 25, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `username`, `password`, `jenis_kelamin`, `jabatan`, `tanggal_masuk`, `status`, `photo`, `hak_akses`) VALUES
(8, '1234567895', 'Ghina', 'ghina', 'b59c67bf196a4758191e42f76670ceba', 'Perempuan', 'Staff Finance', '2021-02-01', 'Karyawan Tetap', 'ava11.png', 2),
(9, '1234567890', 'Doni', '', '', 'Laki-laki', 'Staff Logistik', '2019-12-23', 'Karyawan Tetap', 'dodi1.png', 2),
(10, '1234567894', 'Liza', '', '', 'Perempuan', 'Staff Public Relation', '2020-11-11', 'Karyawan Tetap', 'ava31.png', 2),
(12, '1234567891', 'Hanifa', '', '', 'Perempuan', 'Staff Marketing', '2019-09-23', 'Karyawan Tetap', 'avataaars_(9).png', 2),
(13, '1234567893', 'Atta', '', '', 'Laki-laki', 'Staff Logistik', '2018-01-01', 'Karyawan Tidak Tetap', 'ahha.jpg', 2),
(14, '1234567777', 'Raisa', 'raisa', '4a7d1ed414474e4033ac29ccb8653d9b', 'Perempuan', 'Admin', '2020-12-07', 'Karyawan Tetap', 'raisa1.jpg', 1),
(15, '1234567888', 'Ardhito', 'ardhitopramono', '81dc9bdb52d04dc20036dbd8313ed055', 'Laki-laki', 'Staff Public Relation', '2020-12-07', 'Karyawan Tetap', 'ardhito.jpg', 1),
(16, '1234567889', 'Hani', 'hanifaputri', '4a639b6136a07efc4634b0546e1dfe38', 'Perempuan', 'Staff Marketing', '2020-12-07', 'Karyawan Tetap', 'tasyafarasya.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(1, 'admin', 1),
(2, 'pegawai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `potongan_gaji`
--

CREATE TABLE `potongan_gaji` (
  `id` int(11) NOT NULL,
  `potongan` varchar(120) NOT NULL,
  `jml_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potongan_gaji`
--

INSERT INTO `potongan_gaji` (`id`, `potongan`, `jml_potongan`) VALUES
(1, 'Alpha', 50000),
(3, 'Sakit', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
