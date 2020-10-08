-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2019 lúc 05:45 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sanpham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anh`
--

CREATE TABLE `anh` (
  `masp` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `tenanh` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Đang đổ dữ liệu cho bảng `anh`
--

INSERT INTO `anh` (`masp`, `tenanh`) VALUES
('sp01', '1.jpg'),
('sp02', '2.jpg'),
('sp03', '3.jpg'),
('sp04', '4.jpg'),
('sp05', '5.jpg'),
('sp06', '6.jpg'),
('sp07', '7.jpg'),
('sp08', '8.jpg'),
('sp09', '9.jpg'),
('sp10', '10.jpg'),
('sp11', '11.jpg'),
('sp12', '12.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `mahd` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `masp` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `mahd`, `masp`, `soluong`, `gia`) VALUES
(1, 'dh1', 'sp01', 2, 65000),
(2, 'dh1', 'sp05', 3, 100000),
(87, 'dh2', 'sp08', 3, 86000),
(89, 'dh2', 'sp03', 1, 40000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `masp` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `danhgia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`masp`, `danhgia`) VALUES
('sp01', 3.8),
('sp02', 4.7),
('sp03', 4.1),
('sp04', 4.9),
('sp05', 4.9),
('sp06', 4.6),
('sp07', 4.4),
('sp08', 4.7),
('sp09', 4.2),
('sp10', 4.8),
('sp11', 4.6),
('sp12', 4.3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `madh` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `tongtien` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`madh`, `tongtien`, `trangthai`) VALUES
('dh1', 430000, 1),
('dh2', 298000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `tensp` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `matl` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `matl`, `gia`, `soluong`) VALUES
('sp01', 'Bộ Luật Dân Sự ', 'tl01', 65000, 20),
('sp02', 'Bộ Luật Tố Tụng Hình Sự', 'tl01', 40000, 30),
('sp03', 'Bộ Luật Tố Tụng Dân Sự', 'tl01', 40000, 35),
('sp04', 'Luật Đất Đai', 'tl01', 45000, 45),
('sp05', 'Code Dạo Kí Sự', 'tl02', 100000, 20),
('sp06', 'Toán Học, Một Thiên Tiểu Thuyết', 'tl02', 85000, 55),
('sp07', 'Nhân Tố Enzyme - Phương Thức Sống Lành Mạnh', 'tl02', 70000, 66),
('sp08', 'Các Thế Giới Song Song', 'tl02', 86000, 10),
('sp09', '12 Cách Yêu', 'tl03', 75000, 54),
('sp10', 'Colorful', 'tl03', 76000, 43),
('sp11', 'Sword Art Online', 'tl03', 150000, 190),
('sp12', 'Naruto', 'tl03', 120000, 35);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `matl` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `tentl` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`matl`, `tentl`) VALUES
('tl01', 'chính trị – pháp luật'),
('tl02', 'khoa học công nghệ – kinh tế'),
('tl03', 'truyện – tiểu thuyết');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtin`
--

CREATE TABLE `thongtin` (
  `masp` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `hinhthuc` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `kichthuoc` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `sotrang` int(11) NOT NULL,
  `nxb` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `tacgia` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `trongluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtin`
--

INSERT INTO `thongtin` (`masp`, `hinhthuc`, `kichthuoc`, `sotrang`, `nxb`, `tacgia`, `trongluong`) VALUES
('sp01', 'Sách', '12 x 12 cm', 200, 'Việt Nam', 'Quốc Hội Việt Nam', 545),
('sp02', 'Sách ', '12 x 15 cm', 300, 'Việt Nam', 'Quốc Hội Việt Nam', 754),
('sp03', 'Sách', '12 x 15 cm', 308, 'Việt Nam', 'Quốc Hội Việt Nam', 687),
('sp04', 'Sách', '13 x 15 cm', 679, 'Việt Nam', 'Quốc Hội Việt Nam', 987),
('sp05', 'Sách', '12 x 16 cm', 400, 'Kim Đồng', 'Nam Cao', 301),
('sp06', 'Sách', '12 x 15 cm', 245, 'Kim Vàng', 'Huy Cận', 544),
('sp07', 'Sách', '14 x 14 cm', 700, 'Kim Chi', 'Tố Hữu', 254),
('sp08', 'Sách', '12 x 15 cm', 400, 'Kim Cương', 'Kim Lân', 435),
('sp09', 'Sách', '12 x 10 cm', 90, 'Animation', 'kon-kit', 100),
('sp10', 'Sách', '12 x 15 cm', 345, 'DC Comic', 'Quang Trần', 123),
('sp11', 'Sách', '15 x 15 cm', 150, 'Marvel ', 'Tài Vũ', 200),
('sp12', 'Sách', '15 x 12 cm', 59, 'Kim Đồng', 'Nam Ngắn', 50);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anh`
--
ALTER TABLE `anh`
  ADD PRIMARY KEY (`masp`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahd` (`mahd`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`masp`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madh`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `matl` (`matl`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`matl`);

--
-- Chỉ mục cho bảng `thongtin`
--
ALTER TABLE `thongtin`
  ADD PRIMARY KEY (`masp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `anh`
--
ALTER TABLE `anh`
  ADD CONSTRAINT `anh_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`mahd`) REFERENCES `donhang` (`madh`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`matl`) REFERENCES `theloai` (`matl`);

--
-- Các ràng buộc cho bảng `thongtin`
--
ALTER TABLE `thongtin`
  ADD CONSTRAINT `thongtin_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
