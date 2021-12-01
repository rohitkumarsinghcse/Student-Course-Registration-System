-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 08:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fullname`, `username`, `email`, `gender`, `status`, `password`, `created_date`) VALUES
(2, 'Rohit Kumar Singh', 'admin', 'rohitkumarsinghcse@gmail.com', 'Male', 'Active', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2021-06-30 15:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `l` varchar(50) NOT NULL,
  `t` varchar(50) NOT NULL,
  `p` varchar(50) NOT NULL,
  `cr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `course_code`, `course_name`, `l`, `t`, `p`, `cr`) VALUES
(111, 'CS305', 'INTERNET CONCEPT AND WEB TECHNOLOGY', '1', '1', '1', '3'),
(112, 'CS312', 'OO PROGRAMMING & DATA STRUCTURES LAB', '0', '0', '2', '2'),
(113, 'CS320', 'PROBABILITY & STATISTICS', '1', '1', '1', '3'),
(114, 'CS405', 'DISCREATE MATHEMATICS', '1', '1', '1', '3'),
(115, 'CS408', 'DATA STRUCTURES', '1', '1', '1', '3'),
(116, 'CS421', 'GRAPH THOERY', '1', '1', '1', '3'),
(117, 'EF103', 'COMMUNICATION SKILLS', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade`
--

CREATE TABLE `tbl_grade` (
  `grade` varchar(50) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_grade`
--

INSERT INTO `tbl_grade` (`grade`, `course_code`, `user_id`, `id`) VALUES
('A+', 'CS305', '15', 1),
('A', 'CS408', '16', 2),
('A', 'CS312', '15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fullname`, `username`, `email`, `gender`, `status`, `password`, `created_date`) VALUES
(15, 'Rohit Kumar Singh', 'csm20054', 'csm20054@tezu.ac.in', 'Male', 'Active', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2021-06-15 20:32:30'),
(16, 'Nitish Kumar Nath', 'csm20048', 'csm20048@tezu.ac.in', 'Male', 'Active', '302314eb7a004288ebbf7770434a27311f69cac1', '2021-06-15 20:34:20'),
(17, 'Deepjyoti Hazarika', 'csm20018', 'csm20018@tezu.ac.in', 'Male', 'Active', 'c138388989fef5c90a8fdaad331ec5f2a964bf0a', '2021-06-15 20:35:06'),
(18, 'Rajnandinee Biswash', 'csm20019', 'csm20019@tezu.ac.in', 'Female', 'Active', 'a16ef1a90e5d8c3f4e37b8ca1f166ad45d28e099', '2021-06-15 20:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

CREATE TABLE `user_course` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `l` varchar(50) NOT NULL,
  `t` varchar(50) NOT NULL,
  `p` varchar(50) NOT NULL,
  `cr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_course`
--

INSERT INTO `user_course` (`id`, `user_id`, `course_code`, `course_name`, `l`, `t`, `p`, `cr`) VALUES
(123, 15, 'CS305', 'INTERNET CONCEPT AND WEB TECHNOLOGY', '1', '1', '1', '3'),
(124, 15, 'CS312', 'OO PROGRAMMING & DATA STRUCTURES LAB', '0', '0', '2', '2'),
(125, 15, 'CS320', 'PROBABILITY & STATISTICS', '1', '1', '1', '3'),
(126, 15, 'CS421', 'GRAPH THOERY', '1', '1', '1', '3'),
(127, 15, 'EF103', 'COMMUNICATION SKILLS', '0', '0', '0', '0'),
(128, 16, 'CS408', 'DATA STRUCTURES', '1', '1', '1', '3'),
(129, 16, 'CS421', 'GRAPH THOERY', '1', '1', '1', '3'),
(130, 16, 'EF103', 'COMMUNICATION SKILLS', '0', '0', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_course`
--
ALTER TABLE `user_course`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_course`
--
ALTER TABLE `user_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
