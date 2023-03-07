-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2020 at 09:16 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `java_project_hotel_uni_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `extra_services`
--

CREATE TABLE `extra_services` (
  `es_id` int(20) NOT NULL,
  `es_name` varchar(255) NOT NULL,
  `es_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_services`
--

INSERT INTO `extra_services` (`es_id`, `es_name`, `es_price`) VALUES
(7, 'parking', 70),
(8, 'champagne', 110),
(9, 'spa', 180),
(10, 'sauna', 135),
(11, 'massage', 155),
(12, 'fitness', 11),
(13, 'hairdresser', 199),
(14, 'skiing', 250);

-- --------------------------------------------------------

--
-- Table structure for table `guesttable`
--

CREATE TABLE `guesttable` (
  `gID` int(15) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gsm` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `guest_rating` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guesttable`
--

INSERT INTO `guesttable` (`gID`, `first_name`, `last_name`, `gsm`, `email`, `guest_rating`) VALUES
(4, 'James', 'Doe', '0889735612', 'jamesdoe@gmail.com', '0'),
(9, 'Ivan', 'Ivanov', '0887443345', 'ivanivanov@abv.bg', '24'),
(10, 'Stoyan', 'Petkov', '0884131313', 'stoyan@gmail.com', '0'),
(11, 'Viktor', 'Kirilov', '0887412143', 'viktorkirilov@gmail.com', '-2'),
(12, 'Petyr', 'Stoyanov', '0887531232', 'petyrstoqnov@gmail.com', '0'),
(13, 'Elisaveta', 'Petkov', '0887736212', 'elisavetapetkova@abv.bg', '2'),
(14, 'Viktoria', 'Vasileva', '0889721321', 'viktoriqvasileva@abv.bg', '0'),
(15, 'Gloria', 'Rinova', '0886252525', 'gloria@abv.bg', '0'),
(17, 'Aaron', 'Smith', '0886252525', 'something@abv.bg', '0'),
(18, 'Emily', 'Smith', '0886252525', 'dsdsd@abv.bg', '0'),
(19, 'Peter', 'Mann', '0886252525', 'petermann@gmail.com', '0'),
(22, 'Stefan', 'Stefanov', '0888123457', 'stefan@abv.bg', '31'),
(23, 'Petar', 'Petar', '0123456789', 'petar@abv.bg', '-7'),
(25, 'someone', 'new', '0123456788', 'somenew@abv.bg', '16'),
(26, 'new', 'new', '08887654321', 'new@abv.bg', '45'),
(27, 'oleg', 'olegov', '09887654321', 'oleg@abv.bg', '0'),
(28, 'morad', 'morandi', '09871234566', 'murad@abv.bg', '0'),
(30, 'mihail', 'mishev', '0787123456', 'misho@abv.bg', '0'),
(31, 'Liesi', 'Lizi', '0987667711', 'lizi@abv.bg', '1'),
(32, 'valio', 'valio', '0888555555', 'valio@abv.bg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(20) NOT NULL,
  `manager_username` varchar(255) NOT NULL,
  `manager_password` varchar(255) NOT NULL,
  `manager_hotel_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `manager_username`, `manager_password`, `manager_hotel_name`) VALUES
(1, 'manager', '123456', ''),
(7, 'stefan1', '123456', 'Melia'),
(8, 'mihail1', '123456', 'Melia'),
(9, 'plamen1', '123456', 'Panorama'),
(10, 'ivan1', '123456', 'Valio1');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `owners_id` int(20) NOT NULL,
  `owners_username` varchar(255) NOT NULL,
  `owners_password` varchar(255) NOT NULL,
  `hotel_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`owners_id`, `owners_username`, `owners_password`, `hotel_name`) VALUES
(5, 'petar1', '123456', 'Melia'),
(6, 'ivan1', '123456', 'Panorama'),
(7, 'valio1', '123456', 'Valio1'),
(8, 'valio2', '123456', 'valio2');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(20) NOT NULL,
  `guestID` int(20) NOT NULL,
  `rNumber` int(20) NOT NULL,
  `date_came` date NOT NULL,
  `date_went` date NOT NULL,
  `recept_that_made_reserv` varchar(255) NOT NULL,
  `cancelled_reservation_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `guestID`, `rNumber`, `date_came`, `date_went`, `recept_that_made_reserv`, `cancelled_reservation_reason`) VALUES
