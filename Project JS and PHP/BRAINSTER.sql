-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 25, 2020 at 05:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Proekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `BRAINSTER`
--

CREATE TABLE `BRAINSTER` (
  `id` int(8) NOT NULL,
  `student_name` varchar(256) NOT NULL,
  `company_name` varchar(256) NOT NULL,
  `mail` varchar(256) NOT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `Category` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BRAINSTER`
--

INSERT INTO `BRAINSTER` (`id`, `student_name`, `company_name`, `mail`, `phone`, `Category`) VALUES
(63, 'John Doe', 'Example', 'johndoe@gmail.com', '333-444-555', 'Student od programiranje'),
(64, 'Mike Jonhson', 'Brainster', 'mike@example.co', '1002500593', 'Student od data science'),
(65, 'Jane Doe', 'Samsung', 'jane@yahoo.com', '555-440-590', 'Student od marketing'),
(66, 'Alice Moon', 'Philips', 'alice@exmaple.com', '4346576 3225 2342', 'Student od dizajn'),
(67, 'Nikola ', 'Noon', 'nikola@gmail.com', '443-45402-523453', 'Student od programiranje');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BRAINSTER`
--
ALTER TABLE `BRAINSTER`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BRAINSTER`
--
ALTER TABLE `BRAINSTER`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
