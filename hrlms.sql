-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 07, 2014 at 05:05 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrlms`
--
CREATE DATABASE IF NOT EXISTS `hrlms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hrlms`;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ename` varchar(255) DEFAULT NULL,
  `desig` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `doa` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `ph1` varchar(255) DEFAULT NULL,
  `ph2` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `picture_id` varchar(255) DEFAULT NULL,
  `allowed_leaves` int(255) NOT NULL DEFAULT '30',
  `leaves_left` int(5) NOT NULL DEFAULT '30',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `ename`, `desig`, `dept`, `doa`, `dob`, `ph1`, `ph2`, `email`, `address`, `picture_id`, `allowed_leaves`, `leaves_left`) VALUES
(1, 'Syed Mahmood ul Hassan', 'Manager Finance', 'Accounts Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(2, 'Arquam Faruqui', 'Asst. Manager Finance ', 'Accounts Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(3, 'Syed Adnan Hussain', 'Accountant', 'Accounts Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(4, 'Rashid Hussain', 'Accounts Assistant', 'Accounts Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(5, 'Syed Baseer Haider Kazmi', 'Accounts Assistant', 'Accounts Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(6, 'Muhammad Israr', 'Manager Sales & Marketing', 'Sales & Marketing Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(7, 'Khalil Ahmed', 'Business Develop. Manager', 'Sales & Marketing Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(8, 'Sharmin Javed', 'Business Develop. Manager', 'Sales & Marketing Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(9, 'Muhammad Saqib', 'Manager Operations Exports', 'Sea Export Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(10, 'M. Shoaib Siddiqui', 'Asst. Manager Operations', 'Sea Export Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(11, 'M.Johar Hasnain', 'Asst. Manager Operations', 'Sea Export Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(12, 'Tahira Aman', 'Incharge Documentation', 'Sea Export Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(13, 'Atif Ahmed', 'Asst. Manager Operations', 'Sea Export Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(14, 'Muhammad Farhan', 'Supply Chain Coordinator', 'Sea Export Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(15, 'M. Fahad Khan', 'Supply Chain Coordinator', 'Sea Export Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(16, 'Osama Hussain', 'Supply Chain Coordinator', 'Sea Export Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(17, 'Tahir Qasmi', 'Asst. Supply Chain Coordinator', 'Sea Export Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(18, 'Naureen Irshad', 'Asst. Documentations', 'Sea Export Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(19, 'Paras Bhatti', 'Asst. Supply Chain Coordinator', 'Sea Export Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(20, 'Mohsin Mahmood', 'Trainee', 'Sea Export Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(21, 'Jazib Javed', 'Trainee', 'Sea Export Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(22, 'Faaiz Shakeel', 'Trainee', 'Sea Export Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(23, 'Jamal Ahmed Hashmi', 'Asst Manager Operation', 'Air Freight Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(24, 'Yousuf Siddiq', 'Supply Chain Coordinator', 'Air Freight Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(25, 'Shabana', 'Supply Chain Coordinator', 'Air Freight Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(26, 'Asim Hussain', 'Asst. Supply Chain Coordinator', 'Air Freight Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(27, 'Syed Athar Hussain', 'Manager Operations Imports', 'Imports Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(28, 'Kashif Uddin Khan', 'Supply Chain Coord. Imports', 'Imports Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(29, 'S. Hussain Abbas', 'Supply Chain Coord. Imports', 'Imports Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(30, 'Nadeem Ahmed Elahi', 'Import Sales Officer', 'Imports Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(31, 'Robina Nazir', 'Asst. Import', 'Imports Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(32, 'M. Faisal Aziz', 'Manager HR', 'HR & Admin. Dept.', '06/06/2014', '06/16/2014', '', '', '', '', NULL, 30, 30),
(33, 'M. Tahir Khan', 'Admin officer', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(34, 'Rashed Zaka ul Haq', 'Incharge I.T', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(35, 'M. Adeel Shafiq', 'I.T Assistant', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(36, 'Faiza Mustafa', 'Tel Operator / Receptionist', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(37, 'Marina Rashid', 'Secretary', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(38, 'Muhammad Ali', 'Outdoor Rider', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(39, 'Sohail Khan', 'Outdoor Rider', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(40, 'Syed Sibtul Hassan', 'Outdoor Rider', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(41, 'Imran Ali', 'Outdoor Rider', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(42, 'Aurangzeb', 'Outdoor Rider', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(43, 'Sajid Hussain', 'Security Guard', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(44, 'Nasar Ullah', 'Peon', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(45, 'Maula Buksh', 'Peon', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(46, 'Yasir Hussain', 'Peon', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(47, 'Rohit', 'Cleaner', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(48, 'Karan', 'Cleaner', 'HR & Admin. Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(49, 'Zahid Ameer', 'Airport Operations Imports', 'ACS. Airport Office', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(50, 'Imran Amjadi', 'SCM Coordinator Airport', 'ACS. Airport Office', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(51, 'Muhammad Ishaque', 'Asst SCM Coord. Airport', 'ACS. Airport Office', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(52, 'Fida Muhammad', 'Loader', 'ACS. Airport Office', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(53, 'Manzoor Ahmed', 'Loader', 'ACS. Airport Office', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(54, 'Ansar Khan', 'Loader', 'ACS. Airport Office', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(55, 'Shahzad', 'Loader', 'ACS. Airport Office', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(56, 'Ramzan', 'Loader', 'ACS. Airport Office', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(57, 'Nadeem Hanif', 'Asst Manager', 'ACS. Warehouse - Port Qasim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(58, 'Ibad uddin Taimuri', 'I.T Supervisor', 'ACS. Warehouse - Port Qasim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(59, 'Syed Mujahid Raza', 'Asst. Warehouse', 'ACS. Warehouse - Port Qasim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(60, 'Mazhar Hussain', 'Asst. Warehouse', 'ACS. Warehouse - Port Qasim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(61, 'Javed Iqbal', 'Warehouse Telly Incharge', 'ACS. Warehouse - Port Qasim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(62, 'Hashim Rizvi', 'Telly man', 'ACS. Warehouse - Port Qasim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(63, 'Talib Haider', 'Port Operations', 'ACS. Warehouse - Port Qasim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(64, 'Humayun Qayum', 'Warehouse Caretaker', 'ACS. Warehouse - Port Qasim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(65, 'Sultan Ahmed', 'Warehouse Cargo Loader', 'ACS. Warehouse - Port Qasim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(66, 'M. Ejaz', 'Warehouse Cargo Loader', 'ACS. Warehouse - Port Qasim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(67, 'Bashir', 'Warehouse Cargo Loader', 'ACS. Warehouse - Port Qasim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(68, 'Sajan Khan', 'Watchman', 'ACS. Warehouse - Port Qasim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30),
(69, 'Jawaid Ali', 'Cleaner', 'ACS. Warehouse - Port Qasim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE IF NOT EXISTS `leaves` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL DEFAULT '0',
  `to` varchar(255) NOT NULL DEFAULT '0',
  `reason` varchar(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `weight` float NOT NULL,
  `days` int(11) NOT NULL DEFAULT '1',
  `tot_leaves` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(255) NOT NULL,
  `usr_pass` varchar(255) NOT NULL,
  `is_admin` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `usr_name`, `usr_pass`, `is_admin`) VALUES
(1, 'usman', 'durrani', 'yes'),
(2, 'admin', 'admin', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pic_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
