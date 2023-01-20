-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 09:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bisu_ais`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `News_Key` int(10) UNSIGNED NOT NULL,
  `User_Key` int(10) UNSIGNED NOT NULL,
  `News_Title` varchar(255) NOT NULL,
  `News_Date` varchar(255) NOT NULL,
  `News_Image` varchar(255) NOT NULL,
  `News_Desc` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`News_Key`, `User_Key`, `News_Title`, `News_Date`, `News_Image`, `News_Desc`) VALUES
(1, 0, 'Hudyaka 2022', 'December 16, 2022', 'Hudyaka_2022.jpg', 'Hudyaka_2022.html'),
(2, 0, 'Charter Days 2022', 'October 14, 2022', 'Charter_Days_2022.jpeg', 'Charter_Days_2022.html'),
(3, 77, 'Earth Day 2022', 'April 22, 2022', 'Earth_Day_2022.jpg', 'Earth_Day_2022.html'),
(4, 77, 'University Youth Forum', 'June 3, 2022', 'University_Youth_Forum.jpg', 'University_Youth_Forum.html'),
(7, 15, 'Panaghiusa', 'January 19,2023', 'a1.jpg', 'a1.html'),
(8, 15, 'Baang Fiesta', 'January 20, 2023', 'pacto-visual-cWOzOnSoh6Q-unsplash.jpg', 'pacto-visual-cWOzOnSoh6Q-unsplash.html'),
(9, 85, 'ACOPS', 'December 26,2022', 'FB_IMG_1674201523467.jpg', 'FB_IMG_1674201523467.html'),
(10, 85, 'Writeshop R&D Proposal', 'January 12, 2023', 'FB_IMG_1674201590808.jpg', 'FB_IMG_1674201590808.html'),
(11, 158, 'LGU Balilihan Christmas Party', 'December 21, 2022', 'FB_IMG_1674201632127.jpg', 'FB_IMG_1674201632127.html'),
(12, 158, 'Miss Mutya sa Dao 2023', 'December 21, 2022', 'FB_IMG_1674201688508.jpg', 'FB_IMG_1674201688508.html'),
(13, 18, '\"Alaalang iniingatan, yaman ngayon ng bayan.\"', 'December 30, 2022', 'FB_IMG_1674201757997.jpg', 'FB_IMG_1674201757997.html'),
(14, 18, 'Exhibition Match', 'December 18, 2022', 'FB_IMG_1674201815811.jpg', 'FB_IMG_1674201815811.html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`News_Key`),
  ADD UNIQUE KEY `tbl_unique` (`News_Title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `News_Key` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
