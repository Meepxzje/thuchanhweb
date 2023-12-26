-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 18, 2023 lúc 06:49 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `weblaptop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieumua`
--

DROP TABLE IF EXISTS `chitietphieumua`;
CREATE TABLE IF NOT EXISTS `chitietphieumua` (
  `IDCTPM` int NOT NULL AUTO_INCREMENT,
  `IDPM` varchar(50) NOT NULL,
  `IDSP` varchar(50) NOT NULL,
  `SoLuong` int NOT NULL,
  `DonGia` float NOT NULL,
  PRIMARY KEY (`IDCTPM`),
  KEY `fk_ctpm_pm` (`IDPM`),
  KEY `fk_ctpm_sp` (`IDSP`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

DROP TABLE IF EXISTS `loaisanpham`;
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `IDLSP` varchar(50) NOT NULL,
  `TenLSP` varchar(50) NOT NULL,
  PRIMARY KEY (`IDLSP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`IDLSP`, `TenLSP`) VALUES
('Laptop', 'LAPTOP'),
('Ram', 'RAM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

DROP TABLE IF EXISTS `nhacungcap`;
CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `IDNCC` varchar(50) NOT NULL,
  `TenNCC` varchar(50) NOT NULL,
  PRIMARY KEY (`IDNCC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`IDNCC`, `TenNCC`) VALUES
('Gearvn', 'GEARVN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhasanxuat`
--

DROP TABLE IF EXISTS `nhasanxuat`;
CREATE TABLE IF NOT EXISTS `nhasanxuat` (
  `IDNSX` varchar(50) NOT NULL,
  `TenNSX` varchar(50) NOT NULL,
  `DiaChiNSX` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `imgNSX` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`IDNSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`IDNSX`, `TenNSX`, `DiaChiNSX`, `imgNSX`) VALUES
('Acer', 'ACER', 'Lầu 704-705, 37 Tôn Đức Thắng, Phường Bến Nghé, Quận 1, Thành phố Hồ Chí Minh', 'ACER.png'),
('Asus', 'ASUS', 'Tòa nhà Viettel Complex, Tầng 1 Hẻm 285 Cách Mạng Tháng Tám, Phường 12, Quận 10, Thành phố Hồ Chí Minh', 'ASUS.png'),
('Dell', 'DELL', '23 Nguyễn Thị Huỳnh, Phường 8, Q.Phú Nhuận, Tp HCM', 'DELL.png'),
('Hp', 'HP', 'Phòng 205, Biệt thự E, Số 3 Thành Công, Quận Ba Đình, TP. Hà Nội', 'HP.png'),
('Lenovo', 'LENOVO', 'Phòng 709A, Tầng 7, Oriental Tower, No. 324 Tây Sơn, Ngã Tư Sở, Quận Đống Đa, Hà Nội, Vietnam', 'LENOVO.png'),
('Lg', 'LG GRAM', 'Lô CN2, KCN Tràng Duệ, xã Lê Lợi, huyện An Dương, thành phố Hải Phòng, Việt Nam', 'LG.png'),
('Msi', 'MSI', '133/16 Huỳnh Mẫn Đạt, Phường 7, Quận 5, Tp. Hồ Chí Minh', 'MSI.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieumua`
--

DROP TABLE IF EXISTS `phieumua`;
CREATE TABLE IF NOT EXISTS `phieumua` (
  `IDPM` varchar(50) NOT NULL,
  `HoTen` varchar(50) DEFAULT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `SDT` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `TrangThai` varchar(50) NOT NULL,
  PRIMARY KEY (`IDPM`),
  KEY `fk_pm_us` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `IDSP` varchar(50) NOT NULL,
  `TenSP` varchar(255) NOT NULL,
  `Gia` float NOT NULL,
  `MoTa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imgSP` varchar(50) DEFAULT NULL,
  `imgSP1` varchar(50) DEFAULT NULL,
  `imgSP2` varchar(50) DEFAULT NULL,
  `IDNCC` varchar(50) DEFAULT NULL,
  `IDLSP` varchar(50) DEFAULT NULL,
  `IDNSX` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDSP`),
  KEY `IDNCC` (`IDNCC`),
  KEY `IDLSP` (`IDLSP`),
  KEY `IDNSX` (`IDNSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`IDSP`, `TenSP`, `Gia`, `MoTa`, `imgSP`, `imgSP1`, `imgSP2`, `IDNCC`, `IDLSP`, `IDNSX`) VALUES
('Sp1', 'Laptop gaming Acer Nitro 5 Tiger AN515 58 5935', 25490000, 'Nổi danh với những chiếc laptop gaming giá rẻ, Acer Nitro 5 vẫn thật sự là một trong những “ông hoàng” ở phân khúc của mình. Và với những thành phần tiên tiến nhất hiện nay, Acer Nitro 5 đã sẵn sàng khi trang bị cho mình một sức mạnh mới, vẻ ngoài mới cùng sản phẩm Acer Nitro 5 Tiger AN515 58 5935. Cùng GEARVN đi vào một cách chi tiết hơn về chiếc laptop này nhé!', 'acer3.png', 'acer2.png', 'acer1.png', 'Gearvn', 'Laptop', 'Acer'),
('Sp10', 'Laptop Lenovo Ideapad Slim 5 16IAH8 83BG001XVN', 1590000, 'Laptop văn phòng, phân khúc sản phẩm cực kì “nóng” với lượng người dùng và nhu cầu sử dụng cao đến từ học sinh - sinh viên hay dân văn phòng chính hiệu. Không còn độc quyền với những “ông hoàng”, nay chúng ta cùng đón chào một tân binh đến từ Lenovo với series Ideapad Slim 5 của mình. GEARVN xin giới thiệu model Lenovo Ideapad Slim 5 16IAH8 83BG001XVN ngay sau đây!', 'lnv3.png', 'lnv2.png', 'lnv1.png', 'Gearvn', 'Laptop', 'Lenovo'),
('Sp11', 'Ram PNY XLR8 Low Profile 1x8GB 3200 DDR4', 590000, 'PNY bước chân vào thị trường Việt Nam với những sản phẩm RAM ở phân khúc giá vô cùng thân thiện và dần trở thành một lựa chọn rất tốt cho mọi người dùng. Và tiếp tục series sản phẩm XLR8, PNY mang đến cho chúng model PNY XLR8 Low Profile 3200 DDR4. Cùng GEARVN tìm hiểu chi tiết về sản phẩm này ngay sau đây nhé !', 'ddr4 3.png', 'ddr5 1.png', 'ddr4 2.png', 'Gearvn', 'Ram', 'Acer'),
('Sp12', 'Ram PNY XLR8 Silver 1x8GB 3600 RGB', 990000, 'RAM PC đóng một vai trò quan trọng trong việc lưu trữ và trích xuất thông tin cho máy tính. PNY XLR8 Silver 1x8GB 3600 RGB là thanh RAM chuẩn DDR4 cho game thủ yêu cầu một thiết kế đẹp, mới lạ đi kèm với hệ thống RGB bắt mắt và có khả năng ép xung đỉnh cao để phục vụ nhu cầu chơi game của mình.', 'ddr5 3.png', 'ddr5 3.png', 'ddr5 2.png', 'Gearvn', 'Ram', 'Lg'),
('Sp2', 'Acer Predator Helios', 30000000, 'RTX 3060 sẽ mang lại hiệu suất tối ưu cho game thủ và creator.', 'acer1.png', 'acer2.png', 'acer3.png', 'Gearvn', 'Laptop', 'Acer'),
('Sp3', 'Laptop Dell Inspiron 15 3520', 12490000, 'Tùy theo nhiều nhu cầu khác nhau mà có nhiều dòng sản phẩm laptop Dell khác nhau. Nếu bạn đang tìm một chiếc laptop phục vụ cho nhu cầu học tập và làm việc hằng ngày thì Dell Inspiron 15 3520 i3U082W11BLU sẽ là người bạn đồng hành cực tốt. cấu hình mạnh mẽ trên thiết kế đơn giản mang lại hiệu năng giải quyết mọi công việc mượt mà, nhanh chóng.', 'dell3.png', 'dell2.png', 'dell1.png', 'Gearvn', 'Laptop', 'Dell'),
('Sp4', 'Laptop Dell Vostro 3510 7T2YC2', 17490000, 'Laptop Dell Vostro 3510 7T2YC2 là sản phẩm tiếp theo có mặt trên thị trường thuộc thế hệ Dell Vostro. Vẫn sở hữu những điểm mạnh vốn có trên những chiếc laptop Dell trước đây là thiết kế, hiệu năng và đặc biệt đó là giá tiền phải chăng. Vậy Dell Vostro 3510 V3510 có những điểm gì mà bạn cần biết? Hãy cùng GEARVN khám phá nào.', 'dell1.png', 'dell2.png', 'dell3.png', 'Gearvn', 'Laptop', 'Dell'),
('Sp5', 'Laptop ASUS Zenbook 14 OLED UM3402YA KM405W', 22290000, 'AMD Ryzen™ 5 7530U Mobile Processor 2.0GHz (6-core/12-thread, 16MB cache, up to 4.5 GHz max boost)', 'asus1.png', 'asus2.png', 'asus3.png', 'Gearvn', 'Laptop', 'Asus'),
('Sp6', 'Laptop Asus Vivobook 15 OLED A1505VA L1114W', 18590000, 'Asus Vivobook 15X OLED A1505VA L1114W mang lại trải nghiệm hình ảnh tốt hơn với trang bị màn hình OLED. Thiết kế mỏng nhẹ cùng cấu hình mạnh mẽ cho phép người dùng nâng cao hiệu suất khi làm việc.', 'asus3.png', 'asus2.png', 'asus1.png', 'Gearvn', 'Laptop', 'Asus'),
('Sp7', 'Laptop MSI Modern 14 C11M 011VN', 10000000, 'Một trong những siêu phẩm laptop học tập làm việc mới nhất đến từ nhà MSI là MSI Modern 14 C11M 011VN. Sở hữu thiết kế năng động cấu hình mạnh mẽ đến từ con chip gen 12 đáp ứng mọi nhu cầu công việc hằng ngày.', 'MSI_1.png', 'MSI_2.png', 'MSI_3.png', 'Gearvn', 'Laptop', 'Msi'),
('Sp8', 'Laptop MSI Modern 14 C13M 609VN', 16490000, 'Một trong những siêu phẩm laptop học tập làm việc mới nhất đến từ nhà MSI là MSI Modern 14 C13M 609VN. Sở hữu thiết kế năng động cấu hình mạnh mẽ đến từ con chip gen 13 đáp ứng mọi nhu cầu công việc hằng ngày.', 'MSI_4.png', 'MSI_5.png', 'MSI_6.png', 'Gearvn', 'Laptop', 'Msi'),
('Sp9', 'Laptop Lenovo Yoga Slim 6 14IRH8 83E00008VN', 23990000, 'Lenovo Yoga Slim 6 14IRH8 83E00008VN là chiếc laptop học tập và làm việc phù hợp cho các bạn sinh viên hoặc nhân viên văn phòng. Thiết kế sang trọng, thời thượng kết hợp cùng bộ cấu hình được xây dựng mạnh mẽ cho các tác vụ hàng ngày. Đây sẽ là lựa chọn tối ưu cho những bạn đang tìm kiếm một chiếc laptop vừa học vừa làm và giải trí trong tầm giá. Cùng GEARVN tìm hiểu chi tiết hơn về sản phẩm nhà Lenovo này nhé!', 'lnv1.png', 'lnv2.png', 'lnv3.png', 'Gearvn', 'Laptop', 'Lenovo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(50) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `diachi` varchar(50) NOT NULL,
  `sdt` varchar(50) NOT NULL,
  `imgpro` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`email`, `password`, `ten`, `diachi`, `sdt`, `imgpro`) VALUES
('admin@1', '$2y$10$wciW2R5RaC0WH5NK7SeZHOn1uh3v2EUijXSnXZ7WwhETTqC1Dv4i6', 'vmshop', '', '', ''),
('t@1', '$2y$10$EFO0H6NByNDhQpvOrPqzU.yhzmMzuxdmoodKJ5o3JgCwsm1AYYKGK', 'thuan', '', '', ''),
('t@3', '$2y$10$VmCVPTlXpeeiPONvRKsajO1hC1TIUYmCX6O8oqj/4hzDcCiKC8hNG', 'thuan', '180 cao lo', '0123', 'giangsinh.jpg');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietphieumua`
--
ALTER TABLE `chitietphieumua`
  ADD CONSTRAINT `chitietphieumua_ibfk_1` FOREIGN KEY (`IDSP`) REFERENCES `sanpham` (`IDSP`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `chitietphieumua_ibfk_3` FOREIGN KEY (`IDPM`) REFERENCES `phieumua` (`IDPM`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `phieumua`
--
ALTER TABLE `phieumua`
  ADD CONSTRAINT `fk_pm_us` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`IDNCC`) REFERENCES `nhacungcap` (`IDNCC`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`IDLSP`) REFERENCES `loaisanpham` (`IDLSP`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`IDNSX`) REFERENCES `nhasanxuat` (`IDNSX`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
