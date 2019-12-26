-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2019 at 08:48 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_php_template`
--

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`id`, `name`) VALUES
(2, 'Back End'),
(1, 'Front End');

-- --------------------------------------------------------

--
-- Table structure for table `frameworks`
--

CREATE TABLE `frameworks` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frameworks`
--

INSERT INTO `frameworks` (`id`, `name`, `language_id`) VALUES
(1, 'Vue.js', 1),
(2, 'Laravel', 2),
(3, 'Angular', 1);

-- --------------------------------------------------------

--
-- Table structure for table `framework_version`
--

CREATE TABLE `framework_version` (
  `id` int(11) NOT NULL,
  `version_name` varchar(40) NOT NULL,
  `framework_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `framework_version`
--

INSERT INTO `framework_version` (`id`, `version_name`, `framework_id`) VALUES
(1, 'AngularJs', 3);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `field_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `field_id`) VALUES
(1, 'Java Script', 1),
(2, 'PHP', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_field_id` int(11) NOT NULL,
  `user_language_id` int(11) NOT NULL,
  `user_framework_id` int(11) NOT NULL,
  `user_framework_version_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_field_id`, `user_language_id`, `user_framework_id`, `user_framework_version_id`) VALUES
(1, 'Sava', 'savabezanovic@hotmail.com', 'blatruc', 2, 2, 2, NULL),
(2, 'Strahinja', 'skansi97@gmail.com', 'blatruc', 1, 1, 1, NULL),
(3, 'Bezanovic', 'savabezanovicsae@gmail.com', 'blatruc', 1, 1, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `frameworks`
--
ALTER TABLE `frameworks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subtype_name` (`name`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `framework_version`
--
ALTER TABLE `framework_version`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `version_name` (`version_name`),
  ADD KEY `framework_name` (`framework_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_name` (`name`),
  ADD UNIQUE KEY `id` (`id`,`name`),
  ADD KEY `field_id` (`field_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_field` (`user_field_id`),
  ADD KEY `user_language` (`user_language_id`),
  ADD KEY `user_framework` (`user_framework_id`),
  ADD KEY `user_framework_version_id` (`user_framework_version_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `frameworks`
--
ALTER TABLE `frameworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `framework_version`
--
ALTER TABLE `framework_version`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `frameworks`
--
ALTER TABLE `frameworks`
  ADD CONSTRAINT `frameworks_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `framework_version`
--
ALTER TABLE `framework_version`
  ADD CONSTRAINT `framework_version_ibfk_1` FOREIGN KEY (`framework_id`) REFERENCES `frameworks` (`id`);

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `field` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_field_id`) REFERENCES `field` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`user_language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`user_framework_id`) REFERENCES `frameworks` (`id`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`user_framework_version_id`) REFERENCES `framework_version` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
