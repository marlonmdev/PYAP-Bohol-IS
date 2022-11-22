-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2018 at 08:33 AM
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
  `uname` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `pword` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `photo`, `name`, `position`, `role`, `municipal`, `uname`, `email`, `phone`, `pword`) VALUES
(1, 'default.png', 'PYAP-Bohol Admin', 'IT Division In Charge', 'Administrator', 'Tagbilaran', 'PYAPAdminBohol', 'opswdcdd@gmail.com', '09123120310', '$2y$12$xrNec8p8eqEBWrt.sAFhP.xYwcax3V.k64vFUnakX9PIrL.Wb8zoS'),
(2, 'default.png', 'Bilar in Charge', 'LGU in Charge', 'LGU User', 'Bilar', 'bilar1234', 'bilar1234@gmail.com', '09120391093', '$2y$12$eavAEQW3WjdMueAurCrkjOy5wvhfqQEJzWKcZIamNvziXKUc00VUm'),
(3, '5fdfb010d5aacb54a774b72aa2a37335.png', 'Marlon H. Muring', 'LGU in Charge', 'LGU User', 'Pilar', 'pilar1234', 'm2igniter32@gmail.com', '09108794063', '$2y$12$EnSfint10eoVKx4pbN1M9u9W9DgKbKnMzyNJyVOHqffhOdFqWRFf6'),
(4, 'default.png', 'Albur In Charge', 'LGU in Charge', 'LGU User', 'Alburquerque', 'albur1234', 'albur1234@yahoo.com', '09120931322', '$2y$12$yiUsDUE6QUg41UsV3gHyYeF1tgrxnN2GovkvyZjPWdUoDV3C.w62O'),
(5, '918c0d68b9593fb2edc63efb2d65a444.jpg', 'Marlon H. Muring', 'Community Division In Charge', 'Administrator', 'Pilar', 'marlon', 'marlonzhin32@gmail.com', '09351736347', '$2y$12$GMPZoNJMOiSIe0xjb/FPqehKT2RQYeUCaXFOAuwAQeGVNFmzWs7dy');

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

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `aname`, `descr`, `afrom`, `ato`, `municipal`, `budget`, `pic`) VALUES
(1, 'PYAP Sample Activity', 'Lorem Ipsum Resup asfen akasjd sdone asdof', 'January 20, 2018', 'January 20, 2018', 'Pilar', '10000', 'c2b2d99e738e13c138c231efc673b702.jpg'),
(2, 'Sample Activity', 'Lorem Ipsum ajksd janm shjds xkjxlc', 'January 21, 2017', 'January 22, 2017', 'Pilar', '10320', '02cb83d2f0684c1b3c97c443e74e9d59.jpg'),
(3, 'Random Activity', 'ajksdj kasd ka kad askl lasjda klasi oid sdoifios dzpoq qppsd qp siooqw oqw jwjkqw soiaso woaio ajksdj kasd ka kad askl lasjda klasi oid sdoifios dzpoq qppsd qp siooqw oqw jwjkqw soiaso woaio ajksdj kasd ka kad askl lasjda klasi oid sdoifios dzpoq qppsd qp siooqw oqw jwjkqw soiaso woaio', 'January 20, 2016', 'January 20, 2016', 'Pilar', '10000', 'ba30c136e8d798983466b584e145f870.jpg'),
(4, 'Randomized Activity 2', 'asjdka dlkajd j dsalkjkas dasjkdsa klasjd asjas k jadf;a ;af a;dfka akl kldfaks lask l;aks ;aa la; dk klsdd sksd k', 'January 20, 2016', 'January 20, 2016', 'Pilar', '10320', 'a0eef57e4d931b3e4a95883a269474c5.jpg'),
(6, 'Albur Activity', 'asdjakd kadsaj lasl', 'October 1, 2018', 'October 2, 2018', 'Alburquerque', '40000', 'd3f56e4dd53676e9b42d1908a819c851.png'),
(7, 'Albur Activity 2', ' asfi ioasiorj sdoisdi pxionj weo s qoiwi ap asidje eso sdoisdf siaPAS PASPO  asfi ioasiorj sdoisdi pxionj weo s qoiwi ap asidje eso sdoisdf siaPAS PASPO  asfi ioasiorj sdoisdi pxionj weo s qoiwi ap asidje eso sdoisdf siaPAS PASPO\r\n asfi ioasiorj sdoisdi pxionj weo s qoiwi ap asidje eso sdoisdf siaPAS PASPO  asfi ioasiorj sdoisdi pxionj weo s qoiwi ap asidje eso sdoisdf siaPAS PASPO.', 'October 9, 2018', 'October 9, 2018', 'Alburquerque', '20000', '7038d03c7f39c6018230566ece8fdd00.png'),
(8, 'Bilar Activity 101', 'ajdsa aisoj foia cxocxi pefp xcoiep wosdd ssd we[0sd fmqw  dsp0 sdsdspf ds ajdsa aisoj foia cxocxi pefp xcoiep wosdd ssd we[0sd fmqw  dsp0 sdsdspf ds ajdsa aisoj foia cxocxi pefp xcoiep wosdd ssd we[0sd fmqw  dsp0 sdsdspf ds ajdsa aisoj foia cxocxi pefp xcoiep wosdd ssd we[0sd fmqw  dsp0 sdsdspf ds ajdsa aisoj foia cxocxi pefp xcoiep wosdd ssd we[0sd fmqw  dsp0 sdsdspf ds ajdsa aisoj foia cxocxi pefp xcoiep wosdd ssd we[0sd fmqw  dsp0 sdsdspf ds ajdsa aisoj foia cxocxi pefp xcoiep wosdd ssd we[0sd fmqw  dsp0 sdsdspf ds ajdsa aisoj foia cxocxi pefp xcoiep wosdd ssd we[0sd fmqw  dsp0 sdsdspf ds.', 'October 2, 2018', 'October 2, 2018', 'Bilar', '20000', '76c9cd436bf6c400d67b6baa9d89e2a0.png'),
(9, 'Bilar Activity 102', 'sasa ajfjlsalasl jldsjala sasa ajfjlsalasl jldsjala sasa ajfjlsalasl jldsjala sasa ajfjlsalasl jldsjala sasa ajfjlsalasl jldsjala sasa ajfjlsalasl jldsjala sasa ajfjlsalasl jldsjala sasa ajfjlsalasl jldsjala sasa ajfjlsalasl jldsjala.', 'October 11, 2018', 'October 17, 2018', 'Bilar', '30000', '54e5ff03e95232941285e2c6814b07ba.jpg'),
(10, 'Bilar New Activity', 'a hdkh iasd as asosia w aposupai fpsoa azxkmaspo pazxa  o;k x9posal zasdf.', 'November 15, 2018', 'November 16, 2006', 'Bilar', '10000', '640b41f93d330dcc22d82ba5c9796b3e.png');

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

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `descr`, `posted_by`, `posted_on`) VALUES
(2, 'Lorem Ipsum Dolor Sit Amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Admin', '2018-09-29 06:13:05'),
(3, 'Lorem Ipsum Dolor Sit Amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.', 'Admin', '2018-10-01 09:13:05'),
(4, 'Lorem Ipsum Dolor Sit Ametist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Admin', '2018-10-06 14:23:27'),
(5, 'This Is An Announcement.', 'Lorem ipsum askjdjak jka opa doias dioa j asdil iaosds  aisod isoa oias dia as ioasdoa ui ioas asdia jas  isdfiu. K ajdsa as disao ioixh iow as ioasdio oasida ioesjdfsj asjdaj', 'Admin', '2018-10-02 10:23:38'),
(6, 'This Is The Latest Announcement.', ' aaoiu asiof uafoaof m fdkfsd posm xpopowe rd,sd poada ksaisai  aaoiu asiof uafoaof m fdkfsd posm xpopowe rd,sd poada ksaisai  aaoiu asiof uafoaof m fdkfsd posm xpopowe rd,sd poada ksaisai  aaoiu asiof uafoaof m fdkfsd posm xpopowe rd,sd poada ksaisai\r\naaoiu asiof uafoaof m fdkfsd posm xpopowe rd,sd poada ksaisai\r\naaoiu asiof uafoaof m fdkfsd posm xpopowe rd,sd poada ksaisai', 'Admin', '2018-10-12 10:29:05'),
(7, 'This Month\'s Announcement', 'This is the most recent announcement.', 'Marlon H Muring', '2018-10-27 13:57:03'),
(8, 'My Announcement', 'This is my announcement to everyone.', 'Marlon H Muring', '2018-10-28 06:30:24'),
(12, 'My Latest Announcement.', 'jkjajskjdksja sdfddsjg lgsjlkg p pq rq ra faops a sdfs', 'Marlon H Muring', '2018-10-28 07:02:29');

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

--
-- Dumping data for table `attainment`
--

INSERT INTO `attainment` (`id`, `mid`, `educStat`, `elemLevel`, `elemGrad`, `hsLevel`, `hsGrad`, `colLevel`, `colGrad`) VALUES
(1, 29, 'OSY', 0, 0, 0, 1, 0, 0),
(2, 28, 'OSY', 0, 0, 1, 0, 0, 0),
(3, 31, 'OSY', 0, 0, 1, 0, 0, 0),
(4, 36, 'OSY', 0, 1, 0, 0, 0, 0),
(5, 30, 'OSY', 0, 0, 1, 0, 0, 0),
(6, 37, 'Graduated', 0, 0, 0, 0, 0, 1),
(7, 15, 'ISY', 0, 0, 1, 0, 0, 0),
(8, 10, 'OSY', 0, 0, 1, 0, 0, 0),
(9, 26, 'ISY', 0, 0, 1, 0, 0, 0),
(10, 27, 'OSY', 0, 0, 1, 0, 0, 0),
(11, 24, 'OSY', 1, 0, 0, 0, 0, 0),
(12, 4, 'Graduated', 0, 0, 0, 0, 0, 1),
(13, 5, 'OSY', 0, 0, 0, 1, 0, 0),
(14, 7, 'OSY', 0, 1, 0, 0, 0, 0),
(16, 12, 'ISY', 0, 0, 0, 0, 1, 0),
(17, 13, 'OSY', 0, 0, 0, 1, 0, 0),
(18, 38, 'OSY', 0, 0, 0, 1, 0, 0),
(19, 25, 'OSY', 0, 0, 0, 1, 0, 0),
(20, 34, 'ISY', 0, 0, 0, 1, 0, 0),
(21, 21, 'OSY', 0, 0, 0, 1, 0, 0),
(22, 9, 'OSY', 0, 0, 0, 1, 0, 0),
(23, 16, 'OSY', 0, 0, 0, 1, 0, 0),
(25, 23, 'OSY', 0, 0, 0, 0, 1, 0),
(26, 17, 'ISY', 0, 0, 1, 0, 0, 0),
(27, 20, 'OSY', 0, 0, 1, 0, 0, 0),
(28, 32, 'OSY', 0, 0, 0, 1, 0, 0),
(29, 19, 'OSY', 0, 1, 0, 0, 0, 0),
(30, 35, 'ISY', 0, 0, 0, 0, 1, 0),
(31, 18, 'OSY', 0, 0, 1, 0, 0, 0),
(32, 33, 'OSY', 0, 1, 0, 0, 0, 0),
(33, 11, 'OSY', 0, 0, 0, 1, 0, 0),
(34, 40, 'OSY', 0, 0, 0, 1, 0, 0),
(35, 41, 'ISY', 0, 0, 1, 0, 0, 0),
(36, 42, 'OSY', 0, 0, 1, 0, 0, 0),
(37, 43, 'OSY', 0, 0, 0, 1, 0, 0),
(38, 44, 'OSY', 0, 0, 1, 0, 0, 0),
(39, 45, 'OSY', 0, 0, 0, 1, 0, 0),
(41, 56, 'OSY', 0, 1, 0, 0, 0, 0),
(42, 65, 'OSY', 0, 1, 0, 0, 0, 0),
(43, 66, 'OSY', 0, 0, 0, 0, 1, 0);

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

--
-- Dumping data for table `barangays`
--

