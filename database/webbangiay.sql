-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 04:13 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbangiay`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Randomkey` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BOD` date DEFAULT NULL,
  `Sex` int(1) DEFAULT NULL,
  `Address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Active` int(1) NOT NULL,
  `GGCode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Id`, `Name`, `Username`, `Password`, `Randomkey`, `Email`, `Phone`, `BOD`, `Sex`, `Address`, `Active`, `GGCode`, `Avatar`) VALUES
(1, 'Pham Duy Thanh', 'admin', '6353f01e54de23f112de64d5ecc208f91e2c27cb', 'sda', 'sdasdaasdas@gmail.com', '0982115492', '1998-08-11', 0, '793 Tran Xuan Soan', 1, '1', 'admin.jpg'),
(4, 'Mina', 'abczsda', 'asda', 'sda', 'Mina@gmail.com', '011111', '2021-01-05', 1, 'asdas', 1, '1', ''),
(5, 'adas', 'ASa', 'asda', 'sda', 'asdas', 'asd', '2021-01-05', 1, 'asdas', 1, '1', ''),
(6, 'Le Tu', 'Username', 'f0f8e902ca7a41c634c5c8247d4b94f2c9b351fb', '123456', 'LeTu@gmail.com', '097416113', '2021-01-05', 0, 'Chu Hai', 1, NULL, ''),
(8, 'Pham Tuyet', 'asdasd', '', '', 'PhamTuyet@gmail.com', '74901156', '2001-09-14', 0, 'Trần Xuân Soạn', 0, '', 'asdasd.jpg'),
(15, 'zsdas das das', '2342342342', 'a90388147802150e6b27517e0aabe9e287f7bb9f', '20e21a790186440e46f', 'asasdasdasdasdas@gmail.com', 'asdasd as', '0000-00-00', 1, '', 1, NULL, ''),
(16, 'zsdas das das', '2342342342342', 'bb08d2476e13b3198158531b444042cb3515049a', '3b50d56ae3100f59cfe', 'asdasda@gmail.com', '23423423', '0000-00-00', 1, '', 1, NULL, ''),
(17, 'asd awawf', 'dasd23423423', 'a4e122549149c0d132812fcb44733403678d0408', '7beb3e8ccdd76166b75', 'asdawfa@gmail.com', '021321af31', '1970-01-01', 1, '861, Trần Xuân Soạn', 1, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `title`, `image`, `active`) VALUES
(1, 'Banner 2', '/images/banner/sl3.jpg', 1),
(6, 'Banner 3', '/images/banner/banner_nike.jpg', 1),
(7, 'Banner 1', '/images/banner/slideshow_3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `content`) VALUES
(1, 'LUXUBU', 'LUXUBU'),
(2, 'LEXEBE', 'LEXEBE'),
(3, 'LIXIBI', 'LIXIBI'),
(4, 'LAXABA', 'LAXABA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `namemember` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `idproduct`, `namemember`, `noidung`) VALUES
(2, 74, 'John Doe', 'how to buy'),
(3, 74, 'John Doe', 'Sale'),
(4, 72, 'John Doe', '123'),
(5, 72, 'John Doe', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_img_product`
--

