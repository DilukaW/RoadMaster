-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 10:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusl2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `Driver_Id` int(11) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Licence_No` varchar(10) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Contact_No` int(10) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`Driver_Id`, `Password`, `Licence_No`, `Name`, `Contact_No`, `Email`, `Gender`) VALUES
(1, '45ef882ff6649fab400c8cbb3c62670a', 'C8452168', 'Sahan', 764512448, 'Scfernan@gmail.com', 'Male'),
(2, 'd487dd0b55dfcacdd920ccbdaeafa351', 'D1543623', 'Fannel Perera', 748821546, 'Fannyprz@gmail.com', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `In_Id` varchar(50) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`In_Id`, `Company`, `User_Id`, `Designation`) VALUES
('2245LKin', 'Janashakthi', 2, 'Assesment Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `P_Id` varchar(20) NOT NULL,
  `U_Id` int(11) NOT NULL,
  `Designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`P_Id`, `U_Id`, `Designation`) VALUES
('BB227895', 1, 'Chief Inspector');

-- --------------------------------------------------------

--
-- Table structure for table `rda`
--

CREATE TABLE `rda` (
  `RDA_Id` varchar(20) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rda`
--

INSERT INTO `rda` (`RDA_Id`, `User_Id`, `Designation`) VALUES
('RRX1221', 3, 'Junior Executive');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `Rep_Id` int(11) NOT NULL,
  `Driver_Id` int(11) NOT NULL,
  `Cause` varchar(400) NOT NULL,
  `Details` varchar(500) DEFAULT NULL,
  `Date_of_Acc` date NOT NULL DEFAULT current_timestamp(),
  `Time_of_Acc` time DEFAULT current_timestamp(),
  `RDA_Id` varchar(20) DEFAULT NULL,
  `In_Id` varchar(50) DEFAULT NULL,
  `P_Id` varchar(20) DEFAULT NULL,
  `Rep_Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`Rep_Id`, `Driver_Id`, `Cause`, `Details`, `Date_of_Acc`, `Time_of_Acc`, `RDA_Id`, `In_Id`, `P_Id`, `Rep_Date`) VALUES
(23, 1, 'Bad Weather', 'Heavy Rain Blocked the View and Night', '2022-02-23', '23:28:00', NULL, '2245LKin', 'BB227895', '2022-04-25'),
(24, 1, 'Distractions', 'I was on the phone.', '2021-12-08', '16:51:00', NULL, '2245LKin', 'BB227895', '2022-04-26'),
(25, 1, 'Drunk-Driving', 'Friend Drove the Vehicle.', '2021-09-28', '12:51:00', 'RRX1221', NULL, NULL, '2022-04-26'),
(26, 1, 'Bad Weather', '', '2022-04-14', '22:02:00', NULL, NULL, NULL, '2022-04-26'),
(27, 1, 'Speeding', '', '2021-11-18', '15:44:00', NULL, NULL, NULL, '2022-04-27'),
(28, 2, 'Bad Weather', 'Slippery road caused the bike to skid and crash', '2022-05-10', '09:22:00', NULL, NULL, 'BB227895', '2022-05-18'),
(29, 2, 'Speeding', 'Lost Control of the bike and hit a car', '2022-02-08', '19:46:00', NULL, NULL, NULL, '2022-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `rep_in`
--

CREATE TABLE `rep_in` (
  `Rep_Id` int(11) NOT NULL,
  `In_Id` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rep_in`
--

INSERT INTO `rep_in` (`Rep_Id`, `In_Id`, `date`, `Status`) VALUES
(23, '2245LKin', '2022-04-25', 'ACCEPTED'),
(24, '2245LKin', '2022-04-26', 'ACCEPTED');

-- --------------------------------------------------------

--
-- Table structure for table `rep_pic`
--

CREATE TABLE `rep_pic` (
  `rep_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rep_pic`
--

INSERT INTO `rep_pic` (`rep_id`, `file_name`) VALUES
(23, 'istockphoto-1156651485-612x612.jpg'),
(23, 'Unfall-Kratzer-Gutachten-Kostenvoranschlag.jpg'),
(24, 'collision1.jpg'),
(24, 'fenderbender.jpg'),
(24, 'istockphoto-175195079-612x612.jpg'),
(25, 'CG_02ddecd1-fimage_story.png'),
(25, 'collision1.jpg'),
(25, 'minor-car-accident.jpg'),
(26, 'images (1).jpeg'),
(26, 'IMG-20220424-WA0016.jpg'),
(26, 'IMG-20220424-WA0018.jpg'),
(27, 'istockphoto-1156651485-612x612.jpg'),
(27, 'istockphoto-465663510-612x612.jpg'),
(27, 'Unfall-Kratzer-Gutachten-Kostenvoranschlag.jpg'),
(28, 'CG_02ddecd1-fimage_story.png'),
(28, 'collision1.jpg'),
(28, 'IMG-20220424-WA0018.jpg'),
(28, 'minor-car-accident.jpg'),
(29, 'istockphoto-1156651485-612x612.jpg'),
(29, 'istockphoto-465663510-612x612.jpg'),
(29, 'Unfall-Kratzer-Gutachten-Kostenvoranschlag.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rep_pol`
--

CREATE TABLE `rep_pol` (
  `Rep_Id` int(11) NOT NULL,
  `P_Id` varchar(20) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rep_pol`
--

INSERT INTO `rep_pol` (`Rep_Id`, `P_Id`, `date`, `Status`) VALUES
(23, 'BB227895', '2022-04-25', 'REJECTED'),
(24, 'BB227895', '2022-04-26', 'ACCEPTED'),
(28, 'BB227895', '2022-05-17', 'ACCEPTED');

-- --------------------------------------------------------

--
-- Table structure for table `rep_rda`
--

CREATE TABLE `rep_rda` (
  `Rep_Id` int(11) NOT NULL,
  `RDA_Id` varchar(20) NOT NULL,
  `date` int(11) DEFAULT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rep_rda`
--

INSERT INTO `rep_rda` (`Rep_Id`, `RDA_Id`, `date`, `Status`) VALUES
(25, 'RRX1221', 2022, 'ACCEPTED');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `U_Id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Contact_no` int(10) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `User_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_Id`, `Name`, `Contact_no`, `Email`, `Password`, `User_type`) VALUES
(1, 'IAR Karunarathne', 748957861, 'IARkaru222@PDept.lk', '81dc9bdb52d04dc20036dbd8313ed055', 'Police'),
(2, 'Nethmini Gajanayake', 741548823, 'NNG2245@Lkinsurance.lk', '81dc9bdb52d04dc20036dbd8313ed055', 'Insurance'),
(3, 'Yelani LS Jayasooriya', 711746522, 'UYLSjaya@RDAuth.lk', '6562c5c1f33db6e05a082a88cddab5ea', 'RDA');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Vehicle_Id` int(11) NOT NULL,
  `Registration_No` varchar(10) NOT NULL,
  `Insurance_Company` varchar(100) NOT NULL,
  `Insurance_Policy_No` varchar(50) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Make` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Driver_Id` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Vehicle_Id`, `Registration_No`, `Insurance_Company`, `Insurance_Policy_No`, `Type`, `Make`, `Model`, `Driver_Id`, `Date`) VALUES
(1, 'NWPCAL9022', 'Janashakthi_Insurance', 'GFE75333544077', 'Car', 'Toyota', 'Aqua', 1, '2022-04-23'),
(2, 'NWPBAP5429', 'Peoples_Insurance', 'RT7778T35643S', 'Bike', 'Honda', 'Dio', 1, '2022-04-23'),
(4, 'NWPPD2344', 'Sri_Lanka_Insurance', 'GFE7533357766', 'Van', 'Nissan', 'Vanette', 1, '2022-04-26'),
(5, 'NWPBBA9092', 'Sri_Lanka_Insurance', 'DF554Y7771927', 'Bike', 'Yamaha', 'ZR', 2, '2022-05-17'),
(6, 'WPCAL7712', 'Janashakthi_Insurance', 'POI/99/35643S', 'Car', 'Toyota', 'Leaf', 2, '2022-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `veh_rep`
--

CREATE TABLE `veh_rep` (
  `Vehicle_Id` int(11) NOT NULL,
  `Rep_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `veh_rep`
--

INSERT INTO `veh_rep` (`Vehicle_Id`, `Rep_Id`) VALUES
(1, 23),
(1, 26),
(2, 24),
(2, 27),
(4, 25),
(5, 28),
(5, 29),
(6, 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`Driver_Id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`In_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`P_Id`),
  ADD KEY `U_Id` (`U_Id`);

--
-- Indexes for table `rda`
--
ALTER TABLE `rda`
  ADD PRIMARY KEY (`RDA_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`Rep_Id`),
  ADD KEY `RDA_Id` (`RDA_Id`),
  ADD KEY `P_Id` (`P_Id`),
  ADD KEY `In_Id` (`In_Id`),
  ADD KEY `Driver_Id` (`Driver_Id`);

--
-- Indexes for table `rep_in`
--
ALTER TABLE `rep_in`
  ADD PRIMARY KEY (`Rep_Id`,`In_Id`),
  ADD KEY `In_Id` (`In_Id`);

--
-- Indexes for table `rep_pic`
--
ALTER TABLE `rep_pic`
  ADD PRIMARY KEY (`rep_id`,`file_name`) USING BTREE;

--
-- Indexes for table `rep_pol`
--
ALTER TABLE `rep_pol`
  ADD PRIMARY KEY (`Rep_Id`,`P_Id`),
  ADD KEY `P_Id` (`P_Id`);

--
-- Indexes for table `rep_rda`
--
ALTER TABLE `rep_rda`
  ADD PRIMARY KEY (`Rep_Id`,`RDA_Id`),
  ADD KEY `RDA_Id` (`RDA_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`U_Id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`Vehicle_Id`),
  ADD KEY `Driver_Id` (`Driver_Id`);

--
-- Indexes for table `veh_rep`
--
ALTER TABLE `veh_rep`
  ADD PRIMARY KEY (`Vehicle_Id`,`Rep_Id`),
  ADD KEY `Rep_Id` (`Rep_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `Driver_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `Rep_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `U_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `Vehicle_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `insurance`
--
ALTER TABLE `insurance`
  ADD CONSTRAINT `insurance_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`U_Id`);

--
-- Constraints for table `police`
--
ALTER TABLE `police`
  ADD CONSTRAINT `police_ibfk_1` FOREIGN KEY (`U_Id`) REFERENCES `user` (`U_Id`);

--
-- Constraints for table `rda`
--
ALTER TABLE `rda`
  ADD CONSTRAINT `rda_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`U_Id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`RDA_Id`) REFERENCES `rda` (`RDA_Id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`P_Id`) REFERENCES `police` (`P_Id`),
  ADD CONSTRAINT `report_ibfk_3` FOREIGN KEY (`In_Id`) REFERENCES `insurance` (`In_Id`),
  ADD CONSTRAINT `report_ibfk_4` FOREIGN KEY (`Driver_Id`) REFERENCES `driver` (`Driver_Id`);

--
-- Constraints for table `rep_in`
--
ALTER TABLE `rep_in`
  ADD CONSTRAINT `rep_in_ibfk_1` FOREIGN KEY (`Rep_Id`) REFERENCES `report` (`Rep_Id`),
  ADD CONSTRAINT `rep_in_ibfk_2` FOREIGN KEY (`In_Id`) REFERENCES `insurance` (`In_Id`);

--
-- Constraints for table `rep_pic`
--
ALTER TABLE `rep_pic`
  ADD CONSTRAINT `rep_pic_ibfk_1` FOREIGN KEY (`rep_id`) REFERENCES `report` (`Rep_Id`);

--
-- Constraints for table `rep_pol`
--
ALTER TABLE `rep_pol`
  ADD CONSTRAINT `rep_pol_ibfk_1` FOREIGN KEY (`Rep_Id`) REFERENCES `report` (`Rep_Id`),
  ADD CONSTRAINT `rep_pol_ibfk_2` FOREIGN KEY (`P_Id`) REFERENCES `police` (`P_Id`);

--
-- Constraints for table `rep_rda`
--
ALTER TABLE `rep_rda`
  ADD CONSTRAINT `rep_rda_ibfk_1` FOREIGN KEY (`Rep_Id`) REFERENCES `report` (`Rep_Id`),
  ADD CONSTRAINT `rep_rda_ibfk_2` FOREIGN KEY (`RDA_Id`) REFERENCES `rda` (`RDA_Id`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`Driver_Id`) REFERENCES `driver` (`Driver_Id`);

--
-- Constraints for table `veh_rep`
--
ALTER TABLE `veh_rep`
  ADD CONSTRAINT `veh_rep_ibfk_1` FOREIGN KEY (`Vehicle_Id`) REFERENCES `vehicle` (`Vehicle_Id`),
  ADD CONSTRAINT `veh_rep_ibfk_2` FOREIGN KEY (`Rep_Id`) REFERENCES `report` (`Rep_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
