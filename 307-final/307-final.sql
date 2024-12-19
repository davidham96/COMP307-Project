-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2024 at 04:51 AM
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
-- Database: `307-final`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `place_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `user_id`, `longitude`, `latitude`, `place_name`) VALUES
(2, 5, -73.5776, 45.5083, 'test'),
(3, 5, -73.5775, 45.5079, 'hello'),
(5, 15, -73.5825, 45.5085, 'help'),
(6, 15, -73.5825, 45.5055, 'something'),
(7, 16, -73.5798, 45.5058, 'field');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'hi@mail.mcgill.ca', '$2y$10$fEbVDjj6VWKelMs53G0V7u/7pCgSSlZYsII1TIbu0XcfkDPvaYAKC'),
(3, 'whatever@mail.mcgill.ca', '$2y$10$MO89TwL528funzm86abvzefoBEci0ZVLc2DZIDpALkobT1UgmFmVG'),
(4, 'test@mail.mcgill.ca', '$2y$10$406fGYF2p2vf1a1NlKnLjuA7ZEcuMcAQpv4/iDPEdnZJMpiNjSXw2'),
(5, 'hello@mail.mcgill.ca', '$2y$10$/1i3jlgEasZmJOSEarN71ejWfUm8IkNL/upiZWO8du/YGNJI59Xle'),
(7, 'goodbye@mail.mcgill.ca', '$2y$10$78s1L1FQyLPJ/HXwlVtNHO7tGTV33KrRdLUqmodNESXjsQnCU.slO'),
(8, 't@mail.mcgill.ca', '$2y$10$xaUGIWtP/ml2mq4H2M.la.XGnYalzYfjQoEALsDimXANpHv/3EU52'),
(10, 'new@mail.mcgill.ca', '$2y$10$4DhDNiThk3NDXlt7UtcIuOpH4ncc/zFv6NG.DeiWt04DSV1bd1Liq'),
(12, 'q@mail.mcgill.ca', '$2y$10$9Ig7OY5WSfun26iwbPt4n.46o1hMDNcRIcXrT4MuDaj83m/5C4QJG'),
(13, 'e@mail.mcgill.ca', '$2y$10$gIjlaqz89gKImYM9eyaIpepBXXdDnj9UFlce9lDPf8RumZg2sZyma'),
(14, 'u@mail.mcgill.ca', '$2y$10$.QxvuMZAUDJp9Bx7EpgxVuJdQOGiN2C6DEgfe5H.CKh9o02p1pvMy'),
(15, 'd@mail.mcgill.ca', '$2y$10$Q9QfNlSyXgWPFBhMOw5l4uICmddhYitjY1QZN7x5u0PhwuQkpXr8.'),
(16, 'testing@mail.mcgill.ca', '$2y$10$UP/ZeqIvk92kx4ytoyO7ReXNVE6EDJ.R9kPzU.GaG/ehwL/k0NTTK'),
(17, 'suraj@mail.mcgill.ca', '$2y$10$KKpDDo0DCl3XDmo3nruCVOjyxf6spJlwBjxX8IaqOziRScdyagP2m'),
(18, 'df@mail.mcgill.ca', '$2y$10$CHEP97OBLGOkJ54sfAsJ.uJOMTxoB/wc.TmFn0fKAIYXEyvwCZn9y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
