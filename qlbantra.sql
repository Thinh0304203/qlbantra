-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 03:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbantra`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `email` int(100) NOT NULL,
  `matkhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhsachyeuthich`
--

CREATE TABLE `danhsachyeuthich` (
  `id` varchar(20) NOT NULL,
  `id_nguoidung` varchar(20) NOT NULL,
  `id_sanpham` varchar(20) NOT NULL,
  `gia` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id_donhang` varchar(20) NOT NULL,
  `id_nguoidung` varchar(20) NOT NULL,
  `ten_nguoinhanhang` varchar(100) NOT NULL,
  `sdt_nguoinhan` varchar(20) NOT NULL,
  `email_nguoinhan` varchar(100) NOT NULL,
  `diachi_nhanhang` varchar(255) NOT NULL,
  `diachi_loai` varchar(10) NOT NULL,
  `phuongthucthanhtoan` varchar(50) NOT NULL,
  `id_sanpham` varchar(20) NOT NULL,
  `gia` int(10) NOT NULL,
  `soluong` int(2) NOT NULL,
  `ngaydathang` date NOT NULL DEFAULT current_timestamp(),
  `trangthaidonhang` varchar(50) NOT NULL,
  `trangthaithanhtoan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id_giohang` varchar(20) NOT NULL,
  `tennguoidung` varchar(20) NOT NULL,
  `id_sanpham` varchar(20) NOT NULL,
  `gia` varchar(20) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_nguoidung` varchar(20) NOT NULL,
  `tennguoidung` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matkhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` varchar(20) NOT NULL,
  `ten_sanpham` varchar(250) NOT NULL,
  `gia` int(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thongtinchitiet_sanpham` varchar(1000) NOT NULL,
  `trangthai_sanpham` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tinnhan`
--

CREATE TABLE `tinnhan` (
  `id_tinnhan` varchar(20) NOT NULL,
  `id_nguoidung` varchar(20) NOT NULL,
  `ten_tinnhan` varchar(50) NOT NULL,
  `email_nguoidung` varchar(50) NOT NULL,
  `chude_tinnhan` varchar(50) NOT NULL,
  `noidung_tinnhan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhsachyeuthich`
--
ALTER TABLE `danhsachyeuthich`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id_giohang`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_nguoidung`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Indexes for table `tinnhan`
--
ALTER TABLE `tinnhan`
  ADD PRIMARY KEY (`id_tinnhan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