CREATE TABLE `tbl_img_product` (
  `idpost` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_img_product`
--

INSERT INTO `tbl_img_product` (`idpost`, `id_product`, `file_name`, `uploaded_on`) VALUES
(1, 57, '20.png', '2019-01-03 16:36:07'),
(2, 57, '20.png', '2019-01-03 16:36:07'),
(3, 57, '20.png', '2019-01-03 16:36:07'),
(4, 57, '24.png', '2019-01-03 17:03:07'),
(5, 58, '13.png', '2019-01-03 17:03:53'),
(6, 58, '6.png', '2019-01-03 17:05:25'),
(7, 59, '3.png', '2019-01-03 17:31:18'),
(8, 59, '8.png', '2019-01-03 17:31:18'),
(9, 59, '9.png', '2019-01-03 17:31:18'),
(10, 60, '16.png', '2019-01-03 17:32:17'),
(11, 60, '19.png', '2019-01-03 17:32:17'),
(12, 61, '9.png', '2019-01-03 17:32:59'),
(13, 61, '14.png', '2019-01-03 17:32:59'),
(14, 61, '18.png', '2019-01-03 17:32:59'),
(15, 62, '15.png', '2019-01-03 17:51:14'),
(16, 62, '20.png', '2019-01-03 17:51:14'),
(17, 63, '9.png', '2019-01-03 17:53:57'),
(18, 63, '15.png', '2019-01-03 17:53:57'),
(19, 63, '24.png', '2019-01-03 17:53:57'),
(20, 64, '1.png', '2019-01-03 17:54:46'),
(21, 64, '9.png', '2019-01-03 17:54:46'),
(22, 64, '15.png', '2019-01-03 17:54:46'),
(23, 65, '12.png', '2019-01-03 17:57:39'),
(24, 66, '11.png', '2019-01-03 17:58:08'),
(25, 67, '20.png', '2019-01-03 18:00:13'),
(26, 68, '7.png', '2019-01-03 18:00:43'),
(27, 69, '2.png', '2019-01-03 18:01:40'),
(28, 70, '5.png', '2019-01-03 18:02:47'),
(29, 71, '6.png', '2019-01-04 14:25:05'),
(30, 72, '3.png', '2019-01-04 14:47:07'),
(31, 72, '4.png', '2019-01-04 14:47:07'),
(32, 73, '7.png', '2019-01-04 14:47:42'),
(33, 73, '20.png', '2019-01-04 14:47:42'),
(34, 74, '3.png', '2019-01-04 16:08:16'),
(35, 74, '13.png', '2019-01-04 16:08:16'),
(36, 74, '19.png', '2019-01-04 16:08:16'),
(37, 74, '20.png', '2019-01-04 16:08:16'),
(38, 74, '23.png', '2019-01-04 16:08:16'),
(39, 74, '25.png', '2019-01-04 16:08:16'),
(40, 75, '3.png', '2019-01-17 17:48:48'),
(41, 75, '8.png', '2019-01-17 17:48:48'),
(42, 75, '15.png', '2019-01-17 17:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_oder`
--

CREATE TABLE `tbl_oder` (
  `id` int(11) UNSIGNED NOT NULL,
  `diachi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tongtien` float NOT NULL,
  `tenkhachhang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaohang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thanhtoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tinhtrang` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_oder`
--

INSERT INTO `tbl_oder` (`id`, `diachi`, `tongtien`, `tenkhachhang`, `email`, `phone`, `note`, `giaohang`, `thanhtoan`, `tinhtrang`) VALUES
(1, '123', 25000, '123', 'truongcongloi1998@gm', '123', '123', '', 'Thanh toán tại cửa hàng', 'approved'),
(4, '21', 900000, '123', '123@gmail.com', '1123123123', '213', '', 'Thanh toán tại cửa hàng', 'approved'),
(5, '861, Trần Xuân Soạn', 0, 'Phạm Duy Thành', 'thanh_ph_am@outlook.', '0982115492', 'dung giao luc trua', 'Express delivery', 'COD', 'approved'),
(6, '861, Trần Xuân Soạn', 0, 'Phạm Duy Thành', 'thanh_ph_am@outlook.', '0982115492', 'dung giao luc trua', 'Express delivery', 'COD', 'approved'),
(7, '861, Trần Xuân Soạn', 0, 'awfawfawf', 'thanhpham1998@gmail.', '0982115492', 'dung giao luc trua', 'Ordinary Delivery', 'COD', 'Pending'),
(8, '861, Trần Xuân Soạn', 0, 'Le Thi Tu', 'letu@gmail.com', '06546546', 'dung giao luc trua', 'Ordinary Delivery', 'Transfer', 'Pending'),
(9, '861, Trần Xuân Soạn', 0, 'Le Thi Tu', 'letu@gmail.com', '06546546', 'dung giao luc trua', 'Ordinary Delivery', 'Transfer', 'Pending'),
(10, '861, Trần Xuân Soạn', 0, 'Le Thi Tu', 'letu@gmail.com', '06546546', 'dung giao luc trua', 'Ordinary Delivery', 'Transfer', 'Pending'),
(11, '861, Trần Xuân Soạn', 0, 'Pham Van yen', 'yenpham@gmail.com', '0985151515', '', 'Express delivery', 'Transfer', 'Pending'),
(12, '861, Trần Xuân Soạn', 0, 'Pham Van yen', 'yenpham@gmail.com', '0985151515', '', 'Express delivery', 'Transfer', 'Pending'),
(13, '861, Trần Xuân Soạn', 0, 'Pham Van yen', 'yenpham@gmail.com', '0985151515', '', 'Express delivery', 'Transfer', 'Pending'),
(14, '861, Trần Xuân Soạn', 0, 'Pham Van yen', 'yenpham@gmail.com', '0985151515', '', 'Express delivery', 'Transfer', 'Pending'),
(15, '861, Trần Xuân Soạn', 0, 'Pham Van yen', 'yenpham@gmail.com', '0985151515', '', 'Express delivery', 'Transfer', 'Pending'),
(16, '861, Trần Xuân Soạn', 0, 'Phạm Duy Thành', 'thanhpham1998@outloo', '0982115492', 'dung giao luc trua', 'Ordinary Delivery', 'COD', 'Pending'),
(17, '861, Trần Xuân Soạn', 0, 'Phạm Duy Thành', 'thanhpham1998@outloo', '0982115492', 'dung giao luc trua', 'Ordinary Delivery', 'COD', 'Pending'),
(18, '861, Trần Xuân Soạn', 0, 'Phạm Duy Thành', 'thanhpham1998@outloo', '0982115492', 'dung giao luc trua', 'Ordinary Delivery', 'COD', 'Pending'),
(19, '861, Trần Xuân Soạn', 1800000, 'Phạm Duy Thành', 'thanh@outlook.com.vn', '0982115492', 'dung giao luc trua', 'Ordinary Delivery', 'Cash', 'Pending'),
(20, '861, Trần Xuân Soạn', 2700000, 'Phạm Duy Thành', 'thanh_ph_am@outlook.', '0982115492', 'dung giao luc trua', 'Ordinary Delivery', 'COD', 'Pending'),
(21, '861, Trần Xuân Soạn', 3600000, 'PhạmThành', 'hihi@gmail.com', '0982115492', '', 'Ordinary Delivery', 'COD', 'Pending'),
(22, '861, Trần Xuân Soạn', 4500000, 'PhạmThành', 'hihi@gmail.com', '0982115492', '', 'Ordinary Delivery', 'COD', 'Pending'),
(23, '861, Trần Xuân Soạn', 1800000, 'Phạm Duy Thành', 'thanh_ph_am@outlook.', '0982115492', 'dung giao luc trua', 'Ordinary Delivery', 'COD', 'Pending'),
(24, '861, Trần Xuân Soạn', 1800000, 'PhạmThành', 'hihi@gmail.com', '0982115492', '', 'Ordinary Delivery', 'COD', 'Pending'),
(25, '861, Trần Xuân Soạn', 1800000, 'ab', 'haha@gmail.com', '0982115492', '', 'Ordinary Delivery', 'COD', 'Pending'),
(26, '861, Trần Xuân Soạn', 900000, 'ab', 'haha@gmail.com', '0982115492', '', 'Ordinary Delivery', 'COD', 'Pending'),
(27, '14 Chu Hai street', 4500000, 'PhamTuyet', 'phamtuyet4759@gmail.com', '0982115492', 'dung giao luc trua', 'Ordinary Delivery', 'COD', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_oder_detail`
--

CREATE TABLE `tbl_oder_detail` (
  `maOrder` int(10) UNSIGNED NOT NULL,
  `idproduct` int(10) UNSIGNED NOT NULL,
  `soluong` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_oder_detail`
--

INSERT INTO `tbl_oder_detail` (`maOrder`, `idproduct`, `soluong`) VALUES
(1, 74, 1),
(1, 48, 1),
(2, 73, 4),
(3, 72, 5),
(4, 63, 10),
(0, 58, 3),
(0, 71, 1),
(16, 64, 1),
(17, 64, 1),
(18, 64, 1),
(19, 64, 2),
(20, 64, 1),
(20, 61, 2),
(21, 71, 2),
(21, 65, 2),
(22, 71, 2),
(22, 65, 2),
(22, 67, 1),
(23, 58, 2),
(24, 64, 1),
(24, 59, 1),
(25, 58, 2),
(26, 71, 1),
(27, 60, 2),
(27, 65, 2),
(27, 70, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_options`
--

CREATE TABLE `tbl_options` (
  `Id` int(11) NOT NULL,
  `Code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Name` text COLLATE utf8_unicode_ci NOT NULL,
  `Value` text COLLATE utf8_unicode_ci NOT NULL,
  `Note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `STT` int(11) NOT NULL,
  `Groups` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Parent` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_options`
--

INSERT INTO `tbl_options` (`Id`, `Code`, `Name`, `Value`, `Note`, `STT`, `Groups`, `Parent`) VALUES
(1, '1', 'Cash', 'Cash', '', 0, 'HTTT', 0),
(3, '2', 'Transfer', 'Transfer', '', 1, 'HTTT', 0),
(4, '3', 'COD', 'COD', '', 2, 'HTTT', 0),
(5, '1', 'Express delivery', 'Express delivery', '', 0, 'HTGH', 0),
(7, '2', 'Ordinary Delivery', 'Ordinary Delivery', '', 0, 'HTGH', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_session`
--

CREATE TABLE `tbl_order_session` (
  `id` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order_session`
--

INSERT INTO `tbl_order_session` (`id`, `idproduct`, `name`, `color`, `size`) VALUES
(76, 123, 'LEXEBE 2', 'Black', 'L'),
(77, 72, 'LEXEBE 2', 'Blue', 'M'),
(78, 72, 'LEXEBE 2', 'Blue', 'M'),
(79, 72, 'LEXEBE 2', 'Blue', 'M'),
(80, 72, 'LEXEBE 2', 'Black', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploaded_on` datetime NOT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `content`, `image`, `description`, `uploaded_on`, `author`) VALUES
(1, 'LOREM IPSUM DOLOR SIT AMET', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>\r\n', '5.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...', '2019-01-03 16:36:07', 'Trương Công Lợi'),
(2, 'LOREM IPSUM DOLOR SIT AMET', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>\r\n', '6.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...', '2019-01-03 16:36:07', 'Trương Công Lợi'),
(3, 'LOREM IPSUM DOLOR SIT AMET', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>\r\n', '1.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...', '2019-01-03 16:36:07', 'Trương Công Lợi'),
(4, 'LOREM IPSUM DOLOR SIT AMET', '<p>LOREM IPSUM DOLOR SIT AMETLOREM IPSUM DOLOR SIT AMETLOREM IPSUM DOLOR SIT AMETLOREM IPSUM DOLOR SIT AMETLOREM IPSUM DOLOR SIT AMET</p>\r\n', '2.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...', '2019-01-04 14:43:13', 'LoiTruong'),
(10, 'HEHEHEH', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, s, consectetuer adipiscing elit, s , consectetuer adipiscing elit, s', 'heheheh1459.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam non, consectetuer adipiscing elit, s, consectetuer adipiscing elit, s', '2021-05-30 00:00:00', 'Thanh Panda');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `sale` int(11) DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `code`, `price`, `amount`, `image`, `category`, `detail`, `sale`, `description`, `uploaded_on`) VALUES
(58, 'LUXUBU 1', '', 1000000, 100, '20.png', '1', '<p>123</p>\r\n', 900000, '123', '2019-01-03 16:36:07'),
(59, 'LUXUBU 2', '', 1000000, 100, '3.png', '1', '<p>123</p>\r\n', 900000, '123', '2019-01-03 16:36:07'),
(60, 'LEXEBE 3', '', 1000000, 100, '19.png', '2', '<p></p>\r\n', 900000, '<br /><br />\r\n', '2019-01-17 16:25:53'),
(61, 'LUXUBU 4', '', 1000000, 100, '25.png', '3', '<p>123123</p>\r\n', 900000, '23123', '2019-01-03 16:36:07'),
(62, 'LIXIBI 2', '', 1000000, 100, '1.png', '3', '<p>123</p>\r\n', 900000, '123', '2019-01-03 16:36:07'),
(63, 'LIXIBI 3', '', 1000000, 100, '10.png', '3', '<p>123123</p>\r\n', 900000, '123123', '2019-01-03 16:36:07'),
(64, 'LIXIBI 4', '', 1000000, 100, '17.png', '3', '<p>123</p>\r\n', 900000, '123', '2019-01-03 16:36:07'),
(65, 'LIXIBI 5', '', 1000000, 100, '11.png', '3', '<p>123</p>\r\n', 900000, '123', '2019-01-03 16:36:07'),
(66, 'LIXIBI 6', '', 1000000, 100, '12.png', '3', '<p>123</p>\r\n', 900000, '123', '2019-01-03 16:36:07'),
(67, 'LIXIBI 1', '', 1000000, 100, '26.png', '3', '<p>123</p>\r\n', 900000, '123', '2019-01-03 16:36:07'),
(68, 'LIXIBI 7', '', 1000000, 100, '13.png', '3', '<p>123123</p>\r\n', 900000, '12312', '2019-01-03 16:36:07'),
(69, 'LIXIBI 8', '', 1000000, 100, '18.png', '3', '<p>123123</p>\r\n', 900000, '234', '2019-01-03 16:36:07'),
(70, 'LUXUBU 9', '', 1000000, 100, '6.png', '3', '<p>123123</p>\r\n', 900000, '123', '2019-01-03 16:36:07'),
(71, 'LUXUBU 9', 'LUXUBU 9', 1000000, 100, '5.png', '1', '<p>123123</p>\r\n', 900000, '123', '2019-01-04 14:27:02'),
(72, 'LEXEBE 2', 'LEXEBE 2', 1000000, 100, '20.png', '2', '<p>123123123</p>\r\n', 900000, '123123123', '2019-01-04 14:48:11'),
(73, 'LEXEBE 3', 'LEXEBE 3', 1000000, 100, '13.png', '2', '<p>12312312</p>\r\n', 900000, '123123', '2019-01-04 14:47:42'),
(74, 'LEXEBE 4', 'LEXEBE 4', 1000000, 100, '20.png', '2', '<p>ortis.</p>\r\n', 900000, 'Nunc facilisi', '2019-01-04 16:08:16'),
(75, 'LAXABA', 'LAXABA', 1000000, 100, '8.png', '4', '<p>Lidunt.</p>\r\n', 80000, 'my nibh e.', '2019-01-17 17:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `randomKey` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `name`, `email`, `phone`, `address`, `password`, `randomKey`) VALUES
('Admin', 'Admin', 'admin@gmail.com', '0868313206', 'HCM', '202cb962ac59075b964b07152d234b70', ''),
('Boy', 'ab', 'haha@gmail.com', '0982115492', '861, Trần Xuân Soạn', '86e54dd9e44bc962a6e4028fe776a3a2b9419a34', '99af35819ccb5b3a98e890660dea761a78ed1a61'),
('Carol', 'PhamTuyet', 'phamtuyet4759@gmail.com', '0982115492', '14 Chu Hai street', 'b8cc3777a9edd3941a2639804bea72b86aa57657', 'dcfaf89551f460c51c7ff91e2a56c9b84030dd43'),
('Girl', 'PhạmThành', 'hihi@gmail.com', '0982115492', '861, Trần Xuân Soạn', 'd5c8cb3b2520c19e5258ed01073e854783d0655a', '45460ec36c0b3eb3bab33820c60eb68351251808'),
('Mina', 'MiNa Pham', 'thanhpangda@gmail.com', '0982112312', '861, Trần Xuân ', '8cb2237d0679ca88db6464eac60da96345513964', 'b1ee8770ec54b587536d7ab8e4778a59a1e20934'),
('pandasama', 'PhạmThành Duy', 'thanhpham2000@outlook.com.vn', '0982115411', 'Chu Hai street', '7e8db09b361d882adb07b6f0d4602d661e6808a4', '2cb4aeb6ef1cead67f1bfa1234a5579b87fb3eb9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_img_product`
--
ALTER TABLE `tbl_img_product`
  ADD PRIMARY KEY (`idpost`);

--
-- Indexes for table `tbl_oder`
--
ALTER TABLE `tbl_oder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_options`
--
ALTER TABLE `tbl_options`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Code` (`Code`,`Groups`);

--
-- Indexes for table `tbl_order_session`
--
ALTER TABLE `tbl_order_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_img_product`
--
ALTER TABLE `tbl_img_product`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_oder`
--
ALTER TABLE `tbl_oder`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_options`
--
ALTER TABLE `tbl_options`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_order_session`
--
ALTER TABLE `tbl_order_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
