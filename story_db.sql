-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2018 at 10:00 AM
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
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_types`
--

CREATE TABLE `member_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(118, '2014_10_12_000000_create_users_table', 1),
(119, '2014_10_12_100000_create_password_resets_table', 1),
(120, '2018_01_23_181645_create_nails_table', 1),
(121, '2018_01_23_181708_create_nail_lists_table', 1),
(122, '2018_01_23_181716_create_nail_groups_table', 1),
(123, '2018_01_23_181723_create_nail_types_table', 1),
(124, '2018_01_23_181739_create_collections_table', 1),
(125, '2018_01_23_181756_create_members_table', 1),
(126, '2018_01_23_181801_create_member_types_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nail_groups`
--

CREATE TABLE `nail_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nail_groups`
--

INSERT INTO `nail_groups` (`id`, `name`, `pic`) VALUES
(6, 'test 12123', 'http://localhost/story-master/admin/uploads/nail-group/group-20180128075002.jpg'),
(11, 'test', 'http://localhost/story-master/admin/uploads/nail-group/group-20180128081307.jpg');

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
  `collection_id` int(10) UNSIGNED DEFAULT NULL,
  `nail_group_id` int(10) UNSIGNED DEFAULT NULL,
  `nail_type_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nail_lists`
--

INSERT INTO `nail_lists` (`id`, `name`, `detail`, `type`, `price`, `pic`, `collection_id`, `nail_group_id`, `nail_type_id`) VALUES
(1, 'Prof. Boyd Zboncak Jr.', 'Kay Gislason', 'Patricia Shanahan', 976, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119183/1460875257-12446069_1563558843972537_1389925110_n.jpg', NULL, NULL, NULL),
(2, 'Theron Lowe', 'Matilde Lehner', 'Dr. Abdullah Bins', 949, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119194/1460875738-12445924_1016865105054608_844324492_n.jpg', NULL, NULL, NULL),
(3, 'Fay Lang', 'Miss Carmela McDermott', 'Jennings Considine MD', 529, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119189/1460875605-12728556_1728181767417105_729381659_n.jpg', NULL, NULL, NULL),
(4, 'Ms. Fanny Collier II', 'Katelyn Swaniawski', 'Dante O\'Hara Sr.', 554, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119246/1460877268-10576093_1554341854883189_980384100_n.jpg', NULL, NULL, NULL),
(5, 'Dr. Lorenz Fadel', 'Opal Nikolaus', 'Lelah Bailey', 962, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119194/1460875738-12445924_1016865105054608_844324492_n.jpg', NULL, NULL, NULL),
(6, 'Reed Kshlerin', 'Mrs. Letha Nitzsche DDS', 'Mr. Emery Romaguera', 260, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119246/1460877268-10576093_1554341854883189_980384100_n.jpg', NULL, NULL, NULL),
(7, 'Russel Wolf', 'Dr. Addie Langworth IV', 'Mr. Jay Mueller', 773, 'https://ae01.alicdn.com/kf/HTB12doHbyERMeJjSspiq6zZLFXaz/24pcs-Set-Full-Finished-Black-Grey-False-Nails-Short-Design-Cartoon-Matte-Girls-Nail-Art-Decoration.jpg_640x640.jpg', NULL, NULL, NULL),
(8, 'Tracey Dietrich', 'Ms. Alycia Zemlak', 'Anika Conn', 114, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119180/1460875218-12904999_1755676457994819_1434745263_n.jpg', NULL, NULL, NULL),
(9, 'Mrs. Rhoda Murazik', 'Marcus Rippin', 'Alfonso Stehr', 721, 'https://ae01.alicdn.com/kf/HTB12doHbyERMeJjSspiq6zZLFXaz/24pcs-Set-Full-Finished-Black-Grey-False-Nails-Short-Design-Cartoon-Matte-Girls-Nail-Art-Decoration.jpg_640x640.jpg', NULL, NULL, NULL),
(10, 'Efrain Hauck V', 'Adriel Wilkinson', 'Alysa Reynolds', 680, 'https://ae01.alicdn.com/kf/HTB12doHbyERMeJjSspiq6zZLFXaz/24pcs-Set-Full-Finished-Black-Grey-False-Nails-Short-Design-Cartoon-Matte-Girls-Nail-Art-Decoration.jpg_640x640.jpg', NULL, NULL, NULL),
(11, 'Mrs. Reyna Tromp', 'Mrs. Citlalli Nienow', 'Prof. Blanche Hagenes V', 826, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119183/1460875257-12446069_1563558843972537_1389925110_n.jpg', NULL, NULL, NULL),
(12, 'Dayton Hermann', 'Luella Schneider IV', 'Jennyfer Hansen', 836, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119183/1460875257-12446069_1563558843972537_1389925110_n.jpg', NULL, NULL, NULL),
(13, 'Damian Predovic', 'Dr. Zander Feest MD', 'Bessie Feeney', 654, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119194/1460875738-12445924_1016865105054608_844324492_n.jpg', NULL, NULL, NULL),
(14, 'Emerald Schumm', 'Phoebe Marquardt', 'Prof. Keith Stracke', 164, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119180/1460875218-12904999_1755676457994819_1434745263_n.jpg', NULL, NULL, NULL),
(15, 'Domingo Boyle', 'Miss Autumn Pfeffer', 'Mr. Milan Orn', 138, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119194/1460875738-12445924_1016865105054608_844324492_n.jpg', NULL, NULL, NULL),
(16, 'Jerrell Smith', 'Prof. Missouri Jacobi MD', 'Davion Yundt', 756, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119183/1460875257-12446069_1563558843972537_1389925110_n.jpg', NULL, NULL, NULL),
(17, 'Bessie Baumbach', 'Mrs. Caterina Macejkovic PhD', 'Kory Bogisich', 959, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119180/1460875218-12904999_1755676457994819_1434745263_n.jpg', NULL, NULL, NULL),
(18, 'Piper Hilll DVM', 'Dwight Glover', 'Mrs. Rosetta Deckow DVM', 964, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119246/1460877268-10576093_1554341854883189_980384100_n.jpg', NULL, NULL, NULL),
(19, 'Noel Murphy', 'Ursula Harber', 'Mr. Taurean Goodwin I', 896, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119246/1460877268-10576093_1554341854883189_980384100_n.jpg', NULL, NULL, NULL),
(20, 'Coty Blick', 'Ibrahim Deckow', 'Mrs. Claudie Stanton', 879, 'https://cache.gmo2.sistacafe.com/images/uploads/content_image/image/119194/1460875738-12445924_1016865105054608_844324492_n.jpg', NULL, NULL, NULL),
(21, 'gg', 'hh', NULL, 0, 'http://localhost/story-nail/admin/uploads/nail-20180125134310.jpg', NULL, NULL, NULL),
(22, 'ff', 'ff', NULL, 0, 'http://localhost/story-master/admin/uploads/nail-20180125134400.jpg', NULL, NULL, NULL),
(23, 'tt', NULL, NULL, NULL, 'http://localhost/story-master/admin/uploads/nail-list/list-20180128083548.jpg', NULL, NULL, NULL),
(24, 'ddd', 'dd', NULL, 99, 'http://localhost/story-master/admin/uploads/nail-list/list-20180128083845.jpg', NULL, NULL, NULL),
(27, 'rt', 'yy', NULL, 0, 'http://localhost/story-master/admin/uploads/nail-list/list-20180128091910.jpg', NULL, 0, NULL),
(28, 'rt', 'yy', NULL, 0, 'http://localhost/story-master/admin/uploads/nail-list/list-20180128091949.jpg', NULL, 0, NULL),
(29, 'sss', 'ss', NULL, 55, 'http://localhost/story-master/admin/uploads/nail-list/list-20180128095431.jpg', NULL, 11, NULL),
(30, 'test', 'test', NULL, 66, 'http://localhost/story-master/admin/uploads/nail-list/list-20180128095444.jpg', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nail_types`
--

CREATE TABLE `nail_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_types`
--
ALTER TABLE `member_types`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_types`
--
ALTER TABLE `member_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `nail_groups`
--
ALTER TABLE `nail_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nail_lists`
--
ALTER TABLE `nail_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nail_types`
--
ALTER TABLE `nail_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
