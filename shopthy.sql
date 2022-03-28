-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 14, 2022 lúc 03:39 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopthy`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `trangThai` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `banner`, `trangThai`) VALUES
(1, 'banner_1.jpeg', '1'),
(2, 'banner_2.jpeg', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `idBlog` int(11) NOT NULL,
  `tieuDe` varchar(255) NOT NULL,
  `moTa` text NOT NULL,
  `noiDung` text NOT NULL,
  `idND` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `idDH` int(11) NOT NULL,
  `idSM` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `giaBan` decimal(10,0) NOT NULL,
  `phanTramKM` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`idDH`, `idSM`, `soLuong`, `giaBan`, `phanTramKM`) VALUES
(1, 126, 2, '1099000', NULL),
(1, 131, 3, '1199000', NULL),
(1, 140, 1, '899000', NULL),
(6, 125, 1, '1099000', 0),
(6, 127, 1, '1099000', 0),
(6, 132, 1, '1199000', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietkhuyenmai`
--

CREATE TABLE `chitietkhuyenmai` (
  `idKM` int(11) NOT NULL,
  `idSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietkhuyenmai`
--

INSERT INTO `chitietkhuyenmai` (`idKM`, `idSP`) VALUES
(2, 41);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `idDM` int(11) NOT NULL,
  `tenDM` varchar(200) NOT NULL,
  `trangThai` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`idDM`, `tenDM`, `trangThai`) VALUES
(1, 'Nam', '1'),
(2, 'Nữ', '1'),
(121, 'tre em', '0'),
(122, 'Nam', '0'),
(123, 'Nammmm', '0'),
(124, 'tre emmmmm', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `idDH` int(11) NOT NULL,
  `idKH` int(11) NOT NULL,
  `ngayDatHang` datetime NOT NULL DEFAULT current_timestamp(),
  `tinhTrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`idDH`, `idKH`, `ngayDatHang`, `tinhTrang`) VALUES
(1, 4, '2022-01-06 18:17:04', 1),
(2, 5, '2022-01-06 18:17:04', 1),
(5, 4, '2022-01-14 16:09:24', 0),
(6, 4, '2022-01-14 16:14:02', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `idKH` int(11) NOT NULL,
  `idSM` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `ngayThem` date NOT NULL DEFAULT current_timestamp(),
  `chon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`idKH`, `idSM`, `soLuong`, `ngayThem`, `chon`) VALUES
