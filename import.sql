-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2016 at 01:28 PM
-- Server version: 5.6.27-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ketoan-2`
--
CREATE DATABASE IF NOT EXISTS `ketoan-3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ketoan-3`;

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `f_getNewSmallestID`() RETURNS int(11)
BEGIN
	declare id int;
    set id = (select max(so_pm)+ 1 from Phieu_mua_ts);
return id;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `f_getNextID`(cur_id int) RETURNS int(11)
begin
	declare next_id int;
	if(cur_id >= all (select so_pm from Phieu_mua_ts)) then

		set next_id = -1;
	else 
		set next_id = cur_id + 1;
		
		going_next: WHILE next_id not in (select so_pm from Phieu_mua_ts) DO
			SET next_id = next_id + 1;
		END WHILE going_next;
	end if;
RETURN next_id;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `f_getPrevID`(`cur_id` INT) RETURNS int(11)
BEGIN
	declare prev_id int;
	if(cur_id <= all (select so_pm from Phieu_mua_ts)) then

		set prev_id = -1;
	else 
		set prev_id = cur_id - 1;
		

		    going_next: WHILE prev_id not in (select so_pm from Phieu_mua_ts) DO
			    SET prev_id = prev_id - 1;
		    END WHILE going_next;
	end if;
	RETURN prev_id;
END$$

DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Khach_hang`
--

INSERT INTO `Khach_hang` (`ma_kh`, `ten_kh`, `dia_chi`, `ma_so_thue`, `so_tai_khoan`) VALUES
(4, 'Nguyễn Văn A', 'Linh Trung, Thủ Đức', '0000000', '000000000'),
(5, 'Lê Văn Duyệt', 'Linh Trung', '34533345091', '123456789'),
(6, 'Nguyễn Văn X', 'p7, Q3, HCM', '12453', '2356543');

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
  `ten_loai` varchar(45) DEFAULT NULL,
  `ma_tk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Loai_tai_san`
--

INSERT INTO `Loai_tai_san` (`ma_lts`, `ten_loai`, `ma_tk`) VALUES
(1, 'Văn Phòng Phẩm', 211),
(2, 'Nhà cửa, vật kiến trúc', 2111),
(3, 'Máy móc thiết bị', 2112),
(5, 'Phương tiện vận tải truyền dẫn', 2113),
(6, 'Tài sản cố định hữu hình', 211),
(7, 'Phương tiện vận tải truyền dẫn', 2114);

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Phieu_mua_ts`
--


-- (38, 'NTSA00038-05-16', NULL, NULL, NULL, NULL, '', '', 10, 4, 111, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Tai_khoan`
--

