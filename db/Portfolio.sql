-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2025 at 03:30 PM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 7.2.34-45+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `project_name`, `description`) VALUES
(1, 1, 'C++ Projects', 'A project that can convert hexadecimal numbers to binary.'),
(2, 1, 'Hotel Management System', 'A Java project that manages hotel guests and assigned rooms from reception till the end of stay.'),
(3, 1, 'Hospital Database System', 'A database that contains patients, doctors, nurses, hospital rooms records, and their entity relationships.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `age` int NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `year` int DEFAULT NULL,
  `institution` varchar(150) DEFAULT NULL,
  `about_me` text,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `skills` varchar(10000) NOT NULL,
  `hobbies` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `instagram` varchar(1000) NOT NULL,
  `linkedin` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `x` varchar(1000) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `age`, `occupation`, `department`, `year`, `institution`, `about_me`, `email`, `phone`, `skills`, `hobbies`, `instagram`, `linkedin`, `x`, `username`, `password`) VALUES
(1, 'Dawit Tamirat', 30, 'Student', 'Computer Science', 3, 'St. Mary University College', 'My name is Dawit Tamirat from Addis Ababa, Ethiopia. My friends call me Jocker as a nickname. I am a friendly and social person.', 'davedtm@gmail.com', '+251939754592', 'Maintaince, Construction Finishing, Drawing, Editing, cooking Hobbies Playing Games, Soccer, Watching Movies , Reading Books', 'Playing Games, Soccer, Watching Movies , Reading Books', 'https://www.instagram.com/davedtm22', 'https://www.linkedin.com/in/dawit-tamirat-mihrete-584194247/', 'https://x.com/Dave_36t', 'dawit', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
