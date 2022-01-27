-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 11:23 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronic_newspaper_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `Article_ID` int(9) NOT NULL,
  `Article_title` varchar(50) NOT NULL,
  `Article_paragraph` varchar(255) NOT NULL,
  `Journalist_ID` int(9) NOT NULL,
  `Article_section` varchar(10) NOT NULL,
  `Article_published` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`Article_ID`, `Article_title`, `Article_paragraph`, `Journalist_ID`, `Article_section`, `Article_published`) VALUES
(24, 'Hello World', 'This is the first sentence I print in Java', 7, 'Tech', 'true'),
(25, 'Score results', 'Alhilal win', 7, 'Sports', 'true'),
(27, 'There is traffic in', 'Prince Turkey Ibn Abdulaziz Alawal', 7, 'news', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `cheif_editor`
--

CREATE TABLE `cheif_editor` (
  `Cheif_ID` int(9) NOT NULL,
  `Cheif_name` varchar(150) NOT NULL,
  `Cheif_email` varchar(200) NOT NULL,
  `Cheif_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cheif_editor`
--

INSERT INTO `cheif_editor` (`Cheif_ID`, `Cheif_name`, `Cheif_email`, `Cheif_password`) VALUES
(1, 'Fares Alassiri', 'assiri@email.com', 'qwer1234'),
(5, 'Alhosain', 'alhosain@email.com', 'asdf1234'),
(7, 'Alkaff', 'alkaff@email.com', 'qwer1234'),
(8, 'Almarhom', 'almarhom@email.com', 'asdf1234');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Comment_ID` int(9) NOT NULL,
  `Comment_content` varchar(150) NOT NULL,
  `Article_ID` int(9) NOT NULL,
  `Creator_ID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Comment_ID`, `Comment_content`, `Article_ID`, `Creator_ID`) VALUES
(30, 'Waw', 24, 4);

-- --------------------------------------------------------

--
-- Table structure for table `comment_creator`
--

CREATE TABLE `comment_creator` (
  `Creator_ID` int(9) NOT NULL,
  `Table_Creator` varchar(15) NOT NULL,
  `ID_of_creator` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_creator`
--

INSERT INTO `comment_creator` (`Creator_ID`, `Table_Creator`, `ID_of_creator`) VALUES
(4, 'reader', 7),
(5, 'cheif_editor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `Image_ID` int(9) NOT NULL,
  `Image_path` varchar(150) NOT NULL,
  `Article_ID` int(9) NOT NULL,
  `Journalist_ID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`Image_ID`, `Image_path`, `Article_ID`, `Journalist_ID`) VALUES
(25, './images/WhatsApp Image 2020-12-03 at 1.01.15 AM.jpeg', 27, 7),
(26, './images/WhatsApp Image 2020-12-03 at 1.01.14 AM (1).jpeg', 27, 7),
(27, './images/WhatsApp Image 2020-12-03 at 1.01.14 AM.jpeg', 27, 7);

-- --------------------------------------------------------

--
-- Table structure for table `journalist`
--

CREATE TABLE `journalist` (
  `Journalist_ID` int(9) NOT NULL,
  `Journalist_name` varchar(150) NOT NULL,
  `Journalist_email` varchar(200) NOT NULL,
  `Journalist_password` varchar(50) NOT NULL,
  `Active` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journalist`
--

INSERT INTO `journalist` (`Journalist_ID`, `Journalist_name`, `Journalist_email`, `Journalist_password`, `Active`) VALUES
(7, 'Fares', 'Fares@email.com', 'qwer1234', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE `reader` (
  `Reader_ID` int(9) NOT NULL,
  `Reader_name` varchar(150) NOT NULL,
  `Reader_email` varchar(200) NOT NULL,
  `Reader_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reader`
--

INSERT INTO `reader` (`Reader_ID`, `Reader_name`, `Reader_email`, `Reader_password`) VALUES
(7, 'Fares', 'Fares@email.com', 'qwer1234');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_ID` int(9) NOT NULL,
  `video_path` varchar(100) NOT NULL,
  `Article_ID` int(9) NOT NULL,
  `Journalist_ID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_ID`, `video_path`, `Article_ID`, `Journalist_ID`) VALUES
(18, './videos/WhatsApp Video 2020-12-03 at 1.01.15 AM.mp4', 27, 7),
(19, './videos/WhatsApp Video 2020-12-03 at 1.01.13 AM.mp4', 27, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Article_ID`);

--
-- Indexes for table `cheif_editor`
--
ALTER TABLE `cheif_editor`
  ADD PRIMARY KEY (`Cheif_ID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Comment_ID`);

--
-- Indexes for table `comment_creator`
--
ALTER TABLE `comment_creator`
  ADD PRIMARY KEY (`Creator_ID`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`Image_ID`);

--
-- Indexes for table `journalist`
--
ALTER TABLE `journalist`
  ADD PRIMARY KEY (`Journalist_ID`) KEY_BLOCK_SIZE=10;

--
-- Indexes for table `reader`
--
ALTER TABLE `reader`
  ADD PRIMARY KEY (`Reader_ID`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `Article_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cheif_editor`
--
ALTER TABLE `cheif_editor`
  MODIFY `Cheif_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Comment_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `comment_creator`
--
ALTER TABLE `comment_creator`
  MODIFY `Creator_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `Image_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `journalist`
--
ALTER TABLE `journalist`
  MODIFY `Journalist_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reader`
--
ALTER TABLE `reader`
  MODIFY `Reader_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