CREATE TABLE IF NOT EXISTS `Tai_khoan` (
`ma_tk` int(11) NOT NULL,
  `ten_tk` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2115 DEFAULT CHARSET=utf8;

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
(2113, 'Phương tiện vận tải truyền dẫn'),
(2114, 'Phương tiện vận tải truyền dẫn');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

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
 ADD PRIMARY KEY (`ma_lts`), ADD KEY `ma_tk` (`ma_tk`);

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
MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Kho`
--
ALTER TABLE `Kho`
MODIFY `ma_kho` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Loai_tai_san`
--
ALTER TABLE `Loai_tai_san`
MODIFY `ma_lts` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Phieu_ban_ts`
--
ALTER TABLE `Phieu_ban_ts`
MODIFY `so_pb` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Phieu_mua_ts`
--
ALTER TABLE `Phieu_mua_ts`
MODIFY `so_pm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `Tai_khoan`
--
ALTER TABLE `Tai_khoan`
MODIFY `ma_tk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2115;
--
-- AUTO_INCREMENT for table `Tai_san`
--
ALTER TABLE `Tai_san`
MODIFY `ma_ts` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
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
-- Constraints for table `Loai_tai_san`
--
ALTER TABLE `Loai_tai_san`
ADD CONSTRAINT `Loai_tai_san_ibfk_1` FOREIGN KEY (`ma_tk`) REFERENCES `Tai_khoan` (`ma_tk`);

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



insert into Tai_san values (1,'MMTB 40 Máy r?a Polyme m?i','Cái',25000000,5,3);
insert into Tai_san values (2,'MMTB 41 Máy ti?n l?n','Cái',56700000,3,3);
insert into Tai_san values (3,'MMTB 42 Máy ti?n nh?','Cái',12000000,3,3);
insert into Tai_san values (4,'MMTB 43 Máy b? h?p l?n','Cái',18000000,3,3);
insert into Tai_san values (5,'MMTB 45 Máy b?i','Cái',19950000,3,3);
insert into Tai_san values (6,'MMTB 46 Máy dán l??i gà','Cái',12840000,3,3);
insert into Tai_san values (7,'MMTB 47 N?i h?i 1.500 kg/h','Cái',252442000,3,3);
insert into Tai_san values (8,'MMTB 48 Máy d?n sóng 3','Cái',1003998206,10,3);
insert into Tai_san values (9,'MMTB 49 Máy b? h?p (1,15 x 0,18 )','Cái',61904761,5,3);
insert into Tai_san values (10,'MMTB 50 Máy c?t dây m?i','Cái',27197143,5,3);
insert into Tai_san values (11,'MMTB 51 Máy ch?p góc 1','Cái',18000000,5,3);
insert into Tai_san values (12,'MMTB 52 Máy ch?p góc 2','Cái',18000000,5,3);
insert into Tai_san values (13,'MMTB 53 Máy cán l?n 2','Cái',18000000,5,3);
insert into Tai_san values (14,'MMTB 54 Máy cán l?n 3','Cái',18000000,5,3);
insert into Tai_san values (15,'MMTB 55 Máy h? b?i thùng in','Cái',10000000,5,3);
insert into Tai_san values (16,'MMTB.001 Bình ?i?n 3 pha 250 KV','Cái',37352767,7,3);
insert into Tai_san values (17,'MMTB.013 Tr?m 3FA/250KVA Cái S?n','Cái',91352320,7,3);
insert into Tai_san values (18,'MMTBI.001 Máy c?t gi?y Couche','Cái',30000000,5,3);
insert into Tai_san values (19,'MMTBS 39 Máy Photo Polyme m?i','Cái',30000000,5,3);
insert into Tai_san values (20,'MMTBS.022 Máy mâm nhi?t D?n Sóng 2','Cái',374054770,5,3);
insert into Tai_san values (21,'MMTBS.023 Máy ?óng ghim','Cái',21631000,5,3);
insert into Tai_san values (22,'MMTBS.024 Máy c?t khe','Cái',180000000,5,3);
insert into Tai_san values (23,'MMTBS.028 ??u máy sóng nhuy?n','Cái',417100000,5,3);
insert into Tai_san values (24,'MMTBS.029 Máy C?t CV 100','Cái',23108571,5,3);
insert into Tai_san values (25,'MMTBS.31 Máy ?óng k?m','Cái',22783500,5,3);
insert into Tai_san values (26,'MMTBS.33 Xe nâng tay gi?y','Cái',22424250,5,3);
insert into Tai_san values (27,'MMTBS.34 Máy in Flexo 2 màu','Cái',560580000,7,3);
insert into Tai_san values (28,'MMTBS.35 B? dao c?t khe ?ã qua s? d?ng','Cái',15950000,5,3);
insert into Tai_san values (29,'MMTBS.36 Máy c?n l?n ?ã qua s? d?ng','Cái',116100000,5,3);
insert into Tai_san values (30,'MMTBS.38 Máy c?t dây ?ài Loan','Cái',25552419,5,3);
insert into Tai_san values (31,'MMTBX.011 Máy seo gi?y','Cái',669330333,5,3);
insert into Tai_san values (32,'MMTBX.012 N?i h?i n??c+H? th?ng x? lý n??c','Cái',211795000,5,3);
insert into Tai_san values (33,'MMTBX.030 N?i h?i than ?á 2400kg/gi?','Cái',580280000,7,3);
insert into Tai_san values (34,'MMTBX.031 Thi?t b? c?n ?i?n t? Sotpac','Cái',15442000,3,3);
insert into Tai_san values (35,'MMTBX.038 Máy xeo gi?y 2','Cái',1777331877,10,3);
insert into Tai_san values (36,'MMTBX.039 B?ng t?i nghiêng 0,8 x 8 m','Cái',21600000,5,3);
insert into Tai_san values (37,'MMTBX.040 Máy chia cu?n gi?y xeo','Cái',26066056,5,3);
insert into Tai_san values (38,'MMTBX.041 N?i h?i than ?á 3000kg/gi?','Cái',418379000,5,3);
insert into Tai_san values (39,'MMTMX.036 Tr?m Bi?n th? 250 KVA','Cái',57100000,7,3);
insert into Tai_san values (40,'PTVT 009 Xe Mítsubíshi Jolie 65M 2122','Cái',428761490,10,5);
insert into Tai_san values (41,'PTVT.001 Xe T?i 65M 1310','Cái',93124100,6,5);
insert into Tai_san values (42,'PTVT.002 Xe t?i 65K 1338','Cái',60000000,6,5);
insert into Tai_san values (43,'PTVT.004 Xe ôtô  4sits 65M 0642','Cái',16000000,5,5);
insert into Tai_san values (44,'PTVT.005 Xe t?i 65M 1413','Cái',96900000,6,5);
insert into Tai_san values (45,'PTVT.006 Máy xe Kia ?ã qua s? d?ng','Cái',19000000,6,5);
insert into Tai_san values (46,'TBQL.003 Máy vi tính +Máy in HP 1150','Cái',18664874,3,7);
insert into Tai_san values (47,'TBQL.004 Máy Likom XP+View Sonic+ in Laser','Cái',23214206,5,7);
insert into Tai_san values (48,'TBQL.005 Cân bàn ?i?n t? (3t?n) DI 691','Cái',16000000,5,7);
insert into Tai_san values (49,'TBQL.006 Máy photo KM 1620','Cái',25777273,5,7);
insert into Tai_san values (50,'VLKT.002 ???ng n?i b? Cái S?n HB','Cái',61597143,5,2);
insert into Tai_san values (51,'VLKT.004 Khu Nhà v? sinh','Cái',47061583,5,2);
insert into Tai_san values (52,'VLKT.007 B?p ?n t?p th?','Cái',56658663,5,2);
insert into Tai_san values (53,'VLKTS.006 Nhà X??ng d?n sóng 2','Cái',508631642,10,2);
insert into Tai_san values (54,'VLKTS.007 V?n phòng và nhà x??ng d?n sóng 3','Cái',237054597,6,2);
insert into Tai_san values (55,'VLKTX 011 Nhà x??ng xeo gi?y 2','Cái',517761372,6,2);
insert into Tai_san values (56,'VLKTX 012 H? b?t gi?y xeo','Cái',19475964,5,2);
insert into Tai_san values (57,'VLKTX.001 V?n Phòng nhà x??ng gi?y seo','Cái',483694631,10,2);
insert into Tai_san values (58,'VLKTX.005 Kho Than ?á','Cái',23796493,5,2);
insert into Tai_san values (59,'VLKTX.009 Kho III ch?a gi?y','Cái',297128342,5,2);
insert into Tai_san values (60,'VLKTX.010 H? ch?a gi?y nghi?n','Cái',38042955,5,2);
insert into Tai_san values (61,'MMTBX.042 N?i h?i than ?á 3000kg/gi?(No:2)','Cái',510000000,5,3);
insert into Tai_san values (62,'MMTBX.043 B? góp h?i c?a n?i h?i 3000kg/g( No:2)','Cái',37000000,5,3);
insert into Tai_san values (63,'MMTB 56 Máy ch?p thùng (2,4m x1,2m)','Cái',152000000,5,3);
insert into Tai_san values (64,'MMTB 57 Máy ?óng Ghim 2','Cái',23952381,5,3);
insert into Tai_san values (65,'MMTB 58 Máy cán l?n 4','Cái',97000000,5,3);
insert into Tai_san values (66,'PTVT 010 Xe nâng Toyota 2,8 T?n','Cái',55000000,5,5);



insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_tk_chinh, ma_kho, ma_nvc) values ('1','NTS000001-03-04',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('2','NTS000002-10-04',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('3','NTS000003-10-04',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('4','NTS000004-10-04',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('5','NTS000005-10-04',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('6','NTS000006-10-04',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('7','NTS000007-12-04',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('8','NTS000008-12-04',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('9','NTS000009-05-05',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('10','NTS000010-06-05',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('11','NTS000011-06-05',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('12','NTS000012-06-05',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('13','NTS000013-06-05',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('14','NTS000014-06-05',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('15','NTS000015-08-05',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('16','NTS000016-01-00',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('17','NTS000017-02-01',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('18','NTS000018-08-01',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('19','NTS000019-09-03',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('20','NTS000020-01-01',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('21','NTS000021-12-01',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('22','NTS000022-01-02',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('23','NTS000023-03-02',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('24','NTS000024-03-02',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('25','NTS000025-02-03',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('26','NTS000026-04-03',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('27','NTS000027-05-03',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('28','NTS000028-05-03',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('29','NTS000029-06-03',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('30','NTS000030-07-03',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('31','NTS000031-02-01',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('32','NTS000032-02-01',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('33','NTS000033-11-02',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('34','NTS000034-03-03',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('35','NTS000035-07-03',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('36','NTS000036-11-04',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('37','NTS000037-02-05',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('38','NTS000038-11-05',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('39','NTS000039-05-03',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('40','NTS000040-05-05',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('41','NTS000041-06-02',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('42','NTS000042-07-02',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('43','NTS000043-09-02',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('44','NTS000044-09-02',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('45','NTS000045-03-03',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('46','NTS000046-12-06',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('47','NTS000047-03-04',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('48','NTS000048-08-03',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('49','NTS000049-11-04',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('50','NTS000050-02-01',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('51','NTS000051-09-01',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('52','NTS000052-02-02',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('53','NTS000053-10-01',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('54','NTS000054-01-04',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('55','NTS000055-12-03',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('56','NTS000056-06-05',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('57','NTS000057-02-01',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('58','NTS000058-02-01',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('59','NTS000059-05-02',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('60','NTS000060-10-02',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('61','NTSB00001-06-06',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('62','NTSB00001-08-06',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('63','NTSC00001-09-06',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('64','NTSC00001-10-06',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('65','NTSC00001-10-06',10,5, 1, 6);
insert into Phieu_mua_ts(so_pm,so_phieu,thue_suat,ma_kh, ma_kho, ma_nvc) values ('66','NTSC00001-12-06',10,5, 1, 6);



insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (1,1,2112,25000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (2,2,2112,56700000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (3,3,2112,12000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (4,4,2112,18000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (5,5,2112,19950000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (6,6,2112,12840000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (7,7,2112,252442000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (8,8,2112,1003998206);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (9,9,2112,61904761);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (10,10,2112,27197143);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (11,11,2112,18000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (12,12,2112,18000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (13,13,2112,18000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (14,14,2112,18000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (15,15,2112,10000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (16,16,2112,37352767);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (17,17,2112,91352320);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (18,18,2112,30000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (19,19,2112,30000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (20,20,2112,374054770);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (21,21,2112,21631000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (22,22,2112,180000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (23,23,2112,417100000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (24,24,2112,23108571);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (25,25,2112,22783500);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (26,26,2112,22424250);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (27,27,2112,560580000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (28,28,2112,15950000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (29,29,2112,116100000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (30,30,2112,25552419);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (31,31,2112,669330333);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (32,32,2112,211795000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (33,33,2112,580280000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (34,34,2112,15442000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (35,35,2112,1777331877);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (36,36,2112,21600000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (37,37,2112,26066056);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (38,38,2112,418379000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (39,39,2112,57100000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (40,40,2113,428761490);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (41,41,2113,93124100);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (42,42,2113,60000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (43,43,2113,16000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (44,44,2113,96900000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (45,45,2113,19000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (46,46,2114,18664874);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (47,47,2114,23214206);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (48,48,2114,16000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (49,49,2114,25777273);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (50,50,2111,61597143);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (51,51,2111,47061583);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (52,52,2111,56658663);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (53,53,2111,508631642);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (54,54,2111,237054597);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (55,55,2111,517761372);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (56,56,2111,19475964);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (57,57,2111,483694631);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (58,58,2111,23796493);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (59,59,2111,297128342);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (60,60,2111,38042955);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (61,61,2112,510000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (62,62,2112,37000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (63,63,2112,152000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (64,64,2112,23952381);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (65,65,2112,97000000);
insert into Chi_tiet_phieu_mua(so_pm,ma_ts,tk_doi_ung,so_tien) values (66,66,2113,55000000);


