-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2021 at 10:23 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17619186_bbs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `firstname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Balance` int(10) DEFAULT NULL,
  `Account_number` bigint(12) NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`firstname`, `lastname`, `gender`, `Balance`, `Account_number`, `Email`, `dob`) VALUES
('Atiq', 'Shaikh', 'M', 5000, 123456789123, 'atikshaikh436@gmail.com', '2002-06-03'),
('Shanta', 'Ram', 'M', 5000, 123456852147, 'shanta@gmail.com', '2001-05-02'),
('Shalini', 'Gupta', 'F', 5000, 145685214785, 'shalini@gmail.com', '1998-08-25'),
('Golu', 'Gopal', 'M', 5000, 222555999777, 'golu@gmail.com', '2000-05-04'),
('Bholu', 'Bhopal', 'M', 5000, 258963789123, 'bholu@gmail.com', '2001-06-03'),
('Pappu', 'Patel', 'M', 5000, 365478965412, 'pappu@gmail.com', '2001-03-07'),
('Akash', 'Jholawala', 'M', 5000, 369963258520, 'akash@gmail.com', '2002-06-14'),
('Sonu', 'Gupta', 'F', 5000, 471471582582, 'sonu@gmail.com', '2001-01-06'),
('Yasar', 'Khatib', 'M', 5000, 589658789123, 'yasar@gmail.com', '2000-04-24'),
('Afreen', 'Shaikh', 'F', 5000, 654286789123, 'afreen@gmail.com', '2000-07-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Account_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
