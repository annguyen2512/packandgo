-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 20, 2018 lúc 09:26 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pack&go`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `newsletter` varchar(255) NOT NULL,
  `currenttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer_feedback`
--

INSERT INTO `customer_feedback` (`id`, `name`, `email`, `feedback`, `source`, `newsletter`, `currenttime`) VALUES
(1, 'nhat', 'nhat@mail', '123', '321', '1321', '2018-05-20 03:17:32'),
(2, 'a', 'annguyen2512@gmail.com', 'aaaaaa', 'search engine', '1', '2018-05-20 03:25:19'),
(3, '321', '321@mail', '321', 'search engine', '1', '2018-05-20 03:40:21'),
(4, '321', '321@mail', '321', 'advertisement', '1', '2018-05-20 03:41:35'),
(5, '321', '321@mail', '321', 'advertisement', '1', '2018-05-20 03:41:38'),
(6, '1321', '321@mail', '321', 'search engine', '1', '2018-05-20 03:42:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `country`) VALUES
(1, 'Võ Trần Minh Khôi', 'a', 'mkhoitv@gmail.com', 'VNM'),
(2, 'Võ Trần Minh Khôi', '0cc175b9c0f1b6a831c399e269772661', 'mkhoitv@gmail.com', 'VNM'),
(3, 'Võ Trần Minh Khôi', '92eb5ffee6ae2fec3ad71c777531578f', 'mkhoitv@gmail.com', 'VNM'),
(4, 'a', '0cc175b9c0f1b6a831c399e269772661', 'a@gmail', 'AFG'),
(5, 'a', '0cc175b9c0f1b6a831c399e269772661', 'b@mail', 'AFG'),
(6, 'ab', '0cc175b9c0f1b6a831c399e269772661', 'ab@mail', 'AFG');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customer_feedback`
--
ALTER TABLE `customer_feedback`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
