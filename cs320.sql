-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 04:16 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs320`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccounts`
--

CREATE TABLE `tblaccounts` (
  `userID` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccounts`
--

INSERT INTO `tblaccounts` (`userID`, `username`, `password`, `name`, `status`, `usertype`) VALUES
('admin', 'admin', 'admin', 'cj palino', 'PAID', 'ADMIN'),
('AU-0616', 'JVERZOSA', 'verzosa0616', 'Jennylyn Verzosa', 'UNPAID', 'STUDENT'),
('AU-16-10242', 'palino', '123123', 'cjpalino', 'PAID', 'ADMIN'),
('AU-2015-0123', 'JRTORRES', 'torres0123', 'Jay-R Torres', 'PAID', 'PROFESSOR'),
('AU-2020-0614', 'JPTAMPOS', 'tampos0614', 'John Paolo Tampos', 'PAID', 'STUDENT'),
('AU-2020-0615', 'JPLASALA', 'lasala0615', 'John Paul Lasala', 'UNPAID', 'STUDENT'),
('professor', 'professor', '123123', 'palino', 'PAID', 'PROFESSOR'),
('student', 'student', '123123', 'student', 'PAID', 'STUDENT');

-- --------------------------------------------------------

--
-- Table structure for table `tblgrades`
--

CREATE TABLE `tblgrades` (
  `GradeID` varchar(10) NOT NULL,
  `StudNum` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `SubjCode` varchar(20) NOT NULL,
  `SubjName` varchar(100) NOT NULL,
  `Units` varchar(10) NOT NULL,
  `Prelim` varchar(10) NOT NULL,
  `Midterm` varchar(10) NOT NULL,
  `SemiFinal` varchar(10) NOT NULL,
  `Final` varchar(10) NOT NULL,
  `SY` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgrades`
--

INSERT INTO `tblgrades` (`GradeID`, `StudNum`, `Name`, `SubjCode`, `SubjName`, `Units`, `Prelim`, `Midterm`, `SemiFinal`, `Final`, `SY`) VALUES
('01', '19-01490', 'John Paolo Tampos', 'ITC127LEC', 'Advanced Database Systems (Lab)', '1', '', '', '', '', '2021-2022'),
('02', '19-01490', 'John Paolo Tampos', 'ITC127LAB', 'Advanced Database Systems (Lec)', '2', '', '', '', '', '2021-2022'),
('123', '16-10242', 'cjpalino', 'ITC127LAB', 'Advanced Database Systems (Lec)', '2', '', '', '', '', '2023-2024'),
('4', '16-10242', 'student', 'ITC127LAB', 'Advanced Database Systems (Lec)', '2', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `tblgrades`
--
ALTER TABLE `tblgrades`
  ADD PRIMARY KEY (`GradeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