INSERT INTO `barangays` (`brgy_id`, `brgy`, `mun_id`, `wPyap`, `started`) VALUES
(1, 'Bahi', 1, 1, '2018-11-14 08:53:52'),
(2, 'Basacdacu', 1, 1, '2018-11-14 08:53:52'),
(3, 'Cantiguib', 1, 1, '2018-11-14 08:53:52'),
(4, 'Dangay', 1, 1, '2018-11-14 08:53:52'),
(5, 'East Poblacion', 1, 0, '2018-11-14 08:42:26'),
(6, 'Ponong', 1, 1, '2018-11-14 09:46:07'),
(7, 'San Agustin', 1, 1, '2018-11-14 09:44:32'),
(8, 'Santa Filomena', 1, 1, '2018-11-14 09:49:38'),
(9, 'Tagbuane', 1, 0, '2018-11-14 08:42:26'),
(10, 'Toril', 1, 0, '2018-11-14 08:42:26'),
(11, 'West Poblacion', 1, 1, '2018-11-14 08:53:52'),
(12, 'Cabatang', 2, 0, '2018-11-14 08:42:26'),
(13, 'Cagongcagong', 2, 0, '2018-11-14 08:42:26'),
(14, 'Cambaol', 2, 0, '2018-11-14 08:42:26'),
(15, 'Cayacay', 2, 0, '2018-11-14 08:42:26'),
(16, 'Del Monte', 2, 0, '2018-11-14 08:42:26'),
(17, 'Katipunan', 2, 0, '2018-11-14 08:42:26'),
(18, 'La Hacienda', 2, 0, '2018-11-14 08:42:26'),
(19, 'Mahayag', 2, 0, '2018-11-14 08:42:26'),
(20, 'Napo', 2, 0, '2018-11-14 08:42:26'),
(21, 'Pagahat', 2, 0, '2018-11-14 08:42:26'),
(22, 'Poblacion (Calingganay)', 2, 0, '2018-11-14 08:42:26'),
(23, 'Progreso', 2, 0, '2018-11-14 08:42:26'),
(24, 'Putlongcam', 2, 0, '2018-11-14 08:42:26'),
(25, 'Sudlon', 2, 0, '2018-11-14 08:42:26'),
(26, 'Untaga', 2, 0, '2018-11-14 08:42:26'),
(27, 'Almaria', 3, 0, '2018-11-14 08:42:26'),
(28, 'Bacong', 3, 0, '2018-11-14 08:42:26'),
(29, 'Badiang', 3, 0, '2018-11-14 08:42:26'),
(30, 'Buenasuerte', 3, 0, '2018-11-14 08:42:26'),
(31, 'Candabong', 3, 0, '2018-11-14 08:42:26'),
(32, 'Casica', 3, 0, '2018-11-14 08:42:26'),
(33, 'Katipunan', 3, 0, '2018-11-14 08:42:26'),
(34, 'Linawan', 3, 0, '2018-11-14 08:42:26'),
(35, 'Lundag', 3, 0, '2018-11-14 08:42:26'),
(36, 'Poblacion', 3, 0, '2018-11-14 08:42:26'),
(37, 'Santa Cruz', 3, 0, '2018-11-14 08:42:26'),
(38, 'Suba', 3, 0, '2018-11-14 08:42:26'),
(39, 'Talisay', 3, 0, '2018-11-14 08:42:26'),
(40, 'Tanod', 3, 0, '2018-11-14 08:42:26'),
(41, 'Tawid', 3, 0, '2018-11-14 08:42:26'),
(42, 'Virgen', 3, 0, '2018-11-14 08:42:26'),
(43, 'Angilan', 4, 0, '2018-11-14 08:42:26'),
(44, 'Bantolinao', 4, 0, '2018-11-14 08:42:26'),
(45, 'Bicahan', 4, 0, '2018-11-14 08:42:26'),
(46, 'Bitaugan', 4, 0, '2018-11-14 08:42:26'),
(47, 'Bungahan', 4, 0, '2018-11-14 08:42:26'),
(48, 'Canlaas', 4, 0, '2018-11-14 08:42:26'),
(49, 'Can-omay', 4, 0, '2018-11-14 08:42:26'),
(50, 'Cansibuan', 4, 0, '2018-11-14 08:42:26'),
(51, 'Ceiling', 4, 0, '2018-11-14 08:42:26'),
(52, 'Danao', 4, 0, '2018-11-14 08:42:26'),
(53, 'Danicop', 4, 0, '2018-11-14 08:42:26'),
(54, 'Mag-aso', 4, 0, '2018-11-14 08:42:26'),
(55, 'Poblacion', 4, 0, '2018-11-14 08:42:26'),
(56, 'Quinapon-an', 4, 0, '2018-11-14 08:42:26'),
(57, 'Santo Rosario', 4, 0, '2018-11-14 08:42:26'),
(58, 'Tabuan', 4, 0, '2018-11-14 08:42:26'),
(59, 'Tagubaas', 4, 0, '2018-11-14 08:42:26'),
(60, 'Tupas', 4, 0, '2018-11-14 08:42:26'),
(61, 'Ubojan', 4, 0, '2018-11-14 08:42:26'),
(62, 'Viga', 4, 0, '2018-11-14 08:42:26'),
(63, 'Villa Aurora (Canoc-oc)', 4, 0, '2018-11-14 08:42:26'),
(64, 'Buenaventura', 5, 0, '2018-11-14 08:42:26'),
(65, 'Cambanac', 5, 0, '2018-11-14 08:42:26'),
(66, 'Dasitam', 5, 0, '2018-11-14 08:42:26'),
(67, 'Guiwanon', 5, 0, '2018-11-14 08:42:26'),
(68, 'Landican', 5, 0, '2018-11-14 08:42:26'),
(69, 'Laya', 5, 0, '2018-11-14 08:42:26'),
(70, 'Libertad', 5, 0, '2018-11-14 08:42:26'),
(71, 'Montana', 5, 0, '2018-11-14 08:42:26'),
(72, 'Pamilacan', 5, 0, '2018-11-14 08:42:26'),
(73, 'Payahan', 5, 0, '2018-11-14 08:42:26'),
(74, 'Poblacion', 5, 0, '2018-11-14 08:42:26'),
(75, 'San Isidro', 5, 0, '2018-11-14 08:42:26'),
(76, 'San Roque', 5, 0, '2018-11-14 08:42:26'),
(77, 'San Vicente', 5, 0, '2018-11-14 08:42:26'),
(78, 'Santa Cruz', 5, 0, '2018-11-14 08:42:26'),
(79, 'Taguihon', 5, 0, '2018-11-14 08:42:26'),
(80, 'Tanday', 5, 0, '2018-11-14 08:42:26'),
(81, 'Baucan Norte', 6, 0, '2018-11-14 08:42:26'),
(82, 'Baucan Sur', 6, 0, '2018-11-14 08:42:26'),
(83, 'Boctol', 6, 0, '2018-11-14 08:42:26'),
(84, 'Boyog Norte', 6, 0, '2018-11-14 08:42:26'),
(85, 'Boyog Proper', 6, 0, '2018-11-14 08:42:26'),
(86, 'Boyog Sur', 6, 0, '2018-11-14 08:42:26'),
(87, 'Cabad', 6, 0, '2018-11-14 08:42:26'),
(88, 'Candasig', 6, 0, '2018-11-14 08:42:26'),
(89, 'Cantalid', 6, 0, '2018-11-14 08:42:26'),
(90, 'Cantomimbo', 6, 0, '2018-11-14 08:42:26'),
(91, 'Cogon', 6, 0, '2018-11-14 08:42:26'),
(92, 'Datag Norte', 6, 0, '2018-11-14 08:42:26'),
(93, 'Datag Sur', 6, 0, '2018-11-14 08:42:26'),
(94, 'Del Carmen Este', 6, 0, '2018-11-14 08:42:26'),
(95, 'Del Carmen Norte', 6, 0, '2018-11-14 08:42:26'),
(96, 'Del Carmen Sur', 6, 0, '2018-11-14 08:42:26'),
(97, 'Del Carmen Weste', 6, 0, '2018-11-14 08:42:26'),
(98, 'Del Rosario', 6, 0, '2018-11-14 08:42:26'),
(99, 'Dorol', 6, 0, '2018-11-14 08:42:26'),
(100, 'Haguilanan Grande', 6, 0, '2018-11-14 08:42:26'),
(101, 'Hanopol Este', 6, 0, '2018-11-14 08:42:26'),
(102, 'Hanopol Norte', 6, 0, '2018-11-14 08:42:26'),
(103, 'Hanopol Weste', 6, 0, '2018-11-14 08:42:26'),
(104, 'Magsija', 6, 0, '2018-11-14 08:42:26'),
(105, 'Maslog', 6, 0, '2018-11-14 08:42:26'),
(106, 'Sagasa', 6, 0, '2018-11-14 08:42:26'),
(107, 'Sal-ing', 6, 0, '2018-11-14 08:42:26'),
(108, 'San Isidro', 6, 0, '2018-11-14 08:42:26'),
(109, 'San Roque', 6, 0, '2018-11-14 08:42:26'),
(110, 'Santo Niño', 6, 0, '2018-11-14 08:42:26'),
(111, 'Tagustusan', 6, 0, '2018-11-14 08:42:26'),
(112, 'Aloja', 7, 0, '2018-11-14 08:42:26'),
(113, 'Behind The Clouds (San Jose)', 7, 0, '2018-11-14 08:42:26'),
(114, 'Cabacnitan', 7, 0, '2018-11-14 08:42:26'),
(115, 'Cambacay', 7, 0, '2018-11-14 08:42:26'),
(116, 'Cantigdas', 7, 0, '2018-11-14 08:42:26'),
(117, 'Garcia', 7, 0, '2018-11-14 08:42:26'),
(118, 'Janlud', 7, 0, '2018-11-14 08:42:26'),
(119, 'Poblacion Norte', 7, 0, '2018-11-14 08:42:26'),
(120, 'Poblacion Sur', 7, 0, '2018-11-14 08:42:26'),
(121, 'Poblacion Vieja', 7, 0, '2018-11-14 08:42:26'),
(122, 'Quezon', 7, 0, '2018-11-14 08:42:26'),
(123, 'Quirino', 7, 0, '2018-11-14 08:42:26'),
(124, 'Rizal', 7, 0, '2018-11-14 08:42:26'),
(125, 'Rosariohan', 7, 0, '2018-11-14 08:42:26'),
(126, 'Santa Cruz', 7, 0, '2018-11-14 08:42:26'),
(127, 'Bilangbilangan Dako', 8, 0, '2018-11-14 08:42:26'),
(128, 'Bilangbilangan Diot', 8, 0, '2018-11-14 08:42:26'),
(129, 'Hingotanan East', 8, 0, '2018-11-14 08:42:26'),
(130, 'Hingotanan West', 8, 0, '2018-11-14 08:42:26'),
(131, 'Liberty', 8, 0, '2018-11-14 08:42:26'),
(132, 'Malingin', 8, 0, '2018-11-14 08:42:26'),
(133, 'Mandawa', 8, 0, '2018-11-14 08:42:26'),
(134, 'Maomawan', 8, 0, '2018-11-14 08:42:26'),
(135, 'Nueva Esperanza', 8, 0, '2018-11-14 08:42:26'),
(136, 'Nueva Estrella', 8, 0, '2018-11-14 08:42:26'),
(137, 'Pinamgo', 8, 0, '2018-11-14 08:42:26'),
(138, 'Poblacion', 8, 0, '2018-11-14 08:42:26'),
(139, 'Puerto San Pedro', 8, 0, '2018-11-14 08:42:26'),
(140, 'Sagasa', 8, 0, '2018-11-14 08:42:26'),
(141, 'Tuboran', 8, 0, '2018-11-14 08:42:26'),
(142, 'Bonifacio', 9, 1, '2018-11-18 14:29:44'),
(143, 'Bugang Norte', 9, 1, '2018-11-14 08:53:52'),
(144, 'Bugang Sur', 9, 0, '2018-11-14 08:42:26'),
(145, 'Cabacnitan (Magsaysay)', 9, 0, '2018-11-14 08:42:26'),
(146, 'Cambigsi', 9, 1, '2018-11-14 08:53:53'),
(147, 'Campagao', 9, 1, '2018-11-14 08:53:53'),
(148, 'Cansumbol', 9, 1, '2018-11-14 08:53:53'),
(149, 'Dagohoy', 9, 0, '2018-11-14 08:42:26'),
(150, 'Owac', 9, 1, '2018-11-14 08:53:53'),
(151, 'Poblacion', 9, 0, '2018-11-14 08:42:26'),
(152, 'Quezon', 9, 0, '2018-11-14 08:42:26'),
(153, 'Riverside', 9, 0, '2018-11-14 08:42:26'),
(154, 'Rizal', 9, 0, '2018-11-14 08:42:26'),
(155, 'Roxas', 9, 0, '2018-11-14 08:42:26'),
(156, 'Subayon', 9, 0, '2018-11-14 08:42:26'),
(157, 'Villa Aurora', 9, 0, '2018-11-14 08:42:26'),
(158, 'Villa Suerte', 9, 0, '2018-11-14 08:42:26'),
(159, 'Yanaya', 9, 0, '2018-11-14 08:42:26'),
(160, 'Zamora', 9, 0, '2018-11-14 08:42:26'),
(161, 'Anonang', 10, 0, '2018-11-14 08:42:26'),
(162, 'Asinan', 10, 0, '2018-11-14 08:42:26'),
(163, 'Bago', 10, 0, '2018-11-14 08:42:26'),
(164, 'Baluarte', 10, 0, '2018-11-14 08:42:26'),
(165, 'Bantuan', 10, 0, '2018-11-14 08:42:26'),
(166, 'Bato', 10, 0, '2018-11-14 08:42:26'),
(167, 'Bonotbonot', 10, 0, '2018-11-14 08:42:26'),
(168, 'Bugaong', 10, 0, '2018-11-14 08:42:26'),
(169, 'Cambuhat', 10, 0, '2018-11-14 08:42:26'),
(170, 'Cambus-oc', 10, 0, '2018-11-14 08:42:26'),
(171, 'Cangawa', 10, 0, '2018-11-14 08:42:26'),
(172, 'Cantomugcad', 10, 0, '2018-11-14 08:42:26'),
(173, 'Cantores', 10, 0, '2018-11-14 08:42:26'),
(174, 'Cantuba', 10, 0, '2018-11-14 08:42:26'),
(175, 'Catigbian', 10, 0, '2018-11-14 08:42:26'),
(176, 'Cawag', 10, 0, '2018-11-14 08:42:26'),
(177, 'Cruz', 10, 0, '2018-11-14 08:42:26'),
(178, 'Dait', 10, 0, '2018-11-14 08:42:26'),
(179, 'Eastern Cabul-an', 10, 0, '2018-11-14 08:42:26'),
(180, 'Hunan', 10, 0, '2018-11-14 08:42:26'),
(181, 'Lapacan Norte', 10, 0, '2018-11-14 08:42:26'),
(182, 'Lapacan Sur', 10, 0, '2018-11-14 08:42:26'),
(183, 'Lubang', 10, 0, '2018-11-14 08:42:26'),
(184, 'Lusong', 10, 0, '2018-11-14 08:42:26'),
(185, 'Magkaya', 10, 0, '2018-11-14 08:42:26'),
(186, 'Merryland', 10, 0, '2018-11-14 08:42:26'),
(187, 'Nueva Granada', 10, 0, '2018-11-14 08:42:26'),
(188, 'Nueva Montana', 10, 0, '2018-11-14 08:42:26'),
(189, 'Overland', 10, 0, '2018-11-14 08:42:26'),
(190, 'Panghabgan', 10, 0, '2018-11-14 08:42:26'),
(191, 'Poblacion', 10, 0, '2018-11-14 08:42:26'),
(192, 'Puting Bato', 10, 0, '2018-11-14 08:42:26'),
(193, 'Rufo Hill', 10, 0, '2018-11-14 08:42:26'),
(194, 'Sweetland', 10, 0, '2018-11-14 08:42:26'),
(195, 'Western Cabul-an', 10, 0, '2018-11-14 08:42:26'),
(196, 'Abucayan Norte', 11, 0, '2018-11-14 08:42:26'),
(197, 'Abucayan Sur', 11, 0, '2018-11-14 08:42:26'),
(198, 'Banlasan', 11, 0, '2018-11-14 08:42:26'),
(199, 'Bentig', 11, 0, '2018-11-14 08:42:26'),
(200, 'Binogawan', 11, 0, '2018-11-14 08:42:26'),
(201, 'Bonbon', 11, 0, '2018-11-14 08:42:26'),
(202, 'Cabayugan', 11, 0, '2018-11-14 08:42:26'),
(203, 'Cabudburan', 11, 0, '2018-11-14 08:42:26'),
(204, 'Calunasan', 11, 0, '2018-11-14 08:42:26'),
(205, 'Camias', 11, 0, '2018-11-14 08:42:26'),
(206, 'Canguha', 11, 0, '2018-11-14 08:42:26'),
(207, 'Catmonan', 11, 0, '2018-11-14 08:42:26'),
(208, 'Desamparados', 11, 0, '2018-11-14 08:42:26'),
(209, 'Kahayag', 11, 0, '2018-11-14 08:42:26'),
(210, 'Kinabag-an', 11, 0, '2018-11-14 08:42:26'),
(211, 'Labuon', 11, 0, '2018-11-14 08:42:26'),
(212, 'Lawis', 11, 0, '2018-11-14 08:42:26'),
(213, 'Liboron', 11, 0, '2018-11-14 08:42:26'),
(214, 'Lomboy', 11, 0, '2018-11-14 08:42:26'),
(215, 'Lo-oc', 11, 0, '2018-11-14 08:42:26'),
(216, 'Lucob', 11, 0, '2018-11-14 08:42:26'),
(217, 'Madangog', 11, 0, '2018-11-14 08:42:26'),
(218, 'Magtongtong', 11, 0, '2018-11-14 08:42:26'),
(219, 'Mandaug', 11, 0, '2018-11-14 08:42:26'),
(220, 'Mantatao', 11, 0, '2018-11-14 08:42:26'),
(221, 'Sampoangon', 11, 0, '2018-11-14 08:42:26'),
(222, 'San Isidro', 11, 0, '2018-11-14 08:42:26'),
(223, 'Santa Cruz', 11, 0, '2018-11-14 08:42:26'),
(224, 'Sojoton', 11, 0, '2018-11-14 08:42:26'),
(225, 'Talisay', 11, 0, '2018-11-14 08:42:26'),
(226, 'Tinibgan', 11, 0, '2018-11-14 08:42:26'),
(227, 'Tultugan', 11, 0, '2018-11-14 08:42:26'),
(228, 'Ulbujan', 11, 0, '2018-11-14 08:42:26'),
(229, 'Abihilan', 12, 0, '2018-11-14 08:42:26'),
(230, 'Anoling', 12, 0, '2018-11-14 08:42:26'),
(231, 'Boyo-an', 12, 0, '2018-11-14 08:42:26'),
(232, 'Cadapdapan', 12, 0, '2018-11-14 08:42:26'),
(233, 'Cambane', 12, 0, '2018-11-14 08:42:26'),
(234, 'Canawa', 12, 0, '2018-11-14 08:42:26'),
(235, 'Can-olin', 12, 0, '2018-11-14 08:42:26'),
(236, 'Cogtong', 12, 0, '2018-11-14 08:42:26'),
(237, 'La Union', 12, 0, '2018-11-14 08:42:26'),
(238, 'Luan', 12, 0, '2018-11-14 08:42:26'),
(239, 'Lungsoda-an', 12, 0, '2018-11-14 08:42:26'),
(240, 'Mahangin', 12, 0, '2018-11-14 08:42:26'),
(241, 'Pagahat', 12, 0, '2018-11-14 08:42:26'),
(242, 'Panadtaran', 12, 0, '2018-11-14 08:42:26'),
(243, 'Panas', 12, 0, '2018-11-14 08:42:26'),
(244, 'Poblacion', 12, 0, '2018-11-14 08:42:26'),
(245, 'San Isidro', 12, 0, '2018-11-14 08:42:26'),
(246, 'Tambongan', 12, 0, '2018-11-14 08:42:26'),
(247, 'Tawid', 12, 0, '2018-11-14 08:42:26'),
(248, 'Tubod (Tres Rosas)', 12, 0, '2018-11-14 08:42:26'),
(249, 'Tugas', 12, 0, '2018-11-14 08:42:26'),
(250, 'Alegria', 13, 0, '2018-11-14 08:42:26'),
(251, 'Bicao', 13, 0, '2018-11-14 08:42:26'),
(252, 'Buenavista', 13, 0, '2018-11-14 08:42:26'),
(253, 'Buenos Aires', 13, 0, '2018-11-14 08:42:26'),
(254, 'Calatrava', 13, 0, '2018-11-14 08:42:26'),
(255, 'El Progreso', 13, 0, '2018-11-14 08:42:26'),
(256, 'El Salvador', 13, 0, '2018-11-14 08:42:26'),
(257, 'Guadalupe', 13, 0, '2018-11-14 08:42:26'),
(258, 'Katipunan', 13, 0, '2018-11-14 08:42:26'),
(259, 'La Libertad', 13, 0, '2018-11-14 08:42:26'),
(260, 'La Paz', 13, 0, '2018-11-14 08:42:26'),
(261, 'La Salvacion', 13, 0, '2018-11-14 08:42:26'),
(262, 'La Victoria', 13, 0, '2018-11-14 08:42:26'),
(263, 'Matin-ao', 13, 0, '2018-11-14 08:42:26'),
(264, 'Montehermoso', 13, 0, '2018-11-14 08:42:26'),
(265, 'Montesuerte', 13, 0, '2018-11-14 08:42:26'),
(266, 'Montesunting', 13, 0, '2018-11-14 08:42:26'),
(267, 'Montevideo', 13, 0, '2018-11-14 08:42:26'),
(268, 'Nueva Fuerza', 13, 0, '2018-11-14 08:42:26'),
(269, 'Nueva Vida Este', 13, 0, '2018-11-14 08:42:26'),
(270, 'Nueva Vida Norte', 13, 0, '2018-11-14 08:42:26'),
(271, 'Nueva Vida Sur', 13, 0, '2018-11-14 08:42:26'),
(272, 'Poblacion Norte', 13, 0, '2018-11-14 08:42:26'),
(273, 'Poblacion Sur', 13, 0, '2018-11-14 08:42:26'),
(274, 'Tambo-an', 13, 0, '2018-11-14 08:42:26'),
(275, 'Vallehermoso', 13, 0, '2018-11-14 08:42:26'),
(276, 'Villaflor', 13, 0, '2018-11-14 08:42:26'),
(277, 'Villafuerte', 13, 0, '2018-11-14 08:42:26'),
(278, 'Villarcayo', 13, 0, '2018-11-14 08:42:26'),
(279, 'Alegria', 14, 0, '2018-11-14 08:42:26'),
(280, 'Ambuan', 14, 0, '2018-11-14 08:42:26'),
(281, 'Baang', 14, 0, '2018-11-14 08:42:26'),
(282, 'Bagtic', 14, 0, '2018-11-14 08:42:26'),
(283, 'Bongbong', 14, 0, '2018-11-14 08:42:26'),
(284, 'Cambailan', 14, 0, '2018-11-14 08:42:26'),
(285, 'Candumayao', 14, 0, '2018-11-14 08:42:26'),
(286, 'Causwagan Norte', 14, 0, '2018-11-14 08:42:26'),
(287, 'Hagbuaya', 14, 0, '2018-11-14 08:42:26'),
(288, 'Haguilanan', 14, 0, '2018-11-14 08:42:26'),
(289, 'Kang-iras', 14, 0, '2018-11-14 08:42:26'),
(290, 'Libertad Sur', 14, 0, '2018-11-14 08:42:26'),
(291, 'Liboron', 14, 0, '2018-11-14 08:42:26'),
(292, 'Mahayag Norte', 14, 0, '2018-11-14 08:42:26'),
(293, 'Mahayag Sur', 14, 0, '2018-11-14 08:42:26'),
(294, 'Maitum', 14, 0, '2018-11-14 08:42:26'),
(295, 'Mantasida', 14, 0, '2018-11-14 08:42:26'),
(296, 'Poblacion Weste', 14, 0, '2018-11-14 08:42:26'),
(297, 'Poblacion', 14, 0, '2018-11-14 08:42:26'),
(298, 'Rizal', 14, 0, '2018-11-14 08:42:26'),
(299, 'Sinakayanan', 14, 0, '2018-11-14 08:42:26'),
(300, 'Triple Union', 14, 0, '2018-11-14 08:42:26'),
(301, 'Bacani', 15, 0, '2018-11-14 08:42:26'),
(302, 'Bogtongbod', 15, 0, '2018-11-14 08:42:26'),
(303, 'Bonbon', 15, 0, '2018-11-14 08:42:26'),
(304, 'Bontud', 15, 0, '2018-11-14 08:42:26'),
(305, 'Buacao', 15, 0, '2018-11-14 08:42:26'),
(306, 'Buangan', 15, 0, '2018-11-14 08:42:26'),
(307, 'Cabog', 15, 0, '2018-11-14 08:42:26'),
(308, 'Caluwasan', 15, 0, '2018-11-14 08:42:26'),
(309, 'Candajec', 15, 0, '2018-11-14 08:42:26'),
(310, 'Cantoyoc', 15, 0, '2018-11-14 08:42:26'),
(311, 'Comaang', 15, 0, '2018-11-14 08:42:26'),
(312, 'Danahao', 15, 0, '2018-11-14 08:42:26'),
(313, 'Katipunan', 15, 0, '2018-11-14 08:42:26'),
(314, 'Lajog', 15, 0, '2018-11-14 08:42:26'),
(315, 'Mataub', 15, 0, '2018-11-14 08:42:26'),
(316, 'Nahawan', 15, 0, '2018-11-14 08:42:26'),
(317, 'Poblacion Centro', 15, 0, '2018-11-14 08:42:26'),
(318, 'Poblacion Norte', 15, 0, '2018-11-14 08:42:26'),
(319, 'Poblacion Sur', 15, 0, '2018-11-14 08:42:26'),
(320, 'Tangaran', 15, 0, '2018-11-14 08:42:26'),
(321, 'Tontunan', 15, 0, '2018-11-14 08:42:26'),
(322, 'Tubod', 15, 0, '2018-11-14 08:42:26'),
(323, 'Villaflor', 15, 0, '2018-11-14 08:42:26'),
(324, 'Anislag', 16, 0, '2018-11-14 08:42:26'),
(325, 'Canangca-an', 16, 0, '2018-11-14 08:42:26'),
(326, 'Canapnapan', 16, 0, '2018-11-14 08:42:26'),
(327, 'Cancatac', 16, 0, '2018-11-14 08:42:26'),
(328, 'Pandol', 16, 0, '2018-11-14 08:42:26'),
(329, 'Poblacion', 16, 0, '2018-11-14 08:42:26'),
(330, 'Sambog', 16, 0, '2018-11-14 08:42:26'),
(331, 'Tanday', 16, 0, '2018-11-14 08:42:26'),
(332, 'De La Paz', 17, 0, '2018-11-14 08:42:26'),
(333, 'Fatima', 17, 0, '2018-11-14 08:42:26'),
(334, 'Loreto', 17, 0, '2018-11-14 08:42:26'),
(335, 'Lourdes', 17, 0, '2018-11-14 08:42:26'),
(336, 'Malayo Norte', 17, 0, '2018-11-14 08:42:26'),
(337, 'Malayo Sur', 17, 0, '2018-11-14 08:42:26'),
(338, 'Monserrat', 17, 0, '2018-11-14 08:42:26'),
(339, 'New Lourdes', 17, 0, '2018-11-14 08:42:26'),
(340, 'Patrocinio', 17, 0, '2018-11-14 08:42:26'),
(341, 'Poblacion', 17, 0, '2018-11-14 08:42:26'),
(342, 'Rosario', 17, 0, '2018-11-14 08:42:26'),
(343, 'Salvador', 17, 0, '2018-11-14 08:42:26'),
(344, 'San Roque', 17, 0, '2018-11-14 08:42:26'),
(345, 'Upper De La Paz', 17, 0, '2018-11-14 08:42:26'),
(346, 'Babag', 18, 0, '2018-11-14 08:42:26'),
(347, 'Cagawasan', 18, 0, '2018-11-14 08:42:26'),
(348, 'Cagawitan', 18, 0, '2018-11-14 08:42:26'),
(349, 'Caluasan', 18, 0, '2018-11-14 08:42:26'),
(350, 'Candelaria', 18, 0, '2018-11-14 08:42:26'),
(351, 'Can-oling', 18, 0, '2018-11-14 08:42:26'),
(352, 'Estaca', 18, 0, '2018-11-14 08:42:26'),
(353, 'La Esperanza', 18, 0, '2018-11-14 08:42:26'),
(354, 'Mahayag', 18, 0, '2018-11-14 08:42:26'),
(355, 'Malitbog', 18, 0, '2018-11-14 08:42:26'),
(356, 'Poblacion', 18, 0, '2018-11-14 08:42:26'),
(357, 'San Miguel', 18, 0, '2018-11-14 08:42:26'),
(358, 'San Vicente', 18, 0, '2018-11-14 08:42:26'),
(359, 'Santa Cruz', 18, 0, '2018-11-14 08:42:26'),
(360, 'Villa Aurora', 18, 0, '2018-11-14 08:42:26'),
(361, 'Cabatuan', 19, 0, '2018-11-14 08:42:26'),
(362, 'Cantubod', 19, 0, '2018-11-14 08:42:26'),
(363, 'Carbon', 19, 0, '2018-11-14 08:42:26'),
(364, 'Concepcion', 19, 0, '2018-11-14 08:42:26'),
(365, 'Dagohoy', 19, 0, '2018-11-14 08:42:26'),
(366, 'Hibale', 19, 0, '2018-11-14 08:42:26'),
(367, 'Magtangtang', 19, 0, '2018-11-14 08:42:26'),
(368, 'Nahud', 19, 0, '2018-11-14 08:42:26'),
(369, 'Poblacion', 19, 0, '2018-11-14 08:42:26'),
(370, 'Remedios', 19, 0, '2018-11-14 08:42:26'),
(371, 'San Carlos', 19, 0, '2018-11-14 08:42:26'),
(372, 'San Miguel', 19, 0, '2018-11-14 08:42:26'),
(373, 'Santa Fe', 19, 0, '2018-11-14 08:42:26'),
(374, 'Santo Niño', 19, 0, '2018-11-14 08:42:26'),
(375, 'Tabok', 19, 0, '2018-11-14 08:42:26'),
(376, 'Taming', 19, 0, '2018-11-14 08:42:26'),
(377, 'Villa Anunciado', 19, 0, '2018-11-14 08:42:26'),
(378, 'Biking', 20, 0, '2018-11-14 08:42:26'),
(379, 'Bingag', 20, 0, '2018-11-14 08:42:26'),
(380, 'Catarman', 20, 0, '2018-11-14 08:42:26'),
(381, 'Dao', 20, 0, '2018-11-14 08:42:26'),
(382, 'Mariveles', 20, 0, '2018-11-14 08:42:26'),
(383, 'Mayacabac', 20, 0, '2018-11-14 08:42:26'),
(384, 'Poblacion', 20, 0, '2018-11-14 08:42:26'),
(385, 'San Isidro (Canlongon)', 20, 0, '2018-11-14 08:42:26'),
(386, 'Songculan', 20, 0, '2018-11-14 08:42:26'),
(387, 'Tabalong', 20, 0, '2018-11-14 08:42:26'),
(388, 'Tinago', 20, 0, '2018-11-14 08:42:26'),
(389, 'Totolan', 20, 0, '2018-11-14 08:42:26'),
(390, 'Abihid', 21, 0, '2018-11-14 08:42:26'),
(391, 'Alemania', 21, 0, '2018-11-14 08:42:26'),
(392, 'Baguhan', 21, 0, '2018-11-14 08:42:26'),
(393, 'Bakilid', 21, 0, '2018-11-14 08:42:26'),
(394, 'Balbalan', 21, 0, '2018-11-14 08:42:26'),
(395, 'Banban', 21, 0, '2018-11-14 08:42:26'),
(396, 'Bauhugan', 21, 0, '2018-11-14 08:42:26'),
(397, 'Bilisan', 21, 0, '2018-11-14 08:42:26'),
(398, 'Cabagakian', 21, 0, '2018-11-14 08:42:26'),
(399, 'Cabanbanan', 21, 0, '2018-11-14 08:42:26'),
(400, 'Cadap-agan', 21, 0, '2018-11-14 08:42:26'),
(401, 'Cambacol', 21, 0, '2018-11-14 08:42:26'),
(402, 'Cambayaon', 21, 0, '2018-11-14 08:42:26'),
(403, 'Canhayupon', 21, 0, '2018-11-14 08:42:26'),
(404, 'Canlambong', 21, 0, '2018-11-14 08:42:26'),
(405, 'Casingan', 21, 0, '2018-11-14 08:42:26'),
(406, 'Catugasan', 21, 0, '2018-11-14 08:42:26'),
(407, 'Datag', 21, 0, '2018-11-14 08:42:26'),
(408, 'Guindaguitan', 21, 0, '2018-11-14 08:42:26'),
(409, 'Guingoyuran', 21, 0, '2018-11-14 08:42:26'),
(410, 'Ile', 21, 0, '2018-11-14 08:42:26'),
(411, 'Lapsaon', 21, 0, '2018-11-14 08:42:26'),
(412, 'Limokon Ilaud', 21, 0, '2018-11-14 08:42:26'),
(413, 'Limokon Ilaya', 21, 0, '2018-11-14 08:42:26'),
(414, 'Luyo', 21, 0, '2018-11-14 08:42:26'),
(415, 'Malijao', 21, 0, '2018-11-14 08:42:26'),
(416, 'Oac', 21, 0, '2018-11-14 08:42:26'),
(417, 'Pagsa', 21, 0, '2018-11-14 08:42:26'),
(418, 'Pangihawan', 21, 0, '2018-11-14 08:42:26'),
(419, 'Puangyuta', 21, 0, '2018-11-14 08:42:26'),
(420, 'Sawang', 21, 0, '2018-11-14 08:42:26'),
(421, 'Tangohay', 21, 0, '2018-11-14 08:42:26'),
(422, 'Taongon Cabatuan', 21, 0, '2018-11-14 08:42:26'),
(423, 'Taongon Can-andam', 21, 0, '2018-11-14 08:42:26'),
(424, 'Tawid Bitaog', 21, 0, '2018-11-14 08:42:26'),
(425, 'Alejawan', 22, 0, '2018-11-14 08:42:26'),
(426, 'Angilan', 22, 0, '2018-11-14 08:42:26'),
(427, 'Anibongan', 22, 0, '2018-11-14 08:42:26'),
(428, 'Bangwalog', 22, 0, '2018-11-14 08:42:26'),
(429, 'Cansuhay', 22, 0, '2018-11-14 08:42:26'),
(430, 'Danao', 22, 0, '2018-11-14 08:42:26'),
(431, 'Duay', 22, 0, '2018-11-14 08:42:26'),
(432, 'Guinsularan', 22, 0, '2018-11-14 08:42:26'),
(433, 'Imelda', 22, 0, '2018-11-14 08:42:26'),
(434, 'Itum', 22, 0, '2018-11-14 08:42:26'),
(435, 'Langkis', 22, 0, '2018-11-14 08:42:26'),
(436, 'Lobogon', 22, 0, '2018-11-14 08:42:26'),
(437, 'Madua Norte', 22, 0, '2018-11-14 08:42:26'),
(438, 'Madua Sur', 22, 0, '2018-11-14 08:42:26'),
(439, 'Mambool', 22, 0, '2018-11-14 08:42:26'),
(440, 'Mawi', 22, 0, '2018-11-14 08:42:26'),
(441, 'Payao', 22, 0, '2018-11-14 08:42:26'),
(442, 'San Antonio', 22, 0, '2018-11-14 08:42:26'),
(443, 'San Isidro', 22, 0, '2018-11-14 08:42:26'),
(444, 'San Pedro', 22, 0, '2018-11-14 08:42:26'),
(445, 'Taytay', 22, 0, '2018-11-14 08:42:26'),
(446, 'Abijilan', 23, 0, '2018-11-14 08:42:26'),
(447, 'Antipolo', 23, 0, '2018-11-14 08:42:26'),
(448, 'Basiao', 23, 0, '2018-11-14 08:42:26'),
(449, 'Cagwang', 23, 0, '2018-11-14 08:42:26'),
(450, 'Calma', 23, 0, '2018-11-14 08:42:26'),
(451, 'Cambuyo', 23, 0, '2018-11-14 08:42:26'),
(452, 'Canayon East', 23, 0, '2018-11-14 08:42:26'),
(453, 'Canayon West', 23, 0, '2018-11-14 08:42:26'),
(454, 'Candanas', 23, 0, '2018-11-14 08:42:26'),
(455, 'Candulao', 23, 0, '2018-11-14 08:42:26'),
(456, 'Catmon', 23, 0, '2018-11-14 08:42:26'),
(457, 'Cayam', 23, 0, '2018-11-14 08:42:26'),
(458, 'Cupa', 23, 0, '2018-11-14 08:42:26'),
(459, 'Datag', 23, 0, '2018-11-14 08:42:26'),
(460, 'Estaca', 23, 0, '2018-11-14 08:42:26'),
(461, 'Libertad', 23, 0, '2018-11-14 08:42:26'),
(462, 'Lungsodaan East', 23, 0, '2018-11-14 08:42:26'),
(463, 'Lungsodaan West', 23, 0, '2018-11-14 08:42:26'),
(464, 'Malinao', 23, 0, '2018-11-14 08:42:26'),
(465, 'Manaba', 23, 0, '2018-11-14 08:42:26'),
(466, 'Pasong', 23, 0, '2018-11-14 08:42:26'),
(467, 'Poblacion East', 23, 0, '2018-11-14 08:42:26'),
(468, 'Poblacion West', 23, 0, '2018-11-14 08:42:26'),
(469, 'Sacaon', 23, 0, '2018-11-14 08:42:26'),
(470, 'Sampong', 23, 0, '2018-11-14 08:42:26'),
(471, 'Tabuan', 23, 0, '2018-11-14 08:42:26'),
(472, 'Togbongon', 23, 0, '2018-11-14 08:42:26'),
(473, 'Ulbujan East', 23, 0, '2018-11-14 08:42:26'),
(474, 'Ulbujan West', 23, 0, '2018-11-14 08:42:26'),
(475, 'Victoria', 23, 0, '2018-11-14 08:42:26'),
(476, 'Alumar', 24, 0, '2018-11-14 08:42:26'),
(477, 'Banacon', 24, 0, '2018-11-14 08:42:26'),
(478, 'Buyog', 24, 0, '2018-11-14 08:42:26'),
(479, 'Cabasakan', 24, 0, '2018-11-14 08:42:26'),
(480, 'Campao Occidental', 24, 0, '2018-11-14 08:42:26'),
(481, 'Campao Oriental', 24, 0, '2018-11-14 08:42:26'),
(482, 'Cangmundo', 24, 0, '2018-11-14 08:42:26'),
(483, 'Carlos P. Garcia', 24, 0, '2018-11-14 08:42:26'),
(484, 'Corte Baud', 24, 0, '2018-11-14 08:42:26'),
(485, 'Handumon', 24, 0, '2018-11-14 08:42:26'),
(486, 'Jagoliao', 24, 0, '2018-11-14 08:42:26'),
(487, 'Jandayan Norte', 24, 0, '2018-11-14 08:42:26'),
(488, 'Jandayan Sur', 24, 0, '2018-11-14 08:42:26'),
(489, 'Mahanay Island', 24, 0, '2018-11-14 08:42:26'),
(490, 'Nasingin', 24, 0, '2018-11-14 08:42:26'),
(491, 'Pandahon', 24, 0, '2018-11-14 08:42:26'),
(492, 'Poblacion', 24, 0, '2018-11-14 08:42:26'),
(493, 'Saguise', 24, 0, '2018-11-14 08:42:26'),
(494, 'Salog', 24, 0, '2018-11-14 08:42:26'),
(495, 'San Jose', 24, 0, '2018-11-14 08:42:26'),
(496, 'Santo Niño', 24, 0, '2018-11-14 08:42:26'),
(497, 'Taytay', 24, 0, '2018-11-14 08:42:26'),
(498, 'Tugas', 24, 0, '2018-11-14 08:42:26'),
(499, 'Tulang', 24, 0, '2018-11-14 08:42:26'),
(500, 'Basdio', 25, 0, '2018-11-14 08:42:26'),
(501, 'Bato', 25, 0, '2018-11-14 08:42:26'),
(502, 'Bayong', 25, 0, '2018-11-14 08:42:26'),
(503, 'Biabas', 25, 0, '2018-11-14 08:42:26'),
(504, 'Bulawan', 25, 0, '2018-11-14 08:42:26'),
(505, 'Cabantian', 25, 0, '2018-11-14 08:42:26'),
(506, 'Canhaway', 25, 0, '2018-11-14 08:42:26'),
(507, 'Cansiwang', 25, 0, '2018-11-14 08:42:26'),
(508, 'Casbu', 25, 0, '2018-11-14 08:42:26'),
(509, 'Catungawan Norte', 25, 0, '2018-11-14 08:42:26'),
(510, 'Catungawan Sur', 25, 0, '2018-11-14 08:42:26'),
(511, 'Guinacot', 25, 0, '2018-11-14 08:42:26'),
(512, 'Guio-ang', 25, 0, '2018-11-14 08:42:26'),
(513, 'Lombog', 25, 0, '2018-11-14 08:42:26'),
(514, 'Mayuga', 25, 0, '2018-11-14 08:42:26'),
(515, 'Sawang', 25, 0, '2018-11-14 08:42:26'),
(516, 'Tabajan', 25, 0, '2018-11-14 08:42:26'),
(517, 'Tabunok', 25, 0, '2018-11-14 08:42:26'),
(518, 'Trinidad', 25, 0, '2018-11-14 08:42:26'),
(519, 'Anonang', 26, 0, '2018-11-14 08:42:26'),
(520, 'Badiang', 26, 0, '2018-11-14 08:42:26'),
(521, 'Baguhan', 26, 0, '2018-11-14 08:42:26'),
(522, 'Bahan', 26, 0, '2018-11-14 08:42:26'),
(523, 'Banahao', 26, 0, '2018-11-14 08:42:26'),
(524, 'Baogo', 26, 0, '2018-11-14 08:42:26'),
(525, 'Bugang', 26, 0, '2018-11-14 08:42:26'),
(526, 'Cagawasan', 26, 0, '2018-11-14 08:42:26'),
(527, 'Cagayan', 26, 0, '2018-11-14 08:42:26'),
(528, 'Cambitoon', 26, 0, '2018-11-14 08:42:26'),
(529, 'Canlinte', 26, 0, '2018-11-14 08:42:26'),
(530, 'Cawayan', 26, 0, '2018-11-14 08:42:26'),
(531, 'Cogon', 26, 0, '2018-11-14 08:42:26'),
(532, 'Cuaming', 26, 0, '2018-11-14 08:42:26'),
(533, 'Dagnawan', 26, 0, '2018-11-14 08:42:26'),
(534, 'Dagohoy', 26, 0, '2018-11-14 08:42:26'),
(535, 'Dait Sur', 26, 0, '2018-11-14 08:42:26'),
(536, 'Datag', 26, 0, '2018-11-14 08:42:26'),
(537, 'Fatima', 26, 0, '2018-11-14 08:42:26'),
(538, 'Hambongan', 26, 0, '2018-11-14 08:42:26'),
(539, 'Ilaud', 26, 0, '2018-11-14 08:42:26'),
(540, 'Ilaya', 26, 0, '2018-11-14 08:42:26'),
(541, 'Ilihan', 26, 0, '2018-11-14 08:42:26'),
(542, 'Lapacan Norte', 26, 0, '2018-11-14 08:42:26'),
(543, 'Lapacan Sur', 26, 0, '2018-11-14 08:42:26'),
(544, 'Lawis', 26, 0, '2018-11-14 08:42:26'),
(545, 'Liloan Norte', 26, 0, '2018-11-14 08:42:26'),
(546, 'Liloan Sur', 26, 0, '2018-11-14 08:42:26'),
(547, 'Lomboy', 26, 0, '2018-11-14 08:42:26'),
(548, 'Lonoy Cainisican', 26, 0, '2018-11-14 08:42:26'),
(549, 'Lonoy Roma', 26, 0, '2018-11-14 08:42:26'),
(550, 'Lutao', 26, 0, '2018-11-14 08:42:26'),
(551, 'Luyo', 26, 0, '2018-11-14 08:42:26'),
(552, 'Mabuhay', 26, 0, '2018-11-14 08:42:26'),
(553, 'Maria Rosario', 26, 0, '2018-11-14 08:42:26'),
(554, 'Nabuad', 26, 0, '2018-11-14 08:42:26'),
(555, 'Napo', 26, 0, '2018-11-14 08:42:26'),
(556, 'Ondol', 26, 0, '2018-11-14 08:42:26'),
(557, 'Poblacion', 26, 0, '2018-11-14 08:42:26'),
(558, 'Riverside', 26, 0, '2018-11-14 08:42:26'),
(559, 'Saa', 26, 0, '2018-11-14 08:42:26'),
(560, 'San Isidro', 26, 0, '2018-11-14 08:42:26'),
(561, 'San Jose', 26, 0, '2018-11-14 08:42:26'),
(562, 'Santo Niño', 26, 0, '2018-11-14 08:42:26'),
(563, 'Santo Rosario', 26, 0, '2018-11-14 08:42:26'),
(564, 'Sua', 26, 0, '2018-11-14 08:42:26'),
(565, 'Tambook', 26, 0, '2018-11-14 08:42:26'),
(566, 'Tungod', 26, 0, '2018-11-14 08:42:26'),
(567, 'Ubujan', 26, 0, '2018-11-14 08:42:26'),
(568, 'U-og', 26, 0, '2018-11-14 08:42:26'),
(569, 'Alejawan', 27, 0, '2018-11-14 08:42:26'),
(570, 'Balili', 27, 0, '2018-11-14 08:42:26'),
(571, 'Boctol', 27, 0, '2018-11-14 08:42:26'),
(572, 'Bunga Ilaya', 27, 0, '2018-11-14 08:42:26'),
(573, 'Bunga Mar', 27, 0, '2018-11-14 08:42:26'),
(574, 'Buyog', 27, 0, '2018-11-14 08:42:26'),
(575, 'Cabunga-an', 27, 0, '2018-11-14 08:42:26'),
(576, 'Calabacita', 27, 0, '2018-11-14 08:42:26'),
(577, 'Cambugason', 27, 0, '2018-11-14 08:42:26'),
(578, 'Can-ipol', 27, 0, '2018-11-14 08:42:26'),
(579, 'Canjulao', 27, 0, '2018-11-14 08:42:26'),
(580, 'Cantagay', 27, 0, '2018-11-14 08:42:26'),
(581, 'Cantuyoc', 27, 0, '2018-11-14 08:42:26'),
(582, 'Can-uba', 27, 0, '2018-11-14 08:42:26'),
(583, 'Can-upao', 27, 0, '2018-11-14 08:42:26'),
(584, 'Faraon', 27, 0, '2018-11-14 08:42:26'),
(585, 'Ipil', 27, 0, '2018-11-14 08:42:26'),
(586, 'Kinagbaan', 27, 0, '2018-11-14 08:42:26'),
(587, 'Laca', 27, 0, '2018-11-14 08:42:26'),
(588, 'Larapan', 27, 0, '2018-11-14 08:42:26'),
(589, 'Lonoy', 27, 0, '2018-11-14 08:42:26'),
(590, 'Looc', 27, 0, '2018-11-14 08:42:26'),
(591, 'Malbog', 27, 0, '2018-11-14 08:42:26'),
(592, 'Mayana', 27, 0, '2018-11-14 08:42:26'),
(593, 'Naatang', 27, 0, '2018-11-14 08:42:26'),
(594, 'Nausok', 27, 0, '2018-11-14 08:42:26'),
(595, 'Odiong', 27, 0, '2018-11-14 08:42:26'),
(596, 'Pagina', 27, 0, '2018-11-14 08:42:26'),
(597, 'Pangdan', 27, 0, '2018-11-14 08:42:26'),
(598, 'Poblacion (Pondol)', 27, 0, '2018-11-14 08:42:26'),
(599, 'Tejero', 27, 0, '2018-11-14 08:42:26'),
(600, 'Tubod Mar', 27, 0, '2018-11-14 08:42:26'),
(601, 'Tubod Monte', 27, 0, '2018-11-14 08:42:26'),
(602, 'Banban', 28, 0, '2018-11-14 08:42:26'),
(603, 'Bonkokan Ilaya', 28, 0, '2018-11-14 08:42:26'),
(604, 'Bonkokan Ubos', 28, 0, '2018-11-14 08:42:26'),
(605, 'Calvario', 28, 0, '2018-11-14 08:42:26'),
(606, 'Candulang', 28, 0, '2018-11-14 08:42:26'),
(607, 'Catugasan', 28, 0, '2018-11-14 08:42:26'),
(608, 'Cayupo', 28, 0, '2018-11-14 08:42:26'),
(609, 'Cogon', 28, 0, '2018-11-14 08:42:26'),
(610, 'Jambawan', 28, 0, '2018-11-14 08:42:26'),
(611, 'La Fortuna', 28, 0, '2018-11-14 08:42:26'),
(612, 'Lomanoy', 28, 0, '2018-11-14 08:42:26'),
(613, 'Macalingan', 28, 0, '2018-11-14 08:42:26'),
(614, 'Malinao East', 28, 0, '2018-11-14 08:42:26'),
(615, 'Malinao West', 28, 0, '2018-11-14 08:42:26'),
(616, 'Nagsulay', 28, 0, '2018-11-14 08:42:26'),
(617, 'Poblacion', 28, 0, '2018-11-14 08:42:26'),
(618, 'Taug', 28, 0, '2018-11-14 08:42:26'),
(619, 'Tiguis', 28, 0, '2018-11-14 08:42:26'),
(620, 'Agape', 29, 0, '2018-11-14 08:42:26'),
(621, 'Alegria Norte', 29, 0, '2018-11-14 08:42:26'),
(622, 'Alegria Sur', 29, 0, '2018-11-14 08:42:26'),
(623, 'Bonbon', 29, 0, '2018-11-14 08:42:26'),
(624, 'Botoc Occidental', 29, 0, '2018-11-14 08:42:26'),
(625, 'Botoc Oriental', 29, 0, '2018-11-14 08:42:26'),
(626, 'Calvario', 29, 0, '2018-11-14 08:42:26'),
(627, 'Concepcion', 29, 0, '2018-11-14 08:42:26'),
(628, 'Hinawanan', 29, 0, '2018-11-14 08:42:26'),
(629, 'Las Salinas Norte', 29, 0, '2018-11-14 08:42:26'),
(630, 'Las Salinas Sur', 29, 0, '2018-11-14 08:42:26'),
(631, 'Palo', 29, 0, '2018-11-14 08:42:26'),
(632, 'Poblacion Ibabao', 29, 0, '2018-11-14 08:42:26'),
(633, 'Poblacion Ubos', 29, 0, '2018-11-14 08:42:26'),
(634, 'Sagnap', 29, 0, '2018-11-14 08:42:26'),
(635, 'Tambangan', 29, 0, '2018-11-14 08:42:26'),
(636, 'Tangcasan Norte', 29, 0, '2018-11-14 08:42:26'),
(637, 'Tangcasan Sur', 29, 0, '2018-11-14 08:42:26'),
(638, 'Tayong Occidental', 29, 0, '2018-11-14 08:42:26'),
(639, 'Tayong Oriental', 29, 0, '2018-11-14 08:42:26'),
(640, 'Tocdog Dacu', 29, 0, '2018-11-14 08:42:26'),
(641, 'Tocdog Ilaya', 29, 0, '2018-11-14 08:42:26'),
(642, 'Villalimpia', 29, 0, '2018-11-14 08:42:26'),
(643, 'Yanangan', 29, 0, '2018-11-14 08:42:26'),
(644, 'Agape', 30, 0, '2018-11-14 08:42:26'),
(645, 'Alegria', 30, 0, '2018-11-14 08:42:26'),
(646, 'Bagumbayan', 30, 0, '2018-11-14 08:42:26'),
(647, 'Bahian', 30, 0, '2018-11-14 08:42:26'),
(648, 'Bonbon Lower', 30, 0, '2018-11-14 08:42:26'),
(649, 'Bonbon Upper', 30, 0, '2018-11-14 08:42:26'),
(650, 'Buenavista', 30, 0, '2018-11-14 08:42:26'),
(651, 'Bugho', 30, 0, '2018-11-14 08:42:26'),
(652, 'Cabadiangan', 30, 0, '2018-11-14 08:42:26'),
(653, 'Calunasan Norte', 30, 0, '2018-11-14 08:42:26'),
(654, 'Calunasan Sur', 30, 0, '2018-11-14 08:42:26'),
(655, 'Camayaan', 30, 0, '2018-11-14 08:42:26'),
(656, 'Cambance', 30, 0, '2018-11-14 08:42:26'),
(657, 'Candabong', 30, 0, '2018-11-14 08:42:26'),
(658, 'Candasag', 30, 0, '2018-11-14 08:42:26'),
(659, 'Canlasid', 30, 0, '2018-11-14 08:42:26'),
(660, 'Gon-ob', 30, 0, '2018-11-14 08:42:26'),
(661, 'Gotozon', 30, 0, '2018-11-14 08:42:26'),
(662, 'Jimilian', 30, 0, '2018-11-14 08:42:26'),
(663, 'Oy', 30, 0, '2018-11-14 08:42:26'),
(664, 'Poblacion Ondol', 30, 0, '2018-11-14 08:42:26'),
(665, 'Poblacion Sawang', 30, 0, '2018-11-14 08:42:26'),
(666, 'Quinoguitan', 30, 0, '2018-11-14 08:42:26'),
(667, 'Taytay', 30, 0, '2018-11-14 08:42:26'),
(668, 'Tigbao', 30, 0, '2018-11-14 08:42:26'),
(669, 'Ugpong', 30, 0, '2018-11-14 08:42:26'),
(670, 'Valladolid', 30, 0, '2018-11-14 08:42:26'),
(671, 'Villaflor', 30, 0, '2018-11-14 08:42:26'),
(672, 'Badbad Occidental', 31, 0, '2018-11-14 08:42:26'),
(673, 'Badbad Oriental', 31, 0, '2018-11-14 08:42:26'),
(674, 'Basdacu', 31, 0, '2018-11-14 08:42:26'),
(675, 'Basdio', 31, 0, '2018-11-14 08:42:26'),
(676, 'Biasong', 31, 0, '2018-11-14 08:42:26'),
(677, 'Bongco', 31, 0, '2018-11-14 08:42:26'),
(678, 'Bugho', 31, 0, '2018-11-14 08:42:26'),
(679, 'Cabacongan', 31, 0, '2018-11-14 08:42:26'),
(680, 'Cabadug', 31, 0, '2018-11-14 08:42:26'),
(681, 'Cabug', 31, 0, '2018-11-14 08:42:26'),
(682, 'Calayugan Norte', 31, 0, '2018-11-14 08:42:26'),
(683, 'Calayugan Sur', 31, 0, '2018-11-14 08:42:26'),
(684, 'Cambaquiz', 31, 0, '2018-11-14 08:42:26'),
(685, 'Campatud', 31, 0, '2018-11-14 08:42:26'),
(686, 'Candaigan', 31, 0, '2018-11-14 08:42:26'),
(687, 'Canhangdon Occidental', 31, 0, '2018-11-14 08:42:26'),
(688, 'Canhangdon Oriental', 31, 0, '2018-11-14 08:42:26'),
(689, 'Canigaan', 31, 0, '2018-11-14 08:42:26'),
(690, 'Canmaag', 31, 0, '2018-11-14 08:42:26'),
(691, 'Canmanoc', 31, 0, '2018-11-14 08:42:26'),
(692, 'Cansuagwit', 31, 0, '2018-11-14 08:42:26'),
(693, 'Cansubayon', 31, 0, '2018-11-14 08:42:26'),
(694, 'Cantam-is Bago', 31, 0, '2018-11-14 08:42:26'),
(695, 'Cantam-is Baslay', 31, 0, '2018-11-14 08:42:26'),
(696, 'Cantaongon', 31, 0, '2018-11-14 08:42:26'),
(697, 'Cantumocad', 31, 0, '2018-11-14 08:42:26'),
(698, 'Catagbacan Handig', 31, 0, '2018-11-14 08:42:26'),
(699, 'Catagbacan Norte', 31, 0, '2018-11-14 08:42:26'),
(700, 'Catagbacan Sur', 31, 0, '2018-11-14 08:42:26'),
(701, 'Cogon Norte', 31, 0, '2018-11-14 08:42:26'),
(702, 'Cogon Sur', 31, 0, '2018-11-14 08:42:26'),
(703, 'Cuasi', 31, 0, '2018-11-14 08:42:26'),
(704, 'Genomoan', 31, 0, '2018-11-14 08:42:26'),
(705, 'Lintuan', 31, 0, '2018-11-14 08:42:26'),
(706, 'Looc', 31, 0, '2018-11-14 08:42:26'),
(707, 'Mocpoc Norte', 31, 0, '2018-11-14 08:42:26'),
(708, 'Mocpoc Sur', 31, 0, '2018-11-14 08:42:26'),
(709, 'Moto Norte', 31, 0, '2018-11-14 08:42:26'),
(710, 'Moto Sur', 31, 0, '2018-11-14 08:42:26'),
(711, 'Nagtuang', 31, 0, '2018-11-14 08:42:26'),
(712, 'Napo', 31, 0, '2018-11-14 08:42:26'),
(713, 'Nueva Vida', 31, 0, '2018-11-14 08:42:26'),
(714, 'Panangquilon', 31, 0, '2018-11-14 08:42:26'),
(715, 'Pantudlan', 31, 0, '2018-11-14 08:42:26'),
(716, 'Pig-ot', 31, 0, '2018-11-14 08:42:26'),
(717, 'Pondol', 31, 0, '2018-11-14 08:42:26'),
(718, 'Quinobcoban', 31, 0, '2018-11-14 08:42:26'),
(719, 'Sondol', 31, 0, '2018-11-14 08:42:26'),
(720, 'Song-on', 31, 0, '2018-11-14 08:42:26'),
(721, 'Talisay', 31, 0, '2018-11-14 08:42:26'),
(722, 'Tan-awan', 31, 0, '2018-11-14 08:42:26'),
(723, 'Tangnan', 31, 0, '2018-11-14 08:42:26'),
(724, 'Taytay', 31, 0, '2018-11-14 08:42:26'),
(725, 'Ticugan', 31, 0, '2018-11-14 08:42:26'),
(726, 'Tiwi', 31, 0, '2018-11-14 08:42:26'),
(727, 'Tontonan', 31, 0, '2018-11-14 08:42:26'),
(728, 'Tubodacu', 31, 0, '2018-11-14 08:42:26'),
(729, 'Tubodio', 31, 0, '2018-11-14 08:42:26'),
(730, 'Tubuan', 31, 0, '2018-11-14 08:42:26'),
(731, 'Ubayon', 31, 0, '2018-11-14 08:42:26'),
(732, 'Ubojan', 31, 0, '2018-11-14 08:42:26'),
(733, 'Abaca', 32, 0, '2018-11-14 08:42:26'),
(734, 'Abad Santos', 32, 0, '2018-11-14 08:42:26'),
(735, 'Aguipo', 32, 0, '2018-11-14 08:42:26'),
(736, 'Baybayon', 32, 0, '2018-11-14 08:42:26'),
(737, 'Bulawan', 32, 0, '2018-11-14 08:42:26'),
(738, 'Cabidian', 32, 0, '2018-11-14 08:42:26'),
(739, 'Cawayanan', 32, 0, '2018-11-14 08:42:26'),
(740, 'Concepcion (Banlas)', 32, 0, '2018-11-14 08:42:26'),
(741, 'Del Mar', 32, 0, '2018-11-14 08:42:26'),
(742, 'Lungsoda-an', 32, 0, '2018-11-14 08:42:26'),
(743, 'Marcelo', 32, 0, '2018-11-14 08:42:26'),
(744, 'Minol', 32, 0, '2018-11-14 08:42:26'),
(745, 'Paraiso', 32, 0, '2018-11-14 08:42:26'),
(746, 'Poblacion I', 32, 0, '2018-11-14 08:42:26'),
(747, 'Poblacion II', 32, 0, '2018-11-14 08:42:26'),
(748, 'San Isidro', 32, 0, '2018-11-14 08:42:26'),
(749, 'San Jose', 32, 0, '2018-11-14 08:42:26'),
(750, 'San Rafael', 32, 0, '2018-11-14 08:42:26'),
(751, 'San Roque (Cabulao)', 32, 0, '2018-11-14 08:42:26'),
(752, 'Tambo', 32, 0, '2018-11-14 08:42:26'),
(753, 'Tangkigan', 32, 0, '2018-11-14 08:42:26'),
(754, 'Valaga', 32, 0, '2018-11-14 08:42:26'),
(755, 'Agahay', 33, 0, '2018-11-14 08:42:26'),
(756, 'Aliguay', 33, 0, '2018-11-14 08:42:26'),
(757, 'Anislag', 33, 0, '2018-11-14 08:42:26'),
(758, 'Bayacabac', 33, 0, '2018-11-14 08:42:26'),
(759, 'Bood', 33, 0, '2018-11-14 08:42:26'),
(760, 'Busao', 33, 0, '2018-11-14 08:42:26'),
(761, 'Cabawan', 33, 0, '2018-11-14 08:42:26'),
(762, 'Candavid', 33, 0, '2018-11-14 08:42:26'),
(763, 'Dipatlong', 33, 0, '2018-11-14 08:42:26'),
(764, 'Guiwanon', 33, 0, '2018-11-14 08:42:26'),
(765, 'Jandig', 33, 0, '2018-11-14 08:42:26'),
(766, 'Lagtangon', 33, 0, '2018-11-14 08:42:26'),
(767, 'Lincod', 33, 0, '2018-11-14 08:42:26'),
(768, 'Pagnitoan', 33, 0, '2018-11-14 08:42:26'),
(769, 'Poblacion', 33, 0, '2018-11-14 08:42:26'),
(770, 'Punsod', 33, 0, '2018-11-14 08:42:26'),
(771, 'Punta Cruz', 33, 0, '2018-11-14 08:42:26'),
(772, 'San Isidro', 33, 0, '2018-11-14 08:42:26'),
(773, 'San Roque (Aghao)', 33, 0, '2018-11-14 08:42:26'),
(774, 'San Vicente', 33, 0, '2018-11-14 08:42:26'),
(775, 'Tinibgan', 33, 0, '2018-11-14 08:42:26'),
(776, 'Toril', 33, 0, '2018-11-14 08:42:26'),
(777, 'Bil-isan', 34, 0, '2018-11-14 08:42:26'),
(778, 'Bolod', 34, 0, '2018-11-14 08:42:26'),
(779, 'Danao', 34, 0, '2018-11-14 08:42:26'),
(780, 'Doljo', 34, 0, '2018-11-14 08:42:26'),
(781, 'Libaong', 34, 0, '2018-11-14 08:42:26'),
(782, 'Looc', 34, 0, '2018-11-14 08:42:26'),
(783, 'Lourdes', 34, 0, '2018-11-14 08:42:26'),
(784, 'Poblacion', 34, 0, '2018-11-14 08:42:26'),
(785, 'Tangnan', 34, 0, '2018-11-14 08:42:26'),
(786, 'Tawala', 34, 0, '2018-11-14 08:42:26'),
(787, 'Aurora', 35, 1, '2018-11-14 08:53:54'),
(788, 'Bagacay', 35, 1, '2018-11-14 08:53:54'),
(789, 'Bagumbayan', 35, 1, '2018-11-14 08:53:54'),
(790, 'Bayong', 35, 1, '2018-11-14 08:53:54'),
(791, 'Buenasuerte', 35, 1, '2018-11-14 08:53:54'),
(792, 'Cagawasan', 35, 1, '2018-11-14 08:53:54'),
(793, 'Cansungay', 35, 1, '2018-11-14 08:53:55'),
(794, 'Catagda-an', 35, 1, '2018-11-14 08:53:55'),
(795, 'Del Pilar', 35, 1, '2018-11-14 08:53:55'),
(796, 'Estaca', 35, 1, '2018-11-14 08:53:55'),
(797, 'Ilaud', 35, 0, '2018-11-14 08:42:26'),
(798, 'Inaghuban', 35, 1, '2018-11-14 08:53:55'),
(799, 'La Suerte', 35, 0, '2018-11-14 08:42:26'),
(800, 'Lumbay', 35, 0, '2018-11-14 08:42:26'),
(801, 'Lundag', 35, 0, '2018-11-14 08:42:26'),
(802, 'Pamacsalan', 35, 0, '2018-11-14 08:42:26'),
(803, 'Poblacion', 35, 0, '2018-11-14 08:42:26'),
(804, 'Rizal', 35, 0, '2018-11-14 08:42:26'),
(805, 'San Carlos', 35, 0, '2018-11-14 08:42:26'),
(806, 'San Isidro', 35, 0, '2018-11-14 08:42:26'),
(807, 'San Vicente', 35, 1, '2018-11-14 08:53:55'),
(808, 'Aguining', 36, 0, '2018-11-14 08:42:26'),
(809, 'Basiao', 36, 0, '2018-11-14 08:42:26'),
(810, 'Baud', 36, 0, '2018-11-14 08:42:26'),
(811, 'Bayog', 36, 0, '2018-11-14 08:42:26'),
(812, 'Bogo', 36, 0, '2018-11-14 08:42:26'),
(813, 'Bonbonon', 36, 0, '2018-11-14 08:42:26'),
(814, 'Butan', 36, 0, '2018-11-14 08:42:26'),
(815, 'Campamanog', 36, 0, '2018-11-14 08:42:26'),
(816, 'Canmangao', 36, 0, '2018-11-14 08:42:26'),
(817, 'Gaus', 36, 0, '2018-11-14 08:42:26'),
(818, 'Kabangkalan', 36, 0, '2018-11-14 08:42:26'),
(819, 'Lapinig', 36, 0, '2018-11-14 08:42:26'),
(820, 'Lipata', 36, 0, '2018-11-14 08:42:26'),
(821, 'Poblacion', 36, 0, '2018-11-14 08:42:26'),
(822, 'Popoo', 36, 0, '2018-11-14 08:42:26'),
(823, 'Saguise', 36, 0, '2018-11-14 08:42:26'),
(824, 'San Jose', 36, 0, '2018-11-14 08:42:26'),
(825, 'San Vicente', 36, 0, '2018-11-14 08:42:26'),
(826, 'Santo Rosario', 36, 0, '2018-11-14 08:42:26'),
(827, 'Tilmobo', 36, 0, '2018-11-14 08:42:26'),
(828, 'Tugas', 36, 0, '2018-11-14 08:42:26'),
(829, 'Tugnao', 36, 0, '2018-11-14 08:42:26'),
(830, 'Villa Milagrosa', 36, 0, '2018-11-14 08:42:26'),
(831, 'Calangahan', 37, 0, '2018-11-14 08:42:26'),
(832, 'Canmao', 37, 0, '2018-11-14 08:42:26'),
(833, 'Canmaya Centro', 37, 0, '2018-11-14 08:42:26'),
(834, 'Canmaya Diot', 37, 0, '2018-11-14 08:42:26'),
(835, 'Dagnawan', 37, 0, '2018-11-14 08:42:26'),
(836, 'kabasacan', 37, 0, '2018-11-14 08:42:26'),
(837, 'Kagawasan', 37, 0, '2018-11-14 08:42:26'),
(838, 'Katipunan', 37, 0, '2018-11-14 08:42:26'),
(839, 'Langtad', 37, 0, '2018-11-14 08:42:26'),
(840, 'Libertad Norte', 37, 0, '2018-11-14 08:42:26'),
(841, 'Libertad Sur', 37, 0, '2018-11-14 08:42:26'),
(842, 'Mantalongon', 37, 0, '2018-11-14 08:42:26'),
(843, 'Poblacion', 37, 0, '2018-11-14 08:42:26'),
(844, 'Sagbayan Sur', 37, 0, '2018-11-14 08:42:26'),
(845, 'San Agustin', 37, 0, '2018-11-14 08:42:26'),
(846, 'San Antonio', 37, 0, '2018-11-14 08:42:26'),
(847, 'San Isidro', 37, 0, '2018-11-14 08:42:26'),
(848, 'San Ramon', 37, 0, '2018-11-14 08:42:26'),
(849, 'San Roque', 37, 0, '2018-11-14 08:42:26'),
(850, 'San Vicente Norte', 37, 0, '2018-11-14 08:42:26'),
(851, 'San Vicente Sur', 37, 0, '2018-11-14 08:42:26'),
(852, 'Santa Catalina', 37, 0, '2018-11-14 08:42:26'),
(853, 'Santa Cruz', 37, 0, '2018-11-14 08:42:26'),
(854, 'Ubojan', 37, 0, '2018-11-14 08:42:26'),
(855, 'Abehilan', 38, 0, '2018-11-14 08:42:26'),
(856, 'Baryong Daan', 38, 0, '2018-11-14 08:42:26'),
(857, 'Baunos', 38, 0, '2018-11-14 08:42:26'),
(858, 'Cabanugan', 38, 0, '2018-11-14 08:42:26'),
(859, 'Caimbang', 38, 0, '2018-11-14 08:42:26'),
(860, 'Cambansag', 38, 0, '2018-11-14 08:42:26'),
(861, 'Candungao', 38, 0, '2018-11-14 08:42:26'),
(862, 'Cansauge Norte', 38, 0, '2018-11-14 08:42:26'),
(863, 'Cansague Sur', 38, 0, '2018-11-14 08:42:26'),
(864, 'Causwagan Sur', 38, 0, '2018-11-14 08:42:26'),
(865, 'Masonoy', 38, 0, '2018-11-14 08:42:26'),
(866, 'Poblacion', 38, 0, '2018-11-14 08:42:26'),
(867, 'Bayongan', 39, 0, '2018-11-14 08:42:26'),
(868, 'Bugang', 39, 0, '2018-11-14 08:42:26'),
(869, 'Cabangahan', 39, 0, '2018-11-14 08:42:26'),
(870, 'Caluasan', 39, 0, '2018-11-14 08:42:26'),
(871, 'Camanaga', 39, 0, '2018-11-14 08:42:26'),
(872, 'Cambangay Norte', 39, 0, '2018-11-14 08:42:26'),
(873, 'Capayas', 39, 0, '2018-11-14 08:42:26'),
(874, 'Corazon', 39, 0, '2018-11-14 08:42:26'),
(875, 'Garcia', 39, 0, '2018-11-14 08:42:26'),
(876, 'Hagbuyo', 39, 0, '2018-11-14 08:42:26'),
(877, 'Kagawasan', 39, 0, '2018-11-14 08:42:26'),
(878, 'Mahayag', 39, 0, '2018-11-14 08:42:26'),
(879, 'Poblacion', 39, 0, '2018-11-14 08:42:26'),
(880, 'San Isidro', 39, 0, '2018-11-14 08:42:26'),
(881, 'San Jose', 39, 0, '2018-11-14 08:42:26'),
(882, 'San Vicente', 39, 0, '2018-11-14 08:42:26'),
(883, 'Santo Niño', 39, 0, '2018-11-14 08:42:26'),
(884, 'Tomoc', 39, 0, '2018-11-14 08:42:26'),
(885, 'Bayawahan', 40, 0, '2018-11-14 08:42:26'),
(886, 'Cabancalan', 40, 0, '2018-11-14 08:42:26'),
(887, 'Calinga-an', 40, 0, '2018-11-14 08:42:26'),
(888, 'Calinginan Norte', 40, 0, '2018-11-14 08:42:26'),
(889, 'Calinginan Sur', 40, 0, '2018-11-14 08:42:26'),
(890, 'Cambagui', 40, 0, '2018-11-14 08:42:26'),
(891, 'Ewon', 40, 0, '2018-11-14 08:42:26'),
(892, 'Guinob-an', 40, 0, '2018-11-14 08:42:26'),
(893, 'Lagtangan', 40, 0, '2018-11-14 08:42:26'),
(894, 'Licolico', 40, 0, '2018-11-14 08:42:26'),
(895, 'Lobgob', 40, 0, '2018-11-14 08:42:26'),
(896, 'Magsaysay', 40, 0, '2018-11-14 08:42:26'),
(897, 'Poblacion', 40, 0, '2018-11-14 08:42:26'),
(898, 'Abachanan', 41, 0, '2018-11-14 08:42:26'),
(899, 'Anibongan', 41, 0, '2018-11-14 08:42:26'),
(900, 'Bugsoc', 41, 0, '2018-11-14 08:42:26'),
(901, 'Cahayag', 41, 0, '2018-11-14 08:42:26'),
(902, 'Canlangit', 41, 0, '2018-11-14 08:42:26'),
(903, 'Canta-ub', 41, 0, '2018-11-14 08:42:26'),
(904, 'Casilay', 41, 0, '2018-11-14 08:42:26'),
(905, 'Danicop', 41, 0, '2018-11-14 08:42:26'),
(906, 'Dusita', 41, 0, '2018-11-14 08:42:26'),
(907, 'La Union', 41, 0, '2018-11-14 08:42:26'),
(908, 'Lataban', 41, 0, '2018-11-14 08:42:26'),
(909, 'Magsaysay', 41, 0, '2018-11-14 08:42:26'),
(910, 'Man-od', 41, 0, '2018-11-14 08:42:26'),
(911, 'Matin-ao', 41, 0, '2018-11-14 08:42:26'),
(912, 'Poblacion', 41, 0, '2018-11-14 08:42:26'),
(913, 'Salvador', 41, 0, '2018-11-14 08:42:26'),
(914, 'San Agustin', 41, 0, '2018-11-14 08:42:26'),
(915, 'San Isidro', 41, 0, '2018-11-14 08:42:26'),
(916, 'San Jose', 41, 0, '2018-11-14 08:42:26'),
(917, 'San Juan', 41, 0, '2018-11-14 08:42:26'),
(918, 'Santa Cruz', 41, 0, '2018-11-14 08:42:26'),
(919, 'Villa Garcia', 41, 0, '2018-11-14 08:42:26'),
(920, 'Abucay Norte', 42, 0, '2018-11-14 08:42:26'),
(921, 'Abucay Sur', 42, 0, '2018-11-14 08:42:26'),
(922, 'Badiang', 42, 0, '2018-11-14 08:42:26'),
(923, 'Bahaybahay', 42, 0, '2018-11-14 08:42:26'),
(924, 'Cambuac Norte', 42, 0, '2018-11-14 08:42:26'),
(925, 'Cambuac Sur', 42, 0, '2018-11-14 08:42:26'),
(926, 'Canagong', 42, 0, '2018-11-14 08:42:26'),
(927, 'Libjo', 42, 0, '2018-11-14 08:42:26'),
(928, 'Poblacion I', 42, 0, '2018-11-14 08:42:26'),
(929, 'Poblacion II', 42, 0, '2018-11-14 08:42:26'),
(930, 'Bool', 43, 0, '2018-11-14 08:42:26'),
(931, 'Booy', 43, 0, '2018-11-14 08:42:26'),
(932, 'Cabawan', 43, 0, '2018-11-14 08:42:26'),
(933, 'Cogon', 43, 0, '2018-11-14 08:42:26'),
(934, 'Dampas', 43, 0, '2018-11-14 08:42:26'),
(935, 'Dao', 43, 0, '2018-11-14 08:42:26'),
(936, 'Manga', 43, 0, '2018-11-14 08:42:26'),
(937, 'Mansasa', 43, 0, '2018-11-14 08:42:26'),
(938, 'Poblacion I', 43, 0, '2018-11-14 08:42:26'),
(939, 'Poblacion II', 43, 0, '2018-11-14 08:42:26'),
(940, 'Poblacion III', 43, 0, '2018-11-14 08:42:26'),
(941, 'San Isidro', 43, 0, '2018-11-14 08:42:26'),
(942, 'Taloto', 43, 0, '2018-11-14 08:42:26'),
(943, 'Tiptip', 43, 0, '2018-11-14 08:42:26'),
(944, 'Ubujan', 43, 0, '2018-11-14 08:42:26'),
(945, 'Bagacay', 44, 0, '2018-11-14 08:42:26'),
(946, 'Balintawak', 44, 0, '2018-11-14 08:42:26'),
(947, 'Burgos', 44, 0, '2018-11-14 08:42:26'),
(948, 'Busalian', 44, 0, '2018-11-14 08:42:26'),
(949, 'Calituban', 44, 0, '2018-11-14 08:42:26'),
(950, 'Cataban', 44, 0, '2018-11-14 08:42:26'),
(951, 'Guindacpan', 44, 0, '2018-11-14 08:42:26'),
(952, 'Magsaysay', 44, 0, '2018-11-14 08:42:26'),
(953, 'Mahanay', 44, 0, '2018-11-14 08:42:26'),
(954, 'Nocnocan', 44, 0, '2018-11-14 08:42:26'),
(955, 'Poblacion', 44, 0, '2018-11-14 08:42:26'),
(956, 'Rizal', 44, 0, '2018-11-14 08:42:26'),
(957, 'Sag', 44, 0, '2018-11-14 08:42:26'),
(958, 'San Agustin', 44, 0, '2018-11-14 08:42:26'),
(959, 'San Carlos', 44, 0, '2018-11-14 08:42:26'),
(960, 'San Francisco', 44, 0, '2018-11-14 08:42:26'),
(961, 'San Isidro', 44, 0, '2018-11-14 08:42:26'),
(962, 'San Jose', 44, 0, '2018-11-14 08:42:26'),
(963, 'San Pedro', 44, 0, '2018-11-14 08:42:26'),
(964, 'Santo Niño', 44, 0, '2018-11-14 08:42:26'),
(965, 'Sikatuna', 44, 0, '2018-11-14 08:42:26'),
(966, 'Suba', 44, 0, '2018-11-14 08:42:26'),
(967, 'Tanghaligue', 44, 0, '2018-11-14 08:42:26'),
(968, 'Zamora', 44, 0, '2018-11-14 08:42:26'),
(969, 'Banlasan', 45, 0, '2018-11-14 08:42:26'),
(970, 'Bongbong', 45, 0, '2018-11-14 08:42:26'),
(971, 'Catoogan', 45, 0, '2018-11-14 08:42:26'),
(972, 'Guinobatan', 45, 0, '2018-11-14 08:42:26'),
(973, 'Hinlayagan Ilaud', 45, 0, '2018-11-14 08:42:26'),
(974, 'Hinlayagan Ilaya', 45, 0, '2018-11-14 08:42:26'),
(975, 'Kauswagan', 45, 0, '2018-11-14 08:42:26'),
(976, 'Kinan-oan', 45, 0, '2018-11-14 08:42:26'),
(977, 'La Union', 45, 0, '2018-11-14 08:42:26'),
(978, 'La Victoria', 45, 0, '2018-11-14 08:42:26'),
(979, 'Mabuhay Cabigohan', 45, 0, '2018-11-14 08:42:26'),
(980, 'Mahabgu', 45, 0, '2018-11-14 08:42:26'),
(981, 'Manuel M. Roxas', 45, 0, '2018-11-14 08:42:26'),
(982, 'Poblacion', 45, 0, '2018-11-14 08:42:26'),
(983, 'San Isidro', 45, 0, '2018-11-14 08:42:26'),
(984, 'San Vicente', 45, 0, '2018-11-14 08:42:26'),
(985, 'Santo Tomas', 45, 0, '2018-11-14 08:42:26'),
(986, 'Soom', 45, 0, '2018-11-14 08:42:26'),
(987, 'Tagum Norte', 45, 0, '2018-11-14 08:42:26'),
(988, 'Tagum Sur', 45, 0, '2018-11-14 08:42:26'),
(989, 'Bagonbanwa', 46, 0, '2018-11-14 08:42:26'),
(990, 'Banlasan', 46, 0, '2018-11-14 08:42:26'),
(991, 'Batasan Island', 46, 0, '2018-11-14 08:42:26'),
(992, 'Bilangbilangan Island', 46, 0, '2018-11-14 08:42:26'),
(993, 'Bosongon', 46, 0, '2018-11-14 08:42:26'),
(994, 'Buenos Aires', 46, 0, '2018-11-14 08:42:26'),
(995, 'Bunacan', 46, 0, '2018-11-14 08:42:26'),
(996, 'Cabulihan', 46, 0, '2018-11-14 08:42:26'),
(997, 'Cahayag', 46, 0, '2018-11-14 08:42:26'),
(998, 'Cawayanan', 46, 0, '2018-11-14 08:42:26'),
(999, 'Centro', 46, 0, '2018-11-14 08:42:26'),
(1000, 'Genonocan', 46, 0, '2018-11-14 08:42:26'),
(1001, 'Guiwanon', 46, 0, '2018-11-14 08:42:26'),
(1002, 'Ilijan Norte', 46, 0, '2018-11-14 08:42:26'),
(1003, 'Ilijan Sur', 46, 0, '2018-11-14 08:42:26'),
(1004, 'Libertad', 46, 0, '2018-11-14 08:42:26'),
(1005, 'Macaas', 46, 0, '2018-11-14 08:42:26'),
(1006, 'Matabao', 46, 0, '2018-11-14 08:42:26'),
(1007, 'Mocaboc Island', 46, 0, '2018-11-14 08:42:26'),
(1008, 'Panadtaran', 46, 0, '2018-11-14 08:42:26'),
(1009, 'Panaytayon', 46, 0, '2018-11-14 08:42:26'),
(1010, 'Pandan', 46, 0, '2018-11-14 08:42:26'),
(1011, 'Pangapasan Island', 46, 0, '2018-11-14 08:42:26'),
(1012, 'Pinayagan Norte', 46, 0, '2018-11-14 08:42:26'),
(1013, 'Pinayagan Sur', 46, 0, '2018-11-14 08:42:26'),
(1014, 'Pooc Occidental', 46, 0, '2018-11-14 08:42:26'),
(1015, 'Pooc Oriental', 46, 0, '2018-11-14 08:42:26'),
(1016, 'Potohan', 46, 0, '2018-11-14 08:42:26'),
(1017, 'Talenceras', 46, 0, '2018-11-14 08:42:26'),
(1018, 'Tan-awan', 46, 0, '2018-11-14 08:42:26'),
(1019, 'Tinangnan', 46, 0, '2018-11-14 08:42:26'),
(1020, 'Ubay Island', 46, 0, '2018-11-14 08:42:26'),
(1021, 'Ubojan', 46, 0, '2018-11-14 08:42:26'),
(1022, 'Villanueva', 46, 0, '2018-11-14 08:42:26'),
(1023, 'Achila', 47, 0, '2018-11-14 08:42:26'),
(1024, 'Bay-ang', 47, 0, '2018-11-14 08:42:26'),
(1025, 'Benliw', 47, 0, '2018-11-14 08:42:26'),
(1026, 'Biabas', 47, 0, '2018-11-14 08:42:26'),
(1027, 'Bongbong', 47, 0, '2018-11-14 08:42:26'),
(1028, 'Bood', 47, 0, '2018-11-14 08:42:26'),
(1029, 'Buenavista', 47, 0, '2018-11-14 08:42:26'),
(1030, 'Bulilis', 47, 0, '2018-11-14 08:42:26'),
(1031, 'Cagting', 47, 0, '2018-11-14 08:42:26'),
(1032, 'Calanggaman', 47, 0, '2018-11-14 08:42:26'),
(1033, 'California', 47, 0, '2018-11-14 08:42:26'),
(1034, 'Camali-an', 47, 0, '2018-11-14 08:42:26'),
(1035, 'Camambugan', 47, 0, '2018-11-14 08:42:26'),
(1036, 'Casate', 47, 0, '2018-11-14 08:42:26'),
(1037, 'Cuya', 47, 0, '2018-11-14 08:42:26'),
(1038, 'Fatima', 47, 0, '2018-11-14 08:42:26'),
(1039, 'Gabi', 47, 0, '2018-11-14 08:42:26'),
(1040, 'Governor Boyles', 47, 0, '2018-11-14 08:42:26'),
(1041, 'Guintabo-an', 47, 0, '2018-11-14 08:42:26'),
(1042, 'Hambabauran', 47, 0, '2018-11-14 08:42:26'),
(1043, 'Humayhumay', 47, 0, '2018-11-14 08:42:26'),
(1044, 'Ilihan', 47, 0, '2018-11-14 08:42:26'),
(1045, 'Imelda', 47, 0, '2018-11-14 08:42:26'),
(1046, 'Juagdan', 47, 0, '2018-11-14 08:42:26'),
(1047, 'Katarungan', 47, 0, '2018-11-14 08:42:26'),
(1048, 'Lomangog', 47, 0, '2018-11-14 08:42:26'),
(1049, 'Los Angeles', 47, 0, '2018-11-14 08:42:26');
INSERT INTO `barangays` (`brgy_id`, `brgy`, `mun_id`, `wPyap`, `started`) VALUES
(1050, 'Pag-asa', 47, 0, '2018-11-14 08:42:26'),
(1051, 'Pangpang', 47, 0, '2018-11-14 08:42:26'),
(1052, 'Poblacion', 47, 0, '2018-11-14 08:42:26'),
(1053, 'San Francisco', 47, 0, '2018-11-14 08:42:26'),
(1054, 'San Pascual', 47, 0, '2018-11-14 08:42:26'),
(1055, 'San Vicente', 47, 0, '2018-11-14 08:42:26'),
(1056, 'Sentinila', 47, 0, '2018-11-14 08:42:26'),
(1057, 'Sinandigan', 47, 0, '2018-11-14 08:42:26'),
(1058, 'Tapal', 47, 0, '2018-11-14 08:42:26'),
(1059, 'Tapon', 47, 0, '2018-11-14 08:42:26'),
(1060, 'Tintinan', 47, 0, '2018-11-14 08:42:26'),
(1061, 'Tipolo', 47, 0, '2018-11-14 08:42:26'),
(1062, 'Tubog', 47, 0, '2018-11-14 08:42:26'),
(1063, 'Tuboran', 47, 0, '2018-11-14 08:42:26'),
(1064, 'Union', 47, 0, '2018-11-14 08:42:26'),
(1065, 'Villa Teresita', 47, 0, '2018-11-14 08:42:26'),
(1066, 'Adlawan', 48, 0, '2018-11-14 08:42:26'),
(1067, 'Anas', 48, 0, '2018-11-14 08:42:26'),
(1068, 'Anonang', 48, 0, '2018-11-14 08:42:26'),
(1069, 'Anoyon', 48, 0, '2018-11-14 08:42:26'),
(1070, 'Balingasao', 48, 0, '2018-11-14 08:42:26'),
(1071, 'Banderaahan (Upper Ginopolan)', 48, 0, '2018-11-14 08:42:26'),
(1072, 'Botong', 48, 0, '2018-11-14 08:42:26'),
(1073, 'Buyog', 48, 0, '2018-11-14 08:42:26'),
(1074, 'Canduao Occidental', 48, 0, '2018-11-14 08:42:26'),
(1075, 'Canduao Oriental', 48, 0, '2018-11-14 08:42:26'),
(1076, 'Canlusong', 48, 0, '2018-11-14 08:42:26'),
(1077, 'Canmanico', 48, 0, '2018-11-14 08:42:26'),
(1078, 'Cansibao', 48, 0, '2018-11-14 08:42:26'),
(1079, 'Catug-a', 48, 0, '2018-11-14 08:42:26'),
(1080, 'Cutcutan', 48, 0, '2018-11-14 08:42:26'),
(1081, 'Danao', 48, 0, '2018-11-14 08:42:26'),
(1082, 'Genoveva', 48, 0, '2018-11-14 08:42:26'),
(1083, 'Ginopolan (Ginopolan Proper)', 48, 0, '2018-11-14 08:42:26'),
(1084, 'La Victoria', 48, 0, '2018-11-14 08:42:26'),
(1085, 'Lantang', 48, 0, '2018-11-14 08:42:26'),
(1086, 'Limocon', 48, 0, '2018-11-14 08:42:26'),
(1087, 'Loctob', 48, 0, '2018-11-14 08:42:26'),
(1088, 'Magsaysay', 48, 0, '2018-11-14 08:42:26'),
(1089, 'Marawis', 48, 0, '2018-11-14 08:42:26'),
(1090, 'Maubo', 48, 0, '2018-11-14 08:42:26'),
(1091, 'Nailo', 48, 0, '2018-11-14 08:42:26'),
(1092, 'Omjon', 48, 0, '2018-11-14 08:42:26'),
(1093, 'Pangi-an', 48, 0, '2018-11-14 08:42:26'),
(1094, 'Poblacion Occidental', 48, 0, '2018-11-14 08:42:26'),
(1095, 'Poblacion Oriental', 48, 0, '2018-11-14 08:42:26'),
(1096, 'Simang', 48, 0, '2018-11-14 08:42:26'),
(1097, 'Taug', 48, 0, '2018-11-14 08:42:26'),
(1098, 'Tausion', 48, 0, '2018-11-14 08:42:26'),
(1099, 'Taytay', 48, 0, '2018-11-14 08:42:26'),
(1100, 'Ticum', 48, 0, '2018-11-14 08:42:26');

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

