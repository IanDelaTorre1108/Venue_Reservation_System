-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 09:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_tbl`
--

CREATE TABLE `activity_tbl` (
  `ActivityID` int(20) NOT NULL,
  `Activity` varchar(255) NOT NULL,
  `Venue` varchar(255) NOT NULL,
  `TimeStart` time(6) NOT NULL,
  `TimeEnd` time(6) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_tbl`
--

INSERT INTO `activity_tbl` (`ActivityID`, `Activity`, `Venue`, `TimeStart`, `TimeEnd`, `Date`) VALUES
(1, 'Sportfest', 'Bishop Dewit Hall', '07:00:00.000000', '11:00:00.000000', '2024-05-31'),
(2, 'Sportfest', 'Bishop Dewit Hall', '01:00:00.000000', '05:00:00.000000', '2024-07-06'),
(3, 'Sportfest', 'Bishop Dewit Hall', '07:00:00.000000', '10:00:00.000000', '2024-06-01'),
(4, 'ETD Day', 'Bishop Dewit Hall', '07:00:00.000000', '11:00:00.000000', '2024-06-02'),
(5, 'Full Course Website', 'Rooms', '10:35:00.000000', '11:35:00.000000', '2024-07-06'),
(6, 'Sportfest', 'Bishop Martinez Hall', '07:43:00.000000', '07:45:00.000000', '2024-07-05'),
(7, 'Nothing much', 'Audio Visual Room', '07:46:00.000000', '10:43:00.000000', '2024-07-07');

