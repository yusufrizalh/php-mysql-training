-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 06:35 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_phpmysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`, `created_at`, `updated_at`) VALUES
(1, 'Web Programming', 'Learn Basic of Web Programming.', '2023-07-18 06:30:28', '2023-07-18 06:34:21'),
(2, 'Mobile Development', 'Lorem ipsum dolor amet.', '2023-07-18 06:31:22', NULL),
(3, 'Networking', 'Lorem ipsum dolor.', '2023-07-18 06:31:42', NULL),
(4, 'IT Management', 'Lorem ipsum dolor amet quo un ciro.', '2023-07-18 06:32:05', NULL),
(5, 'Cross Platform', 'Lorem ipsum.', '2023-07-18 06:32:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cou_id` int(11) NOT NULL,
  `cou_name` varchar(50) NOT NULL,
  `cou_price` decimal(10,0) NOT NULL,
  `cou_duration` int(11) NOT NULL,
  `cou_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `fk_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cou_id`, `cou_name`, `cou_price`, `cou_duration`, `cou_description`, `created_at`, `updated_at`, `fk_cat_id`) VALUES
(1, 'HTML CSS JS', '5400', 3, NULL, '2023-07-18 06:56:30', NULL, 1),
(2, 'Android with Kotlin', '7500', 5, NULL, '2023-07-18 06:58:30', NULL, 2),
(3, 'Android with Java', '7100', 5, NULL, '2023-07-18 06:58:50', NULL, 2),
(4, 'Build Web with React.js', '5760', 3, NULL, '2023-07-18 06:59:19', NULL, 1),
(5, 'IT-IL', '8700', 3, NULL, '2023-07-18 06:59:49', NULL, 4),
(6, 'Cross Development with Flutter', '9000', 5, NULL, '2023-07-18 07:00:16', NULL, 5),
(7, 'Cisco CCNA', '12600', 5, NULL, '2023-07-18 07:00:47', NULL, 3),
(8, 'Build Web with Vue.js', '5990', 3, NULL, '2023-07-18 07:01:06', NULL, 1),
(9, 'App Development with React Native', '7360', 5, NULL, '2023-07-18 07:01:38', NULL, 5),
(10, 'Web Dev with Laravel 10', '10500', 4, NULL, '2023-07-18 07:02:03', NULL, 1),
(11, 'MikroTik MTCNA', '8000', 3, NULL, '2023-07-18 07:02:28', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `password` text NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `active`, `password`, `description`, `created_at`) VALUES
(1, 'Yusuf Rizal', 'yusufrizal@example.com', 1, '$2y$10$N3tf6WZVpLq0CMRYiz8cleo4kY44tkWa3bQkx.BNY1My8FR2M4D.2', NULL, '2023-07-20 03:51:39'),
(2, 'Jennifer Adilson', 'jennifer.adilson@email.com', 1, '$2y$10$qKkN72gXJx7d.6PDo6zlFO21TJFTvt9jfJOkDiQLH9yCNAsQ4Xf2a', NULL, '2023-07-20 04:26:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cou_id`),
  ADD UNIQUE KEY `cou_name` (`cou_name`),
  ADD KEY `fk_cat_id` (`fk_cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_cat_id` FOREIGN KEY (`fk_cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
