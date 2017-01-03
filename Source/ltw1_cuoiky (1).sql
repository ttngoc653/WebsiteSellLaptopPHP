-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 03, 2017 lúc 04:01 SA
-- Phiên bản máy phục vụ: 5.7.14
-- Phiên bản PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ltw1_cuoiky`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_man_hinh`
--

CREATE TABLE `cart_man_hinh` (
  `tencart` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dungluong` int(11) NOT NULL COMMENT 'GB',
  `thietke` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `an` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_man_hinh`
--

INSERT INTO `cart_man_hinh` (`tencart`, `dungluong`, `thietke`, `an`) VALUES
('Intel&reg; HD Graphics', 0, 'tích hợp với RAM', 0),
('NVIDIA&reg; GeForce&reg; 840M', 2, 'rời (Optimus)', 0),
('Intel&reg; Iris™ Pro Graphics', 0, 'đồ họa tích hợp', 0),
('NVIDIA&reg; GeForce&reg; 920M', 2, 'Cart đồ họa rời', 0),
('AMD Radeon R5 M420', 2, 'Card đồ họa rời', 0),
('NVIDIA GeForce 940MX', 2, 'Card đồ họa rời', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `madh` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluongsp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cpu`
--

CREATE TABLE `cpu` (
  `hangsx` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'ex: intel',
  `congnghe` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'ex: core i7',
  `loai` varchar(8) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'ex: 7200ex',
  `tocdo` float NOT NULL COMMENT 'ex: 3,2(GHz)',
  `thongtinbodem` varchar(40) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL COMMENT 'ex: 8MB L3 cache',
  `tocdotoida` float DEFAULT NULL COMMENT 'ex: 3.2(GHz)',
  `an` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cpu`
--

INSERT INTO `cpu` (`hangsx`, `congnghe`, `loai`, `tocdo`, `thongtinbodem`, `tocdotoida`, `an`) VALUES
('Intel', 'Core i3', '6100', 3.7, '3MB cache', NULL, 0),
('Intel', 'Pentium', 'G3258', 3.2, '3MB cache', 4, 0),
('Intel', 'Core i5', '4690K', 3.5, 'L2 6MB cache', NULL, 0),
('Intel', 'Core i7 Skylake', '6700K', 4, '8MB cache', 5, 0),
('Intel', 'Core i7 Broadwell', '5820K', 3.3, '15MB cache, 28 PCIe', NULL, 0),
('Intel', 'Celeron', 'N3060', 1.6, 'Intel&reg; Smart Cache, 2 MB', 2.48, 0),
('Intel', 'Atom', 'Z3735F', 1.33, 'Intel&reg; Smart Cache, 2 MB', 1.83, 0),
('Intel', 'Pentium', 'N4200', 1.1, '2MB, L2 Cache', 2.5, 0),
('Intel', 'Core 3 Broadwell', '5005U', 2, '3MB, L3 Cache', NULL, 0),
('Intel', 'Core i3 Broadwell', '5020U', 2.2, 'Intel&reg; Smart Cache, 3 MB, L3 Cache', NULL, 0),
('Intel', 'Pentium', 'N3710', 1.6, '2MB, L2 cache', 2.56, 0),
('Intel', 'Core i7 Haswell', '4770HQ', 2.2, 'Intel&reg; Smart Cache, 6 MB', 3.4, 0),
('Intel', 'Core M', 'C.M1.2', 1.2, '4MB, L3 cache', 2.7, 0),
('Intel', 'Core i5 Broadwell', '5257U', 2.7, 'Intel&reg; Smart Cache, 3 MB', 3.1, 0),
('Intel', 'Core i5 Broadwell', '5250U', 1.6, 'Intel&reg; Smart Cache, 3 MB', 2.7, 0),
('Intel', 'Core i7 Skylake', '6500U', 2.5, 'Intel&reg; Smart Cache, 4 MB, L3 Cache', 3.1, 0),
('Intel', 'Core i5 Skylake', '6200U', 2.3, 'Intel&reg; Smart Cache, 3MB', 2.8, 0),
('Intel', 'Core i7 Haswell', '5410U', 2, 'Intel&reg; Smart Cache, 4 MB, L3 Cache', 3.1, 0),
('Intel', 'Core M', 'C.M1.1', 1.1, 'Intel&reg; Smart Cache, 4 MB, L3 Cache', 2.2, 0),
('Intel', 'Core i7 Haswell', '4510U', 2, 'Intel&reg; Smart Cache, 4 MB', 3.1, 0),
('Intel', 'Core i5 Kabylake', '7200U', 2.5, 'Intel&reg; Smart Cache, 3 MB, L3 Cache', 3.1, 0),
('Intel', 'Core i3 Kabylake', '7100U', 2.4, 'Intel&reg; Smart Cache, 3 MB', 2.4, 0),
('Intel', 'Atom', 'Z3735', 1.33, 'Intel&reg; Smart Cache, 2 MB', 1.83, 0),
('Intel', 'Pentium', 'N3700', 1.6, '2 MB', 2.42, 0),
('Intel', 'Core i7 Kabylake', '7500U', 2.7, 'Intel® Smart Cache, 4 MB', 3.5, 0),
('Intel', 'Core i5 Skylake', '6267U', 2.9, 'Intel&reg; Smart Cache, 4 MB', 3.3, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `madh` int(11) NOT NULL,
  `taikhoan` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngaylap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diachinhan` varchar(128) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tongtien` int(11) NOT NULL,
  `dagiao` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_sx`
--

CREATE TABLE `hang_sx` (
  `tenhangsx` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `truso` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `an` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_sx`
--

INSERT INTO `hang_sx` (`tenhangsx`, `truso`, `mota`, `an`) VALUES
('Intel', 'Santa Clara, California, USA', 'Tập đoàn Intel (Integrated Electronics) thành lập năm 1968 tại Santa Clara, California, Hoa Kỳ. Intel sản xuất các sản phẩm như chip vi xử lý cho máy tính, bo mạch chủ, ổ nhớ flash, card mạng và các thiết bị máy tính khác.<br/>Ban đầu, Intel là nhà sản xuất bộ nhớ SRAM và DRAM và đây là sự kiện tiêu biểu đầu tiên cho các nhà sản xuất chip bộ nhớ sau này.', 0),
('Dell', '1 Dell Way, Round Rock, Texas, USA', 'Dell Inc là một công ty đa quốc gia của Hoa Kỳ về phát triển và thương mại hóa công nghệ máy tính có trụ sở tại Round Rock, Texas, Hoa Kỳ. Dell được thành lập năm 1984 do Michael Dell. Đây là công ty có thu nhập lớn thứ 28 tại Hoa Kỳ.', 0),
('Acer', 'Tịch Chỉ, Tân Bắc, Đài Loan', 'Acer Inc. (còn được viết là acer hoặc trước kia là acer) hay Tập đoàn Hoành Kì là tập đoàn đa quốc gia về thiết bị điện tử và phần cứng máy tính của Đài Loan có trụ sở tại Tịch Chỉ, Tân Bắc, Đài Loan.<br/>Các sản phẩm của Acer bao gồm các loại máy tính để bàn và laptop PC, máy tính bảng, server, các thiết bị lưu trữ, màn hình hiển thị, smartphone và các thiết bị ngoại vi. Đồng thời còn cung cấp các thiết bị phục vụ thương mại điện tử cho các doanh nghiệp, chính phủ và người tiêu dùng. Năm 2013, Acer là chiếm thị phần nhà cung cấp máy tính lớn thứ 4 trên thế giới.<br/>Vào đầu những năm 2000, Acer thực hiện mô hình kinh doanh mới, chuyển từ một nhà sản xuất sang thiết kế, tiếp thị và phân phối các sản phẩm, cùng với việc thực hiện quá trình sản xuất qua hợp đồng với các đơn vị sản xuất. Ngoài việc kinh doanh chính của mình, Acer cũng sở hữu chuỗi bán lẻ máy tính đã được nhượng quyền lớn nhất tại Đài Bắc, Đài Loan.', 0),
('Asus', 'Đài Bắc, Đài Loan', 'ASUSTeK Computer Incorporated (ASUS) là một tập đoàn đa quốc gia đặt trụ sở tại Đài Loan chuyên sản xuất các mặt hàng điện tử như bo mạch chủ, máy tính xách tay, máy chủ, điện thoại di động và các sản phẩm máy tính khác. Thường được gọi là với tên thương hiệu là ASUS, công ty được niêm yết trên Sở giao dịch chứng khoán London (LSE:ASKD) và Sở giao dịch chứng khoán Đài Loan (Bản mẫu:TSE). Ngoài ra, ASUS còn sản xuất linh kiện các hãng khác (iPod, MacBook, Alienware,...).', 0),
('Lenovo', 'Bắc Kinh, Trung Quốc và Morrisville, Bắc Carolina, Mỹ', 'Lenovo Group Ltd. là tập đoàn đa quốc gia về công nghệ máy tính có trụ sở chính ở Bắc Kinh, Trung Quốc và Morrisville, Bắc Carolina, Mỹ.[3] Tập đoàn thiết kế, phát triển, sản xuất và bán các sản phẩm như máy tính cá nhân, máy tính bảng, smartphone, các trạm máy tính, server, thiết bị lưu trữ điện tử, phần mềm quản trị IT và ti vi thông minh.', 0),
('Apple', 'Thung Lũng Silicon ở San Francisco, tiểu bang California', 'Apple Inc. là tập đoàn công nghệ máy tính của Mỹ có trụ sở chính đặt tại Silicon Valley (Thung Lũng Si-li-côn) ở San Francisco, tiểu bang California. Apple được thành lập ngày 1 tháng 4 năm 1976 dưới tên Apple Computer, Inc., và đổi tên thành Apple Inc. vào đầu năm 2007. Với lượng sản phẩm bán ra toàn cầu hàng năm là 13,9 tỷ đô la Mỹ (2005), 74 triệu thiết bị iPhone được bán ra chỉ trong một quý 4 năm 2014 và có hơn 98.000 nhân viên ở nhiều quốc gia, sản phẩm là máy tính I phone cá nhân, phần mềm, phần cứng, thiết bị nghe nhạc và nhiều thiết bị đa phương tiện khác.', 0),
('AMD', 'Sunnyvale, California, USA', 'AMD hay Advanced Micro Devices (NYSE:AMD) là nhà sản xuất linh kiện bán dẫn tích hợp đa quốc gia có trụ sở tại Sunnyvale, California, Hoa Kỳ. AMD là nhà sản xuất bộ vi xử lý (CPU) x86 lớn thứ hai thế giới sau Intel và là một trong những nhà sản xuất bộ nhớ flash hàng đầu trên thế giới; ngoài ra AMD còn sản xuất chipset và các linh kiện điện tử bán dẫn khác.', 0),
('HP', 'Cupertino, California, Hoa Kỳ', 'Hewlett-Packard (viết tắt HP) là tập đoàn công nghệ thông tin lớn nhất thế giới. HP thành lập năm 1939 tại Palo Alto, California, Hoa Kỳ. HP hiện có trụ sở tại Cupertino, California, Hoa Kỳ. Năm 2006, tổng doanh thu của HP đạt 9.4 tỷ đô la, vượt đối thủ IBM với 9.1 tỉ, chính thức vươn lên vị trí số một(đến nay là google đứng số một) trong các công ty công nghệ thông tin.', 0),
('Toshiba', 'Tokyo, Nhật Bản', 'Công ty Toshiba  là công ty đa quốc gia công nghệ cao sản xuất thiết bị điện, có tổng hành dinh ở Tokyo (Nhật Bản). Nó là công ty thiết bị điện hợp nhất lớn thứ bảy trên thế giới.Toshiba được thành lập khi hai công ty hợp nhất vào năm 1939.', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh_sp`
--

CREATE TABLE `hinh_anh_sp` (
  `masp` int(11) NOT NULL,
  `tenfile` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anh_sp`
--

INSERT INTO `hinh_anh_sp` (`masp`, `tenfile`) VALUES
(28, 'dell-inspiron-3552-v5c008w-9.jpg'),
(28, 'dell-inspiron-3552-v5c008w-2.jpg'),
(28, 'dell-inspiron-3552-v5c008w-10.gif'),
(28, 'dell-inspiron-3552-v5c008w-21.jpg'),
(29, 'dell-inspiron-3452-n3700-4gb-500gb-win10-7-1.jpg'),
(29, 'dell-inspiron-3452-n3700-4gb-500gb-win10-1-2.jpg'),
(29, 'dell-inspiron-3452-n3700-4gb-500gb-win10-3.jpg'),
(29, 'dell-inspiron-3452-n3700-4gb-500gb-win10-4-2.jpg'),
(30, 'dell-vostro-3468-i3-7100u-6.jpg'),
(30, 'dell-vostro-3468-i3-7100u-3.jpg'),
(30, 'dell-vostro-3468-i3-7100u-4.jpg'),
(30, 'dell-vostro-3468-i3-7100u-2.jpg'),
(31, 'dell-inspiron-3467-i5-7200u-c4i5107w-5.jpg'),
(31, 'dell-inspiron-3467-i5-7200u-c4i5107w-3.jpg'),
(31, 'dell-inspiron-3467-i5-7200u-c4i5107w-3-1.jpg'),
(31, 'dell-inspiron-3467-i5-7200u-c4i5107w-2-1.jpg'),
(32, 'dell-vostro-3568-xf6c62-8.jpg'),
(32, 'dell-vostro-3568-xf6c62-2.jpg'),
(32, 'dell-vostro-3568-xf6c62-3-1.jpg'),
(32, 'dell-vostro-3568-xf6c62-2-1.jpg'),
(33, 'dell-inspiron-7460-n4i5259w-9.jpg'),
(33, 'dell-inspiron-7460-n4i5259w-7.jpg'),
(33, 'dell-inspiron-7460-n4i5259w-5.jpg'),
(33, 'dell-inspiron-7460-n4i5259w-8.jpg'),
(34, 'apple-macbook-air-2015-mjve2zp-a-i5-5250u-4gb-128g-bv-6.jpg'),
(34, 'apple-macbook-air-2015-mjve2zp-a-i5-5250u-4gb-128g-bv-7.jpg'),
(34, 'apple-macbook-air-2015-mjve2zp-a-i5-5250u-4gb-128g-bv-8.jpg'),
(34, 'apple-macbook-air-2015-mjve2zp-a-i5-5250u-4gb-128g-bv-9.jpg'),
(35, 'apple-macbook-air-2015-mmgg2zp-a-i5-5250u-8gb-256g-7.jpg'),
(35, 'apple-macbook-air-2015-mmgg2zp-a-i5-5250u-8gb-256g-4.jpg'),
(35, 'apple-macbook-air-2015-mmgg2zp-a-i5-5250u-8gb-256g-5.jpg'),
(35, 'apple-macbook-air-2015-mmgg2zp-a-i5-5250u-8gb-256g-6.jpg'),
(36, 'apple-macbook-pro-2015-mf839zp-a-i5-5257u-8gb-128g-1-1.jpg'),
(36, 'apple-macbook-pro-2015-mf839zp-a-i5-5257u-8gb-128g-2-1.jpg'),
(36, 'apple-macbook-pro-2015-mf839zp-a-i5-5257u-8gb-128g-8.jpg'),
(36, 'apple-macbook-pro-2015-mf839zp-a-i5-5257u-8gb-128g-4.jpg'),
(37, 'apple-macbook-12-mlh72-core-m-11g-8gb-256gb-macos-4.jpg'),
(37, 'apple-macbook-12-mlh72-core-m-11g-8gb-256gb-macos--1.jpg'),
(37, 'apple-macbook-12-mlh72-core-m-11g-8gb-256gb-macos--5.jpg'),
(37, 'apple-macbook-12-mlh72-core-m-11g-8gb-256gb-macos--4.jpg'),
(38, 'apple-macbook-pro-2015-mf839zp-a-i5-5257u-8gb-128g-1-11.jpg'),
(38, 'apple-macbook-pro-2015-mf839zp-a-i5-5257u-8gb-128g-6-1.jpg'),
(38, 'apple-macbook-12-mlh72-core-m-11g-8gb-256gb-macos--4.jpg'),
(38, 'apple-macbook-pro-2015-mf840zp-7.jpg'),
(39, 'apple-macbook-12-mlhf2-core-m-12g-8gb-512gb-macos--5.jpg'),
(39, 'apple-macbook-12-mlhf2-core-m-12g-8gb-512gb-macos--12.jpg'),
(39, 'apple-macbook-12-mlhf2-core-m-12g-8gb-512gb-macos--13.jpg'),
(39, 'apple-macbook-12-mlhf2-core-m-12g-8gb-512gb-macos--4.jpg'),
(40, 'macbook-pro-13-2016-khong-touch-bar1.jpg'),
(40, 'macbook-pro-13-20162.jpg'),
(40, 'macbook-pro-13-20165.jpg'),
(40, 'macbook-pro-13-2016-khong-touch-bar6.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `tendn` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mk` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hoten` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngsinh` date NOT NULL,
  `sdt` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `quyen` int(11) NOT NULL,
  `gioitinh` varchar(4) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`tendn`, `mk`, `hoten`, `ngsinh`, `sdt`, `email`, `quyen`, `gioitinh`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Trần Thế Ngọc', '2016-12-20', '0947016319', 'coldboy6596@gmail.com', 1, 'Nam'),
('admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'Trần Lê Bảo Lâm', '2016-12-20', '01688788150', 'tranlebaolam@gmail.com', 1, 'Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `o_dia_cung`
--

CREATE TABLE `o_dia_cung` (
  `masp` int(11) NOT NULL,
  `loaiocung` varchar(8) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dungluong` int(11) NOT NULL,
  `an` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `o_dia_cung`
--

INSERT INTO `o_dia_cung` (`masp`, `loaiocung`, `dungluong`, `an`) VALUES
(28, 'HDD', 500, 0),
(29, 'HDD', 500, 0),
(30, 'HDD', 1024, 0),
(31, 'HDD', 1024, 0),
(32, 'HDD', 1024, 0),
(33, 'HDD', 500, 0),
(33, 'SSD', 128, 0),
(34, 'SSD', 128, 0),
(35, 'SSD', 256, 0),
(36, 'SSD', 128, 0),
(37, 'SSD', 256, 0),
(38, 'SSD', 256, 0),
(39, 'SSD', 512, 0),
(40, 'SSD', 256, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hangsx` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gia` bigint(20) NOT NULL,
  `mau` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `icon` varchar(128) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `loaicpu` varchar(8) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ramdungluong` int(2) NOT NULL COMMENT 'dvi: BG',
  `ramloai` varchar(16) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `rambus` int(5) NOT NULL COMMENT 'MHz',
  `kichthuocmh` float NOT NULL COMMENT 'inch',
  `dophangiai` varchar(9) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'pixels',
  `cnmanhinh` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `manhinhcamung` tinyint(1) NOT NULL DEFAULT '0',
  `tencartmanhinh` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `congngheamthanh` varchar(80) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `oquang` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `usb` int(11) NOT NULL COMMENT '0 hoặc 1',
  `dhmi` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 hoặc 1',
  `cart` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 hoặc 1',
  `ketnoikhac` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `morong` varchar(128) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `wifi` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `lan` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT '10/100 Mbps',
  `bluetooth` varchar(16) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `camera` float NOT NULL,
  `pin` varchar(16) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hdh` varchar(16) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'Wndows 10',
  `khoiluong` float NOT NULL,
  `dai` int(11) NOT NULL,
  `rong` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `chatlieu` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `slkho` int(11) NOT NULL DEFAULT '20',
  `luotview` int(11) NOT NULL DEFAULT '0',
  `an` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`masp`, `tensp`, `hangsx`, `gia`, `mau`, `icon`, `loaicpu`, `ramdungluong`, `ramloai`, `rambus`, `kichthuocmh`, `dophangiai`, `cnmanhinh`, `manhinhcamung`, `tencartmanhinh`, `congngheamthanh`, `oquang`, `usb`, `dhmi`, `cart`, `ketnoikhac`, `morong`, `wifi`, `lan`, `bluetooth`, `camera`, `pin`, `hdh`, `khoiluong`, `dai`, `rong`, `day`, `chatlieu`, `slkho`, `luotview`, `an`) VALUES
(28, 'Inspiron 3552', 'Dell', 6690000, 'đen', 'dell-inspiron-3552-v5c008w-400-400x400.png', 'N3060', 4, 'DDR3L (1 khe)', 1600, 15.6, '1366x768', 'HD, TrueLife LED-Backlit Display', 0, 'Intel® HD Graphics', '2.0 Speakers Stereo, Combo Microphone & Headphone', 'DVD Super Multi Double Layer', 3, 0, 1, '...', 'Multi TouchPad', '802.11 b/g/n', 'không', 'v4.0', 0.3, 'Li-Ion 4 cell', 'Windows 10', 2.14, 380, 260, 22, 'vỏ nhựa', 50, 0, 0),
(29, 'Inspiron 3452', 'Dell', 7290000, 'đen', 'dell-inspiron-3452-n3700-4gb-500gb-win10-den-180x125-1.png', 'N3700', 4, 'DDR3L (1 khe)', 1600, 14, '1366x768', 'HD, TrueLife LED-Backlit Display', 0, 'Intel® HD Graphics', '2.0, Combo Microphone & Headphone', 'không', 3, 0, 1, '...', 'Multi TouchPad', '802.11 b/g/n', 'không', 'v4.0', 0.9, 'Li-Ion 4 cell', 'Windows 10', 1.9, 345, 243, 21, 'vỏ nhựa', 50, 0, 0),
(30, 'Vostro 3468', 'Dell', 11490000, 'đen', 'dell-vostro-3468-i3-7100u-400-400x460copy-400x460.png', '7100U', 4, 'DDR4 (1 khe)', 2400, 14, '1366x768', 'HD, TrueLife LED-Backlit Display', 0, 'Intel® HD Graphics', '2.0 Waves MaxxAudio, Combo Microphone & Headphone, Speakers Stereo', 'DVD Super Multi Double Layer', 3, 0, 1, 'LAN (RJ45), VGA (D-Sub)', 'Fingerprint, Multi TouchPad', '802.11 b/g/n', '10/100/1000 Mbps', 'v4.0', 1, 'Li-Ion 4 cell', 'Windows 10', 1.96, 345, 243, 23, 'vỏ nhựa', 50, 0, 0),
(31, 'Inspiron 3467', 'Dell', 13490000, 'đen', 'dell-inspiron-3467-i5-7200u-c4i5107w-1-400-400x460.png', '7200U', 4, 'DDR4 (1 khe)', 2400, 14, '1366x768', 'HD, TrueLife LED-Backlit Display', 0, 'Intel® HD Graphics', '2.0 Waves MaxxAudio, Combo Microphone & Headphone, Speakers Stereo', 'DVD Super Multi Double Layer', 3, 0, 1, 'LAN (RJ45)', 'Multi TouchPad', '802.11 b/g/n', '10/100/1000 Mbps', 'v4.0', 1, 'Li-Ion 4 cell', 'Windows 10', 1.77, 345, 243, 21, 'vỏ nhựa', 50, 0, 0),
(32, 'Vostro 3568', 'Dell', 17490000, 'đen', 'dell-vostro-3568-xf6c62-400copycopy-400x400.png', '7500U', 4, 'DDR4 (2 khe)', 2400, 15.6, '1920x1080', 'FHD, TrueLife LED-Backlit Display, Anti-Glare', 0, 'AMD Radeon R5 M420', '2.0 Waves MaxxAudio, Combo Microphone & Headphone, Speakers Stereo', 'DVD Super Multi Double Layer', 3, 0, 1, 'LAN (RJ45), VGA (D-Sub)', 'Fingerprint, Multi TouchPad', '802.11 b/g/n', '10/100/1000 Mbps', 'v4.0', 1, 'Li-Ion 4 cell', 'Windows 10', 2.18, 375, 270, 20, 'vỏ nhựa', 50, 0, 0),
(33, 'Inspiron 7460', 'Dell', 19490000, 'vàng đồng', 'dell-inspiron-7460-n4i5259w-400-400x460.png', '7200U', 4, 'DDR4 (1 khe)', 2400, 14, '1920x1080', 'FHD, TrueLife LED-Backlit Display, Công nghệ IPS, Anti-Glare', 0, 'NVIDIA GeForce 940MX', '2.0 Waves MaxxAudio, Speakers Stereo', 'không', 3, 0, 1, 'LAN (RJ45)', 'Multi TouchPad', '801.11 ac', '10/100/1000 Mbps', 'v4.2', 1, 'Li-Ion 3 cell', 'Windows 10', 1.7, 323, 227, 19, 'vỏ kim loại', 50, 0, 0),
(34, 'Air MJVM2ZP/A', 'Apple', 21990000, 'bạc', 'apple-macbook-air-2015-mjvm2zp-a-i5-5250u-4gb-128g-1-121111-400x400.png', '5250U', 4, 'DDR3L (On board)', 1600, 11.6, '1366x768', 'HD, LED Backlit', 0, 'Intel® HD Graphics', '2.0, Combo Microphone & Headphone, Micro Kép', 'không', 2, 0, 0, 'MagSafe 2, Thunderbolt 2', '...', '802.11 a/b/g/n', 'không', 'v4.0', 1.3, 'Lithium-polymer', 'Mac OS', 1.08, 300, 192, 17, 'vỏ kim loại nguyên khối', 50, 0, 0),
(35, 'Air MMGG2ZP/A', 'Apple', 28990000, 'bạc', 'apple-macbook-air-2015-mmgg2zp-a-i5-5250u-8gb-256g-400-400x400.png', '5250U', 8, 'DDR3L (On board)', 1600, 13.3, '1440x900', 'WXGA+, LED Backlit', 0, 'Intel® HD Graphics', '2.0, Combo Microphone & Headphone, Micro Kép', 'không', 2, 0, 0, 'MagSafe 2, Thunderbolt 2', '...', '802.11 a/b/g/n', 'không', 'v4.0', 1.3, 'Lithium-polymer', 'Mac OS', 1.35, 325, 227, 17, 'vỏ kim loại nguyên khối', 50, 0, 0),
(36, 'Pro MF839ZP/A', 'Apple', 30590000, 'bạc', 'apple-macbook-pro-2015-mf839zp-a-i5-5257u-8gb-128g-detail-400x400-400x400-400x400.png', '5257U', 8, 'DDR3L (On board)', 1866, 13.3, '2560x1600', 'Retina, LED Backlit', 0, 'Intel® HD Graphics', '2.0, Combo Microphone & Headphone, Micro Kép', 'không', 2, 0, 1, 'MagSafe 2, 2 x Thunderbolt 2', '...', '802.11 a/b/g/n', 'không', 'v4.0', 1.3, '~ 10 giờ', 'Mac OS', 1.58, 314, 219, 18, 'vỏ kim loại nguyên khối', 50, 0, 0),
(37, '12" MLH72', 'Apple', 31490000, 'xám', 'apple-macbook-12-mlh72-core-m-11g-8gb-256gb-macos-4-400x460.png', 'C.M1.1', 8, 'DDR3 (On board)', 1866, 12, '2304x1440', 'Công nghệ IPS, LED Backlit, Retina', 0, 'Intel® HD Graphics', '2.0 Speakers Stereo, Combo Microphone & Headphone', 'không', 0, 0, 0, 'USB Type-C', 'Force Touch, Backlit keyboard, Micro kép', '802.11 a/b/g/n/ac', 'không', 'v4.0', 1.3, '~ 10 giờ', 'Mac OS', 0.9, 281, 197, 13, 'vỏ kim loại nguyên khối', 50, 0, 0),
(38, 'Pro MF840ZP/A', 'Apple', 35990000, 'bạc', 'apple-macbook-pro-2015-mf840zp-ssd-400x400.png', '5257U', 8, 'DDR3L (On board)', 1866, 13.3, '2560x1600', 'Retina, LED Backlit', 0, 'Intel® HD Graphics', '2.0, Combo Microphone & Headphone, Micro Kép', 'không', 2, 0, 1, 'MagSafe 2, 2 x Thunderbolt 2', '...', '802.11 a/b/g/n', 'không', 'v4.0', 1.3, '~ 10 giờ', 'Mac OS', 1.58, 314, 219, 18, 'vỏ kim loại', 50, 0, 0),
(39, '12" MLHF2', 'Apple', 37990000, 'vàng', 'apple-macbook-12-mlhf2-core-m-12g-8gb-512gb-macos-400x400.png', 'C.M1.2', 8, 'DDR3 (On board)', 1866, 12, '2304x1440', 'Công nghệ IPS, LED Backlit, Retina', 0, 'Intel® HD Graphics', '2.0 Speakers Stereo, Combo Microphone & Headphone', 'không', 0, 0, 0, 'USB Type-C', 'Force Touch, Backlit keyboard, Micro kép', '802.11 a/b/g/n/ac', 'không', 'v4.0', 1.3, '~ 10 giờ', 'Mac OS', 0.9, 281, 197, 13, 'vỏ kim loại', 50, 0, 0),
(40, 'Pro Touch MLVP2SA/A', 'Apple', 43990000, 'bạc', 'macbook-pro-13-2016-mlvp2sa-400-400x460-400x460.png', '6267U', 8, 'DDR4 (On board)', 2133, 13.3, '2560x1600', 'Công nghệ IPS, LED Backlit, Retina', 0, 'Intel® Iris™ Pro Graphics', '2.0 Speakers Stereo, Combo Microphone & Headphone', 'không', 0, 0, 0, '4 x Thunderbolt 3 (USB-C)', 'Touch Bar with integrated Touch ID sensor, Light Sensor, Backlit keyboard, Fingerprint, Force Touch, Multi TouchPad', '802.11 a/b/g/n/ac', 'không', 'v4.2', 1.3, '~ 10 giờ', 'Mac OS', 1.37, 212, 304, 15, 'vỏ kim loại nguyên khối', 50, 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`loai`),
  ADD UNIQUE KEY `loai` (`loai`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`madh`);

--
-- Chỉ mục cho bảng `hang_sx`
--
ALTER TABLE `hang_sx`
  ADD PRIMARY KEY (`tenhangsx`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`tendn`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`masp`),
  ADD UNIQUE KEY `ten_sp` (`tensp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `madh` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
