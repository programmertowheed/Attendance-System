-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 08:02 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentattendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(255) DEFAULT NULL,
  `auth` varchar(255) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `randnum` varchar(25) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `userEmail`, `userPass`, `auth`, `mobile`, `randnum`, `role`, `picture`) VALUES
(1, 'Towheed', 'programmertowheed@gmail.com', 'b7d495695d96614aa67d821a66fabe26', 'a0234bf5b751d2fe7348a7c60a121c3a', '01731974045', '312559', 'admin', 'dc3f96a0a23e9122a1c64f4528496165pic.jpg'),
(3, 'Towheed', 'mdtowheedulislam400@gmail.com', 'b7d495695d96614aa67d821a66fabe26', 'c7a5040b29c0d5e7801597118e2df70c', '01731974045', '947153', 'admin', 'dc3f96a0a23e9122a1c64f4528496165pic.jpg'),
(4, 'Towheed', 'admin@gmail.com', '2f120f2e99a59b939d1ca0e299c10596', '003491c43a8c2f03db942db9855bc09b', '01731974045', '736666', 'admin', 'dc3f96a0a23e9122a1c64f4528496165pic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `attend` int(11) NOT NULL DEFAULT '0',
  `att_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `teacher_id`, `student_id`, `subject_id`, `section_id`, `attend`, `att_time`) VALUES
(61, 4, 4, 8, 3, 0, '2020-04-07'),
(62, 4, 5, 8, 3, 1, '2020-04-07'),
(63, 4, 3, 8, 3, 0, '2020-04-07'),
(64, 4, 4, 8, 3, 1, '2020-04-05'),
(65, 4, 5, 8, 3, 1, '2020-04-05'),
(66, 4, 3, 8, 3, 0, '2020-04-05'),
(67, 4, 4, 8, 3, 1, '2020-04-08'),
(68, 4, 5, 8, 3, 1, '2020-04-08'),
(69, 4, 3, 8, 3, 1, '2020-04-08'),
(76, 1, 4, 1, 3, 1, '2020-04-08'),
(77, 1, 6, 1, 3, 1, '2020-04-08'),
(78, 1, 5, 1, 3, 1, '2020-04-08'),
(79, 1, 4, 1, 3, 1, '2020-04-04'),
(80, 1, 6, 1, 3, 1, '2020-04-04'),
(81, 1, 5, 1, 3, 1, '2020-04-04'),
(82, 1, 4, 4, 3, 1, '2020-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `publication_status` tinyint(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `name`, `publication_status`, `date`) VALUES
(1, 'CSE', 1, '2020-03-27 16:56:27'),
(3, 'Bangla', 1, '2020-03-27 17:03:07'),
(4, 'English', 1, '2020-03-27 17:17:54'),
(5, 'BBA', 1, '2020-03-28 13:01:22'),
(6, 'LLB', 1, '2020-04-03 09:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `publication_status` tinyint(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`id`, `name`, `publication_status`, `date`) VALUES
(3, 'A', 1, '2020-04-03 16:07:27'),
(4, 'B', 1, '2020-04-03 16:07:36'),
(5, 'C', 1, '2020-04-03 16:07:41'),
(6, 'D', 1, '2020-04-03 16:07:45'),
(10, 'E', 1, '2020-04-04 13:58:26'),
(11, 'F', 1, '2020-04-04 13:59:42'),
(12, 'G', 1, '2020-04-04 14:00:13'),
(13, 'H', 1, '2020-04-04 14:02:11'),
(14, 'I', 1, '2020-04-04 14:03:39'),
(15, 'J', 1, '2020-04-04 14:03:45'),
(16, 'K', 1, '2020-04-04 14:04:37'),
(17, 'L', 1, '2020-04-04 14:05:28'),
(18, 'M', 1, '2020-04-04 14:05:49'),
(19, 'N', 1, '2020-04-04 14:06:00'),
(20, 'O', 1, '2020-04-04 14:06:12'),
(21, 'P', 1, '2020-04-04 14:06:30'),
(22, 'Q', 1, '2020-04-04 14:06:40'),
(23, 'R', 1, '2020-04-04 14:06:52'),
(24, 'S', 1, '2020-04-04 14:07:00'),
(25, 'T', 1, '2020-04-04 14:07:10'),
(26, 'U', 1, '2020-04-04 14:07:19'),
(27, 'V', 1, '2020-04-04 14:07:34'),
(28, 'W', 1, '2020-04-04 14:07:51'),
(29, 'X', 1, '2020-04-04 14:08:06'),
(30, 'Y', 1, '2020-04-04 14:08:22'),
(31, 'Z', 1, '2020-04-04 14:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` varchar(50) NOT NULL,
  `studentid` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `publication_status` tinyint(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `name`, `department_id`, `studentid`, `phone`, `publication_status`, `date`) VALUES
(1, 'Md. Towheedul Islam', '1', '171-15-9275', '01731974045', 1, '2020-03-27 16:43:16'),
(3, 'Zahid Hasan', '1', '171-15-9298', '01731974045', 1, '2020-03-27 17:03:39'),
(4, 'Nasrullah All Jadid', '1', '171-15-9273', '01731974045', 1, '2020-03-27 17:19:33'),
(5, 'Md. Mohsin Alim', '1', '171-15-9276', '01731974045', 1, '2020-03-28 13:09:20'),
(6, 'Md. Raihan Mondol', '1', '171-15-9274', '01731974045', 1, '2020-03-28 16:45:51'),
(8, 'Md. Asaduzzaman', '1', '161-15-7621', '01731974045', 1, '2020-04-03 06:42:10'),
(9, 'Md. Jahidul Islam', '1', '171-15-8772', '01731974045', 1, '2020-04-08 12:20:36'),
(10, 'Sabbir Khan', '1', '171-15-9244', '01731974045', 1, '2020-04-08 12:23:23'),
(11, 'Saad Bin Hasan Sakib', '1', '171-15-9266', '01731974045', 1, '2020-04-08 12:23:44'),
(12, 'Md. Saidul Haq Rakib', '1', '171-15-9268', '01731974045', 1, '2020-04-08 12:24:06'),
(13, 'Tania Akter Lima', '1', '171-15-9269', '01731974045', 1, '2020-04-08 12:24:29'),
(14, 'Md. Rezwan Kabir', '1', '171-15-9271', '01731974045', 1, '2020-04-08 12:24:56'),
(15, 'G.M. Shariar Al Rumman', '1', '171-15-9277', '01731974045', 1, '2020-04-08 12:26:47'),
(16, 'Ummay Rafiya', '1', '171-15-9279', '01731974045', 1, '2020-04-08 12:27:07'),
(17, 'Biprojit Biswas', '1', '171-15-9282', '01731974045', 1, '2020-04-08 12:27:30'),
(18, 'Md. Mahbub Alam', '1', '171-15-9283', '01731974045', 1, '2020-04-08 12:28:14'),
(19, 'Md. S. M. Runju Raton', '1', '171-15-9285', '01731974045', 1, '2020-04-08 12:28:36'),
(20, 'ABDULLAH AL IMRAN', '1', '171-15-9286', '01731974045', 1, '2020-04-08 12:29:03'),
(21, 'Md. Tahmid Shahriar Shehab', '1', '171-15-9293', '01731974045', 1, '2020-04-08 12:29:25'),
(22, 'Mehedi Hasan', '1', '171-15-9296', '01731974045', 1, '2020-04-08 12:29:45'),
(23, 'Md. Riashad Ibne Kaiser', '1', '171-15-9297', '01731974045', 1, '2020-04-08 12:30:03'),
(24, 'Asif Hasan Ovee', '1', '171-15-9467', '01731974045', 1, '2020-04-08 12:30:29'),
(25, 'Md. Nazmul Islam', '1', '171-15-9469', '01731974045', 1, '2020-04-08 12:30:50'),
(26, 'Liton Sarker', '1', '171-15-9475', '01731974045', 1, '2020-04-08 12:31:12'),
(27, 'Niloy Dey', '1', '171-15-9476', '01731974045', 1, '2020-04-08 12:31:33'),
(28, 'Pinky Paul', '1', '171-15-9479', '01731974045', 1, '2020-04-08 12:31:56'),
(29, 'Kaniz Fatema', '1', '171-15-9483', '01731974045', 1, '2020-04-08 12:32:15'),
(30, 'Iftekhar Sadik', '1', '171-15-9485', '01731974045', 1, '2020-04-08 12:32:33'),
(31, 'Sree Shourov Kumar Ray Joy', '1', '171-15-9488', '01731974045', 1, '2020-04-08 12:32:52'),
(32, 'Tanny Halder', '1', '171-15-9494', '01731974045', 1, '2020-04-08 12:33:11'),
(33, 'Md. Monjurul Hossain Mony', '1', '171-15-9498', '01731974045', 1, '2020-04-08 12:33:30'),
(34, 'Tonmoy Rudra', '1', '171-15-9499', '01731974045', 1, '2020-04-08 12:33:59'),
(35, 'Sadia Afrin', '1', '171-15-9502', '01731974045', 1, '2020-04-08 12:34:17'),
(36, 'Nandita Kundu', '1', '171-15-9522', '01731974045', 1, '2020-04-08 12:34:38'),
(37, 'Md. Ferdows Ohid Anu', '1', '171-15-9290', '01731974045', 1, '2020-04-08 12:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentassign`
--

CREATE TABLE `tbl_studentassign` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_studentassign`
--

INSERT INTO `tbl_studentassign` (`id`, `student_id`, `subject_id`, `section_id`, `date`) VALUES
(14, 4, 1, 3, '2020-04-04 07:23:42'),
(15, 4, 4, 3, '2020-04-04 07:23:52'),
(16, 6, 4, 4, '2020-04-04 07:30:28'),
(17, 6, 1, 3, '2020-04-04 07:30:37'),
(19, 5, 1, 3, '2020-04-04 07:31:53'),
(20, 5, 8, 23, '2020-04-07 16:16:01'),
(21, 4, 8, 23, '2020-04-07 16:16:18'),
(22, 3, 8, 23, '2020-04-07 16:16:36'),
(23, 1, 9, 23, '2020-04-08 13:16:52'),
(24, 8, 9, 23, '2020-04-08 14:50:03'),
(25, 8, 10, 23, '2020-04-08 14:50:17'),
(26, 8, 8, 23, '2020-04-08 14:50:35'),
(27, 8, 11, 23, '2020-04-08 14:50:47'),
(28, 8, 4, 23, '2020-04-08 14:50:58'),
(29, 8, 12, 23, '2020-04-08 14:51:09'),
(30, 9, 9, 23, '2020-04-08 14:51:38'),
(31, 9, 4, 23, '2020-04-08 14:51:53'),
(32, 9, 8, 23, '2020-04-08 14:52:04'),
(33, 10, 9, 23, '2020-04-08 14:52:20'),
(34, 10, 8, 23, '2020-04-08 14:52:29'),
(35, 10, 4, 23, '2020-04-08 14:52:39'),
(36, 11, 9, 23, '2020-04-08 14:53:02'),
(37, 11, 8, 23, '2020-04-08 14:53:13'),
(38, 11, 4, 23, '2020-04-08 14:53:22'),
(39, 13, 9, 23, '2020-04-08 14:53:44'),
(40, 13, 8, 23, '2020-04-08 14:53:53'),
(41, 13, 4, 23, '2020-04-08 14:54:03'),
(42, 4, 9, 23, '2020-04-08 14:54:22'),
(43, 4, 4, 23, '2020-04-08 14:54:42'),
(44, 6, 9, 23, '2020-04-08 14:55:02'),
(45, 6, 8, 23, '2020-04-08 14:55:14'),
(46, 6, 4, 23, '2020-04-08 14:55:23'),
(47, 1, 8, 23, '2020-04-08 14:55:58'),
(48, 1, 4, 23, '2020-04-08 14:56:09'),
(49, 16, 9, 23, '2020-04-08 14:56:33'),
(50, 16, 8, 23, '2020-04-08 14:56:42'),
(51, 16, 4, 23, '2020-04-08 14:56:52'),
(52, 19, 9, 23, '2020-04-08 14:57:14'),
(53, 19, 8, 23, '2020-04-08 14:57:24'),
(54, 19, 4, 23, '2020-04-08 14:57:32'),
(55, 17, 9, 23, '2020-04-08 14:58:09'),
(56, 17, 8, 23, '2020-04-08 14:58:18'),
(57, 17, 4, 23, '2020-04-08 14:58:28'),
(58, 3, 9, 23, '2020-04-08 14:58:54'),
(59, 3, 4, 23, '2020-04-08 14:59:18'),
(60, 29, 9, 23, '2020-04-08 14:59:46'),
(61, 29, 8, 23, '2020-04-08 14:59:58'),
(62, 29, 4, 23, '2020-04-08 15:00:08'),
(63, 27, 9, 23, '2020-04-08 15:00:27'),
(64, 27, 8, 23, '2020-04-08 15:00:38'),
(65, 27, 4, 23, '2020-04-08 15:00:48'),
(66, 28, 9, 23, '2020-04-08 15:01:10'),
(67, 28, 8, 23, '2020-04-08 15:01:18'),
(68, 28, 4, 23, '2020-04-08 15:01:26'),
(69, 32, 9, 23, '2020-04-08 15:01:47'),
(70, 32, 8, 23, '2020-04-08 15:01:55'),
(71, 32, 4, 23, '2020-04-08 15:02:03'),
(72, 33, 9, 23, '2020-04-08 15:02:27'),
(73, 33, 8, 23, '2020-04-08 15:02:35'),
(74, 33, 4, 23, '2020-04-08 15:02:44'),
(75, 36, 9, 23, '2020-04-08 15:03:01'),
(76, 36, 8, 23, '2020-04-08 15:03:09'),
(77, 36, 4, 23, '2020-04-08 15:03:17'),
(78, 1, 1, 3, '2020-04-08 15:21:22'),
(79, 3, 1, 3, '2020-04-08 15:22:28'),
(80, 19, 1, 3, '2020-04-08 15:22:49'),
(81, 13, 1, 3, '2020-04-08 15:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `publication_status` tinyint(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `code`, `name`, `department_id`, `publication_status`, `date`) VALUES
(1, 'CSE112', 'Computer Fundamentals', 1, 1, '2020-04-03 16:45:31'),
(4, 'CSE417', 'Web Engineering', 1, 1, '2020-04-03 17:06:33'),
(8, 'CSE414', 'Simulation and Modeling', 1, 1, '2020-04-04 08:27:47'),
(9, 'CSE412', 'Artificial Intelligence', 1, 1, '2020-04-08 12:47:10'),
(10, 'CSE413', 'Artificial Intelligence Lab', 1, 1, '2020-04-08 12:50:08'),
(11, 'CSE415', 'Simulation and Modeling Lab', 1, 1, '2020-04-08 12:52:46'),
(12, 'CSE418', 'Web Engineering Lab', 1, 1, '2020-04-08 12:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` varchar(50) NOT NULL,
  `employeid` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `publication_status` tinyint(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`id`, `name`, `department_id`, `employeid`, `phone`, `publication_status`, `date`) VALUES
(1, 'Md Towheedul Islam', '1', '171159275', '+8801731974045', 1, '2020-04-05 06:51:10'),
(4, 'Zahid', '4', '171159298', '+8801731974045', 1, '2020-04-05 07:58:42'),
(5, 'Mr. G.m. Rasiqul Islam Rasiq', '1', '710002344', '+8801521216807', 1, '2020-04-08 15:07:45'),
(6, 'Mr. Md. Firoz Hasan', '1', '710001985', '+8801705726026', 1, '2020-04-08 15:15:25'),
(7, 'Mr. Subroto Nag Pinku', '1', '710001781', '+8801714365608', 1, '2020-04-08 15:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacherassign`
--

CREATE TABLE `tbl_teacherassign` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacherassign`
--

INSERT INTO `tbl_teacherassign` (`id`, `teacher_id`, `subject_id`, `section_id`, `date`) VALUES
(10, 1, 4, 3, '2020-04-03 21:27:50'),
(12, 1, 1, 3, '2020-04-03 21:33:27'),
(15, 1, 8, 5, '2020-04-04 08:36:29'),
(16, 4, 8, 3, '2020-04-07 16:14:44'),
(17, 5, 4, 23, '2020-04-08 15:08:13'),
(18, 7, 1, 3, '2020-04-08 15:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `employeid` int(11) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(255) DEFAULT NULL,
  `auth` varchar(255) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `randnum` varchar(25) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `employeid`, `userEmail`, `userPass`, `auth`, `mobile`, `randnum`, `role`, `picture`) VALUES
(1, 'Towheed', 171159275, 'programmertowheed@gmail.com', '693cfed9dd8adf7c63afbf53cf3a8043', 'db4cff2454c86812d39342441ecfb92a', '+8801731974045', '119550', 'Teacher', '2c4c0a3bb80cd3bd7b62456431906ec7upic.jpg'),
(6, 'Zahid', 171159298, 'zahid@gmail.com', '693cfed9dd8adf7c63afbf53cf3a8043', 'b8625e54c7049d0c3d131d312a12e24b', '+8801731974045', '810911', 'Teacher', '15c3ece2ca65c7d3c11af3c3c883ca1eupic.jpg'),
(7, 'Username', 710002344, 'rasiq.cse@diu.edu.bd', NULL, NULL, '+8801521216807', NULL, 'Teacher', NULL),
(8, 'Username', 710001985, 'firoz.cse@diu.edu.bd', NULL, NULL, '+8801705726026', NULL, 'Teacher', NULL),
(9, 'Username', 710001781, 'pinku.cse@diu.edu.bd', NULL, NULL, '+8801714365608', NULL, 'Teacher', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`,`userEmail`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_studentassign`
--
ALTER TABLE `tbl_studentassign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teacherassign`
--
ALTER TABLE `tbl_teacherassign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`,`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_studentassign`
--
ALTER TABLE `tbl_studentassign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_teacherassign`
--
ALTER TABLE `tbl_teacherassign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
