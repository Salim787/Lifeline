-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2017 at 03:20 PM
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
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospital_database`
--

CREATE TABLE `hospital_database` (
  `hd_id` int(11) NOT NULL,
  `hd_bloodtype` varchar(10) NOT NULL,
  `hd_bloodunits` int(11) NOT NULL DEFAULT '0',
  `hd_expiry` date NOT NULL,
  `h_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_database`
--

INSERT INTO `hospital_database` (`hd_id`, `hd_bloodtype`, `hd_bloodunits`, `hd_expiry`, `h_id`) VALUES
(2, 'A+', 5, '2017-09-20', 11),
(3, 'A-', 3, '2017-12-31', 11),
(4, 'B+', 1, '2017-12-31', 11),
(5, 'B-', 1, '2017-12-31', 11),
(6, 'AB+', 0, '2017-12-31', 11),
(7, 'AB-', 0, '2017-12-31', 11),
(8, 'O+', 1, '2017-12-31', 11),
(9, 'O-', 0, '2017-12-31', 11),
(10, 'A+', 2, '2017-12-31', 3),
(11, 'A-', 0, '2017-12-31', 3),
(12, 'B+', 0, '2017-12-31', 3),
(13, 'B-', 0, '2017-12-31', 3),
(14, 'AB+', 0, '2017-12-31', 3),
(15, 'AB-', 0, '2017-12-31', 3),
(16, 'O+', 0, '2017-12-31', 3),
(17, 'O-', 0, '2017-12-31', 3),
(18, 'A+', 3, '2017-12-31', 17),
(19, 'A-', 0, '2017-12-31', 17),
(20, 'B+', 0, '2017-12-31', 17),
(21, 'B-', 1, '2017-10-01', 17),
(22, 'AB+', 0, '2017-12-31', 17),
(23, 'AB-', 0, '2017-12-31', 17),
(24, 'O+', 0, '2017-12-31', 17),
(25, 'O-', 0, '2017-12-31', 17),
(26, 'A+', 1, '2017-12-31', 18),
(27, 'A-', 0, '2017-12-31', 18),
(28, 'B+', 0, '2017-12-31', 18),
(29, 'B-', 0, '2017-12-31', 18),
(30, 'AB+', 0, '2017-12-31', 18),
(31, 'AB-', 0, '2017-12-31', 18),
(32, 'O+', 0, '2017-12-31', 18),
(33, 'O-', 0, '2017-12-31', 18),
(34, 'A+', 1, '2017-12-31', 19),
(35, 'A-', 0, '2017-12-31', 19),
(36, 'B+', 0, '2017-12-31', 19),
(37, 'B-', 0, '2017-12-31', 19),
(38, 'AB+', 0, '2017-12-31', 19),
(39, 'AB-', 0, '2017-12-31', 19),
(40, 'O+', 0, '2017-12-31', 19),
(41, 'O-', 0, '2017-12-31', 19),
(42, 'A+', 1, '2017-12-31', 20),
(43, 'A-', 0, '2017-12-31', 20),
(44, 'B+', 0, '2017-12-31', 20),
(45, 'B-', 0, '2017-12-31', 20),
(46, 'AB+', 0, '2017-12-31', 20),
(47, 'AB-', 0, '2017-12-31', 20),
(48, 'O+', 0, '2017-12-31', 20),
(49, 'O-', 0, '2017-12-31', 20),
(50, 'A+', 1, '2017-12-31', 21),
(51, 'A-', 0, '2017-12-31', 21),
(52, 'B+', 0, '2017-12-31', 21),
(53, 'B-', 0, '2017-12-31', 21),
(54, 'AB+', 0, '2017-12-31', 21),
(55, 'AB-', 0, '2017-12-31', 21),
(56, 'O+', 0, '2017-12-31', 21),
(57, 'O-', 0, '2017-12-31', 21),
(58, 'A+', 1, '2017-12-31', 22),
(59, 'A-', 0, '2017-12-31', 22),
(60, 'B+', 0, '2017-12-31', 22),
(61, 'B-', 0, '2017-12-31', 22),
(62, 'AB+', 0, '2017-12-31', 22),
(63, 'AB-', 0, '2017-12-31', 22),
(64, 'O+', 0, '2017-12-31', 22),
(65, 'O-', 0, '2017-12-31', 22),
(66, 'A+', 1, '2017-12-31', 23),
(67, 'A-', 0, '2017-12-31', 23),
(68, 'B+', 0, '2017-12-31', 23),
(69, 'B-', 0, '2017-12-31', 23),
(70, 'AB+', 0, '2017-12-31', 23),
(71, 'AB-', 0, '2017-12-31', 23),
(72, 'O+', 0, '2017-12-31', 23),
(73, 'O-', 0, '2017-12-31', 23);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_record`
--