(4, 131, 2, '2022-01-14', 0),
(4, 137, 1, '2022-01-14', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `idAnh` int(11) NOT NULL,
  `linkAnh` varchar(255) NOT NULL,
  `idSP` int(11) NOT NULL,
  `mau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`idAnh`, `linkAnh`, `idSP`, `mau`) VALUES
(22, 'athur-jacket.jpeg', 41, 'Ghi xám'),
(23, 'athur-jacket-xam2.jpeg', 41, 'Ghi xám'),
(24, 'athur-jacket-xam1.jpeg', 41, 'Ghi xám'),
(25, 'athur-jacket-xam3.jpeg', 41, 'Ghi xám'),
(26, 'athur-jacket-xanh-reu-2.jpeg', 41, 'Xanh rêu'),
(27, 'athur-jacket-xanh-reu.jpeg', 41, 'Xanh rêu'),
(28, 'athur-jacket-xanh-reu-1.jpeg', 41, 'Xanh rêu'),
(29, 'athur-jacket-xanh-reu-3.jpeg', 41, 'Xanh rêu'),
(30, 'PRINCE-BLAZER.jpeg', 42, 'Nâu nhạt'),
(31, 'PRINCE-BLAZER-2.jpeg', 42, 'Nâu nhạt'),
(32, 'PRINCE-BLAZER-3.jpeg', 42, 'Nâu nhạt'),
(33, 'Win-Coat-2021.jpeg', 43, 'Nâu'),
(34, 'Win-Coat-2021-1.jpeg', 43, 'Nâu'),
(35, 'Win-Coat-2021-2.jpeg', 43, 'Nâu'),
(36, 'Win-Coat-2021-3.jpeg', 43, 'Nâu'),
(37, 'SSS.CABLE-KNIT-JACKET.jpeg', 44, 'Trắng be'),
(38, 'SSS.CABLE-KNIT-JACKET-1.jpeg', 44, 'Trắng be'),
(39, 'SSS.CABLE-KNIT-JACKET-2.jpeg', 44, 'Trắng be'),
(40, 'SSS.CABLE-KNIT-JACKET-3.jpeg', 44, 'Trắng be'),
(41, 'Uk-Rain-Coat.jpeg', 45, 'Trắng xám'),
(42, 'Uk-Rain-Coat-2.jpeg', 45, 'Trắng xám'),
(43, 'Uk-Rain-Coat-3.jpeg', 45, 'Trắng xám'),
(44, 'Uk-Rain-Coat-4.jpeg', 45, 'Trắng xám'),
(45, 'Milan-shirt-1.jpeg', 47, 'trắng'),
(46, 'Milan-shirt-2.jpeg', 47, 'trắng'),
(47, 'Milan-shirt-3.jpeg', 47, 'trắng'),
(48, 'Milan-shirt-4.jpeg', 47, 'trắng'),
(49, 'Milan-shirt-black-1.jpeg', 47, 'Đen'),
(50, 'Milan-shirt-black-2.jpeg', 47, 'Đen'),
(51, 'Milan-shirt-black-3.jpeg', 47, 'Đen'),
(52, 'Milan-shirt-black-4.jpeg', 47, 'Đen'),
(53, 'Prince-Shirt-Basic.jpeg', 48, 'trắng'),
(54, 'Prince-Shirt-Basic-2.jpeg', 48, 'trắng'),
(55, 'Prince-Shirt-Basic-3.jpeg', 48, 'trắng'),
(56, 'Prince-Shirt-Basic-4.jpeg', 48, 'trắng'),
(57, 'retro-denim-shirt-1.jpeg', 49, 'Xanh da trời'),
(58, 'retro-denim-shirt-2.jpeg', 49, 'Xanh da trời'),
(59, 'retro-denim-shirt-3.jpeg', 49, 'Xanh da trời'),
(60, 'retro-denim-shirt-4.jpeg', 49, 'Xanh da trời'),
(61, 'letter-shirt-1.jpeg', 50, 'Đen'),
(62, 'letter-shirt-2.jpeg', 50, 'Đen'),
(63, 'letter-shirt-3.jpeg', 50, 'Đen'),
(64, 'letter-shirt-4.jpeg', 50, 'Đen'),
(65, 'cuba-shirt-be-1.jpeg', 51, 'Be'),
(66, 'cuba-shirt-be-2.jpeg', 51, 'Be'),
(67, 'cuba-shirt-be-3.jpeg', 51, 'Be'),
(68, 'cuba-shirt-be-4.jpeg', 51, 'Be'),
(69, 'cuba-shirt-black-1.jpeg', 51, 'Đen'),
(70, 'cuba-shirt-black-2.jpeg', 51, 'Đen'),
(71, 'cuba-shirt-black-3.jpeg', 51, 'Đen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `idKM` int(11) NOT NULL,
  `tenKM` varchar(200) NOT NULL,
  `ngayBD` date NOT NULL,
  `ngayKT` date NOT NULL,
  `phanTram` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`idKM`, `tenKM`, `ngayBD`, `ngayKT`, `phanTram`) VALUES
(1, 'Giảm giá giáng sinh', '2021-12-15', '2021-12-24', 20),
(2, 'Tết', '2022-01-01', '2021-01-07', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `idLSP` int(11) NOT NULL,
  `tenLSP` varchar(200) NOT NULL,
  `trangThai` char(1) NOT NULL,
  `idDM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`idLSP`, `tenLSP`, `trangThai`, `idDM`) VALUES
