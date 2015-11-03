-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2015 at 09:52 PM
-- Server version: 5.6.25-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw4_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `hw4_group`
--

CREATE TABLE `hw4_group` (
  `id` int(11) NOT NULL,
  `group` char(32) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hw4_right`
--

CREATE TABLE `hw4_right` (
  `id` int(11) NOT NULL,
  `rights` char(32) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hw4_user`
--

CREATE TABLE `hw4_user` (
  `id` int(11) NOT NULL,
  `first_name` char(32) NOT NULL,
  `last_name` char(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hw4_users_groups`
--

CREATE TABLE `hw4_users_groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hw4_group`
--
ALTER TABLE `hw4_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hw4_right`
--
ALTER TABLE `hw4_right`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hw4_user`
--
ALTER TABLE `hw4_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hw4_users_groups`
--
ALTER TABLE `hw4_users_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hw4_group`
--
ALTER TABLE `hw4_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hw4_right`
--
ALTER TABLE `hw4_right`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hw4_user`
--
ALTER TABLE `hw4_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hw4_users_groups`
--
ALTER TABLE `hw4_users_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
