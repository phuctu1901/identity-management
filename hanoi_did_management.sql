-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 26, 2020 lúc 02:06 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hanoi_did_management`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `citizens`
--

CREATE TABLE `citizens` (
  `uuid` char(36) NOT NULL,
  `code` varchar(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` varchar(10) NOT NULL,
  `updated_at` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `citizens`
--

INSERT INTO `citizens` (`uuid`, `code`, `fullname`, `gender`, `dob`, `address`, `created_at`, `updated_at`) VALUES
('3bdb1f21-6a0b-11ea-ae90-f48e38eec4c0', '206027758', 'Nguyễn Phúc Tú', 1, '1997-01-19', 'Nghĩa Đô - Cầu Giấy - Hà Nội', '', '');

--
-- Bẫy `citizens`
--
DELIMITER $$
CREATE TRIGGER `uuid_citizen` BEFORE INSERT ON `citizens` FOR EACH ROW SET new.uuid = uuid()
$$
DELIMITER ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `citizens`
--
ALTER TABLE `citizens`
  ADD PRIMARY KEY (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
