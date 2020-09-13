-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 03:41 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_locator`
--

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `Store_id` int(10) NOT NULL,
  `Store_Name` varchar(100) NOT NULL,
  `Street_address` varchar(200) NOT NULL,
  `Store_area` varchar(200) NOT NULL,
  `Store_Phone_Number` varchar(25) NOT NULL,
  `working_hours` varchar(100) NOT NULL,
  `Latitude` decimal(8,6) NOT NULL,
  `Longitude` decimal(8,6) NOT NULL,
  `map_id` varchar(10) NOT NULL,
  `created_on` date NOT NULL,
  `updated_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`Store_id`, `Store_Name`, `Street_address`, `Store_area`, `Store_Phone_Number`, `working_hours`, `Latitude`, `Longitude`, `map_id`, `created_on`, `updated_on`) VALUES
(1, 'JUBILEE HILLS', 'Road No.36, Jubilee Hills', 'Hyderabad, Telangana-500033.', '+91 040 6704 3636', '11:00 am - 9:00 pm (Monday to Sunday)', '17.428838', '78.413781', 'mapid1', '2020-09-13', '2020-09-13'),
(2, 'ABIDS', 'Main Road, Abids,', 'Hyderabad, Telangana-500001.', '+91 040 6656 6234', '11:00 am - 9:00 pm (Monday to Sunday)', '17.390642', '78.476479', 'mapid2', '2020-09-13', '2020-09-13'),
(3, 'SECUNDERABAD', 'Gandhi Statue Square,', 'Secunderabad, Telangana-500003.', '+91 040 2784 6188', '11:00 am - 9:00 pm (Monday to Sunday)', '17.444160', '78.487573', 'mapid3', '2020-09-13', '2020-09-13'),
(4, 'K.S BEAUTY CENTER', 'Kathiawar Plaza, P.G. Road,', 'Secunderabad, Telangana – 500003.', '+91 040 66381555', '11:00 am - 8:30 pm (Monday to Sunday)', '17.440800', '78.484990', 'mapid4', '2020-09-13', '2020-09-13'),
(9, 'ABIDS', '1857/p Sriranganilaya Jalavahini Road', 'Hyderabad, Telangana-500001.', '+91 040 6656 6234', '11:00 am - 9:00 pm (Monday to Sunday)', '17.390642', '78.476479', 'mapid5', '2020-09-13', '2020-09-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`Store_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `Store_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
