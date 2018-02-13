-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2017 at 04:07 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE `comment_table` (
  `COMMENT_ID` int(11) NOT NULL,
  `POST_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `COMMENT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `confirmation_table`
--

CREATE TABLE `confirmation_table` (
  `CONFIRMATION_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `VALIDATION_TEXT` varchar(50) NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_image_table`
--

CREATE TABLE `post_image_table` (
  `IMAGE_ID` int(11) NOT NULL,
  `POST_ID` int(11) NOT NULL,
  `IMAGE_LINK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE `post_table` (
  `POST_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `TITLE` varchar(50) NOT NULL,
  `ADDRESS` text NOT NULL,
  `RENT` int(8) NOT NULL,
  `DATE_TIME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_data_table`
--

CREATE TABLE `user_profile_data_table` (
  `PROFILE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PHONE_NO` varchar(15) DEFAULT NULL,
  `IMAGE` text,
  `ADDRESS` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile_data_table`
--

INSERT INTO `user_profile_data_table` (`PROFILE_ID`, `USER_ID`, `PHONE_NO`, `IMAGE`, `ADDRESS`) VALUES
(5, 24, NULL, NULL, NULL),
(6, 25, NULL, NULL, NULL),
(7, 26, NULL, '../profile_picture/26.jpg', NULL),
(8, 27, NULL, NULL, NULL),
(9, 28, NULL, NULL, NULL),
(10, 31, NULL, NULL, NULL),
(11, 32, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `USER_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(30) NOT NULL,
  `LAST_NAME` varchar(30) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_TYPE` varchar(15) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `CREATION_DATE_TIME` varchar(25) NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `USER_NAME`, `USER_TYPE`, `EMAIL`, `PASSWORD`, `CREATION_DATE_TIME`, `Gender`) VALUES
(24, 'Ishtiak', 'Hasan', 'ishti20', 'AUTH_USER', 'ishtiak.hasan10@gmail.com', '123', '2017-08-11 12:11:51 pm', 'Male'),
(25, 'Nigga', 'Rakhi', 'Rakhi20', 'AUTH_USER', 'rakhi20@gmail.com', '123', '2017-08-11 12:12:41 pm', 'Female'),
(26, 'Robi', 'Ratno', 'robi20', 'AUTH_USER', 'robi20@gmail.com', '123', '2017-08-11 12:13:17 pm', 'Others'),
(27, 'Urme', 'jaman', 'urme20', 'AUTH_USER', 'jamanvai@gmail.com', '123', '2017-08-11 12:14:20 pm', 'Female'),
(28, 'Susmita', 'Anchal', 'fozli20', 'AUTH_USER', 'fozli20@gmail.com', '123', '2017-08-11 12:15:04 pm', 'Female'),
(29, 'Kakon', 'Ghosh', 'kaku', 'ADMIN_USER', 'kakon20@gmail.com', '123', '2017-08-11 12:17:28 pm', 'Male'),
(30, 'Shihab', 'Saadi', 'saadi20', 'ADMIN_USER', 'saadi@gmail.com', '123', '2017-08-11 12:17:54 pm', 'Male'),
(31, 'Jaber', 'Hossain', 'jaber', 'AUTH_USER', 'jaberhossain100', '1234', '2017-08-12 00:05:11 am', 'Male'),
(32, 'ig tfytc', 'cfcfytf', 'ghvydcg', 'AUTH_USER', 'vyufufghf', '123', '2017-08-12 00:40:31 am', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`COMMENT_ID`),
  ADD KEY `POST_ID` (`POST_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `confirmation_table`
--
ALTER TABLE `confirmation_table`
  ADD PRIMARY KEY (`CONFIRMATION_ID`),
  ADD UNIQUE KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `post_image_table`
--
ALTER TABLE `post_image_table`
  ADD PRIMARY KEY (`IMAGE_ID`),
  ADD KEY `POST_ID` (`POST_ID`);

--
-- Indexes for table `post_table`
--
ALTER TABLE `post_table`
  ADD PRIMARY KEY (`POST_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `USER_ID_2` (`USER_ID`),
  ADD KEY `USER_ID_3` (`USER_ID`);

--
-- Indexes for table `user_profile_data_table`
--
ALTER TABLE `user_profile_data_table`
  ADD PRIMARY KEY (`PROFILE_ID`),
  ADD UNIQUE KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `ADMIN_USER_NAME` (`USER_NAME`),
  ADD UNIQUE KEY `ADMIN_EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `COMMENT_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `confirmation_table`
--
ALTER TABLE `confirmation_table`
  MODIFY `CONFIRMATION_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_image_table`
--
ALTER TABLE `post_image_table`
  MODIFY `IMAGE_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `POST_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_profile_data_table`
--
ALTER TABLE `user_profile_data_table`
  MODIFY `PROFILE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD CONSTRAINT `fk_comTable_pTable` FOREIGN KEY (`POST_ID`) REFERENCES `post_table` (`POST_ID`),
  ADD CONSTRAINT `fk_comTable_uTable` FOREIGN KEY (`USER_ID`) REFERENCES `user_table` (`USER_ID`);

--
-- Constraints for table `confirmation_table`
--
ALTER TABLE `confirmation_table`
  ADD CONSTRAINT `fk_Utable_ConTable` FOREIGN KEY (`USER_ID`) REFERENCES `user_table` (`USER_ID`);

--
-- Constraints for table `post_image_table`
--
ALTER TABLE `post_image_table`
  ADD CONSTRAINT `fk_pImgTable_pTable` FOREIGN KEY (`POST_ID`) REFERENCES `post_table` (`POST_ID`);

--
-- Constraints for table `post_table`
--
ALTER TABLE `post_table`
  ADD CONSTRAINT `fk_pTable_uTable` FOREIGN KEY (`USER_ID`) REFERENCES `user_table` (`USER_ID`);

--
-- Constraints for table `user_profile_data_table`
--
ALTER TABLE `user_profile_data_table`
  ADD CONSTRAINT `fk_Utable_UProTable` FOREIGN KEY (`USER_ID`) REFERENCES `user_table` (`USER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
