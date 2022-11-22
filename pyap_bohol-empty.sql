-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 12:56 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pyap_bohol`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(7) NOT NULL,
  `photo` varchar(40) NOT NULL,
  `name` varchar(60) NOT NULL,
  `position` varchar(30) NOT NULL,
  `role` varchar(13) NOT NULL,
  `municipal` varchar(25) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `pword` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `photo`, `name`, `position`, `role`, `municipal`, `uname`, `email`, `phone`, `pword`) VALUES
(1, 'default.png', 'PYAP-Bohol Admin', 'Administrator', 'Admin', 'Tagbilaran', 'Adm123@PyapBohol', 'opswdcdd@gmail.com', '09203949434', '$2y$12$BkHI/1xYPayhKmRfrZEtoONDKXSOjWcgS148pUoWP0aJWJyV7NUKO');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `aname` text NOT NULL,
  `descr` text NOT NULL,
  `afrom` varchar(18) NOT NULL,
  `ato` varchar(18) NOT NULL,
  `municipal` varchar(25) NOT NULL,
  `budget` varchar(10) NOT NULL,
  `pic` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `descr` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attainment`
--

CREATE TABLE `attainment` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `educStat` varchar(9) NOT NULL,
  `elemLevel` int(1) NOT NULL,
  `elemGrad` int(1) NOT NULL,
  `hsLevel` int(1) NOT NULL,
  `hsGrad` int(1) NOT NULL,
  `colLevel` int(1) NOT NULL,
  `colGrad` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `brgy_id` int(4) NOT NULL,
  `brgy` varchar(30) NOT NULL,
  `mun_id` int(2) NOT NULL,
  `wPyap` int(1) NOT NULL,
  `started` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(1) NOT NULL,
  `telNo` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `telNo`, `email`) VALUES
