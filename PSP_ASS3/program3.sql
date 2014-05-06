-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- เวอร์ชั่นของเซิร์ฟเวอร์: 5.6.12-log
-- รุ่นของ PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `program3`
--
CREATE DATABASE IF NOT EXISTS `program3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `program3`;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_data`
--

CREATE TABLE IF NOT EXISTS `tbl_data` (
  `empid` int(10) NOT NULL,
  `emplname` varchar(30) NOT NULL,
  `datein` date NOT NULL,
  `team` varchar(30) NOT NULL,
  `salary` double NOT NULL,
  `saleamount` double NOT NULL,
  `commission` float NOT NULL,
  `newsalary` float NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- dump ตาราง `tbl_data`
--

INSERT INTO `tbl_data` (`empid`, `emplname`, `datein`, `team`, `salary`, `saleamount`, `commission`, `newsalary`) VALUES
(57001, 'Hannah Ali', '1996-11-12', 'Froyo', 21180, 755843, 1511.69, 2118),
(57002, 'Joel Allan', '1999-04-17', 'KitKat', 7890, 671865, 1343.73, 789),
(57003, 'Jade Little', '2006-07-27', 'Ice Cream Sandwich', 11240, 257595, 257.595, 562),
(57004, 'Olivia Hancock', '2000-05-12', 'Honeycomb', 13880, 705784, 1411.57, 1388),
(57005, 'Lydia Burgess', '2010-09-10', 'Jelly Bean', 9900, 189321, 189.321, 495),
(57006, 'Emma Akhtar', '1999-02-18', 'Froyo', 18650, 574833, 1149.67, 1865),
(57007, 'Sean Potts', '2008-01-28', 'Honeycomb', 10500, 522978, 1045.96, 525),
(57008, 'Kieran Williamson', '2004-05-05', 'Jelly Bean', 9650, 514134, 1028.27, 965),
(57009, 'Ben Morrison', '1998-06-20', 'Honeycomb', 13300, 527892, 1055.78, 1330),
(57010, 'Sam Nelson', '2003-04-16', 'Ice Cream Sandwich', 11100, 158908, 158.908, 1110),
(57011, 'Amelia Graham', '2001-06-18', 'Jelly Bean', 9500, 333531, 333.531, 950),
(57012, 'Jacob Carr', '2011-07-22', 'Honeycomb', 12000, 381487, 381.487, 600),
(57013, 'Spencer Green', '2006-05-16', 'Ice Cream Sandwich', 11600, 194230, 194.23, 580),
(57014, 'Matilda Ward', '2009-09-17', 'KitKat', 8850, 154789, 154.789, 442.5),
(57015, 'Paige Flynn', '2002-12-14', 'Gingerbread', 15600, 263378, 263.378, 1560),
(57016, 'William Kelly', '2011-10-09', 'KitKat', 9000, 807579, 1615.16, 450),
(57017, 'Georgia Chan', '2007-08-19', 'Froyo', 16600, 664881, 1329.76, 830),
(57018, 'Mason Humphries', '1998-10-04', 'Honeycomb', 12000, 469301, 469.301, 1200),
(57019, 'Lucas Mclean', '2002-08-27', 'Ice Cream Sandwich', 10500, 870202, 1740.4, 1050),
(57020, 'Alicia Hall', '2009-02-17', 'KitKat', 9000, 707091, 1414.18, 450);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
