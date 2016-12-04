-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2016 at 08:12 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter1`
--

-- --------------------------------------------------------

--
-- Table structure for table `diemdanh`
--

CREATE TABLE IF NOT EXISTS `diemdanh` (
  `DD_MA` int(11) NOT NULL,
  `HT_MA` int(11) NOT NULL,
  `DD_NGAYVANG` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giaovien`
--

CREATE TABLE IF NOT EXISTS `giaovien` (
  `GV_MA` int(11) NOT NULL,
  `GV_TEN` text COLLATE utf8_unicode_ci NOT NULL,
  `GV_THONGTIN` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`GV_MA`, `GV_TEN`, `GV_THONGTIN`) VALUES
(3, 'trần', '<p>sdfsdf</p>\r\n'),
(4, 'toàn', ''),
(5, 'khánh', '');

-- --------------------------------------------------------

--
-- Table structure for table `hocphi`
--

CREATE TABLE IF NOT EXISTS `hocphi` (
  `HP_MA` int(11) NOT NULL,
  `HT_MA` int(11) NOT NULL,
  `HP_TIENDONG` int(11) NOT NULL,
  `HP_NGAYDONG` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoctap`
--

CREATE TABLE IF NOT EXISTS `hoctap` (
  `HT_MA` int(11) NOT NULL,
  `HV_MA` int(11) NOT NULL,
  `LH_MA` int(11) NOT NULL,
  `HT_NGAYBATDAU` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoctap`
--

INSERT INTO `hoctap` (`HT_MA`, `HV_MA`, `LH_MA`, `HT_NGAYBATDAU`) VALUES
(1, 6, 1, '2016-06-05'),
(2, 5, 1, '2016-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `hocvien`
--

CREATE TABLE IF NOT EXISTS `hocvien` (
  `HV_MA` int(11) NOT NULL,
  `HV_TEN` text COLLATE utf8_unicode_ci NOT NULL,
  `HV_SDT` text COLLATE utf8_unicode_ci,
  `HV_DIACHI` text COLLATE utf8_unicode_ci,
  `HV_EMAIL` text COLLATE utf8_unicode_ci,
  `HV_NGAYSINH` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocvien`
--

INSERT INTO `hocvien` (`HV_MA`, `HV_TEN`, `HV_SDT`, `HV_DIACHI`, `HV_EMAIL`, `HV_NGAYSINH`) VALUES
(5, 'abcs sdkj sdfk ', '', '', '', '0000-00-00'),
(6, 'abc', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ketquahoctap`
--

CREATE TABLE IF NOT EXISTS `ketquahoctap` (
  `KT_MA` int(11) NOT NULL,
  `HT_MA` int(11) NOT NULL,
  `KQ_DIEM` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khoahoc`
--

CREATE TABLE IF NOT EXISTS `khoahoc` (
  `KH_MA` int(11) NOT NULL,
  `KH_TEN` text COLLATE utf8_unicode_ci NOT NULL,
  `KH_HOCPHI` int(11) NOT NULL,
  `KH_NOIDUNG` text COLLATE utf8_unicode_ci,
  `KH_THOILUONG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoahoc`
--

INSERT INTO `khoahoc` (`KH_MA`, `KH_TEN`, `KH_HOCPHI`, `KH_NOIDUNG`, `KH_THOILUONG`) VALUES
(1, 'toeic', 2000000, '', 0),
(3, 'giao tiep', 3000000, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kythi`
--

CREATE TABLE IF NOT EXISTS `kythi` (
  `KT_MA` int(11) NOT NULL,
  `KT_TEN` text COLLATE utf8_unicode_ci NOT NULL,
  `KT_NGAYTHI` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kythi`
--

INSERT INTO `kythi` (`KT_MA`, `KT_TEN`, `KT_NGAYTHI`) VALUES
(1, 'abcsgdf slkjgfd gfld', '2016-06-15'),
(3, 'dfgfdg', '2016-06-17'),
(4, 'Toàn', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `lophoc`
--

CREATE TABLE IF NOT EXISTS `lophoc` (
  `LH_MA` int(11) NOT NULL,
  `KH_MA` int(11) NOT NULL,
  `GV_MA` int(11) NOT NULL,
  `LH_TEN` text COLLATE utf8_unicode_ci NOT NULL,
  `LH_SISO` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lophoc`
--

INSERT INTO `lophoc` (`LH_MA`, `KH_MA`, `GV_MA`, `LH_TEN`, `LH_SISO`) VALUES
(1, 3, 4, 'aec1', 2),
(3, 1, 3, 'trankhanhtian', 23);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE IF NOT EXISTS `nguoidung` (
  `TENDANGNHAP` int(11) NOT NULL,
  `MATKHAU` text COLLATE utf8_unicode_ci NOT NULL,
  `LOAI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`TENDANGNHAP`, `MATKHAU`, `LOAI`) VALUES
(123456, 'e10adc3949ba59abbe56e057f20f883e', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD PRIMARY KEY (`DD_MA`),
  ADD KEY `FK_THEODOI` (`HT_MA`);

--
-- Indexes for table `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`GV_MA`);

--
-- Indexes for table `hocphi`
--
ALTER TABLE `hocphi`
  ADD PRIMARY KEY (`HP_MA`),
  ADD KEY `FK_DONGHOCPHI` (`HT_MA`);

--
-- Indexes for table `hoctap`
--
ALTER TABLE `hoctap`
  ADD PRIMARY KEY (`HT_MA`),
  ADD KEY `FK_DANGKY` (`LH_MA`),
  ADD KEY `FK_HOC` (`HV_MA`);

--
-- Indexes for table `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`HV_MA`);

--
-- Indexes for table `ketquahoctap`
--
ALTER TABLE `ketquahoctap`
  ADD PRIMARY KEY (`KT_MA`,`HT_MA`),
  ADD KEY `FK_KETQUAHOCTAP3` (`HT_MA`);

--
-- Indexes for table `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`KH_MA`);

--
-- Indexes for table `kythi`
--
ALTER TABLE `kythi`
  ADD PRIMARY KEY (`KT_MA`);

--
-- Indexes for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`LH_MA`),
  ADD KEY `FK_GIANGDAY` (`GV_MA`),
  ADD KEY `FK_THUOC` (`KH_MA`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`TENDANGNHAP`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD CONSTRAINT `FK_THEODOI` FOREIGN KEY (`HT_MA`) REFERENCES `hoctap` (`HT_MA`);

--
-- Constraints for table `hocphi`
--
ALTER TABLE `hocphi`
  ADD CONSTRAINT `FK_DONGHOCPHI` FOREIGN KEY (`HT_MA`) REFERENCES `hoctap` (`HT_MA`);

--
-- Constraints for table `hoctap`
--
ALTER TABLE `hoctap`
  ADD CONSTRAINT `FK_DANGKY` FOREIGN KEY (`LH_MA`) REFERENCES `lophoc` (`LH_MA`),
  ADD CONSTRAINT `FK_HOC` FOREIGN KEY (`HV_MA`) REFERENCES `hocvien` (`HV_MA`);

--
-- Constraints for table `ketquahoctap`
--
ALTER TABLE `ketquahoctap`
  ADD CONSTRAINT `FK_KETQUAHOCTAP2` FOREIGN KEY (`KT_MA`) REFERENCES `kythi` (`KT_MA`),
  ADD CONSTRAINT `FK_KETQUAHOCTAP3` FOREIGN KEY (`HT_MA`) REFERENCES `hoctap` (`HT_MA`);

--
-- Constraints for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `FK_GIANGDAY` FOREIGN KEY (`GV_MA`) REFERENCES `giaovien` (`GV_MA`),
  ADD CONSTRAINT `FK_THUOC` FOREIGN KEY (`KH_MA`) REFERENCES `khoahoc` (`KH_MA`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