(1, 'sơ mi & áo kiểu', '0', 1),
(2, 'áo blazer & áo khoác', '1', 1),
(3, 'áo thun', '1', 1),
(4, 'quần dài', '1', 1),
(5, 'quần short', '1', 1),
(6, 'len dệt', '0', 1),
(7, 'hoodies & sweatshirt', '0', 1),
(8, 'quần jeans', '0', 2),
(9, 'áo blazer & áo khoác', '1', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau`
--

CREATE TABLE `mau` (
  `mau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mau`
--

INSERT INTO `mau` (`mau`) VALUES
('Be'),
('Ghi xám'),
('Hồng'),
('Nâu'),
('Nâu nhạt'),
('trắng'),
('Trắng be'),
('Trắng xám'),
('Xanh da trời'),
('Xanh rêu'),
('Đen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `idND` int(11) NOT NULL,
  `tenND` varchar(255) NOT NULL,
  `SDT` varchar(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `diaChi` varchar(255) DEFAULT NULL,
  `matKhau` varchar(255) NOT NULL,
  `trangThai` int(11) NOT NULL,
  `idQuyen` int(11) NOT NULL,
  `maPX` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`idND`, `tenND`, `SDT`, `email`, `diaChi`, `matKhau`, `trangThai`, `idQuyen`, `maPX`) VALUES
(1, 'Đặng Văn Thiện', '', 'admin@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, NULL),
(3, 'Nguyen An', NULL, 'an123@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, 3, NULL),
(4, 'Kim Nhung', NULL, 'kimnhung@gmail.com', NULL, 'c33367701511b4f6020ec61ded352059', 1, 3, NULL),
(5, 'Đặng Văn Thiện', NULL, 'thiendang201@gmail.com', NULL, '96e79218965eb72c92a549dd5a330112', 1, 3, NULL),
(7, 'Nguyen Thi Nhu Y', NULL, 'nhuyhe62001@gmail.com', NULL, '202cb962ac59075b964b07152d234b70', 1, 1, NULL),
(8, 'Nguyen Thi Nhu Y', NULL, 'nhuyhe620011@gmail.com', NULL, '4297f44b13955235245b2497399d7a93', 1, 3, NULL),
(11, 'abc', 'NULL', 'nhuyhe62001111@gmail.com', 'aaa', 'd9b1d7db4cd6e70935368a1efb10e377', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `idQuyen` int(11) NOT NULL,
  `quyen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`idQuyen`, `quyen`) VALUES
(1, 'Admin'),
(2, 'Nhân viên'),
(3, 'Khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idSP` int(11) NOT NULL,
  `tenSP` varchar(100) NOT NULL,
  `donGia` decimal(10,0) NOT NULL,
  `mua` char(1) NOT NULL,
  `moTa` text NOT NULL,
  `trangThai` char(1) NOT NULL,
  `idLSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idSP`, `tenSP`, `donGia`, `mua`, `moTa`, `trangThai`, `idLSP`) VALUES
(41, 'Arthur Jacket', '1099000', 'D', '', '1', 2),
(42, 'Prince Blazer', '1199000', 'D', '', '1', 2),
(43, 'Win Coat 2021', '1199000', 'D', '', '1', 2),
(44, 'SSS.Cable-Knit Jacket', '899000', 'D', '', '1', 2),
(45, 'Uk Rain Coat', '1199000', 'D', '', '1', 2),
(47, 'Milan Shirt', '449000', 'X', '', '1', 1),
(48, 'Prince Shirt - Basic', '419000', 'X', '', '1', 1),
(49, 'Retro Denim Shirt', '499000', 'X', '', '1', 1),
(50, 'Letter Shirt', '419000', 'X', '', '1', 1),
(51, 'Cuba Shirt', '419000', 'X', '', '1', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`size`) VALUES
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size_mau`
--

CREATE TABLE `size_mau` (
  `idSM` int(11) NOT NULL,
  `idSP` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `mau` varchar(100) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `trangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `size_mau`
--

