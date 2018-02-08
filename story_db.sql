-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2018 at 11:50 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `story_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `booking_status` enum('cart','payment_waiting','confirm','used','cancelled','expired') DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `time_start` datetime DEFAULT NULL,
  `time_end` datetime DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `member_id`, `booking_status`, `total_price`, `time_start`, `time_end`, `create_date`) VALUES
(2, 1, 'cart', NULL, NULL, NULL, NULL),
(5, 2, 'cart', NULL, NULL, NULL, NULL),
(6, 3, 'cart', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_lists`
--

CREATE TABLE `booking_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `type` enum('group','list') NOT NULL DEFAULT 'list',
  `nail_group_id` int(11) DEFAULT NULL,
  `nail_list_id` int(11) DEFAULT NULL,
  `nail_group_name` varchar(255) DEFAULT NULL,
  `nail_list_name` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_lists`
--

INSERT INTO `booking_lists` (`id`, `booking_id`, `type`, `nail_group_id`, `nail_list_id`, `nail_group_name`, `nail_list_name`, `price`, `qty`, `amount`) VALUES
(29, 2, 'list', 9, 42, 'Black White 03 -finger', 'Black White 03-2 (finger)', 5, 5, 25),
(31, 2, 'list', 9, 41, 'Black White 03 -finger', 'Black White 03-1 (finger)', 25, 1, 25),
(32, 2, 'list', 9, 45, 'Black White 03 -finger', 'Black White 03-5 (finger)', 5, 1, 5),
(33, 4, 'list', 29, 142, 'Snow White 05 -toe', 'Snow White 05-2 (toe)', 5, 2, 10),
(34, 4, 'list', 29, 141, 'Snow White 05 -toe', 'Snow White 05-1 (toe)', 5, 1, 5),
(35, 5, 'list', 29, 145, 'Snow White 05 -toe', 'Snow White 05-5 (toe)', 20, 1, 20),
(36, 6, 'list', 4, 20, 'Chin-jang 02 -finger', 'Chin-jang 02-5 (finger)', 10, 7, 70),
(37, 6, 'list', 4, 16, 'Chin-jang 02 -finger', 'Chin-jang 02-1 (finger)', 15, 2, 30),
(38, 6, 'list', 4, 18, 'Chin-jang 02 -finger', 'Chin-jang 02-3 (finger)', 15, 2, 30),
(39, 6, 'list', 4, 19, 'Chin-jang 02 -finger', 'Chin-jang 02-4 (finger)', 10, 3, 30);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `pic`) VALUES
(1, 'Cartoon', NULL),
(2, 'Halloween xxx', NULL),
(3, 'Princess', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `last_name`, `tel`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', '0880000000', 'admin@admin.com', '1234', '2018-02-03 13:39:36', '2018-02-03 13:39:36'),
(2, 'Employ 1', 'Employ', '0880000000', 'emp1@test.com', '1111111', '2018-02-03 13:39:36', '2018-02-03 13:39:36'),
(3, 'Employ 2', 'Employ', '0880000000', 'emp2@test.com', '1111111', '2018-02-03 13:39:36', '2018-02-03 13:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `last_name`, `tel`, `email`, `password`) VALUES
(1, 'Admin', 'Admin', '0880000000', 'admin@admin.com', '1234'),
(2, 'Cherry', 'Pink Member', '0880000000', 'cherry@cherry.com', '1111111'),
(3, 'Member', 'Member', '0880000000', 'member@member.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(295, '2014_10_12_000000_create_users_table', 1),
(296, '2014_10_12_100000_create_password_resets_table', 1),
(297, '2018_01_23_181739_create_collections_table', 1),
(298, '2018_01_23_181756_create_members_table', 1),
(299, '2018_01_23_181801_create_member_types_table', 1),
(300, '2018_01_27_174015_create_nail_groups_table', 1),
(301, '2018_01_27_174049_create_nail_types_table', 1),
(302, '2018_01_27_174055_create_nail_lists_table', 1),
(303, '2018_01_28_031842_create_employees_table', 1),
(304, '2018_02_01_164217_create_bookings_table', 1),
(305, '2018_02_01_164246_create_booking_lists_table', 1),
(306, '2018_02_01_164606_create_booking_statuses_table', 1),
(307, '2018_02_03_200028_create_time_slots_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nail_groups`
--

CREATE TABLE `nail_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `suggestion` int(10) UNSIGNED DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nail_groups`
--

INSERT INTO `nail_groups` (`id`, `name`, `suggestion`, `pic`) VALUES
(1, 'Chin-jang -finger', 0, 'uploads/ch-00.jpg'),
(2, 'Snow White -finger', 1, 'uploads/sn-00.jpg'),
(3, 'Black White -finger', 0, 'uploads/bw-00.jpg'),
(4, 'Chin-jang 02 -finger', 1, 'uploads/ch-00.jpg'),
(5, 'Snow White 02 -finger', 0, 'uploads/sn-00.jpg'),
(6, 'Black White 02 -finger', 0, 'uploads/bw-00.jpg'),
(7, 'Chin-jang 03 -finger', 0, 'uploads/ch-00.jpg'),
(8, 'Snow White 03 -finger', 0, 'uploads/sn-00.jpg'),
(9, 'Black White 03 -finger', 1, 'uploads/bw-00.jpg'),
(10, 'Chin-jang 04 -finger', 0, 'uploads/ch-00.jpg'),
(11, 'Snow White 04 -finger', 0, 'uploads/sn-00.jpg'),
(12, 'Black White 04 -finger', 1, 'uploads/bw-00.jpg'),
(13, 'Chin-jang 05 -finger', 1, 'uploads/ch-00.jpg'),
(14, 'Snow White 05 -finger', 1, 'uploads/sn-00.jpg'),
(15, 'Black White 05 -finger', 1, 'uploads/bw-00.jpg'),
(16, 'Chin-jang -toe', 0, 'uploads/ch-00.jpg'),
(17, 'Snow White -toe', 1, 'uploads/sn-00.jpg'),
(18, 'Black White -toe', 0, 'uploads/bw-00.jpg'),
(19, 'Chin-jang 02 -toe', 1, 'uploads/ch-00.jpg'),
(20, 'Snow White 02 -toe', 0, 'uploads/sn-00.jpg'),
(21, 'Black White 02 -toe', 0, 'uploads/bw-00.jpg'),
(22, 'Chin-jang 03 -toe', 0, 'uploads/ch-00.jpg'),
(23, 'Snow White 03 -toe', 0, 'uploads/sn-00.jpg'),
(24, 'Black White 03 -toe', 1, 'uploads/bw-00.jpg'),
(25, 'Chin-jang 04 -toe', 0, 'uploads/ch-00.jpg'),
(26, 'Snow White 04 -toe', 0, 'uploads/sn-00.jpg'),
(27, 'Black White 04 -toe', 1, 'uploads/bw-00.jpg'),
(28, 'Chin-jang 05 -toe', 1, 'uploads/ch-00.jpg'),
(29, 'Snow White 05 -toe', 1, 'uploads/sn-00.jpg'),
(30, 'Black White 05 -toe', 1, 'uploads/bw-00.jpg'),
(31, 'test', NULL, 'http://localhost/story-master/admin/uploads/nail-group/group-20180204150247.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nail_lists`
--

CREATE TABLE `nail_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `detail` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `qty_set` int(11) DEFAULT NULL,
  `collection_id` int(10) UNSIGNED DEFAULT NULL,
  `nail_group_id` int(10) UNSIGNED DEFAULT NULL,
  `nail_type_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nail_lists`
--

INSERT INTO `nail_lists` (`id`, `name`, `detail`, `type`, `price`, `pic`, `qty_set`, `collection_id`, `nail_group_id`, `nail_type_id`) VALUES
(1, 'Chin-jang-1 (finger)', 'ch', NULL, 25, 'uploads/ch-01.jpg', NULL, 1, 1, 1),
(2, 'Chin-jang-2 (finger)', 'ch', NULL, 20, 'uploads/ch-02.jpg', NULL, 1, 1, 1),
(3, 'Chin-jang-3 (finger)', 'ch', NULL, 15, 'uploads/ch-03.jpg', NULL, 1, 1, 1),
(4, 'Chin-jang-4 (finger)', 'ch', NULL, 25, 'uploads/ch-04.jpg', NULL, 1, 1, 1),
(5, 'Chin-jang-5 (finger)', 'ch', NULL, 15, 'uploads/ch-05.jpg', NULL, 1, 1, 1),
(6, 'Snow White-1 (finger)', 'sn', NULL, 20, 'uploads/sn-01.jpg', NULL, 3, 2, 1),
(7, 'Snow White-2 (finger)', 'sn', NULL, 20, 'uploads/sn-02.jpg', NULL, 3, 2, 1),
(8, 'Snow White-3 (finger)', 'sn', NULL, 10, 'uploads/sn-03.jpg', NULL, 3, 2, 1),
(9, 'Snow White-4 (finger)', 'sn', NULL, 25, 'uploads/sn-04.jpg', NULL, 3, 2, 1),
(10, 'Snow White-5 (finger)', 'sn', NULL, 10, 'uploads/sn-05.jpg', NULL, 3, 2, 1),
(11, 'Black White-1 (finger)', 'bw', NULL, 20, 'uploads/bw-01.jpg', NULL, 2, 3, 1),
(12, 'Black White-2 (finger)', 'bw', NULL, 10, 'uploads/bw-02.jpg', NULL, 2, 3, 1),
(13, 'Black White-3 (finger)', 'bw', NULL, 10, 'uploads/bw-03.jpg', NULL, 2, 3, 1),
(14, 'Black White-4 (finger)', 'bw', NULL, 25, 'uploads/bw-04.jpg', NULL, 2, 3, 1),
(15, 'Black White-5 (finger)', 'bw', NULL, 20, 'uploads/bw-05.jpg', NULL, 2, 3, 1),
(16, 'Chin-jang 02-1 (finger)', 'ch', NULL, 15, 'uploads/ch-01.jpg', NULL, 1, 4, 1),
(17, 'Chin-jang 02-2 (finger)', 'ch', NULL, 20, 'uploads/ch-02.jpg', NULL, 1, 4, 1),
(18, 'Chin-jang 02-3 (finger)', 'ch', NULL, 15, 'uploads/ch-03.jpg', NULL, 1, 4, 1),
(19, 'Chin-jang 02-4 (finger)', 'ch', NULL, 10, 'uploads/ch-04.jpg', NULL, 1, 4, 1),
(20, 'Chin-jang 02-5 (finger)', 'ch', NULL, 10, 'uploads/ch-05.jpg', NULL, 1, 4, 1),
(21, 'Snow White 02-1 (finger)', 'sn', NULL, 5, 'uploads/sn-01.jpg', NULL, 3, 5, 1),
(22, 'Snow White 02-2 (finger)', 'sn', NULL, 20, 'uploads/sn-02.jpg', NULL, 3, 5, 1),
(23, 'Snow White 02-3 (finger)', 'sn', NULL, 10, 'uploads/sn-03.jpg', NULL, 3, 5, 1),
(24, 'Snow White 02-4 (finger)', 'sn', NULL, 5, 'uploads/sn-04.jpg', NULL, 3, 5, 1),
(25, 'Snow White 02-5 (finger)', 'sn', NULL, 5, 'uploads/sn-05.jpg', NULL, 3, 5, 1),
(26, 'Black White 02-1 (finger)', 'bw', NULL, 5, 'uploads/bw-01.jpg', NULL, 2, 6, 1),
(27, 'Black White 02-2 (finger)', 'bw', NULL, 25, 'uploads/bw-02.jpg', NULL, 2, 6, 1),
(28, 'Black White 02-3 (finger)', 'bw', NULL, 25, 'uploads/bw-03.jpg', NULL, 2, 6, 1),
(29, 'Black White 02-4 (finger)', 'bw', NULL, 5, 'uploads/bw-04.jpg', NULL, 2, 6, 1),
(30, 'Black White 02-5 (finger)', 'bw', NULL, 5, 'uploads/bw-05.jpg', NULL, 2, 6, 1),
(31, 'Chin-jang 03-1 (finger)', 'ch', NULL, 5, 'uploads/ch-01.jpg', NULL, 1, 7, 1),
(32, 'Chin-jang 03-2 (finger)', 'ch', NULL, 25, 'uploads/ch-02.jpg', NULL, 1, 7, 1),
(33, 'Chin-jang 03-3 (finger)', 'ch', NULL, 20, 'uploads/ch-03.jpg', NULL, 1, 7, 1),
(34, 'Chin-jang 03-4 (finger)', 'ch', NULL, 20, 'uploads/ch-04.jpg', NULL, 1, 7, 1),
(35, 'Chin-jang 03-5 (finger)', 'ch', NULL, 25, 'uploads/ch-05.jpg', NULL, 1, 7, 1),
(36, 'Snow White 03-1 (finger)', 'sn', NULL, 5, 'uploads/sn-01.jpg', NULL, 3, 8, 1),
(37, 'Snow White 03-2 (finger)', 'sn', NULL, 10, 'uploads/sn-02.jpg', NULL, 3, 8, 1),
(38, 'Snow White 03-3 (finger)', 'sn', NULL, 20, 'uploads/sn-03.jpg', NULL, 3, 8, 1),
(39, 'Snow White 03-4 (finger)', 'sn', NULL, 15, 'uploads/sn-04.jpg', NULL, 3, 8, 1),
(40, 'Snow White 03-5 (finger)', 'sn', NULL, 5, 'uploads/sn-05.jpg', NULL, 3, 8, 1),
(41, 'Black White 03-1 (finger)', 'bw', NULL, 25, 'uploads/bw-01.jpg', NULL, 2, 9, 1),
(42, 'Black White 03-2 (finger)', 'bw', NULL, 5, 'uploads/bw-02.jpg', NULL, 2, 9, 1),
(43, 'Black White 03-3 (finger)', 'bw', NULL, 15, 'uploads/bw-03.jpg', NULL, 2, 9, 1),
(44, 'Black White 03-4 (finger)', 'bw', NULL, 10, 'uploads/bw-04.jpg', NULL, 2, 9, 1),
(45, 'Black White 03-5 (finger)', 'bw', NULL, 5, 'uploads/bw-05.jpg', NULL, 2, 9, 1),
(46, 'Chin-jang 04-1 (finger)', 'ch', NULL, 5, 'uploads/ch-01.jpg', NULL, 1, 10, 1),
(47, 'Chin-jang 04-2 (finger)', 'ch', NULL, 20, 'uploads/ch-02.jpg', NULL, 1, 10, 1),
(48, 'Chin-jang 04-3 (finger)', 'ch', NULL, 25, 'uploads/ch-03.jpg', NULL, 1, 10, 1),
(49, 'Chin-jang 04-4 (finger)', 'ch', NULL, 15, 'uploads/ch-04.jpg', NULL, 1, 10, 1),
(50, 'Chin-jang 04-5 (finger)', 'ch', NULL, 25, 'uploads/ch-05.jpg', NULL, 1, 10, 1),
(51, 'Snow White 04-1 (finger)', 'sn', NULL, 5, 'uploads/sn-01.jpg', NULL, 3, 11, 1),
(52, 'Snow White 04-2 (finger)', 'sn', NULL, 15, 'uploads/sn-02.jpg', NULL, 3, 11, 1),
(53, 'Snow White 04-3 (finger)', 'sn', NULL, 20, 'uploads/sn-03.jpg', NULL, 3, 11, 1),
(54, 'Snow White 04-4 (finger)', 'sn', NULL, 15, 'uploads/sn-04.jpg', NULL, 3, 11, 1),
(55, 'Snow White 04-5 (finger)', 'sn', NULL, 15, 'uploads/sn-05.jpg', NULL, 3, 11, 1),
(56, 'Black White 04-1 (finger)', 'bw', NULL, 25, 'uploads/bw-01.jpg', NULL, 2, 12, 1),
(57, 'Black White 04-2 (finger)', 'bw', NULL, 20, 'uploads/bw-02.jpg', NULL, 2, 12, 1),
(58, 'Black White 04-3 (finger)', 'bw', NULL, 15, 'uploads/bw-03.jpg', NULL, 2, 12, 1),
(59, 'Black White 04-4 (finger)', 'bw', NULL, 25, 'uploads/bw-04.jpg', NULL, 2, 12, 1),
(60, 'Black White 04-5 (finger)', 'bw', NULL, 20, 'uploads/bw-05.jpg', NULL, 2, 12, 1),
(61, 'Chin-jang 05-1 (finger)', 'ch', NULL, 15, 'uploads/ch-01.jpg', NULL, 1, 13, 1),
(62, 'Chin-jang 05-2 (finger)', 'ch', NULL, 25, 'uploads/ch-02.jpg', NULL, 1, 13, 1),
(63, 'Chin-jang 05-3 (finger)', 'ch', NULL, 20, 'uploads/ch-03.jpg', NULL, 1, 13, 1),
(64, 'Chin-jang 05-4 (finger)', 'ch', NULL, 5, 'uploads/ch-04.jpg', NULL, 1, 13, 1),
(65, 'Chin-jang 05-5 (finger)', 'ch', NULL, 20, 'uploads/ch-05.jpg', NULL, 1, 13, 1),
(66, 'Snow White 05-1 (finger)', 'sn', NULL, 15, 'uploads/sn-01.jpg', NULL, 3, 14, 1),
(67, 'Snow White 05-2 (finger)', 'sn', NULL, 10, 'uploads/sn-02.jpg', NULL, 3, 14, 1),
(68, 'Snow White 05-3 (finger)', 'sn', NULL, 25, 'uploads/sn-03.jpg', NULL, 3, 14, 1),
(69, 'Snow White 05-4 (finger)', 'sn', NULL, 5, 'uploads/sn-04.jpg', NULL, 3, 14, 1),
(70, 'Snow White 05-5 (finger)', 'sn', NULL, 20, 'uploads/sn-05.jpg', NULL, 3, 14, 1),
(71, 'Black White 05-1 (finger)', 'bw', NULL, 5, 'uploads/bw-01.jpg', NULL, 2, 15, 1),
(72, 'Black White 05-2 (finger)', 'bw', NULL, 5, 'uploads/bw-02.jpg', NULL, 2, 15, 1),
(73, 'Black White 05-3 (finger)', 'bw', NULL, 25, 'uploads/bw-03.jpg', NULL, 2, 15, 1),
(74, 'Black White 05-4 (finger)', 'bw', NULL, 15, 'uploads/bw-04.jpg', NULL, 2, 15, 1),
(75, 'Black White 05-5 (finger)', 'bw', NULL, 10, 'uploads/bw-05.jpg', NULL, 2, 15, 1),
(76, 'Chin-jang-1 (toe)', 'ch', NULL, 25, 'uploads/ch-01.jpg', NULL, 1, 16, 2),
(77, 'Chin-jang-2 (toe)', 'ch', NULL, 15, 'uploads/ch-02.jpg', NULL, 1, 16, 2),
(78, 'Chin-jang-3 (toe)', 'ch', NULL, 25, 'uploads/ch-03.jpg', NULL, 1, 16, 2),
(79, 'Chin-jang-4 (toe)', 'ch', NULL, 25, 'uploads/ch-04.jpg', NULL, 1, 16, 2),
(80, 'Chin-jang-5 (toe)', 'ch', NULL, 5, 'uploads/ch-05.jpg', NULL, 1, 16, 2),
(81, 'Snow White-1 (toe)', 'sn', NULL, 25, 'uploads/sn-01.jpg', NULL, 3, 17, 2),
(82, 'Snow White-2 (toe)', 'sn', NULL, 5, 'uploads/sn-02.jpg', NULL, 3, 17, 2),
(83, 'Snow White-3 (toe)', 'sn', NULL, 20, 'uploads/sn-03.jpg', NULL, 3, 17, 2),
(84, 'Snow White-4 (toe)', 'sn', NULL, 20, 'uploads/sn-04.jpg', NULL, 3, 17, 2),
(85, 'Snow White-5 (toe)', 'sn', NULL, 15, 'uploads/sn-05.jpg', NULL, 3, 17, 2),
(86, 'Black White-1 (toe)', 'bw', NULL, 10, 'uploads/bw-01.jpg', NULL, 2, 18, 2),
(87, 'Black White-2 (toe)', 'bw', NULL, 20, 'uploads/bw-02.jpg', NULL, 2, 18, 2),
(88, 'Black White-3 (toe)', 'bw', NULL, 10, 'uploads/bw-03.jpg', NULL, 2, 18, 2),
(89, 'Black White-4 (toe)', 'bw', NULL, 20, 'uploads/bw-04.jpg', NULL, 2, 18, 2),
(90, 'Black White-5 (toe)', 'bw', NULL, 15, 'uploads/bw-05.jpg', NULL, 2, 18, 2),
(91, 'Chin-jang 02-1 (toe)', 'ch', NULL, 25, 'uploads/ch-01.jpg', NULL, 1, 19, 2),
(92, 'Chin-jang 02-2 (toe)', 'ch', NULL, 5, 'uploads/ch-02.jpg', NULL, 1, 19, 2),
(93, 'Chin-jang 02-3 (toe)', 'ch', NULL, 15, 'uploads/ch-03.jpg', NULL, 1, 19, 2),
(94, 'Chin-jang 02-4 (toe)', 'ch', NULL, 15, 'uploads/ch-04.jpg', NULL, 1, 19, 2),
(95, 'Chin-jang 02-5 (toe)', 'ch', NULL, 10, 'uploads/ch-05.jpg', NULL, 1, 19, 2),
(96, 'Snow White 02-1 (toe)', 'sn', NULL, 5, 'uploads/sn-01.jpg', NULL, 3, 20, 2),
(97, 'Snow White 02-2 (toe)', 'sn', NULL, 5, 'uploads/sn-02.jpg', NULL, 3, 20, 2),
(98, 'Snow White 02-3 (toe)', 'sn', NULL, 15, 'uploads/sn-03.jpg', NULL, 3, 20, 2),
(99, 'Snow White 02-4 (toe)', 'sn', NULL, 25, 'uploads/sn-04.jpg', NULL, 3, 20, 2),
(100, 'Snow White 02-5 (toe)', 'sn', NULL, 10, 'uploads/sn-05.jpg', NULL, 3, 20, 2),
(101, 'Black White 02-1 (toe)', 'bw', NULL, 10, 'uploads/bw-01.jpg', NULL, 2, 21, 2),
(102, 'Black White 02-2 (toe)', 'bw', NULL, 25, 'uploads/bw-02.jpg', NULL, 2, 21, 2),
(103, 'Black White 02-3 (toe)', 'bw', NULL, 10, 'uploads/bw-03.jpg', NULL, 2, 21, 2),
(104, 'Black White 02-4 (toe)', 'bw', NULL, 5, 'uploads/bw-04.jpg', NULL, 2, 21, 2),
(105, 'Black White 02-5 (toe)', 'bw', NULL, 15, 'uploads/bw-05.jpg', NULL, 2, 21, 2),
(106, 'Chin-jang 03-1 (toe)', 'ch', NULL, 15, 'uploads/ch-01.jpg', NULL, 1, 22, 2),
(107, 'Chin-jang 03-2 (toe)', 'ch', NULL, 5, 'uploads/ch-02.jpg', NULL, 1, 22, 2),
(108, 'Chin-jang 03-3 (toe)', 'ch', NULL, 25, 'uploads/ch-03.jpg', NULL, 1, 22, 2),
(109, 'Chin-jang 03-4 (toe)', 'ch', NULL, 15, 'uploads/ch-04.jpg', NULL, 1, 22, 2),
(110, 'Chin-jang 03-5 (toe)', 'ch', NULL, 25, 'uploads/ch-05.jpg', NULL, 1, 22, 2),
(111, 'Snow White 03-1 (toe)', 'sn', NULL, 5, 'uploads/sn-01.jpg', NULL, 3, 23, 2),
(112, 'Snow White 03-2 (toe)', 'sn', NULL, 15, 'uploads/sn-02.jpg', NULL, 3, 23, 2),
(113, 'Snow White 03-3 (toe)', 'sn', NULL, 25, 'uploads/sn-03.jpg', NULL, 3, 23, 2),
(114, 'Snow White 03-4 (toe)', 'sn', NULL, 20, 'uploads/sn-04.jpg', NULL, 3, 23, 2),
(115, 'Snow White 03-5 (toe)', 'sn', NULL, 10, 'uploads/sn-05.jpg', NULL, 3, 23, 2),
(116, 'Black White 03-1 (toe)', 'bw', NULL, 15, 'uploads/bw-01.jpg', NULL, 2, 24, 2),
(117, 'Black White 03-2 (toe)', 'bw', NULL, 25, 'uploads/bw-02.jpg', NULL, 2, 24, 2),
(118, 'Black White 03-3 (toe)', 'bw', NULL, 25, 'uploads/bw-03.jpg', NULL, 2, 24, 2),
(119, 'Black White 03-4 (toe)', 'bw', NULL, 20, 'uploads/bw-04.jpg', NULL, 2, 24, 2),
(120, 'Black White 03-5 (toe)', 'bw', NULL, 20, 'uploads/bw-05.jpg', NULL, 2, 24, 2),
(121, 'Chin-jang 04-1 (toe)', 'ch', NULL, 10, 'uploads/ch-01.jpg', NULL, 1, 25, 2),
(122, 'Chin-jang 04-2 (toe)', 'ch', NULL, 20, 'uploads/ch-02.jpg', NULL, 1, 25, 2),
(123, 'Chin-jang 04-3 (toe)', 'ch', NULL, 20, 'uploads/ch-03.jpg', NULL, 1, 25, 2),
(124, 'Chin-jang 04-4 (toe)', 'ch', NULL, 20, 'uploads/ch-04.jpg', NULL, 1, 25, 2),
(125, 'Chin-jang 04-5 (toe)', 'ch', NULL, 5, 'uploads/ch-05.jpg', NULL, 1, 25, 2),
(126, 'Snow White 04-1 (toe)', 'sn', NULL, 5, 'uploads/sn-01.jpg', 3, 3, 26, 2),
(127, 'Snow White 04-2 (toe)', 'sn', NULL, 20, 'uploads/sn-02.jpg', 3, 3, 26, 2),
(128, 'Snow White 04-3 (toe)', 'sn', NULL, 10, 'uploads/sn-03.jpg', 4, 3, 26, 2),
(131, 'Black White 04-1 (toe)', 'bw', NULL, 15, 'uploads/bw-01.jpg', NULL, 2, 27, 2),
(132, 'Black White 04-2 (toe)', 'bw', NULL, 25, 'uploads/bw-02.jpg', NULL, 2, 27, 2),
(133, 'Black White 04-3 (toe)', 'bw', NULL, 20, 'uploads/bw-03.jpg', NULL, 2, 27, 2),
(134, 'Black White 04-4 (toe)', 'bw', NULL, 20, 'uploads/bw-04.jpg', NULL, 2, 27, 2),
(135, 'Black White 04-5 (toe)', 'bw', NULL, 5, 'uploads/bw-05.jpg', NULL, 2, 27, 2),
(136, 'Chin-jang 05-1 (toe)', 'ch', NULL, 5, 'uploads/ch-01.jpg', NULL, 1, 28, 2),
(137, 'Chin-jang 05-2 (toe)', 'ch', NULL, 10, 'uploads/ch-02.jpg', NULL, 1, 28, 2),
(138, 'Chin-jang 05-3 (toe)', 'ch', NULL, 5, 'uploads/ch-03.jpg', NULL, 1, 28, 2),
(139, 'Chin-jang 05-4 (toe)', 'ch', NULL, 5, 'uploads/ch-04.jpg', NULL, 1, 28, 2),
(140, 'Chin-jang 05-5 (toe)', 'ch', NULL, 25, 'uploads/ch-05.jpg', NULL, 1, 28, 2),
(141, 'Snow White 05-1 (toe)', 'sn', NULL, 5, 'uploads/sn-01.jpg', NULL, 3, 29, 2),
(142, 'Snow White 05-2 (toe)', 'sn', NULL, 5, 'uploads/sn-02.jpg', NULL, 3, 29, 2),
(143, 'Snow White 05-3 (toe)', 'sn', NULL, 10, 'uploads/sn-03.jpg', NULL, 3, 29, 2),
(144, 'Snow White 05-4 (toe)', 'sn', NULL, 25, 'uploads/sn-04.jpg', NULL, 3, 29, 2),
(145, 'Snow White 05-5 (toe)', 'sn', NULL, 20, 'uploads/sn-05.jpg', NULL, 3, 29, 2),
(146, 'Black White 05-1 (toe)', 'bw', NULL, 20, 'uploads/bw-01.jpg', NULL, 2, 30, 2),
(147, 'Black White 05-2 (toe)', 'bw', NULL, 15, 'uploads/bw-02.jpg', NULL, 2, 30, 2),
(148, 'Black White 05-3 (toe)', 'bw', NULL, 20, 'uploads/bw-03.jpg', NULL, 2, 30, 2),
(149, 'Black White 05-4 (toe)', 'bw', NULL, 15, 'uploads/bw-04.jpg', NULL, 2, 30, 2),
(150, 'Black White 05-5 (toe)', 'bw', NULL, 10, 'uploads/bw-05.jpg', NULL, 2, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nail_types`
--

CREATE TABLE `nail_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nail_types`
--

INSERT INTO `nail_types` (`id`, `name`) VALUES
(1, 'finger'),
(2, 'เท้า');

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`id`, `name`, `start`, `end`) VALUES
(1, '11:30 - 12:30', '11:30:00', '12:30:00'),
(2, '12:30 - 13:30', '12:30:00', '13:30:00'),
(3, '13:30 - 14:30', '13:30:00', '14:30:00'),
(4, '14:30 - 15:30', '14:30:00', '15:30:00'),
(5, '15:30 - 16:30', '15:30:00', '16:30:00'),
(6, '16:30 - 17:30', '16:30:00', '17:30:00'),
(7, '17:30 - 18:30', '17:30:00', '18:30:00'),
(8, '18:30 - 19:30', '18:30:00', '19:30:00'),
(9, '19:30 - 20:30', '19:30:00', '20:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_lists`
--
ALTER TABLE `booking_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nail_groups`
--
ALTER TABLE `nail_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nail_lists`
--
ALTER TABLE `nail_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nail_types`
--
ALTER TABLE `nail_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking_lists`
--
ALTER TABLE `booking_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `nail_groups`
--
ALTER TABLE `nail_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nail_lists`
--
ALTER TABLE `nail_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `nail_types`
--
ALTER TABLE `nail_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
