-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2021 at 01:17 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tableau`
--

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `idevenement` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `coordonnees` varchar(100) DEFAULT NULL,
  `lieu` varchar(150) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `kia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`idevenement`, `date`, `heure`, `coordonnees`, `lieu`, `description`, `kia`) VALUES
(18, '2021-06-11', '11:03:00', '10 555', 'Paris', 'Test', 9),
(19, '2021-06-15', '23:03:00', '46464654', 'Saint Denis', 'Accident', 5),
(20, '2021-06-18', '00:00:00', '49', 'Tokyo', 'Crash', 7),
(61, '2021-06-22', '05:32:00', '546 3546', 'Dubai', 'Kidnapping', 1),
(62, '2021-06-26', '06:05:00', '546 872', 'New York', 'Vol', 3);

-- --------------------------------------------------------

--
-- Table structure for table `personnalisation`
--

CREATE TABLE `personnalisation` (
  `IdPersonnalisation` int(11) NOT NULL,
  `Titre` varchar(100) NOT NULL,
  `Logo` varchar(100) NOT NULL,
  `Couleur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`idevenement`);

--
-- Indexes for table `personnalisation`
--
ALTER TABLE `personnalisation`
  ADD PRIMARY KEY (`IdPersonnalisation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `idevenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `personnalisation`
--
ALTER TABLE `personnalisation`
  MODIFY `IdPersonnalisation` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