(1, '501-8495', 'opswdcdd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `educational_background`
--

CREATE TABLE `educational_background` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `eName` varchar(50) NOT NULL,
  `eAddr` varchar(50) NOT NULL,
  `eLevel` varchar(7) NOT NULL,
  `eStat` varchar(13) NOT NULL,
  `eFrom` varchar(14) NOT NULL,
  `eTo` varchar(14) NOT NULL,
  `sName` varchar(50) NOT NULL,
  `sAddr` varchar(50) NOT NULL,
  `sLevel` varchar(8) NOT NULL,
  `sStat` varchar(13) NOT NULL,
  `sFrom` varchar(14) NOT NULL,
  `sTo` varchar(14) NOT NULL,
  `cName` varchar(50) NOT NULL,
  `cAddr` varchar(50) NOT NULL,
  `cLevel` varchar(8) NOT NULL,
  `cStat` varchar(13) NOT NULL,
  `cDegree` varchar(60) NOT NULL,
  `cFrom` varchar(14) NOT NULL,
  `cTo` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interest_hobbies`
--

CREATE TABLE `interest_hobbies` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `internet` int(1) NOT NULL,
  `watch` int(1) NOT NULL,
  `sports` int(1) NOT NULL,
  `music` int(1) NOT NULL,
  `arts` int(1) NOT NULL,
  `singing` int(1) NOT NULL,
  `dancing` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` varchar(13) NOT NULL,
  `municipal` varchar(25) NOT NULL,
  `browser` varchar(20) NOT NULL,
  `ip_addr` varchar(20) NOT NULL,
  `os` varchar(20) NOT NULL,
  `logged_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mid` int(11) NOT NULL,
  `photo` varchar(40) NOT NULL,
  `brgy_id` int(4) NOT NULL,
  `mun_id` int(2) NOT NULL,
  `fName` varchar(30) NOT NULL,
  `mName` varchar(30) NOT NULL,
  `lName` varchar(30) NOT NULL,
  `ext` varchar(3) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `dBirth` varchar(18) NOT NULL,
  `age` varchar(3) NOT NULL,
  `civilStat` varchar(11) NOT NULL,
  `brgy` varchar(30) NOT NULL,
  `mun` varchar(25) NOT NULL,
  `prov` varchar(5) NOT NULL,
  `region` varchar(3) NOT NULL,
  `bBrgy` varchar(30) NOT NULL,
  `bMun` varchar(30) NOT NULL,
  `bProv` varchar(30) NOT NULL,
  `bRegion` varchar(4) NOT NULL,
  `religion` varchar(40) NOT NULL,
  `celNo` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fathName` varchar(60) NOT NULL,
  `fathAge` varchar(3) NOT NULL,
  `fathOccup` varchar(30) NOT NULL,
  `fathIncome` varchar(8) NOT NULL,
  `mothName` varchar(60) NOT NULL,
  `mothAge` varchar(3) NOT NULL,
  `mothOccup` varchar(30) NOT NULL,
  `mothIncome` varchar(8) NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `municipals`
--

CREATE TABLE `municipals` (
  `mun_id` int(2) NOT NULL,
  `municipal` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `municipals`
--

INSERT INTO `municipals` (`mun_id`, `municipal`) VALUES
(1, 'Alburquerque'),
(2, 'Alicia'),
(3, 'Anda'),
(4, 'Antequera'),
(5, 'Baclayon'),
(6, 'Balilihan'),
(7, 'Batuan'),
(8, 'Bien Unido'),
(9, 'Bilar'),
(10, 'Buenavista'),
(11, 'Calape'),
(12, 'Candijay'),
(13, 'Carmen'),
(14, 'Catigbian'),
(15, 'Clarin'),
(16, 'Corella'),
(17, 'Cortes'),
(18, 'Dagohoy'),
(19, 'Danao'),
(20, 'Dauis'),
(21, 'Dimiao'),
(22, 'Duero'),
(23, 'Garcia Hernandez'),
(24, 'Getafe'),
(25, 'Guindulman'),
(26, 'Inabanga'),
(27, 'Jagna'),
(28, 'Lila'),
(29, 'Loay'),
(30, 'Loboc'),
(31, 'Loon'),
(32, 'Mabini'),
(33, 'Maribojoc'),
(34, 'Panglao'),
(35, 'Pilar'),
(36, 'Pres. Carlos P. Garcia'),
(37, 'Sagbayan'),
(38, 'San Isidro'),
(39, 'San Miguel'),
(40, 'Sevilla'),
(41, 'Sierra Bullones'),
(42, 'Sikatuna'),
(43, 'Tagbilaran'),
(44, 'Talibon'),
(45, 'Trinidad'),
(46, 'Tubigon'),
(47, 'Ubay'),
(48, 'Valencia');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `nameOrg` varchar(60) NOT NULL,
  `posHeld` varchar(40) NOT NULL,
  `orgYear` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reasons`
--

CREATE TABLE `reasons` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `level` varchar(10) NOT NULL,
  `finProb` int(1) NOT NULL,
  `nInterest` int(1) NOT NULL,
  `famProb` int(1) NOT NULL,
  `ePreg` int(1) NOT NULL,
  `hProb` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siblings`
--

CREATE TABLE `siblings` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `sibName` varchar(60) NOT NULL,
  `sibSex` varchar(6) NOT NULL,
  `sibAge` varchar(3) NOT NULL,
  `sibOccup` varchar(30) NOT NULL,
  `sibGrYr` varchar(30) NOT NULL,
  `sibIOSY` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `signatories`
--

CREATE TABLE `signatories` (
  `id` int(1) NOT NULL,
  `sigNum` varchar(1) NOT NULL,
  `name` varchar(60) NOT NULL,
  `position` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signatories`
--

INSERT INTO `signatories` (`id`, `sigNum`, `name`, `position`) VALUES
(1, '1', 'Carmelita M. Tecson', 'OPSWD Head'),
(2, '2', 'Mayor Sample', 'Tagbilaran City Mayor');

-- --------------------------------------------------------

--
-- Table structure for table `special_skills`
--

CREATE TABLE `special_skills` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `none` int(1) NOT NULL,
  `agri` int(1) NOT NULL,
  `tech` int(1) NOT NULL,
  `construct` int(1) NOT NULL,
  `singing` int(1) NOT NULL,
  `dancing` int(1) NOT NULL,
  `carpentry` int(1) NOT NULL,
  `computer` int(1) NOT NULL,
  `drawing` int(1) NOT NULL,
  `dress` int(1) NOT NULL,
  `sports` int(1) NOT NULL,
  `arts` int(1) NOT NULL,
  `music` int(1) NOT NULL,
  `business` int(1) NOT NULL,
  `swimming` int(1) NOT NULL,
  `writing` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `workDate` varchar(14) NOT NULL,
  `jobTitle` varchar(40) NOT NULL,
  `monIncome` int(7) NOT NULL,
  `reLeave` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attainment`
--
ALTER TABLE `attainment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`brgy_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_background`
--
ALTER TABLE `educational_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interest_hobbies`
--
ALTER TABLE `interest_hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `municipals`
--
ALTER TABLE `municipals`
  ADD PRIMARY KEY (`mun_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siblings`
--
ALTER TABLE `siblings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signatories`
--
ALTER TABLE `signatories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_skills`
--
ALTER TABLE `special_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attainment`
--
ALTER TABLE `attainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `brgy_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interest_hobbies`
--
ALTER TABLE `interest_hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `municipals`
--
ALTER TABLE `municipals`
  MODIFY `mun_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siblings`
--
ALTER TABLE `siblings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signatories`
--
ALTER TABLE `signatories`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `special_skills`
--
ALTER TABLE `special_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
