-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 25, 2016 lúc 02:14 CH
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
('Intel&reg; Iris™ Pro Graphics', 0, 'đồ họa tích hợp', 0);

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
('Intel', 'Atom', 'Z3735', 1.33, 'Intel&reg; Smart Cache, 2 MB', 1.83, 0);

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
(27, '5XRvfRI.jpg'),
(27, '133236_1600x1200.jpg'),
(27, '503729799335_44.jpg');

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
(1, 'HDD', 500, 0),
(2, 'ghj', 345, 0),
(2, 'jkl', 65, 0),
(4, 'SII', 500, 0),
(5, 'HDH', 63, 0),
(6, 'EEE', 256, 0),
(5, 'HDH', 63, 0),
(27, 'SD', 128, 0),
(27, 'HDD', 256, 0);

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
  `congngheamthanh` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `oquang` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `usb` int(11) NOT NULL COMMENT '0 hoặc 1',
  `dhmi` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 hoặc 1',
  `cart` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 hoặc 1',
  `ketnoikhac` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `morong` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
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
(1, 'Inspiron 3542 74514G50G', 'Dell', 17500000, 'đen', '', '4510U', 4, 'DDR3L (1 khe)', 1600, 15.6, '1366x768', 'TrueLife LED-Backlit Display', 0, 'NVIDIA&reg; GeForce&reg; 840M', 'Combo Microphone & Headphone', ' DVD Super Multi Double Layer', 2, 1, 1, 'LAN (RJ45), USB 3.0', ' Multi TouchPad, Battery-Saving Technology', '802.11b/g/n', '10/100 Mbps', '', 0.9, 'Li-Ion 4 cell', 'Windows 10', 2.34, 0, 0, 0, '', 36, 0, 0),
(2, 'R3 131T-C25D ', 'Acer', 6990000, 'trắng', '', 'N3060', 2, 'DDR3L (1 khe)', 1600, 11.6, '1366x768', 'Active Matrix TFT Colour LCD, LED Backlit, Lật, Xoay 360 độ', 1, 'Intel&reg; HD Graphics', 'Combo Microphone & Headphone 2.0', 'không', 2, 1, 1, 'LAN (RJ45)', '', '802.11b/g/n', '10/100 Mbps', '', 0.3, 'Li-Ion 4 cell', 'Windows 10', 1.58, 0, 0, 0, '', 20, 0, 0),
(3, 'Macbook Air MJVM2ZP/A', 'Apple', 21990000, 'bạc', '', '5250U', 4, 'DDR3L', 1600, 11.6, '1366x768', 'LED Backlit', 0, 'Intel&reg; HD Graphics', '2.0', 'không', 2, 0, 0, 'MagSafe 2, Thunderbolt 2', '', '802.11a/b/g/n', 'không', '', 1.3, 'Lithium-polymer', 'Mac OS', 1.08, 0, 0, 0, '', 20, 0, 0),
(4, 'Macbook MLHF2', 'Apple', 37990000, 'vàng', '', 'CoreM', 8, 'DDR3', 1866, 12, '2304x1440', 'IPS, LED Backlit, Retine', 0, 'Intel&reg; HD Graphics', '2.0, Speakers Stereo', 'không', 1, 0, 0, 'USB Type-C', 'Force Touch, Backlit keyboard, Micro kếp', '802.11 a/b/g/n/ac', 'không', '', 1.3, '~ 10 giờ', 'Mac OS', 0.9, 0, 0, 0, '', 20, 0, 0),
(5, 'Macbook MF840ZP/A', 'Apple', 35990000, 'bạc', '', '5257U', 8, 'DDR3', 1866, 13.3, '2560x1600', 'LED Backlit', 0, 'Intel&reg; HD Graphics', '2.0', 'không', 2, 1, 1, 'MagSafe 2, Thunderbolt 2', 'Micro kép', '208.11a/b/g/n', 'không', '', 1.3, '~10 giờ', 'Mac OS', 1.58, 0, 0, 0, '', 20, 0, 0),
(6, 'Macbook Air MMGF2ZP/A', 'Apple', 23990000, 'bạc', '', '5250U', 8, 'DDR3L', 1600, 13.3, '1440x900', 'LED Backlit', 0, 'Intel HD Graphics', '2.0 Combo Microphone & Headphone', 'không', 2, 0, 1, 'MagSafe 2, 2 x USB 3.0, Thunderbolt 2', 'Micro kép', '802.11a/b/g/n', 'không', '', 1.3, 'Lithium- polymer', 'Mac OS', 1.35, 0, 0, 0, '', 20, 0, 0),
(7, 'Macbook Pro MJLQ2ZP/A', 'Apple', 46990000, 'bạc', '', '4770HQ', 16, 'DDR3L', 1600, 15.4, '2880x1800', 'Công nghệ IPS, LED Backlit, Retina', 0, 'Intel&reg; Iris Pro Graphics', '2.0, Speakers Stereo', 'không', 2, 1, 1, 'MagSafe 2, USB 3.0, Thunderbolt 2', 'Backlit keyboard, Micro kép', '802.11 ac', 'không', '', 1.3, '~ 9 giờ', 'Mac OS', 2.04, 0, 0, 0, '', 20, 0, 0),
(8, 'Inspiron 3458 i3', 'Dell', 10290000, 'đen', '', '5005U', 4, 'DDR3L (1 khe)', 1600, 14, '1366x768', 'HD, TrueLife LED-Backlit Display', 0, 'Intel&reg; HD Graphics', '2.0', 'không', 3, 1, 1, 'LAN (RJ45)', '', '802.11b/g/n', '10/100 Mbps', '', 0.9, 'Li-Ion 4 cell', 'Windows 10', 1.8, 0, 0, 0, '', 20, 0, 0),
(9, 'Vostro 3568 i5', 'Dell', 14990000, 'đen', '', '7200U', 4, 'DDR4 (1 khe)', 2133, 15.6, '1366x768', 'TrueLife LED-Backlit Display', 0, 'AMD Radeon R5 M420', '2.0, Waves MaxxAudio, Speakers Stereo', 'DVD Super Multi Double Layer', 3, 1, 1, 'LAN (RJ45), VGA (D-Sub)', 'Multi TouchPad, Fingerprint', '802.11b/g/n', '10/100/1000 Mbps', 'v4.0', 0.9, 'Li-Ion 4 cell', 'Windows 10', 2.18, 0, 0, 0, '', 20, 0, 0),
(10, 'Inspiron 3552 N3060', 'Dell', 6690000, 'đen', '', 'N3060', 4, 'DDR3L (1 khe)', 1600, 15.6, '1366x768', 'TrueLife LED-Backlit Display', 0, 'Intel&reg; HD Graphics', '2.0, Speakers Stereo, Combo Microphone & Headphone', 'DVD Super Multi Double Layer', 3, 1, 1, '', 'Multi TouchPad', '802.11b/g/n', 'không', 'v4.0', 0.3, 'Li-Ion 4 cell', 'Windows 10', 2.14, 0, 0, 0, '', 20, 0, 0),
(11, 'Vostro 5568 i3', 'Dell', 14490000, 'xám', '', '7100U', 4, 'DDR4 (2 khe)', 2400, 15.6, '1366x768', 'TrueLife LED-Backlit Display', 0, 'NVIDIA GeForce 940MX', '2.0, Waves MaxxAudio, Speakers Stereo', 'không', 4, 1, 1, 'LAN (RJ45), VGA (Dongle)', 'Backlit keyboard, Fingerprint', '802.11 ac', '10/100/1000 Mbps', 'v4.0', 1, 'Li-Ion 3 cell', 'Windows 10', 1.98, 0, 0, 0, '', 20, 0, 0),
(12, 'E402SA ', 'Asus', 6290000, 'xanh dương', '', 'N3060', 2, 'DDR3', 1600, 14, '1366x768', 'ASUS Splendid Video, LED Backlit', 0, 'Intel&reg; HD Graphics', '2.0, SonicMaster audio,Speakers Stereo', 'không', 2, 1, 1, 'LAN (RJ45), VGA (D-Sub)', 'Instant On', '802.11b/g/n', '10/100 Mbps', 'không', 0.3, 'Li-Ion 2 cell', 'Windows 10', 1.65, 0, 0, 0, '', 20, 0, 0),
(13, 'A456UA', 'Asus', 12490000, 'vàng', '', '6200U', 4, 'DDR3L(1Khe)', 1600, 14, '1366x768', 'LED Backlit, ASUS Splendid Video', 0, 'Intel&reg; HD Graphics', '2.0, Speakers Stereo, SonicMaster audio', 'DVD Super Multi Double Layer', 2, 1, 1, 'LAN (RJ45), USB Type-C, VGA (D-Sub)', 'Instant On, Ice Cool', '802.11b/g/n', '10/100/1000 Mbps', 'v4.0', 0.3, 'Li-Ion 2 cell', 'Windows 10', 2.1, 0, 0, 0, '', 20, 0, 0),
(14, 'A541UV', 'Asus', 16290000, 'đen', '', '6500U', 4, 'DDR4 (1 khe)', 2133, 15.6, '1366x768', 'HD, LED Backlit, ASUS Splendid Video', 0, 'NVIDIA GeForce 920MX', '2.0, SonicMaster audio, Speakers Stereo', 'DVD Super Multi Double Layer', 2, 1, 1, 'LAN (RJ45), VGA (D-Sub)', 'Ice Cool', '802.11b/g/n', '10/100/1000 Mbps', 'v4.0', 0.3, 'Li-Ion 3 cell', 'Windows 10', 2, 0, 0, 0, '', 20, 0, 0),
(15, 'TP201SA', 'Asus', 9490000, 'xám', '', 'N3710', 4, 'DDR3L', 1600, 11.6, '1366x768', 'HD, IPS, ASUS Splendid Video, LED Backlit, Lật, Xoay 360 độ', 1, 'Intel&reg; HD Graphics', '2.0, SonicMaster audio, Speakers Stereo', 'không', 2, 1, 1, 'USB Type-C', 'Touchscreen, Ice Cool, Multi TouchPad', '802.11 ac', '10/100 Mbps', 'v4.1', 0.3, 'Li-Ion 3 cell', 'Windows 10', 1.39, 0, 0, 0, '', 20, 0, 0),
(16, 'A540LA', 'Asus', 10490000, 'đen', '', '5005U', 4, 'DDR3L (1 khe)', 1600, 15.6, '1920x1080', 'FHD, ASUS Splendid Video, LED Backlit', 0, 'Intel HD Graphics', '2.0, Speakers Stereo, SonicMaster audio', 'DVD Super Multi Double Layer', 2, 1, 1, 'LAN (RJ45), USB Type-C, VGA (D-Sub)', 'Instant On', '802.11 a/b/g/n/ac', '10/100 Mbps', 'v4.0', 0.3, 'Li-Ion 3 cell', 'Windows 10', 1.9, 0, 0, 0, '', 20, 0, 0),
(17, 'ES1 431', 'Acer', 5990000, 'đen', '', 'N3060', 4, 'DDR3L (1 khe)', 1600, 14, '1366x768', 'Active Matrix TFT Colour LCD', 0, 'Intel HD Graphics', '2.0', 'không', 2, 1, 1, 'LAN (RJ45)', 'Multi TouchPad', '802.11b/g/n', '10/100 Mbps', 'có', 0.3, 'Li-Ion 4 cell', 'Windows 10', 2.1, 0, 0, 0, '', 20, 0, 0),
(18, 'Aspire Z1402 39KT', 'Acer', 8490000, 'đen', '', '5005U', 4, 'DDR3L (1 khe)', 1600, 14, '1366x768', 'HD, ACER CineCrystal LED Backlit', 0, 'Intel HD Graphics', '2.0, Speakers Stereo', 'không', 2, 1, 1, 'LAN (RJ45)', 'Multi TouchPad', '802.11b/g/n', '10/100 Mbps', 'không', 0.3, 'Li-Ion 3 cell', 'Windows 10', 2.1, 0, 0, 0, '', 20, 0, 0),
(19, 'Aspire E5 575 50HM', 'Acer', 11990000, 'đen', '', '6200U', 4, 'DDR4 (2 khe)', 2133, 15.6, '1920x1080', 'FHD, ACER CineCrystal LED Backlit', 0, 'Intel HD Graphics', '2.0, Speakers Stereo', 'DVD Super Multi Double Layer', 3, 1, 1, 'LAN (RJ45), USB Type-C, VGA (D-Sub)', 'USB Charge', '802.11b/g/n', '10/100/1000 Mbps', 'v4.0', 1, 'Li-Ion 4 cell', 'Windows 10', 2.23, 0, 0, 0, '', 20, 0, 0),
(20, 'Aspire F5 573G 55HV', 'Acer', 13990000, 'bạc', '', '7200U', 4, 'DDR4 (2 khe)', 2133, 15.6, '1920x1080', 'FHD, ACER CineCrystal LED Backlit', 0, 'NVIDIA GeForce 940MX', '2.0, Speakers Stereo', 'DVD Super Multi Double Layer', 3, 1, 1, 'LAN (RJ45), USB Type-C, VGA (D-Sub)', 'Multi TouchPad', '802.11b/g/n', '10/100/1000 Mbps', 'v4.0', 1, 'Li-Ion 6 cell', 'Windows 10', 2.4, 0, 0, 0, '', 20, 0, 0),
(21, 'IdeaPad 100S 11IBY', 'Lenovo', 3990000, 'đỏ, xanh dương, bạc', '', ' Z3735', 2, 'DDR3L', 1600, 11.6, '1366x768', 'HD, LED', 0, 'Intel HD Graphics', '2.0', 'không', 2, 1, 1, '', 'One Key Recovery, Micro kép', '802.11b/g/n', 'không', 'v4.0', 0.3, '2 cell 8.400 mAh', 'Windows 10', 1, 0, 0, 0, '', 20, 0, 0),
(22, 'IdeaPad 110 14IBR', 'Lenovo', 5490000, 'đen', '', 'N3060', 4, 'DDR3L', 1600, 14, '1366x768', 'HD, LED Backlit', 0, 'Intel HD Graphics', ' Dolby Home Theater, Speakers Stereo', 'không', 2, 1, 1, 'LAN (RJ45)', 'Multi TouchPad, AccuType Keyboard', '802.11b/g/n', '10/100 Mbps', 'v4.0', 0.3, 'Li-Ion 3 cell', 'Windows 10', 2, 0, 0, 0, '', 20, 0, 0),
(23, 'IdeaPad 100 14IBD', 'Lenovo', 8490000, 'đen', '', '5005U', 4, 'DDR3L (1 khe)', 1600, 14, '1366x768', 'HD, LED Backlit', 0, 'Intel HD Graphics', '2.0, Speakers Stereo', 'không', 2, 1, 1, 'LAN (RJ45)', 'One Key Recovery, AccuType Keyboard', '802.11b/g/n', '10/100 Mbps', 'v4.0', 0.3, 'Li-Ion 2 cell', 'Windows 10', 1.9, 0, 0, 0, '', 20, 0, 0),
(24, 'Yoga 500', 'Lenovo', 13490000, 'đen', '', '6200U', 4, 'DDR3L (1 khe)', 1600, 14, '1920x1080', 'FHD, cảm ứng điện dung đa điểm, LED Backlit', 1, 'Intel HD Graphics', '2.0, Dolby Home Theater', 'không', 3, 1, 1, 'Micro HDMI, LAN (RJ45)', ' AccuType Keyboard', '802.11b/g/n', '10/100/1000 Mbps', 'v4.0', 0.9, 'Li-Ion 3 cell', 'Wndows 10', 1.8, 0, 0, 0, '', 20, 0, 0),
(25, 'IdeaPad 710S 13ISK', 'Lenovo', 17990000, 'vàng đồng', '', '6200U', 4, 'DDR3L (2 khe)', 1600, 13.3, '1920x1080', 'Viền màn hình mỏng, LED Backlit', 0, 'Intel HD Graphics', '2.0, Speakers Stereo, Dolby Home Theater, JBL® Stereo Speakers', 'không', 2, 1, 1, 'Micro HDMI', 'One Key Recovery, AccuType Keyboard', '802.11 ac', '10/100/1000 Mbps', 'v4.0', 0.9, '~8 giờ', 'Wndows 10', 1.2, 0, 0, 0, '', 20, 0, 0),
(27, 'teen masy', 'AMD', 123456, 'xdm', 'Info.png', '5257U', 64, 'DDR', 653, 5, '1245x678', 'HD', 0, 'Intel® Iris™ Pro Graphics', '2.0, ljh', 'không', 1, 0, 1, 'USB Type-C', 'AccyType Keybroad', '801.11', '10/100 Mbps', 'v2.0', 0.3, 'ion 6 cell', 'Windows 8.1', 0.9, 300, 200, 20, 'nhôm đặc biệt', 10, 0, 0);

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
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
