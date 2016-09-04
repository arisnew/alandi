-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2016 at 12:22 
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(25) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_active` enum('Active','Nonactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`, `description`, `is_active`) VALUES
(1, 'Superuser', 'Top User', 'Active'),
(2, 'Admin', 'Default Admin App', 'Active'),
(3, 'User', 'Default User Level', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `level_id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT '1234',
  `is_active` enum('Active','Nonactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `name`, `email`, `phone`, `level_id`, `password`, `is_active`) VALUES
('agus', 'Agus Budi', 'agus@gmail.com', '08432864', 3, 'Admin', 'Nonactive'),
('aris', 'Aris Priyanto', 'aris@gmail.com', '1111', 2, 'Admin', 'Active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user`
--
CREATE TABLE IF NOT EXISTS `v_user` (
`username` varchar(50)
,`name` varchar(100)
,`email` varchar(100)
,`phone` varchar(15)
,`level_id` int(11)
,`password` varchar(50)
,`is_active` enum('Active','Nonactive')
,`level_name` varchar(25)
);

-- --------------------------------------------------------

--
-- Structure for view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user` AS select `user`.`username` AS `username`,`user`.`name` AS `name`,`user`.`email` AS `email`,`user`.`phone` AS `phone`,`user`.`level_id` AS `level_id`,`user`.`password` AS `password`,`user`.`is_active` AS `is_active`,`level`.`level_name` AS `level_name` from (`user` join `level`) where (`user`.`level_id` = `level`.`level_id`);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `level_id` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
