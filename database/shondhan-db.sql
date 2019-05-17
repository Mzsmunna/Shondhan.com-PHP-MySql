-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2017 at 06:33 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shondhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted`
--

CREATE TABLE `accepted` (
  `acptid` int(10) NOT NULL,
  `adid` int(10) NOT NULL,
  `addOwner` varchar(20) NOT NULL,
  `customer` varchar(20) NOT NULL,
  `cmessage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `addstatus`
--

CREATE TABLE `addstatus` (
  `sid` int(10) NOT NULL,
  `adid` int(10) NOT NULL,
  `addOwner` varchar(20) NOT NULL,
  `addView` int(10) NOT NULL,
  `addReport` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(10) NOT NULL,
  `adminName` varchar(20) NOT NULL,
  `aFirstName` varchar(20) NOT NULL,
  `aLastName` varchar(20) NOT NULL,
  `aPassword` varchar(30) NOT NULL,
  `aEmail` varchar(30) NOT NULL,
  `aMobileNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `aFirstName`, `aLastName`, `aPassword`, `aEmail`, `aMobileNo`) VALUES
(1, 'mzs', 'mzs', 'munna', '12345', 'mzs.munna@gmail.com', '01744692979');

-- --------------------------------------------------------

--
-- Table structure for table `advertises`
--

CREATE TABLE `advertises` (
  `aid` int(10) NOT NULL,
  `addOwner` varchar(20) NOT NULL,
  `addOwnerID` int(10) NOT NULL,
  `addFor` varchar(10) NOT NULL,
  `addType` varchar(15) DEFAULT NULL,
  `bed` int(4) NOT NULL,
  `masterBeed` int(4) NOT NULL,
  `belcony` int(4) NOT NULL,
  `attachedDD` varchar(5) DEFAULT NULL,
  `squareFeet` int(5) DEFAULT NULL,
  `price` varchar(15) NOT NULL,
  `contactNo` varchar(15) NOT NULL,
  `floor` varchar(4) DEFAULT NULL,
  `division` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `inDetail` varchar(200) DEFAULT NULL,
  `date` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertises`
--

INSERT INTO `advertises` (`aid`, `addOwner`, `addOwnerID`, `addFor`, `addType`, `bed`, `masterBeed`, `belcony`, `attachedDD`, `squareFeet`, `price`, `contactNo`, `floor`, `division`, `district`, `location`, `inDetail`, `date`) VALUES
(5, 'mzsTest', 1, 'Sale', 'flat', 4, 2, 2, 'yes', 1500, '3000000', '01744-692979', '4th', 'Dhaka', 'Dhaka', 'Uttora', 'updated again', '5.12.17'),
(6, 'mzs', 1, 'Rent', 'building', 5, 2, 2, 'No', 1000, '15000000', '01752678975', '5th', 'Dhaka', 'Dhaka', 'banani', 'nothing to say', '18/12/17'),
(7, 'mzsTest', 1, 'Sale', '', 5, 2, 2, 'No', 1200, '35000', '01752678975', '', 'Dhaka', 'Dhaka', 'banani', 'bla bla bla', '12/12/17'),
(8, 'munnaTest', 2, 'Rent', 'Apartment', 5, 3, 3, 'No', 1500, '3000000tk', '01744692979', '3rd', 'Dhaka', 'dhaka', 'Choiti', 'ala ala mola chala barfi!', '11/12/17'),
(9, 'mzsTest', 1, 'Sale', 'Flat', 5, 2, 2, 'Yes', 1200, '35000tk', '01752678975', '5th', 'Dhaka', 'Dhaka', 'banani', 'bla bla bla', '12/12/17'),
(11, 'mzs', 4, 'Rent', 'Flat', 5, 5, 5, 'yes', 2000, '300 $', '384564356', 'yes', 'dhaka', 'dhaka', 'dg,jszdhdhb', 'hzdhdhgsERghtxf', '12-14-2017'),
(15, 'mzs', 4, 'Rent', 'Apartment', 8, 9, 7, 'yes', 2300, '29000 TK', '32454657', 'yes', 'Barisal', 'dhaka', 'gsrghrr', 'angtdmhyht', '12-14-2017'),
(16, 'mzs', 4, 'Rent', 'Apartment', 3, 3, 3, 'No', 1500, '3242535 TK', '321324435', 'sfsf', 'Khulna', 'dhaka', 'kuril', 'sfdgsdhgdhxd', '12-14-2017'),
(17, 'mzs', 4, 'Rent', 'Building', 5, 4, 3, 'Yes', 1324, '3435000 TK', '01999934383', '42', 'Dhaka', 'dgfhgfjhg', 'gdfhgfjgj', 'gdfhykuyk', '12-14-2017'),
(18, 'mzs', 4, 'Rent', 'Apartment', 6, 6, 8, 'Yes', 2134, '28000 TK', '0142564645', '12', 'Chittagong', 'esdgfjd', 'fsdrhdtdg', 'contact with me', '12-14-2017');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(10) NOT NULL,
  `adid` int(10) NOT NULL,
  `addOwner` varchar(20) NOT NULL,
  `cmnter` int(10) NOT NULL,
  `commentBox` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interested`
--

CREATE TABLE `interested` (
  `iid` int(10) NOT NULL,
  `adid` int(10) NOT NULL,
  `addOwner` varchar(20) NOT NULL,
  `customer` varchar(20) NOT NULL,
  `omessage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobileNo` varchar(15) NOT NULL,
  `accountType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `firstName`, `lastName`, `password`, `email`, `mobileNo`, `accountType`) VALUES
(4, 'mzs', 'mzs', 'munna', '123', 'mzs@gmail.com', '01744692979', 'Male'),
(23, 'mzsmunna', 'mzs', 'munna', '12345', 'mamun@gmail.com', '01744692979', 'Male'),
(30, 'mzsmunn', 'mzs', 'munna', '12345', 'mzsm@gmail.com', '01744692', 'Male'),
(31, 'mamun', 'mzs', 'munna', '12345', 'hdbfvhdgv@svdsgh.com', '38753523475', 'Male'),
(32, 'rajib', 'rajib', 'kumar', '123', 'raj@gmail.com', '0134254', 'Male'),
(33, 'a', 'b', 'c', '123', 'a@dh', '123', 'Male'),
(34, 'raj', 'raj', 'kumar', '123', 'raj@gml.co', '1234567890', 'Male'),
(35, 'rajj', 'rfggg', 'yfyfy', '123', 'hhh@gsfs', '87', 'Male'),
(38, 'mzs22', 'munna', 'munna', '123', 'mzs.munna@gmail.com', '123', 'Male'),
(39, 'mamunuz', 'mzs', 'munna', '12345', 'mamunuz@gmail.com', '1223456', 'Male'),
(40, 'afia', 'tamanna', 'munni', '1234', 'tamu@gmail.com', '01672345746', 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted`
--
ALTER TABLE `accepted`
  ADD PRIMARY KEY (`acptid`);

--
-- Indexes for table `addstatus`
--
ALTER TABLE `addstatus`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `advertises`
--
ALTER TABLE `advertises`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `interested`
--
ALTER TABLE `interested`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted`
--
ALTER TABLE `accepted`
  MODIFY `acptid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addstatus`
--
ALTER TABLE `addstatus`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertises`
--
ALTER TABLE `advertises`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interested`
--
ALTER TABLE `interested`
  MODIFY `iid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
