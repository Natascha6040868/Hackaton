-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 02:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `expires`) VALUES
(1, 'test1@gmail.com', '693f9c4e2b39f2b578fe84134a744e9da2d6eae51da1940abcd58789a58f397142cb1ab48dcd86518f324eba29824cb84ae3', 1718937599),
(2, 'redwanyesuf.4greatchange@gmail.com', '7eabeb8f11e687665ff0c6362f5cc82040fa74e32584b82ae7e65e94d0bddba5f537d9b0f07dd228421b4579463dcba98d5c', 1718938196),
(3, '2omeryildiz2@gmail.com', 'c37522b64142f5797debd6a4d0ce3341aab74aca9d8b4a01cb44a9ad86b19b3e052474907822e53c9609c78e754c05ad491a', 1718970314),
(4, '2omeryildiz2@gmail.com', '22bc0a68cab0b2d7e912013cdda278109b0df4b16b7008dd5b820d1c8220cbf9cdf7dbdacf6f998956e2f93a987fbf1a837d', 1718970315);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` int(11) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `organization`, `project_name`, `description`, `duration`, `contact_person`, `created_at`) VALUES
(5, 'Gementee Leiden', 'Redwan', 'First try!', 4, 'Redwan Abate', '2024-06-21 04:54:36'),
(6, 'Gementee Gouda', 'Redwan', 'Another try for Gementee Gouda!', 4, 'Redwan Abate', '2024-06-21 05:05:33'),
(8, 'Dutch Innovation', 'Redwan', 'Another try for Dutch innovation!', 12, 'Redwan Abate', '2024-06-21 06:52:09'),
(9, 'Dutch Innovation', 'try', 'yuf6or8luiu', 6, 'Redwan Abate', '2024-06-21 11:17:45'),
(10, 'Gementee Gouda', 'gouda', 'just description', 30, 'iemand', '2024-06-21 11:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `full_name`, `profile_picture`) VALUES
(1, 'Redwan', '$2y$10$sd3wQeWQxZHztTHK5ZW7Ie5GL/LT1Yv.nqAFYYx1G..r.u2NPCheO', 'test1@gmail.com', 'Redwan Abate', 'uploads/7189395c4387bacd1ca4bf0dd32df4b1.png'),
(2, 'Red1', '$2y$10$EYup80howbaVVxR3oGTRn.axbw506.Y4NTPJJOsWm7VHsoFBwRv.C', 'redwanyesuf.4greatchange@gmail.com', 'Red1 Abate', 'default.png'),
(3, 'Omer', '$2y$10$iLZV2hvqp2/tu.LIX2Gm1.RbYbZTOa.B6QQLf6umjgt4OuFP3ptPq', '2omeryildiz2@gmail.com', 'Omer last', 'default.png'),
(4, 'Jelle', '$2y$10$ksZOAOy/ZROG7/xE6UNrUuKztDkSKCKHO/pr4XtuEWYNXG36TnFQi', 'jhylarides@gmail.com', 'Jelle', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