--
-- Dumping data for table `educational_background`
--

INSERT INTO `educational_background` (`id`, `mid`, `eName`, `eAddr`, `eLevel`, `eStat`, `eFrom`, `eTo`, `sName`, `sAddr`, `sLevel`, `sStat`, `sFrom`, `sTo`, `cName`, `cAddr`, `cLevel`, `cStat`, `cDegree`, `cFrom`, `cTo`) VALUES
(4, 4, 'Dashdaj', 'Hjahsah', 'Grade 6', 'Graduated', 'September 2018', 'September 2018', 'Jdsajfksakfjj', 'Kjkjaksjfakj', 'Grade 12', 'Graduated', 'November 2018', 'November 2018', 'Asjdjsajdjak', 'Jkjaskdjsakdjas', '4th Year', 'Graduated', 'BS In Information Technology', 'November 2018', 'November 2018'),
(7, 5, 'Asdjajk', 'Kjksakdjkjak', 'Grade 6', 'Graduated', 'September 2018', 'September 2018', 'Asdjasjdsajk', 'Jkjasjjkafkak', 'Grade 12', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(8, 6, 'Asdada', 'Kjkajskdjk', 'Grade 1', 'In School', 'September 2018', 'September 2018', 'Sajdaj', 'Kajdksaj', 'Grade 3', 'Out of School', 'October 2014', 'October 2015', '', '', '', '', '', '', ''),
(9, 7, 'Adjsaj', 'Jksajjdksaj', 'Grade 6', 'Graduated', 'September 2018', 'September 2018', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 11, 'Bayong Elementary School', 'Bayong, Pilar, Bohol', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asjdsak Sak', 'Asjdjasjak', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(12, 13, 'Asdhaj', 'Hjasjhdj', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Fsdkfjsdjkjk', 'Jkjkajkjfskjfsk', 'Grade 12', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(13, 15, 'Ajdkasj', 'Kjaksjkdjakj', 'Grade 6', 'Graduated', 'October 2000', 'October 2018', 'Jdsajkjsa', 'Jksjdkjsa', 'Grade 3', 'In School', 'June 2012', 'October 2015', '', '', '', '', '', '', ''),
(14, 16, 'Asjdsad Elementary School', 'Asdkadsa Jaskf, Asjdja', 'Grade 6', 'Graduated', 'October 2000', 'October 2007', 'Jdksjkjs', 'Jkasjkjdaj', 'Grade 12', 'Graduated', 'June 2009', 'April 2013', '', '', '', '', '', '', ''),
(15, 20, 'Sdkfs', 'Jkskdfjdjs', 'Grade 6', 'Graduated', 'October 2002', 'October 2008', 'Adjjajd', 'Jhjashdja', 'Grade 2', 'Out of School', '', '', '', '', '', '', '', '', ''),
(16, 18, 'Asdjksa', 'Asdadiasj', 'Grade 6', 'Graduated', 'October 2018', 'October 2018', 'Ajskdjkasj', 'Jkjskjksa', 'Grade 11', 'Out of School', 'June 2013', 'October 2015', '', '', '', '', '', '', ''),
(17, 19, 'Aksdksal Asjda', 'Skadja Klajfaf', 'Grade 6', 'Graduated', 'October 2018', 'October 2018', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 32, 'Asjdjaj', 'Jkjasjdaj', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asdajda ', 'Aksjdsjaj', 'Grade 12', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(21, 31, 'Jjkjfsdj', 'Jkjsjkfsdkj', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asdajk', 'Kjkasjkdjka', 'Grade 3', 'Out of School', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(22, 27, 'Asjdja', 'Kjkjaksjdkjas', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asjdjkaskjksja', 'Aksdjaskas', 'Grade 11', 'Out of School', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(23, 12, 'Asdaskda', 'Kjksjakjdjask', 'Grade 6', 'Graduated', '', '', 'Asjdkjsak', 'Jksajkjdksjak', 'Grade 4', 'Graduated', 'November 2018', 'November 2018', 'Daskdsasak', 'Jkjaskjkdsajkjk', '3rd Year', 'In School', 'BS In Medical Technology', 'November 2018', 'November 2018'),
(24, 28, 'Jkfsdjfkj', 'Kjksdjkdfjksj', 'Grade 6', 'Graduated', 'October 2018', 'October 2018', 'Asdsakjjk', 'Kksakjdkajk', 'Grade 4', 'Out of School', '', '', '', '', '', '', '', '', ''),
(25, 24, 'Asdsajdkk', 'Jksakjdjask', 'Grade 5', 'Out of School', 'November 2018', 'November 2018', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, 34, 'Asdjjak', 'Kjkjskajkdak', 'Grade 6', 'Graduated', 'October 2018', 'October 2018', 'Asdajdkk', 'Jkjakjdskajsda', 'Grade 12', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(27, 9, 'Asdjaskj', 'Kjjasjkdjkajk', 'Grade 6', 'Graduated', 'October 2018', 'October 2018', 'Jkjsajfkajk', 'Kjkkasjkfksak', 'Grade 12', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(28, 38, 'Asdjajkfjj', 'Kjjkajfkjkajf', 'Grade 6', 'Graduated', 'June 2002', 'March 2008', 'Dsjfkjskfksdjjk', 'Jkjajsjkfkajfkaj', 'Grade 12', 'Graduated', 'June 2008', 'March 2012', '', '', '', '', '', '', ''),
(30, 23, 'Sdfjskjfks', 'Kjkjskajfskafk', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asdjajdkj', 'Kjkksajkjdkasskd', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asdjskajdsajk', 'Jkajskkaskja', '3rd Year', 'Out of School', 'BS In Information Technology', 'November 2018', 'November 2018'),
(31, 39, 'Asdajdsaj', 'Kjkjaskdjkjas', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asdjajdak', 'Jkjkajkfjafk', 'Grade 2', 'In School', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(32, 29, 'Jsfkajkaja', 'Jkjksjakfjasj', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asjdsajkdsaj', 'Kjkjksajdasjk', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(33, 36, 'Jdjsadjsakkj', 'Kjkjkjaskdjjkask', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, 30, 'Aksjdaskj', 'Kjkajjafjk', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asdjaskdjaskk', 'Jjkadjakjkja', 'Grade 2', 'Out of School', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(35, 37, 'Dasdjajkk', 'Kjkjajjfkajj', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asndanfsak', 'Jkjsajsafk', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Askjdjajak', 'Jkasjkfjsja', '4th Year', 'Graduated', 'BS In Information Technology', 'November 2018', 'November 2018'),
(36, 10, 'Jsfjksfjdkj', 'Jkjkjsakjfkak', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Cznczncxmz', 'Asdkadsa', 'Grade 11', 'Out of School', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(37, 26, 'Jkfjsajjasjkj', 'Ashdashfh', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asdjajsdkajk', 'Jkjkakkajfk', 'Grade 10', 'In School', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(38, 25, 'Jsjajfasfakkjk', 'Jkkjasksajfsjk', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asjdsajjskk', 'Jksajkdajksakj', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(39, 21, 'Asdksakjak', 'Kjaskjkasfajk', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asdkjasj', 'Jkjakdkasjksa', 'Grade 10', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(40, 17, 'Kjskkjskjfskk', 'Jkjkjfjsdjk', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asjdjakasjk', 'Jkjaksjsfajk', 'Grade 10', 'In School', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(41, 35, 'Jfjsjfdsjjkjkj', 'Jkjkasjafsk', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Ashdahas', 'Kjkjdksajdjakk', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Hdsahdsaj', 'Hhasjdhajhfs', '3rd Year', 'In School', 'BS In Medical Technology', 'November 2018', 'November 2018'),
(42, 33, 'Kdklskflskl', 'Klaskkakfkl', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(43, 40, 'Dskajkdjakj', 'Jkjasdskajk', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asndanfsakasdj', 'Dasd Ashaasdha', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(44, 41, 'Asdasas', 'Kdsajksajask', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asdjkajdkakjkakdasjk', 'Kjksjkajfk', 'Grade 6', 'In School', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(45, 42, 'Asdajkdsak', 'Kjkas', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asjdsajkdsaj', 'Jkjkakkajfk', 'Grade 4', 'Out of School', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(46, 43, 'Asda', 'Jkjksasjkjdkak', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Jskfj Sjkksdkjfs', 'Kajkjkfa', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(47, 44, 'Sajdaj Akjdak', 'Kjkjdksak Jdskaj', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Asjkd Asdkas K', 'Ksaj Dkasj Kaka', 'Grade 3', 'Out of School', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(48, 45, 'Asdjadjak', 'Jkjaskjdjkajfk', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', 'Sajdkajsa K', 'Jkasjdaskjfa', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', ''),
(50, 56, 'Askdasjfskjk', 'Jjkasjdsaj', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(51, 65, 'Asjdajkdkj', 'Jksajdakkj', 'Grade 6', 'Graduated', 'November 2018', 'November 2018', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, 66, 'Buenavista Elementary School', 'Buenavista,Ubay,bohol', 'Grade 4', 'Out of School', 'November 2018', 'November 2018', 'Hh', 'Kjkjksajdasjk', 'Grade 3', 'Graduated', 'November 2018', 'November 2018', 'Hdsahdsaj', 'Zamora, Bilar, Bohol', '3rd Year', 'Out of School', 'BS In Computer Science', 'November 2018', 'November 2018');

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

--
-- Dumping data for table `interest_hobbies`
--

INSERT INTO `interest_hobbies` (`id`, `mid`, `internet`, `watch`, `sports`, `music`, `arts`, `singing`, `dancing`) VALUES
(2, 4, 1, 0, 0, 1, 1, 0, 0),
(3, 5, 1, 0, 0, 0, 0, 1, 0),
(4, 6, 1, 0, 0, 1, 0, 0, 0),
(6, 7, 0, 1, 0, 1, 0, 0, 0),
(8, 10, 0, 0, 1, 1, 0, 0, 0),
(9, 13, 0, 0, 0, 1, 0, 0, 0),
(10, 15, 0, 1, 1, 0, 0, 0, 0),
(11, 16, 1, 0, 1, 0, 0, 0, 0),
(12, 20, 0, 0, 0, 1, 0, 0, 0),
(13, 18, 1, 0, 0, 1, 0, 0, 0),
(14, 32, 0, 0, 0, 1, 0, 0, 0),
(15, 34, 1, 0, 0, 0, 0, 0, 0),
(16, 9, 1, 0, 0, 0, 0, 0, 0),
(17, 23, 0, 0, 0, 0, 1, 0, 0),
(18, 11, 1, 0, 0, 0, 0, 0, 0),
(19, 38, 1, 1, 0, 1, 0, 0, 0),
(20, 41, 1, 1, 0, 0, 0, 0, 0),
(21, 42, 0, 1, 0, 0, 1, 0, 0),
(22, 43, 1, 1, 0, 1, 0, 0, 0),
(23, 44, 0, 1, 1, 0, 0, 0, 0),
(24, 45, 0, 1, 1, 0, 0, 0, 0),
(26, 56, 1, 1, 0, 0, 0, 0, 0),
(27, 65, 1, 1, 0, 0, 0, 0, 0),
(28, 66, 0, 0, 0, 1, 0, 1, 1);

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

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `name`, `email`, `role`, `municipal`, `browser`, `ip_addr`, `os`, `logged_on`) VALUES
(1, 'Albur In Charge', 'albur1234@yahoo.com', 'LGU User', 'Alburquerque', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-18 12:56:46'),
(2, 'PYAP-Bohol Admin', 'opswdcdd@gmail.com', 'Administrator', 'Tagbilaran', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-18 13:01:43'),
(3, 'Bilar in Charge', 'bilar1234@gmail.com', 'LGU User', 'Bilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-18 13:06:32'),
(4, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-18 13:07:04'),
(5, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-18 13:37:21'),
(6, 'Albur In Charge', 'albur1234@yahoo.com', 'LGU User', 'Alburquerque', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-18 13:48:06'),
(7, 'PYAP-Bohol Admin', 'opswdcdd@gmail.com', 'Administrator', 'Tagbilaran', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-18 13:54:09'),
(8, 'Bilar in Charge', 'bilar1234@gmail.com', 'LGU User', 'Bilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-18 14:07:32'),
(9, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-18 23:27:53'),
(10, 'Marlon H. Muring', 'm2igniter32@gmail.com', 'LGU User', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-18 23:35:56'),
(11, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-18 23:58:47'),
(12, 'Marlon H. Muring', 'm2igniter32@gmail.com', 'LGU User', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-19 08:47:27'),
(13, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-19 09:19:39'),
(14, 'Albur In Charge', 'albur1234@yahoo.com', 'LGU User', 'Alburquerque', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-19 09:39:11'),
(15, 'PYAP-Bohol Admin', 'opswdcdd@gmail.com', 'Administrator', 'Tagbilaran', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-19 10:02:48'),
(16, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-19 10:03:05'),
(17, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-22 05:21:19'),
(18, 'Marlon H. Muring', 'm2igniter32@gmail.com', 'LGU User', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-22 05:31:39'),
(19, 'PYAP-Bohol Admin', 'opswdcdd@gmail.com', 'Administrator', 'Tagbilaran', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-22 05:37:51'),
(20, 'Albur In Charge', 'albur1234@yahoo.com', 'LGU User', 'Alburquerque', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-25 09:36:39'),
(21, 'Albur In Charge', 'albur1234@yahoo.com', 'LGU User', 'Alburquerque', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-25 12:36:49'),
(22, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-25 13:02:41'),
(23, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-29 07:50:26'),
(24, 'Marlon H. Muring', 'm2igniter32@gmail.com', 'LGU User', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-29 07:52:04'),
(25, 'Albur In Charge', 'albur1234@yahoo.com', 'LGU User', 'Alburquerque', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-29 23:59:18'),
(26, 'Albur In Charge', 'albur1234@yahoo.com', 'LGU User', 'Alburquerque', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-29 23:59:48'),
(27, 'PYAP-Bohol Admin', 'opswdcdd@gmail.com', 'Administrator', 'Tagbilaran', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-30 01:29:41'),
(28, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Android', '2018-11-30 02:31:34'),
(29, 'Marlon H. Muring', 'm2igniter32@gmail.com', 'LGU User', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Android', '2018-11-30 02:33:38'),
(30, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-30 07:12:47'),
(31, 'Marlon H. Muring', 'm2igniter32@gmail.com', 'LGU User', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-30 07:41:00'),
(32, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-30 09:03:41'),
(33, 'Marlon H. Muring', 'm2igniter32@gmail.com', 'LGU User', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-30 10:17:17'),
(34, 'PYAP-Bohol Admin', 'opswdcdd@gmail.com', 'Administrator', 'Tagbilaran', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-11-30 10:26:31'),
(35, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 04:30:28'),
(36, 'Marlon H. Muring', 'm2igniter32@gmail.com', 'LGU User', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 06:05:04'),
(37, 'Marlon H. Muring', 'm2igniter32@gmail.com', 'LGU User', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 11:37:08'),
(38, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 11:48:40'),
(39, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 11:57:18'),
(40, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 13:38:53'),
(41, 'Marlon H. Muring', 'm2igniter32@gmail.com', 'LGU User', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 14:08:37'),
(42, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 14:25:15'),
(43, 'Albur In Charge', 'albur1234@yahoo.com', 'LGU User', 'Alburquerque', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 14:27:31'),
(44, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 14:37:01'),
(45, 'Albur In Charge', 'albur1234@yahoo.com', 'LGU User', 'Alburquerque', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 14:50:39'),
(46, 'Albur In Charge', 'albur1234@yahoo.com', 'LGU User', 'Alburquerque', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 14:51:22'),
(47, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 14:59:04'),
(48, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 23:23:12'),
(49, 'Marlon H. Muring', 'm2igniter32@gmail.com', 'LGU User', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 23:24:10'),
(50, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-01 23:30:48'),
(51, 'Marlon H. Muring', 'marlonzhin32@gmail.com', 'Administrator', 'Pilar', 'Chrome 69.0.3497.92', '::1', 'Windows 10', '2018-12-02 22:40:53');

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

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mid`, `photo`, `brgy_id`, `mun_id`, `fName`, `mName`, `lName`, `ext`, `sex`, `dBirth`, `age`, `civilStat`, `brgy`, `mun`, `prov`, `region`, `bBrgy`, `bMun`, `bProv`, `bRegion`, `religion`, `celNo`, `email`, `fathName`, `fathAge`, `fathOccup`, `fathIncome`, `mothName`, `mothAge`, `mothOccup`, `mothIncome`, `added_by`, `added_on`) VALUES
(4, 'default.png', 794, 35, 'Justine', 'Bagol', 'Macarayan', '', 'Male', 'October 23, 1997', '21', 'Married', 'Catagda-an', 'Pilar', 'Bohol', 'VII', 'Catagda-an', 'Pilar', 'Bohol', 'VII', 'Asjdaksa', '09091203019', 'asda@aff.com', 'Asdak', '29', 'Adajk', '5900', 'Ajdjsaks', '23', 'Adaskak', '3000', '', '2018-12-01 23:50:01'),
(5, 'default.png', 794, 35, 'Adjsaj', 'Iisafiasu', 'Iiasuidu', 'Jr.', 'Male', 'September 21, 1997', '21', 'Married', 'Catagda-an', 'Pilar', 'Bohol', 'VII', 'Catagda-an', 'Pilar', 'Bohol', 'VII', 'Ajdsaj', '09102311289', 'jaskdjka@ad.com', 'Ajdasj', '31', 'Jdhajhdja', '7000', 'Asdaj', '21', 'Adadakj', '4000', '', '2018-11-18 23:24:36'),
(7, 'default.png', 794, 35, 'Sdadja', 'Jkasjdjak', 'Kjkjaskjdkj', 'Jr.', 'Male', 'September 11, 1997', '21', 'Single', 'Catagda-an', 'Pilar', 'Bohol', 'VII', 'Catagda-an', 'Pilar', 'Bohol', 'VII', 'Adsak', '09110239011', 'dahj@asd.com', 'Adjkasj', '45', 'Asjdkasj', '4500', 'Asjdsaj', '43', 'Sadaj', '3400', '', '2018-12-01 23:50:02'),
(9, 'default.png', 2, 1, 'Karen', 'Jkajksaj', 'Jkjskadj', '', 'Female', 'October 22, 1998', '20', 'Solo Parent', 'Basacdacu', 'Alburquerque', 'Bohol', 'VII', 'Basacdacu', 'Alburquerque', 'Bohol', 'VII', 'Akdsja', '09130128823', 'askjdka@sk.com', 'Kasdaas', '46', 'Sadkaj', '5000', 'Asdjak', '45', 'Askjd', '3000', '', '2018-11-19 08:57:35'),
(10, 'default.png', 791, 35, 'Ajdskak', 'Kasdja', 'Kasjkdjakj', 'Sr.', 'Male', 'September 12, 1990', '28', 'Single', 'Buenasuerte', 'Pilar', 'Bohol', 'VII', 'Buenasuerte', 'Pilar', 'Bohol', 'VII', '', '09129301013', 'dsads@adk.com', 'Djsak', '50', 'Sdaasd', '8000', 'Sadaa', '36', 'Dkakjdka', '5000', '', '2018-11-06 12:20:38'),
(11, 'default.png', 790, 35, 'Ram', 'Bon', 'Ortega', '', 'Male', 'September 2, 1999', '19', 'Solo Parent', 'Bayong', 'Pilar', 'Bohol', 'VII', 'Bayong', 'Pilar', 'Bohol', 'VII', '', '09123189318', 'adah@sm.com', 'Ajda', '34', 'Jaskdja', '7000', 'Adsak', '34', 'Askda', '4000', '', '2018-11-06 12:20:40'),
(12, 'default.png', 795, 35, 'Grace', 'Kasjdk', 'Kksakdj', '', 'Female', 'September 19, 1996', '22', 'Single', 'Del Pilar', 'Pilar', 'Bohol', 'VII', 'Del Pilar', 'Pilar', 'Bohol', 'VII', 'Adjka', '09128931028', 'asda@asd.com', 'Askdajk', '43', 'Das', '6000', 'AMNMd', '42', 'Asdandm', '5000', '', '2018-11-06 12:20:46'),
(13, 'default.png', 795, 35, 'Jkkasd', 'Kasjdk', 'Kksakdj', '', 'Female', 'September 19, 1996', '22', 'Single', 'Del Pilar', 'Pilar', 'Bohol', 'VII', 'Del Pilar', 'Pilar', 'Bohol', 'VII', 'Adjka', '09128931028', 'asda@asd.com', 'Askdajk', '43', 'Das', '6000', 'AMNMd', '42', 'Asdandm', '5000', '', '2018-11-06 12:20:48'),
(15, 'default.png', 789, 35, 'Joselito', 'Perocho', 'Cinco', 'Jr.', 'Male', 'October 16, 1996', '22', 'Solo Parent', 'Bagumbayan', 'Pilar', 'Bohol', 'VII', 'Bagumbayan', 'Pilar', 'Bohol', 'VII', 'Askdja', '01902319218', 'ashd@adj.com', 'Asdah', '23', 'Asjkhdhj', '6000', 'Sksajkdaj', '23', 'Jakdja', '3000', '', '2018-11-06 12:20:51'),
(16, 'default.png', 2, 1, 'Henry', 'Jarol', 'Toledo', 'Jr.', 'Male', 'October 16, 1991', '27', 'Single', 'Basacdacu', 'Alburquerque', 'Bohol', 'VII', 'Basacdacu', 'Alburquerque', 'Bohol', 'VII', 'Asjdajkaj', '01930210821', 'asdjsakjdas@adsk.com', 'Jdkakdjka', '60', 'Sadjasjdj', '8000', 'Asdakdsaj', '57', 'Ajdsajkaj', '6000', '', '2018-11-06 12:20:53'),
(17, 'default.png', 11, 1, 'Jdksjjkjsj', 'Jkksjdkfjsdk', 'Jksjfsdjfk', '', 'Female', 'October 11, 1995', '23', 'Single', 'West Poblacion', 'Alburquerque', 'Bohol', 'VII', 'West Poblacion', 'Alburquerque', 'Bohol', 'VII', 'Asdkakdalk', '09123108401', 'adajka@aksd.com', 'Ajsdajkjd Ajda', '56', 'Sakajfjask', '7000', 'Ajsdkjaajj Jkask', '54', 'Ajdkasjdasj', '5000', '', '2018-11-06 12:20:55'),
(18, 'default.png', 147, 9, 'Jacob', 'Jkaskjaf', 'Adjajdas', '', 'Male', 'April 12, 1995', '23', 'Single', 'Campagao', 'Bilar', 'Bohol', 'VII', 'Campagao', 'Bilar', 'Bohol', 'VII', 'Askdkjask', '09128141429', 'dsa@gmail.com', 'Adjasjdsajk Asdjsak', '54', 'Sjakjdaj', '8000', 'Hasdhahdas Ajsdsahj', '53', 'Ajsdkjsakja', '7000', '', '2018-11-06 12:20:58'),
(19, 'default.png', 150, 9, 'Dasksak', 'Jjaskjkjdsak', 'Jkjsakjdkaj', 'Jr.', 'Male', 'June 16, 1999', '19', 'Single', 'Owac', 'Bilar', 'Bohol', 'VII', 'Owac', 'Bilar', 'Bohol', 'VII', 'Adnakdjkaj', '09123901240', 'sandm@yahoo.com', 'Dkjadkaj', '56', 'Lakdask', '7000', 'Asjdkjakjk', '53', 'Kasdklasl', '5000', '', '2018-11-06 12:21:00'),
(20, 'default.png', 148, 9, 'Hjsahhfjah', 'Hjhshfah', 'Jhsfhsj', '', 'Female', 'May 9, 1995', '23', 'Single', 'Cansumbol', 'Bilar', 'Bohol', 'VII', 'Cansumbol', 'Bilar', 'Bohol', 'VII', '', '09120318418', 'dsak@asd.com', 'Ajsdkjsa Asdjdsf', '56', 'Askdaj', '6000', 'Asdja Dsjkha', '55', 'Asdjsajsa', '5000', '', '2018-11-06 12:21:03'),
(21, 'default.png', 807, 35, 'Rechie ', 'Lusica', 'Hinampas', '', 'Male', 'December 7, 1996', '21', 'Single', 'San Vicente', 'Pilar', 'Bohol', 'VII', 'San Vicente', 'Pilar', 'Bohol', 'VII', 'Faith Tabernacle Church', '09120192492', 'renzhinampas@gmail.com', 'Rogelio Hinampas', '58', 'Farmer', '7000', 'Cherlita Hinampas', '57', 'House Maid', '5000', '', '2018-11-06 12:21:08'),
(23, 'default.png', 2, 1, 'Anne', 'Asjhash', 'Hjhasdhsa', '', 'Female', 'May 9, 1996', '22', 'Single', 'Basacdacu', 'Alburquerque', 'Bohol', 'VII', 'Basacdacu', 'Alburquerque', 'Bohol', 'VII', '', '09139109401', 'asmdsa@gmail.com', 'Adjadjaj', '56', 'Jsakjdska', '5000', 'Jasdjsajasj', '53', 'Jsadjsak', '4000', 'Albur Staff', '2018-11-19 08:57:35'),
(24, 'default.png', 793, 35, 'Ajdksajksaj', 'Jksjadjkja', 'Kjkasjkdjak', '', 'Female', 'June 13, 1995', '23', 'Single', 'Cansungay', 'Pilar', 'Bohol', 'VII', 'Cansungay', 'Pilar', 'Bohol', 'VII', 'Asdadjkas', '09102019049', 'asdja@gmail.com', 'Askdskadasj', '57', 'Ajdasaj', '4000', 'Sajdjaskak', '53', 'Sdaksajsfk', '2000', 'Marlon Muring', '2018-11-06 12:19:49'),
(25, 'default.png', 796, 35, 'Asjdsajda', 'Kjkaksjdjakjk', 'Jkjkajkdjk', '', 'Female', 'August 16, 2000', '18', 'Single', 'Estaca', 'Pilar', 'Bohol', 'VII', 'Estaca', 'Pilar', 'Bohol', 'VII', '', '09120319039', 'asdas@gmail.com', 'Ajdakjka', '56', 'Sakdska', '5000', 'Hasasjdhash', '53', 'Hsjadas', '3500', 'Marlon Muring', '2018-11-06 12:19:43'),
(26, 'default.png', 791, 35, 'Asdjajd', 'Jasdsak', 'Asjdsak', '', 'Female', 'August 9, 2001', '17', 'Single', 'Buenasuerte', 'Pilar', 'Bohol', 'VII', 'Buenasuerte', 'Pilar', 'Bohol', 'VII', '', '01923913131', 'jaksd@gmail.com', 'Asdjasjdak', '57', 'Jakdjkaj', '3000', '', '', '', '', 'Marlon Muring', '2018-11-10 01:54:33'),
(27, 'default.png', 792, 35, 'Asdkakd', 'Kjsakdkaj', 'Sajdkaj', '', 'Male', 'April 9, 1997', '21', 'Single', 'Cagawasan', 'Pilar', 'Bohol', 'VII', 'Cagawasan', 'Pilar', 'Bohol', 'VII', '', '09234920492', 'asdksajk@gmail.com', 'Asdjka', '49', 'Kasjaj Asda', '2000', 'Asdjaj Asjda', '45', 'Asda', '1000', 'Marlon Muring', '2018-11-06 12:19:30'),
(28, 'default.png', 788, 35, 'Kent', 'Kjaskdj', 'Kjksadjk', '', 'Female', 'September 15, 1999', '19', 'Single', 'Bagacay', 'Pilar', 'Bohol', 'VII', 'Bagacay', 'Pilar', 'Bohol', 'VII', 'Seventh Day Adventist', '01923103193', 'asdak@gmail.com', 'Asdska', '54', 'Kasjdka', '10000', '', '', '', '', 'Marlon Muring', '2018-11-19 08:57:35'),
(29, 'default.png', 787, 35, 'Harold', 'Kajkaj', 'Kjasdjkaj', '', 'Male', 'October 15, 1986', '32', 'Married', 'Aurora', 'Pilar', 'Bohol', 'VII', 'Aurora', 'Pilar', 'Bohol', 'VII', '', '09102930933', 'sadask@ask.com', 'Jasdkaj', '58', 'Jkasdjk', '5000', '', '', '', '', 'Marlon Muring', '2018-11-19 08:57:35'),
(30, 'default.png', 788, 35, 'Rodel', 'Kjkas', 'Escabusa', '', 'Female', 'February 19, 1997', '21', 'Single', 'Bagacay', 'Pilar', 'Bohol', 'VII', 'Bagacay', 'Pilar', 'Bohol', 'VII', '', '09120390193', 'sandam@askd.com', '', '', '', '', 'Asdjsajk', '59', 'Jajdsajh', '3000', 'Marlon Muring', '2018-11-19 08:57:35'),
(31, 'default.png', 787, 35, 'Patrick', 'Jkjsjjsdj', 'Kjkjdsjfs', '', 'Male', 'May 19, 1993', '25', 'Single', 'Aurora', 'Pilar', 'Bohol', 'VII', 'Aurora', 'Pilar', 'Bohol', 'VII', '', '01929124194', 'asdaska@sda.com', 'Asjkdakas', '54', 'Kasdjksa', '3500', 'Asdjkaaj', '53', 'Akjdkajka', '2300', 'Marlon Muring', '2018-11-19 08:57:35'),
(32, 'default.png', 148, 9, 'Mae', 'Lklkalkdlkal', 'Klaskdklask', '', 'Female', 'November 7, 2001', '17', 'Single', 'Cansumbol', 'Bilar', 'Bohol', 'VII', 'Cansumbol', 'Bilar', 'Bohol', 'VII', 'Jkasdasdka', '09120301931', 'mae@gmail.com', 'Ajdajk Aksdjka', '56', 'Jaskjdksaj', '4000', 'Ajdjasjjda ', '52', 'Kasdksja', '3000', 'Bilar1234', '2018-11-08 04:33:31'),
(33, 'default.png', 143, 9, 'Carlos', 'Klkslkdflks', 'Klksdlfl', 'Jr.', 'Male', 'October 19, 2000', '18', 'Single', 'Bugang Norte', 'Bilar', 'Bohol', 'VII', 'Bugang Norte', 'Bilar', 'Bohol', 'VII', '', '09102939193', 'amsdak@asd.com', 'Ajsdj', '43', 'Jsadjka', '5000', 'Askdjkasj', '42', 'Jkajdskaj', '2000', 'Bilar1234', '2018-11-19 08:57:35'),
(34, 'default.png', 796, 35, 'Jdaskjdkask', 'Jkjkjaskjkj', 'Jksajdkaj', '', 'Male', 'October 23, 1991', '27', 'Married', 'Estaca', 'Pilar', 'Bohol', 'VII', 'Estaca', 'Pilar', 'Bohol', 'VII', 'Akjsdakd', '09102930122', 'adjask@agmail.com', 'Asjdasjkajk Asdao', '62', 'Ajskjsdaj', '4000', 'Asdasdasjk Jasdak', '58', 'Asdksjkakasj', '3000', 'Marlon Muring', '2018-11-06 12:18:50'),
(35, 'default.png', 146, 9, 'Asdsja', 'Jjakkjdasjj', 'Kjkasdajk', '', 'Female', 'June 12, 1996', '22', 'Single', 'Cambigsi', 'Bilar', 'Bohol', 'VII', 'Cambigsi', 'Bilar', 'Bohol', 'VII', 'Asjdsajkas', '09010293012', 'asdkasl@gmail.com', 'Adajfak', '13', 'Asdasdask', '5000', 'Jkdasksajkj', '23', 'Skajdasjdk', '4000', 'Bilar1234', '2018-11-06 12:18:55'),
(36, 'default.png', 787, 35, 'Jonas', 'Kjkjkajsdkjak', 'Carias', '', 'Male', 'April 16, 1997', '21', 'Single', 'Aurora', 'Pilar', 'Bohol', 'VII', 'Aurora', 'Pilar', 'Bohol', 'VII', 'Aksjdkjaj', '09102930219', 'jjkdsak@asdj.com', 'Asndnamn', '48', 'Ashdhahhd', '5000', 'Asdjkjadksaj', '46', 'Kajfkajf', '4000', 'Marlon Muring', '2018-11-19 08:57:35'),
(37, 'default.png', 788, 35, 'Ashley', 'Jkajkjkajk', 'Jkjaskjkja', '', 'Female', 'June 20, 2001', '17', 'Single', 'Bagacay', 'Pilar', 'Bohol', 'VII', 'Bagacay', 'Pilar', 'Bohol', 'VII', 'Asdjahsjd', '09120319419', 'ashley@gmail.com', 'Sadasksa', '55', 'Asjdjakdj', '4000', 'Sadabanbdn', '53', 'Sajdjakfs', '3000', 'Marlon Muring', '2018-11-06 12:16:59'),
(38, 'default.png', 795, 35, 'Rachel', 'Kjkasjfkasj', 'Kjkjajfkjakj', '', 'Female', 'June 16, 1993', '25', 'Single', 'Del Pilar', 'Pilar', 'Bohol', 'VII', 'Del Pilar', 'Pilar', 'Bohol', 'VII', 'Dsandaskjk', '09109230919', 'jaskdjas12@gmail.com', 'Adajfkak', '56', 'Asfjkjakj', '5000', 'Sajkajfkaj', '53', 'Kjsfkjskgsk', '4000', 'Marlon Muring', '2018-11-10 00:29:42'),
(39, 'default.png', 798, 35, 'Albert', 'Jkjasjdja', 'Jkjkajdkjas', '', 'Male', 'May 15, 2003', '15', 'Single', 'Inaghuban', 'Pilar', 'Bohol', 'VII', 'Inaghuban', 'Pilar', 'Bohol', 'VII', '', '09019039912', 'albert123@yahoo.com', 'Askdjajkdj', '34', 'Sadhsasahj', '8000', '', '', '', '', 'Marlon Muring', '2018-11-10 01:58:06'),
(40, 'default.png', 3, 1, 'Calvin', 'Jksajkajk', 'Jkjasjda', '', 'Male', 'November 25, 1999', '19', 'Single', 'Cantiguib', 'Alburquerque', 'Bohol', 'VII', 'Cantiguib', 'Alburquerque', 'Bohol', 'VII', 'Jdsadkjakk', '09120301940', 'calvin123@gmail.com', 'Asdksajsakj', '58', 'Asdksajkjak', '4700', 'Asdjakdjsak', '55', 'Jsakjdkakjk', '3400', 'Albur Staff', '2018-11-25 09:36:17'),
(41, 'default.png', 1, 1, 'Phillip', 'Carias', 'Daguplo', '', 'Male', 'November 19, 1997', '21', 'Single', 'Bahi', 'Alburquerque', 'Bohol', 'VII', 'Bahi', 'Alburquerque', 'Bohol', 'VII', 'Asdjajdas', '09293091092', 'phillip@gmail.com', 'Jjdajdkasjk Aksdjksa K', '64', 'Sajdasjdsa', '5000', 'Kdjak Dakjkas', '63', 'Jkasjdkasjk', '3000', 'Albur Staff', '2018-11-19 09:42:31'),
(42, 'default.png', 1, 1, 'Joshua', 'Calape', 'Escabusa', '', 'Male', 'June 7, 1995', '23', 'Single', 'Bahi', 'Alburquerque', 'Bohol', 'VII', 'Bahi', 'Alburquerque', 'Bohol', 'VII', 'Asdskajkaj', '09129309129', 'josh@gmail.com', 'Kdsjsakjd Askdsaj', '56', 'Jasdsa', '5200', 'Kskdsa Ksdajsajsa', '53', 'Jsakjda ', '3500', 'Albur Staff', '2018-11-19 09:43:21'),
(43, 'default.png', 4, 1, 'Janeth', 'Jasdasdsa', 'Kjjksadjka', '', 'Female', 'September 15, 1999', '19', 'Single', 'Dangay', 'Alburquerque', 'Bohol', 'VII', 'Dangay', 'Alburquerque', 'Bohol', 'VII', 'Asdkkajsjas', '01923091292', 'janeth@gmail.com', 'Kadjajdak Asda', '56', 'Kajdsasj', '4500', 'Daasdkaj Kasjda', '54', 'Sadasjdsa', '4000', 'Albur In Charge', '2018-11-11 12:18:34'),
(44, 'default.png', 790, 35, 'Ricky', 'Kjkasdkasj', 'Jkajjdkasjk', '', 'Male', 'August 18, 1999', '19', 'Single', 'Bayong', 'Pilar', 'Bohol', 'VII', 'Bayong', 'Pilar', 'Bohol', 'VII', 'Roman Catholic', '09019030193', 'ricky14@gmail.com', 'Asjdjsakk Asda', '57', 'Skajdkasj', '5000', 'Kjsadk Sajsdak', '55', 'Asjdkaasd', '4000', 'Marlon H. Muring', '2018-11-12 11:42:05'),
(45, 'default.png', 792, 35, 'Ronald', 'Jkjjaskjfkjask', 'Kjkjaskjfask', 'Jr.', 'Male', 'November 17, 1998', '20', 'Single', 'Cagawasan', 'Pilar', 'Bohol', 'VII', 'Cagawasan', 'Pilar', 'Bohol', 'VII', '', '01923091940', 'akdask@gmail.com', 'Jj Asjfaj Jsakjkas', '57', 'Ajkdja Kfsa', '6000', '', '', '', '', 'Marlon H. Muring', '2018-11-18 10:07:43'),
(46, 'default.png', 788, 35, 'Rose', 'Kjkajsdkas', 'Asasjdas', '', 'Female', 'May 15, 1996', '22', 'Single', 'Bagacay', 'Pilar', 'Bohol', 'VII', 'Bagacay', 'Pilar', 'Bohol', 'VII', 'Jaasdjak', '01290491004', 'rose1234@gmail.com', 'Hjdkadkajd Kajka', '56', 'Skdjkasjd', '6000', 'Sajdjasd Assa', '54', 'Sjsakdjsa', '5000', 'Marlon H. Muring', '2018-11-19 08:57:35'),
(55, 'default.png', 7, 1, 'Asdajkaj', 'Kjkjkasjkdjkaj', 'Kjkjasdkjask', '', 'Female', 'March 1, 2001', '17', 'Single', 'San Agustin', 'Alburquerque', 'Bohol', 'VII', 'San Agustin', 'Alburquerque', 'Bohol', 'VII', '', '09129919409', 'dasksadkl@gmail.com', 'Asdajdsahj', '56', 'Sskjdksakjsa', '8000', '', '', '', '', 'Albur In Charge', '2018-11-14 09:43:32'),
(56, 'default.png', 6, 1, 'Raymond', 'Kjkajskdjasj', 'Kjkaskdjka', '', 'Male', 'May 10, 1995', '23', 'Single', 'Ponong', 'Alburquerque', 'Bohol', 'VII', 'Ponong', 'Alburquerque', 'Bohol', 'VII', '', '09123919090', 'sadkas@gmail.com', 'Sakdjakak', '56', 'Ksajkdjskaj', '7800', '', '', '', '', 'Albur In Charge', '2018-11-14 11:01:25'),
(58, 'default.png', 8, 1, 'Robin', 'Kjkjkasjdkas', 'Hood', 'Jr.', 'Male', 'March 12, 1997', '21', 'Single', 'Santa Filomena', 'Alburquerque', 'Bohol', 'VII', 'Santa Filomena', 'Alburquerque', 'Bohol', 'VII', '', '09129309019', 'robin@gmai.com', 'Ajskdjkajfa', '57', 'Jskajdka', '6000', 'Dajkdjskajj', '54', 'Sakkafjk', '5000', 'Albur In Charge', '2018-11-14 09:53:29'),
(61, 'default.png', 143, 9, 'Ron', 'Jsajdskajk', 'Jkskajdkka', '', 'Male', 'November 20, 1990', '28', 'Single', 'Bugang Norte', 'Bilar', 'Bohol', 'VII', 'Bugang Norte', 'Bilar', 'Bohol', 'VII', '', '09120310930', 'sadak@gmai.com', 'Sakdjajdas', '56', 'Jksajdakj', '5000', 'Dsjksadsajj', '53', 'Kajskdkaj', '4500', 'Bilar in Charge', '2018-11-22 05:21:09'),
(63, 'default.png', 142, 9, 'Asjdha', 'Jhsajhdha', 'Jhjasjdha', '', 'Male', 'March 17, 1995', '23', 'Single', 'Bonifacio', 'Bilar', 'Bohol', 'VII', 'Bonifacio', 'Bilar', 'Bohol', 'VII', '', '09109230909', 'ajkdja@gmail.com', 'Jakjdakjk', '56', 'Kajdka', '5000', 'Asajdsjakj', '45', 'Jkajkjka', '4500', 'Bilar in Charge', '2018-11-19 08:57:35'),
(64, 'default.png', 787, 35, 'Jacob', 'Kjaskjdksaj', 'Kjkasjdkas', '', 'Male', 'May 14, 1997', '21', 'Single', 'Aurora', 'Pilar', 'Bohol', 'VII', 'Aurora', 'Pilar', 'Bohol', 'VII', '', '09120939101', 'kasdk@gmail.com', ' Asjdhaj Asjdh', '55', 'Ksajkdkaj', '5000', 'Asdshaja Jaha', '54', 'Ashdhjahd', '4800', 'Marlon H. Muring', '2018-11-19 08:57:35'),
(65, 'default.png', 2, 1, 'Jonel', 'Simogan', 'Bigcas', '', 'Male', 'May 16, 1996', '22', 'Single', 'Basacdacu', 'Alburquerque', 'Bohol', 'VII', 'Basacdacu', 'Alburquerque', 'Bohol', 'VII', 'Roman Catholic', '09092039490', 'jonel123@gmail.com', 'Ajkaf', '56', 'Aksjfakfja', '6000', 'Asdajksaj', '54', 'Jskajdka', '4000', 'Albur In Charge', '2018-11-19 09:48:53'),
(66, 'default.png', 796, 35, 'Jocelyn', 'Cadenas', 'Abanggan', '', 'Female', 'October 18, 1998', '20', 'Single', 'Estaca', 'Pilar', 'Bohol', 'VII', 'Estaca', 'Pilar', 'Bohol', 'VII', 'Roman Catholic', '09481024264', 'jo_abanggan@yahoo.com', 'Rolando Abanggan', '59', 'Construction Worker', '10000', 'Nila Abanggan', '59', 'House Wife', '10000', 'Marlon H. Muring', '2018-11-29 07:57:12');

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

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `mid`, `nameOrg`, `posHeld`, `orgYear`) VALUES
(1, 1, 'Asdakda', 'Jkasjdkjak', '2018'),
(5, 4, 'Hdahdsaih', 'Dahjdsa', '2018'),
(6, 5, 'Asjdaj', 'Asdjkaj', '2018'),
(11, 7, 'Asdkjaj', 'Kasdkask', '2018'),
(13, 10, 'Kjhhhhjkhj', 'Mbhj', '2005'),
(14, 10, 'Nnjkjk', 'Ljklj', '2011'),
(15, 13, 'Asdhahjh', 'JaJHJDHASJ', '2018'),
(16, 15, 'Dashasjhj', 'Ahjdhajh', '2018'),
(17, 16, 'Hahaha', 'Aksldkalk', '2012'),
(18, 18, 'Asdjajsd', 'Jaksjdsak', '2013'),
(19, 20, 'Asjdsjakaj Kasd Sak', 'Jsdakadsk ', '2014'),
(20, 12, 'As Dsajdlsa Lasd', 'Askdjas Jkl', '2014'),
(21, 32, '', '', ''),
(22, 34, 'Kskaskfl', 'Klklskflksdl', '2018'),
(24, 38, 'Asdajsd', 'Namdnmas', '2018'),
(25, 43, 'Asmdadas', 'Member', '2003'),
(26, 44, 'Asjdka Kdkasdsaj ', 'Member', '2013'),
(28, 41, 'Sajdajk', 'Kjkskjkajk', '2018'),
(29, 66, 'Asa', 'Member', '2018');

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

--
-- Dumping data for table `reasons`
--

INSERT INTO `reasons` (`id`, `mid`, `level`, `finProb`, `nInterest`, `famProb`, `ePreg`, `hProb`) VALUES
(3, 11, 'Secondary', 0, 0, 1, 0, 0),
(4, 32, '', 1, 0, 0, 0, 0),
(5, 18, 'Secondary', 1, 0, 0, 0, 0),
(7, 31, 'Secondary', 1, 0, 0, 0, 0),
(8, 27, 'Secondary', 1, 0, 0, 0, 0),
(9, 12, 'Elementary', 1, 0, 1, 0, 0),
(10, 28, 'Secondary', 1, 0, 0, 0, 0),
(11, 24, 'Elementary', 0, 0, 1, 0, 0),
(12, 15, 'Secondary', 1, 0, 0, 0, 0),
(13, 9, 'Elementary', 1, 0, 0, 0, 0),
(14, 20, 'Secondary', 1, 0, 0, 1, 0),
(15, 38, 'Secondary', 1, 0, 0, 0, 1),
(16, 23, 'College', 1, 0, 0, 0, 0),
(17, 30, 'Secondary', 0, 1, 0, 0, 0),
(18, 37, 'College', 0, 0, 0, 0, 0),
(19, 4, 'College', 0, 0, 0, 0, 0),
(20, 10, 'Secondary', 1, 0, 0, 0, 0),
(21, 42, 'Secondary', 0, 0, 0, 0, 1),
(22, 44, 'Secondary', 1, 0, 0, 0, 0),
(23, 66, 'College', 1, 0, 0, 0, 0);

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

--
-- Dumping data for table `siblings`
--

INSERT INTO `siblings` (`id`, `mid`, `sibName`, `sibSex`, `sibAge`, `sibOccup`, `sibGrYr`, `sibIOSY`) VALUES
(4, 4, 'Daskhha', 'Male', '15', 'Asdsakjsa', 'Asdsak', 'ISY'),
(6, 5, 'Jsdjsk', 'Male', '26', 'Asdkajk', 'Jkajsdkja', 'ISY'),
(7, 6, 'Bryan Bactasa', 'Male', '19', 'Asdjada', 'Asdjak', 'ISY'),
(8, 7, 'Asjdaj', 'Male', '15', 'Student', 'Grade 10', 'ISY'),
(10, 10, 'Dsada', 'Male', '12', 'Sada', 'Ajsdha', 'ISY'),
(11, 10, 'Asdaa', 'Male', '16', 'Skska', 'Jkassjjds', 'ISY'),
(12, 13, 'Asdad', 'Male', '13', 'Adsaj', 'Jkasjdk', 'ISY'),
(13, 15, 'Jerald Cinco', 'Male', '32', 'Asdajkj', 'Kajdkjak', 'ISY'),
(14, 16, 'Asdaja', 'Male', '20', 'Adssajk', 'Ajdja', 'ISY'),
(15, 18, 'Jdsajdjakj', 'Female', '21', 'Hsajdhsja', 'Hasjdhjsa', 'ISY'),
(16, 20, 'Asdjaa', 'Male', '14', 'Jasdjsa', 'Jkasdja', 'ISY'),
(17, 19, 'Sadjaj', 'Male', '18', 'Sajdsaj', 'Jhasjdhjah', 'ISY'),
(19, 25, 'Hasdhja', 'Male', '16', 'Sakdjak', 'Ajskdsa', 'ISY'),
(21, 25, 'Dsadasj', 'Male', '14', 'Sajdak', 'Jkasjda', 'ISY'),
(23, 25, 'Asjdkaj', 'Male', '24', 'Asdha', 'Adadja', 'OSY'),
(24, 24, 'Sdjskjf', 'Female', '15', 'Sadasjd', 'Sadjkjak', 'ISY'),
(27, 26, 'Jasdka', 'Male', '9', 'Dasksakl', 'Sadkaj', 'ISY'),
(44, 26, 'Asdjaj', 'Male', '11', 'Ashdaj', 'Jhasdha', 'ISY'),
(48, 32, 'Dksajdasjk', 'Male', '24', 'Askdaj ', 'Jkaskdjka', 'OSY'),
(49, 33, 'Ajdajh', 'Male', '13', 'Ahdah', 'Jashdjah', 'ISY'),
(50, 34, 'Jksdjkfjksjk', 'Male', '78', 'Kdafjk', 'Kjaksdjka', 'ISY'),
(51, 9, 'Asdkad', 'Female', '23', 'Asdasfs', 'Klakfsakl', 'ISY'),
(52, 35, '', '', '0', '', '', ''),
(53, 11, 'Adkak', 'Male', '10', 'Asjdajk', 'Kjsakdjja', 'ISY'),
(54, 38, 'Ashdha', 'Male', '34', 'Sadjadh', 'Assajkda', 'ISY'),
(55, 39, 'Dsjksfjksj', 'Female', '8', 'Ahdha', 'Hjahjdhha', 'ISY'),
(56, 40, 'Jdkajkjasjk', 'Male', '21', 'Adjkjadka', 'Ajdaskdjsak', 'ISY'),
(57, 43, 'Asdjsajsak', 'Female', '14', 'None', 'Asjdkjsak ', 'ISY'),
(58, 44, 'Asjdkas Dkaskdas', 'Male', '16', 'Hashdasjd Asdkj', 'Asjdhaja', 'ISY'),
(59, 45, 'Asjdjkajda', 'Female', '13', 'Sajda', 'Jasjkjdas', 'ISY'),
(60, 45, 'Asjkdajkdja', 'Female', '18', 'Sadajksaj', 'Asjkdja', 'ISY'),
(61, 46, 'Asdakjdkaj', 'Female', '13', 'Asdadasjh', 'Hjahhdah', 'ISY'),
(62, 41, 'Claire', 'Female', '17', 'Asndna', 'Nmnsam', 'ISY'),
(64, 58, 'Hshajdasjjj', 'Female', '32', 'Sjadsaj', 'Jksajjdsak', 'ISY'),
(65, 65, 'Asjdsakdjk', 'Male', '12', 'Asjkdsa', 'Kjdskajda', 'ISY'),
(66, 66, 'Ma. Cecila Abanggan', 'Female', '29', 'Office Accountant', 'College Graduate', 'OSY'),
(67, 66, 'Rolando Abanggan', 'Male', '27', 'Seaman', 'College Graduate', 'OSY'),
(68, 66, 'Christian Rai Abanggan', 'Male', '25', 'Seaman', 'College Graduate', 'OSY'),
(69, 66, 'Vanessa Abanggan', 'Female', '23', 'Office Accountant', 'College Graduate', 'OSY');

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

--
-- Dumping data for table `special_skills`
--

INSERT INTO `special_skills` (`id`, `mid`, `none`, `agri`, `tech`, `construct`, `singing`, `dancing`, `carpentry`, `computer`, `drawing`, `dress`, `sports`, `arts`, `music`, `business`, `swimming`, `writing`) VALUES
(2, 18, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(3, 16, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 34, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 9, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 23, 2, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 4, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 11, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 38, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(10, 41, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 42, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 43, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0),
(13, 44, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 45, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 56, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 65, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(20, 66, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0);

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
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `mid`, `workDate`, `jobTitle`, `monIncome`, `reLeave`) VALUES
(1, 1, 'September 2004', 'Asdak', 8000, 'Jdskajda'),
(7, 4, 'September 2018', 'Dadaj', 10000, 'Dhajhsa'),
(8, 5, 'September 1990', 'Asdakj', 10000, 'Ajsdajdak'),
(11, 4, 'September 2010', 'Jjkjl', 10000, 'Mdammsdk'),
(12, 7, 'September 2007', 'Adask', 10000, 'Sadal'),
(14, 10, 'September 2013', 'Nmnmmn', 10000, 'Ajksajkdaj Akjsda'),
(15, 10, 'September 2015', 'Asdjajka', 9000, 'Jkadjask'),
(17, 13, 'September 2018', 'Asjdka', 6000, 'Jajsak'),
(18, 15, 'October 2018', 'Jkdsjakdj', 10030, 'Asdjaskjdas'),
(20, 18, 'October 2018', 'Asdasjkd', 5000, 'Askjda'),
(21, 20, 'October 2017', 'Asdjsaj', 6000, 'Sadjasah Asdda'),
(22, 19, 'October 2015', 'Sdkajdas', 6000, 'Ajsdadja Asdd'),
(23, 34, 'jfsdjfksj', 'Kjkjkjkjskdfj', 10000, 'Dmakda'),
(24, 9, 'July 2014', 'Saafjak', 10000, 'Dmamfsakm'),
(25, 38, 'dksajdjas', 'Kjkasjdjkasfj', 4000, 'Nasdkajdka'),
(26, 43, 'November 2018', 'Asjkdajjas', 6000, 'Kapoy'),
(27, 44, 'November 2018', 'Askjdkaj Dsajk', 5000, 'Gikapoy'),
(28, 41, 'November 2018', 'Askdjksajda', 5000, 'Akjfafjk Jafjka'),
(29, 65, 'April 2002', 'Kjkasjdjkasfj', 7000, 'Kapoy'),
(30, 66, 'November 2018', 'Kjasjsajfk', 66799, 'Akjfafjk Jafjka');

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
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `attainment`
--
ALTER TABLE `attainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `brgy_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `interest_hobbies`
--
ALTER TABLE `interest_hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `municipals`
--
ALTER TABLE `municipals`
  MODIFY `mun_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `siblings`
--
ALTER TABLE `siblings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `signatories`
--
ALTER TABLE `signatories`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `special_skills`
--
ALTER TABLE `special_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
