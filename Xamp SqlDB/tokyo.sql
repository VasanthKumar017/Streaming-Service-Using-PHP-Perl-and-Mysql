-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 05:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokyo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `adminname`, `password`, `created_at`) VALUES
(1, 'admin.0@gmail.com', 'admin.0', '$2y$10$4FpjVss5v9dalKr.85P68uC.UIYyNmLI0xkqfPYTPjpRJ5mxA0SNe', '2024-06-02 16:28:23'),
(2, 'admin.1@gmail.com', 'vasanth', '$2y$10$WMH7U1y5eRTp978aSYfXJ.JlkTfAYcw20gshCnnPe4k9C8Ez23SKm', '2024-06-02 20:10:42'),
(3, 'admin.2@gmail.com', 'vasanth2', '$2y$10$FVjl2FASUcnjeIN4vkBSDuk92kktePzEGP2vlWsrutYPbiu.oW6Sa', '2024-06-02 20:13:15'),
(4, 'admin.3@gmail.com', 'vasanth3', '$2y$10$1Mp17ZY4.pEOa4bm3ZR0ZOCfOJ1BiTEJ83APIDMUGzgq9g9Vb3Rxi', '2024-06-02 20:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `back_users`
--

CREATE TABLE `back_users` (
  `id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `back_users`
--

INSERT INTO `back_users` (`id`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'Vasanthkumar17112002@gmail.com', 'Vasanth', '$2y$10$fM1/3WAavG4cmkaI7QcfA.XAqCl1.vuE1IDiw9xJazHsoWtFmKI3q', '2024-05-25 12:39:27'),
(2, 'user.1@gmail.com', 'vasanth', '$2y$10$fM1/3WAavG4cmkaI7QcfA.XAqCl1.vuE1IDiw9xJazHsoWtFmKI3q', '2024-05-25 12:04:51'),
(3, 'user.3@gmail.com', 'user.3@gmail.com', '$2y$10$SCQheGvzRVdPUbqK9I5zf.2kM4nanSrdslYP2CqNd1jVQbsgN5VR6', '2024-05-25 12:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `show_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `show_id`, `user_id`, `user_name`, `created_at`) VALUES
(1, 'whachikan Just noticed that someone categorized this as belonging to the genre \"demons\" LOL', 1, 1, 'Vasanth', '2024-05-26 12:01:06'),
(2, 'Finally it came out ages ago', 2, 1, 'Vasanth', '2024-05-26 12:01:06'),
(3, 'nice show', 3, 10, 'user.3', '2024-05-30 02:55:36'),
(6, 'one of the best', 1, 10, 'user.3', '2024-05-30 02:58:54'),
(7, 'one of the best', 1, 10, 'user.3', '2024-05-30 02:59:00'),
(8, 'hi\r\n', 3, 10, 'user.3', '2024-05-31 07:26:02'),
(9, 'hello', 3, 10, 'user.3', '2024-05-31 07:26:35'),
(10, 'new comment', 3, 10, 'user.3', '2024-05-31 07:30:56'),
(11, 'hhhi', 3, 10, 'user.3', '2024-05-31 07:47:09'),
(12, 'hhhi', 3, 10, 'user.3', '2024-05-31 07:47:18'),
(13, 'rewatching\r\n', 1, 10, 'user.3', '2024-05-31 07:48:00'),
(14, 'rewatching\r\n', 1, 10, 'user.3', '2024-05-31 07:48:04'),
(15, 'rewatching\r\n', 1, 10, 'user.3', '2024-05-31 07:50:47'),
(16, 'hiiiiiii', 1, 3, 'user.3', '2024-06-01 08:58:32'),
(17, 'hiiiiiii', 1, 3, 'user.3', '2024-06-01 08:58:38'),
(18, 'poda', 3, 3, 'user.3', '2024-06-01 10:59:57'),
(19, 'poda', 3, 3, 'user.3', '2024-06-01 11:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(10) NOT NULL,
  `video` varchar(200) NOT NULL,
  `show_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `thumbnail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `video`, `show_id`, `name`, `created_at`, `thumbnail`) VALUES
(1, '1.mp4', 3, '1', '2024-05-30 07:21:00', 'scavengersReignThumb.jpg'),
(2, '2.mp4', 3, '2', '2024-05-30 07:21:00', 'scavengersReignThumb.jpg'),
(3, '3.mp4', 1, '1', '2024-05-30 07:21:00', 'scavengersReignThumb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `id` int(10) NOT NULL,
  `show_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`id`, `show_id`, `user_id`, `created_at`) VALUES
(1, 2, 8, '2024-05-29 12:30:36'),
(3, 3, 11, '2024-05-31 08:59:27'),
(4, 1, 11, '2024-05-31 11:42:22'),
(5, 2, 11, '2024-05-31 11:42:40'),
(6, 1, 3, '2024-05-31 13:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`) VALUES
(1, 'Action', '2024-05-27 10:44:20'),
(2, 'Adventure', '2024-05-27 10:44:20'),
(3, 'fantacy', '2024-05-27 10:45:35'),
(4, 'Magic', '2024-05-27 10:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(200) NOT NULL,
  `studios` varchar(200) NOT NULL,
  `date_aired` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `genre` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `quality` varchar(200) NOT NULL,
  `num_available` int(10) NOT NULL,
  `num_total` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `title`, `image`, `description`, `type`, `studios`, `date_aired`, `status`, `genre`, `duration`, `quality`, `num_available`, `num_total`, `created_at`) VALUES
(1, 'Cyberpunk: Edgerunners', 'CyberpunkEdgerunners.jpg', 'In a dystopia riddled with corruption and cybernetic implants, a talented but reckless street kid strives to become a mercenary outlaw — an edgerunner.', 'TV Series', 'Trigger', 'September 13, 2022', 'completed', 'Action', '26 minutes', 'HD', 9, 12, '2024-05-26 11:04:12'),
(2, 'The Boys', 'theboys.jpg', 'A group of vigilantes set out to take down corrupt superheroes who abuse their superpowers.', 'TV Series', 'PrimeStudios', 'July 26, 2019', 'Ongoing', 'Action', '	55–68 minutes', 'HD', 39, 48, '2024-05-26 11:04:12'),
(3, 'Scavengers Reign', 'ScavengersReign.jpg', 'The crew of a damaged deep space freighter strands on a beautiful but dangerous planet.', 'TV Series', 'max', 'October 19 2023', 'completed', 'Adventure', '24m', 'HD', 12, 12, '2024-05-27 03:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'Vasanthkumar17112002@gmail.com', 'Vasanth', '$2y$10$4FpjVss5v9dalKr.85P68uC.UIYyNmLI0xkqfPYTPjpRJ5mxA0SNe', '2024-05-26 17:56:27'),
(2, 'user.1@gmail.com', 'user2', '$2y$10$XLe47DMy7wZr0UVVLr8uReDyO4wm1rPiHILqhwsamFah7k6Uzksvq', '2024-05-29 12:31:48'),
(3, 'user.3@gmail.com', 'user.3', '$2y$10$ILZEUwNDuHIwyk6U7tMmj.7HXeuuYaQP0vVXWowsHy14nCprNmGkS', '2024-05-29 12:33:39'),
(11, 'user4@gmail.com', 'user.4', '$2y$10$SPYZOWhxQKgMds7GyufVr.0WKIgUOkFdiplsFNiDHg4d.jRWyFVrm', '2024-05-31 08:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `show_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `user_id`, `show_id`, `created_at`) VALUES
(1, 1, 1, '2024-05-26 12:04:27'),
(3, 1, 2, '2024-05-26 12:04:27'),
(13, 1, 3, '2024-05-27 03:21:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `back_users`
--
ALTER TABLE `back_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `back_users`
--
ALTER TABLE `back_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
