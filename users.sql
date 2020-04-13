-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 09:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `companions`
--

CREATE TABLE `companions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `age` varchar(15) CHARACTER SET utf8mb4 DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `size` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `health` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `companions`
--

INSERT INTO `companions` (`id`, `name`, `picture`, `age`, `gender`, `size`, `health`) VALUES
(1, 'Winston', 'http:\\/\\/www.woodstockcats.org\\/fullsizeoutput_8cf.jpeg', '2 Years', 'Male', 'Medium', 'Vaccinations up to date, neutered'),
(3, 'Buddy', 'http://studenthome.nku.edu/~thomase13/dog.jpg', '2 Years', 'Male', 'Medium', 'Vaccinations up to date, neutered'),
(4, 'Hamilton', 'https://s.hdnux.com/photos/01/06/13/44/18397470/3/920x920.jpg', '1 Year', 'Male', 'Medium', 'Vaccinations up to date'),
(7, 'Madelynn', 'https:\\/\\/static.boredpanda.com\\/blog\\/wp-content\\/uploads\\/2019\\/11\\/1-5dcbbf9bea92b__700.jpg', '3 Months', 'Female', 'Small', 'Vaccinations up to date'),
(8, 'Lori', 'https:\\/\\/jngnposwzs-flywheel.netdna-ssl.com\\/wp-content\\/uploads\\/2017\\/10\\/Glitter-1024x714.jpg', '6 Months', 'Female', 'Small', 'Vaccinations up to date'),
(9, 'Finnegan', 'https:\\/\\/ewscripps.brightspotcdn.com\\/dims4\\/default\\/105d1e0\\/2147483647\\/strip\\/true\\/crop\\/4032x2268+0+188\\/resize\\/1280x720!\\/quality\\/90\\/?url=https%3A%2F%2Fewscripps.brightspotcdn.com%2Fb3%2Ffa%2Fc190867c45fdbb6e11986a1434c6%2Fhart-kittne.jpg', '2 Months', 'Male', 'Small', 'Vaccinations up to date');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) UNSIGNED NOT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 DEFAULT NULL,
  `username` varchar(40) CHARACTER SET utf8mb4 DEFAULT NULL,
  `password` varchar(25) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `username`, `password`) VALUES
(1, 'thomase13@mymail.nku.edu', 'thomase13', '1234abcd'),
(2, 'vitamin.yes.2000@gmail.com', 'Vitamin Yes', '12345678'),
(9, 'evan@gmail.com', 'evan', '$2y$10$lpuCWX2XfGlnNQdzDZ'),
(11, 'evant@gmail.com', 'evant', '$2y$10$k/GZniAffABGHO0j3g');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companions`
--
ALTER TABLE `companions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companions`
--
ALTER TABLE `companions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
