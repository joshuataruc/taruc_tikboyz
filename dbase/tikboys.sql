-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 04:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tikboys`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_names` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_names`) VALUES
(1, 'toyota'),
(2, 'honda'),
(3, 'suzuki'),
(4, 'yamaha'),
(9, 'rusi');

-- --------------------------------------------------------

--
-- Table structure for table `sales_tbl`
--

CREATE TABLE `sales_tbl` (
  `sales_id` int(11) NOT NULL,
  `item_brand` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `item_qty` int(255) NOT NULL,
  `item_price` int(50) NOT NULL,
  `date_sales` date NOT NULL DEFAULT current_timestamp(),
  `time_sales` time NOT NULL DEFAULT current_timestamp(),
  `customer_name` varchar(50) NOT NULL,
  `customer_cont_num` int(15) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `seller` varchar(50) NOT NULL,
  `OR_num` varchar(10) NOT NULL,
  `AR_num` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_tbl`
--

INSERT INTO `sales_tbl` (`sales_id`, `item_brand`, `item_name`, `item_code`, `item_qty`, `item_price`, `date_sales`, `time_sales`, `customer_name`, `customer_cont_num`, `customer_address`, `seller`, `OR_num`, `AR_num`) VALUES
(10, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-09-25', '20:21:30', 'a', 2, 'asd', '', '', ''),
(11, 'toyota', 'break', 'toyota_12', 1, 10000, '2020-09-25', '20:21:30', 'a', 2, 'asd', '', '', ''),
(12, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-09-25', '20:21:30', 'a', 2, 'asd', '', '', ''),
(13, 'toyota', 'break', 'toyota_12', 1, 10000, '2020-09-25', '20:21:30', 'asd', 514456454, 'asdasd', 'admin', '', ''),
(14, 'toyota', 'break', 'toyota_12', 1, 10000, '2020-09-25', '20:21:30', 'a', 5, 'asd', 'admin', '', ''),
(15, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-09-25', '20:21:30', 'a', 5, 'asd', 'admin', '', ''),
(16, 'suzuki', 'tire', 'suzuki_10', 2, 3000, '2020-09-27', '20:21:30', 'josh', 2147483647, 'san jose tc\r\n', 'admin', '', ''),
(17, 'toyota', 'break', 'toyota_12', 2, 1000, '2020-09-28', '20:21:30', 'john doe', 2147483647, 'tarlac city\r\n', 'admin', '', ''),
(18, 'toyota', 'break', 'toyota_12', 2, 1000, '2020-09-28', '20:21:30', 'john doe', 2147483647, 'tarlac city\r\n', 'admin', '', ''),
(19, 'suzuki', 'tire', 'suzuki_10', 3, 3000, '2020-09-28', '20:21:30', 'john doe', 2147483647, 'tarlac city\r\n', 'admin', '', ''),
(20, 'toyota', 'radiator', 'toyota_11', 2, 20000, '2020-09-28', '20:21:30', 'kim jung eun', 2147483647, 'korea\r\n', 'admin', '', ''),
(21, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-09-28', '20:21:30', 'qwe', 455, 'asdasd', 'admin', '', ''),
(22, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-09-28', '20:21:30', 'qwe', 12221, 'asdasd', 'admin', '', ''),
(23, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-09-28', '20:21:30', 'sdasd', 654654464, 'ajshdvjahvdjhasd', 'admin', '', ''),
(24, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-09-28', '20:21:30', 'rtyrty', 222, 'gfhfghfg', 'admin', '', ''),
(25, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-09-28', '20:21:30', 'ewrwer', 22, 'werwe', 'admin', '', ''),
(26, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-09-28', '20:21:30', 'asdas', 333, 'fdasdasdasd', 'admin', '', ''),
(27, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-09-28', '20:21:30', 'sdf', 232, 'werwre', 'admin', '', ''),
(28, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-09-28', '20:21:30', 'Dandref Reyes', 2147483647, 'Tibag TC', 'admin', '', ''),
(29, 'toyota', 'break', 'toyota_12', 3, 1000, '2020-09-30', '20:21:30', 'john', 222222, 'tarlac city', 'admin', '', ''),
(30, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-09-30', '20:21:30', 'john', 222222, 'tarlac city', 'admin', '', ''),
(31, 'honda', 'gas pedal', 'honda_b1', 1, 2000, '2020-09-30', '20:21:30', 'asda', 55, 'asdasdsda', 'admin', '', ''),
(32, 'honda', 'gas pedal', 'honda_b1', 1, 2000, '2020-09-30', '20:21:30', 'sd', 33, 'asdasd', 'admin', '', ''),
(33, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-05', '20:21:30', 'a', 254524, 'asdasda', 'admin', '', ''),
(34, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-05', '20:21:30', 'asd', 55, 'asdasdads', 'admin', '', ''),
(35, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-10-05', '20:21:30', 'asd', 0, 'asdasdasd', 'admin', '', ''),
(36, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-05', '20:21:30', 'asd', 0, 'asdasdasd', 'admin', '', ''),
(37, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-10-05', '20:21:30', 'a', 0, 'a', 'admin', '', ''),
(38, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-10-05', '20:21:30', 'a', 0, 'asdasda', 'admin', '', ''),
(39, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-10-05', '20:21:30', 'a', 0, 'a', 'admin', '', ''),
(40, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-10-05', '20:21:30', '', 0, '', 'admin', '', ''),
(41, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-05', '20:21:30', 'asdasd', 6363, 'asdasd', 'admin', '', ''),
(42, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-05', '20:21:30', 'asdasd', 4554, 'asdasdadasdasdqweqwe', 'admin', '', ''),
(43, 'yamaha', 'tire', 'yamaha_t1', 1, 1000, '2020-10-05', '20:21:30', 'qwer', 654564, 'sadfsdfs', 'admin', '', ''),
(44, 'honda', 'gas pedal', 'honda_b1', 1, 2000, '2020-10-05', '20:21:30', 'qweqwe', 35454, 'asdasdadasd', 'admin', '', ''),
(45, 'toyota', 'break', 'toyota_12', 1, 1000, '2020-10-05', '20:21:30', 'asdasd', 654654, 'asdasdasd', 'admin', '', ''),
(46, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-05', '20:21:30', 'qweq', 564565, 'asdasdasd', 'admin', '', ''),
(47, 'toyota', 'break', 'toyota_12', 1, 1000, '2020-10-05', '20:21:30', 'qweq', 4564654, 'asdasda', 'admin', '', ''),
(48, 'toyota', 'break', 'toyota_12', 1, 1000, '2020-10-05', '20:21:30', 'zxczxc', 4546, 'asdfdfsdfwe', 'admin', '', ''),
(49, 'yamaha', 'tire', 'yamaha_t1', 1, 1000, '2020-10-05', '20:21:30', 'qweqwe', 6465456, 'sdasdasd', 'admin', '', ''),
(50, 'honda', 'gas pedal', 'honda_b1', 1, 2000, '2020-10-05', '20:21:30', 'a', 2, 'ASD', 'admin', '', ''),
(51, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-10-05', '20:21:30', 'qeqwe', 321321, 'asdasdads', 'admin', '', ''),
(52, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-10-05', '20:21:30', 'asdasd', 12332, 'dasdasd', 'admin', '', ''),
(53, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-10-05', '20:21:30', 'asdas', 3223, 'asdasdad', 'admin', '', ''),
(54, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-10-05', '20:21:30', 'sdasd', 11, 'asdads', 'admin', '', ''),
(55, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-05', '20:21:30', 'qwe', 5254646, 'asdasd', 'staff', '', ''),
(56, 'toyota', 'break', 'toyota_12', 1, 1000, '2020-10-05', '20:21:30', 'xcz', 5545, 'asasdad', 'staff', '', ''),
(57, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-10-05', '20:21:30', 'daz', 2556456, 'asdasdasd', 'staff', '', ''),
(58, 'honda', 'gas pedal', 'honda_b1', 1, 2000, '2020-10-05', '20:21:30', 'qweqwe', 5456, 'asdasdas', 'staff', '', ''),
(59, 'yamaha', 'tire', 'yamaha_t1', 1, 1000, '2020-10-05', '20:21:30', 'qweqwe', 22002, 'sdasdasdasd', 'staff', '', ''),
(60, 'honda', 'gas pedal', 'honda_b1', 1, 2000, '2020-10-05', '20:21:30', 'qweqwe', 145141, 'asdasdasd', 'staff', '', ''),
(61, 'yamaha', 'tire', 'yamaha_t1', 1, 1000, '2020-10-05', '20:21:30', 'asdsad', 47, 'asdasdasdasd', 'staff', '', ''),
(62, 'yamaha', 'tire', 'yamaha_t1', 1, 1000, '2020-10-05', '20:21:30', 'qweqwe', 2525, 'asdasdasdasdasda', 'staff', '', ''),
(63, 'toyota', 'break', 'toyota_12', 1, 1000, '2020-10-05', '20:21:30', 'jihn', 545454, 'asdasdasd', 'staff', '', ''),
(64, 'yamaha', 'tire', 'yamaha_t1', 1, 1000, '2020-10-05', '20:21:30', 'jhin', 9152625, 'asdasdasdasd', 'staff', '', ''),
(65, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-10-05', '20:21:30', 'jhin', 9152625, 'asdasdasdasd', 'staff', '', ''),
(66, 'honda', 'gas pedal', 'honda_b1', 1, 2000, '2020-10-05', '20:21:30', 'asdasd', 545, 'qwer', 'staff', '', ''),
(67, 'toyota', 'break', 'toyota_12', 2, 1000, '2020-10-08', '20:21:30', 'johndie', 2147483647, 'san jose tarkac city', 'staff', '', ''),
(68, 'honda', 'gas pedal', 'honda_b1', 1, 2000, '2020-10-08', '20:21:30', 'johndie', 2147483647, 'san jose tarkac city', 'staff', '', ''),
(69, 'yamaha', 'tire', 'yamaha_t1', 4, 1000, '2020-10-08', '20:21:30', 'fsdf', 45545, 'fsdfvb', 'admin', '', ''),
(70, 'toyota', 'break', 'toyota_12', 2, 1000, '2020-10-08', '20:21:30', 'fsdf', 45545, 'fsdfvb', 'admin', '', ''),
(71, 'toyota', 'break', 'toyota_12', 2, 1000, '2020-10-08', '20:21:30', 'qweqweqwe', 848484, 'asdasd', 'admin', '', ''),
(72, 'yamaha', 'tire', 'yamaha_t1', 4, 1000, '2020-10-08', '20:21:30', 'qweqweqwe', 848484, 'asdasd', 'admin', '', ''),
(73, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-08', '20:21:30', 'a', 2, 'as', 'admin', '', ''),
(74, 'toyota', 'radiator', 'toyota_11', 2, 20000, '2020-10-08', '20:21:30', 'asd', 151, 'asdasd', 'admin', '', ''),
(75, 'honda', 'gas pedal', 'honda_b1', 2, 2000, '2020-10-08', '20:21:30', 'a', 2, 'as', 'admin', '', ''),
(76, 'honda', 'gas pedal', 'honda_b1', 2, 2000, '2020-10-08', '20:21:30', 'asdasd', 94814, 'asasdadasd', 'admin', '', ''),
(77, 'suzuki', 'tire', 'suzuki_10', 2, 3000, '2020-10-08', '20:21:30', 'zxcx', 41041, 'asdasdasd', 'admin', '', ''),
(78, 'toyota', 'break', 'toyota_12', 1, 1000, '2020-10-08', '20:21:30', 'zxcx', 41041, 'asdasdasd', 'admin', '', ''),
(79, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-08', '20:21:30', 'asdas', 5456456, 'sasdasdasd', 'admin', '', ''),
(80, 'toyota', 'break', 'toyota_12', 2, 1000, '2020-10-08', '20:21:30', 'asdas', 5456456, 'sasdasdasd', 'admin', '', ''),
(81, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-08', '20:21:30', 'john doe', 2147483647, 'calingcuan tarlac city\r\n', 'admin', '', ''),
(82, 'toyota', 'break', 'toyota_12', 2, 1000, '2020-10-08', '20:21:30', 'john doe', 2147483647, 'calingcuan tarlac city\r\n', 'admin', '', ''),
(83, 'toyota', 'break', 'toyota_12', 1, 1000, '2020-10-08', '20:21:30', 'q', 12, 'asdasd', 'admin', '', ''),
(84, 'toyota', 'break', 'toyota_12', 1, 1000, '2020-10-08', '20:21:30', 'jin', 2147483647, 'momoe', 'admin', '', ''),
(85, 'toyota', 'radiator', 'toyota_11', 4, 20000, '2020-10-13', '20:21:30', 'john doe', 2050524, 'asdasdasdad', 'admin', '', ''),
(86, 'honda', 'gas pedal', 'honda_b1', 2, 2000, '2020-10-13', '20:21:30', 'john doe', 2050524, 'asdasdasdad', 'admin', '', ''),
(87, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-13', '20:22:07', 'a', 6, 'asd', 'admin', '', ''),
(88, 'honda', 'gas pedal', 'honda_b1', 1, 2000, '2020-10-14', '14:02:50', 'a', 528, 'asdasd', 'admin', '', ''),
(89, 'honda', 'gas pedal', 'honda_b1', 1, 2000, '2020-10-14', '14:04:51', 'sda', 55545, 'asdasda', 'admin', '', ''),
(90, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-10-14', '14:06:39', 'asdasd', 5484, 'qweqwe', 'admin', '', ''),
(91, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-25', '19:23:30', '1', 1, '1', 'admin', '', ''),
(92, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-25', '19:24:29', 'asd', 13186, 'asdasdad', 'admin', '', ''),
(93, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-25', '19:26:35', 'asd', 241548548, 'sfsdssf', 'admin', '', ''),
(94, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-10-25', '22:49:10', 'asd', 5454, 'asdasdasd', 'admin', '', ''),
(95, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-11-02', '08:44:55', 'asd', 2147483647, 'san jose', 'admin', '', ''),
(96, 'yamaha', 'tire', 'yamaha_t1', 3, 1000, '2020-11-03', '20:30:42', 'asdasdas', 45555, 'asdasdasdasasdasd', 'admin', '', ''),
(97, 'rusi', 'preno', 'rusi_1', 2, 1, '2020-11-03', '20:35:20', 'qqq', 2222, 'qweqweq', 'admin', '', ''),
(98, 'yamaha', 'tire', 'yamaha_t1', 3, 3000, '2020-11-03', '20:36:39', 'q', 2, 'asdf', 'admin', '', ''),
(99, 'rusi', 'preno', 'rusi_1', 3, 1500, '2020-11-03', '20:37:27', 'q', 1, 'asd', 'admin', '', ''),
(100, 'toyota', 'radiator', 'toyota_11', 3, 60000, '2020-11-08', '17:59:38', 'a', 88, 'a', 'admin', '', ''),
(101, 'toyota', 'gulong', 'toyotaG_1', 1, 1500, '2020-12-04', '21:25:06', 'lance', 2147483647, 'pdab\r\n', 'admin', '', ''),
(102, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-12-10', '20:22:50', 'john', 212121, 'asasdasasdas', 'admin', '', ''),
(103, 'toyota', 'break', 'toyota_12', 1, 1000, '2020-12-10', '21:04:17', 'a', 66, 'asdasdasd', 'admin', '', ''),
(104, 'honda', 'gas pedal', 'honda_b1', 1, 2000, '2020-12-10', '21:10:55', 'aa', 6, 'asdasdasd', 'admin', '', ''),
(105, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-12-10', '21:11:41', 'a', 69, 'asdasd', 'admin', '', ''),
(106, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-12-10', '21:12:10', 'a', 69, 'asdasd', 'admin', '', ''),
(107, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-12-10', '21:12:28', 'a', 69, 'asdasd', 'admin', '', ''),
(108, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-12-10', '21:20:32', 'a', 69, 'asdasd', 'admin', '', ''),
(109, 'suzuki', 'tire', 'suzuki_10', 1, 3000, '2020-12-10', '21:22:10', 'a', 69, 'asdasd', 'admin', '', ''),
(110, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-12-10', '22:03:51', 'asd', 36, 'asdasdas', 'admin', '', ''),
(111, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-12-10', '22:07:04', 'asd', 36, 'asdasdas', 'admin', '', ''),
(112, 'honda', 'gas pedal', 'honda_b1', 1, 2000, '2020-12-10', '22:10:12', 'cena ', 55555, 'addddd', 'admin', '', ''),
(113, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-12-10', '22:10:50', 'kkk', 22, 'kkkkkkiii', 'admin', '', ''),
(114, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-12-10', '22:21:49', 'asda', 22, 'asdasd', 'admin', 'asda5', '114'),
(115, 'yamaha', 'tire', 'yamaha_t1', 1, 1000, '2020-12-10', '22:29:43', 'a', 1, 'asd', 'admin', 'as5', '115'),
(116, 'rusi', 'preno', 'rusi_1', 1, 500, '2020-12-10', '22:47:17', 'sadasd', 22, 'asdasda', 'admin', '22536', '116'),
(117, 'honda', 'gas pedal', 'honda_b1', 1, 2000, '2020-12-10', '22:48:59', 'fg', 22, 'asdddddd', 'admin', 'asd', '117'),
(118, 'toyota', 'radiator', 'toyota_11', 1, 20000, '2020-12-10', '22:49:00', 'fg', 22, 'asdddddd', 'admin', 'asd', '118'),
(119, 'suzuki', 'tire', 'suzuki_10', 4, 12000, '2020-12-10', '22:55:21', 'qqqq', 555, 'san jose\r\n', 'admin', '5454q', '119'),
(120, 'toyota', 'break', 'toyota_12', 2, 2000, '2020-12-10', '22:55:21', 'qqqq', 555, 'san jose\r\n', 'admin', '5454q', '120'),
(121, 'toyota', 'gulong', 'toyotaG_1', 1, 1500, '2020-12-10', '22:57:53', 'q', 5, 'sd', 'admin', 'ds', '121'),
(122, 'toyota', 'gulong', 'toyotaG_1', 1, 1500, '2020-12-10', '22:58:25', 'sa', 22, 'asdasdasdasd', 'admin', '', '122'),
(123, 'yamaha', 'tire', 'yamaha_t1', 1, 1000, '2020-12-10', '22:58:26', 'sa', 22, 'asdasdasdasd', 'admin', '', '123'),
(124, 'yamaha', 'tire', 'yamaha_t1', 1, 1000, '2020-12-10', '23:10:51', 'asd', 55, 'asdasd', 'admin', '', '124'),
(125, 'yamaha', 'tire', 'yamaha_t1', 1, 1000, '2020-12-10', '23:13:43', 'a', 3, 'asd', 'admin', '', '125');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `price` int(50) NOT NULL,
  `item_img` varchar(255) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `brand_name`, `item_name`, `description`, `item_code`, `supplier`, `quantity`, `price`, `item_img`, `date_updated`) VALUES
(1, 'toyota', 'radiator', 'jsbgfskfs\r\n', 'toyota_11', 'toyota', '12', 20000, 'HTB1JHiQm7UmBKNjSZFOq6yb2XXak.jpg', '2020-09-19 00:00:00'),
(3, 'toyota', 'break', 'break for your car', 'toyota_12', 'toyota', '14', 1000, 'is-it-bad-if-your-brake-pedal-goes-to-the-floor-1.jpg', '2020-09-19 00:00:00'),
(7, 'suzuki', 'tire', 'asdasdasda', 'suzuki_10', 'yamaha', '14', 3000, 'tire.jpg', '2020-09-19 00:00:00'),
(9, 'yamaha', 'tire', 'qweerty', 'yamaha_t1', 'josh', '14', 1000, 'tire.jpg', '2020-09-30 00:00:00'),
(10, 'honda', 'gas pedal', 'qweqweqweqwe', 'honda_b1', 'josh', '11', 2000, '89512592-accelerator-and-break-pedal-in-car.jpg', '2020-09-30 00:00:00'),
(13, 'rusi', 'preno', 'asdasdwerr', 'rusi_1', 'john doe inc', '14', 500, 'ipadd.PNG', '2020-10-08 00:00:00'),
(14, 'toyota', 'gulong', 'asdasdad', 'toyotaG_1', 'john doe inc', '17', 1500, 'house.png', '2020-12-04 21:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_tbl`
--

CREATE TABLE `supplier_tbl` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_brand` varchar(255) NOT NULL,
  `supplier_address` varchar(255) NOT NULL,
  `supplier_cont_person` varchar(255) NOT NULL,
  `supplier_number` varchar(20) NOT NULL,
  `supplier_email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_tbl`
--

INSERT INTO `supplier_tbl` (`supplier_id`, `supplier_name`, `supplier_brand`, `supplier_address`, `supplier_cont_person`, `supplier_number`, `supplier_email`) VALUES
(2, 'josh', 'yamaha', 'san jose', 'josh taruc', '09154252542', 'imtaruc25@gmail.com'),
(3, 'john doe inc', 'suzuki', 'sta monica', 'john doe', '1955558', 'john@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `access_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `password`, `access_type`) VALUES
(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'staff', 'staff', 'staff', '1253208465b1efa876f982d8a9e73eef', 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `sales_tbl`
--
ALTER TABLE `sales_tbl`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales_tbl`
--
ALTER TABLE `sales_tbl`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
