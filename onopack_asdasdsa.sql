-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 01:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onopack_asdasdsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `employee_number` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`, `position`, `fname`, `mname`, `lname`, `employee_number`, `status`) VALUES
(11, 'ADMIN', 'admin@gmail.com', '$2y$10$dwwcPvpailvQga3/IZj/CuRsr8WFSyoGAclXxpzxfeZg28cbEmfDq', 'Admin', 'VICTOR', 'NATASSA ', 'HERRERA', 'EMP-001002512', 'In'),
(16, 'juan123', 'juanlunadelacruz@gmail.com', '$2y$10$PQ/emdrnvAbM7QFpY1xsdeVsT5nWYxW8r4EFXGp/LNlL8Q5jzvCAC', 'Inventory', 'juan', 'luna', 'delacruz', 'EMP-102002512', 'Out'),
(17, 'rencinares', 'encinares.roman@ncst.edu.ph', '$2y$10$utMyBMWKhzyptSZIdV6SeOqhVlr539Hu63Cge9AFxhBqApLIaH4qC', 'Logistic', 'Roman', 'Andaya', 'Encinares', 'EMP-203002512', 'Out'),
(18, 'rapido', 'juan@gmail.com', '$2y$10$lOo64FCPzEN68VPlmhfx0OaQDbFeNctms/AV0N9X.1kaapfqbGWcq', 'Sales', 'juan', 'disa', 'manuel', 'EMP-304002512', 'In'),
(19, 'mario', 'mario@gmail.com', '$2y$10$1Xcff.dlnoAcUyMUR8/9qeeR.eBXIBfs4DP6ONbr7zrupZtYEA7um', 'Accounting', 'mario', 'tagaso', 'apollo', 'EMP-405002512', 'Out'),
(20, 'antonioluna', 'antonioluna@gmail.com', '$2y$10$dwwcPvpailvQga3/IZj/CuRsr8WFSyoGAclXxpzxfeZg28cbEmfDq', 'HR', 'Antonio', '', 'Luna', 'EMP-221501073000', 'In'),
(21, 'ricardomercado', 'romanencinares@gmail.com', '$2y$10$dwwcPvpailvQga3/IZj/CuRsr8WFSyoGAclXxpzxfeZg28cbEmfDq', 'HR', 'Ricardo', 'mesiya', 'Mercado', 'EMP-222801092958', 'In'),
(22, 'nicole', 'jenniecocochanel@gmail.com', '$2y$10$sJC1LJiXhxzPiL7N77sKq.gK3dacGpdu.t6g77IDnXsrg5y9NIYtG', 'Logistic', 'Nicole', 'Kim', 'Calubayan', 'EMP-222801110429', 'In'),
(23, 'johndera', 'ajhdsajhfs@gmail.com', '$2y$10$dwwcPvpailvQga3/IZj/CuRsr8WFSyoGAclXxpzxfeZg28cbEmfDq', 'HR', 'john', 'dera', 'usteng', 'EMP-220102041915', 'Out'),
(24, 'paseyo', 'paseyo@gmail.com', '$2y$10$USEZ.cqPrxbG3tqImLAWMONoLpxcTCPYID88XfsZaCPoriNEoWCPu', 'Inventory', 'jose', 'gara', 'paseyo', 'EMP-220302122238', 'Out'),
(25, 'Test24', 'Test@gmail.com', '$2y$10$dwwcPvpailvQga3/IZj/CuRsr8WFSyoGAclXxpzxfeZg28cbEmfDq', 'HR', 'Test', 'Test', 'test', 'EMP-220502044057', 'Out'),
(26, 'ram', 'fdgfdgd@gmail.com', '$2y$10$hjz7VnQeOLoPsLAXJgfFV.u79x6hRbnbsNzguzJwxET8Ap3uUKVTC', 'Sales', 'fdgdfg', 'dfgfd', 'dlkjfgfd', 'EMP-220603122730', 'Out'),
(27, 'BJ', 'Benj@gmail.com', '$2y$10$Dar4muM45ZLxPQ/hSfYCauQVQA8nNJNWNUQvcl7J287y5Kchc/dHm', 'Accounting', 'Benjo', 'Paquil', 'Mercedez', 'EMP-220603032415', 'Out');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `appointment_user` varchar(200) NOT NULL,
  `appointment_date` varchar(200) NOT NULL,
  `appointment_service` varchar(200) NOT NULL,
  `appointment_status` varchar(200) NOT NULL,
  `why` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_desc`
