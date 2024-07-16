-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 07:32 AM
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
-- Database: `prescription`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `unique_id` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`id`, `first_name`, `last_name`, `email`, `contact`, `unique_id`, `image`, `status`, `created_date`) VALUES
(1, 'Admind', 'Userd', 'admin@gmail.comd', '8956856986', 'UIDA56223', 'user/user_image.jpg', 1, '2021-07-14 13:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE `city_master` (
  `City_id` int(11) NOT NULL,
  `State_id` int(11) NOT NULL,
  `District_id` int(11) NOT NULL,
  `City_name` varchar(50) NOT NULL,
  `City_status` tinyint(1) NOT NULL,
  `City_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`City_id`, `State_id`, `District_id`, `City_name`, `City_status`, `City_created_date`) VALUES
(1, 1, 1, 'sdf', 1, '2021-07-14 14:13:21'),
(2, 1, 1, 'rd', 1, '2021-07-15 11:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `company_master`
--

CREATE TABLE `company_master` (
  `Company_id` int(11) NOT NULL,
  `Company_name` varchar(25) NOT NULL,
  `Company_Address` text NOT NULL,
  `Company_Contact` varchar(15) NOT NULL,
  `Company_Status` tinyint(1) NOT NULL,
  `Created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company_master`
--

INSERT INTO `company_master` (`Company_id`, `Company_name`, `Company_Address`, `Company_Contact`, `Company_Status`, `Created_date`) VALUES
(1, 'fgs', 'dsfgs', '8904652353', 1, '2021-07-14 14:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_master`
--

CREATE TABLE `complaint_master` (
  `complaint_id` int(11) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `complaint_title` varchar(100) NOT NULL,
  `complaint_description` text NOT NULL,
  `complaint_status` tinyint(1) NOT NULL,
  `posted_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `complaint_master`
--

INSERT INTO `complaint_master` (`complaint_id`, `user_id`, `complaint_title`, `complaint_description`, `complaint_status`, `posted_on`) VALUES
(1, 'UID322676', 'dgfsdg', 'gds', 1, '2021-07-14 14:23:20'),
(2, 'UID322676', 'fdg', 'dfg', 1, '2021-07-14 14:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `district_master`
--

CREATE TABLE `district_master` (
  `District_id` int(11) NOT NULL,
  `State_id` int(11) NOT NULL,
  `District_name` varchar(50) NOT NULL,
  `D_status` tinyint(1) NOT NULL,
  `DCreated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `district_master`
--

INSERT INTO `district_master` (`District_id`, `State_id`, `District_name`, `D_status`, `DCreated_date`) VALUES
(1, 1, 'sdgsd', 1, '2021-07-14 14:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_master`
--

CREATE TABLE `doctor_master` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `specialization` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `unique_id` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_master`
--

INSERT INTO `doctor_master` (`id`, `first_name`, `last_name`, `specialization`, `email`, `contact`, `unique_id`, `status`, `created_date`, `image`) VALUES
(2, 'yer', 'ery', 'ere', 'suraj@gmail.comd', '8904652353', 'UID309669', 1, '2021-07-14 13:55:43', 'user/doctor_image.jpg'),
(3, 'dsfgsd', 'gsdg', 'sdg', 'suraj@gmail.comd', '8904652353', 'UID720472', 1, '2021-07-14 14:47:33', 'user/doctor_image.jpg'),
(4, 'rgretggg', 'ertw', 'twe', 'suraj@gmail.comd', '8904652353', 'UID875168', 1, '2021-07-14 14:48:39', 'user/doctor_image.jpg'),
(5, 'vvvc', 'vvvc', 'vvv', 'admin@gmail.comdc', '6666666665', 'UID189070', 1, '2021-07-14 14:50:30', 'user/doctor_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login_master`
--

CREATE TABLE `login_master` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(25) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`id`, `unique_id`, `user_type`, `password`, `status`, `created_date`) VALUES
(1, 'UID322676', 'User', 'MAnoj143', 1, '2021-07-14 12:50:44'),
(2, 'UID956223', 'User', 'MAnoj143', 1, '2021-07-14 12:51:59'),
(3, 'UIDA56223', 'Admin', 'MAnoj1433', 1, '2021-07-14 12:51:59'),
(8, 'UID800087', 'Medical', 'PAss813844', 1, '2021-07-14 13:48:03'),
(10, 'UID309669', 'Doctor', 'PAss272975', 1, '2021-07-14 13:55:43'),
(11, 'UID720472', 'Doctor', 'PAss981175', 1, '2021-07-14 14:47:33'),
(12, 'UID875168', 'Doctor', 'PAss458064', 1, '2021-07-14 14:48:39'),
(13, 'UID189070', 'Doctor', 'PAss935255', 1, '2021-07-14 14:50:30'),
(14, 'UID714364', 'Medical', 'PAss388109', 1, '2024-06-19 10:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `medical_master`
--

CREATE TABLE `medical_master` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `unique_id` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `address` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_master`
--

INSERT INTO `medical_master` (`id`, `first_name`, `last_name`, `email`, `contact`, `unique_id`, `status`, `address`, `created_date`, `image`) VALUES
(5, 'erw', 'ewt', 'suraj@gmail.comd', '9787878787', 'UID800087', 1, 'rds', '2021-07-14 13:48:03', 'user/medical_image.jpg'),
(6, 'Rachitha', 'asdfgh', 'rachitha@gmail.com', '8523697415', 'UID714364', 1, 'neermarga', '2024-06-19 10:32:21', 'user/medical_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(10) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `no_of_days` int(25) NOT NULL,
  `timings` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `track_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `medicine_id`, `no_of_days`, `timings`, `date`, `status`, `track_no`) VALUES
(1, 0, 1, '', '2021-07-14 15:42:58', 1, ''),
(2, 1, 1, 'Morning, ', '2021-07-14 16:04:06', 1, '889500'),
(3, 1, 1, 'Morning, Afternoon, ', '2021-07-14 16:04:29', 1, '889500'),
(4, 1, 1, 'Morning, Afternoon, ', '2021-07-14 16:05:22', 1, '889500'),
(5, 1, 1, 'Morning, Afternoon, Night, ', '2021-07-14 16:07:39', 1, '889500'),
(6, 1, 2, 'Morning, ', '2021-07-14 16:12:52', 1, '427441'),
(7, 1, 2, '', '2021-07-14 16:13:09', 1, '468558'),
(8, 1, 2, 'Afternoon, ', '2021-07-14 16:14:40', 1, '468558'),
(9, 1, 2, 'Morning, ', '2021-07-14 16:15:38', 1, '158523'),
(10, 1, 3, 'Afternoon, Night, ', '2021-07-14 16:16:13', 1, '158523'),
(11, 1, 4, 'Afternoon, ', '2021-07-14 16:16:25', 1, '158523'),
(12, 1, 5, 'Morning, Afternoon, Night, ', '2024-06-07 15:25:43', 1, '324014'),
(13, 1, 2, 'Morning, Night, ', '2024-06-07 15:26:00', 1, '324014'),
(14, 1, 5, 'Afternoon, ', '2024-06-07 15:29:08', 1, '638903');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_master`
--

CREATE TABLE `medicine_master` (
  `Medicine_id` int(11) NOT NULL,
  `Company_id` int(11) NOT NULL,
  `Medcine_name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Medicine_status` tinyint(1) NOT NULL,
  `MCreated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `medicine_master`
--

INSERT INTO `medicine_master` (`Medicine_id`, `Company_id`, `Medcine_name`, `Description`, `Medicine_status`, `MCreated_date`) VALUES
(1, 1, 'fsdf', 'sdgsd', 1, '2021-07-14 14:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(10) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `doctor_id` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `price` int(10) DEFAULT NULL,
  `track_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `uid`, `doctor_id`, `date`, `status`, `price`, `track_no`) VALUES
(1, 'UID322676', 'UID189070', '2021-07-14 16:01:01', 1, 34, '138561'),
(2, 'UID322676', 'UID189070', '2021-07-14 16:02:09', 1, 435, '889500'),
(3, 'UID322676', 'UID189070', '2021-07-14 16:07:39', 1, 435, '889500'),
(4, 'UID322676', 'UID189070', '2021-07-14 16:12:52', 1, 21, '427441'),
(5, 'UID322676', 'UID189070', '2021-07-14 16:16:26', 1, 5000, '158523'),
(6, 'UID322676', 'UID309669', '2024-06-07 15:29:08', 0, NULL, '638903');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE `state_master` (
  `State_id` int(11) NOT NULL,
  `State_name` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `SCreated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`State_id`, `State_name`, `Status`, `SCreated_date`) VALUES
(1, 'dgs', 1, '2021-07-14 14:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `unique_id` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  `blood_pressure` varchar(50) DEFAULT NULL,
  `pulse` varchar(50) DEFAULT NULL,
  `blood_group` varchar(50) DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `first_name`, `last_name`, `gender`, `email`, `contact`, `date_of_birth`, `created_date`, `status`, `unique_id`, `image`, `blood_pressure`, `pulse`, `blood_group`, `height`, `weight`, `city_id`, `state_id`, `district_id`) VALUES
(1, 'Surajkff', 'Acharf', 'Female', 'suraj@gmail.comdf', '8904652352', '2003-05-07', '2021-07-14 12:50:43', 1, 'UID322676', 'user/profile.jpg', '2', '2', 'O+', 2, 2, 1, 1, 1),
(2, 'Ajay', 'bt', 'Male', 'ajay@gmail.comd', '8904652353', '2003-05-12', '2021-07-14 12:51:59', 1, 'UID956223', 'user/user_image.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_master`
--
ALTER TABLE `city_master`
  ADD PRIMARY KEY (`City_id`);

--
-- Indexes for table `company_master`
--
ALTER TABLE `company_master`
  ADD PRIMARY KEY (`Company_id`);

--
-- Indexes for table `complaint_master`
--
ALTER TABLE `complaint_master`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `district_master`
--
ALTER TABLE `district_master`
  ADD PRIMARY KEY (`District_id`);

--
-- Indexes for table `doctor_master`
--
ALTER TABLE `doctor_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_master`
--
ALTER TABLE `login_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_master`
--
ALTER TABLE `medical_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_master`
--
ALTER TABLE `medicine_master`
  ADD PRIMARY KEY (`Medicine_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`State_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city_master`
--
ALTER TABLE `city_master`
  MODIFY `City_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_master`
--
ALTER TABLE `company_master`
  MODIFY `Company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint_master`
--
ALTER TABLE `complaint_master`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district_master`
--
ALTER TABLE `district_master`
  MODIFY `District_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_master`
--
ALTER TABLE `doctor_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_master`
--
ALTER TABLE `login_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `medical_master`
--
ALTER TABLE `medical_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `medicine_master`
--
ALTER TABLE `medicine_master`
  MODIFY `Medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `State_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
