-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2016 at 01:04 PM
-- Server version: 5.6.27-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ketoan-2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Chi_tiet_phieu_ban`
--

CREATE TABLE IF NOT EXISTS `Chi_tiet_phieu_ban` (
`so_pb` int(11) NOT NULL,
  `ma_ts` int(11) DEFAULT NULL,
  `tk_doi_ung` int(11) DEFAULT NULL,
  `so_tien` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Chi_tiet_phieu_mua`
--

CREATE TABLE IF NOT EXISTS `Chi_tiet_phieu_mua` (
`so_pm` int(11) NOT NULL,
  `ma_ts` int(11) DEFAULT NULL,
  `tk_doi_ung` int(11) DEFAULT NULL,
  `so_tien` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Khach_hang`
--

CREATE TABLE IF NOT EXISTS `Khach_hang` (
`ma_kh` int(11) NOT NULL,
  `ten_kh` varchar(45) DEFAULT NULL,
  `dia_chi` varchar(45) DEFAULT NULL,
  `ma_so_thue` varchar(45) DEFAULT NULL,
  `so_tai_khoan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Khach_hang`
--

INSERT INTO `Khach_hang` (`ma_kh`, `ten_kh`, `dia_chi`, `ma_so_thue`, `so_tai_khoan`) VALUES
(5, 'Lê Văn Duyệt', 'Linh Trung', '34533345091', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `Kho`
--

CREATE TABLE IF NOT EXISTS `Kho` (
`ma_kho` int(11) NOT NULL,
  `ten_kho` varchar(45) DEFAULT NULL,
  `dia_chi` varchar(45) DEFAULT NULL,
  `sdt` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Kho`
--

INSERT INTO `Kho` (`ma_kho`, `ten_kho`, `dia_chi`, `sdt`) VALUES
(1, 'Cửa hàng số 1', '92/12 đường số 3,p9, q5, tp HCM', '096212341234'),
(2, 'Cửa hàng số 2', '92/12 đường số 3,p9, q5, tp HCM', '096212341234'),
(3, 'Cửa hàng số 3', '92/12 đường số 3,p9, q5, tp HCM', '096212341234'),
(4, 'Cửa hàng số 4', '92/12 đường số 3,p9, q5, tp HCM', '096212341234'),
(5, 'Cửa hàng số 5', '92/12 đường số 3,p9, q5, tp HCM', '096212341234'),
(6, 'Cửa hàng số 6', '92/12 đường số 3,p9, q5, tp HCM', '096212341234');

-- --------------------------------------------------------

--
-- Table structure for table `Loai_tai_san`
--

CREATE TABLE IF NOT EXISTS `Loai_tai_san` (
`ma_lts` int(11) NOT NULL,
  `ten_loai` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Loai_tai_san`
--

INSERT INTO `Loai_tai_san` (`ma_lts`, `ten_loai`) VALUES
(1, 'Văn Phòng Phẩm'),
(2, 'Nhà cửa, vật kiến trúc'),
(3, 'Máy móc thiết bị'),
(5, 'Phương tiện vận tải truyền dẫn');

-- --------------------------------------------------------

--
-- Table structure for table `Phieu_ban_ts`
--

CREATE TABLE IF NOT EXISTS `Phieu_ban_ts` (
`so_pb` int(11) NOT NULL,
  `ngay_ban` varchar(45) DEFAULT NULL,
  `so_hoa_don` varchar(45) DEFAULT NULL,
  `ngay_hoa_don` varchar(45) DEFAULT NULL,
  `loai_hoa_don` varchar(45) DEFAULT NULL,
  `thue_suat` varchar(45) DEFAULT NULL,
  `ma_kh` int(11) DEFAULT NULL,
  `ma_tk` int(11) DEFAULT NULL,
  `ma_kho` int(11) DEFAULT NULL,
  `ma_nvc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Phieu_mua_ts`
--

CREATE TABLE IF NOT EXISTS `Phieu_mua_ts` (
`so_pm` int(11) NOT NULL,
  `so_phieu` varchar(50) NOT NULL,
  `ngay_lap` date DEFAULT NULL,
  `ngay_su_dung` date DEFAULT NULL,
  `so_hoa_son` int(11) DEFAULT NULL,
  `ngay_phat_hanh_hd` date DEFAULT NULL,
  `loai_hoa_don` varchar(45) DEFAULT NULL,
  `ly_do` varchar(255) NOT NULL,
  `thue_suat` float DEFAULT NULL,
  `ma_kh` int(11) DEFAULT NULL,
  `ma_tk_chinh` int(11) DEFAULT NULL,
  `ma_kho` int(11) DEFAULT NULL,
  `ma_nvc` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Phieu_mua_ts`
--

INSERT INTO `Phieu_mua_ts` (`so_pm`, `so_phieu`, `ngay_lap`, `ngay_su_dung`, `so_hoa_son`, `ngay_phat_hanh_hd`, `loai_hoa_don`, `ly_do`, `thue_suat`, `ma_kh`, `ma_tk_chinh`, `ma_kho`, `ma_nvc`) VALUES
(1, '', '2016-05-03', '2016-05-10', 1, '2016-05-11', 'đdd', 'đd', 76, 5, 112, 1, 5),
(3, '', '2016-05-11', '2016-05-18', NULL, NULL, NULL, '', NULL, 5, 111, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Tai_khoan`
--

CREATE TABLE IF NOT EXISTS `Tai_khoan` (
`ma_tk` int(11) NOT NULL,
  `ten_tk` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2114 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Tai_khoan`
--

INSERT INTO `Tai_khoan` (`ma_tk`, `ten_tk`) VALUES
(111, 'Tiền mặt'),
(112, 'Tiền gửi ngân hàng'),
(211, 'Tài sản cố định hữu hình'),
(511, 'Doanh Thu Bán'),
(2111, 'Nhà cửa, vật kiến trúc'),
(2112, 'Máy móc thiết bị'),
(2113, 'Phương tiện vận tải truyền dẫn');

-- --------------------------------------------------------

--
-- Table structure for table `Tai_san`
--

CREATE TABLE IF NOT EXISTS `Tai_san` (
`ma_ts` int(11) NOT NULL,
  `ten_ts` varchar(45) DEFAULT NULL,
  `dvt` varchar(45) DEFAULT NULL,
  `nguyen_gia` int(11) DEFAULT NULL,
  `so_nam_khau_hao` int(11) DEFAULT NULL,
  `ma_lts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Chi_tiet_phieu_ban`
--
ALTER TABLE `Chi_tiet_phieu_ban`
 ADD PRIMARY KEY (`so_pb`), ADD KEY `fk_Chi_tiet_phieu_ban_2_idx` (`ma_ts`), ADD KEY `fk_Chi_tiet_phieu_ban_3_idx` (`tk_doi_ung`);

--
-- Indexes for table `Chi_tiet_phieu_mua`
--
ALTER TABLE `Chi_tiet_phieu_mua`
 ADD PRIMARY KEY (`so_pm`), ADD KEY `fk_Chi_tiet_phieu_mua_2_idx` (`ma_ts`), ADD KEY `fk_Chi_tiet_phieu_mua_3_idx` (`tk_doi_ung`);

--
-- Indexes for table `Khach_hang`
--
ALTER TABLE `Khach_hang`
 ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `Kho`
--
ALTER TABLE `Kho`
 ADD PRIMARY KEY (`ma_kho`);

--
-- Indexes for table `Loai_tai_san`
--
ALTER TABLE `Loai_tai_san`
 ADD PRIMARY KEY (`ma_lts`);

--
-- Indexes for table `Phieu_ban_ts`
--
ALTER TABLE `Phieu_ban_ts`
 ADD PRIMARY KEY (`so_pb`), ADD KEY `fk_Phieu_ban_ts_1_idx` (`ma_kh`), ADD KEY `fk_Phieu_ban_ts_2_idx` (`ma_tk`), ADD KEY `fk_Phieu_ban_ts_3_idx` (`ma_kho`), ADD KEY `fk_phieu_ban_nvc` (`ma_nvc`);

--
-- Indexes for table `Phieu_mua_ts`
--
ALTER TABLE `Phieu_mua_ts`
 ADD PRIMARY KEY (`so_pm`), ADD KEY `fk_Phieu_mua_ts_1_idx` (`ma_kh`), ADD KEY `fk_Phieu_mua_ts_2_idx` (`ma_tk_chinh`), ADD KEY `fk_Phieu_mua_ts_3_idx` (`ma_kho`), ADD KEY `fk_phieu_mua_nvc` (`ma_nvc`);

--
-- Indexes for table `Tai_khoan`
--
ALTER TABLE `Tai_khoan`
 ADD PRIMARY KEY (`ma_tk`);

--
-- Indexes for table `Tai_san`
--
ALTER TABLE `Tai_san`
 ADD PRIMARY KEY (`ma_ts`), ADD KEY `fk_Tai_san_1_idx` (`ma_lts`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Chi_tiet_phieu_ban`
--
ALTER TABLE `Chi_tiet_phieu_ban`
MODIFY `so_pb` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Chi_tiet_phieu_mua`
--
ALTER TABLE `Chi_tiet_phieu_mua`
MODIFY `so_pm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Khach_hang`
--
ALTER TABLE `Khach_hang`
MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Kho`
--
ALTER TABLE `Kho`
MODIFY `ma_kho` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Loai_tai_san`
--
ALTER TABLE `Loai_tai_san`
MODIFY `ma_lts` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Phieu_ban_ts`
--
ALTER TABLE `Phieu_ban_ts`
MODIFY `so_pb` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Phieu_mua_ts`
--
ALTER TABLE `Phieu_mua_ts`
MODIFY `so_pm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Tai_khoan`
--
ALTER TABLE `Tai_khoan`
MODIFY `ma_tk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2114;
--
-- AUTO_INCREMENT for table `Tai_san`
--
ALTER TABLE `Tai_san`
MODIFY `ma_ts` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Chi_tiet_phieu_ban`
--
ALTER TABLE `Chi_tiet_phieu_ban`
ADD CONSTRAINT `fk_Chi_tiet_phieu_ban_1` FOREIGN KEY (`so_pb`) REFERENCES `Phieu_ban_ts` (`so_pb`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Chi_tiet_phieu_ban_2` FOREIGN KEY (`ma_ts`) REFERENCES `Tai_san` (`ma_ts`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Chi_tiet_phieu_ban_3` FOREIGN KEY (`tk_doi_ung`) REFERENCES `Tai_khoan` (`ma_tk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Chi_tiet_phieu_mua`
--
ALTER TABLE `Chi_tiet_phieu_mua`
ADD CONSTRAINT `Chi_tiet_phieu_mua_ibfk_1` FOREIGN KEY (`so_pm`) REFERENCES `Phieu_mua_ts` (`so_pm`),
ADD CONSTRAINT `Chi_tiet_phieu_mua_ibfk_2` FOREIGN KEY (`ma_ts`) REFERENCES `Tai_san` (`ma_ts`),
ADD CONSTRAINT `fk_Chi_tiet_phieu_mua_3` FOREIGN KEY (`tk_doi_ung`) REFERENCES `Tai_khoan` (`ma_tk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Phieu_ban_ts`
--
ALTER TABLE `Phieu_ban_ts`
ADD CONSTRAINT `fk_Phieu_ban_ts_1` FOREIGN KEY (`ma_kh`) REFERENCES `Khach_hang` (`ma_kh`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Phieu_ban_ts_2` FOREIGN KEY (`ma_tk`) REFERENCES `Tai_khoan` (`ma_tk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Phieu_ban_ts_3` FOREIGN KEY (`ma_kho`) REFERENCES `Kho` (`ma_kho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_phieu_ban_nvc` FOREIGN KEY (`ma_nvc`) REFERENCES `Khach_hang` (`ma_kh`);

--
-- Constraints for table `Phieu_mua_ts`
--
ALTER TABLE `Phieu_mua_ts`
ADD CONSTRAINT `fk_Phieu_mua_ts_1` FOREIGN KEY (`ma_kh`) REFERENCES `Khach_hang` (`ma_kh`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Phieu_mua_ts_2` FOREIGN KEY (`ma_tk_chinh`) REFERENCES `Tai_khoan` (`ma_tk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Phieu_mua_ts_3` FOREIGN KEY (`ma_kho`) REFERENCES `Kho` (`ma_kho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_phieu_mua_nvc` FOREIGN KEY (`ma_nvc`) REFERENCES `Khach_hang` (`ma_kh`);

--
-- Constraints for table `Tai_san`
--
ALTER TABLE `Tai_san`
ADD CONSTRAINT `fk_Tai_san_1` FOREIGN KEY (`ma_lts`) REFERENCES `Loai_tai_san` (`ma_lts`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
