-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 26 авг 2023 в 22:16
-- Версия на сървъра: 10.4.28-MariaDB
-- Версия на PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `test`
--

-- --------------------------------------------------------

--
-- Структура на таблица `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `colorFill` varchar(50) NOT NULL,
  `outlineColor` varchar(50) NOT NULL,
  `shape` enum('circle','rect','star') NOT NULL,
  `height` varchar(50) NOT NULL,
  `width` varchar(50) NOT NULL,
  `animation` enum('blinking','static') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Схема на данните от таблица `registration`
--

INSERT INTO `registration` (`id`, `colorFill`, `outlineColor`, `shape`, `height`, `width`, `animation`) VALUES
(67, 'pink', 'blue', 'circle', '100', '220', ''),
(69, 'pink', 'red', 'rect', '150', '220', ''),
(70, 'red', 'purple', 'star', '150', '220', ''),
(71, 'pink', 'blue', 'circle', '150', '300', ''),
(72, 'pink', 'purple', 'rect', '150', '220', ''),
(73, 'red', 'blue', 'rect', '100', '300', ''),
(74, 'red', 'blue', 'rect', '100', '220', '');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
