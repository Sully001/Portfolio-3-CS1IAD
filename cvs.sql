-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 08:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astoncv`
--

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyprogramming` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `URLlinks` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cvs`
--

INSERT INTO `cvs` (`id`, `name`, `email`, `password`, `keyprogramming`, `profile`, `education`, `URLlinks`) VALUES
(1, 'Test User', 'test@gmail.com', '$2y$10$YEeOmXgIhmAU1KCg6NrzsOk3cAsJJvmWd1a0566h3gbialNqN69J6', 'C++', 'Software Engineer', 'Aston University', 'https://www.aston.ac.uk'),
(2, 'Suliman Abdulkader', 'suliman123@gmail.com', '$2y$10$cqq2xrm.hU7wsfJMDmnz.OcMeD65adVtDkpt/LgLoWe3l8PYy3gUu', 'Python', 'Researcher', 'Manchester University', 'https://www.aston.ac.uk'),
(3, 'Satya Nadella', 'sn@gmail.com', '$2y$10$U8YHRoKLEjCZA9b2HeQCP.bFCqhigel9HLpFlBFUY10hWXWd990n6', 'C#', 'CEO of Microsoft', 'Harvard', 'https://www.aston.ac.uk'),
(4, 'John James', 'jj@gmail.com', '$2y$10$B5MnDmnZKxeIVwaPW5GMzONoTFP3H1Hwnl2oBCJKBgn.T9n2GsDcS', 'Java', 'App Developer', 'Oxford University', 'https://www.aston.ac.uk'),
(5, 'Bill Gates', 'bg@gmail.com', '$2y$10$O5QzL2xRl4/D1iioIuQTXOehziq0kRkZo81hPdG1cN2Pgvsbl3.iq', 'C++', 'Former CEO of Microsoft', 'University of Cambridge', 'https://www.aston.ac.uk'),
(6, 'John Smith', 'js@gmail.com', '$2y$10$L.CkPedi665pl41t/04KDelAvpGQSzpYx2yibxRWrByKFygdcZzvi', 'Javascript', 'Backend Developer', 'University of Birmigngham', 'https://www.aston.ac.uk'),
(7, 'Lucy Harrington', 'lh@gmail.com', '$2y$10$edqWTJA3o9rkGAAcbb6RdO1qv/Btp6LcKDo0DRv6vl55RLRtt3NwK', 'C#', 'Cloud Engineer', 'Manchester University', 'https://www.aston.ac.uk'),
(8, 'Amanda Stone', 'as@gmail.com', '$2y$10$ZX0lQlV9mrtPrNwAr7wEPO91jqNKhqS/a/AqX/Ijem8Yi9swCaB/i', 'Python', 'AI Developer', 'Aston University', 'https://www.aston.ac.uk'),
(9, 'Clark Kent', 'ck@gmail.com', '$2y$10$z2I6lYJm6VQm6B3xYfPeReNyNgUGD6QKUNPBikF2VRHd23sjCQ45a', 'Python', 'FullStack Engineer', 'University of London', 'https://www.aston.ac.uk'),
(10, 'John Snow', 'johns@gmail.com', '$2y$10$EYyh52QszGoNLZu2cmE1OO3mpc6ycgfxMTo5/pri92idKV5moUqoa', 'Javascript', 'Frontend Developer', 'Manchester University', 'https://www.aston.ac.uk'),
(11, 'Tyrone Woodley', 'tw@gmail.com', '$2y$10$cLb9Ee2wwI/rp2hkaZsMeORxK8oZx8QQ1wx1skNXRCSCnGXUMhjeS', 'Kotlin', 'Android Developer', 'University of Yale', 'https://www.aston.ac.uk'),
(12, 'Hermione Granger', 'hg@gmail.com', '$2y$10$/P8HX8u49RQZoIWwN/xmSerTJSXNHc6KCNGoJePs6vUmGCU2L4iL.', 'Kotlin', 'Backend Developer', 'Aston University', 'https://www.aston.ac.uk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
