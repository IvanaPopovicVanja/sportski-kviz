-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 03:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportsquis`
--

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE `participation` (
  `ID_participation` int(11) NOT NULL,
  `ID_quis` int(11) DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `ID_question` int(11) NOT NULL,
  `text` text NOT NULL,
  `answer1` text NOT NULL,
  `answer2` text NOT NULL,
  `answer3` text NOT NULL,
  `answer4` text NOT NULL,
  `correct_answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quises`
--

CREATE TABLE `quises` (
  `ID_quis` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT '2020-04-08 20:00:00',
  `season` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `question1` int(11) NOT NULL,
  `question2` int(11) NOT NULL,
  `question3` int(11) NOT NULL,
  `question4` int(11) NOT NULL,
  `question5` int(11) NOT NULL,
  `question6` int(11) NOT NULL,
  `question7` int(11) NOT NULL,
  `question8` int(11) NOT NULL,
  `question9` int(11) NOT NULL,
  `question10` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `img` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`ID_participation`),
  ADD KEY `ID_quis` (`ID_quis`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID_question`);

--
-- Indexes for table `quises`
--
ALTER TABLE `quises`
  ADD PRIMARY KEY (`ID_quis`),
  ADD KEY `question1` (`question1`),
  ADD KEY `question2` (`question2`),
  ADD KEY `question5` (`question5`),
  ADD KEY `question6` (`question6`),
  ADD KEY `question7` (`question7`),
  ADD KEY `question8` (`question8`),
  ADD KEY `question9` (`question9`),
  ADD KEY `question10` (`question10`),
  ADD KEY `question3` (`question3`),
  ADD KEY `question4` (`question4`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `participation`
--
ALTER TABLE `participation`
  MODIFY `ID_participation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `ID_question` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quises`
--
ALTER TABLE `quises`
  MODIFY `ID_quis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`ID_quis`) REFERENCES `quises` (`ID_quis`),
  ADD CONSTRAINT `participation_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`);

--
-- Constraints for table `quises`
--
ALTER TABLE `quises`
  ADD CONSTRAINT `quises_ibfk_1` FOREIGN KEY (`question1`) REFERENCES `questions` (`ID_question`),
  ADD CONSTRAINT `quises_ibfk_10` FOREIGN KEY (`question10`) REFERENCES `questions` (`ID_question`),
  ADD CONSTRAINT `quises_ibfk_2` FOREIGN KEY (`question2`) REFERENCES `questions` (`ID_question`),
  ADD CONSTRAINT `quises_ibfk_3` FOREIGN KEY (`question3`) REFERENCES `questions` (`ID_question`),
  ADD CONSTRAINT `quises_ibfk_4` FOREIGN KEY (`question4`) REFERENCES `questions` (`ID_question`),
  ADD CONSTRAINT `quises_ibfk_5` FOREIGN KEY (`question5`) REFERENCES `questions` (`ID_question`),
  ADD CONSTRAINT `quises_ibfk_6` FOREIGN KEY (`question6`) REFERENCES `questions` (`ID_question`),
  ADD CONSTRAINT `quises_ibfk_7` FOREIGN KEY (`question7`) REFERENCES `questions` (`ID_question`),
  ADD CONSTRAINT `quises_ibfk_8` FOREIGN KEY (`question8`) REFERENCES `questions` (`ID_question`),
  ADD CONSTRAINT `quises_ibfk_9` FOREIGN KEY (`question9`) REFERENCES `questions` (`ID_question`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