CREATE TABLE `hospital_record` (
  `hr_id` int(11) NOT NULL,
  `hr_uid` int(15) NOT NULL,
  `hr_bloodtype` varchar(5) NOT NULL,
  `hr_dateadded` date NOT NULL,
  `hr_expiry` date NOT NULL DEFAULT '2020-12-01',
  `h_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_record`
--

INSERT INTO `hospital_record` (`hr_id`, `hr_uid`, `hr_bloodtype`, `hr_dateadded`, `hr_expiry`, `h_id`) VALUES
(1, 0, 'A+', '0000-00-00', '2020-12-01', 2),
(2, 0, 'O+', '0000-00-00', '2017-08-13', 3),
(3, 0, 'B+', '0000-00-00', '2017-08-15', 3),
(4, 0, 'B-', '0000-00-00', '2017-08-10', 3),
(5, 0, 'A-', '0000-00-00', '2017-08-10', 3),
(6, 0, 'O-', '0000-00-00', '2017-08-09', 3),
(7, 0, 'A+', '0000-00-00', '2017-08-07', 3),
(8, 0, 'A+', '0000-00-00', '2017-08-07', 0),
(9, 0, 'A+', '0000-00-00', '2017-12-12', 11),
(10, 0, 'A-', '0000-00-00', '2017-12-12', 11),
(11, 0, 'A-', '0000-00-00', '2017-12-12', 11),
(12, 0, 'A-', '0000-00-00', '2017-12-12', 11),
(13, 0, 'A-', '0000-00-00', '2017-12-12', 11),
(14, 0, 'A-', '0000-00-00', '2017-12-12', 11),
(15, 0, 'A-', '0000-00-00', '2017-12-12', 11),
(16, 0, 'A+', '0000-00-00', '2017-09-30', 11),
(17, 0, 'A+', '0000-00-00', '2017-09-30', 11),
(18, 0, 'A+', '0000-00-00', '2017-09-30', 11),
(19, 0, 'A+', '0000-00-00', '2017-09-30', 11),
(20, 0, 'A+', '0000-00-00', '2017-09-30', 11),
(21, 0, 'A-', '2017-08-19', '2017-09-30', 11),
(22, 0, 'A+', '2017-08-19', '2017-09-30', 11),
(23, 0, 'A+', '2017-08-19', '2017-09-30', 17),
(24, 0, 'A+', '2017-08-19', '2017-09-30', 17),
(25, 0, 'A+', '2017-08-20', '2017-10-01', 11),
(26, 0, 'B-', '2017-08-20', '2017-10-01', 11),
(27, 21564654, 'B+', '2017-08-20', '2017-10-01', 11),
(28, 5151, 'O+', '2017-08-20', '2017-10-01', 11),
(29, 4544, 'A+', '2017-08-20', '2017-09-20', 11),
(30, 4544, 'A+', '2017-08-20', '2017-09-20', 11),
(31, 16545132, 'B-', '2017-08-20', '2017-10-01', 17);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(10) NOT NULL,
  `hospital` varchar(50) NOT NULL,
  `reg_no` int(15) NOT NULL,
  `city` varchar(20) NOT NULL DEFAULT 'Mumbai',
  `password` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `user_name`, `email`, `mobile`, `hospital`, `reg_no`, `city`, `password`, `address`, `latitude`, `longitude`) VALUES
(3, 'bhumit', 'bhumit97ad@gmail.com', 966409277, 'Global', 0, 'Mumbai', '12345678', '35, Dr. E Borges Road, Opposite Shirodkar High school, Hospital Avenue, Parel, Mumbai, Maharashtra 400012', 18.9992, 72.8405),
(11, 'Salim', 'mapkarsalim@gmail.com', 2147483647, 'Kalsekar', 0, 'Mumbai', '12345', ' Dawle Village, Kausa Mumbra, Opposite Kalsekar Degree College, Near Bharat Gear, Thane, Maharashtra 400612', 19.1584, 73.0294),
(17, 'nair', 'nair@gmail.com', 22, 'B.Y.L Nair Hospital', 0, 'Mumbai', '12345', '43-A/43B, Dr Anandrao Nair Marg, RTO Colony, Mumbai-400008', 18.9724, 72.8215),
(18, 'saifee@gmail.com', 'saifee@gmail.com', 22, 'Saifee hospital', 0, 'Mumbai', '12345', '15/17, Maharshi Karve Rd, Opera House, Girgaon, Mumbai, Maharashtra 400004, India', 18.9525, 72.8182),
(19, 'kohinoor@gmail.com', 'kohinoor@gmail.com', 22, 'Kohinoor hospital', 0, 'Mumbai', '12345', 'Kohinoor City, Kirol Road, Off. LBS Road, Kurla West, Mumbai, Maharashtra 400070, India', 19.0807, 72.8855),
(20, 'fortis@gmail.com', 'fortis@gmail.com', 22, 'Fortis Vashi', 0, 'Mumbai', '12345', 'Mini Sea Shore Road, Sector 10, Vashi, Navi Mumbai, Maharashtra 400703, India', 19.0835, 72.9958),
(21, 'jupiter@gmail.com', 'jupiter@gmail.com', 22, 'Jupiter Hospital', 0, 'Mumbai', '12345', 'Eastern Express Highway, On Service Road, Next To Jupiter Hospital, Thane West, Thane, Maharashtra 400601, India', 19.2087, 72.9713),
(22, 'mgmpanvel@gmail.com', 'mgmpanvel@gmail.com', 22, 'MGM Hospital', 0, 'Mumbai', '12345', 'Plot No. 49, Sector 20, Kamothe, Panvel, Navi Mumbai, Maharashtra 410209, India', 19.0167, 73.0973),
(23, 'kmmh@gmail.com', 'kmmh@gmail.com', 251, 'Kalyan Metro Multispeciality Hospital', 0, 'Mumbai', '12345', 'Anant Sudha Bhavan, Gopal Chowk, Chakki Naka, Kalyan East, Mumbai, Maharashtra 421306, India', 19.2245, 73.126);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospital_database`
--
ALTER TABLE `hospital_database`
  ADD PRIMARY KEY (`hd_id`);

--
-- Indexes for table `hospital_record`
--
ALTER TABLE `hospital_record`
  ADD PRIMARY KEY (`hr_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospital_database`
--
ALTER TABLE `hospital_database`
  MODIFY `hd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `hospital_record`
--
ALTER TABLE `hospital_record`
  MODIFY `hr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
