-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 05:51 PM
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
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'abdelrahman hamza', 'boodyhamza000@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(2, 'sara', 'abdelrahmanmohamed4141@gmail.com', '5bd537fc3789b5482e4936968f0fde95'),
(3, 'ali', 'alielrahmanmohamed4141@gmail.com', '86318e52f5ed4801abe1d13d509443de'),
(4, 'snod', 'aidhoelrahmanmohamed4141@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'djafodf', 'aidhoddelrahmanmohamed4141@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'karim', 'karim@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(7, 'karim2', 'karim2@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(8, 'max', 'max@gmail.com', '2ffe4e77325d9a7152f7086ea7aa5114'),
(9, 'hossam', 'hossam@gmail.com', 'e61e7de603852182385da5e907b4b232'),
(10, 'sama', 'samasalem410@gmail.com', 'cad7c7a47ea0d67d6921864008d01f51'),
(11, 'ali ali', 'maxxxxx@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(12, 'ali ali', 'maxxxxx@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(13, 'ali mohamed', 'maxdddx@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(14, 'ali mohamed', 'maxdddx@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(15, 'ali mmed', 'maddx@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(16, 'ali mmed', 'maddx@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(17, 'hamzasss', 'abdelrnmohamed4141@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(18, 'hamzasss', 'abdelrnmohamed4141@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(19, 'hamaaaaa', 'oo8403323@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(20, 'hamaaaaa', 'oo8403323@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(21, 'hamzaaaaaaaa', 'maxhamza@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(22, 'hamzsssssaaaaa', 'maggedgamza@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(23, 'sara hamza', 'sarahamza@gmail.com', '8950259507cd8ce2a99f8b94674f2b77'),
(24, 'user1', 'user1@gamil.com', 'ee11cbb19052e40b07aac0ca060c23ee'),
(25, 'hamzaaaa', 'maxxx@gmail.com', '8950259507cd8ce2a99f8b94674f2b77');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
