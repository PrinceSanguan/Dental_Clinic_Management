-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 03:20 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `fname`, `mname`, `lname`) VALUES
(1, 'admin', '$2y$10$37pjHhCnoWw5HxG0bXjruOxCLSGcPtasYk6COa3./xOGrNWGFxjjC', 'Admin', '', ''),
(8, '123123', '$2y$10$6AIU9zjgnR2j1QOfNumU9ua7nMODrdovIAsMDNQpMtcpF7suJcQuy', '123123', '123123', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `analytic`
--

CREATE TABLE `analytic` (
  `analytic_id` int(20) NOT NULL,
  `analytic_info` varchar(200) NOT NULL,
  `analytic_user` varchar(200) NOT NULL,
  `analytic_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analytic`
--

INSERT INTO `analytic` (`analytic_id`, `analytic_info`, `analytic_user`, `analytic_date`) VALUES
(3, 'Student Login', '29', 'July 19,2021 12:09:07 PM'),
(12, 'View Topic: try lang po 1111', '29', 'July 19,2021 12:17:07 PM'),
(19, 'Student Comment at try lang po 1111', '29', 'July 19,2021 12:23:07 PM'),
(20, 'Student Deleted a Comment at try lang po 1111', '29', 'July 19,2021 12:23:07 PM'),
(24, 'Student Update a Comment at try lang po 1111', '29', 'July 19,2021 12:30:07 PM'),
(25, 'Student Deleted a Comment at try lang po 1111', '29', 'July 19,2021 12:31:07 PM'),
(26, 'Student Deleted a Comment at try lang po 1111', '29', 'July 19,2021 12:31:07 PM'),
(27, 'Student Logout', '29', 'July 19,2021 06:43:07 AM'),
(28, 'Student Login', '29', 'July 19,2021 01:20:07 PM'),
(29, 'Student Logout', '29', 'July 19,2021 09:07:07 AM'),
(30, 'Student Login', '29', 'July 21,2021 06:52:07 PM'),
(31, 'View Topic: try lang po 1111', '29', 'July 21,2021 06:55:07 PM'),
(32, 'View Topic: try lang po 1111', '29', 'July 21,2021 07:00:07 PM'),
(33, 'Student Delete Question at try lang po 1111', '29', 'July 21,2021 07:09:07 PM'),
(34, 'Student Ask A Question at try lang po 1111', '29', 'July 21,2021 07:10:07 PM'),
(35, 'Student Update a Question at try lang po 1111', '29', 'July 21,2021 07:16:07 PM'),
(36, 'Student Ask A Question at try lang po 1111', '29', 'July 21,2021 07:16:07 PM'),
(37, 'Student Delete Question at try lang po 1111', '29', 'July 21,2021 07:16:07 PM'),
(38, 'Student Update a Question at try lang po 1111', '29', 'July 21,2021 07:17:07 PM'),
(39, 'View Topic: try lang po 1111', '30', 'July 21,2021 07:20:07 PM'),
(40, 'View Topic: try lang po 1111', '30', 'July 21,2021 07:21:07 PM'),
(41, 'View Topic: try lang po 1111', '30', 'July 21,2021 07:21:07 PM'),
(42, 'View Topic: try lang po 1111', '30', 'July 21,2021 07:42:07 PM'),
(43, 'View Topic: try lang po 1111', '29', 'July 21,2021 07:42:07 PM'),
(44, 'Student Ask A Question at try lang po 1111', '29', 'July 21,2021 07:44:07 PM'),
(45, 'Student Delete Question at try lang po 1111', '29', 'July 21,2021 07:51:07 PM'),
(46, 'Student Logout', '29', 'July 21,2021 01:52:07 PM'),
(47, 'View Topic: try lang po 1111', '31', 'July 30,2021 06:53:07 PM'),
(48, 'Student Login', '32', 'July 30,2021 07:20:07 PM'),
(49, 'Student Logout', '32', 'July 30,2021 01:20:07 PM'),
(50, 'Student Login', '33', 'July 30,2021 07:58:07 PM'),
(51, 'View Topic: 312312312', '33', 'July 30,2021 07:59:07 PM'),
(52, 'View Topic: 312312312', '33', 'July 30,2021 07:59:07 PM'),
(53, 'View Topic: 312312312', '33', 'July 30,2021 07:59:07 PM'),
(54, 'Student Post A New Comment at 312312312', '33', 'July 30,2021 08:03:07 PM'),
(55, 'Student Logout', '33', 'July 30,2021 02:03:07 PM'),
(56, 'Student Login', '32', 'July 30,2021 08:03:07 PM'),
(57, 'View Topic: try lang po 1111', '32', 'July 30,2021 08:03:07 PM'),
(58, 'View Topic: 312312312', '32', 'July 30,2021 08:09:07 PM'),
(59, 'Student Ask A Question at 312312312', '32', 'July 30,2021 08:15:07 PM'),
(60, 'View Topic: try lang po 1111', '32', 'July 30,2021 08:19:07 PM'),
(61, 'View Topic: try lang po 1111', '32', 'July 30,2021 08:19:07 PM'),
(62, 'View Topic: 312312312', '32', 'July 30,2021 08:27:07 PM'),
(63, 'View Topic: try lang po 1111', '32', 'July 30,2021 08:43:07 PM'),
(64, 'Student Logout', '32', 'July 30,2021 03:03:07 PM'),
(65, 'Student Login', '32', 'July 30,2021 09:46:07 PM'),
(66, 'View Topic: 1231231', '32', 'July 30,2021 09:46:07 PM'),
(67, 'Student Logout', '32', 'July 30,2021 05:10:07 PM'),
(68, 'Student Login', '32', 'August 01,2021 11:41:08 AM'),
(69, 'View Topic: asdsad', '32', 'August 01,2021 11:47:08 AM'),
(70, 'View Topic: 312312312', '32', 'August 01,2021 11:47:08 AM'),
(71, 'Student Ask A Question at 312312312', '32', 'August 01,2021 11:47:08 AM'),
(72, 'Student Ask A Question at 312312312', '32', 'August 01,2021 11:49:08 AM'),
(73, 'Student Delete Question at 312312312', '32', 'August 01,2021 11:50:08 AM'),
(74, 'Student Delete Question at 312312312', '32', 'August 01,2021 11:50:08 AM'),
(75, 'Student Ask A Question at 312312312', '32', 'August 01,2021 11:50:08 AM'),
(76, 'Student Ask A Question at 312312312', '32', 'August 01,2021 11:51:08 AM'),
(77, 'Student Delete Question at 312312312', '32', 'August 01,2021 11:51:08 AM'),
(78, 'Student Ask A Question at 312312312', '32', 'August 01,2021 12:22:08 PM'),
(79, 'Student Delete Question at 312312312', '32', 'August 01,2021 12:22:08 PM'),
(80, 'Student Delete Question at 312312312', '32', 'August 01,2021 12:22:08 PM'),
(81, 'Student Delete Question at 312312312', '32', 'August 01,2021 12:22:08 PM'),
(82, 'Student Ask A Question at 312312312', '32', 'August 01,2021 12:30:08 PM'),
(83, 'Student Ask A Question at 312312312', '32', 'August 01,2021 12:30:08 PM'),
(84, 'Student Delete Question at 312312312', '32', 'August 01,2021 12:31:08 PM'),
(85, 'Student Delete Question at 312312312', '32', 'August 01,2021 12:31:08 PM'),
(86, 'Student Ask A Question at 312312312', '32', 'August 01,2021 12:31:08 PM'),
(87, 'Student Ask A Question at 312312312', '32', 'August 01,2021 12:34:08 PM'),
(88, 'Student Ask A Question at 312312312', '32', 'August 01,2021 12:34:08 PM'),
(89, 'Student Login', '32', 'August 01,2021 03:23:08 PM'),
(90, 'View Topic: try', '32', 'August 01,2021 03:23:08 PM'),
(91, 'View Topic: try', '32', 'August 01,2021 03:23:08 PM'),
(92, 'Student Logout', '32', 'August 01,2021 09:24:08 AM'),
(93, 'Student Login', '32', 'August 01,2021 03:44:08 PM'),
(94, 'View Topic: 1231231', '32', 'August 01,2021 03:44:08 PM'),
(95, 'View Topic: 1231231', '32', 'August 01,2021 04:00:08 PM'),
(96, 'View Topic: 312312312', '32', 'August 01,2021 04:00:08 PM'),
(97, 'View Topic: try', '32', 'August 01,2021 04:00:08 PM'),
(98, 'View Topic: 1231231', '32', 'August 01,2021 04:23:08 PM'),
(99, 'View Topic: ', '32', 'August 01,2021 04:34:08 PM'),
(100, 'View Topic: 1231231', '32', 'August 01,2021 04:44:08 PM'),
(101, 'View Topic: 1231231', '32', 'August 01,2021 04:46:08 PM'),
(102, 'View Topic: 1231231', '32', 'August 01,2021 04:46:08 PM'),
(103, 'View Topic: 1231231', '32', 'August 01,2021 06:27:08 PM'),
(104, 'View Topic: 1231231', '32', 'August 01,2021 06:27:08 PM'),
(105, 'View Topic: 1231231', '32', 'August 01,2021 06:30:08 PM'),
(106, 'View Topic: try', '32', 'August 01,2021 06:30:08 PM'),
(107, 'View Topic: 1231231', '32', 'August 01,2021 06:30:08 PM'),
(108, 'View Topic: 1231231', '32', 'August 01,2021 06:30:08 PM'),
(109, 'Student Login', '32', 'September 07,2021 09:04:09 PM'),
(110, 'View Topic: 1231231', '32', 'September 07,2021 09:05:09 PM'),
(111, 'Student Post A New Comment at 1231231', '32', 'September 07,2021 09:05:09 PM'),
(112, 'View Topic: 1231231', '32', 'September 07,2021 09:07:09 PM'),
(113, 'Student Login', '33', 'September 28,2021 10:54:09 PM'),
(114, 'View Topic: 12312', '33', 'September 28,2021 10:55:09 PM'),
(115, 'Student Logout', '33', 'September 28,2021 10:56:09 PM'),
(116, 'Student Login', '33', 'September 28,2021 11:01:09 PM'),
(117, 'View Topic: 12312', '33', 'September 28,2021 11:02:09 PM'),
(118, 'View Topic: 12312', '33', 'September 28,2021 11:02:09 PM'),
(119, 'View Topic: 12312', '33', 'September 28,2021 11:03:09 PM'),
(120, 'Student Logout', '33', 'September 28,2021 11:04:09 PM'),
(121, 'Student Login', '33', 'October 01,2021 08:55:10 PM'),
(122, 'View Topic: 12312', '33', 'October 01,2021 09:00:10 PM'),
(123, 'Student Logout', '33', 'October 01,2021 09:05:10 PM'),
(124, 'Student Login', '32', 'October 01,2021 09:09:10 PM'),
(125, 'Student Logout', '32', 'October 01,2021 09:10:10 PM');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(20) NOT NULL,
  `question_topic` varchar(200) NOT NULL,
  `question_stu_id` varchar(200) NOT NULL,
  `question_desc` longtext NOT NULL,
  `question_date` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_topic`, `question_stu_id`, `question_desc`, `question_date`, `status`) VALUES
(16, 'try', '32', 'try', '08 01,21 04:33:25 PM', '1'),
(17, '123123', '32', '12312312', '08 01,2021 04:40:19 PM', '1'),
(18, '12312', '32', '312313', '08 01,2021 06:30:48 PM', '5');

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `answer_id` int(20) NOT NULL,
  `answer_topic` varchar(200) NOT NULL,
  `answer_user` varchar(200) NOT NULL,
  `answer_desc` longtext NOT NULL,
  `answer_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_answer`
--

INSERT INTO `question_answer` (`answer_id`, `answer_topic`, `answer_user`, `answer_desc`, `answer_date`) VALUES
(35, '18', '31', '1123123', '08 01,2021 06:45:59 PM'),
(36, '17', '31', '1', '08 01,2021 06:46:04 PM'),
(37, '16', '31', '1', '08 01,2021 06:46:10 PM'),
(38, '18', '31', '2313', '09 07,2021 09:14:13 PM'),
(39, '18', '31', '', '09 07,2021 09:30:57 PM'),
(40, '18', '31', '', '09 07,2021 09:31:06 PM'),
(41, '18', '31', '', '09 07,2021 09:31:58 PM');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(20) NOT NULL,
  `section_name` varchar(200) NOT NULL,
  `section_adviser` varchar(200) NOT NULL,
  `section_strand` varchar(200) NOT NULL,
  `section_grade` varchar(200) NOT NULL,
  `section_batch` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`, `section_adviser`, `section_strand`, `section_grade`, `section_batch`) VALUES
(7, 'Generous', 'Dion calipay', 'ABM', 'G11', '2020'),
(8, 'Exemplary', 'Dion Calipay', 'ABM', 'G12', '2020'),
(10, 'Optimistic', 'Jelo Flores', 'GAS', 'G12', '2020'),
(11, 'Dignified', 'Dion Calipay', 'HE', 'G11', '2020'),
(12, 'Diligent', 'Jelo Flores', 'HE', 'G12', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `section_info`
--

CREATE TABLE `section_info` (
  `section_list_id` int(20) NOT NULL,
  `section_id` varchar(200) NOT NULL,
  `section_list_name` varchar(200) NOT NULL,
  `section_list_birthdate` varchar(200) NOT NULL,
  `section_list_gender` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_info`
--

INSERT INTO `section_info` (`section_list_id`, `section_id`, `section_list_name`, `section_list_birthdate`, `section_list_gender`) VALUES
(14, '7', '32', '01 02,2020', 'Male'),
(15, '7', '33', '01 02,2020', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `u_id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `user_id_number` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `status_1` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`u_id`, `username`, `email`, `fname`, `mname`, `lname`, `password`, `position`, `user_id_number`, `status`, `status_1`) VALUES
(3, 'admin', 'admin@gmail.com', 'Admin', 'Po', 'Ako', '$2y$10$NwbZY8z.B9.ElwoY5VL61.YiquKWeSvfsu5rqTHcrb1FPTssYLUOy', 'Admin', '', '', ''),
(31, 'teacher', 'teacher@gmail.com', 'Teacher', 'Account', 'Ito', '$2y$10$9OwTY8FN6b67DrucZYX5s.LwQpoMyzMf5NwyQ5D.2VaENXw.qv8hm', 'Teacher', '123123123', 'Approve', 'Active'),
(32, 'trece', '123123@gmail.com', '12312312312', '31231231', '123123', '$2y$10$2Nk/9l4muJIKXtI8uK5UxOtA6N3gTpfL/DhdmFCN5cXiiCMxk3Qtm', 'Student', '123123123123', 'Approve', 'Active'),
(33, '123123', '123123@gmail.com', 'Joshua Ellis', 'Dizon', 'Enore', '$2y$10$8wchpsozMIosr8mLTqhyk.VOeIi.BG8mr5zIOkWEtmfE.PGVgV7ma', 'Student', '123123123', 'Approve', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `youtube`
--

CREATE TABLE `youtube` (
  `youtube_id` int(20) NOT NULL,
  `youtube_title` varchar(200) NOT NULL,
  `youtube_grade` varchar(200) NOT NULL,
  `youtube_desc` varchar(200) NOT NULL,
  `youtube_google` longtext NOT NULL,
  `youtube_link_a` longtext NOT NULL,
  `youtube_link` longtext NOT NULL,
  `youtube_year` varchar(200) NOT NULL,
  `youtube_strand` varchar(200) NOT NULL,
  `youtube_sec` varchar(200) NOT NULL,
  `youtube_user` varchar(200) NOT NULL,
  `youtube_lastname` varchar(200) NOT NULL,
  `youtube_date_up` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `youtube`
--

INSERT INTO `youtube` (`youtube_id`, `youtube_title`, `youtube_grade`, `youtube_desc`, `youtube_google`, `youtube_link_a`, `youtube_link`, `youtube_year`, `youtube_strand`, `youtube_sec`, `youtube_user`, `youtube_lastname`, `youtube_date_up`) VALUES
(6, '312312312', 'G11', '1231231231', '123123123', '', '1231231221', '2021', 'ICT', '7', '31', '', 'September 11,2021'),
(7, '1231231', 'G11', '3123123', 'tl', 'ml', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/snPjPokfM5o\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '202138', 'ICT', '7', '3', '', 'September 11,2021'),
(8, 'asdsad', 'G11', 'ysad', 'tl', 'ml', 'yt', '202109', 'ICT', '7', '31', '', 'September 11,2021'),
(9, 'try', 'G12', 'asd', 'https://www.youtube.com/watch?v=CEw-7cMnBDY&list=RDCEw-7cMnBDY&start_radio=1', 'https://www.youtube.com/watch?v=CEw-7cMnBDY&list=RDCEw-7cMnBDY&start_radio=1', '<iframe width=\"1254\" height=\"759\" src=\"https://www.youtube.com/embed/CEw-7cMnBDY?list=RDCEw-7cMnBDY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '202138', 'ICT', '7', '3', '', 'September 11,2021'),
(12, '12312', 'G11', '1231231', '312312', '312312', '312312312', '202116', 'ABM', '7', '33', 'Enore', 'September 11,2021');

-- --------------------------------------------------------

--
-- Table structure for table `youtube_comment`
--

CREATE TABLE `youtube_comment` (
  `youtube_comment_id` int(20) NOT NULL,
  `youtube_id` varchar(200) NOT NULL,
  `youtube_user` varchar(200) NOT NULL,
  `youtube_comment` longtext NOT NULL,
  `youtube_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `youtube_comment`
--

INSERT INTO `youtube_comment` (`youtube_comment_id`, `youtube_id`, `youtube_user`, `youtube_comment`, `youtube_date`) VALUES
(15, '6', '33', '1231231', 'July 30,2021 08:03:07 PM'),
(16, '7', '32', '12312', 'September 07,2021 09:05:09 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `analytic`
--
ALTER TABLE `analytic`
  ADD PRIMARY KEY (`analytic_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `section_info`
--
ALTER TABLE `section_info`
  ADD PRIMARY KEY (`section_list_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `youtube`
--
ALTER TABLE `youtube`
  ADD PRIMARY KEY (`youtube_id`);

--
-- Indexes for table `youtube_comment`
--
ALTER TABLE `youtube_comment`
  ADD PRIMARY KEY (`youtube_comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `analytic`
--
ALTER TABLE `analytic`
  MODIFY `analytic_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `answer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `section_info`
--
ALTER TABLE `section_info`
  MODIFY `section_list_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `youtube`
--
ALTER TABLE `youtube`
  MODIFY `youtube_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `youtube_comment`
--
ALTER TABLE `youtube_comment`
  MODIFY `youtube_comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