--

CREATE TABLE `appointment_desc` (
  `appointment_desc_id` int(11) NOT NULL,
  `appointment_id` varchar(200) NOT NULL,
  `appointment_desc` varchar(200) NOT NULL,
  `appointment_date` varchar(200) NOT NULL,
  `why` varchar(200) NOT NULL,
  `appointment_update_by` varchar(200) NOT NULL,
  `appointment_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment_desc`
--

INSERT INTO `appointment_desc` (`appointment_desc_id`, `appointment_id`, `appointment_desc`, `appointment_date`, `why`, `appointment_update_by`, `appointment_status`) VALUES
(63, '73', '16', '2024-08-27 - 08:00', '', '', 'Success'),
(64, '73', '16', '2024-08-27 - 08:00', '', '', 'Cancelled'),
(65, '', '', '2024-08-30', 'no Booking family matters', '', 'Remove'),
(66, '73', '16', '2024-08-30 - 08:00', '', '', 'Cancelled'),
(67, '72', '22', '2024-08-27 - 08:00', '', '', 'Success'),
(68, '72', '17', '2024-08-29 - 14:00', '', '', 'Success'),
(69, '75', '16', '2024-08-29 - 13:00', '', '', 'Approved'),
(70, '72', '18', '2024-08-28 - 16:00', '', '', 'Cancelled'),
(71, '', '', '2024-09-14', 'Vacation', '', 'Remove'),
(72, '75', '16', '2024-09-13 - 08:00', '', '', 'Success'),
(73, '', '', '2024-09-17', 'No Schedule', '', 'Remove'),
(74, '', '', '2024-09-18', 'Stress si Doc', '', 'Remove'),
(75, '78', '22', '2024-09-10 - 15:00', '', '', 'Approved'),
(76, '78', '16', '2024-09-11 - 13:00', '', '', 'Cancelled'),
(77, '78', '22', '2024-09-19 - 15:00', '', '', 'Approved'),
(78, '78', '22', '2024-09-13 - 15:00', '', '', 'Pending'),
(79, '78', '22', '2024-09-20 - 16:00', '', '', 'Pending'),
(80, '78', '22', '2024-09-12 - 16:00', '', '', 'Pending'),
(81, '78', '22', '2024-09-12 - 16:00', '', '', 'Pending'),
(82, '78', '22', '2024-09-12 - 15:00', '', '', 'Pending'),
(83, '78', '22', '2024-09-12 - 14:00', '', '', 'Pending'),
(84, '78', '16', '2024-09-25 - 16:00', '', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `chat_user` varchar(200) NOT NULL,
  `chat_reps_u_id` varchar(200) NOT NULL,
  `chat_user_id` varchar(200) NOT NULL,
  `chat_message` longtext NOT NULL,
  `chat_time` varchar(200) NOT NULL,
  `chat_to` varchar(200) NOT NULL,
  `view` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `chat_user`, `chat_reps_u_id`, `chat_user_id`, `chat_message`, `chat_time`, `chat_to`, `view`, `file`) VALUES
(55, '71', '1', '11', 'chi', '08/27/2024 11:52:56 am', '71', '', 'Text'),
(56, '73', '1', '73', 'hello po doc', '08/27/2024 12:36:07 pm', '73', '1', 'Text'),
(57, '73', '1', '', 'hi whats ur concern po?', '08/27/2024 12:36:26 pm', '73', '', 'Text'),
(58, '73', '1', '73', '0827371223-24.jpeg', '08/27/2024 12:37:23 pm', '73', '1', 'Image'),
(59, '73', '1', '73', '0827371224-24.jpeg', '08/27/2024 12:37:24 pm', '73', '1', 'Image'),
(60, '73', '1', '', 'OKAY PO', '08/27/2024 12:37:39 pm', '73', '', 'Text'),
(61, '72', '1', '', '...', '08/27/2024 12:47:18 pm', '72', '', 'Text'),
(62, '79', '1', '79', 'hello ', '09/09/2024 05:57:16 pm', '79', '1', 'Text'),
(63, '79', '1', '', 'hi', '09/09/2024 05:57:37 pm', '79', '', 'Text'),
(64, '78', '1', '78', 'yes', '09/09/2024 07:04:08 pm', '78', '1', 'Text'),
(65, '78', '1', '78', '', '09/10/2024 04:33:22 pm', '78', '1', 'Text'),
(66, '78', '1', '', 'ianasdasda', '09/10/2024 06:08:38 pm', '78', '', 'Text'),
(67, '78', '1', '', 'sdsds', '09/10/2024 06:08:51 pm', '78', '', 'Text'),
(68, '78', '1', '78', 'hello sir welcome', '09/10/2024 06:14:37 pm', '78', '1', 'Text'),
(69, '78', '1', '', 'gegege', '09/10/2024 06:15:36 pm', '78', '', 'Text'),
(70, '78', '1', '', 'sdsdds', '09/10/2024 06:17:56 pm', '78', '', 'Text'),
(71, '78', '1', '', 'sdsdsd', '09/10/2024 06:17:59 pm', '78', '', 'Text'),
(72, '78', '1', '', 'asdasdasdasdasda', '09/10/2024 06:26:11 pm', '78', '', 'Text'),
(73, '78', '1', '78', '0910470656-24.jpeg', '09/10/2024 06:47:56 pm', '78', '1', 'Image'),
(74, '78', '1', '78', 'dioc', '09/10/2024 06:52:33 pm', '78', '1', 'Text'),
(75, '78', '1', '', 'hdjahs', '09/10/2024 06:52:52 pm', '78', '', 'Text'),
(76, '78', '1', '78', 'dsdfs', '09/10/2024 06:53:11 pm', '78', '1', 'Text'),
(77, '78', '1', '', 'sdfsd', '09/10/2024 06:53:20 pm', '78', '', 'Text'),
(78, '78', '1', '78', 'shdjsh', '09/10/2024 07:08:53 pm', '78', '1', 'Text'),
(79, '78', '1', '78', 'jj', '09/10/2024 07:17:59 pm', '78', '1', 'Text'),
(80, '78', '1', '78', 'hi love', '09/10/2024 07:18:41 pm', '78', '1', 'Text'),
(81, '78', '1', '78', 'asdasd', '09/10/2024 07:18:54 pm', '78', '1', 'Text'),
(82, '78', '1', '78', 'asd', '09/10/2024 07:18:59 pm', '78', '1', 'Text'),
(83, '78', '1', '', 'ss', '09/10/2024 07:19:44 pm', '78', '', 'Text'),
(84, '78', '1', '', 'asd', '09/10/2024 07:20:34 pm', '78', '', 'Text'),
(85, '78', '1', '', 'sds', '09/10/2024 07:20:37 pm', '78', '', 'Text');

-- --------------------------------------------------------

--
-- Table structure for table `dental_history`
--

CREATE TABLE `dental_history` (
    `dental_history_id` int(20) NOT NULL,
    `dental_user` varchar(200) NOT NULL,
    `dental_file` varchar(200) NOT NULL,
    `dental_brace` varchar(200) NULLABLE, -- or omit NOT NULL
    `dental_comment` varchar(200) NULLABLE, -- or omit NOT NULL
    `dental_status` varchar(200) NOT NULL,
    `dental_date` varchar(200) NOT NULL,
    `appointment_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dental_history`
--

INSERT INTO `dental_history` (`dental_history_id`, `dental_user`, `dental_file`, `dental_comment`, `dental_status`, `dental_date`, `appointment_desc`) VALUES
(29, '72', '14', 'Adjusted', 'Healing', 'August 27,2024 - 12:48:49 PM', ''),
(30, '72', '', 'Brace\r\n', 'Brace', 'August 28,2024 - 03:05:21 PM', ''),
(31, '75', '11', 'None', 'Done', 'September 07,2024 - 06:28:19 AM', '72');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `inventory_name` varchar(200) NOT NULL,
  `inventory_qty` varchar(200) NOT NULL,
  `inventory_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `inventory_name`, `inventory_qty`, `inventory_status`) VALUES
(7, 'Band Aid', '184', '1'),
(8, 'Candy', '84', '1');

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `med_id` int(20) NOT NULL,
  `med_date` varchar(200) NOT NULL,
  `med_prev_dent` varchar(200) NOT NULL,
  `med_last_vi` varchar(200) NOT NULL,
  `one` varchar(200) NOT NULL,
  `two` varchar(200) NOT NULL,
  `two_answer` varchar(200) NOT NULL,
  `three` varchar(200) NOT NULL,
  `three_answer` varchar(200) NOT NULL,
  `four` varchar(200) NOT NULL,
  `four_answer` varchar(200) NOT NULL,
  `five` varchar(200) NOT NULL,
  `five_answer` varchar(200) NOT NULL,
  `six` varchar(200) NOT NULL,
  `seven` varchar(200) NOT NULL,
  `allergies_str` longtext NOT NULL,
  `pregnant` varchar(200) NOT NULL,
  `nursing` varchar(200) NOT NULL,
  `pills` varchar(200) NOT NULL,
  `blood_type` varchar(200) NOT NULL,
  `conditions_str` longtext NOT NULL,
  `u_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`med_id`, `med_date`, `med_prev_dent`, `med_last_vi`, `one`, `two`, `two_answer`, `three`, `three_answer`, `four`, `four_answer`, `five`, `five_answer`, `six`, `seven`, `allergies_str`, `pregnant`, `nursing`, `pills`, `blood_type`, `conditions_str`, `u_id`) VALUES
(2, 'August 02,2024 20:38: PM', 'PREVIOUS DENTIST DOCTOR:', 'LAST DENTAL VISIT:', 'Yes', 'Yes', 'yes', 'Yes', 'yes', 'Yes', 'yes', 'Yes', 'yes', 'Yes', 'Yes', 'Local Anesthetic, Penicilin, Antibiotics, Aspinn, Latex, Sulfa drugs, Others: yes', 'Yes', 'Yes', 'Yes', 'yes', 'High Blood Pressure, Hepatitis/Jaundice, Low Blood Pressure, Tuberculosis, Epilepsy/Convulsions, Swolen ankles/Kidney disease, AIDS or HIV Infection, Asthma, Sexually Transmitted disease, Emphysema, S', '38'),
(13, 'August 27,2024 12:31: PM', 'dr james ', 'dr james clinic', 'Yes', 'No', '', 'No', '', 'No', '', 'No', '', 'No', 'No', 'Others: n/a', 'No', 'No', 'No', '', 'Others: ', '73'),
(14, 'August 27,2024 12:36: PM', 'Dr. James', 'January 2023', 'Yes', 'No', '', 'No', '', 'No', '', 'No', '', 'No', 'No', 'Others: none', 'No', 'No', 'No', 'unknown', 'Others: none', '72'),
(15, 'August 28,2024 10:27: AM', '1231', '31321313', 'Yes', 'Yes', '12312', 'Yes', '312312312', 'Yes', '123123213', 'Yes', '12312312312312', 'Yes', 'Yes', 'Local Anesthetic', 'Yes', 'Yes', 'Yes', 'asdasdasd', 'High Blood Pressure', '75'),
(16, 'August 28,2024 15:03: PM', 'Dr. Herrera', 'August 1, 2024', 'Yes', 'No', '', 'No', '', 'No', '', 'No', '', 'No', 'No', 'Others: none', 'No', 'No', 'No', 'unknown', 'Others: none', '72'),
(17, 'September 07,2024 13:20: PM', 'my dentist', 'dr james clinic', 'Yes', 'Yes', 'n/a', 'No', '', 'No', '', 'No', '', 'No', 'No', 'Aspinn', 'No', 'No', 'No', '0+', 'Epilepsy/Convulsions, Others: n/a', '73'),
(18, 'September 08,2024 17:42: PM', 'Dr. James', 'January 27, 2024', 'Yes', 'No', '', 'No', '', 'No', '', 'No', '', 'No', 'No', 'Others: none', 'No', 'No', 'No', 'o', 'Others: none', '77'),
(19, 'September 09,2024 19:30: PM', 'asa', 'sdds', 'Yes', 'No', '', 'No', '', 'No', '', 'No', '', 'No', 'No', '', 'No', 'No', 'No', 'o+', '', '78'),
(20, 'September 10,2024 18:22: PM', 'rein', 'rein dental clinic ', 'No', 'No', '', 'No', '', 'No', '', 'No', '', 'No', 'No', 'Local Anesthetic, Penicilin, Antibiotics, Aspinn, Latex, Sulfa drugs', 'No', 'No', 'No', 'asd', 'Hepatitis/Jaundice', '78');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `recipient_id` varchar(200) NOT NULL,
  `text` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `recipient_id`, `text`, `timestamp`) VALUES
