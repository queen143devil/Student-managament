-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 10:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kumar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(60) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'RITTU', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `curr_date` date DEFAULT NULL,
  `attendance_month` varchar(45) DEFAULT NULL,
  `attendance_year` varchar(45) DEFAULT NULL,
  `attendance` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `curr_date`, `attendance_month`, `attendance_year`, `attendance`) VALUES
(1, 1, '2023-01-27', 'Jan', '2023', 'P'),
(2, 2, '2023-01-27', 'Jan', '2023', 'P'),
(3, 4, '2023-01-27', 'Jan', '2023', 'P'),
(4, 5, '2023-01-27', 'Jan', '2023', 'P'),
(5, 6, '2023-01-27', 'Jan', '2023', 'P'),
(6, 8, '2023-01-27', 'Jan', '2023', 'P'),
(7, 9, '2023-01-27', 'Jan', '2023', 'P'),
(8, 10, '2023-01-27', 'Jan', '2023', 'P'),
(9, 12, '2023-01-27', 'Jan', '2023', 'P'),
(10, 13, '2023-01-27', 'Jan', '2023', 'P'),
(11, 3, '2023-01-27', 'Jan', '2023', 'A'),
(12, 11, '2023-01-27', 'Jan', '2023', 'A'),
(13, 7, '2023-01-27', 'Jan', '2023', 'L'),
(14, 14, '2023-01-27', 'Jan', '2023', 'L'),
(15, 14, '2023-01-27', 'Jan', '2023', 'L'),
(16, 1, '2023-08-03', 'Aug', '2023', 'P'),
(17, 2, '2023-08-03', 'Aug', '2023', 'P'),
(18, 3, '2023-08-03', 'Aug', '2023', 'P'),
(19, 4, '2023-08-03', 'Aug', '2023', 'A'),
(20, 10, '2023-08-03', 'Aug', '2023', 'A'),
(21, 12, '2023-08-03', 'Aug', '2023', 'A'),
(22, 15, '2023-08-04', 'Aug', '2023', 'P'),
(23, 1, '2023-08-04', 'Aug', '2023', 'A'),
(24, 3, '2023-08-05', 'Aug', '2023', 'L'),
(25, 5, '2023-08-05', 'Aug', '2023', 'H'),
(26, 16, '2023-08-06', 'Aug', '2023', 'A'),
(27, 18, '2023-08-06', 'Aug', '2023', 'P'),
(28, 4, '2023-08-07', 'Aug', '2023', 'A'),
(29, 7, '2023-08-07', 'Aug', '2023', 'L'),
(30, 9, '2023-08-07', 'Aug', '2023', 'H'),
(31, 1, '2023-08-07', 'Aug', '2023', 'P'),
(32, 4, '2023-08-07', 'Aug', '2023', 'A'),
(33, 7, '2023-08-07', 'Aug', '2023', 'L'),
(34, 11, '2023-08-07', 'Aug', '2023', 'H'),
(35, 19, '2023-08-08', 'Aug', '2023', 'P'),
(36, 20, '2023-08-08', 'Aug', '2023', 'L'),
(37, 21, '2023-08-08', 'Aug', '2023', 'P'),
(38, 3, '2023-08-08', 'Aug', '2023', 'P'),
(39, 6, '2023-08-08', 'Aug', '2023', 'A'),
(40, 10, '2023-08-08', 'Aug', '2023', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_students`
--

CREATE TABLE `attendance_students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_students`
--

INSERT INTO `attendance_students` (`id`, `student_name`) VALUES
(1, 'Aman'),
(2, 'Shashank'),
(3, 'Deepak'),
(4, 'Ravi'),
(5, 'Dev'),
(6, 'Devansh'),
(7, 'Neeraj'),
(8, 'Rahul'),
(9, 'Chandresh'),
(10, 'Arman'),
(11, 'Anand'),
(12, 'Akash'),
(13, 'Ajay'),
(14, 'Rohit'),
(15, 'bksdbbgs'),
(16, 'pagti kumari'),
(17, 'bdgkbgas'),
(18, 'ritash'),
(19, 'RAHUL'),
(20, 'AKASH'),
(21, 'niraj');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `father_name`, `gender`, `email_address`) VALUES
(1, 'Arif', 'Ahmed', 'Male', 'arif@live.com'),
(2, 'Ali', 'Asghar', 'Male', 'ali@live.com'),
(3, 'Saima', 'Khan', 'Female', 'fatima@live.com'),
(4, 'Shoaib', 'Akbar', 'Male', 'shoaib@live.com'),
(5, 'Haseeb', 'Ali', 'Male', 'haseeb@live.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_students`
--
ALTER TABLE `attendance_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `attendance_students`
--
ALTER TABLE `attendance_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
