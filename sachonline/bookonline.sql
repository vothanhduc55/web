-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2018 at 09:16 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `book_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `book_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `book_author` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `book_amount` int(11) NOT NULL,
  `book_ UnitPrice` int(11) NOT NULL,
  `punisher_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `book_image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_type`, `book_name`, `book_author`, `book_amount`, `book_ UnitPrice`, `punisher_id`, `book_image`) VALUES
('bk001', 'VH', 'cuốn theo chiều gió', 'văn cao', 100, 35000, 'pun1', ''),
('bk002', 'KT', 'Mạch điện tử', 'Trần Văn Tiến', 20, 200000, 'pun3', 'img1.jpg'),
('bk003', 'KT', 'Toán Số', 'Ngọc Nga', 300, 20000, 'pun2', NULL),
('bk004', 'KT', 'Đại số tuyến tính', 'không biết', 3000, 100500, 'pun1', NULL),
('bk005', 'KT', 'Vi mạch vi mô', 'Cù lê Hoàng', 124, 20000, 'pun3', NULL),
('bk006', 'KT', 'Giải tích 1', 'Lê Minh Triết', 192, 50000, 'pun2', NULL),
('bk007', 'KT', 'GIải Tích 2', 'Lê Xuân Việt', 243, 20000, 'pun1', NULL),
('bk008', 'KT', 'Nhập môn kĩ thuật', 'Nguyễn Văn A', 421, 75000, 'pun1', NULL),
('bk009', 'KT', 'Lắp ghép robot', 'Trần Yến Nhi', 321, 25000, 'pun2', NULL),
('bk010', 'KT', 'Hệ Thống mạng lưới điện', 'Nguyễn Văn B', 78, 80000, 'pun3', NULL),
('bk011', 'VH', 'Nỗi buồn chiến tranh', 'Bảo Ninh', 3500, 65000, 'pun2', NULL),
('bk012', 'VH', 'Chí Phèo', 'Nam Cao', 800, 20000, 'pun1', NULL),
('bk013', 'TA', 'Tiếng Anh cho người mới bắt dầu ', 'James Vangos', 300, 12000, 'pun2', NULL),
('bk014', 'TN', 'Truyện cổ tích dân gian', 'Văn Liên', 243, 30000, 'pun2', NULL),
('bk015', 'TT', 'Doraemon Chú mèo máy tương lai toàn tập', 'Fujiko Fujio', 300, 15000, 'pun2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `book_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `order_phone` int(11) NOT NULL,
  `order_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_amount` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `book_id`, `user_id`, `order_phone`, `order_email`, `order_amount`, `order_date`) VALUES
('ord1', 'bk001', 'USR1', 935140297, '17/2 Phạm Ngọc Thạch', 2, '2018-07-27 10:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `punisher`
--

CREATE TABLE `punisher` (
  `punisher_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `punisher_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `punisher_address` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `punisher`
--

INSERT INTO `punisher` (`punisher_id`, `punisher_name`, `punisher_address`) VALUES
('pun1', 'NXB Khoa học và kĩ thuật', '17 Hà Nội'),
('pun2', 'NXB Kim Đồng', '23 Hàng Giấy Hà Nội'),
('pun3', 'NXB Đại học quốc gia', '32 Nguyễn Công Trứ,Quy Nhơn');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_password`, `user_address`, `user_name`) VALUES
('USR1', 'flower', '21 parker street', 'vothanhduc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_username`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_punisher_id` (`punisher_id`),
  ADD KEY `fk_book_type` (`book_type`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_book_id` (`book_id`);

--
-- Indexes for table `punisher`
--
ALTER TABLE `punisher`
  ADD PRIMARY KEY (`punisher_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_book_type` FOREIGN KEY (`book_type`) REFERENCES `type_book` (`book_type`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_punisher_id` FOREIGN KEY (`punisher_id`) REFERENCES `punisher` (`punisher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
