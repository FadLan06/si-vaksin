-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2021 at 01:32 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vaksin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nip`, `nama`, `jabatan`) VALUES
(20, '531411', 'Fadhlan', 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `jurusan`) VALUES
(12, '53141511', 'Fadhlan', 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tendik`
--

CREATE TABLE `tb_tendik` (
  `id_tendik` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tendik`
--

INSERT INTO `tb_tendik` (`id_tendik`, `id`, `nama`, `jabatan`) VALUES
(5, '531415007', 'Fadhlan', 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` int(15) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `role`, `created_at`, `is_active`) VALUES
(1, 'Super User', 'su', '$2y$10$2U.lo9TSxXZJfMpU8t6LAu1BAi5zbdM6M.TwSoi/jRFLFL8EcetWC', 1, 1583555000, 1),
(31, '531411', '5314', '$2y$10$0dd1DFxU/D/yihg3/TZzHeoysjABSE4Aj8.Mru/T88buVHsJyV0wO', 2, 1632273085, 1),
(39, '53141511', '531415', '$2y$10$l/DCPf0FIqDGZGhp7nLI4uEGlgJpvVcPHnxJDcrbbOQ3Smixelshm', 4, 1632273918, 1),
(40, '531415007', '531415007', '$2y$10$8fJvNTd82zQu7ZhTSPA.Y.ZlAkoC7iuxEpI1bJZacpqUxo3vpYbpG', 3, 1632273940, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`id_role`, `role`) VALUES
(1, 'Super User'),
(2, 'Dosen'),
(3, 'Tendik'),
(4, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vaksin`
--

CREATE TABLE `tb_vaksin` (
  `id_vaksin` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status1` int(11) NOT NULL,
  `status2` int(11) NOT NULL,
  `status3` int(11) NOT NULL,
  `berkas1` text NOT NULL,
  `berkas2` text NOT NULL,
  `berkas3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_vaksin`
--

INSERT INTO `tb_vaksin` (`id_vaksin`, `kode`, `nama`, `status1`, `status2`, `status3`, `berkas1`, `berkas2`, `berkas3`) VALUES
(4, '531411', 'Fadhlan', 1, 0, 0, 'a209157812f5663bd80e623ea02e9b21.jpg', '', ''),
(12, '53141511', 'Fadhlan', 0, 0, 0, '', '', ''),
(13, '531415007', 'Fadhlan', 1, 1, 1, '162311092397b6e90ea7b65d55209bde.jpg', 'f898beaa3858b86c8808828d436a3e6e.jpg', 'dea0ab5c6b9b779d74371c9bcd6c42c1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `tb_tendik`
--
ALTER TABLE `tb_tendik`
  ADD PRIMARY KEY (`id_tendik`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_vaksin`
--
ALTER TABLE `tb_vaksin`
  ADD PRIMARY KEY (`id_vaksin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_tendik`
--
ALTER TABLE `tb_tendik`
  MODIFY `id_tendik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_vaksin`
--
ALTER TABLE `tb_vaksin`
  MODIFY `id_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
