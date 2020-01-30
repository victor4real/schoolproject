-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 06:51 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `court`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `case_no` varchar(10) NOT NULL,
  `case_title` varchar(200) NOT NULL,
  `case_description` longtext NOT NULL,
  `reg_date` date NOT NULL,
  `reporter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `case_no`, `case_title`, `case_description`, `reg_date`, `reporter`) VALUES
(1, 'FHC/BN/840', 'Crime committed against a 10 years old girl at a building near river benue', ' A 10 years old girl have been raped by a 40 years old man at an uncompleted building near river benue on 9th september 2018, the defendant however have pleaded not guilty of the charges placed against him', '2018-09-07', ''),
(2, 'FHC/BN/762', 'Crime committed against a 10 years old girl at a building near river benue', '  A 10 years old girl have been raped by a 40 years old man at an uncompleted building near river benue on 9th september 2018, the defendant however have pleaded not guilty of the charges placed against him', '2018-09-07', 'Umar Muhammed'),
(3, 'FHC/BN/133', 'another case title', ' another case title case description', '2019-08-31', 'Innocent Innex');

-- --------------------------------------------------------

--
-- Table structure for table `case_files`
--

CREATE TABLE `case_files` (
  `id` int(11) NOT NULL,
  `case_no` varchar(10) NOT NULL,
  `img` longblob NOT NULL,
  `description` longtext NOT NULL,
  `reg_date` date NOT NULL,
  `reporter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_files`
--

INSERT INTO `case_files` (`id`, `case_no`, `img`, `description`, `reg_date`, `reporter`) VALUES
(3, 'FHC/BN/762', 0x626162795f6d656368616e69632e2e6a7067, ' Picture of the defendant committing the crime near a car at the crime scene', '2018-09-07', 'Umar Muhammed');

-- --------------------------------------------------------

--
-- Table structure for table `proceeding`
--

CREATE TABLE `proceeding` (
  `id` int(11) NOT NULL,
  `case_no` varchar(10) NOT NULL,
  `proceeding_report` longtext NOT NULL,
  `reporter` varchar(100) NOT NULL,
  `pro_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proceeding`
--

INSERT INTO `proceeding` (`id`, `case_no`, `proceeding_report`, `reporter`, `pro_date`) VALUES
(2, 'FHC/BN/762', ' On 7th of September, the defendant who pleaded Not guilty was arraign before the court to give the reason for not being guilty, the evidence is not enough to grant him bail and the case is adjourn till the ending of September for proper investigation to be conducted     ', 'Umar Muhammed', '2018-09-07'),
(3, '', ' On 7th of September, the defendant who pleaded not guilty was arraign before the court to give the reason for not being guilty, the evidence is not enough to grant him bail and the case is adjourn till the ending of September for proper investigation to be conducted ', '', '2018-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `State_of_origin` varchar(20) NOT NULL,
  `local_govt` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `passport` longblob NOT NULL,
  `account_type` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `State_of_origin`, `local_govt`, `phone`, `username`, `password`, `gender`, `passport`, `account_type`) VALUES
(6, 'Innocent', 'Innex', 'No. 1 Sabon Gari Mangu', 'Plateau', 'Jos', '2347064314883', 'admin', 'admin', 'Male', 0x70617373706f72742e706e67, 'admin'),
(7, 'user1', 'user', 'user', 'Markudi', 'Northbank', '342555', 'user1', 'user', 'Female', 0x4d795152436f64652e706e67, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_files`
--
ALTER TABLE `case_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proceeding`
--
ALTER TABLE `proceeding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `case_files`
--
ALTER TABLE `case_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proceeding`
--
ALTER TABLE `proceeding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