--
-- Triggers `activity_tbl`
--
DELIMITER $$
CREATE TRIGGER `format_time` BEFORE INSERT ON `activity_tbl` FOR EACH ROW SET NEW.TimeStart = DATE_FORMAT(NEW.TimeStart, '%h:%i %p')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `ID` bigint(20) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`ID`, `Username`, `Password`) VALUES
(115218080067, 'admin', 'admin'),
(1152180800678, 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `approved_tbl`
--

CREATE TABLE `approved_tbl` (
  `AReservationID` int(20) NOT NULL,
  `UserID` int(20) NOT NULL,
  `ActivityID` int(20) NOT NULL,
  `UtilityID` int(20) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approved_tbl`
--

INSERT INTO `approved_tbl` (`AReservationID`, `UserID`, `ActivityID`, `UtilityID`, `Status`) VALUES
(1, 1, 1, 1, 'Approved'),
(2, 2, 2, 2, 'Approved'),
(4, 4, 4, 4, 'Approved'),
(5, 5, 5, 5, 'Approved'),
(6, 6, 6, 6, 'Approved'),
(7, 7, 7, 7, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `pending_tbl`
--

CREATE TABLE `pending_tbl` (
  `PReservationID` int(20) NOT NULL,
  `UserID` int(20) NOT NULL,
  `ActivityID` int(20) NOT NULL,
  `UtilityID` int(20) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejected_tbl`
--

CREATE TABLE `rejected_tbl` (
  `RReservationID` int(20) NOT NULL,
  `UserID` int(20) NOT NULL,
  `ActivityID` int(20) NOT NULL,
  `UtilityID` int(20) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rejected_tbl`
--

INSERT INTO `rejected_tbl` (`RReservationID`, `UserID`, `ActivityID`, `UtilityID`, `Status`) VALUES
(3, 3, 3, 3, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `UserID` int(20) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Payment` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`UserID`, `FirstName`, `LastName`, `Email`, `Department`, `Payment`) VALUES
(1, 'Ian Lexter', 'Dela Torre', 'sykkuno339@gmail.com', 'ETD', 0),
(2, 'Florencio', 'Enrique', 'christhianalexis.merano@antiquespride.edu.ph', 'ETD', 0),
(3, 'Florencio', 'Dela Torre', 'delatorreian@sac.edu.ph', 'ETD', 0),
(4, 'Ian Lexter', 'Dela Torre', 'delatorreian@sac.edu.ph', 'Guest', 0),
(5, 'Christhian Alexis Jr', 'Merano', 'chrithianalexis.merano@antqiuespride.edu.ph', 'ETD', 0),
(6, 'Ian Lexter', 'Dela Torre', 'lexterdelatorre321@gmail.com', 'TED', 0),
(7, 'Syke', 'Kunno', 'delatorreian@sac.edu.ph', 'DTE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `utility_tbl`
--

CREATE TABLE `utility_tbl` (
  `UtilityID` int(20) NOT NULL,
  `ELight` tinyint(1) DEFAULT NULL,
  `QLight` int(11) DEFAULT NULL,
  `EELectricFan` tinyint(1) DEFAULT NULL,
  `QElectricFan` int(11) DEFAULT NULL,
  `EChair` tinyint(1) DEFAULT NULL,
  `QChair` int(11) DEFAULT NULL,
  `ETable` tinyint(1) DEFAULT NULL,
  `QTable` int(11) DEFAULT NULL,
  `EBackdrop` tinyint(1) DEFAULT NULL,
  `QBackdrop` int(11) DEFAULT NULL,
  `EVan` tinyint(1) DEFAULT NULL,
  `QVan` int(11) DEFAULT NULL,
  `SOperator` tinyint(1) DEFAULT NULL,
  `SSoundSystem` tinyint(1) DEFAULT NULL,
  `SPhysicalArrangment` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utility_tbl`
--

INSERT INTO `utility_tbl` (`UtilityID`, `ELight`, `QLight`, `EELectricFan`, `QElectricFan`, `EChair`, `QChair`, `ETable`, `QTable`, `EBackdrop`, `QBackdrop`, `EVan`, `QVan`, `SOperator`, `SSoundSystem`, `SPhysicalArrangment`) VALUES
(1, 1, 10, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0),
(2, 1, 13, 1, 14, 1, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 1, 10, 1, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(4, 1, 12, 1, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 1, 1, 1, 2, 1, 3, 1, 4, 1, 5, 1, 6, 0, 1, 1),
(6, 1, 1, 1, 2, 1, 3, 0, NULL, 0, NULL, 0, NULL, 0, 0, 1),
(7, 1, 1, 1, 2, 1, 3, 0, NULL, 0, NULL, 0, NULL, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_tbl`
--
ALTER TABLE `activity_tbl`
  ADD PRIMARY KEY (`ActivityID`);

--
-- Indexes for table `approved_tbl`
--
ALTER TABLE `approved_tbl`
  ADD PRIMARY KEY (`AReservationID`);

--
-- Indexes for table `pending_tbl`
--
ALTER TABLE `pending_tbl`
  ADD PRIMARY KEY (`PReservationID`),
  ADD KEY `user_tbl` (`UserID`),
  ADD KEY `activity_tbl` (`ActivityID`),
  ADD KEY `utility_tbl` (`UtilityID`);

--
-- Indexes for table `rejected_tbl`
--
ALTER TABLE `rejected_tbl`
  ADD PRIMARY KEY (`RReservationID`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `utility_tbl`
--
ALTER TABLE `utility_tbl`
  ADD PRIMARY KEY (`UtilityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_tbl`
--
ALTER TABLE `activity_tbl`
  MODIFY `ActivityID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `approved_tbl`
--
ALTER TABLE `approved_tbl`
  MODIFY `AReservationID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pending_tbl`
--
ALTER TABLE `pending_tbl`
  MODIFY `PReservationID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rejected_tbl`
--
ALTER TABLE `rejected_tbl`
  MODIFY `RReservationID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `UserID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utility_tbl`
--
ALTER TABLE `utility_tbl`
  MODIFY `UtilityID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pending_tbl`
--
ALTER TABLE `pending_tbl`
  ADD CONSTRAINT `activity_tbl` FOREIGN KEY (`ActivityID`) REFERENCES `activity_tbl` (`ActivityID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_tbl` FOREIGN KEY (`UserID`) REFERENCES `user_tbl` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utility_tbl` FOREIGN KEY (`UtilityID`) REFERENCES `utility_tbl` (`UtilityID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