(34, 9, 2, '2019-12-20', '2019-12-26', 'hoteltest', ''),
(35, 25, 3, '2019-12-26', '2019-12-31', 'lorem1', ''),
(36, 26, 5, '2020-01-07', '2020-01-30', 'hoteltest', ''),
(37, 31, 6, '2020-01-07', '2020-01-08', 'hoteltest', ''),
(38, 10, 6, '2020-01-04', '2020-01-06', 'lorem1', ''),
(39, 17, 4, '2020-01-01', '2020-01-06', 'lorem1', ''),
(40, 13, 2, '2020-01-02', '2020-01-06', '', ''),
(41, 15, 3, '2020-01-02', '2020-01-06', '', ''),
(42, 4, 6, '2020-01-03', '2020-01-06', '', ''),
(43, 28, 5, '2020-01-04', '2020-01-06', '', ''),
(44, 25, 7, '2020-01-27', '2020-01-31', 'hoteltest', '');

-- --------------------------------------------------------

--
-- Table structure for table `reserv_guest_extra_services`
--

CREATE TABLE `reserv_guest_extra_services` (
  `id` int(20) NOT NULL,
  `id_reservation` int(20) NOT NULL,
  `guest_id` int(20) NOT NULL,
  `extra_service_id` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `xtimes` int(20) NOT NULL,
  `total_amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserv_guest_extra_services`
--

INSERT INTO `reserv_guest_extra_services` (`id`, `id_reservation`, `guest_id`, `extra_service_id`, `price`, `xtimes`, `total_amount`) VALUES
(1, 31, 21, 2, 240, 3, 464),
(9, 35, 25, 7, 70, 2, 140),
(10, 35, 25, 9, 180, 1, 180),
(11, 34, 9, 14, 250, 2, 500),
(12, 34, 9, 9, 180, 3, 540),
(13, 34, 9, 7, 70, 7, 490),
(14, 36, 26, 8, 110, 2, 220),
(15, 36, 26, 11, 155, 2, 310),
(16, 35, 25, 11, 155, 4, 620);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `Rnumber` int(15) NOT NULL,
  `Rtype` int(15) NOT NULL,
  `RGSM` varchar(20) NOT NULL,
  `Rreserved` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`Rnumber`, `Rtype`, `RGSM`, `Rreserved`) VALUES
(2, 5, '', 'Yes'),
(3, 1, '', 'Yes'),
(4, 3, '', 'Not Free'),
(5, 5, '', 'Yes'),
(6, 3, '', 'Yes'),
(7, 5, '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `Rid` int(15) NOT NULL,
  `Rlabel` varchar(255) NOT NULL,
  `Rprice` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`Rid`, `Rlabel`, `Rprice`) VALUES
(1, 'single', '35'),
(2, 'double', '70'),
(3, 'triple', '105'),
(4, 'group', '140'),
(5, 'entourage', '175');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `user_first_name` varchar(50) NOT NULL,
  `user_last_name` varchar(50) NOT NULL,
  `receptionist_hotel_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `user_first_name`, `user_last_name`, `receptionist_hotel_name`) VALUES
(1, 'hoteltest', 'testpass', '', '', ''),
(2, 'receptionist1', '123456', 'John', 'Dow', 'melia'),
(5, 'lorem1', '123456', 'Lorem', 'Ipsum', 'Panorama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `extra_services`
--
ALTER TABLE `extra_services`
  ADD PRIMARY KEY (`es_id`);

--
-- Indexes for table `guesttable`
--
ALTER TABLE `guesttable`
  ADD PRIMARY KEY (`gID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`owners_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_guest_id` (`guestID`),
  ADD KEY `fk_rNumber` (`rNumber`);

--
-- Indexes for table `reserv_guest_extra_services`
--
ALTER TABLE `reserv_guest_extra_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`Rnumber`),
  ADD KEY `fk_roomTypeID` (`Rtype`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`Rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `extra_services`
--
ALTER TABLE `extra_services`
  MODIFY `es_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `guesttable`
--
ALTER TABLE `guesttable`
  MODIFY `gID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `owners_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `reserv_guest_extra_services`
--
ALTER TABLE `reserv_guest_extra_services`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `Rid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_guest_id` FOREIGN KEY (`guestID`) REFERENCES `guesttable` (`gID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_rNumber` FOREIGN KEY (`rNumber`) REFERENCES `rooms` (`Rnumber`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_roomTypeID` FOREIGN KEY (`Rtype`) REFERENCES `roomtype` (`Rid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
