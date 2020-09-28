-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 14, 2020 lúc 06:13 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banthucpham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `total` double NOT NULL,
  `payment` varchar(200) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(10, 14, '2020-07-14', 0, NULL, NULL, '2020-07-14', '2020-07-14 01:10:31'),
(11, 15, '2020-07-14', 490000, NULL, NULL, '2020-07-14', '2020-07-14 01:11:14'),
(12, 16, '2020-07-14', 80000, NULL, NULL, '2020-07-14', '2020-07-14 08:07:38'),
(13, 17, '2020-07-14', 0, NULL, NULL, '2020-07-14', '2020-07-14 08:09:44'),
(14, 18, '2020-07-14', 55000, NULL, NULL, '2020-07-14', '2020-07-14 08:10:18'),
(15, 19, '2020-07-14', 0, NULL, NULL, '2020-07-14', '2020-07-14 08:12:16'),
(16, 20, '2020-07-14', 58000, NULL, NULL, '2020-07-14', '2020-07-14 08:12:47'),
(17, 21, '2020-07-14', 65000, NULL, NULL, '2020-07-14', '2020-07-14 11:08:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Đồ dùng gia đình', 'Đồ dùng gia đình', '', '2020-05-20 00:00:00', NULL),
(2, 'Đồ ăn cho pet', 'đồ ăn cho pet', '', '0000-00-00 00:00:00', NULL),
(3, 'Hoa quả', 'Hoa quả', '', '0000-00-00 00:00:00', NULL),
(4, 'Bánh', 'Bánh ', '', '0000-00-00 00:00:00', NULL),
(38, 'aaaaaaaaaaaa', 'aaa', '', '2020-07-11 22:14:34', '2020-07-11 22:14:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `note` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(14, 'aa', '1', 'adad', '12', NULL, '2020-07-14 01:10:31', '2020-07-14 01:10:31'),
(15, 'mai tung', '0', 'ha noi', '123456723214', NULL, '2020-07-14 01:11:14', '2020-07-14 01:11:14'),
(16, 'Nike', '1', 'aa', '1234', NULL, '2020-07-14 08:07:38', '2020-07-14 08:07:38'),
(17, 'Nike', '1', 'aa', '1234', NULL, '2020-07-14 08:09:44', '2020-07-14 08:09:44'),
(18, 'tung', '0', 'aaadsadsa', '12', NULL, '2020-07-14 08:10:18', '2020-07-14 08:10:18'),
(19, 'tung', '0', 'aaadsadsa', '12', NULL, '2020-07-14 08:12:16', '2020-07-14 08:12:16'),
(20, 'Tung dz', '0', 'Thanh Hóa', '123456723214', NULL, '2020-07-14 08:12:47', '2020-07-14 08:12:47'),
(21, 'Bảo', '0', 'ha noi', '0981352956', NULL, '2020-07-14 11:08:47', '2020-07-14 11:08:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`category_id`, `category_name`) VALUES
(1, 'Văn học'),
(2, 'Toán học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail`
--

CREATE TABLE `detail` (
  `id` int(10) NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(11,0) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `detail`
--

INSERT INTO `detail` (`id`, `id_bill`, `id_product`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(3, 11, 7, 5, 85000, '2020-07-14 01:11:14', '2020-07-14 01:11:14'),
(4, 11, 1, 2, 25000, '2020-07-14 01:11:14', '2020-07-14 01:11:14'),
(5, 11, 3, 1, 15000, '2020-07-14 01:11:14', '2020-07-14 01:11:14'),
(6, 12, 1, 1, 25000, '2020-07-14 08:07:38', '2020-07-14 08:07:38'),
(7, 12, 2, 1, 40000, '2020-07-14 08:07:38', '2020-07-14 08:07:38'),
(8, 12, 3, 1, 15000, '2020-07-14 08:07:38', '2020-07-14 08:07:38'),
(9, 14, 2, 1, 40000, '2020-07-14 08:10:18', '2020-07-14 08:10:18'),
(10, 14, 3, 1, 15000, '2020-07-14 08:10:18', '2020-07-14 08:10:18'),
(11, 16, 2, 1, 40000, '2020-07-14 08:12:47', '2020-07-14 08:12:47'),
(12, 16, 4, 1, 18000, '2020-07-14 08:12:47', '2020-07-14 08:12:47'),
(13, 17, 1, 1, 25000, '2020-07-14 11:08:47', '2020-07-14 11:08:47'),
(14, 17, 2, 1, 40000, '2020-07-14 11:08:47', '2020-07-14 11:08:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `description` text NOT NULL DEFAULT '',
  `old_price` double(11,0) NOT NULL,
  `new_price` double(11,0) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `unit` varchar(255) NOT NULL DEFAULT '',
  `created_at` date DEFAULT NULL,
  `count_buy` int(10) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `description`, `old_price`, `new_price`, `image`, `unit`, `created_at`, `count_buy`, `status`, `updated_at`) VALUES
(1, 'Dầu ăn', 1, '', 30000, 25000, '1.png', '', '2020-12-12', 1, 1, NULL),
(2, 'Gạo', 1, '', 50000, 40000, '3.png', '', '2020-05-27', 10, 1, NULL),
(3, 'coca-cola', 1, '', 18000, 15000, '2.png', '', '2020-04-12', 29, 1, NULL),
(4, 'dog-food', 1, '', 20000, 18000, '4.png', '', '0200-12-12', 1, 1, NULL),
(5, 'ngũ cốc', 1, '', 25000, 20000, '5.png', '', '0000-00-00', 7, 1, NULL),
(6, 'mì gói', 1, '', 3500, 3000, '6.png', '', '0000-00-00', 6, 1, NULL),
(7, 'thức ăn cho gà', 2, '', 100000, 85000, '7.png', '', '0000-00-00', 9, 1, NULL),
(8, 'bánh quy', 1, '', 10000, 9000, '8.png', '', '0000-00-00', 2, 1, NULL),
(9, 'rau cải', 3, '', 7000, 5000, '9.png', '', '0000-00-00', 4, 1, NULL),
(10, 'xoài', 3, '', 28000, 25000, '10.png', '', '0000-00-00', 29, 1, NULL),
(11, 'táo', 3, '', 25000, 20000, '11.png', '', '0000-00-00', 30, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`id`, `name`, `publisher`, `category_id`) VALUES
(8, 'test', '', 1),
(9, '', '23', 2),
(10, 'test', '131212321', 2),
(11, 'Tùng Đinh Khắc', '231212321', 1),
(12, 'Tùng Đinh Khắc', 'qq', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(10) NOT NULL,
  `link` text NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL,
  `category_id` int(10) NOT NULL,
  `created_at` time NOT NULL,
  `updated_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `link`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(2, '', '3.jpg', 2, '00:00:00', '00:00:00'),
(5, '1212', '1592920575-2.png', 3, '20:56:15', '20:56:15'),
(6, 'âsasas', '1594133582-1.png', 3, '21:53:02', '21:53:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `level` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `remember_token`, `created_at`, `level`, `updated_at`) VALUES
(1, '', 'nmt22031997@gmail.com', '123456', '', '0000-00-00', 0, NULL),
(2, '', 'admin', 'admin', '', NULL, 1, NULL),
(3, '', '', '', '', NULL, 0, NULL),
(4, 'mai tung', 'maitung.keychip@gmail.com', '$2y$10$8B8KSoe9XAqjZta6mkUy/.AoVO3FHzDvT7oFpk.wqm0LO689CIrXG', NULL, '2020-07-11', 1, '2020-07-11'),
(5, 'mai tung', 'admin1@gmail.com', '$2y$10$lLXLKY3sCfW/Y4huv7o/leZNPycx450Up4q0JyyIyvqjZ8WXiK/Um', NULL, '2020-07-12', 0, '2020-07-12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`category_id`) USING BTREE;

--
-- Chỉ mục cho bảng `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
