-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 11:20 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Event_Key` int(10) UNSIGNED NOT NULL,
  `Event_Title` varchar(255) NOT NULL,
  `Event_Start` varchar(255) NOT NULL,
  `Event_End` varchar(255) NOT NULL,
  `Event_Location` text NOT NULL,
  `Event_Desc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Event_Key`, `Event_Title`, `Event_Start`, `Event_End`, `Event_Location`, `Event_Desc`) VALUES
(1, 'Alumni Night Out', '02/12/2023 @6:00PM', '', 'South Palm Resort, Panglao', 'This alumni event will be held at South Palm Resort, Panglao. See you soon!'),
(2, 'Sports Event', '03/3/2023 @8:00AM', '03/5/2023 @5:00PM', 'C.P.G Sports Complex, Tagbilaran City', 'An alumni gathering at the game to give constituents an opportunity to socialize with other alumni, students and faculty.'),
(3, 'Alumni Webinar Series', '01/24/2023 @9:00AM', '01/27/2023 @4:00PM', 'Bohol Cultural Center, Tagbilaran City', 'These webinars are ongoing alumni engagement events that are geared towards the professional development of members.'),
(4, 'Alumni Homecoming', '04/23/2023 @8:00AM', '', 'Kew Hotel, Tagbilaran City', 'A great way to help alumni reminisce about their school years.'),
(5, 'Alumni Variety Night', '05/12/2023 @7:00PM', '', 'Kasagpan Resort, Tagbilaran City', 'A fun experience that will let the alumni to connect, network and learn. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Event_Key`),
  ADD UNIQUE KEY `tbl_unique` (`Event_Title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Event_Key` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