(1, 'user', '', '32131231', '2024-08-10 04:51:47'),
(2, 'admin', '', '1232131', '2024-08-10 04:51:51'),
(3, 'user', '', '312312312', '2024-08-10 04:52:17'),
(4, 'asdasda', '', '12313131', '2024-08-10 05:54:07'),
(5, 'asdasda', '', 'asdasd', '2024-08-10 05:54:32'),
(6, '32', '', 'asd', '2024-08-10 05:56:10'),
(7, 'admin', '', 'asdasda', '2024-08-10 05:56:36'),
(8, '11', '', 'asdasd', '2024-08-10 06:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `process_desc`
--

CREATE TABLE `process_desc` (
  `process_desc_id` int(11) NOT NULL,
  `process_list_id` int(11) NOT NULL,
  `process_desc_inventory` varchar(200) NOT NULL,
  `process_desc_psc` varchar(200) NOT NULL,
  `process_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `process_desc`
--

INSERT INTO `process_desc` (`process_desc_id`, `process_list_id`, `process_desc_inventory`, `process_desc_psc`, `process_status`) VALUES
(7, 3, '7', '2', '0'),
(8, 3, '8', '2', '0');

-- --------------------------------------------------------

--
-- Table structure for table `process_list`
--

CREATE TABLE `process_list` (
  `process_list_id` int(11) NOT NULL,
  `process_list_tags` varchar(200) NOT NULL,
  `process_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `process_list`
--

INSERT INTO `process_list` (`process_list_id`, `process_list_tags`, `process_status`) VALUES
(3, 'First Aid Process', '1'),
(4, 'Physical Test', '1'),
(5, 'Medical Test', '1');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `services_id` int(11) NOT NULL,
  `services_name` varchar(200) NOT NULL,
  `services_cost` varchar(200) NOT NULL,
  `services_tools_id` varchar(200) NOT NULL,
  `services_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`services_id`, `services_name`, `services_cost`, `services_tools_id`, `services_status`) VALUES
(16, 'Tooth extraction', '1500', '', '0'),
(17, 'Tooth Braces', '5000', '', '0'),
(18, 'Pasta ', '1500', '', '0'),
(19, 'Cleaning', '500', '', '0'),
(20, 'Adding Tooth ', '1000', '', '1'),
(21, 'Teeth Whitening', '900', '', '1'),
(22, 'Teeth Adjustment ', '1000', '', '0'),
(23, 'Teeth Whitening', '900', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tooths`
--

CREATE TABLE `tooths` (
  `id` int(11) NOT NULL,
  `appointment_id` varchar(255) DEFAULT NULL,
  `patient_id` varchar(255) DEFAULT NULL,
  `teeth` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `date_created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_account1`
--

CREATE TABLE `user_account1` (
  `u_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `bdate` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account1`
--

INSERT INTO `user_account1` (`u_id`, `username`, `email`, `password`, `fname`, `mname`, `lname`, `position`, `contact`, `bdate`, `gender`, `address`) VALUES
(11, 'Admin', 'ADMIN', '$2y$10$uhq3MsrxdjlXX81F0kheVe.5On..rLx1Vy2JUGpuwiSsDnKU7qjjC', 'VICTOR', 'NATASSA ', 'HERRERA', '', '', '', '', ''),
(69, 'joshuaenore74', 'joshuaenore74@gmail.com', '$2y$10$pGYx5YbvmrHtAyigm1Y5yeYQWE4RGcgdhsh1WAvWi9lfItCfd0O8.', 'joshua ellis', 'dizon', 'enore', '', '09204353341', '2024-08-21', 'Male', 'Binan'),
(70, '2000', 'famousbbb232@gamil.com', '$2y$10$XfWMv.g0xTwCBpJQBasRbOeOU2mB4CWunJV7uJFTYjTsFOwUqNM8e', '00', '', '0731', '082724394412', '09123456789', '2004-06-28', 'Female', 'BULIHAN,SILANG ,CAVITE'),
(71, 'Chichi', 'chiela123456789@gmail.com', '$2y$10$NkC6r3ZJwi6t9RBzU8ADt.gj00IzPQsRxcEl7QCbvpW1xsLbvndBm', 'Chiela Faye', 'Yupa', 'Bustillo', '082724522911', '09100083337', '2003-01-06', 'Female', 'Blk 8A Lot 50 Brgy. N. Virata G.M.A. Cavite'),
(72, 'Mariz', 'marizrabanal16@gmail.com', '$2y$10$IUPS/IzoYa41W8Af/GUnw.HxNgigNrYWVZRuoXNTnXyFJQth8b6le', 'Mara Charisse', 'Manarog', 'Rabanal', '', '9273228948', '2001-12-19', 'Female', 'Bancal'),
(73, 'Paulo', 'otakuzetsuo@gmail.com', '$2y$10$o9erMbyhEVUrB4jb9Tpa8.A5IfURaJgfhkxLCI.nFcCr88i3jIaIy', 'miguel', 'guiraldo', 'paulo', '', '09277640556', '2001-11-07', 'Male', 'blk 12 lot 15 carmona townhomes carmona cavite'),
(74, 'yasmin', 'katejasmineluna@gmail.com', '$2y$10$ziB7mC8X/6To6tBuRH4je.pRStaNYsXAQft4kXu6kZnre9Ijj5Wim', 'yasmin', '', 'luna', '', '0912345678', '2005-10-04', 'Female', 'jhde'),
(75, 'joshuaenore24', 'joshuaenore24@gmail.com', '$2y$10$gajtMV.1wqwAdNgUJ0q4P.8S.Ns7CRmniwG7u1qOjN65JrV3K738a', 'Juan', ' ', 'Delacruz', '', '09204353341', '1997-08-27', 'Male', 'test address'),
(76, '1231231', '12312312@gmail.com', '$2y$10$CdWVj2AsaY3wZo19ymIDnen/GqD6daTIae.NDUkaZo9uGrwMmVBEC', '123123', '123123', '123123', '082824055910', '12312312', '2024-08-27', 'Male', '12312321312131'),
(77, 'peypey', 'rabanalmariz1925@gmail.com', '$2y$10$ahz28xDljfwx/nIjDgInO.SCa9ERzkNLDnSxK9riWo/GPZoHGoX5W', 'Faye', '', 'Bustillo', '', '09123456789', '2003-01-06', 'Female', 'Earth'),
(78, 'cardodalisay1', 'defif88225@esterace.com', '$2y$10$uXnubsqEuZXitGFYv7WsQuLqe5KpqIdIjcf3wdgH9DZgpXeqx9LkS', 'cardo', 'g', 'dalisay', '090924054212', '09954182831', '2000-10-01', 'Male', 'gma'),
(79, 'Jao', 'pjbaguio0@gmail.com', '$2y$10$8jXD8JjUei4jmzYcW6PTNOknfXBDFSlivIsd/5UGTqPprj0xP/rDq', 'João', 'a', 'Souza Silva', '090924004605', '09999999999', '2022-10-04', 'Male', 'Rua Inexistente, 2000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `appointment_desc`
--
ALTER TABLE `appointment_desc`
  ADD PRIMARY KEY (`appointment_desc_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `dental_history`
--
ALTER TABLE `dental_history`
  ADD PRIMARY KEY (`dental_history_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process_desc`
--
ALTER TABLE `process_desc`
  ADD PRIMARY KEY (`process_desc_id`);

--
-- Indexes for table `process_list`
--
ALTER TABLE `process_list`
  ADD PRIMARY KEY (`process_list_id`),
  ADD UNIQUE KEY `process_list_id` (`process_list_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`services_id`);

--
-- Indexes for table `tooths`
--
ALTER TABLE `tooths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user_account1`
--
ALTER TABLE `user_account1`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `appointment_desc`
--
ALTER TABLE `appointment_desc`
  MODIFY `appointment_desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `dental_history`
--
ALTER TABLE `dental_history`
  MODIFY `dental_history_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `med_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `process_desc`
--
ALTER TABLE `process_desc`
  MODIFY `process_desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `process_list`
--
ALTER TABLE `process_list`
  MODIFY `process_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tooths`
--
ALTER TABLE `tooths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_account1`
--
ALTER TABLE `user_account1`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
 