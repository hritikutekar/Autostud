-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2020 at 10:05 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autostud`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_record`
--

CREATE TABLE `attendance_record` (
  `id` int(11) NOT NULL,
  `enroll` varchar(256) NOT NULL,
  `AJP` int(11) NOT NULL DEFAULT '0',
  `MAN` int(11) NOT NULL DEFAULT '0',
  `STE` int(11) NOT NULL DEFAULT '0',
  `ESY` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_record`
--

INSERT INTO `attendance_record` (`id`, `enroll`, `AJP`, `MAN`, `STE`, `ESY`) VALUES
(1, '1312270023', 10, 2, 0, 0),
(2, '1712270094', 8, 2, 0, 0),
(3, '1612270103', 6, 2, 0, 0),
(4, '1612270141', 2, 2, 0, 0),
(5, '1612270138', 5, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `enroll` varchar(256) DEFAULT NULL,
  `teacher_id` varchar(256) DEFAULT NULL,
  `user_type` varchar(256) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `subject` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`id`, `question_id`, `enroll`, `teacher_id`, `user_type`, `user_first`, `user_last`, `message`, `subject`) VALUES
(1, 1, NULL, '001', 'teacher', 'Shalaka', 'Kshirsagar', 'JavaServer Pages (JSP) is a technology that helps software developers create dynamically generated web pages based on HTML, XML, or other document types. Released in 1999 by Sun Microsystems, JSP is similar to PHP and ASP, but it uses the Java programming language.', 'AJP'),
(2, 1, '1612270138', NULL, 'student', 'Hritik', 'Utekar', 'Thank you! ma\'am.', 'AJP'),
(3, 2, '1612270138', NULL, 'student', 'Hritik', 'Utekar', 'Nice question!', 'STE'),
(4, 2, NULL, '003', 'teacher', 'Shweeta', 'Lilhare', 'First alpha testing is done then comes the beta. And then the software goes in stable test.', 'STE'),
(5, 2, '1612270103', NULL, 'student', 'Ashutosh', 'Desai', 'Thank you.\r\n', 'STE'),
(6, 5, '1612270103', NULL, 'student', 'Ashutosh', 'Desai', 'Noooo', 'AJP'),
(7, 6, NULL, '001', 'teacher', 'Shalaka', 'Kshirsagar', 'NOOO', 'AJP'),
(8, 7, NULL, '007', 'teacher', 'Vinod', 'Jadhav', 'Yes', 'MAN');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `enroll` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL,
  `status` varchar(256) NOT NULL DEFAULT 'Unsolved',
  `notify` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `enroll`, `subject`, `question`, `description`, `status`, `notify`) VALUES
(1, '1612270138', 'AJP', 'What is JSP?', 'I want to know about JSP.', 'Unsolved', 0),
(2, '1612270103', 'STE', 'What is done first Alpha testing or Beta testing?', 'Ma\'am could you help me in this.', 'Unsolved', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_login`
--

CREATE TABLE `teacher_login` (
  `id` int(11) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `teacher_id` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL,
  `AJP` int(11) DEFAULT '0',
  `MAN` int(11) NOT NULL DEFAULT '0',
  `STE` int(11) NOT NULL DEFAULT '0',
  `ESY` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_login`
--

INSERT INTO `teacher_login` (`id`, `user_first`, `user_last`, `user_email`, `user_uid`, `teacher_id`, `user_pwd`, `AJP`, `MAN`, `STE`, `ESY`) VALUES
(1, 'Shalaka', 'Kshirsagar', 'hritikdrocks@gmail.com', 'shalaka001', '001', '$2y$10$Z.b17/1B0a6IyhLv3NVlSuqYp.UzRUkyCek0TT571qSqy6lqU4T5G', 1, 0, 0, 0),
(2, 'Vinod', 'Jadhav', 'vinodjadhav@gmail.com', 'jadhavsir007', '007', '$2y$10$SOv.e/uuDdFwZDrCxG.77uCIJgM1eVqY/FFjggl8P/tf0Ubi.Xl06', 0, 1, 0, 0),
(3, 'Shweeta', 'Lilhare', 'shweeta1999@gmail.com', 'shweeta1999', '003', '$2y$10$676chl2TvO9wnhYIVdaGv.vQsj.fTqiJMd7UU6WzrkGcOio2Fds2K', 0, 0, 1, 0),
(6, 'bankar', 'sir', 'sir@gmail.com', 'bankar sir', '0010', '$2y$10$fF0PyMrq9nzV6A93lv9dcu94bEQxO8Kotei0qBHm4bpWGBzMKNHi.', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `total_classes`
--

CREATE TABLE `total_classes` (
  `id` int(11) NOT NULL,
  `AJP` int(11) NOT NULL,
  `MAN` int(11) NOT NULL,
  `STE` int(11) NOT NULL,
  `ESY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_classes`
--

INSERT INTO `total_classes` (`id`, `AJP`, `MAN`, `STE`, `ESY`) VALUES
(1, 22, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `enroll` varchar(256) DEFAULT NULL,
  `user_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_first`, `user_last`, `user_email`, `user_uid`, `enroll`, `user_pwd`) VALUES
(1, 'Omkar', 'Bhatlawande', 'omkar.u.b.rj@gmail.com', 'RJ', '1312270023', '$2y$10$2D64K0u3ezSNpZyj7xvSdOBozi2Qzhcqg0C3Bs97Fc1PDDceMXWkO'),
(2, 'Kedar', 'Ganbote', 'kedarg12@gmail.com', 'KD', '1712270094', '$2y$10$c9LKbdUxjREdeTsRSEFXjOtIyG2GNGgFGuD8vLSPhATIhf1lkZYJG'),
(3, 'Ashutosh', 'Desai', 'ashu20desai@gmail.com', 'Ashu', '1612270103', '$2y$10$lLxxhgrYVqqPZnxdt1OoaeEo4KmLNMaiy9BeGSk7Yl/Wpk4RJukRS'),
(4, 'Sourav', 'Yadav', 'sourav12@gmail.com', 'sourav', '1612270141', '$2y$10$tBsWbscWrEsR9bq8xuFsbOj9ywaG3IYzwK4x1Ogmu5CYkloRJLPBS'),
(5, 'Hritik', 'Utekar', 'hritikdrocks@gmail.com', 'hk', '1612270138', '$2y$10$nWpMdZm8oxldABwJUaRY4.wlj/qbrOE4T.TzzwgILlLcjVqlVweoy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_record`
--
ALTER TABLE `attendance_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_login`
--
ALTER TABLE `teacher_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_classes`
--
ALTER TABLE `total_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_record`
--
ALTER TABLE `attendance_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_login`
--
ALTER TABLE `teacher_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `total_classes`
--
ALTER TABLE `total_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
