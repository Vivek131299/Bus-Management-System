-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 14, 2019 at 05:18 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gps bus management`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `status_change`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `status_change` (`status` VARCHAR(10), `busno` VARCHAR(50))  BEGIN
UPDATE buses SET status='Cancelled' WHERE busno=busno;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

DROP TABLE IF EXISTS `buses`;
CREATE TABLE IF NOT EXISTS `buses` (
  `busno` varchar(50) NOT NULL,
  `start_station` varchar(50) NOT NULL,
  `end_station` varchar(50) NOT NULL,
  `routeno` varchar(50) NOT NULL,
  `timing` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'On time',
  PRIMARY KEY (`busno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`busno`, `start_station`, `end_station`, `routeno`, `timing`, `status`) VALUES
('101', 'Nigdi', 'Talegaon', '444', '11.40 pm', 'On time'),
('102', 'Pune station', 'Chinchwad', '311', '12.30 pm', 'On time'),
('103', 'Kothrud', 'Shivajinagar', '222', '9 am', 'Cancelled'),
('104', 'Nigdi', 'Katraj', '160', '2 pm', 'On time'),
('105', 'Nigdi', 'Katraj', '170', '4 pm', 'On time'),
('106', 'Pimpri', 'Hadapsar', '211', '3 pm', 'On time');

--
-- Triggers `buses`
--
DROP TRIGGER IF EXISTS `add_cancelled_bus`;
DELIMITER $$
CREATE TRIGGER `add_cancelled_bus` AFTER UPDATE ON `buses` FOR EACH ROW BEGIN
IF new.status = "Cancelled"
THEN
INSERT INTO cancelled_buses VALUES (old.busno, old.start_station, old.end_station, old.routeno, old.timing);
END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `remove_ontime_bus`;
DELIMITER $$
CREATE TRIGGER `remove_ontime_bus` AFTER UPDATE ON `buses` FOR EACH ROW BEGIN
IF new.status = "On time"
THEN
DELETE FROM cancelled_buses WHERE busno=new.busno;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_buses`
--

DROP TABLE IF EXISTS `cancelled_buses`;
CREATE TABLE IF NOT EXISTS `cancelled_buses` (
  `busno` varchar(50) NOT NULL,
  `start_station` varchar(50) NOT NULL,
  `end_station` varchar(50) NOT NULL,
  `routeno` varchar(50) NOT NULL,
  `timing` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cancelled_buses`
--

INSERT INTO `cancelled_buses` (`busno`, `start_station`, `end_station`, `routeno`, `timing`) VALUES
('103', 'Kothrud', 'Shivajinagar', '222', '9 am');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

DROP TABLE IF EXISTS `managers`;
CREATE TABLE IF NOT EXISTS `managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `username`, `email`, `branch`, `password`, `trn_date`) VALUES
(1, 'vivek', 'vivek131299@gmail.com', 'Nigdi', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-09-10 18:11:09'),
(2, 'manager1', 'manager1@gmail.com', 'Pimpri', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-09-13 14:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(1, 'vivek', 'vivek131299@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-09-10 18:11:09'),
(4, 'aditya', 'aghodekar16@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-09-16 11:29:13'),
(3, 'yash', 'yash123@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-09-10 18:31:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