INSERT INTO `size_mau` (`idSM`, `idSP`, `size`, `mau`, `soLuong`, `trangThai`) VALUES
(125, 41, 29, 'Ghi xám', 0, 1),
(126, 41, 30, 'Ghi xám', 100, 1),
(127, 41, 31, 'Ghi xám', 100, 1),
(128, 41, 29, 'Xanh rêu', 100, 1),
(129, 41, 30, 'Xanh rêu', 100, 1),
(130, 41, 31, 'Xanh rêu', 100, 1),
(131, 42, 29, 'Nâu nhạt', 100, 1),
(132, 42, 30, 'Nâu nhạt', 100, 1),
(133, 42, 31, 'Nâu nhạt', 100, 1),
(134, 43, 29, 'Nâu', 100, 1),
(135, 43, 30, 'Nâu', 100, 1),
(136, 43, 31, 'Nâu', 100, 1),
(137, 44, 29, 'Trắng be', 100, 1),
(138, 44, 30, 'Trắng be', 100, 1),
(139, 44, 31, 'Trắng be', 100, 1),
(140, 44, 32, 'Trắng be', 100, 1),
(141, 45, 29, 'Trắng xám', 100, 1),
(142, 45, 30, 'Trắng xám', 100, 1),
(143, 45, 31, 'Trắng xám', 100, 1),
(144, 45, 32, 'Trắng xám', 100, 1),
(145, 47, 29, 'trắng', 65, 1),
(146, 47, 30, 'trắng', 0, 1),
(147, 47, 31, 'trắng', 45, 1),
(148, 47, 29, 'Đen', 40, 1),
(149, 47, 30, 'Đen', 0, 1),
(150, 47, 31, 'Đen', 0, 1),
(151, 48, 29, 'trắng', 45, 1),
(152, 48, 30, 'trắng', 45, 1),
(153, 49, 29, 'Xanh da trời', 0, 1),
(154, 49, 30, 'Xanh da trời', 0, 1),
(155, 49, 31, 'Xanh da trời', 0, 1),
(156, 49, 32, 'Xanh da trời', 0, 1),
(157, 50, 29, 'Đen', 0, 1),
(158, 50, 30, 'Đen', 0, 1),
(160, 51, 29, 'Be', 0, 1),
(161, 51, 30, 'Be', 0, 1),
(162, 51, 31, 'Be', 0, 1),
(163, 51, 29, 'Đen', 65, 1),
(164, 51, 30, 'Đen', 65, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`idBlog`),
  ADD KEY `nguoiDang` (`idND`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`idDH`,`idSM`),
  ADD KEY `idSM` (`idSM`);

--
-- Chỉ mục cho bảng `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD PRIMARY KEY (`idKM`,`idSP`),
  ADD KEY `idSP` (`idSP`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`idDM`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`idDH`),
  ADD KEY `khachhang` (`idKH`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`idKH`,`idSM`),
  ADD KEY `idSM` (`idSM`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`idAnh`),
  ADD KEY `idSM` (`idSP`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`idKM`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`idLSP`),
  ADD KEY `idDM` (`idDM`);

--
-- Chỉ mục cho bảng `mau`
--
ALTER TABLE `mau`
  ADD PRIMARY KEY (`mau`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`idND`),
  ADD KEY `quyen` (`idQuyen`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`idQuyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idSP`),
  ADD KEY `idLSP` (`idLSP`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size`);

--
-- Chỉ mục cho bảng `size_mau`
--
ALTER TABLE `size_mau`
  ADD PRIMARY KEY (`idSM`),
  ADD KEY `idSP` (`idSP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `idBlog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `idDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `idDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `idAnh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `idKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `idLSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `idND` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `idQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `size_mau`
--
ALTER TABLE `size_mau`
  MODIFY `idSM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `banner_ibfk_1` FOREIGN KEY (`id`) REFERENCES `khuyenmai` (`idKM`);

--
-- Các ràng buộc cho bảng `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `nguoiDang` FOREIGN KEY (`idND`) REFERENCES `nguoidung` (`idND`);

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`idSM`) REFERENCES `size_mau` (`idSM`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`idDH`) REFERENCES `donhang` (`idDH`);

--
-- Các ràng buộc cho bảng `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD CONSTRAINT `chitietkhuyenmai_ibfk_1` FOREIGN KEY (`idKM`) REFERENCES `khuyenmai` (`idKM`),
  ADD CONSTRAINT `chitietkhuyenmai_ibfk_2` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `khachhang` FOREIGN KEY (`idKH`) REFERENCES `nguoidung` (`idND`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`idKH`) REFERENCES `nguoidung` (`idND`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`idSM`) REFERENCES `size_mau` (`idSM`);

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`);

--
-- Các ràng buộc cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD CONSTRAINT `loaisanpham_ibfk_1` FOREIGN KEY (`idDM`) REFERENCES `danhmuc` (`idDM`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `quyen` FOREIGN KEY (`idQuyen`) REFERENCES `quyen` (`idQuyen`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idLSP`) REFERENCES `loaisanpham` (`idLSP`);

--
-- Các ràng buộc cho bảng `size_mau`
--
ALTER TABLE `size_mau`
  ADD CONSTRAINT `size_mau_ibfk_1` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
